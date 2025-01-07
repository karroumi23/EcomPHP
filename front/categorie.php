<?php
        // Connect to database(database.php) 
        require_once '../include/database.php';
        $id = $_GET['id'];
        //Targeting the categories table from the database
        $sqlState = $pdo->prepare("SELECT * FROM categorie WHERE id=?");
        $sqlState->execute([$id]);
        $categorie = $sqlState->fetch(PDO::FETCH_ASSOC);
     
          
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

    <div class="container py-2">
        <h4> <?php echo $categorie['libelle'] ?></h4>

        <ul class="list-group list-group-flush">


        </ul>


    </div>





</body>

</html>