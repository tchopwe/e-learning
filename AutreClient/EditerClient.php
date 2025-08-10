
<?php
	require_once('action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM client"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreClient = $ListedesTable->rowCount();


    $ListeOfUsers = $dam->query("SELECT * FROM utilisateur"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUsers = $ListeOfUsers->rowCount();

    
?>

<
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Crédit du sahel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users"></i>
                    <span>Clients</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Listing client</h6>
                        <a class="collapse-item" href="ListeClients.php">Liste client</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- Divider -->
            <hr class="sidebar-divider">

          

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-clone"></i>
                    <span>Dossier</span>
                </a>
            </li>

            <!-- Nav Item - Charts -->

            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/cs.jpg" alt="...">
                <p class="text-center mb-2"><strong>Crédit du sahel</strong> <br>Proche de vous pour le progrès!</p>
                <!--<a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a> -->
            </div>

        </ul>
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
                                <button class="btn btn-warning" type="button">
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
                                            <button class="btn btn-warning" type="button">
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
	$ARE17 =$_GET['idClient'];
	
	// Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	require_once('action/Connexion.php');
	
	// Je Mets Le Nom de Ma Table à Manipuler En Spécifiant La Condition Sur La Colonne Clé Primaire
	$ListeClients ="SELECT * FROM client WHERE idClient = '$ARE17'";
	
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
									<h1><center>Modifier Les Informations Sur Le Client </center></h1>
								</div>
							</legend><br>
							<div class="row"><!-- Je Dois Mettre Le Nom du Script Qui Va Valider La Modification des Valeurs -->
                                <div class="col-lg-3">
                                    <p></p>
                                </div>
                               <div class="col-lg-6">
								<form method="post" action="UpdateClient.php" enctype="multipart/form-data">
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="NomClient">NomClient</label>
										<input type="text" name="NomClient" class="form-control"  size="50" id="NomClient" value="<?php echo $LaListe['NomClient']; ?>"/>
									</div>
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="AgenceClient">AgenceClient</label><br>
										<input type="text" name="AgenceClient"  class="form-control" size="50" id="AgenceClient" value="<?php echo $LaListe['AgenceClient']; ?>"/>
									</div>
							
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="ContactClient">ContactClient</label><br>
										<input type="text" name="ContactClient" class="form-control"  size="50" id="ContactClient" value="<?php echo $LaListe['ContactClient']; ?>"/>
									</div>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="Date_MClient">Date_MClient</label><br>
										<input type="text" name="Date_MClient" class="form-control"  size="50" id="Date_MClient" value="<?php echo $LaListe['Date_MClient']; ?>"/>
									</div>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="ObjetClient">ObjetClient</label><br>
										<input type="text" name="ObjetClient" class="form-control"  size="50" id="ObjetClient" value="<?php echo $LaListe['ObjetClient']; ?>"/>
									</div>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="TraitementClient">TraitementClient</label><br>
										<input type="text" name="TraitementClient" class="form-control"  size="50" id="TraitementClient" value="<?php echo $LaListe['TraitementClient']; ?>"/>
									</div><br>
									
								
									
									<!-- Je Peux Changer Le Libellé -->
									<button type="submit" class="btn btn-success mr-3">Enregistrer Mofications</button>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									
									<!-- Ici, Je Dois Mettre Le Nom du Fichier Afin de Revenir Sur La Liste des Eléments de La Table -->
									<a href="ListeClients.php"> <button class="btn btn-danger"> Annuler</button></a>
								
								</form>
                                </div> 
							</div>
						</fieldset>
				</div>
			</div>
		</body>
</html>