<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = departemen::all();

        return view('karyawan.resedu', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = departemen::all();

        return view('Departemen.add', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    // public function show(departemen $departemen)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $departemen)
    {
        $data = departemen::findOrFail($departemen);

        // dd($data);

        return view('Departemen.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $departemen)
    {
        $data = departemen::findOrFail($departemen);
        $data->delete();

        return back()->withInput();
    }
}
