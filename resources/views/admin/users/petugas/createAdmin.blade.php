@extends('layout.v_template')
@section('title', 'Tambah Data')
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Admin</h3>
			</div>
			<div class="box-body">
				<form method="POST" action="{{ route('admin.petugas.store') }}" autocomplete="off">
					@csrf
					<label for="nama" class="block">Nama Lengkap</label>
					<input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>
					<div class="text-danger">
						@error('nama')
						{{ $message }}
						@enderror
					</div>
					<br>
					<label for="username" class="block">Username</label>
					<input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
					<div class="text-danger">
						@error('username')
						{{ $message }}
						@enderror
					</div>
					<br>
					<label for="telp" class="block">No. HP</label>
					<input id="telp" type="number" class="form-control" name="telp" value="{{ old('telp') }}" required>
					<div class="text-danger">
						@error('telp')
						{{ $message }}
						@enderror
					</div>
					<br>
					<label for="password" class="block">Password</label>
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
					<div class="text-danger">
						@error('password')
						{{ $message }}
						@enderror
					</div>
					<br>
					<label for="password-confirm" class="block">Confirm Password</label>
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
					<div class="text-danger">
						@error('password')
						{{ $message }}
						@enderror
					</div>
					<br>
					<a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
					<button type="submit" class="btn btn-primary">
						Tambah
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection