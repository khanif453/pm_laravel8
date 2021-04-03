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
			'telp'       => 'required|min:10|max:13',
			'username'   => 'required|string|unique:masyarakat|min:5',
			'password'   => 'required|string|min:8|confirmed',
		], [
			'nik.required' => 'Nik harus di isi',
			'nik.min' => 'Nik harus 16',
			'nik.max' => 'Nik harus 16',
			'nama.required' => 'Nama harus di isi',
			'telp.min' => 'Telepon min 10',
			'telp.max' => 'Telepon max 13',
			'username.required'  => 'Username harus di isi',
			'username.unique'    => 'Username sudah ada',
			'username.min'  => 'Username min 5',
			'password.required'  => 'Password harus di isi',
			'password.min'  => 'Password min 8',
			'password.confirmed' => 'Password tidak cocok'
		]);

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
			'telp'       => 'required|min:10|max:13'
		], [
			'nik.required' => 'Nik harus di isi',
			'nik.min' => 'Nik harus 16',
			'nik.max' => 'Nik harus 16',
			'nama.required' => 'Nama harus di isi',
			'telp.required' => 'Telepon harus di isi',
			'telp.min' => 'Telepon min 10',
			'telp.max' => 'Telepon max 13',
		]);

		$masyarakat = $request->all();

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
		return redirect()->route('admin.users.indexMasyarakat')->with('pesan', 'Data telah di hapus !');
	}
}
