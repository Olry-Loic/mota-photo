<?php get_header(); ?>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
<article class="post">
   	<div class="post-info-image">
		<div class="post-image">
			<?php the_post_thumbnail(); ?>
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
                <li><a href="#" class="bouton contactBtn" data-reference="<?php echo get_post_meta(get_the_ID(), 'reference', true); ?>">CONTACT</a></li>
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
<?php endwhile; endif; ?>
<?php get_footer(); ?>