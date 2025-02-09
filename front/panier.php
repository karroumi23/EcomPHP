<?php
    
     session_start(); //لتخزين البيانات
     // Connect to database(database.php) 
    require_once '../include/database.php';         
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
   
    <link rel="stylesheet" href="../assets/css/produit.css">

    <!-- script bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- script font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Panier </title>
</head>

<body>
    <!-- Appeler le code -->
    <!-- nav-bar -->
    <?php include '../include/nav_front.php'  ?>

    <div class="container py-2 ">
        <h4 class="text-primary"> Panier</h4>

        <div class="container">
            <div class="row">
                <?php
                     
                     

                   $idUtilisateur = $_SESSION['utilisateur']['id'];
                   $panier = $_SESSION['panier'][$idUtilisateur];
                   $idProduits = array_keys($panier);
                   $idProduits = implode(',',$idProduits);
                   $produits = $pdo->query("SELECT * FROM produit WHERE id IN($idProduits)")->fetchAll(PDO::FETCH_ASSOC);



                   if(empty($panier)){
                    ?>
                     <div class="alert alert-warning" role="alert">
                         votre panier est vide!
                     </div>
                    <?php
                   }else{
                      ?>
                      <table class="table">
                        <thead>
                            <tr>
                             <th scope="col">#</th>
                             <th scope="col">Image</th>
                             <th scope="col">Libelle</th>
                             <th scope="col">Quantité</th>
                             <th scope="col">Operation</th>
                            </tr>        
                        </thead>
                        <?php 
                           foreach($produits as $produit){
                             ?>
                               <tr>
                                  <td><?php echo $produit['id'] ?></td>
                                  <td ><img src="../upload/produit/<?php echo $produit['image'] ?>" class="img img-fluid" width="40"></td>
                                  <td><?php echo $produit['libelle'] ?></td>
                                  <td><?php echo $panier[$produit['id']] ?></td>
                               </tr>
                             <?php
                                
                           }
                        ?>

                     
                      </table>
                      <?php
                    
                    }
                ?>
            </div>
        </div>
    </div>
                
                
            

    <!-- jQuery Script  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
          integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
          crossorigin="anonymous">
      </script>
       <!-- script javascript -->
   <script src="../assets/js/produit/counter.js"></script>
</body>
</html>