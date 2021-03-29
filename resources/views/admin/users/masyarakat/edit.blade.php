@extends('layout.v_template')
@section('title', 'Edit Masyarakat')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit Data</h3>
      </div>
      <form method="POST" action="{{ route('admin.masyarakat.update', $masyarakat->id) }}" autocomplete="off">
        @csrf
        {{ method_field('PUT') }}
        <div class="content">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="nik">{{ __('NIK') }}</label>
                <input id="nik" type="text" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik" value="{{ $masyarakat->nik }}" required autofocus>
                @if ($errors->has('nik'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nik') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="nama">{{ __('Nama Lengkap') }}</label>
                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $masyarakat->nama }}" required autofocus>
                @if ($errors->has('nama'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nama') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="telp">{{ __('Nomor Telepon') }}</label>
                <input id="telp" type="text" class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" value="{{ $masyarakat->telp }}" required autofocus>
                @if ($errors->has('telp'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('telp') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="username">{{ __('Username') }}</label>
                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $masyarakat->username }}" required autofocus disabled>
                @if ($errors->has('username'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                  </span>
                @endif
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
