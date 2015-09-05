<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kyoto
 */

get_header(); ?>

		<div class="color-block-small">
			<div class="container">

			<!-- <h1>Taxonomy:New</h1> -->
			<h1>
			<?php 
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				//echo $term->name;

				if($term->slug == 'list') : 
					echo "Countries";
				endif;
			 ?>
			 </h1>
			</div>
		</div>

		

		<div class="container">
		<div class="row">
		<div class="col-lg-7 col-md-7 col-sm-7">

		<?php if ( have_posts() ) : ?>

			

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					//get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php //the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
	</div>

	<div class="col-lg-1 col-md-1 col-sm-1"></div>


	<div class="col-lg-4 col-md-4 col-sm-4">

	<?php //get_sidebar(); ?>
	</div>

	</div>
<?php get_footer(); ?>
</div>
