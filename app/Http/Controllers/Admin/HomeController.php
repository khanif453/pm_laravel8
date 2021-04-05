<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home', [
            'admin' => Petugas::where('level', 'Admin')->count(),
            'petugas' => Petugas::where('level', 'Petugas')->count(),
            'masyarakat' => Masyarakat::count(),
            'pengaduan' => Pengaduan::count(),
        ]);
    }
}
