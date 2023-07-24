<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\karyawan;
use Illuminate\Http\Request;

class karyawanByDepattementController extends Controller
{
    public function index(Request $request)
    {
        $departemen = departemen::all();

        if($request->id == null) {
            return view('Departemen.filter', ['data' => $departemen, 'karyawans' => null]);
        }
        $karyawans = karyawan::where('id',$request->id)->get();
        return view('Departemen.filter', ['data' => $departemen, 'karyawans' => $karyawans]);

    }
}
