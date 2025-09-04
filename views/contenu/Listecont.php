<?php

require_once("../../action/connexion.php");
require_once("Crypto.php");


// Vérifier si l’utilisateur est connecté
if (!isset($_SESSION['user'])) {
    die("Accès refusé. Veuillez vous connecter.");
}

$id_utilisateur = $_SESSION['user'];

// Récupérer le rôle, le groupe et le niveau de l’utilisateur
$stmt = $dam->prepare("SELECT type_utilisateur, id_groupe, id_niveau FROM utilisateur WHERE id_utilisateur = ?");
$stmt->execute([$id_utilisateur]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$userData) {
    die("Utilisateur introuvable.");
}

$id_role_user   = $userData['id_role'];
$id_groupe_user = $userData['id_groupe'];
$id_niveau_user = $userData['id_niveau'];

// Si étudiant → récupérer la clé de groupe
$groupKey = null;
if ($id_role_user == 1) {
    $groupKey = getOrCreateGroupKey($dam, $id_groupe_user);
}

// Vérifier paramètres GET (niveau + semestre)
if (!isset($_GET['niveau']) || !isset($_GET['semestre'])) {
    die("Paramètres manquants.");
}

$niveau   = (int)$_GET['niveau'];
$semestre = (int)$_GET['semestre'];

// Récupérer les contenus
$stmt = $dam->prepare("
    SELECT c.*, n.nom_niveau, s.nom_semestre
    FROM contenu c
    JOIN niveau n ON c.id_niveau = n.id_niveau
    JOIN semestre s ON c.id_semestre = s.id_semestre
    WHERE c.id_niveau = ? AND c.id_semestre = ?
    ORDER BY c.date_ajout DESC
");
$stmt->execute([$niveau, $semestre]);
$contenus = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">
<?php foreach ($contenus as $contenu): ?>
    <?php
        $filePath    = __DIR__ . "/../../uploads/" . $contenu['fichier_contenu'];
        $isDecrypted = false;
        $tempPath    = null;

        // Déchiffrement uniquement si étudiant et niveau autorisé
        if ($groupKey && $contenu['id_niveau'] == $id_niveau_user) {
            try {
                $tempPath    = decryptFileToTemp($filePath, $groupKey);
                $isDecrypted = true;
            } catch (Exception $e) {
                $isDecrypted = false;
            }
        }

        // Type MIME pour l’aperçu
        $mimeType = mime_content_type($filePath);
    ?>
    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($contenu['titre_contenu']) ?></h5>
                <p class="card-text">
                    <strong>Niveau :</strong> <?= htmlspecialchars($contenu['nom_niveau']) ?><br>
                    <strong>Semestre :</strong> <?= htmlspecialchars($contenu['nom_semestre']) ?><br>
                    <strong>Filière :</strong> <?= htmlspecialchars($contenu['nom_filiere']) ?>
                </p>

                <?php if ($isDecrypted && $tempPath): ?>
                    <!-- Aperçu -->
                    <?php if (str_starts_with($mimeType, "image/")): ?>
                        <img src="<?= str_replace(__DIR__, '', $tempPath) ?>" class="img-fluid rounded" alt="aperçu image">
                    <?php elseif ($mimeType === "application/pdf"): ?>
                        <embed src="<?= str_replace(__DIR__, '', $tempPath) ?>" type="application/pdf" width="100%" height="200px"/>
                    <?php elseif (str_starts_with($mimeType, "video/")): ?>
                        <video controls width="100%">
                            <source src="<?= str_replace(__DIR__, '', $tempPath) ?>" type="<?= $mimeType ?>">
                            Votre navigateur ne supporte pas la vidéo.
                        </video>
                    <?php else: ?>
                        <i class="bi bi-file-earmark-text fs-1"></i>
                    <?php endif; ?>

                    <!-- Boutons -->
                    <div class="mt-3">
                        <a href="<?= str_replace(__DIR__, '', $tempPath) ?>" target="_blank" class="btn btn-primary btn-sm">Ouvrir</a>
                        <a href="<?= str_replace(__DIR__, '', $tempPath) ?>" download class="btn btn-success btn-sm">Télécharger</a>
                    </div>
                <?php else: ?>
                    <!-- Si non autorisé -->
                    <p class="text-muted">🔒 Contenu chiffré</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
