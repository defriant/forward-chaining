<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | SMKN 05 KOTA BEKASI</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/admin/img/favicon.png') }}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{ asset('assets/user/img/LOGO_4212482110071445.png') }}" class="login-logo"></div>
								<p class="lead">Login Admin</p>
							</div>
							<form class="form-auth-small" method="POST" action="/login-attempt">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="text" name="username" class="form-control" id="signin-email" value="{{ old('username') }}" placeholder="username">
									@if ($message = Session::get('failed'))
										<span class="login-failed-message"><i>Username dan password tidak sesuai </i></span>
									@endif
								</div>
								
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" name="password" class="form-control" id="signin-password" value="{{ old('password') }}" placeholder="Password">
								</div>
								<div class="form-group clearfix">
								</div>
								<button type="submit" class="btn btn-primary btn-block">LOGIN</button>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Sistem Rekomendasi Jurusan</h1>
							<p>by SMKN 05 Kota Bekasi</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
