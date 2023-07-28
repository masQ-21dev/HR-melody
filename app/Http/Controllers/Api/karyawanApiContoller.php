<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\karyawan;
use Illuminate\Http\Request;

class karyawanApiContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = karyawan::with('jobDesc.departement')->get();

        return response()->json(['data'=> $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = karyawan::with('jobDesc.departement')->findOrFail($id);

        if($data) {
            return response()->json(['data'=> $data], 200);
        }
        return response()->json([
            "message" => 'data tidak di temukan'
        ], 404);
    }

    public function getAllPhoneKaryawan()
    {
        $data = karyawan::with('jobDesc.departement')->get(['id', 'nama','phone', 'alamat']);

        if($data) {
            return response()->json(['data'=> $data], 200);
        }
        return response()->json([
            "message" => 'data tidak di temukan'
        ], 404);
    }

    public function getPhoneKaryawan($id)
    {
        $data = karyawan::with('jobDesc.departement')->where('id', $id)->get(['id', 'nama','phone', 'alamat'])->first();

        if($data) {
            return response()->json(['data'=> $data], 200);
        }
        return response()->json([
            "message" => 'data tidak di temukan'
        ], 404);
    }


}
