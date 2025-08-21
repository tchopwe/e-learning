<?php
header('Content-Type: application/json');

require_once('../../action/Connexion.php');
$dam->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$response = [];

try {
    // --- Ton traitement de fichier ici ---
    // Exemple de réussite :
    $response['status'] = 'success';
    $response['message'] = 'Contenu ajouté avec succès.';
} catch (Throwable $e) {
    $response['status'] = 'error';
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
exit;


/**
 * Retourne une clé binaire (32 octets) à partir de la valeur DB (base64).
 * Si la valeur DB est vide ou invalide, on en génère une nouvelle (32 octets) et on la renvoie (et on devra la stocker).
 */
function getOrCreateGroupKey(PDO $dam, int $groupeId): string {
    $stmt = $dam->prepare("SELECT cle_chiffrement FROM groupe WHERE id_groupe = ?");
    $stmt->execute([$groupeId]);
    $cleBase64 = $stmt->fetchColumn();

    if ($cleBase64) {
        $bin = base64_decode($cleBase64, true);
        if ($bin !== false && strlen($bin) === 32) {
            return $bin;
        }
    }

    $newKey = random_bytes(32);
    $stmt = $dam->prepare("UPDATE groupe SET cle_chiffrement = ? WHERE id_groupe = ?");
    $stmt->execute([base64_encode($newKey), $groupeId]);

    return $newKey;
}

/**
 * Chiffre des données binaires en AES-256-CBC.
 */
function encryptBinary(string $plaintext, string $key): string {
    $cipher = 'aes-256-cbc';
    $ivLen  = openssl_cipher_iv_length($cipher);
    $iv     = random_bytes($ivLen);

    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    if ($ciphertext === false) {
        throw new RuntimeException('Échec du chiffrement OpenSSL.');
    }

    return "ENCv1" . $iv . $ciphertext;
}

/**
 * Déduit le type_contenu autorisé depuis l’extension.
 */
function detectAndValidateType(string $userType, string $filename): string {
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $map = [
        'image' => ['jpg','jpeg','png','gif','webp','bmp'],
        'video' => ['mp4','webm','ogg','ogv','m4v','mov'],
        'pdf'   => ['pdf'],
    ];

    if (isset($map[$userType]) && in_array($ext, $map[$userType], true)) {
        return $userType;
    }

    foreach ($map as $type => $exts) {
        if (in_array($ext, $exts, true)) {
            return $type;
        }
    }

    return $userType;
}

/**
 * Crée un nom de fichier sûr et unique.
 */
function makeSafeUniqueName(string $originalName): string {
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $base = bin2hex(random_bytes(8));
    $safeExt = preg_replace('/[^a-z0-9]+/i', '', $ext);
    return $base . ($safeExt ? ('.' . $safeExt) : '');
}

// --- Traitement du formulaire --- //
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $titre_contenu  = trim($_POST['titre_contenu'] ?? '');
        $type_contenu   = trim($_POST['type_contenu'] ?? '');
        $description    = trim($_POST['description'] ?? '');
        $id_cours       = (int)($_POST['id_cours'] ?? 0);
        $id_groupe      = (int)($_POST['id_groupe'] ?? 0);
        $id_utilisateur = (int)($_POST['id_utilisateur'] ?? 0);

        if ($titre_contenu === '' || !$id_utilisateur || !$id_groupe || !$id_cours) {
            throw new InvalidArgumentException("Veuillez remplir tous les champs obligatoires.");
        }

        if (!isset($_FILES['fichier']) || $_FILES['fichier']['error'] !== UPLOAD_ERR_OK) {
            throw new RuntimeException("Aucun fichier valide n’a été envoyé.");
        }

        $tmpPath   = $_FILES['fichier']['tmp_name'];
        $origName  = $_FILES['fichier']['name'];
        $fileSize  = $_FILES['fichier']['size'] ?? 0;
        if ($fileSize <= 0) {
            throw new RuntimeException("Le fichier envoyé est vide.");
        }

        $type_contenu = detectAndValidateType($type_contenu, $origName);

        $uploadDir = __DIR__ . "/uploads/";
        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0775, true)) {
            throw new RuntimeException("Impossible de créer le dossier d’upload.");
        }

        $safeName        = makeSafeUniqueName($origName) . ".enc";
        $encryptedFsPath = $uploadDir . $safeName;

        $plain = file_get_contents($tmpPath);
        if ($plain === false) {
            throw new RuntimeException("Impossible de lire le fichier uploadé.");
        }

        $groupKey = getOrCreateGroupKey($dam, $id_groupe);
        $blob     = encryptBinary($plain, $groupKey);

        if (file_put_contents($encryptedFsPath, $blob) === false) {
            throw new RuntimeException("Impossible d’écrire le fichier chiffré sur le serveur.");
        }

        $chemin_fichier = "uploads/" . basename($encryptedFsPath);

        // Enregistrement en base
        $stmt = $dam->prepare("
            INSERT INTO contenus (titre_contenu, type_contenu, description, id_cours, id_groupe, id_utilisateur, chemin_fichier)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $titre_contenu,
            $type_contenu,
            $description,
            $id_cours,
            $id_groupe,
            $id_utilisateur,
            $chemin_fichier
        ]);

    } catch (Throwable $e) {
        $message = "Erreur : " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        // En cas d'erreur, tu peux rester sur la page et afficher le message
        echo '<div class="alert alert-danger">' . $message . '</div>';
    }
}


?>
