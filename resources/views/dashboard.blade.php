@php
    $curPage = (int) ($activePage ?? request('page', 1));
    if ($curPage < 1 || $curPage > 5) $curPage = 1;
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Madani Kabupaten Kolaka Utara - Portal Satu Data & Analitik PODES 2025</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Cormorant+Garamond:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pine: {
                            charcoal: '#1D241E', // Main text & titles
                            moss: '#5E6B61',     // Secondary text / subtitles
                            mountain: '#3B4D3B', // Primary brand, buttons, active tabs
                            olive: '#566B53',    // Hover & secondary accents
                            mist: '#8A9B86',     // Subtle accents & inactive dots
                            badge: '#E6ECE6',    // Badge background
                            border: '#DCE3DD',   // Divider & borders
                        }
                    },
                    fontFamily: {
                        cinzel: ['"Cinzel"', 'serif'],
                        cormorant: ['"Cormorant Garamond"', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'ui-monospace', 'monospace']
                    }
                }
            }
        }
        }
    </script>

    <!-- Local Leaflet CSS & JS with CDN fallback -->
    <link rel="stylesheet" href="/vendor/leaflet/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="/vendor/leaflet/leaflet.js"></script>
    <script>
        if (typeof L === 'undefined') {
            document.write('<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"><\/script>');
        }
    </script>

    <!-- Chart.js with CDN fallback -->
    <script src="/vendor/chart.umd.min.js"></script>
    <script>
        if (typeof Chart === 'undefined') {
            document.write('<script src="https://cdn.jsdelivr.net/npm/chart.js"><\/script>');
        }
    </script>

    <!-- EMBEDDED GEOJSON DATA -->
    <script>
        window.KOLAKA_UTARA_GEOJSON = {!! file_get_contents(public_path('data/kolaka_utara_kecamatan.geojson')) !!};
        window.KOLUT_DESA_GEOJSON = {!! file_get_contents(public_path('data/kolut_desa_polygons.json')) !!};
    </script>
    <script src="/data/kolut_kecamatan_polygons.js"></script>
    <script src="/data/kolut_desa_polygons.js"></script>

    <!-- PODES 2025 DATABASE, DESA PRESISI ENGINE & PODES EXPLORER -->
    <script src="/data/podes_kolut_complete_2025.js?v=20261123_03"></script>
    <script src="/js/desa_presisi_engine.js?v=20261123_09"></script>
    <script src="/js/podes_explorer.js?v=20261123_09"></script>

    <style>
        html, body {
            overflow-x: hidden !important;
            max-width: 100vw !important;
            width: 100% !important;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: #F8FAF8;
            color: #1e293b;
            margin: 0;
            padding: 0;
        }

        .tabular-nums {
            font-variant-numeric: tabular-nums;
        }

        .leaflet-container {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            border-radius: 1rem;
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

        .portal-nav-link.active {
            color: #3B4D3B !important;
            font-weight: 800 !important;
        }
        .portal-nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            width: 32px;
            height: 2px;
            background-color: #3B4D3B;
            border-radius: 9999px;
        }

        .portal-page {
            display: none;
            animation: fadeIn 0.25s ease-in-out;
        }

        .portal-page.active {
            display: block !important;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(4px); }
            to { opacity: 1; transform: translateY(0); }
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    
        .no-scrollbar::-webkit-scrollbar {
            display: none !important;
        }
        .no-scrollbar {
            -ms-overflow-style: none !important;
            scrollbar-width: none !important;
        }
    
    
        .font-editorial {
            font-family: 'Playfair Display', Didot, 'Bodoni MT', Georgia, serif;
            letter-spacing: 0.04em;
        }
    
    
        /* Typography: Cinzel, Cormorant Garamond, Plus Jakarta Sans */
        .font-cinzel {
            font-family: 'Cinzel', serif !important;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .font-brand {
            font-family: 'Cinzel', serif !important;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .font-cormorant {
            font-family: 'Cormorant Garamond', Georgia, serif !important;
            font-weight: 600;
        }
        .font-editorial {
            font-family: 'Cormorant Garamond', Georgia, serif !important;
            font-weight: 600;
        }
        .eyebrow-label {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            background-color: #E6ECE6;
            color: #3B4D3B;
            border: 1px solid #DCE3DD;
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .portal-nav-link.active {
            color: #3B4D3B !important;
            font-weight: 800 !important;
        }
        .portal-nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            width: 32px;
            height: 2px;
            background-color: #3B4D3B;
            border-radius: 9999px;
        }

    </style>
</head>

<body class="bg-[#F8FAF8] text-slate-800 antialiased min-h-screen flex flex-col selection:bg-emerald-100 selection:text-emerald-900">

    <!-- TOP NAVIGATION BAR (IDENTIK & ELEGAN DENGAN DUA LOGO RESMI) -->
    <header class="bg-white/95 backdrop-blur-md text-slate-800 border-b border-slate-200 sticky top-0 z-50 transition-all min-h-[58px] flex items-center w-full max-w-full">
        <div class="w-full px-4 lg:px-8 py-2.5 flex items-center justify-between gap-4 max-w-[1720px] mx-auto">
            
            <!-- Sisi Kiri: Identitas Resmi Desa Madani & Logo Pemkab + BPS -->
            <div class="flex items-center gap-3 shrink-0">
                <a href="/portal" class="flex items-center gap-2 group text-left cursor-pointer focus:outline-none transition-transform hover:scale-[1.01] active:scale-[0.99] rounded-xl" title="Desa Madani Kabupaten Kolaka Utara">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#3B4D3B] animate-pulse"></span>
                    <div class="flex items-center gap-1.5 shrink-0 bg-slate-50 border border-slate-200 px-1.5 py-0.5 rounded-lg shadow-2xs">
                        <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-6 w-auto object-contain">
                        <div class="h-3.5 w-[1px] bg-slate-300"></div>
                        <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-5 w-auto object-contain">
                    </div>
                    <div class="text-base sm:text-lg font-bold text-[#1D241E] leading-none whitespace-nowrap font-cinzel tracking-[0.05em]">
                        DESA <span class="text-[#3B4D3B]">MADANI</span>
                        <span class="hidden sm:inline font-sans text-[11px] font-semibold text-[#5E6B61] ml-2 pl-2 border-l border-[#DCE3DD] tracking-[0.2em] uppercase">Kolaka Utara</span>
                    </div>
                </a>
            </div>

            <!-- Sisi Tengah: Menu Navigasi 5 Halaman Terpisah -->
            <nav class="hidden md:flex items-center gap-6 lg:gap-8 text-xs font-bold text-slate-600 whitespace-nowrap shrink-0">
                <a href="/portal" id="navLinkPage1" onclick="window.onNavClick(event, 1, '/portal')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative {{ $curPage === 1 ? 'active' : '' }}">
                    Beranda
                </a>
                <a href="/portal/agregat" id="navLinkPage2" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative {{ $curPage === 2 ? 'active' : '' }}">
                    Agregat 15 Kecamatan
                </a>
                <a href="/portal/peta" id="navLinkPage3" onclick="window.onNavClick(event, 3, '/portal/peta')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative flex items-center gap-1.5 {{ $curPage === 3 ? 'active' : '' }}">
                    <svg class="w-3.5 h-3.5 text-[#3B4D3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    <span>WebGIS Peta Spasial</span>
                </a>
                <a href="/portal/desa-cantik" id="navLinkPage4" onclick="window.onNavClick(event, 4, '/portal/desa-cantik')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative {{ $curPage === 4 ? 'active' : '' }}">
                    Desa Cantik (DESCAN)
                </a>
                <a href="/portal/tentang" id="navLinkPage5" onclick="window.onNavClick(event, 5, '/portal/tentang')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative {{ $curPage === 5 ? 'active' : '' }}">
                    Tentang Madani
                </a>
            </nav>

            <!-- Sisi Kanan: 15 Kecamatan Modal, Kelola Data, Bahasa -->
            <div class="flex items-center gap-2 sm:gap-2.5 shrink-0">
                <button onclick="window.toggleKecamatanModal()" id="btnOpenKecamatanModal" class="hidden xl:flex items-center gap-1.5 px-3 py-1.5 rounded-full border border-slate-200 hover:border-[#3B4D3B] text-slate-700 hover:text-[#3B4D3B] text-xs font-bold transition shrink-0 whitespace-nowrap cursor-pointer">
                    <svg class="w-3.5 h-3.5 text-[#3B4D3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    <span>15 Kecamatan</span>
                </button>

                <a href="/descan/login" id="btnOpenAdminPortal" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-bold px-3.5 py-1.5 rounded-full shadow-2xs hover:shadow transition flex items-center gap-1.5 text-xs transform hover:scale-105 active:scale-95 shrink-0 whitespace-nowrap cursor-pointer" title="Kelola Data">
                    <svg class="w-3.5 h-3.5 text-slate-950 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span>Kelola Data</span>
                </a>

                <div class="flex items-center bg-slate-100 rounded-full p-0.5 text-xs font-bold border border-slate-200 shrink-0">
                    <button type="button" id="btnLangID" onclick="window.setPortalLanguage('id')" class="px-2 py-0.5 rounded-full bg-[#3B4D3B] text-white shadow-2xs transition-all cursor-pointer font-bold text-[11px]">ID</button>
                    <button type="button" id="btnLangEN" onclick="window.setPortalLanguage('en')" class="px-2 py-0.5 rounded-full text-slate-600 hover:text-[#0b2545] transition-all cursor-pointer font-bold text-[11px]">EN</button>
                </div>
            </div>
        </div>

        <!-- Mobile Horizontal Scroll Menu -->
        <div class="flex md:hidden overflow-x-auto px-4 py-2 gap-2 border-t border-slate-100 no-scrollbar text-xs font-bold text-slate-600 w-full bg-white">
            <a href="/portal" onclick="window.onNavClick(event, 1, '/portal')" id="mNav1" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 1 ? 'bg-[#3B4D3B] text-white' : 'bg-slate-100 hover:bg-slate-200' }}">Beranda</a>
            <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" id="mNav2" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 2 ? 'bg-[#3B4D3B] text-white' : 'bg-slate-100 hover:bg-slate-200' }}">Agregat 15 Kec</a>
            <a href="/portal/peta" onclick="window.onNavClick(event, 3, '/portal/peta')" id="mNav3" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 3 ? 'bg-[#3B4D3B] text-white' : 'bg-slate-100 hover:bg-slate-200' }}">WebGIS Peta</a>
            <a href="/portal/desa-cantik" onclick="window.onNavClick(event, 4, '/portal/desa-cantik')" id="mNav4" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 4 ? 'bg-[#3B4D3B] text-white' : 'bg-slate-100 hover:bg-slate-200' }}">Desa Cantik</a>
            <a href="/portal/tentang" onclick="window.onNavClick(event, 5, '/portal/tentang')" id="mNav5" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 5 ? 'bg-[#3B4D3B] text-white' : 'bg-slate-100 hover:bg-slate-200' }}">Tentang</a>
            <a href="/descan" class="whitespace-nowrap px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">⭐ DESCAN</a>
        </div>
    </header>

    <div id="portal-content-top"></div>

    <!-- MAIN PAGES CONTAINER (PISAH 5 HALAMAN) -->
    <main class="flex-1 w-full">

        <!-- ========================================================================= -->
        <!-- HALAMAN 1: BERANDA / OPENING (KPI RIIL 2025 + PETA SVG INTERAKTIF KOLUT) -->
        <!-- ========================================================================= -->
        <section id="portalPage1" class="portal-page {{ $curPage === 1 ? 'active' : '' }} w-full">
            <!-- Hero Section Desapresisi Style with Kolaka Utara Background Watermark (Posisi Proporsional di Semua Layar) -->
            <div class="w-full bg-white border-b border-slate-200/80 pt-3 sm:pt-5 lg:pt-6 pb-6 sm:pb-8 lg:pb-10 relative overflow-hidden flex flex-col justify-center min-h-[calc(100vh-62px)]">
                
                <!-- Kolaka Utara Background Map Watermark (Identik dengan Desapresisi.id) -->
                
