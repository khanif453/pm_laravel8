@extends('layout.v_template')
@section('title', 'Pengaduan Masyarakat')
@section('content')

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Data Pengaduan</h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3r">
			<h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
		</div>
		<div class="card-header">
			<div>
				@if(Auth::guard('masyarakat')->check())
				<a href="{{ route('masyarakat.pengaduan.create') }}" class="btn btn-primary">
					<i class="fa fa-plus-square"></i> Laporkan Pengaduan
				</a>
				@endif
			</div>
			<div class="mt-3">
				@if (session('pesan'))
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<i class="icon fa fa-check">&nbsp;
						{{ session('pesan') }}.</i>
				</div>
				@endif
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="10">No</th>
						<th width="20">Nik</th>
						<th width="120">Nama</th>
						<th width="290">Isi Laporan</th>
						<th width="130">Tgl Laporan</th>
						<th>Status</th>
						<th width="165">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					@foreach ($pengaduan as $p)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $p->masyarakat->nik }}</td>
						<td>{{ $p->masyarakat->nama }}</td>
						<td>{{ $p->isi_laporan }}</td>
						<td>{{ $p->created_at->format('l, d F Y') }}</td>
						<td>
							@if($p->status == 'selesai')
							<span class="badge badge-success text-uppercase">
								{{ $p->status }}
							</span>
							@endif
							@if($p->status == 'proses')
							<span class="badge badge-warning text-uppercase">
								{{ $p->status }}
							</span>
							@endif
						</td>
						<td>
							@if (Auth::guard('petugas')->check())
							@if (Auth::guard('petugas')->user()->level == 'Admin' && Auth::guard('petugas')->user()->status == 1)
							<a class="btn btn-primary btn-sm" href="{{ route('admin.pengaduan.show', $p->id) }}">
								<i class="fa fa-eye"></i> Detail
							</a>
							@elseif(Auth::guard('petugas')->user()->level == 'Petugas' && Auth::guard('petugas')->user()->status == 1)
							<a class="btn btn-primary btn-sm" href="{{ route('petugas.pengaduan.show', $p->id) }}">
								<i class="fa fa-eye"></i> Detail
							</a>
							@endif
							@else
							<a class="btn btn-primary btn-sm" href="{{ route('masyarakat.pengaduan.show', $p->id) }}">
								<i class="fa fa-eye"></i> Detail
							</a>
							@endif
							@if(Auth::guard('petugas')->check() && Auth::guard('petugas')->user()->status == 1)
							<!-- <hr> -->
							@if(Auth::guard('petugas')->user()->level == 'Admin')
							<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $p->id }}">
								<i class="fa fa-trash-alt"></i> Hapus
							</button>
							@elseif(Auth::guard('petugas')->user()->level == 'Petugas')
							<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $p->id }}">
								<i class="fa fa-trash-alt"></i> Hapus
							</button>
							@endif
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@foreach ($pengaduan as $p)
<div class="modal fade" id="delete{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="h6 modal-title" id="exampleModalLabel">{{ $p->masyarakat->nama }}</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				Apakah Anda Ingin Menghapus Data Ini ??
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				@if(Auth::guard('petugas')->user()->level == 'Admin')
				<form action="{{ route('admin.pengaduan.destroy', $p->id) }}" method="POST">
					@csrf
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger btn-outline">Delete</button>
				</form>
				@elseif(Auth::guard('petugas')->user()->level == 'Petugas')
				<form action="{{ route('petugas.pengaduan.destroy', $p->id) }}" method="POST">
					@csrf
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger btn-outline">Delete</button>
				</form>
				@endif
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection