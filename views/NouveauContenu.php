<?php
// Connexion PDO (doit définir $pdo)
require_once('../../action/Connexion.php');

// --- Utilitaires --- //

/**
 * Retourne une clé binaire (32 octets) à partir de la valeur DB (base64).
 * Si la valeur DB est vide ou invalide, on en génère une nouvelle (32 octets) et on la renvoie (et on devra la stocker).
 */
function getOrCreateGroupKey(PDO $pdo, int $groupeId): string {
    // Récupérer la clé du groupe
    $stmt = $pdo->prepare("SELECT cle_chiffrement FROM groupe WHERE id_groupe = ?");
    $stmt->execute([$groupeId]);
    $cleBase64 = $stmt->fetchColumn();

    // Si la clé existe et semble valide (décodage base64 en 32 octets)
    if ($cleBase64) {
        $bin = base64_decode($cleBase64, true);
        if ($bin !== false && strlen($bin) === 32) {
            return $bin; // clé binaire prête à l’emploi
        }
    }

    // Sinon on génère une nouvelle clé (32 octets), on la stocke en base64 dans la table groupe, et on la retourne (binaire)
    $newKey = random_bytes(32);
    $stmt = $pdo->prepare("UPDATE groupe SET cle_chiffrement = ? WHERE id_groupe = ?");
    $stmt->execute([base64_encode($newKey), $groupeId]);

    return $newKey;
}

/**
 * Chiffre des données binaires en AES-256-CBC.
 * Retourne le blob: "ENCv1" + IV(16) + CIPHERTEXT (tout en binaire).
 */
function encryptBinary(string $plaintext, string $key): string {
    $cipher = 'aes-256-cbc';
    $ivLen  = openssl_cipher_iv_length($cipher);
    $iv     = random_bytes($ivLen);

    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    if ($ciphertext === false) {
        throw new RuntimeException('Échec du chiffrement OpenSSL.');
    }

    // Petit header magique pour reconnaître le format et simplifier le déchiffrement ultérieur
    $header = "ENCv1";
    return $header . $iv . $ciphertext;
}

/**
 * Déduit le type_contenu autorisé depuis l’extension, et contrôle la cohérence avec le choix utilisateur.
 */
function detectAndValidateType(string $userType, string $filename): string {
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $map = [
        'image' => ['jpg','jpeg','png','gif','webp','bmp'],
        'video' => ['mp4','webm','ogg','ogv','m4v','mov'],
        'pdf'   => ['pdf'],
    ];

    // Si l’utilisateur a choisi un type cohérent avec l’extension, on garde
    if (isset($map[$userType]) && in_array($ext, $map[$userType], true)) {
        return $userType;
    }

    // Sinon on tente de deviner par extension
    foreach ($map as $type => $exts) {
        if (in_array($ext, $exts, true)) {
            return $type;
        }
    }

    // Par défaut : on renvoie le type déclaré par l’utilisateur (et on laissera l’admin corriger si besoin)
    return $userType;
}

/**
 * Crée un nom de fichier sûr et unique, en conservant l’extension.
 */
function makeSafeUniqueName(string $originalName): string {
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $base = bin2hex(random_bytes(8)); // 16 hex chars ~ 8 bytes random
    $safeExt = preg_replace('/[^a-z0-9]+/i', '', $ext);
    return $base . ($safeExt ? ('.' . $safeExt) : '');
}

