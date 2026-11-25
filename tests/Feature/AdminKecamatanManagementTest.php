<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminKecamatanManagementTest extends TestCase
{
    use RefreshDatabase;

    private string $podesMasterPath;

    private string $podesAllTablesPath;

    private ?string $originalMasterJson = null;

    private ?string $originalAllTablesJson = null;

    /**
     * @var array<int, string>
     */
    private array $createdUploadPaths = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->podesMasterPath = database_path('data/podes_master.json');
        $this->podesAllTablesPath = database_path('data/podes_all_tables.json');

        if (file_exists($this->podesMasterPath)) {
            $this->originalMasterJson = file_get_contents($this->podesMasterPath) ?: null;
        }
        if (file_exists($this->podesAllTablesPath)) {
            $this->originalAllTablesJson = file_get_contents($this->podesAllTablesPath) ?: null;
        }
    }

    protected function tearDown(): void
    {
        foreach ($this->createdUploadPaths as $path) {
            if (file_exists($path)) {
                @unlink($path);
            }
        }

        if ($this->originalMasterJson !== null) {
            file_put_contents($this->podesMasterPath, $this->originalMasterJson);
        }
        if ($this->originalAllTablesJson !== null) {
            file_put_contents($this->podesAllTablesPath, $this->originalAllTablesJson);
        }

        parent::tearDown();
    }

    public function test_guest_cannot_create_or_edit_kecamatan(): void
    {
        $response = $this->postJson('/admin/kecamatan/save', [
            'nama' => 'Lasusua Utara',
            'ipd' => 75.0,
            'status_ipd' => 'Mandiri',
        ]);

        $response->assertStatus(401);
    }

    public function test_operator_desa_cannot_create_or_edit_kecamatan(): void
    {
        $operator = User::create([
            'name' => 'Operator Pitulua',
            'email' => 'op_pitulua@bps.go.id',
            'password' => Hash::make('secret123'),
            'role' => 'operator_desa',
            'kecamatan' => 'LASUSUA',
            'desa' => 'Pitulua',
        ]);

        $response = $this->actingAs($operator)->postJson('/admin/kecamatan/save', [
            'nama' => 'Lasusua Utara',
            'ipd' => 75.0,
            'status_ipd' => 'Mandiri',
        ]);

        $response->assertStatus(403)
            ->assertJson(['success' => false]);
    }

    public function test_admin_sidebar_displays_master_kecamatan_and_loads_portal_agregat_data(): void
    {
        $admin = User::create([
            'name' => 'Administrator Desa Madani',
            'email' => 'admin@bps.go.id',
            'password' => Hash::make('bps7408'),
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200)
            ->assertSee('id="tabBtnKecamatan"', false)
            ->assertSee('Master Kecamatan')
            ->assertSee('/images/kecamatan/katoi.jpg')
            ->assertSee('7.408 Jiwa');
    }

    public function test_admin_can_input_new_kecamatan_and_syncs_to_admin_and_portal(): void
    {
        $admin = User::create([
            'name' => 'Administrator Desa Madani',
            'email' => 'admin@bps.go.id',
            'password' => Hash::make('bps7408'),
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->postJson('/admin/kecamatan/save', [
            'nama' => 'Lasusua Utara',
            'tag' => 'Koridor Bahari Utara',
            'ipd' => 76.5,
            'status_ipd' => 'Mandiri',
            'komoditas_dominan' => 'Kakao & Pala',
            'komoditas' => 'Kakao, Pala, Kelapa',
            'potensi_utama' => 'Agribisnis Terpadu Pesisir Utara',
            'produk_unggulan' => 'Cokelat Fermentasi, Sirup Pala',
            'produk_unggulan_desa_count' => 3,
            'penduduk_l' => 2500,
            'penduduk_p' => 2400,
            'penduduk_total' => 4900,
            'imk' => 88,
            'bumdes' => 5,
            'total_sekolah' => 12,
            'total_faskes' => 7,
            'pln_kk' => 1150,
            'desa_count' => 5,
            'odtw' => 'Pantai Pasir Putih Utara',
            'lat' => -3.485,
            'lng' => 120.915,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'mode' => 'create',
                'total_kecamatan' => 16,
                'kecamatan' => [
                    'nama' => 'Lasusua Utara',
                    'kode' => '74.08.16',
                    'status_ipd' => 'Mandiri',
                    'penduduk_total' => 4900,
                    'imk' => 88,
                    'bumdes' => 5,
                ],
            ]);

        $savedMaster = json_decode(file_get_contents($this->podesMasterPath), true);
        $this->assertCount(16, $savedMaster);

        $adminPage = $this->actingAs($admin)->get('/admin');
        $adminPage->assertStatus(200)
            ->assertSee('Lasusua Utara')
            ->assertSee('4.900 Jiwa');

        $portalPage = $this->get('/portal/agregat');
        $portalPage->assertStatus(200)
            ->assertSee('Lasusua Utara')
            ->assertSee('Koridor Bahari Utara')
            ->assertSee('16 Kecamatan');
    }

    public function test_admin_can_edit_kecamatan_photo_and_agregat_fields_across_portal(): void
    {
        $admin = User::create([
            'name' => 'Administrator Desa Madani',
            'email' => 'admin@bps.go.id',
            'password' => Hash::make('bps7408'),
            'role' => 'admin',
        ]);

        $operator = User::create([
            'name' => 'Operator Katoi',
            'email' => 'op_katoi@bps.go.id',
            'password' => Hash::make('secret123'),
            'role' => 'operator_desa',
            'kecamatan' => 'KATOI',
            'desa' => 'Katoi',
        ]);

        $pngBytes = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==');
        $fakePhoto = UploadedFile::fake()->createWithContent('katoi-baru.png', $pngBytes);

        $response = $this->actingAs($admin)->post('/admin/kecamatan/save', [
            'original_nama' => 'Katoi',
            'nama' => 'Katoi Jaya',
            'kode' => '74.08.13',
            'tag' => 'Kampung Kakao & Bahari Katoi Jaya',
            'foto_file' => $fakePhoto,
            'ipd' => 78.2,
            'status_ipd' => 'Mandiri',
            'komoditas_dominan' => 'Kakao Organik Super',
            'komoditas' => 'Kakao Fermentasi, Ikan Teri',
            'potensi_utama' => 'Kampung Nelayan & Agribisnis Kakao Modern',
            'produk_unggulan' => 'Cokelat Katoi, Abon Tuna',
            'produk_unggulan_desa_count' => 4,
            'penduduk_l' => 4200,
            'penduduk_p' => 4100,
            'penduduk_total' => 8300,
            'imk' => 95,
            'bumdes' => 14,
            'total_sekolah' => 19,
            'total_faskes' => 13,
            'pln_kk' => 2100,
            'desa_count' => 6,
            'odtw' => 'Pantai Berova Katoi Jaya',
            'lat' => -3.395,
            'lng' => 120.931,
        ], ['Accept' => 'application/json']);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'mode' => 'edit',
                'old_nama' => 'Katoi',
                'total_kecamatan' => 15,
                'kecamatan' => [
                    'nama' => 'Katoi Jaya',
                    'base_key' => 'Katoi',
                    'aliases' => ['Katoi'],
                    'penduduk_total' => 8300,
                    'imk' => 95,
                    'bumdes' => 14,
                ],
            ]);

        $uploadedFotoUrl = $response->json('kecamatan.foto');
        $this->assertIsString($uploadedFotoUrl);
        $this->assertStringStartsWith('/images/kecamatan/katoi-jaya-', $uploadedFotoUrl);

        $diskPath = public_path(ltrim($uploadedFotoUrl, '/'));
        $this->assertFileExists($diskPath);
        $this->createdUploadPaths[] = $diskPath;

        $this->assertDatabaseHas('users', [
            'id' => $operator->id,
            'kecamatan' => 'KATOI JAYA',
        ]);

        $portalPage = $this->get('/portal/agregat');
        $portalPage->assertStatus(200)
            ->assertSee('Katoi Jaya')
            ->assertSee($uploadedFotoUrl, false)
            ->assertSee('Kakao Organik Super');
    }

    public function test_duplicate_kecamatan_name_is_rejected(): void
    {
        $admin = User::create([
            'name' => 'Administrator Desa Madani',
            'email' => 'admin@bps.go.id',
            'password' => Hash::make('bps7408'),
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->postJson('/admin/kecamatan/save', [
            'nama' => 'lasusua',
            'ipd' => 75.0,
            'status_ipd' => 'Mandiri',
        ]);

        $response->assertStatus(422)
            ->assertJson(['success' => false]);
    }
}
