<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_admin_dashboard(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_admin_can_access_admin_dashboard(): void
    {
        $admin = User::create([
            'name' => 'Administrator Desa Madani',
            'email' => 'admin@bps.go.id',
            'password' => Hash::make('bps7408'),
        ]);

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Portal Eksekutif Admin');
        $response->assertSee('Desa Madani');
        $response->assertSee('Ringkasan Eksekutif');
        $response->assertSee('Master Data Desa');
        $response->assertSee('Administrator Desa Madani');
    }

    public function test_admin_can_create_new_user(): void
    {
        $admin = User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@bps.go.id',
            'password' => Hash::make('bps7408'),
        ]);

        $response = $this->actingAs($admin)->post('/admin/users', [
            'name' => 'Operator Baru',
            'email' => 'operator@bps.go.id',
            'password' => 'operator123',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('users', [
            'name' => 'Operator Baru',
            'email' => 'operator@bps.go.id',
        ]);
    }
}

