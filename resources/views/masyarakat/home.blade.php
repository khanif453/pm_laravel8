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
				<div class="alert alert-success alert_dismissable">
					<button type="button" class="close" data_dismiss="alert" aria-hidden="true">&times;</button>
					<i class="icon fa fa-check">&nbsp;
						{{ session('pesan') }}.</i>
				</div>
				@endif
				<h4>Welcome Back !!</h4>
			</div>
		</div>
	</div>

</div>
@endsection