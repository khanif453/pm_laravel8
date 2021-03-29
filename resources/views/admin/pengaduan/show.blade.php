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
							<th>NIK</th>
              <th>Nama</th>
							<th>Isi Laporan</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Foto</th>
							<th>Tanggapan</th>
            </tr>
          </thead>
          <tbody>
							<td>{{ $pengaduan->masyarakat->nik }}</td>
              <td>{{ $pengaduan->masyarakat->nama }}</td>
							<td>{{ $pengaduan->isi_laporan }}</td>
              <td>{{ $pengaduan->created_at->format('l, d F Y') }}</td>
              <td>{{ $pengaduan->status }}</td>
							<td>
								<img src="{{ asset($pengaduan->foto) }}" height="150" alt="Foto">
							</td>
							@foreach ($pengaduan->tanggapan as $response)
								<td>{{ $response->tanggapan }}</td>	
							@endforeach
          </tbody>
        </table>

				@if(Auth::guard('petugas')->check() && Auth::guard('petugas')->user()->status == 1)
          <h3 class="text-center">Berikan Tanggapan</h3>
          <div class="card-body">
            <form method="POST" action="{{ route('admin.pengaduan.tanggapan.store', $pengaduan->id) }}" enctype="multipart/form-data">
              @csrf
              <label for="tanggapan" class="col-md-4 col-form-label text-md-right">
                  {{ __('Tanggapan') }}
              </label>
              <textarea id="tanggapan" name="tanggapan" class="form-control @error('tanggapan') is-invalid @enderror" required rows="5">{{ old('tanggapan') }}</textarea>
              @error('tanggapan')
                <span class="invalid-tanggapan" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              <label for="status" class="col-md-4 col-form-label text-md-right">
                {{ __('Status') }}
              </label>
              <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="">Please Select</option>
                <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>
                	Proses
                </option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>
                	Selesai
                </option>
                <option val ue="spam" {{ old('status') == 'spam' ? 'selected' : '' }}>
                	Spam
                </option>
              </select>
              @error('status')
              	<span class="invalid-pengaduan" role="alert">
              	<strong>{{ $message }}</strong>
              	</span>
              @enderror
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