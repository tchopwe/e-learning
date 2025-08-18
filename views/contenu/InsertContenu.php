				 
<?php
	require_once('../../action/connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données

	$Lib1 = $_POST['id_contenu'];
	
	$Lib2 = $_POST['titre_contenu'];	
	
	$Lib3 = $_POST['type_contenu'];	

	$Lib4 = $_POST['url_fichier'];	

	$Lib5 = $_POST['chiffre'];	

	$Lib6 = $_POST['id_cours'];	

	$Lib7 = $_POST['id_groupe'];	

	$Lib8 = $_POST['id_utilisateur'];
	
	$requete = "INSERT INTO contenu (id_contenu,titre_contenu,type_contenu,url_fichier,chiffre,id_cours,id_groupe,id_utilisateur) VALUES (?,?,?,?,?,?,?,?)";	
	
	$param = array($Lib1,$Lib2,$Lib3,$Lib4,$Lib5,$Lib6,$Lib7,$Lib8);	
	// var_dump($param);
	// die();
	$resultat = $dam->prepare($requete);

	$resultat->execute($param);
		
	header("location:ListeContenu.php");
?>