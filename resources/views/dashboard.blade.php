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
    
    <!-- Local Leaflet CSS (Offline & Instant) -->
    <link rel="stylesheet" href="/vendor/leaflet/leaflet.css" />

    <!-- Local Chart.js (Offline & Instant) with CDN fallback -->
    <script src="/vendor/chart.umd.min.js"></script>
    <script>
        if (typeof Chart === 'undefined') {
            document.write('<script src="https://cdn.jsdelivr.net/npm/chart.js"><\/script>');
        }
    </script>

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
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: #f8fafc;
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
    </style>
</head>
<body class="min-h-screen bg-[#f8fafc] text-slate-800 antialiased flex flex-col">

        <!-- TOP NAVBAR: DESA MADANI CLEAN & MODERN THEME -->
    <header class="bg-white/95 backdrop-blur-md text-slate-800 shadow-xs border-b border-slate-200/80 sticky top-0 z-40 transition-all">
        <div class="w-full px-4 lg:px-10 py-3 flex items-center justify-between gap-4 max-w-[1720px] mx-auto">
            <!-- Left: Logo Desa Madani -->
            <a href="/" class="flex items-center gap-3 group">
                <!-- Desa Madani Custom Vector Emblem -->
                <div class="w-10 h-10 relative flex items-center justify-center shrink-0">
                    <svg class="w-10 h-10 drop-shadow-sm transition-transform duration-300 group-hover:scale-105" viewBox="0 0 100 100" fill="none">
                        <!-- Emerald Top-Left Wing / Leaf & Arch -->
                        <path d="M16 22 C16 16 18 14 24 14 H52 C55 14 56 16 56 20 V46 C56 50 54 52 50 52 H32 C23 52 16 45 16 36 Z" fill="#059669"/>
                        <!-- Navy Bottom-Right Base Wing -->
                        <path d="M48 48 C48 44 50 42 54 42 H72 C80 42 86 48 86 56 V78 C86 82 84 84 80 84 H48 C44 84 42 82 42 78 V54 C42 50 44 48 48 48 Z" fill="#0b2545"/>
                        <!-- Golden Central Spark -->
                        <circle cx="50" cy="50" r="7" fill="#f59e0b"/>
                        <circle cx="50" cy="50" r="3" fill="#ffffff"/>
                    </svg>
                </div>
                <div>
                    <div class="text-xl sm:text-2xl font-black text-[#0b2545] leading-none tracking-tight">
                        Desa <span class="text-[#059669]">Madani</span>
                    </div>
                    <div class="text-[10px] text-slate-500 font-medium tracking-wide mt-0.5">
                        Portal Data & Analitik Kemandirian Desa • Kab. Kolaka Utara
                    </div>
                </div>
                <!-- Institutional BPS Partner Logo -->
                <div class="hidden sm:flex items-center pl-3 ml-2 border-l border-slate-200">
                    <img src="/images/bps_kolaka_utara_logo.jpg" alt="BPS Kolaka Utara" class="h-8 w-auto object-contain">
                </div>
            </a>

            <!-- Center/Right: Navigation Menu Links -->
            <nav class="hidden xl:flex items-center gap-6 text-[13px] font-semibold text-slate-700">
                <a href="/" class="text-[#059669] font-black border-b-2 border-[#059669] pb-0.5">Beranda</a>
                <a href="#sectionPotensi" class="hover:text-[#059669] transition">Potensi Sektor</a>
                <a href="#sectionPeta" class="hover:text-[#059669] transition">WebGIS Peta</a>
                <a href="#sectionGrafik" class="hover:text-[#059669] transition flex items-center gap-1 text-[#0b2545] font-bold">
                    <span>Grafik & Statistik</span>
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                </a>
                <a href="#sectionMonografi" class="hover:text-[#059669] transition">Monografi Desa</a>
                <a href="#sectionPublikasi" class="hover:text-[#059669] transition">Publikasi BPS</a>
                <a href="#sectionEkosistem" class="hover:text-[#059669] transition">Ekosistem</a>
                <a href="#sectionAbout" class="hover:text-[#059669] transition">Tentang Madani</a>
            </nav>

            <!-- Right Controls: Beranda Jadesta, 15 Kecamatan, Admin Portal, Language Switcher -->
            <div class="flex items-center gap-3">
                <a href="/" class="hidden md:flex items-center gap-1.5 px-3 py-1.5 rounded-full border border-slate-200 hover:border-[#12715b] text-slate-700 hover:text-[#12715b] text-xs font-bold transition" title="Kembali ke Beranda Jadesta">
                    <svg class="w-3.5 h-3.5 text-[#12715b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Beranda Jadesta</span>
                </a>

                <button id="btnOpenKecamatanModal" class="hidden sm:flex items-center gap-1.5 px-3.5 py-1.5 rounded-full border border-slate-200 hover:border-[#059669] text-slate-700 hover:text-[#059669] text-xs font-bold transition">
                    <svg class="w-3.5 h-3.5 text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    <span>15 Kecamatan</span>
                </button>

                <button id="btnOpenAdminPortal" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-black px-3.5 py-1.5 rounded-full shadow-sm hover:shadow transition flex items-center gap-1.5 text-xs transform hover:scale-105 active:scale-95" title="Buka Portal Admin Input & Kelola Data Desa">
                    <svg class="w-3.5 h-3.5 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span>Kelola Data</span>
                    <span id="badgeAdminCustomCount" class="bg-slate-950 text-amber-300 text-[10px] px-1.5 py-0.2 rounded-full font-black hidden">0 Baru</span>
                </button>

                <!-- Language Switcher Pill -->
                <div class="flex items-center bg-slate-100 rounded-full p-0.5 text-xs font-bold border border-slate-200">
                    <span class="px-2.5 py-1 rounded-full bg-[#0b2545] text-white shadow-xs">ID</span>
                    <span class="px-2.5 py-1 text-slate-500 hover:text-[#0b2545] cursor-pointer transition">EN</span>
                </div>
            </div>
        </div>
    </header>

    <!-- HERO SECTION: DESA MADANI KOLAKA UTARA -->
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
                        <span>PORTAL SATU DATA & KEDAULATAN DESA MANDIRI</span>
                    </div>

                    <!-- Massive Bold Typography: DESA MADANI KOLAKA UTARA -->
                    <h1 class="text-5xl sm:text-7xl lg:text-8xl font-black text-[#0b2545] tracking-tight leading-[0.92] uppercase font-sans">
                        DESA MADANI<br>
                        <span class="text-[#059669]">KOLAKA UTARA</span>
                    </h1>

                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-xl font-normal pt-1">
                        Mewujudkan <b>Desa Mandiri, Maju, dan Sejahtera</b> melalui integrasi data geospasial tematik resolusi tinggi, statistik potensi desa (Podes BPS 2024–2025), dan sistem analitik perencanaan pembangunan berbasis bukti (*evidence-based policy*).
                    </p>

                    <!-- CTA Buttons: Emerald Pill + Navy Pill -->
                    <div class="flex flex-wrap items-center gap-4 pt-3">
                        <!-- Emerald Pill Button: Portal Data WebGIS -->
                        <a href="#sectionPeta" class="px-8 py-3.5 rounded-full bg-gradient-to-r from-[#059669] to-[#047857] hover:from-[#047857] hover:to-[#065f46] text-white font-bold text-sm shadow-lg shadow-emerald-700/25 hover:shadow-xl transition flex items-center gap-2.5 transform hover:-translate-y-1 active:translate-y-0">
                            <span>Portal Data WebGIS</span>
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                        </a>

                        <!-- Dark Navy Pill Button: Jelajahi Potensi Desa -->
                        <a href="#sectionAbout" class="px-8 py-3.5 rounded-full bg-[#0b2545] hover:bg-[#162d4a] text-white font-bold text-sm shadow-lg shadow-slate-900/20 hover:shadow-xl transition flex items-center gap-2.5 transform hover:-translate-y-1 active:translate-y-0">
                            <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path d="M4.5 3.5l11 6.5-11 6.5v-13z"/></svg>
                            <span>Jelajahi Potensi Desa</span>
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
                                    <span class="font-extrabold text-[#0b2545] tracking-tight">KABUPATEN KOLAKA UTARA</span>
                                </div>
                                <span class="text-[10px] font-mono font-bold text-slate-400 bg-slate-50 px-2 py-0.5 rounded-full border border-slate-100">
                                    7408 • SULTRA
                                </span>
                            </div>

                            <!-- THE MASTER SVG MAP: INDONESIA/SULAWESI BACKDROP + 15 KECAMATAN OF KOLAKA UTARA -->
                            <div class="relative w-full aspect-[400/480] flex items-center justify-center">
                                <svg class="w-full h-full drop-shadow-md" viewBox="0 0 400 480" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <!-- Gradient Definitions for 15 Kecamatans -->
                                        <linearGradient id="gradLasusua" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#059669" />
                                            <stop offset="100%" stop-color="#047857" />
                                        </linearGradient>
                                        <linearGradient id="gradEmerald" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#10b981" />
                                            <stop offset="100%" stop-color="#059669" />
                                        </linearGradient>
                                        <linearGradient id="gradEmeraldDark" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#047857" />
                                            <stop offset="100%" stop-color="#065f46" />
                                        </linearGradient>
                                        <linearGradient id="gradTeal" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#14b8a6" />
                                            <stop offset="100%" stop-color="#0f766e" />
                                        </linearGradient>
                                        <linearGradient id="gradSky" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#0284c7" />
                                            <stop offset="100%" stop-color="#0369a1" />
                                        </linearGradient>
                                        <linearGradient id="gradNavy" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#1e3a8a" />
                                            <stop offset="100%" stop-color="#0b2545" />
                                        </linearGradient>
                                        <linearGradient id="gradNavyDark" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#0f172a" />
                                            <stop offset="100%" stop-color="#0b2545" />
                                        </linearGradient>

                                        <!-- Drop shadow filter for 3D elevation -->
                                        <filter id="mapShadow" x="-20%" y="-20%" width="140%" height="140%">
                                            <feDropShadow dx="3" dy="8" stdDeviation="6" flood-color="#0b2545" flood-opacity="0.22" />
                                        </filter>
                                        <filter id="beaconGlow" x="-50%" y="-50%" width="200%" height="200%">
                                            <feDropShadow dx="0" dy="0" stdDeviation="4" flood-color="#f59e0b" flood-opacity="0.8" />
                                        </filter>
                                    </defs>

                                    <!-- BACKGROUND LAYER 1: SULAWESI & INDONESIA WATERMARK SILHOUETTE -->
                                    <g opacity="0.32" class="pointer-events-none">
                                        <!-- Stylized Sulawesi Peninsula Outline Behind Kolaka Utara -->
                                        <!-- Northern Peninsula of Sulawesi -->
                                        <path d="M 60 70 Q 90 40 180 30 Q 230 45 220 75 Q 180 80 140 85 Z" fill="#e2e8f0" stroke="#cbd5e1" stroke-width="1.5" />
                                        <!-- Central Sulawesi -->
                                        <path d="M 80 120 Q 140 110 180 130 Q 190 170 150 180 Q 100 170 80 120 Z" fill="#e2e8f0" stroke="#cbd5e1" stroke-width="1.5" />
                                        <!-- South Sulawesi Peninsula -->
                                        <path d="M 50 240 Q 90 220 100 280 Q 90 380 60 410 Q 40 370 45 290 Z" fill="#e2e8f0" stroke="#cbd5e1" stroke-width="1.5" />
                                        <!-- Southeast Sulawesi (Sulawesi Tenggara) Base -->
                                        <path d="M 170 260 Q 240 270 290 330 Q 280 400 230 430 Q 170 410 160 330 Z" fill="#d1fae5" stroke="#a7f3d0" stroke-width="1.5" />
                                        <!-- Teluk Bone Water Indicator -->
                                        <text x="45" y="310" fill="#94a3b8" font-size="11" font-weight="700" letter-spacing="2" transform="rotate(-75 45 310)" opacity="0.7">TELUK BONE</text>
                                    </g>

                                    <!-- BACKGROUND LAYER 2: SEA CONTOURS & COASTLINE GLOW -->
                                    <g opacity="0.45" stroke="#38bdf8" stroke-width="1" stroke-dasharray="3,3" fill="none">
                                        <path d="M 140 80 Q 95 190 85 300 Q 80 370 125 435" />
                                        <path d="M 125 90 Q 80 195 70 305 Q 65 375 110 445" />
                                    </g>

                                    <!-- MAIN FOREGROUND LAYER: 15 KECAMATAN POLYGONS (OFFICIAL GIS BOUNDARIES) -->
                                    <g filter="url(#mapShadow)" class="cursor-pointer">
                                        <!-- Lasusua -->
                                        <path id="heroKec_Lasusua" d="M133.4,320.2 L182.7,331.3 L209.4,329.2 L219.5,335.7 L189.4,353.9 L148.5,370.5 L145.3,369.3 L148.1,375.2 L145.9,381.2 L140.2,378.8 L136.3,369.1 L125.2,361.9 L122.8,357.8 L127.2,358.7 L115.5,344 L112.7,332.1 L111.5,322 L133.4,320.2 Z" fill="#059669" stroke="#facc15" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Lasusua')">
                                            <title>Lasusua - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Pakue -->
                                        <path id="heroKec_Pakue" d="M190.1,216.1 L235.2,244.4 L226.9,254.2 L223.1,252.9 L222.1,264.2 L208.2,261.8 L176.2,242.3 L170.7,247.2 L165,236.5 L169.4,234.2 L173.3,221.5 L180.6,216.9 L186.8,219.9 L190.1,216.1 Z" fill="#0f172a" stroke="#93c5fd" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Pakue')">
                                            <title>Pakue - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Batu Putih -->
                                        <path id="heroKec_Batu Putih" d="M178.5,152.3 L178,152 L178.1,151.7 L178.5,152 L178.5,152.3 Z M182.6,148.6 L182.7,148.6 L182.8,148.7 L182.6,148.7 L182.6,148.6 Z M189.8,135.7 L189.4,135.6 L189.5,135.5 L189.8,135.6 L189.8,135.7 Z M186.3,132.7 L186.2,133.3 L185.7,133.3 L185.7,133 L186.3,132.7 Z M186.5,125.7 L186.3,125.5 L186.4,125.3 L186.6,125.5 L186.5,125.7 Z M186.1,125 L186,125 L186,124.9 L186.1,125 L186.1,125 Z M186.3,124.1 L194.2,132.3 L203.1,133.1 L201.2,151.9 L209.6,153.7 L209.1,159.4 L214.9,159.5 L210.7,167.4 L213.2,169.4 L244,174.5 L251.4,181.9 L286.3,198.7 L330,202.3 L329.3,218.3 L278.5,210.2 L217.1,183.5 L183.7,173.9 L184,163.1 L179,159.8 L178.2,154.4 L183.1,149.1 L186.2,154.5 L189.6,152.8 L190.6,143.8 L196,146.3 L196.7,139 L189.7,139.6 L191.7,133.1 L187,133.9 L187.6,126.2 L186.3,124.1 Z" fill="#0d9488" stroke="#99f6e4" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Batu Putih')">
                                            <title>Batu Putih - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Rante Angin -->
                                        <path id="heroKec_Rante Angin" d="M225.2,348.2 L231.1,353.9 L216.1,359.7 L211.7,367 L205.7,369.1 L189.5,384.6 L183.6,384.1 L180,394.2 L169.3,403.5 L156.4,389.5 L167.2,377 L180.4,375.5 L220.9,347.5 L225.2,348.2 Z" fill="#047857" stroke="#6ee7b7" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Rante Angin')">
                                            <title>Rante Angin - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Kodeoha -->
                                        <path id="heroKec_Kodeoha" d="M140.7,268.7 L143.6,272.4 L141.8,276.2 L147,280.1 L217.4,316.7 L209.1,321.9 L146.5,306.4 L121.5,288.7 L140.7,268.7 Z" fill="#047857" stroke="#6ee7b7" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Kodeoha')">
                                            <title>Kodeoha - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Ngapa -->
                                        <path id="heroKec_Ngapa" d="M176.6,243.1 L208.2,261.8 L222.1,264.2 L219.8,266.4 L222.3,270.7 L215.9,280.8 L213.1,281 L213.7,290.2 L208.7,298.4 L221.1,307.9 L217.7,315.7 L188.7,303.8 L169,291.6 L167.9,281.6 L155.1,262.8 L164.5,250 L174.5,252.3 L174.6,249.3 L170.4,247.7 L176.6,243.1 Z" fill="#0284c7" stroke="#7dd3fc" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Ngapa')">
                                            <title>Ngapa - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Wawo -->
                                        <path id="heroKec_Wawo" d="M230,353.9 L252.2,372.1 L258.7,393 L212.6,413.1 L201,426.9 L193.6,415.1 L169.3,403.5 L180,394.2 L183.6,384.1 L189.5,384.6 L205.7,369.1 L211.7,367 L216.1,359.7 L230,353.9 Z" fill="#0284c7" stroke="#7dd3fc" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Wawo')">
                                            <title>Wawo - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Lambai -->
                                        <path id="heroKec_Lambai" d="M222.2,346.8 L181.1,375.1 L167.2,377 L156.3,389.3 L145.9,381.2 L148.1,375.2 L145.3,369.3 L148.5,370.5 L189.4,353.9 L219.4,336.4 L222.2,346.8 Z" fill="#0b2545" stroke="#93c5fd" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Lambai')">
                                            <title>Lambai - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Watunohu -->
                                        <path id="heroKec_Watunohu" d="M166.3,235.5 L166.5,240.2 L174.5,252.3 L164.5,250 L155.2,262.8 L153,259.8 L145.4,260.9 L144.8,252.6 L150.9,241.9 L166.3,235.5 Z" fill="#0d9488" stroke="#99f6e4" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Watunohu')">
                                            <title>Watunohu - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Pakue Tengah -->
                                        <path id="heroKec_Pakue Tengah" d="M199.3,190.3 L235.5,207.7 L268.9,227.5 L249.9,227.8 L246.4,238.1 L235.2,244.4 L192.1,216.4 L184.8,215.5 L184.5,191.9 L199.3,190.3 Z" fill="#0284c7" stroke="#7dd3fc" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Pakue Tengah')">
                                            <title>Pakue Tengah - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Pakue Utara -->
                                        <path id="heroKec_Pakue Utara" d="M192.2,174.7 L266.8,206.5 L291.8,213.7 L329.3,218.3 L327.2,246.2 L308.2,235.8 L291.4,235.9 L275.1,230.5 L199.8,190.3 L184.5,191.9 L178.8,180.7 L183.7,173.9 L192.2,174.7 Z" fill="#047857" stroke="#6ee7b7" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Pakue Utara')">
                                            <title>Pakue Utara - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Porehu -->
                                        <path id="heroKec_Porehu" d="M243.6,90.6 L248.4,90.2 L250.2,96.7 L255.9,99 L258.4,104.4 L275.8,112 L276.9,118.8 L288.5,130.3 L300.4,135.5 L303.6,144.8 L300.3,160.1 L309.7,170.2 L310.8,177.7 L320,182.4 L321.8,195.3 L330,202.3 L286.3,198.7 L251.4,181.9 L244,174.5 L210.7,167.4 L215.5,160.5 L208.8,159.2 L208.8,153.2 L201.2,151.9 L203.1,133.1 L220.2,134.7 L223.7,133.1 L221,126.7 L229.9,128.2 L242.7,85 L243.6,90.6 Z" fill="#0b2545" stroke="#93c5fd" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Porehu')">
                                            <title>Porehu - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Katoi -->
                                        <path id="heroKec_Katoi" d="M121.6,289 L146.5,306.4 L209.1,321.9 L209.4,329.2 L189,332 L134.2,320.1 L111.5,322 L110,305.2 L121.5,295.4 L121.6,289 Z" fill="#0d9488" stroke="#99f6e4" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Katoi')">
                                            <title>Katoi - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Tiwu -->
                                        <path id="heroKec_Tiwu" d="M152.7,259.8 L167.9,281.6 L169,291.6 L141.8,276.2 L143.6,272.4 L140.6,268.5 L144.9,267.3 L146.2,260.6 L152.7,259.8 Z" fill="#059669" stroke="#a7f3d0" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Tiwu')">
                                            <title>Tiwu - Kabupaten Kolaka Utara</title>
                                        </path>
                                        <!-- Tolala -->
                                        <path id="heroKec_Tolala" d="M190.7,127 L190.6,127 L190.6,126.9 L190.7,126.9 L190.7,127 Z M188.6,125.4 L188.3,125.3 L188.4,125 L188.6,125.2 L188.6,125.4 Z M188.6,124 L188.4,123.9 L188.8,123.8 L188.8,123.9 L188.6,124 Z M186.8,123.6 L186.8,123.5 L186.8,123.5 L186.9,123.6 L186.8,123.6 Z M149,67.3 L145.2,69.1 L144.2,67.6 L147.9,66.2 L149,67.3 Z M199.6,58.2 L211.7,61.5 L220.4,68.2 L225,81.3 L233.2,79.5 L238.8,85.3 L242.7,85 L229.9,128.2 L221,126.7 L223.7,133.1 L220.2,134.7 L194.2,132.3 L190.6,129.9 L186.6,124.7 L192.8,129.5 L196.4,110.8 L191.7,104.4 L192.3,100.2 L189.4,101.2 L190,85.1 L185.4,86 L186.2,93.2 L179.3,88.4 L175.9,66.3 L172,82.4 L167.8,77.9 L158.3,79 L165.4,88.9 L157.8,79.7 L159.5,74.4 L169.7,69.9 L173.8,60.2 L187.8,58.3 L193.2,53.1 L199.6,58.2 Z" fill="#059669" stroke="#a7f3d0" stroke-width="1.2" class="transition-all duration-300 hover:opacity-90 hover:brightness-110" onclick="window.focusKecamatanFromHero('Tolala')">
                                            <title>Tolala - Kabupaten Kolaka Utara</title>
                                        </path>
                                    </g>

                                    <!-- CAPITAL BEACON: LASUSUA -->
                                    <g transform="translate(147.1, 350.6)">
                                        <!-- Concentric Ping Waves -->
                                        <circle r="14" fill="#10b981" opacity="0.3" class="animate-ping" />
                                        <circle r="7" fill="#f59e0b" opacity="0.5" />
                                        <!-- Core Marker -->
                                        <circle r="5.5" fill="#f59e0b" stroke="#ffffff" stroke-width="2" filter="url(#beaconGlow)" />
                                        <circle r="2" fill="#ffffff" />
                                        
                                        <!-- Capital Tag Label Line -->
                                        <line x1="6" y1="-4" x2="35" y2="-22" stroke="#0b2545" stroke-width="1.5" stroke-linecap="round" />
                                        <circle cx="35" cy="-22" r="2.5" fill="#0b2545" />
                                        <g transform="translate(40, -32)">
                                            <rect x="0" y="0" width="112" height="22" rx="11" fill="#0b2545" />
                                            <circle cx="10" cy="11" r="3.5" fill="#f59e0b" />
                                            <text x="20" y="14.5" fill="#ffffff" font-size="9.5" font-weight="800" font-family="'Plus Jakarta Sans', sans-serif">Lasusua (Ibukota)</text>
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

                            <!-- Footer Mini Bar Inside Card: Click prompt -->
                            <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between text-[10px] text-slate-400">
                                <span class="flex items-center gap-1 text-[#059669] font-bold">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                    <span>Peta Vektor Spasial 15 Kecamatan</span>
                                </span>
                                <span class="font-mono text-slate-500">Podes 2024–2025</span>
                            </div>
                        </div>

                        <!-- FLOATING GLASSMORPHIC BADGES (MATCHING EXACT THEME FROM USER SCREENSHOT) -->
                        <!-- Badge 1: 100% Spasial Podes (Top Right) -->
                        <div class="absolute -top-3.5 -right-3 sm:-right-4 z-30 bg-white/95 backdrop-blur-md border border-emerald-200 px-3.5 py-1.5 rounded-full shadow-[0_8px_20px_rgba(5,150,105,0.15)] flex items-center gap-2 text-xs font-bold text-[#0b2545] animate-float-slow">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>100% Spasial Podes</span>
                        </div>

                        <!-- Badge 2: 133 Desa Madani (Bottom Left) -->
                        <div class="absolute -bottom-3.5 -left-3 sm:-left-4 z-30 bg-white/95 backdrop-blur-md border border-blue-200 px-3.5 py-1.5 rounded-full shadow-[0_8px_20px_rgba(2,132,199,0.15)] flex items-center gap-2 text-xs font-bold text-[#0b2545] animate-float-delayed">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#005ea6]"></span>
                            <span>133 Desa Madani</span>
                        </div>

                        <!-- Badge 3: Kolaka Utara Sejahtera (Middle Right) -->
                        <div class="absolute top-1/2 -right-5 sm:-right-8 z-30 bg-white/95 backdrop-blur-md border border-amber-200 px-3 py-1 rounded-full shadow-[0_8px_20px_rgba(245,158,11,0.18)] flex items-center gap-1.5 text-[11px] font-bold text-amber-900 animate-float-reverse">
                            <span class="text-amber-500">★</span>
                            <span>Kolaka Utara Sejahtera</span>
                        </div>

                        <!-- Badge 4: 15 Kecamatan Spasial (Top Left) -->
                        <div class="absolute top-6 -left-4 sm:-left-6 z-30 hidden sm:flex bg-white/95 backdrop-blur-md border border-slate-200 px-3 py-1 rounded-full shadow-md items-center gap-1.5 text-[11px] font-bold text-slate-700 animate-float-slow">
                            <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            <span>15 Kecamatan Spasial</span>
                        </div>
                    </div>
                </div>

            <!-- CAPAIAN PENDATAAN AGREGAT DESA MADANI (Clean White Card) -->
            <div class="mt-12 bg-white rounded-2xl shadow-sm border border-slate-200/90 p-5 text-slate-800">
                <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#059669]"></span>
                        <h3 class="text-xs sm:text-sm font-extrabold text-[#0b2545] uppercase tracking-wider">Capaian Agregat Desa Madani Kabupaten Kolaka Utara</h3>
                    </div>
                    <span class="text-xs font-semibold text-[#059669] bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">Data Podes BPS 2024–2025</span>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 text-center">
                    <div class="p-3 bg-slate-50/80 rounded-xl border border-slate-100 hover:border-[#059669] hover:-translate-y-1 transition duration-300">
                        <span class="text-[10px] font-bold text-slate-500 uppercase">Kecamatan</span>
                        <div class="text-2xl font-black text-[#0b2545] mt-0.5">15</div>
                        <span class="text-[10px] text-emerald-700 font-semibold">100% Tercakup</span>
                    </div>
                    <div class="p-3 bg-slate-50/80 rounded-xl border border-slate-100 hover:border-[#059669] hover:-translate-y-1 transition duration-300">
                        <span class="text-[10px] font-bold text-slate-500 uppercase">Desa/Kelurahan</span>
                        <div class="text-2xl font-black text-[#0b2545] mt-0.5">133</div>
                        <span class="text-[10px] text-emerald-700 font-semibold">Terdaftar Lengkap</span>
                    </div>
                    <div class="p-3 bg-slate-50/80 rounded-xl border border-slate-100 hover:border-[#059669] hover:-translate-y-1 transition duration-300">
                        <span class="text-[10px] font-bold text-slate-500 uppercase">Penduduk Terdata</span>
                        <div class="text-2xl font-black text-[#059669] mt-0.5">137.940</div>
                        <span class="text-[10px] text-slate-500 font-semibold">Jiwa Terverifikasi</span>
                    </div>
                    <div class="p-3 bg-slate-50/80 rounded-xl border border-slate-100 hover:border-[#059669] hover:-translate-y-1 transition duration-300">
                        <span class="text-[10px] font-bold text-slate-500 uppercase">Keluarga (KK)</span>
                        <div class="text-2xl font-black text-[#0b2545] mt-0.5">37.013</div>
                        <span class="text-[10px] text-slate-600 font-semibold">Profil Keluarga</span>
                    </div>
                    <div class="p-3 bg-slate-50/80 rounded-xl border border-slate-100 hover:border-[#059669] hover:-translate-y-1 transition duration-300">
                        <span class="text-[10px] font-bold text-slate-500 uppercase">Cakupan Spasial</span>
                        <div class="text-2xl font-black text-emerald-600 mt-0.5">100%</div>
                        <span class="text-[10px] text-emerald-600 font-semibold">Terpetakan WebGIS</span>
                    </div>
                    <div class="p-3 bg-slate-50/80 rounded-xl border border-slate-100 hover:border-[#059669] hover:-translate-y-1 transition duration-300">
                        <span class="text-[10px] font-bold text-slate-500 uppercase">Sentra Kakao</span>
                        <div class="text-2xl font-black text-amber-600 mt-0.5">82%</div>
                        <span class="text-[10px] text-amber-700 font-semibold">109 Desa Perkebunan</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FLOATING PUSAT BANTUAN WIDGET -->
    <div class="fixed bottom-6 right-6 z-40 flex items-center gap-2.5 bg-[#0b2545] text-white pl-4 pr-1.5 py-1.5 rounded-full shadow-2xl border border-white/20 hover:scale-105 hover:shadow-emerald-900/30 transition cursor-pointer group" onclick="showToast('Pusat Bantuan Desa Madani: Hubungi Tim BPS Kabupaten Kolaka Utara via kontak layanan di footer.')">
        <span class="text-[11px] font-bold leading-tight text-right">Pusat<br>Bantuan</span>
        <div class="w-9 h-9 rounded-full bg-[#059669] group-hover:bg-[#047857] text-white flex items-center justify-center shadow-md transition">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zm-4 0h-2v2h2V9z" clip-rule="evenodd"/></svg>
        </div>
    </div>

    <!-- FILTER & CASCADING TOOLBAR (Clean Light Minimalist Design) -->
    <div class="w-full bg-slate-50 border-b border-slate-200/90 shadow-2xs">
        <div class="max-w-[1720px] mx-auto px-4 lg:px-10 py-3 flex flex-wrap items-center justify-between gap-3 text-xs">
            <div class="flex items-center gap-2 flex-wrap">
                <!-- Filter 1: Kecamatan -->
                <div class="flex items-center gap-1.5 bg-white text-slate-800 px-3 py-1.5 rounded-lg shadow-2xs border border-slate-200 font-medium">
                    <svg class="w-4 h-4 text-[#1b3252]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span class="text-slate-500 font-semibold">Kecamatan:</span>
                    <select id="selectKecamatan" class="font-bold text-[#1b3252] bg-transparent outline-none cursor-pointer pr-1">
                        <option value="">Semua Kecamatan (15 Kec)</option>
                    </select>
                </div>

                <!-- Filter 2: Desa -->
                <div class="flex items-center gap-1.5 bg-white text-slate-800 px-3 py-1.5 rounded-lg shadow-2xs border border-slate-200 font-medium">
                    <svg class="w-4 h-4 text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span class="text-slate-500 font-semibold">Desa:</span>
                    <select id="selectDesa" class="font-bold text-slate-800 bg-transparent outline-none cursor-pointer pr-1">
                        <option value="">Pilih Desa / Semua</option>
                    </select>
                </div>

                <!-- Filter 3: Sektor -->
                <div class="flex items-center gap-1.5 bg-white text-slate-800 px-3 py-1.5 rounded-lg shadow-2xs border border-slate-200 font-medium">
                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    <span class="text-slate-500 font-semibold">Sektor:</span>
                    <select id="selectSektor" class="font-bold text-slate-800 bg-transparent outline-none cursor-pointer pr-1">
                        <option value="all">Semua Sektor Potensi</option>
                        <option value="perkebunan">Perkebunan Kakao & Cengkeh</option>
                        <option value="perikanan">Perikanan & Kelautan</option>
                        <option value="pertanian">Pertanian Tanaman Pangan</option>
                        <option value="pariwisata">Pariwisata & Ekowisata</option>
                    </select>
                </div>

                <!-- Reset Filter -->
                <button id="btnResetFilter" class="bg-[#1b3252] hover:bg-[#122237] text-white font-bold px-3 py-1.5 rounded-lg shadow-2xs flex items-center gap-1.5 transition">
                    <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    <span>Reset</span>
                </button>
            </div>

            <!-- Active Status Pill -->
            <div id="filterActiveStatusPill" class="text-slate-700 text-xs bg-white px-3.5 py-1.5 rounded-full border border-slate-200 font-medium shadow-2xs">
                Wilayah: <b class="text-[#059669]" id="filterStatusText">Kabupaten Kolaka Utara (15 Kecamatan, 133 Desa)</b>
            </div>
        </div>

        <!-- QUICK THEMATIC FILTER PILLS -->
        <div class="max-w-[1720px] mx-auto px-4 lg:px-10 py-2 border-t border-slate-200/60 flex items-center gap-2 overflow-x-auto text-[11px]">
            <span class="text-slate-500 font-bold shrink-0">Tematik Cepat:</span>
            <button class="btn-quick-filter px-3 py-1 rounded-full bg-[#1b3252] text-white font-bold transition shrink-0 flex items-center gap-1.5 shadow-xs active-filter" data-category="all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Semua Wilayah</span>
            </button>
            <button class="btn-quick-filter px-3 py-1 rounded-full bg-white hover:bg-slate-100 text-slate-700 font-semibold border border-slate-200 transition shrink-0 flex items-center gap-1.5" data-category="mandiri">
                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <span>Desa Mandiri</span>
            </button>
            <button class="btn-quick-filter px-3 py-1 rounded-full bg-white hover:bg-slate-100 text-slate-700 font-semibold border border-slate-200 transition shrink-0 flex items-center gap-1.5" data-category="perkebunan">
                <svg class="w-3.5 h-3.5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <span>Sentra Kakao & Cengkeh</span>
            </button>
            <button class="btn-quick-filter px-3 py-1 rounded-full bg-white hover:bg-slate-100 text-slate-700 font-semibold border border-slate-200 transition shrink-0 flex items-center gap-1.5" data-category="perikanan">
                <svg class="w-3.5 h-3.5 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2 12c4-4 10-4 14 0 2-2 4-2 6-1-1 3-1 7 1 9-2 1-4 1-6-1-4 4-10 4-14 0l3-3.5L2 12z"/><circle cx="17" cy="11" r="1" fill="currentColor"/></svg>
                <span>Pesisir Teluk Bone</span>
            </button>
            <button class="btn-quick-filter px-3 py-1 rounded-full bg-white hover:bg-slate-100 text-slate-700 font-semibold border border-slate-200 transition shrink-0 flex items-center gap-1.5" data-category="pariwisata">
                <svg class="w-3.5 h-3.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                <span>Destinasi Wisata</span>
            </button>
            <button class="btn-quick-filter px-3 py-1 rounded-full bg-white hover:bg-slate-100 text-slate-700 font-semibold border border-slate-200 transition shrink-0 flex items-center gap-1.5" data-category="pertanian">
                <svg class="w-3.5 h-3.5 text-yellow-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19V5m0 0a4 4 0 014 4v1a4 4 0 01-4 4m0-9a4 4 0 00-4 4v1a4 4 0 004 4m0 5a4 4 0 014-4h1a4 4 0 010 8h-1a4 4 0 01-4-4zm0 0a4 4 0 00-4-4H7a4 4 0 000 8h1a4 4 0 004-4z"/></svg>
                <span>Lumbung Pangan</span>
            </button>
        </div>
    </div>

