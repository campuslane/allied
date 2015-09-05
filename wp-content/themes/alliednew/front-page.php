<?php
/**
 * Template Name: Front Page
 */
?>

<!-- the header -->
<?php global $homeActive; $homeActive = true; ?>
<?php global $pageTitle; $pageTitle = "Executive Recruiters San Francisco | Allied Search"; ?>

<?php get_header(); ?>

<!-- front page content -->
<div class="container" style="padding:0;">
	<img src="<?php echo get_template_directory_uri(); ?>/images/sfgg.jpg" class="img-responsive"  alt="">
</div>

<div  class="container" style="background:#fff; padding-top:28px;">
	<br>
	<div style="display:table; width:100%; background:#eee; border-radius:4px;">

		<div style="display:table-row;">
			<div style="display:table-cell; vertical-align:middle; width:70%; padding:40px;">
				<p class="intro"  style="font-size:17px;">For over 30 Years <strong>Allied Search</strong> has been placing top talent at companies in the U.S. and Worldwide. If you need to fill positions at your company, or if you are seeking a new opportunity, contact us today for information on how we can help you reach your goals.</p>
			</div>
			<div class="hidden-xs" style="display:table-cell; vertical-align:middle; width:30%; text-align:center; background:#eee;">
				 <a href="/resume" class="btn btn-primary">Submit your Resume</a>
			</div>
		</div>
	</div>


		
		<br>
	
	
		

		<div class="well">

		<div style="text-align:center; font-weight:bold; font-size:20px; margin-bottom:28px;">
			DIVISIONS
			<div style="border-bottom:1px dotted #ccc; margin-top:12px;"></div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h4><i class="fa fa-check-circle color-check"></i> Executive</h4>
				Presidents (CEO's) and Vice Presidents (VP's) in all industries.
				<br><br>
				<h4><i class="fa fa-check-circle color-check"></i> Financial</h4>
				Chief Financial Officers (CFO's), Treasurers, Controllers, Directors, Managers, Supervisors, Accountants, Analysts, etc. in all industries.
				<br><br>

				<h4><i class="fa fa-check-circle color-check"></i> Tax</h4>
				Tax Specialists in Public Accounting (staff up to Partner) and all industries (staff up to VP of Taxes).
				<br><br>

				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">

				<h4><i class="fa fa-check-circle color-check"></i> Consulting</h4>
				Advisory, Business, Cyber Security, Economic, Educational, Energy, ERP, Financial, Healthcare, Human Resources, Litigation, Management, Operational, Outsourcing, Pharmaceutical, Public Sector, Risk, SAP, Strategy, Technology, Etc..
				<br><br>
				

				<h4><i class="fa fa-check-circle color-check"></i> Sales & Marketing</h4>
				Staff, Supervisors, Managers, Directors, VP's, etc. in all industries.
				<br><br>


				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h4><i class="fa fa-check-circle color-check"></i> Human Resources</h4>
				Staff, Supervisors, Managers, Directors, VP's, etc. in all industries.
				<br><br>

				<h4><i class="fa fa-check-circle color-check"></i> Audit</h4>
				IT Auditors, Internal Auditors, Financial Auditors, Integrated Auditors, Operational Auditors, etc. in Public Accounting (staff up to Partner) and all industries (staff up to VP of Audit).
				<br><br>
			</div>
		</div>
		</div>
		
		
		<div style="text-align:center;">
		<img src="<?php echo get_template_directory_uri(); ?>/images/bofa.png" alt=""> &nbsp; 
		<img src="<?php echo get_template_directory_uri(); ?>/images/ibm.jpg" alt="">  &nbsp; &nbsp;
		<img src="<?php echo get_template_directory_uri(); ?>/images/kpmg.png" alt="">  &nbsp; 
		</div>
		
		<br>

</div>

<!-- the footer -->
<?php get_footer(); ?>

