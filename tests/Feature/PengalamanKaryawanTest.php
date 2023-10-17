<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\karyawan;
use App\Models\pengalamanKaryawan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PengalamanKaryawanTest extends TestCase
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
    public function test_edit_Pengalaman_Karyawan(): void
    {
        $karyawan = karyawan::where('nomor_ktp', '01201021')->first();
        $pengalaman = pengalamanKaryawan::where('id_karyawan', $karyawan->id)->first();
        if($pengalaman !== null) {
            $response = $this->put(route('pengalaman.update', ['id'=>$karyawan->id, 'pengalaman' => $pengalaman->id ]),
            [
                'tahun' => 2020,
                'pengalaman_kerja' => 'pengalaman test',
            ]);

            $response->assertStatus(302);
        } else {
            $response = $this->post(route('pengalaman.store', ['id'=>$karyawan->id ]),
            [
                'tahun' => 2020,
                'pengalaman_kerja' => 'pengalaman test',
            ]);

            $response->assertStatus(302);

        }
    }

    /**
     * A basic feature test example.
     */
    public function test_hapus_pengalaman_Karyawan(): void
    {
        $karyawan = karyawan::where('nomor_ktp', '01201021')->first();
        $this->post(route('pengalaman.store', ['id'=>$karyawan->id ]),
            [
                'tahun' => 2020,
                'pengalaman_kerja' => 'pengalaman test',
            ]);
        $pengalaman = pengalamanKaryawan::where('id_karyawan', $karyawan->id)->first();

        $response = $this->delete(route('pengalaman.destroy', ['id'=>$karyawan->id,'pengalaman' => $pengalaman->id ]));

        $response->assertStatus(302);
    }
}
