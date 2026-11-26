@php
    $curPage = (int) ($activePage ?? request('page', 1));
    if ($curPage === 4) {
        header("Location: /descan");
        exit;
    }
    if ($curPage < 1 || $curPage > 5) $curPage = 1;
    $curSub = $activeSub ?? request('sub', (request()->is('portal/publikasi*') ? 'publikasi' : 'madani'));
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
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons CDN -->
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
                        batangas: ['"Batangas"', 'sans-serif'],
                        cormorant: ['"Batangas"', 'sans-serif'],
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'ui-monospace', 'monospace']
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
    <script src="/data/kolut_kecamatan_polygons.js"></script>
    <script src="/data/kolut_desa_polygons.js"></script>

    <!-- PODES 2025 DATABASE, DESA PRESISI ENGINE & PODES EXPLORER -->
    <script src="/data/podes_kolut_complete_2025.js?v=20261123_03"></script>
    <script src="/js/desa_presisi_engine.js?v=20261124_05"></script>
    <script src="/js/podes_explorer.js?v=20261125_01"></script>

    <style>
        .leaflet-control-attribution {
            display: none !important;
        }
        html {
            overflow-x: clip;
            max-width: 100vw;
            width: 100%;
            box-sizing: border-box;
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        body {
            overflow-x: clip;
            max-width: 100vw;
            width: 100%;
            box-sizing: border-box;
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
    
    
        /* Typography: Cinzel (Header & Brand), Batangas (Secondary Display Titles), Plus Jakarta Sans (UI & Body) */
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
        .font-batangas {
            font-family: 'Batangas', sans-serif !important;
            letter-spacing: 0.02em;
        }
        .font-cormorant {
            font-family: 'Batangas', sans-serif !important;
            letter-spacing: 0.02em;
        }
        .font-editorial {
            font-family: 'Batangas', sans-serif !important;
            letter-spacing: 0.02em;
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


        /* ========================================================================= */
        /* 3D BOOK SHOWROOM & PEDESTAL STAGE (SNAZZY SPOTLIGHT DESIGN)                */
        /* ========================================================================= */
        
        /* ========================================================================= */
        /* PUBLIKASI BUKU GRID - BERSIH TANPA BACKGROUND WARNA & FULL WIDTH          */
        /* ========================================================================= */
        .bps-catalog-canvas {
            position: relative;
            background: transparent;
            border-radius: 0;
            padding: 1rem 0;
            overflow: visible;
            border: none;
            box-shadow: none;
            width: 100%;
        }

        /* Hilangkan Background Segitiga Sudut & Pita Belakang Buku */
        .bps-catalog-corner-wedge,
        .bps-row-ribbon-bar {
            display: none !important;
        }

        /* Book Card */
        .bps-catalog-card {
            transition: transform 0.25s cubic-bezier(0.2, 0, 0.2, 1);
        }

        .bps-catalog-card:hover {
            transform: translateY(-4px);
        }

        /* Realistic Standing 3D Book Cover */
        .bps-grid-book-wrapper {
            position: relative;
            perspective: 600px;
        }

        .bps-grid-book-cover {
            box-shadow: -8px 14px 22px -3px rgba(0, 0, 0, 0.38), -2px 0 5px rgba(0, 0, 0, 0.24);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            transform: rotateY(-6deg) rotateX(2deg);
            transform-style: preserve-3d;
        }

        .bps-grid-book-wrapper:hover .bps-grid-book-cover {
            transform: rotateY(0deg) rotateX(0deg) scale(1.04);
            box-shadow: -12px 20px 28px -3px rgba(0, 0, 0, 0.48), -3px 0 8px rgba(0, 0, 0, 0.32);
        }

        /* Book Thickness Page Lines on Right */
        .bps-grid-book-pages {
            position: absolute;
            top: 3px;
            right: -7px;
            width: 7px;
            height: calc(100% - 6px);
            background: repeating-linear-gradient(to bottom, #ffffff 0px, #e2e8f0 1.5px, #ffffff 3px);
            border-radius: 0 3px 3px 0;
            box-shadow: 2px 2px 4px rgba(0,0,0,0.22);
            pointer-events: none;
        }

        .bps-stage-container {
            perspective: 1400px;
            width: 100%;
            position: relative;
            user-select: none;
            touch-action: pan-y;
            overflow: hidden;
            background: #ffffff;
            border-radius: 1.5rem;
            border: 1px solid rgba(59, 77, 59, 0.18);
            box-shadow: 0 4px 20px -5px rgba(0, 0, 0, 0.05);
            min-height: 580px;
        }

        /* Dual Spotlight Beams (Hidden on white clean background) */
        .bps-spotlight-left,
        .bps-spotlight-right {
            display: none;
        }

        /* Center Stage Floor Glow & Podium Base (Soft & Light Green) */
        .bps-stage-floor-glow {
            position: absolute;
            bottom: 35px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 1100px;
            height: 130px;
            background: radial-gradient(ellipse at center, rgba(59, 77, 59, 0.15) 0%, rgba(16, 185, 129, 0.08) 45%, transparent 75%);
            filter: blur(16px);
            pointer-events: none;
            z-index: 3;
        }

        .bps-podium-platform-base {
            position: absolute;
            bottom: 22px;
            left: 50%;
            transform: translateX(-50%) rotateX(68deg);
            width: 360px;
            height: 120px;
            border-radius: 50%;
            background: radial-gradient(ellipse at center, rgba(240, 253, 244, 0.95) 0%, rgba(209, 250, 229, 0.6) 50%, rgba(167, 243, 208, 0.25) 100%);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05), 0 0 25px rgba(59, 77, 59, 0.18);
            border: 2px solid rgba(167, 243, 208, 0.9);
            pointer-events: none;
            z-index: 4;
        }

        @media (min-width: 1024px) {
            .bps-podium-platform-base {
                width: 540px;
                height: 140px;
                bottom: 24px;
            }
        }

        @media (max-width: 640px) {
            .bps-podium-platform-base {
                width: 250px;
                height: 90px;
                bottom: 18px;
            }
        }

        /* 3D Track for Books (Full height & spacious) */
        .bps-books-track {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            height: 560px;
            transform-style: preserve-3d;
            transition: transform 0.65s cubic-bezier(0.22, 1, 0.36, 1);
            z-index: 10;
        }

        @media (max-width: 640px) {
            .bps-books-track {
                height: 420px;
            }
        }

        /* 3D Book Item */
        .bps-book-3d-item {
            position: absolute;
            width: 220px;
            height: 320px;
            transition: transform 0.65s cubic-bezier(0.22, 1, 0.36, 1), 
                        opacity 0.65s ease, 
                        filter 0.65s ease;
            transform-style: preserve-3d;
            cursor: pointer;
            will-change: transform, opacity;
        }

        @media (max-width: 640px) {
            .bps-book-3d-item {
                width: 175px;
                height: 255px;
            }
        }

        .bps-book-volume {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.4s ease;
        }

        .bps-book-3d-item:hover .bps-book-volume {
            transform: translateY(-8px) scale(1.02);
        }

        /* Book Front Cover */
        .bps-book-cover {
            position: absolute;
            inset: 0;
            border-radius: 6px 14px 14px 6px;
            overflow: hidden;
            transform: translateZ(16px);
            box-shadow: 0 20px 40px -8px rgba(0, 0, 0, 0.7), 0 0 0 1px rgba(255, 255, 255, 0.18) inset;
            backface-visibility: hidden;
        }

        .bps-book-cover::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(115deg, rgba(255,255,255,0.32) 0%, rgba(255,255,255,0.06) 28%, transparent 60%);
            pointer-events: none;
        }

        /* Book Spine */
        .bps-book-spine {
            position: absolute;
            top: 0;
            left: 0;
            width: 32px;
            height: 100%;
            border-radius: 6px 0 0 6px;
            transform: rotateY(-90deg) translateX(-16px);
            transform-origin: left center;
            box-shadow: inset -2px 0 6px rgba(0, 0, 0, 0.45), inset 2px 0 4px rgba(255, 255, 255, 0.18);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 12px 2px;
        }

        .bps-book-spine-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.95);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 200px;
        }

        /* Book Pages Edge */
        .bps-book-pages-right {
            position: absolute;
            top: 4px;
            bottom: 4px;
            right: 0;
            width: 30px;
            transform: rotateY(90deg) translateX(15px);
            transform-origin: right center;
            background: repeating-linear-gradient(
                0deg,
                #f8fafc 0px,
                #f8fafc 2px,
                #cbd5e1 3px,
                #94a3b8 4px
            );
            border-radius: 0 4px 4px 0;
            box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.25);
        }

        .bps-book-pages-top {
            position: absolute;
            top: 0;
            left: 4px;
            right: 4px;
            height: 30px;
            transform: rotateX(90deg) translateY(-15px);
            transform-origin: top center;
            background: repeating-linear-gradient(
                90deg,
                #f8fafc 0px,
                #f8fafc 2px,
                #cbd5e1 3px,
                #94a3b8 4px
            );
            box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.25);
        }

        /* Individual Book Pedestal */
        .bps-book-pedestal {
            position: absolute;
            bottom: -32px;
            left: 50%;
            transform: translateX(-50%) rotateX(68deg);
            width: 230px;
            height: 85px;
            border-radius: 50%;
            background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.12) 0%, rgba(0, 0, 0, 0.04) 60%, transparent 100%);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            pointer-events: none;
            transition: all 0.65s cubic-bezier(0.22, 1, 0.36, 1);
        }

        @media (max-width: 640px) {
            .bps-book-pedestal {
                width: 180px;
                height: 70px;
                bottom: -24px;
            }
        }

        /* Active Spotlight Center Book */
        .bps-book-3d-item.active {
            transform: translateX(0px) translateZ(80px) rotateY(0deg) scale(1.08) !important;
            z-index: 50;
            opacity: 1 !important;
            filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.22)) !important;
            cursor: default;
        }

        .bps-book-3d-item.active .bps-book-pedestal {
            background: radial-gradient(ellipse at center, rgba(16, 185, 129, 0.35) 0%, rgba(16, 185, 129, 0.15) 50%, transparent 100%);
            box-shadow: 0 12px 28px rgba(16, 185, 129, 0.25);
        }

        /* 3D Side Positions */
        .bps-book-3d-item.pos-right-1 {
            transform: translateX(200px) translateZ(-20px) rotateY(-24deg) scale(0.9) !important;
            z-index: 40;
            opacity: 0.94;
            filter: brightness(0.96) drop-shadow(0 12px 20px rgba(0, 0, 0, 0.14)) !important;
        }
        .bps-book-3d-item.pos-left-1 {
            transform: translateX(-200px) translateZ(-20px) rotateY(24deg) scale(0.9) !important;
            z-index: 40;
            opacity: 0.94;
            filter: brightness(0.96) drop-shadow(0 12px 20px rgba(0, 0, 0, 0.14)) !important;
        }
        .bps-book-3d-item.pos-right-2 {
            transform: translateX(360px) translateZ(-110px) rotateY(-38deg) scale(0.76) !important;
            z-index: 30;
            opacity: 0.88;
            filter: brightness(0.92) drop-shadow(0 8px 16px rgba(0, 0, 0, 0.1)) !important;
        }
        .bps-book-3d-item.pos-left-2 {
            transform: translateX(-360px) translateZ(-110px) rotateY(38deg) scale(0.76) !important;
            z-index: 30;
            opacity: 0.88;
            filter: brightness(0.92) drop-shadow(0 8px 16px rgba(0, 0, 0, 0.1)) !important;
        }
        .bps-book-3d-item.pos-hidden {
            transform: translateX(0px) translateZ(-240px) scale(0.5) !important;
            z-index: 10;
            opacity: 0;
            pointer-events: none;
        }

        /* Tampilan Luas & Penuh di Layar Laptop / Desktop */
        @media (min-width: 1024px) {
            .bps-book-3d-item.pos-right-1 {
                transform: translateX(270px) translateZ(-15px) rotateY(-24deg) scale(0.92) !important;
            }
            .bps-book-3d-item.pos-left-1 {
                transform: translateX(-270px) translateZ(-15px) rotateY(24deg) scale(0.92) !important;
            }
            .bps-book-3d-item.pos-right-2 {
                transform: translateX(500px) translateZ(-100px) rotateY(-36deg) scale(0.8) !important;
            }
            .bps-book-3d-item.pos-left-2 {
                transform: translateX(-500px) translateZ(-100px) rotateY(36deg) scale(0.8) !important;
            }
        }

        @media (min-width: 1440px) {
            .bps-book-3d-item.pos-right-1 {
                transform: translateX(320px) translateZ(-10px) rotateY(-24deg) scale(0.95) !important;
            }
            .bps-book-3d-item.pos-left-1 {
                transform: translateX(-320px) translateZ(-10px) rotateY(24deg) scale(0.95) !important;
            }
            .bps-book-3d-item.pos-right-2 {
                transform: translateX(600px) translateZ(-80px) rotateY(-35deg) scale(0.84) !important;
            }
            .bps-book-3d-item.pos-left-2 {
                transform: translateX(-600px) translateZ(-80px) rotateY(35deg) scale(0.84) !important;
            }
        }

        @media (max-width: 640px) {
            .bps-book-3d-item.pos-right-1 {
                transform: translateX(110px) translateZ(-15px) rotateY(-22deg) scale(0.82) !important;
            }
            .bps-book-3d-item.pos-left-1 {
                transform: translateX(-110px) translateZ(-15px) rotateY(22deg) scale(0.82) !important;
            }
            .bps-book-3d-item.pos-right-2 {
                transform: translateX(200px) translateZ(-90px) rotateY(-34deg) scale(0.66) !important;
                opacity: 0.45;
            }
            .bps-book-3d-item.pos-left-2 {
                transform: translateX(-200px) translateZ(-90px) rotateY(34deg) scale(0.66) !important;
                opacity: 0.45;
            }
        }

    </style>
