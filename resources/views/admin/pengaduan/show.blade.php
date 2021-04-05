@extends('layout.v_template')
@section('title', 'Pengaduan')
@section('content')

<div class="container-fluid">
  <h3 class="box-title">Data @yield('title')</h3>

  <div class="card shadow mb-4">
    <div class="card-header py-3r">
      <h6 class="m-0 font-weight-bold text-primary">Detail @yield('title')</h6>
      <div class="">
        <div>
          @if (session('pesan'))
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check">&nbsp;
              {{ session('pesan') }}.</i>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Foto</th>
              <th width="500">Isi Laporan</th>
              <th width="500">Tanggapan Petugas</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img src="{{ asset($pengaduan->foto) }}" width="190" alt="Foto">
              </td>
              <td>{{ $pengaduan->isi_laporan }}</td>
              @foreach ($pengaduan->tanggapan as $response)
              <td>{{ $response->tanggapan }}</td>
              @endforeach
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>NIK</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $pengaduan->masyarakat->nik }}</td>
              <td>{{ $pengaduan->masyarakat->nama }}</td>
              <td>{{ $pengaduan->created_at->format('l, d F Y') }}</td>
              <!-- <td><span class="badge badge-success text-uppercase">{{ $pengaduan->status }}</span></td> -->
              <td>
                @if($pengaduan->status == 'selesai')
                <span class="badge badge-success text-uppercase">
                  {{ $pengaduan->status }}
                </span>
                @endif
                @if($pengaduan->status == 'proses')
                <span class="badge badge-warning text-uppercase">
                  {{ $pengaduan->status }}
                </span>
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <br>
    <hr>
    <br>
    @if(Auth::guard('petugas')->check() && Auth::guard('petugas')->user()->status == 1)
    <h3 class="text-center">Berikan Tanggapan</h3>
    <div class="card-body">
      <form method="POST" action="{{ route('admin.pengaduan.tanggapan.store', $pengaduan->id) }}" enctype="multipart/form-data">
        @csrf
        <label for="tanggapan">
          Tanggapan
        </label>
        <textarea rows="5" id="tanggapan" name="tanggapan" class="form-control" placeholder="Berikan tanggapan anda ..." required>{{ old('tanggapan') }}</textarea>
        <br>
        <label for="status">
          Status
        </label>
        <select name="status" id="status" class="form-control" required>
          <option value="">Please Select</option>
          <option value="proses">
            Proses
          </option>
          <option value="selesai">
            Selesai
          </option>
        </select>
        <br>
        <div class="small">
          <button type="submit" class="btn btn-primary">
            Submit
          </button>
        </div>
      </form>
    </div>
    @endif
  </div>
</div>
@endsection