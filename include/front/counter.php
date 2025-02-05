<div >
    <form method="post" class="counter d-flex" action="ajouter_panier.php">
    <button class="btn btn-primary mx-1 counter-moins" onclick="return false;">-</button>
      <input type="hidden" name="id" value="<?php echo $idProduit ?>">
      <input type="number" name="quantite" id="quantite" value="0" min="0">
      <button class="btn btn-primary mx-1 counter-plus" onclick="return false;">+</button>
      <input type="submit" name="ajouter" value="Ajouter" class="btn btn-success" > 
    </form>
     </div>

    <!-- jQuery Script  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
          integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
          crossorigin="anonymous">
      </script>
       <!-- script javascript -->
