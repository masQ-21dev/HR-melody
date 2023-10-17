<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use App\Models\karyawan;
use App\Models\tanggunganKaryawan;
use Illuminate\Http\Request;

class tanggunganKaryawanController extends Controller
{

    public function index($id)
    {
        $data = tanggunganKaryawan::where('id_karyawan', $id)->get();
        return view('karyawan.resedu', ['data' => $data]);
    }

    public function create($id)
    {
        $data = tanggunganKaryawan::where('id_karyawan', $id)->get();
        return view('tanggungan.add', ['data' => $data, 'id'=>$id]);
    }

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
            'Pekerjaan' => $request->pekerjaan,
            'id_karyawan' => $id,
        ]);

        $karyawan = karyawan::find($id);
        $karyawan->touch();

        return back()->withInput();
    }

    public function edit($id, $tanggungan)
    {
        $data = tanggunganKaryawan::where('id_karyawan', $id)->findOrFail($tanggungan);
        return view('tanggungan.edit', ['data' => $data, 'id'=>$id]);
    }

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
            'Pekerjaan' => $request->pekerjaan,
            'id_karyawan' => $id,
        ]);

        $karyawan = karyawan::find($id);
        $karyawan->touch();

        return redirect()->route('karyawan.show', ['karyawan'=> $id])->with('succes', 'data berhasil di update');
    }
    public function destroy($id, $tanggungan)
    {
        $data = tanggunganKaryawan::where('id_karyawan', $id)->findOrFail($tanggungan);
        $data->delete();

        $karyawan = karyawan::find($id);
        $karyawan->touch();
        return back()->withInput();
    }
}
