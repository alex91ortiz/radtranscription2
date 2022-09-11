<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
    <meta name="author" content="">
	<title>Laravel</title>

	<!-- Fonts -->
	<!--<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->
	<link href="{{ asset('/assets/vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">	
	<link href="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
	
	<link href="{{ asset('/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
	<link href ="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body >
	
	@yield('content')

	<!-- Scripts -->
	<script src="{{ asset('/sb-admin/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('/sb-admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
	<script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
	<script src="{{ asset('/assets/js/hoverable-collapse.js') }}"></script>
	
	<script src="{{ asset('/assets/js/dashboard.js') }}"></script>
	<script src="{{ asset('/assets/js/misc.js') }}"></script>
	<script src="{{ asset('/assets/vendors/chart.js/Chart.min.js') }}"></script>
	<script src="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.categories.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.stack.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.pie.js') }}"></script>
</body>
</html>
