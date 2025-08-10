<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM client"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreClient = $ListedesTable->rowCount();


    $ListeOfUsers = $dam->query("SELECT * FROM groupe"); // Je Mets Le Nom de Ma Table à Manipuler

    $nombreUsers = $ListeOfUsers->rowCount();
	
	
	$ListeOfUsers=$_GET['id_groupe'];
	
	$requete="DELETE FROM groupe WHERE id_groupe = ?";			
	
	$param=array($ListeOfUsers);	
	
	$resultat = $dam->prepare($requete);	
	
	$resultat->execute($param);	
	
	include("ListeGroupe.php");
?>