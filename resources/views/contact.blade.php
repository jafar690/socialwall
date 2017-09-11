@extends('layout')

@section('css')
	<link type="text/css" href="{{ url('css/bootstrap-scope.css') }}" rel="stylesheet" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

@endsection

@section('content')

<div class="container main-content" style="padding-top: 90px;">
   <div class="row">			
		<div  data-midnight="dark" data-bg-mobile-hidden="" class="wpb_row vc_row-fluid vc_row standard_section   "  style="padding-top: 0px; padding-bottom: 0px; "><div class="row-bg-wrap"><div class="inner-wrap"> <div class="row-bg    "  style="" data-color_overlay="" data-color_overlay_2="" data-gradient_direction="" data-overlay_strength="0.3" data-enable_gradient="false"></div></div> </div><div class="col span_12 dark left">
		<div  class="vc_col-sm-8 wpb_column column_container vc_column_container col no-extra-padding"  data-shadow="none" data-border-animation="" data-border-animation-delay="" data-border-width="none" data-border-style="" data-border-color="" data-bg-cover="" data-padding-pos="all" data-has-bg-color="false" data-bg-color="" data-bg-opacity="1" data-hover-bg="" data-hover-bg-opacity="1" data-animation="" data-delay="0">
			<div class="bootstrap-scope">
				<div class="bootstrap-scope">
					<form>
					  <div class="form-group col-sm-12">
					    <label for="exampleInputEmail1">Full names</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
					  </div>
					  <div class="col-sm-6">
					  	  <div class="form-group">
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
						  </div>
					  </div>
					  <div class="col-sm-6">
					  	  <div class="form-group">
						    <label for="exampleInputPassword1">Phone</label>
						    <input type="number" class="form-control" id="phone" placeholder="Enter phone">
						  </div>
					  </div>

					  <div class="col-sm-4">
						  <div class="form-group">
						    <label for="eventtype">Event type</label>
<select class="selectpicker">
  <option>Mustard</option>
  <option>Ketchup</option>
  <option>Relish</option>
</select>						  </div>
					  </div>
					  <div class="col-sm-4">
					  	  <div class="form-group">
						    <label for="enventdate">Date</label>
						    <input class="form-control" type="date"  id="enventdate">
						  </div>
					  </div>
					  <div class="col-sm-4">
					  	  <div class="form-group">
						    <label for="exampleInputPassword1">Duration</label>
						    <input type="number" class="form-control" id="phone" placeholder="Enter phone">
						  </div>
					  </div>
					  <div class="col-sm-6">
					  	  <div class="form-group">
						    <label for="budget">Budget</label>
						    <input class="form-control" type="number"  id="budget">
						  </div>
					  </div>
					  <div class="col-sm-6">
					  	  <div class="form-group">
						    <label for="exampleInputPassword1">How did you learn about us?</label>
						    <input type="number" class="form-control" id="phone" placeholder="Enter phone">
						  </div>
					  </div>
					  <div class="col-sm-12">
					  	  <div class="form-group">
						    <label for="exampleInputPassword1">Message</label>
						      <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
						  </div>
					  </div>
					</form>
				</div> 
			</div>
		</div> 

		<div  class="vc_col-sm-4 wpb_column column_container vc_column_container col no-extra-padding"  data-shadow="none" data-border-animation="" data-border-animation-delay="" data-border-width="none" data-border-style="" data-border-color="" data-bg-cover="" data-padding-pos="all" data-has-bg-color="false" data-bg-color="" data-bg-opacity="1" data-hover-bg="" data-hover-bg-opacity="1" data-animation="" data-delay="0">
			<div class="vc_column-inner">
				<div class="wpb_wrapper">	
					<div class="wpb_text_column wpb_content_element " >
						<div class="wpb_wrapper">
							<h2><span style="color: #333333;">Contact us</span></h2>

						</div>
					</div>
					<div class="divider-wrap">
						<div style="height: 20px;" class="divider"></div>
					</div>
						<div class="wpb_text_column wpb_content_element " >
							<div class="wpb_wrapper">
								<h6><span style="color: #333333;">FunPics Singapore</span></h6>
								<h6><span style="color: #333333;">Mobile: 9222-2235</span><br />
									<span style="color: #333333;"> Email: Hello@funpicssg.com</span><br /></h6>
							</div>
						</div>
				</div> 
			 </div>
		</div> 

</div>
</div>
	
							
	
	</div><!--/row-->
	
</div><!--/container-->

@endsection

@section('scripts')

@endsection