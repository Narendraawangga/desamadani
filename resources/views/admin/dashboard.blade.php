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

        /* Compatibility Utilities for Half-Step Spacing, Opacity & Flex Truncation */
        .gap-1\.5 { gap: 0.375rem !important; }
        .gap-2\.5 { gap: 0.625rem !important; }
        .g-1\.5 { --bs-gutter-x: 0.375rem; --bs-gutter-y: 0.375rem; }
        .p-3\.5 { padding: 1.125rem !important; }
        .px-2\.5 { padding-left: 0.625rem !important; padding-right: 0.625rem !important; }
        .px-3\.5 { padding-left: 0.9rem !important; padding-right: 0.9rem !important; }
        .py-0\.5 { padding-top: 0.15rem !important; padding-bottom: 0.15rem !important; }
        .py-1\.5 { padding-top: 0.4rem !important; padding-bottom: 0.4rem !important; }
        .py-2\.5 { padding-top: 0.625rem !important; padding-bottom: 0.625rem !important; }
        .mb-1\.5 { margin-bottom: 0.375rem !important; }
        .mb-2\.5 { margin-bottom: 0.625rem !important; }
        .min-w-0 { min-width: 0 !important; }
        .inset-0 { top: 0 !important; right: 0 !important; bottom: 0 !important; left: 0 !important; }
        .fw-black { font-weight: 800 !important; }
        .bg-opacity-20 { --bs-bg-opacity: 0.2 !important; }
        .bg-opacity-30 { --bs-bg-opacity: 0.3 !important; }
        .bg-opacity-95 { --bs-bg-opacity: 0.95 !important; }
        .border-opacity-10 { --bs-border-opacity: 0.1 !important; }
        .border-opacity-15 { --bs-border-opacity: 0.15 !important; }
        .border-opacity-25 { --bs-border-opacity: 0.25 !important; }
        .text-emerald-300 { color: #6ee7b7 !important; }
        .text-emerald-400 { color: #34d399 !important; }
        .shadow-2xs { box-shadow: 0 1px 2px rgba(15, 23, 42, 0.05) !important; }

        /* Sleek Pill Search & Segmented View Switcher */
        .search-pill-box {
            height: 36px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 9999px;
            transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
        }
        .search-pill-box:focus-within {
            background-color: #ffffff;
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
        }
        .kec-view-capsule {
            height: 36px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 9999px;
            padding: 3px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .kec-view-capsule .btn-view-tab {
            height: 28px;
            border-radius: 9999px;
            border: 0;
            padding: 0 12px;
            font-size: 11.5px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            line-height: 1;
            box-shadow: none;
            transition: all 0.15s ease;
        }
        .kec-view-capsule .btn-view-tab.active {
            background-color: #059669;
            color: #ffffff;
            box-shadow: 0 1px 2px rgba(5, 150, 105, 0.25);
        }
        .kec-view-capsule .btn-view-tab:not(.active) {
            background-color: transparent;
            color: #64748b;
        }
        .kec-view-capsule .btn-view-tab:not(.active):hover {
            background-color: #e2e8f0;
            color: #0f172a;
        }
        .select-pill-box {
            height: 36px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 9999px;
            font-size: 12.5px;
            font-weight: 600;
            color: #334155;
            padding-top: 0;
            padding-bottom: 0;
            padding-left: 14px;
            padding-right: 32px;
            cursor: pointer;
            transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
        }
        .select-pill-box:focus {
            background-color: #ffffff;
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
            outline: none;
        }
        .desa-status-chip {
            height: 28px;
            border-radius: 9999px;
            border: 0;
            padding: 0 10px;
            font-size: 11.5px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            line-height: 1;
            color: #64748b;
            background-color: transparent;
            box-shadow: none;
            transition: all 0.15s ease;
        }
        .desa-status-chip:hover {
            background-color: #e2e8f0;
            color: #0f172a;
        }
        .desa-status-chip.active {
            background-color: #059669;
            color: #ffffff;
            box-shadow: 0 1px 2px rgba(5, 150, 105, 0.25);
        }
        .desa-status-dot {
            width: 6px;
            height: 6px;
            border-radius: 9999px;
            display: inline-block;
            flex-shrink: 0;
        }
        .desa-status-chip.active .desa-status-dot {
            background-color: #ffffff !important;
        }
        .table-modern thead th {
            position: sticky;
            top: 0;
            background-color: #f8fafc;
            color: #334155;
            border-bottom: 2px solid #e2e8f0;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding-top: 0.85rem;
            padding-bottom: 0.85rem;
            z-index: 2;
        }
        .table-modern tbody td {
            border-color: #f1f5f9;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            vertical-align: middle;
        }
        .table-modern tbody tr:hover {
            background-color: #f0fdf4 !important;
        }
        .overview-chart-wrap {
            position: relative;
            width: 100%;
        }
        .overview-doughnut-wrap {
            position: relative;
            width: 190px;
            height: 190px;
            margin: 0 auto;
        }
        .overview-shortcut-tile {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 14px;
            text-align: left;
            transition: all 0.16s ease;
            width: 100%;
        }
        .overview-shortcut-tile:hover {
            background: #ffffff;
            border-color: #10b981;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.12);
            transform: translateY(-1px);
        }
        .overview-podes-card {
            background: linear-gradient(135deg, #064e3b 0%, #047857 55%, #0f172a 100%);
            border-radius: 14px;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Mobile Backdrop -->
    <div id="sidebarBackdrop" onclick="toggleSidebar()" class="modal-backdrop fade d-lg-none" style="display: none; z-index: 1040;"></div>

    <!-- =========================================================================
         LEFT SIDEBAR: DESA MADANI BPS & PEMKAB KOLAKA UTARA (OFFICIAL MODERN)
         ========================================================================= -->
    <aside id="adminSidebar" class="admin-sidebar">
        
        <!-- Sidebar Brand Header (Identik dengan Header Portal Utama) -->
        <div class="px-3.5 py-3 border-bottom border-white border-opacity-10 d-flex align-items-center justify-content-between">
            <a href="/admin" class="d-flex align-items-center gap-2.5 text-decoration-none group" title="Portal Eksekutif Admin Desa Madani">
                <div class="d-flex align-items-center gap-2 flex-shrink-0">
                    <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" style="height: 28px; width: auto; object-fit: contain;">
                    <div style="height: 18px; width: 1px; background: rgba(255,255,255,0.2);"></div>
                    <img src="/images/logo_bps.png" alt="BPS Kolut" style="height: 24px; width: auto; object-fit: contain;">
                </div>
                <div>
                    <div class="fw-black text-white text-uppercase" style="font-family: 'Cinzel', serif; font-size: 14.5px; letter-spacing: 0.05em; line-height: 1.1;">
                        DESA <span style="color: #34d399;">MADANI</span>
                    </div>
                    <div class="text-white-50 fw-semibold text-uppercase d-flex align-items-center gap-1.5" style="font-size: 9.5px; letter-spacing: 0.12em; margin-top: 2px;">
                        <span class="spinner-grow spinner-grow-sm text-success" style="width: 5px; height: 5px;"></span>
                        <span>PORTAL ADMIN BPS</span>
                    </div>
                </div>
            </a>
            <button class="btn btn-sm btn-link text-white-50 d-lg-none p-0 text-decoration-none" onclick="toggleSidebar()">
                <i class="bi bi-x-lg fs-5"></i>
            </button>
        </div>

        <!-- Sidebar Navigation Items -->
        <div class="flex-grow-1 overflow-y-auto px-3 py-3 no-scrollbar">
            
            <div class="text-uppercase text-white-50 fw-bold px-2 mb-2" style="font-size: 9.5px; letter-spacing: 0.8px;">
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
            </button>

            <!-- 3. Master Data Desa -->
            <button type="button" onclick="switchAdminTab('desa')" id="tabBtnDesa" class="sidebar-nav-link">
                <span class="d-flex align-items-center gap-2.5">
                    <i class="bi bi-buildings fs-6"></i>
                    <span>Master Data Desa</span>
                </span>
            </button>

            <!-- 3b. Master Kecamatan (Terhubung ke /portal/agregat) -->
            @if(!$admin->isOperatorDesa())
                <button type="button" onclick="switchAdminTab('kecamatan')" id="tabBtnKecamatan" class="sidebar-nav-link">
                    <span class="d-flex align-items-center gap-2.5">
                        <i class="bi bi-map fs-6"></i>
                        <span>Master Kecamatan</span>
                    </span>
                </button>
                <button type="button" onclick="switchAdminTab('aggregate')" id="tabBtnAggregate" class="sidebar-nav-link">
                    <span class="d-flex align-items-center gap-2.5">
                        <i class="bi bi-sliders2-vertical fs-6"></i>
                        <span>Ringkasan Portal</span>
                    </span>
                </button>
            @endif

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
                </button>
            @endif

        </div>

        <!-- Sidebar Footer: Profile & Logout -->
        <div class="p-3 border-top border-white border-opacity-10 bg-black bg-opacity-30 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2.5 overflow-hidden">
                <div class="rounded-circle d-flex align-items-center justify-content-center fw-black text-white" style="width: 36px; height: 36px; font-size: 13px; flex-shrink: 0; background: linear-gradient(135deg, #059669 0%, #047857 100%); box-shadow: 0 2px 8px rgba(5, 150, 105, 0.4);">
                    {{ strtoupper(substr($admin->name ?? 'A', 0, 1)) }}
                </div>
                <div class="overflow-hidden">
                    <div class="text-white fw-bold text-truncate" style="font-size: 12px;">{{ $admin->name }}</div>
                    @if($admin->isOperatorDesa())
                        <div class="text-emerald-300 text-truncate fw-semibold" style="font-size: 10px;">
                            <i class="bi bi-house-door-fill me-1"></i>Desa {{ $admin->desa }}
                        </div>
                    @else
                        <div class="text-white-50 text-truncate font-mono" style="font-size: 10px;">{{ $admin->email }}</div>
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
        
        <!-- Top Navbar with Backdrop Blur & Clean Actions -->
        <header class="navbar navbar-expand bg-white bg-opacity-95 border-bottom sticky-top py-2.5 px-3 px-md-4 shadow-2xs" style="backdrop-filter: blur(12px); z-index: 1040; min-height: 56px;">
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

                <!-- Right Actions: General Tabs -->
                <div class="d-flex align-items-center gap-2" id="navbarGeneralControls">
                    @if($admin->isOperatorDesa())
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5 font-mono" style="font-size: 12px;">
                            <i class="bi bi-house-door-fill"></i>
                            <span>Operator: Desa {{ $admin->desa }} (Kec. {{ $admin->kecamatan }})</span>
                        </span>
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

                    <!-- Lihat Portal Peta Button -->
                    <a href="/portal/peta" target="_blank" class="btn btn-sm btn-white border rounded-pill px-3 py-1.5 shadow-2xs text-secondary hover:text-dark fw-bold d-inline-flex align-items-center gap-1.5 text-decoration-none" style="font-size: 12px; background: #ffffff;" title="Buka Halaman Analisis Komparatif /portal/peta">
                        <i class="bi bi-box-arrow-up-right text-success"></i>
                        <span>Lihat /portal/peta</span>
                    </a>

                    <!-- Sinkron ke /portal/peta Button -->
                    <button type="button" onclick="syncPodesToPortalManual()" id="btnSyncPortalPeta" class="btn btn-sm btn-white border rounded-pill px-3 py-1.5 shadow-2xs text-dark fw-bold hover:bg-light d-inline-flex align-items-center gap-1.5" style="font-size: 12px; background: #ffffff;" title="Sinkronkan data PODES dengan analitik /portal/peta">
                        <i class="bi bi-arrow-repeat text-success"></i>
                        <span>Sinkron /portal/peta</span>
                    </button>

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
                            <span class="badge text-white mb-2 px-3 py-1 text-uppercase fw-bold" style="background: rgba(255, 255, 255, 0.18); border: 1px solid rgba(255, 255, 255, 0.25); font-size: 10px; letter-spacing: 0.5px;">
                                Selamat Datang di Dashboard Admin
                            </span>
                            <h2 class="fw-black mb-1.5">
                                Halo, <span style="color: #6ee7b7;">{{ $admin->name }}</span>
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
                            <h3 class="fw-black mb-1"><span id="overviewTotalDesa">{{ $stats['total_desa'] }}</span> <span class="fs-6 fw-semibold text-muted">Desa</span></h3>
                            <small class="text-muted"><strong class="text-primary"><span id="overviewTotalKecamatan">{{ $stats['total_kecamatan'] }}</span> Kecamatan</strong> di Kab. Kolaka Utara</small>
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
                            <h3 class="fw-black mb-1 text-success"><span id="overviewMandiriCount">{{ $stats['mandiri_count'] }}</span> <span class="fs-6 fw-semibold text-muted">Desa</span></h3>
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
                            <h3 class="fw-black mb-1 text-warning"><span id="overviewMajuCount">{{ $stats['maju_count'] }}</span> <span class="fs-6 fw-semibold text-muted">Desa</span></h3>
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
                            <h3 class="fw-black mb-1 text-info"><span id="overviewBerkembangCount">{{ $stats['berkembang_count'] }}</span> <span class="fs-6 fw-semibold text-muted">Desa</span></h3>
                            <small class="text-muted">Sasaran akselerasi pembangunan</small>
                        </div>
                    </div>
                </div>

                @php
                    $operatorAccountCount = $users->where('role', 'operator_desa')->count();
                    $totalDesaCountSafe = max(1, count($flatDesaList));
                    $operatorCoveragePct = min(100, round(($operatorAccountCount / $totalDesaCountSafe) * 100));
                @endphp

                <!-- BARIS DIAGRAM 1: PERINGKAT 15 KECAMATAN (8) + KOMPOSISI STATUS KEMANDIRIAN (4) -->
                <div class="row g-3 mb-4">
                    <!-- Kiri (8): Diagram Batang 15 Kecamatan Multi-Metrik -->
                    <div class="col-xl-8">
                        <div class="bento-card p-3.5 p-md-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2 pb-3 mb-3 border-bottom">
                                    <div>
                                        <h6 class="fw-bold mb-0.5 text-dark">Perbandingan Kinerja Antar Kecamatan</h6>
                                        <small class="text-muted" id="overviewKecChartSubtitle">Peringkat Skor IPD pada 15 Kecamatan (batas status Mandiri &ge; 70)</small>
                                    </div>
                                    <div class="kec-view-capsule flex-shrink-0" role="group" aria-label="Pilih Metrik Kecamatan">
                                        <button type="button" id="ovKecMetric-ipd" onclick="setOverviewKecMetric('ipd')" class="btn btn-view-tab active">Skor IPD</button>
                                        <button type="button" id="ovKecMetric-penduduk" onclick="setOverviewKecMetric('penduduk')" class="btn btn-view-tab">Penduduk</button>
                                        <button type="button" id="ovKecMetric-imk" onclick="setOverviewKecMetric('imk')" class="btn btn-view-tab">Unit IMK</button>
                                        <button type="button" id="ovKecMetric-bumdes" onclick="setOverviewKecMetric('bumdes')" class="btn btn-view-tab">BUMDes</button>
                                    </div>
                                </div>
                                <div class="overview-chart-wrap" style="height: 270px;">
                                    <canvas id="chartOverviewKecamatan"></canvas>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pt-3 mt-2 border-top" id="overviewKecLegendBar">
                                <div class="d-flex flex-wrap align-items-center gap-3 small" style="font-size: 11.5px;">
                                    <span class="d-inline-flex align-items-center gap-1.5 text-secondary fw-semibold">
                                        <span class="desa-status-dot" style="width: 8px; height: 8px; background-color: #10b981;"></span>
                                        Mandiri (&ge; 70)
                                    </span>
                                    <span class="d-inline-flex align-items-center gap-1.5 text-secondary fw-semibold">
                                        <span class="desa-status-dot" style="width: 8px; height: 8px; background-color: #f59e0b;"></span>
                                        Maju (50–69.9)
                                    </span>
                                    <span class="d-inline-flex align-items-center gap-1.5 text-secondary fw-semibold">
                                        <span class="desa-status-dot" style="width: 8px; height: 8px; background-color: #0ea5e9;"></span>
                                        Berkembang (&lt; 50)
                                    </span>
                                </div>
                                <small class="text-muted font-mono-num" style="font-size: 11px;">Sumber: Master Wilayah PODES 2025</small>
                            </div>
                        </div>
                    </div>

                    <!-- Kanan (4): Diagram Donat Proporsi Status Kemandirian -->
                    <div class="col-xl-4">
                        <div class="bento-card p-3.5 p-md-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between gap-2 pb-3 mb-3 border-bottom">
                                    <div>
                                        <h6 class="fw-bold mb-0.5 text-dark">Status Kemandirian</h6>
                                        <small class="text-muted">Proporsi {{ $stats['total_desa'] }} Desa/Kelurahan</small>
                                    </div>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill font-mono-num" style="font-size: 11px;" id="overviewDoughnutTotalBadge">{{ $stats['total_desa'] }} Desa</span>
                                </div>

                                <div class="overview-doughnut-wrap my-2">
                                    <canvas id="chartOverviewStatusDoughnut"></canvas>
                                    <div class="position-absolute top-50 start-50 translate-middle text-center" style="pointer-events: none;">
                                        <div class="text-uppercase text-muted fw-bold" style="font-size: 9.5px; letter-spacing: 0.5px;">Rata-rata IPD</div>
                                        <div class="fw-black text-dark font-mono-num" style="font-size: 24px; line-height: 1.15;" id="overviewAvgIpdValue">70.0</div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-column gap-2 pt-3 border-top">
                                <div class="d-flex align-items-center justify-content-between px-2.5 py-1.5 rounded-3 bg-light border">
                                    <span class="d-inline-flex align-items-center gap-2 small fw-semibold text-dark" style="font-size: 12px;">
                                        <span class="desa-status-dot" style="width: 8px; height: 8px; background-color: #10b981;"></span>
                                        Desa Mandiri
                                    </span>
                                    <span class="font-mono-num fw-bold text-success" style="font-size: 12px;" id="overviewDoughnutMandiri">{{ $stats['mandiri_count'] }} Desa</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between px-2.5 py-1.5 rounded-3 bg-light border">
                                    <span class="d-inline-flex align-items-center gap-2 small fw-semibold text-dark" style="font-size: 12px;">
                                        <span class="desa-status-dot" style="width: 8px; height: 8px; background-color: #f59e0b;"></span>
                                        Desa Maju
                                    </span>
                                    <span class="font-mono-num fw-bold text-warning" style="font-size: 12px;" id="overviewDoughnutMaju">{{ $stats['maju_count'] }} Desa</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between px-2.5 py-1.5 rounded-3 bg-light border">
                                    <span class="d-inline-flex align-items-center gap-2 small fw-semibold text-dark" style="font-size: 12px;">
                                        <span class="desa-status-dot" style="width: 8px; height: 8px; background-color: #0ea5e9;"></span>
                                        Desa Berkembang
                                    </span>
                                    <span class="font-mono-num fw-bold text-info" style="font-size: 12px;" id="overviewDoughnutBerkembang">{{ $stats['berkembang_count'] }} Desa</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BARIS DIAGRAM 2: DEMOGRAFI PENDUDUK (6) + KOMODITAS & INFRASTRUKTUR (6) -->
                <div class="row g-3 mb-4">
                    <!-- Kiri (6): Stacked Bar Demografi Penduduk L/P -->
                    <div class="col-lg-6">
                        <div class="bento-card p-3.5 p-md-4 h-100">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pb-3 mb-3 border-bottom">
                                <div>
                                    <h6 class="fw-bold mb-0.5 text-dark">Demografi Penduduk per Kecamatan</h6>
                                    <small class="text-muted">Komposisi penduduk laki-laki vs perempuan (PODES 2025)</small>
                                </div>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 font-mono-num" style="font-size: 11px;" id="overviewTotalPendudukBadge">0 Jiwa</span>
                            </div>
                            <div class="overview-chart-wrap" style="height: 255px;">
                                <canvas id="chartOverviewDemografi"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Kanan (6): Horizontal Bar Top Komoditas / Infrastruktur -->
                    <div class="col-lg-6">
                        <div class="bento-card p-3.5 p-md-4 h-100">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pb-3 mb-3 border-bottom">
                                <div>
                                    <h6 class="fw-bold mb-0.5 text-dark" id="overviewSektorChartTitle">Top Komoditas Unggulan Desa</h6>
                                    <small class="text-muted" id="overviewSektorChartSubtitle">Sebaran sektor komoditas di {{ $stats['total_desa'] }} Desa Kolaka Utara</small>
                                </div>
                                <div class="kec-view-capsule flex-shrink-0" role="group" aria-label="Pilih Analitik Sektor">
                                    <button type="button" id="ovSektorMode-komoditas" onclick="setOverviewSektorMode('komoditas')" class="btn btn-view-tab active">Komoditas</button>
                                    <button type="button" id="ovSektorMode-infrastruktur" onclick="setOverviewSektorMode('infrastruktur')" class="btn btn-view-tab">Infrastruktur</button>
                                </div>
                            </div>
                            <div class="overview-chart-wrap" style="height: 255px;">
                                <canvas id="chartOverviewSektor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BARIS 3: MONITORING PRIORITAS DESA & OPERATOR (7) + WORKSPACE PODES & AKSES CEPAT (5) -->
                <div class="row g-3">
                    <!-- Kiri (7): Panel Prioritas Akselerasi & Top Mandiri -->
                    <div class="col-xl-7">
                        <div class="bento-card overflow-hidden h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="p-3.5 p-md-4 pb-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="fw-bold mb-0.5 text-dark">Monitoring Prioritas Kemandirian Desa</h6>
                                        <small class="text-muted" id="overviewPrioritySubtitle">Desa sasaran akselerasi &amp; pendampingan IPD</small>
                                    </div>
                                    <div class="kec-view-capsule flex-shrink-0" role="group" aria-label="Mode Daftar Prioritas">
                                        <button type="button" id="ovPriorityTab-prioritas" onclick="setOverviewPriorityMode('prioritas')" class="btn btn-view-tab active">Prioritas (&lt; 70)</button>
                                        <button type="button" id="ovPriorityTab-top" onclick="setOverviewPriorityMode('top')" class="btn btn-view-tab">Top Mandiri</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover table-modern align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th class="px-3">DESA &amp; KECAMATAN</th>
                                                <th>STATUS</th>
                                                <th class="text-end">SKOR IPD</th>
                                                <th>KOMODITAS</th>
                                                <th class="text-center px-3">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody class="small" id="overviewPriorityTbody">
                                            <!-- Populated by JS -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="px-3.5 px-md-4 py-3 bg-light border-top d-flex flex-wrap align-items-center justify-content-between gap-3">
                                <div class="flex-grow-1" style="min-width: 220px;">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <span class="fw-bold text-dark" style="font-size: 11.5px;">
                                            <i class="bi bi-people-fill text-success me-1"></i>Kesiapan Akun Operator Desa
                                        </span>
                                        <span class="font-mono-num fw-bold text-success" style="font-size: 11.5px;">{{ $operatorAccountCount }} / {{ count($flatDesaList) }} Desa ({{ $operatorCoveragePct }}%)</span>
                                    </div>
                                    <div class="w-100 rounded-pill overflow-hidden" style="height: 6px; background-color: #e2e8f0;">
                                        <div class="h-100 rounded-pill bg-success" style="width: {{ $operatorCoveragePct }}%;"></div>
                                    </div>
                                </div>
                                @if($admin->isAdmin())
                                    <button type="button" onclick="switchAdminTab('users')" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-bold flex-shrink-0" style="font-size: 11.5px;">
                                        Kelola Operator
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Kanan (5): Workspace PODES Ringkas + Kartu Akses Cepat -->
                    <div class="col-xl-5 d-flex flex-column gap-3">
                        <div class="overview-podes-card p-4 shadow-2xs">
                            <div class="d-flex align-items-start justify-content-between gap-3 mb-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 46px; height: 46px; background: rgba(255, 255, 255, 0.16); border: 1px solid rgba(255, 255, 255, 0.24);">
                                        <i class="bi bi-file-earmark-spreadsheet fs-4 text-white"></i>
                                    </div>
                                    <div>
                                        <span class="badge text-white mb-1 px-2 py-0.5 fw-bold" style="background: rgba(255, 255, 255, 0.18); font-size: 10px;">12 MODUL &bull; 63+ TABEL</span>
                                        <h6 class="fw-bold mb-0 text-white">Workspace Input PODES 2025</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="small mb-3" style="color: rgba(255, 255, 255, 0.78); font-size: 12px; line-height: 1.55;">
                                Seluruh tabel survei potensi desa telah dikelompokkan per klaster dan per desa agar pengisian &amp; validasi lebih cepat.
                            </p>
                            <button type="button" onclick="switchAdminTab('podes')" class="btn btn-light rounded-pill px-3.5 py-2 fw-bold text-success d-inline-flex align-items-center gap-2 w-100 justify-content-center shadow-2xs" style="font-size: 12.5px;">
                                <span>Buka Workspace PODES</span>
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>

                        <div class="bento-card p-3.5 p-md-4 flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 13.5px;">Pintasan Pengelolaan Data</h6>
                                <span class="text-muted font-mono-num" style="font-size: 10.5px;">Navigasi Cepat</span>
                            </div>
                            <div class="row g-2.5">
                                <div class="col-6">
                                    <button type="button" onclick="switchAdminTab('desa')" class="overview-shortcut-tile">
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="rounded-2 bg-success-subtle text-success p-1.5 d-inline-flex"><i class="bi bi-buildings"></i></span>
                                            <span class="fw-bold text-dark" style="font-size: 12px;">Master Desa</span>
                                        </div>
                                        <div class="text-muted text-truncate" style="font-size: 11px;">{{ count($flatDesaList) }} profil &amp; IPD desa</div>
                                    </button>
                                </div>
                                @if(!$admin->isOperatorDesa())
                                    <div class="col-6">
                                        <button type="button" onclick="switchAdminTab('kecamatan')" class="overview-shortcut-tile">
                                            <div class="d-flex align-items-center gap-2 mb-1">
                                                <span class="rounded-2 bg-primary-subtle text-primary p-1.5 d-inline-flex"><i class="bi bi-map"></i></span>
                                                <span class="fw-bold text-dark" style="font-size: 12px;">Kecamatan</span>
                                            </div>
                                            <div class="text-muted text-truncate" style="font-size: 11px;">{{ count($kecamatanList) }} wilayah &amp; galeri</div>
                                        </button>
                                    </div>
                                @endif
                                <div class="col-6">
                                    <button type="button" onclick="switchAdminTab('spatial')" class="overview-shortcut-tile">
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="rounded-2 bg-warning-subtle text-warning p-1.5 d-inline-flex"><i class="bi bi-geo-alt"></i></span>
                                            <span class="fw-bold text-dark" style="font-size: 12px;">Peta Spasial</span>
                                        </div>
                                        <div class="text-muted text-truncate" style="font-size: 11px;">Koordinat GIS wilayah</div>
                                    </button>
                                </div>
                                @if($admin->isAdmin())
                                    <div class="col-6">
                                        <button type="button" onclick="switchAdminTab('users')" class="overview-shortcut-tile">
                                            <div class="d-flex align-items-center gap-2 mb-1">
                                                <span class="rounded-2 bg-info-subtle text-info p-1.5 d-inline-flex"><i class="bi bi-people"></i></span>
                                                <span class="fw-bold text-dark" style="font-size: 12px;">Kelola Akun</span>
                                            </div>
                                            <div class="text-muted text-truncate" style="font-size: 11px;">{{ $users->count() }} akun terdaftar</div>
                                        </button>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <a href="/portal/agregat" target="_blank" class="overview-shortcut-tile d-flex align-items-center justify-content-between text-decoration-none">
                                        <div class="d-flex align-items-center gap-2.5">
                                            <span class="rounded-2 bg-dark text-white p-1.5 d-inline-flex"><i class="bi bi-globe2 text-emerald-300"></i></span>
                                            <div>
                                                <div class="fw-bold text-dark" style="font-size: 12px;">Pratinjau Portal Agregat Publik</div>
                                                <div class="text-muted" style="font-size: 11px;">Lihat tampilan live pada <code>/portal/agregat</code></div>
                                            </div>
                                        </div>
                                        <i class="bi bi-box-arrow-up-right text-success"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- =================================================================
                 TAB 2: WORKSPACE INPUT & VALIDASI PODES (12 KLASTER - MODERN MOCKUP)
                 ================================================================= -->
            <div id="tabContentPodes" style="display: none;">

                <!-- Status Integrasi /portal/peta Banner -->
                <div class="bento-card p-3 px-md-4 py-md-3 mb-3 bg-white border border-emerald-200 shadow-2xs">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2.5">
                        <div class="d-flex align-items-center gap-2.5">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 text-success flex-shrink-0" style="width: 34px; height: 34px;">
                                <i class="bi bi-link-45deg fs-5"></i>
                            </span>
                            <div>
                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <span class="fw-bold text-dark" style="font-size: 13px;">Terintegrasi dengan Analisis Wilayah /portal/peta</span>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-0.5 fw-bold" style="font-size: 10.5px;">
                                        <i class="bi bi-broadcast me-1"></i>Live Sync Aktif
                                    </span>
                                </div>
                                <small class="text-muted d-block" style="font-size: 11.5px;">
                                    Data tabel yang disimpan di sini langsung terhubung &amp; memperbarui grafik komparatif IMK, listrik, pendidikan, kesehatan, dan ranking desa pada halaman publik.
                                </small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 flex-shrink-0">
                            <a href="/portal/peta" target="_blank" class="btn btn-sm btn-light border rounded-pill px-3 py-1.5 fw-semibold text-secondary hover:text-dark d-inline-flex align-items-center gap-1.5 text-decoration-none" style="font-size: 12px;">
                                <i class="bi bi-box-arrow-up-right text-success"></i>
                                <span>Buka /portal/peta</span>
                            </a>
                            <button type="button" onclick="syncPodesToPortalManual()" class="btn btn-sm btn-emerald rounded-pill px-3 py-1.5 fw-bold d-inline-flex align-items-center gap-1.5" style="font-size: 12px;">
                                <i class="bi bi-arrow-repeat"></i>
                                <span>Sinkronkan Ulang</span>
                            </button>
                        </div>
                    </div>
                </div>

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
            @php
                $desaMandiriCount = collect($flatDesaList)->where('status', 'Mandiri')->count();
                $desaMajuCount = collect($flatDesaList)->where('status', 'Maju')->count();
                $desaBerkembangCount = collect($flatDesaList)->where('status', 'Berkembang')->count();
            @endphp
            <div id="tabContentDesa" style="display: none;">
                <!-- Header & Filter Card (Modern, Rapi & Elegan) -->
                <div class="bento-card p-3 p-md-4 mb-3">
                    <!-- Baris 1: Judul, Badge Jumlah & Tombol Aksi Utama -->
                    <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3 pb-3 mb-3 border-bottom">
                        <div class="min-w-0">
                            <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                                <h5 class="fw-bold mb-0 text-dark">Master Data Potensi Desa</h5>
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fw-bold" style="font-size: 11px;">
                                    <span id="masterDesaCountBadge">{{ count($flatDesaList) }}</span> Desa &amp; Kelurahan
                                </span>
                                <span class="badge bg-light text-secondary border rounded-pill px-2.5 py-1 fw-semibold" style="font-size: 11px;">
                                    {{ count($kecamatanList) }} Kecamatan
                                </span>
                            </div>
                            <small class="text-muted d-block" id="desaTableCountText">
                                Menampilkan seluruh <strong>{{ count($flatDesaList) }}</strong> Desa dan Kelurahan di <span id="masterKecCountSubtitle">{{ count($kecamatanList) }}</span> Kecamatan
                            </small>
                        </div>

                        <div class="d-flex flex-wrap align-items-center gap-2 flex-shrink-0">
                            @if(!$admin->isOperatorDesa())
                                <button type="button" onclick="switchAdminTab('kecamatan')" class="btn btn-sm btn-light border rounded-pill px-3 d-inline-flex align-items-center gap-1.5 text-secondary fw-semibold text-nowrap shadow-2xs" style="height: 38px; font-size: 12px;">
                                    <i class="bi bi-map-fill text-success"></i>
                                    <span>Master Kecamatan (<span id="subTabKecCount">{{ count($kecamatanList) }}</span>)</span>
                                </button>
                                <button type="button" onclick="openNewDesaModal()" class="btn btn-sm btn-emerald rounded-pill px-3.5 d-inline-flex align-items-center gap-1.5 fw-bold text-nowrap shadow-2xs" style="height: 38px; font-size: 12.5px;">
                                    <i class="bi bi-plus-circle-fill"></i>
                                    <span>Input Desa Baru</span>
                                </button>
                            @endif
                        </div>
                    </div>

                    <!-- Baris 2: Pencarian, Filter Kecamatan, Quick Status Filter & View Switcher -->
                    <div class="d-flex flex-column flex-xl-row align-items-stretch align-items-xl-center justify-content-between gap-3">
                        <div class="d-flex flex-wrap align-items-center gap-2 flex-grow-1">
                            <!-- Search Pill -->
                            <div class="search-pill-box d-flex align-items-center px-3 gap-2 flex-grow-1" style="min-width: 220px; max-width: 300px; height: 38px;">
                                <i class="bi bi-search text-muted flex-shrink-0" style="font-size: 13px;"></i>
                                <input type="text" id="inputSearchDesa" onkeyup="filterDesaTable()" placeholder="Cari desa, kecamatan, komoditas..." class="form-control form-control-sm border-0 bg-transparent shadow-none p-0 text-dark" style="font-size: 12.5px;">
                            </div>

                            <!-- Select Kecamatan Pill -->
                            <select id="selectFilterKecamatan" onchange="filterDesaTable()" class="form-select form-select-sm select-pill-box" style="width: auto; min-width: 180px; max-width: 220px; height: 38px;">
                                <option value="">Semua Kecamatan ({{ count($kecamatanList) }})</option>
                                @foreach($kecamatanList as $k)
                                    <option value="{{ $k['nama'] }}">{{ $k['nama'] }}</option>
                                @endforeach
                            </select>

                            <!-- Quick Status Filter Capsule (Synced with #selectFilterStatus) -->
                            <select id="selectFilterStatus" onchange="filterDesaTable()" class="d-none" aria-hidden="true">
                                <option value="">Semua Status</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="Maju">Maju</option>
                                <option value="Berkembang">Berkembang</option>
                            </select>
                            <div class="kec-view-capsule" role="group" aria-label="Filter Status Kemandirian" style="height: 38px;">
                                <button type="button" id="btnDesaStatusAll" onclick="setDesaStatusFilter('')" class="btn desa-status-chip active">
                                    <span>Semua</span>
                                    <span class="badge bg-white text-dark rounded-pill ms-1 font-sans" style="font-size: 10px;">{{ count($flatDesaList) }}</span>
                                </button>
                                <button type="button" id="btnDesaStatusMandiri" onclick="setDesaStatusFilter('Mandiri')" class="btn desa-status-chip">
                                    <span class="desa-status-dot" style="background-color: #10b981;"></span>
                                    <span>Mandiri</span>
                                    <span class="opacity-90 font-sans" style="font-size: 11px;">{{ $desaMandiriCount }}</span>
                                </button>
                                <button type="button" id="btnDesaStatusMaju" onclick="setDesaStatusFilter('Maju')" class="btn desa-status-chip">
                                    <span class="desa-status-dot" style="background-color: #f59e0b;"></span>
                                    <span>Maju</span>
                                    <span class="opacity-90 font-sans" style="font-size: 11px;">{{ $desaMajuCount }}</span>
                                </button>
                                <button type="button" id="btnDesaStatusBerkembang" onclick="setDesaStatusFilter('Berkembang')" class="btn desa-status-chip">
                                    <span class="desa-status-dot" style="background-color: #0ea5e9;"></span>
                                    <span>Berkembang</span>
                                    <span class="opacity-90 font-sans" style="font-size: 11px;">{{ $desaBerkembangCount }}</span>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between justify-content-xl-end gap-2 flex-shrink-0">
                            <span class="text-muted small fw-semibold d-none d-xxl-inline" style="font-size: 11.5px;">Tampilan:</span>
                            <div class="kec-view-capsule" role="group" aria-label="Mode Tampilan Desa" style="height: 38px;">
                                <button type="button" id="btnDesaViewTable" onclick="setDesaViewMode('table')" class="btn btn-view-tab active">
                                    <i class="bi bi-table"></i>
                                    <span>Tabel</span>
                                </button>
                                <button type="button" id="btnDesaViewCards" onclick="setDesaViewMode('cards')" class="btn btn-view-tab">
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Kartu</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODE 1: TABEL MODERN (DEFAULT) -->
                <div id="desaTableContainer" class="bento-card overflow-hidden shadow-sm">
                    <div class="table-responsive" style="max-height: 720px;">
                        <table class="table table-hover table-modern table-modern-sticky align-middle mb-0" id="tableDesaMaster">
                            <thead>
                                <tr>
                                    <th class="px-3 text-center" style="width: 48px;">#</th>
                                    <th style="min-width: 180px;">DESA / KELURAHAN</th>
                                    <th style="min-width: 140px;">KECAMATAN</th>
                                    <th class="text-center" style="min-width: 110px;">SKOR IPD</th>
                                    <th class="text-center" style="min-width: 125px;">STATUS</th>
                                    <th style="min-width: 250px;">KOMODITAS UTAMA</th>
                                    <th style="min-width: 180px;">FASILITAS KES.</th>
                                    <th class="text-center px-3" style="width: 105px;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($flatDesaList as $idx => $d)
                                    @php
                                        $ipdNum = (float) ($d['ipd'] ?? 70);
                                        $isKel = str_contains(strtolower($d['nama_desa']), 'kelurahan') || strtolower($d['nama_desa']) === 'lasusua';
                                    @endphp
                                    <tr class="desa-row"
                                        data-nama="{{ strtolower($d['nama_desa']) }}"
                                        data-kecamatan="{{ $d['nama_kec'] }}"
                                        data-status="{{ $d['status'] }}"
                                        data-komoditas="{{ strtolower($d['komoditas']) }}">
                                        <td class="px-3 text-center text-muted fw-bold" style="font-size: 12px;">{{ $idx + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="fw-bold text-dark" style="font-size: 13.5px;">{{ $d['nama_desa'] }}</span>
                                                @if($isKel)
                                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill" style="font-size: 9.5px; padding: 2px 7px;">Kelurahan</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-secondary fw-medium" style="font-size: 13px;">{{ $d['nama_kec'] }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="fw-bold text-success" style="font-size: 13.5px; font-variant-numeric: tabular-nums;">
                                                {{ number_format($ipdNum, 1) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @if($d['status'] === 'Mandiri')
                                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fw-bold d-inline-flex align-items-center gap-1" style="font-size: 11px;">
                                                    <i class="bi bi-circle-fill text-success" style="font-size: 6px;"></i>
                                                    <span>Mandiri</span>
                                                </span>
                                            @elseif($d['status'] === 'Maju')
                                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2.5 py-1 fw-bold d-inline-flex align-items-center gap-1" style="font-size: 11px;">
                                                    <i class="bi bi-circle-fill text-warning" style="font-size: 6px;"></i>
                                                    <span>Maju</span>
                                                </span>
                                            @else
                                                <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-2.5 py-1 fw-bold d-inline-flex align-items-center gap-1" style="font-size: 11px;">
                                                    <i class="bi bi-circle-fill text-info" style="font-size: 6px;"></i>
                                                    <span>Berkembang</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td style="max-width: 260px;">
                                            <span class="text-dark fw-medium" style="font-size: 12.5px; line-height: 1.45;">
                                                {{ $d['komoditas'] ?: '-' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-secondary" style="font-size: 12px;">
                                                {{ $d['faskes'] ?: 'Poskesdes / Pustu' }}
                                            </span>
                                        </td>
                                        <td class="text-center px-3">
                                            <button type="button" onclick="editDesaData('{{ addslashes($d['nama_desa']) }}', '{{ addslashes($d['nama_kec']) }}', '{{ $d['ipd'] }}', '{{ $d['status'] }}', '{{ addslashes($d['komoditas']) }}', '{{ addslashes($d['faskes']) }}', '{{ $d['lat'] }}', '{{ $d['lng'] }}')" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1 fw-bold d-inline-flex align-items-center gap-1 shadow-2xs" style="font-size: 11.5px;" title="Edit Profil Desa">
                                                <i class="bi bi-pencil-square"></i>
                                                <span>Edit</span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Summary Bar -->
                    <div class="p-3 bg-light border-top d-flex flex-column flex-sm-row align-items-center justify-content-between gap-2" style="font-size: 12px;">
                        <div class="text-muted" id="desaFooterSummary">
                            Menampilkan <strong>{{ count($flatDesaList) }}</strong> Desa &amp; Kelurahan di Kabupaten Kolaka Utara
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1">{{ $desaMandiriCount }} Mandiri</span>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2.5 py-1">{{ $desaMajuCount }} Maju</span>
                            <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-2.5 py-1">{{ $desaBerkembangCount }} Berkembang</span>
                        </div>
                    </div>
                </div>

                <!-- MODE 2: GRID KARTU DESA -->
                <div id="desaGridContainer" class="row g-3" style="display: none;">
                    @foreach($flatDesaList as $idx => $d)
                        @php
                            $desaBadgeClass = $d['status'] === 'Mandiri'
                                ? 'bg-success-subtle text-success border-success-subtle'
                                : ($d['status'] === 'Maju' ? 'bg-warning-subtle text-warning border-warning-subtle' : 'bg-info-subtle text-info border-info-subtle');
                            $desaBarColor = $d['status'] === 'Mandiri'
                                ? '#10b981'
                                : ($d['status'] === 'Maju' ? '#f59e0b' : '#0ea5e9');
                            $desaBarWidth = min(100, max(5, (float) $d['ipd']));
                        @endphp
                        <div class="col-12 col-sm-6 col-xl-4 col-xxl-3 desa-card-col"
                             data-nama="{{ strtolower($d['nama_desa']) }}"
                             data-kecamatan="{{ $d['nama_kec'] }}"
                             data-status="{{ $d['status'] }}"
                             data-komoditas="{{ strtolower($d['komoditas']) }}">
                            <div class="bento-card p-3 h-100 d-flex flex-column justify-content-between gap-2.5 bg-white">
                                <div>
                                    <div class="d-flex align-items-start justify-content-between gap-2 mb-2.5">
                                        <div class="min-w-0">
                                            <div class="d-flex align-items-center gap-1.5 mb-0.5">
                                                <span class="badge bg-light text-secondary border rounded-pill font-mono-num" style="font-size: 10px;">#{{ $idx + 1 }}</span>
                                                <span class="text-muted text-truncate" style="font-size: 11px;">Kec. {{ $d['nama_kec'] }}</span>
                                            </div>
                                            <h6 class="fw-bold text-dark mb-0 text-truncate">{{ $d['nama_desa'] }}</h6>
                                        </div>
                                        <span class="badge {{ $desaBadgeClass }} border rounded-pill px-2.5 py-1 fw-semibold flex-shrink-0" style="font-size: 10.5px;">{{ $d['status'] }}</span>
                                    </div>

                                    <div class="bg-light border rounded-3 p-2.5 mb-2.5">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="text-muted text-uppercase fw-bold" style="font-size: 9.5px; letter-spacing: 0.4px;">Skor IPD</span>
                                            <span class="fw-bold font-mono-num text-success" style="font-size: 13px;">{{ number_format($d['ipd'], 1) }}</span>
                                        </div>
                                        <div class="w-100 rounded-pill overflow-hidden" style="height: 5px; background-color: #e2e8f0;">
                                            <div class="h-100 rounded-pill desa-ipd-bar" style="width: {{ $desaBarWidth }}%; background-color: {{ $desaBarColor }};"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center gap-1.5 mb-1">
                                        <i class="bi bi-flower2 text-success flex-shrink-0" style="font-size: 12px;"></i>
                                        <span class="fw-semibold text-dark text-truncate desa-card-komoditas" style="font-size: 11.5px;">{{ $d['komoditas'] }}</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-1.5 text-muted">
                                        <i class="bi bi-hospital flex-shrink-0" style="font-size: 11.5px;"></i>
                                        <span class="text-truncate desa-card-faskes" style="font-size: 11px;">{{ $d['faskes'] }}</span>
                                    </div>
                                </div>

                                <button type="button" onclick="editDesaData('{{ addslashes($d['nama_desa']) }}', '{{ addslashes($d['nama_kec']) }}', '{{ $d['ipd'] }}', '{{ $d['status'] }}', '{{ addslashes($d['komoditas']) }}', '{{ addslashes($d['faskes']) }}', '{{ $d['lat'] }}', '{{ $d['lng'] }}')" class="btn btn-sm btn-outline-success w-100 rounded-pill fw-bold py-1.5 d-flex align-items-center justify-content-center gap-1.5" style="font-size: 11.5px;">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>Edit Profil Desa</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- =================================================================
                 TAB 3B: MASTER KECAMATAN (OPSI A: GRID KARTU VISUAL + EDITOR 2 KOLOM)
                 ================================================================= -->
            <div id="tabContentKecamatan" style="display: none;">
                <!-- VIEW 1: DIREKTORI KARTU & TABEL KECAMATAN -->
                <div id="kecDirectoryView">
                    <div class="bento-card p-3 p-md-4 mb-3">
                        <!-- Baris 1: Judul, Badge Wilayah & Tombol Aksi Utama -->
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 pb-3 mb-3 border-bottom">
                            <div class="min-w-0">
                                <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                                    <h5 class="fw-bold mb-0 text-dark">Master Kecamatan &amp; Konten Portal Agregat</h5>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 font-mono-num" style="font-size: 11px;">
                                        <span id="kecHeaderCount">{{ count($kecamatanList) }}</span> Wilayah
                                    </span>
                                </div>
                                <small class="text-muted d-block" id="kecTableCountText">Menampilkan seluruh <strong>{{ count($kecamatanList) }}</strong> Kecamatan beserta foto kartu, populasi, komoditas, dan metrik <code>/portal/agregat</code></small>
                            </div>

                            <div class="d-flex flex-wrap align-items-center gap-2 flex-shrink-0">
                                @if(!$admin->isOperatorDesa())
                                    <button type="button" onclick="switchAdminTab('aggregate')" class="btn btn-sm btn-outline-success rounded-pill px-3 d-inline-flex align-items-center gap-1.5 fw-bold text-nowrap" style="height: 36px; font-size: 12px;">
                                        <i class="bi bi-sliders2-vertical"></i>
                                        <span>Edit Ringkasan Kab.</span>
                                    </button>
                                @endif
                                <a href="/portal/agregat" target="_blank" class="btn btn-sm btn-light border rounded-pill px-3 d-inline-flex align-items-center gap-1.5 text-secondary fw-semibold text-nowrap" style="height: 36px; font-size: 12px;">
                                    <i class="bi bi-box-arrow-up-right text-success"></i>
                                    <span>Lihat Portal</span>
                                </a>

                                @if(!$admin->isOperatorDesa())
                                    <button type="button" onclick="openNewKecamatanModal()" class="btn btn-sm btn-emerald rounded-pill px-3.5 d-inline-flex align-items-center gap-1.5 fw-bold text-nowrap" style="height: 36px; font-size: 12px;">
                                        <i class="bi bi-plus-circle-fill"></i>
                                        <span>Tambah Kecamatan</span>
                                    </button>
                                @endif
                            </div>
                        </div>

                        <!-- Baris 2: Pencarian Pill & Switcher Mode Tampilan -->
                        <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center justify-content-between gap-2.5">
                            <div class="search-pill-box d-flex align-items-center px-3 gap-2" style="width: 100%; max-width: 320px;">
                                <i class="bi bi-search text-muted flex-shrink-0" style="font-size: 13px;"></i>
                                <input type="text" id="inputSearchKecamatan" onkeyup="filterKecamatanTable()" placeholder="Cari kecamatan atau komoditas..." class="form-control form-control-sm border-0 bg-transparent shadow-none p-0 text-dark" style="font-size: 12.5px;">
                            </div>

                            <div class="d-flex align-items-center justify-content-between justify-content-sm-end gap-2 flex-shrink-0">
                                <span class="text-muted small fw-semibold d-none d-md-inline" style="font-size: 11.5px;">Tampilan:</span>
                                <div class="kec-view-capsule" role="group" aria-label="Mode Tampilan Kecamatan">
                                    <button type="button" id="btnKecViewCards" onclick="setKecamatanViewMode('cards')" class="btn btn-view-tab active">
                                        <i class="bi bi-grid-fill"></i>
                                        <span>Kartu</span>
                                    </button>
                                    <button type="button" id="btnKecViewTable" onclick="setKecamatanViewMode('table')" class="btn btn-view-tab">
                                        <i class="bi bi-table"></i>
                                        <span>Tabel</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- GRID KARTU VISUAL (DEFAULT) -->
                    <div id="kecGridContainer" class="row g-3">
                        @foreach($kecamatanList as $idx => $k)
                            @php
                                $kecDesaCount = $k['desa_count'] ?? count($k['desaList'] ?? $k['desa_list'] ?? []);
                                $kecStatus = $k['status_ipd'] ?? 'Maju';
                                $kecFoto = $k['foto'] ?? '/images/jadesta/kebun_kakao_totallang.jpg';
                                $kecPopTotal = (int) ($k['penduduk_total'] ?? 0);
                                $statusBadge = $kecStatus === 'Mandiri'
                                    ? 'bg-success text-white'
                                    : ($kecStatus === 'Maju' ? 'bg-warning text-dark' : 'bg-info text-dark');
                            @endphp
                            <div class="col-12 col-sm-6 col-xl-4 col-xxl-3 kec-card-col"
                                 data-index="{{ $idx + 1 }}"
                                 data-nama="{{ strtolower($k['nama'] ?? '') }}"
                                 data-kode="{{ strtolower($k['kode'] ?? '') }}"
                                 data-komoditas="{{ strtolower(($k['komoditas_dominan'] ?? '') . ' ' . ($k['komoditas'] ?? '') . ' ' . ($k['produk_unggulan'] ?? '')) }}"
                                 data-kec-json='@json($k)'>
                                <div class="bento-card overflow-hidden h-100 d-flex flex-column">
                                    <!-- Card Photo Header -->
                                    <div class="position-relative" style="height: 158px; background: #0f172a;">
                                        <img src="{{ $kecFoto }}"
                                             alt="Foto {{ $k['nama'] ?? '' }}"
                                             class="w-100 h-100 object-fit-cover"
                                             onerror="this.src='/images/jadesta/kebun_kakao_totallang.jpg'">
                                        <div class="position-absolute inset-0 w-100 h-100 top-0 start-0" style="background: linear-gradient(to top, rgba(15, 23, 42, 0.90) 0%, rgba(15, 23, 42, 0.20) 55%, rgba(15, 23, 42, 0.40) 100%);"></div>

                                        <!-- Top Badges -->
                                        <div class="position-absolute top-0 start-0 end-0 p-2.5 d-flex align-items-center justify-content-between">
                                            <span class="badge bg-dark bg-opacity-75 text-white border border-white border-opacity-25 rounded-pill font-mono-num" style="font-size: 10px;">
                                                {{ $k['kode'] ?? '-' }}
                                            </span>
                                            <span class="badge {{ $statusBadge }} rounded-pill fw-bold" style="font-size: 10px;">
                                                {{ $kecStatus }}
                                            </span>
                                        </div>

                                        <!-- Bottom Title Over Image -->
                                        <div class="position-absolute bottom-0 start-0 end-0 p-3">
                                            <div class="d-flex align-items-end justify-content-between gap-2">
                                                <div class="min-w-0">
                                                    <h6 class="fw-bold text-white mb-0 text-truncate">{{ $k['nama'] ?? '-' }}</h6>
                                                    <div class="text-white-50 text-truncate" style="font-size: 11px;">{{ $k['tag'] ?? '-' }}</div>
                                                </div>
                                                <span class="badge text-white font-mono-num flex-shrink-0" style="background: rgba(15, 23, 42, 0.68); border: 1px solid rgba(255, 255, 255, 0.28); font-size: 10px;">
                                                    IPD {{ number_format((float) ($k['ipd'] ?? 70), 1) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="p-3 d-flex flex-column flex-grow-1 justify-content-between gap-2.5 bg-white">
                                        <div>
                                            <div class="row g-1.5 text-center bg-light rounded-3 p-2 mb-2.5 border">
                                                <div class="col-4 border-end">
                                                    <div class="text-muted text-uppercase" style="font-size: 9px; letter-spacing: 0.4px;">Penduduk</div>
                                                    <div class="fw-bold text-dark font-mono-num" style="font-size: 12px;">{{ number_format($kecPopTotal, 0, ',', '.') }} <span class="fw-normal text-muted" style="font-size: 10px;">Jiwa</span></div>
                                                </div>
                                                <div class="col-4 border-end">
                                                    <div class="text-muted text-uppercase" style="font-size: 9px; letter-spacing: 0.4px;">Desa</div>
                                                    <div class="fw-bold text-dark font-mono-num" style="font-size: 12px;">{{ $kecDesaCount }}</div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="text-muted text-uppercase" style="font-size: 9px; letter-spacing: 0.4px;">IMK</div>
                                                    <div class="fw-bold text-success font-mono-num" style="font-size: 12px;">{{ number_format((int) ($k['imk'] ?? 0), 0, ',', '.') }}</div>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center gap-1.5 mb-1">
                                                <i class="bi bi-flower2 text-success flex-shrink-0" style="font-size: 12px;"></i>
                                                <span class="fw-semibold text-dark text-truncate" style="font-size: 11.5px;">{{ $k['komoditas_dominan'] ?? ($k['komoditas'] ?? '-') }}</span>
                                            </div>
                                            <div class="text-muted font-mono-num text-truncate" style="font-size: 10.5px;">
                                                BUMDes {{ (int) ($k['bumdes'] ?? 0) }} &bull; Sekolah {{ (int) ($k['total_sekolah'] ?? 0) }} &bull; PLN {{ number_format((int) ($k['pln_kk'] ?? 0), 0, ',', '.') }} KK
                                            </div>
                                        </div>

                                        @if(!$admin->isOperatorDesa())
                                            <button type="button" onclick="editKecamatanFromRow(this)" class="btn btn-sm btn-outline-success w-100 rounded-pill fw-bold py-1.5 d-flex align-items-center justify-content-center gap-1.5" style="font-size: 11.5px;">
                                                <i class="bi bi-pencil-square"></i>
                                                <span>Edit Konten &amp; Foto</span>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- TABEL RINGKAS 5 KOLOM (OPSIONAL) -->
                    <div id="kecTableContainer" class="bento-card p-3" style="display: none;">
                        <div class="table-responsive border rounded-3">
                            <table class="table table-hover align-middle table-sm mb-0" id="tableKecamatanMaster">
                                <thead class="table-light small fw-bold text-uppercase" style="font-size: 11px;">
                                    <tr>
                                        <th class="py-2.5 px-3">#</th>
                                        <th class="py-2.5">FOTO &amp; KECAMATAN</th>
                                        <th class="py-2.5">PENDUDUK &amp; DESA</th>
                                        <th class="py-2.5">KOMODITAS DOMINAN</th>
                                        <th class="py-2.5">IPD &amp; STATUS</th>
                                        @if(!$admin->isOperatorDesa())
                                            <th class="py-2.5 text-center">AKSI</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="small" id="tbodyKecamatanMaster">
                                    @foreach($kecamatanList as $idx => $k)
                                        @php
                                            $kecDesaCount = $k['desa_count'] ?? count($k['desaList'] ?? $k['desa_list'] ?? []);
                                            $kecStatus = $k['status_ipd'] ?? 'Maju';
                                            $kecFoto = $k['foto'] ?? '/images/jadesta/kebun_kakao_totallang.jpg';
                                            $kecPopTotal = (int) ($k['penduduk_total'] ?? 0);
                                        @endphp
                                        <tr class="kec-master-row"
                                            data-index="{{ $idx + 1 }}"
                                            data-nama="{{ strtolower($k['nama'] ?? '') }}"
                                            data-kode="{{ strtolower($k['kode'] ?? '') }}"
                                            data-komoditas="{{ strtolower(($k['komoditas_dominan'] ?? '') . ' ' . ($k['komoditas'] ?? '') . ' ' . ($k['produk_unggulan'] ?? '')) }}"
                                            data-kec-json='@json($k)'>
                                            <td class="px-3 text-muted font-mono-num">{{ $idx + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2.5 py-1">
                                                    <img src="{{ $kecFoto }}" alt="Foto {{ $k['nama'] ?? '' }}" class="rounded-2 border object-fit-cover flex-shrink-0" style="width: 40px; height: 48px;" onerror="this.src='/images/jadesta/kebun_kakao_totallang.jpg'">
                                                    <div>
                                                        <div class="fw-bold text-dark">{{ $k['nama'] ?? '-' }}</div>
                                                        <div class="font-mono-num text-muted" style="font-size: 10.5px;">{{ $k['kode'] ?? '-' }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold font-mono-num text-dark">{{ number_format($kecPopTotal, 0, ',', '.') }} Jiwa</div>
                                                <div class="text-muted" style="font-size: 11px;">{{ $kecDesaCount }} Desa/Kelurahan</div>
                                            </td>
                                            <td style="max-width: 240px;">
                                                <div class="fw-semibold text-dark text-truncate">{{ $k['komoditas_dominan'] ?? ($k['komoditas'] ?? '-') }}</div>
                                                <div class="text-muted text-truncate" style="font-size: 10.5px;">{{ $k['tag'] ?? '-' }}</div>
                                            </td>
                                            <td>
                                                <span class="fw-bold font-mono-num text-success me-1">{{ number_format((float) ($k['ipd'] ?? 70), 1) }}</span>
                                                @if($kecStatus === 'Mandiri')
                                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Mandiri</span>
                                                @elseif($kecStatus === 'Maju')
                                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill">Maju</span>
                                                @else
                                                    <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill">Berkembang</span>
                                                @endif
                                            </td>
                                            @if(!$admin->isOperatorDesa())
                                                <td class="text-center">
                                                    <button type="button" onclick="editKecamatanFromRow(this)" class="btn btn-sm btn-emerald px-2.5 py-1 rounded-pill" style="font-size: 11.5px;">
                                                        <i class="bi bi-pencil-square me-1"></i>Edit
                                                    </button>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- VIEW 2: EDITOR SPLIT-SCREEN 2 KOLOM (TANPA POPUP SCROLL PANJANG) -->
                <div id="kecEditorView" style="display: none;">
                    <!-- Top Breadcrumb / Back Action -->
                    <div class="bento-card px-4 py-3 mb-3 d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div class="d-flex align-items-center gap-3">
                            <button type="button" onclick="closeKecamatanEditor()" class="btn btn-sm btn-light border rounded-pill px-3 py-1.5 fw-semibold text-secondary d-flex align-items-center gap-1.5">
                                <i class="bi bi-arrow-left"></i>
                                <span>Kembali ke Daftar</span>
                            </button>
                            <div>
                                <h6 class="fw-bold mb-0" id="modalEditKecamatanTitle">Edit Kecamatan</h6>
                                <small class="text-muted" style="font-size: 11px;">Perubahan langsung terhubung ke kartu &amp; detail di <code>/portal/agregat</code></small>
                            </div>
                        </div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 11px;">
                            <i class="bi bi-broadcast me-1"></i>Sinkron Real-Time
                        </span>
                    </div>

                    <form id="formKecamatanEditor" onsubmit="saveKecamatanModalData(event)" enctype="multipart/form-data">
                        <input type="hidden" id="editKecOriginalNama" value="">
                        <div class="row g-3 align-items-stretch">
                            <!-- KOLOM KIRI: LIVE PREVIEW KARTU PORTAL + GANTI FOTO MODERN -->
                            <div class="col-lg-4">
                                <div class="bento-card p-4 h-100 d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="text-uppercase fw-bold text-muted" style="font-size: 10.5px; letter-spacing: 0.7px;">Live Preview Kartu</span>
                                            <span class="badge bg-light text-secondary border font-mono-num" style="font-size: 10px;">/portal/agregat</span>
                                        </div>

                                        <!-- Miniatur Kartu Vertikal Persis Portal Agregat -->
                                        <div class="mx-auto position-relative shadow-sm border" style="width: 220px; height: 320px; border-radius: 22px; overflow: hidden; background: #111827;">
                                            <img id="editKecFotoPreview" src="/images/jadesta/kebun_kakao_totallang.jpg" alt="Preview Kartu Kecamatan" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" onerror="this.src='/images/jadesta/kebun_kakao_totallang.jpg'">
                                            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to top, rgba(0,0,0,0.88) 0%, rgba(0,0,0,0.22) 50%, rgba(0,0,0,0.38) 100%);"></div>

                                            <div class="position-relative h-100 p-3.5 d-flex flex-column justify-content-between" style="z-index: 2;">
                                                <div class="d-flex align-items-start justify-content-between">
                                                    <div id="editKecPreviewVerticalTitle" class="d-flex align-items-start gap-2 text-white font-cinzel fw-bold" style="font-size: 17px; letter-spacing: 0.14em; line-height: 1.15; text-shadow: 0 2px 6px rgba(0,0,0,0.6);">
                                                        <!-- Stacked vertical letters populated by JS -->
                                                    </div>
                                                    <span id="editKecPreviewIndex" class="font-mono-num text-white-50 fw-bold" style="font-size: 12px;">01</span>
                                                </div>

                                                <div class="border-top border-white border-opacity-25 pt-2">
                                                    <div id="editKecPreviewPop" class="text-white fw-bold text-uppercase font-sans" style="font-size: 11px; letter-spacing: 1px;">0 PENDUDUK</div>
                                                    <div id="editKecPreviewTag" class="text-white-50 text-truncate mt-0.5" style="font-size: 10px;">Potensi Wilayah</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Kontrol Foto Clean -->
                                    <div class="mt-3 pt-3 border-top">
                                        <input type="file" id="editKecFotoFile" accept="image/jpeg,image/png,image/webp" onchange="previewKecamatanPhoto(this)" class="d-none">
                                        <label for="editKecFotoFile" class="btn btn-sm btn-outline-success w-100 rounded-pill fw-bold py-2 d-flex align-items-center justify-content-center gap-2 mb-2" style="cursor: pointer;">
                                            <i class="bi bi-cloud-arrow-up-fill"></i>
                                            <span>Upload Foto Baru</span>
                                        </label>
                                        <div class="text-center text-muted font-mono-num mb-2 text-truncate" style="font-size: 10.5px;" id="editKecPreviewLabel">Belum ada foto dipilih</div>

                                        <div class="mb-2">
                                            <select id="editKecFotoGallery" onchange="selectKecamatanGalleryPhoto(this.value)" class="form-select form-select-sm rounded-pill">
                                                <option value="">Atau pilih foto galeri bawaan...</option>
                                                @foreach(($kecamatanGallery ?? []) as $imgPath)
                                                    <option value="{{ $imgPath }}">{{ basename($imgPath) }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="text-center">
                                            <a href="javascript:void(0)" onclick="toggleManualFotoPath()" class="text-decoration-none text-muted" style="font-size: 11px;">
                                                <i class="bi bi-link-45deg"></i> Atur path gambar manual
                                            </a>
                                        </div>
                                        <div id="kecManualFotoPathWrap" class="mt-2" style="display: none;">
                                            <input type="text" id="editKecFoto" oninput="updateKecFotoPreviewPath(this.value)" class="form-control form-control-sm font-mono-num" placeholder="/images/kecamatan/katoi.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- KOLOM KANAN: FORM 3 TAB RINGKAS (TANPA SCROLL PANJANG) -->
                            <div class="col-lg-8">
                                <div class="bento-card p-4 h-100 d-flex flex-column justify-content-between">
                                    <div>
                                        <!-- 3 Tab Pill Navigation -->
                                        <div class="d-flex flex-wrap gap-2 pb-3 mb-4 border-bottom" id="kecEditorTabs">
                                            <button type="button" id="kecEdTabBtn-identitas" onclick="switchKecEditorTab('identitas')" class="btn btn-sm btn-emerald rounded-pill px-3 py-1.5 fw-bold d-flex align-items-center gap-1.5" style="font-size: 12px;">
                                                <i class="bi bi-geo-alt-fill"></i>
                                                <span>1. Identitas &amp; Peta</span>
                                            </button>
                                            <button type="button" id="kecEdTabBtn-komoditas" onclick="switchKecEditorTab('komoditas')" class="btn btn-sm btn-light border text-secondary rounded-pill px-3 py-1.5 fw-bold d-flex align-items-center gap-1.5" style="font-size: 12px;">
                                                <i class="bi bi-award-fill"></i>
                                                <span>2. Komoditas &amp; Unggulan</span>
                                            </button>
                                            <button type="button" id="kecEdTabBtn-populasi" onclick="switchKecEditorTab('populasi')" class="btn btn-sm btn-light border text-secondary rounded-pill px-3 py-1.5 fw-bold d-flex align-items-center gap-1.5" style="font-size: 12px;">
                                                <i class="bi bi-people-fill"></i>
                                                <span>3. Populasi &amp; Sektor</span>
                                            </button>
                                        </div>

                                        <!-- TAB 1: IDENTITAS & PETA -->
                                        <div id="kecEditorTabIdentitas" class="kec-editor-pane small">
                                            <div class="row g-3 mb-3">
                                                <div class="col-md-8">
                                                    <label class="form-label fw-bold">Nama Kecamatan <span class="text-danger">*</span></label>
                                                    <input type="text" id="editKecNama" oninput="updateKecLiveCardPreview()" class="form-control fw-bold" placeholder="Contoh: Katoi atau Lasusua">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label fw-bold">Kode Wilayah</label>
                                                    <input type="text" id="editKecKode" class="form-control font-mono-num" placeholder="Otomatis (74.08.XX)">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Tagline / Karakteristik Singkat</label>
                                                <input type="text" id="editKecTag" oninput="updateKecLiveCardPreview()" class="form-control" placeholder="Contoh: Pesisir & Agribisnis Cengkeh">
                                            </div>

                                            <div class="row g-3 mb-3">
                                                <div class="col-sm-4">
                                                    <label class="form-label fw-bold">Skor IPD <span class="text-muted fw-normal">(0–100)</span></label>
                                                    <input type="number" step="0.1" min="0" max="100" id="editKecIpd" class="form-control font-mono-num fw-bold" placeholder="72.5">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label fw-bold">Status Kemandirian</label>
                                                    <select id="editKecStatusIpd" class="form-select fw-bold">
                                                        <option value="Mandiri">Mandiri (IPD &ge; 70)</option>
                                                        <option value="Maju">Maju (50 &le; IPD &lt; 70)</option>
                                                        <option value="Berkembang">Berkembang (IPD &lt; 50)</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label fw-bold">Jumlah Desa / Kel.</label>
                                                    <input type="number" min="0" id="editKecDesaCount" class="form-control font-mono-num fw-bold" placeholder="6">
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-sm-6">
                                                    <label class="form-label fw-bold">Latitude <span class="text-muted fw-normal font-mono-num">(Lintang WebGIS)</span></label>
                                                    <input type="number" step="any" id="editKecLat" class="form-control font-mono-num" placeholder="-3.5291">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label fw-bold">Longitude <span class="text-muted fw-normal font-mono-num">(Bujur WebGIS)</span></label>
                                                    <input type="number" step="any" id="editKecLng" class="form-control font-mono-num" placeholder="120.9855">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- TAB 2: KOMODITAS & UNGGULAN -->
                                        <div id="kecEditorTabKomoditas" class="kec-editor-pane small" style="display: none;">
                                            <div class="row g-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Komoditas Utama Dominan <span class="text-muted fw-normal">(Panel Kiri)</span></label>
                                                    <input type="text" id="editKecKomoditasDominan" class="form-control fw-bold" placeholder="Contoh: Kakao atau Cengkeh">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Daftar Komoditas Wilayah</label>
                                                    <input type="text" id="editKecKomoditas" class="form-control" placeholder="Contoh: Kakao, Cengkeh, Kelapa">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Potensi Utama / Deskripsi Wilayah</label>
                                                <textarea id="editKecPotensi" rows="2" class="form-control" placeholder="Deskripsi potensi agribisnis & sektor unggulan kecamatan..."></textarea>
                                            </div>

                                            <div class="row g-3 mb-3">
                                                <div class="col-md-8">
                                                    <label class="form-label fw-bold">Produk Unggulan Terdata <span class="text-muted fw-normal">(pisahkan dengan koma)</span></label>
                                                    <input type="text" id="editKecProdukUnggulan" oninput="renderKecProdukChipPreview()" class="form-control" placeholder="Contoh: SALAK, GULA AREN, MINYAK NILAM">
                                                    <div id="editKecProdukChipPreview" class="d-flex flex-wrap gap-1.5 mt-2"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label fw-bold">Jml Desa Produk Khas</label>
                                                    <input type="number" min="0" id="editKecProdukDesaCount" class="form-control font-mono-num fw-bold" placeholder="0">
                                                </div>
                                            </div>

                                            <div>
                                                <label class="form-label fw-bold">Wisata / ODTW Unggulan</label>
                                                <input type="text" id="editKecOdtw" class="form-control" placeholder="Contoh: Pantai Berova, Danau Biru Walasiho">
                                            </div>
                                        </div>

                                        <!-- TAB 3: POPULASI & INDIKATOR PORTAL -->
                                        <div id="kecEditorTabPopulasi" class="kec-editor-pane small" style="display: none;">
                                            <div class="p-3 rounded-3 bg-light border mb-3">
                                                <div class="fw-bold text-dark mb-2" style="font-size: 11.5px;">
                                                    <i class="bi bi-people-fill text-success me-1"></i>Data Penduduk (Tampil di Kartu &amp; Sektor Kependudukan)
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-sm-4">
                                                        <label class="form-label fw-semibold mb-1">Penduduk Laki-laki (L)</label>
                                                        <input type="number" min="0" id="editKecPendudukL" oninput="recalcKecPendudukTotal()" class="form-control font-mono-num" placeholder="0">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label fw-semibold mb-1">Penduduk Perempuan (P)</label>
                                                        <input type="number" min="0" id="editKecPendudukP" oninput="recalcKecPendudukTotal()" class="form-control font-mono-num" placeholder="0">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label fw-bold mb-1 text-success">Total Penduduk (Card)</label>
                                                        <input type="number" min="0" id="editKecPendudukTotal" oninput="updateKecLiveCardPreview()" class="form-control font-mono-num fw-bold border-success-subtle" placeholder="0">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="fw-bold text-dark mb-2" style="font-size: 11.5px;">
                                                <i class="bi bi-buildings-fill text-success me-1"></i>Ringkasan Indikator 7 Sektor PODES (/portal/agregat)
                                            </div>
                                            <div class="row g-3 mb-2">
                                                <div class="col-sm-4">
                                                    <label class="form-label fw-semibold mb-1">Unit IMK</label>
                                                    <input type="number" min="0" id="editKecImk" class="form-control font-mono-num fw-bold" placeholder="0">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label fw-semibold mb-1">BUMDes (Unit)</label>
                                                    <input type="number" min="0" id="editKecBumdes" class="form-control font-mono-num fw-bold" placeholder="0">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label fw-semibold mb-1">Listrik PLN (KK)</label>
                                                    <input type="number" min="0" id="editKecPlnKk" class="form-control font-mono-num fw-bold" placeholder="0">
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-sm-6">
                                                    <label class="form-label fw-semibold mb-1">Total Sarana Sekolah</label>
                                                    <input type="number" min="0" id="editKecSekolah" class="form-control font-mono-num" placeholder="0">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label fw-semibold mb-1">Total Fasilitas Kesehatan (Faskes)</label>
                                                    <input type="number" min="0" id="editKecFaskes" class="form-control font-mono-num" placeholder="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- STICKY FORM FOOTER -->
                                    <div class="pt-3 mt-4 border-top d-flex flex-wrap align-items-center justify-content-between gap-2">
                                        <small class="text-muted">Pastikan data sudah sesuai sebelum menyimpan ke basis data.</small>
                                        <div class="d-flex align-items-center gap-2">
                                            <button type="button" onclick="closeKecamatanEditor()" class="btn btn-sm btn-light border rounded-pill px-3.5 py-1.5 fw-semibold">Batal</button>
                                            <button type="submit" id="btnSaveKecamatanModal" class="btn btn-sm btn-emerald rounded-pill px-4 py-1.5 fw-bold">
                                                <i class="bi bi-check2-circle me-1"></i>Simpan Kecamatan &amp; Foto
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- =================================================================
                 TAB 3C: RINGKASAN AGREGAT PORTAL KABUPATEN KOLAKA UTARA
                 ================================================================= -->
            @if(!$admin->isOperatorDesa())
                @php
                    $aggAct = $portalAggregate['active'] ?? [];
                    $aggDef = $portalAggregate['defaults'] ?? [];
                    $aggIsCustom = !empty($portalAggregate['is_custom']);
                @endphp
                <div id="tabContentAggregate" style="display: none;">
                    <!-- Header Bento Card -->
                    <div class="bento-card p-3 p-md-4 mb-3">
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                            <div class="min-w-0">
                                <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                                    <h5 class="fw-bold mb-0 text-dark">Ringkasan Agregat Kabupaten Kolaka Utara</h5>
                                    <span id="aggModeStatusBadge" class="badge {{ $aggIsCustom ? 'bg-warning-subtle text-warning border border-warning-subtle' : 'bg-success-subtle text-success border border-success-subtle' }} rounded-pill px-2.5 py-1 fw-bold" style="font-size: 11px;">
                                        {{ $aggIsCustom ? 'Mode Edit Manual Aktif' : 'Mode Hitung Otomatis' }}
                                    </span>
                                </div>
                                <small class="text-muted d-block">
                                    Edit langsung 4 kartu statistik pada <code>/portal/agregat</code> serta KPI Beranda <code>/portal</code> &amp; Tentang Madani.
                                </small>
                            </div>
                            <div class="d-flex flex-wrap align-items-center gap-2 flex-shrink-0">
                                <a href="/portal/agregat" target="_blank" class="btn btn-sm btn-light border rounded-pill px-3 d-inline-flex align-items-center gap-1.5 text-secondary fw-semibold text-nowrap" style="height: 36px; font-size: 12px;">
                                    <i class="bi bi-box-arrow-up-right text-success"></i>
                                    <span>Lihat /portal/agregat</span>
                                </a>
                                <button type="button" onclick="savePortalAggregateData(null, 'reset')" id="btnResetPortalAggregate" class="btn btn-sm btn-light border rounded-pill px-3 d-inline-flex align-items-center gap-1.5 text-danger fw-semibold text-nowrap" style="height: 36px; font-size: 12px;">
                                    <i class="bi bi-arrow-counterclockwise"></i>
                                    <span>Reset ke Otomatis</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Live Preview Identik dengan Tampilan /portal/agregat -->
                    <div class="bento-card p-3 p-md-4 mb-3 bg-light">
                        <div class="d-flex align-items-center justify-content-between mb-2.5">
                            <div class="d-flex align-items-center gap-2">
                                <span class="desa-status-dot" style="width: 8px; height: 8px; background-color: #3B4D3B;"></span>
                                <span class="fw-bold text-uppercase text-dark" style="font-size: 11.5px; letter-spacing: 0.05em;" id="aggPreviewJudul">{{ $aggAct['judul_ringkasan'] ?? 'Ringkasan Agregat Kabupaten Kolaka Utara' }}</span>
                            </div>
                            <span class="text-muted fw-semibold font-mono-num" style="font-size: 11px;" id="aggPreviewSumber">{{ $aggAct['label_sumber'] ?? 'BPS PODES 2025' }}</span>
                        </div>

                        <div class="bg-white rounded-4 border shadow-2xs overflow-hidden">
                            <div class="row g-0">
                                <div class="col-12 col-sm-6 col-xl-3 p-3.5 border-end border-bottom border-xl-bottom-0">
                                    <div class="font-mono-num text-muted mb-1" style="font-size: 11px;">01</div>
                                    <div class="fw-bold text-uppercase text-dark mb-2" style="font-size: 12.5px; letter-spacing: 0.04em;">Total Penduduk Riil</div>
                                    <div class="fw-black font-mono-num" style="font-size: 28px; color: #3B4D3B; line-height: 1.1;" id="aggPreviewTotalPenduduk">{{ number_format((int) ($aggAct['total_penduduk'] ?? 0), 0, ',', '.') }}</div>
                                    <div class="text-muted mt-1.5 font-mono-num" style="font-size: 11.5px;" id="aggPreviewLP">L: {{ number_format((int) ($aggAct['total_penduduk_l'] ?? 0), 0, ',', '.') }} &bull; P: {{ number_format((int) ($aggAct['total_penduduk_p'] ?? 0), 0, ',', '.') }}</div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 p-3.5 border-end border-bottom border-xl-bottom-0">
                                    <div class="font-mono-num text-muted mb-1" style="font-size: 11px;">02</div>
                                    <div class="fw-bold text-uppercase text-dark mb-2" style="font-size: 12.5px; letter-spacing: 0.04em;">Rata-Rata Kepadatan</div>
                                    <div class="fw-black font-mono-num text-dark" style="font-size: 28px; line-height: 1.1;">
                                        <span id="aggPreviewKepadatan">{{ number_format((float) ($aggAct['kepadatan_rata'] ?? 0), 1) }}</span>
                                        <span class="fw-semibold text-muted" style="font-size: 11.5px;">Jiwa/km&sup2;</span>
                                    </div>
                                    <div class="text-muted mt-1.5" style="font-size: 11.5px;" id="aggPreviewCakupan">Cakupan {{ (int) ($aggAct['total_kecamatan'] ?? 15) }} Kecamatan / {{ (int) ($aggAct['total_desa'] ?? 133) }} Desa</div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 p-3.5 border-end border-bottom border-sm-bottom-0">
                                    <div class="font-mono-num text-muted mb-1" style="font-size: 11px;">03</div>
                                    <div class="fw-bold text-uppercase text-dark mb-2" style="font-size: 12.5px; letter-spacing: 0.04em;">Rasio Jenis Kelamin</div>
                                    <div class="fw-black font-mono-num" style="font-size: 28px; color: #566B53; line-height: 1.1;" id="aggPreviewSexRatio">{{ number_format((float) ($aggAct['rasio_jenis_kelamin'] ?? 100), 1) }}</div>
                                    <div class="text-muted mt-1.5" style="font-size: 11.5px;">Laki-laki per 100 Perempuan</div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 p-3.5">
                                    <div class="font-mono-num text-muted mb-1" style="font-size: 11px;">04</div>
                                    <div class="fw-bold text-uppercase text-dark mb-2" style="font-size: 12.5px; letter-spacing: 0.04em;">Sentra &amp; IMK Produktif</div>
                                    <div class="fw-black font-mono-num" style="font-size: 28px; color: #3B4D3B; line-height: 1.1;" id="aggPreviewImk">{{ number_format((int) ($aggAct['total_imk'] ?? 0), 0, ',', '.') }}</div>
                                    <div class="text-muted mt-1.5 font-mono-num" style="font-size: 11.5px;" id="aggPreviewPln">Listrik PLN: {{ number_format((float) ($aggAct['rasio_listrik'] ?? 0), 2) }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Editor 4 Kartu -->
                    <form id="formPortalAggregate" onsubmit="savePortalAggregateData(event, 'save')">
                        <div class="row g-3 mb-3">
                            <!-- Kartu 01: Total Penduduk Riil -->
                            <div class="col-lg-6">
                                <div class="bento-card p-4 h-100 small">
                                    <div class="d-flex align-items-center justify-content-between pb-2.5 mb-3 border-bottom">
                                        <span class="fw-bold text-dark"><span class="badge bg-success-subtle text-success rounded-pill me-1.5 font-mono-num">01</span>Total Penduduk Riil</span>
                                        <button type="button" onclick="calcAggregateTotalPenduduk()" class="btn btn-sm btn-light border rounded-pill px-2.5 py-0.5 fw-semibold text-success" style="font-size: 11px;">
                                            Hitung L + P
                                        </button>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-4">
                                            <label class="form-label fw-semibold">Penduduk Laki-laki (L)</label>
                                            <input type="number" min="0" id="aggInputPendudukL" oninput="onAggregateLPInput()" class="form-control font-mono-num fw-bold rounded-3" value="{{ (int) ($aggAct['total_penduduk_l'] ?? 0) }}" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label fw-semibold">Penduduk Perempuan (P)</label>
                                            <input type="number" min="0" id="aggInputPendudukP" oninput="onAggregateLPInput()" class="form-control font-mono-num fw-bold rounded-3" value="{{ (int) ($aggAct['total_penduduk_p'] ?? 0) }}" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label fw-bold text-success">Total Penduduk</label>
                                            <input type="number" min="0" id="aggInputPendudukTotal" oninput="updatePortalAggregatePreview()" class="form-control font-mono-num fw-bold border-success-subtle rounded-3" value="{{ (int) ($aggAct['total_penduduk'] ?? 0) }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kartu 02: Rata-rata Kepadatan & Cakupan -->
                            <div class="col-lg-6">
                                <div class="bento-card p-4 h-100 small">
                                    <div class="d-flex align-items-center justify-content-between pb-2.5 mb-3 border-bottom">
                                        <span class="fw-bold text-dark"><span class="badge bg-success-subtle text-success rounded-pill me-1.5 font-mono-num">02</span>Rata-Rata Kepadatan &amp; Cakupan Wilayah</span>
                                        <span class="text-muted font-mono-num" style="font-size: 10.5px;">Jiwa/km&sup2;</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-4">
                                            <label class="form-label fw-bold text-success">Rata Kepadatan</label>
                                            <input type="number" step="0.1" min="0" id="aggInputKepadatan" oninput="updatePortalAggregatePreview()" class="form-control font-mono-num fw-bold rounded-3" value="{{ number_format((float) ($aggAct['kepadatan_rata'] ?? 241.8), 1, '.', '') }}" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label fw-semibold">Jml Kecamatan</label>
                                            <input type="number" min="0" id="aggInputTotalKecamatan" oninput="updatePortalAggregatePreview()" class="form-control font-mono-num fw-bold rounded-3" value="{{ (int) ($aggAct['total_kecamatan'] ?? 15) }}" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label fw-semibold">Jml Desa / Kel.</label>
                                            <input type="number" min="0" id="aggInputTotalDesa" oninput="updatePortalAggregatePreview()" class="form-control font-mono-num fw-bold rounded-3" value="{{ (int) ($aggAct['total_desa'] ?? 133) }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kartu 03: Rasio Jenis Kelamin -->
                            <div class="col-lg-6">
                                <div class="bento-card p-4 h-100 small">
                                    <div class="d-flex align-items-center justify-content-between pb-2.5 mb-3 border-bottom">
                                        <span class="fw-bold text-dark"><span class="badge bg-success-subtle text-success rounded-pill me-1.5 font-mono-num">03</span>Rasio Jenis Kelamin &amp; Metadata Header</span>
                                        <button type="button" onclick="calcAggregateSexRatio()" class="btn btn-sm btn-light border rounded-pill px-2.5 py-0.5 fw-semibold text-success" style="font-size: 11px;">
                                            Hitung dari L / P
                                        </button>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-4">
                                            <label class="form-label fw-bold text-success">Rasio L / 100 P</label>
                                            <input type="number" step="0.1" min="0" id="aggInputSexRatio" oninput="updatePortalAggregatePreview()" class="form-control font-mono-num fw-bold rounded-3" value="{{ number_format((float) ($aggAct['rasio_jenis_kelamin'] ?? 104.9), 1, '.', '') }}" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label fw-semibold">Judul Seksi Portal</label>
                                            <input type="text" id="aggInputJudul" oninput="updatePortalAggregatePreview()" class="form-control rounded-3" value="{{ $aggAct['judul_ringkasan'] ?? 'Ringkasan Agregat Kabupaten Kolaka Utara' }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label fw-semibold">Label Sumber Kanan</label>
                                            <input type="text" id="aggInputSumber" oninput="updatePortalAggregatePreview()" class="form-control rounded-3" value="{{ $aggAct['label_sumber'] ?? 'BPS PODES 2025' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kartu 04: Sentra IMK & Kelistrikan PLN -->
                            <div class="col-lg-6">
                                <div class="bento-card p-4 h-100 small">
                                    <div class="d-flex align-items-center justify-content-between pb-2.5 mb-3 border-bottom">
                                        <span class="fw-bold text-dark"><span class="badge bg-success-subtle text-success rounded-pill me-1.5 font-mono-num">04</span>Sentra IMK &amp; Rasio Kelistrikan PLN</span>
                                        <span class="text-muted font-mono-num" style="font-size: 10.5px;">Ekonomi &amp; Energi</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-4">
                                            <label class="form-label fw-bold text-success">Sentra &amp; IMK (Unit)</label>
                                            <input type="number" min="0" id="aggInputImk" oninput="updatePortalAggregatePreview()" class="form-control font-mono-num fw-bold rounded-3" value="{{ (int) ($aggAct['total_imk'] ?? 0) }}" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label fw-bold">Listrik PLN (%)</label>
                                            <input type="number" step="0.01" min="0" max="100" id="aggInputRasioListrik" oninput="updatePortalAggregatePreview()" class="form-control font-mono-num fw-bold rounded-3" value="{{ number_format((float) ($aggAct['rasio_listrik'] ?? 91.50), 2, '.', '') }}" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label fw-semibold">Berlistrik PLN (KK)</label>
                                            <input type="number" min="0" id="aggInputPlnKk" oninput="updatePortalAggregatePreview()" class="form-control font-mono-num fw-bold rounded-3" value="{{ (int) ($aggAct['total_pln_kk'] ?? 0) }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Aksi -->
                        <div class="bento-card p-3 p-md-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                            <div>
                                <div class="small fw-semibold text-dark" id="aggLastUpdatedInfo">
                                    @if($aggIsCustom && !empty($portalAggregate['updated_at']))
                                        Diubah manual pada <strong>{{ $portalAggregate['updated_at'] }}</strong> oleh {{ $portalAggregate['updated_by'] ?? 'Administrator' }}
                                    @else
                                        Nilai saat ini dihitung otomatis dari akumulasi Master Kecamatan &amp; data PODES 2025.
                                    @endif
                                </div>
                                <small class="text-muted" style="font-size: 11px;">Klik <strong>Reset ke Otomatis</strong> kapan saja jika ingin angka kembali mengikuti penjumlahan Master Kecamatan.</small>
                            </div>
                            <div class="d-flex flex-wrap align-items-center gap-2 flex-shrink-0">
                                <button type="button" onclick="fillAggregateFromDefaults()" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1.5 fw-bold">
                                    <i class="bi bi-calculator me-1"></i>Isi Hitungan Otomatis
                                </button>
                                <button type="submit" id="btnSavePortalAggregate" class="btn btn-sm btn-emerald rounded-pill px-4 py-1.5 fw-bold">
                                    <i class="bi bi-check2-circle me-1"></i>Simpan &amp; Publikasikan ke Portal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif

            <!-- =================================================================
                 TAB 4: PEMETAAN SPASIAL WEBGIS
                 ================================================================= -->
            <div id="tabContentSpatial" style="display: none;">
                <div class="bento-card p-4">
                    <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 pb-3 mb-4 border-bottom">
                        <div>
                            <h5 class="fw-bold mb-1">Manajemen Koordinat Geospasial WebGIS</h5>
                            <small class="text-muted">Kelola titik koordinat Latitude dan Longitude untuk <span id="spatialKecCountSubtitle">{{ count($kecamatanList) }}</span> Kantor Kecamatan dan {{ count($flatDesaList) }} Desa</small>
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
                                <table class="table table-hover align-middle table-sm mb-0" id="tableSpatialKecamatan">
                                    <thead class="table-light sticky-top small fw-bold text-uppercase" style="font-size: 11px;">
                                        <tr>
                                            <th>WILAYAH KECAMATAN</th>
                                            <th>LATITUDE</th>
                                            <th>LONGITUDE</th>
                                            <th class="text-center">STATUS PETA</th>
                                            @if(!$admin->isOperatorDesa())
                                                <th class="text-center">AKSI</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody class="small" style="font-size: 11px;" id="tbodySpatialKecamatan">
                                        @foreach($kecamatanList as $k)
                                            <tr class="kec-spatial-row" data-nama="{{ strtolower($k['nama'] ?? '') }}" data-kec-json='@json($k)'>
                                                <td class="fw-bold text-dark">{{ $k['nama'] }}</td>
                                                <td class="font-mono-num text-muted">{{ $k['lat'] }}</td>
                                                <td class="font-mono-num text-muted">{{ $k['lng'] }}</td>
                                                <td class="text-center">
                                                    <span class="badge bg-success-subtle text-success rounded-pill">Aktif di Peta</span>
                                                </td>
                                                @if(!$admin->isOperatorDesa())
                                                    <td class="text-center">
                                                        <button type="button" onclick="editKecamatanFromRow(this)" class="btn btn-sm btn-light border text-muted px-2 py-0 rounded-pill" style="font-size: 10.5px;" title="Edit Nama & Koordinat Kecamatan">
                                                            <i class="bi bi-pencil me-1"></i>Edit
                                                        </button>
                                                    </td>
                                                @endif
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                <div class="modal-header border-bottom py-3 px-4 bg-white">
                    <div class="d-flex align-items-center gap-2.5">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-3 bg-success-subtle text-success" style="width: 34px; height: 34px;">
                            <i class="bi bi-houses-fill fs-6"></i>
                        </span>
                        <div>
                            <h6 class="modal-title fw-bold mb-0 text-dark" id="modalEditDesaTitle">Edit Potensi Desa</h6>
                            <small class="text-muted" style="font-size: 11px;">Perbarui skor kemandirian (IPD), komoditas, faskes &amp; koordinat peta desa</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form onsubmit="saveDesaModalData(event)">
                    <div class="modal-body p-4 small">
                        <div class="row g-3 mb-3">
                            <div class="col-md-7">
                                <label class="form-label fw-bold">Nama Desa / Kelurahan <span class="text-danger">*</span></label>
                                <input type="text" id="editModalNamaDesa" class="form-control bg-light fw-bold rounded-3" placeholder="Contoh: Desa Pitulua" required>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-bold">Kecamatan <span class="text-danger">*</span></label>
                                <select id="editModalNamaKec" class="form-select fw-bold rounded-3">
                                    @foreach($kecamatanList as $k)
                                        <option value="{{ $k['nama'] }}">{{ $k['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Skor IPD <span class="text-muted fw-normal font-mono-num">(0–100)</span></label>
                                <input type="number" step="0.1" min="0" max="100" id="editModalIpd" class="form-control font-mono-num fw-bold rounded-3" placeholder="70.0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status Kemandirian</label>
                                <select id="editModalStatus" class="form-select fw-bold rounded-3">
                                    <option value="Mandiri">Mandiri (IPD &ge; 70)</option>
                                    <option value="Maju">Maju (50 &le; IPD &lt; 70)</option>
                                    <option value="Berkembang">Berkembang (IPD &lt; 50)</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Komoditas Utama</label>
                                <input type="text" id="editModalKomoditas" class="form-control rounded-3" placeholder="Contoh: Kakao, Cengkeh, Kelapa">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Fasilitas Kesehatan</label>
                                <input type="text" id="editModalFaskes" class="form-control rounded-3" placeholder="Contoh: Poskesdes / Pustu">
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Latitude <span class="text-muted fw-normal font-mono-num">(Lintang)</span></label>
                                <input type="number" step="any" id="editModalLat" class="form-control font-mono-num rounded-3" placeholder="-3.5291">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Longitude <span class="text-muted fw-normal font-mono-num">(Bujur)</span></label>
                                <input type="number" step="any" id="editModalLng" class="form-control font-mono-num rounded-3" placeholder="120.9855">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top bg-light py-3 px-4 d-flex justify-content-between">
                        <small class="text-muted">Perubahan otomatis tersinkron ke Portal Publik.</small>
                        <div class="d-flex align-items-center gap-2">
                            <button type="button" class="btn btn-sm btn-light border rounded-pill px-3.5 py-1.5 fw-semibold" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" id="btnSaveDesaModal" class="btn btn-sm btn-emerald rounded-pill px-4 py-1.5 fw-bold">
                                <i class="bi bi-check2-circle me-1"></i>Simpan Perubahan
                            </button>
                        </div>
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
        const FLAT_DESA_DATA = @json($flatDesaList);
        const PODES_CATALOG = @json($podesCatalog);
        let PORTAL_AGGREGATE_STATE = @json($portalAggregate);

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
            desa: 'Master Data Desa',
            kecamatan: 'Master Kecamatan (/portal/agregat)',
            aggregate: 'Ringkasan Agregat Portal',
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

            initOverviewDashboard();
            initPodesWorkspace();

            // Auto-sinkronisasi Skor IPD dengan Status Kemandirian (Modal Desa & Kecamatan)
            const bindIpdSync = (inputId, selectId) => {
                const ipdEl = document.getElementById(inputId);
                if (!ipdEl) return;
                ipdEl.addEventListener('input', function() {
                    const score = parseFloat(this.value);
                    const statusSelect = document.getElementById(selectId);
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
            };
            bindIpdSync('editModalIpd', 'editModalStatus');
            bindIpdSync('editKecIpd', 'editKecStatusIpd');

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

        function switchAdminTab(tab, keepKecEditorOpen = false) {
            window.scrollTo({ top: 0, behavior: 'instant' });
            const tabs = ['overview', 'podes', 'desa', 'kecamatan', 'aggregate', 'spatial', 'users'];
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

            if (tab === 'kecamatan' && !keepKecEditorOpen) {
                closeKecamatanEditor();
            }

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
            } else if (tab === 'overview') {
                requestAnimationFrame(() => {
                    Object.values(overviewCharts).forEach(ch => {
                        if (ch && typeof ch.resize === 'function') {
                            ch.resize();
                        }
                    });
                });
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
                            <span id="formSaveStatusText">Tersimpan &amp; Terintegrasi ke /portal/peta · ${timeStr}</span>
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

        // Sinkronisasi manual seluruh data PODES ke /portal/peta
        async function syncPodesToPortalManual() {
            const btn = document.getElementById('btnSyncPortalPeta');
            const originalHtml = btn ? btn.innerHTML : '';
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm text-success" role="status"></span> Menyinkronkan...';
            }

            try {
                const res = await fetch('/admin/podes/sync-portal', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                const data = await res.json();
                if (data.success) {
                    showToast('🚀 ' + (data.message || 'Data PODES berhasil disinkronkan ke /portal/peta!'));
                } else {
                    alert(data.message || 'Gagal menyinkronkan data.');
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan jaringan saat menyinkronkan ke /portal/peta.');
            } finally {
                if (btn) {
                    btn.disabled = false;
                    btn.innerHTML = originalHtml;
                }
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

        function setDesaStatusFilter(statusVal) {
            const selectEl = document.getElementById('selectFilterStatus');
            if (selectEl) {
                selectEl.value = statusVal;
            }
            const btnMap = {
                '': 'btnDesaStatusAll',
                'Mandiri': 'btnDesaStatusMandiri',
                'Maju': 'btnDesaStatusMaju',
                'Berkembang': 'btnDesaStatusBerkembang'
            };
            Object.keys(btnMap).forEach(key => {
                const btn = document.getElementById(btnMap[key]);
                if (btn) {
                    btn.className = (key === statusVal) ? 'btn desa-status-chip active' : 'btn desa-status-chip';
                }
            });
            filterDesaTable();
        }

        function setDesaViewMode(mode) {
            const tableEl = document.getElementById('desaTableContainer');
            const gridEl = document.getElementById('desaGridContainer');
            const btnTable = document.getElementById('btnDesaViewTable');
            const btnCards = document.getElementById('btnDesaViewCards');
            if (!tableEl || !gridEl || !btnTable || !btnCards) return;

            if (mode === 'cards') {
                tableEl.style.display = 'none';
                gridEl.style.display = '';
                btnCards.className = 'btn btn-view-tab active';
                btnTable.className = 'btn btn-view-tab';
            } else {
                gridEl.style.display = 'none';
                tableEl.style.display = '';
                btnTable.className = 'btn btn-view-tab active';
                btnCards.className = 'btn btn-view-tab';
            }
        }

        function filterDesaTable() {
            const searchVal = (document.getElementById('inputSearchDesa')?.value || '').toLowerCase().trim();
            const kecVal = document.getElementById('selectFilterKecamatan')?.value || '';
            const statusVal = document.getElementById('selectFilterStatus')?.value || '';

            const filterCollection = (selector) => {
                let count = 0;
                document.querySelectorAll(selector).forEach(el => {
                    const nama = el.getAttribute('data-nama') || '';
                    const kec = el.getAttribute('data-kecamatan') || '';
                    const st = el.getAttribute('data-status') || '';
                    const komoditas = el.getAttribute('data-komoditas') || '';

                    const matchesSearch = !searchVal || nama.includes(searchVal) || kec.toLowerCase().includes(searchVal) || komoditas.includes(searchVal);
                    const matchesKec = !kecVal || kec === kecVal;
                    const matchesStatus = !statusVal || st === statusVal;

                    if (matchesSearch && matchesKec && matchesStatus) {
                        el.style.display = '';
                        count++;
                    } else {
                        el.style.display = 'none';
                    }
                });
                return count;
            };

            const visibleCount = filterCollection('.desa-row');
            filterCollection('.desa-card-col');

            const countText = document.getElementById('desaTableCountText');
            if (countText) {
                const kecTotal = document.getElementById('masterKecCountSubtitle')?.textContent || '{{ count($kecamatanList) }}';
                countText.innerHTML = `Menampilkan <strong>${visibleCount}</strong> dari <strong>{{ count($flatDesaList) }}</strong> Desa dan Kelurahan di <span id="masterKecCountSubtitle">${kecTotal}</span> Kecamatan`;
            }

            const footerSummary = document.getElementById('desaFooterSummary');
            if (footerSummary) {
                footerSummary.innerHTML = `Menampilkan <strong>${visibleCount}</strong> dari <strong>{{ count($flatDesaList) }}</strong> Desa & Kelurahan di Kabupaten Kolaka Utara`;
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
                        cells[4].innerHTML = `<span class="badge ${badgeClass} border rounded-pill px-2.5 py-1 fw-semibold">${desa.status}</span>`;
                        cells[5].textContent = desa.komoditas || '-';
                        cells[6].textContent = desa.faskes || '-';

                        const safeNama = (desa.nama_desa || '').replace(/'/g, "\\'");
                        const safeKec = (desa.nama_kec || '').replace(/'/g, "\\'");
                        const safeKomoditas = (desa.komoditas || '').replace(/'/g, "\\'");
                        const safeFaskes = (desa.faskes || '').replace(/'/g, "\\'");
                        cells[7].innerHTML = `
                            <button type="button" onclick="editDesaData('${safeNama}', '${safeKec}', '${desa.ipd}', '${desa.status}', '${safeKomoditas}', '${safeFaskes}', '${desa.lat}', '${desa.lng}')" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1" style="font-size: 11.5px;" title="Edit Profil Desa">
                                <i class="bi bi-pencil-square"></i>
                                <span>Edit</span>
                            </button>
                        `;
                    }
                }
            });

            document.querySelectorAll('.desa-card-col').forEach(card => {
                const cNama = (card.getAttribute('data-nama') || '').toLowerCase();
                const cKec = (card.getAttribute('data-kecamatan') || '').toLowerCase();
                if (cNama === targetNama && cKec === targetKec) {
                    card.setAttribute('data-status', desa.status);
                    card.setAttribute('data-komoditas', (desa.komoditas || '').toLowerCase());
                    const komEl = card.querySelector('.desa-card-komoditas');
                    if (komEl) komEl.textContent = desa.komoditas || '-';
                    const faskesEl = card.querySelector('.desa-card-faskes');
                    if (faskesEl) faskesEl.textContent = desa.faskes || '-';
                    const barEl = card.querySelector('.desa-ipd-bar');
                    if (barEl) {
                        barEl.style.width = `${Math.min(100, Math.max(5, Number(desa.ipd || 70)))}%`;
                        barEl.style.backgroundColor = desa.status === 'Mandiri' ? '#10b981' : (desa.status === 'Maju' ? '#f59e0b' : '#0ea5e9');
                    }
                    const btn = card.querySelector('button[onclick^="editDesaData"]');
                    if (btn) {
                        const safeNama = (desa.nama_desa || '').replace(/'/g, "\\'");
                        const safeKec = (desa.nama_kec || '').replace(/'/g, "\\'");
                        const safeKomoditas = (desa.komoditas || '').replace(/'/g, "\\'");
                        const safeFaskes = (desa.faskes || '').replace(/'/g, "\\'");
                        btn.setAttribute('onclick', `editDesaData('${safeNama}', '${safeKec}', '${desa.ipd}', '${desa.status}', '${safeKomoditas}', '${safeFaskes}', '${desa.lat}', '${desa.lng}')`);
                    }
                }
            });

            if (found && Array.isArray(FLAT_DESA_DATA)) {
                const idx = FLAT_DESA_DATA.findIndex(item =>
                    (item.nama_desa || '').toLowerCase() === targetNama &&
                    (item.nama_kec || '').toLowerCase() === targetKec
                );
                if (idx >= 0) {
                    FLAT_DESA_DATA[idx] = {
                        ...FLAT_DESA_DATA[idx],
                        ipd: Number(desa.ipd || FLAT_DESA_DATA[idx].ipd),
                        status: desa.status || FLAT_DESA_DATA[idx].status,
                        komoditas: desa.komoditas || FLAT_DESA_DATA[idx].komoditas,
                        faskes: desa.faskes || FLAT_DESA_DATA[idx].faskes,
                        lat: desa.lat ?? FLAT_DESA_DATA[idx].lat,
                        lng: desa.lng ?? FLAT_DESA_DATA[idx].lng,
                    };
                    refreshOverviewDashboard();
                }
            }

            if (!found) {
                // Desa baru ditambahkan: muat ulang halaman setelah notifikasi agar agregat & statistik ter-update
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }
        }

        function setKecamatanViewMode(mode) {
            const gridEl = document.getElementById('kecGridContainer');
            const tableEl = document.getElementById('kecTableContainer');
            const btnCards = document.getElementById('btnKecViewCards');
            const btnTable = document.getElementById('btnKecViewTable');
            if (!gridEl || !tableEl || !btnCards || !btnTable) return;

            if (mode === 'table') {
                gridEl.style.display = 'none';
                tableEl.style.display = 'block';
                btnTable.className = 'btn btn-view-tab active';
                btnCards.className = 'btn btn-view-tab';
            } else {
                tableEl.style.display = 'none';
                gridEl.style.display = '';
                btnCards.className = 'btn btn-view-tab active';
                btnTable.className = 'btn btn-view-tab';
            }
        }

        function switchKecEditorTab(tabKey) {
            const panes = {
                identitas: 'kecEditorTabIdentitas',
                komoditas: 'kecEditorTabKomoditas',
                populasi: 'kecEditorTabPopulasi'
            };
            Object.keys(panes).forEach(k => {
                const el = document.getElementById(panes[k]);
                const btn = document.getElementById('kecEdTabBtn-' + k);
                if (el) {
                    el.style.display = (k === tabKey) ? 'block' : 'none';
                }
                if (btn) {
                    btn.className = (k === tabKey)
                        ? 'btn btn-sm btn-emerald rounded-pill px-3 py-1.5 fw-bold d-flex align-items-center gap-1.5'
                        : 'btn btn-sm btn-light border text-secondary rounded-pill px-3 py-1.5 fw-bold d-flex align-items-center gap-1.5';
                }
            });
        }

        function toggleManualFotoPath() {
            const wrap = document.getElementById('kecManualFotoPathWrap');
            if (!wrap) return;
            wrap.style.display = (wrap.style.display === 'none' || !wrap.style.display) ? 'block' : 'none';
        }

        function updateKecLiveCardPreview() {
            const namaRaw = (document.getElementById('editKecNama')?.value || '').trim() || 'KECAMATAN';
            const popVal = parseInt(document.getElementById('editKecPendudukTotal')?.value || '0', 10) || 0;
            const tagVal = (document.getElementById('editKecTag')?.value || '').trim() || 'Potensi Wilayah';

            const titleContainer = document.getElementById('editKecPreviewVerticalTitle');
            if (titleContainer) {
                const words = namaRaw.toUpperCase().split(/\s+/).filter(Boolean);
                titleContainer.innerHTML = words.map(w => {
                    const letters = w.split('').map(ch => `<span>${escapeAdminHtml(ch)}</span>`).join('');
                    return `<div class="d-flex flex-column align-items-center">${letters}</div>`;
                }).join('');
            }

            const popEl = document.getElementById('editKecPreviewPop');
            if (popEl) {
                popEl.textContent = `${popVal.toLocaleString('id-ID')} PENDUDUK`;
            }

            const tagEl = document.getElementById('editKecPreviewTag');
            if (tagEl) {
                tagEl.textContent = tagVal;
            }
        }

        function renderKecProdukChipPreview() {
            const raw = document.getElementById('editKecProdukUnggulan')?.value || '';
            const wrap = document.getElementById('editKecProdukChipPreview');
            if (!wrap) return;
            const items = raw.split(',').map(s => s.trim()).filter(Boolean);
            if (!items.length) {
                wrap.innerHTML = '<span class="text-muted" style="font-size: 11px;">Belum ada produk unggulan tertulis.</span>';
                return;
            }
            wrap.innerHTML = items.map(item => `
                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fw-semibold" style="font-size: 11px;">
                    <i class="bi bi-dot me-0.5"></i>${escapeAdminHtml(item)}
                </span>
            `).join('');
        }

        function filterKecamatanTable() {
            const inputEl = document.getElementById('inputSearchKecamatan');
            const searchVal = inputEl ? inputEl.value.toLowerCase().trim() : '';
            const filterItems = (selector) => {
                let count = 0;
                document.querySelectorAll(selector).forEach(el => {
                    const nama = el.getAttribute('data-nama') || '';
                    const kode = el.getAttribute('data-kode') || '';
                    const komoditas = el.getAttribute('data-komoditas') || '';
                    const matches = !searchVal || nama.includes(searchVal) || kode.includes(searchVal) || komoditas.includes(searchVal);
                    el.style.display = matches ? '' : 'none';
                    if (matches) count++;
                });
                return count;
            };

            const cardVisible = filterItems('.kec-card-col');
            filterItems('.kec-master-row');

            const countText = document.getElementById('kecTableCountText');
            if (countText) {
                countText.innerHTML = `Menampilkan <strong>${cardVisible}</strong> dari <strong>${KECAMATAN_DATA.length}</strong> Kecamatan beserta foto kartu, populasi, komoditas, dan metrik <code>/portal/agregat</code>`;
            }
        }

        function updateKecFotoPreviewPath(path) {
            const img = document.getElementById('editKecFotoPreview');
            if (!img) return;
            img.src = (path && path.trim()) ? path.trim() : '/images/jadesta/kebun_kakao_totallang.jpg';
        }

        function selectKecamatanGalleryPhoto(path) {
            if (!path) return;
            const pathInput = document.getElementById('editKecFoto');
            const fileInput = document.getElementById('editKecFotoFile');
            const labelEl = document.getElementById('editKecPreviewLabel');
            if (fileInput) fileInput.value = '';
            if (pathInput) pathInput.value = path;
            if (labelEl) labelEl.textContent = path.split('/').pop();
            updateKecFotoPreviewPath(path);
        }

        function previewKecamatanPhoto(input) {
            const file = input && input.files ? input.files[0] : null;
            const img = document.getElementById('editKecFotoPreview');
            const label = document.getElementById('editKecPreviewLabel');
            if (!file || !img) return;
            const objectUrl = URL.createObjectURL(file);
            img.src = objectUrl;
            if (label) label.textContent = 'File baru: ' + file.name;
        }

        function recalcKecPendudukTotal() {
            const l = parseInt(document.getElementById('editKecPendudukL')?.value || '0', 10) || 0;
            const p = parseInt(document.getElementById('editKecPendudukP')?.value || '0', 10) || 0;
            const totEl = document.getElementById('editKecPendudukTotal');
            if (totEl) {
                totEl.value = String(l + p);
            }
            updateKecLiveCardPreview();
        }

        function openKecamatanEditorView() {
            const dirView = document.getElementById('kecDirectoryView');
            const edView = document.getElementById('kecEditorView');
            if (dirView) dirView.style.display = 'none';
            if (edView) edView.style.display = 'block';
            switchKecEditorTab('identitas');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function closeKecamatanEditor() {
            const dirView = document.getElementById('kecDirectoryView');
            const edView = document.getElementById('kecEditorView');
            const manualWrap = document.getElementById('kecManualFotoPathWrap');
            if (edView) edView.style.display = 'none';
            if (dirView) dirView.style.display = 'block';
            if (manualWrap) manualWrap.style.display = 'none';
        }

        function openNewKecamatanModal() {
            switchAdminTab('kecamatan', true);
            document.getElementById('modalEditKecamatanTitle').textContent = 'Tambah Kecamatan Baru';
            document.getElementById('editKecOriginalNama').value = '';
            const namaInput = document.getElementById('editKecNama');
            namaInput.value = '';
            document.getElementById('editKecKode').value = '';
            document.getElementById('editKecTag').value = '';
            document.getElementById('editKecIpd').value = '70.0';
            document.getElementById('editKecStatusIpd').value = 'Maju';
            document.getElementById('editKecDesaCount').value = '0';
            document.getElementById('editKecKomoditasDominan').value = '';
            document.getElementById('editKecKomoditas').value = '';
            document.getElementById('editKecPotensi').value = '';
            document.getElementById('editKecOdtw').value = '';
            document.getElementById('editKecProdukUnggulan').value = '';
            document.getElementById('editKecProdukDesaCount').value = '0';
            document.getElementById('editKecPendudukL').value = '0';
            document.getElementById('editKecPendudukP').value = '0';
            document.getElementById('editKecPendudukTotal').value = '0';
            document.getElementById('editKecImk').value = '0';
            document.getElementById('editKecBumdes').value = '0';
            document.getElementById('editKecSekolah').value = '0';
            document.getElementById('editKecFaskes').value = '0';
            document.getElementById('editKecPlnKk').value = '0';
            document.getElementById('editKecLat').value = '-3.5291';
            document.getElementById('editKecLng').value = '120.9855';

            const idxEl = document.getElementById('editKecPreviewIndex');
            if (idxEl) idxEl.textContent = String((KECAMATAN_DATA?.length || 15) + 1).padStart(2, '0');

            const defaultImg = '/images/jadesta/kebun_kakao_totallang.jpg';
            document.getElementById('editKecFoto').value = defaultImg;
            const fileEl = document.getElementById('editKecFotoFile');
            if (fileEl) fileEl.value = '';
            const galEl = document.getElementById('editKecFotoGallery');
            if (galEl) galEl.value = '';
            const labelEl = document.getElementById('editKecPreviewLabel');
            if (labelEl) labelEl.textContent = 'Default foto wilayah baru';
            updateKecFotoPreviewPath(defaultImg);
            updateKecLiveCardPreview();
            renderKecProdukChipPreview();
            openKecamatanEditorView();
            setTimeout(() => namaInput.focus(), 120);
        }

        function editKecamatanFromRow(btn) {
            const container = btn ? btn.closest('.kec-card-col, tr') : null;
            if (!container) return;
            let kec = {};
            try {
                kec = JSON.parse(container.getAttribute('data-kec-json') || '{}');
            } catch (err) {
                console.error(err);
                return;
            }
            const cardIdx = container.getAttribute('data-index') || '1';
            switchAdminTab('kecamatan', true);

            const nama = kec.nama || '';
            document.getElementById('modalEditKecamatanTitle').textContent = 'Edit Kecamatan: ' + nama;
            document.getElementById('editKecOriginalNama').value = nama;
            const namaInput = document.getElementById('editKecNama');
            namaInput.value = nama;
            document.getElementById('editKecKode').value = kec.kode || '';
            document.getElementById('editKecTag').value = kec.tag || '';
            document.getElementById('editKecIpd').value = kec.ipd ?? '70.0';
            document.getElementById('editKecStatusIpd').value = kec.status_ipd || 'Maju';
            document.getElementById('editKecDesaCount').value = kec.desa_count ?? (Array.isArray(kec.desaList) ? kec.desaList.length : 0);
            document.getElementById('editKecKomoditasDominan').value = kec.komoditas_dominan || kec.komoditas || '';
            document.getElementById('editKecKomoditas').value = kec.komoditas || '';
            document.getElementById('editKecPotensi').value = kec.potensi_utama || '';
            document.getElementById('editKecOdtw').value = kec.odtw || '';
            document.getElementById('editKecProdukUnggulan').value = kec.produk_unggulan || '';
            document.getElementById('editKecProdukDesaCount').value = kec.produk_unggulan_desa_count ?? 0;
            document.getElementById('editKecPendudukL').value = kec.penduduk_l ?? 0;
            document.getElementById('editKecPendudukP').value = kec.penduduk_p ?? 0;
            document.getElementById('editKecPendudukTotal').value = kec.penduduk_total ?? ((Number(kec.penduduk_l) || 0) + (Number(kec.penduduk_p) || 0));
            document.getElementById('editKecImk').value = kec.imk ?? 0;
            document.getElementById('editKecBumdes').value = kec.bumdes ?? 0;
            document.getElementById('editKecSekolah').value = kec.total_sekolah ?? 0;
            document.getElementById('editKecFaskes').value = kec.total_faskes ?? 0;
            document.getElementById('editKecPlnKk').value = kec.pln_kk ?? 0;
            document.getElementById('editKecLat').value = kec.lat ?? '-3.5291';
            document.getElementById('editKecLng').value = kec.lng ?? '120.9855';

            const idxEl = document.getElementById('editKecPreviewIndex');
            if (idxEl) idxEl.textContent = String(kec.portal_order || cardIdx).padStart(2, '0');

            const fotoPath = kec.foto || '/images/jadesta/kebun_kakao_totallang.jpg';
            document.getElementById('editKecFoto').value = fotoPath;
            const fileEl = document.getElementById('editKecFotoFile');
            if (fileEl) fileEl.value = '';
            const galEl = document.getElementById('editKecFotoGallery');
            if (galEl) {
                const matchedOpt = Array.from(galEl.options).find(opt => opt.value === fotoPath);
                galEl.value = matchedOpt ? fotoPath : '';
            }
            const labelEl = document.getElementById('editKecPreviewLabel');
            if (labelEl) labelEl.textContent = fotoPath ? fotoPath.split('/').pop() : 'Preview Kartu';

            updateKecFotoPreviewPath(fotoPath);
            updateKecLiveCardPreview();
            renderKecProdukChipPreview();
            openKecamatanEditorView();
            setTimeout(() => namaInput.focus(), 120);
        }

        async function saveKecamatanModalData(e) {
            if (e) e.preventDefault();

            const originalNama = document.getElementById('editKecOriginalNama').value.trim();
            const nama = document.getElementById('editKecNama').value.trim();
            const ipd = parseFloat(document.getElementById('editKecIpd').value);

            if (!nama) {
                switchKecEditorTab('identitas');
                document.getElementById('editKecNama')?.focus();
                alert('Nama Kecamatan wajib diisi!');
                return;
            }
            if (isNaN(ipd) || ipd < 0 || ipd > 100) {
                switchKecEditorTab('identitas');
                document.getElementById('editKecIpd')?.focus();
                alert('Skor IPD harus berupa angka antara 0 hingga 100.');
                return;
            }

            const formData = new FormData();
            if (originalNama) formData.append('original_nama', originalNama);
            formData.append('nama', nama);
            formData.append('kode', document.getElementById('editKecKode').value.trim());
            formData.append('tag', document.getElementById('editKecTag').value.trim());
            formData.append('foto', document.getElementById('editKecFoto').value.trim());
            formData.append('ipd', String(ipd));
            formData.append('status_ipd', document.getElementById('editKecStatusIpd').value);
            formData.append('desa_count', document.getElementById('editKecDesaCount').value || '0');
            formData.append('komoditas_dominan', document.getElementById('editKecKomoditasDominan').value.trim());
            formData.append('komoditas', document.getElementById('editKecKomoditas').value.trim());
            formData.append('potensi_utama', document.getElementById('editKecPotensi').value.trim());
            formData.append('odtw', document.getElementById('editKecOdtw').value.trim());
            formData.append('produk_unggulan', document.getElementById('editKecProdukUnggulan').value.trim());
            formData.append('produk_unggulan_desa_count', document.getElementById('editKecProdukDesaCount').value || '0');
            formData.append('penduduk_l', document.getElementById('editKecPendudukL').value || '0');
            formData.append('penduduk_p', document.getElementById('editKecPendudukP').value || '0');
            formData.append('penduduk_total', document.getElementById('editKecPendudukTotal').value || '0');
            formData.append('imk', document.getElementById('editKecImk').value || '0');
            formData.append('bumdes', document.getElementById('editKecBumdes').value || '0');
            formData.append('total_sekolah', document.getElementById('editKecSekolah').value || '0');
            formData.append('total_faskes', document.getElementById('editKecFaskes').value || '0');
            formData.append('pln_kk', document.getElementById('editKecPlnKk').value || '0');

            const latVal = document.getElementById('editKecLat').value.trim();
            const lngVal = document.getElementById('editKecLng').value.trim();
            if (latVal !== '') formData.append('lat', latVal);
            if (lngVal !== '') formData.append('lng', lngVal);

            const fotoFileInput = document.getElementById('editKecFotoFile');
            if (fotoFileInput && fotoFileInput.files && fotoFileInput.files[0]) {
                formData.append('foto_file', fotoFileInput.files[0]);
            }

            const btn = document.getElementById('btnSaveKecamatanModal');
            const originalText = btn ? btn.innerHTML : 'Simpan Kecamatan & Foto';
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Menyimpan...';
            }

            try {
                const res = await fetch('/admin/kecamatan/save', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                const data = await res.json();

                if (res.ok && data.success) {
                    showToast(data.message || 'Data Kecamatan berhasil disimpan!');
                    syncKecamatanUiAfterSave(data.mode, data.old_nama || originalNama, data.kecamatan, data.total_kecamatan);
                    closeKecamatanEditor();
                } else {
                    alert(data.message || 'Gagal menyimpan data Kecamatan.');
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan koneksi saat menyimpan data Kecamatan.');
            } finally {
                if (btn) {
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                }
            }
        }

        function escapeAdminHtml(str) {
            return String(str ?? '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#39;');
        }

        function renderKecamatanGridCardInnerHtml(kec) {
            const kecDesaCount = kec.desa_count ?? (Array.isArray(kec.desaList) ? kec.desaList.length : 0);
            const kecStatus = kec.status_ipd || 'Maju';
            const statusBadge = kecStatus === 'Mandiri'
                ? 'bg-success text-white'
                : (kecStatus === 'Maju' ? 'bg-warning text-dark' : 'bg-info text-dark');
            const fotoUrl = kec.foto || '/images/jadesta/kebun_kakao_totallang.jpg';
            const popTotal = Number(kec.penduduk_total || 0);
            const komDom = kec.komoditas_dominan || kec.komoditas || '-';

            return `
                <div class="bento-card overflow-hidden h-100 d-flex flex-column">
                    <div class="position-relative" style="height: 158px; background: #0f172a;">
                        <img src="${escapeAdminHtml(fotoUrl)}" alt="Foto ${escapeAdminHtml(kec.nama)}" class="w-100 h-100 object-fit-cover" onerror="this.src='/images/jadesta/kebun_kakao_totallang.jpg'">
                        <div class="position-absolute inset-0 w-100 h-100 top-0 start-0" style="background: linear-gradient(to top, rgba(15, 23, 42, 0.90) 0%, rgba(15, 23, 42, 0.20) 55%, rgba(15, 23, 42, 0.40) 100%);"></div>
                        <div class="position-absolute top-0 start-0 end-0 p-2.5 d-flex align-items-center justify-content-between">
                            <span class="badge bg-dark bg-opacity-75 text-white border border-white border-opacity-25 rounded-pill font-mono-num" style="font-size: 10px;">${escapeAdminHtml(kec.kode || '-')}</span>
                            <span class="badge ${statusBadge} rounded-pill fw-bold" style="font-size: 10px;">${escapeAdminHtml(kecStatus)}</span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 end-0 p-3">
                            <div class="d-flex align-items-end justify-content-between gap-2">
                                <div class="min-w-0">
                                    <h6 class="fw-bold text-white mb-0 text-truncate">${escapeAdminHtml(kec.nama)}</h6>
                                    <div class="text-white-50 text-truncate" style="font-size: 11px;">${escapeAdminHtml(kec.tag || '-')}</div>
                                </div>
                                <span class="badge text-white font-mono-num flex-shrink-0" style="background: rgba(15, 23, 42, 0.68); border: 1px solid rgba(255, 255, 255, 0.28); font-size: 10px;">IPD ${Number(kec.ipd || 70).toFixed(1)}</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 d-flex flex-column flex-grow-1 justify-content-between gap-2.5 bg-white">
                        <div>
                            <div class="row g-1.5 text-center bg-light rounded-3 p-2 mb-2.5 border">
                                <div class="col-4 border-end">
                                    <div class="text-muted text-uppercase" style="font-size: 9px; letter-spacing: 0.4px;">Penduduk</div>
                                    <div class="fw-bold text-dark font-mono-num" style="font-size: 12px;">${popTotal.toLocaleString('id-ID')} <span class="fw-normal text-muted" style="font-size: 10px;">Jiwa</span></div>
                                </div>
                                <div class="col-4 border-end">
                                    <div class="text-muted text-uppercase" style="font-size: 9px; letter-spacing: 0.4px;">Desa</div>
                                    <div class="fw-bold text-dark font-mono-num" style="font-size: 12px;">${kecDesaCount}</div>
                                </div>
                                <div class="col-4">
                                    <div class="text-muted text-uppercase" style="font-size: 9px; letter-spacing: 0.4px;">IMK</div>
                                    <div class="fw-bold text-success font-mono-num" style="font-size: 12px;">${Number(kec.imk || 0).toLocaleString('id-ID')}</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-1.5 mb-1">
                                <i class="bi bi-flower2 text-success flex-shrink-0" style="font-size: 12px;"></i>
                                <span class="fw-semibold text-dark text-truncate" style="font-size: 11.5px;">${escapeAdminHtml(komDom)}</span>
                            </div>
                            <div class="text-muted font-mono-num text-truncate" style="font-size: 10.5px;">
                                BUMDes ${Number(kec.bumdes || 0)} &bull; Sekolah ${Number(kec.total_sekolah || 0)} &bull; PLN ${Number(kec.pln_kk || 0).toLocaleString('id-ID')} KK
                            </div>
                        </div>
                        <button type="button" onclick="editKecamatanFromRow(this)" class="btn btn-sm btn-outline-success w-100 rounded-pill fw-bold py-1.5 d-flex align-items-center justify-content-center gap-1.5" style="font-size: 11.5px;">
                            <i class="bi bi-pencil-square"></i>
                            <span>Edit Konten &amp; Foto</span>
                        </button>
                    </div>
                </div>
            `;
        }

        function renderKecamatanMasterRowCells(kec, rowNum) {
            const kecDesaCount = kec.desa_count ?? (Array.isArray(kec.desaList) ? kec.desaList.length : 0);
            const kecStatus = kec.status_ipd || 'Maju';
            const badgeClass = kecStatus === 'Mandiri'
                ? 'bg-success-subtle text-success border-success-subtle'
                : (kecStatus === 'Maju' ? 'bg-warning-subtle text-warning border-warning-subtle' : 'bg-info-subtle text-info border-info-subtle');
            const fotoUrl = kec.foto || '/images/jadesta/kebun_kakao_totallang.jpg';
            const popTotal = Number(kec.penduduk_total || 0);
            const komDom = kec.komoditas_dominan || kec.komoditas || '-';

            return `
                <td class="px-3 text-muted font-mono-num">${rowNum}</td>
                <td>
                    <div class="d-flex align-items-center gap-2.5 py-1">
                        <img src="${escapeAdminHtml(fotoUrl)}" alt="Foto ${escapeAdminHtml(kec.nama)}" class="rounded-2 border object-fit-cover flex-shrink-0" style="width: 40px; height: 48px;" onerror="this.src='/images/jadesta/kebun_kakao_totallang.jpg'">
                        <div>
                            <div class="fw-bold text-dark">${escapeAdminHtml(kec.nama)}</div>
                            <div class="font-mono-num text-muted" style="font-size: 10.5px;">${escapeAdminHtml(kec.kode || '-')}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="fw-bold font-mono-num text-dark">${popTotal.toLocaleString('id-ID')} Jiwa</div>
                    <div class="text-muted" style="font-size: 11px;">${kecDesaCount} Desa/Kelurahan</div>
                </td>
                <td style="max-width: 240px;">
                    <div class="fw-semibold text-dark text-truncate">${escapeAdminHtml(komDom)}</div>
                    <div class="text-muted text-truncate" style="font-size: 10.5px;">${escapeAdminHtml(kec.tag || '-')}</div>
                </td>
                <td>
                    <span class="fw-bold font-mono-num text-success me-1">${Number(kec.ipd || 70).toFixed(1)}</span>
                    <span class="badge ${badgeClass} border rounded-pill">${escapeAdminHtml(kecStatus)}</span>
                </td>
                <td class="text-center">
                    <button type="button" onclick="editKecamatanFromRow(this)" class="btn btn-sm btn-emerald px-2.5 py-1 rounded-pill" style="font-size: 11.5px;">
                        <i class="bi bi-pencil-square me-1"></i>Edit
                    </button>
                </td>
            `;
        }

        function syncKecamatanUiAfterSave(mode, oldNama, kec, totalKecamatan) {
            if (!kec || !kec.nama) return;

            const newNama = kec.nama;
            const prevNamaUpper = (oldNama || '').toUpperCase();
            const newNamaUpper = newNama.toUpperCase();
            const kecJsonStr = JSON.stringify(kec);
            const komSearch = `${kec.komoditas_dominan || ''} ${kec.komoditas || ''} ${kec.produk_unggulan || ''}`.toLowerCase();

            // 1. Update in-memory KECAMATAN_DATA
            if (Array.isArray(KECAMATAN_DATA)) {
                if (mode === 'edit') {
                    const targetIdx = KECAMATAN_DATA.findIndex(item => (item.nama || '').toUpperCase() === prevNamaUpper);
                    if (targetIdx !== -1) {
                        KECAMATAN_DATA[targetIdx] = kec;
                    } else {
                        KECAMATAN_DATA.push(kec);
                    }
                } else {
                    KECAMATAN_DATA.push(kec);
                }
            }

            // 2. Sync <select> dropdowns across Admin tabs
            const syncSelectOption = (selectId, useUpperVal) => {
                const sel = document.getElementById(selectId);
                if (!sel) return;
                const oldVal = useUpperVal ? prevNamaUpper : (oldNama || '');
                const newVal = useUpperVal ? newNamaUpper : newNama;
                let matched = false;
                Array.from(sel.options).forEach(opt => {
                    if (opt.value && opt.value.toUpperCase() === oldVal.toUpperCase() && mode === 'edit') {
                        opt.value = newVal;
                        opt.textContent = newNama;
                        matched = true;
                    }
                });
                if (!matched) {
                    const opt = document.createElement('option');
                    opt.value = newVal;
                    opt.textContent = newNama;
                    sel.appendChild(opt);
                }
                if (selectId === 'selectFilterKecamatan' && sel.options[0]) {
                    sel.options[0].textContent = `Semua Kecamatan (${totalKecamatan || KECAMATAN_DATA.length})`;
                }
            };
            syncSelectOption('podesSelectKec', true);
            syncSelectOption('selectFilterKecamatan', false);
            syncSelectOption('editModalNamaKec', false);

            if (mode === 'edit' && currentKec === prevNamaUpper) {
                currentKec = newNamaUpper;
            }

            // 3A. Update Visual Card Grid item or append new card
            const gridContainer = document.getElementById('kecGridContainer');
            if (gridContainer) {
                let updatedCard = false;
                if (mode === 'edit') {
                    gridContainer.querySelectorAll('.kec-card-col').forEach(cardEl => {
                        if ((cardEl.getAttribute('data-nama') || '').toUpperCase() === prevNamaUpper) {
                            updatedCard = true;
                            cardEl.setAttribute('data-nama', newNama.toLowerCase());
                            cardEl.setAttribute('data-kode', (kec.kode || '').toLowerCase());
                            cardEl.setAttribute('data-komoditas', komSearch);
                            cardEl.setAttribute('data-kec-json', kecJsonStr);
                            cardEl.innerHTML = renderKecamatanGridCardInnerHtml(kec);
                        }
                    });
                }
                if (!updatedCard) {
                    const col = document.createElement('div');
                    col.className = 'col-12 col-sm-6 col-xl-4 col-xxl-3 kec-card-col';
                    col.setAttribute('data-index', String(gridContainer.querySelectorAll('.kec-card-col').length + 1));
                    col.setAttribute('data-nama', newNama.toLowerCase());
                    col.setAttribute('data-kode', (kec.kode || '').toLowerCase());
                    col.setAttribute('data-komoditas', komSearch);
                    col.setAttribute('data-kec-json', kecJsonStr);
                    col.innerHTML = renderKecamatanGridCardInnerHtml(kec);
                    gridContainer.appendChild(col);
                }
            }

            // 3B. Update Master Kecamatan compact table row or append
            const tbodyMaster = document.getElementById('tbodyKecamatanMaster');
            if (tbodyMaster) {
                let updatedMaster = false;
                if (mode === 'edit') {
                    tbodyMaster.querySelectorAll('.kec-master-row').forEach((tr, rowIdx) => {
                        if ((tr.getAttribute('data-nama') || '').toUpperCase() === prevNamaUpper) {
                            updatedMaster = true;
                            tr.setAttribute('data-nama', newNama.toLowerCase());
                            tr.setAttribute('data-kode', (kec.kode || '').toLowerCase());
                            tr.setAttribute('data-komoditas', komSearch);
                            tr.setAttribute('data-kec-json', kecJsonStr);
                            tr.innerHTML = renderKecamatanMasterRowCells(kec, rowIdx + 1);
                        }
                    });
                }

                if (!updatedMaster) {
                    const tr = document.createElement('tr');
                    tr.className = 'kec-master-row';
                    tr.setAttribute('data-index', String(tbodyMaster.querySelectorAll('.kec-master-row').length + 1));
                    tr.setAttribute('data-nama', newNama.toLowerCase());
                    tr.setAttribute('data-kode', (kec.kode || '').toLowerCase());
                    tr.setAttribute('data-komoditas', komSearch);
                    tr.setAttribute('data-kec-json', kecJsonStr);
                    const rowNum = tbodyMaster.querySelectorAll('.kec-master-row').length + 1;
                    tr.innerHTML = renderKecamatanMasterRowCells(kec, rowNum);
                    tbodyMaster.appendChild(tr);
                }
            }

            // 4. Update Spatial Kecamatan table row or append
            const tbodySpatial = document.getElementById('tbodySpatialKecamatan');
            if (tbodySpatial) {
                let updatedSpatial = false;
                if (mode === 'edit') {
                    tbodySpatial.querySelectorAll('.kec-spatial-row').forEach(tr => {
                        if ((tr.getAttribute('data-nama') || '').toUpperCase() === prevNamaUpper) {
                            updatedSpatial = true;
                            tr.setAttribute('data-nama', newNama.toLowerCase());
                            tr.setAttribute('data-kec-json', kecJsonStr);
                            const cells = tr.querySelectorAll('td');
                            if (cells.length >= 3) {
                                cells[0].textContent = newNama;
                                cells[1].textContent = kec.lat ?? '-';
                                cells[2].textContent = kec.lng ?? '-';
                            }
                        }
                    });
                }
                if (!updatedSpatial) {
                    const tr = document.createElement('tr');
                    tr.className = 'kec-spatial-row';
                    tr.setAttribute('data-nama', newNama.toLowerCase());
                    tr.setAttribute('data-kec-json', kecJsonStr);
                    tr.innerHTML = `
                        <td class="fw-bold text-dark">${escapeAdminHtml(newNama)}</td>
                        <td class="font-mono-num text-muted">${escapeAdminHtml(kec.lat ?? '-')}</td>
                        <td class="font-mono-num text-muted">${escapeAdminHtml(kec.lng ?? '-')}</td>
                        <td class="text-center"><span class="badge bg-success-subtle text-success rounded-pill">Aktif di Peta</span></td>
                        <td class="text-center">
                            <button type="button" onclick="editKecamatanFromRow(this)" class="btn btn-sm btn-light border text-muted px-2 py-0 rounded-pill" style="font-size: 10.5px;" title="Edit Nama & Koordinat Kecamatan">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </button>
                        </td>
                    `;
                    tbodySpatial.appendChild(tr);
                }
            }

            // 5. Propagate rename across rendered Desa Master rows and cards
            if (mode === 'edit' && oldNama && prevNamaUpper !== newNamaUpper) {
                document.querySelectorAll('.desa-row').forEach(tr => {
                    if ((tr.getAttribute('data-kecamatan') || '').toUpperCase() === prevNamaUpper) {
                        tr.setAttribute('data-kecamatan', newNama);
                        const cells = tr.querySelectorAll('td');
                        if (cells.length >= 8) {
                            cells[2].textContent = newNama;
                            const btn = cells[7].querySelector('button');
                            if (btn && btn.getAttribute('onclick')) {
                                const updatedOnclick = btn.getAttribute('onclick').replace(`'${oldNama}'`, `'${newNama.replace(/'/g, "\\'")}'`);
                                btn.setAttribute('onclick', updatedOnclick);
                            }
                        }
                    }
                });
                document.querySelectorAll('.desa-card-col').forEach(card => {
                    if ((card.getAttribute('data-kecamatan') || '').toUpperCase() === prevNamaUpper) {
                        card.setAttribute('data-kecamatan', newNama);
                        const kecLabel = card.querySelector('.text-muted.text-truncate');
                        if (kecLabel) {
                            kecLabel.textContent = 'Kec. ' + newNama;
                        }
                        const btn = card.querySelector('button[onclick^="editDesaData"]');
                        if (btn && btn.getAttribute('onclick')) {
                            const updatedOnclick = btn.getAttribute('onclick').replace(`'${oldNama}'`, `'${newNama.replace(/'/g, "\\'")}'`);
                            btn.setAttribute('onclick', updatedOnclick);
                        }
                    }
                });
            }

            // 6. Add newly uploaded image path into gallery dropdown if not listed
            if (kec.foto) {
                const galEl = document.getElementById('editKecFotoGallery');
                if (galEl && !Array.from(galEl.options).some(opt => opt.value === kec.foto)) {
                    const opt = document.createElement('option');
                    opt.value = kec.foto;
                    opt.textContent = kec.foto.split('/').pop();
                    galEl.appendChild(opt);
                }
            }

            // 7. Update counters & Overview dashboard charts
            if (mode === 'edit' && oldNama && prevNamaUpper !== newNamaUpper && Array.isArray(FLAT_DESA_DATA)) {
                FLAT_DESA_DATA.forEach(item => {
                    if ((item.nama_kec || '').toUpperCase() === prevNamaUpper) {
                        item.nama_kec = newNama;
                    }
                });
            }
            const finalCount = totalKecamatan || (Array.isArray(KECAMATAN_DATA) ? KECAMATAN_DATA.length : 15);
            ['overviewTotalKecamatan', 'masterKecCountSubtitle', 'subTabKecCount', 'spatialKecCountSubtitle', 'kecHeaderCount'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.textContent = String(finalCount);
            });
            filterKecamatanTable();
            refreshOverviewDashboard();
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

        // =====================================================================
        // RINGKASAN EKSEKUTIF: ANALITIK CHART.JS & MONITORING PRIORITAS DESA
        // =====================================================================
        const IS_OPERATOR_DESA = @json($admin->isOperatorDesa());
        const OPERATOR_DESA_NAME = @json(strtoupper((string) ($admin->desa ?? '')));
        const overviewCharts = { kec: null, status: null, demografi: null, sektor: null };
        let overviewKecMetric = 'ipd';
        let overviewSektorMode = 'komoditas';
        let overviewPriorityMode = 'prioritas';

        function initOverviewDashboard() {
            refreshOverviewDashboard();
        }

        function refreshOverviewDashboard() {
            renderOverviewStatusChart();
            renderOverviewKecChart();
            renderOverviewDemografiChart();
            renderOverviewSektorChart();
            renderOverviewPriorityList();
        }

        function setOverviewKecMetric(metric) {
            overviewKecMetric = metric || 'ipd';
            ['ipd', 'penduduk', 'imk', 'bumdes'].forEach(key => {
                const btn = document.getElementById('ovKecMetric-' + key);
                if (btn) {
                    btn.className = (key === overviewKecMetric) ? 'btn btn-view-tab active' : 'btn btn-view-tab';
                }
            });
            renderOverviewKecChart();
        }

        function renderOverviewKecChart() {
            const canvas = document.getElementById('chartOverviewKecamatan');
            if (!canvas || typeof Chart === 'undefined' || !Array.isArray(KECAMATAN_DATA)) return;

            const metricConfig = {
                ipd: {
                    subtitle: `Peringkat Skor IPD pada ${KECAMATAN_DATA.length} Kecamatan (batas status Mandiri \u2265 70)`,
                    label: 'Skor IPD',
                    getVal: k => Number(k.ipd || 0),
                    format: v => Number(v).toFixed(1),
                    max: 100
                },
                penduduk: {
                    subtitle: `Distribusi jumlah penduduk pada ${KECAMATAN_DATA.length} Kecamatan (PODES 2025)`,
                    label: 'Total Penduduk (Jiwa)',
                    getVal: k => Number(k.penduduk_total || 0),
                    format: v => Number(v).toLocaleString('id-ID') + ' Jiwa',
                    max: undefined
                },
                imk: {
                    subtitle: `Sebaran unit Industri Mikro & Kecil (IMK) per Kecamatan`,
                    label: 'Unit IMK',
                    getVal: k => Number(k.imk || 0),
                    format: v => Number(v).toLocaleString('id-ID') + ' Unit',
                    max: undefined
                },
                bumdes: {
                    subtitle: `Jumlah Badan Usaha Milik Desa (BUMDes) aktif per Kecamatan`,
                    label: 'BUMDes (Unit)',
                    getVal: k => Number(k.bumdes || 0),
                    format: v => Number(v).toLocaleString('id-ID') + ' BUMDes',
                    max: undefined
                }
            };

            const cfg = metricConfig[overviewKecMetric] || metricConfig.ipd;
            const subEl = document.getElementById('overviewKecChartSubtitle');
            if (subEl) subEl.textContent = cfg.subtitle;

            const legendBar = document.getElementById('overviewKecLegendBar');
            if (legendBar) {
                legendBar.style.display = (overviewKecMetric === 'ipd') ? 'flex' : 'none';
            }

            const sorted = [...KECAMATAN_DATA].sort((a, b) => cfg.getVal(b) - cfg.getVal(a));
            const labels = sorted.map(k => k.nama || '-');
            const values = sorted.map(cfg.getVal);
            const colors = sorted.map((k, idx) => {
                if (overviewKecMetric === 'ipd') {
                    const ipdVal = Number(k.ipd || 0);
                    if (ipdVal >= 70) return '#10b981';
                    if (ipdVal >= 50) return '#f59e0b';
                    return '#0ea5e9';
                }
                return idx < 3 ? '#059669' : '#34d399';
            });

            if (overviewCharts.kec) {
                overviewCharts.kec.destroy();
            }

            overviewCharts.kec = new Chart(canvas.getContext('2d'), {
                type: 'bar',
                data: {
                    labels,
                    datasets: [{
                        label: cfg.label,
                        data: values,
                        backgroundColor: colors,
                        borderRadius: 6,
                        maxBarThickness: 28
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: ctx => `${cfg.label}: ${cfg.format(ctx.parsed.y)}`
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { size: 10.5, weight: '600' },
                                color: '#475569',
                                maxRotation: 35,
                                minRotation: 0
                            }
                        },
                        y: {
                            beginAtZero: true,
                            suggestedMax: cfg.max,
                            grid: { color: '#f1f5f9' },
                            ticks: {
                                font: { size: 10.5 },
                                color: '#64748b',
                                callback: v => Number(v).toLocaleString('id-ID')
                            }
                        }
                    }
                }
            });
        }

        function renderOverviewStatusChart() {
            const list = Array.isArray(FLAT_DESA_DATA) ? FLAT_DESA_DATA : [];
            let mandiri = 0;
            let maju = 0;
            let berkembang = 0;
            let ipdSum = 0;

            list.forEach(d => {
                const st = String(d.status || '').toLowerCase();
                if (st.includes('mandiri')) mandiri++;
                else if (st.includes('maju')) maju++;
                else berkembang++;
                ipdSum += Number(d.ipd || 0);
            });

            const total = list.length;
            const avgIpd = total > 0 ? (ipdSum / total) : 0;
            const pct = val => total > 0 ? ((val / total) * 100).toFixed(1).replace('.', ',') : '0,0';

            const setTxt = (id, text) => {
                const el = document.getElementById(id);
                if (el) el.textContent = text;
            };
            setTxt('overviewTotalDesa', String(total));
            setTxt('overviewMandiriCount', String(mandiri));
            setTxt('overviewMajuCount', String(maju));
            setTxt('overviewBerkembangCount', String(berkembang));
            setTxt('overviewDoughnutTotalBadge', `${total} Desa`);
            setTxt('overviewAvgIpdValue', avgIpd.toFixed(1));
            setTxt('overviewDoughnutMandiri', `${mandiri} Desa (${pct(mandiri)}%)`);
            setTxt('overviewDoughnutMaju', `${maju} Desa (${pct(maju)}%)`);
            setTxt('overviewDoughnutBerkembang', `${berkembang} Desa (${pct(berkembang)}%)`);

            const canvas = document.getElementById('chartOverviewStatusDoughnut');
            if (!canvas || typeof Chart === 'undefined') return;

            if (overviewCharts.status) {
                overviewCharts.status.destroy();
            }

            overviewCharts.status = new Chart(canvas.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Mandiri', 'Maju', 'Berkembang'],
                    datasets: [{
                        data: [mandiri, maju, berkembang],
                        backgroundColor: ['#10b981', '#f59e0b', '#0ea5e9'],
                        borderColor: '#ffffff',
                        borderWidth: 3,
                        hoverOffset: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: ctx => `${ctx.label}: ${ctx.parsed} Desa (${pct(ctx.parsed)}%)`
                            }
                        }
                    }
                }
            });
        }

        function renderOverviewDemografiChart() {
            const list = Array.isArray(KECAMATAN_DATA) ? KECAMATAN_DATA : [];
            const totalPop = list.reduce((acc, k) => acc + Number(k.penduduk_total || (Number(k.penduduk_l || 0) + Number(k.penduduk_p || 0))), 0);
            const badge = document.getElementById('overviewTotalPendudukBadge');
            if (badge) {
                badge.textContent = `${totalPop.toLocaleString('id-ID')} Jiwa`;
            }

            const canvas = document.getElementById('chartOverviewDemografi');
            if (!canvas || typeof Chart === 'undefined') return;

            const sorted = [...list].sort((a, b) => Number(b.penduduk_total || 0) - Number(a.penduduk_total || 0));
            const labels = sorted.map(k => k.nama || '-');
            const dataL = sorted.map(k => Number(k.penduduk_l || 0));
            const dataP = sorted.map(k => Number(k.penduduk_p || 0));

            if (overviewCharts.demografi) {
                overviewCharts.demografi.destroy();
            }

            overviewCharts.demografi = new Chart(canvas.getContext('2d'), {
                type: 'bar',
                data: {
                    labels,
                    datasets: [
                        {
                            label: 'Laki-laki',
                            data: dataL,
                            backgroundColor: '#0284c7',
                            borderRadius: 3
                        },
                        {
                            label: 'Perempuan',
                            data: dataP,
                            backgroundColor: '#10b981',
                            borderRadius: 4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 10,
                                usePointStyle: true,
                                pointStyle: 'circle',
                                font: { size: 11, weight: '600' }
                            }
                        },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: ctx => `${ctx.dataset.label}: ${Number(ctx.parsed.y).toLocaleString('id-ID')} Jiwa`
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true,
                            grid: { display: false },
                            ticks: { font: { size: 10 }, color: '#475569', maxRotation: 40, minRotation: 0 }
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true,
                            grid: { color: '#f1f5f9' },
                            ticks: {
                                font: { size: 10.5 },
                                color: '#64748b',
                                callback: v => Number(v).toLocaleString('id-ID')
                            }
                        }
                    }
                }
            });
        }

        function setOverviewSektorMode(mode) {
            overviewSektorMode = mode === 'infrastruktur' ? 'infrastruktur' : 'komoditas';
            ['komoditas', 'infrastruktur'].forEach(key => {
                const btn = document.getElementById('ovSektorMode-' + key);
                if (btn) {
                    btn.className = (key === overviewSektorMode) ? 'btn btn-view-tab active' : 'btn btn-view-tab';
                }
            });
            renderOverviewSektorChart();
        }

        function renderOverviewSektorChart() {
            const canvas = document.getElementById('chartOverviewSektor');
            if (!canvas || typeof Chart === 'undefined') return;

            const titleEl = document.getElementById('overviewSektorChartTitle');
            const subEl = document.getElementById('overviewSektorChartSubtitle');

            if (overviewCharts.sektor) {
                overviewCharts.sektor.destroy();
            }

            if (overviewSektorMode === 'infrastruktur') {
                if (titleEl) titleEl.textContent = 'Sebaran Infrastruktur Desa (Top 7 Kecamatan)';
                if (subEl) subEl.textContent = 'Perbandingan sarana Sekolah, Faskes & BUMDes dari data PODES 2025';

                const topKec = [...(KECAMATAN_DATA || [])]
                    .sort((a, b) => (Number(b.total_sekolah || 0) + Number(b.total_faskes || 0) + Number(b.bumdes || 0)) - (Number(a.total_sekolah || 0) + Number(a.total_faskes || 0) + Number(a.bumdes || 0)))
                    .slice(0, 7);

                overviewCharts.sektor = new Chart(canvas.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: topKec.map(k => k.nama || '-'),
                        datasets: [
                            {
                                label: 'Sekolah',
                                data: topKec.map(k => Number(k.total_sekolah || 0)),
                                backgroundColor: '#3b82f6',
                                borderRadius: 4
                            },
                            {
                                label: 'Faskes',
                                data: topKec.map(k => Number(k.total_faskes || 0)),
                                backgroundColor: '#10b981',
                                borderRadius: 4
                            },
                            {
                                label: 'BUMDes',
                                data: topKec.map(k => Number(k.bumdes || 0)),
                                backgroundColor: '#f59e0b',
                                borderRadius: 4
                            }
                        ]
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: { boxWidth: 10, usePointStyle: true, pointStyle: 'circle', font: { size: 11, weight: '600' } }
                            },
                            tooltip: { backgroundColor: '#0f172a', padding: 10, cornerRadius: 8 }
                        },
                        scales: {
                            x: {
                                stacked: true,
                                beginAtZero: true,
                                grid: { color: '#f1f5f9' },
                                ticks: { font: { size: 10.5 }, color: '#64748b' }
                            },
                            y: {
                                stacked: true,
                                grid: { display: false },
                                ticks: { font: { size: 11, weight: '600' }, color: '#334155' }
                            }
                        }
                    }
                });
                return;
            }

            if (titleEl) titleEl.textContent = 'Top Komoditas Unggulan Desa';
            if (subEl) subEl.textContent = `Sebaran sektor komoditas di ${(FLAT_DESA_DATA || []).length} Desa Kolaka Utara`;

            const buckets = {
                'Kakao': 0,
                'Cengkeh': 0,
                'Nilam': 0,
                'Padi & Beras': 0,
                'Perikanan & Bahari': 0,
                'Kopi': 0,
                'Kelapa & Kopra': 0,
                'Lada & Rempah': 0
            };

            (FLAT_DESA_DATA || []).forEach(d => {
                const raw = String(d.komoditas || '').toLowerCase();
                if (!raw) return;
                if (raw.includes('kakao') || raw.includes('cokelat')) buckets['Kakao']++;
                if (raw.includes('cengkeh')) buckets['Cengkeh']++;
                if (raw.includes('nilam')) buckets['Nilam']++;
                if (raw.includes('padi') || raw.includes('beras') || raw.includes('gabah')) buckets['Padi & Beras']++;
                if (raw.includes('ikan') || raw.includes('rumput laut') || raw.includes('bandeng') || raw.includes('udang')) buckets['Perikanan & Bahari']++;
                if (raw.includes('kopi')) buckets['Kopi']++;
                if (raw.includes('kelapa') || raw.includes('kopra')) buckets['Kelapa & Kopra']++;
                if (raw.includes('lada') || raw.includes('merica') || raw.includes('pala')) buckets['Lada & Rempah']++;
            });

            const sortedBuckets = Object.entries(buckets)
                .filter(([, count]) => count > 0)
                .sort((a, b) => b[1] - a[1])
                .slice(0, 7);

            overviewCharts.sektor = new Chart(canvas.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: sortedBuckets.map(([name]) => name),
                    datasets: [{
                        label: 'Jumlah Desa',
                        data: sortedBuckets.map(([, count]) => count),
                        backgroundColor: ['#059669', '#10b981', '#34d399', '#0284c7', '#f59e0b', '#8b5cf6', '#ec4899'],
                        borderRadius: 6,
                        maxBarThickness: 22
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: ctx => `${ctx.parsed.x} Desa menghasilkan komoditas ini`
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            grid: { color: '#f1f5f9' },
                            ticks: { font: { size: 10.5 }, color: '#64748b' }
                        },
                        y: {
                            grid: { display: false },
                            ticks: { font: { size: 11, weight: '600' }, color: '#334155' }
                        }
                    }
                }
            });
        }

        function setOverviewPriorityMode(mode) {
            overviewPriorityMode = mode === 'top' ? 'top' : 'prioritas';
            ['prioritas', 'top'].forEach(key => {
                const btn = document.getElementById('ovPriorityTab-' + key);
                if (btn) {
                    btn.className = (key === overviewPriorityMode) ? 'btn btn-view-tab active' : 'btn btn-view-tab';
                }
            });
            renderOverviewPriorityList();
        }

        function renderOverviewPriorityList() {
            const tbody = document.getElementById('overviewPriorityTbody');
            if (!tbody) return;

            const subEl = document.getElementById('overviewPrioritySubtitle');
            const list = Array.isArray(FLAT_DESA_DATA) ? [...FLAT_DESA_DATA] : [];
            let rows = [];

            if (overviewPriorityMode === 'top') {
                if (subEl) subEl.textContent = '6 desa dengan skor Indeks Pembangunan Desa (IPD) tertinggi';
                rows = list.sort((a, b) => Number(b.ipd || 0) - Number(a.ipd || 0)).slice(0, 6);
            } else {
                const nonMandiri = list.filter(d => String(d.status || '').toLowerCase() !== 'mandiri')
                    .sort((a, b) => Number(a.ipd || 0) - Number(b.ipd || 0));
                if (subEl) subEl.textContent = `${nonMandiri.length} desa sasaran akselerasi menuju status Mandiri (IPD < 70)`;
                rows = nonMandiri.slice(0, 6);
            }

            if (!rows.length) {
                tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted py-4">Seluruh desa sudah berstatus Mandiri.</td></tr>';
                return;
            }

            tbody.innerHTML = rows.map(d => {
                const st = d.status || 'Maju';
                const badgeCls = st === 'Mandiri'
                    ? 'bg-success-subtle text-success border-success-subtle'
                    : (st === 'Maju' ? 'bg-warning-subtle text-warning border-warning-subtle' : 'bg-info-subtle text-info border-info-subtle');

                const safeNama = String(d.nama_desa || '').replace(/\\/g, '\\\\').replace(/'/g, "\\'");
                const safeKec = String(d.nama_kec || '').replace(/\\/g, '\\\\').replace(/'/g, "\\'");
                const safeKom = String(d.komoditas || '').replace(/\\/g, '\\\\').replace(/'/g, "\\'");
                const safeFaskes = String(d.faskes || '').replace(/\\/g, '\\\\').replace(/'/g, "\\'");

                const canEdit = !IS_OPERATOR_DESA || String(d.nama_desa || '').toUpperCase() === OPERATOR_DESA_NAME;
                const actionBtn = canEdit
                    ? `<button type="button" onclick="editDesaData('${safeNama}', '${safeKec}', '${d.ipd}', '${st}', '${safeKom}', '${safeFaskes}', '${d.lat}', '${d.lng}')" class="btn btn-sm btn-outline-success rounded-pill px-2.5 py-0.5 fw-semibold" style="font-size: 11px;">Edit</button>`
                    : '<span class="text-muted font-mono-num" style="font-size: 11px;">-</span>';

                return `
                    <tr>
                        <td class="px-3">
                            <div class="fw-bold text-dark">${escapeAdminHtml(d.nama_desa)}</div>
                            <div class="text-muted" style="font-size: 11px;">Kec. ${escapeAdminHtml(d.nama_kec)}</div>
                        </td>
                        <td><span class="badge ${badgeCls} border rounded-pill px-2 py-0.5 fw-semibold">${escapeAdminHtml(st)}</span></td>
                        <td class="text-end fw-bold font-mono-num text-success">${Number(d.ipd || 0).toFixed(1)}</td>
                        <td class="text-muted text-truncate" style="max-width: 170px;">${escapeAdminHtml(d.komoditas || '-')}</td>
                        <td class="text-center px-3">${actionBtn}</td>
                    </tr>
                `;
            }).join('');
        }

        // =====================================================================
        // RINGKASAN AGREGAT PORTAL (/portal/agregat & /portal) EDITOR
        // =====================================================================
        function setPortalAggregateFormValues(vals) {
            if (!vals) return;
            const setVal = (id, v) => {
                const el = document.getElementById(id);
                if (el && v !== undefined && v !== null) el.value = v;
            };
            setVal('aggInputJudul', vals.judul_ringkasan ?? 'Ringkasan Agregat Kabupaten Kolaka Utara');
            setVal('aggInputSumber', vals.label_sumber ?? 'BPS PODES 2025');
            setVal('aggInputPendudukL', Number(vals.total_penduduk_l ?? 0));
            setVal('aggInputPendudukP', Number(vals.total_penduduk_p ?? 0));
            setVal('aggInputPendudukTotal', Number(vals.total_penduduk ?? 0));
            setVal('aggInputKepadatan', Number(vals.kepadatan_rata ?? 0).toFixed(1));
            setVal('aggInputTotalKecamatan', Number(vals.total_kecamatan ?? 15));
            setVal('aggInputTotalDesa', Number(vals.total_desa ?? 133));
            setVal('aggInputSexRatio', Number(vals.rasio_jenis_kelamin ?? 100).toFixed(1));
            setVal('aggInputImk', Number(vals.total_imk ?? 0));
            setVal('aggInputRasioListrik', Number(vals.rasio_listrik ?? 91.5).toFixed(2));
            setVal('aggInputPlnKk', Number(vals.total_pln_kk ?? 0));
            updatePortalAggregatePreview();
        }

        function onAggregateLPInput() {
            const pL = parseInt(document.getElementById('aggInputPendudukL')?.value || '0', 10) || 0;
            const pP = parseInt(document.getElementById('aggInputPendudukP')?.value || '0', 10) || 0;
            const totEl = document.getElementById('aggInputPendudukTotal');
            if (totEl) totEl.value = pL + pP;
            const sexEl = document.getElementById('aggInputSexRatio');
            if (sexEl && pP > 0) {
                sexEl.value = ((pL / pP) * 100).toFixed(1);
            }
            updatePortalAggregatePreview();
        }

        function calcAggregateTotalPenduduk() {
            const pL = parseInt(document.getElementById('aggInputPendudukL')?.value || '0', 10) || 0;
            const pP = parseInt(document.getElementById('aggInputPendudukP')?.value || '0', 10) || 0;
            const totEl = document.getElementById('aggInputPendudukTotal');
            if (totEl) totEl.value = pL + pP;
            updatePortalAggregatePreview();
        }

        function calcAggregateSexRatio() {
            const pL = parseInt(document.getElementById('aggInputPendudukL')?.value || '0', 10) || 0;
            const pP = parseInt(document.getElementById('aggInputPendudukP')?.value || '0', 10) || 0;
            const sexEl = document.getElementById('aggInputSexRatio');
            if (sexEl) {
                sexEl.value = pP > 0 ? ((pL / pP) * 100).toFixed(1) : '100.0';
            }
            updatePortalAggregatePreview();
        }

        function updatePortalAggregatePreview() {
            const pL = parseInt(document.getElementById('aggInputPendudukL')?.value || '0', 10) || 0;
            const pP = parseInt(document.getElementById('aggInputPendudukP')?.value || '0', 10) || 0;
            const pTot = parseInt(document.getElementById('aggInputPendudukTotal')?.value || '0', 10) || 0;
            const kep = parseFloat(document.getElementById('aggInputKepadatan')?.value || '0') || 0;
            const nKec = parseInt(document.getElementById('aggInputTotalKecamatan')?.value || '0', 10) || 0;
            const nDesa = parseInt(document.getElementById('aggInputTotalDesa')?.value || '0', 10) || 0;
            const sex = parseFloat(document.getElementById('aggInputSexRatio')?.value || '0') || 0;
            const imk = parseInt(document.getElementById('aggInputImk')?.value || '0', 10) || 0;
            const plnPct = parseFloat(document.getElementById('aggInputRasioListrik')?.value || '0') || 0;
            const judul = (document.getElementById('aggInputJudul')?.value || '').trim() || 'Ringkasan Agregat Kabupaten Kolaka Utara';
            const sumber = (document.getElementById('aggInputSumber')?.value || '').trim() || 'BPS PODES 2025';

            const setText = (id, text) => {
                const el = document.getElementById(id);
                if (el) el.textContent = text;
            };
            setText('aggPreviewJudul', judul);
            setText('aggPreviewSumber', sumber);
            setText('aggPreviewTotalPenduduk', pTot.toLocaleString('id-ID'));
            setText('aggPreviewLP', `L: ${pL.toLocaleString('id-ID')} \u2022 P: ${pP.toLocaleString('id-ID')}`);
            setText('aggPreviewKepadatan', kep.toFixed(1));
            setText('aggPreviewCakupan', `Cakupan ${nKec} Kecamatan / ${nDesa} Desa`);
            setText('aggPreviewSexRatio', sex.toFixed(1));
            setText('aggPreviewImk', imk.toLocaleString('id-ID'));
            setText('aggPreviewPln', `Listrik PLN: ${plnPct.toFixed(2)}%`);
        }

        function computeLiveKecamatanAggregateDefaults() {
            const base = (PORTAL_AGGREGATE_STATE && PORTAL_AGGREGATE_STATE.defaults)
                ? { ...PORTAL_AGGREGATE_STATE.defaults }
                : {};
            if (Array.isArray(KECAMATAN_DATA) && KECAMATAN_DATA.length > 0) {
                let l = 0, p = 0, tot = 0, imk = 0, pln = 0, desaCount = 0;
                KECAMATAN_DATA.forEach(k => {
                    const kL = Number(k.penduduk_l || 0);
                    const kP = Number(k.penduduk_p || 0);
                    l += kL;
                    p += kP;
                    tot += Number(k.penduduk_total || (kL + kP));
                    imk += Number(k.imk || 0);
                    pln += Number(k.pln_kk || 0);
                    desaCount += Number(k.desa_count || (Array.isArray(k.desaList) ? k.desaList.length : 0));
                });
                base.total_kecamatan = KECAMATAN_DATA.length;
                base.total_desa = desaCount || base.total_desa || 133;
                base.total_penduduk_l = l;
                base.total_penduduk_p = p;
                base.total_penduduk = tot || (l + p);
                base.rasio_jenis_kelamin = p > 0 ? Number(((l / p) * 100).toFixed(1)) : 100.0;
                base.total_imk = imk;
                base.total_pln_kk = pln;
            }
            return base;
        }

        function fillAggregateFromDefaults() {
            const defs = computeLiveKecamatanAggregateDefaults();
            setPortalAggregateFormValues(defs);
            showToast('Nilai form diisi ulang dari hitungan otomatis Master Kecamatan. Klik Simpan untuk mempublikasikan.');
        }

        async function savePortalAggregateData(e, action = 'save') {
            if (e) e.preventDefault();

            if (action === 'reset' && !confirm('Kembalikan seluruh angka Ringkasan Agregat Kabupaten agar dihitung otomatis dari Master Kecamatan?')) {
                return;
            }

            const btn = document.getElementById(action === 'reset' ? 'btnResetPortalAggregate' : 'btnSavePortalAggregate');
            const originalHtml = btn ? btn.innerHTML : '';
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Memproses...';
            }

            try {
                const payload = {
                    action,
                    judul_ringkasan: document.getElementById('aggInputJudul')?.value || '',
                    label_sumber: document.getElementById('aggInputSumber')?.value || '',
                    total_penduduk_l: parseInt(document.getElementById('aggInputPendudukL')?.value || '0', 10) || 0,
                    total_penduduk_p: parseInt(document.getElementById('aggInputPendudukP')?.value || '0', 10) || 0,
                    total_penduduk: parseInt(document.getElementById('aggInputPendudukTotal')?.value || '0', 10) || 0,
                    kepadatan_rata: parseFloat(document.getElementById('aggInputKepadatan')?.value || '0') || 0,
                    total_kecamatan: parseInt(document.getElementById('aggInputTotalKecamatan')?.value || '0', 10) || 0,
                    total_desa: parseInt(document.getElementById('aggInputTotalDesa')?.value || '0', 10) || 0,
                    rasio_jenis_kelamin: parseFloat(document.getElementById('aggInputSexRatio')?.value || '0') || 0,
                    total_imk: parseInt(document.getElementById('aggInputImk')?.value || '0', 10) || 0,
                    rasio_listrik: parseFloat(document.getElementById('aggInputRasioListrik')?.value || '0') || 0,
                    total_pln_kk: parseInt(document.getElementById('aggInputPlnKk')?.value || '0', 10) || 0
                };

                const res = await fetch('/admin/portal-agregat/save', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(payload)
                });
                const data = await res.json();

                if (res.ok && data.success) {
                    PORTAL_AGGREGATE_STATE = data.aggregate || PORTAL_AGGREGATE_STATE;
                    if (PORTAL_AGGREGATE_STATE && PORTAL_AGGREGATE_STATE.active) {
                        setPortalAggregateFormValues(PORTAL_AGGREGATE_STATE.active);
                    }
                    const badgeEl = document.getElementById('aggModeStatusBadge');
                    if (badgeEl) {
                        const isCustom = Boolean(PORTAL_AGGREGATE_STATE?.is_custom);
                        badgeEl.className = isCustom
                            ? 'badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2.5 py-1 fw-bold'
                            : 'badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fw-bold';
                        badgeEl.textContent = isCustom ? 'Mode Edit Manual Aktif' : 'Mode Hitung Otomatis';
                    }
                    const infoEl = document.getElementById('aggLastUpdatedInfo');
                    if (infoEl) {
                        if (PORTAL_AGGREGATE_STATE?.is_custom && PORTAL_AGGREGATE_STATE.updated_at) {
                            infoEl.innerHTML = `Diubah manual pada <strong>${escapeAdminHtml(PORTAL_AGGREGATE_STATE.updated_at)}</strong> oleh ${escapeAdminHtml(PORTAL_AGGREGATE_STATE.updated_by || 'Administrator')}`;
                        } else {
                            infoEl.textContent = 'Nilai saat ini dihitung otomatis dari akumulasi Master Kecamatan & data PODES 2025.';
                        }
                    }
                    showToast(data.message || 'Ringkasan Agregat Portal berhasil diperbarui!');
                } else {
                    alert(data.message || 'Gagal menyimpan Ringkasan Agregat Portal.');
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan jaringan saat menyimpan Ringkasan Agregat Portal.');
            } finally {
                if (btn) {
                    btn.disabled = false;
                    btn.innerHTML = originalHtml;
                }
            }
        }
    </script>
</body>
</html>
