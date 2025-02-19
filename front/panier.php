<?php
    
    ob_start(); // Start output buffering 
    session_start();
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
         
                 <?php
                    // Check if the "vider" (empty cart) button is clicked
                    if (isset($_POST['vider'])) {
                    // Clear the user's cart by resetting their session array
                    $_SESSION['panier'][$idUtilisateur] = [];
                    // Redirect to the cart page to reflect the changes
                    header('Location: panier.php');
                    exit(); // Stop further execution after the redirect
                   }
                    $idUtilisateur = $_SESSION['utilisateur']['id'];
                    $panier = $_SESSION['panier'][$idUtilisateur];
                   if(!empty($panier)){

                    $idProduits = array_keys($panier);
                    $idProduits = implode(',',$idProduits);
                    $produits = $pdo->query("SELECT * FROM produit WHERE id IN($idProduits)")->fetchAll(PDO::FETCH_ASSOC);
 
                   }
                    // ---------------------------------------------------------------------
                    if (isset($_POST['valider'])) {
                      $total = 0;
                      $values = [];
                      $params = [];
                  
                      // Calcul du total et préparation des valeurs des produits
                      foreach ($produits as $produit) {
                          $idProduit = $produit['id'];
                          $qty = $panier[$idProduit];
                          $prix = $produit['prix'];
                          $total += $qty * $prix;
                      }
                  
                      // ✅ Insérer la commande avant d'utiliser $idCommande
                      $sqlStateCommande = $pdo->prepare('INSERT INTO commande (id_client, total) VALUES (?, ?)');
                      $insertedCommande = $sqlStateCommande->execute([$idUtilisateur, $total]);
                  
                      if ($insertedCommande) {
                          $idCommande = $pdo->lastInsertId(); // ✅ Récupérer l'ID de la commande
                      } else {
                          die('Erreur lors de l\'insertion de la commande');
                      }
                  
                      if (!$idCommande) {
                          die('Erreur: ID de commande non récupéré');
                      }
                  
                      // ✅ Maintenant, on peut préparer l'insertion des lignes de commande
                      $sql = 'INSERT INTO ligne_commande (id_produit, id_commande, prix, quantite) VALUES ';
                      
                      foreach ($produits as $index => $produit) {
                          $idProduit = $produit['id'];
                          $qty = $panier[$idProduit];
                          $prix = $produit['prix'];
                  
                          // Ajouter la structure SQL pour chaque produit
                          $values[] = "(:id$index, :idCommande, :prix$index, :qty$index)";
                          
                          // Ajouter les valeurs associées aux paramètres
                          $params[":id$index"] = $idProduit;
                          $params[":prix$index"] = $prix;
                          $params[":qty$index"] = $qty;
                      }
                  
                      // Fusionner les valeurs dans la requête SQL
                      $sql .= implode(', ', $values);
                      
                      // ✅ Associer l'ID de la commande après son insertion
                      $params[":idCommande"] = $idCommande;
                  
                      // Préparer et exécuter la requête
                      $sqlState = $pdo->prepare($sql);
                      $inserted = $sqlState->execute($params);
                  
                      if ($inserted) {
                          $_SESSION['panier'][$idUtilisateur] = [];
                          header('location: panier.php?success=true&total=' . $total);
                          exit();
                      } else {
                          die('Erreur lors de l\'insertion des lignes de commande');
                      }
                  }
                  
                
                
                   
                 ?>
                 
         

        <h4 class="text-primary"> Panier           
           (<?php // pour afficher le numbre de produit dans le panier
             // Get user ID
             $idUtilisateur = $_SESSION['utilisateur']['id'] ?? null;
             // Initialize the panier array if not set
             //check if the array is set before counting it.
             if (!isset($_SESSION['panier'][$idUtilisateur])) {
             $_SESSION['panier'][$idUtilisateur] = [];
              }
             // Count the number of items in the panier safely
             //Avoid Undefined array key and TypeError by using isset().
             //الآن، سيظهر عدد سلة التسوق الخاصة بك دائمًا "0" إذا كانت فارغة بدلاً من إرسال خطأ
             $panierCount = isset($_SESSION['panier'][$idUtilisateur]) ? count($_SESSION['panier'][$idUtilisateur]) : 0;
             echo $panierCount;
        ?>)
       
        </h4>

        <div class="container">
            <div class="row">
                <?php

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
                             <th scope="col">Prix</th>
                             <th scope="col">Prix Total</th>
                            </tr>        
                        </thead>
                        <?php 
                          $total = 0;
                           foreach($produits as $produit){
                            $idProduit = $produit['id']; //declerit idproduit in this page
                            $totalProduit = $produit['prix'] * $panier[$idProduit]; //to calc total price for every produit
                            $total += $totalProduit; // to calc last total

                             ?>
                               <tr>
                                  <td><?php echo $produit['id'] ?></td>
                                  <td ><img src="../upload/produit/<?php echo $produit['image'] ?>" class="img img-fluid" width="40"></td>
                                  <td><?php echo $produit['libelle'] ?></td>
                                  <td><?php  $idProduit = $produit['id'];
                                             include '../include/front/counter.php' 
                                       ?>
                                  </td>
                                  <td><?php echo $produit['prix'] ?> MAD</td>
                                  <td ><?php echo $totalProduit?> MAD </td>
                               </tr>
                             <?php
                                
                           }
                        ?>
         <tfoot>
             <tr>
               <!-- Display the total amount -->
               <td colspan="5" align="right"><strong>Total</strong></td>  
               <td class="bg-warning"><?php echo $total;?> MAD </td>
            </tr>
            <tr>
               <td colspan="6" align="right">
                     <!-- Form for validating or emptying the cart -->
                   <form method="post">
                     <!-- Submit button to validate the order -->
                    <input type="submit" class="btn btn-success" name="valider" value="Valider la commande"
                            onclick="return confirm('Do you want to validate your orders?')">
                     <!-- Submit button to empty the cart with a confirmation prompt -->
                    <input type="submit" class="btn btn-danger" name="vider" value="Vider le panier"  
                       onclick="return confirm('Voulez-vous vraiment vider le panier ?')">
                   </form> 
                </td>  
            </tr>
        </tfoot>

                     
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