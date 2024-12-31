<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ajouter Catégorie</title>
</head>

<body>

    <!-- Appeler le code -->
    <?php include 'include/nav.php'  ?>
    <!-- form Ajouter Catégorie -->
    <div class="container py-2">
        <h4>Ajouter Catégorie</h4>
        <?php
           if(isset($_POST['ajouter'])){
           $libelle = $_POST['libelle'];
           $description	=$_POST['description'];

           if(!empty($libelle) && !empty($description)){
               // ---Connect to database(database.php) --
               require_once 'include/database.php';
              //pour insertion(للإدراج) un nouveau categorie
               $sqlState = $pdo->prepare('INSERT INTO categorie(libelle , description) VALUES(?,?)' );
               $sqlState->execute([$libelle,$description]);
               ?>
        <div class="alert alert-success" role="alert">
            la categorie <?php echo $libelle  ?> est bien ajoutée.
        </div>
        <?php
        }else{
        ?>
        <div class="alert alert-danger" role="alert">
            libelle , description sont obligatoires!
        </div>
        <?php
        }

        }
        ?>
        <!--------------------------------------------------  -->
        <form method="post">
            <label class="form-label">libelle </label>
            <input type="text" class="form-control" name="libelle">
            <label class=" form-label">Description </label>
            <textarea class="form-control" name="description"></textarea>

            <input type="submit" value="Ajouter catégorie" name="ajouter" class="btn btn-primary  my-3">
        </form>
    </div>





</body>

</html>