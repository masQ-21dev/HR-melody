<?php

namespace Tests\Feature;

// use App\Models\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /** @test */
    public function login_access(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('Auth.login');
    }

    /** @test */
    public function login_sistem(): void
    {
        $response = $this->post(route('autahenticate'),[
            'email' => 'test@test.com',
            'password' => 'passsword',
        ]);

        $response->assertRedirect(route('home'));
    }

    /** @test */
    public function Home_access(): void
    {
        $user = User::first();
        $this->actingAs($user);
        $response = $this->get(route('home'));
        // dd($response);
        $response->assertStatus(200);
        $response->assertViewIs('home');
    }

    /** @test */
    public function Logout(): void
    {
        $user = User::first();
        $this->actingAs($user);
        $response = $this->get(route('logout'));

        $response->assertRedirect(route('login'));
    }

}
