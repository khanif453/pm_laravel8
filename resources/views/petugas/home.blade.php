@extends('layout.v_template')
@section('title', 'Dashboard')
@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">@yield('title')</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				@if (session('pesan'))
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<i class="icon fa fa-check">&nbsp;
						{{ session('pesan') }}.</i>
				</div>
				@endif
			</div>
			<div class="row">
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
										<a href="{{ route('admin.users.indexPetugas') }}" class="text-success"> Jumlah Petugas</a>
									</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $petugas }}</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user-friends fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
										<a href="{{ route('admin.users.indexMasyarakat') }}" class="text-info"> Jumlah Masyarakat</a>
									</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $masyarakat }}</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
										<a href="{{ route('admin.pengaduan.index') }}" class="text-warning"> Jumlah Pengaduan</a>
									</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengaduan }}</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file-alt fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection