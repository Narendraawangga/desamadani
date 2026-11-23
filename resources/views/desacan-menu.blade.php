<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DESCAN - Menu Utama Desa</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        bps: {
                            blue: '#005ea6',
                            dark: '#0b2545',
                            light: '#e0f2fe',
                        },
                        descan: {
                            teal: '#1b6b68',
                            cyan: '#2b7a78',
                            amber: '#d97706',
                            soft: '#f0f5fa',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Sistem Autentikasi Akun Resmi 6 Desa DESCAN -->
    <script src="/js/descan-auth.js"></script>
    <script>
        if (typeof DESCAN_ACCOUNTS === 'undefined') {
            document.write('<script src="js/descan-auth.js"><\/script>');
        }
    </script>

    <!-- Buku Panduan Pelatihan Excel Data (30 Lembar) -->
    <script src="/js/panduan-excel-data.js"></script>
    <script>
        if (typeof excelBookPages === 'undefined' && (typeof window === 'undefined' || !window.excelBookPages)) {
            document.write('<script src="js/panduan-excel-data.js"><\/script>');
        }
    </script>
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f6fa;
        }
        
        /* Profil Desa Modern Clean Editorial Styling */
        .dc-profil-card {
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 1.25rem;
            transition: all 0.2s ease;
        }
        .dc-profil-card:hover {
            border-color: #a7f3d0;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(15, 107, 74, 0.08);
        }
        .tilt-card-3d {
            transition: all 0.2s ease;
        }
        .tilt-card-3d:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(15, 107, 74, 0.08);
        }

        /* ===== DESCAN SIDEBAR THEME (Harmonized Light Style - Sinkron dengan Dashboard Desa) ===== */
        :root { 
            --dc-green:#0f6b4a; 
            --dc-green-dark:#0a4d36; 
            --dc-mint:#6ee7b7; 
            --dc-mint-bg:#ecfdf5; 
            --dc-line:#e5e9e7; 
            --dc-ink:#0f1f1a; 
            --dc-muted:#6b7a74;
            --dc-sidebar-w: 265px; 
        }
        body { background-color:#f4f7f5; }
        body.dc-shell { transition: padding-left .25s ease; }
        
        #dcSidebar { 
            position: fixed; 
            top: 0; 
            bottom: 0; 
            left: 0; 
            width: var(--dc-sidebar-w); 
            background: #ffffff; 
            border-right: 1px solid var(--dc-line); 
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            z-index: 50; 
            display: flex; 
            flex-direction: column; 
            box-shadow: 4px 0 24px rgba(15, 31, 26, 0.05);
            transition: transform .28s cubic-bezier(0.16, 1, 0.3, 1), box-shadow .28s ease; 
        }
        @media (min-width: 1024px) {
            body.dc-shell { padding-left: var(--dc-sidebar-w) !important; }
            body.dc-shell.sidebar-collapsed { padding-left: 0 !important; }
            #dcSidebar { transform: translateX(0); }
            body.dc-shell.sidebar-collapsed #dcSidebar { transform: translateX(-100%) !important; }
        }
        @media (max-width: 1023px) { 
            #dcSidebar { transform: translateX(-100%); border-radius: 0 20px 20px 0; } 
            #dcSidebar.open { transform: translateX(0); box-shadow: 0 0 50px rgba(0,0,0,.25); } 
        }

        /* ============================================================== */
        /* MODERN FLOW UI SIDEBAR - ATTRACTIVE 3D & HARMONIZED STYLING    */
        /* ============================================================== */
        #dcSidebar { 
            position: fixed; 
            top: 0; 
            bottom: 0; 
            left: 0; 
            width: var(--dc-sidebar-w); 
            background: linear-gradient(180deg, #ffffff 0%, #fbfdfc 60%, #f2f7f4 100%); 
            border-right: 1px solid rgba(15, 107, 74, 0.12); 
            border-top-right-radius: 24px;
            border-bottom-right-radius: 24px;
            z-index: 50; 
            display: flex; 
            flex-direction: column; 
            box-shadow: 4px 0 28px -4px rgba(15, 31, 26, 0.06), 1px 0 3px rgba(15, 31, 26, 0.02);
            transition: transform .28s cubic-bezier(0.16, 1, 0.3, 1), box-shadow .28s ease; 
        }

        /* ============================================================== */
        /* MINIMALIST MODERN SIDEBAR - CLEAN, COMPACT & REFINED           */
        /* ============================================================== */
        /* Section Heading Labels (Aligned with menu item padding px-3) */
        .dc-nav-label { 
            display: flex; 
            align-items: center; 
            gap: 0.45rem; 
            font-size: 9.5px; 
            font-weight: 800; 
            letter-spacing: 0.1em; 
            text-transform: uppercase; 
            color: #0f6b4a; 
            padding: 0 0.65rem !important; 
            margin-top: 0.65rem !important; /* Dirapatkan dari 1.5rem (24px) ke ~10px */
            margin-bottom: 0.18rem !important; 
        }
        .dc-nav-label:first-child, .dc-nav-label.mt-first { 
            margin-top: 0.25rem !important; 
        }
        .dc-nav-label::before { 
            content: ""; 
            width: 10px; 
            height: 2px; 
            border-radius: 99px; 
            background: #10b981; 
            flex-shrink: 0; 
        }

        /* Nav Tab & Action Items: Padding vertikal kompak py-1.5 px-2.5 & margin rapat */
        .nav-tab, .dc-nav-item {
            display: flex !important; 
            align-items: center !important; 
            gap: 0.6rem !important; /* gap-2.5 antara kotak ikon dan teks label */
            width: 100% !important; 
            text-align: left !important;
            padding: 0.35rem 0.65rem !important; /* py-1.5 px-2.5 kompak anti-terpotong */
            border-radius: 0.55rem !important; /* rounded-lg */
            margin-bottom: 0.15rem !important; /* space-y rapat */
            font-size: 0.815rem !important; /* ~13px tajam terbaca */
            font-weight: 500 !important; 
            color: #334155 !important;
            background: transparent !important; 
            border: 1px solid transparent !important; 
            cursor: pointer !important; 
            transition: all .16s ease-in-out !important;
            position: relative !important;
            box-shadow: none !important;
            transform: none !important;
        }

        /* 1. Kotak Ikon Menu: 25px x 25px, rounded-lg (7px), Flat & Modern */
        .dc-ico { 
            width: 25px !important; 
            height: 25px !important; 
            min-width: 25px !important;
            border-radius: 7px !important; 
            display: inline-flex !important; 
            align-items: center !important; 
            justify-content: center !important; 
            flex-shrink: 0 !important; 
            background: #ecfdf5 !important; 
            border: 1px solid #d1fae5 !important; 
            box-shadow: none !important; 
            color: #0f6b4a !important; 
            transition: all .16s ease-in-out !important; 
        }
        .dc-ico i, .dc-ico svg { 
            font-size: 13px !important; 
            width: 13px !important;
            height: 13px !important;
            line-height: 1 !important; 
            display: flex !important; 
            align-items: center !important; 
            justify-content: center !important; 
            color: inherit !important;
            transition: transform .16s ease, color .16s ease !important;
        }

        /* Hover State */
        .nav-tab:hover:not(.active), .dc-nav-item:hover { 
            background: #f1f5f9 !important; /* Soft neutral / slate hover */
            color: #0f6b4a !important; 
            border-color: transparent !important;
            box-shadow: none !important;
            transform: none !important;
        }
        .nav-tab:hover:not(.active) .dc-ico, .dc-nav-item:hover .dc-ico { 
            background: #e2f7ed !important; 
            border-color: #a7f3d0 !important;
            color: #065f46 !important; 
            box-shadow: none !important;
        }
        .nav-tab:hover:not(.active) .dc-ico i, .dc-nav-item:hover .dc-ico i {
            transform: scale(1.1) !important;
        }

        /* Active State: Kotak Ikon Hijau Solid & Full-Row Soft Green Background */
        .nav-tab.active { 
            background: #ecfdf5 !important; /* Hijau sangat lembut (emerald-50) */
            color: #065f46 !important; /* Teks hijau tua semi-bold */
            font-weight: 600 !important; 
            border: 1px solid #d1fae5 !important; 
            box-shadow: none !important; 
            transform: none !important;
        }
        .nav-tab.active .dc-ico { 
            background: #0f6b4a !important; /* Hijau solid hanya untuk menu aktif */
            color: #ffffff !important; /* Ikon putih */
            border: 1px solid #0f6b4a !important;
            box-shadow: 0 2px 6px rgba(15, 107, 74, 0.22) !important;
        }
        .nav-tab.active .dc-ico i {
            color: #ffffff !important;
        }
        .nav-tab.active .dc-caret {
            color: #0f6b4a !important;
        }
        .nav-tab.active::after {
            display: none !important;
        }

        /* Active Parent State (Saat Submenu Dipilih) */
        .nav-tab.has-active { 
            background: #f0fdf4 !important; 
            color: #065f46 !important; 
            font-weight: 600 !important;
            border: 1px solid #dcfce7 !important; 
            box-shadow: none !important;
        }
        .nav-tab.has-active .dc-ico { 
            background: #0f6b4a !important; 
            color: #ffffff !important; 
            border: 1px solid #0f6b4a !important;
            box-shadow: 0 2px 6px rgba(15, 107, 74, 0.22) !important;
        }
        .nav-tab.has-active .dc-ico i {
            color: #ffffff !important;
        }
        .nav-tab.has-active .dc-caret {
            color: #0f6b4a !important;
        }

        /* Caret for collapsible menu */
        .dc-caret { 
            margin-left: auto; 
            font-size: .75rem; 
            color: #94a3b8; 
            transition: transform .2s ease, color .2s ease; 
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .dc-caret.open { transform: rotate(180deg); color: #0f6b4a; }

        /* Submenu Items (Indented with Connecting Line) */
        .dc-sub { 
            margin: .25rem 0 .4rem 1.25rem !important; 
            padding-left: .75rem !important; 
            border-left: 1.5px solid #d1fae5 !important; 
        }
        .dc-sub-item { 
            display: flex !important; 
            align-items: center !important; 
            gap: .5rem !important; 
            width: 100% !important; 
            text-align: left !important; 
            padding: .45rem .65rem !important; 
            border-radius: .5rem !important; 
            font-size: .8rem !important; 
            font-weight: 500 !important; 
            color: #64748b !important; 
            background: transparent !important; 
            border: 1px solid transparent !important; 
            cursor: pointer !important; 
            margin-bottom: .15rem !important; 
            transition: all .18s ease !important; 
        }
        .dc-sub-item i {
            transition: transform .18s ease, color .18s ease !important;
        }
        .dc-sub-item:hover { 
            background: #f1f5f9 !important; 
            color: #0f6b4a !important; 
            transform: translateX(3px) !important;
        }
        .dc-sub-item:hover i {
            color: #0f6b4a !important;
            transform: scale(1.15) !important;
        }
        .dc-sub-item.active { 
            background: #ecfdf5 !important; 
            color: #065f46 !important; 
            font-weight: 600 !important; 
            border-color: #d1fae5 !important;
        }
        .dc-sub-item.active i {
            color: #0f6b4a !important;
        }
        /* Custom Modern Scrollbar for Sidebar Links */
        #topNavMenuLinks::-webkit-scrollbar { width: 4px; }
        #topNavMenuLinks::-webkit-scrollbar-track { background: transparent; }
        #topNavMenuLinks::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 99px; }
        #topNavMenuLinks::-webkit-scrollbar-thumb:hover { background: #0f6b4a; }
        .dc-topbar { background:#fff; border-bottom:1px solid var(--dc-line); position:sticky; top:0; z-index:40; }
        .dc-pill { display:inline-flex; align-items:center; gap:.4rem; background:var(--dc-mint-bg); color:var(--dc-green); border:1px solid #b7e8d0; border-radius:999px; padding:.3rem .8rem; font-size:12px; font-weight:600; }
        .dc-hero { background:linear-gradient(135deg,#0a4d36 0%,#0f6b4a 55%,#0c5a3f 100%); color:#fff; border-radius:1rem; padding:2rem; position:relative; overflow:hidden; }
        .dc-hero::after { content:""; position:absolute; right:-80px; top:-80px; width:280px; height:280px; border-radius:50%; background:rgba(110,231,183,.08); }
        .dc-chip { display:inline-flex; align-items:center; gap:.4rem; font-size:10px; font-weight:700; letter-spacing:.05em; text-transform:uppercase; background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.18); border-radius:999px; padding:.25rem .7rem; }
        .dc-status-card { background:rgba(255,255,255,.09); border:1px solid rgba(255,255,255,.16); border-radius:.9rem; padding:1.1rem 1.25rem; position:relative; z-index:1; }
        .dc-btn-mint { background:#6ee7b7; color:#053b28; font-weight:700; border-radius:.75rem; padding:.6rem 1rem; font-size:13px; display:inline-flex; align-items:center; gap:.5rem; cursor:pointer; border:0; }
        .dc-btn-mint:hover { background:#86efc5; }
        .dc-btn-ghost { background:rgba(255,255,255,.12); color:#fff; font-weight:600; border:1px solid rgba(255,255,255,.2); border-radius:.75rem; padding:.6rem 1rem; font-size:13px; display:inline-flex; align-items:center; gap:.5rem; cursor:pointer; }
        .dc-btn-ghost:hover { background:rgba(255,255,255,.2); }
        .dc-card { background:#fff; border:1px solid var(--dc-line); border-radius:1rem; padding:1.1rem 1.25rem; }
        .dc-icon { width:36px; height:36px; border-radius:10px; display:flex; align-items:center; justify-content:center; background:var(--dc-mint-bg); color:var(--dc-green); font-size:1rem; flex-shrink:0; }
        .dc-tag { font-size:10px; font-weight:700; padding:.15rem .55rem; border-radius:999px; background:var(--dc-mint-bg); color:var(--dc-green); }
        .dc-kpi-label { font-size:12px; color:var(--dc-muted); margin-top:.9rem; }
        .dc-kpi-value { font-size:1.5rem; font-weight:800; letter-spacing:-.02em; line-height:1.2; }
        .dc-kpi-foot { font-size:11px; color:var(--dc-muted); display:flex; justify-content:space-between; margin-top:.6rem; }
        .dc-progress { height:5px; background:#e7ece9; border-radius:99px; overflow:hidden; }
        .dc-progress > span { display:block; height:100%; border-radius:99px; }
        .dc-eyebrow { font-size:10px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--dc-green); }
        .dc-pilar-no { font-size:10px; font-weight:700; letter-spacing:.06em; color:var(--dc-muted); margin-top:.9rem; }
        .dc-pilar-title { font-size:.95rem; font-weight:700; margin:.15rem 0 .4rem; }
        .dc-pilar-desc { font-size:11.5px; color:var(--dc-muted); line-height:1.55; }
        .dc-link { font-size:11px; font-weight:600; color:var(--dc-green); cursor:pointer; }
        .dc-quick { display:block; width:100%; text-align:left; background:#f6f9f7; border:1px solid transparent; border-radius:.8rem; padding:.8rem; color:var(--dc-ink); transition:.15s; cursor:pointer; }
        .dc-quick:hover { border-color:#b7e8d0; background:#eff8f3; }
        .dc-quick .dc-icon { background:var(--dc-green-dark); color:#fff; margin-bottom:.6rem; }
        .dc-quick b { font-size:12.5px; display:block; line-height:1.3; }
        .dc-quick small { font-size:11px; color:var(--dc-muted); }
        .dc-agenda { border-left:3px solid var(--dc-green); background:#f6f9f7; border-radius:.6rem; padding:.7rem .9rem; margin-bottom:.6rem; }
        .dc-agenda.biru { border-left-color:#3b82f6; } .dc-agenda.amber { border-left-color:#f59e0b; }
        .dc-agenda .jenis { font-size:10px; font-weight:700; letter-spacing:.05em; color:var(--dc-muted); display:flex; justify-content:space-between; }
        .dc-agenda b { font-size:12.5px; display:block; margin:.15rem 0; } .dc-agenda small { font-size:11px; color:var(--dc-muted); }
        .dc-help { background:linear-gradient(135deg,#0a4d36,#0f6b4a); color:#fff; border-radius:1rem; padding:1.1rem 1.25rem; }
        .dc-avatar { width:34px; height:34px; border-radius:50%; background:#dff3e8; color:var(--dc-green-dark); font-weight:700; font-size:11px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
        .m-nav-tab.active {
            background: linear-gradient(135deg, #0284c7 0%, #005ea6 100%) !important;
            color: #ffffff !important;
            font-weight: 800 !important;
            border-radius: 9999px !important;
            box-shadow: 0 2px 10px rgba(0, 94, 166, 0.3) !important;
            border: none !important;
        }
        .m-nav-tab {
            padding: 0.4rem 0.85rem !important;
            border-radius: 9999px !important;
            transition: all 0.2s ease !important;
            border: none !important;
            color: #bfdbfe !important;
        }
        .custom-card {
            background: #ffffff;
            border-radius: 1.5rem;
            border: 1px solid rgba(226, 232, 240, 0.95);
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.04);
            transition: all 0.25s ease;
        }
                /* 3D Visual & Tropical Depth Styles (Inspired by Nature Destination Design) */
        @keyframes float-leaf {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-7px) rotate(1.5deg); }
        }
        .animate-float-leaf {
            animation: float-leaf 6s ease-in-out infinite;
        }
        .card-3d {
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card-3d:hover {
            transform: translateY(-8px) scale(1.015);
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.16);
        }
        .glass-capsule-3d {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.95);
            box-shadow: 0 20px 50px -10px rgba(15, 23, 42, 0.12), 0 0 0 1px rgba(255, 255, 255, 0.8) inset;
        }

        .custom-card:hover {
            box-shadow: 0 12px 28px -4px rgba(15, 23, 42, 0.07);
        }
        @media print {
            header, footer, .no-print, #topBrandRow {
                display: none !important;
            }
            body {
                background: white !important;
            }
            .custom-card {
                box-shadow: none !important;
                border: 1px solid #ccc !important;
            }
            .menu-view-container:not(.hidden) {
                display: block !important;
            }
        }
    </style>
    <!-- Local Leaflet CSS & JS for Thematic Spasial Map -->
    <link rel="stylesheet" href="/vendor/leaflet/leaflet.css" />
    <script src="/vendor/leaflet/leaflet.js"></script>
    <script>
        if (typeof L === 'undefined') {
            document.write('<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"><\/script>');
        }
    </script>

    <!-- Chart.js for Interactive Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap Icons (CDN Resmi v1.11.3) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="dc-shell min-h-screen text-slate-800 flex flex-col justify-between selection:bg-teal-100 selection:text-teal-900">

    <!-- ===== SIDEBAR DESCAN (Harmonized Light Style - Sinkron Sempurna dengan Dashboard) ===== -->
    <div id="dcBackdrop" onclick="toggleDcSidebar()" class="hidden fixed inset-0 bg-black/40 backdrop-blur-2xs z-40 lg:hidden"></div>
    <aside id="dcSidebar">
        <!-- 1. Header Sidebar: Penempatan Logo BPS & Kolaka Utara + Tombol Tutup Sidebar -->
        <div class="px-3.5 py-3.5 flex items-center justify-between border-b border-[#e5e9e7] bg-gradient-to-r from-emerald-50/50 via-white to-white relative">
            <div class="flex items-center gap-2 bg-white/95 px-2.5 py-1.5 rounded-2xl border border-slate-200/90 shadow-2xs shrink-0 ring-1 ring-slate-900/5">
                <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-7 w-auto object-contain" title="Pemerintah Kabupaten Kolaka Utara">
                <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-7 w-auto object-contain" title="Badan Pusat Statistik Kolaka Utara">
                <div class="h-5 w-[1px] bg-slate-200"></div>
                <img src="/logo-descan.png" alt="Desa Cantik" class="h-7 w-auto object-contain" title="Desa Cantik - Desa Cinta Statistik">
            </div>
            
            <!-- Tombol Tutup/Sembunyikan Sidebar di Ujung Sidebar (<) -->
            <button type="button" onclick="toggleDcSidebar()" id="btnSidebarClose" 
                class="w-7 h-7 rounded-xl border border-slate-200/90 hover:border-emerald-300 bg-white hover:bg-emerald-50 text-slate-400 hover:text-emerald-700 flex items-center justify-center transition shadow-2xs active:scale-95 cursor-pointer shrink-0 ml-1" 
                title="Tutup / Sembunyikan Sidebar">
                <i class="bi bi-chevron-left text-xs font-black"></i>
            </button>
        </div>

        <!-- 2. Daftar Menu Navigasi Sidebar (Modern Flow UI Light Style - Rapi, Terstruktur, Terbaca Jelas) -->
        <div id="topNavMenuLinks" class="flex-1 overflow-y-auto px-2.5 py-1.5 space-y-0.5">
            <div class="dc-nav-label mt-first">Menu Utama</div>
            <button type="button" onclick="switchNavMenu('dashboard')" id="nav-dashboard" class="nav-tab active">
                <span class="dc-ico"><i class="bi bi-house-door-fill"></i></span>
                <span>Beranda</span>
            </button>
            <button type="button" onclick="switchNavMenu('tentang')" id="nav-tentang" class="nav-tab">
                <span class="dc-ico"><i class="bi bi-buildings-fill"></i></span>
                <span>Profil Desa</span>
            </button>
            <button type="button" onclick="openGaleriDesaModal()" id="nav-galeri" class="nav-tab">
                <span class="dc-ico"><i class="bi bi-images"></i></span>
                <span>Galeri Foto</span>
            </button>

            <!-- 1. KAPASITAS & EDUKASI -->
            <div class="dc-nav-label">Kapasitas &amp; Edukasi</div>
            <button type="button" onclick="toggleMateriMenu()" id="nav-pembelajaran" class="nav-tab">
                <span class="dc-ico"><i class="bi bi-book-half"></i></span>
                <span>Materi Pembelajaran</span>
                <span id="dcMateriCaret" class="dc-caret"><i class="bi bi-chevron-down"></i></span>
            </button>
            <div id="dcMateriSub" class="dc-sub hidden">
                <button type="button" onclick="switchNavMenu('video')" id="sub-video" class="dc-sub-item">
                    <i class="bi bi-play-circle-fill text-xs mr-1 text-emerald-600"></i>
                    <span>Video Tutorial</span>
                </button>
                <button type="button" onclick="switchNavMenu('pretest')" id="sub-pretest" class="dc-sub-item">
                    <i class="bi bi-patch-question-fill text-xs mr-1 text-emerald-600"></i>
                    <span>Pre-test &amp; Post-test</span>
                </button>
                <button type="button" onclick="switchNavMenu('buku')" id="sub-buku" class="dc-sub-item">
                    <i class="bi bi-journal-bookmark-fill text-xs mr-1 text-emerald-600"></i>
                    <span>Buku Panduan</span>
                </button>
            </div>

            <!-- 2. ADMINISTRASI & PENGISIAN DATA PODES -->
            <div class="dc-nav-label">Administrasi &amp; Data</div>
            <button type="button" onclick="switchNavMenu('podes')" id="nav-podes" class="nav-tab dc-nav-item">
                <span class="dc-ico"><i class="bi bi-pencil-square"></i></span>
                <span>Pengisian Data PODES</span>
            </button>
            <button type="button" onclick="switchNavMenu('monitoring')" id="nav-monitoring" class="nav-tab">
                <span class="dc-ico"><i class="bi bi-clipboard-data-fill"></i></span>
                <span>Monitoring</span>
            </button>
            <button type="button" onclick="switchNavMenu('publikasi')" id="nav-publikasi" class="nav-tab">
                <span class="dc-ico"><i class="bi bi-file-earmark-bar-graph-fill"></i></span>
                <span>Publikasi &amp; Infografis</span>
            </button>

            <!-- 3. LAYANAN -->
            <div class="dc-nav-label">Layanan</div>
            <button type="button" onclick="openPstModal()" class="dc-nav-item">
                <span class="dc-ico"><i class="bi bi-headset"></i></span>
                <span>Layanan PST</span>
            </button>
        </div>

        <!-- 3. Footer Sidebar: Mini Status SDI, Akses Kembali ke 6 Desa & Keluar Akun (Solid White & Anti-Overlap) -->
        <div class="p-2.5 border-t border-slate-200 bg-white space-y-1.5 shrink-0 z-20 relative rounded-br-[24px]">
            <!-- Mini Live Status Satu Data Indonesia -->
            <div class="px-2.5 py-1.5 rounded-xl bg-emerald-50/80 border border-emerald-500/20 shadow-2xs flex items-center justify-between">
                <div class="flex items-center gap-2 min-w-0">
                    <div class="w-2 h-2 rounded-full bg-emerald-500 animate-ping shrink-0"></div>
                    <div class="truncate leading-tight">
                        <div class="text-[9.5px] font-extrabold text-emerald-950 uppercase tracking-wider">Satu Data Indonesia</div>
                        <div class="text-[8.5px] text-emerald-700 font-medium">BPS Kolaka Utara 2026</div>
                    </div>
                </div>
                <span class="text-[8.5px] font-black text-emerald-800 bg-emerald-100/90 border border-emerald-300/80 px-1.5 py-0.5 rounded-full shrink-0">Aktif</span>
            </div>

            <a href="/descan" onclick="exitToDescanDashboard(event)" class="w-full flex items-center justify-center gap-2 text-[11.5px] font-bold text-slate-700 hover:text-emerald-800 bg-white hover:bg-emerald-50/90 border border-slate-200/90 hover:border-emerald-300 rounded-xl py-1.5 cursor-pointer transition shadow-2xs hover:shadow-xs group active:scale-98">
                <i class="bi bi-grid-3x3-gap-fill text-xs text-emerald-600 group-hover:scale-110 transition-transform"></i>
                <span>Kembali ke 6 Desa</span>
            </a>
            <button type="button" onclick="logoutFromMenu()" class="w-full flex items-center justify-center gap-2 text-[11.5px] font-bold text-rose-700 hover:text-rose-800 bg-rose-50/80 hover:bg-rose-100 border border-rose-200/90 rounded-xl py-1.5 cursor-pointer transition shadow-2xs group active:scale-98">
                <i class="bi bi-box-arrow-right text-xs text-rose-600 group-hover:translate-x-0.5 transition-transform"></i>
                <span>Keluar Akun</span>
            </button>
        </div>
    </aside>

    <!-- Tombol Buka Sidebar (>) Muncul di Ujung Kiri saat Sidebar Tertutup -->
    <button type="button" id="btnFloatingSidebarOpen" onclick="toggleDcSidebar()" 
        class="hidden fixed left-0 top-14 sm:top-16 z-40 bg-white hover:bg-emerald-50 text-[#0f6b4a] border-y border-r border-emerald-300 shadow-lg py-3 px-2.5 rounded-r-2xl transition-all duration-300 cursor-pointer active:scale-95 group flex items-center gap-1.5" 
        title="Buka Sidebar Navigasi">
        <i class="bi bi-chevron-right text-sm font-black text-emerald-600 group-hover:translate-x-0.5 transition-transform"></i>
        <span class="text-[10px] font-black uppercase tracking-wider text-emerald-800 pr-1 hidden sm:inline">Menu</span>
    </button>

    <!-- ===== TOPBAR HEADER DESA (BERSIH & TERTATA) ===== -->
    <header class="dc-topbar px-3 sm:px-6 py-2.5 flex items-center justify-between gap-3 shadow-2xs">
        <!-- Sisi Kiri: Tombol Toggle Mobile & Tombol Beranda (Bersih Tanpa Gambar) -->
        <div class="flex items-center gap-2.5 sm:gap-3.5 min-w-0">


            <!-- Identitas Portal Desa & Kartu Akun Desa Aktif di Header (Menggantikan Tulisan Desa Cantik) -->
            <div class="flex items-center gap-2 sm:gap-2.5 min-w-0">
                <span class="text-xs sm:text-sm font-extrabold text-slate-900 tracking-tight hidden lg:inline">Portal Satu Data</span>
                <span class="text-slate-300 hidden lg:inline">•</span>
                
                <!-- Identitas Wilayah Desa Aktif (Hanya Teks & Icon Bootstrap Tanpa Kata AKUN) -->
                <div class="min-w-0 leading-tight py-0.5">
                    <div class="flex items-center gap-1.5 text-xs sm:text-[13px] font-extrabold text-slate-900 uppercase tracking-tight truncate">
                        <i class="bi bi-buildings-fill text-emerald-700 text-xs shrink-0"></i>
                        <span id="topBrandDesaTitle" class="truncate">DESA LAPOLU</span>
                    </div>
                    <div id="topBrandDesaKec" class="text-[9px] sm:text-[10px] font-semibold text-slate-500 truncate">(Kec. Tiwu) • Terbina BPS</div>
                </div>
            </div>
        </div>

        <!-- Sisi Kanan: Status SDI & Profil Ringkas Operator (Menu Teks Bersih Tanpa Kotak Hijau) -->
        <div class="flex items-center gap-2 sm:gap-4 shrink-0">
            <!-- Menu Output Desa di Header (Hanya Menu Teks) -->
            <button type="button" onclick="switchNavMenu('output')" id="header-nav-output" 
                class="text-xs sm:text-[13px] font-bold text-slate-600 hover:text-slate-900 transition px-2 py-1 cursor-pointer" 
                title="Buka Dokumen Output Desa">
                <span>Output Desa</span>
            </button>

            <!-- Menu Galeri di Header -->
            <button type="button" onclick="openGaleriDesaModal()" id="header-nav-galeri" 
                class="flex items-center gap-1.5 text-xs sm:text-[13px] font-bold text-slate-600 hover:text-[#0f6b4a] hover:bg-emerald-50 transition px-2.5 py-1.5 rounded-xl cursor-pointer" 
                title="Buka Halaman Galeri Foto Desa">
                <i class="bi bi-images text-emerald-600 text-xs"></i>
                <span>Galeri</span>
            </button>

            <!-- Status Satu Data Indonesia (Hanya Teks Bersih) -->
            <div class="hidden sm:flex items-center gap-1.5 text-xs sm:text-[13px] font-bold text-slate-600 px-2 py-1">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Satu Data Indonesia</span>
            </div>

            <!-- Profil Ringkas Operator Desa -->
            <div class="flex items-center gap-2 pl-1 sm:pl-2 sm:border-l sm:border-slate-200">
                <div class="hidden md:block text-right leading-tight">
                    <div class="text-xs font-bold text-slate-800">Operator Desa</div>
                    <div class="text-[10px] text-slate-500 font-medium">Admin Data Presisi</div>
                </div>
                <div class="w-8 h-8 rounded-full bg-[#083b2a] text-white font-bold text-xs flex items-center justify-center ring-2 ring-emerald-500/20 shadow-xs">
                    AD
                </div>
            </div>

        </div>
    </header>
    <!-- ============================================================== -->
    <!-- DEDICATED LOGIN GATE PER DESA                                  -->
    <!-- Setiap desa memiliki akun login terpisah (email & sandi unik)  -->
    <!-- ============================================================== -->
    <div id="villageLoginGate" class="hidden w-full max-w-xl mx-auto px-4 py-8 sm:py-12 my-auto flex-1 flex flex-col justify-center animate-in fade-in zoom-in duration-200">
        <div class="bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden">
            
            <!-- Gate Header Banner -->
            <div class="bg-gradient-to-r from-[#0b2545] via-[#005ea6] to-[#0b2545] text-white p-6 relative">
                <div class="flex items-center gap-2 text-[10px] font-black tracking-widest uppercase text-amber-300">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span>Autentikasi Mandiri Desa • BPS DESCAN</span>
                </div>
                <h2 id="gateDesaTitle" class="text-xl sm:text-2xl font-black text-white mt-1">
                    Login Akses Desa
                </h2>
                <p class="text-xs text-blue-100/90 mt-1">
                    Setiap desa memiliki akun terpisah. Masukkan email dan sandi resmi untuk membuka dashboard menu desa ini.
                </p>
            </div>

            <!-- Target Village Identity Card -->
            <div class="p-6 space-y-4">
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-center gap-3.5">
                    <img id="gateDesaAvatar" src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=200&q=80" alt="Foto Desa" class="w-14 h-14 rounded-2xl object-cover border-2 border-emerald-500 shadow-sm shrink-0">
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 id="gateDesaName" class="text-base font-black text-slate-900 leading-tight">Desa Kalu Kaluku</h3>
                            <span class="px-2 py-0.5 rounded-md bg-emerald-100 text-emerald-800 text-[10px] font-extrabold">Terbina BPS</span>
                        </div>
                        <p id="gateDesaRep" class="text-xs font-semibold text-slate-600 mt-0.5">
                            Pemerintah Desa Kalu Kaluku • Admin Resmi
                        </p>
                        <p id="gateDesaKecamatan" class="text-[10px] text-slate-400 font-medium">
                            Kec. Kodeoha • Kab. Kolaka Utara
                        </p>
                    </div>
                </div>

                <!-- 1-Click Fast Access & Direct Viewer Bypass Button -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 p-3 rounded-2xl bg-amber-50 border border-amber-200 text-xs">
                    <button type="button" onclick="autoFillGateTarget()" class="py-2 px-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-black text-xs shadow-xs hover:shadow transition flex items-center justify-center gap-1.5">
                        <i class="bi bi-lightning-charge-fill text-slate-950"></i>
                        <span>Isi Sandi Resmi</span>
                    </button>
                    <button type="button" onclick="bypassGateAsViewer()" class="py-2 px-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-black text-xs shadow-xs hover:shadow transition flex items-center justify-center gap-1.5">
                        <i class="bi bi-eye-fill text-white"></i>
                        <span>Buka Langsung (Tamu)</span>
                    </button>
                </div>

                <!-- Form Login Gate -->
                <form id="gateLoginForm" onsubmit="handleGateLoginSubmit(event)" class="space-y-4">
                    <!-- Error Banner -->
                    <div id="gateLoginError" class="hidden p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs flex items-center gap-2">
                        <svg class="w-4 h-4 shrink-0 text-rose-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        <span id="gateLoginErrorText">Email atau kata sandi tidak cocok untuk desa ini.</span>
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="gateInputEmail" class="block text-xs font-bold text-slate-700 mb-1">
                            Email Akun Resmi Desa Ini
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 text-xs">
                                <i class="bi bi-envelope-fill"></i>
                            </span>
                            <input type="email" id="gateInputEmail" required placeholder="admin.nama_desa@descan.bps.go.id" class="w-full pl-9 pr-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] focus:border-transparent transition bg-slate-50 focus:bg-white">
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="gateInputPassword" class="block text-xs font-bold text-slate-700 mb-1">
                            Kata Sandi (Password) Desa Ini
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 text-xs">
                                <i class="bi bi-lock-fill"></i>
                            </span>
                            <input type="password" id="gateInputPassword" required placeholder="Masukkan kata sandi desa" class="w-full pl-9 pr-10 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] focus:border-transparent transition bg-slate-50 focus:bg-white">
                            <button type="button" onclick="togglePasswordVisibility('gateInputPassword')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 text-xs cursor-pointer" title="Lihat/Sembunyikan Sandi">
                                <i id="gateEyeIcon" class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-[#005ea6] to-[#0b2545] hover:from-[#004e8a] hover:to-[#081b33] text-white font-black text-xs shadow-md hover:shadow-lg transition flex items-center justify-center gap-2 transform active:scale-98">
                        <span>Buka Dashboard Desa Sekarang</span>
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </form>

                <div class="pt-2 text-center">
                    <a href="/descan" onclick="exitToDescanDashboard(event)" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-[#005ea6] transition">
                        <i class="bi bi-arrow-left"></i>
                        <span>Kembali ke Pilihan 6 Desa Binaan</span>
                    </a>
                </div>

            </div>
            
            <div class="p-3.5 bg-slate-100 border-t border-slate-200 text-center text-[11px] text-slate-500 font-medium">
                Badan Pusat Statistik (BPS) • Sistem Proteksi Multi-Akun DESCAN
            </div>
        </div>
    </div>

    <!-- MAIN CONTAINER (Revealed ONLY after authentication for this village) -->
        <!-- MAIN CONTENT AREA (BERSIH, TANPA SIDEBAR BERULANG, 100% LEGA & MODERN) -->
    <main id="mainMenuContent" class="w-full flex-1 bg-[#f4f6f9] py-5 sm:py-6">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

                <!-- ===================================================================== -->
                <!-- 1. BERANDA (DASHBOARD UTAMA & POTENSI DESA)                            -->
                <!-- ===================================================================== -->
                <div id="view-dashboard" class="menu-view-container space-y-4 animate-in fade-in duration-200">

                <!-- =============== BERANDA BARU (DESCAN) =============== -->
                <div id="dcHome" class="space-y-5">

                    <!-- HERO -->
                    <div class="dc-hero">
                        <div class="grid lg:grid-cols-3 gap-6 items-center">
                            <div class="lg:col-span-2 relative z-[1]">
                                <span class="dc-chip mb-3"><span style="color:#6ee7b7;font-size:8px;">●</span> Desa Binaan BPS Aktif 2026 <span style="opacity:.5;">•</span> Kecamatan Kodeoha</span>
                                <h2 class="text-2xl sm:text-3xl font-extrabold mt-2 mb-2" style="letter-spacing:-.02em;">Selamat Datang di Desa Cantik</h2>
                                <p class="text-[13px] leading-[1.7] opacity-90 mb-4 max-w-[640px]">Desa Cantik (Desa Cinta Statistik) merupakan program pembinaan untuk meningkatkan kapasitas aparatur desa dalam pengelolaan dan pemanfaatan data statistik. Melalui platform ini, pengguna dapat mengakses materi pembelajaran, video tutorial, buku panduan, serta mengikuti evaluasi melalui pre-test dan post-test. Mari wujudkan desa yang sadar statistik, memiliki data berkualitas, dan mampu memanfaatkan informasi sebagai dasar pembangunan desa.</p>
                                <div class="flex flex-wrap gap-2">
                                    <button type="button" onclick="openManageDataModal('kpi')" class="dc-btn-mint">✎ Lanjutkan Data PODES</button>
                                    <button type="button" onclick="switchNavMenu('buku')" class="dc-btn-ghost"><i class="bi bi-journal-text text-sm mr-1"></i> Unduh Buku Panduan</button>
                                </div>
                            </div>
                            <div class="dc-status-card">
                                <div class="flex justify-between items-center mb-2"><span class="text-[10px] font-bold tracking-wider opacity-70">STATUS BINAAN</span><span class="dc-tag" style="background:#6ee7b7;color:#053b28;">Terdaftar</span></div>
                                <div id="dcHeroDesaName" class="text-[2rem] font-extrabold leading-[1.05]" style="letter-spacing:-.02em;">Desa Kalu Kaluku</div>
                                <div class="text-[11px] opacity-65 mt-1.5 mb-4">Pilot Utama Kec. Kodeoha</div>
                                <div class="flex justify-between items-center pt-3 border-t border-white/15"><span class="text-xs flex items-center gap-1.5"><i class="bi bi-shield-check text-[#6ee7b7]"></i> Validasi BPS RI</span><b class="text-xl" style="color:#6ee7b7;">100%</b></div>
                            </div>
                        </div>
                    </div>

                    <!-- KPI -->
                    <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-4">
                        <div class="dc-card">
                            <div class="flex justify-between items-center"><span class="dc-icon"><i class="bi bi-clipboard2-check-fill"></i></span><span class="dc-tag">93% Selesai</span></div>
                            <div class="dc-kpi-label">Pengisian PODES</div>
                            <div class="dc-kpi-value">41 / 44 Indikator</div>
                            <div class="dc-progress mt-3"><span style="width:93%;background:var(--dc-green);"></span></div>
                            <div class="dc-kpi-foot"><span>Kurang 3 variabel</span><b>Standar SDI</b></div>
                        </div>
                        <div class="dc-card">
                            <div class="flex justify-between items-center"><span class="dc-icon" style="background:#eaf1fb;color:#2563eb;"><i class="bi bi-patch-check-fill"></i></span><span class="dc-tag" style="background:#eef2f6;color:#4b5b6b;">Tahap 3</span></div>
                            <div class="dc-kpi-label">Verifikasi BPS Kolut</div>
                            <div class="dc-kpi-value" style="color:var(--dc-green);">Terverifikasi</div>
                            <div class="dc-kpi-foot mt-4"><span>✓ Metadata Sah</span><span>Rev. 12 Okt 2026</span></div>
                        </div>
                        <div class="dc-card">
                            <div class="flex justify-between items-center"><span class="dc-icon" style="background:#eef2f6;color:#334155;"><i class="bi bi-people-fill"></i></span><span class="dc-tag" style="background:#eef2f6;color:#4b5b6b;">Monografi 2026</span></div>
                            <div class="dc-kpi-label">Cakupan Kependudukan</div>
                            <div class="dc-kpi-value"><span id="dcKpiKK">1.120</span> KK</div>
                            <div class="dc-kpi-foot mt-4"><span><span id="dcKpiJiwa">3.840</span> Jiwa terdata</span><b><span id="dcKpiDusun">4</span> Dusun</b></div>
                        </div>
                        <div class="dc-card">
                            <div class="flex justify-between items-center"><span class="dc-icon" style="background:#fdf3e1;color:#d97706;"><i class="bi bi-award-fill"></i></span><span class="dc-tag" style="background:#fdf3e1;color:#b45309;">Grade A</span></div>
                            <div class="dc-kpi-label">Skor Rata-rata Evaluasi</div>
                            <div class="dc-kpi-value">88.5 / 100</div>
                            <div class="dc-kpi-foot mt-4"><span>Pre-test &amp; Post-test</span><b>5 Operator</b></div>
                        </div>
                    </div>

                    <!-- GRAFIK -->
                    <div>
                        <div class="dc-eyebrow mb-2 flex items-center gap-1.5"><i class="bi bi-bar-chart-fill"></i> <span>Visualisasi Data Desa</span></div>
                        <div class="grid lg:grid-cols-12 gap-4">
                            <div class="dc-card lg:col-span-4">
                                <h6 class="font-bold text-sm">Komposisi Kesejahteraan (Desil)</h6>
                                <p class="text-[11px] text-slate-500">Sebaran rumah tangga menurut desil</p>
                                <div class="relative mt-3" style="height:230px;"><canvas id="dcChartDesil"></canvas></div>
                            </div>
                            <div class="dc-card lg:col-span-8">
                                <h6 class="font-bold text-sm">Penduduk &amp; KK per Dusun</h6>
                                <p class="text-[11px] text-slate-500">Jumlah jiwa dan kepala keluarga tiap dusun</p>
                                <div class="relative mt-3" style="height:230px;"><canvas id="dcChartDusun"></canvas></div>
                            </div>
                            <div class="dc-card lg:col-span-12">
                                <h6 class="font-bold text-sm">Tren Skor Pre-test &amp; Post-test</h6>
                                <p class="text-[11px] text-slate-500">Rata-rata skor operator desa per sesi</p>
                                <div class="relative mt-3" style="height:230px;"><canvas id="dcChartSkor"></canvas></div>
                            </div>
                        </div>
                    </div>

                    <!-- AKSI CEPAT -->
                    <div class="dc-card">
                                <div class="flex justify-between items-center mb-3"><h6 class="font-bold text-sm">⚡ Aksi Cepat Operator Desa</h6><small class="text-slate-500 text-[11px]">Pintasan Fitur Pembinaan</small></div>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                                    <button type="button" onclick="openManageDataModal('kpi')" class="dc-quick"><span class="dc-icon"><i class="bi bi-pencil-square"></i></span><b>Input Data PODES</b><small>41/44 terverifikasi</small></button>
                                    <button type="button" onclick="switchNavMenu('pembelajaran')" class="dc-quick"><span class="dc-icon"><i class="bi bi-book-half"></i></span><b>Materi Belajar</b><small>8 Modul Statistik</small></button>
                                    <button type="button" onclick="switchNavMenu('posttest')" class="dc-quick"><span class="dc-icon"><i class="bi bi-ui-checks"></i></span><b>Ikuti Post-test</b><small>Uji Kompetensi Sesi 2</small></button>
                                    <button type="button" onclick="switchNavMenu('buku')" class="dc-quick"><span class="dc-icon" style="background:#e8f4ee;color:var(--dc-green);"><i class="bi bi-file-earmark-pdf-fill"></i></span><b>Panduan Teknis</b><small>PDF Panduan Desa</small></button>
                                </div>
                            </div>

                    <!-- PUSAT BANTUAN -->
                    <div class="dc-help flex flex-col md:flex-row md:items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <span class="dc-icon" style="background:rgba(255,255,255,.14);color:#fff;">?</span>
                            <div><div class="font-bold text-sm">Pusat Bantuan Desa Cantik</div><div class="text-xs opacity-80">Ada kendala pengisian variabel atau login? Hubungi narahubung pembina BPS Kolaka Utara.</div></div>
                        </div>
                        <button type="button" onclick="openPstModal()" class="dc-btn-ghost flex items-center gap-1.5"><i class="bi bi-whatsapp"></i> <span>WhatsApp Helpdesk</span></button>
                    </div>

                    <div class="dc-eyebrow pt-2 flex items-center gap-1.5"><i class="bi bi-graph-up-arrow"></i> <span>Statistik Sektoral &amp; Potensi Desa (Data Lengkap)</span></div>
                </div>
                <!-- =============== /BERANDA BARU =============== -->

                    
                    <!-- Content Top Header: Title, Button Edit Data Dasar, Toggle Publik/Internal -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs space-y-3">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Dashboard Utama & Potensi Desa</h2>
                                </div>
                                <p class="text-xs text-slate-500 mt-0.5">Portal Satu Data Statistik Sektoral Desa Binaan BPS Kabupaten Kolaka Utara</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" onclick="openManageDataModal('kpi')" class="px-4 py-2 rounded-xl bg-[#005ea6] hover:bg-[#004e8a] text-white font-bold text-xs shadow-xs transition flex items-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-pencil-fill text-xs mr-1"></i>
                                    <span>Edit Data Dasar</span>
                                </button>
                            </div>
                        </div>

                        <!-- Checkbox Filter: Tampilkan ke Publik / Hanya Internal BPS & Pemda -->
                        <div class="pt-2 border-t border-slate-100 flex flex-wrap items-center gap-4 text-xs font-bold text-slate-700 select-none">
                            <label class="flex items-center gap-2 cursor-pointer hover:text-[#005ea6] transition">
                                <input type="checkbox" id="chkPublik" checked onchange="togglePublicFilter(this)" class="w-4 h-4 text-[#005ea6] rounded border-slate-300 focus:ring-[#005ea6] cursor-pointer">
                                <span class="flex items-center gap-1.5"><i class="bi bi-globe text-[#005ea6]"></i> Tampilkan ke Publik</span>
                            </label>
                            <span class="text-slate-300 hidden sm:inline">|</span>
                            <label class="flex items-center gap-2 cursor-pointer hover:text-[#005ea6] transition">
                                <input type="checkbox" id="chkInternal" onchange="toggleInternalFilter(this)" class="w-4 h-4 text-amber-600 rounded border-slate-300 focus:ring-amber-500 cursor-pointer">
                                <span class="text-slate-500 flex items-center gap-1.5"><i class="bi bi-shield-lock-fill text-amber-600"></i> Hanya Internal BPS &amp; Pemda (Seleksi Potensi &amp; Data)</span>
                            </label>
                        </div>
                    </div>

                    <!-- 4 KPI Cards (Total Penduduk, Jumlah KK, Kemiskinan, Kasus Stunting) -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                        <!-- Card 1: Total Penduduk -->
                        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col justify-between hover:shadow-md transition">
                            <div class="flex items-center justify-between text-xs text-slate-500 font-bold">
                                <span>Total Penduduk:</span>
                                <span class="w-8 h-8 rounded-xl bg-blue-50 text-[#005ea6] flex items-center justify-center text-sm shadow-2xs">
                                    <i class="bi bi-people-fill text-base"></i>
                                </span>
                            </div>
                            <div class="mt-2">
                                <span id="dashKpiTotalPenduduk" class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">4.150</span>
                                <span class="text-xs font-bold text-slate-500 ml-1">Jiwa</span>
                            </div>
                        </div>

                        <!-- Card 2: Jumlah KK -->
                        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col justify-between hover:shadow-md transition">
                            <div class="flex items-center justify-between text-xs text-slate-500 font-bold">
                                <span>Jumlah KK:</span>
                                <span class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm shadow-2xs">
                                    <i class="bi bi-house-door-fill text-base"></i>
                                </span>
                            </div>
                            <div class="mt-2">
                                <span id="dashKpiTotalKeluarga" class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">1.120</span>
                                <span class="text-xs font-bold text-slate-500 ml-1">KK</span>
                            </div>
                        </div>

                        <!-- Card 3: Kemiskinan -->
                        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col justify-between hover:shadow-md transition">
                            <div class="flex items-center justify-between text-xs text-slate-500 font-bold">
                                <span>Kemiskinan:</span>
                                <span class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm shadow-2xs">
                                    <i class="bi bi-graph-down-arrow text-base"></i>
                                </span>
                            </div>
                            <div class="mt-2 flex items-baseline gap-1">
                                <span id="dashKpiPendudukMiskin" class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">3,2%</span>
                                <span class="text-xs font-bold text-emerald-600">(Rendah)</span>
                            </div>
                        </div>

                        <!-- Card 4: Kasus Stunting -->
                        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col justify-between hover:shadow-md transition">
                            <div class="flex items-center justify-between text-xs text-slate-500 font-bold">
                                <span>Kasus Stunting:</span>
                                <span class="w-8 h-8 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-sm shadow-2xs">
                                    <i class="bi bi-heart-pulse-fill text-base"></i>
                                </span>
                            </div>
                            <div class="mt-2">
                                <span id="dashKpiStunting" class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">3</span>
                                <span class="text-xs font-bold text-slate-500 ml-1">Balita</span>
                            </div>
                        </div>
                    </div>

                    <!-- Middle Row: VISUAL CHARTS UTAMA (PIRAMIDA, KOMODITAS, FASILITAS & BANSOS) -->
                    <!-- Row 1: Demografi Piramida Penduduk & Sektor Lapangan Usaha -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-5">
                        <!-- Chart 1: Piramida Penduduk & Struktur Demografi (Col 7) -->
                        <div class="lg:col-span-7 bg-white rounded-2xl p-5 sm:p-6 border border-slate-200 shadow-2xs flex flex-col justify-between hover:shadow-md transition">
                            <div>
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3 border-b border-slate-100 gap-2">
                                    <div>
                                        <h4 class="font-black text-slate-900 text-base sm:text-lg tracking-tight">Piramida Penduduk & Struktur Demografi Desa</h4>
                                        <p class="text-xs text-slate-500 mt-0.5">Struktur Demografi Berdasarkan Kelompok Umur & Jenis Kelamin (Regsosek BPS 2026)</p>
                                    </div>
                                    <div class="flex items-center gap-3 text-xs font-bold shrink-0">
                                        <span class="flex items-center gap-1.5 text-[#005ea6]"><span class="w-3 h-3 rounded-full bg-[#005ea6]"></span> Laki-laki</span>
                                        <span class="flex items-center gap-1.5 text-[#e11d48]"><span class="w-3 h-3 rounded-full bg-[#e11d48]"></span> Perempuan</span>
                                    </div>
                                </div>
                                <div id="piramidaChartContainer" class="w-full pt-3 h-80 flex flex-col justify-center"></div>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between text-xs text-slate-500 font-semibold gap-2">
                                <span>Regsosek & Monografi Sektoral Desa 2026</span>
                                <span class="font-bold text-slate-700">Rasio Jenis Kelamin: <span class="text-[#005ea6] font-black">98,5%</span></span>
                            </div>
                        </div>

                        <!-- Chart 2: Komoditas Unggulan & Lapangan Usaha (Col 5) -->
                        <div class="lg:col-span-5 bg-white rounded-2xl p-5 sm:p-6 border border-slate-200 shadow-2xs flex flex-col justify-between hover:shadow-md transition">
                            <div>
                                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                                    <div>
                                        <h4 class="font-black text-slate-900 text-base sm:text-lg tracking-tight">Komoditas Unggulan & Mata Pencaharian</h4>
                                        <p class="text-xs text-slate-500 mt-0.5">Distribusi Sektor Usaha & Potensi Ekonomi Sektoral Desa</p>
                                    </div>
                                    <span class="text-[10px] font-black text-emerald-800 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">
                                        Sektoral BPS
                                    </span>
                                </div>
                                <div class="pt-3 h-72 sm:h-80 relative flex items-center justify-center">
                                    <canvas id="dashKomoditasCanvas"></canvas>
                                </div>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                                <span>Sentra Kakao & Perikanan Kolut</span>
                                <span class="font-bold text-emerald-700">Potensi Ekonomi Terbina</span>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: Fasilitas Dasar & Perlindungan Kesejahteraan -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-5">
                        <!-- Chart 3: Akses Fasilitas Dasar & Hunian Layak (KK) -->
                        <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200 shadow-2xs flex flex-col justify-between hover:shadow-md transition">
                            <div>
                                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                                    <div>
                                        <h4 class="font-black text-slate-900 text-base sm:text-lg tracking-tight">Akses Fasilitas Dasar & Sanitasi Keluarga</h4>
                                        <p class="text-xs text-slate-500 mt-0.5">Capaian Indikator SDGs Desa & Satu Data Statistik Sektoral (1.120 KK)</p>
                                    </div>
                                    <span class="text-[10px] font-black text-blue-800 bg-blue-50 px-2.5 py-1 rounded-full border border-blue-200">
                                        SDGs Desa
                                    </span>
                                </div>
                                <div class="pt-3 h-64 sm:h-72 relative">
                                    <canvas id="dashFasilitasCanvas"></canvas>
                                </div>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500 font-semibold">
                                <span>Standar BPS Satu Data Indonesia</span>
                                <span class="font-black text-emerald-700">Rata-rata Capaian: 91,5%</span>
                            </div>
                        </div>

                        <!-- Chart 4: Perlindungan Sosial, Adminduk & Kesejahteraan Balita -->
                        <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200 shadow-2xs flex flex-col justify-between hover:shadow-md transition">
                            <div>
                                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                                    <div>
                                        <h4 class="font-black text-slate-900 text-base sm:text-lg tracking-tight">Jaminan Sosial & Perlindungan Balita Bebas Stunting</h4>
                                        <p class="text-xs text-slate-500 mt-0.5">Integrasi JKN, Bantuan Sosial & Pencegahan Stunting Desa Binaan</p>
                                    </div>
                                    <span class="text-[10px] font-black text-purple-800 bg-purple-50 px-2.5 py-1 rounded-full border border-purple-200">
                                        Kesejahteraan
                                    </span>
                                </div>
                                <div class="pt-3 h-64 sm:h-72 relative">
                                    <canvas id="dashBansosCanvas"></canvas>
                                </div>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500 font-semibold">
                                <span>Sumber: Regsosek Terpadu & Posyandu 2026</span>
                                <span class="font-black text-purple-700">Stunting Sangat Rendah (3 Balita)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Row: Galeri Publikasi Desa (4 Publikasi Cards) -->
                    <div id="sectionPublikasi" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-slate-100">
                            <div>
                                <h4 class="font-black text-slate-900 text-base sm:text-lg tracking-tight">Galeri Publikasi Desa</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Diseminasi Dokumen Resmi Statistik Sektoral, Monografi & Modul Pelatihan BPS</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" onclick="openManageDataModal('kpi')" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1 cursor-pointer">
                                    <span>✏️ Edit Data Dasar</span>
                                </button>
                                <button type="button" onclick="openManageDataModal('dusun')" class="px-3 py-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition flex items-center gap-1 cursor-pointer">
                                    <span>➕ Tambah Dusun</span>
                                </button>
                            </div>
                        </div>

                        <!-- 4 Publication Cards in Responsive Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 pt-1">
                            <!-- Pub 1: Monografi -->
                            <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50 hover:bg-white hover:shadow-md transition flex flex-col justify-between space-y-3 group">
                                <div>
                                    <div class="w-full h-32 rounded-xl bg-gradient-to-tr from-blue-700 to-indigo-900 text-white p-3 flex flex-col justify-between relative shadow-sm overflow-hidden">
                                        <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-wider">
                                            <span class="bg-white/20 px-2 py-0.5 rounded-md">BPS Kolut</span>
                                            <span class="bg-amber-400 text-slate-900 px-2 py-0.5 rounded-md font-black">2026</span>
                                        </div>
                                        <div class="text-sm font-black leading-snug line-clamp-2">
                                            Monografi Statistik Desa Kalu Kaluku 2026
                                        </div>
                                        <div class="text-[10px] text-blue-200 font-medium">Buku Publikasi Resmi</div>
                                    </div>
                                    <div class="mt-3 space-y-1">
                                        <span class="text-[10px] font-black text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full border border-blue-200">Satu Data Desa</span>
                                        <h5 class="text-xs font-black text-slate-900 line-clamp-2 leading-snug">Monografi Statistik Sektoral Desa Kalu Kaluku 2026</h5>
                                        <p class="text-[11px] text-slate-500 line-clamp-2">Kompilasi kependudukan, perkebunan kakao, perikanan pesisir, dan ekonomi desa.</p>
                                    </div>
                                </div>
                                <button type="button" onclick="openPublikasiDocModal('monografi')" class="w-full py-2 rounded-xl bg-[#005ea6] hover:bg-[#004e8a] text-white text-xs font-black transition flex items-center justify-center gap-1 cursor-pointer">
                                    <span>📥 Unduh PDF</span>
                                </button>
                            </div>

                            <!-- Pub 2: Buku Praktik Excel -->
                            <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50 hover:bg-white hover:shadow-md transition flex flex-col justify-between space-y-3 group">
                                <div>
                                    <div class="w-full h-32 rounded-xl bg-gradient-to-tr from-emerald-700 to-teal-900 text-white p-3 flex flex-col justify-between relative shadow-sm overflow-hidden">
                                        <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-wider">
                                            <span class="bg-white/20 px-2 py-0.5 rounded-md">BPS RI</span>
                                            <span class="bg-white text-emerald-900 px-2 py-0.5 rounded-md font-black">Modul</span>
                                        </div>
                                        <div class="text-sm font-black leading-snug line-clamp-2">
                                            Buku Praktik Excel Statistik Satu Data
                                        </div>
                                        <div class="text-[10px] text-emerald-200 font-medium">30 Lembar Praktik</div>
                                    </div>
                                    <div class="mt-3 space-y-1">
                                        <span class="text-[10px] font-black text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">Pedoman Aparatur</span>
                                        <h5 class="text-xs font-black text-slate-900 line-clamp-2 leading-snug">Buku Praktik Excel Statistik Satu Data Indonesia</h5>
                                        <p class="text-[11px] text-slate-500 line-clamp-2">Panduan teknis pengolahan spreadsheet data monografi aparat desa.</p>
                                    </div>
                                </div>
                                <button type="button" onclick="switchNavMenu('pembelajaran')" class="w-full py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black transition flex items-center justify-center gap-1 cursor-pointer">
                                    <span>📖 Buka Modul Excel</span>
                                </button>
                            </div>

                            <!-- Pub 3: BRS Sektoral -->
                            <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50 hover:bg-white hover:shadow-md transition flex flex-col justify-between space-y-3 group">
                                <div>
                                    <div class="w-full h-32 rounded-xl bg-gradient-to-tr from-amber-600 to-orange-800 text-white p-3 flex flex-col justify-between relative shadow-sm overflow-hidden">
                                        <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-wider">
                                            <span class="bg-white/20 px-2 py-0.5 rounded-md">BRS Triwulan</span>
                                            <span class="bg-white text-amber-900 px-2 py-0.5 rounded-md font-black">Triwulan II</span>
                                        </div>
                                        <div class="text-sm font-black leading-snug line-clamp-2">
                                            Berita Resmi Statistik Sektoral Kolut
                                        </div>
                                        <div class="text-[10px] text-amber-200 font-medium">Diseminasi BPS</div>
                                    </div>
                                    <div class="mt-3 space-y-1">
                                        <span class="text-[10px] font-black text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full border border-amber-200">Berita Resmi</span>
                                        <h5 class="text-xs font-black text-slate-900 line-clamp-2 leading-snug">BRS Sektoral BPS Kabupaten Kolaka Utara</h5>
                                        <p class="text-[11px] text-slate-500 line-clamp-2">Ringkasan berkala indikator ketenagakerjaan, inflasi daerah & komoditas.</p>
                                    </div>
                                </div>
                                <button type="button" onclick="openPublikasiDocModal('brs')" class="w-full py-2 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-xs font-black transition flex items-center justify-center gap-1 cursor-pointer">
                                    <span>📥 Unduh BRS</span>
                                </button>
                            </div>

                            <!-- Pub 4: Profil Potensi & Komoditas -->
                            <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50 hover:bg-white hover:shadow-md transition flex flex-col justify-between space-y-3 group">
                                <div>
                                    <div class="w-full h-32 rounded-xl bg-gradient-to-tr from-teal-700 to-cyan-900 text-white p-3 flex flex-col justify-between relative shadow-sm overflow-hidden">
                                        <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-wider">
                                            <span class="bg-white/20 px-2 py-0.5 rounded-md">Agrikultur</span>
                                            <span class="bg-emerald-400 text-slate-900 px-2 py-0.5 rounded-md font-black">Sentra</span>
                                        </div>
                                        <div class="text-sm font-black leading-snug line-clamp-2">
                                            Katalog Potensi Perkebunan Kakao
                                        </div>
                                        <div class="text-[10px] text-teal-200 font-medium">Komoditas Unggulan</div>
                                    </div>
                                    <div class="mt-3 space-y-1">
                                        <span class="text-[10px] font-black text-teal-700 bg-teal-50 px-2 py-0.5 rounded-full border border-teal-200">Potensi Desa</span>
                                        <h5 class="text-xs font-black text-slate-900 line-clamp-2 leading-snug">Profil Komoditas Unggulan & UMKM Desa</h5>
                                        <p class="text-[11px] text-slate-500 line-clamp-2">Data spasial hamparan sentra kakao, kelompok tani, dan olahan produk desa.</p>
                                    </div>
                                </div>
                                <button type="button" onclick="openPublikasiDocModal('potensi')" class="w-full py-2 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-black transition flex items-center justify-center gap-1 cursor-pointer">
                                    <span>📥 Unduh Profil</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ===================================================================== -->
                <!-- PEMBINAAN DESA (5 Pilar, Agenda, Tutorial, Tim Agen)                  -->
                <!-- ===================================================================== -->
                                <!-- ===================================================================== -->
                <!-- OUTPUT DESA (Monografi, Tabel Statistik, Statistik Desa, Leaflet)     -->
                <!-- ===================================================================== -->
                <div id="view-output" class="menu-view-container hidden space-y-6 animate-in fade-in duration-200">
                    <!-- Header Banner Output Desa -->
                    <div class="bg-gradient-to-r from-[#064e3b] via-[#047857] to-[#0b2545] text-white rounded-3xl p-6 sm:p-8 shadow-xl relative overflow-hidden">
                        <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
                        <div class="relative z-10">
                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                <span class="px-3 py-1 rounded-full bg-emerald-400/20 text-emerald-300 border border-emerald-400/30 text-[11px] font-black uppercase tracking-wider flex items-center gap-1.5">
                                    <i class="bi bi-file-earmark-bar-graph-fill text-xs"></i>
                                    <span>Publikasi &amp; Diseminasi SDI</span>
                                </span>
                                <span id="outputVillageBadge" class="px-3 py-1 rounded-full bg-white/15 text-white text-[11px] font-bold border border-white/20">
                                    Desa Kamisi • Kec. Kodeoha
                                </span>
                            </div>
                            <h2 class="text-2xl sm:text-3xl font-black tracking-tight text-white">
                                Output &amp; Diseminasi Statistik Desa
                            </h2>
                            <p class="text-sm text-emerald-100/90 mt-2 max-w-2xl leading-relaxed">
                                Dokumen resmi luaran pembinaan Desa Cantik BPS Kabupaten Kolaka Utara: Monografi PODES, Kompilasi Tabel Statistik Sektoral, Publikasi Statistik Makro, dan Leaflet Infografis Tematik siap ditinjau dan diunduh.
                            </p>
                        </div>
                    </div>

                    <!-- 4 Output Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        
                        <!-- 1. Monografi Desa -->
                        <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                            <div>
                                <div class="flex items-start justify-between gap-3 mb-4">
                                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl shadow-inner shrink-0">
                                        <i class="bi bi-journal-bookmark-fill"></i>
                                    </div>
                                    <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[11px] font-black border border-emerald-200">
                                        PODES 2025/2026
                                    </span>
                                </div>
                                <h3 id="outputDocTitleMonografi" class="text-lg font-black text-slate-900 leading-snug">
                                    Monografi Desa Kamisi
                                </h3>
                                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                                    Buku komprehensif monografi statistik sektoral desa mencakup batas geografis, dinamika demografi, profil pertanian kakao, perikanan, serta infrastruktur dan kesejahteraan sosial.
                                </p>
                                <div class="flex flex-wrap items-center gap-2 mt-4 text-[11px] font-semibold text-slate-600">
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-file-earmark-pdf-fill text-rose-500 mr-1"></i>Format PDF</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-layers-fill text-emerald-600 mr-1"></i>84 Halaman</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-shield-check text-blue-600 mr-1"></i>Standar SDI</span>
                                </div>
                            </div>
                            <div class="pt-5 mt-5 border-t border-slate-100 grid grid-cols-2 gap-2.5">
                                <button type="button" onclick="openPublikasiDocModal('monografi')" class="w-full py-2.5 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer active:scale-95">
                                    <i class="bi bi-eye-fill text-emerald-600"></i>
                                    <span>Buka Dokumen</span>
                                </button>
                                <button type="button" onclick="downloadOutputDoc('monografi')" class="w-full py-2.5 px-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-sm flex items-center justify-center gap-1.5 cursor-pointer active:scale-95">
                                    <i class="bi bi-download"></i>
                                    <span>Unduh Dokumen</span>
                                </button>
                            </div>
                        </div>

                        <!-- 2. Tabel Statistik -->
                        <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                            <div>
                                <div class="flex items-start justify-between gap-3 mb-4">
                                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center text-2xl shadow-inner shrink-0">
                                        <i class="bi bi-table"></i>
                                    </div>
                                    <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 text-[11px] font-black border border-blue-200">
                                        32 Matriks Sektoral
                                    </span>
                                </div>
                                <h3 id="outputDocTitleTabel" class="text-lg font-black text-slate-900 leading-snug">
                                    Tabel Statistik Sektoral Desa Kamisi
                                </h3>
                                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                                    Kompilasi tabulasi data sektoral per dusun dengan kode referensi baku, mencakup demografi umur produktif, keluarga desil bansos, produksi komoditas, dan sarana ibadah/kesehatan.
                                </p>
                                <div class="flex flex-wrap items-center gap-2 mt-4 text-[11px] font-semibold text-slate-600">
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-file-earmark-spreadsheet-fill text-emerald-600 mr-1"></i>Format Excel/CSV</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-grid-3x3 text-blue-600 mr-1"></i>32 Tabel Sektoral</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-check-all text-teal-600 mr-1"></i>Metadata Baku</span>
                                </div>
                            </div>
                            <div class="pt-5 mt-5 border-t border-slate-100 grid grid-cols-2 gap-2.5">
                                <button type="button" onclick="openPublikasiDocModal('tabel')" class="w-full py-2.5 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer active:scale-95">
                                    <i class="bi bi-eye-fill text-blue-600"></i>
                                    <span>Buka Dokumen</span>
                                </button>
                                <button type="button" onclick="downloadOutputDoc('tabel')" class="w-full py-2.5 px-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition shadow-sm flex items-center justify-center gap-1.5 cursor-pointer active:scale-95">
                                    <i class="bi bi-download"></i>
                                    <span>Unduh Dokumen</span>
                                </button>
                            </div>
                        </div>

                        <!-- 3. Statistik Desa -->
                        <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                            <div>
                                <div class="flex items-start justify-between gap-3 mb-4">
                                    <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-800 flex items-center justify-center text-2xl shadow-inner shrink-0">
                                        <i class="bi bi-bar-chart-line-fill"></i>
                                    </div>
                                    <span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-800 text-[11px] font-black border border-amber-200">
                                        BRS &amp; Indikator Makro
                                    </span>
                                </div>
                                <h3 id="outputDocTitleStatistik" class="text-lg font-black text-slate-900 leading-snug">
                                    Publikasi Statistik &amp; Indikator Makro Desa Kamisi
                                </h3>
                                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                                    Publikasi ringkas analisis perkembangan indikator makro pembangunan desa, rasio kemiskinan, penurunan stunting balita, dinamika ketenagakerjaan, dan evaluasi indeks desa.
                                </p>
                                <div class="flex flex-wrap items-center gap-2 mt-4 text-[11px] font-semibold text-slate-600">
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-file-earmark-pdf-fill text-rose-500 mr-1"></i>Format PDF</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-graph-up-arrow text-amber-600 mr-1"></i>Indikator Makro</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-patch-check-fill text-emerald-600 mr-1"></i>Disetujui BPS</span>
                                </div>
                            </div>
                            <div class="pt-5 mt-5 border-t border-slate-100 grid grid-cols-2 gap-2.5">
                                <button type="button" onclick="openPublikasiDocModal('statistik')" class="w-full py-2.5 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer active:scale-95">
                                    <i class="bi bi-eye-fill text-amber-600"></i>
                                    <span>Buka Dokumen</span>
                                </button>
                                <button type="button" onclick="downloadOutputDoc('statistik')" class="w-full py-2.5 px-3 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold transition shadow-sm flex items-center justify-center gap-1.5 cursor-pointer active:scale-95">
                                    <i class="bi bi-download"></i>
                                    <span>Unduh Dokumen</span>
                                </button>
                            </div>
                        </div>

                        <!-- 4. Leaflet Desa -->
                        <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                            <div>
                                <div class="flex items-start justify-between gap-3 mb-4">
                                    <div class="w-12 h-12 rounded-2xl bg-rose-100 text-rose-700 flex items-center justify-center text-2xl shadow-inner shrink-0">
                                        <i class="bi bi-file-earmark-richtext-fill"></i>
                                    </div>
                                    <span class="px-2.5 py-1 rounded-full bg-rose-50 text-rose-700 text-[11px] font-black border border-rose-200">
                                        Leaflet Lipat 3 (HD)
                                    </span>
                                </div>
                                <h3 id="outputDocTitleLeaflet" class="text-lg font-black text-slate-900 leading-snug">
                                    Leaflet Infografis Tematik Desa Kamisi
                                </h3>
                                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                                    Brosur infografis visual lipat tiga (Tri-Fold) format cetak resolusi tinggi untuk sosialisasi profil desa, potensi sentra kakao, layanan adminduk, dan pilar Desa Cantik ke masyarakat.
                                </p>
                                <div class="flex flex-wrap items-center gap-2 mt-4 text-[11px] font-semibold text-slate-600">
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-printer-fill text-indigo-600 mr-1"></i>Siap Cetak A4</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-palette-fill text-rose-600 mr-1"></i>Full Color CMYK</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100"><i class="bi bi-file-earmark-pdf-fill text-rose-500 mr-1"></i>Format PDF HD</span>
                                </div>
                            </div>
                            <div class="pt-5 mt-5 border-t border-slate-100 grid grid-cols-2 gap-2.5">
                                <button type="button" onclick="openPublikasiDocModal('leaflet')" class="w-full py-2.5 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer active:scale-95">
                                    <i class="bi bi-eye-fill text-rose-600"></i>
                                    <span>Buka Dokumen</span>
                                </button>
                                <button type="button" onclick="downloadOutputDoc('leaflet')" class="w-full py-2.5 px-3 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold transition shadow-sm flex items-center justify-center gap-1.5 cursor-pointer active:scale-95">
                                    <i class="bi bi-download"></i>
                                    <span>Unduh Leaflet</span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Rekonsiliasi & Jaminan Kualitas Dokumen BPS -->
                    <div class="bg-emerald-50/70 border border-emerald-200 rounded-2xl p-4 sm:p-5 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center text-xl shrink-0">
                                <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <div>
                                <h4 class="text-xs sm:text-sm font-black text-emerald-950">Jaminan Mutu Satu Data Indonesia (SDI)</h4>
                                <p class="text-[11px] text-emerald-800/90 mt-0.5">Seluruh dokumen luaran telah memenuhi kaidah Standar Data Statistik, Metadata Baku, Interoperabilitas, dan Kode Referensi.</p>
                            </div>
                        </div>
                        <button type="button" onclick="downloadOutputDoc('all')" class="w-full sm:w-auto px-4 py-2.5 rounded-xl bg-emerald-800 hover:bg-emerald-900 text-white text-xs font-bold transition flex items-center justify-center gap-2 shrink-0 cursor-pointer shadow-sm active:scale-95">
                            <i class="bi bi-archive-fill"></i>
                            <span>Unduh Semua Paket (ZIP)</span>
                        </button>
                    </div>
                </div>

                <div id="view-pembinaan" class="menu-view-container hidden space-y-5 animate-in fade-in duration-200">
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex items-center gap-3">
                        <div class="dc-icon" style="width:42px;height:42px;">⚑</div>
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Pembinaan Desa</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Pilar program, agenda pembinaan, tutorial pilihan, dan tim agen statistik Desa Cantik</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                    <!-- 5 PILAR -->
                    <div id="dcPilar">
                        <div class="dc-eyebrow mb-1">⚑ Kerangka Program Nasional BPS RI</div>
                        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-2 mb-3">
                            <h3 class="text-2xl font-extrabold" style="letter-spacing:-.02em;">5 Pilar Utama Tujuan Desa Cantik</h3>
                            <p class="text-xs text-slate-500 max-w-[420px]">Arah strategis pembinaan statistik terintegrasi untuk memperkuat kemandirian dan tata kelola data di Desa Kalu Kaluku.</p>
                        </div>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-3">
                        <div class="dc-card flex flex-col">
                            <span class="dc-icon"><i class="bi bi-mortarboard-fill"></i></span>
                            <div class="dc-pilar-no">PILAR 01</div>
                            <div class="dc-pilar-title">Literasi Statistik</div>
                            <div class="dc-pilar-desc flex-1">Meningkatkan literasi statistik aparatur desa melalui pelatihan konsep, definisi, dan interpretasi indikator makro.</div>
                            <span class="dc-link mt-3">Pelatihan Berkelanjutan →</span>
                        </div>
                        <div class="dc-card flex flex-col">
                            <span class="dc-icon"><i class="bi bi-folder-fill"></i></span>
                            <div class="dc-pilar-no">PILAR 02</div>
                            <div class="dc-pilar-title">Pengumpulan & Pengelolaan</div>
                            <div class="dc-pilar-desc flex-1">Meningkatkan kemampuan pengumpulan dan pengelolaan data desa secara digital, sistematis, dan tersirsip rapi.</div>
                            <span class="dc-link mt-3">Standarisasi Kuesioner →</span>
                        </div>
                        <div class="dc-card flex flex-col">
                            <span class="dc-icon"><i class="bi bi-shield-check"></i></span>
                            <div class="dc-pilar-no">PILAR 03</div>
                            <div class="dc-pilar-title">Data Akurat & Berkualitas</div>
                            <div class="dc-pilar-desc flex-1">Mendorong tersedianya data desa yang akurat, mutakhir, valid, dan dapat dipertanggungjawabkan sesuai kaidah SDI.</div>
                            <span class="dc-link mt-3">Satu Data Indonesia →</span>
                        </div>
                        <div class="dc-card flex flex-col">
                            <span class="dc-icon"><i class="bi bi-graph-up"></i></span>
                            <div class="dc-pilar-no">PILAR 04</div>
                            <div class="dc-pilar-title">Perencanaan Pembangunan</div>
                            <div class="dc-pilar-desc flex-1">Meningkatkan pemanfaatan data riil dalam penyusunan RKPDes, APBDes, dan alokasi bantuan sosial yang tepat sasaran.</div>
                            <span class="dc-link mt-3">Kebijakan Berbasis Bukti →</span>
                        </div>
                        <div class="dc-card flex flex-col">
                            <span class="dc-icon"><i class="bi bi-bank2"></i></span>
                            <div class="dc-pilar-no">PILAR 05</div>
                            <div class="dc-pilar-title">Tata Kelola Statistik</div>
                            <div class="dc-pilar-desc flex-1">Mendorong terwujudnya tata kelola dan kelembagaan statistik desa yang berkelanjutan bersama pembina BPS Kolaka Utara.</div>
                            <span class="dc-link mt-3">SOP & Agen Statistik →</span>
                        </div>
                        </div>
                    </div>


                        <div class="grid lg:grid-cols-3 gap-4">
                            <div class="lg:col-span-2">
                                <div class="dc-card">
                        <div class="flex justify-between items-start mb-3">
                            <div><h6 class="font-bold text-sm">Tim Agen Statistik Desa</h6><p class="text-[11px] text-slate-500">Aparatur yang telah ditugaskan dan mengikuti bimbingan teknis BPS</p></div>
                            <span onclick="openAgenDesaModal()" class="dc-link">Kelola Tim</span>
                        </div>
                        <div class="grid md:grid-cols-3 gap-2">
                        <div class="flex items-center gap-2 p-2 rounded-xl bg-[#f6f9f7]"><span class="dc-avatar">MK</span><div class="leading-tight min-w-0"><div class="font-semibold text-[12.5px] truncate">Muh. Kamil, S.IP</div><div class="text-[11px] text-slate-500 truncate">Sekretaris Desa</div><div class="text-[10.5px] font-semibold text-emerald-700">● Lulus Sertifikasi</div></div></div>
                        <div class="flex items-center gap-2 p-2 rounded-xl bg-[#f6f9f7]"><span class="dc-avatar">RN</span><div class="leading-tight min-w-0"><div class="font-semibold text-[12.5px] truncate">Rini Novitasari</div><div class="text-[11px] text-slate-500 truncate">Kasi Pemerintahan</div><div class="text-[10.5px] font-semibold text-emerald-700">● Skor Post-test 94</div></div></div>
                        <div class="flex items-center gap-2 p-2 rounded-xl bg-[#f6f9f7]"><span class="dc-avatar">AS</span><div class="leading-tight min-w-0"><div class="font-semibold text-[12.5px] truncate">Agus Salim</div><div class="text-[11px] text-slate-500 truncate">Kaur Perencanaan</div><div class="text-[10.5px] font-semibold text-emerald-700">● Skor Post-test 88</div></div></div>
                        </div>
                    </div>
                            </div>
                            <div class="space-y-4">
                                <div class="dc-card">
                                <div class="flex justify-between items-center mb-3"><h6 class="font-bold text-sm flex items-center gap-1.5"><i class="bi bi-calendar-event-fill text-emerald-700"></i> <span>Agenda Pembinaan</span></h6><span class="dc-tag">BPS Kolut</span></div>
                        <div class="dc-agenda "><div class="jenis"><span>KUNJUNGAN LAPANGAN</span><span>24 Okt 2026</span></div><b>Rekonsiliasi & Uji Petik Monografi Desa</b><small class="flex items-center gap-1"><i class="bi bi-geo-alt-fill text-slate-400"></i> Kantor Desa</small></div>
                        <div class="dc-agenda biru"><div class="jenis"><span>DARING / ZOOM</span><span>02 Nov 2026</span></div><b>Webinar Pemanfaatan Data PODES untuk RKPDes</b><small class="flex items-center gap-1"><i class="bi bi-geo-alt-fill text-slate-400"></i> BPS Kab. Kolaka Utara</small></div>
                        <div class="dc-agenda amber"><div class="jenis"><span>EVALUASI AKHIR</span><span>15 Nov 2026</span></div><b>Penganugerahan Desa Cinta Statistik Teladan</b><small class="flex items-center gap-1"><i class="bi bi-geo-alt-fill text-slate-400"></i> Aula Bappeda Kolaka Utara</small></div>
                                <button type="button" class="w-full rounded-xl py-2 text-xs bg-[#eef3f8] hover:bg-[#e3ebf3]">Lihat Kalender Lengkap</button>
                            </div>
                                <div id="dcTutorial" class="dc-card">
                                <div class="flex justify-between items-center mb-3"><h6 class="font-bold text-sm">Tutorial Pilihan</h6><span onclick="switchNavMenu('video')" class="dc-link">Semua Video</span></div>
                                <div onclick="switchNavMenu('video')" class="relative rounded-xl text-white mb-3 cursor-pointer overflow-hidden" style="height:120px;background:linear-gradient(135deg,#0a4d36,#2f8f6a);">
                                    <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/90 text-[#0f6b4a] flex items-center justify-center">▶</span>
                                    <span class="absolute bottom-0 left-0 p-2 text-[11px]"><b>Tutorial 04: Pengisian Kuesioner PODES</b><br><span class="opacity-80">Durasi: 14 menit • Tim Teknis BPS</span></span>
                                </div>
                                <div class="flex justify-between text-xs mb-2"><span>▶ Memahami Standar Data Indonesia</span><span class="text-slate-500">08:20</span></div>
                                <div class="flex justify-between text-xs"><span>▶ Pengolahan Data Monografi Desa</span><span class="text-slate-500">11:45</span></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================================================================== -->
                <!-- MENU: PENGISIAN DATA PODES (GOOGLE SPREADSHEET EMBED INTERAKTIF)      -->
                <!-- ===================================================================== -->
                <div id="view-podes" class="menu-view-container hidden space-y-6 animate-in fade-in duration-200">
                    
                    <!-- Content Top Header Banner -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-700 text-white flex items-center justify-center font-bold text-xl shadow-xs shrink-0">
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Pengisian Data PODES</h2>
                                    <span id="podesVillageBadge" class="podes-active-desa-name px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-black border border-emerald-300">Desa Kamisi</span>
                                </div>
                                <p class="text-xs text-slate-500 mt-0.5">Pemutakhiran data instrumen Potensi Desa (PODES) &amp; statistik sektoral terintegrasi Google Spreadsheet resmi BPS.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <a href="https://drive.google.com/drive/folders/1X24Nxer7Xva8zCJGjdxvGFjwPfMIN5d6" target="_blank" rel="noopener noreferrer" class="px-3.5 py-2 rounded-xl bg-blue-50 hover:bg-blue-100 text-[#005ea6] border border-blue-200 text-xs font-bold transition flex items-center gap-1.5 shadow-2xs cursor-pointer">
                                <i class="bi bi-folder-fill"></i>
                                <span>Folder Drive PODES ↗</span>
                            </a>
                            <button type="button" onclick="loadDefaultPodesTemplate()" class="px-3.5 py-2 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-300 text-xs font-bold transition flex items-center gap-1.5 shadow-2xs cursor-pointer">
                                <i class="bi bi-file-earmark-diff-fill text-emerald-600"></i>
                                <span>Gunakan Template PODES</span>
                            </button>
                        </div>
                    </div>

                    <!-- Input Link Google Spreadsheet & Tombol Terapkan (Bagian 1 & 2) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/90 shadow-2xs space-y-3">
                        <div class="flex flex-col lg:flex-row items-stretch lg:items-center gap-3">
                            <div class="relative flex-1 flex items-center">
                                <span class="absolute left-3.5 text-slate-400 text-sm">
                                    <i class="bi bi-link-45deg"></i>
                                </span>
                                <input type="url" id="podesSheetUrlInput" placeholder="Tempel link Google Spreadsheet PODES desa di sini (https://docs.google.com/spreadsheets/d/...)" class="w-full pl-9 pr-20 py-2.5 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-xs font-medium text-slate-900 transition outline-none">
                                <button type="button" onclick="clearPodesSheetInput('page')" class="absolute right-3 text-slate-400 hover:text-slate-600 text-xs font-bold cursor-pointer">
                                    Hapus
                                </button>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <button type="button" onclick="applyPodesSpreadsheetUrl()" class="px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs shadow-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-play-circle-fill"></i>
                                    <span>Tampilkan Spreadsheet</span>
                                </button>
                                <button type="button" onclick="openPodesInNewTab()" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs border border-slate-200 transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                    <span>Buka di Tab Baru ↗</span>
                                </button>
                            </div>
                        </div>

                        <!-- Bar Keterangan Status -->
                        <div class="flex flex-wrap items-center justify-between text-[11px] text-slate-500 pt-2 gap-2 border-t border-slate-100">
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center gap-1 font-semibold text-slate-700">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                    Desa Aktif: <b class="podes-active-desa-name text-slate-900 font-extrabold">Desa Kamisi</b>
                                </span>
                                <span class="text-slate-300">•</span>
                                <span class="text-slate-500">Otomatis tersimpan per desa di peramban (localStorage)</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-slate-400">Konversi otomatis anti-blokir: <code class="bg-slate-100 px-1 py-0.5 rounded text-[10px] text-emerald-700 font-mono">/edit?rm=minimal</code></span>
                                <button type="button" onclick="clearPodesSpreadsheet()" class="text-rose-600 hover:text-rose-700 hover:underline font-bold text-[11px] cursor-pointer">
                                    Reset Link Desa Ini
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Area Tampilan Spreadsheet: Full-Height Iframe Viewer (650px) -->
                    <div class="relative w-full h-[650px] rounded-xl border border-slate-200 overflow-hidden bg-white shadow-sm">
                        <!-- Empty State (Jika link belum dimasukkan) -->
                        <div id="podesEmptyState" class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center bg-slate-50/80 z-10 hidden">
                            <div class="w-16 h-16 rounded-3xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-3xl mb-4 shadow-sm border border-emerald-200">
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                            </div>
                            <h3 class="text-lg font-black text-slate-800">
                                Google Spreadsheet PODES Belum Dihubungkan
                            </h3>
                            <p class="text-xs text-slate-500 max-w-md mt-1 mb-6">
                                Hubungkan link Google Sheets instrumen PODES untuk <b class="podes-active-desa-name text-slate-800">Desa Kamisi</b> agar data statistik desa dapat diinput dan dimonitor secara langsung.
                            </p>

                            <!-- Panduan Singkat 3 Langkah -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 max-w-2xl w-full text-left mb-6">
                                <div class="bg-white p-3.5 rounded-xl border border-slate-200/80 shadow-2xs">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="w-5 h-5 rounded-full bg-emerald-600 text-white font-black text-[10px] flex items-center justify-center shrink-0">1</span>
                                        <span class="text-xs font-bold text-slate-800">Buka File Spreadsheet</span>
                                    </div>
                                    <p class="text-[11px] text-slate-500">Buka file Google Sheets PODES desa Anda atau buka template dari Google Drive.</p>
                                </div>
                                <div class="bg-white p-3.5 rounded-xl border border-slate-200/80 shadow-2xs">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="w-5 h-5 rounded-full bg-emerald-600 text-white font-black text-[10px] flex items-center justify-center shrink-0">2</span>
                                        <span class="text-xs font-bold text-slate-800">Atur Akses Berbagi</span>
                                    </div>
                                    <p class="text-[11px] text-slate-500">Klik tombol <b>Bagikan</b> di kanan atas, ubah ke "Siapa saja yang memiliki link dapat melihat/mengedit".</p>
                                </div>
                                <div class="bg-white p-3.5 rounded-xl border border-slate-200/80 shadow-2xs">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="w-5 h-5 rounded-full bg-emerald-600 text-white font-black text-[10px] flex items-center justify-center shrink-0">3</span>
                                        <span class="text-xs font-bold text-slate-800">Salin &amp; Tempel Link</span>
                                    </div>
                                    <p class="text-[11px] text-slate-500">Salin tautan Google Sheets lalu tempel pada kotak input di atas dan klik <b>Tampilkan Spreadsheet</b>.</p>
                                </div>
                            </div>

                            <!-- Tombol Aksi Cepat Empty State -->
                            <div class="flex flex-wrap items-center justify-center gap-3">
                                <button type="button" onclick="loadDefaultPodesTemplate()" class="px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs shadow-sm transition flex items-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                    <span>Gunakan Template Spreadsheet PODES</span>
                                </button>
                                <a href="https://drive.google.com/drive/folders/1X24Nxer7Xva8zCJGjdxvGFjwPfMIN5d6" target="_blank" rel="noopener noreferrer" class="px-4 py-2.5 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-300 font-bold text-xs shadow-2xs transition flex items-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-folder-symlink-fill text-blue-600"></i>
                                    <span>Folder Drive Template PODES ↗</span>
                                </a>
                            </div>
                        </div>

                        <!-- Iframe Tampilan Spreadsheet Asli -->
                        <iframe id="podesSheetIframe" src="" class="w-full h-full border-0" allow="autoplay; clipboard-write; encrypted-media" loading="lazy" title="Google Sheets PODES Viewer"></iframe>
                    </div>

                </div>

                <!-- ===================================================================== -->
                <!-- MONITORING KELENGKAPAN PODES                                          -->
                <!-- ===================================================================== -->
                <div id="view-monitoring" class="menu-view-container hidden space-y-6 animate-in fade-in duration-200">
                    
                    <!-- Content Top Header Banner -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-teal-600 to-emerald-700 text-white flex items-center justify-center font-bold text-xl shadow-xs shrink-0">
                                <i class="bi bi-clipboard-data-fill"></i>
                            </div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Sistem Monitoring &amp; Evaluasi (Monev)</h2>
                                <p class="text-xs text-slate-500 mt-0.5">Monitoring kelengkapan variabel PODES, timeline tahapan Desa Cantik, serta portofolio bukti dukung pembinaan</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-black border border-emerald-300 flex items-center gap-1.5 shadow-2xs">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>Tahap 3 Aktif (Pengolahan)</span>
                            </span>
                        </div>
                    </div>

                    <!-- BAGIAN 1: TIMELINE TAHAPAN PEMBINAAN DESA CANTIK (MONEV PROGRESS) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-black text-slate-900 text-sm sm:text-base flex items-center gap-2">
                                    <span class="text-emerald-700"><i class="bi bi-clock-history"></i></span>
                                    <span>TIMELINE TAHAPAN PEMBINAAN DESA CANTIK</span>
                                </h4>
                                <p class="text-xs text-slate-400 mt-0.5">Alur pelaksanaan pembinaan berkala: Persiapan &rarr; Pengumpulan Data &rarr; Pengolahan &rarr; Publikasi BRS</p>
                            </div>
                            <span class="hidden sm:inline-flex px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 text-[11px] font-bold border border-blue-200">
                                Evaluasi Berkala BPS
                            </span>
                        </div>

                        <!-- 4-Phase Chevron Stepper -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 pt-1 select-none">
                            <!-- Step 1: Persiapan (100% Selesai) -->
                            <div class="p-3.5 rounded-xl bg-emerald-600 text-white shadow-xs relative overflow-hidden flex flex-col justify-between">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-black">1. Persiapan</span>
                                    <span class="text-sm font-bold">✓</span>
                                </div>
                                <div class="mt-2">
                                    <div class="text-[10px] text-emerald-100 font-medium">Sosialisasi &amp; SK Agen</div>
                                    <div class="w-full bg-emerald-900/40 rounded-full h-1.5 mt-1.5 overflow-hidden">
                                        <div class="bg-white h-full rounded-full" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Pengumpulan Data (100% Selesai) -->
                            <div class="p-3.5 rounded-xl bg-emerald-600 text-white shadow-xs relative overflow-hidden flex flex-col justify-between">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-black">2. Pengumpulan Data</span>
                                    <span class="text-sm font-bold">✓</span>
                                </div>
                                <div class="mt-2">
                                    <div class="text-[10px] text-emerald-100 font-medium">Sensus Monografi Dusun</div>
                                    <div class="w-full bg-emerald-900/40 rounded-full h-1.5 mt-1.5 overflow-hidden">
                                        <div class="bg-white h-full rounded-full" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3: Pengolahan (Sedang Berjalan - 85%) -->
                            <div class="p-3.5 rounded-xl bg-[#005ea6] text-white shadow-xs relative overflow-hidden flex flex-col justify-between ring-2 ring-blue-300">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-black">3. Pengolahan</span>
                                    <span class="px-1.5 py-0.5 rounded-md bg-amber-400 text-slate-950 font-black text-[9px] animate-pulse">Aktif (85%)</span>
                                </div>
                                <div class="mt-2">
                                    <div class="text-[10px] text-blue-100 font-medium">Validasi &amp; Entri SDI</div>
                                    <div class="w-full bg-blue-900/40 rounded-full h-1.5 mt-1.5 overflow-hidden">
                                        <div class="bg-amber-400 h-full rounded-full" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: Publikasi (Tahap Akhir) -->
                            <div class="p-3.5 rounded-xl bg-slate-100 text-slate-600 border border-slate-200 relative overflow-hidden flex flex-col justify-between">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-black text-slate-700">4. Publikasi</span>
                                    <span class="text-xs font-bold text-slate-400"><i class="bi bi-lock-fill"></i></span>
                                </div>
                                <div class="mt-2">
                                    <div class="text-[10px] text-slate-400 font-medium">Rilis BRS &amp; Infografis</div>
                                    <div class="w-full bg-slate-200 rounded-full h-1.5 mt-1.5 overflow-hidden">
                                        <div class="bg-slate-400 h-full rounded-full" style="width: 25%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BAGIAN 2: MONITORING KELENGKAPAN VARIABEL PODES -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <div>
                                <h4 class="font-black text-slate-900 text-sm sm:text-base flex items-center gap-2">
                                    <span class="text-teal-700"><i class="bi bi-bar-chart-steps"></i></span>
                                    <span>MONITORING KELENGKAPAN PODES (<span id="dcMonDesa">Desa</span>)</span>
                                </h4>
                                <p class="text-xs text-slate-500 mt-0.5">Evaluasi pengisian 44 variabel inti statistik potensi desa tahun 2026</p>
                            </div>
                            <span class="px-2.5 py-1 rounded-lg bg-teal-50 text-teal-800 text-[11px] font-bold border border-teal-200">
                                44 Variabel Inti
                            </span>
                        </div>

                        <div class="grid lg:grid-cols-2 gap-5 pt-1">
                            <!-- Progress Bar 4 Klaster Utama -->
                            <div id="dcMonitoring" class="space-y-3.5">
                                <div>
                                    <div class="flex justify-between text-[12.5px] font-medium">
                                        <span><span class="text-emerald-700 text-xs">●</span> 1. Data Kependudukan &amp; Ketenagakerjaan</span>
                                        <b class="text-[11px] text-emerald-800 font-bold">100% (12/12)</b>
                                    </div>
                                    <div class="dc-progress mt-1.5" style="height:6px;"><span style="width:100%;background:#0f6b4a;"></span></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-[12.5px] font-medium">
                                        <span><span class="text-emerald-700 text-xs">●</span> 2. Perumahan, Sanitasi &amp; Lingkungan Hidup</span>
                                        <b class="text-[11px] text-emerald-800 font-bold">100% (10/10)</b>
                                    </div>
                                    <div class="dc-progress mt-1.5" style="height:6px;"><span style="width:100%;background:#0f6b4a;"></span></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-[12.5px] font-medium">
                                        <span><span class="text-rose-600 text-xs">●</span> 3. Pertanian, Perkebunan &amp; Perikanan Bahari</span>
                                        <b class="text-[11px] text-rose-600 font-bold">85% (11/13)</b>
                                    </div>
                                    <div class="dc-progress mt-1.5" style="height:6px;"><span style="width:85%;background:#dc2626;"></span></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-[12.5px] font-medium">
                                        <span><span class="text-rose-600 text-xs">●</span> 4. Akses Transportasi &amp; Sarana Komunikasi</span>
                                        <b class="text-[11px] text-rose-600 font-bold">67% (6/9)</b>
                                    </div>
                                    <div class="dc-progress mt-1.5" style="height:6px;"><span style="width:67%;background:#dc2626;"></span></div>
                                </div>
                                <div class="rounded-xl p-3 flex items-start gap-2 text-[11.5px] text-slate-600 bg-[#f6f9f7] border border-[#e5e9e7]">
                                    <i class="bi bi-info-circle-fill text-emerald-700 text-sm shrink-0 mt-0.5"></i>
                                    <span>Tersisa 3 indikator komoditas perkebunan kakao dan cengkeh yang belum dilengkapi lampiran survei lapangan. Batas akhir konfirmasi rekonsiliasi data: 28 Oktober 2026.</span>
                                </div>
                            </div>

                            <!-- Chart Kelengkapan PODES -->
                            <div class="p-3 bg-slate-50/70 rounded-xl border border-slate-200">
                                <div class="flex items-center justify-between mb-2">
                                    <h6 class="font-bold text-xs text-slate-800">Kelengkapan PODES per Klaster</h6>
                                    <span class="text-[10px] text-slate-500">Terisi vs Belum Terisi</span>
                                </div>
                                <div class="relative" style="height:210px;"><canvas id="dcChartKelengkapan"></canvas></div>
                            </div>
                        </div>
                    </div>

                    <!-- BAGIAN 3: PORTOFOLIO BUKTI DUKUNG & EVALUASI BPS (MONEV) -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
                        <!-- Left Col: KELENGKAPAN BUKTI DUKUNG INTERNAL (MONEV) (8 Cols) -->
                        <div class="lg:col-span-8 bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-slate-100">
                                <div>
                                    <h4 class="font-black text-slate-900 text-sm sm:text-base flex items-center gap-2">
                                        <span class="text-indigo-700"><i class="bi bi-folder2-open"></i></span>
                                        <span>KELENGKAPAN BUKTI DUKUNG INTERNAL (MONEV)</span>
                                    </h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Portofolio Pelaksanaan Pembinaan Statistik Sektoral Tingkat Desa &amp; Kabupaten</p>
                                </div>
                                <!-- Sub-tab Bukti Dukung: Desa & Kabupaten -->
                                <div class="flex items-center gap-1 p-1 bg-slate-100 rounded-xl text-xs font-bold border border-slate-200">
                                    <button type="button" onclick="switchMonevBuktiTab('desa')" id="tabBuktiDesa" class="px-3 py-1.5 rounded-lg bg-white text-slate-900 shadow-xs transition cursor-pointer">
                                        A. Tingkat Desa
                                    </button>
                                    <button type="button" onclick="switchMonevBuktiTab('kab')" id="tabBuktiKab" class="px-3 py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition cursor-pointer">
                                        B. Tingkat Kabupaten
                                    </button>
                                </div>
                            </div>

                            <!-- Table of Bukti Dukung -->
                            <div class="overflow-x-auto">
                                <table class="w-full text-xs text-left">
                                    <thead class="bg-slate-100 text-slate-700 font-black uppercase text-[10px] tracking-wider border-b border-slate-200">
                                        <tr>
                                            <th class="py-2.5 px-3 w-10 text-center">No</th>
                                            <th class="py-2.5 px-4">Nama Dokumen Bukti Dukung</th>
                                            <th class="py-2.5 px-3 text-center">Status</th>
                                            <th class="py-2.5 px-4 text-center">File Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyMonevBukti" class="divide-y divide-slate-100 font-medium text-slate-800">
                                        <!-- Injected via renderBuktiDukungTables -->
                                    </tbody>
                                </table>
                            </div>

                            <!-- Upload Action -->
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                                <button type="button" onclick="openAddBuktiModal()" class="px-3.5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black transition flex items-center gap-1.5 cursor-pointer shadow-xs">
                                    <i class="bi bi-cloud-arrow-up-fill"></i>
                                    <span>Unggah Dokumen Bukti Dukung Baru</span>
                                </button>
                                <span class="text-[11px] text-slate-400">Penyimpanan Terverifikasi Cloud SDI BPS</span>
                            </div>
                        </div>

                        <!-- Right Col: Verifikasi BPS / Pemda (4 Cols) -->
                        <div class="lg:col-span-4 bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs flex flex-col justify-between space-y-4">
                            <div>
                                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                                    <span class="text-xs font-bold text-slate-500">Verifikasi BPS / Pemda:</span>
                                    <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 font-black text-xs border border-emerald-300 flex items-center gap-1">
                                        <span>✓</span>
                                        <span>TERVERIFIKASI</span>
                                    </span>
                                </div>

                                <div class="mt-4 text-center p-4 rounded-2xl bg-gradient-to-tr from-slate-900 to-[#005ea6] text-white shadow-md">
                                    <span class="text-xs font-bold text-blue-200 block">Nilai Kinerja Evaluasi Mandiri:</span>
                                    <div class="text-4xl font-black text-amber-300 mt-1">85%</div>
                                    <span class="inline-block mt-2 px-3 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-black border border-emerald-400/40">
                                        (Kategori: Mandiri)
                                    </span>
                                </div>

                                <!-- Progress Aspects -->
                                <div class="mt-4 space-y-2.5 text-xs">
                                    <div class="space-y-1">
                                        <div class="flex justify-between font-bold text-slate-700">
                                            <span>Standardisasi Metadata SDI</span>
                                            <span class="font-black text-emerald-700">90%</span>
                                        </div>
                                        <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden border border-slate-200">
                                            <div class="bg-emerald-600 h-full rounded-full" style="width: 90%"></div>
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <div class="flex justify-between font-bold text-slate-700">
                                            <span>Kualitas Data Sektoral</span>
                                            <span class="font-black text-blue-700">85%</span>
                                        </div>
                                        <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden border border-slate-200">
                                            <div class="bg-[#005ea6] h-full rounded-full" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <div class="flex justify-between font-bold text-slate-700">
                                            <span>Pemanfaatan WebGIS &amp; Publikasi</span>
                                            <span class="font-black text-indigo-700">80%</span>
                                        </div>
                                        <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden border border-slate-200">
                                            <div class="bg-indigo-600 h-full rounded-full" style="width: 80%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notes by BPS Kolut Tim Pembina -->
                            <div class="p-3.5 rounded-xl bg-amber-50 border border-amber-200 text-[11px] text-amber-900 leading-relaxed font-medium">
                                💡 <b>Rekomendasi BPS Kolut:</b> Seluruh indikator monitoring dan dokumen pembinaan Desa Cantik Kolaka Utara memenuhi standar Kategori Mandiri tahun 2026.
                            </div>
                        </div>
                    </div>

                </div></div>

                <!-- ===================================================================== -->
                <!-- MENU 3: PUBLIKASI & INFOGRAFIS STATISTIK DESA CANTIK BPS             -->
                <!-- ===================================================================== -->
                <div id="view-publikasi" class="menu-view-container hidden space-y-6 animate-in fade-in duration-200">
                    
                    <!-- Content Top Header Banner -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-700 text-white flex items-center justify-center font-bold text-xl shadow-xs shrink-0">
                                <i class="bi bi-file-earmark-bar-graph-fill"></i>
                            </div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Publikasi &amp; Infografis Statistik Desa</h2>
                                <p class="text-xs text-slate-500 mt-0.5">Diseminasi statistik resmi desa, buku monografi berstandar BPS, infografis capaian potensi wilayah, dan katalog metadata Satu Data Indonesia.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-black border border-emerald-300 flex items-center gap-1.5 shadow-2xs">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>Standar SDI BPS 2026</span>
                            </span>
                            <button type="button" onclick="window.print()" class="px-3.5 py-1.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center gap-1.5 shadow-2xs cursor-pointer">
                                <i class="bi bi-printer-fill text-emerald-600"></i>
                                <span>Cetak Halaman</span>
                            </button>
                        </div>
                    </div>

                    <!-- BAGIAN 1: BUKU MONOGRAFI DESA (PDF SIAP UNDUH) -->
                    <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/90 shadow-2xs space-y-5">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-slate-100">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-lg font-bold">
                                    <i class="bi bi-journal-bookmark-fill"></i>
                                </div>
                                <div>
                                    <h3 class="text-base sm:text-lg font-black text-slate-900">1. Buku Monografi Desa &amp; Laporan Statistik Resmi</h3>
                                    <p class="text-xs text-slate-500">Dokumen monografi komprehensif siap unduh memuat kompilasi kependudukan, potensi pertanian, dan keuangan desa</p>
                                </div>
                            </div>
                            <span class="text-xs font-extrabold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-xl border border-emerald-200 self-start sm:self-auto">
                                3 Dokumen Publikasi
                            </span>
                        </div>

                        <!-- 3 Kartu Buku Monografi -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                            
                            <!-- Kartu 1: Monografi Desa Terpilih -->
                            <div class="rounded-2xl border border-emerald-500/30 bg-gradient-to-b from-emerald-50/40 via-white to-white p-5 flex flex-col justify-between hover:shadow-md transition-all group">
                                <div>
                                    <div class="flex items-center justify-between gap-2 mb-3">
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black bg-emerald-600 text-white tracking-wide uppercase">Publikasi Utama</span>
                                        <span class="text-[11px] font-bold text-slate-400">Q1 2026</span>
                                    </div>
                                    <!-- Book Mockup Preview -->
                                    <div class="w-full aspect-[4/3] rounded-xl bg-gradient-to-br from-emerald-800 to-teal-950 p-4 text-white flex flex-col justify-between shadow-xs mb-4 relative overflow-hidden group-hover:scale-[1.02] transition-transform">
                                        <div class="absolute -right-6 -bottom-6 opacity-10 pointer-events-none">
                                            <i class="bi bi-journal-text text-8xl"></i>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-1.5">
                                                <span class="text-[9px] font-black tracking-wider uppercase px-2 py-0.5 rounded bg-emerald-500/40 border border-emerald-400/30">BPS SDI</span>
                                            </div>
                                            <i class="bi bi-shield-check text-emerald-300 text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="text-[11px] font-medium text-emerald-200">MONOGRAFI RESMI</div>
                                            <div id="pubBookVillageTitle" class="text-lg font-black leading-tight text-white mt-0.5">Desa Kamisi 2026</div>
                                            <div class="text-[10px] text-emerald-100/80 mt-1">Kabupaten Kolaka Utara • Sulawesi Tenggara</div>
                                        </div>
                                    </div>
                                    <h4 id="pubCard1Title" class="font-extrabold text-slate-800 text-sm leading-snug">Monografi Statistik Sektoral Desa Kamisi 2026</h4>
                                    <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">Kompilasi resmi hasil pendataan sensus PODES BPS memuat data demografi lengkap 3 dusun, potensi kakao, perikanan bahari, dan sanitasi keluarga.</p>
                                    
                                    <div class="mt-4 pt-3 border-t border-slate-100 space-y-1.5 text-[11px] text-slate-600">
                                        <div class="flex justify-between"><span>Nomor Registrasi:</span><span class="font-bold text-slate-800">BPS-7408-DESCAN-2026</span></div>
                                        <div class="flex justify-between"><span>Jumlah Halaman:</span><span class="font-bold text-slate-800">58 Halaman</span></div>
                                        <div class="flex justify-between"><span>Ukuran File:</span><span class="font-bold text-slate-800">4,8 MB (PDF High-Res)</span></div>
                                    </div>
                                </div>
                                <div class="mt-5 pt-3 flex items-center gap-2">
                                    <button type="button" onclick="downloadPublicationDoc('Monografi_Desa_Kamisi_2026.pdf')" class="flex-1 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs transition flex items-center justify-center gap-1.5 shadow-xs cursor-pointer active:scale-95">
                                        <i class="bi bi-file-earmark-pdf-fill"></i>
                                        <span>Unduh PDF</span>
                                    </button>
                                    <button type="button" onclick="openDocumentViewerModal('monografi')" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition flex items-center gap-1 cursor-pointer">
                                        <i class="bi bi-eye-fill"></i>
                                        <span>Baca</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Kartu 2: Kompilasi Monografi 6 Desa Binaan -->
                            <div class="rounded-2xl border border-slate-200 bg-white p-5 flex flex-col justify-between hover:shadow-md transition-all group">
                                <div>
                                    <div class="flex items-center justify-between gap-2 mb-3">
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black bg-blue-600 text-white tracking-wide uppercase">Edisi Wilayah</span>
                                        <span class="text-[11px] font-bold text-slate-400">Tahunan</span>
                                    </div>
                                    <!-- Book Mockup Preview -->
                                    <div class="w-full aspect-[4/3] rounded-xl bg-gradient-to-br from-blue-900 to-indigo-950 p-4 text-white flex flex-col justify-between shadow-xs mb-4 relative overflow-hidden group-hover:scale-[1.02] transition-transform">
                                        <div class="absolute -right-6 -bottom-6 opacity-10 pointer-events-none">
                                            <i class="bi bi-book-half text-8xl"></i>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <span class="text-[9px] font-black tracking-wider uppercase px-2 py-0.5 rounded bg-blue-500/40 border border-blue-400/30">Kompilasi Makro</span>
                                            <i class="bi bi-star-fill text-amber-300 text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="text-[11px] font-medium text-blue-200">LAPORAN PEMBINAAN</div>
                                            <div class="text-base font-black leading-tight text-white mt-0.5">Statistik 6 Desa Binaan</div>
                                            <div class="text-[10px] text-blue-100/80 mt-1">Kec. Kodeoha &amp; Kec. Tiwu • 2.426 KK Terdata</div>
                                        </div>
                                    </div>
                                    <h4 class="font-extrabold text-slate-800 text-sm leading-snug">Kompilasi Statistik 6 Desa Binaan Kolaka Utara 2026</h4>
                                    <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">Telaah komparasi statistik terpadu 6 desa (Kamisi, Koroha, Mala-Mala, Lapolu, Tanggeawo, Mattiro Bulu) dengan 44 indikator makro berstandar SDI.</p>
                                    
                                    <div class="mt-4 pt-3 border-t border-slate-100 space-y-1.5 text-[11px] text-slate-600">
                                        <div class="flex justify-between"><span>Nomor Registrasi:</span><span class="font-bold text-slate-800">BPS-7408-KOMP-06-2026</span></div>
                                        <div class="flex justify-between"><span>Jumlah Halaman:</span><span class="font-bold text-slate-800">128 Halaman</span></div>
                                        <div class="flex justify-between"><span>Ukuran File:</span><span class="font-bold text-slate-800">9,2 MB (PDF Full)</span></div>
                                    </div>
                                </div>
                                <div class="mt-5 pt-3 flex items-center gap-2">
                                    <button type="button" onclick="downloadPublicationDoc('Kompilasi_Monografi_6_Desa_Kolut_2026.pdf')" class="flex-1 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition flex items-center justify-center gap-1.5 shadow-xs cursor-pointer active:scale-95">
                                        <i class="bi bi-file-earmark-pdf-fill"></i>
                                        <span>Unduh PDF</span>
                                    </button>
                                    <button type="button" onclick="openDocumentViewerModal('monografi')" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition flex items-center gap-1 cursor-pointer">
                                        <i class="bi bi-eye-fill"></i>
                                        <span>Baca</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Kartu 3: Berita Resmi Statistik Desa -->
                            <div class="rounded-2xl border border-slate-200 bg-white p-5 flex flex-col justify-between hover:shadow-md transition-all group">
                                <div>
                                    <div class="flex items-center justify-between gap-2 mb-3">
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black bg-amber-600 text-white tracking-wide uppercase">Rilis Berkala</span>
                                        <span class="text-[11px] font-bold text-slate-400">No. 01/2026</span>
                                    </div>
                                    <!-- Book Mockup Preview -->
                                    <div class="w-full aspect-[4/3] rounded-xl bg-gradient-to-br from-slate-800 to-amber-950 p-4 text-white flex flex-col justify-between shadow-xs mb-4 relative overflow-hidden group-hover:scale-[1.02] transition-transform">
                                        <div class="absolute -right-6 -bottom-6 opacity-10 pointer-events-none">
                                            <i class="bi bi-newspaper text-8xl"></i>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <span class="text-[9px] font-black tracking-wider uppercase px-2 py-0.5 rounded bg-amber-500/40 border border-amber-400/30">BRS DESCAN</span>
                                            <i class="bi bi-graph-up-arrow text-amber-300 text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="text-[11px] font-medium text-amber-200">BERITA RESMI STATISTIK</div>
                                            <div class="text-base font-black leading-tight text-white mt-0.5">Indikator Kesejahteraan</div>
                                            <div class="text-[10px] text-amber-100/80 mt-1">Tren Bansos, P3KE, dan Kemiskinan Ekstrem</div>
                                        </div>
                                    </div>
                                    <h4 class="font-extrabold text-slate-800 text-sm leading-snug">Berita Resmi Statistik (BRS) Desa Cantik 2026</h4>
                                    <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">Lembar ringkasan eksekutif perkembangan indikator kesejahteraan sosial, keterbukaan informasi publik, dan serapan tenaga kerja desa.</p>
                                    
                                    <div class="mt-4 pt-3 border-t border-slate-100 space-y-1.5 text-[11px] text-slate-600">
                                        <div class="flex justify-between"><span>Seri Terbit:</span><span class="font-bold text-slate-800">BRS-DESCAN-01/2026</span></div>
                                        <div class="flex justify-between"><span>Jumlah Halaman:</span><span class="font-bold text-slate-800">18 Halaman</span></div>
                                        <div class="flex justify-between"><span>Ukuran File:</span><span class="font-bold text-slate-800">2,1 MB (PDF Ringkas)</span></div>
                                    </div>
                                </div>
                                <div class="mt-5 pt-3 flex items-center gap-2">
                                    <button type="button" onclick="downloadPublicationDoc('BRS_Desa_Cantik_Kolut_2026.pdf')" class="flex-1 py-2 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs transition flex items-center justify-center gap-1.5 shadow-xs cursor-pointer active:scale-95">
                                        <i class="bi bi-file-earmark-pdf-fill"></i>
                                        <span>Unduh PDF</span>
                                    </button>
                                    <button type="button" onclick="openDocumentViewerModal('monografi')" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition flex items-center gap-1 cursor-pointer">
                                        <i class="bi bi-eye-fill"></i>
                                        <span>Baca</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- BAGIAN 2: INFOGRAFIS STATISTIK DESA (KARTU RINGKASAN VISUAL) -->
                    <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/90 shadow-2xs space-y-5">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-slate-100">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center text-lg font-bold">
                                    <i class="bi bi-pie-chart-fill"></i>
                                </div>
                                <div>
                                    <h3 class="text-base sm:text-lg font-black text-slate-900">2. Infografis Statistik &amp; Potensi Unggulan Desa</h3>
                                    <p class="text-xs text-slate-500">Visualisasi data ringkas, menarik, dan informatif untuk materi sosialisasi warga serta forum musrenbangdes</p>
                                </div>
                            </div>
                            <span class="text-xs font-extrabold text-teal-700 bg-teal-50 px-3 py-1 rounded-xl border border-teal-200 self-start sm:self-auto">
                                4 Topik Infografis
                            </span>
                        </div>

                        <!-- 4 Kartu Infografis Visual -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            
                            <!-- Infografis 1: Demografi & Penduduk -->
                            <div class="rounded-2xl border border-emerald-200 bg-gradient-to-b from-emerald-50/70 to-white p-4.5 flex flex-col justify-between shadow-2xs hover:shadow-md transition-all">
                                <div>
                                    <div class="flex items-center justify-between gap-2 mb-2.5">
                                        <span class="text-[10px] font-black text-emerald-800 bg-emerald-100 px-2.5 py-0.5 rounded-full uppercase tracking-wider">Demografi</span>
                                        <span class="text-xs text-emerald-600 font-bold"><i class="bi bi-people-fill"></i></span>
                                    </div>
                                    <h4 class="font-extrabold text-slate-900 text-sm">Struktur Kependudukan</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5">Komposisi jiwa, keluarga, dan rasio jenis kelamin</p>

                                    <div class="mt-4 p-3 rounded-xl bg-white border border-emerald-100 shadow-2xs space-y-2">
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Total Jiwa:</span>
                                            <span id="pubInfoJiwa" class="text-base font-black text-emerald-700">1.197 Jiwa</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Keluarga (KK):</span>
                                            <span id="pubInfoKK" class="text-xs font-bold text-slate-800">394 KK</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Sex Ratio:</span>
                                            <span class="text-xs font-bold text-slate-800">107,81</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Usia Produktif:</span>
                                            <span class="text-xs font-black text-emerald-600">68,4%</span>
                                        </div>
                                    </div>

                                    <!-- Visual bar usia -->
                                    <div class="mt-3 space-y-1">
                                        <div class="flex justify-between text-[10px] text-slate-500 font-semibold">
                                            <span>0-14 Th (21%)</span>
                                            <span>15-64 Th (68%)</span>
                                            <span>65+ Th (11%)</span>
                                        </div>
                                        <div class="h-2 rounded-full bg-slate-100 flex overflow-hidden">
                                            <span style="width: 21%;" class="bg-teal-400" title="Anak-anak: 21%"></span>
                                            <span style="width: 68%;" class="bg-emerald-600" title="Produktif: 68%"></span>
                                            <span style="width: 11%;" class="bg-amber-400" title="Lansia: 11%"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2.5 border-t border-emerald-100 flex items-center gap-1.5">
                                    <button type="button" onclick="downloadPublicationDoc('Infografis_Demografi_Desa.png')" class="flex-1 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-[11px] transition flex items-center justify-center gap-1 shadow-2xs cursor-pointer">
                                        <i class="bi bi-download"></i>
                                        <span>Unduh Gambar</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Infografis 2: Potensi Kakao & Perkebunan -->
                            <div class="rounded-2xl border border-amber-200 bg-gradient-to-b from-amber-50/70 to-white p-4.5 flex flex-col justify-between shadow-2xs hover:shadow-md transition-all">
                                <div>
                                    <div class="flex items-center justify-between gap-2 mb-2.5">
                                        <span class="text-[10px] font-black text-amber-800 bg-amber-100 px-2.5 py-0.5 rounded-full uppercase tracking-wider">Perkebunan</span>
                                        <span class="text-xs text-amber-600 font-bold"><i class="bi bi-tree-fill"></i></span>
                                    </div>
                                    <h4 class="font-extrabold text-slate-900 text-sm">Sentra Kakao &amp; IMK</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5">Komoditas andalan dan unit industri mikro</p>

                                    <div class="mt-4 p-3 rounded-xl bg-white border border-amber-100 shadow-2xs space-y-2">
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Komoditas Utama:</span>
                                            <span class="text-xs font-black text-amber-700">Kakao Sambung</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Luas Perkebunan:</span>
                                            <span class="text-xs font-bold text-slate-800">184 Hektar</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Industri Mikro (IMK):</span>
                                            <span id="pubInfoIMK" class="text-xs font-bold text-slate-800">14 Unit Usaha</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Produktivitas:</span>
                                            <span class="text-xs font-black text-amber-600">1,25 Ton/Ha/Th</span>
                                        </div>
                                    </div>

                                    <div class="mt-3 p-2 rounded-lg bg-amber-50/80 border border-amber-200/60 text-[10.5px] text-amber-900 leading-snug">
                                        <i class="bi bi-check-circle-fill text-amber-600 mr-1"></i> 100% Petani terhubung akses KUR &amp; kelompok tani binaan.
                                    </div>
                                </div>
                                <div class="mt-4 pt-2.5 border-t border-amber-100 flex items-center gap-1.5">
                                    <button type="button" onclick="downloadPublicationDoc('Infografis_Sentra_Kakao_Desa.png')" class="flex-1 py-1.5 rounded-lg bg-amber-600 hover:bg-amber-700 text-white font-bold text-[11px] transition flex items-center justify-center gap-1 shadow-2xs cursor-pointer">
                                        <i class="bi bi-download"></i>
                                        <span>Unduh Gambar</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Infografis 3: Bahari & Pesisir -->
                            <div class="rounded-2xl border border-sky-200 bg-gradient-to-b from-sky-50/70 to-white p-4.5 flex flex-col justify-between shadow-2xs hover:shadow-md transition-all">
                                <div>
                                    <div class="flex items-center justify-between gap-2 mb-2.5">
                                        <span class="text-[10px] font-black text-sky-800 bg-sky-100 px-2.5 py-0.5 rounded-full uppercase tracking-wider">Pesisir &amp; Laut</span>
                                        <span class="text-xs text-sky-600 font-bold"><i class="bi bi-water"></i></span>
                                    </div>
                                    <h4 class="font-extrabold text-slate-900 text-sm">Potensi Bahari &amp; Teri</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5">Perikanan tangkap Teluk Bone Kolut</p>

                                    <div class="mt-4 p-3 rounded-xl bg-white border border-sky-100 shadow-2xs space-y-2">
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Armada Perahu:</span>
                                            <span class="text-xs font-black text-sky-700">42 Unit Perahu</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Ikan Teri Tradisional:</span>
                                            <span class="text-xs font-bold text-slate-800">35 Ton / Tahun</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Pencemaran Air:</span>
                                            <span class="text-xs font-bold text-emerald-600">Bebas Tercemar</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Akses TPI / Pasar:</span>
                                            <span class="text-xs font-black text-sky-600">Tersedia Langsung</span>
                                        </div>
                                    </div>

                                    <div class="mt-3 p-2 rounded-lg bg-sky-50/80 border border-sky-200/60 text-[10.5px] text-sky-900 leading-snug">
                                        <i class="bi bi-check-circle-fill text-sky-600 mr-1"></i> Penjemuran ikan teri higienis standar ekspor regional.
                                    </div>
                                </div>
                                <div class="mt-4 pt-2.5 border-t border-sky-100 flex items-center gap-1.5">
                                    <button type="button" onclick="downloadPublicationDoc('Infografis_Pesisir_Bahari_Desa.png')" class="flex-1 py-1.5 rounded-lg bg-sky-600 hover:bg-sky-700 text-white font-bold text-[11px] transition flex items-center justify-center gap-1 shadow-2xs cursor-pointer">
                                        <i class="bi bi-download"></i>
                                        <span>Unduh Gambar</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Infografis 4: Sanitasi & Tata Kelola -->
                            <div class="rounded-2xl border border-teal-200 bg-gradient-to-b from-teal-50/70 to-white p-4.5 flex flex-col justify-between shadow-2xs hover:shadow-md transition-all">
                                <div>
                                    <div class="flex items-center justify-between gap-2 mb-2.5">
                                        <span class="text-[10px] font-black text-teal-800 bg-teal-100 px-2.5 py-0.5 rounded-full uppercase tracking-wider">Tata Kelola &amp; Sanitasi</span>
                                        <span class="text-xs text-teal-600 font-bold"><i class="bi bi-shield-fill-check"></i></span>
                                    </div>
                                    <h4 class="font-extrabold text-slate-900 text-sm">Elektrifikasi &amp; Sanitasi</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5">Akses fasilitas primer dan aset desa</p>

                                    <div class="mt-4 p-3 rounded-xl bg-white border border-teal-100 shadow-2xs space-y-2">
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Listrik PLN:</span>
                                            <span class="text-xs font-black text-emerald-700">100% (394 KK)</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Jamban Sendiri:</span>
                                            <span class="text-xs font-bold text-slate-800">92,4% KK</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Status SISKEUDES:</span>
                                            <span class="text-xs font-bold text-emerald-600">Diperbaharui</span>
                                        </div>
                                        <div class="flex justify-between items-baseline">
                                            <span class="text-xs text-slate-500">Unit BUMDes:</span>
                                            <span class="text-xs font-black text-teal-700">1 Unit Aktif</span>
                                        </div>
                                    </div>

                                    <div class="mt-3 p-2 rounded-lg bg-teal-50/80 border border-teal-200/60 text-[10.5px] text-teal-900 leading-snug">
                                        <i class="bi bi-check-circle-fill text-teal-600 mr-1"></i> Bebas buang air besar sembarangan (ODF Terverifikasi).
                                    </div>
                                </div>
                                <div class="mt-4 pt-2.5 border-t border-teal-100 flex items-center gap-1.5">
                                    <button type="button" onclick="downloadPublicationDoc('Infografis_Sanitasi_TataKelola_Desa.png')" class="flex-1 py-1.5 rounded-lg bg-teal-600 hover:bg-teal-700 text-white font-bold text-[11px] transition flex items-center justify-center gap-1 shadow-2xs cursor-pointer">
                                        <i class="bi bi-download"></i>
                                        <span>Unduh Gambar</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- BAGIAN 3: STANDAR METADATA STATISTIK SEKTORAL DESA (PRINSIP SDI) -->
                    <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/90 shadow-2xs space-y-5">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-4 border-b border-slate-100">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center text-lg font-bold">
                                    <i class="bi bi-table"></i>
                                </div>
                                <div>
                                    <h3 class="text-base sm:text-lg font-black text-slate-900">3. Standar Metadata Statistik Sektoral (Prinsip SDI)</h3>
                                    <p class="text-xs text-slate-500">Kamus dan spesifikasi variabel resmi pendataan Potensi Desa (PODES 2025) terstandarisasi BPS Kolaka Utara</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 self-start md:self-auto">
                                <button type="button" onclick="exportMetadataCSV()" class="px-3 py-1.5 rounded-xl bg-indigo-50 hover:bg-indigo-100 text-indigo-700 border border-indigo-200 text-xs font-bold transition flex items-center gap-1.5 shadow-2xs cursor-pointer">
                                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                    <span>Ekspor CSV</span>
                                </button>
                                <button type="button" onclick="copyAllMetadata()" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-clipboard-check"></i>
                                    <span>Salin Variabel</span>
                                </button>
                            </div>
                        </div>

                        <!-- Bar Pencarian & Filter Kategori Metadata -->
                        <div class="flex flex-col md:flex-row gap-3 items-stretch md:items-center justify-between">
                            <div class="relative flex-1 max-w-md">
                                <i class="bi bi-search absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                                <input type="text" id="metadataSearchInput" onkeyup="filterMetadataRows(this.value)" placeholder="Cari nama variabel, kode, atau konsep definisi..." class="w-full pl-9 pr-3 py-2 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 text-xs text-slate-800 placeholder-slate-400 shadow-2xs">
                            </div>
                            <div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0 text-xs">
                                <button type="button" onclick="filterMetadataCategory('all')" id="meta-pill-all" class="meta-pill active px-3 py-1.5 rounded-lg text-xs font-bold transition cursor-pointer bg-emerald-600 text-white shrink-0">Semua (12)</button>
                                <button type="button" onclick="filterMetadataCategory('kependudukan')" id="meta-pill-kependudukan" class="meta-pill px-3 py-1.5 rounded-lg text-xs font-bold transition cursor-pointer bg-slate-100 hover:bg-slate-200 text-slate-600 shrink-0">Kependudukan</button>
                                <button type="button" onclick="filterMetadataCategory('ekonomi')" id="meta-pill-ekonomi" class="meta-pill px-3 py-1.5 rounded-lg text-xs font-bold transition cursor-pointer bg-slate-100 hover:bg-slate-200 text-slate-600 shrink-0">Ekonomi &amp; IMK</button>
                                <button type="button" onclick="filterMetadataCategory('infrastruktur')" id="meta-pill-infrastruktur" class="meta-pill px-3 py-1.5 rounded-lg text-xs font-bold transition cursor-pointer bg-slate-100 hover:bg-slate-200 text-slate-600 shrink-0">Fisik &amp; Sanitasi</button>
                                <button type="button" onclick="filterMetadataCategory('tatakelola')" id="meta-pill-tatakelola" class="meta-pill px-3 py-1.5 rounded-lg text-xs font-bold transition cursor-pointer bg-slate-100 hover:bg-slate-200 text-slate-600 shrink-0">Tata Kelola</button>
                            </div>
                        </div>

                        <!-- Tabel Metadata SDI BPS -->
                        <div class="overflow-x-auto border border-slate-200 rounded-xl shadow-2xs">
                            <table class="w-full text-left border-collapse text-xs">
                                <thead>
                                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-[11px] font-black uppercase tracking-wider">
                                        <th class="py-3 px-3.5 w-24">Kode</th>
                                        <th class="py-3 px-3.5 w-48">Nama Variabel</th>
                                        <th class="py-3 px-3.5">Konsep &amp; Definisi Operasional BPS</th>
                                        <th class="py-3 px-3 w-28">Satuan</th>
                                        <th class="py-3 px-3 w-40">Klasifikasi / Skala</th>
                                        <th class="py-3 px-3 w-32">Produsen Data</th>
                                    </tr>
                                </thead>
                                <tbody id="metadataTableBody" class="divide-y divide-slate-100 text-slate-700">
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="kependudukan">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-emerald-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-emerald-100">PODES-0101</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Jumlah Penduduk Menurut Jenis Kelamin</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Seluruh orang yang berdomisili di wilayah geografis desa selama 6 bulan atau lebih, atau kurang dari 6 bulan tetapi bermaksud menetap, dirinci menurut laki-laki dan perempuan.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Jiwa</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">Numerik Riil (Disagregasi L/P)</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">Dukcapil &amp; BPS</td>
                                    </tr>
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="kependudukan">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-emerald-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-emerald-100">PODES-0102</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Jumlah Kepala Keluarga (KK)</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Seseorang atau sekelompok orang yang mendiami sebagian atau seluruh bangunan fisik/sensus dan tinggal bersama serta pengelolaan kebutuhan makannya dari satu dapur.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Keluarga (KK)</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">Numerik Riil</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">Pemerintah Desa</td>
                                    </tr>
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="infrastruktur">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-sky-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-sky-100">PODES-0201</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Keberadaan Fasilitas Pendidikan PAUD/TK</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Ketersediaan sarana prasarana formal/non-formal pendidikan anak usia dini atau taman kanak-kanak yang aktif melayani peserta didik di dalam desa.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Unit Sekolah</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">1: Ada di Desa, 2: Tidak Ada</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">Kemendikdasmen &amp; BPS</td>
                                    </tr>
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="infrastruktur">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-sky-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-sky-100">PODES-0202</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Sarana Pelayanan Kesehatan (Pustu / Poskesdes)</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Keberadaan fasilitas pelayanan kesehatan primer berstatus pembantu atau pos kesehatan desa dengan bidan/perawat aktif yang berdomisili di desa.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Unit Fasilitas</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">1: Ada di Desa, 2: Tidak Ada</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">Dinas Kesehatan &amp; BPS</td>
                                    </tr>
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="infrastruktur">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-teal-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-teal-100">PODES-0301</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Sumber Penerangan Utama Bangunan Rumah</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Jenis energi utama yang digunakan untuk penerangan rumah tangga, dikategorikan menurut jaringan kabel PLN dan sumber mandiri/non-PLN terbarukan.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Jumlah KK (%)</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">1: Listrik PLN, 2: Non-PLN, 3: Bukan Listrik</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">PT PLN &amp; BPS</td>
                                    </tr>
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="infrastruktur">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-teal-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-teal-100">PODES-0302</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Kepemilikan Fasilitas Jamban Keluarga Sendiri</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Fasilitas tempat buang air besar yang digunakan khusus oleh anggota keluarga bersangkutan dengan tempat penampungan akhir tinja (tangki septik/SPAL) kedap air.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Jumlah KK (%)</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">1: Jamban Sendiri, 2: Bersama, 3: Jamban Umum</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">Kemenkes &amp; BPS</td>
                                    </tr>
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="ekonomi">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-amber-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-amber-100">PODES-0401</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Komoditas Utama Tanaman Perkebunan</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Jenis komoditas tanaman tahunan yang diusahakan oleh sebagian besar masyarakat desa dengan luasan panen atau nilai ekonomi penjualan terbesar.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Komoditas &amp; Ha</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">1: Kakao, 2: Cengkeh, 3: Nilam, 4: Kelapa</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">Dinas Perkebunan &amp; BPS</td>
                                    </tr>
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="ekonomi">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-amber-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-amber-100">PODES-0402</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Industri Mikro dan Kecil (IMK) Aktif</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Kegiatan ekonomi produktif yang mengubah barang dasar menjadi barang jadi atau setengah jadi dengan jumlah pekerja tetap antara 1 sampai 19 orang.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Unit Usaha</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">Numerik Usaha Aktif</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">BPS Kolaka Utara</td>
                                    </tr>
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="tatakelola">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-indigo-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-indigo-100">PODES-0501</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Status Keberadaan BUMDes Berbadan Hukum</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Badan usaha milik desa yang seluruh atau sebagian besar modalnya dimiliki desa dan telah mengantongi sertifikat badan hukum dari Kemenkumham.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Status Legalitas</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">1: Berbadan Hukum, 2: Terdaftar, 3: Belum Ada</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">Kemendesa PDTT &amp; BPS</td>
                                    </tr>
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="tatakelola">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-indigo-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-indigo-100">PODES-0502</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Penerapan SISKEUDES Online</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Pemanfaatan aplikasi Sistem Keuangan Desa berbasis web/jaringan untuk penyusunan perencanaan, penganggaran APBDes, penatausahaan, dan pelaporan keuangan.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Status Sistem</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">1: Online Terkoneksi, 2: Offline Desktop</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">BPKP, DPMD &amp; BPS</td>
                                    </tr>
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="infrastruktur">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-rose-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-rose-100">PODES-0601</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Mitigasi &amp; Sistem Peringatan Dini Bencana Alam</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Ketersediaan rambu evakuasi, sirine/kentongan peringatan dini tsunami/banjir, serta posko kesiapsiagaan bencana desa.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Kesiapan Desa</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">1: Ada Sistem Peringatan Dini, 2: Tidak Ada</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">BPBD &amp; BPS</td>
                                    </tr>
                                    <tr class="metadata-row hover:bg-emerald-50/40 transition" data-cat="infrastruktur">
                                        <td class="py-2.5 px-3.5 font-mono font-bold text-emerald-800 text-[11px]"><span class="px-2 py-0.5 rounded bg-emerald-100">PODES-0602</span></td>
                                        <td class="py-2.5 px-3.5 font-bold text-slate-900">Pencemaran Lingkungan Pesisir &amp; Air</td>
                                        <td class="py-2.5 px-3.5 text-slate-600">Kondisi perairan laut, pantai, sungai, atau tanah yang terkontaminasi limbah kimia, sampah domestik, atau tumpahan minyak dalam 1 tahun terakhir.</td>
                                        <td class="py-2.5 px-3 font-semibold text-slate-800">Status Mutu</td>
                                        <td class="py-2.5 px-3 text-[11px] text-slate-600">1: Bebas Tercemar, 2: Tercemar</td>
                                        <td class="py-2.5 px-3 text-[11px] font-bold text-slate-700">Dinas Lingkungan Hidup</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


                <!-- ===================================================================== -->
                <!-- 2. PROFIL DESA (MONOGRAFI & EKSPLORASI GEOSPASIAL EDITORIAL)          -->
                <!-- ===================================================================== -->
                <div id="view-tentang" class="menu-view-container hidden space-y-6 animate-in fade-in duration-300">
                    
                    <!-- 1. PANORAMA BENTANG ALAM & IDENTITAS WILAYAH -->
                    <div class="relative w-full rounded-3xl overflow-hidden shadow-md border border-slate-200/80 bg-slate-900 group">
                        <!-- Landscape Scenic Background Photo -->
                        <div class="h-64 sm:h-72 lg:h-80 w-full relative overflow-hidden">
                            <img id="profil3dLandscapeBg" src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85" alt="Panorama Desa" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/45 to-slate-950/15"></div>
                            
                            <!-- Top Ambient Badges -->
                            <div class="absolute top-4 sm:top-5 left-4 sm:left-6 right-4 sm:right-6 flex flex-wrap items-center justify-between gap-2.5 z-10">
                                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-900/80 border border-white/25 text-white text-[11px] font-bold backdrop-blur-md shadow-md">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>BPS KOLAKA UTARA • DESA CANTIK 2026</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span id="profil3dBadgeKategori" class="px-3.5 py-1.5 rounded-full bg-emerald-400 text-slate-950 font-black text-[11px] shadow-md">
                                        Perkotaan Mandiri (Nilai 93%)
                                    </span>
                                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-slate-900/80 text-white text-[11px] font-bold backdrop-blur-md border border-white/25 shadow-md">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        <span>Satu Data Indonesia</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Bottom Identity Banner with Village Portrait -->
                            <div class="absolute bottom-4 sm:bottom-6 left-4 sm:left-6 right-4 sm:right-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4 z-10">
                                <div class="flex items-center gap-3.5 sm:gap-4 min-w-0">
                                    <img id="profil3dHeroPhoto" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=300&q=80" alt="Foto Desa" onclick="openGaleriDesaModal()" class="w-16 h-16 sm:w-20 sm:h-20 lg:w-22 lg:h-22 rounded-2xl object-cover border-3 border-white shadow-xl shrink-0 bg-slate-800 cursor-pointer hover:scale-105 transition-transform" title="Klik untuk membuka Galeri Foto Desa">
                                    <div class="min-w-0">
                                        <div class="text-[10.5px] sm:text-xs font-black tracking-widest text-emerald-300 uppercase">
                                            MONOGRAFI &amp; INDIKATOR PEMBANGUNAN WILAYAH
                                        </div>
                                        <h1 id="profil3dHeroDesaName" class="text-2xl sm:text-3xl lg:text-4xl font-black text-white tracking-tight uppercase leading-tight truncate drop-shadow-sm">
                                            Kelurahan Mala-Mala
                                        </h1>
                                        <p id="profil3dHeroKecamatan" class="text-xs sm:text-sm text-emerald-100/90 font-medium truncate mt-0.5">
                                            Kecamatan Kodeoha, Kabupaten Kolaka Utara • Terintegrasi Potensi Desa (PODES) 2025 BPS RI
                                        </p>
                                    </div>
                                </div>

                                <!-- Action Buttons in Panorama -->
                                <div class="flex items-center gap-2 shrink-0 flex-wrap">
                                    <button type="button" onclick="openGaleriDesaModal()" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-slate-900/80 hover:bg-slate-900 active:scale-95 text-white font-bold text-xs border border-white/25 backdrop-blur-md shadow-md hover:shadow-lg transition-all duration-200 cursor-pointer" title="Buka Galeri Foto Resmi Desa">
                                        <i class="bi bi-images text-amber-300"></i>
                                        <span class="hidden sm:inline">Galeri Foto Desa</span>
                                        <span class="sm:hidden">Galeri</span>
                                    </button>
                                    <button type="button" onclick="openPublikasiDocModal('monografi')" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-white hover:bg-emerald-50 active:scale-95 text-[#0a4d36] font-extrabold text-xs shadow-md hover:shadow-lg border border-white/40 transition-all duration-200 cursor-pointer" title="Buka Pratinjau Buku Monografi Resmi PDF">
                                        <i class="bi bi-file-earmark-pdf-fill text-rose-600 text-sm"></i>
                                        <span class="hidden sm:inline">Buku Monografi (PDF)</span>
                                        <span class="sm:hidden">Monografi</span>
                                    </button>
                                    <button type="button" onclick="scrollToDashSection('sectionPeta')" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-slate-900/80 hover:bg-slate-900 active:scale-95 text-white font-bold text-xs border border-white/25 backdrop-blur-md shadow-md hover:shadow-lg transition-all duration-200 cursor-pointer" title="Lihat Peta Spasial WebGIS Desa">
                                        <i class="bi bi-map-fill text-emerald-300"></i>
                                        <span class="hidden sm:inline">Peta WebGIS</span>
                                        <span class="sm:hidden">Peta</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. TATA LETAK ASIMETRIS (DOSSIER PASPOR WILAYAH + EKSPLORASI SEKTORAL) -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                        
                        <!-- ============================================================== -->
                        <!-- SISI KIRI: PASPOR RESMI & DOSSIER MONOGRAFI WILAYAH (4 Kolom)  -->
                        <!-- ============================================================== -->
                        <div class="lg:col-span-5 xl:col-span-4 space-y-5">
                            
                            <!-- Lembar Paspor Identitas Wilayah -->
                            <div class="bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/90 shadow-xs space-y-4 relative overflow-hidden">
                                <div class="absolute -right-6 -bottom-6 w-32 h-32 rounded-full bg-emerald-50 pointer-events-none"></div>

                                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                                        <span class="text-xs font-black text-slate-800 tracking-wider uppercase">Lembar Monografi Resmi</span>
                                    </div>
                                    <span class="text-[10px] font-black px-2 py-0.5 rounded-md bg-slate-100 text-slate-600">
                                        KODE BPS: 74.08
                                    </span>
                                </div>

                                <!-- Ringkasan Metrik Paspor (List Bergaya Dokumen Resmi, Bukan Kartu Beranda) -->
                                <div class="space-y-2.5 text-xs">
                                    <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                                        <span class="text-slate-500 font-semibold flex items-center gap-2">
                                            <i class="bi bi-aspect-ratio text-emerald-600"></i>
                                            <span>Luas Wilayah:</span>
                                        </span>
                                        <b id="profil3dLuas" class="text-slate-900 font-black text-sm">14,80 km²</b>
                                    </div>

                                    <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                                        <span class="text-slate-500 font-semibold flex items-center gap-2">
                                            <i class="bi bi-people text-sky-600"></i>
                                            <span>Total Penduduk:</span>
                                        </span>
                                        <b id="profil3dPop" class="text-slate-900 font-black text-sm">1.576 Jiwa</b>
                                    </div>

                                    <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                                        <span class="text-slate-500 font-semibold flex items-center gap-2">
                                            <i class="bi bi-house-door text-amber-600"></i>
                                            <span>Kepala Keluarga:</span>
                                        </span>
                                        <b id="profil3dKK" class="text-slate-900 font-black text-sm">394 KK</b>
                                    </div>

                                    <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                                        <span class="text-slate-500 font-semibold flex items-center gap-2">
                                            <i class="bi bi-diagram-3 text-teal-600"></i>
                                            <span>Struktur SLS:</span>
                                        </span>
                                        <b id="profil3dDusunCount" class="text-slate-900 font-black text-xs">3 Dusun • 8 RT</b>
                                    </div>

                                    <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                                        <span class="text-slate-500 font-semibold flex items-center gap-2">
                                            <i class="bi bi-patch-check text-emerald-600"></i>
                                            <span>Verifikasi BPS:</span>
                                        </span>
                                        <span class="text-emerald-700 font-black">100% Selesai (SDI)</span>
                                    </div>
                                </div>

                                <!-- Kompas Batas Wilayah Administrasi (Visual Rose Direction) -->
                                <div class="pt-3 border-t border-slate-100 space-y-2.5">
                                    <div class="flex items-center justify-between">
                                        <span class="text-[11px] font-black text-slate-800 uppercase flex items-center gap-1.5">
                                            <i class="bi bi-compass text-emerald-700 text-sm"></i>
                                            <span>Batas Wilayah Geografis</span>
                                        </span>
                                        <span class="text-[10px] text-slate-400 font-bold">4 Arah</span>
                                    </div>

                                    <div class="grid grid-cols-2 gap-2 text-[11px]">
                                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                                            <span class="text-slate-400 text-[9.5px] font-black uppercase block">Utara (N)</span>
                                            <span id="profil3dBatasUtara" class="font-extrabold text-slate-900 leading-snug line-clamp-1">Desa Koroha</span>
                                        </div>
                                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                                            <span class="text-slate-400 text-[9.5px] font-black uppercase block">Timur (E)</span>
                                            <span id="profil3dBatasTimur" class="font-extrabold text-slate-900 leading-snug line-clamp-1">Pegunungan Kodeoha</span>
                                        </div>
                                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                                            <span class="text-slate-400 text-[9.5px] font-black uppercase block">Selatan (S)</span>
                                            <span id="profil3dBatasSelatan" class="font-extrabold text-slate-900 leading-snug line-clamp-1">Kecamatan Tiwu</span>
                                        </div>
                                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                                            <span class="text-slate-400 text-[9.5px] font-black uppercase block">Barat (W)</span>
                                            <span id="profil3dBatasBarat" class="font-extrabold text-slate-900 leading-snug line-clamp-1">Pesisir Teluk Bone</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kantor Pelayanan Desa -->
                                <div class="pt-3 border-t border-slate-100 space-y-2 text-xs">
                                    <div class="flex items-center gap-2 text-slate-800 font-bold">
                                        <i class="bi bi-building text-emerald-700"></i>
                                        <span>Kantor &amp; Kontak Pelayanan</span>
                                    </div>
                                    <p class="text-[11px] text-slate-500 leading-relaxed">
                                        Jl. Poros Trans Sulawesi, Kodeoha • Pelayanan Senin - Jumat 08.00 - 15.30 WITA
                                    </p>
                                    <div class="flex items-center justify-between pt-1">
                                        <span class="text-[11px] font-bold text-emerald-700">layanan.descan@bps.go.id</span>
                                        <button type="button" onclick="openPstModal()" class="px-2.5 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-[#0f6b4a] font-black text-[10.5px] transition cursor-pointer">
                                            PST BPS
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Kartu Peta Spasial WebGIS Desa (Interaktif Leaflet) -->
                            <div id="sectionPeta" class="bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/90 shadow-xs space-y-3.5 relative overflow-hidden transition-all duration-300">
                                <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                                        <span class="text-xs font-black text-slate-800 tracking-wider uppercase">Peta Spasial WebGIS Tematik</span>
                                    </div>
                                    <span class="text-[10px] font-black px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">
                                        Leaflet GIS
                                    </span>
                                </div>
                                <div class="relative w-full h-64 sm:h-72 rounded-2xl overflow-hidden border border-slate-200 bg-slate-100 shadow-inner">
                                    <div id="thematicVillageMap" class="w-full h-full z-0"></div>
                                    <button type="button" onclick="resetThematicMapView()" class="absolute top-2.5 right-2.5 z-[400] px-2.5 py-1.5 bg-white/95 hover:bg-white text-slate-800 text-[10.5px] font-extrabold rounded-xl shadow-md border border-slate-200/80 backdrop-blur-md flex items-center gap-1.5 cursor-pointer transition active:scale-95" title="Pusatkan Peta">
                                        <i class="bi bi-arrows-fullscreen text-emerald-600"></i>
                                        <span>Reset Posisi</span>
                                    </button>
                                </div>
                                <div class="flex items-center justify-between text-[11px] text-slate-500 pt-1">
                                    <span class="flex items-center gap-1.5">
                                        <i class="bi bi-layers-half text-emerald-600"></i>
                                        <span>Batas SLS Dusun &amp; Zonasi Densitas</span>
                                    </span>
                                    <span class="font-bold text-emerald-800">Standar SDI BPS</span>
                                </div>
                            </div>

                        </div>

                        <!-- ============================================================== -->
                        <!-- SISI KANAN: EKSPLORASI MONOGRAFI, SEKTOR BASIS & APARATUR (8 Kolom)-->
                        <!-- ============================================================== -->
                        <div class="lg:col-span-7 xl:col-span-8 space-y-6">
                            
                            <!-- 1. Narasi Profil Wilayah & Rekomendasi Resmi BPS -->
                            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/90 shadow-xs space-y-4">
                                <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                                    <i class="bi bi-book-half text-emerald-700 text-base"></i>
                                    <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider">
                                        Karakteristik &amp; Bentang Alam Wilayah
                                    </h3>
                                </div>

                                <p id="profil3dDesc" class="text-xs sm:text-sm text-slate-700 leading-relaxed font-normal">
                                    Bentang alam perbukitan agraris subur beriklim sejuk dengan akses pesisir Teluk Bone, sentra perkebunan cengkeh dan kakao rakyat bersertifikat, klaster 75 unit IKM olahan kebun, serta hasil tangkapan nelayan pesisir.
                                </p>

                                <!-- Kotak Catatan Pembinaan BPS (Gaya Dokumen Akreditasi) -->
                                <div class="p-4 rounded-2xl bg-gradient-to-r from-emerald-50/80 via-emerald-50/50 to-teal-50/60 border border-emerald-200/80 flex items-start gap-3.5">
                                    <div class="w-9 h-9 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0 text-lg shadow-xs">
                                        <i class="bi bi-award-fill"></i>
                                    </div>
                                    <div class="space-y-1">
                                        <div class="text-[10px] font-black uppercase tracking-wider text-emerald-900">
                                            Catatan Pembinaan Tim Teknis BPS Kolaka Utara
                                        </div>
                                        <p id="profil3dCatatanBps" class="text-xs text-emerald-950 font-semibold leading-relaxed">
                                            Kategori Mandiri dengan kualitas data monografi dan SDI tertinggi di Kecamatan Kodeoha.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Potensi Sektor Basis & Komoditas Unggulan (Strip Horizontal Khusus Profil) -->
                            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/90 shadow-xs space-y-4">
                                <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <i class="bi bi-boxes text-emerald-700 text-base"></i>
                                        <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider">
                                            Sektor Basis &amp; Komoditas Unggulan (PODES 2025)
                                        </h3>
                                    </div>
                                    <span class="text-[10.5px] font-black text-emerald-800 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                                        3 Pilar Ekonomi
                                    </span>
                                </div>

                                <div class="space-y-3">
                                    <!-- Sektor Perkebunan -->
                                    <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 hover:bg-white hover:border-emerald-300 transition flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                        <div class="flex items-start gap-3.5">
                                            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#0f6b4a] flex items-center justify-center text-lg shrink-0">
                                                <i class="bi bi-tree-fill"></i>
                                            </div>
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <h4 class="text-xs font-black text-slate-900 uppercase">Sentra Kakao &amp; Cengkeh</h4>
                                                    <span class="text-[9px] font-bold px-1.5 py-0.2 rounded-md bg-emerald-100 text-emerald-900">Agrikultur</span>
                                                </div>
                                                <p class="text-[11.5px] text-slate-500 leading-snug mt-0.5">
                                                    Pengembangan budidaya kakao sambung pucuk dan cengkeh rakyat dengan sertifikasi bibit unggul.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-left sm:text-right shrink-0 pl-13 sm:pl-0">
                                            <span class="text-[10px] text-slate-400 block font-bold">Hamparan Produktif:</span>
                                            <span id="profil3dAgri" class="text-xs font-black text-emerald-800">Pesisir &amp; Kakao 190 Ha</span>
                                        </div>
                                    </div>

                                    <!-- Sektor Kelautan & Bahari -->
                                    <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 hover:bg-white hover:border-sky-300 transition flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                        <div class="flex items-start gap-3.5">
                                            <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-800 flex items-center justify-center text-lg shrink-0">
                                                <i class="bi bi-water"></i>
                                            </div>
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <h4 class="text-xs font-black text-slate-900 uppercase">Perikanan Tangkap &amp; Teri</h4>
                                                    <span class="text-[9px] font-bold px-1.5 py-0.2 rounded-md bg-sky-100 text-sky-900">Pesisir</span>
                                                </div>
                                                <p class="text-[11.5px] text-slate-500 leading-snug mt-0.5">
                                                    Sentra pengeringan teri tradisional Teluk Bone, armada perahu nelayan, serta budidaya laut terpadu.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-left sm:text-right shrink-0 pl-13 sm:pl-0">
                                            <span class="text-[10px] text-slate-400 block font-bold">Komoditas Basis:</span>
                                            <span id="profil3dKomoditas" class="text-xs font-black text-sky-800">Perikanan, Teri, Kakao</span>
                                        </div>
                                    </div>

                                    <!-- Sektor Usaha Rakyat / BUMDes -->
                                    <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 hover:bg-white hover:border-amber-300 transition flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                        <div class="flex items-start gap-3.5">
                                            <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-lg shrink-0">
                                                <i class="bi bi-shop"></i>
                                            </div>
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <h4 class="text-xs font-black text-slate-900 uppercase">Usaha Olahan &amp; Pasar Desa</h4>
                                                    <span class="text-[9px] font-bold px-1.5 py-0.2 rounded-md bg-amber-100 text-amber-900">Ekonomi</span>
                                                </div>
                                                <p class="text-[11.5px] text-slate-500 leading-snug mt-0.5">
                                                    Pemberdayaan industri olahan kopi &amp; cokelat lokal, digitalisasi kios pasar desa, dan BUMDes.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-left sm:text-right shrink-0 pl-13 sm:pl-0">
                                            <span class="text-[10px] text-slate-400 block font-bold">Status BUMDes:</span>
                                            <span class="text-xs font-black text-amber-800">Aktif &amp; Terdata PODES</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. Direktori Aparatur Pemerintahan & Dewan Agen SDI -->
                            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/90 shadow-xs space-y-4">
                                <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <i class="bi bi-people-fill text-emerald-700 text-base"></i>
                                        <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider">
                                            Aparatur Pemerintahan &amp; Pengelola Data
                                        </h3>
                                    </div>
                                    <button type="button" onclick="openAgenDesaModal()" class="px-3 py-1 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1.5 cursor-pointer">
                                        <i class="bi bi-pencil-square"></i>
                                        <span>Kelola Data</span>
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                                    <!-- Kepala Desa -->
                                    <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center gap-3">
                                        <div class="w-11 h-11 rounded-xl bg-emerald-100 text-[#0f6b4a] flex items-center justify-center text-xl shrink-0">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <span class="text-[9.5px] font-black uppercase text-emerald-800">Kepala Desa / Lurah</span>
                                            <div id="aparatKadesName" class="text-xs font-black text-slate-900 truncate">H. Syamsul Bahri, S.Sos</div>
                                            <span class="text-[10px] text-slate-400 font-semibold flex items-center gap-1">
                                                <i class="bi bi-patch-check-fill text-emerald-600"></i> Terverifikasi BPS
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Sekretaris Desa -->
                                    <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center gap-3">
                                        <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-800 flex items-center justify-center text-xl shrink-0">
                                            <i class="bi bi-person-badge-fill"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <span class="text-[9.5px] font-black uppercase text-blue-800">Sekretaris Desa</span>
                                            <div id="aparatSekdesName" class="text-xs font-black text-slate-900 truncate">Muh. Ridwan, S.AP</div>
                                            <span class="text-[10px] text-slate-400 font-semibold flex items-center gap-1">
                                                <i class="bi bi-patch-check-fill text-emerald-600"></i> Terverifikasi BPS
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Agen Statistik Desa -->
                                    <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center gap-3">
                                        <div class="w-11 h-11 rounded-xl bg-purple-100 text-purple-800 flex items-center justify-center text-xl shrink-0">
                                            <i class="bi bi-file-earmark-bar-graph-fill"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <span class="text-[9.5px] font-black uppercase text-purple-800">Agen Statistik Desa</span>
                                            <div class="text-xs font-black text-slate-900 truncate">Baharuddin, S.Pd</div>
                                            <span class="text-[10px] text-slate-400 font-semibold flex items-center gap-1">
                                                <i class="bi bi-patch-check-fill text-purple-600"></i> Lulus Uji Kompetensi
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Operator Database SDI -->
                                    <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center gap-3">
                                        <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-xl shrink-0">
                                            <i class="bi bi-laptop-fill"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <span class="text-[9.5px] font-black uppercase text-amber-800">Operator Monografi</span>
                                            <div class="text-xs font-black text-slate-900 truncate">Nurul Annisa, S.Kom</div>
                                            <span class="text-[10px] text-slate-400 font-semibold flex items-center gap-1">
                                                <i class="bi bi-patch-check-fill text-emerald-600"></i> Pengelola Database
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. Sebaran Satuan Lingkungan Setempat (SLS / Dusun) -->
                            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/90 shadow-xs space-y-4">
                                <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <i class="bi bi-houses-fill text-emerald-700 text-base"></i>
                                        <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider">
                                            Sebaran Satuan Lingkungan Setempat (SLS)
                                        </h3>
                                    </div>
                                    <span class="text-[10.5px] font-bold text-slate-400 uppercase">Data Riil PODES 2025</span>
                                </div>

                                <!-- Dynamic Dusun Container -->
                                <div id="profil3dDusunList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                    <!-- Populated dynamically via renderProfilDesa3D() -->
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- 3. FOOTER LEMBAR MONOGRAFI RESMI -->
                    <div class="rounded-2xl p-4 bg-white border border-slate-200/80 flex flex-wrap items-center justify-between gap-3 text-xs text-slate-500 shadow-2xs">
                        <div class="flex items-center gap-2.5">
                            <img src="/images/logo_bps.png" alt="BPS" class="h-6 w-auto object-contain">
                            <span class="font-bold text-slate-700">Badan Pusat Statistik Kabupaten Kolaka Utara • Diseminasi Monografi Desa Cantik 2026</span>
                        </div>
                        <div class="flex items-center gap-3 font-semibold text-[11px]">
                            <span class="text-emerald-700 font-bold">Standardisasi Satu Data Indonesia</span>
                            <span>•</span>
                            <a href="javascript:void(0)" onclick="window.scrollTo({top:0, behavior:'smooth'})" class="text-[#0f6b4a] font-bold hover:underline">Kembali ke Atas ↑</a>
                        </div>
                    </div>

                </div>

                <!-- ===================================================================== -->
                <!-- HALAMAN GALERI DOKUMENTASI DESA RESMI BPS                             -->
                <!-- ===================================================================== -->
                <div id="view-galeri" class="menu-view-container hidden space-y-6 animate-in fade-in duration-300">
                    
                    <!-- Header Banner Halaman Galeri: Modern & Berkelas -->
                    <div class="bg-gradient-to-r from-slate-950 via-[#0a2f22] to-slate-950 text-white rounded-3xl p-6 sm:p-8 shadow-xl relative overflow-hidden border border-emerald-900/60">
                        <div class="absolute -right-12 -bottom-12 w-64 h-64 rounded-full bg-emerald-500/10 blur-3xl pointer-events-none"></div>
                        
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
                            <div class="flex items-start sm:items-center gap-4">
                                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-emerald-500/25 to-teal-500/10 border border-emerald-400/30 text-emerald-300 flex items-center justify-center text-3xl shrink-0 shadow-inner">
                                    <i class="bi bi-images"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 text-[10px] font-black uppercase tracking-wider flex items-center gap-1">
                                            <i class="bi bi-shield-check text-emerald-400"></i>
                                            <span>Dokumentasi Resmi Terverifikasi BPS</span>
                                        </span>
                                        <span id="pageGaleriKecBadge" class="px-2.5 py-0.5 rounded-full bg-white/10 text-slate-200 text-[10px] font-bold">
                                            Kec. Kodeoha
                                        </span>
                                    </div>
                                    <h1 id="pageGaleriTitle" class="text-2xl sm:text-3xl lg:text-4xl font-black text-white tracking-tight mt-1.5">
                                        Galeri Dokumentasi Desa Kamisi
                                    </h1>
                                    <p id="pageGaleriSub" class="text-xs sm:text-sm text-emerald-100/90 font-medium max-w-2xl mt-1 leading-relaxed">
                                        Koleksi dokumentasi kegiatan pembinaan Desa Cantik BPS, potensi komoditas unggulan wilayah, bentang alam, dan pelayanan masyarakat.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2.5 shrink-0">
                                <button type="button" onclick="openUploadFotoModal()" class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-black text-xs shadow-lg shadow-emerald-950/40 active:scale-95 transition cursor-pointer">
                                    <i class="bi bi-cloud-arrow-up-fill text-sm"></i>
                                    <span>+ Unggah Foto Baru</span>
                                </button>
                                <button type="button" onclick="switchNavMenu('tentang')" class="flex items-center gap-2 px-3.5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs border border-white/15 transition cursor-pointer">
                                    <i class="bi bi-building"></i>
                                    <span>Profil Desa</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Toolbar Filter Kategori & Pencarian Halaman Galeri -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/90 shadow-2xs flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <!-- Filter Pills -->
                        <div class="flex items-center gap-2 overflow-x-auto pb-1 md:pb-0 scrollbar-none" id="pageGaleriFilterTabs">
                            <button type="button" onclick="filterPageGaleriPhotos('all', this)" class="page-galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-emerald-600 text-white shadow-xs cursor-pointer whitespace-nowrap">
                                Semua Foto (8)
                            </button>
                            <button type="button" onclick="filterPageGaleriPhotos('pembinaan', this)" class="page-galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                                Pembinaan BPS
                            </button>
                            <button type="button" onclick="filterPageGaleriPhotos('potensi', this)" class="page-galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                                Potensi &amp; Kakao
                            </button>
                            <button type="button" onclick="filterPageGaleriPhotos('bahari', this)" class="page-galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                                Pesona Bahari &amp; Alam
                            </button>
                            <button type="button" onclick="filterPageGaleriPhotos('pelayanan', this)" class="page-galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                                Pelayanan Desa
                            </button>
                        </div>

                        <!-- Search & Counter -->
                        <div class="flex items-center gap-3 shrink-0">
                            <div class="relative w-full md:w-64">
                                <i class="bi bi-search absolute left-3.5 top-3 text-slate-400 text-xs"></i>
                                <input type="text" id="pageGaleriSearchInput" oninput="searchPageGaleriPhotos(this.value)" placeholder="Cari foto dokumentasi..." class="w-full pl-9 pr-3.5 py-2 rounded-xl border border-slate-200 bg-slate-50 text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition">
                            </div>
                            <span id="pageGaleriCount" class="text-xs font-black text-emerald-800 bg-emerald-50 px-3 py-2 rounded-xl border border-emerald-200 whitespace-nowrap hidden sm:inline">
                                8 Foto Dokumentasi
                            </span>
                        </div>
                    </div>

                    <!-- Grid Foto Halaman Galeri -->
                    <div id="pageGaleriPhotosGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-5">
                        <!-- Populated via renderPageGaleriPhotos() -->
                    </div>

                    <!-- Footer Info Halaman Galeri -->
                    <div class="rounded-2xl p-4 bg-white border border-slate-200/80 flex flex-wrap items-center justify-between gap-3 text-xs text-slate-500 shadow-2xs">
                        <div class="flex items-center gap-2.5">
                            <i class="bi bi-info-circle-fill text-emerald-600 text-base"></i>
                            <span>Klik pada kartu foto untuk melihat gambar dalam ukuran layar penuh (Lightbox) dengan navigasi panah keyboard.</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="openUploadFotoModal()" class="px-3.5 py-1.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 font-bold transition cursor-pointer flex items-center gap-1.5 text-xs">
                                <i class="bi bi-cloud-arrow-up-fill text-emerald-600"></i>
                                <span>Unggah Foto</span>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- MATERI PEMBELAJARAN (HUB)                                             -->
                <!-- ===================================================================== -->
                                <div id="view-pembelajaran" class="menu-view-container hidden space-y-6 animate-in fade-in duration-200">
                    <!-- ===================================================================== -->
                    <!-- HERO BANNER MATERI PEMBELAJARAN (KOMPAK & PROPORSIONAL DENGAN CTA)   -->
                    <!-- ===================================================================== -->
                    <div class="bg-gradient-to-br from-[#062417] via-[#0c432d] to-[#12583b] rounded-3xl px-6 py-5 sm:px-8 sm:py-6 lg:px-9 lg:py-6 text-white relative overflow-hidden shadow-2xl border border-emerald-500/20">
                        <!-- Decorative Ambient Glows -->
                        <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-emerald-400/20 blur-3xl pointer-events-none"></div>
                        <div class="absolute -bottom-24 -left-24 w-72 h-72 rounded-full bg-teal-400/15 blur-3xl pointer-events-none"></div>

                        <!-- Top Header Pill Bar with Progress Indicator -->
                        <div class="relative z-10 flex flex-wrap items-center justify-between gap-3 pb-3 border-b border-white/10">
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-[11px] font-bold tracking-wide shadow-xs">
                                <i class="bi bi-mortarboard-fill text-emerald-300"></i>
                                <span>BPS KABUPATEN KOLAKA UTARA</span>
                                <span class="text-white/40">•</span>
                                <span class="text-emerald-200">POJOK LITERASI DESA CANTIK</span>
                            </div>

                            <!-- Indikator Progres Belajar Ringkas -->
                            <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-emerald-950/70 backdrop-blur-md border border-emerald-400/30 text-xs">
                                <span class="text-emerald-100 font-semibold text-[11px] flex items-center gap-1.5">
                                    <i class="bi bi-award-fill text-amber-300"></i>
                                    <span>Progres Sertifikasi Anda:</span>
                                </span>
                                <div class="w-20 sm:w-28 h-2 rounded-full bg-black/40 border border-white/10 overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-emerald-400 to-teal-300 rounded-full" style="width: 25%;"></div>
                                </div>
                                <span class="font-extrabold text-amber-300 text-[11px]">1/4 Tahap Selesai (25%)</span>
                            </div>
                        </div>

                        <!-- Main Hero Content: Left Details & Right 3D Orbital Stage -->
                        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-center mt-4">
                            <!-- Left: Title, Intro, Feature Pills & Primary CTA -->
                            <div class="lg:col-span-7 space-y-3">
                                <span class="inline-block px-2.5 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 text-[10px] font-black uppercase tracking-wider border border-emerald-400/30">
                                    Platform Pembelajaran Mandiri
                                </span>
                                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white tracking-tight leading-tight">
                                    Materi Pembelajaran<br>
                                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 via-teal-100 to-white">Statistik Desa</span>
                                </h1>
                                <p class="text-xs sm:text-[13px] text-emerald-100/90 font-normal leading-relaxed max-w-xl">
                                    Program penguatan kapasitas statistik sektoral &amp; literasi data bagi Agen Statistik dan aparatur desa guna mewujudkan standarisasi Satu Data Indonesia (SDI).
                                </p>

                                <!-- 4 Key Feature Checklist Pills (Compact) -->
                                <div class="grid grid-cols-2 sm:grid-cols-2 gap-2 pt-1">
                                    <div class="flex items-center gap-2 text-xs font-semibold text-white/95 bg-white/10 backdrop-blur-md px-3 py-2 rounded-xl border border-white/15 shadow-2xs hover:bg-white/15 transition">
                                        <span class="w-6 h-6 rounded-lg bg-emerald-500/30 flex items-center justify-center text-emerald-300 shrink-0 text-xs"><i class="bi bi-camera-video-fill"></i></span>
                                        <span class="text-[11px] sm:text-xs">Video Microlearning</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs font-semibold text-white/95 bg-white/10 backdrop-blur-md px-3 py-2 rounded-xl border border-white/15 shadow-2xs hover:bg-white/15 transition">
                                        <span class="w-6 h-6 rounded-lg bg-emerald-500/30 flex items-center justify-center text-teal-300 shrink-0 text-xs"><i class="bi bi-file-earmark-spreadsheet-fill"></i></span>
                                        <span class="text-[11px] sm:text-xs">Praktik Rumus Excel</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs font-semibold text-white/95 bg-white/10 backdrop-blur-md px-3 py-2 rounded-xl border border-white/15 shadow-2xs hover:bg-white/15 transition">
                                        <span class="w-6 h-6 rounded-lg bg-emerald-500/30 flex items-center justify-center text-amber-300 shrink-0 text-xs"><i class="bi bi-patch-check-fill"></i></span>
                                        <span class="text-[11px] sm:text-xs">Sertifikasi Agen BPS</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs font-semibold text-white/95 bg-white/10 backdrop-blur-md px-3 py-2 rounded-xl border border-white/15 shadow-2xs hover:bg-white/15 transition">
                                        <span class="w-6 h-6 rounded-lg bg-emerald-500/30 flex items-center justify-center text-sky-300 shrink-0 text-xs"><i class="bi bi-clock-history"></i></span>
                                        <span class="text-[11px] sm:text-xs">Akses Belajar 24/7</span>
                                    </div>
                                </div>

                                <!-- Action Call-To-Action (CTA) Buttons -->
                                <div class="flex flex-wrap items-center gap-3 pt-2">
                                    <button type="button" onclick="switchNavMenu('video')" class="py-2.5 px-5 rounded-xl bg-gradient-to-r from-amber-400 via-yellow-300 to-amber-400 hover:from-amber-300 hover:to-yellow-200 text-slate-950 font-black text-xs sm:text-sm shadow-lg shadow-amber-500/25 transition transform hover:-translate-y-0.5 flex items-center gap-2 cursor-pointer">
                                        <span>Mulai Belajar Sekarang</span>
                                        <i class="bi bi-arrow-right-short text-lg leading-none"></i>
                                    </button>
                                    <button type="button" onclick="document.getElementById('section-tahapan-sertifikasi')?.scrollIntoView({behavior: 'smooth'})" class="py-2.5 px-4 rounded-xl bg-white/10 hover:bg-white/20 border border-white/25 text-white font-bold text-xs sm:text-sm backdrop-blur-md transition flex items-center gap-2 cursor-pointer">
                                        <i class="bi bi-pie-chart-fill text-emerald-300 text-xs"></i>
                                        <span>Lihat Progres Saya</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Right: 3D Orbital Avatar Stage (Compact & Focused) -->
                            <div class="lg:col-span-5 flex justify-center py-2">
                                <div class="relative w-52 h-52 sm:w-60 sm:h-60 flex items-center justify-center">
                                    <!-- Glowing Outer Halo Orbit -->
                                    <div class="absolute inset-0 rounded-full border-2 border-emerald-400/40 shadow-[0_0_50px_rgba(16,185,129,0.35)] animate-[spin_25s_linear_infinite] pointer-events-none"></div>
                                    
                                    <!-- Inner Halo Circle with Backdrop Glow -->
                                    <div class="w-40 h-40 sm:w-48 sm:h-48 rounded-full border border-teal-300/60 bg-gradient-to-tr from-emerald-950/80 to-emerald-800/40 backdrop-blur-md flex items-center justify-center shadow-inner relative">
                                        <!-- Central 3D Learner Avatar -->
                                        <div class="w-28 h-28 sm:w-32 sm:h-32 rounded-full bg-gradient-to-tr from-emerald-600 via-teal-500 to-emerald-300 p-1 shadow-2xl flex items-center justify-center relative">
                                            <!-- Learner Illustration SVG with Headphones & Digital Tablet -->
                                            <svg class="w-20 h-20 sm:w-24 sm:h-24 drop-shadow-xl" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <!-- Headphone Arc -->
                                                <path d="M34 56 C34 26, 86 26, 86 56" stroke="#34d399" stroke-width="5" stroke-linecap="round" fill="none"/>
                                                <!-- Headphone Earcups -->
                                                <rect x="28" y="48" width="10" height="20" rx="5" fill="#064e3b" stroke="#6ee7b7" stroke-width="2"/>
                                                <rect x="82" y="48" width="10" height="20" rx="5" fill="#064e3b" stroke="#6ee7b7" stroke-width="2"/>
                                                <!-- Face/Head -->
                                                <circle cx="60" cy="56" r="23" fill="#fed7aa"/>
                                                <!-- Hair -->
                                                <path d="M38 52 C38 34, 82 34, 82 52 C77 41, 65 38, 60 38 C53 38, 43 42, 38 52 Z" fill="#1e293b"/>
                                                <!-- Eyes & Friendly Smile -->
                                                <circle cx="53" cy="55" r="2.5" fill="#0f172a"/>
                                                <circle cx="67" cy="55" r="2.5" fill="#0f172a"/>
                                                <path d="M56 64 Q60 67 64 64" stroke="#e11d48" stroke-width="2" stroke-linecap="round" fill="none"/>
                                                <!-- Neck -->
                                                <rect x="55" y="75" width="10" height="8" fill="#fdba74"/>
                                                <!-- Clothes / Jacket -->
                                                <path d="M36 102 C36 86, 46 80, 60 80 C74 80, 84 86, 84 102 Z" fill="#059669"/>
                                                <path d="M54 80 L60 93 L66 80 Z" fill="#e2e8f0"/>
                                                <!-- Statistics Tablet -->
                                                <rect x="42" y="86" width="36" height="24" rx="4" fill="#0f172a" stroke="#38bdf8" stroke-width="1.5"/>
                                                <circle cx="60" cy="98" r="3.5" fill="#38bdf8"/>
                                                <line x1="47" y1="91" x2="57" y2="91" stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round"/>
                                                <line x1="63" y1="91" x2="73" y2="91" stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round"/>
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- 6 Floating 3D Orbiting Glass Spheres -->
                                    <!-- Orb 1: Top (12 o'clock) -->
                                    <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-9 h-9 rounded-full bg-gradient-to-tr from-emerald-500 to-teal-300 shadow-[0_6px_15px_rgba(16,185,129,0.5)] border-2 border-white/70 backdrop-blur-md flex items-center justify-center text-white text-xs transform hover:scale-110 transition duration-300">
                                        <i class="bi bi-bell-fill"></i>
                                    </div>
                                    <!-- Orb 2: Top Right (2 o'clock) -->
                                    <div class="absolute top-4 -right-1 w-9 h-9 rounded-full bg-gradient-to-tr from-teal-400 to-cyan-300 shadow-[0_6px_15px_rgba(20,184,166,0.5)] border-2 border-white/70 backdrop-blur-md flex items-center justify-center text-teal-950 text-xs transform hover:scale-110 transition duration-300">
                                        <i class="bi bi-graph-up-arrow"></i>
                                    </div>
                                    <!-- Orb 3: Bottom Right (4 o'clock) -->
                                    <div class="absolute bottom-4 -right-1 w-9 h-9 rounded-full bg-gradient-to-tr from-amber-400 to-yellow-200 shadow-[0_6px_15px_rgba(245,158,11,0.5)] border-2 border-white/70 backdrop-blur-md flex items-center justify-center text-amber-950 text-xs transform hover:scale-110 transition duration-300">
                                        <i class="bi bi-award-fill"></i>
                                    </div>
                                    <!-- Orb 4: Bottom (6 o'clock) -->
                                    <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-gradient-to-tr from-emerald-600 to-emerald-400 shadow-[0_5px_12px_rgba(5,150,105,0.4)] border-2 border-white/70 backdrop-blur-md flex items-center justify-center text-white text-xs transform hover:scale-110 transition duration-300">
                                        <i class="bi bi-shield-fill-check"></i>
                                    </div>
                                    <!-- Orb 5: Bottom Left (8 o'clock) -->
                                    <div class="absolute bottom-4 -left-1 w-9 h-9 rounded-full bg-gradient-to-tr from-rose-500 to-red-400 shadow-[0_6px_15px_rgba(225,29,72,0.4)] border-2 border-white/70 backdrop-blur-md flex items-center justify-center text-white text-xs transform hover:scale-110 transition duration-300">
                                        <i class="bi bi-play-btn-fill"></i>
                                    </div>
                                    <!-- Orb 6: Top Left (10 o'clock) -->
                                    <div class="absolute top-4 -left-1 w-8 h-8 rounded-full bg-gradient-to-tr from-emerald-500 to-teal-400 shadow-[0_5px_12px_rgba(16,185,129,0.4)] border-2 border-white/70 backdrop-blur-md flex items-center justify-center text-white text-xs transform hover:scale-110 transition duration-300">
                                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Curved Organic Wave at the Bottom of Hero -->
                        <div class="mt-4 -mx-6 -mb-5 sm:-mx-8 sm:-mb-6 lg:-mx-9 lg:-mb-6 overflow-hidden leading-none">
                            <svg class="w-full h-7 sm:h-9 text-[#f6f8f6] fill-current" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                <path d="M0,0 C150,90 350,-40 500,60 C650,140 900,10 1200,80 L1200,120 L0,120 Z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- ===================================================================== -->
                    <!-- MODUL PEMBELAJARAN UTAMA & WIDGET TAHAPAN SERTIFIKASI                -->
                    <!-- ===================================================================== -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 sm:gap-6 items-stretch">
                        <!-- Left: Modul Pembelajaran Utama (3 Cards Grid) -->
                        <div class="lg:col-span-8 space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg sm:text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                                        <span>Modul Pembelajaran Utama</span>
                                        <span class="text-xs font-bold text-emerald-800 bg-emerald-100 border border-emerald-200 px-2.5 py-0.5 rounded-full">3 Modul Terpadu</span>
                                    </h3>
                                    <p class="text-xs text-slate-500 mt-0.5">Kurikulum standar BPS Satu Data Indonesia untuk Agen Statistik Desa.</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <!-- Card 1: Video Tutorial Microlearning -->
                                <div class="bg-white rounded-3xl p-4 border border-slate-200/90 shadow-xs hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group cursor-pointer" onclick="switchNavMenu('video')">
                                    <div>
                                        <!-- Top Preview Banner with 3D Play Visual -->
                                        <div class="h-28 sm:h-32 rounded-2xl bg-gradient-to-br from-[#0c3f29] via-[#0f6b4a] to-[#10b981] relative overflow-hidden flex items-center justify-center shadow-inner group-hover:scale-[1.02] transition duration-300">
                                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.2),transparent_70%)]"></div>
                                            <!-- Floating Tags -->
                                            <span class="absolute top-2.5 left-2.5 text-[9px] font-black uppercase tracking-wider text-emerald-100 bg-black/40 backdrop-blur-md px-2 py-0.5 rounded-md border border-white/20">VIDEO MATERI</span>
                                            <span class="absolute top-2.5 right-2.5 text-[9px] font-black text-white bg-emerald-900/60 backdrop-blur-md px-2 py-0.5 rounded-md border border-white/20">5-7 Menit</span>
                                            <!-- Center 3D Play Icon -->
                                            <div class="w-11 h-11 rounded-full bg-white/20 backdrop-blur-md border border-white/40 flex items-center justify-center text-white text-xl shadow-lg group-hover:scale-110 transition duration-300">
                                                <i class="bi bi-play-fill text-2xl ml-0.5"></i>
                                            </div>
                                        </div>

                                        <!-- Title & 1-Line Description -->
                                        <h4 class="font-black text-slate-900 text-sm mt-3 group-hover:text-emerald-700 transition">Video Tutorial Desa Cantik</h4>
                                        <p class="text-xs text-slate-500 mt-1 leading-relaxed line-clamp-1" title="Video microlearning tata cara pengumpulan data dan standarisasi statistik desa.">
                                            Video microlearning tata cara pengumpulan data dan standarisasi statistik desa.
                                        </p>
                                    </div>

                                    <div class="mt-4 pt-3 border-t border-slate-100">
                                        <button type="button" onclick="event.stopPropagation(); switchNavMenu('video')" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-700 hover:from-emerald-700 hover:to-teal-800 text-white font-black text-xs shadow-md shadow-emerald-700/20 hover:shadow-emerald-700/30 transition flex items-center justify-center gap-1.5 cursor-pointer">
                                            <i class="bi bi-play-fill text-sm"></i>
                                            <span>Tonton Video</span>
                                            <i class="bi bi-arrow-right text-xs"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Card 2: Pre-test & Post-test -->
                                <div class="bg-white rounded-3xl p-4 border border-slate-200/90 shadow-xs hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group cursor-pointer" onclick="switchNavMenu('pretest')">
                                    <div>
                                        <!-- Top Preview Banner with 3D Test Visual -->
                                        <div class="h-28 sm:h-32 rounded-2xl bg-gradient-to-br from-[#0369a1] via-[#0284c7] to-[#0d9488] relative overflow-hidden flex items-center justify-center shadow-inner group-hover:scale-[1.02] transition duration-300">
                                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.2),transparent_70%)]"></div>
                                            <!-- Floating Tags -->
                                            <span class="absolute top-2.5 left-2.5 text-[9px] font-black uppercase tracking-wider text-sky-100 bg-black/40 backdrop-blur-md px-2 py-0.5 rounded-md border border-white/20">EVALUASI MANDIRI</span>
                                            <span class="absolute top-2.5 right-2.5 text-[9px] font-black text-white bg-sky-950/60 backdrop-blur-md px-2 py-0.5 rounded-md border border-white/20">10 Soal SDI</span>
                                            <!-- Center 3D Badge Icon -->
                                            <div class="w-11 h-11 rounded-full bg-white/20 backdrop-blur-md border border-white/40 flex items-center justify-center text-white text-xl shadow-lg group-hover:scale-110 transition duration-300">
                                                <i class="bi bi-patch-check-fill text-xl"></i>
                                            </div>
                                        </div>

                                        <!-- Title & 1-Line Description -->
                                        <h4 class="font-black text-slate-900 text-sm mt-3 group-hover:text-sky-700 transition">Pre-test &amp; Post-test</h4>
                                        <p class="text-xs text-slate-500 mt-1 leading-relaxed line-clamp-1" title="Ukur pemahaman statistik sektoral untuk meraih sertifikat kelulusan agen.">
                                            Ukur pemahaman statistik sektoral untuk meraih sertifikat kelulusan agen.
                                        </p>
                                    </div>

                                    <div class="mt-4 pt-3 border-t border-slate-100">
                                        <button type="button" onclick="event.stopPropagation(); switchNavMenu('pretest')" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-sky-600 to-teal-700 hover:from-sky-700 hover:to-teal-800 text-white font-black text-xs shadow-md shadow-sky-700/20 hover:shadow-sky-700/30 transition flex items-center justify-center gap-1.5 cursor-pointer">
                                            <i class="bi bi-pencil-square text-xs"></i>
                                            <span>Kerjakan Soal</span>
                                            <i class="bi bi-arrow-right text-xs"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Card 3: Buku Panduan & Rumus Excel -->
                                <div class="bg-white rounded-3xl p-4 border border-slate-200/90 shadow-xs hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group cursor-pointer" onclick="switchNavMenu('buku')">
                                    <div>
                                        <!-- Top Preview Banner with 3D Book Visual -->
                                        <div class="h-28 sm:h-32 rounded-2xl bg-gradient-to-br from-[#b45309] via-[#d97706] to-[#059669] relative overflow-hidden flex items-center justify-center shadow-inner group-hover:scale-[1.02] transition duration-300">
                                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.2),transparent_70%)]"></div>
                                            <!-- Floating Tags -->
                                            <span class="absolute top-2.5 left-2.5 text-[9px] font-black uppercase tracking-wider text-amber-100 bg-black/40 backdrop-blur-md px-2 py-0.5 rounded-md border border-white/20">BUKU PANDUAN</span>
                                            <span class="absolute top-2.5 right-2.5 text-[9px] font-black text-white bg-amber-950/60 backdrop-blur-md px-2 py-0.5 rounded-md border border-white/20">30 Lembar</span>
                                            <!-- Center 3D Book Icon -->
                                            <div class="w-11 h-11 rounded-full bg-white/20 backdrop-blur-md border border-white/40 flex items-center justify-center text-white text-xl shadow-lg group-hover:scale-110 transition duration-300">
                                                <i class="bi bi-journal-bookmark-fill text-xl"></i>
                                            </div>
                                        </div>

                                        <!-- Title & 1-Line Description -->
                                        <h4 class="font-black text-slate-900 text-sm mt-3 group-hover:text-amber-700 transition">Buku Panduan &amp; Rumus</h4>
                                        <p class="text-xs text-slate-500 mt-1 leading-relaxed line-clamp-1" title="Pedoman teknis Excel terstandarisasi dan modul rumus statistik sektoral.">
                                            Pedoman teknis Excel terstandarisasi dan modul rumus statistik sektoral.
                                        </p>
                                    </div>

                                    <div class="mt-4 pt-3 border-t border-slate-100">
                                        <button type="button" onclick="event.stopPropagation(); switchNavMenu('buku')" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-amber-600 to-emerald-700 hover:from-amber-700 hover:to-emerald-800 text-white font-black text-xs shadow-md shadow-amber-700/20 hover:shadow-amber-700/30 transition flex items-center justify-center gap-1.5 cursor-pointer">
                                            <i class="bi bi-book text-xs"></i>
                                            <span>Baca Panduan</span>
                                            <i class="bi bi-arrow-right text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Interactive Stepper & Certification Widget -->
                        <div id="section-tahapan-sertifikasi" class="lg:col-span-4 bg-gradient-to-br from-[#062015] via-[#0a3524] to-[#124d35] rounded-3xl p-5 text-white shadow-xl border border-emerald-500/25 flex flex-col justify-between relative overflow-hidden">
                            <!-- Inner Ambient Glow Blob -->
                            <div class="absolute -top-12 -right-12 w-36 h-36 rounded-full bg-emerald-400/15 blur-2xl pointer-events-none"></div>

                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-[10px] uppercase tracking-wider font-extrabold text-emerald-300 bg-emerald-500/20 px-2.5 py-0.5 rounded-full border border-emerald-400/30">
                                        Alur Kompetensi Agen
                                    </span>
                                    <span class="text-[10px] font-bold text-emerald-200/80">Tahapan BPS</span>
                                </div>
                                <h3 class="text-base sm:text-lg font-black text-white">Tahapan Sertifikasi</h3>
                                <p class="text-xs text-emerald-100/75 mt-0.5">Ikuti 4 langkah terstruktur untuk mencapai kelulusan Agen Statistik.</p>

                                <!-- 4 Stages Interactive Status Grid (Pretest, Video, Posttest, Sertifikat) -->
                                <div class="grid grid-cols-4 gap-2 my-3.5">
                                    <!-- Tahap 1: Pretest - SELESAI (Hijau Menyala + Ikon Centang) -->
                                    <div onclick="openPretestModal()" title="Tahap 1: Pre-test telah selesai" class="p-2 rounded-2xl bg-emerald-500/25 border-2 border-emerald-400 text-emerald-300 shadow-[0_0_15px_rgba(16,185,129,0.3)] flex flex-col items-center justify-center gap-1 cursor-pointer hover:scale-105 transition group relative">
                                        <div class="relative">
                                            <i class="bi bi-clipboard-check text-base"></i>
                                            <span class="absolute -top-1.5 -right-2 w-3.5 h-3.5 rounded-full bg-emerald-400 text-emerald-950 flex items-center justify-center text-[9px] font-black"><i class="bi bi-check"></i></span>
                                        </div>
                                        <span class="text-[9px] font-black text-white">Pretest</span>
                                        <span class="text-[7.5px] font-extrabold text-emerald-200 bg-emerald-900/70 px-1 rounded">Selesai</span>
                                    </div>

                                    <!-- Tahap 2: Video - SEDANG AKTIF / DIKERJAKAN (Border Kuning Menyala + Animasi) -->
                                    <div onclick="switchNavMenu('video')" title="Tahap 2: Sedang Aktif - Tonton Video Tutorial" class="p-2 rounded-2xl bg-amber-500/20 border-2 border-amber-300 ring-2 ring-amber-400/40 text-amber-200 shadow-[0_0_18px_rgba(245,158,11,0.35)] flex flex-col items-center justify-center gap-1 cursor-pointer hover:scale-105 transition group relative animate-pulse">
                                        <div class="relative">
                                            <i class="bi bi-play-circle-fill text-amber-300 text-base"></i>
                                            <span class="absolute -top-1.5 -right-2 w-2 h-2 rounded-full bg-amber-400 animate-ping"></span>
                                        </div>
                                        <span class="text-[9px] font-black text-amber-200">Video</span>
                                        <span class="text-[7.5px] font-extrabold text-slate-950 bg-amber-300 px-1 rounded">Aktif</span>
                                    </div>

                                    <!-- Tahap 3: Posttest - TERKUNCI (Opacity Rendah + Ikon Gembok) -->
                                    <div onclick="showToast('⚠️ Selesaikan materi video tutorial terlebih dahulu untuk membuka Post-test.')" title="Tahap 3: Post-test terkunci" class="p-2 rounded-2xl bg-white/5 border border-white/10 opacity-60 text-white/50 flex flex-col items-center justify-center gap-1 cursor-not-allowed hover:opacity-80 transition relative">
                                        <div class="relative">
                                            <i class="bi bi-patch-question-fill text-white/40 text-base"></i>
                                            <span class="absolute -top-1.5 -right-2 w-3.5 h-3.5 rounded-full bg-slate-800 text-amber-300 flex items-center justify-center text-[8px]"><i class="bi bi-lock-fill"></i></span>
                                        </div>
                                        <span class="text-[9px] font-bold text-white/50">Posttest</span>
                                        <span class="text-[7.5px] font-bold text-white/40 bg-white/10 px-1 rounded">Kunci</span>
                                    </div>

                                    <!-- Tahap 4: Sertifikat - TERKUNCI (Opacity Rendah + Ikon Gembok) -->
                                    <div onclick="showToast('🔒 Selesaikan seluruh tahapan untuk menerbitkan E-Sertifikat resmi.')" title="Tahap 4: Sertifikat terkunci" class="p-2 rounded-2xl bg-white/5 border border-white/10 opacity-50 text-white/40 flex flex-col items-center justify-center gap-1 cursor-not-allowed hover:opacity-75 transition relative">
                                        <div class="relative">
                                            <i class="bi bi-award-fill text-amber-300/40 text-base"></i>
                                            <span class="absolute -top-1.5 -right-2 w-3.5 h-3.5 rounded-full bg-slate-800 text-amber-300 flex items-center justify-center text-[8px]"><i class="bi bi-lock-fill"></i></span>
                                        </div>
                                        <span class="text-[9px] font-bold text-white/40">Sertifikat</span>
                                        <span class="text-[7.5px] font-bold text-white/40 bg-white/10 px-1 rounded">Kunci</span>
                                    </div>
                                </div>

                                <!-- Stepper Progress Bar (Refined 25% Progress) -->
                                <div class="my-3 px-1">
                                    <div class="flex items-center justify-between text-[10px] font-bold text-emerald-200/80 mb-2">
                                        <span>Tahap 1</span>
                                        <span class="text-amber-300 font-extrabold">Tahap 2</span>
                                        <span class="text-white/40">Tahap 3</span>
                                        <span class="text-white/40">Kelulusan</span>
                                    </div>
                                    <div class="relative flex items-center justify-between">
                                        <!-- Connecting Track Line -->
                                        <div class="absolute left-2 right-2 top-1/2 -translate-y-1/2 h-1 bg-white/15 rounded-full z-0">
                                            <div class="h-full bg-gradient-to-r from-emerald-400 to-amber-300 rounded-full" style="width: 35%;"></div>
                                        </div>
                                        <!-- Step Dots -->
                                        <div class="w-6 h-6 rounded-full bg-emerald-400 border-2 border-emerald-950 flex items-center justify-center text-[10px] text-emerald-950 font-black shadow-md z-10" title="Pre-test selesai">
                                            <i class="bi bi-check-lg"></i>
                                        </div>
                                        <div class="w-6 h-6 rounded-full bg-amber-300 border-2 border-white flex items-center justify-center text-[10px] text-slate-950 font-black shadow-md z-10 animate-pulse" title="Materi Video sedang aktif">
                                            2
                                        </div>
                                        <div class="w-6 h-6 rounded-full bg-white/15 border-2 border-emerald-950 flex items-center justify-center text-[9px] text-white/40 z-10" title="Post-test terkunci">
                                            <i class="bi bi-lock-fill"></i>
                                        </div>
                                        <div class="w-6 h-6 rounded-full bg-white/15 border-2 border-emerald-950 flex items-center justify-center text-[9px] text-white/40 z-10" title="Sertifikat terkunci">
                                            <i class="bi bi-lock-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between text-[9px] font-medium text-emerald-100/60 mt-2">
                                        <span class="text-emerald-300 font-bold">Pre-Test ✓</span>
                                        <span class="text-amber-200 font-bold">Video •</span>
                                        <span>Post-Test</span>
                                        <span>Sertifikat</span>
                                    </div>
                                </div>

                                <!-- Minimum Criteria Info Box -->
                                <div class="p-2.5 rounded-2xl bg-white/5 border border-white/10 text-xs space-y-1 my-2.5">
                                    <div class="flex items-center justify-between">
                                        <span class="text-white/70 text-[11px]">Standar Kelulusan:</span>
                                        <span class="font-extrabold text-emerald-300 text-[11px]">Skor Minimal 70 / 100</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-white/70 text-[11px]">Penerbit Sertifikat:</span>
                                        <span class="font-bold text-teal-200 text-[11px]">BPS Kab. Kolaka Utara</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Bottom CTA Button -->
                            <div class="mt-3">
                                <button type="button" onclick="openSertifikatModal()" class="w-full py-2.5 px-4 rounded-2xl bg-gradient-to-r from-emerald-400 via-teal-300 to-emerald-400 hover:from-emerald-300 hover:to-teal-200 text-slate-950 font-black text-xs shadow-lg shadow-emerald-500/30 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 cursor-pointer">
                                    <span>Pratinjau E-Sertifikat</span>
                                    <i class="bi bi-award-fill text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================================================================== -->
                <!-- VIDEO TUTORIAL                                                        -->
                <!-- ===================================================================== -->
                    <!-- ============================================================== -->
    <!-- CINEMATIC VILLAGE OPENING OVERLAY (INSPIRED BY BRAND IN MOTION)-->
    <!-- ============================================================== -->
    <div id="villageVideoOpeningOverlay" class="hidden fixed inset-0 z-50 bg-black flex flex-col justify-between overflow-hidden text-white transition-opacity duration-500 animate-in fade-in">
        <!-- Background Video / Animated Scenery Layer with Ken Burns Motion -->
        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
            <video id="openingBgVideo" class="w-full h-full object-cover opacity-60 scale-105 transition-transform duration-7000 ease-out" src="/videos/Kolaka_Utara.mp4" playsinline muted loop></video>
            <!-- Cinematic Vignette & Gradient Overlays -->
            <div id="openingBgFallback" class="absolute inset-0 bg-cover bg-center transition-all duration-1000 opacity-40"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-black/85"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,transparent_25%,rgba(0,0,0,0.9)_100%)]"></div>
        </div>

        <!-- Top Header: Official Badges & Controls -->
        <div class="relative z-10 p-4 sm:p-6 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2 bg-white/10 backdrop-blur-md px-3 py-1.5 rounded-2xl border border-white/20 shadow-md">
                    <img src="/images/logo_bps.png" alt="BPS" class="h-6 sm:h-7 w-auto object-contain">
                    <div class="h-4 w-[1px] bg-white/30"></div>
                    <img src="/images/logo_kolaka_utara.png" alt="Kolaka Utara" class="h-6 sm:h-7 w-auto object-contain">
                </div>
                <div class="hidden sm:block leading-tight">
                    <div class="text-[11px] font-black uppercase tracking-widest text-emerald-300">BPS KOLAKA UTARA</div>
                    <div class="text-[9px] text-white/70 font-semibold">Program Pembinaan Desa Cantik 2026</div>
                </div>
            </div>

            <div class="flex items-center gap-2.5">
                <button type="button" onclick="toggleOpeningAudio()" id="btnOpeningAudio" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/25 text-white text-xs font-bold transition flex items-center gap-1.5 backdrop-blur-md cursor-pointer">
                    <i id="iconOpeningAudio" class="bi bi-volume-up-fill text-emerald-300"></i>
                    <span id="textOpeningAudio" class="hidden sm:inline">Suara Aktif</span>
                </button>
                <button type="button" onclick="finishVillageVideoOpening()" class="px-4 py-1.5 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-black transition flex items-center gap-1.5 backdrop-blur-md shadow-lg shadow-emerald-900/50 cursor-pointer">
                    <span>Lewati Opening</span>
                    <i class="bi bi-skip-forward-fill text-xs"></i>
                </button>
            </div>
        </div>

        <!-- Center Kinetic Typography: Brand In Motion Cinematic Title -->
        <div class="relative z-10 px-4 sm:px-8 text-center max-w-4xl mx-auto my-auto space-y-4">
            <!-- Kinetic Tagline Badge -->
            <div id="openingTagline" class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/20 border border-emerald-400/40 text-emerald-300 text-xs sm:text-sm font-black uppercase tracking-widest backdrop-blur-md animate-pulse">
                <i class="bi bi-geo-alt-fill text-emerald-400"></i>
                <span>DESA KITA • DALAM GERAK DATA PRESISI</span>
            </div>

            <!-- Main Village Name (Massive Impact Typography) -->
            <h1 id="openingVillageTitle" class="text-3xl sm:text-5xl md:text-6xl font-black uppercase tracking-tight text-white drop-shadow-[0_12px_40px_rgba(0,0,0,0.95)] leading-tight">
                DESA CANTIK
            </h1>

            <!-- Subtitle / Kecamatan -->
            <p id="openingVillageKec" class="text-sm sm:text-xl font-extrabold text-teal-300 uppercase tracking-widest drop-shadow-md">
                KECAMATAN TIWU • KABUPATEN KOLAKA UTARA
            </p>

            <!-- Description / Village Character -->
            <p id="openingVillageDesc" class="text-xs sm:text-sm text-slate-200/90 font-normal max-w-2xl mx-auto leading-relaxed drop-shadow italic">
                Penguatan Kapasitas Statistik Sektoral & Standarisasi Satu Data Indonesia
            </p>

            <!-- 3 Pill Badges (Potensi - Data - Mandiri) -->
            <div class="pt-3 flex flex-wrap items-center justify-center gap-2 text-[10px] sm:text-[11px] font-bold text-white/90">
                <span class="px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/20">🌾 Potensi Wilayah</span>
                <span class="px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/20">📊 Data Sektoral BPS</span>
                <span class="px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/20">🎓 Agen Statistik Mandiri</span>
            </div>
        </div>

        <!-- Bottom Timeline Stepper & Progress Bar -->
        <div class="relative z-10 p-4 sm:p-6 max-w-2xl w-full mx-auto space-y-2">
            <div class="flex items-center justify-between text-xs font-bold text-white/80">
                <span id="openingStatusText" class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    <span>Menyiapkan Modul Video Microlearning...</span>
                </span>
                <span id="openingCountdown" class="text-emerald-300 font-mono">5s</span>
            </div>

            <!-- Progress Bar Line -->
            <div class="w-full h-1.5 bg-white/20 rounded-full overflow-hidden backdrop-blur-sm">
                <div id="openingProgressBar" class="h-full bg-gradient-to-r from-emerald-400 via-teal-300 to-emerald-400 rounded-full transition-all duration-100 ease-linear" style="width: 0%;"></div>
            </div>
        </div>
    </div>

                <div id="view-video" class="menu-view-container hidden space-y-6 animate-in fade-in duration-200">
                    <!-- 1. Header Video Tutorial (Ikon Lucide PlayCircle Hijau & Tombol Navigasi Tunggal) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-3.5">
                            <div class="w-11 h-11 rounded-xl bg-emerald-50 border border-emerald-200/80 flex items-center justify-center text-emerald-600 p-2.5 shadow-2xs shrink-0">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polygon points="10 8 16 12 10 16 10 8" fill="currentColor"></polygon>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Video Tutorial</h2>
                                <p class="text-xs text-slate-500 mt-0.5">Video edukasi microlearning Desa Cantik BPS</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 self-start sm:self-auto">
                            <button type="button" onclick="switchNavMenu('pembelajaran')" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-50 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-800 text-slate-700 text-xs font-bold transition shadow-2xs cursor-pointer">
                                <i class="bi bi-arrow-left text-sm"></i>
                                <span>← Kembali ke Menu Pembelajaran</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. Konten Utama: 2 Kolom (Video Player + Playlist Materi) -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                        
                        <!-- Kolom Kiri (lg:col-span-2): Video Player + CTA + Poin Penting Pembelajaran -->
                        <div class="lg:col-span-2 space-y-5">
                            
                            <!-- Card Pemutar Video Utama -->
                            <div class="p-5 sm:p-6 rounded-2xl border-2 border-emerald-300/80 bg-white shadow-2xs space-y-4">
                                <div>
                                    <div class="flex items-center justify-between gap-2 flex-wrap">
                                        <span class="px-2.5 py-1 rounded-lg bg-emerald-700 text-white text-xs font-black tracking-wide">
                                            [2. TONTON VIDEO MICROLEARNING]
                                        </span>
                                        <span id="currentVideoDurationBadge" class="text-[11px] font-black text-emerald-800 bg-emerald-100 border border-emerald-200 px-2.5 py-0.5 rounded-lg">
                                            Durasi: 4 Menit
                                        </span>
                                    </div>
                                    <h3 id="currentVideoTitle" class="font-black text-slate-900 text-base sm:text-lg mt-3">
                                        Profil &amp; Pengenalan Desa Cantik
                                    </h3>
                                    <p id="currentVideoSubtitle" class="text-xs text-slate-500 mt-0.5">
                                        Materi Seri 1 • Video Edukasi Desa Cantik BPS Kolaka Utara
                                    </p>
                                    
                                    <!-- Video Embed Player Container with Click-to-Play Overlay -->
                                    <div class="mt-3 relative w-full aspect-video rounded-xl overflow-hidden bg-slate-950 shadow-md border border-slate-200 group">
                                        <iframe id="mainVideoIframe" class="w-full h-full" src="https://www.youtube.com/embed/RXV4X0cOIA0?enablejsapi=1&rel=0" title="Video Edukasi Desa Cantik BPS" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        
                                        <!-- Quick Click to Play Overlay (Langsung Berputar Otomatis Saat Diklik) -->
                                        <div id="videoPlayOverlay" onclick="playMicrolearningVideo(true)" class="absolute inset-0 bg-slate-950/45 hover:bg-slate-950/25 flex flex-col items-center justify-center cursor-pointer transition z-10">
                                            <div class="w-14 h-14 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white flex items-center justify-center text-2xl shadow-xl transition transform group-hover:scale-110">
                                                ▶
                                            </div>
                                            <span class="text-xs font-black text-white mt-2.5 drop-shadow-md tracking-wide">Klik untuk Putar Video</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- CTA & Kontrol Player -->
                                <div class="space-y-3 pt-1">
                                    <!-- CTA Utama Menuju Post-Test -->
                                    <button type="button" onclick="completeVideoAndGoToPosttest()" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white text-xs sm:text-sm font-black transition flex items-center justify-center gap-2 cursor-pointer shadow-md hover:shadow-lg active:scale-[0.99]">
                                        <span>Tandai Selesai &amp; Lanjut ke Post-test →</span>
                                    </button>

                                    <!-- Sub Controls -->
                                    <div class="flex items-center justify-between text-xs text-slate-600 pt-2 border-t border-slate-100 flex-wrap gap-2">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            <span class="font-bold text-slate-700">Kurikulum: BPS Kolaka Utara</span>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <button type="button" onclick="startVillageVideoOpening(true)" class="font-bold text-emerald-700 hover:text-emerald-800 hover:underline cursor-pointer flex items-center gap-1">
                                                <i class="bi bi-play-btn-fill"></i>
                                                <span>Putar Opening Desa</span>
                                            </button>
                                            <button type="button" onclick="openVideoTheaterModal()" class="font-extrabold text-[#005ea6] hover:underline cursor-pointer flex items-center gap-1">
                                                <span>⛶</span>
                                                <span>Full Layar</span>
                                            </button>
                                            <button type="button" onclick="toggleMainVideoSound()" class="font-extrabold text-emerald-700 hover:underline cursor-pointer flex items-center gap-1">
                                                <span id="iconVideoSound">🔊</span>
                                                <span id="textVideoSound">Suara Aktif</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kotak Ringkasan "Poin Penting Pembelajaran" (4 Poin Singkat) -->
                            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-2xs space-y-3">
                                <div class="flex items-center justify-between pb-2.5 border-b border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <span class="w-7 h-7 rounded-lg bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-700 text-xs font-black">💡</span>
                                        <h4 class="text-xs sm:text-sm font-black uppercase tracking-wider text-slate-800">Poin Penting Pembelajaran</h4>
                                    </div>
                                    <span class="text-[10px] font-bold text-slate-600 bg-slate-100 px-2 py-0.5 rounded-md">Standar Satu Data Indonesia</span>
                                </div>
                                <div id="videoLearningPointsContainer" class="grid sm:grid-cols-2 gap-3 text-xs text-slate-600 pt-1">
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-start gap-2.5">
                                        <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center text-[10px] font-black shrink-0 mt-0.5">1</span>
                                        <div class="leading-relaxed">
                                            <strong class="text-slate-900 block mb-0.5">Prinsip Satu Data Indonesia (SDI)</strong>
                                            Memahami standar data, metadata baku, serta kode referensi statistik desa yang interoperabel.
                                        </div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-start gap-2.5">
                                        <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center text-[10px] font-black shrink-0 mt-0.5">2</span>
                                        <div class="leading-relaxed">
                                            <strong class="text-slate-900 block mb-0.5">Peran Agen Statistik Desa</strong>
                                            Aparatur desa bertindak sebagai garda terdepan pengumpul, verifikator, dan pembina basis data monografi.
                                        </div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-start gap-2.5">
                                        <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center text-[10px] font-black shrink-0 mt-0.5">3</span>
                                        <div class="leading-relaxed">
                                            <strong class="text-slate-900 block mb-0.5">Validasi &amp; Konsistensi PODES</strong>
                                            Menjaga ketelitian pendataan lapangan guna menghindari anomali data fasilitas desa dan kependudukan.
                                        </div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-start gap-2.5">
                                        <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center text-[10px] font-black shrink-0 mt-0.5">4</span>
                                        <div class="leading-relaxed">
                                            <strong class="text-slate-900 block mb-0.5">Pemanfaatan Data Sektoral</strong>
                                            Transformasi data statistik menjadi infografis potensi desa dan acuan penentuan kebijakan APBDes.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan (lg:col-span-1): Kartu "Daftar Materi Video (Playlist)" -->
                        <div class="lg:col-span-1 space-y-4">
                            <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs space-y-3.5">
                                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                                    <div>
                                        <h4 class="text-xs sm:text-sm font-black text-slate-900 flex items-center gap-1.5">
                                            <i class="bi bi-collection-play-fill text-emerald-600"></i>
                                            <span>Daftar Materi Video (Playlist)</span>
                                        </h4>
                                        <p class="text-[11px] text-slate-500 mt-0.5">4 Seri Modul Desa Cantik</p>
                                    </div>
                                    <span class="text-[10px] font-black px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        4 Seri
                                    </span>
                                </div>

                                <!-- Playlist List -->
                                <div id="videoPlaylistList" class="space-y-2.5">
                                    <!-- Video 1 (Default Aktif) -->
                                    <div onclick="selectMicroVideo(0)" id="playlist-item-0" class="p-3 rounded-xl border border-emerald-300 bg-emerald-50/70 hover:bg-emerald-100/60 transition cursor-pointer flex items-center justify-between gap-3 group">
                                        <div class="flex items-center gap-2.5 min-w-0">
                                            <div id="playlist-badge-0" class="w-8 h-8 rounded-lg bg-emerald-600 text-white flex items-center justify-center text-xs font-black shrink-0 shadow-2xs group-hover:scale-105 transition-transform">
                                                ▶
                                            </div>
                                            <div class="min-w-0">
                                                <div id="playlist-title-0" class="text-xs font-black text-emerald-950 truncate">1. Profil &amp; Pengenalan Desa Cantik</div>
                                                <div class="flex items-center gap-2 text-[10px] text-emerald-700 font-semibold mt-0.5">
                                                    <span>Durasi: 4 Menit</span>
                                                    <span>•</span>
                                                    <span id="playlist-status-0" class="text-emerald-800 font-bold">Sedang Diputar</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span id="playlist-icon-0" class="text-emerald-600 shrink-0 text-sm">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </span>
                                    </div>

                                    <!-- Video 2 -->
                                    <div onclick="selectMicroVideo(1)" id="playlist-item-1" class="p-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 transition cursor-pointer flex items-center justify-between gap-3 group">
                                        <div class="flex items-center gap-2.5 min-w-0">
                                            <div id="playlist-badge-1" class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center text-xs font-bold shrink-0 group-hover:bg-emerald-50 group-hover:text-emerald-700 transition">
                                                2
                                            </div>
                                            <div class="min-w-0">
                                                <div id="playlist-title-1" class="text-xs font-bold text-slate-800 truncate">2. Konsep Dasar Statistik Sektoral</div>
                                                <div class="flex items-center gap-2 text-[10px] text-slate-600 mt-0.5">
                                                    <span>Durasi: 6 Menit</span>
                                                    <span>•</span>
                                                    <span id="playlist-status-1">Seri Modul</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span id="playlist-icon-1" class="text-slate-300 shrink-0 text-sm group-hover:text-emerald-500">
                                            <i class="bi bi-play-circle"></i>
                                        </span>
                                    </div>

                                    <!-- Video 3 -->
                                    <div onclick="selectMicroVideo(2)" id="playlist-item-2" class="p-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 transition cursor-pointer flex items-center justify-between gap-3 group">
                                        <div class="flex items-center gap-2.5 min-w-0">
                                            <div id="playlist-badge-2" class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center text-xs font-bold shrink-0 group-hover:bg-emerald-50 group-hover:text-emerald-700 transition">
                                                3
                                            </div>
                                            <div class="min-w-0">
                                                <div id="playlist-title-2" class="text-xs font-bold text-slate-800 truncate">3. Tata Cara Pengisian Data PODES</div>
                                                <div class="flex items-center gap-2 text-[10px] text-slate-600 mt-0.5">
                                                    <span>Durasi: 8 Menit</span>
                                                    <span>•</span>
                                                    <span id="playlist-status-2">Seri Modul</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span id="playlist-icon-2" class="text-slate-300 shrink-0 text-sm group-hover:text-emerald-500">
                                            <i class="bi bi-play-circle"></i>
                                        </span>
                                    </div>

                                    <!-- Video 4 -->
                                    <div onclick="selectMicroVideo(3)" id="playlist-item-3" class="p-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 transition cursor-pointer flex items-center justify-between gap-3 group">
                                        <div class="flex items-center gap-2.5 min-w-0">
                                            <div id="playlist-badge-3" class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center text-xs font-bold shrink-0 group-hover:bg-emerald-50 group-hover:text-emerald-700 transition">
                                                4
                                            </div>
                                            <div class="min-w-0">
                                                <div id="playlist-title-3" class="text-xs font-bold text-slate-800 truncate">4. Praktik Pengolahan Data Excel</div>
                                                <div class="flex items-center gap-2 text-[10px] text-slate-600 mt-0.5">
                                                    <span>Durasi: 7 Menit</span>
                                                    <span>•</span>
                                                    <span id="playlist-status-3">Seri Modul</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span id="playlist-icon-3" class="text-slate-300 shrink-0 text-sm group-hover:text-emerald-500">
                                            <i class="bi bi-play-circle"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Playlist Progress Summary -->
                                <div class="pt-3 border-t border-slate-100">
                                    <div class="flex items-center justify-between text-[11px] font-bold text-slate-600 mb-1.5">
                                        <span>Progres Seri Video:</span>
                                        <span id="playlistProgressLabel" class="text-emerald-700">1 dari 4 Selesai (25%)</span>
                                    </div>
                                    <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                                        <div id="playlistProgressBar" class="bg-emerald-600 h-2 rounded-full transition-all duration-300" style="width: 25%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Tips Sertifikasi -->
                            <div class="p-4 rounded-2xl bg-gradient-to-br from-emerald-50 to-teal-50 border border-emerald-200/80 text-xs text-emerald-950 space-y-2 shadow-2xs">
                                <div class="flex items-center gap-2 font-black text-emerald-900">
                                    <span class="w-6 h-6 rounded-lg bg-emerald-600 text-white flex items-center justify-center text-xs">★</span>
                                    <span>Syarat Kelulusan Agen Statistik</span>
                                </div>
                                <p class="text-[11px] text-emerald-800 leading-relaxed">
                                    Selesaikan menonton seri video microlearning ini untuk membuka evaluasi <strong>Post-Test</strong>. Nilai minimal kelulusan sertifikasi adalah <strong>70 / 100</strong>.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- ===================================================================== -->
                <!-- PRE-TEST & POST-TEST                                                  -->
                <!-- ===================================================================== -->
                <div id="view-pretest" class="menu-view-container hidden space-y-6 animate-in fade-in duration-200">
                    <!-- 1. Header Halaman (Ikon ClipboardCheck Lucide Hijau + Tombol Navigasi & Mode Simulasi Jelas) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-3.5">
                            <div class="w-11 h-11 rounded-xl bg-emerald-50 border border-emerald-200/80 flex items-center justify-center text-emerald-600 p-2.5 shadow-2xs shrink-0">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1"></rect>
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                    <path d="m9 14 2 2 4-4"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Pre-test &amp; Post-test</h2>
                                <p class="text-xs text-slate-500 mt-0.5">Evaluasi kompetensi aparatur desa dan sertifikat Agen Statistik</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5 self-start sm:self-auto flex-wrap">
                            <button type="button" onclick="unlockAllLmsModules()" class="px-3.5 py-2 rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-900 border border-amber-300/80 text-xs font-bold flex items-center gap-2 cursor-pointer transition shadow-2xs group" title="Mode simulasi: membuka seluruh modul pelatihan & evaluasi untuk eksplorasi aparatur desa">
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                <span>Mode Simulasi: Terbuka</span>
                                <i class="bi bi-info-circle text-amber-700 text-xs"></i>
                            </button>
                            <button type="button" onclick="switchNavMenu('pembelajaran')" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-50 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-800 text-slate-700 text-xs font-bold transition shadow-2xs cursor-pointer">
                                <i class="bi bi-arrow-left text-sm"></i>
                                <span>← Kembali ke Menu Pembelajaran</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. Grid 2 Kolom Simetris: Pre-Test & Post-Test -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-stretch">
                        
                        <!-- KARTU KIRI: [1. PRE-TEST] (Tes Kemampuan Awal Aparatur) -->
                        <div class="p-5 sm:p-6 rounded-2xl border-2 border-blue-200 bg-white shadow-2xs flex flex-col justify-between space-y-4">
                            <div>
                                <div class="flex items-center justify-between gap-2">
                                    <span class="px-2.5 py-1 rounded-lg bg-[#005ea6] text-white text-xs font-black flex items-center gap-1.5 shadow-2xs">
                                        <i class="bi bi-pencil-square"></i>
                                        <span>[1. PRE-TEST]</span>
                                    </span>
                                    <span id="badgePretestStatus" class="text-[10px] font-black text-emerald-800 bg-emerald-100 border border-emerald-300 px-2.5 py-1 rounded-md flex items-center gap-1 shadow-2xs"><i class="bi bi-check-circle-fill text-emerald-600"></i><span>Sudah Dikerjakan</span></span>
                                </div>
                                
                                <h4 class="font-black text-slate-900 text-base sm:text-lg mt-3.5">
                                    Tes Kemampuan Awal Aparatur
                                </h4>
                                <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                    Wajib diisi sebelum materi video dan pengolahan data untuk mengukur pemahaman awal konsep statistik sektoral.
                                </p>
                                
                                <!-- Kotak Ringkasan Informasi Simetris (4 Baris) -->
                                <div class="mt-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/90 text-xs text-slate-700 space-y-2">
                                    <div class="flex justify-between items-center pb-1.5 border-b border-slate-100">
                                        <span class="text-slate-500 font-medium">• Jumlah Soal:</span>
                                        <b class="text-slate-900 font-bold">10 Pertanyaan Pilihan Ganda</b>
                                    </div>
                                    <div class="flex justify-between items-center pb-1.5 border-b border-slate-100">
                                        <span class="text-slate-500 font-medium">• Durasi Waktu:</span>
                                        <b class="text-slate-900 font-bold">15 Menit</b>
                                    </div>
                                    <div class="flex justify-between items-center pb-1.5 border-b border-slate-100">
                                        <span class="text-slate-500 font-medium">• Standar Baku:</span>
                                        <b class="text-slate-900 font-bold">BPS Satu Data Indonesia</b>
                                    </div>
                                    <div class="flex justify-between items-center pt-0.5">
                                        <span class="text-slate-500 font-medium">• Status / Skor Awal:</span>
                                        <b id="valPretestScore" class="text-emerald-700 font-extrabold flex items-center gap-1"><i class="bi bi-check-circle-fill"></i><span>Sudah Diisi (Skor: 80)</span></b>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Action Buttons Pre-Test -->
                            <div class="space-y-2 pt-1">
                                <button type="button" id="btnStartPretest" onclick="openPretestModal()" class="w-full py-3 rounded-xl bg-[#005ea6] hover:bg-[#004e8a] text-white text-xs sm:text-sm font-black transition flex items-center justify-center gap-2 cursor-pointer shadow-sm hover:shadow-md active:scale-[0.99]"><i class="bi bi-arrow-repeat text-sm"></i><span>Kerjakan Ulang Pre-Test</span></button>
                                <div class="text-[11px] text-center text-slate-400">
                                    Hasil pre-test digunakan sebagai tolok ukur awal kompetensi aparatur.
                                </div>
                            </div>
                        </div>

                        <!-- KARTU KANAN: [3. POST-TEST] (Kuis Evaluasi Akhir & Sertifikat) -->
                        <div class="p-5 sm:p-6 rounded-2xl border-2 border-emerald-300 bg-white shadow-2xs flex flex-col justify-between space-y-4">
                            <div>
                                <div class="flex items-center justify-between gap-2">
                                    <span class="px-2.5 py-1 rounded-lg bg-emerald-700 text-white text-xs font-black flex items-center gap-1.5 shadow-2xs">
                                        <i class="bi bi-patch-check-fill text-amber-300"></i>
                                        <span>[3. POST-TEST EVALUASI]</span>
                                    </span>
                                    <span id="badgePosttestStatus" class="text-[10px] font-black text-emerald-800 bg-emerald-100 border border-emerald-300 px-2.5 py-1 rounded-md flex items-center gap-1">
                                        <i class="bi bi-check-circle-fill text-emerald-600"></i>
                                        <span>Lulus Evaluasi</span>
                                    </span>
                                </div>
                                
                                <h4 class="font-black text-slate-900 text-base sm:text-lg mt-3.5">
                                    Kuis Evaluasi Akhir &amp; Sertifikat
                                </h4>
                                <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                    Kuis evaluasi pemahaman pasca pelatihan untuk mencetak Sertifikat Kompetensi Agen Statistik Desa.
                                </p>
                                
                                <!-- Kotak Ringkasan Informasi Simetris (4 Baris) -->
                                <div class="mt-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/90 text-xs text-slate-700 space-y-2">
                                    <div class="flex justify-between items-center pb-1.5 border-b border-slate-100">
                                        <span class="text-slate-500 font-medium">• Jumlah Soal:</span>
                                        <b class="text-slate-900 font-bold">15 Pertanyaan Pilihan Ganda</b>
                                    </div>
                                    <div class="flex justify-between items-center pb-1.5 border-b border-slate-100">
                                        <span class="text-slate-500 font-medium">• Durasi Waktu:</span>
                                        <b class="text-slate-900 font-bold">20 Menit</b>
                                    </div>
                                    <div class="flex justify-between items-center pb-1.5 border-b border-slate-100">
                                        <span class="text-slate-500 font-medium">• Passing Grade:</span>
                                        <b class="text-slate-900 font-bold">70 / 100</b>
                                    </div>
                                    <div class="flex justify-between items-center pt-0.5">
                                        <span class="text-slate-500 font-medium">• Nilai Terakhir:</span>
                                        <b id="valLastPostScore" class="text-emerald-700 font-extrabold flex items-center gap-1">
                                            <i class="bi bi-trophy-fill text-amber-500"></i>
                                            <span>85 / 100 (Lulus Kompetensi)</span>
                                        </b>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Action Buttons Post-Test (Lihat Sertifikat Utama + Ulangi Sekunder) -->
                            <div class="space-y-2 pt-1">
                                <button type="button" onclick="openSertifikatModal()" class="w-full py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white text-xs sm:text-sm font-black transition flex items-center justify-center gap-2 cursor-pointer shadow-md hover:shadow-lg active:scale-[0.99]">
                                    <i class="bi bi-award-fill text-amber-300"></i>
                                    <span>Lihat &amp; Unduh Sertifikat Resmi</span>
                                </button>
                                <button type="button" onclick="openPosttestModal()" class="w-full py-2.5 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 hover:border-slate-300 text-slate-700 hover:text-emerald-800 text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-arrow-repeat text-slate-400"></i>
                                    <span>Ulangi Post-Test (Tingkatkan Skor)</span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- 3. Banner Ringkasan Kelulusan & Sertifikat Kompetensi Agen Statistik Desa -->
                    <div class="bg-gradient-to-br from-slate-900 via-[#0a3826] to-[#062417] text-white rounded-3xl p-6 sm:p-7 border border-emerald-500/30 shadow-xl relative overflow-hidden">
                        <!-- Ambient Glow Decorative -->
                        <div class="absolute -right-20 -top-20 w-64 h-64 bg-emerald-500/20 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-teal-500/15 rounded-full blur-3xl pointer-events-none"></div>

                        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                            <!-- Sisi Kiri: Informasi Sertifikasi & Tahapan -->
                            <div class="space-y-3 max-w-xl">
                                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-[11px] font-black uppercase tracking-wider">
                                    <i class="bi bi-award-fill text-amber-300"></i>
                                    <span>Sertifikasi Terverifikasi BPS</span>
                                </div>
                                <h3 class="text-lg sm:text-xl font-black text-white tracking-tight">
                                    Sertifikat Kompetensi Agen Statistik Desa
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                                    Selamat! Anda telah memenuhi seluruh tahapan pembinaan Desa Cantik BPS Kabupaten Kolaka Utara dan dinyatakan <strong>Kompeten (Lulus)</strong> sebagai Agen Statistik Sektoral Desa.
                                </p>

                                <!-- 3 Tahapan Progres Kelulusan (Stepper Horizontal) -->
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 pt-2">
                                    <div class="p-2.5 rounded-xl bg-white/10 border border-white/10 flex items-center gap-2.5">
                                        <span class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-black shrink-0">✓</span>
                                        <div class="min-w-0">
                                            <div class="text-[10px] text-emerald-300 font-extrabold uppercase">Tahap 1</div>
                                            <div class="text-xs font-bold text-white truncate">Pre-test Selesai</div>
                                        </div>
                                    </div>
                                    <div class="p-2.5 rounded-xl bg-white/10 border border-white/10 flex items-center gap-2.5">
                                        <span class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-black shrink-0">✓</span>
                                        <div class="min-w-0">
                                            <div class="text-[10px] text-emerald-300 font-extrabold uppercase">Tahap 2</div>
                                            <div class="text-xs font-bold text-white truncate">Video Microlearning</div>
                                        </div>
                                    </div>
                                    <div class="p-2.5 rounded-xl bg-emerald-500/30 border border-emerald-400/50 flex items-center gap-2.5">
                                        <span class="w-6 h-6 rounded-full bg-amber-400 text-slate-950 flex items-center justify-center text-xs font-black shrink-0">★</span>
                                        <div class="min-w-0">
                                            <div class="text-[10px] text-amber-300 font-extrabold uppercase">Tahap 3</div>
                                            <div class="text-xs font-bold text-white truncate">Post-test Lulus (85)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sisi Kanan: Mini Preview Kartu Sertifikat & Tombol Aksi -->
                            <div class="lg:w-72 w-full shrink-0 flex flex-col items-center justify-center p-5 rounded-2xl bg-white/10 backdrop-blur-md border border-white/15 space-y-3.5 text-center">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-300 to-yellow-500 text-slate-950 flex items-center justify-center text-2xl shadow-lg ring-4 ring-amber-400/20">
                                    🎓
                                </div>
                                <div>
                                    <div class="text-xs font-black text-white">Sertifikat Siap Diterbitkan</div>
                                    <div class="text-[11px] text-slate-300 font-mono mt-0.5">No: DESCAN-KOLUT/2026/042</div>
                                </div>
                                
                                <div class="w-full space-y-2">
                                    <button type="button" onclick="openSertifikatModal()" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-white font-black text-xs transition shadow-lg flex items-center justify-center gap-2 cursor-pointer active:scale-98">
                                        <i class="bi bi-printer-fill"></i>
                                        <span>Pratinjau / Cetak Sertifikat</span>
                                    </button>
                                    <div class="text-[10px] text-slate-400">
                                        Format resmi bertanda tangan digital BPS Kolaka Utara
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================================================================== -->
                <!-- BUKU PANDUAN                                                          -->
                <!-- ===================================================================== -->
                <div id="view-buku" class="menu-view-container hidden space-y-6 animate-in fade-in duration-200">
                    <!-- 1. Header Buku Panduan (Ikon Lucide BookOpen Hijau + Pencarian Cepat + Tombol Menu Pembelajaran) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex items-center gap-3.5">
                            <div class="w-11 h-11 rounded-xl bg-emerald-50 border border-emerald-200/80 flex items-center justify-center text-emerald-600 p-2.5 shadow-2xs shrink-0">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Buku Panduan</h2>
                                <p class="text-xs text-slate-500 mt-0.5">Buku pedoman Excel, rumus dasar statistik sektoral, dan SK Agen Statistik</p>
                            </div>
                        </div>

                        <!-- Right Controls: Input Pencarian Cepat + Navigasi Menu Pembelajaran -->
                        <div class="flex items-center gap-3 self-start md:self-auto flex-wrap sm:flex-nowrap w-full md:w-auto">
                            <div class="relative w-full sm:w-72">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 text-xs">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" id="searchBukuInput" onkeyup="filterBukuKatalog()" placeholder="Cari buku panduan atau dokumen..." class="w-full pl-8 pr-3 py-2 text-xs rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 focus:outline-none transition">
                            </div>
                            <button type="button" onclick="switchNavMenu('pembelajaran')" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-50 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-800 text-slate-700 text-xs font-bold transition shadow-2xs cursor-pointer shrink-0">
                                <i class="bi bi-arrow-left text-sm"></i>
                                <span>← Menu Pembelajaran</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. Katalog Rak Kartu Buku (Book Cover Cards Grid) -->
                    <div class="bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/90 shadow-2xs space-y-5">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3.5 border-b border-slate-100 gap-2">
                            <div>
                                <h4 class="font-black text-slate-900 text-sm sm:text-base flex items-center gap-2">
                                    <span>📚</span>
                                    <span>KATALOG BUKU PEDOMAN &amp; REFERENSI RESMI BPS</span>
                                </h4>
                                <p class="text-xs text-slate-500 mt-0.5">Daftar Modul, Rumus Resmi Statistik Sektoral, dan Surat Keputusan Agen Statistik Desa</p>
                            </div>
                            <span class="text-[11px] font-black text-emerald-800 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full self-start sm:self-auto">
                                4 Dokumen Tersedia
                            </span>
                        </div>

                        <!-- Grid 4 Kartu Sampul Buku Digital -->
                        <div id="gridBukuCards" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
                            
                            <!-- BUKU 1: Buku Pedoman Excel Desa -->
                            <div class="buku-card rounded-2xl border border-emerald-200 bg-white hover:border-emerald-400 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden group">
                                <div class="relative p-5 bg-gradient-to-br from-emerald-800 via-emerald-700 to-teal-800 text-white min-h-[175px] flex flex-col justify-between overflow-hidden">
                                    <!-- Book Spine Left Border Line -->
                                    <div class="absolute left-0 top-0 bottom-0 w-2.5 bg-emerald-400/50 border-r border-white/20"></div>
                                    <div class="pl-2">
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="px-2 py-0.5 rounded-md bg-white/20 backdrop-blur-xs text-[10px] font-black uppercase tracking-wider text-emerald-100">
                                                Modul Praktik
                                            </span>
                                            <span class="text-[10px] text-emerald-200 font-mono font-bold">SDI-BPS-2026</span>
                                        </div>
                                        <h5 class="font-black text-base sm:text-lg tracking-tight mt-3 text-white group-hover:text-amber-200 transition">
                                            Buku Pedoman Excel Desa
                                        </h5>
                                        <p class="text-xs text-emerald-100 mt-0.5 line-clamp-1">30 Lembar Praktik Mandiri</p>
                                    </div>
                                    <div class="pl-2 pt-2 border-t border-white/10 flex items-center justify-between text-[11px] text-emerald-200 font-medium">
                                        <span>30 Halaman</span>
                                        <span>• Format Digital / A4</span>
                                    </div>
                                </div>
                                <div class="p-4 space-y-3.5 flex-1 flex flex-col justify-between bg-white">
                                    <div class="space-y-1.5">
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Nomor Referensi BPS:</span>
                                        <div class="text-xs font-mono font-black text-slate-700 bg-slate-50 px-2 py-1 rounded-lg border border-slate-100">
                                            SDI-BPS-2026-EXCEL
                                        </div>
                                        <p class="text-xs text-slate-600 leading-relaxed pt-1">
                                            Modul terstandarisasi pengolahan data monografi, formula logika, pivot table, dan pelaporan Satu Data Indonesia.
                                        </p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-100">
                                        <button type="button" onclick="openEmbeddedBookReader('excel')" class="w-full py-2 px-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-black text-xs transition shadow-2xs flex items-center justify-center gap-1.5 cursor-pointer">
                                            <i class="bi bi-book-half"></i>
                                            <span>Baca Buku</span>
                                        </button>
                                        <button type="button" onclick="downloadBukuPdf('excel')" class="w-full py-2 px-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-700 font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                            <i class="bi bi-download"></i>
                                            <span>Unduh PDF</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- BUKU 2: Rumus Dasar Statistik Sektoral Desa -->
                            <div class="buku-card rounded-2xl border border-blue-200 bg-white hover:border-blue-400 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden group">
                                <div class="relative p-5 bg-gradient-to-br from-blue-900 via-[#005ea6] to-cyan-800 text-white min-h-[175px] flex flex-col justify-between overflow-hidden">
                                    <!-- Book Spine Left Border Line -->
                                    <div class="absolute left-0 top-0 bottom-0 w-2.5 bg-cyan-300/50 border-r border-white/20"></div>
                                    <div class="pl-2">
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="px-2 py-0.5 rounded-md bg-white/20 backdrop-blur-xs text-[10px] font-black uppercase tracking-wider text-blue-100">
                                                Formula Baku
                                            </span>
                                            <span class="text-[10px] text-cyan-200 font-mono font-bold">STAT-01</span>
                                        </div>
                                        <h5 class="font-black text-base sm:text-lg tracking-tight mt-3 text-white group-hover:text-amber-200 transition">
                                            Rumus Dasar Statistik Desa
                                        </h5>
                                        <p class="text-xs text-blue-100 mt-0.5 line-clamp-1">Formula &amp; Studi Kasus BPS</p>
                                    </div>
                                    <div class="pl-2 pt-2 border-t border-white/10 flex items-center justify-between text-[11px] text-blue-200 font-medium">
                                        <span>14 Halaman</span>
                                        <span>• Rumus Terapan</span>
                                    </div>
                                </div>
                                <div class="p-4 space-y-3.5 flex-1 flex flex-col justify-between bg-white">
                                    <div class="space-y-1.5">
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Nomor Referensi BPS:</span>
                                        <div class="text-xs font-mono font-black text-slate-700 bg-slate-50 px-2 py-1 rounded-lg border border-slate-100">
                                            FORMULA-BPS-STAT-01
                                        </div>
                                        <p class="text-xs text-slate-600 leading-relaxed pt-1">
                                            Formula perhitungan rasio beban tanggungan, desil kemiskinan, sex ratio, angka melek huruf, dan indeks kemandirian desa.
                                        </p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-100">
                                        <button type="button" onclick="openEmbeddedBookReader('rumus')" class="w-full py-2 px-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-black text-xs transition shadow-2xs flex items-center justify-center gap-1.5 cursor-pointer">
                                            <i class="bi bi-book-half"></i>
                                            <span>Baca Buku</span>
                                        </button>
                                        <button type="button" onclick="downloadBukuPdf('rumus')" class="w-full py-2 px-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-700 font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                            <i class="bi bi-download"></i>
                                            <span>Unduh PDF</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- BUKU 3: Surat Keputusan (SK) Agen Statistik Desa -->
                            <div class="buku-card rounded-2xl border border-slate-300 bg-white hover:border-slate-400 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden group">
                                <div class="relative p-5 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-950 text-white min-h-[175px] flex flex-col justify-between overflow-hidden">
                                    <!-- Book Spine Left Border Line -->
                                    <div class="absolute left-0 top-0 bottom-0 w-2.5 bg-amber-400/60 border-r border-white/20"></div>
                                    <div class="pl-2">
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="px-2 py-0.5 rounded-md bg-white/20 backdrop-blur-xs text-[10px] font-black uppercase tracking-wider text-amber-200">
                                                Legalitas Resmi
                                            </span>
                                            <span class="text-[10px] text-amber-300 font-mono font-bold">SK-KOLUT-008</span>
                                        </div>
                                        <h5 class="font-black text-base sm:text-lg tracking-tight mt-3 text-white group-hover:text-amber-200 transition">
                                            SK Agen Statistik Desa
                                        </h5>
                                        <p class="text-xs text-slate-300 mt-0.5 line-clamp-1">Format Baku BPS Kolut</p>
                                    </div>
                                    <div class="pl-2 pt-2 border-t border-white/10 flex items-center justify-between text-[11px] text-slate-300 font-medium">
                                        <span>8 Halaman</span>
                                        <span>• Dokumen Regulasi</span>
                                    </div>
                                </div>
                                <div class="p-4 space-y-3.5 flex-1 flex flex-col justify-between bg-white">
                                    <div class="space-y-1.5">
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Nomor Referensi BPS:</span>
                                        <div class="text-xs font-mono font-black text-slate-700 bg-slate-50 px-2 py-1 rounded-lg border border-slate-100">
                                            SK-BPS-KOLUT-008
                                        </div>
                                        <p class="text-xs text-slate-600 leading-relaxed pt-1">
                                            Landasan legalitas pembentukan Agen Statistik Sektoral, tupoksi pengelola data desa, dan hak akses portal Desa Cantik.
                                        </p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-100">
                                        <button type="button" onclick="openEmbeddedBookReader('sk')" class="w-full py-2 px-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-black text-xs transition shadow-2xs flex items-center justify-center gap-1.5 cursor-pointer">
                                            <i class="bi bi-book-half"></i>
                                            <span>Baca Buku</span>
                                        </button>
                                        <button type="button" onclick="downloadBukuPdf('sk')" class="w-full py-2 px-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-700 font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                            <i class="bi bi-download"></i>
                                            <span>Unduh PDF</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- BUKU 4: Slot Placeholder Buku Saku Desa Cantik 2026 -->
                            <div class="buku-card rounded-2xl border-2 border-dashed border-emerald-300 bg-emerald-50/20 hover:bg-emerald-50/50 hover:border-emerald-400 hover:shadow-md transition-all duration-300 flex flex-col justify-between overflow-hidden group">
                                <div class="relative p-5 bg-gradient-to-br from-emerald-100/70 to-teal-100/50 text-slate-800 min-h-[175px] flex flex-col justify-between border-b border-emerald-200/60">
                                    <div class="absolute left-0 top-0 bottom-0 w-2.5 bg-emerald-400/40"></div>
                                    <div class="pl-2">
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="px-2 py-0.5 rounded-md bg-emerald-600 text-white text-[10px] font-black uppercase tracking-wider">
                                                Slot Tambahan
                                            </span>
                                            <span class="text-[10px] text-emerald-800 font-mono font-bold">EDISI 2026</span>
                                        </div>
                                        <h5 class="font-black text-base sm:text-lg tracking-tight mt-3 text-emerald-950">
                                            Buku Saku Desa Cantik
                                        </h5>
                                        <p class="text-xs text-emerald-800 font-medium mt-0.5">Segera Tersedia / Upload PDF</p>
                                    </div>
                                    <div class="pl-2 pt-2 border-t border-emerald-200/60 flex items-center justify-between text-[11px] text-emerald-800 font-bold">
                                        <span>Tahap Sinkronisasi</span>
                                        <span>• Siap Menampung PDF</span>
                                    </div>
                                </div>
                                <div class="p-4 space-y-3.5 flex-1 flex flex-col justify-between bg-white/80">
                                    <div class="space-y-1.5">
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Status Berkas:</span>
                                        <div class="text-xs font-mono font-bold text-emerald-800 bg-emerald-50 px-2 py-1 rounded-lg border border-emerald-200 flex items-center justify-between">
                                            <span>BPS-KOLUT-REV-2026</span>
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                                        </div>
                                        <p class="text-xs text-slate-500 leading-relaxed pt-1">
                                            Slot khusus untuk menampung panduan saku aparatur desa dan dokumen publikasi sektoral terbaru yang akan diunggah berikutnya.
                                        </p>
                                    </div>
                                    <div class="pt-2 border-t border-slate-100">
                                        <button type="button" onclick="openPdfUploadSlotPrompt()" class="w-full py-2 px-3 rounded-xl border border-emerald-300 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 font-black text-xs transition flex items-center justify-center gap-1.5 cursor-pointer shadow-2xs">
                                            <i class="bi bi-cloud-arrow-up-fill text-emerald-600"></i>
                                            <span>Pasang URL Berkas PDF</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- 3. Wadah Pembaca Buku Interaktif (Interactive Book Reader & PDF Container) -->
                    <div id="sectionBookReader" class="bg-white rounded-3xl border border-slate-200/90 shadow-md overflow-hidden space-y-0 transition-all duration-300">
                        <!-- Top Header Reader -->
                        <div class="px-5 py-4 bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 text-white flex flex-wrap items-center justify-between gap-3 border-b border-slate-700">
                            <div class="flex items-center gap-3">
                                <span class="w-9 h-9 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg shadow-inner">📖</span>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span id="readerActiveBadge" class="text-[9.5px] font-black uppercase tracking-wider px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                                            Modul Praktik Mandiri
                                        </span>
                                        <span id="readerActiveRef" class="text-[10px] text-slate-400 font-mono">
                                            SDI-BPS-2026-EXCEL
                                        </span>
                                    </div>
                                    <h3 id="readerActiveTitle" class="text-sm sm:text-base font-black text-white tracking-tight mt-0.5">
                                        Buku Pedoman Excel Desa (30 Lembar Praktik Mandiri)
                                    </h3>
                                </div>
                            </div>
                            
                            <!-- Mode Switcher & Action Controls -->
                            <div class="flex items-center gap-2.5 text-xs flex-wrap">
                                <!-- Mode Switcher: Mode Preview Baca Digital vs Mode Slot Berkas PDF -->
                                <div class="bg-white/10 p-0.5 rounded-xl border border-white/10 flex items-center">
                                    <button type="button" onclick="setBookDisplayMode('html')" id="btnModeHtml" class="px-3 py-1.5 rounded-lg text-xs font-black bg-white text-slate-900 shadow-2xs transition cursor-pointer">
                                        Preview Baca
                                    </button>
                                    <button type="button" onclick="setBookDisplayMode('pdf')" id="btnModePdf" class="px-3 py-1.5 rounded-lg text-xs font-bold text-slate-300 hover:text-white transition cursor-pointer">
                                        Slot Berkas PDF
                                    </button>
                                </div>

                                <!-- Tombol Unduh PDF -->
                                <button type="button" onclick="triggerActiveBookDownload()" class="px-3.5 py-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs shadow-2xs transition flex items-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                    <span>Unduh PDF</span>
                                </button>
                                
                                <!-- Tombol Layar Penuh -->
                                <button type="button" onclick="openExcelReaderModal()" class="px-3 py-1.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs transition flex items-center gap-1 cursor-pointer" title="Perbesar Layar Penuh">
                                    <span>⛶</span>
                                    <span class="hidden sm:inline">Layar Penuh</span>
                                </button>
                            </div>
                        </div>

                        <!-- Reader Body: 2 Kolom (Sisi Kiri Daftar Isi/Bab + Area Bingkai Halaman Buku) -->
                        <div class="grid grid-cols-1 lg:grid-cols-12 min-h-[580px]">
                            <!-- Sisi Kiri: Daftar Isi & Bab Buku (lg:col-span-4) -->
                            <div class="lg:col-span-4 border-r border-slate-200 bg-slate-50/80 p-4 sm:p-5 space-y-3.5 flex flex-col justify-between">
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between pb-2 border-b border-slate-200">
                                        <span class="text-xs font-black uppercase tracking-wider text-slate-800 flex items-center gap-1.5">
                                            <i class="bi bi-list-nested text-emerald-600"></i>
                                            <span>Daftar Isi &amp; Bab</span>
                                        </span>
                                        <span id="readerTocCount" class="text-[10px] font-bold text-slate-600 bg-white px-2 py-0.5 rounded-md border border-slate-200">
                                            30 Lembar
                                        </span>
                                    </div>
                                    
                                    <!-- Filter Bab Cepat -->
                                    <div class="relative">
                                        <input type="text" id="filterTocInput" onkeyup="filterTocList()" placeholder="Cari bab atau materi..." class="w-full pl-8 pr-3 py-1.5 text-xs rounded-xl bg-white border border-slate-200 focus:outline-none focus:border-emerald-500 transition">
                                        <i class="bi bi-search absolute left-2.5 top-2 text-slate-400 text-xs"></i>
                                    </div>

                                    <!-- Daftar Bab / Lembar Scrollable -->
                                    <div id="readerTocList" class="space-y-1.5 max-h-[400px] overflow-y-auto pr-1">
                                        <!-- Diinjeksi otomatis via JavaScript -->
                                    </div>
                                </div>

                                <!-- Bagian Bawah: Ringkasan Progress Membaca -->
                                <div class="pt-3 border-t border-slate-200 space-y-1.5">
                                    <div class="flex items-center justify-between text-[11px] font-bold text-slate-600">
                                        <span>Progres Membaca:</span>
                                        <span id="readerProgressText" class="text-emerald-700 font-mono">Lembar 1 dari 30</span>
                                    </div>
                                    <div class="w-full bg-slate-200 rounded-full h-2 overflow-hidden">
                                        <div id="readerProgressBar" class="bg-emerald-600 h-2 rounded-full transition-all duration-300" style="width: 3.3%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Area Utama: Bingkai Halaman Buku Digital (lg:col-span-8) -->
                            <div class="lg:col-span-8 p-4 sm:p-6 bg-slate-100 flex flex-col justify-between space-y-4">
                                
                                <!-- MODE 1: Preview Baca Halaman Digital (HTML) -->
                                <div id="readerHtmlContainer" class="flex-1 flex flex-col justify-between space-y-4">
                                    <!-- Book Page Paper Frame with Subtle Shadow -->
                                    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 shadow-md min-h-[440px] relative flex flex-col justify-between">
                                        <!-- Subtle Page Spine Fold Shadow on left edge -->
                                        <div class="absolute left-0 top-0 bottom-0 w-3 bg-gradient-to-r from-slate-200/60 to-transparent pointer-events-none rounded-l-2xl"></div>
                                        
                                        <!-- Page Header Metadata -->
                                        <div class="flex items-center justify-between pb-3 border-b border-slate-100 text-xs text-slate-400">
                                            <span id="readerPageSection" class="font-bold text-emerald-800">Bagian I: Pengenalan &amp; Standar Data Desa</span>
                                            <span id="readerPageNumberBadge" class="bg-slate-100 text-slate-600 font-mono font-bold px-2 py-0.5 rounded">Halaman 1 / 30</span>
                                        </div>

                                        <!-- Dynamic Page Content -->
                                        <div id="readerPageContent" class="py-4 text-xs sm:text-sm text-slate-700 leading-relaxed overflow-y-auto max-h-[380px]">
                                            <!-- Injeksi konten buku -->
                                        </div>

                                        <!-- Page Footer Sign-off -->
                                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-[10px] sm:text-[11px] text-slate-400">
                                            <span>BPS Kabupaten Kolaka Utara • Pojok Literasi Statistik Desa</span>
                                            <span class="font-mono text-slate-500">DESCAN-2026-REF</span>
                                        </div>
                                    </div>

                                    <!-- Navigation Controls Below Page -->
                                    <div class="flex items-center justify-between gap-3 pt-1 flex-wrap sm:flex-nowrap">
                                        <button type="button" onclick="readerPrevPage()" id="btnReaderPrev" class="px-4 py-2 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-xs font-bold transition shadow-2xs flex items-center gap-1.5 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                                            <i class="bi bi-chevron-left"></i>
                                            <span>← Halaman Sebelumnya</span>
                                        </button>
                                        
                                        <div class="flex items-center gap-2">
                                            <span class="text-xs text-slate-500 font-bold hidden sm:inline">Lompat Lembar:</span>
                                            <select id="readerJumpSelect" onchange="readerJumpToPage(this.value)" class="text-xs py-1.5 px-2.5 rounded-xl bg-white border border-slate-200 font-bold text-slate-700 focus:outline-none focus:border-emerald-500">
                                                <!-- Dropdown options populated dynamically -->
                                            </select>
                                        </div>

                                        <button type="button" onclick="readerNextPage()" id="btnReaderNext" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-2xs flex items-center gap-1.5 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                                            <span>Halaman Berikutnya →</span>
                                            <i class="bi bi-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- MODE 2: Slot/Container Khusus Berkas PDF Resmi (Iframe PDF Viewer) -->
                                <div id="readerPdfContainer" class="hidden flex-1 flex flex-col space-y-3">
                                    <div class="p-3 bg-amber-50 border border-amber-200 rounded-xl text-xs text-amber-900 flex items-center justify-between flex-wrap gap-2">
                                        <div class="flex items-center gap-2">
                                            <span class="text-base">📌</span>
                                            <span><strong>Slot Container Iframe PDF Resmi:</strong> Tempat dokumen PDF buku panduan asli ditampilkan dan dapat dipasang URL file PDF secara langsung.</span>
                                        </div>
                                        <button type="button" onclick="openPdfUploadSlotPrompt()" class="px-3 py-1 rounded-lg bg-amber-200 hover:bg-amber-300 text-amber-950 font-bold text-[11px] transition cursor-pointer">
                                            Pasang / Ganti URL PDF
                                        </button>
                                    </div>

                                    <!-- PDF Viewer Frame -->
                                    <div class="w-full h-[520px] rounded-2xl overflow-hidden border border-slate-300 bg-slate-900 shadow-inner relative">
                                        <iframe id="readerPdfIframe" class="w-full h-full" src="" title="PDF Document Viewer"></iframe>
                                        
                                        <!-- Fallback placeholder when iframe source is empty -->
                                        <div id="readerPdfPlaceholder" class="absolute inset-0 bg-slate-900/95 text-white flex flex-col items-center justify-center p-6 text-center space-y-3">
                                            <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center text-3xl shadow-inner">
                                                📄
                                            </div>
                                            <h4 id="readerPdfDocTitle" class="text-base font-black text-white">Buku Pedoman Excel Desa</h4>
                                            <p class="text-xs text-slate-400 max-w-md">
                                                Berkas PDF siap disematkan langsung melalui URL berkas resmi BPS. Anda juga dapat membaca versi digital interaktif melalui tombol preview di atas.
                                            </p>
                                            <div class="flex items-center gap-3 pt-2">
                                                <button type="button" onclick="triggerActiveBookDownload()" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs transition flex items-center gap-2 shadow-md cursor-pointer">
                                                    <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                    <span>Unduh Berkas PDF Resmi</span>
                                                </button>
                                                <button type="button" onclick="setBookDisplayMode('html')" class="px-4 py-2 rounded-xl bg-white/20 hover:bg-white/30 text-white font-bold text-xs transition cursor-pointer">
                                                    <span>Beralih ke Preview Baca</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================================================================== -->
                <!-- CLIENT DATA & SCRIPT LOGIC (CRYSTAL CLEAR PREMIUM HD IMAGES) -->
    <script>
        // ==============================================================
        // GLOBAL STATE VARIABLES (SAFE TOP-LEVEL INITIALIZATION)
        // ==============================================================
        let currentTargetVillage = 'kamisi';
        let currentVillageKey = 'kamisi';
        let currentNavMenu = 'dashboard';
        let currentPemTab = 'panduan-excel';
        let currentAnalitikDesa = 'kamisi';
        let currentMonevBuktiTab = 'desa';
        let currentExcelPage = 1;
        let activeBookKey = 'excel';
        let currentReaderPage = 1;
        let readerDisplayMode = 'html';

        const catalogBooksData = {
            excel: {
                id: 'excel',
                badge: 'Modul Praktik Mandiri',
                ref: 'SDI-BPS-2026-EXCEL',
                title: 'Buku Pedoman Excel Desa (30 Lembar Praktik)',
                sub: 'Modul terstandarisasi pengolahan data monografi & agregasi Excel',
                pagesCount: 30,
                pdfUrl: '/files/Buku_Pedoman_Excel_Desa_Cantik_2026.pdf',
                chapters: [
                    { page: 1, title: 'Bab 1: Cover & Identitas Buku Panduan Excel' },
                    { page: 2, title: 'Bab 2: Standar Kompetensi Agen Statistik Desa' },
                    { page: 3, title: 'Bab 3: Anatomi Antarmuka Microsoft Excel' },
                    { page: 4, title: 'Bab 4: Format Data Standar Satu Data Indonesia' },
                    { page: 5, title: 'Bab 5: Teknik Validasi NIK & Teks 16 Digit' },
                    { page: 6, title: 'Bab 6: Formula Dasar: SUM, AVERAGE, COUNT' },
                    { page: 7, title: 'Bab 7: Formula Logika: IF, AND, OR untuk Bansos' },
                    { page: 8, title: 'Bab 8: Formula Statistik Khusus: COUNTIF & SUMIF' },
                    { page: 9, title: 'Bab 9: Relasi Lintas Tabel: VLOOKUP & INDEX-MATCH' },
                    { page: 10, title: 'Bab 10: Pembersihan Data (Data Cleansing)' },
                    { page: 11, title: 'Bab 11: Analisis Piramida Penduduk' },
                    { page: 12, title: 'Bab 12: Visualisasi Donat & Bar Chart' },
                    { page: 13, title: 'Bab 13: Rekapitulasi Data PODES Desa' },
                    { page: 14, title: 'Bab 14: Indeks Kemandirian & Desil Ekonomi' },
                    { page: 15, title: 'Bab 15: Ekspor Laporan Resmi & Proteksi Data' }
                ]
            },
            rumus: {
                id: 'rumus',
                badge: 'Formula Baku Statistik',
                ref: 'FORMULA-BPS-STAT-01',
                title: 'Rumus Dasar Statistik Sektoral Desa',
                sub: 'Formula Rasio Beban Tanggungan, Desil Kemiskinan, & Sex Ratio',
                pagesCount: 14,
                pdfUrl: '/files/Rumus_Dasar_Statistik_Sektoral_Desa.pdf',
                chapters: [
                    { page: 1, title: 'Bab 1: Pengantar Variabel Makro Sektoral Desa' },
                    { page: 2, title: 'Bab 2: Formula Rasio Jenis Kelamin (Sex Ratio)' },
                    { page: 3, title: 'Bab 3: Formula Rasio Beban Tanggungan (Dependency Ratio)' },
                    { page: 4, title: 'Bab 4: Klasifikasi Desil Kemiskinan & Seleksi Bansos' },
                    { page: 5, title: 'Bab 5: Angka Melek Huruf & Partisipasi Sekolah' },
                    { page: 6, title: 'Bab 6: Indikator Sanitasi Layak & Akses Air Minum' },
                    { page: 7, title: 'Bab 7: Indeks Ketahanan Pangan & Komoditas Unggulan' }
                ]
            },
            sk: {
                id: 'sk',
                badge: 'Legalitas & Regulasi',
                ref: 'SK-BPS-KOLUT-008',
                title: 'Surat Keputusan (SK) Agen Statistik Desa',
                sub: 'Legalitas pembentukan Agen Statistik Sektoral Desa Binaan BPS',
                pagesCount: 8,
                pdfUrl: '/files/SK_Agen_Statistik_Desa_2026.pdf',
                chapters: [
                    { page: 1, title: 'Lembar 1: Surat Keputusan Kepala Desa' },
                    { page: 2, title: 'Lembar 2: Konsideran Menimbang & Mengingat' },
                    { page: 3, title: 'Lembar 3: Diktum Keputusan & Masa Tugas Agen' },
                    { page: 4, title: 'Lembar 4: Lampiran I - Struktur Agen Statistik Desa' },
                    { page: 5, title: 'Lembar 5: Lampiran II - Uraian Tugas & Wewenang' },
                    { page: 6, title: 'Lembar 6: Lampiran III - Standar Operasional Prosedur' }
                ]
            }
        };

        function filterBukuKatalog() {
            const query = (document.getElementById('searchBukuInput')?.value || '').toLowerCase().trim();
            const cards = document.querySelectorAll('#gridBukuCards .buku-card');
            cards.forEach(card => {
                const text = card.textContent.toLowerCase();
                if (!query || text.includes(query)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        function openEmbeddedBookReader(bookKey) {
            activeBookKey = bookKey || 'excel';
            currentReaderPage = 1;
            const book = catalogBooksData[activeBookKey] || catalogBooksData['excel'];

            // Update Header Meta
            const titleEl = document.getElementById('readerActiveTitle');
            const badgeEl = document.getElementById('readerActiveBadge');
            const refEl = document.getElementById('readerActiveRef');
            const tocCountEl = document.getElementById('readerTocCount');
            const pdfDocTitle = document.getElementById('readerPdfDocTitle');

            if (titleEl) titleEl.textContent = book.title;
            if (badgeEl) badgeEl.textContent = book.badge;
            if (refEl) refEl.textContent = book.ref;
            if (tocCountEl) tocCountEl.textContent = `${book.pagesCount} Lembar`;
            if (pdfDocTitle) pdfDocTitle.textContent = book.title;

            // Render Table of Contents on the left
            renderReaderToc();

            // Render Page Content
            renderReaderCurrentPage();

            // Smooth scroll to reader
            const readerEl = document.getElementById('sectionBookReader');
            if (readerEl) {
                readerEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
            showToast(`📖 Membuka ${book.title}`, '📚');
        }

        function renderReaderToc() {
            const book = catalogBooksData[activeBookKey] || catalogBooksData['excel'];
            const container = document.getElementById('readerTocList');
            const jumpSelect = document.getElementById('readerJumpSelect');
            if (!container) return;

            let chapters = book.chapters || [];
            // If excel book and getExcelBookPages is available, use rich pages
            if (activeBookKey === 'excel' && typeof getExcelBookPages === 'function') {
                const excelPages = getExcelBookPages();
                if (excelPages && excelPages.length) {
                    chapters = excelPages.map(p => ({
                        page: p.page,
                        title: p.title.replace('Lembar ' + p.page + ': ', `Bab ${p.page}: `)
                    }));
                }
            }

            container.innerHTML = chapters.map(ch => `
                <div onclick="readerJumpToPage(${ch.page})" id="toc-item-${ch.page}" class="p-2.5 rounded-xl border ${ch.page === currentReaderPage ? 'border-emerald-300 bg-emerald-50 text-emerald-950 font-black shadow-2xs' : 'border-slate-100 bg-white hover:bg-slate-50 text-slate-700 font-medium'} transition cursor-pointer flex items-center justify-between gap-2 text-xs group">
                    <div class="flex items-center gap-2 min-w-0">
                        <span class="w-5 h-5 rounded-md ${ch.page === currentReaderPage ? 'bg-emerald-600 text-white' : 'bg-slate-100 text-slate-600 group-hover:bg-emerald-50 group-hover:text-emerald-700'} flex items-center justify-center text-[10px] font-bold shrink-0">${ch.page}</span>
                        <span class="truncate">${ch.title}</span>
                    </div>
                    <i class="bi bi-chevron-right text-[11px] ${ch.page === currentReaderPage ? 'text-emerald-600' : 'text-slate-300 group-hover:text-slate-500'} shrink-0"></i>
                </div>
            `).join('');

            if (jumpSelect) {
                jumpSelect.innerHTML = chapters.map(ch => `
                    <option value="${ch.page}" ${ch.page === currentReaderPage ? 'selected' : ''}>Hal ${ch.page}: ${ch.title.substring(0, 28)}...</option>
                `).join('');
            }

            updateReaderProgress(book.pagesCount || 30);
        }

        function filterTocList() {
            const q = (document.getElementById('filterTocInput')?.value || '').toLowerCase();
            const items = document.querySelectorAll('#readerTocList > div');
            items.forEach(el => {
                const txt = el.textContent.toLowerCase();
                el.style.display = (!q || txt.includes(q)) ? 'flex' : 'none';
            });
        }

        function renderReaderCurrentPage() {
            const book = catalogBooksData[activeBookKey] || catalogBooksData['excel'];
            const contentEl = document.getElementById('readerPageContent');
            const pageNumBadge = document.getElementById('readerPageNumberBadge');
            const pageSection = document.getElementById('readerPageSection');
            const btnPrev = document.getElementById('btnReaderPrev');
            const btnNext = document.getElementById('btnReaderNext');

            const totalPages = book.pagesCount || 30;
            if (pageNumBadge) pageNumBadge.textContent = `Halaman ${currentReaderPage} / ${totalPages}`;
            if (btnPrev) btnPrev.disabled = currentReaderPage <= 1;
            if (btnNext) btnNext.disabled = currentReaderPage >= totalPages;

            if (activeBookKey === 'excel' && typeof getExcelBookPages === 'function') {
                const excelPages = getExcelBookPages();
                const p = excelPages[currentReaderPage - 1];
                if (p && contentEl) {
                    if (pageSection) pageSection.textContent = p.section || 'Bagian Pembelajaran';
                    contentEl.innerHTML = p.content;
                }
            } else if (activeBookKey === 'rumus') {
                if (pageSection) pageSection.textContent = 'Formula & Komputasi Statistik Sektoral';
                if (contentEl) {
                    contentEl.innerHTML = `
                        <div class="space-y-4">
                            <div class="p-4 rounded-xl bg-blue-50 border border-blue-200 text-blue-950">
                                <span class="text-xs font-black uppercase tracking-wider text-blue-700 block mb-1">Materi Bab ${currentReaderPage}</span>
                                <h4 class="text-base font-black">${book.chapters[currentReaderPage - 1]?.title || 'Formula Statistik'}</h4>
                                <p class="text-xs text-blue-800 mt-1">Standar BPS Satu Data Indonesia untuk Desa Cantik.</p>
                            </div>
                            <div class="p-4 rounded-xl bg-white border border-slate-200 text-xs space-y-2">
                                <div class="font-bold text-slate-800">Formula Matematika Baku:</div>
                                <div class="p-3 bg-slate-900 text-emerald-400 font-mono rounded-lg text-xs">= (Jumlah_Penduduk_Laki / Jumlah_Penduduk_Perempuan) * 100</div>
                                <p class="text-slate-600 text-[11px] pt-1">Gunakan formula di atas untuk menghitung rasio jenis kelamin dengan akurasi dua angka di belakang koma.</p>
                            </div>
                        </div>
                    `;
                }
            } else {
                if (pageSection) pageSection.textContent = 'Dokumen Legalitas & Struktur Organisasi';
                if (contentEl) {
                    contentEl.innerHTML = `
                        <div class="space-y-4">
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 text-slate-900">
                                <span class="text-xs font-black uppercase tracking-wider text-slate-500 block mb-1">Dokumen Resmi Lembar ${currentReaderPage}</span>
                                <h4 class="text-base font-black">${book.chapters[currentReaderPage - 1]?.title || 'Surat Keputusan'}</h4>
                                <p class="text-xs text-slate-600 mt-1">Regulasi pembentukan Agen Statistik Sektoral Desa BPS Kolaka Utara.</p>
                            </div>
                            <div class="p-4 rounded-xl bg-white border border-slate-200 text-xs text-slate-700 leading-relaxed space-y-2">
                                <p>Menimbang bahwa dalam rangka mendukung percepatan Satu Data Indonesia di tingkat desa, perlu ditetapkan susunan keanggotaan Agen Statistik Desa Cantik 2026.</p>
                                <p>Keputusan ini berlaku sejak tanggal ditetapkan dengan ketentuan apabila di kemudian hari terdapat kekeliruan akan diadakan perbaikan sebagaimana mestinya.</p>
                            </div>
                        </div>
                    `;
                }
            }

            // Sync TOC active item
            document.querySelectorAll('#readerTocList > div').forEach(el => {
                el.className = 'p-2.5 rounded-xl border border-slate-100 bg-white hover:bg-slate-50 text-slate-700 font-medium transition cursor-pointer flex items-center justify-between gap-2 text-xs group';
            });
            const activeToc = document.getElementById(`toc-item-${currentReaderPage}`);
            if (activeToc) {
                activeToc.className = 'p-2.5 rounded-xl border border-emerald-300 bg-emerald-50 text-emerald-950 font-black shadow-2xs transition cursor-pointer flex items-center justify-between gap-2 text-xs group';
            }

            // Sync Jump dropdown
            const jumpSelect = document.getElementById('readerJumpSelect');
            if (jumpSelect) jumpSelect.value = currentReaderPage;

            updateReaderProgress(totalPages);
        }

        function updateReaderProgress(total) {
            const pBar = document.getElementById('readerProgressBar');
            const pText = document.getElementById('readerProgressText');
            const pct = Math.round((currentReaderPage / total) * 100);
            if (pBar) pBar.style.width = pct + '%';
            if (pText) pText.textContent = `Lembar ${currentReaderPage} dari ${total} (${pct}%)`;
        }

        function readerPrevPage() {
            if (currentReaderPage > 1) {
                currentReaderPage--;
                renderReaderCurrentPage();
            }
        }

        function readerNextPage() {
            const book = catalogBooksData[activeBookKey] || catalogBooksData['excel'];
            if (currentReaderPage < (book.pagesCount || 30)) {
                currentReaderPage++;
                renderReaderCurrentPage();
            }
        }

        function readerJumpToPage(page) {
            currentReaderPage = parseInt(page) || 1;
            renderReaderCurrentPage();
        }

        function setBookDisplayMode(mode) {
            readerDisplayMode = mode;
            const htmlBox = document.getElementById('readerHtmlContainer');
            const pdfBox = document.getElementById('readerPdfContainer');
            const btnHtml = document.getElementById('btnModeHtml');
            const btnPdf = document.getElementById('btnModePdf');

            if (mode === 'html') {
                if (htmlBox) htmlBox.classList.remove('hidden');
                if (pdfBox) pdfBox.classList.add('hidden');
                if (btnHtml) {
                    btnHtml.className = 'px-3 py-1.5 rounded-lg text-xs font-black bg-white text-slate-900 shadow-2xs transition cursor-pointer';
                }
                if (btnPdf) {
                    btnPdf.className = 'px-3 py-1.5 rounded-lg text-xs font-bold text-slate-300 hover:text-white transition cursor-pointer';
                }
            } else {
                if (htmlBox) htmlBox.classList.add('hidden');
                if (pdfBox) pdfBox.classList.remove('hidden');
                if (btnHtml) {
                    btnHtml.className = 'px-3 py-1.5 rounded-lg text-xs font-bold text-slate-300 hover:text-white transition cursor-pointer';
                }
                if (btnPdf) {
                    btnPdf.className = 'px-3 py-1.5 rounded-lg text-xs font-black bg-white text-slate-900 shadow-2xs transition cursor-pointer';
                }

                // Update PDF iframe if URL is set
                const book = catalogBooksData[activeBookKey] || catalogBooksData['excel'];
                const iframe = document.getElementById('readerPdfIframe');
                const placeholder = document.getElementById('readerPdfPlaceholder');
                if (book.pdfUrl && book.pdfUrl.endsWith('.pdf')) {
                    if (iframe) iframe.src = book.pdfUrl;
                    if (placeholder) placeholder.classList.add('hidden');
                } else {
                    if (placeholder) placeholder.classList.remove('hidden');
                }
            }
        }

        function openPdfUploadSlotPrompt() {
            const currentUrl = catalogBooksData[activeBookKey]?.pdfUrl || '';
            const newUrl = prompt('Masukkan URL file PDF buku panduan resmi (misal: /files/buku-panduan.pdf atau link Google Drive/Cloud):', currentUrl);
            if (newUrl !== null && newUrl.trim() !== '') {
                if (catalogBooksData[activeBookKey]) {
                    catalogBooksData[activeBookKey].pdfUrl = newUrl.trim();
                }
                const iframe = document.getElementById('readerPdfIframe');
                const placeholder = document.getElementById('readerPdfPlaceholder');
                if (iframe) iframe.src = newUrl.trim();
                if (placeholder) placeholder.classList.add('hidden');
                setBookDisplayMode('pdf');
                showToast('✅ Berkas PDF berhasil dihubungkan ke wadah pembaca!', '📄');
            }
        }

        function triggerActiveBookDownload() {
            downloadBukuPdf(activeBookKey);
        }

        function downloadBukuPdf(bookKey) {
            const book = catalogBooksData[bookKey] || catalogBooksData['excel'];
            showToast(`Mengunduh berkas PDF: ${book.title}...`, '📥');
            if (bookKey === 'excel' && typeof triggerExcelBookPdfExport === 'function') {
                triggerExcelBookPdfExport();
            } else {
                const link = document.createElement('a');
                link.href = book.pdfUrl || '#';
                link.setAttribute('download', `${book.title.replace(/[^a-zA-Z0-9]/g, '_')}.pdf`);
                link.target = '_blank';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }
        
        let bookViewMode = 'spread';
        let thematicLeafletMap = null;
        let thematicLayersGroup = null;
        let peneranganChartInstance = null;
        let desilChartInstance = null;

        
        
        // Wireframe Interactivity Handlers
        function togglePublicFilter(el) {
            showToast(el.checked ? '🌐 Tampilan Publik diaktifkan.' : '🔒 Mode Terbatas aktif.');
        }

        function toggleInternalFilter(el) {
            showToast(el.checked ? '🔒 Mode Internal BPS & Pemda aktif.' : '🌐 Mode Umum aktif.');
        }

        function downloadProfilDesaPdf() {
            showToast('📥 Mengunduh Dokumen Profil & Monografi Desa Kalu Kaluku (PDF)...');
            setTimeout(() => {
                window.print();
            }, 600);
        }

        function unlockAllLmsModules() {
            const bPre = document.getElementById('badgePretestStatus');
            const bPost = document.getElementById('badgePosttestStatus');
            if (bPre) { bPre.textContent = 'Terbuka'; bPre.className = 'text-[10px] font-black text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-md'; }
            if (bPost) { bPost.textContent = 'Terbuka'; bPost.className = 'text-[10px] font-black text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-md'; }
            showToast('🔓 Seluruh materi LMS Desa Cantik telah dibuka!');
        }

        
        // ==============================================================
        // SISTEM PUBLIKASI RESMI STATISTIK SEKTORAL & BRS
        // ==============================================================
        let activePubDocType = 'monografi';

        function openPublikasiDocModal(docType) {
            activePubDocType = docType;
            const modal = document.getElementById('publikasiDocModal');
            const iconEl = document.getElementById('pubModalIcon');
            const tagEl = document.getElementById('pubModalTag');
            const titleEl = document.getElementById('pubModalTitle');
            const bodyEl = document.getElementById('pubModalBody');
            const curVillage = currentTargetVillage || currentVillageKey || 'lapolu';
            const vData = (typeof villagesData !== 'undefined' && villagesData[curVillage]) ? villagesData[curVillage] : (villagesData?.lapolu || {});
            const vTitle = vData.title || 'Desa Lapolu';
            const sData = (typeof getSectoralData === 'function') ? getSectoralData(curVillage) : (descanSectoralData[curVillage] || {});

            if (!modal) return;

            if (docType === 'monografi') {
                if (iconEl) iconEl.textContent = '📘';
                if (tagEl) tagEl.textContent = 'BUKU PUBLIKASI RESMI • BPS KAB. KOLAKA UTARA';
                if (titleEl) titleEl.textContent = `Monografi Statistik Sektoral ${vTitle} 2026`;
                if (bodyEl) {
                    const regCode = `BPS-7408-${(vData.kec || 'KODEOHA').toUpperCase()}-${(curVillage || 'DESA').toUpperCase()}-2026`;
                    const kkVal = sData.kpi?.kk ? sData.kpi.kk + ' KK' : (vData.kk || '321 KK');
                    bodyEl.innerHTML = `
                        <div class="space-y-4">
                            <div class="p-4 rounded-2xl bg-blue-50/70 border border-blue-200 flex flex-wrap items-center justify-between gap-2 text-xs">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-blue-800">Nomor Registrasi BPS</div>
                                    <div class="font-bold text-slate-800 text-sm">${regCode}</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-md bg-blue-600 text-white text-[10px] font-black">Format PDF</span>
                                    <span class="px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-800 text-[10px] font-black">84 Halaman</span>
                                    <span class="px-2.5 py-1 rounded-md bg-slate-200 text-slate-800 text-[10px] font-black">4,8 MB</span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <h4 class="font-black text-slate-900 text-sm">Daftar Bab & Matriks Sektoral</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Bab I: Geografi & Batas Wilayah</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Batas administrasi, luas ${vData.luas || '16,40 km²'}, topografi ${vData.dusunCount || 3} dusun & ${vData.rtCount || 9} RT, dan peta tematik spasial WebGIS.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Bab II: Kependudukan & Piramida</b>
                                        <p class="text-[11px] text-slate-500 mt-1">${vData.pop || '1.264 Jiwa'}, ${kkVal}, rasio jenis kelamin terstandar, dan piramida penduduk kelompok usia produktif.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Bab III: Komoditas & Pesisir</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Sentra ${vData.komoditas || 'Cengkeh, Kakao, Agroindustri'}, hamparan produktif ${vData.agri || 'Sentra Komoditas'}, dan akses maritim Teluk Bone.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Bab IV: Kesejahteraan & Monografi PODES</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Klaster UMKM ${vData.umkm || '16 Unit'}, verifikasi desil P3KE, dan profil sarana prasarana desa terintegrasi PODES 2025.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-950 text-xs flex items-center gap-2">
                                <span class="text-base">✓</span>
                                <div><b>Terverifikasi BPS RI:</b> Data telah melalui tahapan rekonsiliasi dan memenuhi 4 Prinsip Satu Data Indonesia (SDI).</div>
                            </div>
                        </div>
                    `;
                }
            } else if (docType === 'tabel') {
                if (iconEl) iconEl.innerHTML = '<i class="bi bi-table text-xl text-blue-200"></i>';
                if (tagEl) tagEl.textContent = 'KOMPILASI TABEL STATISTIK SEKTORAL • BPS SDI';
                if (titleEl) titleEl.textContent = `Tabel Statistik Sektoral ${vTitle} 2025`;
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-4">
                            <div class="p-4 rounded-2xl bg-blue-50/70 border border-blue-200 flex flex-wrap items-center justify-between gap-2 text-xs">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-blue-800">Kode Wilayah Kemendagri & BPS</div>
                                    <div class="font-bold text-slate-800 text-sm">74.08.KODEOHA.DESA</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-md bg-blue-600 text-white text-[10px] font-black">Format XLS / CSV</span>
                                    <span class="px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-800 text-[10px] font-black">32 Matriks Data</span>
                                    <span class="px-2.5 py-1 rounded-md bg-slate-200 text-slate-800 text-[10px] font-black">Standar SDI</span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <h4 class="font-black text-slate-900 text-sm">Daftar Matriks Tabulasi Sektoral</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Tabel 1: Demografi & Piramida Penduduk</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Distribusi umur, rasio jenis kelamin, dan kelompok usia kerja per dusun.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Tabel 2: Profil Sosial & Desil P3KE</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Distribusi kepala keluarga berdasarkan desil kesejahteraan & bansos.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Tabel 3: Pertanian Kakao & Kelautan</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Luas lahan panen, estimasi produksi tahunan, dan kelompok nelayan.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Tabel 4: Sarana Pendidikan & Kesehatan</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Ketersediaan poskesdes, posyandu, PAUD, SD, dan fasilitas ibadah.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 rounded-xl bg-blue-50 border border-blue-200 text-blue-950 text-xs flex items-center gap-2">
                                <span class="text-base">✓</span>
                                <div><b>Metadata Baku SDI:</b> Setiap kolom tabel dilengkapi definisi operasional, satuan ukuran, dan metodologi baku BPS.</div>
                            </div>
                        </div>
                    `;
                }
            } else if (docType === 'statistik' || docType === 'brs') {
                if (iconEl) iconEl.innerHTML = '<i class="bi bi-bar-chart-line-fill text-xl text-amber-200"></i>';
                if (tagEl) tagEl.textContent = 'PUBLIKASI STATISTIK & INDIKATOR MAKRO • BPS KOLUT';
                if (titleEl) titleEl.textContent = `Publikasi Statistik & Indikator Makro ${vTitle} 2025`;
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-4">
                            <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200 flex flex-wrap items-center justify-between gap-2 text-xs">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-amber-800">Nomor Publikasi Resmi</div>
                                    <div class="font-bold text-slate-800 text-sm">BPS-7408-STAT-DESA-2025</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-md bg-amber-600 text-white text-[10px] font-black">Rilis Resmi</span>
                                    <span class="px-2.5 py-1 rounded-md bg-slate-200 text-slate-800 text-[10px] font-black">24 Halaman</span>
                                    <span class="px-2.5 py-1 rounded-md bg-slate-200 text-slate-800 text-[10px] font-black">2,4 MB</span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <h4 class="font-black text-slate-900 text-sm">Indikator Strategis Pembangunan Desa</h4>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-center text-xs">
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <div class="text-[10px] text-slate-400 font-bold">Inflasi Daerah</div>
                                        <div class="text-lg font-black text-slate-900 mt-1">2,1%</div>
                                        <div class="text-[9px] text-emerald-600 font-bold">Terkendali</div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <div class="text-[10px] text-slate-400 font-bold">NTP Kakao</div>
                                        <div class="text-lg font-black text-slate-900 mt-1">112,4</div>
                                        <div class="text-[9px] text-emerald-600 font-bold">Surplus</div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <div class="text-[10px] text-slate-400 font-bold">Rasio Miskin</div>
                                        <div class="text-lg font-black text-slate-900 mt-1">${villagesData[curVillage]?.kemiskinan || '3,1%'}</div>
                                        <div class="text-[9px] text-emerald-600 font-bold">Rendah</div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <div class="text-[10px] text-slate-400 font-bold">Kasus Stunting</div>
                                        <div class="text-lg font-black text-slate-900 mt-1">${villagesData[curVillage]?.stunting || '2'}</div>
                                        <div class="text-[9px] text-emerald-600 font-bold">Terkendali</div>
                                    </div>
                                </div>
                            </div>

                            <p class="text-xs text-slate-600 leading-relaxed">
                                Publikasi berkala hasil evaluasi dan pembinaan statistik memuat perkembangan indikator makro, ketenagakerjaan, nilai tukar petani, dan neraca komoditas desa binaan BPS Kabupaten Kolaka Utara.
                            </p>
                        </div>
                    `;
                }
            } else if (docType === 'leaflet') {
                if (iconEl) iconEl.innerHTML = '<i class="bi bi-file-earmark-richtext-fill text-xl text-rose-200"></i>';
                if (tagEl) tagEl.textContent = 'LEAFLET INFOGRAFIS TEMATIK LIPAT 3 • BPS DESA CANTIK';
                if (titleEl) titleEl.textContent = `Leaflet Infografis Tematik ${vTitle} 2025`;
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-4">
                            <div class="p-4 rounded-2xl bg-rose-50/70 border border-rose-200 flex flex-wrap items-center justify-between gap-2 text-xs">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-rose-800">Spesifikasi Diseminasi Cetak</div>
                                    <div class="font-bold text-slate-800 text-sm">Brosur Tri-Fold A4 (297 x 210 mm)</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-md bg-rose-600 text-white text-[10px] font-black">Format PDF HD</span>
                                    <span class="px-2.5 py-1 rounded-md bg-slate-200 text-slate-800 text-[10px] font-black">Lipat Tiga</span>
                                    <span class="px-2.5 py-1 rounded-md bg-slate-200 text-slate-800 text-[10px] font-black">Siap Cetak CMYK</span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <h4 class="font-black text-slate-900 text-sm">Struktur Konten Leaflet Lipat 3</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs">
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Panel 1: Sampul Depan</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Logo resmi, nama desa, moto daerah, dan QR code portal Satu Data Desa.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Panel 2: Lembar Dalam</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Infografis piramida penduduk, sentra kakao/pesisir, dan 5 pilar Desa Cantik.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Panel 3: Kontak & Peta</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Peta batas desa, kanal aduan, dan layanan PST BPS Kolaka Utara.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-950 text-xs flex items-center gap-2">
                                <span class="text-base">✓</span>
                                <div><b>Diseminasi Publik:</b> Sangat cocok dibagikan kepada warga, mahasiswa KKN, tamu kedinasan, dan peserta Musrenbangdes.</div>
                            </div>
                        </div>
                    `;
                }
            } else if (docType === 'brs_old') {
                if (iconEl) iconEl.textContent = '📰';
                if (tagEl) tagEl.textContent = 'BERITA RESMI STATISTIK • BPS KAB. KOLAKA UTARA';
                if (titleEl) titleEl.textContent = 'BRS Sektoral Kolut: Triwulan II 2026';
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-4">
                            <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200 flex flex-wrap items-center justify-between gap-2 text-xs">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-amber-800">Nomor Publikasi BRS</div>
                                    <div class="font-bold text-slate-800 text-sm">No. 14/05/7408/Th.XXVI</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-md bg-amber-600 text-white text-[10px] font-black">Rilis Resmi</span>
                                    <span class="px-2.5 py-1 rounded-md bg-slate-200 text-slate-800 text-[10px] font-black">24 Halaman</span>
                                    <span class="px-2.5 py-1 rounded-md bg-slate-200 text-slate-800 text-[10px] font-black">2,1 MB</span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <h4 class="font-black text-slate-900 text-sm">Ringkasan Indikator Sektoral Kolaka Utara</h4>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-center text-xs">
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <div class="text-[10px] text-slate-400 font-bold">Inflasi Daerah</div>
                                        <div class="text-lg font-black text-slate-900 mt-1">2,1%</div>
                                        <div class="text-[9px] text-emerald-600 font-bold">Terkendali</div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <div class="text-[10px] text-slate-400 font-bold">NTP Kakao</div>
                                        <div class="text-lg font-black text-slate-900 mt-1">112,4</div>
                                        <div class="text-[9px] text-emerald-600 font-bold">Surplus</div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <div class="text-[10px] text-slate-400 font-bold">Harga Kakao</div>
                                        <div class="text-sm font-black text-amber-600 mt-1.5">115 Rb/Kg</div>
                                        <div class="text-[9px] text-slate-500 font-bold">Fermentasi</div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <div class="text-[10px] text-slate-400 font-bold">Tingkat TPT</div>
                                        <div class="text-lg font-black text-slate-900 mt-1">3,1%</div>
                                        <div class="text-[9px] text-emerald-600 font-bold">Rendah</div>
                                    </div>
                                </div>
                            </div>

                            <p class="text-xs text-slate-600 leading-relaxed">
                                Berita Resmi Statistik (BRS) diseminasi berkala memuat perkembangan indikator makro, ketenagakerjaan, nilai tukar petani, dan neraca komoditas unggulan desa-desa se-Kecamatan Kodeoha.
                            </p>
                        </div>
                    `;
                }
            } else if (docType === 'potensi') {
                if (iconEl) iconEl.textContent = '🍫';
                if (tagEl) tagEl.textContent = 'KATALOG SEKTORAL & UMKM • BINAAN BPS & PEMDA';
                if (titleEl) titleEl.textContent = `Profil Komoditas Unggulan & UMKM ${vTitle}`;
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-4">
                            <div class="p-4 rounded-2xl bg-teal-50/70 border border-teal-200 flex flex-wrap items-center justify-between gap-2 text-xs">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-teal-800">Katalog Potensi Sektoral</div>
                                    <div class="font-bold text-slate-800 text-sm">Sentra Kakao & Pesisir Bahari</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-md bg-teal-600 text-white text-[10px] font-black">Katalog Lengkap</span>
                                    <span class="px-2.5 py-1 rounded-md bg-slate-200 text-slate-800 text-[10px] font-black">36 Halaman</span>
                                    <span class="px-2.5 py-1 rounded-md bg-slate-200 text-slate-800 text-[10px] font-black">3,5 MB</span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <h4 class="font-black text-slate-900 text-sm">Potensi Unggulan Wilayah</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs">
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>🌱 Sentra Kakao Rakyat</b>
                                        <p class="text-[11px] text-slate-500 mt-1">480 Ha lahan produktif, 385 ton/thn, didukung 8 kelompok tani dan pembibitan unggul.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>🏪 24 IKM & UMKM</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Olahan cokelat lokal, keripik pisang, furnitur kayu, dan perdagangan sembako.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>🐟 Perikanan & Pesisir</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Garis pantai 3,8 km Teluk Bone, 42 armada nelayan, dan budidaya tambak ikan bandeng.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closePublikasiDocModal() {
            const m = document.getElementById('publikasiDocModal');
            if (m) {
                m.classList.add('hidden');
                m.classList.remove('flex');
            }
        }

        
        // ==============================================================
        // OUTPUT DESA & DOWNLOAD DOKUMEN SISTEM
        // ==============================================================
        function downloadOutputDoc(type) {
            const curVillage = currentTargetVillage || 'kamisi';
            const vData = villagesData[curVillage] || villagesData.kamisi || {};
            const vTitle = vData.title || 'Desa Kamisi';
            const slug = vTitle.replace(/\s+/g, '_');
            
            let fileName = '';
            let mimeType = 'text/plain';
            let fileContent = '';
            
            if (type === 'monografi') {
                fileName = `Monografi_Statistik_${slug}_2025.pdf`;
                mimeType = 'application/pdf';
                fileContent = `%PDF-1.4\n% Dokumen Buku Monografi PODES & Statistik Sektoral ${vTitle} 2025/2026\n% BPS Kabupaten Kolaka Utara - Terbina Satu Data Indonesia\n`;
            } else if (type === 'tabel') {
                fileName = `Tabel_Statistik_Sektoral_${slug}_2025.csv`;
                mimeType = 'text/csv;charset=utf-8;';
                fileContent = `No,Indikator Sektoral,Nilai Capaian,Satuan,Sumber Data\n1,Jumlah Penduduk,"${vData.pop || '1.576'}",Jiwa,BPS & Registrasi Desa 2025\n2,Kepala Keluarga,"${vData.kk || '394'}",KK,PODES 2025\n3,Kemiskinan Makro,"${vData.kemiskinan || '3.1%'}",Persen,Regsosek BPS\n4,Kasus Stunting,"${vData.stunting || '2'}",Kasus,Posyandu & Puskesmas\n5,Status IDM,"${vData.kategori || 'Desa Mandiri'}",Klasifikasi,Kemendesa & BPS\n6,Komoditas Utama,"${vData.komoditas || 'Kakao & Perikanan'}",Sektor Riil,Dinas Pertanian & BPS\n7,Luas Wilayah,"${vData.luas || '14.80 km²'}",Wilayah,Batas Indikatif Spasial\n`;
            } else if (type === 'statistik' || type === 'brs') {
                fileName = `Publikasi_Statistik_Makro_${slug}_2025.pdf`;
                mimeType = 'application/pdf';
                fileContent = `%PDF-1.4\n% Publikasi Indikator Makro dan Berita Resmi Statistik ${vTitle} 2025\n% BPS Kabupaten Kolaka Utara\n`;
            } else if (type === 'leaflet') {
                fileName = `Leaflet_Infografis_Tematik_${slug}_2025.pdf`;
                mimeType = 'application/pdf';
                fileContent = `%PDF-1.4\n% Leaflet Infografis Visual Lipat Tiga (Tri-Fold) ${vTitle} 2025\n% Diseminasi Desa Cantik BPS Kolaka Utara\n`;
            } else if (type === 'all') {
                fileName = `Paket_Dokumen_Output_${slug}_Lengkap_2025.zip`;
                mimeType = 'application/zip';
                fileContent = `PK\x03\x04Paket Dokumen Output Desa Cantik ${vTitle} Lengkap: Monografi, Tabel Sektoral, Publikasi Makro, Leaflet Infografis`;
            } else {
                fileName = `Dokumen_Output_${slug}_2025.pdf`;
                mimeType = 'application/pdf';
                fileContent = `%PDF-1.4\n% Dokumen Output Desa ${vTitle}\n`;
            }
            
            showToast(`📥 Mempersiapkan dan mengunduh ${fileName}...`);
            
            try {
                const blob = new Blob([fileContent], { type: mimeType });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = fileName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                setTimeout(() => {
                    showToast(`✅ Berkas ${fileName} berhasil diunduh!`);
                }, 600);
            } catch(e) {
                showToast(`✅ Berkas ${fileName} berhasil diproses!`);
            }
        }

                // ==============================================================
        // GALERI FOTO DESA RESMI & SISTEM UNGGAH DOKUMENTASI ADMIN
        // Koleksi Foto Otentik Per Desa (Kecamatan Kodeoha & Tiwu)
        // ==============================================================
        const baseGaleriDatabase = [
            {
                id: 'base_1',
                cat: 'pembinaan',
                desa: 'Desa Kamisi',
                title: 'Pelatihan Literasi Statistik Aparatur',
                caption: 'Bimbingan teknis konsep, definisi, dan standarisasi kuesioner PODES bersama BPS Kolaka Utara.',
                img: 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80',
                badge: 'Pembinaan BPS',
                date: 'Agustus 2025'
            },
            {
                id: 'base_2',
                cat: 'pembinaan',
                desa: 'Desa Kalu Kaluku',
                title: 'Verifikasi & Rekonsiliasi Data Sektoral',
                caption: 'Penyelarasan indikator kemiskinan ekstrem dan bansos P3KE bersama tim verifikator desa.',
                img: 'https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?auto=format&fit=crop&w=800&q=80',
                badge: 'SDI Kolut',
                date: 'Juli 2025'
            },
            {
                id: 'base_3',
                cat: 'potensi',
                desa: 'Desa Tanggeawo',
                title: 'Sentra Perkebunan Kakao Unggulan',
                caption: 'Budidaya kakao rakyat sambung pucuk produktif dengan pembibitan varietas unggul Kolaka Utara.',
                img: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                badge: 'Potensi Kakao',
                date: '2025'
            },
            {
                id: 'base_4',
                cat: 'potensi',
                desa: 'Desa Lapolu',
                title: 'Agroindustri Cengkeh & Penyulingan Nilam',
                caption: 'Hasil panen perkebunan cengkeh perbukitan serta pengolahan minyak atsiri nilam bernilai ekspor.',
                img: 'https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?auto=format&fit=crop&w=800&q=80',
                badge: 'Cengkeh & Nilam',
                date: '2025'
            },
            {
                id: 'base_5',
                cat: 'bahari',
                desa: 'Desa Kamisi',
                title: 'Pesisir Bahari & Sentra Teri Tradisional',
                caption: 'Armada nelayan Teluk Bone dan penjemuran ikan teri asin tradisional pesisir Kodeoha.',
                img: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80',
                badge: 'Pesona Bahari',
                date: '2025'
            },
            {
                id: 'base_6',
                cat: 'bahari',
                desa: 'Desa Mattiro Bulu',
                title: 'Bentang Alam Perbukitan & Sumber Air',
                caption: 'Panorama alam perbukitan asri yang menopang ketahanan pangan dan irigasi persawahan.',
                img: 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=800&q=80',
                badge: 'Panorama Alam',
                date: '2025'
            },
            {
                id: 'base_7',
                cat: 'pelayanan',
                desa: 'Kel. Mala-Mala',
                title: 'Pelayanan Adminduk Terpadu Desa',
                caption: 'Pusat layanan administrasi satu pintu dan pencatatan kependudukan digital presisi.',
                img: 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
                badge: 'Layanan Desa',
                date: '2025'
            },
            {
                id: 'base_8',
                cat: 'pelayanan',
                desa: 'Desa Lametuna',
                title: 'Posyandu Terpadu & Penanganan Stunting',
                caption: 'Pemeriksaan rutin kesehatan ibu-anak dan pemantauan gizi balita terdata di dashboard desa.',
                img: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                badge: 'Kesehatan Warga',
                date: '2025'
            }
        ];

        // KOLEKSI FOTO SPESIFIK & OTENTIK PER DESA (Kecamatan Kodeoha & Tiwu)
        const villageGaleriDatabase = {
            // === 1. DESA KAMISI (Pesisir & Perikanan Teri, Kakao) ===
            kamisi: [
                {
                    id: 'kamisi_1',
                    cat: 'alam',
                    title: 'Pesisir Bahari & Perahu Tradisional Nelayan Kamisi',
                    caption: 'Aktivitas armada kapal nelayan Dusun Kamisi Bahari di sepanjang perairan Teluk Bone.',
                    img: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pesona Bahari',
                    date: 'September 2025'
                },
                {
                    id: 'kamisi_2',
                    cat: 'potensi',
                    title: 'Sentra Pengeringan Ikan Teri Tradisional Kamisi',
                    caption: 'Penjemuran teri asin higienis di para-para bambu pesisir oleh kelompok nelayan Dusun II Kamisi.',
                    img: 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80',
                    badge: 'Produk Unggulan',
                    date: 'Oktober 2025'
                },
                {
                    id: 'kamisi_3',
                    cat: 'pembinaan',
                    title: 'Bimtek Pengisian Kuesioner PODES & Standar SDI BPS',
                    caption: 'Pelatihan aparatur Desa Kamisi dalam standarisasi metadata statistik sektoral di Balai Desa Kamisi.',
                    img: 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pembinaan BPS',
                    date: 'Agustus 2025'
                },
                {
                    id: 'kamisi_4',
                    cat: 'potensi',
                    title: 'Perkebunan Kakao Sambung Pucuk Dusun III Kamisi',
                    caption: 'Pengembangan kloning kakao produktif terintegrasi seluas 190 Ha untuk peningkatan panen petani.',
                    img: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                    badge: 'Perkebunan Rakyat',
                    date: 'Juli 2025'
                },
                {
                    id: 'kamisi_5',
                    cat: 'pelayanan',
                    title: 'Posyandu Terpadu Dahlia & Pengukuran Stunting Balita',
                    caption: 'Pemeriksaan rutin kesehatan ibu dan balita dengan pencatatan digital terintegrasi sistem desa.',
                    img: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                    badge: 'Layanan Kesehatan',
                    date: 'November 2025'
                },
                {
                    id: 'kamisi_6',
                    cat: 'alam',
                    title: 'Konservasi Sabuk Hijau Mangrove Pesisir Kamisi',
                    caption: 'Zona perlindungan pesisir dan habitat biota laut muara Teluk Bone yang dijaga swadaya warga.',
                    img: 'https://images.unsplash.com/photo-1534447677768-be436bb09401?auto=format&fit=crop&w=800&q=80',
                    badge: 'Lingkungan Hidup',
                    date: 'Juni 2025'
                },
                {
                    id: 'kamisi_7',
                    cat: 'pelayanan',
                    title: 'Pelayanan Adminduk Presisi di Kantor Desa Kamisi',
                    caption: 'Pelayanan pembuatan surat keterangan, mutasi domisili, dan verifikasi DTKS terpadu warga Kamisi.',
                    img: 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
                    badge: 'Tata Kelola Desa',
                    date: 'Mei 2025'
                },
                {
                    id: 'kamisi_8',
                    cat: 'potensi',
                    title: 'Gudang Pengolahan & Pengemasan Teri Siap Pasarkan',
                    caption: 'Klaster UMKM pengemasan hasil olahan perikanan Kamisi yang menembus pasar kabupaten dan provinsi.',
                    img: 'https://images.unsplash.com/photo-1589923188900-85dae523342b?auto=format&fit=crop&w=800&q=80',
                    badge: 'UMKM Mandiri',
                    date: 'Oktober 2025'
                }
            ],

            // === 2. DESA KOROHA (Kakao 240 Ha, Cengkeh Bukit, Rumput Laut) ===
            koroha: [
                {
                    id: 'koroha_1',
                    cat: 'potensi',
                    title: 'Perkebunan Kakao Sambung Pucuk 240 Ha Koroha',
                    caption: 'Kawasan perkebunan kakao perbukitan dengan sistem pangkas dan pemupukan organik terstandar.',
                    img: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                    badge: 'Komoditas Unggulan',
                    date: 'Agustus 2025'
                },
                {
                    id: 'koroha_2',
                    cat: 'potensi',
                    title: 'Sentra Cengkeh Bukit & Hasil Rempah Koroha',
                    caption: 'Pohon cengkeh lereng perbukitan Koroha yang menghasilkan panen bunga cengkeh berkualitas premium.',
                    img: 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?auto=format&fit=crop&w=800&q=80',
                    badge: 'Perkebunan Rempah',
                    date: 'Juli 2025'
                },
                {
                    id: 'koroha_3',
                    cat: 'alam',
                    title: 'Budidaya Rumput Laut di Pesisir Dusun Maritim',
                    caption: 'Bentangan rakit budidaya rumput laut eucheuma cottonii oleh nelayan pesisir Dusun II Koroha.',
                    img: 'https://images.unsplash.com/photo-1505118380757-91f5f5632de0?auto=format&fit=crop&w=800&q=80',
                    badge: 'Maritim & Pesisir',
                    date: 'September 2025'
                },
                {
                    id: 'koroha_4',
                    cat: 'pembinaan',
                    title: 'Pendataan Presisi Rumah Tangga Desil BPS Koroha',
                    caption: 'Tim agen statistik desa dan BPS melakukan verifikasi lapangan variabel sosial ekonomi keluarga.',
                    img: 'https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pembinaan BPS',
                    date: 'Oktober 2025'
                },
                {
                    id: 'koroha_5',
                    cat: 'alam',
                    title: 'Panorama Perbukitan Hijau Koroha & Hutan Lindung',
                    caption: 'Bentang alam hijau perbukitan Koroha yang menopang cadangan air tanah dan kelestarian ekosistem.',
                    img: 'https://images.unsplash.com/photo-1518173946687-a4c8a383392e?auto=format&fit=crop&w=800&q=80',
                    badge: 'Panorama Alam',
                    date: 'Mei 2025'
                },
                {
                    id: 'koroha_6',
                    cat: 'pelayanan',
                    title: 'Poskesdes Koroha & Pemeriksaan Balita Rutin',
                    caption: 'Pemberian vitamin A, imunisasi dasar, serta edukasi gizi bagi keluarga di Dusun Koroha Raya.',
                    img: 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=800&q=80',
                    badge: 'Kesehatan Desa',
                    date: 'November 2025'
                },
                {
                    id: 'koroha_7',
                    cat: 'pembinaan',
                    title: 'Musyawarah SDGs Desa & Evaluasi Data Sektoral',
                    caption: 'Rembuk aparatur bersama BPD menyelaraskan alokasi dana desa dengan indikator SDGs Koroha.',
                    img: 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=800&q=80',
                    badge: 'SDGs Desa',
                    date: 'September 2025'
                },
                {
                    id: 'koroha_8',
                    cat: 'pelayanan',
                    title: 'Balai Pertemuan Warga & Pusat Informasi Publik',
                    caption: 'Gedung serbaguna Desa Koroha sebagai sentra koordinasi kelompok tani dan pelatihan keterampilan.',
                    img: 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80',
                    badge: 'Fasilitas Desa',
                    date: 'Juli 2025'
                }
            ],

            // === 3. KELURAHAN MALA-MALA (Ibukota Kecamatan, Puskesmas, Perdagangan) ===
            malamala: [
                {
                    id: 'malamala_1',
                    cat: 'pelayanan',
                    title: 'Kantor Kelurahan Mala-Mala & Layanan Terpadu Satu Pintu',
                    caption: 'Pusat administrasi pemerintahan kelurahan dan layanan kependudukan digital berbasis NIK.',
                    img: 'https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pemerintahan',
                    date: 'Oktober 2025'
                },
                {
                    id: 'malamala_2',
                    cat: 'pelayanan',
                    title: 'Puskesmas Perawatan Kodeoha di Mala-Mala',
                    caption: 'Fasilitas kesehatan rawat inap rujukan utama kecamatan dengan layanan persalinan dan IGD 24 jam.',
                    img: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                    badge: 'Kesehatan Warga',
                    date: 'September 2025'
                },
                {
                    id: 'malamala_3',
                    cat: 'potensi',
                    title: 'Pusat Perdagangan & Kawasan Pertokoan Mala-Mala',
                    caption: 'Aktivitas niaga dan pasar harian yang melayani kebutuhan logistik sembako seluruh desa Kodeoha.',
                    img: 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pusat Perdagangan',
                    date: 'Agustus 2025'
                },
                {
                    id: 'malamala_4',
                    cat: 'pembinaan',
                    title: 'Workshop Literasi Statistik Digital Kelurahan BPS',
                    caption: 'Bimtek pemutakhiran data monografi kelurahan dan integrasi portal Desa Cantik Kolaka Utara.',
                    img: 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pembinaan BPS',
                    date: 'Juli 2025'
                },
                {
                    id: 'malamala_5',
                    cat: 'pelayanan',
                    title: 'Kompleks Fasilitas Pendidikan Terpadu Mala-Mala',
                    caption: 'Gedung sekolah dasar dan menengah dengan sarana laboratorium komputer dan perpustakaan lengkap.',
                    img: 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pendidikan',
                    date: 'November 2025'
                },
                {
                    id: 'malamala_6',
                    cat: 'alam',
                    title: 'Ruang Terbuka Hijau & Lanskap Perkotaan Mala-Mala',
                    caption: 'Taman kota dan jalur hijau asri di pusat ibukota kecamatan sebagai sarana interaksi masyarakat.',
                    img: 'https://images.unsplash.com/photo-1472214103451-9374bd1c798e?auto=format&fit=crop&w=800&q=80',
                    badge: 'Tata Kota Asri',
                    date: 'Juni 2025'
                },
                {
                    id: 'malamala_7',
                    cat: 'pembinaan',
                    title: 'Rekonsiliasi DTKS & Validasi Bantuan Sosial Terbina',
                    caption: 'Penyelarasan data keluarga prasejahtera dan penerima PKH/Bansos bersama tim verifikator SDI.',
                    img: 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=800&q=80',
                    badge: 'Verifikasi SDI',
                    date: 'Agustus 2025'
                },
                {
                    id: 'malamala_8',
                    cat: 'potensi',
                    title: 'Pameran Produk IKM & Sentra Kuliner Khas Kodeoha',
                    caption: 'Produk olahan pangan lokal dan kerajinan tangan hasil binaan kelompok pemberdayaan perempuan.',
                    img: 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?auto=format&fit=crop&w=800&q=80',
                    badge: 'UMKM Mandiri',
                    date: 'Oktober 2025'
                }
            ],

            // === 4. DESA LAPOLU (Sentra Cengkeh 380 Ha, 75 Unit IKM Suling Minyak) ===
            lapolu: [
                {
                    id: 'lapolu_1',
                    cat: 'potensi',
                    title: 'Perkebunan Cengkeh Rakyat Seluas 380 Ha Lapolu',
                    caption: 'Hamparan pohon cengkeh tua produktif di perbukitan Lapolu yang menjadi komoditas emas desa.',
                    img: 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=800&q=80',
                    badge: 'Sentra Cengkeh',
                    date: 'Agustus 2025'
                },
                {
                    id: 'lapolu_2',
                    cat: 'potensi',
                    title: 'Klaster 75 Unit IKM Penyulingan Minyak Daun Cengkeh',
                    caption: 'Industri pengolahan minyak atsiri daun cengkeh tradisional yang memasok pasar farmasi dan parfum.',
                    img: 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?auto=format&fit=crop&w=800&q=80',
                    badge: 'Industri Atsiri',
                    date: 'September 2025'
                },
                {
                    id: 'lapolu_3',
                    cat: 'pembinaan',
                    title: 'Bimtek Agregasi Data Excel Monografi Bersama BPS',
                    caption: 'Pelatihan 30 lembar kerja Excel monografi desa dan pembuatan tabel statistik sektoral Lapolu.',
                    img: 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pembinaan BPS',
                    date: 'Juli 2025'
                },
                {
                    id: 'lapolu_4',
                    cat: 'potensi',
                    title: 'Penjemuran Bunga Cengkeh Alami Beraroma Khas',
                    caption: 'Proses pengeringan bunga cengkeh dengan panas matahari alami untuk menjaga kadar eugenol tinggi.',
                    img: 'https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?auto=format&fit=crop&w=800&q=80',
                    badge: 'Kualitas Ekspor',
                    date: 'Oktober 2025'
                },
                {
                    id: 'lapolu_5',
                    cat: 'pelayanan',
                    title: 'Balai Desa Lapolu & Layanan Tata Kelola Presisi',
                    caption: 'Kantor balai desa yang melayani administrasi kependudukan dan registrasi kartu keluarga monografi.',
                    img: 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
                    badge: 'Layanan Desa',
                    date: 'Mei 2025'
                },
                {
                    id: 'lapolu_6',
                    cat: 'alam',
                    title: 'Bentang Alam Lembah Hijau & Irigasi Teknis Lapolu',
                    caption: 'Saluran air bersih pegunungan yang mengairi hamparan perkebunan dan permukiman warga Lapolu.',
                    img: 'https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?auto=format&fit=crop&w=800&q=80',
                    badge: 'Panorama Alam',
                    date: 'Juni 2025'
                },
                {
                    id: 'lapolu_7',
                    cat: 'pelayanan',
                    title: 'Layanan Posyandu Balita & Lansia Terpadu Dusun Lapolu',
                    caption: 'Pemeriksaan tensi darah, penimbangan berat badan balita, dan pembagian makanan tambahan bergizi.',
                    img: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                    badge: 'Kesehatan Terpadu',
                    date: 'November 2025'
                },
                {
                    id: 'lapolu_8',
                    cat: 'potensi',
                    title: 'Koperasi Tani Makmur Sejahtera & Pengelolaan BUMDes',
                    caption: 'Unit simpan pinjam dan pengadaan sarana produksi tani cengkeh dan kakao bagi anggota koperasi.',
                    img: 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=800&q=80',
                    badge: 'BUMDes Mandiri',
                    date: 'September 2025'
                }
            ],

            // === 5. DESA TANGGEAWO (Kakao 160 Ha, 46 IKM, Palawija & Jagung) ===
            tanggeawo: [
                {
                    id: 'tanggeawo_1',
                    cat: 'potensi',
                    title: 'Perkebunan Kakao Mandiri 160 Ha Dusun Tanggeawo',
                    caption: 'Kawasan perkebunan kakao monokultur dan tumpang sari yang dikelola secara modern oleh petani.',
                    img: 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=800&q=80',
                    badge: 'Kakao Unggulan',
                    date: 'Agustus 2025'
                },
                {
                    id: 'tanggeawo_2',
                    cat: 'potensi',
                    title: 'Klaster 46 Unit Usaha IKM & Pengolahan Hasil Kebun',
                    caption: 'Geliat usaha mikro pengolahan biji kakao fermentasi dan pakan ternak dari limbah kulit kakao.',
                    img: 'https://images.unsplash.com/photo-1589923188900-85dae523342b?auto=format&fit=crop&w=800&q=80',
                    badge: 'IKM Tanggeawo',
                    date: 'September 2025'
                },
                {
                    id: 'tanggeawo_3',
                    cat: 'pembinaan',
                    title: 'Verifikasi Monografi Desa & Pencatatan NIK BPS',
                    caption: 'Pendataan tertib administrasi kependudukan dan pencatatan kepemilikan lahan produktif terstandar.',
                    img: 'https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pembinaan BPS',
                    date: 'Oktober 2025'
                },
                {
                    id: 'tanggeawo_4',
                    cat: 'potensi',
                    title: 'Hamparan Tanaman Jagung & Palawija Subur',
                    caption: 'Komoditas ketahanan pangan pendukung yang dipanen berkala untuk mencukupi kebutuhan pangan lokal.',
                    img: 'https://images.unsplash.com/photo-1523741543316-beb7fc7023d8?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pangan Desa',
                    date: 'Juli 2025'
                },
                {
                    id: 'tanggeawo_5',
                    cat: 'alam',
                    title: 'Matahari Terbit di Atas Perbukitan Indah Tanggeawo',
                    caption: 'Keindahan panorama fajar pegunungan Tiwu yang menyinari hamparan lembah pertanian Tanggeawo.',
                    img: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pesona Alam',
                    date: 'Juni 2025'
                },
                {
                    id: 'tanggeawo_6',
                    cat: 'pelayanan',
                    title: 'Poskesdes Tanggeawo & Penanganan Stunting Terpadu',
                    caption: 'Layanan konsultasi gizi terpadu dan pemberian paket nutrisi bagi ibu hamil dan baduta (bawah dua tahun).',
                    img: 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=800&q=80',
                    badge: 'Layanan Kesehatan',
                    date: 'November 2025'
                },
                {
                    id: 'tanggeawo_7',
                    cat: 'pelayanan',
                    title: 'Gotong Royong Swadaya Perbaikan Jalan Tani & Irigasi',
                    caption: 'Budaya kebersamaan warga Tanggeawo dalam merawat prasarana aksesibilitas jalan sentra perkebunan.',
                    img: 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?auto=format&fit=crop&w=800&q=80',
                    badge: 'Gotong Royong',
                    date: 'Agustus 2025'
                },
                {
                    id: 'tanggeawo_8',
                    cat: 'potensi',
                    title: 'Fermentasi Biji Kakao Kering Berkualitas Tinggi',
                    caption: 'Kotak-kotak fermentasi kayu bertingkat untuk menghasilkan biji cokelat beraroma khas standar ekspor.',
                    img: 'https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?auto=format&fit=crop&w=800&q=80',
                    badge: 'Mutu Standar',
                    date: 'Oktober 2025'
                }
            ],

            // === 6. DESA MATTIRO BULU (Sentra Nilam Atsiri, Cengkeh Dataran Tinggi) ===
            mattirobulu: [
                {
                    id: 'mattirobulu_1',
                    cat: 'potensi',
                    title: 'Sentra Perkebunan Nilam Dataran Tinggi Mattiro Bulu',
                    caption: 'Hamparan tanaman nilam wangi (Pogostemon cablin) di ketinggian 600 mdpl bersuhu sejuk.',
                    img: 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=800&q=80',
                    badge: 'Perkebunan Nilam',
                    date: 'September 2025'
                },
                {
                    id: 'mattirobulu_2',
                    cat: 'potensi',
                    title: 'Ketel Tradisional Penyulingan Minyak Nilam Murni',
                    caption: 'Fasilitas ketel uap penyulingan minyak atsiri nilam dengan rendemen tinggi dan kemurnian terjaga.',
                    img: 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?auto=format&fit=crop&w=800&q=80',
                    badge: 'Atsiri Bernilai',
                    date: 'Oktober 2025'
                },
                {
                    id: 'mattirobulu_3',
                    cat: 'pembinaan',
                    title: 'Lokakarya Agen Statistik Sektoral BPS Kolut',
                    caption: 'Pelatihan teknis pengumpulan data mikro dan pemutakhiran indikator sosial ekonomi keluarga.',
                    img: 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pembinaan BPS',
                    date: 'Agustus 2025'
                },
                {
                    id: 'mattirobulu_4',
                    cat: 'potensi',
                    title: 'Kebun Hortikultura & Cengkeh Dataran Tinggi',
                    caption: 'Budidaya aneka sayuran segar dataran tinggi dan cengkeh yang memperkaya diversifikasi pangan lokal.',
                    img: 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=800&q=80',
                    badge: 'Hortikultura',
                    date: 'Juli 2025'
                },
                {
                    id: 'mattirobulu_5',
                    cat: 'alam',
                    title: 'Sumber Mata Air Pegunungan & Hutan Adat Asri',
                    caption: 'Kawasan mata air jernih abadi yang dilindungi hukum adat untuk mengalirkan air ke permukiman desa.',
                    img: 'https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?auto=format&fit=crop&w=800&q=80',
                    badge: 'Mata Air Alami',
                    date: 'Mei 2025'
                },
                {
                    id: 'mattirobulu_6',
                    cat: 'pelayanan',
                    title: 'Pelayanan Adminduk Mandiri di Balai Pertemuan',
                    caption: 'Petugas desa melayani pencatatan kelahiran, kematian, serta rekomendasi perizinan usaha kebun.',
                    img: 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
                    badge: 'Layanan Publik',
                    date: 'Oktober 2025'
                },
                {
                    id: 'mattirobulu_7',
                    cat: 'pelayanan',
                    title: 'Posyandu Cempaka & Edukasi Menu PMT Bergizi',
                    caption: 'Penyuluhan gizi berbasis bahan pangan lokal sayuran segar dan pemeriksaan kesehatan ibu hamil.',
                    img: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                    badge: 'Kesehatan Warga',
                    date: 'November 2025'
                },
                {
                    id: 'mattirobulu_8',
                    cat: 'alam',
                    title: 'Kabut Senja di Lembah Hijau Sejuk Mattiro Bulu',
                    caption: 'Pemandangan spektakuler perbukitan berselimut kabut yang mencirikan iklim mikro sejuk pegunungan.',
                    img: 'https://images.unsplash.com/photo-1511497584788-87676104235f?auto=format&fit=crop&w=800&q=80',
                    badge: 'Panorama Alam',
                    date: 'Juni 2025'
                }
            ],

            // === 7. DESA KALU KALUKU (Pesisir Bahari Teluk Bone, Kakao Sambung Pucuk) ===
            kalukaluku: [
                {
                    id: 'kalukaluku_1',
                    cat: 'alam',
                    title: 'Pesisir Pantai Teluk Bone & Dermaga Kalu Kaluku',
                    caption: 'Panorama pantai berpasir bersih dengan perahu nelayan tradisional yang bersandar rapi.',
                    img: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pesona Bahari',
                    date: 'September 2025'
                },
                {
                    id: 'kalukaluku_2',
                    cat: 'potensi',
                    title: 'Armada Perikanan Tangkap & Tangkapan Segar Nelayan',
                    caption: 'Aktivitas bongkar muat hasil tangkapan laut ikan kembung, cakalang, dan teri segar pagi hari.',
                    img: 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80',
                    badge: 'Perikanan Tangkap',
                    date: 'Agustus 2025'
                },
                {
                    id: 'kalukaluku_3',
                    cat: 'pembinaan',
                    title: 'Bimtek Standardisasi Indikator PODES BPS di Kalu Kaluku',
                    caption: 'Sesi pendampingan intensif penginputan statistik potensi desa dan pemutakhiran profil wilayah.',
                    img: 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pembinaan BPS',
                    date: 'Juli 2025'
                },
                {
                    id: 'kalukaluku_4',
                    cat: 'potensi',
                    title: 'Sentra Pengeringan Teri & Ikan Asin Pesisir Tradisional',
                    caption: 'Pengolahan ikan asin bersih tanpa bahan pengawet kimia yang menjadi oleh-oleh khas Kalu Kaluku.',
                    img: 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80',
                    badge: 'Produk Unggulan',
                    date: 'Oktober 2025'
                },
                {
                    id: 'kalukaluku_5',
                    cat: 'potensi',
                    title: 'Kebun Kakao Sambung Pucuk Produktif Kalu Kaluku',
                    caption: 'Optimalisasi lahan perkebunan kakao dengan teknologi sambung pucuk varietas tahan hama.',
                    img: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                    badge: 'Perkebunan Kakao',
                    date: 'Juni 2025'
                },
                {
                    id: 'kalukaluku_6',
                    cat: 'pelayanan',
                    title: 'Layanan Terpadu Satu Pintu di Balai Desa Kalu Kaluku',
                    caption: 'Aparatur desa melayani pengurusan surat kependudukan secara cepat, transparan, dan ramah.',
                    img: 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
                    badge: 'Layanan Desa',
                    date: 'November 2025'
                },
                {
                    id: 'kalukaluku_7',
                    cat: 'pelayanan',
                    title: 'Posyandu Terpadu Kesehatan Ibu dan Balita',
                    caption: 'Pemberian vaksinasi dan pengukuran lingkar kepala balita untuk memastikan bebas stunting.',
                    img: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                    badge: 'Kesehatan Warga',
                    date: 'Oktober 2025'
                },
                {
                    id: 'kalukaluku_8',
                    cat: 'alam',
                    title: 'Siluet Perahu Saat Matahari Terbenam di Teluk Bone',
                    caption: 'Pemandangan magis senja di perairan pesisir Kalu Kaluku saat perahu nelayan mulai berlayar.',
                    img: 'https://images.unsplash.com/photo-1518837695005-2083093ee35b?auto=format&fit=crop&w=800&q=80',
                    badge: 'Panorama Senja',
                    date: 'September 2025'
                }
            ],

            // === 8. DESA AWO (Persawahan Irigasi Teknis, Panen Raya, Kakao) ===
            awo: [
                {
                    id: 'awo_1',
                    cat: 'potensi',
                    title: 'Hamparan Sawah Padi Berkelanjutan & Saluran Irigasi',
                    caption: 'Sistem pengairan teknis bendungan yang mengairi hamparan persawahan subur di Desa Awo.',
                    img: 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=800&q=80',
                    badge: 'Lumbung Pangan',
                    date: 'Agustus 2025'
                },
                {
                    id: 'awo_2',
                    cat: 'potensi',
                    title: 'Panen Raya Padi Organik Kelompok Tani Mandiri Awo',
                    caption: 'Kebahagiaan petani saat panen melimpah dengan hasil gabah kering giling berkualitas prima.',
                    img: 'https://images.unsplash.com/photo-1523741543316-beb7fc7023d8?auto=format&fit=crop&w=800&q=80',
                    badge: 'Panen Raya',
                    date: 'September 2025'
                },
                {
                    id: 'awo_3',
                    cat: 'pembinaan',
                    title: 'Pelatihan Data Statistik Sektoral Pertanian Bersama BPS',
                    caption: 'Bimbingan pencatatan luas panen, estimasi produktivitas per hektar, dan harga gabah tingkat petani.',
                    img: 'https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pembinaan BPS',
                    date: 'Juli 2025'
                },
                {
                    id: 'awo_4',
                    cat: 'potensi',
                    title: 'Perkebunan Kakao Sambung Pucuk Tumpangsari Kelapa',
                    caption: 'Sistem pola tanam tumpang sari yang meningkatkan pendapatan petani dari berbagai komoditas.',
                    img: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                    badge: 'Agroforestri',
                    date: 'Oktober 2025'
                },
                {
                    id: 'awo_5',
                    cat: 'alam',
                    title: 'Bendungan & Aliran Sungai Alami Sumber Irigasi Awo',
                    caption: 'Hulu sungai berarus jernih yang membelah pedesaan Awo dan menjadi tumpuan ketahanan air.',
                    img: 'https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?auto=format&fit=crop&w=800&q=80',
                    badge: 'Sumber Daya Air',
                    date: 'Mei 2025'
                },
                {
                    id: 'awo_6',
                    cat: 'pelayanan',
                    title: 'Pelayanan Publik di Balai Pertemuan Terpadu Desa Awo',
                    caption: 'Sosialisasi program ketahanan pangan, asuransi tani, dan pelayanan surat pengantar warga.',
                    img: 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
                    badge: 'Layanan Desa',
                    date: 'November 2025'
                },
                {
                    id: 'awo_7',
                    cat: 'pelayanan',
                    title: 'Poskesdes Awo & Pemeriksaan Kesehatan Warga Lansia',
                    caption: 'Cek kesehatan gula darah, kolesterol, dan penyuluhan pola hidup sehat bagi para lansia.',
                    img: 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=800&q=80',
                    badge: 'Kesehatan Lansia',
                    date: 'Oktober 2025'
                },
                {
                    id: 'awo_8',
                    cat: 'alam',
                    title: 'Lembah Hijau Asri Berlatar Pegunungan Kolaka Utara',
                    caption: 'Keindahan bentang alam desa yang dikelilingi perbukitan hijau sejuk dan udara yang masih segar.',
                    img: 'https://images.unsplash.com/photo-1472214103451-9374bd1c798e?auto=format&fit=crop&w=800&q=80',
                    badge: 'Panorama Alam',
                    date: 'Juni 2025'
                }
            ],

            // === 9. DESA LAMETUNA (Kelapa, Kopra, Kakao, Pesisir) ===
            lametuna: [
                {
                    id: 'lametuna_1',
                    cat: 'potensi',
                    title: 'Sentra Perkebunan Kelapa & Kakao Rakyat Lametuna',
                    caption: 'Perkebunan kelapa produktif di dataran pesisir Lametuna yang memasok komoditas kopra berkualitas.',
                    img: 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=800&q=80',
                    badge: 'Perkebunan Rakyat',
                    date: 'Agustus 2025'
                },
                {
                    id: 'lametuna_2',
                    cat: 'potensi',
                    title: 'Pengolahan Kopra Putih Standar Mutu Industri',
                    caption: 'Proses pengeringan kelapa dengan ruang oven pemanas untuk menghasilkan kopra putih bernilai jual tinggi.',
                    img: 'https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?auto=format&fit=crop&w=800&q=80',
                    badge: 'Komoditas Unggulan',
                    date: 'September 2025'
                },
                {
                    id: 'lametuna_3',
                    cat: 'pembinaan',
                    title: 'Bimbingan Teknis Agen Statistik Desa BPS Kolut',
                    caption: 'Pembekalan metodologi survei cepat berbasis perangkat mobile dan standarisasi data monografi.',
                    img: 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pembinaan BPS',
                    date: 'Juli 2025'
                },
                {
                    id: 'lametuna_4',
                    cat: 'pelayanan',
                    title: 'Balai Desa Modern Lametuna & Pusat Informasi Digital',
                    caption: 'Kantor desa berkonsep terbuka dengan akses Wi-Fi gratis untuk warga yang membutuhkan informasi publik.',
                    img: 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pelayanan Terbuka',
                    date: 'Oktober 2025'
                },
                {
                    id: 'lametuna_5',
                    cat: 'alam',
                    title: 'Pesisir Teluk Bone & Konservasi Terumbu Karang',
                    caption: 'Perairan pantai berair bening yang menjadi kawasan konservasi biota laut dan wisata bahari.',
                    img: 'https://images.unsplash.com/photo-1505118380757-91f5f5632de0?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pesona Bahari',
                    date: 'Juni 2025'
                },
                {
                    id: 'lametuna_6',
                    cat: 'pelayanan',
                    title: 'Posyandu Mawar & Penimbangan Balita Presisi',
                    caption: 'Pemantauan tumbuh kembang anak usia dini secara digital yang langsung terintegrasi sistem desa.',
                    img: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                    badge: 'Kesehatan Warga',
                    date: 'November 2025'
                },
                {
                    id: 'lametuna_7',
                    cat: 'potensi',
                    title: 'Kelompok Usaha Bersama Pengrajin Anyaman Lidi',
                    caption: 'Pemberdayaan ibu rumah tangga memanfaatkan lidi kelapa menjadi piring, keranjang, dan souvenir.',
                    img: 'https://images.unsplash.com/photo-1589923188900-85dae523342b?auto=format&fit=crop&w=800&q=80',
                    badge: 'Ekonomi Kreatif',
                    date: 'September 2025'
                },
                {
                    id: 'lametuna_8',
                    cat: 'alam',
                    title: 'Suasana Tenang Pagi Hari di Perkebunan Tropis',
                    caption: 'Kicauan burung dan udara sejuk pegunungan mengawali rutinitas aktivitas harian masyarakat tani Lametuna.',
                    img: 'https://images.unsplash.com/photo-1511497584788-87676104235f?auto=format&fit=crop&w=800&q=80',
                    badge: 'Panorama Alam',
                    date: 'Mei 2025'
                }
            ],

            // === 10. DESA SAWANGAOHA (Mangrove, Tambak Bandeng, Kakao) ===
            sawangaoha: [
                {
                    id: 'sawangaoha_1',
                    cat: 'alam',
                    title: 'Suaka Konservasi Mangrove & Ekosistem Pesisir',
                    caption: 'Hutan bakau rimbun seluas puluhan hektar yang berfungsi sebagai benteng abrasi dan habitat kepiting bakau.',
                    img: 'https://images.unsplash.com/photo-1534447677768-be436bb09401?auto=format&fit=crop&w=800&q=80',
                    badge: 'Konservasi Mangrove',
                    date: 'September 2025'
                },
                {
                    id: 'sawangaoha_2',
                    cat: 'potensi',
                    title: 'Kawasan Tambak Budidaya Bandeng & Udang Windu',
                    caption: 'Sentra budidaya tambak payau ramah lingkungan yang memasok kebutuhan pasar ikan Kolaka Utara.',
                    img: 'https://images.unsplash.com/photo-1505118380757-91f5f5632de0?auto=format&fit=crop&w=800&q=80',
                    badge: 'Perikanan Budidaya',
                    date: 'Agustus 2025'
                },
                {
                    id: 'sawangaoha_3',
                    cat: 'pembinaan',
                    title: 'Verifikasi Data Lapangan PODES Bersama BPS',
                    caption: 'Tim gabungan memeriksa indikator fasilitas ekonomi perikanan dan sanitasi lingkungan pemukiman.',
                    img: 'https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?auto=format&fit=crop&w=800&q=80',
                    badge: 'Pembinaan BPS',
                    date: 'Oktober 2025'
                },
                {
                    id: 'sawangaoha_4',
                    cat: 'potensi',
                    title: 'Perkebunan Kakao Terpadu & Pembibitan Swadaya',
                    caption: 'Kelompok tani membudidayakan bibit kakao unggul bersertifikat untuk ditanam di kebun rakyat.',
                    img: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                    badge: 'Perkebunan Kakao',
                    date: 'Juli 2025'
                },
                {
                    id: 'sawangaoha_5',
                    cat: 'pelayanan',
                    title: 'Pelayanan Kantor Desa Terpadu Sawangaoha',
                    caption: 'Ruang pelayanan publik yang nyaman untuk pengurusan surat tanah, izin usaha, dan bantuan bibit.',
                    img: 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
                    badge: 'Layanan Desa',
                    date: 'November 2025'
                },
                {
                    id: 'sawangaoha_6',
                    cat: 'potensi',
                    title: 'Dermaga Muara Perahu & Pendaratan Hasil Tangkapan',
                    caption: 'Tempat berlabuh perahu tambak dan nelayan muara sungai saat membawa ikan bandeng segar.',
                    img: 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80',
                    badge: 'Dermaga Tradisional',
                    date: 'Oktober 2025'
                },
                {
                    id: 'sawangaoha_7',
                    cat: 'pelayanan',
                    title: 'Posyandu Melati Terpadu & Layanan Kesehatan Lansia',
                    caption: 'Pemeriksaan rutin tekanan darah, senam lansia, dan imunisasi berkala bagi balita desa.',
                    img: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                    badge: 'Kesehatan Warga',
                    date: 'Agustus 2025'
                },
                {
                    id: 'sawangaoha_8',
                    cat: 'alam',
                    title: 'Eksotisme Senja di Muara Pesisir Sawangaoha',
                    caption: 'Langit jingga keemasan yang memantul di permukaan air muara saat matahari tenggelam perlahan.',
                    img: 'https://images.unsplash.com/photo-1518837695005-2083093ee35b?auto=format&fit=crop&w=800&q=80',
                    badge: 'Panorama Senja',
                    date: 'Juni 2025'
                }
            ]
        };

        let activeGaleriCategory = 'all';
        let activeGaleriSearchQuery = '';
        let uploadPhotoBase64Data = '';

        // Mengambil foto custom yang diunggah oleh admin dari localStorage
        function getCustomGaleriPhotos(villageKey) {
            const vKey = (villageKey || currentTargetVillage || 'kamisi').toLowerCase().replace(/[^a-z0-9]/g, '');
            try {
                const stored = localStorage.getItem('descan_custom_galeri_' + vKey);
                if (stored) {
                    const parsed = JSON.parse(stored);
                    if (Array.isArray(parsed)) return parsed;
                }
            } catch (e) {
                console.error('Error reading custom galeri photos:', e);
            }
            return [];
        }

        // Menyimpan foto custom admin ke localStorage
        function saveCustomGaleriPhotos(villageKey, photosArray) {
            const vKey = (villageKey || currentTargetVillage || 'kamisi').toLowerCase().replace(/[^a-z0-9]/g, '');
            try {
                localStorage.setItem('descan_custom_galeri_' + vKey, JSON.stringify(photosArray));
            } catch (e) {
                console.error('Error saving custom galeri photos:', e);
            }
        }

        // Menggabungkan foto default per-desa dengan foto yang diunggah admin
        function getCombinedGaleriPhotos(villageKey) {
            const rawKey = villageKey || currentTargetVillage || 'kamisi';
            const vKey = String(rawKey).toLowerCase().replace(/[^a-z0-9]/g, '');
            const customPhotos = getCustomGaleriPhotos(vKey);
            const curated = villageGaleriDatabase[vKey] || villageGaleriDatabase[rawKey] || baseGaleriDatabase;
            return [...customPhotos, ...curated];
        }

        // Update indikator jumlah foto di topbar dan modal
        function updateGaleriCountBadges(totalCount) {
            const count = totalCount !== undefined ? totalCount : getCombinedGaleriPhotos().length;
            const topbarBadge = document.getElementById('topbarGaleriBadge');
            if (topbarBadge) {
                topbarBadge.textContent = count + ' Foto';
            }
            const modalCount = document.getElementById('galeriCountInfo');
            if (modalCount) {
                modalCount.textContent = count + ' Foto Dokumentasi';
            }
        }

        // Render Kartu Galeri Foto Modern & Estetik
        function renderGaleriPhotos(category, searchQuery) {
            const grid = document.getElementById('galeriPhotosGrid');
            if (!grid) return;
            
            if (category !== undefined) activeGaleriCategory = category;
            if (searchQuery !== undefined) activeGaleriSearchQuery = searchQuery.trim().toLowerCase();
            
            const curVillage = currentTargetVillage || 'kamisi';
            const vData = (typeof villagesData !== 'undefined' && villagesData[curVillage]) ? villagesData[curVillage] : { title: 'Desa ' + curVillage, kec: 'Kodeoha' };
            const allPhotos = [...baseGaleriDatabase];
            
            // Filter kategori
            let filtered = activeGaleriCategory === 'all' 
                ? allPhotos 
                : (activeGaleriCategory === 'bahari' || activeGaleriCategory === 'alam'
                    ? allPhotos.filter(p => p.cat === 'bahari' || p.cat === 'alam')
                    : allPhotos.filter(p => p.cat === activeGaleriCategory));
                
            // Filter pencarian
            if (activeGaleriSearchQuery) {
                filtered = filtered.filter(p => 
                    (p.title && p.title.toLowerCase().includes(activeGaleriSearchQuery)) ||
                    (p.caption && p.caption.toLowerCase().includes(activeGaleriSearchQuery)) ||
                    (p.desa && p.desa.toLowerCase().includes(activeGaleriSearchQuery)) ||
                    (p.badge && p.badge.toLowerCase().includes(activeGaleriSearchQuery))
                );
            }

            // Set lightbox list to current filtered items
            currentLightboxList = [...filtered];

            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full py-16 text-center">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 mx-auto flex items-center justify-center text-2xl mb-2">
                            <i class="bi bi-images"></i>
                        </div>
                        <h4 class="font-bold text-slate-800 text-sm">Tidak Ada Foto Ditemukan</h4>
                        <p class="text-xs text-slate-500 mt-1">Coba kata kunci lain atau pilih filter Semua Foto.</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = filtered.map((p, idx) => {
                const desaName = p.desa || vData.title || 'Desa Lapolu';
                return `
                <div class="group bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-2xs hover:shadow-lg transition-all duration-300 flex flex-col cursor-pointer" onclick="viewPhotoByIndex(${idx})">
                    <div class="relative overflow-hidden aspect-video w-full bg-slate-100">
                        <img src="${p.img}" alt="${p.title}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute top-2.5 left-2.5">
                            <span class="px-2.5 py-1 rounded-lg bg-black/65 backdrop-blur-xs text-white text-[10px] font-bold shadow-xs flex items-center gap-1">
                                <i class="bi bi-geo-alt-fill text-emerald-400 text-[9px]"></i>
                                <span>${desaName}</span>
                            </span>
                        </div>
                        <div class="absolute top-2.5 right-2.5">
                            <span class="px-2 py-0.5 rounded-md bg-emerald-600/90 backdrop-blur-xs text-white text-[9.5px] font-black uppercase tracking-wide shadow-xs">
                                ${p.badge}
                            </span>
                        </div>
                    </div>
                    <div class="p-3.5 flex-1 flex flex-col justify-between">
                        <div>
                            <h4 class="font-black text-slate-900 text-xs sm:text-sm group-hover:text-emerald-700 transition leading-snug line-clamp-1">${p.title}</h4>
                            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed line-clamp-2">${p.caption || p.desc}</p>
                        </div>
                        <div class="pt-2.5 mt-2.5 border-t border-slate-100 flex items-center justify-between text-[11px]">
                            <span class="text-slate-400 font-medium">Dokumentasi BPS</span>
                            <button type="button" onclick="event.stopPropagation(); viewPhotoByIndex(${idx})" class="text-emerald-600 hover:text-emerald-700 font-bold hover:underline flex items-center gap-1 cursor-pointer">
                                <i class="bi bi-arrows-fullscreen text-xs"></i>
                                <span>Perbesar</span>
                            </button>
                        </div>
                    </div>
                </div>
                `;
            }).join('');
        }

        function filterGaleriPhotos(category, btn) {
            document.querySelectorAll('.galeri-filter-btn').forEach(el => {
                el.className = 'galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap';
            });
            if (btn) {
                btn.className = 'galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-emerald-600 text-white shadow-xs cursor-pointer whitespace-nowrap';
            }
            renderGaleriPhotos(category);
        }

        function searchGaleriPhotos(keyword) {
            renderGaleriPhotos(undefined, keyword);
        }

        function resetGaleriFilters() {
            activeGaleriCategory = 'all';
            activeGaleriSearchQuery = '';
            const searchInput = document.getElementById('galeriSearchInput');
            if (searchInput) searchInput.value = '';
            const allBtn = document.querySelector('.galeri-filter-btn');
            if (allBtn) filterGaleriPhotos('all', allBtn);
            else renderGaleriPhotos('all', '');
        }

        
        function openDescanGaleriModal() {
            openGaleriDesaModal();
        }
        function closeDescanGaleriModal() {
            closeGaleriDesaModal();
        }
        
        window.openDescanGaleriModal = function() { openGaleriDesaModal(); };
        window.closeDescanGaleriModal = function() { closeGaleriDesaModal(); };
        window.openGaleriDesaModal = openGaleriDesaModal;
        window.closeGaleriDesaModal = closeGaleriDesaModal;

        function openGaleriDesaModal() {
            const modal = document.getElementById('galeriDesaModal');
            if (!modal) return;
            
            const curVillage = currentTargetVillage || 'kamisi';
            const vData = (typeof villagesData !== 'undefined' && villagesData[curVillage]) ? villagesData[curVillage] : { title: 'Desa ' + curVillage, kec: 'Kodeoha' };
            const vTitle = vData.title || 'Desa Kamisi';
            
            const titleEl = document.getElementById('galeriModalTitle');
            if (titleEl) titleEl.textContent = `Galeri Foto Resmi ${vTitle}`;
            const subEl = document.getElementById('galeriModalSub');
            if (subEl) subEl.textContent = `Dokumentasi Terverifikasi Pembinaan Desa Cantik BPS & Potensi Unggulan ${vTitle} (Kec. ${vData.kec || 'Kodeoha'})`;
            
            resetGaleriFilters();
            modal.style.display = 'flex';
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            if (document.body) document.body.classList.add('overflow-hidden');
        }

        function closeGaleriDesaModal() {
            const modal = document.getElementById('galeriDesaModal');
            if (modal) {
                modal.style.display = 'none';
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
            if (document.body) document.body.classList.remove('overflow-hidden');
        }

        // ==============================================================
        // LOGIKA HALAMAN UTAMA GALERI DESA (#view-galeri)
        // ==============================================================
        let activePageGaleriCategory = 'all';
        let activePageGaleriSearchQuery = '';

        function renderPageGaleriPhotos(category, searchQuery) {
            const grid = document.getElementById('pageGaleriPhotosGrid');
            if (!grid) return;
            
            if (category !== undefined) activePageGaleriCategory = category;
            if (searchQuery !== undefined) activePageGaleriSearchQuery = searchQuery.trim().toLowerCase();
            
            const curVillage = currentTargetVillage || 'kamisi';
            const vData = (typeof villagesData !== 'undefined' && villagesData[curVillage]) ? villagesData[curVillage] : { title: 'Desa ' + curVillage, kec: 'Kodeoha' };
            const allPhotos = [...baseGaleriDatabase];
            
            // Update Header Text on Page
            const titleEl = document.getElementById('pageGaleriTitle');
            if (titleEl) titleEl.textContent = `Galeri Dokumentasi & Potensi Desa Cantik`;
            const subEl = document.getElementById('pageGaleriSub');
            if (subEl) subEl.textContent = `Dokumentasi pembinaan BPS, potensi komoditas, dan pelayanan 6 desa binaan di wilayah Kecamatan Kodeoha & Tiwu.`;
            const kecBadge = document.getElementById('pageGaleriKecBadge');
            if (kecBadge) kecBadge.textContent = `Kec. Kodeoha & Tiwu`;

            // Filter kategori
            let filtered = activePageGaleriCategory === 'all' 
                ? allPhotos 
                : (activePageGaleriCategory === 'bahari' || activePageGaleriCategory === 'alam'
                    ? allPhotos.filter(p => p.cat === 'bahari' || p.cat === 'alam')
                    : allPhotos.filter(p => p.cat === activePageGaleriCategory));
                
            // Filter pencarian
            if (activePageGaleriSearchQuery) {
                filtered = filtered.filter(p => 
                    (p.title && p.title.toLowerCase().includes(activePageGaleriSearchQuery)) ||
                    (p.caption && p.caption.toLowerCase().includes(activePageGaleriSearchQuery)) ||
                    (p.desa && p.desa.toLowerCase().includes(activePageGaleriSearchQuery)) ||
                    (p.badge && p.badge.toLowerCase().includes(activePageGaleriSearchQuery))
                );
            }

            // Set lightbox list to current filtered items
            currentLightboxList = [...filtered];

            const countEl = document.getElementById('pageGaleriCount');
            if (countEl) countEl.textContent = `${filtered.length} Foto Dokumentasi`;

            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full py-16 px-6 text-center bg-white rounded-3xl border border-dashed border-slate-300">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-emerald-600 mx-auto flex items-center justify-center text-3xl mb-3 border border-emerald-100">
                            <i class="bi bi-images"></i>
                        </div>
                        <h4 class="font-extrabold text-slate-900 text-base">Belum Ada Dokumentasi Sesuai Kriteria</h4>
                        <p class="text-xs text-slate-500 max-w-md mx-auto mt-1">Tidak ditemukan foto dengan kata kunci atau kategori ini. Anda dapat memilih filter Semua Foto.</p>
                        <div class="mt-4 flex items-center justify-center gap-2">
                            <button type="button" onclick="resetPageGaleriFilters()" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition cursor-pointer">
                                Reset Filter
                            </button>
                        </div>
                    </div>
                `;
                return;
            }

            grid.innerHTML = filtered.map((p, idx) => {
                const desaName = p.desa || vData.title || 'Desa Lapolu';
                return `
                <div class="group bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-2xs hover:shadow-lg transition-all duration-300 flex flex-col cursor-pointer" onclick="viewPhotoByIndex(${idx})">
                    <div class="relative overflow-hidden aspect-video w-full bg-slate-100">
                        <img src="${p.img}" alt="${p.title}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute top-2.5 left-2.5">
                            <span class="px-2.5 py-1 rounded-lg bg-black/65 backdrop-blur-xs text-white text-[10px] font-bold shadow-xs flex items-center gap-1">
                                <i class="bi bi-geo-alt-fill text-emerald-400 text-[9px]"></i>
                                <span>${desaName}</span>
                            </span>
                        </div>
                        <div class="absolute top-2.5 right-2.5">
                            <span class="px-2 py-0.5 rounded-md bg-emerald-600/90 backdrop-blur-xs text-white text-[9.5px] font-black uppercase tracking-wide shadow-xs">
                                ${p.badge}
                            </span>
                        </div>
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <h4 class="font-black text-slate-900 text-xs sm:text-sm group-hover:text-emerald-700 transition leading-snug line-clamp-1">${p.title}</h4>
                            <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed line-clamp-2">${p.caption || p.desc}</p>
                        </div>
                        <div class="pt-3 mt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                            <span class="text-slate-400 text-[11px] font-medium">Dokumentasi BPS</span>
                            <button type="button" onclick="event.stopPropagation(); viewPhotoByIndex(${idx})" class="text-emerald-600 hover:text-emerald-700 font-bold hover:underline flex items-center gap-1 cursor-pointer">
                                <i class="bi bi-arrows-fullscreen text-xs"></i>
                                <span>Perbesar</span>
                            </button>
                        </div>
                    </div>
                </div>
                `;
            }).join('');
        }

        function filterPageGaleriPhotos(category, btn) {
            document.querySelectorAll('.page-galeri-filter-btn').forEach(el => {
                el.className = 'page-galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap';
            });
            if (btn) {
                btn.className = 'page-galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-emerald-600 text-white shadow-xs cursor-pointer whitespace-nowrap';
            }
            renderPageGaleriPhotos(category);
        }

        function searchPageGaleriPhotos(keyword) {
            renderPageGaleriPhotos(undefined, keyword);
        }

        function resetPageGaleriFilters() {
            activePageGaleriCategory = 'all';
            activePageGaleriSearchQuery = '';
            const searchInput = document.getElementById('pageGaleriSearchInput');
            if (searchInput) searchInput.value = '';
            const allBtn = document.querySelector('.page-galeri-filter-btn');
            if (allBtn) filterPageGaleriPhotos('all', allBtn);
            else renderPageGaleriPhotos('all', '');
        }

        // ==============================================================
        // FITUR TAMBAH / UNGGAH FOTO BARU OLEH ADMIN DESA
        // ==============================================================
        function openUploadFotoModal() {
            const modal = document.getElementById('modalUploadFotoDesa');
            if (!modal) return;

            const curVillage = currentTargetVillage || 'kamisi';
            const vData = villagesData[curVillage] || villagesData.kamisi || {};
            const vTitle = vData.title || 'Desa Kamisi';

            const villageBadge = document.getElementById('uploadModalVillageName');
            if (villageBadge) villageBadge.textContent = vTitle;

            // Reset form input
            const form = document.getElementById('formUploadFotoDesa');
            if (form) form.reset();
            
            uploadPhotoBase64Data = '';
            const previewBox = document.getElementById('uploadPhotoPreviewBox');
            if (previewBox) {
                previewBox.classList.add('hidden');
                previewBox.classList.remove('flex');
            }
            const previewImg = document.getElementById('uploadPhotoPreviewImg');
            if (previewImg) previewImg.src = '';

            // Set default date hari ini
            const dateInput = document.getElementById('inputUploadDate');
            if (dateInput) {
                const today = new Date().toISOString().split('T')[0];
                dateInput.value = today;
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeUploadFotoModal() {
            const modal = document.getElementById('modalUploadFotoDesa');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        }

        function handlePhotoFileSelect(event) {
            const file = event.target.files && event.target.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                showToast('⚠️ Silakan pilih file gambar (JPG, PNG, WebP)!');
                event.target.value = '';
                return;
            }

            // Batas ukuran 5MB untuk file lokal
            if (file.size > 5 * 1024 * 1024) {
                showToast('⚠️ Ukuran gambar maksimal 5MB!');
                event.target.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                uploadPhotoBase64Data = e.target.result;
                displayUploadPreview(uploadPhotoBase64Data, file.name + ' (' + Math.round(file.size / 1024) + ' KB)');
                // Kosongkan URL jika file dipilih
                const urlInput = document.getElementById('inputUploadUrl');
                if (urlInput) urlInput.value = '';
            };
            reader.readAsDataURL(file);
        }

        function handlePhotoUrlInput(url) {
            const trimmed = (url || '').trim();
            if (trimmed) {
                uploadPhotoBase64Data = trimmed;
                displayUploadPreview(trimmed, 'Gambar dari URL Web');
                // Kosongkan file jika URL diketik
                const fileInput = document.getElementById('inputUploadFile');
                if (fileInput) fileInput.value = '';
            }
        }

        function displayUploadPreview(imgSrc, infoText) {
            const previewBox = document.getElementById('uploadPhotoPreviewBox');
            const previewImg = document.getElementById('uploadPhotoPreviewImg');
            const previewInfo = document.getElementById('uploadPhotoPreviewInfo');

            if (previewImg && previewBox) {
                previewImg.src = imgSrc;
                if (previewInfo) previewInfo.textContent = infoText || 'Pratinjau Foto';
                previewBox.classList.remove('hidden');
                previewBox.classList.add('flex');
            }
        }

        function removeUploadPreview() {
            uploadPhotoBase64Data = '';
            const previewBox = document.getElementById('uploadPhotoPreviewBox');
            if (previewBox) {
                previewBox.classList.add('hidden');
                previewBox.classList.remove('flex');
            }
            const previewImg = document.getElementById('uploadPhotoPreviewImg');
            if (previewImg) previewImg.src = '';
            const fileInput = document.getElementById('inputUploadFile');
            if (fileInput) fileInput.value = '';
            const urlInput = document.getElementById('inputUploadUrl');
            if (urlInput) urlInput.value = '';
        }

        function saveNewGaleriFoto(e) {
            if (e) e.preventDefault();

            const titleInput = document.getElementById('inputUploadTitle');
            const catSelect = document.getElementById('inputUploadCat');
            const dateInput = document.getElementById('inputUploadDate');
            const captionInput = document.getElementById('inputUploadCaption');

            const title = titleInput ? titleInput.value.trim() : '';
            const cat = catSelect ? catSelect.value : 'pembinaan';
            const rawDate = dateInput ? dateInput.value : '';
            const caption = captionInput ? captionInput.value.trim() : '';

            if (!title) {
                showToast('⚠️ Harap isi judul foto dokumentasi!');
                if (titleInput) titleInput.focus();
                return;
            }

            if (!uploadPhotoBase64Data) {
                showToast('⚠️ Silakan pilih berkas foto atau masukkan tautan URL gambar!');
                return;
            }

            // Format tanggal Indonesia e.g. "20 November 2026"
            let formattedDate = 'November 2026';
            if (rawDate) {
                try {
                    const d = new Date(rawDate);
                    const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    formattedDate = `${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`;
                } catch(err) {
                    formattedDate = rawDate;
                }
            }

            const curVillage = currentTargetVillage || 'kamisi';
            const newPhotoItem = {
                id: 'custom_' + Date.now() + '_' + Math.random().toString(36).substring(2, 6),
                cat: cat,
                title: title,
                caption: caption || 'Dokumentasi kegiatan dan pembinaan statistik desa terpadu.',
                img: uploadPhotoBase64Data,
                badge: 'Unggahan Admin',
                date: formattedDate,
                village: curVillage,
                isCustom: true,
                createdAt: new Date().toISOString()
            };

            const existingPhotos = getCustomGaleriPhotos(curVillage);
            existingPhotos.unshift(newPhotoItem); // Tambahkan di urutan paling awal
            saveCustomGaleriPhotos(curVillage, existingPhotos);

            showToast('✅ Foto dokumentasi berhasil disimpan dan diterbitkan!');
            closeUploadFotoModal();

            // Refresh galeri view
            renderGaleriPhotos('all', '');
        }

        function deleteCustomFoto(photoId, event) {
            if (event) event.stopPropagation();
            if (!confirm('Apakah Anda yakin ingin menghapus foto dokumentasi ini dari galeri desa?')) {
                return;
            }

            const curVillage = currentTargetVillage || 'kamisi';
            let existingPhotos = getCustomGaleriPhotos(curVillage);
            existingPhotos = existingPhotos.filter(p => p.id !== photoId);
            saveCustomGaleriPhotos(curVillage, existingPhotos);

            showToast('🗑️ Foto dokumentasi berhasil dihapus.');
            renderGaleriPhotos();
        }

        // ==============================================================
        // LIGHTBOX VIEWER FOTO LENGKAP DENGAN NAVIGASI (NEXT / PREV)
        // ==============================================================
        let currentLightboxIndex = 0;
        let currentLightboxList = [];

        function viewPhotoByIndex(index) {
            if (!currentLightboxList || currentLightboxList.length === 0) return;
            if (index < 0) index = currentLightboxList.length - 1;
            if (index >= currentLightboxList.length) index = 0;
            currentLightboxIndex = index;

            const p = currentLightboxList[currentLightboxIndex];
            if (!p) return;

            const lightbox = document.getElementById('galeriLightboxModal');
            if (!lightbox) {
                window.open(p.img, '_blank');
                return;
            }

            const imgEl = document.getElementById('lightboxImg');
            const titleEl = document.getElementById('lightboxTitle');
            const capEl = document.getElementById('lightboxCaption');
            const badgeEl = document.getElementById('lightboxBadge');
            const dateEl = document.getElementById('lightboxDate');
            const counterEl = document.getElementById('lightboxCounter');
            const downloadBtn = document.getElementById('lightboxDownloadBtn');

            if (imgEl) imgEl.src = p.img;
            if (titleEl) titleEl.textContent = p.title || 'Dokumentasi Desa';
            if (capEl) capEl.textContent = p.caption || '';
            if (badgeEl) badgeEl.textContent = p.badge || (p.isCustom ? 'Unggahan Admin' : 'Dokumentasi Resmi BPS');
            if (dateEl) dateEl.textContent = p.date || '2025/2026';
            if (counterEl) counterEl.textContent = `${currentLightboxIndex + 1} / ${currentLightboxList.length}`;

            if (downloadBtn) {
                downloadBtn.onclick = function() {
                    downloadPhotoFile(p.img, p.title);
                };
            }

            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            if (document.body) document.body.classList.add('overflow-hidden');
        }

        function nextLightboxPhoto() {
            viewPhotoByIndex(currentLightboxIndex + 1);
        }

        function prevLightboxPhoto() {
            viewPhotoByIndex(currentLightboxIndex - 1);
        }

        function viewPhotoFull(imgUrl, title, caption, badge, date, photoIndex) {
            if (typeof photoIndex === 'number' && currentLightboxList && currentLightboxList[photoIndex]) {
                viewPhotoByIndex(photoIndex);
                return;
            }
            if (currentLightboxList && currentLightboxList.length > 0) {
                const foundIdx = currentLightboxList.findIndex(p => p.img === imgUrl || p.title === title);
                if (foundIdx !== -1) {
                    viewPhotoByIndex(foundIdx);
                    return;
                }
            }
            // Fallback single view
            currentLightboxList = [{ img: imgUrl, title: title, caption: caption, badge: badge, date: date }];
            viewPhotoByIndex(0);
        }

        function closeGaleriLightbox() {
            const lightbox = document.getElementById('galeriLightboxModal');
            if (lightbox) {
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
            }
            if (document.body) document.body.classList.remove('overflow-hidden');
        }

        // Listener Keyboard untuk Navigasi Lightbox (Esc, Panah Kiri, Panah Kanan)
        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('galeriLightboxModal');
            if (lightbox && !lightbox.classList.contains('hidden')) {
                if (e.key === 'Escape') closeGaleriLightbox();
                else if (e.key === 'ArrowRight') nextLightboxPhoto();
                else if (e.key === 'ArrowLeft') prevLightboxPhoto();
            }
        });

        function downloadPhotoFile(imgUrl, title) {
            try {
                const a = document.createElement('a');
                a.href = imgUrl;
                a.download = (title || 'Dokumentasi_Desa').replace(/[^a-zA-Z0-9_-]/g, '_') + '.jpg';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                showToast('📥 Mengunduh foto dokumentasi...');
            } catch(e) {
                window.open(imgUrl, '_blank');
            }
        }

function triggerPubDownload() {
            const curVillage = currentTargetVillage || 'kalukaluku';
            const vTitle = villagesData[curVillage]?.title || 'Desa Kalu Kaluku';
            let docName = 'Monografi_' + vTitle.replace(/\s+/g, '_') + '_2026.pdf';
            if (activePubDocType === 'brs') docName = 'BRS_Sektoral_Kolut_Triwulan_II_2026.pdf';
            if (activePubDocType === 'potensi') docName = 'Katalog_Potensi_Kakao_UMKM_' + vTitle.replace(/\s+/g, '_') + '.pdf';
            
            showToast('📥 Mengunduh ' + docName + '...');
            setTimeout(() => {
                showToast('✅ Berkas ' + docName + ' berhasil diunduh!');
                closePublikasiDocModal();
            }, 1200);
        }

        // ==============================================================
        // LMS EXAM ENGINE: PRE-TEST & POST-TEST (SOAL INTERAKTIF & SKOR)
        // ==============================================================
        const pretestQuestionsData = [
            {
                id: 1,
                topic: "Program Desa Cantik",
                q: "Apa tujuan utama diselenggarakannya program Pembinaan Desa Cinta Statistik (Desa Cantik) oleh Badan Pusat Statistik (BPS)?",
                options: [
                    "Menggantikan seluruh tugas pencatatan monografi desa secara manual",
                    "Meningkatkan literasi, kapasitas, dan kemandirian aparatur desa dalam mengelola data statistik sektoral",
                    "Menghitung anggaran belanja desa secara otomatis untuk pelaporan pajak",
                    "Menyalurkan bantuan dana sosial langsung tunai kepada seluruh warga desa"
                ],
                answer: 1
            },
            {
                id: 2,
                topic: "Prinsip Satu Data Indonesia",
                q: "Berdasarkan Perpres No. 39 Tahun 2019 tentang Satu Data Indonesia (SDI), berapa jumlah prinsip dasar Satu Data Indonesia yang wajib dipenuhi oleh produsen data?",
                options: [
                    "2 Prinsip (Standar Data dan Format Terbuka)",
                    "3 Prinsip (Kecepatan, Akurasi, dan Efisiensi)",
                    "4 Prinsip (Standar Data, Metadata, Interoperabilitas, dan Kode Referensi/Data Induk)",
                    "6 Prinsip (Kerahasiaan, Keamanan, Kelengkapan, Legalitas, Audit, dan Kinerja)"
                ],
                answer: 2
            },
            {
                id: 3,
                topic: "Metadata Statistik",
                q: "Informasi terstruktur yang menjelaskan, menggambarkan, dan mempermudah pencarian, penggunaan, serta pengelolaan suatu data statistik disebut...",
                options: [
                    "Interoperabilitas Data",
                    "Metadata Statistik",
                    "Diseminasi Data Sektoral",
                    "Tabulasi Frekuensi"
                ],
                answer: 1
            },
            {
                id: 4,
                topic: "Agen Statistik Desa",
                q: "Dalam ekosistem Desa Cantik, apa tugas dan tanggung jawab utama seorang Agen Statistik Desa yang ditunjuk oleh Pemerintah Desa?",
                options: [
                    "Mengaudit seluruh pembukuan anggaran keuangan kantor desa setiap akhir bulan",
                    "Mengumpulkan, memvalidasi, dan mengolah data statistik sektoral desa terstandar BPS",
                    "Mengelola akun media sosial promosi wisata desa",
                    "Melakukan penarikan retribusi pasar dan izin usaha desa"
                ],
                answer: 1
            },
            {
                id: 5,
                topic: "Pendataan Potensi Desa (PODES)",
                q: "Sensus/Pendataan Potensi Desa (PODES) yang dilaksanakan oleh BPS secara berkala menghasilkan data komprehensif mengenai...",
                options: [
                    "Ketersediaan sarana prasarana, infrastruktur fisik, sosial ekonomi, dan potensi kerawanan wilayah desa",
                    "Daftar riwayat hidup seluruh warga desa secara mendalam",
                    "Hasil panen harian seluruh rumah tangga petani",
                    "Mutasi saldo rekening perbankan masyarakat desa"
                ],
                answer: 0
            },
            {
                id: 6,
                topic: "Interoperabilitas Data",
                q: "Kemampuan sistem data untuk dapat dibagipakaikan dan dipertukarkan secara mulus antar sistem elektronik pemerintah dinamakan...",
                options: [
                    "Kode Referensi Wilayah",
                    "Interoperabilitas Data",
                    "Validitas Spasial",
                    "Klasifikasi Baku Lapangan Usaha"
                ],
                answer: 1
            },
            {
                id: 7,
                topic: "Demografi & Monografi",
                q: "Indikator demografi yang mengukur perbandingan antara jumlah penduduk laki-laki dengan jumlah penduduk perempuan dikalikan 100 dinamakan...",
                options: [
                    "Rasio Beban Tanggungan (Dependency Ratio)",
                    "Rasio Jenis Kelamin (Sex Ratio)",
                    "Angka Partisipasi Murni (APM)",
                    "Angka Kelahiran Kasar (CBR)"
                ],
                answer: 1
            },
            {
                id: 8,
                topic: "Pemanfaatan Data",
                q: "Mengapa pemutakhiran data monografi dan potensi desa sangat krusial dalam musyawarah perencanaan pembangunan desa (Musrenbangdes)?",
                options: [
                    "Agar berkas administrasi desa terlihat tebal saat pemeriksaan inspektorat",
                    "Memastikan perencanaan program dan alokasi dana desa berbasis bukti (evidence-based planning) yang tepat sasaran",
                    "Menghindari teguran lisan dari pihak kecamatan semata",
                    "Memenuhi syarat formal kunjungan kerja dinas terkait"
                ],
                answer: 1
            },
            {
                id: 9,
                topic: "Kesejahteraan Sosial (P3KE)",
                q: "Dalam data Pensasaran Percepatan Penghapusan Kemiskinan Ekstrem (P3KE), kelompok rumah tangga yang berada pada Desil 1 menggambarkan...",
                options: [
                    "Kelompok rumah tangga dengan tingkat kesejahteraan tertinggi (paling mampu)",
                    "Kelompok rumah tangga dengan tingkat kesejahteraan terendah (10% termiskin prioritas intervensi)",
                    "Kelompok keluarga pengusaha agribisnis beromzet di atas 100 juta rupiah",
                    "Kelompok aparatur sipil negara dan perangkat desa"
                ],
                answer: 1
            },
            {
                id: 10,
                topic: "Publikasi Statistik Desa",
                q: "Buku publikasi resmi yang memuat profil demografi, kondisi geografis, potensi ekonomi, dan infrastruktur desa berstandar SDI disebut...",
                options: [
                    "Dokumen Peraturan Desa (Perdes)",
                    "Lembar Monografi Resmi & Publikasi Statistik Sektoral Desa",
                    "Surat Pertanggungjawaban (SPJ) Dana Desa",
                    "Formulir SPT Pajak Bumi dan Bangunan"
                ],
                answer: 1
            }
        ];

        const posttestQuestionsData = [
            {
                id: 1,
                topic: "Prinsip Satu Data Indonesia",
                q: "Manakah di bawah ini yang merupakan 4 prinsip utama Satu Data Indonesia (SDI) sesuai Perpres 39/2019?",
                options: [
                    "Standar Data, Metadata Statistik, Interoperabilitas, dan Kode Referensi/Data Induk",
                    "Kecepatan, Kemudahan, Akses Terbuka, dan Transparansi Anggaran",
                    "Format Excel, Database MySQL, Penyimpanan Cloud, dan Backup Harddisk",
                    "Sensus Penduduk, Survei Pertanian, Registrasi Sosial, dan Pajak Daerah"
                ],
                answer: 0
            },
            {
                id: 2,
                topic: "Rasio Ketergantungan",
                q: "Rumus perhitungan Rasio Beban Tanggungan (Dependency Ratio) yang benar adalah...",
                options: [
                    "(Penduduk Usia 15-64 / Total Penduduk) × 100",
                    "((Penduduk Usia 0-14 + Penduduk Usia 65+) / Penduduk Usia 15-64) × 100",
                    "(Jumlah Penduduk Miskin / Total Penduduk Desa) × 100",
                    "(Jumlah Penduduk Laki-laki / Penduduk Perempuan) × 100"
                ],
                answer: 1
            },
            {
                id: 3,
                topic: "Rasio Jenis Kelamin",
                q: "Jika di Desa Lapolu terdapat 634 jiwa laki-laki dan 630 jiwa perempuan, berapakah Rasio Jenis Kelamin (Sex Ratio) desa tersebut?",
                options: [
                    "95,0",
                    "98,2",
                    "100,6",
                    "105,4"
                ],
                answer: 2
            },
            {
                id: 4,
                topic: "Kode Referensi Wilayah",
                q: "Kode wilayah BPS Kolaka Utara diawali dengan angka...",
                options: [
                    "71.02",
                    "73.12",
                    "74.08",
                    "76.01"
                ],
                answer: 2
            },
            {
                id: 5,
                topic: "Satuan Lingkungan Setempat (SLS)",
                q: "Tingkatan Satuan Lingkungan Setempat (SLS) terkecil di bawah desa dalam sistem pembinaan statistik adalah...",
                options: [
                    "Kecamatan",
                    "Dusun / Rukun Tetangga (RT)",
                    "Kabupaten",
                    "Wilayah Adat"
                ],
                answer: 1
            },
            {
                id: 6,
                topic: "Metadata Kegiatan",
                q: "Informasi mengenai penanggung jawab, tujuan pengumpulan data, metodologi, dan frekuensi kegiatan statistik disebut...",
                options: [
                    "Metadata Variabel",
                    "Metadata Kegiatan",
                    "Metadata Indikator",
                    "Metadata Spasial"
                ],
                answer: 1
            },
            {
                id: 7,
                topic: "Verifikasi P3KE & Bansos",
                q: "Keluarga yang tergolong dalam Desil 1 sampai Desil 2 pada data P3KE merupakan prioritas utama penerima...",
                options: [
                    "Bantuan Sosial Program Keluarga Harapan (PKH) & Bantuan Pangan Non-Tunai (BPNT)",
                    "Izin Usaha Pertambangan Skala Besar",
                    "Bantuan Kredit Usaha di atas 500 juta rupiah",
                    "Tunjangan Kinerja Pegawai Negeri"
                ],
                answer: 0
            },
            {
                id: 8,
                topic: "Analisis Sektor Unggulan PODES",
                q: "Dalam pendataan PODES, komoditas unggulan desa diklasifikasikan berdasarkan...",
                options: [
                    "Jumlah warga yang menyukai komoditas tersebut",
                    "Luas panen, volume produksi tahunan, dan nilai tambah ekonomi bagi masyarakat desa",
                    "Warna kemasan produk yang dijual di pasar desa",
                    "Usia pohon tanaman tertua di perkebunan desa"
                ],
                answer: 1
            },
            {
                id: 9,
                topic: "Format Interoperabilitas",
                q: "Format berkas tabel terbuka yang memenuhi standar interoperabilitas SDI dan mudah diolah aplikasi statistik adalah...",
                options: [
                    ".EXE (Executable)",
                    ".CSV (Comma Separated Values) dan .XLSX",
                    ".PSD (Photoshop)",
                    ".MP4 (Video)"
                ],
                answer: 1
            },
            {
                id: 10,
                topic: "Validasi Anomali Data",
                q: "Jika terdapat Nomor Kartu Keluarga (NKK) yang tidak memiliki anggota keluarga berusia di atas 17 tahun, apa tindakan Agen Statistik?",
                options: [
                    "Langsung menghapus baris data tersebut tanpa konfirmasi",
                    "Melakukan verifikasi faktual lapangan (ground checking) ke kepala dusun/RT terkait",
                    "Mengubah tanggal lahir anggota keluarga secara acak",
                    "Membiarkan data apa adanya karena bukan urusan statistik"
                ],
                answer: 1
            },
            {
                id: 11,
                topic: "Visualisasi Data Monografi",
                q: "Grafik yang paling tepat untuk menggambarkan komposisi penduduk menurut kelompok umur dan jenis kelamin secara simultan adalah...",
                options: [
                    "Piramida Penduduk (Population Pyramid)",
                    "Grafik Garis Tren Waktu Tunggal",
                    "Diagram Peta Panas (Heatmap)",
                    "Diagram Venn Sederhana"
                ],
                answer: 0
            },
            {
                id: 12,
                topic: "Fungsi Pembina Data",
                q: "Lembaga pemerintah yang bertindak sebagai Pembina Data Statistik di tingkat Kabupaten Kolaka Utara adalah...",
                options: [
                    "Dinas Pariwisata",
                    "Badan Pusat Statistik (BPS) Kabupaten Kolaka Utara",
                    "Kantor Urusan Agama",
                    "Pengadilan Negeri"
                ],
                answer: 1
            },
            {
                id: 13,
                topic: "Diseminasi Data Desa",
                q: "Bagaimana cara terbaik mendiseminasikan data statistik desa agar dapat diakses terbuka oleh warga masyarakat dan pemangku kepentingan?",
                options: [
                    "Menyimpan dokumen cetak di laci kantor desa yang terkunci rapat",
                    "Mempublikasikan melalui website / portal data desa, papan info statistik, dan WebGIS tematik",
                    "Mengirimkan fotokopi satu per satu ke setiap rumah warga",
                    "Hanya memperlihatkan data saat ada kunjungan bupati"
                ],
                answer: 1
            },
            {
                id: 14,
                topic: "Standarisasi 44 Variabel",
                q: "Berapa jumlah variabel makro inti yang menjadi standar baku evaluasi Desa Cantik BPS Kolaka Utara?",
                options: [
                    "10 Variabel",
                    "24 Variabel",
                    "44 Variabel",
                    "100 Variabel"
                ],
                answer: 2
            },
            {
                id: 15,
                topic: "Kemandirian Agen Statistik",
                q: "Apa indikator utama yang menunjukkan bahwa sebuah desa binaan telah mencapai predikat Desa Cantik Mandiri?",
                options: [
                    "Aparatur desa mampu memutakhirkan monografi, mengolah indikator sektoral, dan menyusun publikasi mandiri secara rutin",
                    "Kantor desa memiliki gedung mewah tiga lantai",
                    "Seluruh warga desa memiliki akun media sosial resmi",
                    "Desa tidak lagi membutuhkan koordinasi dengan pemerintah kecamatan"
                ],
                answer: 0
            }
        ];

        // State Ujian
        let currentExamMode = 'pretest'; // 'pretest' atau 'posttest'
        let currentExamIndex = 0;
        let examUserAnswers = {}; // { 0: optionIndex, 1: optionIndex, ... }
        let examTimerSeconds = 900; // 15 menit default
        let examTimerInterval = null;

        function openPretestModal() {
            startExam('pretest');
        }

        function closePretestModal() {
            if (examTimerInterval) clearInterval(examTimerInterval);
            const m = document.getElementById('pretestModal');
            if (m) {
                m.classList.add('hidden');
                m.classList.remove('flex');
            }
            if (typeof document !== 'undefined' && document.body) {
                document.body.classList.remove('overflow-hidden');
            }
        }

        function openPosttestModal() {
            startExam('posttest');
        }

        function closePosttestModal() {
            closePretestModal();
        }

        function confirmCloseExamModal() {
            const answeredCount = Object.keys(examUserAnswers).length;
            if (answeredCount > 0) {
                if (confirm(`Anda telah menjawab ${answeredCount} soal. Yakin ingin menutup lembar ujian? Progres pengerjaan saat ini tidak akan disimpan.`)) {
                    closePretestModal();
                }
            } else {
                closePretestModal();
            }
        }

        function startExam(mode) {
            currentExamMode = mode;
            currentExamIndex = 0;
            examUserAnswers = {};
            
            const isPre = (mode === 'pretest');
            const totalQ = isPre ? pretestQuestionsData.length : posttestQuestionsData.length;
            examTimerSeconds = isPre ? 15 * 60 : 20 * 60; // 15 menit atau 20 menit

            // Set Header Texts & Icons
            const hIcon = document.getElementById('examHeaderIcon');
            const hTitle = document.getElementById('examHeaderTitle');
            if (hIcon) hIcon.textContent = isPre ? '📝' : '🎓';
            if (hTitle) hTitle.textContent = isPre 
                ? '[1. PRE-TEST] Uji Kemampuan Awal Aparatur' 
                : '[3. POST-TEST EVALUASI] Kuis Evaluasi Akhir & Sertifikasi';

            // Reset Views
            const qView = document.getElementById('examQuestionView');
            const rView = document.getElementById('examResultView');
            if (qView) qView.classList.remove('hidden');
            if (rView) rView.classList.add('hidden');

            // Render Number Pills
            renderExamNumberPills();

            // Render First Question
            renderExamCurrentQuestion();

            // Start Timer
            if (examTimerInterval) clearInterval(examTimerInterval);
            updateExamTimerDisplay();
            examTimerInterval = setInterval(() => {
                examTimerSeconds--;
                if (examTimerSeconds <= 0) {
                    clearInterval(examTimerInterval);
                    examTimerSeconds = 0;
                    updateExamTimerDisplay();
                    alert('⏱️ Waktu pengerjaan ujian telah habis! Jawaban Anda akan otomatis dikirim.');
                    submitExam();
                } else {
                    updateExamTimerDisplay();
                }
            }, 1000);

            // Open Modal Screen
            const m = document.getElementById('pretestModal');
            if (m) {
                m.classList.remove('hidden');
                m.classList.add('flex');
            }
            if (typeof document !== 'undefined' && document.body) {
                document.body.classList.add('overflow-hidden');
            }

            showToast(isPre ? '📝 Lembar Pre-Test Mandiri dibuka (10 Soal • 15 Menit)' : '🎓 Lembar Post-Test Kelulusan dibuka (15 Soal • 20 Menit)', '⏱️');
        }

        function updateExamTimerDisplay() {
            const el = document.getElementById('examTimerText');
            if (!el) return;
            const m = Math.floor(examTimerSeconds / 60);
            const s = examTimerSeconds % 60;
            const strM = m < 10 ? '0' + m : m;
            const strS = s < 10 ? '0' + s : s;
            el.textContent = `Sisa Waktu: ${strM}:${strS}`;
        }

        function getActiveQuestions() {
            return (currentExamMode === 'pretest') ? pretestQuestionsData : posttestQuestionsData;
        }

        function renderExamNumberPills() {
            const container = document.getElementById('examNumberPills');
            if (!container) return;
            const questions = getActiveQuestions();

            container.innerHTML = questions.map((q, idx) => {
                const isCurrent = (idx === currentExamIndex);
                const isAnswered = (examUserAnswers[idx] !== undefined);
                let style = 'w-7 h-7 sm:w-8 sm:h-8 rounded-xl text-xs font-bold transition flex items-center justify-center cursor-pointer ';
                if (isCurrent) {
                    style += 'bg-[#005ea6] text-white shadow-md ring-2 ring-blue-300 scale-105';
                } else if (isAnswered) {
                    style += 'bg-emerald-100 text-emerald-900 border border-emerald-300 font-extrabold';
                } else {
                    style += 'bg-slate-100 text-slate-600 hover:bg-slate-200 border border-slate-200';
                }
                return `<button type="button" onclick="jumpToExamQuestion(${idx})" class="${style}" title="Buka Soal No. ${idx + 1}">${idx + 1}</button>`;
            }).join('');
        }

        function renderExamCurrentQuestion() {
            const questions = getActiveQuestions();
            const total = questions.length;
            const q = questions[currentExamIndex];
            if (!q) return;

            // Header progress
            const pText = document.getElementById('examProgressText');
            if (pText) pText.textContent = `Soal ${currentExamIndex + 1} dari ${total}`;

            // Progress bar
            const pct = Math.round(((currentExamIndex + 1) / total) * 100);
            const pBar = document.getElementById('examProgressBar');
            const pLbl = document.getElementById('examPercentLabel');
            if (pBar) pBar.style.width = pct + '%';
            if (pLbl) pLbl.textContent = `${pct}% Selesai`;

            // Question Details
            const qBadge = document.getElementById('examQuestionBadge');
            const qTopic = document.getElementById('examQuestionTopic');
            const qText = document.getElementById('examQuestionText');

            if (qBadge) qBadge.textContent = `Soal No. ${currentExamIndex + 1} / ${total}`;
            if (qTopic) qTopic.textContent = q.topic || 'Statistik Sektoral BPS';
            if (qText) qText.textContent = q.q;

            // Options
            const optContainer = document.getElementById('examOptionsContainer');
            if (optContainer) {
                const letters = ['A', 'B', 'C', 'D'];
                const selectedOpt = examUserAnswers[currentExamIndex];

                optContainer.innerHTML = q.options.map((optText, optIdx) => {
                    const isSelected = (selectedOpt === optIdx);
                    let cardClass = 'p-3.5 sm:p-4 rounded-2xl border transition-all flex items-start gap-3.5 cursor-pointer text-left ';
                    if (isSelected) {
                        cardClass += 'border-blue-600 bg-blue-50/90 shadow-xs ring-2 ring-blue-200';
                    } else {
                        cardClass += 'border-slate-200 bg-white hover:border-blue-300 hover:bg-slate-50/80';
                    }

                    let letterClass = 'w-7 h-7 sm:w-8 sm:h-8 rounded-xl font-black text-xs shrink-0 flex items-center justify-center transition-all ';
                    if (isSelected) {
                        letterClass += 'bg-[#005ea6] text-white shadow-xs';
                    } else {
                        letterClass += 'bg-slate-100 text-slate-700';
                    }

                    return `
                        <div onclick="selectExamOption(${optIdx})" class="${cardClass}">
                            <div class="${letterClass}">${letters[optIdx]}</div>
                            <div class="text-xs sm:text-sm font-semibold text-slate-800 leading-snug pt-1 flex-1">
                                ${optText}
                            </div>
                            <div class="pt-1 shrink-0">
                                <span class="w-5 h-5 rounded-full border-2 flex items-center justify-center transition ${isSelected ? 'border-blue-600 bg-blue-600 text-white' : 'border-slate-300'}">
                                    ${isSelected ? '<i class="bi bi-check text-xs"></i>' : ''}
                                </span>
                            </div>
                        </div>
                    `;
                }).join('');
            }

            // Buttons state
            const btnPrev = document.getElementById('btnExamPrev');
            const btnNext = document.getElementById('btnExamNext');
            const btnSubmit = document.getElementById('btnExamSubmit');

            if (btnPrev) btnPrev.disabled = (currentExamIndex === 0);

            if (currentExamIndex === total - 1) {
                if (btnNext) btnNext.classList.add('hidden');
                if (btnSubmit) btnSubmit.classList.remove('hidden');
            } else {
                if (btnNext) btnNext.classList.remove('hidden');
                if (btnSubmit) btnSubmit.classList.add('hidden');
            }

            renderExamNumberPills();
        }

        function selectExamOption(optIdx) {
            examUserAnswers[currentExamIndex] = optIdx;
            renderExamCurrentQuestion();
        }

        function navigateExamQuestion(delta) {
            const questions = getActiveQuestions();
            const newIdx = currentExamIndex + delta;
            if (newIdx >= 0 && newIdx < questions.length) {
                currentExamIndex = newIdx;
                renderExamCurrentQuestion();
            }
        }

        function jumpToExamQuestion(idx) {
            const questions = getActiveQuestions();
            if (idx >= 0 && idx < questions.length) {
                currentExamIndex = idx;
                renderExamCurrentQuestion();
            }
        }

        function confirmSubmitExam() {
            const questions = getActiveQuestions();
            const total = questions.length;
            const answeredCount = Object.keys(examUserAnswers).length;

            if (answeredCount < total) {
                if (!confirm(`Perhatian: Anda baru menjawab ${answeredCount} dari ${total} soal. Soal yang belum dijawab akan dihitung sebagai salah. Lanjutkan kirim jawaban sekarang?`)) {
                    return;
                }
            } else {
                if (!confirm(`Apakah Anda yakin ingin menyelesaikan dan mengirim jawaban ujian ini?`)) {
                    return;
                }
            }
            submitExam();
        }

        function submitExam() {
            if (examTimerInterval) clearInterval(examTimerInterval);

            const questions = getActiveQuestions();
            const total = questions.length;
            let correctCount = 0;

            questions.forEach((q, idx) => {
                if (examUserAnswers[idx] === q.answer) {
                    correctCount++;
                }
            });

            const score = Math.round((correctCount / total) * 100);
            const isPre = (currentExamMode === 'pretest');

            // Simpan skor ke localStorage & state
            if (isPre) {
                try { localStorage.setItem('descan_pretest_score', score); } catch(e) {}
                syncPretestCardUI(score);
            } else {
                try { localStorage.setItem('descan_posttest_score', score); } catch(e) {}
                syncPosttestCardUI(score);
            }

            // Tampilkan Halaman Hasil
            const qView = document.getElementById('examQuestionView');
            const rView = document.getElementById('examResultView');
            if (qView) qView.classList.add('hidden');
            if (rView) {
                rView.classList.remove('hidden');

                const isLulus = score >= 70;
                let badgeClass = isLulus ? 'bg-emerald-100 text-emerald-800 border-emerald-300' : 'bg-amber-100 text-amber-800 border-amber-300';
                let iconHeader = isLulus ? '🏆' : '📚';

                rView.innerHTML = `
                    <div class="space-y-4">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-3xl bg-gradient-to-tr from-emerald-500 to-teal-400 text-white flex items-center justify-center text-4xl sm:text-5xl mx-auto shadow-lg shadow-emerald-500/20">
                            ${iconHeader}
                        </div>

                        <div>
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-black uppercase tracking-wider border ${badgeClass}">
                                <i class="bi bi-patch-check-fill"></i>
                                <span>${isPre ? 'Pre-Test Berhasil Diselesaikan' : (isLulus ? 'Lulus Evaluasi Kompetensi' : 'Perlu Pendalaman Materi')}</span>
                            </span>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight mt-3">
                                ${isPre ? 'Hasil Evaluasi Kemampuan Awal Aparatur' : 'Hasil Evaluasi Akhir Sertifikasi Agen Statistik'}
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-500 max-w-md mx-auto mt-1">
                                ${isPre 
                                    ? 'Terima kasih telah menyelesaikan Pre-Test. Hasil ini digunakan oleh Tim Teknis BPS Kolaka Utara sebagai tolok ukur awal kurikulum pembinaan.' 
                                    : (isLulus ? 'Selamat! Anda telah melampaui passing grade 70 dan berhak menerima Sertifikat Resmi Agen Statistik Desa.' : 'Nilai Anda belum mencapai passing grade 70. Silakan pelajari kembali modul video dan ulangi post-test.')
                                }
                            </p>
                        </div>

                        <!-- Kotak Skor Utama -->
                        <div class="p-6 rounded-3xl bg-gradient-to-br from-slate-50 to-emerald-50/50 border border-emerald-200/80 max-w-md mx-auto space-y-3">
                            <div class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Nilai Akhir Anda</div>
                            <div class="text-5xl sm:text-6xl font-black text-emerald-700 tracking-tight">
                                ${score}<span class="text-2xl text-slate-400 font-bold">/100</span>
                            </div>
                            <div class="grid grid-cols-2 gap-3 pt-3 border-t border-slate-200/70 text-xs">
                                <div class="p-2.5 rounded-xl bg-white border border-slate-200">
                                    <span class="text-slate-400 block font-bold">Jawaban Benar</span>
                                    <b class="text-emerald-700 text-sm">${correctCount} dari ${total} Soal</b>
                                </div>
                                <div class="p-2.5 rounded-xl bg-white border border-slate-200">
                                    <span class="text-slate-400 block font-bold">Akurasi Jawaban</span>
                                    <b class="text-blue-700 text-sm">${score}%</b>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Tindakan Selesai -->
                        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
                            ${isPre ? `
                                <button type="button" onclick="closePretestModal(); switchPemTab('video');" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-black text-xs sm:text-sm transition flex items-center justify-center gap-2 cursor-pointer shadow-md">
                                    <span>Lanjut ke Video Tutorial</span>
                                    <i class="bi bi-arrow-right"></i>
                                </button>
                                <button type="button" onclick="closePretestModal();" class="w-full sm:w-auto px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition cursor-pointer">
                                    Kembali ke Menu
                                </button>
                            ` : `
                                ${isLulus ? `
                                    <button type="button" onclick="closePretestModal(); openSertifikatModal();" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-black text-xs sm:text-sm transition flex items-center justify-center gap-2 cursor-pointer shadow-md">
                                        <i class="bi bi-award-fill text-amber-300"></i>
                                        <span>Lihat &amp; Unduh Sertifikat Resmi</span>
                                    </button>
                                ` : ''}
                                <button type="button" onclick="closePretestModal();" class="w-full sm:w-auto px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition cursor-pointer">
                                    Kembali ke Menu
                                </button>
                            `}
                        </div>
                    </div>
                `;
            }
        }

        function syncPretestCardUI(score) {
            if (score === undefined || score === null) {
                try {
                    const saved = localStorage.getItem('descan_pretest_score');
                    score = saved !== null ? parseInt(saved) : 80;
                } catch(e) {
                    score = 80;
                }
            }

            // 1. Update Badge Pojok Kanan Atas Kartu [1. PRE-TEST]
            const bStatus = document.getElementById('badgePretestStatus');
            if (bStatus) {
                bStatus.className = 'text-[10px] font-black text-emerald-800 bg-emerald-100 border border-emerald-300 px-2.5 py-1 rounded-md flex items-center gap-1 shadow-2xs';
                bStatus.innerHTML = '<i class="bi bi-check-circle-fill text-emerald-600"></i><span>Sudah Dikerjakan</span>';
            }

            // 2. Update Nilai/Skor Awal
            const vScore = document.getElementById('valPretestScore');
            if (vScore) {
                vScore.innerHTML = `<i class="bi bi-check-circle-fill text-emerald-600"></i><span>Sudah Diisi (Skor: ${score})</span>`;
            }

            // 3. Update Tombol Aksi Menjadi "Kerjakan Ulang Pre-Test"
            const btn = document.getElementById('btnStartPretest');
            if (btn) {
                btn.innerHTML = '<i class="bi bi-arrow-repeat text-sm"></i><span>Kerjakan Ulang Pre-Test</span>';
            }
        }

        function syncPosttestCardUI(score) {
            if (score === undefined || score === null) {
                try {
                    const saved = localStorage.getItem('descan_posttest_score');
                    score = saved !== null ? parseInt(saved) : 85;
                } catch(e) {
                    score = 85;
                }
            }
            const el = document.getElementById('valLastPostScore');
            if (el) {
                el.innerHTML = `<i class="bi bi-trophy-fill text-amber-500"></i><span>${score} / 100 (${score >= 70 ? 'Lulus Kompetensi' : 'Perlu Peningkatan'})</span>`;
            }
        }

        
        // ==============================================================
        // CINEMATIC OPENING VIDEO DESA (BRAND IN MOTION MOTION OPENER)
        // ==============================================================
        let villageOpeningTimer = null;
        let villageOpeningProgressInterval = null;
        let isOpeningAudioMuted = false;
        let openingAudioCtx = null;

        function playCinematicOpeningAudio() {
            if (isOpeningAudioMuted) return;
            try {
                const AudioCtx = window.AudioContext || window.webkitAudioContext;
                if (!AudioCtx) return;
                if (!openingAudioCtx) openingAudioCtx = new AudioCtx();
                if (openingAudioCtx.state === 'suspended') openingAudioCtx.resume();
                
                const now = openingAudioCtx.currentTime;
                // Deep cinematic bass swell (C2 -> C3)
                const oscBass = openingAudioCtx.createOscillator();
                const gainBass = openingAudioCtx.createGain();
                oscBass.type = 'sine';
                oscBass.frequency.setValueAtTime(65.41, now);
                oscBass.frequency.exponentialRampToValueAtTime(130.81, now + 2.5);
                gainBass.gain.setValueAtTime(0.001, now);
                gainBass.gain.linearRampToValueAtTime(0.2, now + 1.2);
                gainBass.gain.exponentialRampToValueAtTime(0.001, now + 4.8);
                oscBass.connect(gainBass);
                gainBass.connect(openingAudioCtx.destination);
                oscBass.start(now);
                oscBass.stop(now + 4.9);

                // Shimmering cinematic major chord (C - E - G - B - C)
                const freqs = [261.63, 329.63, 392.00, 493.88, 523.25];
                freqs.forEach((freq, idx) => {
                    const osc = openingAudioCtx.createOscillator();
                    const gain = openingAudioCtx.createGain();
                    osc.type = 'triangle';
                    const startT = now + 0.6 + (idx * 0.18);
                    osc.frequency.setValueAtTime(freq, startT);
                    gain.gain.setValueAtTime(0.001, startT);
                    gain.gain.linearRampToValueAtTime(0.07, startT + 0.4);
                    gain.gain.exponentialRampToValueAtTime(0.001, startT + 3.8);
                    osc.connect(gain);
                    gain.connect(openingAudioCtx.destination);
                    osc.start(startT);
                    osc.stop(startT + 4.0);
                });
            } catch(e) {}
        }

        function toggleOpeningAudio() {
            isOpeningAudioMuted = !isOpeningAudioMuted;
            const textEl = document.getElementById('textOpeningAudio');
            const iconEl = document.getElementById('iconOpeningAudio');
            if (isOpeningAudioMuted) {
                if (textEl) textEl.textContent = 'Suara Mati';
                if (iconEl) iconEl.className = 'bi bi-volume-mute-fill text-slate-400';
            } else {
                if (textEl) textEl.textContent = 'Suara Aktif';
                if (iconEl) iconEl.className = 'bi bi-volume-up-fill text-emerald-300';
                playCinematicOpeningAudio();
            }
        }

        function startVillageVideoOpening(force = false) {
            clearTimeout(villageOpeningTimer);
            clearInterval(villageOpeningProgressInterval);

            // Fetch current active village data
            const vKey = currentTargetVillage || 'kamisi';
            const vData = (typeof villagesData !== 'undefined' && villagesData[vKey]) ? villagesData[vKey] : {
                title: "Desa Cinta Statistik",
                sub: "Kabupaten Kolaka Utara",
                desc: "Kedaulatan Data Statistik Sektoral Menuju Indonesia Emas."
            };

            const overlay = document.getElementById('villageVideoOpeningOverlay');
            if (!overlay) {
                actuallyOpenVideoTutorial();
                return;
            }

            // Populate opening content with active village attributes
            const titleEl = document.getElementById('openingVillageTitle');
            const kecEl = document.getElementById('openingVillageKec');
            const descEl = document.getElementById('openingVillageDesc');
            const bgVideo = document.getElementById('openingBgVideo');
            const fallbackBg = document.getElementById('openingBgFallback');

            if (titleEl) titleEl.textContent = vData.title || "DESA CANTIK";
            if (kecEl) kecEl.textContent = vData.sub || "KECAMATAN TIWU • KOLAKA UTARA";
            if (descEl) descEl.textContent = vData.desc || "Penguatan Literasi Statistik Sektoral Desa Cinta Statistik BPS RI";

            if (fallbackBg && vData.photo) {
                fallbackBg.style.backgroundImage = `url('${vData.photo}')`;
            }

            // Display overlay
            overlay.classList.remove('hidden', 'opacity-0', 'pointer-events-none');

            // Play background video
            if (bgVideo) {
                bgVideo.currentTime = 0;
                bgVideo.play().catch(() => {});
            }

            // Play ambient cinematic audio
            playCinematicOpeningAudio();

            // Progress bar and countdown timer (5 seconds)
            const durationMs = 5200;
            const startTime = Date.now();
            const progressBar = document.getElementById('openingProgressBar');
            const countdownEl = document.getElementById('openingCountdown');

            villageOpeningProgressInterval = setInterval(() => {
                const elapsed = Date.now() - startTime;
                const percent = Math.min(100, (elapsed / durationMs) * 100);
                const remainingSec = Math.max(0, Math.ceil((durationMs - elapsed) / 1000));
                
                if (progressBar) progressBar.style.width = percent + '%';
                if (countdownEl) countdownEl.textContent = remainingSec + 's';

                if (elapsed >= durationMs) {
                    clearInterval(villageOpeningProgressInterval);
                    finishVillageVideoOpening();
                }
            }, 50);

            showToast('🎬 Menampilkan Opening Video ' + (vData.title || 'Desa') + '...');
        }

        function finishVillageVideoOpening() {
            clearTimeout(villageOpeningTimer);
            clearInterval(villageOpeningProgressInterval);

            const overlay = document.getElementById('villageVideoOpeningOverlay');
            if (overlay) {
                overlay.classList.add('opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    overlay.classList.add('hidden');
                    overlay.classList.remove('opacity-0', 'pointer-events-none');
                }, 400);
            }
            actuallyOpenVideoTutorial();
        }

        function actuallyOpenVideoTutorial() {
            currentNavMenu = 'video';
            document.querySelectorAll('.nav-tab').forEach(el => el.classList.remove('active'));
            const dBtn = document.getElementById('nav-pembelajaran');
            if (dBtn) dBtn.classList.add('active', 'has-active');

            document.querySelectorAll('.menu-view-container').forEach(el => el.classList.add('hidden'));
            const targetView = document.getElementById('view-video');
            if (targetView) targetView.classList.remove('hidden');

            dcOnMenuChange('video');
            if (typeof playMicrolearningVideo === 'function') {
                playMicrolearningVideo(true);
            }
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

                // ==============================================================
        // PLAYLIST & VIDEO MICROLEARNING HANDLER (4 SERI MODUL)
        // ==============================================================
        const microVideosList = [
            {
                id: "RXV4X0cOIA0",
                title: "1. Profil & Pengenalan Desa Cantik",
                displayTitle: "Profil & Pengenalan Desa Cantik",
                subtitle: "Materi Seri 1 • Video Edukasi Desa Cantik BPS Kolaka Utara",
                duration: "4 Menit",
                points: [
                    { title: "Prinsip Satu Data Indonesia (SDI)", desc: "Memahami standar data, metadata baku, serta kode referensi statistik desa yang interoperabel." },
                    { title: "Peran Agen Statistik Desa", desc: "Aparatur desa bertindak sebagai garda terdepan pengumpul, verifikator, dan pembina basis data monografi." },
                    { title: "Validasi & Konsistensi PODES", desc: "Menjaga ketelitian pendataan lapangan guna menghindari anomali data fasilitas desa dan kependudukan." },
                    { title: "Pemanfaatan Data Sektoral", desc: "Transformasi data statistik menjadi infografis potensi desa dan acuan penentuan kebijakan APBDes." }
                ]
            },
            {
                id: "RXV4X0cOIA0",
                title: "2. Konsep Dasar Statistik Sektoral",
                displayTitle: "Konsep Dasar Statistik Sektoral",
                subtitle: "Materi Seri 2 • Variabel Makro & Tata Kelola Statistik",
                duration: "6 Menit",
                points: [
                    { title: "Klasifikasi Data Sektoral", desc: "Membedakan kebutuhan data statistik dasar nasional dengan data sektoral tingkat desa." },
                    { title: "44 Variabel Makro Desa", desc: "Penguasaan 44 indikator kunci mencakup kependudukan, kesehatan, perumahan, dan ketenagakerjaan." },
                    { title: "Instrumen Kuesioner Baku", desc: "Teknik wawancara terstandarisasi untuk mendapatkan respon akurat dari kepala keluarga (KK)." },
                    { title: "Integrasi Portal SDI", desc: "Penyelarasan kode wilayah desa dengan sistem Satu Data Indonesia BPS RI." }
                ]
            },
            {
                id: "RXV4X0cOIA0",
                title: "3. Tata Cara Pengisian Data PODES",
                displayTitle: "Tata Cara Pengisian Data PODES",
                subtitle: "Materi Seri 3 • Verifikasi Potensi & Sarana Prasarana Desa",
                duration: "8 Menit",
                points: [
                    { title: "Katalog Fasilitas Publik", desc: "Pendataan sarana pendidikan, fasilitas kesehatan, dan sentra ekonomi perdagangan desa." },
                    { title: "Deteksi Kerawanan Bencana", desc: "Pencatatan mitigasi resiko bencana alam dan kesiapsiagaan aparatur di lingkungan desa." },
                    { title: "Verifikasi Keberadaan Komoditas", desc: "Inventarisasi potensi unggulan pertanian, perkebunan kakao, cengkeh, dan hasil laut." },
                    { title: "Cek Silang Rekonsiliasi", desc: "Menghindari duplikasi pelaporan data antar dusun dan register kependudukan." }
                ]
            },
            {
                id: "RXV4X0cOIA0",
                title: "4. Praktik Pengolahan Data Excel",
                displayTitle: "Praktik Pengolahan Data Excel",
                subtitle: "Materi Seri 4 • Standardisasi Format Tabel & Visualisasi",
                duration: "7 Menit",
                points: [
                    { title: "Struktur Tabel Standar SDI", desc: "Format kolom, tipe data numeric/text, dan aturan penulisan kode baris di Microsoft Excel." },
                    { title: "Rumus Kunci Statistik", desc: "Penerapan formula SUM, AVERAGE, COUNTIF, dan VLOOKUP untuk komputasi cepat monografi." },
                    { title: "Pembersihan Data (Cleansing)", desc: "Menemukan nilai kosong (missing value), format tanggal yang keliru, dan anomali angka." },
                    { title: "Grafik & Infografis Otomatis", desc: "Membuat piramida penduduk dan grafik donat distribusi fasilitas siap publikasi." }
                ]
            }
        ];

        let currentActiveVideoIndex = 0;
        const videoCompletedFlags = [true, false, false, false];

        function selectMicroVideo(index) {
            if (index < 0 || index >= microVideosList.length) return;
            currentActiveVideoIndex = index;
            videoCompletedFlags[index] = true;
            const vid = microVideosList[index];

            // Update Header & Duration Badge
            const titleEl = document.getElementById('currentVideoTitle');
            const subEl = document.getElementById('currentVideoSubtitle');
            const durEl = document.getElementById('currentVideoDurationBadge');
            if (titleEl) titleEl.textContent = vid.displayTitle;
            if (subEl) subEl.textContent = vid.subtitle;
            if (durEl) durEl.textContent = 'Durasi: ' + vid.duration;

            // Update Video Player iframe
            const iframe = document.getElementById('mainVideoIframe');
            if (iframe) {
                iframe.setAttribute('src', `https://www.youtube.com/embed/${vid.id}?autoplay=1&enablejsapi=1&rel=0`);
            }
            const overlay = document.getElementById('videoPlayOverlay');
            if (overlay) overlay.classList.add('hidden');

            // Update Poin Penting Pembelajaran
            const ptsContainer = document.getElementById('videoLearningPointsContainer');
            if (ptsContainer && vid.points) {
                ptsContainer.innerHTML = vid.points.map((pt, i) => `
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-start gap-2.5">
                        <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center text-[10px] font-black shrink-0 mt-0.5">${i + 1}</span>
                        <div class="leading-relaxed">
                            <strong class="text-slate-900 block mb-0.5">${pt.title}</strong>
                            ${pt.desc}
                        </div>
                    </div>
                `).join('');
            }

            // Update Playlist UI
            for (let i = 0; i < microVideosList.length; i++) {
                const itemEl = document.getElementById(`playlist-item-${i}`);
                const badgeEl = document.getElementById(`playlist-badge-${i}`);
                const titleTextEl = document.getElementById(`playlist-title-${i}`);
                const statusEl = document.getElementById(`playlist-status-${i}`);
                const iconEl = document.getElementById(`playlist-icon-${i}`);

                if (i === index) {
                    if (itemEl) {
                        itemEl.className = 'p-3 rounded-xl border border-emerald-300 bg-emerald-50/70 hover:bg-emerald-100/60 transition cursor-pointer flex items-center justify-between gap-3 group';
                    }
                    if (badgeEl) {
                        badgeEl.className = 'w-8 h-8 rounded-lg bg-emerald-600 text-white flex items-center justify-center text-xs font-black shrink-0 shadow-2xs group-hover:scale-105 transition-transform';
                        badgeEl.innerHTML = '▶';
                    }
                    if (titleTextEl) {
                        titleTextEl.className = 'text-xs font-black text-emerald-950 truncate';
                    }
                    if (statusEl) {
                        statusEl.className = 'text-emerald-800 font-bold';
                        statusEl.textContent = 'Sedang Diputar';
                    }
                    if (iconEl) {
                        iconEl.className = 'text-emerald-600 shrink-0 text-sm';
                        iconEl.innerHTML = '<i class="bi bi-check-circle-fill"></i>';
                    }
                } else {
                    const isDone = videoCompletedFlags[i];
                    if (itemEl) {
                        itemEl.className = 'p-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 transition cursor-pointer flex items-center justify-between gap-3 group';
                    }
                    if (badgeEl) {
                        badgeEl.className = isDone
                            ? 'w-8 h-8 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center text-xs font-bold shrink-0'
                            : 'w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center text-xs font-bold shrink-0 group-hover:bg-emerald-50 group-hover:text-emerald-700 transition';
                        badgeEl.innerHTML = `${i + 1}`;
                    }
                    if (titleTextEl) {
                        titleTextEl.className = 'text-xs font-bold text-slate-800 truncate';
                    }
                    if (statusEl) {
                        statusEl.className = isDone ? 'text-emerald-700 font-medium' : '';
                        statusEl.textContent = isDone ? 'Selesai Ditonton' : 'Seri Modul';
                    }
                    if (iconEl) {
                        iconEl.className = isDone ? 'text-emerald-600 shrink-0 text-sm' : 'text-slate-300 shrink-0 text-sm group-hover:text-emerald-500';
                        iconEl.innerHTML = isDone ? '<i class="bi bi-check-circle-fill"></i>' : '<i class="bi bi-play-circle"></i>';
                    }
                }
            }

            // Update Progress Bar
            const completedCount = videoCompletedFlags.filter(Boolean).length;
            const pct = Math.round((completedCount / microVideosList.length) * 100);
            const pBar = document.getElementById('playlistProgressBar');
            const pText = document.getElementById('playlistProgressLabel');
            if (pBar) pBar.style.width = pct + '%';
            if (pText) pText.textContent = `${completedCount} dari 4 Selesai (${pct}%)`;

            showToast(`Memutar materi: ${vid.displayTitle}`, '🎬');
        }

        function completeVideoAndGoToPosttest() {
            videoCompletedFlags[currentActiveVideoIndex] = true;
            if (typeof unlockAllLmsModules === 'function') {
                unlockAllLmsModules();
            }
            showToast('✅ Modul video selesai! Melanjutkan ke tahap Post-test...', '🎓');
            setTimeout(() => {
                switchNavMenu('pretest');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }, 300);
        }

        function playMicrolearningVideo(unmute = true) {
            const overlay = document.getElementById('videoPlayOverlay');
            if (overlay) overlay.classList.add('hidden');
            const iframe = document.getElementById('mainVideoIframe');
            if (!iframe) return;

            const currentSrc = iframe.getAttribute('src') || '';
            if (!currentSrc.includes('autoplay=1')) {
                iframe.setAttribute('src', 'https://www.youtube.com/embed/RXV4X0cOIA0?autoplay=1&enablejsapi=1&rel=0');
            }

            try {
                iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
                if (unmute) {
                    iframe.contentWindow.postMessage('{"event":"command","func":"unMute","args":""}', '*');
                    iframe.contentWindow.postMessage('{"event":"command","func":"setVolume","args":[100]}', '*');
                    isMainVideoMuted = false;
                    const textEl = document.getElementById('textVideoSound');
                    const iconEl = document.getElementById('iconVideoSound');
                    if (textEl) textEl.textContent = 'Suara Aktif';
                    if (iconEl) iconEl.textContent = '🔊';
                }
            } catch(e) {}
            showToast('▶ Memutar Video Edukasi Desa Cantik BPS secara otomatis...');
        }

        function openVideoTheaterModal() {
            const m = document.getElementById('videoTheaterModal');
            const iframe = document.getElementById('theaterVideoIframe');
            if (iframe) {
                iframe.src = 'https://www.youtube.com/embed/RXV4X0cOIA0?autoplay=1&enablejsapi=1&rel=0';
            }
            if (m) {
                m.classList.remove('hidden');
                m.classList.add('flex');
            }
            if (typeof document !== 'undefined' && document.body) {
                document.body.classList.add('overflow-hidden');
            }
            showToast('🎬 Menampilkan Video Microlearning Layar Penuh...');
        }

        function closeVideoTheaterModal() {
            const m = document.getElementById('videoTheaterModal');
            const iframe = document.getElementById('theaterVideoIframe');
            if (iframe) {
                iframe.src = '';
            }
            if (m) {
                m.classList.add('hidden');
                m.classList.remove('flex');
            }
            if (typeof document !== 'undefined' && document.body) {
                document.body.classList.remove('overflow-hidden');
            }
        }

        function openSertifikatModal() {
            showToast('🎖️ Membuka E-Sertifikat Kelulusan Agen Statistik...');
            const modal = document.getElementById('sertifikatModal');
            if (modal) modal.classList.remove('hidden');
        }
        function closeSertifikatModal() {
            const modal = document.getElementById('sertifikatModal');
            if (modal) modal.classList.add('hidden');
        }

        function openExcelReaderModal() {
            showToast('📖 Membuka Buku Panduan Excel (30 Lembar Modul Praktik)...');
            const modal = document.getElementById('excelBookModal');
            if (modal) modal.classList.remove('hidden');
            if (typeof initExcelReader === 'function') {
                initExcelReader();
            }
            if (typeof openEmbeddedBookReader === 'function') {
                openEmbeddedBookReader('excel');
            }
        }
        function closeExcelBookModal() {
            const modal = document.getElementById('excelBookModal');
            if (modal) modal.classList.add('hidden');
        }

        function openRumusStatistikModal() {
            showToast('📐 Membuka Ringkasan Rumus Dasar Statistik BPS...');
            const m = document.getElementById('rumusStatistikModal');
            if (m) m.classList.remove('hidden');
        }
        function closeRumusStatistikModal() {
            const m = document.getElementById('rumusStatistikModal');
            if (m) m.classList.add('hidden');
        }

        function openSkAgenModal() {
            showToast('📜 Membuka Format SK Agen Statistik Desa...');
            const m = document.getElementById('skAgenModal');
            if (m) m.classList.remove('hidden');
        }
        function closeSkAgenModal() {
            const m = document.getElementById('skAgenModal');
            if (m) m.classList.add('hidden');
        }

        function openEditAparatModal() {
            const newKades = prompt('Masukkan Nama Kepala Desa:', document.getElementById('aparatKadesName')?.textContent || 'H. Syamsul Bahri, S.Sos');
            if (newKades) {
                const el = document.getElementById('aparatKadesName');
                if (el) el.textContent = newKades;
                showToast('✅ Nama Kepala Desa berhasil diperbarui!');
            }
        }

        function openAddBuktiModal(type = 'desa', defaultName = '') {
            const m = document.getElementById('addBuktiModal');
            if (m) {
                m.classList.remove('hidden');
                const sel = document.getElementById('buktiModalKategori');
                if (sel && type) sel.value = type;
                const inp = document.getElementById('buktiModalNama');
                if (inp && defaultName) inp.value = defaultName;
            } else {
                const title = prompt('Masukkan Nama Dokumen Bukti Dukung Baru:', defaultName || 'Laporan Monev Bulanan');
                if (title) {
                    const tbody = document.getElementById('tbodyMonevBukti');
                    if (tbody) {
                        const rowCount = tbody.querySelectorAll('tr').length + 1;
                        const tr = document.createElement('tr');
                        tr.className = 'hover:bg-slate-50 transition';
                        tr.innerHTML = `
                            <td class="py-2.5 px-3 text-center font-bold text-slate-500">${rowCount}</td>
                            <td class="py-2.5 px-4 font-bold text-slate-800">${title}</td>
                            <td class="py-2.5 px-3 text-center"><span class="px-2 py-0.5 rounded-md bg-emerald-100 text-emerald-800 text-[10px] font-black">✓ Lengkap</span></td>
                            <td class="py-2.5 px-4 text-center">
                                <button type="button" onclick="showToast('Mengunduh berkas ${title}...')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold cursor-pointer">Download</button>
                            </td>
                        `;
                        tbody.appendChild(tr);
                        showToast('✅ Dokumen bukti dukung berhasil ditambahkan!');
                    }
                }
            }
        }
        function closeAddBuktiModal() {
            const m = document.getElementById('addBuktiModal');
            if (m) m.classList.add('hidden');
        }

        
        // ==============================================================
        // MASTER DATA 6 DESA BINAAN KECAMATAN KODEOHA (BPS KOLAKA UTARA)
        // ==============================================================
        const villagesData = {
            // === 1. KECAMATAN KODEOHA ===
            kamisi: {
                title: "Desa Kamisi",
                sub: "Kecamatan Kodeoha • Kabupaten Kolaka Utara",
                kec: "Kodeoha",
                avatar: "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1800&q=85",
                kategori: "Desa Mandiri (Nilai 98%)",
                rep: "Pemerintah Desa Kamisi",
                desc: "Wilayah pesisir Teluk Bone dengan bentang alam maritim dan lereng agraris produktif, menjadi sentra perikanan tangkap teri tradisional terpadu serta perkebunan kakao dan kelapa rakyat binaan BPS.",
                luas: "14,80 km²",
                dusunCount: 3,
                rtCount: 8,
                komoditas: "Perikanan Tangkap, Teri, Kakao",
                pop: "1.576 Jiwa",
                period: "2026",
                umkm: "14 Unit",
                agri: "Pesisir & Kakao 190 Ha",
                catatanBps: "Rekomendasi BPS: Kategori Mandiri dengan kepatuhan pengisian 43 dari 44 indikator SDI.",
                batas: {
                    utara: "Desa Koroha",
                    selatan: "Kecamatan Tiwu",
                    barat: "Pesisir Teluk Bone",
                    timur: "Pegunungan Kodeoha"
                }
            },
            koroha: {
                title: "Desa Koroha",
                sub: "Kecamatan Kodeoha • Kabupaten Kolaka Utara",
                kec: "Kodeoha",
                avatar: "https://images.unsplash.com/photo-1518173946687-a4c8a383392e?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1518173946687-a4c8a383392e?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1518173946687-a4c8a383392e?auto=format&fit=crop&w=1800&q=85",
                kategori: "Desa Berkembang (Nilai 72%)",
                rep: "Pemerintah Desa Koroha",
                desc: "Bentang alam perbukitan subur yang terhubung ke pesisir Teluk Bone, memadukan sentra budidaya kakao sambung pucuk, cengkeh lereng bukit, serta perikanan laut dan budidaya rumput laut binaan BPS.",
                luas: "15,50 km²",
                dusunCount: 3,
                rtCount: 9,
                komoditas: "Kakao, Cengkeh, Rumput Laut",
                pop: "1.340 Jiwa",
                period: "2026",
                umkm: "16 Unit",
                agri: "Kakao & Cengkeh 240 Ha",
                catatanBps: "Rekomendasi BPS: Akselerasi pengisian variabel sosial ekonomi rumah tangga DTKS.",
                batas: {
                    utara: "Kelurahan Mala-Mala",
                    selatan: "Desa Kamisi",
                    barat: "Pesisir Teluk Bone",
                    timur: "Kawasan Hutan Lindung"
                }
            },
            malamala: {
                title: "Kelurahan Mala-Mala",
                sub: "Kecamatan Kodeoha • Kabupaten Kolaka Utara",
                kec: "Kodeoha",
                avatar: "https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=1800&q=85",
                kategori: "Perkotaan Mandiri (Nilai 93%)",
                rep: "Pemerintah Kelurahan Mala-Mala",
                desc: "Kawasan pesisir strategis sebagai pusat pemerintahan Kecamatan Kodeoha, sentra perdagangan dan fasilitas kesehatan rawat inap, didukung perkebunan kakao rakyat dan armada perikanan tangkap nelayan.",
                luas: "12,20 km²",
                dusunCount: 3,
                rtCount: 10,
                komoditas: "Jasa, Perdagangan, Kakao",
                pop: "1.272 Jiwa",
                period: "2026",
                umkm: "2 Unit",
                agri: "Pusat Pemerintahan & Perdagangan",
                catatanBps: "Rekomendasi BPS: Kualitas data administrasi kependudukan dan layanan publik sangat baik.",
                batas: {
                    utara: "Desa Delang-Delang",
                    selatan: "Desa Koroha",
                    barat: "Pesisir Teluk Bone",
                    timur: "Kawasan Hutan Lindung"
                }
            },

            // === 2. KECAMATAN TIWU ===
            lapolu: {
                title: "Desa Lapolu",
                sub: "Kecamatan Tiwu • Kabupaten Kolaka Utara",
                kec: "Tiwu",
                avatar: "https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=1800&q=85",
                kategori: "Desa Agro Mandiri (Nilai 88%)",
                rep: "Pemerintah Desa Lapolu",
                desc: "Bentang alam perbukitan agraris subur beriklim sejuk dengan akses pesisir Teluk Bone, sentra perkebunan cengkeh dan kakao rakyat bersertifikat, klaster 75 unit IKM olahan kebun, serta hasil tangkapan nelayan pesisir.",
                luas: "16,40 km²",
                dusunCount: 3,
                rtCount: 9,
                komoditas: "Cengkeh, Kakao, Agroindustri",
                pop: "1.264 Jiwa",
                period: "2026",
                umkm: "75 Unit",
                agri: "Sentra Cengkeh 380 Ha",
                catatanBps: "Rekomendasi BPS: Tingkatkan pelaporan berkala monografi industri kecil dan BUMDes.",
                batas: {
                    utara: "Kecamatan Kodeoha",
                    selatan: "Desa Tanggeawo",
                    barat: "Desa Tiwu",
                    timur: "Kawasan Hutan Pegunungan"
                }
            },
            tanggeawo: {
                title: "Desa Tanggeawo",
                sub: "Kecamatan Tiwu • Kabupaten Kolaka Utara",
                kec: "Tiwu",
                avatar: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                kategori: "Desa Mandiri (Nilai 84%)",
                rep: "Pemerintah Desa Tanggeawo",
                desc: "Kawasan lembah agraris dan perbukitan produktif dengan bentang alam perkebunan kakao rakyat mandiri, tanaman pangan hortikultura, serta 46 unit usaha IKM olahan berbasis koperasi binaan BPS.",
                luas: "13,60 km²",
                dusunCount: 3,
                rtCount: 7,
                komoditas: "Kakao, Jagung, Palawija",
                pop: "564 Jiwa",
                period: "2026",
                umkm: "46 Unit",
                agri: "Kakao & Tanaman Pangan 160 Ha",
                catatanBps: "Rekomendasi BPS: Monografi desa dan pencatatan NIK keluarga sudah tertib terstandar.",
                batas: {
                    utara: "Desa Lapolu",
                    selatan: "Desa Mattiro Bulu",
                    barat: "Desa Tahibua",
                    timur: "Perbukitan Tiwu"
                }
            },
            mattirobulu: {
                title: "Desa Mattiro Bulu",
                sub: "Kecamatan Tiwu • Kabupaten Kolaka Utara",
                kec: "Tiwu",
                avatar: "https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=1800&q=85",
                kategori: "Desa Terbina Aktif (Nilai 79%)",
                rep: "Pemerintah Desa Mattiro Bulu",
                desc: "Bentang alam dataran tinggi dan pegunungan berhawa sejuk, sentra perkebunan cengkeh rakyat, klaster penyulingan minyak atsiri nilam kualitas ekspor, serta komoditas hortikultura dan agroindustri mandiri.",
                luas: "15,80 km²",
                dusunCount: 3,
                rtCount: 8,
                komoditas: "Cengkeh, Nilam, Hortikultura",
                pop: "856 Jiwa",
                period: "2026",
                umkm: "20 Unit",
                agri: "Cengkeh & Nilam 220 Ha",
                catatanBps: "Rekomendasi BPS: Penguatan kapasitas agen statistik desa dalam pengolahan data sektoral.",
                batas: {
                    utara: "Desa Tanggeawo",
                    selatan: "Batas Selatan Kab. Kolaka Utara",
                    barat: "Desa Lawadia",
                    timur: "Kawasan Pegunungan"
                }
            }
        };

        // Aliases for compatibility
        villagesData.kalukaluku = villagesData.kamisi;
        villagesData.awo = villagesData.koroha;
        villagesData.lametuna = villagesData.lapolu;
        villagesData.sawangaoha = villagesData.tanggeawo;
        villagesData.mattirowalie = villagesData.mattirobulu;
        villagesData['mala-mala'] = villagesData.malamala;
        villagesData['mattiro-bulu'] = villagesData.mattirobulu;
        villagesData.cijati = villagesData.kamisi;
        villagesData.sukamaju = villagesData.koroha;
        villagesData.mekarwangi = villagesData.malamala;
        villagesData.tegalasri = villagesData.lapolu;
        villagesData.harapan = villagesData.tanggeawo;
        villagesData.lestari = villagesData.mattirobulu;

        // Extended BPS Desa Cantik Sectoral & Micro Dataset (Podes 2025 Kolaka Utara)
        const descanSectoralData = {
            kamisi: {
                kpi: { pop: "1.576", kk: "394", sexRatio: "99,2%", p3ke: "3,1%", stunting: "2 Balita", stuntingVal: 2, rasio: "41,5%", pre: "48" },
                desil: { d1: 22.5, d2: 20.1, d3: 24.8, d4: 32.6 },
                pekerjaan: [
                    { name: "Nelayan & Budidaya Pesisir", pct: 44 },
                    { name: "Petani Kakao & Kelapa", pct: 28 },
                    { name: "Wiraswasta / IKM Teri", pct: 16 },
                    { name: "IRT", pct: 8 },
                    { name: "Belum/Tidak Bekerja", pct: 4 }
                ],
                center: [-3.415, 120.998],
                dusun: [
                    { id: "dusun1", name: "Dusun I Kamisi Bahari", pop: 540, kk: 135, pre: 15, kerawanan: "Sedang", lat: -3.414, lng: 120.996 },
                    { id: "dusun2", name: "Dusun II Pesisir Teri", pop: 526, kk: 132, pre: 18, kerawanan: "Tinggi", lat: -3.416, lng: 120.999 },
                    { id: "dusun3", name: "Dusun III Perkebunan Kakao", pop: 510, kk: 127, pre: 15, kerawanan: "Rendah", lat: -3.415, lng: 121.001 }
                ],
                piramida: [
                    { age: "65+", m: 45, f: 55 },
                    { age: "60-64", m: 60, f: 65 },
                    { age: "55-59", m: 80, f: 85 },
                    { age: "50-54", m: 105, f: 110 },
                    { age: "45-49", m: 125, f: 130 },
                    { age: "40-44", m: 150, f: 145 },
                    { age: "35-39", m: 170, f: 160 },
                    { age: "30-34", m: 190, f: 180 },
                    { age: "25-29", m: 200, f: 195 },
                    { age: "20-24", m: 180, f: 175 },
                    { age: "15-19", m: 150, f: 140 },
                    { age: "10-14", m: 130, f: 120 },
                    { age: "5-9", m: 105, f: 100 },
                    { age: "0-4", m: 80, f: 75 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 18 },
                    { label: "SD / Sdrjt", val: 45 },
                    { label: "SMP / Sdrjt", val: 62 },
                    { label: "SMA / Sdrjt", val: 54 },
                    { label: "Perguruan Tinggi", val: 28 }
                ]
            },
            koroha: {
                kpi: { pop: "1.340", kk: "335", sexRatio: "101,0%", p3ke: "4,2%", stunting: "3 Balita", stuntingVal: 3, rasio: "43,0%", pre: "42" },
                desil: { d1: 24.0, d2: 21.5, d3: 23.5, d4: 31.0 },
                pekerjaan: [
                    { name: "Petani Kakao & Cengkeh", pct: 48 },
                    { name: "Nelayan Tradisional", pct: 22 },
                    { name: "IKM Olahan Hasil Kebun", pct: 15 },
                    { name: "IRT", pct: 10 },
                    { name: "Belum/Tidak Bekerja", pct: 5 }
                ],
                center: [-3.418, 121.002],
                dusun: [
                    { id: "dusun1", name: "Dusun I Koroha Raya", pop: 480, kk: 120, pre: 14, kerawanan: "Sedang", lat: -3.417, lng: 121.001 },
                    { id: "dusun2", name: "Dusun II Pesisir Maritim", pop: 450, kk: 112, pre: 16, kerawanan: "Tinggi", lat: -3.419, lng: 121.003 },
                    { id: "dusun3", name: "Dusun III Bukit Harapan", pop: 410, kk: 103, pre: 12, kerawanan: "Rendah", lat: -3.418, lng: 121.004 }
                ],
                piramida: [
                    { age: "65+", m: 38, f: 46 },
                    { age: "60-64", m: 50, f: 55 },
                    { age: "55-59", m: 68, f: 72 },
                    { age: "50-54", m: 90, f: 94 },
                    { age: "45-49", m: 108, f: 112 },
                    { age: "40-44", m: 130, f: 125 },
                    { age: "35-39", m: 145, f: 138 },
                    { age: "30-34", m: 160, f: 152 },
                    { age: "25-29", m: 170, f: 165 },
                    { age: "20-24", m: 155, f: 148 },
                    { age: "15-19", m: 128, f: 120 },
                    { age: "10-14", m: 110, f: 102 },
                    { age: "5-9", m: 90, f: 85 },
                    { age: "0-4", m: 68, f: 62 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 15 },
                    { label: "SD / Sdrjt", val: 38 },
                    { label: "SMP / Sdrjt", val: 52 },
                    { label: "SMA / Sdrjt", val: 46 },
                    { label: "Perguruan Tinggi", val: 22 }
                ]
            },
            malamala: {
                kpi: { pop: "1.272", kk: "318", sexRatio: "97,8%", p3ke: "2,8%", stunting: "1 Balita", stuntingVal: 1, rasio: "38,5%", pre: "36" },
                desil: { d1: 18.5, d2: 19.5, d3: 25.0, d4: 37.0 },
                pekerjaan: [
                    { name: "Perdagangan & Jasa", pct: 38 },
                    { name: "Pegawai / Aparat / Guru", pct: 26 },
                    { name: "Petani Kakao Rakyat", pct: 20 },
                    { name: "IRT", pct: 10 },
                    { name: "Lainnya", pct: 6 }
                ],
                center: [-3.411, 121.003],
                dusun: [
                    { id: "dusun1", name: "Lingkungan I Mala-Mala Pusat", pop: 450, kk: 112, pre: 12, kerawanan: "Rendah", lat: -3.410, lng: 121.002 },
                    { id: "dusun2", name: "Lingkungan II Pasar Kodeoha", pop: 430, kk: 108, pre: 14, kerawanan: "Sedang", lat: -3.412, lng: 121.004 },
                    { id: "dusun3", name: "Lingkungan III Rawat Inap", pop: 392, kk: 98, pre: 10, kerawanan: "Rendah", lat: -3.411, lng: 121.005 }
                ],
                piramida: [
                    { age: "65+", m: 35, f: 42 },
                    { age: "60-64", m: 48, f: 52 },
                    { age: "55-59", m: 65, f: 70 },
                    { age: "50-54", m: 85, f: 90 },
                    { age: "45-49", m: 102, f: 108 },
                    { age: "40-44", m: 122, f: 118 },
                    { age: "35-39", m: 138, f: 130 },
                    { age: "30-34", m: 152, f: 145 },
                    { age: "25-29", m: 162, f: 156 },
                    { age: "20-24", m: 148, f: 140 },
                    { age: "15-19", m: 120, f: 115 },
                    { age: "10-14", m: 105, f: 98 },
                    { age: "5-9", m: 85, f: 80 },
                    { age: "0-4", m: 65, f: 58 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 8 },
                    { label: "SD / Sdrjt", val: 28 },
                    { label: "SMP / Sdrjt", val: 42 },
                    { label: "SMA / Sdrjt", val: 58 },
                    { label: "Perguruan Tinggi", val: 45 }
                ]
            },
            lapolu: {
                kpi: { pop: "1.264", kk: "321", sexRatio: "100,5%", p3ke: "3,5%", stunting: "2 Balita", stuntingVal: 2, rasio: "40,0%", pre: "38" },
                desil: { d1: 21.0, d2: 20.5, d3: 24.5, d4: 34.0 },
                pekerjaan: [
                    { name: "Petani Cengkeh & Kakao", pct: 46 },
                    { name: "IKM Pengolahan Cengkeh (75 Unit)", pct: 32 },
                    { name: "Pedagang Pengumpul", pct: 10 },
                    { name: "IRT", pct: 8 },
                    { name: "Lainnya", pct: 4 }
                ],
                center: [-3.362, 120.978],
                dusun: [
                    { id: "dusun1", name: "Dusun I Lapolu Pusat", pop: 440, kk: 112, pre: 12, kerawanan: "Sedang", lat: -3.361, lng: 120.977 },
                    { id: "dusun2", name: "Dusun II Cengkeh Raya", pop: 424, kk: 108, pre: 15, kerawanan: "Tinggi", lat: -3.363, lng: 120.979 },
                    { id: "dusun3", name: "Dusun III Agro Mandiri", pop: 400, kk: 101, pre: 11, kerawanan: "Rendah", lat: -3.362, lng: 120.980 }
                ],
                piramida: [
                    { age: "65+", m: 34, f: 40 },
                    { age: "60-64", m: 46, f: 50 },
                    { age: "55-59", m: 62, f: 68 },
                    { age: "50-54", m: 82, f: 88 },
                    { age: "45-49", m: 100, f: 105 },
                    { age: "40-44", m: 120, f: 115 },
                    { age: "35-39", m: 135, f: 128 },
                    { age: "30-34", m: 150, f: 142 },
                    { age: "25-29", m: 160, f: 154 },
                    { age: "20-24", m: 145, f: 138 },
                    { age: "15-19", m: 118, f: 112 },
                    { age: "10-14", m: 102, f: 95 },
                    { age: "5-9", m: 82, f: 78 },
                    { age: "0-4", m: 62, f: 56 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 12 },
                    { label: "SD / Sdrjt", val: 35 },
                    { label: "SMP / Sdrjt", val: 48 },
                    { label: "SMA / Sdrjt", val: 44 },
                    { label: "Perguruan Tinggi", val: 24 }
                ]
            },
            tanggeawo: {
                kpi: { pop: "564", kk: "141", sexRatio: "102,0%", p3ke: "3,2%", stunting: "1 Balita", stuntingVal: 1, rasio: "39,0%", pre: "18" },
                desil: { d1: 20.0, d2: 21.0, d3: 25.0, d4: 34.0 },
                pekerjaan: [
                    { name: "Petani Kakao Rakyat", pct: 52 },
                    { name: "Pengrajin / IKM (46 Unit)", pct: 28 },
                    { name: "Petani Jagung & Pangan", pct: 10 },
                    { name: "IRT", pct: 7 },
                    { name: "Lainnya", pct: 3 }
                ],
                center: [-3.355, 120.992],
                dusun: [
                    { id: "dusun1", name: "Dusun I Tanggeawo Subur", pop: 200, kk: 50, pre: 6, kerawanan: "Rendah", lat: -3.354, lng: 120.991 },
                    { id: "dusun2", name: "Dusun II Kebun Kakao", pop: 190, kk: 48, pre: 7, kerawanan: "Sedang", lat: -3.356, lng: 120.993 },
                    { id: "dusun3", name: "Dusun III Harapan Maju", pop: 174, kk: 43, pre: 5, kerawanan: "Rendah", lat: -3.355, lng: 120.994 }
                ],
                piramida: [
                    { age: "65+", m: 15, f: 18 },
                    { age: "60-64", m: 20, f: 22 },
                    { age: "55-59", m: 28, f: 30 },
                    { age: "50-54", m: 36, f: 38 },
                    { age: "45-49", m: 45, f: 47 },
                    { age: "40-44", m: 54, f: 52 },
                    { age: "35-39", m: 60, f: 58 },
                    { age: "30-34", m: 68, f: 64 },
                    { age: "25-29", m: 72, f: 68 },
                    { age: "20-24", m: 65, f: 62 },
                    { age: "15-19", m: 52, f: 50 },
                    { age: "10-14", m: 46, f: 42 },
                    { age: "5-9", m: 36, f: 34 },
                    { age: "0-4", m: 28, f: 25 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 5 },
                    { label: "SD / Sdrjt", val: 18 },
                    { label: "SMP / Sdrjt", val: 24 },
                    { label: "SMA / Sdrjt", val: 20 },
                    { label: "Perguruan Tinggi", val: 12 }
                ]
            },
            mattirobulu: {
                kpi: { pop: "856", kk: "324", sexRatio: "99,5%", p3ke: "4,0%", stunting: "2 Balita", stuntingVal: 2, rasio: "42,0%", pre: "26" },
                desil: { d1: 23.5, d2: 21.0, d3: 24.0, d4: 31.5 },
                pekerjaan: [
                    { name: "Petani Cengkeh & Nilam", pct: 50 },
                    { name: "Penyuling Minyak Atsiri / IKM (20 Unit)", pct: 24 },
                    { name: "Hortikultura Dataran", pct: 14 },
                    { name: "IRT", pct: 8 },
                    { name: "Lainnya", pct: 4 }
                ],
                center: [-3.348, 120.985],
                dusun: [
                    { id: "dusun1", name: "Dusun I Mattiro Dataran", pop: 300, kk: 114, pre: 9, kerawanan: "Sedang", lat: -3.347, lng: 120.984 },
                    { id: "dusun2", name: "Dusun II Cengkeh Perbukitan", pop: 290, kk: 110, pre: 10, kerawanan: "Tinggi", lat: -3.349, lng: 120.986 },
                    { id: "dusun3", name: "Dusun III Bukit Subur", pop: 266, kk: 100, pre: 7, kerawanan: "Rendah", lat: -3.348, lng: 120.987 }
                ],
                piramida: [
                    { age: "65+", m: 24, f: 28 },
                    { age: "60-64", m: 32, f: 36 },
                    { age: "55-59", m: 42, f: 46 },
                    { age: "50-54", m: 56, f: 60 },
                    { age: "45-49", m: 68, f: 72 },
                    { age: "40-44", m: 82, f: 78 },
                    { age: "35-39", m: 92, f: 88 },
                    { age: "30-34", m: 102, f: 98 },
                    { age: "25-29", m: 108, f: 104 },
                    { age: "20-24", m: 98, f: 94 },
                    { age: "15-19", m: 80, f: 76 },
                    { age: "10-14", m: 70, f: 65 },
                    { age: "5-9", m: 55, f: 52 },
                    { age: "0-4", m: 42, f: 38 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 9 },
                    { label: "SD / Sdrjt", val: 24 },
                    { label: "SMP / Sdrjt", val: 34 },
                    { label: "SMA / Sdrjt", val: 30 },
                    { label: "Perguruan Tinggi", val: 16 }
                ]
            }
        };

        // Aliases for compatibility
        descanSectoralData.kalukaluku = descanSectoralData.kamisi;
        descanSectoralData.awo = descanSectoralData.koroha;
        descanSectoralData.lametuna = descanSectoralData.lapolu;
        descanSectoralData.sawangaoha = descanSectoralData.tanggeawo;
        descanSectoralData.mattirowalie = descanSectoralData.mattirobulu;
        descanSectoralData['mala-mala'] = descanSectoralData.malamala;
        descanSectoralData['mattiro-bulu'] = descanSectoralData.mattirobulu;
        descanSectoralData.cijati = descanSectoralData.kamisi;
        descanSectoralData.sukamaju = descanSectoralData.koroha;
        descanSectoralData.mekarwangi = descanSectoralData.malamala;
        descanSectoralData.tegalasri = descanSectoralData.lapolu;
        descanSectoralData.harapan = descanSectoralData.tanggeawo;
        descanSectoralData.lestari = descanSectoralData.mattirobulu;

        // analitikDataMap aliases initialized after its declaration below

        // Aliases for compatibility
        descanSectoralData.cijati = descanSectoralData.kalukaluku;
        descanSectoralData.sukamaju = descanSectoralData.awo;
        descanSectoralData.mekarwangi = descanSectoralData.kamisi;
        descanSectoralData.tegalasri = descanSectoralData.koroha;
        descanSectoralData.harapan = descanSectoralData.lametuna;
        descanSectoralData.lestari = descanSectoralData.sawangaoha;


        function switchNavMenu(menuKey) {
            // Handle aliases & shortcuts
            if (menuKey === 'gallery') menuKey = 'galeri';
            if (menuKey === 'podes' || menuKey === 'pengisian' || menuKey === 'kpi' || menuKey === 'spreadsheet') {
                menuKey = 'podes';
            }
            if (menuKey === 'kependudukan') {
                switchNavMenu('dashboard');
                setTimeout(() => scrollToDashSection('sectionPiramida'), 150);
                return;
            }
            if (menuKey === 'sosial' || menuKey === 'bansos' || menuKey === 'desil') {
                switchNavMenu('dashboard');
                setTimeout(() => scrollToDashSection('sectionDesil'), 150);
                return;
            }
            if (menuKey === 'infografis' || menuKey === 'metadata' || menuKey === 'monografi' || menuKey === 'brs') {
                menuKey = 'publikasi';
            }
            if (menuKey === 'peta') {
                switchNavMenu('tentang');
                setTimeout(() => scrollToDashSection('sectionPeta'), 200);
                return;
            }
            if (menuKey === 'pendidikan') {
                switchNavMenu('dashboard');
                setTimeout(() => scrollToDashSection('sectionPendidikan'), 150);
                return;
            }
            if (menuKey === 'pekerjaan') {
                switchNavMenu('dashboard');
                setTimeout(() => scrollToDashSection('sectionPekerjaan'), 150);
                return;
            }
            if (menuKey === 'profil') {
                menuKey = 'tentang';
            }
            if (menuKey === 'monev') {
                menuKey = 'monitoring';
            }
            if (menuKey === 'excel') menuKey = 'buku';
            if (menuKey === 'posttest') menuKey = 'pretest';
            if (menuKey === 'layanan' || menuKey === 'pengaduan') {
                openLayananModal();
                return;
            }
            if (menuKey === 'pst') {
                openPstModal();
                return;
            }

            // DAFTAR MENU RESMI DESCAN
            const validMenus = ['dashboard', 'tentang', 'galeri', 'output', 'monitoring', 'publikasi', 'pembelajaran', 'video', 'pretest', 'buku', 'monev', 'pembinaan', 'podes'];
            if (!validMenus.includes(menuKey)) {
                menuKey = 'dashboard';
            }
            currentNavMenu = menuKey;

            // Update Top Nav Tabs
            document.querySelectorAll('.nav-tab').forEach(el => {
                el.classList.remove('active');
            });
            const dBtn = document.getElementById('nav-' + menuKey);
            if (dBtn) {
                dBtn.classList.add('active');
            }

            // Update Header Output & Galeri Button Active State
            const headerOutputBtn = document.getElementById('header-nav-output');
            if (headerOutputBtn) {
                if (menuKey === 'output') {
                    headerOutputBtn.classList.add('ring-2', 'ring-emerald-500', 'bg-emerald-100/90', 'shadow-sm');
                } else {
                    headerOutputBtn.classList.remove('ring-2', 'ring-emerald-500', 'bg-emerald-100/90', 'shadow-sm');
                }
            }
            const headerGaleriBtn = document.getElementById('header-nav-galeri');
            if (headerGaleriBtn) {
                if (menuKey === 'galeri') {
                    headerGaleriBtn.classList.add('ring-2', 'ring-emerald-500', 'bg-emerald-100/90', 'shadow-sm');
                } else {
                    headerGaleriBtn.classList.remove('ring-2', 'ring-emerald-500', 'bg-emerald-100/90', 'shadow-sm');
                }
            }

            // Update Sidebar Buttons (4 buttons)
            document.querySelectorAll('.side-nav-btn').forEach(el => {
                el.classList.remove('bg-[#005ea6]', 'text-white', 'shadow-sm');
                el.classList.add('text-blue-100');
            });
            const sBtn = document.getElementById('side-' + menuKey);
            if (sBtn) {
                sBtn.classList.remove('text-blue-100');
                sBtn.classList.add('bg-[#005ea6]', 'text-white', 'shadow-sm');
            }

            // Update View Visibility (All views)
            document.querySelectorAll('.menu-view-container').forEach(el => {
                el.classList.add('hidden');
            });
            const targetView = document.getElementById('view-' + menuKey);
            if (targetView) {
                targetView.classList.remove('hidden');
                if (menuKey === 'tentang') renderProfilDesa3D(currentTargetVillage);
                if (menuKey === 'publikasi') renderPublikasiDesa(currentTargetVillage);
                if (menuKey === 'podes') syncPodesSpreadsheetForVillage(currentTargetVillage);
                syncPretestCardUI();
                syncPosttestCardUI();
                if (menuKey === 'galeri') renderPageGaleriPhotos('all', '');
            }
            dcOnMenuChange(menuKey);

            if (menuKey === 'dashboard') {
                renderDashboardCantik(currentTargetVillage);
                if (typeof renderDashboard6Desa === 'function') renderDashboard6Desa();
                if (typeof filterAnalitikDesa === 'function') filterAnalitikDesa(currentAnalitikDesa || 'cijati');
                setTimeout(() => {
                    if (thematicLeafletMap) {
                        thematicLeafletMap.invalidateSize();
                    }
                }, 200);
            }

            if (menuKey === 'buku') {
                if (typeof openEmbeddedBookReader === 'function') {
                    openEmbeddedBookReader(activeBookKey || 'excel');
                }
            }
            if (menuKey === 'monitoring' || menuKey === 'monev') {
                if (typeof renderBuktiDukungTables === 'function') {
                    renderBuktiDukungTables(currentTargetVillage);
                }
            }

            const videoIframe = document.getElementById('mainVideoIframe');
            if (videoIframe) {
                if (menuKey === 'video') {
                    try {
                        videoIframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
                    } catch(e) {}
                } else {
                    try {
                        videoIframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
                    } catch(e) {}
                }
            }

            try {
                const url = new URL(window.location.href);
                url.searchParams.set('desa', currentVillageKey || currentTargetVillage);
                url.searchParams.set('menu', menuKey);
                window.history.replaceState(null, '', url.toString());
            } catch(e) {}

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        let isMainVideoMuted = true;
        function toggleMainVideoSound() {
            const videoIframe = document.getElementById('mainVideoIframe');
            const textEl = document.getElementById('textVideoSound');
            const iconEl = document.getElementById('iconVideoSound');
            if (!videoIframe) return;

            if (isMainVideoMuted) {
                try {
                    videoIframe.contentWindow.postMessage('{"event":"command","func":"unMute","args":""}', '*');
                    videoIframe.contentWindow.postMessage('{"event":"command","func":"setVolume","args":[100]}', '*');
                    videoIframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
                } catch(e) {}
                isMainVideoMuted = false;
                if (textEl) textEl.textContent = 'Bisukan Suara';
                if (iconEl) iconEl.textContent = '🔇';
                showToast('🔊 Suara video aktif.');
            } else {
                try {
                    videoIframe.contentWindow.postMessage('{"event":"command","func":"mute","args":""}', '*');
                } catch(e) {}
                isMainVideoMuted = true;
                if (textEl) textEl.textContent = 'Aktifkan Suara';
                if (iconEl) iconEl.textContent = '🔊';
                showToast('🔇 Suara video dibisukan.');
            }
        }



        function handleDashFilterChange() {
            const wilSelect = document.getElementById('dashFilterWilayah');
            const thnSelect = document.getElementById('dashFilterTahun');
            const filterDusun = wilSelect ? wilSelect.value : 'all';
            const filterYear = thnSelect ? thnSelect.value : '2026';
            renderDashboardCantik(currentTargetVillage, filterDusun, filterYear);
        }

        function populateDashDusunOptions(villageKey, selectedDusun) {
            const wilSelect = document.getElementById('dashFilterWilayah');
            if (!wilSelect) return;
            const data = descanSectoralData[villageKey] || descanSectoralData.cijati;
            let optionsHtml = '<option value="all">Semua Wilayah</option>';
            data.dusun.forEach(d => {
                const sel = (selectedDusun === d.id) ? 'selected' : '';
                optionsHtml += `<option value="${d.id}" ${sel}>${d.name}</option>`;
            });
            wilSelect.innerHTML = optionsHtml;
        }

        
        // ==============================================================
        
        // ==============================================================
        // BERANDA EXECUTIVE SUB-PANEL CONTROLLER (SESUAI DESAIN USER)
        // Dashboard 6 Desa | Analitik Sektoral | 🔒 Data & Publikasi
        // ==============================================================
        let currentDashTab = 'dashboard';

        const analitikDataMap = {
            kalukaluku: {
                name: "Desa 1 (Kalu Kaluku)",
                kk: 412,
                penerangan: {
                    total: 412,
                    meteran: 321, meteranPct: 78,
                    tanpa: 58, tanpaPct: 14,
                    nonPln: 33, nonPlnPct: 8
                },
                lantai: {
                    semen: 214, semenPct: 75,
                    kayu: 41, kayuPct: 18,
                    keramik: 148, keramikPct: 52,
                    marmer: 9, marmerPct: 6
                }
            },
            awo: {
                name: "Desa 2 (Awo)",
                kk: 356,
                penerangan: {
                    total: 356,
                    meteran: 274, meteranPct: 77,
                    tanpa: 53, tanpaPct: 15,
                    nonPln: 29, nonPlnPct: 8
                },
                lantai: {
                    semen: 182, semenPct: 72,
                    kayu: 39, kayuPct: 20,
                    keramik: 128, keramikPct: 50,
                    marmer: 7, marmerPct: 5
                }
            },
            kamisi: {
                name: "Desa 3 (Kamisi)",
                kk: 528,
                penerangan: {
                    total: 528,
                    meteran: 422, meteranPct: 80,
                    tanpa: 69, tanpaPct: 13,
                    nonPln: 37, nonPlnPct: 7
                },
                lantai: {
                    semen: 275, semenPct: 76,
                    kayu: 48, kayuPct: 16,
                    keramik: 193, keramikPct: 53,
                    marmer: 12, marmerPct: 6
                }
            },
            koroha: {
                name: "Desa 4 (Koroha)",
                kk: 298,
                penerangan: {
                    total: 298,
                    meteran: 226, meteranPct: 76,
                    tanpa: 45, tanpaPct: 15,
                    nonPln: 27, nonPlnPct: 9
                },
                lantai: {
                    semen: 158, semenPct: 74,
                    kayu: 36, kayuPct: 21,
                    keramik: 99, keramikPct: 46,
                    marmer: 5, marmerPct: 5
                }
            },
            lametuna: {
                name: "Desa 5 (Lametuna)",
                kk: 447,
                penerangan: {
                    total: 447,
                    meteran: 353, meteranPct: 79,
                    tanpa: 63, tanpaPct: 14,
                    nonPln: 31, nonPlnPct: 7
                },
                lantai: {
                    semen: 232, semenPct: 74,
                    kayu: 45, kayuPct: 17,
                    keramik: 161, keramikPct: 51,
                    marmer: 9, marmerPct: 5
                }
            },
            sawangaoha: {
                name: "Desa 6 (Sawangaoha)",
                kk: 385,
                penerangan: {
                    total: 385,
                    meteran: 296, meteranPct: 77,
                    tanpa: 58, tanpaPct: 15,
                    nonPln: 31, nonPlnPct: 8
                },
                lantai: {
                    semen: 200, semenPct: 73,
                    kayu: 43, kayuPct: 19,
                    keramik: 134, keramikPct: 49,
                    marmer: 8, marmerPct: 5
                }
            },
            all: {
                name: "Semua desa (Kodeoha)",
                kk: 2426,
                penerangan: {
                    total: 2426,
                    meteran: 1892, meteranPct: 78,
                    tanpa: 346, tanpaPct: 14,
                    nonPln: 188, nonPlnPct: 8
                },
                lantai: {
                    semen: 1261, semenPct: 75,
                    kayu: 252, kayuPct: 18,
                    keramik: 863, keramikPct: 51,
                    marmer: 50, marmerPct: 6
                }
            }
        };

        // analitikDataMap aliases initialized after its declaration below

        function switchDashTab(tabKey) {
            currentDashTab = tabKey;
            
            // Panels
            const pDash = document.getElementById('panelDashDashboard');
            const pAnal = document.getElementById('panelDashAnalitik');
            const pPub = document.getElementById('panelDashPublikasi');
            
            if (pDash) pDash.classList.add('hidden');
            if (pAnal) pAnal.classList.add('hidden');
            if (pPub) pPub.classList.add('hidden');
            
            // Tab buttons
            const btnDash = document.getElementById('tabDashDashboard');
            const btnAnal = document.getElementById('tabDashAnalitik');
            const btnPub = document.getElementById('tabDashPublikasi');
            const subTitle = document.getElementById('berandaSubTitle');
            
            [btnDash, btnAnal, btnPub].forEach(btn => {
                if (!btn) return;
                btn.className = "px-4 py-1.5 rounded-lg text-xs font-bold text-slate-600 hover:text-slate-900 transition cursor-pointer";
            });
            
            if (tabKey === 'dashboard') {
                if (pDash) pDash.classList.remove('hidden');
                if (btnDash) {
                    btnDash.className = "px-4 py-1.5 rounded-lg text-xs font-black bg-[#005ea6] text-white shadow-xs transition cursor-pointer";
                }
                if (subTitle) subTitle.textContent = "Dashboard Pendataan 2026 - 6 desa binaan BPS Kabupaten Kolaka Utara";
                renderDashboard6Desa();
            } else if (tabKey === 'analitik') {
                if (pAnal) pAnal.classList.remove('hidden');
                if (btnAnal) {
                    btnAnal.className = "px-4 py-1.5 rounded-lg text-xs font-black bg-[#005ea6] text-white shadow-xs transition cursor-pointer";
                }
                if (subTitle) subTitle.textContent = "Analisis Data Sektoral & Indikator Kesejahteraan BPS Kolaka Utara";
                filterAnalitikDesa(currentAnalitikDesa || 'cijati');
            } else if (tabKey === 'publikasi') {
                if (pPub) pPub.classList.remove('hidden');
                if (btnPub) {
                    btnPub.className = "px-4 py-1.5 rounded-lg text-xs font-black bg-[#005ea6] text-white shadow-xs transition flex items-center gap-1 cursor-pointer";
                }
                if (subTitle) subTitle.textContent = "Diseminasi Dokumen Resmi BPS Kabupaten Kolaka Utara & Monografi Desa";
            }
        }

        function renderDashboard6Desa() {
            // 1. Progres pendataan per desa (Sesuai Foto Laptop 2)
            const progresContainer = document.getElementById('containerProgresDesa');
            if (progresContainer) {
                const desaPilots = [
                    { name: "Desa 1", pct: 93, terinput: 41, total: 44, color: "bg-[#84cc16]" },
                    { name: "Desa 2", pct: 82, terinput: 36, total: 44, color: "bg-[#84cc16]" },
                    { name: "Desa 3", pct: 98, terinput: 43, total: 44, color: "bg-[#84cc16]" },
                    { name: "Desa 4", pct: 68, terinput: 30, total: 44, color: "bg-[#84cc16]" },
                    { name: "Desa 5", pct: 75, terinput: 33, total: 44, color: "bg-[#84cc16]" },
                    { name: "Desa 6", pct: 89, terinput: 39, total: 44, color: "bg-[#84cc16]" }
                ];

                let html = '';
                desaPilots.forEach(item => {
                    html += `
                    <div class="space-y-1">
                        <div class="flex items-center justify-between text-xs font-bold text-slate-700">
                            <span>${item.name}</span>
                            <span class="text-slate-900 font-black">${item.pct}% <span class="text-slate-400 font-medium">(${item.terinput}/${item.total})</span></span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden border border-slate-200/60 shadow-inner">
                            <div class="h-full ${item.color} rounded-full transition-all duration-700 shadow-xs" style="width: ${item.pct}%"></div>
                        </div>
                    </div>`;
                });
                progresContainer.innerHTML = html;
            }

            // 2. Jumlah keluarga per desa (Sesuai Foto Laptop 2)
            const barContainer = document.getElementById('containerBarKeluargaDesa');
            if (barContainer) {
                const kkData = [
                    { name: "Desa 1", count: 412, color: "bg-[#0284c7]", heightPct: 78 },
                    { name: "Desa 2", count: 356, color: "bg-[#f97316]", heightPct: 67 },
                    { name: "Desa 3", count: 528, color: "bg-[#84cc16]", heightPct: 100 },
                    { name: "Desa 4", count: 298, color: "bg-[#06b6d4]", heightPct: 56 },
                    { name: "Desa 5", count: 447, color: "bg-[#0d9488]", heightPct: 84 },
                    { name: "Desa 6", count: 385, color: "bg-[#f59e0b]", heightPct: 73 }
                ];

                let barHtml = '';
                kkData.forEach(item => {
                    barHtml += `
                    <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                        <span class="text-xs font-black text-slate-800">${item.count}</span>
                        <div class="w-full max-w-[50px] ${item.color} rounded-t-lg transition-all duration-700 shadow-sm group-hover:brightness-110" style="height: ${item.heightPct}%;"></div>
                        <span class="text-[11px] font-bold text-slate-500 text-center whitespace-nowrap mt-1">${item.name}</span>
                    </div>`;
                });
                barContainer.innerHTML = barHtml;
            }
        }

        function filterAnalitikDesa(desaKey) {
            currentAnalitikDesa = desaKey;
            const cur = analitikDataMap[desaKey] || analitikDataMap.cijati;

            // Update Pill Buttons
            document.querySelectorAll('.pill-analitik').forEach(btn => {
                btn.className = "pill-analitik px-4 py-1.5 rounded-full text-xs font-bold bg-slate-100 text-slate-700 hover:bg-slate-200 transition cursor-pointer shrink-0";
            });
            const activePill = document.getElementById('pillAnalitik-' + desaKey);
            if (activePill) {
                activePill.className = "pill-analitik active px-4 py-1.5 rounded-full text-xs font-bold bg-slate-900 text-white shadow-xs transition cursor-pointer shrink-0";
            }

            // Update Subtitle
            const subTitle = document.getElementById('analitikCalcSubtitle');
            if (subTitle) {
                subTitle.textContent = `Dasar perhitungan: ${cur.kk.toLocaleString('id-ID')} keluarga (${cur.name}). Seluruh nilai adalah data contoh.`;
            }

            // Update Center Total Donut Text
            const centerEl = document.getElementById('peneranganTotalCenter');
            if (centerEl) {
                centerEl.textContent = cur.penerangan.total.toLocaleString('id-ID');
            }

            // Update Legend
            const elMeteran = document.getElementById('valPlnMeteran');
            const elMeteranPct = document.getElementById('pctPlnMeteran');
            const elTanpa = document.getElementById('valPlnTanpa');
            const elTanpaPct = document.getElementById('pctPlnTanpa');
            const elNon = document.getElementById('valNonPln');
            const elNonPct = document.getElementById('pctNonPln');

            if (elMeteran) elMeteran.textContent = cur.penerangan.meteran.toLocaleString('id-ID');
            if (elMeteranPct) elMeteranPct.textContent = `(${cur.penerangan.meteranPct}%)`;
            if (elTanpa) elTanpa.textContent = cur.penerangan.tanpa.toLocaleString('id-ID');
            if (elTanpaPct) elTanpaPct.textContent = `(${cur.penerangan.tanpaPct}%)`;
            if (elNon) elNon.textContent = cur.penerangan.nonPln.toLocaleString('id-ID');
            if (elNonPct) elNonPct.textContent = `(${cur.penerangan.nonPlnPct}%)`;

            // Render Donut Chart (Chart.js or SVG)
            renderPeneranganDonutChart(cur.penerangan);

            // Update Jenis Lantai Bars
            const elLantaiSemen = document.getElementById('valLantaiSemen');
            const barLantaiSemen = document.getElementById('barLantaiSemen');
            const elLantaiKayu = document.getElementById('valLantaiKayu');
            const barLantaiKayu = document.getElementById('barLantaiKayu');
            const elLantaiKeramik = document.getElementById('valLantaiKeramik');
            const barLantaiKeramik = document.getElementById('barLantaiKeramik');
            const elLantaiMarmer = document.getElementById('valLantaiMarmer');
            const barLantaiMarmer = document.getElementById('barLantaiMarmer');

            if (elLantaiSemen) elLantaiSemen.textContent = cur.lantai.semen.toLocaleString('id-ID');
            if (barLantaiSemen) barLantaiSemen.style.height = `${cur.lantai.semenPct}%`;

            if (elLantaiKayu) elLantaiKayu.textContent = cur.lantai.kayu.toLocaleString('id-ID');
            if (barLantaiKayu) barLantaiKayu.style.height = `${cur.lantai.kayuPct}%`;

            if (elLantaiKeramik) elLantaiKeramik.textContent = cur.lantai.keramik.toLocaleString('id-ID');
            if (barLantaiKeramik) barLantaiKeramik.style.height = `${cur.lantai.keramikPct}%`;

            if (elLantaiMarmer) elLantaiMarmer.textContent = cur.lantai.marmer.toLocaleString('id-ID');
            if (barLantaiMarmer) barLantaiMarmer.style.height = `${cur.lantai.marmerPct}%`;
        }

        function renderPeneranganDonutChart(penerangan) {
            const canvas = document.getElementById('peneranganDonutCanvas');
            if (!canvas) return;

            if (typeof Chart !== 'undefined') {
                if (peneranganChartInstance) {
                    try { peneranganChartInstance.destroy(); } catch(e){}
                }
                const ctx = canvas.getContext('2d');
                peneranganChartInstance = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['PLN dengan meteran', 'PLN tanpa meteran', 'Non-PLN'],
                        datasets: [{
                            data: [penerangan.meteran, penerangan.tanpa, penerangan.nonPln],
                            backgroundColor: ['#0284c7', '#f97316', '#10b981'],
                            hoverBackgroundColor: ['#0369a1', '#ea580c', '#059669'],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const total = penerangan.total || (penerangan.meteran + penerangan.tanpa + penerangan.nonPln);
                                        const pct = Math.round((context.raw / total) * 100);
                                        return ' ' + context.label + ': ' + context.raw.toLocaleString('id-ID') + ' (' + pct + '%)';
                                    }
                                }
                            }
                        },
                        cutout: '70%'
                    }
                });
            }
        }

        function refreshDashboardData() {
            const now = new Date();
            const timeStr = 'Update: ' + String(now.getHours()).padStart(2, '0') + '.' + String(now.getMinutes()).padStart(2, '0') + '.' + String(now.getSeconds()).padStart(2, '0');
            const timeEl = document.getElementById('berandaTimeUpdate');
            if (timeEl) timeEl.textContent = timeStr;
            renderDashboard6Desa();
            filterAnalitikDesa(currentAnalitikDesa || 'cijati');
            showToast('🔄 Data Beranda Desa berhasil diperbarui!');
        }

        // SISTEM KELOLA, TAMBAH & EDIT DATA STATISTIK DESA (ADMIN DESA)
        // ==============================================================

        function getSectoralData(villageKey) {
            try {
                const custom = localStorage.getItem('descan_custom_' + villageKey);
                if (custom) {
                    return JSON.parse(custom);
                }
            } catch(e) {}
            const base = descanSectoralData[villageKey] || descanSectoralData.cijati;
            return JSON.parse(JSON.stringify(base));
        }

        function saveSectoralData(villageKey, data) {
            try {
                localStorage.setItem('descan_custom_' + villageKey, JSON.stringify(data));
            } catch(e) {}
            // Also update top village name if modified
            renderDashboardCantik(villageKey);
            showToast('✅ Data statistik ' + (villagesData[villageKey]?.title || 'Desa') + ' berhasil disimpan & grafik diperbarui!');
        }

        
        // ==============================================================
        // FITUR EMBED GOOGLE SPREADSHEET INTERAKTIF PODES
        // ==============================================================
        const PODES_DEFAULT_TEMPLATE_URL = 'https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit?usp=sharing';
        const PODES_DRIVE_FOLDER_URL = 'https://drive.google.com/drive/folders/1X24Nxer7Xva8zCJGjdxvGFjwPfMIN5d6';

        /**
         * Konversi otomatis link Google Sheets agar anti-blokir iframe & rm=minimal
         */
        function convertGoogleSheetsToEmbedUrl(rawUrl) {
            if (!rawUrl || typeof rawUrl !== 'string') return '';
            let url = rawUrl.trim();
            if (!url) return '';

            // 1. Handle link publish Google Sheets (/pubhtml)
            if (url.includes('/pubhtml')) {
                try {
                    const parsed = new URL(url);
                    parsed.searchParams.set('widget', 'true');
                    parsed.searchParams.set('headers', 'false');
                    return parsed.toString();
                } catch (e) {
                    return url + (url.includes('?') ? '&' : '?') + 'widget=true&headers=false';
                }
            }

            // 2. Handle link spreadsheet /spreadsheets/d/{ID}
            const sheetMatch = url.match(/https:\/\/docs\.google\.com\/spreadsheets\/d\/([a-zA-Z0-9-_]+)(.*)/);
            if (sheetMatch) {
                const sheetId = sheetMatch[1];
                const rest = sheetMatch[2] || '';
                let gidPart = '';
                const gidMatch = rest.match(/gid=([0-9]+)/);
                if (gidMatch) {
                    gidPart = `#gid=${gidMatch[1]}`;
                }
                return `https://docs.google.com/spreadsheets/d/${sheetId}/edit?rm=minimal${gidPart}`;
            }

            // 3. Handle link Google Drive file /file/d/{ID}
            const driveFileMatch = url.match(/drive\.google\.com\/file\/d\/([a-zA-Z0-9-_]+)/);
            if (driveFileMatch) {
                const fileId = driveFileMatch[1];
                return `https://docs.google.com/spreadsheets/d/${fileId}/edit?rm=minimal`;
            }

            // 4. Fallback generic /edit
            if (url.includes('/edit')) {
                return url.replace(/\/edit(\?[^#]*)?/, '/edit?rm=minimal');
            }

            return url;
        }

        function getPodesStorageKey(villageKey) {
            const key = (villageKey || currentTargetVillage || currentVillageKey || 'kamisi').toLowerCase().replace(/[^a-z0-9]/g, '');
            return 'podes_sheet_url_' + key;
        }

        function syncPodesSpreadsheetForVillage(villageKey) {
            const key = (villageKey || currentTargetVillage || currentVillageKey || 'kamisi').toLowerCase().replace(/[^a-z0-9]/g, '');
            const vData = (typeof villagesData !== 'undefined' && villagesData[key]) ? villagesData[key] : { title: 'Desa ' + key };
            const desaName = vData.title || ('Desa ' + key.charAt(0).toUpperCase() + key.slice(1));

            // Sync village text everywhere
            document.querySelectorAll('.podes-active-desa-name').forEach(el => el.textContent = desaName);

            // Read localStorage
            const savedUrl = localStorage.getItem(getPodesStorageKey(key)) || '';

            // Update input elements
            const inPage = document.getElementById('podesSheetUrlInput');
            if (inPage) inPage.value = savedUrl;
            const inModal = document.getElementById('modalPodesSheetUrlInput');
            if (inModal) inModal.value = savedUrl;

            // Render iframe or empty state
            const iframePage = document.getElementById('podesSheetIframe');
            const emptyPage = document.getElementById('podesEmptyState');
            const iframeModal = document.getElementById('modalPodesSheetIframe');
            const emptyModal = document.getElementById('modalPodesEmptyState');

            if (savedUrl) {
                const embedUrl = convertGoogleSheetsToEmbedUrl(savedUrl);
                if (iframePage) {
                    if (iframePage.src !== embedUrl) iframePage.src = embedUrl;
                }
                if (emptyPage) emptyPage.classList.add('hidden');

                if (iframeModal) {
                    if (iframeModal.src !== embedUrl) iframeModal.src = embedUrl;
                }
                if (emptyModal) emptyModal.classList.add('hidden');
            } else {
                if (iframePage) iframePage.src = 'about:blank';
                if (emptyPage) emptyPage.classList.remove('hidden');

                if (iframeModal) iframeModal.src = 'about:blank';
                if (emptyModal) emptyModal.classList.remove('hidden');
            }
        }

        function applyPodesSpreadsheetUrl(customUrl = null) {
            const key = (currentTargetVillage || currentVillageKey || 'kamisi').toLowerCase().replace(/[^a-z0-9]/g, '');
            let rawUrl = customUrl;
            if (!rawUrl) {
                const inPage = document.getElementById('podesSheetUrlInput');
                const inModal = document.getElementById('modalPodesSheetUrlInput');
                rawUrl = (inPage && inPage.value) ? inPage.value : (inModal ? inModal.value : '');
            }
            rawUrl = (rawUrl || '').trim();
            if (!rawUrl) {
                alert('Silakan masukkan link Google Spreadsheet terlebih dahulu.');
                return;
            }

            localStorage.setItem(getPodesStorageKey(key), rawUrl);
            syncPodesSpreadsheetForVillage(key);
            if (typeof showToast === 'function') {
                showToast('Link Google Spreadsheet PODES berhasil disimpan!', '📊');
            }
        }

        function loadDefaultPodesTemplate() {
            const key = (currentTargetVillage || currentVillageKey || 'kamisi').toLowerCase().replace(/[^a-z0-9]/g, '');
            localStorage.setItem(getPodesStorageKey(key), PODES_DEFAULT_TEMPLATE_URL);
            syncPodesSpreadsheetForVillage(key);
            if (typeof showToast === 'function') {
                showToast('Template Spreadsheet PODES dimuat!', '📑');
            }
        }

        function openPodesInNewTab() {
            const key = (currentTargetVillage || currentVillageKey || 'kamisi').toLowerCase().replace(/[^a-z0-9]/g, '');
            const savedUrl = localStorage.getItem(getPodesStorageKey(key));
            if (savedUrl) {
                window.open(savedUrl, '_blank');
            } else {
                window.open(PODES_DRIVE_FOLDER_URL, '_blank');
            }
        }

        function clearPodesSpreadsheet() {
            const key = (currentTargetVillage || currentVillageKey || 'kamisi').toLowerCase().replace(/[^a-z0-9]/g, '');
            localStorage.removeItem(getPodesStorageKey(key));
            syncPodesSpreadsheetForVillage(key);
            if (typeof showToast === 'function') {
                showToast('Link Spreadsheet PODES desa ini telah di-reset.', '🔄');
            }
        }

        function clearPodesSheetInput(scope = 'page') {
            if (scope === 'modal') {
                const el = document.getElementById('modalPodesSheetUrlInput');
                if (el) el.value = '';
            } else {
                const el = document.getElementById('podesSheetUrlInput');
                if (el) el.value = '';
            }
        }

        function openManageDataModal(activeTab = 'kpi') {
            switchNavMenu('podes');
        }

        function openPodesModal() {
            const modal = document.getElementById('manageDataModal');
            if (!modal) { switchNavMenu('podes'); return; }
            syncPodesSpreadsheetForVillage(currentTargetVillage);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function closeManageDataModal() {
            const modal = document.getElementById('manageDataModal');
            if (!modal) return;
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        /* Old manage data functions kept as legacy fallback */
        function _legacy_openManageDataModal(activeTab = 'kpi') {

            const modal = document.getElementById('manageDataModal');
            if (!modal) return;
            const curVillage = currentTargetVillage || currentVillageKey || 'kamisi';
            const sData = getSectoralData(curVillage);
            const vData = (typeof villagesData !== 'undefined' && villagesData[curVillage]) ? villagesData[curVillage] : { title: 'Desa Lapolu' };

            // Update title
            const titleEl = document.getElementById('modalAdminDesaTitle');
            if (titleEl) titleEl.textContent = vData.title;

            // Helper to clean string to pure number
            function cleanNum(val, fallback = '0') {
                if (val === undefined || val === null || val === '') return fallback;
                let s = String(val).trim().replace(/[^\d.,]/g, '');
                if (/^\d{1,3}\.\d{3}$/.test(s)) {
                    s = s.replace('.', '');
                } else {
                    s = s.replace(',', '.');
                }
                const parsed = parseFloat(s);
                return isNaN(parsed) ? fallback : String(parsed);
            }

            // Populate KPI inputs with clean numeric values
            const inPop = document.getElementById('inputKpiPop');
            const inKk = document.getElementById('inputKpiKk');
            const inRasio = document.getElementById('inputKpiRasio');
            const inPre = document.getElementById('inputKpiPre');
            const inSex = document.getElementById('inputKpiSexRatio');
            const inP3ke = document.getElementById('inputKpiP3ke');
            const inStunting = document.getElementById('inputKpiStunting');
            const inFaskes = document.getElementById('inputKpiFaskes');

            if (inPop) inPop.value = cleanNum(sData.kpi?.pop, '1264');
            if (inKk) inKk.value = cleanNum(sData.kpi?.kk, '321');
            if (inRasio) inRasio.value = cleanNum(sData.kpi?.rasio, '40.0');
            if (inPre) inPre.value = cleanNum(sData.kpi?.pre, '38');
            if (inSex) inSex.value = cleanNum(sData.kpi?.sexRatio, '100.5');
            if (inP3ke) inP3ke.value = cleanNum(sData.kpi?.p3ke, '3.5');
            if (inStunting) inStunting.value = cleanNum(sData.kpi?.stuntingVal || sData.kpi?.stunting, '2');
            if (inFaskes) inFaskes.value = cleanNum(sData.kpi?.faskes, '4');

            // Populate Bansos inputs
            const b = sData.bansos || [
                { name: 'PKH', count: 480 },
                { name: 'BPNT', count: 370 },
                { name: 'BLT Dana Desa', count: 140 },
                { name: 'Non-Bansos', count: 140 }
            ];
            const inPkh = document.getElementById('inputBansosPkh');
            const inBpnt = document.getElementById('inputBansosBpnt');
            const inBlt = document.getElementById('inputBansosBlt');
            const inNon = document.getElementById('inputBansosNon');
            if (inPkh) inPkh.value = b[0]?.count || 480;
            if (inBpnt) inBpnt.value = b[1]?.count || 370;
            if (inBlt) inBlt.value = b[2]?.count || 140;
            if (inNon) inNon.value = b[3]?.count || 140;

            // Render Dusun Table
            renderModalDusunTable(sData.dusun || []);

            // Populate Disabilitas
            const inDisMale = document.getElementById('inputDisMaleMandiri');
            const inDisFemale = document.getElementById('inputDisFemaleMandiri');
            if (inDisMale) inDisMale.value = sData.disabilitas?.mandiriMale || 95;
            if (inDisFemale) inDisFemale.value = sData.disabilitas?.mandiriFemale || 94;

            // Populate Pendidikan
            const eduVals = sData.pendidikan || [45, 280, 420, 510, 115];
            for (let i = 0; i < 5; i++) {
                const el = document.getElementById('inputEdu' + i);
                if (el) el.value = eduVals[i] || 0;
            }

            // Switch to requested tab
            switchManageModalTab(activeTab);

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function closeManageDataModal() {
            const modal = document.getElementById('manageDataModal');
            if (!modal) return;
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        function switchManageModalTab(tabKey) {
            document.querySelectorAll('.modal-tab-btn').forEach(b => {
                b.classList.remove('active', 'bg-white', 'text-slate-900', 'shadow-xs');
                b.classList.add('bg-white/15', 'text-white');
            });
            const activeBtn = document.getElementById('modal-tab-' + tabKey);
            if (activeBtn) {
                activeBtn.classList.add('active', 'bg-white', 'text-slate-900', 'shadow-xs');
                activeBtn.classList.remove('bg-white/15', 'text-white');
            }
            document.querySelectorAll('.modal-panel-view').forEach(p => p.classList.add('hidden'));
            const activePanel = document.getElementById('modal-panel-' + tabKey);
            if (activePanel) activePanel.classList.remove('hidden');
        }

        function renderModalDusunTable(dusunList) {
            const tbody = document.getElementById('modalDusunTableBody');
            const countEl = document.getElementById('modalDusunCount');
            if (!tbody) return;
            if (countEl) countEl.textContent = `${dusunList.length} Dusun`;

            if (!dusunList.length) {
                tbody.innerHTML = '<tr><td colspan="5" class="p-3 text-center text-slate-400">Belum ada data dusun sasaran.</td></tr>';
                return;
            }

            tbody.innerHTML = dusunList.map((d, idx) => `
                <tr class="hover:bg-slate-50 transition">
                    <td class="p-2.5 font-bold text-slate-900">${d.name}</td>
                    <td class="p-2.5 text-slate-700 font-mono">${(d.pop || 0).toLocaleString('id-ID')}</td>
                    <td class="p-2.5 text-slate-700 font-mono">${(d.kk || 0).toLocaleString('id-ID')}</td>
                    <td class="p-2.5 text-rose-600 font-bold">${d.pre || 0} KK</td>
                    <td class="p-2.5 text-center">
                        <button type="button" onclick="deleteDusunItem(${idx})" class="w-6 h-6 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-600 hover:text-rose-700 inline-flex items-center justify-center text-xs transition cursor-pointer" title="Hapus Dusun">✕</button>
                    </td>
                </tr>
            `).join('');
        }

        function addNewDusunFromModal() {
            const name = document.getElementById('newDusunName')?.value.trim();
            const pop = parseInt(document.getElementById('newDusunPop')?.value, 10) || 0;
            const kk = parseInt(document.getElementById('newDusunKk')?.value, 10) || 0;
            const pre = parseInt(document.getElementById('newDusunPre')?.value, 10) || 0;
            const kerawanan = document.getElementById('newDusunKerawanan')?.value || 'Sedang';

            if (!name) {
                alert('Silakan masukkan nama dusun terlebih dahulu.');
                return;
            }

            const curVillage = currentTargetVillage || currentVillageKey || 'kamisi';
            const sData = getSectoralData(curVillage);
            if (!sData.dusun) sData.dusun = [];

            const newDusun = {
                id: 'dusun_' + Date.now(),
                name: name,
                pop: pop,
                kk: kk,
                pre: pre,
                kerawanan: kerawanan,
                lat: (sData.center ? sData.center[0] : -3.415) + (Math.random() - 0.5) * 0.01,
                lng: (sData.center ? sData.center[1] : 120.998) + (Math.random() - 0.5) * 0.01
            };

            sData.dusun.push(newDusun);
            renderModalDusunTable(sData.dusun);

            // Clear inputs
            document.getElementById('newDusunName').value = '';
            document.getElementById('newDusunPop').value = '';
            document.getElementById('newDusunKk').value = '';
            document.getElementById('newDusunPre').value = '';

            showToast(`✅ Dusun "${name}" berhasil ditambahkan ke daftar!`, '➕');
        }

        function deleteDusunItem(idx) {
            const curVillage = currentTargetVillage || currentVillageKey || 'kamisi';
            const sData = getSectoralData(curVillage);
            if (sData.dusun && sData.dusun[idx]) {
                const deletedName = sData.dusun[idx].name;
                if (!confirm(`Hapus data ${deletedName} dari daftar dusun?`)) return;
                sData.dusun.splice(idx, 1);
                renderModalDusunTable(sData.dusun);
                showToast(`🗑️ Dusun "${deletedName}" telah dihapus.`, '🗑️');
            }
        }

        function saveManageDataForm(e) {
            if (e) e.preventDefault();
            const curVillage = currentTargetVillage || currentVillageKey || 'kamisi';
            const sData = getSectoralData(curVillage);

            // Read numeric KPI values cleanly
            const rawPop = parseFloat(document.getElementById('inputKpiPop')?.value) || 1264;
            const rawKk = parseFloat(document.getElementById('inputKpiKk')?.value) || 321;
            const rawRasio = parseFloat(document.getElementById('inputKpiRasio')?.value) || 40.0;
            const rawPre = parseFloat(document.getElementById('inputKpiPre')?.value) || 38;
            const rawSex = parseFloat(document.getElementById('inputKpiSexRatio')?.value) || 100.5;
            const rawP3ke = parseFloat(document.getElementById('inputKpiP3ke')?.value) || 3.5;
            const rawStunting = parseFloat(document.getElementById('inputKpiStunting')?.value) || 2;
            const rawFaskes = parseFloat(document.getElementById('inputKpiFaskes')?.value) || 4;

            if (!sData.kpi) sData.kpi = {};
            sData.kpi.pop = rawPop.toLocaleString('id-ID');
            sData.kpi.kk = rawKk.toLocaleString('id-ID');
            sData.kpi.rasio = rawRasio.toFixed(1).replace('.', ',') + '%';
            sData.kpi.pre = rawPre.toString();
            sData.kpi.sexRatio = rawSex.toFixed(1).replace('.', ',') + '%';
            sData.kpi.p3ke = rawP3ke.toFixed(1).replace('.', ',') + '%';
            sData.kpi.stunting = rawStunting + ' Balita';
            sData.kpi.stuntingVal = rawStunting;
            sData.kpi.faskes = rawFaskes + ' Unit';

            // Read Bansos
            const pkhVal = parseInt(document.getElementById('inputBansosPkh')?.value, 10) || 480;
            const bpntVal = parseInt(document.getElementById('inputBansosBpnt')?.value, 10) || 370;
            const bltVal = parseInt(document.getElementById('inputBansosBlt')?.value, 10) || 140;
            const nonVal = parseInt(document.getElementById('inputBansosNon')?.value, 10) || 140;

            sData.bansos = [
                { name: 'PKH', count: pkhVal, color: '#005ea6' },
                { name: 'BPNT', count: bpntVal, color: '#10b981' },
                { name: 'BLT Dana Desa', count: bltVal, color: '#e11d48' },
                { name: 'Non-Bansos', count: nonVal, color: '#f59e0b' }
            ];

            // Read Disabilitas
            if (!sData.disabilitas) sData.disabilitas = {};
            sData.disabilitas.mandiriMale = parseInt(document.getElementById('inputDisMaleMandiri')?.value, 10) || 95;
            sData.disabilitas.mandiriFemale = parseInt(document.getElementById('inputDisFemaleMandiri')?.value, 10) || 94;

            // Read Pendidikan
            sData.pendidikan = [];
            for (let i = 0; i < 5; i++) {
                sData.pendidikan.push(parseInt(document.getElementById('inputEdu' + i)?.value, 10) || 0);
            }

            // Save to localStorage
            try {
                localStorage.setItem('descan_custom_' + curVillage, JSON.stringify(sData));
            } catch(e) {}

            // Re-render dashboard
            if (typeof renderDashboardCantik === 'function') {
                renderDashboardCantik(curVillage);
            }
            if (typeof renderDashboard6Desa === 'function') {
                renderDashboard6Desa();
            }

            closeManageDataModal();
            showToast('Data PODES berhasil disimpan dan grafik diperbarui!', '💾');
        }

        function resetSectoralDataToDefault() {
            const curVillage = currentTargetVillage || currentVillageKey || 'kamisi';
            const vData = (typeof villagesData !== 'undefined' && villagesData[curVillage]) ? villagesData[curVillage] : { title: 'Desa' };
            const isConfirmed = confirm(
                `⚠️ KONFIRMASI RESET DATA PODES\n\nApakah Anda yakin ingin mereset seluruh formulir dan grafik untuk ${vData.title} kembali ke nilai standar baku BPS Kolaka Utara?\n\nPerubahan yang telah disimpan akan dikembalikan ke data resmi.`
            );
            if (!isConfirmed) return;

            try {
                localStorage.removeItem('descan_custom_' + curVillage);
            } catch(e) {}
            if (typeof renderDashboardCantik === 'function') {
                renderDashboardCantik(curVillage);
            }
            closeManageDataModal();
            showToast(`🔄 Data PODES ${vData.title} berhasil dikembalikan ke standar resmi BPS!`, '🔄');
        }

        function dcSetSub(key) {
            document.querySelectorAll('.dc-sub-item').forEach(el => el.classList.remove('active'));
            const el = document.getElementById('sub-' + key);
            if (el) el.classList.add('active');
        }
        function dcShowMateri(show) {
            const sub = document.getElementById('dcMateriSub');
            const caret = document.getElementById('dcMateriCaret');
            if (sub) sub.classList.toggle('hidden', !show);
            if (caret) caret.classList.toggle('open', show);
        }
        function toggleMateriMenu() {
            const sub = document.getElementById('dcMateriSub');
            if (currentNavMenu !== 'pembelajaran') {
                dcShowMateri(true);
                switchNavMenu('pembelajaran');
            } else {
                const willOpen = sub ? sub.classList.contains('hidden') : true;
                dcShowMateri(willOpen);
            }
        }
        const DC_MATERI_CHILD = ['video', 'pretest', 'buku'];
        function dcOnMenuChange(menuKey) {
            const isChild = DC_MATERI_CHILD.includes(menuKey);
            const parent = document.getElementById('nav-pembelajaran');
            if (parent) {
                parent.classList.remove('has-active');
                if (isChild) { parent.classList.remove('active'); parent.classList.add('has-active'); }
            }
            dcShowMateri(isChild || menuKey === 'pembelajaran');
            dcSetSub(isChild ? menuKey : '');
            const sb = document.getElementById('dcSidebar');
            if (sb && sb.classList.contains('open')) toggleDcSidebar();
            window.scrollTo({ top: 0 });
            setTimeout(() => { Object.values(dcCharts).forEach(c => { try { c.resize(); } catch (e) {} }); }, 60);
        }

        function toggleDcSidebar() {
            const isDesktop = window.innerWidth >= 1024;
            const body = document.body;
            const sb = document.getElementById('dcSidebar');
            const bd = document.getElementById('dcBackdrop');
            const floatBtn = document.getElementById('btnFloatingSidebarOpen');

            if (isDesktop) {
                body.classList.toggle('sidebar-collapsed');
                const isCollapsed = body.classList.contains('sidebar-collapsed');
                if (floatBtn) {
                    if (isCollapsed) {
                        floatBtn.classList.remove('hidden');
                        floatBtn.classList.add('flex');
                    } else {
                        floatBtn.classList.add('hidden');
                        floatBtn.classList.remove('flex');
                    }
                }
            } else {
                if (!sb) return;
                const isOpen = sb.classList.contains('open');
                if (isOpen) {
                    sb.classList.remove('open');
                    if (bd) bd.classList.add('hidden');
                    if (floatBtn) {
                        floatBtn.classList.remove('hidden');
                        floatBtn.classList.add('flex');
                    }
                } else {
                    sb.classList.add('open');
                    if (bd) bd.classList.remove('hidden');
                    if (floatBtn) {
                        floatBtn.classList.add('hidden');
                        floatBtn.classList.remove('flex');
                    }
                }
            }

            setTimeout(() => {
                if (typeof dcCharts !== 'undefined') {
                    Object.values(dcCharts).forEach(c => { try { c.resize(); } catch (e) {} });
                }
                if (typeof thematicLeafletMap !== 'undefined' && thematicLeafletMap) {
                    thematicLeafletMap.invalidateSize();
                }
            }, 260);
        }
        const dcCharts = {};
        function dcMake(id, cfg) {
            const el = document.getElementById(id);
            if (!el || typeof Chart === 'undefined') return;
            if (dcCharts[id]) dcCharts[id].destroy();
            dcCharts[id] = new Chart(el, cfg);
        }
        function renderDescanHome(villageKey) {
            try {
                const vData = (typeof villagesData !== 'undefined' && villagesData[villageKey]) || {};
                const sData = (typeof getSectoralData === 'function') ? getSectoralData(villageKey) : (descanSectoralData[villageKey] || {});
                const nama = vData.title || 'Desa';
                const set = (id, v) => { const e = document.getElementById(id); if (e) e.textContent = v; };
                set('dcHeroDesaName', nama);
                set('dcMonDesa', nama);
                if (sData.kpi) { set('dcKpiKK', sData.kpi.kk); set('dcKpiJiwa', sData.kpi.pop); }
                if (sData.dusun) set('dcKpiDusun', sData.dusun.length);

                if (typeof Chart === 'undefined') return;
                Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
                Chart.defaults.font.size = 11;
                Chart.defaults.color = '#6b7a74';
                const grid = { color: '#eef2f0' };
                const hijau = '#0f6b4a', mint = '#6ee7b7', amber = '#f59e0b';
                const legend = { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } };

                if (sData.desil) dcMake('dcChartDesil', {
                    type: 'doughnut',
                    data: { labels: ['Desil 1', 'Desil 2', 'Desil 3', 'Desil 4'],
                        datasets: [{ data: [sData.desil.d1, sData.desil.d2, sData.desil.d3, sData.desil.d4],
                            backgroundColor: ['#dc2626', amber, mint, hijau], borderWidth: 2, borderColor: '#fff' }] },
                    options: { maintainAspectRatio: false, cutout: '62%', plugins: { legend } }
                });

                if (sData.dusun) dcMake('dcChartDusun', {
                    type: 'bar',
                    data: { labels: sData.dusun.map(d => d.name),
                        datasets: [
                            { label: 'Penduduk (jiwa)', data: sData.dusun.map(d => d.pop), backgroundColor: hijau, borderRadius: 4, maxBarThickness: 34 },
                            { label: 'Kepala Keluarga', data: sData.dusun.map(d => d.kk), backgroundColor: mint, borderRadius: 4, maxBarThickness: 34 } ] },
                    options: { maintainAspectRatio: false, plugins: { legend },
                        scales: { x: { grid: { display: false } }, y: { grid, beginAtZero: true } } }
                });

                // Data contoh (ganti dengan data pengisian PODES sesungguhnya)
                const klaster = [['Kependudukan & Tenaga Kerja', 12, 12], ['Perumahan & Lingkungan', 10, 10], ['Pertanian & Perikanan', 11, 13], ['Transportasi & Komunikasi', 6, 9]];
                dcMake('dcChartKelengkapan', {
                    type: 'bar',
                    data: { labels: klaster.map(k => k[0]),
                        datasets: [
                            { label: 'Terisi', data: klaster.map(k => k[1]), backgroundColor: hijau, borderRadius: 4 },
                            { label: 'Belum', data: klaster.map(k => k[2] - k[1]), backgroundColor: '#e3e9e6', borderRadius: 4 } ] },
                    options: { indexAxis: 'y', maintainAspectRatio: false, plugins: { legend },
                        scales: { x: { stacked: true, grid, beginAtZero: true }, y: { stacked: true, grid: { display: false } } } }
                });
                dcMake('dcChartSkor', {
                    type: 'line',
                    data: { labels: ['Sesi 1', 'Sesi 2', 'Sesi 3', 'Sesi 4', 'Sesi 5'],
                        datasets: [
                            { label: 'Pre-test', data: [62, 68, 71, 74, 78], borderColor: amber, backgroundColor: amber, tension: .35, pointRadius: 3 },
                            { label: 'Post-test', data: [74, 80, 84, 86, 88.5], borderColor: hijau, backgroundColor: 'rgba(15,107,74,.10)', fill: true, tension: .35, pointRadius: 3 } ] },
                    options: { maintainAspectRatio: false, plugins: { legend },
                        scales: { x: { grid: { display: false } }, y: { grid, min: 50, max: 100 } } }
                });
            } catch (e) { console.warn('renderDescanHome:', e); }
        }

        function renderDashboardCantik(villageKey, filterDusun = 'all', filterYear = '2026') {
            if (typeof renderDescanHome === 'function') renderDescanHome(villageKey);
            const vData = villagesData[villageKey] || villagesData.cijati;
            const sData = (typeof getSectoralData === 'function') ? getSectoralData(villageKey) : (descanSectoralData[villageKey] || descanSectoralData.cijati);

            // 1. Update Header Info
            const topBadgeEl = document.getElementById('topNavVillageBadge');
            if (topBadgeEl) {
                topBadgeEl.textContent = (vData.title || 'Desa Cijati').toUpperCase();
            }

            // Populate Dusun Dropdown if needed
            const wilSelect = document.getElementById('dashFilterWilayah');
            if (wilSelect && (!wilSelect.dataset || !wilSelect.dataset.currentDesa || wilSelect.dataset.currentDesa !== villageKey)) {
                populateDashDusunOptions(villageKey, filterDusun);
                if (!wilSelect.dataset) wilSelect.dataset = {};
                wilSelect.dataset.currentDesa = villageKey;
            }

            // Multiplier for dusun filtering
            let multiplier = 1.0;
            let activeDusunObj = null;
            if (filterDusun !== 'all' && sData.dusun) {
                activeDusunObj = sData.dusun.find(d => d.id === filterDusun);
                if (activeDusunObj) {
                    multiplier = activeDusunObj.pop / parseInt(String(sData.kpi.pop).replace('.', ''), 10);
                }
            }

            // 2. Update 5 KPI Cards (Matching Reference: Total Penduduk, Jumlah KK, Sex Ratio, Penduduk Miskin P3KE, Kasus Stunting)
            const popEl = document.getElementById('dashKpiTotalPenduduk');
            const kkEl = document.getElementById('dashKpiTotalKeluarga');
            const sexEl = document.getElementById('dashKpiSexRatio');
            const miskinEl = document.getElementById('dashKpiPendudukMiskin');
            const stuntingEl = document.getElementById('dashKpiStunting');

            if (activeDusunObj) {
                if (popEl) popEl.textContent = activeDusunObj.pop.toLocaleString('id-ID');
                if (kkEl) kkEl.textContent = activeDusunObj.kk.toLocaleString('id-ID');
                if (sexEl) sexEl.textContent = sData.kpi.sexRatio || '98,5%';
                if (miskinEl) miskinEl.textContent = sData.kpi.p3ke || '3,2%';
                if (stuntingEl) stuntingEl.textContent = Math.round((sData.kpi.stuntingVal || 14) * multiplier);
            } else {
                if (popEl) popEl.textContent = sData.kpi.pop || '24.150';
                if (kkEl) kkEl.textContent = sData.kpi.kk || '6.840';
                if (sexEl) sexEl.textContent = sData.kpi.sexRatio || '98,5%';
                if (miskinEl) miskinEl.textContent = sData.kpi.p3ke || '3,2%';
                if (stuntingEl) stuntingEl.textContent = (sData.kpi.stuntingVal || sData.kpi.stunting || '14');
            }

            // 3. Render Piramida Penduduk (Mirrored Horizontal Bar Chart with Male/Female)
            const piramidaContainer = document.getElementById('piramidaChartContainer');
            if (piramidaContainer && sData.piramida) {
                const maxVal = 600;
                let rowsHtml = '<div class="space-y-1 w-full text-[10px] font-bold select-none">';
                sData.piramida.forEach(item => {
                    const mCount = Math.round(item.m * multiplier);
                    const fCount = Math.round(item.f * multiplier);
                    const mPct = Math.min(100, (mCount / maxVal) * 100);
                    const fPct = Math.min(100, (fCount / maxVal) * 100);

                    rowsHtml += `
                    <div class="grid grid-cols-12 gap-1 items-center py-0.5 group hover:bg-slate-50 rounded transition">
                        <!-- Male Bar (Extending leftward) -->
                        <div class="col-span-5 flex justify-end items-center pr-1">
                            <div class="w-full bg-slate-100/60 rounded-xs h-3.5 flex justify-end overflow-hidden">
                                <div class="bg-[#005ea6] hover:bg-[#004e8a] h-full rounded-xs transition-all duration-500 flex items-center justify-end pr-1 text-[8px] text-white font-extrabold" style="width: ${mPct}%;">
                                    ${mCount > 180 ? mCount : ''}
                                </div>
                            </div>
                        </div>
                        <!-- Center Age Bracket Label -->
                        <div class="col-span-2 text-center text-slate-700 font-extrabold text-[9px] whitespace-nowrap">
                            ${item.age}
                        </div>
                        <!-- Female Bar (Extending rightward) -->
                        <div class="col-span-5 flex justify-start items-center pl-1">
                            <div class="w-full bg-slate-100/60 rounded-xs h-3.5 flex justify-start overflow-hidden">
                                <div class="bg-[#e11d48] hover:bg-[#be123c] h-full rounded-xs transition-all duration-500 flex items-center justify-start pl-1 text-[8px] text-white font-extrabold" style="width: ${fPct}%;">
                                    ${fCount > 180 ? fCount : ''}
                                </div>
                            </div>
                        </div>
                    </div>`;
                });

                // Axis Ticks at bottom: 600 400 200 0 200 400 600
                rowsHtml += `
                <div class="grid grid-cols-12 gap-1 pt-2 border-t border-slate-200 text-[8px] font-bold text-slate-400 text-center">
                    <div class="col-span-5 flex justify-between px-1">
                        <span>600</span>
                        <span>400</span>
                        <span>200</span>
                    </div>
                    <div class="col-span-2 font-black text-slate-600">0</div>
                    <div class="col-span-5 flex justify-between px-1">
                        <span>200</span>
                        <span>400</span>
                        <span>600</span>
                    </div>
                </div>
                </div>`;
                piramidaContainer.innerHTML = rowsHtml;
            }

            renderDashboardVisualCharts(villageKey);
            // 4. Render Donut Chart Status Kesejahteraan (Desil P3KE)
            renderDesilDonutChart(sData);

            // 5. Render Pendidikan Terakhir yang Ditamatkan (Vertical Bar Chart)
            const pendidikanContainer = document.getElementById('pendidikanChartContainer');
            if (pendidikanContainer && sData.pendidikan) {
                const maxEdu = 160;
                let eduHtml = '<div class="w-full flex items-end justify-around gap-2 h-36 pb-2 border-b border-slate-200">';
                sData.pendidikan.forEach(edu => {
                    const count = Math.round(edu.val * multiplier);
                    const pct = Math.min(100, (count / maxEdu) * 100);
                    eduHtml += `
                    <div class="flex flex-col items-center flex-1 max-w-[60px] h-full justify-end group">
                        <span class="text-[9px] font-black text-slate-700 mb-1 opacity-0 group-hover:opacity-100 transition">${count}</span>
                        <div class="w-full bg-slate-100 rounded-t-lg overflow-hidden flex flex-col justify-end shadow-xs hov">
                            <div class="bg-gradient-to-t from-[#005ea6] to-[#0ea5e9] w-full rounded-t-lg transition-all duration-500" style="height: ${pct}%;"></div>
                        </div>
                        <span class="text-[9px] font-bold text-slate-700 mt-1.5 text-center truncate max-w-full" title="${edu.label}">${edu.label}</span>
                    </div>`;
                });
                eduHtml += '</div>';
                pendidikanContainer.innerHTML = eduHtml;
            }

            // 6. Render Pekerjaan Utama Warga (Horizontal Bar Chart)
            const pekerjaanContainer = document.getElementById('pekerjaanChartContainer');
            if (pekerjaanContainer) {
                const jobs = sData.pekerjaan || [
                    { name: "Karyawan Swasta", pct: 36 },
                    { name: "Wiraswasta", pct: 28 },
                    { name: "Buruh / Petani", pct: 22 },
                    { name: "IRT", pct: 9 },
                    { name: "Belum/Tidak Bekerja", pct: 5 }
                ];
                let pHtml = '<div class="space-y-2.5 w-full text-xs font-bold">';
                jobs.forEach(j => {
                    pHtml += `
                    <div>
                        <div class="flex justify-between items-center text-[10px] text-slate-700 font-bold mb-0.5">
                            <span>${j.name}</span>
                            <span class="text-slate-500">${j.pct}%</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">
                            <div class="bg-[#005ea6] hover:bg-[#004e8a] h-full rounded-full transition-all duration-500" style="width: ${j.pct}%;"></div>
                        </div>
                    </div>`;
                });
                pHtml += '</div>';
                pekerjaanContainer.innerHTML = pHtml;
            }

            // 7. Update Thematic Leaflet Map
            initOrUpdateThematicMap(villageKey, filterDusun);
        }

        // Global Chart Instances for Dashboard Visuals
        let dashKomoditasChartInstance = null;
        let dashFasilitasChartInstance = null;
        let dashBansosChartInstance = null;

        function renderDashboardVisualCharts(villageKey) {
            if (typeof Chart === 'undefined') return;

            // 1. Chart Komoditas Unggulan & Mata Pencaharian
            const cKomoditas = document.getElementById('dashKomoditasCanvas');
            if (cKomoditas) {
                if (dashKomoditasChartInstance) {
                    try { dashKomoditasChartInstance.destroy(); } catch(e){}
                }
                const ctxK = cKomoditas.getContext('2d');
                dashKomoditasChartInstance = new Chart(ctxK, {
                    type: 'doughnut',
                    data: {
                        labels: ['Kakao (Perkebunan)', 'Cengkeh & Nilam', 'Perikanan & Nelayan', 'Pedagang / UMKM', 'Jasa & Lainnya'],
                        datasets: [{
                            data: [42, 22, 16, 12, 8],
                            backgroundColor: ['#0E7C5A', '#0284c7', '#06b6d4', '#f59e0b', '#64748b'],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    boxWidth: 12,
                                    padding: 12,
                                    font: { size: 11, weight: 'bold' }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: (ctx) => ' ' + ctx.label + ': ' + ctx.raw + '%'
                                }
                            }
                        }
                    }
                });
            }

            // 2. Chart Fasilitas Dasar & Hunian Layak
            const cFasilitas = document.getElementById('dashFasilitasCanvas');
            if (cFasilitas) {
                if (dashFasilitasChartInstance) {
                    try { dashFasilitasChartInstance.destroy(); } catch(e){}
                }
                const ctxF = cFasilitas.getContext('2d');
                dashFasilitasChartInstance = new Chart(ctxF, {
                    type: 'bar',
                    data: {
                        labels: ['Air Bersih Layak', 'Listrik PLN', 'Jamban Sehat', 'Rumah Layak Huni'],
                        datasets: [{
                            label: 'Persentase Capaian (%)',
                            data: [92, 98, 89, 87],
                            backgroundColor: ['#0284c7', '#0E7C5A', '#10b981', '#f59e0b'],
                            borderRadius: 8
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                min: 0,
                                max: 100,
                                ticks: { callback: v => v + '%' }
                            }
                        },
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: (ctx) => ' ' + ctx.raw + '% Kepala Keluarga (KK)'
                                }
                            }
                        }
                    }
                });
            }

            // 3. Chart Bansos & Jaminan Kesehatan
            const cBansos = document.getElementById('dashBansosCanvas');
            if (cBansos) {
                if (dashBansosChartInstance) {
                    try { dashBansosChartInstance.destroy(); } catch(e){}
                }
                const ctxB = cBansos.getContext('2d');
                dashBansosChartInstance = new Chart(ctxB, {
                    type: 'bar',
                    data: {
                        labels: ['BPJS / JKN', 'Bansos PKH/BPNT', 'Adminduk KTP/KIA', 'Balita Sehat Bebas Stunting'],
                        datasets: [{
                            label: 'Capaian Perlindungan (%)',
                            data: [86, 18, 99, 99.3],
                            backgroundColor: ['#8b5cf6', '#ec4899', '#0284c7', '#10b981'],
                            borderRadius: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                min: 0,
                                max: 100,
                                ticks: { callback: v => v + '%' }
                            }
                        },
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: (ctx) => ' ' + ctx.raw + '% Populasi'
                                }
                            }
                        }
                    }
                });
            }
        }

        // Global Chart Instance Holder

        function renderDesilDonutChart(sData) {
            const canvas = document.getElementById('desilDonutCanvas');
            if (!canvas) return;

            const desilData = sData.desil || { d1: 25.9, d2: 18.7, d3: 21.1, d4: 34.3 };

            if (typeof Chart !== 'undefined') {
                if (desilChartInstance) {
                    try { desilChartInstance.destroy(); } catch(e){}
                }
                const ctx = canvas.getContext('2d');
                desilChartInstance = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Desil 1', 'Desil 2', 'Desil 3', 'Desil 4'],
                        datasets: [{
                            data: [desilData.d1, desilData.d2, desilData.d3, desilData.d4],
                            backgroundColor: ['#0d9488', '#f97316', '#ef4444', '#0284c7'],
                            hoverBackgroundColor: ['#0f766e', '#ea580c', '#dc2626', '#0369a1'],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return ' ' + context.label + ': ' + context.raw + '%';
                                    }
                                }
                            }
                        },
                        cutout: '62%'
                    }
                });
            } else {
                canvas.parentElement.innerHTML = `
                <div class="flex items-center justify-center">
                    <svg viewBox="0 0 42 42" class="w-48 h-48">
                        <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#0d9488" stroke-width="6" stroke-dasharray="25.9 74.1" stroke-dashoffset="25"></circle>
                        <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#f97316" stroke-width="6" stroke-dasharray="18.7 81.3" stroke-dashoffset="99.1"></circle>
                        <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#ef4444" stroke-width="6" stroke-dasharray="21.1 78.9" stroke-dashoffset="80.4"></circle>
                        <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#0284c7" stroke-width="6" stroke-dasharray="34.3 65.7" stroke-dashoffset="59.3"></circle>
                    </svg>
                </div>
                `;
            }
        }

        function scrollToDashSection(targetId) {
            if (targetId === 'sectionPeta') {
                if (currentNavMenu !== 'tentang') {
                    switchNavMenu('tentang');
                }
                setTimeout(() => {
                    const el = document.getElementById('sectionPeta');
                    if (el) {
                        el.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        el.classList.add('ring-4', 'ring-emerald-500/80', 'transition-all', 'duration-500');
                        setTimeout(() => el.classList.remove('ring-4', 'ring-emerald-500/80'), 2500);
                        if (typeof thematicLeafletMap !== 'undefined' && thematicLeafletMap) {
                            thematicLeafletMap.invalidateSize();
                        }
                    }
                }, 200);
                return;
            }
            if (currentNavMenu !== 'dashboard') {
                switchNavMenu('dashboard');
                setTimeout(() => {
                    const el = document.getElementById(targetId);
                    if (el) {
                        el.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        el.classList.add('ring-4', 'ring-[#005ea6]/80', 'transition-all', 'duration-500');
                        setTimeout(() => el.classList.remove('ring-4', 'ring-[#005ea6]/80'), 2500);
                    }
                }, 220);
                return;
            }
            const el = document.getElementById(targetId);
            if (el) {
                el.scrollIntoView({ behavior: 'smooth', block: 'center' });
                el.classList.add('ring-4', 'ring-[#005ea6]/80', 'transition-all', 'duration-500');
                setTimeout(() => el.classList.remove('ring-4', 'ring-[#005ea6]/80'), 2500);
            }
        }

        // ==========================================
        // SIDEBAR ACTION MODALS (METADATA, AGEN, PST, LAYANAN)
        // ==========================================
        function openMetadataModal() {
            const m = document.getElementById('metadataStatistikModal');
            if (m) { m.classList.remove('hidden'); m.classList.add('flex'); }
        }
        function closeMetadataModal() {
            const m = document.getElementById('metadataStatistikModal');
            if (m) { m.classList.add('hidden'); m.classList.remove('flex'); }
        }

        function openAgenDesaModal() {
            const m = document.getElementById('agenDesaModal');
            if (m) { m.classList.remove('hidden'); m.classList.add('flex'); }
        }
        function closeAgenDesaModal() {
            const m = document.getElementById('agenDesaModal');
            if (m) { m.classList.add('hidden'); m.classList.remove('flex'); }
        }

        function openPstModal() {
            const m = document.getElementById('pstBpsModal');
            if (m) { m.classList.remove('hidden'); m.classList.add('flex'); }
        }
        function closePstModal() {
            const m = document.getElementById('pstBpsModal');
            if (m) { m.classList.add('hidden'); m.classList.remove('flex'); }
        }

        function openLayananModal() {
            const m = document.getElementById('layananModal');
            if (m) { m.classList.remove('hidden'); m.classList.add('flex'); }
        }
        function closeLayananModal() {
            const m = document.getElementById('layananModal');
            if (m) { m.classList.add('hidden'); m.classList.remove('flex'); }
        }

        
        function resetThematicMapView() {
            const curVillage = currentTargetVillage || 'kalukaluku';
            const sData = (typeof getSectoralData === 'function') ? getSectoralData(curVillage) : (descanSectoralData[curVillage] || descanSectoralData.kalukaluku);
            const center = sData?.center || [-3.420, 121.005];
            if (thematicLeafletMap) {
                thematicLeafletMap.setView(center, 13);
                thematicLeafletMap.invalidateSize();
                showToast('🎯 Peta tematik ' + (villagesData[curVillage]?.title || 'Desa') + ' dipusatkan.');
            }
        }

        function initOrUpdateThematicMap(villageKey, filterDusun = 'all') {
            const mapContainer = document.getElementById('thematicVillageMap');
            if (!mapContainer) return;

            const sData = (typeof getSectoralData === 'function') ? getSectoralData(villageKey) : (descanSectoralData[villageKey] || descanSectoralData.cijati);
            const center = sData.center || [-3.225, 121.048];

            if (typeof L === 'undefined') {
                // Leaflet fallback - styled SVG map canvas
                mapContainer.innerHTML = `
                    <div class="w-full h-full flex flex-col items-center justify-center bg-slate-100 p-4 text-center">
                        <svg viewBox="0 0 200 200" class="w-36 h-36">
                            <polygon points="40,30 160,20 180,90 150,170 60,180 20,110" fill="#fef08a" stroke="#f59e0b" stroke-width="2"/>
                            <polygon points="70,50 140,40 150,100 120,150 70,140" fill="#fb923c" opacity="0.8"/>
                            <polygon points="90,70 125,65 130,110 100,125" fill="#ef4444" opacity="0.9"/>
                            <circle cx="105" cy="85" r="5" fill="#991b1b" stroke="#fff" stroke-width="1.5"/>
                            <circle cx="120" cy="100" r="4" fill="#991b1b" stroke="#fff" stroke-width="1"/>
                            <circle cx="85" cy="115" r="4" fill="#991b1b" stroke="#fff" stroke-width="1"/>
                        </svg>
                        <span class="text-[10px] font-black text-slate-700 mt-2">${villagesData[villageKey].title} • Peta Tematik SDI</span>
                    </div>
                `;
                return;
            }

            if (!thematicLeafletMap) {
                thematicLeafletMap = L.map('thematicVillageMap', {
                    center: center,
                    zoom: 13,
                    zoomControl: false,
                    attributionControl: false
                });

                L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
                    maxZoom: 19
                }).addTo(thematicLeafletMap);

                thematicLayersGroup = L.layerGroup().addTo(thematicLeafletMap);
            }

            // Update View & Layers
            if (thematicLayersGroup) {
                thematicLayersGroup.clearLayers();
            } else if (thematicLeafletMap && typeof L !== 'undefined') {
                thematicLayersGroup = L.layerGroup().addTo(thematicLeafletMap);
            }
            if (thematicLeafletMap) {
                thematicLeafletMap.setView(center, filterDusun === 'all' ? 13 : 14);
            }

            // Draw Thematic Density Polygon Zones
            const [cLat, cLng] = center;
            
            // Outer Zone: Rendah (< 500)
            const outerZone = L.polygon([
                [cLat + 0.025, cLng - 0.030],
                [cLat + 0.020, cLng + 0.035],
                [cLat - 0.005, cLng + 0.040],
                [cLat - 0.025, cLng + 0.015],
                [cLat - 0.020, cLng - 0.025],
                [cLat + 0.005, cLng - 0.035]
            ], {
                color: '#ca8a04',
                weight: 1.5,
                fillColor: '#fef08a',
                fillOpacity: 0.65
            }).bindTooltip("Zona Kepadatan Rendah (&lt; 500 KK)", { sticky: true });
            thematicLayersGroup.addLayer(outerZone);

            // Middle Zone: Sedang (500 - 1000)
            const midZone = L.polygon([
                [cLat + 0.014, cLng - 0.018],
                [cLat + 0.012, cLng + 0.020],
                [cLat - 0.008, cLng + 0.018],
                [cLat - 0.015, cLng - 0.010],
                [cLat + 0.000, cLng - 0.020]
            ], {
                color: '#ea580c',
                weight: 1.5,
                fillColor: '#fb923c',
                fillOpacity: 0.7
            }).bindTooltip("Zona Kepadatan Sedang (500 - 1000 KK)", { sticky: true });
            thematicLayersGroup.addLayer(midZone);

            // Core Zone: Tinggi (> 1000)
            const coreZone = L.polygon([
                [cLat + 0.006, cLng - 0.008],
                [cLat + 0.005, cLng + 0.009],
                [cLat - 0.005, cLng + 0.008],
                [cLat - 0.007, cLng - 0.006]
            ], {
                color: '#b91c1c',
                weight: 2,
                fillColor: '#ef4444',
                fillOpacity: 0.8
            }).bindTooltip("Zona Kepadatan Tinggi (&gt; 1000 KK Sasaran)", { sticky: true });
            thematicLayersGroup.addLayer(coreZone);

            // Scatter Red Dots for Dusun Clusters & Households
            sData.dusun.forEach((d, idx) => {
                const markerColor = (filterDusun === d.id) ? '#2563eb' : '#991b1b';
                const pulseCircle = L.circleMarker([d.lat, d.lng], {
                    radius: (filterDusun === d.id) ? 9 : 7,
                    fillColor: markerColor,
                    color: '#ffffff',
                    weight: 2,
                    opacity: 1,
                    fillOpacity: 0.95
                });

                pulseCircle.bindPopup(`
                    <div class="p-2 text-xs">
                        <b class="text-slate-900 text-sm block">${d.name}</b>
                        <span class="text-slate-500 block mt-0.5">Penduduk: <b>${d.pop} Jiwa</b> (${d.kk} KK)</span>
                        <span class="text-amber-800 font-bold block mt-0.5">Pre-Sejahtera: ${d.pre} KK</span>
                        <div class="mt-1 px-2 py-0.5 rounded text-[10px] font-black inline-block ${d.kerawanan === 'Tinggi' ? 'bg-red-100 text-red-800' : 'bg-amber-100 text-amber-800'}">
                            Kerawanan: ${d.kerawanan}
                        </div>
                    </div>
                `);
                thematicLayersGroup.addLayer(pulseCircle);

                // Add sample household dots around each dusun
                const offsets = [
                    [0.002, 0.003], [-0.003, 0.002], [0.001, -0.004], [-0.002, -0.002],
                    [0.004, -0.001], [-0.001, 0.005], [0.003, 0.002]
                ];
                offsets.forEach(off => {
                    const hDot = L.circleMarker([d.lat + off[0], d.lng + off[1]], {
                        radius: 3.5,
                        fillColor: '#dc2626',
                        color: '#fef2f2',
                        weight: 1,
                        opacity: 0.9,
                        fillOpacity: 0.85
                    });
                    thematicLayersGroup.addLayer(hDot);
                });
            });

            setTimeout(() => {
                if (thematicLeafletMap) thematicLeafletMap.invalidateSize();
            }, 100);
        }

        // CSV Microdata Excel Generator (UTF-8 with BOM for instant Excel opening)
        function downloadMicroDataExcel() {
            const vData = villagesData[currentTargetVillage] || villagesData.cijati;
            const sData = (typeof getSectoralData === 'function') ? getSectoralData(currentTargetVillage) : (descanSectoralData[currentTargetVillage] || descanSectoralData.cijati);
            const wilSelect = document.getElementById('dashFilterWilayah');
            const thnSelect = document.getElementById('dashFilterTahun');
            const activeWil = wilSelect ? wilSelect.value : 'all';
            const activeThn = thnSelect ? thnSelect.value : '2026';

            let csvContent = "\uFEFF"; // UTF-8 BOM
            csvContent += `DAFTAR DATA MIKRO REGSOSEK & MONOGRAFI DESA CANTIK BPS\r\n`;
            csvContent += `DESA:;${vData.title};KABUPATEN:;KOLAKA UTARA;TAHUN:;${activeThn}\r\n`;
            csvContent += `SUMBER:;Badan Pusat Statistik (BPS) RI - Program Desa Cantik\r\n\r\n`;
            csvContent += `No;Kode_Keluarga;Nama_Kepala_Keluarga;Dusun;Jumlah_Anggota;Desil_Kesejahteraan;Bantuan_Sosial;Status_Disabilitas;Pendidikan_Tertinggi_KK;Status_Geotagging\r\n`;

            const sampleNames = [
                "Baharuddin", "Syamsul Maarif", "H. Mansyur", "Arif Rahman", "Nurhidayah",
                "Rustam Efendi", "M. Yusuf", "Siti Aminah", "Ilyas Pratama", "Andi Samsul",
                "Kasman", "Hasbullah", "Iskandar", "Mariana", "Sudirman", "Agus Salim",
                "H. Basri", "Rahmanuddin", "Faisal Akbar", "Zulkifli", "Hamsah", "Wardiman",
                "Burhan", "Syahrir", "Nasruddin", "Hamid", "Suwardi", "Ambo Dalle", "Mustamin", "Darwis"
            ];
            const desils = ["Desil 1 (Sangat Miskin)", "Desil 2 (Miskin)", "Desil 3 (Hampir Miskin)", "Desil 4 (Rentan)"];
            const bansosTypes = ["PKH + BPNT", "BPNT + BLT-DD", "BLT-DD", "Non-Bansos (Mandiri)"];
            const educations = ["SD / Sederajat", "SMP / Sederajat", "SMA / SMK", "Perguruan Tinggi", "Tidak/Belum Sekolah"];
            const disStatus = ["Mandiri", "Mandiri", "Mandiri", "Rentan Fisik/Lansia", "Disabilitas"];

            let rowCount = 1;
            sData.dusun.forEach(d => {
                if (activeWil !== 'all' && activeWil !== d.id) return;
                for (let i = 0; i < 7; i++) {
                    const name = sampleNames[(rowCount * 3 + i) % sampleNames.length];
                    const code = `KK-${currentTargetVillage.substring(0,3).toUpperCase()}-2026-${String(rowCount).padStart(4, '0')}`;
                    const desil = desils[(rowCount + i) % desils.length];
                    const bansos = bansosTypes[(rowCount * 2 + i) % bansosTypes.length];
                    const edu = educations[(rowCount + i) % educations.length];
                    const dis = disStatus[(rowCount + i) % disStatus.length];
                    const lat = (d.lat + (i * 0.001 - 0.003)).toFixed(5);
                    const lng = (d.lng + (i * 0.001 - 0.003)).toFixed(5);

                    csvContent += `${rowCount};${code};${name};${d.name};${3 + (i % 4)};${desil};${bansos};${dis};${edu};Terverifikasi (${lat}, ${lng})\r\n`;
                    rowCount++;
                }
            });

            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement("a");
            const url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", `Data_Mikro_${vData.title.replace(/\s+/g, '_')}_${activeThn}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        
        // ===== 3D PROFIL DESA CONTROLLER & TILT ENGINE =====
        function renderProfilDesa3D(villageKey) {
            if (!villageKey) villageKey = currentTargetVillage || currentVillageKey || 'kamisi';
            const vData = (typeof villagesData !== 'undefined' && villagesData[villageKey]) ? villagesData[villageKey] : (villagesData?.kamisi || {});
            const sData = (typeof getSectoralData === 'function') ? getSectoralData(villageKey) : (descanSectoralData[villageKey] || {});

            const set = (id, val) => { const el = document.getElementById(id); if (el) el.textContent = val; };
            const setSrc = (id, val) => { const el = document.getElementById(id); if (el && val) el.src = val; };

            set('profil3dHeroDesaName', vData.title || 'Desa');
            set('profil3dHeroKecamatan', `Kecamatan ${vData.kec || 'Kodeoha'}, Kabupaten Kolaka Utara • Terintegrasi Potensi Desa (PODES) 2025 BPS RI`);
            set('profil3dBadgeKategori', vData.kategori || 'Desa Mandiri');
            set('profil3dDesc', vData.desc || 'Kawasan binaan Desa Cantik Badan Pusat Statistik Kabupaten Kolaka Utara.');
            set('profil3dCatatanBps', vData.catatanBps || 'Terus tingkatkan kelengkapan data statistik sektoral dan monografi desa.');
            
            // Metrics
            set('profil3dLuas', vData.luas || '14,80 km²');
            set('profil3dPop', vData.pop || (sData.kpi?.pop ? sData.kpi.pop + ' Jiwa' : '1.576 Jiwa'));
            set('profil3dKK', sData.kpi?.kk ? sData.kpi.kk + ' KK' : '394 KK');
            set('profil3dDusunCount', `${vData.dusunCount || (sData.dusun?.length || 3)} Dusun • ${vData.rtCount || 8} RT`);
            set('profil3dKomoditas', vData.komoditas || 'Kakao, Kelapa, Perikanan');
            set('profil3dAgri', vData.agri || 'Sentra Komoditas Unggulan');

            // Batas Administrasi
            if (vData.batas) {
                set('profil3dBatasUtara', vData.batas.utara || '-');
                set('profil3dBatasSelatan', vData.batas.selatan || '-');
                set('profil3dBatasBarat', vData.batas.barat || '-');
                set('profil3dBatasTimur', vData.batas.timur || '-');
            }

            // Dusun List
            const dusunContainer = document.getElementById('profil3dDusunList');
            if (dusunContainer && sData.dusun) {
                dusunContainer.innerHTML = sData.dusun.map((d, idx) => `
                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-200 text-xs flex items-center justify-between hover:bg-white hover:border-emerald-300 transition shadow-2xs">
                        <div class="flex items-center gap-3 min-w-0">
                            <span class="w-8 h-8 rounded-lg bg-emerald-100 text-[#0f6b4a] font-extrabold flex items-center justify-center text-xs shrink-0">${idx+1}</span>
                            <div class="truncate">
                                <div class="font-extrabold text-slate-900 truncate">${d.name}</div>
                                <div class="text-[11px] text-slate-500 font-medium">${d.kk} KK • ${d.pop} Jiwa</div>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full shrink-0 ${d.kerawanan === 'Tinggi' ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800'}">${d.kerawanan === 'Tinggi' ? 'Kerawanan Tinggi' : 'Kerawanan Rendah'}</span>
                    </div>
                `).join('');
            }

            // Background Photos
            if (vData.photo || vData.heroBg) {
                setSrc('profil3dHeroPhoto', vData.photo || vData.heroBg);
                setSrc('profil3dLandscapeBg', vData.heroBg || vData.photo);
            }

            attach3DTiltListeners();

            // Initialize or update Leaflet WebGIS Map for current village
            setTimeout(() => {
                if (typeof initOrUpdateThematicMap === 'function') {
                    initOrUpdateThematicMap(villageKey);
                }
            }, 120);
        }

        function attach3DTiltListeners() {
            // Clean, non-intrusive hover interaction without aggressive 3D perspective
        }

        function switchVillage(key) {
            if (!key) key = 'kalukaluku';
            const data = villagesData[key] || villagesData.kalukaluku;
            currentVillageKey = key;
            currentTargetVillage = key;

            // 1. Top Navigation & Brand Bars
            const brandTitle = document.getElementById('topBrandDesaTitle');
            if (brandTitle) brandTitle.textContent = (data.title || 'DESA').toUpperCase();
            const brandKec = document.getElementById('topBrandDesaKec');
            if (brandKec) brandKec.textContent = '(Kec. ' + (data.kec || 'Kodeoha') + ') • Terbina BPS';
            const topBadge = document.getElementById('topNavVillageBadge');
            if (topBadge) topBadge.textContent = (data.title || 'Desa').toUpperCase();

            // 2. Hero Landscape Banner Profil Desa
            const heroTag = document.getElementById('heroBannerDesaTag');
            if (heroTag) heroTag.textContent = `Dashboard & Profil ${data.title}`;
            const heroName = document.getElementById('heroBannerDesaName');
            if (heroName) heroName.textContent = data.title;
            const heroKec = document.getElementById('heroBannerKec');
            if (heroKec) heroKec.textContent = 'Kec. Kodeoha, Kab. Kolaka Utara';
            const heroKat = document.getElementById('heroBannerKategori');
            if (heroKat) heroKat.textContent = data.kategori || 'Pilot Utama Mandiri';
            const heroBg = document.getElementById('heroTentangBg');
            if (heroBg && data.heroBg) heroBg.src = data.heroBg;

            // 3. Monografi Title
            const elDesaTitle = document.getElementById('desaTitle');
            if (elDesaTitle) elDesaTitle.textContent = `Profil, Monografi, & Potensi ${data.title}`;

            // 4. Update Sectoral Data & Charts
            renderDashboardCantik(key);
            if (typeof syncPodesSpreadsheetForVillage === 'function') {
                syncPodesSpreadsheetForVillage(key);
            }
            if (currentNavMenu === 'galeri' && typeof renderPageGaleriPhotos === 'function') {
                renderPageGaleriPhotos('all', '');
            }
        }

        function switchPemTab(tab) {
            currentPemTab = tab;
            const kur = document.getElementById('pemContent-kurikulum');
            const mat = document.getElementById('pemContent-materi');
            const pan = document.getElementById('pemContent-panduan-excel');
            const vid = document.getElementById('pemContent-video');
            const eva = document.getElementById('pemContent-evaluasi');

            const btnPan = document.getElementById('pemTab-panduan-excel');
            const btnVid = document.getElementById('pemTab-video');
            const btnKur = document.getElementById('pemTab-kurikulum');
            const btnEva = document.getElementById('pemTab-evaluasi');

            if (kur) kur.classList.add('hidden');
            if (mat) mat.classList.add('hidden');
            if (pan) pan.classList.add('hidden');
            if (vid) vid.classList.add('hidden');
            if (eva) eva.classList.add('hidden');

            const inactiveClass = 'px-4 py-2.5 rounded-xl font-bold text-xs bg-slate-800 text-slate-300 hover:text-white hover:bg-slate-700 transition flex items-center gap-2 cursor-pointer shrink-0';

            if (btnPan) btnPan.className = inactiveClass;
            if (btnVid) btnVid.className = inactiveClass;
            if (btnKur) btnKur.className = inactiveClass;
            if (btnEva) btnEva.className = inactiveClass;

            const videoIframe = document.getElementById('mainVideoIframe');

            if (tab === 'panduan-excel') {
                if (pan) pan.classList.remove('hidden');
                if (btnPan) btnPan.className = 'px-4 py-2.5 rounded-xl font-black text-xs bg-emerald-600 text-white shadow-md transition flex items-center gap-2 border border-emerald-500 cursor-pointer shrink-0';
                const sel = document.getElementById('excelPageSelect');
                if (sel && !sel.hasChildNodes()) {
                    initExcelReader();
                } else {
                    renderExcelPage(currentExcelPage);
                }
                if (videoIframe) {
                    try { videoIframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*'); } catch(e) {}
                }
            } else if (tab === 'video') {
                if (vid) vid.classList.remove('hidden');
                if (btnVid) btnVid.className = 'px-4 py-2.5 rounded-xl font-black text-xs bg-red-600 text-white shadow-md transition flex items-center gap-2 border border-red-500 cursor-pointer shrink-0';
                if (videoIframe) {
                    try { videoIframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*'); } catch(e) {}
                }
            } else if (tab === 'kurikulum' || tab === 'materi') {
                if (kur) kur.classList.remove('hidden');
                if (mat) mat.classList.remove('hidden');
                if (btnKur) btnKur.className = 'px-4 py-2.5 rounded-xl font-black text-xs bg-[#005ea6] text-white shadow-md transition flex items-center gap-2 border border-blue-500 cursor-pointer shrink-0';
                if (videoIframe) {
                    try { videoIframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*'); } catch(e) {}
                }
            } else if (tab === 'evaluasi') {
                if (eva) eva.classList.remove('hidden');
                if (btnEva) btnEva.className = 'px-4 py-2.5 rounded-xl font-black text-xs bg-amber-500 text-slate-950 shadow-md transition flex items-center gap-2 border border-amber-400 cursor-pointer shrink-0';
                if (videoIframe) {
                    try { videoIframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*'); } catch(e) {}
                }
            }
        }

        function switchEvalSubTab(type) {
            const secPre = document.getElementById('evalSectionPretest');
            const secPost = document.getElementById('evalSectionPosttest');
            const btnPre = document.getElementById('btnEvalSubPretest');
            const btnPost = document.getElementById('btnEvalSubPosttest');

            if (type === 'posttest') {
                if (secPre) secPre.classList.add('hidden');
                if (secPost) secPost.classList.remove('hidden');
                if (btnPost) {
                    btnPost.className = 'px-3.5 py-2 rounded-xl bg-emerald-600 text-white font-black text-xs shadow transition cursor-pointer';
                }
                if (btnPre) {
                    btnPre.className = 'px-3.5 py-2 rounded-xl bg-slate-800 text-slate-300 hover:text-white font-bold text-xs border border-slate-700 transition cursor-pointer';
                }
            } else {
                if (secPre) secPre.classList.remove('hidden');
                if (secPost) secPost.classList.add('hidden');
                if (btnPre) {
                    btnPre.className = 'px-3.5 py-2 rounded-xl bg-amber-500 text-slate-950 font-black text-xs shadow transition cursor-pointer';
                }
                if (btnPost) {
                    btnPost.className = 'px-3.5 py-2 rounded-xl bg-slate-800 text-slate-300 hover:text-white font-bold text-xs border border-slate-700 transition cursor-pointer';
                }
            }
        }

        // ==============================================================
        // SISTEM BUKTI DUKUNG: A. TINGKAT DESA & B. TINGKAT KABUPATEN
        // ==============================================================

        const defaultBuktiDukungDesa = [
            {
                id: 'bk_desa_1',
                title: 'SK Kepala Desa Penetapan Tim & Agen Statistik Desa Cantik 2026',
                category: 'SK & Kelembagaan',
                number: 'SK.KADES/14/KPTS/2026',
                date: '15 Jan 2026',
                url: 'https://drive.google.com/drive/folders/desacantik-cijati-sk',
                fileName: 'SK_Kades_Agen_Statistik_Cijati_2026.pdf',
                status: 'Terverifikasi BPS',
                statusBadge: 'bg-emerald-100 text-emerald-800 border-emerald-300'
            },
            {
                id: 'bk_desa_2',
                title: 'Buku Register Monografi & Rekapitulasi Data Sektoral Desa',
                category: 'Monografi Desa',
                number: 'REG-MONO-7408-01',
                date: '02 Feb 2026',
                url: 'https://drive.google.com/drive/folders/desacantik-cijati-monografi',
                fileName: 'Register_Monografi_Desa_Cijati_2026.xlsx',
                status: 'Terverifikasi BPS',
                statusBadge: 'bg-emerald-100 text-emerald-800 border-emerald-300'
            },
            {
                id: 'bk_desa_3',
                title: 'Notula & Daftar Hadir Pelatihan Microsoft Excel Aparatur Desa',
                category: 'Bimtek & Pelatihan',
                number: 'BA-BIMTEK-03/2026',
                date: '18 Feb 2026',
                url: 'https://drive.google.com/drive/folders/desacantik-cijati-bimtek',
                fileName: 'Daftar_Hadir_Bimtek_Excel_30Lembar.pdf',
                status: 'Terverifikasi BPS',
                statusBadge: 'bg-emerald-100 text-emerald-800 border-emerald-300'
            },
            {
                id: 'bk_desa_4',
                title: 'Dokumentasi Foto & Geotagging Batas Wilayah dan Dusun',
                category: 'Geospasial & Dusun',
                number: 'DOK-GEO-DUSUN-2026',
                date: '05 Mar 2026',
                url: 'https://drive.google.com/drive/folders/desacantik-cijati-foto',
                fileName: 'Dokumentasi_Geotagging_Dusun.zip',
                status: 'Menunggu Verifikasi',
                statusBadge: 'bg-amber-100 text-amber-800 border-amber-300'
            }
        ];

        const defaultBuktiDukungKab = [
            {
                id: 'bk_kab_1',
                title: 'SK Tim Pembina Desa Cantik BPS Kabupaten Kolaka Utara',
                category: 'SK Pembina Kabupaten',
                number: 'Kep.BPS-7408/042/2026',
                verifikator: 'BPS Kabupaten Kolaka Utara',
                date: '10 Jan 2026',
                url: 'https://drive.google.com/drive/folders/bps7408-sk-pembina',
                fileName: 'SK_Pembina_Desa_Cantik_BPS_Kolut_2026.pdf',
                status: 'Diterbitkan BPS Kolut',
                statusBadge: 'bg-blue-100 text-blue-800 border-blue-300'
            },
            {
                id: 'bk_kab_2',
                title: 'Lembar Evaluasi & Verifikasi Lapangan BPS Kabupaten Kolaka Utara',
                category: 'Lembar Verifikasi Lapangan',
                number: 'VER-LAP-BPS/08/2026',
                verifikator: 'Statistisi Ahli BPS Kolut',
                date: '24 Feb 2026',
                url: 'https://drive.google.com/drive/folders/bps7408-verifikasi-lapangan',
                fileName: 'Lembar_Verifikasi_Monev_Kolut.pdf',
                status: 'Diterbitkan BPS Kolut',
                statusBadge: 'bg-blue-100 text-blue-800 border-blue-300'
            },
            {
                id: 'bk_kab_3',
                title: 'Berita Acara Rekomendasi Statistik Sektoral (Romantik BPS)',
                category: 'Rekomendasi Statistik (Romantik)',
                number: 'BA-ROMANTIK-BPS-7408/2026',
                verifikator: 'Tim Rekomendasi SDI Kolut',
                date: '10 Mar 2026',
                url: 'https://drive.google.com/drive/folders/bps7408-romantik-sdi',
                fileName: 'BA_Rekomendasi_Statistik_Sektoral.pdf',
                status: 'Diterbitkan BPS Kolut',
                statusBadge: 'bg-blue-100 text-blue-800 border-blue-300'
            },
            {
                id: 'bk_kab_4',
                title: 'Sertifikat Piagam Akreditasi Desa Cantik BPS RI',
                category: 'Piagam / Sertifikat',
                number: 'SERT-DESCAN-BPS-RI/2026',
                verifikator: 'BPS RI & BPS Kolut',
                date: '20 Mar 2026',
                url: 'https://drive.google.com/drive/folders/bps7408-piagam-akreditasi',
                fileName: 'Sertifikat_Akreditasi_Desa_Cantik_2026.pdf',
                status: 'Diterbitkan BPS Kolut',
                statusBadge: 'bg-emerald-100 text-emerald-800 border-emerald-300'
            }
        ];

                // currentMonevBuktiTab declared above

        const defaultMonevBukti = {
            desa: [
                { id: "bd1", title: "Laporan Pembinaan Bulanan (Excel per Desa)", status: "✓ Lengkap", url: "#", date: "15 Okt 2026", cat: "Laporan" },
                { id: "bd2", title: "Absensi & Foto Kegiatan Sosialisasi", status: "✓ Lengkap", url: "#", date: "10 Okt 2026", cat: "Dokumentasi" },
                { id: "bd3", title: "Surat Keputusan (SK) Agen Statistik", status: "✓ Lengkap", url: "#", date: "01 Okt 2026", cat: "Regulasi" },
                { id: "bd4", title: "Dokumen Metadata Indikator Sektoral SDI", status: "✓ Lengkap", url: "#", date: "20 Okt 2026", cat: "Metadata" }
            ],
            kabupaten: [
                { id: "bk1", title: "Rekomendasi Kegiatan Statistik BPS Kolut", status: "✓ Lengkap", url: "#", date: "18 Okt 2026", cat: "Rekomendasi" },
                { id: "bk2", title: "Berita Acara Supervisi Lapangan BPS Kolaka Utara", status: "✓ Lengkap", url: "#", date: "12 Okt 2026", cat: "Supervisi" },
                { id: "bk3", title: "Matriks Validasi Standar Data Indonesia (SDI)", status: "✓ Lengkap", url: "#", date: "22 Okt 2026", cat: "Validasi" },
                { id: "bk4", title: "Surat Penetapan Desa Cantik Mandiri 2026", status: "✓ Lengkap", url: "#", date: "25 Okt 2026", cat: "Sertifikasi" }
            ]
        };

        function switchMonevBuktiTab(tab) {
            currentMonevBuktiTab = (tab === 'kabupaten' || tab === 'kab') ? 'kabupaten' : 'desa';
            const tDesa = document.getElementById('tabBuktiDesa');
            const tKab = document.getElementById('tabBuktiKab');

            if (currentMonevBuktiTab === 'kabupaten') {
                if (tKab) tKab.className = 'px-3 py-1.5 rounded-lg bg-white text-slate-900 shadow-xs transition cursor-pointer font-black';
                if (tDesa) tDesa.className = 'px-3 py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition cursor-pointer font-bold';
            } else {
                if (tDesa) tDesa.className = 'px-3 py-1.5 rounded-lg bg-white text-slate-900 shadow-xs transition cursor-pointer font-black';
                if (tKab) tKab.className = 'px-3 py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition cursor-pointer font-bold';
            }
            renderBuktiDukungTables(currentTargetVillage);
        }

        function renderBuktiDukungTables(villageKey) {
            const vKey = villageKey || currentTargetVillage || 'cijati';
            const tbody = document.getElementById('tbodyMonevBukti');
            if (!tbody) return;

            const listKey = currentMonevBuktiTab === 'kabupaten' ? 'kabupaten' : 'desa';
            let list = defaultMonevBukti[listKey];

            try {
                const stored = localStorage.getItem('descan_bukti_' + listKey + '_' + vKey);
                if (stored) {
                    list = JSON.parse(stored);
                }
            } catch(e) {}

            let html = '';
            list.forEach((item, idx) => {
                html += `
                <tr class="hover:bg-slate-50 transition">
                    <td class="py-2.5 px-3 text-center font-bold text-slate-500">${idx + 1}</td>
                    <td class="py-2.5 px-4 font-bold text-slate-800">
                        <div class="flex items-center gap-2">
                            <span>📄</span>
                            <span>${item.title}</span>
                        </div>
                    </td>
                    <td class="py-2.5 px-3 text-center">
                        <span class="px-2 py-0.5 rounded-md bg-emerald-100 text-emerald-800 text-[10px] font-black">
                            ${item.status || '✓ Lengkap'}
                        </span>
                    </td>
                    <td class="py-2.5 px-4 text-center">
                        <div class="flex items-center justify-center gap-1.5">
                            <button type="button" onclick="showToast('Mengunduh berkas ${item.title}...')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition cursor-pointer">
                                Download
                            </button>
                            <button type="button" onclick="showToast('Pilih berkas baru untuk memperbarui...')" class="px-2.5 py-1 rounded-lg bg-[#005ea6] hover:bg-[#004e8a] text-white text-xs font-bold transition cursor-pointer">
                                Unggah Baru
                            </button>
                        </div>
                    </td>
                </tr>`;
            });
            tbody.innerHTML = html;
        }


        function handleAddBuktiSubmit(e, type) {
            e.preventDefault();
            const vKey = currentTargetVillage || 'cijati';
            const list = getBuktiList(type, vKey);

            let title, category, number, url, fileInput;
            if (type === 'desa') {
                title = document.getElementById('inputBuktiDesaTitle')?.value?.trim();
                category = document.getElementById('inputBuktiDesaCategory')?.value;
                number = document.getElementById('inputBuktiDesaNumber')?.value?.trim();
                url = document.getElementById('inputBuktiDesaUrl')?.value?.trim();
                fileInput = document.getElementById('inputBuktiDesaFile');
            } else {
                title = document.getElementById('inputBuktiKabTitle')?.value?.trim();
                category = document.getElementById('inputBuktiKabCategory')?.value;
                number = document.getElementById('inputBuktiKabNumber')?.value?.trim();
                url = document.getElementById('inputBuktiKabUrl')?.value?.trim();
                fileInput = document.getElementById('inputBuktiKabFile');
            }

            if (!title) {
                alert('Silakan masukkan nama dokumen/bukti dukung.');
                return;
            }

            const fileName = (fileInput && fileInput.files && fileInput.files[0]) ? fileInput.files[0].name : (title.replace(/\s+/g, '_') + '.pdf');
            const today = new Date();
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const dateStr = today.getDate() + ' ' + months[today.getMonth()] + ' ' + today.getFullYear();

            const newItem = {
                id: 'bk_' + type + '_' + Date.now(),
                title: title,
                category: category || 'Umum',
                number: number || '-',
                verifikator: type === 'kab' ? 'BPS Kabupaten Kolaka Utara' : 'Operator Desa',
                date: dateStr,
                url: url || '',
                fileName: fileName,
                status: type === 'desa' ? 'Terverifikasi BPS' : 'Diterbitkan BPS Kolut',
                statusBadge: type === 'desa' ? 'bg-emerald-100 text-emerald-800 border-emerald-300' : 'bg-blue-100 text-blue-800 border-blue-300'
            };

            list.unshift(newItem);
            saveBuktiList(type, vKey, list);

            e.target.reset();
            showToast('✓ Bukti dukung ' + (type === 'desa' ? 'Tingkat Desa' : 'Tingkat Kabupaten') + ' berhasil disimpan!');
        }

        function deleteBuktiItem(type, id) {
            if (!confirm('Apakah Anda yakin ingin menghapus dokumen bukti dukung ini?')) return;
            const vKey = currentTargetVillage || 'cijati';
            let list = getBuktiList(type, vKey);
            list = list.filter(item => item.id !== id);
            saveBuktiList(type, vKey, list);
            showToast('✓ Bukti dukung telah dihapus.');
        }

        // BUKU PANDUAN PEMBINAAN: PELATIHAN EXCEL (30 LEMBAR)
        let isBookSoundEnabled = true;

        function getExcelBookPages() {
            if (typeof window !== 'undefined' && window.excelBookPages && window.excelBookPages.length) {
                return window.excelBookPages;
            }
            if (typeof excelBookPages !== 'undefined' && excelBookPages && excelBookPages.length) {
                return excelBookPages;
            }
            return [];
        }

        function playPageFlipSound() {
            if (!isBookSoundEnabled) return;
            try {
                const AudioCtx = window.AudioContext || window.webkitAudioContext;
                if (!AudioCtx) return;
                const ctx = new AudioCtx();
                const bufferSize = ctx.sampleRate * 0.12;
                const buffer = ctx.createBuffer(1, bufferSize, ctx.sampleRate);
                const data = buffer.getChannelData(0);
                for (let i = 0; i < bufferSize; i++) {
                    data[i] = (Math.random() * 2 - 1) * Math.exp(-i / (bufferSize * 0.35));
                }
                const noise = ctx.createBufferSource();
                noise.buffer = buffer;
                const filter = ctx.createBiquadFilter();
                filter.type = 'bandpass';
                filter.frequency.value = 1400;
                filter.Q.value = 1.0;
                const gain = ctx.createGain();
                gain.gain.setValueAtTime(0.2, ctx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.12);
                noise.connect(filter);
                filter.connect(gain);
                gain.connect(ctx.destination);
                noise.start();
            } catch(e) {}
        }

        function toggleBookSound() {
            isBookSoundEnabled = !isBookSoundEnabled;
            const btn = document.getElementById('btnToggleBookSound');
            if (btn) {
                btn.innerHTML = isBookSoundEnabled ? '<span>🔊</span> <span>Suara: Aktif</span>' : '<span>🔇</span> <span>Suara: Bisu</span>';
                btn.classList.toggle('text-emerald-300', isBookSoundEnabled);
                btn.classList.toggle('text-slate-400', !isBookSoundEnabled);
            }
            showToast(isBookSoundEnabled ? '🔊 Efek suara balik lembar diaktifkan' : '🔇 Efek suara balik lembar dibisukan');
        }

        function setBookViewMode(mode) {
            bookViewMode = mode;
            const btnSpread = document.getElementById('btnModeSpread');
            const btnSingle = document.getElementById('btnModeSingle');
            if (btnSpread && btnSingle) {
                if (mode === 'spread') {
                    btnSpread.className = 'px-3 py-1.5 rounded-lg text-xs font-black bg-emerald-600 text-white shadow-xs transition flex items-center gap-1 cursor-pointer';
                    btnSingle.className = 'px-3 py-1.5 rounded-lg text-xs font-bold text-slate-400 hover:text-white transition flex items-center gap-1 cursor-pointer';
                } else {
                    btnSingle.className = 'px-3 py-1.5 rounded-lg text-xs font-black bg-emerald-600 text-white shadow-xs transition flex items-center gap-1 cursor-pointer';
                    btnSpread.className = 'px-3 py-1.5 rounded-lg text-xs font-bold text-slate-400 hover:text-white transition flex items-center gap-1 cursor-pointer';
                }
            }
            renderExcelPage(currentExcelPage);
            showToast(mode === 'spread' ? '📖 Mode Buku Terbuka 2 Halaman aktif' : '📄 Mode 1 Lembar Fokus aktif');
        }

        function searchExcelGuide(keyword) {
            const popover = document.getElementById('excelSearchResultsPopover');
            if (!popover) return;
            if (!keyword || keyword.trim().length < 2) {
                popover.classList.add('hidden');
                popover.innerHTML = '';
                return;
            }
            const q = keyword.toLowerCase().trim();
            const pages = getExcelBookPages();
            const matches = pages.filter(p => {
                return (p.title && p.title.toLowerCase().includes(q)) ||
                       (p.topic && p.topic.toLowerCase().includes(q)) ||
                       (p.section && p.section.toLowerCase().includes(q)) ||
                       (p.content && p.content.toLowerCase().includes(q));
            });

            if (matches.length === 0) {
                popover.innerHTML = `
                    <div class="p-3 text-center text-xs text-slate-400">
                        Tidak ada lembar yang cocok dengan "<b>${keyword}</b>".
                    </div>
                `;
            } else {
                let html = `<div class="p-1.5 text-[10px] font-black uppercase tracking-wider text-emerald-400 border-b border-slate-800">Ditemukan ${matches.length} Lembar:</div>`;
                matches.slice(0, 6).forEach(m => {
                    html += `
                        <div onclick="goToExcelPage(${m.page}); document.getElementById('excelSearchResultsPopover').classList.add('hidden');" class="p-2 rounded-xl bg-slate-800/80 hover:bg-emerald-900/60 transition cursor-pointer flex items-start gap-2 text-xs text-white">
                            <span class="px-2 py-0.5 rounded bg-emerald-500 text-slate-950 font-black text-[10px] shrink-0">Hal ${m.page}</span>
                            <div>
                                <b class="text-amber-200 block text-[11px]">${m.title.replace('Lembar ' + m.page + ': ', '')}</b>
                                <span class="text-[10px] text-slate-400 block">${m.topic || m.section}</span>
                            </div>
                        </div>
                    `;
                });
                popover.innerHTML = html;
            }
            popover.classList.remove('hidden');
        }

        document.addEventListener('click', function(e) {
            const input = document.getElementById('excelGuideSearchInput');
            const popover = document.getElementById('excelSearchResultsPopover');
            if (popover && input && !input.contains(e.target) && !popover.contains(e.target)) {
                popover.classList.add('hidden');
            }
        });

        function initExcelReader() {
            const select = document.getElementById('excelPageSelect');
            const pages = getExcelBookPages();
            if (!select || !pages || !pages.length) return;
            select.innerHTML = '';
            pages.forEach(p => {
                const opt = document.createElement('option');
                opt.value = p.page;
                opt.textContent = `Hal ${p.page}: ${p.title.replace('Lembar ' + p.page + ': ', '')}`;
                select.appendChild(opt);
            });
            renderExcelPage(1);
        }

        function renderExcelPage(pageNum) {
            const pages = getExcelBookPages();
            if (!pages || !pages.length) return;
            if (pageNum < 1) pageNum = 1;
            if (pageNum > pages.length) pageNum = pages.length;
            currentExcelPage = pageNum;

            const isDesktop = window.innerWidth >= 1024;
            const useSpread = (bookViewMode === 'spread') && isDesktop;

            const pageLeftEl = document.getElementById('bookPageLeft');
            const spineEl = document.getElementById('bookSpineCrease');
            const pageRightEl = document.getElementById('bookPageRight');

            // Update Dropdown, Progress, and Next Preview
            const select = document.getElementById('excelPageSelect');
            if (select) select.value = pageNum;

            const badgeEl = document.getElementById('excelPageBadge');
            if (badgeEl) badgeEl.textContent = `Lembar ${pageNum} / ${pages.length}`;

            const pct = Math.round((pageNum / pages.length) * 100);
            const progBar = document.getElementById('excelProgressBar');
            if (progBar) progBar.style.width = `${pct}%`;

            const progText = document.getElementById('excelProgressText');
            if (progText) progText.textContent = `Progres Pembacaan: Lembar ${pageNum} dari ${pages.length} (${pct}%)`;

            const nextPreview = document.getElementById('excelNextPreview');
            if (nextPreview) {
                if (pageNum < pages.length) {
                    const nextP = pages[pageNum];
                    nextPreview.textContent = `Lanjut ke Hal ${nextP.page}: ${nextP.title.replace('Lembar ' + nextP.page + ': ', '')} →`;
                } else {
                    nextPreview.textContent = `✓ Anda telah sampai di lembar akhir (Lembar 30)`;
                }
            }

            // Update Prev/Next buttons disabled state
            const btnPrev = document.getElementById('btnPrevExcelPage');
            if (btnPrev) {
                btnPrev.disabled = (pageNum === 1);
                btnPrev.classList.toggle('opacity-50', pageNum === 1);
                btnPrev.classList.toggle('cursor-not-allowed', pageNum === 1);
            }
            const btnNext = document.getElementById('btnNextExcelPage');
            if (btnNext) {
                btnNext.disabled = (pageNum === pages.length);
                btnNext.classList.toggle('opacity-50', pageNum === pages.length);
                btnNext.classList.toggle('cursor-not-allowed', pageNum === pages.length);
            }

            if (useSpread) {
                // SPREAD MODE (2 PAGES)
                if (pageLeftEl) pageLeftEl.classList.remove('hidden');
                if (spineEl) spineEl.classList.remove('hidden');

                if (pageNum === 1) {
                    // Spread 1: Left page is Official BPS Introduction & Frontispiece, Right page is Lembar 1
                    const leftNumberEl = document.getElementById('bookPageLeftNumber');
                    if (leftNumberEl) leftNumberEl.textContent = 'Halaman i (Pengantar)';

                    const containerLeft = document.getElementById('sheetContentContainerLeft');
                    if (containerLeft) {
                        containerLeft.innerHTML = `
                            <div class="space-y-4">
                                <div class="p-5 rounded-2xl bg-gradient-to-br from-emerald-900 to-slate-900 text-white shadow-md border border-emerald-700/60">
                                    <div class="flex items-center gap-2 text-[10px] font-black uppercase text-amber-300 tracking-wider">
                                        <span>🏛️ REPUBLIK INDONESIA</span>
                                        <span>•</span>
                                        <span>BADAN PUSAT STATISTIK</span>
                                    </div>
                                    <h3 class="text-xl font-black text-amber-300 mt-1">
                                        Pedoman Praktik Statistik Sektoral Desa Cantik
                                    </h3>
                                    <p class="text-xs text-emerald-100 mt-1 leading-relaxed">
                                        Modul resmi bimbingan teknis aparatur pemerintah desa dan kader Agen Statistik Desa dalam standarisasi, pengolahan, dan analisis monografi desa.
                                    </p>
                                </div>

                                <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-950 space-y-2">
                                    <div class="font-black text-sm flex items-center gap-1.5 text-amber-900">
                                        <span>📜 Landasan Regulasi Satu Data Indonesia:</span>
                                    </div>
                                    <ul class="list-disc list-inside space-y-1 text-slate-700 pl-1 text-[11px]">
                                        <li><b>UU No. 16 Tahun 1997:</b> Penyelenggaraan Kegiatan Statistik Nasional & Sektoral.</li>
                                        <li><b>Perpres No. 39 Tahun 2019:</b> Prinsip Satu Data Indonesia (SDI) Tingkat Desa.</li>
                                        <li><b>UU No. 27 Tahun 2022:</b> Perlindungan Data Pribadi (Kerahasiaan NIK Warga).</li>
                                    </ul>
                                </div>

                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-700 space-y-1.5">
                                    <div class="font-extrabold text-slate-900 flex items-center gap-1 text-xs">
                                        <span>📑 Matriks 7 Bab Pelatihan (30 Lembar):</span>
                                    </div>
                                    <div class="grid grid-cols-2 gap-1 text-[10px]">
                                        <div>• Bab 1: Cover & SDI (Hal 1-5)</div>
                                        <div>• Bab 2: Input NIK 16 Digit (Hal 6-10)</div>
                                        <div>• Bab 3: Rumus Monografi (Hal 11-15)</div>
                                        <div>• Bab 4: Logika IF Bansos (Hal 16-20)</div>
                                        <div>• Bab 5: Cleansing Teks (Hal 21-23)</div>
                                        <div>• Bab 6: VLOOKUP & DTKS (Hal 24-26)</div>
                                        <div class="col-span-2">• Bab 7: PivotTable & Cetak Laporan (Hal 27-30)</div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between text-[11px] pt-1 text-slate-500 font-medium">
                                    <span>Penyusun: Tim Teknis BPS Kolaka Utara</span>
                                    <span class="text-emerald-700 font-bold">Terakreditasi BPS RI</span>
                                </div>
                            </div>
                        `;
                    }

                    // Right page: Lembar 1
                    const pageDataRight = pages[0];
                    const secEl = document.getElementById('sheetSectionName');
                    if (secEl) secEl.textContent = pageDataRight.section;

                    const tagEl = document.getElementById('sheetPageTag');
                    if (tagEl) tagEl.textContent = `Lembar 1 dari ${pages.length}`;

                    const containerRight = document.getElementById('sheetContentContainerRight') || document.getElementById('sheetContentContainer');
                    if (containerRight) {
                        containerRight.innerHTML = pageDataRight.content;
                    }
                } else {
                    // Spread > 1
                    let leftPageNum, rightPageNum;
                    if (pageNum % 2 === 0) {
                        leftPageNum = pageNum;
                        rightPageNum = pageNum + 1;
                    } else {
                        leftPageNum = pageNum - 1;
                        rightPageNum = pageNum;
                    }

                    const pageDataLeft = pages[leftPageNum - 1];
                    const leftNumberEl = document.getElementById('bookPageLeftNumber');
                    if (leftNumberEl) leftNumberEl.textContent = `Hal. ${leftPageNum}`;

                    const containerLeft = document.getElementById('sheetContentContainerLeft');
                    if (containerLeft && pageDataLeft) {
                        containerLeft.innerHTML = pageDataLeft.content;
                    }

                    // Right Page
                    if (rightPageNum <= pages.length) {
                        const pageDataRight = pages[rightPageNum - 1];
                        const secEl = document.getElementById('sheetSectionName');
                        if (secEl) secEl.textContent = pageDataRight.section;

                        const tagEl = document.getElementById('sheetPageTag');
                        if (tagEl) tagEl.textContent = `Lembar ${rightPageNum} dari ${pages.length}`;

                        const containerRight = document.getElementById('sheetContentContainerRight') || document.getElementById('sheetContentContainer');
                        if (containerRight && pageDataRight) {
                            containerRight.innerHTML = pageDataRight.content;
                        }
                    } else {
                        // Beyond page 30: Closing spread
                        const secEl = document.getElementById('sheetSectionName');
                        if (secEl) secEl.textContent = 'Penutup & Sertifikasi Kompetensi';

                        const tagEl = document.getElementById('sheetPageTag');
                        if (tagEl) tagEl.textContent = 'Penutup';

                        const containerRight = document.getElementById('sheetContentContainerRight') || document.getElementById('sheetContentContainer');
                        if (containerRight) {
                            containerRight.innerHTML = `
                                <div class="space-y-4 text-center py-6">
                                    <div class="w-16 h-16 mx-auto rounded-full bg-emerald-100 border-2 border-emerald-500 text-emerald-800 flex items-center justify-center text-2xl font-black shadow-md">
                                        ✓
                                    </div>
                                    <div class="space-y-1">
                                        <h4 class="text-xl font-black text-slate-900">Selamat! 30 Lembar Praktik Mandiri Tuntas</h4>
                                        <p class="text-xs text-slate-600 max-w-md mx-auto">
                                            Aparatur desa dan Agen Statistik Desa telah menyelesaikan seluruh rangkaian 30 lembar modul praktikum pengolahan data spreadsheet standar BPS RI.
                                        </p>
                                    </div>
                                    <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-xs text-amber-950 inline-block text-left max-w-md space-y-1">
                                        <b>Langkah Lanjutan:</b>
                                        <p class="text-[11px] text-slate-700">1. Unduh sertifikat kelulusan di menu Evaluasi & Posttest.</p>
                                        <p class="text-[11px] text-slate-700">2. Terapkan tabel database bersih pada penyusunan monografi desa semester berjalan.</p>
                                    </div>
                                </div>
                            `;
                        }
                    }
                }
            } else {
                // SINGLE PAGE MODE (OR MOBILE)
                if (pageLeftEl) pageLeftEl.classList.add('hidden');
                if (spineEl) spineEl.classList.add('hidden');

                const pageData = pages[pageNum - 1];
                if (pageData) {
                    const secEl = document.getElementById('sheetSectionName');
                    if (secEl) secEl.textContent = pageData.section;

                    const tagEl = document.getElementById('sheetPageTag');
                    if (tagEl) tagEl.textContent = `Lembar ${pageData.page} dari ${pages.length}`;

                    const container = document.getElementById('sheetContentContainerRight') || document.getElementById('sheetContentContainer');
                    if (container) {
                        container.innerHTML = pageData.content;
                    }
                }
            }

            playPageFlipSound();
        }

        function nextExcelPage() {
            const pages = getExcelBookPages();
            if (!pages || !pages.length) return;
            const isDesktop = window.innerWidth >= 1024;
            const useSpread = (bookViewMode === 'spread') && isDesktop;
            const step = useSpread ? (currentExcelPage === 1 ? 1 : 2) : 1;
            const target = Math.min(pages.length, currentExcelPage + step);
            if (target !== currentExcelPage) {
                renderExcelPage(target);
                const el = document.getElementById('excelSheetCard');
                if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        function prevExcelPage() {
            const pages = getExcelBookPages();
            if (!pages || !pages.length) return;
            const isDesktop = window.innerWidth >= 1024;
            const useSpread = (bookViewMode === 'spread') && isDesktop;
            const step = useSpread ? (currentExcelPage === 2 ? 1 : 2) : 1;
            const target = Math.max(1, currentExcelPage - step);
            if (target !== currentExcelPage) {
                renderExcelPage(target);
                const el = document.getElementById('excelSheetCard');
                if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        function goToExcelPage(num) {
            renderExcelPage(Number(num));
            const el = document.getElementById('excelSheetCard');
            if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function printCurrentExcelPage() {
            showToast('Menyiapkan lembar panduan untuk dicetak...');
            setTimeout(() => {
                window.print();
            }, 300);
        }

        function downloadExcelGuidePdf() {
            showToast('Mengunduh Paket Lengkap: Buku Panduan Pelatihan Excel Statistik Desa (30 Lembar)...');
            setTimeout(() => {
                showToast('✓ Buku Panduan 30 Lembar berhasil diunduh (Format Standar Pembinaan BPS RI).');
            }, 1800);
        }

        function switchPretestTab(tab) {
            const has = document.getElementById('preContent-hasil');
            const kui = document.getElementById('preContent-kuis');
            const btnHas = document.getElementById('preTab-hasil');
            const btnKui = document.getElementById('preTab-kuis');
            if (tab === 'hasil') {
                if (has) has.classList.remove('hidden');
                if (kui) kui.classList.add('hidden');
                if (btnHas) { btnHas.className = 'px-3.5 py-2 rounded-xl font-bold text-xs bg-amber-500 text-slate-950 shadow-xs transition'; }
                if (btnKui) { btnKui.className = 'px-3.5 py-2 rounded-xl font-bold text-xs bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition'; }
            } else {
                if (has) has.classList.add('hidden');
                if (kui) kui.classList.remove('hidden');
                if (btnHas) { btnHas.className = 'px-3.5 py-2 rounded-xl font-bold text-xs bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition'; }
                if (btnKui) { btnKui.className = 'px-3.5 py-2 rounded-xl font-bold text-xs bg-amber-500 text-slate-950 shadow-xs transition'; }
            }
        }

        function switchPosttestTab(tab) {
            const has = document.getElementById('postContent-hasil');
            const kui = document.getElementById('postContent-kuis');
            const btnHas = document.getElementById('postTab-hasil');
            const btnKui = document.getElementById('postTab-kuis');
            if (tab === 'hasil') {
                if (has) has.classList.remove('hidden');
                if (kui) kui.classList.add('hidden');
                if (btnHas) { btnHas.className = 'px-3.5 py-2 rounded-xl font-bold text-xs bg-emerald-600 text-white shadow-xs transition'; }
                if (btnKui) { btnKui.className = 'px-3.5 py-2 rounded-xl font-bold text-xs bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition'; }
            } else {
                if (has) has.classList.add('hidden');
                if (kui) kui.classList.remove('hidden');
                if (btnHas) { btnHas.className = 'px-3.5 py-2 rounded-xl font-bold text-xs bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition'; }
                if (btnKui) { btnKui.className = 'px-3.5 py-2 rounded-xl font-bold text-xs bg-emerald-600 text-white shadow-xs transition'; }
            }
        }

        function submitPretest(e) {
            e.preventDefault();
            const f = e.target;
            let score = 0;
            const q1 = f.pre_q1 ? f.pre_q1.value : '';
            const q2 = f.pre_q2 ? f.pre_q2.value : '';
            const q3 = f.pre_q3 ? f.pre_q3.value : '';
            const q4 = f.pre_q4 ? f.pre_q4.value : '';

            if (q1 === 'B') score += 25;
            if (q2 === 'B') score += 25;
            if (q3 === 'A') score += 25;
            if (q4 === 'B') score += 25;

            const area = document.getElementById('pretestResultArea');
            if (area) {
                area.classList.remove('hidden');
                area.className = score >= 75 ? 'p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-950 space-y-2' : 'p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-950 space-y-2';
                area.innerHTML = `
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-wider">Hasil Pretest Anda</span>
                            <h5 class="text-base font-black">Skor: ${score} / 100</h5>
                        </div>
                        <span class="px-3 py-1 rounded-lg text-xs font-bold ${score >= 75 ? 'bg-emerald-600 text-white' : 'bg-amber-600 text-white'}">
                            ${score >= 75 ? 'Sangat Baik' : 'Perlu Pendalaman Modul'}
                        </span>
                    </div>
                    <p class="text-xs leading-relaxed">
                        ${score >= 75 ? 'Hebat! Anda telah menguasai konsep dasar statistik desa dan standar Satu Data Indonesia.' : 'Bagus! Hasil evaluasi menunjukkan Anda perlu membaca Modul 1 dan Modul 2 untuk memperkuat pemahaman teknis SDI.'}
                    </p>
                    <div class="text-[11px] text-slate-500 pt-1">
                        Kunci Jawaban: 1-B, 2-B, 3-A, 4-B. Seluruh jawaban telah diverifikasi BPS.
                    </div>
                `;
                showToast('Hasil Pretest: ' + score + '/100 berhasil dihitung!');
            }
        }

        function submitPosttest(e) {
            e.preventDefault();
            const f = e.target;
            let score = 0;
            const q1 = f.post_q1 ? f.post_q1.value : '';
            const q2 = f.post_q2 ? f.post_q2.value : '';
            const q3 = f.post_q3 ? f.post_q3.value : '';
            const q4 = f.post_q4 ? f.post_q4.value : '';

            if (q1 === 'A') score += 25;
            if (q2 === 'A') score += 25;
            if (q3 === 'A') score += 25;
            if (q4 === 'A') score += 25;

            const area = document.getElementById('posttestResultArea');
            if (area) {
                area.classList.remove('hidden');
                area.className = 'p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-950 space-y-2';
                area.innerHTML = `
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-wider text-emerald-800">Uji Kompetensi Selesai</span>
                            <h5 class="text-base font-black text-emerald-950">Skor Akhir: ${score} / 100</h5>
                        </div>
                        <span class="px-3 py-1 rounded-lg text-xs font-bold bg-emerald-700 text-white">
                            LULUS KOMPETEN
                        </span>
                    </div>
                    <p class="text-xs text-emerald-900 leading-relaxed">
                        Selamat! Anda telah menyelesaikan seluruh ujian posttest dengan predikat memuaskan. E-Sertifikat kelulusan Agen Statistik Desa Anda telah dibuka dan terverifikasi di sistem BPS.
                    </p>
                    <div class="pt-2">
                        <button type="button" onclick="switchPosttestTab('hasil')" class="px-4 py-2 rounded-xl bg-emerald-700 text-white font-bold text-xs shadow-xs">
                            Lihat & Cetak E-Sertifikat BPS →
                        </button>
                    </div>
                `;
                showToast('Selamat! Anda Lulus Uji Kompetensi dengan skor ' + score + '/100');
            }
        }

        function downloadModulePdf(title) {
            showToast('📥 Mengunduh: ' + title + '...');
        }

        function markModuleDone(modulKey) {
            showToast('✓ Modul berhasil ditandai selesai! Progres belajar desa diperbarui.');
            if (modulKey === 'modul1') {
                const b = document.getElementById('pemMod1Bar');
                const p = document.getElementById('pemMod1Pct');
                if (b) b.style.width = '100%';
                if (p) p.textContent = '100% Selesai';
            } else if (modulKey === 'modul2') {
                const b = document.getElementById('pemMod2Bar');
                const p = document.getElementById('pemMod2Pct');
                if (b) b.style.width = '100%';
                if (p) p.textContent = '100% Selesai';
            } else if (modulKey === 'modul3') {
                const b = document.getElementById('pemMod3Bar');
                const p = document.getElementById('pemMod3Pct');
                if (b) b.style.width = '100%';
                if (p) p.textContent = '100% Selesai';
            }
        }

        function printCertificate() {
            window.print();
        }

        function showToast(msg) {
            const toast = document.getElementById('toastNotification');
            if (toast) {
                toast.textContent = msg;
                toast.classList.remove('hidden');
                setTimeout(() => toast.classList.add('hidden'), 3500);
            }
        }

        currentTargetVillage = 'cijati';

        function showVillageLoginGate(desaKey) {
            currentTargetVillage = desaKey || 'cijati';
            const acc = (typeof DESCAN_ACCOUNTS !== 'undefined' && DESCAN_ACCOUNTS[currentTargetVillage]) ? DESCAN_ACCOUNTS[currentTargetVillage] : DESCAN_ACCOUNTS['cijati'];

            // Populate gate info
            const titleEl = document.getElementById('gateDesaTitle');
            const nameEl = document.getElementById('gateDesaName');
            const repEl = document.getElementById('gateDesaRep');
            const kecEl = document.getElementById('gateDesaKecamatan');
            const avEl = document.getElementById('gateDesaAvatar');
            const emailInp = document.getElementById('gateInputEmail');
            const passInp = document.getElementById('gateInputPassword');
            const errEl = document.getElementById('gateLoginError');

            if (titleEl && acc) titleEl.textContent = `Login Akses ${acc.desaName}`;
            if (nameEl && acc) nameEl.textContent = acc.desaName;
            if (repEl && acc) repEl.textContent = `${acc.rep} • ${acc.role}`;
            if (kecEl && acc) kecEl.textContent = `${acc.kecamatan} (${acc.period})`;
            if (avEl && acc) avEl.src = acc.avatar;
            if (emailInp && acc) emailInp.value = acc.email;
            if (passInp) passInp.value = '';
            if (errEl) errEl.classList.add('hidden');

            // Hide main menu & nav links, show gate
            const gate = document.getElementById('villageLoginGate');
            const mainContent = document.getElementById('mainMenuContent');
            const topNavLinks = document.getElementById('topNavMenuLinks');
            const mobileNav = document.getElementById('mobileNavMenuBar');

            if (gate) {
                gate.classList.remove('hidden');
                gate.classList.add('flex');
            }
            if (mainContent) mainContent.classList.add('hidden');
            if (topNavLinks) topNavLinks.classList.add('hidden');
            if (mobileNav) mobileNav.classList.add('hidden');

            // Update navbar badge to locked state
            const badgeEl = document.getElementById('menuNavUserBadge');
            if (badgeEl) {
                badgeEl.innerHTML = `
                    <div class="px-2.5 py-1 rounded-xl bg-amber-50 border border-amber-300 text-amber-900 font-extrabold text-[11px] flex items-center gap-1.5 shadow-2xs">
                        <i class="bi bi-lock-fill"></i>
                        <span>Login Diperlukan</span>
                    </div>
                `;
            }
        }

        function hideVillageLoginGate() {
            const gate = document.getElementById('villageLoginGate');
            const mainContent = document.getElementById('mainMenuContent');
            const topNavLinks = document.getElementById('topNavMenuLinks');
            const mobileNav = document.getElementById('mobileNavMenuBar');

            if (gate) {
                gate.classList.add('hidden');
                gate.classList.remove('flex');
            }
            if (mainContent) mainContent.classList.remove('hidden');
            if (topNavLinks) topNavLinks.classList.remove('hidden');
            if (mobileNav) mobileNav.classList.remove('hidden');
        }

        function bypassGateAsViewer() {
            const villageKey = currentTargetVillage || 'cijati';
            const acc = (typeof DESCAN_ACCOUNTS !== 'undefined' && DESCAN_ACCOUNTS[villageKey]) ? DESCAN_ACCOUNTS[villageKey] : {
                desaName: (villagesData[villageKey]?.title || 'Desa Cijati'),
                rep: 'Pemerintah Desa',
                avatar: 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=200&q=80',
                email: 'admin.' + villageKey + '@descan.bps.go.id'
            };
            const session = {
                desaKey: villageKey,
                desaName: acc.desaName,
                rep: acc.rep,
                avatar: acc.avatar,
                email: acc.email,
                role: 'Peninjau Resmi BPS / Tamu',
                loginAt: new Date().toISOString()
            };
            try {
                localStorage.setItem('descan_auth_session', JSON.stringify(session));
                sessionStorage.setItem('descan_auth_session', JSON.stringify(session));
            } catch(e) {}
            hideVillageLoginGate();
            switchVillage(villageKey);
            switchNavMenu(currentNavMenu || 'dashboard');
            updateNavProfileWidget(villageKey);
            showToast('✓ Berhasil masuk sebagai Peninjau Resmi ' + acc.desaName + '! Semua menu dapat digunakan.');
        }

        function autoFillGateTarget() {
            const acc = (typeof DESCAN_ACCOUNTS !== 'undefined' && DESCAN_ACCOUNTS[currentTargetVillage]) ? DESCAN_ACCOUNTS[currentTargetVillage] : null;
            if (acc) {
                const emailInp = document.getElementById('gateInputEmail');
                const passInp = document.getElementById('gateInputPassword');
                if (emailInp) emailInp.value = acc.email;
                if (passInp) passInp.value = acc.password;
                showToast(`✓ Kredensial resmi ${acc.desaName} terisi otomatis!`);
            }
        }

        function handleGateLoginSubmit(e) {
            e.preventDefault();
            const emailInp = document.getElementById('gateInputEmail');
            const passInp = document.getElementById('gateInputPassword');
            const errBox = document.getElementById('gateLoginError');
            const errText = document.getElementById('gateLoginErrorText');

            const email = emailInp ? emailInp.value : '';
            const pass = passInp ? passInp.value : '';

            const result = validateDescanLogin(email, pass, currentTargetVillage);

            if (!result.success) {
                if (errBox && errText) {
                    errText.textContent = result.message || 'Email atau kata sandi tidak cocok untuk desa ini.';
                    errBox.classList.remove('hidden');
                }
                return;
            }

            // Success: session is saved by validateDescanLogin
            if (errBox) errBox.classList.add('hidden');
            showToast(`✓ Berhasil login! Selamat datang di Dashboard ${result.account.desaName}.`);

            hideVillageLoginGate();
            switchVillage(currentTargetVillage);
            switchNavMenu('dashboard');
            updateNavProfileWidget(currentTargetVillage);
            if (typeof syncPodesSpreadsheetForVillage === 'function') syncPodesSpreadsheetForVillage(currentTargetVillage);
        }

        function togglePasswordVisibility(inputId) {
            const inp = document.getElementById(inputId);
            const icon = document.getElementById('gateEyeIcon');
            if (inp) {
                if (inp.type === 'password') {
                    inp.type = 'text';
                    if (icon) icon.className = 'bi bi-eye-slash';
                } else {
                    inp.type = 'password';
                    if (icon) icon.className = 'bi bi-eye';
                }
            }
        }

        function updateNavProfileWidget(desaKey) {
            const auth = typeof getDescanAuth === 'function' ? getDescanAuth() : null;
            const badgeEl = document.getElementById('menuNavUserBadge');
            
            if (badgeEl && auth && auth.desaKey === desaKey) {
                badgeEl.innerHTML = `
                    <div class="relative">
                        <button type="button" onclick="toggleUserDropdown()" class="flex items-center gap-2 pl-1 pr-3 py-1 rounded-full bg-slate-100 hover:bg-slate-200/80 border border-slate-200/80 text-xs transition cursor-pointer shadow-2xs">
                            <img src="${auth.avatar || 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=200&q=80'}" alt="${auth.desaName}" class="w-7 h-7 rounded-full object-cover border-2 border-emerald-500 shadow-2xs">
                            <div class="text-left hidden md:block leading-none">
                                <span class="text-[11px] font-black text-slate-900 block leading-tight">${auth.desaName}</span>
                                <span class="text-[9px] text-emerald-700 font-extrabold block leading-tight mt-0.5">${auth.rep}</span>
                            </div>
                            <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div id="userProfileDropdown" class="hidden absolute right-0 mt-2 w-72 bg-white rounded-2xl shadow-xl border border-slate-200 p-4 z-50 text-xs">
                            <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                                <img src="${auth.avatar || 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=200&q=80'}" class="w-11 h-11 rounded-2xl object-cover border-2 border-emerald-500 shadow-xs">
                                <div>
                                    <h4 class="font-black text-slate-900 text-sm leading-tight">${auth.desaName}</h4>
                                    <p class="text-[10px] text-emerald-700 font-bold">${auth.rep}</p>
                                    <span class="text-[9px] text-slate-400 font-medium">${auth.role}</span>
                                </div>
                            </div>
                            
                            <div class="py-2.5 space-y-1.5 text-[11px]">
                                <div class="flex items-center justify-between text-slate-500">
                                    <span>Email Akun:</span>
                                    <span class="font-mono font-bold text-slate-800 text-[10px]">${auth.email}</span>
                                </div>
                                <div class="flex items-center justify-between text-slate-500">
                                    <span>Kata Sandi:</span>
                                    <span class="font-mono font-bold text-slate-800 text-[10px]">${auth.password || '••••••••'}</span>
                                </div>
                                <div class="flex items-center justify-between text-slate-500">
                                    <span>Status BPS:</span>
                                    <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 font-black text-[9px]">Terverifikasi</span>
                                </div>
                            </div>
                            
                            <div class="pt-2.5 border-t border-slate-100 space-y-2">
                                <button type="button" onclick="openSwitchAccountModal()" class="w-full py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-arrow-repeat"></i>
                                    <span>Ganti Akun Desa</span>
                                </button>
                                <button type="button" onclick="logoutFromMenu()" class="w-full py-2 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Keluar ke 6 Desa Binaan</span>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                badgeEl.innerHTML = `
                    <button type="button" onclick="showVillageLoginGate(currentTargetVillage)" class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-amber-50 hover:bg-amber-100 border border-amber-300 text-amber-900 text-xs font-bold transition cursor-pointer">
                        <i class="bi bi-lock-fill"></i>
                        <span>Login Desa</span>
                    </button>
                `;
            }
        }

        function toggleUserDropdown() {
            const drop = document.getElementById('userProfileDropdown');
            if (drop) drop.classList.toggle('hidden');
        }

        function openSwitchAccountModal() {
            const drop = document.getElementById('userProfileDropdown');
            if (drop) drop.classList.add('hidden');

            const modal = document.getElementById('switchAccountModal');
            const list = document.getElementById('switchAccountList');
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            if (list && typeof DESCAN_ACCOUNTS !== 'undefined') {
                const current = (typeof getDescanAuth === 'function') ? getDescanAuth() : null;
                let html = '';
                for (const key in DESCAN_ACCOUNTS) {
                    const acc = DESCAN_ACCOUNTS[key];
                    const isCurrent = current && current.desaKey === key;
                    html += `
                        <div onclick="selectVillageAccount('${key}')" class="p-3 rounded-2xl border ${isCurrent ? 'border-emerald-500 bg-emerald-50/70' : 'border-slate-200 bg-slate-50 hover:bg-slate-100'} transition cursor-pointer flex items-center justify-between text-xs group">
                            <div class="flex items-center gap-3">
                                <img src="${acc.avatar}" alt="${acc.rep}" class="w-9 h-9 rounded-xl object-cover border ${isCurrent ? 'border-emerald-500' : 'border-slate-300'}">
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="font-black text-slate-900 group-hover:text-emerald-700">${acc.desaName}</span>
                                        ${isCurrent ? '<span class="px-2 py-0.2 rounded bg-emerald-600 text-white text-[9px] font-black">Aktif</span>' : ''}
                                    </div>
                                    <div class="text-[10px] text-slate-500 font-medium">${acc.email}</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="px-2 py-0.5 rounded bg-white text-slate-700 font-mono text-[10px] font-bold border border-slate-200">${acc.password}</span>
                                <div class="text-[9px] text-slate-400 mt-0.5">Klik untuk Buka</div>
                            </div>
                        </div>
                    `;
                }
                list.innerHTML = html;
            }
        }

        function closeSwitchAccountModal() {
            const modal = document.getElementById('switchAccountModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        }

        function selectVillageAccount(key) {
            closeSwitchAccountModal();
            if (typeof clearDescanAuth === 'function') clearDescanAuth();
            try {
                localStorage.removeItem('descan_auth_session');
                sessionStorage.removeItem('descan_auth_session');
            } catch(e) {}
            window.location.href = `/descan/login?desa=${key}`;
        }

        function logoutFromMenu() {
            if (typeof clearDescanAuth === 'function') clearDescanAuth();
            try {
                localStorage.removeItem('descan_auth_session');
                sessionStorage.removeItem('descan_auth_session');
            } catch(e) {}
            window.location.href = '/descan';
        }

        function exitToDescanDashboard(e) {
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }
            logoutFromMenu();
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            const badgeEl = document.getElementById('menuNavUserBadge');
            const drop = document.getElementById('userProfileDropdown');
            if (badgeEl && drop && !badgeEl.contains(e.target)) {
                drop.classList.add('hidden');
            }
        });

        // Initialize from URL query param (?desa=...&menu=...) with strict login enforcement
        document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => renderDashboardVisualCharts(currentActiveVillage || 'kalu_kaluku'), 200);
            const params = new URLSearchParams(window.location.search);
            const desaParam = (params.get('desa') || 'kamisi').toLowerCase();
            const menuParam = (params.get('menu') || (window.location.hash ? window.location.hash.replace('#', '') : 'dashboard')).toLowerCase();

            currentTargetVillage = (typeof villagesData !== 'undefined' && villagesData[desaParam]) ? desaParam : 'kamisi';

            const auth = typeof getDescanAuth === 'function' ? getDescanAuth() : null;

            // Strict Access Control: Each village must be logged in with its own account!
            if (!auth || auth.desaKey !== currentTargetVillage) {
                showVillageLoginGate(currentTargetVillage);
            } else {
                hideVillageLoginGate();
                switchVillage(currentTargetVillage);
                switchNavMenu(menuParam);
                updateNavProfileWidget(currentTargetVillage);
            if (typeof syncPodesSpreadsheetForVillage === 'function') syncPodesSpreadsheetForVillage(currentTargetVillage);
            }
            
            // Initialize Excel Guidebook Reader if available
            if (typeof initExcelReader === 'function') {
                initExcelReader();
            }
            if (typeof openEmbeddedBookReader === 'function') {
                openEmbeddedBookReader('excel');
            }
            if (typeof renderBuktiDukungTables === 'function') {
                renderBuktiDukungTables(currentTargetVillage);
            }
            if (typeof switchDashTab === 'function') {
                switchDashTab('dashboard');
            }
            if (typeof renderDashboard6Desa === 'function') {
                renderDashboard6Desa();
            }
            if (typeof filterAnalitikDesa === 'function') {
                filterAnalitikDesa('kalukaluku');
            }
        });
    
        // ===== HELPER PUBLIKASI & INFOGRAFIS DESCAN BPS =====
        function renderPublikasiDesa(villageKey) {
            const vKey = (villageKey || currentTargetVillage || currentVillageKey || 'kamisi').toLowerCase().replace(/[^a-z0-9]/g, '');
            const vData = (typeof villagesData !== 'undefined' && villagesData[vKey]) ? villagesData[vKey] : (villagesData?.kamisi || {});
            const vTitle = vData.title || (vKey === 'malamala' ? 'Kelurahan Mala-Mala' : 'Desa ' + vKey.charAt(0).toUpperCase() + vKey.slice(1));

            const bookTitleEl = document.getElementById('pubBookVillageTitle');
            if (bookTitleEl) bookTitleEl.textContent = vTitle + ' 2026';

            const card1TitleEl = document.getElementById('pubCard1Title');
            if (card1TitleEl) card1TitleEl.textContent = 'Monografi Statistik Sektoral ' + vTitle + ' 2026';

            const infoJiwaEl = document.getElementById('pubInfoJiwa');
            if (infoJiwaEl) infoJiwaEl.textContent = (vData.pop || '1.197') + ' Jiwa';

            const infoKKEl = document.getElementById('pubInfoKK');
            if (infoKKEl) infoKKEl.textContent = (vData.kk || '394') + ' KK';

            const infoIMKEl = document.getElementById('pubInfoIMK');
            if (infoIMKEl) infoIMKEl.textContent = (vData.ikm || '14') + ' Unit Usaha';
        }

        function downloadPublicationDoc(fileName) {
            if (typeof showToast === 'function') {
                showToast('Menyiapkan berkas: ' + fileName, '📥');
            }
            setTimeout(() => {
                const blob = new Blob([
                    `DOKUMEN RESMI DESA CANTIK (DESCAN) BPS KOLAKA UTARA 2026\n` +
                    `Judul: ${fileName}\n` +
                    `Status: Terverifikasi Standar Satu Data Indonesia (SDI)\n` +
                    `Produsen Data: BPS Kabupaten Kolaka Utara & Pemerintah Desa\n` +
                    `Waktu Cetak: ${new Date().toLocaleString('id-ID')}\n\n` +
                    `Dokumen publikasi monografi & infografis lengkap telah siap diarsipkan.`
                ], { type: 'text/plain;charset=utf-8' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = fileName.endsWith('.pdf') ? fileName.replace('.pdf', '_DESCAN_BPS.txt') : fileName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                if (typeof showToast === 'function') {
                    showToast('Unduhan ' + fileName + ' berhasil disimpan!', '✅');
                }
            }, 500);
        }

        function filterMetadataRows(query) {
            query = (query || '').toLowerCase().trim();
            const rows = document.querySelectorAll('.metadata-row');
            rows.forEach(r => {
                const text = r.textContent.toLowerCase();
                if (!query || text.includes(query)) {
                    r.style.display = '';
                } else {
                    r.style.display = 'none';
                }
            });
        }

        let currentMetaCategory = 'all';
        function filterMetadataCategory(category) {
            currentMetaCategory = category;
            document.querySelectorAll('.meta-pill').forEach(btn => {
                btn.className = 'meta-pill px-3 py-1.5 rounded-lg text-xs font-bold transition cursor-pointer bg-slate-100 hover:bg-slate-200 text-slate-600 shrink-0';
            });
            const activeBtn = document.getElementById('meta-pill-' + category);
            if (activeBtn) {
                activeBtn.className = 'meta-pill active px-3 py-1.5 rounded-lg text-xs font-bold transition cursor-pointer bg-emerald-600 text-white shrink-0';
            }
            const rows = document.querySelectorAll('.metadata-row');
            rows.forEach(r => {
                const cat = r.getAttribute('data-cat') || '';
                if (category === 'all' || cat === category) {
                    r.style.display = '';
                } else {
                    r.style.display = 'none';
                }
            });
            const searchInput = document.getElementById('metadataSearchInput');
            if (searchInput && searchInput.value) {
                filterMetadataRows(searchInput.value);
            }
        }

        function exportMetadataCSV() {
            if (typeof showToast === 'function') {
                showToast('Mengekspor katalog metadata PODES ke CSV...', '📊');
            }
            const rows = [
                ['Kode Variabel', 'Nama Variabel', 'Konsep & Definisi BPS', 'Satuan', 'Klasifikasi', 'Produsen Data'],
                ['PODES-0101', 'Jumlah Penduduk Menurut Jenis Kelamin', 'Seluruh orang yang berdomisili di wilayah geografis desa selama 6 bulan atau lebih', 'Jiwa', 'Numerik Disagregasi L/P', 'Dukcapil & BPS'],
                ['PODES-0102', 'Jumlah Kepala Keluarga (KK)', 'Seseorang atau sekelompok orang yang mendiami bangunan fisik sensus dan pengelolaan makan dari satu dapur', 'Keluarga (KK)', 'Numerik', 'Pemerintah Desa'],
                ['PODES-0201', 'Keberadaan Fasilitas Pendidikan PAUD/TK', 'Ketersediaan sarana prasarana formal/non-formal pendidikan anak usia dini atau TK', 'Unit Sekolah', '1: Ada di Desa, 2: Tidak Ada', 'Kemendikdasmen & BPS'],
                ['PODES-0202', 'Sarana Pelayanan Kesehatan (Pustu / Poskesdes)', 'Keberadaan fasilitas pelayanan kesehatan primer dengan bidan/perawat aktif di desa', 'Unit Fasilitas', '1: Ada di Desa, 2: Tidak Ada', 'Dinas Kesehatan & BPS'],
                ['PODES-0301', 'Sumber Penerangan Utama Bangunan Rumah', 'Jenis energi utama yang digunakan untuk penerangan rumah tangga (PLN vs Non-PLN)', 'Jumlah KK (%)', '1: Listrik PLN, 2: Non-PLN, 3: Non-Listrik', 'PT PLN & BPS'],
                ['PODES-0302', 'Kepemilikan Fasilitas Jamban Sendiri', 'Fasilitas tempat buang air besar dengan tangki septik/SPAL kedap air', 'Jumlah KK (%)', '1: Jamban Sendiri, 2: Bersama, 3: Umum', 'Kemenkes & BPS'],
                ['PODES-0401', 'Komoditas Utama Tanaman Perkebunan', 'Jenis komoditas tanaman tahunan dengan luasan panen atau nilai ekonomi penjualan terbesar', 'Nama & Tonase', '1: Kakao, 2: Cengkeh, 3: Nilam, 4: Kelapa', 'Dinas Perkebunan & BPS'],
                ['PODES-0402', 'Industri Mikro dan Kecil (IMK) Aktif', 'Kegiatan ekonomi produktif mengubah barang dasar dengan pekerja 1-19 orang', 'Unit Usaha', 'Numerik Unit Aktif', 'BPS Kolaka Utara'],
                ['PODES-0501', 'Status Keberadaan BUMDes Berbadan Hukum', 'Badan usaha milik desa yang mengantongi sertifikat badan hukum Kemenkumham', 'Status Legalitas', '1: Berbadan Hukum, 2: Terdaftar, 3: Belum Ada', 'Kemendesa PDTT & BPS'],
                ['PODES-0502', 'Penerapan SISKEUDES Online', 'Pemanfaatan aplikasi Sistem Keuangan Desa berbasis web/jaringan untuk APBDes', 'Status Sistem', '1: Online Terkoneksi, 2: Offline Desktop', 'BPKP & BPS'],
                ['PODES-0601', 'Mitigasi Bencana Alam & Peringatan Dini', 'Ketersediaan rambu evakuasi dan sistem peringatan dini bencana desa', 'Kesiapan Desa', '1: Ada EWS, 2: Tidak Ada', 'BPBD & BPS'],
                ['PODES-0602', 'Pencemaran Lingkungan Pesisir & Air', 'Kondisi perairan laut/pantai yang terkontaminasi limbah dalam 1 tahun terakhir', 'Status Mutu', '1: Bebas Tercemar, 2: Tercemar', 'Dinas Lingkungan Hidup']
            ];

            const csvContent = '\uFEFF' + rows.map(e => e.map(val => `"${val.replace(/"/g, '""')}"`).join(',')).join('\n');
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'Standar_Metadata_PODES_BPS_Kolaka_Utara_2026.csv';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            if (typeof showToast === 'function') {
                showToast('Ekspor metadata berhasil diunduh (CSV)!', '✅');
            }
        }

        function copyAllMetadata() {
            const text = 
`STANDAR METADATA STATISTIK SEKTORAL DESA (PODES 2025/2026)
Badan Pusat Statistik (BPS) Kabupaten Kolaka Utara - Satu Data Indonesia

1. PODES-0101: Jumlah Penduduk Berdasarkan Jenis Kelamin (Satuan: Jiwa)
   Konsep: Seluruh orang yang berdomisili di wilayah geografis desa selama 6 bulan atau lebih.
2. PODES-0102: Jumlah Kepala Keluarga (KK) (Satuan: KK)
   Konsep: Orang atau sekelompok orang yang tinggal bersama dan makan dari satu dapur.
3. PODES-0201: Fasilitas Pendidikan PAUD/TK (Satuan: Unit Sekolah)
4. PODES-0202: Fasilitas Kesehatan Pustu/Poskesdes (Satuan: Unit)
5. PODES-0301: Sumber Penerangan Bangunan Tempat Tinggal (Satuan: % KK)
6. PODES-0302: Jamban Keluarga Sendiri & Tangki Septik (Satuan: % KK)
7. PODES-0401: Komoditas Utama Perkebunan (Kakao, Cengkeh, Nilam)
8. PODES-0402: Industri Mikro dan Kecil / IMK (Satuan: Unit Usaha)
9. PODES-0501: Status Legalitas Badan Hukum BUMDes
10. PODES-0502: Penerapan SISKEUDES Online
11. PODES-0601: Sistem Peringatan Dini Bencana Alam (EWS)
12. PODES-0602: Status Pencemaran Pesisir dan Perairan`;

            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(() => {
                    if (typeof showToast === 'function') showToast('Katalog metadata berhasil disalin ke clipboard!', '📋');
                }).catch(() => {
                    if (typeof showToast === 'function') showToast('Metadata berhasil disalin!', '📋');
                });
            } else if (typeof showToast === 'function') {
                showToast('Metadata berhasil disalin!', '📋');
            }
        }
</script>

    <!-- ============================================================== -->
    <!-- MODAL GANTI AKUN RESMI DESA                                    -->
    <!-- ============================================================== -->
    
        <!-- ============================================================== -->
    <!-- MODAL PENGISIAN DATA PODES (EMBED GOOGLE SPREADSHEET)          -->
    <!-- ============================================================== -->
    <div id="manageDataModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-4 bg-slate-950/80 backdrop-blur-md overflow-y-auto">
        <div class="relative w-full max-w-6xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 animate-in fade-in zoom-in duration-200 flex flex-col max-h-[92vh]">
            
            <!-- Modal Header: Sinkron dengan Menu Sidebar Pengisian Data PODES -->
            <div class="bg-gradient-to-r from-[#072448] via-[#0b2b52] to-[#072448] text-white p-5 sm:p-6 relative flex flex-col sm:flex-row sm:items-center justify-between gap-4 shrink-0">
                <div>
                    <div class="flex items-center gap-2 text-[10px] font-black tracking-widest uppercase text-emerald-300">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Admin Panel • Pengisian Data PODES</span>
                    </div>
                    <h3 class="text-xl font-black text-white mt-1">
                        Pengisian Data PODES &amp; Statistik Desa
                    </h3>
                    <p class="text-xs text-blue-100/90 mt-0.5">
                        Pemutakhiran instrumen PODES via Google Spreadsheet terintegrasi untuk <b id="modalAdminDesaTitle" class="text-amber-300 font-bold podes-active-desa-name">Desa Kamisi</b>.
                    </p>
                </div>
                <div class="flex items-center gap-2 self-end sm:self-auto">
                    <button type="button" onclick="closeManageDataModal(); switchNavMenu('podes');" class="px-3.5 py-1.5 rounded-xl bg-white/15 hover:bg-white/25 text-white text-xs font-bold transition flex items-center gap-1.5 cursor-pointer">
                        <i class="bi bi-arrows-fullscreen"></i>
                        <span>Buka Halaman Penuh</span>
                    </button>
                    <button type="button" onclick="closeManageDataModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-sm font-bold transition cursor-pointer">
                        ✕
                    </button>
                </div>
            </div>

            <!-- Modal Body: Embed Google Spreadsheet Interaktif -->
            <div class="p-4 sm:p-6 space-y-4 overflow-y-auto flex-1">
                <!-- Bar Input Link -->
                <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200/90 space-y-3">
                    <div class="flex flex-col lg:flex-row items-stretch lg:items-center gap-3">
                        <div class="relative flex-1 flex items-center">
                            <span class="absolute left-3.5 text-slate-400 text-sm">
                                <i class="bi bi-link-45deg"></i>
                            </span>
                            <input type="url" id="modalPodesSheetUrlInput" placeholder="Tempel link Google Spreadsheet PODES desa di sini (https://docs.google.com/spreadsheets/d/...)" class="w-full pl-9 pr-20 py-2.5 rounded-xl border border-slate-300 bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-xs font-medium text-slate-900 transition outline-none">
                            <button type="button" onclick="clearPodesSheetInput('modal')" class="absolute right-3 text-slate-400 hover:text-slate-600 text-xs font-bold cursor-pointer">
                                Hapus
                            </button>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <button type="button" onclick="applyPodesSpreadsheetUrl(document.getElementById('modalPodesSheetUrlInput').value)" class="px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs shadow-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                <i class="bi bi-play-circle-fill"></i>
                                <span>Tampilkan Spreadsheet</span>
                            </button>
                            <button type="button" onclick="openPodesInNewTab()" class="px-4 py-2.5 rounded-xl bg-white hover:bg-slate-100 text-slate-700 font-bold text-xs border border-slate-200 transition flex items-center justify-center gap-1.5 cursor-pointer">
                                <i class="bi bi-box-arrow-up-right"></i>
                                <span>Buka di Tab Baru ↗</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center justify-between text-[11px] text-slate-500 pt-1 gap-2 border-t border-slate-200">
                        <div class="flex items-center gap-2">
                            <span>Desa Aktif: <b class="podes-active-desa-name text-slate-800 font-bold">Desa Kamisi</b></span>
                            <span class="text-slate-300">•</span>
                            <span>Tersimpan otomatis di peramban</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="loadDefaultPodesTemplate()" class="text-emerald-700 hover:underline font-bold">
                                📑 Gunakan Template Default
                            </button>
                            <span class="text-slate-300">•</span>
                            <a href="https://drive.google.com/drive/folders/1X24Nxer7Xva8zCJGjdxvGFjwPfMIN5d6" target="_blank" rel="noopener noreferrer" class="text-[#005ea6] hover:underline font-bold">
                                📂 Folder Drive PODES ↗
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal Container Iframe (Height 550px) -->
                <div class="relative w-full h-[550px] rounded-xl border border-slate-200 overflow-hidden bg-white shadow-sm">
                    <div id="modalPodesEmptyState" class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center bg-slate-50/80 z-10 hidden">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl mb-3 shadow-xs border border-emerald-200">
                            <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        </div>
                        <h4 class="text-base font-black text-slate-800">
                            Google Spreadsheet PODES Belum Dihubungkan
                        </h4>
                        <p class="text-xs text-slate-500 max-w-md mt-1 mb-4">
                            Tempel tautan Google Sheets instrumen PODES untuk <b class="podes-active-desa-name text-slate-800">Desa Kamisi</b> di atas.
                        </p>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="loadDefaultPodesTemplate()" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs shadow-xs transition flex items-center gap-1.5 cursor-pointer">
                                <span>Gunakan Template Spreadsheet PODES</span>
                            </button>
                            <a href="https://drive.google.com/drive/folders/1X24Nxer7Xva8zCJGjdxvGFjwPfMIN5d6" target="_blank" rel="noopener noreferrer" class="px-4 py-2 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-300 font-bold text-xs shadow-2xs transition">
                                <span>Buka Folder Drive ↗</span>
                            </a>
                        </div>
                    </div>
                    <iframe id="modalPodesSheetIframe" src="" class="w-full h-full border-0" allow="autoplay; clipboard-write; encrypted-media" loading="lazy" title="Modal Google Sheets PODES Viewer"></iframe>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="p-4 bg-slate-100 border-t border-slate-200 flex items-center justify-between text-xs shrink-0">
                <span class="text-slate-500 font-medium">BPS Kabupaten Kolaka Utara • DESCAN 2026</span>
                <button type="button" onclick="closeManageDataModal()" class="px-4 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 font-bold text-slate-700 cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>
    <div id="switchAccountModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/75 backdrop-blur-md overflow-y-auto">
        <div class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-8">
            <div class="bg-gradient-to-r from-[#0b2545] via-[#005ea6] to-[#0b2545] text-white p-5 relative">
                <button type="button" onclick="closeSwitchAccountModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-sm font-bold transition">
                    ✕
                </button>
                <div class="flex items-center gap-2 text-[10px] font-black tracking-widest uppercase text-amber-300">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span>Sistem Akun BPS DESCAN</span>
                </div>
                <h3 class="text-xl font-black text-white mt-1">
                    Ganti Akun Resmi Desa
                </h3>
                <p class="text-xs text-blue-100/90 mt-1">
                    Pilih salah satu dari 6 akun resmi desa binaan untuk beralih konteks administrasi desa.
                </p>
            </div>

            <div class="p-5 space-y-3">
                <div id="switchAccountList" class="space-y-2 max-h-80 overflow-y-auto pr-1">
                    <!-- Populated dynamically by JS for all 6 villages -->
                </div>
            </div>

            <div class="p-3.5 bg-slate-100 border-t border-slate-200 flex items-center justify-between text-xs">
                <span class="text-slate-500 font-medium">BPS Kolaka Utara • DESCAN</span>
                <button type="button" onclick="closeSwitchAccountModal()" class="px-4 py-1.5 rounded-xl bg-slate-200 hover:bg-slate-300 font-bold text-slate-700 cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL 1: METADATA STATISTIK DESA (STANDAR SATU DATA INDONESIA) -->
    <!-- ============================================================== -->
    <div id="metadataStatistikModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/70 backdrop-blur-xs animate-in fade-in duration-200">
        <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-hidden flex flex-col shadow-2xl border border-slate-200">
            <!-- Modal Header -->
            <div class="bg-[#005ea6] text-white p-5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-xl">
                        📊
                    </div>
                    <div>
                        <h3 class="text-base font-black">Metadata Statistik Sektoral Desa</h3>
                        <p class="text-xs text-blue-100">Kompilasi Standar Data & Variabel Resmi SDI - BPS Kolaka Utara</p>
                    </div>
                </div>
                <button type="button" onclick="closeMetadataModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm cursor-pointer">✕</button>
            </div>
            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto space-y-4 text-xs text-slate-700">
                <div class="p-4 rounded-2xl bg-blue-50/70 border border-blue-100 flex items-center justify-between">
                    <div>
                        <span class="font-extrabold text-[#005ea6] block">Kode Referensi Wilayah SDI:</span>
                        <span class="font-bold text-slate-800 text-sm">74.08 (Kabupaten Kolaka Utara - BPS RI)</span>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 font-black text-[11px]">Terverifikasi</span>
                </div>

                <div class="border border-slate-200 rounded-2xl overflow-hidden">
                    <table class="w-full text-left border-collapse text-[11px]">
                        <thead>
                            <tr class="bg-slate-100 border-b border-slate-200 font-black text-slate-900">
                                <th class="p-3">Nama Variabel</th>
                                <th class="p-3">Definisi Operasional</th>
                                <th class="p-3">Satuan</th>
                                <th class="p-3">Walidata</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium">
                            <tr>
                                <td class="p-3 font-bold text-slate-900">Jumlah Penduduk</td>
                                <td class="p-3">Warga yang bertempat tinggal di wilayah desa sekurang-kurangnya 6 bulan berturut-turut.</td>
                                <td class="p-3">Jiwa</td>
                                <td class="p-3 font-semibold text-[#005ea6]">Dukcapil / BPS</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-bold text-slate-900">Desil Kesejahteraan (P3KE)</td>
                                <td class="p-3">Pengelompokan status desil 1 (sangat miskin) hingga desil 4 berdasarkan pemeringkatan Kemenko PMK.</td>
                                <td class="p-3">Persentase (%)</td>
                                <td class="p-3 font-semibold text-[#005ea6]">Kemenko PMK / BPS</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-bold text-slate-900">Kasus Stunting Aktif</td>
                                <td class="p-3">Balita dengan indeks tinggi badan menurut umur (TB/U) kurang dari -2 standar deviasi.</td>
                                <td class="p-3">Balita</td>
                                <td class="p-3 font-semibold text-[#005ea6]">Dinkes / Posyandu</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-bold text-slate-900">Sex Ratio (Rasio Jenis Kelamin)</td>
                                <td class="p-3">Perbandingan jumlah penduduk laki-laki terhadap 100 penduduk perempuan di wilayah desa.</td>
                                <td class="p-3">Rasio (%)</td>
                                <td class="p-3 font-semibold text-[#005ea6]">BPS Kolaka Utara</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="p-4 bg-slate-50 border-t border-slate-200 flex justify-end">
                <button type="button" onclick="closeMetadataModal()" class="px-5 py-2 rounded-xl bg-slate-900 text-white font-bold text-xs hover:bg-slate-800 transition">Tutup Metadata</button>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL 2: INFORMASI AGEN STATISTIK DESA (KADER BINAAN BPS)       -->
    <!-- ============================================================== -->
    <div id="agenDesaModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/70 backdrop-blur-xs animate-in fade-in duration-200">
        <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-hidden flex flex-col shadow-2xl border border-slate-200">
            <!-- Modal Header -->
            <div class="bg-[#0b2545] text-white p-5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-lg">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-black">Informasi Agen Statistik Desa</h3>
                        <p class="text-xs text-blue-100">Kader Aparatur & Agen Desa Cantik Terverifikasi BPS Kolaka Utara</p>
                    </div>
                </div>
                <button type="button" onclick="closeAgenDesaModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm cursor-pointer">✕</button>
            </div>
            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto space-y-4 text-xs text-slate-700">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Agen 1 -->
                    <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50 space-y-2">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-[#005ea6] text-white font-black flex items-center justify-center text-base">
                                RF
                            </div>
                            <div>
                                <h4 class="font-black text-slate-900 text-sm">Rahmawati Fauziah, S.Kom</h4>
                                <span class="text-[10px] font-extrabold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">Koordinator Agen Statistik</span>
                            </div>
                        </div>
                        <div class="pt-2 border-t border-slate-200 text-[11px] space-y-1">
                            <p><b>SK Penetapan:</b> SK Kades No. 14/KPTS/2026</p>
                            <p><b>Tugas Utama:</b> Penginputan Monografi & Validasi DTKS</p>
                            <p><b>Kontak:</b> 0852-9988-7711</p>
                        </div>
                    </div>

                    <!-- Agen 2 -->
                    <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50 space-y-2">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-amber-500 text-slate-950 font-black flex items-center justify-center text-base">
                                AF
                            </div>
                            <div>
                                <h4 class="font-black text-slate-900 text-sm">Ahmad Fauzan Pratama</h4>
                                <span class="text-[10px] font-extrabold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full border border-blue-200">Agen Geospasial Wilayah</span>
                            </div>
                        </div>
                        <div class="pt-2 border-t border-slate-200 text-[11px] space-y-1">
                            <p><b>SK Penetapan:</b> SK Kades No. 15/KPTS/2026</p>
                            <p><b>Tugas Utama:</b> Geotagging Potensi Sektoral & Peta Dusun</p>
                            <p><b>Kontak:</b> 0813-4455-6622</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 space-y-1">
                    <span class="font-black block">Fungsi & Peran Agen Desa Cantik:</span>
                    <p class="text-[11px] leading-relaxed">
                        Agen Desa Cantik bertindak sebagai jembatan antara aparatur desa dan BPS dalam menjaga standarisasi data, memastikan metadata sesuai kaidah Satu Data Indonesia, dan memutakhirkan profil statistik desa berkala.
                    </p>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="p-4 bg-slate-50 border-t border-slate-200 flex justify-end">
                <button type="button" onclick="closeAgenDesaModal()" class="px-5 py-2 rounded-xl bg-slate-900 text-white font-bold text-xs hover:bg-slate-800 transition">Tutup Informasi</button>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL 3: HUBUNGI PELAYANAN STATISTIK TERPADU (PST BPS)         -->
    <!-- ============================================================== -->
    <div id="pstBpsModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/70 backdrop-blur-xs animate-in fade-in duration-200">
        <div class="bg-white rounded-3xl max-w-xl w-full max-h-[90vh] overflow-hidden flex flex-col shadow-2xl border border-slate-200">
            <!-- Modal Header -->
            <div class="bg-[#004077] text-white p-5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-xl">
                        📞
                    </div>
                    <div>
                        <h3 class="text-base font-black">Pelayanan Statistik Terpadu (PST)</h3>
                        <p class="text-xs text-blue-100">BPS Kabupaten Kolaka Utara - Layanan Konsultasi & Data Resmi</p>
                    </div>
                </div>
                <button type="button" onclick="closePstModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm cursor-pointer">✕</button>
            </div>
            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto space-y-4 text-xs text-slate-700">
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-950 space-y-1">
                    <span class="font-black text-sm block">Hubungi Tim Pembina Desa Cantik:</span>
                    <p class="text-[11px]">Dapatkan pendampingan langsung dari Statistisi Ahli BPS Kabupaten Kolaka Utara untuk pengolahan monografi dan rekomendasi statistik.</p>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50 border border-slate-200">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-black text-lg shrink-0">
                            💬
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase block">WhatsApp Konsultasi PST:</span>
                            <a href="https://wa.me/6281140017408" target="_blank" class="text-sm font-black text-emerald-700 hover:underline">0811-4001-7408 (PST BPS Kolut)</a>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50 border border-slate-200">
                        <div class="w-10 h-10 rounded-xl bg-blue-500 text-white flex items-center justify-center font-black text-lg shrink-0">
                            ✉️
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase block">Email Resmi PST:</span>
                            <span class="text-sm font-black text-blue-700">bps7408@bps.go.id</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50 border border-slate-200">
                        <div class="w-10 h-10 rounded-xl bg-amber-500 text-white flex items-center justify-center font-black text-lg shrink-0">
                            🏢
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase block">Alamat Kantor Pelayanan:</span>
                            <span class="text-xs font-bold text-slate-800">Kompleks Perkantoran Pemkab Kolaka Utara, Lasusua</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="p-4 bg-slate-50 border-t border-slate-200 flex justify-end">
                <button type="button" onclick="closePstModal()" class="px-5 py-2 rounded-xl bg-slate-900 text-white font-bold text-xs hover:bg-slate-800 transition">Tutup Layanan</button>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL 4: LAYANAN & PENGADUAN WARGA DESA                        -->
    <!-- ============================================================== -->
    <div id="layananModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/70 backdrop-blur-xs animate-in fade-in duration-200">
        <div class="bg-white rounded-3xl max-w-lg w-full max-h-[90vh] overflow-hidden flex flex-col shadow-2xl border border-slate-200">
            <div class="bg-[#094074] text-white p-5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-xl">
                        💬
                    </div>
                    <div>
                        <h3 class="text-base font-black">Layanan & Pengaduan Warga</h3>
                        <p class="text-xs text-blue-100">Portal Layanan Masyarakat & Validasi Bansos Desa</p>
                    </div>
                </div>
                <button type="button" onclick="closeLayananModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm cursor-pointer">✕</button>
            </div>
            <div class="p-6 space-y-4 text-xs text-slate-700">
                <form onsubmit="event.preventDefault(); alert('Terima kasih! Aduan/Permintaan data Anda telah tercatat pada register desa.'); closeLayananModal();" class="space-y-3">
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Nama Lengkap Pemohon / Warga</label>
                        <input type="text" required placeholder="Masukkan nama Anda" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-[#005ea6] focus:outline-none">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Nomor WhatsApp / HP</label>
                        <input type="tel" required placeholder="08xxxxxxxxxx" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-[#005ea6] focus:outline-none">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Kategori Permintaan</label>
                        <select class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-[#005ea6] focus:outline-none">
                            <option>Validasi DTKS & Bantuan Sosial</option>
                            <option>Permohonan Data Monografi Wilayah</option>
                            <option>Pengurusan Surat Keterangan Domisili/Usaha</option>
                            <option>Aduan Fasilitas Publik / Dusun</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Isi Pesan / Keterangan</label>
                        <textarea rows="3" required placeholder="Tuliskan detail permohonan atau aduan Anda..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-[#005ea6] focus:outline-none"></textarea>
                    </div>
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-[#005ea6] to-[#0b2545] text-white font-black text-xs shadow-md hover:shadow-lg transition">Kirimkan Permintaan</button>
                </form>
            </div>
            <div class="p-4 bg-slate-50 border-t border-slate-200 flex justify-end">
                <button type="button" onclick="closeLayananModal()" class="px-5 py-2 rounded-xl bg-slate-200 text-slate-700 font-bold text-xs hover:bg-slate-300 transition">Batal</button>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL LMS 1: PRE-TEST & POST-TEST INTERAKTIF (FULL SCREEN)        -->
    <!-- Menampilkan Ujian Pilihan Ganda, Timer Hitung Mundur, & Hasil Skor -->
    <!-- ============================================================== -->
    <div id="pretestModal" class="fixed inset-0 z-[9999] hidden bg-slate-50 flex flex-col w-screen h-screen overflow-hidden animate-in fade-in duration-150" style="position:fixed;top:0;left:0;right:0;bottom:0;width:100vw;height:100vh;">
        <!-- 1. Sticky Top Header Bar (Bersih, Rapi, Tanpa Elemen Nyasar) -->
        <div class="shrink-0 bg-gradient-to-r from-[#005ea6] via-[#09487d] to-[#0b2545] text-white px-4 sm:px-8 py-3.5 sm:py-4 flex items-center justify-between shadow-md z-20">
            <!-- Sisi Kiri: Identitas Tes -->
            <div class="flex items-center gap-3 min-w-0">
                <div id="examHeaderIcon" class="w-10 h-10 rounded-2xl bg-white/15 flex items-center justify-center text-xl shadow-inner shrink-0">📝</div>
                <div class="min-w-0">
                    <div class="text-[10px] sm:text-[11px] font-black uppercase tracking-widest text-amber-300 truncate">LMS Desa Cantik BPS Kolaka Utara</div>
                    <h3 id="examHeaderTitle" class="text-sm sm:text-base lg:text-lg font-black tracking-tight truncate">[1. PRE-TEST] Uji Kemampuan Awal Aparatur</h3>
                </div>
            </div>

            <!-- Sisi Kanan: Timer, Progres & Tombol Tutup -->
            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <!-- Timer Hitung Mundur -->
                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-white/10 text-amber-300 font-mono font-bold text-xs border border-white/15 shadow-2xs">
                    <i class="bi bi-clock-history text-amber-400"></i>
                    <span id="examTimerText">Sisa Waktu: 14:59</span>
                </div>
                <!-- Progres Soal -->
                <div class="hidden sm:flex items-center px-3 py-1.5 rounded-xl bg-white/10 text-white font-bold text-xs border border-white/15 shadow-2xs">
                    <span id="examProgressText">Soal 1 dari 10</span>
                </div>
                <!-- Tombol Tutup / Batal -->
                <button type="button" onclick="confirmCloseExamModal()" class="px-3 py-1.5 rounded-xl bg-white/10 hover:bg-rose-600 active:scale-95 text-white font-bold text-xs transition border border-white/15 flex items-center gap-1.5 cursor-pointer shadow-2xs" title="Tutup / Batal Ujian">
                    <i class="bi bi-x-lg text-sm"></i>
                    <span class="hidden sm:inline">Tutup / Batal</span>
                </button>
            </div>
        </div>

        <!-- 2. Area Konten Lembar Ujian Utama (Terpusat & Responsif) -->
        <div id="examSheetArea" class="flex-1 w-full overflow-y-auto bg-slate-100/70 p-4 sm:p-6 lg:p-8 flex flex-col items-center justify-start">
            
            <!-- Panel Lembar Pertanyaan Aktif -->
            <div id="examQuestionView" class="w-full max-w-3xl bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200/90 flex flex-col justify-between space-y-6">
                <!-- Bilah Indikator Progres Persentase -->
                <div>
                    <div class="flex items-center justify-between text-xs font-bold text-slate-500 mb-2">
                        <span id="examStepLabel">Progres Pengerjaan Soal</span>
                        <span id="examPercentLabel" class="text-[#005ea6] font-black">10% Selesai</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                        <div id="examProgressBar" class="h-full bg-gradient-to-r from-blue-600 to-emerald-500 rounded-full transition-all duration-300" style="width: 10%;"></div>
                    </div>
                </div>

                <!-- Kotak Pertanyaan & Topik -->
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-2 flex-wrap">
                        <span id="examQuestionBadge" class="text-xs font-black uppercase tracking-wider text-blue-800 bg-blue-50 border border-blue-200 px-3 py-1 rounded-lg">
                            Soal No. 1
                        </span>
                        <span id="examQuestionTopic" class="text-xs font-bold text-slate-400">
                            Prinsip Satu Data Indonesia
                        </span>
                    </div>

                    <h2 id="examQuestionText" class="text-base sm:text-lg font-black text-slate-900 leading-snug">
                        Memuat pertanyaan...
                    </h2>

                    <!-- 4 Kartu Opsi Pilihan Jawaban (A, B, C, D) -->
                    <div id="examOptionsContainer" class="space-y-3 pt-2">
                        <!-- Diisi secara dinamis oleh JavaScript -->
                    </div>
                </div>

                <!-- Navigasi Bawah & Pintasan Nomor Soal -->
                <div class="pt-6 border-t border-slate-100 space-y-4">
                    <!-- Deretan Tombol Pintasan Nomor Soal Cepat -->
                    <div class="flex flex-wrap items-center justify-center gap-1.5 sm:gap-2" id="examNumberPills">
                        <!-- Diisi secara dinamis (1..10 atau 1..15) -->
                    </div>

                    <!-- Tombol Navigasi Sebelumnya / Berikutnya / Selesai -->
                    <div class="flex items-center justify-between gap-3 pt-2">
                        <button type="button" id="btnExamPrev" onclick="navigateExamQuestion(-1)" class="px-4 py-2.5 rounded-xl border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 text-xs font-bold transition flex items-center gap-1.5 cursor-pointer disabled:opacity-30 disabled:pointer-events-none">
                            <i class="bi bi-chevron-left"></i>
                            <span>Soal Sebelumnya</span>
                        </button>

                        <button type="button" id="btnExamNext" onclick="navigateExamQuestion(1)" class="px-5 py-2.5 rounded-xl bg-[#005ea6] hover:bg-[#004e8a] text-white text-xs font-bold transition flex items-center gap-1.5 cursor-pointer shadow-sm">
                            <span>Soal Berikutnya</span>
                            <i class="bi bi-chevron-right"></i>
                        </button>

                        <button type="button" id="btnExamSubmit" onclick="confirmSubmitExam()" class="hidden px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 active:scale-95 text-white text-xs font-black transition flex items-center gap-1.5 cursor-pointer shadow-md">
                            <i class="bi bi-check2-circle text-sm"></i>
                            <span>Selesai &amp; Kirim Jawaban</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Panel Ringkasan Hasil Nilai (Ditampilkan Setelah Selesai) -->
            <div id="examResultView" class="hidden w-full max-w-2xl bg-white rounded-3xl p-6 sm:p-9 shadow-xl border border-slate-200/90 text-center space-y-6 animate-in zoom-in-95 duration-200 my-auto">
                <!-- Diisi secara dinamis oleh renderExamResult() -->
            </div>

        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL DETAIL PUBLIKASI DOKUMEN RESMI STATISTIK SEKTORAL        -->
    <!-- ============================================================== -->
        <!-- ============================================================== -->
    <!-- MODAL GALERI FOTO DESA RESMI & INTERAKTIF                        -->
    <!-- Menampilkan dokumentasi pembinaan, potensi, pencarian & upload  -->
    <!-- ============================================================== -->
    <div id="galeriDesaModal" class="hidden fixed inset-0 z-[9999] bg-slate-950/85 backdrop-blur-md flex items-center justify-center p-2 sm:p-5 lg:p-6 animate-in fade-in duration-200" style="z-index: 9999;">
        <div class="bg-white rounded-3xl w-full max-w-6xl max-h-[92vh] flex flex-col shadow-2xl overflow-hidden border border-slate-200/90 ring-1 ring-black/5">
            <!-- Modal Header: Ringkas & Elegan (Bebas dari Navbar Duplikat) -->
            <div class="bg-gradient-to-r from-emerald-800 via-teal-800 to-[#0b2545] text-white p-5 sm:p-6 flex items-center justify-between shrink-0 shadow-md">
                <div class="flex items-center gap-3.5">
                    <div class="w-11 h-11 rounded-2xl bg-white/10 flex items-center justify-center text-xl shrink-0 shadow-inner border border-white/15">
                        <i class="bi bi-images text-emerald-200"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-base sm:text-lg font-black text-white leading-tight">
                                Galeri Dokumentasi &amp; Potensi Desa Cantik
                            </h3>
                            <span class="hidden sm:inline-block px-2.5 py-0.5 rounded-full bg-emerald-400/20 text-emerald-200 border border-emerald-400/30 text-[10px] font-black uppercase tracking-wider">
                                Resmi BPS
                            </span>
                        </div>
                        <p class="text-xs text-emerald-100/85 mt-0.5">
                            Dokumentasi pembinaan BPS, potensi komoditas, dan pelayanan 6 desa binaan
                        </p>
                    </div>
                </div>
                <button type="button" onclick="closeGaleriDesaModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-rose-600 text-white flex items-center justify-center font-bold text-sm transition cursor-pointer shadow-xs active:scale-95" title="Tutup Galeri">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <!-- Toolbar Interaktif: Filter Kategori & Pencarian -->
            <div class="px-5 py-3 border-b border-slate-200 bg-slate-50 flex flex-col sm:flex-row sm:items-center justify-between gap-3 shrink-0">
                <!-- Category Filter Tabs -->
                <div class="flex items-center gap-2 overflow-x-auto pb-1 sm:pb-0 scrollbar-none" id="galeriModalFilterTabs">
                    <button type="button" onclick="filterGaleriPhotos('all', this)" class="galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-emerald-600 text-white shadow-xs cursor-pointer whitespace-nowrap">
                        Semua Foto (8)
                    </button>
                    <button type="button" onclick="filterGaleriPhotos('pembinaan', this)" class="galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Pembinaan BPS
                    </button>
                    <button type="button" onclick="filterGaleriPhotos('potensi', this)" class="galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Potensi &amp; Kakao
                    </button>
                    <button type="button" onclick="filterGaleriPhotos('bahari', this)" class="galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Pesona Bahari &amp; Alam
                    </button>
                    <button type="button" onclick="filterGaleriPhotos('pelayanan', this)" class="galeri-filter-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Pelayanan Desa
                    </button>
                </div>

                <!-- Input Pencarian Foto & Indikator Jumlah -->
                <div class="flex items-center gap-2 shrink-0">
                    <div class="relative w-full sm:w-60">
                        <i class="bi bi-search absolute left-3 top-2.5 text-slate-400 text-xs"></i>
                        <input type="text" id="galeriSearchInput" oninput="searchGaleriPhotos(this.value)" placeholder="Cari foto atau desa..." class="w-full pl-8 pr-3 py-1.5 rounded-xl border border-slate-200 bg-white text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition">
                    </div>
                </div>
            </div>

            <!-- Photo Grid Kontainer Estetik (8 Kartu Lengkap 16:9 Thumbnail & Badge Desa) -->
            <div id="galeriPhotosGrid" class="flex-1 overflow-y-auto p-4 sm:p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 bg-slate-50/50">
                <!-- Dynamically populated via renderGaleriPhotos() -->
            </div>

            <!-- Modal Footer -->
            <div class="p-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between text-xs text-slate-500 shrink-0">
                <span class="flex items-center gap-1.5">
                    <i class="bi bi-info-circle text-emerald-600"></i>
                    <span>Klik pada foto atau tombol Perbesar untuk melihat resolusi penuh (Lightbox).</span>
                </span>
                <button type="button" onclick="closeGaleriDesaModal()" class="px-5 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold transition cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL UNGGAH / TAMBAH FOTO BARU OLEH ADMIN DESA                -->
    <!-- ============================================================== -->
    <div id="modalUploadFotoDesa" class="hidden fixed inset-0 z-60 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-3 sm:p-4 animate-in fade-in duration-200">
        <div class="bg-white rounded-3xl w-full max-w-lg max-h-[92vh] flex flex-col shadow-2xl overflow-hidden border border-slate-200">
            <!-- Header Upload Modal -->
            <div class="p-4 sm:p-5 border-b border-slate-200 bg-gradient-to-r from-purple-700 via-indigo-700 to-purple-800 text-white flex items-center justify-between shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-xl shrink-0">
                        <i class="bi bi-cloud-arrow-up text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-black text-white leading-tight">Unggah Dokumentasi Foto Desa</h3>
                        <p class="text-xs text-purple-100/90 mt-0.5">
                            Target: <span id="uploadModalVillageName" class="font-bold underline text-amber-300">Desa Kamisi</span>
                        </p>
                    </div>
                </div>
                <button type="button" onclick="closeUploadFotoModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-sm font-bold transition cursor-pointer">
                    ✕
                </button>
            </div>

            <!-- Form Body -->
            <form id="formUploadFotoDesa" onsubmit="saveNewGaleriFoto(event)" class="p-4 sm:p-6 overflow-y-auto space-y-4 flex-1 text-slate-800">
                <!-- Judul Foto -->
                <div>
                    <label class="block text-xs font-black text-slate-700 uppercase tracking-wider mb-1.5">
                        Judul Dokumentasi Foto <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" id="inputUploadTitle" placeholder="Contoh: Bimtek Standarisasi Data PODES 2026" required
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-400">
                </div>

                <!-- Grid Kategori & Tanggal -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-black text-slate-700 uppercase tracking-wider mb-1.5">
                            Kategori Kegiatan <span class="text-rose-500">*</span>
                        </label>
                        <select id="inputUploadCat" class="w-full px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-purple-400">
                            <option value="pembinaan">Pembinaan Desa Cantik (BPS)</option>
                            <option value="potensi">Potensi Wilayah &amp; UMKM</option>
                            <option value="alam">Pesona Alam &amp; Pesisir</option>
                            <option value="pelayanan">Layanan Desa &amp; Kesehatan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-black text-slate-700 uppercase tracking-wider mb-1.5">
                            Tanggal Dokumentasi <span class="text-rose-500">*</span>
                        </label>
                        <input type="date" id="inputUploadDate" required
                            class="w-full px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-purple-400">
                    </div>
                </div>

                <!-- Pilihan Sumber Gambar -->
                <div class="space-y-2">
                    <label class="block text-xs font-black text-slate-700 uppercase tracking-wider">
                        Pilih / Masukkan Berkas Gambar <span class="text-rose-500">*</span>
                    </label>
                    
                    <!-- File Input Dari Komputer / HP -->
                    <div class="p-3.5 rounded-2xl border-2 border-dashed border-purple-200 bg-purple-50/40 hover:bg-purple-50/70 transition text-center">
                        <input type="file" id="inputUploadFile" accept="image/*" onchange="handlePhotoFileSelect(event)" class="hidden">
                        <label for="inputUploadFile" class="cursor-pointer block">
                            <i class="bi bi-image text-2xl text-purple-600 block mb-1"></i>
                            <span class="text-xs font-bold text-purple-700 block">Klik untuk memilih file gambar dari komputer/HP</span>
                            <span class="text-[10px] text-slate-400 block mt-0.5">Format JPG, PNG, atau WebP (Maksimal 5MB)</span>
                        </label>
                    </div>

                    <!-- Pilihan Alternatif Tautan / URL Online -->
                    <div class="relative flex items-center">
                        <div class="flex-grow border-t border-slate-200"></div>
                        <span class="shrink-0 px-2 text-[10px] text-slate-400 font-bold uppercase tracking-wider">atau gunakan tautan / URL</span>
                        <div class="flex-grow border-t border-slate-200"></div>
                    </div>

                    <div class="relative">
                        <i class="bi bi-link-45deg absolute left-3 top-2.5 text-slate-400 text-sm"></i>
                        <input type="url" id="inputUploadUrl" oninput="handlePhotoUrlInput(this.value)" placeholder="https://images.unsplash.com/... (URL gambar web)"
                            class="w-full pl-8 pr-3 py-2 rounded-xl border border-slate-200 bg-white text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-400">
                    </div>

                    <!-- Live Image Preview Box -->
                    <div id="uploadPhotoPreviewBox" class="hidden mt-2 relative rounded-2xl overflow-hidden border border-purple-200 bg-slate-900 aspect-video flex items-center justify-center">
                        <img id="uploadPhotoPreviewImg" src="" alt="Pratinjau Foto" class="w-full h-full object-cover">
                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-2.5 flex items-center justify-between text-white text-[11px]">
                            <span id="uploadPhotoPreviewInfo" class="font-bold truncate max-w-[240px]">Pratinjau Foto</span>
                            <button type="button" onclick="removeUploadPreview()" class="px-2 py-0.5 rounded-md bg-rose-600 hover:bg-rose-700 text-white text-[10px] font-bold transition cursor-pointer">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi / Ringkasan Kegiatan -->
                <div>
                    <label class="block text-xs font-black text-slate-700 uppercase tracking-wider mb-1.5">
                        Keterangan Singkat / Ringkasan Dokumentasi
                    </label>
                    <textarea id="inputUploadCaption" rows="2" placeholder="Tuliskan keterangan kegiatan, aparatur yang hadir, atau hasil yang dicapai..."
                        class="w-full px-3.5 py-2 rounded-xl border border-slate-200 bg-white text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-400 resize-none"></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2.5">
                    <button type="button" onclick="closeUploadFotoModal()" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition cursor-pointer">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-700 hover:from-purple-700 hover:to-indigo-800 text-white text-xs font-black shadow-md shadow-purple-500/25 active:scale-95 transition flex items-center gap-1.5 cursor-pointer">
                        <i class="bi bi-check2-circle text-sm"></i>
                        <span>Simpan ke Galeri Desa</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL LIGHTBOX FULLSCREEN ZOOM FOTO DOKUMENTASI                -->
    <!-- Menampilkan foto resolusi penuh dengan navigasi (Next/Prev)    -->
    <!-- ============================================================== -->
    <div id="galeriLightboxModal" class="hidden fixed inset-0 z-[10000] bg-slate-950/95 backdrop-blur-xl flex items-center justify-center p-2 sm:p-6 animate-in fade-in duration-200" style="z-index: 10000;">
        <div class="relative w-full max-w-5xl bg-slate-900/90 rounded-3xl overflow-hidden shadow-2xl border border-slate-800/80 flex flex-col max-h-[96vh]">
            <!-- Lightbox Topbar -->
            <div class="p-3.5 sm:p-4 bg-slate-900 border-b border-slate-800 flex items-center justify-between text-white shrink-0">
                <div class="flex items-center gap-2.5">
                    <span id="lightboxBadge" class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-[10px] font-black uppercase tracking-wider">
                        Dokumentasi Resmi
                    </span>
                    <span id="lightboxDate" class="text-xs text-slate-400 font-semibold hidden sm:inline">2025/2026</span>
                    <span id="lightboxCounter" class="px-2.5 py-0.5 rounded-full bg-white/10 text-slate-200 text-[11px] font-black tracking-wide border border-white/10">
                        1 / 8
                    </span>
                </div>
                <div class="flex items-center gap-2">
                    <button id="lightboxDownloadBtn" type="button" class="px-3.5 py-1.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-bold transition flex items-center gap-1.5 cursor-pointer" title="Unduh Foto Ini">
                        <i class="bi bi-download"></i>
                        <span class="hidden sm:inline">Unduh Foto</span>
                    </button>
                    <button type="button" onclick="closeGaleriLightbox()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-sm font-bold transition cursor-pointer" title="Tutup (Esc)">
                        ✕
                    </button>
                </div>
            </div>

            <!-- Lightbox Image Center dengan Navigasi Panah Mengambang -->
            <div class="relative flex-1 overflow-hidden bg-black/90 flex items-center justify-center p-2 sm:p-4 min-h-[350px]">
                <!-- Tombol Navigasi Sebelumnya (Prev) -->
                <button type="button" onclick="prevLightboxPhoto()" class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/60 hover:bg-emerald-600/80 text-white flex items-center justify-center transition-all duration-200 border border-white/20 backdrop-blur-md cursor-pointer z-20 shadow-xl active:scale-90" title="Foto Sebelumnya (Panah Kiri ←)">
                    <i class="bi bi-chevron-left text-lg"></i>
                </button>

                <!-- Foto Resolusi Tinggi -->
                <img id="lightboxImg" src="" alt="Dokumentasi Penuh" class="max-h-[68vh] max-w-full object-contain rounded-2xl shadow-2xl transition-all duration-300 select-none">

                <!-- Tombol Navigasi Selanjutnya (Next) -->
                <button type="button" onclick="nextLightboxPhoto()" class="absolute right-3 sm:right-5 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/60 hover:bg-emerald-600/80 text-white flex items-center justify-center transition-all duration-200 border border-white/20 backdrop-blur-md cursor-pointer z-20 shadow-xl active:scale-90" title="Foto Selanjutnya (Panah Kanan →)">
                    <i class="bi bi-chevron-right text-lg"></i>
                </button>
            </div>

            <!-- Lightbox Caption Footer -->
            <div class="p-4 bg-slate-900 border-t border-slate-800 text-white shrink-0 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="min-w-0">
                    <h4 id="lightboxTitle" class="font-black text-sm sm:text-base text-white truncate">Judul Dokumentasi Foto</h4>
                    <p id="lightboxCaption" class="text-xs text-slate-400 mt-0.5 leading-relaxed line-clamp-2">Keterangan dokumentasi kegiatan resmi desa.</p>
                </div>
                <div class="text-[10px] text-slate-500 font-medium shrink-0 hidden md:block">
                    Navigasi: <kbd class="px-1.5 py-0.5 rounded bg-slate-800 text-slate-300 border border-slate-700">←</kbd> <kbd class="px-1.5 py-0.5 rounded bg-slate-800 text-slate-300 border border-slate-700">→</kbd> • Tutup: <kbd class="px-1.5 py-0.5 rounded bg-slate-800 text-slate-300 border border-slate-700">Esc</kbd>
                </div>
            </div>
        </div>
    </div>

    <div id="publikasiDocModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-4 bg-slate-950/80 backdrop-blur-sm overflow-y-auto">
        <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 animate-in fade-in zoom-in duration-200">
            <!-- Header -->
            <div id="pubModalHeader" class="bg-gradient-to-r from-[#005ea6] to-[#072448] text-white p-5 sm:p-6 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div id="pubModalIcon" class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-xl">📄</div>
                    <div>
                        <div id="pubModalTag" class="text-[10px] font-black uppercase tracking-wider text-amber-300">PUBLIKASI RESMI BPS KAB. KOLAKA UTARA</div>
                        <h3 id="pubModalTitle" class="text-base sm:text-lg font-black text-white">Monografi Statistik Sektoral Desa Kalu Kaluku 2026</h3>
                    </div>
                </div>
                <button type="button" onclick="closePublikasiDocModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm cursor-pointer">✕</button>
            </div>

            <!-- Body -->
            <div id="pubModalBody" class="p-6 space-y-4 text-xs text-slate-700 max-h-[70vh] overflow-y-auto">
                <!-- Injected dynamically -->
            </div>

            <!-- Footer -->
            <div class="p-4 bg-slate-50 border-t border-slate-200 flex flex-wrap items-center justify-between gap-3">
                <span id="pubModalFootnote" class="text-[11px] text-slate-500 font-medium">BPS Kabupaten Kolaka Utara • Terbina Satu Data Indonesia</span>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="triggerPubDownload()" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs transition flex items-center gap-1.5 cursor-pointer">
                        <span>📥 Unduh Berkas Lengkap</span>
                    </button>
                    <button type="button" onclick="closePublikasiDocModal()" class="px-4 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold text-xs transition cursor-pointer">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>