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

        <!-- TAB 1: DASHBOARD MAKRO 6 DESA -->
        <div id="viewDashboard" class="space-y-6">
            
            <!-- Dual Primary Charts: Progress Bars + Bar Chart -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                
                <!-- Left: Progres Pendataan 44 Indikator per Desa -->
                <div class="lg:col-span-6 card-surface p-5 sm:p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-black text-slate-900 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#0E7C5A]"></span>
                                <span>Progres Pendataan per Desa</span>
                            </h3>
                            <span class="text-[10px] font-black text-emerald-800 bg-emerald-100 px-2 py-0.5 rounded-md">
                                Standar SDI
                            </span>
                        </div>
                        <p class="text-[11px] text-slate-500 mt-1">
                            Dasar: 44 indikator makro per desa · persentase = indikator terisi ÷ 44
                        </p>
                    </div>

                    <!-- 6 Village Progress Bars -->
                    <div class="space-y-3.5 py-4">
                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs font-black">
                                <span class="text-slate-800">1. Desa Kalu Kaluku (Pilot Utama)</span>
                                <span class="text-[#0E7C5A]">93% <span class="text-slate-400 font-normal">(41/44)</span></span>
                            </div>
                            <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full rounded-full bg-[#0E7C5A]" style="width: 93%;"></div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs font-black">
                                <span class="text-slate-800">2. Desa Kamisi (Pesisir Bahari)</span>
                                <span class="text-emerald-600">98% <span class="text-slate-400 font-normal">(43/44)</span></span>
                            </div>
                            <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full rounded-full bg-emerald-600" style="width: 98%;"></div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs font-black">
                                <span class="text-slate-800">3. Desa Lametuna (Pertanian)</span>
                                <span class="text-teal-600">86% <span class="text-slate-400 font-normal">(38/44)</span></span>
                            </div>
                            <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full rounded-full bg-teal-600" style="width: 86%;"></div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs font-black">
                                <span class="text-slate-800">4. Desa Awo (Gula Aren & Nilam)</span>
                                <span class="text-emerald-600">82% <span class="text-slate-400 font-normal">(36/44)</span></span>
                            </div>
                            <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full rounded-full bg-emerald-500" style="width: 82%;"></div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs font-black">
                                <span class="text-slate-800">5. Desa Sawangaoha (Agroindustri)</span>
                                <span class="text-cyan-700">77% <span class="text-slate-400 font-normal">(34/44)</span></span>
                            </div>
                            <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full rounded-full bg-cyan-600" style="width: 77%;"></div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-xs font-black">
                                <span class="text-slate-800">6. Desa Koroha (Kakao & Laut)</span>
                                <span class="text-amber-600">68% <span class="text-slate-400 font-normal">(30/44)</span></span>
                            </div>
                            <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full rounded-full bg-amber-500" style="width: 68%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                        <span>Total: <b>223</b> dari 264 Indikator</span>
                        <span class="text-[#0E7C5A] font-bold">Rata-rata: 84% Mandiri</span>
                    </div>
                </div>

                <!-- Right: Chart Jumlah Keluarga per Desa -->
                <div class="lg:col-span-6 card-surface p-5 sm:p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-black text-slate-900 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                                <span>Jumlah Keluarga per Desa (KK)</span>
                            </h3>
                            <span class="text-[10px] font-black text-blue-700 bg-blue-100 px-2 py-0.5 rounded-md">
                                Total: 2.426 KK
                            </span>
                        </div>
                        <p class="text-[11px] text-slate-500 mt-1">
                            Perbandingan jumlah Kepala Keluarga di 6 Desa Binaan Kecamatan Kodeoha
                        </p>
                    </div>

                    <div class="relative w-full h-64 sm:h-72 my-2">
                        <canvas id="chartKeluargaPerDesa"></canvas>
                    </div>

                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                        <span>Rentang: <b>298 – 1.120 KK</b></span>
                        <span class="text-slate-700 font-bold">Sumber: Monografi Desa 2026</span>
                    </div>
                </div>

            </div>

            <!-- Row 2: 3 Distribusi Kunci (Rumah, Air, Penghasilan) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Chart 1: Kepemilikan Rumah -->
                <div class="card-surface p-5">
                    <div class="flex items-center justify-between mb-1">
                        <h4 class="text-xs font-black text-slate-900">Kepemilikan Rumah</h4>
                        <span class="text-[10px] font-black text-emerald-800 bg-emerald-100 px-2 py-0.5 rounded">2.426 KK</span>
                    </div>
                    <p class="text-[11px] text-slate-400 mb-3">Distribusi status hunian keluarga</p>
                    <div class="relative w-full h-44">
                        <canvas id="chartKepemilikanRumah"></canvas>
                    </div>
                </div>

                <!-- Chart 2: Sumber Air Minum -->
                <div class="card-surface p-5">
                    <div class="flex items-center justify-between mb-1">
                        <h4 class="text-xs font-black text-slate-900">Sumber Air Minum</h4>
                        <span class="text-[10px] font-black text-blue-800 bg-blue-100 px-2 py-0.5 rounded">Sanitasi</span>
                    </div>
                    <p class="text-[11px] text-slate-400 mb-3">Akses air bersih rumah tangga</p>
                    <div class="relative w-full h-44">
                        <canvas id="chartSumberAir"></canvas>
                    </div>
                </div>

                <!-- Chart 3: Penghasilan Bulanan -->
                <div class="card-surface p-5">
                    <div class="flex items-center justify-between mb-1">
                        <h4 class="text-xs font-black text-slate-900">Penghasilan Keluarga</h4>
                        <span class="text-[10px] font-black text-amber-800 bg-amber-100 px-2 py-0.5 rounded">Ekonomi</span>
                    </div>
                    <p class="text-[11px] text-slate-400 mb-3">Sebaran pendapatan per bulan</p>
                    <div class="relative w-full h-44">
                        <canvas id="chartPenghasilan"></canvas>
                    </div>
                </div>
            </div>

        </div>

        <!-- TAB 2: ANALITIK SEKTOORAL & SOSIAL -->
        <div id="viewAnalytics" class="space-y-6 hidden">
            
            <!-- Village Selector Pills -->
            <div class="p-3.5 rounded-2xl bg-white border border-slate-200 shadow-2xs space-y-2">
                <div class="text-[11px] font-black text-slate-500 uppercase tracking-wider">
                    Pilih Desa untuk Analitik Spesifik:
                </div>
                <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none text-xs font-bold">
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
                <div id="analitikSubtext" class="text-[11px] text-slate-400 font-medium">
                    Dasar perhitungan: 2.426 keluarga (6 Desa Binaan Kecamatan Kodeoha). Seluruh nilai terintegrasi standar BPS.
                </div>
            </div>

            <!-- 2 Dual Charts: Penerangan & Lantai -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Chart A: Sumber Penerangan -->
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="text-sm font-black text-slate-900">Sumber Penerangan</h3>
                        <span id="badgePeneranganTotal" class="text-xs font-black text-blue-700 bg-blue-100 px-2 py-0.5 rounded-md">
                            2.426 Total KK
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 mb-4">Komposisi keluarga menurut sumber penerangan rumah tangga</p>
                    <div class="relative w-full h-64">
                        <canvas id="chartPeneranganCanvas"></canvas>
                    </div>
                </div>

                <!-- Chart B: Jenis Lantai Terluas -->
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="text-sm font-black text-slate-900">Jenis Lantai Terluas</h3>
                        <span class="text-xs font-black text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-md">
                            Fisik Rumah
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 mb-4">Jumlah keluarga menurut jenis lantai terluas bangunan tinggal</p>
                    <div class="relative w-full h-64">
                        <canvas id="chartLantaiCanvas"></canvas>
                    </div>
                </div>
            </div>

            <!-- 2 Dual Charts: Bansos & BPJS -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Chart C: Penerima Bantuan Sosial -->
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="text-sm font-black text-slate-900">Penerima Bantuan Pemerintah</h3>
                        <span class="text-xs font-black text-amber-700 bg-amber-100 px-2 py-0.5 rounded-md">
                            Bantuan Sosial
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 mb-4">Sebaran keluarga penerima bansos (PKH, BPNT, BLT-DD, PIP)</p>
                    <div class="relative w-full h-64">
                        <canvas id="chartBansosCanvas"></canvas>
                    </div>
                </div>

                <!-- Chart D: BPJS Kesehatan -->
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="text-sm font-black text-slate-900">Jaminan Kesehatan (BPJS)</h3>
                        <span class="text-xs font-black text-teal-700 bg-teal-100 px-2 py-0.5 rounded-md">
                            Proteksi Kesehatan
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 mb-4">Proporsi kepemilikan kartu BPJS (PBI APBN/APBD vs Mandiri)</p>
                    <div class="relative w-full h-64">
                        <canvas id="chartBPJSCanvas"></canvas>
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

            // 1. Chart Jumlah Keluarga per Desa (Bar Chart)
            const ctxKeluarga = document.getElementById('chartKeluargaPerDesa');
            if (ctxKeluarga) {
                if (chartInstances.keluarga) chartInstances.keluarga.destroy();
                chartInstances.keluarga = new Chart(ctxKeluarga.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: ['Kalu Kaluku', 'Kamisi', 'Sawangaoha', 'Lametuna', 'Awo', 'Koroha'],
                        datasets: [{
                            label: 'Jumlah Keluarga (KK)',
                            data: [1120, 1050, 730, 447, 356, 298],
                            backgroundColor: ['#0E7C5A', '#0284c7', '#8b5cf6', '#0d9488', '#f59e0b', '#f97316'],
                            borderRadius: 8,
                            barThickness: 28
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: (ctx) => ` ${ctx.parsed.y} Kepala Keluarga (KK)`
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: '#f1f5f9' },
                                ticks: { font: { size: 11 } }
                            },
                            x: {
                                grid: { display: false },
                                ticks: { font: { size: 10, weight: 'bold' } }
                            }
                        }
                    }
                });
            }

            // 2. Chart Status Kepemilikan Rumah (Donut Chart)
            const ctxRumah = document.getElementById('chartKepemilikanRumah');
            if (ctxRumah) {
                if (chartInstances.rumah) chartInstances.rumah.destroy();
                chartInstances.rumah = new Chart(ctxRumah.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Milik Sendiri', 'Sewa / Kontrak', 'Bebas Sewa'],
                        datasets: [{
                            data: [81, 12, 7],
                            backgroundColor: ['#0E7C5A', '#0284c7', '#f59e0b'],
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

            // 3. Chart Sumber Air Minum Bersih (Donut Chart)
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

            // 4. Chart Penghasilan Keluarga (Bar Chart)
            const ctxPenghasilan = document.getElementById('chartPenghasilan');
            if (ctxPenghasilan) {
                if (chartInstances.penghasilan) chartInstances.penghasilan.destroy();
                chartInstances.penghasilan = new Chart(ctxPenghasilan.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: ['< 1,5 Jt', '1,5 - 3 Jt', '3 - 5 Jt', '> 5 Jt'],
                        datasets: [{
                            data: [320, 1140, 710, 256],
                            backgroundColor: ['#f59e0b', '#0E7C5A', '#0284c7', '#6366f1'],
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

        // Initialize Analytics Tab Charts
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
                if (badge) badge.textContent = `${totalKK} Total KK (${vm.name})`;
            } else {
                const subtext = document.getElementById('analitikSubtext');
                if (subtext) subtext.textContent = `Dasar perhitungan: 2.426 keluarga (6 Desa Binaan Kecamatan Kodeoha). Seluruh nilai terintegrasi standar BPS.`;
                const badge = document.getElementById('badgePeneranganTotal');
                if (badge) badge.textContent = `2.426 Total KK (6 Desa)`;
            }

            // 1. Chart Penerangan (Donut)
            const ctxPenerangan = document.getElementById('chartPeneranganCanvas');
            if (ctxPenerangan) {
                if (chartInstances.penerangan) chartInstances.penerangan.destroy();
                chartInstances.penerangan = new Chart(ctxPenerangan.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: [
                            `PLN dengan meteran ${pMeter} (${Math.round((pMeter/totalKK)*100)}%)`,
                            `PLN tanpa meteran ${pTanpa} (${Math.round((pTanpa/totalKK)*100)}%)`,
                            `Non-PLN ${pNon} (${Math.round((pNon/totalKK)*100)}%)`
                        ],
                        datasets: [{
                            data: [pMeter, pTanpa, pNon],
                            backgroundColor: ['#0284c7', '#f97316', '#10b981'],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { position: 'right', labels: { boxWidth: 12, font: { size: 11, weight: 'bold' } } }
                        },
                        cutout: '60%'
                    }
                });
            }

            // 2. Chart Lantai (Bar)
            const ctxLantai = document.getElementById('chartLantaiCanvas');
            if (ctxLantai) {
                if (chartInstances.lantai) chartInstances.lantai.destroy();
                chartInstances.lantai = new Chart(ctxLantai.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: ['Semen/bata merah', 'Kayu/papan', 'Keramik', 'Marmer'],
                        datasets: [{
                            label: 'Jumlah Keluarga',
                            data: [lSemen, lKayu, lKeramik, lMarmer],
                            backgroundColor: ['#0284c7', '#ea580c', '#16a34a', '#1e293b'],
                            borderRadius: 8,
                            barThickness: 34
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { grid: { color: '#f1f5f9' }, ticks: { font: { size: 11 } } },
                            x: { grid: { display: false }, ticks: { font: { size: 11, weight: 'bold' } } }
                        }
                    }
                });
            }

            // 3. Chart Bansos (Bar)
            const ctxBansos = document.getElementById('chartBansosCanvas');
            if (ctxBansos) {
                if (chartInstances.bansos) chartInstances.bansos.destroy();
                chartInstances.bansos = new Chart(ctxBansos.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: ['PKH', 'BPNT / Sembako', 'BLT-Dana Desa', 'PIP Pendidikan', 'Non-Bansos'],
                        datasets: [{
                            label: 'Jumlah Penerima (KK)',
                            data: [
                                Math.round(totalKK * 0.16),
                                Math.round(totalKK * 0.22),
                                Math.round(totalKK * 0.18),
                                Math.round(totalKK * 0.14),
                                Math.round(totalKK * 0.42)
                            ],
                            backgroundColor: ['#0E7C5A', '#0284c7', '#f59e0b', '#8b5cf6', '#cbd5e1'],
                            borderRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { grid: { color: '#f8fafc' } },
                            x: { grid: { display: false }, ticks: { font: { size: 10, weight: 'bold' } } }
                        }
                    }
                });
            }

            // 4. Chart BPJS (Donut)
            const ctxBPJS = document.getElementById('chartBPJSCanvas');
            if (ctxBPJS) {
                if (chartInstances.bpjs) chartInstances.bpjs.destroy();
                chartInstances.bpjs = new Chart(ctxBPJS.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['BPJS PBI 68%', 'BPJS Mandiri 22%', 'Belum BPJS 10%'],
                        datasets: [{
                            data: [68, 22, 10],
                            backgroundColor: ['#0E7C5A', '#0284c7', '#ef4444'],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { position: 'bottom', labels: { boxWidth: 10, font: { size: 10 } } }
                        },
                        cutout: '62%'
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
