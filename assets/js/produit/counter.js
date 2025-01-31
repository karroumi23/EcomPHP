$('.counter-plus').click(function(e) {
    let qty = $(e.currentTarget).siblings('#quantite');
    let qtyValue = parseInt(qty.val())+1;
    qty.val(qtyValue);
    });
