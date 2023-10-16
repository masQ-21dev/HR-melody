<?php

namespace Database\Seeders;

use App\Models\roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 1,
                'role_name' => 'Super Admin',
            ],
            [
                'id' => 2,
                'role_name' => 'Admin',
            ],
            [
                'id' => 3,
                'role_name' => 'karyawan',
            ],
        ];

        roles::query()->insert($roles);
    }
}
