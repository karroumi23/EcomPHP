<?php
        // Connect to database(database.php) 
        require_once '../include/database.php';
        $id = $_GET['id'];
        //Targeting the categories table from the database
        $sqlState = $pdo->prepare("SELECT * FROM categorie WHERE id=?");
        $sqlState->execute([$id]);
        $categorie = $sqlState->fetch(PDO::FETCH_ASSOC);
     
        //to display produits of the categorie 
        $sqlState = $pdo->prepare("SELECT * FROM produit WHERE id_categorie=?");
        $sqlState->execute([$id]);
        $produits = $sqlState->fetchAll(PDO::FETCH_OBJ);

          
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
    <title> Categories <?php echo $categorie['libelle'] ?> </title>
</head>

<body>
    <!-- Appeler le code -->
    <!-- nav-bar -->
    <?php include '../include/nav_front.php'  ?>

    <div class="container py-2 ">
        <h4 class="text-primary"> <span class="<?php echo $categorie['icone'] ?> "></span>
            <?php echo $categorie['libelle'] ?></h4>

        <div class="container">
            <div class="row">
                <!-- using LOOP(foreach) to dispay produits -->
                <?php
                   foreach($produits as $produit){
                    $idProduit = $produit->id;
                    ?>
                <!----------card -->
                <div class="card mb-3 col-md-4 me-2" style="max-width: 20rem">
                    <img src="../upload/produit/<?php echo $produit->image ?>" height="170" class=" card-img-top"
                        alt="..">
                    <div class="card-body">
                         
                        <h5 class="card-title"><?php echo $produit->libelle ?></h5>
                         <!-- ------------------- -->

                         <h3><span class="badge text-bg-success"><?php //prix
                           //if there is discount calculate price (PRIX) and display it.
                            $discount = $produit->discount;
                            $prix = $produit->prix;
                    
                         if (!empty($produit->discount)) {
                            $total = $prix - ($prix * $discount)/100;
                              echo $total ;
                           
                         }else{
                             $total = $prix;
                             echo $total;
                             }      ?>,00</span> MAD <br>

                      
                    </h3>
                    <span class="text-danger fs-6	"><del><?php  
                                 if (!empty($produit->discount)){
                                       echo $prix . 'MAD' ;
                                  } ?> </del>
                         </span>
                        <?php 
                    
                        if(!empty($produit->discount)){
                            ?>
                    <span class="badge fs-8" style="background-color:rgb(218, 191, 160); color: #000;"> - <?php echo $produit->discount?> %</span>
                    <?php
                    }
                    ?>
                         <!-- --------link (Afficher Détails)----------- -->                       
                        <a href="produit.php?id=<?php echo $idProduit ?>"
                            class="btn stretched-link text-primary">Afficher Détails
                        </a>
                    </div>
                    <!-------------------- quantity of product -->
                    <div  class="card-footer"  >
                                         
                        <?php include '../include/front/counter.php'?>
                    </div>
                   
                </div>
                <?php
                }
                if (empty($produits)) {
                    ?>
                <div class="alert alert-info " role="alert">
                    <h5> Pas de produit</h5>
                </div>
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