				 
<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données


	$Lib2 = $_POST['id_utilisateur'];
	
	$Lib3 = $_POST['nom'];	
	
	$Lib4 = $_POST['prenom'];	

	$Lib5 = $_POST['email'];	

	$Lib6 = $_POST['mot_de_passe'];	

	$Lib7 = $_POST['type_utilisateur'];	

	$Lib7 = $_POST['id_groupe'];	
	
	$requete = "INSERT INTO utilisateur (id_utilisateur,nom,prenom,email,mot_de_passe,type_utilisateur,id_groupe) VALUES (?,?,?,?,?,?,?)";	
	
	$param = array($Lib2,$Lib3,$Lib4,$Lib5,$Lib6,$Lib7);	
	// var_dump($param);
	// die();
	$resultat = $dam->prepare($requete);

	$resultat->execute($param);
		
	header("location:ListeUtilisateur.php");
?>