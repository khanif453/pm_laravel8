<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Petugas;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.registerAdmin');
    }

    public function register(Request $request){
        $this->validator($request);

        Petugas::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'telp' => $request->telp,
            'level' => 'Admin',
            'status' => '0'
        ]);

        return redirect()->intended(route('admin.login'))->with('status','You are Registered, please wait for other admin actived your account!');
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'nama'    => 'required|string',
            'telp'    => 'required|numeric',
            'username'    => 'required|string|unique:masyarakat|min:5|max:191',
            'password' => 'required|string|min:4|max:255|confirmed',
        ];

        //validate the request.
        $request->validate($rules);
    }
}
