<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use App\Models\Masyarakat;
use App\Models\Pengaduan;

class HomeController extends Controller
{
    public function index(){
        return view('petugas.home', [
            'petugas' => Petugas::where('level', 'Petugas')->count(),
            'masyarakat' => Masyarakat::count(),
            'pengaduan' => Pengaduan::count(),
        ]);
    }
}
