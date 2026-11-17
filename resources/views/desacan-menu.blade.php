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
        .nav-tab {
            padding: 0.55rem 1.1rem !important;
            border-radius: 0.75rem !important;
            transition: all 0.18s ease-in-out !important;
            border: 1px solid transparent !important;
            color: #cbd5e1 !important;
            font-weight: 700 !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.5rem !important;
            font-size: 0.8125rem !important;
            letter-spacing: -0.01em !important;
        }
        .nav-tab:hover:not(.active) {
            background: rgba(255, 255, 255, 0.08) !important;
            color: #ffffff !important;
        }
        .nav-tab.active {
            color: #ffffff !important;
            font-weight: 800 !important;
            background: rgba(255, 255, 255, 0.14) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            box-shadow: 0 2px 8px -2px rgba(0, 0, 0, 0.25) !important;
            border-bottom: 3px solid #f59e0b !important;
        }
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
</head>
<body class="min-h-screen text-slate-800 flex flex-col justify-between selection:bg-teal-100 selection:text-teal-900">

        <!-- TOP WHITE BRAND BAR (SESUAI RANCANGAN WIREFRAME PORTAL DESA CANTIK) -->
    <div class="w-full bg-white border-b border-slate-200/90 py-2.5 px-4 sm:px-8 shadow-xs">
        <div class="max-w-[1720px] mx-auto flex items-center justify-between gap-4">
            
            <!-- Left: Logo BPS & Logo Kolaka Utara bersampingan + DESA CANTIK - BPS KAB. KOLAKA UTARA -->
            <div class="flex items-center gap-3">
                <a href="/descan" onclick="exitToDescanDashboard(event)" class="flex items-center gap-3 group" title="Kembali ke Dashboard Utama 6 Desa Binaan">
                    <div class="flex items-center gap-2 shrink-0 bg-slate-50 border border-slate-200/90 px-2 py-1 rounded-xl shadow-2xs">
                        <img src="/images/logo_bps.png" alt="BPS" class="h-8 sm:h-9 w-auto object-contain drop-shadow-xs">
                        <div class="h-6 w-[1.5px] bg-slate-300"></div>
                        <img src="/images/logo_kolaka_utara.png" alt="Kolaka Utara" class="h-8 sm:h-9 w-auto object-contain drop-shadow-xs">
                    </div>
                    <div class="leading-tight">
                        <span class="text-xs sm:text-sm font-black tracking-wide text-[#005ea6] block uppercase">
                            DESA CANTIK - BPS KAB. KOLAKA UTARA
                        </span>
                        <span class="text-[10px] sm:text-[11px] font-bold text-slate-500 block tracking-wider uppercase">
                            PORTAL SATU DATA DESA MADANI TERINTEGRASI
                        </span>
                    </div>
                </a>
            </div>

            <!-- Right: Akun Desa Kalu Kaluku (Kec. Kodeoha) & Status User -->
            <div class="flex items-center gap-3">
                <!-- Capsule Akun Desa Kalu Kaluku (Sesuai Diagram) -->
                <div class="flex items-center gap-2.5 bg-slate-50 border border-slate-200/90 px-3.5 py-1.5 rounded-2xl shadow-2xs">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <div class="text-left leading-tight">
                        <div id="topBrandDesaTitle" class="text-xs sm:text-sm font-black text-slate-900 tracking-tight">
                            AKUN DESA KALU KALUKU
                        </div>
                        <div id="topBrandDesaKec" class="text-[10px] font-bold text-slate-500">
                            (Kec. Kodeoha) • Terbina BPS
                        </div>
                    </div>
                </div>

                <!-- Action Buttons: 6 Desa & Logout -->
                <div class="flex items-center gap-2">
                    <a href="/descan" onclick="exitToDescanDashboard(event)" class="hidden md:flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition border border-slate-200 shadow-2xs" title="Pindah Desa Pilot">
                        <span>← 6 Desa</span>
                    </a>
                    <button type="button" onclick="logoutFromMenu()" class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 text-xs font-bold transition shadow-2xs cursor-pointer">
                        <span>Keluar</span>
                    </button>
                    <!-- User Avatar -->
                    <div class="w-8 h-8 rounded-full bg-amber-400 border border-amber-300 text-slate-950 font-black text-xs flex items-center justify-center shadow-xs">
                        AD
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- TOP DARK NAVY NAVIGATION BAR (ELEGAN, RAPI & 100% RESPONSIF) -->
    <header class="w-full bg-[#072448] text-white border-b border-blue-900/60 sticky top-0 z-40 shadow-md">
        <div class="max-w-[1720px] mx-auto px-4 sm:px-8 py-2 flex items-center justify-between gap-3 overflow-x-auto scrollbar-none">
            
            <!-- Left Menu Items: 4 MENU UTAMA RAPI DENGAN IKON & LABEL -->
            <nav class="flex items-center gap-1.5 sm:gap-2 text-xs font-bold whitespace-nowrap" aria-label="Navigasi Utama Desa Cantik">
                <button type="button" onclick="switchNavMenu('dashboard')" id="nav-dashboard" class="nav-tab active cursor-pointer">
                    <span class="text-sm">📊</span>
                    <span>1. Beranda (Dashboard)</span>
                </button>
                <button type="button" onclick="switchNavMenu('tentang')" id="nav-tentang" class="nav-tab cursor-pointer">
                    <span class="text-sm">🏛️</span>
                    <span>2. Profil Desa</span>
                </button>
                <button type="button" onclick="switchNavMenu('pembelajaran')" id="nav-pembelajaran" class="nav-tab cursor-pointer">
                    <span class="text-sm">📖</span>
                    <span>3. Pembelajaran (LMS)</span>
                </button>
                <button type="button" onclick="switchNavMenu('monev')" id="nav-monev" class="nav-tab cursor-pointer">
                    <span class="text-sm">📈</span>
                    <span>4. Monev (Evaluasi)</span>
                </button>
            </nav>

            <!-- Right: Status Desa Binaan Capsule Badge -->
            <div class="flex items-center gap-2 shrink-0">
                <div class="flex items-center gap-2 bg-white/10 hover:bg-white/15 border border-white/20 px-3 py-1.5 rounded-xl text-xs backdrop-blur-md transition shadow-2xs">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-[10px] text-blue-200 font-bold uppercase tracking-wider hidden md:inline">Desa Binaan BPS:</span>
                    <span id="topNavVillageBadge" class="font-black text-amber-300 uppercase tracking-wide text-xs">
                        DESA KALU KALUKU
                    </span>
                    <span class="text-[10px] text-slate-300/80 font-semibold hidden lg:inline">• Kodeoha</span>
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
        <!-- MAIN CONTAINER (DENGAN SIDEBAR PERSISTEN DI SEMUA 4 TAMPILAN SESUAI WIREFRAME) -->
    <main id="mainMenuContent" class="w-full flex-1">
        <div class="flex flex-col lg:flex-row min-h-[calc(100vh-120px)] w-full bg-[#f4f6f9]">
            
            <!-- ========================================================================= -->
            <!-- PERSISTENT LEFT SIDEBAR (MUNCUL DI KEEMPAT MENU: 1, 2, 3, 4)               -->
            <!-- ========================================================================= -->
            <aside class="w-full lg:w-64 bg-[#094074] text-white p-4 lg:p-5 flex flex-col justify-between shrink-0 shadow-lg border-r border-blue-900/60 select-none">
                <!-- Top Navigation Menu Links (4 Menu Utama Sesuai Wireframe) -->
                <div class="space-y-2">
                    <div class="px-2 pb-2 text-[10px] font-black uppercase tracking-wider text-blue-200/80 border-b border-white/10 flex items-center justify-between">
                        <span>Sidebar Menu</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    </div>

                    <!-- 1. Beranda (Dashboard) -->
                    <button type="button" onclick="switchNavMenu('dashboard')" id="side-dashboard" class="side-nav-btn active w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl bg-[#005ea6] text-white font-black text-xs shadow-sm transition text-left cursor-pointer">
                        <span class="text-base">📊</span>
                        <div class="leading-tight">
                            <div class="font-black text-white">1. Beranda (Dashboard)</div>
                            <div class="text-[10px] text-blue-200 font-medium">Dashboard Utama & Potensi</div>
                        </div>
                    </button>

                    <!-- 2. Profil Desa -->
                    <button type="button" onclick="switchNavMenu('tentang')" id="side-tentang" class="side-nav-btn w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-blue-100 hover:bg-white/10 font-bold text-xs transition text-left cursor-pointer">
                        <span class="text-base">🏛️</span>
                        <div class="leading-tight">
                            <div class="font-black">2. Profil Desa</div>
                            <div class="text-[10px] text-blue-200/80 font-medium">Monografi & SDM Aparat</div>
                        </div>
                    </button>

                    <!-- 3. Pembelajaran (LMS) -->
                    <button type="button" onclick="switchNavMenu('pembelajaran')" id="side-pembelajaran" class="side-nav-btn w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-blue-100 hover:bg-white/10 font-bold text-xs transition text-left cursor-pointer">
                        <span class="text-base">📖</span>
                        <div class="leading-tight">
                            <div class="font-black">3. Pembelajaran (LMS)</div>
                            <div class="text-[10px] text-blue-200/80 font-medium">LMS Desa Cantik BPS</div>
                        </div>
                    </button>

                    <!-- 4. Monev (Evaluasi) -->
                    <button type="button" onclick="switchNavMenu('monev')" id="side-monev" class="side-nav-btn w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-blue-100 hover:bg-white/10 font-bold text-xs transition text-left cursor-pointer">
                        <span class="text-base">📈</span>
                        <div class="leading-tight">
                            <div class="font-black">4. Monev (Evaluasi)</div>
                            <div class="text-[10px] text-blue-200/80 font-medium">Monev & Bukti Dukung</div>
                        </div>
                    </button>
                </div>

                <!-- Bottom Action Pill Buttons (Sesuai Referensi & Dokumentasi BPS) -->
                <div class="pt-4 pb-1 space-y-2 border-t border-white/15 mt-6">
                    <button type="button" onclick="openMetadataModal()" class="w-full py-2 px-3 rounded-xl border border-white/40 hover:bg-white/15 hover:border-white text-white text-[11px] font-bold transition text-center shadow-2xs cursor-pointer block">
                        Metadata Statistik
                    </button>
                    <button type="button" onclick="openAgenDesaModal()" class="w-full py-2 px-3 rounded-xl border border-white/40 hover:bg-white/15 hover:border-white text-white text-[11px] font-bold transition text-center shadow-2xs cursor-pointer block">
                        Informasi Agen Desa (Statistik)
                    </button>
                    <button type="button" onclick="openPstModal()" class="w-full py-2 px-3 rounded-xl border border-white/40 hover:bg-white/15 hover:border-white text-white text-[11px] font-bold transition text-center shadow-2xs cursor-pointer block">
                        Hubungi Pelayanan Terpadu (PST)
                    </button>
                </div>
            </aside>

            <!-- ========================================================================= -->
            <!-- RIGHT MAIN CONTENT (BERISI KEEMPAT VIEW SESUAI DESAIN WIREFRAME)            -->
            <!-- ========================================================================= -->
            <div class="flex-1 p-3 sm:p-5 lg:p-6 overflow-x-hidden space-y-4">

                <!-- ===================================================================== -->
                <!-- 1. BERANDA (DASHBOARD UTAMA & POTENSI DESA)                            -->
                <!-- ===================================================================== -->
                <div id="view-dashboard" class="menu-view-container space-y-4 animate-in fade-in duration-200">
                    
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
                                    <span>✏️</span>
                                    <span>Edit Data Dasar</span>
                                </button>
                            </div>
                        </div>

                        <!-- Checkbox Filter: Tampilkan ke Publik / Hanya Internal BPS & Pemda -->
                        <div class="pt-2 border-t border-slate-100 flex flex-wrap items-center gap-4 text-xs font-bold text-slate-700 select-none">
                            <label class="flex items-center gap-2 cursor-pointer hover:text-[#005ea6] transition">
                                <input type="checkbox" id="chkPublik" checked onchange="togglePublicFilter(this)" class="w-4 h-4 text-[#005ea6] rounded border-slate-300 focus:ring-[#005ea6] cursor-pointer">
                                <span>☑️ Tampilkan ke Publik</span>
                            </label>
                            <span class="text-slate-300 hidden sm:inline">|</span>
                            <label class="flex items-center gap-2 cursor-pointer hover:text-[#005ea6] transition">
                                <input type="checkbox" id="chkInternal" onchange="toggleInternalFilter(this)" class="w-4 h-4 text-amber-600 rounded border-slate-300 focus:ring-amber-500 cursor-pointer">
                                <span class="text-slate-500">🔒 Hanya Internal BPS & Pemda (Seleksi Potensi & Data)</span>
                            </label>
                        </div>
                    </div>

                    <!-- 4 KPI Cards (Total Penduduk, Jumlah KK, Kemiskinan, Kasus Stunting) -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                        <!-- Card 1: Total Penduduk -->
                        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col justify-between hover:shadow-md transition">
                            <div class="flex items-center justify-between text-xs text-slate-500 font-bold">
                                <span>Total Penduduk:</span>
                                <span class="p-1.5 rounded-lg bg-blue-50 text-[#005ea6] text-sm">👥</span>
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
                                <span class="p-1.5 rounded-lg bg-emerald-50 text-emerald-600 text-sm">🏠</span>
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
                                <span class="p-1.5 rounded-lg bg-amber-50 text-amber-600 text-sm">📈</span>
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
                                <span class="p-1.5 rounded-lg bg-rose-50 text-rose-600 text-sm">👶</span>
                            </div>
                            <div class="mt-2">
                                <span id="dashKpiStunting" class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">3</span>
                                <span class="text-xs font-bold text-slate-500 ml-1">Balita</span>
                            </div>
                        </div>
                    </div>

                    <!-- Middle Row: Peta Tematik Geospasial Wilayah & Piramida Penduduk -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
                        <!-- Left: Peta Tematik Geospasial Wilayah (Dusun & RT) -->
                        <div class="lg:col-span-7 bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                                    <div>
                                        <h4 class="font-black text-slate-900 text-sm sm:text-base">Peta Tematik Geospasial Wilayah (Dusun & RT)</h4>
                                        <p class="text-[11px] text-slate-400 mt-0.5">Integrasi Sebaran Dusun, Batas Wilayah & Titik Kerawanan Sosial BPS</p>
                                    </div>
                                    <span class="text-[10px] font-black text-emerald-800 bg-emerald-100 px-2.5 py-1 rounded-full border border-emerald-300">
                                        WebGIS SDI
                                    </span>
                                </div>
                                <div class="relative w-full h-80 rounded-xl overflow-hidden mt-3 border border-slate-200 bg-slate-50">
                                    <div id="thematicVillageMap" class="w-full h-full"></div>
                                    <div class="absolute bottom-2 left-2 z-10 bg-white/95 backdrop-blur-xs p-2 rounded-lg border border-slate-200 shadow-md flex flex-col gap-1 text-[9px] font-black text-slate-700">
                                        <div class="w-32 h-2 rounded-full bg-gradient-to-r from-[#fef08a] via-[#f97316] to-[#dc2626]"></div>
                                        <div class="flex justify-between w-32 font-bold text-[8px] text-slate-500">
                                            <span>Rendah</span>
                                            <span>Kepadatan RT</span>
                                            <span>Tinggi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                                <span>Sumber: BPS Satu Data Indonesia • Kab. Kolaka Utara</span>
                                <button type="button" onclick="resetThematicMapView()" class="font-bold text-[#005ea6] hover:underline cursor-pointer">Pusatkan Peta ⟳</button>
                            </div>
                        </div>

                        <!-- Right: Piramida Penduduk & Status Kesejahteraan -->
                        <div class="lg:col-span-5 bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                                    <div>
                                        <h4 class="font-black text-slate-900 text-sm sm:text-base">Piramida Penduduk & Status Kesejahteraan</h4>
                                        <p class="text-[11px] text-slate-400 mt-0.5">Struktur Demografi Berdasarkan Kelompok Umur & Jenis Kelamin</p>
                                    </div>
                                    <div class="flex items-center gap-2 text-[10px] font-extrabold">
                                        <span class="flex items-center gap-1 text-[#005ea6]"><span class="w-2.5 h-2.5 rounded-full bg-[#005ea6]"></span> Laki-laki</span>
                                        <span class="flex items-center gap-1 text-[#e11d48]"><span class="w-2.5 h-2.5 rounded-full bg-[#e11d48]"></span> Perempuan</span>
                                    </div>
                                </div>
                                <div id="piramidaChartContainer" class="w-full pt-2 h-80 flex flex-col justify-center"></div>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">
                                <span>Regsosek & Monografi Sektoral Desa 2026</span>
                                <span class="font-bold text-slate-600">Rasio Jenis Kelamin: 98,5%</span>
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
                <!-- 2. PROFIL DESA (MONOGRAFI, SDM APARAT & POTENSI UNGGULAN)             -->
                <!-- ===================================================================== -->
                <div id="view-tentang" class="menu-view-container hidden space-y-4 animate-in fade-in duration-200">
                    
                    <!-- HERO BANNER TENTANG DESA (SESUAI GAMBAR LAMPIRAN USER: KEDAULATAN DATA & KEASRIAN WILAYAH) -->
                    <div class="relative w-full rounded-3xl overflow-hidden shadow-xl border border-slate-700/60 bg-slate-950 text-white min-h-[300px] sm:min-h-[340px] flex flex-col justify-between p-6 sm:p-10 select-none">
                        <!-- Nature Background Image with Rich Dark Gradient -->
                        <div class="absolute inset-0 z-0">
                            <img id="heroTentangBg" src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85" alt="Pesona Alam Desa Kalu Kaluku" class="w-full h-full object-cover object-center filter brightness-[0.45]">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/60 to-transparent"></div>
                        </div>

                        <!-- Decorative Corner Foliage Graphic / Leaves Shapes (Sesuai Lampiran) -->
                        <div class="absolute top-2 left-2 z-10 pointer-events-none opacity-85 animate-float-leaf">
                            <svg class="w-20 h-20 sm:w-28 sm:h-28 text-emerald-400" viewBox="0 0 100 100" fill="currentColor">
                                <path d="M10 20 Q50 0 80 40 Q40 80 10 20 Z" opacity="0.6"/>
                                <path d="M0 35 Q40 10 70 60 Q30 90 0 35 Z" opacity="0.8"/>
                                <path d="M25 10 Q60 5 85 50 Q45 85 25 10 Z" opacity="0.4"/>
                            </svg>
                        </div>
                        <div class="absolute top-2 right-2 z-10 pointer-events-none opacity-85 scale-x-[-1] animate-float-leaf" style="animation-delay: -3s;">
                            <svg class="w-20 h-20 sm:w-28 sm:h-28 text-emerald-400" viewBox="0 0 100 100" fill="currentColor">
                                <path d="M10 20 Q50 0 80 40 Q40 80 10 20 Z" opacity="0.6"/>
                                <path d="M0 35 Q40 10 70 60 Q30 90 0 35 Z" opacity="0.8"/>
                                <path d="M25 10 Q60 5 85 50 Q45 85 25 10 Z" opacity="0.4"/>
                            </svg>
                        </div>

                        <!-- Top Pills -->
                        <div class="relative z-10 flex flex-col items-center gap-2 text-center">
                            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-900/80 backdrop-blur-md border border-white/20 text-xs font-bold text-slate-200 shadow-md">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>• Sesi Aktif Terverifikasi BPS •</span>
                                <span id="heroBannerDesaTag" class="text-amber-400 font-extrabold">Dashboard & Profil Desa Kalu Kaluku</span>
                            </div>
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-950/80 backdrop-blur-md border border-emerald-500/40 text-[11px] font-black uppercase tracking-wider text-emerald-300 shadow-sm mt-1">
                                <span>🌿</span>
                                <span>KEDAULATAN DATA & KEASRIAN WILAYAH</span>
                            </div>
                        </div>

                        <!-- Center Hero Typography (Sesuai Persis Lampiran Media) -->
                        <div class="relative z-10 my-4 text-center max-w-3xl mx-auto space-y-2">
                            <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight drop-shadow-md">
                                Jelajahi Pesona Alam & Data Resmi
                            </h1>
                            <div id="heroBannerDesaName" class="text-3xl sm:text-5xl lg:text-6xl font-serif italic font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 via-teal-200 to-amber-200 drop-shadow-lg pb-1">
                                Desa Kalu Kaluku
                            </div>
                            <p class="text-xs sm:text-sm text-slate-200/90 max-w-2xl mx-auto leading-relaxed font-medium pt-1 drop-shadow-sm">
                                Dokumentasi visual lanskap alam, potensi agrikultur, kearifan lokal, serta transformasi statistik sektoral desa mandiri binaan BPS.
                            </p>
                        </div>

                        <!-- Bottom Metadata Indicators inside Banner -->
                        <div class="relative z-10 flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-white/15 text-xs text-slate-300">
                            <div class="flex items-center gap-3">
                                <span class="flex items-center gap-1">📍 <span id="heroBannerKec">Kec. Kodeoha, Kab. Kolaka Utara</span></span>
                                <span class="hidden sm:inline">•</span>
                                <span class="flex items-center gap-1">📊 <span id="heroBannerKategori">Pilot Utama Mandiri (Nilai 85%)</span></span>
                            </div>
                            <button type="button" onclick="downloadProfilDesaPdf()" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-black text-xs transition shadow-md flex items-center gap-1.5 cursor-pointer">
                                <span>📥 Unduh Profil PDF</span>
                            </button>
                        </div>
                    </div>

                    <!-- Content Top Header: Title & Download Action -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-xl">🏛️</span>
                                <h2 id="desaTitle" class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Profil, Monografi, & Potensi Desa Kalu Kaluku</h2>
                            </div>
                            <p class="text-xs text-slate-500 mt-0.5">Dokumentasi Batas Administrasi Wilayah, Standarisasi Aparatur Desa & Potensi Sektoral Unggulan</p>
                        </div>
                        <button type="button" onclick="downloadProfilDesaPdf()" class="px-4 py-2.5 rounded-xl bg-[#005ea6] hover:bg-[#004e8a] text-white font-black text-xs shadow-xs transition flex items-center gap-2 cursor-pointer shrink-0">
                            <span>📥</span>
                            <span>UNDUH / DOWNLOAD PROFIL DESA (PDF)</span>
                        </button>
                    </div>

                    <!-- Section 1: Luas Wilayah & Batas Administrasi Card (Matching Wireframe) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <h4 class="font-black text-slate-900 text-sm sm:text-base flex items-center gap-2">
                                <span>📍</span>
                                <span>Luas Wilayah & Batas Administrasi Desa</span>
                            </h4>
                            <span class="px-2.5 py-1 rounded-full bg-blue-50 text-[#005ea6] text-[11px] font-black border border-blue-200">
                                Data Resmi BPS & Kemendagri
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Col 1: Luas Wilayah -->
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-extrabold text-slate-500">Luas Wilayah:</span>
                                    <div class="text-2xl font-black text-slate-900 mt-1">18,45 <span class="text-xs font-bold text-slate-500">km²</span></div>
                                </div>
                                <div class="text-[11px] text-slate-500 mt-2 space-y-0.5">
                                    <div>• Kawasan Perkebunan: <b>12,20 km²</b></div>
                                    <div>• Permukiman & Fasilitas: <b>3,85 km²</b></div>
                                    <div>• Hutan / Konservasi: <b>2,40 km²</b></div>
                                </div>
                            </div>

                            <!-- Col 2: Batas Administrasi -->
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80">
                                <span class="text-xs font-extrabold text-slate-500">Batas Administrasi:</span>
                                <div class="text-xs text-slate-700 mt-2 space-y-1.5 font-medium">
                                    <div class="flex items-start gap-1.5"><span class="font-black text-[#005ea6] w-12 shrink-0">Utara:</span> <span>Desa Mala Mala & Kec. Lasusua (Akses Kantor BPS)</span></div>
                                    <div class="flex items-start gap-1.5"><span class="font-black text-[#005ea6] w-12 shrink-0">Selatan:</span> <span>Desa Lametuna & Desa Awo</span></div>
                                    <div class="flex items-start gap-1.5"><span class="font-black text-[#005ea6] w-12 shrink-0">Barat:</span> <span>Pesisir Teluk Bone / Selat Bone (Perikanan Tangkap)</span></div>
                                    <div class="flex items-start gap-1.5"><span class="font-black text-[#005ea6] w-12 shrink-0">Timur:</span> <span>Perkebunan Kakao / Perbukitan Kodeoha</span></div>
                                </div>
                            </div>

                            <!-- Col 3: Dusun & RT -->
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-extrabold text-slate-500">Struktur Wilayah:</span>
                                    <div class="text-2xl font-black text-slate-900 mt-1">4 Dusun & 12 RT</div>
                                </div>
                                <div class="text-[11px] text-slate-500 mt-2 space-y-0.5">
                                    <div>• Dusun I Kalu Kaluku (3 RT)</div>
                                    <div>• Dusun II Toddopuli (3 RT)</div>
                                    <div>• Dusun III Mattirodeceng (3 RT)</div>
                                    <div>• Dusun IV Bunga Eja (3 RT)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Standardized SDM / Aparat Desa (Hierarchical Tree Organigram) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-slate-100">
                            <div>
                                <h4 class="font-black text-slate-900 text-sm sm:text-base flex items-center gap-2">
                                    <span>👥</span>
                                    <span>Standardized SDM / Aparat Desa</span>
                                </h4>
                                <p class="text-xs text-slate-500 mt-0.5">Struktur Organisasi Pemerintahan Desa & Status Sertifikasi Pengelolaan Data Statistik SDI</p>
                            </div>
                            <button type="button" onclick="openEditAparatModal()" class="px-3.5 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1.5 cursor-pointer">
                                <span>✏️</span>
                                <span>Edit Aparat Desa</span>
                            </button>
                        </div>

                        <!-- Organigram Diagram -->
                        <div class="space-y-4">
                            <!-- Top: Kepala Desa (Center) -->
                            <div class="flex justify-center">
                                <div class="w-full max-w-sm p-3.5 rounded-2xl bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 text-center shadow-xs">
                                    <div class="w-12 h-12 mx-auto rounded-full bg-[#005ea6] text-white flex items-center justify-center font-black text-base shadow-xs mb-1.5">
                                        KD
                                    </div>
                                    <div id="aparatKadesName" class="font-black text-slate-900 text-sm">H. Syamsul Bahri, S.Sos</div>
                                    <div class="text-xs font-bold text-[#005ea6]">Kepala Desa</div>
                                    <span class="inline-block mt-2 px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-black border border-emerald-300">
                                        Update Status (Terverifikasi BPS)
                                    </span>
                                </div>
                            </div>

                            <!-- Connector Line -->
                            <div class="w-0.5 h-4 bg-slate-300 mx-auto"></div>

                            <!-- Level 2: Sekretaris Desa (Center) -->
                            <div class="flex justify-center">
                                <div class="w-full max-w-sm p-3.5 rounded-2xl bg-white border border-slate-300 text-center shadow-xs">
                                    <div class="w-10 h-10 mx-auto rounded-full bg-slate-700 text-white flex items-center justify-center font-bold text-xs shadow-xs mb-1.5">
                                        SD
                                    </div>
                                    <div id="aparatSekdesName" class="font-black text-slate-900 text-sm">Muh. Ridwan, S.AP</div>
                                    <div class="text-xs font-bold text-slate-600">Sekretaris Desa (Koordinator SDI)</div>
                                    <span class="inline-block mt-2 px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-black border border-emerald-300">
                                        Update Status: Selesai BPS
                                    </span>
                                </div>
                            </div>

                            <!-- Connector Line -->
                            <div class="w-0.5 h-4 bg-slate-300 mx-auto"></div>

                            <!-- Level 3: 4 Staff / Agen Data Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                                <!-- Staff 1 -->
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-center flex flex-col justify-between">
                                    <div>
                                        <div class="w-9 h-9 mx-auto rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-xs mb-1.5">
                                            AR
                                        </div>
                                        <div class="font-black text-slate-900 text-xs">Andi Rahmawati, S.E</div>
                                        <div class="text-[11px] text-slate-500 font-medium">Kaur Keuangan</div>
                                    </div>
                                    <span class="mt-2.5 px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[9px] font-extrabold border border-emerald-200">
                                        Update Status: Selesai (SDI)
                                    </span>
                                </div>

                                <!-- Staff 2 -->
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-center flex flex-col justify-between">
                                    <div>
                                        <div class="w-9 h-9 mx-auto rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xs mb-1.5">
                                            BP
                                        </div>
                                        <div class="font-black text-slate-900 text-xs">Baharuddin, S.Pd</div>
                                        <div class="text-[11px] text-slate-500 font-medium">Kaur Perencanaan (Agen Statistik)</div>
                                    </div>
                                    <span class="mt-2.5 px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[9px] font-extrabold border border-emerald-200">
                                        Update Status: Selesai BPS
                                    </span>
                                </div>

                                <!-- Staff 3 -->
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-center flex flex-col justify-between">
                                    <div>
                                        <div class="w-9 h-9 mx-auto rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold text-xs mb-1.5">
                                            RS
                                        </div>
                                        <div class="font-black text-slate-900 text-xs">Rosmini, S.Kom</div>
                                        <div class="text-[11px] text-slate-500 font-medium">Kasi Pelayanan (Operator WebGIS)</div>
                                    </div>
                                    <span class="mt-2.5 px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[9px] font-extrabold border border-emerald-200">
                                        Update Status: Selesai (Excel)
                                    </span>
                                </div>

                                <!-- Staff 4 -->
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-center flex flex-col justify-between">
                                    <div>
                                        <div class="w-9 h-9 mx-auto rounded-full bg-amber-600 text-white flex items-center justify-center font-bold text-xs mb-1.5">
                                            JA
                                        </div>
                                        <div class="font-black text-slate-900 text-xs">Jodi Asrul</div>
                                        <div class="text-[11px] text-slate-500 font-medium">Kasi Pemerintahan</div>
                                    </div>
                                    <span class="mt-2.5 px-2 py-0.5 rounded-full bg-blue-100 text-blue-800 text-[9px] font-extrabold border border-blue-200">
                                        Update Status: Terdata
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Potensi Unggulan Desa (Kakao & UMKM) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <h4 class="font-black text-slate-900 text-sm sm:text-base flex items-center gap-2">
                                <span>🌟</span>
                                <span>Potensi Unggulan Desa</span>
                            </h4>
                            <span class="text-xs font-bold text-slate-500">Sektor Basis & Komoditas Ekspor Kolaka Utara</span>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <!-- Potensi 1: Pertanian & Perkebunan (Sentra Kakao) -->
                            <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50/70 hover:bg-white hover:shadow-md transition flex flex-col sm:flex-row gap-4 items-center">
                                <div class="w-full sm:w-44 h-36 rounded-xl overflow-hidden shrink-0 shadow-inner bg-slate-200">
                                    <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=400&q=80" alt="Kakao" class="w-full h-full object-cover">
                                </div>
                                <div class="space-y-1.5 flex-1">
                                    <span class="px-2 py-0.5 rounded-md bg-amber-100 text-amber-900 text-[10px] font-black uppercase">Sentra Kakao</span>
                                    <h5 class="font-black text-slate-900 text-sm leading-snug">Pertanian & Perkebunan (Sentra Kakao)</h5>
                                    <div class="text-xs text-slate-600 space-y-1">
                                        <div>• <b>Sentra: Kakao Rakyat</b></div>
                                        <div>• Luas Lahan: <b>480 Hektar</b></div>
                                        <div>• Produksi: <b>385 Ton / Tahun</b></div>
                                        <div>• Kelompok Tani: <b>8 Poktan Mandiri</b></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Potensi 2: UMKM & Ekowisata -->
                            <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50/70 hover:bg-white hover:shadow-md transition flex flex-col sm:flex-row gap-4 items-center">
                                <div class="w-full sm:w-44 h-36 rounded-xl overflow-hidden shrink-0 shadow-inner bg-slate-200">
                                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=400&q=80" alt="Ekowisata" class="w-full h-full object-cover">
                                </div>
                                <div class="space-y-1.5 flex-1">
                                    <span class="px-2 py-0.5 rounded-md bg-emerald-100 text-emerald-900 text-[10px] font-black uppercase">UMKM & Wisata</span>
                                    <h5 class="font-black text-slate-900 text-sm leading-snug">UMKM & Ekowisata Alam Desa</h5>
                                    <div class="text-xs text-slate-600 space-y-1">
                                        <div>• <b>Sentra: 1.547 Jiwa Terkoneksi</b></div>
                                        <div>• <b>UMKM: 5 Unit Usaha Unggulan / KWT</b></div>
                                        <div>• Olahan Cokelat & Kopi Robusta Kolut</div>
                                        <div>• Destinasi Ekowisata Agro Petik Kakao</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2 flex justify-center">
                            <button type="button" onclick="downloadProfilDesaPdf()" class="px-6 py-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-black text-xs shadow-md transition flex items-center gap-2 cursor-pointer">
                                <span>[ UNDUH / DOWNLOAD PROFIL DESA (PDF) ]</span>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- ===================================================================== -->
                <!-- 3. PEMBELAJARAN (LMS DESA CANTIK - STANDARDISASI SDM)                 -->
                <!-- ===================================================================== -->
                <div id="view-pembelajaran" class="menu-view-container hidden space-y-4 animate-in fade-in duration-200">
                    
                    <!-- Content Top Header: Title & BPS Badge -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold text-lg shadow-xs shrink-0">
                                📖
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">LMS - Pembelajaran Aparat Desa (Standardisasi SDM)</h2>
                                    <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-black text-xs border border-emerald-300">
                                        BPS Verified
                                    </span>
                                </div>
                                <p class="text-xs text-slate-500 mt-0.5">Program Penguatan Kapasitas Statistik Sektoral Aparatur Desa Cinta Statistik BPS RI</p>
                            </div>
                        </div>
                    </div>

                    <!-- Section 1: TAHAPAN BELAJAR MANDIRI (Step 1 Pre-test, Step 2 Video, Step 3 Post-test) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-slate-100">
                            <div>
                                <h4 class="font-black text-slate-900 text-sm sm:text-base flex items-center gap-2">
                                    <span>🎯</span>
                                    <span>TAHAPAN BELAJAR MANDIRI</span>
                                </h4>
                                <p class="text-xs text-slate-500 mt-0.5">Selesaikan tahapan secara berurutan untuk mendapatkan Sertifikat Kompetensi Agen Statistik</p>
                            </div>
                            <button type="button" onclick="unlockAllLmsModules()" class="px-3.5 py-1.5 rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-300 text-xs font-black transition flex items-center gap-1.5 cursor-pointer">
                                <span>🔓</span>
                                <span>Unlock semua menu</span>
                            </button>
                        </div>

                        <!-- 3 Sequential Step Cards Grid -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
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
                                        <iframe id="mainVideoIframe" class="w-full h-full" src="https://www.youtube.com/embed/6iR8V5bBw64?enablejsapi=1&rel=0" title="Video Edukasi Desa Cantik BPS" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        
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
                <!-- 4. MONITORING & EVALUASI (MONEV - SISTEM MONEV & KELENGKAPAN)         -->
                <!-- ===================================================================== -->
                <div id="view-monev" class="menu-view-container hidden space-y-4 animate-in fade-in duration-200">
                    
                    <!-- Content Top Header: Title -->
                    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-indigo-600 text-white flex items-center justify-center font-bold text-lg shadow-xs shrink-0">
                                📈
                            </div>
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Sistem Monev & Kelengkapan Pembinaan</h2>
                                <p class="text-xs text-slate-500 mt-0.5">Monitoring Evaluasi Progres Pembinaan Statistik Sektoral & Portofolio Bukti Dukung Desa Cantik</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-black border border-emerald-300">
                                Tahap 3 Aktif (Pengolahan)
                            </span>
                        </div>
                    </div>

                    <!-- Section 1: TIMELINE PEMBINAAN DESA CANTIK (Chevron Stepper Progress Bar) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                        <div>
                            <h4 class="font-black text-slate-900 text-sm sm:text-base flex items-center gap-2">
                                <span>⏱️</span>
                                <span>TIMELINE PEMBINAAN DESA CANTIK</span>
                            </h4>
                            <p class="text-xs text-slate-400 mt-0.5">(Persiapan -> Pengumpulan Data -> Pengolahan -> Publikasi)</p>
                        </div>

                        <!-- 4-Phase Chevron Stepper -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 pt-1 select-none">
                            <!-- Step 1: Persiapan (100% Selesai) -->
                            <div class="p-3.5 rounded-xl bg-emerald-600 text-white shadow-xs relative overflow-hidden flex flex-col justify-between">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-black">1. Persiapan</span>
                                    <span class="text-sm">✓</span>
                                </div>
                                <div class="mt-2">
                                    <div class="text-[10px] text-emerald-100 font-medium">Sosialisasi & SK Agen</div>
                                    <div class="w-full bg-emerald-900/40 rounded-full h-1.5 mt-1.5 overflow-hidden">
                                        <div class="bg-white h-full rounded-full" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Pengumpulan Data (100% Selesai) -->
                            <div class="p-3.5 rounded-xl bg-emerald-600 text-white shadow-xs relative overflow-hidden flex flex-col justify-between">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-black">2. Pengumpulan Data</span>
                                    <span class="text-sm">✓</span>
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
                                    <div class="text-[10px] text-blue-100 font-medium">Validasi & Entri SDI</div>
                                    <div class="w-full bg-blue-900/40 rounded-full h-1.5 mt-1.5 overflow-hidden">
                                        <div class="bg-amber-400 h-full rounded-full" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: Publikasi (Tahap Akhir) -->
                            <div class="p-3.5 rounded-xl bg-slate-100 text-slate-600 border border-slate-200 relative overflow-hidden flex flex-col justify-between">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-black text-slate-700">4. Publikasi</span>
                                    <span class="text-xs">🔒</span>
                                </div>
                                <div class="mt-2">
                                    <div class="text-[10px] text-slate-400 font-medium">Rilis BRS & WebGIS</div>
                                    <div class="w-full bg-slate-200 rounded-full h-1.5 mt-1.5 overflow-hidden">
                                        <div class="bg-slate-400 h-full rounded-full" style="width: 25%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Split Columns (Kelengkapan Bukti Dukung Internal & Verifikasi BPS) -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
                        <!-- Left Col: KELENGKAPAN BUKTI DUKUNG INTERNAL (MONEV) (8 Cols) -->
                        <div class="lg:col-span-8 bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-slate-100">
                                <div>
                                    <h4 class="font-black text-slate-900 text-sm sm:text-base flex items-center gap-2">
                                        <span>📁</span>
                                        <span>KELENGKAPAN BUKTI DUKUNG INTERNAL (MONEV)</span>
                                    </h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Portofolio Pelaksanaan Pembinaan Statistik Sektoral Tingkat Desa & Kabupaten</p>
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
                                    <span>➕ Unggah Dokumen Bukti Dukung Baru</span>
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
                                <div class="mt-4 space-y-2 text-xs">
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
                                            <span>Pemanfaatan WebGIS & Publikasi</span>
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
                                💡 <b>Rekomendasi BPS Kolut:</b> Desa Kalu Kaluku memenuhi seluruh kriteria Desa Cantik Kategori Mandiri tahun 2026.
                            </div>
                        </div>
                    </div>

                </div>

            </div>
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
        let currentTargetVillage = 'kalukaluku';
        let currentVillageKey = 'kalukaluku';
        let currentNavMenu = 'dashboard';
        let currentPemTab = 'panduan-excel';
        let currentAnalitikDesa = 'kalukaluku';
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
            } else if (docType === 'brs') {
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
                iframe.setAttribute('src', 'https://www.youtube.com/embed/6iR8V5bBw64?autoplay=1&enablejsapi=1&rel=0');
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
                iframe.src = 'https://www.youtube.com/embed/6iR8V5bBw64?autoplay=1&enablejsapi=1&rel=0';
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
            kalukaluku: {
                title: "Desa Kalu Kaluku",
                sub: "Kecamatan Kodeoha • Kabupaten Kolaka Utara",
                avatar: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                kategori: "Pilot Utama Mandiri (Nilai 85%)",
                rep: "Pemerintah Desa Kalu Kaluku",
                desc: "Sentra Kakao Rakyat, Perkebunan, dan Pesisir Teluk Bone binaan BPS Kabupaten Kolaka Utara.",
                luas: "18,45 km²",
                dusunCount: 4,
                rtCount: 12,
                komoditas: "Kakao, Kelapa, Perikanan",
                pop: "4.150 Jiwa",
                period: "2026",
                umkm: "24 Unit",
                agri: "Sentra Kakao 480 Ha",
                catatanBps: "Rekomendasi BPS: Kategori Mandiri dengan kualitas data monografi dan SDI tertinggi di Kecamatan Kodeoha.",
                batas: {
                    utara: "Desa Mala Mala / Koridor Kantor BPS Lasusua",
                    selatan: "Desa Lametuna & Desa Awo",
                    barat: "Pesisir Teluk Bone",
                    timur: "Perbukitan Perkebunan Kodeoha"
                }
            },
            awo: {
                title: "Desa Awo",
                sub: "Kecamatan Kodeoha • Kabupaten Kolaka Utara",
                avatar: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                kategori: "Desa Berkembang (Nilai 78%)",
                rep: "Pemerintah Desa Awo",
                desc: "Kawasan agrikultur komoditas cengkeh, nilam, dan tanaman pangan pegunungan.",
                luas: "16,20 km²",
                dusunCount: 4,
                rtCount: 10,
                komoditas: "Cengkeh, Nilam, Kakao",
                pop: "3.240 Jiwa",
                period: "2026",
                umkm: "18 Unit",
                agri: "Cengkeh & Nilam 320 Ha",
                catatanBps: "Rekomendasi BPS: Terus tingkatkan kelengkapan NIK kependudukan dalam register monografi.",
                batas: {
                    utara: "Desa Kalu Kaluku",
                    selatan: "Desa Sawangaoha",
                    barat: "Desa Lametuna",
                    timur: "Kawasan Hutan Lindung"
                }
            },
            kamisi: {
                title: "Desa Kamisi",
                sub: "Kecamatan Kodeoha • Kabupaten Kolaka Utara",
                avatar: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                kategori: "Desa Rintisan (Nilai 70%)",
                rep: "Pemerintah Desa Kamisi",
                desc: "Kawasan hortikultura sayuran dataran tinggi dan peternakan sapi rakyat.",
                luas: "14,80 km²",
                dusunCount: 3,
                rtCount: 8,
                komoditas: "Hortikultura, Palawija",
                pop: "2.180 Jiwa",
                period: "2026",
                umkm: "12 Unit",
                agri: "Hortikultura 190 Ha",
                catatanBps: "Rekomendasi BPS: Standardisasi tabel DTKS dan bansos berbasis NIK 16 digit.",
                batas: {
                    utara: "Desa Koroha",
                    selatan: "Kecamatan Tiwu",
                    barat: "Desa Sawangaoha",
                    timur: "Pegunungan Kodeoha"
                }
            },
            koroha: {
                title: "Desa Koroha",
                sub: "Kecamatan Kodeoha • Kabupaten Kolaka Utara",
                avatar: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                kategori: "Desa Berkembang (Nilai 75%)",
                rep: "Pemerintah Desa Koroha",
                desc: "Sentra lumbung padi sawah irigasi teknis dan perikanan air tawar Kodeoha.",
                luas: "15,50 km²",
                dusunCount: 3,
                rtCount: 9,
                komoditas: "Padi Sawah, Jagung, Ikan Air Tawar",
                pop: "2.890 Jiwa",
                period: "2026",
                umkm: "16 Unit",
                agri: "Lahan Padi Sawah 280 Ha",
                catatanBps: "Rekomendasi BPS: Pembinaan digitalisasi data hasil panen gabah petani.",
                batas: {
                    utara: "Desa Lametuna",
                    selatan: "Desa Kamisi",
                    barat: "Pesisir Teluk Bone",
                    timur: "Desa Awo"
                }
            },
            lametuna: {
                title: "Desa Lametuna",
                sub: "Kecamatan Kodeoha • Kabupaten Kolaka Utara",
                avatar: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                kategori: "Desa Mandiri (Nilai 82%)",
                rep: "Pemerintah Desa Lametuna",
                desc: "Kawasan pesisir dermaga nelayan tradisional dan budidaya rumput laut Teluk Bone.",
                luas: "12,90 km²",
                dusunCount: 4,
                rtCount: 11,
                komoditas: "Perikanan Tangkap, Rumput Laut",
                pop: "3.750 Jiwa",
                period: "2026",
                umkm: "22 Unit",
                agri: "Sentra Perikanan & Pesisir",
                catatanBps: "Rekomendasi BPS: Pemutakhiran geospasial tambak dan armada perahu nelayan.",
                batas: {
                    utara: "Desa Kalu Kaluku",
                    selatan: "Desa Koroha",
                    barat: "Pesisir Teluk Bone",
                    timur: "Desa Awo"
                }
            },
            sawangaoha: {
                title: "Desa Sawangaoha",
                sub: "Kecamatan Kodeoha • Kabupaten Kolaka Utara",
                avatar: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=200&q=80",
                heroBg: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                photo: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1800&q=85",
                kategori: "Desa Rintisan (Nilai 68%)",
                rep: "Pemerintah Desa Sawangaoha",
                desc: "Kawasan perkebunan kopi robusta rakyat dan hasil hutan bukan kayu madu alam.",
                luas: "17,10 km²",
                dusunCount: 3,
                rtCount: 8,
                komoditas: "Kopi Robusta, Madu Alam",
                pop: "2.570 Jiwa",
                period: "2026",
                umkm: "14 Unit",
                agri: "Kopi Robusta 210 Ha",
                catatanBps: "Rekomendasi BPS: Peningkatan kapasitas Agen Statistik Desa dalam pengolahan Excel.",
                batas: {
                    utara: "Desa Awo",
                    selatan: "Desa Kamisi",
                    barat: "Desa Koroha",
                    timur: "Kawasan Hutan Lindung"
                }
            }
        };

        // Aliases for compatibility
        villagesData.cijati = villagesData.kalukaluku;
        villagesData.sukamaju = villagesData.awo;
        villagesData.mekarwangi = villagesData.kamisi;
        villagesData.tegalasri = villagesData.koroha;
        villagesData.harapan = villagesData.lametuna;
        villagesData.lestari = villagesData.sawangaoha;

        // Extended BPS Desa Cantik Sectoral & Micro Dataset (6 Desa di Kodeoha - Podes 2025 Kolaka Utara)
        const descanSectoralData = {
            kalukaluku: {
                kpi: { pop: "4.150", kk: "1.120", sexRatio: "98,5%", p3ke: "3,2%", stunting: "3 Balita", stuntingVal: 3, rasio: "42,5%", pre: "112" },
                desil: { d1: 25.9, d2: 18.7, d3: 21.1, d4: 34.3 },
                pekerjaan: [
                    { name: "Petani Kakao Rakyat", pct: 45 },
                    { name: "Wiraswasta / IKM", pct: 26 },
                    { name: "Nelayan & Budidaya Pesisir", pct: 18 },
                    { name: "IRT", pct: 7 },
                    { name: "Belum/Tidak Bekerja", pct: 4 }
                ],
                center: [-3.420, 121.005],
                dusun: [
                    { id: "dusun1", name: "Dusun I Kalu Kaluku", pop: 1180, kk: 320, pre: 28, kerawanan: "Sedang", lat: -3.418, lng: 121.002 },
                    { id: "dusun2", name: "Dusun II Toddopuli", pop: 1040, kk: 280, pre: 32, kerawanan: "Tinggi", lat: -3.422, lng: 121.008 },
                    { id: "dusun3", name: "Dusun III Mattirodeceng", pop: 980, kk: 260, pre: 25, kerawanan: "Rendah", lat: -3.424, lng: 121.003 },
                    { id: "dusun4", name: "Dusun IV Bunga Eja", pop: 950, kk: 260, pre: 27, kerawanan: "Rendah", lat: -3.416, lng: 121.009 }
                ],
                piramida: [
                    { age: "65+", m: 110, f: 135 },
                    { age: "60-64", m: 155, f: 170 },
                    { age: "55-59", m: 205, f: 220 },
                    { age: "50-54", m: 265, f: 280 },
                    { age: "45-49", m: 320, f: 335 },
                    { age: "40-44", m: 390, f: 370 },
                    { age: "35-39", m: 440, f: 415 },
                    { age: "30-34", m: 495, f: 460 },
                    { age: "25-29", m: 515, f: 490 },
                    { age: "20-24", m: 465, f: 440 },
                    { age: "15-19", m: 385, f: 365 },
                    { age: "10-14", m: 330, f: 315 },
                    { age: "5-9", m: 275, f: 255 },
                    { age: "0-4", m: 205, f: 190 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 38 },
                    { label: "SD / Sdrjt", val: 82 },
                    { label: "SMP / Sdrjt", val: 148 },
                    { label: "SMA / Sdrjt", val: 122 },
                    { label: "Perguruan Tinggi", val: 65 }
                ]
            },
            awo: {
                kpi: { pop: "3.250", kk: "890", sexRatio: "101,2%", p3ke: "3,8%", stunting: "4 Balita", stuntingVal: 4, rasio: "39,8%", pre: "98" },
                desil: { d1: 22.4, d2: 21.3, d3: 24.1, d4: 32.2 },
                pekerjaan: [
                    { name: "Petani Aren & Gula Merah", pct: 48 },
                    { name: "Penyuling Minyak Nilam", pct: 24 },
                    { name: "Petani Kakao", pct: 16 },
                    { name: "IRT", pct: 8 },
                    { name: "Belum/Tidak Bekerja", pct: 4 }
                ],
                center: [-3.425, 121.012],
                dusun: [
                    { id: "dusun1", name: "Dusun Awo Jaya", pop: 1150, kk: 310, pre: 28, kerawanan: "Sedang", lat: -3.423, lng: 121.010 },
                    { id: "dusun2", name: "Dusun Harapan Nilam", pop: 1100, kk: 300, pre: 34, kerawanan: "Tinggi", lat: -3.427, lng: 121.015 },
                    { id: "dusun3", name: "Dusun Sejahtera Aren", pop: 1000, kk: 280, pre: 30, kerawanan: "Sedang", lat: -3.424, lng: 121.013 }
                ],
                piramida: [
                    { age: "65+", m: 95, f: 120 },
                    { age: "60-64", m: 140, f: 155 },
                    { age: "55-59", m: 190, f: 210 },
                    { age: "50-54", m: 250, f: 270 },
                    { age: "45-49", m: 310, f: 325 },
                    { age: "40-44", m: 375, f: 360 },
                    { age: "35-39", m: 430, f: 400 },
                    { age: "30-34", m: 480, f: 445 },
                    { age: "25-29", m: 505, f: 475 },
                    { age: "20-24", m: 450, f: 425 },
                    { age: "15-19", m: 370, f: 350 },
                    { age: "10-14", m: 315, f: 300 },
                    { age: "5-9", m: 260, f: 245 },
                    { age: "0-4", m: 195, f: 180 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 32 },
                    { label: "SD / Sdrjt", val: 78 },
                    { label: "SMP / Sdrjt", val: 140 },
                    { label: "SMA / Sdrjt", val: 135 },
                    { label: "Perguruan Tinggi", val: 72 }
                ]
            },
            kamisi: {
                kpi: { pop: "3.940", kk: "1.050", sexRatio: "99,1%", p3ke: "4,1%", stunting: "5 Balita", stuntingVal: 5, rasio: "41,0%", pre: "105" },
                desil: { d1: 24.5, d2: 19.8, d3: 22.3, d4: 33.4 },
                pekerjaan: [
                    { name: "Nelayan & Ikan Teri", pct: 46 },
                    { name: "Petani Kakao", pct: 28 },
                    { name: "Wiraswasta / IKM", pct: 15 },
                    { name: "IRT", pct: 7 },
                    { name: "Belum Bekerja", pct: 4 }
                ],
                center: [-3.415, 120.998],
                dusun: [
                    { id: "dusun1", name: "Dusun Kamisi Pesisir", pop: 1350, kk: 360, pre: 34, kerawanan: "Sedang", lat: -3.413, lng: 120.995 },
                    { id: "dusun2", name: "Dusun Teri Bahari", pop: 1320, kk: 350, pre: 41, kerawanan: "Tinggi", lat: -3.417, lng: 121.001 },
                    { id: "dusun3", name: "Dusun Tanjung Baru", pop: 1270, kk: 340, pre: 30, kerawanan: "Rendah", lat: -3.414, lng: 120.999 }
                ],
                piramida: [
                    { age: "65+", m: 100, f: 125 },
                    { age: "60-64", m: 145, f: 160 },
                    { age: "55-59", m: 195, f: 215 },
                    { age: "50-54", m: 255, f: 275 },
                    { age: "45-49", m: 315, f: 330 },
                    { age: "40-44", m: 380, f: 365 },
                    { age: "35-39", m: 435, f: 410 },
                    { age: "30-34", m: 490, f: 450 },
                    { age: "25-29", m: 510, f: 480 },
                    { age: "20-24", m: 460, f: 430 },
                    { age: "15-19", m: 380, f: 360 },
                    { age: "10-14", m: 320, f: 310 },
                    { age: "5-9", m: 270, f: 250 },
                    { age: "0-4", m: 200, f: 185 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 35 },
                    { label: "SD / Sdrjt", val: 80 },
                    { label: "SMP / Sdrjt", val: 145 },
                    { label: "SMA / Sdrjt", val: 128 },
                    { label: "Perguruan Tinggi", val: 68 }
                ]
            },
            koroha: {
                kpi: { pop: "3.350", kk: "910", sexRatio: "100,4%", p3ke: "4,5%", stunting: "4 Balita", stuntingVal: 4, rasio: "40,2%", pre: "108" },
                desil: { d1: 26.1, d2: 18.5, d3: 20.8, d4: 34.6 },
                pekerjaan: [
                    { name: "Petani Kakao Sambung Pucuk", pct: 42 },
                    { name: "Budidaya Rumput Laut", pct: 28 },
                    { name: "Wiraswasta / IKM", pct: 18 },
                    { name: "IRT", pct: 8 },
                    { name: "Belum Bekerja", pct: 4 }
                ],
                center: [-3.418, 121.002],
                dusun: [
                    { id: "dusun1", name: "Dusun Koroha Sentral", pop: 1150, kk: 310, pre: 36, kerawanan: "Sedang", lat: -3.416, lng: 121.000 },
                    { id: "dusun2", name: "Dusun Kakao Jaya", pop: 1120, kk: 300, pre: 42, kerawanan: "Tinggi", lat: -3.420, lng: 121.004 },
                    { id: "dusun3", name: "Dusun Rumput Laut", pop: 1080, kk: 300, pre: 30, kerawanan: "Rendah", lat: -3.419, lng: 121.003 }
                ],
                piramida: [
                    { age: "65+", m: 105, f: 130 },
                    { age: "60-64", m: 150, f: 165 },
                    { age: "55-59", m: 200, f: 218 },
                    { age: "50-54", m: 260, f: 278 },
                    { age: "45-49", m: 318, f: 332 },
                    { age: "40-44", m: 385, f: 368 },
                    { age: "35-39", m: 438, f: 412 },
                    { age: "30-34", m: 492, f: 455 },
                    { age: "25-29", m: 512, f: 485 },
                    { age: "20-24", m: 462, f: 435 },
                    { age: "15-19", m: 382, f: 362 },
                    { age: "10-14", m: 325, f: 312 },
                    { age: "5-9", m: 272, f: 252 },
                    { age: "0-4", m: 202, f: 188 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 36 },
                    { label: "SD / Sdrjt", val: 81 },
                    { label: "SMP / Sdrjt", val: 146 },
                    { label: "SMA / Sdrjt", val: 125 },
                    { label: "Perguruan Tinggi", val: 66 }
                ]
            },
            lametuna: {
                kpi: { pop: "2.210", kk: "620", sexRatio: "98,2%", p3ke: "3,9%", stunting: "2 Balita", stuntingVal: 2, rasio: "41,8%", pre: "115" },
                desil: { d1: 25.4, d2: 19.1, d3: 21.8, d4: 33.7 },
                pekerjaan: [
                    { name: "Pertanian Terpadu / Padi", pct: 40 },
                    { name: "Perkebunan Kakao", pct: 32 },
                    { name: "Wiraswasta / BUMDes", pct: 16 },
                    { name: "IRT", pct: 8 },
                    { name: "Belum Bekerja", pct: 4 }
                ],
                center: [-3.432, 121.008],
                dusun: [
                    { id: "dusun1", name: "Dusun Lametuna Timur", pop: 780, kk: 220, pre: 37, kerawanan: "Sedang", lat: -3.430, lng: 121.006 },
                    { id: "dusun2", name: "Dusun Lametuna Barat", pop: 730, kk: 200, pre: 44, kerawanan: "Tinggi", lat: -3.434, lng: 121.010 },
                    { id: "dusun3", name: "Dusun Makmur", pop: 700, kk: 200, pre: 34, kerawanan: "Rendah", lat: -3.431, lng: 121.009 }
                ],
                piramida: [
                    { age: "65+", m: 112, f: 138 },
                    { age: "60-64", m: 158, f: 172 },
                    { age: "55-59", m: 208, f: 222 },
                    { age: "50-54", m: 268, f: 282 },
                    { age: "45-49", m: 322, f: 338 },
                    { age: "40-44", m: 392, f: 372 },
                    { age: "35-39", m: 442, f: 418 },
                    { age: "30-34", m: 498, f: 462 },
                    { age: "25-29", m: 518, f: 492 },
                    { age: "20-24", m: 468, f: 442 },
                    { age: "15-19", m: 388, f: 368 },
                    { age: "10-14", m: 332, f: 318 },
                    { age: "5-9", m: 278, f: 258 },
                    { age: "0-4", m: 208, f: 192 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 40 },
                    { label: "SD / Sdrjt", val: 84 },
                    { label: "SMP / Sdrjt", val: 150 },
                    { label: "SMA / Sdrjt", val: 130 },
                    { label: "Perguruan Tinggi", val: 70 }
                ]
            },
            sawangaoha: {
                kpi: { pop: "2.570", kk: "730", sexRatio: "99,5%", p3ke: "3,6%", stunting: "3 Balita", stuntingVal: 3, rasio: "38,5%", pre: "90" },
                desil: { d1: 23.8, d2: 20.2, d3: 23.5, d4: 32.5 },
                pekerjaan: [
                    { name: "Perkebunan Kakao & Cengkeh", pct: 45 },
                    { name: "Kerajinan Kayu / IKM", pct: 26 },
                    { name: "Wiraswasta", pct: 16 },
                    { name: "IRT", pct: 8 },
                    { name: "Belum Bekerja", pct: 5 }
                ],
                center: [-3.409, 121.006],
                dusun: [
                    { id: "dusun1", name: "Dusun Sawangaoha Hulu", pop: 890, kk: 250, pre: 28, kerawanan: "Sedang", lat: -3.407, lng: 121.004 },
                    { id: "dusun2", name: "Dusun Karya Kayu", pop: 850, kk: 240, pre: 34, kerawanan: "Rendah", lat: -3.411, lng: 121.008 },
                    { id: "dusun3", name: "Dusun Perkebunan", pop: 830, kk: 240, pre: 28, kerawanan: "Rendah", lat: -3.408, lng: 121.007 }
                ],
                piramida: [
                    { age: "65+", m: 92, f: 118 },
                    { age: "60-64", m: 138, f: 152 },
                    { age: "55-59", m: 188, f: 208 },
                    { age: "50-54", m: 248, f: 268 },
                    { age: "45-49", m: 308, f: 322 },
                    { age: "40-44", m: 372, f: 358 },
                    { age: "35-39", m: 428, f: 398 },
                    { age: "30-34", m: 478, f: 442 },
                    { age: "25-29", m: 502, f: 472 },
                    { age: "20-24", m: 448, f: 422 },
                    { age: "15-19", m: 368, f: 348 },
                    { age: "10-14", m: 312, f: 298 },
                    { age: "5-9", m: 258, f: 242 },
                    { age: "0-4", m: 192, f: 178 }
                ],
                pendidikan: [
                    { label: "Tidak Sekolah", val: 30 },
                    { label: "SD / Sdrjt", val: 76 },
                    { label: "SMP / Sdrjt", val: 138 },
                    { label: "SMA / Sdrjt", val: 132 },
                    { label: "Perguruan Tinggi", val: 74 }
                ]
            }
        };

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
            if (menuKey === 'excel' || menuKey === 'buku') {
                switchNavMenu('pembelajaran');
                if (typeof switchPemTab === 'function') switchPemTab('panduan-excel');
                return;
            }
            if (menuKey === 'video') {
                switchNavMenu('pembelajaran');
                if (typeof switchPemTab === 'function') switchPemTab('video');
                return;
            }
            if (menuKey === 'pretest') {
                switchNavMenu('pembelajaran');
                if (typeof switchPemTab === 'function') switchPemTab('evaluasi');
                if (typeof switchEvalSubTab === 'function') switchEvalSubTab('pretest');
                return;
            }
            if (menuKey === 'posttest') {
                switchNavMenu('pembelajaran');
                if (typeof switchPemTab === 'function') switchPemTab('evaluasi');
                if (typeof switchEvalSubTab === 'function') switchEvalSubTab('posttest');
                return;
            }
            if (menuKey === 'layanan' || menuKey === 'pengaduan') {
                openLayananModal();
                return;
            }
            if (menuKey === 'pst') {
                openPstModal();
                return;
            }

            // HANYA 4 MENU RESMI
            const validMenus = ['dashboard', 'tentang', 'pembelajaran', 'monev'];
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
            }

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

            if (menuKey === 'pembelajaran') {
                if (typeof switchPemTab === 'function') {
                    switchPemTab('panduan-excel');
                }
            }

            if (menuKey === 'monev') {
                if (typeof renderBuktiDukungTables === 'function') {
                    renderBuktiDukungTables(currentTargetVillage);
                }
            }

            const videoIframe = document.getElementById('mainVideoIframe');
            if (videoIframe) {
                if (menuKey === 'pembelajaran' && currentPemTab === 'video') {
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

        function renderDashboardCantik(villageKey, filterDusun = 'all', filterYear = '2026') {
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

        function switchVillage(key) {
            if (!key) key = 'kalukaluku';
            const data = villagesData[key] || villagesData.kalukaluku;
            currentVillageKey = key;
            currentTargetVillage = key;

            // 1. Top Navigation & Brand Bars
            const brandTitle = document.getElementById('topBrandDesaTitle');
            if (brandTitle) brandTitle.textContent = ('AKUN ' + (data.title || 'DESA')).toUpperCase();
            const brandKec = document.getElementById('topBrandDesaKec');
            if (brandKec) brandKec.textContent = '(Kec. Kodeoha) • Terbina BPS';
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
            const params = new URLSearchParams(window.location.search);
            const desaParam = (params.get('desa') || 'kalukaluku').toLowerCase();
            const menuParam = (params.get('menu') || (window.location.hash ? window.location.hash.replace('#', '') : 'dashboard')).toLowerCase();

            currentTargetVillage = (typeof villagesData !== 'undefined' && villagesData[desaParam]) ? desaParam : 'kalukaluku';

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
                        🏘️ Kelola & Tambah Dusun
                    </button>
                    <button type="button" onclick="switchManageModalTab('sosial')" id="modal-tab-sosial" class="modal-tab-btn px-3.5 py-1.5 rounded-xl bg-white/15 hover:bg-white/25 text-white transition cursor-pointer">
                        👥 Sosial & Pendidikan
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
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-xl">
                        👥
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
    <div id="pretestModal" class="fixed inset-0 z-50 hidden bg-white flex flex-col overflow-hidden animate-in fade-in duration-150">
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
    <div id="posttestModal" class="fixed inset-0 z-50 hidden bg-white flex flex-col overflow-hidden animate-in fade-in duration-150">
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
    <div id="videoTheaterModal" class="fixed inset-0 z-50 hidden bg-slate-950/95 backdrop-blur-md flex flex-col overflow-hidden animate-in fade-in duration-200">
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
