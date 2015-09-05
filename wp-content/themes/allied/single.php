<?php
/**
 * The template for displaying all single posts.
 *
 * @package Kyoto
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


<div class="color-block-small">
		<div class="container empty-block-text"></div>
</div>
	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">

		<div class="row">
		
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		</div>

		</main><!-- #main -->
	</div><!-- #primary -->
		

<div class="container">
	<?php get_footer(); ?>
</div>

<?php endwhile; // End of the loop. ?>
