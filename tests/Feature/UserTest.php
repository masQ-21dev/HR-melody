<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
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
    /** @test */
    public function test_acces_list_user(): void
    {
        $response = $this->get(route('user.index'));

        $response->assertStatus(200);
        $response->assertViewIs('user.index');
    }

    /** @test */
    public function test_add_new_user(): void
    {

        $response = $this->post(route('user.store'),[
            'username' => 'testing akun',
            'email' => 'testing@mail.com',
            'password' => 'password',
            'role_id' => 1
        ]);
        $response->assertRedirect(route('user.index'));
    }

    /** @test */
    public function test_edit_user(): void
    {
        $user = User::where('username', 'testing akun')->first();

        $response = $this->put(route('user.update' ,['user' => $user->id]),[
            'username' => 'testing akun update',
            'email' => 'testing@test.com',
            'password' => 'password',
            'role_id' => 1
        ]);

        $response->assertRedirect(route('user.index'));
    }

    /** @test */
    public function test_delete_user(): void
    {
        $user = User::where('username', 'testing akun update')->first();

        $response = $this->delete(route('user.destroy',['user' => $user->id]));

        $response->assertStatus(302);
    }


}
