<!doctype html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js">
<head>

  @include('layouts._head')

  @yield('css')

</head>


<body class="home page-template-default page page-id-9561 wpb-js-composer js-comp-ver-4.11.2 vc_responsive" data-footer-reveal="false" data-header-format="default" data-header-breakpoint="1000" data-footer-reveal-shadow="none" data-dropdown-style="classic" data-cae="linear" data-megamenu-width="contained" data-cad="650" data-aie="none" data-ls="magnific" data-apte="standard" data-hhun="0" data-fancy-form-rcs="1" data-form-style="default" data-form-submit="default" data-is="minimal" data-button-style="rounded" data-header-inherit-rc="false" data-header-search="true" data-animated-anchors="true" data-ajax-transitions="false" data-full-width-header="false" data-slide-out-widget-area="true" data-slide-out-widget-area-style="slide-out-from-right" data-user-set-ocm="1" data-loading-animation="none" data-bg-header="false" data-ext-responsive="true" data-header-resize="0" data-header-color="custom" data-transparent-header="false" data-cart="false" data-smooth-scrolling="0" data-permanent-transparent="false" data-responsive="1" >
<div id="header-outer" data-has-menu="true"  data-using-pr-menu="false" data-mobile-fixed="false" data-ptnm="1" data-lhe="default" data-user-set-bg="#1b2021" data-format="default" data-permanent-transparent="false" data-megamenu-rt="0" data-remove-fixed="0" data-cart="false" data-transparency-option="0" data-box-shadow="small" data-shrink-num="6" data-full-width="false" data-using-secondary="0" data-using-logo="1" data-logo-height="50" data-m-logo-height="20" data-padding="20" data-header-resize="0">
	
	
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

   @include('layouts._scripts')

</body>

</html>