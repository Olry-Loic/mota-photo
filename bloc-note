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
get_header(); ?>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
  
  <article class="post">
  <h2><?php the_title(); ?></h2>
  <?php the_post_thumbnail(); ?>
	<div class="post__meta">
	  <p>
	  <?php the_category(); ?>
		Publié le <?php the_date(); ?>
	  </p>
	</div>

	<div class="post__content">
	  <?php the_content(); ?>
	</div>
  </article>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
