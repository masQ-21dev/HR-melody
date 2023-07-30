<?php

namespace App\Http\Controllers\Auth;

use App\Models\karyawan;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\departemen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

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
        $totalkaryawan = karyawan::count();
        $departemen = departemen::all();


        $data = [];

        foreach ($departemen as $item) {

            $countdata = karyawan::with(['jobDesc.departement'])->whereHas('jobDesc', function ($query) use ($item) {
                $query->where('id_departement', $item->id);
            })->count();

            array_push($data, ['name' => $item->nama, 'countdata' => $countdata]);
        }


        // return view('karyawan.resedu', array('data' => $data), ['departemen' =>$departemen]);
        return  view('karyawan.resedu', ['data' => $data, 'departemen' => $departemen]);
        // // return view('home');
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
