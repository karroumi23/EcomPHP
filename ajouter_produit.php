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

            <input type="submit" value="Ajouter produit" name="ajouter" class="btn btn-primary  my-3">
        </form>
    </div>





</body>

</html>