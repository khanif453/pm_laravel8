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

    public function register(Request $request){
        $this->validator($request);

        Masyarakat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'telp' => $request->telp
        ]);

        return redirect()->intended(route('admin.login'))->with('pesan','You Are Registered, Please Login Again!');
    }

    private function validator(Request $request)
    {
        $rules = [
            'nik'    => 'required|numeric',
            'nama'    => 'required|string',
            'telp'    => 'required|numeric',
            'username'    => 'required|string|unique:masyarakat|min:4|max:191',
            'password' => 'required|string|min:4|max:255|confirmed',
        ];

        $request->validate($rules);
    }
}
