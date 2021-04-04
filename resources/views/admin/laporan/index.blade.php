@extends('layout.v_template')
@section('title', 'Laporan')
@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Laporan</h3>
        <hr>
        <div class="mt-4">
          <a href="{{ route('admin.laporan.laporanAdmin') }}" target="_blank"
          class="btn btn-danger"><i class="fa fa-download"></i><span> Laporan Admin</span></a> &nbsp;
          <a href="{{ route('admin.laporan.laporanPetugas') }}" target="_blank"
          class="btn btn-primary"><i class="fa fa-download"></i><span> Laporan Petugas</span></a> &nbsp;
          <a href="{{ route('admin.laporan.laporanMasyarakat') }}" target="_blank"
          class="btn btn-primary"><i class="fa fa-download"></i><span> Laporan Masyarakat</span></a> &nbsp;
          <a href="{{ route('admin.laporan.laporanPengaduan') }}" target="_blank"
          class="btn btn-primary"><i class="fa fa-download"></i><span> Laporan Pengaduan</span></a>
        </div>
        <div class="box-body">
        
        </div>
      </div>
    </div>
  </div>
</div>

@endsection