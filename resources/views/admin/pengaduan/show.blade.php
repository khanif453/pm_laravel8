@extends('layout.v_template')
@section('title', 'Pengaduan')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Detail pengaduan</h3>
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
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Foto</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Isi Laporan</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Tanggapan</th>
            </tr>
          </thead>
          <tbody>
            <td class="col-xs-1">
              <img src="{{ asset($pengaduan->foto) }}" height="125" alt="Foto">
            </td>
            <td>{{ $pengaduan->masyarakat->nik }}</td>
            <td>{{ $pengaduan->masyarakat->nama }}</td>
            <td class="col-xs-3">{{ $pengaduan->isi_laporan }}</td>
            <td>{{ $pengaduan->created_at->format('l, d F Y') }}</td>
            <td>{{ $pengaduan->status }}</td>
            @foreach ($pengaduan->tanggapan as $response)
            <td>{{ $response->tanggapan }}</td>
            @endforeach
          </tbody>
        </table>
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
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
              <option value="">Please Select</option>
              <option value="proses">
                Proses
              </option>
              <option value="selesai">
                Selesai
              </option>
            </select>
            <br>
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Submit
                </button>
              </div>
            </div>
          </form>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection