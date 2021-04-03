<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
  public function create()
  {
    return view('admin.users.petugas.createAdmin');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama'       => 'required|string',
      'telp'       => 'required|string|min:10|max:13',
      'username'   => 'required|string|unique:petugas|min:5',
      'password'   => 'required|string|min:8|confirmed',
    ], [
      'nama.required' => 'Nama harus di isi',
      'telp.required' => 'Telepon harus di isi',
      'telp.min' => 'Telepon min 10',
      'telp.max' => 'Telepon max 13',
      'username.required' => 'Username harus di isi',
      'username.unique' => 'Username sudah ada',
      'username.min' => 'Usernaem min 5',
      'password.required' => 'Password harus di isi',
      'password.min' => 'Password min 8',
      'password.confirmed' => 'Password tidak cocok'
    ]);

    $petugas = $request->all();

    Petugas::create([
      'nama' => $request->nama,
      'username' => $request->username,
      'password' => Hash::make($request->password),
      'telp' => $request->telp,
      'level' => 'Admin',
      'status' => '1'
    ]);

    return redirect()->route('admin.users.index')->with('pesan', 'Admin baru telah di tambahkan !');
  }

  public function edit($id)
  {
    $admin = Petugas::find($id);
    return view('admin.users.petugas.edit', compact(['admin']));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'nama' => 'required',
      'telp' => 'required|min:10|max:13',
      'level' => 'required'
    ],[
      'telp.min' => 'No. HP min 10',
      'telp.max' => 'No. HP max 13'
    ]);

    $admin = Petugas::find($id);
    $admin->update([
      'nama' => $request->nama,
      'telp' => $request->telp,
      'level' => $request->level
    ]);

    if ($admin->level == 'Admin') {
      return redirect()->route('admin.users.index')->with('pesan', 'Data berhasil di update !');
    }

    return redirect()->route('admin.users.indexPetugas')->with('pesan', 'Data berhasil di update !');
  }

  public function destroy($id)
  {
    if (Auth::guard('petugas')->user()->id == $id) {
      return redirect()->route('admin.users.index')->with('error', 'You are not allowed to delete yourself.');
    }

    $user = Petugas::find($id);

    if ($user->level == 'Admin') {
      Petugas::destroy($id);
      return redirect()->route('admin.users.index')->with('pesan', 'Data berhasil di hapus !');
    }

    Petugas::destroy($id);
    return redirect()->route('admin.users.indexPetugas')->with('pesan', 'Data berhasil di hapus !');
  }

  public function createPetugas()
  {
    return view('admin.users.petugas.createPetugas');
  }

  public function storePetugas(Request $request)
  {
    $request->validate([
      'nama'       => 'required|string',
      'telp'       => 'required|string|min:10|max:13',
      'username'   => 'required|string|unique:petugas|min:5',
      'password'   => 'required|string|min:8|confirmed',
    ], [
      'nama.required' => 'Nama harus di isi',
      'telp.required' => 'Telepon harus di isi',
      'telp.min'      => 'Telepon min 10',
      'telp.max'      => 'Telepon max 13',
      'username.required'  => 'Username harus di isi',
      'username.unique'    => 'Username sudah ada',
      'username.min'  => 'Usernaem min 5',
      'password.required'  => 'Password harus di isi',
      'password.min'  => 'Password min 8',
      'password.confirmed' => 'Password tidak cocok'
    ]);

    $petugas = $request->all();

    Petugas::create([
      'nama' => $request->nama,
      'username' => $request->username,
      'password' => Hash::make($request->password),
      'telp' => $request->telp,
      'level' => 'Petugas',
      'status' => '1'
    ]);

    return redirect()->route('admin.users.indexPetugas')->with('pesan', 'Data berhasil di tambahkan !');
  }
}
