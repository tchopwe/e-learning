				 
<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données


	$Lib2 = $_POST['id_cours'];
	
	$Lib3 = $_POST['titre'];	
	
	$Lib4 = $_POST['description'];	

	$Lib5 = $_POST['id_enseignant'];	

	$Lib6 = $_POST['id_semestre'];	
		
	$requete = "INSERT INTO cours (id_cours,titre,description,id_enseignant,id_semestre) VALUES (?,?,?,?,?)";	
	
	$param = array($Lib2,$Lib3,$Lib4,$Lib5,$Lib6,);	
	// var_dump($param);
	// die();
	$resultat = $dam->prepare($requete);

	$resultat->execute($param);
		
	header("location:ListeCours.php");
?>