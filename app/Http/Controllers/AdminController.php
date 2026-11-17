<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display the Executive Admin Dashboard for Desa Madani.
     */
    public function index()
    {
        $admin = Auth::user();

        // 1. Load Podes Master Data
        $podesFile = database_path('data/podes_master.json');
        $kecamatanList = [];
        $flatDesaList = [];
        $stats = [
            'total_kecamatan' => 15,
            'total_desa' => 0,
            'mandiri_count' => 0,
            'maju_count' => 0,
            'berkembang_count' => 0,
            'komoditas_summary' => [],
        ];

        if (file_exists($podesFile)) {
            $kecamatanList = json_decode(file_get_contents($podesFile), true) ?: [];

            foreach ($kecamatanList as $kec) {
                $desaList = $kec['desaList'] ?? $kec['desa_list'] ?? [];
                foreach ($desaList as $desa) {
                    $stats['total_desa']++;
                    $status = strtolower($desa['status'] ?? ($kec['status_ipd'] ?? ''));

                    if (str_contains($status, 'mandiri')) {
                        $stats['mandiri_count']++;
                    } elseif (str_contains($status, 'maju')) {
                        $stats['maju_count']++;
                    } else {
                        $stats['berkembang_count']++;
                    }

                    $flatDesaList[] = [
                        'kode_kec' => $kec['kode'] ?? '',
                        'nama_kec' => $kec['nama'] ?? '',
                        'nama_desa' => $desa['nama'] ?? '-',
                        'ipd' => $desa['ipd'] ?? $kec['ipd'] ?? 70,
                        'status' => $desa['status'] ?? $kec['status_ipd'] ?? 'Berkembang',
                        'komoditas' => $desa['komoditas'] ?? $kec['komoditas'] ?? 'Kakao, Cengkeh',
                        'faskes' => $desa['faskes'] ?? 'Pustu/Poskesdes',
                        'listrik' => $desa['listrik'] ?? 'PLN 24 Jam',
                        'sinyal' => $desa['sinyal'] ?? '4G Telkomsel',
                        'lat' => $desa['lat'] ?? $kec['lat'] ?? -3.5,
                        'lng' => $desa['lng'] ?? $kec['lng'] ?? 120.9,
                    ];
                }
            }
        }

        // 2. Load PODES Catalog (11 modules and all monitored variables)
        $catalogFile = database_path('data/podes_catalog.json');
        $podesCatalog = file_exists($catalogFile) ? json_decode(file_get_contents($catalogFile), true) : [];

        // 3. Load System Users
        $users = User::latest()->get();

        return view('admin.dashboard', compact(
            'admin',
            'stats',
            'kecamatanList',
            'flatDesaList',
            'podesCatalog',
            'users'
        ));
    }

    /**
     * Get specific PODES table data for a chosen Desa & Kecamatan.
     */
    public function getPodesTableData(Request $request)
    {
        $module = $request->query('module', 'KETERANGAN UMUM DESA.xlsx');
        $table = $request->query('table', '1.1');
        $kecamatan = strtoupper($request->query('kecamatan', 'RANTEANGIN'));
        $desa = strtoupper($request->query('desa', ''));

        // If logged-in user is an Operator Desa, enforce their own wilayah
        $authUser = Auth::user();
        if ($authUser && $authUser->isOperatorDesa() && $authUser->desa) {
            $kecamatan = strtoupper($authUser->kecamatan);
            $desa = strtoupper($authUser->desa);
        }

        $dataPath = database_path('data/podes_all_tables.json');
        if (!file_exists($dataPath)) {
            return response()->json([
                'success' => false,
                'message' => 'Data PODES belum di-parse. Silakan sinkronkan terlebih dahulu.'
            ], 404);
        }

        $allData = json_decode(file_get_contents($dataPath), true) ?: [];
        $moduleData = $allData[$module] ?? null;
        if (!$moduleData || !isset($moduleData[$table])) {
            return response()->json([
                'success' => false,
                'message' => "Tabel {$table} pada modul {$module} tidak ditemukan."
            ], 404);
        }

        $tableData = $moduleData[$table];
        $columns = $tableData['columns'] ?? [];
        $rows = $tableData['rows'] ?? [];

        // Filter rows for the requested kecamatan
        $kecamatanRows = [];
        $desaRow = null;

        foreach ($rows as $r) {
            $rKec = strtoupper($r['kecamatan'] ?? '');
            if ($rKec === $kecamatan) {
                $kecamatanRows[] = $r;
                $rDesa = strtoupper($r['desa'] ?? '');
                if (!$r['is_total'] && ($rDesa === $desa || empty($desa))) {
                    if (!$desaRow) {
                        $desaRow = $r;
                    }
                }
            }
        }

        // Load monitoring items for this module & table
        $catalogPath = database_path('data/podes_catalog.json');
        $monitoringItems = [];
        if (file_exists($catalogPath)) {
            $catalog = json_decode(file_get_contents($catalogPath), true) ?: [];
            foreach ($catalog as $cat) {
                if ($cat['file'] === $module) {
                    foreach ($cat['monitoring'] as $m) {
                        $mTabel = trim($m['tabel'] ?? '');
                        if ($mTabel === $table || empty($mTabel) || str_contains($mTabel, $table)) {
                            $monitoringItems[] = $m;
                        }
                    }
                    break;
                }
            }
        }

        return response()->json([
            'success' => true,
            'module' => $module,
            'table' => $table,
            'title' => $tableData['title'] ?? "Tabel {$table}",
            'columns' => $columns,
            'desa_row' => $desaRow,
            'kecamatan_rows' => $kecamatanRows,
            'monitoring' => $monitoringItems,
        ]);
    }

    /**
     * Save modified PODES values for a specific Desa.
     */
    public function savePodesData(Request $request)
    {
        $validated = $request->validate([
            'module' => 'required|string',
            'table' => 'required|string',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'values' => 'required|array',
        ]);

        $module = $validated['module'];
        $table = $validated['table'];
        $kecamatan = strtoupper($validated['kecamatan']);
        $desa = strtoupper($validated['desa']);
        $newValues = $validated['values'];

        // Enforce lock for Operator Desa
        $authUser = Auth::user();
        if ($authUser && $authUser->isOperatorDesa() && $authUser->desa) {
            $kecamatan = strtoupper($authUser->kecamatan);
            $desa = strtoupper($authUser->desa);
        }

        $dataPath = database_path('data/podes_all_tables.json');
        if (!file_exists($dataPath)) {
            return response()->json(['success' => false, 'message' => 'File data tidak ditemukan.'], 404);
        }

        $allData = json_decode(file_get_contents($dataPath), true) ?: [];
        if (!isset($allData[$module][$table]['rows'])) {
            return response()->json(['success' => false, 'message' => 'Tabel tidak ditemukan.'], 404);
        }

        $found = false;
        foreach ($allData[$module][$table]['rows'] as &$r) {
            if (!$r['is_total'] && strtoupper($r['kecamatan']) === $kecamatan && strtoupper($r['desa']) === $desa) {
                foreach ($newValues as $col => $val) {
                    $r['values'][$col] = (string) $val;
                }
                $found = true;
                break;
            }
        }

        if ($found) {
            file_put_contents($dataPath, json_encode($allData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return response()->json([
                'success' => true,
                'message' => "Data Tabel {$table} untuk Desa {$desa} (Kec. {$kecamatan}) berhasil diperbarui!"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Data untuk Desa {$desa} tidak ditemukan di tabel ini."
        ], 404);
    }

    /**
     * Sync PODES files from storage/app/podes_raw.
     */
    public function syncPodesFiles()
    {
        $script = database_path('data/build_podes_tables_data.py');
        if (file_exists($script)) {
            shell_exec("python " . escapeshellarg($script));
        }

        return back()->with('success', '11 File Spreadsheet PODES berhasil disinkronkan ke basis data!');
    }

    /**
     * Store new system user (Admin or Operator Desa).
     */
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', 'string', 'in:admin,operator_desa'],
            'kecamatan' => ['nullable', 'string', 'max:100'],
            'desa' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:30'],
        ], [
            'name.required' => 'Nama operator / admin wajib diisi.',
            'email.required' => 'Alamat email atau username wajib diisi.',
            'email.unique' => 'Email atau username ini sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 6 karakter.',
            'role.required' => 'Peran akun wajib dipilih.',
        ]);

        if ($validated['role'] === 'operator_desa' && (empty($validated['kecamatan']) || empty($validated['desa']))) {
            return back()->with('error', 'Kecamatan dan Desa wajib dipilih untuk Akun Operator Desa.');
        }

        User::create([
            'name' => $validated['name'],
            'email' => strtolower($validated['email']),
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'kecamatan' => $validated['role'] === 'operator_desa' ? strtoupper($validated['kecamatan']) : null,
            'desa' => $validated['role'] === 'operator_desa' ? strtoupper($validated['desa']) : null,
            'phone' => $validated['phone'] ?? null,
        ]);

        $roleText = $validated['role'] === 'operator_desa' ? "Operator Desa {$validated['desa']}" : "Administrator BPS";
        return back()->with('success', "Akun {$roleText} ({$validated['name']}) berhasil ditambahkan!");
    }

    /**
     * Bulk generate accounts for all 133 Desa in Kolaka Utara.
     */
    public function generateAllVillageAccounts()
    {
        $podesFile = database_path('data/podes_master.json');
        if (!file_exists($podesFile)) {
            return back()->with('error', 'File podes_master.json tidak ditemukan.');
        }

        $kecamatanList = json_decode(file_get_contents($podesFile), true) ?: [];
        $createdCount = 0;
        $existingCount = 0;

        foreach ($kecamatanList as $kec) {
            $namaKec = $kec['nama'];
            $desaList = $kec['desaList'] ?? $kec['desa_list'] ?? [];

            foreach ($desaList as $d) {
                $namaDesa = $d['nama'];
                // Clean slug for email: desa.pitulua.lasusua@kolut.go.id
                $slugDesa = Str::slug($namaDesa, '');
                $slugKec = Str::slug($namaKec, '');
                $email = "desa.{$slugDesa}.{$slugKec}@kolut.go.id";

                $user = User::where('email', $email)->orWhere(function ($q) use ($namaKec, $namaDesa) {
                    $q->where('role', 'operator_desa')
                      ->where('kecamatan', strtoupper($namaKec))
                      ->where('desa', strtoupper($namaDesa));
                })->first();

                if (!$user) {
                    User::create([
                        'name' => "Operator {$namaDesa}",
                        'email' => $email,
                        'password' => Hash::make('bps7408'),
                        'role' => 'operator_desa',
                        'kecamatan' => strtoupper($namaKec),
                        'desa' => strtoupper($namaDesa),
                        'phone' => null,
                    ]);
                    $createdCount++;
                } else {
                    $existingCount++;
                }
            }
        }

        return back()->with('success', "Selesai! {$createdCount} akun Operator Desa berhasil digenerate otomatis (Default password: bps7408). {$existingCount} akun sudah ada.");
    }

    /**
     * Export all system users to CSV.
     */
    public function exportUsersCSV()
    {
        $users = User::orderBy('role')->orderBy('kecamatan')->orderBy('desa')->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="daftar_akun_pengguna_desa_madani.csv"',
        ];

        $callback = function () use ($users) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['No', 'Nama Lengkap', 'Email / Akun Login', 'Peran (Role)', 'Kecamatan', 'Desa / Kelurahan', 'Nomor HP', 'Default Password']);

            foreach ($users as $idx => $u) {
                fputcsv($file, [
                    $idx + 1,
                    $u->name,
                    $u->email,
                    $u->role === 'admin' ? 'Administrator BPS' : 'Operator Desa',
                    $u->kecamatan ?? 'Semua',
                    $u->desa ?? 'Semua',
                    $u->phone ?? '-',
                    $u->role === 'operator_desa' ? 'bps7408' : '(Tersandi)',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Delete user from system.
     */
    public function deleteUser(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $userName = $user->name;
        $user->delete();

        return back()->with('success', "Akun {$userName} berhasil dihapus.");
    }
}
