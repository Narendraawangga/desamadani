<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
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

        // 1. Load Enriched Podes Master Data (merged with PODES 2025 portal aggregates & images)
        $kecamatanList = self::getEnrichedKecamatanList();
        $flatDesaList = [];
        $stats = [
            'total_kecamatan' => count($kecamatanList),
            'total_desa' => 0,
            'mandiri_count' => 0,
            'maju_count' => 0,
            'berkembang_count' => 0,
            'komoditas_summary' => [],
        ];

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

        // Collect existing Kecamatan image paths for quick picker
        $kecamatanGallery = self::getKecamatanImageGallery();

        // 2. Load PODES Catalog (11 modules and all monitored variables)
        $catalogFile = database_path('data/podes_catalog.json');
        $podesCatalog = file_exists($catalogFile) ? json_decode(file_get_contents($catalogFile), true) : [];

        // 3. Load System Users
        $users = User::latest()->get();

        // 4. Data dashboard Desa Cantik (DESCAN)
        $descan = $this->buildDescanData($admin, $kecamatanList);

        // 5. Data Ringkasan Agregat Kabupaten (/portal/agregat & /portal)
        $portalAggregate = self::getPortalAggregateSummary($kecamatanList);

        return view('admin.dashboard', compact(
            'admin',
            'stats',
            'kecamatanList',
            'kecamatanGallery',
            'flatDesaList',
            'podesCatalog',
            'users',
            'descan',
            'portalAggregate'
        ));
    }

    /**
     * Get PODES Catalog list for public portal and admin workspace.
     */
    public function getPodesCatalog()
    {
        $catalogPath = database_path('data/podes_catalog.json');
        $catalog = file_exists($catalogPath) ? json_decode(file_get_contents($catalogPath), true) : [];
        return response()->json([
            'success' => true,
            'catalog' => $catalog,
        ]);
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
        $cleanKecTarget = str_replace([' ', '-', '_'], '', $kecamatan);
        $cleanDesaTarget = preg_replace('/^(DESA|KELURAHAN)\s+/i', '', $desa);

        $isAllKec = empty($kecamatan) || $kecamatan === 'ALL';
        foreach ($rows as $r) {
            $rKec = strtoupper($r['kecamatan'] ?? '');
            $cleanRKec = str_replace([' ', '-', '_'], '', $rKec);
            if ($isAllKec || $cleanRKec === $cleanKecTarget || $rKec === $kecamatan) {
                $kecamatanRows[] = $r;
                $rDesa = strtoupper($r['desa'] ?? '');
                $cleanRDesa = preg_replace('/^(DESA|KELURAHAN)\s+/i', '', $rDesa);
                if (!$r['is_total'] && ($cleanRDesa === $cleanDesaTarget || $rDesa === $desa || empty($desa))) {
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
            'all_rows' => $rows,
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
        $cleanKecTarget = str_replace([' ', '-', '_'], '', $kecamatan);
        $cleanDesaTarget = preg_replace('/^(DESA|KELURAHAN)\s+/i', '', $desa);

        foreach ($allData[$module][$table]['rows'] as &$r) {
            if (!empty($r['desa']) && !$r['is_total']) {
                $cleanRKec = str_replace([' ', '-', '_'], '', strtoupper($r['kecamatan'] ?? ''));
                $cleanRDesa = preg_replace('/^(DESA|KELURAHAN)\s+/i', '', strtoupper($r['desa'] ?? ''));
                if (($cleanRKec === $cleanKecTarget || strtoupper($r['kecamatan']) === $kecamatan) &&
                    ($cleanRDesa === $cleanDesaTarget || strtoupper($r['desa']) === $desa)) {
                    foreach ($newValues as $col => $val) {
                        $r['values'][$col] = (string) $val;
                    }
                    $found = true;
                    break;
                }
            }
        }

        if ($found) {
            file_put_contents($dataPath, json_encode($allData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            // Integrasi otomatis: sinkronkan langsung ke dataset publik /portal/peta
            $syncResult = $this->syncPodesToPortal($module, $table, $kecamatan, $desa, $newValues);

            return response()->json([
                'success' => true,
                'message' => "Data Tabel {$table} untuk Desa {$desa} (Kec. {$kecamatan}) berhasil diperbarui dan langsung disinkronkan ke /portal/peta!",
                'synced_to_portal' => $syncResult['success'] ?? true,
                'sync_detail' => $syncResult['message'] ?? '',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Data untuk Desa {$desa} tidak ditemukan di tabel ini."
        ], 404);
    }

    /**
     * Action endpoint untuk sinkronisasi manual ke /portal/peta.
     */
    public function syncPodesToPortalAction(Request $request): JsonResponse
    {
        $result = $this->syncPodesToPortal();
        return response()->json($result, $result['success'] ? 200 : 500);
    }

    /**
     * Sinkronisasi data tabular PODES ke dataset resmi /portal/peta (complete JSON & JS).
     */
    public function syncPodesToPortal(?string $module = null, ?string $table = null, ?string $kecamatan = null, ?string $desa = null, ?array $newValues = null): array
    {
        $completeJsonPath = public_path('data/podes_kolut_complete_2025.json');
        $completeJsPath = public_path('data/podes_kolut_complete_2025.js');
        if (!file_exists($completeJsonPath)) {
            return ['success' => false, 'message' => 'File podes_kolut_complete_2025.json tidak ditemukan.'];
        }

        $complete = json_decode(file_get_contents($completeJsonPath), true) ?: [];
        if (empty($complete['desa'])) {
            return ['success' => false, 'message' => 'Struktur desa pada complete JSON kosong.'];
        }

        // Pastikan kecamatanList dan desaList tersedia
        if (!isset($complete['kecamatanList']) || !isset($complete['desaList'])) {
            if (file_exists($completeJsPath)) {
                $jsContent = file_get_contents($completeJsPath);
                if (!isset($complete['kecamatanList']) && preg_match('/const KECAMATAN_LIST = (\[.*?\]);\s*const DESA_LIST/s', $jsContent, $mKec)) {
                    $complete['kecamatanList'] = json_decode($mKec[1], true);
                }
                if (!isset($complete['desaList']) && preg_match('/const DESA_LIST = (\[.*?\]);\s*\/\/\s*Attach/s', $jsContent, $mDesa)) {
                    $complete['desaList'] = json_decode($mDesa[1], true);
                }
            }
        }

        // 1. Jika ada data spesifik yang diupdate, perbarui langsung record terkait
        if ($kecamatan && $desa && $newValues !== null) {
            $cleanKec = strtoupper(str_replace([' ', '-', '_'], '', $kecamatan));
            $cleanDesa = strtoupper(preg_replace('/^(DESA|KELURAHAN)\s+/i', '', trim($desa)));

            // Update di $complete['desa']
            foreach ($complete['desa'] as &$d) {
                $dKec = strtoupper(str_replace([' ', '-', '_'], '', $d['kecamatan'] ?? ''));
                $dDesa = strtoupper(preg_replace('/^(DESA|KELURAHAN)\s+/i', '', trim($d['nama'] ?? '')));
                if (($dKec === $cleanKec || strtoupper($d['kecamatan'] ?? '') === $kecamatan) &&
                    ($dDesa === $cleanDesa || strtoupper($d['nama'] ?? '') === $desa)) {
                    $this->applyValuesToCompleteDesa($d, $module, $table, $newValues);
                    break;
                }
            }
            unset($d);

            // Update di $complete['kecamatan'][$kec]['desa_list']
            $matchingKecKey = null;
            foreach (array_keys($complete['kecamatan'] ?? []) as $kKey) {
                if (str_replace([' ', '-', '_'], '', strtoupper($kKey)) === $cleanKec) {
                    $matchingKecKey = $kKey;
                    break;
                }
            }
            if ($matchingKecKey && isset($complete['kecamatan'][$matchingKecKey]['desa_list'])) {
                foreach ($complete['kecamatan'][$matchingKecKey]['desa_list'] as &$d) {
                    $dDesa = strtoupper(preg_replace('/^(DESA|KELURAHAN)\s+/i', '', trim($d['nama'] ?? '')));
                    if ($dDesa === $cleanDesa || strtoupper($d['nama'] ?? '') === $desa) {
                        $this->applyValuesToCompleteDesa($d, $module, $table, $newValues);
                        break;
                    }
                }
                unset($d);
            }

            // Update di $complete['desaList'] (format camelCase untuk PresisiEngine)
            if (!empty($complete['desaList'])) {
                foreach ($complete['desaList'] as &$d) {
                    $dKec = strtoupper(str_replace([' ', '-', '_'], '', $d['kecamatan'] ?? ''));
                    $dDesa = strtoupper(preg_replace('/^(DESA|KELURAHAN)\s+/i', '', trim($d['nama'] ?? '')));
                    if (($dKec === $cleanKec || strtoupper($d['kecamatan'] ?? '') === $kecamatan) &&
                        ($dDesa === $cleanDesa || strtoupper($d['nama'] ?? '') === $desa)) {
                        $this->applyValuesToDesaListItem($d, $module, $table, $newValues);
                        break;
                    }
                }
                unset($d);
            }
        }

        // 2. Rekalkulasi agregat seluruh kecamatan dan kabupaten
        $this->recalculateCompleteAggregates($complete);

        // 3. Simpan pembaruan ke podes_kolut_complete_2025.json
        file_put_contents($completeJsonPath, json_encode($complete, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

        // 4. Kompilasi ulang podes_kolut_complete_2025.js untuk grafik publik /portal/peta
        $this->compileCompleteJs($complete, $completeJsPath);

        return [
            'success' => true,
            'message' => 'Dataset resmi /portal/peta berhasil disinkronkan (15 Kecamatan & 133 Desa).',
        ];
    }

    /**
     * Menerapkan nilai baru ke struktur desa pada complete JSON.
     */
    protected function applyValuesToCompleteDesa(array &$d, ?string $module, ?string $table, array $newValues): void
    {
        $modUpper = strtoupper($module ?? '');

        // 1. IMK & Sentra (Tabel 5.6)
        if ((str_contains($modUpper, 'SARANA EKONOMI') || str_contains($modUpper, 'INDUSTRI')) && $table === '5.6') {
            if (isset($newValues['B']) && is_numeric($newValues['B'])) {
                $d['ekonomi']['imk'] = (int) $newValues['B'];
            }
            if (isset($newValues['C']) && is_numeric($newValues['C'])) {
                $d['ekonomi']['sentra'] = (int) $newValues['C'];
            }
        }

        // 2. Sarana Perdagangan & Akomodasi (Tabel 5.1)
        if ((str_contains($modUpper, 'SARANA EKONOMI') || str_contains($modUpper, 'INDUSTRI')) && $table === '5.1') {
            if (isset($newValues['B']) && is_numeric($newValues['B'])) $d['ekonomi']['minimarket'] = (int) $newValues['B'];
            if (isset($newValues['C']) && is_numeric($newValues['C'])) $d['ekonomi']['resto'] = (int) $newValues['C'];
            if (isset($newValues['D']) && is_numeric($newValues['D'])) $d['ekonomi']['hotel'] = (int) $newValues['D'];
            if (isset($newValues['E']) && is_numeric($newValues['E'])) $d['ekonomi']['penginapan'] = (int) $newValues['E'];
        }

        // 3. Pertokoan & Pasar (Tabel 5.2)
        if ((str_contains($modUpper, 'SARANA EKONOMI') || str_contains($modUpper, 'INDUSTRI')) && $table === '5.2') {
            if (isset($newValues['B']) && is_numeric($newValues['B'])) $d['ekonomi']['pertokoan'] = (int) $newValues['B'];
            if (isset($newValues['C']) && is_numeric($newValues['C'])) $d['ekonomi']['pasar_perm'] = (int) $newValues['C'];
            if (isset($newValues['D']) && is_numeric($newValues['D'])) $d['ekonomi']['pasar_semi'] = (int) $newValues['D'];
            if (isset($newValues['E']) && is_numeric($newValues['E'])) $d['ekonomi']['pasar_tanpa'] = (int) $newValues['E'];
        }

        // 4. Listrik & Lingkungan (Tabel 2.1)
        if (str_contains($modUpper, 'PERUMAHAN') && $table === '2.1') {
            if (isset($newValues['B']) && is_numeric($newValues['B'])) $d['lingkungan']['pln_kk'] = (int) $newValues['B'];
            if (isset($newValues['C']) && is_numeric($newValues['C'])) $d['lingkungan']['non_pln_kk'] = (int) $newValues['C'];
            if (isset($newValues['D']) && is_numeric($newValues['D'])) $d['lingkungan']['tanpa_listrik_kk'] = (int) $newValues['D'];
        }

        // 5. Kesehatan & Posyandu (Tabel 3.2 & 3.3)
        if (str_contains($modUpper, 'KESEHATAN') && ($table === '3.2' || $table === '10.1')) {
            $faskesCols = ['B' => 'rs', 'C' => 'puskesmas_inap', 'D' => 'puskesmas_non', 'E' => 'pustu', 'F' => 'poskesdes', 'G' => 'polindes', 'H' => 'apotek'];
            foreach ($faskesCols as $col => $key) {
                if (isset($newValues[$col]) && is_numeric($newValues[$col])) {
                    $d['kesehatan'][$key] = (int) $newValues[$col];
                }
            }
            $d['kesehatan']['total_faskes'] = ($d['kesehatan']['rs'] ?? 0) + ($d['kesehatan']['puskesmas_inap'] ?? 0) + ($d['kesehatan']['puskesmas_non'] ?? 0) + ($d['kesehatan']['pustu'] ?? 0) + ($d['kesehatan']['poskesdes'] ?? 0) + ($d['kesehatan']['polindes'] ?? 0) + ($d['kesehatan']['apotek'] ?? 0);
        }
        if (str_contains($modUpper, 'KESEHATAN') && $table === '3.3') {
            if (isset($newValues['B']) && is_numeric($newValues['B'])) $d['kesehatan']['posyandu_aktif'] = (int) $newValues['B'];
            if (isset($newValues['C']) && is_numeric($newValues['C'])) $d['kesehatan']['posbindu'] = (int) $newValues['C'];
        }

        // 6. Pendidikan (Tabel 3.1)
        if (str_contains($modUpper, 'PENDIDIKAN') && ($table === '3.1' || $table === '9.1')) {
            $schCols = ['B' => 'tk', 'C' => 'sd_neg', 'D' => 'sd_swas', 'E' => 'smp_neg', 'F' => 'smp_swas', 'G' => 'sma_neg', 'H' => 'sma_swas', 'I' => 'smk_neg'];
            foreach ($schCols as $col => $key) {
                if (isset($newValues[$col]) && is_numeric($newValues[$col])) {
                    $d['pendidikan'][$key] = (int) $newValues[$col];
                }
            }
            $d['pendidikan']['total_sekolah'] = ($d['pendidikan']['tk'] ?? 0) + ($d['pendidikan']['sd_neg'] ?? 0) + ($d['pendidikan']['sd_swas'] ?? 0) + ($d['pendidikan']['smp_neg'] ?? 0) + ($d['pendidikan']['smp_swas'] ?? 0) + ($d['pendidikan']['sma_neg'] ?? 0) + ($d['pendidikan']['sma_swas'] ?? 0) + ($d['pendidikan']['smk_neg'] ?? 0);
        }

        // 7. Aparatur Desa (Tabel 7.1)
        if (str_contains($modUpper, 'PEMERINTAH') && $table === '7.1') {
            if (isset($newValues['B']) && is_numeric($newValues['B'])) $d['pemerintahan']['kades'] = (int) $newValues['B'];
            if (isset($newValues['C']) && is_numeric($newValues['C'])) $d['pemerintahan']['sekdes'] = (int) $newValues['C'];
            if (isset($newValues['D']) && is_numeric($newValues['D'])) $d['pemerintahan']['kadus'] = (int) $newValues['D'];
            if (isset($newValues['E']) && is_numeric($newValues['E'])) $d['pemerintahan']['kaur_kasi'] = (int) $newValues['E'];
            if (isset($newValues['F']) && is_numeric($newValues['F'])) {
                $d['pemerintahan']['total_aparat'] = (int) $newValues['F'];
            } else {
                $d['pemerintahan']['total_aparat'] = ($d['pemerintahan']['kades'] ?? 0) + ($d['pemerintahan']['sekdes'] ?? 0) + ($d['pemerintahan']['kadus'] ?? 0) + ($d['pemerintahan']['kaur_kasi'] ?? 0);
            }
        }

        // 8. BUMDes (Tabel 6.3)
        if (str_contains($modUpper, 'KEUANGAN') && $table === '6.3') {
            if (isset($newValues['B'])) {
                $v = $newValues['B'];
                $d['pemerintahan']['bumdes'] = is_numeric($v) ? (int) $v : (strtolower(trim((string)$v)) === 'ada' ? 1 : 0);
            }
        }

        // 9. Demografi (Tabel 2.1 Kependudukan)
        if (str_contains($modUpper, 'KEPENDUDUKAN') && $table === '2.1') {
            if (isset($newValues['B']) && is_numeric($newValues['B'])) $d['demografi']['penduduk_l'] = (int) $newValues['B'];
            if (isset($newValues['C']) && is_numeric($newValues['C'])) $d['demografi']['penduduk_p'] = (int) $newValues['C'];
            if (isset($newValues['D']) && is_numeric($newValues['D'])) $d['demografi']['penduduk_total'] = (int) $newValues['D'];
            if (isset($newValues['F']) && is_numeric($newValues['F'])) $d['demografi']['kepadatan_km2'] = (float) $newValues['F'];
            if (isset($newValues['G']) && is_numeric($newValues['G'])) $d['demografi']['sex_ratio'] = (float) $newValues['G'];
        }

        // 10. Status Pemerintahan (Tabel 1.1)
        if (str_contains($modUpper, 'UMUM') && $table === '1.1') {
            if (isset($newValues['C']) && (int) $newValues['C'] > 0) {
                $d['status'] = 'Kelurahan';
            } elseif (isset($newValues['B']) && (int) $newValues['B'] > 0) {
                $d['status'] = 'Desa';
            }
        }
    }

    /**
     * Menerapkan nilai baru ke struktur desaList (camelCase) yang dipakai desa_presisi_engine.js.
     */
    protected function applyValuesToDesaListItem(array &$d, ?string $module, ?string $table, array $newValues): void
    {
        $modUpper = strtoupper($module ?? '');

        // IMK
        if ((str_contains($modUpper, 'SARANA EKONOMI') || str_contains($modUpper, 'INDUSTRI')) && $table === '5.6') {
            if (isset($newValues['B']) && is_numeric($newValues['B'])) {
                $d['ekonomi']['ikm'] = (int) $newValues['B'];
            }
        }

        // Listrik PLN
        if (str_contains($modUpper, 'PERUMAHAN') && $table === '2.1') {
            if (isset($newValues['B']) && is_numeric($newValues['B'])) {
                $d['lingkungan']['pln'] = (int) $newValues['B'];
            }
        }

        // Pasar permanen & semi permanen
        if ((str_contains($modUpper, 'SARANA EKONOMI') || str_contains($modUpper, 'INDUSTRI')) && $table === '5.2') {
            if (isset($newValues['C']) && is_numeric($newValues['C'])) $d['ekonomi']['pasarPerm'] = (int) $newValues['C'];
            if (isset($newValues['D']) && is_numeric($newValues['D'])) $d['ekonomi']['pasarSemi'] = (int) $newValues['D'];
            if (isset($newValues['B']) && is_numeric($newValues['B'])) $d['ekonomi']['toko'] = (int) $newValues['B'];
        }

        // Total Aparat
        if (str_contains($modUpper, 'PEMERINTAH') && $table === '7.1') {
            if (isset($newValues['F']) && is_numeric($newValues['F'])) {
                $d['pemerintah']['totalAparat'] = (int) $newValues['F'];
            }
        }

        // BUMDes
        if (str_contains($modUpper, 'KEUANGAN') && $table === '6.3') {
            if (isset($newValues['B'])) {
                $v = $newValues['B'];
                $d['keuangan']['bumdes'] = is_numeric($v) ? (int) $v : (strtolower(trim((string)$v)) === 'ada' ? 1 : 0);
            }
        }

        // Total Penduduk
        if (str_contains($modUpper, 'KEPENDUDUKAN') && $table === '2.1') {
            if (isset($newValues['D']) && is_numeric($newValues['D'])) {
                $d['penduduk'] = (int) $newValues['D'];
            }
        }
    }

    /**
     * Hitung ulang agregat Kecamatan & Kabupaten agar sinkron sempurna.
     */
    protected function recalculateCompleteAggregates(array &$complete): void
    {
        $desaArr = $complete['desa'] ?? [];
        if (empty($desaArr)) return;

        // Group desa per kecamatan
        $kecGroup = [];
        foreach ($desaArr as $d) {
            $kecName = strtoupper($d['kecamatan'] ?? '');
            if (!isset($kecGroup[$kecName])) $kecGroup[$kecName] = [];
            $kecGroup[$kecName][] = $d;
        }

        $kabTotImk = 0;
        $kabTotPln = 0;
        $kabTotFaskes = 0;
        $kabTotSekolah = 0;
        $kabTotAparat = 0;
        $kabTotBumdes = 0;
        $kabTotPenduduk = 0;
        $kabTotPendudukL = 0;
        $kabTotPendudukP = 0;

        foreach ($complete['kecamatan'] as $kKey => &$kObj) {
            $cleanKKey = strtoupper(str_replace([' ', '-', '_'], '', $kKey));
            $villages = [];
            foreach ($kecGroup as $gKec => $vList) {
                if (str_replace([' ', '-', '_'], '', $gKec) === $cleanKKey) {
                    $villages = $vList;
                    break;
                }
            }

            if (!empty($villages)) {
                $kImk = array_sum(array_map(fn($v) => (int) ($v['ekonomi']['imk'] ?? 0), $villages));
                $kPln = array_sum(array_map(fn($v) => (int) ($v['lingkungan']['pln_kk'] ?? 0), $villages));
                $kFaskes = array_sum(array_map(fn($v) => (int) ($v['kesehatan']['total_faskes'] ?? 0), $villages));
                $kSekolah = array_sum(array_map(fn($v) => (int) ($v['pendidikan']['total_sekolah'] ?? 0), $villages));
                $kAparat = array_sum(array_map(fn($v) => (int) ($v['pemerintahan']['total_aparat'] ?? 0), $villages));
                $kBumdes = array_sum(array_map(fn($v) => (int) ($v['pemerintahan']['bumdes'] ?? 0), $villages));
                $kPendTotal = array_sum(array_map(fn($v) => (int) ($v['demografi']['penduduk_total'] ?? 0), $villages));
                $kPendL = array_sum(array_map(fn($v) => (int) ($v['demografi']['penduduk_l'] ?? 0), $villages));
                $kPendP = array_sum(array_map(fn($v) => (int) ($v['demografi']['penduduk_p'] ?? 0), $villages));

                $kObj['imk'] = $kImk;
                $kObj['pln_kk'] = $kPln;
                $kObj['faskes'] = $kFaskes;
                $kObj['sekolah'] = $kSekolah;
                $kObj['aparat'] = $kAparat;
                $kObj['bumdes'] = $kBumdes;
                $kObj['penduduk_total'] = $kPendTotal;
                $kObj['penduduk_l'] = $kPendL;
                $kObj['penduduk_p'] = $kPendP;

                // Sync ke kecamatanList jika ada
                if (!empty($complete['kecamatanList'])) {
                    foreach ($complete['kecamatanList'] as &$kListItem) {
                        if (strcasecmp($kListItem['nama'] ?? '', $kObj['nama'] ?? '') === 0) {
                            $kListItem['ekonomi']['ikm'] = $kImk;
                            break;
                        }
                    }
                    unset($kListItem);
                }

                $kabTotImk += $kImk;
                $kabTotPln += $kPln;
                $kabTotFaskes += $kFaskes;
                $kabTotSekolah += $kSekolah;
                $kabTotAparat += $kAparat;
                $kabTotBumdes += $kBumdes;
                $kabTotPenduduk += $kPendTotal;
                $kabTotPendudukL += $kPendL;
                $kabTotPendudukP += $kPendP;
            }
        }
        unset($kObj);

        // Update Kabupaten Totals
        if (isset($complete['kabupaten'])) {
            $complete['kabupaten']['total_imk'] = $kabTotImk;
            $complete['kabupaten']['total_pln_kk'] = $kabTotPln;
            $complete['kabupaten']['total_faskes'] = $kabTotFaskes;
            $complete['kabupaten']['total_sekolah'] = $kabTotSekolah;
            $complete['kabupaten']['total_aparat'] = $kabTotAparat;
            $complete['kabupaten']['total_bumdes'] = $kabTotBumdes;
            $complete['kabupaten']['total_penduduk'] = $kabTotPenduduk;
            $complete['kabupaten']['total_penduduk_l'] = $kabTotPendudukL;
            $complete['kabupaten']['total_penduduk_p'] = $kabTotPendudukP;
            if (isset($complete['kabupaten']['ekonomi'])) {
                $complete['kabupaten']['ekonomi']['ikm'] = $kabTotImk;
            }
            if (isset($complete['kabupaten']['lingkungan'])) {
                $complete['kabupaten']['lingkungan']['pln'] = $kabTotPln;
            }
        }
    }

    /**
     * Kompilasi ulang file JavaScript podes_kolut_complete_2025.js.
     */
    protected function compileCompleteJs(array $complete, string $jsPath): void
    {
        $kabupatenJson = json_encode($complete['kabupaten'] ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $kecListJson = json_encode($complete['kecamatanList'] ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $desaListJson = json_encode($complete['desaList'] ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $kecMapJson = json_encode($complete['kecamatan'] ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $desaArrJson = json_encode($complete['desa'] ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $jsContent = <<<JS
/**
 * DATABASE RESMI PODES BPS 2025 KABUPATEN KOLAKA UTARA
 * Sumber: Potensi Desa (PODES) BPS 2025 Kabupaten Kolaka Utara (100% Terverifikasi)
 * Cakupan: 15 Kecamatan • 133 Desa/Kelurahan • 41 Tabel Statistik Resmi
 */
window.PODES_2025_DATABASE = (function() {
  const KABUPATEN_TOTALS = {$kabupatenJson};

  const KECAMATAN_LIST = {$kecListJson};

  const DESA_LIST = {$desaListJson};

  // Attach enriched master structures for multi-domain explorer
  const enrichedKecMap = {$kecMapJson};
  const enrichedDesaArr = {$desaArrJson};

  return {
    kabupaten: KABUPATEN_TOTALS,
    kabupatenOverview: KABUPATEN_TOTALS,
    kecamatanList: KECAMATAN_LIST,
    desaList: DESA_LIST,
    kecamatan: enrichedKecMap,
    desa: enrichedDesaArr
  };
})();

window.PODES_KOLUT_2025 = window.PODES_2025_DATABASE;
window.PODES_KOLUT_MASTER_2025 = window.PODES_2025_DATABASE;
window.PODES_KOLUT_MASTER = window.PODES_2025_DATABASE;

JS;

        file_put_contents($jsPath, $jsContent);
    }

    /**
     * Save / Update Master Data Potensi Desa (podes_master.json).
     */
    public function saveDesaMaster(Request $request)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|string|max:100',
            'nama_kec' => 'required|string|max:100',
            'ipd' => 'required|numeric|min:0|max:100',
            'status' => 'required|string|in:Mandiri,Maju,Berkembang',
            'komoditas' => 'nullable|string|max:255',
            'faskes' => 'nullable|string|max:255',
            'lat' => 'nullable|numeric|between:-90,90',
            'lng' => 'nullable|numeric|between:-180,180',
        ]);

        $authUser = Auth::user();
        if ($authUser && $authUser->isOperatorDesa() && $authUser->desa) {
            $validated['nama_kec'] = $authUser->kecamatan;
            $validated['nama_desa'] = $authUser->desa;
        }

        $podesFile = database_path('data/podes_master.json');
        if (!file_exists($podesFile)) {
            return response()->json(['success' => false, 'message' => 'File data podes_master.json tidak ditemukan.'], 404);
        }

        $kecamatanList = json_decode(file_get_contents($podesFile), true) ?: [];
        $kecNamaTarget = trim(strtoupper($validated['nama_kec']));
        $desaNamaTarget = trim(strtoupper($validated['nama_desa']));

        $kecFound = false;
        $desaFound = false;

        foreach ($kecamatanList as &$kec) {
            if (strtoupper($kec['nama']) === $kecNamaTarget) {
                $kecFound = true;
                if (!isset($kec['desaList']) || !is_array($kec['desaList'])) {
                    $kec['desaList'] = [];
                }

                foreach ($kec['desaList'] as &$d) {
                    if (strtoupper($d['nama']) === $desaNamaTarget) {
                        $d['ipd'] = (float) $validated['ipd'];
                        $d['status'] = $validated['status'];
                        if (!empty($validated['komoditas'])) $d['komoditas'] = $validated['komoditas'];
                        if (!empty($validated['faskes'])) $d['faskes'] = $validated['faskes'];
                        if (!empty($validated['lat'])) $d['lat'] = (float) $validated['lat'];
                        if (!empty($validated['lng'])) $d['lng'] = (float) $validated['lng'];
                        $desaFound = true;
                        break;
                    }
                }

                // Jika desa baru
                if (!$desaFound) {
                    $newDesa = [
                        'nama' => $validated['nama_desa'],
                        'status' => $validated['status'],
                        'sektor' => 'pertanian',
                        'lat' => !empty($validated['lat']) ? (float) $validated['lat'] : (float) ($kec['lat'] ?? -3.52),
                        'lng' => !empty($validated['lng']) ? (float) $validated['lng'] : (float) ($kec['lng'] ?? 120.98),
                        'topografi' => 'Dataran Rendah',
                        'penduduk' => 1500,
                        'kk' => 400,
                        'luas' => '12.0 km²',
                        'ipd' => (float) $validated['ipd'],
                        'potensi' => 'Potensi komoditas ' . ($validated['komoditas'] ?? 'Pertanian Rakyat'),
                        'komoditas' => $validated['komoditas'] ?? 'Kakao, Cengkeh',
                        'bumdes' => 'BUMDes Desa ' . $validated['nama_desa'],
                        'faskes' => $validated['faskes'] ?? 'Poskesdes',
                        'sekolah' => '1 SD Negeri',
                        'sinyal' => 'Listrik PLN 24 Jam, 4G Baik',
                    ];
                    $kec['desaList'][] = $newDesa;
                    $kec['desa_count'] = count($kec['desaList']);
                    $desaFound = true;
                }

                break;
            }
        }

        if (!$kecFound) {
            return response()->json([
                'success' => false,
                'message' => "Kecamatan {$validated['nama_kec']} tidak ditemukan di data master."
            ], 422);
        }

        file_put_contents($podesFile, json_encode($kecamatanList, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return response()->json([
            'success' => true,
            'message' => "Data Potensi Desa {$validated['nama_desa']} (Kec. {$validated['nama_kec']}) berhasil disimpan!",
            'desa' => [
                'nama_desa' => $validated['nama_desa'],
                'nama_kec' => $validated['nama_kec'],
                'ipd' => (float) $validated['ipd'],
                'status' => $validated['status'],
                'komoditas' => $validated['komoditas'] ?? '-',
                'faskes' => $validated['faskes'] ?? '-',
                'lat' => (float) ($validated['lat'] ?? 0),
                'lng' => (float) ($validated['lng'] ?? 0),
            ]
        ]);
    }

    /**
     * Load Kecamatan master data enriched with PODES 2025 portal aggregates & images.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function getEnrichedKecamatanList(): array
    {
        $podesFile = database_path('data/podes_master.json');
        if (!file_exists($podesFile)) {
            return [];
        }

        $masterList = json_decode(file_get_contents($podesFile), true) ?: [];
        $completeFile = public_path('data/podes_kolut_complete_2025.json');
        $completeKecMap = [];

        if (file_exists($completeFile)) {
            $completeJson = json_decode(file_get_contents($completeFile), true);
            if (is_array($completeJson) && isset($completeJson['kecamatan']) && is_array($completeJson['kecamatan'])) {
                $completeKecMap = $completeJson['kecamatan'];
            }
        }

        $enriched = [];
        foreach ($masterList as $idx => $kec) {
            if (!is_array($kec)) {
                continue;
            }
            $enriched[] = self::enrichSingleKecamatan($kec, $completeKecMap, $idx);
        }

        return $enriched;
    }

    /**
     * List local images available under public/images/kecamatan for Admin selection.
     *
     * @return array<int, string>
     */
    public static function getKecamatanImageGallery(): array
    {
        $dir = public_path('images/kecamatan');
        if (!is_dir($dir)) {
            return [];
        }

        $files = scandir($dir) ?: [];
        $gallery = [];
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            if (preg_match('/\.(jpe?g|png|webp)$/i', $file) === 1) {
                $gallery[] = '/images/kecamatan/' . $file;
            }
        }
        sort($gallery);

        return $gallery;
    }

    /**
     * Enrich one Kecamatan entry using PODES complete aggregates & portal metadata defaults.
     *
     * @param  array<string, mixed>  $kec
     * @param  array<string, array<string, mixed>>  $completeKecMap
     * @return array<string, mixed>
     */
    private static function enrichSingleKecamatan(array $kec, array $completeKecMap, int $fallbackOrder = 0): array
    {
        $portalMetaMap = [
            'KATOI' => ['foto' => '/images/kecamatan/katoi.jpg', 'tag' => 'Pesisir & Agribisnis Cengkeh', 'order' => 1],
            'LAMBAI' => ['foto' => '/images/kecamatan/lambai.jpg', 'tag' => 'Perkebunan & Panorama Perbukitan', 'order' => 2],
            'LASUSUA' => ['foto' => '/images/kecamatan/lasusua.jpg', 'tag' => 'Ibu Kota & Wisata Bahari', 'order' => 3],
            'KODEOHA' => ['foto' => '/images/kecamatan/kodeoha.jpg', 'tag' => 'Sentra Utama Kakao Rakyat', 'order' => 4],
            'BATU PUTIH' => ['foto' => '/images/kecamatan/batu-putih.jpg', 'tag' => 'Tebing Pesisir & Hasil Bumi', 'order' => 5],
            'RANTEANGIN' => ['foto' => '/images/kecamatan/ranteangin.jpg', 'tag' => 'Lumbung Sawah & Lembah', 'order' => 6],
            'WAWO' => ['foto' => '/images/kecamatan/wawo.jpg', 'tag' => 'Danau Biru & Gerbang Selatan', 'order' => 7],
            'TIWU' => ['foto' => '/images/kecamatan/tiwu.jpg', 'tag' => 'Kakao & Agroforestri', 'order' => 8],
            'NGAPA' => ['foto' => '/images/kecamatan/ngapa.jpg', 'tag' => 'Pusat Perdagangan & Kakao', 'order' => 9],
            'WATUNOHU' => ['foto' => '/images/kecamatan/watunohu.jpg', 'tag' => 'Koridor Kakao & Rempah Lada', 'order' => 10],
            'PAKUE' => ['foto' => '/images/kecamatan/pakue.jpg', 'tag' => 'Lanskap Teluk Bone & Perkebunan', 'order' => 11],
            'PAKUE UTARA' => ['foto' => '/images/kecamatan/pakue-utara.jpg', 'tag' => 'Sentra Olahan Kakao & Kelapa', 'order' => 12],
            'PAKUE TENGAH' => ['foto' => '/images/kecamatan/pakue-tengah.jpg', 'tag' => 'Perbukitan Alami & Rempah Lada', 'order' => 13],
            'POREHU' => ['foto' => '/images/kecamatan/porehu.jpg', 'tag' => 'Episentrum Industri Minyak Nilam', 'order' => 14],
            'TOLALA' => ['foto' => '/images/kecamatan/tolala.jpg', 'tag' => 'Ujung Utara Bahari & Lada', 'order' => 15],
        ];

        $collapse = static function (?string $str): string {
            return str_replace([' ', '-', '_'], '', mb_strtoupper(trim((string) $str)));
        };

        $candidates = array_filter([
            $kec['nama'] ?? null,
            $kec['base_key'] ?? null,
            ...((isset($kec['aliases']) && is_array($kec['aliases'])) ? $kec['aliases'] : []),
        ]);
        $candidateCollapsed = array_map($collapse, $candidates);

        // Find portal meta default
        $defaultMeta = null;
        foreach ($portalMetaMap as $metaKey => $metaVal) {
            if (in_array($collapse($metaKey), $candidateCollapsed, true)) {
                $defaultMeta = $metaVal;
                break;
            }
        }

        // Find matching complete PODES 2025 kecamatan record by name/aliases
        $completeKec = null;
        foreach ($completeKecMap as $ckKey => $ckVal) {
            if (in_array($collapse($ckKey), $candidateCollapsed, true) || in_array($collapse($ckVal['nama'] ?? ''), $candidateCollapsed, true)) {
                $completeKec = $ckVal;
                break;
            }
        }

        $sumL = 0;
        $sumP = 0;
        $sumImk = 0;
        $sumBumdes = 0;
        $sumSekolah = 0;
        $sumFaskes = 0;
        $sumPln = 0;
        $sumAparat = 0;
        $commCounts = [];
        $featuredProducts = [];
        $featuredDesaCount = 0;

        $completeDesaList = is_array($completeKec['desa_list'] ?? null) ? $completeKec['desa_list'] : [];
        foreach ($completeDesaList as $cd) {
            $sumL += (int) ($cd['demografi']['penduduk_l'] ?? 0);
            $sumP += (int) ($cd['demografi']['penduduk_p'] ?? 0);
            $sumImk += (int) ($cd['ekonomi']['imk'] ?? 0);
            $sumBumdes += (int) ($cd['pemerintahan']['bumdes'] ?? 0);
            $sumSekolah += (int) ($cd['pendidikan']['total_sekolah'] ?? 0);
            $sumFaskes += (int) ($cd['kesehatan']['total_faskes'] ?? 0);
            $sumPln += (int) ($cd['lingkungan']['pln_kk'] ?? 0);
            $sumAparat += (int) ($cd['pemerintahan']['total_aparat'] ?? 0);

            $comm = trim((string) ($cd['ekonomi']['komoditas'] ?? ''));
            if ($comm !== '' && $comm !== '-') {
                $commCounts[$comm] = ($commCounts[$comm] ?? 0) + 1;
            }

            $m = trim((string) ($cd['ekonomi']['prod_unggulan_makanan'] ?? ''));
            $nm = trim((string) ($cd['ekonomi']['prod_unggulan_non_makanan'] ?? ''));
            $hasProd = false;
            if ($m !== '' && $m !== '-') {
                $hasProd = true;
                if (!in_array($m, $featuredProducts, true)) {
                    $featuredProducts[] = $m;
                }
            }
            if ($nm !== '' && $nm !== '-') {
                $hasProd = true;
                if (!in_array($nm, $featuredProducts, true)) {
                    $featuredProducts[] = $nm;
                }
            }
            if ($hasProd) {
                $featuredDesaCount++;
            }
        }

        arsort($commCounts);
        $dominantCommFromDesa = (string) (array_key_first($commCounts) ?? '');

        $pendudukL = array_key_exists('penduduk_l', $kec) && $kec['penduduk_l'] !== null
            ? (int) $kec['penduduk_l']
            : ($sumL > 0 ? $sumL : (int) ($completeKec['penduduk_l'] ?? 0));
        $pendudukP = array_key_exists('penduduk_p', $kec) && $kec['penduduk_p'] !== null
            ? (int) $kec['penduduk_p']
            : ($sumP > 0 ? $sumP : (int) ($completeKec['penduduk_p'] ?? 0));
        $pendudukTotal = array_key_exists('penduduk_total', $kec) && $kec['penduduk_total'] !== null
            ? (int) $kec['penduduk_total']
            : ($pendudukL + $pendudukP);

        $desaArr = $kec['desaList'] ?? $kec['desa_list'] ?? [];
        $desaCount = isset($kec['desa_count']) && (int) $kec['desa_count'] > 0
            ? (int) $kec['desa_count']
            : (count($desaArr) > 0 ? count($desaArr) : count($completeDesaList));

        $kec['foto'] = !empty($kec['foto'])
            ? (string) $kec['foto']
            : ($defaultMeta['foto'] ?? '/images/jadesta/kebun_kakao_totallang.jpg');
        $kec['tag'] = !empty($kec['tag'])
            ? (string) $kec['tag']
            : ($defaultMeta['tag'] ?? (string) ($kec['potensi_utama'] ?? 'Potensi Wilayah Kolaka Utara'));
        $kec['portal_order'] = isset($kec['urutan']) && (int) $kec['urutan'] > 0
            ? (int) $kec['urutan']
            : ($defaultMeta['order'] ?? ($fallbackOrder + 16));
        $kec['desa_count'] = $desaCount;
        $kec['penduduk_l'] = $pendudukL;
        $kec['penduduk_p'] = $pendudukP;
        $kec['penduduk_total'] = $pendudukTotal;
        $kec['imk'] = array_key_exists('imk', $kec) && $kec['imk'] !== null
            ? (int) $kec['imk']
            : (int) ($completeKec['imk'] ?? $sumImk);
        $kec['bumdes'] = array_key_exists('bumdes', $kec) && $kec['bumdes'] !== null
            ? (int) $kec['bumdes']
            : (int) ($completeKec['bumdes'] ?? $sumBumdes);
        $kec['total_sekolah'] = array_key_exists('total_sekolah', $kec) && $kec['total_sekolah'] !== null
            ? (int) $kec['total_sekolah']
            : (int) ($completeKec['sekolah'] ?? $sumSekolah);
        $kec['total_faskes'] = array_key_exists('total_faskes', $kec) && $kec['total_faskes'] !== null
            ? (int) $kec['total_faskes']
            : (int) ($completeKec['faskes'] ?? $sumFaskes);
        $kec['pln_kk'] = array_key_exists('pln_kk', $kec) && $kec['pln_kk'] !== null
            ? (int) $kec['pln_kk']
            : (int) ($completeKec['pln_kk'] ?? $sumPln);
        $kec['aparat'] = array_key_exists('aparat', $kec) && $kec['aparat'] !== null
            ? (int) $kec['aparat']
            : (int) ($completeKec['aparat'] ?? $sumAparat);
        $kec['komoditas_dominan'] = !empty($kec['komoditas_dominan'])
            ? (string) $kec['komoditas_dominan']
            : ($dominantCommFromDesa !== '' ? $dominantCommFromDesa : (string) ($kec['komoditas'] ?? 'Kakao & Cengkeh'));
        $kec['produk_unggulan'] = array_key_exists('produk_unggulan', $kec) && $kec['produk_unggulan'] !== null
            ? (string) $kec['produk_unggulan']
            : implode(', ', array_slice($featuredProducts, 0, 8));
        $kec['produk_unggulan_desa_count'] = array_key_exists('produk_unggulan_desa_count', $kec) && $kec['produk_unggulan_desa_count'] !== null
            ? (int) $kec['produk_unggulan_desa_count']
            : $featuredDesaCount;

        return $kec;
    }

    /**
     * Create a new Kecamatan or update/rename an existing Kecamatan in PODES master data.
     */
    public function saveKecamatan(Request $request): JsonResponse
    {
        $authUser = Auth::user();
        if ($authUser === null || $authUser->isOperatorDesa()) {
            return response()->json([
                'success' => false,
                'message' => 'Hanya Administrator yang diizinkan menambah atau mengubah data Kecamatan.',
            ], 403);
        }

        $validated = $request->validate([
            'original_nama' => 'nullable|string|max:100',
            'nama' => 'required|string|max:100',
            'kode' => 'nullable|string|max:30',
            'ipd' => 'required|numeric|min:0|max:100',
            'status_ipd' => 'required|string|in:Mandiri,Maju,Berkembang',
            'tag' => 'nullable|string|max:150',
            'foto' => 'nullable|string|max:255',
            'foto_file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'komoditas' => 'nullable|string|max:255',
            'komoditas_dominan' => 'nullable|string|max:255',
            'potensi_utama' => 'nullable|string|max:255',
            'odtw' => 'nullable|string|max:255',
            'produk_unggulan' => 'nullable|string|max:500',
            'produk_unggulan_desa_count' => 'nullable|integer|min:0',
            'penduduk_total' => 'nullable|integer|min:0',
            'penduduk_l' => 'nullable|integer|min:0',
            'penduduk_p' => 'nullable|integer|min:0',
            'imk' => 'nullable|integer|min:0',
            'bumdes' => 'nullable|integer|min:0',
            'total_sekolah' => 'nullable|integer|min:0',
            'total_faskes' => 'nullable|integer|min:0',
            'pln_kk' => 'nullable|integer|min:0',
            'desa_count' => 'nullable|integer|min:0',
            'lat' => 'nullable|numeric|between:-90,90',
            'lng' => 'nullable|numeric|between:-180,180',
        ]);

        $newNama = trim($validated['nama']);
        if ($newNama === '') {
            return response()->json([
                'success' => false,
                'message' => 'Nama Kecamatan tidak boleh kosong.',
            ], 422);
        }

        $podesFile = database_path('data/podes_master.json');
        if (!file_exists($podesFile)) {
            return response()->json([
                'success' => false,
                'message' => 'File data podes_master.json tidak ditemukan.',
            ], 404);
        }

        $kecamatanList = json_decode(file_get_contents($podesFile), true) ?: [];
        $originalNama = trim((string) ($validated['original_nama'] ?? ''));
        $isEdit = $originalNama !== '';
        $editIndex = null;

        if ($isEdit) {
            foreach ($kecamatanList as $idx => $kec) {
                $existingNama = trim((string) ($kec['nama'] ?? ''));
                if (mb_strtoupper($existingNama) === mb_strtoupper($originalNama)) {
                    $editIndex = $idx;
                    break;
                }
            }

            if ($editIndex === null) {
                return response()->json([
                    'success' => false,
                    'message' => "Kecamatan {$originalNama} tidak ditemukan di data master.",
                ], 404);
            }
        }

        // Prevent duplicate Kecamatan names (case-insensitive)
        foreach ($kecamatanList as $idx => $kec) {
            if ($isEdit && $idx === $editIndex) {
                continue;
            }
            $existingNama = trim((string) ($kec['nama'] ?? ''));
            if (mb_strtoupper($existingNama) === mb_strtoupper($newNama)) {
                return response()->json([
                    'success' => false,
                    'message' => "Nama Kecamatan {$newNama} sudah terdaftar.",
                ], 422);
            }
        }

        // Handle uploaded Kecamatan card photo if present
        $uploadedFotoUrl = null;
        if ($request->hasFile('foto_file')) {
            $file = $request->file('foto_file');
            $targetDir = public_path('images/kecamatan');
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            $slug = Str::slug($newNama) ?: 'kecamatan';
            $ext = strtolower($file->getClientOriginalExtension() ?: 'jpg');
            $filename = $slug . '-' . time() . '-' . Str::lower(Str::random(4)) . '.' . $ext;
            $file->move($targetDir, $filename);
            $uploadedFotoUrl = '/images/kecamatan/' . $filename;
        }

        $oldNama = null;
        $savedKecamatan = [];

        if ($isEdit) {
            $oldNama = trim((string) ($kecamatanList[$editIndex]['nama'] ?? $originalNama));
            $aliases = $kecamatanList[$editIndex]['aliases'] ?? [];
            if (!is_array($aliases)) {
                $aliases = [];
            }
            if (!isset($kecamatanList[$editIndex]['base_key']) || trim((string) $kecamatanList[$editIndex]['base_key']) === '') {
                $kecamatanList[$editIndex]['base_key'] = $oldNama;
            }
            if (mb_strtoupper($oldNama) !== mb_strtoupper($newNama) && !in_array($oldNama, $aliases, true)) {
                $aliases[] = $oldNama;
            }
            $kecamatanList[$editIndex]['aliases'] = $aliases;
            $kecamatanList[$editIndex]['nama'] = $newNama;

            $kodeInput = trim((string) ($validated['kode'] ?? ''));
            if ($kodeInput !== '') {
                $kecamatanList[$editIndex]['kode'] = $kodeInput;
            }

            $kecamatanList[$editIndex]['ipd'] = (float) $validated['ipd'];
            $kecamatanList[$editIndex]['status_ipd'] = $validated['status_ipd'];

            if ($uploadedFotoUrl !== null) {
                $kecamatanList[$editIndex]['foto'] = $uploadedFotoUrl;
            } elseif (isset($validated['foto']) && trim((string) $validated['foto']) !== '') {
                $kecamatanList[$editIndex]['foto'] = trim((string) $validated['foto']);
            }

            if (array_key_exists('tag', $validated) && trim((string) $validated['tag']) !== '') {
                $kecamatanList[$editIndex]['tag'] = trim((string) $validated['tag']);
            }

            $komoditasInput = trim((string) ($validated['komoditas'] ?? ''));
            if ($komoditasInput !== '') {
                $kecamatanList[$editIndex]['komoditas'] = $komoditasInput;
            }

            if (array_key_exists('komoditas_dominan', $validated) && trim((string) $validated['komoditas_dominan']) !== '') {
                $kecamatanList[$editIndex]['komoditas_dominan'] = trim((string) $validated['komoditas_dominan']);
            }

            $potensiInput = trim((string) ($validated['potensi_utama'] ?? ''));
            if ($potensiInput !== '') {
                $kecamatanList[$editIndex]['potensi_utama'] = $potensiInput;
            }

            $odtwInput = trim((string) ($validated['odtw'] ?? ''));
            if ($odtwInput !== '') {
                $kecamatanList[$editIndex]['odtw'] = $odtwInput;
            }

            if (array_key_exists('produk_unggulan', $validated) && $validated['produk_unggulan'] !== null) {
                $kecamatanList[$editIndex]['produk_unggulan'] = trim((string) $validated['produk_unggulan']);
            }
            if (isset($validated['produk_unggulan_desa_count'])) {
                $kecamatanList[$editIndex]['produk_unggulan_desa_count'] = (int) $validated['produk_unggulan_desa_count'];
            }

            if (isset($validated['penduduk_l']) || isset($validated['penduduk_p']) || isset($validated['penduduk_total'])) {
                $hasL = isset($validated['penduduk_l']);
                $hasP = isset($validated['penduduk_p']);
                $hasTotal = isset($validated['penduduk_total']);
                $valL = $hasL ? (int) $validated['penduduk_l'] : (int) ($kecamatanList[$editIndex]['penduduk_l'] ?? 0);
                $valP = $hasP ? (int) $validated['penduduk_p'] : (int) ($kecamatanList[$editIndex]['penduduk_p'] ?? 0);

                if ($hasTotal && (!(isset($validated['penduduk_l']) && isset($validated['penduduk_p'])) || (int) $validated['penduduk_total'] !== ($valL + $valP))) {
                    $totalPop = (int) $validated['penduduk_total'];
                    $prevSum = $valL + $valP;
                    if ($prevSum > 0 && (!$hasL || !$hasP || $prevSum === (int) ($kecamatanList[$editIndex]['penduduk_total'] ?? $prevSum))) {
                        $valL = (int) round($totalPop * ($valL / $prevSum));
                        $valP = max(0, $totalPop - $valL);
                    }
                    $kecamatanList[$editIndex]['penduduk_total'] = $totalPop;
                    $kecamatanList[$editIndex]['penduduk_l'] = $valL;
                    $kecamatanList[$editIndex]['penduduk_p'] = $valP;
                } else {
                    $kecamatanList[$editIndex]['penduduk_l'] = $valL;
                    $kecamatanList[$editIndex]['penduduk_p'] = $valP;
                    $kecamatanList[$editIndex]['penduduk_total'] = $valL + $valP;
                }
            }

            foreach (['imk', 'bumdes', 'total_sekolah', 'total_faskes', 'pln_kk'] as $intField) {
                if (isset($validated[$intField])) {
                    $kecamatanList[$editIndex][$intField] = (int) $validated[$intField];
                }
            }

            if (array_key_exists('lat', $validated) && $validated['lat'] !== null) {
                $kecamatanList[$editIndex]['lat'] = (float) $validated['lat'];
            }
            if (array_key_exists('lng', $validated) && $validated['lng'] !== null) {
                $kecamatanList[$editIndex]['lng'] = (float) $validated['lng'];
            }

            $desaList = $kecamatanList[$editIndex]['desaList'] ?? $kecamatanList[$editIndex]['desa_list'] ?? [];
            $kecamatanList[$editIndex]['desa_count'] = isset($validated['desa_count']) && (int) $validated['desa_count'] > 0
                ? (int) $validated['desa_count']
                : count($desaList);
            $savedKecamatan = $kecamatanList[$editIndex];
        } else {
            $kodeInput = trim((string) ($validated['kode'] ?? ''));
            $kodeValue = $kodeInput !== '' ? $kodeInput : $this->generateNextKecamatanCode($kecamatanList);
            $valL = isset($validated['penduduk_l']) ? (int) $validated['penduduk_l'] : 0;
            $valP = isset($validated['penduduk_p']) ? (int) $validated['penduduk_p'] : 0;
            $valTotal = isset($validated['penduduk_total']) ? (int) $validated['penduduk_total'] : ($valL + $valP);
            if ($valTotal > 0 && $valL === 0 && $valP === 0) {
                $valL = (int) ceil($valTotal / 2);
                $valP = max(0, $valTotal - $valL);
            }

            $savedKecamatan = [
                'kode' => $kodeValue,
                'nama' => $newNama,
                'base_key' => $newNama,
                'aliases' => [],
                'foto' => $uploadedFotoUrl ?? (trim((string) ($validated['foto'] ?? '')) !== '' ? trim((string) $validated['foto']) : '/images/jadesta/kebun_kakao_totallang.jpg'),
                'tag' => trim((string) ($validated['tag'] ?? '')) !== '' ? trim((string) $validated['tag']) : 'Wilayah Kecamatan Baru',
                'lat' => isset($validated['lat']) && $validated['lat'] !== null ? (float) $validated['lat'] : -3.5291,
                'lng' => isset($validated['lng']) && $validated['lng'] !== null ? (float) $validated['lng'] : 120.9855,
                'ipd' => (float) $validated['ipd'],
                'status_ipd' => $validated['status_ipd'],
                'potensi_utama' => trim((string) ($validated['potensi_utama'] ?? '')) !== ''
                    ? trim((string) $validated['potensi_utama'])
                    : 'Pengembangan Ekonomi & Agribisnis Wilayah',
                'komoditas' => trim((string) ($validated['komoditas'] ?? '')) !== ''
                    ? trim((string) $validated['komoditas'])
                    : 'Kakao, Cengkeh, Kelapa',
                'komoditas_dominan' => trim((string) ($validated['komoditas_dominan'] ?? '')) !== ''
                    ? trim((string) $validated['komoditas_dominan'])
                    : (trim((string) ($validated['komoditas'] ?? '')) !== '' ? trim((string) $validated['komoditas']) : 'Kakao & Cengkeh'),
                'produk_unggulan' => trim((string) ($validated['produk_unggulan'] ?? '')),
                'produk_unggulan_desa_count' => isset($validated['produk_unggulan_desa_count']) ? (int) $validated['produk_unggulan_desa_count'] : 0,
                'penduduk_l' => $valL,
                'penduduk_p' => $valP,
                'penduduk_total' => $valTotal,
                'imk' => isset($validated['imk']) ? (int) $validated['imk'] : 0,
                'bumdes' => isset($validated['bumdes']) ? (int) $validated['bumdes'] : 0,
                'total_sekolah' => isset($validated['total_sekolah']) ? (int) $validated['total_sekolah'] : 0,
                'total_faskes' => isset($validated['total_faskes']) ? (int) $validated['total_faskes'] : 0,
                'pln_kk' => isset($validated['pln_kk']) ? (int) $validated['pln_kk'] : 0,
                'desa_count' => isset($validated['desa_count']) ? (int) $validated['desa_count'] : 0,
                'odtw' => trim((string) ($validated['odtw'] ?? '')) !== ''
                    ? trim((string) $validated['odtw'])
                    : '-',
                'desaList' => [],
            ];

            $kecamatanList[] = $savedKecamatan;
        }

        file_put_contents($podesFile, json_encode($kecamatanList, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        if ($isEdit && $oldNama !== null && mb_strtoupper($oldNama) !== mb_strtoupper($newNama)) {
            $this->propagateKecamatanRename($oldNama, $newNama);
        }

        $enrichedList = self::getEnrichedKecamatanList();
        $enrichedSaved = $savedKecamatan;
        foreach ($enrichedList as $item) {
            if (mb_strtoupper((string) ($item['nama'] ?? '')) === mb_strtoupper($newNama)) {
                $enrichedSaved = $item;
                break;
            }
        }

        return response()->json([
            'success' => true,
            'mode' => $isEdit ? 'edit' : 'create',
            'old_nama' => $oldNama,
            'total_kecamatan' => count($kecamatanList),
            'message' => $isEdit
                ? "Data Kecamatan {$newNama} berhasil diperbarui!"
                : "Kecamatan baru {$newNama} berhasil ditambahkan!",
            'kecamatan' => $enrichedSaved,
        ]);
    }

    /**
     * Generate the next Kemendagri-style 74.08.XX code for a new Kecamatan.
     *
     * @param  array<int, array<string, mixed>>  $kecamatanList
     */
    private function generateNextKecamatanCode(array $kecamatanList): string
    {
        $maxSuffix = 0;

        foreach ($kecamatanList as $kec) {
            $kode = trim((string) ($kec['kode'] ?? ''));
            if (preg_match('/^74\.08\.(\d+)$/', $kode, $matches) === 1) {
                $num = (int) $matches[1];
                if ($num > $maxSuffix) {
                    $maxSuffix = $num;
                }
            }
        }

        return sprintf('74.08.%02d', $maxSuffix + 1);
    }

    /**
     * Propagate a Kecamatan rename to Operator Desa user records and PODES tabular JSON.
     */
    private function propagateKecamatanRename(string $oldNama, string $newNama): void
    {
        $oldUpper = mb_strtoupper(trim($oldNama));
        $newUpper = mb_strtoupper(trim($newNama));
        $oldCollapsed = str_replace([' ', '-', '_'], '', $oldUpper);

        User::whereRaw('UPPER(kecamatan) = ?', [$oldUpper])
            ->update(['kecamatan' => $newUpper]);

        $dataPath = database_path('data/podes_all_tables.json');
        if (!file_exists($dataPath)) {
            return;
        }

        $allData = json_decode(file_get_contents($dataPath), true);
        if (!is_array($allData)) {
            return;
        }

        $dirty = false;
        foreach ($allData as &$moduleTables) {
            if (!is_array($moduleTables)) {
                continue;
            }
            foreach ($moduleTables as &$tableData) {
                if (!isset($tableData['rows']) || !is_array($tableData['rows'])) {
                    continue;
                }
                foreach ($tableData['rows'] as &$row) {
                    $rowKec = mb_strtoupper(trim((string) ($row['kecamatan'] ?? '')));
                    if ($rowKec === '') {
                        continue;
                    }
                    $rowCollapsed = str_replace([' ', '-', '_'], '', $rowKec);
                    if ($rowKec === $oldUpper || $rowCollapsed === $oldCollapsed) {
                        $row['kecamatan'] = $newUpper;
                        $dirty = true;
                    }
                }
            }
        }

        if ($dirty) {
            file_put_contents($dataPath, json_encode($allData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
    }

    /**
     * Sync PODES files from storage/app/podes_raw.
     */
    public function syncPodesFiles()
    {
        $scriptCatalog = database_path('data/build_podes_catalog.py');
        if (file_exists($scriptCatalog)) {
            shell_exec("python " . escapeshellarg($scriptCatalog));
        }

        $script = database_path('data/build_podes_tables_data.py');
        if (file_exists($script)) {
            shell_exec("python " . escapeshellarg($script));
        }

        return back()->with('success', '12 File Spreadsheet PODES berhasil disinkronkan ke basis data!');
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
            'role' => ['nullable', 'string', 'in:admin,operator_desa'],
            'kecamatan' => ['nullable', 'string', 'max:100'],
            'desa' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:30'],
        ], [
            'name.required' => 'Nama operator / admin wajib diisi.',
            'email.required' => 'Alamat email atau username wajib diisi.',
            'email.unique' => 'Email atau username ini sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 6 karakter.',
            'role.in' => 'Peran akun tidak valid.',
        ]);

        $role = $validated['role'] ?? 'admin';

        if ($role === 'operator_desa' && (empty($validated['kecamatan']) || empty($validated['desa']))) {
            return back()->with('error', 'Kecamatan dan Desa wajib dipilih untuk Akun Operator Desa.');
        }

        User::create([
            'name' => $validated['name'],
            'email' => strtolower($validated['email']),
            'password' => Hash::make($validated['password']),
            'role' => $role,
            'kecamatan' => $role === 'operator_desa' ? strtoupper($validated['kecamatan']) : null,
            'desa' => $role === 'operator_desa' ? strtoupper($validated['desa']) : null,
            'phone' => $validated['phone'] ?? null,
        ]);

        $roleText = $role === 'operator_desa' ? "Operator Desa {$validated['desa']}" : "Administrator BPS";
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

    /**
     * Data tampilan dashboard Desa Cantik (DESCAN).
     * Nilai kelengkapan, skor, agenda dan tim masih data contoh; ganti dengan
     * query database/tabel sendiri saat modulnya sudah tersedia.
     */
    private function buildDescanData($admin, array $kecamatanList): array
    {
        $desa = ($admin && $admin->isOperatorDesa() && $admin->desa) ? $admin->desa : 'Kalu Kaluku';
        $kecamatan = ($admin && $admin->isOperatorDesa() && $admin->kecamatan) ? $admin->kecamatan : 'Kodeoha';

        // IPD rata-rata per kecamatan (dari podes_master.json)
        $ipdKec = [];
        foreach ($kecamatanList as $kec) {
            $ipdKec[] = [
                'nama' => ucwords(strtolower($kec['nama'] ?? '-')),
                'ipd' => round((float) ($kec['ipd'] ?? 0), 2),
            ];
        }

        return [
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'indikator_terisi' => 41,
            'indikator_total' => 44,
            'kelengkapan' => [
                ['label' => 'Data Kependudukan & Ketenagakerjaan', 'terisi' => 12, 'total' => 12],
                ['label' => 'Perumahan, Sanitasi & Lingkungan Hidup', 'terisi' => 10, 'total' => 10],
                ['label' => 'Pertanian, Perkebunan & Perikanan Bahari', 'terisi' => 11, 'total' => 13],
                ['label' => 'Akses Transportasi & Sarana Komunikasi', 'terisi' => 6, 'total' => 9],
            ],
            'skor_tren' => [
                'labels' => ['Sesi 1', 'Sesi 2', 'Sesi 3', 'Sesi 4', 'Sesi 5'],
                'pretest' => [62, 68, 71, 74, 78],
                'posttest' => [74, 80, 84, 86, 88.5],
            ],
            'ipd_kecamatan' => $ipdKec,
        ];
    }

    /**
     * Build Kabupaten Kolaka Utara aggregate summary with optional Admin override.
     *
     * @param  array<int, array<string, mixed>>|null  $preloadedKecamatanList
     * @return array<string, mixed>
     */
    public static function getPortalAggregateSummary(?array $preloadedKecamatanList = null): array
    {
        $kecamatanList = $preloadedKecamatanList ?? self::getEnrichedKecamatanList();
        $totalKecamatan = count($kecamatanList);
        $totalDesa = 0;
        $totalL = 0;
        $totalP = 0;
        $totalJiwa = 0;
        $totalImk = 0;
        $totalPln = 0;
        $totalBumdes = 0;
        $totalSekolah = 0;
        $totalFaskes = 0;

        foreach ($kecamatanList as $kec) {
            if (!is_array($kec)) {
                continue;
            }
            $desaArr = $kec['desaList'] ?? $kec['desa_list'] ?? [];
            $totalDesa += isset($kec['desa_count']) ? (int) $kec['desa_count'] : count($desaArr);
            $kL = (int) ($kec['penduduk_l'] ?? 0);
            $kP = (int) ($kec['penduduk_p'] ?? 0);
            $kTot = (int) ($kec['penduduk_total'] ?? ($kL + $kP));
            $totalL += $kL;
            $totalP += $kP;
            $totalJiwa += $kTot;
            $totalImk += (int) ($kec['imk'] ?? 0);
            $totalPln += (int) ($kec['pln_kk'] ?? 0);
            $totalBumdes += (int) ($kec['bumdes'] ?? 0);
            $totalSekolah += (int) ($kec['total_sekolah'] ?? 0);
            $totalFaskes += (int) ($kec['total_faskes'] ?? 0);
        }

        if ($totalJiwa === 0) {
            $totalJiwa = $totalL + $totalP;
        }

        $kepadatanSum = 0.0;
        $kepadatanDesaCount = 0;
        $totalNonPln = 0;
        $totalTanpaListrik = 0;

        $completeFile = public_path('data/podes_kolut_complete_2025.json');
        if (file_exists($completeFile)) {
            $completeJson = json_decode((string) file_get_contents($completeFile), true);
            if (is_array($completeJson) && isset($completeJson['kecamatan']) && is_array($completeJson['kecamatan'])) {
                foreach ($completeJson['kecamatan'] as $ck) {
                    $desaItems = is_array($ck['desa_list'] ?? null) ? $ck['desa_list'] : [];
                    foreach ($desaItems as $cd) {
                        $rawKep = str_replace(',', '.', (string) ($cd['demografi']['kepadatan_km2'] ?? '0'));
                        $cleanKep = (float) preg_replace('/[^0-9.]/', '', $rawKep);
                        $kepadatanSum += $cleanKep;
                        $kepadatanDesaCount++;
                        $totalNonPln += (int) ($cd['lingkungan']['non_pln_kk'] ?? 0);
                        $totalTanpaListrik += (int) ($cd['lingkungan']['tanpa_listrik_kk'] ?? 0);
                    }
                }
            }
        }

        $avgKepadatan = $kepadatanDesaCount > 0 ? round($kepadatanSum / $kepadatanDesaCount, 1) : 241.8;
        $sexRatio = $totalP > 0 ? round(($totalL / $totalP) * 100, 1) : 100.0;
        $totalListrikKk = $totalPln + $totalNonPln + $totalTanpaListrik;
        $rasioListrik = $totalListrikKk > 0 ? round(($totalPln / $totalListrikKk) * 100, 2) : 99.55;

        $defaults = [
            'judul_ringkasan' => 'Ringkasan Agregat Kabupaten Kolaka Utara',
            'label_sumber' => 'BPS PODES 2025',
            'total_penduduk' => $totalJiwa,
            'total_penduduk_l' => $totalL,
            'total_penduduk_p' => $totalP,
            'kepadatan_rata' => $avgKepadatan,
            'total_kecamatan' => $totalKecamatan,
            'total_desa' => $totalDesa,
            'rasio_jenis_kelamin' => $sexRatio,
            'total_imk' => $totalImk,
            'rasio_listrik' => $rasioListrik,
            'total_pln_kk' => $totalPln,
            'total_bumdes' => $totalBumdes,
            'total_sekolah' => $totalSekolah,
            'total_faskes' => $totalFaskes,
        ];

        $overrideFile = database_path('data/portal_aggregate_override.json');
        $overrideData = [];
        $isCustom = false;
        $updatedAt = null;
        $updatedBy = null;

        if (file_exists($overrideFile)) {
            $parsed = json_decode((string) file_get_contents($overrideFile), true);
            if (is_array($parsed) && !empty($parsed['is_custom'])) {
                $isCustom = true;
                $overrideData = is_array($parsed['values'] ?? null) ? $parsed['values'] : [];
                $updatedAt = $parsed['updated_at'] ?? null;
                $updatedBy = $parsed['updated_by'] ?? null;
            }
        }

        $active = $defaults;
        if ($isCustom) {
            foreach ($overrideData as $key => $val) {
                if (array_key_exists($key, $active) && $val !== null && $val !== '') {
                    $active[$key] = $val;
                }
            }
        }

        return [
            'is_custom' => $isCustom,
            'updated_at' => $updatedAt,
            'updated_by' => $updatedBy,
            'defaults' => $defaults,
            'active' => $active,
        ];
    }

    /**
     * Save or reset the Kabupaten Kolaka Utara portal aggregate summary override.
     */
    public function savePortalAggregate(Request $request): JsonResponse
    {
        $authUser = Auth::user();
        if ($authUser === null || $authUser->isOperatorDesa()) {
            return response()->json([
                'success' => false,
                'message' => 'Hanya Administrator yang diizinkan mengubah Ringkasan Agregat Portal.',
            ], 403);
        }

        $overrideFile = database_path('data/portal_aggregate_override.json');
        $action = trim((string) $request->input('action', 'save'));

        if ($action === 'reset') {
            if (file_exists($overrideFile)) {
                @unlink($overrideFile);
            }

            return response()->json([
                'success' => true,
                'message' => 'Ringkasan Agregat Kabupaten dikembalikan ke perhitungan otomatis dari Master Kecamatan.',
                'aggregate' => self::getPortalAggregateSummary(),
            ]);
        }

        $validated = $request->validate([
            'judul_ringkasan' => 'nullable|string|max:120',
            'label_sumber' => 'nullable|string|max:60',
            'total_penduduk_l' => 'required|integer|min:0',
            'total_penduduk_p' => 'required|integer|min:0',
            'total_penduduk' => 'required|integer|min:0',
            'kepadatan_rata' => 'required|numeric|min:0',
            'total_kecamatan' => 'required|integer|min:0',
            'total_desa' => 'required|integer|min:0',
            'rasio_jenis_kelamin' => 'required|numeric|min:0',
            'total_imk' => 'required|integer|min:0',
            'rasio_listrik' => 'required|numeric|min:0|max:100',
            'total_pln_kk' => 'required|integer|min:0',
        ]);

        $payload = [
            'is_custom' => true,
            'updated_at' => now()->format('d M Y H:i'),
            'updated_by' => $authUser->name,
            'values' => [
                'judul_ringkasan' => trim((string) ($validated['judul_ringkasan'] ?? '')) ?: 'Ringkasan Agregat Kabupaten Kolaka Utara',
                'label_sumber' => trim((string) ($validated['label_sumber'] ?? '')) ?: 'BPS PODES 2025',
                'total_penduduk_l' => (int) $validated['total_penduduk_l'],
                'total_penduduk_p' => (int) $validated['total_penduduk_p'],
                'total_penduduk' => (int) $validated['total_penduduk'],
                'kepadatan_rata' => round((float) $validated['kepadatan_rata'], 1),
                'total_kecamatan' => (int) $validated['total_kecamatan'],
                'total_desa' => (int) $validated['total_desa'],
                'rasio_jenis_kelamin' => round((float) $validated['rasio_jenis_kelamin'], 1),
                'total_imk' => (int) $validated['total_imk'],
                'rasio_listrik' => round((float) $validated['rasio_listrik'], 2),
                'total_pln_kk' => (int) $validated['total_pln_kk'],
            ],
        ];

        $dir = dirname($overrideFile);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents($overrideFile, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return response()->json([
            'success' => true,
            'message' => 'Ringkasan Agregat Kabupaten Kolaka Utara berhasil disimpan dan disinkronkan ke Portal Publik!',
            'aggregate' => self::getPortalAggregateSummary(),
        ]);
    }
}