// --- Récupération des données pour les <select> --- //
$typeUtilisateurs = $dam->query("SELECT id_utilisateur, nom FROM utilisateur")->fetchAll(PDO::FETCH_ASSOC);
$groupes          = $dam->query("SELECT id_groupe, nom_groupe, cle_chiffrement FROM groupe")->fetchAll(PDO::FETCH_ASSOC);
$cours = $dam->query("SELECT id_cours, titre FROM cours")->fetchAll(PDO::FETCH_ASSOC);
// --- Traitement du formulaire --- //
$message = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Champs requis
        $libelle          = trim($_POST['libelle'] ?? '');
        $type_contenu_in  = trim($_POST['type_contenu'] ?? '');
        $type_utilisateur = (int)($_POST['type_utilisateur'] ?? 0);
        $groupe           = (int)($_POST['groupe'] ?? 0);

        if ($libelle === '' || !$type_utilisateur || !$groupe) {
            throw new InvalidArgumentException("Veuillez remplir tous les champs obligatoires.");
        }

        if (!isset($_FILES['fichier']) || $_FILES['fichier']['error'] !== UPLOAD_ERR_OK) {
            throw new RuntimeException("Aucun fichier valide n’a été envoyé.");
        }

        // Contrôles sur le fichier
        $tmpPath   = $_FILES['fichier']['tmp_name'];
        $origName  = $_FILES['fichier']['name'];
        $fileSize  = $_FILES['fichier']['size'] ?? 0;
        if ($fileSize <= 0) {
            throw new RuntimeException("Le fichier envoyé est vide.");
        }

        // Déterminer le type (et le valider)
        $type_contenu = detectAndValidateType($type_contenu_in, $origName);

        // Dossier de stockage (séparer clair et chiffré si tu veux ; ici on ne garde que le chiffré)
        $uploadDir = __DIR__ . "/uploads/"; // Chemin serveur
        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0775, true)) {
            throw new RuntimeException("Impossible de créer le dossier d’upload.");
        }

        // Nom de fichier cible (chiffré) + extension .enc
        $safeName        = makeSafeUniqueName($origName) . ".enc";
        $encryptedFsPath = $uploadDir . $safeName;

        // Récupérer ou générer la clé du groupe (binaire 32 octets)
        $groupKey = getOrCreateGroupKey($pdo, $groupe);

        // Lire le binaire du fichier uploadé
        $plain = file_get_contents($tmpPath);
        if ($plain === false) {
            throw new RuntimeException("Impossible de lire le fichier uploadé.");
        }

        // Chiffrer
        $blob = encryptBinary($plain, $groupKey);

        // Écrire sur disque le fichier chiffré
        if (file_put_contents($encryptedFsPath, $blob) === false) {
            throw new RuntimeException("Impossible d’écrire le fichier chiffré sur le serveur.");
        }

        // Construire l’URL/chemin web stocké en BD (ex: relatif au script)
        $publicPath = "uploads/" . basename($encryptedFsPath);

        // Enregistrer en base
        $stmt = $dam->prepare("
            INSERT INTO contenu (id_contenu, titre_contenu, type_contenu, url_fichier, Description, id_cours, id_groupe, id_utilisateur)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $id_contenu,
            $titre_contenu,
            $type_contenu,       // On stocke le chemin du FICHIER CHIFFRÉ
            $url_fichier,
            $Description,
            $id_cours,
            $id_groupe,
            $id_utilisateur,

        ]);

        $message = "✅ Contenu ajouté et chiffré avec succès.";
    } catch (Throwable $e) {
        $message = "❌ Erreur : " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un contenu (chiffré par groupe)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Ajoute Bootstrap si besoin -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="p-3">
    <div class="container">
        <h2 class="mb-4">Ajouter un contenu (chiffré par groupe)</h2>

        <?php if ($message): ?>
            <div class="alert <?php echo (strpos($message, '✅') !== false) ? 'alert-success' : 'alert-danger'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="border p-3 rounded">
        <div class="form-group">
                <label for="id_contenu">id contenu <span class="text-danger">*</span></label>
                <input type="text" name="id_contenu" id="id_contenu" class="form-control" required>
            </div>    
        
        <div class="form-group">
                <label for="libelle">Libellé <span class="text-danger">*</span></label>
                <input type="text" name="libelle" id="libelle" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="type_contenu">Type de contenu <span class="text-danger">*</span></label>
                <select name="type_contenu" id="type_contenu" class="form-control" required>
                    <option value="">--Sélectionner--</option>
                    <option value="image">Image</option>
                    <option value="video">Vidéo</option>
                    <option value="pdf">PDF</option>
                </select>
                <small class="form-text text-muted">
                    Le type sera vérifié automatiquement selon l’extension du fichier.
                </small>
            </div>

            <div class="form-group">
                <label for="fichier">Fichier <span class="text-danger">*</span></label>
                <input type="file" name="fichier" id="fichier" class="form-control-file" required>
            </div>

             <div class="form-group">
                <label for="description">Description <span class="text-danger">*</span></label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="id_cours">cours concerné<span class="text-danger">*</span></label>
                <select name="id_cours" id="id_cours" class="form-control" required>
                    <option value="">--Sélectionner--</option>
                    <?php foreach ($cours as $tu): ?>
                        <option value="<?= (int)$tu['id_cours'] ?>"><?= htmlspecialchars($tu['titre']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

          <div class="form-group">
                <label for="groupe">Groupe (clé utilisée pour chiffrer) <span class="text-danger">*</span></label>
                <select name="groupe" id="groupe" class="form-control" required>
                    <option value="">--Sélectionner--</option>
                    <?php foreach ($groupes as $g): ?>
                        <option value="<?= (int)$g['id_groupe'] ?>">
                            <?= htmlspecialchars($g['nom_groupe']) ?>
                            <?php if (!empty($g['cle_chiffrement'])): ?>
                                (clé OK)
                            <?php else: ?>
                                (clé absente → sera générée)
                            <?php endif; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="form-group">
                <label for="type_utilisateur">Type d'utilisateur <span class="text-danger">*</span></label>
                <select name="type_utilisateur" id="type_utilisateur" class="form-control" required>
                    <option value="">--Sélectionner--</option>
                    <?php foreach ($typeUtilisateurs as $tu): ?>
                        <option value="<?= (int)$tu['id_utilisateur'] ?>"><?= htmlspecialchars($tu['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter (chiffré)</button>
        </form>

        <hr>

        <p class="mt-3 text-muted">
            <strong>Note :</strong> Le fichier est enregistré <em>chiffré</em> dans <code>uploads/</code> avec l’entête <code>ENCv1</code> suivie de l’IV (16 octets) puis le ciphertext.
            Pour le lire, il faudra un script qui vérifie l’appartenance au groupe, récupère <code>groupe.cle_chiffrement</code>, lit l’IV et déchiffre à la volée.
        </p>
    </div>

    <!-- JS Bootstrap si besoin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
