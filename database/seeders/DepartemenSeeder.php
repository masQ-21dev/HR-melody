<?php

namespace Database\Seeders;

use App\Models\departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $departemans = [
            [
                'id' => 1,
                'nama' => 'HR',
            ],
            [
                'id' => 2,
                'nama' => 'produksi',
            ],
            [
                'id' => 3,
                'nama' => 'pemasaran',
            ],
            [
                'id' => 4,
                'nama' => 'desain',
            ],
        ];

        departemen::query()->insert($departemans);
    }
}
