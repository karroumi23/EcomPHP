<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <!-- navbar -->
    <!-- Appeler le code -->
    <?php include 'include/nav.php'  ?>
    <!-- form ajouter utilisateur -->
    <div class="container py-2">
        <?php
           if(isset($_POST['ajouter'])){
             $login = $_POST['login'];
             $password = $_POST['password'];


             
             if(!empty($login) && !empty($password)){
                // --- Appeler le code --
                require_once 'include/database.php';
                $date = date( 'Y-m-d');
                //pour insertion un nouveau utilisateur
                 $sqlState = $pdo->prepare('INSERT INTO utilisateur VALUES(null,?,?,?)' );
                 $sqlState->execute([$login,$password,$date]);
                 //redirection data to (?)
                 header('location: connexion.php');
             }
             
             
             else{
                // close php to add html code
                ?>
        <div class="alert alert-danger" role="alert">
            Login , password sont obligatoires!
        </div>
        <!-- open php again -->
        <?php 
           }
        }
       ?>
        <h4>Ajouter Utilisateur</h4>
        <form method="post">
            <label class=" form-label">Login</label>
            <input type="text" class="form-control" name="login">

            <label class=" form-label">Password</label>
            <input type="password" class="form-control" name="password">
            <input type="submit" value="Ajouter Utilisateur" name="ajouter" class="btn btn-primary  my-3">
        </form>
    </div>





</body>

</html>