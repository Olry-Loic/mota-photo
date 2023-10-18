<?php
    $query->the_post();
    // Récupère l'URL de l'image en vedette (post thumbnail) associée au post actuel.
    $image_url = get_the_post_thumbnail_url();
    // Récupère le texte alternatif de l'image.
    $image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true);
    ?>
    <!-- Début de la structure HTML pour afficher une photo -->
    <div class="photo">
          <a href="<?php echo esc_url($image_url); ?>"><img src="<?php echo esc_url($image_url); ?>" /></a>
          <div class="overlay">
               <div class="fullscreen">
                   <a href="<?php echo get_permalink(); ?>"></a>
               </div>
               <div class="eye">
                    <a href="<?php echo esc_url($image_url); ?>"></a>
                    <div id="overlay-eye" ></div>
               </div>
               <div class="info">
                    <p><?php echo the_terms(get_the_ID(), 'categorie', false); ?></p>
                    <p><?php echo get_post_meta(get_the_ID(), 'reference', true); ?></p>
               </div>
          </div>
    </div>
    