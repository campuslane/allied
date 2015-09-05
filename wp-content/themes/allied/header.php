<?php
  /**
   * Site Header
   */
  
   global $homeActive;
   global $candidateActive;
   global $clientActive;
   global $contactActive;
   global $pageTitle;
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <script src="https://use.typekit.net/gbu1nzd.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
  <title><?php echo $pageTitle; ?></title>

  <?php wp_head(); ?>
  
</head>

<body <?php body_class(); ?>>

<div class="container" style="padding:0;">
<nav class="navbar navbar-default" style="margin-bottom:0px">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/" >
        <img src="<?php echo get_template_directory_uri(); ?>/images/alliedlogoonly.jpg" id="allied-logo" alt="Allied Search"> Allied Search
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li <?php echo (isset($homeActive) and $homeActive) ? ' class=active ' : '' ; ?>><a href="/">HOME</a></li>
        <li <?php echo (isset($candidateActive) and $candidateActive) ? ' class=active ' : '' ; ?>><a href="/candidates">CANDIDATES</a></li>
        <li <?php echo (isset($clientActive) and $clientActive) ? ' class=active ' : '' ; ?>><a href="/clients">CLIENTS</a></li>
        <li <?php echo (isset($contactActive) and $contactActive) ? ' class=active '  : ''; ?>><a href="/contact">CONTACT</a></li>  
      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</div>
<div class="container background-primary" style="padding-top:8px; padding-bottom:8px; color:#fff; text-transform:uppercase; font-size:small;">
	<span class="pull-right hidden-xs">Call <i class="fa fa-phone"></i> (415) 921-1971</span>
  <span>Professional & Executive Recruitment Services</span>
</div>

