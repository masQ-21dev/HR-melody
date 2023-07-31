<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\karyawan;
use Illuminate\Http\Request;

class karyawanApiContoller extends Controller
{

    public function index()
    {
        $data = karyawan::with(['alamat','jobDesc.departement'])->get();

        return response()->json(['data'=> $data]);
    }

    public function show($id)
    {
        $data = karyawan::with(['alamat','jobDesc.departement'])->findOrFail($id);

        if($data) {
            return response()->json(['data'=> $data], 200);
        }
        return response()->json([
            "message" => 'data tidak di temukan'
        ], 404);
    }

    public function getAllPhoneKaryawan()
    {
        $data = karyawan::with(['alamat','jobDesc.departement'])->get(['id', 'nama','phone',]);

        if($data) {
            return response()->json(['data'=> $data], 200);
        }
        return response()->json([
            "message" => 'data tidak di temukan'
        ], 404);
    }

    public function getPhoneKaryawan($id)
    {
        $data = karyawan::with(['alamat','jobDesc.departement'])->where('id', $id)->get(['id', 'nama','phone', ])->first();

        if($data) {
            return response()->json(['data'=> $data], 200);
        }
        return response()->json([
            "message" => 'data tidak di temukan'
        ], 404);
    }
}
