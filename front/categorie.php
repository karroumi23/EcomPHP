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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link font-awsome -->
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
                    ?>
                <!-- card -->
                <div class="card mb-3 col-md-4 me-2" style="max-width: 18rem;max-height: 19rem">
                    <img src="../upload/produit/<?php echo $produit->image ?>" height="130" class=" card-img-top"
                        alt="..">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $produit->libelle ?>
                        </h5>
                        <p class="card-text"><?php echo $produit->prix ?>MAD</p>
                        <p class="card-text">Ajoute le : <?php echo $produit->date_creation ?></p>
                        <a href="produit.php?id=<?php echo $produit->id ?>"
                            class="btn stretched-link text-primary">Afficher Détails
                        </a>
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






</body>

</html>