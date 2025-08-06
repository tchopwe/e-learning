<?php
    require_once('action/connexion.php');
    session_start();

     $_SESSION=[];
 
      session_destroy();

    header('location:/messageries/login.php');
 ?>
 





