<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ],[
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        if (Auth::attempt($validasi))
        {
            $request->session()->regenerate();

            return redirect()->route('dashboard.index')->with('succes', 'Berhasil Login!!');
        }
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
