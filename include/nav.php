<?php 
  session_start();
  //Vérifier si l'utilisateur est connecté ou non connecté
  $connecte = false;
  if(isset($_SESSION['utilisateur'])){
    $connecte = true;
  }

?>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Ajouter Utilisateur</a>
                </li>
                <?php 
                  //if utilisateur connecte ...
                    if($connecte){
                        ?>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="ajouter_categorie.php">Ajouter Catégorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="ajouter_produit.php">Ajouter Produit</a>
                </li>
                <?php
                }else{
                    ?>
                <!-- if not ... -->
                <li class="nav-item">
                    <a class="nav-link" href="Connexion.php">Connexion</a>
                </li>
                <?php
                }
                ?>


            </ul>
        </div>
    </div>
</nav>