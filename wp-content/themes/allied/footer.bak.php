<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Kyoto
 */

?>

	

			<br><br>
			<a href="<?php //echo esc_url( __( 'https://wordpress.org/', 'kyoto' ) ); ?>"><?php //printf( esc_html__( 'Proudly powered by %s', 'kyoto' ), 'WordPress' ); ?></a>
			<hr>
			<?php //printf( esc_html__( 'Theme: %1$s by %2$s.', 'kyoto' ), 'kyoto', '<a href="http://underscores.me/" rel="designer">Frank Matull</a>' ); ?>
	
	</div><!-- .site-content -->

	<br>
	<br>
	<br>



<?php wp_footer(); ?>

<script>
(function($){

	$(function(){

	
		$(document).on('click', '.skin', function(e){
			e.preventDefault();

			var data = {
				action:    'change_skin',
	            skin:    $(this).attr('data-skin-name')
			}

			$.post(ajaxurl, data, function (response) {
		        location.reload();
		    });
		});

		

	});

})(jQuery);


</script>

</body>
</html>
