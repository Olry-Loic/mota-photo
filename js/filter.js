$(document).ready(function($) {
    var currentPage = 1;

    // Fonction pour effectuer la requête AJAX
    function doAjaxRequest() {
        var categorie = jQuery("#categorie").val();
        var format = jQuery("#format").val();
        var trier = jQuery("#trier").val();

        var data = {
            action: "filter",
            categorie: $('#categorie').val(),
            format: $('#format').val(),
            trier: $('#trier').val(),
            page: currentPage,
        };
        
        // Vérifiez si la variable 'categorie' a une valeur et l'ajoute aux données si c'est le cas.
        if (categorie) {
            data.categorie = categorie;
        }
        
        // Vérifiez si la variable 'formats' a une valeur et l'ajoute aux données si c'est le cas.
        if (format) {
            data.format = format;
        }
        
        // Vérifiez si la variable 'trier' a une valeur et l'ajoute aux données si c'est le cas.
        if (trier) {
            data.trier = trier;
        }
        
        // Définit la page dans les données.
        data.page = currentPage;

        $.ajax({
            url: "http://localhost/mota-photo/wp-admin/admin-ajax.php",
            type: "POST",
            data: data,
            success: function(response) {
                // Ajoute la réponse à l'élément HTML avec la classe "main-pagination".
                $(".main-pagination").append(response);
            },
        });
    }
    $("#categorie, #format, #trier").on("change", function() {
        currentPage = 1; // Réinitialisez la page actuelle à 1 lorsque les filtres sont modifiés
        $(".main-pagination").html("");
        doAjaxRequest(); // Effectuez la requête AJAX
    });

    // Ajoutez un gestionnaire d'événements pour le bouton "Charger plus"
    $('#pagination').on('click', function(e) {
        e.preventDefault();
        currentPage++;
        doAjaxRequest(); // Effectuez la requête AJAX
    });
});

