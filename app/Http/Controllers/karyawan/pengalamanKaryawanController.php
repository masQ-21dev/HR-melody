<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use App\Models\pengalamanKaryawan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class pengalamanKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $pengalamanKaryawan = pengalamanKaryawan::where('id_karyawan', $id)->get();

        // dd($pengalamanKaryawan);

        return view('karyawan.resedu',['data'=> $pengalamanKaryawan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $pengalamanKaryawan = pengalamanKaryawan::where('id_karyawan', $id)->get();

        // dd($pengalamanKaryawan);

        return view('pengalaman.add',['data'=> $pengalamanKaryawan, 'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        // dd($request);
        $validator = $request->validate([
            'tahun' => 'required|numeric',
            'pengalaman_kerja' => 'required',
        ],
        [
            'tahun.required' => 'kolom tidak boleh kosong',
            'pengalaman_kerja.required' => 'kolom tidak boleh kosong',
        ]);

        $pengalaman = pengalamanKaryawan::create([
            'tahun' =>$request->tahun,
            'pengalaman_kerja' => $request->pengalaman_kerja,
            'id_karyawan' => $id,
        ]);

        return back()->withInput();
        // return redirect()->route('karyawan.show', ['karyawan' => $id])->with('success', 'data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $pengalaman)
    {
        $data = pengalamanKaryawan::where('id_karyawan', $id )->findOrFail($pengalaman);
        // dd($data);

        return view('karyawan.resedu', ['data'=> $data]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $pengalaman)
    {
        $data = pengalamanKaryawan::where('id_karyawan', $id )->findOrFail($pengalaman);
        // dd($data);

        return view('pengalaman.edit', ['data'=> $data, 'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $id, $pengalaman, Request $request)
    {
        // dd($request);
        $validator = $request->validate([
            'tahun' => 'required|numeric',
            'pengalaman_kerja' => 'required',
        ],
        [
            'tahun.required' => 'kolom tidak boleh kosong',
            'pengalaman_kerja.required' => 'kolom tidak boleh kosong',
        ]);

        $data = pengalamanKaryawan::where('id_karyawan', $id )->findOrFail($pengalaman);
        $data->update([
            'tahun' =>$request->tahun,
            'pengalaman_kerja' => $request->pengalaman_kerja,
            'id_karyawan' => $id,
        ]);

        // return back()->withInput();
        return redirect()->route('karyawan.show', ['karyawan' => $id])->with('success', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $pengalaman,)
    {
        $data = pengalamanKaryawan::where('id_karyawan', $id )->findOrFail($pengalaman);
        $data->delete();

        // return view('karyawan.resedu', ['data'=> url()->previous()] );
        // return view('karyawan.resedu', ['data'=> str_replace(url('/'), '', url()->previous())] );

        return back()->withInput();
        // return redirect()->route('karyawan.show', ['karyawan' => $id])->with('success', 'data berhasil di hapus');
    }
}
