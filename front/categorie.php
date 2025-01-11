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
    <title> Categories <?php echo $categorie['libelle'] ?> </title>
</head>

<body>
    <!-- Appeler le code -->
    <?php include '../include/nav_front.php'  ?>

    <div class="container py-2">
        <h4> <?php echo $categorie['libelle'] ?></h4>
        <div class="container">
            <div class="row">
                <!-- add -->
                <?php
                   foreach($produits as $produit){
                    ?>
                <!-- card -->
                <div class="card mb-3 col-md-4">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $produit->libelle ?></h5>
                        <p class="card-text"><?php echo $produit->prix ?>MAD</p>
                        <p class="card-text"><?php echo $produit->date_creation ?></p>
                    </div>
                </div>
                <?php
                }

                ?>



            </div>
        </div>





</body>

</html>