
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>jQuery Plugin - Social Stream Network Wall</title>
<link rel="stylesheet" type="text/css" href="wall/inc/layout.css" media="all" />
<link rel="stylesheet" type="text/css" href="wall/css/dcsns_wall.css" media="all" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="wall/inc/js/jquery.plugins.js"></script>
<script type="text/javascript" src="wall/inc/js/jquery.site.js"></script>
<script type="text/javascript" src="wall/js/jquery.social.stream.wall.1.8.js"></script>
<script type="text/javascript" src="wall/js/jquery.social.stream.1.6.2.js"></script>

<script type="text/javascript">
jQuery(document).ready(function($){
	$('#social-stream').dcSocialStream({
		feeds: {
			twitter: {
				id: 'GakamiBenjamin'
			},
			facebook: {
				id: '157969574262873',
				out: 'intro,thumb,text,user,share'
			},
			instagram: {
				id: '#love,!2265605560',
				search: 'Search',
				out: 'intro,thumb,text,user',
				accessToken: '4464708641.3a81a9f.151453bb3f6c4efaab0c12071c14d3ea'
			}
		},
		rotate: {	 		
			direction:	'up',	
			delay:	80	
		},
		style: {
			layout: 'modern',
			colour: 'light'
		},
		twitterId: 'GakamiBenjamin',
		control: false,
		filter: true,
		wall: true,
		center: true,
		cache: false,
		max: 'limit',
		limit: 10,

		iconPath: 'wall/images/dcsns-dark/',
		imagePath: 'wall/images/dcsns-dark/'
	});
				 
});
</script>
<style>
h3 {text-align: center;}
#wall {padding: 10px 0 0 0; min-height: 2000px;}
#wrapper, #container {width:100%; padding: 0;}
#nav-container {margin-bottom: 20px;}
</style>
</head>

<body>

<!-- Begin Second Wrapper -->

	<div id="wrapper">
	 
	  <div id="container"> 
	  <!-- Begin Question Block -->

		<div id="wall">
			
			<div id="social-stream"></div>

			<div class="clear" style="margin-bottom: 20px;"></div>


		</div>

	</div>
<!-- End Wrapper -->
</body>
</html>