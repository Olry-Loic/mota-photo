<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>MotaPhoto</title>
    <?php wp_head(); ?>
</head>
<body>
<div class="logo">
        <img src="<?php echo get_theme_file_uri() . '/assets/images/logo.png'; ?> "alt="">
    </div>
    <header>
        <nav id="nav">  
        <div id="icons"></div>
            <div class="menu-one">
                <?php wp_nav_menu(['theme_location' => 'main-menu',]); ?>
                <ul id="contact" class="contact">
                    <li><a href="#" id="contactBtn">CONTACT</a></li> 
                </ul>
                 
            </div>       
        </nav>

    </header>