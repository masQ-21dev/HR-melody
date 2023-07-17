<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, karyawan $karyawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(karyawan $karyawan)
    {
        //
    }
}
