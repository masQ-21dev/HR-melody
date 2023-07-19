<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\orangTuaKaryawan;
use App\Models\tanggunganKaryawan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $karyawans = karyawan::with(['orangTuaKaryawan', 'tanggunganKaryawan', 'pengalaman'])->get();
        $karyawans = karyawan::all();
        // dd($karyawans);
        return view('karyawan', ['karyawans' => $karyawans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
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
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $karyawan = karyawan::with(['orangTuaKaryawan', 'tanggunganKaryawan', 'pengalaman'])->findOrFail($id);
        // $karyawan = karyawan::findOrFail($id);
        // dd($karyawan);
        return view('detail', ['karyawan' => $karyawan]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(karyawan $id)
    {
        $karyawan = karyawan::with(['orangTuaKaryawan', 'tanggunganKaryawan', 'pengalaman'])->findOrFail($id);
        return view('edit', ['karyawan' => $karyawan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, karyawan $id)
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(karyawan $karyawan)
    {
        //
    }
    public function showTanggungan($id, $id1)
    {
        $karyawan = karyawan::with('tanggunganKaryawan')->findOrFail($id);
        foreach($karyawan->tanggunganKaryawan as $tanggungan) {
            if($tanggungan->id == $id1) {
                return view('resedu', ['karyawan' => $tanggungan]);
            }
        }
    }

    public function addTanggungan($id) {
        $karyawan = karyawan::with('tanggunganKaryawan')->findOrFail($id);
    }
    public function storeTanggungan($id, $request) {
        $karyawan = karyawan::with('tanggunganKaryawan')->findOrFail($id);

        $validated = $request->validate([
            'nama' => "required",
            'hubungan' => 'required|in:istri,anak',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required|in:L,P',
        ],
        [
            'nama.required' => "nama tidak boleh kosong",
            'hubungan.required' => 'kolom tidak boleh kosong',
            'tempat_lahir.required' => 'kolom tidak boleh kosong',
            'tanggal_lahir.required' => 'kolom tidak boleh kosong',
            'gender.required' => 'kolom tidak boleh kosong',
        ]);


        $tanggunganKaryawan = tanggunganKaryawan::create([
            'nama' => $request->nama,
            'hubungan' => $request->hubungan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'id_karyawan' => $karyawan->id,
        ]);
    }

    public function editTanggungan($id, $id1) {
        $karyawan = karyawan::with('tanggunganKaryawan')->findOrFail($id);
        foreach($karyawan->tanggunganKaryawan as $tanggungan) {
            if($tanggungan->id == $id1) {
                return view('resedu', ['karyawan' => $tanggungan]);
            }
        }
    }

    public function updateTanggungan($id, $id1, $request) {
        $karyawan = karyawan::with('tanggunganKaryawan')->findOrFail($id);
    }
}
