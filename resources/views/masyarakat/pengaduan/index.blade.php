@extends('layout.v_template')
@section('title', 'Pengaduan Masyarakat')
@section('content')

<div class="row">
	<div class="col-xs-12 table-responsive">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data Pengaduan</h3>
				<div class="mt-4">
					@if(Auth::guard('masyarakat')->check())
					<a href="{{ route('masyarakat.pengaduan.create') }}">
						<button class="btn btn-primary mb-3">Laporkan Pengaduhan</button>
					</a>
					@endif
				</div>
				<div class="mt-3">
					@if (session('pesan'))
					<div class="alert alert-success alert_dismissable">
						<button type="button" class="close" data_dismiss="alert" aria-hidden="true">&times;</button>
						<i class="icon fa fa-check">&nbsp;
							{{ session('pesan') }}.</i>
					</div>
					@endif
				</div>
			</div>
			<div class="box-body">
				<table class="table table-bordered" id="example1">
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Nama</th>
							<th>Nik</th>
							<th>Isi Laporan</th>
							<th>Tgl Laporan</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						@foreach ($pengaduan as $p)
						<tr>
							<td>{{ $no++ }}</td>
							<td class="col-xs-1">
								<img src="{{ asset($p->foto)}}" height="125" alt="Foto">
							</td>
							<td>{{ $p->masyarakat->nama }}</td>
							<td>{{ $p->masyarakat->nik }}</td>
							<td class="col-xs-3">{{ $p->isi_laporan }}</td>
							<td>{{ $p->created_at->format('l, d F Y') }}</td>
							<td>{{ $p->status }}</td>
							<td>
								@if (Auth::guard('petugas')->check())
								@if (Auth::guard('petugas')->user()->level == 'Admin' && Auth::guard('petugas')->user()->status == 1)
								<a class="btn btn-primary" href="{{ route('admin.pengaduan.show', $p->id) }}">
									Detail
								</a>
								@elseif(Auth::guard('petugas')->user()->level == 'Petugas' && Auth::guard('petugas')->user()->status == 1)
								<a class="btn btn-primary" href="{{ route('petugas.pengaduan.show', $p->id) }}">
									Detail
								</a>
								@endif
								@else
								<a class="btn btn-primary" href="{{ route('masyarakat.pengaduan.show', $p->id) }}">
									Detail
								</a>
								@endif

								@if(Auth::guard('petugas')->check() && Auth::guard('petugas')->user()->status == 1)
								<hr>
								@if(Auth::guard('petugas')->user()->level == 'Admin')
								<form action="{{ route('admin.pengaduan.destroy', $p->id) }}" method="post" class="float-right">
									@csrf
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-danger">Delete</button>
								</form>
								@elseif(Auth::guard('petugas')->user()->level == 'Petugas')
								<form action="{{ route('petugas.pengaduan.destroy', $p->id) }}" method="post" class="float-right">
									@csrf
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-danger">Delete</button>
								</form>
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
</div>

@endsection