// create function to add +1 when i click on the +button 
$('.counter-plus').click(function(e) {
    let qty = $(e.currentTarget).siblings('#quantite');
    let qtyValue = parseInt(qty.val())+1;
    qty.val(qtyValue);
    });
  
 // create function to remove -1 when i click on the -button    
    $('.counter-moins').click(function(e) {
        let qty = $(e.currentTarget).siblings('#quantite');
        let qtyValue = parseInt(qty.val());
        if (qtyValue > 0) {  // Prevents negative values
            qty.val(qtyValue-1);
        }
        });