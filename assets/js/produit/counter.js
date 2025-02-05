$(document).ready(function () {

    // Fonction pour augmenter la quantité
    $(document).on('click', '.counter-plus', function () {
        let qty = $(this).closest('.counter').find('#quantite');
        qty.val(parseInt(qty.val()) + 1);
    });

    // Fonction pour diminuer la quantité
    $(document).on('click', '.counter-moins', function () {
        let qty = $(this).closest('.counter').find('#quantite');
        let qtyValue = parseInt(qty.val());
        if (qtyValue > 0) { // Empêcher la quantité négative
            qty.val(qtyValue - 1);
        }
    });
});
