<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="CRMS - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	@stack('title')
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
	<!--font style-->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600&display=swap" rel="stylesheet">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/theme-settings.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
	<!-- Main CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" class="themecls"> </head>

<body id="skin-color" class="inter">
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<!-- Header -->
		<div class="header" id="heading">
			<!-- Logo -->
			<div class="header-left">
				<a href="{{ url('admin/dashboard') }}" class="logo"> <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="sidebar-logo"> <img src="{{ asset('assets/img/s-logo.png') }}" alt="Logo" class="mini-sidebar-logo"> </a>
			</div>
			<!-- /Logo -->
			<a id="toggle_btn" href="javascript:void(0);"> <span class="bar-icon">
                <span></span> <span></span> <span></span> </span>
			</a><a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
			<!-- Header Menu -->
			<ul class="nav user-menu">
				<li class="nav-item dropdown has-arrow main-drop">
					<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown"> <span class="user-img"><img src="{{ asset('assets/img/profiles/avatar-21.jpg') }}" alt="">
							<span class="status online"></span></span> <span>Admin</span> </a>
					<div class="dropdown-menu"><a class="dropdown-item" href="{{ url('admin/logout') }}">Logout</a> </div>
				</li>
			</ul>
			<!-- /Header Menu -->
			<!-- Mobile Menu -->
			<div class="dropdown mobile-user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="profile.html">My Profile</a><a class="dropdown-item" href="login.html">Logout</a> </div>
			</div>
			<!-- /Mobile Menu -->
		</div>
		<!-- /Header -->