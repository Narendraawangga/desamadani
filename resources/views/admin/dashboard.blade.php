<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Eksekutif Admin - Desa Madani BPS Kolaka Utara</title>
    
    <!-- Google Fonts: Plus Jakarta Sans, Cinzel & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons 1.11.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        @font-face {
            font-family: 'Batangas';
            src: url('/fonts/batangas/Batangas-Bold.otf') format('opentype'),
                 url('/fonts/batangas/Batangas-Bold.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }

        :root {
            --bs-font-sans-serif: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            --bs-body-font-family: var(--bs-font-sans-serif);
            --bs-body-bg: #f1f5f9;
            --madani-emerald: #059669;
            --madani-darkgreen: #047857;
            --madani-deep: #064e3b;
            --madani-navy: #0b2545;
            --madani-darknavy: #06182e;
            --madani-amber: #f59e0b;
        }

        body {
            font-family: var(--bs-font-sans-serif);
            background-color: #f1f5f9;
            color: #1e293b;
            min-height: 100vh;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif !important;
            letter-spacing: 0.05em;
        }

        /* Fixed Left Sidebar with Rich Dark Executive Gradient */
        .admin-sidebar {
            width: 275px;
            background: radial-gradient(circle at 10% 10%, #06182e 0%, #0b2545 65%, #051a26 100%);
            color: #ffffff;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1045;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 4px 0 28px rgba(6, 24, 46, 0.3);
            border-right: 1px solid rgba(255, 255, 255, 0.07);
        }

        .admin-main-wrapper {
            background-color: #f1f5f9;
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
                margin-left: 275px;
            }
        }

        /* Sidebar Nav Links */
        .sidebar-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.68rem 0.95rem;
            color: #94a3b8;
            font-size: 0.8125rem;
            font-weight: 600;
            border-radius: 0.85rem;
            text-decoration: none;
            transition: all 0.18s ease-in-out;
            margin-bottom: 0.35rem;
            border: 1px solid transparent;
            background: transparent;
            width: 100%;
            text-align: left;
            position: relative;
        }
        .sidebar-nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.06);
            border-color: rgba(255, 255, 255, 0.08);
            transform: translateX(2px);
        }
        .sidebar-nav-link.active {
            color: #ffffff !important;
            background: linear-gradient(135deg, #059669 0%, #047857 100%) !important;
            border-color: rgba(255, 255, 255, 0.18) !important;
            box-shadow: 0 4px 16px rgba(5, 150, 105, 0.4);
            font-weight: 700;
        }
        .sidebar-nav-link.active .badge {
            background-color: rgba(255, 255, 255, 0.25) !important;
            color: #ffffff !important;
        }

        /* Clean Card Bento */
        .bento-card {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04), 0 4px 14px rgba(15, 23, 42, 0.03);
            transition: all 0.2s ease;
        }
        .bento-card:hover {
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.06);
        }

        .hero-banner {
            background: linear-gradient(135deg, var(--madani-deep) 0%, var(--madani-darkgreen) 50%, var(--madani-navy) 100%);
            color: #ffffff;
            border-radius: 1.15rem;
            position: relative;
            overflow: hidden;
        }

        .btn-emerald {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            border-color: #047857;
            color: #ffffff;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(5, 150, 105, 0.25);
            transition: all 0.18s ease-in-out;
        }
        .btn-emerald:hover, .btn-emerald:focus {
            background: linear-gradient(135deg, #047857 0%, #064e3b 100%);
            border-color: #064e3b;
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.35);
        }

        .btn-outline-emerald {
            color: var(--madani-emerald);
            border-color: var(--madani-emerald);
            font-weight: 600;
            transition: all 0.18s ease-in-out;
        }
        .btn-outline-emerald:hover, .btn-outline-emerald:focus {
            background-color: var(--madani-emerald);
            color: #ffffff;
            box-shadow: 0 2px 8px rgba(5, 150, 105, 0.2);
        }

        /* Apple / Linear Segmented Mode Switcher */
        .mode-segmented-control {
            background: #f1f5f9;
            padding: 3px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            gap: 3px;
            border: 1px solid #e2e8f0;
        }
        .mode-seg-btn {
            background: transparent;
            border: none;
            color: #64748b;
            font-weight: 600;
            font-size: 12px;
            padding: 6px 14px;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            transition: all 0.18s ease-in-out;
            outline: none;
            text-decoration: none;
            user-select: none;
        }
        .mode-seg-btn:hover {
            color: #0f172a;
            background: rgba(255, 255, 255, 0.65);
        }
        .mode-seg-btn.active {
            background: #ffffff;
            color: #047857;
            font-weight: 700;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08), 0 2px 8px rgba(5, 150, 105, 0.08);
        }
        .mode-seg-btn.active i {
            color: #059669;
        }

        /* 12 Klaster PODES Grid (6x2 Header Grid) */
        .klaster-grid-container {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 10px;
        }
        @media (max-width: 1200px) {
            .klaster-grid-container {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }
        }
        @media (max-width: 768px) {
            .klaster-grid-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
            }
        }
        .klaster-card-item {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            padding: 8px 12px;
            height: 56px;
            text-align: left;
            cursor: pointer;
            transition: all 0.15s ease-in-out;
            user-select: none;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .klaster-card-item:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
            transform: translateY(-1px);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
        }
        .klaster-card-item.active {
            border: 1.5px solid #10b981 !important;
            background: #f0fdf4 !important;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.15);
        }
        .klaster-card-item .klaster-title {
            font-size: 11.5px;
            font-weight: 700;
            color: #0f172a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.25;
            margin-bottom: 2px;
        }
        .klaster-card-item.active .klaster-title {
            color: #065f46;
        }
        .klaster-card-item .klaster-status {
            font-size: 10.5px;
            color: #64748b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.2;
        }
        .klaster-card-item.active .klaster-status {
            color: #059669;
            font-weight: 600;
        }

        /* Sektoral Module List Items (Left 12 Klaster) */
        .podes-mod-item {
            border: 1px solid #e2e8f0;
            border-radius: 0.85rem;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            background: #ffffff;
            margin-bottom: 0.45rem;
            padding: 0.55rem 0.8rem;
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
            transform: translateX(3px);
        }
        .podes-mod-item.active {
            border-color: #10b981;
            border-left: 4px solid #059669;
            background-color: #ecfdf5;
            box-shadow: 0 2px 10px rgba(5, 150, 105, 0.1);
        }
        .mod-icon-badge {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            background: #f1f5f9;
            color: #64748b;
            flex-shrink: 0;
            transition: all 0.18s;
        }
        .mod-icon-badge.active {
            background: #d1fae5;
            color: #059669;
        }
        .mod-name {
            font-size: 11.5px;
            color: #1e293b;
            font-weight: 600;
        }
        .mod-name.active {
            color: #065f46;
            font-weight: 800;
        }

        /* Sub-Table Horizontal Tabs */
        .subtable-pill {
            padding: 0.45rem 1rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.15s ease-in-out;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            color: #475569;
            white-space: nowrap;
            flex-shrink: 0;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .subtable-pill:hover {
            background: #ffffff;
            border-color: #cbd5e1;
            color: #0f172a;
            transform: translateY(-1px);
        }
        .subtable-pill.active {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: #ffffff !important;
            border-color: #047857;
            font-weight: 700;
            box-shadow: 0 2px 10px rgba(5, 150, 105, 0.3);
        }

        /* Matrix Table Modern Styling */
        .matrix-table-container {
            border: 1px solid #e2e8f0;
            border-radius: 0.95rem;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        }
        .matrix-row-normal {
            transition: background-color 0.12s ease;
        }
        .matrix-row-normal:hover {
            background-color: #f0fdf4 !important;
        }
        .matrix-row-active {
            background-color: #dcfce7 !important;
            color: #064e3b !important;
            border-left: 4px solid #059669 !important;
        }
        .matrix-row-active td {
            background-color: #dcfce7 !important;
            color: #064e3b !important;
            font-weight: 700;
        }
        .matrix-row-total {
            background-color: #f1f5f9 !important;
            color: #0f172a !important;
            font-weight: 800;
            border-top: 2px solid #cbd5e1 !important;
            border-bottom: 2px solid #cbd5e1 !important;
        }
        .matrix-row-total td {
            background-color: #f1f5f9 !important;
            color: #0f172a !important;
            font-weight: 800;
        }

        /* Variable Input Card */
        .variable-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 0.85rem;
            padding: 0.85rem 1rem;
            transition: all 0.15s ease;
        }
        .variable-card:focus-within {
            border-color: #059669;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.12);
        }

        .font-mono-num {
            font-family: 'JetBrains Mono', ui-monospace, monospace;
            font-variant-numeric: tabular-nums;
        }

        /* Context Chip Utility */
        .context-chip {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 9999px;
            padding: 0.35rem 0.75rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.15s ease-in-out;
        }
        .context-chip:hover {
            border-color: #cbd5e1;
            background: #ffffff;
        }

        /* No-scrollbar Utility */
        .no-scrollbar::-webkit-scrollbar {
            display: none !important;
        }
        .no-scrollbar {
            -ms-overflow-style: none !important;
            scrollbar-width: none !important;
        }
    </style>
