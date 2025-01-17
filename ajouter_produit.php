<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ajouter Produit</title>
</head>

<body>

    <!-- Appeler le code -->
    <?php include 'include/nav.php'  ?>
    <!-- form Ajouter Catégorie -->
    <div class="container py-2">
        <h4>Ajouter Produit</h4>
        <?php
        //Sends data(ajouter produit) to the database
        //if click on the button (ajouter)
           if(isset($_POST['ajouter'])){
              $libelle = $_POST['libelle'] ;
              $prix = $_POST['prix'];
              $discount = $_POST['discount'];
              $description = $_POST['description'];
              $categorie = $_POST['categorie'];
              $date = date('Y-m-d');
              $filename = "produit.png";

              //--------------------START ------UPLOAD IMAGE OF THE PRODUIT -----------------
            //   (isset)=(!empty)  تعني اذا كان الملف موجود
            if(!empty($_FILES['image']['name'])){              
                // récupération [name] photo
               $image = $_FILES['image']['name'];
               $filename = uniqid() . $image; //uniqid() to avoid repetition of the name
               
            // move_uploaded_file()   pour deplacer le fichier (image) 
               move_uploaded_file($_FILES['image']['tmp_name'],'upload/produit/' . $filename);            
            }
            //--------------------END ------UPLOAD IMAGE OF THE PRODUIT ---------------------
            
            
              if(!empty($libelle) && !empty($prix) && !empty($categorie)){
                  // ---Connect to database(database.php) --
               require_once 'include/database.php';
               //pour insertion(للإدراج) un nouveau categorie
                $sqlState = $pdo->prepare('INSERT INTO  produit VALUES(null,?,?,?,?,?,?,?)' );
                $sqlState->execute([$libelle,$prix,$discount,$categorie,$date,$description,$filename]);
                header('location: produits.php');
              }else{
                ?>
        <div class="alert alert-danger" role="alert">
            libelle, prix, categorie sont obligatoires!
        </div>
        <?php 
        
        }
        
        }
        ?>





        <form method="post" enctype="multipart/form-data">
            <label class="form-label">Libelle </label>
            <input type="text" class="form-control" name="libelle">

            <label class=" form-label">Prix </label>
            <input type="number" class="form-control" name="prix" step="0.1" min="0">

            <label class=" form-label">Discount (%)</label>
            <input type="number" class="form-control" name="discount" min="0" max="100">

            <label class=" form-label"> Description</label>
            <textarea class="form-control" name="description"></textarea>

            <label class=" form-label"> Image</label>
            <input type="file" class="form-control" name="image">


            <?php 
             // ---Connect to database(database.php) --
               require_once 'include/database.php';
              //pour insertion(للإدراج) un nouveau (produit)
              $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
              ?>
            <label class="form-label">Categorie</label>
            <select name="categorie" class="form-control">
                <option value="">choisessez une categorie</option>
                <?PHP
                 // Loop through the categories fetched from the database
                    foreach($categories as $categorie){
                // Display each category as an option in the select dropdown عرض كل فئة كخيار في القائمة المنسدلة
                echo "<option value='" . $categorie['id'] . "'>" . $categorie['libelle'] . "</option>";                    
                  }
                ?>

            </select>


            <input type="submit" value="Ajouter produit" name="ajouter" class="btn btn-primary  my-3">
        </form>
    </div>





</body>

</html>