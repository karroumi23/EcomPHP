<?php 
  session_start();
  //Vérifier si l'utilisateur est connecté ou non connecté
  $connecte = false;
  if(isset($_SESSION['utilisateur'])){
    $connecte = true;
  };

?>
    <!-- script font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav d-flex gap-1">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Ajouter Utilisateur</a>
                </li>
                <?php 
                  //if utilisateur connecte ...
                    if($connecte){
                        ?>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="categories.php">Liste des Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="produits.php">Liste des Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="ajouter_categorie.php">Ajouter Catégorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="ajouter_produit.php">Ajouter Produit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="deconnexion.php">Deconnexion </a>
                </li>
               

                <?php
                }else{
                    ?>
                <!-- if not ... -->
                <li class="nav-item ">
                    <a class="nav-link " href="Connexion.php">Connexion</a>
                </li>
                <?php
                }
                ?>

            </ul>
               <!--  Link to go to the front -->
            <div>
                  
                  <a class="nav-link fs-5 " id="Sitefront" aria-current="page" href="../front/index.php">
                        <i class="fa-solid fa-cart-shopping"></i>
                              Site front 
                  </a>
                  <style>
                    #Sitefront{
                        color: #325FD7;
                    }
                     #Sitefront:hover{
                         color:rgb(45, 60, 100) !important;
                     }
                  </style>
               
             </div>
        </div>
    </div>
</nav>