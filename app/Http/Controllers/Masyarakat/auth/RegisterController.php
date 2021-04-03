<?php

namespace App\Http\Controllers\Masyarakat\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masyarakat;

class RegisterController extends Controller
{
	public function showRegisterForm()
	{
		return view('auth.register');
	}

	public function register(Request $request)
	{
		$request->validate([
			'nik'    => 'required|unique:masyarakat|min:16|max:16',
			'nama'    => 'required|string',
			'telp'    => 'required|min:8|max:13',
			'username'    => 'required|string|unique:masyarakat|min:5',
			'password' => 'required|string|min:8|confirmed',
		], [
			'nik.unique' => 'Nik sudah ada',
			'nik.min' => 'Nik harus 16',
			'nik.max' => 'Nik harus 16',
			'telp.min' => 'No. HP min 10',
			'telp.max' => 'No. HP max 13',
			'username.unique' => 'Username sudah ada',
			'username.min' => 'Username min 5',
			'password.min' => 'Password min 8',
			'password.confirmed' => 'Password tidak cocok'
		]);

		$masyarakat = $request->all();

		Masyarakat::create([
			'nik' => $request->nik,
			'nama' => $request->nama,
			'username' => $request->username,
			'password' => bcrypt($request->password),
			'telp' => $request->telp
		]);

		return redirect()->intended(route('admin.login'))->with('pesan', 'You Are Registered, Please Login Again!');
	}
}
