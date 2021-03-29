<?php

namespace App\Http\Controllers\Admin;

// use Auth;
use Excel;
use PDF;
use App\Models\Petugas;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\UsersExport;
use App\Exports\UsersAdminExport;
use App\Exports\UsersPetugasExport;
use App\Exports\UsersMasyarakatExport;
use App\Exports\PengaduanExport;
use App\Exports\TanggapanExport;

class LaporanController extends Controller
{
    public function index() {
        return view('admin.laporan.index');
    }

    public function usersExcel() {
        return Excel::download(new UsersExport, 'laporan_users_'.date('Y-m-d_H-i-s').'.xlsx');
    }

    public function usersAdminExcel() {
        return Excel::download(new UsersAdminExport, 'laporan_users_admin_'.date('Y-m-d_H-i-s').'.xlsx');
    }

    public function usersPetugasExcel() {
        return Excel::download(new UsersPetugasExport, 'laporan_users_petugas_'.date('Y-m-d_H-i-s').'.xlsx');
    }

    public function usersMasyarakatExcel() {
        return Excel::download(new UsersMasyarakatExport, 'laporan_users_masyarakat_'.date('Y-m-d_H-i-s').'.xlsx');
    }

    public function pengaduanExcel() {
        return Excel::download(new PengaduanExport, 'laporan_pengaduan_'.date('Y-m-d_H-i-s').'.xlsx');
    }

    public function tanggapanExcel() {
        return Excel::download(new TanggapanExport, 'laporan_tanggapan_'.date('Y-m-d_H-i-s').'.xlsx');
    }

    public function usersPDF(){
        $petugas = Petugas::all();
        $masyarakat = Masyarakat::all();
        $pdf = PDF::loadView('admin.laporan.users_pdf', compact('petugas', 'masyarakat'));
        return $pdf->download('laporan_users_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function usersAdminPDF(){
        $petugas = Petugas::all()->where('level', 'Admin');
        $pdf = PDF::loadView('admin.laporan.users_admin_pdf', compact('petugas'));
        return $pdf->download('laporan_users_admin_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function usersPetugasPDF(){
        $petugas = Petugas::all()->where('level', 'Petugas');
        $pdf = PDF::loadView('admin.laporan.users_petugas_pdf', compact('petugas'));
        return $pdf->download('laporan_users_petugas_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function usersMasyarakatPDF(){
        $masyarakat = Masyarakat::all();
        $pdf = PDF::loadView('admin.laporan.users_masyarakat_pdf', compact('masyarakat'));
        return $pdf->download('laporan_users_masyarakat_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function pengaduanPDF() {
        $pengaduan = Pengaduan::all();
        $pdf = PDF::loadView('admin.laporan.pengaduan_pdf', compact('pengaduan'));
        return $pdf->download('laporan_pengaduan_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function tanggapanPDF() {
        $tanggapan = Tanggapan::all();
        $pdf = PDF::loadView('admin.laporan.tanggapan_pdf', compact('tanggapan'));
        return $pdf->download('laporan_tanggapan_'.date('Y-m-d_H-i-s').'.pdf');
    }
}
