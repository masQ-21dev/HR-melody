<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('Auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function autahenticate(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credential))
        {
            $request->session()->regenerate();
            return redirect()->route('home')->withSuccess('login berhasil');
        }

        return back()->withErrors([
            'email' => "email atau password salah",
        ])->onlyInput('email');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function home()
    {
        return view('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('berhasil logout');

    }
}
