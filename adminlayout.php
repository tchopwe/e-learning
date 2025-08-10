<?php
require_once('action/connexion.php');
?>
 <?php
	require_once('action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM utilisateur"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUtilisateur= $ListedesTable->rowCount();


    $Listedegroup = $dam->query("SELECT * FROM groupe"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreGroup = $Listedegroup->rowCount();


    $ListedesContenu= $dam->query("SELECT * FROM contenu"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreContenu= $ListedesContenu->rowCount();


    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>
</head>
<body id="page-top">

<div id="wrapper">
    <!-- Sidebar -->
    <?php include ('sidebar.php'); ?>
    <!-- End Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Header -->
            <?php include ('topbar.php'); ?>
            <!-- End Header -->

            <!-- Contenu dynamique -->
            <div class="container-fluid" id="main-content">
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-blue-800"><b>Tableau de bord</b></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-6">
                            <div class="card border-bottom-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-4">
                                                <h5><b>Total Utilisateur</b></h5></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h5><b><?= $nombreUtilisateur ?></b></h5></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-6">
                            <div class="card border-bottom-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-4">
                                                <h5><b>Total Groupe</b></h5></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h5><b><?= $nombreGroup ?></b></h5></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-6">
                            <div class="card border-bottom-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-4">
                                                <h5><b>Total Contenus</b></h5></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h5><b><?= $nombreContenu ?></b></h5></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book-reader"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            </div>
        </div>
        <!-- End Main Content -->

        <!-- Footer -->
        <?php include 'footer.php'; ?>
        <!-- End Footer -->

    </div>
</div>

<script>
$(document).on('click', '.ajax-link', function(e) {
    e.preventDefault(); // Empêche le rechargement normal

    var url = $(this).attr('href');

    $('#main-content').load(url, function(response, status, xhr) {
        if (status == "error") {
            $('#main-content').html("<p>Erreur de chargement : " + xhr.status + " " + xhr.statusText + "</p>");
        }
    });
});

$(document).on('submit', '.ajax-form', function(e) {
    e.preventDefault(); // empêche le rechargement complet

    var form = $(this);
    $.post(form.attr('action'), form.serialize(), function(data) {
        $('#main-content').html(data); // met la liste mise à jour
    });
});

</script>

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="asset/js/sb-admin-2.min.js"></script>

</body>
</html>
