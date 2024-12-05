<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Connexion</title>
</head>

<body>
    <!-- navbar -->
    <!-- Appeler le code -->
    <?php include 'include/nav.php'  ?>
    <!-- form ajouter utilisateur -->
    <div class="container py-2">

        <?php
    // Check if the form has been submitted
    if (isset($_POST['connexion'])) {
        // Retrieve form input values
        $login = $_POST['login']; 
        $password = $_POST['password'];

        // Ensure both login and password fields are not empty
        if (!empty($login) && !empty($password)) {
            // Include the database connection file النداء على ملف اتصال قاعدة البيانات
            require_once 'include/database.php';

            // Prepare an SQL query to find a user with the provided login and password
            $sqlState = $pdo->prepare('SELECT * FROM utilisateur 
                                       WHERE login = ? 
                                       AND password = ?');
            
            // Execute the query with the provided login and password values
            $sqlState->execute([$login, $password]);

            // Check if at least one(login/psw) matching row was found
            if ($sqlState->rowCount() >= 1) {
                // Start a new session
                session_start();

                // Store the user data in the session variable `$_SESSION['utilisateur']` تخزين بيانات المستخدم في متغير
                $_SESSION['utilisateur'] = $sqlState->fetch();

                // Redirect the user to the admin page
                header('Location: admin.php');
                
            } else {
                // If login or password is incorrect, display an error message
                ?>
        <div class="alert alert-danger" role="alert">
            Login ou password incorrecte!
        </div>
        <?php
            }
        } else {
            // If login or password fields are empty, display a different error message
            ?>
        <div class="alert alert-danger" role="alert">
            Login et password sont obligatoires!
        </div>
        <?php
        }
    }
    ?>

        <!-- Display the login form -->
        <h4>Connexion</h4> <!-- Form heading -->
        <form method="post">
            <!-- Form uses POST method to submit data securely -->
            <label class="form-label">Login</label>
            <input type="text" class="form-control" name="login"> <!-- Input for login -->

            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password"> <!-- Input for password -->

            <!-- Submit button for the form -->
            <input type="submit" value="Connexion" name="connexion" class="btn btn-primary my-3">
        </form>
    </div>






</body>

</html>