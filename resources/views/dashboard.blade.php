<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Eksekutif Admin - Desa Madani BPS Kolaka Utara</title>
    
    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons 1.11.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --bs-font-sans-serif: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            --bs-body-font-family: var(--bs-font-sans-serif);
            --bs-body-bg: #f1f5f9;
            --madani-emerald: #059669;
            --madani-darkgreen: #047857;
            --madani-deep: #064e3b;
            --madani-navy: #0b2545;
            --madani-darknavy: #061a33;
            --madani-amber: #f59e0b;
        }

        body {
            font-family: var(--bs-font-sans-serif);
            background-color: var(--bs-body-bg);
            color: #1e293b;
            min-height: 100vh;
        }

        /* Fixed Left Sidebar */
        .admin-sidebar {
            width: 270px;
            background-color: var(--madani-navy);
            color: #ffffff;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1045;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease-in-out;
            box-shadow: 4px 0 24px rgba(11, 37, 69, 0.2);
        }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main-wrapper {
                margin-left: 0 !important;
            }
        }

        @media (min-width: 992px) {
            .admin-main-wrapper {
                margin-left: 270px;
            }
        }

        /* Sidebar Nav Links */
        .sidebar-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.7rem 0.95rem;
            color: #94a3b8;
            font-size: 0.8125rem;
            font-weight: 600;
            border-radius: 0.75rem;
            text-decoration: none;
            transition: all 0.15s ease-in-out;
            margin-bottom: 0.3rem;
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
        }
        .sidebar-nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.08);
        }
        .sidebar-nav-link.active {
            color: #ffffff !important;
            background-color: var(--madani-emerald) !important;
            box-shadow: 0 4px 14px rgba(5, 150, 105, 0.4);
        }
        .sidebar-nav-link.active .badge {
            background-color: rgba(255, 255, 255, 0.25) !important;
            color: #ffffff !important;
        }

        /* Clean Card Bento */
        .bento-card {
            background: #ffffff;
            border-radius: 1rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03), 0 4px 12px rgba(15, 23, 42, 0.03);
            transition: all 0.2s ease;
        }
        .bento-card:hover {
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.06);
        }

        .hero-banner {
            background: linear-gradient(135deg, var(--madani-deep) 0%, var(--madani-darkgreen) 50%, var(--madani-navy) 100%);
            color: #ffffff;
            border-radius: 1rem;
            position: relative;
            overflow: hidden;
        }

        .btn-emerald {
            background-color: var(--madani-emerald);
            border-color: var(--madani-emerald);
            color: #ffffff;
            font-weight: 700;
        }
        .btn-emerald:hover, .btn-emerald:focus {
            background-color: var(--madani-darkgreen);
            border-color: var(--madani-darkgreen);
            color: #ffffff;
        }

        .btn-outline-emerald {
            color: var(--madani-emerald);
            border-color: var(--madani-emerald);
            font-weight: 600;
        }
        .btn-outline-emerald:hover, .btn-outline-emerald:focus {
            background-color: var(--madani-emerald);
            color: #ffffff;
        }

        /* Sektoral Module List Items */
        .podes-mod-item {
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            transition: all 0.15s ease-in-out;
            background: #ffffff;
            margin-bottom: 0.4rem;
            padding: 0.55rem 0.75rem;
            cursor: pointer;
            text-align: left;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .podes-mod-item:hover {
            background-color: #f8fafc;
            border-color: #cbd5e1;
        }
        .podes-mod-item.active {
            border-color: #059669;
            background-color: #ecfdf5;
            color: #065f46;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(5, 150, 105, 0.12);
        }

        /* Sub-Table Horizontal Tabs */
        .subtable-pill {
            padding: 0.4rem 0.85rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.15s ease;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #334155;
            white-space: nowrap;
            flex-shrink: 0;
            cursor: pointer;
        }
        .subtable-pill:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            color: #0f172a;
        }
        .subtable-pill.active {
            background-color: #059669;
            color: #ffffff;
            border-color: #059669;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(5, 150, 105, 0.25);
        }

        /* Variable Input Card */
        .variable-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            padding: 0.85rem 1rem;
            transition: all 0.15s ease;
        }
        .variable-card:focus-within {
            border-color: #059669;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.12);
        }

        .font-mono-num {
            font-family: 'JetBrains Mono', ui-monospace, monospace;
        }

        /* =====================================================
           DESCAN THEME (Desa Cantik) — override tampilan admin
           ===================================================== */
        :root {
            --dc-green: #0f6b4a;
            --dc-green-dark: #0a4d36;
            --dc-green-deep: #083b2a;
            --dc-mint: #6ee7b7;
            --dc-mint-bg: #ecfdf5;
            --dc-line: #e5e9e7;
            --dc-ink: #0f1f1a;
            --dc-muted: #6b7a74;
        }
        body { background-color: #f4f7f5; color: var(--dc-ink); }

        .admin-sidebar {
            width: 240px;
            background: #ffffff;
            color: var(--dc-ink);
            border-right: 1px solid var(--dc-line);
            box-shadow: none;
        }
        @media (min-width: 992px) { .admin-main-wrapper { margin-left: 240px; } }

        .dc-brand-mark {
            width: 36px; height: 36px; border-radius: 10px;
            background: var(--dc-green-dark); color: #fff;
            display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }
        .dc-nav-label {
            font-size: 10px; font-weight: 700; letter-spacing: .08em;
            text-transform: uppercase; color: var(--dc-muted);
            padding: 0 .5rem; margin: 1.1rem 0 .45rem;
        }
        .sidebar-nav-link {
            color: #3d4b45; font-weight: 500; font-size: .8125rem;
            padding: .6rem .8rem; border-radius: .6rem; margin-bottom: .15rem;
            justify-content: flex-start; gap: .65rem;
        }
        .sidebar-nav-link i { color: #6b7a74; font-size: .95rem; }
        .sidebar-nav-link:hover { background: #f1f5f3; color: var(--dc-ink); }
        .sidebar-nav-link.active {
            background-color: var(--dc-green-dark) !important;
            color: #fff !important; box-shadow: none; font-weight: 600;
        }
        .sidebar-nav-link.active i { color: #fff; }
        .sidebar-nav-link .badge { margin-left: auto; background: #eef3f0 !important; color: #3d4b45 !important; }
        .sidebar-nav-link.active .badge { background: rgba(255,255,255,.2) !important; color: #fff !important; }

        .dc-topbar { background: #fff; border-bottom: 1px solid var(--dc-line); }
        .dc-pill {
            display: inline-flex; align-items: center; gap: .4rem;
            background: var(--dc-mint-bg); color: var(--dc-green);
            border: 1px solid #b7e8d0; border-radius: 999px;
            padding: .3rem .8rem; font-size: 12px; font-weight: 600;
        }

        .dc-hero {
            background: linear-gradient(135deg, #0a4d36 0%, #0f6b4a 55%, #0c5a3f 100%);
            color: #fff; border-radius: 1rem; padding: 2rem; position: relative; overflow: hidden;
        }
        .dc-hero::after {
            content: ""; position: absolute; right: -80px; top: -80px; width: 280px; height: 280px;
            border-radius: 50%; background: rgba(110,231,183,.08);
        }
        .dc-chip {
            display: inline-flex; align-items: center; gap: .4rem; font-size: 10px; font-weight: 700;
            letter-spacing: .05em; text-transform: uppercase;
            background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.18);
            border-radius: 999px; padding: .25rem .7rem;
        }
        .dc-status-card {
            background: rgba(255,255,255,.09); border: 1px solid rgba(255,255,255,.16);
            border-radius: .9rem; padding: 1.1rem 1.25rem; position: relative; z-index: 1;
        }
        .btn-dc-mint { background: #6ee7b7; color: #053b28; font-weight: 700; border: 0; }
        .btn-dc-mint:hover { background: #86efc5; color: #053b28; }
        .btn-dc-ghost { background: rgba(255,255,255,.12); color: #fff; font-weight: 600; border: 1px solid rgba(255,255,255,.2); }
        .btn-dc-ghost:hover { background: rgba(255,255,255,.2); color: #fff; }

        .dc-card {
            background: #fff; border: 1px solid var(--dc-line); border-radius: 1rem;
            padding: 1.1rem 1.25rem; height: 100%;
        }
        .dc-icon {
            width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center;
            background: var(--dc-mint-bg); color: var(--dc-green); font-size: 1rem; flex-shrink: 0;
        }
        .dc-tag {
            font-size: 10px; font-weight: 700; padding: .15rem .55rem; border-radius: 999px;
            background: var(--dc-mint-bg); color: var(--dc-green);
        }
        .dc-kpi-label { font-size: 12px; color: var(--dc-muted); margin-top: .9rem; }
        .dc-kpi-value { font-size: 1.5rem; font-weight: 800; letter-spacing: -.02em; line-height: 1.2; }
        .dc-kpi-foot { font-size: 11px; color: var(--dc-muted); display: flex; justify-content: space-between; margin-top: .6rem; }
        .dc-progress { height: 5px; background: #e7ece9; border-radius: 99px; overflow: hidden; }
        .dc-progress > span { display: block; height: 100%; border-radius: 99px; }

        .dc-section-eyebrow {
            font-size: 10px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--dc-green);
        }
        .dc-pilar-no { font-size: 10px; font-weight: 700; letter-spacing: .06em; color: var(--dc-muted); margin-top: .9rem; }
        .dc-pilar-title { font-size: .95rem; font-weight: 700; margin: .15rem 0 .4rem; }
        .dc-pilar-desc { font-size: 11.5px; color: var(--dc-muted); line-height: 1.55; }
        .dc-link { font-size: 11px; font-weight: 600; color: var(--dc-green); text-decoration: none; }
        .dc-link:hover { text-decoration: underline; }

        .dc-quick {
            display: block; width: 100%; text-align: left; background: #f6f9f7; border: 1px solid transparent;
            border-radius: .8rem; padding: .8rem; text-decoration: none; color: var(--dc-ink); transition: .15s;
        }
        .dc-quick:hover { border-color: #b7e8d0; background: #eff8f3; color: var(--dc-ink); }
        .dc-quick .dc-icon { background: var(--dc-green-dark); color: #fff; margin-bottom: .6rem; }
        .dc-quick b { font-size: 12.5px; display: block; line-height: 1.3; }
        .dc-quick small { font-size: 11px; color: var(--dc-muted); }

        .dc-agenda { border-left: 3px solid var(--dc-green); background: #f6f9f7; border-radius: .6rem; padding: .7rem .9rem; margin-bottom: .6rem; }
        .dc-agenda.biru { border-left-color: #3b82f6; }
        .dc-agenda.amber { border-left-color: #f59e0b; }
        .dc-agenda .jenis { font-size: 10px; font-weight: 700; letter-spacing: .05em; color: var(--dc-muted); display: flex; justify-content: space-between; }
        .dc-agenda b { font-size: 12.5px; display: block; margin: .15rem 0; }
        .dc-agenda small { font-size: 11px; color: var(--dc-muted); }

        .dc-chart-box { position: relative; width: 100%; }
        .dc-help { background: linear-gradient(135deg, #0a4d36, #0f6b4a); color: #fff; border-radius: 1rem; padding: 1.1rem 1.25rem; }
        .dc-avatar { width: 34px; height: 34px; border-radius: 50%; background: #dff3e8; color: var(--dc-green-dark); font-weight: 700; font-size: 11px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    </style>
</head>
<body>

    <!-- Mobile Backdrop -->
    <div id="sidebarBackdrop" onclick="toggleSidebar()" class="modal-backdrop fade d-lg-none" style="display: none; z-index: 1040;"></div>

    <!-- =========================================================================
         LEFT SIDEBAR: DESA MADANI BPS
         ========================================================================= -->
    <aside id="adminSidebar" class="admin-sidebar">

        <!-- Brand -->
        <div class="px-3 py-3 d-flex align-items-center justify-content-between">
            <a href="/admin" class="d-flex align-items-center gap-2 text-decoration-none">
                <span class="dc-brand-mark"><i class="bi bi-bar-chart-line-fill"></i></span>
                <span>
                    <span class="d-flex align-items-center gap-1 lh-1">
                        <strong style="font-size:15px;color:var(--dc-ink);letter-spacing:.02em;">DESCAN</strong>
                        <span class="dc-tag" style="background:#0f6b4a;color:#fff;">KODEOHA</span>
                    </span>
                    <small style="font-size:10px;color:var(--dc-muted);">BPS Kolaka Utara</small>
                </span>
            </a>
            <button class="btn btn-sm btn-link text-secondary d-lg-none p-0" onclick="toggleSidebar()">
                <i class="bi bi-x-lg fs-5"></i>
            </button>
        </div>

        <div class="flex-grow-1 overflow-y-auto px-3 pb-3">

            <div class="dc-nav-label" style="margin-top:.4rem;">Administrasi &amp; Data</div>

            <button type="button" onclick="switchAdminTab('overview')" id="tabBtnOverview" class="sidebar-nav-link active">
                <i class="bi bi-grid-1x2"></i><span>Dashboard Desa</span>
            </button>

            <button type="button" onclick="switchAdminTab('desa')" id="tabBtnDesa" class="sidebar-nav-link">
                <i class="bi bi-buildings"></i><span>Profil Desa</span>
                <span class="badge rounded-pill" style="font-size:9px;">{{ count($flatDesaList) }}</span>
            </button>

            <button type="button" onclick="switchAdminTab('podes')" id="tabBtnPodes" class="sidebar-nav-link">
                <i class="bi bi-pencil-square"></i><span>Pengisian Data PODES</span>
            </button>

            <button type="button" onclick="goToDescanSection('descanMonitoring')" class="sidebar-nav-link">
                <i class="bi bi-clipboard-data"></i><span>Monitoring Kelengkapan</span>
            </button>

            <button type="button" onclick="switchAdminTab('spatial')" id="tabBtnSpatial" class="sidebar-nav-link">
                <i class="bi bi-geo-alt"></i><span>Pemetaan Spasial</span>
            </button>

            @if($admin->isAdmin())
                <button type="button" onclick="switchAdminTab('users')" id="tabBtnUsers" class="sidebar-nav-link">
                    <i class="bi bi-people"></i><span>Kelola Pengguna</span>
                    <span class="badge rounded-pill" style="font-size:9px;">{{ $users->count() }}</span>
                </button>
            @endif

            <div class="dc-nav-label">Kapasitas &amp; Pembinaan</div>

            <button type="button" onclick="goToDescanSection('descanPilar')" class="sidebar-nav-link">
                <i class="bi bi-people-fill"></i><span>Pembinaan Desa</span>
            </button>
            <a href="/desacan/menu" class="sidebar-nav-link"><i class="bi bi-book"></i><span>Materi Pembelajaran</span></a>
            <button type="button" onclick="goToDescanSection('descanTutorial')" class="sidebar-nav-link">
                <i class="bi bi-play-btn"></i><span>Video Tutorial</span>
            </button>
            <a href="/desacan/menu" class="sidebar-nav-link"><i class="bi bi-journal-check"></i><span>Pre-test &amp; Post-test</span></a>
            <a href="/desacan/menu" class="sidebar-nav-link"><i class="bi bi-journal-richtext"></i><span>Buku Panduan</span></a>

            @if($admin->isAdmin())
                <div class="dc-nav-label">Alat &amp; Sinkronisasi</div>
                <button type="button" onclick="openSyncSpreadsheetModal()" class="sidebar-nav-link">
                    <i class="bi bi-arrow-repeat"></i><span>Sinkron Excel PODES</span>
                </button>
                <button type="button" onclick="exportDataToCSV()" class="sidebar-nav-link">
                    <i class="bi bi-download"></i><span>Ekspor CSV Master</span>
                </button>
            @endif
        </div>

        <!-- Footer -->
        <div class="p-3 border-top" style="border-color:var(--dc-line)!important;">
            <div class="d-flex align-items-center justify-content-between rounded-3 px-2 py-1 mb-2" style="background:#eef6f1;font-size:10px;">
                <span class="d-flex align-items-center gap-1 fw-semibold text-success"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Server BPS Aktif</span>
                <span class="text-muted">v2.4</span>
            </div>
            <form method="POST" action="/logout" onsubmit="return confirm('Apakah Anda yakin ingin keluar?');">
                @csrf
                <button type="submit" class="btn btn-link text-danger fw-semibold text-decoration-none p-0 d-flex align-items-center gap-2" style="font-size:12.5px;">
                    <i class="bi bi-box-arrow-left"></i>Keluar Akun
                </button>
            </form>
        </div>
    </aside>

    <!-- =========================================================================
         RIGHT MAIN CONTENT WRAPPER
         ========================================================================= -->
    <div class="admin-main-wrapper flex-grow-1 d-flex flex-column min-vh-100">
        
        <!-- Top Navbar -->
        <header class="navbar navbar-expand dc-topbar sticky-top py-2 px-3 px-md-4">
            <div class="container-fluid p-0 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2 gap-md-3">
                    <button class="btn btn-sm btn-light border d-lg-none" type="button" onclick="toggleSidebar()">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                    <span class="dc-pill"><i class="bi bi-check-circle"></i>{{ $admin->isOperatorDesa() ? 'Operator Desa' : 'Admin BPS' }}</span>
                    <span class="d-none d-md-flex align-items-center gap-2 border-start ps-3" style="font-size:12px;">
                        <i class="bi bi-geo-alt text-muted"></i>
                        <strong>Kec. {{ ucwords(strtolower($admin->kecamatan ?: $descan['kecamatan'])) }}</strong>
                        <span class="text-muted">• Kabupaten Kolaka Utara</span>
                    </span>
                    <span class="d-none" id="topbarActiveTabName">Dashboard Desa</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    @if(!$admin->isOperatorDesa())
                        <button type="button" onclick="openNewDesaModal()" class="btn btn-sm btn-success rounded-pill px-3 d-none d-md-inline-flex align-items-center gap-1" style="font-size:12px;background:var(--dc-green);border-color:var(--dc-green);">
                            <i class="bi bi-plus-lg"></i>Input Desa Baru
                        </button>
                    @endif
                    <i class="bi bi-bell text-secondary position-relative"><span class="position-absolute rounded-circle bg-danger" style="width:7px;height:7px;top:0;right:-1px;"></span></i>
                    <div class="d-flex align-items-center gap-2">
                        <div class="text-end d-none d-sm-block lh-sm">
                            <div class="fw-semibold" style="font-size:12px;">{{ $admin->name }}</div>
                            <div class="text-muted" style="font-size:10.5px;">{{ $admin->isOperatorDesa() ? 'Operator Data' : 'Admin BPS' }}</div>
                        </div>
                        <span class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:32px;height:32px;background:var(--dc-green-deep);font-size:12px;">{{ strtoupper(substr($admin->name ?? 'A', 0, 1)) }}</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Body Container -->
        <main class="container-fluid px-3 px-md-4 py-3.5 flex-grow-1">

            <!-- Flash Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-2xs d-flex align-items-center justify-content-between py-2.5 px-3 mb-3" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                        <span class="fw-semibold small">{{ session('success') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Flash Error Message -->
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-2xs d-flex align-items-center justify-content-between py-2.5 px-3 mb-3" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-exclamation-triangle-fill fs-5 text-danger"></i>
                        <span class="fw-semibold small">{{ session('error') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- =================================================================
                 TAB 1: RINGKASAN EKSEKUTIF (OVERVIEW)
                 ================================================================= -->
            <div id="tabContentOverview">

                @php
                    $pct = round($descan['indikator_terisi'] / max(1, $descan['indikator_total']) * 100);
                    $pilar = [
                        ['no'=>'01','ikon'=>'bi-geo-alt','judul'=>'Literasi Statistik','isi'=>'Meningkatkan literasi statistik aparatur desa melalui pelatihan konsep, definisi, dan interpretasi indikator makro.','link'=>'Pelatihan Berkelanjutan'],
                        ['no'=>'02','ikon'=>'bi-database','judul'=>'Pengumpulan & Pengelolaan','isi'=>'Meningkatkan kemampuan pengumpulan dan pengelolaan data desa secara digital, sistematis, dan tersirsip rapi.','link'=>'Standarisasi Kuesioner'],
                        ['no'=>'03','ikon'=>'bi-sliders','judul'=>'Data Akurat & Berkualitas','isi'=>'Mendorong tersedianya data desa yang akurat, mutakhir, valid, dan dapat dipertanggungjawabkan sesuai kaidah SDI.','link'=>'Satu Data Indonesia'],
                        ['no'=>'04','ikon'=>'bi-graph-up-arrow','judul'=>'Perencanaan Pembangunan','isi'=>'Meningkatkan pemanfaatan data riil dalam penyusunan RKPDes, APBDes, dan alokasi bantuan sosial yang tepat sasaran.','link'=>'Kebijakan Berbasis Bukti'],
                        ['no'=>'05','ikon'=>'bi-bank','judul'=>'Tata Kelola Statistik','isi'=>'Mendorong terwujudnya tata kelola dan kelembagaan statistik desa yang berkelanjutan bersama pembina BPS Kolaka Utara.','link'=>'SOP & Agen Statistik'],
                    ];
                    $agenda = [
                        ['jenis'=>'KUNJUNGAN LAPANGAN','tgl'=>'24 Okt 2026','judul'=>'Rekonsiliasi & Uji Petik Monografi Desa','lokasi'=>'Kantor Desa Kalu Kaluku','warna'=>''],
                        ['jenis'=>'DARING / ZOOM','tgl'=>'02 Nov 2026','judul'=>'Webinar Pemanfaatan Data PODES untuk RKPDes','lokasi'=>'BPS Kab. Kolaka Utara','warna'=>'biru'],
                        ['jenis'=>'EVALUASI AKHIR','tgl'=>'15 Nov 2026','judul'=>'Penganugerahan Desa Cinta Statistik Teladan','lokasi'=>'Aula Bappeda Kolaka Utara','warna'=>'amber'],
                    ];
                    $tim = [
                        ['MK','Muh. Kamil, S.IP','Sekretaris Desa','Lulus Sertifikasi'],
                        ['RN','Rini Novitasari','Kasi Pemerintahan','Skor Post-test 94'],
                        ['AS','Agus Salim','Kaur Perencanaan','Skor Post-test 88'],
                    ];
                @endphp

                <!-- HERO -->
                <div class="dc-hero mb-4">
                    <div class="row align-items-center gy-4">
                        <div class="col-lg-8" style="position:relative;z-index:1;">
                            <span class="dc-chip mb-3"><i class="bi bi-circle-fill" style="font-size:6px;color:#6ee7b7;"></i>Desa Binaan BPS Aktif 2026
                                <span style="opacity:.5;">•</span> Kecamatan {{ ucwords(strtolower($descan['kecamatan'])) }}</span>
                            <h2 class="fw-bold mt-2 mb-2" style="letter-spacing:-.02em;">Selamat Datang di Desa Cantik</h2>
                            <p class="mb-4" style="font-size:13px;line-height:1.7;opacity:.88;max-width:620px;">
                                Desa Cantik (Desa Cinta Statistik) merupakan program pembinaan untuk meningkatkan kapasitas aparatur desa dalam pengelolaan dan pemanfaatan data statistik. Melalui platform ini, pengguna dapat mengakses materi pembelajaran, video tutorial, buku panduan, serta mengikuti evaluasi melalui pre-test dan post-test.
                            </p>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="button" onclick="switchAdminTab('podes')" class="btn btn-dc-mint rounded-3 px-3 py-2" style="font-size:13px;"><i class="bi bi-pencil-square me-2"></i>Lanjutkan Data PODES</button>
                                <a href="/desacan/menu" class="btn btn-dc-ghost rounded-3 px-3 py-2" style="font-size:13px;"><i class="bi bi-book me-2"></i>Unduh Buku Panduan</a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dc-status-card">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span style="font-size:10px;font-weight:700;letter-spacing:.06em;opacity:.7;">STATUS BINAAN</span>
                                    <span class="dc-tag" style="background:#6ee7b7;color:#053b28;">Terdaftar</span>
                                </div>
                                <div class="fw-bold" style="font-size:2rem;line-height:1.05;letter-spacing:-.02em;">Desa {{ $descan['desa'] }}</div>
                                <div style="font-size:11px;opacity:.65;margin:.4rem 0 1rem;">Pilot Utama Kec. {{ ucwords(strtolower($descan['kecamatan'])) }}</div>
                                <div class="d-flex justify-content-between align-items-center pt-3" style="border-top:1px solid rgba(255,255,255,.15);">
                                    <span style="font-size:12px;"><i class="bi bi-shield-check me-1" style="color:#6ee7b7;"></i>Validasi BPS RI</span>
                                    <strong style="font-size:1.25rem;color:#6ee7b7;">100%</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4 KPI -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="dc-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="dc-icon"><i class="bi bi-clipboard-check"></i></span>
                                <span class="dc-tag">{{ $pct }}% Selesai</span>
                            </div>
                            <div class="dc-kpi-label">Pengisian PODES</div>
                            <div class="dc-kpi-value">{{ $descan['indikator_terisi'] }} / {{ $descan['indikator_total'] }} Indikator</div>
                            <div class="dc-progress mt-3"><span style="width:{{ $pct }}%;background:var(--dc-green);"></span></div>
                            <div class="dc-kpi-foot"><span>Kurang {{ $descan['indikator_total'] - $descan['indikator_terisi'] }} variabel</span><strong>Standar SDI</strong></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="dc-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="dc-icon" style="background:#eaf1fb;color:#2563eb;"><i class="bi bi-patch-check"></i></span>
                                <span class="dc-tag" style="background:#eef2f6;color:#4b5b6b;">Tahap 3</span>
                            </div>
                            <div class="dc-kpi-label">Verifikasi BPS Kolut</div>
                            <div class="dc-kpi-value" style="color:var(--dc-green);">Terverifikasi</div>
                            <div class="dc-kpi-foot mt-4"><span><i class="bi bi-check-circle me-1"></i>Metadata Sah</span><span>Rev. 12 Okt 2026</span></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="dc-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="dc-icon" style="background:#eef2f6;color:#334155;"><i class="bi bi-people-fill"></i></span>
                                <span class="dc-tag" style="background:#eef2f6;color:#4b5b6b;">Monografi 2026</span>
                            </div>
                            <div class="dc-kpi-label">Cakupan Kependudukan</div>
                            <div class="dc-kpi-value">1.120 KK</div>
                            <div class="dc-kpi-foot mt-4"><span>3.840 Jiwa terdata</span><strong>4 Dusun</strong></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="dc-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="dc-icon" style="background:#fdf3e1;color:#d97706;"><i class="bi bi-award"></i></span>
                                <span class="dc-tag" style="background:#fdf3e1;color:#b45309;">Grade A</span>
                            </div>
                            <div class="dc-kpi-label">Skor Rata-rata Evaluasi</div>
                            <div class="dc-kpi-value">88.5 / 100</div>
                            <div class="dc-kpi-foot mt-4"><span>Pre-test &amp; Post-test</span><strong>5 Operator</strong></div>
                        </div>
                    </div>
                </div>

                <!-- GRAFIK -->
                <div class="mb-2">
                    <div class="dc-section-eyebrow"><i class="bi bi-graph-up me-1"></i>Visualisasi Data</div>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col-lg-4">
                        <div class="dc-card">
                            <h6 class="fw-bold mb-0" style="font-size:14px;">Status Kemandirian Desa</h6>
                            <small class="text-muted">Sebaran {{ $stats['total_desa'] }} desa se-Kolaka Utara</small>
                            <div class="dc-chart-box mt-3" style="height:230px;"><canvas id="dcChartStatus"></canvas></div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="dc-card">
                            <h6 class="fw-bold mb-0" style="font-size:14px;">Rata-rata IPD per Kecamatan</h6>
                            <small class="text-muted">Indeks Pembangunan Desa, bersumber dari data master PODES</small>
                            <div class="dc-chart-box mt-3" style="height:230px;"><canvas id="dcChartIpd"></canvas></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="dc-card">
                            <h6 class="fw-bold mb-0" style="font-size:14px;">Kelengkapan PODES per Klaster</h6>
                            <small class="text-muted">Desa {{ $descan['desa'] }} — variabel terisi vs total</small>
                            <div class="dc-chart-box mt-3" style="height:230px;"><canvas id="dcChartKelengkapan"></canvas></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="dc-card">
                            <h6 class="fw-bold mb-0" style="font-size:14px;">Tren Skor Pre-test &amp; Post-test</h6>
                            <small class="text-muted">Rata-rata skor operator desa per sesi</small>
                            <div class="dc-chart-box mt-3" style="height:230px;"><canvas id="dcChartSkor"></canvas></div>
                        </div>
                    </div>
                </div>

                <!-- 5 PILAR -->
                <div id="descanPilar" class="mb-4">
                    <div class="dc-section-eyebrow mb-1"><i class="bi bi-flag me-1"></i>Kerangka Program Nasional BPS RI</div>
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-2 mb-3">
                        <h4 class="fw-bold mb-0" style="letter-spacing:-.02em;">5 Pilar Utama Tujuan Desa Cantik</h4>
                        <small class="text-muted" style="max-width:420px;">Arah strategis pembinaan statistik terintegrasi untuk memperkuat kemandirian dan tata kelola data di Desa {{ $descan['desa'] }}.</small>
                    </div>
                    <div class="row g-3">
                        @foreach($pilar as $p)
                            <div class="col-sm-6 col-lg">
                                <div class="dc-card d-flex flex-column">
                                    <span class="dc-icon"><i class="bi {{ $p['ikon'] }}"></i></span>
                                    <div class="dc-pilar-no">PILAR {{ $p['no'] }}</div>
                                    <div class="dc-pilar-title">{{ $p['judul'] }}</div>
                                    <div class="dc-pilar-desc flex-grow-1">{{ $p['isi'] }}</div>
                                    <a href="#" class="dc-link mt-3" onclick="return false;">{{ $p['link'] }} <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- AKSI CEPAT + AGENDA -->
                <div class="row g-3 mb-4">
                    <div class="col-lg-8 d-flex flex-column gap-3">
                        <div class="dc-card h-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold mb-0"><i class="bi bi-lightning-charge-fill text-success me-1"></i>Aksi Cepat Operator Desa</h6>
                                <small class="text-muted">Pintasan Fitur Pembinaan</small>
                            </div>
                            <div class="row g-2">
                                <div class="col-6 col-md-3"><button type="button" onclick="switchAdminTab('podes')" class="dc-quick"><span class="dc-icon"><i class="bi bi-file-earmark-plus"></i></span><b>Input Data PODES</b><small>{{ $descan['indikator_terisi'] }}/{{ $descan['indikator_total'] }} terverifikasi</small></button></div>
                                <div class="col-6 col-md-3"><a href="/desacan/menu" class="dc-quick"><span class="dc-icon"><i class="bi bi-book"></i></span><b>Materi Belajar</b><small>8 Modul Statistik</small></a></div>
                                <div class="col-6 col-md-3"><a href="/desacan/menu" class="dc-quick"><span class="dc-icon"><i class="bi bi-journal-check"></i></span><b>Ikuti Post-test</b><small>Uji Kompetensi Sesi 2</small></a></div>
                                <div class="col-6 col-md-3"><a href="/desacan/menu" class="dc-quick"><span class="dc-icon" style="background:#e8f4ee;color:var(--dc-green);"><i class="bi bi-download"></i></span><b>Panduan Teknis</b><small>PDF Panduan Desa</small></a></div>
                            </div>
                        </div>

                        <div id="descanMonitoring" class="dc-card h-auto">
                            <h6 class="fw-bold mb-0">Monitoring Kelengkapan PODES Desa {{ $descan['desa'] }}</h6>
                            <small class="text-muted d-block mb-3">Evaluasi pengisian {{ $descan['indikator_total'] }} variabel inti statistik potensi desa tahun 2026</small>
                            @foreach($descan['kelengkapan'] as $i => $k)
                                @php
                                    $kp = round($k['terisi'] / max(1, $k['total']) * 100);
                                    $warna = $kp >= 100 ? '#0f6b4a' : ($kp >= 87 ? '#f59e0b' : '#dc2626');
                                @endphp
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between" style="font-size:12.5px;">
                                        <span><i class="bi bi-circle-fill me-2" style="font-size:7px;color:{{ $warna }};"></i>{{ $i+1 }}. {{ $k['label'] }}</span>
                                        <strong style="font-size:11px;color:{{ $warna }};">{{ $kp }}% ({{ $k['terisi'] }}/{{ $k['total'] }})</strong>
                                    </div>
                                    <div class="dc-progress mt-1" style="height:6px;"><span style="width:{{ $kp }}%;background:{{ $warna }};"></span></div>
                                </div>
                            @endforeach
                            <div class="rounded-3 p-2 px-3 d-flex gap-2" style="background:#f6f9f7;border:1px solid var(--dc-line);font-size:11.5px;color:var(--dc-muted);">
                                <i class="bi bi-info-circle"></i>
                                <span>Tersisa {{ $descan['indikator_total'] - $descan['indikator_terisi'] }} indikator yang belum dilengkapi. Batas akhir konfirmasi rekonsiliasi data: 28 Oktober 2026.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 d-flex flex-column gap-3">
                        <div class="dc-card h-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold mb-0"><i class="bi bi-calendar3 me-2 text-muted"></i>Agenda Pembinaan</h6>
                                <span class="dc-tag">BPS Kolut</span>
                            </div>
                            @foreach($agenda as $ag)
                                <div class="dc-agenda {{ $ag['warna'] }}">
                                    <div class="jenis"><span>{{ $ag['jenis'] }}</span><span>{{ $ag['tgl'] }}</span></div>
                                    <b>{{ $ag['judul'] }}</b>
                                    <small><i class="bi bi-geo-alt me-1"></i>{{ $ag['lokasi'] }}</small>
                                </div>
                            @endforeach
                            <button type="button" class="btn btn-light w-100 rounded-3 mt-1" style="font-size:12px;background:#eef3f8;">Lihat Kalender Lengkap</button>
                        </div>

                        <div id="descanTutorial" class="dc-card h-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold mb-0">Tutorial Pilihan</h6>
                                <a href="/desacan/menu" class="dc-link">Semua Video</a>
                            </div>
                            <a href="/desacan/menu" class="d-block rounded-3 text-decoration-none text-white position-relative mb-3" style="height:120px;background:linear-gradient(135deg,#0a4d36,#2f8f6a);overflow:hidden;">
                                <span class="position-absolute top-50 start-50 translate-middle rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px;background:rgba(255,255,255,.9);color:var(--dc-green);"><i class="bi bi-play-fill fs-5"></i></span>
                                <span class="position-absolute bottom-0 start-0 p-2" style="font-size:11px;"><b>Tutorial 04: Pengisian Kuesioner PODES</b><br><span style="opacity:.8;">Durasi: 14 menit • Tim Teknis BPS</span></span>
                            </a>
                            <div class="d-flex justify-content-between small mb-2"><span><i class="bi bi-play-btn me-2 text-muted"></i>Memahami Standar Data Indonesia</span><span class="text-muted">08:20</span></div>
                            <div class="d-flex justify-content-between small"><span><i class="bi bi-play-btn me-2 text-muted"></i>Pengolahan Data Monografi Desa</span><span class="text-muted">11:45</span></div>
                        </div>
                    </div>
                </div>

                <!-- TIM AGEN -->
                <div class="dc-card h-auto mb-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="fw-bold mb-0">Tim Agen Statistik Desa</h6>
                            <small class="text-muted">Aparatur yang telah ditugaskan dan mengikuti bimbingan teknis BPS</small>
                        </div>
                        <a href="#" onclick="switchAdminTab('users');return false;" class="dc-link">Kelola Tim</a>
                    </div>
                    <div class="row g-2">
                        @foreach($tim as $t)
                            <div class="col-md-4">
                                <div class="d-flex align-items-center gap-2 p-2 rounded-3" style="background:#f6f9f7;">
                                    <span class="dc-avatar">{{ $t[0] }}</span>
                                    <div class="overflow-hidden lh-sm">
                                        <div class="fw-semibold text-truncate" style="font-size:12.5px;">{{ $t[1] }}</div>
                                        <div class="text-muted text-truncate" style="font-size:11px;">{{ $t[2] }}</div>
                                        <div class="text-success" style="font-size:10.5px;font-weight:600;"><i class="bi bi-circle-fill me-1" style="font-size:5px;"></i>{{ $t[3] }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- PUSAT BANTUAN -->
                <div class="dc-help d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-2">
                    <div class="d-flex align-items-center gap-3">
                        <span class="dc-icon" style="background:rgba(255,255,255,.14);color:#fff;"><i class="bi bi-question-circle"></i></span>
                        <div>
                            <div class="fw-bold" style="font-size:14px;">Pusat Bantuan Desa Cantik</div>
                            <div style="font-size:12px;opacity:.8;">Ada kendala pengisian variabel atau login? Hubungi narahubung pembina BPS Kolaka Utara.</div>
                        </div>
                    </div>
                    <a href="https://wa.me/" target="_blank" rel="noopener" class="btn btn-dc-ghost rounded-3 px-3" style="font-size:12px;"><i class="bi bi-whatsapp me-2"></i>WhatsApp Helpdesk</a>
                </div>

            </div>

            <!-- =================================================================
                 TAB 2: WORKSPACE INPUT & VALIDASI PODES (11 MODUL & SUB-TABEL)
                 ================================================================= -->
            <div id="tabContentPodes" style="display: none;">

                <!-- Sticky Context Bar: Kecamatan & Desa Selector -->
                <div class="bento-card p-2.5 px-3 mb-3 sticky-top bg-white shadow-sm border" style="top: 58px; z-index: 1020;">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2.5">
                        
                        <!-- Left Selectors in a unified compact bar -->
                        @if($admin->isOperatorDesa())
                            <div class="d-flex align-items-center gap-2">
                                <div class="d-flex align-items-center gap-1.5 bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1.5 fw-bold" style="font-size: 12px;">
                                    <i class="bi bi-lock-fill"></i>
                                    <span>Wilayah Tugas: Desa {{ $admin->desa }} (Kec. {{ $admin->kecamatan }})</span>
                                </div>
                                <select id="podesSelectKec" class="d-none">
                                    <option value="{{ strtoupper($admin->kecamatan) }}" selected>{{ $admin->kecamatan }}</option>
                                </select>
                                <select id="podesSelectDesa" class="d-none">
                                    <option value="{{ strtoupper($admin->desa) }}" selected>{{ $admin->desa }}</option>
                                </select>
                            </div>
                        @else
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <div class="d-flex align-items-center gap-1.5 bg-light rounded-pill px-2.5 py-1 border">
                                    <i class="bi bi-geo-alt-fill text-success" style="font-size: 13px;"></i>
                                    <span class="small text-muted fw-bold" style="font-size: 11px;">Kec:</span>
                                    <select id="podesSelectKec" onchange="onPodesKecChange()" class="form-select form-select-sm border-0 bg-transparent fw-bold text-dark py-0 pe-4" style="width: auto; min-width: 130px; font-size: 12px; cursor: pointer;">
                                        @foreach($kecamatanList as $k)
                                            <option value="{{ strtoupper($k['nama']) }}" {{ strtoupper($k['nama']) == 'LASUSUA' ? 'selected' : '' }}>
                                                {{ $k['nama'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="d-flex align-items-center gap-1.5 bg-success-subtle rounded-pill px-2.5 py-1 border border-success-subtle">
                                    <i class="bi bi-pin-map-fill text-success" style="font-size: 13px;"></i>
                                    <span class="small text-success fw-bold" style="font-size: 11px;">Desa:</span>
                                    <select id="podesSelectDesa" onchange="onPodesDesaChange()" class="form-select form-select-sm border-0 bg-transparent fw-bold text-success py-0 pe-4" style="width: auto; min-width: 150px; font-size: 12px; cursor: pointer;">
                                        <!-- Populated via JS -->
                                    </select>
                                </div>

                                <!-- Prev / Next Desa Buttons -->
                                <div class="btn-group btn-group-sm">
                                    <button type="button" onclick="navigatePodesDesa(-1)" class="btn btn-light border rounded-start-pill px-2" title="Desa Sebelumnya">
                                        <i class="bi bi-chevron-left" style="font-size: 11px;"></i>
                                    </button>
                                    <button type="button" onclick="navigatePodesDesa(1)" class="btn btn-light border rounded-end-pill px-2" title="Desa Berikutnya">
                                        <i class="bi bi-chevron-right" style="font-size: 11px;"></i>
                                    </button>
                                </div>
                            </div>
                        @endif

                        <!-- Right Badges -->
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1.5 fw-bold d-flex align-items-center gap-1.5" style="font-size: 11px;" id="podesActiveDesaBadge">
                                <span class="spinner-grow spinner-grow-sm text-success" style="width: 6px; height: 6px;"></span>
                                <span>Desa Pitulua (Kec. Lasusua)</span>
                            </span>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1.5 fw-semibold" style="font-size: 11px;">
                                PODES 2024–2025
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Two-Column Workspace (11 Modules Nav + Work Area) -->
                <div class="row g-3 align-items-start">
                    
                    <!-- Left: 11 Sektoral Modules List (3 Cols) -->
                    <div class="col-lg-4 col-xl-3">
                        <div class="bento-card p-3 mb-3">
                            <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                                <div class="fw-bold small text-uppercase" style="font-size: 11px; letter-spacing: 0.5px;">12 Klaster PODES</div>
                                <span class="badge bg-light text-muted border font-mono-num" style="font-size: 10px;">63+ Tabel</span>
                            </div>

                            <div id="podesModulesContainer">
                                <!-- Populated dynamically via JS -->
                            </div>
                        </div>

                        <!-- Tip Box -->
                        <div class="alert alert-light border rounded-3 small p-2.5 text-muted mb-0" style="font-size: 11px; line-height: 1.5;">
                            <i class="bi bi-lightbulb-fill text-warning me-1"></i>
                            <strong>Tips:</strong> Data formulir otomatis tersinkron ke database dan langsung memperbarui WebGIS publik.
                        </div>
                    </div>

                    <!-- Right: Work Area (9 Cols) -->
                    <div class="col-lg-8 col-xl-9">
                        <div class="bento-card p-3.5 p-md-4">
                            
                            <!-- Header: Module Breadcrumb & Mode Switcher -->
                            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-2.5 pb-2.5 mb-3 border-bottom">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-success text-white px-2.5 py-1 fw-bold font-mono-num" style="font-size: 11px;" id="currentTableBadge">Tabel 1.1</span>
                                    <span class="text-muted fw-bold small" id="currentModuleBreadcrumb">Keterangan Umum Desa</span>
                                </div>

                                <!-- View Mode Button Group -->
                                <div class="btn-group btn-group-sm" role="group">
                                    <button type="button" onclick="switchWorkAreaMode('form')" id="modeBtnForm" class="btn btn-success fw-bold px-3">
                                        <i class="bi bi-pencil-square me-1"></i>Formulir
                                    </button>
                                    <button type="button" onclick="switchWorkAreaMode('matrix')" id="modeBtnMatrix" class="btn btn-outline-secondary px-3">
                                        <i class="bi bi-table me-1"></i>Matrix
                                    </button>
                                    <button type="button" onclick="switchWorkAreaMode('chart')" id="modeBtnChart" class="btn btn-outline-secondary px-3">
                                        <i class="bi bi-bar-chart-line me-1"></i>Chart
                                    </button>
                                    <button type="button" onclick="switchWorkAreaMode('monitoring')" id="modeBtnMonitoring" class="btn btn-outline-secondary px-3">
                                        <i class="bi bi-shield-check me-1"></i>Monitoring
                                    </button>
                                </div>
                            </div>

                            <!-- Sub-Table Horizontal Tabs Bar -->
                            <div class="d-flex align-items-center flex-nowrap gap-2 overflow-x-auto pb-2.5 mb-3 border-bottom" id="subTablesHorizontalBar">
                                <!-- Populated dynamically with pills for active module's tables -->
                            </div>

                            <!-- Table Title -->
                            <h6 class="fw-bold text-dark mb-3 lh-base" id="currentTableTitle">
                                Status Pemerintahan di Kabupaten Kolaka Utara, 2025
                            </h6>

                            <!-- PANEL 1: FORMULIR DESA (FOCUS MODE) -->
                            <div id="panelWorkForm">
                                <div id="formLoadingSpinner" class="text-center py-5 text-muted" style="display: none;">
                                    <div class="spinner-border spinner-border-sm text-success mb-2" role="status"></div>
                                    <div class="small fw-semibold">Memuat variabel desa...</div>
                                </div>

                                <form id="podesDynamicForm" onsubmit="submitPodesForm(event)">
                                    <div class="row g-2.5 mb-4" id="formInputsContainer">
                                        <!-- Dynamic Inputs Rendered via JS -->
                                    </div>

                                    <div class="pt-3 border-top d-flex flex-wrap align-items-center justify-content-between gap-2">
                                        <small class="text-muted d-flex align-items-center gap-1" style="font-size: 11px;">
                                            <i class="bi bi-cloud-check-fill text-success fs-6"></i>
                                            Tersinkron otomatis dengan basis data
                                        </small>
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-sm btn-emerald px-3.5 py-1.5 rounded-pill shadow-2xs" style="font-size: 12px;">
                                                <i class="bi bi-check-lg me-1"></i>Simpan Perubahan
                                            </button>
                                            <button type="button" onclick="saveAndNextTable()" class="btn btn-sm btn-light border rounded-pill px-3 py-1.5" style="font-size: 12px;">
                                                <span>Sub-Tabel Berikutnya</span>
                                                <i class="bi bi-arrow-right ms-1"></i>
                                            </button>
                                            <button type="button" onclick="navigatePodesDesa(1)" class="btn btn-sm btn-light border rounded-pill px-2.5 py-1.5" style="font-size: 12px;" title="Lanjut ke Desa Berikutnya">
                                                <i class="bi bi-chevron-double-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- PANEL 2: MATRIX SE-KECAMATAN -->
                            <div id="panelWorkMatrix" style="display: none;">
                                <div class="d-flex align-items-center justify-content-between mb-2 small text-muted">
                                    <div>Daftar perbandingan seluruh desa di <strong class="text-dark" id="matrixKecTitle">Kec. Lasusua</strong></div>
                                    <span class="badge bg-light text-muted border">Klik baris untuk memilih desa</span>
                                </div>
                                <div class="table-responsive border rounded-3" style="max-height: 480px;">
                                    <table class="table table-hover table-striped align-middle table-sm mb-0" id="matrixTableElement">
                                        <thead class="table-light sticky-top small fw-bold text-uppercase" id="matrixTableHead" style="font-size: 11px;">
                                            <!-- Columns -->
                                        </thead>
                                        <tbody class="small" id="matrixTableBody" style="font-size: 11px;">
                                            <!-- Rows -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- PANEL 3: VISUALISASI GRAFIK / CHART -->
                            <div id="panelWorkChart" style="display: none;">
                                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2.5 mb-3 pb-3 border-bottom">
                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                        <!-- Komparasi: Antar Desa vs Antar Kecamatan -->
                                        <div class="d-flex align-items-center bg-light rounded-pill p-1 border">
                                            <button type="button" onclick="setChartCompareScope('desa')" id="scopeBtnDesa" class="btn btn-sm btn-emerald rounded-pill px-2.5 py-1 fw-bold" style="font-size: 11px;">
                                                <i class="bi bi-houses me-1"></i>Antar Desa
                                            </button>
                                            <button type="button" onclick="setChartCompareScope('kecamatan')" id="scopeBtnKecamatan" class="btn btn-sm btn-light border-0 text-muted rounded-pill px-2.5 py-1 fw-bold" style="font-size: 11px;">
                                                <i class="bi bi-geo-alt me-1"></i>Antar Kecamatan
                                            </button>
                                        </div>

                                        <div class="d-flex align-items-center gap-1.5 bg-light rounded-pill px-2.5 py-1 border">
                                            <i class="bi bi-funnel-fill text-success" style="font-size: 12px;"></i>
                                            <span class="small text-muted fw-bold" style="font-size: 11px;">Variabel:</span>
                                            <select id="podesChartColSelect" onchange="updatePodesChart()" class="form-select form-select-sm border-0 bg-transparent fw-bold text-dark py-0 pe-4" style="max-width: 250px; font-size: 12px; cursor: pointer;">
                                                <!-- Populated dynamically via JS -->
                                            </select>
                                        </div>

                                        <div class="d-flex align-items-center gap-1.5 bg-light rounded-pill px-2.5 py-1 border">
                                            <i class="bi bi-pie-chart text-muted" style="font-size: 12px;"></i>
                                            <span class="small text-muted fw-bold" style="font-size: 11px;">Tipe:</span>
                                            <select id="podesChartTypeSelect" onchange="updatePodesChart()" class="form-select form-select-sm border-0 bg-transparent fw-bold text-dark py-0 pe-4" style="width: auto; font-size: 12px; cursor: pointer;">
                                                <option value="bar">Bar (Vertikal)</option>
                                                <option value="horizontalBar">Bar (Horizontal)</option>
                                                <option value="line">Line (Garis Trend)</option>
                                                <option value="doughnut">Doughnut (Proporsi)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-light text-muted border font-mono-num" style="font-size: 11px;" id="chartDesaCountBadge">
                                            0 Desa
                                        </span>
                                        <button type="button" onclick="updatePodesChart()" class="btn btn-sm btn-light border rounded-pill px-2.5 py-1 text-muted" title="Segarkan Grafik">
                                            <i class="bi bi-arrow-clockwise"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Mini Stat Cards for the Selected Variable -->
                                <div class="row g-2.5 mb-3" id="chartMiniStatsRow">
                                    <div class="col-6 col-md-3">
                                        <div class="p-2.5 rounded-3 border bg-success-subtle border-success-subtle text-success-emphasis">
                                            <div class="small fw-semibold text-truncate" style="font-size: 11px;" id="chartStatActiveLabel">Desa Terpilih</div>
                                            <div class="fs-5 fw-black font-mono-num text-success text-truncate" id="chartStatActiveValue">0</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="p-2.5 rounded-3 border bg-light text-secondary">
                                            <div class="small fw-semibold text-muted text-truncate" style="font-size: 11px;" id="chartStatAvgLabel">Rata-Rata Kec.</div>
                                            <div class="fs-5 fw-black font-mono-num text-dark text-truncate" id="chartStatAvgValue">0</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="p-2.5 rounded-3 border bg-light text-secondary">
                                            <div class="small fw-semibold text-muted text-truncate" style="font-size: 11px;" id="chartStatMaxLabel">Nilai Tertinggi</div>
                                            <div class="fs-5 fw-black font-mono-num text-primary text-truncate" id="chartStatMaxValue">0</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="p-2.5 rounded-3 border bg-light text-secondary">
                                            <div class="small fw-semibold text-muted text-truncate" style="font-size: 11px;" id="chartStatMinLabel">Nilai Terendah</div>
                                            <div class="fs-5 fw-black font-mono-num text-muted text-truncate" id="chartStatMinValue">0</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Chart Canvas Area -->
                                <div class="border rounded-3 p-3 bg-white position-relative" style="min-height: 380px;">
                                    <div id="chartCanvasWrapper" style="position: relative; height: 360px; width: 100%;">
                                        <canvas id="podesChartCanvas"></canvas>
                                    </div>
                                </div>
                                <div class="mt-2.5 d-flex flex-wrap align-items-center justify-content-between text-muted small gap-2" style="font-size: 11px;">
                                    <span id="chartFooterHint"><i class="bi bi-info-circle text-primary me-1"></i>Warna <strong class="text-success">hijau</strong> menandai wilayah aktif (<span id="chartActiveLegend">Desa</span>). Klik batang grafik untuk memilih.</span>
                                    <span class="font-mono-num fw-bold text-dark" id="chartKecamatanNameFooter">Kecamatan LASUSUA</span>
                                </div>
                            </div>

                            <!-- PANEL 4: MONITORING KELENGKAPAN -->
                            <div id="panelWorkMonitoring" style="display: none;">
                                <div class="d-flex align-items-center justify-content-between mb-2 small">
                                    <span class="text-muted">Diadopsi dari lembar <em>Monitoring Kelengkapan Data</em> BPS</span>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">100% Aman</span>
                                </div>
                                <div class="table-responsive border rounded-3">
                                    <table class="table table-hover align-middle table-sm mb-0">
                                        <thead class="table-light small fw-bold text-uppercase" style="font-size: 11px;">
                                            <tr>
                                                <th>#</th>
                                                <th>Tabel</th>
                                                <th>Variabel yang Dicek</th>
                                                <th>Sumber</th>
                                                <th>Status</th>
                                                <th>Keterangan / Temuan</th>
                                                <th>Prioritas</th>
                                            </tr>
                                        </thead>
                                        <tbody class="small" id="monitoringTableBody" style="font-size: 11px;">
                                            <!-- Monitoring Rows -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- =================================================================
                 TAB 3: MASTER DATA DESA (133 DESA)
                 ================================================================= -->
            <div id="tabContentDesa" style="display: none;">
                <div class="bento-card p-4">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 pb-3 mb-3 border-bottom">
                        <div>
                            <h5 class="fw-bold mb-1">Master Data Potensi Desa (133 Desa)</h5>
                            <small class="text-muted" id="desaTableCountText">Menampilkan seluruh 133 Desa dan Kelurahan di 15 Kecamatan</small>
                        </div>

                        <!-- Filters -->
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <div class="input-group input-group-sm" style="width: 210px;">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                                <input type="text" id="inputSearchDesa" onkeyup="filterDesaTable()" placeholder="Cari desa/komoditas..." class="form-control border-start-0 ps-0">
                            </div>
                            <select id="selectFilterKecamatan" onchange="filterDesaTable()" class="form-select form-select-sm" style="width: auto;">
                                <option value="">Semua Kecamatan (15)</option>
                                @foreach($kecamatanList as $k)
                                    <option value="{{ $k['nama'] }}">{{ $k['nama'] }}</option>
                                @endforeach
                            </select>
                            <select id="selectFilterStatus" onchange="filterDesaTable()" class="form-select form-select-sm" style="width: auto;">
                                <option value="">Semua Status</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="Maju">Maju</option>
                                <option value="Berkembang">Berkembang</option>
                            </select>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive border rounded-3">
                        <table class="table table-hover align-middle table-sm mb-0" id="tableDesaMaster">
                            <thead class="table-light small fw-bold text-uppercase" style="font-size: 11px;">
                                <tr>
                                    <th class="py-2.5 px-3">#</th>
                                    <th class="py-2.5">DESA / KELURAHAN</th>
                                    <th class="py-2.5">KECAMATAN</th>
                                    <th class="py-2.5">SKOR IPD</th>
                                    <th class="py-2.5">STATUS</th>
                                    <th class="py-2.5">KOMODITAS UTAMA</th>
                                    <th class="py-2.5">FASILITAS KES.</th>
                                    <th class="py-2.5 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="small">
                                @foreach($flatDesaList as $idx => $d)
                                    <tr class="desa-row"
                                        data-nama="{{ strtolower($d['nama_desa']) }}" 
                                        data-kecamatan="{{ $d['nama_kec'] }}" 
                                        data-status="{{ $d['status'] }}"
                                        data-komoditas="{{ strtolower($d['komoditas']) }}">
                                        <td class="px-3 text-muted font-mono-num">{{ $idx + 1 }}</td>
                                        <td class="fw-bold text-dark">{{ $d['nama_desa'] }}</td>
                                        <td class="text-muted">{{ $d['nama_kec'] }}</td>
                                        <td class="fw-bold font-mono-num text-success">{{ number_format($d['ipd'], 1) }}</td>
                                        <td>
                                            @if($d['status'] === 'Mandiri')
                                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Mandiri</span>
                                            @elseif($d['status'] === 'Maju')
                                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill">Maju</span>
                                            @else
                                                <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill">Berkembang</span>
                                            @endif
                                        </td>
                                        <td class="text-muted">{{ $d['komoditas'] }}</td>
                                        <td class="text-muted">{{ $d['faskes'] }}</td>
                                        <td class="text-center">
                                            <button type="button" onclick="editDesaData('{{ $d['nama_desa'] }}', '{{ $d['nama_kec'] }}', '{{ $d['ipd'] }}', '{{ $d['status'] }}', '{{ $d['komoditas'] }}', '{{ $d['faskes'] }}', '{{ $d['lat'] }}', '{{ $d['lng'] }}')" class="btn btn-sm btn-light border text-muted px-2 py-0.5 rounded-pill" title="Edit Profil Desa">
                                                <i class="bi bi-pencil me-1"></i>Edit
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- =================================================================
                 TAB 4: PEMETAAN SPASIAL WEBGIS
                 ================================================================= -->
            <div id="tabContentSpatial" style="display: none;">
                <div class="bento-card p-4">
                    <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 pb-3 mb-4 border-bottom">
                        <div>
                            <h5 class="fw-bold mb-1">Manajemen Koordinat Geospasial WebGIS</h5>
                            <small class="text-muted">Kelola titik koordinat Latitude dan Longitude untuk 15 Kantor Kecamatan dan 133 Desa</small>
                        </div>
                        <a href="/portal#sectionPeta" target="_blank" class="btn btn-sm btn-emerald rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5 align-self-start">
                            <i class="bi bi-map"></i>
                            <span>Buka Peta Interaktif</span>
                        </a>
                    </div>

                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="card bg-light border rounded-3 p-3">
                                <h6 class="fw-bold small text-uppercase mb-2" style="font-size: 11px;">Bounding Box Kolaka Utara</h6>
                                <ul class="list-unstyled small mb-0 text-muted lh-lg" style="font-size: 11px;">
                                    <li>• Latitude: <code class="font-mono-num bg-white px-1 py-0.5 rounded border">-2.80 s.d. -3.65</code></li>
                                    <li>• Longitude: <code class="font-mono-num bg-white px-1 py-0.5 rounded border">120.70 s.d. 121.25</code></li>
                                    <li>• Sistem Koordinat: WGS84 (EPSG:4326)</li>
                                    <li>• Peta Dasar: CartoDB Positron / OSM</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="table-responsive border rounded-3" style="max-height: 440px;">
                                <table class="table table-hover align-middle table-sm mb-0">
                                    <thead class="table-light sticky-top small fw-bold text-uppercase" style="font-size: 11px;">
                                        <tr>
                                            <th>WILAYAH KECAMATAN</th>
                                            <th>LATITUDE</th>
                                            <th>LONGITUDE</th>
                                            <th class="text-center">STATUS PETA</th>
                                        </tr>
                                    </thead>
                                    <tbody class="small" style="font-size: 11px;">
                                        @foreach($kecamatanList as $k)
                                            <tr>
                                                <td class="fw-bold text-dark">{{ $k['nama'] }}</td>
                                                <td class="font-mono-num text-muted">{{ $k['lat'] }}</td>
                                                <td class="font-mono-num text-muted">{{ $k['lng'] }}</td>
                                                <td class="text-center">
                                                    <span class="badge bg-success-subtle text-success rounded-pill">Aktif di Peta</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- =================================================================
                 TAB 5: KELOLA PENGGUNA & OPERATOR DESA
                 ================================================================= -->
            <div id="tabContentUsers" style="display: none;">
                <div class="bento-card p-4">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 pb-3 mb-3 border-bottom">
                        <div>
                            <h5 class="fw-bold mb-1">Manajemen Pengguna & Akun Operator Desa</h5>
                            <small class="text-muted">Kelola akun staf administrator BPS dan akun operator masing-masing 133 Desa/Kelurahan</small>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" onclick="openNewUserModal()" class="btn btn-sm btn-emerald rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5 shadow-2xs">
                                <i class="bi bi-person-plus-fill"></i>
                                <span>Tambah Akun Baru</span>
                            </button>
                            <a href="/admin/users/export-csv" class="btn btn-sm btn-light border rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5" title="Unduh CSV seluruh akun">
                                <i class="bi bi-download text-success"></i>
                                <span>Ekspor CSV Akun</span>
                            </a>
                        </div>
                    </div>

                    <!-- Filter & Search Bar Pengguna -->
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2.5 mb-3 bg-light p-2.5 rounded-3 border">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <div class="input-group input-group-sm" style="width: 220px;">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                                <input type="text" id="inputSearchUser" onkeyup="filterUserTable()" placeholder="Cari nama, email, desa..." class="form-control border-start-0 ps-0 bg-white">
                            </div>
                            <select id="selectFilterUserRole" onchange="filterUserTable()" class="form-select form-select-sm" style="width: auto;">
                                <option value="">Semua Peran ({{ $users->count() }})</option>
                                <option value="admin">Administrator BPS ({{ $users->where('role', 'admin')->count() }})</option>
                                <option value="operator_desa">Operator Desa ({{ $users->where('role', 'operator_desa')->count() }})</option>
                            </select>
                            <select id="selectFilterUserKecamatan" onchange="filterUserTable()" class="form-select form-select-sm" style="width: auto;">
                                <option value="">Semua Kecamatan</option>
                                @foreach($kecamatanList as $k)
                                    <option value="{{ strtoupper($k['nama']) }}">{{ $k['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <small class="text-muted fw-bold" id="userCountSummary" style="font-size: 11px;">
                            Total: {{ $users->count() }} Pengguna Terdaftar
                        </small>
                    </div>

                    <!-- Table Pengguna -->
                    <div class="table-responsive border rounded-3">
                        <table class="table table-hover align-middle table-sm mb-0">
                            <thead class="table-light small fw-bold text-uppercase" style="font-size: 11px;">
                                <tr>
                                    <th class="py-2.5 px-3">#</th>
                                    <th class="py-2.5">NAMA LENGKAP / OPERATOR</th>
                                    <th class="py-2.5">EMAIL / USERNAME LOGIN</th>
                                    <th class="py-2.5">PERAN (ROLE)</th>
                                    <th class="py-2.5">WILAYAH PENUGASAN</th>
                                    <th class="py-2.5">KONTAK / HP</th>
                                    <th class="py-2.5 text-center">STATUS</th>
                                    <th class="py-2.5 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="small" style="font-size: 11px;">
                                @foreach($users as $idx => $u)
                                    <tr class="user-row" 
                                        data-name="{{ strtolower($u->name) }}" 
                                        data-email="{{ strtolower($u->email) }}" 
                                        data-role="{{ $u->role }}" 
                                        data-kec="{{ strtoupper($u->kecamatan ?? '') }}" 
                                        data-desa="{{ strtolower($u->desa ?? '') }}">
                                        <td class="px-3 text-muted font-mono-num">{{ $idx + 1 }}</td>
                                        <td class="fw-bold text-dark">{{ $u->name }}</td>
                                        <td class="text-success font-mono-num">{{ $u->email }}</td>
                                        <td>
                                            @if($u->role === 'admin')
                                                <span class="badge bg-success text-white rounded-pill px-2.5 py-1">
                                                    <i class="bi bi-shield-lock-fill me-1"></i>Admin BPS
                                                </span>
                                            @else
                                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1">
                                                    <i class="bi bi-house-door-fill me-1"></i>Operator Desa
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($u->role === 'admin')
                                                <span class="text-muted fst-italic">Seluruh Kab. Kolaka Utara</span>
                                            @else
                                                <strong class="text-dark">Desa {{ $u->desa }}</strong><br>
                                                <span class="text-muted" style="font-size: 10px;">Kec. {{ $u->kecamatan }}</span>
                                            @endif
                                        </td>
                                        <td class="font-mono-num text-muted">{{ $u->phone ?? '-' }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-success-subtle text-success rounded-pill">Aktif</span>
                                        </td>
                                        <td class="text-center">
                                            @if($u->id !== $admin->id)
                                                <form method="POST" action="/admin/users/{{ $u->id }}" onsubmit="return confirm('Hapus akun ini?');" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger p-1 border-0" title="Hapus Pengguna">
                                                        <i class="bi bi-trash3"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-muted small fw-bold">(Akun Anda)</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <!-- =========================================================================
         BOOTSTRAP MODAL: SINKRONISASI 11 SPREADSHEET PODES
         ========================================================================= -->
    <div class="modal fade" id="modalSyncSpreadsheet" tabindex="-1" aria-labelledby="modalSyncSpreadsheetLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom py-3 px-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-3 bg-success bg-opacity-10 text-success p-2">
                            <i class="bi bi-file-earmark-spreadsheet fs-5"></i>
                        </div>
                        <div>
                            <h6 class="modal-title fw-bold" id="modalSyncSpreadsheetLabel">Sinkronisasi Spreadsheet PODES ({{ count($podesCatalog) }} File)</h6>
                            <small class="text-muted font-mono-num" style="font-size: 11px;">Folder master: storage/app/podes_raw/</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="small text-muted mb-3">
                        Sistem mendeteksi <strong>{{ count($podesCatalog) }} File Excel PODES 2025</strong> yang telah diekstrak. Tekan tombol di bawah untuk menyinkronkan ulang seluruh data tabel ke database.
                    </p>

                    <div class="border rounded-3 p-2 bg-light overflow-y-auto" style="max-height: 250px;">
                        @foreach($podesCatalog as $cat)
                            <div class="d-flex align-items-center justify-content-between p-2 bg-white rounded-3 border mb-1 small">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-file-earmark-excel-fill text-success fs-6"></i>
                                    <span class="fw-bold text-dark">{{ $cat['file'] }}</span>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-light text-muted border font-mono-num">{{ count($cat['tables'] ?? []) }} Tabel</span>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle font-mono-num">{{ count($cat['monitoring'] ?? []) }} Var</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer border-top py-2 px-4">
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3" data-bs-dismiss="modal">Tutup</button>
                    <form method="POST" action="/admin/podes/sync">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-emerald rounded-pill px-4">
                            <i class="bi bi-arrow-repeat me-1"></i>Sinkronkan Ulang Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- =========================================================================
         BOOTSTRAP MODAL: EDIT PROFIL DESA
         ========================================================================= -->
    <div class="modal fade" id="modalEditDesa" tabindex="-1" aria-labelledby="modalEditDesaTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom py-3 px-4">
                    <h6 class="modal-title fw-bold" id="modalEditDesaTitle">Edit Potensi Desa</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form onsubmit="saveDesaModalData(event)">
                    <div class="modal-body p-4 small">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Desa / Kelurahan <span class="text-danger">*</span></label>
                            <input type="text" id="editModalNamaDesa" class="form-control form-control-sm bg-light fw-bold" placeholder="Contoh: Desa Pitulua" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kecamatan <span class="text-danger">*</span></label>
                            <select id="editModalNamaKec" class="form-select form-select-sm fw-bold">
                                @foreach($kecamatanList as $k)
                                    <option value="{{ $k['nama'] }}">{{ $k['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-bold">Skor IPD <span class="text-muted fw-normal font-mono-num">(0-100)</span></label>
                                <input type="number" step="0.1" min="0" max="100" id="editModalIpd" class="form-control form-control-sm font-mono-num fw-bold" placeholder="70.0" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Status Kemandirian</label>
                                <select id="editModalStatus" class="form-select form-select-sm fw-bold">
                                    <option value="Mandiri">Mandiri (IPD &ge; 70)</option>
                                    <option value="Maju">Maju (50 &le; IPD &lt; 70)</option>
                                    <option value="Berkembang">Berkembang (IPD &lt; 50)</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Komoditas Utama</label>
                            <input type="text" id="editModalKomoditas" class="form-control form-control-sm fw-bold" placeholder="Contoh: Kakao, Cengkeh, Kelapa">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Fasilitas Kesehatan</label>
                            <input type="text" id="editModalFaskes" class="form-control form-control-sm fw-bold" placeholder="Contoh: Poskesdes / Pustu">
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="form-label fw-bold">Latitude <span class="text-muted fw-normal font-mono-num">(Lintang)</span></label>
                                <input type="number" step="any" id="editModalLat" class="form-control form-control-sm font-mono-num" placeholder="-3.5291">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Longitude <span class="text-muted fw-normal font-mono-num">(Bujur)</span></label>
                                <input type="number" step="any" id="editModalLng" class="form-control form-control-sm font-mono-num" placeholder="120.9855">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top py-2 px-4">
                        <button type="button" class="btn btn-sm btn-light border rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="btnSaveDesaModal" class="btn btn-sm btn-emerald rounded-pill px-4">
                            <i class="bi bi-check2 me-1"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- =========================================================================
         BOOTSTRAP MODAL: TAMBAH ADMIN BARU
         ========================================================================= -->
    <div class="modal fade" id="modalNewUser" tabindex="-1" aria-labelledby="modalNewUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom py-3 px-4">
                    <h6 class="modal-title fw-bold" id="modalNewUserLabel">Tambah Akun Administrator</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/admin/users">
                    @csrf
                    <div class="modal-body p-4 small">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" name="name" required placeholder="Contoh: Rini Jamal" class="form-control form-control-sm fw-bold">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat Email BPS / Gmail</label>
                            <input type="email" name="email" required placeholder="nama@bps.go.id" class="form-control form-control-sm fw-bold">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kata Sandi (Password)</label>
                            <input type="password" name="password" required minlength="6" placeholder="Minimal 6 karakter" class="form-control form-control-sm fw-bold">
                        </div>
                    </div>
                    <div class="modal-footer border-top py-2 px-4">
                        <button type="button" class="btn btn-sm btn-light border rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-emerald rounded-pill px-4">Simpan Pengguna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.3.3 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js 4 (Local with CDN Fallback) -->
    <script src="/vendor/chart.umd.min.js"></script>
    <script>
        if (typeof Chart === 'undefined') {
            document.write('<script src="https://cdn.jsdelivr.net/npm/chart.js"><\/script>');
        }
    </script>

    <!-- =========================================================================
         JAVASCRIPT LOGIC
         ========================================================================= -->
    <script>
        // Master Data Kecamatan & Desa
        const KECAMATAN_DATA = @json($kecamatanList);
        const PODES_CATALOG = @json($podesCatalog);
        const DESCAN = @json($descan);
        const STATS = @json($stats);

        // State Workspace PODES
        let currentKec = 'LASUSUA';
        let currentDesa = '';
        let currentModule = 'KETERANGAN UMUM DESA.xlsx';
        let currentTable = '1.1';
        let currentColumns = [];
        let currentDesaRow = null;
        let currentKecamatanRows = [];
        let currentAllRows = [];
        let currentWorkMode = 'form';
        let podesChartInstance = null;
        let chartCompareScope = 'desa';

        // 12 Sektoral Modules
        const MODULE_DEFS = [
            { id: 'KETERANGAN UMUM DESA.xlsx', name: '1. Keterangan Umum Desa', icon: 'bi-building' },
            { id: 'KEPENDUDUKAN.xlsx', name: '2. Kependudukan', icon: 'bi-people' },
            { id: 'PERUMAHAN DAN LINGKUNGAN_.xlsx', name: '3. Perumahan & Lingkungan', icon: 'bi-house-heart' },
            { id: 'PENDIDIKAN DAN KESEHATAN.xlsx', name: '4. Pendidikan & Kesehatan', icon: 'bi-mortarboard' },
            { id: 'ANGKUTAN, KOMUNIKASI, DAN INFORMASI.xlsx', name: '5. Angkutan & Komunikasi', icon: 'bi-broadcast-pin' },
            { id: 'SARANA EKONOMI DAN INDUSTRI.xlsx', name: '6. Sarana Ekonomi & Industri', icon: 'bi-shop' },
            { id: 'KEUANGAN DAN ASET DESA 2025.xlsx', name: '7. Keuangan & Aset Desa', icon: 'bi-cash-coin' },
            { id: 'KETERANGAN PEMERINTAH DESA_KELURAHAN 2025.xlsx', name: '8. Pemerintahan Desa 2025', icon: 'bi-award' },
            { id: 'BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx', name: '9. Bencana Alam & Keamanan', icon: 'bi-shield-exclamation' },
            { id: 'INFRASTRUKTUR PENDIDIKAN.xlsx', name: '10. Infrastruktur Pendidikan', icon: 'bi-backpack' },
            { id: 'INFRASTRUKTUR KESEHATAN.xlsx', name: '11. Infrastruktur Kesehatan', icon: 'bi-hospital' },
            { id: 'INFRASTRUKTUR EKONOMI.xlsx', name: '12. Infrastruktur Ekonomi', icon: 'bi-bank' }
        ];

        // Pemetaan Nama Deskriptif Sub-Tabel PODES (12 Klaster)
        const PODES_SUBTABLE_NAMES = {
            // Modul 1: Keterangan Umum Desa
            '1.1': 'Status Pemerintahan',
            '1.2': 'Kawasan Hutan',
            '1.3': 'Lokasi Terhadap Laut',
            '1.4': 'Sumber Penghasilan Utama',
            '1.5': 'Sub Sektor Pertanian',

            // Modul 2: Kependudukan
            'KEPENDUDUKAN.xlsx_2.1': 'Distribusi & Kepadatan Penduduk',
            'KEPENDUDUKAN.xlsx_2.2': 'Kelompok Umur & Jenis Kelamin',

            // Modul 3: Perumahan & Lingkungan
            'PERUMAHAN DAN LINGKUNGAN_.xlsx_2.1': 'Pengguna Listrik',
            'PERUMAHAN DAN LINGKUNGAN_.xlsx_2.2': 'Penerangan Jalan',
            '2.1': 'Pengguna Listrik',
            '2.2': 'Penerangan Jalan',
            '2.3': 'Bahan Bakar Memasak',
            '2.4': 'Pangkalan BBM / LPG',
            '2.5': 'Pencemaran Lingkungan',
            '2.6': 'Sumber Pencemaran',
            '2.7': 'Pelestarian Lingkungan',
            '2.8': 'Mitigasi Perubahan Iklim',

            // Modul 3: Pendidikan & Kesehatan
            '3.1': 'Sarana Pendidikan',
            '3.2': 'Sarana Kesehatan',
            '3.3': 'Kegiatan UKBM',

            // Modul 4: Angkutan & Komunikasi
            '4.1': 'Prasarana Transportasi',
            '4.2': 'Angkutan Umum',
            '4.3': 'Angkutan Online',
            '4.4': 'Permukaan Jalan Darat',
            '4.5': 'Menara BTS & Sinyal HP',
            '4.6': 'Sinyal Internet',
            '4.7': 'Pos & Sarana Komunikasi',

            // Modul 5: Sarana Ekonomi & Industri
            '5.1': 'Perdagangan & Akomodasi',
            '5.2': 'Pertokoan & Pasar',
            '5.3': 'Lembaga Perbankan',
            '5.4': 'Koperasi',
            '5.5': 'Fasilitas Kredit / KUR',
            '5.6': 'Industri Mikro & Kecil',
            '5.7': 'Produk Unggulan',

            // Modul 6: Keuangan & Aset Desa
            '6.1': 'Sistem Informasi Desa',
            '6.2': 'Siskeudes & Keuangan',
            '6.3': 'BUMDes & Badan Usaha',
            'Sambungan 6.3': 'Aset & Tanah Kas Desa',
            '6.4': 'Peraturan Desa',

            // Modul 7: Keterangan Pemerintah Desa
            '7.1': 'Aparatur Pemdes',
            '7.2': 'Gender Kades & Sekdes',
            '7.3': 'Kelompok Umur Kades',
            '7.4': 'Kelompok Umur Sekdes',
            '7.5': 'Pendidikan Kades',
            '7.6': 'Pendidikan Sekdes',

            // Modul 8: Bencana Alam & Keamanan
            '8.1': 'Mitigasi Bencana',
            '8.2': 'Kejadian Bencana Alam',
            '8.3': 'Aktivitas Emisi GRK',
            '8.4': 'Dampak Perubahan Iklim',
            '8.5': 'Perkelahian Massal',
            '8.6': 'Korban Perkelahian',
            '8.7': 'Inisiator Perdamaian',
            '8.8': 'Keamanan Lingkungan / Ronda',

            // Modul 9: Infrastruktur Pendidikan
            '9.1': 'SD / MI',
            '9.2': 'SMP / MTs',
            '9.3': 'SMA / MA',
            '9.4': 'SMK',
            '9.5': 'Perguruan Tinggi',

            // Modul 10: Infrastruktur Kesehatan
            '10.1': 'Rumah Sakit & Balai Kes.',
            '10.2': 'Puskesmas',
            '10.3': 'Klinik, Praktik & Apotek',

            // Modul 11: Infrastruktur Ekonomi
            '11.1': 'Pertokoan & Pasar',
            '11.2': 'Sarana Perdagangan',
            '11.3': 'Sarana Akomodasi',
            '11.4': 'Lembaga Perbankan'
        };

        function getPodesSubtableName(table) {
            if (!table) return '';
            const sheet = table.sheet || table;
            const subKey = (currentModule ? currentModule + '_' : '') + sheet;
            if (PODES_SUBTABLE_NAMES[subKey]) return PODES_SUBTABLE_NAMES[subKey];
            if (PODES_SUBTABLE_NAMES[sheet]) return PODES_SUBTABLE_NAMES[sheet];
            if (table.title) {
                let cleaned = table.title
                    .replace(/^Tabel\s+[0-9.]+\s*:\s*/i, '')
                    .replace(/^[0-9.]+\s*/i, '')
                    .replace(/^BANYAKNYA\s+(DESA\/KELURAHAN|KELOMPOK|SARANA|LEMBAGA|DESA)\s+(MENURUT|DENGAN)?\s*/i, '')
                    .replace(/\s+DI\s+KABUPATEN\s+KOLAKA\s+UTARA.*$/i, '')
                    .replace(/\s+MENURUT\s+DESA\/KELURAHAN.*$/i, '')
                    .trim();
                return cleaned.charAt(0).toUpperCase() + cleaned.slice(1);
            }
            return '';
        }

        const TAB_NAMES = {
            overview: 'Dashboard Desa',
            podes: 'Pengisian Data PODES',
            desa: 'Profil Desa (133)',
            spatial: 'Pemetaan Spasial WebGIS',
            users: 'Kelola Pengguna'
        };

        let syncModal = null;
        let editDesaModal = null;
        let newUserModal = null;

        document.addEventListener('DOMContentLoaded', () => {
            syncModal = new bootstrap.Modal(document.getElementById('modalSyncSpreadsheet'));
            editDesaModal = new bootstrap.Modal(document.getElementById('modalEditDesa'));
            newUserModal = new bootstrap.Modal(document.getElementById('modalNewUser'));

            initPodesWorkspace();

            // Auto-sinkronisasi Skor IPD dengan Status Kemandirian
            const ipdInput = document.getElementById('editModalIpd');
            if (ipdInput) {
                ipdInput.addEventListener('input', function() {
                    const score = parseFloat(this.value);
                    const statusSelect = document.getElementById('editModalStatus');
                    if (!isNaN(score) && statusSelect) {
                        if (score >= 70.0) {
                            statusSelect.value = 'Mandiri';
                        } else if (score >= 50.0) {
                            statusSelect.value = 'Maju';
                        } else {
                            statusSelect.value = 'Berkembang';
                        }
                    }
                });
            }

            // Auto-isi koordinat default kecamatan saat ganti kecamatan di mode input desa baru
            const kecSelect = document.getElementById('editModalNamaKec');
            if (kecSelect) {
                kecSelect.addEventListener('change', function() {
                    const namaDesaInput = document.getElementById('editModalNamaDesa');
                    const isNew = namaDesaInput && !namaDesaInput.readOnly;
                    if (isNew && Array.isArray(KECAMATAN_DATA)) {
                        const matched = KECAMATAN_DATA.find(k => k.nama.toLowerCase() === this.value.toLowerCase());
                        if (matched) {
                            if (matched.lat) document.getElementById('editModalLat').value = matched.lat;
                            if (matched.lng) document.getElementById('editModalLng').value = matched.lng;
                        }
                    }
                });
            }
        });

        // ===== DESCAN: navigasi & grafik dashboard =====
        function goToDescanSection(id) {
            switchAdminTab('overview');
            setTimeout(() => {
                const el = document.getElementById(id);
                if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 50);
        }

        function initDescanCharts() {
            if (typeof Chart === 'undefined') return;
            Chart.defaults.font.family = "'Plus Jakarta Sans', system-ui, sans-serif";
            Chart.defaults.font.size = 11;
            Chart.defaults.color = '#6b7a74';
            const grid = { color: '#eef2f0' };
            const hijau = '#0f6b4a', mint = '#6ee7b7', amber = '#f59e0b', merah = '#dc2626';

            // 1. Doughnut status kemandirian
            const elStatus = document.getElementById('dcChartStatus');
            if (elStatus) new Chart(elStatus, {
                type: 'doughnut',
                data: {
                    labels: ['Mandiri', 'Maju', 'Berkembang'],
                    datasets: [{ data: [STATS.mandiri_count, STATS.maju_count, STATS.berkembang_count],
                        backgroundColor: [hijau, mint, amber], borderWidth: 2, borderColor: '#fff' }]
                },
                options: { maintainAspectRatio: false, cutout: '65%',
                    plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } } } }
            });

            // 2. Bar IPD per kecamatan
            const elIpd = document.getElementById('dcChartIpd');
            if (elIpd) new Chart(elIpd, {
                type: 'bar',
                data: {
                    labels: DESCAN.ipd_kecamatan.map(k => k.nama),
                    datasets: [{ label: 'IPD', data: DESCAN.ipd_kecamatan.map(k => k.ipd),
                        backgroundColor: DESCAN.ipd_kecamatan.map(k => k.ipd >= 70 ? hijau : (k.ipd >= 50 ? mint : amber)),
                        borderRadius: 4, maxBarThickness: 26 }]
                },
                options: { maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { x: { grid: { display: false }, ticks: { maxRotation: 60, minRotation: 40 } },
                              y: { grid: grid, beginAtZero: true } } }
            });

            // 3. Kelengkapan PODES per klaster
            const elKel = document.getElementById('dcChartKelengkapan');
            if (elKel) new Chart(elKel, {
                type: 'bar',
                data: {
                    labels: DESCAN.kelengkapan.map((k, i) => (i + 1) + '. ' + k.label.split(' ')[0] + ' ' + (k.label.split(' ')[1] || '')),
                    datasets: [
                        { label: 'Terisi', data: DESCAN.kelengkapan.map(k => k.terisi), backgroundColor: hijau, borderRadius: 4 },
                        { label: 'Belum', data: DESCAN.kelengkapan.map(k => k.total - k.terisi), backgroundColor: '#e3e9e6', borderRadius: 4 }
                    ]
                },
                options: { indexAxis: 'y', maintainAspectRatio: false,
                    plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } } },
                    scales: { x: { stacked: true, grid: grid, beginAtZero: true }, y: { stacked: true, grid: { display: false } } } }
            });

            // 4. Tren skor pre/post test
            const elSkor = document.getElementById('dcChartSkor');
            if (elSkor) new Chart(elSkor, {
                type: 'line',
                data: {
                    labels: DESCAN.skor_tren.labels,
                    datasets: [
                        { label: 'Pre-test', data: DESCAN.skor_tren.pretest, borderColor: amber, backgroundColor: amber, tension: .35, pointRadius: 3 },
                        { label: 'Post-test', data: DESCAN.skor_tren.posttest, borderColor: hijau, backgroundColor: 'rgba(15,107,74,.10)', fill: true, tension: .35, pointRadius: 3 }
                    ]
                },
                options: { maintainAspectRatio: false,
                    plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } } },
                    scales: { x: { grid: { display: false } }, y: { grid: grid, min: 50, max: 100 } } }
            });
        }
        document.addEventListener('DOMContentLoaded', initDescanCharts);

        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            if (sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                backdrop.style.display = 'none';
            } else {
                sidebar.classList.add('show');
                backdrop.style.display = 'block';
            }
        }

        function switchAdminTab(tab) {
            const tabs = ['overview', 'podes', 'desa', 'spatial', 'users'];
            tabs.forEach(t => {
                const content = document.getElementById('tabContent' + t.charAt(0).toUpperCase() + t.slice(1));
                const btn = document.getElementById('tabBtn' + t.charAt(0).toUpperCase() + t.slice(1));
                if (t === tab) {
                    if (content) content.style.display = 'block';
                    if (btn) btn.classList.add('active');
                } else {
                    if (content) content.style.display = 'none';
                    if (btn) btn.classList.remove('active');
                }
            });

            const topbarTitle = document.getElementById('topbarActiveTabName');
            if (topbarTitle && TAB_NAMES[tab]) {
                topbarTitle.textContent = TAB_NAMES[tab];
            }

            if (tab === 'podes') {
                loadPodesTableData();
            }

            if (window.innerWidth < 992) {
                const sidebar = document.getElementById('adminSidebar');
                const backdrop = document.getElementById('sidebarBackdrop');
                sidebar.classList.remove('show');
                backdrop.style.display = 'none';
            }
        }

        function initPodesWorkspace() {
            renderModulesSidebar();
            populateDesaSelect();
            loadPodesTableData();
        }

        // Render Left Modules Nav (Clean & Compact)
        function renderModulesSidebar() {
            const container = document.getElementById('podesModulesContainer');
            if (!container) return;

            let html = '';
            MODULE_DEFS.forEach(mod => {
                const cat = PODES_CATALOG.find(c => c.file === mod.id);
                const tables = cat ? cat.tables : [];
                const isActive = (mod.id === currentModule);

                html += `
                    <button type="button" onclick="selectPodesModule('${mod.id}')" class="podes-mod-item ${isActive ? 'active' : ''}">
                        <div class="d-flex align-items-center gap-2 overflow-hidden">
                            <i class="bi ${mod.icon} fs-6 ${isActive ? 'text-success' : 'text-muted'}"></i>
                            <span class="small text-truncate ${isActive ? 'fw-bold text-success' : 'text-dark'}" style="font-size: 11.5px;">${mod.name}</span>
                        </div>
                        <span class="badge ${isActive ? 'bg-success text-white' : 'bg-light text-muted border'} rounded-pill font-mono-num" style="font-size: 9px;">${tables.length}</span>
                    </button>
                `;
            });

            container.innerHTML = html;
            renderSubTablesHorizontalBar();
        }

        // Render Sub-Table Pills Bar at the top of work area
        function renderSubTablesHorizontalBar() {
            const bar = document.getElementById('subTablesHorizontalBar');
            if (!bar) return;

            const cat = PODES_CATALOG.find(c => c.file === currentModule);
            const tables = cat ? cat.tables : [];

            let html = '';
            tables.forEach(t => {
                const isActive = (t.sheet === currentTable);
                const subKey = currentModule + '_' + t.sheet;
                const subName = PODES_SUBTABLE_NAMES[subKey] || PODES_SUBTABLE_NAMES[t.sheet] || getPodesSubtableName(t);
                const sheetPrefix = t.sheet.toString().startsWith('Sambungan')
                    ? t.sheet
                    : `Tabel ${t.sheet}`;
                const labelText = subName ? `${sheetPrefix}: ${subName}` : sheetPrefix;

                html += `
                    <button type="button" 
                            onclick="selectPodesTable('${t.sheet}')" 
                            class="subtable-pill ${isActive ? 'active' : ''}"
                            title="${t.title || labelText}">
                        ${isActive ? '<i class="bi bi-check-circle-fill me-1.5"></i>' : ''}${labelText}
                    </button>
                `;
            });

            bar.innerHTML = html;
        }

        function selectPodesModule(moduleId) {
            currentModule = moduleId;
            const cat = PODES_CATALOG.find(c => c.file === moduleId);
            if (cat && cat.tables.length > 0) {
                currentTable = cat.tables[0].sheet;
            }
            renderModulesSidebar();
            loadPodesTableData();
        }

        function selectPodesTable(tableSheet) {
            currentTable = tableSheet;
            renderSubTablesHorizontalBar();
            loadPodesTableData();
        }

        function populateDesaSelect() {
            const kecSelect = document.getElementById('podesSelectKec');
            const desaSelect = document.getElementById('podesSelectDesa');
            if (!kecSelect || !desaSelect) return;

            currentKec = kecSelect.value;
            const kecObj = KECAMATAN_DATA.find(k => k.nama.toUpperCase() === currentKec);
            const desaList = kecObj ? (kecObj.desaList || kecObj.desa_list || []) : [];

            desaSelect.innerHTML = '';
            if (desaList.length > 0) {
                desaList.forEach((d, idx) => {
                    const opt = document.createElement('option');
                    opt.value = d.nama.toUpperCase();
                    opt.textContent = `${idx + 1}. ${d.nama}`;
                    desaSelect.appendChild(opt);
                });
                currentDesa = desaList[0].nama.toUpperCase();
            }

            updateActiveDesaBadge();
        }

        function onPodesKecChange() {
            populateDesaSelect();
            loadPodesTableData();
        }

        function onPodesDesaChange() {
            const desaSelect = document.getElementById('podesSelectDesa');
            if (desaSelect) {
                currentDesa = desaSelect.value;
                updateActiveDesaBadge();
                loadPodesTableData();
            }
        }

        function updateActiveDesaBadge() {
            const badge = document.getElementById('podesActiveDesaBadge');
            if (badge) {
                badge.innerHTML = `<span class="spinner-grow spinner-grow-sm text-success" style="width: 6px; height: 6px;"></span> <span>Desa ${currentDesa} (Kec. ${currentKec})</span>`;
            }
            const matrixKecTitle = document.getElementById('matrixKecTitle');
            if (matrixKecTitle) {
                matrixKecTitle.textContent = `Kec. ${currentKec}`;
            }
        }

        function navigatePodesDesa(direction) {
            const desaSelect = document.getElementById('podesSelectDesa');
            if (!desaSelect) return;

            let newIdx = desaSelect.selectedIndex + direction;
            if (newIdx >= 0 && newIdx < desaSelect.options.length) {
                desaSelect.selectedIndex = newIdx;
                currentDesa = desaSelect.value;
                updateActiveDesaBadge();
                loadPodesTableData();
            }
        }

        function switchWorkAreaMode(mode) {
            currentWorkMode = mode;
            ['form', 'matrix', 'chart', 'monitoring'].forEach(m => {
                const btn = document.getElementById('modeBtn' + m.charAt(0).toUpperCase() + m.slice(1));
                const panel = document.getElementById('panelWork' + m.charAt(0).toUpperCase() + m.slice(1));
                if (btn) {
                    if (m === mode) {
                        btn.className = 'btn btn-success fw-bold px-3';
                    } else {
                        btn.className = 'btn btn-outline-secondary px-3';
                    }
                }
                if (panel) {
                    panel.style.display = (m === mode) ? 'block' : 'none';
                }
            });

            if (mode === 'chart') {
                renderPodesChart();
            }
        }

        // Clean values formatting (e.g., '1,0' or '1.0' to '1')
        function formatCleanValue(val) {
            if (val === null || val === undefined) return '0';
            val = String(val).trim();
            if (val === '-' || val === '−') return '0';
            if (val.endsWith('.0') || val.endsWith(',0')) {
                return val.slice(0, -2);
            }
            return val;
        }

        // Load PODES Table Data via API
        async function loadPodesTableData() {
            const spinner = document.getElementById('formLoadingSpinner');
            const inputsContainer = document.getElementById('formInputsContainer');
            if (spinner) spinner.style.display = 'block';

            try {
                const url = `/admin/podes/table-data?module=${encodeURIComponent(currentModule)}&table=${encodeURIComponent(currentTable)}&kecamatan=${encodeURIComponent(currentKec)}&desa=${encodeURIComponent(currentDesa)}`;
                const res = await fetch(url);
                const data = await res.json();

                if (spinner) spinner.style.display = 'none';

                if (data.success) {
                    currentColumns = data.columns || [];
                    currentDesaRow = data.desa_row;
                    currentKecamatanRows = data.kecamatan_rows || [];
                    currentAllRows = data.all_rows || [];

                    // Update Table Header
                    document.getElementById('currentTableBadge').textContent = `Tabel ${data.table}`;
                    document.getElementById('currentModuleBreadcrumb').textContent = currentModule.replace('.xlsx', '');
                    document.getElementById('currentTableTitle').textContent = data.title;

                    renderSubTablesHorizontalBar();
                    renderFormInputs(data.columns, data.desa_row);
                    renderMatrixTable(data.columns, data.kecamatan_rows);
                    renderMonitoringTable(data.monitoring);
                    if (currentWorkMode === 'chart') {
                        renderPodesChart();
                    }
                }
            } catch (err) {
                console.error(err);
                if (spinner) spinner.style.display = 'none';
            }
        }

        // Render Dynamic Form Inputs (Clean Variable Cards)
        function renderFormInputs(columns, desaRow) {
            const container = document.getElementById('formInputsContainer');
            if (!container) return;

            const values = desaRow ? desaRow.values : {};
            let html = '';

            columns.forEach(col => {
                const rawVal = values[col.col] !== undefined ? values[col.col] : '0';
                const displayVal = formatCleanValue(rawVal);
                const isNumeric = !isNaN(displayVal.replace(',', '.')) && displayVal !== '';

                html += `
                    <div class="col-md-6 col-xl-4">
                        <div class="variable-card h-100 d-flex flex-column justify-content-between">
                            <label class="form-label fw-bold text-dark small mb-2 d-flex align-items-center justify-content-between">
                                <span class="text-truncate me-2" title="${col.label}">${col.label}</span>
                                <span class="badge bg-light text-muted border font-mono-num" style="font-size: 9px;">Kol ${col.col}</span>
                            </label>
                            <input type="${isNumeric ? 'number' : 'text'}" 
                                   name="col_${col.col}" 
                                   data-col="${col.col}"
                                   value="${displayVal}" 
                                   class="form-control form-control-sm font-mono-num fw-bold text-dark fs-6 podes-form-input bg-light border-secondary-subtle">
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;
        }

        // Render Matrix Table Se-Kecamatan
        function renderMatrixTable(columns, rows) {
            const head = document.getElementById('matrixTableHead');
            const body = document.getElementById('matrixTableBody');
            if (!head || !body) return;

            let headHtml = `
                <tr>
                    <th class="py-2 px-3">DESA / KELURAHAN</th>
                    ${columns.map(c => `<th class="py-2">${c.label}</th>`).join('')}
                </tr>
            `;
            head.innerHTML = headHtml;

            let bodyHtml = '';
            rows.forEach(r => {
                const isCurrent = !r.is_total && r.desa && r.desa.toUpperCase() === currentDesa;
                const isKecTotal = r.is_total;

                bodyHtml += `
                    <tr class="${isKecTotal ? 'table-secondary fw-bold text-dark' : isCurrent ? 'table-success fw-bold text-success-emphasis' : ''}" style="cursor: pointer;" onclick="${!isKecTotal ? `selectDesaFromMatrix('${r.desa}')` : ''}">
                        <td class="px-3">
                            ${isKecTotal ? `[TOTAL KECAMATAN]` : r.desa}
                            ${isCurrent ? '<span class="badge bg-success ms-1" style="font-size: 8px;">Terpilih</span>' : ''}
                        </td>
                        ${columns.map(c => `
                            <td class="font-mono-num">${formatCleanValue(r.values[c.col])}</td>
                        `).join('')}
                    </tr>
                `;
            });

            body.innerHTML = bodyHtml;
        }

        function selectDesaFromMatrix(desaName) {
            const desaSelect = document.getElementById('podesSelectDesa');
            if (desaSelect) {
                desaSelect.value = desaName.toUpperCase();
                currentDesa = desaName.toUpperCase();
                updateActiveDesaBadge();
                switchWorkAreaMode('form');
                loadPodesTableData();
            }
        }

        // Render Monitoring Table from original Sheet
        function renderMonitoringTable(monitoringItems) {
            const body = document.getElementById('monitoringTableBody');
            if (!body) return;

            if (!monitoringItems || monitoringItems.length === 0) {
                body.innerHTML = `<tr><td colspan="7" class="text-center py-4 text-muted">Tidak ada catatan monitoring untuk tabel ini.</td></tr>`;
                return;
            }

            let html = '';
            monitoringItems.forEach((m, idx) => {
                html += `
                    <tr>
                        <td class="text-muted font-mono-num">${idx + 1}</td>
                        <td class="font-mono-num fw-bold text-dark">${m.tabel || currentTable}</td>
                        <td class="fw-bold">${m.variabel}</td>
                        <td class="text-muted">${m.sumber || 'PODES 2025'}</td>
                        <td>
                            <span class="badge ${m.status === 'Aman' ? 'bg-success-subtle text-success border border-success-subtle' : 'bg-danger-subtle text-danger border border-danger-subtle'} rounded-pill">
                                ${m.status || 'Aman'}
                            </span>
                        </td>
                        <td class="text-muted">${m.keterangan || 'Data lengkap'}</td>
                        <td class="fw-bold text-warning-emphasis" style="font-size: 11px;">${m.prioritas || 'Tinggi'}</td>
                    </tr>
                `;
            });

            body.innerHTML = html;
        }

        // =====================================================================
        // VISUALISASI CHART PODES (ANTAR DESA & ANTAR KECAMATAN)
        // =====================================================================
        function setChartCompareScope(scope) {
            chartCompareScope = scope;
            const btnDesa = document.getElementById('scopeBtnDesa');
            const btnKec = document.getElementById('scopeBtnKecamatan');
            if (btnDesa && btnKec) {
                if (scope === 'desa') {
                    btnDesa.className = 'btn btn-sm btn-emerald rounded-pill px-2.5 py-1 fw-bold';
                    btnKec.className = 'btn btn-sm btn-light border-0 text-muted rounded-pill px-2.5 py-1 fw-bold';
                } else {
                    btnDesa.className = 'btn btn-sm btn-light border-0 text-muted rounded-pill px-2.5 py-1 fw-bold';
                    btnKec.className = 'btn btn-sm btn-emerald rounded-pill px-2.5 py-1 fw-bold';
                }
            }
            updatePodesChart();
        }

        function renderPodesChart() {
            const colSelect = document.getElementById('podesChartColSelect');
            if (!colSelect) return;

            if (!currentColumns || currentColumns.length === 0) return;

            const prevVal = colSelect.value;
            colSelect.innerHTML = '';
            currentColumns.forEach(c => {
                const opt = document.createElement('option');
                opt.value = c.col;
                opt.textContent = `Kol ${c.col} - ${c.label}`;
                colSelect.appendChild(opt);
            });

            if (prevVal && currentColumns.some(c => String(c.col) === String(prevVal))) {
                colSelect.value = prevVal;
            } else {
                colSelect.value = currentColumns[0].col;
            }

            updatePodesChart();
        }

        function updatePodesChart() {
            const canvas = document.getElementById('podesChartCanvas');
            if (!canvas || typeof Chart === 'undefined') return;

            const colSelect = document.getElementById('podesChartColSelect');
            const typeSelect = document.getElementById('podesChartTypeSelect');
            const selectedCol = colSelect ? colSelect.value : (currentColumns[0] ? currentColumns[0].col : null);
            if (!selectedCol) return;

            const colObj = currentColumns.find(c => String(c.col) === String(selectedCol));
            const colLabel = colObj ? colObj.label : `Kolom ${selectedCol}`;

            const labels = [];
            const values = [];
            const backgroundColors = [];
            const borderColors = [];

            let activeVal = 0;
            let sumVal = 0;
            let countNumeric = 0;
            let maxVal = -Infinity;
            let minVal = Infinity;
            let maxName = '-';
            let minName = '-';

            if (chartCompareScope === 'desa') {
                // ==========================================
                // SKOP 1: PERBANDINGAN ANTAR DESA (SE-KECAMATAN)
                // ==========================================
                const desaRows = (currentKecamatanRows || []).filter(r => !r.is_total && r.desa);

                const badge = document.getElementById('chartDesaCountBadge');
                if (badge) badge.textContent = `${desaRows.length} Desa (Kec. ${currentKec})`;

                const footerKec = document.getElementById('chartKecamatanNameFooter');
                if (footerKec) footerKec.textContent = `Kecamatan ${currentKec}`;

                const footerHint = document.getElementById('chartFooterHint');
                if (footerHint) {
                    footerHint.innerHTML = `<i class="bi bi-info-circle text-primary me-1"></i>Warna <strong class="text-success">hijau</strong> menandai desa aktif (<span id="chartActiveLegend">Desa ${currentDesa}</span>). Klik batang grafik untuk memilih desa.`;
                }

                desaRows.forEach(r => {
                    const dName = r.desa ? r.desa.trim() : '';
                    labels.push(dName);

                    const raw = r.values ? r.values[selectedCol] : 0;
                    let num = 0;
                    if (raw !== null && raw !== undefined) {
                        const clean = String(raw).replace(',', '.').replace(/[^0-9.-]/g, '');
                        num = parseFloat(clean);
                        if (isNaN(num)) num = 0;
                    }

                    values.push(num);
                    sumVal += num;
                    countNumeric++;

                    if (num > maxVal) {
                        maxVal = num;
                        maxName = dName;
                    }
                    if (num < minVal) {
                        minVal = num;
                        minName = dName;
                    }

                    const isCurrent = currentDesa && dName.toUpperCase() === currentDesa.toUpperCase();
                    if (isCurrent) {
                        activeVal = num;
                        backgroundColors.push('rgba(5, 150, 105, 0.85)'); // Emerald Green
                        borderColors.push('#047857');
                    } else {
                        backgroundColors.push('rgba(14, 165, 233, 0.65)'); // Sky/Blue
                        borderColors.push('#0284c7');
                    }
                });

                if (maxVal === -Infinity) maxVal = 0;
                if (minVal === Infinity) minVal = 0;
                const avgVal = countNumeric > 0 ? (sumVal / countNumeric).toFixed(1) : '0';

                // Update Mini Stat Cards untuk Antar Desa
                const statActiveLabel = document.getElementById('chartStatActiveLabel');
                if (statActiveLabel) statActiveLabel.textContent = currentDesa ? `Desa ${currentDesa}` : 'Desa Terpilih';
                const statActiveValEl = document.getElementById('chartStatActiveValue');
                if (statActiveValEl) statActiveValEl.textContent = formatCleanValue(activeVal);

                const statAvgLabel = document.getElementById('chartStatAvgLabel');
                if (statAvgLabel) statAvgLabel.textContent = `Rata-Rata Kec. ${currentKec}`;
                const statAvgEl = document.getElementById('chartStatAvgValue');
                if (statAvgEl) statAvgEl.textContent = avgVal;

                const statMaxLabel = document.getElementById('chartStatMaxLabel');
                if (statMaxLabel) statMaxLabel.textContent = 'Desa Tertinggi';
                const statMaxEl = document.getElementById('chartStatMaxValue');
                if (statMaxEl) statMaxEl.textContent = `${formatCleanValue(maxVal)} (${maxName})`;

                const statMinLabel = document.getElementById('chartStatMinLabel');
                if (statMinLabel) statMinLabel.textContent = 'Desa Terendah';
                const statMinEl = document.getElementById('chartStatMinValue');
                if (statMinEl) statMinEl.textContent = `${formatCleanValue(minVal)} (${minName})`;

            } else {
                // ==========================================
                // SKOP 2: PERBANDINGAN ANTAR KECAMATAN (15 KECAMATAN)
                // ==========================================
                const allKecs = (KECAMATAN_DATA && KECAMATAN_DATA.length > 0)
                    ? KECAMATAN_DATA.map(k => k.nama.toUpperCase())
                    : ['RANTEANGIN', 'LAMBAI', 'WAWO', 'LASUSUA', 'KATOI', 'KODEOHA', 'TIWU', 'NGAPA', 'WATUNOHU', 'PAKUE', 'PAKUE UTARA', 'PAKUE TENGAH', 'BATU PUTIH', 'POREHU', 'TOLALA'];

                const kecMap = {};
                allKecs.forEach(k => {
                    kecMap[k] = { sum: 0, count: 0 };
                });

                // Agregasi nilai per kecamatan dari seluruh baris desa
                (currentAllRows || []).forEach(r => {
                    if (!r.is_total && r.desa && r.kecamatan) {
                        const kName = r.kecamatan.toUpperCase();
                        if (kecMap[kName] !== undefined) {
                            const raw = r.values ? r.values[selectedCol] : 0;
                            if (raw !== null && raw !== undefined) {
                                const clean = String(raw).replace(',', '.').replace(/[^0-9.-]/g, '');
                                const num = parseFloat(clean);
                                if (!isNaN(num)) {
                                    kecMap[kName].sum += num;
                                    kecMap[kName].count++;
                                }
                            }
                        }
                    }
                });

                // Fallback ke baris is_total jika suatu kecamatan tidak punya baris desa terpisah
                allKecs.forEach(kName => {
                    if (kecMap[kName].count === 0) {
                        const totalRow = (currentAllRows || []).find(r => r.is_total && r.kecamatan && r.kecamatan.toUpperCase() === kName && r.values && r.values[selectedCol] !== undefined);
                        if (totalRow) {
                            const raw = totalRow.values[selectedCol];
                            const clean = String(raw).replace(',', '.').replace(/[^0-9.-]/g, '');
                            const num = parseFloat(clean);
                            if (!isNaN(num)) {
                                kecMap[kName].sum = num;
                                kecMap[kName].count = 1;
                            }
                        }
                    }
                });

                const badge = document.getElementById('chartDesaCountBadge');
                if (badge) badge.textContent = `15 Kecamatan (Kolaka Utara)`;

                const footerKec = document.getElementById('chartKecamatanNameFooter');
                if (footerKec) footerKec.textContent = `Kolaka Utara (15 Kec.)`;

                const footerHint = document.getElementById('chartFooterHint');
                if (footerHint) {
                    footerHint.innerHTML = `<i class="bi bi-info-circle text-primary me-1"></i>Warna <strong class="text-success">hijau</strong> menandai kecamatan aktif (<span id="chartActiveLegend">Kec. ${currentKec}</span>). Klik batang grafik untuk berpindah kecamatan.`;
                }

                allKecs.forEach(kName => {
                    labels.push(kName);
                    const num = kecMap[kName].sum;
                    values.push(num);
                    sumVal += num;
                    countNumeric++;

                    if (num > maxVal) {
                        maxVal = num;
                        maxName = kName;
                    }
                    if (num < minVal) {
                        minVal = num;
                        minName = kName;
                    }

                    const isCurrent = currentKec && kName.toUpperCase() === currentKec.toUpperCase();
                    if (isCurrent) {
                        activeVal = num;
                        backgroundColors.push('rgba(5, 150, 105, 0.85)'); // Emerald Green
                        borderColors.push('#047857');
                    } else {
                        backgroundColors.push('rgba(99, 102, 241, 0.65)'); // Indigo
                        borderColors.push('#4f46e5');
                    }
                });

                if (maxVal === -Infinity) maxVal = 0;
                if (minVal === Infinity) minVal = 0;
                const avgVal = countNumeric > 0 ? (sumVal / countNumeric).toFixed(1) : '0';

                // Update Mini Stat Cards untuk Antar Kecamatan
                const statActiveLabel = document.getElementById('chartStatActiveLabel');
                if (statActiveLabel) statActiveLabel.textContent = `Kecamatan ${currentKec}`;
                const statActiveValEl = document.getElementById('chartStatActiveValue');
                if (statActiveValEl) statActiveValEl.textContent = formatCleanValue(activeVal);

                const statAvgLabel = document.getElementById('chartStatAvgLabel');
                if (statAvgLabel) statAvgLabel.textContent = 'Rata-Rata Kab. Kolut';
                const statAvgEl = document.getElementById('chartStatAvgValue');
                if (statAvgEl) statAvgEl.textContent = avgVal;

                const statMaxLabel = document.getElementById('chartStatMaxLabel');
                if (statMaxLabel) statMaxLabel.textContent = 'Kecamatan Tertinggi';
                const statMaxEl = document.getElementById('chartStatMaxValue');
                if (statMaxEl) statMaxEl.textContent = `${formatCleanValue(maxVal)} (${maxName})`;

                const statMinLabel = document.getElementById('chartStatMinLabel');
                if (statMinLabel) statMinLabel.textContent = 'Total Kabupaten (15 Kec.)';
                const statMinEl = document.getElementById('chartStatMinValue');
                if (statMinEl) statMinEl.textContent = formatCleanValue(sumVal);
            }

            // Destroy previous Chart instance
            if (podesChartInstance) {
                podesChartInstance.destroy();
                podesChartInstance = null;
            }

            const selectedType = typeSelect ? typeSelect.value : 'bar';
            const isHorizontal = selectedType === 'horizontalBar';
            const chartType = isHorizontal ? 'bar' : selectedType;

            const ctx = canvas.getContext('2d');
            podesChartInstance = new Chart(ctx, {
                type: chartType,
                data: {
                    labels: labels,
                    datasets: [{
                        label: chartCompareScope === 'kecamatan' ? `Total ${colLabel}` : colLabel,
                        data: values,
                        backgroundColor: chartType === 'doughnut' ? [
                            '#059669', '#0284c7', '#f59e0b', '#ec4899', '#8b5cf6', 
                            '#06b6d4', '#10b981', '#6366f1', '#14b8a6', '#f97316',
                            '#84cc16', '#a855f7', '#64748b', '#e11d48', '#3b82f6'
                        ] : backgroundColors,
                        borderColor: chartType === 'doughnut' ? '#ffffff' : borderColors,
                        borderWidth: chartType === 'doughnut' ? 2 : 1.5,
                        borderRadius: chartType === 'bar' ? 6 : 0,
                        fill: chartType === 'line' ? true : false,
                        tension: 0.35
                    }]
                },
                options: {
                    indexAxis: isHorizontal ? 'y' : 'x',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: chartType === 'doughnut',
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                font: { family: "'Plus Jakarta Sans', sans-serif", size: 11 }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.95)',
                            titleFont: { family: "'Plus Jakarta Sans', sans-serif", size: 12, weight: 'bold' },
                            bodyFont: { family: "'JetBrains Mono', monospace", size: 12 },
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    const prefix = chartCompareScope === 'kecamatan' ? 'Total' : '';
                                    return ` ${prefix} ${colLabel}: ${formatCleanValue(context.raw)}`;
                                }
                            }
                        }
                    },
                    scales: chartType === 'doughnut' ? {} : {
                        x: {
                            grid: { display: isHorizontal, color: '#f1f5f9' },
                            ticks: {
                                font: { family: "'Plus Jakarta Sans', sans-serif", size: 11, weight: '600' },
                                color: '#475569',
                                maxRotation: isHorizontal ? 0 : 45
                            }
                        },
                        y: {
                            grid: { display: !isHorizontal, color: '#f1f5f9' },
                            ticks: {
                                font: { family: "'JetBrains Mono', monospace", size: 11 },
                                color: '#64748b',
                                beginAtZero: true
                            }
                        }
                    },
                    onClick: (e, elements) => {
                        if (elements && elements.length > 0) {
                            const idx = elements[0].index;
                            const clickedTarget = labels[idx];
                            if (clickedTarget) {
                                if (chartCompareScope === 'desa') {
                                    selectDesaFromChart(clickedTarget);
                                } else {
                                    selectKecamatanFromChart(clickedTarget);
                                }
                            }
                        }
                    }
                }
            });
        }

        function selectDesaFromChart(desaName) {
            const desaSelect = document.getElementById('podesSelectDesa');
            if (desaSelect) {
                desaSelect.value = desaName.toUpperCase();
                currentDesa = desaName.toUpperCase();
                updateActiveDesaBadge();
                updatePodesChart();
            }
        }

        function selectKecamatanFromChart(kecName) {
            const kecSelect = document.getElementById('podesSelectKec');
            if (kecSelect && !kecSelect.classList.contains('d-none')) {
                kecSelect.value = kecName.toUpperCase();
                currentKec = kecName.toUpperCase();
                populateDesaSelect();
                loadPodesTableData();
            }
        }

        // Submit Form via AJAX
        async function submitPodesForm(e) {
            if (e) e.preventDefault();

            const inputs = document.querySelectorAll('.podes-form-input');
            const values = {};
            inputs.forEach(inp => {
                values[inp.getAttribute('data-col')] = inp.value;
            });

            try {
                const res = await fetch('/admin/podes/save', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        module: currentModule,
                        table: currentTable,
                        kecamatan: currentKec,
                        desa: currentDesa,
                        values: values
                    })
                });

                const data = await res.json();
                if (data.success) {
                    showToast('✅ ' + data.message);
                    loadPodesTableData();
                } else {
                    alert(data.message || 'Gagal menyimpan data.');
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan jaringan.');
            }
        }

        async function saveAndNextTable() {
            await submitPodesForm();
            const cat = PODES_CATALOG.find(c => c.file === currentModule);
            if (cat && cat.tables) {
                const currentIdx = cat.tables.findIndex(t => t.sheet === currentTable);
                if (currentIdx !== -1 && currentIdx + 1 < cat.tables.length) {
                    selectPodesTable(cat.tables[currentIdx + 1].sheet);
                } else {
                    alert('Ini adalah tabel terakhir pada modul ini. Silakan pilih modul berikutnya pada sidebar.');
                }
            }
        }

        // Toast feedback
        function showToast(msg) {
            const toastEl = document.createElement('div');
            toastEl.className = 'position-fixed bottom-0 end-0 p-3';
            toastEl.style.zIndex = '1090';
            toastEl.innerHTML = `
                <div class="toast align-items-center text-bg-dark border-0 show rounded-3 shadow-lg" role="alert">
                    <div class="d-flex">
                        <div class="toast-body small fw-bold">
                            ${msg}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" onclick="this.closest('.position-fixed').remove()"></button>
                    </div>
                </div>
            `;
            document.body.appendChild(toastEl);
            setTimeout(() => {
                toastEl.remove();
            }, 3500);
        }

        function openSyncSpreadsheetModal() {
            if (syncModal) syncModal.show();
        }

        function filterDesaTable() {
            const searchVal = document.getElementById('inputSearchDesa').value.toLowerCase().trim();
            const kecVal = document.getElementById('selectFilterKecamatan').value;
            const statusVal = document.getElementById('selectFilterStatus').value;

            const rows = document.querySelectorAll('.desa-row');
            let visibleCount = 0;

            rows.forEach(r => {
                const nama = r.getAttribute('data-nama') || '';
                const kec = r.getAttribute('data-kecamatan') || '';
                const st = r.getAttribute('data-status') || '';
                const komoditas = r.getAttribute('data-komoditas') || '';

                const matchesSearch = !searchVal || nama.includes(searchVal) || kec.toLowerCase().includes(searchVal) || komoditas.includes(searchVal);
                const matchesKec = !kecVal || kec === kecVal;
                const matchesStatus = !statusVal || st === statusVal;

                if (matchesSearch && matchesKec && matchesStatus) {
                    r.style.display = '';
                    visibleCount++;
                } else {
                    r.style.display = 'none';
                }
            });

            const countText = document.getElementById('desaTableCountText');
            if (countText) {
                countText.textContent = `Menampilkan ${visibleCount} dari {{ count($flatDesaList) }} Desa/Kelurahan`;
            }
        }

        function editDesaData(nama, kec, ipd, status, komoditas, faskes, lat, lng) {
            document.getElementById('modalEditDesaTitle').textContent = 'Edit Potensi: ' + nama;
            const namaDesaInput = document.getElementById('editModalNamaDesa');
            namaDesaInput.value = nama;
            namaDesaInput.setAttribute('readonly', true);
            namaDesaInput.classList.add('bg-light');

            const kecSelect = document.getElementById('editModalNamaKec');
            kecSelect.value = kec;

            document.getElementById('editModalIpd').value = ipd;
            document.getElementById('editModalStatus').value = status;
            document.getElementById('editModalKomoditas').value = komoditas || '';
            document.getElementById('editModalFaskes').value = faskes || '';
            document.getElementById('editModalLat').value = lat || '-3.5291';
            document.getElementById('editModalLng').value = lng || '120.9855';

            if (editDesaModal) editDesaModal.show();
        }

        function openNewDesaModal() {
            document.getElementById('modalEditDesaTitle').textContent = 'Input Potensi Desa Baru';
            const namaDesaInput = document.getElementById('editModalNamaDesa');
            namaDesaInput.value = '';
            namaDesaInput.removeAttribute('readonly');
            namaDesaInput.classList.remove('bg-light');

            const kecSelect = document.getElementById('editModalNamaKec');
            kecSelect.value = 'Lasusua';

            document.getElementById('editModalIpd').value = '70.0';
            document.getElementById('editModalStatus').value = 'Maju';
            document.getElementById('editModalKomoditas').value = '';
            document.getElementById('editModalFaskes').value = 'Poskesdes';
            document.getElementById('editModalLat').value = '-3.5291';
            document.getElementById('editModalLng').value = '120.9855';

            if (editDesaModal) {
                editDesaModal.show();
                setTimeout(() => namaDesaInput.focus(), 300);
            }
        }

        async function saveDesaModalData(e) {
            if (e) e.preventDefault();

            const namaDesa = document.getElementById('editModalNamaDesa').value.trim();
            const namaKec = document.getElementById('editModalNamaKec').value;
            const ipd = parseFloat(document.getElementById('editModalIpd').value);
            const status = document.getElementById('editModalStatus').value;
            const komoditas = document.getElementById('editModalKomoditas').value.trim();
            const faskes = document.getElementById('editModalFaskes').value.trim();
            const lat = parseFloat(document.getElementById('editModalLat').value);
            const lng = parseFloat(document.getElementById('editModalLng').value);

            if (!namaDesa) {
                alert('Nama Desa / Kelurahan wajib diisi!');
                return;
            }

            if (isNaN(ipd) || ipd < 0 || ipd > 100) {
                alert('Skor IPD harus berupa angka antara 0 hingga 100.');
                return;
            }

            const btn = document.getElementById('btnSaveDesaModal') || (e.target ? e.target.querySelector('button[type="submit"]') : null);
            const originalText = btn ? btn.innerHTML : 'Simpan';
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Menyimpan...';
            }

            try {
                const res = await fetch('/admin/desa/save', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        nama_desa: namaDesa,
                        nama_kec: namaKec,
                        ipd: ipd,
                        status: status,
                        komoditas: komoditas,
                        faskes: faskes,
                        lat: isNaN(lat) ? null : lat,
                        lng: isNaN(lng) ? null : lng
                    })
                });

                const data = await res.json();

                if (res.ok && data.success) {
                    showToast(data.message || 'Data potensi desa berhasil disimpan!');
                    if (editDesaModal) editDesaModal.hide();
                    updateDesaTableRow(data.desa);
                } else {
                    alert(data.message || 'Gagal menyimpan data potensi desa.');
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan koneksi saat menyimpan data potensi desa.');
            } finally {
                if (btn) {
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                }
            }
        }

        function updateDesaTableRow(desa) {
            if (!desa || !desa.nama_desa) return;

            const targetNama = desa.nama_desa.toLowerCase();
            const targetKec = desa.nama_kec.toLowerCase();
            const rows = document.querySelectorAll('.desa-row');
            let found = false;

            rows.forEach(r => {
                const rNama = (r.getAttribute('data-nama') || '').toLowerCase();
                const rKec = (r.getAttribute('data-kecamatan') || '').toLowerCase();
                if (rNama === targetNama && rKec === targetKec) {
                    found = true;
                    r.setAttribute('data-status', desa.status);
                    r.setAttribute('data-komoditas', (desa.komoditas || '').toLowerCase());

                    const cells = r.querySelectorAll('td');
                    if (cells.length >= 8) {
                        cells[3].textContent = Number(desa.ipd).toFixed(1);

                        let badgeClass = 'bg-info-subtle text-info border-info-subtle';
                        if (desa.status === 'Mandiri') {
                            badgeClass = 'bg-success-subtle text-success border-success-subtle';
                        } else if (desa.status === 'Maju') {
                            badgeClass = 'bg-warning-subtle text-warning border-warning-subtle';
                        }
                        cells[4].innerHTML = `<span class="badge ${badgeClass} border rounded-pill">${desa.status}</span>`;
                        cells[5].textContent = desa.komoditas || '-';
                        cells[6].textContent = desa.faskes || '-';

                        const safeKomoditas = (desa.komoditas || '').replace(/'/g, "\\'");
                        const safeFaskes = (desa.faskes || '').replace(/'/g, "\\'");
                        cells[7].innerHTML = `
                            <button type="button" onclick="editDesaData('${desa.nama_desa}', '${desa.nama_kec}', '${desa.ipd}', '${desa.status}', '${safeKomoditas}', '${safeFaskes}', '${desa.lat}', '${desa.lng}')" class="btn btn-sm btn-light border text-muted px-2 py-0.5 rounded-pill" title="Edit Profil Desa">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </button>
                        `;
                    }
                }
            });

            if (!found) {
                // Desa baru ditambahkan: muat ulang halaman setelah notifikasi agar agregat & statistik ter-update
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }
        }

        function openNewUserModal() {
            if (newUserModal) newUserModal.show();
        }

        function exportDataToCSV() {
            const rows = document.querySelectorAll('.desa-row');
            let csv = "No,Nama Desa,Kecamatan,Skor IPD,Status IPD,Komoditas,Fasilitas\n";
            let idx = 1;
            rows.forEach(r => {
                if (r.style.display !== 'none') {
                    const cells = r.querySelectorAll('td');
                    if (cells.length >= 7) {
                        const nama = cells[1].innerText.trim();
                        const kec = cells[2].innerText.trim();
                        const ipd = cells[3].innerText.trim();
                        const st = cells[4].innerText.trim();
                        const komoditas = cells[5].innerText.trim().replace(/,/g, ';');
                        const faskes = cells[6].innerText.trim().replace(/,/g, ';');
                        csv += `${idx},"${nama}","${kec}",${ipd},"${st}","${komoditas}","${faskes}"\n`;
                        idx++;
                    }
                }
            });

            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.setAttribute("download", "master_desa_podes_kolaka_utara.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
</body>
</html>