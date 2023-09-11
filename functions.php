<?php

   add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');

function mon_theme_enqueue_styles() {

    wp_enqueue_style('motaphoto-style',  get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), 
    filemtime(get_stylesheet_directory() . '/css/theme.css'));
}
//ajout de la fonction de configuration du menu
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

// Charger le fichier JavaScript menuBurger.js
function menuBurger_script() {
    wp_enqueue_script('menuBurger_script', get_template_directory_uri() . '/js/burger.js', array(),'1.0',array("in_footer"=>true));
    }
    add_action('wp_enqueue_scripts', 'menuBurger_script');

// Charger le fichier JavaScript contact.js
function modalContact_script() {
        wp_enqueue_script('contact_script', get_template_directory_uri() . '/js/contact.js', array(),'1.0',array("in_footer"=>true));
    }
    add_action('wp_enqueue_scripts', 'modalContact_script');