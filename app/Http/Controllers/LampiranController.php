<?php

namespace App\Http\Controllers;

use App\Models\lampiran;
use Illuminate\Http\Request;

class LampiranController extends Controller
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
        return view('lampiran.add', ['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        $request->validate([
            'foto_karyawan' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'ktp' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'jamsostek' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'jpk' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'id_card' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'kk' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
        ],[
            'foto_karyawan.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'foto_karyawan.max' => 'Gambar maksimal 10MB!',

            'ktp.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'ktp.max' => 'Gambar maksimal 10MB!',

            'jamsostek.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'jamsostek.max' => 'Gambar maksimal 10MB!',

            'jpk.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'jpk.max' => 'Gambar maksimal 10MB!',

            'id_card.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'id_card.max' => 'Gambar maksimal 10MB!',

            'kk.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'kk.max' => 'Gambar maksimal 10MB!',

        ]);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(lampiran $lampiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lampiran $lampiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lampiran $lampiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lampiran $lampiran)
    {
        //
    }
}
