<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kyoto
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		

		<div id="primary" class="content-area" >
		<main id="main" class="site-main container" role="main">
			
		<div class="row">

			<!-- main column -->
			<div class="col-lg-7 col-md-7 col-sm-7">

					<?php get_template_part( 'template-parts/content', 'page' ); ?>
			</div>
	
	<!-- spacer column -->
	<div class="col-lg-1 col-md-1 col-sm-1"></div>

	<!-- side column -->
	<div class="col-lg-4 col-md-4 col-sm-4">
		<?php //get_sidebar(); ?>
	</div>

</div> <!-- .row -->


<?php get_footer(); ?>

<?php endwhile; // End of the loop. ?>

</main><!-- #main -->
</div><!-- #primary -->


