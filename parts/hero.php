<?php
// Récupére toutes les images de type de publication 'photo'.
$args = array(
    'post_type' => 'photo', 
    'posts_per_page' => 1, 
    "orderby" => "rand",
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    // Stocke toutes les images dans un tableau.
   
        $query->the_post();
        $image_url = get_the_post_thumbnail_url();
        $image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true);

    // Affiche l'image dans votre héros.
    if (!empty($image_url)) {
        ?>
        <div class="main-hero-image">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
        </div>
        <?php
    }  

endif;
?>
