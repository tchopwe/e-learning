<?php		
	try {

	    $dam = new PDO("mysql:host=localhost;dbname=e_learning", 
	        "root", "");
		$dam->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
		// echo 'Connexion Réussie';
		
	}catch (Exception $e){
		die('Erreur : ' . $e->getMessage());	
	}	
?>