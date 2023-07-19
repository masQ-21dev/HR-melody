<?php

namespace App\Http\Controllers\karyawan;

use App\Models\karyawan;
use Illuminate\Http\Request;
use App\Models\orangTuaKaryawan;
use App\Http\Controllers\Controller;
use App\Models\tanggunganKaryawan;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = karyawan::all();

        return view('karyawan.karyawan', ['karyawans' => $karyawans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_ktp' => 'required',
            'nama' => 'required',
            'gender' => 'required|in:L,P',
            'anak_ke' => 'required'
        ],
        [
            'nomor_ktp.required' => 'nomor KTP tidak boleh kosong',
            'nama.required' => 'nama tidak boleh kosong',
            'gender.required' => 'jenis kelamin tidak boleh kosong',
            'anak_ke.required' => 'form ini tidak boleh kosong',
        ]);

        $karyawan = karyawan::create([
            'nomor_ktp' => $request->nomor_ktp,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'golongan_darah' => $request->golongan_darah,
            'alamat' => $request->alamat,
            'phone' => $request->phone,
            'anak_ke' => $request->anak_ke,
        ]);

        $orangTuaValidated = $request->validate([
            'ayah' => 'required',
            'ibu' => 'required',
        ],
        [
            'ayah.required' => 'nama ayah tidak boleh kosong',
            'ibu.required' => 'nama ibu tidak boleh kosong',
        ]);

        $orangTuaKaryawan = orangTuaKaryawan::create([
            'ayah' => $request->ayah,
            'umur_ayah' => $request->umur_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'alamat_ayah' => $request->alamat_ayah,
            'ibu' => $request->ibu,
            'umur_ibu' => $request->umur_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat_ibu' => $request->alamat_ibu,
            'id_karyawan' => $karyawan->id,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'data berhasil di edit');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $karyawan = karyawan::with(['orangTuaKaryawan', 'tanggunganKaryawan', 'pengalaman'])->findOrFail($id);

        return view('karyawan.detail', ['karyawan' => $karyawan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $karyawan = karyawan::with(['orangTuaKaryawan', 'tanggunganKaryawan', 'pengalaman'])->findOrFail($id);

        return view('karyawan.detail', ['karyawan' => $karyawan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nomor_ktp' => 'required',
            'nama' => 'required',
            'gender' => 'required|in:L,P',
            'anak_ke' => 'required'
        ],
        [
            'nomor_ktp.required' => 'nomor KTP tidak boleh kosong',
            'nama.required' => 'nama tidak boleh kosong',
            'gender.required' => 'jenis kelamin tidak boleh kosong',
            'anak_ke.required' => 'form ini tidak boleh kosong',
        ]);

        $karyawan = karyawan::with('orangTuaKaryawan')->findOrFail($id);
        $karyawan->update([
            'nomor_ktp' => $request->nomor_ktp,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'golongan_darah' => $request->golongan_darah,
            'alamat' => $request->alamat,
            'phone' => $request->phone,
            'anak_ke' => $request->anak_ke,
        ]);

        $orangTuaValidated = $request->validate([
            'ayah' => 'required',
            'ibu' => 'required',
        ],
        [
            'ayah.required' => 'nama ayah tidak boleh kosong',
            'ibu.required' => 'nama ibu tidak boleh kosong',
        ]);


        $orangTuaKaryawan = orangTuaKaryawan::findOrfail($karyawan->orangTuaKaryawan->id);
        $orangTuaKaryawan->update([
            'ayah' => $request->ayah,
            'umur_ayah' => $request->umur_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'alamat_ayah' => $request->alamat_ayah,
            'ibu' => $request->ibu,
            'umur_ibu' => $request->umur_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat_ibu' => $request->alamat_ibu,
            'id_karyawan' => $karyawan->id,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = karyawan::where('id', $id)->first();

        $data->tanggunganKaryawan()->delete();
        $data->pengalaman()->delete();

        $data->delete();


        return redirect()->route('karyawan.index')->with('success', 'data karyawan telah di hapus');
    }
}
