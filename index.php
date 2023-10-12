<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	the_content();
	get_template_part( 'template-parts/content/content-page' );

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.
?>
<main>
	<div class="main-hero">
	<?php get_template_part('parts/hero'); ?>
		<h2>PHOTOGRAPHE EVENT</H2>
	</div>
	<div class="main-filter">
		<div class="main-filter-catfor" >
			<?php
				$args = array(
					'show_option_all' => 'CATÉGORIES',
					'taxonomy' => 'categorie', 
					'name' => 'categorie',
					'orderby' => 'name',
					'selected' => isset($_GET['categorie']) ? $_GET['catégorie'] : '', 
				);
			wp_dropdown_categories($args);
			?>
			<?php
				$args = array(
					'show_option_all' => 'FORMAT',
					'taxonomy' => 'format', 
					'name' => 'format',
					'orderby' => 'name',
					'selected' => isset($_GET['format']) ? $_GET['format'] : '', 
				);
			wp_dropdown_categories($args);
			?>
		</div>
		<div class="main-filter-trier">
			<select name="trier" id="trier" class="postform">
				<option value="0">TRIER PAR</option>
				<option value="nouveautes">NOUVEAUTÉS</option>
				<option value="anciennetes">ANCIENNETÉS</option>
			</select>
		</div>	
	</div>
	<div class="main-pagination">
	<?php
	$args= array (
		'post_type' => 'photo', 
		'posts_per_page' => 8, 
		'orderby' => 'date',
		'order' => 'DESC',
		'paged' => 1,
	);  
    
	$query = new WP_Query($args);
	 
    	while ($query->have_posts()) :
			include ('parts/relatedPhoto.php');
		endwhile;
	
    	wp_reset_postdata(); ?>
	
	</div>
	<div class="main-pagination-button">
      <a href="#!" class="button" id="pagination">Charger plus</a>
    </div>
</main>

<?php get_footer(); ?>
