<?php

namespace App\Http\Controllers\karyawan;

use App\Models\karyawan;
use Illuminate\Http\Request;
use App\Models\orangTuaKaryawan;
use App\Http\Controllers\Controller;
use App\Models\alamat;
use App\Models\Province;
use App\Models\tanggunganKaryawan;

class karyawanController extends Controller
{
    public function index()
    {
        $karyawans = karyawan::with(['alamat','jobDesc.departement'])->get();


        return view('karyawan.karyawan', ['karyawans' => $karyawans]);
    }

    public function create()
    {
        $provinsi = Province::all();
        return view('karyawan.add', ['provinsi' => $provinsi]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_ktp' => 'required',
            'nama' => 'required',
            'gender' => 'required|in:L,P',
        ],
        [
            'nomor_ktp.required' => 'nomor KTP tidak boleh kosong',
            'nama.required' => 'nama tidak boleh kosong',
            'gender.required' => 'jenis kelamin tidak boleh kosong',
            'anak_ke.required' => 'form ini tidak boleh kosong',
        ]);

        $karyawan=karyawan::create([
            'nomor_ktp' => $request->nomor_ktp,
            'nama' =>  ucwords(strtolower($request->nama)),
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => ($request->gender ? $request->gender : 'null'),
            'agama' => ($request->agama ? $request->agama : 'null'),
            'kewarganegaraan' => $request->kewarganegaraan,
            'golongan_darah' => $request->golongan_darah,
            'phone' => $request->phone,
            'anak_ke' => $request->anak_ke,
        ]);

        $alamat = alamat::create([
            'jalan' => $request->jalan,
            'rt' =>$request->rt,
            'rw' => $request->rw,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => ucwords(strtolower($request->kabupaten)),
            'provinsi' => $request->provinsi,
            'id_karyawan' => $karyawan->id,
        ]);

        $orangTuaValidated = $request->validate([
            'ayah' => 'required',
            'ibu' => 'required',
        ],
        [
            'ayah.required' => 'nama ayah tidak boleh kosong',
            'ibu.required' => 'nama ibu tidak boleh kosong',
        ]);

        orangTuaKaryawan::create([
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

        return redirect()->route('karyawan.show',['karyawan' => $karyawan->id])->with('success', 'data berhasil di edit');
    }

    public function show($id)
    {
        $karyawan = karyawan::with(['alamat','orangTuaKaryawan', 'tanggunganKaryawan', 'pengalaman', 'jobDesc.departement','lampiran'])->findOrFail($id);

        return view('karyawan.show', ['karyawan' => $karyawan]);
    }

    public function edit($id)
    {

        $karyawan = karyawan::with(['alamat', 'orangTuaKaryawan', 'tanggunganKaryawan', 'pengalaman'])->findOrFail($id);
        $provinsi = Province::all();
        return view('karyawan.edit', ['data' => $karyawan, 'provinsi'=> $provinsi]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nomor_ktp' => 'required',
            'nama' => 'required',
            'gender' => 'required|in:L,P',

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
            'nama' =>  ucwords(strtolower($request->nama)),
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'golongan_darah' => $request->golongan_darah,
            'alamat' => $request->alamat,
            'phone' => $request->phone,
            'anak_ke' => $request->anak_ke,
        ]);


        if($karyawan->alamat) {
            $alamat = alamat::findOrFail($karyawan->alamat->id);
            $alamat->update([
                'jalan' => $request->jalan,
                'rt' =>$request->rt,
                'rw' => $request->rw,
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => ucwords(strtolower($request->kabupaten)),
                'provinsi' => $request->provinsi,
                'id_karyawan' => $karyawan->id,
            ]);
        } else {
            alamat::create([
                'jalan' => $request->jalan,
                'rt' =>$request->rt,
                'rw' => $request->rw,
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'id_karyawan' => $karyawan->id,
            ]);
        }


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


        return redirect()->route('karyawan.show', ['karyawan'=> $karyawan->id])->with('success', 'data berhasil di edit');
    }

    public function destroy($id)
    {
        $data = karyawan::where('id', $id)->first();

        $data->alamat()->delete();
        $data->tanggunganKaryawan()->delete();
        $data->pengalaman()->delete();
        $data->jobDesc()->delete();

        $data->delete();


        return redirect()->route('karyawan.index')->with('success', 'data karyawan telah di hapus');
    }
}
