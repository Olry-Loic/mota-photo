<?php
//_______________________________________création du style personnaliser_____________________________________________
function mon_theme_enqueue_styles() {
    // Enregistre le style 'motaphoto-style' en utilisant la feuille de style du thème actuel (get_stylesheet_uri()).
    // Les autres styles ne dépendent d'aucun autre style (array()).
    // La version est définie sur '1.0'.
    wp_enqueue_style('motaphoto-style',  get_stylesheet_uri(), array(), '1.0');
    // Enregistre le style 'theme-style' en utilisant le fichier 'theme.css' situé dans le répertoire du thème.
    // Les autres styles ne dépendent d'aucun autre style (array()).
    // La version est définie en utilisant 'filemtime' pour obtenir la dernière modification du fichier CSS.
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), 
    filemtime(get_stylesheet_directory() . '/css/theme.css'));

}
// Ajoute une action pour enregistrer la fonction 'mon_theme_enqueue_styles' lors de l'événement 'wp_enqueue_scripts'. 
add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');

//_________________________________ajout de la fonction de configuration du menu______________________________________
function register_my_menu() {
    // Enregistre un emplacement de menu appelé 'main-menu' avec l'intitulé 'Menu principal' et le texte de domaine 'text-domain' (utilisé pour les traductions).
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
// Ajoute l'action pour enregistrer la fonction 'register_my_menu' après la configuration du thème (hook 'after_setup_theme').
add_action( 'after_setup_theme', 'register_my_menu' );

//_________________________________Charge le fichier JavaScript menuBurger___________________________________________
function menuBurger_script() {
    // Enregistre un script JavaScript appelé 'menuBurger_script'.
    // Il est chargé à partir de l'emplacement du répertoire du thème '/js/burger.js'.
    // Aucune dépendance n'est spécifiée (array()).
    // La version du script est définie sur '1.0'.
    // Le script est inclus dans le pied de page (in_footer) de la page.
    wp_enqueue_script('menuBurger_script', get_template_directory_uri() . '/js/burger.js', array(),'1.0',array("in_footer"=>true));
}
// Ajoute l'action pour enregistrer la fonction 'menuBurger_script' lors de l'événement 'wp_enqueue_scripts'.
add_action('wp_enqueue_scripts', 'menuBurger_script');

//___________________________________Charge le fichier JavaScript contact____________________________________________
function modalContact_script() {
    // Enregistre un script JavaScript appelé 'contact_script'.
    // Il est chargé à partir de l'emplacement du répertoire du thème '/js/contact.js'.
    // Aucune dépendance n'est spécifiée (array()).
    // La version du script est définie sur '1.0'.
    // Le script est inclus dans le pied de page (in_footer) de la page.
    wp_enqueue_script('contact_script', get_template_directory_uri() . '/js/contact.js', array(),'1.0',array("in_footer"=>true));
}
// Ajoute l'action pour enregistrer la fonction 'modalContact_script' lors de l'événement 'wp_enqueue_scripts'.
add_action('wp_enqueue_scripts', 'modalContact_script');

//___________________________________charge le fichier javascript filter______________________________________________
function filter_script() {
    // Enregistre un script JavaScript appelé 'filter_script'.
    // Il est chargé à partir de l'emplacement du répertoire du thème '/js/filter.js'.
    // Aucune dépendance n'est spécifiée (array()).
    // La version du script est définie sur '1.0'.
    // Le script est inclus dans le pied de page (in_footer) de la page.
    wp_enqueue_script('filter_script', get_template_directory_uri() . '/js/filter.js', array(),'1.0',array("in_footer"=>true));
}
// Ajoute l'action pour enregistrer la fonction 'filter_script' lors de l'événement 'wp_enqueue_scripts'.
add_action('wp_enqueue_scripts', 'filter_script');

//_____________________________________création de la fonction du filtre______________________________________________

function filter() {
    // Récupère les données POST envoyées via la requête AJAX.
    $categorie = $_POST['categorie'];
    $format = $_POST['format'];
    $trier = $_POST['trier'];
    $paged = $_POST['page'];

    // Gestion de la limite d'affichage en fonction de la page.
    $images_per_page = ($paged == 1) ? 8 : 12;

    // Configuration des arguments pour la requête WP_Query.
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8, // Nombre de photos par page.
        'paged' => $paged,    // Numéro de page actuel.
    );

    // Si une catégorie est sélectionnée, ajoutez un paramètre de taxonomie à la requête.
    if ($categorie != 0) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categorie',
                'field' => 'id',
                'terms' => $categorie,
                'operator' => 'IN'
            ),
        );
    }

    // Si un format est sélectionné, ajoutez un autre paramètre de taxonomie à la requête.
    if ($format != 0) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'id',
            'terms' => $format,
            'operator' => 'IN',
        );
    }

    // Configure l'ordre des résultats en fonction de l'option de tri.
    if ($trier == 'nouveautes') {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    } elseif ($trier == 'anciennetes') {
        $args['orderby'] = 'date';
        $args['order'] = 'ASC';
    }

    // Effectue la requête WP_Query avec les arguments spécifiés.
    $query = new WP_Query($args);

    // Affiche les résultats de la requête.
    while ($query->have_posts()) :
        include ('parts/relatedPhoto.php'); // Inclut le modèle pour afficher chaque photo.
    endwhile;

    exit; // Termine la réponse de la requête AJAX.
}

// Ajoute l'action pour déclencher la fonction 'filtrer' lors d'une requête AJAX authentifiée.
add_action('wp_ajax_filter', 'filter');

// Ajoute l'action pour déclencher la fonction 'filtrer' lors d'une requête AJAX non authentifiée.
add_action('wp_ajax_nopriv_filter', 'filter');

//_____________________________________________charger le fichier javascript lightbox__________________________________
function lightbox_script() {
    // Enregistre un script JavaScript appelé 'lightbox_script'.
    // Il est chargé à partir de l'emplacement du répertoire du thème '/js/lightbox.js'.
    // Aucune dépendance n'est spécifiée (array()).
    // La version du script est définie sur '1.0'.
    // Le script est inclus dans le pied de page (in_footer) de la page.
    wp_enqueue_script('lightbox_script', get_template_directory_uri() . '/js/lightbox.js', array(),'1.0',array("in_footer"=>true));
}
// Ajoute l'action pour enregistrer la fonction 'lightbox_script' lors de l'événement 'wp_enqueue_scripts'.
add_action('wp_enqueue_scripts', 'lightbox_script');

//_____________________________________________charger le fichier select2 __________________________________________________
function select_script() {
    
    wp_enqueue_script('select_script', get_template_directory_uri() . '/js/select2.js', array(),'1.0',array("in_footer"=>true));
}

add_action('wp_enqueue_scripts', 'select_script');



