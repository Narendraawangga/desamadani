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
            padding: 0.35rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.15s ease;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #475569;
            white-space: nowrap;
        }
        .subtable-pill:hover {
            background: #f1f5f9;
            color: #0f172a;
        }
        .subtable-pill.active {
            background-color: #059669;
            color: #ffffff;
            border-color: #059669;
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
    </style>
</head>
<body>

    <!-- Mobile Backdrop -->
    <div id="sidebarBackdrop" onclick="toggleSidebar()" class="modal-backdrop fade d-lg-none" style="display: none; z-index: 1040;"></div>

    <!-- =========================================================================
         LEFT SIDEBAR: DESA MADANI BPS
         ========================================================================= -->
    <aside id="adminSidebar" class="admin-sidebar">
        
        <!-- Sidebar Brand Header -->
        <div class="px-3 py-3.5 border-bottom border-white border-opacity-10 d-flex align-items-center justify-content-between">
            <a href="/admin" class="d-flex align-items-center gap-2.5 text-decoration-none">
                <div style="width: 36px; height: 36px; flex-shrink: 0;">
                    <svg viewBox="0 0 100 100" fill="none" class="w-100 h-100">
                        <path d="M16 22 C16 16 18 14 24 14 H52 C55 14 56 16 56 20 V46 C56 50 54 52 50 52 H32 C23 52 16 45 16 36 Z" fill="#059669"/>
                        <path d="M48 48 C48 44 50 42 54 42 H72 C80 42 86 48 86 56 V78 C86 82 84 84 80 84 H48 C44 84 42 82 42 78 V54 C42 50 44 48 48 48 Z" fill="#ffffff"/>
                        <circle cx="50" cy="50" r="7" fill="#f59e0b"/>
                        <circle cx="50" cy="50" r="3" fill="#0b2545"/>
                    </svg>
                </div>
                <div>
                    <div class="fw-black text-white fs-6 lh-1">
                        Desa <span style="color: #34d399;">Madani</span>
                    </div>
                    <small class="text-white-50 fw-semibold" style="font-size: 10px; letter-spacing: 0.3px;">Portal Admin BPS Kolut</small>
                </div>
            </a>
            <button class="btn btn-sm btn-link text-white-50 d-lg-none p-0 text-decoration-none" onclick="toggleSidebar()">
                <i class="bi bi-x-lg fs-5"></i>
            </button>
        </div>

        <!-- Sidebar Navigation Items -->
        <div class="flex-grow-1 overflow-y-auto px-3 py-3">
            
            <div class="text-uppercase text-white-50 fw-bold px-2 mb-2" style="font-size: 10px; letter-spacing: 0.6px;">
                Menu Utama
            </div>

            <!-- 1. Ringkasan Eksekutif -->
            <button type="button" onclick="switchAdminTab('overview')" id="tabBtnOverview" class="sidebar-nav-link active">
                <span class="d-flex align-items-center gap-2.5">
                    <i class="bi bi-speedometer2 fs-6"></i>
                    <span>Ringkasan Eksekutif</span>
                </span>
            </button>

            <!-- 2. Input & Validasi PODES -->
            <button type="button" onclick="switchAdminTab('podes')" id="tabBtnPodes" class="sidebar-nav-link">
                <span class="d-flex align-items-center gap-2.5">
                    <i class="bi bi-file-earmark-spreadsheet fs-6"></i>
                    <span>Input PODES</span>
                </span>
                <span class="badge rounded-pill bg-white bg-opacity-15 text-white fw-bold" style="font-size: 9px;">11 Klaster</span>
            </button>

            <!-- 3. Master Data Desa -->
            <button type="button" onclick="switchAdminTab('desa')" id="tabBtnDesa" class="sidebar-nav-link">
                <span class="d-flex align-items-center gap-2.5">
                    <i class="bi bi-buildings fs-6"></i>
                    <span>Master Data Desa</span>
                </span>
                <span class="badge rounded-pill bg-white bg-opacity-15 text-white fw-bold" style="font-size: 9px;">{{ count($flatDesaList) }}</span>
            </button>

            <!-- 4. Pemetaan Spasial WebGIS -->
            <button type="button" onclick="switchAdminTab('spatial')" id="tabBtnSpatial" class="sidebar-nav-link">
                <span class="d-flex align-items-center gap-2.5">
                    <i class="bi bi-geo-alt fs-6"></i>
                    <span>Pemetaan Spasial</span>
                </span>
            </button>

            <!-- 5. Kelola Pengguna (Admin Only) -->
            @if($admin->isAdmin())
                <button type="button" onclick="switchAdminTab('users')" id="tabBtnUsers" class="sidebar-nav-link">
                    <span class="d-flex align-items-center gap-2.5">
                        <i class="bi bi-people fs-6"></i>
                        <span>Kelola Pengguna</span>
                    </span>
                    <span class="badge rounded-pill bg-white bg-opacity-15 text-white fw-bold" style="font-size: 9px;">{{ $users->count() }}</span>
                </button>
            @endif

            <!-- Utilities / Data Actions -->
            <div class="text-uppercase text-white-50 fw-bold px-2 mt-4 mb-2" style="font-size: 10px; letter-spacing: 0.6px;">
                Alat & Sinkronisasi
            </div>

            <!-- Sync Excel Modal (Admin Only) -->
            @if($admin->isAdmin())
                <button type="button" onclick="openSyncSpreadsheetModal()" class="sidebar-nav-link">
                    <span class="d-flex align-items-center gap-2.5">
                        <i class="bi bi-arrow-repeat fs-6 text-emerald-400"></i>
                        <span>Sinkron Excel PODES</span>
                    </span>
                    <span class="badge rounded-pill bg-emerald-500 bg-opacity-25 text-emerald-300" style="font-size: 9px;">11 File</span>
                </button>
            @endif

            <!-- Export CSV -->
            <button type="button" onclick="exportDataToCSV()" class="sidebar-nav-link">
                <span class="d-flex align-items-center gap-2.5">
                    <i class="bi bi-download fs-6"></i>
                    <span>Ekspor CSV Master</span>
                </span>
            </button>

            <!-- Public Portal Link -->
            <a href="/portal" target="_blank" class="sidebar-nav-link">
                <span class="d-flex align-items-center gap-2.5">
                    <i class="bi bi-globe2 fs-6 text-warning"></i>
                    <span>Portal Publik WebGIS</span>
                </span>
                <i class="bi bi-box-arrow-up-right text-white-50" style="font-size: 10px;"></i>
            </a>

        </div>

        <!-- Sidebar Footer: Profile & Logout -->
        <div class="p-3 border-top border-white border-opacity-10 bg-black bg-opacity-25 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2 overflow-hidden">
                <div class="rounded-circle d-flex align-items-center justify-content-center fw-black text-slate-900 bg-success" style="width: 34px; height: 34px; font-size: 13px; flex-shrink: 0;">
                    {{ strtoupper(substr($admin->name ?? 'A', 0, 1)) }}
                </div>
                <div class="overflow-hidden">
                    <div class="text-white fw-bold text-truncate" style="font-size: 12px;">{{ $admin->name }}</div>
                    @if($admin->isOperatorDesa())
                        <div class="text-primary-subtle text-truncate fw-semibold" style="font-size: 10px;">
                            <i class="bi bi-house-door-fill me-1"></i>Desa {{ $admin->desa }}
                        </div>
                    @else
                        <div class="text-white-50 text-truncate" style="font-size: 10px;">{{ $admin->email }}</div>
                    @endif
                </div>
            </div>

            <!-- Logout Form -->
            <form method="POST" action="/logout" onsubmit="return confirm('Apakah Anda yakin ingin keluar dari Portal Admin?');">
                @csrf
                <button type="submit" class="btn btn-sm btn-link text-white-50 p-1 text-decoration-none hover:text-white" title="Keluar / Logout">
                    <i class="bi bi-box-arrow-right fs-5"></i>
                </button>
            </form>
        </div>
    </aside>

    <!-- =========================================================================
         RIGHT MAIN CONTENT WRAPPER
         ========================================================================= -->
    <div class="admin-main-wrapper flex-grow-1 d-flex flex-column min-vh-100">
        
        <!-- Top Navbar -->
        <header class="navbar navbar-expand bg-white border-bottom sticky-top py-2.5 px-3 px-md-4 shadow-2xs">
            <div class="container-fluid p-0 d-flex align-items-center justify-content-between">
                
                <!-- Left: Mobile Toggle & Breadcrumb -->
                <div class="d-flex align-items-center gap-2.5">
                    <button class="btn btn-sm btn-light border d-lg-none" type="button" onclick="toggleSidebar()">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 small" style="font-size: 12px;">
                            <li class="breadcrumb-item text-muted">Admin</li>
                            <li class="breadcrumb-item active fw-bold text-success text-uppercase" id="topbarActiveTabName">Ringkasan Eksekutif</li>
                        </ol>
                    </nav>
                </div>

                <!-- Right Actions -->
                <div class="d-flex align-items-center gap-2">
                    @if($admin->isOperatorDesa())
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5" style="font-size: 12px;">
                            <i class="bi bi-house-door-fill"></i>
                            <span>Operator: Desa {{ $admin->desa }} (Kec. {{ $admin->kecamatan }})</span>
                        </span>
                    @else
                        <button type="button" onclick="openNewDesaModal()" class="btn btn-sm btn-emerald rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5 shadow-2xs" style="font-size: 12px;">
                            <i class="bi bi-plus-lg"></i>
                            <span class="d-none d-sm-inline">Input Desa Baru</span>
                        </button>
                        <button type="button" onclick="openSyncSpreadsheetModal()" class="btn btn-sm btn-light border rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5" style="font-size: 12px;">
                            <i class="bi bi-arrow-repeat text-success"></i>
                            <span class="d-none d-sm-inline">Sinkron Excel</span>
                        </button>
                    @endif
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
                
                <!-- Greeting Hero Banner -->
                <div class="hero-banner p-4 p-md-5 mb-4 shadow-2xs">
                    <div class="row align-items-center gy-3">
                        <div class="col-lg-8">
                            <span class="badge bg-white bg-opacity-20 text-white mb-2 px-3 py-1 text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">
                                Selamat Datang di Dashboard Admin
                            </span>
                            <h2 class="fw-black mb-1.5">
                                Halo, <span style="color: #6ee7b7;">{{ $admin->name }}</span> 👋
                            </h2>
                            <p class="text-white-50 mb-0 small" style="max-width: 600px; line-height: 1.6;">
                                Kelola data potensi desa, pembaruan indeks kemandirian (IPD), komoditas unggulan, dan titik spasial 133 desa se-Kabupaten Kolaka Utara.
                            </p>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <div class="d-inline-flex gap-2">
                                <div class="bg-white bg-opacity-10 rounded-3 px-3 py-2 text-center border border-white border-opacity-15">
                                    <div class="text-white-50" style="font-size: 10px;">Tahun Basis Data</div>
                                    <div class="fw-bold text-warning small">Podes 2024–2025</div>
                                </div>
                                <div class="bg-white bg-opacity-10 rounded-3 px-3 py-2 text-center border border-white border-opacity-15">
                                    <div class="text-white-50" style="font-size: 10px;">Status Sistem</div>
                                    <div class="fw-bold text-white small d-flex align-items-center gap-1.5 justify-content-center">
                                        <span class="spinner-grow spinner-grow-sm text-success" style="width: 8px; height: 8px;" role="status"></span>
                                        <span>11 Modul</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4 KPI Metric Cards -->
                <div class="row g-3 mb-4">
                    
                    <!-- Card 1: Total Wilayah -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="bento-card p-3.5 h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-uppercase text-muted fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Total Wilayah</span>
                                <div class="rounded-3 bg-primary bg-opacity-10 text-primary p-2">
                                    <i class="bi bi-buildings fs-5"></i>
                                </div>
                            </div>
                            <h3 class="fw-black mb-1">{{ $stats['total_desa'] }} <span class="fs-6 fw-semibold text-muted">Desa</span></h3>
                            <small class="text-muted"><strong class="text-primary">{{ $stats['total_kecamatan'] }} Kecamatan</strong> di Kab. Kolaka Utara</small>
                        </div>
                    </div>

                    <!-- Card 2: Desa Mandiri -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="bento-card p-3.5 h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-uppercase text-muted fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Desa Mandiri</span>
                                <div class="rounded-3 bg-success bg-opacity-10 text-success p-2">
                                    <i class="bi bi-shield-check fs-5"></i>
                                </div>
                            </div>
                            <h3 class="fw-black mb-1 text-success">{{ $stats['mandiri_count'] }} <span class="fs-6 fw-semibold text-muted">Desa</span></h3>
                            <small class="text-muted">Kemandirian fiskal & layanan optimal</small>
                        </div>
                    </div>

                    <!-- Card 3: Desa Maju -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="bento-card p-3.5 h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-uppercase text-muted fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Desa Maju</span>
                                <div class="rounded-3 bg-warning bg-opacity-10 text-warning p-2">
                                    <i class="bi bi-graph-up-arrow fs-5"></i>
                                </div>
                            </div>
                            <h3 class="fw-black mb-1 text-warning">{{ $stats['maju_count'] }} <span class="fs-6 fw-semibold text-muted">Desa</span></h3>
                            <small class="text-muted">Potensial menuju status mandiri</small>
                        </div>
                    </div>

                    <!-- Card 4: Desa Berkembang -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="bento-card p-3.5 h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-uppercase text-muted fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Desa Berkembang</span>
                                <div class="rounded-3 bg-info bg-opacity-10 text-info p-2">
                                    <i class="bi bi-house-door fs-5"></i>
                                </div>
                            </div>
                            <h3 class="fw-black mb-1 text-info">{{ $stats['berkembang_count'] }} <span class="fs-6 fw-semibold text-muted">Desa</span></h3>
                            <small class="text-muted">Sasaran akselerasi pembangunan</small>
                        </div>
                    </div>
                </div>

                <!-- Quick Action to PODES Workspace -->
                <div class="bento-card p-4 bg-white border-success-subtle">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 bg-success text-white p-3 d-flex align-items-center justify-content-center shadow-2xs">
                                <i class="bi bi-file-earmark-spreadsheet fs-3"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Workspace Input & Validasi Data PODES 2025</h5>
                                <p class="text-muted small mb-0">Semua 11 file modul PODES telah diorganisir per tabel dan per desa agar input data mudah dan tidak membingungkan.</p>
                            </div>
                        </div>
                        <button type="button" onclick="switchAdminTab('podes')" class="btn btn-emerald rounded-pill px-4 py-2 d-flex align-items-center gap-2 shadow-2xs text-nowrap align-self-start align-self-md-auto">
                            <span>Buka Workspace PODES</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
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
                                <div class="fw-bold small text-uppercase" style="font-size: 11px; letter-spacing: 0.5px;">11 Klaster PODES</div>
                                <span class="badge bg-light text-muted border font-mono-num" style="font-size: 10px;">60+ Tabel</span>
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
                                    <button type="button" onclick="switchWorkAreaMode('monitoring')" id="modeBtnMonitoring" class="btn btn-outline-secondary px-3">
                                        <i class="bi bi-shield-check me-1"></i>Monitoring
                                    </button>
                                </div>
                            </div>

                            <!-- Sub-Table Horizontal Tabs Bar -->
                            <div class="d-flex align-items-center gap-1.5 overflow-x-auto pb-2.5 mb-3 border-bottom" id="subTablesHorizontalBar">
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

                            <!-- PANEL 3: MONITORING KELENGKAPAN -->
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
                            <form method="POST" action="/admin/users/generate-desa" onsubmit="return confirm('Apakah Anda yakin ingin meng-generate akun untuk seluruh 133 Desa di Kolaka Utara sekaligus? Password default: bps7408');" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5 shadow-2xs" title="Generate otomatis akun untuk 133 desa se-Kolut">
                                    <i class="bi bi-lightning-charge-fill text-warning"></i>
                                    <span>Auto-Generate 133 Akun Desa</span>
                                </button>
                            </form>
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
                            <h6 class="modal-title fw-bold" id="modalSyncSpreadsheetLabel">Sinkronisasi 11 Spreadsheet PODES</h6>
                            <small class="text-muted font-mono-num" style="font-size: 11px;">Folder master: storage/app/podes_raw/</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="small text-muted mb-3">
                        Sistem mendeteksi <strong>11 File Excel PODES 2025</strong> yang telah diekstrak. Tekan tombol di bawah untuk menyinkronkan ulang seluruh data tabel ke database.
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
                            <label class="form-label fw-bold">Nama Desa / Kelurahan</label>
                            <input type="text" id="editModalNamaDesa" class="form-control form-control-sm bg-light fw-bold" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kecamatan</label>
                            <input type="text" id="editModalNamaKec" class="form-control form-control-sm bg-light fw-bold" readonly>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-bold">Skor IPD</label>
                                <input type="number" step="0.1" id="editModalIpd" class="form-control form-control-sm font-mono-num fw-bold">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Status Kemandirian</label>
                                <select id="editModalStatus" class="form-select form-select-sm fw-bold">
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="Maju">Maju</option>
                                    <option value="Berkembang">Berkembang</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Komoditas Utama</label>
                            <input type="text" id="editModalKomoditas" class="form-control form-control-sm fw-bold">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Fasilitas Kesehatan</label>
                            <input type="text" id="editModalFaskes" class="form-control form-control-sm fw-bold">
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="form-label fw-bold">Latitude</label>
                                <input type="text" id="editModalLat" class="form-control form-control-sm font-mono-num">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Longitude</label>
                                <input type="text" id="editModalLng" class="form-control form-control-sm font-mono-num">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top py-2 px-4">
                        <button type="button" class="btn btn-sm btn-light border rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-emerald rounded-pill px-4">Simpan Perubahan</button>
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

    <!-- =========================================================================
         JAVASCRIPT LOGIC
         ========================================================================= -->
    <script>
        // Master Data Kecamatan & Desa
        const KECAMATAN_DATA = @json($kecamatanList);
        const PODES_CATALOG = @json($podesCatalog);

        // State Workspace PODES
        let currentKec = 'LASUSUA';
        let currentDesa = '';
        let currentModule = 'KETERANGAN UMUM DESA.xlsx';
        let currentTable = '1.1';
        let currentColumns = [];
        let currentDesaRow = null;
        let currentKecamatanRows = [];
        let currentWorkMode = 'form';

        // 11 Sektoral Modules
        const MODULE_DEFS = [
            { id: 'KETERANGAN UMUM DESA.xlsx', name: '1. Keterangan Umum Desa', icon: 'bi-building' },
            { id: 'PERUMAHAN DAN LINGKUNGAN_.xlsx', name: '2. Perumahan & Lingkungan', icon: 'bi-house-heart' },
            { id: 'PENDIDIKAN DAN KESEHATAN.xlsx', name: '3. Pendidikan & Kesehatan', icon: 'bi-mortarboard' },
            { id: 'ANGKUTAN, KOMUNIKASI, DAN INFORMASI.xlsx', name: '4. Angkutan & Komunikasi', icon: 'bi-broadcast-pin' },
            { id: 'SARANA EKONOMI DAN INDUSTRI.xlsx', name: '5. Sarana Ekonomi & Industri', icon: 'bi-shop' },
            { id: 'KEUANGAN DAN ASET DESA 2025.xlsx', name: '6. Keuangan & Aset Desa', icon: 'bi-cash-coin' },
            { id: 'KETERANGAN PEMERINTAH DESA_KELURAHAN 2025.xlsx', name: '7. Pemerintahan Desa 2025', icon: 'bi-award' },
            { id: 'BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx', name: '8. Bencana Alam & Keamanan', icon: 'bi-shield-exclamation' },
            { id: 'INFRASTRUKTUR PENDIDIKAN.xlsx', name: '9. Infrastruktur Pendidikan', icon: 'bi-backpack' },
            { id: 'INFRASTRUKTUR KESEHATAN.xlsx', name: '10. Infrastruktur Kesehatan', icon: 'bi-hospital' },
            { id: 'INFRASTRUKTUR EKONOMI.xlsx', name: '11. Infrastruktur Ekonomi', icon: 'bi-bank' }
        ];

        const TAB_NAMES = {
            overview: 'Ringkasan Eksekutif',
            podes: 'Input PODES',
            desa: 'Master Data Desa (133)',
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
        });

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
                html += `
                    <button type="button" onclick="selectPodesTable('${t.sheet}')" class="subtable-pill ${isActive ? 'active' : ''}">
                        ${isActive ? '<i class="bi bi-check-circle-fill me-1"></i>' : ''}Tabel ${t.sheet}
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
            ['form', 'matrix', 'monitoring'].forEach(m => {
                const btn = document.getElementById('modeBtn' + m.charAt(0).toUpperCase() + m.slice(1));
                const panel = document.getElementById('panelWork' + m.charAt(0).toUpperCase() + m.slice(1));
                if (m === mode) {
                    btn.className = 'btn btn-success fw-bold px-3';
                    if (panel) panel.style.display = 'block';
                } else {
                    btn.className = 'btn btn-outline-secondary px-3';
                    if (panel) panel.style.display = 'none';
                }
            });
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

                    // Update Table Header
                    document.getElementById('currentTableBadge').textContent = `Tabel ${data.table}`;
                    document.getElementById('currentModuleBreadcrumb').textContent = currentModule.replace('.xlsx', '');
                    document.getElementById('currentTableTitle').textContent = data.title;

                    renderSubTablesHorizontalBar();
                    renderFormInputs(data.columns, data.desa_row);
                    renderMatrixTable(data.columns, data.kecamatan_rows);
                    renderMonitoringTable(data.monitoring);
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

        function saveAndNextTable() {
            submitPodesForm();
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
            document.getElementById('modalEditDesaTitle').textContent = 'Edit Potensi ' + nama;
            document.getElementById('editModalNamaDesa').value = nama;
            document.getElementById('editModalNamaKec').value = kec;
            document.getElementById('editModalIpd').value = ipd;
            document.getElementById('editModalStatus').value = status;
            document.getElementById('editModalKomoditas').value = komoditas;
            document.getElementById('editModalFaskes').value = faskes;
            document.getElementById('editModalLat').value = lat;
            document.getElementById('editModalLng').value = lng;

            if (editDesaModal) editDesaModal.show();
        }

        function saveDesaModalData(e) {
            if (e) e.preventDefault();
            alert('Perubahan data profil desa berhasil disimpan!');
            if (editDesaModal) editDesaModal.hide();
        }

        function openNewDesaModal() {
            document.getElementById('modalEditDesaTitle').textContent = 'Input Potensi Desa Baru';
            document.getElementById('editModalNamaDesa').value = '';
            document.getElementById('editModalNamaDesa').removeAttribute('readonly');
            document.getElementById('editModalNamaKec').value = 'Lasusua';
            document.getElementById('editModalNamaKec').removeAttribute('readonly');
            document.getElementById('editModalIpd').value = '70.0';
            document.getElementById('editModalStatus').value = 'Maju';
            document.getElementById('editModalKomoditas').value = '';
            document.getElementById('editModalFaskes').value = 'Poskesdes';
            document.getElementById('editModalLat').value = '-3.5291';
            document.getElementById('editModalLng').value = '120.9855';

            if (editDesaModal) editDesaModal.show();
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
