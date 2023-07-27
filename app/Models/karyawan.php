<?php

namespace App\Models;

use App\Models\orangTuaKaryawan;
use App\Models\pengalamanKaryawan;
use App\Models\tanggunganKaryawan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_ktp',
        'nama',
        'tanggal_lahir',
        'gender',
        'agama',
        'kewarganegaraan',
        'golongan_darah',
        'alamat',
        'phone',
        'anak_ke'
    ];


    public function orangTuaKaryawan()
    {
        return $this->hasOne(orangTuaKaryawan::class, 'id_karyawan', 'id');
    }

    public function tanggunganKaryawan()
    {
        return $this->hasMany(tanggunganKaryawan::class, 'id_karyawan', 'id');
    }

    public function pengalaman()
    {
        return $this->hasMany(pengalamanKaryawan::class, 'id_karyawan', 'id');
    }

    public function jobDesc()
    {
        return $this->hasOne(jobDesc::class, 'id_karyawan', 'id');
    }

    public function lampiran()
    {
        return $this->hasOne(lampiran::class, 'id_karyawan', 'id');
    }

}
