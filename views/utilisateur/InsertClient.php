				 
<?php
	require_once('action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données


	$Lib2 = $_POST['NomClient'];
	
	$Lib3 = $_POST['AgenceClient'];	
	
	$Lib4 = $_POST['ContactClient'];	

	$Lib5 = $_POST['Date_MClient'];	

	$Lib6 = $_POST['ObjetClient'];	

	$Lib7 = $_POST['TraitementClient'];	
	
	$requete = "INSERT INTO client (NomClient,AgenceClient,ContactClient,Date_MClient,ObjetClient,TraitementClient) VALUES (?,?,?,?,?,?)";	
	
	$param = array($Lib2,$Lib3,$Lib4,$Lib5,$Lib6,$Lib7);	
	// var_dump($param);
	// die();
	$resultat = $dam->prepare($requete);

	$resultat->execute($param);
		
	header("location:ListeClients.php");
?>