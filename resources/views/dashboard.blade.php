@php
    $curPage = (int) ($activePage ?? request('page', 1));
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
    
    <!-- Local Batangas Display Font -->
    <style>
        @font-face {
            font-family: 'Batangas';
            src: url('/fonts/batangas/Batangas-Bold.otf') format('opentype'),
                 url('/fonts/batangas/Batangas-Bold.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Batangas';
            src: url('/fonts/batangas/Batangas-Bold.otf') format('opentype'),
                 url('/fonts/batangas/Batangas-Bold.ttf') format('truetype');
            font-weight: 600;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Batangas';
            src: url('/fonts/batangas/Batangas-Bold.otf') format('opentype'),
                 url('/fonts/batangas/Batangas-Bold.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Batangas';
            src: url('/fonts/batangas/Batangas-Bold.otf') format('opentype'),
                 url('/fonts/batangas/Batangas-Bold.ttf') format('truetype');
            font-weight: 800;
            font-style: normal;
            font-display: swap;
        }
    </style>

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
    <script>
        window.KOLAKA_UTARA_GEOJSON = {!! file_get_contents(public_path('data/kolaka_utara_kecamatan.geojson')) !!};
        window.KOLUT_DESA_GEOJSON = {!! file_get_contents(public_path('data/kolut_desa_polygons.json')) !!};
    </script>
    <script src="/data/kolut_kecamatan_polygons.js"></script>
    <script src="/data/kolut_desa_polygons.js"></script>

    <!-- PODES 2025 DATABASE, DESA PRESISI ENGINE & PODES EXPLORER -->
    <script src="/data/podes_kolut_complete_2025.js?v=20261123_03"></script>
    <script src="/js/desa_presisi_engine.js?v=20261125_01"></script>
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

        /* Header Transparent to White Smooth Scroll Transition */
        #mainPortalHeader {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            width: 100% !important;
            z-index: 50 !important;
            background-color: transparent;
            border-bottom: 1px solid transparent;
            box-shadow: none;
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out, backdrop-filter 0.3s ease-in-out;
        }
        #mainPortalHeader.scrolled {
            background-color: #ffffff !important;
            backdrop-filter: blur(12px) !important;
            -webkit-backdrop-filter: blur(12px) !important;
            border-bottom: 1px solid #DCE3DD !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06) !important;
        }
        #mobileNavMenu {
            background-color: transparent;
            border-top-color: transparent;
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }
        #mobileNavMenu.scrolled {
            background-color: #ffffff !important;
            border-top: 1px solid #DCE3DD !important;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05) !important;
        }
        #headerSpacer {
            height: 68px;
            width: 100%;
            flex-shrink: 0;
        }
        @media (max-width: 767px) {
            #headerSpacer {
                height: 108px;
            }
        }

    </style>
</head>

