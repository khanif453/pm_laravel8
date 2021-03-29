<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan</title>
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
        <th>Nama Masyarakat</th>
        <th>Isi Laporan</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pengaduan as $data)
        <tr>
            <td>
                @if($data->tgl_pengaduan)
                    {{ $data->tgl_pengaduan }}
                @else
                    -
                @endif
            </td>
            <td>
                @if($data->masyarakat->nama)
                    {{ $data->masyarakat->nama }}
                @else
                    -
                @endif
            </td>
            <td>
                @if($data->isi_laporan)
                    {{ $data->isi_laporan }}
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
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>