</head>

<body class="bg-[#F8FAF8] text-slate-800 antialiased min-h-screen flex flex-col selection:bg-emerald-100 selection:text-emerald-900">

    <!-- TOP NAVIGATION BAR (IDENTIK & ELEGAN DENGAN DUA LOGO RESMI - FIXED TRANSPARAN DI ATAS, PUTIH SAAT SCROLL) -->
        <!-- HEADER UTAMA PORTAL DESA MADANI -->
    @include('partials.portal-header')



    <!-- Header Spacer to maintain exact page layout flow with fixed navbar -->
    <div id="headerSpacer" class="w-full shrink-0"></div>
    <div id="portal-content-top"></div>

    <!-- MAIN PAGES CONTAINER (PISAH 5 HALAMAN) -->
    <main class="flex-1 w-full">

        <!-- ========================================================================= -->
            <!-- HALAMAN 1: BERANDA -->
    @include('components.portal.page1-beranda')

    <!-- HALAMAN 2: AGREGAT 15 KECAMATAN -->
    @include('components.portal.page2-agregat')

    <!-- HALAMAN 3: WEBGIS PETA SPASIAL -->
    @include('components.portal.page3-spasial')

    <!-- HALAMAN 4: DIALIHKAN LANGSUNG KE PORTAL LENGKAP DESCAN (/descan) -->
    <!-- Halaman monografi preview dihapus sesuai permintaan user -->

    <!-- HALAMAN 5: TENTANG DESA MADANI & PUBLIKASI -->
    @include('components.portal.page5-tentang')

    </main>

    <!-- FOOTER RESMI -->
        <!-- FOOTER RESMI SATU DATA INDONESIA -->
    @include('partials.portal-footer')



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
    window.onNavClick = function(event, pageNum, url, subTab) {
        if (pageNum === 4) {
            window.location.href = '/descan';
            return;
        }
        if (event && event.preventDefault) event.preventDefault();
        window.switchPortalPage(pageNum, url, subTab);
    };

    // 5. 5-Page Switcher with Instant Toggle & History State
    window.switchPortalPage = function(pageNum, newUrl, subTab) {
        if (pageNum === 4) {
            window.location.href = '/descan';
            return;
        }
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

        // Subtab handling for Page 5 (Madani vs Publikasi)
        if (pageNum === 5) {
            let targetSub = subTab;
            if (!targetSub && newUrl) {
                targetSub = newUrl.includes('publikasi') ? 'publikasi' : 'madani';
            }
            if (!targetSub) {
                const path = window.location.pathname.toLowerCase();
                targetSub = path.includes('publikasi') ? 'publikasi' : 'madani';
            }
            window.switchTentangTab(targetSub, false);
        }

        // Update browser URL without full reload
        const defaultUrls = ['', '/portal', '/portal/agregat', '/portal/peta', '/portal/desa-cantik', '/portal/tentang'];
        let targetUrl = newUrl;
        if (!targetUrl) {
            if (pageNum === 5) {
                targetUrl = (subTab === 'publikasi') ? '/portal/publikasi' : '/portal/tentang';
            } else {
                targetUrl = defaultUrls[pageNum];
            }
        }
        if (history.pushState) {
            history.pushState({ page: pageNum, sub: subTab || 'madani' }, '', targetUrl);
        }

        // Scroll window to top
        window.scrollTo({ top: 0, behavior: 'smooth' });

        // Special Initializations per Page

        if (pageNum === 2) {
            setTimeout(function() {
                if (typeof window.initExplorer === 'function') {
                    window.initExplorer();
                }
                if (typeof window.triggerSummaryCountUp === 'function') {
                    window.triggerSummaryCountUp();
                }
            }, 60);
        } else if (pageNum === 3) {
            setTimeout(function() {
                if (window.PresisiEngine) {
                    if (typeof window.PresisiEngine.init === 'function') window.PresisiEngine.init();
                    if (typeof window.PresisiEngine.invalidateMapSize === 'function') window.PresisiEngine.invalidateMapSize();
                }
            }, 150);
        }

        };

    // Subtab switcher inside Page 5 (Madani vs Publikasi)
    window.switchTentangTab = function(tabKey, pushHistory = true) {
        tabKey = (tabKey === 'publikasi') ? 'publikasi' : 'madani';
        const subMadani = document.getElementById('subViewMadani');
        const subPublikasi = document.getElementById('subViewPublikasi');
        const pillMadani = document.getElementById('subPillMadani');
        const pillPublikasi = document.getElementById('subPillPublikasi');
        const mNav5 = document.getElementById('mNav5');
        const mNav5Pub = document.getElementById('mNav5Publikasi');

        if (tabKey === 'publikasi') {
            if (subMadani) subMadani.classList.add('hidden');
            if (subPublikasi) subPublikasi.classList.remove('hidden');
            if (pillMadani) pillMadani.classList.add('hidden');
            if (pillPublikasi) pillPublikasi.classList.remove('hidden');
            if (mNav5) mNav5.className = 'whitespace-nowrap px-3 py-1 rounded-full bg-slate-100 hover:bg-slate-200';
            if (mNav5Pub) mNav5Pub.className = 'whitespace-nowrap px-3 py-1 rounded-full bg-[#3B4D3B] text-white';
            if (pushHistory && history.pushState && window.CURRENT_PORTAL_PAGE === 5) {
                history.pushState({ page: 5, sub: 'publikasi' }, '', '/portal/publikasi');
            }
        } else {
            // Default: 'madani'
            if (subMadani) subMadani.classList.remove('hidden');
            if (subPublikasi) subPublikasi.classList.add('hidden');
            if (pillMadani) pillMadani.classList.remove('hidden');
            if (pillPublikasi) pillPublikasi.classList.add('hidden');
            if (mNav5) mNav5.className = 'whitespace-nowrap px-3 py-1 rounded-full bg-[#3B4D3B] text-white';
            if (mNav5Pub) mNav5Pub.className = 'whitespace-nowrap px-3 py-1 rounded-full bg-slate-100 hover:bg-slate-200';
            if (pushHistory && history.pushState && window.CURRENT_PORTAL_PAGE === 5) {
                history.pushState({ page: 5, sub: 'madani' }, '', '/portal/tentang');
            }
        }
    };

    // 5b. BPS Publications Catalog Modal & Filter
    window.bpsBooksDatabase = undefined;

    
    // =========================================================================
    // 5c. 3D BOOK STAGE AUTOMATION ENGINE (SNAZZY SPOTLIGHT STAGE SHOWROOM)
    // =========================================================================
    window.bpsStageBooks = [
        { 
            key: 'kuda', 
            title: 'Kabupaten Kolaka Utara Dalam Angka 2025/2026', 
            badge: 'Publikasi Utama BPS', 
            badgeColor: 'bg-emerald-50 text-[#3B4D3B] border border-emerald-200/80', 
            releaseDate: 'Rilis: 28 Feb 2025', 
            pages: '486 Halaman', 
            pubNo: '1102001.7408', 
            issn: 'ISSN: 0215-6032', 
            category: 'kuda', 
            desc: 'Publikasi tahunan komprehensif yang menyajikan data statistik makro dan sektoral wilayah Kabupaten Kolaka Utara. Meliputi keadaan geografi dan iklim, pemerintahan daerah, perkembangan kependudukan dan ketenagakerjaan, sosial dan kesejahteraan rakyat, pertanian tanaman pangan dan perkebunan kakao, perindustrian dan energi, perdagangan, serta Produk Domestik Regional Bruto (PDRB).', 
            link: 'https://kolutkab.bps.go.id' 
        },
        { 
            key: 'statda', 
            title: 'Statistik Daerah Kabupaten Kolaka Utara 2025', 
            badge: 'Analisis Makro Daerah', 
            badgeColor: 'bg-emerald-50 text-[#3B4D3B] border border-emerald-200/80', 
            releaseDate: 'Rilis: 15 Nov 2025', 
            pages: '58 Halaman', 
            pubNo: '1101002.7408', 
            issn: 'ISSN: 2338-7610', 
            category: 'statda', 
            desc: 'Analisis deskriptif indikator-indikator terpilih yang menggambarkan kondisi pembangunan daerah Kabupaten Kolaka Utara secara visual melalui infografis, narasi ringkas, dan tabel komparasi antar-waktu. Sangat berguna bagi para perencana dan pemangku kebijakan publik daerah.', 
            link: 'https://kolutkab.bps.go.id' 
        },
        { 
            key: 'podes', 
            title: 'Potensi Desa (PODES) Kabupaten Kolaka Utara 2025', 
            badge: 'Hasil Sensus Lengkap', 
            badgeColor: 'bg-emerald-50 text-[#3B4D3B] border border-emerald-200/80', 
            releaseDate: 'Rilis: 20 Jan 2025', 
            pages: '312 Halaman', 
            pubNo: '1104003.7408', 
            issn: 'ISBN: 978-602-5819-21-4', 
            category: 'podes', 
            desc: 'Buku rujukan utama fondasi data portal Desa Madani. Memuat hasil pendataan sensus potensi 127 Desa dan 6 Kelurahan di 15 Kecamatan Kabupaten Kolaka Utara. Mencakup ketersediaan fasilitas sosial ekonomi, infrastruktur dasar, aksesibilitas jalan, sanitasi, potensi kebencanaan, dan tata kelola aparatur desa.', 
            link: 'https://kolutkab.bps.go.id' 
        },
        { 
            key: 'kesra', 
            title: 'Indikator Kesejahteraan Rakyat Kolaka Utara 2025', 
            badge: 'Kesejahteraan Sosial (SUSENAS)', 
            badgeColor: 'bg-emerald-50 text-[#3B4D3B] border border-emerald-200/80', 
            releaseDate: 'Rilis: 10 Des 2025', 
            pages: '124 Halaman', 
            pubNo: '1103002.7408', 
            issn: 'ISSN: 2477-183X', 
            category: 'kesra', 
            desc: 'Potret komprehensif derajat kesehatan, angka partisipasi sekolah (APM/APK), ketenagakerjaan, pola pengeluaran konsumsi pangan/non-pangan, serta kelayakan hunian penduduk Kolaka Utara bersumber dari Survei Sosial Ekonomi Nasional (SUSENAS).', 
            link: 'https://kolutkab.bps.go.id' 
        },
        { 
            key: 'descan', 
            title: 'Panduan Teknis Pembinaan Desa Cantik (DESCAN)', 
            badge: 'Pedoman Teknis BPS', 
            badgeColor: 'bg-emerald-50 text-[#3B4D3B] border border-emerald-200/80', 
            releaseDate: 'Rilis: 15 Mei 2025', 
            pages: '96 Halaman', 
            pubNo: '1109001.7408', 
            issn: 'Pedoman Pembinaan BPS', 
            category: 'descan', 
            desc: 'Petunjuk teknis resmi bagi agen statistik desa dan operator sistem dalam pengumpulan, validasi, pengolahan, dan penyajian data statistik sektoral desa berstandar Satu Data Indonesia (SDI).', 
            link: 'https://kolutkab.bps.go.id' 
        },
        { 
            key: 'kda-kec', 
            title: 'Kecamatan Dalam Angka 2025 (15 Jilid Kompilasi)', 
            badge: 'Statistik 15 Kewilayahan', 
            badgeColor: 'bg-emerald-50 text-[#3B4D3B] border border-emerald-200/80', 
            releaseDate: 'Rilis: 26 Sep 2025', 
            pages: '15 Jilid Buku', 
            pubNo: '1102002.7408', 
            issn: 'ISSN: 2615-112X', 
            category: 'kda-kec', 
            desc: 'Serial lengkap 15 jilid data mikro kewilayahan untuk Kecamatan Lasusua, Kodeoha, Tiwu, Ngapa, Wawo, Lambai, Ranteangin, Pakue, Pakue Tengah, Pakue Utara, Batu Putih, Porehu, Tolala, Katoi, dan Watunohu.', 
            link: 'https://kolutkab.bps.go.id' 
        }
    ];

    window.bpsStageCurrentIdx = 0;
    window.bpsStageAutoplayTimer = null;
    window.isBpsStageHovered = false;
    window.isBpsStageDragging = false;
    window.bpsStageStartX = 0;
    window.isBpsStageAutoplayActive = true;

    // Render 3D Stage Cards & Inspector Info
    window.updateBpsStageBooks = function() {
        const total = window.bpsStageBooks.length;
        const current = window.bpsStageCurrentIdx;

        for (let i = 0; i < total; i++) {
            const el = document.getElementById('bpsBook3D-' + i);
            if (!el) continue;

            el.classList.remove('active', 'pos-right-1', 'pos-left-1', 'pos-right-2', 'pos-left-2', 'pos-hidden');
            let diff = i - current;

            // Handle circular wrapping for 6 items
            if (diff > total / 2) diff -= total;
            if (diff < -total / 2) diff += total;

            if (diff === 0) {
                el.classList.add('active');
            } else if (diff === 1) {
                el.classList.add('pos-right-1');
            } else if (diff === -1) {
                el.classList.add('pos-left-1');
            } else if (diff === 2) {
                el.classList.add('pos-right-2');
            } else if (diff === -2) {
                el.classList.add('pos-left-2');
            } else {
                el.classList.add('pos-hidden');
            }
        }

        // Update Inspector Card
        const book = window.bpsStageBooks[current];
        if (book) {
            const bBadge = document.getElementById('inspectorBadge');
            const bRel = document.getElementById('inspectorReleaseDate');
            const bPages = document.getElementById('inspectorPages');
            const bTitle = document.getElementById('inspectorTitle');
            const bDesc = document.getElementById('inspectorDesc');
            const bPubNo = document.getElementById('inspectorPubNo');
            const bIssn = document.getElementById('inspectorIssn');
            const bDl = document.getElementById('inspectorDownloadBtn');

            if (bBadge) {
                bBadge.innerText = book.badge;
                bBadge.className = 'px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider ' + book.badgeColor;
            }
            if (bRel) bRel.innerText = book.releaseDate;
            if (bPages) bPages.innerText = book.pages;
            if (bTitle) bTitle.innerText = book.title;
            if (bDesc) bDesc.innerText = book.desc;
            if (bPubNo) bPubNo.innerText = book.pubNo;
            if (bIssn) bIssn.innerText = book.issn;
            if (bDl) bDl.href = book.link;
        }

        // Update Dots Indicator
        const dotsContainer = document.getElementById('bpsStageDots');
        if (dotsContainer) {
            dotsContainer.innerHTML = window.bpsStageBooks.map((b, i) => `
                <button type="button" onclick="window.goToBpsStage(${i})" 
                        class="h-2.5 rounded-full transition-all duration-300 cursor-pointer ${i === current ? 'w-8 bg-[#3B4D3B]' : 'w-2.5 bg-slate-300 hover:bg-slate-400'}" 
                        title="${b.title}">
                </button>
            `).join('');
        }
    };

    // Rotate 3D Stage (+1 forward / -1 backward)
    window.rotateBpsStage = function(direction) {
        const total = window.bpsStageBooks.length;
        window.bpsStageCurrentIdx = (window.bpsStageCurrentIdx + direction + total) % total;
        window.updateBpsStageBooks();
    };

    window.goToBpsStage = function(index) {
        window.bpsStageCurrentIdx = index;
        window.updateBpsStageBooks();
    };

    // Autoplay Controls ("model automation di nama desa cantik")
    window.startBpsStageAutoplay = function() {
        window.stopBpsStageAutoplay();
        if (!window.isBpsStageAutoplayActive) return;
        window.bpsStageAutoplayTimer = setInterval(() => {
            if (!window.isBpsStageHovered && !window.isBpsStageDragging && window.isBpsStageAutoplayActive) {
                window.rotateBpsStage(1);
            }
        }, 3800);
    };

    window.stopBpsStageAutoplay = function() {
        if (window.bpsStageAutoplayTimer) {
            clearInterval(window.bpsStageAutoplayTimer);
            window.bpsStageAutoplayTimer = null;
        }
    };

    window.toggleBpsStageAutoplay = function() {
        window.isBpsStageAutoplayActive = !window.isBpsStageAutoplayActive;
        const icon = document.getElementById('iconStageMotion');
        const text = document.getElementById('textStageMotion');

        if (window.isBpsStageAutoplayActive) {
            if (icon) icon.innerText = '⏸️';
            if (text) text.innerText = 'Jeda Gerak';
            window.startBpsStageAutoplay();
        } else {
            if (icon) icon.innerText = '▶️';
            if (text) text.innerText = 'Putar Otomatis';
            window.stopBpsStageAutoplay();
        }
    };

    window.handleBpsStageHover = function(isHover) {
        window.isBpsStageHovered = isHover;
        if (isHover) {
            window.stopBpsStageAutoplay();
        } else if (window.isBpsStageAutoplayActive) {
            window.startBpsStageAutoplay();
        }
    };

    // Drag gestures for desktop mouse
    window.handleBpsStageDragStart = function(e) {
        window.isBpsStageDragging = true;
        window.bpsStageStartX = e.clientX;
        const handleDragEnd = function(upEvt) {
            if (!window.isBpsStageDragging) return;
            window.isBpsStageDragging = false;
            document.removeEventListener('mouseup', handleDragEnd);
            const deltaX = upEvt.clientX - window.bpsStageStartX;
            if (deltaX < -40) {
                window.rotateBpsStage(1);
            } else if (deltaX > 40) {
                window.rotateBpsStage(-1);
            }
        };
        document.addEventListener('mouseup', handleDragEnd);
    };

    // Touch gestures for mobile HP
    window.handleBpsStageTouchStart = function(e) {
        if (e.touches.length > 0) {
            window.bpsStageStartX = e.touches[0].clientX;
            window.isBpsStageDragging = true;
        }
    };

    window.handleBpsStageTouchEnd = function(e) {
        if (!window.isBpsStageDragging) return;
        window.isBpsStageDragging = false;
        if (e.changedTouches.length > 0) {
            const deltaX = e.changedTouches[0].clientX - window.bpsStageStartX;
            if (deltaX < -35) {
                window.rotateBpsStage(1);
            } else if (deltaX > 35) {
                window.rotateBpsStage(-1);
            }
        }
    };

    // Click on book: if active, open detail modal; if side book, bring to center
    window.handleBpsBookClick = function(event, index, key) {
        if (index === window.bpsStageCurrentIdx) {
            window.openBpsBookModal(key);
        } else {
            window.goToBpsStage(index);
        }
    };

    // View Mode Toggle (3D Stage vs Grid View)
    // Filter Dropdown Handlers
    window.toggleBpsFilterDropdown = function(event) {
        if (event) event.stopPropagation();
        const menu = document.getElementById('menuBpsFilterDropdown');
        const arrow = document.getElementById('iconFilterDropdownArrow');
        if (menu) {
            const isHidden = menu.classList.contains('hidden');
            if (isHidden) {
                menu.classList.remove('hidden');
                if (arrow) arrow.style.transform = 'rotate(180deg)';
            } else {
                menu.classList.add('hidden');
                if (arrow) arrow.style.transform = 'rotate(0deg)';
            }
        }
    };

    window.applyBpsFilter = function(category, label) {
        const labelEl = document.getElementById('labelActiveFilter');
        if (labelEl) labelEl.innerText = 'Filter: ' + label;

        const menu = document.getElementById('menuBpsFilterDropdown');
        const arrow = document.getElementById('iconFilterDropdownArrow');
        if (menu) menu.classList.add('hidden');
        if (arrow) arrow.style.transform = 'rotate(0deg)';

        // 1. Filter in Model Grid (Katalog Buku)
        const gridCards = document.querySelectorAll('.bps-catalog-card');
        gridCards.forEach(card => {
            const cardCat = card.getAttribute('data-bps-cat');
            if (category === 'all' || cardCat === category || (category === 'kda-kec' && cardCat && cardCat.startsWith('kda'))) {
                card.style.opacity = '1';
                card.style.transform = 'scale(1)';
                card.style.filter = 'none';
            } else {
                card.style.opacity = '0.35';
                card.style.transform = 'scale(0.96)';
                card.style.filter = 'grayscale(60%)';
            }
        });

        // 2. Also navigate 3D Stage to matching book
        if (window.bpsStageBooks) {
            const targetIdx = window.bpsStageBooks.findIndex(b => b.category === category || (category === 'kda-kec' && b.category === 'kda-kec'));
            if (targetIdx !== -1) {
                window.goToBpsStage(targetIdx);
            }
        }
    };

    // Close filter dropdown on outside click
    document.addEventListener('click', function(e) {
        const wrapper = document.getElementById('bpsFilterDropdownWrapper');
        const menu = document.getElementById('menuBpsFilterDropdown');
        const arrow = document.getElementById('iconFilterDropdownArrow');
        if (wrapper && menu && !wrapper.contains(e.target)) {
            menu.classList.add('hidden');
            if (arrow) arrow.style.transform = 'rotate(0deg)';
        }
    });

    window.toggleBpsViewMode = function(mode) {
        const stageSection = document.getElementById('bpsStageShowcaseSection');
        const gridSection = document.getElementById('bpsCatalogueGridSection');
        const btn3D = document.getElementById('btnViewMode3D');
        const btnGrid = document.getElementById('btnViewModeGrid');

        if (mode === '3d') {
            if (stageSection) stageSection.classList.remove('hidden');
            if (gridSection) gridSection.classList.add('hidden');
            
            if (btn3D) {
                btn3D.className = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-black transition-all bg-[#3B4D3B] text-white shadow-xs cursor-pointer flex items-center gap-1.5';
            }
            if (btnGrid) {
                btnGrid.className = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition-all text-slate-600 hover:text-slate-900 cursor-pointer flex items-center gap-1.5';
            }

            window.updateBpsStageBooks();
            window.isBpsStageAutoplayActive = true;
            window.startBpsStageAutoplay();
        } else {
            // Default: 'grid'
            if (stageSection) stageSection.classList.add('hidden');
            if (gridSection) gridSection.classList.remove('hidden');
            
            if (btnGrid) {
                btnGrid.className = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-black transition-all bg-[#3B4D3B] text-white shadow-xs cursor-pointer flex items-center gap-1.5';
            }
            if (btn3D) {
                btn3D.className = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition-all text-slate-600 hover:text-slate-900 cursor-pointer flex items-center gap-1.5';
            }

            window.stopBpsStageAutoplay();
        }
    };

    window.openBpsBookModal = function(bookKey) {
        let book = (window.bpsBooksDatabase && window.bpsBooksDatabase[bookKey]) || null;
        if (!book && window.bpsStageBooks) {
            const found = window.bpsStageBooks.find(b => b.key === bookKey);
            if (found) {
                book = {
                    title: found.title,
                    badge: found.badge,
                    badgeColor: found.badgeColor || 'bg-emerald-50 text-[#3B4D3B] border border-emerald-200/80',
                    pubNumber: found.pubNo,
                    issn: found.issn,
                    pages: found.pages,
                    date: found.releaseDate,
                    desc: found.desc,
                    coverGradient: 'from-[#173824] via-[#204a32] to-[#142e1f]',
                    link: found.link,
                    chapters: [
                        'Bab 1: Keadaan Geografi, Wilayah & Iklim',
                        'Bab 2: Pemerintahan & Tata Kelola Daerah',
                        'Bab 3: Kependudukan & Ketenagakerjaan',
                        'Bab 4: Sosial & Kesejahteraan Rakyat',
                        'Bab 5: Perekonomian & Pertanian Kakao',
                        'Bab 6: PDRB & Indikator Makro'
                    ]
                };
            }
        }
        if (!book) return;
        const modal = document.getElementById('bpsBookPreviewModal');
        if (!modal) return;

        const cover = document.getElementById('bpsBookModalCover');
        const badge = document.getElementById('bpsBookModalBadge');
        const title = document.getElementById('bpsBookModalTitle');
        const pub = document.getElementById('bpsBookModalPubNumber');
        const issn = document.getElementById('bpsBookModalIssn');
        const pages = document.getElementById('bpsBookModalPages');
        const date = document.getElementById('bpsBookModalDate');
        const desc = document.getElementById('bpsBookModalDesc');
        const chList = document.getElementById('bpsBookModalChapters');
        const dlBtn = document.getElementById('bpsBookModalDownloadBtn');

        if (cover) cover.className = `w-full sm:w-48 h-60 rounded-2xl bg-gradient-to-br ${book.coverGradient} p-5 text-white flex flex-col justify-between shadow-md shrink-0`;
        if (badge) {
            badge.innerText = book.badge;
            badge.className = `px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider ${book.badgeColor}`;
        }
        if (title) title.innerText = book.title;
        if (pub) pub.innerText = book.pubNumber;
        if (issn) issn.innerText = book.issn;
        if (pages) pages.innerText = book.pages;
        if (date) date.innerText = book.date;
        if (desc) desc.innerText = book.desc;

        if (chList) {
            chList.innerHTML = '';
            book.chapters.forEach(ch => {
                const li = document.createElement('li');
                li.innerText = ch;
                chList.appendChild(li);
            });
        }

        if (dlBtn) {
            dlBtn.href = book.link;
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    };

    window.closeBpsBookModal = function() {
        const modal = document.getElementById('bpsBookPreviewModal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    };

    window.filterBpsBooks = function(category, btn) {
        const buttons = document.querySelectorAll('.bps-book-filter-btn');
        buttons.forEach(b => {
            b.className = 'bps-book-filter-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 cursor-pointer';
        });
        if (btn) {
            btn.className = 'bps-book-filter-btn px-4 py-2 rounded-xl text-xs font-extrabold transition-all bg-[#3B4D3B] text-white shadow-xs cursor-pointer active';
        }

        // Rotate 3D stage directly to that book
        const bookIdx = window.bpsStageBooks.findIndex(b => b.key === category || b.category === category);
        if (bookIdx !== -1) {
            window.goToBpsStage(bookIdx);
        } else if (category === 'all') {
            window.goToBpsStage(0);
        }
    };

    // Handle Browser Back / Forward buttons
    window.addEventListener('popstate', function(e) {
        const path = window.location.pathname.toLowerCase();
        if (path.includes('agregat') || path.includes('ringkasan')) window.switchPortalPage(2);
        else if (path.includes('peta') || path.includes('spasial')) window.switchPortalPage(3);
        else if (path.includes('desa-cantik')) window.switchPortalPage(4);
        else if (path.includes('publikasi')) window.switchPortalPage(5, '/portal/publikasi', 'publikasi');
        else if (path.includes('tentang')) window.switchPortalPage(5, '/portal/tentang', 'madani');
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
        try { localStorage.removeItem('portal_lang'); } catch(e) {}
        const btnID = document.getElementById('btnLangID');
        const btnEN = document.getElementById('btnLangEN');
        if (lang === 'en') {
            if (btnEN) btnEN.className = 'px-2 py-0.5 rounded-full bg-[#3B4D3B] text-white shadow-2xs font-bold text-[11px]';
            if (btnID) btnID.className = 'px-2 py-0.5 rounded-full text-slate-600 hover:text-[#0b2545] font-bold text-[11px]';
        } else {
            if (btnID) btnID.className = 'px-2 py-0.5 rounded-full bg-[#3B4D3B] text-white shadow-2xs font-bold text-[11px]';
            if (btnEN) btnEN.className = 'px-2 py-0.5 rounded-full text-slate-600 hover:text-[#0b2545] font-bold text-[11px]';
        }
    };

    // 9. Sticky Header Smooth Scroll Transition (Transparent at Top, Solid White when Scrolled)
    window.handlePortalHeaderScroll = function() {
        const header = document.getElementById('mainPortalHeader');
        const mNav = document.getElementById('mobileNavMenu');
        const scrollPos = window.pageYOffset || document.documentElement.scrollTop || window.scrollY || (document.body ? document.body.scrollTop : 0) || 0;
        const isScrolled = scrollPos > 10;
        if (header) {
            header.classList.toggle('scrolled', isScrolled);
        }
        if (mNav) {
            mNav.classList.toggle('scrolled', isScrolled);
        }
    };

    window.addEventListener('scroll', window.handlePortalHeaderScroll, { passive: true });
    document.addEventListener('scroll', window.handlePortalHeaderScroll, { passive: true });
    window.handlePortalHeaderScroll();

    // Auto-detect page on initial load
    document.addEventListener('DOMContentLoaded', function() {
        window.handlePortalHeaderScroll();

        const path = window.location.pathname.toLowerCase();
        const hash = window.location.hash.toLowerCase();
        
        let pNum = {{ $curPage }};
        let sTab = '{{ $curSub }}';
        if (path.includes('agregat') || path.includes('ringkasan') || hash.includes('agregat')) {
            pNum = 2;
        } else if (path.includes('peta') || path.includes('spasial') || hash.includes('peta')) {
            pNum = 3;
        } else if (path.includes('desa-cantik') || hash.includes('desacantik')) {
            pNum = 4;
        } else if (path.includes('publikasi') || hash.includes('publikasi')) {
            pNum = 5;
            sTab = 'publikasi';
        } else if (path.includes('tentang') || hash.includes('tentang')) {
            pNum = 5;
            sTab = 'madani';
        }
        
        window.switchPortalPage(pNum, null, sTab);
        
        // Initialize 3D Book Stage Showcase
        if (typeof window.updateBpsStageBooks === 'function') {
            window.updateBpsStageBooks();
            window.startBpsStageAutoplay();
        }
    });
    </script>
</body>
</html>
