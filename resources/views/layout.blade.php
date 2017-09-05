<!doctype html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js">
<head>

  @include('layouts._head')

</head>


<body class="home page-template-default page page-id-9561 wpb-js-composer js-comp-ver-4.11.2 vc_responsive" data-footer-reveal="false" data-header-format="default" data-header-breakpoint="1000" data-footer-reveal-shadow="none" data-dropdown-style="classic" data-cae="linear" data-megamenu-width="contained" data-cad="650" data-aie="none" data-ls="magnific" data-apte="standard" data-hhun="0" data-fancy-form-rcs="1" data-form-style="default" data-form-submit="default" data-is="minimal" data-button-style="rounded" data-header-inherit-rc="false" data-header-search="true" data-animated-anchors="true" data-ajax-transitions="false" data-full-width-header="false" data-slide-out-widget-area="true" data-slide-out-widget-area-style="slide-out-from-right" data-user-set-ocm="1" data-loading-animation="none" data-bg-header="false" data-ext-responsive="true" data-header-resize="0" data-header-color="custom" data-transparent-header="false" data-cart="false" data-smooth-scrolling="0" data-permanent-transparent="false" data-responsive="1" >


	<div id="header-secondary-outer" data-full-width="false" data-permanent-transparent="false" >
		<div class="container">
			<nav>							
					<ul class="sf-menu">	
				   	   <li id="menu-item-9583" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9583"><a href=""></a></li>
				    </ul>					
			</nav>
		</div>
	</div>

<div id="header-outer" data-has-menu="true"  data-using-pr-menu="false" data-mobile-fixed="false" data-ptnm="1" data-lhe="default" data-user-set-bg="#1b2021" data-format="default" data-permanent-transparent="false" data-megamenu-rt="0" data-remove-fixed="0" data-cart="false" data-transparency-option="0" data-box-shadow="small" data-shrink-num="6" data-full-width="false" data-using-secondary="1" data-using-logo="1" data-logo-height="50" data-m-logo-height="20" data-padding="20" data-header-resize="0">
	
	
<div id="search-outer" class="nectar">	
	<div id="search">  	 
		<div class="container">	  	 	
		     <div id="search-box">	     	
		     	<div class="col span_12">
			      	<form action="https://miappi.com/" method="GET">
			      		<input type="text" name="s" id="s" value="Start Typing..." data-placeholder="Start Typing..." />
			      	</form>
			    </div><!--/span_12-->		      
		     </div><!--/search-box-->    
		     <div id="close"><a href="#"><span class="icon-salient-x" aria-hidden="true"></span></a></div>    
		 </div><!--/container-->
	</div><!--/search-->
</div><!--/search-outer-->	

  <!-- header -->
  	@include('layouts._header')
  <!-- header -->
	
	
	<div class="ns-loading-cover"></div>		

</div><!--/header-outer-->


 
 <!-- mobile menu -->
 	@include('layouts._mobilemenu')
 <!-- END -->


    <div id="ajax-loading-screen" data-disable-fade-on-click="0" data-effect="standard" data-method="standard">
		<div class="loading-icon none"> 
			<div class="material-icon">
				<div class="spinner">
					<div class="right-side"><div class="bar"></div></div>
					<div class="left-side"><div class="bar"></div></div>
				</div>
				<div class="spinner color-2">
					<div class="right-side"><div class="bar"></div></div>
					<div class="left-side"><div class="bar"></div></div>
				</div>
			</div> 
		</div>
	</div>

<div id="ajax-content-wrap">


<div class="container-wrap">
	
		@yield('content')
	
</div><!--/container-wrap-->

	<!-- footer -->
		@include('layouts._footer')
	<!-- footer
	 -->
	<div id="slide-out-widget-area-bg" class="slide-out-from-right light"></div>

    <!-- sidebar -->
    	@include('layouts._sidebar')
</div> <!--/ajax-content-wrap-->


<script data-cfasync="false">
  document.onreadystatechange = function () {
    if (document.readyState == "complete") {
      var logout_link = document.querySelectorAll('a[href*="wp-login.php?action=logout"]');
      if (logout_link) {
        for(var i=0; i < logout_link.length; i++) {
          logout_link[i].addEventListener( "click", function() {
            Intercom('shutdown');
          });
        }
      }
    }
  };
</script>
<script data-cfasync="false">
  window.intercomSettings = {"app_id":"itj87y21"};
</script>

<script type='text/javascript'>
/* <![CDATA[ */
var uiAutocompleteL10n = {"noResults":"No results found.","oneResult":"1 result found. Use up and down arrow keys to navigate.","manyResults":"%d results found. Use up and down arrow keys to navigate.","itemSelected":"Item selected."};
/* ]]> */
</script>

<script type='text/javascript'>
/* <![CDATA[ */
var MyAcSearch = {"url":"https:\/\/miappi.com\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>

<script type='text/javascript'>
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"https:\/\/miappi.com\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}},"cached":"1"};
/* ]]> */
</script>

<script type='text/javascript'>
/* <![CDATA[ */
var ctcc_vars = {"expiry":"30","method":"1","version":"1"};
/* ]]> */
</script>





<script type='text/javascript'>
/* <![CDATA[ */
var nectarLove = {"ajaxurl":"https:\/\/miappi.com\/wp-admin\/admin-ajax.php","postID":"9561","rooturl":"https:\/\/miappi.com","pluginPages":[],"disqusComments":"false","loveNonce":"ccb27f2b44","mapApiKey":""};
/* ]]> */
</script>


<script type="text/javascript">
	jQuery(document).ready(function($){
								if(!catapultReadCookie("catAccCookies")){ // If the cookie has not been set then show the bar
			$("html").addClass("has-cookie-bar");
			$("html").addClass("cookie-bar-top-bar");
			$("html").addClass("cookie-bar-bar");
											// Wait for the animation on the html to end before recalculating the required top margin
				$("html").on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(e) {
					// code to execute after transition ends
					var barHeight = $('#catapult-cookie-bar').outerHeight();
					$("html").css("margin-top",barHeight);
					$("body.admin-bar").css("margin-top",barHeight-32); // Push the body down if the admin bar is active
				});
									}
															ctccFirstPage();
							});
</script>
			
	<div id="catapult-cookie-bar" class=" use_x_close float-accept"><div class="ctcc-inner "><span class="ctcc-left-side">This site uses cookies.  <a class="ctcc-more-info-link" tabindex=0 target="_blank" href="terms-and-privacy/index.html">More Info</a></span><span class="ctcc-right-side"></span><div class="x_close"><span></span><span></span></div></div><!-- custom wrapper class -->
	</div><!-- #catapult-cookie-bar -->	

<script type="text/javascript" defer src="/wp-content/cache/autoptimize/js/autoptimize_57cc97d3bd77fd2c31bde8ea045edf2e.js"></script></body>

</html>