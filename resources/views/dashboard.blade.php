<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Madani Kabupaten Kolaka Utara - Portal Data & Analitik Kemandirian Desa</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bps: {
                            blue: '#005ea6',
                            darkblue: '#004077',
                            deep: '#01315c',
                            navy: '#0f172a',
                            light: '#0284c7',
                            sky: '#0ea5e9',
                            orange: '#ea580c',
                            amber: '#f59e0b',
                            green: '#16a34a',
                            emerald: '#10b981',
                            bg: '#f8fafc'
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'ui-monospace', 'monospace']
                    }
                }
            }
        }
    </script>

    <!-- Local Leaflet CSS (Offline & Instant) with CDN fallback -->
    <link rel="stylesheet" href="/vendor/leaflet/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Local Leaflet JS (MUST LOAD IN HEAD) with CDN fallback -->
    <script src="/vendor/leaflet/leaflet.js"></script>
    <script>
        if (typeof L === 'undefined') {
            document.write('<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"><\/script>');
        }
    </script>

    <!-- Local Chart.js (Offline & Instant) with CDN fallback -->
    <script src="/vendor/chart.umd.min.js"></script>
    <script>
        if (typeof Chart === 'undefined') {
            document.write('<script src="https://cdn.jsdelivr.net/npm/chart.js"><\/script>');
        }
    </script>

    <!-- EMBEDDED GEOJSON DATA (Instant Zero-Latency Loading) -->
    <script>
        window.KOLAKA_UTARA_GEOJSON = {!! file_get_contents(public_path('data/kolaka_utara_kecamatan.geojson')) !!};
    </script>

    <!-- PODES 2025 DATABASE & DESA PRESISI ENGINE -->
    <script src="/data/podes_kolut_complete_2025.js?v=20261117_02"></script>
    <script src="/js/desa_presisi_engine.js?v=20261117_02"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: #F7F7F5;
            color: #1e293b;
            margin: 0;
            padding: 0;
        }

        .tabular-nums {
            font-variant-numeric: tabular-nums;
        }

        /* Leaflet custom styles */
        .leaflet-container {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #e8ecef;
            border-radius: 0.75rem;
            width: 100%;
            height: 100%;
        }

        .custom-tooltip {
            background: rgba(15, 23, 42, 0.95) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            color: #ffffff !important;
            font-size: 12px !important;
            font-weight: 500 !important;
            padding: 8px 12px !important;
            border-radius: 8px !important;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.4) !important;
        }

        /* Rich Leaflet Popup Styling */
        .leaflet-popup-content-wrapper {
            background: #ffffff !important;
            border-radius: 16px !important;
            box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.3) !important;
            padding: 0 !important;
            overflow: hidden !important;
            border: 1px solid rgba(226, 232, 240, 0.9) !important;
        }

        .leaflet-popup-content {
            margin: 0 !important;
            line-height: 1.4 !important;
        }

        .leaflet-popup-tip {
            background: #ffffff !important;
        }

        .leaflet-control-zoom {
            border: none !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15) !important;
            border-radius: 10px !important;
            overflow: hidden;
        }

        .leaflet-control-zoom a {
            background-color: #ffffff !important;
            color: #1e293b !important;
            border-bottom: 1px solid #f1f5f9 !important;
        }

        /* Sleek Official Vector SVG Marker Pin (No Emoticons!) */
        .village-marker-pin {
            width: 28px;
            height: 28px;
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            border: 2px solid #ffffff;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .village-marker-pin:hover {
            transform: rotate(-45deg) scale(1.3);
            z-index: 9999 !important;
        }

        .village-marker-pin .pin-svg-wrap {
            transform: rotate(45deg);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 14px;
            height: 14px;
            color: #ffffff;
        }

        .pin-mandiri {
            background: linear-gradient(135deg, #10b981, #047857);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.5);
        }

        .pin-maju {
            background: linear-gradient(135deg, #0284c7, #0369a1);
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.5);
        }

        .pin-berkembang {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.5);
        }

        .pin-selected {
            animation: ringPulse 1.2s infinite alternate !important;
            transform: rotate(-45deg) scale(1.35) !important;
            border-color: #fef08a !important;
        }

        @keyframes ringPulse {
            0% { box-shadow: 0 0 0 3px rgba(234, 179, 8, 0.7), 0 5px 15px rgba(0, 0, 0, 0.4); }
            100% { box-shadow: 0 0 0 9px rgba(234, 179, 8, 0), 0 8px 20px rgba(0, 0, 0, 0.5); }
        }

        /* Sector card active highlight */
        .card-sektor-active {
            box-shadow: 0 0 0 3px #005ea6, 0 10px 25px -5px rgba(0, 94, 166, 0.3) !important;
            transform: translateY(-2px);
        }

        /* Modal animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.25s ease-out forwards;
        }

        /* Lively Animations & Floating Elements */
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-7px) rotate(0.6deg); }
        }
        @keyframes floatDelayed {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(7px) rotate(-0.6deg); }
        }
        @keyframes floatReverse {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-9px); }
        }
        @keyframes glowPulse {
            0%, 100% { opacity: 0.35; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.06); }
        }
        @keyframes dashOrbit {
            to { stroke-dashoffset: -120; }
        }
        @keyframes pulseDot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.4); opacity: 0.7; }
        }
        .animate-float-slow {
            animation: floatSlow 4s ease-in-out infinite;
        }
        .animate-float-delayed {
            animation: floatDelayed 5s ease-in-out 1s infinite;
        }
        .animate-float-reverse {
            animation: floatReverse 4.5s ease-in-out 0.5s infinite;
        }
        .animate-glow-pulse {
            animation: glowPulse 3s ease-in-out infinite;
        }
        .animate-dash-orbit {
            animation: dashOrbit 20s linear infinite;
        }
        .animate-pulse-dot {
            animation: pulseDot 2s ease-in-out infinite;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    
        /* Progressive Village Micro-Badge styling on Leaflet Map */
        .custom-micro-badge-wrap {
            background: transparent !important;
            border: none !important;
        }
        .village-micro-badge {
            background: rgba(11, 37, 69, 0.88);
            backdrop-filter: blur(6px);
            color: #ffffff;
            padding: 3px 8px;
            border-radius: 9999px;
            font-size: 10px;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            border: 1px solid rgba(255, 255, 255, 0.35);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            white-space: nowrap;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transform: translate(-50%, -50%);
        }
        .village-micro-badge:hover {
            background: #059669;
            border-color: #ffffff;
            transform: translate(-50%, -50%) scale(1.08);
            box-shadow: 0 6px 16px rgba(5, 150, 105, 0.45);
        }
        .village-micro-badge.active-focus {
            background: #f59e0b;
            color: #0b2545;
            border-color: #ffffff;
            transform: translate(-50%, -50%) scale(1.15);
            box-shadow: 0 0 18px rgba(245, 158, 11, 0.7);
        }

            /* Clean Center Label for Kecamatan Polygon (Like Sragen in reference) */
        .kecamatan-polygon-label {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            color: #ffffff !important;
            font-weight: 800 !important;
            font-size: 11px !important;
            letter-spacing: 0.02em !important;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.9), 0 2px 8px rgba(0, 0, 0, 0.85) !important;
            pointer-events: none !important;
        }

    </style>
