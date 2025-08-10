<?php
	// Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	require_once('../../action/Connexion.php');
	
	// Ici, Je Récupère Toutes Les Valeurs du Formulaire Avant d'Exécuter La REQUETTE SQL Pour Mise à Jour des Données
	
	$IdGroupe=$_POST['id_groupe'];
	
	$NomGroupe=$_POST['nom_groupe'];
	
	$NiveauGroupe=$_POST['niveau'];

	$CleChiffrement=$_POST['cle_chiffrement'];

		
	//Ici, Je Tape Ma REQUETTE SQL Pour Mise à Jour de La Ligne, Et On Modifie Suivant La Clé Primaire Donc Je Dois Toujours Mettre La Colonne1 à La Fin
	$requete= "UPDATE groupe SET nom_groupe = ?, niveau = ?, cle_chiffrement = ? WHERE id_groupe = ?";
	
	//Ici, Je Construis Le Tableau des Paramètres En Fonction des Valeurs Et Toujours Terminer Par Colonne1, La Colonne Clé Primaire de La Table
	$param=array($IdGroupe,$NomGroupe,$NiveauGroupe,$CleChiffrement);
	//var_dump($param);
	//die();
	// //Ici, Je Prépare Ma REQUETTE SQL
	$resultat = $dam->prepare($requete);
	
	//Ici, Je Parts Exécuter Ma REQUETTE dans Le SGBDR Courant
	 $don = $resultat->execute($param);	
	 if (!$don) {
		echo " ce grave mama ";
	 }else {
		//Ici, Après Exécution de La REQUETTE, Je Dois Automatiquement REVENIR Sur La Liste des Eléments de La Table
		header("location:ListeGroupe.php");
	 }
	
?>