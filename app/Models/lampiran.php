<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lampiran extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto_karyawan',
        'ktp',
        'jamsostek',
        'jpk',
        'id_card',
        'kk',
        'id_karyawan'
    ];


    public $timestamps = false;
}
