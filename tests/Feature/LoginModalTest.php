<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginModalTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_via_login_route(): void
    {
        $user = User::create([
            'name' => 'Admin Desa Madani',
            'email' => 'admin@bps.go.id',
            'password' => Hash::make('bps7408'),
        ]);

        $response = $this->postJson('/login', [
            'login' => 'admin@bps.go.id',
            'password' => 'bps7408',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_invalid_credentials(): void
    {
        $response = $this->postJson('/login', [
            'login' => 'admin@bps.go.id',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'success' => false,
            ]);

        $this->assertGuest();
    }
}

