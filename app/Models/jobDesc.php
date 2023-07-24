<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobDesc extends Model
{
    use HasFactory;


    protected $fillable = [
        'no_induk_kerja',
        'TMT',
        'posisi',
        'id_departement',
        'id_karyawan'
    ];

    public $timestamps = false;

    public function departement()
    {
        return $this->belongsTo(departemen::class, 'id_departement', 'id');
    }




}
