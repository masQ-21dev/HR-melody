<?php

namespace Database\Factories;

use Faker\Factory as faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class karyawanFactory extends Factory
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
            'nomor_ktp' => mt_rand(0000001,9999999),
            'nama' => $faker->name(),
            'tanggal_lahir' => $faker->date(),
            'gender' => Arr::random(['L','P']),
            'agama' => Arr::random(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu' ]),
            'kewarganegaraan' => $faker->country(),
            'golongan_darah' => Arr::random(['A','B','AB','O']),
            'alamat' => $faker->address(),
            'phone' => $faker->phoneNumber(),
            'anak_ke' => Arr::random([1,2,3,4])
        ];
    }
}
