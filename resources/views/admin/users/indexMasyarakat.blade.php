@extends('layout.v_template')
@section('title', 'Masyarakat')
@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Masyarakat</h3>
        <div class="mt-4">
          <a href="{{ route('admin.masyarakat.create') }}" class="btn btn-primary">
            <i class="fa fa-plus-square"></i> Tambah Masyarakat</a>
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
      <br>
      <div class="box-body">
        <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Username</th>
              <th>No. HP</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach ($masyarakat as $m)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $m->nik }}</td>
              <td>{{ $m->nama }}</td>
              <td>{{ $m->username }}</td>
              <td>{{ $m->telp }}</td>
              <td>
                <a href="{{ route('admin.masyarakat.edit', $m->id) }}" class="btn btn-warning">
                  <i class="fa fa-edit"></i> Edit</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $m->id }}">
                  <i class="fa fa-trash"></i> Hapus
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @foreach ($masyarakat as $m)
        <div class="modal modal-danger fade" id="delete{{ $m->id }}">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $m->nama }}</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda Ingin Menghapus Data Ini??</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                <form action="{{ route('admin.masyarakat.destroy', $m->id) }}" method="POST">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-outline">Delete</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection