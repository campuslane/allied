<?php
/**
 * Template part for displaying single posts.
 *
 * @package Kyoto
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php kyoto_posted_on(); ?>
			<br><br>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">



		<?php
			if(has_excerpt()) : 
	            echo '<div class="well">';
				the_excerpt();
				echo '</div>';

			endif;
		?>
		<?php the_content(); ?> <br><br><hr>	
		<?php
			// wp_link_pages( array(
			// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kyoto' ),
			// 	'after'  => '</div>',
			// ) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php kyoto_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

