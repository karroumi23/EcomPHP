<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Liste des Produits </title>
</head>

<body>
    <!-- navbar -->
    <!-- Appeler le code -->
    <?php include 'include/nav.php' ?>
    <!-- form display categories -->
    <div class="container py-2">
        <h1 class="text-primary">List Des Produits</h1>
        <table class="table table-striped table-hover">
            <tr>
                <th>#ID</th>
                <th>Libelle</th>
                <th>Prix</th>
                <th>Discount</th>
                <th>Categorie</th>
                <th>Date-Creation</th>
                <th>Operations</th>
            </tr>

            <?php
            // Include the database connection file النداء على ملف اتصال قاعدة البيانات
             require_once 'include/database.php';

             //(pdo) جلب جميع الصفوف من جدول (الفئات) في قاعدة البيانات باستخدام 
             // The fetchAll(PDO::FETCH_ASSOC) method retrieves all results as an associative array
              $produits = $pdo->query("SELECT produit.*,categorie.libelle as 'categorie_libelle' FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id")->fetchAll(PDO::FETCH_ASSOC);
              foreach($produits as $produit){
                ?>
            <tr>
                <td><?php echo $produit['id'] ?></td>
                <td><?php echo $produit['libelle'] ?></td>
                <td><?php echo $produit['prix'] ?> MAD</td>
                <td><?php echo $produit['discount'] ?> %</td>
                <td><a href="categories.php"><?php echo $produit['categorie_libelle'] ?></a></td>
                <td><?php echo $produit['date_creation'] ?></td>
                <td>
                    <input type="submit" class="btn btn-primary btn-sm" value="Modifier">

                    <a href="supprimer_produit.php?id=<?php echo $produit['id'] ?>" class="btn  btn-danger btn-sm"
                        onclick="return confirm('voulez vous vraiment supprimer produit<?php echo $produit['libelle'] ?> ')">Supprimer</a>
                </td>
            </tr>
            <?php
               }
             ?>
        </table>
        <!-- button pour ajouter produit -->
        <a href="ajouter_produit.php" class="btn btn-primary my-3">Ajouter Produit</a>

    </div>






</body>

</html>