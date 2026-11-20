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
        
        /* 3D Editorial Profil Desa (KEPOS Style) */
        @keyframes float3D {
            0%, 100% { transform: translateY(0px) rotate(0deg) translateZ(0); }
            50% { transform: translateY(-8px) rotate(1deg) translateZ(15px); }
        }
        .animate-float-3d {
            animation: float3D 6s ease-in-out infinite;
        }
        .tilt-card-3d {
            transition: transform 0.2s cubic-bezier(0.2, 0.8, 0.4, 1), box-shadow 0.2s ease;
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        .tilt-card-3d:hover {
            box-shadow: 0 20px 30px -10px rgba(22, 56, 41, 0.2);
        }
        .nature-card-dark {
            background: linear-gradient(145deg, #163829 0%, #1e4a37 60%, #112e21 100%);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        /* ===== DESCAN SIDEBAR THEME ===== */
        :root { --dc-green:#0f6b4a; --dc-green-dark:#0a4d36; --dc-mint:#6ee7b7; --dc-mint-bg:#ecfdf5; --dc-line:#e5e9e7; --dc-ink:#0f1f1a; --dc-muted:#6b7a74; }
        body { background-color:#f4f7f5; }
        :root { --dc-sidebar-w: 260px; }
        @media (min-width: 1024px) {
            body.dc-shell { padding-left: var(--dc-sidebar-w) !important; }
            #dcSidebar { transform: translateX(0) !important; width: var(--dc-sidebar-w) !important; display: flex !important; }
        }
        #dcSidebar { position:fixed; top:0; bottom:0; left:0; width:var(--dc-sidebar-w); background:#fff; border-right:1px solid var(--dc-line); z-index:50; display:flex; flex-direction:column; }
        @media (max-width: 1023px) { #dcSidebar { transform:translateX(-100%); transition:transform .25s ease; } #dcSidebar.open { transform:translateX(0); box-shadow:0 0 40px rgba(0,0,0,.25); } }
        .dc-nav-label { display:flex; align-items:center; gap:.45rem; font-size:10px; font-weight:800; letter-spacing:.1em; text-transform:uppercase; color:#8a9a93; padding:0 .5rem; margin:1.2rem 0 .5rem; }
        .dc-nav-label::before { content:""; width:14px; height:3px; border-radius:99px; background:linear-gradient(90deg,#0f6b4a,#6ee7b7); }
        .nav-tab, .dc-nav-item {
            --c:#0f6b4a; --c2:#17a06d; --cbg:#e3f6ec;
            display:flex !important; align-items:center; gap:.7rem; width:100%; text-align:left;
            padding:.45rem .6rem !important; border-radius:.8rem !important; margin-bottom:.2rem;
            font-size:.8125rem !important; font-weight:600 !important; color:#34443d !important;
            background:transparent !important; border:1px solid transparent !important; cursor:pointer; transition:all .18s ease;
        }
        .dc-ico { width:30px; height:30px; border-radius:.6rem; display:inline-flex; align-items:center; justify-content:center; flex-shrink:0; background:var(--cbg); color:var(--c); transition:all .18s ease; }
        .dc-ico svg { width:16px; height:16px; fill:none; stroke:currentColor; stroke-width:2; stroke-linecap:round; stroke-linejoin:round; }
        .dc-ico i { font-size:15px; line-height:1; display:flex; align-items:center; justify-content:center; }
        .nav-tab:hover:not(.active), .dc-nav-item:hover { background:color-mix(in srgb, var(--c) 8%, #fff) !important; }
        .nav-tab:hover:not(.active) .dc-ico, .dc-nav-item:hover .dc-ico { background:var(--c); color:#fff; }
        .nav-tab.active { background:linear-gradient(135deg, var(--c), var(--c2)) !important; color:#fff !important; font-weight:700 !important; box-shadow:0 8px 16px -8px var(--c) !important; border-bottom:1px solid transparent !important; }
        .nav-tab.active .dc-ico { background:rgba(255,255,255,.22); color:#fff; }
        .nav-tab.has-active { background:color-mix(in srgb, var(--c) 9%, #fff) !important; color:var(--c) !important; }
        .nav-tab.has-active .dc-ico { background:var(--c); color:#fff; }
        .dc-caret { margin-left:auto; font-size:.7rem; opacity:.7; transition:transform .2s; }
        .dc-caret.open { transform:rotate(180deg); }
        .dc-sub { margin:0 0 .35rem 1.35rem; padding-left:.6rem; border-left:2px solid #e1e8e4; }
        .dc-sub-item { --c:#059669; display:flex; align-items:center; gap:.55rem; width:100%; text-align:left; padding:.42rem .65rem; border-radius:.55rem; font-size:.78rem; font-weight:600; color:#4b5b54; background:transparent; border:0; cursor:pointer; margin-bottom:.1rem; transition:all .15s; }
        .dc-sub-item::before { content:""; width:8px; height:8px; border-radius:50%; background:var(--c); opacity:.5; flex-shrink:0; }
        .dc-sub-item:hover { background:color-mix(in srgb, var(--c) 8%, #fff); }
        .dc-sub-item.active { background:color-mix(in srgb, var(--c) 13%, #fff); color:var(--c); font-weight:800; }
        .dc-sub-item.active::before { opacity:1; box-shadow:0 0 0 3px color-mix(in srgb, var(--c) 22%, transparent); }
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

    <!-- ===== SIDEBAR DESCAN ===== -->
    <div id="dcBackdrop" onclick="toggleDcSidebar()" class="hidden fixed inset-0 bg-black/40 z-40 lg:hidden"></div>
    <aside id="dcSidebar">
        <!-- 1. Header Sidebar: Penempatan Resmi Logo BPS & Kolaka Utara -->
        <div class="px-4 py-3.5 flex items-center justify-between border-b border-[#e5e9e7] bg-white">
            <div class="flex items-center gap-2.5">
                <div class="flex items-center gap-2 bg-slate-50/90 px-2.5 py-1.5 rounded-xl border border-slate-200/90 shadow-2xs">
                    <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-7 w-auto object-contain" title="Badan Pusat Statistik Kolaka Utara">
                    <div class="h-5 w-[1px] bg-slate-300"></div>
                    <img src="/images/logo_kolaka_utara.png" alt="Kolaka Utara" class="h-7 w-auto object-contain" title="Pemerintah Kabupaten Kolaka Utara">
                </div>
                <div class="leading-tight">
                    <div class="text-[13px] font-black tracking-tight text-[#0f1f1a]">DESA CANTIK</div>
                    <div class="text-[9.5px] font-bold text-slate-500 uppercase tracking-wide">BPS KOLAKA UTARA</div>
                </div>
            </div>
            <button type="button" onclick="toggleDcSidebar()" class="lg:hidden p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition" title="Tutup Sidebar">
                <i class="bi bi-x-lg text-sm"></i>
            </button>
        </div>

        <!-- 2. Kartu Identitas Akun Desa Aktif di Sidebar (Penempatan Benar & Rapi) -->
        <div class="px-3 pt-3 pb-1">
            <div class="p-2.5 rounded-xl bg-gradient-to-r from-emerald-50/90 to-teal-50/90 border border-emerald-200/80 flex items-center gap-2.5 shadow-2xs">
                <div class="w-8 h-8 rounded-lg bg-[#0f6b4a] text-white flex items-center justify-center shrink-0 shadow-xs">
                    <i class="bi bi-buildings-fill text-sm"></i>
                </div>
                <div class="min-w-0 flex-1 leading-tight">
                    <div id="topBrandDesaTitle" class="text-xs font-black text-slate-900 uppercase truncate">AKUN DESA KOROHA</div>
                    <div id="topBrandDesaKec" class="text-[10px] font-semibold text-emerald-800 truncate">(Kec. Kodeoha) • Terbina BPS</div>
                </div>
            </div>
        </div>

        <!-- 3. Daftar Menu Navigasi Sidebar (Bootstrap Icons Rapi & Konsisten) -->
        <div id="topNavMenuLinks" class="flex-1 overflow-y-auto px-3 pb-3">
            <div class="dc-nav-label" style="margin-top:.4rem;">Menu Utama</div>
            <button type="button" onclick="switchNavMenu('dashboard')" id="nav-dashboard" class="nav-tab active" style="--c:#0f6b4a;--c2:#17a06d;--cbg:#e3f6ec;">
                <span class="dc-ico"><i class="bi bi-house-door-fill"></i></span>
                <span>Beranda</span>
            </button>
            <button type="button" onclick="switchNavMenu('tentang')" id="nav-tentang" class="nav-tab" style="--c:#2563eb;--c2:#4f8cff;--cbg:#e6eefe;">
                <span class="dc-ico"><i class="bi bi-building"></i></span>
                <span>Profil Desa</span>
            </button>

            <!-- 1. KAPASITAS & EDUKASI (DIUTAMAKAN LEBIH DULU) -->
            <div class="dc-nav-label">Kapasitas &amp; Edukasi</div>
            <button type="button" onclick="toggleMateriMenu()" id="nav-pembelajaran" class="nav-tab" style="--c:#4f46e5;--c2:#7c74f5;--cbg:#e8e7fd;">
                <span class="dc-ico"><i class="bi bi-book-half"></i></span>
                <span>Materi Pembelajaran</span>
                <b id="dcMateriCaret" class="dc-caret">▾</b>
            </button>
            <div id="dcMateriSub" class="dc-sub hidden">
                <button type="button" onclick="switchNavMenu('video')" id="sub-video" class="dc-sub-item" style="--c:#dc2626;">
                    <i class="bi bi-play-circle-fill text-xs mr-1 text-rose-600"></i>
                    <span>Video Tutorial</span>
                </button>
                <button type="button" onclick="switchNavMenu('pretest')" id="sub-pretest" class="dc-sub-item" style="--c:#0284c7;">
                    <i class="bi bi-patch-question-fill text-xs mr-1 text-sky-600"></i>
                    <span>Pre-test &amp; Post-test</span>
                </button>
                <button type="button" onclick="switchNavMenu('buku')" id="sub-buku" class="dc-sub-item" style="--c:#059669;">
                    <i class="bi bi-journal-bookmark-fill text-xs mr-1 text-emerald-600"></i>
                    <span>Buku Panduan</span>
                </button>
            </div>

            <!-- 2. ADMINISTRASI & PENGISIAN DATA PODES -->
            <div class="dc-nav-label">Administrasi &amp; Data</div>
            <button type="button" onclick="openManageDataModal('kpi')" class="dc-nav-item" style="--c:#d97706;--c2:#f5a524;--cbg:#fdf0d9;">
                <span class="dc-ico"><i class="bi bi-pencil-square"></i></span>
                <span>Pengisian Data PODES</span>
            </button>
            <button type="button" onclick="switchNavMenu('monitoring')" id="nav-monitoring" class="nav-tab" style="--c:#0d9488;--c2:#25c2b0;--cbg:#dcf5f1;">
                <span class="dc-ico"><i class="bi bi-clipboard-data-fill"></i></span>
                <span>Monitoring</span>
            </button>


            <!-- 3. LAYANAN -->
            <div class="dc-nav-label">Layanan</div>
            <button type="button" onclick="openMetadataModal()" class="dc-nav-item" style="--c:#0891b2;--c2:#2cc3e0;--cbg:#dcf3f9;">
                <span class="dc-ico"><i class="bi bi-file-earmark-spreadsheet-fill"></i></span>
                <span>Metadata SDI</span>
            </button>
            <button type="button" onclick="openPstModal()" class="dc-nav-item" style="--c:#db2777;--c2:#f56fae;--cbg:#fce3ef;">
                <span class="dc-ico"><i class="bi bi-headset"></i></span>
                <span>Layanan PST</span>
            </button>
        </div>

        <!-- 4. Footer Sidebar: Akses Kembali ke 6 Desa & Keluar Akun -->
        <div class="p-3 border-t border-[#e5e9e7] space-y-2">
            <div class="flex items-center justify-between rounded-lg px-2.5 py-1 text-[10px] bg-[#eef6f1]">
                <span class="flex items-center gap-1.5 font-semibold text-emerald-700">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>Server BPS Aktif
                </span>
                <span class="text-slate-500 font-bold">2026</span>
            </div>
            <a href="/descan" onclick="exitToDescanDashboard(event)" class="w-full flex items-center justify-center gap-2 text-[12px] font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-200 rounded-xl py-2 cursor-pointer transition">
                <i class="bi bi-grid-3x3-gap-fill text-xs text-slate-500"></i>
                <span>Kembali ke 6 Desa</span>
            </a>
            <button type="button" onclick="logoutFromMenu()" class="w-full flex items-center justify-center gap-2 text-[12px] font-bold text-rose-600 bg-rose-50 hover:bg-rose-100 border border-rose-100 rounded-xl py-2 cursor-pointer transition">
                <i class="bi bi-box-arrow-right text-xs"></i>
                <span>Keluar Akun</span>
            </button>
        </div>
    </aside>

    <!-- ===== TOPBAR HEADER DESA (BERSIH & TERTATA) ===== -->
    <header class="dc-topbar px-3 sm:px-6 py-2.5 flex items-center justify-between gap-3 shadow-2xs">
        <!-- Sisi Kiri: Tombol Toggle Mobile & Tombol Beranda (Bersih Tanpa Gambar) -->
        <div class="flex items-center gap-2.5 sm:gap-3.5 min-w-0">
            <!-- Tombol Buka Sidebar (Hanya Tampil di Layar Mobile/Tablet) -->
            <button type="button" id="btnToggleDcSidebar" onclick="toggleDcSidebar()" class="lg:hidden px-2.5 py-1.5 rounded-xl border border-slate-200 hover:bg-slate-100 text-slate-700 text-base leading-none transition cursor-pointer active:scale-95 flex items-center justify-center shrink-0" title="Buka Sidebar Navigasi">
                <i class="bi bi-list text-xl leading-none"></i>
            </button>

            <!-- Identitas Portal Desa di Header (Tanpa Tombol Beranda Dobel) -->
            <div class="flex items-center gap-2">
                <span class="text-xs sm:text-sm font-extrabold text-slate-900 tracking-tight">Portal Satu Data Desa</span>
                <span class="text-slate-300 hidden sm:inline">•</span>
                <span class="text-[11px] font-semibold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200 hidden sm:inline">Desa Cantik 2026</span>
            </div>
        </div>

        <!-- Sisi Kanan: Status SDI & Profil Ringkas Operator -->
        <div class="flex items-center gap-2.5 sm:gap-3 shrink-0">
            <!-- Indikator Status Satu Data Indonesia -->
            <!-- Menu Output Desa (Dipindahkan ke Header) -->
            <div class="relative flex items-center">
                <button type="button" onclick="switchNavMenu('output')" id="header-nav-output" 
                    class="group relative flex items-center gap-2 sm:gap-2.5 px-2.5 sm:px-3.5 py-1.5 sm:py-2 rounded-2xl bg-gradient-to-r from-sky-50 via-emerald-50/80 to-teal-50/70 hover:from-sky-100 hover:via-emerald-100 hover:to-teal-100/90 text-slate-900 border border-emerald-200/90 hover:border-emerald-300 shadow-2xs hover:shadow-md transition-all duration-300 cursor-pointer active:scale-95" 
                    title="Buka Dokumen Output Desa (Monografi, Tabel Statistik, Leaflet & Unduh Berkas)">
                    
                    <!-- Icon Box dengan Badge -->
                    <div class="relative w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-gradient-to-tr from-emerald-600 via-teal-600 to-sky-600 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform shrink-0">
                        <i class="bi bi-file-earmark-bar-graph-fill text-xs sm:text-sm"></i>
                        <span class="absolute -top-1 -right-1 flex h-2 w-2 sm:h-2.5 sm:w-2.5">
                            <span class="relative inline-flex rounded-full h-full w-full bg-emerald-500 ring-1 ring-white"></span>
                        </span>
                    </div>

                    <!-- Label Teks Dua Tingkat Berkelas -->
                    <div class="text-left hidden xs:block">
                        <div class="flex items-center gap-1.5">
                            <span class="text-[9px] font-black uppercase tracking-wider text-emerald-700 leading-none">Dokumen Resmi</span>
                            <span class="px-1.5 py-0.2 rounded-full bg-emerald-200/80 text-emerald-900 text-[9px] font-black leading-none">4 Berkas</span>
                        </div>
                        <div class="text-xs font-black text-slate-800 group-hover:text-emerald-700 transition leading-tight flex items-center gap-1 mt-0.5">
                            <span>Output Desa</span>
                            <i class="bi bi-chevron-right text-[10px] text-emerald-400 group-hover:translate-x-0.5 transition-transform"></i>
                        </div>
                    </div>
                </button>
            </div>

            <!-- Menu Galeri Foto Desa Premium & Interaktif di Header -->
            <div class="relative flex items-center">
                <button type="button" onclick="openGaleriDesaModal()" 
                    class="group relative flex items-center gap-2 sm:gap-2.5 px-2.5 sm:px-3.5 py-1.5 sm:py-2 rounded-2xl bg-gradient-to-r from-purple-50 via-indigo-50/70 to-fuchsia-50/60 hover:from-purple-100 hover:via-indigo-100 hover:to-fuchsia-100/90 text-purple-950 border border-purple-200/90 hover:border-purple-300 shadow-2xs hover:shadow-md transition-all duration-300 cursor-pointer active:scale-95" 
                    title="Buka Galeri Dokumentasi & Unggah Foto Baru Desa">
                    
                    <!-- Icon Box dengan Badge Pulse Berkedip -->
                    <div class="relative w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-gradient-to-tr from-purple-600 via-indigo-600 to-fuchsia-600 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform shrink-0">
                        <i class="bi bi-camera-fill text-xs sm:text-sm"></i>
                        <span class="absolute -top-1 -right-1 flex h-2 w-2 sm:h-2.5 sm:w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-full w-full bg-pink-500 ring-1 ring-white"></span>
                        </span>
                    </div>

                    <!-- Label Teks Dua Tingkat Berkelas -->
                    <div class="text-left hidden xs:block">
                        <div class="flex items-center gap-1.5">
                            <span class="text-[9px] font-black uppercase tracking-wider text-purple-700 leading-none">Dokumentasi</span>
                            <span id="topbarGaleriBadge" class="px-1.5 py-0.2 rounded-full bg-purple-200/80 text-purple-800 text-[9px] font-black leading-none">8 Foto</span>
                        </div>
                        <div class="text-xs font-black text-slate-800 group-hover:text-purple-700 transition leading-tight flex items-center gap-1 mt-0.5">
                            <span>Galeri Desa</span>
                            <i class="bi bi-chevron-right text-[10px] text-purple-400 group-hover:translate-x-0.5 transition-transform"></i>
                        </div>
                    </div>
                </button>
            </div>

            <div class="hidden sm:flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-[11px] font-bold">
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
                    <button type="button" onclick="autoFillGateTarget()" class="py-2 px-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-black text-xs shadow-xs hover:shadow transition flex items-center justify-center gap-1">
                        <span>⚡ Isi Sandi Resmi</span>
                    </button>
                    <button type="button" onclick="bypassGateAsViewer()" class="py-2 px-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-black text-xs shadow-xs hover:shadow transition flex items-center justify-center gap-1">
                        <span>👁️ Buka Langsung (Tamu)</span>
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
                                ✉️
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
                                🔒
                            </span>
                            <input type="password" id="gateInputPassword" required placeholder="Masukkan kata sandi desa" class="w-full pl-9 pr-10 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] focus:border-transparent transition bg-slate-50 focus:bg-white">
                            <button type="button" onclick="togglePasswordVisibility('gateInputPassword')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 text-xs" title="Lihat/Sembunyikan Sandi">
                                👁️
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-[#005ea6] to-[#0b2545] hover:from-[#004e8a] hover:to-[#081b33] text-white font-black text-xs shadow-md hover:shadow-lg transition flex items-center justify-center gap-2 transform active:scale-98">
                        <span>Buka Dashboard Desa Sekarang</span>
                        <span>→</span>
                    </button>
                </form>

                <div class="pt-2 text-center">
                    <a href="/descan" onclick="exitToDescanDashboard(event)" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-[#005ea6] transition">
                        <span>← Kembali ke Pilihan 6 Desa Binaan</span>
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
                <!-- 2. PROFIL DESA (MONOGRAFI, SDM APARAT & POTENSI UNGGULAN)             -->
                <!-- ===================================================================== -->
                <div id="view-tentang" class="menu-view-container hidden space-y-6 animate-in fade-in duration-300 select-none">
                    
                    <!-- ============================================================== -->
                    <!-- 3D EDITORIAL PROFIL DESA (KEPOS NATURE & 3D MOTION STYLE)     -->
                    <!-- ============================================================== -->
                    <div class="dc-profil-shell p-5 sm:p-10 lg:p-12 space-y-10 relative overflow-hidden bg-[#f6f3ec] border border-[#e6e1d5] rounded-3xl shadow-sm">
                        
                        <!-- Top Ambient Line -->
                        <div class="flex flex-wrap items-center justify-between gap-3 text-xs border-b border-[#e2ddd0] pb-4">
                            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/80 border border-[#ded8c8] text-[#163829] font-black text-[11px] shadow-2xs">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>BPS KOLAKA UTARA • PROGRAM DESA CANTIK 2026</span>
                            </div>
                            <div class="flex items-center gap-2 text-[11px] font-bold text-[#556b60]">
                                <span id="profil3dBadgeKategori" class="px-2.5 py-0.5 rounded-full bg-[#e8f4ed] text-[#0f6b4a] font-extrabold border border-[#c7e5d5]">
                                    Desa Mandiri (Nilai 98%)
                                </span>
                                <span>•</span>
                                <span>STANDAR SDI RESMI</span>
                            </div>
                        </div>

                        <!-- 1. HERO EDITORIAL TYPOGRAPHY & 3D ORGANIC BRANCH OVERLAY -->
                        <div class="relative py-4 sm:py-8">
                            
                            <!-- 3D Organic Nature Decorative Graphic (Floating Parallax with Organic Motion) -->
                            <div class="absolute right-0 top-1/2 -translate-y-1/2 z-20 pointer-events-none w-48 sm:w-80 lg:w-[420px] opacity-90 animate-float-3d">
                                <div class="relative w-full h-36 sm:h-52 rounded-full filter drop-shadow-[0_20px_25px_rgba(20,50,30,0.35)]">
                                    <svg viewBox="0 0 400 160" class="w-full h-full text-emerald-800" fill="none">
                                        <!-- Organic 3D Curved Tree Root / Moss Branch Path -->
                                        <defs>
                                            <linearGradient id="branchGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" stop-color="#4a3520"/>
                                                <stop offset="35%" stop-color="#2d5236"/>
                                                <stop offset="70%" stop-color="#163829"/>
                                                <stop offset="100%" stop-color="#0f261c"/>
                                            </linearGradient>
                                            <linearGradient id="mossGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                                                <stop offset="0%" stop-color="#84cc16"/>
                                                <stop offset="50%" stop-color="#22c55e"/>
                                                <stop offset="100%" stop-color="#15803d"/>
                                            </linearGradient>
                                            <filter id="shadow3d" x="-20%" y="-20%" width="140%" height="140%">
                                                <feDropShadow dx="0" dy="12" stdDeviation="10" flood-color="#0a1f16" flood-opacity="0.45"/>
                                            </filter>
                                        </defs>
                                        <!-- 3D Root Stem -->
                                        <path d="M10,130 C80,40 180,150 260,70 C310,20 370,60 395,40" stroke="url(#branchGrad)" stroke-width="26" stroke-linecap="round" filter="url(#shadow3d)"/>
                                        <path d="M10,130 C80,40 180,150 260,70 C310,20 370,60 395,40" stroke="url(#mossGrad)" stroke-width="8" stroke-dasharray="8 14" stroke-linecap="round"/>
                                        <!-- Leaf Tufts -->
                                        <circle cx="95" cy="65" r="14" fill="#65a30d" opacity="0.85"/>
                                        <circle cx="115" cy="55" r="10" fill="#84cc16" opacity="0.9"/>
                                        <circle cx="215" cy="115" r="16" fill="#15803d" opacity="0.85"/>
                                        <circle cx="235" cy="105" r="12" fill="#4ade80" opacity="0.9"/>
                                        <circle cx="325" cy="40" r="12" fill="#84cc16" opacity="0.9"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Typography Overlap -->
                            <div class="relative z-10 max-w-3xl space-y-3">
                                <span class="text-[11px] sm:text-xs font-black tracking-[0.25em] text-[#0f6b4a] uppercase block">
                                    PROFIL MONOGRAFI WILAYAH
                                </span>
                                <h1 id="profil3dHeroDesaName" class="text-4xl sm:text-6xl lg:text-7xl font-serif font-black tracking-tight text-[#163829] leading-[1.05] drop-shadow-xs">
                                    Desa Kamisi
                                </h1>
                                <p id="profil3dHeroKecamatan" class="text-xs sm:text-sm font-bold text-[#4e6459] max-w-xl leading-relaxed">
                                    Kecamatan Kodeoha, Kabupaten Kolaka Utara • Terintegrasi Potensi Desa (PODES) 2025 BPS RI
                                </p>
                                <div class="pt-2 flex items-center gap-3">
                                    <button type="button" onclick="document.getElementById('secProfilTentang').scrollIntoView({behavior:'smooth'})" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white hover:bg-emerald-50 text-[#163829] font-extrabold text-xs border border-[#ded8c8] shadow-xs transition cursor-pointer">
                                        <span>Jelajahi Profil Wilayah</span>
                                        <i class="bi bi-chevron-down text-emerald-700"></i>
                                    </button>
                                    <button type="button" onclick="openPublikasiDocModal('monografi')" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-[#163829] hover:bg-[#0f281d] text-white font-extrabold text-xs shadow-xs transition cursor-pointer">
                                        <i class="bi bi-file-earmark-pdf-fill text-amber-300"></i>
                                        <span>Buku Monografi</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- 2. "CHI SIAMO" SECTION: FLOATING 3D CARD ON ROLLING LUSH HILLS -->
                        <div id="secProfilTentang" class="relative w-full rounded-3xl overflow-hidden min-h-[380px] sm:min-h-[460px] flex items-center justify-center p-4 sm:p-8 shadow-xl">
                            <!-- Background Panoramic Rolling Hills Image -->
                            <img id="profil3dLandscapeBg" src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85" alt="Panorama Alam" class="absolute inset-0 w-full h-full object-cover object-center filter brightness-[0.75]">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

                            <!-- Floating 3D Ivory Card (Interactive Tilt on Hover) -->
                            <div class="tilt-card-3d relative z-10 max-w-2xl w-full bg-[#f8f6f0]/95 backdrop-blur-md rounded-3xl p-6 sm:p-9 shadow-2xl border border-white/60 text-center space-y-4">
                                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-[#0f6b4a] text-[10px] font-black uppercase tracking-wider">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>Karakteristik & Kondisi Geografis</span>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-serif font-black text-[#163829]">
                                    Kedaulatan Data & Keasrian Wilayah
                                </h3>
                                <p id="profil3dDesc" class="text-xs sm:text-sm text-slate-700 leading-relaxed font-medium max-w-xl mx-auto">
                                    Pusat perikanan tangkap pesisir, pengeringan teri tradisional, dan perkebunan kakao rakyat binaan Badan Pusat Statistik Kabupaten Kolaka Utara.
                                </p>

                                <!-- 4-Grid Key Metrics inside floating card -->
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 pt-3 border-t border-[#e2ddd0] text-center">
                                    <div class="p-2.5 rounded-2xl bg-white border border-[#e8e4d8] shadow-2xs">
                                        <span class="text-[10px] font-bold text-slate-400 block uppercase">Luas Wilayah</span>
                                        <b id="profil3dLuas" class="text-sm font-black text-[#163829]">14,80 km²</b>
                                    </div>
                                    <div class="p-2.5 rounded-2xl bg-white border border-[#e8e4d8] shadow-2xs">
                                        <span class="text-[10px] font-bold text-slate-400 block uppercase">Penduduk</span>
                                        <b id="profil3dPop" class="text-sm font-black text-[#163829]">1.576 Jiwa</b>
                                    </div>
                                    <div class="p-2.5 rounded-2xl bg-white border border-[#e8e4d8] shadow-2xs">
                                        <span class="text-[10px] font-bold text-slate-400 block uppercase">Keluarga</span>
                                        <b id="profil3dKK" class="text-sm font-black text-[#0f6b4a]">394 KK</b>
                                    </div>
                                    <div class="p-2.5 rounded-2xl bg-white border border-[#e8e4d8] shadow-2xs">
                                        <span class="text-[10px] font-bold text-slate-400 block uppercase">Struktur RT</span>
                                        <b id="profil3dDusunCount" class="text-sm font-black text-[#163829]">3 Dusun • 8 RT</b>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. "LA NOSTRA MISSIONE" SECTION: SPLIT VISI, MISI & BATAS ADMINISTRASI -->
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                            
                            <!-- Left: Visi, Misi & Evaluasi BPS -->
                            <div class="lg:col-span-6 space-y-4">
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-[#0f6b4a] block">
                                    ARAH KEBIJAKAN & KOMITMEN STATISTIK
                                </span>
                                <h3 class="text-2xl sm:text-3xl font-serif font-black text-[#163829] leading-tight">
                                    Visi & Standarisasi Desa Cantik
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                                    Mewujudkan tata kelola desa berbasis data statistik sektoral yang akurat, mutakhir, terpadu, dan dapat dipertanggungjawabkan guna mendukung perencanaan pembangunan desa berkelanjutan.
                                </p>

                                <div class="p-4 rounded-2xl bg-white border border-[#e2ded5] shadow-xs space-y-2">
                                    <div class="flex items-center gap-2 text-xs font-black text-[#0f6b4a]">
                                        <i class="bi bi-shield-check text-base"></i>
                                        <span>Rekomendasi Pembinaan BPS Kolaka Utara</span>
                                    </div>
                                    <p id="profil3dCatatanBps" class="text-xs text-slate-600 leading-relaxed font-medium">
                                        Kategori Mandiri dengan kualitas data monografi dan SDI tertinggi di Kecamatan Kodeoha.
                                    </p>
                                </div>
                            </div>

                            <!-- Right: Layered 3D Cards (Batas Wilayah + Komoditas) -->
                            <div class="lg:col-span-6 space-y-4">
                                
                                <!-- Card 1: Batas Administrasi Wilayah (with compass icons) -->
                                <div class="tilt-card-3d bg-white rounded-3xl p-5 sm:p-6 shadow-md border border-[#e2ded5] space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="text-[10px] font-black uppercase text-[#0f6b4a] tracking-wider flex items-center gap-1.5">
                                            <i class="bi bi-compass text-sm"></i>
                                            <span>Batas Administrasi Wilayah</span>
                                        </span>
                                        <span class="text-[10px] font-bold text-slate-400">Verifikasi Spasial SDI</span>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2 text-xs">
                                        <div class="p-2.5 rounded-2xl bg-[#f7f5ef] border border-[#e8e4d8]">
                                            <span class="text-[10px] font-bold text-slate-400 block uppercase">Utara:</span>
                                            <span id="profil3dBatasUtara" class="font-extrabold text-[#163829] text-xs">Desa Koroha</span>
                                        </div>
                                        <div class="p-2.5 rounded-2xl bg-[#f7f5ef] border border-[#e8e4d8]">
                                            <span class="text-[10px] font-bold text-slate-400 block uppercase">Selatan:</span>
                                            <span id="profil3dBatasSelatan" class="font-extrabold text-[#163829] text-xs">Kecamatan Tiwu</span>
                                        </div>
                                        <div class="p-2.5 rounded-2xl bg-[#f7f5ef] border border-[#e8e4d8]">
                                            <span class="text-[10px] font-bold text-slate-400 block uppercase">Barat:</span>
                                            <span id="profil3dBatasBarat" class="font-extrabold text-[#163829] text-xs">Pesisir Teluk Bone</span>
                                        </div>
                                        <div class="p-2.5 rounded-2xl bg-[#f7f5ef] border border-[#e8e4d8]">
                                            <span class="text-[10px] font-bold text-slate-400 block uppercase">Timur:</span>
                                            <span id="profil3dBatasTimur" class="font-extrabold text-[#163829] text-xs">Pegunungan Kodeoha</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 2: Komoditas Utama (Photo Thumbnail Card) -->
                                <div class="tilt-card-3d bg-white rounded-3xl p-4 sm:p-5 shadow-md border border-[#e2ded5] flex items-center gap-4">
                                    <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl overflow-hidden bg-slate-900 shrink-0 shadow-inner">
                                        <img id="profil3dHeroPhoto" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=350&q=80" alt="Komoditas" class="w-full h-full object-cover">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <span class="text-[9px] font-black uppercase px-2 py-0.5 rounded-md bg-amber-100 text-amber-900">
                                            Komoditas Basis Desa
                                        </span>
                                        <h4 id="profil3dKomoditas" class="text-sm sm:text-base font-black text-[#163829] truncate mt-1">
                                            Kakao, Kelapa, Perikanan Tangkap
                                        </h4>
                                        <p id="profil3dAgri" class="text-xs text-slate-500 font-semibold truncate mt-0.5">
                                            Pesisir & Kakao 190 Ha
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- 4. "I NOSTRI PROGETTI" SECTION: DEEP FOREST GREEN POTENSI UNGGULAN -->
                        <div class="nature-card-dark rounded-3xl p-6 sm:p-10 text-white space-y-6 shadow-2xl relative overflow-hidden">
                            <!-- Foliage Ambient Accents -->
                            <div class="absolute -right-8 -top-8 w-48 h-48 bg-emerald-500/10 rounded-full blur-2xl pointer-events-none"></div>

                            <div class="relative z-10 flex flex-col sm:flex-row sm:items-end justify-between gap-3 border-b border-white/10 pb-4">
                                <div>
                                    <span class="text-[10px] font-black uppercase text-emerald-400 tracking-widest block">
                                        SEKTOR BASIS & POTENSI EKSPOR
                                    </span>
                                    <h3 class="text-2xl sm:text-3xl font-serif font-black text-white mt-1">
                                        Komoditas Unggulan Sektoral
                                    </h3>
                                </div>
                                <span class="text-xs text-emerald-300 font-bold bg-white/10 px-3 py-1 rounded-full border border-white/10">
                                    PODES 2025 Terintegrasi
                                </span>
                            </div>

                            <!-- 3D Card Grid of 3 Pillars -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 relative z-10">
                                
                                <!-- Pillar 1: Perkebunan -->
                                <div class="tilt-card-3d bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 space-y-3 hover:bg-white/15 transition">
                                    <div class="h-32 rounded-xl overflow-hidden shadow-inner">
                                        <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=400&q=80" alt="Perkebunan Kakao" class="w-full h-full object-cover">
                                    </div>
                                    <span class="text-[9px] font-black px-2 py-0.5 rounded bg-emerald-400 text-slate-950 uppercase">Perkebunan</span>
                                    <h5 class="text-sm font-black text-white leading-snug">Sentra Kakao & Cengkeh Rakyat</h5>
                                    <p class="text-xs text-slate-300 leading-relaxed">Pengembangan budidaya tanaman perkebunan sambung pucuk dengan sertifikasi bibit unggul.</p>
                                </div>

                                <!-- Pillar 2: Pesisir / Hasil Hutan -->
                                <div class="tilt-card-3d bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 space-y-3 hover:bg-white/15 transition">
                                    <div class="h-32 rounded-xl overflow-hidden shadow-inner">
                                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=400&q=80" alt="Pesisir Laut" class="w-full h-full object-cover">
                                    </div>
                                    <span class="text-[9px] font-black px-2 py-0.5 rounded bg-sky-300 text-slate-950 uppercase">Pesisir & Perairan</span>
                                    <h5 class="text-sm font-black text-white leading-snug">Perikanan Tangkap & Pesisir</h5>
                                    <p class="text-xs text-slate-300 leading-relaxed">Pengolahan pengeringan ikan teri tradisional Teluk Bone serta budidaya pesisir berkelanjutan.</p>
                                </div>

                                <!-- Pillar 3: IKM & BUMDes -->
                                <div class="tilt-card-3d bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 space-y-3 hover:bg-white/15 transition">
                                    <div class="h-32 rounded-xl overflow-hidden shadow-inner">
                                        <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=400&q=80" alt="Industri Olahan" class="w-full h-full object-cover">
                                    </div>
                                    <span class="text-[9px] font-black px-2 py-0.5 rounded bg-amber-300 text-slate-950 uppercase">IKM & Usaha Rakyat</span>
                                    <h5 class="text-sm font-black text-white leading-snug">Usaha Olahan & BUMDes Aktif</h5>
                                    <p class="text-xs text-slate-300 leading-relaxed">Pemberdayaan industri kecil menengah pengolahan pasca panen dan digitalisasi pasar desa.</p>
                                </div>

                            </div>
                        </div>

                        <!-- 5. "NOTIZIE E AGGIORNAMENTI" SECTION: APARATUR PEMERINTAHAN & AGEN STATISTIK -->
                        <div class="space-y-6">
                            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3 border-b border-[#e2ded5] pb-4">
                                <div>
                                    <span class="text-[10px] font-black uppercase text-[#0f6b4a] tracking-widest block">
                                        STANDARISASI SUMBER DAYA MANUSIA
                                    </span>
                                    <h3 class="text-2xl sm:text-3xl font-serif font-black text-[#163829] mt-1">
                                        Aparatur Pemerintahan & Agen SDI
                                    </h3>
                                </div>
                                <button type="button" onclick="openAgenDesaModal()" class="px-4 py-2 rounded-xl bg-white hover:bg-emerald-50 text-[#163829] font-extrabold text-xs border border-[#ded8c8] shadow-xs flex items-center gap-1.5 transition cursor-pointer">
                                    <i class="bi bi-people-fill text-emerald-700"></i>
                                    <span>Kelola Data Aparatur</span>
                                </button>
                            </div>

                            <!-- 4 Aparatur Cards Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                                
                                <!-- Kades -->
                                <div class="tilt-card-3d bg-white rounded-3xl p-5 border border-[#e2ded5] shadow-sm text-center space-y-3">
                                    <div class="w-20 h-20 mx-auto rounded-full overflow-hidden border-2 border-emerald-500 shadow-md">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80" alt="Kepala Desa" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <span class="text-[9px] font-black px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 uppercase">Kepala Desa / Lurah</span>
                                        <div id="aparatKadesName" class="text-sm font-black text-slate-900 mt-1">H. Syamsul Bahri, S.Sos</div>
                                        <div class="text-[10px] text-slate-400 font-semibold">Pembina Utama Wilayah</div>
                                    </div>
                                    <div class="pt-2 border-t border-slate-100 text-[10.5px] text-emerald-700 font-bold flex items-center justify-center gap-1">
                                        <i class="bi bi-patch-check-fill"></i>
                                        <span>Terverifikasi BPS</span>
                                    </div>
                                </div>

                                <!-- Sekdes -->
                                <div class="tilt-card-3d bg-white rounded-3xl p-5 border border-[#e2ded5] shadow-sm text-center space-y-3">
                                    <div class="w-20 h-20 mx-auto rounded-full overflow-hidden border-2 border-blue-500 shadow-md">
                                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300&q=80" alt="Sekretaris Desa" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <span class="text-[9px] font-black px-2 py-0.5 rounded-full bg-blue-100 text-blue-800 uppercase">Sekretaris Desa</span>
                                        <div id="aparatSekdesName" class="text-sm font-black text-slate-900 mt-1">Muh. Ridwan, S.AP</div>
                                        <div class="text-[10px] text-slate-400 font-semibold">Koordinator Administrasi</div>
                                    </div>
                                    <div class="pt-2 border-t border-slate-100 text-[10.5px] text-emerald-700 font-bold flex items-center justify-center gap-1">
                                        <i class="bi bi-patch-check-fill"></i>
                                        <span>Terverifikasi BPS</span>
                                    </div>
                                </div>

                                <!-- Agen Statistik Desa -->
                                <div class="tilt-card-3d bg-white rounded-3xl p-5 border border-[#e2ded5] shadow-sm text-center space-y-3">
                                    <div class="w-20 h-20 mx-auto rounded-full overflow-hidden border-2 border-purple-500 shadow-md">
                                        <img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?auto=format&fit=crop&w=300&q=80" alt="Kaur Perencanaan" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <span class="text-[9px] font-black px-2 py-0.5 rounded-full bg-purple-100 text-purple-800 uppercase">Agen Statistik Desa</span>
                                        <div class="text-sm font-black text-slate-900 mt-1">Baharuddin, S.Pd</div>
                                        <div class="text-[10px] text-slate-400 font-semibold">Kaur Perencanaan</div>
                                    </div>
                                    <div class="pt-2 border-t border-slate-100 text-[10.5px] text-emerald-700 font-bold flex items-center justify-center gap-1">
                                        <i class="bi bi-patch-check-fill"></i>
                                        <span>Lulus Uji Kompetensi</span>
                                    </div>
                                </div>

                                <!-- Operator SDI -->
                                <div class="tilt-card-3d bg-white rounded-3xl p-5 border border-[#e2ded5] shadow-sm text-center space-y-3">
                                    <div class="w-20 h-20 mx-auto rounded-full overflow-hidden border-2 border-amber-500 shadow-md">
                                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80" alt="Operator Data" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <span class="text-[9px] font-black px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 uppercase">Operator Monografi</span>
                                        <div class="text-sm font-black text-slate-900 mt-1">Nurul Annisa, S.Kom</div>
                                        <div class="text-[10px] text-slate-400 font-semibold">Pengelola Database SDI</div>
                                    </div>
                                    <div class="pt-2 border-t border-slate-100 text-[10.5px] text-emerald-700 font-bold flex items-center justify-center gap-1">
                                        <i class="bi bi-patch-check-fill"></i>
                                        <span>Terverifikasi BPS</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- 6. "COME DIVENTARE MEMBRO" & "CONTATTI" SECTION: SEBARAN DUSUN & PETA KONTAK -->
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                            
                            <!-- Left: Sebaran Dusun & Lingkungan -->
                            <div class="lg:col-span-6 space-y-4">
                                <div class="flex items-center justify-between border-b border-[#e2ded5] pb-3">
                                    <h4 class="text-lg font-serif font-black text-[#163829] flex items-center gap-2">
                                        <i class="bi bi-houses-fill text-emerald-700"></i>
                                        <span>Sebaran Dusun & Wilayah RT</span>
                                    </h4>
                                    <span class="text-[10px] font-bold text-slate-400 uppercase">Data Riil PODES</span>
                                </div>
                                <div id="profil3dDusunList" class="space-y-2.5">
                                    <!-- Injected Dynamically by JS -->
                                    <div class="p-3.5 rounded-2xl bg-white border border-[#e2ded5] text-xs flex items-center justify-between">
                                        <div class="flex items-center gap-2.5">
                                            <span class="w-7 h-7 rounded-xl bg-emerald-100 text-emerald-800 font-black flex items-center justify-center text-xs">1</span>
                                            <div>
                                                <div class="font-bold text-slate-900">Dusun I Kamisi Bahari</div>
                                                <div class="text-[10px] text-slate-400">135 KK • 540 Jiwa</div>
                                            </div>
                                        </div>
                                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800">Kerawanan: Rendah</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Right: Peta Spasial & Kontak Pelayanan -->
                            <div class="lg:col-span-6 space-y-4">
                                <div class="tilt-card-3d bg-white rounded-3xl p-5 sm:p-6 shadow-md border border-[#e2ded5] space-y-4">
                                    <div class="flex items-center justify-between border-b border-[#e8e4d8] pb-3">
                                        <h4 class="text-base font-serif font-black text-[#163829] flex items-center gap-2">
                                            <i class="bi bi-geo-alt-fill text-rose-600"></i>
                                            <span>Peta Geospasial & Kontak Pelayanan</span>
                                        </h4>
                                        <button type="button" onclick="switchNavMenu('dashboard'); setTimeout(() => scrollToDashSection('sectionPeta'), 150);" class="text-[11px] font-extrabold text-[#0f6b4a] hover:underline flex items-center gap-1 cursor-pointer">
                                            <span>Buka Peta Tematik</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>

                                    <!-- Quick Kontak Info -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                        <div class="p-3 rounded-2xl bg-[#f8f6f0] border border-[#e8e4d8] space-y-1">
                                            <span class="text-[10px] font-bold text-slate-400 block uppercase">Alamat Kantor Desa:</span>
                                            <div class="font-extrabold text-[#163829]">Jl. Poros Trans Sulawesi</div>
                                            <div class="text-[10px] text-slate-500">Kabupaten Kolaka Utara, Sulawesi Tenggara</div>
                                        </div>
                                        <div class="p-3 rounded-2xl bg-[#f8f6f0] border border-[#e8e4d8] space-y-1">
                                            <span class="text-[10px] font-bold text-slate-400 block uppercase">Jam Operasional Layanan:</span>
                                            <div class="font-extrabold text-[#163829]">Senin - Jumat</div>
                                            <div class="text-[10px] text-slate-500">08.00 - 15.30 WITA (Terpadu)</div>
                                        </div>
                                    </div>

                                    <div class="p-3.5 rounded-2xl bg-emerald-50/70 border border-emerald-200 flex items-center justify-between gap-3 text-xs">
                                        <div class="flex items-center gap-2.5 min-w-0">
                                            <span class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0"><i class="bi bi-envelope-fill"></i></span>
                                            <div class="truncate">
                                                <div class="text-[10px] font-bold text-slate-500">Email Resmi Layanan:</div>
                                                <div class="font-extrabold text-[#0f6b4a] truncate">layanan.descan@bps.go.id</div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="openPstModal()" class="px-3 py-1.5 rounded-xl bg-[#0f6b4a] hover:bg-[#0a4d36] text-white font-extrabold text-[11px] transition shrink-0 cursor-pointer">
                                            Konsultasi PST
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Bottom Footer inside Profil Shell -->
                        <div class="pt-6 border-t border-[#e2ded5] flex flex-wrap items-center justify-between gap-3 text-xs text-slate-500">
                            <div class="flex items-center gap-2">
                                <img src="/images/logo_bps.png" alt="BPS" class="h-6 w-auto object-contain">
                                <span class="font-bold text-[#163829]">Badan Pusat Statistik Kabupaten Kolaka Utara</span>
                            </div>
                            <div class="flex items-center gap-3 font-semibold text-[11px]">
                                <span>Portal Resmi Desa Cantik 2026</span>
                                <span>•</span>
                                <a href="javascript:void(0)" onclick="window.scrollTo({top:0, behavior:'smooth'})" class="text-[#0f6b4a] font-bold hover:underline">Kembali ke Atas ↑</a>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- MATERI PEMBELAJARAN (HUB)                                             -->
                <!-- ===================================================================== -->
                <div id="view-pembelajaran" class="menu-view-container hidden space-y-5 animate-in fade-in duration-200">
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="dc-ico" style="--c:#4f46e5;--cbg:#e8e7fd;width:44px;height:44px;border-radius:.8rem;background:linear-gradient(135deg,#4f46e5,#7c74f5);color:#fff;"><svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Materi Pembelajaran</h2>
                                <p class="text-xs text-slate-500 mt-0.5">Program Penguatan Kapasitas Statistik Sektoral Aparatur Desa Cinta Statistik BPS RI</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-4">
                        <button type="button" onclick="switchNavMenu('video')" class="dc-card text-left hover:shadow-lg transition cursor-pointer" style="border-top:4px solid #dc2626;">
                            <span class="dc-ico" style="--c:#dc2626;--cbg:#fde8e8;width:42px;height:42px;"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg></span>
                            <div class="font-extrabold text-base mt-3">Video Tutorial</div>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Video edukasi microlearning Desa Cantik BPS berdurasi singkat.</p>
                            <span class="dc-link mt-3 inline-block" style="color:#dc2626;">Buka Video →</span>
                        </button>
                        <button type="button" onclick="switchNavMenu('pretest')" class="dc-card text-left hover:shadow-lg transition cursor-pointer" style="border-top:4px solid #0284c7;">
                            <span class="dc-ico" style="--c:#0284c7;--cbg:#e0f2fe;width:42px;height:42px;"><svg viewBox="0 0 24 24"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></span>
                            <div class="font-extrabold text-base mt-3">Pre-test &amp; Post-test</div>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Ukur pemahaman awal dan akhir, lalu raih sertifikat kompetensi.</p>
                            <span class="dc-link mt-3 inline-block" style="color:#0284c7;">Mulai Evaluasi →</span>
                        </button>
                        <button type="button" onclick="switchNavMenu('buku')" class="dc-card text-left hover:shadow-lg transition cursor-pointer" style="border-top:4px solid #059669;">
                            <span class="dc-ico" style="--c:#059669;--cbg:#dcf5ea;width:42px;height:42px;"><svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></span>
                            <div class="font-extrabold text-base mt-3">Buku Panduan</div>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Buku pedoman Excel, rumus dasar statistik, dan SK Agen Statistik.</p>
                            <span class="dc-link mt-3 inline-block" style="color:#059669;">Buka Panduan →</span>
                        </button>
                    </div>
                </div>

                <!-- ===================================================================== -->
                <!-- VIDEO TUTORIAL                                                        -->
                <!-- ===================================================================== -->
                <div id="view-video" class="menu-view-container hidden space-y-5 animate-in fade-in duration-200">
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="dc-ico" style="--c:#dc2626;--cbg:#fde8e8;width:44px;height:44px;border-radius:.8rem;background:linear-gradient(135deg,#dc2626,#f4676a);color:#fff;"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg></div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Video Tutorial</h2>
                                <p class="text-xs text-slate-500 mt-0.5">Video edukasi microlearning Desa Cantik BPS</p>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-4xl w-full">
                            <!-- Step 2: TONTON VIDEO MICROLEARNING -->
                            <div class="p-4 sm:p-5 rounded-2xl border-2 border-emerald-300 bg-emerald-50/40 flex flex-col justify-between space-y-4">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <span class="px-2.5 py-1 rounded-lg bg-emerald-700 text-white text-xs font-black">
                                            [2. TONTON VIDEO MICROLEARNING]
                                        </span>
                                        <span class="text-[10px] font-black text-emerald-800 bg-emerald-200 px-2 py-0.5 rounded-md">
                                            Durasi: 5-7 Menit
                                        </span>
                                    </div>
                                    <h5 class="font-black text-slate-900 text-sm mt-3">Video Edukasi Desa Cantik BPS</h5>
                                    
                                    <!-- Video Embed Player Container with Click-to-Play Overlay -->
                                    <div class="mt-2 relative w-full h-44 rounded-xl overflow-hidden bg-slate-900 shadow-md border border-slate-200 group">
                                        <iframe id="mainVideoIframe" class="w-full h-full" src="https://www.youtube.com/embed/RXV4X0cOIA0?enablejsapi=1&rel=0" title="Video Edukasi Desa Cantik BPS" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        
                                        <!-- Quick Click to Play Overlay (Langsung Berputar Otomatis Saat Diklik) -->
                                        <div id="videoPlayOverlay" onclick="playMicrolearningVideo(true)" class="absolute inset-0 bg-slate-950/45 hover:bg-slate-950/25 flex flex-col items-center justify-center cursor-pointer transition z-10">
                                            <div class="w-12 h-12 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white flex items-center justify-center text-xl shadow-xl transition transform group-hover:scale-110">
                                                ▶
                                            </div>
                                            <span class="text-[11px] font-black text-white mt-2 drop-shadow-md tracking-wide">Klik untuk Putar Otomatis</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <button type="button" onclick="playMicrolearningVideo(true)" class="w-full py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black transition flex items-center justify-center gap-2 cursor-pointer shadow-xs">
                                        <span>▶ Putar Video Sekarang (Otomatis)</span>
                                    </button>
                                    <div class="flex items-center justify-between text-xs text-slate-600 pt-1">
                                        <span class="font-bold">Kurikulum: BPS Kolaka Utara</span>
                                        <div class="flex items-center gap-3">
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
                    </div>
                </div>

                <!-- ===================================================================== -->
                <!-- PRE-TEST & POST-TEST                                                  -->
                <!-- ===================================================================== -->
                <div id="view-pretest" class="menu-view-container hidden space-y-5 animate-in fade-in duration-200">
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="dc-ico" style="--c:#0284c7;--cbg:#e0f2fe;width:44px;height:44px;border-radius:.8rem;background:linear-gradient(135deg,#0284c7,#38b6ee);color:#fff;"><svg viewBox="0 0 24 24"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Pre-test &amp; Post-test</h2>
                                <p class="text-xs text-slate-500 mt-0.5">Evaluasi kompetensi aparatur desa dan sertifikat Agen Statistik</p>
                            </div>
                        </div>
                        <button type="button" onclick="unlockAllLmsModules()" class="px-3.5 py-1.5 rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-200 text-xs font-bold flex items-center gap-1.5 self-start cursor-pointer"><span>🔓</span><span>Unlock semua menu</span></button>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                            <!-- Step 1: PRE-TEST -->
                            <div class="p-4 sm:p-5 rounded-2xl border-2 border-blue-200 bg-blue-50/40 flex flex-col justify-between space-y-4">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <span class="px-2.5 py-1 rounded-lg bg-[#005ea6] text-white text-xs font-black">
                                            [1. PRE-TEST] 🔒
                                        </span>
                                        <span id="badgePretestStatus" class="text-[10px] font-black text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-md">
                                            Siap Dikerjakan
                                        </span>
                                    </div>
                                    <h5 class="font-black text-slate-900 text-sm mt-3">Tes Kemampuan Awal Aparatur</h5>
                                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                        Wajib diisi sebelum materi video dan pengolahan data untuk mengukur pemahaman awal konsep statistik sektoral.
                                    </p>
                                    <div class="mt-3 p-2.5 rounded-xl bg-white border border-blue-100 text-xs text-slate-600">
                                        <div>• Soal: <b>10 Pertanyaan Pilihan Ganda</b></div>
                                        <div>• Waktu: <b>15 Menit</b></div>
                                        <div>• Standar: <b>BPS Satu Data Indonesia</b></div>
                                    </div>
                                </div>
                                <button type="button" onclick="openPretestModal()" class="w-full py-2.5 rounded-xl bg-[#005ea6] hover:bg-[#004e8a] text-white text-xs font-black transition flex items-center justify-center gap-2 cursor-pointer shadow-xs">
                                    <span>📝 Mulai Pre-Test</span>
                                </button>
                            </div>
                            <!-- Step 3: POST-TEST / KUIS EVALUASI -->
                            <div class="p-4 sm:p-5 rounded-2xl border-2 border-indigo-200 bg-indigo-50/40 flex flex-col justify-between space-y-4">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <span class="px-2.5 py-1 rounded-lg bg-indigo-700 text-white text-xs font-black">
                                            [3. POST-TEST / KUIS EVALUASI] 🔒
                                        </span>
                                        <span id="badgePosttestStatus" class="text-[10px] font-black text-indigo-700 bg-indigo-100 px-2 py-0.5 rounded-md">
                                            Kelulusan
                                        </span>
                                    </div>
                                    <h5 class="font-black text-slate-900 text-sm mt-3">Kuis Evaluasi Akhir & Sertifikat</h5>
                                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                        Kuis evaluasi pemahaman pasca pelatihan untuk mencetak Sertifikat Kompetensi Agen Statistik Desa.
                                    </p>
                                    <div class="mt-3 p-2.5 rounded-xl bg-white border border-indigo-100 text-xs text-slate-600 space-y-1">
                                        <div class="flex justify-between"><span>Passing Grade:</span> <b class="text-indigo-700">70 / 100</b></div>
                                        <div class="flex justify-between"><span>Nilai Terakhir:</span> <b id="valLastPostScore" class="text-emerald-700">85 (Lulus)</b></div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <button type="button" onclick="openPosttestModal()" class="w-full py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-black transition flex items-center justify-center gap-2 cursor-pointer shadow-xs">
                                        <span>📝 Mulai Post-Test</span>
                                    </button>
                                    <button type="button" onclick="openSertifikatModal()" class="w-full py-2 rounded-xl bg-white hover:bg-indigo-50 border border-indigo-300 text-indigo-800 text-xs font-black transition flex items-center justify-center gap-1.5 cursor-pointer">
                                        <span>👁️ Lihat Nilai & Status Sertifikat</span>
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>

                <!-- ===================================================================== -->
                <!-- BUKU PANDUAN                                                          -->
                <!-- ===================================================================== -->
                <div id="view-buku" class="menu-view-container hidden space-y-5 animate-in fade-in duration-200">
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="dc-ico" style="--c:#059669;--cbg:#dcf5ea;width:44px;height:44px;border-radius:.8rem;background:linear-gradient(135deg,#059669,#2ec08f);color:#fff;"><svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Buku Panduan</h2>
                                <p class="text-xs text-slate-500 mt-0.5">Buku pedoman Excel, rumus dasar statistik sektoral, dan SK Agen Statistik</p>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: BUKU PEDOMAN & RUMUS DASAR (Table of Resources) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                        <div class="pb-3 border-b border-slate-100">
                            <h4 class="font-black text-slate-900 text-sm sm:text-base flex items-center gap-2">
                                <span>📚</span>
                                <span>BUKU PEDOMAN & RUMUS DASAR (Mendukung Pembelajaran Independen) — Menu Tambahan</span>
                            </h4>
                            <p class="text-xs text-slate-500 mt-0.5">Daftar Modul, Rumus Resmi Statistik Sektoral, dan Surat Keputusan Agen Statistik Desa</p>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-xs text-left">
                                <thead class="bg-slate-100 text-slate-700 font-black uppercase text-[10px] tracking-wider border-b border-slate-200">
                                    <tr>
                                        <th class="py-3 px-4">Nama Dokumen Pembelajaran</th>
                                        <th class="py-3 px-4">Nomor Referensi BPS / Kode</th>
                                        <th class="py-3 px-4 text-center">Aksi Unduh / Baca</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 font-medium text-slate-800">
                                    <!-- Row 1: Buku Pedoman Excel -->
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="py-3.5 px-4">
                                            <div class="flex items-center gap-2.5">
                                                <span class="text-base">📗</span>
                                                <div>
                                                    <div class="font-black text-slate-900">Buku Pedoman Excel Desa (30 Lembar Praktik)</div>
                                                    <div class="text-[11px] text-slate-400">Modul terstandarisasi pengolahan data monografi & agregasi Excel</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-4 font-bold text-slate-600">Nomor Dasar Statistik: SDI-BPS-2026-EXCEL</td>
                                        <td class="py-3.5 px-4 text-center">
                                            <button type="button" onclick="openExcelReaderModal()" class="px-4 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-black text-xs transition shadow-2xs cursor-pointer">
                                                UNDUH / DOWNLOAD
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Row 2: Rumus Dasar Statistik -->
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="py-3.5 px-4">
                                            <div class="flex items-center gap-2.5">
                                                <span class="text-base">📐</span>
                                                <div>
                                                    <div class="font-black text-slate-900">Rumus Dasar Statistik Sektoral Desa</div>
                                                    <div class="text-[11px] text-slate-400">Formula Rasio Beban Tanggungan, Desil Kemiskinan, & Sex Ratio</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-4 font-bold text-slate-600">Nomor Dasar Excel: FORMULA-BPS-STAT-01</td>
                                        <td class="py-3.5 px-4 text-center">
                                            <button type="button" onclick="openRumusStatistikModal()" class="px-4 py-1.5 rounded-lg bg-[#005ea6] hover:bg-[#004e8a] text-white font-black text-xs transition shadow-2xs cursor-pointer">
                                                UNDUH / DOWNLOAD
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Row 3: SK Agen Statistik -->
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="py-3.5 px-4">
                                            <div class="flex items-center gap-2.5">
                                                <span class="text-base">📜</span>
                                                <div>
                                                    <div class="font-black text-slate-900">Surat Keputusan (SK) Agen Statistik Desa</div>
                                                    <div class="text-[11px] text-slate-400">Legalitas pembentukan Agen Statistik Sektoral Desa Binaan BPS</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-4 font-bold text-slate-600">Nomor Dasar Statistik: SK-BPS-KOLUT-008</td>
                                        <td class="py-3.5 px-4 text-center">
                                            <button type="button" onclick="openSkAgenModal()" class="px-4 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-black text-xs transition shadow-2xs cursor-pointer">
                                                UNDUH / DOWNLOAD
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ===================================================================== -->
                

        </div>
    </main>

    <div id="toastNotification" class="fixed bottom-5 right-5 z-50 bg-slate-900 text-white text-xs font-bold py-2.5 px-4 rounded-xl shadow-xl border border-slate-700 hidden">
        Notifikasi info
    </div>

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
            const curVillage = currentTargetVillage || 'kalukaluku';
            const vTitle = villagesData[curVillage]?.title || 'Desa Kalu Kaluku';

            if (!modal) return;

            if (docType === 'monografi') {
                if (iconEl) iconEl.textContent = '📘';
                if (tagEl) tagEl.textContent = 'BUKU PUBLIKASI RESMI • BPS KAB. KOLAKA UTARA';
                if (titleEl) titleEl.textContent = `Monografi Statistik Sektoral ${vTitle} 2026`;
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-4">
                            <div class="p-4 rounded-2xl bg-blue-50/70 border border-blue-200 flex flex-wrap items-center justify-between gap-2 text-xs">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-blue-800">Nomor Registrasi BPS</div>
                                    <div class="font-bold text-slate-800 text-sm">BPS-7408-DESA-040-2026</div>
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
                                        <p class="text-[11px] text-slate-500 mt-1">Batas administrasi, luas 18,45 km², topografi 4 dusun, dan peta tematik spasial.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Bab II: Kependudukan & Piramida</b>
                                        <p class="text-[11px] text-slate-500 mt-1">4.150 Jiwa, 1.120 KK, rasio jenis kelamin 98,5%, kelompok umur produktif.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Bab III: Pertanian, Kakao & Pesisir</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Sentra kakao 480 Ha, produksi 385 Ton/thn, armada tangkap nelayan Teluk Bone.</p>
                                    </div>
                                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                        <b>Bab IV: Kesejahteraan & Sosial</b>
                                        <p class="text-[11px] text-slate-500 mt-1">Desil P3KE, data penerima bansos (PKH, BPNT, BLT-DD), dan fasilitas desa.</p>
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
        // ==============================================================
        const baseGaleriDatabase = [
            {
                id: 'base_1',
                cat: 'pembinaan',
                title: 'Pelatihan Literasi Statistik Aparatur',
                caption: 'Bimbingan teknis pengisian kuesioner PODES dan standarisasi metadata bersama BPS Kolaka Utara.',
                img: 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=700&q=80',
                badge: 'Pembinaan BPS',
                date: 'Agustus 2025'
            },
            {
                id: 'base_2',
                cat: 'pembinaan',
                title: 'Verifikasi & Rekonsiliasi Data Sektoral',
                caption: 'Penyelarasan indikator kemiskinan ekstrem, penerima bansos, dan data desil bersama tim verifikator.',
                img: 'https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?auto=format&fit=crop&w=700&q=80',
                badge: 'SDI Kolut',
                date: 'Juli 2025'
            },
            {
                id: 'base_3',
                cat: 'potensi',
                title: 'Sentra Perkebunan Kakao Rakyat',
                caption: 'Perkebunan kakao produktif terintegrasi dengan metode sambung pucuk dan pembibitan unggul.',
                img: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=700&q=80',
                badge: 'Komoditas Unggulan',
                date: '2025'
            },
            {
                id: 'base_4',
                cat: 'potensi',
                title: 'Pengeringan Kakao Fermentasi Berkualitas',
                caption: 'Kelompok tani desa mengoptimalkan nilai jual biji kakao kering siap ekspor dengan standar mutu SNI.',
                img: 'https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?auto=format&fit=crop&w=700&q=80',
                badge: 'UMKM & IKM',
                date: '2025'
            },
            {
                id: 'base_5',
                cat: 'alam',
                title: 'Pesisir Bahari & Armada Perahu Nelayan',
                caption: 'Aktivitas nelayan pesisir Teluk Bone serta sentra pengeringan ikan teri tradisional.',
                img: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=700&q=80',
                badge: 'Pesona Bahari',
                date: '2025'
            },
            {
                id: 'base_6',
                cat: 'alam',
                title: 'Bentang Alam Perbukitan & Irigasi Subur',
                caption: 'Topografi perbukitan alami yang menopang ketahanan pangan dan sumber mata air utama masyarakat.',
                img: 'https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?auto=format&fit=crop&w=700&q=80',
                badge: 'Panorama Alam',
                date: '2025'
            },
            {
                id: 'base_7',
                cat: 'pelayanan',
                title: 'Pelayanan Adminduk Terpadu di Balai Desa',
                caption: 'Pemanfaatan sistem informasi desa terpadu untuk pencatatan mutasi penduduk dan verifikasi bansos.',
                img: 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=700&q=80',
                badge: 'Layanan Desa',
                date: '2025'
            },
            {
                id: 'base_8',
                cat: 'pelayanan',
                title: 'Posyandu Terpadu Pencegahan Stunting',
                caption: 'Pemantauan tumbuh kembang balita dan ibu hamil secara berkala yang terdata langsung pada dashboard desa.',
                img: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=700&q=80',
                badge: 'Kesehatan Warga',
                date: '2025'
            }
        ];

        let activeGaleriCategory = 'all';
        let activeGaleriSearchQuery = '';
        let uploadPhotoBase64Data = '';

        // Mengambil foto custom yang diunggah oleh admin dari localStorage
        function getCustomGaleriPhotos(villageKey) {
            const vKey = villageKey || currentTargetVillage || 'kamisi';
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
            const vKey = villageKey || currentTargetVillage || 'kamisi';
            try {
                localStorage.setItem('descan_custom_galeri_' + vKey, JSON.stringify(photosArray));
            } catch (e) {
                console.error('Error saving custom galeri photos:', e);
            }
        }

        // Menggabungkan foto default dengan foto yang diunggah admin
        function getCombinedGaleriPhotos(villageKey) {
            const vKey = villageKey || currentTargetVillage || 'kamisi';
            const customPhotos = getCustomGaleriPhotos(vKey);
            return [...customPhotos, ...baseGaleriDatabase];
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
                modalCount.textContent = count + ' Foto';
            }
        }

        function renderGaleriPhotos(category, searchQuery) {
            const grid = document.getElementById('galeriPhotosGrid');
            if (!grid) return;
            
            if (category !== undefined) activeGaleriCategory = category;
            if (searchQuery !== undefined) activeGaleriSearchQuery = searchQuery.trim().toLowerCase();
            
            const curVillage = currentTargetVillage || 'kamisi';
            const allPhotos = getCombinedGaleriPhotos(curVillage);
            
            // Filter kategori
            let filtered = activeGaleriCategory === 'all' 
                ? allPhotos 
                : (activeGaleriCategory === 'custom' 
                    ? allPhotos.filter(p => p.isCustom) 
                    : allPhotos.filter(p => p.cat === activeGaleriCategory));
                
            // Filter pencarian
            if (activeGaleriSearchQuery) {
                filtered = filtered.filter(p => 
                    (p.title && p.title.toLowerCase().includes(activeGaleriSearchQuery)) ||
                    (p.caption && p.caption.toLowerCase().includes(activeGaleriSearchQuery)) ||
                    (p.badge && p.badge.toLowerCase().includes(activeGaleriSearchQuery))
                );
            }

            updateGaleriCountBadges(allPhotos.length);

            // Empty state bila tidak ada foto
            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full py-12 px-4 text-center">
                        <div class="w-16 h-16 rounded-2xl bg-purple-50 text-purple-400 mx-auto flex items-center justify-center text-3xl mb-3 border border-purple-100">
                            <i class="bi bi-images"></i>
                        </div>
                        <h4 class="font-extrabold text-slate-800 text-sm sm:text-base">Belum Ada Foto Sesuai Kriteria</h4>
                        <p class="text-xs text-slate-500 max-w-md mx-auto mt-1">Tidak ditemukan foto dengan kata kunci atau kategori ini. Anda dapat mengunggah foto dokumentasi baru sebagai Admin Desa.</p>
                        <div class="mt-4 flex items-center justify-center gap-2">
                            <button type="button" onclick="resetGaleriFilters()" class="px-3.5 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition cursor-pointer">
                                Reset Filter
                            </button>
                            <button type="button" onclick="openUploadFotoModal()" class="px-4 py-1.5 rounded-xl bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold transition shadow-xs cursor-pointer flex items-center gap-1.5">
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                                <span>+ Unggah Foto Baru</span>
                            </button>
                        </div>
                    </div>
                `;
                return;
            }
                
            grid.innerHTML = filtered.map(p => {
                const isCustom = Boolean(p.isCustom);
                const safeTitle = (p.title || '').replace(/'/g, "\'");
                const safeCaption = (p.caption || '').replace(/'/g, "\'");
                const safeBadge = (p.badge || 'Dokumentasi').replace(/'/g, "\'");
                const safeDate = (p.date || '2026').replace(/'/g, "\'");

                return `
                <div class="group bg-white rounded-2xl overflow-hidden border ${isCustom ? 'border-purple-300 ring-2 ring-purple-400/20 shadow-sm' : 'border-slate-200 shadow-2xs'} hover:shadow-lg transition-all duration-300 flex flex-col">
                    <div class="relative overflow-hidden aspect-4/3 bg-slate-100">
                        <img src="${p.img}" alt="${p.title}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 cursor-pointer" onclick="viewPhotoFull('${p.img}', '${safeTitle}', '${safeCaption}', '${safeBadge}', '${safeDate}')">
                        
                        <div class="absolute top-2.5 left-2.5 flex items-center gap-1.5">
                            <span class="px-2.5 py-1 rounded-lg ${isCustom ? 'bg-gradient-to-r from-purple-700 to-indigo-700 text-white ring-1 ring-white/30' : 'bg-black/60 text-white'} backdrop-blur-xs text-[10px] font-black tracking-wide uppercase">
                                ${isCustom ? '⭐ Unggahan Admin' : p.badge}
                            </span>
                        </div>
                        
                        <div class="absolute bottom-2.5 right-2.5">
                            <span class="px-2 py-0.5 rounded-md bg-black/60 text-white text-[10px] font-semibold">
                                ${p.date}
                            </span>
                        </div>
                    </div>
                    <div class="p-3.5 flex-1 flex flex-col justify-between">
                        <div>
                            <h4 class="font-black text-slate-900 text-xs sm:text-sm group-hover:text-purple-700 transition leading-snug line-clamp-2">${p.title}</h4>
                            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed line-clamp-2">${p.caption}</p>
                        </div>
                        <div class="pt-3 mt-3 border-t border-slate-100 flex items-center justify-between text-[11px]">
                            <span class="text-slate-400 font-medium truncate max-w-[140px]">
                                ${isCustom ? 'Admin ' + (villagesData[curVillage]?.title || 'Desa') : 'Dokumentasi Terbina BPS'}
                            </span>
                            <div class="flex items-center gap-2">
                                ${isCustom ? `
                                    <button type="button" onclick="deleteCustomFoto('${p.id}', event)" class="text-rose-500 hover:text-rose-700 hover:bg-rose-50 p-1 rounded-md text-xs font-bold transition flex items-center gap-1 cursor-pointer" title="Hapus Foto Ini">
                                        <i class="bi bi-trash"></i>
                                        <span class="hidden sm:inline">Hapus</span>
                                    </button>
                                ` : ''}
                                <button type="button" onclick="viewPhotoFull('${p.img}', '${safeTitle}', '${safeCaption}', '${safeBadge}', '${safeDate}')" class="text-purple-600 font-bold hover:underline flex items-center gap-1 cursor-pointer">
                                    <i class="bi bi-arrows-fullscreen text-xs"></i>
                                    <span>Perbesar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }).join('');
        }

        function filterGaleriPhotos(category, btn) {
            document.querySelectorAll('.galeri-filter-btn').forEach(el => {
                el.classList.remove('bg-purple-600', 'text-white', 'shadow-2xs');
                el.classList.add('bg-white', 'text-slate-600', 'border', 'border-slate-200');
            });
            if (btn) {
                btn.classList.remove('bg-white', 'text-slate-600', 'border', 'border-slate-200');
                btn.classList.add('bg-purple-600', 'text-white', 'shadow-2xs');
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

        function openGaleriDesaModal() {
            const modal = document.getElementById('galeriDesaModal');
            if (!modal) return;
            
            const curVillage = currentTargetVillage || 'kamisi';
            const vData = villagesData[curVillage] || villagesData.kamisi || {};
            const vTitle = vData.title || 'Desa Kamisi';
            
            const titleEl = document.getElementById('galeriModalTitle');
            if (titleEl) titleEl.textContent = `Galeri Foto ${vTitle}`;
            const subEl = document.getElementById('galeriModalSub');
            if (subEl) subEl.textContent = `Dokumentasi pembinaan Desa Cantik, potensi ${vData.komoditas || 'unggulan'}, dan aktivitas di ${vTitle}`;
            
            resetGaleriFilters();
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            if (document.body) document.body.classList.add('overflow-hidden');
        }

        function closeGaleriDesaModal() {
            const modal = document.getElementById('galeriDesaModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
            if (document.body) document.body.classList.remove('overflow-hidden');
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
        // LIGHTBOX VIEWER FOTO LENGKAP & UNDUH
        // ==============================================================
        function viewPhotoFull(imgUrl, title, caption, badge, date) {
            const lightbox = document.getElementById('galeriLightboxModal');
            if (!lightbox) {
                window.open(imgUrl, '_blank');
                return;
            }

            const imgEl = document.getElementById('lightboxImg');
            const titleEl = document.getElementById('lightboxTitle');
            const capEl = document.getElementById('lightboxCaption');
            const badgeEl = document.getElementById('lightboxBadge');
            const dateEl = document.getElementById('lightboxDate');
            const downloadBtn = document.getElementById('lightboxDownloadBtn');

            if (imgEl) imgEl.src = imgUrl;
            if (titleEl) titleEl.textContent = title || 'Dokumentasi Desa';
            if (capEl) capEl.textContent = caption || '';
            if (badgeEl) badgeEl.textContent = badge || 'Dokumentasi';
            if (dateEl) dateEl.textContent = date || '';

            if (downloadBtn) {
                downloadBtn.onclick = function() {
                    downloadPhotoFile(imgUrl, title);
                };
            }

            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            if (document.body) document.body.classList.add('overflow-hidden');
        }

        function closeGaleriLightbox() {
            const lightbox = document.getElementById('galeriLightboxModal');
            if (lightbox) {
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
            }
            if (document.body) document.body.classList.remove('overflow-hidden');
        }

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

        function openPretestModal() {
            showToast('📝 Membuka Kuis Pre-Test Desa Cantik (Tampilan Layar Penuh)...');
            const m = document.getElementById('pretestModal');
            if (m) {
                m.classList.remove('hidden');
                m.classList.add('flex');
            }
            if (typeof document !== 'undefined' && document.body) {
                document.body.classList.add('overflow-hidden');
            }
        }
        function closePretestModal() {
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
            showToast('🎓 Membuka Ujian Evaluasi Post-Test Kelulusan (Tampilan Layar Penuh)...');
            const m = document.getElementById('posttestModal');
            if (m) {
                m.classList.remove('hidden');
                m.classList.add('flex');
            }
            if (typeof document !== 'undefined' && document.body) {
                document.body.classList.add('overflow-hidden');
            }
        }
        function closePosttestModal() {
            const m = document.getElementById('posttestModal');
            if (m) {
                m.classList.add('hidden');
                m.classList.remove('flex');
            }
            if (typeof document !== 'undefined' && document.body) {
                document.body.classList.remove('overflow-hidden');
            }
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
                desc: "Pusat perikanan tangkap pesisir, pengeringan teri tradisional, dan perkebunan kakao rakyat.",
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
                desc: "Pengembangan perkebunan kakao sambung pucuk, cengkeh perbukitan dan budidaya perikanan laut.",
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
                desc: "Ibukota Kecamatan Kodeoha dengan fasilitas puskesmas rawat inap, perdagangan, dan 5 fasilitas pendidikan.",
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
                desc: "Sentra perkebunan cengkeh rakyat dan klaster 75 industri kecil menengah (IKM) pengolahan komoditas kebun.",
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
                desc: "Kawasan perkebunan kakao rakyat mandiri dengan 46 unit usaha IKM produktif dan koperasi tani.",
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
                desc: "Sentra perkebunan dataran tinggi penghasil cengkeh, minyak nilam, dan tanaman hortikultura.",
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
            if (menuKey === 'galeri') {
                openGaleriDesaModal();
                return;
            }
            // Handle aliases & shortcuts
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
            if (menuKey === 'publikasi' || menuKey === 'brs') {
                switchNavMenu('dashboard');
                setTimeout(() => scrollToDashSection('sectionPublikasi'), 150);
                return;
            }
            if (menuKey === 'peta') {
                switchNavMenu('dashboard');
                setTimeout(() => scrollToDashSection('sectionPeta'), 150);
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

            // HANYA 4 MENU RESMI
            const validMenus = ['dashboard', 'tentang', 'output', 'monitoring', 'pembelajaran', 'video', 'pretest', 'buku', 'monev', 'pembinaan'];
            if (!validMenus.includes(menuKey)) {
                menuKey = 'dashboard';
            }
            currentNavMenu = menuKey;

            // Update Top Nav Tabs (4 buttons)
            document.querySelectorAll('.nav-tab').forEach(el => {
                el.classList.remove('active');
            });
            const dBtn = document.getElementById('nav-' + menuKey);
            if (dBtn) {
                dBtn.classList.add('active');
            }

            // Update Header Output Desa Button Active State
            const headerOutputBtn = document.getElementById('header-nav-output');
            if (headerOutputBtn) {
                if (menuKey === 'output') {
                    headerOutputBtn.classList.add('ring-2', 'ring-emerald-500', 'bg-emerald-100/90', 'shadow-sm');
                } else {
                    headerOutputBtn.classList.remove('ring-2', 'ring-emerald-500', 'bg-emerald-100/90', 'shadow-sm');
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

            // Update View Visibility (4 views)
            document.querySelectorAll('.menu-view-container').forEach(el => {
                el.classList.add('hidden');
            });
            const targetView = document.getElementById('view-' + menuKey);
            if (targetView) {
                targetView.classList.remove('hidden');
                if (menuKey === 'tentang') renderProfilDesa3D(currentTargetVillage);
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

        function openManageDataModal(activeTab = 'kpi') {
            const modal = document.getElementById('manageDataModal');
            if (!modal) return;
            const curVillage = currentTargetVillage || currentVillageKey || 'cijati';
            const sData = getSectoralData(curVillage);
            const vData = villagesData[curVillage] || villagesData.cijati;

            // Update title
            const titleEl = document.getElementById('modalAdminDesaTitle');
            if (titleEl) titleEl.textContent = vData.title;

            // Populate KPI inputs
            const inPop = document.getElementById('inputKpiPop');
            const inKk = document.getElementById('inputKpiKk');
            const inRasio = document.getElementById('inputKpiRasio');
            const inPre = document.getElementById('inputKpiPre');
            const inSex = document.getElementById('inputKpiSexRatio');
            const inP3ke = document.getElementById('inputKpiP3ke');
            const inStunting = document.getElementById('inputKpiStunting');
            if (inPop) inPop.value = sData.kpi.pop;
            if (inKk) inKk.value = sData.kpi.kk;
            if (inRasio) inRasio.value = sData.kpi.rasio;
            if (inPre) inPre.value = sData.kpi.pre;
            if (inSex) inSex.value = sData.kpi.sexRatio || '98,5%';
            if (inP3ke) inP3ke.value = sData.kpi.p3ke || '3,2%';
            if (inStunting) inStunting.value = sData.kpi.stunting || '14 Balita';

            // Populate Bansos inputs
            const b0 = sData.bansos?.[0] || { pkh: 480, bpnt: 370, blt: 140, non: 0 };
            const inPkh = document.getElementById('inputBansosPkh');
            const inBpnt = document.getElementById('inputBansosBpnt');
            const inBlt = document.getElementById('inputBansosBlt');
            const inNon = document.getElementById('inputBansosNon');
            if (inPkh) inPkh.value = b0.pkh;
            if (inBpnt) inBpnt.value = b0.bpnt;
            if (inBlt) inBlt.value = b0.blt;
            if (inNon) inNon.value = sData.bansos?.[3]?.non || 140;

            // Populate Disabilitas inputs
            if (!sData.disabilitas) {
                sData.disabilitas = { male: { mandiri: 78, rentan: 22 }, female: { mandiri: 65, rentan: 35 } };
            }
            const inDisM = document.getElementById('inputDisMaleMandiri');
            const inDisF = document.getElementById('inputDisFemaleMandiri');
            if (inDisM) inDisM.value = sData.disabilitas?.male?.mandiri ?? 78;
            if (inDisF) inDisF.value = sData.disabilitas?.female?.mandiri ?? 65;

            // Populate Pendidikan inputs
            sData.pendidikan.forEach((edu, idx) => {
                const el = document.getElementById('inputEdu' + idx);
                if (el) el.value = edu.val;
            });

            // Populate Dusun Table
            renderModalDusunTable(sData.dusun);

            // Switch to requested tab
            switchManageModalTab(activeTab);

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeManageDataModal() {
            const modal = document.getElementById('manageDataModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        }

        function switchManageModalTab(tabKey) {
            document.querySelectorAll('.modal-tab-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-white', 'text-slate-900', 'shadow-xs');
                btn.classList.add('bg-white/15', 'text-white');
            });
            const activeBtn = document.getElementById('modal-tab-' + tabKey);
            if (activeBtn) {
                activeBtn.classList.remove('bg-white/15', 'text-white');
                activeBtn.classList.add('active', 'bg-white', 'text-slate-900', 'shadow-xs');
            }

            document.querySelectorAll('.modal-panel-view').forEach(p => p.classList.add('hidden'));
            const activePanel = document.getElementById('modal-panel-' + tabKey);
            if (activePanel) {
                activePanel.classList.remove('hidden');
            }
        }

        function renderModalDusunTable(dusunList) {
            const tbody = document.getElementById('modalDusunTableBody');
            const countEl = document.getElementById('modalDusunCount');
            if (!tbody) return;
            if (countEl) countEl.textContent = `${dusunList.length} Dusun`;

            let rows = '';
            dusunList.forEach((d, idx) => {
                rows += `
                <tr class="hover:bg-slate-50 transition">
                    <td class="p-2.5 font-bold text-slate-900">${d.name}</td>
                    <td class="p-2.5">${d.pop.toLocaleString('id-ID')}</td>
                    <td class="p-2.5">${d.kk.toLocaleString('id-ID')}</td>
                    <td class="p-2.5 text-amber-700 font-bold">${d.pre}</td>
                    <td class="p-2.5 text-center">
                        <button type="button" onclick="deleteDusunItem('${d.id}')" class="text-rose-600 hover:text-rose-800 text-xs font-bold transition p-1 cursor-pointer" title="Hapus dusun ini">
                            🗑️
                        </button>
                    </td>
                </tr>`;
            });
            tbody.innerHTML = rows;
        }

        function addNewDusunFromModal() {
            const curVillage = currentTargetVillage || currentVillageKey || 'cijati';
            const sData = getSectoralData(curVillage);

            const name = document.getElementById('newDusunName')?.value?.trim();
            const pop = parseInt(document.getElementById('newDusunPop')?.value, 10);
            const kk = parseInt(document.getElementById('newDusunKk')?.value, 10);
            const pre = parseInt(document.getElementById('newDusunPre')?.value, 10);
            const kerawanan = document.getElementById('newDusunKerawanan')?.value || 'Sedang';

            if (!name || isNaN(pop) || isNaN(kk)) {
                alert('Silakan isi Nama Dusun, Jumlah Penduduk, dan Jumlah KK dengan benar.');
                return;
            }

            const newId = 'dusun_' + Date.now();
            const center = sData.center || [-3.225, 121.048];
            const offset = (sData.dusun.length + 1) * 0.007;

            const newDusun = {
                id: newId,
                name: name,
                pop: pop,
                kk: kk,
                pre: isNaN(pre) ? Math.round(kk * 0.1) : pre,
                kerawanan: kerawanan,
                lat: center[0] + offset * 0.7,
                lng: center[1] + offset * 0.7
            };

            sData.dusun.push(newDusun);

            // Clear inputs
            document.getElementById('newDusunName').value = '';
            document.getElementById('newDusunPop').value = '';
            document.getElementById('newDusunKk').value = '';
            document.getElementById('newDusunPre').value = '';

            saveSectoralData(curVillage, sData);
            renderModalDusunTable(sData.dusun);
            populateDashDusunOptions(curVillage, newId);
            showToast(`✅ Dusun "${name}" berhasil ditambahkan!`);
        }

        function deleteDusunItem(dusunId) {
            const curVillage = currentTargetVillage || currentVillageKey || 'cijati';
            const sData = getSectoralData(curVillage);
            if (sData.dusun.length <= 1) {
                alert('Desa harus memiliki minimal 1 dusun wilayah sasaran.');
                return;
            }
            if (!confirm('Apakah Anda yakin ingin menghapus dusun ini?')) return;

            sData.dusun = sData.dusun.filter(d => d.id !== dusunId);
            saveSectoralData(curVillage, sData);
            renderModalDusunTable(sData.dusun);
            populateDashDusunOptions(curVillage, 'all');
            showToast('🗑️ Dusun berhasil dihapus.');
        }

        function saveManageDataForm(e) {
            if (e) e.preventDefault();
            const curVillage = currentTargetVillage || currentVillageKey || 'cijati';
            const sData = getSectoralData(curVillage);

            // Read KPI
            sData.kpi.pop = document.getElementById('inputKpiPop')?.value || sData.kpi.pop;
            sData.kpi.kk = document.getElementById('inputKpiKk')?.value || sData.kpi.kk;
            sData.kpi.rasio = document.getElementById('inputKpiRasio')?.value || sData.kpi.rasio;
            sData.kpi.pre = document.getElementById('inputKpiPre')?.value || sData.kpi.pre;
            sData.kpi.sexRatio = document.getElementById('inputKpiSexRatio')?.value || sData.kpi.sexRatio || '98,5%';
            sData.kpi.p3ke = document.getElementById('inputKpiP3ke')?.value || sData.kpi.p3ke || '3,2%';
            sData.kpi.stunting = document.getElementById('inputKpiStunting')?.value || sData.kpi.stunting || '14 Balita';

            // Read Bansos
            const pkhVal = parseInt(document.getElementById('inputBansosPkh')?.value, 10) || 480;
            const bpntVal = parseInt(document.getElementById('inputBansosBpnt')?.value, 10) || 370;
            const bltVal = parseInt(document.getElementById('inputBansosBlt')?.value, 10) || 140;
            const nonVal = parseInt(document.getElementById('inputBansosNon')?.value, 10) || 140;

            sData.bansos = [
                { category: "PKH", pkh: pkhVal, bpnt: Math.round(bpntVal * 0.8), blt: Math.round(bltVal * 0.9), non: 0 },
                { category: "BPNT", pkh: Math.round(pkhVal * 0.65), bpnt: bpntVal, blt: Math.round(bltVal * 0.85), non: Math.round(nonVal * 0.4) },
                { category: "BLT-DD", pkh: Math.round(pkhVal * 0.45), bpnt: Math.round(bpntVal * 0.7), blt: bltVal, non: Math.round(nonVal * 0.75) },
                { category: "Non-Bansos", pkh: Math.round(pkhVal * 0.3), bpnt: Math.round(bpntVal * 0.9), blt: Math.round(bltVal * 0.65), non: nonVal }
            ];

            // Read Disabilitas
            if (!sData.disabilitas) {
                sData.disabilitas = { male: { mandiri: 78, rentan: 22 }, female: { mandiri: 65, rentan: 35 } };
            }
            const disM = parseInt(document.getElementById('inputDisMaleMandiri')?.value, 10) || 78;
            const disF = parseInt(document.getElementById('inputDisFemaleMandiri')?.value, 10) || 65;
            sData.disabilitas.male.mandiri = Math.min(100, Math.max(0, disM));
            sData.disabilitas.male.rentan = 100 - sData.disabilitas.male.mandiri;
            sData.disabilitas.female.mandiri = Math.min(100, Math.max(0, disF));
            sData.disabilitas.female.rentan = 100 - sData.disabilitas.female.mandiri;

            // Read Pendidikan
            sData.pendidikan.forEach((edu, idx) => {
                const el = document.getElementById('inputEdu' + idx);
                if (el) {
                    edu.val = parseInt(el.value, 10) || edu.val;
                }
            });

            saveSectoralData(curVillage, sData);
            closeManageDataModal();
        }

        function resetSectoralDataToDefault() {
            const curVillage = currentTargetVillage || currentVillageKey || 'cijati';
            if (!confirm('Apakah Anda ingin mengembalikan seluruh data grafik ke nilai standar resmi BPS?')) return;
            try {
                localStorage.removeItem('descan_custom_' + curVillage);
            } catch(e) {}
            renderDashboardCantik(curVillage);
            closeManageDataModal();
            showToast('🔄 Seluruh data statistik dikembalikan ke standar awal BPS.');
        }

        // ===== DESCAN HOME: sidebar, navigasi, grafik =====
        // ===== DESCAN SIDEBAR: submenu Materi Pembelajaran =====
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
            const willOpen = sub ? sub.classList.contains('hidden') : true;
            dcShowMateri(willOpen);
            if (currentNavMenu !== 'pembelajaran' && !DC_MATERI_CHILD.includes(currentNavMenu)) {
                switchNavMenu('pembelajaran');
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
            const sb = document.getElementById('dcSidebar');
            const bd = document.getElementById('dcBackdrop');
            if (isDesktop) {
                // Desktop: Sidebar tampil terus secara permanen
                return;
            } else {
                if (!sb) return;
                sb.classList.toggle('open');
                if (bd) bd.classList.toggle('hidden', !sb.classList.contains('open'));
            }
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
                    <div class="p-3.5 rounded-2xl bg-white border border-[#e2ded5] text-xs flex items-center justify-between shadow-2xs hover:border-emerald-300 transition">
                        <div class="flex items-center gap-2.5 min-w-0">
                            <span class="w-7 h-7 rounded-xl bg-emerald-100 text-emerald-800 font-black flex items-center justify-center text-xs shrink-0">${idx+1}</span>
                            <div class="truncate">
                                <div class="font-bold text-slate-900 truncate">${d.name}</div>
                                <div class="text-[10px] text-slate-400 font-medium">${d.kk} KK • ${d.pop} Jiwa</div>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full ${d.kerawanan === 'Tinggi' ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800'}">Kerawanan: ${d.kerawanan}</span>
                    </div>
                `).join('');
            }

            // Background Photos
            if (vData.photo || vData.heroBg) {
                setSrc('profil3dHeroPhoto', vData.photo || vData.heroBg);
                setSrc('profil3dLandscapeBg', vData.heroBg || vData.photo);
            }

            attach3DTiltListeners();
        }

        function attach3DTiltListeners() {
            const cards = document.querySelectorAll('.tilt-card-3d');
            cards.forEach(card => {
                card.removeEventListener('mousemove', card._tiltHandler);
                card.removeEventListener('mouseleave', card._leaveHandler);
                
                card._tiltHandler = e => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const cx = rect.width / 2;
                    const cy = rect.height / 2;
                    const rx = ((y - cy) / cy) * -7;
                    const ry = ((x - cx) / cx) * 7;
                    card.style.transform = `perspective(1000px) rotateX(${rx.toFixed(2)}deg) rotateY(${ry.toFixed(2)}deg) translateZ(8px)`;
                };
                card._leaveHandler = () => {
                    card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateZ(0px)';
                };

                card.addEventListener('mousemove', card._tiltHandler);
                card.addEventListener('mouseleave', card._leaveHandler);
            });
        }

        function switchVillage(key) {
            if (!key) key = 'kalukaluku';
            const data = villagesData[key] || villagesData.kalukaluku;
            currentVillageKey = key;
            currentTargetVillage = key;

            // 1. Top Navigation & Brand Bars
            const brandTitle = document.getElementById('topBrandDesaTitle');
            if (brandTitle) brandTitle.textContent = ('AKUN ' + (data.title || 'DESA')).toUpperCase();
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
                    <div class="px-2.5 py-1 rounded-xl bg-amber-50 border border-amber-300 text-amber-900 font-extrabold text-[11px] flex items-center gap-1 shadow-2xs">
                        <span>🔒</span>
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
        }

        function togglePasswordVisibility(inputId) {
            const inp = document.getElementById(inputId);
            if (inp) {
                inp.type = inp.type === 'password' ? 'text' : 'password';
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
                                    <span>🔄</span>
                                    <span>Ganti Akun Desa</span>
                                </button>
                                <button type="button" onclick="logoutFromMenu()" class="w-full py-2 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <span>🚪</span>
                                    <span>Keluar ke 6 Desa Binaan</span>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                badgeEl.innerHTML = `
                    <button type="button" onclick="showVillageLoginGate(currentTargetVillage)" class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-amber-50 hover:bg-amber-100 border border-amber-300 text-amber-900 text-xs font-bold transition">
                        <span>🔒</span>
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
            }
            
            // Initialize Excel Guidebook Reader if available
            if (typeof initExcelReader === 'function') {
                initExcelReader();
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
    </script>

    <!-- ============================================================== -->
    <!-- MODAL GANTI AKUN RESMI DESA                                    -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- MODAL KELOLA & EDIT DATA STATISTIK DESA (ADMIN DESA)           -->
    <!-- Memungkinkan admin desa mengedit nilai grafik & menambah dusun -->
    <!-- ============================================================== -->
    <div id="manageDataModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-4 bg-slate-950/80 backdrop-blur-md overflow-y-auto">
        <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 animate-in fade-in zoom-in duration-200">
            
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-[#072448] via-[#0b2b52] to-[#072448] text-white p-5 sm:p-6 relative">
                <button type="button" onclick="closeManageDataModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-sm font-bold transition cursor-pointer">
                    ✕
                </button>
                <div class="flex items-center gap-2 text-[10px] font-black tracking-widest uppercase text-amber-300">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span>Admin Panel • Pemutakhiran Data Desa Cantik</span>
                </div>
                <h3 class="text-xl font-black text-white mt-1">
                    Kelola & Edit Data Statistik
                </h3>
                <p class="text-xs text-blue-100/90 mt-0.5">
                    Perbarui data grafik monografi dan tambah dusun sasaran untuk <b id="modalAdminDesaTitle" class="text-amber-300">Desa Cijati</b>.
                </p>

                <!-- Modal Sub-Navigation Tabs -->
                <div class="flex items-center gap-1.5 overflow-x-auto pt-4 mt-3 border-t border-white/10 scrollbar-none text-xs font-extrabold">
                    <button type="button" onclick="switchManageModalTab('kpi')" id="modal-tab-kpi" class="modal-tab-btn active px-3.5 py-1.5 rounded-xl bg-white text-slate-900 transition shadow-xs cursor-pointer">
                        📊 Indikator Utama (KPI)
                    </button>
                    <button type="button" onclick="switchManageModalTab('bansos')" id="modal-tab-bansos" class="modal-tab-btn px-3.5 py-1.5 rounded-xl bg-white/15 hover:bg-white/25 text-white transition cursor-pointer">
                        🏛️ Bantuan Sosial
                    </button>
                    <button type="button" onclick="switchManageModalTab('dusun')" id="modal-tab-dusun" class="modal-tab-btn px-3.5 py-1.5 rounded-xl bg-white/15 hover:bg-white/25 text-white transition cursor-pointer">
                        <i class="bi bi-houses-fill mr-1"></i> Kelola & Tambah Dusun
                    </button>
                    <button type="button" onclick="switchManageModalTab('sosial')" id="modal-tab-sosial" class="modal-tab-btn px-3.5 py-1.5 rounded-xl bg-white/15 hover:bg-white/25 text-white transition cursor-pointer">
                        <i class="bi bi-people-fill mr-1"></i> Sosial & Pendidikan
                    </button>
                </div>
            </div>

            <!-- Modal Body Form -->
            <form id="manageDataForm" onsubmit="saveManageDataForm(event)" class="p-5 sm:p-6 space-y-5">
                
                <!-- TAB 1: INDIKATOR UTAMA (KPI) -->
                <div id="modal-panel-kpi" class="modal-panel-view space-y-4">
                    <div class="p-3 rounded-xl bg-blue-50 border border-blue-200 text-xs text-blue-900 font-medium">
                        💡 Angka berikut akan langsung mengubah kartu statistik utama di bagian paling atas dashboard desa.
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs font-bold text-slate-700">
                        <div>
                            <label for="inputKpiPop" class="block mb-1">Total Penduduk (Jiwa)</label>
                            <input type="text" id="inputKpiPop" required placeholder="contoh: 4.520" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] bg-slate-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label for="inputKpiKk" class="block mb-1">Total Keluarga (KK)</label>
                            <input type="text" id="inputKpiKk" required placeholder="contoh: 1.340" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] bg-slate-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label for="inputKpiRasio" class="block mb-1">Rasio Beban Tanggungan (%)</label>
                            <input type="text" id="inputKpiRasio" required placeholder="contoh: 42,5%" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] bg-slate-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label for="inputKpiPre" class="block mb-1">Keluarga Pre-Sejahtera (KK)</label>
                            <input type="text" id="inputKpiPre" required placeholder="contoh: 112" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] bg-slate-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label for="inputKpiSexRatio" class="block mb-1">Rasio Jenis Kelamin (Sex Ratio %)</label>
                            <input type="text" id="inputKpiSexRatio" required placeholder="contoh: 98,5%" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] bg-slate-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label for="inputKpiP3ke" class="block mb-1">Penduduk Miskin P3KE (%)</label>
                            <input type="text" id="inputKpiP3ke" required placeholder="contoh: 3,2%" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] bg-slate-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label for="inputKpiStunting" class="block mb-1">Kasus Stunting Aktif (Balita)</label>
                            <input type="text" id="inputKpiStunting" required placeholder="contoh: 14 Balita" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] bg-slate-50 focus:bg-white transition">
                        </div>
                    </div>
                </div>

                <!-- TAB 2: BANTUAN SOSIAL (BANSOS) -->
                <div id="modal-panel-bansos" class="modal-panel-view hidden space-y-4">
                    <div class="p-3 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-900 font-medium">
                        📊 Perbarui kuota dan data penerima bantuan sosial untuk grafik batang bertumpuk (Stacked Bar Chart).
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs font-bold text-slate-700">
                        <div>
                            <label for="inputBansosPkh" class="block mb-1 flex items-center gap-1.5">
                                <span class="w-2.5 h-2.5 rounded-xs bg-[#005ea6]"></span>
                                <span>Penerima PKH (KK)</span>
                            </label>
                            <input type="number" id="inputBansosPkh" required min="0" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] bg-slate-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label for="inputBansosBpnt" class="block mb-1 flex items-center gap-1.5">
                                <span class="w-2.5 h-2.5 rounded-xs bg-[#10b981]"></span>
                                <span>Penerima BPNT (KK)</span>
                            </label>
                            <input type="number" id="inputBansosBpnt" required min="0" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] bg-slate-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label for="inputBansosBlt" class="block mb-1 flex items-center gap-1.5">
                                <span class="w-2.5 h-2.5 rounded-xs bg-[#e11d48]"></span>
                                <span>Penerima BLT Dana Desa (KK)</span>
                            </label>
                            <input type="number" id="inputBansosBlt" required min="0" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] bg-slate-50 focus:bg-white transition">
                        </div>
                        <div>
                            <label for="inputBansosNon" class="block mb-1 flex items-center gap-1.5">
                                <span class="w-2.5 h-2.5 rounded-xs bg-[#f59e0b]"></span>
                                <span>Non-Bansos / Mandiri (KK)</span>
                            </label>
                            <input type="number" id="inputBansosNon" required min="0" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#005ea6] bg-slate-50 focus:bg-white transition">
                        </div>
                    </div>
                </div>

                <!-- TAB 3: KELOLA & TAMBAH DUSUN -->
                <div id="modal-panel-dusun" class="modal-panel-view hidden space-y-5">
                    
                    <!-- Subform Tambah Dusun Baru -->
                    <div class="p-4 rounded-2xl bg-emerald-50/70 border border-emerald-200/80 space-y-3">
                        <div class="flex items-center justify-between">
                            <h4 class="text-xs font-black text-emerald-950 flex items-center gap-1.5">
                                <span>➕</span>
                                <span>Tambah Dusun / Wilayah Sasaran Baru</span>
                            </h4>
                            <span class="text-[10px] font-bold text-emerald-800">Geotagging SDI</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 text-xs font-bold text-slate-700">
                            <div>
                                <label for="newDusunName" class="block mb-1 text-[11px]">Nama Dusun</label>
                                <input type="text" id="newDusunName" placeholder="contoh: Dusun V Mekar Asri" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-medium text-slate-900 bg-white">
                            </div>
                            <div>
                                <label for="newDusunPop" class="block mb-1 text-[11px]">Penduduk (Jiwa)</label>
                                <input type="number" id="newDusunPop" placeholder="950" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-medium text-slate-900 bg-white">
                            </div>
                            <div>
                                <label for="newDusunKk" class="block mb-1 text-[11px]">Keluarga (KK)</label>
                                <input type="number" id="newDusunKk" placeholder="280" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-medium text-slate-900 bg-white">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs font-bold text-slate-700">
                            <div>
                                <label for="newDusunPre" class="block mb-1 text-[11px]">Keluarga Pre-Sejahtera (KK)</label>
                                <input type="number" id="newDusunPre" placeholder="22" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-medium text-slate-900 bg-white">
                            </div>
                            <div>
                                <label for="newDusunKerawanan" class="block mb-1 text-[11px]">Status Kerawanan</label>
                                <select id="newDusunKerawanan" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-medium text-slate-900 bg-white">
                                    <option value="Rendah">Rendah (&lt; 500)</option>
                                    <option value="Sedang" selected>Sedang (500 - 1000)</option>
                                    <option value="Tinggi">Tinggi (&gt; 1000)</option>
                                </select>
                            </div>
                        </div>
                        <div class="pt-1 text-right">
                            <button type="button" onclick="addNewDusunFromModal()" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs shadow-xs transition inline-flex items-center gap-1.5 cursor-pointer">
                                <span>➕</span>
                                <span>Tambahkan Dusun Ini</span>
                            </button>
                        </div>
                    </div>

                    <!-- Tabel Daftar Dusun Terdaftar -->
                    <div>
                        <div class="text-xs font-black text-slate-900 mb-2 flex items-center justify-between">
                            <span>Daftar Dusun Saat Ini</span>
                            <span id="modalDusunCount" class="text-slate-400 font-bold">4 Dusun</span>
                        </div>
                        <div class="border border-slate-200 rounded-xl overflow-hidden max-h-48 overflow-y-auto">
                            <table class="w-full text-left text-xs">
                                <thead class="bg-slate-100 text-slate-600 font-black text-[10px] uppercase border-b border-slate-200">
                                    <tr>
                                        <th class="p-2.5">Nama Dusun</th>
                                        <th class="p-2.5">Penduduk</th>
                                        <th class="p-2.5">KK</th>
                                        <th class="p-2.5">Pre-Sejahtera</th>
                                        <th class="p-2.5 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="modalDusunTableBody" class="divide-y divide-slate-100 text-slate-800 font-medium">
                                    <!-- Populated dynamically via JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- TAB 4: SOSIAL, KESEHATAN & PENDIDIKAN -->
                <div id="modal-panel-sosial" class="modal-panel-view hidden space-y-4">
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-700 font-medium">
                        🏥 Atur persentase kesehatan/disabilitas dan sebaran jenjang pendidikan warga.
                    </div>

                    <!-- Disabilitas & Kesehatan -->
                    <div class="space-y-2">
                        <span class="text-xs font-black text-slate-900 block">Status Disabilitas & Kesehatan (% Mandiri)</span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs font-bold text-slate-700">
                            <div>
                                <label for="inputDisMaleMandiri" class="block mb-1">Laki-laki Mandiri / Sehat (%)</label>
                                <input type="number" id="inputDisMaleMandiri" min="0" max="100" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold text-slate-900 bg-white">
                            </div>
                            <div>
                                <label for="inputDisFemaleMandiri" class="block mb-1">Perempuan Mandiri / Sehat (%)</label>
                                <input type="number" id="inputDisFemaleMandiri" min="0" max="100" class="w-full px-3 py-2 rounded-xl border border-slate-300 font-bold text-slate-900 bg-white">
                            </div>
                        </div>
                    </div>

                    <!-- Jenjang Pendidikan Tertinggi -->
                    <div class="space-y-2 pt-2 border-t border-slate-100">
                        <span class="text-xs font-black text-slate-900 block">Jenjang Pendidikan Tertinggi (Jumlah Sampel / Dusun)</span>
                        <div class="grid grid-cols-2 sm:grid-cols-5 gap-2 text-xs font-bold text-slate-700">
                            <div>
                                <label for="inputEdu0" class="block mb-1 text-[10px] truncate">Tidak Sekolah</label>
                                <input type="number" id="inputEdu0" min="0" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-300 font-bold text-slate-900 bg-white text-xs">
                            </div>
                            <div>
                                <label for="inputEdu1" class="block mb-1 text-[10px] truncate">SD</label>
                                <input type="number" id="inputEdu1" min="0" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-300 font-bold text-slate-900 bg-white text-xs">
                            </div>
                            <div>
                                <label for="inputEdu2" class="block mb-1 text-[10px] truncate">SMP</label>
                                <input type="number" id="inputEdu2" min="0" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-300 font-bold text-slate-900 bg-white text-xs">
                            </div>
                            <div>
                                <label for="inputEdu3" class="block mb-1 text-[10px] truncate">SMA/SMK</label>
                                <input type="number" id="inputEdu3" min="0" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-300 font-bold text-slate-900 bg-white text-xs">
                            </div>
                            <div>
                                <label for="inputEdu4" class="block mb-1 text-[10px] truncate">Perguruan Tinggi</label>
                                <input type="number" id="inputEdu4" min="0" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-300 font-bold text-slate-900 bg-white text-xs">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Modal Actions Footer -->
                <div class="pt-4 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-3">
                    <button type="button" onclick="resetSectoralDataToDefault()" class="text-xs font-bold text-rose-600 hover:text-rose-800 transition flex items-center gap-1 cursor-pointer">
                        <span>🔄</span>
                        <span>Reset ke Nilai Standar BPS</span>
                    </button>

                    <div class="flex items-center gap-2 self-end sm:self-auto">
                        <button type="button" onclick="closeManageDataModal()" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition cursor-pointer">
                            Batal
                        </button>
                        <button type="submit" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-[#005ea6] to-[#072448] hover:from-[#004e8a] hover:to-[#051c38] text-white font-black text-xs shadow-md hover:shadow-lg transition flex items-center gap-1.5 cursor-pointer transform active:scale-95">
                            <span>💾</span>
                            <span>Simpan Perubahan Grafik</span>
                        </button>
                    </div>
                </div>

            </form>
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
    <!-- MODAL LMS 1: PRE-TEST PEMBELAJARAN APARAT DESA (FULL SCREEN)   -->
    <!-- ============================================================== -->
    <div id="pretestModal" class="fixed inset-0 z-[9999] hidden bg-slate-50 flex flex-col w-screen h-screen overflow-hidden animate-in fade-in duration-150" style="position:fixed;top:0;left:0;right:0;bottom:0;width:100vw;height:100vh;">
        <!-- Sticky Header Bar -->
        <div class="shrink-0 bg-gradient-to-r from-[#005ea6] via-[#09487d] to-[#0b2545] text-white px-5 sm:px-8 py-4 flex items-center justify-between shadow-md z-20">
            <div class="flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-2xl bg-white/15 flex items-center justify-center text-xl shadow-inner">📝</div>
                <div>
                    <div class="text-[10px] font-black uppercase tracking-widest text-amber-300">LMS Desa Cantik BPS Kolaka Utara</div>
                    <h3 class="text-base sm:text-lg font-black tracking-tight">[1. PRE-TEST] Uji Kemampuan Awal Aparatur</h3>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="hidden md:flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-white/10 text-white text-xs font-semibold">
                    <span>⏱️ Estimasi: 15 Menit</span>
                    <span class="opacity-40">•</span>
                    <span>4 Butir Soal Terstandar SDI</span>
                </div>
                <button type="button" onclick="closePretestModal()" class="px-4 py-2 rounded-xl bg-white/15 hover:bg-white/25 text-white font-bold text-xs flex items-center gap-1.5 transition cursor-pointer border border-white/20">
                    <span class="text-sm leading-none">✕</span>
                    <span>Tutup / Keluar</span>
                </button>
            </div>
        </div>

        <!-- Scrollable Test Content Body -->
        <div class="flex-1 overflow-y-auto px-4 sm:px-8 py-6 bg-slate-50/70">
            <div class="max-w-4xl mx-auto space-y-6">
                <!-- Guidance / Instruction Card -->
                <div class="p-4 sm:p-5 rounded-2xl bg-blue-50 border border-blue-200 text-blue-900 flex items-start gap-3.5 shadow-2xs">
                    <span class="text-2xl shrink-0 mt-0.5">ℹ️</span>
                    <div class="text-xs space-y-1">
                        <div class="font-black text-sm text-[#005ea6]">Petunjuk Pengerjaan Pre-Test:</div>
                        <p class="leading-relaxed text-blue-800">
                            Pre-Test ini merupakan evaluasi diagnostik awal untuk mengukur pemahaman aparatur desa mengenai prinsip <b>Satu Data Indonesia (SDI)</b>, statistik sektoral, dan pengolahan monografi desa. Hasil tes ini tidak membatalkan sertifikasi akhir dan digunakan BPS sebagai bahan penyesuaian materi pembinaan.
                        </p>
                    </div>
                </div>

                <form id="pretestForm" onsubmit="submitPretest(event)" class="space-y-5 text-slate-800">
                    <div id="pretestResultArea" class="hidden"></div>

                    <!-- Soal 1 -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded-lg bg-blue-100 text-[#005ea6] text-xs font-black">Soal 1 dari 4</span>
                            <span class="text-[11px] font-bold text-slate-400">Topik: Prinsip Satu Data Indonesia</span>
                        </div>
                        <p class="font-bold text-slate-900 text-sm sm:text-base leading-snug">Apa tujuan utama dari implementasi prinsip Satu Data Indonesia (SDI) di tingkat desa?</p>
                        <div class="space-y-2 pt-2 text-xs sm:text-sm">
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q1" value="A" required class="w-4 h-4 text-[#005ea6]">
                                <span>A. Menambah beban administrasi laporan perangkat desa</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q1" value="B" required class="w-4 h-4 text-[#005ea6]">
                                <span class="font-semibold text-slate-900">B. Menghasilkan data desa yang akurat, mutakhir, terpadu, dan berstandar BPS untuk perencanaan pembangunan desa</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q1" value="C" required class="w-4 h-4 text-[#005ea6]">
                                <span>C. Mengganti seluruh struktur perangkat desa yang ada</span>
                            </label>
                        </div>
                    </div>

                    <!-- Soal 2 -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded-lg bg-blue-100 text-[#005ea6] text-xs font-black">Soal 2 dari 4</span>
                            <span class="text-[11px] font-bold text-slate-400">Topik: Rumus Demografi & Sektoral</span>
                        </div>
                        <p class="font-bold text-slate-900 text-sm sm:text-base leading-snug">Bagaimana rumus standar BPS untuk menghitung Rasio Jenis Kelamin (Sex Ratio) penduduk desa?</p>
                        <div class="space-y-2 pt-2 text-xs sm:text-sm">
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q2" value="A" required class="w-4 h-4 text-[#005ea6]">
                                <span>A. (Jumlah Balita / Jumlah Lansia) x 100</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q2" value="B" required class="w-4 h-4 text-[#005ea6]">
                                <span class="font-semibold text-slate-900">B. (Jumlah Penduduk Laki-Laki / Jumlah Penduduk Perempuan) x 100</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q2" value="C" required class="w-4 h-4 text-[#005ea6]">
                                <span>C. (Total Kepala Keluarga / Total Rumah Tangga) x 100%</span>
                            </label>
                        </div>
                    </div>

                    <!-- Soal 3 -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded-lg bg-blue-100 text-[#005ea6] text-xs font-black">Soal 3 dari 4</span>
                            <span class="text-[11px] font-bold text-slate-400">Topik: Pengolahan Spreadsheet Monografi</span>
                        </div>
                        <p class="font-bold text-slate-900 text-sm sm:text-base leading-snug">Dalam pengolahan data monografi Excel, rumus apa yang paling tepat untuk menghitung total otomatis data per dusun?</p>
                        <div class="space-y-2 pt-2 text-xs sm:text-sm">
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q3" value="A" required class="w-4 h-4 text-[#005ea6]">
                                <span class="font-semibold text-slate-900">A. Fungsi =SUM(range_data)</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q3" value="B" required class="w-4 h-4 text-[#005ea6]">
                                <span>B. Fungsi =CONCATENATE()</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q3" value="C" required class="w-4 h-4 text-[#005ea6]">
                                <span>C. Mengetik angka satu per satu secara manual</span>
                            </label>
                        </div>
                    </div>

                    <!-- Soal 4 -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded-lg bg-blue-100 text-[#005ea6] text-xs font-black">Soal 4 dari 4</span>
                            <span class="text-[11px] font-bold text-slate-400">Topik: Tata Kelola Agen Statistik</span>
                        </div>
                        <p class="font-bold text-slate-900 text-sm sm:text-base leading-snug">Siapakah penanggung jawab teknis verifikasi data statistik sektoral desa binaan Desa Cantik?</p>
                        <div class="space-y-2 pt-2 text-xs sm:text-sm">
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q4" value="A" required class="w-4 h-4 text-[#005ea6]">
                                <span>A. Hanya pihak ketiga dari swasta</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q4" value="B" required class="w-4 h-4 text-[#005ea6]">
                                <span class="font-semibold text-slate-900">B. Agen Statistik Desa bersama Tim Pembina BPS Kabupaten Kolaka Utara</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-blue-300 cursor-pointer transition">
                                <input type="radio" name="pre_q4" value="C" required class="w-4 h-4 text-[#005ea6]">
                                <span>C. Tidak perlu ada verifikasi</span>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Actions Bar -->
                    <div class="pt-4 pb-12 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-slate-200">
                        <span class="text-xs text-slate-500 font-medium text-center sm:text-left">
                            Passing Grade: Bebas (Penilaian Diagnostik Awal Aparatur Desa)
                        </span>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <button type="button" onclick="closePretestModal()" class="w-1/2 sm:w-auto px-5 py-3 rounded-xl border border-slate-300 hover:bg-slate-100 text-slate-700 font-bold text-xs cursor-pointer transition">
                                Batal
                            </button>
                            <button type="submit" class="w-1/2 sm:w-auto px-7 py-3 rounded-xl bg-[#005ea6] hover:bg-[#004e8a] text-white font-black text-xs sm:text-sm shadow-md transition flex items-center justify-center gap-2 cursor-pointer">
                                <span>Kumpulkan Jawaban Pre-Test</span>
                                <span>✓</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL LMS 2: POST-TEST EVALUASI KELULUSAN (FULL SCREEN)        -->
    <!-- ============================================================== -->
    <div id="posttestModal" class="fixed inset-0 z-[9999] hidden bg-slate-50 flex flex-col w-screen h-screen overflow-hidden animate-in fade-in duration-150" style="position:fixed;top:0;left:0;right:0;bottom:0;width:100vw;height:100vh;">
        <!-- Sticky Header Bar -->
        <div class="shrink-0 bg-gradient-to-r from-indigo-700 via-indigo-800 to-slate-950 text-white px-5 sm:px-8 py-4 flex items-center justify-between shadow-md z-20">
            <div class="flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-2xl bg-white/15 flex items-center justify-center text-xl shadow-inner">🎓</div>
                <div>
                    <div class="text-[10px] font-black uppercase tracking-widest text-emerald-300">Uji Kelulusan SDM Desa Cantik</div>
                    <h3 class="text-base sm:text-lg font-black tracking-tight">[3. POST-TEST] Kuis Evaluasi Standarisasi SDM</h3>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="hidden md:flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-white/10 text-white text-xs font-semibold">
                    <span>Passing Grade: <b class="text-emerald-300">70 / 100</b></span>
                    <span class="opacity-40">•</span>
                    <span>Syarat Sertifikat Resmi</span>
                </div>
                <button type="button" onclick="closePosttestModal()" class="px-4 py-2 rounded-xl bg-white/15 hover:bg-white/25 text-white font-bold text-xs flex items-center gap-1.5 transition cursor-pointer border border-white/20">
                    <span class="text-sm leading-none">✕</span>
                    <span>Tutup / Keluar</span>
                </button>
            </div>
        </div>

        <!-- Scrollable Test Content Body -->
        <div class="flex-1 overflow-y-auto px-4 sm:px-8 py-6 bg-slate-50/70">
            <div class="max-w-4xl mx-auto space-y-6">
                <!-- Guidance / Instruction Card -->
                <div class="p-4 sm:p-5 rounded-2xl bg-indigo-50 border border-indigo-200 text-indigo-950 flex items-start gap-3.5 shadow-2xs">
                    <span class="text-2xl shrink-0 mt-0.5">🎯</span>
                    <div class="text-xs space-y-1">
                        <div class="font-black text-sm text-indigo-800">Petunjuk Pengerjaan Post-Test Kelulusan:</div>
                        <p class="leading-relaxed text-indigo-900">
                            Evaluasi akhir ini menentukan penerbitan <b>Sertifikat Kompetensi Agen Statistik Desa Cantik</b> yang diakui BPS Kabupaten Kolaka Utara. Diperlukan nilai minimal <b>70</b> untuk lulus. Pastikan menjawab setiap soal secara akurat sesuai materi microlearning dan pembinaan.
                        </p>
                    </div>
                </div>

                <form id="posttestForm" onsubmit="submitPosttest(event)" class="space-y-5 text-slate-800">
                    <div id="posttestResultArea" class="hidden"></div>

                    <!-- Soal 1 -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded-lg bg-indigo-100 text-indigo-700 text-xs font-black">Soal 1 dari 4</span>
                            <span class="text-[11px] font-bold text-slate-400">Topik: Indikator Monografi BPS</span>
                        </div>
                        <p class="font-bold text-slate-900 text-sm sm:text-base leading-snug">Berapa standar minimal variabel data monografi yang wajib dikelola agen statistik desa binaan BPS?</p>
                        <div class="space-y-2 pt-2 text-xs sm:text-sm">
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-indigo-300 cursor-pointer transition">
                                <input type="radio" name="post_q1" value="A" required class="w-4 h-4 text-indigo-600">
                                <span class="font-semibold text-slate-900">A. 44 Indikator Makro Sektoral (Kependudukan, Sosial, Pertanian, Sanitasi & Ekonomi)</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-indigo-300 cursor-pointer transition">
                                <input type="radio" name="post_q1" value="B" required class="w-4 h-4 text-indigo-600">
                                <span>B. Hanya 1 data kependudukan saja</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-indigo-300 cursor-pointer transition">
                                <input type="radio" name="post_q1" value="C" required class="w-4 h-4 text-indigo-600">
                                <span>C. Data tidak dibatasi dan tidak memiliki standar</span>
                            </label>
                        </div>
                    </div>

                    <!-- Soal 2 -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded-lg bg-indigo-100 text-indigo-700 text-xs font-black">Soal 2 dari 4</span>
                            <span class="text-[11px] font-bold text-slate-400">Topik: Verifikasi Integritas Data</span>
                        </div>
                        <p class="font-bold text-slate-900 text-sm sm:text-base leading-snug">Bagaimana agen statistik memastikan tidak ada data ganda (duplikasi) dalam spreadsheet registrasi keluarga?</p>
                        <div class="space-y-2 pt-2 text-xs sm:text-sm">
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-indigo-300 cursor-pointer transition">
                                <input type="radio" name="post_q2" value="A" required class="w-4 h-4 text-indigo-600">
                                <span class="font-semibold text-slate-900">A. Memvalidasi NIK / Nomor KK sebagai primary key dan menggunakan fungsi Conditional Formatting Duplicate</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-indigo-300 cursor-pointer transition">
                                <input type="radio" name="post_q2" value="B" required class="w-4 h-4 text-indigo-600">
                                <span>B. Menghapus baris secara acak tanpa verifikasi</span>
                            </label>
                        </div>
                    </div>

                    <!-- Soal 3 -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded-lg bg-indigo-100 text-indigo-700 text-xs font-black">Soal 3 dari 4</span>
                            <span class="text-[11px] font-bold text-slate-400">Topik: Alur Validasi BPS</span>
                        </div>
                        <p class="font-bold text-slate-900 text-sm sm:text-base leading-snug">Apakah data hasil sensus monografi desa dapat langsung dipublikasikan sebelum disetujui BPS Kolut?</p>
                        <div class="space-y-2 pt-2 text-xs sm:text-sm">
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-indigo-300 cursor-pointer transition">
                                <input type="radio" name="post_q3" value="A" required class="w-4 h-4 text-indigo-600">
                                <span class="font-semibold text-slate-900">A. Harus melalui tahap Verifikasi & Validasi Kualitas Data oleh Pembina BPS</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-indigo-300 cursor-pointer transition">
                                <input type="radio" name="post_q3" value="B" required class="w-4 h-4 text-indigo-600">
                                <span>B. Boleh langsung dipublikasikan tanpa diperiksa siapapun</span>
                            </label>
                        </div>
                    </div>

                    <!-- Soal 4 -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded-lg bg-indigo-100 text-indigo-700 text-xs font-black">Soal 4 dari 4</span>
                            <span class="text-[11px] font-bold text-slate-400">Topik: Pemanfaatan WebGIS SDI</span>
                        </div>
                        <p class="font-bold text-slate-900 text-sm sm:text-base leading-snug">Apa manfaat utama ketersediaan WebGIS Peta Tematik bagi pemerintah desa binaan BPS?</p>
                        <div class="space-y-2 pt-2 text-xs sm:text-sm">
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-indigo-300 cursor-pointer transition">
                                <input type="radio" name="post_q4" value="A" required class="w-4 h-4 text-indigo-600">
                                <span class="font-semibold text-slate-900">A. Memberikan visualisasi sebaran spasial keluarga prasejahtera, balita stunting, dan potensi kakao per dusun</span>
                            </label>
                            <label class="flex items-center gap-3 p-3.5 rounded-xl hover:bg-slate-50 border border-slate-200 hover:border-indigo-300 cursor-pointer transition">
                                <input type="radio" name="post_q4" value="B" required class="w-4 h-4 text-indigo-600">
                                <span>B. Hanya sebagai hiasan grafis</span>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Actions Bar -->
                    <div class="pt-4 pb-12 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-slate-200">
                        <span class="text-xs text-slate-500 font-medium text-center sm:text-left">
                            Passing Grade: <b>70 / 100</b> (Syarat Penerbitan Sertifikat Kompetensi)
                        </span>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <button type="button" onclick="closePosttestModal()" class="w-1/2 sm:w-auto px-5 py-3 rounded-xl border border-slate-300 hover:bg-slate-100 text-slate-700 font-bold text-xs cursor-pointer transition">
                                Batal
                            </button>
                            <button type="submit" class="w-1/2 sm:w-auto px-7 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-black text-xs sm:text-sm shadow-md transition flex items-center justify-center gap-2 cursor-pointer">
                                <span>Selesaikan Ujian Post-Test</span>
                                <span>🎓</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL LMS: VIDEO THEATER FULL SCREEN                          -->
    <!-- ============================================================== -->
    <div id="videoTheaterModal" class="fixed inset-0 z-[9999] hidden bg-slate-950/98 backdrop-blur-md flex flex-col w-screen h-screen overflow-hidden animate-in fade-in duration-200" style="position:fixed;top:0;left:0;right:0;bottom:0;width:100vw;height:100vh;">
        <!-- Header -->
        <div class="shrink-0 bg-slate-900/90 text-white px-5 sm:px-8 py-3.5 flex items-center justify-between border-b border-white/10 z-20">
            <div class="flex items-center gap-3">
                <span class="w-9 h-9 rounded-xl bg-emerald-600/30 text-emerald-400 flex items-center justify-center text-lg">🎬</span>
                <div>
                    <div class="text-[10px] font-bold text-emerald-400 uppercase tracking-widest">Video Microlearning Desa Cantik BPS</div>
                    <h3 class="text-sm sm:text-base font-black text-white">Panduan Statistik Sektoral & Monografi Desa</h3>
                </div>
            </div>
            <button type="button" onclick="closeVideoTheaterModal()" class="px-3.5 py-1.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-bold transition flex items-center gap-1.5 cursor-pointer">
                <span>✕</span>
                <span>Tutup Video</span>
            </button>
        </div>
        <!-- Theater Video Container -->
        <div class="flex-1 flex items-center justify-center p-3 sm:p-6 md:p-8">
            <div class="w-full h-full max-w-6xl aspect-video max-h-[85vh] rounded-2xl overflow-hidden shadow-2xl bg-black border border-white/10">
                <iframe id="theaterVideoIframe" class="w-full h-full" src="" title="Video Microlearning Desa Cantik BPS" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL LMS 3: SERTIFIKAT KELULUSAN KOMPETENSI RESMI BPS         -->
    <!-- ============================================================== -->
    <div id="sertifikatModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-6 bg-slate-950/85 backdrop-blur-md overflow-y-auto">
        <div class="relative w-full max-w-3xl bg-white rounded-3xl shadow-2xl border-4 border-amber-400 overflow-hidden my-6 p-6 sm:p-10 select-none animate-in fade-in zoom-in duration-200">
            <!-- Close Button -->
            <button type="button" onclick="closeSertifikatModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-700 flex items-center justify-center font-black text-sm cursor-pointer z-10">✕</button>

            <!-- Certificate Header -->
            <div class="text-center space-y-3 pb-6 border-b-2 border-slate-200">
                <div class="flex items-center justify-center gap-3">
                    <img src="/images/logo_bps.png" alt="BPS" class="h-12 w-auto object-contain">
                    <div class="h-10 w-[2px] bg-slate-300"></div>
                    <img src="/images/logo_kolaka_utara.png" alt="Kolaka Utara" class="h-12 w-auto object-contain">
                </div>
                <div>
                    <span class="text-xs font-black uppercase tracking-widest text-[#005ea6] block">BADAN PUSAT STATISTIK KABUPATEN KOLAKA UTARA</span>
                    <h2 class="text-2xl sm:text-3xl font-serif font-black text-slate-900 tracking-tight mt-1">SERTIFIKAT KOMPETENSI</h2>
                    <span class="text-xs font-bold text-amber-600 tracking-wider uppercase">PROGRAM DESA CINTA STATISTIK (DESA CANTIK) TAHUN 2026</span>
                </div>
            </div>

            <!-- Certificate Body -->
            <div class="py-8 text-center space-y-4">
                <p class="text-xs text-slate-500 uppercase tracking-widest font-bold">Diberikan dengan predikat SANGAT MEMUASKAN kepada:</p>
                <div class="text-2xl sm:text-3xl font-black text-slate-900 font-serif border-b border-dashed border-slate-300 pb-2 max-w-lg mx-auto">
                    APARATUR PEMERINTAH DESA KALU KALUKU
                </div>
                <p class="text-xs text-[#005ea6] font-extrabold uppercase tracking-wider">
                    KECAMATAN KODEOHA • KABUPATEN KOLAKA UTARA
                </p>
                <p class="text-xs text-slate-600 max-w-xl mx-auto leading-relaxed pt-2">
                    Telah menyelesaikan seluruh kurikulum standarisasi SDM Agen Statistik Desa, mencakup pengolahan Buku Praktik Excel (30 Lembar), pemutakhiran data monografi spasial WebGIS, serta evaluasi mandiri Satu Data Indonesia dengan perolehan nilai kompetensi:
                </p>
                <div class="inline-flex items-center gap-3 p-3 rounded-2xl bg-emerald-50 border border-emerald-300 text-emerald-900">
                    <span class="text-2xl">🏆</span>
                    <div class="text-left">
                        <span class="text-[10px] font-bold text-emerald-700 block uppercase">Nilai Kelulusan Terverifikasi:</span>
                        <b class="text-xl font-black text-emerald-900">85 / 100 (KATEGORI: MANDIRI)</b>
                    </div>
                </div>
            </div>

            <!-- Signatures & Verification -->
            <div class="pt-6 border-t border-slate-200 grid grid-cols-2 items-center text-xs">
                <div class="space-y-1">
                    <span class="text-[10px] font-mono text-slate-400 block">ID Verifikasi: SDI-KOLUT-KK-2026</span>
                    <div class="w-16 h-16 rounded-xl bg-slate-100 border border-slate-300 flex items-center justify-center font-mono text-[9px] text-slate-500 font-black">
                        [QR CODE SDI]
                    </div>
                </div>
                <div class="text-right space-y-1">
                    <span class="text-slate-500 text-[11px]">Lasusua, 17 November 2026</span>
                    <div class="font-black text-slate-900 text-sm">Tim Pembina Desa Cantik</div>
                    <div class="text-slate-500 text-[11px]">BPS Kabupaten Kolaka Utara</div>
                </div>
            </div>

            <!-- Print Actions -->
            <div class="mt-6 pt-4 border-t border-slate-100 flex justify-center gap-3">
                <button type="button" onclick="window.print()" class="px-6 py-2.5 rounded-xl bg-[#005ea6] hover:bg-[#004e8a] text-white font-black text-xs shadow-md transition flex items-center gap-2 cursor-pointer">
                    <span>🖨️ Cetak / Simpan PDF Sertifikat</span>
                </button>
                <button type="button" onclick="closeSertifikatModal()" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL LMS 4: BUKU PANDUAN PRAKTIK EXCEL (30 LEMBAR)           -->
    <!-- ============================================================== -->
    <div id="excelBookModal" class="fixed inset-0 z-50 hidden items-center justify-center p-2 sm:p-4 bg-slate-950/85 backdrop-blur-md overflow-y-auto">
        <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-4 flex flex-col max-h-[92vh] animate-in fade-in zoom-in duration-200">
            <!-- Modal Header with Page Selector -->
            <div class="bg-[#072448] text-white p-4 sm:p-5 flex flex-wrap items-center justify-between gap-3 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-emerald-500 text-slate-950 flex items-center justify-center font-black text-lg shrink-0">📗</div>
                    <div>
                        <div class="text-[10px] font-black uppercase tracking-wider text-emerald-300">Modul Resmi BPS RI • 30 Lembar Praktik</div>
                        <h3 class="text-base sm:text-lg font-black text-white">Buku Praktik Excel Statistik Satu Data Desa</h3>
                    </div>
                </div>
                
                <div class="flex items-center gap-2">
                    <select id="excelPageSelect" onchange="goToExcelPage(this.value)" class="px-3 py-1.5 rounded-xl bg-slate-800 border border-slate-700 text-xs font-bold text-white focus:ring-2 focus:ring-emerald-400 cursor-pointer">
                        <!-- Injected by initExcelReader -->
                    </select>
                    <button type="button" onclick="closeExcelBookModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm cursor-pointer">✕</button>
                </div>
            </div>

            <!-- Reader Controls & Progress Ribbon -->
            <div class="bg-slate-100 px-4 py-2 border-b border-slate-200 flex items-center justify-between gap-3 text-xs text-slate-600 shrink-0">
                <div class="flex items-center gap-2">
                    <span id="excelPageBadge" class="px-2.5 py-0.5 rounded-md bg-emerald-700 text-white font-black text-[10px]">Lembar 1 / 30</span>
                    <span id="excelProgressText" class="font-bold text-slate-700 hidden sm:inline">Progres Pembacaan: Lembar 1 dari 30 (3%)</span>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" id="btnPrevExcelPage" onclick="prevExcelPage()" class="px-3 py-1 rounded-lg bg-white hover:bg-slate-200 border border-slate-300 font-bold text-xs text-slate-800 transition cursor-pointer">← Sebelumnya</button>
                    <button type="button" id="btnNextExcelPage" onclick="nextExcelPage()" class="px-3 py-1 rounded-lg bg-[#005ea6] hover:bg-[#004e8a] font-bold text-xs text-white transition cursor-pointer">Selanjutnya →</button>
                </div>
            </div>

            <!-- Main Sheet Display Container (Single or Spread Mode) -->
            <div class="p-4 sm:p-6 overflow-y-auto flex-1 space-y-4" id="excelSheetCard">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <!-- Left Page Container -->
                    <div id="bookPageLeft" class="p-5 rounded-2xl bg-slate-50 border border-slate-200 shadow-2xs space-y-3">
                        <div class="flex items-center justify-between pb-2 border-b border-slate-200 text-xs text-slate-500 font-bold">
                            <span id="bookPageLeftNumber">Halaman Pengantar SDI</span>
                            <span class="text-emerald-700 font-black">BPS Kolaka Utara</span>
                        </div>
                        <div id="sheetContentContainerLeft" class="text-xs leading-relaxed text-slate-700 space-y-3">
                            <!-- Injected by renderExcelPage -->
                        </div>
                    </div>

                    <!-- Right Page Container -->
                    <div id="bookPageRight" class="p-5 rounded-2xl bg-white border-2 border-emerald-500/40 shadow-xs space-y-3">
                        <div class="flex items-center justify-between pb-2 border-b border-slate-200 text-xs text-slate-500 font-bold">
                            <span class="text-[#005ea6] font-black">Lembar Materi & Rumus</span>
                            <span id="bookPageRightNumber" class="text-slate-400">Hal. 1</span>
                        </div>
                        <div id="sheetContentContainerRight" class="text-xs leading-relaxed text-slate-700 space-y-3">
                            <!-- Injected by renderExcelPage -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Toolbar -->
            <div class="p-4 bg-slate-50 border-t border-slate-200 flex flex-wrap items-center justify-between gap-3 shrink-0">
                <span id="excelNextPreview" class="text-xs text-slate-500 font-bold">Lanjut ke Hal 2: Format Data Kependudukan →</span>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="printCurrentExcelPage()" class="px-4 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold text-xs transition cursor-pointer">
                        🖨️ Cetak Lembar Ini
                    </button>
                    <button type="button" onclick="closeExcelBookModal()" class="px-5 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition cursor-pointer">
                        Tutup Buku
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL LMS 5: RUMUS DASAR STATISTIK SEKTORAL DESA               -->
    <!-- ============================================================== -->
    <div id="rumusStatistikModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-4 bg-slate-950/80 backdrop-blur-sm overflow-y-auto">
        <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 animate-in fade-in zoom-in duration-200">
            <div class="bg-gradient-to-r from-[#005ea6] to-[#072448] text-white p-5 sm:p-6 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-xl">📐</div>
                    <div>
                        <div class="text-[10px] font-black uppercase tracking-wider text-amber-300">FORMULA-BPS-STAT-01</div>
                        <h3 class="text-base sm:text-lg font-black text-white">Ringkasan Rumus Dasar Statistik Sektoral Desa</h3>
                    </div>
                </div>
                <button type="button" onclick="closeRumusStatistikModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm cursor-pointer">✕</button>
            </div>

            <div class="p-6 space-y-4 text-xs text-slate-700 max-h-[75vh] overflow-y-auto">
                <!-- Formula 1: Sex Ratio -->
                <div class="p-4 rounded-2xl bg-blue-50 border border-blue-200 space-y-1.5">
                    <div class="flex items-center justify-between">
                        <h5 class="font-black text-[#005ea6] text-sm">1. Rasio Jenis Kelamin (Sex Ratio)</h5>
                        <span class="px-2 py-0.5 rounded bg-blue-200 text-blue-900 text-[10px] font-black">Demografi</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-white border border-blue-100 font-mono font-bold text-slate-800 text-center text-xs">
                        Sex Ratio = (Jumlah Penduduk Laki-laki / Jumlah Penduduk Perempuan) × 100
                    </div>
                    <p class="text-[11px] text-slate-500">Angka 98,5% menunjukkan terdapat 98-99 laki-laki untuk setiap 100 perempuan di desa.</p>
                </div>

                <!-- Formula 2: Dependency Ratio -->
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 space-y-1.5">
                    <div class="flex items-center justify-between">
                        <h5 class="font-black text-emerald-800 text-sm">2. Rasio Beban Ketergantungan (Dependency Ratio)</h5>
                        <span class="px-2 py-0.5 rounded bg-emerald-200 text-emerald-900 text-[10px] font-black">Kesejahteraan</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-white border border-emerald-100 font-mono font-bold text-slate-800 text-center text-xs">
                        DR = [ (Penduduk Usia 0–14 th + Penduduk Usia 65+ th) / Penduduk Usia 15–64 th ] × 100
                    </div>
                    <p class="text-[11px] text-slate-500">Mengukur berapa banyak tanggungan usia non-produktif yang ditopang oleh 100 penduduk usia produktif.</p>
                </div>

                <!-- Formula 3: Prevalensi Stunting -->
                <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 space-y-1.5">
                    <div class="flex items-center justify-between">
                        <h5 class="font-black text-rose-800 text-sm">3. Prevalensi Kasus Stunting Balita</h5>
                        <span class="px-2 py-0.5 rounded bg-rose-200 text-rose-900 text-[10px] font-black">Kesehatan</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-white border border-rose-100 font-mono font-bold text-slate-800 text-center text-xs">
                        Prevalensi Stunting = (Jumlah Balita Stunting / Total Balita Diukur Posyandu) × 100%
                    </div>
                </div>

                <!-- Formula 4: Excel Shortcuts -->
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <h5 class="font-black text-slate-900 text-sm">Formula Standar di Excel / Spreadsheet:</h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-[11px] font-mono">
                        <div class="p-2 rounded-lg bg-white border border-slate-200"><b>=SUM(B2:B20)</b> : Total data</div>
                        <div class="p-2 rounded-lg bg-white border border-slate-200"><b>=AVERAGE(B2:B20)</b> : Rata-rata</div>
                        <div class="p-2 rounded-lg bg-white border border-slate-200"><b>=COUNTIF(C2:C20, "Miskin")</b></div>
                        <div class="p-2 rounded-lg bg-white border border-slate-200"><b>=VLOOKUP(A2, Data_KK!A:D, 3, FALSE)</b></div>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-slate-50 border-t border-slate-200 flex justify-end gap-2">
                <button type="button" onclick="showToast('Formula Rumus Dasar Statistik berhasil disalin!');" class="px-4 py-2 rounded-xl bg-[#005ea6] text-white font-bold text-xs hover:bg-[#004e8a] transition cursor-pointer">Salin Formula</button>
                <button type="button" onclick="closeRumusStatistikModal()" class="px-4 py-2 rounded-xl bg-slate-200 text-slate-700 font-bold text-xs hover:bg-slate-300 transition cursor-pointer">Tutup</button>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL LMS 6: SURAT KEPUTUSAN (SK) AGEN STATISTIK DESA          -->
    <!-- ============================================================== -->
    <div id="skAgenModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-4 bg-slate-950/80 backdrop-blur-sm overflow-y-auto">
        <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 animate-in fade-in zoom-in duration-200">
            <div class="bg-slate-900 text-white p-5 sm:p-6 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-xl">📜</div>
                    <div>
                        <div class="text-[10px] font-black uppercase tracking-wider text-amber-300">SK-BPS-KOLUT-008</div>
                        <h3 class="text-base sm:text-lg font-black text-white">SK Tim Agen Statistik Desa Kalu Kaluku</h3>
                    </div>
                </div>
                <button type="button" onclick="closeSkAgenModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm cursor-pointer">✕</button>
            </div>

            <div class="p-6 space-y-4 text-xs text-slate-700 max-h-[75vh] overflow-y-auto leading-relaxed">
                <!-- Legal Document Preview -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-300 space-y-3 font-serif">
                    <div class="text-center space-y-1 pb-3 border-b border-slate-300">
                        <div class="font-black text-sm uppercase text-slate-900">PEMERINTAH KABUPATEN KOLAKA UTARA</div>
                        <div class="font-black text-base uppercase text-slate-900">KANTOR KEPALA DESA KALU KALUKU</div>
                        <div class="text-[10px] text-slate-500 font-sans">Kecamatan Kodeoha, Kabupaten Kolaka Utara, Sulawesi Tenggara 93553</div>
                    </div>

                    <div class="text-center pt-2">
                        <div class="font-black text-sm underline text-slate-900">KEPUTUSAN KEPALA DESA KALU KALUKU</div>
                        <div class="text-xs font-sans text-slate-600">NOMOR: 08/DS-KK/2026</div>
                        <div class="text-[11px] font-bold text-slate-800 pt-1">TENTANG</div>
                        <div class="text-xs font-bold text-slate-900 uppercase">PEMBENTUKAN TIM AGEN STATISTIK DESA CINTA STATISTIK (DESA CANTIK) TAHUN 2026</div>
                    </div>

                    <div class="space-y-2 pt-2 text-[11px] font-sans">
                        <p><b>Menimbang:</b> Bahwa untuk mewujudkan keterpaduan data statistik sektoral desa dan mengoptimalkan pembinaan statistik oleh BPS Kabupaten Kolaka Utara...</p>
                        <p><b>MEMUTUSKAN:</b></p>
                        <div class="pl-3 space-y-1">
                            <div>1. <b>Penanggung Jawab:</b> H. Syamsul Bahri, S.Sos (Kepala Desa)</div>
                            <div>2. <b>Koordinator Lapangan:</b> Muh. Ridwan, S.AP (Sekretaris Desa)</div>
                            <div>3. <b>Agen Statistik Sektoral:</b> Baharuddin, S.Pd (Kaur Perencanaan)</div>
                            <div>4. <b>Operator WebGIS:</b> Rosmini, S.Kom (Kasi Pelayanan)</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-slate-50 border-t border-slate-200 flex justify-end gap-2">
                <button type="button" onclick="window.print()" class="px-4 py-2 rounded-xl bg-slate-900 text-white font-bold text-xs hover:bg-slate-800 transition cursor-pointer">🖨️ Cetak Berkas SK</button>
                <button type="button" onclick="closeSkAgenModal()" class="px-4 py-2 rounded-xl bg-slate-200 text-slate-700 font-bold text-xs hover:bg-slate-300 transition cursor-pointer">Tutup</button>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL MONEV: UNGGAH DOKUMEN BUKTI DUKUNG BARU                  -->
    <!-- ============================================================== -->
    <div id="addBuktiModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-4 bg-slate-950/80 backdrop-blur-sm overflow-y-auto">
        <div class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 animate-in fade-in zoom-in duration-200">
            <div class="bg-gradient-to-r from-emerald-700 to-teal-900 text-white p-5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-xl">📁</div>
                    <div>
                        <div class="text-[10px] font-black uppercase tracking-wider text-emerald-300">Portofolio Monev Desa Cantik</div>
                        <h3 class="text-base font-black text-white">Unggah Dokumen Bukti Dukung</h3>
                    </div>
                </div>
                <button type="button" onclick="closeAddBuktiModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm cursor-pointer">✕</button>
            </div>

            <form onsubmit="event.preventDefault(); const name = document.getElementById('buktiModalNama').value; const tbody = document.getElementById('tbodyMonevBukti'); if (tbody && name) { const count = tbody.querySelectorAll('tr').length + 1; const tr = document.createElement('tr'); tr.className = 'hover:bg-slate-50 transition'; tr.innerHTML = `<td class='py-2.5 px-3 text-center font-bold text-slate-500'>${count}</td><td class='py-2.5 px-4 font-bold text-slate-800'>${name}</td><td class='py-2.5 px-3 text-center'><span class='px-2 py-0.5 rounded-md bg-emerald-100 text-emerald-800 text-[10px] font-black'>✓ Lengkap</span></td><td class='py-2.5 px-4 text-center'><button type='button' onclick='showToast(\"Mengunduh ${name}...\")' class='px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold cursor-pointer'>Download</button></td>`; tbody.appendChild(tr); showToast('✅ Dokumen bukti dukung berhasil diunggah!'); closeAddBuktiModal(); }" class="p-6 space-y-4 text-xs text-slate-700">
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Kategori Tingkat Bukti Dukung</label>
                    <select id="buktiModalKategori" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-600 focus:outline-none">
                        <option value="desa">A. Tingkat Desa (Laporan Bulanan, SK, Foto Kegiatan)</option>
                        <option value="kab">B. Tingkat Kabupaten (Verifikasi BPS, Rekapitulasi Sektoral)</option>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Nama Dokumen Bukti Dukung</label>
                    <input type="text" id="buktiModalNama" required placeholder="Contoh: Laporan Pembinaan Triwulan III Excel" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-600 focus:outline-none">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Pilih File Dokumen (Excel / PDF / Foto)</label>
                    <input type="file" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs bg-slate-50 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-600 file:text-white hover:file:bg-emerald-700 cursor-pointer">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Keterangan / Catatan Verifikasi</label>
                    <textarea rows="2" placeholder="Catatan tambahan untuk tim verifikator BPS..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-600 focus:outline-none"></textarea>
                </div>
                <div class="pt-2 flex justify-end gap-2">
                    <button type="button" onclick="closeAddBuktiModal()" class="px-4 py-2 rounded-xl bg-slate-200 text-slate-700 font-bold text-xs hover:bg-slate-300 transition cursor-pointer">Batal</button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-emerald-600 text-white font-black text-xs hover:bg-emerald-700 transition cursor-pointer shadow-md">Simpan & Unggah ✓</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL DETAIL PUBLIKASI DOKUMEN RESMI STATISTIK SEKTORAL        -->
    <!-- ============================================================== -->
        <!-- ============================================================== -->
    <!-- MODAL GALERI FOTO DESA RESMI & INTERAKTIF                        -->
    <!-- Menampilkan dokumentasi pembinaan, potensi, pencarian & upload  -->
    <!-- ============================================================== -->
    <div id="galeriDesaModal" class="hidden fixed inset-0 z-50 bg-slate-900/85 backdrop-blur-sm flex items-center justify-center p-2 sm:p-6 animate-in fade-in duration-200">
        <div class="bg-white rounded-3xl w-full max-w-5xl max-h-[92vh] flex flex-col shadow-2xl overflow-hidden border border-slate-200">
            <!-- Modal Header -->
            <div class="p-4 sm:p-5 border-b border-slate-200 flex items-center justify-between bg-gradient-to-r from-purple-50 via-white to-indigo-50 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-gradient-to-tr from-purple-600 to-indigo-600 text-white flex items-center justify-center text-xl shrink-0 shadow-sm">
                        <i class="bi bi-camera-reels"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <h3 id="galeriModalTitle" class="text-base sm:text-lg font-black text-slate-900">Galeri Foto Desa Kamisi</h3>
                            <span class="px-2 py-0.5 rounded-full bg-purple-100 text-purple-700 text-[10px] font-black uppercase tracking-wider border border-purple-200">Dokumentasi Resmi BPS</span>
                        </div>
                        <p id="galeriModalSub" class="text-xs text-slate-500 mt-0.5 line-clamp-1">Dokumentasi pembinaan Desa Cantik, potensi sentra kakao, bahari, dan aktivitas warga</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-2">
                    <!-- Tombol Tambah Foto Baru oleh Admin -->
                    <button type="button" onclick="openUploadFotoModal()" class="flex items-center gap-1.5 px-3 sm:px-4 py-2 rounded-xl bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-700 hover:from-purple-700 hover:to-indigo-800 text-white font-bold text-xs shadow-md shadow-purple-500/20 active:scale-95 transition cursor-pointer">
                        <i class="bi bi-cloud-arrow-up-fill text-sm"></i>
                        <span class="hidden sm:inline">+ Unggah Foto Baru</span>
                        <span class="sm:hidden">+ Unggah</span>
                    </button>
                    <button type="button" onclick="closeGaleriDesaModal()" class="w-9 h-9 rounded-full hover:bg-slate-200 text-slate-500 flex items-center justify-center transition cursor-pointer" title="Tutup Galeri">
                        <i class="bi bi-x-lg text-sm"></i>
                    </button>
                </div>
            </div>

            <!-- Toolbar Interaktif: Filter Kategori & Pencarian -->
            <div class="px-4 sm:px-6 py-2.5 border-b border-slate-200 bg-slate-50/90 flex flex-col sm:flex-row sm:items-center justify-between gap-3 shrink-0">
                <!-- Category Filter Tabs -->
                <div class="flex items-center gap-1.5 overflow-x-auto pb-1 sm:pb-0 scrollbar-none">
                    <button type="button" onclick="filterGaleriPhotos('all', this)" class="galeri-filter-btn px-3 py-1.5 rounded-xl text-xs font-bold transition bg-purple-600 text-white shadow-2xs cursor-pointer whitespace-nowrap">Semua Foto</button>
                    <button type="button" onclick="filterGaleriPhotos('custom', this)" class="galeri-filter-btn px-3 py-1.5 rounded-xl text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-200 border border-slate-200 cursor-pointer whitespace-nowrap flex items-center gap-1">
                        <span>⭐ Unggahan Admin</span>
                    </button>
                    <button type="button" onclick="filterGaleriPhotos('pembinaan', this)" class="galeri-filter-btn px-3 py-1.5 rounded-xl text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-200 border border-slate-200 cursor-pointer whitespace-nowrap">Pembinaan BPS</button>
                    <button type="button" onclick="filterGaleriPhotos('potensi', this)" class="galeri-filter-btn px-3 py-1.5 rounded-xl text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-200 border border-slate-200 cursor-pointer whitespace-nowrap">Potensi &amp; UMKM</button>
                    <button type="button" onclick="filterGaleriPhotos('alam', this)" class="galeri-filter-btn px-3 py-1.5 rounded-xl text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-200 border border-slate-200 cursor-pointer whitespace-nowrap">Pesona Alam</button>
                    <button type="button" onclick="filterGaleriPhotos('pelayanan', this)" class="galeri-filter-btn px-3 py-1.5 rounded-xl text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-200 border border-slate-200 cursor-pointer whitespace-nowrap">Layanan Desa</button>
                </div>

                <!-- Input Pencarian Foto -->
                <div class="flex items-center gap-2 shrink-0">
                    <div class="relative w-full sm:w-56">
                        <i class="bi bi-search absolute left-3 top-2.5 text-slate-400 text-xs"></i>
                        <input type="text" id="galeriSearchInput" oninput="searchGaleriPhotos(this.value)" placeholder="Cari foto dokumentasi..." class="w-full pl-8 pr-3 py-1.5 rounded-xl border border-slate-200 bg-white text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition">
                    </div>
                    <span id="galeriCountInfo" class="text-xs font-extrabold text-purple-700 bg-purple-50 px-2.5 py-1 rounded-lg border border-purple-200 whitespace-nowrap hidden sm:inline">
                        8 Foto
                    </span>
                </div>
            </div>

            <!-- Photo Grid -->
            <div id="galeriPhotosGrid" class="flex-1 overflow-y-auto p-4 sm:p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Dynamically populated via renderGaleriPhotos() -->
            </div>

            <!-- Modal Footer -->
            <div class="p-3 sm:p-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between text-xs text-slate-500 shrink-0">
                <span class="flex items-center gap-1.5">
                    <i class="bi bi-info-circle text-purple-600"></i>
                    <span>Klik pada foto atau tombol perbesar untuk melihat ukuran resolusi penuh.</span>
                </span>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="openUploadFotoModal()" class="px-3.5 py-1.5 rounded-xl bg-purple-50 hover:bg-purple-100 text-purple-700 border border-purple-200 font-bold transition cursor-pointer flex items-center gap-1 text-xs">
                        <i class="bi bi-cloud-arrow-up-fill"></i>
                        <span>Unggah Foto</span>
                    </button>
                    <button type="button" onclick="closeGaleriDesaModal()" class="px-4 py-1.5 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold transition cursor-pointer">
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
    <!-- ============================================================== -->
    <div id="galeriLightboxModal" class="hidden fixed inset-0 z-70 bg-slate-950/90 backdrop-blur-md flex items-center justify-center p-3 sm:p-6 animate-in fade-in duration-200">
        <div class="relative w-full max-w-4xl bg-slate-900 rounded-3xl overflow-hidden shadow-2xl border border-slate-800 flex flex-col max-h-[95vh]">
            <!-- Lightbox Topbar -->
            <div class="p-3 sm:p-4 bg-slate-900/90 border-b border-slate-800 flex items-center justify-between text-white shrink-0">
                <div class="flex items-center gap-2">
                    <span id="lightboxBadge" class="px-2.5 py-0.5 rounded-full bg-purple-500/20 text-purple-300 border border-purple-500/30 text-[10px] font-black uppercase tracking-wider">
                        Dokumentasi
                    </span>
                    <span id="lightboxDate" class="text-xs text-slate-400 font-semibold">2026</span>
                </div>
                <div class="flex items-center gap-2">
                    <button id="lightboxDownloadBtn" type="button" class="px-3 py-1.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-bold transition flex items-center gap-1.5 cursor-pointer" title="Unduh Foto Ini">
                        <i class="bi bi-download"></i>
                        <span class="hidden sm:inline">Unduh Foto</span>
                    </button>
                    <button type="button" onclick="closeGaleriLightbox()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-sm font-bold transition cursor-pointer" title="Tutup">
                        ✕
                    </button>
                </div>
            </div>

            <!-- Lightbox Image Center -->
            <div class="flex-1 overflow-hidden bg-black flex items-center justify-center p-2 sm:p-4 min-h-[300px]">
                <img id="lightboxImg" src="" alt="Dokumentasi Penuh" class="max-h-[68vh] max-w-full object-contain rounded-xl shadow-lg">
            </div>

            <!-- Lightbox Caption Footer -->
            <div class="p-4 bg-slate-900 border-t border-slate-800 text-white shrink-0">
                <h4 id="lightboxTitle" class="font-black text-sm sm:text-base text-white">Judul Dokumentasi Foto</h4>
                <p id="lightboxCaption" class="text-xs text-slate-400 mt-1 leading-relaxed">Keterangan dokumentasi kegiatan resmi desa.</p>
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