<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

	<meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">

	<meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">

	<meta name="author" content="Sabya Roy">

	<title>@yield('title') - BD Quotes</title>

	<link rel="apple-touch-icon" href="{{ asset('back/images/ico/apple-icon-120.png') }}">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('back/images/ico/favicon.ico') }}">

	<link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
	<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">

	<!-- BEGIN VENDOR CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('back/css/vendors.css') }}">
	<!-- END VENDOR CSS-->
	@yield('css')

	<!-- BEGIN CHAMELEON  CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('back/css/app-lite.css') }}">
	<!-- END CHAMELEON  CSS-->


	<!-- BEGIN Page Level CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('back/css/core/colors/palette-gradient.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('back/css/core/menu/menu-types/vertical-menu.css') }}">
	<!-- END Page Level CSS-->


	

	<!-- BEGIN Custom CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('back/css/custom.css') }}">
	<!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

	<!-- fixed-top-->
	<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
		<div class="navbar-wrapper">
			<div class="navbar-container content">
				<div class="collapse navbar-collapse show" id="navbar-mobile">
					<ul class="nav navbar-nav mr-auto float-left">
						<li class="nav-item d-block d-md-none">
							<a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a>
						</li>
						<li class="nav-item d-none d-md-block">
							<a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a>
						</li>
						<li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
							<ul class="dropdown-menu">
								<li class="arrow_box">
									<form>
										<div class="input-group search-box">
											<div class="position-relative has-icon-right full-width">
												<input class="form-control" id="search" type="text" placeholder="Search here...">
												<div class="form-control-position navbar-search-close"><i class="ft-x">   </i></div>
											</div>
										</div>
									</form>
								</li>
							</ul>
						</li>
					</ul>
					
					<ul class="nav navbar-nav float-right">
						<li class="dropdown dropdown-user nav-item">
							<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
								<span class="avatar avatar-online">
									<img src="{{ url('back/images/portrait/small/avatar-s-19.png') }}" alt="avatar"><i></i>
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="arrow_box_right">
									<a class="dropdown-item" href="#">
										<span class="avatar avatar-online">
											<img src="{{ url('back/images/portrait/small/avatar-s-19.png') }}" alt="avatar">
											<span class="user-name text-bold-700 ml-1">John Doe</span>
										</span>
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">
										<i class="ft-user"></i> Edit Profile
									</a>
									
									<div class="dropdown-divider"></div>
									
									<a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
									document.getElementById('admin-logout-form').submit();">
									<i class="ft-power"></i> Logout
								</a>

								<form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
									@csrf
								</form>

							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>

<!-- ////////////////////////////////////////////////////////////////////////////-->


<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">       
			<li class="nav-item mr-auto">
				<a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="{{ url('back/images/logo/logo.png') }}"/>
					<h3 class="brand-text">Chameleon</h3>
				</a>
			</li>
			<li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
		</ul>
	</div>
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
				<a href="{{ route('admin.dashboard') }}"><i class="ft-home"></i><span class="menu-title">Dashboard</span></a>
			</li>

			<li class="{{ Route::is('admin.category.index') ? 'active' : '' }}">
				<a href="{{ route('admin.category.index') }}"><i class="ft-home"></i><span class="menu-title">Category</span></a>
			</li>

			<li class="{{ Route::is('admin.author.index') ? 'active' : '' }}">
				<a href="{{ route('admin.author.index') }}"><i class="ft-home"></i><span class="menu-title">Author</span></a>
			</li>

			<li class="{{ Route::is('admin.quote.index') ? 'active' : '' }}">
				<a href="{{ route('admin.quote.index') }}"><i class="ft-home"></i><span class="menu-title">Quote</span></a>
			</li>

		</ul>
	</div>
	<div class="navigation-background"></div>
</div>

<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-wrapper-before"></div>
		<div class="content-header row">
			<div class="content-header-left col-md-4 col-12 mb-2">
				<h3 class="content-header-title">@yield('title')</h3>
			</div>
			<div class="content-header-right col-md-8 col-12">
				<div class="breadcrumbs-top float-md-right">
					<div class="breadcrumb-wrapper mr-1">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
							</li>
							<li class="breadcrumb-item active">@yield('title')
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		@yield('content')
	</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-static footer-light navbar-border navbar-shadow">
	<div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2018  &copy; Copyright <a class="text-bold-800 grey darken-2" href="https://themeselection.com" target="_blank">ThemeSelection</a></span>
		<ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
			<li class="list-inline-item"><a class="my-1" href="https://themeselection.com/" target="_blank"> More themes</a></li>
			<li class="list-inline-item"><a class="my-1" href="https://themeselection.com/support" target="_blank"> Support</a></li>
			<li class="list-inline-item"><a class="my-1" href="https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/" target="_blank"> Purchase</a></li>
		</ul>
	</div>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('back/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->

<!-- BEGIN CHAMELEON  JS-->
<script src="{{ asset('back/js/core/app-menu-lite.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/js/core/app-lite.js') }}" type="text/javascript"></script>
<!-- END CHAMELEON  JS-->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@yield('script')





</body>
</html>