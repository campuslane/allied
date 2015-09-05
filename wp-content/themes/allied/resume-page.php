<?php
/**
 * Template Name: Resume Page
 */
?>

<!-- the header -->
<?php global $pageTitle; $pageTitle = "Allied Search | Submit your Resume"; ?>
<?php get_header(); ?>

<!-- resume page content -->
<div class="container collage" style="padding:0; background-color:#eee; color:#555; font-size:32px; padding: 20px 40px;">
  Submit Resume
</div>
<div class="container" style="background:#fff;">
<br><br>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8">

		<div class="well" style="background:#eee; padding:18px;">
			Please use the form below to submit our resume to <strong>Allied Search</strong>.  In the messsage section let us know the type of postition you are seeking and anything other information you would like to include..  All information is held confidential.  You can also send your resume as an email attachment to <a title="mailto:hrvp@alliedsearchinc.com" href="mailto:hrvp@alliedsearchco.com">hrvp@alliedsearchco.com</a>
		</div>
		 <?php while ( have_posts() ) : the_post(); ?>
    		<?php get_template_part( 'template-parts/content', 'page' ); ?>
  		<?php endwhile; ?>
  		<br>
		<br>
		<br>
	</div>

	
</div>
 
</div>

<!-- the footer -->
<?php get_footer(); ?>

