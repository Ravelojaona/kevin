$(document).ready(function(){
    $('.toggle-offre-status').on('change', function() {
        const offreId = $(this).data('offre-id');
        const actif = $(this).is(':checked') ? 1 : 0;
        console.log('actif',actif);
    })
})