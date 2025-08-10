<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM utilisateur"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUtilisateur= $ListedesTable->rowCount();


    $Listedegroup = $dam->query("SELECT * FROM groupe"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreGroup = $Listedegroup->rowCount();


    $ListedesContenu= $dam->query("SELECT * FROM contenu"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreContenu= $ListedesContenu->rowCount();


    
?>

<?php
	//Ici, Je Récupère Le ID, Ou Le Nom de La Colonne Clé Primaire de La Table
	$ARE17 =$_GET['id_groupe'];
	
	// Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	require_once('../../action/Connexion.php');
	
	// Je Mets Le Nom de Ma Table à Manipuler En Spécifiant La Condition Sur La Colonne Clé Primaire
	$ListeClients ="SELECT * FROM groupe WHERE id_groupe = '$ARE17'";
	
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
									<h1><center>Modifier Les Informations Sur Le Groupe </center></h1>
								</div>
							</legend><br>
							<div class="row"><!-- Je Dois Mettre Le Nom du Script Qui Va Valider La Modification des Valeurs -->
                                <div class="col-lg-3">
                                    <p></p>
                                </div>
                               <div class="col-lg-6">
								<form method="post" action="UpdateGroupe.php" enctype="multipart/form-data">
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="id_groupe">Identifiant</label>
										<input type="text" name="id_groupe" class="form-control"  size="50" id="id_groupe" value="<?php echo $LaListe['id_groupe']; ?>"/>
									</div>
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="nom_groupe">Noms du groupe</label><br>
										<input type="text" name="nom_groupe"  class="form-control" size="50" id="nom_groupe" value="<?php echo $LaListe['nom_groupe']; ?>"/>
									</div>
							
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="niveau">Niveau concerner</label><br>
										<input type="text" name="niveau" class="form-control"  size="50" id="niveau" value="<?php echo $LaListe['niveau']; ?>"/>
									</div>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="cle_chiffrement">clé de chiffrement</label><br>
										<input type="text" name="cle_chiffrement" class="form-control"  size="50" id="cle_chiffrement" value="<?php echo $LaListe['cle_chiffrement']; ?>"/>
									</div>
									
								
									
									<!-- Je Peux Changer Le Libellé -->
									<button type="submit" class="btn btn-success mr-3">Enregistrer Mofications</button>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									
									<!-- Ici, Je Dois Mettre Le Nom du Fichier Afin de Revenir Sur La Liste des Eléments de La Table -->
									<a href="ListeGroupe.php"> <button class="btn btn-danger"> Annuler</button></a>
								
								</form>
                                </div> 
							</div>
						</fieldset>
				</div>
			</div>
