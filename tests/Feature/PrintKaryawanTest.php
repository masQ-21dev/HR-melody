<?php

namespace Tests\Feature;

use App\Models\karyawan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrintKaryawanTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_prin_biodata(): void
    {
        $karyawan = karyawan::first();
        $response = $this->get(route('aplication',['id', $karyawan->id]));

        $response->assertStatus(302);
    }
    /**
     * A basic feature test example.
     */
    public function test_prin_lmapiran(): void
    {
        $karyawan = karyawan::first();
        $response = $this->get(route('aplication',['id', $karyawan->id]));

        $response->assertStatus(302);
    }
}