</head>
<body class="min-h-screen bg-[#F7F7F5] text-slate-800 antialiased flex flex-col">

        <!-- TOP NAVBAR: DESA MADANI CLEAN & MODERN THEME -->
    <header class="bg-white/95 backdrop-blur-md text-slate-800 shadow-xs border-b border-slate-200/80 sticky top-0 z-40 transition-all min-h-[68px] flex items-center">
        <div class="w-full px-4 lg:px-10 py-3 flex items-center justify-between gap-4 max-w-[1720px] mx-auto">
            <!-- Left: Logo Kolaka Utara bersampingan dengan Logo BPS Kolut & Desa Madani Brand (Tombol Login) -->
            <div class="flex items-center gap-3 shrink-0">
                <button type="button" 
                        id="btnBrandLoginTrigger" 
                        onclick="openLoginModal()" 
                        class="flex items-center gap-3 group text-left cursor-pointer focus:outline-none transition-transform hover:scale-[1.01] active:scale-[0.99] rounded-xl" 
                        title="Desa Madani Kabupaten Kolaka Utara (Klik untuk Login)">
                    <div class="flex items-center gap-2 shrink-0 bg-slate-50 border border-slate-200/80 px-2 py-1 rounded-xl">
                        <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-8 w-auto object-contain drop-shadow-xs">
                        <div class="h-5 w-[1.5px] bg-slate-300"></div>
                        <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-7 w-auto object-contain drop-shadow-xs">
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-[#0b2545] leading-none tracking-tight">
                            Desa <span class="text-[#0D6E5B]">Madani</span>
                        </div>
                        <div data-i18n="nav_brand_sub" class="text-[10px] text-slate-500 font-medium tracking-wide mt-0.5 whitespace-nowrap">
                            Portal Data & Analitik Kemandirian Desa • Kab. Kolaka Utara
                        </div>
                    </div>
                </button>
                <!-- Institutional BPS Partner Link -->
                <a href="/" class="hidden sm:flex items-center pl-3 ml-1 border-l border-slate-200 hover:opacity-80 transition shrink-0" title="Kembali ke Beranda">
                    <span class="text-[11px] font-black text-[#005ea6] whitespace-nowrap">BPS Kolut</span>
                </a>
            </div>

            <!-- Center/Right: Navigation Menu Links -->
            <nav class="hidden md:flex items-center gap-5 lg:gap-6 text-[13px] font-semibold text-slate-700 whitespace-nowrap">
                <a href="/" data-i18n="nav_home" class="hover:text-[#0D6E5B] transition">Beranda</a>
                <a href="#sectionAgregatKecamatan" data-i18n="nav_agregat" class="hover:text-[#0D6E5B] transition flex items-center gap-1 text-slate-700"><span>Agregat 15 Kecamatan</span></a>
                <a href="#sectionPeta" class="text-[#0D6E5B] font-black border-b-2 border-[#0D6E5B] pb-0.5 flex items-center gap-1.5 shrink-0">
                    <svg class="w-4 h-4 text-[#0D6E5B] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    <span data-i18n="nav_gis">WebGIS Peta Spasial</span>
                </a>

                <a href="/descan" data-i18n="nav_descan" class="hover:text-[#059669] transition">Desa Cantik (DESCAN)</a>
                <a href="#sectionAbout" data-i18n="nav_about" class="hover:text-[#059669] transition">Tentang Madani</a>
            </nav>

            <!-- Right Controls: 15 Kecamatan, Admin Portal, Language Switcher -->
            <div class="flex items-center gap-2.5 sm:gap-3 shrink-0">
                <button id="btnOpenKecamatanModal" class="hidden sm:flex items-center gap-1.5 px-3.5 py-1.5 rounded-full border border-slate-200 hover:border-[#0D6E5B] text-slate-700 hover:text-[#0D6E5B] text-xs font-bold transition shrink-0 whitespace-nowrap">
                    <svg class="w-3.5 h-3.5 text-[#0D6E5B] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    <span data-i18n="btn_15_kec">15 Kecamatan</span>
                </button>

                <button id="btnOpenAdminPortal" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-black px-3.5 py-1.5 rounded-full shadow-sm hover:shadow transition flex items-center gap-1.5 text-xs transform hover:scale-105 active:scale-95 shrink-0 whitespace-nowrap" title="Buka Portal Admin Input & Kelola Data Desa">
                    <svg class="w-3.5 h-3.5 text-slate-950 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span data-i18n="btn_kelola_data">Kelola Data</span>
                    <span id="badgeAdminCustomCount" class="bg-slate-950 text-amber-300 text-[10px] px-1.5 py-0.2 rounded-full font-black hidden">0 Baru</span>
                </button>

                <!-- Language Switcher Pill (ID | EN) -->
                <div class="flex items-center bg-slate-100 rounded-full p-0.5 text-xs font-bold border border-slate-200 shrink-0">
                    <button type="button" id="btnLangID" onclick="setPortalLanguage('id')" class="px-2.5 py-1 rounded-full bg-[#0D6E5B] text-white shadow-xs transition-all cursor-pointer font-bold">ID</button>
                    <button type="button" id="btnLangEN" onclick="setPortalLanguage('en')" class="px-2.5 py-1 rounded-full text-slate-600 hover:text-[#0b2545] transition-all cursor-pointer font-bold">EN</button>
                </div>
            </div>
        </div>
    </header>

        <!-- HERO SECTION: DESA MADANI KOLAKA UTARA (TAMPILAN AWAL DIPERTAHANKAN) -->
    <section class="relative bg-white text-slate-900 pt-12 pb-16 px-4 lg:px-10 overflow-hidden border-b border-slate-200/80">
        <!-- Floating Animated Background Glow & Ambient Mesh -->
        <div class="absolute -top-32 -left-20 w-96 h-96 bg-emerald-100/50 rounded-full blur-3xl pointer-events-none animate-pulse"></div>
        <div class="absolute top-20 right-0 w-[500px] h-[500px] bg-blue-100/40 rounded-full blur-3xl pointer-events-none animate-float-delayed"></div>

        <!-- Indonesian Archipelago / Regional Watermark with Animated Trajectory Arc -->
        <div class="absolute inset-0 pointer-events-none opacity-20 flex items-center justify-center overflow-hidden">
            <svg class="w-full max-w-6xl h-auto" viewBox="0 0 1200 480" fill="none" stroke="#94a3b8" stroke-width="1.5">
                <!-- Sumatra -->
                <path d="M 80 160 Q 140 220 220 300 Q 240 330 270 350 Q 230 360 200 320 Q 140 250 70 170 Z" fill="#f1f5f9"/>
                <!-- Java -->
                <path d="M 280 370 Q 380 375 480 380 Q 520 380 500 395 Q 400 395 280 385 Z" fill="#f1f5f9"/>
                <!-- Kalimantan -->
                <path d="M 330 180 Q 420 160 460 210 Q 470 270 410 300 Q 350 290 320 230 Z" fill="#f1f5f9"/>
                <!-- Sulawesi (Kolaka Utara Highlight in Emerald) -->
                <path d="M 540 180 Q 590 190 570 240 Q 610 260 620 310 Q 580 300 560 260 Q 530 250 540 210 Z" fill="#d1fae5" stroke="#059669" stroke-width="2.5"/>
                <!-- Papua -->
                <path d="M 780 230 Q 880 220 950 260 Q 940 330 860 340 Q 820 300 770 270 Z" fill="#f1f5f9"/>
                <!-- Animated Trajectory Arc -->
                <path d="M 120 200 C 350 80, 650 40, 850 180 C 950 250, 750 350, 560 260" stroke="#059669" stroke-width="2" stroke-dasharray="6,6" class="animate-dash-orbit" fill="none"/>
            </svg>
        </div>

        <div class="max-w-[1720px] mx-auto relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center min-h-[460px]">
                <!-- Left Column: Typography & Action Buttons -->
                <div class="lg:col-span-7 space-y-5">
                    <!-- Eyebrow text with live pulsing indicator -->
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-black tracking-widest uppercase shadow-xs">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                        <span data-i18n="hero_eyebrow">PORTAL SATU DATA & KEDAULATAN DESA MANDIRI</span>
                    </div>

                    <!-- Massive Bold Typography: DESA MADANI KOLAKA UTARA -->
                    <h1 class="text-5xl sm:text-7xl lg:text-8xl font-black text-[#0D6E5B] tracking-tight leading-[0.92] uppercase font-sans">
                        <span data-i18n="hero_title_1">DESA MADANI</span><br>
                        <span data-i18n="hero_title_2" class="text-[#0D6E5B]">KOLAKA UTARA</span>
                    </h1>

                    <p data-i18n="hero_desc" class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-xl font-normal pt-1">
                        Mewujudkan <b>Desa Mandiri, Maju, dan Sejahtera</b> melalui integrasi data geospasial tematik resolusi tinggi, statistik potensi desa (Podes BPS 2024–2025), dan sistem analitik perencanaan pembangunan berbasis bukti (*evidence-based policy*).
                    </p>

                    <!-- CTA Buttons: Emerald Pill + Navy Pill (Width-locked with min-w-[190px] for zero shift) -->
                    <div class="flex flex-wrap items-center gap-4 pt-3">
                        <!-- Emerald Pill Button: Portal Data WebGIS -->
                        <a href="#sectionPeta" class="min-w-[190px] justify-center px-8 py-3.5 rounded-full bg-gradient-to-r from-[#059669] to-[#047857] hover:from-[#047857] hover:to-[#065f46] text-white font-bold text-sm shadow-lg shadow-emerald-700/25 hover:shadow-xl transition flex items-center gap-2.5 transform hover:-translate-y-1 active:translate-y-0 whitespace-nowrap">
                            <span data-i18n="hero_btn_webgis">Portal Data WebGIS</span>
                            <svg class="w-4 h-4 text-white shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                        </a>

                        <!-- Dark Navy Pill Button: Jelajahi Potensi Desa -->
                        <a href="#sectionDesaPresisi" class="min-w-[190px] justify-center px-8 py-3.5 rounded-full bg-[#0D6E5B] hover:bg-[#162d4a] text-white font-bold text-sm shadow-lg shadow-slate-900/20 hover:shadow-xl transition flex items-center gap-2.5 transform hover:-translate-y-1 active:translate-y-0 whitespace-nowrap">
                            <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M4.5 3.5l11 6.5-11 6.5v-13z"/></svg>
                            <span data-i18n="hero_btn_explore">Jelajahi Potensi Desa</span>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Stylized 3D Vector Map of Kabupaten Kolaka Utara with Indonesia Backdrop -->
                <div class="lg:col-span-5 flex items-center justify-center relative select-none">
                    <!-- Dotted Orbit Trajectory Arc Looping Behind with Dash Animation -->
                    <svg class="absolute -top-10 -right-6 w-80 sm:w-96 h-80 sm:h-96 pointer-events-none opacity-45 z-0 animate-dash-orbit" viewBox="0 0 200 200">
                        <path d="M 175 35 C 190 90, 165 165, 95 185 C 40 195, 10 145, 35 90 C 55 40, 120 15, 175 35" fill="none" stroke="#059669" stroke-width="2.5" stroke-dasharray="6,6"/>
                    </svg>

                    <!-- Glowing Ambient Aura Mesh -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-emerald-500/20 via-teal-400/15 to-blue-600/20 rounded-full blur-3xl animate-glow-pulse pointer-events-none"></div>

                    <!-- Main Interactive 3D Relief Card Container -->
                    <div class="relative w-full max-w-[390px] sm:max-w-[430px] z-10 transition-transform duration-500 hover:scale-[1.02]">

                        <!-- Background Glassmorphic Relief Card Plate -->
                        <div class="relative bg-white/80 backdrop-blur-xl rounded-[36px] border border-white/80 shadow-[0_20px_50px_rgba(11,37,69,0.08)] p-4 sm:p-6 overflow-hidden">
                            <!-- Subtle Grid Pattern & Sea Contour -->
                            <div class="absolute inset-0 opacity-[0.03] bg-[radial-gradient(#0b2545_1px,transparent_1px)] [background-size:16px_16px] pointer-events-none"></div>

                            <!-- Header Micro Bar Inside Card -->
                            <div class="flex items-center justify-between pb-2 mb-2 border-b border-slate-100/80 relative z-20 text-[11px]">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span data-i18n="hero_card_head" class="font-extrabold text-[#0D6E5B] tracking-tight">KABUPATEN KOLAKA UTARA</span>
                                </div>
                                <span class="text-[10px] font-mono font-bold text-slate-400 bg-slate-50 px-2 py-0.5 rounded-full border border-slate-100">
                                    7408 • SULTRA
                                </span>
                            </div>

                            <!-- THE MASTER SVG MAP: 15 KECAMATAN OF KOLAKA UTARA -->
                            <div class="relative w-full aspect-[400/480] flex items-center justify-center">
                                <svg class="w-full h-full filter drop-shadow-[0_15px_25px_rgba(11,37,69,0.18)]" viewBox="0 0 400 480" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <defs>
                                        <linearGradient id="kecGradEmerald1" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#059669"/>
                                            <stop offset="100%" stop-color="#047857"/>
                                        </linearGradient>
                                        <linearGradient id="kecGradEmerald2" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#10b981"/>
                                            <stop offset="100%" stop-color="#059669"/>
                                        </linearGradient>
                                        <linearGradient id="kecGradTeal" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#0d9488"/>
                                            <stop offset="100%" stop-color="#0f766e"/>
                                        </linearGradient>
                                        <linearGradient id="kecGradNavy" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#005ea6"/>
                                            <stop offset="100%" stop-color="#0b2545"/>
                                        </linearGradient>
                                        <linearGradient id="kecGradSky" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#0284c7"/>
                                            <stop offset="100%" stop-color="#0369a1"/>
                                        </linearGradient>
                                        <linearGradient id="kecGradAmber" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#f59e0b"/>
                                            <stop offset="100%" stop-color="#d97706"/>
                                        </linearGradient>
                                        <!-- Backward compatibility alias -->
                                        <linearGradient id="kecGrad1" href="#kecGradEmerald1"/>
                                        <linearGradient id="kecGrad2" href="#kecGradEmerald2"/>
                                        <linearGradient id="kecGrad3" href="#kecGradNavy"/>
                                        <linearGradient id="kecGrad4" href="#kecGradAmber"/>
                                    </defs>

                                    <!-- 15 INTERACTIVE GEOGRAPHIC KECAMATAN POLYGONS (OFFICIAL PODES KOLAKA UTARA) -->
                                    <g id="svgKecamatanGroup" class="cursor-pointer filter drop-shadow-[0_4px_12px_rgba(11,37,69,0.18)]">
                                        <path id="svgKec-Lasusua" data-kecamatan="Lasusua" d="M 100.6 332.2 L 157.2 345.0 L 187.9 342.6 L 199.4 350.0 L 164.9 371.0 L 117.9 390.1 L 114.2 388.7 L 117.5 395.5 L 114.9 402.4 L 108.3 399.7 L 103.9 388.5 L 91.1 380.2 L 88.3 375.5 L 93.4 376.6 L 80.0 359.6 L 76.8 345.9 L 75.4 334.3 L 100.6 332.2 Z" fill="url(#kecGradAmber)" stroke="#ffffff" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Lasusua');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Lasusua (Ibu Kota Kabupaten) - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-Pakue" data-kecamatan="Pakue" d="M 165.6 212.5 L 217.4 245.1 L 207.9 256.3 L 203.5 254.9 L 202.4 267.8 L 186.5 265.1 L 149.7 242.6 L 143.4 248.3 L 136.8 235.9 L 141.9 233.3 L 146.4 218.8 L 154.8 213.5 L 161.9 216.8 L 165.6 212.5 Z" fill="url(#kecGradNavy)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Pakue');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Pakue - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-BatuPutih" data-kecamatan="Batu Putih" d="M 152.3 139.1 L 151.8 138.8 L 151.9 138.5 L 152.4 138.8 L 152.3 139.1 Z M 157.1 134.9 L 157.2 134.9 L 157.3 135.0 L 157.1 135.0 L 157.1 134.9 Z M 165.3 120.1 L 164.9 119.9 L 164.9 119.8 L 165.3 120.0 L 165.3 120.1 Z M 161.4 116.5 L 161.1 117.3 L 160.7 117.2 L 160.6 117.0 L 161.4 116.5 Z M 161.5 108.5 L 161.3 108.4 L 161.4 108.1 L 161.6 108.3 L 161.5 108.5 Z M 161.1 107.8 L 160.9 107.7 L 160.9 107.6 L 161.1 107.7 L 161.1 107.8 Z M 161.3 106.7 L 170.4 116.1 L 180.6 117.0 L 178.4 138.7 L 188.0 140.7 L 187.4 147.3 L 194.1 147.4 L 189.3 156.5 L 192.1 158.8 L 227.6 164.6 L 236.0 173.2 L 276.2 192.5 L 326.3 196.7 L 325.6 215.0 L 267.2 205.7 L 196.6 175.0 L 158.3 163.9 L 158.6 151.6 L 152.9 147.8 L 152.0 141.5 L 157.6 135.4 L 161.2 141.7 L 165.1 139.7 L 166.2 129.3 L 172.4 132.3 L 173.2 123.9 L 165.2 124.6 L 167.6 117.1 L 162.1 118.0 L 162.8 109.1 L 161.3 106.7 Z" fill="url(#kecGradSky)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Batu Putih');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Batu Putih - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-RanteAngin" data-kecamatan="Rante Angin" d="M 205.9 364.5 L 212.7 371.0 L 195.6 377.7 L 190.5 386.0 L 183.6 388.5 L 165.0 406.4 L 158.1 405.7 L 154.1 417.3 L 141.8 428.1 L 127.0 412.0 L 139.3 397.5 L 154.6 395.8 L 201.1 363.6 L 205.9 364.5 Z" fill="url(#kecGradEmerald2)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Rante Angin');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Rante Angin - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-Kodeoha" data-kecamatan="Kodeoha" d="M 108.9 273.0 L 112.3 277.3 L 110.2 281.7 L 116.2 286.1 L 197.0 328.2 L 187.5 334.2 L 115.6 316.4 L 86.9 296.0 L 108.9 273.0 Z" fill="url(#kecGradTeal)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Kodeoha');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Kodeoha - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-Ngapa" data-kecamatan="Ngapa" d="M 150.1 243.6 L 186.5 265.1 L 202.4 267.8 L 199.7 270.3 L 202.6 275.4 L 195.3 286.9 L 192.1 287.1 L 192.7 297.8 L 187.1 307.2 L 201.3 318.1 L 197.4 327.1 L 164.1 313.4 L 141.5 299.4 L 140.2 287.8 L 125.5 266.2 L 136.3 251.5 L 147.7 254.1 L 147.9 250.7 L 143.0 248.8 L 150.1 243.6 Z" fill="url(#kecGradSky)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Ngapa');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Ngapa - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-Wawo" data-kecamatan="Wawo" d="M 211.5 371.0 L 237.0 391.9 L 244.4 415.9 L 191.5 439.1 L 178.1 455.0 L 169.7 441.3 L 141.8 428.1 L 154.1 417.3 L 158.1 405.7 L 165.0 406.4 L 183.6 388.5 L 190.5 386.0 L 195.6 377.7 L 211.5 371.0 Z" fill="url(#kecGradNavy)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Wawo');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Wawo - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-Lambai" data-kecamatan="Lambai" d="M 202.6 362.8 L 155.3 395.4 L 139.3 397.5 L 126.9 411.7 L 114.9 402.4 L 117.5 395.5 L 114.2 388.7 L 117.9 390.1 L 164.8 371.0 L 199.3 350.8 L 202.6 362.8 Z" fill="url(#kecGradEmerald1)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Lambai');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Lambai - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-Watunohu" data-kecamatan="Watunohu" d="M 138.4 234.8 L 138.5 240.2 L 147.7 254.1 L 136.3 251.5 L 125.6 266.2 L 123.1 262.8 L 114.4 264.1 L 113.7 254.4 L 120.6 242.2 L 138.4 234.8 Z" fill="url(#kecGradEmerald1)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Watunohu');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Watunohu - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-PakueTengah" data-kecamatan="Pakue Tengah" d="M 176.3 182.8 L 217.8 202.9 L 256.2 225.6 L 234.4 225.9 L 230.3 237.8 L 217.4 245.1 L 168.0 212.9 L 159.6 211.8 L 159.3 184.7 L 176.3 182.8 Z" fill="url(#kecGradTeal)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Pakue Tengah');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Pakue Tengah - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-PakueUtara" data-kecamatan="Pakue Utara" d="M 168.1 164.9 L 253.7 201.5 L 282.4 209.8 L 325.6 215.0 L 323.1 247.1 L 301.2 235.2 L 282.0 235.3 L 263.3 229.1 L 176.8 182.8 L 159.3 184.7 L 152.7 171.8 L 158.3 163.9 L 168.1 164.9 Z" fill="url(#kecGradEmerald2)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Pakue Utara');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Pakue Utara - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-Porehu" data-kecamatan="Porehu" d="M 227.1 68.2 L 232.6 67.7 L 234.7 75.2 L 241.2 77.8 L 244.1 84.0 L 264.1 92.8 L 265.3 100.6 L 278.7 113.8 L 292.3 119.8 L 296.0 130.5 L 292.2 148.1 L 303.0 159.7 L 304.3 168.4 L 314.8 173.8 L 316.9 188.6 L 326.3 196.7 L 276.2 192.5 L 236.0 173.2 L 227.6 164.6 L 189.3 156.5 L 194.8 148.6 L 187.2 147.0 L 187.2 140.2 L 178.4 138.7 L 180.6 117.0 L 200.3 118.8 L 204.3 117.1 L 201.2 109.7 L 211.4 111.5 L 226.0 61.8 L 227.1 68.2 Z" fill="url(#kecGradEmerald1)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Porehu');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Porehu - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-Katoi" data-kecamatan="Katoi" d="M 87.1 296.4 L 115.6 316.4 L 187.5 334.2 L 187.9 342.6 L 164.4 345.8 L 101.5 332.1 L 75.4 334.3 L 73.7 315.0 L 86.8 303.7 L 87.1 296.4 Z" fill="url(#kecGradNavy)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Katoi');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Katoi - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-Tiwu" data-kecamatan="Tiwu" d="M 122.7 262.8 L 140.2 287.8 L 141.5 299.4 L 110.2 281.7 L 112.3 277.3 L 108.8 272.8 L 113.8 271.4 L 115.2 263.7 L 122.7 262.8 Z" fill="url(#kecGradEmerald2)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Tiwu');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Tiwu - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <path id="svgKec-Tolala" data-kecamatan="Tolala" d="M 166.4 110.0 L 166.3 110.0 L 166.3 109.9 L 166.4 109.9 L 166.4 110.0 Z M 163.9 108.2 L 163.6 108.1 L 163.7 107.8 L 164.0 108.0 L 163.9 108.2 Z M 163.9 106.6 L 163.7 106.5 L 164.1 106.4 L 164.1 106.5 L 163.9 106.6 Z M 161.9 106.1 L 161.9 106.0 L 161.9 106.0 L 162.0 106.1 L 161.9 106.1 Z M 118.5 41.4 L 114.1 43.5 L 113.0 41.7 L 117.3 40.1 L 118.5 41.4 Z M 176.6 30.9 L 190.4 34.7 L 200.5 42.4 L 205.7 57.5 L 215.2 55.4 L 221.6 62.1 L 226.0 61.8 L 211.4 111.5 L 201.2 109.7 L 204.3 117.1 L 200.3 118.8 L 170.4 116.1 L 166.3 113.4 L 161.7 107.4 L 168.8 112.9 L 172.8 91.4 L 167.5 84.0 L 168.2 79.2 L 164.8 80.3 L 165.6 61.9 L 160.3 62.9 L 161.2 71.1 L 153.2 65.7 L 149.3 40.2 L 144.9 58.7 L 140.0 53.6 L 129.1 54.9 L 137.3 66.2 L 128.5 55.6 L 130.5 49.5 L 142.3 44.3 L 146.9 33.2 L 163.0 31.1 L 169.2 25.0 L 176.6 30.9 Z" fill="url(#kecGradNavy)" stroke="#ffffff" stroke-width="1.2" stroke-linejoin="round" stroke-linecap="round" class="transition-all duration-300 hover:brightness-125 hover:stroke-[2.5] hover:opacity-95 cursor-pointer" onclick="if(window.PresisiEngine){window.PresisiEngine.onKecamatanChange('Tolala');document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});}">
                                            <title>Kecamatan Tolala - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Ibu Kota Lasusua Marker Pin -->
                                        <g transform="translate(126.4, 359.4)" class="pointer-events-none">
                                            <circle r="6" fill="#f59e0b" fill-opacity="0.3" class="animate-ping" />
                                            <circle r="3.5" fill="#f59e0b" stroke="#ffffff" stroke-width="1.5" />
                                        </g>
                                    </g>

                                    <!-- Compass Rose Micro Graphic (Top-Right) -->
                                    <g transform="translate(345, 45)" opacity="0.75">
                                        <circle r="14" fill="#ffffff" stroke="#e2e8f0" stroke-width="1" />
                                        <path d="M 0 -11 L 3.5 0 L 0 11 L -3.5 0 Z" fill="#0b2545" />
                                        <path d="M 0 -11 L 3.5 0 L 0 0 Z" fill="#059669" />
                                        <text x="0" y="-14" fill="#0b2545" font-size="8" font-weight="900" text-anchor="middle">U</text>
                                    </g>
                                </svg>
                            </div>

                            <!-- Footer Mini Bar Inside Card -->
                            <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between text-[10px] text-slate-400">
                                <span class="flex items-center gap-1 text-[#0D6E5B] font-bold">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                    <span data-i18n="hero_card_foot">Peta Vektor Spasial 15 Kecamatan</span>
                                </span>
                                <span class="font-mono text-slate-500">Podes 2024–2025</span>
                            </div>
                        </div>

                        <!-- FLOATING GLASSMORPHIC BADGES -->
                        <div class="absolute -top-3.5 -right-3 sm:-right-4 z-30 bg-white/95 backdrop-blur-md border border-emerald-200 px-3.5 py-1.5 rounded-full shadow-[0_8px_20px_rgba(5,150,105,0.15)] flex items-center gap-2 text-xs font-bold text-[#0b2545] animate-float-slow">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span data-i18n="hero_badge_spasial">100% Spasial Podes</span>
                        </div>
                        <div class="absolute -bottom-3.5 -left-3 sm:-left-4 z-30 bg-white/95 backdrop-blur-md border border-blue-200 px-3.5 py-1.5 rounded-full shadow-[0_8px_20px_rgba(2,132,199,0.15)] flex items-center gap-2 text-xs font-bold text-[#0b2545] animate-float-delayed">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#005ea6]"></span>
                            <span data-i18n="hero_badge_desa">133 Desa Madani</span>
                        </div>
                        <div class="absolute top-1/2 -right-5 sm:-right-8 z-30 bg-white/95 backdrop-blur-md border border-amber-200 px-3 py-1 rounded-full shadow-[0_8px_20px_rgba(245,158,11,0.18)] flex items-center gap-1.5 text-[11px] font-bold text-amber-900 animate-float-reverse">
                            <svg class="w-3.5 h-3.5 text-amber-500 inline-block" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <span data-i18n="hero_badge_sejahtera">Kolaka Utara Sejahtera</span>
                        </div>
                        <div class="absolute top-6 -left-4 sm:-left-6 z-30 hidden sm:flex bg-white/95 backdrop-blur-md border border-slate-200 px-3 py-1 rounded-full shadow-md items-center gap-1.5 text-[11px] font-bold text-slate-700 animate-float-slow">
                            <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            <span data-i18n="hero_badge_15kec">15 Kecamatan Spasial</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FLOATING PUSAT BANTUAN WIDGET -->
    <div class="fixed bottom-6 right-6 z-40 flex items-center gap-2.5 bg-[#0D6E5B] text-white pl-4 pr-1.5 py-1.5 rounded-full shadow-2xl border border-white/20 hover:scale-105 hover:shadow-emerald-900/30 transition cursor-pointer group" onclick="showToast('Pusat Bantuan Desa Madani: Hubungi Tim BPS Kabupaten Kolaka Utara via kontak layanan di footer.')">
        <span data-i18n="hero_help_text" class="text-[11px] font-bold leading-tight text-right">Pusat<br>Bantuan</span>
        <div class="w-9 h-9 rounded-full bg-[#059669] group-hover:bg-[#047857] text-white flex items-center justify-center shadow-md transition">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zm-4 0h-2v2h2V9z" clip-rule="evenodd"/></svg>
        </div>
    </div>



    <!-- ========================================================================= -->
    <!-- SECTION BARU: AGREGAT 15 KECAMATAN SE-KABUPATEN KOLAKA UTARA (PODES BPS 2025) -->
    <!-- Ditempatkan tepat sebelum WebGIS Peta Spasial sesuai permintaan user     -->
    <!-- ========================================================================= -->
    <section id="sectionAgregatKecamatan" class="w-full bg-gradient-to-b from-[#F7F7F5] via-white to-[#F7F7F5] border-b border-slate-200/90 py-10 lg:py-14 scroll-mt-20">
        <div class="max-w-[1720px] mx-auto px-4 lg:px-8 space-y-8">
            
            <!-- HEADER SECTION -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-6 border-b border-slate-200/80">
                <div class="space-y-2 max-w-4xl">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gradient-to-r from-emerald-500/10 to-blue-500/10 border border-emerald-500/30 text-emerald-800 text-xs font-black tracking-wide uppercase">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span data-i18n="agregat_eyebrow" class="flex items-center gap-1.5"><svg class="w-3 h-3 text-[#0D6E5B]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15 9L22 12L15 15L12 22L9 15L2 12L9 9L12 2Z"/></svg>PODES BPS 2025 • AGREGAT LENGKAP 15 KECAMATAN KOLAKA UTARA</span>
                    </div>
                    <div class="w-10 h-1 bg-[#0D6E5B] rounded-full mb-1"></div>
                    <h2 data-i18n="agregat_title" class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#0D6E5B] tracking-tight">
                        Panorama Statistik & Komparasi Agregat 15 Kecamatan
                    </h2>
                </div>
                <div class="flex items-center gap-2.5 shrink-0">
                    <a href="#sectionPeta" class="px-4 py-2.5 rounded-xl bg-[#0D6E5B] hover:bg-[#133966] text-white text-xs font-bold transition flex items-center gap-2 shadow-sm transform hover:scale-[1.02] active:scale-[0.98]">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                        <span data-i18n="agregat_btn_gis">Jelajah Peta Spasial ↓</span>
                    </a>
                </div>
            </div>

            <!-- 1. EXECUTIVE MACRO METRIC STRIP (EDITORIAL STAT RIBBON - NO AI BOXES, BESPOKE SVGS) -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">
                <!-- KPI 1: Administrasi -->
                <div class="p-4 rounded-3xl bg-[#FDFDFB] hover:bg-white border border-[#5A6B65]/20 hover:border-[#0D6E5B] shadow-[0_2px_10px_rgba(13,110,91,0.04)] hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between text-slate-400 mb-2.5">
                        <span data-i18n="agregat_kpi1_title" class="text-[10px] font-bold tracking-wider uppercase text-[#5A6B65]">Administrasi</span>
                        <div class="w-8 h-8 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] flex items-center justify-center group-hover:bg-[#0D6E5B] group-hover:text-white transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                    </div>
                    <div class="text-2xl font-black text-[#0D6E5B]">15 <span data-i18n="agregat_kpi1_unit" class="text-xs font-semibold text-[#5A6B65]">Kec</span></div>
                    <div data-i18n="agregat_kpi1_sub" class="text-[11px] text-[#5A6B65] mt-0.5">127 Desa • 6 Kelurahan</div>
                </div>

                <!-- KPI 2: Sentra IMK -->
                <div class="p-4 rounded-3xl bg-[#FDFDFB] hover:bg-white border border-[#5A6B65]/20 hover:border-[#0D6E5B] shadow-[0_2px_10px_rgba(13,110,91,0.04)] hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between text-slate-400 mb-2.5">
                        <span data-i18n="agregat_kpi2_title" class="text-[10px] font-bold tracking-wider uppercase text-[#5A6B65]">Sentra & IMK</span>
                        <div class="w-8 h-8 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] flex items-center justify-center group-hover:bg-[#0D6E5B] group-hover:text-white transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                    </div>
                    <div class="text-2xl font-black text-[#0D6E5B]">3.622 <span data-i18n="agregat_kpi2_unit" class="text-xs font-semibold text-[#5A6B65]">Unit</span></div>
                    <div data-i18n="agregat_kpi2_sub" class="text-[11px] text-[#5A6B65] mt-0.5">Juara: Porehu (1.440)</div>
                </div>

                <!-- KPI 3: Listrik PLN -->
                <div class="p-4 rounded-3xl bg-[#FDFDFB] hover:bg-white border border-[#5A6B65]/20 hover:border-[#0D6E5B] shadow-[0_2px_10px_rgba(13,110,91,0.04)] hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between text-slate-400 mb-2.5">
                        <span data-i18n="agregat_kpi3_title" class="text-[10px] font-bold tracking-wider uppercase text-[#5A6B65]">Listrik PLN</span>
                        <div class="w-8 h-8 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] flex items-center justify-center group-hover:bg-[#0D6E5B] group-hover:text-white transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                    </div>
                    <div class="text-2xl font-black text-[#0D6E5B]">38.077 <span data-i18n="agregat_kpi3_unit" class="text-xs font-semibold text-[#5A6B65]">KK</span></div>
                    <div data-i18n="agregat_kpi3_sub" class="text-[11px] text-[#5A6B65] mt-0.5">Rasio 91,5% Elektrifikasi</div>
                </div>

                <!-- KPI 4: Pendidikan -->
                <div class="p-4 rounded-3xl bg-[#FDFDFB] hover:bg-white border border-[#5A6B65]/20 hover:border-[#0D6E5B] shadow-[0_2px_10px_rgba(13,110,91,0.04)] hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between text-slate-400 mb-2.5">
                        <span data-i18n="agregat_kpi4_title" class="text-[10px] font-bold tracking-wider uppercase text-[#5A6B65]">Pendidikan</span>
                        <div class="w-8 h-8 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] flex items-center justify-center group-hover:bg-[#0D6E5B] group-hover:text-white transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5"/></svg>
                        </div>
                    </div>
                    <div class="text-2xl font-black text-[#0D6E5B]">205 <span data-i18n="agregat_kpi4_unit" class="text-xs font-semibold text-[#5A6B65]">Sek</span></div>
                    <div data-i18n="agregat_kpi4_sub" class="text-[11px] text-[#5A6B65] mt-0.5">124 SD/MI • 54 SMP • 26 SMA/K</div>
                </div>

                <!-- KPI 5: Kesehatan -->
                <div class="p-4 rounded-3xl bg-[#FDFDFB] hover:bg-white border border-[#5A6B65]/20 hover:border-[#0D6E5B] shadow-[0_2px_10px_rgba(13,110,91,0.04)] hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between text-slate-400 mb-2.5">
                        <span data-i18n="agregat_kpi5_title" class="text-[10px] font-bold tracking-wider uppercase text-[#5A6B65]">Kesehatan</span>
                        <div class="w-8 h-8 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] flex items-center justify-center group-hover:bg-[#0D6E5B] group-hover:text-white transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m-2-2h4"/></svg>
                        </div>
                    </div>
                    <div class="text-2xl font-black text-[#0D6E5B]">174 <span data-i18n="agregat_kpi5_unit" class="text-xs font-semibold text-[#5A6B65]">Faskes</span></div>
                    <div data-i18n="agregat_kpi5_sub" class="text-[11px] text-[#5A6B65] mt-0.5">1 RS • 16 Puskesmas • 28 Pustu</div>
                </div>

                <!-- KPI 6: BUMDes & Aparat -->
                <div class="p-4 rounded-3xl bg-[#FDFDFB] hover:bg-white border border-[#5A6B65]/20 hover:border-[#0D6E5B] shadow-[0_2px_10px_rgba(13,110,91,0.04)] hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between text-slate-400 mb-2.5">
                        <span data-i18n="agregat_kpi6_title" class="text-[10px] font-bold tracking-wider uppercase text-[#5A6B65]">BUMDes & Aparat</span>
                        <div class="w-8 h-8 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] flex items-center justify-center group-hover:bg-[#0D6E5B] group-hover:text-white transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                    </div>
                    <div class="text-2xl font-black text-[#0D6E5B]">134 <span data-i18n="agregat_kpi6_unit" class="text-xs font-semibold text-[#5A6B65]">BUMDes</span></div>
                    <div data-i18n="agregat_kpi6_sub" class="text-[11px] text-[#5A6B65] mt-0.5">1.164 Aparatur Desa Aktif</div>
                </div>
            </div>

            <!-- 2. EXECUTIVE HIGHLIGHTS (SOROTAN TIGA WILAYAH UNGGULAN - ELEGAN & RINGKAS) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <!-- Highlight 1: Sentra IMK -->
                <div onclick="window.PresisiEngine.onKecamatanChange('Porehu'); document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});"
                     class="cursor-pointer group flex items-center justify-between p-3.5 rounded-2xl bg-white hover:bg-[#FDFDFB] border border-[#5A6B65]/15 hover:border-[#0D6E5B] shadow-2xs hover:shadow-sm transition-all duration-200">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-9 h-9 rounded-xl bg-amber-500/10 text-amber-800 font-extrabold text-xs flex items-center justify-center shrink-0 border border-amber-500/20">
                            #1
                        </div>
                        <div class="min-w-0">
                            <div data-i18n="agregat_h1_title" class="text-[10px] font-bold uppercase tracking-wider text-[#5A6B65]">Sentra Industri Mikro</div>
                            <div class="text-xs font-black text-slate-800 group-hover:text-[#0D6E5B] transition-colors truncate">
                                Kec. Porehu <span data-i18n="agregat_h1_desa" class="font-normal text-[#5A6B65]">• 8 Desa</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right shrink-0 pl-2">
                        <span class="text-sm font-black text-amber-800">1.440</span>
                        <span data-i18n="agregat_h1_unit" class="block text-[9px] font-semibold text-[#5A6B65]">Unit IMK</span>
                    </div>
                </div>

                <!-- Highlight 2: Listrik & Populasi -->
                <div onclick="window.PresisiEngine.onKecamatanChange('Lasusua'); document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});"
                     class="cursor-pointer group flex items-center justify-between p-3.5 rounded-2xl bg-white hover:bg-[#FDFDFB] border border-[#5A6B65]/15 hover:border-[#0D6E5B] shadow-2xs hover:shadow-sm transition-all duration-200">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-9 h-9 rounded-xl bg-emerald-500/10 text-[#0D6E5B] font-extrabold text-xs flex items-center justify-center shrink-0 border border-emerald-500/20">
                            #1
                        </div>
                        <div class="min-w-0">
                            <div data-i18n="agregat_h2_title" class="text-[10px] font-bold uppercase tracking-wider text-[#5A6B65]">Populasi & Elektrifikasi</div>
                            <div class="text-xs font-black text-slate-800 group-hover:text-[#0D6E5B] transition-colors truncate">
                                Kec. Lasusua <span data-i18n="agregat_h2_desa" class="font-normal text-[#5A6B65]">• Ibu Kota</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right shrink-0 pl-2">
                        <span class="text-sm font-black text-[#0D6E5B]">8.463</span>
                        <span data-i18n="agregat_h2_unit" class="block text-[9px] font-semibold text-[#5A6B65]">KK Listrik</span>
                    </div>
                </div>

                <!-- Highlight 3: Layanan Sosial -->
                <div onclick="window.PresisiEngine.onKecamatanChange('Lasusua'); document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});"
                     class="cursor-pointer group flex items-center justify-between p-3.5 rounded-2xl bg-white hover:bg-[#FDFDFB] border border-[#5A6B65]/15 hover:border-[#0D6E5B] shadow-2xs hover:shadow-sm transition-all duration-200">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-9 h-9 rounded-xl bg-blue-500/10 text-blue-700 font-extrabold text-xs flex items-center justify-center shrink-0 border border-blue-500/20">
                            #1
                        </div>
                        <div class="min-w-0">
                            <div data-i18n="agregat_h3_title" class="text-[10px] font-bold uppercase tracking-wider text-[#5A6B65]">Fasilitas Pendidikan & Faskes</div>
                            <div class="text-xs font-black text-slate-800 group-hover:text-[#0D6E5B] transition-colors truncate">
                                Kec. Lasusua <span data-i18n="agregat_h3_desa" class="font-normal text-[#5A6B65]">• Sentra Sosial</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right shrink-0 pl-2">
                        <span class="text-sm font-black text-blue-800">33 Sek • 19 Fas</span>
                        <span data-i18n="agregat_h3_unit" class="block text-[9px] font-semibold text-[#5A6B65]">Layanan Terlengkap</span>
                    </div>
                </div>
            </div>

            <!-- 3. INTERACTIVE CONTROL BAR (SEKTOR TABS, SEARCH BAR, SORTING) -->
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-2xs p-4 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <!-- Left: Sektor Tabs Filter Pills -->
                <div class="flex items-center gap-1.5 overflow-x-auto pb-1 lg:pb-0 scrollbar-none" id="agregatSectorPills">
                    <button type="button" onclick="window.PresisiEngine.setAgregatSector('all')" data-sec="all" class="agregat-sec-btn active px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1.5 shrink-0 bg-[#0D6E5B] text-white shadow-xs">
                        <svg class="w-3.5 h-3.5 text-current" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg><span data-i18n="agregat_sec_all">Semua Sektor</span>
                    </button>
                    <button type="button" onclick="window.PresisiEngine.setAgregatSector('ekonomi')" data-sec="ekonomi" class="agregat-sec-btn px-3.5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-1.5 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700">
                        <svg class="w-3.5 h-3.5 text-current" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span data-i18n="agregat_sec_ekonomi">Ekonomi & 3.622 IMK</span>
                    </button>
                    <button type="button" onclick="window.PresisiEngine.setAgregatSector('lingkungan')" data-sec="lingkungan" class="agregat-sec-btn px-3.5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-1.5 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700">
                        <svg class="w-3.5 h-3.5 text-current" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg><span data-i18n="agregat_sec_lingkungan">Kelistrikan & Lingkungan</span>
                    </button>
                    <button type="button" onclick="window.PresisiEngine.setAgregatSector('pendidikan')" data-sec="pendidikan" class="agregat-sec-btn px-3.5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-1.5 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700">
                        <svg class="w-3.5 h-3.5 text-current" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5"/></svg><span data-i18n="agregat_sec_pendidikan">Pendidikan (205 Unit)</span>
                    </button>
                    <button type="button" onclick="window.PresisiEngine.setAgregatSector('kesehatan')" data-sec="kesehatan" class="agregat-sec-btn px-3.5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-1.5 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700">
                        <svg class="w-3.5 h-3.5 text-current" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m-2-2h4"/></svg><span data-i18n="agregat_sec_kesehatan">Kesehatan (174 Unit)</span>
                    </button>
                    <button type="button" onclick="window.PresisiEngine.setAgregatSector('pemerintahan')" data-sec="pemerintahan" class="agregat-sec-btn px-3.5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-1.5 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700">
                        <svg class="w-3.5 h-3.5 text-current" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg><span data-i18n="agregat_sec_pemerintahan">BUMDes & Pemerintahan</span>
                    </button>
                </div>

                <!-- Right: Search & Sort Controls -->
                <div class="flex items-center gap-2.5 shrink-0 flex-wrap sm:flex-nowrap">
                    <!-- Search Input -->
                    <div class="relative w-full sm:w-60">
                        <svg class="w-3.5 h-3.5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input id="inputSearchKecamatanCard" data-i18n-ph="agregat_search_ph" type="text" oninput="window.PresisiEngine.onSearchKecamatanCard(this.value)" placeholder="Cari kecamatan..." class="w-full pl-8 pr-3 py-1.5 text-xs bg-slate-50 border border-slate-200 rounded-xl font-medium text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-[#0D6E5B]">
                    </div>

                    <!-- Sort Dropdown -->
                    <select id="selectSortKecamatanCard" onchange="window.PresisiEngine.onSortKecamatanCard(this.value)" class="text-xs bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5 font-bold text-slate-700 focus:outline-none focus:border-[#0D6E5B]">
                        <option value="geo" data-i18n="agregat_sort_geo">Urutkan: Geografis (Utara-Selatan)</option>
                        <option value="imk" data-i18n="agregat_sort_imk">Urutkan: IMK Terbanyak</option>
                        <option value="pln" data-i18n="agregat_sort_pln">Urutkan: Listrik PLN Terbanyak</option>
                        <option value="desa" data-i18n="agregat_sort_desa">Urutkan: Jumlah Desa Terbanyak</option>
                        <option value="sekolah" data-i18n="agregat_sort_sekolah">Urutkan: Sarana Pendidikan</option>
                        <option value="faskes" data-i18n="agregat_sort_faskes">Urutkan: Sarana Kesehatan</option>
                        <option value="bumdes" data-i18n="agregat_sort_bumdes">Urutkan: BUMDes Terbanyak</option>
                    </select>
                </div>
            </div>

            <!-- 4. THE 15 KECAMATAN INTERACTIVE CARDS GRID -->
            <div id="gridKecamatanCards" class="w-full flex flex-col space-y-10 sm:space-y-14 relative">
                <!-- Rendered dynamically by PresisiEngine.renderAgregatKecamatanSection() -->
            </div>

            <!-- Bottom Hint Indicator -->
            <div class="text-center pt-2">
                <p class="text-xs text-slate-500 flex items-center justify-center gap-1.5">
                    <span data-i18n="agregat_bottom_hint" class="flex items-center gap-1.5"><svg class="w-4 h-4 text-[#0D6E5B] inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg><b>Tips:</b> Klik tombol <b>"Buka di Peta WebGIS ↓"</b> pada kartu kecamatan di atas untuk langsung menganalisis sebaran desa dan metrik spasial secara interaktif.</span>
                </p>
            </div>

        </div>
    </section>

<main class="flex-1 w-full px-4 lg:px-8 py-6 max-w-[1720px] mx-auto space-y-8">

        <!-- ========================================================================= -->
        <!-- MODUL UTAMA: DATA DESA PRESISI KABUPATEN KOLAKA UTARA                     -->
        <!-- Layout Presisi Identik Referensi: Klaster PODES BPS 2025 • Filter Sidebar -->
        <!-- ========================================================================= -->
        <div id="sectionPeta" class="scroll-mt-24"></div>
        <section id="sectionDesaPresisi" class="w-full space-y-4 scroll-mt-20">

            <!-- ========================================================================= -->
            <!-- UNIFIED PRESISI CONTROL BAR (IDENTIK FORMAT REFERENSI DESA PRESISI)       -->
            <!-- Row 1: Kapsul Klaster Data Sheet Excel • Row 2: View Switcher (Peta/Analisis) -->
            <!-- ========================================================================= -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200/90 p-3 space-y-3">
                <!-- ROW 1: 6 Kapsul Klaster Data Sheet Excel Sesuai Permintaan -->
                <div class="flex items-center justify-between gap-3 flex-wrap pb-2 border-b border-slate-100">
                    <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none flex-1">
                        <!-- Pill 1: Sarana Ekonomi (Active Default) -->
                        <button type="button" onclick="window.PresisiEngine.setCategory('ekonomi')" id="pill-cat-ekonomi" class="presisi-cat-pill active px-4 py-2 rounded-full text-xs font-bold transition flex items-center gap-2 shrink-0 bg-[#0D6E5B] text-white shadow-xs" data-category="ekonomi">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span data-i18n="pill_cat_ekonomi">Sarana Ekonomi</span>
                            <svg class="w-3 h-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <!-- Pill 2: Perumahan & Lingkungan -->
                        <button type="button" onclick="window.PresisiEngine.setCategory('lingkungan')" id="pill-cat-lingkungan" class="presisi-cat-pill px-4 py-2 rounded-full text-xs font-semibold transition flex items-center gap-2 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200/60" data-category="lingkungan">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <span data-i18n="pill_cat_lingkungan">Perumahan & Lingkungan</span>
                            <svg class="w-3 h-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <!-- Pill 3: Pendidikan & Kesehatan -->
                        <button type="button" onclick="window.PresisiEngine.setCategory('sosial')" id="pill-cat-sosial" class="presisi-cat-pill px-4 py-2 rounded-full text-xs font-semibold transition flex items-center gap-2 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200/60" data-category="sosial">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                            <span data-i18n="pill_cat_sosial">Pendidikan & Kesehatan</span>
                            <svg class="w-3 h-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <!-- Pill 4: Keuangan & Aset Desa -->
                        <button type="button" onclick="window.PresisiEngine.setCategory('keuangan')" id="pill-cat-keuangan" class="presisi-cat-pill px-4 py-2 rounded-full text-xs font-semibold transition flex items-center gap-2 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200/60" data-category="keuangan">
                            <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                            <span data-i18n="pill_cat_keuangan">Keuangan & Aset Desa</span>
                            <svg class="w-3 h-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <!-- Pill 5: Keterangan Umum -->
                        <button type="button" onclick="window.PresisiEngine.setCategory('umum')" id="pill-cat-umum" class="presisi-cat-pill px-4 py-2 rounded-full text-xs font-semibold transition flex items-center gap-2 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200/60" data-category="umum">
                            <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            <span data-i18n="pill_cat_umum">Keterangan Umum</span>
                            <svg class="w-3 h-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <!-- Pill 6: Pemerintah Desa -->
                        <button type="button" onclick="window.PresisiEngine.setCategory('pemerintah')" id="pill-cat-pemerintah" class="presisi-cat-pill px-4 py-2 rounded-full text-xs font-semibold transition flex items-center gap-2 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200/60" data-category="pemerintah">
                            <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                            <span data-i18n="pill_cat_pemerintah">Pemerintah Desa</span>
                            <svg class="w-3 h-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                    </div>

                    <!-- Right Side: Peta Tematik Toggle -->
                    <div class="flex items-center gap-2.5 pl-3 border-l border-slate-200 shrink-0">
                        <span data-i18n="label_peta_tematik" class="text-xs font-bold text-slate-700">Peta Tematik</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="presisiToggleTematik" checked onchange="window.PresisiEngine.toggleTematik(this.checked)" class="sr-only peer">
                            <div class="w-10 h-5 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#0D6E5B]"></div>
                        </label>
                    </div>
                </div>

                <!-- ROW 2: VIEW MODE SWITCHER BAR (PETA | ANALISIS | TABEL 133 DESA | PETA & ANALISIS TOGGLE) -->
                <div class="flex items-center justify-between gap-3 flex-wrap pt-0.5">
                    <!-- Segmented Tab Buttons -->
                    <div class="flex items-center gap-1.5">
                        <button type="button" onclick="window.PresisiEngine.setViewMode('peta')" id="btnViewPeta" class="presisi-view-btn active px-5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 bg-[#0D6E5B] text-white shadow-xs">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                            <span data-i18n="btn_view_peta">Peta</span>
                        </button>
                        <button type="button" onclick="window.PresisiEngine.setViewMode('analisis')" id="btnViewAnalisis" class="presisi-view-btn px-5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            <span data-i18n="btn_view_analisis">Analisis</span>
                        </button>
                        <button type="button" onclick="window.PresisiEngine.setViewMode('tabel')" id="btnViewTabel" class="presisi-view-btn px-5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            <span data-i18n="btn_view_tabel">Tabel Data (133 Desa)</span>
                        </button>
                    </div>

                    <!-- Split View Toggle -->
                    <div class="flex items-center gap-2.5 px-3 py-1">
                        <span data-i18n="label_split_view" class="text-xs font-bold text-slate-600">Peta & Analisis</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="presisiToggleSplit" onchange="window.PresisiEngine.toggleSplitView(this.checked)" class="sr-only peer">
                            <div class="w-10 h-5 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#059669]"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- 3. WORKSPACE GRID: LEFT CONTROL SIDEBAR (FILTER + RINGKASAN) + RIGHT MAIN VIEWPORT -->
            <div id="presisiWorkspaceGrid" class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-start">
                
                <!-- ============================================== -->
                <!-- LEFT CONTROL SIDEBAR (lg:col-span-4 xl:col-span-3) -->
                <!-- ============================================== -->
                <div class="lg:col-span-4 xl:col-span-3 space-y-4">
                    
                    <!-- CARD 1: FILTER WILAYAH (EXACT DESA PRESISI STYLE) -->
                    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-4 space-y-3.5">
                        <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                            <span class="font-bold text-xs text-slate-800 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span data-i18n="sidebar_filter_title">Filter Wilayah</span>
                            </span>
                            <button type="button" onclick="window.PresisiEngine.resetFilter()" data-i18n="sidebar_reset" class="text-[11px] text-blue-600 hover:text-blue-800 font-bold underline">Reset</button>
                        </div>

                        <!-- Provinsi -->
                        <div>
                            <label data-i18n="sidebar_lbl_prov" class="block text-[11px] font-bold text-slate-500 mb-1">Provinsi</label>
                            <div class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-semibold text-slate-700 flex items-center justify-between">
                                <span data-i18n="sidebar_val_prov">Sulawesi Tenggara</span>
                                <span class="text-[10px] text-slate-400 font-mono">74</span>
                            </div>
                        </div>

                        <!-- Kabupaten/Kota -->
                        <div>
                            <label data-i18n="sidebar_lbl_kab" class="block text-[11px] font-bold text-slate-500 mb-1">Kabupaten/Kota</label>
                            <div class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-semibold text-slate-700 flex items-center justify-between">
                                <span data-i18n="sidebar_val_kab">Kolaka Utara</span>
                                <span class="text-[10px] text-slate-400 font-mono">74.08</span>
                            </div>
                        </div>

                        <!-- Kecamatan Select -->
                        <div>
                            <label data-i18n="sidebar_lbl_kec" for="presisiSelectKecamatan" class="block text-[11px] font-bold text-slate-700 mb-1">Kecamatan</label>
                            <select id="presisiSelectKecamatan" onchange="window.PresisiEngine.onKecamatanChange(this.value)" class="w-full bg-white border border-slate-300 hover:border-blue-600 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 rounded-xl px-3 py-2 text-xs font-bold text-slate-800 transition">
                                <option value="ALL">Pilih Kab/Kota (Semua 15 Kecamatan)</option>
                            </select>
                        </div>

                        <!-- Desa Select -->
                        <div>
                            <label data-i18n="sidebar_lbl_desa" for="presisiSelectDesa" class="block text-[11px] font-bold text-slate-700 mb-1">Desa / Kelurahan</label>
                            <select id="presisiSelectDesa" onchange="window.PresisiEngine.onDesaChange(this.value)" class="w-full bg-white border border-slate-300 hover:border-blue-600 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 rounded-xl px-3 py-2 text-xs font-semibold text-slate-800 transition">
                                <option value="ALL">Pilih Kecamatan (Semua 133 Desa)</option>
                            </select>
                        </div>

                        <!-- Tingkat Administratif Segmented Buttons -->
                        <div>
                            <label data-i18n="sidebar_lbl_admin" class="block text-[11px] font-bold text-slate-500 mb-1.5">Tingkat Administratif</label>
                            <div class="grid grid-cols-4 gap-1 bg-slate-100 p-1 rounded-xl text-center text-xs font-bold">
                                <button type="button" onclick="window.PresisiEngine.setAdminLevel('provinsi')" id="btnAdminLevelProv" class="admin-level-btn py-1.5 rounded-lg text-slate-400 hover:text-slate-600 transition" title="Provinsi Sulawesi Tenggara">Prov</button>
                                <button type="button" onclick="window.PresisiEngine.setAdminLevel('kabupaten')" id="btnAdminLevelKab" class="admin-level-btn active py-1.5 rounded-lg bg-[#0D6E5B] text-white shadow-2xs transition">Kab</button>
                                <button type="button" onclick="window.PresisiEngine.setAdminLevel('kecamatan')" id="btnAdminLevelKec" class="admin-level-btn py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition">Kec</button>
                                <button type="button" onclick="window.PresisiEngine.setAdminLevel('desa')" id="btnAdminLevelDesa" class="admin-level-btn py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition">Desa</button>
                            </div>
                        </div>
                    </div>

                    <!-- CARD 2: RINGKASAN EKSEKUTIF -->
                    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-4 space-y-3">
                        <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                            <span class="font-extrabold text-xs text-slate-800 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                <span data-i18n="sidebar_summary_title">Ringkasan Eksekutif</span>
                            </span>
                            <span id="presisiScopeBadge" data-i18n="sidebar_scope_kab" class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-800 font-bold text-[10px] border border-emerald-200">
                                Kabupaten
                            </span>
                        </div>

                        <div id="presisiBreadcrumbText" class="text-xs font-extrabold text-[#0b2545]">
                            Kabupaten Kolaka Utara
                        </div>

                        <!-- 4 Dynamic KPI metric tiles -->
                        <div id="presisiKpiGrid" class="grid grid-cols-2 gap-2 text-xs">
                            <!-- Populated dynamically via PresisiEngine -->
                        </div>

                        <!-- Quick insight summary -->
                        <div id="presisiExecutiveInsight" class="text-[11px] text-slate-600 bg-slate-50 p-2.5 rounded-xl border border-slate-100 leading-relaxed">
                            <!-- Populated dynamically via PresisiEngine -->
                        </div>
                    </div>

                    <!-- CARD 3: NAVIGASI CEPAT DESA DI WILAYAH AKTIF -->
                    <div id="presisiNavigasiDesaCard" class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-4 space-y-3">
                        <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                            <span class="font-extrabold text-xs text-slate-800 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <span data-i18n="sidebar_village_list_title">Daftar Desa di Wilayah</span>
                            </span>
                            <span id="badgeJumlahDesaWilayah" data-i18n="sidebar_badge_desa" class="text-[10px] font-bold text-slate-500 font-mono bg-slate-100 px-2 py-0.5 rounded-full">
                                133 Desa
                            </span>
                        </div>
                        <div id="presisiQuickVillageList" class="flex flex-wrap gap-1.5 max-h-[260px] overflow-y-auto pr-1">
                            <!-- Populated dynamically via PresisiEngine -->
                        </div>
                    </div>

                </div>

                <!-- ============================================== -->
                <!-- RIGHT MAIN VIEWPORT CANVAS (lg:col-span-8 xl:col-span-9) -->
                <!-- ============================================== -->
                <div class="lg:col-span-8 xl:col-span-9 space-y-4">
                    
                    <!-- PANE 1: PETA WEBGIS INTERAKTIF -->
                    <div id="presisiPanePeta" class="presisi-pane w-full bg-white rounded-2xl border border-slate-200/90 shadow-xs p-3 space-y-3">
                        <!-- Top Map Sub-toolbar -->
                        <div class="flex items-center justify-between flex-wrap gap-2 text-xs pb-2 border-b border-slate-100">
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-100 text-slate-800 font-bold border border-slate-200">
                                    <svg class="w-3.5 h-3.5 text-[#0b2545]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                    <span id="labelPresisiUnitAnalisis" data-i18n="map_unit_analisis">Unit Analisis: Wilayah Administrasi</span>
                                </div>
                                <span id="presisiMapMetricIndicator" class="text-[11px] font-bold text-[#0D6E5B] bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200">
                                    Metrik: Total IMK (Unit Usaha)
                                </span>
                            </div>

                            <div class="flex items-center gap-1.5">
                                <button type="button" onclick="window.PresisiEngine.resetMapView()" class="px-2.5 py-1 rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-700 font-semibold flex items-center gap-1 transition text-[11px]">
                                    <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                    <span data-i18n="map_reset_zoom">Reset Zoom</span>
                                </button>
                                <button type="button" onclick="window.PresisiEngine.toggleMapFullscreen()" class="p-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-600 transition" title="Layar Penuh">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                                </button>
                            </div>
                        </div>

                        <!-- Leaflet Map Container -->
                        <div id="presisiMapContainer" class="relative w-full rounded-xl overflow-hidden border border-slate-200 shadow-inner" style="height: 640px; min-height: 640px; background-color: #0b192c;">
                            <div id="mapPresisi" class="w-full h-full z-10" style="height: 100%; min-height: 640px;"></div>
                        </div>

                        <!-- Interactive Guide Caption -->
                        <div class="flex items-center justify-between text-[11px] text-slate-500 pt-0.5">
                            <span class="flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span data-i18n="map_guide_caption"><b>Panduan:</b> Klik poligon kecamatan untuk zoom & melihat desa • Klik nama desa untuk membuka Rapor Presisi.</span>
                            </span>
                            <span class="font-mono text-[10px] text-slate-400">PODES BPS 2025</span>
                        </div>
                    </div>

                    <!-- PANE 2: ANALISIS VIEW (EXPANDED EXECUTIVE ANALYTICAL DASHBOARD) -->
                    <div id="presisiPaneAnalisis" class="presisi-pane hidden w-full space-y-5">
                        <!-- Header: Title & Category Pill -->
                        <div class="bg-[#FDFDFB] rounded-3xl border border-[#5A6B65]/20 shadow-[0_2px_12px_rgba(13,110,91,0.04)] p-5 flex items-center justify-between flex-wrap gap-3">
                            <div class="space-y-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-[#0D6E5B] animate-pulse"></span>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#0D6E5B]">Portal Analisis Statistik Sektoral</span>
                                </div>
                                <h3 id="presisiAnalisisTitle" class="text-lg sm:text-xl font-extrabold text-[#0D6E5B]">
                                    Visualisasi Analisis: Sarana Ekonomi & Industri
                                </h3>
                                <p class="text-xs text-[#5A6B65]">
                                    Telaah komparatif berbasis 41 tabel statistik Potensi Desa (PODES BPS 2025) se-Kabupaten Kolaka Utara
                                </p>
                            </div>
                            <span id="presisiAnalisisBadge" class="px-3.5 py-1.5 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] font-bold text-xs border border-[#0D6E5B]/25 shadow-2xs">
                                Sheet Sarana Ekonomi
                            </span>
                        </div>

                        <!-- 1. Executive Metric Strip: 4 Key Analytical Tiles -->
                        <div id="presisiAnalisisMetricStrip" class="grid grid-cols-2 lg:grid-cols-4 gap-3.5">
                            <!-- Tile 1 -->
                            <div class="bg-[#FDFDFB] p-4 rounded-2xl border border-[#5A6B65]/15 shadow-2xs">
                                <span id="analisisKpiLabel1" class="text-[10px] font-bold text-[#5A6B65] uppercase tracking-wider block">Total Volume Sektor</span>
                                <div id="analisisKpiVal1" class="text-xl sm:text-2xl font-black text-[#0D6E5B] mt-1">3.622 Unit</div>
                                <span id="analisisKpiSub1" class="text-[11px] text-[#5A6B65] block mt-0.5">Akumulasi 15 Kecamatan</span>
                            </div>
                            <!-- Tile 2 -->
                            <div class="bg-[#FDFDFB] p-4 rounded-2xl border border-[#5A6B65]/15 shadow-2xs">
                                <span id="analisisKpiLabel2" class="text-[10px] font-bold text-[#5A6B65] uppercase tracking-wider block">Sentra / Wilayah Tertinggi</span>
                                <div id="analisisKpiVal2" class="text-xl sm:text-2xl font-black text-[#0D6E5B] mt-1">Kec. Porehu</div>
                                <span id="analisisKpiSub2" class="text-[11px] text-[#5A6B65] block mt-0.5">1.440 Unit (39,8% Kab)</span>
                            </div>
                            <!-- Tile 3 -->
                            <div class="bg-[#FDFDFB] p-4 rounded-2xl border border-[#5A6B65]/15 shadow-2xs">
                                <span id="analisisKpiLabel3" class="text-[10px] font-bold text-[#5A6B65] uppercase tracking-wider block">Rata-Rata per Wilayah</span>
                                <div id="analisisKpiVal3" class="text-xl sm:text-2xl font-black text-[#0D6E5B] mt-1">241,5 Unit</div>
                                <span id="analisisKpiSub3" class="text-[11px] text-[#5A6B65] block mt-0.5">Baseline per Kecamatan</span>
                            </div>
                            <!-- Tile 4 -->
                            <div class="bg-[#FDFDFB] p-4 rounded-2xl border border-[#5A6B65]/15 shadow-2xs">
                                <span id="analisisKpiLabel4" class="text-[10px] font-bold text-[#5A6B65] uppercase tracking-wider block">Ketercakupan Wilayah</span>
                                <div id="analisisKpiVal4" class="text-xl sm:text-2xl font-black text-[#0D6E5B] mt-1">100% Wilayah</div>
                                <span id="analisisKpiSub4" class="text-[11px] text-[#5A6B65] block mt-0.5">Tersebar di 133 Desa</span>
                            </div>
                        </div>

                        <!-- 2. 4 Analytical Charts Grid (2x2) -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <!-- Chart 1 Card: Sebaran Komparatif per Wilayah -->
                            <div class="bg-[#FDFDFB] rounded-3xl border border-[#5A6B65]/20 shadow-[0_2px_12px_rgba(13,110,91,0.04)] p-5 flex flex-col justify-between">
                                <div class="flex items-center justify-between pb-3 border-b border-[#5A6B65]/15 mb-3">
                                    <div>
                                        <span id="labelChart1Badge" class="text-[9px] font-bold text-[#0D6E5B] bg-[#0D6E5B]/10 px-2 py-0.5 rounded-full border border-[#0D6E5B]/20">TABEL 5.6</span>
                                        <h4 id="titleChart1" class="font-extrabold text-xs sm:text-sm text-[#0D6E5B] mt-1">Perbandingan IMK per Kecamatan</h4>
                                    </div>
                                    <span class="text-[10px] font-mono text-[#5A6B65]/70">Sebaran 15 Wilayah</span>
                                </div>
                                <div class="w-full h-[270px] relative">
                                    <canvas id="presisiChart1"></canvas>
                                </div>
                            </div>

                            <!-- Chart 2 Card: Komposisi Sektor Utama (Murni Sektor) -->
                            <div class="bg-[#FDFDFB] rounded-3xl border border-[#5A6B65]/20 shadow-[0_2px_12px_rgba(13,110,91,0.04)] p-5 flex flex-col justify-between">
                                <div class="flex items-center justify-between pb-3 border-b border-[#5A6B65]/15 mb-3">
                                    <div>
                                        <span id="labelChart2Badge" class="text-[9px] font-bold text-[#0D6E5B] bg-[#0D6E5B]/10 px-2 py-0.5 rounded-full border border-[#0D6E5B]/20">TABEL 5.1</span>
                                        <h4 id="titleChart2" class="font-extrabold text-xs sm:text-sm text-[#0D6E5B] mt-1">Proporsi Sarana Perdagangan</h4>
                                    </div>
                                    <span class="text-[10px] font-mono text-[#5A6B65]/70">Komposisi Sektor</span>
                                </div>
                                <div class="w-full h-[270px] relative">
                                    <canvas id="presisiChart2"></canvas>
                                </div>
                            </div>

                            <!-- Chart 3 Card: Top 5 vs Bottom 5 / Disparitas Wilayah -->
                            <div class="bg-[#FDFDFB] rounded-3xl border border-[#5A6B65]/20 shadow-[0_2px_12px_rgba(13,110,91,0.04)] p-5 flex flex-col justify-between">
                                <div class="flex items-center justify-between pb-3 border-b border-[#5A6B65]/15 mb-3">
                                    <div>
                                        <span id="labelChart3Badge" class="text-[9px] font-bold text-[#0D6E5B] bg-[#0D6E5B]/10 px-2 py-0.5 rounded-full border border-[#0D6E5B]/20">DISPARITAS</span>
                                        <h4 id="titleChart3" class="font-extrabold text-xs sm:text-sm text-[#0D6E5B] mt-1">Top 5 vs Bottom 5 Kecamatan</h4>
                                    </div>
                                    <span class="text-[10px] font-mono text-[#5A6B65]/70">Peringkat & Kesenjangan</span>
                                </div>
                                <!-- Legend Penjelas Warna Disparitas -->
                                <div class="flex items-center justify-between text-[10px] font-medium text-[#5A6B65] mb-2 px-2.5 py-1 rounded-lg bg-[#F7F7F5] border border-[#5A6B65]/15">
                                    <span class="flex items-center gap-1.5 font-semibold text-[#0D6E5B]">
                                        <span class="w-2.5 h-2.5 rounded-full bg-[#0D6E5B] inline-block shadow-xs"></span> Top 5 Sentra Terbanyak
                                    </span>
                                    <span class="flex items-center gap-1.5 font-semibold text-[#ea580c]">
                                        <span class="w-2.5 h-2.5 rounded-full bg-[#ea580c] inline-block shadow-xs"></span> 5 Terbawah (Prioritas Afirmasi)
                                    </span>
                                </div>
                                <div class="w-full h-[250px] relative">
                                    <canvas id="presisiChart3"></canvas>
                                </div>
                            </div>

                            <!-- Chart 4 Card: Struktur Sub-Sektor Pendukung -->
                            <div class="bg-[#FDFDFB] rounded-3xl border border-[#5A6B65]/20 shadow-[0_2px_12px_rgba(13,110,91,0.04)] p-5 flex flex-col justify-between">
                                <div class="flex items-center justify-between pb-3 border-b border-[#5A6B65]/15 mb-3">
                                    <div>
                                        <span id="labelChart4Badge" class="text-[9px] font-bold text-[#0D6E5B] bg-[#0D6E5B]/10 px-2 py-0.5 rounded-full border border-[#0D6E5B]/20">SUB-SEKTOR</span>
                                        <h4 id="titleChart4" class="font-extrabold text-xs sm:text-sm text-[#0D6E5B] mt-1">Akses Lembaga Keuangan & Modal</h4>
                                    </div>
                                    <span class="text-[10px] font-mono text-[#5A6B65]/70">Layanan Pendukung</span>
                                </div>
                                <div class="w-full h-[270px] relative">
                                    <canvas id="presisiChart4"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Evidence-Based Strategic Policy Brief (3 Actionable Pillars) -->
                        <div class="bg-[#FDFDFB] rounded-3xl border border-[#5A6B65]/20 shadow-[0_2px_12px_rgba(13,110,91,0.04)] p-5 sm:p-6 space-y-4">
                            <div class="flex items-center justify-between border-b border-[#5A6B65]/15 pb-3">
                                <span class="font-extrabold text-sm text-[#0D6E5B] flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#0D6E5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>Catatan Analitis & Rekomendasi Kebijakan PODES BPS 2025</span>
                                </span>
                                <span class="text-[10px] text-[#5A6B65] font-mono bg-[#0D6E5B]/8 px-2.5 py-1 rounded-full border border-[#0D6E5B]/15">Evidence-Based Policy</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                                <!-- Pillar 1: Dinamika Sektoral -->
                                <div class="bg-white/80 p-4 rounded-2xl border border-[#5A6B65]/10 space-y-1.5">
                                    <span class="font-extrabold text-[#0D6E5B] text-xs flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-[#0D6E5B]"></span>
                                        <span>Dinamika Distribusi Sektoral</span>
                                    </span>
                                    <p id="policyTextDinamika" class="text-[#5A6B65] leading-relaxed text-[11px]">
                                        Klaster industri mikro terkonsentrasi kuat di wilayah Porehu dan Ngapa dengan kontribusi komulatif mencapai lebih dari 53% total unit IMK kabupaten.
                                    </p>
                                </div>

                                <!-- Pillar 2: Disparitas Spasial -->
                                <div class="bg-white/80 p-4 rounded-2xl border border-[#5A6B65]/10 space-y-1.5">
                                    <span class="font-extrabold text-amber-800 text-xs flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                        <span>Tantangan Disparitas Wilayah</span>
                                    </span>
                                    <p id="policyTextDisparitas" class="text-[#5A6B65] leading-relaxed text-[11px]">
                                        Wilayah koridor selatan dan utara terluar (Tolala, Wawo, Tiwu) memerlukan stimulasi infrastruktur pendukung untuk mengejar kesenjangan sarana penunjang.
                                    </p>
                                </div>

                                <!-- Pillar 3: Rekomendasi Kebijakan -->
                                <div class="bg-white/80 p-4 rounded-2xl border border-[#5A6B65]/10 space-y-1.5">
                                    <span class="font-extrabold text-[#0D6E5B] text-xs flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                        <span>Rekomendasi Kebijakan Daerah</span>
                                    </span>
                                    <p id="policyTextRekomendasi" class="text-[#5A6B65] leading-relaxed text-[11px]">
                                        Akselerasi permodalan BUMDes bersama penyaluran Kredit Usaha Rakyat (KUR) terarah pada desa-desa berstatus Berkembang guna mendorong lompatan status menuju Desa Maju.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ========================================================================= -->
                    <!-- MASTER COMPONENT: RAPOR LENGKAP PROFIL DESA PRESISI (6 SEKTOR LENGKAP)    -->
                    <!-- ========================================================================= -->
                    <div id="presisiContainerRaporDesa" class="hidden bg-white rounded-2xl border border-slate-200/90 shadow-sm p-4 sm:p-6 space-y-5 transition-all duration-300">
                        <!-- Populated dynamically via PresisiEngine with 6 rich, balanced sector cards -->
                    </div>

                </div>

            </div>

            <!-- 4. FULL TABEL DATA 133 DESA (SHOWN WHEN 'TABEL' MODE IS ACTIVE) -->
            <div id="presisiViewTablePane" class="hidden w-full bg-white rounded-2xl border border-slate-200/90 shadow-xs p-4 space-y-3">
                <div class="flex items-center justify-between flex-wrap gap-3 pb-3 border-b border-slate-100 text-xs">
                    <div>
                        <h3 data-i18n="table_pane_title" class="font-extrabold text-sm text-[#0b2545]">
                            Tabulasi Lengkap Data PODES 2025 (133 Desa / Kelurahan)
                        </h3>
                        <p data-i18n="table_pane_desc" class="text-[11px] text-slate-500">
                            Pencarian instan, filter per wilayah, dan unduh data ke format spreadsheet (CSV).
                        </p>
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="button" onclick="window.PresisiEngine.exportCSV()" class="px-3.5 py-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold flex items-center gap-1.5 shadow-xs transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span data-i18n="table_btn_csv">Unduh CSV</span>
                        </button>
                    </div>
                </div>

                <!-- Table Controls (Search & Counter) -->
                <div class="flex items-center justify-between flex-wrap gap-2 text-xs">
                    <div class="flex-1 min-w-[240px] relative">
                        <input id="inputPresisiTableSearch" data-i18n-ph="table_search_ph" type="text" oninput="window.PresisiEngine.onTableSearch(this.value)" placeholder="Cari nama desa, kecamatan, atau komoditas..." class="w-full pl-8 pr-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:bg-white focus:border-blue-600 transition">
                        <svg class="w-4 h-4 text-slate-400 absolute left-2.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <span id="presisiTableCountBadge" data-i18n="table_count_badge" class="text-[11px] font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-xl border border-slate-200">
                        Menampilkan 133 dari 133 Desa
                    </span>
                </div>

                <!-- Table Container with Scroll -->
                <div class="overflow-x-auto rounded-xl border border-slate-200 max-h-[580px] overflow-y-auto">
                    <table id="tablePresisiComplete" class="w-full text-left text-xs border-collapse">
                        <thead id="theadPresisi" class="bg-slate-100 text-slate-700 font-bold sticky top-0 z-10 border-b border-slate-200">
                            <!-- Headers dynamically updated via PresisiEngine -->
                        </thead>
                        <tbody id="tbodyPresisi" class="divide-y divide-slate-100 font-medium text-slate-700">
                            <!-- Rows dynamically populated via PresisiEngine -->
                        </tbody>
                    </table>
                </div>
            </div>

        </section>



        <!-- ================================================================= -->
        <!-- SECTION: PROGRAM DESA CANTIK (DESA CINTA STATISTIK) BPS KOLUT    -->
        <!-- ================================================================= -->
        <section id="sectionDesaCantik" class="scroll-mt-24 space-y-6">
            <!-- Header Section -->
            <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-200 pb-4">
                <div class="space-y-1">
                    <div class="inline-flex items-center gap-1.5 text-xs font-bold text-rose-800 bg-rose-50 px-3 py-1 rounded-full border border-rose-200">
                        <svg class="w-3.5 h-3.5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        <span data-i18n="descan_eyebrow">Program Quick Win BPS RI • Desa Cinta Statistik (Desa Cantik)</span>
                    </div>
                    <h2 data-i18n="descan_title" class="text-2xl sm:text-3xl font-black text-[#0b2545] tracking-tight">
                        Program Desa Cantik Kabupaten Kolaka Utara
                    </h2>
                    <p data-i18n="descan_desc" class="text-xs sm:text-sm text-slate-500 max-w-3xl">
                        Akselerasi pembinaan statistik sektoral pada tingkat desa dan kelurahan oleh BPS Kabupaten Kolaka Utara guna mewujudkan tata kelola Satu Data Indonesia, literasi data aparatur desa, serta perencanaan pembangunan berbasis bukti.
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="/descan" class="text-xs bg-gradient-to-r from-emerald-600 to-[#0b2545] hover:from-emerald-500 hover:to-[#162d4a] text-white font-bold px-3.5 py-1.5 rounded-lg shadow-sm hover:shadow transition flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span data-i18n="descan_btn_dashboard">Dashboard DESCAN (6 Desa)</span>
                        <svg class="w-3.5 h-3.5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="https://kolutkab.bps.go.id" target="_blank" class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-3 py-1.5 rounded-lg border border-slate-200 transition flex items-center gap-1">
                        <span data-i18n="footer_btn_bps">Portal BPS</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
            </div>

            <!-- Top Banner / Highlights Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <div class="bg-gradient-to-br from-rose-50 to-white p-4 rounded-2xl border border-rose-100 shadow-2xs">
                    <span data-i18n="descan_stat1_title" class="text-[10px] font-bold text-rose-600 uppercase tracking-wider block">Target Pembinaan</span>
                    <div class="text-2xl sm:text-3xl font-black text-[#0b2545] mt-1">133 <span data-i18n="descan_stat1_unit">Desa</span></div>
                    <p data-i18n="descan_stat1_sub" class="text-[11px] text-slate-500 mt-0.5">15 Kecamatan Kolaka Utara</p>
                </div>
                <div class="bg-gradient-to-br from-emerald-50 to-white p-4 rounded-2xl border border-emerald-100 shadow-2xs">
                    <span data-i18n="descan_stat2_title" class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider block">Kaderisasi</span>
                    <div data-i18n="descan_stat2_val" class="text-2xl sm:text-3xl font-black text-emerald-800 mt-1">Agen Statistik</div>
                    <p data-i18n="descan_stat2_sub" class="text-[11px] text-slate-500 mt-0.5">Aparatur & Pemuda Desa</p>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-white p-4 rounded-2xl border border-blue-100 shadow-2xs">
                    <span data-i18n="descan_stat3_title" class="text-[10px] font-bold text-blue-600 uppercase tracking-wider block">Prinsip Data</span>
                    <div class="text-2xl sm:text-3xl font-black text-blue-800 mt-1">SDI Compliant</div>
                    <p data-i18n="descan_stat3_sub" class="text-[11px] text-slate-500 mt-0.5">Standar & Metadata Baku</p>
                </div>
                <div class="bg-gradient-to-br from-amber-50 to-white p-4 rounded-2xl border border-amber-100 shadow-2xs">
                    <span data-i18n="descan_stat4_title" class="text-[10px] font-bold text-amber-600 uppercase tracking-wider block">Output Utama</span>
                    <div data-i18n="descan_stat4_val" class="text-2xl sm:text-3xl font-black text-amber-800 mt-1">Monografi & WebGIS</div>
                    <p data-i18n="descan_stat4_sub" class="text-[11px] text-slate-500 mt-0.5">Profil & Spasial Desa</p>
                </div>
            </div>

            <!-- 4 Pillar Cards of Desa Cantik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Pilar 1 -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 p-5 flex flex-col justify-between transition-all duration-300 border-t-4 border-t-rose-500">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 text-sm">1. Peningkatan Literasi Statistik Desa</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Meningkatkan pemahaman perangkat desa dan komunitas lokal tentang pentingnya data statistik, tata cara pengumpulan data yang valid, serta pembentukan Agen Statistik Desa.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] font-bold text-rose-600 flex items-center gap-1">
                        <span>Edukasi & Kapasitas SDM Desa</span>
                    </div>
                </div>

                <!-- Pilar 2 -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 p-5 flex flex-col justify-between transition-all duration-300 border-t-4 border-t-blue-600">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 text-sm">2. Standardisasi & Metadata Baku</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Menerapkan kaidah Satu Data Indonesia (SDI), mencakup standarisasi konsep, variabel, klasifikasi, kode referensi desa, dan metadata kegiatan statistik agar data dapat diperbandingkan.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] font-bold text-blue-600 flex items-center gap-1">
                        <span>Standar Satu Data Indonesia</span>
                    </div>
                </div>

                <!-- Pilar 3 -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 p-5 flex flex-col justify-between transition-all duration-300 border-t-4 border-t-emerald-600">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 text-sm">3. Monografi & Diseminasi Digital</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Penyusunan buku monografi profil desa, booklet infografis statistik, dan integrasi data geospasial pada portal Desa Madani untuk kemudahan akses informasi publik secara terbuka.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] font-bold text-emerald-600 flex items-center gap-1">
                        <span>Publikasi Profil & Portal Terpadu</span>
                    </div>
                </div>

                <!-- Pilar 4 -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 p-5 flex flex-col justify-between transition-all duration-300 border-t-4 border-t-amber-500">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 text-sm">4. Kebijakan Berbasis Bukti (Evidence-Based)</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Pemanfaatan data statistik desa untuk perencanaan Musrenbangdes, pengentasan kemiskinan ekstrem, penanganan stunting, dan ketepatan sasaran alokasi Dana Desa (APBDes).
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] font-bold text-amber-600 flex items-center gap-1">
                        <span>Pembangunan Tepat Sasaran</span>
                    </div>
                </div>
            </div>

            <!-- Showcase Desa Cantik Binaan di Kolaka Utara -->
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm p-5 space-y-4">
                <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 pb-3">
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-sm flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                            <span>Model Percontohan & Tahapan Pembinaan Desa Cantik Kolaka Utara</span>
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">Desa-desa percontohan dengan implementasi tata kelola statistik terpadu di Kolaka Utara</p>
                    </div>
                    <span class="text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1 rounded-full border border-slate-200">
                        Model Kolaboratif BPS & Pemkab Kolut
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 rounded-xl border border-rose-100 bg-rose-50/40 space-y-3 hover:shadow-md transition">
                        <div class="flex items-center justify-between">
                            <span class="text-[11px] font-bold text-rose-700 bg-rose-100 px-2 py-0.5 rounded-md">Percontohan Utama</span>
                            <span class="text-[10px] text-slate-500">Kec. Lasusua</span>
                        </div>
                        <h4 class="font-black text-slate-900 text-base">Desa Lasusua</h4>
                        <p class="text-xs text-slate-600">Pusat pemerintahan dengan kelengkapan monografi digital, registrasi sosial ekonomi keluarga madani, dan integrasi ortofoto pemukiman.</p>
                        <div class="pt-2 border-t border-rose-100 flex items-center justify-between text-xs">
                            <span class="font-bold text-emerald-700 flex items-center gap-1">✓ Agen Statistik Aktif</span>
                            <a href="#sectionPeta" class="text-rose-600 hover:text-rose-700 font-bold hover:underline">Peta Spasial →</a>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl border border-emerald-100 bg-emerald-50/40 space-y-3 hover:shadow-md transition">
                        <div class="flex items-center justify-between">
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-md">Sentra Kakao</span>
                            <span class="text-[10px] text-slate-500">Kec. Lambai</span>
                        </div>
                        <h4 class="font-black text-slate-900 text-base">Desa Lambai</h4>
                        <p class="text-xs text-slate-600">Fokus pemetaan statistik potensi perkebunan kakao rakyat, data kelompok tani produktif, serta jalur distribusi logistik desa.</p>
                        <div class="pt-2 border-t border-emerald-100 flex items-center justify-between text-xs">
                            <span class="font-bold text-emerald-700 flex items-center gap-1">✓ Data Podes Valid</span>
                            <a href="#sectionPeta" class="text-emerald-700 hover:text-emerald-800 font-bold hover:underline">Peta Spasial →</a>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl border border-blue-100 bg-blue-50/40 space-y-3 hover:shadow-md transition">
                        <div class="flex items-center justify-between">
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-100 px-2 py-0.5 rounded-md">Pesisir & Bahari</span>
                            <span class="text-[10px] text-slate-500">Kec. Katoi</span>
                        </div>
                        <h4 class="font-black text-slate-900 text-base">Desa Tobaku</h4>
                        <p class="text-xs text-slate-600">Sentra konektivitas pelabuhan penyeberangan feri, pendataan nelayan tangkap, dan potensi industri maritim pesisir teluk bone.</p>
                        <div class="pt-2 border-t border-blue-100 flex items-center justify-between text-xs">
                            <span class="font-bold text-blue-700 flex items-center gap-1">✓ Integrasi WebGIS</span>
                            <a href="#sectionPeta" class="text-blue-600 hover:text-blue-700 font-bold hover:underline">Peta Spasial →</a>
                        </div>
                    </div>
                </div>

                <!-- Call to action inside Desa Cantik -->
                <div class="pt-2 flex flex-wrap items-center justify-between gap-3 text-xs bg-slate-50 p-3.5 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-2 text-slate-700">
                        <svg class="w-4 h-4 text-rose-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                        <span>Seluruh data indikator Desa Cantik terhubung secara langsung dengan modul <b>WebGIS Spasial</b> dan <b>11 Klaster Podes BPS</b>.</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="#sectionDataPodes" class="px-3.5 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition flex items-center gap-1 shadow-2xs">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                            <span>Eksplorasi Data Podes</span>
                        </a>
                        <a href="#sectionPeta" class="px-3.5 py-1.5 rounded-lg bg-[#0b2545] hover:bg-[#162d4a] text-white font-bold transition flex items-center gap-1 shadow-2xs">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                            <span>Buka WebGIS</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>


        <!-- SECTION: TENTANG DESA MADANI & 4 PILAR KEMANDIRIAN -->
        <section id="sectionAbout" class="scroll-mt-24 space-y-6">
            <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-200 pb-4">
                <div>
                    <div class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200 mb-1">
                        <svg class="w-3.5 h-3.5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                        <span data-i18n="about_eyebrow">Konsep & Metodologi Resmi Desa Madani</span>
                    </div>
                    <h2 data-i18n="about_title" class="text-2xl font-extrabold text-[#0b2545] tracking-tight">
                        Tentang Inisiatif Desa Madani
                    </h2>
                    <p data-i18n="about_desc" class="text-xs sm:text-sm text-slate-500">
                        Inovasi terpadu memadukan data statistik potensi desa (Podes BPS) dan pemetaan spasial tematik untuk mewujudkan kemandirian dan kemakmuran desa di Kolaka Utara
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span data-i18n="about_badge_inisiator" class="text-xs bg-emerald-50 text-emerald-800 font-bold px-3 py-1.5 rounded-lg border border-emerald-200">
                        Inisiator: Pemerintah Kab. Kolaka Utara
                    </span>
                    <span data-i18n="about_badge_bps" class="text-xs bg-blue-100 text-[#005ea6] font-bold px-3 py-1.5 rounded-lg border border-blue-200">
                        Mitra Data: BPS Kab. Kolaka Utara
                    </span>
                </div>
            </div>

            <!-- 4 Pillar Cards of Desa Madani -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Pilar 1: Spasial Wilayah -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 p-5 flex flex-col justify-between transition-all duration-300 border-t-4 border-t-emerald-600">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 text-sm">1. Dimensi Spasial & Pemetaan Wilayah</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Akuisisi data spasial dan ortofoto resolusi tinggi untuk memetakan batas administrasi desa, tata guna lahan perkebunan kakao, zonasi pesisir, dan infrastruktur umum desa tanpa tumpang tindih.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] font-bold text-emerald-700 flex items-center gap-1">
                        <span>Akurasi Spasial Tinggi</span>
                    </div>
                </div>

                <!-- Pilar 2: Partisipasi Warga Madani -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 p-5 flex flex-col justify-between transition-all duration-300 border-t-4 border-t-teal-600">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 text-sm">2. Partisipasi Komunitas & Warga</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Menempatkan warga desa sebagai subjek aktif (*bottom-up*). Aparatur desa dan pemuda lokal dilatih melakukan pendataan mandiri, verifikasi lapangan, dan pemeliharaan data berkelanjutan.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] font-bold text-teal-700 flex items-center gap-1">
                        <span>Kemandirian Warga Desa</span>
                    </div>
                </div>

                <!-- Pilar 3: Sensus Profil Keluarga Madani -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 p-5 flex flex-col justify-between transition-all duration-300 border-t-4 border-t-[#005ea6]">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-[#005ea6] flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 text-sm">3. Sensus Profil Keluarga Madani</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Pendataan profil keluarga secara menyeluruh (*by name, by address*). Menghimpun status sosial-ekonomi, pendidikan, faskes, sanitasi, dan penerima program perlindungan sosial.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] font-bold text-[#005ea6] flex items-center gap-1">
                        <span>37.013 Kepala Keluarga</span>
                    </div>
                </div>

                <!-- Pilar 4: Analitik Pembangunan & Podes BPS -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 p-5 flex flex-col justify-between transition-all duration-300 border-t-4 border-t-amber-500">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 text-sm">4. Analitik Pembangunan Berbasis Data</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Pengolahan data spasial dan statistik Podes BPS secara terpadu untuk merumuskan kebijakan publik berbasis bukti nyata (*evidence-based policy*) demi akselerasi kemakmuran desa.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] font-bold text-amber-700 flex items-center gap-1">
                        <span>Solusi Satu Data Kolaka Utara</span>
                    </div>
                </div>
            </div>

            <!-- Workflow Visual Strip -->
            <div class="bg-gradient-to-r from-[#0b2545] via-[#054e3b] to-[#022c22] text-white p-6 rounded-2xl shadow-md border border-emerald-500/30">
                <div class="text-xs font-bold text-amber-300 uppercase tracking-widest mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                    <span>Alur Kerja Implementasi Desa Madani Kolaka Utara</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3 text-xs">
                    <div class="bg-white/10 hover:bg-white/15 p-3 rounded-xl border border-white/10 transition">
                        <span class="text-amber-300 font-bold block mb-1">Tahap 1</span>
                        <b class="text-white block font-semibold">Pelatihan Warga</b>
                        <span class="text-emerald-100 text-[11px]">Peningkatan kapasitas aparatur desa dan surveyor pemuda lokal.</span>
                    </div>
                    <div class="bg-white/10 hover:bg-white/15 p-3 rounded-xl border border-white/10 transition">
                        <span class="text-emerald-300 font-bold block mb-1">Tahap 2</span>
                        <b class="text-white block font-semibold">Akuisisi Geospasial</b>
                        <span class="text-emerald-100 text-[11px]">Pemetaan spasial dan ortofoto resolusi tinggi wilayah desa.</span>
                    </div>
                    <div class="bg-white/10 hover:bg-white/15 p-3 rounded-xl border border-white/10 transition">
                        <span class="text-teal-300 font-bold block mb-1">Tahap 3</span>
                        <b class="text-white block font-semibold">Digitasi Partisipatif</b>
                        <span class="text-emerald-100 text-[11px]">Musyawarah batas dusun/desa dan identifikasi fasilitas sosial desa.</span>
                    </div>
                    <div class="bg-white/10 hover:bg-white/15 p-3 rounded-xl border border-white/10 transition">
                        <span class="text-cyan-300 font-bold block mb-1">Tahap 4</span>
                        <b class="text-white block font-semibold">Sensus Keluarga Madani</b>
                        <span class="text-emerald-100 text-[11px]">Pendataan sensus keluarga door-to-door dengan geotagging akurat.</span>
                    </div>
                    <div class="bg-white/10 hover:bg-white/15 p-3 rounded-xl border border-white/10 transition">
                        <span class="text-sky-300 font-bold block mb-1">Tahap 5</span>
                        <b class="text-white block font-semibold">WebGIS & Monografi</b>
                        <span class="text-emerald-100 text-[11px]">Penyajian peta analitik, profil desa, dan naskah monografi resmi.</span>
                    </div>
                </div>
            </div>
        </section>



        