<body class="bg-[#F8FAF8] text-slate-800 antialiased min-h-screen flex flex-col selection:bg-emerald-100 selection:text-emerald-900">

    <!-- TOP NAVIGATION BAR (IDENTIK & ELEGAN DENGAN DUA LOGO RESMI - FIXED TRANSPARAN DI ATAS, PUTIH SAAT SCROLL) -->
    <header id="mainPortalHeader" class="fixed top-0 left-0 right-0 z-50 text-slate-800 border-b min-h-[50px] flex flex-col justify-center w-full max-w-full">
        <div class="w-full px-4 lg:px-8 py-1.5 sm:py-2 flex items-center justify-between gap-4 max-w-[1720px] mx-auto">
            
            <!-- Sisi Kiri: Identitas Resmi Desa Madani & Logo Pemkab + BPS (Mengarahkan ke Login Admin) -->
            <div class="flex items-center gap-3 shrink-0">
                <a href="{{ Auth::check() ? url('/admin') : url('/login') }}" class="flex items-center gap-2.5 group text-left cursor-pointer focus:outline-none transition-transform hover:scale-[1.01] active:scale-[0.99]" title="{{ Auth::check() ? 'Buka Dashboard Admin (' . Auth::user()->name . ')' : 'Masuk ke Portal Login Administrator' }}">
                    <div class="flex items-center gap-2 shrink-0">
                        <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-7 w-auto object-contain">
                        <div class="h-4 w-[1px] bg-[#DCE3DD]"></div>
                        <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-6 w-auto object-contain">
                    </div>
                    <div class="text-base sm:text-lg font-bold text-[#1D241E] leading-none whitespace-nowrap font-cinzel tracking-[0.05em]">
                        DESA <span class="text-[#3B4D3B]">MADANI</span>
                        <span class="hidden sm:inline font-sans text-[11px] font-semibold text-[#5E6B61] ml-2 pl-2 border-l border-[#DCE3DD] tracking-[0.2em] uppercase">Kolaka Utara</span>
                        @if(Auth::check())
                            <span class="ml-2 px-1.5 py-0.5 rounded text-[10px] bg-emerald-100 text-emerald-800 font-sans font-bold border border-emerald-300">ADMIN</span>
                        @endif
                    </div>
                </a>
            </div>

            <!-- Sisi Kanan: Menu Navigasi Merapat ke Kanan + Bahasa -->
            <div class="flex items-center gap-5 sm:gap-6 lg:gap-8 shrink-0">
                <nav class="hidden md:flex items-center gap-5 sm:gap-6 lg:gap-8 text-xs font-bold text-slate-600 whitespace-nowrap shrink-0">
                    <a href="/portal" id="navLinkPage1" onclick="window.onNavClick(event, 1, '/portal')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative {{ $curPage === 1 ? 'active' : '' }}">
                        Beranda
                    </a>
                    <a href="/portal/agregat" id="navLinkPage2" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative {{ $curPage === 2 ? 'active' : '' }}">
                        Agregat 15 Kecamatan
                    </a>
                    <a href="/portal/peta" id="navLinkPage3" onclick="window.onNavClick(event, 3, '/portal/peta')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative {{ $curPage === 3 ? 'active' : '' }}">
                        Peta dan Analisis
                    </a>
                    <a href="/portal/desa-cantik" id="navLinkPage4" onclick="window.onNavClick(event, 4, '/portal/desa-cantik')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative {{ $curPage === 4 ? 'active' : '' }}">
                        Desa Cantik (DESCAN)
                    </a>
                    <!-- DROPDOWN MENU TENTANG (MADANI & PUBLIKASI) -->
                    <div class="relative group/tentang py-2" id="navDropdownTentangWrapper">
                        <button type="button" id="navLinkPage5" onclick="window.onNavClick(event, 5, '/portal/tentang', 'madani')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative flex items-center gap-1 cursor-pointer {{ $curPage === 5 ? 'active' : '' }}" title="Tentang Desa Madani & Publikasi">
                            <span>Tentang</span>
                            <svg class="w-3.5 h-3.5 text-slate-400 group-hover/tentang:text-[#3B4D3B] group-hover/tentang:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu on Hover & Click -->
                        <div class="absolute left-1/2 -translate-x-1/2 top-full pt-1 opacity-0 invisible group-hover/tentang:opacity-100 group-hover/tentang:visible transition-all duration-200 z-50 pointer-events-none group-hover/tentang:pointer-events-auto min-w-[270px]">
                            <div class="bg-white rounded-2xl shadow-xl border border-slate-200/90 p-2 space-y-1 backdrop-blur-md">
                                <!-- Dropdown 1: Madani -->
                                <a href="/portal/tentang" onclick="window.onNavClick(event, 5, '/portal/tentang', 'madani')" class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-emerald-50/80 transition-colors group/item cursor-pointer text-left">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-100/80 text-[#3B4D3B] flex items-center justify-center shrink-0 group-hover/item:bg-[#3B4D3B] group-hover/item:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    </div>
                                    <div>
                                        <div class="font-bold text-xs text-slate-800 group-hover/item:text-[#3B4D3B]">Madani</div>
                                        <div class="text-[10px] text-slate-500 font-medium">Seluk-beluk apa itu Desa Madani</div>
                                    </div>
                                </a>

                                <!-- Dropdown 2: Publikasi -->
                                <a href="/portal/publikasi" onclick="window.onNavClick(event, 5, '/portal/publikasi', 'publikasi')" class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-emerald-50/80 transition-colors group/item cursor-pointer text-left">
                                    <div class="w-8 h-8 rounded-lg bg-teal-100/80 text-teal-800 flex items-center justify-center shrink-0 group-hover/item:bg-teal-700 group-hover/item:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    </div>
                                    <div>
                                        <div class="font-bold text-xs text-slate-800 group-hover/item:text-teal-800">Publikasi</div>
                                        <div class="text-[10px] text-slate-500 font-medium">Buku & publikasi resmi BPS Kolut</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="flex items-center bg-white/80 rounded-full p-0.5 text-xs font-bold border border-[#DCE3DD] shrink-0 shadow-2xs">
                    <button type="button" id="btnLangID" onclick="window.setPortalLanguage('id')" class="px-2 py-0.5 rounded-full bg-[#3B4D3B] text-white shadow-2xs transition-all cursor-pointer font-bold text-[11px]">ID</button>
                    <button type="button" id="btnLangEN" onclick="window.setPortalLanguage('en')" class="px-2 py-0.5 rounded-full text-slate-600 hover:text-[#0b2545] transition-all cursor-pointer font-bold text-[11px]">EN</button>
                </div>
            </div>
        </div>

        <!-- Mobile Horizontal Scroll Menu -->
        <div id="mobileNavMenu" class="flex md:hidden overflow-x-auto px-4 py-2 gap-2 border-t no-scrollbar text-xs font-bold text-slate-600 w-full">
            <a href="/portal" onclick="window.onNavClick(event, 1, '/portal')" id="mNav1" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 1 ? 'bg-[#3B4D3B] text-white' : 'bg-white/80 border border-[#DCE3DD] hover:bg-slate-100' }}">Beranda</a>
            <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" id="mNav2" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 2 ? 'bg-[#3B4D3B] text-white' : 'bg-white/80 border border-[#DCE3DD] hover:bg-slate-100' }}">Agregat 15 Kec</a>
            <a href="/portal/peta" onclick="window.onNavClick(event, 3, '/portal/peta')" id="mNav3" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 3 ? 'bg-[#3B4D3B] text-white' : 'bg-white/80 border border-[#DCE3DD] hover:bg-slate-100' }}">Peta dan Analisis</a>
            <a href="/portal/desa-cantik" onclick="window.onNavClick(event, 4, '/portal/desa-cantik')" id="mNav4" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 4 ? 'bg-[#3B4D3B] text-white' : 'bg-white/80 border border-[#DCE3DD] hover:bg-slate-100' }}">Desa Cantik</a>
            <a href="/portal/tentang" onclick="window.onNavClick(event, 5, '/portal/tentang', 'madani')" id="mNav5" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 5 && $curSub === 'madani' ? 'bg-[#3B4D3B] text-white' : 'bg-white/80 border border-[#DCE3DD] hover:bg-slate-100' }}">Tentang Madani</a>
            <a href="/portal/publikasi" onclick="window.onNavClick(event, 5, '/portal/publikasi', 'publikasi')" id="mNav5Publikasi" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 5 && $curSub === 'publikasi' ? 'bg-[#3B4D3B] text-white' : 'bg-white/80 border border-[#DCE3DD] hover:bg-slate-100' }}">Publikasi BPS</a>
            <a href="/descan" class="whitespace-nowrap px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">⭐ DESCAN</a>
        </div>
    </header>

    <!-- Header Spacer to maintain exact page layout flow with fixed navbar -->
    <div id="headerSpacer" class="w-full shrink-0 h-[108px] md:h-[68px]"></div>
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

                                <!-- Pill 2: Navy Kapsul "Peta dan Analisis" (Menuju Halaman 3 Peta) -->
                                <a href="/portal/peta" onclick="window.onNavClick(event, 3, '/portal/peta')" class="px-6 sm:px-7 py-3 sm:py-3.5 rounded-full bg-[#1D241E] hover:bg-[#3B4D3B] text-white font-extrabold text-xs sm:text-sm shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2 cursor-pointer group">
                                    <svg class="w-4 h-4 text-emerald-400 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/></svg>
                                    <span>Peta dan Analisis</span>
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

            <!-- Strip 3 Koridor Wilayah Pembangunan (Regional Dispatches - Layered 3D Cards) -->
            <div class="max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 py-14">
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-[#3B4D3B] border border-emerald-200/70 text-xs font-black uppercase tracking-wider mb-2">Kewilayahan PODES 2025</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-1">3 Koridor Pembangunan Kolaka Utara</h2>
                    <p class="text-slate-600 text-xs sm:text-sm mt-1.5">Segmentasi strategis agregasi 15 kecamatan berdasarkan karakteristik agribisnis dan geografi.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10 items-stretch max-w-5xl mx-auto">
                    <!-- KORIDOR 01: UTARA -->
                    <div class="relative group">
                        <!-- Back Colored Plate -->
                        <div class="absolute inset-0 bg-[#3B4D3B] rounded-[28px] transform translate-x-3 translate-y-2.5 rotate-[1.8deg] shadow-lg shadow-[#3B4D3B]/20 transition-transform duration-300 group-hover:translate-x-3.5 group-hover:translate-y-3 group-hover:rotate-[2.2deg]"></div>

                        <!-- Front White Card -->
                        <div class="relative bg-white rounded-[28px] p-7 sm:p-8 shadow-sm flex flex-col items-center text-center justify-between h-full border border-slate-100/90 transition-all duration-300 group-hover:-translate-y-1">
                            <div>
                                <!-- Top Minimal Icon (Desktop Monitor) -->
                                <div class="w-12 h-12 flex items-center justify-center text-slate-700 mx-auto transition-all duration-300 group-hover:scale-110 group-hover:text-[#3B4D3B]">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>

                                <!-- Title -->
                                <h3 class="font-black text-base sm:text-lg text-slate-900 tracking-wider uppercase mt-4">
                                    KORIDOR I • UTARA
                                </h3>
                                <div class="text-[11px] font-bold text-[#3B4D3B] tracking-wider uppercase mt-0.5">
                                    Episentrum Industri &amp; Pesisir
                                </div>

                                <!-- Description -->
                                <p class="text-xs sm:text-[13px] text-slate-500 leading-relaxed font-normal mt-3 px-1">
                                    Sentra hilirisasi komoditas kakao, lada, nilam (1.440 IMK di Porehu) dan perikanan pesisir yang mencakup 38 desa di Tolala, Porehu, Batu Putih, dan Pakue Utara.
                                </p>
                            </div>

                            <!-- Bottom Circle Number -->
                            <div class="mt-8 pt-2">
                                <div class="w-14 h-14 rounded-full bg-[#3B4D3B] text-white flex items-center justify-center font-black text-xl shadow-md shadow-[#3B4D3B]/25 transition-transform duration-300 group-hover:scale-105 select-none">
                                    01
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KORIDOR 02: TENGAH -->
                    <div class="relative group">
                        <!-- Back Colored Plate -->
                        <div class="absolute inset-0 bg-[#285A48] rounded-[28px] transform translate-x-3 translate-y-2.5 rotate-[1.8deg] shadow-lg shadow-[#285A48]/20 transition-transform duration-300 group-hover:translate-x-3.5 group-hover:translate-y-3 group-hover:rotate-[2.2deg]"></div>

                        <!-- Front White Card -->
                        <div class="relative bg-white rounded-[28px] p-7 sm:p-8 shadow-sm flex flex-col items-center text-center justify-between h-full border border-slate-100/90 transition-all duration-300 group-hover:-translate-y-1">
                            <div>
                                <!-- Top Minimal Icon (Rocket Ship) -->
                                <div class="w-12 h-12 flex items-center justify-center text-slate-700 mx-auto transition-all duration-300 group-hover:scale-110 group-hover:text-[#285A48]">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.63 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7a3 3 0 11-4.243-4.243 3 3 0 014.243 4.243z"/>
                                    </svg>
                                </div>

                                <!-- Title -->
                                <h3 class="font-black text-base sm:text-lg text-slate-900 tracking-wider uppercase mt-4">
                                    KORIDOR II • TENGAH
                                </h3>
                                <div class="text-[11px] font-bold text-[#285A48] tracking-wider uppercase mt-0.5">
                                    Ibukota, Pendidikan &amp; Medis
                                </div>

                                <!-- Description -->
                                <p class="text-xs sm:text-[13px] text-slate-500 leading-relaxed font-normal mt-3 px-1">
                                    Pusat pemerintahan Pemkab, RSUD rujukan utama Kelas C, 3 kampus perguruan tinggi, dan 8.463 KK berlistrik PLN di 67 desa/kelurahan Lasusua dan sekitarnya.
                                </p>
                            </div>

                            <!-- Bottom Circle Number -->
                            <div class="mt-8 pt-2">
                                <div class="w-14 h-14 rounded-full bg-[#285A48] text-white flex items-center justify-center font-black text-xl shadow-md shadow-[#285A48]/25 transition-transform duration-300 group-hover:scale-105 select-none">
                                    02
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KORIDOR 03: SELATAN -->
                    <div class="relative group">
                        <!-- Back Colored Plate -->
                        <div class="absolute inset-0 bg-[#566B53] rounded-[28px] transform translate-x-3 translate-y-2.5 rotate-[1.8deg] shadow-lg shadow-[#566B53]/20 transition-transform duration-300 group-hover:translate-x-3.5 group-hover:translate-y-3 group-hover:rotate-[2.2deg]"></div>

                        <!-- Front White Card -->
                        <div class="relative bg-white rounded-[28px] p-7 sm:p-8 shadow-sm flex flex-col items-center text-center justify-between h-full border border-slate-100/90 transition-all duration-300 group-hover:-translate-y-1">
                            <div>
                                <!-- Top Minimal Icon (Bar Chart) -->
                                <div class="w-12 h-12 flex items-center justify-center text-slate-700 mx-auto transition-all duration-300 group-hover:scale-110 group-hover:text-[#566B53]">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                </div>

                                <!-- Title -->
                                <h3 class="font-black text-base sm:text-lg text-slate-900 tracking-wider uppercase mt-4">
                                    KORIDOR III • SELATAN
                                </h3>
                                <div class="text-[11px] font-bold text-[#566B53] tracking-wider uppercase mt-0.5">
                                    Pertanian Sawah &amp; Konservasi
                                </div>

                                <!-- Description -->
                                <p class="text-xs sm:text-[13px] text-slate-500 leading-relaxed font-normal mt-3 px-1">
                                    Lumbung ketahanan pangan padi sawah, perkebunan cengkeh produktif, 224 aparatur desa aktif, dan geowisata karst Danau Biru di 28 desa wilayah selatan.
                                </p>
                            </div>

                            <!-- Bottom Circle Number -->
                            <div class="mt-8 pt-2">
                                <div class="w-14 h-14 rounded-full bg-[#566B53] text-white flex items-center justify-center font-black text-xl shadow-md shadow-[#566B53]/25 transition-transform duration-300 group-hover:scale-105 select-none">
                                    03
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-14 text-center">
                    <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="inline-flex items-center gap-2.5 px-8 py-3.5 rounded-full bg-white hover:bg-emerald-50 text-[#3B4D3B] border border-emerald-300 font-bold text-sm shadow-xs hover:shadow-md transition-all cursor-pointer group">
                        <span>Lanjut ke Halaman 2: Agregat 15 Kecamatan &amp; Eksplorasi 133 Desa</span>
                        <svg class="w-4 h-4 text-[#3B4D3B] group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- HALAMAN 2: RINGKASAN & EKSPLORASI 133 DESA (TWO-STAGE EXPLORATION) -->
        <!-- ========================================================================= -->
        <section id="portalPage2" class="portal-page {{ $curPage === 2 ? 'active' : '' }} w-full pt-6 sm:pt-8 pb-12">
            <div class="max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
                
                <!-- 1. Header Halaman (Tetap Ringkas & Pemisah Halus #DCE3DD) -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-[#DCE3DD] pb-5">
                    <div>
                        <h2 class="font-batangas text-3xl sm:text-4xl lg:text-5xl font-bold text-[#1D241E] tracking-tight leading-tight">Jelajah & Eksplorasi 133 Desa</h2>
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
                <div id="podesStateDirectory" class="space-y-6 scroll-mt-24">
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
                <div id="podesStateDetail" class="space-y-6 scroll-mt-24" style="display: none;">
                    
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
                                <h4 class="font-batangas font-bold text-2xl sm:text-3xl text-[#1D241E]">Rincian Desa & Kelurahan Konstituen</h4>
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
                        <span>Halaman 3: Peta dan Analisis</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- HALAMAN 3: PETA TEMATIK INTERAKTIF (LEAFLET 15 KECAMATAN + 6 LAPISAN DATA)-->
        <!-- ========================================================================= -->
        <section id="portalPage3" class="portal-page {{ $curPage === 3 ? 'active' : '' }} w-full pt-6 sm:pt-8 pb-12">
            <div class="max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
                
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-[#DCE3DD] pb-5">
                    <div>
                        <h2 class="font-batangas text-3xl sm:text-4xl lg:text-5xl font-bold text-[#1D241E] tracking-tight leading-tight">Peta dan Analisis</h2>
                    </div>
                    <div class="flex items-center gap-2">
                        <span id="presisiScopeBadge" class="px-4 py-1.5 rounded-full bg-white text-[#3B4D3B] font-semibold text-xs border border-[#DCE3DD] shadow-2xs">
                            Kabupaten Kolaka Utara
                        </span>
                    </div>
                </div>

                <!-- Split Map & Inspection Layout (Equalized Heights & Flush Bottom Line) -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                    <div class="lg:col-span-8 flex flex-col h-full bg-white rounded-3xl p-4 sm:p-5 border border-slate-200/90 shadow-sm relative justify-between gap-3">
                        <div class="w-full flex-1 min-h-[500px] sm:min-h-[560px] rounded-2xl overflow-hidden relative">
                            <div id="mapPresisi" class="w-full h-full"></div>
                            
                            <div class="absolute top-4 left-4 z-[500] bg-white/95 backdrop-blur-md px-3.5 py-2 rounded-xl shadow-md border border-slate-200/80 text-xs">
                                <span class="text-slate-400 font-semibold text-[10px] block">LAPISAN AKTIF</span>
                                <span id="presisiMapMetricIndicator" class="font-extrabold text-slate-800">Sentra Industri Mikro Kecil (IMK)</span>
                            </div>

                            <div id="presisiMapLegend" class="absolute bottom-4 right-4 z-[500] bg-white/95 backdrop-blur-md p-3 rounded-xl shadow-md border border-slate-200/80 text-xs"></div>
                        </div>

                        <!-- Integrated Map Footer Console (Eliminates dead space, perfectly aligns bottom with right panel) -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 pt-1 text-xs">
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200/90 text-slate-700 text-[11px] font-semibold">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span>Wilayah: <strong id="mapFooterScopeText" class="text-slate-900">Kabupaten Kolaka Utara</strong></span>
                                </span>
                                <span id="mapFooterDesaBadge" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-emerald-50 text-emerald-800 text-[11px] font-bold border border-emerald-200/80 shadow-2xs">
                                    <i class="bi bi-geo-alt-fill text-emerald-600"></i>
                                    <span>15 Kecamatan • 133 Desa/Kelurahan</span>
                                </span>
                            </div>
                            <div class="flex items-center gap-1.5 shrink-0">
                                <button type="button" onclick="window.PresisiEngine.resetMapView()" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-[11px] transition flex items-center gap-1 cursor-pointer" title="Reset Tampilan Peta">
                                    <i class="bi bi-arrows-fullscreen"></i>
                                    <span>Reset Sudut</span>
                                </button>
                                <a href="#presisiAutomatedAnalysisSection" class="px-3.5 py-1.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-[11px] transition flex items-center gap-1 cursor-pointer shadow-2xs">
                                    <span>Analisis Bawah</span>
                                    <i class="bi bi-arrow-down-short text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col h-full justify-between bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/90 shadow-sm space-y-4">
                        <div class="space-y-4">
                            <div class="pb-3 border-b border-slate-100">
                                <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full uppercase tracking-wider">DETAIL KECAMATAN TERPILIH</span>
                                <h3 id="presisiAnalisisTitle" class="text-2xl font-black text-slate-900 mt-2">Kecamatan Lasusua</h3>
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

                            <div class="space-y-3 pt-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Daftar Desa / Kelurahan Konstituen</h4>
                                    </div>
                                    <span id="badgeJumlahDesaWilayah" class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200/80 shadow-2xs">12 Wilayah</span>
                                </div>

                                <!-- Instant Search Box -->
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    </span>
                                    <input type="text" id="presisiVillageSearchInput" oninput="window.PresisiEngine.onVillageSearch(this.value)" placeholder="Cari desa atau kelurahan..." class="w-full pl-10 pr-9 py-2 text-xs bg-slate-50/90 hover:bg-slate-100/80 focus:bg-white border border-slate-200/90 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all placeholder:text-slate-400 text-slate-800 shadow-2xs">
                                    <button type="button" id="presisiVillageSearchClear" onclick="window.PresisiEngine.clearVillageSearch()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-700 hidden cursor-pointer">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>

                                <!-- Sleek Interactive Cards Container -->
                                <div id="presisiQuickVillageList" class="flex-1 min-h-[220px] max-h-[360px] overflow-y-auto space-y-2 pr-1 text-xs scrollbar-thin scrollbar-thumb-slate-200"></div>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-slate-100 mt-2">
                            <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="w-full py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                                <span>Buka Tabel Lengkap Desa di Halaman 2</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ========================================================================= -->
                <!-- PUSAT ANALISIS & INTELIJEN WILAYAH (OTOMASI & GRAFIK INTERAKTIF DUA ARAH) -->
                <!-- ========================================================================= -->
                <div id="presisiAutomatedAnalysisSection" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-sm space-y-6">
                    <!-- Top Bar: Header, Scope Indicator, & Automation Controls -->
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-5 border-b border-slate-100">
                        <div>
                            <div class="flex items-center gap-2 flex-wrap mb-1.5">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-[11px] font-bold border border-emerald-200/80 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span>ANALISIS & INTELIJEN WILAYAH</span>
                                </span>
                                <span id="autoAnalysisActiveScopePill" class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 text-[11px] font-semibold border border-slate-200">
                                    Kecamatan Lasusua • Seluruh Desa
                                </span>
                                <span id="autoAnalysisDesaActivePill" class="hidden px-2.5 py-1 rounded-full bg-emerald-100/90 text-emerald-900 text-[11px] font-bold border border-emerald-300">
                                    Desa Terpilih
                                </span>
                            </div>
                            <h3 id="autoAnalysisSectionTitle" class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">
                                Visualisasi Komparasi & Analisis Sektoral
                            </h3>
                            <p id="autoAnalysisSectionSubtitle" class="text-xs sm:text-sm text-slate-500 mt-0.5">
                                Terhubung langsung dengan peta interaktif dan direktori desa untuk pemetaan potensi riil PODES 2025.
                            </p>
                        </div>

                        <!-- Action Buttons: Reset Scope & Automation Auto-Play -->
                        <div class="flex items-center gap-2 flex-wrap shrink-0">
                            <button type="button" 
                                    id="btnResetDesaScope" 
                                    onclick="window.PresisiEngine.resetDesaSelection()" 
                                    class="hidden px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1.5 cursor-pointer">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                <span>Tinjau Semua Desa</span>
                            </button>

                            <button type="button" 
                                    id="btnAutoPlayTour" 
                                    onclick="window.PresisiEngine.toggleAutoPlay()" 
                                    class="px-4 py-2 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-[#3B4D3B] border border-emerald-300 text-xs font-bold transition-all flex items-center gap-2 cursor-pointer shadow-2xs group">
                                <span class="w-2 h-2 rounded-full bg-emerald-600 group-hover:scale-125 transition-transform" id="btnAutoPlayDot"></span>
                                <span id="btnAutoPlayText">Putar Otomatis</span>
                                <i class="bi bi-play-circle-fill text-sm" id="btnAutoPlayIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Topic Selector Bar (Clean Titles - No "Tabel" Word!) -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-xs font-bold text-slate-500 uppercase tracking-wider">
                            <span class="flex items-center gap-1.5">
                                <i class="bi bi-sliders text-emerald-600"></i>
                                <span>Pilih Indikator Analisis:</span>
                            </span>
                            <span id="autoAnalysisCurrentTopicName" class="text-slate-800 font-extrabold normal-case">
                                Sentra Industri Mikro & Kecil (IMK)
                            </span>
                        </div>

                        <!-- Horizontal Scrollable Topic Chips (WITHOUT "Tabel" word) -->
                        <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-thin scrollbar-thumb-slate-200 text-xs">
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('imk')" id="topic-chip-imk" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-[#3B4D3B] text-white shadow-xs">
                                <i class="bi bi-buildings"></i>
                                <span>Industri Mikro & Kecil</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('listrik')" id="topic-chip-listrik" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-lightning-charge"></i>
                                <span>Elektrifikasi & Energi</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('pasar')" id="topic-chip-pasar" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-shop"></i>
                                <span>Sarana Perdagangan & Pasar</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('kesehatan')" id="topic-chip-kesehatan" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-heart-pulse"></i>
                                <span>Kesehatan & Posyandu</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('pendidikan')" id="topic-chip-pendidikan" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-mortarboard"></i>
                                <span>Sarana Pendidikan</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('komunikasi')" id="topic-chip-komunikasi" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-broadcast"></i>
                                <span>BTS & Sinyal Internet</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('keuangan')" id="topic-chip-keuangan" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-wallet2"></i>
                                <span>Kemandirian BUMDes</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('pemerintah')" id="topic-chip-pemerintah" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-people"></i>
                                <span>Aparatur Desa</span>
                            </button>
                        </div>
                    </div>

                    <!-- 4 Automated KPI Metric Cards (Adaptive for Village vs Kecamatan) -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                        <div class="bg-slate-50/90 rounded-2xl p-4 border border-slate-200/90 hover:border-emerald-300 transition-all shadow-2xs">
                            <span id="autoKpiLabel1" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Capaian Wilayah</span>
                            <div class="flex items-baseline gap-1.5 mt-1">
                                <span id="autoKpiVal1" class="text-2xl sm:text-3xl font-black text-slate-900 tabular-nums">0</span>
                                <span id="autoKpiUnit1" class="text-xs font-semibold text-slate-500">Unit</span>
                            </div>
                            <span id="autoKpiSub1" class="text-[11px] text-emerald-800 font-medium mt-0.5 block truncate">-</span>
                        </div>

                        <div class="bg-slate-50/90 rounded-2xl p-4 border border-slate-200/90 hover:border-emerald-300 transition-all shadow-2xs">
                            <span id="autoKpiLabel2" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Rata-Rata Wilayah</span>
                            <div class="flex items-baseline gap-1.5 mt-1">
                                <span id="autoKpiVal2" class="text-2xl sm:text-3xl font-black text-slate-900 tabular-nums">0</span>
                                <span id="autoKpiUnit2" class="text-xs font-semibold text-slate-500">Unit/Desa</span>
                            </div>
                            <span id="autoKpiSub2" class="text-[11px] text-slate-500 font-medium mt-0.5 block truncate">-</span>
                        </div>

                        <div class="bg-slate-50/90 rounded-2xl p-4 border border-slate-200/90 hover:border-emerald-300 transition-all shadow-2xs">
                            <span id="autoKpiLabel3" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Peringkat & Posisi</span>
                            <div class="flex items-baseline gap-1.5 mt-1">
                                <span id="autoKpiVal3" class="text-2xl sm:text-3xl font-black text-emerald-700 tabular-nums">-</span>
                                <span id="autoKpiUnit3" class="text-xs font-semibold text-slate-500">-</span>
                            </div>
                            <span id="autoKpiSub3" class="text-[11px] text-emerald-700 font-bold mt-0.5 block truncate">-</span>
                        </div>

                        <div class="bg-slate-50/90 rounded-2xl p-4 border border-slate-200/90 hover:border-emerald-300 transition-all shadow-2xs">
                            <span id="autoKpiLabel4" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Evaluasi Relatif</span>
                            <div class="flex items-baseline gap-1.5 mt-1">
                                <span id="autoKpiVal4" class="text-2xl sm:text-3xl font-black text-amber-600 tabular-nums">-</span>
                                <span id="autoKpiUnit4" class="text-xs font-semibold text-slate-500">-</span>
                            </div>
                            <span id="autoKpiSub4" class="text-[11px] text-slate-600 font-medium mt-0.5 block truncate">-</span>
                        </div>
                    </div>

                    <!-- Visual Charts & Narrative Analysis Grid (8 : 4 Grid) -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                        <!-- Left Chart: Comparative Bar Chart (8 Cols) -->
                        <div class="lg:col-span-8 bg-slate-50/60 rounded-2xl p-5 border border-slate-200/90 flex flex-col justify-between">
                            <div class="flex items-center justify-between pb-3 border-b border-slate-200/70 mb-3 flex-wrap gap-2">
                                <div>
                                    <h4 id="autoChartBarTitle" class="text-sm font-extrabold text-slate-800">
                                        Perbandingan Capaian Antar-Desa
                                    </h4>
                                    <p class="text-[11px] text-slate-500">
                                        Klik batang grafik untuk langsung memilih desa di peta & direktori
                                    </p>
                                </div>
                                <span id="autoChartBarBadge" class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-900 border border-emerald-300">
                                    INTERAKTIF DUA ARAH
                                </span>
                            </div>

                            <div class="relative w-full h-[320px] sm:h-[350px]">
                                <canvas id="autoAnalysisBarCanvas"></canvas>
                            </div>

                            <div class="flex items-center justify-between pt-3 border-t border-slate-200/70 text-[11px] text-slate-500">
                                <div class="flex items-center gap-3">
                                    <span class="flex items-center gap-1.5">
                                        <span class="w-3 h-3 rounded-md bg-[#3B4D3B]"></span>
                                        <span>Desa Terpilih</span>
                                    </span>
                                    <span class="flex items-center gap-1.5">
                                        <span class="w-3 h-3 rounded-md bg-emerald-200"></span>
                                        <span>Desa Lainnya</span>
                                    </span>
                                </div>
                                <span id="autoChartFootnote" class="italic">Sumber: Data PODES BPS Kolaka Utara 2025</span>
                            </div>
                        </div>

                        <!-- Right Chart & Executive Narrative (4 Cols) -->
                        <div class="lg:col-span-4 flex flex-col gap-4">
                            <!-- Donut Chart: Proportion / Share -->
                            <div class="bg-slate-50/60 rounded-2xl p-5 border border-slate-200/90 flex-1 flex flex-col justify-between">
                                <div class="flex items-center justify-between pb-2 border-b border-slate-200/70 mb-2">
                                    <h4 id="autoChartDonutTitle" class="text-sm font-extrabold text-slate-800">
                                        Porsi Kontribusi Wilayah
                                    </h4>
                                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-slate-200/80 text-slate-700">PROPORSI</span>
                                </div>
                                <div class="relative w-full h-[180px] flex items-center justify-center">
                                    <canvas id="autoAnalysisDonutCanvas"></canvas>
                                </div>
                                <div id="autoChartDonutLegend" class="text-[11px] text-slate-600 space-y-1 pt-2 border-t border-slate-200/70"></div>
                            </div>

                            <!-- Executive AI-Style Automated Insight Narrative Box -->
                            <div class="bg-emerald-50/70 rounded-2xl p-5 border border-emerald-200/90 relative overflow-hidden">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-6 h-6 rounded-lg bg-emerald-600 text-white flex items-center justify-center text-xs shadow-xs">
                                        <i class="bi bi-lightbulb-fill"></i>
                                    </div>
                                    <h5 class="text-xs font-black text-emerald-950 uppercase tracking-wider">
                                        Insight Analisis Otomatis
                                    </h5>
                                </div>
                                <div id="autoAnalysisNarrativeText" class="text-xs text-emerald-900 leading-relaxed font-normal">
                                    Memuat analisis cerdas untuk wilayah terpilih...
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Selected Village Mini Detail Bar (Only shown when a specific village is selected) -->
                    <div id="autoAnalysisDesaDetailBar" class="hidden p-4 rounded-2xl bg-gradient-to-r from-emerald-50 via-teal-50 to-slate-50 border border-emerald-200/80 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-[#3B4D3B] text-white flex items-center justify-center text-lg shrink-0 shadow-xs">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <span id="autoDesaBarName" class="font-black text-sm text-slate-900">Desa Watumotaha</span>
                                    <span id="autoDesaBarStatus" class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-200 text-emerald-900">DESA</span>
                                </div>
                                <div class="text-[11px] text-slate-500 mt-0.5 flex items-center gap-2 flex-wrap">
                                    <span id="autoDesaBarPop">350 Jiwa</span>
                                    <span>•</span>
                                    <span id="autoDesaBarKomoditas">Kakao</span>
                                    <span>•</span>
                                    <span id="autoDesaBarKades">Kepala Desa Aktif</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="window.PresisiEngine.zoomToSelectedVillage()" class="px-3 py-1.5 rounded-xl bg-white hover:bg-slate-100 text-slate-700 font-bold border border-slate-200 transition shadow-2xs flex items-center gap-1.5 cursor-pointer">
                                <i class="bi bi-crosshair"></i>
                                <span>Fokus di Peta</span>
                            </button>
                            <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="px-3.5 py-1.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold transition shadow-2xs flex items-center gap-1.5 cursor-pointer">
                                <span>Lihat Seluruh Tabel</span>
                                <i class="bi bi-arrow-right"></i>
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
                        <span>Halaman 3: Peta dan Analisis</span>
                    </a>
                    <a href="/portal/tentang" onclick="window.onNavClick(event, 5, '/portal/tentang')" class="px-6 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-xs sm:text-sm shadow-sm transition-all flex items-center gap-2 cursor-pointer">
                        <span>Halaman 5: Tentang Madani</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- HALAMAN 5: TENTANG DESA MADANI & KATALOG PUBLIKASI BPS RESMI              -->
        <!-- ========================================================================= -->
        <section id="portalPage5" class="portal-page {{ $curPage === 5 ? 'active' : '' }} w-full py-6 sm:py-8">
            <div class="w-full px-2 sm:px-6 lg:px-10 space-y-6">
                
                <!-- Indikator Halaman Aktif: Sudut Kiri Atas (Tentang Desa Madani) -->
                <div class="flex items-center justify-start w-full">
                    <div id="subPillMadani" class="{{ $curSub === 'madani' ? '' : 'hidden' }} inline-flex items-center gap-2.5 px-5 py-2.5 mb-2 rounded-2xl bg-[#3B4D3B] text-white text-xs sm:text-sm font-black shadow-xs border border-emerald-900/20 shrink-0">
                        <i class="bi bi-bank2 text-base"></i>
                        <span>Tentang Desa Madani</span>
                    </div>
                </div>

                <!-- ===================================================================== -->
                <!-- SUB-VIEW 1: TENTANG MADANI (SELUK-BELUK APA ITU DESA MADANI)           -->
                <!-- ===================================================================== -->
                <div id="subViewMadani" class="w-full max-w-[1920px] mx-auto {{ $curSub === 'madani' ? '' : 'hidden' }} space-y-8 sm:space-y-10 animate-in fade-in duration-300">
                    
                    <!-- ===================================================================== -->
                    <!-- 1. HERO BANNER: SELUK BELUK DESA MADANI (ESTETIK & ELEGAN PINE GREEN)  -->
                    <!-- ===================================================================== -->
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#173824] via-[#204a32] to-[#142e1f] text-white p-6 sm:p-10 lg:p-12 shadow-lg border border-emerald-500/20 w-full">
                        <!-- Decorative Subtle Radial Ambient Glow -->
                        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-96 bg-emerald-400/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="absolute -bottom-24 left-1/4 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="absolute top-0 right-0 w-full h-full opacity-5 pointer-events-none" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 24px 24px;"></div>

                        <div class="relative z-10 max-w-5xl mx-auto text-center flex flex-col items-center">
                            <div class="inline-flex items-center justify-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-emerald-200 text-xs font-black tracking-widest uppercase mb-4 shadow-xs mx-auto">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>PROFIL &amp; FONDASI SATU DATA DESA</span>
                            </div>
                            
                            <h2 class="text-3xl sm:text-5xl font-black tracking-tight text-white leading-tight text-center">
                                Seluk-Beluk Apa Itu <span class="text-emerald-300">Desa Madani</span>
                            </h2>
                            
                            <p class="text-emerald-100/90 text-xs sm:text-sm md:text-base mt-3 leading-relaxed font-normal text-center max-w-3xl mx-auto">
                                Mengenal filosofi, arsitektur data, dan komitmen strategis transformasi digital <strong>127 Desa &amp; 6 Kelurahan di 15 Kecamatan</strong> Kabupaten Kolaka Utara menuju kemandirian berbasis data presisi (<em>by name, by address, by coordinate</em>).
                            </p>

                            <!-- Key Metric Stats Strip (Palet Harmonis Bersih Tanpa Warna Pelangi) -->
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 mt-8 pt-6 border-t border-white/15 w-full max-w-4xl mx-auto">
                                <div class="bg-white/10 backdrop-blur-xs rounded-2xl p-4 border border-white/10 text-center flex flex-col items-center justify-center transition-all hover:bg-white/15">
                                    <div class="text-2xl sm:text-3xl font-black text-white text-center">133</div>
                                    <div class="text-[11px] font-bold text-emerald-200 uppercase tracking-wider mt-1 text-center">Desa &amp; Kelurahan</div>
                                </div>
                                <div class="bg-white/10 backdrop-blur-xs rounded-2xl p-4 border border-white/10 text-center flex flex-col items-center justify-center transition-all hover:bg-white/15">
                                    <div class="text-2xl sm:text-3xl font-black text-white text-center">15</div>
                                    <div class="text-[11px] font-bold text-emerald-200 uppercase tracking-wider mt-1 text-center">Kecamatan Kolut</div>
                                </div>
                                <div class="bg-white/10 backdrop-blur-xs rounded-2xl p-4 border border-white/10 text-center flex flex-col items-center justify-center transition-all hover:bg-white/15">
                                    <div class="text-2xl sm:text-3xl font-black text-white text-center">100%</div>
                                    <div class="text-[11px] font-bold text-emerald-200 uppercase tracking-wider mt-1 text-center">Satu Data SDI</div>
                                </div>
                                <div class="bg-white/10 backdrop-blur-xs rounded-2xl p-4 border border-white/10 text-center flex flex-col items-center justify-center transition-all hover:bg-white/15">
                                    <div class="text-2xl sm:text-3xl font-black text-white text-center">PODES</div>
                                    <div class="text-[11px] font-bold text-emerald-200 uppercase tracking-wider mt-1 text-center">Sensus BPS 2025</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- ===================================================================== -->
                    <!-- 2. MAKNA & AKRONIM DESA M-A-D-A-N-I (DESAIN ELEGAN PINE & SLATE)       -->
                    <!-- ===================================================================== -->
                    <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/90 shadow-2xs space-y-6 w-full">
                        <div class="max-w-3xl">
                            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-50 text-[#3B4D3B] text-xs font-black uppercase tracking-wider mb-2 border border-emerald-200/80">
                                <i class="bi bi-lightbulb-fill text-xs"></i>
                                <span>Filosofi Nama &amp; Singkatan</span>
                            </div>
                            <h3 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                                Apa Arti dan Kepanjangan <span class="text-[#3B4D3B]">"MADANI"</span>?
                            </h3>
                            <p class="text-slate-600 text-xs sm:text-sm mt-1.5 leading-relaxed">
                                <strong>Desa Madani</strong> bukan sekadar portal statistik, melainkan akronim dari 6 pilar gerakan perubahan tata kelola desa di Kabupaten Kolaka Utara:
                            </p>
                        </div>

                        <!-- 6 Huruf MADANI Grid (Palet Terpadu Pine & White) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                            <!-- M: Maju -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            M
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-cpu-fill text-xs"></i>
                                            <span>Pilar 1</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Maju (Modern Governance)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Pemanfaatan teknologi sistem informasi desa (SID) dan WebGIS untuk memodernisasi pelayanan administrasi warga secara cepat dan transparan.
                                    </p>
                                </div>
                            </div>

                            <!-- A: Akuntabel -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            A
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-shield-check text-xs"></i>
                                            <span>Pilar 2</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Akuntabel (Transparency)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Pengelolaan anggaran APBDes dan alokasi bantuan sosial yang dapat dipertanggungjawabkan kepada masyarakat melalui infografis terbuka.
                                    </p>
                                </div>
                            </div>

                            <!-- D: Data-Driven -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            D
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-database-fill text-xs"></i>
                                            <span>Pilar 3</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Data-Driven (Statistik Riil)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Setiap musrenbangdes dan keputusan pembangunan berlandaskan data survei &amp; sensus riil PODES BPS, bukan berdasarkan perkiraan semata.
                                    </p>
                                </div>
                            </div>

                            <!-- A: Amanah -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            A
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-patch-check-fill text-xs"></i>
                                            <span>Pilar 4</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Amanah (Integrity &amp; Trust)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Menjunjung tinggi kepercayaan warga desa dengan pelayanan publik aparatur yang jujur, inklusif, dan bebas dari diskriminasi.
                                    </p>
                                </div>
                            </div>

                            <!-- N: Nyata -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            N
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-bullseye text-xs"></i>
                                            <span>Pilar 5</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Nyata (Impactful Results)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Dampak program dapat dirasakan langsung oleh masyarakat dalam pengentasan kemiskinan, penurunan stunting, dan peningkatan ekonomi kakao.
                                    </p>
                                </div>
                            </div>

                            <!-- I: Integrasi -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            I
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-diagram-3-fill text-xs"></i>
                                            <span>Pilar 6</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Integrasi (Satu Data SDI)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Keterpaduan antar-instansi: data desa terhubung langsung dengan Satu Data Indonesia BPS, Bappeda, dan DPMD Kolaka Utara.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- ===================================================================== -->
                    <!-- 3. VISI, MISI & 4 AGENDA TRANSFORMASI (LAYOUT SPLIT ELEGAN)           -->
                    <!-- ===================================================================== -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 items-stretch w-full">
                        
                        <!-- Kolom Kiri: Visi Resmi Desa Madani (40%) -->
                        <div class="lg:col-span-5 bg-gradient-to-br from-[#173824] via-[#204a32] to-[#142e1f] rounded-3xl p-6 sm:p-8 text-white flex flex-col justify-between shadow-sm relative overflow-hidden border border-emerald-500/20">
                            <!-- Background Subtle Watermark Quote -->
                            <i class="bi bi-quote text-8xl text-white/5 absolute -bottom-3 -right-2 pointer-events-none select-none"></i>
                            
                            <div class="relative z-10">
                                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-black uppercase tracking-wider border border-emerald-400/30 mb-4">
                                    <i class="bi bi-compass-fill text-xs text-amber-300"></i>
                                    <span>Visi Besar 2025–2030</span>
                                </div>
                                
                                <h3 class="text-xl sm:text-2xl font-black leading-snug tracking-tight text-white">
                                    "Terwujudnya Tata Kelola Desa Mandiri, Berdaulat Data, dan Berdaya Saing Melalui Ekosistem Statistik Presisi Kabupaten Kolaka Utara."
                                </h3>

                                <div class="my-6 h-px bg-gradient-to-r from-emerald-400/40 via-emerald-200/20 to-transparent"></div>

                                <p class="text-emerald-100/90 text-xs sm:text-sm leading-relaxed">
                                    Memastikan tidak ada lagi desa di Kolaka Utara yang tertinggal dalam perencanaan pembangunan karena ketiadaan data riil atau ketidaktepatan sasaran bantuan sosial.
                                </p>
                            </div>

                            <div class="pt-6 border-t border-white/10 flex items-center justify-between text-xs text-emerald-200/90 relative z-10">
                                <span>Kolaborasi BPS &amp; Pemkab</span>
                                <span class="font-extrabold text-emerald-300">#DesaMadani2025</span>
                            </div>
                        </div>

                        <!-- Kolom Kanan: 4 Agenda Utama Transformasi (60%) -->
                        <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-2xs flex flex-col justify-between space-y-6">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#3B4D3B] inline-block"></span>
                                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Arah Kebijakan</span>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">4 Agenda Utama Transformasi Desa</h3>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- Agenda 1 -->
                                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 hover:border-[#3B4D3B] hover:bg-emerald-50/20 transition-all flex flex-col justify-between">
                                    <div>
                                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#3B4D3B] font-black text-xs flex items-center justify-center mb-2.5">
                                            01
                                        </div>
                                        <h4 class="font-extrabold text-sm text-slate-900">Digitalisasi SID &amp; Monografi</h4>
                                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                            Modernisasi basis data profil desa dari buku register manual ke sistem basis data digital terverifikasi.
                                        </p>
                                    </div>
                                </div>

                                <!-- Agenda 2 -->
                                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 hover:border-[#3B4D3B] hover:bg-emerald-50/20 transition-all flex flex-col justify-between">
                                    <div>
                                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#3B4D3B] font-black text-xs flex items-center justify-center mb-2.5">
                                            02
                                        </div>
                                        <h4 class="font-extrabold text-sm text-slate-900">Transparansi &amp; Akuntabilitas APBDes</h4>
                                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                            Penyajian visual alokasi dana desa dan realisasi proyek infrastruktur secara terbuka kepada seluruh warga.
                                        </p>
                                    </div>
                                </div>

                                <!-- Agenda 3 -->
                                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 hover:border-[#3B4D3B] hover:bg-emerald-50/20 transition-all flex flex-col justify-between">
                                    <div>
                                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#3B4D3B] font-black text-xs flex items-center justify-center mb-2.5">
                                            03
                                        </div>
                                        <h4 class="font-extrabold text-sm text-slate-900">Peningkatan Kapasitas SDM Aparat</h4>
                                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                            Pelatihan Agen Statistik Desa (DESCAN) dalam pengumpulan, pengolahan, dan analisis data sektoral.
                                        </p>
                                    </div>
                                </div>

                                <!-- Agenda 4 -->
                                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 hover:border-[#3B4D3B] hover:bg-emerald-50/20 transition-all flex flex-col justify-between">
                                    <div>
                                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#3B4D3B] font-black text-xs flex items-center justify-center mb-2.5">
                                            04
                                        </div>
                                        <h4 class="font-extrabold text-sm text-slate-900">Interoperabilitas Satu Data (SDI)</h4>
                                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                            Konektivitas format data lintas OPD kabupaten, provinsi, hingga pusat tanpa tumpang tindih data.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- ===================================================================== -->
                    <!-- 4. 4 PILAR KOLABORASI STRATEGIS & CALL TO ACTION                      -->
                    <!-- ===================================================================== -->
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#173824] via-[#204a32] to-[#142e1f] p-6 sm:p-10 text-white shadow-lg border border-emerald-500/20 w-full">
                        <div class="relative z-10 space-y-6">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-white/15">
                                <div>
                                    <span class="px-3.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-black uppercase tracking-wider border border-emerald-400/30 inline-flex items-center gap-1.5">
                                        <i class="bi bi-people-fill text-xs"></i>
                                        <span>Kemitraan Multipihak</span>
                                    </span>
                                    <h3 class="text-2xl sm:text-3xl font-black tracking-tight mt-2 text-white">
                                        Sinergi Kolaborasi Penyelenggara Desa Madani
                                    </h3>
                                    <p class="text-emerald-100/90 text-xs sm:text-sm mt-1 max-w-2xl leading-relaxed">
                                        Keberhasilan ekosistem Desa Madani ditopang oleh 4 pilar lembaga strategis di Kabupaten Kolaka Utara:
                                    </p>
                                </div>
                            </div>

                            <!-- 4 Pilar Lembaga Grid (Bootstrap Icons & Glassmorphism) -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                                <!-- Pilar 1: BPS Kolut -->
                                <div class="bg-white/10 backdrop-blur-xs p-5 rounded-2xl border border-white/15 hover:bg-white/15 transition-all">
                                    <div class="w-10 h-10 rounded-xl bg-white/10 text-emerald-300 font-black text-lg flex items-center justify-center mb-3 shadow-xs">
                                        <i class="bi bi-bar-chart-line-fill text-lg"></i>
                                    </div>
                                    <h4 class="font-extrabold text-sm text-white">BPS Kab. Kolaka Utara</h4>
                                    <p class="text-[11px] text-emerald-100/80 mt-1 leading-relaxed">
                                        Pembina data statistik sektoral, penyedia metodologi sensus, serta penjamin kualitas metadata Satu Data.
                                    </p>
                                </div>

                                <!-- Pilar 2: Pemkab Kolut -->
                                <div class="bg-white/10 backdrop-blur-xs p-5 rounded-2xl border border-white/15 hover:bg-white/15 transition-all">
                                    <div class="w-10 h-10 rounded-xl bg-white/10 text-emerald-300 font-black text-lg flex items-center justify-center mb-3 shadow-xs">
                                        <i class="bi bi-bank2 text-lg"></i>
                                    </div>
                                    <h4 class="font-extrabold text-sm text-white">Pemerintah Kabupaten</h4>
                                    <p class="text-[11px] text-emerald-100/80 mt-1 leading-relaxed">
                                        Regulator kebijakan daerah dan pengarah integrasi Satu Data Kolaka Utara lintas instansi &amp; OPD.
                                    </p>
                                </div>

                                <!-- Pilar 3: DPMD Kolut -->
                                <div class="bg-white/10 backdrop-blur-xs p-5 rounded-2xl border border-white/15 hover:bg-white/15 transition-all">
                                    <div class="w-10 h-10 rounded-xl bg-white/10 text-emerald-300 font-black text-lg flex items-center justify-center mb-3 shadow-xs">
                                        <i class="bi bi-diagram-3-fill text-lg"></i>
                                    </div>
                                    <h4 class="font-extrabold text-sm text-white">Dinas PMD Kolaka Utara</h4>
                                    <p class="text-[11px] text-emerald-100/80 mt-1 leading-relaxed">
                                        Pendamping teknis tata kelola aparatur desa, adopsi SID, dan implementasi SISKEUDES berbasis data.
                                    </p>
                                </div>

                                <!-- Pilar 4: 133 Desa & Kelurahan -->
                                <div class="bg-white/10 backdrop-blur-xs p-5 rounded-2xl border border-white/15 hover:bg-white/15 transition-all">
                                    <div class="w-10 h-10 rounded-xl bg-white/10 text-emerald-300 font-black text-lg flex items-center justify-center mb-3 shadow-xs">
                                        <i class="bi bi-houses-fill text-lg"></i>
                                    </div>
                                    <h4 class="font-extrabold text-sm text-white">133 Desa &amp; Kelurahan</h4>
                                    <p class="text-[11px] text-emerald-100/80 mt-1 leading-relaxed">
                                        Produsen data di garis terdepan melalui Agen Statistik Desa (DESCAN) dan perangkat desa yang berdaya.
                                    </p>
                                </div>
                            </div>

                            <!-- Action Quick Buttons -->
                            <div class="pt-2 flex flex-wrap items-center gap-3">
                                <a href="/portal/desa-cantik" onclick="window.onNavClick(event, 4, '/portal/desa-cantik')" class="px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold text-xs sm:text-sm transition-all flex items-center gap-2 cursor-pointer">
                                    <i class="bi bi-stars text-amber-300"></i>
                                    <span>Lihat 6 Desa Cantik Percontohan</span>
                                </a>
                                <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="px-5 py-2.5 rounded-xl bg-emerald-800/80 hover:bg-emerald-800 text-white border border-emerald-400/30 font-bold text-xs sm:text-sm transition-all flex items-center gap-2 cursor-pointer">
                                    <i class="bi bi-bar-chart-fill text-emerald-300"></i>
                                    <span>Data Agregat 15 Kecamatan</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ===================================================================== -->
                <div id="subViewPublikasi" class="w-full max-w-[1920px] mx-auto {{ $curSub === 'publikasi' ? '' : 'hidden' }} space-y-6 animate-in fade-in duration-200">
                    
                    <!-- Header Kontrol Publikasi: Sudut Kiri Atas (Publikasi & Buku BPS) & Sudut Kanan Atas (3 Menu Kontrol) -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-4 border-b border-slate-100 relative z-30 w-full">
                        
                        <!-- Sudut Kiri Atas: Indikator / Badge Publikasi & Buku BPS -->
                        <div id="subPillPublikasi" class="{{ $curSub === 'publikasi' ? '' : 'hidden' }} inline-flex items-center gap-2.5 px-5 py-2.5 rounded-2xl bg-[#3B4D3B] text-white text-xs sm:text-sm font-black shadow-xs border border-emerald-900/20 shrink-0">
                            <i class="bi bi-journal-bookmark-fill text-base"></i>
                            <span>Publikasi &amp; Buku BPS</span>
                        </div>

                        <!-- Sudut Kanan Atas: 3 Menu Kontrol (Filter, Model Grid, Panggung 3D) -->
                        <div class="flex flex-wrap items-center justify-start sm:justify-end gap-2.5 w-full sm:w-auto">
                            
                            <!-- Kontrol 1: Filter Dropdown -->
                            <div class="relative inline-block text-left" id="bpsFilterDropdownWrapper">
                                <button type="button" id="btnBpsFilterDropdown" onclick="window.toggleBpsFilterDropdown(event)" class="px-4 py-2.5 rounded-2xl bg-white hover:bg-slate-50 text-slate-800 border border-slate-300 font-bold text-xs sm:text-sm shadow-xs transition-all flex items-center gap-2 cursor-pointer hover:border-emerald-500">
                                    <i class="bi bi-funnel-fill text-[#3B4D3B]"></i>
                                    <span id="labelActiveFilter">Filter: Semua Publikasi</span>
                                    <i class="bi bi-chevron-down text-slate-400 text-xs transition-transform duration-200" id="iconFilterDropdownArrow"></i>
                                </button>

                                <!-- Dropdown Menu Popover -->
                                <div id="menuBpsFilterDropdown" class="hidden absolute right-0 top-full mt-2 w-72 sm:w-80 bg-white rounded-2xl shadow-xl border border-slate-200 p-2 z-50 text-left">
                                    <div class="text-[10px] font-black uppercase tracking-wider text-slate-400 px-3 py-1.5 border-b border-slate-100 flex items-center justify-between">
                                        <span>Kategori Publikasi &amp; Data</span>
                                        <span>PILIH</span>
                                    </div>
                                    <div class="max-h-64 overflow-y-auto space-y-1 py-1.5 text-xs">
                                        <button type="button" onclick="window.applyBpsFilter('all', 'Semua Publikasi (12)')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-800">
                                            <span class="flex items-center gap-2"><i class="bi bi-collection-fill text-emerald-700"></i> Semua Publikasi (12 Koleksi)</span>
                                            <span class="text-[10px] bg-slate-100 px-2 py-0.5 rounded-full font-mono">12</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('kuda', 'Buku Tahunan Pokok (KDA)')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-bar-chart-line-fill text-emerald-700"></i> Buku Tahunan Pokok (KDA)</span>
                                            <span class="text-[10px] bg-emerald-50 text-emerald-800 px-2 py-0.5 rounded-full font-mono">486 Hal</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('statda', 'Analisis Makro & PDRB')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-graph-up-arrow text-blue-700"></i> Analisis Makro &amp; PDRB</span>
                                            <span class="text-[10px] bg-blue-50 text-blue-800 px-2 py-0.5 rounded-full font-mono">2 Buku</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('podes', 'Potensi Desa (PODES)')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-buildings-fill text-amber-700"></i> Potensi Desa (PODES 2025)</span>
                                            <span class="text-[10px] bg-amber-50 text-amber-900 px-2 py-0.5 rounded-full font-mono">133 Desa</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('kesra', 'Sosial & Kesejahteraan')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-people-fill text-rose-700"></i> Kesejahteraan &amp; Naker</span>
                                            <span class="text-[10px] bg-rose-50 text-rose-800 px-2 py-0.5 rounded-full font-mono">2 Buku</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('descan', 'Pedoman Desa Cantik')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-patch-check-fill text-teal-700"></i> Pedoman Desa Cantik (SDI)</span>
                                            <span class="text-[10px] bg-teal-50 text-teal-800 px-2 py-0.5 rounded-full font-mono">Resmi</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('kda-kec', 'Seri 15 Kecamatan')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-geo-alt-fill text-purple-700"></i> Seri Kecamatan Dalam Angka</span>
                                            <span class="text-[10px] bg-purple-50 text-purple-800 px-2 py-0.5 rounded-full font-mono">Wilayah</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Kontrol 2 & 3: Model Grid & Panggung 3D Toggle -->
                            <div class="flex items-center p-1 bg-slate-100 rounded-2xl border border-slate-200 shadow-2xs">
                                <button type="button" id="btnViewModeGrid" onclick="window.toggleBpsViewMode('grid')" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition-all text-slate-600 hover:text-slate-900 cursor-pointer flex items-center gap-1.5" title="Tampilkan Mode Katalog Buku">
                                    <i class="bi bi-grid-3x3-gap-fill text-sm"></i>
                                    <span>Model Grid</span>
                                </button>
                                <button type="button" id="btnViewMode3D" onclick="window.toggleBpsViewMode('3d')" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-black transition-all bg-[#3B4D3B] text-white shadow-xs cursor-pointer flex items-center gap-1.5" title="Tampilkan Mode Panggung 3D">
                                    <i class="bi bi-badge-3d-fill text-sm"></i>
                                    <span>Panggung 3D</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <div id="bpsCatalogueGridSection" class="space-y-6 hidden">
                        
                        <!-- Canvas Utama Katalog Buku -->
                        <div class="bps-catalog-canvas">
                            
                            <!-- Header Banner Publikasi Buku -->
                            <div class="relative z-10 text-center pt-2 pb-6">
                                <h2 class="text-3xl sm:text-5xl font-black text-slate-900 tracking-tight font-serif uppercase inline-block">
                                    PUBLIKASI BUKU
                                </h2>
                            </div>

                            <!-- 4 Baris Buku Berpita Hijau Melintang (Total 12 Buku) -->
                            <div class="space-y-4 relative z-10" id="bpsCatalogBooksContainer">
                                
                            <!-- Row 1 (3 Buku dengan Pita Hijau Diagonal) -->
                            <div class="relative py-4 my-2">
                                <!-- Pita Hijau Diagonal Berlari Melintang di Belakang Buku -->
                                
                                <!-- Grid 3 Kolom untuk Baris Ini -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 relative z-10 w-full items-center">
                                    
                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-start" data-bps-cat="kuda">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kuda')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                1
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#0d2238] via-[#16385c] to-[#2563eb] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-blue-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-bar-chart-fill text-xs text-blue-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kabupaten Kolaka Utara Dalam Angka 2025</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Data Pokok Makro & Wilayah 15 Kecamatan</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102001.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-patch-check-fill text-emerald-400"></i> <span>RESMI BPS • 2025</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 486 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kuda')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-center" data-bps-cat="statda">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('statda')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                2
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#123826] via-[#1a4f36] to-[#10b981] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-emerald-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-graph-up text-xs text-emerald-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Statistik Daerah Kabupaten Kolaka Utara 2025</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Analisis Ringkas & Indikator Pembangunan</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1101002.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-graph-up-arrow text-emerald-400"></i> <span>ANALISIS MAKRO</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 58 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('statda')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-end" data-bps-cat="podes">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('podes')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                3
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#422909] via-[#6e430f] to-[#d97706] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-amber-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-buildings-fill text-xs text-amber-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Indikator Potensi Desa Kolaka Utara 2025</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Hasil Sensus Sarana 127 Desa & 6 Kelurahan</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1104003.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-buildings text-emerald-400"></i> <span>SENSUS PODES</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 312 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('podes')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2 (3 Buku dengan Pita Hijau Diagonal) -->
                            <div class="relative py-4 my-2">
                                <!-- Pita Hijau Diagonal Berlari Melintang di Belakang Buku -->
                                
                                <!-- Grid 3 Kolom untuk Baris Ini -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 relative z-10 w-full items-center">
                                    
                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-start" data-bps-cat="kesra">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kesra')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                4
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#380c1d] via-[#631430] to-[#e11d48] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-rose-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-people-fill text-xs text-rose-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Indikator Kesejahteraan Rakyat Kolut 2025</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Konsumsi Rumah Tangga, Kesehatan & Sosial</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1103002.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-people text-emerald-400"></i> <span>SUSENAS 2025</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 124 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kesra')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-center" data-bps-cat="descan">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('descan')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                5
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#143322] via-[#204a33] to-[#059669] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-emerald-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-award-fill text-xs text-teal-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Panduan Teknis Pembinaan Desa Cantik</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Standar Metadata Statistik Sektoral Desa</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1109001.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-star-fill text-emerald-400"></i> <span>PEDOMAN SDI</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 96 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('descan')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-end" data-bps-cat="kda-kec">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kda-lasusua')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                6
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#281145] via-[#431b70] to-[#7c3aed] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-purple-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-geo-alt-fill text-xs text-purple-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kecamatan Lasusua Dalam Angka 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Profil Statistik Pusat Ibukota Kabupaten</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102002.7408.010</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-geo-alt-fill text-emerald-400"></i> <span>IBUKOTA KAB.</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 128 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kda-lasusua')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 3 (3 Buku dengan Pita Hijau Diagonal) -->
                            <div class="relative py-4 my-2">
                                <!-- Pita Hijau Diagonal Berlari Melintang di Belakang Buku -->
                                
                                <!-- Grid 3 Kolom untuk Baris Ini -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 relative z-10 w-full items-center">
                                    
                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-start" data-bps-cat="kda-kec">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kda-pakue')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                7
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#192b3d] via-[#233f5c] to-[#0284c7] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-sky-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-water text-xs text-sky-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kecamatan Pakue Dalam Angka 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Statistik Wilayah Utara & Perkebunan Kakao</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102002.7408.020</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-compass text-emerald-400"></i> <span>WILAYAH UTARA</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 108 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kda-pakue')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-center" data-bps-cat="kda-kec">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kda-batuputih')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                8
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#16332e] via-[#1c4f46] to-[#0d9488] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-teal-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-compass-fill text-xs text-teal-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kecamatan Batu Putih Dalam Angka 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Statistik Pesisir Pantai & Hasil Bumi</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102002.7408.030</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-tsunami text-emerald-400"></i> <span>PESISIR BONE</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 102 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kda-batuputih')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-end" data-bps-cat="kda-kec">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kda-ranteangin')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                9
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#381f0f] via-[#542d13] to-[#b45309] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-amber-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-tree-fill text-xs text-amber-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kecamatan Rante Angin Dalam Angka 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Sentra Pertanian Kakao & Komoditas Rakyat</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102002.7408.040</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-flower2 text-emerald-400"></i> <span>SENTRA KAKAO</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 98 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kda-ranteangin')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 4 (3 Buku dengan Pita Hijau Diagonal) -->
                            <div class="relative py-4 my-2">
                                <!-- Pita Hijau Diagonal Berlari Melintang di Belakang Buku -->
                                
                                <!-- Grid 3 Kolom untuk Baris Ini -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 relative z-10 w-full items-center">
                                    
                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-start" data-bps-cat="kda-kec">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kda-kodeoha')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                10
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#1b3320] via-[#264d2f] to-[#16a34a] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-green-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-flower1 text-xs text-green-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kecamatan Kodeoha Dalam Angka 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Sentra Agribisnis, Kelapa & Nelayan</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102002.7408.050</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-briefcase text-emerald-400"></i> <span>AGRIBISNIS</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 114 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kda-kodeoha')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-center" data-bps-cat="statda">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('pdrb-kolut')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                11
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#122833] via-[#173b4d] to-[#0891b2] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-cyan-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-cash-stack text-xs text-cyan-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">PDRB Kolaka Utara Menurut Lapangan Usaha</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Tinjauan Nilai Tambah & Pertumbuhan Ekonomi</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1105001.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-currency-dollar text-emerald-400"></i> <span>PRODUK DOMESTIK</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 156 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('pdrb-kolut')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-end" data-bps-cat="kesra">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('naker-kolut')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                12
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#261333] via-[#3d1a54] to-[#9333ea] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-purple-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-person-badge-fill text-xs text-purple-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Profil Ketenagakerjaan & Kemiskinan 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Indikator Sakernas, Pengangguran & Garis Kemiskinan</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1107001.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-person-check text-emerald-400"></i> <span>SAKERNAS RESMI</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 92 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('naker-kolut')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>

                            <!-- Catatan Footer Katalog (Persis seperti catatan di bagian bawah foto referensi) -->
                            <div class="mt-10 pt-6 border-t border-slate-200/90 relative z-20 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 bg-white/80 backdrop-blur-xs p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-2xs">
                                <div class="space-y-1.5 text-xs font-semibold text-slate-700">
                                    <div class="flex items-center gap-2 text-emerald-900 font-bold">
                                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-600 inline-block shrink-0"></span>
                                        <span>Layanan Statistik Terpadu (PST): BPS Kabupaten Kolaka Utara (pst7408@bps.go.id)</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-600">
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-400 inline-block shrink-0"></span>
                                        <span>Lokasi Kantor: Kompleks Perkantoran Pemkab Kolaka Utara, Lasusua, Sulawesi Tenggara.</span>
                                    </div>
                                </div>
                                <div class="shrink-0 self-start md:self-auto">
                                    <span class="px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-900 font-extrabold text-[11px] inline-flex items-center gap-1.5 border border-emerald-300 shadow-2xs">
                                        <i class="bi bi-check-circle-fill text-emerald-600"></i> <span>100% AKSES TERBUKA &amp; GRATIS</span>
                                    </span>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- 1. PANGGUNG 3D BUKU SPOTLIGHT SHOWROOM (SEPERTI MODEL PADA FOTO)     -->
                    <!-- ===================================================================== -->
                    <div id="bpsStageShowcaseSection" class="space-y-6">
                        
                        <!-- Panggung 3D Container (Responsive Desktop & Mobile) -->
                        <div id="bpsStageContainer" class="bps-stage-container py-8 sm:py-12 px-4 relative overflow-hidden" 
                             onmouseenter="window.handleBpsStageHover(true)" 
                             onmouseleave="window.handleBpsStageHover(false)"
                             onmousedown="window.handleBpsStageDragStart(event)"
                             ontouchstart="window.handleBpsStageTouchStart(event)"
                             ontouchend="window.handleBpsStageTouchEnd(event)">
                            
                            <!-- Studio Spotlights Beam -->
                            <div class="bps-spotlight-left"></div>
                            <div class="bps-spotlight-right"></div>
                            
                            <!-- Center Ambient Glow & Podium Base Platform -->
                            <div class="bps-stage-floor-glow"></div>
                            <div class="bps-podium-platform-base"></div>

                            <!-- Left & Right Arrow Buttons (Green Pine Theme) -->
                            <button type="button" onclick="window.rotateBpsStage(-1)" class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 z-30 w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-white hover:bg-emerald-50 border border-emerald-900/20 text-[#3B4D3B] hover:text-[#204a32] hover:border-[#3B4D3B] flex items-center justify-center transition-all hover:scale-110 shadow-md cursor-pointer" title="Buku Sebelumnya"><i class="bi bi-chevron-left text-lg"></i></button>
                            <button type="button" onclick="window.rotateBpsStage(1)" class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 z-30 w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-white hover:bg-emerald-50 border border-emerald-900/20 text-[#3B4D3B] hover:text-[#204a32] hover:border-[#3B4D3B] flex items-center justify-center transition-all hover:scale-110 shadow-md cursor-pointer" title="Buku Berikutnya"><i class="bi bi-chevron-right text-lg"></i></button>

                            <!-- Track Berisi 6 Buku 3D -->
                            <div id="bpsBooksTrack" class="bps-books-track relative w-full">

                                <!-- BUKU 0: KOLAKA UTARA DALAM ANGKA 2025/2026 -->
                                <div class="bps-book-3d-item active" id="bpsBook3D-0" onclick="window.handleBpsBookClick(event, 0, 'kuda')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#0b2545] via-[#103b6b] to-[#07172b] border-r border-blue-400/30">
                                            <span class="text-[8px] font-black text-amber-400">BPS</span>
                                            <span class="bps-book-spine-text">Kolaka Utara Dalam Angka 2025/2026</span>
                                            <span class="text-[7px] text-blue-200">2026</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#0b2545] via-[#103b6b] to-[#1e588f] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-emerald-300 uppercase">BPS KOLUT</span>
                                                <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[8px] font-black">2025/2026</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-bar-chart-fill text-white"></i></div>
                                                <div class="text-[10px] text-blue-200 font-bold uppercase tracking-wider">Kompilasi Tahunan</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Kabupaten Kolaka Utara Dalam Angka</h4>
                                                <p class="text-[9px] text-blue-100/80 mt-1 line-clamp-2">Sensus &amp; data makro 15 kecamatan terlengkap.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-blue-200 border-t border-white/20 pt-2">
                                                <span>1102001.7408</span>
                                                <span class="font-extrabold text-emerald-300">486 Halaman</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                                <!-- BUKU 1: STATISTIK DAERAH KOLAKA UTARA 2025 -->
                                <div class="bps-book-3d-item pos-right-1" id="bpsBook3D-1" onclick="window.handleBpsBookClick(event, 1, 'statda')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#0f2e22] via-[#1e4a37] to-[#0a1e16] border-r border-emerald-400/30">
                                            <span class="text-[8px] font-black text-emerald-400">BPS</span>
                                            <span class="bps-book-spine-text">Statistik Daerah Kolaka Utara 2025</span>
                                            <span class="text-[7px] text-emerald-200">2025</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#0f2e22] via-[#1e4a37] to-[#115e43] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-teal-300 uppercase">BPS KOLUT</span>
                                                <span class="px-2 py-0.5 rounded-full bg-teal-500/20 text-teal-300 text-[8px] font-black">MAKRO</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-graph-up text-white"></i></div>
                                                <div class="text-[10px] text-teal-200 font-bold uppercase tracking-wider">Laporan Analitis</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Statistik Daerah Kolaka Utara 2025</h4>
                                                <p class="text-[9px] text-emerald-100/80 mt-1 line-clamp-2">Analisis deskriptif makroekonomi &amp; IPM daerah.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-emerald-200 border-t border-white/20 pt-2">
                                                <span>1101002.7408</span>
                                                <span class="font-extrabold text-teal-300">58 Halaman</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                                <!-- BUKU 2: INDIKATOR POTENSI DESA (PODES) 2025 -->
                                <div class="bps-book-3d-item pos-right-2" id="bpsBook3D-2" onclick="window.handleBpsBookClick(event, 2, 'podes')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#45260a] via-[#6d3e12] to-[#291605] border-r border-amber-400/30">
                                            <span class="text-[8px] font-black text-amber-300">BPS</span>
                                            <span class="bps-book-spine-text">Indikator Potensi Desa PODES 2025</span>
                                            <span class="text-[7px] text-amber-200">PODES</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#45260a] via-[#6d3e12] to-[#925519] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-amber-300 uppercase">PODES 2025</span>
                                                <span class="px-2 py-0.5 rounded-full bg-amber-500/20 text-amber-300 text-[8px] font-black">133 DESA</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-buildings-fill text-white"></i></div>
                                                <div class="text-[10px] text-amber-200 font-bold uppercase tracking-wider">Hasil Sensus Lengkap</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Potensi Desa (PODES) Kolaka Utara 2025</h4>
                                                <p class="text-[9px] text-amber-100/80 mt-1 line-clamp-2">Ketersediaan sarana, infrastruktur &amp; ekonomi desa.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-amber-200 border-t border-white/20 pt-2">
                                                <span>1104003.7408</span>
                                                <span class="font-extrabold text-amber-300">312 Halaman</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                                <!-- BUKU 3: INDIKATOR KESEJAHTERAAN RAKYAT 2025 -->
                                <div class="bps-book-3d-item pos-hidden" id="bpsBook3D-3" onclick="window.handleBpsBookClick(event, 3, 'kesra')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#3e0e1e] via-[#6b1431] to-[#250812] border-r border-rose-400/30">
                                            <span class="text-[8px] font-black text-rose-300">BPS</span>
                                            <span class="bps-book-spine-text">Indikator Kesra Kolaka Utara 2025</span>
                                            <span class="text-[7px] text-rose-200">KESRA</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#3e0e1e] via-[#6b1431] to-[#881337] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-rose-300 uppercase">SUSENAS 2025</span>
                                                <span class="px-2 py-0.5 rounded-full bg-rose-500/20 text-rose-300 text-[8px] font-black">SOSIAL</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-people-fill text-white"></i></div>
                                                <div class="text-[10px] text-rose-200 font-bold uppercase tracking-wider">Kesejahteraan Rakyat</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Indikator Kesejahteraan Kolaka Utara 2025</h4>
                                                <p class="text-[9px] text-rose-100/80 mt-1 line-clamp-2">Pola konsumsi, sanitasi &amp; kualitas hidup.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-rose-200 border-t border-white/20 pt-2">
                                                <span>1103002.7408</span>
                                                <span class="font-extrabold text-rose-300">124 Halaman</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                                <!-- BUKU 4: BUKU PANDUAN TEKNIS DESA CANTIK -->
                                <div class="bps-book-3d-item pos-left-2" id="bpsBook3D-4" onclick="window.handleBpsBookClick(event, 4, 'descan')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#0d2a1d] via-[#1a4a35] to-[#071911] border-r border-emerald-400/30">
                                            <span class="text-[8px] font-black text-emerald-300">BPS</span>
                                            <span class="bps-book-spine-text">Panduan Teknis Desa Cantik 2025</span>
                                            <span class="text-[7px] text-emerald-200">DESCAN</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#0d2a1d] via-[#1a4a35] to-[#256f50] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-emerald-300 uppercase">DESA CANTIK</span>
                                                <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[8px] font-black">PEDOMAN</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-patch-check-fill text-white"></i></div>
                                                <div class="text-[10px] text-emerald-200 font-bold uppercase tracking-wider">Pedoman Pembinaan</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Panduan Teknis Desa Cantik (DESCAN)</h4>
                                                <p class="text-[9px] text-emerald-100/80 mt-1 line-clamp-2">Kerangka kerja agen statistik tingkat desa.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-emerald-200 border-t border-white/20 pt-2">
                                                <span>1109001.7408</span>
                                                <span class="font-extrabold text-emerald-300">96 Halaman</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                                <!-- BUKU 5: SERI KECAMATAN DALAM ANGKA (15 JILID) -->
                                <div class="bps-book-3d-item pos-left-1" id="bpsBook3D-5" onclick="window.handleBpsBookClick(event, 5, 'kda-kec')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#24103a] via-[#3e1b64] to-[#140822] border-r border-purple-400/30">
                                            <span class="text-[8px] font-black text-purple-300">BPS</span>
                                            <span class="bps-book-spine-text">Seri Kecamatan Dalam Angka 2025</span>
                                            <span class="text-[7px] text-purple-200">15 JILID</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#24103a] via-[#3e1b64] to-[#581c87] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-purple-300 uppercase">15 KECAMATAN</span>
                                                <span class="px-2 py-0.5 rounded-full bg-purple-500/20 text-purple-300 text-[8px] font-black">SERIAL</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-map-fill text-white"></i></div>
                                                <div class="text-[10px] text-purple-200 font-bold uppercase tracking-wider">Statistik Kewilayahan</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Kecamatan Dalam Angka 2025 (15 Jilid)</h4>
                                                <p class="text-[9px] text-purple-100/80 mt-1 line-clamp-2">Detail statistik spesifik per kecamatan &amp; dusun.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-purple-200 border-t border-white/20 pt-2">
                                                <span>1102002.7408</span>
                                                <span class="font-extrabold text-purple-300">15 Jilid Buku</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- ===================================================================== -->
                        <!-- SPOTLIGHT INSPECTOR PANEL (DI BAWAH PANGGUNG 3D)                       -->
                        <!-- ===================================================================== -->
                        <div id="bpsBookInspectorCard" class="bg-white rounded-3xl p-6 sm:p-8 border border-emerald-900/15 shadow-sm transition-all duration-300">
                            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                                <div class="space-y-3 max-w-3xl">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span id="inspectorBadge" class="px-3 py-1 rounded-full bg-emerald-50 text-[#3B4D3B] border border-emerald-200/80 text-[10px] font-black uppercase tracking-wider">
                                            Buku Tahunan Pokok
                                        </span>
                                        <span id="inspectorReleaseDate" class="text-xs font-bold text-[#3B4D3B] bg-emerald-50/80 px-2.5 py-0.5 rounded-full border border-emerald-200/60">
                                            Rilis: 28 Februari 2025
                                        </span>
                                        <span id="inspectorPages" class="text-xs font-bold text-[#3B4D3B] bg-emerald-50/80 px-2.5 py-0.5 rounded-full border border-emerald-200/60">
                                            486 Halaman
                                        </span>
                                    </div>
                                    <h3 id="inspectorTitle" class="text-xl sm:text-2xl font-black text-slate-900 leading-tight">
                                        Kabupaten Kolaka Utara Dalam Angka 2025
                                    </h3>
                                    <p id="inspectorDesc" class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                        Publikasi tahunan komprehensif yang menyajikan data statistik makro dan sektoral wilayah Kabupaten Kolaka Utara. Meliputi keadaan geografi dan iklim, pemerintahan daerah, kependudukan dan ketenagakerjaan, sosial dan kesejahteraan rakyat, pertanian tanaman pangan dan perkebunan kakao, perindustrian dan energi, perdagangan, serta Produk Domestik Regional Bruto (PDRB).
                                    </p>
                                    <div class="flex items-center gap-4 text-xs font-semibold text-slate-500 pt-1">
                                        <div><span class="text-slate-400">No. Katalog:</span> <strong id="inspectorPubNo" class="text-slate-700 font-mono">1102001.7408</strong></div>
                                        <div>•</div>
                                        <div><span class="text-slate-400">Standar:</span> <strong id="inspectorIssn" class="text-slate-700 font-mono">ISSN: 0215-6032</strong></div>
                                    </div>
                                </div>

                                <!-- Action Buttons & Step Dots -->
                                <div class="flex flex-col sm:flex-row lg:flex-col items-stretch lg:items-end justify-between gap-4 shrink-0">
                                    <div class="flex items-center gap-2.5">
                                        <button type="button" onclick="window.openBpsBookModal(window.bpsStageBooks[window.bpsStageCurrentIdx].key)" class="flex-1 sm:flex-none px-5 py-3 rounded-2xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-extrabold text-xs shadow-sm transition flex items-center justify-center gap-2 cursor-pointer hover:scale-105 active:scale-95">
                                            <i class="bi bi-book-half text-sm"></i>
                                            <span>Buka Detail &amp; Bab</span>
                                        </button>
                                        <a id="inspectorDownloadBtn" href="https://kolutkab.bps.go.id" target="_blank" class="flex-1 sm:flex-none px-4 py-3 rounded-2xl bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                            <i class="bi bi-file-earmark-pdf-fill text-sm"></i>
                                            <span>Unduh PDF</span>
                                        </a>
                                    </div>

                                    <!-- 6 Step Dots Navigation -->
                                    <div class="flex items-center gap-2 justify-center lg:justify-end pt-1" id="bpsStageDots">
                                        <!-- Rendered dynamically via JS -->
                                    </div>
                                </div>
                            </div>
                        </div>
</div>

                    </div>

                    </div>

                <!-- Bottom Navigation Button for Page 5 -->
                <div class="flex items-center justify-end pt-6 border-t border-slate-200">
                    <a href="/portal" onclick="window.onNavClick(event, 1, '/portal')" class="px-6 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-xs sm:text-sm shadow-sm transition-all flex items-center gap-2 cursor-pointer">
                        <span>Kembali ke Halaman 1: Beranda</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ============================================================== -->
        <!-- MODAL PRATINJAU BUKU RESMI BPS KOLAKA UTARA                    -->
        <!-- ============================================================== -->
        <div id="bpsBookPreviewModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-6 bg-slate-950/80 backdrop-blur-sm overflow-y-auto">
            <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 flex flex-col max-h-[90vh] animate-in fade-in zoom-in duration-200">
                <div id="bpsBookModalHeader" class="bg-gradient-to-r from-[#173824] via-[#204a32] to-[#142e1f] text-white p-5 sm:p-6 flex items-center justify-between shrink-0 border-b border-emerald-500/20">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-xl shrink-0"><i class="bi bi-journal-bookmark-fill text-xl"></i></div>
                        <div>
                            <span id="bpsBookModalBadge" class="text-[10px] font-black uppercase tracking-wider text-emerald-300">PUBLIKASI RESMI BPS</span>
                            <h3 id="bpsBookModalTitle" class="text-base sm:text-lg font-black leading-tight text-white mt-0.5">Judul Buku</h3>
                        </div>
                    </div>
                    <button type="button" onclick="window.closeBpsBookModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-sm font-bold transition cursor-pointer" title="Tutup Modal"><i class="bi bi-x-lg text-xs"></i></button>
                </div>
                <div class="p-6 space-y-4 overflow-y-auto flex-1 text-slate-700 text-xs sm:text-sm">
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 p-3 bg-slate-50 rounded-2xl border border-slate-200 text-[11px]">
                        <div><span class="text-slate-400 block font-bold">Katalog BPS</span><b id="bpsBookModalKatalog">-</b></div>
                        <div><span class="text-slate-400 block font-bold">No. Publikasi</span><b id="bpsBookModalPubNo">-</b></div>
                        <div><span class="text-slate-400 block font-bold">Rilis</span><b id="bpsBookModalRilis">-</b></div>
                        <div><span class="text-slate-400 block font-bold">Halaman</span><b id="bpsBookModalHal">-</b></div>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-sm text-slate-900 mb-1">Ringkasan Eksekutif</h4>
                        <p id="bpsBookModalDesc" class="leading-relaxed text-slate-600">Deskripsi ringkasan buku.</p>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-sm text-slate-900 mb-2">Struktur Konten &amp; Bab Utama</h4>
                        <ul id="bpsBookModalChapters" class="space-y-1.5 text-xs text-slate-600 list-disc list-inside bg-emerald-50/50 p-4 rounded-2xl border border-emerald-100">
                            <!-- Populated via JS -->
                        </ul>
                    </div>
                </div>
                <div class="p-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between gap-3 shrink-0">
                    <span class="text-[11px] text-slate-500 font-medium hidden sm:inline">BPS Kabupaten Kolaka Utara © 2026</span>
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <button type="button" onclick="window.closeBpsBookModal()" class="flex-1 sm:flex-none px-4 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs transition cursor-pointer">
                            Tutup
                        </button>
                        <a id="bpsBookModalDownloadBtn" href="https://kolutkab.bps.go.id" target="_blank" class="flex-1 sm:flex-none px-5 py-2 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-xs shadow-sm transition flex items-center justify-center gap-1.5 cursor-pointer"><i class="bi bi-file-earmark-pdf-fill text-sm"></i> <span>Unduh / Akses Resmi</span></a>
                    </div>
                </div>
            </div>
        </div>

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
    window.onNavClick = function(event, pageNum, url, subTab) {
        if (event && event.preventDefault) event.preventDefault();
        window.switchPortalPage(pageNum, url, subTab);
    };

    // 5. 5-Page Switcher with Instant Toggle & History State
    window.switchPortalPage = function(pageNum, newUrl, subTab) {
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
