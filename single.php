<?php get_header(); ?>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
<article class="post">
   	<div class="post-info-image">
		<div class="post-image">
			<?php the_post_thumbnail(); ?>
			<div class="post-lightbox">
				<div class="post-lightbox-single"></div>
			</div>
		</div>
   		<div class="post-info">			 
            <div class="post-texte">
                <h1><?php the_title(); ?></h1>
                <p> RÉFERENCE : <?php echo get_post_meta(get_the_ID(), 'reference', true); ?></p>
                <p> CATÉGORIE :<?php echo the_terms(get_the_ID(), 'categorie', false); ?></p>
                <p> FORMAT : <?php echo the_terms(get_the_ID(), 'format', false); ?></p>
                <p> TYPE : <?php echo get_post_meta(get_the_ID(), 'type', true); ?></p>
                <p> ANNÉE : <?php the_date('Y'); ?></p>
            </div>
		</div>
	</div>
    <div class="post-commande">
		<div class="post-commande-texte">
			<p>Cette photo vous intéresse ?</p>
			<ul id="commande-contact" class="commande-contact">
                <li><a href="#" class="button contactBtn" data-reference="<?php echo get_post_meta(get_the_ID(), 'reference', true); ?>">CONTACT</a></li>
            </ul>
		</div>
		<div class="post-commande-navigation">	
			<div class="post-commande-arrow">
				<div>
					<a href="<?php echo get_permalink(get_next_post()); ?>" class="arrow_left"></a>
					<span class="img1"><?php echo get_the_post_thumbnail(get_next_post(),'medium'); ?>
				</div>
				<div>
					<a href="<?php echo get_permalink(get_previous_post()); ?>" class="arrow_right"></a>
					<span class="img2"><?php echo get_the_post_thumbnail(get_previous_post(),'medium'); ?>
				</div>
			</div>	
		</div>
	</div>
	<div class="post-apparente">
		<h2>VOUS AIMEREZ AUSSI</h2>
		<div class="post-apparente-image">
			<?php	
				$category_text = '';

				$category_terms = get_the_terms(get_the_ID(), 'categorie'); 
				
				if ($category_terms && !is_wp_error($category_terms)) {
					$first_category = reset($category_terms);
					$category_text = $first_category->name;
				}

				wp_reset_query();
				wp_reset_postdata(); 
				$args = array (
				  	'post_type' => 'photo', 
				  	'posts_per_page' => 2, 
					"post__not_in" => array(get_the_ID()), 
					"orderby" => "rand",
				  	'tax_query' => array(
						array(
							'taxonomy' => 'categorie', 
							'field'    => 'slug',
							'terms'    => $category_text, 
						),
					),
				);  
				$query = new WP_Query($args);
				
				while ($query->have_posts()) :
					include ('parts/relatedPhoto.php');
				endwhile;
				wp_reset_postdata(); 
			?>
		</div>
		<div class="post-apparente-btn">
		<ul id="post-apparente" class="post-apparente">
            <li><a href="http://localhost/mota-photo/" class="button">Toutes les photos</a></li>
        </ul>
		</div>
	</div>
	<div class="lightbox">
		<div class="lightbox__box">
			<button class="lightbox__close">Fermer</button>
			<button class="lightbox__next">Suivant</button>
			<button class="lightbox__prev">Précédent</button>
			<div class="lightbox__container">
				<img src="<?php echo esc_url($image_url); ?>" alt="">
			<div class="lightbox__info">
				<p class="lightbox__ref">azert</p>
				<p class="lightbox__cat">azerrt</p>
			</div>
			</div>
		</div>
</article>
	
<?php endwhile; endif; ?>
<?php get_footer(); ?>