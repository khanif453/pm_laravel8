<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tanggapan</title>
    <style>
    *{
        text-align: left; 
    }
    </style>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>Tanggal Pengaduan</th>
            <th>Isi Laporan</th>
            <th>Tanggal Tanggapan</th>
            <th>Nama Petugas</th>
            <th>Tanggapan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tanggapan as $data)
            <tr>
                <td>
                    @if($data->pengaduan->tgl_pengaduan)
                        {{ $data->pengaduan->tgl_pengaduan }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if($data->pengaduan->isi_laporan)
                        {{ $data->pengaduan->isi_laporan }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if($data->tgl_tanggapan)
                        {{ $data->tgl_tanggapan }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if($data->petugas->nama)
                        {{ $data->petugas->nama }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if($data->tanggapan)
                        {{ $data->tanggapan }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if($data->status)
                        @if ($data->status == 'selesai')
                            {{ __('Selesai') }}
                        @elseif ($data->status == 'proses')
                            {{ __('Proses') }}
                        @else
                            {{ __('Spam') }}
                        @endif
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>