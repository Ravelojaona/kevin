jQuery(document).ready(function($) {
    $('form').on('submit', function(e) {
        e.preventDefault();

        const form = $(this);
        const formData = new FormData(form[0]);

        const ajaxUrl = formData.get('ajax_url');

        if (!ajaxUrl) {
            $('#form-message').html('L\'URL AJAX n\'est pas définie.')
                .removeClass('success')
                .addClass('error')
                .show();
            return;
        }

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#form-message').html('Formulaire soumis avec succès!')
                        .removeClass('error')
                        .addClass('success')
                        .show();
                    form[0].reset();
                } else {
                    $('#form-message').html('Erreur: ' + response.data)
                        .removeClass('success')
                        .addClass('error')
                        .show();
                }
            },
            error: function(xhr, status, error) {
                $('#form-message').html('Erreur lors de la soumission: ' + error)
                    .removeClass('success')
                    .addClass('error')
                    .show();
            }
        });
    });
});