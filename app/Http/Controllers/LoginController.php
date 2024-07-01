<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('logins.login');
    }
    public function validasilogin(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'Admin') {
                $request->session()->put('user', $user->username);
                $request->session()->put('simpan', $user->name);
                $request->session()->put('jabatan', $user->jabatan);
                return redirect('/dashboardadm');
            } else {
                $request->session()->put('simpan', $user->name);
                $request->session()->put('jabatan', $user->jabatan);
                return redirect('/dashboarduser');
            }
        } else {
            return redirect('/logins')->with('alert', 'Username/Password Salah!');
        }
    }
}
