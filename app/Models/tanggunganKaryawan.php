<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggunganKaryawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'hubungan',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
        'pendidikan',
        'pekerjaan',
        'id_karyawan'
    ];


    public $timestamps = false;

    public $hidden =[
        'id_karyawan'
    ];
}
