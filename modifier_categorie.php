<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modifier Categorie</title>
</head>

<body>

    <!-- Appeler le code -->
    <?php include 'include/nav.php'  ?>
    <!-- form Ajouter Catégorie -->
    <div class="container py-2">
        <h4>Modifier Categorie</h4>

        <?php
            // Include the database connection file النداء على ملف اتصال قاعدة البيانات
            require_once 'include/database.php';
            $sqlState = $pdo->prepare('SELECT * FROM categorie WHERE id=?');
            $id = $_GET['id'];
            $sqlState->execute([$id]);
            
            $category = $sqlState->fetch(PDO::FETCH_ASSOC);

          if(isset($_POST['modifier'])){
                $libelle     = $_POST['libelle'];
                $description = $_POST['description'];
     
                if(!empty($libelle) && !empty($description)){
                    
                   //pour insertion(للإدراج) un nouveau categorie
                    $sqlState = $pdo->prepare('UPDATE categorie 
                                                           SET  libelle = ? , 
                                                                description = ?
                                                          WHERE  id = ?
                                                            ' );
                    $sqlState->execute([$libelle,$description,$id]);
                    header('location: categories.php');
          }else{
             ?>
        <div class="alert alert-danger" role="alert">
            libelle , description sont obligatoires!
        </div>
        <?php
             }
     
            }
          
        ?>





        <!---------------------------------------------------->
        <form method="post">
            <input type="hidden" class="form-control" name="id" value="<?php echo $category['id'] ?>">

            <label class="form-label">libelle </label>
            <input type="text" class="form-control" name="libelle" value="<?php echo $category['libelle'] ?>">

            <label class=" form-label">Description </label>
            <textarea class="form-control" name="description"><?php echo $category['description'] ?></textarea>


            <input type="submit" value="Modifier catégorie" name="modifier" class="btn btn-primary  my-3">
        </form>
    </div>





</body>

</html>