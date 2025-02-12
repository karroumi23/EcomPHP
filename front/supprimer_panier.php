<?php 
//

session_start();
//if the user it's not connected send him to the (connexion.php)
if(!isset($_SESSION['utilisateur'])){
   header('location: ../connexion.php');
}
// to delete produit select from panier 
$idutilisateur = $_SESSION['utilisateur']['id']; //get id utilisateur 
$id = $_POST['id'];// get id produit
unset($_SESSION['panier'][$idutilisateur][$id]);
//to stay at the same page when i click to modify / ajouter  
header("location:".$_SERVER['HTTP_REFERER']); 

?>


   