<?php
	require_once('action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM client"); // Je Mets Le Nom de Ma Table à Manipuler
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Liste des Clients</title> <!-- Je Peux Donner Un Titre à Ma Page -->
	</head>
	<body>
				<fieldset>
					    <H1>Liste des Clients</H1><br> <!-- Je Peux Changer Le Titre -->
						<center>
							<table border=1 >
								<thead>
                                        <tr>
                                            <th>Identifiant</th>
                                            <th>Noms du client</th>
                                            <th>Agence du client</th>
                                            <th>Contact du client</th>
                                            <th>Date M client</th>
                                            <th>Objet client</th>
                                            <th>Traitement client</th>
                                        </tr>
								</thead>
								<tbody><!-- Ici, Je Récupère Les Valeurs des Résultats de La REQUETTE -->
								
                                    <?php while($RecupListe=$ListedesTable->fetch()){?> 
									
										<tr> <!-- Ici, Je Mets Les Noms des Colonnes, Je Dis Bien Les Noms des Colonnes -->
										
                                        <td align="center"><?php echo $RecupListe['idClient'] ?></td>
											<td><?php echo $RecupListe['NomClient'] ?></td>
											<td><?php echo $RecupListe['AgenceClient'] ?></td>
											<td><?php echo $RecupListe['ContactClient'] ?></td>
											<td><?php echo $RecupListe['Date_MClient'] ?></td>
                                            <td><?php echo $RecupListe['ObjetClient'] ?></td>
                                            <td><?php echo $RecupListe['TraitementClient'] ?></td>
												<?php } ?>
											</td>
										</tr>
								</tbody>
							</table><br><br><!-- Ici, Je Dois Préciser Le Fichier Pour Appeler Le Formulaire de Saisie d'Une Nouvelle Ligne de Données -->
						</center>
				</fieldset>
	</body>
</html>