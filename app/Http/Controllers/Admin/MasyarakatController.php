<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
	public function create()
	{
		return view('admin.users.masyarakat.create');
	}

	public function store(Request $request)
	{
    $request->validate([
      'nik'       => 'required|string|min:16|max:16',
      'nama'       => 'required|string',
      'telp'       => 'required|numeric',
      'username'   => 'required|string|unique:masyarakat|min:5',
      'password'   => 'required|string|min:8|confirmed',
    ], [
			'nik.required' => 'Nik harus di isi',
			'nik.min' => 'Nik min 16',
			'nik.max' => 'Nik max 16',
      'nama.required' => 'Nama harus di isi',
      'telp.required' => 'Telepon harus di isi',
      'username.required'  => 'Username harus di isi',
      'username.unique'    => 'Username sudah ada',
      'username.min'  => 'Username min 5',
      'password.required'  => 'Password harus di isi',
      'password.min'  => 'Password min 8',
      'password.confirmed' => 'Password tidak cocok'
    ]);

		// $this->validator($request);
		$masyarakat = $request->all();

		Masyarakat::create([
			'nik' => $request->nik,
			'nama' => $request->nama,
			'username' => $request->username,
			'password' => Hash::make($request->password),
			'telp' => $request->telp
		]);

		return redirect()->route('admin.users.indexMasyarakat')->with('pesan', 'Data telah di tambahkan !');
	}

	public function edit($id)
	{
		$masyarakat = Masyarakat::find($id);
		return view('admin.users.masyarakat.edit', compact(['masyarakat']));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
      'nik'       => 'required|string|min:16|max:16',
      'nama'       => 'required|string',
      'telp'       => 'required|numeric'
    ], [
			'nik.required' => 'Nik harus di isi',
			'nik.min' => 'Nik min 16',
			'nik.max' => 'Nik max 16',
      'nama.required' => 'Nama harus di isi',
      'telp.required' => 'Telepon harus di isi',
    ]);

		// $this->validator($request);
		$masyarakat = $request->all();

		// $this->validate($request, [
		// 	'nik' => 'required|numeric',
		// 	'nama' => 'required',
		// 	'telp' => 'required|numeric'
		// ]);

		$masyarakat = Masyarakat::find($id);
		$masyarakat->update([
			'nik' => $request->nik,
			'nama' => $request->nama,
			'telp' => $request->telp
		]);

		return redirect()->route('admin.users.indexMasyarakat')->with('pesan', 'Data telah di update !');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Masyarakat::destroy($id);
		return redirect()->route('admin.users.indexMasyarakat')->with('pesan', 'Data telah di hapus !
		');
	}
}
