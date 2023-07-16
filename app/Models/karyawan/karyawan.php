<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * Get the user that owns the karyawan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(orangTuaKaryawan::class, 'id_karyawan', 'id');
    }

}
