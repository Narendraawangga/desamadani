<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PodesWorkspaceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_authenticated_admin_can_fetch_podes_table_data(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@bps.go.id',
        ]);

        $response = $this->actingAs($admin)->getJson('/admin/podes/table-data?module=KETERANGAN%20UMUM%20DESA.xlsx&table=1.1&kecamatan=LASUSUA&desa=PITULUA');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'table' => '1.1',
            ])
            ->assertJsonStructure([
                'success',
                'module',
                'table',
                'title',
                'columns',
                'desa_row',
                'kecamatan_rows',
                'monitoring',
            ]);
    }

    public function test_authenticated_admin_can_save_podes_cell_value(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@bps.go.id',
        ]);

        $payload = [
            'module' => 'KETERANGAN UMUM DESA.xlsx',
            'table' => '1.1',
            'kecamatan' => 'LASUSUA',
            'desa' => 'PITULUA',
            'values' => [
                'B' => '1.0',
                'C' => '0',
            ],
        ];

        $response = $this->actingAs($admin)->postJson('/admin/podes/save', $payload);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'synced_to_portal' => true,
            ]);
    }

    public function test_authenticated_admin_can_trigger_sync_podes_to_portal(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@bps.go.id',
        ]);

        $response = $this->actingAs($admin)->postJson('/admin/podes/sync-portal');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function test_guest_cannot_access_podes_api(): void
    {
        $response = $this->getJson('/admin/podes/table-data');
        $response->assertStatus(401);
    }
}

