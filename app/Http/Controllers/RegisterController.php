<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            return view('auth.register');
    }

    public function store(Request $request)
    {
        // return request()->all();

        $validasi = $request->validate([
            'username'  => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $validasi['password'] = bcrypt($validasi['password']);
        User::create($validasi);
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

            return redirect()->route('login');
        // }

        // return back()->withInput()->with('failed','Register Failed!');
        }
    }
