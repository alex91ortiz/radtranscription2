<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
    <meta name="author" content="">
	<title>TSING</title>

	<!-- Fonts -->
	<!--<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->
	<!--<link href="{{ asset('/sb-admin/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('/sb-admin/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/sb-admin/dist/css/sb-admin-2.css') }}" rel="stylesheet">
	<link href="{{ asset('/sb-admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	
	
	
	-->
	
	<link href="{{ asset('/assets/vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">	
	<link href="{{ asset('/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">	
	<link href ="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">
	<link href="{{ asset('/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" />
	


	
	<link href="{{ asset('/datatables/src/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/jquery-validation/form-validator/theme-default.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/assets/vendors/select2/select2.min.css') }}" rel="stylesheet">
	
	<link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/main.css') }}" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!--<nav class="navbar navbar-default ">
		<div class="container-fluid">
			<div class="navbar-header ">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>-->
	<div class="container-scroller">
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
		
			<ul class="nav">
				<li class="nav-item nav-profile">
				<a href="#" class="nav-link">
					<div class="nav-profile-image">
					<img src="assets/images/faces-clipart/pic-1.png" alt="profile" />
					<span class="login-status online"></span>
					<!--change to offline or busy as needed-->
					</div>
					<div class="nav-profile-text d-flex flex-column pr-3">
					<span class="font-weight-medium mb-2">@if(Auth::user()->companie) {{ Auth::user()->companie->description }} @else Admin @endif</span>
					<span class="font-weight-normal">{{ Auth::user()->name }}</span>
					</div>
					<span class="badge badge-danger text-white ml-3 rounded">3</span>
				</a>
				</li>
				@if(Auth::user()->role==1 || Auth::user()->role==2)<li class="nav-item"><a class="nav-link" href="{{ url('formalities') }}"><i class="mdi mdi-home menu-icon"></i><span class="menu-title">Tramites </span></a></li>@endif
				            @if(Auth::user()->role==1 || Auth::user()->role==2 || Auth::user()->role==3)<li class="nav-item"><a class="nav-link" href="{{ url('results') }}"><i class="mdi mdi-book menu-icon"></i><span class="menu-title">Resultados</span></a></li>@endif
				            @if(Auth::user()->role==1 || Auth::user()->role==2)<li class="nav-item"><a class="nav-link" href="{{ url('exams') }}"><i class="mdi mdi-format-list-checks menu-icon"></i><span class="menu-title">Examenes</span></a></li>@endif
				            @if(Auth::user()->role==1 || Auth::user()->role==2)<li class="nav-item"><a class="nav-link" href="{{ url('specialist') }}"><i class="mdi mdi-briefcase menu-icon"></i><span class="menu-title">Especialista</span></a></li>@endif
				            @if(Auth::user()->role==1 || Auth::user()->role==2)<li class="nav-item"><a class="nav-link" href="{{ url('word') }}"><i class="mdi mdi-briefcase menu-icon"></i><span class="menu-title">Palabras</span></a></li>@endif
				            @if(Auth::user()->role==1)<li class="nav-item"><a class="nav-link" href="{{ url('users') }}"><i class="mdi mdi-account menu-icon"></i><span class="menu-title">Usuarios</span></a></li>@endif
				            @if(Auth::user()->role==1)<li class="nav-item"><a class="nav-link" href="{{ url('entitie') }}"><i class="mdi mdi-briefcase menu-icon"></i><span class="menu-title">Entidades</span></a></li>@endif
				            @if(Auth::user()->role==1)<li class="nav-item"><a class="nav-link" href="{{ url('typeexam') }}"><i class="mdi mdi-briefcase menu-icon"></i><span class="menu-title">Tipo Examen</span></a></li>@endif
				            @if(Auth::user()->role==1)<li class="nav-item"><a class="nav-link" href="{{ url('companie') }}"><i class="mdi mdi-office-building menu-icon"></i><span class="menu-title">Compañia</span></a></li>@endif
				            @if(Auth::user()->role==1)<li class="nav-item"><a class="nav-link" href="{{ url('report') }}"><i class="fa  fa-paste menu-icon"></i><span class="menu-title">Reportes</span></a></li>@endif
				            @if(Auth::user()->role==1 || Auth::user()->role==2 || Auth::user()->role==3)<li class="nav-item"><a class="nav-link" href="{{ url('download') }}"><i class="fa  fa-download menu-icon"></i><span class="menu-title">Descargas</span></a></li>@endif
							
				<li class="nav-item">
	
				
			</ul>
		</nav>
		<div class="container-fluid page-body-wrapper">
                                
                      
                                <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
                                  <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
                                    <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img
                                        src="assets/images/logo-mini.svg" alt="logo" /></a>
                                    <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
                                      <i class="mdi mdi-menu"></i>
                                    </button>
                            
                                    <ul class="navbar-nav navbar-nav-right ml-lg-auto">
                                    
                                      <li class="nav-item nav-profile dropdown border-0">
                                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                                          <img class="nav-profile-img mr-2" alt="" src="assets/images/faces-clipart/pic-1.png" />
                                          <span class="profile-name">{{ Auth::user()->name }}</span>
                                        </a>
                                        <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                                          
                                          <a class="dropdown-item" href="{{ url('/auth/logout') }}">
                                            <i class="mdi mdi-logout mr-2 text-primary"></i> Salir </a>
                                        </div>
                                      </li>
                                    </ul>
                                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                                      data-toggle="offcanvas">
                                      <span class="mdi mdi-menu"></span>
                                    </button>
                                  </div>
                                </nav>
                                <div class="main-panel">
                                  <div class="content-wrapper pb-0">
								  <br>
	            					@yield('content')
                                   
                                  </div>
                                  <footer class="footer">
                                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block" style="font-size:6px;">Copyright © 2020 <a
                                          href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
										  
                                      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hecho a mano y hecho con <i
                                          class="mdi mdi-heart text-danger"></i></span>
                                    </div>
                                  </footer>
                                </div>
                                <!-- main-panel ends -->
                              </div>
                              <!-- page-body-wrapper ends -->

	</div> 

	<!-- Scripts -->

	<script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
	<script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
	<script src="{{ asset('/assets/js/hoverable-collapse.js') }}"></script>
	
	
	<script src="{{ asset('/assets/js/misc.js') }}"></script>
	<script src="{{ asset('/assets/vendors/chart.js/Chart.min.js') }}"></script>
	<script src="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.categories.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.stack.js') }}"></script>
	<script src="{{ asset('/assets/vendors/flot/jquery.flot.pie.js') }}"></script>
	<script src="{{ asset('/assets/vendors/select2/select2.min.js') }}"></script>
	<script src="{{ asset('/assets/js/select2.js')}}"></script>
	<script src="{{ asset('/assets/js/tabs.js')}}"></script>
	<!--<script src="{{ asset('/sb-admin/vendor/jquery/jquery.min.js') }}"></script>
	
	<script src="{{ asset('/sb-admin/vendor/metisMenu/metisMenu.min.js') }}"></script>
	<script src="{{ asset('/sb-admin/dist/js/sb-admin-2.js') }}"></script>


	<script src="{{ asset('/datepicker/bootstrap-datepicker.js')}}"></script>
	
	
	
	-->
	
	
	<script src="{{ asset('/datatables/src/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('/datatables/src/js/dataTables.bootstrap4.min.js')}}"></script>

	<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('/js/ajaxmain.js') }}"></script>
	<script src="{{ asset('/js/jquery.fileDownload.js') }}"></script>
	<script src="{{ asset('/js/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
	<script src="{{ asset('/jquery-validation/form-validator/jquery.form-validator.min.js')}}"></script>

</body>
</html>
