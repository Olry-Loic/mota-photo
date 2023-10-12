<?php
// Déclaration d'un tableau d'arguments pour la requête WordPress.
$args = array(
    'post_type' => 'photo', 
    'posts_per_page' => 1, 
    "orderby" => "rand",
);

// Création d'une nouvelle requête WordPress en utilisant les arguments définis précédemment.
$query = new WP_Query($args);
// Vérification si la requête renvoie des publications.
if ($query->have_posts()) :
  
        // Récupération de la première publication.
        $query->the_post();
        // Récupération de l'URL de l'image miniature de la publication.
        $image_url = get_the_post_thumbnail_url();
        // Récupération de l'attribut `alt` de l'image miniature.
        $image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true);

    // Vérification si l'URL de l'image est vide.
    if (!empty($image_url)) {

        // Affichage de l'image miniature dans une balise `div` avec la classe `main-hero-image`.
        ?>
        <div class="main-hero-image">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
        </div>
        <?php
    }  

endif;
?>
