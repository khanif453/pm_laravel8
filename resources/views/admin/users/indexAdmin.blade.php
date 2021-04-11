@extends('layout.v_template')
@section('title', 'Admin')
@section('content')

<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">@yield('title')</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3r">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
    </div>
    <div class="card-header">
      <div>
        <a href="{{ route('admin.petugas.create') }}" class="btn btn-primary">
          <i class="fa fa-plus-square"></i> Tambah Admin
        </a>
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
      <div class="mt-3">
        @if (session('error'))
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fa fa-ban">&nbsp;
            {{ session('error') }}.</i>
        </div>
        @endif
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Telepon</th>
              <th>Level</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach ($admin as $a)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $a->nama }}</td>
              <td>{{ $a->username }}</td>
              <td>{{ $a->telp }}</td>
              <td>{{ $a->level }}</td>
              <td>
                <a href="{{ route('admin.petugas.edit', $a->id) }}" class="btn btn-warning">
                  <i class="fa fa-edit"></i> Edit
                </a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $a->id }}">
                  <i class="fa fa-trash-alt"></i> Hapus
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @foreach ($admin as $a)
    <div class="modal fade" id="delete{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $a->nama }}</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda Ingin Menghapus Data Ini ??
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form action="{{ route('admin.petugas.destroy', $a->id) }}" method="POST">
              @csrf
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger btn-outline">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection