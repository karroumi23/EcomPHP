<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Liste des Categories</title>
</head>

<body>

    <div class="container py-2">
        <h4> Liste des Categories</h4>
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
                <a href="#" class="btn btn-light">
                    <?php echo $categorie->libelle ?>
                </a>
            </li>
            <?php
            }
            ?>

        </ul>


    </div>





</body>

</html>