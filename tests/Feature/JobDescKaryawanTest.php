<?php

namespace Tests\Feature;

use App\Models\departemen;
use App\Models\jobDesc;
use Tests\TestCase;
use App\Models\User;
use App\Models\karyawan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobDescKaryawanTest extends TestCase
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
    public function test_edit_jobdesc(): void
    {
        $karyawan = karyawan::where('nomor_ktp', '01201021')->first();
        $departemen = departemen::first();
        $job_desc = jobDesc::where('id_karyawan', $karyawan->id)->first();
        // dd($departemen->id);
        if($job_desc !== null) {
            $response = $this->put(route('job-data.update', ['id'=>$karyawan->id, 'job_datum' => $job_desc->id ]),
            [
                'TMT' => null,
                'posisi' => 'potong update',
                'id_departement' => $departemen->id
            ]);

            $response->assertStatus(302);
            $response->assertRedirect(route('karyawan.show',['karyawan'=> $karyawan->id] ));
        } else {
            $response = $this->post(route('job-data.store', ['id'=>$karyawan->id ]),
            [
                'no_induk_kerja' => '1020/00',
                'TMT' => null,
                'posisi' => null,
                'id_departement' => $departemen->id
            ]);

            $response->assertStatus(302);
            $response->assertRedirect(route('karyawan.show',['karyawan'=> $karyawan->id] ));
        }
    }
}
