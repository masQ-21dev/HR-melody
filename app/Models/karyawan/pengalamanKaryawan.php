<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengalamanKaryawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'pengalaman_kerja',
        'id_karyawan'
    ];

    public $timestamps = false;

    protected $hidden = [
        'id_karyawan',
    ];
}
