<?php
//_______________________________________création du style personnaliser_____________________________________________
function mon_theme_enqueue_styles() {
    wp_enqueue_style('porrtefolio-style',  get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), 
    filemtime(get_stylesheet_directory() . '/css/theme.css'));
}
 
add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');

//_________________________________ajout de la fonction de configuration du menu______________________________________
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );




