<?php

namespace App\Http\Controllers;

use App\Models\jobDesc;
use App\Models\karyawan;
use App\Models\departemen;
use Illuminate\Http\Request;

class JobDescController extends Controller
{
    public function create($id)
    {
        $departement = departemen::all();

        return view('job_data.add', ['id'=> $id, 'departement' => $departement]);
    }

    public function store($id, Request $request)
    {
        // return $request;
        $jobData = jobDesc::create([
            'no_induk_kerja' => $request->no_induk_kerja,
            'TMT' => $request->TMT,
            'posisi' => $request->posisi,
            'id_departement' => $request->id_departement,
            'id_karyawan' => $id
        ]);
        $karyawan = karyawan::find($id);
        $karyawan->touch();

        return redirect()->route('karyawan.show', ['karyawan'=> $id])->with('success', 'data jondesc telah di tambahkan');
    }

    public function edit($id, $jobDesc)
    {
        $data = jobDesc::findOrfail($jobDesc);
        $departement = departemen::all();

        return view('job_data.edit', ['id'=> $id, 'data'=>$data, 'departement' => $departement]);
    }

    public function update(Request $request, $id, $jobDesc)
    {
        $data = jobDesc::findOrfail($jobDesc);
        $data->update([
            'no_induk_kerja' => $request->no_induk_kerja,
            'TMT' => $request->TMT,
            'posisi' => $request->posisi,
            'id_departement' => $request->id_departement,
            'id_karyawan' => $id
        ]);
        $karyawan = karyawan::find($id);
        $karyawan->touch();

        return redirect()->route('karyawan.show', ['karyawan'=> $id])->with('success', 'data jobdesc telah di perbarui');;
    }
}
