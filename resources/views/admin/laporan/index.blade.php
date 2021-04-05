@extends('layout.v_template')
@section('title', 'Laporan')
@section('content')

<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">@yield('title')</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3r">
      <h6 class="m-0 font-weight-bold text-primary">Data @yield('title')</h6>
    </div>
    <div class="card-body">
      <div class="mt-4">
        <a href="{{ route('admin.laporan.laporanAdmin') }}" target="_blank" class="btn btn-primary"><i class="fa fa-download"></i><span> Laporan Admin</span></a> &nbsp;
        <a href="{{ route('admin.laporan.laporanPetugas') }}" target="_blank" class="btn btn-primary"><i class="fa fa-download"></i><span> Laporan Petugas</span></a> &nbsp;
        <a href="{{ route('admin.laporan.laporanMasyarakat') }}" target="_blank" class="btn btn-primary"><i class="fa fa-download"></i><span> Laporan Masyarakat</span></a> &nbsp;
        <a href="{{ route('admin.laporan.laporanPengaduan') }}" target="_blank" class="btn btn-primary"><i class="fa fa-download"></i><span> Laporan Pengaduan</span></a>
      </div>
    </div>
  </div>
</div>

@endsection