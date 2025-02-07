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
    <title>Liste des Categories</title>
</head>

<body>
    <!-- Appeler le code -->
    <?php 
       session_start(); // to display all things from another pages 
       include '../include/nav_front.php' //call navbar
    ?>
    

    <div class="container py-2">
        <h4 class="text-primary"><i class="fa-solid fa-list"></i> Liste des Categories</h4>
        <?php
        // Connect to database(database.php) 
        require_once '../include/database.php';
        //Targeting the categories table from the database
        $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_OBJ);
        
          
        ?>

        <ul class="list-group list-group-flush">
            <?php
            //using foreach to display categories from data 
            foreach($categories as $categorie){
                ?>
            <li class="list-group-item">
                <h2>
                    <a href="categorie.php?id=<?php echo $categorie->id ?>"
                        class="btn btn-light text-success fw-bolder">
                        <i class="<?php echo $categorie->icone ?>"></i> <?php echo $categorie->libelle ?>
                    </a>

                </h2>

            </li>
            <?php
            }
            ?>

        </ul>


    </div>





</body>

</html>