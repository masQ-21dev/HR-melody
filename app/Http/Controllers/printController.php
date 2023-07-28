<?php

namespace App\Http\Controllers;



use App\Models\karyawan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

// use Barryvdh\DomPDF\Facade\Pdf;

class printController extends Controller
{
    public function printAplication($id)
    {
        $data = karyawan::with(['orangTuaKaryawan', 'tanggunganKaryawan', 'pengalaman'])->findOrFail($id);

        $filename = now()->timestamp.'-aplication-'.$data->nama.'.pdf';


        $pdf = Pdf::loadView('print.aplication', ['data'=>$data]);
        return $pdf->download($filename);
    }

    public function printLampiran($id)
    {
        $data = karyawan::with(['jobDesc','lampiran'])->findOrFail($id);

        // return view('print.lampiran', ['data'=> $data]);

        $filename = now()->timestamp.'-aplication-'.$data->nama.'.pdf';


        $pdf = Pdf::loadView('print.lampiran', ['data'=>$data]);
        return $pdf->download($filename);
    }
}
