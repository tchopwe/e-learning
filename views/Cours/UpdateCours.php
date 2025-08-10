<?php
	// Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	require_once('../../action/Connexion.php');
	
	// Ici, Je Récupère Toutes Les Valeurs du Formulaire Avant d'Exécuter La REQUETTE SQL Pour Mise à Jour des Données
	
	$id_cours=$_POST['id_cours'];
	
	$titre=$_POST['titre'];
	
	$description=$_POST['description'];

	$id_enseignant=$_POST['id_enseignant'];

	$id_semestre=$_POST['id_semestre'];
		
	//Ici, Je Tape Ma REQUETTE SQL Pour Mise à Jour de La Ligne, Et On Modifie Suivant La Clé Primaire Donc Je Dois Toujours Mettre La Colonne1 à La Fin
	$requete= "UPDATE cours SET id_cours = ?, titre = ?, description = ?, id_enseignant = ?, id_semestre = ?, WHERE id_cours = ?";
	
	//Ici, Je Construis Le Tableau des Paramètres En Fonction des Valeurs Et Toujours Terminer Par Colonne1, La Colonne Clé Primaire de La Table
	$param=array($titre,$description,$id_enseignant,$id_semestre,$id_cours);
	// var_dump($param);
	// die();
	// //Ici, Je Prépare Ma REQUETTE SQL
	$resultat = $dam->prepare($requete);
	
	//Ici, Je Parts Exécuter Ma REQUETTE dans Le SGBDR Courant
	 $don = $resultat->execute($param);	
	 if (!$don) {
		echo " c'est grave mama ";
	 }else {
		//Ici, Après Exécution de La REQUETTE, Je Dois Automatiquement REVENIR Sur La Liste des Eléments de La Table
		include("ListeCours.php");
	 }
	
?>