<?php
session_start();//لتخزين البيانات

        // Connect to database(database.php) 
        require_once '../include/database.php';
        $id = $_GET['id'];
        //Targeting the categories table from the database
        $sqlState = $pdo->prepare("SELECT * FROM produit WHERE id=?");
        $sqlState->execute([$id]);
        $produit = $sqlState->fetch(PDO::FETCH_ASSOC);


        ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
     <link rel="stylesheet" href="/assets/css/produit.css">
    <!-- jQuery Script  -->
      <script src="https://code.jquery.com/jquery-3.7.1.js" 
          integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
          crossorigin="anonymous">
      </script>
    <title> Categories <?php echo $categorie['libelle'] ?></title>
</head>

<body>
    <!-- Appeler le code -->
    <!-- nav-bar -->
    <?php include '../include/nav_front.php'  ?>

    <div class="container py-2 ">
        <h4 class="text-primary"> <?php echo $produit['libelle']?></h4>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../upload/produit/<?php echo $produit['image']?>" alt="<?php echo $produit['libelle']?>"
                        class="img img-fluid w-75">
                </div>

                <div class="col-md-6">
                    <h1><?php echo $produit['libelle']?></h1>
                    <h3><span class="badge text-bg-success"><?php //prix
                           //if there is discount calculate price (PRIX) and display it.
                            $discount = $produit['discount'];
                            $prix = $produit['prix'];
                            

                         if (!empty($produit['discount'])) {
                            $total = $prix - ($prix * $discount)/100;
                              echo $total ;

                         }else{
                             $total = $prix;
                             echo $total;
                             }      ?>,00</span> MAD
                        <span class="text-danger fs-6	"><del><?php  
                                 if (!empty($produit['discount'])){
                                       echo $prix . ' MAD';
                                  } ?> </del>
                        </span>
                    </h3>

                    <?php 

                        if(!empty($produit['discount'])){
                            ?>
                    <p><span class="badge text-bg-success">- <?php echo $produit['discount']?> %</span></p>
                    <?php
                    }
                    ?>
                    <p> <?php echo $produit['description']?> </p>
                    <p class="card-text">Ajoute le : <?php echo $produit['date_creation'] ?></p>
                    <hr>
                         <?php 
                           //call the counter
                           $idProduit = $produit['id'];  
                           include '../include/front/counter.php' 
                         ?>
                    <hr>
                    <a class="btn btn-primary" href="#">Ajouter au Panier</a>

                </div>
            </div>
        </div>
    </div>





    <script src="../assets/js/produit/counter.js"></script>
</body>