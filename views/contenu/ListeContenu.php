<?php
require_once('../../action/Connexion.php');

// Récupération des contenus
$sql = "SELECT id_contenu, titre_contenu, type_contenu, url_fichier, id_groupe, id_utilisateur, id_cours, Description 
        FROM contenu";
$stmt = $dam->prepare($sql);
$stmt->execute();
$contenus = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">
<?php foreach ($contenus as $contenu): ?>
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?= htmlspecialchars($contenu['titre_contenu']) ?>
                </h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink<?= $contenu['id_contenu'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink<?= $contenu['id_contenu'] ?>">
                        <div class="dropdown-header">Voulez-vous?</div>
                        <!-- Bouton ouvrir -->
                        <a class="dropdown-item" target="_blank" href="<?= htmlspecialchars($contenu['url_fichier']) ?>">Ouvrir</a>
                        <!-- Bouton télécharger -->
                        <a class="dropdown-item" href="<?= htmlspecialchars($contenu['url_fichier']) ?>" download>Télécharger</a>
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2 text-center">
                    <?php
                        $type = strtolower($contenu['type_contenu']);
                        if ($type == 'image') {
                            echo '<img src="'.htmlspecialchars($contenu['url_fichier']).'" alt="Image" style="max-width:100%; height:150px; object-fit:cover;">';
                        } elseif ($type == 'pdf') {
                            echo '<img src="assets/img/pdf-icon.png" alt="PDF" style="height:100px;">';
                        } elseif ($type == 'video') {
                            echo '<video width="100%" height="150" controls>
                                    <source src="'.htmlspecialchars($contenu['url_fichier']).'" type="video/mp4">
                                    Votre navigateur ne supporte pas la vidéo.
                                  </video>';
                        } else {
                            echo '<i class="fas fa-file fa-5x text-secondary"></i>';
                        }
                    ?>
                </div>
                <div class="card-footer mt-4 text-center small">
                    <?= !empty($contenu['description']) ? htmlspecialchars($contenu['description']) : 'Aucune description disponible' ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
