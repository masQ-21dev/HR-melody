<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\jobDesc;
use Illuminate\Http\Request;

class JobDescController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $departement = departemen::all();

        return view('job_data.add', ['id'=> $id, 'departement' => $departement]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect()->route('karyawan.show', ['karyawan'=> $id]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $jobDesc)
    {
        $data = jobDesc::findOrfail($jobDesc);
        $departement = departemen::all();

        return view('job_data.edit', ['id'=> $id, 'data'=>$data, 'departement' => $departement]);
    }

    /**
     * Update the specified resource in storage.
     */
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

        return redirect()->route('karyawan.show', ['karyawan'=> $id]);
    }


}
