<?php

    add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');

function mon_theme_enqueue_styles() {

    wp_enqueue_style('motaphoto-style',  get_stylesheet_uri(), array(), '1.0');


}