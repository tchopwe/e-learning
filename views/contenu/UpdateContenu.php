<?php
	// Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	require_once('action/Connexion.php');
	
	// Ici, Je Récupère Toutes Les Valeurs du Formulaire Avant d'Exécuter La REQUETTE SQL Pour Mise à Jour des Données
	
	$NomClient=$_POST['id_contenu'];
	
	$AgenceClient=$_POST['titre_contenu'];
	
	$ContactClient=$_POST['type_contenu'];

	$Date_MClient=$_POST['url_fichier'];

	$ObjetClient=$_POST['chiffre'];

	$TraitementClient=$_POST['id_cours'];

	$Traitementgroupe=$_POST['id_groupe'];

	$Traitementgroupe=$_POST['id_utilisateur'];
		
	//Ici, Je Tape Ma REQUETTE SQL Pour Mise à Jour de La Ligne, Et On Modifie Suivant La Clé Primaire Donc Je Dois Toujours Mettre La Colonne1 à La Fin
	$requete= "UPDATE contenu SET id_contenu = ?, titre_contenu = ?, type_contenu = ?, url_fichier = ?, chiffre = ?, id_cours = ?, id_groupe = ?, id_utilisateur = ? WHERE id_contenu = ?";
	
	//Ici, Je Construis Le Tableau des Paramètres En Fonction des Valeurs Et Toujours Terminer Par Colonne1, La Colonne Clé Primaire de La Table
	$param=array($NomClient,$AgenceClient,$ContactClient,$Date_MClient,$ObjetClient,$TraitementClient,$Traitementgroupe);
	// var_dump($param);
	// die();
	// //Ici, Je Prépare Ma REQUETTE SQL
	$resultat = $dam->prepare($requete);
	
	//Ici, Je Parts Exécuter Ma REQUETTE dans Le SGBDR Courant
	 $don = $resultat->execute($param);	
	 if (!$don) {
		echo " ce grave mama ";
	 }else {
		//Ici, Après Exécution de La REQUETTE, Je Dois Automatiquement REVENIR Sur La Liste des Eléments de La Table
		header("location:ListeContenu.php");
	 }
	
?>