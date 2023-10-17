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
    protected function isThere($arr, $kota) {
        for($i = 0; $i < sizeof($arr); $i++) {
            if($arr[$i]['name'] == $kota) {
                return $i;
            }
        }
        return sizeof($arr);
    }

    public function login(){
        return view('Auth.login');
    }

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

    public function home()
    {
        $karyawan = karyawan::with('alamat')->get('id','nama', 'alamat.kabupaten', 'alamat.provinsi');
        $totalkaryawan = karyawan::count();
        $departemen = departemen::all();

        $baseOkota = [];
        foreach($karyawan as $item) {
            if($item->alamat != null & $item->alamat->kabupaten != null){
                $cek = $this->isThere($baseOkota, $item->alamat->kabupaten);
                if($cek != sizeof($baseOkota)) {
                    $baseOkota[$cek]['countdata']++;
                } elseif($cek == sizeof($baseOkota) ) {
                    array_push($baseOkota, ['name' => $item->alamat->kabupaten, 'countdata' => 1 ] );
                }
            }
        }
        $baseOnDep = [];

        foreach ($departemen as $item) {
            $countdata = karyawan::with(['jobDesc.departement'])->whereHas('jobDesc', function ($query) use ($item) {
                $query->where('id_departement', $item->id);
            })->count();
            array_push($baseOnDep, ['name' => $item->nama, 'countdata' => $countdata]);
        }
        return view('home',['totalKaryawan' => $totalkaryawan, 'baseOnDep' => $baseOnDep, 'baseOnKota' => $baseOkota]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('berhasil logout');
    }
}
