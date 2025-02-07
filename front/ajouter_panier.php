<?php 
//add produits to the panier 

session_start();
//if the user it's not connected send him to the (connexion.php)
if(!isset($_SESSION['utilisateur'])){
   header('location: ../connexion.php');
}

  $id = $_POST['id'];
  $qty = $_POST['quantite'];
  $idUtilisateur = $_SESSION['utilisateur']['id']; // create variable for id Utilisateur


      //if the user don't have panier ! give him empty panier  
      //إذا لم يكن لدى المستخدم عربة ، قم بإنشاء مصفوفة فارغة له
      if(!isset($_SESSION['panier'][$idUtilisateur])){
         $_SESSION['panier'][$idUtilisateur] = [];
         }

      if($qty == 0){
         //unset()removes it from memory,
          unset($_SESSION['panier'][$idUtilisateur][$id]);
      }else{
           //Adds the product with the quantity to the panier.
           $_SESSION['panier'][$idUtilisateur][$id] = $qty;
         }
     

    header("location: produit.php?id=$id");

?>


   