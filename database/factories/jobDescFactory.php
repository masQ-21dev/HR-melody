<?php

namespace Database\Factories;

use Faker\Factory as faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\jobDesc>
 */
class jobDescFactory extends Factory
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
            'no_induk_kerja' =>$faker->numerify('#####/##'),
            'TMT' => $faker->date(),
            'posisi' => $faker->jobTitle(),
            'id_departement' => Arr::random([1,2,3,4]),
            'id_karyawan' => mt_rand(1, 1000)
        ];
    }
}
