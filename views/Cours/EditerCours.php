<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM utilisateur"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUtilisateur= $ListedesTable->rowCount();


    $Listedegroup = $dam->query("SELECT * FROM groupe"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreGroup = $Listedegroup->rowCount();


    $ListedesContenu= $dam->query("SELECT * FROM contenu"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreContenu= $ListedesContenu->rowCount();

    $ListeCours= $dam->query("SELECT * FROM cours"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreCours= $ListeCours->rowCount();

	$ListeSemestre= $dam->query("SELECT * FROM semestre")
    
?>

<?php
	//Ici, Je Récupère Le ID, Ou Le Nom de La Colonne Clé Primaire de La Table
	$ARE17 =$_GET['id_cours'];
	
	// Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	require_once('../../action/Connexion.php');
	
	// Je Mets Le Nom de Ma Table à Manipuler En Spécifiant La Condition Sur La Colonne Clé Primaire
	$ListeCours ="SELECT * FROM cours WHERE id_cours = '$ARE17'";
	
	//Ici, Je Récupère Les Valeurs des Résultats de La REQUETTE
	$RecupListe = $dam->query($ListeCours);
	
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
									<h1><center>Modifier Les Informations Sur Le Cours </center></h1>
								</div>
							</legend><br>
							<div class="row"><!-- Je Dois Mettre Le Nom du Script Qui Va Valider La Modification des Valeurs -->
                                <div class="col-lg-3">
                                    <p></p>
                                </div>
                               <div class="col-lg-6">
								<form method="post" action="views/Cours/UpdateCours.php" enctype="multipart/form-data" class="ajax-form">
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="id_cours">Identifiant du Cours</label>
										<input type="text" name="id_cours" class="form-control"  size="50" id="id_cours" value="<?php echo $LaListe['id_cours']; ?>"/>
									</div>
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="titre">Libellé du cours</label><br>
										<input type="text" name="titre"  class="form-control" size="50" id="titre" value="<?php echo $LaListe['titre']; ?>"/>
									</div>
							
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="description">Description du cours</label><br>
										<input type="text" name="description" class="form-control"  size="50" id="description" value="<?php echo $LaListe['description']; ?>"/>
									</div>

                                        
                                    <div class="form-group">
                                        <label for="id_utilisateur" class="control-label">Choix de l'enseignant</label>
                                        <select name="id_enseignant" id="id_utilisateur" class="form-control">
                                            <?php while($ListeClasse=$ListedesTable->fetch()){ ?>
                                            <option value="<?php echo $ListeClasse['id_utilisateur']?>">
                                            	<?php echo $ListeClasse['email']?>
                                            </option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_semestre" class="control-label">Choix du semestre</label>
                                        <select name="id_semestre" id="id_semestre" class="form-control">
                                            <?php while($ListeClasse=$ListeSemestre->fetch()){ ?>
                                                <option value="<?php echo $ListeClasse['id_semestre']?>">
                                                    <?php echo $ListeClasse['nom_semestre']?>
                                                </option>
                                                    <?php } ?>
                                        </select>
                                    </div>	<br>			
														
									<!-- Je Peux Changer Le Libellé -->
									<button type="submit" class="btn btn-success">Enregistrer</button>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									
									<!-- Ici, Je Dois Mettre Le Nom du Fichier Afin de Revenir Sur La Liste des Eléments de La Table -->
									<a href="views/utilisateur/ListeCours.php" class="ajax-link"> <button class="btn btn-danger"> Annuler</button></a>
			
								</form>
                                </div> 
							</div>
						</fieldset>
				</div>
			</div>
		</body>
</html>