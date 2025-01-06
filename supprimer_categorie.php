<?php

 // Include the database connection file النداء على ملف اتصال قاعدة البيانات
 require_once 'include/database.php';
//  récupérer (ID) avec GET.
 $id = $_GET['id'];
 $sqlState = $pdo->prepare('DELETE FROM categorie WHERE id=?');
 $sqlState->execute([$id]);
 header('location: categories.php');
 
 ?>