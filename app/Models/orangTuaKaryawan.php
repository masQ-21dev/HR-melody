<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orangTuaKaryawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'ayah',
        'umur_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',
        'ibu',
        'umur_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',
        'id_karyawan',
    ];

    public $timestamps = false;


    protected $hidden = [
        'id_karyawan',
    ];


}
