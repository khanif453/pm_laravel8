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
        $pengaduhan = Pengaduan::with('masyarakat')->latest()->paginate(10);
        return view('masyarakat.pengaduhan.index', compact(['pengaduhan']));
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

    public function destroy($id)
    {
        Tanggapan::destroy($id);
        return redirect()->back()->with('status', 'Data telah di hapus !');
    }
}
