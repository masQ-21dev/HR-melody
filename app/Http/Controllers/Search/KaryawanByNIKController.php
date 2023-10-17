<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\karyawan;
use Illuminate\Http\Request;

class KaryawanByNIKController extends Controller
{
    public function index ()
    {
        return view('search.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required'
        ],[
            'no_ktp.required' => 'form tidak boleh kosong'
        ]);

        $datasearch = karyawan::where('no_ktp' , $request->no_ktp)->get('id','no_ktp');
        if ($datasearch != null) {
            return redirect();
        }
        abort(404);
    }

    public function dataEdit($no_ktp) {
        $karyawn = karyawan::with(['alamat','orangTuaKaryawan', 'tanggunganKaryawan', 'pengalaman', 'jobDesc.departement','lampiran'])->where('no_ktp', $no_ktp);

        return 0;
    }


}
