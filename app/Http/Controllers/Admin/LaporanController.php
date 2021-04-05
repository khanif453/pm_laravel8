<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use App\Models\Masyarakat;
use App\Models\Pengaduan;

class LaporanController extends Controller
{
  public function indexlaporan()
  {
    return view('admin.laporan.index');
  }

  public function printAdmin()
  {
    $admin = Petugas::where('level', 'Admin')->get();
    return view('admin.laporan.laporanAdmin', compact('admin'));
  }

  public function printPetugas()
  {
    $petugas = Petugas::where('level', 'Petugas')->get();
    return view('admin.laporan.laporanPetugas', compact('petugas'));
  }

  public function printMasyarakat()
  {
    $masyarakat = Masyarakat::all();
    return view('admin.laporan.laporanMasyarakat', compact('masyarakat'));
  }
  
  public function printPengaduan()
  {
    $pengaduan = Pengaduan::all();
    return view('admin.laporan.laporanPengaduan', compact('pengaduan'));
  }

}
