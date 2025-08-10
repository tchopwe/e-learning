				 
<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données


	$Lib2 = $_POST['id_semestre'];
	
	$Lib3 = $_POST['nom_semestre'];	
	
	$Lib4 = $_POST['niveau'];	

	$Lib5 = $_POST['annee_academique'];	

	$requete = "INSERT INTO semestre (id_semestre,nom_semestre,niveau,annee_academique) VALUES (?,?,?,?)";	
	
	$param = array($Lib2,$Lib3,$Lib4,$Lib5);	
	// var_dump($param);
	// die();
	$resultat = $dam->prepare($requete);

	$resultat->execute($param);
		
	include("ListeSemestre.php");
?>