<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\karyawan;
use Illuminate\Http\Request;

class karyawanByDepattementController extends Controller
{
    public function index(Request $request)
    {
        $departemen = departemen::all();

        if($request->id == null) {
            return view('Departemen.filter', ['data' => $departemen, 'karyawans' => null]);
        }
        // $karyawans = karyawan::where('id',$request->id)->get();
        // return view('Departemen.filter', ['data' => $departemen, 'karyawans' => $karyawans]);

        // $data = karyawan::with(['jobDesc', function($query) use ($request->id) {
        //     $query->where('id_departement',$request->id );}])->get();
        // $books = Book::with(['author.contact' => $cb)->whereHas('author', function($query) use ($cb) {

        //     $query->where('is_online', 'Y')->whereHas('contacts', $cb);

        // }])->get();
        // $books = Book::with(['author' => $cb, 'author.contact' => $cb])->get();

        $data = karyawan::with(['jobDesc' => $request->id, 'jobDesc.id_departement' => $request->id ])->get();
        return $data;

    }
}
