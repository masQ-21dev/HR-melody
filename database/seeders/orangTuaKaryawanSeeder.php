<?php

namespace Database\Seeders;

use App\Models\karyawan;
use App\Models\orangTuaKaryawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class orangTuaKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = karyawan::get('id');

        foreach( $data as $id) {
            orangTuaKaryawan::factory()->create([
                'id_karyawan' => $id
            ]);
        }
    }
}
