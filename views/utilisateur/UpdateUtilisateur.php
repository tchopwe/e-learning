<?php
	// Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	require_once('../../action/Connexion.php');
	
	// Ici, Je Récupère Toutes Les Valeurs du Formulaire Avant d'Exécuter La REQUETTE SQL Pour Mise à Jour des Données

	
	$NomUtilisateur=$_POST['nom'];
	
	$PrenomUtilisateur=$_POST['prenom'];

	$EmailUtilisateur=$_POST['email'];

	$MotDePasseUtilisateur=$_POST['mot_de_passe'];

	$TypeUtilisateur=$_POST['type_utilisateur'];

	$IdGroupe=$_POST['id_groupe'];
		
	//Ici, Je Tape Ma REQUETTE SQL Pour Mise à Jour de La Ligne, Et On Modifie Suivant La Clé Primaire Donc Je Dois Toujours Mettre La Colonne1 à La Fin
	$requete= "UPDATE utilisateur SET nom = ?, prenom = ?, email = ?, mot_de_passe = ?, type_utilisateur = ?, id_groupe = ? WHERE id_utilisateur = ?";
	
	//Ici, Je Construis Le Tableau des Paramètres En Fonction des Valeurs Et Toujours Terminer Par Colonne1, La Colonne Clé Primaire de La Table
	$param=array($NomUtilisateur,$PrenomUtilisateur,$EmailUtilisateur,$MotDePasseUtilisateur,$TypeUtilisateur,$IdGroupe);
	//var_dump($param);
	//die();
	// //Ici, Je Prépare Ma REQUETTE SQL
	$resultat = $dam->prepare($requete);
	
	//Ici, Je Parts Exécuter Ma REQUETTE dans Le SGBDR Courant
	 $don = $resultat->execute($param);	
	 $resultat->execute($param);
	if ($resultat->errorCode() != "00000") {
	    print_r($resultat->errorInfo());
	    exit;
		}else {
		//Ici, Après Exécution de La REQUETTE, Je Dois Automatiquement REVENIR Sur La Liste des Eléments de La Table
		include("ListeUtilisateur.php");
	 }
	
?>