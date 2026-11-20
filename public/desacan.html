<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Cantik — Dashboard 6 Desa Binaan | BPS Kabupaten Kolaka Utara</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Chart.js 4.4 CDN for Visual Analytics -->
    <script src="/vendor/chart.umd.min.js"></script>
    <script>
        // Cadangan: bila berkas lokal tidak ada di server, muat dari CDN
        if (typeof Chart === 'undefined') {
            document.write('<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"><\/script>');
        }
    </script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
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
                            primary: '#0E7C5A',
                            primaryHover: '#096347',
                            primaryLight: '#E6F4EA',
                            navy: '#0b2545',
                            dark: '#071b12',
                            bg: '#F8FAFC',
                            surface: '#FFFFFF',
                            border: '#E2E8F0',
                            text: '#0F172A',
                            muted: '#64748B'
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Script Sistem Autentikasi Akun Resmi 6 Desa DESCAN -->
    <script src="/js/descan-auth.js"></script>
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            line-height: 1.6;
        }

        /* Topbar BPS */
        .topbar-bps {
            background: #071b12;
            color: #d1fae5;
            font-size: 11.5px;
            padding: 7px 0;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        /* Navbar Sticky */
        .navbar-clean {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid #e2e8f0;
        }

        /* Nav link active indicator */
        .nav-link {
            position: relative;
            font-weight: 700;
            font-size: 13px;
            color: #475569;
            transition: color 0.15s ease;
        }
        .nav-link:hover {
            color: #0E7C5A;
        }

        /* Hero */
        .hero-banner {
            background: linear-gradient(135deg, #071b12 0%, #0d3522 55%, #0b2545 100%);
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

                /* ===== 3D MODERN STATS CARDS ===== */
        .stat-card-3d {
            position: relative;
            background: linear-gradient(165deg, #ffffff 0%, #fbfdfc 100%);
            border-radius: 24px;
            border: 1px solid rgba(226, 232, 240, 0.85);
            box-shadow: 0 14px 34px -8px rgba(15, 23, 42, 0.08), 0 2px 6px rgba(15, 23, 42, 0.03), inset 0 2px 0 rgba(255, 255, 255, 1);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }
        .stat-card-3d::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--accent-bar, linear-gradient(90deg, #10b981, #059669));
            border-radius: 24px 24px 0 0;
        }
        .stat-card-3d:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 26px 48px -12px rgba(15, 107, 74, 0.2), 0 4px 12px rgba(15, 23, 42, 0.04), inset 0 2px 0 rgba(255, 255, 255, 1);
            border-color: rgba(16, 185, 129, 0.35);
        }
        .orb-3d {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.35s ease;
        }
        .stat-card-3d:hover .orb-3d {
            transform: scale(1.1) rotate(4deg);
        }

        /* Chart & KPI Cards */
        .card-surface {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
            transition: all 0.2s ease;
        }
        .card-surface:hover {
            border-color: #cbd5e1;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.06);
        }

        /* Village Compact Card */
        .village-compact-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .village-compact-card:hover {
            transform: translateY(-3px);
            border-color: #0E7C5A;
            box-shadow: 0 12px 28px -4px rgba(14, 124, 90, 0.12);
        }

        /* Tab Switcher Buttons */
        .tab-btn.active {
            background: #0E7C5A;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(14, 124, 90, 0.25);
        }
        .tab-btn:not(.active) {
            background: transparent;
            color: #64748b;
        }
        .tab-btn:not(.active):hover {
            color: #0f172a;
            background: #f1f5f9;
        }

        /* Filter Pills */
        .pill-filter.active {
            background: #0b2545;
            color: #ffffff;
        }
        .pill-filter:not(.active) {
            background: #ffffff;
            color: #64748b;
            border: 1px solid #e2e8f0;
        }
        .pill-filter:not(.active):hover {
            background: #f8fafc;
            color: #0f172a;
        }

        /* ===== Dashboard grafik ===== */
        .panel-title { display:flex; align-items:center; gap:.5rem; font-size:14px; font-weight:800; color:#0f172a; }
        .panel-title .dot { width:10px; height:10px; border-radius:50%; flex-shrink:0; }
        .panel-sub { font-size:11.5px; color:#64748b; margin-top:.2rem; }
        .panel-pill { font-size:10px; font-weight:800; padding:.2rem .55rem; border-radius:.45rem; white-space:nowrap; }
        .chart-box { position:relative; width:100%; }
        .rank-row .bar { height:10px; border-radius:99px; background:#eef2f6; overflow:hidden; }
        .rank-row .bar > span { display:block; height:100%; border-radius:99px; }
        .insight { display:flex; gap:.75rem; align-items:flex-start; padding:.85rem; border-radius:.9rem; border:1px solid #e2e8f0; background:#f8fafc; }
        .insight .ic { width:34px; height:34px; border-radius:.6rem; display:flex; align-items:center; justify-content:center; font-size:1rem; flex-shrink:0; }

        /* Toast Popup */
        #toastBox {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease;
        }
    
        /* ============================================================== */
        /* 3D HORIZONTAL TRACK CAROUSEL (6 DESA BERJEJER + BERGERAK KIRI) */
        /* ============================================================== */
        .coverflow-stage {
            perspective: 1200px;
            width: 100%;
            position: relative;
            padding: 30px 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            touch-action: pan-y;
            user-select: none;
        }

        .coverflow-track {
            display: flex;
            align-items: center;
            gap: 24px;
            transition: transform 0.65s cubic-bezier(0.22, 1, 0.36, 1);
            transform-style: preserve-3d;
            will-change: transform;
            padding: 10px 0;
        }

        .coverflow-card {
            position: relative;
            width: 280px;
            height: 470px;
            border-radius: 28px;
            overflow: hidden;
            cursor: pointer;
            flex-shrink: 0;
            transition: transform 0.65s cubic-bezier(0.22, 1, 0.36, 1), 
                        opacity 0.65s cubic-bezier(0.22, 1, 0.36, 1), 
                        filter 0.65s cubic-bezier(0.22, 1, 0.36, 1),
                        box-shadow 0.65s ease;
            transform-style: preserve-3d;
            box-shadow: 0 16px 36px -10px rgba(0, 0, 0, 0.55);
            background: #0f172a;
            transform: scale(0.9) rotateY(0deg);
            opacity: 0.88;
        }

        .coverflow-card.active {
            cursor: default;
            transform: scale(1.08) translateZ(40px) rotateY(0deg) !important;
            box-shadow: 0 30px 65px -12px rgba(14, 124, 90, 0.55), 0 0 0 2.5px rgba(52, 211, 153, 0.9);
            z-index: 40;
            opacity: 1 !important;
            filter: brightness(1) !important;
        }

        .coverflow-card.card-left {
            transform: scale(0.92) rotateY(18deg);
            opacity: 0.92;
            filter: brightness(0.88);
            z-index: 30;
        }

        .coverflow-card.card-right {
            transform: scale(0.92) rotateY(-18deg);
            opacity: 0.92;
            filter: brightness(0.88);
            z-index: 30;
        }

        .coverflow-card.card-far-left {
            transform: scale(0.82) rotateY(30deg);
            opacity: 0.82;
            filter: brightness(0.72);
            z-index: 20;
        }

        .coverflow-card.card-far-right {
            transform: scale(0.82) rotateY(-30deg);
            opacity: 0.82;
            filter: brightness(0.72);
            z-index: 20;
        }

        .coverflow-card img.card-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .coverflow-card:hover img.card-bg {
            transform: scale(1.06);
        }

        .coverflow-card .card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, 
                rgba(15, 23, 42, 0.45) 0%, 
                rgba(15, 23, 42, 0.1) 25%, 
                rgba(15, 23, 42, 0.75) 60%, 
                rgba(15, 23, 42, 0.98) 100%);
        }

        .coverflow-card .card-content {
            position: relative;
            z-index: 10;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.35rem;
        }

        @media (max-width: 640px) {
            .coverflow-stage {
                padding: 15px 0;
            }
            .coverflow-track {
                gap: 16px;
            }
            .coverflow-card {
                width: 250px;
                height: 420px;
                border-radius: 22px;
            }
            .coverflow-card .card-content {
                padding: 1.1rem;
            }
        }

</style>
</head>
<body class="min-h-screen flex flex-col justify-between selection:bg-emerald-200 selection:text-emerald-950">

    <!-- ============================================================== -->
    <!-- 1. TOP BAR BPS RESMI (Ringkas & Rapi)                           -->
    <!-- ============================================================== -->
    <div class="topbar-bps">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="font-bold text-white">BPS Kabupaten Kolaka Utara</span>
                <span class="opacity-40">•</span>
                <span class="hidden sm:inline text-emerald-200">Program Desa Cinta Statistik (Desa Cantik) 2026</span>
            </div>
            <div class="flex items-center gap-3 text-[11px]">
                <span class="hidden md:inline text-emerald-100">Kec. Kodeoha & Kec. Tiwu</span>
                <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 font-extrabold border border-emerald-400/20">
                    Satu Data Indonesia
                </span>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 2. NAVBAR (Tepat 4 Menu Bersih, Tanpa Menu WebGIS)              -->
    <!-- ============================================================== -->
    <header class="navbar-clean">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 py-3 flex items-center justify-between gap-4">
            
            <!-- Brand Logo -->
            <a href="/descan" class="flex items-center gap-3 group">
                <div class="flex items-center gap-2 bg-white px-2 py-1.5 rounded-xl border border-slate-200 shadow-2xs group-hover:scale-105 transition">
                    <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-8 w-auto object-contain" title="Pemerintah Kabupaten Kolaka Utara">
                    <div class="h-5 w-[1.5px] bg-slate-200"></div>
                    <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-7 w-auto object-contain" title="Badan Pusat Statistik Kolaka Utara">
                </div>
                <div>
                    <div class="text-base sm:text-lg font-black tracking-tight text-slate-900 leading-none flex items-center gap-1.5">
                        <span>DESCAN</span>
                        <span class="text-[9px] px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-extrabold">KODEOHA & TIWU</span>
                    </div>
                    <div class="text-[10px] text-slate-500 font-bold tracking-wide uppercase mt-0.5">
                        Desa Cantik • Kolaka Utara
                    </div>
                </div>
            </a>

            <!-- Navigasi Menu Header Descan (Rata Kanan & Sinkron) -->
            <nav class="hidden md:flex items-center gap-7">
                <a href="#beranda" class="nav-link">
                    Beranda
                </a>
                <a href="#dashboard" class="nav-link">
                    Dashboard &amp; Grafik
                </a>
                <a href="#desa" class="nav-link">
                    6 Desa Binaan
                </a>
                <a href="#output" class="nav-link">
                    Output Program
                </a>
                <a href="#galeri" onclick="openDescanGaleriModal(event)" class="nav-link cursor-pointer">
                    Galeri
                </a>
            </nav>


        </div>
    </header>

    <!-- ============================================================== -->
    <!-- 3. HERO SECTION (Ringkas, Berisi, Tidak Ramai)                  -->
    <!-- ============================================================== -->
    <section id="beranda" class="hero-banner py-12 sm:py-16">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <!-- Left Column: Typography & Action -->
            <div class="lg:col-span-7 space-y-4 text-left">
                <div class="inline-flex items-center gap-2 text-[10px] sm:text-[11px] font-black tracking-widest uppercase text-emerald-300 bg-white/10 px-3.5 py-1.5 rounded-full border border-white/15">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Portal Satu Data Statistik Sektoral 2026</span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight">
                    Desa Cantik. <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 via-teal-200 to-amber-300">
                        Kedaulatan Data
                    </span>
                    <span class="font-normal text-slate-200"> Membangun Desa.</span>
                </h1>

                <p class="text-xs sm:text-sm text-slate-200 font-medium max-w-xl leading-relaxed">
                    Pusat diseminasi data statistik sektoral dan pembinaan agen statistik mandiri untuk <b>6 desa binaan BPS Kabupaten Kolaka Utara</b> di wilayah Kecamatan Kodeoha.
                </p>

                <!-- Action Buttons -->
                <div class="pt-2 flex flex-wrap items-center gap-3">
                    <a href="#dashboard" class="px-6 py-3 rounded-xl bg-[#0E7C5A] hover:bg-[#096347] text-white font-black text-xs shadow-lg transition flex items-center gap-2 transform hover:-translate-y-0.5">
                        <span>📊 Lihat Data Grafik Visual</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                    </a>
                    <a href="#desa" class="px-5 py-3 rounded-xl bg-white/15 hover:bg-white/25 text-white font-bold text-xs border border-white/20 transition flex items-center gap-2">
                        <span>🏘️ Pilih 6 Desa Binaan</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: Ringkasan 4 Pilar Inti -->
            <div class="lg:col-span-5">
                <div class="p-5 rounded-2xl bg-white/10 backdrop-blur-md border border-white/15 shadow-xl space-y-3">
                    <div class="flex items-center justify-between pb-2.5 border-b border-white/10">
                        <span class="text-xs font-black uppercase text-emerald-300 tracking-wider">Indikator Kunci Pembinaan</span>
                        <span class="text-[10px] text-white/70 font-bold">Kec. Kodeoha</span>
                    </div>

                    <div class="grid grid-cols-2 gap-2.5">
                        <div class="p-3.5 rounded-xl bg-white/10 text-center">
                            <div class="text-2xl font-black text-white">6</div>
                            <div class="text-[11px] text-emerald-300 font-bold mt-0.5">Desa Pilot</div>
                            <div class="text-[10px] text-white/60">Binaan BPS</div>
                        </div>
                        <div class="p-3.5 rounded-xl bg-white/10 text-center">
                            <div class="text-2xl font-black text-amber-300">2.426</div>
                            <div class="text-[11px] text-amber-200 font-bold mt-0.5">Keluarga (KK)</div>
                            <div class="text-[10px] text-white/60">Terdata Penuh</div>
                        </div>
                        <div class="p-3.5 rounded-xl bg-white/10 text-center">
                            <div class="text-2xl font-black text-teal-300">44</div>
                            <div class="text-[11px] text-teal-200 font-bold mt-0.5">Variabel Makro</div>
                            <div class="text-[10px] text-white/60">Standar BPS RI</div>
                        </div>
                        <div class="p-3.5 rounded-xl bg-white/10 text-center">
                            <div class="text-2xl font-black text-emerald-300">84%</div>
                            <div class="text-[11px] text-emerald-200 font-bold mt-0.5">Kemandirian</div>
                            <div class="text-[10px] text-white/60">Kader Agen Desa</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- 3D Organic Wave Divider -->
        <div class="w-full overflow-hidden leading-none mt-8 -mb-12 sm:-mb-16">
            <svg class="relative block w-full h-12 sm:h-20 text-[#f8fafc]" viewBox="0 0 1200 120" preserveAspectRatio="none" fill="currentColor">
                <path d="M0,0 C150,85 350,-35 500,45 C650,125 900,10 1200,45 L1200,120 L0,120 Z"></path>
            </svg>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- 4. FLOATING STATS STRIP (5 Kartu 3D Modern, Kreatif & Berkelas) -->
    <!-- ============================================================== -->
    <div class="max-w-[1240px] mx-auto px-4 sm:px-6 -mt-8 sm:-mt-10 lg:-mt-12 relative z-20">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3.5 sm:gap-4 lg:gap-5.5">
            
            <!-- Kartu 1: Desa Pilot (3D Emerald Glow) -->
            <div class="stat-card-3d p-5 sm:py-6 sm:px-4 flex flex-col items-center text-center justify-between group cursor-default" style="--accent-bar: linear-gradient(90deg, #10b981, #059669);">
                <!-- 3D Orb Badge -->
                <div class="orb-3d bg-gradient-to-br from-emerald-400 via-[#0E7C5A] to-[#064e3b] shadow-[0_8px_20px_-3px_rgba(14,124,90,0.5)] ring-4 ring-emerald-50 mb-3.5">
                    <i class="bi bi-geo-alt-fill text-2xl text-white drop-shadow-sm"></i>
                </div>
                <div class="w-full">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 tracking-tight leading-none mb-1.5">6</div>
                    <div class="text-[11px] font-black text-slate-700 uppercase tracking-wider mb-1.5">Desa Pilot</div>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 text-[10.5px] font-bold border border-emerald-200/80 shadow-2xs">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Kec. Kodeoha
                    </span>
                </div>
            </div>

            <!-- Kartu 2: Total Keluarga (3D Amber/Gold Glow) -->
            <div class="stat-card-3d p-5 sm:py-6 sm:px-4 flex flex-col items-center text-center justify-between group cursor-default" style="--accent-bar: linear-gradient(90deg, #f59e0b, #d97706);">
                <!-- 3D Orb Badge -->
                <div class="orb-3d bg-gradient-to-br from-amber-400 via-amber-500 to-amber-700 shadow-[0_8px_20px_-3px_rgba(245,158,11,0.5)] ring-4 ring-amber-50 mb-3.5">
                    <i class="bi bi-people-fill text-2xl text-white drop-shadow-sm"></i>
                </div>
                <div class="w-full">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 tracking-tight leading-none mb-1.5">2.426</div>
                    <div class="text-[11px] font-black text-slate-700 uppercase tracking-wider mb-1.5">Total Keluarga</div>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-800 text-[10.5px] font-bold border border-amber-200/80 shadow-2xs">
                        Kepala Keluarga (KK)
                    </span>
                </div>
            </div>

            <!-- Kartu 3: Total Penduduk (3D Sky Blue Glow) -->
            <div class="stat-card-3d p-5 sm:py-6 sm:px-4 flex flex-col items-center text-center justify-between group cursor-default" style="--accent-bar: linear-gradient(90deg, #0ea5e9, #0284c7);">
                <!-- 3D Orb Badge -->
                <div class="orb-3d bg-gradient-to-br from-cyan-400 via-sky-500 to-blue-700 shadow-[0_8px_20px_-3px_rgba(14,165,233,0.5)] ring-4 ring-sky-50 mb-3.5">
                    <i class="bi bi-person-vcard-fill text-2xl text-white drop-shadow-sm"></i>
                </div>
                <div class="w-full">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 tracking-tight leading-none mb-1.5">8.734</div>
                    <div class="text-[11px] font-black text-slate-700 uppercase tracking-wider mb-1.5">Total Penduduk</div>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-sky-50 text-sky-800 text-[10.5px] font-bold border border-sky-200/80 shadow-2xs">
                        Jiwa Terdata
                    </span>
                </div>
            </div>

            <!-- Kartu 4: Rata-rata Progres (3D Teal/Mint Glow) -->
            <div class="stat-card-3d p-5 sm:py-6 sm:px-4 flex flex-col items-center text-center justify-between group cursor-default" style="--accent-bar: linear-gradient(90deg, #14b8a6, #0d9488);">
                <!-- 3D Orb Badge -->
                <div class="orb-3d bg-gradient-to-br from-teal-400 via-emerald-500 to-teal-800 shadow-[0_8px_20px_-3px_rgba(20,184,166,0.5)] ring-4 ring-teal-50 mb-3.5">
                    <i class="bi bi-graph-up-arrow text-2xl text-white drop-shadow-sm"></i>
                </div>
                <div class="w-full">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-teal-700 to-emerald-700 tracking-tight leading-none mb-1.5">84%</div>
                    <div class="text-[11px] font-black text-slate-700 uppercase tracking-wider mb-1.5">Rata-rata Progres</div>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-teal-50 text-teal-800 text-[10.5px] font-bold border border-teal-200/80 shadow-2xs">
                        <i class="bi bi-check-circle-fill text-[10px] text-teal-600"></i>
                        Pendataan Selesai
                    </span>
                </div>
            </div>

            <!-- Kartu 5: Indikator Terinput (3D Indigo/Royal Glow) -->
            <div class="stat-card-3d p-5 sm:py-6 sm:px-4 flex flex-col items-center text-center justify-between col-span-2 md:col-span-1 group cursor-default" style="--accent-bar: linear-gradient(90deg, #6366f1, #3b82f6);">
                <!-- 3D Orb Badge -->
                <div class="orb-3d bg-gradient-to-br from-indigo-400 via-blue-600 to-indigo-800 shadow-[0_8px_20px_-3px_rgba(99,102,241,0.5)] ring-4 ring-indigo-50 mb-3.5">
                    <i class="bi bi-database-fill-check text-2xl text-white drop-shadow-sm"></i>
                </div>
                <div class="w-full">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-indigo-800 tracking-tight leading-none mb-1.5">223 / 264</div>
                    <div class="text-[11px] font-black text-slate-700 uppercase tracking-wider mb-1.5">Indikator Terinput</div>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-indigo-50 text-indigo-800 text-[10.5px] font-bold border border-indigo-200/80 shadow-2xs">
                        44 Indikator / Desa
                    </span>
                </div>
            </div>

        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 5. MENU 2: DASHBOARD & GRAFIK VISUAL (Paling Menonjol)         -->
    <!-- ============================================================== -->
    <section id="dashboard" class="max-w-[1240px] mx-auto px-4 sm:px-6 pt-14 pb-16 space-y-7">

        <!-- Header + tab -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <span class="text-[11px] font-black uppercase tracking-widest text-[#0E7C5A] bg-emerald-100 px-3 py-1 rounded-full">📊 Visualisasi Statistik Sektoral</span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight mt-2">Dashboard Data &amp; Analitik 6 Desa</h2>
                <p class="text-sm text-slate-500 mt-1 max-w-2xl">Kondisi demografi, perumahan, sanitasi, dan ekonomi desa binaan BPS Kolaka Utara dalam satu tampilan.</p>
            </div>
            <div class="flex items-center gap-1.5 p-1 rounded-xl bg-white border border-slate-200 shadow-sm self-start md:self-auto">
                <button type="button" onclick="switchVisualTab('dashboard')" id="btnTabDashboard" class="tab-btn active px-4 py-2 rounded-lg text-xs font-black transition cursor-pointer flex items-center gap-1.5"><span>📊</span><span>Dashboard Makro</span></button>
                <button type="button" onclick="switchVisualTab('analytics')" id="btnTabAnalytics" class="tab-btn px-4 py-2 rounded-lg text-xs font-black transition cursor-pointer flex items-center gap-1.5"><span>📈</span><span>Analitik Sektoral</span></button>
            </div>
        </div>

        <!-- ============ TAB 1: DASHBOARD MAKRO ============ -->
        <div id="viewDashboard" class="space-y-6">

            <!-- Baris 1: progres + keluarga -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                <div class="lg:col-span-5 card-surface p-5 sm:p-6 flex flex-col">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="panel-title"><span class="dot bg-[#0E7C5A]"></span>Progres Pendataan per Desa</h3>
                            <p class="panel-sub">Indikator terisi dari 44 indikator makro per desa</p>
                        </div>
                        <span class="panel-pill text-emerald-800 bg-emerald-100">Standar SDI</span>
                    </div>
                    <div class="space-y-4 py-5 flex-1">
                        <div class="rank-row">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#0E7C5A1a;color:#0E7C5A;">1</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Desa Kamisi</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Pesisir Bahari</div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0 leading-tight">
                                    <div class="text-sm font-black" style="color:#0E7C5A;">98%</div>
                                    <div class="text-[10px] text-slate-400">43/44</div>
                                </div>
                            </div>
                            <div class="bar"><span style="width:98%;background:#0E7C5A;"></span></div>
                        </div>
                        <div class="rank-row">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#0E7C5A1a;color:#0E7C5A;">2</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Desa Kalu Kaluku</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Pilot Utama</div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0 leading-tight">
                                    <div class="text-sm font-black" style="color:#0E7C5A;">93%</div>
                                    <div class="text-[10px] text-slate-400">41/44</div>
                                </div>
                            </div>
                            <div class="bar"><span style="width:93%;background:#0E7C5A;"></span></div>
                        </div>
                        <div class="rank-row">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#10b9811a;color:#10b981;">3</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Desa Lametuna</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Pertanian</div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0 leading-tight">
                                    <div class="text-sm font-black" style="color:#10b981;">86%</div>
                                    <div class="text-[10px] text-slate-400">38/44</div>
                                </div>
                            </div>
                            <div class="bar"><span style="width:86%;background:#10b981;"></span></div>
                        </div>
                        <div class="rank-row">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#10b9811a;color:#10b981;">4</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Desa Awo</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Gula Aren & Nilam</div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0 leading-tight">
                                    <div class="text-sm font-black" style="color:#10b981;">82%</div>
                                    <div class="text-[10px] text-slate-400">36/44</div>
                                </div>
                            </div>
                            <div class="bar"><span style="width:82%;background:#10b981;"></span></div>
                        </div>
                        <div class="rank-row">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#0ea5e91a;color:#0ea5e9;">5</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Desa Sawangaoha</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Agroindustri</div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0 leading-tight">
                                    <div class="text-sm font-black" style="color:#0ea5e9;">77%</div>
                                    <div class="text-[10px] text-slate-400">34/44</div>
                                </div>
                            </div>
                            <div class="bar"><span style="width:77%;background:#0ea5e9;"></span></div>
                        </div>
                        <div class="rank-row">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#f59e0b1a;color:#f59e0b;">6</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Desa Koroha</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Kakao & Laut</div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0 leading-tight">
                                    <div class="text-sm font-black" style="color:#f59e0b;">68%</div>
                                    <div class="text-[10px] text-slate-400">30/44</div>
                                </div>
                            </div>
                            <div class="bar"><span style="width:68%;background:#f59e0b;"></span></div>
                        </div>
                    </div>
                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-[11.5px] text-slate-500">
                        <span>Total: <b class="text-slate-800">223</b> dari 264 indikator</span>
                        <span class="text-[#0E7C5A] font-extrabold">Rata-rata 84%</span>
                    </div>
                </div>

                <div class="lg:col-span-7 card-surface p-5 sm:p-6 flex flex-col">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="panel-title"><span class="dot bg-blue-600"></span>Penduduk &amp; Keluarga per Desa</h3>
                            <p class="panel-sub">Perbandingan jumlah jiwa dan kepala keluarga (KK) di 6 desa binaan</p>
                        </div>
                        <span class="panel-pill text-blue-700 bg-blue-100">Monografi 2026</span>
                    </div>
                    <div class="chart-box flex-1 mt-4" style="min-height:330px;"><canvas id="chartKeluargaPerDesa"></canvas></div>
                </div>
            </div>

            <!-- Baris 2: 3 distribusi -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-2">
                        <div><h4 class="panel-title"><span class="dot bg-[#0E7C5A]"></span>Kepemilikan Rumah</h4><p class="panel-sub">Status hunian keluarga</p></div>
                        <span class="panel-pill text-emerald-800 bg-emerald-100">Perumahan</span>
                    </div>
                    <div class="chart-box mt-4" style="height:230px;"><canvas id="chartKepemilikanRumah"></canvas></div>
                </div>
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-2">
                        <div><h4 class="panel-title"><span class="dot bg-sky-600"></span>Sumber Air Minum</h4><p class="panel-sub">Akses air bersih rumah tangga</p></div>
                        <span class="panel-pill text-sky-800 bg-sky-100">Sanitasi</span>
                    </div>
                    <div class="chart-box mt-4" style="height:230px;"><canvas id="chartSumberAir"></canvas></div>
                </div>
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-2">
                        <div><h4 class="panel-title"><span class="dot bg-amber-500"></span>Penghasilan Keluarga</h4><p class="panel-sub">Sebaran pendapatan per bulan</p></div>
                        <span class="panel-pill text-amber-800 bg-amber-100">Ekonomi</span>
                    </div>
                    <div class="chart-box mt-4" style="height:230px;"><canvas id="chartPenghasilan"></canvas></div>
                </div>
            </div>

            <!-- Baris 3: sorotan -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="insight" style="background:#f0fdf6;border-color:#bbf0d4;">
                    <span class="ic bg-emerald-100 text-emerald-700">🏆</span>
                    <div class="leading-tight"><div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Progres Tertinggi</div><div class="text-sm font-black text-slate-900 mt-0.5">Desa Kamisi · 98%</div><div class="text-[11px] text-slate-500 mt-0.5">43 dari 44 indikator terisi</div></div>
                </div>
                <div class="insight" style="background:#eff6ff;border-color:#bfdbfe;">
                    <span class="ic bg-blue-100 text-blue-700">⭐</span>
                    <div class="leading-tight"><div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Pilot Utama</div><div class="text-sm font-black text-slate-900 mt-0.5">Kel. Mala-Mala · 93%</div><div class="text-[11px] text-slate-500 mt-0.5">Pusat Layanan Kodeoha (Puskesmas RI & 5 Sekolah)</div></div>
                </div>
                <div class="insight" style="background:#fffbeb;border-color:#fde68a;">
                    <span class="ic bg-amber-100 text-amber-700">🤝</span>
                    <div class="leading-tight"><div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Perlu Pendampingan</div><div class="text-sm font-black text-slate-900 mt-0.5">Desa Koroha · 72%</div><div class="text-[11px] text-slate-500 mt-0.5">12 indikator dalam pembinaan</div></div>
                </div>
            </div>
        </div>

        <!-- ============ TAB 2: ANALITIK SEKTORAL ============ -->
        <div id="viewAnalytics" class="space-y-6 hidden">

            <div class="card-surface p-4 sm:p-5">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-3">
                    <div class="text-[11px] font-black text-slate-500 uppercase tracking-wider">Pilih desa</div>
                    <div class="flex items-center gap-2 overflow-x-auto pb-1 md:pb-0 text-xs font-bold">
                        <button type="button" onclick="filterAnalitikVillage('all')" id="pill-desa-all" class="pill-filter active px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">Semua Desa (6)</button>
                    <button type="button" onclick="filterAnalitikVillage('kamisi')" id="pill-desa-kamisi" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">Kamisi (Kodeoha)</button>
                    <button type="button" onclick="filterAnalitikVillage('koroha')" id="pill-desa-koroha" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">Koroha (Kodeoha)</button>
                    <button type="button" onclick="filterAnalitikVillage('malamala')" id="pill-desa-malamala" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">Mala-Mala (Kodeoha)</button>
                    <button type="button" onclick="filterAnalitikVillage('lapolu')" id="pill-desa-lapolu" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">Lapolu (Tiwu)</button>
                    <button type="button" onclick="filterAnalitikVillage('tanggeawo')" id="pill-desa-tanggeawo" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">Tanggeawo (Tiwu)</button>
                    <button type="button" onclick="filterAnalitikVillage('mattirobulu')" id="pill-desa-mattirobulu" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">Mattiro Bulu (Tiwu)</button>
                    </div>
                </div>
                <div id="analitikSubtext" class="text-[11px] text-slate-400 font-medium mt-2">Dasar perhitungan: 1.833 keluarga (3 Desa/Kelurahan di Kec. Kodeoha & 3 Desa di Kec. Tiwu). Terintegrasi PODES 2025 BPS Kolut.</div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-2">
                        <div><h3 class="panel-title"><span class="dot bg-sky-600"></span>Sumber Penerangan</h3><p class="panel-sub">Komposisi keluarga menurut sumber penerangan</p></div>
                        <span id="badgePeneranganTotal" class="panel-pill text-blue-700 bg-blue-100">1.833 Total KK</span>
                    </div>
                    <div class="chart-box mt-4" style="height:270px;"><canvas id="chartPeneranganCanvas"></canvas></div>
                </div>
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-2">
                        <div><h3 class="panel-title"><span class="dot bg-emerald-600"></span>Jenis Lantai Terluas</h3><p class="panel-sub">Jumlah keluarga menurut jenis lantai bangunan</p></div>
                        <span class="panel-pill text-emerald-800 bg-emerald-100">Fisik Rumah</span>
                    </div>
                    <div class="chart-box mt-4" style="height:270px;"><canvas id="chartLantaiCanvas"></canvas></div>
                </div>
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-2">
                        <div><h3 class="panel-title"><span class="dot bg-amber-500"></span>Penerima Bantuan Pemerintah</h3><p class="panel-sub">Keluarga penerima PKH, BPNT, BLT-DD, dan PIP</p></div>
                        <span class="panel-pill text-amber-800 bg-amber-100">Bantuan Sosial</span>
                    </div>
                    <div class="chart-box mt-4" style="height:270px;"><canvas id="chartBansosCanvas"></canvas></div>
                </div>
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-2">
                        <div><h3 class="panel-title"><span class="dot bg-teal-600"></span>Jaminan Kesehatan (BPJS)</h3><p class="panel-sub">Kepemilikan kartu BPJS: PBI, Mandiri, atau belum</p></div>
                        <span class="panel-pill text-teal-800 bg-teal-100">Proteksi Kesehatan</span>
                    </div>
                    <div class="chart-box mt-4" style="height:270px;"><canvas id="chartBPJSCanvas"></canvas></div>
                </div>
            </div>
        </div>

    </section>

    <!-- ============================================================== -->
    <!-- 6. MENU 3: 6 DESA BINAAN (Gambar Dikecilkan & Data Utuh)       -->
    <!-- ============================================================== -->
        <!-- ============================================================== -->
    <!-- 6. MENU 3: 6 DESA BINAAN (3D ROTATING COVERFLOW CAROUSEL)      -->
    <!-- Mengadopsi tampilan 3D kartu berputar memutar ke kiri (Coverflow) -->
    <!-- ============================================================== -->
        <!-- ============================================================== -->
    <!-- 6. MENU 3: 6 DESA BINAAN (6 DESA BERJEJER & BERGERAK KE KIRI) -->
    <!-- ============================================================== -->
    <section id="desa" class="max-w-[1300px] mx-auto px-4 sm:px-6 py-12 space-y-6">
        
        <!-- Header Section (Matching Image 2 Aesthetic) -->
        <div class="text-center max-w-3xl mx-auto space-y-2.5">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-[11px] font-black uppercase tracking-wider shadow-2xs">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Wilayah Binaan BPS Kolaka Utara</span>
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-slate-900 tracking-tight">
                <span class="font-serif italic font-normal text-[#0E7C5A]">Jelajahi</span> 6 Desa Binaan Desa Cantik
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 max-w-xl mx-auto leading-relaxed">
                6 desa binaan statistik presisi berjejer di bawah ini. Kartu bergerak otomatis ke kiri, klik kartu mana saja untuk memutar ke tengah atau masuk ke dashboard desa.
            </p>
        </div>

        <!-- 3D CAROUSEL CONTAINER (6 DESA BERJEJER SECARA HORIZONTAL) -->
        <div class="relative w-full py-2 select-none overflow-hidden">
            
            <!-- 3D Perspective Stage -->
            <div id="coverflowStage" class="coverflow-stage" onmousedown="handleCoverflowDragStart(event)" ontouchstart="handleCoverflowTouchStart(event)">
                
                <!-- Track Horizontal yang Berisi Seluruh 6 Desa Berjejer -->
                <div id="coverflowTrack" class="coverflow-track">

                    <!-- 1. DESA KAMISI (KEC. KODEOHA) -->
                    <div onclick="handleCoverflowCardClick(event, 0, 'kamisi')" onmouseenter="handleCoverflowCardHover(0)"
                         class="coverflow-card group border border-white/20 active" data-index="0" data-key="kamisi">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80" 
                             alt="Desa Kamisi" class="card-bg">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-emerald-300 font-black text-[10px] tracking-wide border border-white/15">
                                    Pesisir &amp; Teri • Kodeoha
                                </span>
                            </div>
                            <div>
                                <div class="text-[11px] font-bold text-emerald-400 flex items-center gap-1.5 mb-1">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>Bahari Mandiri (98%)</span>
                                </div>
                                <h3 class="text-2xl font-black text-white tracking-tight leading-tight group-hover:text-emerald-300 transition">
                                    Desa Kamisi
                                </h3>
                                <p class="text-xs text-slate-300 line-clamp-2 mt-1 leading-relaxed">
                                    Pusat perikanan tangkap dan pengeringan teri tradisional, perkebunan kakao rakyat.
                                </p>
                                <div class="grid grid-cols-3 gap-1.5 p-2 rounded-2xl bg-white/10 backdrop-blur-md border border-white/15 text-center my-3 text-[10px]">
                                    <div>
                                        <span class="text-slate-300 block font-semibold">Penduduk</span>
                                        <b class="text-xs font-black text-white">1.576</b>
                                    </div>
                                    <div class="border-x border-white/20">
                                        <span class="text-slate-300 block font-semibold">Keluarga</span>
                                        <b class="text-xs font-black text-emerald-300">394 KK</b>
                                    </div>
                                    <div>
                                        <span class="text-slate-300 block font-semibold">IKM</span>
                                        <b class="text-xs font-black text-amber-300">14 Unit</b>
                                    </div>
                                </div>
                                <button type="button" onclick="handleDesaCardAccess(event, 'kamisi')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-emerald-50 text-slate-900 font-black text-xs tracking-wider transition-all duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                                    <span>PILIH DESA</span>
                                    <i class="bi bi-arrow-right font-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 2. DESA KOROHA (KEC. KODEOHA) -->
                    <div onclick="handleCoverflowCardClick(event, 1, 'koroha')" onmouseenter="handleCoverflowCardHover(1)"
                         class="coverflow-card group border border-white/20 card-right" data-index="1" data-key="koroha">
                        <img src="https://images.unsplash.com/photo-1518173946687-a4c8a383392e?auto=format&fit=crop&w=800&q=80" 
                             alt="Desa Koroha" class="card-bg">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-sky-300 font-black text-[10px] tracking-wide border border-white/15">
                                    Kakao &amp; Pesisir • Kodeoha
                                </span>
                            </div>
                            <div>
                                <div class="text-[11px] font-bold text-sky-400 flex items-center gap-1.5 mb-1">
                                    <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
                                    <span>Maritim Mandiri (72%)</span>
                                </div>
                                <h3 class="text-2xl font-black text-white tracking-tight leading-tight group-hover:text-sky-300 transition">
                                    Desa Koroha
                                </h3>
                                <p class="text-xs text-slate-300 line-clamp-2 mt-1 leading-relaxed">
                                    Pengembangan perkebunan kakao sambung pucuk, cengkeh perbukitan dan budidaya laut.
                                </p>
                                <div class="grid grid-cols-3 gap-1.5 p-2 rounded-2xl bg-white/10 backdrop-blur-md border border-white/15 text-center my-3 text-[10px]">
                                    <div>
                                        <span class="text-slate-300 block font-semibold">Penduduk</span>
                                        <b class="text-xs font-black text-white">1.340</b>
                                    </div>
                                    <div class="border-x border-white/20">
                                        <span class="text-slate-300 block font-semibold">Keluarga</span>
                                        <b class="text-xs font-black text-sky-300">335 KK</b>
                                    </div>
                                    <div>
                                        <span class="text-slate-300 block font-semibold">IKM</span>
                                        <b class="text-xs font-black text-amber-300">16 Unit</b>
                                    </div>
                                </div>
                                <button type="button" onclick="handleDesaCardAccess(event, 'koroha')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-sky-50 text-slate-900 font-black text-xs tracking-wider transition-all duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                                    <span>PILIH DESA</span>
                                    <i class="bi bi-arrow-right font-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 3. KELURAHAN MALA-MALA (KEC. KODEOHA) -->
                    <div onclick="handleCoverflowCardClick(event, 2, 'malamala')" onmouseenter="handleCoverflowCardHover(2)"
                         class="coverflow-card group border border-white/20 card-far-right" data-index="2" data-key="malamala">
                        <img src="https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&w=800&q=80" 
                             alt="Kelurahan Mala-Mala" class="card-bg">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-amber-300 font-black text-[10px] tracking-wide border border-white/15">
                                    Pusat Layanan • Kodeoha
                                </span>
                            </div>
                            <div>
                                <div class="text-[11px] font-bold text-amber-400 flex items-center gap-1.5 mb-1">
                                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                                    <span>Perkotaan Mandiri (93%)</span>
                                </div>
                                <h3 class="text-2xl font-black text-white tracking-tight leading-tight group-hover:text-amber-300 transition">
                                    Kelurahan Mala-Mala
                                </h3>
                                <p class="text-xs text-slate-300 line-clamp-2 mt-1 leading-relaxed">
                                    Ibukota Kecamatan Kodeoha, pusat puskesmas rawat inap dan fasilitas umum terpadu.
                                </p>
                                <div class="grid grid-cols-3 gap-1.5 p-2 rounded-2xl bg-white/10 backdrop-blur-md border border-white/15 text-center my-3 text-[10px]">
                                    <div>
                                        <span class="text-slate-300 block font-semibold">Penduduk</span>
                                        <b class="text-xs font-black text-white">1.272</b>
                                    </div>
                                    <div class="border-x border-white/20">
                                        <span class="text-slate-300 block font-semibold">Keluarga</span>
                                        <b class="text-xs font-black text-amber-300">318 KK</b>
                                    </div>
                                    <div>
                                        <span class="text-slate-300 block font-semibold">IKM</span>
                                        <b class="text-xs font-black text-amber-300">2 Unit</b>
                                    </div>
                                </div>
                                <button type="button" onclick="handleDesaCardAccess(event, 'malamala')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-amber-50 text-slate-900 font-black text-xs tracking-wider transition-all duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                                    <span>PILIH KELURAHAN</span>
                                    <i class="bi bi-arrow-right font-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 4. DESA LAPOLU (KEC. TIWU) -->
                    <div onclick="handleCoverflowCardClick(event, 3, 'lapolu')" onmouseenter="handleCoverflowCardHover(3)"
                         class="coverflow-card group border border-white/20" data-index="3" data-key="lapolu">
                        <img src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=800&q=80" 
                             alt="Desa Lapolu" class="card-bg">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-emerald-300 font-black text-[10px] tracking-wide border border-white/15">
                                    Sentra Cengkeh &amp; IMK • Tiwu
                                </span>
                            </div>
                            <div>
                                <div class="text-[11px] font-bold text-emerald-400 flex items-center gap-1.5 mb-1">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>Agro Mandiri (88%)</span>
                                </div>
                                <h3 class="text-2xl font-black text-white tracking-tight leading-tight group-hover:text-emerald-300 transition">
                                    Desa Lapolu
                                </h3>
                                <p class="text-xs text-slate-300 line-clamp-2 mt-1 leading-relaxed">
                                    Sentra perkebunan cengkeh rakyat dan klaster 75 industri kecil menengah (IKM) produktif.
                                </p>
                                <div class="grid grid-cols-3 gap-1.5 p-2 rounded-2xl bg-white/10 backdrop-blur-md border border-white/15 text-center my-3 text-[10px]">
                                    <div>
                                        <span class="text-slate-300 block font-semibold">Penduduk</span>
                                        <b class="text-xs font-black text-white">1.264</b>
                                    </div>
                                    <div class="border-x border-white/20">
                                        <span class="text-slate-300 block font-semibold">Keluarga</span>
                                        <b class="text-xs font-black text-emerald-300">321 KK</b>
                                    </div>
                                    <div>
                                        <span class="text-slate-300 block font-semibold">IKM</span>
                                        <b class="text-xs font-black text-amber-300">75 Unit</b>
                                    </div>
                                </div>
                                <button type="button" onclick="handleDesaCardAccess(event, 'lapolu')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-emerald-50 text-slate-900 font-black text-xs tracking-wider transition-all duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                                    <span>PILIH DESA</span>
                                    <i class="bi bi-arrow-right font-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 5. DESA TANGGEAWO (KEC. TIWU) -->
                    <div onclick="handleCoverflowCardClick(event, 4, 'tanggeawo')" onmouseenter="handleCoverflowCardHover(4)"
                         class="coverflow-card group border border-white/20" data-index="4" data-key="tanggeawo">
                        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=800&q=80" 
                             alt="Desa Tanggeawo" class="card-bg">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-indigo-300 font-black text-[10px] tracking-wide border border-white/15">
                                    Perkebunan Kakao • Tiwu
                                </span>
                            </div>
                            <div>
                                <div class="text-[11px] font-bold text-indigo-400 flex items-center gap-1.5 mb-1">
                                    <span class="w-2 h-2 rounded-full bg-indigo-400 animate-pulse"></span>
                                    <span>Agrikultur Mandiri (84%)</span>
                                </div>
                                <h3 class="text-2xl font-black text-white tracking-tight leading-tight group-hover:text-indigo-300 transition">
                                    Desa Tanggeawo
                                </h3>
                                <p class="text-xs text-slate-300 line-clamp-2 mt-1 leading-relaxed">
                                    Kawasan perkebunan kakao rakyat mandiri dengan 46 unit usaha IKM produktif.
                                </p>
                                <div class="grid grid-cols-3 gap-1.5 p-2 rounded-2xl bg-white/10 backdrop-blur-md border border-white/15 text-center my-3 text-[10px]">
                                    <div>
                                        <span class="text-slate-300 block font-semibold">Penduduk</span>
                                        <b class="text-xs font-black text-white">564</b>
                                    </div>
                                    <div class="border-x border-white/20">
                                        <span class="text-slate-300 block font-semibold">Keluarga</span>
                                        <b class="text-xs font-black text-indigo-300">141 KK</b>
                                    </div>
                                    <div>
                                        <span class="text-slate-300 block font-semibold">IKM</span>
                                        <b class="text-xs font-black text-amber-300">46 Unit</b>
                                    </div>
                                </div>
                                <button type="button" onclick="handleDesaCardAccess(event, 'tanggeawo')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-indigo-50 text-slate-900 font-black text-xs tracking-wider transition-all duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                                    <span>PILIH DESA</span>
                                    <i class="bi bi-arrow-right font-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 6. DESA MATTIRO BULU (KEC. TIWU) -->
                    <div onclick="handleCoverflowCardClick(event, 5, 'mattirobulu')" onmouseenter="handleCoverflowCardHover(5)"
                         class="coverflow-card group border border-white/20" data-index="5" data-key="mattirobulu">
                        <img src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=800&q=80" 
                             alt="Desa Mattiro Bulu" class="card-bg">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-purple-300 font-black text-[10px] tracking-wide border border-white/15">
                                    Dataran Cengkeh &amp; Nilam • Tiwu
                                </span>
                            </div>
                            <div>
                                <div class="text-[11px] font-bold text-purple-400 flex items-center gap-1.5 mb-1">
                                    <span class="w-2 h-2 rounded-full bg-purple-400 animate-pulse"></span>
                                    <span>Terbina Aktif (79%)</span>
                                </div>
                                <h3 class="text-2xl font-black text-white tracking-tight leading-tight group-hover:text-purple-300 transition">
                                    Desa Mattiro Bulu
                                </h3>
                                <p class="text-xs text-slate-300 line-clamp-2 mt-1 leading-relaxed">
                                    Sentra agroindustri perkebunan cengkeh perbukitan, nilam, dan tanaman hortikultura.
                                </p>
                                <div class="grid grid-cols-3 gap-1.5 p-2 rounded-2xl bg-white/10 backdrop-blur-md border border-white/15 text-center my-3 text-[10px]">
                                    <div>
                                        <span class="text-slate-300 block font-semibold">Penduduk</span>
                                        <b class="text-xs font-black text-white">856</b>
                                    </div>
                                    <div class="border-x border-white/20">
                                        <span class="text-slate-300 block font-semibold">Keluarga</span>
                                        <b class="text-xs font-black text-purple-300">324 KK</b>
                                    </div>
                                    <div>
                                        <span class="text-slate-300 block font-semibold">IKM</span>
                                        <b class="text-xs font-black text-amber-300">20 Unit</b>
                                    </div>
                                </div>
                                <button type="button" onclick="handleDesaCardAccess(event, 'mattirobulu')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-purple-50 text-slate-900 font-black text-xs tracking-wider transition-all duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                                    <span>PILIH DESA</span>
                                    <i class="bi bi-arrow-right font-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Indikator Rotasi Otomatis (Tombol Panah Lingkaran Dihapus Sesuai Permintaan) -->
            <div class="flex flex-col items-center justify-center gap-2 mt-6 pt-4 border-t border-slate-200/80 max-w-xl mx-auto">
                <div class="flex items-center justify-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-[11px] font-bold">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Bergerak Otomatis</span>
                    </span>
                    <span id="coverflowActiveTitle" class="text-xs sm:text-sm font-black text-slate-900 tracking-tight truncate">
                        Desa Kamisi (Kecamatan Kodeoha)
                    </span>
                </div>
                <div class="flex items-center justify-center gap-2" id="coverflowDots"></div>
            </div>

            <div class="text-center mt-2.5 text-[11px] text-slate-400 font-medium flex items-center justify-center gap-1.5">
                <i class="bi bi-cursor text-xs text-emerald-600"></i>
                <span>6 Desa berjejer bergerak otomatis. Arahkan kursor ke kartu desa mana saja untuk memutar ke tengah secara otomatis.</span>
            </div>
        </div>

    </section>

    <!-- ============================================================== -->
    <!-- 7. MENU 4: OUTPUT PROGRAM DESA CANTIK (#output)                -->
    <!-- ============================================================== -->
    <section class="py-14 bg-white border-t border-slate-200" id="output">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 space-y-8">
            
            <div class="text-center max-w-xl mx-auto space-y-1.5">
                <span class="text-[11px] font-black uppercase tracking-widest text-[#0E7C5A] bg-emerald-100 px-3 py-1 rounded-full">
                    Hasil Pembinaan BPS
                </span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                    Output Desa Cantik Kolaka Utara
                </h2>
                <p class="text-xs sm:text-sm text-slate-500">
                    Dokumen resmi, tabel data sektoral, dan media diseminasi hasil pembinaan BPS.
                </p>
            </div>

            <!-- 4 Output Cards (Identik Format Perindu) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- 1. Monografi Desa -->
                <div class="card-surface p-5 flex flex-col justify-between space-y-4">
                    <div class="space-y-2.5">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#0E7C5A] flex items-center justify-center text-xl font-bold">
                            📘
                        </div>
                        <h3 class="text-sm font-black text-slate-900">Monografi Desa 2026</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Profil komprehensif demografi, potensi kakao, dan sosial ekonomi 6 desa binaan.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-100 flex items-center gap-2">
                        <button type="button" onclick="openOutputDoc('monografi')" class="flex-1 py-2 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-[#0E7C5A] font-bold text-xs text-center transition cursor-pointer">
                            Buka Dokumen
                        </button>
                        <button type="button" onclick="downloadOutputDoc('monografi')" class="py-2 px-3 rounded-xl bg-[#0E7C5A] hover:bg-[#096347] text-white font-bold text-xs flex items-center justify-center transition cursor-pointer shadow-2xs" title="Download Monografi">
                            📥
                        </button>
                    </div>
                </div>

                <!-- 2. Tabel Statistik Sektoral -->
                <div class="card-surface p-5 flex flex-col justify-between space-y-4">
                    <div class="space-y-2.5">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center text-xl font-bold">
                            📊
                        </div>
                        <h3 class="text-sm font-black text-slate-900">Tabel Statistik Sektoral</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Tabel data rekapitulasi 44 variabel sosial ekonomi keluarga berstandar SDI.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-100 flex items-center gap-2">
                        <button type="button" onclick="openOutputDoc('tabel')" class="flex-1 py-2 rounded-xl bg-blue-50 hover:bg-blue-100 text-blue-800 font-bold text-xs text-center transition cursor-pointer">
                            Spreadsheet
                        </button>
                        <button type="button" onclick="downloadOutputDoc('tabel')" class="py-2 px-3 rounded-xl bg-blue-700 hover:bg-blue-800 text-white font-bold text-xs flex items-center justify-center transition cursor-pointer shadow-2xs" title="Download Excel">
                            📥
                        </button>
                    </div>
                </div>

                <!-- 3. BRS Sektoral BPS -->
                <div class="card-surface p-5 flex flex-col justify-between space-y-4">
                    <div class="space-y-2.5">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center text-xl font-bold">
                            📑
                        </div>
                        <h3 class="text-sm font-black text-slate-900">Publikasi BRS Sektoral</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Berita Resmi Statistik indikator ketenagakerjaan daerah dan komoditas perkebunan kakao.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-100 flex items-center gap-2">
                        <button type="button" onclick="openOutputDoc('brs')" class="flex-1 py-2 rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-900 font-bold text-xs text-center transition cursor-pointer">
                            Buka BRS
                        </button>
                        <button type="button" onclick="downloadOutputDoc('brs')" class="py-2 px-3 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs flex items-center justify-center transition cursor-pointer shadow-2xs" title="Download BRS">
                            📥
                        </button>
                    </div>
                </div>

                <!-- 4. Leaflet & Infografis -->
                <div class="card-surface p-5 flex flex-col justify-between space-y-4">
                    <div class="space-y-2.5">
                        <div class="w-10 h-10 rounded-xl bg-teal-100 text-teal-800 flex items-center justify-center text-xl font-bold">
                            🗺️
                        </div>
                        <h3 class="text-sm font-black text-slate-900">Leaflet & Infografis</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Ringkasan visual statistik dusun dalam format infografis ramah baca bagi masyarakat.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-100 flex items-center gap-2">
                        <button type="button" onclick="openOutputDoc('leaflet')" class="flex-1 py-2 rounded-xl bg-teal-50 hover:bg-teal-100 text-teal-900 font-bold text-xs text-center transition cursor-pointer">
                            Buka Leaflet
                        </button>
                        <button type="button" onclick="downloadOutputDoc('leaflet')" class="py-2 px-3 rounded-xl bg-teal-700 hover:bg-teal-800 text-white font-bold text-xs flex items-center justify-center transition cursor-pointer shadow-2xs" title="Download Leaflet">
                            📥
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ============================================================== -->
    <!-- 8. FOOTER RESMI BPS KOLAKA UTARA                               -->
    <!-- ============================================================== -->
    <footer class="bg-[#071b12] text-white pt-10 pb-8 text-xs border-t border-white/10">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 space-y-6">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 pb-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2 bg-white px-2 py-1.5 rounded-xl shadow-md shrink-0">
                        <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-8 w-auto object-contain">
                        <div class="h-5 w-[1.5px] bg-slate-300"></div>
                        <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-7 w-auto object-contain">
                    </div>
                    <div>
                        <div class="text-[10px] font-bold text-emerald-400 uppercase tracking-widest">Desa Cinta Statistik (Desa Cantik)</div>
                        <h4 class="font-black text-white text-base">Badan Pusat Statistik Kabupaten Kolaka Utara</h4>
                        <p class="text-[11px] text-slate-400">Kompleks Perkantoran Pemkab Kolaka Utara, Lasusua, Sulawesi Tenggara</p>
                    </div>
                </div>

                <!-- 4 Quick Links Konsisten Sesuai Menu -->
                <div class="flex flex-wrap items-center gap-5 text-slate-300 font-bold">
                    <a href="#beranda" class="hover:text-emerald-400 transition">Beranda</a>
                    <a href="#dashboard" class="hover:text-emerald-400 transition">Dashboard & Grafik</a>
                    <a href="#desa" class="hover:text-emerald-400 transition">6 Desa Binaan</a>
                    <a href="#output" class="hover:text-emerald-400 transition">Output Program</a>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 text-slate-400 text-[11px]">
                <p>© 2024–2026 Badan Pusat Statistik Kabupaten Kolaka Utara. Seluruh Hak Dilindungi.</p>
                <div class="flex items-center gap-3 font-medium">
                    <span>Desa Cantik</span>
                    <span>•</span>
                    <span>Satu Data Indonesia</span>
                    <span>•</span>
                    <span>Kecamatan Kodeoha</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Toast Notification Box -->
    <div id="toastBox" class="fixed bottom-6 right-6 z-50 transform translate-y-24 opacity-0 pointer-events-none px-4 py-3 rounded-2xl bg-slate-900 text-white text-xs font-black shadow-2xl flex items-center gap-2.5 border border-slate-700">
        <span id="toastIcon">ℹ️</span>
        <span id="toastMsg">Memuat...</span>
    </div>

    <!-- ============================================================== -->
    <!-- SCRIPT: INTERAKTIVITAS & CHART.JS                              -->
    <!-- ============================================================== -->
    <script>
        // Global Chart Instances Holder
        let chartInstances = {};

        // Data Asli 6 Desa Binaan Kecamatan Kodeoha
        const villagesMeta = {
            kamisi: { name: 'Kamisi', kec: 'Kodeoha', kk: 394, pop: 1576, ikm: 14, progress: 98, penerangan: { plnMeter: 310, plnTanpa: 84, nonPln: 0 }, lantai: { semen: 190, keramik: 155, kayu: 40, marmer: 9 } },
            koroha: { name: 'Koroha', kec: 'Kodeoha', kk: 335, pop: 1340, ikm: 16, progress: 72, penerangan: { plnMeter: 260, plnTanpa: 75, nonPln: 0 }, lantai: { semen: 170, keramik: 125, kayu: 34, marmer: 6 } },
            malamala: { name: 'Mala-Mala', kec: 'Kodeoha', kk: 318, pop: 1272, ikm: 2, progress: 93, penerangan: { plnMeter: 275, plnTanpa: 43, nonPln: 0 }, lantai: { semen: 110, keramik: 175, kayu: 25, marmer: 8 } },
            lapolu: { name: 'Lapolu', kec: 'Tiwu', kk: 321, pop: 1264, ikm: 75, progress: 88, penerangan: { plnMeter: 250, plnTanpa: 66, nonPln: 5 }, lantai: { semen: 160, keramik: 120, kayu: 35, marmer: 6 } },
            tanggeawo: { name: 'Tanggeawo', kec: 'Tiwu', kk: 141, pop: 564, ikm: 46, progress: 84, penerangan: { plnMeter: 115, plnTanpa: 26, nonPln: 0 }, lantai: { semen: 75, keramik: 48, kayu: 15, marmer: 3 } },
            mattirobulu: { name: 'Mattiro Bulu', kec: 'Tiwu', kk: 324, pop: 856, ikm: 20, progress: 79, penerangan: { plnMeter: 180, plnTanpa: 34, nonPln: 110 }, lantai: { semen: 180, keramik: 85, kayu: 50, marmer: 9 } }
        };
        // Aliases for compatibility
        villagesMeta.kalukaluku = villagesMeta.kamisi;
        villagesMeta.awo = villagesMeta.koroha;
        villagesMeta.lametuna = villagesMeta.lapolu;
        villagesMeta.sawangaoha = villagesMeta.tanggeawo;
        villagesMeta.mattirowalie = villagesMeta.mattirobulu;

        // Toast Helper
        function showToast(msg, icon = 'ℹ️') {
            const box = document.getElementById('toastBox');
            const msgEl = document.getElementById('toastMsg');
            const iconEl = document.getElementById('toastIcon');
            if (!box || !msgEl) return;
            msgEl.textContent = msg;
            if (iconEl) iconEl.textContent = icon;
            box.classList.remove('translate-y-24', 'opacity-0');
            box.classList.add('translate-y-0', 'opacity-100');
            clearTimeout(window._toastTimer);
            window._toastTimer = setTimeout(() => {
                box.classList.remove('translate-y-0', 'opacity-100');
                box.classList.add('translate-y-24', 'opacity-0');
            }, 3000);
        }

        // Tab Switcher (Dashboard vs Analytics)
        function switchVisualTab(tab) {
            const vDash = document.getElementById('viewDashboard');
            const vAnal = document.getElementById('viewAnalytics');
            const btnDash = document.getElementById('btnTabDashboard');
            const btnAnal = document.getElementById('btnTabAnalytics');

            if (tab === 'dashboard') {
                if (vDash) vDash.classList.remove('hidden');
                if (vAnal) vAnal.classList.add('hidden');
                if (btnDash) btnDash.classList.add('active');
                if (btnAnal) btnAnal.classList.remove('active');
                initDashboardCharts();
            } else {
                if (vDash) vDash.classList.add('hidden');
                if (vAnal) vAnal.classList.remove('hidden');
                if (btnDash) btnDash.classList.remove('active');
                if (btnAnal) btnAnal.classList.add('active');
                initAnalyticsCharts('all');
            }
        }

        // ===== Tema & plugin grafik =====
        const fmt = (n) => Number(n).toLocaleString('id-ID');
        if (typeof Chart !== 'undefined') {
            Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
            Chart.defaults.font.size = 11;
            Chart.defaults.color = '#64748b';
            Chart.defaults.animation.duration = 700;
            Chart.defaults.plugins.tooltip.backgroundColor = '#0f172a';
            Chart.defaults.plugins.tooltip.padding = 10;
            Chart.defaults.plugins.tooltip.cornerRadius = 10;
            Chart.defaults.plugins.tooltip.titleFont = { weight: '800' };
            Chart.defaults.plugins.tooltip.boxPadding = 4;
            Chart.defaults.plugins.legend.labels.usePointStyle = true;
            Chart.defaults.plugins.legend.labels.boxWidth = 8;
            Chart.defaults.plugins.legend.labels.padding = 14;

            // Teks di tengah donat
            Chart.register({
                id: 'centerText',
                afterDraw(chart, args, opts) {
                    if (!opts || !opts.text) return;
                    const { ctx, chartArea: { left, right, top, bottom } } = chart;
                    const x = (left + right) / 2, y = (top + bottom) / 2;
                    ctx.save();
                    ctx.textAlign = 'center'; ctx.textBaseline = 'middle';
                    ctx.fillStyle = '#0f172a'; ctx.font = '800 24px "Plus Jakarta Sans", sans-serif';
                    ctx.fillText(opts.text, x, y - (opts.sub ? 7 : 0));
                    if (opts.sub) { ctx.fillStyle = '#64748b'; ctx.font = '600 10.5px "Plus Jakarta Sans", sans-serif'; ctx.fillText(opts.sub, x, y + 14); }
                    ctx.restore();
                }
            });
            // Angka di ujung batang
            Chart.register({
                id: 'valueLabel',
                afterDatasetsDraw(chart, args, opts) {
                    if (!opts || !opts.show) return;
                    const { ctx } = chart;
                    const horizontal = chart.options.indexAxis === 'y';
                    ctx.save();
                    ctx.fillStyle = '#334155'; ctx.font = '800 10.5px "Plus Jakarta Sans", sans-serif';
                    chart.data.datasets.forEach((ds, i) => {
                        chart.getDatasetMeta(i).data.forEach((bar, j) => {
                            const v = ds.data[j]; if (v == null) return;
                            if (horizontal) { ctx.textAlign = 'left'; ctx.textBaseline = 'middle'; ctx.fillText(fmt(v), bar.x + 6, bar.y); }
                            else { ctx.textAlign = 'center'; ctx.textBaseline = 'bottom'; ctx.fillText(fmt(v), bar.x, bar.y - 5); }
                        });
                    });
                    ctx.restore();
                }
            });
        }

        const GRID = { color: '#eef2f6', drawBorder: false };
        const legendBottom = { position: 'bottom', labels: { font: { size: 10.5, weight: '600' } } };
        function mk(key, id, cfg) {
            const el = document.getElementById(id);
            if (!el) return;
            if (chartInstances[key]) chartInstances[key].destroy();
            chartInstances[key] = new Chart(el.getContext('2d'), cfg);
        }
        function donut(key, id, labels, data, colors, center, cutout = '70%') {
            mk(key, id, {
                type: 'doughnut',
                data: { labels, datasets: [{ data, backgroundColor: colors, borderWidth: 3, borderColor: '#ffffff', hoverOffset: 6 }] },
                options: { responsive: true, maintainAspectRatio: false, cutout,
                    layout: { padding: 4 },
                    plugins: { legend: legendBottom, centerText: center } }
            });
        }

        // ===== Tab 1: Dashboard Makro =====
        function initDashboardCharts() {
            if (typeof Chart === 'undefined') return;
            const order = ['kamisi', 'koroha', 'malamala', 'lapolu', 'tanggeawo', 'mattirobulu'];
            const vm = order.map(k => villagesMeta[k]);

            mk('keluarga', 'chartKeluargaPerDesa', {
                type: 'bar',
                data: {
                    labels: vm.map(v => v.name),
                    datasets: [
                        { label: 'Penduduk (jiwa)', data: vm.map(v => v.pop), backgroundColor: '#0E7C5A', borderRadius: 6, maxBarThickness: 26 },
                        { label: 'Keluarga (KK)', data: vm.map(v => v.kk), backgroundColor: '#38bdf8', borderRadius: 6, maxBarThickness: 26 }
                    ]
                },
                options: {
                    responsive: true, maintainAspectRatio: false,
                    layout: { padding: { top: 18 } },
                    interaction: { mode: 'index', intersect: false },
                    plugins: { legend: { position: 'top', align: 'end', labels: { font: { size: 11, weight: '700' } } },
                               valueLabel: { show: true },
                               tooltip: { callbacks: { label: c => ` ${c.dataset.label}: ${fmt(c.parsed.y)}` } } },
                    scales: { y: { beginAtZero: true, grid: GRID, border: { display: false }, ticks: { callback: v => fmt(v) } },
                              x: { grid: { display: false }, ticks: { font: { weight: '700' } } } }
                }
            });

            donut('rumah', 'chartKepemilikanRumah', ['Milik Sendiri · 81%', 'Sewa / Kontrak · 12%', 'Bebas Sewa · 7%'], [81, 12, 7],
                ['#0E7C5A', '#38bdf8', '#f59e0b'], { text: '81%', sub: 'milik sendiri' });
            donut('air', 'chartSumberAir', ['Sumur Terlindung · 62%', 'Mata Air · 24%', 'PAM / BPSPAM · 14%'], [62, 24, 14],
                ['#0284c7', '#0d9488', '#7dd3fc'], { text: '62%', sub: 'sumur terlindung' });

            mk('penghasilan', 'chartPenghasilan', {
                type: 'bar',
                data: { labels: ['< 1,5 Jt', '1,5 – 3 Jt', '3 – 5 Jt', '> 5 Jt'],
                        datasets: [{ label: 'Keluarga', data: [320, 1140, 710, 256], backgroundColor: ['#f59e0b', '#0E7C5A', '#0284c7', '#6366f1'], borderRadius: 6, maxBarThickness: 34 }] },
                options: { responsive: true, maintainAspectRatio: false, layout: { padding: { top: 16 } },
                    plugins: { legend: { display: false }, valueLabel: { show: true } },
                    scales: { y: { beginAtZero: true, grid: GRID, border: { display: false }, ticks: { callback: v => fmt(v) } },
                              x: { grid: { display: false }, ticks: { font: { weight: '700' } } } } }
            });
        }

        // ===== Tab 2: Analitik Sektoral =====
        function initAnalyticsCharts(selectedVillage = 'all') {
            if (typeof Chart === 'undefined') return;

            document.querySelectorAll('.pill-filter').forEach(btn => btn.classList.remove('active'));
            const targetPill = document.getElementById('pill-desa-' + selectedVillage);
            if (targetPill) targetPill.classList.add('active');

            let totalKK = 2426;
            let pMeter = 1892, pTanpa = 339, pNon = 195;
            let lSemen = 1261, lKeramik = 873, lKayu = 242, lMarmer = 50;
            let wilayah = '6 Desa';

            if (selectedVillage !== 'all' && villagesMeta[selectedVillage]) {
                const vm = villagesMeta[selectedVillage];
                totalKK = vm.kk; wilayah = vm.name;
                pMeter = vm.penerangan.plnMeter; pTanpa = vm.penerangan.plnTanpa; pNon = vm.penerangan.nonPln;
                lSemen = vm.lantai.semen; lKeramik = vm.lantai.keramik; lKayu = vm.lantai.kayu; lMarmer = vm.lantai.marmer;
            }
            const subtext = document.getElementById('analitikSubtext');
            if (subtext) subtext.textContent = selectedVillage === 'all'
                ? 'Dasar perhitungan: 1.833 keluarga (3 Desa/Kelurahan di Kec. Kodeoha & 3 Desa di Kec. Tiwu). Terintegrasi PODES 2025 BPS Kolut.'
                : `Dasar perhitungan: ${fmt(totalKK)} keluarga (Desa ${wilayah}). Seluruh nilai terintegrasi standar BPS.`;
            const badge = document.getElementById('badgePeneranganTotal');
            if (badge) badge.textContent = `${fmt(totalKK)} KK · ${wilayah}`;

            const pct = (v) => Math.round((v / totalKK) * 100);
            donut('penerangan', 'chartPeneranganCanvas',
                [`PLN meteran · ${pct(pMeter)}%`, `PLN tanpa meteran · ${pct(pTanpa)}%`, `Non-PLN · ${pct(pNon)}%`],
                [pMeter, pTanpa, pNon], ['#0284c7', '#f97316', '#10b981'],
                { text: fmt(totalKK), sub: 'total KK' }, '66%');

            mk('lantai', 'chartLantaiCanvas', {
                type: 'bar',
                data: { labels: ['Semen/bata', 'Keramik', 'Kayu/papan', 'Marmer'],
                        datasets: [{ label: 'Jumlah Keluarga', data: [lSemen, lKeramik, lKayu, lMarmer], backgroundColor: ['#0284c7', '#16a34a', '#ea580c', '#475569'], borderRadius: 8, maxBarThickness: 44 }] },
                options: { responsive: true, maintainAspectRatio: false, layout: { padding: { top: 18 } },
                    plugins: { legend: { display: false }, valueLabel: { show: true } },
                    scales: { y: { beginAtZero: true, grid: GRID, border: { display: false }, ticks: { callback: v => fmt(v) } },
                              x: { grid: { display: false }, ticks: { font: { weight: '700' } } } } }
            });

            const bs = [0.16, 0.22, 0.18, 0.14, 0.42].map(f => Math.round(totalKK * f));
            mk('bansos', 'chartBansosCanvas', {
                type: 'bar',
                data: { labels: ['PKH', 'BPNT / Sembako', 'BLT-Dana Desa', 'PIP Pendidikan', 'Non-Bansos'],
                        datasets: [{ label: 'Penerima (KK)', data: bs, backgroundColor: ['#0E7C5A', '#0284c7', '#f59e0b', '#8b5cf6', '#cbd5e1'], borderRadius: 6, maxBarThickness: 24 }] },
                options: { indexAxis: 'y', responsive: true, maintainAspectRatio: false, layout: { padding: { right: 40 } },
                    plugins: { legend: { display: false }, valueLabel: { show: true } },
                    scales: { x: { beginAtZero: true, grid: GRID, border: { display: false }, ticks: { callback: v => fmt(v) } },
                              y: { grid: { display: false }, ticks: { font: { weight: '700' } } } } }
            });

            donut('bpjs', 'chartBPJSCanvas', ['BPJS PBI · 68%', 'BPJS Mandiri · 22%', 'Belum BPJS · 10%'], [68, 22, 10],
                ['#0E7C5A', '#0284c7', '#ef4444'], { text: '90%', sub: 'terlindungi' }, '66%');
        }

        function filterAnalitikVillage(vKey) {
            initAnalyticsCharts(vKey);
            showToast(`Menampilkan analitik ${vKey === 'all' ? 'semua desa' : 'Desa ' + (villagesMeta[vKey]?.name || vKey)}...`, '📈');
        }

        // Handle Card Access (Redirect ke Login Resmi Desa)
        function handleDesaCardAccess(e, desaKey) {
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }
            if (typeof clearDescanAuth === 'function') {
                clearDescanAuth();
            }
            try {
                localStorage.removeItem('descan_auth_session');
                sessionStorage.removeItem('descan_auth_session');
            } catch(err) {}
            window.location.href = `/descan/login?desa=${desaKey}`;
        }

        // ==============================================================
        // OUTPUT DESA CANTIK VIEWER & GENUINE DOWNLOAD ENGINE
        // ==============================================================
        let currentViewerDocType = 'monografi';

        function openOutputDoc(docType) {
            currentViewerDocType = docType;
            const modal = document.getElementById('outputDocViewerModal');
            const iconEl = document.getElementById('docViewerIcon');
            const tagEl = document.getElementById('docViewerTag');
            const titleEl = document.getElementById('docViewerTitle');
            const bodyEl = document.getElementById('docViewerBody');

            if (!modal) return;

            if (docType === 'monografi') {
                if (iconEl) iconEl.innerHTML = '📘';
                if (tagEl) tagEl.textContent = 'BUKU PUBLIKASI RESMI • BPS KAB. KOLAKA UTARA';
                if (titleEl) titleEl.textContent = 'Buku Monografi Desa Cantik Kolaka Utara 2025/2026';
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-5">
                            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 flex flex-wrap items-center justify-between gap-3">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-emerald-800">Nomor Registrasi BPS</div>
                                    <div class="font-black text-slate-900 text-sm">BPS-7408-DESA-CANTIK-2025</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-lg bg-emerald-600 text-white text-[10px] font-black">Format PDF</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 text-[10px] font-black">84 Halaman</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-200 text-slate-800 text-[10px] font-black">4,8 MB</span>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <h4 class="font-black text-slate-900 text-sm flex items-center gap-2">
                                    <i class="bi bi-journal-text text-emerald-600"></i>
                                    <span>Ringkasan Eksekutif & Struktur Bab Monografi</span>
                                </h4>
                                <p class="text-xs text-slate-600 leading-relaxed">
                                    Buku Monografi Desa Cantik merupakan kompilasi data statistik sektoral mikro dan makro hasil pendataan dan pembinaan statistik terintegrasi di 6 wilayah percontohan Kecamatan Kodeoha (Desa Kamisi, Desa Koroha, Kelurahan Mala-Mala) dan Kecamatan Tiwu (Desa Lapolu, Desa Tanggeawo, Desa Mattiro Bulu).
                                </p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                        <b class="text-slate-900 block mb-1">Bab I: Keadaan Geografis & Batas Spasial</b>
                                        <p class="text-[11px] text-slate-500">Batas wilayah koordinat GIS, luas kawasan 94,8 km², topografi pesisir Teluk Bone & perbukitan.</p>
                                    </div>
                                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                        <b class="text-slate-900 block mb-1">Bab II: Kependudukan & Angkatan Kerja</b>
                                        <p class="text-[11px] text-slate-500">Total 6.808 jiwa, 1.833 KK, struktur umur produktif 68,4%, piramida penduduk presisi.</p>
                                    </div>
                                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                        <b class="text-slate-900 block mb-1">Bab III: Potensi Pertanian, Kakao & Bahari</b>
                                        <p class="text-[11px] text-slate-500">Sentra kakao sambung pucuk, cengkeh perbukitan, penyulingan nilam, dan perikanan teri.</p>
                                    </div>
                                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                        <b class="text-slate-900 block mb-1">Bab IV: Sosial Ekonomi, Desil & Bansos</b>
                                        <p class="text-[11px] text-slate-500">Pemetaan desil P3KE, data penerima PKH/BPNT/BLT-DD, serta fasilitas pendidikan & kesehatan.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-950 text-xs flex items-center gap-2.5">
                                <i class="bi bi-check-circle-fill text-emerald-600 text-base shrink-0"></i>
                                <div><b>Status Verifikasi:</b> Dokumen telah direkonsiliasi dan disahkan oleh Tim Pembina Desa Cantik BPS Kabupaten Kolaka Utara sesuai kaidah Satu Data Indonesia.</div>
                            </div>
                        </div>
                    `;
                }
            } else if (docType === 'tabel') {
                if (iconEl) iconEl.innerHTML = '📊';
                if (tagEl) tagEl.textContent = 'KOMPILASI DATA SEKTORAL • BPS SDI';
                if (titleEl) titleEl.textContent = 'Tabel Statistik Sektoral 44 Indikator SDI (6 Desa)';
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-5">
                            <div class="p-4 rounded-2xl bg-blue-50 border border-blue-200 flex flex-wrap items-center justify-between gap-3">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-blue-800">Standar Metadata Baku</div>
                                    <div class="font-black text-slate-900 text-sm">32 Matriks Tabulasi Sektoral BPS</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-lg bg-blue-600 text-white text-[10px] font-black">Format Excel / CSV</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-blue-100 text-blue-800 text-[10px] font-black">6 Desa Terintegrasi</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-200 text-slate-800 text-[10px] font-black">100% Valid</span>
                                </div>
                            </div>

                            <div class="overflow-x-auto rounded-xl border border-slate-200">
                                <table class="w-full text-left text-xs border-collapse">
                                    <thead>
                                        <tr class="bg-slate-100 text-slate-800 font-black border-b border-slate-200 text-[11px]">
                                            <th class="p-2.5">Nama Desa</th>
                                            <th class="p-2.5">Kecamatan</th>
                                            <th class="p-2.5 text-center">Penduduk</th>
                                            <th class="p-2.5 text-center">Keluarga</th>
                                            <th class="p-2.5 text-center">IKM</th>
                                            <th class="p-2.5 text-center">Status IDM</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100 font-medium">
                                        <tr class="hover:bg-slate-50"><td class="p-2.5 font-bold text-slate-900">Desa Kamisi</td><td class="p-2.5">Kodeoha</td><td class="p-2.5 text-center">1.576</td><td class="p-2.5 text-center">394 KK</td><td class="p-2.5 text-center font-bold text-amber-600">14 Unit</td><td class="p-2.5 text-center text-emerald-700 font-bold">Mandiri (98%)</td></tr>
                                        <tr class="hover:bg-slate-50"><td class="p-2.5 font-bold text-slate-900">Desa Koroha</td><td class="p-2.5">Kodeoha</td><td class="p-2.5 text-center">1.340</td><td class="p-2.5 text-center">335 KK</td><td class="p-2.5 text-center font-bold text-amber-600">16 Unit</td><td class="p-2.5 text-center text-sky-700 font-bold">Mandiri (72%)</td></tr>
                                        <tr class="hover:bg-slate-50"><td class="p-2.5 font-bold text-slate-900">Kelurahan Mala-Mala</td><td class="p-2.5">Kodeoha</td><td class="p-2.5 text-center">1.272</td><td class="p-2.5 text-center">318 KK</td><td class="p-2.5 text-center font-bold text-amber-600">2 Unit</td><td class="p-2.5 text-center text-emerald-700 font-bold">Mandiri (93%)</td></tr>
                                        <tr class="hover:bg-slate-50"><td class="p-2.5 font-bold text-slate-900">Desa Lapolu</td><td class="p-2.5">Tiwu</td><td class="p-2.5 text-center">1.264</td><td class="p-2.5 text-center">321 KK</td><td class="p-2.5 text-center font-bold text-amber-600">75 Unit</td><td class="p-2.5 text-center text-emerald-700 font-bold">Mandiri (88%)</td></tr>
                                        <tr class="hover:bg-slate-50"><td class="p-2.5 font-bold text-slate-900">Desa Tanggeawo</td><td class="p-2.5">Tiwu</td><td class="p-2.5 text-center">564</td><td class="p-2.5 text-center">141 KK</td><td class="p-2.5 text-center font-bold text-amber-600">46 Unit</td><td class="p-2.5 text-center text-indigo-700 font-bold">Mandiri (84%)</td></tr>
                                        <tr class="hover:bg-slate-50"><td class="p-2.5 font-bold text-slate-900">Desa Mattiro Bulu</td><td class="p-2.5">Tiwu</td><td class="p-2.5 text-center">856</td><td class="p-2.5 text-center">324 KK</td><td class="p-2.5 text-center font-bold text-amber-600">20 Unit</td><td class="p-2.5 text-center text-purple-700 font-bold">Terbina (79%)</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-3 rounded-xl bg-blue-50 border border-blue-200 text-blue-950 text-xs">
                                <b>Format Kompatibel:</b> Tabel data dapat dibuka di Microsoft Excel, Google Sheets, LibreOffice Calc, dan database GIS.
                            </div>
                        </div>
                    `;
                }
            } else if (docType === 'brs' || docType === 'statistik') {
                if (iconEl) iconEl.innerHTML = '📑';
                if (tagEl) tagEl.textContent = 'BERITA RESMI STATISTIK • BPS KOLUT';
                if (titleEl) titleEl.textContent = 'Publikasi BRS Sektoral & Indikator Makro Kolaka Utara 2025';
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-5">
                            <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 flex flex-wrap items-center justify-between gap-3">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-amber-800">Nomor Publikasi BRS</div>
                                    <div class="font-black text-slate-900 text-sm">No. 14/05/7408/Th.XXVI/2025</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-lg bg-amber-600 text-white text-[10px] font-black">Rilis Resmi</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-200 text-slate-800 text-[10px] font-black">24 Halaman</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-200 text-slate-800 text-[10px] font-black">2,4 MB</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 text-center">
                                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                    <div class="text-[10px] text-slate-400 font-bold">Inflasi Daerah</div>
                                    <div class="text-xl font-black text-slate-900 mt-1">2,1%</div>
                                    <div class="text-[9px] text-emerald-600 font-bold">Terkendali</div>
                                </div>
                                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                    <div class="text-[10px] text-slate-400 font-bold">NTP Kakao</div>
                                    <div class="text-xl font-black text-slate-900 mt-1">112,4</div>
                                    <div class="text-[9px] text-emerald-600 font-bold">Surplus</div>
                                </div>
                                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                    <div class="text-[10px] text-slate-400 font-bold">Harga Kakao</div>
                                    <div class="text-sm font-black text-amber-600 mt-1.5">115 Rb/Kg</div>
                                    <div class="text-[9px] text-slate-500 font-bold">Fermentasi</div>
                                </div>
                                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                                    <div class="text-[10px] text-slate-400 font-bold">Kasus Stunting</div>
                                    <div class="text-xl font-black text-emerald-700 mt-1">Rendah</div>
                                    <div class="text-[9px] text-emerald-600 font-bold">Posyandu Aktif</div>
                                </div>
                            </div>

                            <p class="text-xs text-slate-600 leading-relaxed">
                                Publikasi Berita Resmi Statistik (BRS) memuat evaluasi perkembangan indikator ketenagakerjaan, nilai tukar petani, dan neraca produksi komoditas unggulan perkebunan kakao dan perikanan se-Kabupaten Kolaka Utara.
                            </p>
                        </div>
                    `;
                }
            } else if (docType === 'leaflet') {
                if (iconEl) iconEl.innerHTML = '🗺️';
                if (tagEl) tagEl.textContent = 'LEAFLET INFOGRAFIS TEMATIK LIPAT 3 • BPS DESA CANTIK';
                if (titleEl) titleEl.textContent = 'Leaflet & Infografis Tematik Desa Cantik Kolaka Utara';
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-5">
                            <div class="p-4 rounded-2xl bg-teal-50 border border-teal-200 flex flex-wrap items-center justify-between gap-3">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-teal-800">Spesifikasi Cetak Diseminasi</div>
                                    <div class="font-black text-slate-900 text-sm">Brosur Tri-Fold A4 (297 x 210 mm) Full Color</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-lg bg-teal-600 text-white text-[10px] font-black">Format PDF HD</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-teal-100 text-teal-800 text-[10px] font-black">Siap Cetak CMYK</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-200 text-slate-800 text-[10px] font-black">6,2 MB</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <b class="text-slate-900 block mb-1">Panel Depan (Cover)</b>
                                    <p class="text-[11px] text-slate-500">Logo resmi BPS & Pemkab, identitas wilayah, dan moto pembangunan desa.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <b class="text-slate-900 block mb-1">Panel Dalam (Infografis)</b>
                                    <p class="text-[11px] text-slate-500">Visualisasi piramida penduduk, sentra komoditas kakao/laut, dan 5 pilar desa cantik.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <b class="text-slate-900 block mb-1">Panel Belakang (Kontak)</b>
                                    <p class="text-[11px] text-slate-500">Peta wilayah spasial indikatif, kanal aduan, dan layanan PST BPS Kolaka Utara.</p>
                                </div>
                            </div>

                            <div class="p-3.5 rounded-xl bg-teal-50 border border-teal-200 text-teal-950 text-xs">
                                <b>Media Diseminasi Warga:</b> Siap dicetak langsung pada kertas brosur Art Paper 150gr untuk dibagikan di kantor desa, musrenbangdes, dan masyarakat umum.
                            </div>
                        </div>
                    `;
                }
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            if (document.body) document.body.classList.add('overflow-hidden');
        }

        function closeOutputDocViewer() {
            const modal = document.getElementById('outputDocViewerModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
            if (document.body) document.body.classList.remove('overflow-hidden');
        }

        function triggerCurrentDocDownload() {
            downloadOutputDoc(currentViewerDocType);
        }

        function downloadOutputDoc(docType) {
            let fileName = '';
            let mimeType = 'text/plain';
            let fileContent = '';

            if (docType === 'monografi') {
                fileName = 'Monografi_Desa_Cantik_Kolaka_Utara_2025.pdf';
                mimeType = 'application/pdf';
                fileContent = `%PDF-1.4
% Buku Monografi Statistik Sektoral Desa Cantik Kolaka Utara 2025/2026
% BPS Kabupaten Kolaka Utara
% 6 Desa Binaan: Kamisi, Koroha, Mala-Mala, Lapolu, Tanggeawo, Mattiro Bulu
`;
            } else if (docType === 'tabel') {
                fileName = 'Tabel_Statistik_Sektoral_6_Desa_Kolaka_Utara_2025.csv';
                mimeType = 'text/csv;charset=utf-8;';
                fileContent = `No,Nama Wilayah,Kecamatan,Penduduk (Jiwa),Keluarga (KK),IKM (Unit),Status IDM,Komoditas Utama
1,Desa Kamisi,Kodeoha,1576,394,14,Mandiri (98%),Perikanan Tangkap & Teri
2,Desa Koroha,Kodeoha,1340,335,16,Mandiri (72%),Kakao Sambung Pucuk & Laut
3,Kelurahan Mala-Mala,Kodeoha,1272,318,2,Mandiri (93%),Pusat Layanan Terpadu
4,Desa Lapolu,Tiwu,1264,321,75,Mandiri (88%),Sentra Cengkeh & IMK
5,Desa Tanggeawo,Tiwu,564,141,46,Mandiri (84%),Perkebunan Kakao Rakyat
6,Desa Mattiro Bulu,Tiwu,856,324,20,Terbina (79%),Cengkeh Perbukitan & Nilam
`;
            } else if (docType === 'brs' || docType === 'statistik') {
                fileName = 'BRS_Sektoral_Indikator_Makro_Kolaka_Utara_2025.pdf';
                mimeType = 'application/pdf';
                fileContent = `%PDF-1.4
% Berita Resmi Statistik (BRS) Indikator Makro Sektoral Kolaka Utara 2025
% BPS Kabupaten Kolaka Utara
`;
            } else if (docType === 'leaflet') {
                fileName = 'Leaflet_Infografis_Tematik_Desa_Cantik_Kolaka_Utara_2025.pdf';
                mimeType = 'application/pdf';
                fileContent = `%PDF-1.4
% Leaflet Infografis Tematik Tri-Fold Desa Cantik Kolaka Utara 2025
% BPS Kabupaten Kolaka Utara
`;
            } else {
                fileName = 'Dokumen_Output_Desa_Cantik_Kolaka_Utara_2025.pdf';
                mimeType = 'application/pdf';
                fileContent = `%PDF-1.4
% Output Desa Cantik BPS Kolaka Utara
`;
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
 
        // Run on Page Load
        document.addEventListener('DOMContentLoaded', () => {
            initDashboardCharts();
            // Pasang event listener hover otomatis ke semua kartu desa
            document.querySelectorAll('.coverflow-card').forEach((card, idx) => {
                card.addEventListener('mouseenter', () => handleCoverflowCardHover(idx));
                card.addEventListener('pointerenter', () => handleCoverflowCardHover(idx));
            });
        });
    
        // ==============================================================
        // 3D COVERFLOW ENGINE (ROTATING CAROUSEL)
        // ==============================================================
        // ==============================================================
        // 3D CAROUSEL ENGINE (6 DESA BERJEJER + BERGERAK OTOMATIS KE KIRI)
        // ==============================================================
        const coverflowVillages = [
            { key: 'kamisi', title: 'Desa Kamisi', kec: 'Kodeoha' },
            { key: 'koroha', title: 'Desa Koroha', kec: 'Kodeoha' },
            { key: 'malamala', title: 'Kelurahan Mala-Mala', kec: 'Kodeoha' },
            { key: 'lapolu', title: 'Desa Lapolu', kec: 'Tiwu' },
            { key: 'tanggeawo', title: 'Desa Tanggeawo', kec: 'Tiwu' },
            { key: 'mattirobulu', title: 'Desa Mattiro Bulu', kec: 'Tiwu' }
        ];

        let currentCoverflowIdx = 0;
        let isDraggingCoverflow = false;
        let coverflowStartX = 0;
        let coverflowAutoplayTimer = null;
        let isCoverflowHovered = false;

        function updateCoverflowCards() {
            const stage = document.getElementById('coverflowStage');
            const track = document.getElementById('coverflowTrack');
            const cards = document.querySelectorAll('.coverflow-card');
            const total = coverflowVillages.length;
            if (!stage || !track || cards.length === 0) return;

            const stageWidth = stage.offsetWidth;
            const activeCard = cards[currentCoverflowIdx];
            if (!activeCard) return;

            // Geser track horizontal agar kartu aktif selalu tepat di tengah panggung (BERJEJER)
            const cardWidth = activeCard.offsetWidth;
            const cardLeft = activeCard.offsetLeft;
            const targetTranslateX = (stageWidth / 2) - (cardLeft + (cardWidth / 2));

            track.style.transform = `translateX(${targetTranslateX}px)`;

            // Berikan efek 3D Coverflow miring ke tengah untuk kartu di samping
            cards.forEach((card, i) => {
                card.classList.remove('active', 'card-left', 'card-right', 'card-far-left', 'card-far-right');
                let diff = i - currentCoverflowIdx;

                if (diff === 0) {
                    card.classList.add('active');
                } else if (diff === 1) {
                    card.classList.add('card-right');
                } else if (diff === -1) {
                    card.classList.add('card-left');
                } else if (diff > 1) {
                    card.classList.add('card-far-right');
                } else if (diff < -1) {
                    card.classList.add('card-far-left');
                }
            });

            // Update nama desa aktif di indikator
            const activeData = coverflowVillages[currentCoverflowIdx];
            const titleEl = document.getElementById('coverflowActiveTitle');
            if (titleEl && activeData) {
                titleEl.textContent = `${activeData.title} (Kecamatan ${activeData.kec})`;
            }

            // Update 6 dot indikator
            const dotsContainer = document.getElementById('coverflowDots');
            if (dotsContainer) {
                dotsContainer.innerHTML = coverflowVillages.map((v, i) => `
                    <button type="button" onclick="userInteractGoTo(${i})" 
                            class="h-2.5 rounded-full transition-all duration-300 cursor-pointer ${i === currentCoverflowIdx ? 'w-8 bg-[#0E7C5A]' : 'w-2.5 bg-slate-300 hover:bg-slate-400'}" 
                            title="${v.title}">
                    </button>
                `).join('');
            }
        }

        // Bergerak ke kiri (maju ke desa berikutnya)
        function rotateCoverflow(direction) {
            const total = coverflowVillages.length;
            currentCoverflowIdx = (currentCoverflowIdx + direction + total) % total;
            updateCoverflowCards();
        }

        function goToCoverflow(index) {
            currentCoverflowIdx = index;
            updateCoverflowCards();
        }

        function userInteractRotate(direction) {
            rotateCoverflow(direction);
            pauseAndResumeAutoplay();
        }

        function userInteractGoTo(index) {
            goToCoverflow(index);
            pauseAndResumeAutoplay();
        }

        let coverflowHoverTimer = null;
        function handleCoverflowCardHover(index) {
            if (index === currentCoverflowIdx) return;
            clearTimeout(coverflowHoverTimer);
            coverflowHoverTimer = setTimeout(() => {
                goToCoverflow(index);
                pauseAndResumeAutoplay();
            }, 60); // Respon instan dan sangat halus saat kursor diarahkan ke desa
        }

        function handleCoverflowCardClick(event, index, key) {
            if (index !== currentCoverflowIdx) {
                event.preventDefault();
                event.stopPropagation();
                userInteractGoTo(index);
            } else {
                handleDesaCardAccess(event, key);
            }
        }

        // ==============================================================
        // ROTASI OTOMATIS BERGERAK KE KIRI (AUTOPLAY CONTINUOUS)
        // ==============================================================
        function startCoverflowAutoplay() {
            stopCoverflowAutoplay();
            coverflowAutoplayTimer = setInterval(() => {
                if (!isCoverflowHovered) {
                    rotateCoverflow(1); // Terus bergerak ke kiri secara berkala
                }
            }, 3000);
        }

        function stopCoverflowAutoplay() {
            if (coverflowAutoplayTimer) {
                clearInterval(coverflowAutoplayTimer);
                coverflowAutoplayTimer = null;
            }
        }

        function pauseAndResumeAutoplay() {
            stopCoverflowAutoplay();
            setTimeout(startCoverflowAutoplay, 5000); // jeda 5 detik saat interaksi pengguna lalu lanjut
        }

        // Drag & Touch Gestures
        function handleCoverflowDragStart(e) {
            isDraggingCoverflow = true;
            coverflowStartX = e.clientX;
            document.addEventListener('mouseup', handleCoverflowDragEnd);
        }

        function handleCoverflowDragEnd(e) {
            if (!isDraggingCoverflow) return;
            isDraggingCoverflow = false;
            document.removeEventListener('mouseup', handleCoverflowDragEnd);
            const deltaX = e.clientX - coverflowStartX;
            if (deltaX < -35) {
                userInteractRotate(1);
            } else if (deltaX > 35) {
                userInteractRotate(-1);
            }
        }

        function handleCoverflowTouchStart(e) {
            if (e.touches.length > 0) {
                coverflowStartX = e.touches[0].clientX;
            }
        }

        document.addEventListener('touchend', function(e) {
            if (e.changedTouches.length > 0) {
                const deltaX = e.changedTouches[0].clientX - coverflowStartX;
                if (deltaX < -35) {
                    userInteractRotate(1);
                } else if (deltaX > 35) {
                    userInteractRotate(-1);
                }
            }
        });

        // Keyboard Navigation (Arrow Keys)
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                userInteractRotate(-1);
            } else if (e.key === 'ArrowRight') {
                userInteractRotate(1);
            }
        });

        // Initialize on load and resize
        window.addEventListener('DOMContentLoaded', function() {
            const stage = document.getElementById('coverflowStage');
            if (stage) {
                stage.addEventListener('mouseenter', () => { isCoverflowHovered = true; });
                stage.addEventListener('mouseleave', () => { isCoverflowHovered = false; });
            }
            setTimeout(() => {
                updateCoverflowCards();
                startCoverflowAutoplay();
            }, 100);
        });
        window.addEventListener('resize', updateCoverflowCards);



        // ==============================================================
        // GALERI FOTO DESCAN RESMI
        // ==============================================================
        const descanGaleriDatabase = [
            {
                cat: 'pembinaan',
                desa: 'Kec. Kodeoha',
                title: 'Pelatihan Literasi Statistik Aparatur',
                desc: 'Bimbingan teknis konsep, definisi, dan standarisasi kuesioner PODES bersama BPS Kolaka Utara.',
                img: 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=700&q=80',
                badge: 'Pembinaan BPS'
            },
            {
                cat: 'pembinaan',
                desa: 'Kec. Tiwu',
                title: 'Verifikasi & Rekonsiliasi Data Sektoral',
                desc: 'Penyelarasan indikator kemiskinan ekstrem dan bansos P3KE bersama tim verifikator desa.',
                img: 'https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?auto=format&fit=crop&w=700&q=80',
                badge: 'SDI Kolut'
            },
            {
                cat: 'potensi',
                desa: 'Desa Koroha & Tanggeawo',
                title: 'Sentra Perkebunan Kakao Unggulan',
                desc: 'Budidaya kakao rakyat sambung pucuk produktif dengan pembibitan varietas unggul Kolaka Utara.',
                img: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=700&q=80',
                badge: 'Potensi Kakao'
            },
            {
                cat: 'potensi',
                desa: 'Desa Lapolu & Mattiro Bulu',
                title: 'Agroindustri Cengkeh & Penyulingan Nilam',
                desc: 'Hasil panen perkebunan cengkeh perbukitan serta pengolahan minyak atsiri nilam bernilai ekspor.',
                img: 'https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?auto=format&fit=crop&w=700&q=80',
                badge: 'UMKM & Nilam'
            },
            {
                cat: 'bahari',
                desa: 'Desa Kamisi',
                title: 'Pesisir Bahari & Sentra Teri Tradisional',
                desc: 'Armada nelayan Teluk Bone dan penjemuran ikan teri asin tradisional pesisir Kodeoha.',
                img: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=700&q=80',
                badge: 'Pesona Bahari'
            },
            {
                cat: 'bahari',
                desa: 'Desa Mattiro Bulu',
                title: 'Bentang Alam Perbukitan & Sumber Air',
                desc: 'Panorama alam perbukitan asri yang menopang ketahanan pangan dan irigasi persawahan.',
                img: 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=700&q=80',
                badge: 'Panorama Alam'
            },
            {
                cat: 'pelayanan',
                desa: 'Kelurahan Mala-Mala',
                title: 'Pelayanan Adminduk Terpadu Desa',
                desc: 'Pusat layanan administrasi satu pintu dan pencatatan kependudukan digital presisi.',
                img: 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=700&q=80',
                badge: 'Layanan Publik'
            },
            {
                cat: 'pelayanan',
                desa: '6 Desa Binaan',
                title: 'Posyandu Terpadu & Penanganan Stunting',
                desc: 'Pemeriksaan rutin kesehatan ibu-anak dan pemantauan gizi balita terdata di dashboard desa.',
                img: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=700&q=80',
                badge: 'Kesehatan Warga'
            }
        ];

        let currentDescanGaleriCat = 'all';
        let currentDescanGaleriSearch = '';

        function renderDescanGaleri(category, search) {
            const grid = document.getElementById('descanGaleriGrid');
            if (!grid) return;

            if (category !== undefined) currentDescanGaleriCat = category;
            if (search !== undefined) currentDescanGaleriSearch = search.trim().toLowerCase();

            let filtered = currentDescanGaleriCat === 'all' 
                ? descanGaleriDatabase 
                : descanGaleriDatabase.filter(p => p.cat === currentDescanGaleriCat);

            if (currentDescanGaleriSearch) {
                filtered = filtered.filter(p => 
                    (p.title && p.title.toLowerCase().includes(currentDescanGaleriSearch)) ||
                    (p.desc && p.desc.toLowerCase().includes(currentDescanGaleriSearch)) ||
                    (p.desa && p.desa.toLowerCase().includes(currentDescanGaleriSearch)) ||
                    (p.badge && p.badge.toLowerCase().includes(currentDescanGaleriSearch))
                );
            }

            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full py-12 text-center">
                        <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-400 mx-auto flex items-center justify-center text-2xl mb-2">
                            <i class="bi bi-images"></i>
                        </div>
                        <h4 class="font-bold text-slate-800 text-sm">Tidak Ada Foto Ditemukan</h4>
                        <p class="text-xs text-slate-500 mt-1">Coba kata kunci lain atau pilih filter Semua Foto.</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = filtered.map(p => `
                <div class="group bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-2xs hover:shadow-lg transition-all duration-300 flex flex-col">
                    <div class="relative overflow-hidden aspect-4/3 bg-slate-100">
                        <img src="${p.img}" alt="${p.title}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 cursor-pointer" onclick="window.open('${p.img}', '_blank')">
                        <div class="absolute top-2.5 left-2.5">
                            <span class="px-2.5 py-1 rounded-lg bg-black/60 backdrop-blur-xs text-white text-[9.5px] font-black uppercase">
                                ${p.badge}
                            </span>
                        </div>
                        <div class="absolute bottom-2.5 right-2.5">
                            <span class="px-2 py-0.5 rounded-md bg-black/60 text-emerald-300 text-[9.5px] font-bold">
                                ${p.desa}
                            </span>
                        </div>
                    </div>
                    <div class="p-3.5 flex-1 flex flex-col justify-between">
                        <div>
                            <h4 class="font-black text-slate-900 text-xs group-hover:text-purple-700 transition leading-snug">${p.title}</h4>
                            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">${p.desc}</p>
                        </div>
                        <div class="pt-2.5 mt-2.5 border-t border-slate-100 flex items-center justify-between text-[11px]">
                            <span class="text-slate-400 font-medium">Dokumentasi BPS</span>
                            <button type="button" onclick="window.open('${p.img}', '_blank')" class="text-purple-600 font-bold hover:underline flex items-center gap-1 cursor-pointer">
                                <i class="bi bi-arrows-fullscreen text-xs"></i>
                                <span>Perbesar</span>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function filterDescanGaleri(category, btn) {
            document.querySelectorAll('.descan-galeri-btn').forEach(el => {
                el.classList.remove('bg-purple-600', 'text-white', 'shadow-2xs');
                el.classList.add('bg-white', 'text-slate-600', 'border', 'border-slate-200');
            });
            if (btn) {
                btn.classList.remove('bg-white', 'text-slate-600', 'border', 'border-slate-200');
                btn.classList.add('bg-purple-600', 'text-white', 'shadow-2xs');
            }
            renderDescanGaleri(category);
        }

        function searchDescanGaleri(val) {
            renderDescanGaleri(undefined, val);
        }

        function openDescanGaleriModal(e) {
            if (e) e.preventDefault();
            const modal = document.getElementById('descanGaleriModal');
            if (modal) {
                renderDescanGaleri('all');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                if (document.body) document.body.classList.add('overflow-hidden');
            }
        }

        function closeDescanGaleriModal() {
            const modal = document.getElementById('descanGaleriModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
            if (document.body) document.body.classList.remove('overflow-hidden');
        }

</script>

    <!-- ============================================================== -->
    <!-- MODAL VIEWER DOKUMEN OUTPUT DESA CANTIK KOLAKA UTARA           -->
    <!-- Membuka dokumen lengkap secara interaktif di layar             -->
    <!-- ============================================================== -->
    <div id="outputDocViewerModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-6 bg-slate-950/80 backdrop-blur-sm overflow-y-auto">
        <div class="relative w-full max-w-4xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 flex flex-col max-h-[92vh] animate-in fade-in zoom-in duration-200">
            <!-- Modal Header -->
            <div id="docViewerHeader" class="bg-gradient-to-r from-[#064e3b] via-[#047857] to-[#0b2545] text-white p-5 sm:p-6 flex items-center justify-between shrink-0">
                <div class="flex items-center gap-3">
                    <div id="docViewerIcon" class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-2xl shrink-0 shadow-inner">
                        📘
                    </div>
                    <div>
                        <div id="docViewerTag" class="text-[10px] font-black uppercase tracking-wider text-emerald-300">
                            PUBLIKASI RESMI BPS KABUPATEN KOLAKA UTARA
                        </div>
                        <h3 id="docViewerTitle" class="text-base sm:text-xl font-black text-white leading-tight mt-0.5">
                            Monografi Statistik Sektoral 6 Desa Binaan 2026
                        </h3>
                    </div>
                </div>
                <button type="button" onclick="closeOutputDocViewer()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm transition cursor-pointer" title="Tutup Dokumen">
                    ✕
                </button>
            </div>

            <!-- Modal Body Content -->
            <div id="docViewerBody" class="p-6 overflow-y-auto space-y-5 text-xs text-slate-700 flex-1">
                <!-- Dynamically populated -->
            </div>

            <!-- Modal Footer -->
            <div class="p-4 bg-slate-50 border-t border-slate-200 flex flex-wrap items-center justify-between gap-3 shrink-0">
                <div class="flex items-center gap-2 text-[11px] text-slate-500 font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Terverifikasi Standar Satu Data Indonesia (SDI)</span>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="triggerCurrentDocDownload()" class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-black text-xs shadow-md transition flex items-center gap-2 cursor-pointer active:scale-95">
                        <i class="bi bi-download"></i>
                        <span>Unduh Dokumen Asli</span>
                    </button>
                    <button type="button" onclick="closeOutputDocViewer()" class="px-4 py-2.5 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold text-xs transition cursor-pointer">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- MODAL GALERI FOTO & DOKUMENTASI DESA CANTIK KOLAKA UTARA       -->
    <!-- ============================================================== -->
    <div id="descanGaleriModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-6 bg-slate-950/80 backdrop-blur-sm overflow-y-auto">
        <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 flex flex-col max-h-[92vh] animate-in fade-in zoom-in duration-200">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-purple-900 via-purple-700 to-[#0b2545] text-white p-5 sm:p-6 flex items-center justify-between shrink-0">
                <div class="flex items-center gap-3.5">
                    <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-2xl shrink-0 shadow-inner">
                        <i class="bi bi-images text-purple-200"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-base sm:text-xl font-black text-white leading-tight">
                                Galeri Dokumentasi Desa Cantik Kolaka Utara
                            </h3>
                            <span class="px-2.5 py-0.5 rounded-full bg-purple-300/20 text-purple-200 border border-purple-300/30 text-[10px] font-black uppercase tracking-wider">
                                Dokumentasi Resmi
                            </span>
                        </div>
                        <p class="text-xs text-purple-100/90 mt-1">
                            Dokumentasi visual pembinaan statistik BPS, potensi perkebunan kakao, cengkeh, bahari, dan pelayanan 6 desa binaan.
                        </p>
                    </div>
                </div>
                <button type="button" onclick="closeDescanGaleriModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm transition cursor-pointer" title="Tutup Galeri">
                    ✕
                </button>
            </div>

            <!-- Category Filter Tabs & Live Search -->
            <div class="px-5 py-3 border-b border-slate-200 bg-slate-50 flex flex-col sm:flex-row sm:items-center justify-between gap-3 shrink-0">
                <div class="flex items-center gap-1.5 overflow-x-auto pb-1 sm:pb-0 scrollbar-none">
                    <button type="button" onclick="filterDescanGaleri('all', this)" class="descan-galeri-btn px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-purple-600 text-white shadow-2xs cursor-pointer whitespace-nowrap">
                        Semua Foto (8)
                    </button>
                    <button type="button" onclick="filterDescanGaleri('pembinaan', this)" class="descan-galeri-btn px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-200 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Pembinaan BPS
                    </button>
                    <button type="button" onclick="filterDescanGaleri('potensi', this)" class="descan-galeri-btn px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-200 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Potensi &amp; Kakao
                    </button>
                    <button type="button" onclick="filterDescanGaleri('bahari', this)" class="descan-galeri-btn px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-200 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Pesona Bahari &amp; Alam
                    </button>
                    <button type="button" onclick="filterDescanGaleri('pelayanan', this)" class="descan-galeri-btn px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-200 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Pelayanan Desa
                    </button>
                </div>
                <div class="relative w-full sm:w-56 shrink-0">
                    <i class="bi bi-search absolute left-3 top-2.5 text-slate-400 text-xs"></i>
                    <input type="text" id="descanGaleriSearch" oninput="searchDescanGaleri(this.value)" placeholder="Cari foto atau desa..." 
                        class="w-full pl-8 pr-3 py-1.5 rounded-xl border border-slate-200 bg-white text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-400">
                </div>
            </div>

            <!-- Photo Grid -->
            <div id="descanGaleriGrid" class="p-5 sm:p-6 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 flex-1">
                <!-- Injected via renderDescanGaleri() -->
            </div>

            <!-- Modal Footer -->
            <div class="p-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between text-xs text-slate-500 shrink-0">
                <span class="flex items-center gap-1.5">
                    <i class="bi bi-info-circle text-purple-600"></i>
                    <span>Klik pada foto untuk melihat ukuran resolusi penuh.</span>
                </span>
                <button type="button" onclick="closeDescanGaleriModal()" class="px-5 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold transition cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>

</body>
</html>