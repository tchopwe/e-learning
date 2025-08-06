<?php
	// Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	require_once('action/Connexion.php');
	
	// Ici, Je Récupère Toutes Les Valeurs du Formulaire Avant d'Exécuter La REQUETTE SQL Pour Mise à Jour des Données
	
	$NomClient=$_POST['NomClient'];
	
	$AgenceClient=$_POST['AgenceClient'];
	
	$ContactClient=$_POST['ContactClient'];

	$Date_MClient=$_POST['Date_MClient'];

	$ObjetClient=$_POST['ObjetClient'];

	$TraitementClient=$_POST['TraitementClient'];
		
	//Ici, Je Tape Ma REQUETTE SQL Pour Mise à Jour de La Ligne, Et On Modifie Suivant La Clé Primaire Donc Je Dois Toujours Mettre La Colonne1 à La Fin
	$requete= "UPDATE client SET NomClient = ?, AgenceClient = ?, ContactClient = ?, Date_MClient = ?, ObjetClient = ?, TraitementClient = ? WHERE idClient = ?";
	
	//Ici, Je Construis Le Tableau des Paramètres En Fonction des Valeurs Et Toujours Terminer Par Colonne1, La Colonne Clé Primaire de La Table
	$param=array($NomClient,$AgenceClient,$ContactClient,$Date_MClient,$ObjetClient,$TraitementClient);
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
		header("location:ListeClients.php");
	 }
	
?>