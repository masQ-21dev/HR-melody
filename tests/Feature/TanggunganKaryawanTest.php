<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\karyawan;
use App\Models\tanggunganKaryawan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TanggunganKaryawanTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $user = User::first();
        $this->actingAs($user);

        $this->post(route('karyawan.store'), [
            'nomor_ktp' => '01201021',
            'nama' => 'test-name',
            'gender' => 'L',
            'ayah' => 'test-ayah',
            'ibu' => 'test-ibu',
        ]);

    }

    protected function tearDown(): void
    {
        $karyawan = karyawan::where('nomor_ktp', '01201021')->first();
        $this->delete(route('karyawan.destroy', ['karyawan' => $karyawan->id] ));
        parent::tearDown();

    }
    /**
     * A basic feature test example.
     */
    public function test_edit_Tanggungan_Karyawan(): void
    {
        $karyawan = karyawan::where('nomor_ktp', '01201021')->first();
        $tanggunanKaryawan = tanggunganKaryawan::where('id_karyawan', $karyawan->id)->first();
        if($tanggunanKaryawan !== null) {
            $response = $this->put(route('tanggungan.update', ['id'=>$karyawan->id, 'tanggungan' => $tanggunanKaryawan->id ]),
            [
                'nama' => 'tanggugan test',
                'hubungan' => 'anak',
                'tempat_lahir' => 'malang',
                'tanggal_lahir' => '2022-09-21',
                'gender' => 'L',
            ]);

            $response->assertStatus(302);
        } else {
            $response = $this->post(route('tanggungan.store', ['id'=>$karyawan->id ]),
            [
                'nama' => 'tanggugan test',
                'hubungan' => 'anak',
                'tempat_lahir' => 'malang',
                'tanggal_lahir' => '2022-09-21',
                'gender' => 'L',
            ]);

            $response->assertStatus(302);

        }
    }

    /**
     * A basic feature test example.
     */
    public function test_hapus_Tanggungan_Karyawan(): void
    {
        $karyawan = karyawan::where('nomor_ktp', '01201021')->first();
        $this->post(route('tanggungan.store', ['id'=>$karyawan->id ]),
            [
                'nama' => 'tanggugan test',
                'hubungan' => 'anak',
                'tempat_lahir' => 'malang',
                'tanggal_lahir' => '2022-09-21',
                'gender' => 'L',
            ]);
        $tanggunanKaryawan = tanggunganKaryawan::where('id_karyawan', $karyawan->id)->first();

        $response = $this->delete(route('tanggungan.destroy', ['id'=>$karyawan->id,'tanggungan' => $tanggunanKaryawan->id ]));

        $response->assertStatus(302);
    }
}
