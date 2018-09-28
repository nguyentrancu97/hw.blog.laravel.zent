<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('login_assets')}}/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_assets')}}/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_assets')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_assets')}}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_assets')}}/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login_assets')}}/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_assets')}}/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_assets')}}/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login_assets')}}/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_assets')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('login_assets')}}/css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
	

	<div class="limiter">
		<div class="row" style="background: #ebeeef">
		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11" align="right">
			<div class="btn-group" role="group" aria-label="...">
				<a  class="btn btn-default" href="{{asset('login')}}">Login</a>
				<a  class="btn btn-default" href="{{asset('register')}}">Register</a>

			</div>
		</div>
	</div>
		@yield('content')
	</div>

	
	
	<!--===============================================================================================-->
	<script src="{{asset('login_assets')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="{{asset('login_assets')}}/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="{{asset('login_assets')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('login_assets')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="{{asset('login_assets')}}/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="{{asset('login_assets')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{asset('login_assets')}}/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="{{asset('login_assets')}}/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="{{asset('login_assets')}}/js/main.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</body>
@stack('script')

</html>