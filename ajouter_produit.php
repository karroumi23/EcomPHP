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
          
        ?>
        <form method="post">
            <label class="form-label">Libelle </label>
            <input type="text" class="form-control" name="libelle">

            <label class=" form-label">Prix </label>
            <input type="number" class="form-control" name="prix" min="0">

            <label class=" form-label">Discount </label>
            <input type="number" class="form-control" name="discount" min="0" max="100">

            <?php 
             // ---Connect to database(database.php) --
               require_once 'include/database.php';
              //pour insertion(للإدراج) un nouveau (produit)
              $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
              ?>
            <label class="form-label">Categorie</label>
            <select name="categorie" class="form-control" required>
                <option value="">choisessez une categorie</option>
                <?PHP
                 // Loop through the categories fetched from the database
                    foreach($categories as $categorie){
                // Display each category as an option in the select dropdown
                     echo "<option value='" . $categorie['id'] . "'>" . htmlspecialchars($categorie['libelle']) . "</option>";
                    
                  }
                ?>

            </select>

            <input type="submit" value="Ajouter produit" name="ajouter" class="btn btn-primary  my-3">
        </form>
    </div>





</body>

</html>