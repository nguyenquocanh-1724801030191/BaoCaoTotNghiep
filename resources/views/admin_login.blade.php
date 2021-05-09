
<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>

<!-- Head -->
<head>

<title>Đăng nhập Admin</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->

<link href="{{asset('public/backend/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />

<!-- Style --> <link rel="stylesheet" href="{{asset('public/backend/css/style-login.css')}}" type="text/css" media="all">
<!-- Fonts -->
<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>SHOP GIÀY Q & A </h1>

	<div class="w3layoutscontaineragileits">
	<h2>Đăng Nhập </h2>
	<?php
	$message = Session::get('message');
	if($message){
		echo '<span class="text-alert">'.$message.'<span>';
		Session::put('message',null);

	}
	?>
		</br></br>
		<form action="{{URL::to('/admin-dashboard')}}" method="post">
		{{ csrf_field() }}
		<input type="email" class="ggg" name="admin_email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="admin_password" placeholder="PASSWORD" required="">
			<!-- <ul class="agileinfotickwthree">
				<li>
					<input type="checkbox" id="brand1" value="">
					<label for="brand1"><span></span>Remember me</label>
					<a href="#">Forgot password?</a>
				</li>
			</ul> -->
			<div class="aitssendbuttonw3ls">
			<input type="submit" value="Sign In" name="login">
				
				<div class="clear"></div>
			</div>
		</form>
	</div>
	
	<div class="w3footeragile">
		<p> Design by Quoc Anh</p>
	</div>

	
	<script type="text/javascript" src="{{asset('public/backend/js/jquery-2.1.4.min.js')}}"></script>

	<!-- pop-up-box-js-file -->  
		<script src="{{asset('public/backend/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
	<!--//pop-up-box-js-file -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>

</body>
<!-- //Body -->

</html>