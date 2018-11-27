<?php

	$ip = $_SERVER['REMOTE_ADDR'] ;
	$name = $_SERVER['HTTP_SHIBBOLETH_GIVENNAME'] ;
	$barcode = $_SERVER['HTTP_SHIBBOLETH_BROWNBARCODE'] ;

?>

<!DOCTYPE html>	

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<meta name="robots" content="nofollow" />
	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<meta name="description" content="Brown University Library website." />
	
	<title>My Library Stuff @ Brown University Library</title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/globals.css">
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/typography.css">
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/grid.css">
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/ui.css">
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/forms.css">
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/orbit.css">
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/reveal.css">
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/app.css">
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/mobile.css">
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/presentation.css">
	
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/BULadditions.css">
	
	<link rel="stylesheet" href="https://library.brown.edu/foundation/stylesheets/general_foundicons.css">
	
	<script src="https://library.brown.edu/foundation/javascripts/jquery.min.js"></script>
	
	<script type="text/javascript">
		var siteroot = "https://library.brown.edu/libweb";
	</script>
    	
	<script type="text/javascript" src="https://library.brown.edu/about/js/jquery.simplemodal.1.4.3.min.js"></script>
	
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9eBPHmvwulIBaqgq--4rc2Ro2KvpbWIQ&amp;sensor=false"></script>
	
	<script type="text/javascript" src="https://library.brown.edu/about/js/geo_libraries.js"></script>
	
	<script type="text/javascript" src="https://library.brown.edu/about/js/gmap2.js"></script>
	
	<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0027/2813.js" async="async"></script>	
	
</head>
<body>

    <div class="row">    
      <div class="twelve columns">
  
        <div id="header" class="container">
    
          <div id="header_contents">
      
				<?php
                      include ('/var/www/html/includes/header_foundation.html');
				?>
      
          </div> <!-- end #header_contents -->
        
        </div> <!-- end #header -->
      
      </div> <!-- end twelve columns -->
    </div> <!-- end .row -->

	<div class="container">
		
        <div class="row">
	<div class="twelve columns">
				
                <div id="search_area">

				<?php
                      include ('/var/www/html/includes/search_area_code.html');
                  ?>
                      
                </div> <!-- end #search_area -->
			
            </div> <!-- end twelve columns -->
		</div> <!-- end .row -->
		
		<div class="row">
			
            <div class="three columns show-on-desktops">
				
                <div id="navbar">

					<?php
                      include ('/var/www/html/includes/nav_foundation-desktop.html');
					?>

                </div> <!-- end #navbar -->
                                
            </div> <!-- end .three columns show-on-desktops -->			

            <div class="three columns show-on-tablets">
				
                <div id="navbar-tablets">

				  <?php
                      include ('/var/www/html/includes/nav_foundation-tablets.html');
                  ?>

                </div> <!-- end #navbar -->
				                
			</div> <!-- end .three columns show-on-tablets -->

          <div class="eight columns" style="float:left;">

              <h3><?php echo $name ; ?>'s Library Stuff</h3>
                				
<hr />

<p>(Your barcode number is <?php echo $barcode ; ?>)

<ul>

	<li><a href="https://josiah.brown.edu/patroninfo~S7/">My currently checked-out items (from Brown)</a> <i>( &lt;--this is the one that needs the Sierra 7-digit patron ID)</i></li>
	<li><a href="https://library.brown.edu/ezborrow/track.php">My interlibrary loan items</a></li>
	<li><a href="https://illiad.brown.edu/illiad/illiad.dll?Action=10&Form=68">My article requests</a></li>
	<li><a href="https://illiad.brown.edu/illiad/illiad.dll?Action=10&amp;Form=64">My digitally received articles</a></li>
	<li><a href="">My easyScan Annex scan requests</a> <i>( &lt;--this is one I have nothing for)</i></li>
	<li><a href="https://search.library.brown.edu/bookmarks">My search bookmarks in Josiah</a></li>
	<li><a href="https://repository.library.brown.edu/studio/deposits/my-deposits/">My Brown Digital Repository deposits</a></li>
	<li>My Special Collections requests from the John Hay Library <i>( &lt;--this is one I have nothing for)</i></li>
	<li>My Special Collections requests from the John Carter Brown Library <i>( &lt;--this is one I have nothing for)</i></li>
	<li><a href="https://library.brown.edu/libweb/my_library_account_login.php">My Library account</a></li>
</ul>

		</div> <!-- end eight columns -->
    	
    
    	</div> <!-- end .row -->
        
		
		<div class="row">
        
			<div class="one columns show-on-phones">
            
                <div id="navbar-mobile">
                
	 <?php
                      include ('/var/www/html/includes/nav_foundation-mobile.html');
                  ?>
                  
                </div> <!-- end #navbar-mobile -->
                
			</div> <!-- end one columns show-on-phones -->
            
		</div> <!-- end .row -->
        
        
        <!-- Google Analytics script -->
        <script type="text/javascript">
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <script type="text/javascript">
        try {
        var pageTracker = _gat._getTracker("UA-3203647-3");
        pageTracker._trackPageview();
        } catch(err) {}</script>

	</div> <!-- end .container -->

    <div id="footer">
    
     <?php
          include ('/var/www/html/includes/footer_contents_foundation.html');
      ?>
    
    </div> <!-- end #footer -->

	<script src="../foundation/javascripts/jquery.min.js"></script>
	<script src="../foundation/javascripts/jquery.reveal.js"></script>
	<script src="../foundation/javascripts/jquery.orbit-1.4.0.js"></script>
	<script src="../foundation/javascripts/jquery.customforms.js"></script>
	<script src="../foundation/javascripts/jquery.placeholder.min.js"></script>
	<script src="../foundation/javascripts/modernizr.foundation.js"></script>
	<script src="../foundation/javascripts/jquery.tooltips.js"></script>
	<script src="../foundation/javascripts/app.js"></script>
	<script src="../foundation/presentation.js"></script>
    
    
    <!-- script for chat widget -->
	<script type="text/javascript" src="https://libraryh3lp.com/js/libraryh3lp.js?multi"></script>

</body>

</html>