</main>

    
<!-- FOOTER: DESA MADANI & BPS KOLAKA UTARA -->
    <footer class="bg-gradient-to-r from-[#011c16] via-[#0b2545] to-[#011926] text-white py-10 border-t border-emerald-500/25 text-xs mt-12">
        <div class="w-full px-4 lg:px-8 max-w-[1720px] mx-auto space-y-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6 pb-6 border-b border-white/10">
                <div class="flex items-center gap-4">
                    <div class="bg-white rounded-xl p-1.5 shadow-md">
                        <img src="/images/bps_kolaka_utara_logo.jpg" alt="BPS" class="h-10 w-auto">
                    </div>
                    <div>
                        <div data-i18n="footer_title" class="text-[10px] font-bold text-amber-300 uppercase tracking-widest">Kolaborasi Inovasi</div>
                        <h4 data-i18n="footer_brand" class="font-extrabold text-white text-base">Desa Madani x BPS Kabupaten Kolaka Utara</h4>
                        <p data-i18n="footer_sub" class="text-[11px] text-emerald-200">Kedaulatan Data Pembangunan Berbasis Desa • Kode Wilayah: 7408</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 text-xs flex-wrap justify-center">
                    <a href="/" data-i18n="nav_home" class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white transition">Beranda</a>
                    <a href="#sectionPeta" data-i18n="footer_link_gis" class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white transition">Madani WebGIS</a>
                    <a href="#sectionDesaCantik" data-i18n="nav_descan" class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white transition">Desa Cantik</a>
                    <a href="#sectionAbout" data-i18n="nav_about" class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white transition">Tentang Madani</a>
                    <a href="https://kolutkab.bps.go.id" target="_blank" data-i18n="footer_btn_bps" class="px-3 py-1.5 rounded-lg bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold transition">Portal BPS</a>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 text-slate-400 text-[11px]">
                <p data-i18n="footer_copy">© 2026 Badan Pusat Statistik Kabupaten Kolaka Utara & Inisiatif Desa Madani. Seluruh Hak Cipta Dilindungi.</p>
                <p data-i18n="footer_tagline" class="text-emerald-300 font-semibold">Solusi Satu Data Indonesia • Membangun Desa Mandiri & Sejahtera</p>
            </div>
        </div>
    </footer>

    <!-- Toast Notification Container -->
    <div id="toastContainer" class="fixed bottom-5 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>

    <!-- MODAL: DAFTAR 15 KECAMATAN & DATA PODES -->
    <div id="modal15Kecamatan" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm animate-fadeIn">
        <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] flex flex-col shadow-2xl overflow-hidden border border-slate-200">
            <!-- Modal Header -->
            <div class="px-6 py-4 bg-[#005ea6] text-white flex justify-between items-center">
                <div>
                    <h3 data-i18n="modal_matriks_title" class="text-base font-bold">Matriks Potensi 15 Kecamatan Kabupaten Kolaka Utara</h3>
                    <p data-i18n="modal_matriks_desc" class="text-xs text-blue-100">Berdasarkan Data Potensi Desa (Podes) BPS 2024–2025</p>
                </div>
                <button id="btnCloseModalX" class="p-1 rounded-lg hover:bg-white/10 text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Modal Search & Filter -->
            <div class="p-4 border-b border-slate-100 flex items-center justify-between gap-4 bg-slate-50">
                <div class="relative flex-1 max-w-md">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input id="inputSearchModal" data-i18n-ph="modal_search_ph" type="text" placeholder="Cari nama kecamatan atau komoditas..." class="w-full pl-9 pr-4 py-1.5 text-xs rounded-lg border border-slate-300 focus:outline-none focus:border-[#005ea6] bg-white">
                </div>
                <button id="btnExportCSVModal" class="text-xs bg-white border border-slate-200 hover:bg-slate-100 px-3 py-1.5 rounded-lg font-semibold flex items-center gap-1.5 transition text-slate-700">
                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span data-i18n="modal_btn_csv">Ekspor CSV</span>
                </button>
            </div>

            <!-- Modal Table -->
            <div class="flex-1 overflow-y-auto p-4">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="bg-slate-100 text-slate-700 border-b border-slate-200">
                            <th data-i18n="th_no" class="p-2.5 font-bold">No</th>
                            <th data-i18n="th_kecamatan" class="p-2.5 font-bold">Kecamatan</th>
                            <th data-i18n="th_potensi" class="p-2.5 font-bold">Potensi Unggulan</th>
                            <th data-i18n="th_desa" class="p-2.5 font-bold text-center">Jumlah Desa</th>
                            <th data-i18n="th_ipd_idx" class="p-2.5 font-bold text-center">Indeks IPD</th>
                            <th data-i18n="th_ipd_status" class="p-2.5 font-bold text-center">Status IPD</th>
                            <th data-i18n="th_action" class="p-2.5 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="modalTableBody" class="divide-y divide-slate-100">
                        <!-- Injected via JavaScript -->
                    </tbody>
                </table>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-3 bg-slate-50 border-t border-slate-200 flex justify-between items-center text-xs text-slate-500">
                <span data-i18n="modal_source">Sumber: BPS Kabupaten Kolaka Utara (Podes 2024–2025)</span>
                <button id="btnCloseModalBtn" class="px-4 py-1.5 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold rounded-lg transition">
                    <span data-i18n="modal_btn_close">Tutup</span>
                </button>
            </div>
        </div>
    </div>

    
    <!-- =========================================================================
         MODAL: FORM LOGIN PORTAL DESA MADANI (BPS KOLAKA UTARA)
         ========================================================================= -->
    <div id="modalLoginForm" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-950/75 backdrop-blur-md animate-fadeIn" style="display: none;">
        <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-200/80 overflow-hidden transform transition-all duration-300">
            
            <!-- Top Gradient Header with Vector Emblem -->
            <div class="relative bg-gradient-to-br from-[#064e3b] via-[#047857] to-[#0b2545] p-6 text-white text-center overflow-hidden">
                <!-- Soft Glow Blur -->
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-emerald-400/30 rounded-full blur-2xl pointer-events-none"></div>
                <div class="absolute -bottom-10 -left-10 w-28 h-28 bg-amber-400/20 rounded-full blur-2xl pointer-events-none"></div>

                <!-- Close Button -->
                <button type="button" 
                        onclick="closeLoginModal()" 
                        class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition focus:outline-none" 
                        title="Tutup Form Login">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <!-- Desa Madani Emblem in Header -->
                <div class="w-14 h-14 mx-auto mb-2 relative flex items-center justify-center bg-white/15 backdrop-blur-md rounded-2xl border border-white/25 shadow-inner">
                    <svg class="w-10 h-10 drop-shadow-sm" viewBox="0 0 100 100" fill="none">
                        <path d="M16 22 C16 16 18 14 24 14 H52 C55 14 56 16 56 20 V46 C56 50 54 52 50 52 H32 C23 52 16 45 16 36 Z" fill="#34d399"/>
                        <path d="M48 48 C48 44 50 42 54 42 H72 C80 42 86 48 86 56 V78 C86 82 84 84 80 84 H48 C44 84 42 82 42 78 V54 C42 50 44 48 48 48 Z" fill="#93c5fd"/>
                        <circle cx="50" cy="50" r="7" fill="#fbbf24"/>
                        <circle cx="50" cy="50" r="3" fill="#ffffff"/>
                    </svg>
                </div>

                <h3 class="text-xl font-black tracking-tight text-white">Desa <span class="text-emerald-300">Madani</span></h3>
                <p class="text-xs text-emerald-100/90 font-medium mt-0.5">Portal Data & Analitik Kemandirian Desa • Kab. Kolaka Utara</p>
                <div class="inline-flex items-center gap-1.5 mt-2.5 px-3 py-1 rounded-full bg-white/15 text-emerald-100 border border-white/20 text-[11px] font-semibold">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span data-i18n="login_badge">Masuk Administrator & Operator</span>
                </div>
            </div>

            <!-- Modal Body: Form Login -->
            <div class="p-6 sm:p-7">
                <!-- Alert Message Container -->
                <div id="loginAlertBox" class="hidden mb-4 p-3 rounded-xl text-xs font-semibold"></div>

                <form id="formLoginModal" method="POST" action="/login" onsubmit="handleLoginSubmit(event)">
                    @csrf
                    
                    <!-- Input Email / Username -->
                    <div class="mb-4">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span data-i18n="login_lbl_username">Email / Username</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="login" 
                                   id="modalLoginUsername" 
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition" 
                                   placeholder="Contoh: admin@bps.go.id" 
                                   required 
                                   autocomplete="username">
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div class="mb-4">
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <span data-i18n="login_lbl_pass">Kata Sandi</span>
                            </label>
                            <span data-i18n="login_forgot" class="text-[11px] text-slate-400 hover:text-emerald-600 cursor-pointer transition" onclick="alert('Silakan hubungi BPS Kolaka Utara untuk bantuan akses akun.')">Lupa sandi?</span>
                        </div>
                        <div class="relative">
                            <input type="password" 
                                   name="password" 
                                   id="modalLoginPassword" 
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition pr-10" 
                                   placeholder="••••••••" 
                                   required 
                                   autocomplete="current-password">
                            <button type="button" 
                                    onclick="togglePasswordVisibility('modalLoginPassword', this)" 
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 p-1 focus:outline-none"
                                    title="Tampilkan / Sembunyikan Kata Sandi">
                                <svg class="w-4 h-4 eye-icon-show" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="flex items-center justify-between mb-5">
                        <label class="flex items-center gap-2 text-xs text-slate-600 font-semibold cursor-pointer">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500 border-slate-300">
                            <span data-i18n="login_remember">Ingat Sesi Masuk</span>
                        </label>
                        <span class="text-[11px] text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md font-bold border border-emerald-200/60">BPS Kolut</span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            id="btnSubmitLogin" 
                            class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-[#059669] via-[#047857] to-[#0b2545] hover:from-[#047857] hover:to-[#061a33] text-white font-extrabold text-sm shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 focus:outline-none">
                        <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        <span id="btnSubmitLoginText" data-i18n="login_btn_submit">Masuk ke Sistem</span>
                    </button>
                </form>

                <!-- Demo / Fast Login Hint -->
                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Akun: <code class="text-slate-700 bg-slate-100 px-1 py-0.2 rounded font-mono">admin@bps.go.id</code>
                    </span>
                    <button type="button" onclick="fillAdminDemo()" class="text-emerald-600 hover:text-emerald-800 font-bold hover:underline">Isi Otomatis</button>
                </div>
            </div>

            <!-- Footer Logo Bar -->
            <div class="px-6 py-2.5 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-[10px] text-slate-400">
                <span>Badan Pusat Statistik Kab. Kolaka Utara</span>
                <span>© 2026 Desa Madani</span>
            </div>
        </div>
    </div>

    <!-- MODAL: PORTAL MANAJEMEN & INPUT DATA DESA (ADMIN BPS KOLAKA UTARA) -->
    <div id="modalAdminPortal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-5 bg-slate-950/75 backdrop-blur-md animate-fadeIn">
        <div class="bg-white rounded-2xl max-w-6xl w-full max-h-[92vh] flex flex-col shadow-2xl overflow-hidden border border-slate-200">
            <!-- Modal Header: BPS Official Theme -->
            <div class="px-6 py-4 bg-gradient-to-r from-[#003766] via-[#005ea6] to-[#0284c7] text-white flex flex-wrap justify-between items-center gap-3 border-b border-white/10 shadow-md">
                <div class="flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-white/10 border border-white/20 flex items-center justify-center text-amber-300 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </span>
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <h3 class="text-base sm:text-lg font-extrabold text-white tracking-tight">Portal Pengelolaan & Input Data Potensi Desa (Podes)</h3>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-400 text-slate-950 shadow-xs">Admin BPS</span>
                        </div>
                        <p class="text-xs text-blue-100">Kelola master data spasial, profil komoditas, skor IPD, dan fasilitas desa se-Kabupaten Kolaka Utara</p>
                    </div>
                </div>
                <!-- Action Controls in Header -->
                <div class="flex items-center gap-2">
                    <button id="btnAdminExportJSON" class="text-xs bg-white/10 hover:bg-white/20 border border-white/25 text-white font-semibold px-2.5 py-1.5 rounded-lg flex items-center gap-1.5 transition" title="Unduh seluruh data desa dalam format JSON">
                        <svg class="w-3.5 h-3.5 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        <span class="hidden sm:inline">Backup JSON</span>
                    </button>
                    <button id="btnAdminExportCSV" class="text-xs bg-white/10 hover:bg-white/20 border border-white/25 text-white font-semibold px-2.5 py-1.5 rounded-lg flex items-center gap-1.5 transition" title="Ekspor data desa dalam format CSV Spreadsheet">
                        <svg class="w-3.5 h-3.5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span class="hidden sm:inline">Ekspor CSV</span>
                    </button>
                    <button id="btnCloseAdminModalX" class="p-1.5 rounded-lg hover:bg-white/20 text-white transition ml-2" title="Tutup Modal">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>

            <!-- Tab Navigation Bar -->
            <div class="px-6 py-2.5 bg-slate-100 border-b border-slate-200 flex flex-wrap items-center justify-between gap-3 text-xs">
                <div class="flex items-center gap-2">
                    <button id="tabBtnAdminTable" class="tab-btn-admin px-3.5 py-1.5 rounded-lg font-bold bg-[#005ea6] text-white shadow-xs transition flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        <span>Master Data Desa</span>
                    </button>
                    <button id="tabBtnAdminForm" class="tab-btn-admin px-3.5 py-1.5 rounded-lg font-semibold bg-white text-slate-700 hover:text-[#005ea6] border border-slate-300 shadow-2xs transition flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <span id="labelTabFormTitle">Input Desa Baru</span>
                    </button>
                    <button id="tabBtnAdminStats" class="tab-btn-admin px-3.5 py-1.5 rounded-lg font-semibold bg-white text-slate-700 hover:text-[#005ea6] border border-slate-300 shadow-2xs transition flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        <span>Statistik & Sinkronisasi</span>
                    </button>
                </div>
                <!-- Status Sync Pill -->
                <div class="flex items-center gap-2 text-slate-500 font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Penyimpanan: <b class="text-slate-800">localStorage (Real-Time)</b></span>
                    <span id="badgeCustomRecordsPill" class="text-[10px] bg-amber-100 text-amber-800 px-2 py-0.5 rounded font-bold">0 Data Kustom</span>
                </div>
            </div>

            <!-- TAB 1: MASTER DATA TABLE (CRUD VIEW) -->
            <div id="tabContentAdminTable" class="flex-1 flex flex-col overflow-hidden p-5 space-y-4">
                <!-- Search & Filters Toolbar -->
                <div class="flex flex-wrap items-center justify-between gap-3 bg-slate-50 p-3 rounded-xl border border-slate-200">
                    <div class="relative flex-1 min-w-[240px] max-w-md">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input id="inputAdminSearchTable" type="text" placeholder="Cari nama desa, komoditas, atau potensi..." class="w-full pl-9 pr-4 py-2 text-xs rounded-lg border border-slate-300 focus:outline-none focus:border-[#005ea6] bg-white">
                    </div>
                    <div class="flex items-center gap-2 flex-wrap text-xs">
                        <!-- Filter Kecamatan -->
                        <select id="selectAdminFilterKec" class="border border-slate-300 rounded-lg px-2.5 py-1.5 bg-white font-medium text-slate-700 outline-none focus:border-[#005ea6]">
                            <option value="">Semua Kecamatan (15 Kec)</option>
                        </select>
                        <!-- Filter Status IPD -->
                        <select id="selectAdminFilterStatus" class="border border-slate-300 rounded-lg px-2.5 py-1.5 bg-white font-medium text-slate-700 outline-none focus:border-[#005ea6]">
                            <option value="">Semua Status IPD</option>
                            <option value="Mandiri">Desa Mandiri</option>
                            <option value="Maju">Desa Maju</option>
                            <option value="Berkembang">Desa Berkembang</option>
                        </select>
                        <!-- Filter Sektor -->
                        <select id="selectAdminFilterSektor" class="border border-slate-300 rounded-lg px-2.5 py-1.5 bg-white font-medium text-slate-700 outline-none focus:border-[#005ea6]">
                            <option value="">Semua Sektor</option>
                            <option value="perkebunan">Perkebunan Kakao</option>
                            <option value="perikanan">Perikanan & Kelautan</option>
                            <option value="pariwisata">Pariwisata & Ekowisata</option>
                            <option value="pertanian">Pertanian Pangan</option>
                        </select>
                        <!-- Button Add New Desa -->
                        <button id="btnAdminAddNewFromTable" class="bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-500 hover:to-emerald-600 text-white font-bold px-3 py-1.5 rounded-lg flex items-center gap-1.5 transition shadow-xs">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            <span>+ Tambah Desa Baru</span>
                        </button>
                    </div>
                </div>

                <!-- Master Table -->
                <div class="flex-1 overflow-y-auto border border-slate-200 rounded-xl bg-white shadow-2xs">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead class="bg-slate-100/90 text-slate-700 sticky top-0 z-10 border-b border-slate-200">
                            <tr>
                                <th class="p-3 font-bold w-12 text-center">No</th>
                                <th class="p-3 font-bold">Desa / Kelurahan</th>
                                <th class="p-3 font-bold">Kecamatan</th>
                                <th class="p-3 font-bold">Sektor & Komoditas</th>
                                <th class="p-3 font-bold text-center">Indeks IPD</th>
                                <th class="p-3 font-bold">Koordinat (Lat, Lng)</th>
                                <th class="p-3 font-bold text-right">Penduduk & KK</th>
                                <th class="p-3 font-bold text-center w-28">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="adminMasterTableBody" class="divide-y divide-slate-100">
                            <!-- Injected dynamically via JavaScript -->
                        </tbody>
                    </table>
                </div>

                <!-- Table Summary Footer -->
                <div class="flex items-center justify-between text-xs text-slate-500 pt-1">
                    <span id="adminTableCountInfo">Menampilkan 0 desa</span>
                    <span class="text-[11px] text-slate-400">Gunakan tombol <b>Edit</b> untuk mengubah atau <b>Lihat Peta</b> untuk langsung menyorot titik spasial.</span>
                </div>
            </div>

            <!-- TAB 2: FORM INPUT & EDIT DATA DESA -->
            <div id="tabContentAdminForm" class="hidden flex-1 flex flex-col overflow-y-auto p-5 space-y-4">
                <!-- Mode Indicator Banner -->
                <div id="adminFormModeBanner" class="p-3 rounded-xl bg-blue-50 border border-blue-200 flex items-center justify-between text-xs">
                    <div class="flex items-center gap-2">
                        <span id="adminFormModeIcon" class="w-6 h-6 rounded-lg bg-[#005ea6] text-white flex items-center justify-center font-bold">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </span>
                        <div>
                            <span id="adminFormModeTitle" class="font-bold text-slate-800 text-sm">Formulir Tambah Desa Baru</span>
                            <p class="text-[11px] text-slate-500">Data yang disimpan akan langsung ter-render sebagai marker interaktif pada peta Leaflet BPS</p>
                        </div>
                    </div>
                    <button id="btnCancelEditMode" class="hidden bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold px-3 py-1 rounded-lg text-xs transition">
                        Batal Edit
                    </button>
                </div>

                <!-- The Form -->
                <form id="formAdminPodes" class="space-y-4 text-xs" onsubmit="return false;">
                    <input type="hidden" id="formEditId" value="">
                    <input type="hidden" id="formOriginalKecKode" value="">
                    <input type="hidden" id="formOriginalDesaNama" value="">

                    <!-- Section 1: Identitas Administrasi & Status -->
                    <div class="p-4 bg-slate-50/70 rounded-xl border border-slate-200 space-y-3">
                        <div class="flex items-center gap-2 font-bold text-slate-800 border-b border-slate-200 pb-2">
                            <svg class="w-4 h-4 text-[#005ea6]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <span>1. Wilayah Administrasi & Status Desa</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Kecamatan <span class="text-rose-500">*</span></label>
                                <select id="formInputKecamatan" required class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                                    <option value="">Pilih Kecamatan...</option>
                                </select>
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Nama Desa / Kelurahan <span class="text-rose-500">*</span></label>
                                <input id="formInputNamaDesa" type="text" required placeholder="Contoh: Desa Bahari Jaya" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Status IPD Podes <span class="text-rose-500">*</span></label>
                                <select id="formInputStatusIPD" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                                    <option value="Mandiri">Desa Mandiri (IPD &gt; 75)</option>
                                    <option value="Maju" selected>Desa Maju (IPD 60 - 75)</option>
                                    <option value="Berkembang">Desa Berkembang (IPD &lt; 60)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Topografi Wilayah</label>
                                <select id="formInputTopografi" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                                    <option value="Pesisir Pantai">Pesisir Pantai / Teluk</option>
                                    <option value="Dataran Rendah">Dataran Rendah</option>
                                    <option value="Perbukitan/Pegunungan">Perbukitan / Pegunungan</option>
                                    <option value="Dataran Perkotaan">Dataran Perkotaan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Titik Koordinat Geospasial -->
                    <div class="p-4 bg-slate-50/70 rounded-xl border border-slate-200 space-y-3">
                        <div class="flex items-center justify-between border-b border-slate-200 pb-2">
                            <div class="flex items-center gap-2 font-bold text-slate-800">
                                <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>2. Geospasial & Koordinat Peta</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <button id="btnAdminPickFromMap" type="button" class="bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold px-3 py-1 rounded-lg flex items-center gap-1.5 transition shadow-xs">
                                    <svg class="w-3.5 h-3.5 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                    <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Petik Titik di Peta</span>
                                </button>
                                <button id="btnAdminUseKecCenter" type="button" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold px-2.5 py-1 rounded-lg transition" title="Gunakan koordinat pusat kecamatan">
                                    <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z"/></svg>Isi Titik Kecamatan</span>
                                </button>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Latitude (Garis Lintang) <span class="text-rose-500">*</span></label>
                                <input id="formInputLat" type="number" step="0.000001" required placeholder="-3.529100" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-mono font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                                <span class="text-[10px] text-slate-400">Wilayah Kolaka Utara berada pada rentang -3.00 s/d -3.80</span>
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Longitude (Garis Bujur) <span class="text-rose-500">*</span></label>
                                <input id="formInputLng" type="number" step="0.000001" required placeholder="120.985500" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-mono font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                                <span class="text-[10px] text-slate-400">Rentang Longitude: 120.80 s/d 121.30</span>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Demografi & Indeks IPD -->
                    <div class="p-4 bg-slate-50/70 rounded-xl border border-slate-200 space-y-3">
                        <div class="flex items-center gap-2 font-bold text-slate-800 border-b border-slate-200 pb-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            <span>3. Demografi & Indeks Perkembangan Desa (IPD)</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Jumlah Penduduk (Jiwa)</label>
                                <input id="formInputPenduduk" type="number" placeholder="2450" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Jumlah Kepala Keluarga (KK)</label>
                                <input id="formInputKK" type="number" placeholder="620" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Luas Wilayah</label>
                                <input id="formInputLuas" type="text" placeholder="14.8 km²" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                            </div>
                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <label class="font-semibold text-slate-700">Skor IPD (0 - 100)</label>
                                    <span id="labelFormIPDScore" class="font-bold text-[#005ea6] bg-blue-100 px-2 py-0.2 rounded font-mono">75.0</span>
                                </div>
                                <input id="formInputIPD" type="range" min="30" max="100" step="0.1" value="75" class="w-full cursor-pointer accent-[#005ea6]">
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Sektor Unggulan & Narasi Potensi -->
                    <div class="p-4 bg-slate-50/70 rounded-xl border border-slate-200 space-y-3">
                        <div class="flex items-center gap-2 font-bold text-slate-800 border-b border-slate-200 pb-2">
                            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            <span>4. Sektor Potensi, Komoditas & BUMDes</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Sektor Unggulan Utama <span class="text-rose-500">*</span></label>
                                <select id="formInputSektor" required class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                                    <option value="perkebunan">Perkebunan Kakao & Cengkeh</option>
                                    <option value="perikanan">Perikanan & Kelautan Teluk Bone</option>
                                    <option value="pariwisata">Pariwisata & Ekowisata Bahari</option>
                                    <option value="pertanian">Pertanian Tanaman Pangan</option>
                                    <option value="jasa">Perdagangan, Jasa & UMKM</option>
                                </select>
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Komoditas / Produk Unggulan</label>
                                <input id="formInputKomoditas" type="text" placeholder="Biji Kakao Fermentasi, Ikan Bandeng, Kelapa Kopra" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block font-semibold text-slate-700 mb-1">Deskripsi Narasi Potensi Desa</label>
                                <textarea id="formInputPotensiDesc" rows="2" placeholder="Jelaskan karakteristik keunggulan ekonomi, wisata, atau potensi sosial desa..." class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]"></textarea>
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block font-semibold text-slate-700 mb-1">Keberadaan BUMDes & Unit Usaha</label>
                                <input id="formInputBumdes" type="text" placeholder="BUMDes Mandiri Sejahtera (Unit Pengeringan Biji Kakao & Simpan Pinjam)" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                            </div>
                        </div>
                    </div>

                    <!-- Section 5: Layanan Dasar Podes -->
                    <div class="p-4 bg-slate-50/70 rounded-xl border border-slate-200 space-y-3">
                        <div class="flex items-center gap-2 font-bold text-slate-800 border-b border-slate-200 pb-2">
                            <svg class="w-4 h-4 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <span>5. Fasilitas & Layanan Dasar (Podes 2024–2025)</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Sarana Kesehatan (Faskes)</label>
                                <input id="formInputFaskes" type="text" placeholder="1 Pustu Aktif, Poskesdes & 2 Bidan Desa" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Sarana Pendidikan</label>
                                <input id="formInputSekolah" type="text" placeholder="1 PAUD, 2 SD Negeri, SMP Terdekat" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1">Listrik, Sinyal & Akses Jalan</label>
                                <input id="formInputSinyal" type="text" placeholder="Listrik PLN 24 Jam, 4G Kuat, Jalan Aspal" class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white font-medium text-slate-800 focus:outline-none focus:border-[#005ea6]">
                            </div>
                        </div>
                    </div>

                    <!-- Submit & Reset Action Buttons -->
                    <div class="pt-2 flex items-center justify-between gap-3 border-t border-slate-200">
                        <button id="btnAdminResetForm" type="button" class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold rounded-xl transition">
                            Bersihkan Formulir
                        </button>
                        <div class="flex items-center gap-2">
                            <button id="btnAdminBackToTable" type="button" class="px-4 py-2 border border-slate-300 hover:bg-slate-100 text-slate-700 font-bold rounded-xl transition">
                                Kembali ke Tabel
                            </button>
                            <button id="btnAdminSaveDesa" type="submit" class="bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-500 hover:to-emerald-600 text-white font-extrabold px-6 py-2.5 rounded-xl transition flex items-center gap-2 shadow-md">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span id="labelBtnSaveDesa">Simpan & Sinkronkan ke Peta</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- TAB 3: STATISTIK & CADANGAN SISTEM -->
            <div id="tabContentAdminStats" class="hidden flex-1 overflow-y-auto p-5 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                        <span class="text-xs text-blue-700 font-bold uppercase">Total Kecamatan</span>
                        <div class="text-2xl font-black text-blue-900 mt-1">15 Kecamatan</div>
                        <span class="text-[11px] text-blue-600">Kabupaten Kolaka Utara</span>
                    </div>
                    <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4">
                        <span class="text-xs text-emerald-700 font-bold uppercase">Total Desa Terdaftar</span>
                        <div id="statBoxTotalDesa" class="text-2xl font-black text-emerald-900 mt-1">133 Desa</div>
                        <span class="text-[11px] text-emerald-600">Podes BPS 2024–2025</span>
                    </div>
                    <div class="bg-amber-50 border border-amber-200 rounded-xl p-4">
                        <span class="text-xs text-amber-700 font-bold uppercase">Data Kustom Tambahan</span>
                        <div id="statBoxCustomCount" class="text-2xl font-black text-amber-900 mt-1">0 Desa</div>
                        <span class="text-[11px] text-amber-600">Disimpan di localStorage</span>
                    </div>
                    <div class="bg-purple-50 border border-purple-200 rounded-xl p-4">
                        <span class="text-xs text-purple-700 font-bold uppercase">Rata-rata Indeks IPD</span>
                        <div id="statBoxAvgIPD" class="text-2xl font-black text-purple-900 mt-1">72.4</div>
                        <span class="text-[11px] text-purple-600">Kategori Desa Maju</span>
                    </div>
                </div>

                <!-- Backup & Reset Tools -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-4">
                    <h4 class="font-bold text-slate-800 text-sm flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#005ea6]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                        <span>Alat Cadangan & Pemulihan Basis Data</span>
                    </h4>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Data yang Anda masukkan tersimpan secara aman di dalam peramban web (browser local storage). Anda dapat mengekspor salinan cadangan JSON untuk disimpan di komputer atau mereset data kembali ke baseline default BPS jika diperlukan.
                    </p>
                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <button id="btnToolExportJSON" class="px-4 py-2 rounded-xl bg-[#005ea6] hover:bg-[#004077] text-white font-bold text-xs flex items-center gap-2 transition shadow-xs">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span>Unduh Cadangan JSON Lengkap</span>
                        </button>
                        <button id="btnToolExportCSV" class="px-4 py-2 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-xs flex items-center gap-2 transition shadow-xs">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>Ekspor Data Desa (.CSV)</span>
                        </button>
                        <button id="btnToolResetDefault" class="px-4 py-2 rounded-xl bg-rose-50 hover:bg-rose-100 border border-rose-300 text-rose-700 font-bold text-xs flex items-center gap-2 transition ml-auto">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            <span>Reset ke Master Asli BPS</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-3 bg-slate-50 border-t border-slate-200 flex justify-between items-center text-xs text-slate-500">
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                    <span>Sistem Basis Data Potensi Desa (Podes) • BPS Kabupaten Kolaka Utara</span>
                </span>
                <button id="btnCloseAdminModalBtn" class="px-4 py-1.5 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold rounded-lg transition">
                    Tutup Panel
                </button>
            </div>
        </div>
    </div>

    <!-- EMBEDDED GEOJSON DATA (Instant Zero-Latency Loading) -->
    <script>
        window.KOLAKA_UTARA_GEOJSON = {!! file_get_contents(public_path('data/kolaka_utara_kecamatan.geojson')) !!};
    </script>

    <!-- Local Leaflet JS (Instant Load, Zero External Dependency) -->
    <script src="/vendor/leaflet/leaflet.js"></script>

    <!-- CORE LOGIC & DATASET: POTENSI DESA (PODES) 2024-2025 KABUPATEN KOLAKA UTARA -->
    <script>
    (function() {
        // Master Database 15 Kecamatan & Sample Desa Podes 2024-2025
        let kecamatanPodesList = [
  {
    "kode": "74.08.01",
    "nama": "Lasusua",
    "lat": -3.5291,
    "lng": 120.9855,
    "ipd": 84.5,
    "status_ipd": "Mandiri",
    "potensi_utama": "Pusat Pemerintahan, Perdagangan, Perikanan Tangkap & Wisata Bahari",
    "komoditas": "Kakao, Ikan Cakalang, Kuliner Bahari, Olahan Cokelat",
    "desa_count": 12,
    "odtw": "Pantai Berova, Taman Kota Lasusua, Wisata Mangrove",
    "desaList": [
      {
        "nama": "Pitulua",
        "status": "Mandiri",
        "sektor": "pariwisata",
        "lat": -3.518,
        "lng": 120.978,
        "topografi": "Pesisir Pantai",
        "penduduk": 3120,
        "kk": 840,
        "luas": "14.8 km²",
        "ipd": 86.4,
        "potensi": "Sentra Wisata Pantai Berova dengan wahana bahari, dermaga perahu nelayan, serta perkebunan kakao rakyat.",
        "komoditas": "Ikan Laut Segar, Biji Kakao, Kelapa Kopra",
        "bumdes": "BUMDes Berova Mandiri (Pengelola Tiket Wisata, Kios Kuliner & Cold Storage)",
        "faskes": "Poskesdes & 1 Pustu Aktif",
        "sekolah": "1 PAUD, 2 SD Negeri, SMP Satap terdekat 1.5 km",
        "sinyal": "Listrik PLN 24 Jam, 4G Telkomsel/Indosat Kuat, Jalan Aspal Hotmix"
      },
      {
        "nama": "Kelurahan Lasusua",
        "status": "Mandiri",
        "sektor": "jasa",
        "lat": -3.5291,
        "lng": 120.9855,
        "topografi": "Dataran Perkotaan",
        "penduduk": 5420,
        "kk": 1450,
        "luas": "11.2 km²",
        "ipd": 89.2,
        "potensi": "Ibukota Kabupaten, Pusat Perkantoran Pemkab, Layanan RSUD Djafar Harun, Perbankan, dan Sentra Kuliner Malam.",
        "komoditas": "Olahan Cokelat Khas, Kuliner Laut, Jasa Keuangan",
        "bumdes": "Lembaga Ekonomi Lasusua Sentral (Pasar Tradisional & Koperasi)",
        "faskes": "RSUD Djafar Harun & Puskesmas Perawatan Lasusua",
        "sekolah": "Lengkap (TK Pembina, SD, SMPN 1, SMAN 1, SMKN 1)",
        "sinyal": "Fiber Optic IndiHome, Listrik PLN 24 Jam, 4G+ Sangat Kuat"
      },
      {
        "nama": "Ponggiha",
        "status": "Maju",
        "sektor": "pertanian",
        "lat": -3.541,
        "lng": 120.995,
        "topografi": "Dataran Rendah",
        "penduduk": 2450,
        "kk": 620,
        "luas": "16.5 km²",
        "ipd": 79.5,
        "potensi": "Sentra Hortikultura Sayuran Segar (Cabai, Tomat, Terung), Tanaman Pangan Sawah, dan Perkebunan Kakao.",
        "komoditas": "Sayur Segar Harian, Biji Kakao, Jagung Hibrida",
        "bumdes": "BUMDes Karya Tani Mandiri (Unit Saprodi & Distribusi Sayur)",
        "faskes": "Poskesdes Ponggiha",
        "sekolah": "1 PAUD, 1 SD Negeri",
        "sinyal": "Listrik PLN 24 Jam, 4G Kuat, Akses Jalan Aspal Kabupaten"
      },
      {
        "nama": "Totallang",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.505,
        "lng": 121.002,
        "topografi": "Perbukitan Rendah",
        "penduduk": 1890,
        "kk": 480,
        "luas": "18.2 km²",
        "ipd": 78.1,
        "potensi": "Perkebunan Kakao Berkelanjutan, Budi Daya Tanaman Nilam Atsiri, dan Bunga Cengkeh Kering.",
        "komoditas": "Kakao Rakyat Lestari, Minyak Nilam Suling",
        "bumdes": "BUMDes Agro Lestari Totallang (Penyulingan Nilam)",
        "faskes": "Poskesdes Totallang",
        "sekolah": "1 SD Negeri",
        "sinyal": "Listrik PLN 24 Jam, 4G Baik, Jalan Aspal"
      },
      {
        "nama": "Sulaho",
        "status": "Maju",
        "sektor": "perikanan",
        "lat": -3.558,
        "lng": 120.972,
        "topografi": "Pesisir Pantai",
        "penduduk": 1480,
        "kk": 390,
        "luas": "12.4 km²",
        "ipd": 77.4,
        "potensi": "Kampung Nelayan Tradisional Teluk Bone, Sentra Pengolahan Ikan Asin Kering, dan Kelapa Dalam.",
        "komoditas": "Ikan Teri Kering, Ikan Asin Belah, Kopra",
        "bumdes": "BUMDes Bahari Indah Sulaho",
        "faskes": "Poskesdes Sulaho",
        "sekolah": "1 SD Negeri",
        "sinyal": "Listrik PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Rante Limbong",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.512,
        "lng": 121.025,
        "topografi": "Lereng Perbukitan",
        "penduduk": 1720,
        "kk": 430,
        "luas": "15.6 km²",
        "ipd": 76.8,
        "potensi": "Perkebunan Kakao Rakyat & Kopi Robusta Dataran Tinggi dengan sertifikasi bibit unggul.",
        "komoditas": "Biji Kakao, Kopi Robusta",
        "bumdes": "BUMDes Limbong Sejahtera",
        "faskes": "Poskesdes Rante Limbong",
        "sekolah": "1 SD Negeri",
        "sinyal": "Listrik PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.02",
    "nama": "Pakue",
    "lat": -3.2584,
    "lng": 121.0986,
    "ipd": 76.4,
    "status_ipd": "Maju",
    "potensi_utama": "Budidaya Tambak Udang & Bandeng, Perkebunan Kakao & Kopra",
    "komoditas": "Udang Windu, Ikan Bandeng, Kakao, Kelapa Kopra",
    "desa_count": 11,
    "odtw": "Pantai Olo-oloho, Tambak Perikanan Rakyat",
    "desaList": [
      {
        "nama": "Kondara",
        "status": "Mandiri",
        "sektor": "perikanan",
        "lat": -3.262,
        "lng": 121.082,
        "topografi": "Pesisir & Tambak",
        "penduduk": 2180,
        "kk": 560,
        "luas": "19.4 km²",
        "ipd": 81.3,
        "potensi": "Sentra Budidaya Tambak Udang Windu Super Intensif dan Bandeng Air Payau Teluk Bone.",
        "komoditas": "Udang Windu Ekspor, Ikan Bandeng, Kakao",
        "bumdes": "BUMDes Tambak Makmur Kondara (Pakan & Penjualan Tambak)",
        "faskes": "Poskesdes Kondara",
        "sekolah": "1 SD Negeri, 1 SMP Satap",
        "sinyal": "Listrik PLN 24 Jam, 4G Telkomsel Kuat"
      },
      {
        "nama": "Kelurahan Olo-Oloho",
        "status": "Maju",
        "sektor": "perikanan",
        "lat": -3.2584,
        "lng": 121.0986,
        "topografi": "Pesisir Pelabuhan",
        "penduduk": 2450,
        "kk": 620,
        "luas": "14.1 km²",
        "ipd": 78.5,
        "potensi": "Pelabuhan Pendaratan Ikan, Perdagangan Antarpulau Teluk Bone, dan Sentra Kelapa Kopra.",
        "komoditas": "Ikan Tangkap Laut, Kelapa Kopra Putih",
        "bumdes": "BUMDes Pesisir Maju Olo-Oloho",
        "faskes": "Puskesmas Rawat Inap Pakue",
        "sekolah": "SD, SMP, MTs Swasta",
        "sinyal": "Listrik PLN 24 Jam, 4G Kuat"
      },
      {
        "nama": "Mikuasi",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.275,
        "lng": 121.112,
        "topografi": "Dataran",
        "penduduk": 1920,
        "kk": 490,
        "luas": "16.8 km²",
        "ipd": 75.9,
        "potensi": "Perkebunan Kakao Rakyat Berkelanjutan, Kelapa Dalam, dan Pisang.",
        "komoditas": "Biji Kakao, Kelapa Dalam, Pisang",
        "bumdes": "BUMDes Tani Subur Mikuasi",
        "faskes": "Poskesdes Mikuasi",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Tojambu",
        "status": "Maju",
        "sektor": "pertanian",
        "lat": -3.241,
        "lng": 121.125,
        "topografi": "Lembah Subur",
        "penduduk": 1780,
        "kk": 450,
        "luas": "17.5 km²",
        "ipd": 74.8,
        "potensi": "Pertanian Padi Sawah Irigasi Desa dan Perkebunan Kakao.",
        "komoditas": "Beras Sawah, Biji Kakao",
        "bumdes": "BUMDes Sumber Rejeki Tojambu",
        "faskes": "Poskesdes Tojambu",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.03",
    "nama": "Batu Putih",
    "lat": -3.1116,
    "lng": 121.2148,
    "ipd": 75.2,
    "status_ipd": "Maju",
    "potensi_utama": "Perikanan Tangkap Laut Dalam, Kelapa Kopra & Wisata Bahari",
    "komoditas": "Ikan Karang, Kelapa Dalam, Kakao, Cengkeh",
    "desa_count": 11,
    "odtw": "Tanjung Batu Putih, Wisata Bahari Latowu",
    "desaList": [
      {
        "nama": "Kelurahan Latowu",
        "status": "Maju",
        "sektor": "pariwisata",
        "lat": -3.1116,
        "lng": 121.2148,
        "topografi": "Pesisir Pantai",
        "penduduk": 2410,
        "kk": 610,
        "luas": "22.4 km²",
        "ipd": 78.4,
        "potensi": "Wisata Bahari Tanjung Batu Putih, Perikanan Tangkap Ikan Pelagis, dan Kopra.",
        "komoditas": "Ikan Tenggiri, Kopra, Kakao",
        "bumdes": "BUMDes Latowu Jaya",
        "faskes": "Puskesmas Batu Putih",
        "sekolah": "SD, SMP, Pustu",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Leowalu",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.095,
        "lng": 121.232,
        "topografi": "Dataran & Bukit",
        "penduduk": 1980,
        "kk": 510,
        "luas": "25.6 km²",
        "ipd": 76.1,
        "potensi": "Sentra Perkebunan Kakao Kualitas Ekspor dan Bunga Cengkeh Harum.",
        "komoditas": "Kakao, Cengkeh Kering",
        "bumdes": "BUMDes Bina Warga Leowalu",
        "faskes": "Poskesdes Leowalu",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Batu Putih",
        "status": "Mandiri",
        "sektor": "perikanan",
        "lat": -3.128,
        "lng": 121.205,
        "topografi": "Pesisir Teluk",
        "penduduk": 2150,
        "kk": 540,
        "luas": "20.1 km²",
        "ipd": 80.2,
        "potensi": "Perikanan Tangkap Laut Dalam Teluk Bone dan Sentra Perdagangan Ikan Basah.",
        "komoditas": "Ikan Cakalang, Tuna, Kakao",
        "bumdes": "BUMDes Samudera Putih",
        "faskes": "Pustu Batu Putih",
        "sekolah": "SD, SMP",
        "sinyal": "PLN 24 Jam, 4G Kuat"
      }
    ]
  },
  {
    "kode": "74.08.04",
    "nama": "Rante Angin",
    "lat": -3.6136,
    "lng": 121.0699,
    "ipd": 76.9,
    "status_ipd": "Maju",
    "potensi_utama": "Perkebunan Kakao Super Lestari & Lumbung Padi Irigasi",
    "komoditas": "Biji Kakao, Beras Sawah, Ternak Sapi",
    "desa_count": 7,
    "odtw": "Agrowisata Kakao Pohu, Lembah Rante Baru",
    "desaList": [
      {
        "nama": "Pohu",
        "status": "Mandiri",
        "sektor": "perkebunan",
        "lat": -3.605,
        "lng": 121.058,
        "topografi": "Lembah Subur",
        "penduduk": 2050,
        "kk": 530,
        "luas": "18.1 km²",
        "ipd": 82.5,
        "potensi": "Sentra Kakao Super Kencana Sertifikasi Lestari, Padi Sawah Irigasi Teknis, dan Peternakan Sapi.",
        "komoditas": "Kakao Fermentasi Grade A, Gabah Kering",
        "bumdes": "BUMDes Kakao Kencana Pohu",
        "faskes": "Poskesdes Pohu",
        "sekolah": "1 SD, 1 SMP, Poskesdes",
        "sinyal": "PLN 24 Jam, 4G Kuat"
      },
      {
        "nama": "Kelurahan Rante Baru",
        "status": "Maju",
        "sektor": "jasa",
        "lat": -3.6136,
        "lng": 121.0699,
        "topografi": "Dataran",
        "penduduk": 2240,
        "kk": 580,
        "luas": "16.2 km²",
        "ipd": 77.8,
        "potensi": "Pasar Tradisional Kecamatan Rante Angin & Pusat Transaksi Biji Kakao Petani.",
        "komoditas": "Biji Kakao, Hasil Bumi, Perdagangan",
        "bumdes": "BUMDes Mitra Usaha Rante Baru",
        "faskes": "Puskesmas Rante Angin",
        "sekolah": "Lengkap SD/SMP",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Lawekara",
        "status": "Maju",
        "sektor": "pertanian",
        "lat": -3.628,
        "lng": 121.082,
        "topografi": "Dataran Aluvial",
        "penduduk": 1840,
        "kk": 470,
        "luas": "19.4 km²",
        "ipd": 75.3,
        "potensi": "Lumbung Padi Sawah Irigasi, Penggilingan Beras Modern, dan Kakao.",
        "komoditas": "Beras Premium Sawah, Kakao",
        "bumdes": "BUMDes Tani Makmur Lawekara",
        "faskes": "Poskesdes Lawekara",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.05",
    "nama": "Kodeoha",
    "lat": -3.412,
    "lng": 121.0031,
    "ipd": 78.8,
    "status_ipd": "Maju",
    "potensi_utama": "Sentra Utama Kakao Fermentasi Ekspor & Perikanan Pesisir",
    "komoditas": "Kakao Super, Padi Sawah, Rumput Laut, Udang",
    "desa_count": 15,
    "odtw": "Pantai Mala-Mala, Sentra Biji Cokelat Meeto",
    "desaList": [
      {
        "nama": "Meeto",
        "status": "Mandiri",
        "sektor": "perkebunan",
        "lat": -3.405,
        "lng": 121.015,
        "topografi": "Dataran Perkebunan",
        "penduduk": 2120,
        "kk": 550,
        "luas": "17.3 km²",
        "ipd": 85,
        "potensi": "Sentra Pengolahan Fermentasi Biji Kakao Ekspor Binaan BPS dan Pemda Kolaka Utara.",
        "komoditas": "Biji Kakao Fermentasi Ekspor Grade A",
        "bumdes": "BUMDes Cokelat Prima Meeto",
        "faskes": "Polindes & Poskesdes",
        "sekolah": "SD, SMP, Polindes",
        "sinyal": "PLN 24 Jam, 4G Telkomsel Kuat"
      },
      {
        "nama": "Kelurahan Mala-Mala",
        "status": "Maju",
        "sektor": "pariwisata",
        "lat": -3.412,
        "lng": 121.0031,
        "topografi": "Pesisir Pantai",
        "penduduk": 2300,
        "kk": 590,
        "luas": "14.5 km²",
        "ipd": 79.1,
        "potensi": "Wisata Bahari Pantai Mala-Mala, Ikan Tangkap Laut, dan Perdagangan Pesisir.",
        "komoditas": "Ikan Tangkap Segar, Kelapa Kopra",
        "bumdes": "BUMDes Mala Bahari",
        "faskes": "Puskesmas Kodeoha",
        "sekolah": "SD, SMP",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Lametuna",
        "status": "Maju",
        "sektor": "perikanan",
        "lat": -3.398,
        "lng": 120.992,
        "topografi": "Pesisir Pantai",
        "penduduk": 1860,
        "kk": 470,
        "luas": "15.2 km²",
        "ipd": 76.5,
        "potensi": "Budidaya Rumput Laut Cottonii dan Tambak Bandeng Air Payau.",
        "komoditas": "Rumput Laut, Bandeng, Kakao",
        "bumdes": "BUMDes Tirta Bahari Lametuna",
        "faskes": "Poskesdes Lametuna",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.06",
    "nama": "Ngapa",
    "lat": -3.3568,
    "lng": 121.0745,
    "ipd": 79.1,
    "status_ipd": "Maju",
    "potensi_utama": "Lumbung Pangan Padi/Jagung & Sentra Kakao Rakyat",
    "komoditas": "Beras Organik, Jagung Hibrida, Kakao, Peternakan Sapi",
    "desa_count": 12,
    "odtw": "Hamparan Persawahan Lawolatu, Agrowisata Ngapa",
    "desaList": [
      {
        "nama": "Lawolatu",
        "status": "Mandiri",
        "sektor": "pertanian",
        "lat": -3.3568,
        "lng": 121.0745,
        "topografi": "Dataran Aluvial",
        "penduduk": 2650,
        "kk": 690,
        "luas": "21.4 km²",
        "ipd": 83.6,
        "potensi": "Lumbung Pangan Utama Padi Sawah Irigasi Teknis, Penggilingan Beras, dan Ternak Sapi.",
        "komoditas": "Beras Organik, Jagung Hibrida, Sapi",
        "bumdes": "BUMDes Lumbung Pangan Lawolatu",
        "faskes": "Puskesmas Pembantu Lawolatu",
        "sekolah": "SD, SMP, Madrasah Tsanawiyah",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Nganapa",
        "status": "Maju",
        "sektor": "pertanian",
        "lat": -3.342,
        "lng": 121.088,
        "topografi": "Dataran",
        "penduduk": 2210,
        "kk": 560,
        "luas": "19.2 km²",
        "ipd": 78.4,
        "potensi": "Sentra Jagung Hibrida, Perkebunan Kakao, dan Budidaya Ikan Nila Air Tawar.",
        "komoditas": "Jagung Hibrida, Kakao, Ikan Nila Kolam",
        "bumdes": "BUMDes Maju Bersama Nganapa",
        "faskes": "Poskesdes Nganapa",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Parombean",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.372,
        "lng": 121.065,
        "topografi": "Perbukitan Rendah",
        "penduduk": 1790,
        "kk": 450,
        "luas": "18.6 km²",
        "ipd": 76.2,
        "potensi": "Perkebunan Kakao Rakyat, Tanaman Cengkeh, dan Minyak Nilam.",
        "komoditas": "Biji Kakao, Minyak Nilam, Cengkeh",
        "bumdes": "BUMDes Bukit Hijau Parombean",
        "faskes": "Poskesdes Parombean",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.07",
    "nama": "Wawo",
    "lat": -3.6465,
    "lng": 121.1446,
    "ipd": 77.2,
    "status_ipd": "Maju",
    "potensi_utama": "Agrowisata Ikonik Danau Biru & Perkebunan Cengkeh/Kopi",
    "komoditas": "Cengkeh, Kopi Robusta, Kakao, Pariwisata Alam",
    "desa_count": 7,
    "odtw": "Danau Biru Kolaka Utara, Arung Jeram Sungai Tinukari",
    "desaList": [
      {
        "nama": "Walasiho",
        "status": "Mandiri",
        "sektor": "pariwisata",
        "lat": -3.638,
        "lng": 121.135,
        "topografi": "Perbukitan Karst & Danau",
        "penduduk": 1820,
        "kk": 470,
        "luas": "28.4 km²",
        "ipd": 84.8,
        "potensi": "Destinasi Wisata Ikonik Danau Biru Kolaka Utara dengan air sebening kaca, Perkebunan Cengkeh & Homestay Wisatawan.",
        "komoditas": "Wisata Danau Biru, Bunga Cengkeh Harum, Kopi",
        "bumdes": "BUMDes Danau Biru Indah (Pengelola Tiket, Parkir & Homestay)",
        "faskes": "Poskesdes Walasiho",
        "sekolah": "SD Negeri, Poskesdes",
        "sinyal": "PLN 24 Jam, 4G Telkomsel Kuat"
      },
      {
        "nama": "Tinukari",
        "status": "Mandiri",
        "sektor": "pariwisata",
        "lat": -3.655,
        "lng": 121.155,
        "topografi": "Lembah Sungai Pegunungan",
        "penduduk": 1940,
        "kk": 510,
        "luas": "24.2 km²",
        "ipd": 82.1,
        "potensi": "Wisata Petualangan Arung Jeram Sungai Tinukari, Kopi Robusta Dataran Tinggi, dan Cengkeh.",
        "komoditas": "Kopi Robusta Pegunungan, Cengkeh, Arung Jeram",
        "bumdes": "BUMDes Tinukari Adventure (Operator Rafting & Wisata Alam)",
        "faskes": "Poskesdes Tinukari",
        "sekolah": "SD Negeri, Poskesdes",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Ulu Wawo",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.6465,
        "lng": 121.1446,
        "topografi": "Dataran Tinggi Sejuk",
        "penduduk": 1680,
        "kk": 430,
        "luas": "22.8 km²",
        "ipd": 76.9,
        "potensi": "Kopi Organik Dataran Tinggi, Cengkeh Grade A, dan Sayuran Dataran Tinggi.",
        "komoditas": "Kopi Arabika/Robusta, Bunga Cengkeh",
        "bumdes": "BUMDes Sejahtera Wawo",
        "faskes": "Puskesmas Wawo",
        "sekolah": "SD, SMP",
        "sinyal": "PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.08",
    "nama": "Lambai",
    "lat": -3.5822,
    "lng": 121.0502,
    "ipd": 74.5,
    "status_ipd": "Maju",
    "potensi_utama": "Penyulingan Minyak Atsiri Nilam, Cengkeh & Kakao",
    "komoditas": "Minyak Nilam, Bunga Cengkeh Kering, Kakao",
    "desa_count": 7,
    "odtw": "Air Terjun Lambai, Kebun Cengkeh Perbukitan",
    "desaList": [
      {
        "nama": "Lambai",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.5822,
        "lng": 121.0502,
        "topografi": "Perbukitan Sejuk",
        "penduduk": 1910,
        "kk": 490,
        "luas": "16.5 km²",
        "ipd": 77.2,
        "potensi": "Sentra Penyulingan Minyak Atsiri Nilam Tradisional dan Perkebunan Cengkeh Rakyat.",
        "komoditas": "Minyak Nilam Murni, Bunga Cengkeh Kering",
        "bumdes": "BUMDes Nilam Makmur Lambai",
        "faskes": "Puskesmas Lambai",
        "sekolah": "SD, SMP, Pustu",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Woise",
        "status": "Mandiri",
        "sektor": "perkebunan",
        "lat": -3.571,
        "lng": 121.038,
        "topografi": "Dataran Rendah Subur",
        "penduduk": 1750,
        "kk": 440,
        "luas": "15.2 km²",
        "ipd": 80.5,
        "potensi": "Sentra Kakao Produktif Kualitas Ekspor dan Agribisnis Kelapa Dalam.",
        "komoditas": "Biji Kakao, Kelapa Dalam",
        "bumdes": "BUMDes Woise Berkah",
        "faskes": "Poskesdes Woise",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Kuat"
      },
      {
        "nama": "Tebongeano",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.595,
        "lng": 121.062,
        "topografi": "Lereng Perbukitan",
        "penduduk": 1620,
        "kk": 410,
        "luas": "18.4 km²",
        "ipd": 74.9,
        "potensi": "Perkebunan Bunga Cengkeh Harum, Kopi Robusta, dan Kakao.",
        "komoditas": "Cengkeh Kering, Kopi, Kakao",
        "bumdes": "BUMDes Agro Tebongeano",
        "faskes": "Poskesdes Tebongeano",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.09",
    "nama": "Watunohu",
    "lat": -3.2826,
    "lng": 120.9903,
    "ipd": 75.6,
    "status_ipd": "Maju",
    "potensi_utama": "Sentra Hortikultura Sayur-Buah & Perkebunan Kakao",
    "komoditas": "Sayuran Dataran, Pisang Barangan, Kakao",
    "desa_count": 8,
    "odtw": "Wisata Agro Buah Watunohu, Lembah Samaturu",
    "desaList": [
      {
        "nama": "Watunohu",
        "status": "Maju",
        "sektor": "pertanian",
        "lat": -3.2826,
        "lng": 120.9903,
        "topografi": "Dataran Aluvial",
        "penduduk": 2080,
        "kk": 540,
        "luas": "15.4 km²",
        "ipd": 78.2,
        "potensi": "Sentra Sayur Mayur (Cabai, Tomat, Terung), Pisang Barangan, dan Kakao.",
        "komoditas": "Sayur Segar, Pisang Barangan, Kakao",
        "bumdes": "BUMDes Tani Jaya Watunohu",
        "faskes": "Puskesmas Watunohu",
        "sekolah": "SD, SMP",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Samaturu",
        "status": "Mandiri",
        "sektor": "perkebunan",
        "lat": -3.268,
        "lng": 120.982,
        "topografi": "Dataran",
        "penduduk": 1850,
        "kk": 470,
        "luas": "16.8 km²",
        "ipd": 81,
        "potensi": "Perkebunan Kakao Kualitas Super, Kelapa Dalam, dan Tanaman Pangan.",
        "komoditas": "Biji Kakao, Kelapa, Jagung",
        "bumdes": "BUMDes Samaturu Maju",
        "faskes": "Poskesdes Samaturu",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Kuat"
      },
      {
        "nama": "Tamborasi",
        "status": "Maju",
        "sektor": "perikanan",
        "lat": -3.298,
        "lng": 120.998,
        "topografi": "Pesisir Sungai",
        "penduduk": 1690,
        "kk": 430,
        "luas": "14.2 km²",
        "ipd": 75.8,
        "potensi": "Perikanan Tangkap Air Tawar Sungai, Tambak Ikan Mas, dan Kakao.",
        "komoditas": "Ikan Nila, Ikan Mas, Kakao",
        "bumdes": "BUMDes Tirta Tamborasi",
        "faskes": "Poskesdes Tamborasi",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.10",
    "nama": "Pakue Tengah",
    "lat": -3.1962,
    "lng": 121.1491,
    "ipd": 75.8,
    "status_ipd": "Maju",
    "potensi_utama": "Pariwisata Bahari Pasir Putih & Perkebunan Kakao/Kopra",
    "komoditas": "Kelapa, Kakao, Ikan Tongkol/Tenggiri, Wisata",
    "desa_count": 9,
    "odtw": "Pantai Pasir Putih Majapahit, Teluk Salulotong",
    "desaList": [
      {
        "nama": "Pasir Putih",
        "status": "Mandiri",
        "sektor": "pariwisata",
        "lat": -3.189,
        "lng": 121.138,
        "topografi": "Pesisir Pantai Indah",
        "penduduk": 2110,
        "kk": 540,
        "luas": "17.8 km²",
        "ipd": 83.4,
        "potensi": "Objek Daya Tarik Wisata Pantai Pasir Putih dengan garis pantai panjang dan terumbu karang alami.",
        "komoditas": "Wisata Bahari Pasir Putih, Ikan Karang, Kelapa",
        "bumdes": "BUMDes Pasir Putih Lestari",
        "faskes": "Poskesdes Pasir Putih",
        "sekolah": "SD, SMP, Poskesdes",
        "sinyal": "PLN 24 Jam, 4G Kuat"
      },
      {
        "nama": "Kelurahan Labutolenggo",
        "status": "Maju",
        "sektor": "perikanan",
        "lat": -3.1962,
        "lng": 121.1491,
        "topografi": "Pesisir",
        "penduduk": 2280,
        "kk": 590,
        "luas": "16.1 km²",
        "ipd": 77.6,
        "potensi": "Dermaga Pendaratan Perahu Nelayan Tangkap Teluk Bone dan Sentra Kakao.",
        "komoditas": "Ikan Tongkol, Biji Kakao",
        "bumdes": "BUMDes Bahari Tolenggo",
        "faskes": "Puskesmas Pakue Tengah",
        "sekolah": "SD, SMP",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Majapahit",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.21,
        "lng": 121.162,
        "topografi": "Pesisir & Dataran",
        "penduduk": 1890,
        "kk": 480,
        "luas": "18.4 km²",
        "ipd": 75.9,
        "potensi": "Kelapa Kopra Putih Kualitas Ekspor, Tambak Bandeng, dan Perkebunan Kakao.",
        "komoditas": "Kopra Putih, Bandeng, Kakao",
        "bumdes": "BUMDes Surya Majapahit",
        "faskes": "Poskesdes Majapahit",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.11",
    "nama": "Pakue Utara",
    "lat": -3.1838,
    "lng": 121.2631,
    "ipd": 74.9,
    "status_ipd": "Maju",
    "potensi_utama": "Perikanan Tangkap & Sentra Kelapa Kopra",
    "komoditas": "Ikan Layang, Kopra Putih, Kakao",
    "desa_count": 9,
    "odtw": "Pelabuhan Rakyat Pakue, Pantai Matalle",
    "desaList": [
      {
        "nama": "Kelurahan Pakue",
        "status": "Maju",
        "sektor": "perikanan",
        "lat": -3.1838,
        "lng": 121.2631,
        "topografi": "Pesisir Pelabuhan",
        "penduduk": 2350,
        "kk": 600,
        "luas": "18.2 km²",
        "ipd": 77.8,
        "potensi": "Pangkalan Armada Nelayan Tangkap Laut Teluk Bone, Gudang Kelapa Kopra.",
        "komoditas": "Ikan Tangkap Laut, Kopra Putih",
        "bumdes": "BUMDes Nelayan Makmur",
        "faskes": "Puskesmas Pakue Utara",
        "sekolah": "SD, SMP",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Matalle",
        "status": "Mandiri",
        "sektor": "pariwisata",
        "lat": -3.172,
        "lng": 121.251,
        "topografi": "Pesisir Bahari",
        "penduduk": 1980,
        "kk": 510,
        "luas": "16.5 km²",
        "ipd": 81.2,
        "potensi": "Wisata Bahari Pantai Matalle, Pengeringan Ikan Asin Kering, dan Kakao.",
        "komoditas": "Ikan Asin Kering, Wisata, Kakao",
        "bumdes": "BUMDes Matalle Indah",
        "faskes": "Poskesdes Matalle",
        "sekolah": "SD Negeri, Pustu",
        "sinyal": "PLN 24 Jam, 4G Kuat"
      },
      {
        "nama": "Puundoho",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.198,
        "lng": 121.275,
        "topografi": "Dataran",
        "penduduk": 1810,
        "kk": 460,
        "luas": "19.8 km²",
        "ipd": 74.6,
        "potensi": "Perkebunan Kakao Rakyat, Kelapa Dalam, dan Tanaman Pangan.",
        "komoditas": "Kakao, Kelapa Dalam",
        "bumdes": "BUMDes Karya Mandiri",
        "faskes": "Poskesdes Puundoho",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.12",
    "nama": "Porehu",
    "lat": -3.0324,
    "lng": 121.2641,
    "ipd": 73.1,
    "status_ipd": "Berkembang",
    "potensi_utama": "Perkebunan Cengkeh, Kopi & Wisata Alam Air Terjun",
    "komoditas": "Cengkeh Grade A, Kopi Organik, Madu Hutan",
    "desa_count": 8,
    "odtw": "Air Terjun Sarambu, Panorama Puncak Porehu",
    "desaList": [
      {
        "nama": "Sarambu",
        "status": "Maju",
        "sektor": "pariwisata",
        "lat": -3.0324,
        "lng": 121.2641,
        "topografi": "Pegunungan Sejuk",
        "penduduk": 1720,
        "kk": 440,
        "luas": "31.2 km²",
        "ipd": 77,
        "potensi": "Wisata Air Terjun Sarambu Bertingkat, Kopi Robusta Organik, dan Madu Hutan Asli.",
        "komoditas": "Madu Hutan Liar, Kopi Robusta",
        "bumdes": "BUMDes Sarambu Indah (Wisata & Madu)",
        "faskes": "Poskesdes Sarambu",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Porehu",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.045,
        "lng": 121.252,
        "topografi": "Dataran Tinggi",
        "penduduk": 1680,
        "kk": 420,
        "luas": "26.4 km²",
        "ipd": 75.1,
        "potensi": "Kopi Robusta Dataran Tinggi Khas Kolut, Bunga Cengkeh, dan Minyak Nilam.",
        "komoditas": "Bunga Cengkeh Kering, Kopi",
        "bumdes": "BUMDes Porehu Maju",
        "faskes": "Puskesmas Porehu",
        "sekolah": "SD, SMP",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Larui",
        "status": "Berkembang",
        "sektor": "perkebunan",
        "lat": -3.018,
        "lng": 121.278,
        "topografi": "Lereng Gunung",
        "penduduk": 1420,
        "kk": 360,
        "luas": "28.9 km²",
        "ipd": 71.8,
        "potensi": "Perkebunan Minyak Atsiri Nilam, Cengkeh, dan Hasil Hutan Bukan Kayu.",
        "komoditas": "Nilam, Madu Alami, Kakao",
        "bumdes": "BUMDes Larui Lestari",
        "faskes": "Poskesdes Larui",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Cukup"
      }
    ]
  },
  {
    "kode": "74.08.13",
    "nama": "Katoi",
    "lat": -3.4554,
    "lng": 120.9768,
    "ipd": 77.5,
    "status_ipd": "Maju",
    "potensi_utama": "Kampung Nelayan Pesisir & Sentra Kakao",
    "komoditas": "Ikan Teri, Kakao, Olahan Ikan Asin, Kelapa",
    "desa_count": 6,
    "odtw": "Pantai Simbula, Dermaga Katoi",
    "desaList": [
      {
        "nama": "Simbula",
        "status": "Mandiri",
        "sektor": "pariwisata",
        "lat": -3.4554,
        "lng": 120.9768,
        "topografi": "Pesisir Pantai",
        "penduduk": 1960,
        "kk": 510,
        "luas": "13.8 km²",
        "ipd": 83.2,
        "potensi": "Wisata Bahari Pantai Simbula, Sentra Pengolahan Teri Kering Super Ekspor, dan Kakao.",
        "komoditas": "Ikan Teri Kering Super, Kakao",
        "bumdes": "BUMDes Simbula Bahari (Sentra Teri)",
        "faskes": "Poskesdes Simbula",
        "sekolah": "SD, SMP, Polindes",
        "sinyal": "PLN 24 Jam, 4G Kuat"
      },
      {
        "nama": "Katoi",
        "status": "Maju",
        "sektor": "perikanan",
        "lat": -3.442,
        "lng": 120.985,
        "topografi": "Pesisir",
        "penduduk": 1820,
        "kk": 460,
        "luas": "14.5 km²",
        "ipd": 77.8,
        "potensi": "Dermaga Pendaratan Perahu Nelayan Tangkap, Perkebunan Kakao, dan Kelapa Dalam.",
        "komoditas": "Ikan Tangkap, Biji Kakao",
        "bumdes": "BUMDes Katoi Sejahtera",
        "faskes": "Puskesmas Katoi",
        "sekolah": "SD, SMP",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Lambuno",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.468,
        "lng": 120.992,
        "topografi": "Perbukitan Rendah",
        "penduduk": 1650,
        "kk": 420,
        "luas": "15.1 km²",
        "ipd": 75.4,
        "potensi": "Perkebunan Kakao Kualitas Unggul dan Minyak Atsiri Nilam.",
        "komoditas": "Biji Kakao, Minyak Nilam",
        "bumdes": "BUMDes Lambuno Mandiri",
        "faskes": "Poskesdes Lambuno",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.14",
    "nama": "Tiwu",
    "lat": -3.3505,
    "lng": 120.9826,
    "ipd": 74,
    "status_ipd": "Maju",
    "potensi_utama": "Perkebunan Kakao, Kelapa & Budidaya Rumput Laut",
    "komoditas": "Kakao, Rumput Laut Eucheuma, Kelapa",
    "desa_count": 7,
    "odtw": "Pantai Tahibua, Sentra Budidaya Rumput Laut",
    "desaList": [
      {
        "nama": "Tahibua",
        "status": "Maju",
        "sektor": "perikanan",
        "lat": -3.3505,
        "lng": 120.9826,
        "topografi": "Pesisir Pantai",
        "penduduk": 1790,
        "kk": 460,
        "luas": "14.2 km²",
        "ipd": 77.5,
        "potensi": "Sentra Budidaya Rumput Laut Eucheuma Cottonii, Penjemuran Alami, dan Perkebunan Kakao.",
        "komoditas": "Rumput Laut Kering, Kakao",
        "bumdes": "BUMDes Laut Sejahtera",
        "faskes": "Pustu Tahibua",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Tiwu",
        "status": "Mandiri",
        "sektor": "perikanan",
        "lat": -3.338,
        "lng": 120.975,
        "topografi": "Pesisir & Tambak",
        "penduduk": 1910,
        "kk": 490,
        "luas": "15.6 km²",
        "ipd": 80.8,
        "potensi": "Tambak Budidaya Udang Windu, Pelabuhan Nelayan Tradisional, dan Kelapa Kopra.",
        "komoditas": "Udang Windu, Kopra, Kakao",
        "bumdes": "BUMDes Tiwu Raya",
        "faskes": "Puskesmas Tiwu",
        "sekolah": "SD, SMP",
        "sinyal": "PLN 24 Jam, 4G Kuat"
      },
      {
        "nama": "Madani",
        "status": "Maju",
        "sektor": "perkebunan",
        "lat": -3.365,
        "lng": 120.995,
        "topografi": "Dataran Subur",
        "penduduk": 1680,
        "kk": 430,
        "luas": "16.9 km²",
        "ipd": 75.3,
        "potensi": "Sentra Perkebunan Kakao Super Organik dan Tanaman Pangan Sawah.",
        "komoditas": "Biji Kakao, Gabah Padi",
        "bumdes": "BUMDes Madani Berkah",
        "faskes": "Poskesdes Madani",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Baik"
      }
    ]
  },
  {
    "kode": "74.08.15",
    "nama": "Tolala",
    "lat": -2.878,
    "lng": 121.1176,
    "ipd": 72.8,
    "status_ipd": "Berkembang",
    "potensi_utama": "Perikanan Bahari Teluk Bone & Madu Hutan",
    "komoditas": "Ikan Tuna/Cakalang, Madu Lebah Liar, Kakao",
    "desa_count": 6,
    "odtw": "Teluk Tolala, Wisata Bahari Desa Bahari",
    "desaList": [
      {
        "nama": "Bahari",
        "status": "Maju",
        "sektor": "pariwisata",
        "lat": -2.878,
        "lng": 121.1176,
        "topografi": "Teluk & Pesisir",
        "penduduk": 1650,
        "kk": 420,
        "luas": "29.5 km²",
        "ipd": 76.5,
        "potensi": "Kawasan Konservasi Terumbu Karang Teluk Tolala, Wisata Selam Bahari, dan Ikan Tangkap Laut Dalam.",
        "komoditas": "Ikan Tuna/Cakalang, Wisata Bahari",
        "bumdes": "BUMDes Bahari Lestari",
        "faskes": "Puskesmas Pembantu Bahari",
        "sekolah": "SD Negeri, Pustu",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Tolala",
        "status": "Maju",
        "sektor": "perikanan",
        "lat": -2.865,
        "lng": 121.128,
        "topografi": "Pesisir Pelabuhan",
        "penduduk": 1720,
        "kk": 440,
        "luas": "24.8 km²",
        "ipd": 74.8,
        "potensi": "Pelabuhan Perbatasan Provinsi, Pangkalan Armada Nelayan Tangkap Laut, dan Kopra.",
        "komoditas": "Ikan Layang, Cakalang, Kopra",
        "bumdes": "BUMDes Tolala Berjaya",
        "faskes": "Puskesmas Tolala",
        "sekolah": "SD, SMP",
        "sinyal": "PLN 24 Jam, 4G Baik"
      },
      {
        "nama": "Loka",
        "status": "Berkembang",
        "sektor": "perkebunan",
        "lat": -2.892,
        "lng": 121.105,
        "topografi": "Perbukitan Teluk",
        "penduduk": 1390,
        "kk": 350,
        "luas": "27.2 km²",
        "ipd": 71.4,
        "potensi": "Sentra Madu Lebah Hutan Liar Pegunungan Tolala, Kakao, dan Kelapa Dalam.",
        "komoditas": "Madu Hutan Asli, Biji Kakao",
        "bumdes": "BUMDes Loka Sejahtera",
        "faskes": "Poskesdes Loka",
        "sekolah": "1 SD Negeri",
        "sinyal": "PLN 24 Jam, 4G Cukup"
      }
    ]
  }
];

        // Baseline master copy for zero-data-loss reset
        const baselineKecamatanPodesList = JSON.parse(JSON.stringify(kecamatanPodesList));
        const PODES_STORAGE_KEY = 'bps_kolut_podes_admin_v2';

        // Load persisted modifications from localStorage
        function loadPersistedPodesData() {
            try {
                const raw = localStorage.getItem(PODES_STORAGE_KEY);
                if (raw) {
                    const parsed = JSON.parse(raw);
                    if (Array.isArray(parsed) && parsed.length === 15) {
                        kecamatanPodesList = parsed;
                    }
                }
            } catch (err) {
                console.warn('Gagal memuat localStorage PODES:', err);
            }
            updateCustomBadgeIndicators();
        }

        // Save active state to localStorage
        function persistPodesData() {
            try {
                localStorage.setItem(PODES_STORAGE_KEY, JSON.stringify(kecamatanPodesList));
                updateCustomBadgeIndicators();
            } catch (err) {
                console.error('Gagal menyimpan ke localStorage:', err);
            }
        }

        // Count custom/edited records
        function getCustomDesaCount() {
            let count = 0;
            kecamatanPodesList.forEach(k => {
                k.desaList.forEach(d => {
                    if (d.isCustom) count++;
                });
            });
            return count;
        }

        function updateCustomBadgeIndicators() {
            const count = getCustomDesaCount();
            const badgeHeader = document.getElementById('badgeAdminCustomCount');
            if (badgeHeader) {
                if (count > 0) {
                    badgeHeader.textContent = count + ' Baru';
                    badgeHeader.classList.remove('hidden');
                } else {
                    badgeHeader.classList.add('hidden');
                }
            }
            const badgePill = document.getElementById('badgeCustomRecordsPill');
            if (badgePill) {
                badgePill.textContent = count + ' Data Kustom';
            }
            const boxCount = document.getElementById('statBoxCustomCount');
            if (boxCount) {
                boxCount.textContent = count + ' Desa';
            }
        }

        // State variables
        let selectedKecamatan = null;
        let selectedDesa = null;
        let activeSektorFilter = 'all'; // Unified single filter state: 'all' | 'perkebunan' | 'perikanan' | 'pariwisata' | 'pertanian' | 'mandiri'
        let pinMode = 'clean'; // 'clean' (default, uncluttered) or 'all' (all 49 pins)
        let map = null;
        let geoJsonLayer = null;
        let villageMarkersGroup = null;
        let allVillageMarkers = [];
        let activeSelectedMarker = null;

        // Top 5 Flagship Highlight Villages across Kolaka Utara (Shown in Macro Clean View)
        const flagshipVillages = ['Pitulua', 'Walasiho', 'Meeto', 'Kondara', 'Lawolatu'];

        // Vector SVG Icons for Sectors (Official crisp vector graphics, zero emoticons)
        function getSectorSvgString(sektor, cls = 'w-3.5 h-3.5') {
            switch((sektor || '').toLowerCase()) {
                case 'pariwisata':
                    return `<svg class="${cls}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>`;
                case 'perkebunan':
                    return `<svg class="${cls}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>`;
                case 'perikanan':
                    return `<svg class="${cls}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2 12c4-4 10-4 14 0 2-2 4-2 6-1-1 3-1 7 1 9-2 1-4 1-6-1-4 4-10 4-14 0l3-3.5L2 12z"/><circle cx="17" cy="11" r="1" fill="currentColor"/></svg>`;
                case 'pertanian':
                    return `<svg class="${cls}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19V5m0 0a4 4 0 014 4v1a4 4 0 01-4 4m0-9a4 4 0 00-4 4v1a4 4 0 004 4m0 5a4 4 0 014-4h1a4 4 0 010 8h-1a4 4 0 01-4-4zm0 0a4 4 0 00-4-4H7a4 4 0 000 8h1a4 4 0 004-4z"/></svg>`;
                default:
                    return `<svg class="${cls}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>`;
            }
        }

        // Color helper for IPD BPS Blue palette
        function getIpdColor(ipd) {
            return ipd >= 80.0 ? '#0c4a6e' :
                   ipd >= 77.0 ? '#0284c7' :
                   ipd >= 75.0 ? '#38bdf8' :
                   ipd >= 73.0 ? '#7dd3fc' :
                                 '#bae6fd';
        }

        // Check if kecamatan matches the active sector
        function kecamatanMatchesSektor(k, sektor) {
            if (sektor === 'all') return true;
            if (sektor === 'mandiri') {
                return (k.mandiri_count && k.mandiri_count > 0) || k.status_ipd === 'Mandiri';
            }
            // Check desa in this kecamatan
            const hasDesaSektor = k.desaList.some(d => (d.sektor || '').toLowerCase() === sektor.toLowerCase());
            if (hasDesaSektor) return true;
            // Check potensi string
            const p = (k.potensi_utama + ' ' + (k.komoditas || '')).toLowerCase();
            const sectorKeywords = {
                perkebunan: ['kakao', 'cokelat', 'cengkeh', 'kopi', 'nilam'],
                perikanan: ['ikan', 'nelayan', 'tambak', 'udang', 'bandeng', 'laut', 'bahari'],
                pertanian: ['padi', 'sawah', 'jagung', 'hortikultura', 'sayur', 'pangan'],
                pariwisata: ['wisata', 'pantai', 'danau', 'air terjun', 'odtw']
            };
            const kws = sectorKeywords[sektor] || [];
            return kws.some(kw => p.includes(kw));
        }

        // Initialize Kecamatan Select Dropdown
        function initKecamatanDropdown() {
            const selectKec = document.getElementById('selectKecamatan');
            if (!selectKec) return;
            selectKec.innerHTML = '<option value="">Semua Kecamatan (15 Kec)</option>' + 
                kecamatanPodesList.map(k => `<option value="${k.kode}">${k.nama} (IPD: ${k.ipd})</option>`).join('');

            selectKec.addEventListener('change', (e) => {
                const kode = e.target.value;
                const matched = kecamatanPodesList.find(k => k.kode === kode);
                setActiveKecamatan(matched || null);
            });
        }

        // Update Desa Select Dropdown based on chosen Kecamatan & Sektor
        function updateDesaDropdown(kec) {
            const selectDesa = document.getElementById('selectDesa');
            if (!selectDesa) return;

            let villages = [];
            if (!kec) {
                kecamatanPodesList.forEach(k => {
                    k.desaList.forEach(d => villages.push({ ...d, kecamatanName: k.nama, kecKode: k.kode }));
                });
            } else {
                villages = kec.desaList.map(d => ({ ...d, kecamatanName: kec.nama, kecKode: kec.kode }));
            }

            // Filter villages by active sector if set
            if (activeSektorFilter !== 'all') {
                if (activeSektorFilter === 'mandiri') {
                    villages = villages.filter(v => v.status === 'Mandiri');
                } else {
                    villages = villages.filter(v => (v.sektor || '').toLowerCase() === activeSektorFilter.toLowerCase());
                }
            }

            let options = '<option value="">Pilih Desa / Semua</option>';
            villages.forEach(d => {
                options += `<option value="${d.kecKode}|${d.nama}">${d.nama} (${d.kecamatanName}) - [${d.status}]</option>`;
            });
            selectDesa.innerHTML = options;

            selectDesa.onchange = (e) => {
                const val = e.target.value;
                if (!val) {
                    showDesaProfile(null);
                } else {
                    const [kCode, dName] = val.split('|');
                    const targetKec = kecamatanPodesList.find(k => k.kode === kCode);
                    if (targetKec) {
                        const targetDesa = targetKec.desaList.find(d => d.nama === dName);
                        if (targetDesa) {
                            focusDesa(targetDesa, targetKec, true);
                        }
                    }
                }
            };
        }

        // Master Unified Sector Filter Function
        function applySektorFilter(sektor) {
            activeSektorFilter = (sektor || 'all').toLowerCase();

            // 1. Sync Header Select Dropdown
            const selectSektor = document.getElementById('selectSektor');
            if (selectSektor) {
                // If sektor is 'mandiri', set to 'all' on select, else set matching value
                selectSektor.value = ['perkebunan', 'perikanan', 'pertanian', 'pariwisata'].includes(activeSektorFilter) ? activeSektorFilter : 'all';
            }

            // 2. Sync Quick Category Pills
            document.querySelectorAll('.btn-quick-filter').forEach(btn => {
                const cat = btn.getAttribute('data-category');
                if (cat === activeSektorFilter) {
                    btn.className = 'btn-quick-filter px-3 py-1 rounded-full bg-white text-[#005ea6] font-bold transition shrink-0 flex items-center gap-1.5 shadow-sm active-filter';
                } else {
                    btn.className = 'btn-quick-filter px-3 py-1 rounded-full bg-white/10 hover:bg-white text-white hover:text-[#005ea6] font-semibold transition shrink-0 flex items-center gap-1.5';
                }
            });

            // 3. Sync Map Pin Filter Buttons
            document.querySelectorAll('.btn-pin-filter').forEach(btn => {
                const pType = btn.getAttribute('data-pin-type');
                if (pType === activeSektorFilter) {
                    btn.className = 'btn-pin-filter px-2 py-0.5 rounded-md bg-[#005ea6] text-white font-bold text-[11px] shadow-xs';
                } else {
                    btn.className = 'btn-pin-filter px-2 py-0.5 rounded-md bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 font-medium text-[11px]';
                }
            });

            // 4. Highlight Top Metric Cards
            const cardIds = {
                perkebunan: 'cardSektorPerkebunan',
                perikanan: 'cardSektorPerikanan',
                pariwisata: 'cardSektorPariwisata',
                mandiri: 'cardSektorMandiri'
            };
            Object.entries(cardIds).forEach(([sec, id]) => {
                const el = document.getElementById(id);
                if (el) {
                    if (sec === activeSektorFilter) {
                        el.classList.add('card-sektor-active');
                    } else {
                        el.classList.remove('card-sektor-active');
                    }
                }
            });

            // 5. Update Status Pill Text
            const sectorNames = {
                all: 'Semua Sektor (15 Kecamatan, 133 Desa)',
                perkebunan: 'Sektor Perkebunan Kakao & Cengkeh (Sentra Utama)',
                perikanan: 'Sektor Perikanan & Kelautan Teluk Bone',
                pertanian: 'Sektor Pertanian & Lumbung Pangan Padi',
                pariwisata: 'Sektor Pariwisata & Ekowisata Desa',
                mandiri: 'Klasifikasi Desa Mandiri (IPD Unggulan)'
            };
            const statusEl = document.getElementById('filterStatusText');
            if (statusEl) {
                if (selectedKecamatan) {
                    statusEl.textContent = `Kec. ${selectedKecamatan.nama} • ${sectorNames[activeSektorFilter] || activeSektorFilter}`;
                } else {
                    statusEl.textContent = sectorNames[activeSektorFilter] || activeSektorFilter;
                }
            }

            // 6. Update Desa Dropdown, Village List, and Map Markers
            updateDesaDropdown(selectedKecamatan);
            renderVillageCards(selectedKecamatan, document.getElementById('inputSearchDesaList').value);
            filterVillageMarkers();
            updateMapPolygonsForSector();
        }
        window.applySektorFilter = applySektorFilter;

        // Dynamic Visual Reaction on Map Polygons when Sector changes
        function updateMapPolygonsForSector() {
            if (!geoJsonLayer) return;

            geoJsonLayer.eachLayer(layer => {
                const p = layer.feature.properties;
                const matchedKec = kecamatanPodesList.find(k => k.kode === p.kode);
                if (!matchedKec) return;

                const isSelectedKec = selectedKecamatan && selectedKecamatan.kode === p.kode;
                const isMatch = kecamatanMatchesSektor(matchedKec, activeSektorFilter);

                if (activeSektorFilter === 'all') {
                    // Normal choropleth
                    if (isSelectedKec) {
                        layer.setStyle({ weight: 3, color: '#004077', fillOpacity: 0.95 });
                    } else {
                        geoJsonLayer.resetStyle(layer);
                    }
                } else if (isMatch) {
                    // Highlight matching kecamatan brightly
                    layer.setStyle({
                        fillColor: activeSektorFilter === 'perkebunan' ? '#ea580c' :
                                   activeSektorFilter === 'perikanan' ? '#005ea6' :
                                   activeSektorFilter === 'pariwisata' ? '#16a34a' :
                                   activeSektorFilter === 'pertanian' ? '#ca8a04' : '#0284c7',
                        weight: isSelectedKec ? 3 : 2,
                        opacity: 1,
                        color: '#ffffff',
                        fillOpacity: 0.92
                    });
                } else {
                    // Dim kecamatan that do not belong to this sector
                    layer.setStyle({
                        fillColor: '#cbd5e1',
                        weight: 1,
                        opacity: 0.4,
                        color: '#94a3b8',
                        fillOpacity: 0.18
                    });
                }
            });
        }

        // Render Village List cards on right side
        function renderVillageCards(filterKec = null, searchQuery = '') {
            const container = document.getElementById('villageCardsContainer');
            if (!container) return;

            let villages = [];
            if (filterKec) {
                villages = filterKec.desaList.map(d => ({ ...d, kecamatanName: filterKec.nama, kecKode: filterKec.kode }));
            } else {
                kecamatanPodesList.forEach(k => {
                    k.desaList.forEach(d => {
                        villages.push({ ...d, kecamatanName: k.nama, kecKode: k.kode });
                    });
                });
            }

            // Sektor filter (Clean, unified logic)
            if (activeSektorFilter !== 'all') {
                if (activeSektorFilter === 'mandiri') {
                    villages = villages.filter(v => v.status === 'Mandiri');
                } else {
                    villages = villages.filter(v => (v.sektor || '').toLowerCase() === activeSektorFilter.toLowerCase());
                }
            }

            if (searchQuery) {
                const q = searchQuery.toLowerCase();
                villages = villages.filter(v => v.nama.toLowerCase().includes(q) || v.kecamatanName.toLowerCase().includes(q) || v.potensi.toLowerCase().includes(q) || (v.komoditas || '').toLowerCase().includes(q));
            }

            document.getElementById('totalDesaCountBadge').textContent = `${villages.length} Desa Terdata`;

            if (villages.length === 0) {
                container.innerHTML = `<div class="p-6 text-center text-slate-400 text-xs">Tidak ada desa yang cocok dengan kriteria filter saat ini.</div>`;
                return;
            }

            container.innerHTML = villages.map(v => `
                <div class="village-item-card p-3 rounded-xl border border-slate-200/90 hover:border-blue-400 hover:bg-blue-50/40 bg-white shadow-2xs transition group" data-kec="${v.kecKode}" data-desa="${v.nama}">
                    <div class="flex items-start justify-between gap-2 mb-1.5">
                        <div class="flex items-center gap-1.5">
                            <span class="w-6 h-6 rounded-lg bg-slate-100 flex items-center justify-center text-slate-700 shrink-0">
                                ${getSectorSvgString(v.sektor, 'w-3.5 h-3.5')}
                            </span>
                            <span class="font-bold text-slate-900 text-xs group-hover:text-[#005ea6] transition">${v.nama}</span>
                        </div>
                        <span class="text-[9px] font-black px-2 py-0.5 rounded-full uppercase tracking-wider ${v.status === 'Mandiri' ? 'bg-emerald-100 text-emerald-800 border border-emerald-300' : (v.status === 'Maju' ? 'bg-sky-100 text-sky-800 border border-sky-300' : 'bg-amber-100 text-amber-800 border border-amber-300')}">${v.status}</span>
                    </div>

                    <div class="text-[11px] text-slate-500 mb-1.5 flex items-center justify-between">
                        <span>Kec. ${v.kecamatanName} • ${v.topografi}</span>
                        <span class="font-mono text-slate-700 font-semibold">${v.penduduk.toLocaleString('id-ID')} Jiwa</span>
                    </div>

                    <p class="text-[10px] text-slate-600 line-clamp-2 leading-relaxed mb-2.5 italic">"${v.potensi}"</p>

                    <div class="flex items-center justify-between pt-2 border-t border-slate-100 text-[10px]">
                        <span class="text-slate-400 font-medium">IPD: <b class="text-[#005ea6]">${v.ipd}</b></span>
                        <button class="btn-lihat-peta px-2.5 py-1 bg-blue-50 hover:bg-[#005ea6] text-[#005ea6] hover:text-white rounded-md font-bold transition flex items-center gap-1.5">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Lihat di Peta</span>
                        </button>
                    </div>
                </div>
            `).join('');

            // Add click listeners to cards
            container.querySelectorAll('.village-item-card').forEach(card => {
                const kCode = card.getAttribute('data-kec');
                const dName = card.getAttribute('data-desa');
                const targetKec = kecamatanPodesList.find(k => k.kode === kCode);
                if (targetKec) {
                    const targetDesa = targetKec.desaList.find(d => d.nama === dName);
                    if (targetDesa) {
                        card.addEventListener('click', () => {
                            focusDesa(targetDesa, targetKec, true);
                        });
                    }
                }
            });
        }

        // Show/Hide Desa Detailed Profile Hero Card
        function showDesaProfile(desa, kec) {
            const card = document.getElementById("cardProfilDesaSpesifik");
            if (!card) return;
            const placeholder = document.getElementById('cardProfilPlaceholder');
            if (!desa) {
                card.classList.add('hidden');
                if (placeholder) placeholder.classList.remove('hidden');
                return;
            }

            card.classList.remove('hidden');
            if (placeholder) placeholder.classList.add('hidden');
            document.getElementById('desaNamaTitle').textContent = `Desa ${desa.nama}`;
            document.getElementById('desaKecamatanName').textContent = kec.nama;
            
            const badge = document.getElementById('desaBadgeStatus');
            badge.textContent = `Desa ${desa.status}`;
            badge.className = `px-3 py-0.5 rounded-full text-xs font-black uppercase tracking-wider ${desa.status === 'Mandiri' ? 'bg-emerald-400 text-slate-950' : (desa.status === 'Maju' ? 'bg-sky-400 text-slate-950' : 'bg-amber-300 text-slate-950')}`;

            // SVG icon in Sektor badge
            const svgBox = document.getElementById('desaSektorSvgContainer');
            if (svgBox) svgBox.innerHTML = getSectorSvgString(desa.sektor, 'w-3.5 h-3.5 text-amber-300');
            document.getElementById('desaSektorText').textContent = `Sektor ${(desa.sektor || 'Unggulan').toUpperCase()}`;

            document.getElementById('desaTopografiBadge').textContent = desa.topografi;
            document.getElementById('desaStatPenduduk').textContent = `${desa.penduduk.toLocaleString('id-ID')} Jiwa`;
            document.getElementById('desaStatKK').textContent = `${desa.kk} KK`;
            document.getElementById('desaStatLuas').textContent = desa.luas;
            document.getElementById('desaPotensiDesc').textContent = desa.potensi;
            document.getElementById('desaKomoditasText').textContent = desa.komoditas || 'Kakao, Cengkeh, Kelapa';
            document.getElementById('desaBumdesDesc').textContent = desa.bumdes || 'BUMDes Aktif Desa';
            document.getElementById('desaPendidikanDesc').textContent = desa.sekolah || 'Tersedia Fasilitas Pendidikan';
            document.getElementById('desaFaskesText').textContent = desa.faskes || 'Poskesdes & Bidan Desa';
            document.getElementById('desaInfrastrukturDesc').textContent = desa.sinyal || 'PLN 24 Jam & 4G';

            // Sync select
            const selectDesa = document.getElementById('selectDesa');
            if (selectDesa) selectDesa.value = `${kec.kode}|${desa.nama}`;
            document.getElementById('filterStatusText').textContent = `Desa ${desa.nama}, Kec. ${kec.nama} (IPD: ${desa.ipd})`;

            // Setup focus button inside banner
            const btnFocus = document.getElementById('btnFocusDesaOnMap');
            btnFocus.onclick = () => {
                focusDesa(desa, kec, true);
                document.getElementById('sectionPeta').scrollIntoView({ behavior: 'smooth' });
            };

            // Dynamically update Visualisasi Data & Diagram Radar to reflect this village!
            if (typeof updateChartsForVillage === 'function') {
                updateChartsForVillage(desa, kec);
            }
        }

        // Focus a specific desa on map with animated flyTo and rich popup
        function focusDesa(desa, kec, shouldScrollToHero = false) {
            selectedDesa = desa;
            showDesaProfile(desa, kec);

            // Ensure marker is in map layer
            const matched = allVillageMarkers.find(m => m.desaNama === desa.nama && m.kecKode === kec.kode);
            if (matched && villageMarkersGroup && !villageMarkersGroup.hasLayer(matched.marker)) {
                villageMarkersGroup.addLayer(matched.marker);
            }

            if (map && desa.lat && desa.lng) {
                map.flyTo([desa.lat, desa.lng], 13, {
                    animate: true,
                    duration: 1.1
                });

                if (matched) {
                    if (activeSelectedMarker && activeSelectedMarker._icon) {
                        const pinEl = activeSelectedMarker._icon.querySelector('.village-marker-pin');
                        if (pinEl) pinEl.classList.remove('pin-selected');
                    }
                    activeSelectedMarker = matched.marker;
                    if (matched.marker._icon) {
                        const pinEl = matched.marker._icon.querySelector('.village-marker-pin');
                        if (pinEl) pinEl.classList.add('pin-selected');
                    }
                    setTimeout(() => {
                        matched.marker.openPopup();
                    }, 400);
                }
            }

            if (shouldScrollToHero) {
                const hero = document.getElementById('cardProfilDesaSpesifik');
                hero.classList.add('ring-2', 'ring-emerald-500');
                setTimeout(() => hero.classList.remove('ring-2', 'ring-emerald-500'), 1500);
            }
        }

        // Expose focus kecamatan from Hero vector map
        window.focusKecamatanFromHero = function(kecName) {
            const matched = kecamatanPodesList.find(k => k.nama.toLowerCase() === (kecName || '').toLowerCase());
            if (matched) {
                setActiveKecamatan(matched);
                if (typeof showToast === 'function') {
                    showToast(`Menampilkan peta wilayah Kecamatan ${matched.nama}...`);
                }
            }
            const mapSection = document.getElementById('sectionPeta');
            if (mapSection) {
                mapSection.scrollIntoView({ behavior: 'smooth' });
            }
        };

        // Set Active Kecamatan (Syncs map, dropdown, cards)
        function setActiveKecamatan(kec) {
            selectedKecamatan = kec;

            const selectKec = document.getElementById('selectKecamatan');
            if (selectKec) selectKec.value = kec ? kec.kode : '';

            const badgeKec = document.getElementById('badgeKecamatanTerpilih');
            const banner = document.getElementById('mapKecamatanBanner');
            const statusText = document.getElementById('filterStatusText');

            if (!kec) {
                if (badgeKec) badgeKec.textContent = '15 Kecamatan';
                if (banner) banner.classList.add('hidden');
                if (statusText) statusText.textContent = 'Kabupaten Kolaka Utara (15 Kecamatan, 133 Desa)';
                showDesaProfile(null);
                updateDesaDropdown(null);
                renderVillageCards(null);

                // Reset Map View
                if (map && geoJsonLayer) {
                    map.fitBounds(geoJsonLayer.getBounds(), { padding: [15, 15] });
                    updateMapPolygonsForSector();
                }

                // Filter village markers cleanly
                filterVillageMarkers();
            } else {
                if (badgeKec) badgeKec.textContent = `Kecamatan ${kec.nama}`;
                if (banner) banner.classList.remove('hidden');
                document.getElementById('mapBannerKecName').textContent = kec.nama;
                document.getElementById('mapBannerKecPotensi').textContent = `• Potensi: ${kec.potensi_utama}`;
                if (statusText) statusText.textContent = `Kecamatan ${kec.nama} (${kec.desa_count} Desa, IPD: ${kec.ipd})`;
                
                updateDesaDropdown(kec);
                renderVillageCards(kec);

                // Focus on Polygon
                if (map && geoJsonLayer) {
                    geoJsonLayer.eachLayer(l => {
                        const p = l.feature.properties;
                        if (p.kode === kec.kode || (p.kecamatan || '').toLowerCase() === kec.nama.toLowerCase()) {
                            l.setStyle({
                                weight: 3,
                                color: '#004077',
                                fillOpacity: 0.95
                            });
                            map.fitBounds(l.getBounds(), { padding: [30, 30] });
                            l.openPopup();
                        } else {
                            geoJsonLayer.resetStyle(l);
                        }
                    });
                }

                // In clean mode, now show the villages of this kecamatan!
                filterVillageMarkers();
            }
        }

        // Filter village markers on map (Semua tanda di peta dihilangkan sesuai permintaan user)
        function filterVillageMarkers() {
            if (!villageMarkersGroup) return;
            villageMarkersGroup.clearLayers();
        }


        // Standalone Function: Build all village markers from active dataset (Semua tanda di peta dihilangkan)
        function buildAllVillageMarkers() {
            if (!villageMarkersGroup) return;
            villageMarkersGroup.clearLayers();
            allVillageMarkers = [];
        }

        // Initialize Leaflet Map
        function initLeafletMap() {
            if (typeof L === 'undefined' || map || !document.getElementById('map')) return;

            map = L.map('map', {
                center: [-3.25, 121.15],
                zoom: 9,
                zoomControl: true,
                attributionControl: false
            });

            // Esri World Light Gray Base (Free, No API Key, Clean Monochrome Aesthetic)
            const esriGray = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 16,
                attribution: '© Esri, OpenStreetMap'
            }).addTo(map);

            // Pane for Reference Labels
            map.createPane('labels');
            map.getPane('labels').style.zIndex = 650;
            map.getPane('labels').style.pointerEvents = 'none';

            L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Reference/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 16,
                pane: 'labels'
            }).addTo(map);

            // Citra Satelit / Ortofoto Resolusi Tinggi
            const esriSatellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 19,
                attribution: '© Esri, Maxar, Earthstar Geographics'
            });

            // OpenStreetMap layer option
            const osmLayer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            });

            L.control.layers({
                "Abu-abu BPS (Default)": esriGray,
                "Citra Satelit / Ortofoto Wilayah": esriSatellite,
                "OpenStreetMap": osmLayer
            }, null, { position: 'topright', collapsed: true }).addTo(map);

            // Feature Group for Village Pins
            villageMarkersGroup = L.featureGroup().addTo(map);

            // Build Village Markers with Crisp Official SVG Icons
            buildAllVillageMarkers();
            filterVillageMarkers();


            // Coordinate Picker Map Click Handler
            map.on('click', (e) => {
                if (window.isMapCoordPickerActive) {
                    const lat = parseFloat(e.latlng.lat.toFixed(6));
                    const lng = parseFloat(e.latlng.lng.toFixed(6));
                    window.handleMapCoordSelected(lat, lng);
                }
            });

            // Load GeoJSON Polygons for 15 Kecamatan
            const geojsonData = window.KOLAKA_UTARA_GEOJSON;
            if (!geojsonData) return;

            geoJsonLayer = L.geoJSON(geojsonData, {
                style: (feature) => {
                    const ipd = feature.properties.ipd || 75;
                    return {
                        fillColor: getIpdColor(ipd),
                        weight: 1.5,
                        opacity: 1,
                        color: '#ffffff',
                        dashArray: '',
                        fillOpacity: 0.85
                    };
                },
                onEachFeature: (feature, layer) => {
                    const p = feature.properties;
                    const matchedKec = kecamatanPodesList.find(k => k.kode === p.kode);
                    const ipdVal = matchedKec ? matchedKec.ipd : (p.ipd || 75);
                    const potensi = matchedKec ? matchedKec.potensi_utama : (p.potensi_utama || 'Perkebunan Kakao');

                    // Tooltip on Hover
                    layer.bindTooltip(`
                        <div class="text-left font-sans">
                            <div class="font-bold text-white text-xs border-b border-white/20 pb-1 mb-1">
                                Kecamatan ${p.kecamatan || p.nama}
                            </div>
                            <div class="text-sky-300 text-[11px] font-semibold mb-1">
                                Indeks IPD: ${ipdVal} (${matchedKec ? matchedKec.status_ipd : 'Maju'})
                            </div>
                            <div class="text-gray-300 text-[10px] leading-tight">
                                ${potensi}
                            </div>
                            <div class="text-amber-300 text-[10px] mt-1">
                                Jumlah Desa: ${matchedKec ? matchedKec.desa_count : 8} Desa/Kel
                            </div>
                        </div>
                    `, {
                        className: 'custom-tooltip',
                        sticky: true,
                        direction: 'top',
                        offset: [0, -10]
                    });

                    // Hover & Click Handlers
                    layer.on({
                        mouseover: (e) => {
                            const l = e.target;
                            l.setStyle({
                                weight: 2.5,
                                color: '#004077',
                                fillOpacity: 0.95
                            });
                            l.bringToFront();
                        },
                        mouseout: (e) => {
                            if (selectedKecamatan && selectedKecamatan.kode === p.kode) return;
                            updateMapPolygonsForSector();
                        },
                        click: () => {
                            const matched = kecamatanPodesList.find(k => k.kode === p.kode || k.nama.toLowerCase() === (p.kecamatan || '').toLowerCase());
                            if (matched) setActiveKecamatan(matched);
                        }
                    });

                    // Rich Leaflet Popup for Kecamatan with Interactive Village Chips
                    const villageChipsHtml = (matchedKec && matchedKec.desaList) ? matchedKec.desaList.map(d => `
                        <button class="px-2 py-1 rounded-md bg-blue-50 hover:bg-[#005ea6] hover:text-white border border-blue-200 text-[#005ea6] text-[10px] font-semibold transition flex items-center gap-1" onclick="document.dispatchEvent(new CustomEvent('podesSelectDesa', { detail: { kecKode: '${matchedKec.kode}', desaNama: '${d.nama}' } }))">
                            ${getSectorSvgString(d.sektor, 'w-3 h-3')}
                            <span>${d.nama}</span>
                        </button>
                    `).join('') : '';

                    layer.bindPopup(`
                        <div class="font-sans w-[280px] sm:w-[310px] text-left">
                            <!-- Header -->
                            <div class="bg-gradient-to-r from-[#004077] to-[#005ea6] p-3 text-white rounded-t-xl">
                                <div class="flex items-center justify-between text-[10px] mb-1">
                                    <span class="font-mono bg-white/20 px-1.5 py-0.5 rounded font-bold">${p.kode || 'BPS 7408'}</span>
                                    <span class="bg-amber-400 text-slate-950 px-2 py-0.5 rounded-full font-black uppercase text-[9px]">${matchedKec ? matchedKec.status_ipd : 'Maju'}</span>
                                </div>
                                <h4 class="text-base font-extrabold uppercase tracking-wide">
                                    Kecamatan ${p.kecamatan || p.nama}
                                </h4>
                                <div class="text-[11px] text-blue-100 flex items-center justify-between mt-1">
                                    <span>Skor IPD: <b class="text-amber-300 font-bold">${ipdVal} / 100</b></span>
                                    <span>Total: <b>${matchedKec ? matchedKec.desa_count : 8} Desa</b></span>
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="p-3 bg-white space-y-2.5">
                                <div class="text-xs text-slate-600">
                                    <b class="text-slate-800 block text-[11px] mb-0.5">Potensi Utama Daerah:</b>
                                    ${potensi}
                                </div>

                                <!-- Village Chips inside Popup -->
                                <div class="pt-2 border-t border-slate-100">
                                    <span class="block text-[10px] font-bold text-slate-500 uppercase tracking-wide mb-1.5">
                                        Pilih Desa untuk Zoom ke Titik:
                                    </span>
                                    <div class="flex flex-wrap gap-1 max-h-24 overflow-y-auto pr-0.5">
                                        ${villageChipsHtml}
                                    </div>
                                </div>

                                <div class="pt-2 border-t border-slate-100">
                                    <button class="w-full text-center py-1.5 bg-[#005ea6] hover:bg-[#004077] text-white font-bold rounded-lg text-xs transition" onclick="document.dispatchEvent(new CustomEvent('podesSelectKec', { detail: '${p.kode}' }))">
                                        Tampilkan Semua Desa di Kec. ${p.kecamatan || p.nama}
                                    </button>
                                </div>
                            </div>
                        </div>
                    `, { maxWidth: 330 });
                }
            }).addTo(map);

            map.fitBounds(geoJsonLayer.getBounds(), { padding: [15, 15] });
        }

        // Render Modal Table for 15 Kecamatan
        function renderModalTable(filterQuery = '') {
            const tbody = document.getElementById('modalTableBody');
            if (!tbody) return;

            const q = filterQuery.toLowerCase().trim();
            const filtered = kecamatanPodesList.filter(k => 
                k.nama.toLowerCase().includes(q) || 
                k.potensi_utama.toLowerCase().includes(q) ||
                k.komoditas.toLowerCase().includes(q)
            );

            tbody.innerHTML = filtered.map((kec, idx) => `
                <tr class="hover:bg-blue-50/50 transition">
                    <td class="p-2.5 text-slate-400 font-mono">${idx + 1}</td>
                    <td class="p-2.5 font-bold text-slate-800">
                        ${kec.nama}
                        ${kec.kode === '74.08.01' ? '<span class="text-[9px] bg-blue-100 text-[#005ea6] px-1 py-0.5 rounded ml-1 font-normal">Ibukota</span>' : ''}
                    </td>
                    <td class="p-2.5 text-slate-600 max-w-[200px] truncate" title="${kec.potensi_utama}">
                        ${kec.potensi_utama}
                    </td>
                    <td class="p-2.5 text-center font-mono font-semibold">${kec.desa_count}</td>
                    <td class="p-2.5 text-center">
                        <span class="font-bold text-[#005ea6] tabular-nums">${kec.ipd}</span>
                    </td>
                    <td class="p-2.5 text-center">
                        <span class="text-[10px] font-bold px-1.5 py-0.5 rounded ${kec.status_ipd === 'Mandiri' ? 'bg-emerald-100 text-emerald-800' : 'bg-blue-100 text-blue-800'}">
                            ${kec.status_ipd}
                        </span>
                    </td>
                    <td class="p-2.5 text-center">
                        <button class="btn-modal-pilih text-[11px] bg-blue-50 hover:bg-blue-100 text-[#005ea6] font-bold px-2.5 py-1 rounded-md transition" data-kode="${kec.kode}">
                            Pilih
                        </button>
                    </td>
                </tr>
            `).join('');

            tbody.querySelectorAll('.btn-modal-pilih').forEach(btn => {
                btn.addEventListener('click', () => {
                    const kode = btn.getAttribute('data-kode');
                    const matched = kecamatanPodesList.find(k => k.kode === kode);
                    if (matched) {
                        setActiveKecamatan(matched);
                        document.getElementById('modal15Kecamatan').classList.add('hidden');
                        document.getElementById('sectionPeta').scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
        }

        // Setup Event Listeners
        function setupEvents() {
            // Sektor filter select (Unified)
            document.getElementById('selectSektor')?.addEventListener('change', (e) => {
                applySektorFilter(e.target.value);
            });

            // Quick category pills
            document.querySelectorAll('.btn-quick-filter').forEach(btn => {
                btn.addEventListener('click', () => {
                    const cat = btn.getAttribute('data-category');
                    applySektorFilter(cat);
                });
            });

            // Pin filter buttons on map toolbar
            document.querySelectorAll('.btn-pin-filter').forEach(btn => {
                btn.addEventListener('click', () => {
                    const pType = btn.getAttribute('data-pin-type');
                    applySektorFilter(pType);
                });
            });

            // Segmented Pin Display Mode: Fokus Rapi vs Semua Pin
            const btnClean = document.getElementById('btnPinModeClean');
            const btnAll = document.getElementById('btnPinModeAll');

            if (btnClean && btnAll) {
                btnClean.addEventListener('click', () => {
                    pinMode = 'clean';
                    btnClean.className = 'px-2.5 py-1 rounded-md bg-[#005ea6] text-white font-bold text-[11px] transition shadow-xs';
                    btnAll.className = 'px-2.5 py-1 rounded-md bg-transparent text-slate-600 hover:text-slate-900 font-medium text-[11px] transition';
                    filterVillageMarkers();
                });

                btnAll.addEventListener('click', () => {
                    pinMode = 'all';
                    btnAll.className = 'px-2.5 py-1 rounded-md bg-[#005ea6] text-white font-bold text-[11px] transition shadow-xs';
                    btnClean.className = 'px-2.5 py-1 rounded-md bg-transparent text-slate-600 hover:text-slate-900 font-medium text-[11px] transition';
                    filterVillageMarkers();
                });
            }

            // Close hero profile card
            document.getElementById('btnCloseDesaProfile')?.addEventListener('click', () => {
                document.getElementById('cardProfilDesaSpesifik')?.classList.add('hidden');
                const placeholder = document.getElementById('cardProfilPlaceholder');
                if (placeholder) placeholder.classList.remove('hidden');
                selectedDesa = null;
            });

            // Reset buttons
            document.getElementById('btnResetFilter')?.addEventListener('click', () => {
                applySektorFilter('all');
                if (document.getElementById('inputSearchDesaList')) document.getElementById('inputSearchDesaList').value = '';
                setActiveKecamatan(null);
            });
            document.getElementById('btnResetMapView')?.addEventListener('click', () => setActiveKecamatan(null));
            document.getElementById('btnMapResetToAll')?.addEventListener('click', () => setActiveKecamatan(null));

            // Search input village
            document.getElementById('inputSearchDesaList')?.addEventListener('input', (e) => {
                renderVillageCards(selectedKecamatan, e.target.value);
            });

            // Fullscreen map
            document.getElementById('btnFullscreenMap')?.addEventListener('click', () => {
                const el = document.getElementById('mapWrapper');
                if (!document.fullscreenElement) {
                    el?.requestFullscreen().catch(err => console.log(err));
                } else {
                    document.exitFullscreen();
                }
            });

            // Toggle legend
            const btnLegend = document.getElementById('btnToggleLegend');
            const legendContainer = document.getElementById('legendItemsContainer');
            const chevron = document.getElementById('iconLegendChevron');
            btnLegend?.addEventListener('click', () => {
                legendContainer?.classList.toggle('hidden');
                chevron?.classList.toggle('rotate-180');
            });

            // Download GeoJSON
            document.getElementById('btnDownloadGeoJSON')?.addEventListener('click', () => {
                if (window.KOLAKA_UTARA_GEOJSON) {
                    const blob = new Blob([JSON.stringify(window.KOLAKA_UTARA_GEOJSON, null, 2)], { type: 'application/json' });
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'podes_kolaka_utara_2024_2025.geojson';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                    document.body.removeChild(a);
                }
            });

            // Modal Handlers
            const modal = document.getElementById('modal15Kecamatan');
            const openModal = () => {
                modal.classList.remove('hidden');
                renderModalTable();
            };
            const closeModal = () => modal.classList.add('hidden');

            document.getElementById('btnOpenKecamatanModal').addEventListener('click', openModal);
            document.getElementById('btnCloseModalX').addEventListener('click', closeModal);
            document.getElementById('btnCloseModalBtn').addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });

            document.getElementById('inputSearchModal').addEventListener('input', (e) => {
                renderModalTable(e.target.value);
            });

            // Export CSV
            document.getElementById('btnExportCSVModal').addEventListener('click', () => {
                let csv = 'Kode,Nama Kecamatan,IPD,Status,Potensi Utama,Komoditas,Jumlah Desa\n';
                kecamatanPodesList.forEach(k => {
                    csv += `${k.kode},"${k.nama}",${k.ipd},"${k.status_ipd}","${k.potensi_utama}","${k.komoditas}",${k.desa_count}\n`;
                });
                const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'matriks_podes_kolaka_utara_2024_2025.csv';
                a.click();
            });

            // Custom events from popups
            document.addEventListener('podesSelectKec', (e) => {
                const kode = e.detail;
                const matched = kecamatanPodesList.find(k => k.kode === kode);
                if (matched) setActiveKecamatan(matched);
            });

            document.addEventListener('podesSelectDesa', (e) => {
                const { kecKode, desaNama } = e.detail;
                const targetKec = kecamatanPodesList.find(k => k.kode === kecKode);
                if (targetKec) {
                    const targetDesa = targetKec.desaList.find(d => d.nama === desaNama);
                    if (targetDesa) {
                        focusDesa(targetDesa, targetKec, true);
                    }
                }
            });
        }

        // Toast notification system
        function showToast(message) {
            const container = document.getElementById('toastContainer');
            if (!container) return;
            const toast = document.createElement('div');
            toast.className = 'bg-slate-900/95 backdrop-blur text-white text-xs px-4 py-3 rounded-xl shadow-2xl border border-blue-400/30 flex items-center gap-2.5 animate-fadeIn pointer-events-auto max-w-sm';
            toast.innerHTML = `
                <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>${message}</span>
            `;
            container.appendChild(toast);
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.4s ease';
                setTimeout(() => toast.remove(), 450);
            }, 3500);
        }
        window.showToast = showToast;


        // =========================================================================
        // PORTAL ADMINISTRASI & DATA ENGINE: PODES KABUPATEN KOLAKA UTARA
        // =========================================================================
        window.isMapCoordPickerActive = false;
        let tempCoordPickerMarker = null;

        // Synchronize all views and re-render across Dashboard & Map
        function syncAllPodesViews(focusDesaData = null, focusKecData = null) {
            persistPodesData();
            buildAllVillageMarkers();
            filterVillageMarkers();
            updateDesaDropdown(selectedKecamatan);
            renderVillageCards(selectedKecamatan, document.getElementById('inputSearchDesaList').value);
            renderAdminMasterTable();
            updateStatsSummaryCards();
            initDesaCharts();
            init3DTiltEffects();

            if (focusDesaData && focusKecData) {
                focusDesa(focusDesaData, focusKecData, true);
            }
        }

        // Recalculate top statistics summary
        function updateStatsSummaryCards() {
            let totalDesa = 0;
            let totalMandiri = 0;
            let totalMaju = 0;
            let totalBerkembang = 0;
            let totalKakao = 0;
            let totalPesisir = 0;
            let sumIPD = 0;

            kecamatanPodesList.forEach(k => {
                totalDesa += k.desaList.length;
                k.desaList.forEach(d => {
                    sumIPD += (d.ipd || 75);
                    if (d.status === 'Mandiri') totalMandiri++;
                    else if (d.status === 'Maju') totalMaju++;
                    else totalBerkembang++;

                    if (d.sektor === 'perkebunan' || (d.komoditas || '').toLowerCase().includes('kakao')) totalKakao++;
                    if (d.sektor === 'perikanan' || (d.topografi || '').toLowerCase().includes('pesisir')) totalPesisir++;
                });
            });

            // Update badge on sidebar
            const totalBadge = document.getElementById('totalDesaCountBadge');
            if (totalBadge) totalBadge.textContent = `${totalDesa} Desa Terdata`;

            // Update admin stat boxes
            const boxTotal = document.getElementById('statBoxTotalDesa');
            if (boxTotal) boxTotal.textContent = `${totalDesa} Desa`;

            const boxIPD = document.getElementById('statBoxAvgIPD');
            if (boxIPD && totalDesa > 0) {
                boxIPD.textContent = (sumIPD / totalDesa).toFixed(1);
            }
        }

        // Start interactive map coordinate picking mode
        function startCoordinatePicker() {
            window.isMapCoordPickerActive = true;
            const modalAdmin = document.getElementById('modalAdminPortal');
            if (modalAdmin) modalAdmin.classList.add('hidden');

            const banner = document.getElementById('bannerCoordPickerActive');
            if (banner) banner.classList.remove('hidden');

            const mapEl = document.getElementById('map');
            if (mapEl) mapEl.style.cursor = 'crosshair';

            document.getElementById('sectionPeta').scrollIntoView({ behavior: 'smooth' });
            showToast('Mode petik titik aktif! Silakan klik lokasi desa pada peta Kolaka Utara.');
        }

        // Stop coordinate picker mode
        function stopCoordinatePicker() {
            window.isMapCoordPickerActive = false;
            const banner = document.getElementById('bannerCoordPickerActive');
            if (banner) banner.classList.add('hidden');

            const mapEl = document.getElementById('map');
            if (mapEl) mapEl.style.cursor = '';
        }

        // Handle coordinate selected from map click
        window.handleMapCoordSelected = function(lat, lng) {
            stopCoordinatePicker();

            if (tempCoordPickerMarker && map) {
                map.removeLayer(tempCoordPickerMarker);
            }

            tempCoordPickerMarker = L.circleMarker([lat, lng], {
                radius: 10,
                fillColor: '#ea580c',
                color: '#ffffff',
                weight: 3,
                opacity: 1,
                fillOpacity: 0.95
            }).addTo(map);

            tempCoordPickerMarker.bindPopup(`
                <div class="text-xs p-1 font-sans">
                    <b class="text-slate-900 block">Titik Spasial Terpilih</b>
                    <span class="text-slate-600 font-mono">Lat: ${lat}</span><br>
                    <span class="text-slate-600 font-mono">Lng: ${lng}</span>
                </div>
            `).openPopup();

            // Populate form fields
            const latInput = document.getElementById('formInputLat');
            const lngInput = document.getElementById('formInputLng');
            if (latInput) latInput.value = lat;
            if (lngInput) lngInput.value = lng;

            // Re-open Admin modal in Form tab
            openAdminModalTab('form');
            const modalAdmin = document.getElementById('modalAdminPortal');
            if (modalAdmin) modalAdmin.classList.remove('hidden');

            showToast(`Titik koordinat [${lat}, ${lng}] berhasil disalin ke formulir!`);
        };

        // Open specific Admin Modal tab
        function openAdminModalTab(tabName) {
            const tabTable = document.getElementById('tabContentAdminTable');
            const tabForm = document.getElementById('tabContentAdminForm');
            const tabStats = document.getElementById('tabContentAdminStats');

            const btnTable = document.getElementById('tabBtnAdminTable');
            const btnForm = document.getElementById('tabBtnAdminForm');
            const btnStats = document.getElementById('tabBtnAdminStats');

            const activeClass = 'bg-[#005ea6] text-white shadow-xs font-bold';
            const inactiveClass = 'bg-white text-slate-700 hover:text-[#005ea6] border border-slate-300 shadow-2xs font-semibold';

            [tabTable, tabForm, tabStats].forEach(el => el.classList.add('hidden'));
            [btnTable, btnForm, btnStats].forEach(btn => {
                btn.className = 'tab-btn-admin px-3.5 py-1.5 rounded-lg transition flex items-center gap-1.5 ' + inactiveClass;
            });

            if (tabName === 'form') {
                tabForm.classList.remove('hidden');
                btnForm.className = 'tab-btn-admin px-3.5 py-1.5 rounded-lg transition flex items-center gap-1.5 ' + activeClass;
            } else if (tabName === 'stats') {
                tabStats.classList.remove('hidden');
                btnStats.className = 'tab-btn-admin px-3.5 py-1.5 rounded-lg transition flex items-center gap-1.5 ' + activeClass;
                updateStatsSummaryCards();
            } else {
                tabTable.classList.remove('hidden');
                btnTable.className = 'tab-btn-admin px-3.5 py-1.5 rounded-lg transition flex items-center gap-1.5 ' + activeClass;
                renderAdminMasterTable();
            }
        }

        // Render Master Data CRUD Table in Admin Portal
        function renderAdminMasterTable() {
            const tbody = document.getElementById('adminMasterTableBody');
            if (!tbody) return;

            const q = (document.getElementById('inputAdminSearchTable')?.value || '').toLowerCase().trim();
            const filterKec = document.getElementById('selectAdminFilterKec')?.value || '';
            const filterStatus = document.getElementById('selectAdminFilterStatus')?.value || '';
            const filterSektor = document.getElementById('selectAdminFilterSektor')?.value || '';

            let rows = [];
            kecamatanPodesList.forEach(k => {
                if (filterKec && k.kode !== filterKec) return;
                k.desaList.forEach(d => {
                    if (filterStatus && d.status !== filterStatus) return;
                    if (filterSektor && (d.sektor || '').toLowerCase() !== filterSektor.toLowerCase()) return;
                    if (q) {
                        const matchText = (d.nama + ' ' + k.nama + ' ' + (d.potensi || '') + ' ' + (d.komoditas || '')).toLowerCase();
                        if (!matchText.includes(q)) return;
                    }
                    rows.push({ desa: d, kec: k });
                });
            });

            const countInfo = document.getElementById('adminTableCountInfo');
            if (countInfo) {
                countInfo.textContent = `Menampilkan ${rows.length} dari total data desa terdaftar`;
            }

            if (rows.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="8" class="p-8 text-center text-slate-400">
                            Tidak ada data desa yang cocok dengan filter pencarian.
                        </td>
                    </tr>
                `;
                return;
            }

            tbody.innerHTML = rows.map((item, idx) => {
                const d = item.desa;
                const k = item.kec;
                const statusBadge = d.status === 'Mandiri' ? 'bg-emerald-100 text-emerald-800' :
                                    (d.status === 'Maju' ? 'bg-sky-100 text-sky-800' : 'bg-amber-100 text-amber-800');

                return `
                    <tr class="hover:bg-blue-50/50 transition border-b border-slate-100">
                        <td class="p-3 text-center text-slate-400 font-mono text-[11px]">${idx + 1}</td>
                        <td class="p-3 font-bold text-slate-900">
                            <div class="flex items-center gap-1.5 flex-wrap">
                                <span>${d.nama}</span>
                                <span class="text-[9px] px-1.5 py-0.2 rounded-full font-bold ${statusBadge}">${d.status}</span>
                                ${d.isCustom ? '<span class="text-[9px] bg-amber-400 text-slate-950 font-black px-1.5 py-0.2 rounded shadow-2xs">Kustom</span>' : ''}
                            </div>
                            <div class="text-[10px] text-slate-400 font-normal mt-0.5">${d.topografi || 'Dataran'} • ${d.luas || '-'}</div>
                        </td>
                        <td class="p-3 font-medium text-slate-700">Kec. ${k.nama}</td>
                        <td class="p-3">
                            <span class="font-bold text-slate-800 uppercase text-[10px] block">${d.sektor || 'UMKM'}</span>
                            <span class="text-[11px] text-slate-500 truncate max-w-[180px] block">${d.komoditas || '-'}</span>
                        </td>
                        <td class="p-3 text-center">
                            <span class="font-mono font-bold text-slate-800">${d.ipd || 75}</span>
                            <div class="w-12 bg-slate-200 h-1.5 rounded-full mx-auto mt-1 overflow-hidden">
                                <div class="bg-[#005ea6] h-full" style="width: ${Math.min(100, d.ipd || 75)}%"></div>
                            </div>
                        </td>
                        <td class="p-3 font-mono text-[10px] text-slate-600">
                            ${d.lat ? `${d.lat}, ${d.lng}` : '<span class="text-rose-400">Belum diset</span>'}
                        </td>
                        <td class="p-3 text-right tabular-nums">
                            <b class="text-slate-800">${(d.penduduk || 0).toLocaleString('id-ID')}</b> <span class="text-[10px] text-slate-400">jiwa</span><br>
                            <span class="text-[10px] text-slate-500">${d.kk || 0} KK</span>
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <button class="p-1.5 rounded-md hover:bg-blue-100 text-[#005ea6] transition" title="Lihat dan Sorot di Peta" onclick="window.adminFocusDesa('${k.kode}', '${d.nama}')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button class="p-1.5 rounded-md hover:bg-amber-100 text-amber-700 transition" title="Edit Data Desa" onclick="window.adminTriggerEditDesa('${k.kode}', '${d.nama}')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </button>
                                <button class="p-1.5 rounded-md hover:bg-rose-100 text-rose-600 transition" title="Hapus Data Desa" onclick="window.adminTriggerDeleteDesa('${k.kode}', '${d.nama}')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        // Global Action: Focus Desa from Admin Table to Map
        window.adminFocusDesa = function(kecKode, desaNama) {
            const targetKec = kecamatanPodesList.find(k => k.kode === kecKode);
            if (!targetKec) return;
            const targetDesa = targetKec.desaList.find(d => d.nama === desaNama);
            if (!targetDesa) return;

            document.getElementById('modalAdminPortal').classList.add('hidden');
            focusDesa(targetDesa, targetKec, true);
            document.getElementById('sectionPeta').scrollIntoView({ behavior: 'smooth' });
        };

        // Global Action: Load Desa into Form for Editing
        window.adminTriggerEditDesa = function(kecKode, desaNama) {
            const targetKec = kecamatanPodesList.find(k => k.kode === kecKode);
            if (!targetKec) return;
            const targetDesa = targetKec.desaList.find(d => d.nama === desaNama);
            if (!targetDesa) return;

            // Fill Form fields
            document.getElementById('formEditId').value = 'edit_' + Date.now();
            document.getElementById('formOriginalKecKode').value = kecKode;
            document.getElementById('formOriginalDesaNama').value = desaNama;

            document.getElementById('formInputKecamatan').value = kecKode;
            document.getElementById('formInputNamaDesa').value = targetDesa.nama;
            document.getElementById('formInputStatusIPD').value = targetDesa.status || 'Maju';
            document.getElementById('formInputTopografi').value = targetDesa.topografi || 'Pesisir Pantai';
            document.getElementById('formInputLat').value = targetDesa.lat || '';
            document.getElementById('formInputLng').value = targetDesa.lng || '';
            document.getElementById('formInputPenduduk').value = targetDesa.penduduk || '';
            document.getElementById('formInputKK').value = targetDesa.kk || '';
            document.getElementById('formInputLuas').value = targetDesa.luas || '';
            document.getElementById('formInputIPD').value = targetDesa.ipd || 75;
            document.getElementById('labelFormIPDScore').textContent = (targetDesa.ipd || 75).toFixed(1);
            document.getElementById('formInputSektor').value = (targetDesa.sektor || 'perkebunan').toLowerCase();
            document.getElementById('formInputKomoditas').value = targetDesa.komoditas || '';
            document.getElementById('formInputPotensiDesc').value = targetDesa.potensi || '';
            document.getElementById('formInputBumdes').value = targetDesa.bumdes || '';
            document.getElementById('formInputFaskes').value = targetDesa.faskes || '';
            document.getElementById('formInputSekolah').value = targetDesa.sekolah || '';
            document.getElementById('formInputSinyal').value = targetDesa.sinyal || '';

            // Update UI State in Form Tab
            document.getElementById('adminFormModeTitle').textContent = `Mengubah Data: Desa ${targetDesa.nama} (Kec. ${targetKec.nama})`;
            document.getElementById('labelBtnSaveDesa').textContent = 'Perbarui Data & Simpan';
            document.getElementById('labelTabFormTitle').textContent = 'Edit Data Desa';
            document.getElementById('btnCancelEditMode').classList.remove('hidden');

            openAdminModalTab('form');
            document.getElementById('modalAdminPortal').classList.remove('hidden');
        };

        // Global Action: Delete Desa
        window.adminTriggerDeleteDesa = function(kecKode, desaNama) {
            const targetKec = kecamatanPodesList.find(k => k.kode === kecKode);
            if (!targetKec) return;

            if (!confirm(`Apakah Anda yakin ingin menghapus data Desa "${desaNama}" dari Kecamatan ${targetKec.nama}?`)) {
                return;
            }

            const initialLen = targetKec.desaList.length;
            targetKec.desaList = targetKec.desaList.filter(d => d.nama !== desaNama);
            targetKec.desa_count = targetKec.desaList.length;

            syncAllPodesViews();
            showToast(`Desa "${desaNama}" berhasil dihapus dari sistem!`);
        };

        // Reset Admin Form to Add New Mode
        function resetAdminForm() {
            document.getElementById('formEditId').value = '';
            document.getElementById('formOriginalKecKode').value = '';
            document.getElementById('formOriginalDesaNama').value = '';
            document.getElementById('formAdminPodes').reset();

            document.getElementById('formInputIPD').value = 75;
            document.getElementById('labelFormIPDScore').textContent = '75.0';
            document.getElementById('adminFormModeTitle').textContent = 'Formulir Tambah Desa Baru';
            document.getElementById('labelBtnSaveDesa').textContent = 'Simpan & Sinkronkan ke Peta';
            document.getElementById('labelTabFormTitle').textContent = 'Input Desa Baru';
            document.getElementById('btnCancelEditMode').classList.add('hidden');
        }

        // Export Entire Database as JSON File
        function exportDatabaseJSON() {
            const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(kecamatanPodesList, null, 2));
            const downloadAnchor = document.createElement('a');
            downloadAnchor.setAttribute("href", dataStr);
            downloadAnchor.setAttribute("download", `BPS_Kolut_Podes_Database_${new Date().toISOString().slice(0,10)}.json`);
            document.body.appendChild(downloadAnchor);
            downloadAnchor.click();
            downloadAnchor.remove();
            showToast('Cadangan database JSON berhasil diunduh!');
        }

        // Export All Village Records as CSV Spreadsheet
        function exportDatabaseCSV() {
            let csv = 'Kode Kecamatan,Nama Kecamatan,Nama Desa,Status IPD,Sektor Utama,Skor IPD,Latitude,Longitude,Penduduk (Jiwa),Kepala Keluarga (KK),Luas Wilayah,Komoditas Unggulan,Topografi,BUMDes,Fasilitas Kesehatan,Pendidikan,Infrastruktur Dasar,Tipe Data\n';

            kecamatanPodesList.forEach(k => {
                k.desaList.forEach(d => {
                    const row = [
                        k.kode,
                        `"${k.nama}"`,
                        `"${d.nama}"`,
                        `"${d.status}"`,
                        `"${d.sektor || ''}"`,
                        d.ipd || 75,
                        d.lat || '',
                        d.lng || '',
                        d.penduduk || 0,
                        d.kk || 0,
                        `"${d.luas || ''}"`,
                        `"${(d.komoditas || '').replace(/"/g, '""')}"`,
                        `"${d.topografi || ''}"`,
                        `"${(d.bumdes || '').replace(/"/g, '""')}"`,
                        `"${(d.faskes || '').replace(/"/g, '""')}"`,
                        `"${(d.sekolah || '').replace(/"/g, '""')}"`,
                        `"${(d.sinyal || '').replace(/"/g, '""')}"`,
                        d.isCustom ? 'Kustom' : 'Baseline BPS'
                    ];
                    csv += row.join(',') + '\n';
                });
            });

            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `BPS_Kolut_Data_Desa_${new Date().toISOString().slice(0,10)}.csv`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            showToast('Spreadsheet CSV data desa berhasil diunduh!');
        }

        // Reset Database to Default Baseline BPS
        function resetDatabaseToDefault() {
            if (!confirm('PERINGATAN: Apakah Anda yakin ingin mereset seluruh data kembali ke Baseline Master BPS? Semua data kustom yang baru diinput akan dikembalikan ke data awal.')) {
                return;
            }

            localStorage.removeItem(PODES_STORAGE_KEY);
            kecamatanPodesList = JSON.parse(JSON.stringify(baselineKecamatanPodesList));
            syncAllPodesViews();
            showToast('Database berhasil direset ke Baseline Resmi BPS!');
        }

        // Initialize All Admin Portal Events & UI Bindings
        function initAdminPortal() {
            // Populate Kecamatan Selects in Admin Modal
            const filterKecSelect = document.getElementById('selectAdminFilterKec');
            const formKecSelect = document.getElementById('formInputKecamatan');

            if (filterKecSelect) {
                filterKecSelect.innerHTML = '<option value="">Semua Kecamatan (15 Kec)</option>' +
                    kecamatanPodesList.map(k => `<option value="${k.kode}">${k.nama}</option>`).join('');
                filterKecSelect.addEventListener('change', renderAdminMasterTable);
            }

            if (formKecSelect) {
                formKecSelect.innerHTML = '<option value="">Pilih Kecamatan...</option>' +
                    kecamatanPodesList.map(k => `<option value="${k.kode}">Kec. ${k.nama}</option>`).join('');
            }

            // Tab Buttons
            document.getElementById('tabBtnAdminTable')?.addEventListener('click', () => openAdminModalTab('table'));
            document.getElementById('tabBtnAdminForm')?.addEventListener('click', () => openAdminModalTab('form'));
            document.getElementById('tabBtnAdminStats')?.addEventListener('click', () => openAdminModalTab('stats'));

            // Table Filters
            document.getElementById('inputAdminSearchTable')?.addEventListener('input', renderAdminMasterTable);
            document.getElementById('selectAdminFilterStatus')?.addEventListener('change', renderAdminMasterTable);
            document.getElementById('selectAdminFilterSektor')?.addEventListener('change', renderAdminMasterTable);

            // Add New Button from Table
            document.getElementById('btnAdminAddNewFromTable')?.addEventListener('click', () => {
                resetAdminForm();
                openAdminModalTab('form');
            });

            // Cancel Edit Mode
            document.getElementById('btnCancelEditMode')?.addEventListener('click', resetAdminForm);

            // Back to Table Button
            document.getElementById('btnAdminBackToTable')?.addEventListener('click', () => openAdminModalTab('table'));

            // Form Reset
            document.getElementById('btnAdminResetForm')?.addEventListener('click', resetAdminForm);

            // IPD Range Slider Binding
            const ipdSlider = document.getElementById('formInputIPD');
            const ipdLabel = document.getElementById('labelFormIPDScore');
            const statusSelect = document.getElementById('formInputStatusIPD');
            if (ipdSlider && ipdLabel) {
                ipdSlider.addEventListener('input', (e) => {
                    const val = parseFloat(e.target.value);
                    ipdLabel.textContent = val.toFixed(1);

                    // Auto-adjust status classification recommendation
                    if (statusSelect) {
                        if (val >= 75) statusSelect.value = 'Mandiri';
                        else if (val >= 60) statusSelect.value = 'Maju';
                        else statusSelect.value = 'Berkembang';
                    }
                });
            }

            // Button Use Kecamatan Center Coords
            document.getElementById('btnAdminUseKecCenter')?.addEventListener('click', () => {
                const kecKode = document.getElementById('formInputKecamatan').value;
                if (!kecKode) {
                    showToast('Harap pilih kecamatan terlebih dahulu!', 'warning');
                    return;
                }
                const matched = kecamatanPodesList.find(k => k.kode === kecKode);
                if (matched && matched.lat && matched.lng) {
                    document.getElementById('formInputLat').value = matched.lat;
                    document.getElementById('formInputLng').value = matched.lng;
                    showToast(`Koordinat tengah Kec. ${matched.nama} (${matched.lat}, ${matched.lng}) disalin!`);
                }
            });

            // Button Pick from Map in Form
            document.getElementById('btnAdminPickFromMap')?.addEventListener('click', startCoordinatePicker);

            // Map Toolbar & Banner Action Buttons
            document.getElementById('btnPickCoordsOnMap')?.addEventListener('click', startCoordinatePicker);
            document.getElementById('btnCancelCoordPicker')?.addEventListener('click', stopCoordinatePicker);

            // Top Header & Sidebar Action Buttons
            document.getElementById('btnOpenAdminPortal')?.addEventListener('click', () => {
                const modal = document.getElementById('modalAdminPortal');
                if (modal) {
                    modal.classList.remove('hidden');
                    openAdminModalTab('table');
                }
            });

            document.getElementById('btnQuickAddDesa')?.addEventListener('click', () => {
                resetAdminForm();
                const modal = document.getElementById('modalAdminPortal');
                if (modal) {
                    modal.classList.remove('hidden');
                    openAdminModalTab('form');
                }
            });

            document.getElementById('btnEditCurrentDesa')?.addEventListener('click', () => {
                if (selectedDesa && selectedKecamatan) {
                    adminTriggerEditDesa(selectedKecamatan.kode, selectedDesa.nama);
                } else {
                    showToast('Silakan pilih salah satu desa terlebih dahulu.', 'info');
                }
            });

            // Modal Close Buttons
            document.getElementById('btnCloseAdminModalX')?.addEventListener('click', () => {
                document.getElementById('modalAdminPortal').classList.add('hidden');
            });
            document.getElementById('btnCloseAdminModalBtn')?.addEventListener('click', () => {
                document.getElementById('modalAdminPortal').classList.add('hidden');
            });

            // Export & Reset Handlers
            document.getElementById('btnAdminExportJSON')?.addEventListener('click', exportDatabaseJSON);
            document.getElementById('btnToolExportJSON')?.addEventListener('click', exportDatabaseJSON);
            document.getElementById('btnAdminExportCSV')?.addEventListener('click', exportDatabaseCSV);
            document.getElementById('btnToolExportCSV')?.addEventListener('click', exportDatabaseCSV);
            document.getElementById('btnToolResetDefault')?.addEventListener('click', resetDatabaseToDefault);

            // Form Submit / Save Desa Handler
            const form = document.getElementById('formAdminPodes');
            if (form) {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();

                    const kecKode = document.getElementById('formInputKecamatan').value;
                    const nama = document.getElementById('formInputNamaDesa').value.trim();
                    const status = document.getElementById('formInputStatusIPD').value;
                    const topografi = document.getElementById('formInputTopografi').value;
                    const lat = parseFloat(document.getElementById('formInputLat').value);
                    const lng = parseFloat(document.getElementById('formInputLng').value);
                    const penduduk = parseInt(document.getElementById('formInputPenduduk').value) || 0;
                    const kk = parseInt(document.getElementById('formInputKK').value) || 0;
                    const luas = document.getElementById('formInputLuas').value.trim() || '12.0 km²';
                    const ipd = parseFloat(document.getElementById('formInputIPD').value) || 75.0;
                    const sektor = document.getElementById('formInputSektor').value;
                    const komoditas = document.getElementById('formInputKomoditas').value.trim() || 'Kakao, Cengkeh';
                    const potensi = document.getElementById('formInputPotensiDesc').value.trim() || 'Sentra potensi desa unggulan Kabupaten Kolaka Utara';
                    const bumdes = document.getElementById('formInputBumdes').value.trim() || 'BUMDes Aktif';
                    const faskes = document.getElementById('formInputFaskes').value.trim() || 'Poskesdes';
                    const sekolah = document.getElementById('formInputSekolah').value.trim() || 'SD Negeri';
                    const sinyal = document.getElementById('formInputSinyal').value.trim() || 'PLN 24 Jam, 4G Kuat';

                    const editId = document.getElementById('formEditId').value;
                    const origKecKode = document.getElementById('formOriginalKecKode').value;
                    const origDesaNama = document.getElementById('formOriginalDesaNama').value;

                    if (!kecKode || !nama || isNaN(lat) || isNaN(lng)) {
                        showToast('Harap lengkapi Kecamatan, Nama Desa, Latitude, dan Longitude!');
                        return;
                    }

                    const targetKec = kecamatanPodesList.find(k => k.kode === kecKode);
                    if (!targetKec) {
                        showToast('Kecamatan tidak ditemukan!');
                        return;
                    }

                    const desaObject = {
                        nama: nama,
                        status: status,
                        sektor: sektor,
                        lat: lat,
                        lng: lng,
                        topografi: topografi,
                        penduduk: penduduk,
                        kk: kk,
                        luas: luas,
                        ipd: ipd,
                        potensi: potensi,
                        komoditas: komoditas,
                        bumdes: bumdes,
                        faskes: faskes,
                        sekolah: sekolah,
                        sinyal: sinyal,
                        isCustom: true
                    };

                    if (editId) {
                        // Editing existing
                        if (origKecKode !== kecKode) {
                            // Moved to another kecamatan
                            const origKec = kecamatanPodesList.find(k => k.kode === origKecKode);
                            if (origKec) {
                                origKec.desaList = origKec.desaList.filter(d => d.nama !== origDesaNama);
                                origKec.desa_count = origKec.desaList.length;
                            }
                            targetKec.desaList.unshift(desaObject);
                        } else {
                            // Update in place
                            const idx = targetKec.desaList.findIndex(d => d.nama === origDesaNama);
                            if (idx >= 0) {
                                targetKec.desaList[idx] = desaObject;
                            } else {
                                targetKec.desaList.unshift(desaObject);
                            }
                        }
                        targetKec.desa_count = targetKec.desaList.length;
                        showToast(`Data Desa "${nama}" berhasil diperbarui!`);
                    } else {
                        // Adding new desa
                        // Check if duplicate name in this kecamatan
                        const exists = targetKec.desaList.some(d => d.nama.toLowerCase() === nama.toLowerCase());
                        if (exists) {
                            showToast(`Desa "${nama}" sudah ada di Kecamatan ${targetKec.nama}! Gunakan fitur edit untuk memperbarui.`);
                            return;
                        }
                        targetKec.desaList.unshift(desaObject);
                        targetKec.desa_count = targetKec.desaList.length;
                        showToast(`Desa "${nama}" berhasil ditambahkan dan disematkan ke peta!`);
                    }

                    // Synchronize and close modal
                    syncAllPodesViews(desaObject, targetKec);
                    resetAdminForm();
                    document.getElementById('modalAdminPortal').classList.add('hidden');
                });
            }
        }

        // Global download publikasi function
        window.downloadPublikasi = function(filename) {
            const cleanTitle = filename.replace(/\.pdf$/i, '').replace(/_/g, ' ');
            const content = `=======================================================
REPUBLIK INDONESIA - BADAN PUSAT STATISTIK KABUPATEN KOLAKA UTARA
=======================================================
Judul Publikasi: ${cleanTitle}
Wilayah: Kabupaten Kolaka Utara (Kode BPS 7408)
Tahun Data: Potensi Desa (Podes) 2024–2025

RINGKASAN & METADATA RESMI:
Publikasi ini memuat informasi statistik sektoral mencakup:
- Profil Potensi Unggulan 15 Kecamatan dan 133 Desa/Kelurahan
- Sentra Komoditas Perkebunan Kakao, Cengkeh, dan Pertanian Pangan
- Potensi Perikanan Tangkap & Budidaya Tambak Pesisir Teluk Bone
- Objek Daya Tarik Wisata (ODTW) & Ekowisata Bahari Desa
- Capaian Akses Listrik PLN 24 Jam, Telekomunikasi 4G, dan Fasilitas Dasar
- Klasifikasi Indeks Perkembangan Desa (IPD): Mandiri, Maju, Berkembang

Repositori Naskah Lengkap PDF & Tabel Data Terbuka BPS:
https://kolutkab.bps.go.id/id/publication
=======================================================`;

            const blob = new Blob([content], { type: 'text/plain;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `Metadata_BPS_Kolut_${cleanTitle.replace(/\s+/g, '_')}.txt`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);

            showToast(`Metadata "${cleanTitle}" diunduh. Membuka portal repositori publikasi BPS...`);
            setTimeout(() => {
                window.open('https://kolutkab.bps.go.id/id/publication', '_blank');
            }, 1000);
        };

                // =======================================================
        // 3D TILT PHYSICS & DYNAMIC APP SHOWCASE ENGINE
        // =======================================================
        let currentSelectedAppId = 'sensus';

        const appShowcaseDatabase = {
            'sensus': {
                tag: 'Madani Sensus v2.4',
                url: 'madani.kolutkab.bps.go.id/sensus',
                laptopHeader: 'Dashboard Sensus Keluarga',
                laptopKk: '37.013 KK',
                laptopProgres: '100% Selesai',
                phoneApp: 'Madani Sensus',
                phoneTitle: 'Kuesioner Rumah Tangga',
                phoneSub: 'KK: H. Baso Rusli',
                phoneLoc: 'Desa Pitulua, Lasusua',
                chip1: 'Satu Data Desa',
                chip2: 'Cloud Sync BPS',
                title: 'Madani Sensus Mobile',
                sub: 'Aplikasi Pendataan Digital Keluarga • BPS Kolaka Utara',
                platform: 'Android & Web',
                user: 'Surveyor Warga Desa',
                sync: 'Auto-Sync BPS',
                desc: 'Aplikasi seluler sensus keluarga door-to-door dengan fitur kuesioner digital terstruktur untuk menghimpun demografi, kesehatan, pendidikan, dan kesejahteraan per KK secara presisi dan terverifikasi.',
                features: [
                    'Kuesioner digital terstruktur sesuai modul standar Podes & statistik keluarga BPS',
                    'Geotagging koordinat GPS presisi otomatis pada setiap rumah tangga warga',
                    'Dukungan mode offline di wilayah pelosok tanpa sinyal dengan auto-sync saat tersambung internet',
                    'Validasi logika instan untuk mencegah ketidaksesuaian data di lapangan'
                ]
            },
            'spasial': {
                tag: 'Madani Spasial v3.1',
                url: 'madani.kolutkab.bps.go.id/spasial',
                laptopHeader: 'Pemetaan Aset & Tata Guna Lahan',
                laptopKk: '64.280 Ha',
                laptopProgres: 'Batas 133 Desa',
                phoneApp: 'Madani Spasial',
                phoneTitle: 'Plotting Koordinat Aset',
                phoneSub: 'Kebun Kakao Rakyat & Dermaga',
                phoneLoc: 'Titik Koordinat: -3.518, 120.978',
                chip1: 'Akurasi Sub-Meter',
                chip2: 'Drone Orthophoto',
                title: 'Madani Spasial Mobile & GIS',
                sub: 'Teknologi Akuisisi Titik Geospasial Presisi Lapangan',
                platform: 'Android & QGIS Web',
                user: 'Surveyor Geospasial',
                sync: 'GeoJSON Engine',
                desc: 'Teknologi pemetaan partisipatif untuk pengumpulan titik koordinat GPS akurat bagi fasilitas umum, infrastruktur jalan desa, batas dusun/desa, dan tutupan perkebunan kakao.',
                features: [
                    'Akuisisi koordinat titik GPS dan poligon bidang tanah berakurasi sub-meter',
                    'Integrasi overlay citra satelit resolusi tinggi dan ortofoto udara drone',
                    'Fitur foto geospasial dengan watermark koordinat dan timestamp otomatis',
                    'Pencatatan batas administrasi dusun secara musyawarah tanpa sengketa'
                ]
            },
            'monev': {
                tag: 'Madani Monev v1.8',
                url: 'madani.kolutkab.bps.go.id/monev',
                laptopHeader: 'Monitoring Progres & Verifikasi',
                laptopKk: '15 Kecamatan',
                laptopProgres: '99.4% Terverifikasi',
                phoneApp: 'Madani Monev',
                phoneTitle: 'Approval Supervisor',
                phoneSub: 'Validasi Data Lapangan',
                phoneLoc: 'Kecamatan Lasusua & Pakue',
                chip1: 'Real-Time Alert',
                chip2: 'Multi-Level Approval',
                title: 'Madani Monev Dashboard',
                sub: 'Sistem Pemantauan Capaian & Pengendalian Kualitas Data',
                platform: 'Web Dashboard & Mobile',
                user: 'Supervisor & Admin',
                sync: 'Live Socket Sync',
                desc: 'Sistem pemantauan real-time untuk supervisor dan administrator dalam memverifikasi progres pencapaian data lapangan per desa dan monitoring kinerja pembangunan daerah secara berjenjang.',
                features: [
                    'Dashboard KPI real-time dengan grafik capaian per desa dan kecamatan',
                    'Alur kerja verifikasi berjenjang: Surveyor -> Supervisor -> BPS Kabupaten',
                    'Audit trail histori perubahan data untuk menjamin integritas statistik',
                    'Notifikasi instan jika terjadi anomali atau data belum lengkap'
                ]
            },
            'webgis': {
                tag: 'Madani WebGIS v4.0',
                url: 'madani.kolutkab.bps.go.id/webgis',
                laptopHeader: 'Portal Analitik Spasial Kolaka Utara',
                laptopKk: '133 Desa Terpetakan',
                laptopProgres: 'Open Data 100%',
                phoneApp: 'Madani WebGIS',
                phoneTitle: 'Layer Tematik Wilayah',
                phoneSub: 'Sentra Kakao & Pesisir Nelayan',
                phoneLoc: 'Kolaka Utara, Sulawesi Tenggara',
                chip1: 'Thematic Maps',
                chip2: 'Podes 2024–2025',
                title: 'Madani WebGIS Portal',
                sub: 'Platform Visualisasi Spasial & Pengambil Kebijakan Daerah',
                platform: 'WebGIS Responsive',
                user: 'Pemda, BPS & Publik',
                sync: 'Leaflet GIS Engine',
                desc: 'Platform visualisasi spasial berbasis web untuk pemangku kebijakan, menghadirkan peta interaktif desa, poligon administrasi, dan metrik analitik potensi daerah.',
                features: [
                    'Multi-layer basemap: Peta Abu-abu BPS, Citra Satelit Ortofoto, dan OSM',
                    'Choropleth interaktif dengan kalkulasi otomatis indeks kemandirian desa (IPD)',
                    'Ekspor data spasial ke format GeoJSON, Shapefile, dan CSV',
                    'Pencarian desa instan dengan animasi flyTo koordinat akurat'
                ]
            }
        };

        // Switch Active App Showcase
        window.selectAppShowcase = function(appId) {
            currentSelectedAppId = appId;
            const data = appShowcaseDatabase[appId];
            if (!data) return;

            // Highlight Active Card on the left
            document.querySelectorAll('.app-selector-card').forEach(card => {
                card.classList.remove('border-emerald-500', 'ring-4', 'ring-emerald-500/10', 'shadow-lg');
                card.classList.add('border-slate-200/90', 'shadow-sm');
            });

            const activeCard = document.getElementById(`cardApp_${appId}`);
            if (activeCard) {
                activeCard.classList.remove('border-slate-200/90', 'shadow-sm');
                activeCard.classList.add('border-emerald-500', 'ring-4', 'ring-emerald-500/10', 'shadow-lg');
            }

            // Animate Right Showcase Card Content with Smooth Transition
            const showcaseCard = document.getElementById('showcaseCard3D');
            if (showcaseCard) {
                showcaseCard.classList.add('scale-[0.99]');
                setTimeout(() => showcaseCard.classList.remove('scale-[0.99]'), 150);
            }

            document.getElementById('showcaseAppTag').textContent = data.tag;
            document.getElementById('laptopUrlText').textContent = data.url;
            document.getElementById('laptopScreenHeader').textContent = data.laptopHeader;
            document.getElementById('laptopScreenKk').textContent = data.laptopKk;
            document.getElementById('laptopScreenProgres').textContent = data.laptopProgres;

            document.getElementById('phoneAppName').textContent = data.phoneApp;
            document.getElementById('phoneCardTitle').textContent = data.phoneTitle;
            document.getElementById('phoneCardSub').textContent = data.phoneSub;
            document.getElementById('phoneCardLoc').textContent = data.phoneLoc;

            document.getElementById('floatingChip1').textContent = data.chip1;
            document.getElementById('floatingChip2').textContent = data.chip2;
        };

        // Open Modal App Detail
        // App modal functions removed

        // Initialize 3D Tilt Physics on Cards
        function init3DTiltEffects() {
            const tiltCards = document.querySelectorAll('.card-tilt-3d');
            tiltCards.forEach(card => {
                let bounds;

                function updateBounds() {
                    bounds = card.getBoundingClientRect();
                }

                card.addEventListener('mouseenter', () => {
                    updateBounds();
                    card.style.transition = 'transform 0.15s ease-out, box-shadow 0.3s ease';
                });

                card.addEventListener('mousemove', (e) => {
                    if (!bounds) updateBounds();
                    const mouseX = e.clientX - bounds.left;
                    const mouseY = e.clientY - bounds.top;
                    const xPct = (mouseX / bounds.width) - 0.5; // -0.5 to 0.5
                    const yPct = (mouseY / bounds.height) - 0.5; // -0.5 to 0.5

                    const maxTilt = 10; // degrees
                    const tiltX = -(yPct * maxTilt);
                    const tiltY = (xPct * maxTilt);

                    card.style.transform = `perspective(1000px) rotateX(${tiltX.toFixed(2)}deg) rotateY(${tiltY.toFixed(2)}deg) scale3d(1.02, 1.02, 1.02)`;

                    // Dynamic Parallax on inner elements
                    const parallaxItems = card.querySelectorAll('[data-tilt-depth]');
                    parallaxItems.forEach(item => {
                        const depth = parseFloat(item.getAttribute('data-tilt-depth')) || 20;
                        const moveX = (xPct * depth).toFixed(1);
                        const moveY = (yPct * depth).toFixed(1);
                        item.style.transform = `translate3d(${moveX}px, ${moveY}px, ${depth}px)`;
                    });

                    // Specular Glare Movement
                    const glare = card.querySelector('.tilt-glare');
                    if (glare) {
                        const glareX = ((mouseX / bounds.width) * 100).toFixed(1);
                        const glareY = ((mouseY / bounds.height) * 100).toFixed(1);
                        glare.style.background = `radial-gradient(circle at ${glareX}% ${glareY}%, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 65%)`;
                        glare.style.opacity = '1';
                    }
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transition = 'transform 0.5s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.5s ease';
                    card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';

                    const parallaxItems = card.querySelectorAll('[data-tilt-depth]');
                    parallaxItems.forEach(item => {
                        item.style.transition = 'transform 0.5s cubic-bezier(0.23, 1, 0.32, 1)';
                        item.style.transform = 'translate3d(0px, 0px, 0px)';
                    });

                    const glare = card.querySelector('.tilt-glare');
                    if (glare) {
                        glare.style.opacity = '0';
                    }
                });
            });
        }


        // =======================================================
        // VISUALISASI DATA: CHART.JS & DIAGRAM PODES 2024-2025
        // =======================================================
        let chartSektorKecamatan = null;
        let chartStatusKemandirian = null;
        let chartRadarDesa = null;
        let chartTopografi = null;
        let currentBarTab = 'sektor';

        // Official BPS Publications Dataset
        const publikasiBpsDatabase = {
            'Kolaka_Utara_Dalam_Angka_2025.pdf': {
                title: 'Kabupaten Kolaka Utara Dalam Angka 2025',
                sub: 'Badan Pusat Statistik Kabupaten Kolaka Utara',
                katalog: '1102001.7408',
                nomor: '74080.2501',
                tanggal: '28 Februari 2025',
                halaman: '482 Halaman',
                abstrak: 'Publikasi resmi tahunan BPS Kabupaten Kolaka Utara yang menyajikan gambaran komprehensif mengenai kondisi geografi, iklim, pemerintahan, perkembangan sosial-demografi kependudukan, serta perekonomian Kabupaten Kolaka Utara tahun 2024-2025. Dilengkapi data primer statistik potensi desa, agregat produksi perkebunan kakao, dan capaian indikator makro pembangunan daerah.',
                bab: [
                    'Bab 1: Geografi, Wilayah Administrasi 15 Kecamatan dan Iklim',
                    'Bab 2: Pemerintahan Desa, Keuangan Desa dan Kelembagaan BUMDes',
                    'Bab 3: Kependudukan, Ketenagakerjaan dan Kesejahteraan Sosial',
                    'Bab 4: Sosial dan Layanan Dasar (Pendidikan & Kesehatan Masyarakat)',
                    'Bab 5: Pertanian Tanaman Pangan, Hortikultura dan Perkebunan Kakao',
                    'Bab 6: Perikanan Tangkap Laut Teluk Bone & Budidaya Air Payau',
                    'Bab 7: Pariwisata, Transportasi dan Komunikasi Pedesaan'
                ]
            },
            'Statistik_Potensi_Desa_Kolut_2024.pdf': {
                title: 'Statistik Potensi Desa (Podes) Kabupaten Kolaka Utara 2024',
                sub: 'Hasil Sensus Potensi Desa (Podes) BPS',
                katalog: '2102027.7408',
                nomor: '74080.2412',
                tanggal: '18 Desember 2024',
                halaman: '218 Halaman',
                abstrak: 'Hasil pendataan sensus Potensi Desa (Podes) yang menyajikan ketersediaan infrastruktur dasar, fasilitas pendidikan, fasilitas kesehatan, sarana ekonomi, komoditas unggulan desa, serta klasifikasi Indeks Perkembangan Desa (IPD) pada 133 desa dan kelurahan di Kabupaten Kolaka Utara.',
                bab: [
                    'Bab 1: Metodologi Pendataan Podes 2024 dan Cakupan 133 Desa',
                    'Bab 2: Ketersediaan Fasilitas Pendidikan, Kesehatan, dan Layanan Sosial',
                    'Bab 3: Aksesibilitas Transportasi, Jalan Aspal, Sinyal 4G, dan Listrik PLN',
                    'Bab 4: Sektor Unggulan Desa (Perkebunan Kakao, Perikanan, Pertanian, Wisata)',
                    'Bab 5: BUMDes dan Sarana Prasarana Perekonomian Desa',
                    'Bab 6: Analisis Indeks Perkembangan Desa (IPD): Desa Mandiri, Maju, Berkembang'
                ]
            },
            'Indikator_Kesejahteraan_Rakyat_Kolut_2024.pdf': {
                title: 'Indikator Kesejahteraan Rakyat Kolaka Utara 2024',
                sub: 'Statistik Kesejahteraan Sosial BPS Kolaka Utara',
                katalog: '4102005.7408',
                nomor: '74080.2411',
                tanggal: '25 November 2024',
                halaman: '186 Halaman',
                abstrak: 'Menghadirkan indikator kesejahteraan masyarakat di Kabupaten Kolaka Utara yang mencakup kependudukan, kesehatan, pendidikan, ketenagakerjaan, taraf dan pola konsumsi, perumahan dan lingkungan, serta profil kemiskinan dan program perlindungan sosial daerah.',
                bab: [
                    'Bab 1: Perkembangan Indikator Kependudukan dan Fertilitas',
                    'Bab 2: Status Kesehatan, Imunisasi, dan Tenaga Kesehatan Desa',
                    'Bab 3: Angka Partisipasi Sekolah dan Rata-rata Lama Sekolah',
                    'Bab 4: Pengeluaran Per Kapita Rumah Tangga dan Pola Konsumsi Pangan',
                    'Bab 5: Garis Kemiskinan dan Profil Perlindungan Sosial'
                ]
            },
            'Statistik_Perkebunan_Kakao_Kolut_2024.pdf': {
                title: 'Statistik Perkebunan Kakao & Pertanian Kolaka Utara 2024',
                sub: 'Analisis Statistik Sektoral BPS Kolaka Utara',
                katalog: '5102012.7408',
                nomor: '74080.2410',
                tanggal: '15 Oktober 2024',
                halaman: '142 Halaman',
                abstrak: 'Ulasan statistik khusus komoditas perkebunan kakao dan tanaman pangan di Kabupaten Kolaka Utara, mencakup luas areal tanam rakyat, produktivitas per hektar, volume produksi tahunan, serta sebaran sentra perkebunan di 109 desa.',
                bab: [
                    'Bab 1: Sebaran Wilayah Sentra Perkebunan Kakao di 15 Kecamatan',
                    'Bab 2: Perkembangan Luas Areal Tanaman Menghasilkan dan Tanaman Tua',
                    'Bab 3: Produktivitas Kakao Rakyat dan Nilai Tukar Petani (NTP)',
                    'Bab 4: Komoditas Pendukung: Cengkeh, Kelapa, Lada, dan Tanaman Pangan',
                    'Bab 5: Rantai Pasok Pemasaran dan Kelembagaan Kelompok Tani Desa'
                ]
            }
        };

        // Open Modal Preview Publikasi
        // Publikasi modal functions removed

        // Initialize All 4 Charts
        function initDesaCharts() {
            if (typeof Chart === 'undefined') {
                console.warn('Chart.js not loaded yet, skipping chart init');
                return;
            }

            // Set default font to Plus Jakarta Sans
            Chart.defaults.font.family = '"Plus Jakarta Sans", system-ui, sans-serif';
            Chart.defaults.color = '#475569';

            initBarSektorKecamatanChart();
            initDonutStatusKemandirianChart();
            initRadarDesaChart();
            initTopografiInfrastrukturChart();
        }

        // Chart 1: Bar Chart Sektor per Kecamatan
        function initBarSektorKecamatanChart() {
            const ctx = document.getElementById('canvasSektorKecamatan');
            if (!ctx) return;

            const kecNames = kecamatanPodesList.map(k => k.nama);
            
            // Generate Sector data per Kecamatan from real list
            const kakaoData = kecamatanPodesList.map(k => {
                const total = k.desaList ? k.desaList.length : 3;
                const kakaoCount = k.desaList ? k.desaList.filter(d => d.sektor === 'perkebunan' || d.komoditas?.toLowerCase().includes('kakao')).length : Math.round(total * 0.8);
                return Math.max(kakaoCount, 1);
            });

            const perikananData = kecamatanPodesList.map(k => {
                const total = k.desaList ? k.desaList.length : 3;
                return k.desaList ? k.desaList.filter(d => d.sektor === 'perikanan' || d.topografi?.toLowerCase().includes('pesisir')).length : (['Lasusua', 'Katoi', 'Tiwu', 'Ngapa', 'Pakue'].includes(k.nama) ? 2 : 0);
            });

            const panganData = kecamatanPodesList.map(k => {
                const total = k.desaList ? k.desaList.length : 3;
                return k.desaList ? k.desaList.filter(d => d.sektor === 'pertanian').length : (['Ranteangin', 'Wawo', 'Lambai'].includes(k.nama) ? 2 : 1);
            });

            const wisataData = kecamatanPodesList.map(k => {
                const total = k.desaList ? k.desaList.length : 3;
                return k.desaList ? k.desaList.filter(d => d.sektor === 'pariwisata').length : (['Lasusua', 'Wawo', 'Batu Putih'].includes(k.nama) ? 1 : 0);
            });

            chartSektorKecamatan = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: kecNames,
                    datasets: [
                        {
                            label: 'Perkebunan Kakao (Desa)',
                            data: kakaoData,
                            backgroundColor: '#ea580c',
                            borderRadius: 4
                        },
                        {
                            label: 'Perikanan & Pesisir (Desa)',
                            data: perikananData,
                            backgroundColor: '#0284c7',
                            borderRadius: 4
                        },
                        {
                            label: 'Pertanian Pangan (Desa)',
                            data: panganData,
                            backgroundColor: '#10b981',
                            borderRadius: 4
                        },
                        {
                            label: 'Pariwisata & Jasa (Desa)',
                            data: wisataData,
                            backgroundColor: '#f59e0b',
                            borderRadius: 4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            stacked: true,
                            grid: { display: false },
                            ticks: { font: { size: 10 } }
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true,
                            grid: { color: '#f1f5f9' },
                            ticks: { precision: 0 }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { boxWidth: 12, font: { size: 11, weight: '600' } }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.dataset.label}: ${context.raw} Desa`;
                                }
                            }
                        }
                    }
                }
            });
        }

        // Switch main bar chart mode
        window.switchMainBarChart = function(mode) {
            currentBarTab = mode;
            const btnSektor = document.getElementById('btnTabChartSektor');
            const btnProd = document.getElementById('btnTabChartProduksi');

            if (mode === 'sektor') {
                btnSektor.className = 'px-2.5 py-1 rounded-md bg-white text-[#0b2545] shadow-xs transition';
                btnProd.className = 'px-2.5 py-1 rounded-md text-slate-500 hover:text-slate-900 transition';
                
                if (chartSektorKecamatan) {
                    chartSektorKecamatan.destroy();
                    initBarSektorKecamatanChart();
                }
            } else {
                btnProd.className = 'px-2.5 py-1 rounded-md bg-white text-[#0b2545] shadow-xs transition';
                btnSektor.className = 'px-2.5 py-1 rounded-md text-slate-500 hover:text-slate-900 transition';

                const ctx = document.getElementById('canvasSektorKecamatan');
                if (!ctx) return;

                const kecNames = kecamatanPodesList.map(k => k.nama);
                // Production estimation in Ton per Kec
                const prodKakao = [3850, 4200, 3100, 4800, 2900, 3600, 1850, 2400, 3300, 1600, 1900, 2100, 2200, 1800, 1750];
                const prodIkan = [4200, 1200, 950, 2800, 3400, 1100, 800, 600, 1500, 2600, 3100, 1900, 700, 850, 700];

                if (chartSektorKecamatan) chartSektorKecamatan.destroy();

                chartSektorKecamatan = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: kecNames,
                        datasets: [
                            {
                                label: 'Produksi Kakao (Ton/Tahun)',
                                data: prodKakao,
                                backgroundColor: '#ea580c',
                                borderRadius: 6
                            },
                            {
                                label: 'Produksi Perikanan Laut & Tambak (Ton/Tahun)',
                                data: prodIkan,
                                backgroundColor: '#0284c7',
                                borderRadius: 6
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: { grid: { display: false }, ticks: { font: { size: 10 } } },
                            y: {
                                beginAtZero: true,
                                grid: { color: '#f1f5f9' },
                                ticks: {
                                    callback: function(v) { return v.toLocaleString('id-ID') + ' Ton'; }
                                }
                            }
                        },
                        plugins: {
                            legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11, weight: '600' } } },
                            tooltip: {
                                callbacks: {
                                    label: function(ctx) { return `${ctx.dataset.label}: ${ctx.raw.toLocaleString('id-ID')} Ton`; }
                                }
                            }
                        }
                    }
                });
            }
        };

        // Chart 2: Donut Status Kemandirian Desa (IDM/IPD Podes)
        function initDonutStatusKemandirianChart() {
            const ctx = document.getElementById('canvasStatusKemandirian');
            if (!ctx) return;

            chartStatusKemandirian = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Desa Mandiri', 'Desa Maju', 'Desa Berkembang'],
                    datasets: [{
                        data: [28, 64, 41],
                        backgroundColor: ['#10b981', '#0284c7', '#f59e0b'],
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '65%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(c) {
                                    const total = 133;
                                    const pct = ((c.raw / total) * 100).toFixed(1);
                                    return `${c.label}: ${c.raw} Desa (${pct}%)`;
                                }
                            }
                        }
                    }
                }
            });
        }

        // Chart 3: Radar Diagram 5 Dimensi Karakteristik Desa
        function initRadarDesaChart() {
            const ctx = document.getElementById('canvasRadarDesa');
            if (!ctx) return;

            chartRadarDesa = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: [
                        'Pelayanan Dasar (Pendidikan & Faskes)',
                        'Infrastruktur & Akses Jalan',
                        'Konektivitas Sinyal & Listrik',
                        'Potensi Ekonomi & BUMDes',
                        'Tata Kelola & Partisipasi'
                    ],
                    datasets: [
                        {
                            label: 'Rata-rata Kab. Kolaka Utara',
                            data: [78, 80, 76, 82, 75],
                            backgroundColor: 'rgba(100, 116, 139, 0.15)',
                            borderColor: '#64748b',
                            borderWidth: 2,
                            pointBackgroundColor: '#64748b',
                            pointRadius: 3
                        },
                        {
                            label: 'Profil Desa Spesifik',
                            data: [86, 90, 88, 92, 85],
                            backgroundColor: 'rgba(5, 150, 105, 0.25)',
                            borderColor: '#059669',
                            borderWidth: 2.5,
                            pointBackgroundColor: '#059669',
                            pointHoverRadius: 6,
                            pointRadius: 4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        r: {
                            min: 50,
                            max: 100,
                            ticks: { stepSize: 10, display: false },
                            pointLabels: {
                                font: { size: 10, weight: '600' },
                                color: '#334155'
                            },
                            grid: { color: 'rgba(226, 232, 240, 0.8)' },
                            angleLines: { color: 'rgba(226, 232, 240, 0.8)' }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { boxWidth: 12, font: { size: 11, weight: '600' } }
                        }
                    }
                }
            });
        }

        // Dynamically update radar chart when a village is selected
        window.updateChartsForVillage = function(desa, kec) {
            if (!desa || !kec) return;

            // Update radar label
            const titleEl = document.getElementById('radarCurrentVillageTitle');
            if (titleEl) {
                titleEl.textContent = `Desa ${desa.nama} (${kec.nama})`;
            }

            const btnReset = document.getElementById('btnResetRadarToKab');
            if (btnReset) btnReset.classList.remove('hidden');

            const scopeText = document.getElementById('chartActiveScopeText');
            if (scopeText) {
                scopeText.innerHTML = `<span class="text-[#0D6E5B]">Fokus: Desa ${desa.nama} (${kec.nama})</span>`;
            }

            if (chartRadarDesa && chartRadarDesa.data && chartRadarDesa.data.datasets[1]) {
                // Compute 5 dimensions based on desa attributes
                const baseIpd = desa.ipd || 80;
                const d1_pendidikan = Math.min(96, Math.max(65, Math.round(baseIpd * 1.02 + (desa.sekolah?.includes('SMP') ? 6 : 0))));
                const d2_infra = Math.min(98, Math.max(68, Math.round(baseIpd + (desa.sinyal?.includes('Aspal') ? 8 : -4))));
                const d3_komunikasi = Math.min(99, Math.max(65, Math.round(desa.sinyal?.includes('4G+') ? 94 : (desa.sinyal?.includes('4G') ? 88 : 72))));
                const d4_ekonomi = Math.min(97, Math.max(66, Math.round(baseIpd + (desa.bumdes ? 7 : -2))));
                const d5_governance = desa.status === 'Mandiri' ? 92 : (desa.status === 'Maju' ? 84 : 74);

                chartRadarDesa.data.datasets[1].label = `Desa ${desa.nama} (IPD: ${baseIpd})`;
                chartRadarDesa.data.datasets[1].data = [d1_pendidikan, d2_infra, d3_komunikasi, d4_ekonomi, d5_governance];
                chartRadarDesa.update('active');
            }
        };

        // Reset radar chart to Kolaka Utara baseline
        window.resetRadarChart = function() {
            const titleEl = document.getElementById('radarCurrentVillageTitle');
            if (titleEl) titleEl.textContent = 'Kabupaten Kolaka Utara (Rata-rata)';

            const btnReset = document.getElementById('btnResetRadarToKab');
            if (btnReset) btnReset.classList.add('hidden');

            const scopeText = document.getElementById('chartActiveScopeText');
            if (scopeText) scopeText.textContent = 'Agregat 15 Kecamatan (133 Desa)';

            if (chartRadarDesa && chartRadarDesa.data && chartRadarDesa.data.datasets[1]) {
                chartRadarDesa.data.datasets[1].label = 'Standar Wilayah Mandiri';
                chartRadarDesa.data.datasets[1].data = [86, 90, 88, 92, 85];
                chartRadarDesa.update('active');
            }
        };

        // Chart 4: Topografi & Sarana Infrastruktur
        function initTopografiInfrastrukturChart() {
            const ctx = document.getElementById('canvasTopografiInfrastruktur');
            if (!ctx) return;

            chartTopografi = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'Pesisir / Pantai',
                        'Dataran Rendah',
                        'Lereng / Pegunungan',
                        'Listrik PLN 24 Jam',
                        'Sinyal 4G Kuat',
                        'Jalan Aspal Hotmix'
                    ],
                    datasets: [{
                        label: 'Persentase Desa Terpenuhi (%)',
                        data: [36.1, 41.4, 22.5, 100, 92.5, 88.7],
                        backgroundColor: [
                            '#0284c7',
                            '#10b981',
                            '#ea580c',
                            '#0b2545',
                            '#059669',
                            '#f59e0b'
                        ],
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 10 } }
                        },
                        y: {
                            beginAtZero: true,
                            max: 100,
                            grid: { color: '#f1f5f9' },
                            ticks: {
                                callback: function(val) { return val + '%'; }
                            }
                        }
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(c) {
                                    return `${c.label}: ${c.raw}%`;
                                }
                            }
                        }
                    }
                }
            });
        }


        // Robust Single Bootstrap
        let isBootstrapped = false;
        function bootstrap() {
            if (isBootstrapped) return;
            isBootstrapped = true;
            loadPersistedPodesData();
            initKecamatanDropdown();
            updateDesaDropdown(null);
            renderVillageCards(null);
            setupEvents();
            initLeafletMap();
            initAdminPortal();
            updateStatsSummaryCards();
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', bootstrap);
        } else {
            bootstrap();
        }
    })();
    </script>
    <!-- MODAL: PREVIEW & RINGKASAN PUBLIKASI BPS -->
    <!-- =========================================================================
         LOGIN MODAL LOGIC SCRIPT
         ========================================================================= -->
    <script>
        window.openLoginModal = function(e) {
            if (e && e.preventDefault) e.preventDefault();
            const modal = document.getElementById('modalLoginForm');
            if (modal) {
                modal.style.display = 'flex';
                modal.classList.remove('hidden');
                setTimeout(() => {
                    document.getElementById('modalLoginUsername')?.focus();
                }, 100);
            }
        };

        window.closeLoginModal = function() {
            const modal = document.getElementById('modalLoginForm');
            if (modal) {
                modal.classList.add('hidden');
                modal.style.display = 'none';
                const alertBox = document.getElementById('loginAlertBox');
                if (alertBox) {
                    alertBox.classList.add('hidden');
                    alertBox.innerHTML = '';
                }
            }
        };

        window.togglePasswordVisibility = function(inputId, btn) {
            const input = document.getElementById(inputId);
            if (!input) return;
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = `<svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>`;
            } else {
                input.type = 'password';
                btn.innerHTML = `<svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>`;
            }
        };

        window.fillAdminDemo = function() {
            const userInput = document.getElementById('modalLoginUsername');
            const passInput = document.getElementById('modalLoginPassword');
            if (userInput) userInput.value = 'admin@bps.go.id';
            if (passInput) passInput.value = 'bps7408';
        };

        window.handleLoginSubmit = async function(e) {
            e.preventDefault();
            const form = document.getElementById('formLoginModal');
            const alertBox = document.getElementById('loginAlertBox');
            const submitBtn = document.getElementById('btnSubmitLogin');
            const btnText = document.getElementById('btnSubmitLoginText');
            
            const login = document.getElementById('modalLoginUsername').value.trim();
            const password = document.getElementById('modalLoginPassword').value;
            const csrfToken = form.querySelector('input[name="_token"]')?.value || '';

            if (alertBox) {
                alertBox.classList.add('hidden');
                alertBox.className = 'mb-4 p-3 rounded-xl text-xs font-semibold';
            }

            if (submitBtn) submitBtn.disabled = true;
            if (btnText) btnText.innerHTML = 'Memproses...';

            try {
                const response = await fetch('/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ login, password })
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    if (alertBox) {
                        alertBox.classList.remove('hidden');
                        alertBox.classList.add('bg-emerald-50', 'text-emerald-800', 'border', 'border-emerald-200');
                        alertBox.innerHTML = `✓ ${data.message || 'Login berhasil! Mengalihkan...'}`;
                    }
                    setTimeout(() => {
                        window.location.href = data.redirect || '/portal';
                    }, 600);
                } else {
                    throw new Error(data.message || 'Email atau kata sandi tidak sesuai.');
                }
            } catch (err) {
                if (alertBox) {
                    alertBox.classList.remove('hidden');
                    alertBox.classList.add('bg-rose-50', 'text-rose-800', 'border', 'border-rose-200');
                    alertBox.innerHTML = `✕ ${err.message || 'Terjadi kesalahan saat masuk.'}`;
                }
            } finally {
                if (submitBtn) submitBtn.disabled = false;
                if (btnText) btnText.innerHTML = 'Masuk ke Sistem';
            }
        };

        // Close on escape & backdrop click
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeLoginModal();
        });

        document.getElementById('modalLoginForm')?.addEventListener('click', function(e) {
            if (e.target === this) closeLoginModal();
        });

        // Auto open if url parameter ?login=1 exists
        if (new URLSearchParams(window.location.search).has('login')) {
            window.openLoginModal();
        }
    </script>
    
    <!-- =========================================================================
         BILINGUAL I18N ENGINE (INDONESIAN / ENGLISH)
         Zero Layout Shift • Symmetrical Microcopy • Persistent Choice
         ========================================================================= -->
    <script>
    window.portalTranslations = {
        id: {
            nav_brand_sub: "Portal Data & Analitik Kemandirian Desa • Kab. Kolaka Utara",
            nav_home: "Beranda",
            nav_agregat: "Agregat 15 Kecamatan",
            nav_gis: "WebGIS Peta Spasial",
            nav_descan: "Desa Cantik (DESCAN)",
            nav_about: "Tentang Madani",
            btn_15_kec: "15 Kecamatan",
            btn_kelola_data: "Kelola Data",

            hero_eyebrow: "PORTAL SATU DATA & KEDAULATAN DESA MANDIRI",
            hero_title_1: "DESA MADANI",
            hero_title_2: "KOLAKA UTARA",
            hero_desc: "Mewujudkan <b>Desa Mandiri, Maju, dan Sejahtera</b> melalui integrasi data geospasial tematik resolusi tinggi, statistik potensi desa (Podes BPS 2024–2025), dan sistem analitik perencanaan pembangunan berbasis bukti (*evidence-based policy*).",
            hero_btn_webgis: "Portal Data WebGIS",
            hero_btn_explore: "Jelajahi Potensi Desa",
            hero_card_head: "KABUPATEN KOLAKA UTARA",
            hero_card_foot: "Peta Vektor Spasial 15 Kecamatan",
            hero_badge_spasial: "100% Spasial Podes",
            hero_badge_desa: "133 Desa Madani",
            hero_badge_sejahtera: "Kolaka Utara Sejahtera",
            hero_badge_15kec: "15 Kecamatan Spasial",
            hero_help_text: "Pusat<br>Bantuan",

            agregat_eyebrow: '<svg class="w-3 h-3 text-[#0D6E5B]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15 9L22 12L15 15L12 22L9 15L2 12L9 9L12 2Z"/></svg>PODES BPS 2025 • AGREGAT LENGKAP 15 KECAMATAN KOLAKA UTARA',
            agregat_title: "Panorama Statistik & Komparasi Agregat 15 Kecamatan",
            agregat_btn_gis: "Jelajah Peta Spasial ↓",
            agregat_kpi1_title: "Administrasi",
            agregat_kpi1_unit: "Kec",
            agregat_kpi1_sub: "127 Desa • 6 Kelurahan",
            agregat_kpi2_title: "Sentra & IMK",
            agregat_kpi2_unit: "Unit",
            agregat_kpi2_sub: "Juara: Porehu (1.440)",
            agregat_kpi3_title: "Listrik PLN",
            agregat_kpi3_unit: "KK",
            agregat_kpi3_sub: "Rasio 91,5% Elektrifikasi",
            agregat_kpi4_title: "Pendidikan",
            agregat_kpi4_unit: "Sek",
            agregat_kpi4_sub: "124 SD/MI • 54 SMP • 26 SMA/K",
            agregat_kpi5_title: "Kesehatan",
            agregat_kpi5_unit: "Faskes",
            agregat_kpi5_sub: "1 RS • 16 Puskesmas • 28 Pustu",
            agregat_kpi6_title: "BUMDes & Aparat",
            agregat_kpi6_unit: "BUMDes",
            agregat_kpi6_sub: "1.164 Aparatur Desa Aktif",

            agregat_h1_title: "Sentra Industri Mikro",
            agregat_h1_desa: "• 8 Desa",
            agregat_h1_unit: "Unit IMK",
            agregat_h2_title: "Populasi & Elektrifikasi",
            agregat_h2_desa: "• Ibu Kota",
            agregat_h2_unit: "KK Listrik",
            agregat_h3_title: "Fasilitas Pendidikan & Faskes",
            agregat_h3_desa: "• Sentra Sosial",
            agregat_h3_unit: "Layanan Terlengkap",

            agregat_sec_all: "Semua Sektor",
            agregat_sec_ekonomi: "Ekonomi & 3.622 IMK",
            agregat_sec_lingkungan: "Kelistrikan & Lingkungan",
            agregat_sec_pendidikan: "Pendidikan (205 Unit)",
            agregat_sec_kesehatan: "Kesehatan (174 Unit)",
            agregat_sec_pemerintahan: "BUMDes & Pemerintahan",
            agregat_search_ph: "Cari kecamatan...",
            agregat_sort_geo: "Urutkan: Geografis (Utara-Selatan)",
            agregat_sort_imk: "Urutkan: IMK Terbanyak",
            agregat_sort_pln: "Urutkan: Listrik PLN Terbanyak",
            agregat_sort_desa: "Urutkan: Jumlah Desa Terbanyak",
            agregat_sort_sekolah: "Urutkan: Sarana Pendidikan",
            agregat_sort_faskes: "Urutkan: Sarana Kesehatan",
            agregat_sort_bumdes: "Urutkan: BUMDes Terbanyak",
            agregat_bottom_hint: '<svg class="w-4 h-4 text-[#0D6E5B] inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg><b>Tips:</b> Klik tombol <b>"Buka di Peta WebGIS ↓"</b> pada kartu kecamatan di atas untuk langsung menganalisis sebaran desa dan metrik spasial secara interaktif.',

            pill_cat_ekonomi: "Sarana Ekonomi",
            pill_cat_lingkungan: "Perumahan & Lingkungan",
            pill_cat_sosial: "Pendidikan & Kesehatan",
            pill_cat_keuangan: "Keuangan & Aset Desa",
            pill_cat_umum: "Keterangan Umum",
            pill_cat_pemerintah: "Pemerintah Desa",
            label_peta_tematik: "Peta Tematik",
            btn_view_peta: "Peta",
            btn_view_analisis: "Analisis",
            btn_view_tabel: "Tabel Data (133 Desa)",
            label_split_view: "Peta & Analisis",

            sidebar_filter_title: "Filter Wilayah",
            sidebar_reset: "Reset",
            sidebar_lbl_prov: "Provinsi",
            sidebar_val_prov: "Sulawesi Tenggara",
            sidebar_lbl_kab: "Kabupaten/Kota",
            sidebar_val_kab: "Kolaka Utara",
            sidebar_lbl_kec: "Kecamatan",
            sidebar_lbl_desa: "Desa / Kelurahan",
            sidebar_lbl_admin: "Tingkat Administratif",
            sidebar_summary_title: "Ringkasan Eksekutif",
            sidebar_scope_kab: "Kabupaten",
            sidebar_village_list_title: "Daftar Desa di Wilayah",
            sidebar_badge_desa: "133 Desa",

            map_unit_analisis: "Unit Analisis: Wilayah Administrasi",
            map_reset_zoom: "Reset Zoom",
            map_guide_caption: "<b>Panduan:</b> Klik poligon kecamatan untuk zoom & melihat desa • Klik nama desa untuk membuka Rapor Presisi.",

            table_pane_title: "Tabulasi Lengkap Data PODES 2025 (133 Desa / Kelurahan)",
            table_pane_desc: "Pencarian instan, filter per wilayah, dan unduh data ke format spreadsheet (CSV).",
            table_btn_csv: "Unduh CSV",
            table_search_ph: "Cari nama desa, kecamatan, atau komoditas...",
            table_count_badge: "Menampilkan 133 dari 133 Desa",

            modal_matriks_title: "Matriks Potensi 15 Kecamatan Kabupaten Kolaka Utara",
            modal_matriks_desc: "Berdasarkan Data Potensi Desa (Podes) BPS 2024–2025",
            modal_search_ph: "Cari nama kecamatan atau komoditas...",
            modal_btn_csv: "Ekspor CSV",
            modal_btn_close: "Tutup",
            modal_source: "Sumber: BPS Kabupaten Kolaka Utara (Podes 2024–2025)",
            th_no: "No",
            th_kecamatan: "Kecamatan",
            th_potensi: "Potensi Unggulan",
            th_desa: "Jumlah Desa",
            th_ipd_idx: "Indeks IPD",
            th_ipd_status: "Status IPD",
            th_action: "Aksi",

            login_badge: "Masuk Administrator & Operator",
            login_lbl_username: "Email / Username",
            login_lbl_pass: "Kata Sandi",
            login_forgot: "Lupa sandi?",
            login_remember: "Ingat Sesi Masuk",
            login_btn_submit: "Masuk ke Sistem",

            footer_title: "Kolaborasi Inovasi",
            footer_brand: "Desa Madani x BPS Kabupaten Kolaka Utara",
            footer_sub: "Kedaulatan Data Pembangunan Berbasis Desa • Kode Wilayah: 7408",
            footer_link_gis: "Madani WebGIS",
            footer_btn_bps: "Portal BPS",
            footer_copy: "© 2026 Badan Pusat Statistik Kabupaten Kolaka Utara & Inisiatif Desa Madani. Seluruh Hak Cipta Dilindungi.",
            footer_tagline: "Solusi Satu Data Indonesia • Membangun Desa Mandiri & Sejahtera",
            descan_eyebrow: "Program Quick Win BPS RI • Desa Cinta Statistik (Desa Cantik)",
            descan_title: "Program Desa Cantik Kabupaten Kolaka Utara",
            descan_desc: "Akselerasi pembinaan statistik sektoral pada tingkat desa dan kelurahan oleh BPS Kabupaten Kolaka Utara guna mewujudkan tata kelola Satu Data Indonesia, literasi data aparatur desa, serta perencanaan pembangunan berbasis bukti.",
            descan_btn_dashboard: "Dashboard DESCAN (6 Desa)",
            descan_stat1_title: "Target Pembinaan",
            descan_stat1_unit: "Desa",
            descan_stat1_sub: "15 Kecamatan Kolaka Utara",
            descan_stat2_title: "Kaderisasi",
            descan_stat2_val: "Agen Statistik",
            descan_stat2_sub: "Aparatur & Pemuda Desa",
            descan_stat3_title: "Prinsip Data",
            descan_stat3_sub: "Standar & Metadata Baku",
            descan_stat4_title: "Output Utama",
            descan_stat4_val: "Monografi & WebGIS",
            descan_stat4_sub: "Profil & Spasial Desa",

            about_eyebrow: "Konsep & Metodologi Resmi Desa Madani",
            about_title: "Tentang Inisiatif Desa Madani",
            about_desc: "Inovasi terpadu memadukan data statistik potensi desa (Podes BPS) dan pemetaan spasial tematik untuk mewujudkan kemandirian dan kemakmuran desa di Kolaka Utara",
            about_badge_inisiator: "Inisiator: Pemerintah Kab. Kolaka Utara",
            about_badge_bps: "Mitra Data: BPS Kab. Kolaka Utara",

        },
        en: {
            nav_brand_sub: "Village Self-Reliance Data & Analytics Portal • North Kolaka",
            nav_home: "Home",
            nav_agregat: "15 Districts Aggregate",
            nav_gis: "WebGIS Spatial Map",
            nav_descan: "Desa Cantik (DESCAN)",
            nav_about: "About Madani",
            btn_15_kec: "15 Districts",
            btn_kelola_data: "Manage Data",

            hero_eyebrow: "ONE DATA PORTAL & INDEPENDENT VILLAGE SOVEREIGNTY",
            hero_title_1: "DESA MADANI",
            hero_title_2: "NORTH KOLAKA",
            hero_desc: "Realizing <b>Self-Reliant, Advanced, and Prosperous Villages</b> through high-resolution thematic geospatial data integration, village potential statistics (BPS Podes 2024–2025), and evidence-based development planning analytics.",
            hero_btn_webgis: "WebGIS Data Portal",
            hero_btn_explore: "Explore Village Data",
            hero_card_head: "NORTH KOLAKA REGENCY",
            hero_card_foot: "15 Districts Spatial Vector Map",
            hero_badge_spasial: "100% Spatial Podes",
            hero_badge_desa: "133 Madani Villages",
            hero_badge_sejahtera: "Prosperous North Kolaka",
            hero_badge_15kec: "15 Spatial Districts",
            hero_help_text: "Help<br>Center",

            agregat_eyebrow: '<svg class="w-3 h-3 text-[#0D6E5B]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15 9L22 12L15 15L12 22L9 15L2 12L9 9L12 2Z"/></svg>BPS PODES 2025 • COMPLETE AGGREGATE OF 15 NORTH KOLAKA DISTRICTS',
            agregat_title: "Statistical Overview & 15 Districts Aggregate Comparison",
            agregat_btn_gis: "Explore Spatial Map ↓",
            agregat_kpi1_title: "Administration",
            agregat_kpi1_unit: "Dist",
            agregat_kpi1_sub: "127 Villages • 6 Sub-districts",
            agregat_kpi2_title: "Centers & MSE",
            agregat_kpi2_unit: "Units",
            agregat_kpi2_sub: "Top: Porehu (1,440)",
            agregat_kpi3_title: "PLN Electricity",
            agregat_kpi3_unit: "HH",
            agregat_kpi3_sub: "91.5% Electrification Ratio",
            agregat_kpi4_title: "Education",
            agregat_kpi4_unit: "Sch",
            agregat_kpi4_sub: "124 Primary • 54 Junior • 26 Senior",
            agregat_kpi5_title: "Healthcare",
            agregat_kpi5_unit: "Fac",
            agregat_kpi5_sub: "1 Hospital • 16 Clinics • 28 Sub-clinics",
            agregat_kpi6_title: "BUMDes & Officials",
            agregat_kpi6_unit: "BUMDes",
            agregat_kpi6_sub: "1,164 Active Village Officials",

            agregat_h1_title: "Micro Industry Center",
            agregat_h1_desa: "• 8 Villages",
            agregat_h1_unit: "MSE Units",
            agregat_h2_title: "Population & Electrification",
            agregat_h2_desa: "• Capital",
            agregat_h2_unit: "Electrified HH",
            agregat_h3_title: "Education & Health Facilities",
            agregat_h3_desa: "• Social Center",
            agregat_h3_unit: "Most Complete Services",

            agregat_sec_all: "All Sectors",
            agregat_sec_ekonomi: "Economy & 3,622 MSE",
            agregat_sec_lingkungan: "Electricity & Environment",
            agregat_sec_pendidikan: "Education (205 Units)",
            agregat_sec_kesehatan: "Health (174 Units)",
            agregat_sec_pemerintahan: "BUMDes & Governance",
            agregat_search_ph: "Search district...",
            agregat_sort_geo: "Sort: Geographic (North-South)",
            agregat_sort_imk: "Sort: Highest MSE",
            agregat_sort_pln: "Sort: Highest PLN Electricity",
            agregat_sort_desa: "Sort: Most Villages",
            agregat_sort_sekolah: "Sort: Education Facilities",
            agregat_sort_faskes: "Sort: Health Facilities",
            agregat_sort_bumdes: "Sort: Highest BUMDes",
            agregat_bottom_hint: '<svg class="w-4 h-4 text-[#0D6E5B] inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg><b>Tip:</b> Click <b>"Open in WebGIS Map ↓"</b> on district cards above to interactively analyze village distribution and spatial metrics.',

            pill_cat_ekonomi: "Economic Facilities",
            pill_cat_lingkungan: "Housing & Environment",
            pill_cat_sosial: "Education & Health",
            pill_cat_keuangan: "Finance & Village Assets",
            pill_cat_umum: "General Information",
            pill_cat_pemerintah: "Village Government",
            label_peta_tematik: "Thematic Map",
            btn_view_peta: "Map",
            btn_view_analisis: "Analysis",
            btn_view_tabel: "Data Table (133 Villages)",
            label_split_view: "Map & Analysis",

            sidebar_filter_title: "Regional Filter",
            sidebar_reset: "Reset",
            sidebar_lbl_prov: "Province",
            sidebar_val_prov: "Southeast Sulawesi",
            sidebar_lbl_kab: "Regency/City",
            sidebar_val_kab: "North Kolaka",
            sidebar_lbl_kec: "District",
            sidebar_lbl_desa: "Village / Ward",
            sidebar_lbl_admin: "Administrative Level",
            sidebar_summary_title: "Executive Summary",
            sidebar_scope_kab: "Regency",
            sidebar_village_list_title: "Villages in Region",
            sidebar_badge_desa: "133 Villages",

            map_unit_analisis: "Analysis Unit: Administrative Area",
            map_reset_zoom: "Reset Zoom",
            map_guide_caption: "<b>Guide:</b> Click district polygon to zoom & view villages • Click village name to view Precision Report.",

            table_pane_title: "Complete Tabulation of 2025 PODES Data (133 Villages / Wards)",
            table_pane_desc: "Instant search, regional filter, and download data in spreadsheet format (CSV).",
            table_btn_csv: "Download CSV",
            table_search_ph: "Search village, district, or commodity...",
            table_count_badge: "Showing 133 of 133 Villages",

            modal_matriks_title: "Potential Matrix of 15 Districts in North Kolaka Regency",
            modal_matriks_desc: "Based on Village Potential Data (Podes) BPS 2024–2025",
            modal_search_ph: "Search district or commodity...",
            modal_btn_csv: "Export CSV",
            modal_btn_close: "Close",
            modal_source: "Source: BPS Statistics of North Kolaka Regency (Podes 2024–2025)",
            th_no: "No",
            th_kecamatan: "District",
            th_potensi: "Key Potential",
            th_desa: "Total Villages",
            th_ipd_idx: "VDI Index",
            th_ipd_status: "VDI Status",
            th_action: "Action",

            login_badge: "Administrator & Operator Login",
            login_lbl_username: "Email / Username",
            login_lbl_pass: "Password",
            login_forgot: "Forgot password?",
            login_remember: "Remember Login",
            login_btn_submit: "Sign in to System",

            footer_title: "Innovation Collaboration",
            footer_brand: "Desa Madani x BPS North Kolaka Regency",
            footer_sub: "Village-Based Development Data Sovereignty • Region Code: 7408",
            footer_link_gis: "Madani WebGIS",
            footer_btn_bps: "BPS Portal",
            footer_copy: "© 2026 BPS Statistics of North Kolaka Regency & Desa Madani Initiative. All Rights Reserved.",
            footer_tagline: "One Data Indonesia Solution • Building Independent & Prosperous Villages",
            descan_eyebrow: "BPS RI Quick Win Program • Statistics Love Village (Desa Cantik)",
            descan_title: "Desa Cantik Program of North Kolaka Regency",
            descan_desc: "Accelerating sectoral statistical coaching at village and ward levels by BPS North Kolaka Regency to achieve One Data Indonesia governance, village apparatus data literacy, and evidence-based development planning.",
            descan_btn_dashboard: "DESCAN Dashboard (6 Villages)",
            descan_stat1_title: "Coaching Target",
            descan_stat1_unit: "Villages",
            descan_stat1_sub: "15 Districts of North Kolaka",
            descan_stat2_title: "Cadre Building",
            descan_stat2_val: "Statistical Agents",
            descan_stat2_sub: "Village Apparatus & Youth",
            descan_stat3_title: "Data Principles",
            descan_stat3_sub: "Standard & Unified Metadata",
            descan_stat4_title: "Main Output",
            descan_stat4_val: "Monograph & WebGIS",
            descan_stat4_sub: "Village Profile & Spatial",

            about_eyebrow: "Official Concept & Methodology of Desa Madani",
            about_title: "About the Desa Madani Initiative",
            about_desc: "Integrated innovation combining village potential statistics (BPS Podes) and thematic spatial mapping to realize village independence and prosperity in North Kolaka",
            about_badge_inisiator: "Initiator: North Kolaka Regency Government",
            about_badge_bps: "Data Partner: BPS North Kolaka Regency",

        }
    };

    window.setPortalLanguage = function(lang) {
        if (lang !== 'id' && lang !== 'en') lang = 'id';
        window.currentPortalLang = lang;
        try {
            localStorage.setItem('desamadani_lang', lang);
        } catch(e) {}

        // 1. Update Switcher Pill styling
        const btnID = document.getElementById('btnLangID');
        const btnEN = document.getElementById('btnLangEN');
        if (btnID && btnEN) {
            if (lang === 'id') {
                btnID.className = 'px-2.5 py-1 rounded-full bg-[#0D6E5B] text-white shadow-xs transition-all cursor-pointer font-bold';
                btnEN.className = 'px-2.5 py-1 rounded-full text-slate-600 hover:text-[#0b2545] transition-all cursor-pointer font-bold';
            } else {
                btnEN.className = 'px-2.5 py-1 rounded-full bg-[#0D6E5B] text-white shadow-xs transition-all cursor-pointer font-bold';
                btnID.className = 'px-2.5 py-1 rounded-full text-slate-600 hover:text-[#0b2545] transition-all cursor-pointer font-bold';
            }
        }

        // 2. Translate DOM elements with data-i18n
        const dict = window.portalTranslations[lang] || window.portalTranslations.id;
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (dict[key] !== undefined) {
                el.innerHTML = dict[key];
            }
        });

        // 3. Translate input placeholders with data-i18n-ph
        document.querySelectorAll('[data-i18n-ph]').forEach(el => {
            const key = el.getAttribute('data-i18n-ph');
            if (dict[key] !== undefined) {
                el.setAttribute('placeholder', dict[key]);
            }
        });

        // 4. Re-render dynamic components in PresisiEngine if loaded
        if (window.PresisiEngine && typeof window.PresisiEngine.renderAgregatKecamatanSection === 'function') {
            try {
                window.PresisiEngine.renderAgregatKecamatanSection();
            } catch(e) {}
        }
    };

    // Auto-initialize language on page load
    document.addEventListener('DOMContentLoaded', function() {
        const savedLang = localStorage.getItem('desamadani_lang') || 'id';
        window.setPortalLanguage(savedLang);
    });
    </script>
</body>

</html>
