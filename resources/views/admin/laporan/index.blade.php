@extends('layout.v_template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">Laporan Users</div>
                <div class="card-body">
                    <div class="dropdown mr-2 mb-2 d-inline-block">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export All Users
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('admin.laporan.users.excel') }}">Export as Excel</a>
                            <a class="dropdown-item" href="{{ route('admin.laporan.users.pdf') }}">Export as PDF</a>
                        </div>
                    </div>

                    <div class="dropdown mr-2 mb-2 d-inline-block">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export Admin
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('admin.laporan.users.admin.excel') }}">Export as Excel</a>
                            <a class="dropdown-item" href="{{ route('admin.laporan.users.admin.pdf') }}">Export as PDF</a>
                        </div>
                    </div>

                    <div class="dropdown mr-2 mb-2 d-inline-block">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export Petugas
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('admin.laporan.users.petugas.excel') }}">Export as Excel</a>
                            <a class="dropdown-item" href="{{ route('admin.laporan.users.petugas.pdf') }}">Export as PDF</a>
                        </div>
                    </div>

                    <div class="dropdown mr-2 mb-2 d-inline-block">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export Masyarakat
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('admin.laporan.users.masyarakat.excel') }}">Export as Excel</a>
                            <a class="dropdown-item" href="{{ route('admin.laporan.users.masyarakat.pdf') }}">Export as PDF</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Laporan Pengaduan dan Tanggapan</div>
                <div class="card-body">
                    <div class="dropdown mr-2 mb-2 d-inline-block">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export Pengaduan
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('admin.laporan.pengaduan.excel') }}">Export as Excel</a>
                            <a class="dropdown-item" href="{{ route('admin.laporan.pengaduan.pdf') }}">Export as PDF</a>
                        </div>
                    </div>

                    <div class="dropdown mr-2 mb-2 d-inline-block">
                        <button class="btn btn-info text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export Tanggapan
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('admin.laporan.tanggapan.excel') }}">Export as Excel</a>
                            <a class="dropdown-item" href="{{ route('admin.laporan.tanggapan.pdf') }}">Export as PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
