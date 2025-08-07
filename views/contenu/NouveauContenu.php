<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM utilisateur"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUtilisateur= $ListedesTable->rowCount();


    $Listedegroup = $dam->query("SELECT * FROM groupe"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreGroup = $Listedegroup->rowCount();


    $ListedesContenu= $dam->query("SELECT * FROM contenu"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreContenu= $ListedesContenu->rowCount();


    
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php require_once('../../siderbar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-100 my-100 my-md-100 mw-0 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-2"></div>
                        
                            <div class="col-lg-8">
                                <div >
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ajouter un nouveau utilisateur</h1>
                                    </div>
                                    <form method="POST" action="InsertContenu.php" class="form">
             
                                            <div class="form-group">
                                            <label for="id_contenu"  class="control-label">Identifiant </label><br>
                                                <input type="text" name="id_contenu" class="form-control form-control-user" id="id_contenu"
                                                    placeholder="Identifiant">
                                            </div>
                                        
                                        <div class="form-group">
                                        <label for="titre_contenu" class="control-label">titre_contenu</label><br>
                                            <input type="text" name="titre_contenu" class="form-control form-control-user" id="titre_contenu"
                                                placeholder="titre_contenu">
                                        </div>
                                        

                                            <div class="form-group">
                                            <label for="type_contenu" class="control-label">type_contenu</label><br>
                                                <input type="text"  name="type_contenu" class="form-control form-control-user"
                                                    id="type_contenu" placeholder="type_contenu">
                                            </div>
                                            <div class="form-group">
                                            <label for="url_fichier" class="control-label">url_fichier</label><br>
                                                <input type="url_fichier" name="url_fichier"  class="form-control form-control-user"
                                                    id="url_fichier" placeholder="url_fichier">
                                            </div>
                                            <div class="form-group">
                                            <label for="mot_de_passe" class="control-label">Mot de passe</label><br>
                                                <input type="password" name="mot_de_passe"  class="form-control form-control-user"
                                                    id="mot_de_passe" placeholder="Mot de passe">
                                            </div>
                                            <div class="form-group">
                                            <label for="type_utilisateur" class="control-label">Type d'utilisateur</label><br>
                                                <input type="text" name="type_utilisateur"  class="form-control form-control-user"
                                                    id="type_utilisateur" placeholder="Type d'utilisateur">
                                            </div>
                                            <div class="form-group">
                                            <label for="id_groupe" class="control-label">Identifiant du groupe</label><br>
                                                <input type="text" name="id_groupe"  class="form-control form-control-user"
                                                    id="id_groupe" placeholder="Identifiant du groupe">
                                            </div>
                                        
                                        <button type="submit" class="btn btn-success"> valider </button>
                                        <hr>
                                    </form>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->

            </div>

            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; LeeM</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
                <!-- Begin Page Content -->
