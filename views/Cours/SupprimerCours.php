<?php
	require_once('action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM client"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreClient = $ListedesTable->rowCount();


    $ListeOfUsers = $dam->query("SELECT * FROM utilisateur"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUsers = $ListeOfUsers->rowCount();
	
	
	$LaClasse=$_GET['idClient'];
	
	$requete="DELETE FROM client WHERE idClient = ?";			
	
	$param=array($LaClasse);	
	
	$resultat = $dam->prepare($requete);	
	
	$resultat->execute($param);	
	
	header("location:ListeClients.php");
?>