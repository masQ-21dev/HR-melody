<?php

namespace Database\Seeders;

use App\Models\jobDesc;
use App\Models\karyawan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class jobDescSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = karyawan::get('id');

        foreach ($data as $id) {
            jobDesc::factory()->create([
                'id_karyawan' => $id
            ]);
        }
    }
}
