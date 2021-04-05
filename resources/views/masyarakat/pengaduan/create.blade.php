@extends('layout.v_template')
@section('title', 'Pengaduan Masyarakat')
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Pengaduan</h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3r">
      <h6 class="m-0 font-weight-bold text-primary">Membuat Laporan</h6>
    </div>
    <div class="card-body">
      <div class="text-center">
        <h3 class="h3 mb-2 text-gray-800">Silahkan Ajukan Pengaduan Anda!</h3>
      </div>
      <br>
      <form action="{{ route('masyarakat.pengaduan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Laporan</label>
          <textarea class="form-control" rows="8" type="text" placeholder="Isi laporan Anda ..." value="{{ old('isi_laporan')}}" name="isi_laporan" autofocus required></textarea>
          <div class="text-danger">
            @error('isi_laporan')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label>
            <span>Foto</span>
            <input type="file" value="{{ old('foto')}}" name="foto" alt="foto" required>
          </label>
          <div class="text-danger">
            @error('foto')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">
            Laporkan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection