@extends('layout.v_template')
@section('title', 'Dashboard')
@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Dashboard</h3>
			</div>
			<div class="box-body">
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