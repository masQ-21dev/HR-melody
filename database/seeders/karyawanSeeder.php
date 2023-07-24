<?php

namespace Database\Seeders;

use App\Models\karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class karyawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        karyawan::factory()->count(20)->create();
    }
}
