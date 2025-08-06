				 
<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données


	$Lib2 = $_POST['id_group'];
	
	$Lib3 = $_POST['nom_groupe'];	
	
	$Lib4 = $_POST['niveau'];	

	$Lib5 = $_POST['cle_chiffrement'];	
	
	
	$requete = "INSERT INTO groupe (id_group,nom_groupe,niveau,cle_chiffrement) VALUES (?,?,?,?)";	
	
	$param = array($Lib2,$Lib3,$Lib4);	
	// var_dump($param);
	// die();
	$resultat = $dam->prepare($requete);

	$resultat->execute($param);
		
	header("location:ListeGroupe.php");
?>