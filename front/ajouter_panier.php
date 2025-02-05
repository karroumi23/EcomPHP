<?php 

  var_dump($_POST);
  $id = $_POST['id'];
  $qty = $_POST['quantite'];
  if(!empty($id) && !empty($qty)){
    
 }else{
    header("location: produit.php?id=$id");
 }
?>