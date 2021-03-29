<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Registration Page</title>
	<!-- Tell the ser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{ asset('template') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('template') }}/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{ asset('template') }}/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('template') }}/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{ asset('template') }}/plugins/iCheck/square/blue.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="holds-transition login-page">
	<div class="login-box">
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>
			@if (session('pesan'))
			<div class="alert alert-success alert_dismissable">
				<button type="button" class="close" data_dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-check">&nbsp;
					{{ session('pesan') }}.</i>
			</div>
			@endif
			@if (session('error'))
			<div class="alert alert-danger alert_dismissable">
				<button type="button" class="close" data_dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-ban">&nbsp;
					{{ session('error') }}.</i>
			</div>
			@endif
			<form method="POST" action="{{ route('admin.postregister') }}" autocomplete="off">
				@csrf
				<div class="form-group row">
					<div class="col-md-12">
						<input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap" required autofocus>
						@if ($errors->has('nama'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('nama') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12">
						<input id="telp" type="text" class="form-control" name="telp" value="{{ old('telp') }}" placeholder="No. HP" required>
						@if ($errors->has('telp'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('telp') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12">
						<input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required>
						@if ($errors->has('username'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('username') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12">
						<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
						@if ($errors->has('password'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12">
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmasi Password" required autocomplete="new-password">
					</div>
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-12 offset-md-4">
						<button type="submit" class="btn btn-primary">
							Register
						</button>
					</div>
				</div>
			</form>
			<br>
			<a href="{{ route('login') }}" class="dropdown-item">I already have a membership</a>
		</div>
	</div>
</body>
<!-- jQuery 3 -->
<script src="{{ asset('template') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('template') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{ asset('template') }}/plugins/iCheck/icheck.min.js"></script>
<script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' /* optional */
		});
	});
</script>
</body>

</html>