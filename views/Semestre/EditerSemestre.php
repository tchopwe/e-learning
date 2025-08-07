<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM utilisateur"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUtilisateur= $ListedesTable->rowCount();


    $Listedegroup = $dam->query("SELECT * FROM groupe"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreGroup = $Listedegroup->rowCount();


    $ListedesContenu= $dam->query("SELECT * FROM contenu"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreContenu= $ListedesContenu->rowCount();


    $ListedesContenu= $dam->query("SELECT * FROM cours"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreContenu= $ListedesContenu->rowCount();


    $ListedesContenu= $dam->query("SELECT * FROM semestre"); // Je Mets Le Nom de Ma Table à Manipuler

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
<?php
	//Ici, Je Récupère Le ID, Ou Le Nom de La Colonne Clé Primaire de La Table
	$ARE17 =$_GET['id_semestre'];
	
	// Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	require_once('../../action/Connexion.php');
	
	// Je Mets Le Nom de Ma Table à Manipuler En Spécifiant La Condition Sur La Colonne Clé Primaire
	$ListeSemestre ="SELECT * FROM semestre WHERE id_semestre = '$ARE17'";
	
	//Ici, Je Récupère Les Valeurs des Résultats de La REQUETTE
	$RecupListe = $dam->query($ListeSemestre);
	
	//Ici, Je Construit Un Tableau Associatif des Valeurs de Ma REQUETTE
	$LaListe = $RecupListe->fetch();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Editer La Données de La Table</title><!-- Je Peux Donner Un Titre à Ma Page -->
	</head>
		<body>
			<div><br>
				<div>
						<fieldset>
							<legend>
								<div><!-- Je Peux Donner Un Titre à Ma Page -->
									<h1><center>Modifier Les Informations Sur L'etudiant </center></h1>
								</div>
							</legend><br>
							<div class="row"><!-- Je Dois Mettre Le Nom du Script Qui Va Valider La Modification des Valeurs -->
                                <div class="col-lg-3">
                                    <p></p>
                                </div>
                               <div class="col-lg-6">
								<form method="post" action="UpdateSemestre.php" enctype="multipart/form-data">
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="id_semestre">Identifiant</label>
										<input type="text" name="NomSemestre" class="form-control"  size="50" id="id_semestre" value="<?php echo $LaListe['id_semestre']; ?>"/>
									</div>
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="nom">Noms du Semestre </label><br>
										<input type="text" name="nom"  class="form-control" size="50" id="nom" value="<?php echo $LaListe['nom_semestre']; ?>"/>
									</div>
							
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="niveau">Niveau</label><br>
										<input type="text" name="niveau" class="form-control"  size="50" id="niveau" value="<?php echo $LaListe['niveau']; ?>"/>
									</div>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="annee_academique">Année Académiquer</label><br>
										<input type="annee_academique" name="annee_academique" class="form-control"  size="50" id="annee_academique" value="<?php echo $LaListe['annee_academique']; ?>"/>
									</div>
									<!-- Je Peux Changer Le Libellé -->
									<button type="submit" class="btn btn-success mr-3">Enregistrer Mofications</button>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									
									<!-- Ici, Je Dois Mettre Le Nom du Fichier Afin de Revenir Sur La Liste des Eléments de La Table -->
									<a href="ListeSemestre.php"> <button class="btn btn-danger"> Annuler</button></a>
								
								</form>
                                </div> 
							</div>
						</fieldset>
				</div>
			</div>
		</body>
</html>