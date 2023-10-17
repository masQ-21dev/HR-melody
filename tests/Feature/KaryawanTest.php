<?php

namespace Tests\Feature;

use App\Models\karyawan;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KaryawanTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::first();
        $this->actingAs($user);
    }
    /**
     * A basic feature test example.
     */
    public function test_access_karyawan_list(): void
    {
        $response = $this->get(route('karyawan.index'));

        $response->assertStatus(200);
        $response->assertViewIs('karyawan.karyawan');
    }
     /**
     * A basic feature test example.
     */
    public function test_input_karyawan(): void
    {
        $response = $this->post(route('karyawan.store'), [
            'nomor_ktp' => '01201021',
            'nama' => 'test-name',
            'gender' => 'L',
            'ayah' => 'test-ayah',
            'ibu' => 'test-ibu',
        ]);

        $response->assertStatus(302);
    }

    /**
     * A basic feature test example.
     */
    public function test_lihat_data_karyawan(): void
    {
        $karyawan = karyawan::first();
        $response = $this->get(route('karyawan.show', ['karyawan' => $karyawan->id]));

        $response->assertStatus(200);
        $response->assertViewIs('karyawan.show');
    }

     /**
     * A basic feature test example.
     */
    public function test_edit_karyawan(): void
    {

        $karyawan = karyawan::where('nomor_ktp', '01201021')->first();
        $response = $this->put(route('karyawan.update', ['karyawan' => $karyawan->id] ), [
            'nama' => 'test-name-update',
        ]);

        $response->assertStatus(302);
    }

     /**
     * A basic feature test example.
     */
    public function test_delet_karyawan(): void
    {

        $karyawan = karyawan::where('nomor_ktp', '01201021')->first();
        $response = $this->delete(route('karyawan.destroy', ['karyawan' => $karyawan->id] ));

        $response->assertStatus(302)->assertRedirect(route('karyawan.index'));
    }
}
