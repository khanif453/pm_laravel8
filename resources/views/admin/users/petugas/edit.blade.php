@extends('layout.v_template')
@section('title', 'Edit Petugas')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit Data</h3>
      </div>
      <form method="POST" action="{{ route('admin.petugas.update', $admin->id) }}" autocomplete="off">
        @csrf
        {{ method_field('PUT') }}
        <div class="content">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                        <label for="nama">{{ __('Nama Lengkap') }}</label>
                        <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $admin->nama }}" required autofocus>
                        @if ($errors->has('nama'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nama') }}</strong>
                          </span>
                        @endif
              </div>
              <div class="form-group">
                        <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>
                        <input id="telp" type="text" class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" value="{{ $admin->telp }}" required autofocus>
                        @if ($errors->has('telp'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('telp') }}</strong>
                          </span>
                        @endif
              </div>
              <div class="form-group">
                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $admin->username }}" required autofocus disabled>
                        @if ($errors->has('username'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                          </span>
                        @endif
              </div>
              <div class="form-group">
                        <label for="level" class="col-md-4 col-form-label text-md-right">Level</label>
                        <select name="level" class="form-control @error('level') is-invalid @enderror">
                          <option disabled>--Please Select--</option>
                          <option value="Admin" @if($admin->level == 'Admin') selected @endif>Admin</option>
                          <option value="Petugas" @if($admin->level == 'Petugas') selected @endif">Petugas</option>
                        </select> 
                        @error('level')
                        	<span class="invalid-feedback" role="alert">
                       	  	<strong>{{ $message }}</strong>
                        	</span>
                        @enderror
              </div>
              <div class="form-group">
                        <div class="col-md-8 offset-md-4">
													<button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                          </button>
                        </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
