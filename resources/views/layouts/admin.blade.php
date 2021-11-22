<!doctype html>
<html lang="en">

<head>
	<title>Admin | SMKN 05 KOTA BEKASI</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/font-awesome-pro-master/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/vendor/chartist/css/chartist-custom.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/vendor/toastr/toastr.min.css') }}">
	
	<link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
	
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/user/img/LOGO_4212482110071445.png') }}">
</head>

<body>
	<div id="wrapper">

        {{-- Navbar --}}
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="/admin">
                    {{-- <img src="{{ asset('assets/admin/img/logo-dark.png') }}" alt="Klorofil Logo" class="img-responsive logo"> --}}
                    <h4 class="logo-text">SMKN05</h4>
                </a>
			</div>
			<div class="container-fluid">
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('assets/admin/img/admin.png') }}"
									class="img-circle" alt="Avatar"> <span>{{ Auth::user()->name }}</span> <i
									class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
        
        {{-- Sidebar --}}
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
                            <a href="/admin" class="{{ Request::is('admin') ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
						</li>
						<li>
                            <a href="/admin/goal" class="{{ Request::is('admin/goal') ? 'active' : '' }}"><i class="fal fa-bullseye-arrow"></i> <span>Goal</span></a>
						</li>
						<li>
                            <a href="/admin/pertanyaan" class="{{ Request::is('admin/pertanyaan') ? 'active' : '' }}"><i class="fal fa-question"></i> <span>Pertanyaan</span></a>
						</li>
					</ul>
				</nav>
			</div>
		</div>

        {{-- Main Content --}}
		<div class="main">
            <div class="main-content">
				<div class="container-fluid">
                    @yield('content')
                </div>
            </div>
		</div>

        {{-- Footer --}}
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; {{ date('Y') }} SMKN 05 KOTA BEKASI</p>
			</div>
		</footer>
	</div>

	<script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/admin/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('assets/admin/vendor/chartist/js/chartist.min.js') }}"></script>
	<script src="{{ asset('assets/admin/vendor/toastr/toastr.min.js') }}"></script>
	<script src="{{ asset('assets/admin/scripts/klorofil-common.js') }}"></script>
	<script src="{{ asset('assets/admin/scripts/main.js') }}"></script>
	@yield('scripts')
</body>

</html>