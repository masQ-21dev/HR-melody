<?php

namespace Tests\Feature;

use App\Models\departemen;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartemenTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $user = User::first();
        $this->actingAs($user);

    }

    /** @test */
    public function test_add_new_departemnt(): void
    {

        $response = $this->post(route('deparatement.store'),[
            'nama' => 'testing departemen',
        ]);
        $response->assertStatus(302);
    }

    /** @test */
    public function test_edit_departement(): void
    {
        $departement = departemen::where('nama', 'testing departemen')->first();

        $response = $this->put(route('deparatement.update' ,['deparatement' => $departement->id]),[
            'name' => 'testing departemen update',
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function test_delete_departement(): void
    {
        $departement = departemen::where('nama', 'testing departemen')->first();

        $response = $this->delete(route('deparatement.destroy',['deparatement' => $departement->id]));

        $response->assertStatus(302);
    }

}
