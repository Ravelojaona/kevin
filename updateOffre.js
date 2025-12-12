    jQuery(document).ready(function($) {
        $('.toggle-offre-status').on('change', function() {
            const offreId = $(this).data('offre-id');
            const actif = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: '{{ admin_url("admin-ajax.php") }}', // Utilisez admin_url pour obtenir l'URL correcte
                type: 'POST',
                data: {
                    action: 'toggle_offre_status',
                    offre_id: offreId,
                    actif: actif
                },
                success: function(response) {
                    if (response.success) {
                        alert('Statut de l\'offre mis à jour');
                    } else {
                        alert('Une erreur s\'est produite');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Erreur AJAX:', textStatus, errorThrown);
                }
            });
        });
    });