<svg class="absolute inset-0 w-full h-full object-cover pointer-events-none select-none z-0" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMid slice" fill="none" xmlns="http://www.w3.org/2000/svg">
    
    <!-- Lat / Lng Grid lines & coordinates -->
    <line x1="100" y1="160" x2="1550" y2="160" stroke="#e2e8f0" stroke-width="0.7" stroke-dasharray="6,8" opacity="0.6" />
    <text x="120" y="155" font-size="9" font-family="'JetBrains Mono', monospace" fill="#94a3b8" opacity="0.45">LAT 02°55'00"S</text>

    <line x1="100" y1="440" x2="1550" y2="440" stroke="#e2e8f0" stroke-width="0.7" stroke-dasharray="6,8" opacity="0.6" />
    <text x="120" y="435" font-size="9" font-family="'JetBrains Mono', monospace" fill="#94a3b8" opacity="0.45">LAT 03°15'00"S • IBU KOTA LASUSUA</text>

    <line x1="100" y1="720" x2="1550" y2="720" stroke="#e2e8f0" stroke-width="0.7" stroke-dasharray="6,8" opacity="0.6" />
    <text x="120" y="715" font-size="9" font-family="'JetBrains Mono', monospace" fill="#94a3b8" opacity="0.45">LAT 03°40'00"S</text>

    <line x1="500" y1="50" x2="500" y2="850" stroke="#e2e8f0" stroke-width="0.7" stroke-dasharray="6,8" opacity="0.5" />
    <text x="505" y="830" font-size="9" font-family="'JetBrains Mono', monospace" fill="#94a3b8" opacity="0.45">LONG 120°58'00"E</text>

    <!-- Geographic Labels in background -->
    <text x="360" y="480" font-size="14" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#cbd5e1" letter-spacing="8" opacity="0.3">TELUK BONE</text>
    <text x="1050" y="520" font-size="13" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#cbd5e1" letter-spacing="6" opacity="0.3" transform="rotate(45 1050 520)">PEGUNUNGAN MEKONGGA</text>

    
    <!-- Kolaka Utara Silhouette Watermark -->
    <g class="kolut-regions" opacity="0.7">
        
        <g class="kolut-bg-polygon" data-kec="Lasusua">
            <path d="M 687.1,603.0 L 786.4,625.6 L 840.1,621.4 L 860.4,634.5 L 799.8,671.5 L 717.5,705.3 L 711.1,702.9 L 716.7,714.8 L 712.2,727.0 L 700.7,722.2 L 692.9,702.5 L 670.5,687.8 L 665.7,679.6 L 674.6,681.3 L 651.1,651.4 L 645.5,627.3 L 643.0,606.7 L 687.1,603.0 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Pakue">
            <path d="M 801.2,391.3 L 891.9,449.0 L 875.3,468.8 L 867.6,466.3 L 865.6,489.1 L 837.7,484.4 L 773.2,444.7 L 762.2,454.7 L 750.7,432.8 L 759.5,428.1 L 767.4,402.5 L 782.1,393.1 L 794.5,399.0 L 801.2,391.3 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Batu Putih">
            <path d="M 777.8,261.7 L 776.9,261.2 L 777.0,260.6 L 777.9,261.2 L 777.8,261.7 Z M 786.1,254.2 L 786.4,254.2 L 786.5,254.5 L 786.2,254.4 L 786.1,254.2 Z M 800.5,228.1 L 799.9,227.7 L 799.9,227.5 L 800.5,227.8 L 800.5,228.1 Z M 793.7,221.8 L 793.3,223.1 L 792.4,223.0 L 792.3,222.5 L 793.7,221.8 Z M 793.9,207.6 L 793.6,207.3 L 793.8,206.8 L 794.1,207.2 L 793.9,207.6 Z M 793.1,206.3 L 792.9,206.2 L 792.9,206.0 L 793.1,206.2 L 793.1,206.3 Z M 793.6,204.4 L 809.5,221.0 L 827.4,222.6 L 823.5,261.0 L 840.4,264.6 L 839.3,276.1 L 851.1,276.3 L 842.7,292.4 L 847.6,296.5 L 909.7,306.8 L 924.5,321.9 L 994.9,356.0 L 1082.8,363.4 L 1081.4,395.8 L 979.2,379.4 L 855.5,325.1 L 788.2,305.5 L 788.9,283.7 L 778.8,277.0 L 777.3,265.9 L 787.1,255.1 L 793.4,266.3 L 800.1,262.6 L 802.2,244.4 L 813.0,249.6 L 814.5,234.7 L 800.3,236.0 L 804.5,222.8 L 794.9,224.3 L 796.2,208.6 L 793.6,204.4 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Rante Angin">
            <path d="M 871.8,660.0 L 883.6,671.5 L 853.6,683.4 L 844.8,698.1 L 832.6,702.4 L 800.1,734.0 L 788.0,732.9 L 780.9,753.4 L 759.3,772.4 L 733.5,743.9 L 755.1,718.4 L 781.7,715.4 L 863.3,658.5 L 871.8,660.0 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Kodeoha">
            <path d="M 701.8,498.3 L 707.6,505.9 L 704.0,513.6 L 714.5,521.5 L 856.1,595.9 L 839.4,606.4 L 713.5,575.0 L 663.2,538.9 L 701.8,498.3 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Ngapa">
            <path d="M 774.0,446.3 L 837.7,484.4 L 865.6,489.1 L 860.9,493.6 L 866.0,502.5 L 853.1,522.9 L 847.5,523.3 L 848.6,542.1 L 838.7,558.7 L 863.6,578.0 L 856.8,593.9 L 798.4,569.8 L 758.8,544.9 L 756.6,524.5 L 730.7,486.3 L 749.7,460.3 L 769.8,465.0 L 770.1,458.9 L 761.5,455.6 L 774.0,446.3 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Wawo">
            <path d="M 881.4,671.6 L 926.2,708.4 L 939.2,751.0 L 846.5,792.0 L 823.1,820.0 L 808.3,795.8 L 759.3,772.4 L 780.9,753.4 L 788.0,732.9 L 800.1,734.0 L 832.6,702.4 L 844.8,698.1 L 853.6,683.4 L 881.4,671.6 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Lambai">
            <path d="M 865.9,657.1 L 783.1,714.7 L 755.1,718.4 L 733.3,743.6 L 712.2,727.0 L 716.7,714.8 L 711.1,702.9 L 717.5,705.3 L 799.7,671.6 L 860.1,635.9 L 865.9,657.1 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Watunohu">
            <path d="M 753.4,430.8 L 753.7,440.4 L 769.8,465.0 L 749.7,460.3 L 731.0,486.3 L 726.5,480.3 L 711.3,482.5 L 710.1,465.5 L 722.3,443.8 L 753.4,430.8 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Pakue Tengah">
            <path d="M 819.8,339.0 L 892.5,374.3 L 959.8,414.5 L 921.6,415.2 L 914.5,436.1 L 891.9,449.0 L 805.3,392.1 L 790.5,390.1 L 790.0,342.2 L 819.8,339.0 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Pakue Utara">
            <path d="M 805.4,307.3 L 955.5,372.0 L 1005.8,386.6 L 1081.4,395.8 L 1077.2,452.6 L 1038.8,431.5 L 1005.1,431.7 L 972.3,420.7 L 820.8,339.0 L 790.0,342.2 L 778.4,319.4 L 788.2,305.5 L 805.4,307.3 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Porehu">
            <path d="M 908.9,136.3 L 918.5,135.5 L 922.2,148.6 L 933.6,153.4 L 938.7,164.3 L 973.7,179.8 L 975.8,193.6 L 999.2,217.0 L 1023.2,227.5 L 1029.7,246.4 L 1023.0,277.5 L 1041.9,298.0 L 1044.1,313.4 L 1062.6,323.0 L 1066.3,349.1 L 1082.8,363.4 L 994.9,356.0 L 924.5,321.9 L 909.7,306.8 L 842.7,292.4 L 852.3,278.4 L 838.9,275.7 L 838.9,263.6 L 823.5,261.0 L 827.4,222.6 L 861.9,225.9 L 868.9,222.7 L 863.5,209.7 L 881.4,212.8 L 907.0,125.0 L 908.9,136.3 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Katoi">
            <path d="M 663.4,539.7 L 713.5,575.0 L 839.4,606.4 L 840.1,621.4 L 798.9,626.9 L 688.8,602.8 L 643.0,606.7 L 640.0,572.6 L 663.0,552.6 L 663.4,539.7 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Tiwu">
            <path d="M 725.9,480.3 L 756.6,524.5 L 758.8,544.9 L 704.0,513.6 L 707.6,505.9 L 701.6,497.9 L 710.3,495.5 L 712.8,481.8 L 725.9,480.3 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
        <g class="kolut-bg-polygon" data-kec="Tolala">
            <path d="M 802.4,210.2 L 802.3,210.3 L 802.2,210.0 L 802.4,210.0 L 802.4,210.2 Z M 798.1,207.0 L 797.5,206.8 L 797.7,206.3 L 798.2,206.7 L 798.1,207.0 Z M 798.1,204.2 L 797.7,204.1 L 798.5,203.9 L 798.5,204.0 L 798.1,204.2 Z M 794.7,203.4 L 794.6,203.2 L 794.6,203.1 L 794.7,203.3 L 794.7,203.4 Z M 718.5,89.0 L 710.9,92.6 L 708.8,89.5 L 716.4,86.7 L 718.5,89.0 Z M 820.3,70.4 L 844.6,77.2 L 862.2,90.8 L 871.4,117.5 L 888.0,113.7 L 899.2,125.6 L 907.0,125.0 L 881.4,212.8 L 863.5,209.7 L 868.9,222.7 L 861.9,225.9 L 809.5,221.0 L 802.2,216.2 L 794.2,205.6 L 806.7,215.3 L 813.8,177.3 L 804.4,164.3 L 805.6,155.8 L 799.8,157.8 L 801.0,125.1 L 791.7,127.0 L 793.5,141.5 L 779.4,131.9 L 772.6,86.9 L 764.7,119.6 L 756.3,110.5 L 737.1,112.8 L 751.5,132.8 L 736.1,114.1 L 739.6,103.3 L 760.2,94.1 L 768.3,74.6 L 796.5,70.7 L 807.4,60.0 L 820.3,70.4 Z" fill="#f1f5f9" fill-opacity="0.3" stroke="#cbd5e1" stroke-width="0.9" stroke-dasharray="4,4" />
        </g>
    
    </g>

    <!-- Dashed Connectivity Trajectory Arcs -->
    <path d="M 250,150 Q 550,420 732.4,651.0 Q 1100,680 1550,820" stroke="#0D6E5B" stroke-width="1.8" stroke-dasharray="8,8" fill="none" opacity="0.15" />
    <path d="M 834.7,141.9 Q 902.3,233.2 909.9,324.5 Q 914.45,357.6 859.0,390.7 Q 825.7,520.85 732.4,651.0 Q 759.05,622.2 725.7,593.4 Q 820.6,668.0999999999999 855.5,742.8" stroke="#1e293b" stroke-width="2" stroke-dasharray="8,6" fill="none" opacity="0.2" />
    
    <!-- Pulsing Trajectory Nodes -->
    
        <circle cx="834.7" cy="141.9" r="4" fill="#0D6E5B" opacity="0.45" />
        <circle cx="834.7" cy="141.9" r="8" fill="none" stroke="#0D6E5B" stroke-width="1" stroke-dasharray="2,2" opacity="0.35" />
    
        <circle cx="909.9" cy="324.5" r="4" fill="#0D6E5B" opacity="0.45" />
        <circle cx="909.9" cy="324.5" r="8" fill="none" stroke="#0D6E5B" stroke-width="1" stroke-dasharray="2,2" opacity="0.35" />
    
        <circle cx="859.0" cy="390.7" r="4" fill="#0D6E5B" opacity="0.45" />
        <circle cx="859.0" cy="390.7" r="8" fill="none" stroke="#0D6E5B" stroke-width="1" stroke-dasharray="2,2" opacity="0.35" />
    
        <circle cx="732.4" cy="651.0" r="4" fill="#0D6E5B" opacity="0.45" />
        <circle cx="732.4" cy="651.0" r="8" fill="none" stroke="#0D6E5B" stroke-width="1" stroke-dasharray="2,2" opacity="0.35" />
    
        <circle cx="725.7" cy="593.4" r="4" fill="#0D6E5B" opacity="0.45" />
        <circle cx="725.7" cy="593.4" r="8" fill="none" stroke="#0D6E5B" stroke-width="1" stroke-dasharray="2,2" opacity="0.35" />
    
        <circle cx="855.5" cy="742.8" r="4" fill="#0D6E5B" opacity="0.45" />
        <circle cx="855.5" cy="742.8" r="8" fill="none" stroke="#0D6E5B" stroke-width="1" stroke-dasharray="2,2" opacity="0.35" />
    
