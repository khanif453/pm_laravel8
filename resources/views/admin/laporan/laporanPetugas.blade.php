<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Laravel8 - Pengaduan Masyarakat</title>

  <!-- Custom fonts for this template -->
  <link href="{{asset('template')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('template')}}/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('template')}}/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{asset('template')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body onload="window.print();">
  <br>
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Laporan Petugas</h1>
    <p class="h6 mb-2 text-gray-800 text-right">{{ date('l, d F Y') }}</h5>
    <div class="card shadow mb-4">
      <div class="card-header py-3r">
        <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
      </div>

      <!-- Table row -->
      <div class="card-body">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>No. HP</th>
                <th>Level</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach ($petugas as $a)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->username }}</td>
                <td>{{ $a->telp }}</td>
                <td>{{ $a->level }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('template')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template')}}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{asset('template')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('template')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template')}}/js/demo/datatables-demo.js"></script>

</body>

</html>