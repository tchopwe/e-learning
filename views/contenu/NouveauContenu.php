<?php
require_once('../../action/Connexion.php');

// --- Récupération des données pour les <select> ---
$typeUtilisateurs = $dam->query("SELECT id_utilisateur, nom FROM utilisateur")->fetchAll(PDO::FETCH_ASSOC);
$groupes          = $dam->query("SELECT id_groupe, nom_groupe, cle_chiffrement FROM groupe")->fetchAll(PDO::FETCH_ASSOC);
$cours            = $dam->query("SELECT id_cours, titre FROM cours")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2 class="mb-4">Ajouter un contenu</h2>

    <form id="formNouveauContenu" class="Ajax-form" action="views/contenu/upload.php" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="titre_contenu">Titre contenu <span class="text-danger">*</span></label>
            <input type="text" name="titre_contenu" id="titre_contenu" class="form-control" required>
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
                Le type sera validé automatiquement selon l’extension du fichier.
            </small>
        </div>

        <div class="form-group">
            <label for="fichier">Fichier <span class="text-danger">*</span></label>
            <input type="file" name="fichier" id="fichier" class="form-control-file" required>
        </div>

        <div class="form-group">
            <label for="description">Description <span class="text-danger">*</span></label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="id_cours">Cours concerné <span class="text-danger">*</span></label>
            <select name="id_cours" id="id_cours" class="form-control" required>
                <option value="">--Sélectionner--</option>
                <?php foreach ($cours as $c): ?>
                    <option value="<?= (int)$c['id_cours'] ?>"><?= htmlspecialchars($c['titre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_groupe">Groupe (clé utilisée pour chiffrer) <span class="text-danger">*</span></label>
            <select name="id_groupe" id="id_groupe" class="form-control" required>
                <option value="">--Sélectionner--</option>
                <?php foreach ($groupes as $g): ?>
                    <option value="<?= (int)$g['id_groupe'] ?>">
                        <?= htmlspecialchars($g['nom_groupe']) ?>
                        <?= !empty($g['cle_chiffrement']) ? '(clé OK)' : '(clé absente → sera générée)' ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_utilisateur">Utilisateur <span class="text-danger">*</span></label>
            <select name="id_utilisateur" id="id_utilisateur" class="form-control" required>
                <option value="">--Sélectionner--</option>
                <?php foreach ($typeUtilisateurs as $u): ?>
                    <option value="<?= (int)$u['id_utilisateur'] ?>"><?= htmlspecialchars($u['nom']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