</svg>


                <div class="max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-10 items-center">
                        
                        <!-- Sisi Kiri: Tipografi Bold Desapresisi, Pill Buttons & 4 KPI Riil 2025 -->
                        <div class="lg:col-span-7 flex flex-col justify-center space-y-3 sm:space-y-4 lg:space-y-5">
                            
                            <!-- Subtitle Tracking Uppercase -->
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200/80 text-[#3B4D3B] text-[11px] sm:text-xs font-bold tracking-[0.2em] font-mono w-fit">
                                <span class="w-2 h-2 rounded-full bg-[#3B4D3B] animate-pulse"></span>
                                <span>KABUPATEN KOLAKA UTARA</span>
                            </div>

                            <!-- Huge Bold Typography: DESA MADANI (Polos & Clean Look) -->
                            <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-[82px] font-black text-[#1D241E] tracking-tight leading-[0.92] my-1 sm:my-2">
                                DESA<br>
                                <span class="text-[#3B4D3B]">MADANI</span>
                            </h1>

                            <!-- Dua Tombol Kapsul Pill Buttons (Tema Warna Emerald & Navy, Tanpa Merah) -->
                            <div class="flex flex-wrap items-center gap-3 sm:gap-4 pt-1">
                                <!-- Pill 1: Emerald Kapsul "Lihat Seluruh Data" (Menuju Halaman 2) -->
                                <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="px-6 sm:px-7 py-3 sm:py-3.5 rounded-full bg-[#3B4D3B] hover:bg-[#566B53] text-white font-extrabold text-xs sm:text-sm shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2 cursor-pointer group">
                                    <span>Lihat Seluruh Data</span>
                                    <svg class="w-4 h-4 text-white/90 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/></svg>
                                </a>

                                <!-- Pill 2: Navy Kapsul "WebGIS Peta Spasial" (Menuju Halaman 3 Peta) -->
                                <a href="/portal/peta" onclick="window.onNavClick(event, 3, '/portal/peta')" class="px-6 sm:px-7 py-3 sm:py-3.5 rounded-full bg-[#1D241E] hover:bg-[#3B4D3B] text-white font-extrabold text-xs sm:text-sm shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2 cursor-pointer group">
                                    <svg class="w-4 h-4 text-emerald-400 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/></svg>
                                    <span>WebGIS Peta Spasial</span>
                                </a>
                            </div>

                            <!-- 4 KPI Riil 2025 Sesuai Permintaan User (Cards Floating Elegan, Proporsional di Semua Layar) -->
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 sm:gap-3 pt-3 sm:pt-4 border-t border-slate-200/80">
                                <div class="bg-white/90 backdrop-blur-sm rounded-xl sm:rounded-2xl p-2.5 sm:p-3 border border-slate-200/90 shadow-2xs hover:border-emerald-400 hover:shadow-md transition-all">
                                    <div class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-wider">Penduduk 2025</div>
                                    <div class="text-xl sm:text-2xl lg:text-[26px] font-black text-[#3B4D3B] mt-0.5 tabular-nums">145.679</div>
                                    <div class="text-[9px] sm:text-[10px] text-slate-500 font-medium">Jiwa Terdata Riil</div>
                                </div>
                                <div class="bg-white/90 backdrop-blur-sm rounded-xl sm:rounded-2xl p-2.5 sm:p-3 border border-slate-200/90 shadow-2xs hover:border-emerald-400 hover:shadow-md transition-all">
                                    <div class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-wider">Wilayah Adm</div>
                                    <div class="text-xl sm:text-2xl lg:text-[26px] font-black text-slate-900 mt-0.5 tabular-nums">15 / 133</div>
                                    <div class="text-[9px] sm:text-[10px] text-slate-500 font-medium">Kec / Desa-Kelurahan</div>
                                </div>
                                <div class="bg-white/90 backdrop-blur-sm rounded-xl sm:rounded-2xl p-2.5 sm:p-3 border border-slate-200/90 shadow-2xs hover:border-emerald-400 hover:shadow-md transition-all">
                                    <div class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-wider">Rasio Listrik</div>
                                    <div class="text-xl sm:text-2xl lg:text-[26px] font-black text-emerald-600 mt-0.5 tabular-nums">99,55%</div>
                                    <div class="text-[9px] sm:text-[10px] text-slate-500 font-medium">38.077 KK Berlistrik</div>
                                </div>
                                <div class="bg-white/90 backdrop-blur-sm rounded-xl sm:rounded-2xl p-2.5 sm:p-3 border border-slate-200/90 shadow-2xs hover:border-emerald-400 hover:shadow-md transition-all">
                                    <div class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-wider">Sentra & IMK</div>
                                    <div class="text-xl sm:text-2xl lg:text-[26px] font-black text-amber-600 mt-0.5 tabular-nums">3.622</div>
                                    <div class="text-[9px] sm:text-[10px] text-slate-500 font-medium">Unit Usaha Produktif</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sisi Kanan: Peta SVG Interaktif 15 Kecamatan (Plos / Seamless Tanpa Kotak, Pas di Semua Layar) -->
                        <div class="lg:col-span-5 flex flex-col items-center justify-center relative z-10 py-1 sm:py-2">
                            <div class="w-full flex flex-col items-center justify-center relative">
                                <svg viewBox="10 10 440 600" class="w-full h-auto max-h-[380px] sm:max-h-[440px] md:max-h-[480px] lg:max-h-[500px] xl:max-h-[540px] drop-shadow-md select-none transition-transform duration-300 filter hover:scale-[1.02]">
                                    
        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-lasusua" data-kec="Lasusua" onmouseenter="window.onSvgKecHover('svg-kec-lasusua')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-lasusua')">
            <title>Kecamatan Lasusua (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 64.7,434.4 L 158.9,451.6 L 209.8,448.5 L 229.1,458.4 L 171.6,486.7 L 93.5,512.5 L 87.4,510.6 L 92.8,519.7 L 88.5,529.0 L 77.6,525.4 L 70.2,510.3 L 49.0,499.1 L 44.4,492.8 L 52.8,494.2 L 30.5,471.3 L 25.2,452.9 L 22.9,437.2 L 64.7,434.4 Z" fill="#3B4D3B" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="107.6" y="471.0" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Lasusua</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-pakue" data-kec="Pakue" onmouseenter="window.onSvgKecHover('svg-kec-pakue')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-pakue')">
            <title>Kecamatan Pakue (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 172.9,272.9 L 259.0,316.9 L 243.2,332.0 L 235.9,330.0 L 234.0,347.5 L 207.5,343.9 L 146.3,313.6 L 136.0,321.2 L 125.0,304.5 L 133.4,301.0 L 140.8,281.4 L 154.8,274.2 L 166.6,278.7 L 172.9,272.9 Z" fill="#38bdf8" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="190.6" y="309.5" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Pakue</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-batuputih" data-kec="Batu Putih" onmouseenter="window.onSvgKecHover('svg-kec-batuputih')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-batuputih')">
            <title>Kecamatan Batu Putih (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 150.7,173.9 L 149.8,173.5 L 149.9,173.1 L 150.9,173.5 L 150.7,173.9 Z M 158.6,168.2 L 158.9,168.2 L 159.0,168.4 L 158.7,168.4 L 158.6,168.2 Z M 172.3,148.3 L 171.7,148.0 L 171.7,147.9 L 172.3,148.1 L 172.3,148.3 Z M 165.8,143.5 L 165.4,144.4 L 164.6,144.4 L 164.4,144.1 L 165.8,143.5 Z M 166.0,132.6 L 165.7,132.4 L 165.9,132.1 L 166.2,132.3 L 166.0,132.6 Z M 165.3,131.6 L 165.1,131.5 L 165.1,131.5 L 165.3,131.6 L 165.3,131.6 Z M 165.7,130.2 L 180.8,142.9 L 197.7,144.1 L 194.0,173.4 L 210.1,176.1 L 209.1,185.0 L 220.2,185.1 L 212.3,197.4 L 216.9,200.5 L 275.9,208.3 L 289.9,219.9 L 356.6,245.9 L 440.0,251.5 L 438.7,276.3 L 341.7,263.7 L 224.4,222.3 L 160.6,207.4 L 161.2,190.8 L 151.7,185.6 L 150.3,177.1 L 159.5,168.9 L 165.5,177.4 L 171.9,174.7 L 173.8,160.7 L 184.1,164.7 L 185.5,153.3 L 172.1,154.3 L 176.1,144.2 L 167.0,145.4 L 168.2,133.4 L 165.7,130.2 Z" fill="#10b981" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="276.0" y="221.9" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Batu Putih</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-ranteangin" data-kec="Rante Angin" onmouseenter="window.onSvgKecHover('svg-kec-ranteangin')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-ranteangin')">
            <title>Kecamatan Rante Angin (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 239.8,477.9 L 251.1,486.7 L 222.6,495.7 L 214.2,506.9 L 202.7,510.2 L 171.8,534.4 L 160.4,533.6 L 153.6,549.2 L 133.2,563.7 L 108.7,542.0 L 129.1,522.5 L 154.5,520.2 L 231.8,476.8 L 239.8,477.9 Z" fill="#8b5cf6" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="169.6" y="521.4" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Rante Angin</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-kodeoha" data-kec="Kodeoha" onmouseenter="window.onSvgKecHover('svg-kec-kodeoha')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-kodeoha')">
            <title>Kecamatan Kodeoha (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 78.6,354.5 L 84.2,360.3 L 80.7,366.2 L 90.6,372.2 L 225.0,428.9 L 209.2,437.0 L 89.7,413.0 L 42.0,385.5 L 78.6,354.5 Z" fill="#84cc16" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="120.5" y="401.1" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Kodeoha</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-ngapa" data-kec="Ngapa" onmouseenter="window.onSvgKecHover('svg-kec-ngapa')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-ngapa')">
            <title>Kecamatan Ngapa (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 147.1,314.8 L 207.5,343.9 L 234.0,347.5 L 229.6,350.9 L 234.4,357.7 L 222.1,373.2 L 216.8,373.5 L 217.9,387.9 L 208.5,400.6 L 232.1,415.3 L 225.7,427.5 L 170.3,409.0 L 132.7,390.1 L 130.6,374.5 L 106.1,345.3 L 124.1,325.5 L 143.1,329.1 L 143.4,324.4 L 135.3,321.9 L 147.1,314.8 Z" fill="#fbbf24" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="173.0" y="368.2" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Ngapa</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-wawo" data-kec="Wawo" onmouseenter="window.onSvgKecHover('svg-kec-wawo')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-wawo')">
            <title>Kecamatan Wawo (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 249.0,486.8 L 291.5,514.9 L 303.9,547.3 L 215.9,578.6 L 193.7,600.0 L 179.7,581.6 L 133.2,563.7 L 153.6,549.2 L 160.4,533.6 L 171.8,534.4 L 202.7,510.2 L 214.2,506.9 L 222.6,495.7 L 249.0,486.8 Z" fill="#a855f7" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="224.5" y="541.1" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Wawo</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-lambai" data-kec="Lambai" onmouseenter="window.onSvgKecHover('svg-kec-lambai')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-lambai')">
            <title>Kecamatan Lambai (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 234.3,475.6 L 155.7,519.6 L 129.1,522.5 L 108.5,541.7 L 88.5,529.0 L 92.8,519.7 L 87.4,510.6 L 93.5,512.5 L 171.5,486.7 L 228.8,459.5 L 234.3,475.6 Z" fill="#6366f1" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="155.2" y="502.7" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Lambai</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-watunohu" data-kec="Watunohu" onmouseenter="window.onSvgKecHover('svg-kec-watunohu')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-watunohu')">
            <title>Kecamatan Watunohu (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 127.6,303.0 L 127.8,310.3 L 143.1,329.1 L 124.1,325.5 L 106.3,345.4 L 102.1,340.8 L 87.6,342.4 L 86.5,329.5 L 98.1,312.9 L 127.6,303.0 Z" fill="#d97706" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="111.1" y="323.9" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Watunohu</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-pakuetengah" data-kec="Pakue Tengah" onmouseenter="window.onSvgKecHover('svg-kec-pakuetengah')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-pakuetengah')">
            <title>Kecamatan Pakue Tengah (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 190.6,232.9 L 259.5,259.9 L 323.4,290.5 L 287.1,291.0 L 280.4,307.0 L 259.0,316.9 L 176.8,273.5 L 162.8,271.9 L 162.3,235.4 L 190.6,232.9 Z" fill="#0ea5e9" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="227.7" y="272.3" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Pakue Tengah</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-pakueutara" data-kec="Pakue Utara" onmouseenter="window.onSvgKecHover('svg-kec-pakueutara')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-pakueutara')">
            <title>Kecamatan Pakue Utara (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 176.9,208.7 L 319.3,258.1 L 367.0,269.3 L 438.7,276.3 L 434.7,319.6 L 398.3,303.5 L 366.4,303.7 L 335.2,295.3 L 191.5,232.9 L 162.3,235.4 L 151.3,218.0 L 160.6,207.4 L 176.9,208.7 Z" fill="#0284c7" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="311.5" y="265.0" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Pakue Utara</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-porehu" data-kec="Porehu" onmouseenter="window.onSvgKecHover('svg-kec-porehu')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-porehu')">
            <title>Kecamatan Porehu (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 275.0,78.2 L 284.2,77.6 L 287.7,87.7 L 298.5,91.3 L 303.3,99.6 L 336.6,111.4 L 338.5,121.9 L 360.8,139.8 L 383.5,147.9 L 389.7,162.3 L 383.3,186.0 L 401.3,201.6 L 403.3,213.4 L 420.8,220.7 L 424.4,240.6 L 440.0,251.5 L 356.6,245.9 L 289.9,219.9 L 275.9,208.3 L 212.3,197.4 L 221.4,186.7 L 208.7,184.6 L 208.7,175.3 L 194.0,173.4 L 197.7,144.1 L 230.5,146.6 L 237.1,144.2 L 232.0,134.3 L 249.0,136.6 L 273.3,69.6 L 275.0,78.2 Z" fill="#059669" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="312.2" y="174.6" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Porehu</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-katoi" data-kec="Katoi" onmouseenter="window.onSvgKecHover('svg-kec-katoi')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-katoi')">
            <title>Kecamatan Katoi (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 42.2,386.1 L 89.7,413.0 L 209.2,437.0 L 209.8,448.5 L 170.8,452.7 L 66.3,434.2 L 22.9,437.2 L 20.0,411.2 L 41.9,395.9 L 42.2,386.1 Z" fill="#22c55e" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="101.3" y="427.0" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Katoi</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-tiwu" data-kec="Tiwu" onmouseenter="window.onSvgKecHover('svg-kec-tiwu')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-tiwu')">
            <title>Kecamatan Tiwu (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 101.5,340.7 L 130.6,374.5 L 132.7,390.1 L 80.7,366.2 L 84.2,360.3 L 78.4,354.2 L 86.7,352.4 L 89.0,341.9 L 101.5,340.7 Z" fill="#f59e0b" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="105.5" y="364.4" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Tiwu</text>
        </g>

        <g class="kec-svg-group cursor-pointer transition-all duration-200" id="svg-kec-tolala" data-kec="Tolala" onmouseenter="window.onSvgKecHover('svg-kec-tolala')" onmouseleave="window.onSvgKecLeave()" onclick="window.onSvgKecClick('svg-kec-tolala')">
            <title>Kecamatan Tolala (Klik untuk eksplorasi di WebGIS)</title>
            <path d="M 174.1,134.6 L 173.9,134.7 L 173.9,134.5 L 174.1,134.5 L 174.1,134.6 Z M 170.0,132.2 L 169.4,132.0 L 169.6,131.7 L 170.1,132.0 L 170.0,132.2 Z M 170.0,130.0 L 169.6,129.9 L 170.3,129.8 L 170.4,129.9 L 170.0,130.0 Z M 166.7,129.4 L 166.6,129.3 L 166.7,129.2 L 166.8,129.4 L 166.7,129.4 Z M 94.5,42.2 L 87.2,44.9 L 85.3,42.5 L 92.4,40.4 L 94.5,42.2 Z M 191.0,27.9 L 214.1,33.1 L 230.8,43.5 L 239.5,63.9 L 255.3,61.0 L 265.9,70.0 L 273.3,69.6 L 249.0,136.6 L 232.0,134.3 L 237.1,144.2 L 230.5,146.6 L 180.8,142.9 L 173.9,139.2 L 166.3,131.1 L 178.1,138.5 L 184.9,109.5 L 176.0,99.6 L 177.1,93.1 L 171.6,94.6 L 172.7,69.7 L 163.9,71.1 L 165.6,82.2 L 152.2,74.9 L 145.7,40.5 L 138.3,65.5 L 130.3,58.6 L 112.1,60.3 L 125.8,75.6 L 111.2,61.3 L 114.5,53.1 L 134.0,46.0 L 141.8,31.1 L 168.5,28.2 L 178.8,20.0 L 191.0,27.9 Z" fill="#3B4D3B" fill-opacity="0.88" stroke="#ffffff" stroke-width="2.2" class="kec-svg-path transition-all duration-200 hover:fill-opacity-100 hover:stroke-[#3B4D3B] hover:stroke-[3.5] drop-shadow-md"/>
            <text x="204.7" y="82.5" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Tolala</text>
        </g>
                                </svg>

                                <!-- Floating Live Indicator Badge (Plos & Elegan) -->
                                <div class="mt-2 text-center">
                                    <div id="svgKecFloatingBadge" class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/90 backdrop-blur-md border border-slate-200/80 shadow-2xs text-[11px] text-slate-600 transition-all">
                                        <span class="w-2 h-2 rounded-full bg-[#3B4D3B] animate-pulse"></span>
                                        <span id="svgKecFloatingText" class="font-medium">Klik salah satu kecamatan untuk buka di Peta WebGIS</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Strip 3 Koridor Wilayah Pembangunan (Regional Dispatches) -->
            <div class="max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="text-center max-w-2xl mx-auto mb-8">
                    <span class="text-xs font-bold text-[#3B4D3B] uppercase tracking-wider">Kewilayahan PODES 2025</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-1">3 Koridor Pembangunan Kolaka Utara</h2>
                    <p class="text-slate-600 text-xs sm:text-sm mt-1.5">Segmentasi strategis agregasi 15 kecamatan berdasarkan karakteristik agribisnis dan geografi.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs hover:border-emerald-300 hover:shadow-md transition-all">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-[#3B4D3B] font-bold text-xs">KORIDOR I • UTARA</span>
                            <span class="text-xs font-bold text-slate-400">4 KECAMATAN</span>
                        </div>
                        <h3 class="text-lg font-black text-slate-800 mt-3">Episentrum Industri & Pesisir</h3>
                        <p class="text-xs text-slate-500 mt-1">Tolala, Porehu, Batu Putih, Pakue Utara.</p>
                        <div class="mt-4 pt-4 border-t border-slate-100 space-y-2 text-xs">
                            <div class="flex justify-between"><span class="text-slate-500">Sentra IMK Terbesar:</span><span class="font-extrabold text-amber-600">Porehu (1.440 IMK)</span></div>
                            <div class="flex justify-between"><span class="text-slate-500">Komoditas Utama:</span><span class="font-semibold text-slate-700">Kakao, Lada, Nilam</span></div>
                            <div class="flex justify-between"><span class="text-slate-500">Total Desa:</span><span class="font-semibold text-slate-700">38 Desa</span></div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs hover:border-emerald-300 hover:shadow-md transition-all">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <span class="px-2.5 py-1 rounded-full bg-teal-50 text-teal-800 font-bold text-xs">KORIDOR II • TENGAH</span>
                            <span class="text-xs font-bold text-slate-400">7 KECAMATAN</span>
                        </div>
                        <h3 class="text-lg font-black text-slate-800 mt-3">Ibukota, Pendidikan & Medis</h3>
                        <p class="text-xs text-slate-500 mt-1">Lasusua, Katoi, Kodeoha, Tiwu, Ngapa, Watunohu, Pakue.</p>
                        <div class="mt-4 pt-4 border-t border-slate-100 space-y-2 text-xs">
                            <div class="flex justify-between"><span class="text-slate-500">Konsentrasi PLN:</span><span class="font-extrabold text-emerald-600">Lasusua (8.463 KK)</span></div>
                            <div class="flex justify-between"><span class="text-slate-500">Fasilitas Sosial:</span><span class="font-semibold text-slate-700">RSUD Kelas C, 3 Kampus PT</span></div>
                            <div class="flex justify-between"><span class="text-slate-500">Total Desa:</span><span class="font-semibold text-slate-700">67 Desa / Kel</span></div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs hover:border-emerald-300 hover:shadow-md transition-all">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-800 font-bold text-xs">KORIDOR III • SELATAN</span>
                            <span class="text-xs font-bold text-slate-400">4 KECAMATAN</span>
                        </div>
                        <h3 class="text-lg font-black text-slate-800 mt-3">Pertanian Sawah & Konservasi</h3>
                        <p class="text-xs text-slate-500 mt-1">Lambai, Rante Angin, Wawo, Pakue Tengah.</p>
                        <div class="mt-4 pt-4 border-t border-slate-100 space-y-2 text-xs">
                            <div class="flex justify-between"><span class="text-slate-500">Basis Ekonomi:</span><span class="font-extrabold text-slate-700">Padi Sawah & Cengkeh</span></div>
                            <div class="flex justify-between"><span class="text-slate-500">Aparatur Aktif:</span><span class="font-semibold text-slate-700">224 Aparatur Desa</span></div>
                            <div class="flex justify-between"><span class="text-slate-500">Total Desa:</span><span class="font-semibold text-slate-700">28 Desa</span></div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 text-center">
                    <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-2xl bg-white hover:bg-emerald-50 text-[#3B4D3B] border border-emerald-300 font-bold text-sm shadow-sm hover:shadow-md transition-all cursor-pointer">
                        <span>Lanjut ke Halaman 2: Agregat 15 Kecamatan & Eksplorasi 133 Desa</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- HALAMAN 2: RINGKASAN & EKSPLORASI 133 DESA (TWO-STAGE EXPLORATION) -->
        <!-- ========================================================================= -->
        <section id="portalPage2" class="portal-page {{ $curPage === 2 ? 'active' : '' }} w-full py-8 sm:py-10">
            <div class="max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
                
                <!-- 1. Header Halaman (Tetap Ringkas & Pemisah Halus #DCE3DD) -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-[#DCE3DD] pb-5">
                    <div>
                        <h2 class="font-cormorant text-3xl sm:text-4xl lg:text-5xl font-bold text-[#1D241E] tracking-tight leading-tight">Jelajah & Eksplorasi 133 Desa</h2>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <button id="btnExplorerExportCSV" onclick="window.exportActiveTableCSV()" class="px-5 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-xs sm:text-sm shadow-sm transition-all flex items-center gap-2 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>Unduh Data CSV (133 Desa)</span>
                        </button>
                    </div>
                </div>

                <!-- =================================================================== -->
                <!-- STATE 1: DIREKTORI 15 KECAMATAN (HORIZONTAL CARD CAROUSEL & SEARCH) -->
                <!-- =================================================================== -->
                <div id="podesStateDirectory" class="space-y-6">
                    <!-- Search Bar Kapsul (Rounded-full) di Sisi Kiri dengan Ikon Kaca Pembesar di Kanan -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="relative w-full max-w-md">
                            <input type="text" id="kecamatanPillSearch" placeholder="Cari kecamatan atau nama desa..." class="w-full bg-white border border-slate-300 rounded-full pl-5 pr-12 py-3 text-xs sm:text-sm font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#3B4D3B] focus:border-transparent shadow-xs transition-all">
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                                <i class="bi bi-search text-[#5E6B61]"></i>
                            </div>
                        </div>

                        <!-- Carousel Navigation Buttons & Scroll Indicator -->
                        <div class="flex items-center gap-3 self-end sm:self-auto">
                            <div class="hidden sm:flex items-center gap-1.5 text-xs text-slate-400 font-semibold mr-2">
                                <span class="w-2 h-2 rounded-full bg-[#3B4D3B]"></span>
                                <span>15 Kecamatan</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <button onclick="window.scrollKecCarousel(-1)" class="w-9 h-9 rounded-full bg-white border border-[#DCE3DD] hover:bg-[#E6ECE6] text-[#1D241E] hover:text-[#3B4D3B] flex items-center justify-center text-sm font-bold shadow-2xs transition-all cursor-pointer" title="Geser ke kiri"><i class="bi bi-chevron-left"></i></button>
                                <button onclick="window.scrollKecCarousel(1)" class="w-9 h-9 rounded-full bg-white border border-[#DCE3DD] hover:bg-[#E6ECE6] text-[#1D241E] hover:text-[#3B4D3B] flex items-center justify-center text-sm font-bold shadow-2xs transition-all cursor-pointer" title="Geser ke kanan"><i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Horizontal Carousel Container (Peeking Card Effect on the Right) -->
                    <div class="relative w-full">
                        <div id="kecamatanCarouselTrack" class="flex gap-4 sm:gap-5 overflow-x-auto no-scrollbar scroll-smooth py-4 px-2 cursor-grab select-none">
                            <!-- Injected by podes_explorer.js -->
                        </div>
                        
                        <div id="carouselNoResults" class="hidden py-12 text-center bg-white rounded-3xl border border-slate-200">
                            <span class="text-3xl"><i class="bi bi-search"></i></span>
                            <p class="text-sm font-bold text-slate-700 mt-2">Kecamatan atau desa tidak ditemukan</p>
                            <p class="text-xs text-slate-400">Silakan periksa ejaan nama kecamatan atau desa yang dicari.</p>
                        </div>

                        <!-- Scroll Bar Indicator Line -->
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                            <div id="carouselScrollProgress" class="bg-[#3B4D3B] h-full rounded-full transition-all duration-150" style="width: 20%;"></div>
                        </div>
                    </div>

                    <!-- Ringkasan Agregat Kabupaten Kolaka Utara (Below Carousel) -->
                    <div class="pt-4">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#3B4D3B]"></span>
                                <h3 class="font-extrabold text-sm uppercase tracking-wider text-slate-700">Ringkasan Agregat Kabupaten Kolaka Utara</h3>
                            </div>
                            <span class="text-[11px] font-semibold text-slate-500">BPS PODES 2025</span>
                        </div>
                        <div id="explorerAggregateSummary">
                            <!-- Injected by podes_explorer.js -->
                        </div>
                    </div>
                </div>

                <!-- =================================================================== -->
                <!-- STATE 2: DETAIL KECAMATAN (SPLIT-PANEL DUA KOLOM + SWIPEABLE CARD) -->
                <!-- =================================================================== -->
                <div id="podesStateDetail" class="space-y-6" style="display: none;">
                    
                    <!-- Split-Panel Dua Kolom Simetris (50:50 Desktop, Rounded-3xl, Border #DCE3DD) -->
                    <div class="bg-white rounded-3xl border border-[#DCE3DD] shadow-xs overflow-hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-2 divide-y lg:divide-y-0 lg:divide-x divide-[#DCE3DD]">
                            <!-- Panel Kiri (Statis: Sektor Unggulan) -->
                            <div id="kecDetailLeftPanel" class="w-full h-full bg-white">
                                <!-- Injected by podes_explorer.js -->
                            </div>

                            <!-- Panel Kanan (Swipeable Card: Sektor Lainnya) -->
                            <div id="kecDetailRightPanel" class="w-full h-full bg-[#F8FAF8]">
                                <!-- Injected by podes_explorer.js -->
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Rincian Desa Khusus Kecamatan Terpilih -->
                    <div class="bg-white rounded-3xl border border-[#DCE3DD] shadow-xs p-6 sm:p-8 space-y-5">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-3 border-b border-[#DCE3DD]">
                            <div>
                                <h4 class="font-cormorant font-bold text-2xl sm:text-3xl text-[#1D241E]">Rincian Desa & Kelurahan Konstituen</h4>
                                <p class="text-xs text-[#5E6B61] mt-0.5 font-sans">Tabel data riil desa di wilayah kecamatan yang sedang dipilih.</p>
                            </div>
                            
                            <div class="flex flex-wrap items-center gap-2.5">
                                <div class="relative w-full sm:w-64">
                                    <input type="text" id="detailDesaTableSearch" placeholder="Cari nama desa..." class="w-full bg-white border border-[#DCE3DD] rounded-full pl-8 pr-3 py-1.5 text-xs font-medium text-[#1D241E] placeholder-[#8A9B86] focus:outline-none focus:ring-2 focus:ring-[#3B4D3B] font-sans">
                                    <i class="bi bi-search text-[#8A9B86] absolute left-2.5 top-2.5 text-xs"></i>
                                </div>
                                <button onclick="window.exportKecamatanCSV()" class="px-4 py-1.5 rounded-full bg-[#E6ECE6] hover:bg-[#DCE3DD] text-[#3B4D3B] border border-[#DCE3DD] font-semibold text-xs transition-all flex items-center gap-1.5 cursor-pointer font-sans">
                                    <i class="bi bi-download"></i>
                                    <span>Unduh CSV Kecamatan</span>
                                </button>
                            </div>
                        </div>

                        <!-- Table Tab Selector -->
                        <div class="flex flex-wrap gap-2">
                            <button onclick="window.setDetailTableTab('demografi')" data-tab="demografi" class="btn-detail-table-tab px-3.5 py-1.5 rounded-full text-xs font-semibold transition-all bg-[#3B4D3B] text-white shadow-2xs font-sans">
                                <i class="bi bi-people-fill"></i> Kependudukan & Demografi
                            </button>
                            <button onclick="window.setDetailTableTab('ekonomi')" data-tab="ekonomi" class="btn-detail-table-tab px-3.5 py-1.5 rounded-full text-xs font-semibold transition-all bg-[#E6ECE6]/60 text-[#5E6B61] hover:bg-[#E6ECE6] hover:text-[#1D241E] font-sans">
                                <i class="bi bi-buildings-fill"></i> Ekonomi, Komoditas & IMK
                            </button>
                            <button onclick="window.setDetailTableTab('fasilitas')" data-tab="fasilitas" class="btn-detail-table-tab px-3.5 py-1.5 rounded-full text-xs font-semibold transition-all bg-[#E6ECE6]/60 text-[#5E6B61] hover:bg-[#E6ECE6] hover:text-[#1D241E] font-sans">
                                <i class="bi bi-shield-check"></i> Sekolah, Faskes & Lingkungan
                            </button>
                        </div>

                        <!-- Dynamic Village Table Container -->
                        <div id="detailVillageTableContainer" class="w-full">
                            <!-- Injected by podes_explorer.js -->
                        </div>
                    </div>
                </div>

                <!-- Bottom Navigation Buttons for Page 2 -->
                <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                    <a href="/portal" onclick="window.onNavClick(event, 1, '/portal')" class="px-5 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 font-bold text-xs sm:text-sm transition-all flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        <span>Halaman 1: Beranda</span>
                    </a>
                    <a href="/portal/peta" onclick="window.onNavClick(event, 3, '/portal/peta')" class="px-6 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-xs sm:text-sm shadow-sm transition-all flex items-center gap-2 cursor-pointer">
                        <span>Halaman 3: WebGIS Peta Spasial</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- HALAMAN 3: PETA TEMATIK INTERAKTIF (LEAFLET 15 KECAMATAN + 6 LAPISAN DATA)-->
        <!-- ========================================================================= -->
        <section id="portalPage3" class="portal-page {{ $curPage === 3 ? 'active' : '' }} w-full py-10">
            <div class="max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
                
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-slate-200 pb-5">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100/80 text-[#3B4D3B] text-xs font-bold mb-2">
                            <span><i class="bi bi-map-fill"></i> WEBGIS TEMATIK PODES 2025</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">Peta Tematik Interaktif 15 Kecamatan</h2>
                        <p class="text-slate-600 text-sm mt-1">Visualisasi 6 lapisan indikator spasial riil dan direktori desa/kelurahan konstituen.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span id="presisiScopeBadge" class="px-3.5 py-1.5 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs border border-slate-200">
                            Kabupaten Kolaka Utara
                        </span>
                    </div>
                </div>

                <!-- 6 Lapisan Indikator Tematik Selector Bar -->
                <div class="bg-white rounded-2xl p-3 border border-slate-200/90 shadow-xs flex flex-wrap gap-2 items-center">
                    <span class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider px-2">Pilih Lapisan:</span>
                    <button onclick="window.PresisiEngine.setLeaderboardMetric('jiwa')" class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all bg-emerald-50 text-emerald-800 hover:bg-[#3B4D3B] hover:text-white border border-emerald-200">
                        <i class="bi bi-people-fill"></i> Jumlah Penduduk
                    </button>
                    <button onclick="window.PresisiEngine.setLeaderboardMetric('pln')" class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all bg-emerald-50 text-emerald-800 hover:bg-[#3B4D3B] hover:text-white border border-emerald-200">
                        ⚡ Rasio Elektrifikasi PLN
                    </button>
                    <button onclick="window.PresisiEngine.setLeaderboardMetric('imk')" class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all bg-[#3B4D3B] text-white border border-emerald-700 shadow-xs">
                        <i class="bi bi-buildings-fill"></i> Sentra IMK (3.622 Unit)
                    </button>
                    <button onclick="window.PresisiEngine.setLeaderboardMetric('faskes')" class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all bg-emerald-50 text-emerald-800 hover:bg-[#3B4D3B] hover:text-white border border-emerald-200">
                        <i class="bi bi-hospital-fill"></i> Faskes & Posyandu
                    </button>
                    <button onclick="window.PresisiEngine.setLeaderboardMetric('sid')" class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all bg-emerald-50 text-emerald-800 hover:bg-[#3B4D3B] hover:text-white border border-emerald-200">
                        <i class="bi bi-laptop"></i> SID & Sistem Informasi
                    </button>
                    <button onclick="window.PresisiEngine.setLeaderboardMetric('bumdes')" class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all bg-emerald-50 text-emerald-800 hover:bg-[#3B4D3B] hover:text-white border border-emerald-200">
                        <i class="bi bi-wallet2"></i> Kemandirian BUMDes
                    </button>
                </div>

                <!-- Split Map & Inspection Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                    <div class="lg:col-span-8 bg-white rounded-3xl p-4 border border-slate-200/90 shadow-sm relative">
                        <div class="w-full h-[520px] sm:h-[600px] rounded-2xl overflow-hidden relative">
                            <div id="mapPresisi" class="w-full h-full"></div>
                            
                            <div class="absolute top-4 left-4 z-[500] bg-white/95 backdrop-blur-md px-3.5 py-2 rounded-xl shadow-md border border-slate-200/80 text-xs">
                                <span class="text-slate-400 font-semibold text-[10px] block">LAPISAN AKTIF</span>
                                <span id="presisiMapMetricIndicator" class="font-extrabold text-slate-800">Sentra Industri Mikro Kecil (IMK)</span>
                            </div>

                            <div id="presisiMapLegend" class="absolute bottom-4 right-4 z-[500] bg-white/95 backdrop-blur-md p-3 rounded-xl shadow-md border border-slate-200/80 text-xs"></div>
                        </div>
                    </div>

                    <div class="lg:col-span-4 bg-white rounded-3xl p-6 border border-slate-200/90 shadow-sm space-y-5">
                        <div class="pb-3 border-b border-slate-100">
                            <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full uppercase tracking-wider">DETAIL KECAMATAN TERPILIH</span>
                            <h3 id="presisiAnalisisTitle" class="text-2xl font-black text-slate-900 mt-2">Kecamatan Lasusua</h3>
                            <p id="presisiAnalisisSubtitle" class="text-xs text-slate-500 mt-0.5">Ibu Kota Kabupaten Kolaka Utara • 12 Desa/Kelurahan</p>
                        </div>

                        <div class="grid grid-cols-2 gap-2.5 text-xs">
                            <div class="bg-slate-50 p-3 rounded-xl border border-slate-200/80">
                                <span class="text-slate-400 text-[10px] block">TOTAL PENDUDUK</span>
                                <span id="analisisKpiVal1" class="text-base font-extrabold text-slate-800">26.729 Jiwa</span>
                            </div>
                            <div class="bg-slate-50 p-3 rounded-xl border border-slate-200/80">
                                <span class="text-slate-400 text-[10px] block">LISTRIK PLN</span>
                                <span id="analisisKpiVal2" class="text-base font-extrabold text-emerald-700">8.463 KK</span>
                            </div>
                            <div class="bg-slate-50 p-3 rounded-xl border border-slate-200/80">
                                <span class="text-slate-400 text-[10px] block">SENTRA IMK</span>
                                <span id="analisisKpiVal3" class="text-base font-extrabold text-amber-600">237 Unit</span>
                            </div>
                            <div class="bg-slate-50 p-3 rounded-xl border border-slate-200/80">
                                <span class="text-slate-400 text-[10px] block">BUMDES AKTIF</span>
                                <span id="analisisKpiVal4" class="text-base font-extrabold text-indigo-700">13 Unit</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Daftar Desa / Kelurahan Konstituen</h4>
                                <span id="badgeJumlahDesaWilayah" class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-slate-100 text-slate-600">12 Wilayah</span>
                            </div>
                            <div id="presisiQuickVillageList" class="max-h-60 overflow-y-auto space-y-1.5 pr-1 text-xs"></div>
                        </div>

                        <div class="pt-2">
                            <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="w-full py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                                <span>Buka Tabel Lengkap Desa di Halaman 2</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Bottom Navigation Buttons for Page 3 -->
                <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                    <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="px-5 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 font-bold text-xs sm:text-sm transition-all flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        <span>Halaman 2: Agregat 15 Kecamatan</span>
                    </a>
                    <a href="/portal/desa-cantik" onclick="window.onNavClick(event, 4, '/portal/desa-cantik')" class="px-6 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-xs sm:text-sm shadow-sm transition-all flex items-center gap-2 cursor-pointer">
                        <span>Halaman 4: 6 Desa Cantik</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- HALAMAN 4: 6 DESA CANTIK (CINTA STATISTIK - 100% ANGKA RIIL PODES 2025)   -->
        <!-- ========================================================================= -->
        <section id="portalPage4" class="portal-page {{ $curPage === 4 ? 'active' : '' }} w-full py-10">
            <div class="max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
                
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-slate-200 pb-6">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100/80 text-[#3B4D3B] text-xs font-bold mb-2">
                            <span>⭐ PROGRAM PRIORITAS BPS</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">Profil Monografi 6 Desa Cantik</h2>
                        <p class="text-slate-600 text-sm mt-1">Desa Cinta Statistik percontohan BPS Kabupaten Kolaka Utara dengan 100% data riil 9 berkas PODES 2025.</p>
                    </div>
                    <div>
                        <a href="/descan" class="px-5 py-2.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-[#3B4D3B] border border-emerald-300 font-bold text-xs sm:text-sm shadow-xs transition-all flex items-center gap-2">
                            <span>Buka Menu Lengkap DESCAN</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 pb-2">
                    
        <button onclick="window.switchDesaCantikTab('kamisi')" id="tab-desacan-kamisi" class="desacan-tab-btn px-4 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-200 flex items-center gap-2 bg-[#3B4D3B] text-white shadow-sm">
            <span class="w-2 h-2 rounded-full bg-emerald-300"></span>
            <span>Kamisi</span>
            <span class="text-[10px] opacity-80 font-normal">(Kodeoha)</span>
        </button>
    

        <button onclick="window.switchDesaCantikTab('koroha')" id="tab-desacan-koroha" class="desacan-tab-btn px-4 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-200 flex items-center gap-2 bg-white text-slate-700 hover:bg-[#E6ECE6] border border-[#DCE3DD]">
            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
            <span>Koroha</span>
            <span class="text-[10px] opacity-80 font-normal">(Kodeoha)</span>
        </button>
    

        <button onclick="window.switchDesaCantikTab('malamala')" id="tab-desacan-malamala" class="desacan-tab-btn px-4 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-200 flex items-center gap-2 bg-white text-slate-700 hover:bg-[#E6ECE6] border border-[#DCE3DD]">
            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
            <span>Mala Mala</span>
            <span class="text-[10px] opacity-80 font-normal">(Kodeoha)</span>
        </button>
    

        <button onclick="window.switchDesaCantikTab('lapolu')" id="tab-desacan-lapolu" class="desacan-tab-btn px-4 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-200 flex items-center gap-2 bg-white text-slate-700 hover:bg-[#E6ECE6] border border-[#DCE3DD]">
            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
            <span>Lapolu</span>
            <span class="text-[10px] opacity-80 font-normal">(Tiwu)</span>
        </button>
    

        <button onclick="window.switchDesaCantikTab('tanggeawo')" id="tab-desacan-tanggeawo" class="desacan-tab-btn px-4 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-200 flex items-center gap-2 bg-white text-slate-700 hover:bg-[#E6ECE6] border border-[#DCE3DD]">
            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
            <span>Tanggeawo</span>
            <span class="text-[10px] opacity-80 font-normal">(Tiwu)</span>
        </button>
    

        <button onclick="window.switchDesaCantikTab('mattirobulu')" id="tab-desacan-mattirobulu" class="desacan-tab-btn px-4 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-200 flex items-center gap-2 bg-white text-slate-700 hover:bg-[#E6ECE6] border border-[#DCE3DD]">
            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
            <span>Mattiro Bulu</span>
            <span class="text-[10px] opacity-80 font-normal">(Tiwu)</span>
        </button>
    
                </div>

                <div class="w-full">
                    
        <div id="card-desacan-kamisi" class="desacan-detail-card" style="display: block;">
            <div class="bg-gradient-to-r from-[#1D241E] via-[#3B4D3B] to-[#566B53] rounded-2xl p-6 sm:p-8 text-white mb-6 relative overflow-hidden shadow-lg">
                <div class="absolute -right-10 -bottom-10 opacity-10 pointer-events-none">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E6ECE6]0/30 border border-emerald-400/40 text-emerald-200 text-xs font-semibold mb-2">
                            <span>⭐ DESA CINTA STATISTIK (DESCAN) BPS 2025</span>
                        </div>
                        <h3 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Desa Kamisi</h3>
                        <p class="text-emerald-100 text-sm mt-1">Kecamatan Kodeoha • Kabupaten Kolaka Utara • Status: <span class="font-bold underline decoration-emerald-400">Desa</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="/descan/desa/kamisi" class="px-5 py-2.5 rounded-xl bg-white text-[#1D241E] hover:bg-[#E6ECE6] font-bold text-xs sm:text-sm shadow-md transition-all flex items-center gap-2">
                            <span>Buka Portal DESCAN</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <button onclick="window.print()" class="px-4 py-2.5 rounded-xl bg-emerald-700/60 hover:bg-emerald-700 text-white font-semibold text-xs border border-emerald-500/40 transition-all flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                            <span>Cetak</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
                <!-- 1. Demografi & Kependudukan -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center font-bold text-base"><i class="bi bi-people-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Kependudukan</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-teal-100 text-teal-800">TABEL 2.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Total Penduduk:</span><span class="font-extrabold text-slate-800 text-sm">1,197 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Laki-laki:</span><span class="font-semibold text-slate-700">621 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Perempuan:</span><span class="font-semibold text-slate-700">576 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Sex Ratio:</span><span class="font-semibold text-slate-700">107.81</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Kepadatan:</span><span class="font-semibold text-slate-700">562.61 /km²</span></div>
                    </div>
                </div>

                <!-- 2. Ekonomi & Industri Mikro (IMK) -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-base"><i class="bi bi-buildings-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Ekonomi & IMK</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-100 text-amber-800">TABEL 4.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Industri Mikro (IMK):</span><span class="font-extrabold text-amber-600 text-sm">14 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Subsektor Utama:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Tanaman Perkebunan</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Komoditas:</span><span class="font-semibold text-slate-700">Kakao</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Minimarket/Toko:</span><span class="font-semibold text-slate-700">1 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Akses KUR/KUK:</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>

                <!-- 3. Lingkungan & Elektrifikasi -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] flex items-center justify-center font-bold text-base"><i class="bi bi-lightning-charge-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Elektrifikasi & Alam</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-[#3B4D3B]">TABEL 5.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Listrik PLN:</span><span class="font-extrabold text-[#3B4D3B] text-sm">394 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Non-PLN / Mandiri:</span><span class="font-semibold text-slate-700">0 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Penerangan Jalan:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Ada, Sebagian Besar</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Pencemaran:</span><span class="font-semibold text-[#566B53]">Bebas Tercemar</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Bentang Alam:</span><span class="font-semibold text-slate-700">Pesisir & Laut</span></div>
                    </div>
                </div>

                <!-- 4. Pemerintahan & BUMDes -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-700 flex items-center justify-center font-bold text-base"><i class="bi bi-shield-check"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Tata Kelola & Aset</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-800">TABEL 6.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Aparatur Desa:</span><span class="font-extrabold text-indigo-700 text-sm">8 Orang</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Keberadaan BUMDes:</span><span class="font-semibold text-[#566B53] font-bold">1 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SISKEUDES:</span><span class="font-semibold text-[#566B53]">Diperbaharui</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SID:</span><span class="font-semibold text-slate-700">Tidak Ada</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Peraturan Desa (Perdes):</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 rounded-2xl p-5 border border-[#DCE3DD]/80 grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-mortarboard-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Fasilitas Pendidikan Terpadu</div>
                        <div class="text-slate-500 mt-0.5">TK: 1 • SD/MI: 1 • SMP/MTs: 0 • Total: 2 unit pendidikan.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-hospital-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Layanan Kesehatan & Posyandu</div>
                        <div class="text-slate-500 mt-0.5">Pustu/Poskesdes: 1 • Posyandu Aktif: 1 • Posbindu: 1 • Apotek: 1.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-person-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Kepemimpinan Desa</div>
                        <div class="text-slate-500 mt-0.5">Kades (Laki-laki, >= 55 Thn, Diploma IV/S1) • Sekdes (Laki-laki, 35-44 Thn, Diploma IV/S1).</div>
                    </div>
                </div>
            </div>
        </div>
    

        <div id="card-desacan-koroha" class="desacan-detail-card" style="display: none;">
            <div class="bg-gradient-to-r from-[#1D241E] via-[#3B4D3B] to-[#566B53] rounded-2xl p-6 sm:p-8 text-white mb-6 relative overflow-hidden shadow-lg">
                <div class="absolute -right-10 -bottom-10 opacity-10 pointer-events-none">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E6ECE6]0/30 border border-emerald-400/40 text-emerald-200 text-xs font-semibold mb-2">
                            <span>⭐ DESA CINTA STATISTIK (DESCAN) BPS 2025</span>
                        </div>
                        <h3 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Desa Koroha</h3>
                        <p class="text-emerald-100 text-sm mt-1">Kecamatan Kodeoha • Kabupaten Kolaka Utara • Status: <span class="font-bold underline decoration-emerald-400">Desa</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="/descan/desa/koroha" class="px-5 py-2.5 rounded-xl bg-white text-[#1D241E] hover:bg-[#E6ECE6] font-bold text-xs sm:text-sm shadow-md transition-all flex items-center gap-2">
                            <span>Buka Portal DESCAN</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <button onclick="window.print()" class="px-4 py-2.5 rounded-xl bg-emerald-700/60 hover:bg-emerald-700 text-white font-semibold text-xs border border-emerald-500/40 transition-all flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                            <span>Cetak</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
                <!-- 1. Demografi & Kependudukan -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center font-bold text-base"><i class="bi bi-people-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Kependudukan</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-teal-100 text-teal-800">TABEL 2.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Total Penduduk:</span><span class="font-extrabold text-slate-800 text-sm">1,217 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Laki-laki:</span><span class="font-semibold text-slate-700">620 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Perempuan:</span><span class="font-semibold text-slate-700">597 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Sex Ratio:</span><span class="font-semibold text-slate-700">103.85</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Kepadatan:</span><span class="font-semibold text-slate-700">420.49 /km²</span></div>
                    </div>
                </div>

                <!-- 2. Ekonomi & Industri Mikro (IMK) -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-base"><i class="bi bi-buildings-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Ekonomi & IMK</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-100 text-amber-800">TABEL 4.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Industri Mikro (IMK):</span><span class="font-extrabold text-amber-600 text-sm">16 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Subsektor Utama:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Tanaman Perkebunan</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Komoditas:</span><span class="font-semibold text-slate-700">Kakao</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Minimarket/Toko:</span><span class="font-semibold text-slate-700">0 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Akses KUR/KUK:</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>

                <!-- 3. Lingkungan & Elektrifikasi -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] flex items-center justify-center font-bold text-base"><i class="bi bi-lightning-charge-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Elektrifikasi & Alam</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-[#3B4D3B]">TABEL 5.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Listrik PLN:</span><span class="font-extrabold text-[#3B4D3B] text-sm">335 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Non-PLN / Mandiri:</span><span class="font-semibold text-slate-700">0 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Penerangan Jalan:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Ada, Sebagian Besar</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Pencemaran:</span><span class="font-semibold text-[#566B53]">Bebas Tercemar</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Bentang Alam:</span><span class="font-semibold text-slate-700">Pesisir & Laut</span></div>
                    </div>
                </div>

                <!-- 4. Pemerintahan & BUMDes -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-700 flex items-center justify-center font-bold text-base"><i class="bi bi-shield-check"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Tata Kelola & Aset</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-800">TABEL 6.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Aparatur Desa:</span><span class="font-extrabold text-indigo-700 text-sm">8 Orang</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Keberadaan BUMDes:</span><span class="font-semibold text-[#566B53] font-bold">1 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SISKEUDES:</span><span class="font-semibold text-[#566B53]">Diperbaharui</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SID:</span><span class="font-semibold text-slate-700">Tidak Ada</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Peraturan Desa (Perdes):</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 rounded-2xl p-5 border border-[#DCE3DD]/80 grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-mortarboard-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Fasilitas Pendidikan Terpadu</div>
                        <div class="text-slate-500 mt-0.5">TK: 1 • SD/MI: 1 • SMP/MTs: 1 • Total: 3 unit pendidikan.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-hospital-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Layanan Kesehatan & Posyandu</div>
                        <div class="text-slate-500 mt-0.5">Pustu/Poskesdes: 0 • Posyandu Aktif: 1 • Posbindu: 0 • Apotek: 0.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-person-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Kepemimpinan Desa</div>
                        <div class="text-slate-500 mt-0.5">Kades (Laki-laki, 25-34 Thn, Diploma IV/S1) • Sekdes (Laki-laki, 25-34 Thn, Diploma IV/S1).</div>
                    </div>
                </div>
            </div>
        </div>
    

        <div id="card-desacan-malamala" class="desacan-detail-card" style="display: none;">
            <div class="bg-gradient-to-r from-[#1D241E] via-[#3B4D3B] to-[#566B53] rounded-2xl p-6 sm:p-8 text-white mb-6 relative overflow-hidden shadow-lg">
                <div class="absolute -right-10 -bottom-10 opacity-10 pointer-events-none">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E6ECE6]0/30 border border-emerald-400/40 text-emerald-200 text-xs font-semibold mb-2">
                            <span>⭐ DESA CINTA STATISTIK (DESCAN) BPS 2025</span>
                        </div>
                        <h3 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Desa Mala Mala</h3>
                        <p class="text-emerald-100 text-sm mt-1">Kecamatan Kodeoha • Kabupaten Kolaka Utara • Status: <span class="font-bold underline decoration-emerald-400">Kelurahan</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="/descan/desa/malamala" class="px-5 py-2.5 rounded-xl bg-white text-[#1D241E] hover:bg-[#E6ECE6] font-bold text-xs sm:text-sm shadow-md transition-all flex items-center gap-2">
                            <span>Buka Portal DESCAN</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <button onclick="window.print()" class="px-4 py-2.5 rounded-xl bg-emerald-700/60 hover:bg-emerald-700 text-white font-semibold text-xs border border-emerald-500/40 transition-all flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                            <span>Cetak</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
                <!-- 1. Demografi & Kependudukan -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center font-bold text-base"><i class="bi bi-people-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Kependudukan</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-teal-100 text-teal-800">TABEL 2.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Total Penduduk:</span><span class="font-extrabold text-slate-800 text-sm">1,155 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Laki-laki:</span><span class="font-semibold text-slate-700">545 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Perempuan:</span><span class="font-semibold text-slate-700">610 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Sex Ratio:</span><span class="font-semibold text-slate-700">89.34</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Kepadatan:</span><span class="font-semibold text-slate-700">1414.78 /km²</span></div>
                    </div>
                </div>

                <!-- 2. Ekonomi & Industri Mikro (IMK) -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-base"><i class="bi bi-buildings-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Ekonomi & IMK</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-100 text-amber-800">TABEL 4.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Industri Mikro (IMK):</span><span class="font-extrabold text-amber-600 text-sm">2 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Subsektor Utama:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Tanaman Perkebunan</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Komoditas:</span><span class="font-semibold text-slate-700">Kakao</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Minimarket/Toko:</span><span class="font-semibold text-slate-700">0 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Akses KUR/KUK:</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>

                <!-- 3. Lingkungan & Elektrifikasi -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] flex items-center justify-center font-bold text-base"><i class="bi bi-lightning-charge-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Elektrifikasi & Alam</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-[#3B4D3B]">TABEL 5.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Listrik PLN:</span><span class="font-extrabold text-[#3B4D3B] text-sm">318 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Non-PLN / Mandiri:</span><span class="font-semibold text-slate-700">0 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Penerangan Jalan:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Ada, Sebagian Besar</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Pencemaran:</span><span class="font-semibold text-[#566B53]">Bebas Tercemar</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Bentang Alam:</span><span class="font-semibold text-slate-700">Pesisir & Laut</span></div>
                    </div>
                </div>

                <!-- 4. Pemerintahan & BUMDes -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-700 flex items-center justify-center font-bold text-base"><i class="bi bi-shield-check"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Tata Kelola & Aset</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-800">TABEL 6.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Aparatur Desa:</span><span class="font-extrabold text-indigo-700 text-sm">10 Orang</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Keberadaan BUMDes:</span><span class="font-semibold text-slate-500">0 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SISKEUDES:</span><span class="font-semibold text-[#566B53]">Tidak Ada</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SID:</span><span class="font-semibold text-slate-700">Tidak Ada</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Peraturan Desa (Perdes):</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 rounded-2xl p-5 border border-[#DCE3DD]/80 grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-mortarboard-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Fasilitas Pendidikan Terpadu</div>
                        <div class="text-slate-500 mt-0.5">TK: 1 • SD/MI: 2 • SMP/MTs: 1 • Total: 6 unit pendidikan.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-hospital-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Layanan Kesehatan & Posyandu</div>
                        <div class="text-slate-500 mt-0.5">Pustu/Poskesdes: 0 • Posyandu Aktif: 1 • Posbindu: 1 • Apotek: 0.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-person-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Kepemimpinan Desa</div>
                        <div class="text-slate-500 mt-0.5">Kades (Laki-laki, 45-54 Thn, Diploma IV/S1) • Sekdes (Perempuan, 45-54 Thn, Diploma IV/S1).</div>
                    </div>
                </div>
            </div>
        </div>
    

        <div id="card-desacan-lapolu" class="desacan-detail-card" style="display: none;">
            <div class="bg-gradient-to-r from-[#1D241E] via-[#3B4D3B] to-[#566B53] rounded-2xl p-6 sm:p-8 text-white mb-6 relative overflow-hidden shadow-lg">
                <div class="absolute -right-10 -bottom-10 opacity-10 pointer-events-none">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E6ECE6]0/30 border border-emerald-400/40 text-emerald-200 text-xs font-semibold mb-2">
                            <span>⭐ DESA CINTA STATISTIK (DESCAN) BPS 2025</span>
                        </div>
                        <h3 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Desa Lapolu</h3>
                        <p class="text-emerald-100 text-sm mt-1">Kecamatan Tiwu • Kabupaten Kolaka Utara • Status: <span class="font-bold underline decoration-emerald-400">Desa</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="/descan/desa/lapolu" class="px-5 py-2.5 rounded-xl bg-white text-[#1D241E] hover:bg-[#E6ECE6] font-bold text-xs sm:text-sm shadow-md transition-all flex items-center gap-2">
                            <span>Buka Portal DESCAN</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <button onclick="window.print()" class="px-4 py-2.5 rounded-xl bg-emerald-700/60 hover:bg-emerald-700 text-white font-semibold text-xs border border-emerald-500/40 transition-all flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                            <span>Cetak</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
                <!-- 1. Demografi & Kependudukan -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center font-bold text-base"><i class="bi bi-people-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Kependudukan</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-teal-100 text-teal-800">TABEL 2.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Total Penduduk:</span><span class="font-extrabold text-slate-800 text-sm">1,100 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Laki-laki:</span><span class="font-semibold text-slate-700">585 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Perempuan:</span><span class="font-semibold text-slate-700">515 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Sex Ratio:</span><span class="font-semibold text-slate-700">113.59</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Kepadatan:</span><span class="font-semibold text-slate-700">73.53 /km²</span></div>
                    </div>
                </div>

                <!-- 2. Ekonomi & Industri Mikro (IMK) -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-base"><i class="bi bi-buildings-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Ekonomi & IMK</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-100 text-amber-800">TABEL 4.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Industri Mikro (IMK):</span><span class="font-extrabold text-amber-600 text-sm">75 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Subsektor Utama:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Tanaman Perkebunan</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Komoditas:</span><span class="font-semibold text-slate-700">Cengkeh</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Minimarket/Toko:</span><span class="font-semibold text-slate-700">0 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Akses KUR/KUK:</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>

                <!-- 3. Lingkungan & Elektrifikasi -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] flex items-center justify-center font-bold text-base"><i class="bi bi-lightning-charge-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Elektrifikasi & Alam</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-[#3B4D3B]">TABEL 5.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Listrik PLN:</span><span class="font-extrabold text-[#3B4D3B] text-sm">316 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Non-PLN / Mandiri:</span><span class="font-semibold text-slate-700">5 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Penerangan Jalan:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Ada, Sebagian Besar</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Pencemaran:</span><span class="font-semibold text-[#566B53]">Bebas Tercemar</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Bentang Alam:</span><span class="font-semibold text-slate-700">Daratan</span></div>
                    </div>
                </div>

                <!-- 4. Pemerintahan & BUMDes -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-700 flex items-center justify-center font-bold text-base"><i class="bi bi-shield-check"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Tata Kelola & Aset</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-800">TABEL 6.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Aparatur Desa:</span><span class="font-extrabold text-indigo-700 text-sm">9 Orang</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Keberadaan BUMDes:</span><span class="font-semibold text-[#566B53] font-bold">2 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SISKEUDES:</span><span class="font-semibold text-[#566B53]">Diperbaharui</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SID:</span><span class="font-semibold text-slate-700">Tidak Ada</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Peraturan Desa (Perdes):</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 rounded-2xl p-5 border border-[#DCE3DD]/80 grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-mortarboard-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Fasilitas Pendidikan Terpadu</div>
                        <div class="text-slate-500 mt-0.5">TK: 1 • SD/MI: 1 • SMP/MTs: 0 • Total: 2 unit pendidikan.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-hospital-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Layanan Kesehatan & Posyandu</div>
                        <div class="text-slate-500 mt-0.5">Pustu/Poskesdes: 0 • Posyandu Aktif: 1 • Posbindu: 1 • Apotek: 0.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-person-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Kepemimpinan Desa</div>
                        <div class="text-slate-500 mt-0.5">Kades (Perempuan, 35-44 Thn, Diploma IV/S1) • Sekdes (Laki-laki, 35-44 Thn, Diploma IV/S1).</div>
                    </div>
                </div>
            </div>
        </div>
    

        <div id="card-desacan-tanggeawo" class="desacan-detail-card" style="display: none;">
            <div class="bg-gradient-to-r from-[#1D241E] via-[#3B4D3B] to-[#566B53] rounded-2xl p-6 sm:p-8 text-white mb-6 relative overflow-hidden shadow-lg">
                <div class="absolute -right-10 -bottom-10 opacity-10 pointer-events-none">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E6ECE6]0/30 border border-emerald-400/40 text-emerald-200 text-xs font-semibold mb-2">
                            <span>⭐ DESA CINTA STATISTIK (DESCAN) BPS 2025</span>
                        </div>
                        <h3 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Desa Tanggeawo</h3>
                        <p class="text-emerald-100 text-sm mt-1">Kecamatan Tiwu • Kabupaten Kolaka Utara • Status: <span class="font-bold underline decoration-emerald-400">Desa</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="/descan/desa/tanggeawo" class="px-5 py-2.5 rounded-xl bg-white text-[#1D241E] hover:bg-[#E6ECE6] font-bold text-xs sm:text-sm shadow-md transition-all flex items-center gap-2">
                            <span>Buka Portal DESCAN</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <button onclick="window.print()" class="px-4 py-2.5 rounded-xl bg-emerald-700/60 hover:bg-emerald-700 text-white font-semibold text-xs border border-emerald-500/40 transition-all flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                            <span>Cetak</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
                <!-- 1. Demografi & Kependudukan -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center font-bold text-base"><i class="bi bi-people-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Kependudukan</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-teal-100 text-teal-800">TABEL 2.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Total Penduduk:</span><span class="font-extrabold text-slate-800 text-sm">411 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Laki-laki:</span><span class="font-semibold text-slate-700">203 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Perempuan:</span><span class="font-semibold text-slate-700">208 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Sex Ratio:</span><span class="font-semibold text-slate-700">97.6</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Kepadatan:</span><span class="font-semibold text-slate-700">405.12 /km²</span></div>
                    </div>
                </div>

                <!-- 2. Ekonomi & Industri Mikro (IMK) -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-base"><i class="bi bi-buildings-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Ekonomi & IMK</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-100 text-amber-800">TABEL 4.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Industri Mikro (IMK):</span><span class="font-extrabold text-amber-600 text-sm">46 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Subsektor Utama:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Tanaman Perkebunan</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Komoditas:</span><span class="font-semibold text-slate-700">Kakao</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Minimarket/Toko:</span><span class="font-semibold text-slate-700">1 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Akses KUR/KUK:</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>

                <!-- 3. Lingkungan & Elektrifikasi -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] flex items-center justify-center font-bold text-base"><i class="bi bi-lightning-charge-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Elektrifikasi & Alam</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-[#3B4D3B]">TABEL 5.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Listrik PLN:</span><span class="font-extrabold text-[#3B4D3B] text-sm">141 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Non-PLN / Mandiri:</span><span class="font-semibold text-slate-700">0 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Penerangan Jalan:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Ada, Sebagian Kecil</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Pencemaran:</span><span class="font-semibold text-[#566B53]">Bebas Tercemar</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Bentang Alam:</span><span class="font-semibold text-slate-700">Daratan</span></div>
                    </div>
                </div>

                <!-- 4. Pemerintahan & BUMDes -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-700 flex items-center justify-center font-bold text-base"><i class="bi bi-shield-check"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Tata Kelola & Aset</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-800">TABEL 6.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Aparatur Desa:</span><span class="font-extrabold text-indigo-700 text-sm">7 Orang</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Keberadaan BUMDes:</span><span class="font-semibold text-[#566B53] font-bold">1 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SISKEUDES:</span><span class="font-semibold text-[#566B53]">Diperbaharui</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SID:</span><span class="font-semibold text-slate-700">Tidak Ada</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Peraturan Desa (Perdes):</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 rounded-2xl p-5 border border-[#DCE3DD]/80 grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-mortarboard-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Fasilitas Pendidikan Terpadu</div>
                        <div class="text-slate-500 mt-0.5">TK: 0 • SD/MI: 1 • SMP/MTs: 0 • Total: 1 unit pendidikan.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-hospital-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Layanan Kesehatan & Posyandu</div>
                        <div class="text-slate-500 mt-0.5">Pustu/Poskesdes: 0 • Posyandu Aktif: 1 • Posbindu: 1 • Apotek: 0.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-person-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Kepemimpinan Desa</div>
                        <div class="text-slate-500 mt-0.5">Kades (Perempuan, 35-44 Thn, Akademi/DIII) • Sekdes (Laki-laki, 35-44 Thn, SMU/Sederajat).</div>
                    </div>
                </div>
            </div>
        </div>
    

        <div id="card-desacan-mattirobulu" class="desacan-detail-card" style="display: none;">
            <div class="bg-gradient-to-r from-[#1D241E] via-[#3B4D3B] to-[#566B53] rounded-2xl p-6 sm:p-8 text-white mb-6 relative overflow-hidden shadow-lg">
                <div class="absolute -right-10 -bottom-10 opacity-10 pointer-events-none">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E6ECE6]0/30 border border-emerald-400/40 text-emerald-200 text-xs font-semibold mb-2">
                            <span>⭐ DESA CINTA STATISTIK (DESCAN) BPS 2025</span>
                        </div>
                        <h3 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Desa Mattiro Bulu</h3>
                        <p class="text-emerald-100 text-sm mt-1">Kecamatan Tiwu • Kabupaten Kolaka Utara • Status: <span class="font-bold underline decoration-emerald-400">Desa</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="/descan/desa/mattirobulu" class="px-5 py-2.5 rounded-xl bg-white text-[#1D241E] hover:bg-[#E6ECE6] font-bold text-xs sm:text-sm shadow-md transition-all flex items-center gap-2">
                            <span>Buka Portal DESCAN</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <button onclick="window.print()" class="px-4 py-2.5 rounded-xl bg-emerald-700/60 hover:bg-emerald-700 text-white font-semibold text-xs border border-emerald-500/40 transition-all flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                            <span>Cetak</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
                <!-- 1. Demografi & Kependudukan -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center font-bold text-base"><i class="bi bi-people-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Kependudukan</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-teal-100 text-teal-800">TABEL 2.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Total Penduduk:</span><span class="font-extrabold text-slate-800 text-sm">881 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Laki-laki:</span><span class="font-semibold text-slate-700">465 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Perempuan:</span><span class="font-semibold text-slate-700">416 Jiwa</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Sex Ratio:</span><span class="font-semibold text-slate-700">111.78</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Kepadatan:</span><span class="font-semibold text-slate-700">80.3 /km²</span></div>
                    </div>
                </div>

                <!-- 2. Ekonomi & Industri Mikro (IMK) -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-base"><i class="bi bi-buildings-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Ekonomi & IMK</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-100 text-amber-800">TABEL 4.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Industri Mikro (IMK):</span><span class="font-extrabold text-amber-600 text-sm">20 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Subsektor Utama:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Tanaman Perkebunan</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Komoditas:</span><span class="font-semibold text-slate-700">Cengkeh</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Minimarket/Toko:</span><span class="font-semibold text-slate-700">0 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Akses KUR/KUK:</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>

                <!-- 3. Lingkungan & Elektrifikasi -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] flex items-center justify-center font-bold text-base"><i class="bi bi-lightning-charge-fill"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Elektrifikasi & Alam</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-[#3B4D3B]">TABEL 5.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Listrik PLN:</span><span class="font-extrabold text-[#3B4D3B] text-sm">214 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Non-PLN / Mandiri:</span><span class="font-semibold text-slate-700">110 KK</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Penerangan Jalan:</span><span class="font-semibold text-slate-700 truncate max-w-[120px]">Ada, Sebagian Kecil</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Pencemaran:</span><span class="font-semibold text-[#566B53]">Bebas Tercemar</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Bentang Alam:</span><span class="font-semibold text-slate-700">Daratan</span></div>
                    </div>
                </div>

                <!-- 4. Pemerintahan & BUMDes -->
                <div class="bg-white rounded-2xl p-5 border border-[#DCE3DD]/90 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-700 flex items-center justify-center font-bold text-base"><i class="bi bi-shield-check"></i></div>
                            <h4 class="font-bold text-sm text-slate-800">Tata Kelola & Aset</h4>
                        </div>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-800">TABEL 6.1</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-slate-600">
                        <div class="flex justify-between items-center"><span class="text-slate-500">Aparatur Desa:</span><span class="font-extrabold text-indigo-700 text-sm">9 Orang</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Keberadaan BUMDes:</span><span class="font-semibold text-[#566B53] font-bold">1 Unit</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SISKEUDES:</span><span class="font-semibold text-[#566B53]">Diperbaharui</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Status SID:</span><span class="font-semibold text-slate-700">Tidak Ada</span></div>
                        <div class="flex justify-between items-center"><span class="text-slate-500">Peraturan Desa (Perdes):</span><span class="font-semibold text-slate-700">Ada</span></div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 rounded-2xl p-5 border border-[#DCE3DD]/80 grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-mortarboard-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Fasilitas Pendidikan Terpadu</div>
                        <div class="text-slate-500 mt-0.5">TK: 1 • SD/MI: 1 • SMP/MTs: 1 • Total: 4 unit pendidikan.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-hospital-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Layanan Kesehatan & Posyandu</div>
                        <div class="text-slate-500 mt-0.5">Pustu/Poskesdes: 0 • Posyandu Aktif: 1 • Posbindu: 1 • Apotek: 0.</div>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl"><i class="bi bi-person-fill"></i></span>
                    <div>
                        <div class="font-bold text-slate-800">Kepemimpinan Desa</div>
                        <div class="text-slate-500 mt-0.5">Kades (Perempuan, 25-34 Thn, Akademi/DIII) • Sekdes (Laki-laki, 25-34 Thn, SMU/Sederajat).</div>
                    </div>
                </div>
            </div>
        </div>
    
                </div>

                <!-- Bottom Navigation Buttons for Page 4 -->
                <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                    <a href="/portal/peta" onclick="window.onNavClick(event, 3, '/portal/peta')" class="px-5 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 font-bold text-xs sm:text-sm transition-all flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        <span>Halaman 3: WebGIS Peta Spasial</span>
                    </a>
                    <a href="/portal/tentang" onclick="window.onNavClick(event, 5, '/portal/tentang')" class="px-6 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-xs sm:text-sm shadow-sm transition-all flex items-center gap-2 cursor-pointer">
                        <span>Halaman 5: Tentang Madani</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- HALAMAN 5: PUBLIKASI & TENTANG MADANI (KATALOG 9 BERKAS + ARSITEKTUR SDI) -->
        <!-- ========================================================================= -->
        <section id="portalPage5" class="portal-page {{ $curPage === 5 ? 'active' : '' }} w-full py-10">
            <div class="max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
                
                <div class="border-b border-slate-200 pb-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100/80 text-[#3B4D3B] text-xs font-bold mb-2">
                        <span><i class="bi bi-journal-bookmark-fill"></i> KATALOG DATASET & ARSITEKTUR</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">Publikasi PODES 2025 & Ekosistem Satu Data</h2>
                    <p class="text-slate-600 text-sm mt-1">Dokumentasi 9 berkas data sumber PODES BPS Kolaka Utara dan 5 tahapan integrasi Satu Data Desa.</p>
                </div>

                <!-- Katalog 9 Berkas Sumber Data PODES 2025 -->
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-slate-800">Katalog 9 Berkas Sumber Data PODES 2025</h3>
                        <span class="text-xs font-semibold text-slate-500">41 Tabel Sensus Komprehensif</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                        <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:border-emerald-300 shadow-xs transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-0.5 rounded-full bg-teal-50 text-teal-800 font-bold text-[10px]">KEPENDUDUKAN.xlsx</span>
                                <span class="text-xs font-semibold text-slate-400">145.679 Jiwa</span>
                            </div>
                            <h4 class="font-extrabold text-sm text-slate-800">Kependudukan & Piramida Umur</h4>
                            <p class="text-xs text-slate-500 mt-1">Tabel 2.1 (Penduduk L/P per Desa), Tabel 2.2 (Piramida Umur 16 Kelompok), Tabel 2.3 (Kepadatan Penduduk & Rasio Seks).</p>
                        </div>

                        <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:border-emerald-300 shadow-xs transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-0.5 rounded-full bg-blue-50 text-blue-800 font-bold text-[10px]">INFRASTRUKTUR_PENDIDIKAN.xlsx</span>
                                <span class="text-xs font-semibold text-slate-400">205 Satuan</span>
                            </div>
                            <h4 class="font-extrabold text-sm text-slate-800">Sarana & Aksesibilitas Pendidikan</h4>
                            <p class="text-xs text-slate-500 mt-1">Inventarisasi satuan PAUD/TK, SD/MI, SMP/MTs, SMA/MA/SMK, dan 3 kampus Perguruan Tinggi per kecamatan.</p>
                        </div>

                        <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:border-emerald-300 shadow-xs transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-0.5 rounded-full bg-rose-50 text-rose-800 font-bold text-[10px]">INFRASTRUKTUR_KESEHATAN.xlsx</span>
                                <span class="text-xs font-semibold text-slate-400">174 Faskes</span>
                            </div>
                            <h4 class="font-extrabold text-sm text-slate-800">Fasilitas Kesehatan & Posyandu</h4>
                            <p class="text-xs text-slate-500 mt-1">RSUD Kelas C, Puskesmas Rawat Inap & Non-Inap, Pustu, Poskesdes, Posyandu Aktif, serta Apotek di 133 desa.</p>
                        </div>

                        <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:border-emerald-300 shadow-xs transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-0.5 rounded-full bg-amber-50 text-amber-800 font-bold text-[10px]">SARANA_EKONOMI_DAN_INDUSTRI.xlsx</span>
                                <span class="text-xs font-semibold text-slate-400">3.622 IMK</span>
                            </div>
                            <h4 class="font-extrabold text-sm text-slate-800">Sentra Industri Mikro & Perdagangan</h4>
                            <p class="text-xs text-slate-500 mt-1">Distribusi 3.622 industri mikro dan kecil (IMK), pasar tradisional permanen, bank pemerintah, KSP, dan produk pangan.</p>
                        </div>

                        <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:border-emerald-300 shadow-xs transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-800 font-bold text-[10px]">PERUMAHAN_DAN_LINGKUNGAN.xlsx</span>
                                <span class="text-xs font-semibold text-slate-400">38.077 KK</span>
                            </div>
                            <h4 class="font-extrabold text-sm text-slate-800">Elektrifikasi PLN & Sanitasi</h4>
                            <p class="text-xs text-slate-500 mt-1">Keluarga berlistrik PLN, penerangan jalan umum, ketiadaan pencemaran lingkungan, dan pemanfaatan sumber daya laut.</p>
                        </div>

                        <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:border-emerald-300 shadow-xs transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-0.5 rounded-full bg-indigo-50 text-indigo-800 font-bold text-[10px]">KEUANGAN_DAN_ASET_DESA.xlsx</span>
                                <span class="text-xs font-semibold text-slate-400">134 BUMDes</span>
                            </div>
                            <h4 class="font-extrabold text-sm text-slate-800">Keuangan, BUMDes & Aset Desa</h4>
                            <p class="text-xs text-slate-500 mt-1">Pengelolaan APBDes, inventaris tanah kas desa, tambatan perahu nelayan, bangunan kantor desa, dan BUMDes aktif.</p>
                        </div>

                        <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:border-emerald-300 shadow-xs transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-0.5 rounded-full bg-purple-50 text-purple-800 font-bold text-[10px]">KETERANGAN_PEMERINTAH_DESA.xlsx</span>
                                <span class="text-xs font-semibold text-slate-400">1.164 Aparat</span>
                            </div>
                            <h4 class="font-extrabold text-sm text-slate-800">Aparatur & Tata Kelola Desa</h4>
                            <p class="text-xs text-slate-500 mt-1">Profil usia dan pendidikan Kades/Sekdes, jumlah perangkat desa, adopsi SID, serta implementasi SISKEUDES.</p>
                        </div>

                        <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:border-emerald-300 shadow-xs transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-0.5 rounded-full bg-cyan-50 text-cyan-800 font-bold text-[10px]">PENDIDIKAN_DAN_KESEHATAN.xlsx</span>
                                <span class="text-xs font-semibold text-slate-400">15 Kecamatan</span>
                            </div>
                            <h4 class="font-extrabold text-sm text-slate-800">Kompilasi Layanan Sosial Dasar</h4>
                            <p class="text-xs text-slate-500 mt-1">Rekapitulasi rasio ketersediaan sarana belajar dan faskes terhadap jumlah penduduk per wilayah kecamatan.</p>
                        </div>

                        <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:border-emerald-300 shadow-xs transition-all">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-800 font-bold text-[10px]">KETERANGAN_UMUM_DESA.xlsx</span>
                                <span class="text-xs font-semibold text-slate-400">133 Wilayah</span>
                            </div>
                            <h4 class="font-extrabold text-sm text-slate-800">Tipologi & Topografi Wilayah</h4>
                            <p class="text-xs text-slate-500 mt-1">Klasifikasi bentang alam pesisir dan dataran tinggi, penetapan batas desa, dan status administratif 127 Desa & 6 Kelurahan.</p>
                        </div>
                    </div>
                </div>

                <!-- 5 Tahapan Alur Ekosistem Satu Data Desa Madani -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-sm">
                    <div class="max-w-2xl mb-6">
                        <span class="text-xs font-bold text-[#3B4D3B] uppercase tracking-wider">Arsitektur Terpadu</span>
                        <h3 class="text-xl sm:text-2xl font-black text-slate-900 mt-1">5 Tahap Ekosistem Satu Data Desa Kolaka Utara</h3>
                        <p class="text-xs sm:text-sm text-slate-600 mt-1">Alur integrasi dari pencatatan lapangan di tingkat RT/Dusun hingga pengambilan keputusan berbasis data presisi.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-5 gap-4">
                        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200">
                            <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#3B4D3B] font-black text-sm flex items-center justify-center mb-3">01</div>
                            <h4 class="font-bold text-xs text-slate-800">Pendataan Sensus</h4>
                            <p class="text-[11px] text-slate-500 mt-1">Pencacahan langsung lapangan oleh petugas BPS bersama aparatur desa di 133 desa.</p>
                        </div>
                        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200">
                            <div class="w-8 h-8 rounded-xl bg-teal-100 text-teal-800 font-black text-sm flex items-center justify-center mb-3">02</div>
                            <h4 class="font-bold text-xs text-slate-800">Validasi & Verifikasi</h4>
                            <p class="text-[11px] text-slate-500 mt-1">Standardisasi format metadata statistik sesuai kaidah Satu Data Indonesia (SDI).</p>
                        </div>
                        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200">
                            <div class="w-8 h-8 rounded-xl bg-blue-100 text-blue-800 font-black text-sm flex items-center justify-center mb-3">03</div>
                            <h4 class="font-bold text-xs text-slate-800">Konsolidasi Spasial</h4>
                            <p class="text-[11px] text-slate-500 mt-1">Penyatuan data tabular dengan batas poligon spasial GeoJSON 15 kecamatan & desa.</p>
                        </div>
                        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200">
                            <div class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-800 font-black text-sm flex items-center justify-center mb-3">04</div>
                            <h4 class="font-bold text-xs text-slate-800">Diseminasi Digital</h4>
                            <p class="text-[11px] text-slate-500 mt-1">Penyajian portal interaktif, peta tematik, dan API terbuka untuk transparansi publik.</p>
                        </div>
                        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200">
                            <div class="w-8 h-8 rounded-xl bg-amber-100 text-amber-800 font-black text-sm flex items-center justify-center mb-3">05</div>
                            <h4 class="font-bold text-xs text-slate-800">Kebijakan Presisi</h4>
                            <p class="text-[11px] text-slate-500 mt-1">Pemanfaatan data untuk perencanaan APBDes, alokasi bantuan, dan intervensi stunting.</p>
                        </div>
                    </div>
                </div>

                <!-- Tentang Program Desa Madani & Narasi Kemitraan -->
                <div class="bg-gradient-to-r from-emerald-900 to-teal-900 rounded-3xl p-6 sm:p-10 text-white relative overflow-hidden shadow-lg">
                    <div class="relative z-10 max-w-3xl">
                        <span class="px-3 py-1 rounded-full bg-emerald-500/30 text-emerald-200 text-xs font-bold uppercase tracking-wider border border-emerald-400/30">Tentang Inisiatif</span>
                        <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight mt-3">Mewujudkan Desa Mandiri, Presisi & Sejahtera</h3>
                        <p class="text-emerald-100 text-xs sm:text-sm mt-2 leading-relaxed">
                            Portal Desa Madani adalah platform integrasi data statistik berbasis Pendataan Potensi Desa (PODES) 2025 yang dikembangkan melalui kolaborasi strategis antara Badan Pusat Statistik (BPS) Kabupaten Kolaka Utara, Pemerintah Kabupaten Kolaka Utara, Dinas PMD, dan Pemerintah Desa se-Kabupaten Kolaka Utara.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 mt-6">
                            <a href="/portal" onclick="window.onNavClick(event, 1, '/portal')" class="px-5 py-2.5 rounded-xl bg-white text-emerald-900 font-bold text-xs sm:text-sm shadow-md hover:bg-emerald-50 transition-all cursor-pointer">
                                Kembali ke Beranda
                            </a>
                            <a href="/descan" class="px-5 py-2.5 rounded-xl bg-emerald-700/60 hover:bg-emerald-700 text-white border border-emerald-400/40 font-bold text-xs sm:text-sm transition-all">
                                Pelajari Desa Cantik (DESCAN)
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Bottom Navigation Buttons for Page 5 -->
                <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                    <a href="/portal/desa-cantik" onclick="window.onNavClick(event, 4, '/portal/desa-cantik')" class="px-5 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 font-bold text-xs sm:text-sm transition-all flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        <span>Halaman 4: 6 Desa Cantik</span>
                    </a>
                    <a href="/portal" onclick="window.onNavClick(event, 1, '/portal')" class="px-6 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-xs sm:text-sm shadow-sm transition-all flex items-center gap-2 cursor-pointer">
                        <span>Kembali ke Halaman 1: Beranda</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER RESMI -->
    <footer class="bg-white border-t border-slate-200 py-8 text-xs text-slate-500">
        <div class="max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span class="font-extrabold text-slate-700">Desa Madani Kolaka Utara</span>
                <span>•</span>
                <span>Satu Data Desa Presisi © 2025</span>
            </div>
            <div>
                BPS Kabupaten Kolaka Utara & Pemerintah Daerah Kabupaten Kolaka Utara
            </div>
        </div>
    </footer>

    <!-- FLOATING PUSAT BANTUAN BUTTON -->
    <button onclick="window.togglePusatBantuan()" id="btnFloatingHelp" class="fixed bottom-6 right-6 z-40 bg-[#3B4D3B] hover:bg-[#566B53] text-white px-4 py-3 rounded-2xl shadow-xl flex items-center gap-2 font-bold text-xs transition-all hover:scale-105 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        <span>Pusat Bantuan</span>
    </button>

    <!-- MODAL PUSAT BANTUAN -->
    <div id="modalPusatBantuan" class="fixed inset-0 z-50 bg-black/40 backdrop-blur-xs hidden items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl border border-slate-200 relative">
            <button onclick="window.togglePusatBantuan()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 p-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#3B4D3B] flex items-center justify-center font-bold text-lg"><i class="bi bi-lightbulb-fill"></i></div>
                <div>
                    <h3 class="font-extrabold text-base text-slate-900">Pusat Bantuan & Panduan</h3>
                    <p class="text-xs text-slate-500">Portal Desa Madani Kolaka Utara</p>
                </div>
            </div>
            <div class="space-y-3 text-xs text-slate-600">
                <p>Silakan hubungi tim sekretariat Satu Data BPS Kolaka Utara jika Anda membutuhkan asistensi pengisian kuesioner atau integrasi dataset desa:</p>
                <div class="bg-slate-50 p-3 rounded-xl border border-slate-200 space-y-1.5">
                    <div class="flex justify-between"><span class="font-semibold text-slate-700">Email:</span><span>bps7408@bps.go.id</span></div>
                    <div class="flex justify-between"><span class="font-semibold text-slate-700">Alamat:</span><span>Lasusua, Kab. Kolaka Utara</span></div>
                    <div class="flex justify-between"><span class="font-semibold text-slate-700">Layanan:</span><span>Senin - Jumat (08.00 - 16.00 WITA)</span></div>
                </div>
            </div>
            <div class="mt-5">
                <button onclick="window.togglePusatBantuan()" class="w-full py-2.5 rounded-xl bg-[#3B4D3B] text-white font-bold text-xs hover:bg-[#566B53] transition-all">Tutup</button>
            </div>
        </div>
    </div>

    <!-- MODAL 15 KECAMATAN -->
    <div id="modalKecamatanList" class="fixed inset-0 z-50 bg-black/40 backdrop-blur-xs hidden items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-xl w-full p-6 shadow-2xl border border-slate-200 relative">
            <button onclick="window.toggleKecamatanModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 p-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#3B4D3B] flex items-center justify-center font-bold text-lg"><i class="bi bi-map-fill"></i></div>
                <div>
                    <h3 class="font-extrabold text-base text-slate-900">Daftar 15 Kecamatan Kolaka Utara</h3>
                    <p class="text-xs text-slate-500">Pilih kecamatan untuk langsung menuju data spasial atau agregat</p>
                </div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-xs">
                @php
                    $kecList = ['Tolala', 'Porehu', 'Batu Putih', 'Pakue Utara', 'Pakue Tengah', 'Pakue', 'Watunohu', 'Tiwu', 'Ngapa', 'Kodeoha', 'Katoi', 'Lasusua', 'Lambai', 'Rante Angin', 'Wawo'];
                @endphp
                @foreach($kecList as $kItem)
                    <button onclick="window.selectKecamatanFromModal('{{ $kItem }}')" class="p-2.5 rounded-xl bg-slate-50 hover:bg-emerald-50 hover:text-[#3B4D3B] border border-slate-200 text-left font-bold transition flex items-center justify-between">
                        <span>{{ $kItem }}</span>
                        <span class="text-[10px] text-slate-400">→</span>
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT MASTER: PAGE SWITCHER & APP LOGIC -->
    <script>
    // 1. Metadata for SVG Hover & Click
    window.SVG_KEC_META = {"svg-kec-lasusua": {"nama": "Lasusua", "kode": "74.08.01", "pop": 26729, "imk": 237, "pln": 8463, "desa": 12, "sekolah": 54, "faskes": 41, "bumdes": 13, "potensi": "Pusat Perdagangan, Jasa, Perikanan Tangkap & Wisata Bahari", "komoditas": "Kakao, Ikan Cakalang, Kuliner Bahari, Olahan Cokelat"}, "svg-kec-pakue": {"nama": "Pakue", "kode": "74.08.02", "pop": 10757, "imk": 86, "pln": 2927, "desa": 11, "sekolah": 24, "faskes": 15, "bumdes": 9, "potensi": "Budidaya Tambak Udang & Bandeng, Perkebunan Kakao", "komoditas": "Udang Windu, Ikan Bandeng, Kakao, Kelapa Kopra"}, "svg-kec-batuputih": {"nama": "Batu Putih", "kode": "74.08.03", "pop": 9229, "imk": 226, "pln": 2379, "desa": 11, "sekolah": 27, "faskes": 20, "bumdes": 12, "potensi": "Perikanan Tangkap, Perkebunan Kelapa & Potensi Bahari", "komoditas": "Ikan Karang, Kelapa Dalam, Kakao, Cengkeh"}, "svg-kec-ranteangin": {"nama": "Rante Angin", "kode": "74.08.04", "pop": 6161, "imk": 39, "pln": 1673, "desa": 7, "sekolah": 16, "faskes": 11, "bumdes": 4, "potensi": "Perkebunan Kakao Rakyat & Padi Sawah Irigasi", "komoditas": "Biji Kakao, Beras Sawah, Ternak Sapi"}, "svg-kec-kodeoha": {"nama": "Kodeoha", "kode": "74.08.05", "pop": 11592, "imk": 234, "pln": 2960, "desa": 12, "sekolah": 30, "faskes": 15, "bumdes": 17, "potensi": "Sentra Utama Kakao Fermentasi & Perikanan Pesisir", "komoditas": "Kakao Super, Padi Sawah, Rumput Laut, Udang"}, "svg-kec-ngapa": {"nama": "Ngapa", "kode": "74.08.06", "pop": 17256, "imk": 502, "pln": 3353, "desa": 12, "sekolah": 25, "faskes": 21, "bumdes": 13, "potensi": "Lumbung Pangan (Padi/Jagung) & Perkebunan Kakao", "komoditas": "Beras Organik, Jagung Hibrida, Kakao, Peternakan"}, "svg-kec-wawo": {"nama": "Wawo", "kode": "74.08.07", "pop": 7188, "imk": 25, "pln": 1883, "desa": 7, "sekolah": 17, "faskes": 10, "bumdes": 9, "potensi": "Agrowisata Danau Biru & Perkebunan Cengkeh/Kopi", "komoditas": "Cengkeh, Kopi Robusta, Kakao, Pariwisata Alam"}, "svg-kec-lambai": {"nama": "Lambai", "kode": "74.08.08", "pop": 7195, "imk": 107, "pln": 1936, "desa": 7, "sekolah": 18, "faskes": 11, "bumdes": 7, "potensi": "Perkebunan Cengkeh, Minyak Nilam & Kakao", "komoditas": "Minyak Nilam, Bunga Cengkeh Kering, Kakao"}, "svg-kec-watunohu": {"nama": "Watunohu", "kode": "74.08.09", "pop": 7279, "imk": 64, "pln": 2107, "desa": 8, "sekolah": 18, "faskes": 11, "bumdes": 8, "potensi": "Hortikultura Sayur-Buah & Perkebunan Kakao", "komoditas": "Sayuran Dataran, Pisang, Kakao, Ternak Kambing"}, "svg-kec-pakuetengah": {"nama": "Pakue Tengah", "kode": "74.08.10", "pop": 7738, "imk": 49, "pln": 2089, "desa": 10, "sekolah": 27, "faskes": 14, "bumdes": 7, "potensi": "Pariwisata Bahari Pasir Putih & Perkebunan Kakao", "komoditas": "Kelapa, Kakao, Ikan Tongkol/Tenggiri"}, "svg-kec-pakueutara": {"nama": "Pakue Utara", "kode": "74.08.11", "pop": 8402, "imk": 257, "pln": 2212, "desa": 9, "sekolah": 22, "faskes": 16, "bumdes": 14, "potensi": "Perikanan Tangkap & Kelapa Kopra", "komoditas": "Ikan Layang, Kopra Putih, Kakao"}, "svg-kec-porehu": {"nama": "Porehu", "kode": "74.08.12", "pop": 6822, "imk": 1440, "pln": 1615, "desa": 8, "sekolah": 22, "faskes": 11, "bumdes": 8, "potensi": "Perkebunan Cengkeh, Kopi & Wisata Alam Air Terjun", "komoditas": "Cengkeh Grade A, Kopi Organik, Madu Hutan"}, "svg-kec-katoi": {"nama": "Katoi", "kode": "74.08.13", "pop": 7408, "imk": 71, "pln": 1877, "desa": 6, "sekolah": 17, "faskes": 11, "bumdes": 11, "potensi": "Kampung Nelayan Pesisir & Sentra Kakao", "komoditas": "Ikan Teri, Kakao, Olahan Ikan Asin, Kelapa"}, "svg-kec-tiwu": {"nama": "Tiwu", "kode": "74.08.14", "pop": 4849, "imk": 194, "pln": 1449, "desa": 7, "sekolah": 15, "faskes": 7, "bumdes": 8, "potensi": "Perkebunan Kakao, Kelapa & Rumput Laut", "komoditas": "Kakao, Rumput Laut Eucheuma, Kelapa"}, "svg-kec-tolala": {"nama": "Tolala", "kode": "74.08.15", "pop": 4087, "imk": 91, "pln": 1154, "desa": 6, "sekolah": 15, "faskes": 9, "bumdes": 6, "potensi": "Perikanan Bahari Teluk Bone & Hasil Hutan", "komoditas": "Ikan Tuna/Cakalang, Madu Lebah Liar, Kakao"}};
    window.CURRENT_PORTAL_PAGE = {{ $curPage }};

    // 2. SVG Map Hover Handler
    window.onSvgKecHover = function(kecId) {
        const meta = window.SVG_KEC_META[kecId];
        if (!meta) return;
        const elBadge = document.getElementById('svgKecFloatingText');
        if (elBadge) {
            elBadge.innerHTML = `<strong class="text-slate-900 font-extrabold">Kecamatan ${meta.nama}</strong> • <span class="text-[#3B4D3B] font-bold">${Number(meta.pop || 0).toLocaleString('id-ID')} Jiwa</span> • <span class="text-amber-600 font-bold">${meta.imk || 0} IMK</span> • <span class="text-slate-500">${meta.desa || '-'} Desa/Kel</span>`;
        }
        const elNama = document.getElementById('svgKecNama');
        const elKode = document.getElementById('svgKecKode');
        const elPop = document.getElementById('svgKecPop');
        const elPln = document.getElementById('svgKecPln');
        const elImk = document.getElementById('svgKecImk');
        const elDesa = document.getElementById('svgKecDesaCount');
        const elPotensi = document.getElementById('svgKecPotensi');

        if (elNama) elNama.innerText = 'Kecamatan ' + meta.nama;
        if (elKode) elKode.innerText = 'KODE: ' + (meta.kode || '-');
        if (elPop) elPop.innerText = Number(meta.pop || 0).toLocaleString('id-ID') + ' Jiwa';
        if (elPln) elPln.innerText = Number(meta.pln || 0).toLocaleString('id-ID') + ' KK';
        if (elImk) elImk.innerText = Number(meta.imk || 0).toLocaleString('id-ID') + ' Unit';
        if (elDesa) elDesa.innerText = (meta.desa || '-') + ' Desa/Kel';
        if (elPotensi) elPotensi.innerText = meta.potensi || '-';
    };

    window.onSvgKecLeave = function() {
        const elBadge = document.getElementById('svgKecFloatingText');
        if (elBadge) {
            elBadge.innerHTML = 'Klik salah satu kecamatan untuk buka di Peta WebGIS';
        }
    };

    // 3. SVG Map Click Handler
    window.onSvgKecClick = function(kecId) {
        const meta = window.SVG_KEC_META[kecId];
        if (!meta) return;
        window.switchPortalPage(3, '/portal/peta');
        setTimeout(function() {
            if (window.PresisiEngine && typeof window.PresisiEngine.selectKecamatan === 'function') {
                window.PresisiEngine.selectKecamatan(meta.nama);
            }
        }, 200);
    };

    // 4. Client-side Navigation Handler
    window.onNavClick = function(event, pageNum, url) {
        if (event && event.preventDefault) event.preventDefault();
        window.switchPortalPage(pageNum, url);
    };

    // 5. 5-Page Switcher with Instant Toggle & History State
    window.switchPortalPage = function(pageNum, newUrl) {
        pageNum = parseInt(pageNum) || 1;
        if (pageNum < 1) pageNum = 1;
        if (pageNum > 5) pageNum = 5;
        window.CURRENT_PORTAL_PAGE = pageNum;

        // Toggle active class on page sections
        for (let i = 1; i <= 5; i++) {
            const p = document.getElementById('portalPage' + i);
            const navLink = document.getElementById('navLinkPage' + i);
            const mNav = document.getElementById('mNav' + i);

            if (p) {
                if (i === pageNum) {
                    p.classList.add('active');
                } else {
                    p.classList.remove('active');
                }
            }

            if (navLink) {
                if (i === pageNum) {
                    navLink.className = 'portal-nav-link hover:text-[#3B4D3B] transition py-1 relative active';
                } else {
                    navLink.className = 'portal-nav-link hover:text-[#3B4D3B] transition py-1 relative';
                }
            }

            if (mNav) {
                if (i === pageNum) {
                    mNav.className = 'whitespace-nowrap px-3 py-1 rounded-full bg-[#3B4D3B] text-white';
                } else {
                    mNav.className = 'whitespace-nowrap px-3 py-1 rounded-full bg-slate-100 hover:bg-slate-200';
                }
            }
        }

        // Update browser URL without full reload
        const defaultUrls = ['', '/portal', '/portal/agregat', '/portal/peta', '/portal/desa-cantik', '/portal/tentang'];
        const targetUrl = newUrl || defaultUrls[pageNum];
        if (history.pushState) {
            history.pushState({ page: pageNum }, '', targetUrl);
        }

        // Scroll to top
        const contentTop = document.getElementById('portal-content-top');
        if (contentTop) {
            contentTop.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // Special Initializations per Page
        if (pageNum === 2) {
            setTimeout(function() {
                if (typeof window.initExplorer === 'function') {
                    window.initExplorer();
                }
            }, 50);
        } else if (pageNum === 3) {
            setTimeout(function() {
                if (window.PresisiEngine) {
                    if (typeof window.PresisiEngine.init === 'function') window.PresisiEngine.init();
                    if (typeof window.PresisiEngine.invalidateMapSize === 'function') window.PresisiEngine.invalidateMapSize();
                }
            }, 150);
        }
    };

    // Handle Browser Back / Forward buttons
    window.addEventListener('popstate', function(e) {
        const path = window.location.pathname.toLowerCase();
        if (path.includes('agregat') || path.includes('ringkasan')) window.switchPortalPage(2);
        else if (path.includes('peta') || path.includes('spasial')) window.switchPortalPage(3);
        else if (path.includes('desa-cantik')) window.switchPortalPage(4);
        else if (path.includes('tentang') || path.includes('publikasi')) window.switchPortalPage(5);
        else window.switchPortalPage(1);
    });

    // 6. Desa Cantik Tab Switcher (Page 4)
    window.switchDesaCantikTab = function(slug) {
        document.querySelectorAll('.desacan-detail-card').forEach(card => {
            card.style.display = 'none';
        });
        document.querySelectorAll('.desacan-tab-btn').forEach(btn => {
            btn.className = 'desacan-tab-btn px-4 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-200 flex items-center gap-2 bg-white text-slate-700 hover:bg-emerald-50 border border-slate-200';
            const dot = btn.querySelector('span');
            if (dot) dot.className = 'w-2 h-2 rounded-full bg-slate-400';
        });

        const targetCard = document.getElementById('card-desacan-' + slug);
        const targetBtn = document.getElementById('tab-desacan-' + slug);

        if (targetCard) targetCard.style.display = 'block';
        if (targetBtn) {
            targetBtn.className = 'desacan-tab-btn px-4 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-200 flex items-center gap-2 bg-[#3B4D3B] text-white shadow-sm';
            const dot = targetBtn.querySelector('span');
            if (dot) dot.className = 'w-2 h-2 rounded-full bg-emerald-300';
        }
    };

    // 7. Modals: Pusat Bantuan & 15 Kecamatan
    window.togglePusatBantuan = function() {
        const modal = document.getElementById('modalPusatBantuan');
        if (modal) modal.classList.toggle('hidden');
    };

    window.toggleKecamatanModal = function() {
        const modal = document.getElementById('modalKecamatanList');
        if (modal) modal.classList.toggle('hidden');
    };

    window.selectKecamatanFromModal = function(namaKec) {
        window.toggleKecamatanModal();
        window.switchPortalPage(3, '/portal/peta');
        setTimeout(function() {
            if (window.PresisiEngine && typeof window.PresisiEngine.selectKecamatan === 'function') {
                window.PresisiEngine.selectKecamatan(namaKec);
            }
        }, 200);
    };

    // 8. Language Switcher ID/EN
    window.setPortalLanguage = function(lang) {
        const btnID = document.getElementById('btnLangID');
        const btnEN = document.getElementById('btnLangEN');
        if (lang === 'en') {
            if (btnEN) btnEN.className = 'px-2 py-0.5 rounded-full bg-[#3B4D3B] text-white shadow-2xs font-bold text-[11px]';
            if (btnID) btnID.className = 'px-2 py-0.5 rounded-full text-slate-600 hover:text-[#0b2545] font-bold text-[11px]';
        }} else {
            if (btnID) btnID.className = 'px-2 py-0.5 rounded-full bg-[#3B4D3B] text-white shadow-2xs font-bold text-[11px]';
            if (btnEN) btnEN.className = 'px-2 py-0.5 rounded-full text-slate-600 hover:text-[#0b2545] font-bold text-[11px]';
        }
    };

    // Auto-detect page on initial load
    document.addEventListener('DOMContentLoaded', function() {
        const path = window.location.pathname.toLowerCase();
        const hash = window.location.hash.toLowerCase();
        
        let pNum = {{ $curPage }};
        if (path.includes('agregat') || path.includes('ringkasan') || hash.includes('agregat')) pNum = 2;
        else if (path.includes('peta') || path.includes('spasial') || hash.includes('peta')) pNum = 3;
        else if (path.includes('desa-cantik') || hash.includes('desacantik')) pNum = 4;
        else if (path.includes('tentang') || path.includes('publikasi') || hash.includes('tentang')) pNum = 5;
        
        window.switchPortalPage(pNum);
    });
    </script>
</body>
</html>
