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
        <div class="box-body">
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input id="nama" type="text" class="form-control" name="nama" value="{{ $admin->nama }}" required autofocus>
            <div class="text-danger">
              @error('nama')
              {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="telp">Nomor Telepon</label>
            <input id="telp" type="number" class="form-control" name="telp" value="{{ $admin->telp }}" required>
            <div class="text-danger">
              @error('telp')
              {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input id="username" type="text" class="form-control" name="username" value="{{ $admin->username }}" required disabled>
          </div>
          <div class="form-group">
            <label for="level">Level</label>
            <select name="level" class="form-control">
              <option disabled>--Please Select--</option>
              <option value="Admin" @if($admin->level == 'Admin') selected @endif>Admin</option>
              <option value="Petugas" @if($admin->level == 'Petugas') selected @endif">Petugas</option>
            </select>
          </div>
          <div class="form-group">
            <div class="col-md-8 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection