@extends('layout.v_template')
@section('title', 'Petugas')
@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Petugas</h3>
        <div class="mt-4">
          <a href="{{ route('admin.petugas.createPetugas') }}"
            class="btn btn-primary">Tambah Petugas</a>
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
              <th>Nama</th>
              <th>Username</th>
              <th>No. HP</th>
              <th>Level</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
            @foreach ($petugas as $p)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $p->nama }}</td>    
                <td>{{ $p->username }}</td>    
                <td>{{ $p->telp }}</td>    
                <td>{{ $p->level }}</td>    
                <td>
                  <a href="{{ route('admin.petugas.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $p->id }}">
                    Hapus
                  </button>
                </td>    
              </tr>                        
            @endforeach
          </tbody>
        </table>
      </div>
      @foreach ($petugas as $p)
        <div class="modal modal-danger fade" id="delete{{ $p->id }}">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $p->nama }}</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda Ingin Menghapus Data Ini??</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                <form action="{{ route('admin.petugas.destroy', $p->id) }}" method="POST">
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
@endsection
