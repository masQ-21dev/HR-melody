<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;

class printController extends Controller
{
    public function printAplication($id)
    {
        $data = karyawan::with(['orangTuaKaryawan', 'tanggunganKaryawan', 'pengalaman'])->findOrFail($id);

        return view('print.aplication', ['data' => $data]);
    }

    public function printLampiran($id)
    {
        $data = karyawan::with(['jobDesc','lampiran'])->findOrFail($id);

        return view('print.lampiran', ['data'=> $data]);
    }
}
