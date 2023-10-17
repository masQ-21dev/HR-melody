<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{

    public function index()
    {
        $data = departemen::all();

        return view('karyawan.resedu', ['data' => $data]);
    }

    public function create()
    {
        $data = departemen::all();

        return view('Departemen.add', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama'=> 'required',
        ],
        [
            'nama.required' => 'Nama Departemen tidak boleh kosong'
        ]);

        $data = departemen::create([
            'nama' => $request->nama,
        ]);

        return back()->withInput();


    }

    public function edit( $departemen)
    {
        $data = departemen::findOrFail($departemen);

        // dd($data);

        return view('Departemen.edit', ['data' => $data]);
    }

    public function update(Request $request,  $departemen)
    {
        $validasi = $request->validate([
            'nama'=> 'required',
        ],
        [
            'nama.required' => 'Nama Departemen tidak boleh kosong'
        ]);

        $data = departemen::findOrFail($departemen);
        $data->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('deparatement.create');
    }

    public function destroy( $departemen)
    {
        $data = departemen::findOrFail($departemen);
        $data->delete();

        return back()->withInput();
    }
}
