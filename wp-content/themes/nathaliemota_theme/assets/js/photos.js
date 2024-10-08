/*Appel AJAX des photos en page d'accueil*/
jQuery(document).ready(function($) {
    let page = 1; // Suivi de la page pour le bouton "Charger plus"

    // Fonction pour charger les photos dynamiquement
    function chargerPhotos(replace = true) {
        // Récupère les valeurs des filtres
        const category = $('#category').val();
        const format = $('#formats').val();
        const sort = $('#sort').val();

        // Requête AJAX
        $.ajax({
            url: charger_photos_vars.ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'charger_photos',
                nonce: charger_photos_vars.nonce,
                category: category,
                format: format,
                sort: sort,
                page: page
            },
            success: function(response) {
                if (response.success) {
                    const html = response.data.html;
                    const hasMore = response.data.has_more;

                    if (replace) {
                        $('#photos').html(html); // Remplace les photos
                    } else {
                        $('#photos').append(html); // Ajoute les nouvelles photos
                    }

                    if (hasMore) {
                        $('#charger_plus').show(); // Affiche le bouton s'il y a plus de photos
                    } else {
                        $('#charger_plus').hide(); // Cache le bouton s'il n'y a plus de photos
                    }
                } else {
                    console.log('Erreur: ', response.data);
                }
            },
            error: function(error) {
                console.log('Erreur AJAX : ', error);
            }
        });
    }

    // Charger les photos au changement des filtres
    $('#category, #formats, #sort').change(function() {
        page = 1; // Réinitialise à la première page
        chargerPhotos(true); // Remplace le contenu
    });

    // Charger plus de photos avec le bouton "Charger plus"
    $('#charger_plus').click(function() {
        page++; // Incrémente la page
        chargerPhotos(false); // Ajoute le contenu
    });
});

