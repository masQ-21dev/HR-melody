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

        $data = karyawan::with(['jobDesc.departement'])->whereHas('jobDesc', function ($query) use ($request) {
            $query->where('id_departement', $request->id);
        })->get();

        return view('Departemen.filter', ['data' => $departemen, 'karyawans' => $data]);

    }
}
