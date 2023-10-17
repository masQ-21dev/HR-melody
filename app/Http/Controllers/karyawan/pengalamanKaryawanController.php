<?php

namespace App\Http\Controllers\karyawan;

use App\Models\karyawan;
use Illuminate\Http\Request;
use App\Models\pengalamanKaryawan;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class pengalamanKaryawanController extends Controller
{
    public function create($id)
    {
        $pengalamanKaryawan = pengalamanKaryawan::where('id_karyawan', $id)->get();

        return view('pengalaman.add',['data'=> $pengalamanKaryawan, 'id' => $id]);
    }

    public function store($id, Request $request)
    {
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
        $karyawan = karyawan::find($id);
        $karyawan->touch();

        return back()->withInput();
    }

    public function edit($id, $pengalaman)
    {
        $data = pengalamanKaryawan::where('id_karyawan', $id )->findOrFail($pengalaman);

        return view('pengalaman.edit', ['data'=> $data, 'id'=>$id]);
    }

    public function update( $id, $pengalaman, Request $request)
    {
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

        $karyawan = karyawan::find($id);
        $karyawan->touch();
        return redirect()->route('karyawan.show', ['karyawan' => $id])->with('success', 'data berhasil di update');
    }

    public function destroy($id, $pengalaman,)
    {
        $data = pengalamanKaryawan::where('id_karyawan', $id )->findOrFail($pengalaman);
        $data->delete();

        $karyawan = karyawan::find($id);
        $karyawan->touch();

        return back()->withInput();
    }
}
