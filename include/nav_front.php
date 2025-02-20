

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
                    <a class="nav-link active" aria-current="page" href="index.php">Liste des Categories</a>
                </li>
            </ul>
        </div>
         
        <?php
           // Get user ID
           $idUtilisateur = $_SESSION['utilisateur']['id'] ?? null;

           // Initialize the panier array if not set
           //check if the array is set before counting it.
           if (!isset($_SESSION['panier'][$idUtilisateur])) {
           $_SESSION['panier'][$idUtilisateur] = [];
           }

           // Count the number of items in the panier safely
           //Avoid Undefined array key and TypeError by using isset().
           //الآن، سيظهر عدد سلة التسوق الخاصة بك دائمًا "0" إذا كانت فارغة بدلاً من إرسال خطأ
           $panierCount = isset($_SESSION['panier'][$idUtilisateur]) ? count($_SESSION['panier'][$idUtilisateur]) : 0;
        ?>
       <a href="panier.php" class="cart-link">
          <i class="fa-solid fa-cart-shopping"></i> Panier(<?php echo $panierCount; ?>)
       </a>
  
           
       
           
           <style>
        .cart-link {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border: 2px solid #333;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .cart-link:hover {
            background-color: #333;
            color: #fff;
            border-color: #333;
        }

        .cart-link i {
            font-size: 20px;
        }
        </style>
    </div>
</nav>