<!-- MAIN BODY CONTAINER -->
    <main class="flex-1 w-full px-4 lg:px-8 py-6 max-w-[1720px] mx-auto space-y-10">

        
<!-- SECTION: POTENSI UNGGULAN DAERAH KABUPATEN KOLAKA UTARA (PODES BPS 2024-2025) -->
        <section id="sectionPotensi" class="scroll-mt-24 space-y-4">
            <div class="flex flex-wrap items-center justify-between gap-3 pb-3 border-b border-slate-200">
                <div>
                    <div class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-800 bg-amber-50 px-3 py-1 rounded-full border border-amber-200 mb-1">
                        <svg class="w-3.5 h-3.5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>Potensi Sektor Paling Menonjol • Podes BPS 2024–2025</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#0b2545] tracking-tight">
                        Potensi Unggulan Daerah Kabupaten Kolaka Utara
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500">
                        Sorotan sektor komoditas dan karakteristik ekonomi paling dominan dari 133 desa di Kolaka Utara
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-semibold text-slate-600 bg-slate-100 px-3 py-1.5 rounded-lg border border-slate-200">
                        15 Kecamatan • 133 Desa/Kelurahan
                    </span>
                    <button onclick="applySektorFilter('all')" class="text-xs font-bold text-[#059669] hover:text-[#047857] bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-lg border border-emerald-200 transition">
                        Semua Sektor
                    </button>
                </div>
            </div>

            <!-- 5 KARTU POTENSI UNGGULAN DAERAH (PODES 2024-2025) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">

            <!-- KARTU 1: PERKEBUNAN KAKAO & CENGKEH (PRIMADONA KOLAKA UTARA) -->
            <div id="cardSektorPerkebunan" class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md p-5 flex flex-col justify-between transition border-t-4 border-t-[#ea580c] cursor-pointer" onclick="applySektorFilter('perkebunan')">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-10 h-10 rounded-xl bg-orange-50 text-[#ea580c] flex items-center justify-center shadow-inner">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </span>
                        <span class="text-[10px] font-bold text-orange-700 bg-orange-100/70 px-2.5 py-0.5 rounded-full">Komoditas #1</span>
                    </div>

                    <h3 class="font-bold text-slate-800 text-sm">Sektor Perkebunan Kakao</h3>
                    <p class="text-[11px] text-slate-500 mb-3">Sentra Kakao terbesar di Sulawesi Tenggara</p>

                    <div class="space-y-2.5">
                        <div class="flex items-baseline justify-between">
                            <span class="text-xs text-slate-500">Desa Sentra Kakao:</span>
                            <span id="statDesaKakaoCount" class="text-xl font-extrabold text-slate-900 tabular-nums">109 Desa <span class="text-xs font-semibold text-emerald-600">(82%)</span></span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                            <div class="bg-orange-500 h-2 rounded-full" style="width: 82%;"></div>
                        </div>
                        <div class="pt-2 border-t border-slate-100 grid grid-cols-2 gap-2 text-xs">
                            <div>
                                <span class="text-[10px] text-slate-400">Luas Tanam:</span>
                                <div class="font-bold text-slate-800 tabular-nums">64.280 Ha</div>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400">Produksi/Tahun:</span>
                                <div class="font-bold text-slate-800 tabular-nums">41.250 Ton</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pt-2.5 border-t border-slate-100 text-[10px] text-slate-400 flex items-center justify-between">
                    <span>Klik untuk filter sektor ini</span>
                    <span class="font-semibold text-orange-600">Podes 2024</span>
                </div>
            </div>

            <!-- KARTU 2: PERIKANAN & KELAUTAN TELUK BONE -->
            <div id="cardSektorPerikanan" class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md p-5 flex flex-col justify-between transition border-t-4 border-t-[#005ea6] cursor-pointer" onclick="applySektorFilter('perikanan')">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-10 h-10 rounded-xl bg-blue-50 text-[#005ea6] flex items-center justify-center shadow-inner">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2 12c4-4 10-4 14 0 2-2 4-2 6-1-1 3-1 7 1 9-2 1-4 1-6-1-4 4-10 4-14 0l3-3.5L2 12z"/><circle cx="17" cy="11" r="1" fill="currentColor"/></svg>
                        </span>
                        <span class="text-[10px] font-bold text-blue-700 bg-blue-100/70 px-2.5 py-0.5 rounded-full">Pesisir Teluk Bone</span>
                    </div>

                    <h3 class="font-bold text-slate-800 text-sm">Perikanan & Kelautan</h3>
                    <p class="text-[11px] text-slate-500 mb-3">Potensi tangkap laut & budidaya tambak</p>

                    <div class="space-y-2.5">
                        <div class="flex items-baseline justify-between">
                            <span class="text-xs text-slate-500">Desa Pesisir Nelayan:</span>
                            <span id="statDesaPesisirCount" class="text-xl font-extrabold text-slate-900 tabular-nums">48 Desa <span class="text-xs font-semibold text-blue-600">(36%)</span></span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                            <div class="bg-[#005ea6] h-2 rounded-full" style="width: 36%;"></div>
                        </div>
                        <div class="pt-2 border-t border-slate-100 grid grid-cols-2 gap-2 text-xs">
                            <div>
                                <span class="text-[10px] text-slate-400">Luas Tambak:</span>
                                <div class="font-bold text-slate-800 tabular-nums">4.850 Ha</div>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400">Hasil Tangkap:</span>
                                <div class="font-bold text-slate-800 tabular-nums">26.400 Ton</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pt-2.5 border-t border-slate-100 text-[10px] text-slate-400 flex items-center justify-between">
                    <span>Klik untuk filter sektor ini</span>
                    <span class="font-semibold text-blue-600">Podes 2024</span>
                </div>
            </div>

            <!-- KARTU 3: PARIWISATA & EKOWISATA DESA -->
            <div id="cardSektorPariwisata" class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md p-5 flex flex-col justify-between transition border-t-4 border-t-[#16a34a] cursor-pointer" onclick="applySektorFilter('pariwisata')">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-10 h-10 rounded-xl bg-emerald-50 text-[#16a34a] flex items-center justify-center shadow-inner">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </span>
                        <span class="text-[10px] font-bold text-emerald-700 bg-emerald-100/70 px-2.5 py-0.5 rounded-full">Destinasi Wisata</span>
                    </div>

                    <h3 class="font-bold text-slate-800 text-sm">Pariwisata & Ekowisata</h3>
                    <p class="text-[11px] text-slate-500 mb-3">Danau Biru, Pantai Berova, Air Terjun Sarambu</p>

                    <div class="space-y-2.5">
                        <div class="flex items-baseline justify-between">
                            <span class="text-xs text-slate-500">Objek Wisata (ODTW):</span>
                            <span class="text-xl font-extrabold text-slate-900 tabular-nums">32 Objek <span class="text-xs font-semibold text-emerald-600">Aktif</span></span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                            <div class="bg-emerald-500 h-2 rounded-full" style="width: 75%;"></div>
                        </div>
                        <div class="pt-2 border-t border-slate-100 grid grid-cols-2 gap-2 text-xs">
                            <div>
                                <span class="text-[10px] text-slate-400">Wisata Bahari:</span>
                                <div class="font-bold text-slate-800 tabular-nums">18 Lokasi</div>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400">Wisata Alam/Air:</span>
                                <div class="font-bold text-slate-800 tabular-nums">14 Lokasi</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pt-2.5 border-t border-slate-100 text-[10px] text-slate-400 flex items-center justify-between">
                    <span>Klik untuk filter sektor ini</span>
                    <span class="font-semibold text-emerald-600">Podes 2024</span>
                </div>
            </div>

            <!-- KARTU 4: KEMANDIRIAN & STATUS DESA (IPD PODES) -->
            <div id="cardSektorMandiri" class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md p-5 flex flex-col justify-between transition border-t-4 border-t-[#0284c7] cursor-pointer" onclick="applySektorFilter('mandiri')">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-10 h-10 rounded-xl bg-sky-50 text-[#0284c7] flex items-center justify-center shadow-inner">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </span>
                        <span class="text-[10px] font-bold text-sky-700 bg-sky-100/70 px-2.5 py-0.5 rounded-full">Indeks IPD BPS</span>
                    </div>

                    <h3 class="font-bold text-slate-800 text-sm">Klasifikasi Status Desa</h3>
                    <p class="text-[11px] text-slate-500 mb-3">Indeks Perkembangan Desa Podes 2024</p>

                    <div class="space-y-1.5 text-xs">
                        <div class="flex justify-between items-center">
                            <span class="flex items-center gap-1.5 text-slate-600">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span> Desa Mandiri
                            </span>
                            <span class="font-bold text-slate-900 tabular-nums">28 Desa (21,1%)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="flex items-center gap-1.5 text-slate-600">
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span> Desa Maju
                            </span>
                            <span class="font-bold text-slate-900 tabular-nums">64 Desa (48,1%)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="flex items-center gap-1.5 text-slate-600">
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span> Desa Berkembang
                            </span>
                            <span class="font-bold text-slate-900 tabular-nums">38 Desa (28,6%)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="flex items-center gap-1.5 text-slate-600">
                                <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span> Desa Tertinggal
                            </span>
                            <span class="font-bold text-slate-900 tabular-nums">3 Desa (2,2%)</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pt-2.5 border-t border-slate-100 text-[10px] text-slate-400 flex items-center justify-between">
                    <span>Total: 133 Desa/Kelurahan</span>
                    <span class="font-semibold text-blue-600">BPS Kolut</span>
                </div>
            </div>

        </div>

        
<!-- SECTION: MADANI WEBGIS & PETA TEMATIK SPASIAL INTERAKTIF -->
        <div class="flex flex-wrap items-center justify-between gap-3 pb-2 border-b border-slate-200 pt-2">
            <div>
                <div class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-800 bg-emerald-50 px-3 py-0.5 rounded-full border border-emerald-200 mb-1">
                    <svg class="w-3.5 h-3.5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    <span>Madani WebGIS Engine • Geospasial Tematik</span>
                </div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-[#0b2545] tracking-tight">Peta Spasial & Potensi Desa Madani Kolaka Utara</h2>
            </div>
            <div class="flex items-center gap-2 text-xs">
                <span class="text-slate-500 hidden sm:inline font-medium">15 Kecamatan • Citra Ortofoto & Poligon Spasial</span>
                <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-bold text-[11px]">Resolusi Tinggi Podes</span>
            </div>
        </div>

        
<!-- ROW 2: PETA INTERAKTIF KABUPATEN KOLAKA UTARA + TITIK SEBARAN DESA + ANALITIK PODES -->
        <div id="sectionPeta" class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start scroll-mt-24">

            <!-- PETA INTERAKTIF LEAFLET (7 / 12 COLS) -->
            <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 shadow-sm p-5 space-y-4">
                <!-- Toolbar Peta Atas -->
                <div class="flex items-center justify-between flex-wrap gap-2 pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-lg bg-blue-50 text-[#005ea6] flex items-center justify-center font-bold shadow-inner">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        </span>
                        <div>
                            <h2 class="font-bold text-slate-800 text-sm">Peta Sebaran Potensi & Titik Desa Interaktif</h2>
                            <p class="text-[11px] text-slate-500">Klik wilayah kecamatan atau klik ikon pin desa untuk rincian data</p>
                        </div>
                    </div>

                    <!-- Action buttons -->
                    <div class="flex items-center gap-1.5 text-xs">
                        <button id="btnDownloadGeoJSON" class="p-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-600 transition" title="Unduh GeoJSON">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        </button>
                        <button id="btnPickCoordsOnMap" class="px-2.5 py-1 font-semibold rounded-lg border border-amber-300 bg-amber-50 hover:bg-amber-100 text-amber-900 flex items-center gap-1 transition shadow-xs" title="Klik titik spasial langsung di peta untuk input data desa">
                            <svg class="w-3.5 h-3.5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>📍 Ambil Titik Peta</span>
                        </button>
                        <button id="btnResetMapView" class="px-2.5 py-1 font-semibold rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-700 flex items-center gap-1 transition">
                            <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            <span>Reset Peta</span>
                        </button>
                        <button id="btnFullscreenMap" class="p-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-600 transition" title="Layar Penuh">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                        </button>
                    </div>
                </div>

                <!-- FILTER PIN & TOGGLE LAYER PETA (Pilihan Rapi / Bersih) -->
                <div class="flex flex-wrap items-center justify-between gap-2.5 p-2.5 bg-slate-50 rounded-xl border border-slate-200/80 text-xs">
                    <!-- Segmented Mode Display Toggle: Rapi vs Semua Pin -->
                    <div class="flex items-center gap-1.5 bg-white p-1 rounded-lg border border-slate-200 font-medium">
                        <span class="text-slate-500 text-[11px] px-1.5 font-semibold">Tampilan Pin:</span>
                        <button id="btnPinModeClean" class="px-2.5 py-1 rounded-md bg-[#005ea6] text-white font-bold text-[11px] transition shadow-xs">
                            Fokus Rapi
                        </button>
                        <button id="btnPinModeAll" class="px-2.5 py-1 rounded-md bg-transparent text-slate-600 hover:text-slate-900 font-medium text-[11px] transition">
                            Semua Pin
                        </button>
                    </div>

                    <!-- Sector Pin Filter Chips -->
                    <div class="flex items-center gap-1 flex-wrap">
                        <span class="text-slate-500 font-semibold text-[11px]">Filter Sektor:</span>
                        <button class="btn-pin-filter px-2 py-0.5 rounded-md bg-[#005ea6] text-white font-bold text-[11px] shadow-xs" data-pin-type="all">Semua</button>
                        <button class="btn-pin-filter px-2 py-0.5 rounded-md bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 font-medium text-[11px]" data-pin-type="perkebunan">Kakao</button>
                        <button class="btn-pin-filter px-2 py-0.5 rounded-md bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 font-medium text-[11px]" data-pin-type="perikanan">Perikanan</button>
                        <button class="btn-pin-filter px-2 py-0.5 rounded-md bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 font-medium text-[11px]" data-pin-type="pariwisata">Wisata</button>
                        <button class="btn-pin-filter px-2 py-0.5 rounded-md bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 font-medium text-[11px]" data-pin-type="pertanian">Pangan</button>
                    </div>
                </div>

                <!-- Info Banner Kecamatan Terpilih -->
                <div id="mapKecamatanBanner" class="hidden p-2.5 bg-blue-50 border border-blue-200 rounded-xl flex items-center justify-between text-xs animate-fadeIn">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#005ea6] animate-ping"></span>
                        <span>Fokus Kecamatan: <b id="mapBannerKecName" class="text-[#005ea6] uppercase font-bold">Lasusua</b></span>
                        <span id="mapBannerKecPotensi" class="text-slate-600 font-medium"></span>
                    </div>
                    <button id="btnMapResetToAll" class="text-blue-700 hover:text-blue-900 font-bold underline text-[11px]">
                        Kembali ke Seluruh Kabupaten
                    </button>
                </div>

                <!-- MAP WRAPPER -->
                <div id="mapWrapper" class="relative w-full rounded-xl overflow-hidden border border-slate-200 shadow-inner" style="height: 540px;">
                    <!-- Floating GPS Coordinate Picker Active Banner -->
                    <div id="bannerCoordPickerActive" class="hidden absolute top-4 left-1/2 -translate-x-1/2 z-[1000] bg-slate-950/95 text-white px-5 py-2.5 rounded-full shadow-2xl border-2 border-amber-400 text-xs flex items-center gap-3 backdrop-blur-md animate-pulse">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400 animate-ping shrink-0"></span>
                        <span class="font-bold">🎯 MODE AMBIL TITIK AKTIF: Klik lokasi desa pada peta untuk mengambil titik GPS!</span>
                        <button id="btnCancelCoordPicker" class="bg-red-500 hover:bg-red-600 text-white font-bold px-2.5 py-0.5 rounded-full text-[10px] transition shadow-xs">Batal</button>
                    </div>
                    <div id="map" class="w-full h-full z-10"></div>

                    <!-- Legenda Peta (BPS Blue Palette) -->
                    <div class="absolute bottom-3 right-3 z-20">
                        <div class="bg-white/95 backdrop-blur-sm rounded-xl shadow-lg border border-slate-200 p-2.5 text-xs max-w-[240px]">
                            <button id="btnToggleLegend" class="flex items-center justify-between w-full font-bold text-slate-700 hover:text-[#005ea6]">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-[#005ea6]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                                    <span>Legenda Indeks (IPD)</span>
                                </div>
                                <svg id="iconLegendChevron" class="w-3 h-3 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>

                            <div id="legendItemsContainer" class="mt-2 space-y-1.5 text-[11px] pt-2 border-t border-slate-100">
                                <div class="flex items-center gap-2">
                                    <span class="w-3.5 h-3.5 rounded" style="background-color: #0c4a6e;"></span>
                                    <span>IPD &gt; 80 (Mandiri / Unggulan)</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-3.5 h-3.5 rounded" style="background-color: #0284c7;"></span>
                                    <span>IPD 77 – 80 (Maju Utama)</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-3.5 h-3.5 rounded" style="background-color: #38bdf8;"></span>
                                    <span>IPD 74 – 77 (Maju)</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-3.5 h-3.5 rounded" style="background-color: #7dd3fc;"></span>
                                    <span>IPD 72 – 74 (Berkembang)</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-3.5 h-3.5 rounded" style="background-color: #bae6fd;"></span>
                                    <span>IPD &lt; 72 (Cukup Berkembang)</span>
                                </div>
                                <div class="pt-1.5 border-t border-slate-100 text-[10px] text-slate-500">
                                    <span class="font-bold text-slate-700">Warna Pin:</span> <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 mx-0.5"></span> Mandiri • <span class="inline-block w-2 h-2 rounded-full bg-sky-500 mx-0.5"></span> Maju • <span class="inline-block w-2 h-2 rounded-full bg-amber-500 mx-0.5"></span> Berkembang
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Interactive Hint -->
                    <div class="absolute top-3 left-3 z-20 pointer-events-none">
                        <div class="bg-slate-900/90 backdrop-blur-sm text-white px-3 py-1.5 rounded-lg text-[11px] font-medium shadow-md flex items-center gap-1.5 border border-white/20">
                            <svg class="w-3.5 h-3.5 text-amber-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Klik poligon kecamatan atau pin desa untuk melihat data rincian</span>
                        </div>
                    </div>
                </div>

                <!-- Footer Peta -->
                <div class="flex justify-between items-center text-[10px] text-slate-400 pt-2 border-t border-slate-100">
                    <span>Sumber Spasial: Batas Administrasi BPS Kolaka Utara (7408)</span>
                    <span>Basemap: Esri World Light Gray (Bebas Watermark)</span>
                </div>
            </div>

            
<!-- TABEL & ANALITIK KECAMATAN / DESA (5 / 12 COLS) -->
            <div id="sectionMonografi" class="lg:col-span-5 space-y-4 scroll-mt-24">

                <!-- HIGHLIGHT: PROFIL DESA KHUSUS (DOCK DI WORKSTATION PETA WEBGIS) -->
                <div id="cardProfilDesaSpesifik" class="hidden bg-white rounded-2xl p-5 shadow-sm hover:shadow-md border border-slate-200/90 border-t-4 border-t-emerald-600 animate-fadeIn space-y-4">
                    <div class="flex items-start justify-between gap-3 pb-3 border-b border-slate-100 flex-wrap">
                        <div>
                            <div class="flex items-center gap-1.5 mb-1.5 flex-wrap">
                                <span id="desaBadgeStatus" class="px-2.5 py-0.5 rounded-full text-[11px] font-black bg-emerald-100 text-emerald-800 uppercase tracking-wider">Desa Mandiri</span>
                                <span id="desaSektorBadge" class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-50 text-amber-800 border border-amber-200 flex items-center gap-1">
                                    <span id="desaSektorSvgContainer"></span>
                                    <span id="desaSektorText">Sektor Pariwisata</span>
                                </span>
                                <span id="desaTopografiBadge" class="px-2 py-0.5 rounded-md text-[10px] bg-slate-100 text-slate-600 font-medium">Dataran Rendah / Pesisir</span>
                            </div>
                            <h2 id="desaNamaTitle" class="text-xl font-extrabold text-[#0b2545] leading-tight">
                                Desa Pitulua
                            </h2>
                            <p class="text-xs text-slate-500 mt-0.5">
                                Kecamatan <span id="desaKecamatanName" class="font-bold text-slate-700">Lasusua</span>, Kab. Kolaka Utara
                            </p>
                        </div>

                        <!-- Action buttons -->
                        <div class="flex items-center gap-1.5 text-xs">
                            <button id="btnFocusDesaOnMap" class="bg-blue-50 hover:bg-blue-100 text-[#005ea6] border border-blue-200 font-bold px-2.5 py-1.5 rounded-lg flex items-center gap-1 transition" title="Pusatkan Peta ke Desa Ini">
                                <svg class="w-3.5 h-3.5 text-[#005ea6]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Fokus</span>
                            </button>
                            <button id="btnEditCurrentDesa" class="bg-amber-50 hover:bg-amber-100 text-amber-900 border border-amber-300 font-bold px-2.5 py-1.5 rounded-lg flex items-center gap-1 transition" title="Edit Rincian Data Desa Ini di Portal Admin">
                                <svg class="w-3.5 h-3.5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                <span>Edit</span>
                            </button>
                            <button id="btnCloseDesaProfile" class="p-1.5 rounded-lg hover:bg-slate-100 text-slate-400 hover:text-slate-700 transition" title="Tutup">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    </div>

                    <!-- 3 Pill Stats -->
                    <div class="grid grid-cols-3 gap-2 text-center text-xs">
                        <div class="bg-slate-50 rounded-xl p-2.5 border border-slate-100">
                            <span class="text-slate-400 text-[10px] uppercase font-bold block">Penduduk</span>
                            <div id="desaStatPenduduk" class="text-sm font-extrabold text-[#0b2545] tabular-nums mt-0.5">3.120 Jiwa</div>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-2.5 border border-slate-100">
                            <span class="text-slate-400 text-[10px] uppercase font-bold block">Keluarga (KK)</span>
                            <div id="desaStatKK" class="text-sm font-extrabold text-[#0b2545] tabular-nums mt-0.5">840 KK</div>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-2.5 border border-slate-100">
                            <span class="text-slate-400 text-[10px] uppercase font-bold block">Luas Wilayah</span>
                            <div id="desaStatLuas" class="text-sm font-extrabold text-emerald-700 tabular-nums mt-0.5">14,8 km²</div>
                        </div>
                    </div>

                    <!-- 4 Detail Mini-Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs">
                        <div class="p-2.5 rounded-xl bg-slate-50/80 border border-slate-100 space-y-1">
                            <div class="flex items-center gap-1.5 text-amber-800 font-bold text-[11px]">
                                <svg class="w-3.5 h-3.5 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                                <span>Potensi Unggulan</span>
                            </div>
                            <p id="desaPotensiDesc" class="text-slate-600 text-[11px] leading-relaxed line-clamp-2">
                                Sentra Pariwisata Bahari Pantai Berova, Perikanan Tangkap Teluk Bone, dan Perkebunan Kakao Rakyat.
                            </p>
                            <div class="text-[10px] text-amber-700 font-semibold pt-1 border-t border-slate-100">
                                Komoditas: <span id="desaKomoditasText" class="font-normal text-slate-600">Ikan Laut, Kakao, Kelapa</span>
                            </div>
                        </div>

                        <div class="p-2.5 rounded-xl bg-slate-50/80 border border-slate-100 space-y-1">
                            <div class="flex items-center gap-1.5 text-emerald-800 font-bold text-[11px]">
                                <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <span>BUMDes & Ekonomi</span>
                            </div>
                            <p id="desaBumdesDesc" class="text-slate-600 text-[11px] leading-relaxed line-clamp-2">
                                BUMDes Berova Mandiri pengelola tiket wisata, dermaga perahu, dan kelompok tani kakao.
                            </p>
                            <div class="text-[10px] text-emerald-700 font-semibold pt-1 border-t border-slate-100">
                                Faskes: <span id="desaFaskesText" class="font-normal text-slate-600">Poskesdes & 1 Pustu Aktif</span>
                            </div>
                        </div>

                        <div class="p-2.5 rounded-xl bg-slate-50/80 border border-slate-100 space-y-1 sm:col-span-2">
                            <div class="flex items-center justify-between text-[11px]">
                                <span class="font-bold text-slate-700 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                                    <span>Pendidikan & Layanan:</span>
                                </span>
                                <span id="desaPendidikanDesc" class="text-slate-600 text-[10px]">1 PAUD, 2 SD Negeri, SMP/MTs</span>
                            </div>
                            <div class="flex items-center justify-between text-[11px] pt-1 border-t border-slate-100">
                                <span class="font-bold text-slate-700 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                    <span>Infrastruktur:</span>
                                </span>
                                <span id="desaInfrastrukturDesc" class="text-slate-600 text-[10px]">Listrik PLN 24 Jam, Sinyal 4G Kuat, Jalan Aspal</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Placeholder when no village is active yet -->
                <div id="cardProfilPlaceholder" class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-2xs text-xs text-slate-500 flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-emerald-50 text-[#059669] flex items-center justify-center shrink-0 border border-emerald-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold text-slate-700 text-xs">Pilih Desa pada Peta atau Daftar</p>
                        <p class="text-[11px] text-slate-500">Klik pin desa pada peta WebGIS atau daftar di bawah untuk memuat monografi lengkap dan diagram radar.</p>
                    </div>
                </div>


                <!-- KARTU DAFTAR DESA DALAM KECAMATAN TERPILIH -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm p-5 space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                        <div>
                            <h3 class="font-bold text-slate-800 text-sm flex items-center gap-2">
                                <span>Daftar Desa/Kelurahan</span>
                                <span id="badgeKecamatanTerpilih" class="text-[10px] bg-blue-100 text-[#005ea6] px-2 py-0.5 rounded-full font-bold">15 Kecamatan</span>
                            </h3>
                            <p class="text-[11px] text-slate-500">Klik "Lihat di Peta" untuk memusatkan kamera ke desa tersebut</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span id="totalDesaCountBadge" class="text-xs font-mono font-bold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md">49 Desa Terdata</span>
                            <button id="btnQuickAddDesa" class="text-xs bg-[#005ea6] hover:bg-[#004077] text-white px-2.5 py-1 rounded-lg font-bold flex items-center gap-1.5 transition shadow-xs">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                <span>+ Input Desa</span>
                            </button>
                        </div>
                    </div>

                    <!-- Search Input Desa -->
                    <div class="relative">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input id="inputSearchDesaList" type="text" placeholder="Cari nama desa, komoditas, atau potensi..." class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-[#005ea6] bg-slate-50 focus:bg-white transition">
                    </div>

                    <!-- Scrollable Village List with Action Buttons -->
                    <div id="villageCardsContainer" class="space-y-2.5 max-h-[380px] overflow-y-auto pr-1">
                        <!-- Injected via JavaScript -->
                    </div>
                </div>

                <!-- KARTU INFRASTRUKTUR & LAYANAN DASAR DESA (PODES 2024-2025) -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm p-5 space-y-3.5">
                    <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                        <h3 class="font-bold text-slate-800 text-sm">Capaian Layanan Dasar Desa (Podes)</h3>
                        <span class="text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded">Rata-rata 133 Desa</span>
                    </div>

                    <div class="space-y-3 text-xs">
                        <!-- Listrik -->
                        <div class="space-y-1">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-600 font-medium">Desa Berlistrik PLN 24 Jam</span>
                                <span class="font-bold text-slate-900 tabular-nums">133 Desa (100%)</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 100%;"></div>
                            </div>
                        </div>

                        <!-- Telekomunikasi 4G -->
                        <div class="space-y-1">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-600 font-medium">Jaringan Telekomunikasi & Internet 4G</span>
                                <span class="font-bold text-slate-900 tabular-nums">124 Desa (93,2%)</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                <div class="bg-[#005ea6] h-1.5 rounded-full" style="width: 93.2%;"></div>
                            </div>
                        </div>

                        <!-- Fasilitas Kesehatan -->
                        <div class="space-y-1">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-600 font-medium">Akses Fasilitas Kesehatan (Puskesmas/Pustu/Poskesdes)</span>
                                <span class="font-bold text-slate-900 tabular-nums">133 Desa (100%)</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 100%;"></div>
                            </div>
                        </div>

                        <!-- Jalan Aspal/Beton -->
                        <div class="space-y-1">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-600 font-medium">Akses Permukaan Jalan Utama Aspal/Beton</span>
                                <span class="font-bold text-slate-900 tabular-nums">118 Desa (88,7%)</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                <div class="bg-amber-500 h-1.5 rounded-full" style="width: 88.7%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        
<!-- SECTION: VISUALISASI DATA & GRAFIK ANALITIK PODES BPS 2024-2025 -->
        <section id="sectionGrafik" class="scroll-mt-24 space-y-6">
            <!-- Header Section -->
            <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-200 pb-4">
                <div>
                    <div class="inline-flex items-center gap-1.5 text-xs font-bold text-[#059669] bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200 mb-1">
                        <svg class="w-3.5 h-3.5 text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        <span>Visualisasi Statistik Interaktif • Podes BPS 2024–2025</span>
                    </div>
                    <h2 class="text-2xl font-black text-[#0b2545] tracking-tight">
                        Grafik & Diagram Statistik Potensi Desa
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500">
                        Penyajian visual komparatif karakteristik 15 kecamatan, diagram radar 5 dimensi kemandirian, dan proporsi perkembangan 133 desa di Kolaka Utara
                    </p>
                </div>
                <!-- Scope Status Badge -->
                <div id="chartScopeIndicator" class="flex items-center gap-2 text-xs bg-slate-50 px-3.5 py-1.5 rounded-xl border border-slate-200 shadow-2xs">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-slate-600 font-semibold">Cakupan Data:</span>
                    <span id="chartActiveScopeText" class="font-bold text-[#0b2545]">Agregat 15 Kecamatan (133 Desa)</span>
                </div>
            </div>

            <!-- Grid Charts Masterpiece -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                <!-- Chart 1: Bar Chart Sektor per Kecamatan (7 COLS) -->
                <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md transition p-5 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100 flex-wrap gap-2">
                            <div>
                                <h3 class="text-sm font-extrabold text-[#0b2545]">Distribusi Sektor Unggulan per Kecamatan</h3>
                                <p class="text-[11px] text-slate-500">Perbandingan jumlah desa berdasarkan sektor dominan di 15 Kecamatan</p>
                            </div>
                            <!-- Tab Switcher -->
                            <div class="flex items-center gap-1 bg-slate-100 p-1 rounded-lg text-xs font-bold text-slate-600">
                                <button id="btnTabChartSektor" class="px-2.5 py-1 rounded-md bg-white text-[#0b2545] shadow-xs transition" onclick="switchMainBarChart('sektor')">Sektor Potensi</button>
                                <button id="btnTabChartProduksi" class="px-2.5 py-1 rounded-md text-slate-500 hover:text-slate-900 transition" onclick="switchMainBarChart('produksi')">Estimasi Produksi</button>
                            </div>
                        </div>
                        <div class="relative w-full h-[280px]">
                            <canvas id="canvasSektorKecamatan"></canvas>
                        </div>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] text-slate-500 flex items-center justify-between">
                        <span>Sumber: Podes BPS Kolaka Utara 2024–2025</span>
                        <span class="font-bold text-emerald-700">82% Sentra Perkebunan Kakao</span>
                    </div>
                </div>

                <!-- Chart 2: Donut Status Kemandirian Desa (5 COLS) -->
                <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md transition p-5 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                            <div>
                                <h3 class="text-sm font-extrabold text-[#0b2545]">Proporsi Status Kemandirian Desa (IPD)</h3>
                                <p class="text-[11px] text-slate-500">Klasifikasi 133 Desa berdasarkan Indeks Perkembangan Desa</p>
                            </div>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">Podes 2024</span>
                        </div>
                        <div class="relative w-full h-[220px] flex items-center justify-center">
                            <canvas id="canvasStatusKemandirian"></canvas>
                        </div>
                    </div>
                    <!-- Legend Summary Cards -->
                    <div class="grid grid-cols-3 gap-2 text-center text-xs mt-3 pt-3 border-t border-slate-100">
                        <div class="p-2 rounded-xl bg-emerald-50/80 border border-emerald-100">
                            <span class="text-[10px] text-emerald-700 font-bold block">Mandiri</span>
                            <span class="text-base font-extrabold text-emerald-800">28 Desa</span>
                            <span class="text-[9px] text-emerald-600 block">21,1%</span>
                        </div>
                        <div class="p-2 rounded-xl bg-blue-50/80 border border-blue-100">
                            <span class="text-[10px] text-blue-700 font-bold block">Maju</span>
                            <span class="text-base font-extrabold text-blue-800">64 Desa</span>
                            <span class="text-[9px] text-blue-600 block">48,1%</span>
                        </div>
                        <div class="p-2 rounded-xl bg-amber-50/80 border border-amber-100">
                            <span class="text-[10px] text-amber-700 font-bold block">Berkembang</span>
                            <span class="text-base font-extrabold text-amber-800">41 Desa</span>
                            <span class="text-[9px] text-amber-600 block">30,8%</span>
                        </div>
                    </div>
                </div>

                <!-- Chart 3: Radar Diagram 5 Dimensi Karakteristik Desa (6 COLS) -->
                <div class="lg:col-span-6 bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md transition p-5 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100 flex-wrap gap-2">
                            <div>
                                <h3 class="text-sm font-extrabold text-[#0b2545]">Diagram Radar: 5 Dimensi Karakteristik Desa</h3>
                                <p class="text-[11px] text-slate-500">
                                    Profil Desa: <b id="radarCurrentVillageTitle" class="text-[#059669]">Kabupaten Kolaka Utara (Rata-rata)</b>
                                </p>
                            </div>
                            <button id="btnResetRadarToKab" class="hidden text-[10px] font-bold text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 px-2.5 py-1 rounded-full transition" onclick="resetRadarChart()">
                                Kembalikan ke Rata-rata Kab
                            </button>
                        </div>
                        <div class="relative w-full h-[280px]">
                            <canvas id="canvasRadarDesa"></canvas>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-t border-slate-100 text-[11px] text-slate-500 flex items-center justify-between">
                        <span>Skala 0-100 berdasarkan Podes BPS</span>
                        <span class="text-emerald-700 font-bold text-[10px]">Klik desa mana pun di peta untuk update radar</span>
                    </div>
                </div>

                <!-- Chart 4: Topografi & Sarana Infrastruktur (6 COLS) -->
                <div class="lg:col-span-6 bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md transition p-5 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                            <div>
                                <h3 class="text-sm font-extrabold text-[#0b2545]">Topografi & Sarana Infrastruktur Desa</h3>
                                <p class="text-[11px] text-slate-500">Sebaran letak geografis dan ketersediaan sarana dasar di 133 Desa</p>
                            </div>
                            <span class="text-xs bg-slate-100 text-slate-600 font-semibold px-2.5 py-0.5 rounded-full">Podes 2024–2025</span>
                        </div>
                        <div class="relative w-full h-[280px]">
                            <canvas id="canvasTopografiInfrastruktur"></canvas>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-t border-slate-100 text-[11px] text-slate-500 flex items-center justify-between">
                        <span>Cakupan: 133 Desa & Kelurahan</span>
                        <span class="text-[#0b2545] font-bold">100% Berlistrik PLN</span>
                    </div>
                </div>
            </div>
        </section>

        
<!-- SECTION: APLIKASI DIGITAL DESA MADANI (MATCHING EXACT SCREENSHOT THEME & 3D ANIMATION) -->
        <section id="sectionEkosistem" class="scroll-mt-24 space-y-6">
            <!-- Header Section (Exact typography as seen in screenshot) -->
            <div class="space-y-2 max-w-3xl">
                <div class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-800 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Ekosistem Perangkat Lunak Resmi (Software Suite)</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#0b2545] tracking-tight">
                    Aplikasi Digital
                </h2>
                <p class="text-xs sm:text-base text-slate-600 leading-relaxed font-normal">
                    Rangkaian alat digital terintegrasi untuk mendukung terwujudnya kedaulatan data desa di Kabupaten Kolaka Utara: dari sensus lapangan hingga dashboard analitik pengambil kebijakan.
                </p>
            </div>

            <!-- Grid Layout: Left App Cards + Right 3D Featured Showcase -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                <!-- Left Column: 4 Clean White App Cards (7 COLS) -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Card 1: Madani Sensus -->
                    <div id="cardApp_sensus" class="app-selector-card card-tilt-3d bg-white rounded-[30px] border-2 border-emerald-500 ring-4 ring-emerald-500/10 shadow-lg p-6 flex flex-col justify-between transition-all duration-300 cursor-pointer group active-app-card" onclick="selectAppShowcase('sensus')">
                        <div class="space-y-3.5">
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-emerald-50 border border-emerald-100 shadow-xs flex items-center justify-center text-[#059669] group-hover:scale-110 group-hover:bg-[#059669] group-hover:text-white transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                                </div>
                                <span class="text-[11px] font-bold px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                                    Sensus Digital
                                </span>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-[#0b2545] group-hover:text-[#059669] transition">
                                    Madani Sensus
                                </h3>
                                <p class="text-xs text-slate-500 leading-relaxed mt-1.5">
                                    Aplikasi sensus keluarga partisipatif terintegrasi data spasial untuk profil penduduk dan kesejahteraan keluarga Kolaka Utara.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 pt-3.5 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-slate-800 group-hover:text-[#059669] transition">
                            <span>Pelajari Selengkapnya</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </div>
                    </div>

                    <!-- Card 2: Madani Spasial -->
                    <div id="cardApp_spasial" class="app-selector-card card-tilt-3d bg-white rounded-[30px] border-2 border-slate-200/90 shadow-sm hover:shadow-xl p-6 flex flex-col justify-between transition-all duration-300 cursor-pointer group" onclick="selectAppShowcase('spasial')">
                        <div class="space-y-3.5">
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-teal-50 border border-teal-100 shadow-xs flex items-center justify-center text-teal-700 group-hover:scale-110 group-hover:bg-teal-700 group-hover:text-white transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <span class="text-[11px] font-bold px-3 py-1 rounded-full bg-teal-50 text-teal-700 border border-teal-200/60">
                                    Geospasial GPS
                                </span>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-[#0b2545] group-hover:text-teal-700 transition">
                                    Madani Spasial
                                </h3>
                                <p class="text-xs text-slate-500 leading-relaxed mt-1.5">
                                    Teknologi pemetaan partisipatif untuk pendataan sarana, vegetasi perkebunan kakao, dan batas wilayah presisi tanpa konflik.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 pt-3.5 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-slate-800 group-hover:text-teal-700 transition">
                            <span>Pelajari Selengkapnya</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </div>
                    </div>

                    <!-- Card 3: Madani Monev -->
                    <div id="cardApp_monev" class="app-selector-card card-tilt-3d bg-white rounded-[30px] border-2 border-slate-200/90 shadow-sm hover:shadow-xl p-6 flex flex-col justify-between transition-all duration-300 cursor-pointer group" onclick="selectAppShowcase('monev')">
                        <div class="space-y-3.5">
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-cyan-50 border border-cyan-100 shadow-xs flex items-center justify-center text-cyan-700 group-hover:scale-110 group-hover:bg-cyan-700 group-hover:text-white transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                </div>
                                <span class="text-[11px] font-bold px-3 py-1 rounded-full bg-cyan-50 text-cyan-700 border border-cyan-200/60">
                                    Monitoring Progres
                                </span>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-[#0b2545] group-hover:text-cyan-700 transition">
                                    Madani Monev
                                </h3>
                                <p class="text-xs text-slate-500 leading-relaxed mt-1.5">
                                    Sistem pemantauan real-time untuk verifikasi progres pencapaian data lapangan per desa dan monitoring kinerja pembangunan daerah.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 pt-3.5 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-slate-800 group-hover:text-cyan-700 transition">
                            <span>Pelajari Selengkapnya</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </div>
                    </div>

                    <!-- Card 4: Madani WebGIS -->
                    <div id="cardApp_webgis" class="app-selector-card card-tilt-3d bg-white rounded-[30px] border-2 border-slate-200/90 shadow-sm hover:shadow-xl p-6 flex flex-col justify-between transition-all duration-300 cursor-pointer group" onclick="selectAppShowcase('webgis')">
                        <div class="space-y-3.5">
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-amber-50 border border-amber-100 shadow-xs flex items-center justify-center text-amber-700 group-hover:scale-110 group-hover:bg-amber-600 group-hover:text-white transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                </div>
                                <span class="text-[11px] font-bold px-3 py-1 rounded-full bg-amber-50 text-amber-700 border border-amber-200/60">
                                    WebGIS Portal
                                </span>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-[#0b2545] group-hover:text-amber-700 transition">
                                    Madani WebGIS
                                </h3>
                                <p class="text-xs text-slate-500 leading-relaxed mt-1.5">
                                    Platform visualisasi spasial berbasis web untuk pemangku kebijakan, menghadirkan peta tematik interaktif desa dan metrik analitik potensi.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 pt-3.5 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-slate-800 group-hover:text-amber-700 transition">
                            <span>Pelajari Selengkapnya</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Featured Dark 3D Device Showcase (5 COLS) -->
                <div class="lg:col-span-5">
                    <div id="showcaseCard3D" class="card-tilt-3d bg-[#0b2545] rounded-[34px] p-6 text-white shadow-2xl relative overflow-hidden border border-white/10 flex flex-col justify-between min-h-[490px] h-full transition-all duration-300">
                        <!-- Dynamic Specular Glare Layer -->
                        <div class="tilt-glare absolute inset-0 pointer-events-none opacity-0 transition-opacity duration-300 z-30"></div>

                        <!-- Ambient Glow Orbs -->
                        <div class="absolute -top-24 -right-24 w-72 h-72 bg-emerald-500/25 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>

                        <!-- Window Header (Exact as in Screenshot: red and green dots + Antarmuka Sistem) -->
                        <div class="flex items-center justify-between pb-3.5 border-b border-white/10 relative z-20" data-tilt-depth="10">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                                <span id="showcaseAppTag" class="ml-2 text-[10px] font-mono font-bold text-emerald-300 bg-emerald-500/20 px-2 py-0.5 rounded-md">
                                    Madani Sensus v2.4
                                </span>
                            </div>
                            <span class="text-xs font-semibold text-slate-300 tracking-wide">
                                Antarmuka Sistem
                            </span>
                        </div>

                        <!-- 3D Multilayer Mockup Centerpiece -->
                        <div class="relative flex-1 flex items-center justify-center py-6 min-h-[300px] z-10" style="perspective: 1000px;">
                            <!-- Layer 1: Laptop Frame (Base Depth: 15px) -->
                            <div class="relative w-full max-w-[340px] bg-slate-900 rounded-t-xl border-4 border-slate-700/80 shadow-2xl overflow-hidden transition-transform duration-300" data-tilt-depth="15">
                                <div class="bg-slate-800 px-3 py-1 flex items-center justify-between text-[8px] text-slate-400 border-b border-slate-700">
                                    <span class="flex items-center gap-1.5 font-mono">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                        <span id="laptopUrlText">madani.kolutkab.bps.go.id/sensus</span>
                                    </span>
                                    <span class="text-slate-400">SSL 256-bit</span>
                                </div>
                                <div id="laptopScreenContent" class="bg-[#07172b] p-3 text-white text-[10px] space-y-2 h-[165px] overflow-hidden">
                                    <div class="flex items-center justify-between border-b border-white/10 pb-1.5">
                                        <span class="font-bold text-xs text-emerald-300" id="laptopScreenHeader">Dashboard Sensus Keluarga</span>
                                        <span class="text-[8px] bg-emerald-500/20 text-emerald-300 px-1.5 py-0.5 rounded font-mono">15 Kecamatan</span>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2 text-[9px]">
                                        <div class="bg-white/10 p-2 rounded-lg border border-white/10">
                                            <span class="text-slate-400 block text-[8px]">Total KK Terdata</span>
                                            <span class="font-extrabold text-sm text-white" id="laptopScreenKk">37.013 KK</span>
                                        </div>
                                        <div class="bg-white/10 p-2 rounded-lg border border-white/10">
                                            <span class="text-slate-400 block text-[8px]">Progres Verifikasi</span>
                                            <span class="font-extrabold text-sm text-emerald-400" id="laptopScreenProgres">100% Selesai</span>
                                        </div>
                                    </div>
                                    <div class="bg-white/5 p-2 rounded-lg border border-white/5 space-y-1">
                                        <div class="flex justify-between text-[8px] text-slate-300">
                                            <span>Sebaran Geotagging Presisi</span>
                                            <span class="text-amber-300 font-bold">133 Desa</span>
                                        </div>
                                        <div class="w-full bg-slate-700 rounded-full h-1.5 overflow-hidden">
                                            <div class="bg-gradient-to-r from-emerald-500 to-teal-400 h-1.5 rounded-full" style="width: 94%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-slate-700 h-2 w-[108%] -ml-[4%] rounded-b-md shadow-lg border-t border-slate-600"></div>
                            </div>

                            <!-- Layer 2: Smartphone 1 (Foreground Tilted Depth: 40px) -->
                            <div class="absolute -bottom-2 -left-2 sm:left-2 w-36 sm:w-42 bg-slate-950 rounded-[22px] border-4 border-slate-800 shadow-2xl p-1.5 transform -rotate-6 transition-transform duration-300 z-20 hover:rotate-0" data-tilt-depth="40">
                                <div class="w-10 h-2 bg-slate-800 rounded-full mx-auto mb-1 flex items-center justify-center">
                                    <span class="w-1 h-1 rounded-full bg-slate-900"></span>
                                </div>
                                <div id="phoneScreenContent" class="bg-slate-900 rounded-[16px] p-2 text-white text-[8px] space-y-1.5 border border-white/10">
                                    <div class="flex items-center justify-between text-[7px] text-slate-400 pb-0.5 border-b border-white/10">
                                        <span class="font-bold text-white" id="phoneAppName">Madani Sensus</span>
                                        <span class="text-emerald-400 font-mono">09:41</span>
                                    </div>
                                    <div class="bg-white/10 p-1.5 rounded-md space-y-0.5">
                                        <span class="text-[7px] text-slate-300 font-semibold block" id="phoneCardTitle">Kuesioner Rumah Tangga</span>
                                        <span class="text-[8px] font-bold text-emerald-300 block" id="phoneCardSub">KK: H. Baso Rusli</span>
                                        <span class="text-[7px] text-slate-400 block" id="phoneCardLoc">📍 Desa Pitulua, Lasusua</span>
                                    </div>
                                    <div class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 text-center font-bold py-1 rounded-md text-[8px] shadow-sm cursor-pointer transition">
                                        ✓ Simpan & Geotagging
                                    </div>
                                </div>
                            </div>

                            <!-- Layer 3: Smartphone 2 (Depth: 25px - Tilted Right) -->
                            <div class="absolute -top-3 -right-2 sm:right-2 w-32 sm:w-36 bg-slate-950 rounded-[22px] border-4 border-slate-800 shadow-2xl p-1.5 transform rotate-12 transition-transform duration-300 z-10 hidden sm:block hover:rotate-0" data-tilt-depth="25">
                                <div class="w-8 h-1.5 bg-slate-800 rounded-full mx-auto mb-1"></div>
                                <div class="bg-slate-900 rounded-[16px] p-1.5 text-white text-[7px] space-y-1 border border-white/10">
                                    <div class="flex items-center justify-between text-[6px] text-slate-400">
                                        <span class="font-bold text-cyan-300">Peta Spasial</span>
                                        <span>GPS Active</span>
                                    </div>
                                    <div class="h-14 bg-emerald-950/60 rounded border border-emerald-500/30 flex items-center justify-center relative overflow-hidden">
                                        <div class="absolute inset-0 opacity-30 bg-[radial-gradient(#10b981_1px,transparent_1px)] [background-size:6px_6px]"></div>
                                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400 animate-ping absolute"></span>
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 relative z-10"></span>
                                        <span class="absolute bottom-0.5 right-0.5 text-[5px] text-emerald-300 font-mono">Batas Dusun</span>
                                    </div>
                                    <div class="text-[6px] text-slate-400 text-center font-mono">
                                        Akurasi Koordinat: 1,2 m
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Glass Chips (Depth: 55px) -->
                            <div class="absolute top-2 left-1 z-30 bg-white/10 backdrop-blur-md border border-white/20 text-white text-[8px] font-bold px-2 py-0.5 rounded-full shadow-lg flex items-center gap-1.5 animate-float-slow" data-tilt-depth="55">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span id="floatingChip1">Satu Data Desa</span>
                            </div>
                            <div class="absolute bottom-4 right-1 z-30 bg-white/10 backdrop-blur-md border border-white/20 text-white text-[8px] font-bold px-2 py-0.5 rounded-full shadow-lg flex items-center gap-1.5 animate-float-delayed" data-tilt-depth="60">
                                <span class="text-amber-400">★</span>
                                <span id="floatingChip2">Cloud Sync BPS</span>
                            </div>
                        </div>

                        <!-- Bottom Status Bar -->
                        <div class="pt-3.5 border-t border-white/10 flex items-center justify-between text-xs text-slate-300 relative z-20" data-tilt-depth="10">
                            <div class="flex items-center gap-2">
                                <span class="text-emerald-400 font-bold">● Terhubung Cloud BPS</span>
                                <span class="text-slate-500 hidden sm:inline">•</span>
                                <span class="text-slate-400 text-[11px] hidden sm:inline">Multi-Platform Android & Web</span>
                            </div>
                            <button onclick="openCurrentAppDetailModal()" class="text-emerald-400 hover:text-emerald-300 font-bold flex items-center gap-1 transition text-xs">
                                <span>Rincian Fitur</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </div>
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
                        <span>Konsep & Metodologi Resmi Desa Madani</span>
                    </div>
                    <h2 class="text-2xl font-extrabold text-[#0b2545] tracking-tight">
                        Tentang Inisiatif Desa Madani
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500">
                        Inovasi terpadu memadukan data statistik potensi desa (Podes BPS) dan pemetaan spasial tematik untuk mewujudkan kemandirian dan kemakmuran desa di Kolaka Utara
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs bg-emerald-50 text-emerald-800 font-bold px-3 py-1.5 rounded-lg border border-emerald-200">
                        Inisiator: Pemerintah Kab. Kolaka Utara
                    </span>
                    <span class="text-xs bg-blue-100 text-[#005ea6] font-bold px-3 py-1.5 rounded-lg border border-blue-200">
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


        
<!-- ROW 3: INTEGRASI PUBLIKASI STATISTIK RESMI BPS KABUPATEN KOLAKA UTARA -->
        <div id="sectionPublikasi" class="bg-white rounded-2xl border border-slate-200/90 shadow-sm p-6 space-y-5">
            <div class="flex items-center justify-between flex-wrap gap-3 pb-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-blue-50 text-[#005ea6] flex items-center justify-center shadow-inner">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </span>
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">Publikasi Resmi Statistik BPS Kolaka Utara Terkait</h2>
                        <p class="text-xs text-slate-500">Akses dokumen publikasi resmi BPS untuk mendukung analisa potensi desa dan kebijakan daerah</p>
                    </div>
                </div>

                <a href="https://kolutkab.bps.go.id" target="_blank" rel="noopener noreferrer" class="text-xs text-[#005ea6] hover:text-[#004077] font-semibold flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-blue-200 hover:bg-blue-50 transition">
                    <span>Kunjungi Portal Resmi BPS Kolut</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>

            <!-- Grid 4 Publikasi Utama BPS -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                <!-- Publikasi 1: Kolaka Utara Dalam Angka 2025 -->
                <div class="bg-slate-50 hover:bg-white rounded-xl p-4 border border-slate-200 hover:border-blue-300 hover:shadow-md transition flex flex-col justify-between space-y-3">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-[10px] text-slate-400">
                            <span class="font-mono bg-blue-100 text-blue-800 px-1.5 py-0.5 rounded font-semibold">Katalog: 1102001.7408</span>
                            <span>Feb 2025</span>
                        </div>
                        <h4 class="font-bold text-slate-900 text-xs leading-snug line-clamp-2">
                            Kabupaten Kolaka Utara Dalam Angka 2025
                        </h4>
                        <p class="text-[11px] text-slate-500 line-clamp-3">
                            Publikasi komprehensif memuat data geografi, iklim, kependudukan, pertanian, ketenagakerjaan, dan perekonomian terkini.
                        </p>
                    </div>
                    <div class="pt-2 border-t border-slate-200/80 flex items-center justify-between">
                        <span class="text-[10px] text-slate-400 font-mono">PDF • 482 Hal</span>
                        <div class="flex items-center gap-1.5">
                            <button onclick="previewPublikasi('Kolaka_Utara_Dalam_Angka_2025.pdf')" class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-800 px-2 py-1 rounded-md font-semibold flex items-center gap-1 transition" title="Baca Ringkasan Dokumen">
                                <svg class="w-3.5 h-3.5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <span>Ringkasan</span>
                            </button>
                            <button onclick="downloadPublikasi('Kolaka_Utara_Dalam_Angka_2025.pdf')" class="text-xs bg-[#005ea6] hover:bg-[#004077] text-white px-2.5 py-1 rounded-md font-semibold flex items-center gap-1 transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                <span>Unduh</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Publikasi 2: Statistik Potensi Desa Kolaka Utara 2024 -->
                <div class="bg-slate-50 hover:bg-white rounded-xl p-4 border border-slate-200 hover:border-blue-300 hover:shadow-md transition flex flex-col justify-between space-y-3">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-[10px] text-slate-400">
                            <span class="font-mono bg-emerald-100 text-emerald-800 px-1.5 py-0.5 rounded font-semibold">Katalog: 2102027.7408</span>
                            <span>Des 2024</span>
                        </div>
                        <h4 class="font-bold text-slate-900 text-xs leading-snug line-clamp-2">
                            Statistik Potensi Desa (Podes) Kolaka Utara 2024
                        </h4>
                        <p class="text-[11px] text-slate-500 line-clamp-3">
                            Hasil sensus potensi desa yang mengulas ketersediaan fasilitas dasar, infrastruktur, ekonomi, dan potensi sumber daya alam di 133 desa.
                        </p>
                    </div>
                    <div class="pt-2 border-t border-slate-200/80 flex items-center justify-between">
                        <span class="text-[10px] text-slate-400 font-mono">PDF • 218 Hal</span>
                        <div class="flex items-center gap-1.5">
                            <button onclick="previewPublikasi('Statistik_Potensi_Desa_Kolut_2024.pdf')" class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-800 px-2 py-1 rounded-md font-semibold flex items-center gap-1 transition" title="Baca Ringkasan Dokumen">
                                <svg class="w-3.5 h-3.5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <span>Ringkasan</span>
                            </button>
                            <button onclick="downloadPublikasi('Statistik_Potensi_Desa_Kolut_2024.pdf')" class="text-xs bg-[#005ea6] hover:bg-[#004077] text-white px-2.5 py-1 rounded-md font-semibold flex items-center gap-1 transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                <span>Unduh</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Publikasi 3: Indikator Kesejahteraan Rakyat Kolaka Utara 2024 -->
                <div class="bg-slate-50 hover:bg-white rounded-xl p-4 border border-slate-200 hover:border-blue-300 hover:shadow-md transition flex flex-col justify-between space-y-3">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-[10px] text-slate-400">
                            <span class="font-mono bg-amber-100 text-amber-800 px-1.5 py-0.5 rounded font-semibold">Katalog: 4102005.7408</span>
                            <span>Nov 2024</span>
                        </div>
                        <h4 class="font-bold text-slate-900 text-xs leading-snug line-clamp-2">
                            Indikator Kesejahteraan Rakyat Kolaka Utara 2024
                        </h4>
                        <p class="text-[11px] text-slate-500 line-clamp-3">
                            Informasi aspek kependudukan, kesehatan, pendidikan, pola konsumsi rumah tangga, perumahan, serta kemiskinan daerah.
                        </p>
                    </div>
                    <div class="pt-2 border-t border-slate-200/80 flex items-center justify-between">
                        <span class="text-[10px] text-slate-400 font-mono">PDF • 186 Hal</span>
                        <div class="flex items-center gap-1.5">
                            <button onclick="previewPublikasi('Indikator_Kesejahteraan_Rakyat_Kolut_2024.pdf')" class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-800 px-2 py-1 rounded-md font-semibold flex items-center gap-1 transition" title="Baca Ringkasan Dokumen">
                                <svg class="w-3.5 h-3.5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <span>Ringkasan</span>
                            </button>
                            <button onclick="downloadPublikasi('Indikator_Kesejahteraan_Rakyat_Kolut_2024.pdf')" class="text-xs bg-[#005ea6] hover:bg-[#004077] text-white px-2.5 py-1 rounded-md font-semibold flex items-center gap-1 transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                <span>Unduh</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Publikasi 4: Statistik Pertanian & Perkebunan Kakao 2024 -->
                <div class="bg-slate-50 hover:bg-white rounded-xl p-4 border border-slate-200 hover:border-blue-300 hover:shadow-md transition flex flex-col justify-between space-y-3">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-[10px] text-slate-400">
                            <span class="font-mono bg-orange-100 text-orange-800 px-1.5 py-0.5 rounded font-semibold">Katalog: 5204001.7408</span>
                            <span>Okt 2024</span>
                        </div>
                        <h4 class="font-bold text-slate-900 text-xs leading-snug line-clamp-2">
                            Statistik Perkebunan Kakao & Cengkeh Kolaka Utara
                        </h4>
                        <p class="text-[11px] text-slate-500 line-clamp-3">
                            Kajian tematik luas tanam, produksi, produktivitas tanaman perkebunan rakyat serta dinamika harga komoditas ekspor.
                        </p>
                    </div>
                    <div class="pt-2 border-t border-slate-200/80 flex items-center justify-between">
                        <span class="text-[10px] text-slate-400 font-mono">PDF • 142 Hal</span>
                        <div class="flex items-center gap-1.5">
                            <button onclick="previewPublikasi('Statistik_Perkebunan_Kakao_Kolut_2024.pdf')" class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-800 px-2 py-1 rounded-md font-semibold flex items-center gap-1 transition" title="Baca Ringkasan Dokumen">
                                <svg class="w-3.5 h-3.5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <span>Ringkasan</span>
                            </button>
                            <button onclick="downloadPublikasi('Statistik_Perkebunan_Kakao_Kolut_2024.pdf')" class="text-xs bg-[#005ea6] hover:bg-[#004077] text-white px-2.5 py-1 rounded-md font-semibold flex items-center gap-1 transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                <span>Unduh</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

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
                        <div class="text-[10px] font-bold text-amber-300 uppercase tracking-widest">Kolaborasi Inovasi</div>
                        <h4 class="font-extrabold text-white text-base">Desa Madani x BPS Kabupaten Kolaka Utara</h4>
                        <p class="text-[11px] text-emerald-200">Kedaulatan Data Pembangunan Berbasis Desa • Kode Wilayah: 7408</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 text-xs flex-wrap justify-center">
                    <a href="#sectionAbout" class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white transition">Tentang Madani</a>
                    <a href="#sectionPeta" class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white transition">Madani WebGIS</a>
                    <a href="#sectionMonografi" class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white transition">Monografi Desa</a>
                    <a href="#sectionEkosistem" class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white transition">Ekosistem Madani</a>
                    <a href="https://kolutkab.bps.go.id" target="_blank" class="px-3 py-1.5 rounded-lg bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold transition">Portal BPS</a>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 text-slate-400 text-[11px]">
                <p>© 2026 Badan Pusat Statistik Kabupaten Kolaka Utara & Inisiatif Desa Madani. Seluruh Hak Cipta Dilindungi.</p>
                <p class="text-emerald-300 font-semibold">Solusi Satu Data Indonesia • Membangun Desa Mandiri & Sejahtera</p>
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
                    <h3 class="text-base font-bold">Matriks Potensi 15 Kecamatan Kabupaten Kolaka Utara</h3>
                    <p class="text-xs text-blue-100">Berdasarkan Data Potensi Desa (Podes) BPS 2024–2025</p>
                </div>
                <button id="btnCloseModalX" class="p-1 rounded-lg hover:bg-white/10 text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Modal Search & Filter -->
            <div class="p-4 border-b border-slate-100 flex items-center justify-between gap-4 bg-slate-50">
                <div class="relative flex-1 max-w-md">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input id="inputSearchModal" type="text" placeholder="Cari nama kecamatan atau komoditas..." class="w-full pl-9 pr-4 py-1.5 text-xs rounded-lg border border-slate-300 focus:outline-none focus:border-[#005ea6] bg-white">
                </div>
                <button id="btnExportCSVModal" class="text-xs bg-white border border-slate-200 hover:bg-slate-100 px-3 py-1.5 rounded-lg font-semibold flex items-center gap-1.5 transition text-slate-700">
                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Ekspor CSV</span>
                </button>
            </div>

            <!-- Modal Table -->
            <div class="flex-1 overflow-y-auto p-4">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="bg-slate-100 text-slate-700 border-b border-slate-200">
                            <th class="p-2.5 font-bold">No</th>
                            <th class="p-2.5 font-bold">Kecamatan</th>
                            <th class="p-2.5 font-bold">Potensi Unggulan</th>
                            <th class="p-2.5 font-bold text-center">Jumlah Desa</th>
                            <th class="p-2.5 font-bold text-center">Indeks IPD</th>
                            <th class="p-2.5 font-bold text-center">Status IPD</th>
                            <th class="p-2.5 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="modalTableBody" class="divide-y divide-slate-100">
                        <!-- Injected via JavaScript -->
                    </tbody>
                </table>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-3 bg-slate-50 border-t border-slate-200 flex justify-between items-center text-xs text-slate-500">
                <span>Sumber: BPS Kabupaten Kolaka Utara (Podes 2024–2025)</span>
                <button id="btnCloseModalBtn" class="px-4 py-1.5 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold rounded-lg transition">
                    Tutup
                </button>
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
                                    <span>📍 Petik Titik di Peta</span>
                                </button>
                                <button id="btnAdminUseKecCenter" type="button" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold px-2.5 py-1 rounded-lg transition" title="Gunakan koordinat pusat kecamatan">
                                    📐 Isi Titik Kecamatan
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
            const card = document.getElementById('cardProfilDesaSpesifik');
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

        // Filter village markers on map (Uncluttered, professional display)
        function filterVillageMarkers() {
            if (!villageMarkersGroup) return;
            villageMarkersGroup.clearLayers();

            allVillageMarkers.forEach(item => {
                const v = item.desa;
                const k = item.kec;

                // 1. Sektor Filter Check
                if (activeSektorFilter !== 'all') {
                    if (activeSektorFilter === 'mandiri') {
                        if (v.status !== 'Mandiri') return;
                    } else if ((v.sektor || '').toLowerCase() !== activeSektorFilter.toLowerCase()) {
                        return;
                    }
                }

                // 2. Kecamatan Context / Clean Mode Check
                if (selectedKecamatan) {
                    // When a kecamatan is selected, show only villages of this kecamatan
                    if (k.kode !== selectedKecamatan.kode) return;
                } else if (pinMode === 'clean' && activeSektorFilter === 'all') {
                    // Macro view in clean mode: show ONLY the 5 Top Flagship Highlights!
                    // This eliminates the crowded clutter!
                    if (!flagshipVillages.includes(v.nama)) return;
                }

                villageMarkersGroup.addLayer(item.marker);
            });
        }


        // Standalone Function: Build all village markers from active dataset
        function buildAllVillageMarkers() {
            if (!villageMarkersGroup) return;
            villageMarkersGroup.clearLayers();
            allVillageMarkers = [];

            kecamatanPodesList.forEach(kec => {
                kec.desaList.forEach(desa => {
                    if (!desa.lat || !desa.lng) return;

                    const pinClass = desa.status === 'Mandiri' ? 'pin-mandiri' : (desa.status === 'Maju' ? 'pin-maju' : 'pin-berkembang');
                    const svgHtml = getSectorSvgString(desa.sektor, 'w-3.5 h-3.5 text-white');

                    const customIcon = L.divIcon({
                        className: 'custom-village-icon-wrap',
                        html: `<div class="village-marker-pin ${pinClass} ${desa.isCustom ? 'ring-2 ring-amber-300' : ''}"><span class="pin-svg-wrap">${svgHtml}</span></div>`,
                        iconSize: [28, 28],
                        iconAnchor: [14, 28],
                        popupAnchor: [0, -28]
                    });

                    const marker = L.marker([desa.lat, desa.lng], { icon: customIcon });

                    // Tooltip
                    marker.bindTooltip(`
                        <div class="text-left font-sans">
                            <div class="font-extrabold text-white text-xs flex items-center gap-1.5">
                                <span>Desa ${desa.nama}</span>
                                ${desa.isCustom ? '<span class="text-[9px] bg-amber-400 text-slate-950 px-1 rounded font-bold">Kustom</span>' : ''}
                            </div>
                            <div class="text-sky-300 text-[10px] font-semibold">
                                Kec. ${kec.nama} • <span class="${desa.status === 'Mandiri' ? 'text-emerald-300' : 'text-amber-300'} font-bold">[${desa.status}]</span>
                            </div>
                            <div class="text-gray-300 text-[10px] mt-0.5 max-w-[200px] truncate">
                                ${desa.potensi}
                            </div>
                        </div>
                    `, {
                        className: 'custom-tooltip',
                        sticky: true,
                        direction: 'top',
                        offset: [0, -22]
                    });

                    // Rich Card Popup for Village (Clean SVG, No Emoticons, with Quick Edit Button!)
                    const bannerGradient = desa.sektor === 'pariwisata' ? 'bg-gradient-to-r from-teal-700 to-emerald-800' :
                                           desa.sektor === 'perikanan' ? 'bg-gradient-to-r from-blue-800 to-cyan-900' :
                                           desa.sektor === 'perkebunan' ? 'bg-gradient-to-r from-amber-800 to-orange-900' :
                                                                         'bg-gradient-to-r from-emerald-800 to-green-900';

                    const popupHtml = `
                        <div class="village-popup-card font-sans w-[290px] sm:w-[320px] text-slate-800 text-left">
                            <!-- Card Banner Header -->
                            <div class="relative px-3.5 py-3 ${bannerGradient} text-white overflow-hidden">
                                <div class="flex items-center justify-between gap-1 mb-1 relative z-10">
                                    <span class="text-[9px] font-black uppercase px-2 py-0.5 rounded-full tracking-wider ${desa.status === 'Mandiri' ? 'bg-emerald-400 text-slate-950' : (desa.status === 'Maju' ? 'bg-sky-300 text-slate-950' : 'bg-amber-300 text-slate-950')}">
                                        Desa ${desa.status}
                                    </span>
                                    <span class="text-[10px] font-mono text-white/90 bg-black/25 px-1.5 py-0.5 rounded">
                                        Kec. ${kec.nama}
                                    </span>
                                </div>
                                <h4 class="text-base font-extrabold text-white tracking-tight leading-snug relative z-10 flex items-center gap-1.5">
                                    <span class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center shrink-0">
                                        ${getSectorSvgString(desa.sektor, 'w-3 h-3 text-white')}
                                    </span>
                                    <span>Desa ${desa.nama}</span>
                                </h4>
                                <div class="text-[11px] text-blue-100 font-medium flex items-center gap-1.5 mt-0.5 relative z-10">
                                    <span>${desa.topografi}</span> • <span class="tabular-nums font-mono">${desa.luas}</span>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="p-3 bg-white space-y-2.5">
                                <!-- Potensi Unggulan Box -->
                                <div class="bg-amber-50/80 border border-amber-200/90 rounded-lg p-2 text-xs">
                                    <div class="text-[10px] font-bold text-amber-800 uppercase flex items-center gap-1 mb-0.5">
                                        <svg class="w-3 h-3 text-amber-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <span>Potensi Unggulan:</span>
                                    </div>
                                    <p class="text-slate-700 text-[11px] leading-snug font-medium">
                                        ${desa.potensi}
                                    </p>
                                </div>

                                <!-- 3 Metric Stats -->
                                <div class="grid grid-cols-3 gap-1.5 text-center text-[10px]">
                                    <div class="bg-slate-50 p-1.5 rounded-lg border border-slate-100">
                                        <span class="text-slate-400 block text-[9px]">Penduduk</span>
                                        <b class="text-slate-900 tabular-nums text-[11px]">${desa.penduduk.toLocaleString('id-ID')}</b>
                                    </div>
                                    <div class="bg-slate-50 p-1.5 rounded-lg border border-slate-100">
                                        <span class="text-slate-400 block text-[9px]">Keluarga</span>
                                        <b class="text-slate-900 tabular-nums text-[11px]">${desa.kk} KK</b>
                                    </div>
                                    <div class="bg-slate-50 p-1.5 rounded-lg border border-slate-100">
                                        <span class="text-slate-400 block text-[9px]">Indeks IPD</span>
                                        <b class="text-[#005ea6] tabular-nums text-[11px]">${desa.ipd}</b>
                                    </div>
                                </div>

                                <!-- Fasilitas Badges -->
                                <div class="flex flex-wrap gap-1 text-[9px] pt-1 border-t border-slate-100">
                                    <span class="px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-200 font-medium">Listrik 24 Jam</span>
                                    <span class="px-1.5 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-200 font-medium">Sinyal 4G Kuat</span>
                                    <span class="px-1.5 py-0.5 rounded bg-indigo-50 text-indigo-700 border border-indigo-200 font-medium">${desa.faskes || 'Poskesdes'}</span>
                                </div>

                                <!-- Action Buttons with Quick Admin Edit -->
                                <div class="pt-2 flex items-center gap-2">
                                    <button class="flex-1 py-1.5 px-3 bg-[#005ea6] hover:bg-[#004077] text-white font-bold rounded-lg text-xs transition flex items-center justify-center gap-1 shadow-xs" onclick="document.dispatchEvent(new CustomEvent('podesSelectDesa', { detail: { kecKode: '${kec.kode}', desaNama: '${desa.nama}' } }))">
                                        <span>Lihat Profil</span>
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </button>
                                    <button class="py-1.5 px-2.5 bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold rounded-lg text-xs transition flex items-center justify-center gap-1 shadow-xs" onclick="window.adminTriggerEditDesa('${kec.kode}', '${desa.nama}')" title="Edit data desa ini di Portal Admin">
                                        <svg class="w-3.5 h-3.5 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        <span>Edit</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;

                    marker.bindPopup(popupHtml, { maxWidth: 340 });

                    marker.on('click', () => {
                        focusDesa(desa, kec, false);
                    });

                    allVillageMarkers.push({
                        marker: marker,
                        desa: desa,
                        kec: kec,
                        desaNama: desa.nama,
                        kecKode: kec.kode
                    });
                });
            });
        }

        // Initialize Leaflet Map
        function initLeafletMap() {
            if (typeof L === 'undefined' || map) return;

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
            document.getElementById('selectSektor').addEventListener('change', (e) => {
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
            document.getElementById('btnCloseDesaProfile').addEventListener('click', () => {
                document.getElementById('cardProfilDesaSpesifik').classList.add('hidden');
                const placeholder = document.getElementById('cardProfilPlaceholder');
                if (placeholder) placeholder.classList.remove('hidden');
                selectedDesa = null;
            });

            // Reset buttons
            document.getElementById('btnResetFilter').addEventListener('click', () => {
                applySektorFilter('all');
                document.getElementById('inputSearchDesaList').value = '';
                setActiveKecamatan(null);
            });
            document.getElementById('btnResetMapView').addEventListener('click', () => setActiveKecamatan(null));
            document.getElementById('btnMapResetToAll').addEventListener('click', () => setActiveKecamatan(null));

            // Search input village
            document.getElementById('inputSearchDesaList').addEventListener('input', (e) => {
                renderVillageCards(selectedKecamatan, e.target.value);
            });

            // Fullscreen map
            document.getElementById('btnFullscreenMap').addEventListener('click', () => {
                const el = document.getElementById('mapWrapper');
                if (!document.fullscreenElement) {
                    el.requestFullscreen().catch(err => console.log(err));
                } else {
                    document.exitFullscreen();
                }
            });

            // Toggle legend
            const btnLegend = document.getElementById('btnToggleLegend');
            const legendContainer = document.getElementById('legendItemsContainer');
            const chevron = document.getElementById('iconLegendChevron');
            btnLegend.addEventListener('click', () => {
                legendContainer.classList.toggle('hidden');
                chevron.classList.toggle('rotate-180');
            });

            // Download GeoJSON
            document.getElementById('btnDownloadGeoJSON').addEventListener('click', () => {
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
            showToast('🎯 Mode petik titik aktif! Silakan klik lokasi desa pada peta Kolaka Utara.');
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

            showToast(`📍 Titik koordinat [${lat}, ${lng}] berhasil disalin ke formulir!`);
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
            showToast(`🗑️ Desa "${desaNama}" berhasil dihapus dari sistem!`);
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
            showToast('💾 Cadangan database JSON berhasil diunduh!');
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
            showToast('📊 Spreadsheet CSV data desa berhasil diunduh!');
        }

        // Reset Database to Default Baseline BPS
        function resetDatabaseToDefault() {
            if (!confirm('PERINGATAN: Apakah Anda yakin ingin mereset seluruh data kembali ke Baseline Master BPS? Semua data kustom yang baru diinput akan dikembalikan ke data awal.')) {
                return;
            }

            localStorage.removeItem(PODES_STORAGE_KEY);
            kecamatanPodesList = JSON.parse(JSON.stringify(baselineKecamatanPodesList));
            syncAllPodesViews();
            showToast('🔄 Database berhasil direset ke Baseline Resmi BPS!');
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
                    showToast(`📐 Koordinat tengah Kec. ${matched.nama} (${matched.lat}, ${matched.lng}) disalin!`);
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
                        showToast(`✅ Data Desa "${nama}" berhasil diperbarui!`);
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
                        showToast(`🎉 Desa "${nama}" berhasil ditambahkan dan disematkan ke peta!`);
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
                phoneLoc: '📍 Desa Pitulua, Lasusua',
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
                phoneLoc: '📍 Titik Koordinat: -3.518, 120.978',
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
                phoneLoc: '📍 Kecamatan Lasusua & Pakue',
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
                phoneLoc: '📍 Kolaka Utara, Sulawesi Tenggara',
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
        window.openCurrentAppDetailModal = function() {
            const data = appShowcaseDatabase[currentSelectedAppId];
            if (!data) return;

            document.getElementById('modalAppTitle').textContent = data.title;
            document.getElementById('modalAppSub').textContent = data.sub;
            document.getElementById('modalAppPlatform').textContent = data.platform;
            document.getElementById('modalAppUser').textContent = data.user;
            document.getElementById('modalAppSync').textContent = data.sync;
            document.getElementById('modalAppDesc').textContent = data.desc;

            const listEl = document.getElementById('modalAppFeatureList');
            if (listEl && data.features) {
                listEl.innerHTML = data.features.map(f => `<li>${f}</li>`).join('');
            }

            const modal = document.getElementById('modalAppDetail');
            if (modal) modal.classList.remove('hidden');
        };

        window.closeModalAppDetail = function() {
            const modal = document.getElementById('modalAppDetail');
            if (modal) modal.classList.add('hidden');
        };

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
        window.previewPublikasi = function(filename) {
            const data = publikasiBpsDatabase[filename];
            if (!data) return;

            document.getElementById('modalPublikasiTitle').textContent = data.title;
            document.getElementById('modalPublikasiSub').textContent = data.sub;
            document.getElementById('modalPublikasiKatalog').textContent = data.katalog;
            document.getElementById('modalPublikasiNo').textContent = data.nomor;
            document.getElementById('modalPublikasiTgl').textContent = data.tanggal;
            document.getElementById('modalPublikasiHal').textContent = data.halaman;
            document.getElementById('modalPublikasiAbstrak').textContent = data.abstrak;

            const listEl = document.getElementById('modalPublikasiBabList');
            if (listEl && data.bab) {
                listEl.innerHTML = data.bab.map(b => `<li class="hover:text-slate-900 transition">${b}</li>`).join('');
            }

            const btnUnduh = document.getElementById('btnModalUnduhDokumen');
            if (btnUnduh) {
                btnUnduh.onclick = () => downloadPublikasi(filename);
            }

            const modal = document.getElementById('modalPublikasiPreview');
            modal.classList.remove('hidden');
        };

        window.closeModalPublikasi = function() {
            const modal = document.getElementById('modalPublikasiPreview');
            if (modal) modal.classList.add('hidden');
        };

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
                scopeText.innerHTML = `<span class="text-[#059669]">Fokus: Desa ${desa.nama} (${kec.nama})</span>`;
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
    <div id="modalPublikasiPreview" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm animate-fadeIn">
        <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] flex flex-col shadow-2xl overflow-hidden border border-slate-200">
            <div class="px-6 py-4 bg-[#0b2545] text-white flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div>
                        <h3 id="modalPublikasiTitle" class="text-sm sm:text-base font-extrabold text-white">Ringkasan Publikasi Resmi BPS</h3>
                        <p id="modalPublikasiSub" class="text-xs text-emerald-200">Badan Pusat Statistik Kabupaten Kolaka Utara</p>
                    </div>
                </div>
                <button onclick="closeModalPublikasi()" class="text-white/70 hover:text-white p-1 rounded-lg hover:bg-white/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-6 overflow-y-auto space-y-4 text-xs text-slate-700">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 bg-slate-50 p-3 rounded-xl border border-slate-200">
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase">Nomor Katalog</span>
                        <div id="modalPublikasiKatalog" class="font-bold text-[#0b2545] font-mono mt-0.5">-</div>
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase">Nomor Publikasi</span>
                        <div id="modalPublikasiNo" class="font-bold text-[#0b2545] font-mono mt-0.5">-</div>
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase">Tanggal Rilis</span>
                        <div id="modalPublikasiTgl" class="font-bold text-slate-800 mt-0.5">-</div>
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase">Ukuran / Halaman</span>
                        <div id="modalPublikasiHal" class="font-bold text-emerald-700 mt-0.5">-</div>
                    </div>
                </div>

                <div>
                    <h4 class="font-extrabold text-slate-900 text-sm mb-1.5">Abstrak & Ringkasan Dokumen:</h4>
                    <p id="modalPublikasiAbstrak" class="text-slate-600 leading-relaxed text-xs">
                        -
                    </p>
                </div>

                <div>
                    <h4 class="font-extrabold text-slate-900 text-sm mb-1.5">Bab & Cakupan Data Podes Terkait:</h4>
                    <ul id="modalPublikasiBabList" class="list-disc list-inside space-y-1 text-slate-600 text-xs">
                        <li>Karakteristik Wilayah Administrasi 15 Kecamatan & 133 Desa/Kelurahan</li>
                        <li>Sektor Komoditas Unggulan Perkebunan Kakao, Cengkeh, dan Pertanian</li>
                        <li>Potensi Perikanan Tangkap Laut dan Budidaya Tambak Pesisir</li>
                        <li>Indikator Kesejahteraan, Ketenagakerjaan, dan Kemandirian Desa (IPD)</li>
                    </ul>
                </div>
            </div>
            <div class="px-6 py-3.5 bg-slate-50 border-t border-slate-200 flex items-center justify-between gap-3">
                <a id="btnLinkBpsResmi" href="https://kolutkab.bps.go.id" target="_blank" rel="noopener noreferrer" class="text-xs text-[#005ea6] hover:underline font-bold flex items-center gap-1">
                    <span>Lihat di Portal Resmi BPS Kolut</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
                <div class="flex items-center gap-2">
                    <button onclick="closeModalPublikasi()" class="px-4 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold transition text-xs">
                        Tutup
                    </button>
                    <button id="btnModalUnduhDokumen" class="px-4 py-2 rounded-xl bg-[#059669] hover:bg-[#047857] text-white font-bold transition text-xs flex items-center gap-1.5 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        <span>Unduh Dokumen</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL: DETAIL FITUR APLIKASI DIGITAL DESA MADANI -->
    <div id="modalAppDetail" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm animate-fadeIn">
        <div class="bg-white rounded-3xl max-w-xl w-full max-h-[90vh] flex flex-col shadow-2xl overflow-hidden border border-slate-200">
            <div class="px-6 py-4 bg-[#0b2545] text-white flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div id="modalAppIconBox" class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 id="modalAppTitle" class="text-base font-black text-white">Madani Sensus Mobile</h3>
                        <p id="modalAppSub" class="text-xs text-emerald-200">Aplikasi Pendataan Digital Keluarga • BPS Kolaka Utara</p>
                    </div>
                </div>
                <button onclick="closeModalAppDetail()" class="text-white/70 hover:text-white p-1 rounded-lg hover:bg-white/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-6 overflow-y-auto space-y-4 text-xs text-slate-700">
                <div class="grid grid-cols-3 gap-2 bg-slate-50 p-3 rounded-2xl border border-slate-200 text-center">
                    <div>
                        <span class="text-[10px] text-slate-400 font-bold uppercase">Platform</span>
                        <div id="modalAppPlatform" class="font-extrabold text-[#0b2545] mt-0.5">Android & Web</div>
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-bold uppercase">Target Pengguna</span>
                        <div id="modalAppUser" class="font-extrabold text-[#059669] mt-0.5">Surveyor Desa</div>
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-bold uppercase">Status Integrasi</span>
                        <div id="modalAppSync" class="font-extrabold text-blue-700 mt-0.5">Live Sync BPS</div>
                    </div>
                </div>

                <div>
                    <h4 class="font-extrabold text-slate-900 text-sm mb-1.5">Deskripsi Lengkap:</h4>
                    <p id="modalAppDesc" class="text-slate-600 leading-relaxed text-xs">
                        -
                    </p>
                </div>

                <div>
                    <h4 class="font-extrabold text-slate-900 text-sm mb-1.5">Fitur Unggulan Sistem:</h4>
                    <ul id="modalAppFeatureList" class="list-disc list-inside space-y-1 text-slate-600 text-xs">
                        <li>Kuesioner digital terstruktur sesuai modul standar Podes & sensus BPS</li>
                        <li>Geotagging koordinat GPS presisi otomatis pada setiap rumah tangga</li>
                        <li>Dukungan mode offline di area tanpa sinyal dengan auto-sync saat tersambung</li>
                        <li>Validasi logika instan untuk mencegah kesalahan input data di lapangan</li>
                    </ul>
                </div>
            </div>
            <div class="px-6 py-3.5 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
                <span class="text-slate-500 font-mono text-[11px]">Versi Rilis: 2.4.0 (2026)</span>
                <div class="flex items-center gap-2">
                    <button onclick="closeModalAppDetail()" class="px-4 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold transition text-xs">
                        Tutup
                    </button>
                    <button onclick="showToast('Membuka demo aplikasi ' + currentSelectedAppId + '...'); closeModalAppDetail();" class="px-4 py-2 rounded-xl bg-[#059669] hover:bg-[#047857] text-white font-bold transition text-xs flex items-center gap-1.5 shadow-sm">
                        <span>Buka Demo Aplikasi</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
