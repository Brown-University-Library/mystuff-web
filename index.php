<?php

// include the function that converts digits to English
include('/var/www/html/common/convert_digits_to_english.php') ;

// get these values from the patron's Shib values -- all can be seen at https://library.brown.edu/easyaccess/find/my_info/
	$name = $_SERVER['HTTP_SHIBBOLETH_GIVENNAME'] ;
	$patron_barcode = $_SERVER['HTTP_SHIBBOLETH_BROWNBARCODE'] ;
	$affiliation = $_SERVER['HTTP_SHIBBOLETH_AFFILIATION'] ;

// use Birkin's patron API tool to get a bunch of information based on the patron's barcode, grabbed above from Shib values. The important thing we need is the seven-digit "record_" "value" value (which we're calling the "Sierra ID"). This is important if we want to access anything that's in the Sierra WebPAC

// get the secret sauce
//----------------

require('included_tokens.php') ;	

//---------------	
		
// Take the json string given to you at the URL above, and turn it into an array. Get the Sierra ID.
	$patron_api_json = json_decode($result, true) ;
	$patron_sierra_id = $patron_api_json['response']['record_']['value'] ;
	$patron_sierra_id = ltrim($patron_sierra_id, "=") ;

// Let's find out if the person is staff, and if so, show the relevant Librarian, courses, etc.
$is_staff = strpos($affiliation, 'staff@brown.edu') ;

if($is_staff !== FALSE) {
	// placeholder for later, when we do something based on affiliation &c.
}

?>

