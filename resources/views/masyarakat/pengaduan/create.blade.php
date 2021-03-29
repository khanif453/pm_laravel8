@extends('layout.v_template')
@section('title', 'Pengaduan Masyarakat')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header text-center">
        <h3 class="box-title">Silahkan Ajukan Pengaduan Anda!</h3>
      </div>
      @if (session('pesan'))
        <div class="alert alert-success alert_dismissable">
          <button type="button" class="close" data_dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Alert!</h4>
          {{ session('pesan') }}.
        </div>
      @endif
      <!-- /.box-header -->
      <div class="box-body">
        <form action="{{ route('masyarakat.pengaduan.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Laporan</label>
              <textarea class="form-control" rows="8" type="text" placeholder="Isi laporan Anda" value="{{ old('isi_laporan')}}" name="isi_laporan"></textarea>
            <div class="text-danger">
              @error('isi_laporan')
                  {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label>
              <span>Foto</span>
              <input type="file" value="{{ old('foto')}}" name="foto">
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
</div>
@endsection
