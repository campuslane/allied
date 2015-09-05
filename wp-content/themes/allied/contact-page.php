<?php
/**
 * Template Name: Contact Page
 */
?>

<!-- the header -->
<?php global $contactActive; $contactActive = true; ?>
<?php global $pageTitle; $pageTitle = "Allied Search | Contact Us"; ?>
<?php get_header(); ?>

<!-- contact page content -->
<div class="container collage" style="padding:0; background-color:#eee; color:#555; font-size:32px; padding: 20px 40px;">

  Contact Us
</div>

<div  class="container" style="background:#fff; padding-top:28px;">

  
    

  
  
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', 'page' ); ?>
      <?php endwhile; ?>
      </div>
     

      <div class="col-lg-6 col-md-6 col-sm-6" >
        <h4>Allied Search Co</h4>
        2030 Union Street, Suite 206<br>
        San Francisco, CA 94123<br>
        <hr>
        <i class="fa fa-phone"></i>  &nbsp; Phone: (415) 921-1971 <br>
        <i class="fa fa-fax"></i>  &nbsp; Fax: (415) 921-5309 <br>
        <i class="fa fa-envelope"></i>  &nbsp; Email: <a href="mailto:hrvp@alliedsearchco.com">hrvp@alliedsearchco.com</a>

        <hr>
        <div id="map-container" style="height:300px"></div>
        
      </div>
    </div>

  
    <br>
    <br>
    <br>
</div>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script>
  jQuery(function(){


    function init_map() {
      var var_location = new google.maps.LatLng(37.797577,-122.432707);
   
          var var_mapoptions = {
            center: var_location,
            zoom: 12, 
            styles: [
          {
            "featureType": "water",
            "stylers": [
              { "color": "#DAE0EB" }
            ]
          }
        ]
          };
   
      var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title:"Venice"});
   
          var var_map = new google.maps.Map(document.getElementById("map-container"),
              var_mapoptions);
   
      var_marker.setMap(var_map); 
 
      }
 
      google.maps.event.addDomListener(window, 'load', init_map);

  });

  </script>

<!-- the footer -->
<?php get_footer(); ?>

