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
    <title>Liste des Categories </title>
</head>

<body>
    <!-- navbar -->
    <!-- Appeler le code -->
    <?php include 'include/nav.php' ?>


    <!-- form display categories -->
    <div class="container py-2">
        <h1 class="text-primary">List Des Categories</h1>
        <table class="table table-striped table-hover">
            <tr>
                <th>#ID</th>
                <th>Libelle</th>
                <th>Description</th>
                <th>Icone</th>
                <th>Date</th>
                <th>Operations</th>
            </tr>


            <?php
            // Include the database connection file النداء على ملف اتصال قاعدة البيانات
             require_once 'include/database.php';
            //(pdo) جلب جميع الصفوف من جدول (الفئات) في قاعدة البيانات باستخدام 
            // The fetchAll(PDO::FETCH_ASSOC) method retrieves all results as an associative array
             $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
             foreach($categories as $categorie){
             ?>
            <tr>
                <td><?php echo $categorie['id'] ?></td>
                <td><?php echo $categorie['libelle'] ?></td>
                <td><?php echo $categorie['description'] ?></td>
                <td><i class="fa <?php echo $categorie['icone'] ?> "></i></td> <!-- add icone -->
                <td><?php echo $categorie['date_creation'] ?></td>
                <td>
                    <a href="modifier_categorie.php?id=<?php echo $categorie['id'] ?>"
                        class="btn  btn-primary btn-sm">Modifier</a>
                    <!-- i use "onclick" to display alert are u sure u want delete this categorie ?  -->
                    <a href="supprimer_categorie.php?id=<?php echo $categorie['id'] ?>" class="btn  btn-danger btn-sm"
                        onclick="return confirm('voulez vous vraiment supprimer la categorie<?php echo $categorie['libelle'] ?> ')">Supprimer</a>

                </td>
            </tr>
            <?php
            }
            ?>
        </table>

        <a href=" ajouter_categorie.php" class="btn btn-primary my-3">Ajouter catégorie</a>
    </div>





</body>

</html>