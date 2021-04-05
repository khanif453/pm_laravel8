<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Petugas;

class UsersController extends Controller
{
    public function index()
    {
        $admin = Petugas::where('level', 'Admin')->get();
        return view('admin.users.indexAdmin', compact(['admin']));
    }

    public function indexPetugas()
    {
        $petugas = Petugas::where('level', 'Petugas')->get();

        return view('admin.users.indexPetugas', compact(['petugas']));
    }

    public function indexMasyarakat()
    {
        $masyarakat = Masyarakat::all();

        return view('admin.users.indexMasyarakat', compact(['masyarakat']));
    }
}
