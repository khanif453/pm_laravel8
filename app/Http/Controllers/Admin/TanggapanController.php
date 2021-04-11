<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TanggapanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::with('masyarakat')->latest()->paginate(10);
        return view('masyarakat.pengaduan.index', compact(['pengaduan']));
    }

    public function store(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'tanggapan' => 'required',
            'status' => 'required',
        ]);

        $tanggapan = Tanggapan::create([
            'petugas_id' => Auth::guard('petugas')->user()->id,
            'pengaduan_id' => $pengaduan->id,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $request->tanggapan,
            'status' => $request->status,
        ]);

        $pengaduan->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('pesan', 'Tanggapan telah di tambahkan !');
    }

    // public function destroy($id)
    // {
    //     Tanggapan::destroy($id);
    //     return redirect()->back()->with('status', 'Data telah di hapus !');
    // }

    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('admin.pengaduan.show', compact(['pengaduan']));
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);

        if ($pengaduan) {
            if ($image_path = $pengaduan->foto) {
                unlink($image_path);
            }

            $pengaduan->tanggapan()->delete();
            $pengaduan->delete();
            return redirect()->back()->with('pesan', 'Data telah di hapus');
        }
    }
}
