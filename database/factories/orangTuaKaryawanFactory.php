<?php

namespace Database\Factories;

use Faker\Factory as faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\orangTuaKaryawan>
 */
class orangTuaKaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = faker::create();
        return [
            'ayah' => $faker->name(),
            'umur_ayah' =>mt_rand(38, 70),
            'pekerjaan_ayah' => $faker->jobTitle(),
            'alamat_ayah' =>$faker->address() ,
            'ibu'  => $faker->name(),
            'umur_ibu' =>mt_rand(38, 70),
            'pekerjaan_ibu' => $faker->jobTitle(),
            'alamat_ibu' =>$faker->address() ,
            'id_karyawan' => mt_rand(1, 1000),
        ];
    }
}
