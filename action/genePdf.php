<?php

use Dompdf\Dompdf;

require_once('connexion.php'); // Ici, J'Inclus Le Fichier Pour Vérifier Que L'Utilisateur Est Bien Connecté à Ma Base de Données
	
	$ListedesTable = $dam->query("SELECT * FROM client") ;
     
	// la fonction qui permet de garder les variable avant le telechargement
	ob_start();
	require_once('../ListeclientPDF.php');

	// recuperation 
	$fichier = ob_get_contents();
	//pour stoper
	ob_end_clean();

require_once('../dompdf/autoload.inc.php') ;
/**
 * le new Dompdf permet de créer un objet pdf 
 * @return {un objet pdf}
 * @param {comme la tete de EMI et Jolie mignonne}
 */
$dompdf = new Dompdf() ;

/**
 * s'il à une preference sur police de caractère et la case il remplace
 * la fonction {Dompdf()} par {Option()}
 * et ajouter à la ligne suivant $dompdf->set('defaultFont','Courier')
 */

/**
 * permet le chargement des balise html on peut dire sa comme ca
 * et des textes
 */
$dompdf->loadHtml($fichier) ;

// pas besoin de l'expliquer
$dompdf->setPaper('A4','portrait') ;

/**
 * permet de charger le document pdf en memoire
 */
$dompdf->render() ;

/**
 * permet de renvoyer le fichier sous forme telechargeable
 */
$dompdf->stream() ;

?>