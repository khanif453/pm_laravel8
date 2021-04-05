<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Petugas;

class RegisterController extends Controller
{
	public function showRegisterForm()
	{
		return view('auth.registerAdmin');
	}

	public function register(Request $request)
	{
		$request->validate([
			'nama'    => 'required|string',
			'telp'    => 'required|min:10|max:13',
			'username'    => 'required|string|unique:masyarakat|min:5',
			'password' => 'required|string|min:8|confirmed',
		], [
			'nama.required' => 'Nama harus di isi',
			'telp.min' => 'Telepon min 10',
			'telp.max' => 'Telepon max 13',
			'username.unique' => 'Username sudah ada',
			'username.min' => 'Username min 5',
			'password.min' => 'Password min 8',
			'password.confirmed' => 'Password tidak cocok',
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

		return redirect()->intended(route('admin.login'))->with('pesan', 'You Are Registered, Please Login Again!');
	}
}
