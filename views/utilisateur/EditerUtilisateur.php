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
	$ARE17 =$_GET['id_utilisateur'];
	
	// Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	require_once('../../action/Connexion.php');
	
	// Je Mets Le Nom de Ma Table à Manipuler En Spécifiant La Condition Sur La Colonne Clé Primaire
	$ListeClients ="SELECT * FROM utilisateur WHERE id_utilisateur = '$ARE17'";
	
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
								<form method="post" action="views/utilisateur/UpdateUtilisateur.php" enctype="multipart/form-data" class="ajax-form">
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="id_utilisateur">Identifiant</label>
										<input type="text" name="id_utilisateur " class="form-control"  size="50" id="id_utilisateur" value="<?php echo $LaListe['id_utilisateur']; ?>"/>
									</div>
									
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="nom">Noms de l'utilisateur </label><br>
										<input type="text" name="nom"  class="form-control" size="50" id="nom" value="<?php echo $LaListe['nom']; ?>"/>
									</div>
							
									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="prenom">Prenom de l'utilisateur</label><br>
										<input type="text" name="prenom" class="form-control"  size="50" id="prenom" value="<?php echo $LaListe['prenom']; ?>"/>
									</div>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="email">Email de l'utilisateur</label><br>
										<input type="email" name="email" class="form-control"  size="50" id="email" value="<?php echo $LaListe['email']; ?>"/>
									</div>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->
										<label for="mot_de_passe">Mot de passe</label><br>
										<input type="password" name="mot_de_passe" class="form-control"  size="50" id="mot_de_passe" value="<?php echo $LaListe['mot_de_passe']; ?>"/>
									</div>

									<div><!-- Je Dois Mettre Le Nom de La Colonne Sur For, Id, Name Et Aussi dans $LaListe -->                             <label for="type_utilisateur" class="control-label">Choix du type d'utilisateur</label><br>
                                            <select name="type_utilisateur" class="form-control form-control-user">
                                                <option value="etudiant">Étudiant</option>
                                                <option value="enseignant">Enseignant</option>
                                                <option value="admin">Administrateur</option>
                                            </select>
									</div><br>

                                    <div class="form-group">
                                            <label for="id_groupe" class="control-label">Choix du groupe</label>
                                            <select name="id_groupe" id="id_groupe" class="form-control">
                                                    <?php while($ListeClasse=$Listedegroup->fetch()){ ?>
                                                    <option value="<?php echo $ListeClasse['id_groupe']?>">
                                                        <?php echo $ListeClasse['nom_groupe']?>
                                                    </option>
                                                        <?php } ?>
                                            </select>
                                    </div>
									
								
									
									<!-- Je Peux Changer Le Libellé -->
									<button type="submit" class="btn btn-success mr-3">Enregistrer Mofications</button>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									
									<!-- Ici, Je Dois Mettre Le Nom du Fichier Afin de Revenir Sur La Liste des Eléments de La Table -->
									<a href="views/utilisateur/ListeUtilisateur.php" class="ajax-link"> <button class="btn btn-danger"> Annuler</button></a>
								
								</form>
                                </div> 
							</div>
						</fieldset>
				</div>
			</div>
		</body>
</html>