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
    <!-- navbar -->
    <!-- Appeler le code -->
    <?php include 'include/nav.php'  ?>
    <!-- form ajouter utilisateur -->
    <div class="container py-2">
        <h4>Ajouter Catégorie</h4>
        <?php
        
       ?>
        <form method="post">
            <label class="form-label"> Login </label>
            <input type="text" class="form-control" name="login">

            <label class=" form-label">Password</label>
            <input type="password" class="form-control" name="password">
            <input type="submit" value="Ajouter*** Utilisateur" name="ajouter" class="btn btn-primary  my-3">
        </form>
    </div>





</body>

</html>