<!DOCTYPE html>	
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="robots" content="nofollow" />
	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<meta name="description" content="Brown University Library website." />
	
	<title>My Library Dashboard @ Brown University Library</title>
  
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
	<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0027/2813.js" async="async"></script>	
	
	<style>
		#checkouts, #general, #faculty {
			border : 1px solid ; 
			background-color : #fafafa ; 
			padding : 20px ; "
		}
	
		#grid {
			display : grid ;
			padding : 0px ;
			margin : 0px ; 
			font-size : 1.2em ; 
			line-height : 1.5 ; 
			grid-row-gap : 10px ; 
			grid-column-gap : 10px ; 
		}
		
		#grid {
			grid-template-areas : 
								"checkouts"
								"general"
								"faculty"								
								;		
			grid-template-columns : 100% ;
		}
		
		@media (min-width: 1200px) {
			#grid {
				grid-template-areas : 
									"checkouts checkouts"
									"general faculty"								
									;
				grid-template-columns : 50% 50% ;
			}
			
		}	
		
		#grid > #checkouts {
			grid-area: checkouts;
		}		  
		
		#grid > #general {
			grid-area: general;
		}		  
		
		#grid > #faculty {
			grid-area: faculty;
		}		  
	
	
		.container ul {
			margin-left : 20px ; 
		}
		
		.item_title {
			font-style : italic ; 
		}
		ul#items {
			list-style-type : disc ; 
			margin-bottom : 20px ; 
			margin-top : 20px ; 
		}
		ul#items li {
			margin-bottom : 0px ; 
			float : left ; 
			margin-right : 90px ; 
			display : inline ; 
			
		}
		ul#items li:before { 
			content: "• "; 
		}
		
		/* embed icomoon support -- files in common/css/ */
		
		@font-face {	font-family: 'icomoon';	src:url('/common/fonts/icomoon.eot');	src:url('/common/fonts/icomoon.eot#iefix') format('embedded-opentype'),		url('/common/fonts/icomoon.ttf') format('truetype'),		url('/common/fonts/icomoon.woff') format('woff'),		url('/common/fonts/icomoon.svg#icomoon') format('svg');/* 	font-weight: normal;	font-style: normal; */}
		
		[class^="icon-"], [class*=" icon-"] {	font-family: 'icomoon';	/* 	font-style: normal;	font-weight: normal;	font-variant: normal;	text-transform: none;	line-height: 1; */	/* Better Font Rendering =========== */	-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
		
		.icon-books:before {	content: "\e92d   ";   font-size : 1.3em ; }
		.icon-earth:before {	content: "\e90c   ";   font-size : 1.2em ;}	
		.icon-files-empty:before { content: "\e932   ";   font-size : 1.2em ;}	
		.icon-quill:before { content: "\e914   ";   font-size : 1.2em ;}	
		.icon-stack:before { content: "\e93b";   font-size : 1.2em ;}	
		.icon-barcode:before { content: "\e944    ";   font-size : 1.2em ;}
		.icon-bookmarks:before { content: "\e9d4    ";   font-size : 1.2em ;}
		.icon-bookmark:before { content: "\e9d3    ";   font-size : 1.2em ;}
		.icon-list:before { content: "\e9bd    ";   font-size : 1.2em ;}
		.icon-user:before { content: "\e906    ";   font-size : 1.2em ;}
		.icon-profile:before { content: "\e930    ";   font-size : 1.2em ;}
		.icon-book:before { content: "\e92c    ";   font-size : 1.2em ;}
		.icon-download2:before { content: "\e9c8    ";   font-size : 1.2em ;}
		.icon-sphere:before { content: "\e9cc    ";   font-size : 1.2em ;}
		
		/* create icomoon spinner, which displays for five seconds after the page is loaded, and then disappears */
		
		.icon-spinner:before { content: "\e98a  "; font-size : 1.2em ; }
		
		@keyframes rotateMySpinner {
			0% {
				transform: rotate(0);
			}
			100% {
				transform: rotate(360deg);
			}
		}
		
		.spinner {
			display : inline-block ;
			animation-name : rotateMySpinner ;
			animation-duration : 1.5s ;
			animation-iteration-count : infinite ;
			animation-timing-function : linear ;
		}

		.spinner_container {	 
		    animation-name : disappearMySpinner ;
		    animation-duration : 0s ;
		    animation-delay : 5s ;
		    animation-fill-mode: forwards ;
		    
			float : left ; 
			margin-right : 10px ;
		}
		
		@keyframes disappearMySpinner {
		    to {
		        width : 0 ;
		        height : 0 ;
		        overflow : hidden ;
		    }
		}
		
		#checkout_contents {
			animation-name : fadeIn ;
			animation-duration : .75s ;
			animation-timing-function : linear ;
		}
		
		@keyframes fadeIn {
			0% { opacity: 0; }
			100% { opacity: 1; }
		}
		
	</style>

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

          <div class="eight columns" style="float : left ;">

              <h3><?php echo $name ; ?>'s Library Dashboard</h3>

<hr />

<p style="font-size : 1.3em ; ">Welcome to your personalized Library dashboard. If you have any comments about this service, <a href="https://docs.google.com/forms/d/e/1FAIpQLSez5zzTIojVqzlm94RtO8AYUUSGyiI6btVGNbSIdiU2tpaelg/viewform">we welcome your feedback</a>. Remember to <strong>quit your web browser</strong> when you're finished, to log out of your account.</p>