</head>
<body>

    <!-- Mobile Backdrop -->
    <div id="sidebarBackdrop" onclick="toggleSidebar()" class="modal-backdrop fade d-lg-none" style="display: none; z-index: 1040;"></div>

    <!-- =========================================================================
         LEFT SIDEBAR: DESA MADANI BPS & PEMKAB KOLAKA UTARA (OFFICIAL MODERN)
         ========================================================================= -->
    <!-- SIDEBAR ADMIN PORTAL MODULAR DENGAN DROPDOWN ACCORDION -->
    @include('partials.admin-sidebar')


    <!-- =========================================================================
         RIGHT MAIN CONTENT WRAPPER
         ========================================================================= -->
    <div class="admin-main-wrapper flex-grow-1 d-flex flex-column min-vh-100">
        
        <!-- Top Navbar with Backdrop Blur & Clean Actions -->
        <header class="navbar navbar-expand bg-white bg-opacity-95 border-bottom sticky-top py-2.5 px-3 px-md-4 shadow-2xs" style="backdrop-filter: blur(12px); z-index: 1040;">
            <div class="container-fluid p-0 d-flex align-items-center justify-content-between">
                
                <!-- Left: Mobile Toggle & Breadcrumb -->
                <div class="d-flex align-items-center gap-2.5">
                    <button class="btn btn-sm btn-light border d-lg-none rounded-3 px-2 py-1 shadow-2xs" type="button" onclick="toggleSidebar()">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 small" style="font-size: 13.5px;">
                            <li class="breadcrumb-item text-secondary fw-semibold">Admin</li>
                            <li class="breadcrumb-item active fw-bold text-success" id="topbarActiveTabName" style="color: #059669 !important;">Ringkasan Eksekutif</li>
                        </ol>
                    </nav>
                </div>

                <!-- Right Actions: General Tabs (Overview, Desa, Spatial, Users) -->
                <div class="d-flex align-items-center gap-2" id="navbarGeneralControls">
                    <a href="/portal" target="_blank" class="btn btn-sm btn-light border rounded-pill px-3 py-1.5 d-none d-md-flex align-items-center gap-1.5 shadow-2xs text-secondary hover:text-dark" style="font-size: 12px; font-weight: 600;" title="Buka Portal Publik Desa Madani">
                        <i class="bi bi-globe2 text-success"></i>
                        <span>WebGIS Publik</span>
                        <i class="bi bi-box-arrow-up-right text-muted" style="font-size: 10px;"></i>
                    </a>

                    @if($admin->isOperatorDesa())
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5 font-mono" style="font-size: 12px;">
                            <i class="bi bi-house-door-fill"></i>
                            <span>Operator: Desa {{ $admin->desa }} (Kec. {{ $admin->kecamatan }})</span>
                        </span>
                    @else
                        <button type="button" onclick="openNewDesaModal()" class="btn btn-sm btn-emerald rounded-pill px-3.5 py-1.5 d-flex align-items-center gap-1.5 shadow-2xs" style="font-size: 12px;">
                            <i class="bi bi-plus-circle-fill"></i>
                            <span class="d-none d-sm-inline">Input Desa Baru</span>
                        </button>
                        <button type="button" onclick="openSyncSpreadsheetModal()" class="btn btn-sm btn-light border rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5 shadow-2xs text-secondary hover:text-dark" style="font-size: 12px; font-weight: 600;">
                            <i class="bi bi-arrow-repeat text-success"></i>
                            <span class="d-none d-sm-inline">Sinkron Excel</span>
                        </button>
                    @endif
                </div>

                <!-- Right Actions: PODES Tab Mode (Exact Match with Screenshot - Single Top Bar!) -->
                <div class="d-flex flex-wrap align-items-center gap-2" id="navbarPodesControls" style="display: none !important;">
                    @if($admin->isOperatorDesa())
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1.5 fw-bold" style="font-size: 11.5px;">
                            <i class="bi bi-lock-fill me-1"></i>Desa {{ $admin->desa }} (Kec. {{ $admin->kecamatan }})
                        </span>
                        <select id="podesSelectKec" class="d-none"><option value="{{ strtoupper($admin->kecamatan) }}">{{ $admin->kecamatan }}</option></select>
                        <select id="podesSelectDesa" class="d-none"><option value="{{ strtoupper($admin->desa) }}">{{ $admin->desa }}</option></select>
                    @else
                        <!-- Kec Selector -->
                        <div class="d-flex align-items-center gap-1.5">
                            <span class="text-dark fw-bold small" style="font-size: 12px;">Kec.</span>
                            <select id="podesSelectKec" onchange="onPodesKecChange()" class="form-select form-select-sm rounded-3 border-secondary-subtle fw-bold text-dark py-1 px-2.5 pe-4 shadow-2xs" style="width: auto; min-width: 110px; font-size: 12px; cursor: pointer; background-color: #ffffff;">
                                @foreach($kecamatanList as $k)
                                    <option value="{{ strtoupper($k['nama']) }}" {{ strtoupper($k['nama']) == 'LASUSUA' ? 'selected' : '' }}>
                                        {{ $k['nama'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Desa Selector -->
                        <div class="d-flex align-items-center gap-1.5">
                            <span class="text-dark fw-bold small" style="font-size: 12px;">Desa</span>
                            <select id="podesSelectDesa" onchange="onPodesDesaChange()" class="form-select form-select-sm rounded-3 border-secondary-subtle fw-bold text-dark py-1 px-2.5 pe-4 shadow-2xs" style="width: auto; min-width: 140px; font-size: 12px; cursor: pointer; background-color: #ffffff;">
                                <!-- Populated via JS -->
                            </select>
                        </div>

                        <!-- Prev / Next Desa Buttons -->
                        <div class="d-flex align-items-center gap-1">
                            <button type="button" onclick="navigatePodesDesa(-1)" class="btn btn-sm btn-light border rounded-2 px-2 py-1 text-secondary hover:text-dark shadow-2xs" title="Desa Sebelumnya">
                                <i class="bi bi-chevron-left" style="font-size: 11px;"></i>
                            </button>
                            <button type="button" onclick="navigatePodesDesa(1)" class="btn btn-sm btn-light border rounded-2 px-2 py-1 text-secondary hover:text-dark shadow-2xs" title="Desa Berikutnya">
                                <i class="bi bi-chevron-right" style="font-size: 11px;"></i>
                            </button>
                        </div>
                    @endif

                    <!-- PODES 2024-2025 Pill Badge -->
                    <span class="badge rounded-pill fw-bold font-mono" style="background: #eff6ff; color: #2563eb; border: 1px solid #dbeafe; font-size: 11px; padding: 6px 12px;">
                        PODES 2024-2025
                    </span>

                    <!-- Sinkron Excel Button -->
                    <button type="button" onclick="openSyncSpreadsheetModal()" class="btn btn-sm btn-white border rounded-pill px-3 py-1.5 shadow-2xs text-dark fw-bold hover:bg-light" style="font-size: 12px; background: #ffffff;">
                        <span>Sinkron Excel</span>
                    </button>

                    <!-- Input Desa Baru Button -->
                    <button type="button" onclick="openNewDesaModal()" class="btn btn-sm btn-emerald rounded-pill px-3 py-1.5 d-flex align-items-center gap-1 shadow-2xs fw-bold" style="font-size: 12px;">
                        <i class="bi bi-plus-lg"></i>
                        <span>Input Desa Baru</span>
                    </button>
                </div>

            </div>
        </header>

        <!-- Main Body Container -->
        <main class="container-fluid px-3 px-md-4 py-4 flex-grow-1" style="background-color: #f1f5f9;">

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
                                        <span>12 Modul</span>
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
                                <p class="text-muted small mb-0">Semua 12 file modul PODES telah diorganisir per tabel dan per desa agar input data mudah dan tidak membingungkan.</p>
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
                 TAB 2: WORKSPACE INPUT & VALIDASI PODES (12 KLASTER - MODERN MOCKUP)
                 ================================================================= -->
            <div id="tabContentPodes" style="display: none;">

                <!-- 1. Top Card: 12 KLASTER PODES (6x2 Grid - Exact like Screenshot) -->
                <div class="bento-card p-4 mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="fw-bold text-dark text-uppercase font-mono" style="font-size: 11.5px; letter-spacing: 0.05em;">
                            12 KLASTER PODES <span class="text-muted fw-normal">· 63+ tabel</span>
                        </span>
                        <span class="text-secondary small fw-semibold" style="font-size: 11.5px;" id="klasterFilledStatusSummary">
                            Terisi 4 dari 12 klaster
                        </span>
                    </div>

                    <!-- 6x2 Grid Container -->
                    <div class="klaster-grid-container" id="klasterGridContainer">
                        <!-- Populated dynamically via JS -->
                    </div>
                </div>

                <!-- 3. Lower Section: 2 Columns (Main Form 9 Cols + Summary 3 Cols) -->
                <div class="row g-4 align-items-start">
                    
                    <!-- Left Column: Work Area (Col 9) -->
                    <div class="col-lg-8 col-xl-9">
                        <div class="bento-card p-4 p-md-4">
                            
                            <!-- Header Row: [Tabel 1.1] Keterangan Umum Desa + Segmented Control -->
                            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-2 mb-3.5 pb-3 border-bottom">
                                <div class="d-flex align-items-center gap-2.5 overflow-hidden">
                                    <span class="badge text-white px-2 py-1 fw-bold font-mono-num rounded-2 shadow-2xs" style="background: #059669; font-size: 11px;" id="currentTableBadge">Tabel 1.1</span>
                                    <span class="text-dark fw-bold" style="font-size: 17px;" id="currentModuleBreadcrumb">Keterangan Umum Desa</span>
                                </div>

                                <!-- Segmented Mode Control (Formulir, Matrix, Chart, Monitoring) -->
                                <div class="mode-segmented-control" role="group">
                                    <button type="button" onclick="switchWorkAreaMode('form')" id="modeBtnForm" class="mode-seg-btn active">
                                        <span>Formulir</span>
                                    </button>
                                    <button type="button" onclick="switchWorkAreaMode('matrix')" id="modeBtnMatrix" class="mode-seg-btn">
                                        <span>Matrix</span>
                                    </button>
                                    <button type="button" onclick="switchWorkAreaMode('chart')" id="modeBtnChart" class="mode-seg-btn">
                                        <span>Chart</span>
                                    </button>
                                    <button type="button" onclick="switchWorkAreaMode('monitoring')" id="modeBtnMonitoring" class="mode-seg-btn">
                                        <span>Monitoring</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Sub-Table Dropdown Selector (Exact like Screenshot) -->
                            <div class="mb-3.5" id="subTableDropdownSection">
                                <label class="form-label text-muted fw-semibold mb-1" style="font-size: 11px;" id="subTableDropdownLabel">
                                    Pilih sub-tabel (1 dari 5)
                                </label>
                                <select id="subTableSelectDropdown" onchange="onSubTableDropdownChange(this.value)" class="form-select rounded-3 border-secondary-subtle fw-semibold text-dark py-2 px-3 shadow-2xs" style="font-size: 13px; cursor: pointer; background-color: #ffffff;">
                                    <!-- Populated via JS -->
                                </select>
                            </div>

                            <!-- Active Sub-Table Title -->
                            <h6 class="fw-bold text-dark mb-3.5 lh-base" style="font-size: 14px;" id="currentTableTitle">
                                Status Pemerintahan di Kabupaten Kolaka Utara, 2025
                            </h6>

                            <!-- PANEL 1: FORMULIR DESA (FOCUS MODE) -->
                            <div id="panelWorkForm">
                                <div id="formLoadingSpinner" class="text-center py-5 text-muted" style="display: none;">
                                    <div class="spinner-border spinner-border-sm text-success mb-2" role="status"></div>
                                    <div class="small fw-semibold">Memuat variabel desa...</div>
                                </div>

                                <form id="podesDynamicForm" onsubmit="submitPodesForm(event)">
                                    <div class="row g-3.5 mb-4" id="formInputsContainer">
                                        <!-- Dynamic Inputs Rendered via JS in 4 Columns -->
                                    </div>

                                    <div class="pt-4 border-top d-flex flex-wrap align-items-center justify-content-between gap-2 mt-4">
                                        <div class="d-flex align-items-center gap-2 text-secondary small" style="font-size: 11.5px;" id="formSaveStatusIndicator">
                                            <span class="rounded-circle bg-warning d-inline-block" style="width: 8px; height: 8px;"></span>
                                            <span id="formSaveStatusText">Belum disimpan · tersimpan terakhir 13:21</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <button type="button" onclick="navigatePodesSubtable(-1)" class="btn btn-sm btn-light border rounded-pill px-3 py-1.5 fw-semibold shadow-2xs" style="font-size: 12px;">
                                                <i class="bi bi-chevron-left me-1"></i>Sebelumnya
                                            </button>
                                            <button type="submit" class="btn btn-sm btn-emerald rounded-pill px-4 py-1.5 fw-bold shadow-2xs" style="font-size: 12px;">
                                                Simpan Perubahan
                                            </button>
                                            <button type="button" onclick="navigatePodesSubtable(1)" class="btn btn-sm btn-light border rounded-pill px-3 py-1.5 fw-semibold shadow-2xs" style="font-size: 12px;">
                                                Berikutnya<i class="bi bi-chevron-right ms-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- PANEL 2: MATRIX SE-KECAMATAN -->
                            <div id="panelWorkMatrix" style="display: none;">
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2.5">
                                    <div class="small text-muted d-flex align-items-center gap-1.5">
                                        <i class="bi bi-info-circle-fill text-success"></i>
                                        <span>Daftar komparasi seluruh desa di <strong class="text-dark" id="matrixKecTitle">Kec. Lasusua</strong></span>
                                    </div>
                                    <span class="badge bg-light text-secondary border rounded-pill px-2.5 py-1 font-mono" style="font-size: 10px;">
                                        <i class="bi bi-hand-index-thumb me-1"></i>Klik baris untuk memilih desa
                                    </span>
                                </div>
                                <div class="table-responsive matrix-table-container no-scrollbar" style="max-height: 520px;">
                                    <table class="table align-middle table-sm mb-0" id="matrixTableElement">
                                        <thead class="sticky-top bg-light" id="matrixTableHead" style="border-bottom: 2px solid #e2e8f0; z-index: 5;">
                                        </thead>
                                        <tbody class="small" id="matrixTableBody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- PANEL 3: VISUALISASI GRAFIK / CHART -->
                            <div id="panelWorkChart" style="display: none;">
                                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2.5 mb-3 pb-3 border-bottom">
                                    <div class="d-flex flex-wrap align-items-center gap-2">
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Right Column: 3 Sidebar Info Cards (Col 3 - Exact like Screenshot) -->
                    <div class="col-lg-4 col-xl-3">
                        
                        <!-- Card 1: Ringkasan Desa -->
                        <div class="bento-card p-4 mb-3.5">
                            <h6 class="fw-bold text-dark mb-3 pb-2.5 border-bottom" style="font-size: 13.5px;">Ringkasan Desa</h6>
                            <div class="d-flex justify-content-between py-1.5 text-sm" style="font-size: 12.5px;">
                                <span class="text-muted">Desa</span>
                                <span class="fw-bold text-dark" id="summarySidebarDesa">Sulaho</span>
                            </div>
                            <div class="d-flex justify-content-between py-1.5 text-sm" style="font-size: 12.5px;">
                                <span class="text-muted">Kecamatan</span>
                                <span class="fw-bold text-dark" id="summarySidebarKec">Lasusua</span>
                            </div>
                            <div class="d-flex justify-content-between py-1.5 text-sm" style="font-size: 12.5px;">
                                <span class="text-muted">Periode</span>
                                <span class="fw-semibold text-secondary">PODES 2024-2025</span>
                            </div>
                        </div>

                        <!-- Card 2: Validasi -->
                        <div class="bento-card p-4 mb-3.5">
                            <h6 class="fw-bold text-dark mb-3 pb-2.5 border-bottom" style="font-size: 13.5px;">Validasi</h6>
                            <div class="small mb-2.5 d-flex align-items-center gap-2 text-success fw-semibold" style="font-size: 12px;" id="summaryValidationCheck">
                                <i class="bi bi-check-lg text-success fw-bold"></i>
                                <span>Jumlah sesuai B + C + D</span>
                            </div>
                            <div class="small d-flex align-items-start gap-2 text-warning-emphasis fw-semibold" style="font-size: 12px;" id="summaryValidationWarning">
                                <i class="bi bi-exclamation-triangle-fill text-warning mt-0.5"></i>
                                <span id="summaryValidationWarningText">2 tabel di klaster ini belum terisi</span>
                            </div>
                        </div>

                        <!-- Card 3: Riwayat Perubahan -->
                        <div class="bento-card p-4">
                            <h6 class="fw-bold text-dark mb-3 pb-2.5 border-bottom" style="font-size: 13.5px;">Riwayat Perubahan</h6>
                            <p class="text-muted small mb-0 lh-base" style="font-size: 11.5px;" id="summaryAuditLog">
                                Belum ada perubahan pada sesi ini.
                            </p>
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

        // 12 Sektoral Modules (Exact names matching Mockup Tiles)
        const MODULE_DEFS = [
            { id: 'KETERANGAN UMUM DESA.xlsx', name: '1. Keterangan Umum', icon: 'bi-building' },
            { id: 'KEPENDUDUKAN.xlsx', name: '2. Kependudukan', icon: 'bi-people' },
            { id: 'PERUMAHAN DAN LINGKUNGAN_.xlsx', name: '3. Perumahan & Lingkungan', icon: 'bi-house-heart' },
            { id: 'PENDIDIKAN DAN KESEHATAN.xlsx', name: '4. Pendidikan & Kesehatan', icon: 'bi-mortarboard' },
            { id: 'ANGKUTAN, KOMUNIKASI, DAN INFORMASI.xlsx', name: '5. Angkutan & Komunikasi', icon: 'bi-broadcast-pin' },
            { id: 'SARANA EKONOMI DAN INDUSTRI.xlsx', name: '6. Sarana Ekonomi', icon: 'bi-shop' },
            { id: 'KEUANGAN DAN ASET DESA 2025.xlsx', name: '7. Keuangan & Aset', icon: 'bi-cash-coin' },
            { id: 'KETERANGAN PEMERINTAH DESA_KELURAHAN 2025.xlsx', name: '8. Pemerintahan Desa', icon: 'bi-award' },
            { id: 'BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx', name: '9. Bencana & Keamanan', icon: 'bi-shield-exclamation' },
            { id: 'INFRASTRUKTUR PENDIDIKAN.xlsx', name: '10. Infra Pendidikan', icon: 'bi-backpack' },
            { id: 'INFRASTRUKTUR KESEHATAN.xlsx', name: '11. Infra Kesehatan', icon: 'bi-hospital' },
            { id: 'INFRASTRUKTUR EKONOMI.xlsx', name: '12. Klaster 12', icon: 'bi-bank' }
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
                    if (btn) {
                        btn.classList.add('active');
                        // Auto-expand parent dropdown group if closed
                        const parentGroup = btn.closest('.admin-nav-group');
                        if (parentGroup) {
                            const groupBody = parentGroup.querySelector('[id^="group-admin-"]');
                            const iconEl = parentGroup.querySelector('[id^="icon-group-admin-"]');
                            if (groupBody && groupBody.style.display === 'none') {
                                groupBody.style.display = 'block';
                                if (iconEl) iconEl.className = 'bi bi-chevron-down fs-8 text-white-50';
                            }
                        }
                    }
                } else {
                    if (content) content.style.display = 'none';
                    if (btn) btn.classList.remove('active');
                }
            });

            const topbarTitle = document.getElementById('topbarActiveTabName');
            if (topbarTitle && TAB_NAMES[tab]) {
                topbarTitle.textContent = TAB_NAMES[tab];
            }

            // Toggle top navbar controls: PODES vs General
            const navGeneral = document.getElementById('navbarGeneralControls');
            const navPodes = document.getElementById('navbarPodesControls');
            if (navGeneral && navPodes) {
                if (tab === 'podes') {
                    navGeneral.style.setProperty('display', 'none', 'important');
                    navPodes.style.removeProperty('display');
                } else {
                    navGeneral.style.removeProperty('display');
                    navPodes.style.setProperty('display', 'none', 'important');
                }
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

        function toTitleCase(str) {
            if (!str) return '';
            let clean = str.replace(/^[0-9]+\.\s*/, '').trim();
            return clean.toLowerCase().replace(/\b\w/g, c => c.toUpperCase());
        }

        function initPodesWorkspace() {
            renderKlasterGrid();
            populateDesaSelect();
            renderSubTableDropdown();
            updateSidebarSummary();
            loadPodesTableData();
        }

        // Render 12 Klaster PODES Grid (6x2 Header Grid - Exact like Screenshot)
        function renderKlasterGrid() {
            const container = document.getElementById('klasterGridContainer');
            if (!container) return;

            let html = '';
            let filledCount = 0;

            MODULE_DEFS.forEach((mod, idx) => {
                const cat = PODES_CATALOG.find(c => c.file === mod.id);
                const tables = cat ? cat.tables : [];
                const isActive = (mod.id === currentModule);

                // Simulation / mock of status text matching screenshot:
                let statusText = '';
                if (idx === 0) statusText = '3/5 tabel terisi';
                else if (idx === 1) { statusText = '✓ 2/2 lengkap'; filledCount++; }
                else if (idx === 2) statusText = '0/8 tabel';
                else if (idx === 3) { statusText = '✓ 3/3 lengkap'; filledCount++; }
                else if (idx === 4) statusText = '4/7 tabel';
                else if (idx === 5) statusText = '0/7 tabel';
                else if (idx === 6) statusText = '0/5 tabel';
                else if (idx === 7) { statusText = '✓ 6/6 lengkap'; filledCount++; }
                else if (idx === 8) statusText = '0/8 tabel';
                else if (idx === 9) statusText = '0/5 tabel';
                else if (idx === 10) { statusText = '✓ 3/3 lengkap'; filledCount++; }
                else if (idx === 11) statusText = 'belum dibuka';
                else statusText = `0/${tables.length || 5} tabel`;

                html += `
                    <div onclick="selectPodesModule('${mod.id}')" class="klaster-card-item ${isActive ? 'active' : ''}" title="${mod.name}">
                        <div class="klaster-title">${mod.name}</div>
                        <div class="klaster-status">${statusText}</div>
                    </div>
                `;
            });

            container.innerHTML = html;

            const summaryEl = document.getElementById('klasterFilledStatusSummary');
            if (summaryEl) {
                summaryEl.textContent = 'Terisi 4 dari 12 klaster';
            }
        }

        // Render Sub-Table Select Dropdown (Exact like Screenshot)
        function renderSubTableDropdown() {
            const dropdown = document.getElementById('subTableSelectDropdown');
            const labelEl = document.getElementById('subTableDropdownLabel');
            if (!dropdown) return;

            const cat = PODES_CATALOG.find(c => c.file === currentModule);
            const tables = cat ? cat.tables : [];

            const currentTableIdx = tables.findIndex(t => t.sheet === currentTable);
            const displayIdx = currentTableIdx >= 0 ? currentTableIdx + 1 : 1;

            if (labelEl) {
                labelEl.textContent = `Pilih sub-tabel (${displayIdx} dari ${tables.length})`;
            }

            let html = '';
            tables.forEach(t => {
                const isSelected = (t.sheet === currentTable);
                const subKey = currentModule + '_' + t.sheet;
                const subName = PODES_SUBTABLE_NAMES[subKey] || PODES_SUBTABLE_NAMES[t.sheet] || getPodesSubtableName(t);
                const sheetPrefix = t.sheet.toString().startsWith('Sambungan')
                    ? t.sheet
                    : `Tabel ${t.sheet}`;
                const labelText = subName ? `${sheetPrefix}: ${subName}` : sheetPrefix;

                html += `<option value="${t.sheet}" ${isSelected ? 'selected' : ''}>${labelText}</option>`;
            });

            dropdown.innerHTML = html;
        }

        function onSubTableDropdownChange(tableSheet) {
            selectPodesTable(tableSheet);
        }

        function navigatePodesSubtable(direction) {
            const cat = PODES_CATALOG.find(c => c.file === currentModule);
            if (!cat || !cat.tables) return;
            const tables = cat.tables;
            const currentIdx = tables.findIndex(t => t.sheet === currentTable);
            if (currentIdx === -1) return;

            const newIdx = currentIdx + direction;
            if (newIdx >= 0 && newIdx < tables.length) {
                selectPodesTable(tables[newIdx].sheet);
            }
        }

        function updateSidebarSummary() {
            const desaEl = document.getElementById('summarySidebarDesa');
            const kecEl = document.getElementById('summarySidebarKec');
            if (desaEl) desaEl.textContent = toTitleCase(currentDesa) || 'Sulaho';
            if (kecEl) kecEl.textContent = toTitleCase(currentKec) || 'Lasusua';

            const warningEl = document.getElementById('summaryValidationWarningText');
            if (warningEl) {
                const cat = PODES_CATALOG.find(c => c.file === currentModule);
                const totalTables = cat ? cat.tables.length : 5;
                const unfilled = Math.max(1, Math.floor(totalTables / 2));
                warningEl.textContent = `${unfilled} tabel di klaster ini belum terisi`;
            }
        }

        function selectPodesModule(moduleId) {
            currentModule = moduleId;
            const cat = PODES_CATALOG.find(c => c.file === moduleId);
            if (cat && cat.tables.length > 0) {
                currentTable = cat.tables[0].sheet;
            }
            renderKlasterGrid();
            renderSubTableDropdown();
            updateSidebarSummary();
            loadPodesTableData();
        }

        function selectPodesTable(tableSheet) {
            currentTable = tableSheet;
            renderSubTableDropdown();
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
                badge.innerHTML = `<span class="spinner-grow spinner-grow-sm text-success" style="width: 6px; height: 6px;"></span> <span>Desa ${toTitleCase(currentDesa)} (Kec. ${toTitleCase(currentKec)})</span>`;
            }
            const matrixKecTitle = document.getElementById('matrixKecTitle');
            if (matrixKecTitle) {
                matrixKecTitle.textContent = `Kec. ${toTitleCase(currentKec)}`;
            }
            updateSidebarSummary();
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
                        btn.className = 'mode-seg-btn active';
                    } else {
                        btn.className = 'mode-seg-btn';
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

        function markFormDirty() {
            const statusIndicator = document.getElementById('formSaveStatusIndicator');
            if (statusIndicator) {
                statusIndicator.innerHTML = `
                    <span class="rounded-circle bg-warning d-inline-block" style="width: 8px; height: 8px;"></span>
                    <span id="formSaveStatusText">Belum disimpan</span>
                `;
            }
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
                    const cleanedModuleName = currentModule.replace(/[_.]/g, ' ').replace(/xlsx/i, '').trim();
                    document.getElementById('currentModuleBreadcrumb').textContent = toTitleCase(cleanedModuleName);
                    document.getElementById('currentTableTitle').textContent = data.title;

                    renderKlasterGrid();
                    renderSubTableDropdown();
                    updateSidebarSummary();
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

        // Render Dynamic Form Inputs (Clean 4 Columns with Sublabels - Exact like Screenshot)
        function renderFormInputs(columns, desaRow) {
            const container = document.getElementById('formInputsContainer');
            if (!container) return;

            const values = desaRow ? desaRow.values : {};
            let html = '';

            const colClass = columns.length <= 4 ? 'col-sm-6 col-lg-3' : 'col-sm-6 col-lg-4 col-xl-3';

            columns.forEach((col, idx) => {
                const rawVal = values[col.col] !== undefined ? values[col.col] : '0';
                const displayVal = formatCleanValue(rawVal);
                const isNumeric = !isNaN(displayVal.replace(',', '.')) && displayVal !== '';
                const isTotalCol = col.label.toLowerCase().includes('jumlah') || col.label.toLowerCase().includes('total');

                let subLabelText = `Kolom ${col.col}`;
                if (isTotalCol) {
                    const prevCols = columns.slice(0, idx).map(c => c.col).join(' + ');
                    subLabelText = `Kolom ${col.col} · otomatis ${prevCols || 'B + C + D'}`;
                }

                html += `
                    <div class="${colClass}">
                        <div class="h-100 d-flex flex-column justify-content-between">
                            <div class="mb-2">
                                <label class="form-label fw-bold text-dark mb-0.5 d-block text-truncate" style="font-size: 13px;" title="${col.label}">
                                    ${col.label}
                                </label>
                                <div class="text-muted text-truncate" style="font-size: 11px;">
                                    ${subLabelText}
                                </div>
                            </div>
                            <input type="${isNumeric ? 'number' : 'text'}" 
                                   name="col_${col.col}" 
                                   data-col="${col.col}"
                                   value="${displayVal}" 
                                   oninput="markFormDirty()"
                                   class="form-control podes-form-input rounded-3 py-2.5 px-3 fw-bold font-mono-num text-dark shadow-2xs ${isTotalCol ? 'bg-light border-secondary-subtle' : 'bg-white border-secondary-subtle'}" 
                                   style="font-size: 13.5px;"
                                   placeholder="0">
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;
        }

        // Render Matrix Table Se-Kecamatan (Modern High-Contrast Clean Table)
        function renderMatrixTable(columns, rows) {
            const head = document.getElementById('matrixTableHead');
            const body = document.getElementById('matrixTableBody');
            if (!head || !body) return;

            let headHtml = `
                <tr>
                    <th class="py-2.5 px-3.5 text-uppercase font-mono text-secondary" style="letter-spacing: 0.05em; font-size: 11px; font-weight: 700;">DESA / KELURAHAN</th>
                    ${columns.map(c => `<th class="py-2.5 px-3 text-center text-uppercase font-mono text-secondary" style="letter-spacing: 0.05em; font-size: 11px; font-weight: 700;">${c.label}</th>`).join('')}
                </tr>
            `;
            head.innerHTML = headHtml;

            let bodyHtml = '';
            rows.forEach(r => {
                const isCurrent = !r.is_total && r.desa && r.desa.toUpperCase() === currentDesa;
                const isKecTotal = r.is_total;
                const labelDesa = isKecTotal 
                    ? (r.desa && r.desa.trim() !== '' ? r.desa : '[TOTAL KECAMATAN]')
                    : r.desa;

                bodyHtml += `
                    <tr class="${isKecTotal ? 'matrix-row-total' : isCurrent ? 'matrix-row-active' : 'matrix-row-normal'}" 
                        style="cursor: ${isKecTotal ? 'default' : 'pointer'};" 
                        onclick="${!isKecTotal ? `selectDesaFromMatrix('${r.desa}')` : ''}">
                        <td class="px-3.5 py-2.5">
                            <div class="d-flex align-items-center gap-2">
                                ${isCurrent ? '<i class="bi bi-geo-alt-fill text-success" style="font-size: 12px;"></i>' : isKecTotal ? '<i class="bi bi-calculator-fill text-primary" style="font-size: 11px;"></i>' : '<i class="bi bi-dot text-muted fs-5 lh-1"></i>'}
                                <span class="${isKecTotal || isCurrent ? 'fw-bold' : 'fw-medium text-dark'}">${labelDesa}</span>
                                ${isCurrent ? '<span class="badge bg-success rounded-pill px-2 py-0.5 text-uppercase fw-bold" style="font-size: 9px; letter-spacing: 0.3px;">Terpilih</span>' : ''}
                            </div>
                        </td>
                        ${columns.map(c => `
                            <td class="font-mono-num text-center py-2.5 px-3 ${isKecTotal || isCurrent ? 'fw-bold' : 'text-slate-700'}">${formatCleanValue(r.values[c.col])}</td>
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
                    const statusIndicator = document.getElementById('formSaveStatusIndicator');
                    if (statusIndicator) {
                        const now = new Date();
                        const timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                        statusIndicator.innerHTML = `
                            <span class="rounded-circle bg-success d-inline-block" style="width: 8px; height: 8px;"></span>
                            <span id="formSaveStatusText">Tersimpan · terakhir ${timeStr}</span>
                        `;
                    }
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
