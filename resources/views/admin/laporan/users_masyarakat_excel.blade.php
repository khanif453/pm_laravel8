<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Masyarakat Users</title>
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
        <th>NIK</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Level</th>
        <th>Nomor Telepon</th>
    </tr>
    </thead>
    <tbody>
    @foreach($masyarakat as $data)
        <tr>
            <td>
                @if($data->nik)
                    {{ $data->nik }}
                @else
                    -
                @endif
            </td>
            <td>
                @if($data->nama)
                    {{ $data->nama }}
                @else
                    -
                @endif
            </td>
            <td>
                @if($data->username)
                    {{ $data->username }}
                @else
                    -
                @endif
            </td>
            <td>Masyarakat</td>
            <td>
                @if($data->telp)
                    {{ $data->telp }}
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