<div id="grid">
	<div id="faculty">
		<h2 style="color : #917673 ; font-size : 1.4em ;">For faculty / researchers</h2>
		<ul>
			<li><span class="icon-profile"></span> <a href="https://vivo.brown.edu/manager">Manage my VIVO profile</a> </li>
			<li><span class="icon-book"></span> <a href="https://library.brown.edu/reserves/cr/menu.php">Manage OCRA reserves for my course</a></li>
			<li><span class="icon-download2"></span> <a href="https://repository.library.brown.edu/studio/deposits/my-deposits/">My Brown Digital Repository deposits</a></li>
			<li><span class="icon-sphere"></span> <a href="https://repository.library.brown.edu/studio/doi/requests/">My DOI requests</a></li>
		</ul>
	
	</div>

	<div id="general">

	<h2 style="color : #917673 ; font-size : 1.4em ;">General Library Services</h2>
	
	<ul>
		<li><span class="icon-earth"></span> <a href="https://library.brown.edu/ezborrow/track.php">My interlibrary loan items</a></li>
		<li><span class="icon-files-empty"></span> <a href="https://illiad.brown.edu/illiad/illiad.dll?Action=10&amp;Form=64">My  digitally received articles</a> (ILLiad)</li>
		<li><span class="icon-quill"></span> <a href="https://brown.aeon.atlas-sys.com/remoteauth/aeon.dll?Action=10&Form=60">My Special Collections requests from the John Hay Library</a></li>
		<li><span class="icon-stack"></span> <a href="https://illiad.brown.edu/illiad/illiad.dll?Action=10&Form=68">My article request history</a> (ILLiad)</li>
		<li><span class="icon-barcode"></span> <a href="">My easyScan Annex scan requests</a> <i>( &lt;-- in development)</i></li>
		<li><span class="icon-bookmarks"></span> <a href="https://search.library.brown.edu/bookmarks">My search bookmarks in Josiah</a></li>
		<li><span class="icon-bookmark"></span> <a href="https://josiah.brown.edu/patroninfo~S7/<?php echo $patron_sierra_id ; ?>/getpsearches">My preferred searches in Classic Josiah</a></li>
		<li><span class="icon-list"></span> <a href="https://josiah.brown.edu/patroninfo~S7/<?php echo $patron_sierra_id ; ?>/readinghistory">My full checkout history</a> (if enabled)</li>
		<li><span class="icon-user"></span> <a href="https://library.brown.edu/libweb/my_library_account_login.php">My Library account</a></li>
	</ul>

	</div>  
		
	<div id="checkouts" style="clear : both ; ">
	
	<div class="spinner_container"><span class="spinner icon-spinner" aria-hidden="true"></span></div>
	
	<?php 
	// this pushes everything in the output buffer so far to the screen, so we don't have to wait for the cURL of data through the Sierra API to return content
	ob_flush() ; 
	flush() ; 

	// get the patron's checked out items
	$url_to_checked_out_items = "https://search.library.brown.edu/patron/checkouts" ;
	$postfields = "patronId=$patron_sierra_id&token=$blacklight_patron_checkouts_api_token" ;
	
	$ch = curl_init() ;
	curl_setopt($ch, CURLOPT_URL,$url_to_checked_out_items) ;
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields) ;
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE) ;
	$checked_out_items_data = curl_exec($ch) ;
	curl_close($ch) ;
	
	$checked_out_items_data_json = json_decode($checked_out_items_data, TRUE) ;
		
	$items_count = 0 ;
	$item_display = "<ul id='items'>" ;
	foreach($checked_out_items_data_json as $checked_out_item) {
		++$items_count ; 
		if($items_count < 3){
			$item_display .= "<li><span class='item_title'>" . $checked_out_item['Title'] . "</span><br />&nbsp;&nbsp;&nbsp;<b>due</b> " . substr($checked_out_item['DueDate'],0,-10) . "</li>" ;
		}
	}
	$item_display .= "</ul>" ;
	
	$and_more_count = $items_count - 2 ;
	$and_more_count = lcfirst(number_to_word($and_more_count)) ;	
	
	if($items_count == 1){
		$items_label = "item" ;
	}else{
		$items_label = "items" ;
	}
	
	if($items_count == 0){
		echo "<div id='checkout_contents'><span class='icon-books'></span>You have no items checked out of the Brown University Library.</div>" ;
	}else{
		echo "<div id='checkout_contents'><span class='icon-books'></span> <a href='https://josiah.brown.edu/patroninfo~S7/$patron_sierra_id/items'>My " . lcfirst(number_to_word($items_count)) . " checked-out Brown Library $items_label</a>
				<div style='font-size : .85em ; margin-left : 35px ; '>$item_display<span style='display : inline-block ; margin : 0px 0px 0px 70% ; font-style : italic ; '><a href='https://josiah.brown.edu/patroninfo~S7/$patron_sierra_id/items'>...and $and_more_count more</a></span></div></div>" ;
	}
		
	?>
				
</div>
	
</div><!-- end grid -->

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
