<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
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

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
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
      <form method="POST" action="{{ route('admin.login') }}" autocomplete="off">
        @csrf
        <div class="box-body">
          <div class="form-group has-feedback">
            <h5> Username</h5>
            <input id="username" type="text" class="form-control" name="username" placeholder="Username" required autofocus>
            <div class="text-danger">
							@error('username')
								{{ $message }}
							@enderror
						</div>
          </div>
          <div class="form-group has-feedback">
            <h5>Password</h5>
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
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
              Login
            </button>
          </div>
        </div>
      </form>
      <br>
      <a class="dropdown-item" href="{{ URL('/masyarakat/registerMasyarakatForm') }}">Register as Masyarakat</a>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

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