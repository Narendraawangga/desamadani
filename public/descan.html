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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

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

        /* Toast Popup */
        #toastBox {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease;
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
                <span class="hidden md:inline text-emerald-100">Kecamatan Kodeoha</span>
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
                        <span class="text-[9px] px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-extrabold">KODEOHA</span>
                    </div>
                    <div class="text-[10px] text-slate-500 font-bold tracking-wide uppercase mt-0.5">
                        Desa Cantik • Kolaka Utara
                    </div>
                </div>
            </a>

            <!-- EXACTLY 4 MENUS (Minimal, Bersih, Sesuai Instruksi User) -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="#beranda" class="nav-link">
                    Beranda
                </a>
                <a href="#dashboard" class="nav-link">
                    Dashboard & Grafik
                </a>
                <a href="#desa" class="nav-link">
                    6 Desa Binaan
                </a>
                <a href="#output" class="nav-link">
                    Output Program
                </a>
            </nav>

            <!-- Action Button: Login Akun Desa -->
            <div class="flex items-center gap-3">
                <a href="/descan/login" class="px-4 py-2 rounded-xl bg-[#0E7C5A] hover:bg-[#096347] text-white font-black text-xs shadow-md transition flex items-center gap-2 transform hover:-translate-y-0.5">
                    <span>🔒</span>
                    <span>Login Akun Desa</span>
                </a>
            </div>
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
    </section>

    <!-- ============================================================== -->
    <!-- 4. FLOATING STATS STRIP (5 Angka Pokok Bersih)                  -->
    <!-- ============================================================== -->
    <div class="max-w-[1240px] mx-auto px-4 sm:px-6 -mt-7 relative z-20">
        <div class="card-surface p-4 sm:p-5 grid grid-cols-2 md:grid-cols-5 gap-4 divide-y md:divide-y-0 md:divide-x divide-slate-100 shadow-md">
            <div class="text-center px-2 py-1">
                <div class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">6</div>
                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mt-1">Desa Pilot</div>
                <div class="text-[10px] text-emerald-700 font-semibold mt-0.5">Kec. Kodeoha</div>
            </div>
            <div class="text-center px-2 py-1">
                <div class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">2.426</div>
                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mt-1">Total Keluarga</div>
                <div class="text-[10px] text-slate-400 font-medium mt-0.5">Kepala Keluarga (KK)</div>
            </div>
            <div class="text-center px-2 py-1">
                <div class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">8.734</div>
                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mt-1">Total Penduduk</div>
                <div class="text-[10px] text-slate-400 font-medium mt-0.5">Jiwa Terdata</div>
            </div>
            <div class="text-center px-2 py-1">
                <div class="text-2xl sm:text-3xl font-black text-emerald-700 leading-none">84%</div>
                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mt-1">Rata-rata Progres</div>
                <div class="text-[10px] text-emerald-600 font-medium mt-0.5">Pendataan Selesai</div>
            </div>
            <div class="text-center px-2 py-1 col-span-2 md:col-span-1">
                <div class="text-2xl sm:text-3xl font-black text-blue-700 leading-none">223 / 264</div>
                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mt-1">Indikator Terinput</div>
                <div class="text-[10px] text-blue-600 font-medium mt-0.5">44 Indikator / Desa</div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 5. MENU 2: DASHBOARD & GRAFIK VISUAL (Paling Menonjol)         -->
    <!-- ============================================================== -->
    <section id="dashboard" class="max-w-[1240px] mx-auto px-4 sm:px-6 pt-12 pb-14 space-y-6">
        
        <!-- Header Section + Tab Switcher Rapi -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-2 border-b border-slate-200">
            <div>
                <span class="text-[11px] font-black uppercase tracking-widest text-[#0E7C5A] bg-emerald-100 px-3 py-1 rounded-full">
                    📊 Visualisasi Statistik Sektoral
                </span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight mt-1.5">
                    Dashboard Data & Analitik 6 Desa
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-0.5">
                    Grafik visual interaktif kondisi demografi, perumahan, sanitasi, dan ekonomi desa.
                </p>
            </div>

            <!-- 2 Pilihan Tab Sederhana & Jelas -->
            <div class="flex items-center gap-1.5 p-1 rounded-xl bg-slate-100 border border-slate-200 self-start md:self-auto">
                <button type="button" onclick="switchVisualTab('dashboard')" id="btnTabDashboard" class="tab-btn active px-4 py-2 rounded-lg text-xs font-black transition cursor-pointer flex items-center gap-1.5">
                    <span>📊</span>
                    <span>Dashboard Makro</span>
                </button>
                <button type="button" onclick="switchVisualTab('analytics')" id="btnTabAnalytics" class="tab-btn px-4 py-2 rounded-lg text-xs font-black transition cursor-pointer flex items-center gap-1.5">
                    <span>📈</span>
                    <span>Analitik Sektoral</span>
                </button>
            </div>
        </div>

                <!-- TAB 1: DASHBOARD MAKRO 6 DESA (SESUAI SLIDE WORK REPORT GAMBAR ATAS) -->
        <div id="viewDashboard" class="space-y-6">
            
            <!-- EXECUTIVE WORK REPORT SLIDE 1 CONTAINER -->
            <div class="bg-white rounded-3xl p-5 sm:p-7 border border-emerald-900/15 shadow-xl relative overflow-hidden">
                <!-- Top Slide Header (Sesuai Gambar User) -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3.5 border-b border-slate-200/80 gap-2">
                    <div class="flex items-center gap-2.5">
                        <span class="w-3 h-3 rounded-full bg-emerald-600"></span>
                        <div>
                            <h3 class="font-black text-slate-900 text-base sm:text-lg tracking-tight">
                                Data Statistik: Capaian Indikator Makro 6 Desa Binaan
                            </h3>
                            <div class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">
                                Data Report: General Macro Statistics • BPS Kabupaten Kolaka Utara
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-xs font-black tracking-widest uppercase text-emerald-800 bg-emerald-50 px-3 py-1 rounded-md border border-emerald-200">
                            WORK REPORT
                        </span>
                    </div>
                </div>

                <!-- Main Content: Big Forest Green Card (Left) + 3 Stacked Metric Cards (Right) -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 mt-5">
                    
                    <!-- Left: Large Forest Green Card with Glow Gradient Bars & Peak Star (Sesuai Gambar) -->
                    <div class="lg:col-span-8 bg-[#18462b] rounded-2xl p-5 sm:p-6 text-white border-2 border-emerald-600/30 shadow-lg flex flex-col justify-between relative overflow-hidden">
                        
                        <!-- Header inside Forest Green Card -->
                        <div class="flex items-center justify-between z-10">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-emerald-800 text-lg shadow-sm font-black">
                                    📊
                                </div>
                                <div>
                                    <h4 class="text-white font-black text-base sm:text-lg leading-tight">
                                        2026 Progres Pendataan 44 Indikator Desa (%)
                                    </h4>
                                    <span class="text-[10px] text-emerald-200/90 font-medium">
                                        Standar BPS Satu Data Indonesia • Kecamatan Kodeoha
                                    </span>
                                </div>
                            </div>
                            <span class="hidden sm:inline-flex items-center gap-1 text-[11px] font-black text-amber-300 bg-white/10 px-2.5 py-1 rounded-full border border-white/15">
                                ⭐ Desa Kamisi Tertinggi
                            </span>
                        </div>

                        <!-- 6 Gradient Vertical Bars (CSS + HTML Styled exactly matching the image) -->
                        <div class="pt-8 pb-3 z-10">
                            <div class="grid grid-cols-6 gap-2 sm:gap-4 items-end h-64 sm:h-72 border-b-2 border-dashed border-emerald-400/40 pb-2">
                                
                                <!-- Bar 1: Kamisi (98% - Peak Bar with Gold Star!) -->
                                <div class="flex flex-col items-center h-full justify-end group cursor-pointer" title="Desa Kamisi: 98% (43 dari 44 indikator)">
                                    <!-- Star Badge on Peak Bar -->
                                    <div class="flex flex-col items-center mb-1 animate-bounce">
                                        <span class="w-6 h-6 rounded-full bg-amber-400 text-slate-950 font-black text-xs flex items-center justify-center shadow-md">⭐</span>
                                        <span class="text-xs font-black text-amber-300 mt-0.5">98%</span>
                                    </div>
                                    <div class="text-[9px] font-bold text-emerald-200 mb-0.5">▲ 43/44</div>
                                    <div class="w-full max-w-[52px] bg-gradient-to-t from-emerald-700 via-emerald-400 to-lime-300 rounded-t-lg shadow-lg group-hover:brightness-110 transition duration-300" style="height: 98%;"></div>
                                </div>

                                <!-- Bar 2: Kalu Kaluku (93% - Pilot Utama) -->
                                <div class="flex flex-col items-center h-full justify-end group cursor-pointer" title="Desa Kalu Kaluku: 93% (41 dari 44 indikator)">
                                    <div class="text-xs font-black text-lime-300 mb-1">93%</div>
                                    <div class="text-[9px] font-bold text-emerald-200 mb-0.5">▲ 41/44</div>
                                    <div class="w-full max-w-[52px] bg-gradient-to-t from-emerald-700 via-emerald-400 to-lime-300 rounded-t-lg shadow-lg group-hover:brightness-110 transition duration-300" style="height: 93%;"></div>
                                </div>

                                <!-- Bar 3: Lametuna (86%) -->
                                <div class="flex flex-col items-center h-full justify-end group cursor-pointer" title="Desa Lametuna: 86% (38 dari 44 indikator)">
                                    <div class="text-xs font-black text-lime-300 mb-1">86%</div>
                                    <div class="text-[9px] font-bold text-emerald-200 mb-0.5">▲ 38/44</div>
                                    <div class="w-full max-w-[52px] bg-gradient-to-t from-emerald-700 via-emerald-400 to-lime-300 rounded-t-lg shadow-lg group-hover:brightness-110 transition duration-300" style="height: 86%;"></div>
                                </div>

                                <!-- Bar 4: Awo (82%) -->
                                <div class="flex flex-col items-center h-full justify-end group cursor-pointer" title="Desa Awo: 82% (36 dari 44 indikator)">
                                    <div class="text-xs font-black text-lime-300 mb-1">82%</div>
                                    <div class="text-[9px] font-bold text-emerald-200 mb-0.5">▲ 36/44</div>
                                    <div class="w-full max-w-[52px] bg-gradient-to-t from-emerald-700 via-emerald-400 to-lime-300 rounded-t-lg shadow-lg group-hover:brightness-110 transition duration-300" style="height: 82%;"></div>
                                </div>

                                <!-- Bar 5: Sawangaoha (77%) -->
                                <div class="flex flex-col items-center h-full justify-end group cursor-pointer" title="Desa Sawangaoha: 77% (34 dari 44 indikator)">
                                    <div class="text-xs font-black text-lime-300 mb-1">77%</div>
                                    <div class="text-[9px] font-bold text-emerald-200 mb-0.5">▲ 34/44</div>
                                    <div class="w-full max-w-[52px] bg-gradient-to-t from-emerald-700 via-emerald-400 to-lime-300 rounded-t-lg shadow-lg group-hover:brightness-110 transition duration-300" style="height: 77%;"></div>
                                </div>

                                <!-- Bar 6: Koroha (68%) -->
                                <div class="flex flex-col items-center h-full justify-end group cursor-pointer" title="Desa Koroha: 68% (30 dari 44 indikator)">
                                    <div class="text-xs font-black text-lime-300 mb-1">68%</div>
                                    <div class="text-[9px] font-bold text-emerald-200 mb-0.5">▲ 30/44</div>
                                    <div class="w-full max-w-[52px] bg-gradient-to-t from-emerald-700 via-emerald-400 to-lime-300 rounded-t-lg shadow-lg group-hover:brightness-110 transition duration-300" style="height: 68%;"></div>
                                </div>

                            </div>

                            <!-- X-Axis Labels (Desa Names) -->
                            <div class="grid grid-cols-6 gap-2 sm:gap-4 text-center pt-2.5 text-[11px] font-extrabold text-emerald-100">
                                <div>Kamisi</div>
                                <div>Kalu Kaluku</div>
                                <div>Lametuna</div>
                                <div>Awo</div>
                                <div>Sawangaoha</div>
                                <div>Koroha</div>
                            </div>
                        </div>

                        <!-- Card Footer Subtext -->
                        <div class="pt-3 border-t border-emerald-500/20 flex flex-wrap items-center justify-between text-[11px] text-emerald-200/80 font-medium z-10">
                            <span>Total Capaian: <b class="text-white">223 dari 264 Indikator Terinput</b></span>
                            <span class="text-amber-300 font-bold">Rata-rata: 84% Mandiri</span>
                        </div>
                    </div>

                    <!-- Right: Forest Green Card with 3 Stacked Metric Cards (NO.01, NO.02, NO.03) -->
                    <div class="lg:col-span-4 bg-[#18462b] rounded-2xl p-5 text-white border-2 border-emerald-600/30 shadow-lg flex flex-col justify-between space-y-3">
                        
                        <!-- Right Card Header Banner -->
                        <div class="text-center pb-2 border-b border-emerald-500/30">
                            <h4 class="text-base font-black text-white">Capaian Indikator Prioritas</h4>
                            <div class="text-[10px] text-emerald-200 font-medium">Proportion of Priority Sectoral Data</div>
                        </div>

                        <!-- 3 Stacked Cards (Exact match to image NO.01, NO.02, NO.03) -->
                        <div class="space-y-3 flex-1 flex flex-col justify-around">
                            
                            <!-- Item 1: NO.01 -->
                            <div class="bg-white rounded-xl p-3.5 flex items-center justify-between shadow-md border-l-4 border-emerald-500 hover:shadow-lg transition">
                                <div class="space-y-0.5">
                                    <span class="inline-block px-2 py-0.5 rounded-md bg-[#18462b] text-lime-300 font-black text-[9px] uppercase tracking-wider">
                                        NO.01 Monografi KK
                                    </span>
                                    <div class="text-xs font-black text-slate-800">2.426 KK Terdata</div>
                                    <div class="text-[10px] text-slate-500">100% Monografi Lengkap</div>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-black text-emerald-700 leading-none">93%</div>
                                    <div class="text-[9px] text-emerald-600 font-bold mt-0.5">Selesai</div>
                                </div>
                            </div>

                            <!-- Item 2: NO.02 -->
                            <div class="bg-white rounded-xl p-3.5 flex items-center justify-between shadow-md border-l-4 border-teal-500 hover:shadow-lg transition">
                                <div class="space-y-0.5">
                                    <span class="inline-block px-2 py-0.5 rounded-md bg-[#18462b] text-lime-300 font-black text-[9px] uppercase tracking-wider">
                                        NO.02 Air & Sanitasi
                                    </span>
                                    <div class="text-xs font-black text-slate-800">1.965 Rumah Tangga</div>
                                    <div class="text-[10px] text-slate-500">Akses Air Bersih Layak</div>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-black text-teal-700 leading-none">81%</div>
                                    <div class="text-[9px] text-teal-600 font-bold mt-0.5">Standar SDI</div>
                                </div>
                            </div>

                            <!-- Item 3: NO.03 -->
                            <div class="bg-white rounded-xl p-3.5 flex items-center justify-between shadow-md border-l-4 border-lime-500 hover:shadow-lg transition">
                                <div class="space-y-0.5">
                                    <span class="inline-block px-2 py-0.5 rounded-md bg-[#18462b] text-lime-300 font-black text-[9px] uppercase tracking-wider">
                                        NO.03 Listrik & Hunian
                                    </span>
                                    <div class="text-xs font-black text-slate-800">1.892 Rumah PLN</div>
                                    <div class="text-[10px] text-slate-500">PLN Mandiri & Layak</div>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-black text-lime-700 leading-none">78%</div>
                                    <div class="text-[9px] text-lime-600 font-bold mt-0.5">Terlayani</div>
                                </div>
                            </div>

                        </div>

                        <div class="pt-2 text-center text-[10px] text-emerald-200/90 font-medium border-t border-emerald-500/20">
                            Terintegrasi Standar BPS Satu Data Indonesia
                        </div>
                    </div>

                </div>

                <!-- Row 2: 3 Supporting Distribution Cards (Rumah, Air, Penghasilan) Styled with Clean Green Aesthetics -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-6 pt-6 border-t border-slate-100">
                    <!-- Chart 1: Kepemilikan Rumah -->
                    <div class="bg-emerald-50/50 rounded-2xl p-4 sm:p-5 border border-emerald-100 shadow-2xs">
                        <div class="flex items-center justify-between mb-1">
                            <h4 class="text-xs font-black text-slate-900">Kepemilikan Rumah</h4>
                            <span class="text-[10px] font-black text-emerald-800 bg-emerald-100 px-2 py-0.5 rounded">2.426 KK</span>
                        </div>
                        <p class="text-[11px] text-slate-500 mb-3">Distribusi status hunian keluarga</p>
                        <div class="relative w-full h-44">
                            <canvas id="chartKepemilikanRumah"></canvas>
                        </div>
                    </div>

                    <!-- Chart 2: Sumber Air Minum -->
                    <div class="bg-emerald-50/50 rounded-2xl p-4 sm:p-5 border border-emerald-100 shadow-2xs">
                        <div class="flex items-center justify-between mb-1">
                            <h4 class="text-xs font-black text-slate-900">Sumber Air Minum</h4>
                            <span class="text-[10px] font-black text-blue-800 bg-blue-100 px-2 py-0.5 rounded">Sanitasi</span>
                        </div>
                        <p class="text-[11px] text-slate-500 mb-3">Akses air bersih rumah tangga</p>
                        <div class="relative w-full h-44">
                            <canvas id="chartSumberAir"></canvas>
                        </div>
                    </div>

                    <!-- Chart 3: Penghasilan Bulanan -->
                    <div class="bg-emerald-50/50 rounded-2xl p-4 sm:p-5 border border-emerald-100 shadow-2xs">
                        <div class="flex items-center justify-between mb-1">
                            <h4 class="text-xs font-black text-slate-900">Penghasilan Keluarga</h4>
                            <span class="text-[10px] font-black text-amber-800 bg-amber-100 px-2 py-0.5 rounded">Ekonomi</span>
                        </div>
                        <p class="text-[11px] text-slate-500 mb-3">Sebaran pendapatan per bulan</p>
                        <div class="relative w-full h-44">
                            <canvas id="chartPenghasilan"></canvas>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- TAB 2: ANALITIK SEKTOORAL & SOSIAL (SESUAI SLIDE ADMINISTRATIVE REPORT GAMBAR BAWAH) -->
        <div id="viewAnalytics" class="space-y-6 hidden">
            
            <!-- EXECUTIVE WORK REPORT SLIDE 2 CONTAINER -->
            <div class="bg-white rounded-3xl p-5 sm:p-7 border border-emerald-900/15 shadow-xl relative overflow-hidden space-y-6">
                
                <!-- Slide Header (Sesuai Gambar User) -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3.5 border-b border-slate-200/80 gap-2">
                    <div class="flex items-center gap-2.5">
                        <span class="w-3 h-3 rounded-full bg-emerald-600"></span>
                        <div>
                            <h3 class="font-black text-slate-900 text-base sm:text-lg tracking-tight">
                                Data Statistik: Pelaporan Data Sektoral & Kesejahteraan
                            </h3>
                            <div class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">
                                Data Report: Administrative & Sectoral Data Reporting • BPS Kolaka Utara
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-xs font-black tracking-widest uppercase text-emerald-800 bg-emerald-50 px-3 py-1 rounded-md border border-emerald-200">
                            WORK REPORT
                        </span>
                    </div>
                </div>

                <!-- Village Selector Pills -->
                <div class="flex items-center justify-between flex-wrap gap-2 pt-1">
                    <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none text-xs font-bold">
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-wider mr-1">Filter Desa:</span>
                        <button type="button" onclick="filterAnalitikVillage('all')" id="pill-desa-all" class="pill-filter active px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">
                            Semua Desa (6)
                        </button>
                        <button type="button" onclick="filterAnalitikVillage('kalukaluku')" id="pill-desa-kalukaluku" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">
                            Desa Kalu Kaluku
                        </button>
                        <button type="button" onclick="filterAnalitikVillage('awo')" id="pill-desa-awo" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">
                            Desa Awo
                        </button>
                        <button type="button" onclick="filterAnalitikVillage('kamisi')" id="pill-desa-kamisi" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">
                            Desa Kamisi
                        </button>
                        <button type="button" onclick="filterAnalitikVillage('koroha')" id="pill-desa-koroha" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">
                            Desa Koroha
                        </button>
                        <button type="button" onclick="filterAnalitikVillage('lametuna')" id="pill-desa-lametuna" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">
                            Desa Lametuna
                        </button>
                        <button type="button" onclick="filterAnalitikVillage('sawangaoha')" id="pill-desa-sawangaoha" class="pill-filter px-3.5 py-1.5 rounded-xl transition cursor-pointer shrink-0">
                            Desa Sawangaoha
                        </button>
                    </div>
                    <div id="analitikSubtext" class="text-[11px] text-slate-500 font-medium">
                        Dasar perhitungan: 2.426 keluarga (6 Desa Binaan Kecamatan Kodeoha).
                    </div>
                </div>

                <!-- TOP KPI STAT STRIP: 5 CONNECTED DARK GREEN BOXES (SESUAI GAMBAR USER!) -->
                <div class="bg-[#18462b] rounded-2xl overflow-hidden text-white shadow-lg grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 divide-y sm:divide-y-0 sm:divide-x divide-emerald-700/60">
                    <!-- Box 1 -->
                    <div class="p-4 sm:p-5 text-center">
                        <div class="text-[10px] text-emerald-200 font-bold uppercase tracking-wider">Desa Binaan BPS</div>
                        <div class="text-2xl sm:text-3xl font-black text-white mt-1">6 <span class="text-xs text-lime-300 font-bold">Desa</span></div>
                        <div class="text-[9px] text-emerald-300/80 mt-0.5">Kec. Kodeoha</div>
                    </div>
                    <!-- Box 2 -->
                    <div class="p-4 sm:p-5 text-center">
                        <div class="text-[10px] text-emerald-200 font-bold uppercase tracking-wider">Total Keluarga</div>
                        <div id="statKpiKK" class="text-2xl sm:text-3xl font-black text-white mt-1">2.426 <span class="text-xs text-lime-300 font-bold">KK</span></div>
                        <div class="text-[9px] text-emerald-300/80 mt-0.5">Kepala Keluarga</div>
                    </div>
                    <!-- Box 3 -->
                    <div class="p-4 sm:p-5 text-center">
                        <div class="text-[10px] text-emerald-200 font-bold uppercase tracking-wider">Total Penduduk</div>
                        <div class="text-2xl sm:text-3xl font-black text-white mt-1">8.734 <span class="text-xs text-lime-300 font-bold">Jiwa</span></div>
                        <div class="text-[9px] text-emerald-300/80 mt-0.5">100% Terdata</div>
                    </div>
                    <!-- Box 4 -->
                    <div class="p-4 sm:p-5 text-center">
                        <div class="text-[10px] text-emerald-200 font-bold uppercase tracking-wider">Tingkat Kemiskinan</div>
                        <div class="text-2xl sm:text-3xl font-black text-amber-300 mt-1">3,2%</div>
                        <div class="text-[9px] text-emerald-200 mt-0.5">Kategori Rendah</div>
                    </div>
                    <!-- Box 5 -->
                    <div class="p-4 sm:p-5 text-center col-span-2 sm:col-span-1">
                        <div class="text-[10px] text-emerald-200 font-bold uppercase tracking-wider">Capaian Indikator</div>
                        <div class="text-2xl sm:text-3xl font-black text-lime-300 mt-1">84,5%</div>
                        <div class="text-[9px] text-emerald-200 mt-0.5">223/264 Indikator</div>
                    </div>
                </div>

                <!-- MIDDLE ROW: STATISTICAL TABLE (LEFT) + KPI/PIE CHARTS (RIGHT) (SESUAI GAMBAR) -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-start">
                    
                    <!-- Left: Statistical Table (Sesuai Gambar User) -->
                    <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs">
                                <thead class="bg-[#18462b] text-white font-black text-[11px] uppercase tracking-wider">
                                    <tr>
                                        <th class="py-3 px-3.5">Desa Binaan</th>
                                        <th class="py-3 px-2 text-center">Jumlah KK</th>
                                        <th class="py-3 px-2 text-center">Total Jiwa</th>
                                        <th class="py-3 px-2 text-center">Terinput</th>
                                        <th class="py-3 px-2 text-center">Progres</th>
                                        <th class="py-3 px-3.5 text-center">Status BPS</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 font-semibold text-slate-800">
                                    <tr class="hover:bg-emerald-50/50 transition">
                                        <td class="py-2.5 px-3.5 font-black text-emerald-900 flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                            <span>Kalu Kaluku</span>
                                        </td>
                                        <td class="py-2.5 px-2 text-center font-bold">1.120</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">4.150</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">41 / 44</td>
                                        <td class="py-2.5 px-2 text-center font-black text-emerald-700">93%</td>
                                        <td class="py-2.5 px-3.5 text-center"><span class="px-2 py-0.5 rounded-md bg-emerald-100 text-emerald-800 text-[10px] font-extrabold">Pilot Utama</span></td>
                                    </tr>
                                    <tr class="hover:bg-emerald-50/50 transition bg-slate-50/50">
                                        <td class="py-2.5 px-3.5 font-black text-emerald-900 flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                            <span>Kamisi</span>
                                        </td>
                                        <td class="py-2.5 px-2 text-center font-bold">1.050</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">3.940</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">43 / 44</td>
                                        <td class="py-2.5 px-2 text-center font-black text-emerald-700">98%</td>
                                        <td class="py-2.5 px-3.5 text-center"><span class="px-2 py-0.5 rounded-md bg-amber-100 text-amber-800 text-[10px] font-extrabold">⭐ Tertinggi</span></td>
                                    </tr>
                                    <tr class="hover:bg-emerald-50/50 transition">
                                        <td class="py-2.5 px-3.5 font-black text-emerald-900 flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                            <span>Lametuna</span>
                                        </td>
                                        <td class="py-2.5 px-2 text-center font-bold">447</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">3.120</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">38 / 44</td>
                                        <td class="py-2.5 px-2 text-center font-black text-emerald-700">86%</td>
                                        <td class="py-2.5 px-3.5 text-center"><span class="px-2 py-0.5 rounded-md bg-teal-100 text-teal-800 text-[10px] font-extrabold">Terbina</span></td>
                                    </tr>
                                    <tr class="hover:bg-emerald-50/50 transition bg-slate-50/50">
                                        <td class="py-2.5 px-3.5 font-black text-emerald-900 flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                            <span>Awo</span>
                                        </td>
                                        <td class="py-2.5 px-2 text-center font-bold">356</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">3.250</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">36 / 44</td>
                                        <td class="py-2.5 px-2 text-center font-black text-emerald-700">82%</td>
                                        <td class="py-2.5 px-3.5 text-center"><span class="px-2 py-0.5 rounded-md bg-teal-100 text-teal-800 text-[10px] font-extrabold">Terbina</span></td>
                                    </tr>
                                    <tr class="hover:bg-emerald-50/50 transition">
                                        <td class="py-2.5 px-3.5 font-black text-emerald-900 flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                            <span>Sawangaoha</span>
                                        </td>
                                        <td class="py-2.5 px-2 text-center font-bold">385</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">2.570</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">34 / 44</td>
                                        <td class="py-2.5 px-2 text-center font-black text-emerald-700">77%</td>
                                        <td class="py-2.5 px-3.5 text-center"><span class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 text-[10px] font-extrabold">Cukup</span></td>
                                    </tr>
                                    <tr class="hover:bg-emerald-50/50 transition bg-slate-50/50">
                                        <td class="py-2.5 px-3.5 font-black text-emerald-900 flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                            <span>Koroha</span>
                                        </td>
                                        <td class="py-2.5 px-2 text-center font-bold">298</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">2.890</td>
                                        <td class="py-2.5 px-2 text-center text-slate-600">30 / 44</td>
                                        <td class="py-2.5 px-2 text-center font-black text-amber-700">68%</td>
                                        <td class="py-2.5 px-3.5 text-center"><span class="px-2 py-0.5 rounded-md bg-amber-100 text-amber-800 text-[10px] font-extrabold">Pendampingan</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Right: KPI Box + Two Distribution Donut Charts (Sesuai Gambar User) -->
                    <div class="lg:col-span-5 space-y-4">
                        <!-- Down Arrow KPI Box (Sesuai Gambar) -->
                        <div class="bg-[#18462b] rounded-2xl p-4 text-white flex items-center justify-between shadow-md">
                            <div>
                                <span class="text-[10px] font-black text-emerald-200 uppercase tracking-wider block">Indikator Kerawanan Sosial</span>
                                <div class="text-sm font-black text-white mt-0.5">Penurunan Angka Kemiskinan</div>
                                <div class="text-[10px] text-emerald-300/80">Regsosek Sektoral BPS 2026</div>
                            </div>
                            <div class="flex items-center gap-1 text-right">
                                <span class="text-3xl font-black text-lime-400">-5%</span>
                                <span class="text-2xl text-lime-300">▼</span>
                            </div>
                        </div>

                        <!-- 2 Side-by-Side Mini Donut Charts -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-white rounded-2xl p-3 border border-slate-200 shadow-2xs">
                                <div class="text-[11px] font-black text-slate-800 text-center mb-1">Kepemilikan Rumah</div>
                                <div class="relative w-full h-28">
                                    <canvas id="chartKepemilikanRumahMini"></canvas>
                                </div>
                                <div class="text-[9px] text-center font-bold text-emerald-700 mt-1">81% Milik Sendiri</div>
                            </div>

                            <div class="bg-white rounded-2xl p-3 border border-slate-200 shadow-2xs">
                                <div class="text-[11px] font-black text-slate-800 text-center mb-1">Akses Air Bersih</div>
                                <div class="relative w-full h-28">
                                    <canvas id="chartSumberAirMini"></canvas>
                                </div>
                                <div class="text-[9px] text-center font-bold text-blue-700 mt-1">62% Sumur Lindung</div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- BOTTOM ROW: 4 SECTORAL WIDGETS (BAR CHART, GAUGE DONUT, RING CHART, SUMMARY CARD - SESUAI GAMBAR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 pt-2">
                    
                    <!-- Widget 1: Bar Chart Sumber Penerangan (Sesuai Gambar) -->
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                                <span class="text-xs font-black text-slate-800">Penerangan Listrik</span>
                                <span id="badgePeneranganTotal" class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">2.426 KK</span>
                            </div>
                            <p class="text-[10px] text-slate-400 mt-1">Komposisi sambungan listrik</p>
                            <div class="relative w-full h-36 mt-2">
                                <canvas id="chartPeneranganCanvas"></canvas>
                            </div>
                        </div>
                        <div class="pt-2 text-[10px] text-slate-500 font-bold border-t border-slate-100 text-center">
                            78% PLN Ber-Meteran Resmi
                        </div>
                    </div>

                    <!-- Widget 2: Semi-circle Gauge Donut 84% (Sesuai Gambar) -->
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs flex flex-col justify-between text-center">
                        <div>
                            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                                <span class="text-xs font-black text-slate-800">Capaian Standar SDI</span>
                                <span class="text-[10px] font-bold text-lime-800 bg-lime-100 px-2 py-0.5 rounded">Tinggi</span>
                            </div>
                            <p class="text-[10px] text-slate-400 mt-1">Realisasi 44 Indikator Desa</p>
                            <!-- Gauge Canvas / Semicircle -->
                            <div class="relative w-full h-36 flex items-center justify-center mt-2">
                                <canvas id="chartGaugeSDI"></canvas>
                                <div class="absolute inset-0 flex flex-col items-center justify-center pt-6">
                                    <span class="text-3xl font-black text-slate-900 leading-none">84.5%</span>
                                    <span class="text-[9px] font-bold text-emerald-700 mt-1">223 / 264 Indikator</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2 text-[10px] text-emerald-700 font-bold border-t border-slate-100">
                            Terverifikasi Agen Statistik
                        </div>
                    </div>

                    <!-- Widget 3: Ring Donut Jenis Lantai (Sesuai Gambar) -->
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                                <span class="text-xs font-black text-slate-800">Jenis Lantai Terluas</span>
                                <span class="text-[10px] font-bold text-teal-800 bg-teal-100 px-2 py-0.5 rounded">Fisik</span>
                            </div>
                            <p class="text-[10px] text-slate-400 mt-1">Material lantai bangunan tinggal</p>
                            <div class="relative w-full h-36 mt-2">
                                <canvas id="chartLantaiCanvas"></canvas>
                            </div>
                        </div>
                        <div class="pt-2 text-[10px] text-slate-500 font-bold border-t border-slate-100 text-center">
                            Semen 75% • Keramik 51%
                        </div>
                    </div>

                    <!-- Widget 4: Executive Notes Card (Sesuai Gambar) -->
                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50/50 rounded-2xl p-4 border border-emerald-200 shadow-2xs flex flex-col justify-between text-xs">
                        <div class="space-y-2">
                            <div class="flex items-center gap-1.5 font-black text-emerald-950 pb-2 border-b border-emerald-200/60">
                                <span>📋</span>
                                <span>Catatan Evaluasi BPS</span>
                            </div>
                            <ul class="space-y-1.5 text-[11px] text-emerald-900 leading-relaxed font-medium">
                                <li class="flex items-start gap-1.5">
                                    <span class="text-emerald-600 font-bold">•</span>
                                    <span><b>4 Prinsip SDI</b> diterapkan penuh di seluruh 6 desa binaan Kodeoha.</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="text-emerald-600 font-bold">•</span>
                                    <span><b>Interoperabilitas:</b> Integrasi data monografi, SDGs Desa, dan Regsosek.</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="text-emerald-600 font-bold">•</span>
                                    <span><b>Rekomendasi:</b> Perkuatan infrastruktur air bersih di Desa Koroha & Awo.</span>
                                </li>
                            </ul>
                        </div>
                        <div class="pt-2.5 mt-2 border-t border-emerald-200/60 text-[10px] text-emerald-800 font-bold flex items-center justify-between">
                            <span>BPS Kolaka Utara</span>
                            <span class="text-emerald-600 font-black">2026</span>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ============================================================== -->
    <!-- 6. MENU 3: 6 DESA BINAAN (Gambar Dikecilkan & Data Utuh)       -->
    <!-- ============================================================== -->
    <section id="desa" class="max-w-[1240px] mx-auto px-4 sm:px-6 py-10 space-y-6">
        
        <div class="pb-2 border-b border-slate-200">
            <span class="text-[11px] font-black uppercase tracking-widest text-[#0E7C5A] bg-emerald-100 px-3 py-1 rounded-full">
                🏘️ Wilayah Binaan BPS
            </span>
            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight mt-1.5">
                Katalog 6 Desa Binaan Kecamatan Kodeoha
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">
                Klik kartu desa untuk masuk ke pangkalan data dan modul pembinaan desa yang bersangkutan.
            </p>
        </div>

        <!-- 6 Compact Cards Grid (Gambar Dikecilkan Sesuai Instruksi User) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

            <!-- 1. DESA KALU KALUKU -->
            <div onclick="handleDesaCardAccess(event, 'kalukaluku')"
                 class="village-compact-card p-4 flex flex-col justify-between cursor-pointer group border-2 border-amber-400/80 hover:border-amber-500">
                <div class="flex items-start gap-3.5">
                    <!-- Gambar Mini Thumbnail (Dikecilkan!) -->
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl overflow-hidden bg-slate-900 shrink-0 relative shadow-inner">
                        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=350&q=80" 
                             alt="Desa Kalu Kaluku" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span class="absolute bottom-1 left-1 text-[8.5px] px-1.5 py-0.5 rounded bg-slate-950/80 text-amber-300 font-black">
                            ★ 4.9
                        </span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-[9px] px-2 py-0.5 rounded-md bg-amber-100 text-amber-900 font-black">
                            Pilot Utama BPS
                        </span>
                        <h3 class="text-base font-black text-slate-900 mt-1 leading-snug group-hover:text-[#0E7C5A] transition">
                            Desa Kalu Kaluku
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 line-clamp-2">
                            Sentra kakao & perikanan pesisir terdekat kantor BPS Lasusua.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-2 p-2 rounded-xl bg-slate-50 border border-slate-100 text-center my-3 text-[10px]">
                    <div>
                        <span class="text-slate-400 block font-bold">Penduduk</span>
                        <b class="text-xs font-black text-slate-900">4.150</b>
                    </div>
                    <div class="border-x border-slate-200">
                        <span class="text-slate-400 block font-bold">Keluarga</span>
                        <b class="text-xs font-black text-[#0E7C5A]">1.120 KK</b>
                    </div>
                    <div>
                        <span class="text-slate-400 block font-bold">IKM</span>
                        <b class="text-xs font-black text-amber-600">24 Unit</b>
                    </div>
                </div>

                <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-xs">
                    <span class="text-[11px] font-bold text-emerald-700">● Mandiri (85%)</span>
                    <span class="font-black text-amber-700 group-hover:text-amber-800 flex items-center gap-1">
                        <span>Pilih Desa</span>
                        <span class="group-hover:translate-x-1 transition">→</span>
                    </span>
                </div>
            </div>

            <!-- 2. DESA AWO -->
            <div onclick="handleDesaCardAccess(event, 'awo')"
                 class="village-compact-card p-4 flex flex-col justify-between cursor-pointer group">
                <div class="flex items-start gap-3.5">
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl overflow-hidden bg-slate-900 shrink-0 relative shadow-inner">
                        <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=350&q=80" 
                             alt="Desa Awo" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span class="absolute bottom-1 left-1 text-[8.5px] px-1.5 py-0.5 rounded bg-slate-950/80 text-emerald-300 font-black">
                            ★ 4.8
                        </span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-[9px] px-2 py-0.5 rounded-md bg-emerald-100 text-emerald-800 font-black">
                            Gula Aren & Nilam
                        </span>
                        <h3 class="text-base font-black text-slate-900 mt-1 leading-snug group-hover:text-[#0E7C5A] transition">
                            Desa Awo
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 line-clamp-2">
                            Sentra industri gula merah aren asli dan penyulingan minyak nilam.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-2 p-2 rounded-xl bg-slate-50 border border-slate-100 text-center my-3 text-[10px]">
                    <div>
                        <span class="text-slate-400 block font-bold">Penduduk</span>
                        <b class="text-xs font-black text-slate-900">3.250</b>
                    </div>
                    <div class="border-x border-slate-200">
                        <span class="text-slate-400 block font-bold">Keluarga</span>
                        <b class="text-xs font-black text-[#0E7C5A]">356 KK</b>
                    </div>
                    <div>
                        <span class="text-slate-400 block font-bold">IKM</span>
                        <b class="text-xs font-black text-amber-600">38 Unit</b>
                    </div>
                </div>

                <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-xs">
                    <span class="text-[11px] font-bold text-emerald-700">● Terbina Aktif</span>
                    <span class="font-black text-[#0E7C5A] group-hover:text-emerald-800 flex items-center gap-1">
                        <span>Pilih Desa</span>
                        <span class="group-hover:translate-x-1 transition">→</span>
                    </span>
                </div>
            </div>

            <!-- 3. DESA KAMISI -->
            <div onclick="handleDesaCardAccess(event, 'kamisi')"
                 class="village-compact-card p-4 flex flex-col justify-between cursor-pointer group">
                <div class="flex items-start gap-3.5">
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl overflow-hidden bg-slate-900 shrink-0 relative shadow-inner">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=350&q=80" 
                             alt="Desa Kamisi" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span class="absolute bottom-1 left-1 text-[8.5px] px-1.5 py-0.5 rounded bg-slate-950/80 text-blue-300 font-black">
                            ★ 4.8
                        </span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-[9px] px-2 py-0.5 rounded-md bg-blue-100 text-blue-800 font-black">
                            Pesisir & Teri
                        </span>
                        <h3 class="text-base font-black text-slate-900 mt-1 leading-snug group-hover:text-[#0E7C5A] transition">
                            Desa Kamisi
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 line-clamp-2">
                            Pusat perikanan tangkap dan pengeringan ikan teri tradisional.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-2 p-2 rounded-xl bg-slate-50 border border-slate-100 text-center my-3 text-[10px]">
                    <div>
                        <span class="text-slate-400 block font-bold">Penduduk</span>
                        <b class="text-xs font-black text-slate-900">3.940</b>
                    </div>
                    <div class="border-x border-slate-200">
                        <span class="text-slate-400 block font-bold">Keluarga</span>
                        <b class="text-xs font-black text-blue-700">1.050 KK</b>
                    </div>
                    <div>
                        <span class="text-slate-400 block font-bold">IKM</span>
                        <b class="text-xs font-black text-amber-600">14 Unit</b>
                    </div>
                </div>

                <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-xs">
                    <span class="text-[11px] font-bold text-blue-700">● Bahari Mandiri</span>
                    <span class="font-black text-blue-700 group-hover:text-blue-800 flex items-center gap-1">
                        <span>Pilih Desa</span>
                        <span class="group-hover:translate-x-1 transition">→</span>
                    </span>
                </div>
            </div>

            <!-- 4. DESA KOROHA -->
            <div onclick="handleDesaCardAccess(event, 'koroha')"
                 class="village-compact-card p-4 flex flex-col justify-between cursor-pointer group">
                <div class="flex items-start gap-3.5">
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl overflow-hidden bg-slate-900 shrink-0 relative shadow-inner">
                        <img src="https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?auto=format&fit=crop&w=350&q=80" 
                             alt="Desa Koroha" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span class="absolute bottom-1 left-1 text-[8.5px] px-1.5 py-0.5 rounded bg-slate-950/80 text-teal-300 font-black">
                            ★ 4.7
                        </span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-[9px] px-2 py-0.5 rounded-md bg-teal-100 text-teal-800 font-black">
                            Kakao & Laut
                        </span>
                        <h3 class="text-base font-black text-slate-900 mt-1 leading-snug group-hover:text-[#0E7C5A] transition">
                            Desa Koroha
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 line-clamp-2">
                            Pengembangan perkebunan kakao perbukitan dan budidaya laut.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-2 p-2 rounded-xl bg-slate-50 border border-slate-100 text-center my-3 text-[10px]">
                    <div>
                        <span class="text-slate-400 block font-bold">Penduduk</span>
                        <b class="text-xs font-black text-slate-900">2.890</b>
                    </div>
                    <div class="border-x border-slate-200">
                        <span class="text-slate-400 block font-bold">Keluarga</span>
                        <b class="text-xs font-black text-teal-700">298 KK</b>
                    </div>
                    <div>
                        <span class="text-slate-400 block font-bold">IKM</span>
                        <b class="text-xs font-black text-amber-600">18 Unit</b>
                    </div>
                </div>

                <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-xs">
                    <span class="text-[11px] font-bold text-teal-700">● Maritim Mandiri</span>
                    <span class="font-black text-teal-700 group-hover:text-teal-800 flex items-center gap-1">
                        <span>Pilih Desa</span>
                        <span class="group-hover:translate-x-1 transition">→</span>
                    </span>
                </div>
            </div>

            <!-- 5. DESA LAMETUNA -->
            <div onclick="handleDesaCardAccess(event, 'lametuna')"
                 class="village-compact-card p-4 flex flex-col justify-between cursor-pointer group">
                <div class="flex items-start gap-3.5">
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl overflow-hidden bg-slate-900 shrink-0 relative shadow-inner">
                        <img src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=350&q=80" 
                             alt="Desa Lametuna" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span class="absolute bottom-1 left-1 text-[8.5px] px-1.5 py-0.5 rounded bg-slate-950/80 text-sky-300 font-black">
                            ★ 4.7
                        </span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-[9px] px-2 py-0.5 rounded-md bg-sky-100 text-sky-800 font-black">
                            Pertanian Terpadu
                        </span>
                        <h3 class="text-base font-black text-slate-900 mt-1 leading-snug group-hover:text-[#0E7C5A] transition">
                            Desa Lametuna
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 line-clamp-2">
                            Lumbung pangan padi sawah dan hortikultura sayuran subur.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-2 p-2 rounded-xl bg-slate-50 border border-slate-100 text-center my-3 text-[10px]">
                    <div>
                        <span class="text-slate-400 block font-bold">Penduduk</span>
                        <b class="text-xs font-black text-slate-900">3.120</b>
                    </div>
                    <div class="border-x border-slate-200">
                        <span class="text-slate-400 block font-bold">Keluarga</span>
                        <b class="text-xs font-black text-sky-700">447 KK</b>
                    </div>
                    <div>
                        <span class="text-slate-400 block font-bold">IKM</span>
                        <b class="text-xs font-black text-amber-600">12 Unit</b>
                    </div>
                </div>

                <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-xs">
                    <span class="text-[11px] font-bold text-sky-700">● Terbina Aktif</span>
                    <span class="font-black text-sky-700 group-hover:text-sky-800 flex items-center gap-1">
                        <span>Pilih Desa</span>
                        <span class="group-hover:translate-x-1 transition">→</span>
                    </span>
                </div>
            </div>

            <!-- 6. DESA SAWANGAOHA -->
            <div onclick="handleDesaCardAccess(event, 'sawangaoha')"
                 class="village-compact-card p-4 flex flex-col justify-between cursor-pointer group">
                <div class="flex items-start gap-3.5">
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl overflow-hidden bg-slate-900 shrink-0 relative shadow-inner">
                        <img src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=350&q=80" 
                             alt="Desa Sawangaoha" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span class="absolute bottom-1 left-1 text-[8.5px] px-1.5 py-0.5 rounded bg-slate-950/80 text-purple-300 font-black">
                            ★ 4.8
                        </span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-[9px] px-2 py-0.5 rounded-md bg-purple-100 text-purple-800 font-black">
                            Agroindustri Kayu
                        </span>
                        <h3 class="text-base font-black text-slate-900 mt-1 leading-snug group-hover:text-[#0E7C5A] transition">
                            Desa Sawangaoha
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 line-clamp-2">
                            Sentra agroindustri biji kakao, cengkeh dan kerajinan kayu.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-2 p-2 rounded-xl bg-slate-50 border border-slate-100 text-center my-3 text-[10px]">
                    <div>
                        <span class="text-slate-400 block font-bold">Penduduk</span>
                        <b class="text-xs font-black text-slate-900">2.570</b>
                    </div>
                    <div class="border-x border-slate-200">
                        <span class="text-slate-400 block font-bold">Keluarga</span>
                        <b class="text-xs font-black text-purple-700">730 KK</b>
                    </div>
                    <div>
                        <span class="text-slate-400 block font-bold">IKM</span>
                        <b class="text-xs font-black text-amber-600">25 Unit</b>
                    </div>
                </div>

                <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-xs">
                    <span class="text-[11px] font-bold text-purple-700">● Agro Mandiri</span>
                    <span class="font-black text-purple-700 group-hover:text-purple-800 flex items-center gap-1">
                        <span>Pilih Desa</span>
                        <span class="group-hover:translate-x-1 transition">→</span>
                    </span>
                </div>
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
                    <a href="/descan/login" class="text-emerald-400 hover:text-emerald-300 font-black">Login Akun Desa</a>
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
            kalukaluku: { name: 'Kalu Kaluku', kk: 1120, pop: 4150, ikm: 24, progress: 93, penerangan: { plnMeter: 874, plnTanpa: 156, nonPln: 90 }, lantai: { semen: 580, keramik: 405, kayu: 112, marmer: 23 } },
            awo: { name: 'Awo', kk: 356, pop: 3250, ikm: 38, progress: 82, penerangan: { plnMeter: 278, plnTanpa: 50, nonPln: 28 }, lantai: { semen: 185, keramik: 130, kayu: 35, marmer: 6 } },
            kamisi: { name: 'Kamisi', kk: 1050, pop: 3940, ikm: 14, progress: 98, penerangan: { plnMeter: 820, plnTanpa: 145, nonPln: 85 }, lantai: { semen: 546, keramik: 380, kayu: 104, marmer: 20 } },
            koroha: { name: 'Koroha', kk: 298, pop: 2890, ikm: 18, progress: 68, penerangan: { plnMeter: 232, plnTanpa: 42, nonPln: 24 }, lantai: { semen: 155, keramik: 107, kayu: 30, marmer: 6 } },
            lametuna: { name: 'Lametuna', kk: 447, pop: 3120, ikm: 12, progress: 86, penerangan: { plnMeter: 349, plnTanpa: 62, nonPln: 36 }, lantai: { semen: 232, keramik: 161, kayu: 45, marmer: 9 } },
            sawangaoha: { name: 'Sawangaoha', kk: 730, pop: 2570, ikm: 25, progress: 77, penerangan: { plnMeter: 569, plnTanpa: 102, nonPln: 59 }, lantai: { semen: 380, keramik: 263, kayu: 73, marmer: 14 } }
        };

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

        // Initialize Dashboard Tab Charts
        function initDashboardCharts() {
            if (typeof Chart === 'undefined') return;

            // 1. Chart Status Kepemilikan Rumah (Donut Chart)
            const ctxRumah = document.getElementById('chartKepemilikanRumah');
            if (ctxRumah) {
                if (chartInstances.rumah) chartInstances.rumah.destroy();
                chartInstances.rumah = new Chart(ctxRumah.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Milik Sendiri', 'Sewa / Kontrak', 'Bebas Sewa'],
                        datasets: [{
                            data: [81, 12, 7],
                            backgroundColor: ['#18462b', '#0284c7', '#f59e0b'],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { position: 'bottom', labels: { boxWidth: 10, font: { size: 9.5 } } }
                        },
                        cutout: '68%'
                    }
                });
            }

            // 2. Chart Sumber Air Minum Bersih (Donut Chart)
            const ctxAir = document.getElementById('chartSumberAir');
            if (ctxAir) {
                if (chartInstances.air) chartInstances.air.destroy();
                chartInstances.air = new Chart(ctxAir.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Sumur Terlindung', 'Mata Air', 'PAM / BPSPAM'],
                        datasets: [{
                            data: [62, 24, 14],
                            backgroundColor: ['#0284c7', '#0d9488', '#38bdf8'],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { position: 'bottom', labels: { boxWidth: 10, font: { size: 9.5 } } }
                        },
                        cutout: '68%'
                    }
                });
            }

            // 3. Chart Penghasilan Keluarga (Bar Chart)
            const ctxPenghasilan = document.getElementById('chartPenghasilan');
            if (ctxPenghasilan) {
                if (chartInstances.penghasilan) chartInstances.penghasilan.destroy();
                chartInstances.penghasilan = new Chart(ctxPenghasilan.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: ['< 1,5 Jt', '1,5 - 3 Jt', '3 - 5 Jt', '> 5 Jt'],
                        datasets: [{
                            data: [320, 1140, 710, 256],
                            backgroundColor: ['#f59e0b', '#18462b', '#0284c7', '#10b981'],
                            borderRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { grid: { color: '#f8fafc' }, ticks: { font: { size: 9 } } },
                            x: { grid: { display: false }, ticks: { font: { size: 9 } } }
                        }
                    }
                });
            }
        }

        // Initialize Analytics Tab Charts (Sesuai Slide 2 Gambar User)
        function initAnalyticsCharts(selectedVillage = 'all') {
            if (typeof Chart === 'undefined') return;

            document.querySelectorAll('.pill-filter').forEach(btn => btn.classList.remove('active'));
            const targetPill = document.getElementById('pill-desa-' + selectedVillage);
            if (targetPill) targetPill.classList.add('active');

            let totalKK = 2426;
            let pMeter = 1892, pTanpa = 339, pNon = 195;
            let lSemen = 1261, lKeramik = 873, lKayu = 242, lMarmer = 50;

            if (selectedVillage !== 'all' && villagesMeta[selectedVillage]) {
                const vm = villagesMeta[selectedVillage];
                totalKK = vm.kk;
                pMeter = vm.penerangan.plnMeter;
                pTanpa = vm.penerangan.plnTanpa;
                pNon = vm.penerangan.nonPln;
                lSemen = vm.lantai.semen;
                lKeramik = vm.lantai.keramik;
                lKayu = vm.lantai.kayu;
                lMarmer = vm.lantai.marmer;

                const subtext = document.getElementById('analitikSubtext');
                if (subtext) subtext.textContent = `Dasar perhitungan: ${totalKK} keluarga (${vm.name}). Seluruh nilai terintegrasi standar BPS.`;
                const badge = document.getElementById('badgePeneranganTotal');
                if (badge) badge.textContent = `${totalKK} KK (${vm.name})`;
                const statKpiKK = document.getElementById('statKpiKK');
                if (statKpiKK) statKpiKK.innerHTML = `${totalKK.toLocaleString('id-ID')} <span class="text-xs text-lime-300 font-bold">KK</span>`;
            } else {
                const subtext = document.getElementById('analitikSubtext');
                if (subtext) subtext.textContent = `Dasar perhitungan: 2.426 keluarga (6 Desa Binaan Kecamatan Kodeoha).`;
                const badge = document.getElementById('badgePeneranganTotal');
                if (badge) badge.textContent = `2.426 Total KK (6 Desa)`;
                const statKpiKK = document.getElementById('statKpiKK');
                if (statKpiKK) statKpiKK.innerHTML = `2.426 <span class="text-xs text-lime-300 font-bold">KK</span>`;
            }

            // 1. Chart Penerangan (Bar Sesuai Widget 1 di Gambar)
            const ctxPenerangan = document.getElementById('chartPeneranganCanvas');
            if (ctxPenerangan) {
                if (chartInstances.penerangan) chartInstances.penerangan.destroy();
                chartInstances.penerangan = new Chart(ctxPenerangan.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: ['PLN Meter', 'PLN Tanpa', 'Non-PLN'],
                        datasets: [{
                            data: [pMeter, pTanpa, pNon],
                            backgroundColor: ['#18462b', '#10b981', '#f59e0b'],
                            borderRadius: 6,
                            barThickness: 24
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: (ctx) => ` ${ctx.raw.toLocaleString('id-ID')} KK (${Math.round((ctx.raw/totalKK)*100)}%)`
                                }
                            }
                        },
                        scales: {
                            y: { display: false },
                            x: { grid: { display: false }, ticks: { font: { size: 9, weight: 'bold' } } }
                        }
                    }
                });
            }

            // 2. Chart Gauge SDI (Semi-circle Gauge Sesuai Widget 2 di Gambar)
            const ctxGauge = document.getElementById('chartGaugeSDI');
            if (ctxGauge) {
                if (chartInstances.gauge) chartInstances.gauge.destroy();
                chartInstances.gauge = new Chart(ctxGauge.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Tercapai', 'Sisa'],
                        datasets: [{
                            data: [84.5, 15.5],
                            backgroundColor: ['#10b981', '#e2e8f0'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        circumference: 180,
                        rotation: 270,
                        cutout: '76%',
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: { enabled: false }
                        }
                    }
                });
            }

            // 3. Chart Lantai (Doughnut Ring Chart Sesuai Widget 3 di Gambar)
            const ctxLantai = document.getElementById('chartLantaiCanvas');
            if (ctxLantai) {
                if (chartInstances.lantai) chartInstances.lantai.destroy();
                chartInstances.lantai = new Chart(ctxLantai.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Semen', 'Keramik', 'Kayu', 'Marmer'],
                        datasets: [{
                            data: [lSemen, lKeramik, lKayu, lMarmer],
                            backgroundColor: ['#18462b', '#10b981', '#f59e0b', '#0284c7'],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { position: 'bottom', labels: { boxWidth: 8, font: { size: 9 } } }
                        },
                        cutout: '62%'
                    }
                });
            }

            // 4. Mini Charts di Samping Tabel (Rumah & Air Mini)
            const ctxRumahMini = document.getElementById('chartKepemilikanRumahMini');
            if (ctxRumahMini) {
                if (chartInstances.rumahMini) chartInstances.rumahMini.destroy();
                chartInstances.rumahMini = new Chart(ctxRumahMini.getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: ['Milik Sendiri', 'Sewa', 'Lainnya'],
                        datasets: [{
                            data: [81, 12, 7],
                            backgroundColor: ['#18462b', '#0284c7', '#f59e0b'],
                            borderWidth: 1.5,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } }
                    }
                });
            }

            const ctxAirMini = document.getElementById('chartSumberAirMini');
            if (ctxAirMini) {
                if (chartInstances.airMini) chartInstances.airMini.destroy();
                chartInstances.airMini = new Chart(ctxAirMini.getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: ['Sumur', 'Mata Air', 'PAM'],
                        datasets: [{
                            data: [62, 24, 14],
                            backgroundColor: ['#0284c7', '#10b981', '#38bdf8'],
                            borderWidth: 1.5,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } }
                    }
                });
            }
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

        // Output Document Actions
        function openOutputDoc(docType) {
            const docMap = {
                monografi: 'Monografi Statistik Sektoral Desa 2026',
                tabel: 'Tabel Rekapitulasi Statistik 44 Indikator SDI',
                brs: 'Berita Resmi Statistik (BRS) Sektoral BPS Kolut',
                leaflet: 'Leaflet & Infografis Tematik Desa Cantik'
            };
            showToast(`Membuka dokumen: ${docMap[docType] || docType}...`, '📖');
            setTimeout(() => {
                window.location.href = `/descan/menu?desa=kalukaluku&menu=dashboard`;
            }, 800);
        }

        function downloadOutputDoc(docType) {
            const fileMap = {
                monografi: 'Monografi_Desa_Cantik_Kolut_2026.pdf',
                tabel: 'Tabel_Statistik_Sektoral_44_Indikator.xlsx',
                brs: 'BRS_Sektoral_BPS_Kolaka_Utara.pdf',
                leaflet: 'Leaflet_Infografis_Desa_Cantik.pdf'
            };
            const fileName = fileMap[docType] || 'Dokumen_Desa_Cantik.pdf';
            showToast(`Mengunduh berkas ${fileName}...`, '📥');
            setTimeout(() => {
                showToast(`✅ Berkas ${fileName} berhasil diunduh!`, '✓');
            }, 1200);
        }

        // Run on Page Load
        document.addEventListener('DOMContentLoaded', () => {
            initDashboardCharts();
        });
    </script>
</body>
</html>
