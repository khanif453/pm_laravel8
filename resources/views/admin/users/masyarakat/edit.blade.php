@extends('layout.v_template')
@section('title', 'Edit Masyarakat')
@section('content')

<div class="container-fluid">
  <h3 class="box-title">Edit</h3>

  <div class="card shadow mb-4">
    <div class="card-header py-3r">
      <h6 class="m-0 font-weight-bold text-primary">Edit Data</h5>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('admin.masyarakat.update', $masyarakat->id) }}" autocomplete="off">
        @csrf
        {{ method_field('PUT') }}
        <div class="box-body">
          <div class="form-group">
            <label for="nik">NIK</label>
            <input id="nik" type="number" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik" value="{{ $masyarakat->nik }}" required autofocus>
            <div class="text-danger">
              @error('nik')
              {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $masyarakat->nama }}" required>
            <div class="text-danger">
              @error('nama')
              {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="telp">Telepon</label>
            <input id="telp" type="number" class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" value="{{ $masyarakat->telp }}" required>
            <div class="text-danger">
              @error('telp')
              {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $masyarakat->username }}" required disabled>
            <div class="text-danger">
              @error('username')
              {{ $message }}
              @enderror
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">
            Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection