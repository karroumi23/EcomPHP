<?php 

//  try / catch (gestion d'erreur) if u connection with database good else 'catch' message .
try{

       //Connect to database 
   $pdo = new PDO('mysql:host=localhost;dbname=ecommerce-first', username:'root',password:'');
   
   
}
catch(PDOException $e){

   echo "<p>ErooooR".$e->getMessage();
   die();
}
  
?>