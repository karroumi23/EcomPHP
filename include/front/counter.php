<div >
  <?php
  //store the user ID in this variable "$idUtilisateur"
   $idUtilisateur = $_SESSION['utilisateur']['id']; 
   //if there is no quantity products display 0  
   $qty = $_SESSION['panier'][$idUtilisateur][$idProduit] ?? 0; 
  //button (modification-ajouter) 
   $button="";
   if($qty == 0){
    $button = "Ajouter";
   }
   else{
     $button = "Modifier";
   }
   
  ?>


    <form method="post" class="counter d-flex" action="ajouter_panier.php">
    <button class="btn btn-primary mx-1 counter-moins" onclick="return false;">-</button>
      <input type="hidden" name="id" value="<?php echo $idProduit ?>">
      <input type="number" name="quantite" id="quantite" value="<?php echo $qty ?>"  min="0">
      <button class="btn btn-primary mx-1 counter-plus" onclick="return false;">+</button>
      <input type="submit" class="btn btn-success" name="ajouter" value="<?php echo $button?>"  > 
      <?php
      
        if($qty !== 0){
          ?>
            <input type="submit" formaction="supprimer_panier.php" class="btn btn-danger"  name="supprimer" value="Supprimer"  > 

          <?php
           
        }
      ?>
    </form>
     </div>

    <!-- jQuery Script  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
          integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
          crossorigin="anonymous">
      </script>
