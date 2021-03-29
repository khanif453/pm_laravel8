<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Users</title>
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
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($petugas as $data)
        <tr>
            <td>-</td>
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
            <td>
                @if($data->level)
                    @if ($data->level == 'Admin')
                        {{ __('Admin') }}
                    @else
                        {{ __('Petugas') }}
                    @endif
                @else
                    -
                @endif
            </td>
            <td>
                @if($data->telp)
                    {{ $data->telp }}
                @else
                    -
                @endif
            </td>
            <td>
                @if($data->status)
                    @if ($data->status == 1)
                        {{ __('Active') }}
                    @endif
                @else
                {{ __('Not Active') }}
                @endif
            </td>
        </tr>
    @endforeach

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
            <td>Active</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>