
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the ser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" 
	name="viewport">
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
    <form method="POST" action="{{ route('masyarakat.postregister') }}" autocomplete="off">
      @csrf
			<div class="box-body">
				<div class="form-group">
					<input id="nik" type="text" class="form-control"
					name="nik" value="{{ old('nik') }}" placeholder="NIK" required autofocus>
					<div class="text-danger">
						@error('nik')
								{{ $message }}
						@enderror
					</div>
				</div>
				<div class="form-group">
					<input id="nama" type="text" class="form-control" 
					name="nama" value="{{ old('nama') }}" placeholder="Nama" required autofocus>
					<div class="text-danger">
						@error('nama')
								{{ $message }}
						@enderror
					</div>
				</div>
				<div class="form-group">
					<input id="telp" type="number" class="form-control" 
					name="telp" value="{{ old('telp') }}" placeholder="No. HP" required autofocus>
					<div class="text-danger">
						@error('telp')
								{{ $message }}
						@enderror
					</div>
				</div>
				<div class="form-group">
					<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" 
					name="username" value="{{ old('username') }}" placeholder="Username" required>
					<div class="text-danger">
						@error('username')
								{{ $message }}
						@enderror
					</div>
				</div>
				<div class="form-group">
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
					name="password" placeholder="Password" required>
					<div class="text-danger">
						@error('password')
								{{ $message }}
						@enderror
					</div>
				</div>
				<div class="form-group">
					<input id="password-confirm" type="password" class="form-control" 
					name="password_confirmation" placeholder="Confirmasi Password" required autocomplete="new-password">
					<div class="text-danger">
						@error('password')
								{{ $message }}
						@enderror
					</div>
				</div>
			</div>
      <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-primary">
            Register
          </button>
        </div>
      </div>
    </form>
		<br>
    <a href="{{ route('login') }}" class="dropdown-item">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="{{ asset('template') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('template') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{ asset('template') }}/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
