<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Laporan Admin Users</title>
    </head>
    <body>
        <h1 class="text-center mb-3 h2">LAPORAN ADMIN USERS</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Nomor Telepon</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($petugas as $data)
                    <tr>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            @if($data->nama)
                                {{ $data->nama }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">
                            @if($data->username)
                                {{ $data->username }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">
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
                        <td class="text-center">
                            @if($data->telp)
                                {{ $data->telp }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">
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
            </tbody>
        </table>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>