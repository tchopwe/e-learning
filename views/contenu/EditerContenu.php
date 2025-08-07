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
<?php
	//Ici, Je Récupère Le ID, Ou Le Nom de La Colonne Clé Primaire de La Table
	$ARE17 =$_GET['id_contenu'];
	
	// Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	require_once('../../action/Connexion.php');
	
	// Je Mets Le Nom de Ma Table à Manipuler En Spécifiant La Condition Sur La Colonne Clé Primaire
	$ListeClients ="SELECT * FROM contenu WHERE id_contenu = '$ARE17'";
	
	//Ici, Je Récupère Les Valeurs des Résultats de La REQUETTE
	$RecupListe = $dam->query($ListeClients);
	
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
								<form method="post" action="UpdateContenu.php" enctype="multipart/form-data">
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="titre_contenu">Identifiant du contenus</label>
										<input type="text" name="titre_contenu" class="form-control"  size="50" id="titre_contenu" value="<?php echo $LaListe['titre_contenu']; ?>"/>
									</div>
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="type_contenu">Type de contenus </label><br>
										<input type="text" name="type_contenu"  class="form-control" size="50" id="type_contenu" value="<?php echo $LaListe['type_contenu']; ?>"/>
									</div>
							
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="url_fichier">Url fichiers</label><br>
										<input type="text" name="url_fichier" class="form-control"  size="50" id="url_fichier" value="<?php echo $LaListe['url_fichier']; ?>"/>
									</div>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="chiffre">Email de l'utilisateur</label><br>
										<input type="chiffre" name="chiffre" class="form-control"  size="50" id="chiffre" value="<?php echo $LaListe['chiffre']; ?>"/>
									</div>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="id_cours">id_cours </label><br>
										<input type="id_cours" name="id_cours" class="form-control"  size="50" id="id_cours" value="<?php echo $LaListe['id_cours']; ?>"/>
									</div>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="id_groupe">Type d'utilisateur</label><br>
										<input type="text" name="id_groupe" class="form-control"  size="50" id="id_groupe" value="<?php echo $LaListe['id_groupe']; ?>"/>
									</div><br>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="id_utilisateur">Identifiant du groupe</label><br>
										<input type="text" name="id_utilisateur" class="form-control"  size="50" id="id_utilisateur" value="<?php echo $LaListe['id_utilisateur']; ?>"/>
									</div><br>
									
								
									
									<!-- Je Peux Changer Le Libellé -->
									<button type="submit" class="btn btn-success mr-3">Enregistrer Mofications</button>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									
									<!-- Ici, Je Dois Mettre Le Nom du Fichier Afin de Revenir Sur La Liste des Eléments de La Table -->
									<a href="ListeContenus.php"> <button class="btn btn-danger">Annuler</button></a>
								
								</form>
                                </div> 
							</div>
						</fieldset>
				</div>
			</div>
		</body>
</html>