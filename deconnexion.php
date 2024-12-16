<?php 
//add Deconnexion function 
  session_start();
  session_unset();
  session_destroy();
  header('location: Connexion.php');
?>