<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modifier Produit</title>
</head>

<body>

    <!-- Appeler le code -->
    <?php include 'include/nav.php'  ?>
    <!-- form Ajouter Catégorie -->
    <div class="container py-2">
        <h4>Modifier Produit</h4>

        <?php
            // Include the database connection file النداء على ملف اتصال قاعدة البيانات
            require_once 'include/database.php';
            $sqlState = $pdo->prepare('SELECT * FROM produit WHERE id=?');
            $id = $_GET['id'];
            $sqlState->execute([$id]);
            
            $produit = $sqlState->fetch(PDO::FETCH_ASSOC);
            

            if(isset($_POST['modifier'])){
                $libelle     = $_POST['libelle'];
                $prix     = $_POST['prix'];
                $discount     = $_POST['discount'];
                $description  =$_POST['description'];
                
                if(!empty($libelle) && !empty($prix) ){
                    //pour Modifier les champs
                    $sqlState = $pdo->prepare('UPDATE produit  SET  libelle = ? , 
                                                                    prix = ? ,
                                                                    discount = ?,
                                                                    description = ?
                                                             WHERE  id = ? ' );
                    $sqlState->execute([$libelle,$prix,$discount,$description,$id]);
                    header('location: produits.php');                                        
                    
                }else{
                    ?>
        <div class="alert alert-danger" role="alert">
            libelle , prix sont obligatoires!
        </div>
        <?php
                    }

         
                
            }
        
        ?>





        <!---------------------------------------------------->
        <form method="post">
            <input type="hidden" class="form-control" name="id" value="<?php echo $produit['id'] ?>">

            <label class="form-label">libelle </label>
            <input type="text" class="form-control" name="libelle" value="<?php echo $produit['libelle'] ?>">

            <label class="form-label">prix </label>
            <input type="number" class="form-control" name="prix" step="0.1" min="0"
                value="<?php echo $produit['prix'] ?>">

            <label class=" form-label">Discount </label>
            <textarea class="form-control" name="discount"><?php echo $produit['discount'] ?></textarea>

            <label class=" form-label"> Description</label>
            <textarea class="form-control" name="description"><?php echo $produit['description'] ?></textarea>


            <input type="submit" value="Modifier Produit" name="modifier" class="btn btn-primary  my-3">


        </form>
    </div>





</body>

</html>