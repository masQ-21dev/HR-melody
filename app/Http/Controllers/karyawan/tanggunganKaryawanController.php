<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use App\Models\tanggunganKaryawan;
use Illuminate\Http\Request;

class tanggunganKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = tanggunganKaryawan::where('id_karyawan', $id)->get();
        // dd($data);

        return view('karyawan.resedu', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.tanggungan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        $validator = $request->validate([
            'nama' => 'required',
            'hubungan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
        ],
        [
            'nama.required' => 'kolom tidak boleh kosong',
            'hubungan.required' => 'kolom tidak boleh kosong',
            'tempat_lahir.required' => 'kolom tidak boleh kosong',
            'tanggal_lahir.required' => 'kolom tidak boleh kosong',
            'gender.required' => 'kolom tidak boleh kosong',
        ]);

        $tanggungan = tanggunganKaryawan::create([
            'nama' => $request->nama,
            'hubungan' => $request->hubungan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'id_karyawan' => $id,
        ]);

        return redirect()->route('tanggungan.index', ['id'=> $id])->with('succes', 'data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $tanggungan)
    {
        $data = tanggunganKaryawan::where('id_karyawan', $id)->findOrFail($tanggungan);

        return view('karyawan.resedu', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $tanggungan)
    {
        $data = tanggunganKaryawan::where('id_karyawan', $id)->findOrFail($tanggungan);

        return view('karyawan.resedu', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, $tanggungan, Request $request)
    {
        $validator = $request->validate([
            'nama' => 'required',
            'hubungan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
        ],
        [
            'nama.required' => 'kolom tidak boleh kosong',
            'hubungan.required' => 'kolom tidak boleh kosong',
            'tempat_lahir.required' => 'kolom tidak boleh kosong',
            'tanggal_lahir.required' => 'kolom tidak boleh kosong',
            'gender.required' => 'kolom tidak boleh kosong',
        ]);

        $data = tanggunganKaryawan::where('id_karyawan', $id)->findOrFail($tanggungan);
        $data->update([
            'nama' => $request->nama,
            'hubungan' => $request->hubungan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'id_karyawan' => $id,
        ]);

        return redirect()->route('tanggungan.index', ['id'=> $id])->with('succes', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $tanggungan)
    {
        $data = tanggunganKaryawan::where('id_karyawan', $id)->findOrFail($tanggungan);
        $data->delete();

        return redirect()->route('karyawan.show', ['karyawan'=>$id])->with('succes', 'data berhasil di hapus');

    }
}
