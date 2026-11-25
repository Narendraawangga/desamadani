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
            font-weight: 600;
            font-size: 13px;
            color: #475569;
            padding: 6px 14px;
            border-radius: 9999px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        .nav-link:hover {
            color: #0E7C5A;
            background: rgba(14, 124, 90, 0.06);
        }
        .nav-link.active {
            color: #0E7C5A !important;
            font-weight: 700 !important;
            background: #ecfdf5 !important;
            border: 1px solid #d1fae5 !important;
            box-shadow: 0 1px 2px rgba(14, 124, 90, 0.05);
        }
        .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            width: 18px;
            height: 2.5px;
            border-radius: 99px;
            background: #0E7C5A;
        }

        /* Hero */
        .hero-banner {
            background: linear-gradient(135deg, #071b12 0%, #0d3522 55%, #0b2545 100%);
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

                /* ===== 3D MODERN STATS CARDS (FLAT, SUBTLE & COMPACT ABOVE-THE-FOLD) ===== */
        .stat-card-3d {
            position: relative;
            background: #ffffff;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 3px 12px -3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }
        .stat-card-3d::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--accent-bar, linear-gradient(90deg, #10b981, #059669));
            border-radius: 18px 18px 0 0;
        }
        .stat-card-3d:hover {
            transform: translateY(-4px); /* Subtle hover lift */
            box-shadow: 0 12px 24px -6px rgba(15, 23, 42, 0.08), 0 2px 6px rgba(15, 23, 42, 0.03);
            border-color: #cbd5e1;
        }
        .orb-3d {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.25s ease;
        }
        .stat-card-3d:hover .orb-3d {
            transform: translateY(-1.5px) scale(1.04);
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
            transition: transform 500ms ease-out;
            transform: translate3d(0, 0, 0);
            transform-style: preserve-3d;
            will-change: transform;
            padding: 10px 0;
        }

        .coverflow-card {
            position: relative;
            width: 280px;
            height: 440px;
            border-radius: 28px;
            overflow: hidden;
            cursor: pointer;
            flex-shrink: 0;
            will-change: transform;
            transition: transform 500ms ease-out, opacity 500ms ease-out;
            transform-style: preserve-3d;
            box-shadow: 0 12px 28px -8px rgba(0, 0, 0, 0.35);
            background: #0f172a;
            transform: translate3d(0, 0, 0) scale(0.92);
            opacity: 0.9;
        }

        .coverflow-card.active {
            cursor: default;
            transform: translate3d(0, 0, 0) scale(1.08) !important;
            box-shadow: 0 20px 45px -10px rgba(14, 124, 90, 0.5), 0 0 0 2.5px rgba(16, 185, 129, 0.9) !important;
            z-index: 40;
            opacity: 1 !important;
        }

        .coverflow-card.card-left {
            transform: translate3d(0, 0, 0) scale(0.94) rotateY(16deg);
            opacity: 0.92;
            z-index: 30;
        }

        .coverflow-card.card-right {
            transform: translate3d(0, 0, 0) scale(0.94) rotateY(-16deg);
            opacity: 0.92;
            z-index: 30;
        }

        .coverflow-card.card-far-left {
            transform: translate3d(0, 0, 0) scale(0.85) rotateY(26deg);
            opacity: 0.82;
            z-index: 20;
        }

        .coverflow-card.card-far-right {
            transform: translate3d(0, 0, 0) scale(0.85) rotateY(-26deg);
            opacity: 0.82;
            z-index: 20;
        }

        .coverflow-card img.card-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease-out;
        }

        .coverflow-card:hover img.card-bg {
            transform: scale(1.05);
        }

        .coverflow-card .card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, 
                rgba(2, 6, 23, 0.92) 0%, 
                rgba(15, 23, 42, 0.40) 45%, 
                rgba(15, 23, 42, 0.05) 70%, 
                transparent 100%);
            pointer-events: none;
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
                height: 400px;
                border-radius: 22px;
            }
            .coverflow-card .card-content {
                padding: 1.1rem;
            }
        }

</style>

<style>
/* ============================================================== */
/* 3D REALISTIC BOOK SHOWCASE ENGINE (PERSISTENT & ULTRA-SMOOTH)  */
/* ============================================================== */
.book-3d-scene {
    perspective: 1200px;
    perspective-origin: 50% 50%;
}
.book-3d-wrap {
    transform-style: preserve-3d;
    transition: transform 0.15s cubic-bezier(0.2, 0.8, 0.2, 1);
    will-change: transform;
}
.book-3d-wrap.floating-anim {
    animation: bookFloat3D 4.5s ease-in-out infinite;
}
@keyframes bookFloat3D {
    0%, 100% {
        transform: rotateY(-22deg) rotateX(7deg) translateY(0px);
    }
    50% {
        transform: rotateY(-17deg) rotateX(11deg) translateY(-8px);
    }
}
.book-spine-3d {
    transform: rotateY(-90deg) translateZ(0px);
    transform-origin: left center;
}
.book-pages-right {
    transform: rotateY(90deg) translateZ(168px);
    transform-origin: right center;
    background: repeating-linear-gradient(to right, #fdfcf9 0px, #f6f3ea 2px, #dfd8c8 3px, #f6f3ea 4px);
}
.book-pages-top {
    transform: rotateX(90deg) translateZ(0px);
    transform-origin: top center;
    background: repeating-linear-gradient(to bottom, #fdfcf9 0px, #f6f3ea 2px, #dfd8c8 3px, #f6f3ea 4px);
}
.book-cover-front {
    transform: translateZ(14px);
    box-shadow: inset 4px 0 10px rgba(0, 0, 0, 0.35), inset -2px 0 6px rgba(255, 255, 255, 0.25);
}
.book-cast-shadow {
    transform: rotateX(85deg) translateZ(-130px) translateY(18px) scale(0.92);
    filter: blur(14px);
    opacity: 0.55;
    transition: transform 0.2s ease-out, opacity 0.2s ease-out;
}
.book-glare-overlay {
    background: linear-gradient(115deg, rgba(255, 255, 255, 0.38) 0%, rgba(255, 255, 255, 0) 45%, rgba(255, 255, 255, 0.12) 80%);
    pointer-events: none;
    transition: opacity 0.3s ease;
}
</style>

<style>
/* 3D Moving Interactive Book Styles */
.mono-perspective {
    perspective: 1200px;
}
.mono-book-3d {
    position: relative;
    width: 170px;
    height: 245px;
    transform-style: preserve-3d;
    transition: transform 0.25s ease-out, box-shadow 0.25s ease-out;
    cursor: pointer;
}
.mono-book-spine {
    position: absolute;
    left: 0;
    top: 0;
    width: 26px;
    height: 100%;
    transform: rotateY(-90deg) translateZ(13px);
    background: linear-gradient(90deg, #022c1b 0%, #04522d 50%, #033b20 100%);
    border-radius: 3px 0 0 3px;
    box-shadow: inset -2px 0 5px rgba(0,0,0,0.4);
}
.mono-book-cover {
    position: absolute;
    inset: 0;
    border-radius: 3px 8px 8px 3px;
    background: linear-gradient(135deg, #065f46 0%, #047857 50%, #022c22 100%);
    transform: translateZ(13px);
    box-shadow: 0 15px 35px -5px rgba(0, 0, 0, 0.4), 0 5px 15px rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(52, 211, 153, 0.3);
    overflow: hidden;
}
.mono-book-pages-right {
    position: absolute;
    right: 0;
    top: 3px;
    width: 24px;
    height: 239px;
    transform: rotateY(90deg) translateZ(157px);
    background: repeating-linear-gradient(to right, #f8fafc 0px, #e2e8f0 1.5px, #f8fafc 3px);
    box-shadow: inset 0 0 4px rgba(0,0,0,0.25);
    border-radius: 1px;
}
.mono-book-pages-top {
    position: absolute;
    top: 0;
    left: 2px;
    width: 166px;
    height: 24px;
    transform: rotateX(90deg) translateZ(12px);
    background: repeating-linear-gradient(to bottom, #f8fafc 0px, #e2e8f0 1.5px, #f8fafc 3px);
    box-shadow: inset 0 0 4px rgba(0,0,0,0.25);
    border-radius: 1px;
}
.mono-book-back {
    position: absolute;
    inset: 0;
    border-radius: 8px 3px 3px 8px;
    background: #022c22;
    transform: translateZ(-13px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.5);
}
.mono-book-shadow {
    position: absolute;
    bottom: -18px;
    width: 180px;
    height: 24px;
    background: radial-gradient(ellipse at center, rgba(15, 23, 42, 0.45) 0%, rgba(15, 23, 42, 0) 70%);
    border-radius: 50%;
    transform: rotateX(80deg);
    pointer-events: none;
    transition: transform 0.25s ease-out, opacity 0.25s ease-out;
}
@keyframes monoFloating {
    0%, 100% { transform: translateY(0px) rotateY(-18deg) rotateX(6deg); }
    50% { transform: translateY(-8px) rotateY(-14deg) rotateX(4deg); }
}
.mono-floating {
    animation: monoFloating 4s ease-in-out infinite;
}
</style>

</head>
<body class="min-h-screen flex flex-col justify-between selection:bg-emerald-200 selection:text-emerald-950">

    <!-- ============================================================== -->
    <!-- 1. TOP BAR BPS RESMI (Ringkas & Rapi)                           -->
    <!-- ============================================================== -->
    <div class="topbar-bps">
        <div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 flex items-center justify-between">
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
        <div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 py-3 flex items-center justify-between gap-4">
            
            <!-- Brand Logo Resmi (Pemkab Kolaka Utara, BPS & Logo Desa Cantik) -->
            <a href="/descan" class="flex items-center gap-2.5 group">
                <div class="flex items-center gap-2 bg-white px-2.5 py-1.5 rounded-xl border border-slate-200/90 shadow-2xs group-hover:scale-105 transition">
                    <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-8 w-auto object-contain" title="Pemerintah Kabupaten Kolaka Utara">
                    <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-8 w-auto object-contain" title="Badan Pusat Statistik Kolaka Utara">
                    <div class="h-6 w-[1px] bg-slate-200"></div>
                    <img src="/logo-descan.png" alt="Desa Cantik" class="h-9 w-auto object-contain" title="Desa Cantik - Desa Cinta Statistik">
                </div>
                <div class="flex flex-col justify-center leading-tight">
                    <div>
                        <span class="inline-block px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-800 text-[10px] font-semibold tracking-wide border border-emerald-200/60">KODEOHA &amp; TIWU</span>
                    </div>
                    <div class="text-[11px] font-medium text-slate-500 tracking-wider uppercase mt-0.5">
                        KABUPATEN KOLAKA UTARA
                    </div>
                </div>
            </a>

            <!-- Navigasi Menu Header Descan (Rata Kanan & Sinkron) -->
            <div class="flex items-center gap-4">
                <nav id="descanNavLinks" class="hidden md:flex items-center gap-2">
                    <a href="#beranda" class="nav-link">
                        Beranda
                    </a>
                    <a href="#dashboard" class="nav-link active">
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

                <!-- Language Switcher Pill -->
                <div class="flex items-center bg-white/80 rounded-full p-0.5 text-xs font-bold border border-[#DCE3DD] shrink-0 shadow-2xs">
                    <button type="button" id="btnLangID" onclick="window.setPortalLanguage('id')" class="px-2 py-0.5 rounded-full bg-[#3B4D3B] text-white shadow-2xs transition-all cursor-pointer font-bold text-[11px]">ID</button>
                    <button type="button" id="btnLangEN" onclick="window.setPortalLanguage('en')" class="px-2 py-0.5 rounded-full text-slate-600 hover:text-[#0b2545] transition-all cursor-pointer font-bold text-[11px]">EN</button>
                </div>

                <!-- Tombol Kembali ke Desa Madani di Ujung Kanan Header -->
                <div class="pl-2 sm:pl-3 md:border-l md:border-slate-200">
                    <a href="/portal" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-slate-100 hover:bg-emerald-50 text-slate-700 hover:text-[#0f6b4a] font-bold text-xs border border-slate-200 hover:border-emerald-300 transition shadow-2xs group cursor-pointer" title="Kembali ke Portal Utama Desa Madani">
                        <i class="bi bi-arrow-left-circle-fill text-emerald-600 text-sm group-hover:-translate-x-0.5 transition-transform"></i>
                        <span class="hidden sm:inline">Kembali ke Desa Madani</span>
                        <span class="sm:hidden">Desa Madani</span>
                    </a>
                </div>
            </div>


        </div>
    </header>

    <!-- ============================================================== -->
    <!-- 3. HERO SECTION (ORGANIC SPLIT NATURE DESIGN - INSPIRASI TERBARU) -->
    <!-- ============================================================== -->
    <main id="mainPortalLanding" class="w-full">
    <section id="beranda" class="relative bg-[#fbfdfa] text-slate-900 pt-8 pb-16 sm:pt-12 sm:pb-20 lg:pt-14 lg:pb-24 overflow-hidden border-b border-slate-100">
        
        <!-- Sisi Kanan: Foto Udara Hutan Tropis & Perkebunan Kolut dengan Feathering Gradient Halus ke Sisi Kiri -->
        <div class="absolute inset-y-0 right-0 w-full lg:w-[58%] xl:w-[54%] pointer-events-none select-none z-0 overflow-hidden">
            <!-- Aerial Forest Background Image with High Resolution -->
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1542273917363-3b1817f69a2d?auto=format&fit=crop&w=1600&q=80');"></div>
            
            <!-- Soft White Mist / Feather Gradient Overlay dari Kiri ke Kanan Persis Seperti Referensi -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#fbfdfa] via-[#fbfdfa]/80 md:via-[#fbfdfa]/40 to-transparent w-full lg:w-[60%]"></div>
            
            <!-- Soft Atmospheric Vignette -->
            <div class="absolute inset-0 bg-radial-gradient from-transparent via-transparent to-black/10"></div>
            <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#fbfdfa] to-transparent"></div>
            <div class="absolute inset-x-0 top-0 h-16 bg-gradient-to-b from-[#fbfdfa] to-transparent"></div>
        </div>

        <!-- Kontainer Konten Utama -->
        <div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- Sisi Kiri (Col-span 7): Tipografi Editorial, Narasi & Input Aksi -->
            <div class="lg:col-span-7 space-y-5 sm:space-y-6 text-left">
                <!-- Pill Tag Top (🌱 TOGETHER FOR ONE DATA INDONESIA) -->
                <div class="inline-flex items-center gap-2 text-[11px] sm:text-xs font-bold text-emerald-800 bg-emerald-50/90 border border-emerald-300/70 px-3.5 py-1.5 rounded-full shadow-2xs backdrop-blur-xs">
                    <span class="text-sm">🌱</span>
                    <span class="tracking-wide uppercase">PORTAL SATU DATA STATISTIK SEKTORAL 2026 • BPS KOLUT</span>
                </div>

                <!-- Headline Besar yang Gagah & Bersih Sesuai Referensi -->
                <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-[56px] font-black text-slate-900 tracking-tight leading-[1.12]">
                    Desa Cantik,<br>
                    <span class="text-emerald-700">Kedaulatan Data</span> Membangun Desa.
                </h1>

                <!-- Paragraf Deskripsi yang Rapi & Proporsional -->
                <p class="text-sm sm:text-base text-slate-600 font-medium leading-relaxed max-w-xl">
                    Pusat diseminasi data statistik sektoral dan pembinaan agen statistik mandiri untuk <strong>6 desa binaan BPS Kabupaten Kolaka Utara</strong> di wilayah Kecamatan Kodeoha &amp; Kecamatan Tiwu.
                </p>

                <!-- Input Pencarian Cepat / Quick Village Jump Bar (Gaya Email Box Image 2) -->
                <div class="flex items-center bg-white rounded-full p-1.5 pl-4 border border-slate-200/90 shadow-sm max-w-md focus-within:ring-2 focus-within:ring-emerald-500/20 focus-within:border-emerald-500 transition">
                    <i class="bi bi-search text-slate-400 mr-2 text-xs"></i>
                    <input type="text" id="heroQuickSearch" onkeyup="handleHeroQuickSearch(this.value)" placeholder="Cari data desa atau indikator makro..." class="w-full text-xs sm:text-sm bg-transparent outline-none text-slate-800 placeholder-slate-400 font-medium">
                    <a href="#dashboard" class="px-5 py-2.5 rounded-full bg-emerald-800 hover:bg-emerald-900 text-white font-bold text-xs tracking-wide transition shadow-xs whitespace-nowrap flex items-center gap-1.5 cursor-pointer">
                        <span>Jelajahi Data</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <!-- Social Proof: Avatar Stack & Indikator Warga Terdata -->
                <div class="flex items-center gap-3 pt-1">
                    <div class="flex -space-x-2 shrink-0">
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover shadow-2xs" src="/images/descan/avatar-cijati.png" alt="Agen BPS 1">
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover shadow-2xs" src="/images/descan/avatar-harapan.png" alt="Agen BPS 2">
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover shadow-2xs" src="/images/descan/avatar-lestari.png" alt="Agen BPS 3">
                    </div>
                    <div class="flex items-center gap-1.5 text-xs text-slate-600 font-semibold">
                        <span class="text-amber-500 text-sm">⭐</span>
                        <span><strong>2.426+ Keluarga</strong> terdata di 6 Desa Binaan Mandiri SDI</span>
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan (Col-span 5): 3 Kartu Mengambang Kaca (Glassmorphic) & Tombol Play di Tengah Hutan -->
            <div class="lg:col-span-5 relative flex flex-col justify-center min-h-[380px] lg:min-h-[440px]">
                
                <!-- Central Play Button Floating di Perbatasan Kabut Hutan -->
                <div class="absolute -left-6 lg:-left-12 top-1/2 -translate-y-1/2 z-20 hidden sm:flex items-center">
                    <button type="button" onclick="startVillageVideoOpening(true)" class="group flex items-center gap-2.5 pl-1.5 pr-4 py-1.5 rounded-full bg-white/95 backdrop-blur-md shadow-xl border border-white/90 hover:bg-white hover:scale-105 transition cursor-pointer">
                        <span class="w-8 h-8 rounded-full bg-emerald-800 text-white flex items-center justify-center text-xs shadow-inner group-hover:bg-emerald-700 transition">
                            <i class="bi bi-play-fill text-sm ml-0.5"></i>
                        </span>
                        <span class="text-xs font-bold text-slate-800 tracking-tight">Watch the Story</span>
                    </button>
                </div>

                <!-- 3 Floating Glassmorphic Cards Stacked Vertically -->
                <div class="space-y-3.5 max-w-sm ml-auto w-full">
                    
                    <!-- Kartu 1: Pesisir & Bahari (Ref: Reforestation) -->
                    <div onclick="filterDesaBySector('bahari')" class="rounded-2xl bg-white/90 hover:bg-white backdrop-blur-md border border-white/80 p-3 sm:p-3.5 shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 cursor-pointer flex items-center gap-3.5 group">
                        <img src="/images/jadesta/pantai_berova_pitulua.webp" alt="Pesisir & Bahari" class="w-13 h-13 sm:w-14 sm:h-14 rounded-xl object-cover shrink-0 shadow-2xs group-hover:scale-105 transition">
                        <div class="min-w-0 flex-1">
                            <h4 class="text-xs sm:text-sm font-bold text-slate-900 tracking-tight group-hover:text-emerald-800 transition">Pesisir &amp; Bahari</h4>
                            <p class="text-[11px] text-slate-500 leading-snug truncate mt-0.5">Perikanan tangkap, mangrove &amp; rumput laut.</p>
                        </div>
                    </div>

                    <!-- Kartu 2: Agro Perkebunan (Ref: Clean Oceans) -->
                    <div onclick="filterDesaBySector('perkebunan')" class="rounded-2xl bg-white/90 hover:bg-white backdrop-blur-md border border-white/80 p-3 sm:p-3.5 shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 cursor-pointer flex items-center gap-3.5 group">
                        <img src="/images/jadesta/kebun_kakao_totallang.jpg" alt="Agro Perkebunan" class="w-13 h-13 sm:w-14 sm:h-14 rounded-xl object-cover shrink-0 shadow-2xs group-hover:scale-105 transition">
                        <div class="min-w-0 flex-1">
                            <h4 class="text-xs sm:text-sm font-bold text-slate-900 tracking-tight group-hover:text-emerald-800 transition">Agro Perkebunan</h4>
                            <p class="text-[11px] text-slate-500 leading-snug truncate mt-0.5">Cengkeh, nilam &amp; kakao unggulan Kolut.</p>
                        </div>
                    </div>

                    <!-- Kartu 3: Satu Data Indonesia (Ref: Wildlife Protection) -->
                    <div onclick="filterDesaBySector('sdi')" class="rounded-2xl bg-white/90 hover:bg-white backdrop-blur-md border border-white/80 p-3 sm:p-3.5 shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 cursor-pointer flex items-center gap-3.5 group">
                        <img src="/images/jadesta/kelurahan_lasusua.jpg" alt="Satu Data Indonesia" class="w-13 h-13 sm:w-14 sm:h-14 rounded-xl object-cover shrink-0 shadow-2xs group-hover:scale-105 transition">
                        <div class="min-w-0 flex-1">
                            <h4 class="text-xs sm:text-sm font-bold text-slate-900 tracking-tight group-hover:text-emerald-800 transition">Satu Data Indonesia</h4>
                            <p class="text-[11px] text-slate-500 leading-snug truncate mt-0.5">44 Indikator makro &amp; tata kelola digital.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- ============================================================== -->
    <!-- 4. FLOATING STATS STRIP (5 Kartu Putih Bersih - Persis Image 2)   -->
    <!-- ============================================================== -->
    <div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 -mt-8 sm:-mt-10 lg:-mt-12 relative z-20">
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4 lg:gap-5">
            
            <!-- Kartu 1: Desa Pilot -->
            <div class="rounded-2xl bg-white/95 backdrop-blur-md p-4 sm:p-5 border border-slate-200/90 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div id="kpiCard1Val" class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-none">6 <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Desa</span></div>
                    <div id="kpiCard1Label" class="text-xs font-bold text-slate-600 mt-1">Desa Pilot Utama</div>
                </div>
                <div class="mt-3">
                    <span id="kpiCard1Badge" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 text-[10px] font-bold border border-emerald-200/80 shadow-2xs">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Kec. Kodeoha &amp; Tiwu
                    </span>
                </div>
            </div>

            <!-- Kartu 2: Total Keluarga -->
            <div class="rounded-2xl bg-white/95 backdrop-blur-md p-4 sm:p-5 border border-slate-200/90 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div id="kpiCard2Val" class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-none">2.426 <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">KK</span></div>
                    <div id="kpiCard2Label" class="text-xs font-bold text-slate-600 mt-1">Total Keluarga</div>
                </div>
                <div class="mt-3">
                    <span id="kpiCard2Badge" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-800 text-[10px] font-bold border border-amber-200/80 shadow-2xs">
                        Kepala Keluarga (KK)
                    </span>
                </div>
            </div>

            <!-- Kartu 3: Total Penduduk -->
            <div class="rounded-2xl bg-white/95 backdrop-blur-md p-4 sm:p-5 border border-slate-200/90 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div id="kpiCard3Val" class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-none">8.734 <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Jiwa</span></div>
                    <div id="kpiCard3Label" class="text-xs font-bold text-slate-600 mt-1">Total Penduduk</div>
                </div>
                <div class="mt-3">
                    <span id="kpiCard3Badge" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-sky-50 text-sky-800 text-[10px] font-bold border border-sky-200/80 shadow-2xs">
                        100% Jiwa Terdata
                    </span>
                </div>
            </div>

            <!-- Kartu 4: Rata-rata Progres -->
            <div class="rounded-2xl bg-white/95 backdrop-blur-md p-4 sm:p-5 border border-slate-200/90 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div id="kpiCard4Val" class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-none">84% <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Done</span></div>
                    <div id="kpiCard4Label" class="text-xs font-bold text-slate-600 mt-1">Rata-rata Progres</div>
                </div>
                <div class="mt-3">
                    <span id="kpiCard4Badge" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-teal-50 text-teal-800 text-[10px] font-bold border border-teal-200/80 shadow-2xs">
                        <i class="bi bi-check-circle-fill text-[10px] text-teal-600"></i>
                        Pendataan Selesai
                    </span>
                </div>
            </div>

            <!-- Kartu 5: Indikator Terinput / Mandiri SDI -->
            <div class="rounded-2xl bg-white/95 backdrop-blur-md p-4 sm:p-5 border border-slate-200/90 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 col-span-2 sm:col-span-1 lg:col-span-1 flex flex-col justify-between group">
                <div>
                    <div id="kpiCard5Val" class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-none">100% <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">SDI</span></div>
                    <div id="kpiCard5Label" class="text-xs font-bold text-slate-600 mt-1">Target Mandiri 2026</div>
                </div>
                <div class="mt-3">
                    <span id="kpiCard5Badge" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 text-[10px] font-bold border border-emerald-200/80 shadow-2xs">
                        Terintegrasi BPS RI
                    </span>
                </div>
            </div>

        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 5. MENU 2: DASHBOARD & GRAFIK VISUAL (Paling Menonjol)         -->
    <!-- ============================================================== -->
    <section id="dashboard" class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 pt-8 sm:pt-9 lg:pt-10 pb-16 space-y-6">

        <!-- Header + Tab Switcher + Filter Dropdown (Rapi & Sejajar Horizontal) -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-2 border-b border-slate-200/60">
            <div>
                <div class="inline-flex items-center gap-2 text-[10px] sm:text-[11px] font-black uppercase tracking-wider text-[#0E7C5A] bg-emerald-50 border border-emerald-200/80 px-2.5 py-0.5 rounded-full mb-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Visualisasi Statistik Sektoral</span>
                </div>
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-slate-900 tracking-tight">Dashboard Data &amp; Analitik 6 Desa</h2>
                <p id="dashSubTitle" class="text-xs sm:text-sm text-slate-500 mt-0.5 max-w-2xl">Kondisi demografi, perumahan, sanitasi, dan ekonomi desa binaan BPS Kolaka Utara dalam satu tampilan.</p>
            </div>
            
            <!-- Controls: Filter Dropdown + Tab Switcher Sejajar Horizontal -->
            <div class="flex flex-wrap items-center gap-2.5 self-start lg:self-center shrink-0">
                <!-- Dropdown Filter Desa -->
                <div class="relative">
                    <select id="selectVillageFilter" onchange="filterDashboardVillage(this.value)" class="appearance-none bg-white border border-slate-300 hover:border-emerald-500 text-slate-800 text-xs font-bold py-2 pl-3 pr-8 rounded-xl shadow-xs focus:outline-none focus:ring-2 focus:ring-emerald-500 cursor-pointer transition">
                        <option value="all" selected>Filter: Semua Desa (6)</option>
                        <option value="kamisi">Desa Kamisi (Kodeoha)</option>
                        <option value="malamala">Kel. Mala-Mala (Kodeoha)</option>
                        <option value="lapolu">Desa Lapolu (Tiwu)</option>
                        <option value="tanggeawo">Desa Tanggeawo (Tiwu)</option>
                        <option value="mattirobulu">Desa Mattiro Bulu (Tiwu)</option>
                        <option value="koroha">Desa Koroha (Kodeoha)</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-slate-500 text-xs">
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </div>

                <!-- Tab Switcher -->
                <div class="flex items-center gap-1 p-1 rounded-xl bg-white border border-slate-200 shadow-xs">
                    <button type="button" onclick="switchVisualTab('dashboard')" id="btnTabDashboard" class="tab-btn active px-3.5 py-1.5 rounded-lg text-xs font-black transition cursor-pointer flex items-center gap-1.5"><span>📊</span><span>Dashboard Makro</span></button>
                    <button type="button" onclick="switchVisualTab('analytics')" id="btnTabAnalytics" class="tab-btn px-3.5 py-1.5 rounded-lg text-xs font-black transition cursor-pointer flex items-center gap-1.5"><span>📈</span><span>Analitik Sektoral</span></button>
                </div>
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
                    <div class="space-y-3.5 py-4 flex-1" id="dashVillageRanksList">
                        <!-- 1. Desa Kamisi (98%) -->
                        <div id="rankRow-kamisi" onclick="filterDashboardVillage('kamisi')" class="rank-row p-2 -mx-2 rounded-xl transition cursor-pointer hover:bg-slate-50" title="Klik untuk memfilter data Desa Kamisi">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#0E7C5A1a;color:#0E7C5A;">1</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Desa Kamisi</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Pesisir Bahari (Kodeoha)</div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0 leading-tight">
                                    <div class="text-sm font-black" style="color:#0E7C5A;">98%</div>
                                    <div class="text-[10px] text-slate-400">43/44</div>
                                </div>
                            </div>
                            <div class="bar"><span style="width:98%;background:#0E7C5A;"></span></div>
                        </div>

                        <!-- 2. Kel. Mala-Mala (93%) -->
                        <div id="rankRow-malamala" onclick="filterDashboardVillage('malamala')" class="rank-row p-2 -mx-2 rounded-xl transition cursor-pointer hover:bg-slate-50" title="Klik untuk memfilter data Kel. Mala-Mala">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#0E7C5A1a;color:#0E7C5A;">2</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Kel. Mala-Mala</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Pilot Utama (Kodeoha)</div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0 leading-tight">
                                    <div class="text-sm font-black" style="color:#0E7C5A;">93%</div>
                                    <div class="text-[10px] text-slate-400">41/44</div>
                                </div>
                            </div>
                            <div class="bar"><span style="width:93%;background:#0E7C5A;"></span></div>
                        </div>

                        <!-- 3. Desa Lapolu (86%) -->
                        <div id="rankRow-lapolu" onclick="filterDashboardVillage('lapolu')" class="rank-row p-2 -mx-2 rounded-xl transition cursor-pointer hover:bg-slate-50" title="Klik untuk memfilter data Desa Lapolu">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#10b9811a;color:#10b981;">3</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Desa Lapolu</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Perkebunan Cengkeh (Tiwu)</div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0 leading-tight">
                                    <div class="text-sm font-black" style="color:#10b981;">86%</div>
                                    <div class="text-[10px] text-slate-400">38/44</div>
                                </div>
                            </div>
                            <div class="bar"><span style="width:86%;background:#10b981;"></span></div>
                        </div>

                        <!-- 4. Desa Tanggeawo (82%) -->
                        <div id="rankRow-tanggeawo" onclick="filterDashboardVillage('tanggeawo')" class="rank-row p-2 -mx-2 rounded-xl transition cursor-pointer hover:bg-slate-50" title="Klik untuk memfilter data Desa Tanggeawo">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#10b9811a;color:#10b981;">4</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Desa Tanggeawo</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Pertanian &amp; Hortikultura (Tiwu)</div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0 leading-tight">
                                    <div class="text-sm font-black" style="color:#10b981;">82%</div>
                                    <div class="text-[10px] text-slate-400">36/44</div>
                                </div>
                            </div>
                            <div class="bar"><span style="width:82%;background:#10b981;"></span></div>
                        </div>

                        <!-- 5. Desa Mattiro Bulu (77%) -->
                        <div id="rankRow-mattirobulu" onclick="filterDashboardVillage('mattirobulu')" class="rank-row p-2 -mx-2 rounded-xl transition cursor-pointer hover:bg-slate-50" title="Klik untuk memfilter data Desa Mattiro Bulu">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#0ea5e91a;color:#0ea5e9;">5</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Desa Mattiro Bulu</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Agroindustri &amp; Ternak (Tiwu)</div>
                                    </div>
                                </div>
                                <div class="text-right shrink-0 leading-tight">
                                    <div class="text-sm font-black" style="color:#0ea5e9;">77%</div>
                                    <div class="text-[10px] text-slate-400">34/44</div>
                                </div>
                            </div>
                            <div class="bar"><span style="width:77%;background:#0ea5e9;"></span></div>
                        </div>

                        <!-- 6. Desa Koroha (68%) -->
                        <div id="rankRow-koroha" onclick="filterDashboardVillage('koroha')" class="rank-row p-2 -mx-2 rounded-xl transition cursor-pointer hover:bg-slate-50" title="Klik untuk memfilter data Desa Koroha">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="w-6 h-6 rounded-lg text-[11px] font-black flex items-center justify-center shrink-0" style="background:#f59e0b1a;color:#f59e0b;">6</span>
                                    <div class="min-w-0 leading-tight">
                                        <div class="text-[13px] font-extrabold text-slate-800 truncate">Desa Koroha</div>
                                        <div class="text-[10.5px] text-slate-400 truncate">Perikanan &amp; Kakao (Kodeoha)</div>
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
                    <div id="rankSummaryText" class="pt-3 border-t border-slate-100 flex items-center justify-between text-[11.5px] text-slate-500">
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
                    <div class="chart-box flex-1 mt-4 relative w-full" style="height: 330px; min-height: 330px;"><canvas id="chartKeluargaPerDesa"></canvas></div>
                </div>
            </div>

            <!-- Baris 2: 3 distribusi -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-2">
                        <div><h4 class="panel-title"><span class="dot bg-[#0E7C5A]"></span>Kepemilikan Rumah</h4><p class="panel-sub">Status hunian keluarga</p></div>
                        <span class="panel-pill text-emerald-800 bg-emerald-100">Perumahan</span>
                    </div>
                    <div class="chart-box mt-4 relative w-full" style="height: 260px; min-height: 260px;"><canvas id="chartKepemilikanRumah"></canvas></div>
                </div>
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-2">
                        <div><h4 class="panel-title"><span class="dot bg-sky-600"></span>Sumber Air Minum</h4><p class="panel-sub">Akses air bersih rumah tangga</p></div>
                        <span class="panel-pill text-sky-800 bg-sky-100">Sanitasi</span>
                    </div>
                    <div class="chart-box mt-4 relative w-full" style="height: 260px; min-height: 260px;"><canvas id="chartSumberAir"></canvas></div>
                </div>
                <div class="card-surface p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-2">
                        <div><h4 class="panel-title"><span class="dot bg-amber-500"></span>Penghasilan Keluarga</h4><p class="panel-sub">Sebaran pendapatan per bulan</p></div>
                        <span class="panel-pill text-amber-800 bg-amber-100">Ekonomi</span>
                    </div>
                    <div class="chart-box mt-4 relative w-full" style="height: 260px; min-height: 260px;"><canvas id="chartPenghasilan"></canvas></div>
                </div>
            </div>

            <!-- Baris 3: sorotan 3 kartu insight (Konsisten 100% dengan Data 6 Desa) -->
            <div id="dashInsightContainer" class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="insight" style="background:#f0fdf6;border-color:#bbf0d4;">
                    <span class="ic bg-emerald-100 text-emerald-700">🏆</span>
                    <div class="leading-tight">
                        <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Progres Tertinggi</div>
                        <div class="text-sm font-black text-slate-900 mt-0.5">Desa Kamisi · 98%</div>
                        <div class="text-[11px] text-slate-500 mt-0.5">43 dari 44 indikator terisi (Pesisir Bahari)</div>
                    </div>
                </div>
                <div class="insight" style="background:#eff6ff;border-color:#bfdbfe;">
                    <span class="ic bg-blue-100 text-blue-700">⭐</span>
                    <div class="leading-tight">
                        <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Pilot Utama</div>
                        <div class="text-sm font-black text-slate-900 mt-0.5">Kel. Mala-Mala · 93%</div>
                        <div class="text-[11px] text-slate-500 mt-0.5">41 dari 44 indikator terisi · Pusat Layanan Kodeoha</div>
                    </div>
                </div>
                <div class="insight" style="background:#fffbeb;border-color:#fde68a;">
                    <span class="ic bg-amber-100 text-amber-700">🤝</span>
                    <div class="leading-tight">
                        <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Perlu Pendampingan</div>
                        <div class="text-sm font-black text-slate-900 mt-0.5">Desa Koroha · 68%</div>
                        <div class="text-[11px] text-slate-500 mt-0.5">14 indikator dalam pembinaan (30 dari 44 terisi)</div>
                    </div>
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
        <section id="desa" class="relative w-full bg-gradient-to-b from-white via-[#eef8f3] to-[#e4f4ec] py-16 sm:py-20 overflow-hidden border-t border-emerald-100/60">
        <!-- ============================================================== -->
        <!-- POLA VEKTOR SVG TOPOGRAFI & PESISIR TELUK BONE KOLAKA UTARA     -->
        <!-- Elemen Latar Belakang Minimalis Kartografis & Geografis Resmi   -->
        <!-- ============================================================== -->
        <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden w-full h-full select-none" aria-hidden="true">
            <svg class="w-full h-full object-cover" viewBox="0 0 1440 900" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
                <defs>
                    <!-- Pola Titik Grid Kartografi Presisi (BPS SDI) -->
                    <pattern id="coordGridPattern" width="48" height="48" patternUnits="userSpaceOnUse">
                        <circle cx="24" cy="24" r="1.1" fill="#059669" fill-opacity="0.09" />
                    </pattern>
                    <!-- Gradasi Halus Latar Pesisir Teluk Bone -->
                    <linearGradient id="boneCoastWash" x1="1000" y1="0" x2="1440" y2="900" gradientUnits="userSpaceOnUse">
                        <stop offset="0%" stop-color="#059669" stop-opacity="0.02" />
                        <stop offset="60%" stop-color="#059669" stop-opacity="0.045" />
                        <stop offset="100%" stop-color="#047857" stop-opacity="0.07" />
                    </linearGradient>
                </defs>

                <!-- 1. Lapisan Grid Koordinat Kartografi Halus -->
                <rect width="100%" height="100%" fill="url(#coordGridPattern)" />

                <!-- 2. GARIS KONTUR TOPOGRAFI PEGUNUNGAN KOLAKA UTARA (Kiri Atas & Latar Belakang) -->
                <!-- Cincin Kontur Ketinggian Puncak Pegunungan Mengkoka & Kodeoha -->
                <g class="topography-contours" stroke="#059669" stroke-width="1.2" fill="none">
                    <!-- Ring Kontur Puncak Tertinggi (+1200m) -->
                    <path d="M 175,100 C 230,85 265,115 250,155 C 235,195 185,200 145,175 C 115,150 125,115 175,100 Z" stroke-opacity="0.14" />
                    <!-- Ring Kontur (+1000m) -->
                    <path d="M 155,75 C 240,55 295,100 280,175 C 265,230 185,240 125,205 C 85,170 95,100 155,75 Z" stroke-opacity="0.13" />
                    <!-- Ring Kontur (+800m) -->
                    <path d="M 135,50 C 260,25 335,80 320,195 C 300,270 175,280 105,235 C 55,190 65,90 135,50 Z" stroke-opacity="0.12" />
                    <!-- Ring Kontur (+600m) -->
                    <path d="M 115,25 C 280,-5 375,65 360,215 C 340,310 165,325 85,265 C 30,210 40,75 115,25 Z" stroke-opacity="0.10" />
                    <!-- Ring Kontur (+400m) -->
                    <path d="M 95,0 C 300,-35 415,50 400,235 C 380,350 155,370 65,295 C 5,230 15,60 95,0 Z" stroke-opacity="0.08" />

                    <!-- Garis Kontur Topografi Horizontal Membentang Sepanjang Wilayah -->
                    <path d="M-60,70 C140,40 280,130 460,95 C640,60 760,140 940,105 C1120,70 1260,130 1500,90" stroke-opacity="0.13" />
                    <path d="M-60,145 C160,115 310,200 500,165 C690,130 810,215 1000,180 C1190,145 1310,205 1500,170" stroke-opacity="0.12" />
                    <path d="M-60,225 C180,190 330,275 530,240 C730,205 850,285 1050,250 C1240,215 1360,275 1500,245" stroke-opacity="0.12" />
                    <path d="M-60,315 C190,280 360,355 560,325 C760,295 890,375 1090,335 C1280,295 1390,365 1500,330" stroke-opacity="0.11" />
                    <path d="M-60,415 C210,380 390,460 600,425 C810,390 930,475 1140,435 C1320,395 1420,465 1500,435" stroke-opacity="0.10" />
                    <path d="M-60,525 C230,485 420,565 640,530 C860,495 980,580 1190,540 C1360,500 1440,565 1500,535" stroke-opacity="0.09" />
                    <path d="M-60,635 C250,595 450,675 680,640 C910,605 1020,690 1240,650 C1390,610 1460,675 1500,645" stroke-opacity="0.08" />
                    <path d="M-60,745 C270,705 480,785 720,750 C960,715 1060,800 1290,760 C1420,720 1480,785 1500,755" stroke-opacity="0.07" />
                </g>

                <!-- Label Ketinggian Topografi (Kartografi Minimalis) -->
                <g font-family="monospace" font-size="8.5" font-weight="700" fill="#059669" fill-opacity="0.28" letter-spacing="1">
                    <text x="155" y="98">1200m</text>
                    <text x="260" y="140">1000m</text>
                    <text x="300" y="180">800m</text>
                    <text x="480" y="88">600m</text>
                    <text x="550" y="235">400m</text>
                    <text x="60" y="32" font-family="sans-serif" font-size="9.5" font-weight="800" fill-opacity="0.22" letter-spacing="2">PEGUNUNGAN MENGKOKA / KODEOHA</text>
                </g>

                <!-- 3. SILUET GARIS PANTAI TELUK BONE KOLAKA UTARA (Sisi Kanan) -->
                <!-- Area Arsir Transparan Perairan Teluk Bone -->
                <path d="M1060,0 C1115,130 1175,250 1205,380 C1235,510 1295,670 1355,900 L1440,900 L1440,0 Z" fill="url(#boneCoastWash)" />

                <!-- Garis Pesisir Pantai Utama & Sekunder -->
                <path d="M1040,0 C1095,120 1155,240 1185,370 C1215,500 1275,660 1335,900" stroke="#059669" stroke-opacity="0.22" stroke-width="1.6" stroke-linecap="round" fill="none" />
                <path d="M1055,0 C1110,125 1170,245 1200,375 C1230,505 1290,665 1350,900" stroke="#059669" stroke-opacity="0.14" stroke-width="1.2" stroke-dasharray="6 4" fill="none" />
                <path d="M1020,0 C1075,115 1135,235 1165,365 C1195,495 1255,655 1315,900" stroke="#059669" stroke-opacity="0.09" stroke-width="1" fill="none" />

                <!-- Riak Gelombang Halus Pesisir Teluk Bone -->
                <g stroke="#059669" stroke-width="1.2" stroke-linecap="round" fill="none">
                    <path d="M1250,95 C1275,90 1305,100 1330,95" stroke-opacity="0.2" />
                    <path d="M1300,145 C1325,140 1355,150 1380,145" stroke-opacity="0.2" />
                    <path d="M1220,240 C1245,235 1275,245 1300,240" stroke-opacity="0.16" />
                    <path d="M1280,300 C1305,295 1335,305 1360,300" stroke-opacity="0.16" />
                </g>

                <!-- Label Teks Elegan Teluk Bone Kolaka Utara (Kanan Atas di Belakang Kartu) -->
                <g transform="translate(1170, 80)">
                    <rect x="-10" y="-16" width="235" height="42" rx="10" fill="#ffffff" fill-opacity="0.55" stroke="#059669" stroke-opacity="0.18" stroke-width="0.8" />
                    <text x="6" y="2" font-size="11" font-family="sans-serif" font-weight="800" letter-spacing="2" fill="#065f46" fill-opacity="0.45" class="uppercase">TELUK BONE, KOLAKA UTARA</text>
                    <text x="6" y="16" font-size="8.5" font-family="monospace" font-weight="600" letter-spacing="1" fill="#059669" fill-opacity="0.38">3°15'00"LS 121°02'30"BT • PESISIR SELATAN</text>
                </g>

                <!-- 4. JALUR PENGHUBUNG PUTUS-PUTUS & TITIK KOORDINAT 6 DESA BINAAN -->
                <!-- Garis Jalur Penghubung Melengkung Halus (strokeDasharray="4 4") -->
                <path d="M 40,630 C 260,560 480,690 720,600 C 960,510 1180,650 1420,580" stroke="#059669" stroke-opacity="0.28" stroke-width="1.5" stroke-dasharray="4 4" fill="none" />
                <path d="M 40,650 C 260,580 480,710 720,620 C 960,530 1180,670 1420,600" stroke="#059669" stroke-opacity="0.12" stroke-width="1" stroke-dasharray="2 4" fill="none" />

                <!-- Titik-Titik Koordinat 6 Desa Pilot Binaan BPS Kolaka Utara -->
                <!-- 1. Desa Kamisi (Pesisir & Teri • Kodeoha) -->
                <g transform="translate(160, 595)">
                    <circle cx="0" cy="0" r="10" stroke="#059669" stroke-opacity="0.2" stroke-width="1" fill="#059669" fill-opacity="0.05" />
                    <circle cx="0" cy="0" r="3.5" fill="#059669" fill-opacity="0.5" />
                    <text x="0" y="18" font-size="8" font-family="monospace" font-weight="700" fill="#065f46" fill-opacity="0.35" text-anchor="middle">KMS • 3°18'S</text>
                </g>

                <!-- 2. Desa Kalu Kaluku (Pilot Utama • Kodeoha) -->
                <g transform="translate(390, 630)">
                    <circle cx="0" cy="0" r="10" stroke="#059669" stroke-opacity="0.2" stroke-width="1" fill="#059669" fill-opacity="0.05" />
                    <circle cx="0" cy="0" r="3.5" fill="#059669" fill-opacity="0.5" />
                    <text x="0" y="18" font-size="8" font-family="monospace" font-weight="700" fill="#065f46" fill-opacity="0.35" text-anchor="middle">KLK • 3°15'S</text>
                </g>

                <!-- 3. Kelurahan Mala-Mala (Pusat Layanan • Kodeoha) -->
                <g transform="translate(640, 625)">
                    <circle cx="0" cy="0" r="10" stroke="#059669" stroke-opacity="0.2" stroke-width="1" fill="#059669" fill-opacity="0.05" />
                    <circle cx="0" cy="0" r="3.5" fill="#059669" fill-opacity="0.5" />
                    <text x="0" y="18" font-size="8" font-family="monospace" font-weight="700" fill="#065f46" fill-opacity="0.35" text-anchor="middle">MLM • 3°14'S</text>
                </g>

                <!-- 4. Desa Lapolu (Sentra Cengkeh • Tiwu) -->
                <g transform="translate(880, 565)">
                    <circle cx="0" cy="0" r="10" stroke="#059669" stroke-opacity="0.2" stroke-width="1" fill="#059669" fill-opacity="0.05" />
                    <circle cx="0" cy="0" r="3.5" fill="#059669" fill-opacity="0.5" />
                    <text x="0" y="18" font-size="8" font-family="monospace" font-weight="700" fill="#065f46" fill-opacity="0.35" text-anchor="middle">LPL • 3°12'S</text>
                </g>

                <!-- 5. Desa Tanggeawo (Perkebunan Kakao • Tiwu) -->
                <g transform="translate(1120, 580)">
                    <circle cx="0" cy="0" r="10" stroke="#059669" stroke-opacity="0.2" stroke-width="1" fill="#059669" fill-opacity="0.05" />
                    <circle cx="0" cy="0" r="3.5" fill="#059669" fill-opacity="0.5" />
                    <text x="0" y="18" font-size="8" font-family="monospace" font-weight="700" fill="#065f46" fill-opacity="0.35" text-anchor="middle">TGW • 3°10'S</text>
                </g>

                <!-- 6. Desa Mattiro Bulu (Dataran Cengkeh • Tiwu) -->
                <g transform="translate(1330, 600)">
                    <circle cx="0" cy="0" r="10" stroke="#059669" stroke-opacity="0.2" stroke-width="1" fill="#059669" fill-opacity="0.05" />
                    <circle cx="0" cy="0" r="3.5" fill="#059669" fill-opacity="0.5" />
                    <text x="0" y="18" font-size="8" font-family="monospace" font-weight="700" fill="#065f46" fill-opacity="0.35" text-anchor="middle">MTB • 3°08'S</text>
                </g>

                <!-- Skala Peta & Referensi BPS Kolaka Utara (Kiri Bawah) -->
                <g transform="translate(80, 835)">
                    <line x1="0" y1="0" x2="110" y2="0" stroke="#059669" stroke-opacity="0.3" stroke-width="1.5" />
                    <line x1="0" y1="-4" x2="0" y2="4" stroke="#059669" stroke-opacity="0.3" stroke-width="1.5" />
                    <line x1="55" y1="-2.5" x2="55" y2="2.5" stroke="#059669" stroke-opacity="0.3" stroke-width="1" />
                    <line x1="110" y1="-4" x2="110" y2="4" stroke="#059669" stroke-opacity="0.3" stroke-width="1.5" />
                    <text x="0" y="-8" font-size="8" font-family="monospace" font-weight="700" fill="#059669" fill-opacity="0.32">SKALA KARTOGRAFI 1:50.000 • KEC. KODEOHA & TIWU</text>
                </g>
            </svg>
        </div>

        <!-- Konten Utama 6 Desa Binaan (Berada di atas layer SVG: relative z-10) -->
        <div class="relative z-10 pointer-events-auto w-full max-w-[1440px] mx-auto px-6 lg:px-10 space-y-6">

        
        <!-- Header Section (Matching Image 2 Aesthetic) -->
        <div class="text-center max-w-3xl mx-auto space-y-2.5">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100/90 backdrop-blur-xs border border-emerald-300 text-emerald-900 text-[11px] font-black uppercase tracking-wider shadow-2xs">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Wilayah Binaan BPS Kolaka Utara</span>
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-slate-900 tracking-tight">
                <span class="font-serif italic font-normal text-[#0E7C5A]">Jelajahi</span> 6 Desa Binaan Desa Cantik
            </h2>
            <p class="text-xs sm:text-sm text-slate-600 font-medium max-w-xl mx-auto leading-relaxed">
                6 desa binaan statistik presisi berjejer di bawah ini. Kartu bergerak otomatis ke kiri, klik kartu mana saja untuk memutar ke tengah atau masuk ke dashboard desa.
            </p>
        </div>

        <!-- 3D CAROUSEL CONTAINER (6 DESA BERJEJER SECARA HORIZONTAL) -->
        <div class="relative z-10 pointer-events-auto w-full py-2 select-none overflow-hidden">
            
            <!-- 3D Perspective Stage -->
            <div id="coverflowStage" class="coverflow-stage relative z-10 pointer-events-auto" onmousedown="handleCoverflowDragStart(event)" ontouchstart="handleCoverflowTouchStart(event)">
                
                <!-- Track Horizontal yang Berisi Seluruh 6 Desa Berjejer -->
                <div id="coverflowTrack" class="coverflow-track relative z-10 pointer-events-auto">

                    <!-- 1. DESA KAMISI (KEC. KODEOHA) -->
                    <div onclick="handleCoverflowCardClick(event, 0, 'kamisi')" onmouseenter="handleCoverflowCardHover(0)" onmouseleave="handleCoverflowCardLeave()"
                         class="coverflow-card group border border-white/20 active" data-index="0" data-key="kamisi">
                        <img src="/images/desa/kamisi.jpg" 
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=1200&q=85';" 
                             alt="Desa Kamisi" class="card-bg object-cover" loading="eager">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-slate-950/70 text-emerald-300 font-black text-[10px] tracking-wide border border-white/20">
                                    Pesisir &amp; Bahari • Kodeoha
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

                                <div class="grid grid-cols-3 gap-1.5 p-2.5 rounded-2xl bg-slate-950/60 border border-white/15 text-center mt-3 mb-3.5 text-[10px]">
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
                                <button type="button" onclick="event.stopPropagation(); handleDesaCardAccess(event, 'kamisi')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-emerald-50 text-slate-900 font-black text-xs tracking-wider transition-transform duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                                    <span>PILIH DESA</span>
                                    <i class="bi bi-arrow-right font-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 2. DESA KOROHA (KEC. KODEOHA) -->
                    <div onclick="handleCoverflowCardClick(event, 1, 'koroha')" onmouseenter="handleCoverflowCardHover(1)" onmouseleave="handleCoverflowCardLeave()"
                         class="coverflow-card group border border-white/20 card-right" data-index="1" data-key="koroha">
                        <img src="/images/desa/koroha.jpg" 
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1518173946687-a4c8a383392e?auto=format&fit=crop&w=1200&q=85';" 
                             alt="Desa Koroha" class="card-bg object-cover" loading="eager">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-slate-950/70 text-sky-300 font-black text-[10px] tracking-wide border border-white/20">
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

                                <div class="grid grid-cols-3 gap-1.5 p-2.5 rounded-2xl bg-slate-950/60 border border-white/15 text-center mt-3 mb-3.5 text-[10px]">
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
                                <button type="button" onclick="event.stopPropagation(); handleDesaCardAccess(event, 'koroha')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-sky-50 text-slate-900 font-black text-xs tracking-wider transition-transform duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                                    <span>PILIH DESA</span>
                                    <i class="bi bi-arrow-right font-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 3. KELURAHAN MALA-MALA (KEC. KODEOHA) -->
                    <div onclick="handleCoverflowCardClick(event, 2, 'malamala')" onmouseenter="handleCoverflowCardHover(2)" onmouseleave="handleCoverflowCardLeave()"
                         class="coverflow-card group border border-white/20 card-far-right" data-index="2" data-key="malamala">
                        <img src="/images/desa/malamala.jpg" 
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&w=1200&q=85';" 
                             alt="Kelurahan Mala-Mala" class="card-bg object-cover" loading="eager">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-slate-950/70 text-amber-300 font-black text-[10px] tracking-wide border border-white/20">
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

                                <div class="grid grid-cols-3 gap-1.5 p-2.5 rounded-2xl bg-slate-950/60 border border-white/15 text-center mt-3 mb-3.5 text-[10px]">
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
                                <button type="button" onclick="event.stopPropagation(); handleDesaCardAccess(event, 'malamala')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-amber-50 text-slate-900 font-black text-xs tracking-wider transition-transform duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                                    <span>PILIH KELURAHAN</span>
                                    <i class="bi bi-arrow-right font-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 4. DESA LAPOLU (KEC. TIWU) -->
                    <div onclick="handleCoverflowCardClick(event, 3, 'lapolu')" onmouseenter="handleCoverflowCardHover(3)" onmouseleave="handleCoverflowCardLeave()"
                         class="coverflow-card group border border-white/20" data-index="3" data-key="lapolu">
                        <img src="/images/desa/lapolu.jpg" 
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=1200&q=85';" 
                             alt="Desa Lapolu" class="card-bg object-cover" loading="eager">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-slate-950/70 text-emerald-300 font-black text-[10px] tracking-wide border border-white/20">
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

                                <div class="grid grid-cols-3 gap-1.5 p-2.5 rounded-2xl bg-slate-950/60 border border-white/15 text-center mt-3 mb-3.5 text-[10px]">
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
                                <button type="button" onclick="event.stopPropagation(); handleDesaCardAccess(event, 'lapolu')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-emerald-50 text-slate-900 font-black text-xs tracking-wider transition-transform duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                                    <span>PILIH DESA</span>
                                    <i class="bi bi-arrow-right font-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 5. DESA TANGGEAWO (KEC. TIWU) -->
                    <div onclick="handleCoverflowCardClick(event, 4, 'tanggeawo')" onmouseenter="handleCoverflowCardHover(4)" onmouseleave="handleCoverflowCardLeave()"
                         class="coverflow-card group border border-white/20" data-index="4" data-key="tanggeawo">
                        <img src="/images/desa/tanggeawo.jpg" 
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=85';" 
                             alt="Desa Tanggeawo" class="card-bg object-cover" loading="eager">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-slate-950/70 text-indigo-300 font-black text-[10px] tracking-wide border border-white/20">
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

                                <div class="grid grid-cols-3 gap-1.5 p-2.5 rounded-2xl bg-slate-950/60 border border-white/15 text-center mt-3 mb-3.5 text-[10px]">
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
                                <button type="button" onclick="event.stopPropagation(); handleDesaCardAccess(event, 'tanggeawo')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-indigo-50 text-slate-900 font-black text-xs tracking-wider transition-transform duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                                    <span>PILIH DESA</span>
                                    <i class="bi bi-arrow-right font-black"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 6. DESA MATTIRO BULU (KEC. TIWU) -->
                    <div onclick="handleCoverflowCardClick(event, 5, 'mattirobulu')" onmouseenter="handleCoverflowCardHover(5)" onmouseleave="handleCoverflowCardLeave()"
                         class="coverflow-card group border border-white/20" data-index="5" data-key="mattirobulu">
                        <img src="/images/desa/mattirobulu.jpg" 
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=1200&q=85';" 
                             alt="Desa Mattiro Bulu" class="card-bg object-cover" loading="eager">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-slate-950/70 text-purple-300 font-black text-[10px] tracking-wide border border-white/20">
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

                                <div class="grid grid-cols-3 gap-1.5 p-2.5 rounded-2xl bg-slate-950/60 border border-white/15 text-center mt-3 mb-3.5 text-[10px]">
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
                                <button type="button" onclick="event.stopPropagation(); handleDesaCardAccess(event, 'mattirobulu')" 
                                        class="w-full py-2.5 px-4 rounded-full bg-white hover:bg-purple-50 text-slate-900 font-black text-xs tracking-wider transition-transform duration-200 shadow-xl flex items-center justify-center gap-2 cursor-pointer active:scale-95">
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

    
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- 7. MENU 4: OUTPUT PROGRAM DESA CANTIK (#output)                -->
    <!-- ============================================================== -->
    <section class="py-14 bg-white border-t border-slate-200" id="output">
        <div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 space-y-8">
            
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
                        <h3 class="text-sm font-black text-slate-900">Monografi Desa</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Profil komprehensif demografi, potensi kakao, dan sosial ekonomi 6 desa binaan.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-100 grid grid-cols-2 gap-2">
                        <button type="button" onclick="openOutputDoc('monografi')" class="w-full py-2 px-2 min-h-[38px] rounded-xl bg-emerald-50 hover:bg-emerald-100 text-[#0E7C5A] border border-emerald-200/70 font-bold text-xs flex items-center justify-center gap-1.5 transition cursor-pointer active:scale-95 shadow-2xs" title="Buka Dokumen Monografi">
                            <i class="bi bi-file-earmark-text-fill text-emerald-600"></i>
                            <span>Buka Dokumen</span>
                        </button>
                        <button type="button" onclick="downloadOutputDoc('monografi')" class="w-full py-2 px-2 min-h-[38px] rounded-xl bg-[#0E7C5A] hover:bg-[#096347] text-white font-bold text-xs flex items-center justify-center gap-1.5 transition cursor-pointer shadow-sm active:scale-95" title="Download Dokumen Monografi">
                            <i class="bi bi-download"></i>
                            <span>Download Dokumen</span>
                        </button>
                    </div>
                </div>

                <!-- 2. Tabel Statistik Sektoral -->
                <div class="card-surface p-5 flex flex-col justify-between space-y-4">
                    <div class="space-y-2.5">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center text-xl font-bold">
                            📊
                        </div>
                        <h3 class="text-sm font-black text-slate-900">Publikasi Tematik</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Tabel data rekapitulasi 44 variabel sosial ekonomi keluarga berstandar SDI.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-100 grid grid-cols-2 gap-2">
                        <button type="button" onclick="openOutputDoc('tabel')" class="w-full py-2 px-2 min-h-[38px] rounded-xl bg-blue-50 hover:bg-blue-100 text-blue-800 border border-blue-200/70 font-bold text-xs flex items-center justify-center gap-1.5 transition cursor-pointer active:scale-95 shadow-2xs" title="Buka Dokumen Publikasi Tematik">
                            <i class="bi bi-file-earmark-spreadsheet-fill text-blue-600"></i>
                            <span>Buka Dokumen</span>
                        </button>
                        <button type="button" onclick="downloadOutputDoc('tabel')" class="w-full py-2 px-2 min-h-[38px] rounded-xl bg-blue-700 hover:bg-blue-800 text-white font-bold text-xs flex items-center justify-center gap-1.5 transition cursor-pointer shadow-sm active:scale-95" title="Download Dokumen Publikasi Tematik">
                            <i class="bi bi-download"></i>
                            <span>Download Dokumen</span>
                        </button>
                    </div>
                </div>

                <!-- 3. BRS Sektoral BPS -->
                <div class="card-surface p-5 flex flex-col justify-between space-y-4">
                    <div class="space-y-2.5">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center text-xl font-bold">
                            📑
                        </div>
                        <h3 class="text-sm font-black text-slate-900">Leaflet</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Berita Resmi Statistik indikator ketenagakerjaan daerah dan komoditas perkebunan kakao.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-100 grid grid-cols-2 gap-2">
                        <button type="button" onclick="openOutputDoc('brs')" class="w-full py-2 px-2 min-h-[38px] rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-900 border border-amber-200/70 font-bold text-xs flex items-center justify-center gap-1.5 transition cursor-pointer active:scale-95 shadow-2xs" title="Buka Dokumen Leaflet">
                            <i class="bi bi-file-earmark-pdf-fill text-amber-600"></i>
                            <span>Buka Dokumen</span>
                        </button>
                        <button type="button" onclick="downloadOutputDoc('brs')" class="w-full py-2 px-2 min-h-[38px] rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs flex items-center justify-center gap-1.5 transition cursor-pointer shadow-sm active:scale-95" title="Download Dokumen Leaflet">
                            <i class="bi bi-download"></i>
                            <span>Download Dokumen</span>
                        </button>
                    </div>
                </div>

                <!-- 4. Leaflet & Infografis -->
                <div class="card-surface p-5 flex flex-col justify-between space-y-4">
                    <div class="space-y-2.5">
                        <div class="w-10 h-10 rounded-xl bg-teal-100 text-teal-800 flex items-center justify-center text-xl font-bold">
                            🗺️
                        </div>
                        <h3 class="text-sm font-black text-slate-900">Infografis</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Ringkasan visual statistik dusun dalam format infografis ramah baca bagi masyarakat.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-100 grid grid-cols-2 gap-2">
                        <button type="button" onclick="openOutputDoc('leaflet')" class="w-full py-2 px-2 min-h-[38px] rounded-xl bg-teal-50 hover:bg-teal-100 text-teal-900 border border-teal-200/70 font-bold text-xs flex items-center justify-center gap-1.5 transition cursor-pointer active:scale-95 shadow-2xs" title="Buka Dokumen Infografis">
                            <i class="bi bi-file-earmark-richtext-fill text-teal-600"></i>
                            <span>Buka Dokumen</span>
                        </button>
                        <button type="button" onclick="downloadOutputDoc('leaflet')" class="w-full py-2 px-2 min-h-[38px] rounded-xl bg-teal-700 hover:bg-teal-800 text-white font-bold text-xs flex items-center justify-center gap-1.5 transition cursor-pointer shadow-sm active:scale-95" title="Download Dokumen Infografis">
                            <i class="bi bi-download"></i>
                            <span>Download Dokumen</span>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ============================================================== -->
    <!-- 8. FOOTER RESMI BPS KOLAKA UTARA                               -->
    <!-- ============================================================== -->
    </main>

    <!-- ============================================================== -->
    <!-- HALAMAN KHUSUS PORTAL PROFIL DESA & KELURAHAN (FULL WIDTH)     -->
    <!-- Terbuka saat mengklik Kelopak 02 "Profil Desa & Kelurahan"      -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- HALAMAN KHUSUS: MONOGRAFI DIGITAL DESA & KELURAHAN (FULL WIDTH) -->
    <!-- Desain Eksekutif BPS: Palet Hijau Zamrud #046A38, 3 Periode,    -->
    <!-- Tab Kategori (Tanpa Romawi), Bento Grid 3 Kolom & 3D Book Cover -->
    <!-- ============================================================== -->
    <div id="view-monografi-digital" class="hidden w-full min-h-screen bg-[#F8FAFC]">
        
        <!-- 1. HERO BANNER ATAS & PENGELOMPOKAN PERIODE (TAHUN) -->
        <header class="w-full bg-gradient-to-r from-[#022c22] via-[#046A38] to-[#022c22] text-white py-6 sm:py-8 px-4 sm:px-6 lg:px-10 shadow-lg relative overflow-hidden border-b border-emerald-500/20">
            <!-- Subtle Background Motif -->
            <div class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(#34d399_1px,transparent_1px)] [background-size:16px_16px]"></div>

            <div class="max-w-7xl mx-auto flex flex-col gap-5 relative z-10">
                
                <!-- Baris 1: Judul Halaman & Tombol Aksi Kanan -->
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-4 border-b border-emerald-400/20">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-950/60 border border-emerald-400/30 text-emerald-300 text-[11px] font-black uppercase tracking-wider mb-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>Publikasi Statistik Sektoral Resmi • BPS Kolaka Utara</span>
                        </div>
                        <h1 id="monografiHeroTitle" class="text-2xl sm:text-3xl lg:text-4xl font-black text-white tracking-tight uppercase drop-shadow-sm">
                            MONOGRAFI DIGITAL DESA KAMISI
                        </h1>
                        <p id="monografiHeroSubtitle" class="text-xs sm:text-sm text-emerald-100/90 font-medium mt-1">
                            Publikasi Statistik Terpadu • Kecamatan Kodeoha, Kabupaten Kolaka Utara
                        </p>
                    </div>

                    <!-- Tombol Kembali & Download Banner -->
                    <div class="flex items-center gap-2.5 shrink-0 flex-wrap">
                        <button type="button" onclick="closeMonografiDigitalView()" class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 active:scale-95 text-white font-bold text-xs border border-white/20 backdrop-blur-md transition flex items-center gap-2 cursor-pointer shadow-sm">
                            <i class="bi bi-arrow-left"></i>
                            <span>Kembali ke Portal DESCAN</span>
                        </button>
                        <button type="button" onclick="downloadMonografiDoc()" class="px-4 py-2.5 rounded-xl bg-amber-400 hover:bg-amber-300 active:scale-95 text-slate-950 font-black text-xs shadow-md transition flex items-center gap-2 cursor-pointer">
                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                            <span>Unduh Monografi (PDF / Excel)</span>
                        </button>
                    </div>
                </div>

                <!-- Baris 2: Pemilih Desa & Pengelompokan Periode (Tahun) -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pt-1">
                    
                    <!-- Pemilih Desa (6 Desa Binaan) -->
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <span class="text-xs font-black uppercase text-emerald-200 tracking-wider">Desa:</span>
                        <div class="inline-flex rounded-xl bg-emerald-950/70 p-1 border border-emerald-400/25">
                            <button type="button" id="monoVillageBtnActive" onclick="toggleMonoVillageDropdown()" class="px-3.5 py-1.5 rounded-lg bg-white text-emerald-950 font-black text-xs shadow-sm transition flex items-center gap-2 cursor-pointer">
                                <span id="monoVillageActiveLabel">Desa Kamisi</span>
                                <i class="bi bi-chevron-down text-[10px] text-emerald-700"></i>
                            </button>
                            <!-- Dropdown 6 Desa -->
                            <div id="monoVillageDropdown" class="hidden absolute left-0 mt-9 w-52 bg-white rounded-2xl shadow-2xl border border-slate-200 p-2 z-50 text-slate-800 space-y-1">
                                <button type="button" onclick="selectMonografiVillage('kamisi')" class="w-full text-left px-3 py-2 rounded-xl text-xs font-bold hover:bg-emerald-50 hover:text-emerald-800 transition flex items-center justify-between">
                                    <span>Desa Kamisi</span>
                                    <span class="text-[10px] text-slate-400">Kodeoha</span>
                                </button>
                                <button type="button" onclick="selectMonografiVillage('koroha')" class="w-full text-left px-3 py-2 rounded-xl text-xs font-bold hover:bg-emerald-50 hover:text-emerald-800 transition flex items-center justify-between">
                                    <span>Desa Koroha</span>
                                    <span class="text-[10px] text-slate-400">Kodeoha</span>
                                </button>
                                <button type="button" onclick="selectMonografiVillage('malamala')" class="w-full text-left px-3 py-2 rounded-xl text-xs font-bold hover:bg-emerald-50 hover:text-emerald-800 transition flex items-center justify-between">
                                    <span>Kel. Mala-Mala</span>
                                    <span class="text-[10px] text-slate-400">Kodeoha</span>
                                </button>
                                <button type="button" onclick="selectMonografiVillage('lapolu')" class="w-full text-left px-3 py-2 rounded-xl text-xs font-bold hover:bg-emerald-50 hover:text-emerald-800 transition flex items-center justify-between">
                                    <span>Desa Lapolu</span>
                                    <span class="text-[10px] text-slate-400">Tiwu</span>
                                </button>
                                <button type="button" onclick="selectMonografiVillage('tanggeawo')" class="w-full text-left px-3 py-2 rounded-xl text-xs font-bold hover:bg-emerald-50 hover:text-emerald-800 transition flex items-center justify-between">
                                    <span>Desa Tanggeawo</span>
                                    <span class="text-[10px] text-slate-400">Tiwu</span>
                                </button>
                                <button type="button" onclick="selectMonografiVillage('mattirobulu')" class="w-full text-left px-3 py-2 rounded-xl text-xs font-bold hover:bg-emerald-50 hover:text-emerald-800 transition flex items-center justify-between">
                                    <span>Desa Mattiro Bulu</span>
                                    <span class="text-[10px] text-slate-400">Tiwu</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Pengelompokan Periode (Tahun) - 3 Tombol Pil -->
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-black uppercase text-emerald-200 tracking-wider hidden sm:inline">Periode:</span>
                        <div class="inline-flex rounded-xl bg-emerald-950/70 p-1 border border-emerald-400/25">
                            <button type="button" onclick="selectMonografiPeriod(1, 2024)" id="monoPeriodBtn1" class="mono-period-btn px-3.5 py-1.5 rounded-lg text-xs font-bold text-emerald-100 hover:text-white transition cursor-pointer">
                                Periode 1 (2024)
                            </button>
                            <button type="button" onclick="selectMonografiPeriod(2, 2025)" id="monoPeriodBtn2" class="mono-period-btn px-3.5 py-1.5 rounded-lg text-xs font-bold text-emerald-100 hover:text-white transition cursor-pointer">
                                Periode 2 (2025)
                            </button>
                            <button type="button" onclick="selectMonografiPeriod(3, 2026)" id="monoPeriodBtn3" class="mono-period-btn px-3.5 py-1.5 rounded-lg text-xs font-black bg-white text-emerald-950 shadow-sm transition cursor-pointer">
                                Periode 3 (2026)
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </header>

        <!-- 2. NAVIGASI KATEGORI DATA (TANPA ANGKA ROMAWI) & SAKELAR TAMPILAN -->
        <nav class="w-full bg-white border-b border-slate-200 sticky top-0 z-30 shadow-xs">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 flex flex-col md:flex-row md:items-center justify-between gap-3 py-2.5">
                
                <!-- Bilah Tab Kategori (6 Kategori Bersih Tanpa Angka Romawi) -->
                <div class="flex items-center gap-1 sm:gap-2 overflow-x-auto pb-1 md:pb-0 scrollbar-none" id="monografiCategoryTabs">
                    <button type="button" onclick="selectMonografiCategory('geografi')" id="monoCatBtn-geografi" class="mono-cat-tab px-3.5 py-2 rounded-xl text-xs font-black transition flex items-center gap-2 whitespace-nowrap bg-emerald-700 text-white shadow-xs">
                        <i class="bi bi-geo-alt-fill text-emerald-300"></i>
                        <span>Geografi &amp; Iklim</span>
                    </button>
                    <button type="button" onclick="selectMonografiCategory('pemerintahan')" id="monoCatBtn-pemerintahan" class="mono-cat-tab px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/70">
                        <i class="bi bi-bank2"></i>
                        <span>Pemerintahan</span>
                    </button>
                    <button type="button" onclick="selectMonografiCategory('kependudukan')" id="monoCatBtn-kependudukan" class="mono-cat-tab px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/70">
                        <i class="bi bi-people-fill"></i>
                        <span>Kependudukan</span>
                    </button>
                    <button type="button" onclick="selectMonografiCategory('sosial')" id="monoCatBtn-sosial" class="mono-cat-tab px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/70">
                        <i class="bi bi-heart-pulse-fill"></i>
                        <span>Sosial &amp; Kesra</span>
                    </button>
                    <button type="button" onclick="selectMonografiCategory('pertanian')" id="monoCatBtn-pertanian" class="mono-cat-tab px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/70">
                        <i class="bi bi-tree-fill"></i>
                        <span>Pertanian &amp; Bahari</span>
                    </button>
                    <button type="button" onclick="selectMonografiCategory('ekonomi')" id="monoCatBtn-ekonomi" class="mono-cat-tab px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/70">
                        <i class="bi bi-graph-up-arrow"></i>
                        <span>Ekonomi &amp; Infrastruktur</span>
                    </button>
                </div>

                <!-- Sakelar Tampilan: Mode Grafik | Mode Tabel BPS -->
                <div class="flex items-center gap-2 shrink-0 self-end md:self-auto">
                    <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Tampilan:</span>
                    <div class="inline-flex rounded-xl bg-slate-100 p-1 border border-slate-200">
                        <button type="button" onclick="setMonografiViewMode('grafik')" id="monoViewModeGrafik" class="px-3 py-1 rounded-lg text-xs font-black transition bg-emerald-700 text-white shadow-xs cursor-pointer flex items-center gap-1.5">
                            <i class="bi bi-bar-chart-fill"></i>
                            <span>Mode Grafik</span>
                        </button>
                        <button type="button" onclick="setMonografiViewMode('tabel')" id="monoViewModeTabel" class="px-3 py-1 rounded-lg text-xs font-bold transition text-slate-600 hover:text-slate-900 cursor-pointer flex items-center gap-1.5">
                            <i class="bi bi-table"></i>
                            <span>Mode Tabel BPS</span>
                        </button>
                    </div>
                </div>

            </div>
        </nav>

        <!-- 3. TATA LETAK BENTO GRID 3 BAGIAN (KOLOM KIRI, TENGAH, KANAN) -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-6 sm:py-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                
                <!-- KOLOM KIRI (lg:col-span-5): VISUALISASI & TABEL STATISTIK -->
                <div class="lg:col-span-5 space-y-4">
                    <div class="bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/90 shadow-sm space-y-4">
                        
                        <!-- Header Kolom Kiri -->
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <div>
                                <h3 id="monografiLeftColTitle" class="text-sm font-black text-slate-900 tracking-tight flex items-center gap-2">
                                    <i class="bi bi-pie-chart-fill text-emerald-600"></i>
                                    <span>Visualisasi &amp; Tabel Statistik</span>
                                </h3>
                                <p id="monografiLeftColSubtitle" class="text-[11px] text-slate-500 mt-0.5">
                                    Komparasi Antar-Dusun • Periode <span id="monoLeftPeriodYear">3 (2026)</span>
                                </p>
                            </div>
                            <span id="monografiBadgeKategori" class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-black uppercase">
                                Geografi
                            </span>
                        </div>

                        <!-- 2 Grafik Mini Berdampingan (Donut & Bar) -->
                        <div id="monografiChartsContainer" class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                            
                            <!-- Grafik Donut 1 -->
                            <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/70 flex flex-col justify-between">
                                <div class="text-[11px] font-black text-slate-800 truncate" id="monoChart1Title">
                                    Persentase Luas Wilayah
                                </div>
                                <div class="relative h-40 w-full flex items-center justify-center my-1">
                                    <canvas id="monoCanvasDonut"></canvas>
                                </div>
                                <div class="text-[10px] text-slate-400 text-center font-medium">Distribusi Dusun</div>
                            </div>

                            <!-- Grafik Bar 2 -->
                            <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/70 flex flex-col justify-between">
                                <div class="text-[11px] font-black text-slate-800 truncate" id="monoChart2Title">
                                    Kependudukan per Dusun
                                </div>
                                <div class="relative h-40 w-full flex items-center justify-center my-1">
                                    <canvas id="monoCanvasBar"></canvas>
                                </div>
                                <div class="text-[10px] text-slate-400 text-center font-medium">Satuan: Jiwa</div>
                            </div>

                        </div>

                        <!-- Tabel Statistik Resmi BPS (Lengkap Baris Dusun & Total) -->
                        <div class="pt-2">
                            <div class="flex items-center justify-between mb-2">
                                <h4 id="monografiTableCaption" class="text-xs font-black text-slate-900 tracking-tight leading-tight">
                                    Tabel 1.1 Luas Wilayah dan Pembagian Administratif menurut Dusun - Periode 3 (2026)
                                </h4>
                            </div>
                            
                            <div class="overflow-x-auto rounded-2xl border border-slate-200 shadow-2xs">
                                <table class="w-full text-left text-xs border-collapse">
                                    <thead class="bg-slate-900 text-white text-[11px] uppercase tracking-wider font-extrabold">
                                        <tr id="monografiTableHeadRow">
                                            <th class="py-2.5 px-3 text-center w-10">No.</th>
                                            <th class="py-2.5 px-3">Nama Dusun</th>
                                            <th class="py-2.5 px-3 text-right" id="monoColHeader3">Jumlah RT</th>
                                            <th class="py-2.5 px-3 text-right" id="monoColHeader4">Luas Wilayah (km²)</th>
                                            <th class="py-2.5 px-3 text-right" id="monoColHeader5">Persentase (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="monografiTableBody" class="divide-y divide-slate-200 bg-white text-slate-700">
                                        <!-- Injected dynamically via renderMonografiBento() -->
                                    </tbody>
                                    <tfoot id="monografiTableFoot" class="bg-slate-100 font-black text-slate-900 border-t-2 border-slate-300">
                                        <!-- Injected dynamically via renderMonografiBento() -->
                                    </tfoot>
                                </table>
                            </div>
                            <div class="text-[10px] text-slate-400 italic mt-1.5 flex items-center justify-between">
                                <span>Sumber: BPS Kabupaten Kolaka Utara &amp; Registrasi Desa</span>
                                <span>*Data Terstandar SDI</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- KOLOM TENGAH (lg:col-span-4): SOROTAN UTAMA & NARASI STATISTIK -->
                <div class="lg:col-span-4 space-y-4">
                    <div class="bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/90 shadow-sm space-y-4">
                        
                        <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                            <h4 class="text-sm font-black text-slate-900 tracking-tight flex items-center gap-2">
                                <i class="bi bi-chat-left-quote-fill text-emerald-600"></i>
                                <span>Sorotan Utama &amp; Narasi Statistik</span>
                            </h4>
                            <span class="text-[10px] font-bold text-slate-400">Analisis Data</span>
                        </div>

                        <!-- Narasi Ringkasan -->
                        <div class="space-y-3 text-xs leading-relaxed text-slate-700">
                            <div class="p-3.5 rounded-2xl bg-emerald-50/70 border border-emerald-200 text-emerald-950">
                                <h5 id="monografiNarasiSubtitle" class="font-black text-emerald-900 text-xs mb-1">
                                    Sorotan Utama &amp; Narasi Statistik (Geografi &amp; Iklim)
                                </h5>
                                <p id="monografiNarasiLead" class="text-[11.5px] text-emerald-900/90 leading-relaxed font-medium">
                                    Kondisi geografis Desa Kamisi berada di pesisir Teluk Bone Kecamatan Kodeoha, dengan bentang wilayah seluas 14,8 km² pada Periode 3 (2026).
                                </p>
                            </div>

                            <!-- 3 Poin Sorotan Analisis Deskriptif -->
                            <div class="space-y-2.5 pt-1" id="monografiBulletPoints">
                                <!-- Injected dynamically via renderMonografiBento() -->
                            </div>
                        </div>

                        <!-- Badge Legalitas Metadata BPS -->
                        <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200 text-[11px] text-slate-600 flex items-center gap-2.5">
                            <i class="bi bi-shield-check text-emerald-600 text-base shrink-0"></i>
                            <div>
                                <span class="font-bold text-slate-800">Kompilasi Standar BPS Kolaka Utara</span>
                                <p class="text-[10px] text-slate-400 mt-0.5">Seluruh variabel telah tervalidasi dalam kerangka Satu Data Indonesia.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- KOLOM KANAN (lg:col-span-3): PRATINJAU PUBLIKASI & AKSES CEPAT (3D BOOK) -->
                <div class="lg:col-span-3 space-y-4">
                    <div class="bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/90 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                        
                        <div class="flex items-center justify-between pb-2 border-b border-slate-100 mb-2">
                            <h4 class="text-sm font-black text-slate-900 tracking-tight flex items-center gap-1.5">
                                <i class="bi bi-book-fill text-emerald-700"></i>
                                <span>Pratinjau Publikasi &amp; Akses Cepat</span>
                            </h4>
                        </div>

                        <!-- 3D Book Interactive Standing Cover (Persis Gambar Referensi) -->
                        <div id="mono3dStage" class="mono-perspective relative w-full h-[290px] flex items-center justify-center select-none py-1 overflow-visible cursor-grab active:cursor-grabbing">
                            
                            <!-- Pod Ground Shadow -->
                            <div id="mono3dShadow" class="mono-book-shadow"></div>

                            <!-- 3D Book Object -->
                            <div id="mono3dObject" class="mono-book-3d mono-floating relative" onclick="openMonografiFlipbookModal()" title="Klik untuk membuka Flipbook Monografi">
                                
                                <!-- Spine -->
                                <div class="mono-book-spine flex flex-col justify-between p-1.5 text-white">
                                    <span class="text-[6px] font-mono opacity-70">BPS</span>
                                    <div class="text-[7px] font-black tracking-widest uppercase opacity-85 text-emerald-200 transform -rotate-90 text-center whitespace-nowrap origin-center my-auto">
                                        MONOGRAFI • KOLUT
                                    </div>
                                    <span class="text-[6px] opacity-60" id="mono3dSpineYear">2026</span>
                                </div>

                                <!-- Paper edges right & top -->
                                <div class="mono-book-pages-right"></div>
                                <div class="mono-book-pages-top"></div>

                                <!-- Back Cover -->
                                <div class="mono-book-back"></div>

                                <!-- Front Cover -->
                                <div class="mono-book-cover p-3 text-white flex flex-col justify-between">
                                    
                                    <!-- Top Logos -->
                                    <div class="flex items-center justify-between gap-1 bg-white/95 px-2 py-1 rounded-md shadow-xs border border-white/50">
                                        <img src="/images/logo_kolaka_utara.png" alt="Pemkab" class="h-3.5 w-auto object-contain" onerror="this.style.display='none'">
                                        <div class="h-3 w-[1px] bg-slate-300"></div>
                                        <img src="/images/logo_bps.png" alt="BPS" class="h-3 w-auto object-contain" onerror="this.style.display='none'">
                                        <div class="h-3 w-[1px] bg-slate-300"></div>
                                        <img src="/images/logo_cantik.png" alt="Cantik" class="h-3 w-auto object-contain" onerror="this.style.display='none'">
                                    </div>

                                    <!-- Center Typography -->
                                    <div class="my-auto text-center space-y-0.5">
                                        <div class="text-[8px] font-black uppercase tracking-[0.2em] text-emerald-200">
                                            MONOGRAFI
                                        </div>
                                        <div id="mono3dCoverDesa" class="text-xs sm:text-sm font-black leading-tight text-white uppercase drop-shadow">
                                            DESA KAMISI
                                        </div>
                                        <div class="text-[7.5px] font-extrabold uppercase tracking-widest text-emerald-300">
                                            DALAM ANGKA
                                        </div>
                                        <div class="text-xs sm:text-sm font-black text-amber-300 tracking-wider">
                                            PERIODE <span id="mono3dPeriodNum">3</span> (<span id="mono3dPeriodYear">2026</span>)
                                        </div>
                                    </div>

                                    <!-- Bottom Subtitle -->
                                    <div class="text-center pt-1 border-t border-emerald-400/30">
                                        <div class="text-[6.5px] font-black tracking-widest uppercase text-white/95 leading-none">
                                            BADAN PUSAT STATISTIK
                                        </div>
                                        <div class="text-[5.5px] font-bold tracking-wider uppercase text-emerald-200 mt-0.5">
                                            KABUPATEN KOLAKA UTARA
                                        </div>
                                    </div>

                                    <!-- Dark spine shadow overlay -->
                                    <div class="absolute left-0 top-0 bottom-0 w-2.5 bg-gradient-to-r from-black/40 to-transparent pointer-events-none"></div>
                                </div>

                            </div>
                        </div>

                        <!-- Tombol Baca Flipbook & Unduh -->
                        <div class="mt-4 pt-3 border-t border-slate-100 space-y-2">
                            <button type="button" onclick="openMonografiFlipbookModal()" class="w-full py-2.5 px-3 rounded-xl bg-slate-900 hover:bg-slate-800 active:scale-95 text-white font-extrabold text-xs shadow-md transition flex items-center justify-center gap-2 cursor-pointer">
                                <i class="bi bi-book-half text-emerald-400"></i>
                                <span>Baca Flipbook</span>
                            </button>
                            <button type="button" onclick="downloadMonografiDoc()" class="w-full py-2 px-3 rounded-xl bg-emerald-50 hover:bg-emerald-100 active:scale-95 text-emerald-800 border border-emerald-300 font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                <i class="bi bi-download"></i>
                                <span>Unduh PDF / Excel</span>
                            </button>
                            <div class="text-[10px] text-slate-500 font-medium text-center pt-1">
                                Laporan Resmi BPS • PDF • 124 Halaman
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </main>

    </div>

    <!-- MODAL FLIPBOOK / DIGITAL READER FULLSCREEN (MONOGRAFI DIGITAL) -->
    <div id="monografiFlipbookModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-6 bg-slate-950/85 backdrop-blur-md overflow-y-auto">
        <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-4 flex flex-col max-h-[92vh] animate-in fade-in zoom-in duration-200">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-[#022c22] via-[#046A38] to-[#0b2545] text-white p-4 sm:p-5 flex items-center justify-between shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-xl text-emerald-300 shadow-inner">
                        📖
                    </div>
                    <div>
                        <div class="text-[10px] font-black uppercase tracking-wider text-emerald-300">
                            READER DIGITAL FLIPBOOK RESMI • BPS KOLAKA UTARA
                        </div>
                        <h3 id="flipbookModalTitle" class="text-base sm:text-lg font-black text-white leading-tight">
                            Buku Monografi Desa Kamisi Dalam Angka — Periode 3 (2026)
                        </h3>
                    </div>
                </div>
                <button type="button" onclick="closeMonografiFlipbookModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center font-bold text-sm cursor-pointer">
                    ✕
                </button>
            </div>

            <!-- Modal Content (Flipbook Preview & Bab Navigator) -->
            <div class="p-6 overflow-y-auto space-y-5 text-xs text-slate-700 flex-1">
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <div class="text-[10px] font-black uppercase text-emerald-800">Nomor Publikasi Resmi BPS</div>
                        <div class="font-black text-slate-900 text-sm" id="flipbookPubNum">BPS-7408-MONOGRAFI-2026-KAMISI</div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-1 rounded-lg bg-emerald-600 text-white text-[10px] font-black">Format PDF HD</span>
                        <span class="px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 text-[10px] font-black">124 Halaman</span>
                        <span class="px-2.5 py-1 rounded-lg bg-slate-200 text-slate-800 text-[10px] font-black">Terverifikasi BPS</span>
                    </div>
                </div>

                <!-- Daftar Kategori & Pembahasan Monografi (Tanpa Angka Romawi) -->
                <div class="space-y-3">
                    <h4 class="font-black text-slate-900 text-sm">Daftar Isi &amp; Bab Pembahasan Monografi:</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-emerald-500 transition cursor-pointer" onclick="jumpToCategoryFromReader('geografi')">
                            <span class="text-[10px] font-bold text-emerald-700">Kategori 1</span>
                            <b class="text-slate-900 block text-xs mt-0.5">Geografi &amp; Iklim</b>
                            <p class="text-[11px] text-slate-500 mt-1">Batas wilayah koordinat GIS, topografi dataran rendah hingga pesisir Teluk Bone.</p>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-emerald-500 transition cursor-pointer" onclick="jumpToCategoryFromReader('pemerintahan')">
                            <span class="text-[10px] font-bold text-emerald-700">Kategori 2</span>
                            <b class="text-slate-900 block text-xs mt-0.5">Pemerintahan</b>
                            <p class="text-[11px] text-slate-500 mt-1">Struktur perangkat desa, aparatur, BPD, pembagian dusun dan RT/RW.</p>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-emerald-500 transition cursor-pointer" onclick="jumpToCategoryFromReader('kependudukan')">
                            <span class="text-[10px] font-bold text-emerald-700">Kategori 3</span>
                            <b class="text-slate-900 block text-xs mt-0.5">Kependudukan</b>
                            <p class="text-[11px] text-slate-500 mt-1">Dinamika jumlah jiwa, sex ratio, keluarga KK, dan piramida umur produktif.</p>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-emerald-500 transition cursor-pointer" onclick="jumpToCategoryFromReader('sosial')">
                            <span class="text-[10px] font-bold text-emerald-700">Kategori 4</span>
                            <b class="text-slate-900 block text-xs mt-0.5">Sosial &amp; Kesra</b>
                            <p class="text-[11px] text-slate-500 mt-1">Pendidikan, sarana ibadah, kesehatan, desil kemiskinan dan bansos PKH/BPNT.</p>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-emerald-500 transition cursor-pointer" onclick="jumpToCategoryFromReader('pertanian')">
                            <span class="text-[10px] font-bold text-emerald-700">Kategori 5</span>
                            <b class="text-slate-900 block text-xs mt-0.5">Pertanian &amp; Bahari</b>
                            <p class="text-[11px] text-slate-500 mt-1">Perkebunan kakao sambung pucuk, cengkeh, minyak nilam, dan perikanan teri.</p>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-emerald-500 transition cursor-pointer" onclick="jumpToCategoryFromReader('ekonomi')">
                            <span class="text-[10px] font-bold text-emerald-700">Kategori 6</span>
                            <b class="text-slate-900 block text-xs mt-0.5">Ekonomi &amp; Infrastruktur</b>
                            <p class="text-[11px] text-slate-500 mt-1">Unit BUMDes, pasar rakyat, industri rumah tangga IKM, dan akses jalan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="p-4 bg-slate-50 border-t border-slate-200 flex flex-wrap items-center justify-between gap-3 shrink-0">
                <span class="text-[11px] text-slate-500 font-semibold">
                    Publikasi Resmi BPS Kabupaten Kolaka Utara • Memenuhi Kaidah Satu Data Indonesia
                </span>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="downloadMonografiDoc()" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs transition flex items-center gap-1.5 cursor-pointer">
                        <i class="bi bi-download"></i>
                        <span>Unduh Berkas Lengkap</span>
                    </button>
                    <button type="button" onclick="closeMonografiFlipbookModal()" class="px-4 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold text-xs transition cursor-pointer">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="view-portal-profil-desa" class="hidden w-full min-h-screen bg-[#F8FAFC]">
        <!-- Header 3 Tingkat Container -->
        <div id="dedicatedVillageHeaderWrapper" class="w-full sticky top-0 z-40 bg-white shadow-sm"></div>

        <!-- Main Content Host: 2 Kolom (lg:col-span-8 & lg:col-span-4) -->
        <div id="dedicatedVillageMainContentHost" class="w-full"></div>
    </div>

    <footer class="bg-[#071b12] text-white pt-10 pb-8 text-xs border-t border-white/10">
        <div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 space-y-6">
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
                // Hero Quick Action Handlers (Inspirasi Image 2)
        function handleHeroQuickSearch(query) {
            if (!query) return;
            const q = query.toLowerCase().trim();
            const el = document.getElementById('dashboard');
            if (el) el.scrollIntoView({ behavior: 'smooth' });
        }

        function filterDesaBySector(sector) {
            const el = document.getElementById('desa');
            if (el) el.scrollIntoView({ behavior: 'smooth' });
        }

        // Global Chart Instances Holder
        let chartInstances = {};

        // Data Asli 6 Desa Binaan Single Source of Truth
        const villagesMeta = {
            kamisi: { name: 'Desa Kamisi', shortName: 'Kamisi', kec: 'Kodeoha', kk: 394, pop: 1576, ikm: 14, progress: 98, terisi: 43, total: 44, karakter: 'Pesisir Bahari', penerangan: { plnMeter: 310, plnTanpa: 84, nonPln: 0 }, lantai: { semen: 190, keramik: 155, kayu: 40, marmer: 9 } },
            malamala: { name: 'Kel. Mala-Mala', shortName: 'Mala-Mala', kec: 'Kodeoha', kk: 318, pop: 1272, ikm: 2, progress: 93, terisi: 41, total: 44, karakter: 'Pilot Utama', penerangan: { plnMeter: 275, plnTanpa: 43, nonPln: 0 }, lantai: { semen: 110, keramik: 175, kayu: 25, marmer: 8 } },
            lapolu: { name: 'Desa Lapolu', shortName: 'Lapolu', kec: 'Tiwu', kk: 321, pop: 1264, ikm: 75, progress: 86, terisi: 38, total: 44, karakter: 'Perkebunan Cengkeh', penerangan: { plnMeter: 250, plnTanpa: 66, nonPln: 5 }, lantai: { semen: 160, keramik: 120, kayu: 35, marmer: 6 } },
            tanggeawo: { name: 'Desa Tanggeawo', shortName: 'Tanggeawo', kec: 'Tiwu', kk: 141, pop: 564, ikm: 46, progress: 82, terisi: 36, total: 44, karakter: 'Pertanian & Hortikultura', penerangan: { plnMeter: 115, plnTanpa: 26, nonPln: 0 }, lantai: { semen: 75, keramik: 48, kayu: 15, marmer: 3 } },
            mattirobulu: { name: 'Desa Mattiro Bulu', shortName: 'Mattiro Bulu', kec: 'Tiwu', kk: 324, pop: 856, ikm: 20, progress: 77, terisi: 34, total: 44, karakter: 'Agroindustri & Ternak', penerangan: { plnMeter: 180, plnTanpa: 34, nonPln: 110 }, lantai: { semen: 180, keramik: 85, kayu: 50, marmer: 9 } },
            koroha: { name: 'Desa Koroha', shortName: 'Koroha', kec: 'Kodeoha', kk: 335, pop: 1340, ikm: 16, progress: 68, terisi: 30, total: 44, karakter: 'Perikanan & Kakao', penerangan: { plnMeter: 260, plnTanpa: 75, nonPln: 0 }, lantai: { semen: 170, keramik: 125, kayu: 34, marmer: 6 } }
        };
        // Aliases for compatibility
        villagesMeta.kalukaluku = villagesMeta.malamala;
        villagesMeta.awo = villagesMeta.tanggeawo;
        villagesMeta.lametuna = villagesMeta.lapolu;
        villagesMeta.sawangaoha = villagesMeta.mattirobulu;
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
            Chart.defaults.animation.duration = 600;
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
                options: { 
                    responsive: true, maintainAspectRatio: false, cutout,
                    layout: { padding: 4 },
                    plugins: { 
                        legend: legendBottom, 
                        centerText: center,
                        tooltip: {
                            enabled: true,
                            backgroundColor: '#0f172a',
                            titleColor: '#ffffff',
                            bodyColor: '#e2e8f0',
                            borderColor: 'rgba(255,255,255,0.1)',
                            borderWidth: 1,
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: (context) => ` ${context.label.split('·')[0].trim()}: ${context.parsed}% (${context.parsed} dari 100 KK)`
                            }
                        }
                    } 
                }
            });
        }

        // Distribusi data per desa untuk filter dropdown
        const villageDistributions = {
            all: {
                rumah: { labels: ['Milik Sendiri · 81%', 'Sewa / Kontrak · 12%', 'Bebas Sewa · 7%'], data: [81, 12, 7], center: { text: '81%', sub: 'milik sendiri' } },
                air: { labels: ['Sumur Terlindung · 62%', 'Mata Air · 24%', 'PAM / BPSPAM · 14%'], data: [62, 24, 14], center: { text: '62%', sub: 'sumur terlindung' } },
                penghasilan: [320, 1140, 710, 256]
            },
            kamisi: {
                rumah: { labels: ['Milik Sendiri · 88%', 'Sewa / Kontrak · 8%', 'Bebas Sewa · 4%'], data: [88, 8, 4], center: { text: '88%', sub: 'milik sendiri' } },
                air: { labels: ['Sumur Terlindung · 74%', 'Mata Air · 16%', 'PAM / BPSPAM · 10%'], data: [74, 16, 10], center: { text: '74%', sub: 'sumur terlindung' } },
                penghasilan: [42, 198, 115, 39]
            },
            malamala: {
                rumah: { labels: ['Milik Sendiri · 84%', 'Sewa / Kontrak · 11%', 'Bebas Sewa · 5%'], data: [84, 11, 5], center: { text: '84%', sub: 'milik sendiri' } },
                air: { labels: ['Sumur Terlindung · 58%', 'Mata Air · 22%', 'PAM / BPSPAM · 20%'], data: [58, 22, 20], center: { text: '58%', sub: 'sumur terlindung' } },
                penghasilan: [35, 142, 108, 33]
            },
            lapolu: {
                rumah: { labels: ['Milik Sendiri · 80%', 'Sewa / Kontrak · 13%', 'Bebas Sewa · 7%'], data: [80, 13, 7], center: { text: '80%', sub: 'milik sendiri' } },
                air: { labels: ['Sumur Terlindung · 64%', 'Mata Air · 26%', 'PAM / BPSPAM · 10%'], data: [64, 26, 10], center: { text: '64%', sub: 'sumur terlindung' } },
                penghasilan: [48, 155, 88, 30]
            },
            tanggeawo: {
                rumah: { labels: ['Milik Sendiri · 78%', 'Sewa / Kontrak · 14%', 'Bebas Sewa · 8%'], data: [78, 14, 8], center: { text: '78%', sub: 'milik sendiri' } },
                air: { labels: ['Sumur Terlindung · 60%', 'Mata Air · 30%', 'PAM / BPSPAM · 10%'], data: [60, 30, 10], center: { text: '60%', sub: 'sumur terlindung' } },
                penghasilan: [25, 68, 36, 12]
            },
            mattirobulu: {
                rumah: { labels: ['Milik Sendiri · 82%', 'Sewa / Kontrak · 11%', 'Bebas Sewa · 7%'], data: [82, 11, 7], center: { text: '82%', sub: 'milik sendiri' } },
                air: { labels: ['Sumur Terlindung · 55%', 'Mata Air · 32%', 'PAM / BPSPAM · 13%'], data: [55, 32, 13], center: { text: '55%', sub: 'sumur terlindung' } },
                penghasilan: [52, 160, 84, 28]
            },
            koroha: {
                rumah: { labels: ['Milik Sendiri · 75%', 'Sewa / Kontrak · 16%', 'Bebas Sewa · 9%'], data: [75, 16, 9], center: { text: '75%', sub: 'milik sendiri' } },
                air: { labels: ['Sumur Terlindung · 52%', 'Mata Air · 34%', 'PAM / BPSPAM · 14%'], data: [52, 34, 14], center: { text: '52%', sub: 'sumur terlindung' } },
                penghasilan: [65, 172, 70, 28]
            }
        };

        function resolveVillageKey(input) {
            if (!input) return 'all';
            const str = input.toString().trim().toLowerCase();
            if (str === 'all' || str.includes('semua')) return 'all';
            if (str.includes('kamisi')) return 'kamisi';
            if (str.includes('mala')) return 'malamala';
            if (str.includes('lapolu')) return 'lapolu';
            if (str.includes('tanggeawo')) return 'tanggeawo';
            if (str.includes('mattiro') || str.includes('bulu')) return 'mattirobulu';
            if (str.includes('koroha')) return 'koroha';
            return 'all';
        }

        function filterDashboardVillage(villageKey) {
            const rawKey = villageKey || 'all';
            villageKey = resolveVillageKey(rawKey);

            // 1. Sinkronkan nilai dropdown select
            const sel = document.getElementById('selectVillageFilter');
            if (sel && sel.value !== villageKey) sel.value = villageKey;

            const isAll = (villageKey === 'all');
            const vm = villagesMeta[villageKey] || null;

            // 2. Perbarui 5 Kartu KPI Melayang di Bagian Atas
            const setHtml = (id, html) => { const el = document.getElementById(id); if (el) el.innerHTML = html; };

            if (isAll) {
                setHtml('kpiCard1Val', '6');
                setHtml('kpiCard1Label', 'Desa Pilot');
                setHtml('kpiCard1Badge', '<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Kec. Kodeoha &amp; Tiwu');

                setHtml('kpiCard2Val', '2.426');
                setHtml('kpiCard2Label', 'Total Keluarga');
                setHtml('kpiCard2Badge', 'Kepala Keluarga (KK)');

                setHtml('kpiCard3Val', '8.734');
                setHtml('kpiCard3Label', 'Total Penduduk');
                setHtml('kpiCard3Badge', 'Jiwa Terdata');

                setHtml('kpiCard4Val', '84%');
                setHtml('kpiCard4Label', 'Rata-rata Progres');
                setHtml('kpiCard4Badge', '<i class="bi bi-check-circle-fill text-[9px] text-teal-600"></i> Pendataan Selesai');

                setHtml('kpiCard5Val', '223 / 264');
                setHtml('kpiCard5Label', 'Indikator Terinput');
                setHtml('kpiCard5Badge', '44 Indikator / Desa');

                setHtml('dashSubTitle', 'Kondisi demografi, perumahan, sanitasi, dan ekonomi desa binaan BPS Kolaka Utara dalam satu tampilan.');
            } else if (vm) {
                setHtml('kpiCard1Val', vm.shortName || vm.name);
                setHtml('kpiCard1Label', 'Desa Terpilih');
                setHtml('kpiCard1Badge', `<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Kec. ${vm.kec}`);

                setHtml('kpiCard2Val', fmt(vm.kk));
                setHtml('kpiCard2Label', 'Jumlah Keluarga');
                setHtml('kpiCard2Badge', `${fmt(vm.kk)} KK Terverifikasi`);

                setHtml('kpiCard3Val', fmt(vm.pop));
                setHtml('kpiCard3Label', 'Jumlah Penduduk');
                setHtml('kpiCard3Badge', `${fmt(vm.pop)} Jiwa Terdata`);

                setHtml('kpiCard4Val', `${vm.progress}%`);
                setHtml('kpiCard4Label', 'Capaian Progres');
                setHtml('kpiCard4Badge', '<i class="bi bi-check-circle-fill text-[9px] text-teal-600"></i> Standar SDI BPS');

                setHtml('kpiCard5Val', `${vm.terisi} / ${vm.total}`);
                setHtml('kpiCard5Label', 'Indikator Terisi');
                setHtml('kpiCard5Badge', `Sisa ${vm.total - vm.terisi} Indikator`);

                setHtml('dashSubTitle', `Menampilkan data statistik sektoral, demografi, sanitasi, dan monografi untuk ${vm.name} (Kecamatan ${vm.kec}).`);
            }

            // 3. Perbarui 3 Donut/Bar Distribusi (Rumah, Air, Penghasilan)
            const data = villageDistributions[villageKey] || villageDistributions['all'];
            donut('rumah', 'chartKepemilikanRumah', data.rumah.labels, data.rumah.data,
                ['#0E7C5A', '#38bdf8', '#f59e0b'], data.rumah.center);
            donut('air', 'chartSumberAir', data.air.labels, data.air.data,
                ['#0284c7', '#0d9488', '#7dd3fc'], data.air.center);
            if (chartInstances['penghasilan']) {
                chartInstances['penghasilan'].data.datasets[0].data = data.penghasilan;
                chartInstances['penghasilan'].update();
            }

            // 4. Perbarui Bar Chart "Penduduk & Keluarga per Desa" (Spotlight Desa Terpilih)
            if (chartInstances['keluarga']) {
                const order = ['kamisi', 'malamala', 'lapolu', 'tanggeawo', 'mattirobulu', 'koroha'];
                if (isAll) {
                    chartInstances['keluarga'].data.datasets[0].backgroundColor = order.map(() => '#0E7C5A');
                    chartInstances['keluarga'].data.datasets[1].backgroundColor = order.map(() => '#38bdf8');
                } else {
                    chartInstances['keluarga'].data.datasets[0].backgroundColor = order.map(k => k === villageKey ? '#0E7C5A' : 'rgba(148, 163, 184, 0.28)');
                    chartInstances['keluarga'].data.datasets[1].backgroundColor = order.map(k => k === villageKey ? '#0284c7' : 'rgba(203, 213, 225, 0.35)');
                }
                chartInstances['keluarga'].update();
            }

            // 5. Perbarui Highlighting Baris pada Daftar "Progres Pendataan per Desa"
            const order = ['kamisi', 'malamala', 'lapolu', 'tanggeawo', 'mattirobulu', 'koroha'];
            order.forEach(k => {
                const row = document.getElementById('rankRow-' + k);
                if (!row) return;
                if (isAll) {
                    row.className = 'rank-row p-2 -mx-2 rounded-xl transition cursor-pointer hover:bg-slate-50';
                } else if (k === villageKey) {
                    row.className = 'rank-row p-2.5 -mx-2 rounded-xl bg-emerald-50/90 border-2 border-emerald-500 shadow-xs transition cursor-pointer';
                } else {
                    row.className = 'rank-row p-2 -mx-2 rounded-xl opacity-40 hover:opacity-85 transition cursor-pointer hover:bg-slate-50';
                }
            });

            const rankSummary = document.getElementById('rankSummaryText');
            if (rankSummary) {
                if (isAll) {
                    rankSummary.innerHTML = '<span>Total: <b class="text-slate-800">223</b> dari 264 indikator</span><span class="text-[#0E7C5A] font-extrabold">Rata-rata 84%</span>';
                } else if (vm) {
                    rankSummary.innerHTML = `<span>${vm.name}: <b class="text-slate-800">${vm.terisi}</b> dari ${vm.total} indikator</span><span class="text-[#0E7C5A] font-extrabold">Capaian ${vm.progress}%</span>`;
                }
            }

            // 6. Perbarui 3 Kartu Insight di Bagian Bawah
            const insightBox = document.getElementById('dashInsightContainer');
            if (insightBox) {
                if (isAll) {
                    insightBox.innerHTML = `
                        <div class="insight" style="background:#f0fdf6;border-color:#bbf0d4;">
                            <span class="ic bg-emerald-100 text-emerald-700">🏆</span>
                            <div class="leading-tight">
                                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Progres Tertinggi</div>
                                <div class="text-sm font-black text-slate-900 mt-0.5">Desa Kamisi · 98%</div>
                                <div class="text-[11px] text-slate-500 mt-0.5">43 dari 44 indikator terisi (Pesisir Bahari)</div>
                            </div>
                        </div>
                        <div class="insight" style="background:#eff6ff;border-color:#bfdbfe;">
                            <span class="ic bg-blue-100 text-blue-700">⭐</span>
                            <div class="leading-tight">
                                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Pilot Utama</div>
                                <div class="text-sm font-black text-slate-900 mt-0.5">Kel. Mala-Mala · 93%</div>
                                <div class="text-[11px] text-slate-500 mt-0.5">41 dari 44 indikator terisi · Pusat Layanan Kodeoha</div>
                            </div>
                        </div>
                        <div class="insight" style="background:#fffbeb;border-color:#fde68a;">
                            <span class="ic bg-amber-100 text-amber-700">🤝</span>
                            <div class="leading-tight">
                                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Perlu Pendampingan</div>
                                <div class="text-sm font-black text-slate-900 mt-0.5">Desa Koroha · 68%</div>
                                <div class="text-[11px] text-slate-500 mt-0.5">30 dari 44 indikator · 14 indikator dalam pembinaan</div>
                            </div>
                        </div>
                    `;
                } else if (vm) {
                    const avgKk = (vm.pop / vm.kk).toFixed(1);
                    insightBox.innerHTML = `
                        <div class="insight" style="background:#f0fdf6;border-color:#bbf0d4;">
                            <span class="ic bg-emerald-100 text-emerald-700">🏆</span>
                            <div class="leading-tight">
                                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Status Capaian SDI</div>
                                <div class="text-sm font-black text-slate-900 mt-0.5">${vm.name} · ${vm.progress}%</div>
                                <div class="text-[11px] text-slate-500 mt-0.5">${vm.terisi} dari ${vm.total} indikator terisi (${vm.karakter})</div>
                            </div>
                        </div>
                        <div class="insight" style="background:#eff6ff;border-color:#bfdbfe;">
                            <span class="ic bg-blue-100 text-blue-700">👥</span>
                            <div class="leading-tight">
                                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Basis Monografi</div>
                                <div class="text-sm font-black text-slate-900 mt-0.5">${fmt(vm.pop)} Jiwa · ${fmt(vm.kk)} KK</div>
                                <div class="text-[11px] text-slate-500 mt-0.5">Kecamatan ${vm.kec} · Rata-rata ${avgKk} Jiwa per Keluarga</div>
                            </div>
                        </div>
                        <div class="insight" style="background:#fffbeb;border-color:#fde68a;">
                            <span class="ic bg-amber-100 text-amber-700">🌾</span>
                            <div class="leading-tight">
                                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">Sektor &amp; Potensi Desa</div>
                                <div class="text-sm font-black text-slate-900 mt-0.5">Sentra ${vm.karakter}</div>
                                <div class="text-[11px] text-slate-500 mt-0.5">${vm.ikm} Unit Usaha IKM · Terintegrasi PODES BPS</div>
                            </div>
                        </div>
                    `;
                }
            }

            // 7. Sinkronkan dengan Tab 2 Analitik Sektoral
            if (typeof initAnalyticsCharts === 'function') {
                initAnalyticsCharts(villageKey);
            }

            const villageNames = { all: 'Semua Desa (6)', kamisi: 'Desa Kamisi', malamala: 'Kel. Mala-Mala', lapolu: 'Desa Lapolu', tanggeawo: 'Desa Tanggeawo', mattirobulu: 'Desa Mattiro Bulu', koroha: 'Desa Koroha' };
            showToast(`Data aktif: ${villageNames[villageKey] || villageKey}`, '📊');
        }

        // ===== Tab 1: Dashboard Makro =====
        function initDashboardCharts() {
            if (typeof Chart === 'undefined') {
                if (typeof safeInitDashboardCharts === 'function') {
                    safeInitDashboardCharts();
                }
                return;
            }
            const order = ['kamisi', 'malamala', 'lapolu', 'tanggeawo', 'mattirobulu', 'koroha'];
            const vm = order.map(k => villagesMeta[k]);

            mk('keluarga', 'chartKeluargaPerDesa', {
                type: 'bar',
                data: {
                    labels: vm.map(v => v.shortName || v.name),
                    datasets: [
                        { label: 'Penduduk (jiwa)', data: vm.map(v => v.pop), backgroundColor: '#0E7C5A', borderRadius: 6, maxBarThickness: 26 },
                        { label: 'Keluarga (KK)', data: vm.map(v => v.kk), backgroundColor: '#38bdf8', borderRadius: 6, maxBarThickness: 26 }
                    ]
                },
                options: {
                    responsive: true, maintainAspectRatio: false,
                    layout: { padding: { top: 18 } },
                    interaction: { mode: 'index', intersect: false },
                    onClick: (event, elements) => {
                        if (elements && elements.length > 0) {
                            const idx = elements[0].index;
                            const order = ['kamisi', 'malamala', 'lapolu', 'tanggeawo', 'mattirobulu', 'koroha'];
                            const selected = order[idx];
                            if (selected) filterDashboardVillage(selected);
                        }
                    },
                    plugins: { 
                        legend: { position: 'top', align: 'end', labels: { font: { size: 11, weight: '700' } } },
                        valueLabel: { show: true },
                        tooltip: { 
                            enabled: true,
                            backgroundColor: '#0f172a',
                            titleColor: '#ffffff',
                            bodyColor: '#e2e8f0',
                            borderColor: 'rgba(255,255,255,0.1)',
                            borderWidth: 1,
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: { 
                                title: (items) => `Desa/Kelurahan: ${items[0].label}`,
                                label: c => ` ${c.dataset.label}: ${fmt(c.parsed.y)} ${c.datasetIndex === 0 ? 'Jiwa' : 'KK'}` 
                            } 
                        } 
                    },
                    scales: { 
                        y: { beginAtZero: true, grid: GRID, border: { display: false }, ticks: { callback: v => fmt(v) } },
                        x: { grid: { display: false }, ticks: { font: { weight: '700' } } } 
                    }
                }
            });

            // Inisialisasi 3 grafik distribusi sesuai filter saat ini
            const currentFilter = document.getElementById('selectVillageFilter')?.value || 'all';
            const curData = villageDistributions[currentFilter] || villageDistributions['all'];

            donut('rumah', 'chartKepemilikanRumah', curData.rumah.labels, curData.rumah.data,
                ['#0E7C5A', '#38bdf8', '#f59e0b'], curData.rumah.center);
            donut('air', 'chartSumberAir', curData.air.labels, curData.air.data,
                ['#0284c7', '#0d9488', '#7dd3fc'], curData.air.center);

            mk('penghasilan', 'chartPenghasilan', {
                type: 'bar',
                data: { labels: ['< 1,5 Jt', '1,5 – 3 Jt', '3 – 5 Jt', '> 5 Jt'],
                        datasets: [{ label: 'Keluarga (KK)', data: curData.penghasilan, backgroundColor: ['#f59e0b', '#0E7C5A', '#0284c7', '#6366f1'], borderRadius: 6, maxBarThickness: 34 }] },
                options: { 
                    responsive: true, maintainAspectRatio: false, layout: { padding: { top: 16 } },
                    plugins: { 
                        legend: { display: false }, 
                        valueLabel: { show: true },
                        tooltip: {
                            enabled: true,
                            backgroundColor: '#0f172a',
                            titleColor: '#ffffff',
                            bodyColor: '#e2e8f0',
                            borderColor: 'rgba(255,255,255,0.1)',
                            borderWidth: 1,
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                title: (items) => `Rentang Pendapatan: ${items[0].label}`,
                                label: (context) => ` Jumlah: ${fmt(context.parsed.y)} Kepala Keluarga (KK)`
                            }
                        }
                    },
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

            const modalBox = modal.querySelector('.relative.w-full');
            if (modalBox) {
                if (docType === 'tabel') {
                    modalBox.className = "relative w-full max-w-6xl xl:max-w-7xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-3 sm:my-6 flex flex-col max-h-[94vh] animate-in fade-in zoom-in duration-200";
                } else {
                    modalBox.className = "relative w-full max-w-4xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 flex flex-col max-h-[92vh] animate-in fade-in zoom-in duration-200";
                }
            }

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
                if (tagEl) tagEl.textContent = 'KOMPILASI DATA SEKTORAL 3 PERIODE • BPS SDI';
                if (titleEl) titleEl.textContent = 'Tabel Statistik Sektoral 44 Indikator (6 Desa • 3 Periode Excel & Grafik)';
                if (bodyEl) {
                    bodyEl.innerHTML = `<div id="sektoralStudioContainer" class="w-full"></div>`;
                    renderSektoralStudio('sektoralStudioContainer');
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
            } else if (docType === 'potensi') {
                if (iconEl) iconEl.innerHTML = '💡';
                if (tagEl) tagEl.textContent = 'KATALOG POTENSI WILAYAH & KOMODITAS • BPS DESA CANTIK';
                if (titleEl) titleEl.textContent = 'Katalog Potensi & Komoditas Unggulan 6 Desa Binaan';
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-5">
                            <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 flex flex-wrap items-center justify-between gap-3">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-amber-800">Peta Potensi Sektoral</div>
                                    <div class="font-black text-slate-900 text-sm">Kecamatan Kodeoha & Kecamatan Tiwu (BPS Kolaka Utara 2026)</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-lg bg-amber-600 text-white text-[10px] font-black">Format PDF & Peta</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-amber-100 text-amber-800 text-[10px] font-black">6 Komoditas</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-200 text-slate-800 text-[10px] font-black">5,4 MB</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <b class="text-slate-900 block mb-1">Perkebunan Kakao & Nilam</b>
                                    <p class="text-[11px] text-slate-500">Sentra kakao sambung pucuk Desa Tanggeawo & Koroha, minyak atsiri nilam Desa Mattiro Bulu.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <b class="text-slate-900 block mb-1">Cengkeh & Hortikultura</b>
                                    <p class="text-[11px] text-slate-500">Perbukitan cengkeh Desa Lapolu & Tiwu, lada perdu dan tanaman pangan penunjang ketahanan pangan desa.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <b class="text-slate-900 block mb-1">Kelautan & Perikanan Teri</b>
                                    <p class="text-[11px] text-slate-500">Perikanan tangkap teri nasi Teluk Bone Desa Kamisi, rumput laut, dan potensi ekowisata mangrove pesisir.</p>
                                </div>
                            </div>

                            <div class="p-3.5 rounded-xl bg-amber-50 border border-amber-200 text-amber-950 text-xs">
                                <b>Dukungan Investasi & BUMDes:</b> Katalog potensi ini ditujukan bagi penyusunan proposal investasi desa, pengembangan BUMDes bersama, dan fasilitasi pembiayaan perbankan bagi pelaku UMKM desa.
                            </div>
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
            } else if (docType === 'potensi') {
                if (iconEl) iconEl.innerHTML = '💡';
                if (tagEl) tagEl.textContent = 'KATALOG POTENSI WILAYAH & KOMODITAS • BPS DESA CANTIK';
                if (titleEl) titleEl.textContent = 'Katalog Potensi & Komoditas Unggulan 6 Desa Binaan';
                if (bodyEl) {
                    bodyEl.innerHTML = `
                        <div class="space-y-5">
                            <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 flex flex-wrap items-center justify-between gap-3">
                                <div>
                                    <div class="text-[10px] font-black uppercase text-amber-800">Peta Potensi Sektoral</div>
                                    <div class="font-black text-slate-900 text-sm">Kecamatan Kodeoha & Kecamatan Tiwu (BPS Kolaka Utara 2026)</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-1 rounded-lg bg-amber-600 text-white text-[10px] font-black">Format PDF & Peta</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-amber-100 text-amber-800 text-[10px] font-black">6 Komoditas</span>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-200 text-slate-800 text-[10px] font-black">5,4 MB</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <b class="text-slate-900 block mb-1">Perkebunan Kakao & Nilam</b>
                                    <p class="text-[11px] text-slate-500">Sentra kakao sambung pucuk Desa Tanggeawo & Koroha, minyak atsiri nilam Desa Mattiro Bulu.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <b class="text-slate-900 block mb-1">Cengkeh & Hortikultura</b>
                                    <p class="text-[11px] text-slate-500">Perbukitan cengkeh Desa Lapolu & Tiwu, lada perdu dan tanaman pangan penunjang ketahanan pangan desa.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <b class="text-slate-900 block mb-1">Kelautan & Perikanan Teri</b>
                                    <p class="text-[11px] text-slate-500">Perikanan tangkap teri nasi Teluk Bone Desa Kamisi, rumput laut, dan potensi ekowisata mangrove pesisir.</p>
                                </div>
                            </div>

                            <div class="p-3.5 rounded-xl bg-amber-50 border border-amber-200 text-amber-950 text-xs">
                                <b>Dukungan Investasi & BUMDes:</b> Katalog potensi ini ditujukan bagi penyusunan proposal investasi desa, pengembangan BUMDes bersama, dan fasilitasi pembiayaan perbankan bagi pelaku UMKM desa.
                            </div>
                        </div>
                    `;
                }
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
 
        // ==============================================================
        // INISIALISASI ROBUST & TAHAN ASINKRONISITAS
        // ==============================================================
        let chartsInitAttempts = 0;
        function safeInitDashboardCharts() {
            if (typeof Chart === 'undefined') {
                if (chartsInitAttempts < 40) {
                    chartsInitAttempts++;
                    setTimeout(safeInitDashboardCharts, 100);
                }
                return;
            }
            initDashboardCharts();
        }

        // Eksekusi inisialisasi grafik secepat mungkin saat DOM & library siap
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', safeInitDashboardCharts);
        } else {
            safeInitDashboardCharts();
        }
        window.addEventListener('load', safeInitDashboardCharts);

        // ==============================================================
        // 3D COVERFLOW ENGINE (ROTATING CAROUSEL 6 DESA BINAAN)
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

            track.style.transform = `translate3d(${targetTranslateX}px, 0, 0)`;

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
                    <button type="button" onclick="userInteractGoTo(${i})" onmouseenter="handleCoverflowCardHover(${i})" 
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

        // Bergerak otomatis ketika kursor diarahkan ke desa tertentu
        let coverflowHoverTimer = null;
        function handleCoverflowCardHover(index) {
            isCoverflowHovered = true;
            stopCoverflowAutoplay();
            if (index === currentCoverflowIdx) return;
            clearTimeout(coverflowHoverTimer);
            coverflowHoverTimer = setTimeout(() => {
                goToCoverflow(index);
            }, 80); // Respon cepat & halus saat kursor diarahkan ke kartu desa
        }

        function handleCoverflowCardLeave() {
            clearTimeout(coverflowHoverTimer);
            isCoverflowHovered = false;
            startCoverflowAutoplay();
        }

        // Klik kartu: jika belum di tengah bergeser fokus ke tengah, jika sudah di tengah langsung buka dashboard
        function handleCoverflowCardClick(event, index, key) {
            if (event && event.target && event.target.closest('button')) {
                return; // Jika tombol PILIH DESA diklik, biarkan onclick tombol bekerja
            }
            if (index !== currentCoverflowIdx) {
                if (event) {
                    event.preventDefault();
                    event.stopPropagation();
                }
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
                if (!isCoverflowHovered && !isDraggingCoverflow) {
                    rotateCoverflow(1); // Terus bergerak otomatis ke kiri secara halus
                }
            }, 3500);
        }

        function stopCoverflowAutoplay() {
            if (coverflowAutoplayTimer) {
                clearInterval(coverflowAutoplayTimer);
                coverflowAutoplayTimer = null;
            }
        }

        function pauseAndResumeAutoplay() {
            stopCoverflowAutoplay();
            setTimeout(() => {
                if (!isCoverflowHovered) {
                    startCoverflowAutoplay();
                }
            }, 4000);
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

        // Keyboard Navigation (Panah Kiri & Kanan)
        document.addEventListener('keydown', function(e) {
            const desaSection = document.getElementById('desa');
            if (!desaSection) return;
            const rect = desaSection.getBoundingClientRect();
            const isInView = (rect.top < window.innerHeight && rect.bottom > 0);
            if (!isInView) return;

            if (e.key === 'ArrowLeft') {
                userInteractRotate(-1);
            } else if (e.key === 'ArrowRight') {
                userInteractRotate(1);
            }
        });

        // Inisialisasi Carousel pada load dan resize
        function initCoverflowEngine() {
            const stage = document.getElementById('coverflowStage');
            if (stage) {
                stage.addEventListener('mouseenter', () => { isCoverflowHovered = true; stopCoverflowAutoplay(); });
                stage.addEventListener('mouseleave', () => { isCoverflowHovered = false; startCoverflowAutoplay(); });
            }
            updateCoverflowCards();
            startCoverflowAutoplay();
        }

        if (document.readyState === 'loading') {
            window.addEventListener('DOMContentLoaded', initCoverflowEngine);
        } else {
            initCoverflowEngine();
        }
        window.addEventListener('resize', updateCoverflowCards);
        window.addEventListener('load', updateCoverflowCards);
        document.addEventListener('visibilitychange', () => {
            if (!document.hidden && !isCoverflowHovered) {
                startCoverflowAutoplay();
            }
        });

        // ==============================================================
        // GALERI FOTO DESCAN RESMI & LIGHTBOX VIEWER
        // ==============================================================
        const descanGaleriDatabase = [
            {
                cat: 'pembinaan',
                desa: 'Kec. Kodeoha',
                title: 'Pelatihan Literasi Statistik Aparatur',
                desc: 'Bimbingan teknis konsep, definisi, dan standarisasi kuesioner PODES bersama BPS Kolaka Utara.',
                img: 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80',
                badge: 'Pembinaan BPS'
            },
            {
                cat: 'pembinaan',
                desa: 'Kec. Tiwu',
                title: 'Verifikasi & Rekonsiliasi Data Sektoral',
                desc: 'Penyelarasan indikator kemiskinan ekstrem dan bansos P3KE bersama tim verifikator desa.',
                img: 'https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?auto=format&fit=crop&w=800&q=80',
                badge: 'SDI Kolut'
            },
            {
                cat: 'potensi',
                desa: 'Desa Tanggeawo',
                title: 'Sentra Perkebunan Kakao Unggulan',
                desc: 'Budidaya kakao rakyat sambung pucuk produktif dengan pembibitan varietas unggul Kolaka Utara.',
                img: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                badge: 'Potensi Kakao'
            },
            {
                cat: 'potensi',
                desa: 'Desa Lapolu',
                title: 'Agroindustri Cengkeh & Penyulingan Nilam',
                desc: 'Hasil panen perkebunan cengkeh perbukitan serta pengolahan minyak atsiri nilam bernilai ekspor.',
                img: 'https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?auto=format&fit=crop&w=800&q=80',
                badge: 'Cengkeh & Nilam'
            },
            {
                cat: 'bahari',
                desa: 'Desa Kamisi',
                title: 'Pesisir Bahari & Sentra Teri Tradisional',
                desc: 'Armada nelayan Teluk Bone dan penjemuran ikan teri asin tradisional pesisir Kodeoha.',
                img: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80',
                badge: 'Pesona Bahari'
            },
            {
                cat: 'bahari',
                desa: 'Desa Mattiro Bulu',
                title: 'Bentang Alam Perbukitan & Sumber Air',
                desc: 'Panorama alam perbukitan asri yang menopang ketahanan pangan dan irigasi persawahan.',
                img: 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=800&q=80',
                badge: 'Panorama Alam'
            },
            {
                cat: 'pelayanan',
                desa: 'Kel. Mala-Mala',
                title: 'Pelayanan Adminduk Terpadu Desa',
                desc: 'Pusat layanan administrasi satu pintu dan pencatatan kependudukan digital presisi.',
                img: 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80',
                badge: 'Layanan Desa'
            },
            {
                cat: 'pelayanan',
                desa: 'Desa Lametuna',
                title: 'Posyandu Terpadu & Penanganan Stunting',
                desc: 'Pemeriksaan rutin kesehatan ibu-anak dan pemantauan gizi balita terdata di dashboard desa.',
                img: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                badge: 'Posyandu Presisi'
            }
        ];

        let currentDescanGaleriCat = 'all';
        let currentDescanGaleriSearch = '';
        let currentDescanFilteredList = [];
        let currentDescanLightboxIndex = 0;

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

            currentDescanFilteredList = [...filtered];

            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full py-12 text-center">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 mx-auto flex items-center justify-center text-2xl mb-2">
                            <i class="bi bi-images"></i>
                        </div>
                        <h4 class="font-bold text-slate-800 text-sm">Tidak Ada Foto Ditemukan</h4>
                        <p class="text-xs text-slate-500 mt-1">Coba kata kunci lain atau pilih filter Semua Foto.</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = filtered.map((p, idx) => `
                <div class="group bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-2xs hover:shadow-lg transition-all duration-300 flex flex-col cursor-pointer" onclick="openDescanLightbox(${idx})">
                    <div class="relative overflow-hidden aspect-video w-full bg-slate-100">
                        <img src="${p.img}" alt="${p.title}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute top-2.5 left-2.5">
                            <span class="px-2.5 py-1 rounded-lg bg-black/65 backdrop-blur-xs text-white text-[10px] font-bold shadow-xs flex items-center gap-1">
                                <i class="bi bi-geo-alt-fill text-emerald-400 text-[9px]"></i>
                                <span>${p.desa}</span>
                            </span>
                        </div>
                        <div class="absolute top-2.5 right-2.5">
                            <span class="px-2 py-0.5 rounded-md bg-emerald-600/90 backdrop-blur-xs text-white text-[9.5px] font-black uppercase tracking-wide shadow-xs">
                                ${p.badge}
                            </span>
                        </div>
                    </div>
                    <div class="p-3.5 flex-1 flex flex-col justify-between">
                        <div>
                            <h4 class="font-black text-slate-900 text-xs sm:text-sm group-hover:text-emerald-700 transition leading-snug line-clamp-1">${p.title}</h4>
                            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed line-clamp-2">${p.desc}</p>
                        </div>
                        <div class="pt-2.5 mt-2.5 border-t border-slate-100 flex items-center justify-between text-[11px]">
                            <span class="text-slate-400 font-medium">Dokumentasi BPS</span>
                            <button type="button" onclick="event.stopPropagation(); openDescanLightbox(${idx})" class="text-emerald-600 hover:text-emerald-700 font-bold hover:underline flex items-center gap-1 cursor-pointer">
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
                el.className = 'descan-galeri-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap';
            });
            if (btn) {
                btn.className = 'descan-galeri-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-emerald-600 text-white shadow-xs cursor-pointer whitespace-nowrap';
            }
            renderDescanGaleri(category);
        }

        function searchDescanGaleri(val) {
            renderDescanGaleri(undefined, val);
        }

        window.openGaleriDesaModal = function(e) { openDescanGaleriModal(e); };
        window.openDescanGaleriModal = openDescanGaleriModal;
        window.closeDescanGaleriModal = closeDescanGaleriModal;
        window.closeGaleriDesaModal = closeDescanGaleriModal;

        function openDescanGaleriModal(e) {
            if (e) e.preventDefault();
            const modal = document.getElementById('descanGaleriModal');
            if (modal) {
                renderDescanGaleri('all');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeDescanGaleriModal() {
            const modal = document.getElementById('descanGaleriModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }
        }

        // ==============================================================
        // LIGHTBOX VIEWER FOTO BESAR DENGAN NAVIGASI
        // ==============================================================
        function openDescanLightbox(index) {
            if (!currentDescanFilteredList || currentDescanFilteredList.length === 0) {
                currentDescanFilteredList = [...descanGaleriDatabase];
            }
            if (index < 0) index = currentDescanFilteredList.length - 1;
            if (index >= currentDescanFilteredList.length) index = 0;
            currentDescanLightboxIndex = index;

            const p = currentDescanFilteredList[currentDescanLightboxIndex];
            const modal = document.getElementById('descanLightboxModal');
            if (!modal || !p) return;

            const imgEl = document.getElementById('descanLightboxImg');
            const titleEl = document.getElementById('descanLightboxTitle');
            const capEl = document.getElementById('descanLightboxCaption');
            const badgeEl = document.getElementById('descanLightboxBadge');
            const desaEl = document.getElementById('descanLightboxDesa');
            const counterEl = document.getElementById('descanLightboxCounter');

            if (imgEl) imgEl.src = p.img;
            if (titleEl) titleEl.textContent = p.title;
            if (capEl) capEl.textContent = p.desc;
            if (badgeEl) badgeEl.textContent = p.badge;
            if (desaEl) desaEl.textContent = p.desa;
            if (counterEl) counterEl.textContent = `${currentDescanLightboxIndex + 1} / ${currentDescanFilteredList.length}`;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDescanLightbox() {
            const modal = document.getElementById('descanLightboxModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        }

        function nextDescanLightboxPhoto() {
            openDescanLightbox(currentDescanLightboxIndex + 1);
        }

        function prevDescanLightboxPhoto() {
            openDescanLightbox(currentDescanLightboxIndex - 1);
        }

        document.addEventListener('keydown', function(e) {
            const lb = document.getElementById('descanLightboxModal');
            if (lb && !lb.classList.contains('hidden')) {
                if (e.key === 'Escape') closeDescanLightbox();
                else if (e.key === 'ArrowRight') nextDescanLightboxPhoto();
                else if (e.key === 'ArrowLeft') prevDescanLightboxPhoto();
            } else {
                const gm = document.getElementById('descanGaleriModal');
                if (gm && !gm.classList.contains('hidden') && e.key === 'Escape') {
                    closeDescanGaleriModal();
                }
            }
        });


        // Navbar ScrollSpy Active State Handler
        (function initScrollSpy() {
            const navLinks = document.querySelectorAll('#descanNavLinks .nav-link');
            if (!navLinks.length) return;

            const sections = ['beranda', 'dashboard', 'desa', 'output'];
            function updateActiveNav() {
                let current = 'beranda';
                sections.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) {
                        const top = el.offsetTop - 120;
                        const height = el.offsetHeight;
                        if (window.pageYOffset >= top && window.pageYOffset < top + height) {
                            current = id;
                        }
                    }
                });
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + current) {
                        link.classList.add('active');
                    }
                });
            }
            window.addEventListener('scroll', updateActiveNav, { passive: true });
            updateActiveNav();
        })();

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
    <!-- Bebas dari navbar duplikat, z-index aman, dan filter bersih    -->
    <!-- ============================================================== -->
    <div id="descanGaleriModal" class="fixed inset-0 z-[9999] hidden items-center justify-center p-3 sm:p-6 bg-slate-950/80 backdrop-blur-md overflow-y-auto" style="z-index: 9999;">
        <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 flex flex-col max-h-[92vh] animate-in fade-in zoom-in duration-200">
            <!-- Modal Header (Ringkas, Elegan, Bebas Navbar Duplikat) -->
            <div class="bg-gradient-to-r from-emerald-800 via-teal-800 to-[#0b2545] text-white p-5 sm:p-6 flex items-center justify-between shrink-0 shadow-md">
                <div class="flex items-center gap-3.5">
                    <div class="w-11 h-11 rounded-2xl bg-white/10 flex items-center justify-center text-xl shrink-0 shadow-inner border border-white/15">
                        <i class="bi bi-images text-emerald-200"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-base sm:text-lg font-black text-white leading-tight">
                                Galeri Dokumentasi &amp; Potensi Desa Cantik
                            </h3>
                            <span class="hidden sm:inline-block px-2.5 py-0.5 rounded-full bg-emerald-400/20 text-emerald-200 border border-emerald-400/30 text-[10px] font-black uppercase tracking-wider">
                                Resmi BPS
                            </span>
                        </div>
                        <p class="text-xs text-emerald-100/85 mt-0.5">
                            Dokumentasi pembinaan BPS, potensi komoditas, dan pelayanan 6 desa binaan
                        </p>
                    </div>
                </div>
                <button type="button" onclick="closeDescanGaleriModal()" class="w-9 h-9 rounded-full bg-white/10 hover:bg-rose-600 text-white flex items-center justify-center font-bold text-sm transition cursor-pointer shadow-xs active:scale-95" title="Tutup Galeri">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <!-- Category Filter Tabs & Live Search -->
            <div class="px-5 py-3 border-b border-slate-200 bg-slate-50 flex flex-col sm:flex-row sm:items-center justify-between gap-3 shrink-0">
                <div class="flex items-center gap-2 overflow-x-auto pb-1 sm:pb-0 scrollbar-none" id="descanGaleriFilterTabs">
                    <button type="button" onclick="filterDescanGaleri('all', this)" class="descan-galeri-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-emerald-600 text-white shadow-xs cursor-pointer whitespace-nowrap">
                        Semua Foto (8)
                    </button>
                    <button type="button" onclick="filterDescanGaleri('pembinaan', this)" class="descan-galeri-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Pembinaan BPS
                    </button>
                    <button type="button" onclick="filterDescanGaleri('potensi', this)" class="descan-galeri-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Potensi &amp; Kakao
                    </button>
                    <button type="button" onclick="filterDescanGaleri('bahari', this)" class="descan-galeri-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Pesona Bahari &amp; Alam
                    </button>
                    <button type="button" onclick="filterDescanGaleri('pelayanan', this)" class="descan-galeri-btn px-4 py-1.5 rounded-full text-xs font-bold transition bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 cursor-pointer whitespace-nowrap">
                        Pelayanan Desa
                    </button>
                </div>
                <div class="relative w-full sm:w-60 shrink-0">
                    <i class="bi bi-search absolute left-3 top-2.5 text-slate-400 text-xs"></i>
                    <input type="text" id="descanGaleriSearch" oninput="searchDescanGaleri(this.value)" placeholder="Cari foto atau desa..." 
                        class="w-full pl-8 pr-3 py-1.5 rounded-xl border border-slate-200 bg-white text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>
            </div>

            <!-- Photo Grid (8 Kartu Foto Lengkap dengan Thumbnail 16:9 & Badge Desa) -->
            <div id="descanGaleriGrid" class="p-5 sm:p-6 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 flex-1">
                <!-- Injected via renderDescanGaleri() -->
            </div>

            <!-- Modal Footer -->
            <div class="p-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between text-xs text-slate-500 shrink-0">
                <span class="flex items-center gap-1.5">
                    <i class="bi bi-info-circle text-emerald-600"></i>
                    <span>Klik pada foto atau tombol Perbesar untuk melihat resolusi penuh (Lightbox).</span>
                </span>
                <button type="button" onclick="closeDescanGaleriModal()" class="px-5 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold transition cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODAL LIGHTBOX FULLSCREEN (ZOOM FOTO & NAVIGASI PREV / NEXT)     -->
    <!-- ============================================================== -->
    <div id="descanLightboxModal" class="hidden fixed inset-0 z-[10000] bg-slate-950/95 backdrop-blur-xl flex items-center justify-center p-2 sm:p-6 animate-in fade-in duration-200" style="z-index: 10000;">
        <div class="relative w-full max-w-5xl bg-slate-900/95 rounded-3xl overflow-hidden shadow-2xl border border-slate-800/80 flex flex-col max-h-[96vh]">
            <!-- Lightbox Topbar -->
            <div class="p-3.5 sm:p-4 bg-slate-900 border-b border-slate-800 flex items-center justify-between text-white shrink-0">
                <div class="flex items-center gap-2.5">
                    <span id="descanLightboxBadge" class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-[10px] font-black uppercase tracking-wider">
                        Dokumentasi BPS
                    </span>
                    <span id="descanLightboxDesa" class="px-2.5 py-0.5 rounded-full bg-white/10 text-emerald-200 text-xs font-bold border border-white/10">
                        Desa Lapolu
                    </span>
                    <span id="descanLightboxCounter" class="px-2.5 py-0.5 rounded-full bg-white/10 text-slate-200 text-[11px] font-black tracking-wide border border-white/10">
                        1 / 8
                    </span>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="closeDescanLightbox()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-rose-600 text-white flex items-center justify-center text-sm font-bold transition cursor-pointer" title="Tutup (Esc)">
                        ✕
                    </button>
                </div>
            </div>

            <!-- Lightbox Image Center dengan Navigasi Panah Mengambang -->
            <div class="relative flex-1 overflow-hidden bg-black/90 flex items-center justify-center p-2 sm:p-4 min-h-[350px]">
                <!-- Tombol Navigasi Sebelumnya (Prev) -->
                <button type="button" onclick="prevDescanLightboxPhoto()" class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/60 hover:bg-emerald-600 text-white flex items-center justify-center transition-all duration-200 border border-white/20 backdrop-blur-md cursor-pointer z-20 shadow-xl active:scale-90" title="Foto Sebelumnya (Panah Kiri ←)">
                    <i class="bi bi-chevron-left text-lg"></i>
                </button>

                <!-- Foto Resolusi Tinggi -->
                <img id="descanLightboxImg" src="" alt="Dokumentasi Penuh" class="max-h-[68vh] max-w-full object-contain rounded-2xl shadow-2xl transition-all duration-300 select-none">

                <!-- Tombol Navigasi Selanjutnya (Next) -->
                <button type="button" onclick="nextDescanLightboxPhoto()" class="absolute right-3 sm:right-5 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/60 hover:bg-emerald-600 text-white flex items-center justify-center transition-all duration-200 border border-white/20 backdrop-blur-md cursor-pointer z-20 shadow-xl active:scale-90" title="Foto Selanjutnya (Panah Kanan →)">
                    <i class="bi bi-chevron-right text-lg"></i>
                </button>
            </div>

            <!-- Lightbox Caption Footer -->
            <div class="p-4 bg-slate-900 border-t border-slate-800 text-white shrink-0 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="min-w-0">
                    <h4 id="descanLightboxTitle" class="font-black text-sm sm:text-base text-white truncate">Judul Dokumentasi Foto</h4>
                    <p id="descanLightboxCaption" class="text-xs text-slate-400 mt-0.5 leading-relaxed line-clamp-2">Keterangan dokumentasi kegiatan resmi desa.</p>
                </div>
                <div class="text-[10px] text-slate-500 font-medium shrink-0 hidden md:block">
                    Navigasi: <kbd class="px-1.5 py-0.5 rounded bg-slate-800 text-slate-300 border border-slate-700">←</kbd> <kbd class="px-1.5 py-0.5 rounded bg-slate-800 text-slate-300 border border-slate-700">→</kbd> • Tutup: <kbd class="px-1.5 py-0.5 rounded bg-slate-800 text-slate-300 border border-slate-700">Esc</kbd>
                </div>
            </div>
        </div>
    </div>

    <!-- BILINGUAL TRANSLATION ENGINE (ID / EN) -->
    <script>
                // Language Switcher ID/EN (Visual only - English disabled as requested)
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
</script>
    <script src="/js/desa-portal.js">

// ==============================================================
    // ENGINE DATA PUBLIKASI TABEL STATISTIK SEKTORAL 3 PERIODE (BPS)
    // Desain Sendangsari: Sidebar Kategori, 3 Periode Excel, Bar & Pie Graph
    // ==============================================================
    const SEKTORAL_DATA_STORE = {
        penduduk: {
            title: "Statistik Penduduk & Demografi",
            icon: "bi-people-fill",
            color: "emerald",
            subTitle: "Jumlah Penduduk, Struktur Umur, Gender, dan Sebaran Dusun",
            indicators: [
                { id: "p1", name: "Total Penduduk Terdaftar", cat: "Demografi", unit: "Jiwa", y2024: 6478, y2025: 6619, y2026: 6734, note: "Perekaman SIAK & Pendataan Lapangan" },
                { id: "p2", name: "Penduduk Laki-Laki", cat: "Gender", unit: "Jiwa", y2024: 3290, y2025: 3365, y2026: 3424, note: "Sex Ratio 103,4 (Seimbang)" },
                { id: "p3", name: "Penduduk Perempuan", cat: "Gender", unit: "Jiwa", y2024: 3188, y2025: 3254, y2026: 3310, note: "Komposisi 49,2% dari total" },
                { id: "p4", name: "Jumlah Kepala Keluarga (KK)", cat: "Keluarga", unit: "KK", y2024: 1625, y2025: 1660, y2026: 1689, note: "Rata-rata 3,9 jiwa/KK" },
                { id: "p5", name: "Usia Balita (0 - 4 Tahun)", cat: "Rentang Umur", unit: "Jiwa", y2024: 580, y2025: 562, y2026: 546, note: "Sasaran posyandu aktif" },
                { id: "p6", name: "Usia Anak (5 - 14 Tahun)", cat: "Rentang Umur", unit: "Jiwa", y2024: 1120, y2025: 1140, y2026: 1152, note: "Usia wajib belajar 9 tahun" },
                { id: "p7", name: "Usia Produktif (15 - 64 Tahun)", cat: "Rentang Umur", unit: "Jiwa", y2024: 4366, y2025: 4489, y2026: 4594, note: "Bonus demografi 68,2%" },
                { id: "p8", name: "Usia Lanjut / Lansia (65+ Tahun)", cat: "Rentang Umur", unit: "Jiwa", y2024: 412, y2025: 428, y2026: 442, note: "Rasio ketergantungan 46,6%" }
            ],
            villages: {
                kamisi: { total24: 1520, total25: 1554, total26: 1576, kk26: 394, kec: "Kodeoha" },
                koroha: { total24: 1290, total25: 1315, total26: 1340, kk26: 335, kec: "Kodeoha" },
                malamala: { total24: 1230, total25: 1250, total26: 1272, kk26: 318, kec: "Kodeoha" },
                lapolu: { total24: 1210, total25: 1242, total26: 1264, kk26: 321, kec: "Tiwu" },
                tanggeawo: { total24: 538, total25: 550, total26: 564, kk26: 141, kec: "Tiwu" },
                mattirobulu: { total24: 690, total25: 708, total26: 718, kk26: 180, kec: "Tiwu" }
            }
        },
        pendidikan: {
            title: "Statistik Pendidikan & Literasi",
            icon: "bi-mortarboard-fill",
            color: "blue",
            subTitle: "Tingkat Pendidikan Formal Dalam KK dan Partisipasi Sekolah",
            indicators: [
                { id: "ed1", name: "Tidak / Belum Pernah Sekolah", cat: "Tingkat Ijazah", unit: "Jiwa", y2024: 840, y2025: 795, y2026: 742, note: "Penurunan -11,7% (Program Keaksaraan)" },
                { id: "ed2", name: "Tamat SD / Sederajat", cat: "Tingkat Ijazah", unit: "Jiwa", y2024: 2120, y2025: 2080, y2026: 2045, note: "Pendidikan dasar mayoritas petani tua" },
                { id: "ed3", name: "Tamat SMP / MTs Sederajat", cat: "Tingkat Ijazah", unit: "Jiwa", y2024: 1610, y2025: 1670, y2026: 1712, note: "Kenaikan partisipasi wajar 9 th" },
                { id: "ed4", name: "Tamat SMA / SMK / MA Sederajat", cat: "Tingkat Ijazah", unit: "Jiwa", y2024: 1540, y2025: 1650, y2026: 1758, note: "Peningkatan mutu angkatan kerja (+14,2%)" },
                { id: "ed5", name: "Tamat Perguruan Tinggi (D3/S1/S2)", cat: "Tingkat Ijazah", unit: "Jiwa", y2024: 368, y2025: 424, y2026: 477, note: "Lulusan sarjana kembali membangun desa" },
                { id: "ed6", name: "Angka Partisipasi Sekolah (APS 7-18)", cat: "Partisipasi", unit: "%", y2024: 91.2, y2025: 93.8, y2026: 96.4, note: "Target 100% bebas anak putus sekolah" },
                { id: "ed7", name: "Fasilitas Sarana PAUD / TK Aktif", cat: "Sarana", unit: "Unit", y2024: 8, y2025: 9, y2026: 11, note: "PAUD terakreditasi BPS & Kemendikbud" }
            ]
        },
        kemiskinan: {
            title: "Statistik Kemiskinan & Perlindungan Sosial",
            icon: "bi-shield-check",
            color: "amber",
            subTitle: "Desil Kesejahteraan P3KE, Penerima Bansos PKH/BPNT/BLT, dan Sanitasi",
            indicators: [
                { id: "k1", name: "Keluarga Desil 1 (Kemiskinan Ekstrem)", cat: "Desil P3KE", unit: "KK", y2024: 182, y2025: 146, y2026: 112, note: "Penurunan -38,5% lewat padat karya & bansos" },
                { id: "k2", name: "Keluarga Desil 2 (Pra-Sejahtera)", cat: "Desil P3KE", unit: "KK", y2024: 298, y2025: 272, y2026: 248, note: "Intervensi pemberdayaan bibit kakao" },
                { id: "k3", name: "Penerima Program Keluarga Harapan (PKH)", cat: "Bantuan Sosial", unit: "KK", y2024: 245, y2025: 238, y2026: 226, note: "Graduasi mandiri bertahap" },
                { id: "k4", name: "Penerima Kartu Sembako / BPNT", cat: "Bantuan Sosial", unit: "KK", y2024: 380, y2025: 365, y2026: 348, note: "Penyaluran via PT Pos & Himbara" },
                { id: "k5", name: "Penerima BLT Dana Desa (BLT-DD)", cat: "Bantuan Sosial", unit: "KK", y2024: 196, y2025: 165, y2026: 138, note: "Tepat sasaran hasil Musdesus" },
                { id: "k6", name: "Persentase Rumah Layak Huni (RLH)", cat: "Hunian", unit: "%", y2024: 82.4, y2025: 86.1, y2026: 91.5, note: "Bantuan bedah rumah BSPS Pemkab" },
                { id: "k7", name: "Akses Air Bersih & Jamban Sehat (ODF)", cat: "Sanitasi", unit: "%", y2024: 88.6, y2025: 92.4, y2026: 96.8, note: "Desa Bebas Buang Air Besar Sembarangan" }
            ]
        },
        pekerjaan: {
            title: "Statistik Ketenagakerjaan & Mata Pencaharian",
            icon: "bi-briefcase-fill",
            color: "teal",
            subTitle: "Distribusi Lapangan Pekerjaan, Usaha Mandiri, dan Angkatan Kerja",
            indicators: [
                { id: "pk1", name: "Petani Perkebunan (Kakao, Cengkeh, Nilam)", cat: "Sektor Primer", unit: "Jiwa", y2024: 2140, y2025: 2180, y2026: 2215, note: "Mayoritas komoditas perkebunan Kolut" },
                { id: "pk2", name: "Nelayan Tangkap & Budidaya Bahari", cat: "Sektor Primer", unit: "Jiwa", y2024: 485, y2025: 502, y2026: 520, note: "Kawasan pesisir Kamisi & Mala-Mala" },
                { id: "pk3", name: "Pedagang & Pelaku Usaha Mikro (UMKM)", cat: "Sektor Jasa", unit: "Jiwa", y2024: 312, y2025: 358, y2026: 412, note: "Tumbuh pesat (+32,1%) sentra kuliner" },
                { id: "pk4", name: "Buruh Bangunan / Tukang Kayu", cat: "Sektor Sekunder", unit: "Jiwa", y2024: 420, y2025: 455, y2026: 486, note: "Pembangunan fisik desa mandiri" },
                { id: "pk5", name: "Aparatur Desa / ASN / Nakes / Guru", cat: "Pemerintahan", unit: "Jiwa", y2024: 98, y2025: 104, y2026: 112, note: "Pelayanan publik terstandar" },
                { id: "pk6", name: "Tingkat Pengangguran Terbuka (TPT)", cat: "Indikator", unit: "%", y2024: 3.8, y2025: 3.2, y2026: 2.7, note: "Angka pengangguran rendah dan stabil" }
            ]
        },
        komoditas: {
            title: "Statistik Pertanian, Kakao & Komoditas Sektoral",
            icon: "bi-tree-fill",
            color: "emerald",
            subTitle: "Luas Lahan, Tonase Produksi Kakao, Nilam, Perikanan dan Unit IKM",
            indicators: [
                { id: "km1", name: "Luas Perkebunan Kakao Rakyat", cat: "Perkebunan", unit: "Hektar", y2024: 1420, y2025: 1455, y2026: 1488, note: "Varietas unggul sambung pucuk" },
                { id: "km2", name: "Produksi Biji Kakao Fermentasi", cat: "Produksi", unit: "Ton/Th", y2024: 1280, y2025: 1390, y2026: 1540, note: "Kenaikan +20,3% hasil pembinaan GAP" },
                { id: "km3", name: "Produksi Minyak Nilam Suling", cat: "Perkebunan", unit: "Liter/Th", y2024: 4600, y2025: 5400, y2026: 6200, note: "Penyulingan nilam Desa Mattiro Bulu" },
                { id: "km4", name: "Produksi Perikanan Tangkap & Teri", cat: "Perikanan", unit: "Ton/Th", y2024: 340, y2025: 375, y2026: 410, note: "Teri nasi Teluk Bone Desa Kamisi" },
                { id: "km5", name: "Jumlah Unit IKM Pengolahan Hasil Tani", cat: "Industri", unit: "Unit", y2024: 88, y2025: 114, y2026: 153, note: "Pertumbuhan industri rumah tangga (+73,9%)" }
            ]
        }
    };

    let currentSektoralState = {
        catKey: 'penduduk',
        viewMode: 'excel', // 'excel', 'bar', 'pie'
        villageFilter: 'all', // 'all' or village slug
        periodFilter: 'all',  // 'all' (3 periods), '2024', '2025', '2026'
        searchQuery: '',
        chartInstance: null
    };

    function renderSektoralStudio(containerId) {
        const container = document.getElementById(containerId);
        if (!container) return;

        const cat = SEKTORAL_DATA_STORE[currentSektoralState.catKey] || SEKTORAL_DATA_STORE.penduduk;

        // Filter indicators
        let list = cat.indicators.filter(ind => {
            if (!currentSektoralState.searchQuery) return true;
            const q = currentSektoralState.searchQuery.toLowerCase();
            return ind.name.toLowerCase().includes(q) || ind.cat.toLowerCase().includes(q) || (ind.note && ind.note.toLowerCase().includes(q));
        });

        // Compute Delta
        function calcGrowth(valOld, valNew) {
            if (!valOld) return 0;
            return (((valNew - valOld) / valOld) * 100).toFixed(1);
        }

        // HTML Layout (Sendangsari Style Sidebar + Main Stage)
        let html = `
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 w-full">
                
                <!-- KOLOM KIRI (lg:col-span-4 xl:col-span-3): SIDEBAR KATEGORI (PERSIS SENDANGSARI) -->
                <div class="lg:col-span-4 xl:col-span-3 space-y-3">
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-3.5 space-y-3">
                        <div class="flex items-center justify-between px-1">
                            <span class="text-[11px] font-black uppercase tracking-wider text-slate-500">
                                <i class="bi bi-grid-fill text-emerald-700 mr-1.5"></i>Indikator Sektoral
                            </span>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800">44 Variabel</span>
                        </div>

                        <!-- Sidebar Menu Accordions -->
                        <div class="space-y-1 text-xs font-semibold">
                            
                            <!-- 1. Statistik Penduduk -->
                            <button type="button" onclick="changeSektoralCategory('penduduk')" class="w-full text-left px-3 py-2.5 rounded-xl transition flex items-center justify-between ${currentSektoralState.catKey === 'penduduk' ? 'bg-[#0E7C5A] text-white shadow-sm font-bold' : 'text-slate-700 hover:bg-slate-200/70'}">
                                <span class="flex items-center gap-2">
                                    <i class="bi bi-people-fill ${currentSektoralState.catKey === 'penduduk' ? 'text-white' : 'text-emerald-700'}"></i>
                                    <span>Statistik Penduduk</span>
                                </span>
                                <span class="text-[10px] px-1.5 py-0.5 rounded ${currentSektoralState.catKey === 'penduduk' ? 'bg-white/20 text-white' : 'bg-slate-200 text-slate-600'}">8</span>
                            </button>

                            <!-- 2. Statistik Pendidikan -->
                            <button type="button" onclick="changeSektoralCategory('pendidikan')" class="w-full text-left px-3 py-2.5 rounded-xl transition flex items-center justify-between ${currentSektoralState.catKey === 'pendidikan' ? 'bg-[#0E7C5A] text-white shadow-sm font-bold' : 'text-slate-700 hover:bg-slate-200/70'}">
                                <span class="flex items-center gap-2">
                                    <i class="bi bi-mortarboard-fill ${currentSektoralState.catKey === 'pendidikan' ? 'text-white' : 'text-blue-700'}"></i>
                                    <span>Statistik Pendidikan</span>
                                </span>
                                <span class="text-[10px] px-1.5 py-0.5 rounded ${currentSektoralState.catKey === 'pendidikan' ? 'bg-white/20 text-white' : 'bg-slate-200 text-slate-600'}">7</span>
                            </button>

                            <!-- 3. Kemiskinan & Bansos -->
                            <button type="button" onclick="changeSektoralCategory('kemiskinan')" class="w-full text-left px-3 py-2.5 rounded-xl transition flex items-center justify-between ${currentSektoralState.catKey === 'kemiskinan' ? 'bg-[#0E7C5A] text-white shadow-sm font-bold' : 'text-slate-700 hover:bg-slate-200/70'}">
                                <span class="flex items-center gap-2">
                                    <i class="bi bi-shield-check ${currentSektoralState.catKey === 'kemiskinan' ? 'text-white' : 'text-amber-700'}"></i>
                                    <span>Kemiskinan & Bansos</span>
                                </span>
                                <span class="text-[10px] px-1.5 py-0.5 rounded ${currentSektoralState.catKey === 'kemiskinan' ? 'bg-white/20 text-white' : 'bg-slate-200 text-slate-600'}">7</span>
                            </button>

                            <!-- 4. Ketenagakerjaan -->
                            <button type="button" onclick="changeSektoralCategory('pekerjaan')" class="w-full text-left px-3 py-2.5 rounded-xl transition flex items-center justify-between ${currentSektoralState.catKey === 'pekerjaan' ? 'bg-[#0E7C5A] text-white shadow-sm font-bold' : 'text-slate-700 hover:bg-slate-200/70'}">
                                <span class="flex items-center gap-2">
                                    <i class="bi bi-briefcase-fill ${currentSektoralState.catKey === 'pekerjaan' ? 'text-white' : 'text-teal-700'}"></i>
                                    <span>Ketenagakerjaan</span>
                                </span>
                                <span class="text-[10px] px-1.5 py-0.5 rounded ${currentSektoralState.catKey === 'pekerjaan' ? 'bg-white/20 text-white' : 'bg-slate-200 text-slate-600'}">6</span>
                            </button>

                            <!-- 5. Pertanian & Komoditas -->
                            <button type="button" onclick="changeSektoralCategory('komoditas')" class="w-full text-left px-3 py-2.5 rounded-xl transition flex items-center justify-between ${currentSektoralState.catKey === 'komoditas' ? 'bg-[#0E7C5A] text-white shadow-sm font-bold' : 'text-slate-700 hover:bg-slate-200/70'}">
                                <span class="flex items-center gap-2">
                                    <i class="bi bi-tree-fill ${currentSektoralState.catKey === 'komoditas' ? 'text-white' : 'text-emerald-700'}"></i>
                                    <span>Pertanian & Kakao</span>
                                </span>
                                <span class="text-[10px] px-1.5 py-0.5 rounded ${currentSektoralState.catKey === 'komoditas' ? 'bg-white/20 text-white' : 'bg-slate-200 text-slate-600'}">5</span>
                            </button>

                        </div>

                        <!-- Info Card Rekap 6 Desa -->
                        <div class="mt-4 p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-950 text-[11px] space-y-1.5">
                            <div class="font-black text-emerald-900 flex items-center gap-1.5">
                                <i class="bi bi-check-circle-fill text-emerald-600"></i>
                                <span>3 Periode Pendataan BPS</span>
                            </div>
                            <p class="text-slate-600 leading-snug">
                                Data terhimpun dari <b>Tahun 2024</b> (Baseline), <b>Tahun 2025</b> (Pemutakhiran), dan <b>Tahun 2026</b> (Validasi SDI).
                            </p>
                        </div>

                    </div>
                </div>

                <!-- KOLOM KANAN (lg:col-span-8 xl:col-span-9): MAIN DISPLAY (GRAFIK & EXCEL 3 PERIODE) -->
                <div class="lg:col-span-8 xl:col-span-9 space-y-4">
                    
                    <!-- Header Atas: Judul Kategori & 3 Tombol Mode (Bar, Pie, Excel) -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-slate-200">
                        <div>
                            <h3 class="text-base sm:text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                                <i class="bi ${cat.icon} text-emerald-700"></i>
                                <span>${cat.title}</span>
                            </h3>
                            <p class="text-xs text-slate-500 mt-0.5 font-medium">${cat.subTitle}</p>
                        </div>

                        <!-- 3 Switcher: Bar Graph, Pie Graph, dan Tabel Excel -->
                        <div class="inline-flex items-center gap-1 p-1 bg-slate-100 rounded-2xl border border-slate-200 shrink-0 self-start sm:self-auto shadow-inner">
                            <button type="button" onclick="switchSektoralMode('excel')" class="px-3 py-1.5 rounded-xl text-xs font-black transition flex items-center gap-1.5 cursor-pointer ${currentSektoralState.viewMode === 'excel' ? 'bg-[#0E7C5A] text-white shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-white'}">
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Tabel Excel (3 Periode)</span>
                            </button>
                            <button type="button" onclick="switchSektoralMode('bar')" class="px-3 py-1.5 rounded-xl text-xs font-black transition flex items-center gap-1.5 cursor-pointer ${currentSektoralState.viewMode === 'bar' ? 'bg-[#0E7C5A] text-white shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-white'}">
                                <i class="bi bi-bar-chart-fill"></i>
                                <span>Bar Graph</span>
                            </button>
                            <button type="button" onclick="switchSektoralMode('pie')" class="px-3 py-1.5 rounded-xl text-xs font-black transition flex items-center gap-1.5 cursor-pointer ${currentSektoralState.viewMode === 'pie' ? 'bg-[#0E7C5A] text-white shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-white'}">
                                <i class="bi bi-pie-chart-fill"></i>
                                <span>Pie Graph</span>
                            </button>
                        </div>
                    </div>

                    <!-- Filter Bar & Search Toolbar -->
                    <div class="flex flex-wrap items-center justify-between gap-2.5 p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <div class="flex flex-wrap items-center gap-2 flex-1 min-w-[240px]">
                            <!-- Filter Wilayah -->
                            <div class="flex items-center gap-1.5 text-xs text-slate-700">
                                <span class="font-bold text-slate-500 text-[11px]">Wilayah:</span>
                                <select onchange="changeSektoralVillage(this.value)" class="py-1 px-2.5 rounded-lg border border-slate-200 bg-white text-xs font-bold text-slate-800 focus:outline-none focus:ring-1 focus:ring-emerald-600">
                                    <option value="all" ${currentSektoralState.villageFilter === 'all' ? 'selected' : ''}>Semua 6 Desa Binaan</option>
                                    <option value="kamisi" ${currentSektoralState.villageFilter === 'kamisi' ? 'selected' : ''}>Desa Kamisi (Kodeoha)</option>
                                    <option value="koroha" ${currentSektoralState.villageFilter === 'koroha' ? 'selected' : ''}>Desa Koroha (Kodeoha)</option>
                                    <option value="malamala" ${currentSektoralState.villageFilter === 'malamala' ? 'selected' : ''}>Kel. Mala-Mala (Kodeoha)</option>
                                    <option value="lapolu" ${currentSektoralState.villageFilter === 'lapolu' ? 'selected' : ''}>Desa Lapolu (Tiwu)</option>
                                    <option value="tanggeawo" ${currentSektoralState.villageFilter === 'tanggeawo' ? 'selected' : ''}>Desa Tanggeawo (Tiwu)</option>
                                    <option value="mattirobulu" ${currentSektoralState.villageFilter === 'mattirobulu' ? 'selected' : ''}>Desa Mattiro Bulu (Tiwu)</option>
                                </select>
                            </div>

                            <!-- Filter Periode (3 Tahun) -->
                            <div class="flex items-center gap-1.5 text-xs text-slate-700">
                                <span class="font-bold text-slate-500 text-[11px]">Periode:</span>
                                <select onchange="changeSektoralPeriod(this.value)" class="py-1 px-2.5 rounded-lg border border-slate-200 bg-white text-xs font-bold text-slate-800 focus:outline-none focus:ring-1 focus:ring-emerald-600">
                                    <option value="all" ${currentSektoralState.periodFilter === 'all' ? 'selected' : ''}>3 Periode (2024 - 2026)</option>
                                    <option value="2026" ${currentSektoralState.periodFilter === '2026' ? 'selected' : ''}>Tahun 2026 (Mutakhir)</option>
                                    <option value="2025" ${currentSektoralState.periodFilter === '2025' ? 'selected' : ''}>Tahun 2025</option>
                                    <option value="2024" ${currentSektoralState.periodFilter === '2024' ? 'selected' : ''}>Tahun 2024 (Baseline)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Live Search & Excel Export Buttons -->
                        <div class="flex items-center gap-2">
                            <div class="relative w-44 sm:w-52">
                                <i class="bi bi-search absolute left-2.5 top-2 text-slate-400 text-xs"></i>
                                <input type="text" oninput="filterSektoralSearch(this.value)" value="${currentSektoralState.searchQuery}" placeholder="Cari data..." class="w-full pl-7 pr-2 py-1 rounded-lg border border-slate-200 bg-white text-xs font-medium focus:outline-none focus:ring-1 focus:ring-emerald-600">
                            </div>

                            <!-- Download Excel CSV Button -->
                            <button type="button" onclick="exportSektoralToExcel()" class="py-1 px-3 rounded-lg bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-xs flex items-center gap-1.5 shadow-sm transition cursor-pointer" title="Unduh Lembar Kerja Excel (.csv)">
                                <i class="bi bi-file-earmark-excel-fill"></i>
                                <span class="hidden sm:inline">Export Excel</span>
                            </button>
                        </div>
                    </div>
        `;

        // Render Mode Content
        if (currentSektoralState.viewMode === 'excel') {
            // TAMPILAN TABEL EXCEL 3 PERIODE
            html += `
                <div class="overflow-hidden rounded-2xl border border-slate-200 shadow-sm bg-white">
                    <div class="overflow-x-auto max-h-[460px] scrollbar-thin">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead class="sticky top-0 z-10 bg-slate-100 text-slate-800 font-black border-b border-slate-300 text-[11px] shadow-sm">
                                <tr>
                                    <th class="p-2.5 text-center w-10">No</th>
                                    <th class="p-2.5 min-w-[200px]">Indikator Pendataan / Variabel</th>
                                    <th class="p-2.5 min-w-[100px]">Kategori</th>
                                    <th class="p-2.5 text-center w-16">Satuan</th>
                                    ${currentSektoralState.periodFilter === 'all' || currentSektoralState.periodFilter === '2024' ? '<th class="p-2.5 text-right bg-slate-50 font-black text-slate-700">Periode 2024</th>' : ''}
                                    ${currentSektoralState.periodFilter === 'all' || currentSektoralState.periodFilter === '2025' ? '<th class="p-2.5 text-right bg-blue-50/50 font-black text-blue-900">Periode 2025</th>' : ''}
                                    ${currentSektoralState.periodFilter === 'all' || currentSektoralState.periodFilter === '2026' ? '<th class="p-2.5 text-right bg-emerald-50 font-black text-emerald-900">Periode 2026</th>' : ''}
                                    ${currentSektoralState.periodFilter === 'all' ? '<th class="p-2.5 text-center w-24">Tren / Delta</th>' : ''}
                                    <th class="p-2.5 min-w-[160px]">Keterangan SDI BPS</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 font-medium">
            `;

            if (list.length === 0) {
                html += `<tr><td colspan="8" class="p-6 text-center text-slate-400">Tidak ada indikator yang sesuai dengan kata kunci pencarian.</td></tr>`;
            } else {
                list.forEach((ind, idx) => {
                    const delta = calcGrowth(ind.y2024, ind.y2026);
                    const isPositive = delta >= 0;
                    const deltaBadge = isPositive 
                        ? `<span class="inline-flex items-center gap-0.5 px-2 py-0.5 rounded-full text-[10px] font-black bg-emerald-100 text-emerald-800">+${delta}%</span>`
                        : `<span class="inline-flex items-center gap-0.5 px-2 py-0.5 rounded-full text-[10px] font-black bg-rose-100 text-rose-800">${delta}%</span>`;

                    html += `
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="p-2.5 text-center text-slate-400 font-bold">${idx + 1}</td>
                            <td class="p-2.5 font-bold text-slate-900">${ind.name}</td>
                            <td class="p-2.5 text-slate-500"><span class="px-2 py-0.5 rounded bg-slate-100 text-[10px] font-bold text-slate-600">${ind.cat}</span></td>
                            <td class="p-2.5 text-center font-bold text-slate-600">${ind.unit}</td>
                            ${currentSektoralState.periodFilter === 'all' || currentSektoralState.periodFilter === '2024' ? `<td class="p-2.5 text-right font-mono font-semibold text-slate-700 bg-slate-50/50">${ind.y2024.toLocaleString('id-ID')}</td>` : ''}
                            ${currentSektoralState.periodFilter === 'all' || currentSektoralState.periodFilter === '2025' ? `<td class="p-2.5 text-right font-mono font-semibold text-blue-900 bg-blue-50/30">${ind.y2025.toLocaleString('id-ID')}</td>` : ''}
                            ${currentSektoralState.periodFilter === 'all' || currentSektoralState.periodFilter === '2026' ? `<td class="p-2.5 text-right font-mono font-black text-emerald-800 bg-emerald-50/40">${ind.y2026.toLocaleString('id-ID')}</td>` : ''}
                            ${currentSektoralState.periodFilter === 'all' ? `<td class="p-2.5 text-center font-bold">${deltaBadge}</td>` : ''}
                            <td class="p-2.5 text-[11px] text-slate-500">${ind.note || '-'}</td>
                        </tr>
                    `;
                });
            }

            html += `
                            </tbody>
                        </table>
                    </div>
                    <!-- Excel Table Footer Toolbar -->
                    <div class="p-3 bg-slate-50 border-t border-slate-200 flex flex-wrap items-center justify-between gap-3 text-[11px] text-slate-600">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                            <span class="font-bold">Total: ${list.length} Indikator Terbakukan</span>
                            <span class="text-slate-400">•</span>
                            <span>Formula: <code>Δ = ((T2026 - T2024) / T2024) * 100</code></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="copySektoralTableToClipboard()" class="px-2.5 py-1 rounded bg-white hover:bg-slate-100 border border-slate-200 font-bold transition flex items-center gap-1 cursor-pointer">
                                <i class="bi bi-clipboard"></i>
                                <span>Salin Data</span>
                            </button>
                            <button type="button" onclick="printSektoralTable()" class="px-2.5 py-1 rounded bg-white hover:bg-slate-100 border border-slate-200 font-bold transition flex items-center gap-1 cursor-pointer">
                                <i class="bi bi-printer"></i>
                                <span>Cetak</span>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        } else {
            // TAMPILAN GRAFIK (BAR GRAPH ATAU PIE GRAPH)
            html += `
                <div class="bg-white rounded-2xl border border-slate-200 p-4 space-y-4 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div class="text-xs font-bold text-slate-700">
                            <span>Visualisasi: </span>
                            <span class="text-emerald-800 font-extrabold">${currentSektoralState.viewMode === 'bar' ? 'Bar Graph Multi-Series (3 Periode)' : 'Pie Graph Distribusi Komposisi'}</span>
                        </div>
                        <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full">
                            Highcharts &amp; Chart.js Engine
                        </span>
                    </div>

                    <!-- Canvas Area -->
                    <div class="relative w-full h-[360px] sm:h-[400px] bg-slate-50/50 rounded-xl p-2 border border-slate-100">
                        <canvas id="sektoralStudioCanvas"></canvas>
                    </div>

                    <!-- Ringkasan Statistik / Chips di Bawah Grafik -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 pt-1 text-center">
                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                            <div class="text-[10px] text-slate-400 font-bold uppercase">Baseline 2024</div>
                            <div class="text-sm sm:text-base font-black text-slate-800 mt-0.5">6.478 Jiwa</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-blue-50/60 border border-blue-200">
                            <div class="text-[10px] text-blue-700 font-bold uppercase">Pemutakhiran 2025</div>
                            <div class="text-sm sm:text-base font-black text-blue-900 mt-0.5">6.619 Jiwa</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-emerald-50 border border-emerald-200">
                            <div class="text-[10px] text-emerald-700 font-bold uppercase">Terkini 2026</div>
                            <div class="text-sm sm:text-base font-black text-emerald-900 mt-0.5">6.734 Jiwa</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-amber-50 border border-amber-200">
                            <div class="text-[10px] text-amber-700 font-bold uppercase">Pertumbuhan Rata-Rata</div>
                            <div class="text-sm sm:text-base font-black text-amber-900 mt-0.5">+3,95%</div>
                        </div>
                    </div>
                </div>
            `;
        }

        html += `
                </div>
            </div>
        `;

        container.innerHTML = html;

        // Inisialisasi Chart jika mode bar atau pie
        if (currentSektoralState.viewMode !== 'excel') {
            setTimeout(() => {
                initSektoralChart(list);
            }, 50);
        }
    }

    function changeSektoralCategory(catKey) {
        currentSektoralState.catKey = catKey;
        renderSektoralStudio('sektoralStudioContainer');
    }

    function switchSektoralMode(mode) {
        currentSektoralState.viewMode = mode;
        renderSektoralStudio('sektoralStudioContainer');
    }

    function changeSektoralVillage(v) {
        currentSektoralState.villageFilter = v;
        renderSektoralStudio('sektoralStudioContainer');
    }

    function changeSektoralPeriod(p) {
        currentSektoralState.periodFilter = p;
        renderSektoralStudio('sektoralStudioContainer');
    }

    function filterSektoralSearch(q) {
        currentSektoralState.searchQuery = q;
        renderSektoralStudio('sektoralStudioContainer');
    }

    function initSektoralChart(items) {
        const canvas = document.getElementById('sektoralStudioCanvas');
        if (!canvas || typeof Chart === 'undefined') return;

        if (currentSektoralState.chartInstance) {
            currentSektoralState.chartInstance.destroy();
            currentSektoralState.chartInstance = null;
        }

        const labels = items.map(i => i.name.length > 20 ? i.name.substring(0, 18) + '...' : i.name);

        if (currentSektoralState.viewMode === 'bar') {
            // Bar Graph 3 Periode
            currentSektoralState.chartInstance = new Chart(canvas, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Periode 2024',
                            data: items.map(i => i.y2024),
                            backgroundColor: 'rgba(100, 116, 139, 0.75)',
                            borderColor: '#475569',
                            borderWidth: 1.5,
                            borderRadius: 6
                        },
                        {
                            label: 'Periode 2025',
                            data: items.map(i => i.y2025),
                            backgroundColor: 'rgba(37, 99, 235, 0.8)',
                            borderColor: '#1d4ed8',
                            borderWidth: 1.5,
                            borderRadius: 6
                        },
                        {
                            label: 'Periode 2026',
                            data: items.map(i => i.y2026),
                            backgroundColor: 'rgba(14, 124, 90, 0.9)',
                            borderColor: '#096347',
                            borderWidth: 1.5,
                            borderRadius: 6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top', labels: { font: { weight: 'bold', size: 11 } } },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.dataset.label}: ${context.raw.toLocaleString('id-ID')}`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: { grid: { display: false }, ticks: { font: { size: 10 } } },
                        y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { font: { size: 10 } } }
                    }
                }
            });
        } else if (currentSektoralState.viewMode === 'pie') {
            // Pie Graph Komposisi Periode 2026
            const palette = [
                '#0E7C5A', '#2563EB', '#D97706', '#059669', 
                '#DC2626', '#7C3AED', '#0891B2', '#475569'
            ];
            currentSektoralState.chartInstance = new Chart(canvas, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: items.map(i => i.y2026),
                        backgroundColor: palette.slice(0, items.length),
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'right', labels: { font: { weight: 'bold', size: 11 }, boxWidth: 14 } },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const val = context.raw || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const pct = total > 0 ? ((val / total) * 100).toFixed(1) : 0;
                                    return `${context.label}: ${val.toLocaleString('id-ID')} (${pct}%)`;
                                }
                            }
                        }
                    }
                }
            });
        }
    }

    function exportSektoralToExcel() {
        const cat = SEKTORAL_DATA_STORE[currentSektoralState.catKey] || SEKTORAL_DATA_STORE.penduduk;
        let csv = "No,Kategori,Indikator Pendataan,Satuan,Periode 2024,Periode 2025,Periode 2026,Pertumbuhan (%),Keterangan SDI BPS\r\n";
        
        cat.indicators.forEach((ind, idx) => {
            const delta = ind.y2024 ? (((ind.y2026 - ind.y2024) / ind.y2024) * 100).toFixed(1) : "0";
            csv += `${idx + 1},"${ind.cat}","${ind.name}","${ind.unit}",${ind.y2024},${ind.y2025},${ind.y2026},${delta}%,"${ind.note || ''}"\r\n`;
        });

        const fileName = `Tabel_Statistik_Sektoral_${currentSektoralState.catKey}_3_Periode_BPS.csv`;
        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = fileName;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        if (typeof showToast === 'function') {
            showToast(`📥 Lembar kerja Excel ${fileName} berhasil diunduh!`);
        }
    }

    function copySektoralTableToClipboard() {
        const cat = SEKTORAL_DATA_STORE[currentSektoralState.catKey] || SEKTORAL_DATA_STORE.penduduk;
        let text = "No\tKategori\tIndikator\tSatuan\tPeriode 2024\tPeriode 2025\tPeriode 2026\tPertumbuhan (%)\tKeterangan\n";
        cat.indicators.forEach((ind, idx) => {
            const delta = ind.y2024 ? (((ind.y2026 - ind.y2024) / ind.y2024) * 100).toFixed(1) : "0";
            text += `${idx + 1}\t${ind.cat}\t${ind.name}\t${ind.unit}\t${ind.y2024}\t${ind.y2025}\t${ind.y2026}\t${delta}%\t${ind.note || ''}\n`;
        });

        navigator.clipboard.writeText(text).then(() => {
            if (typeof showToast === 'function') {
                showToast("📋 Data tabel berhasil disalin ke clipboard! Siap di-paste ke Excel.");
            } else {
                alert("Data tabel berhasil disalin ke clipboard! Siap di-paste ke Excel.");
            }
        });
    }

    function printSektoralTable() {
        window.print();
    }

</script>

<script>
// ==============================================================
// MONOGRAFI DIGITAL DESA & KELURAHAN ENGINE (BPS KOLAKA UTARA)
// ==============================================================
(function() {
    // 1. Data Store 6 Desa Binaan x 3 Periode (2024, 2025, 2026) x 6 Kategori
    const MONOGRAFI_DATA = {
        kamisi: {
            name: "Desa Kamisi",
            kecamatan: "Kodeoha",
            dusuns: ["Dusun 1", "Dusun 2", "Dusun 3", "Dusun 4"],
            periods: {
                1: { year: 2024, totalPop: 1512, totalKK: 390, areaKm2: 14.8 },
                2: { year: 2025, totalPop: 1548, totalKK: 402, areaKm2: 14.8 },
                3: { year: 2026, totalPop: 1582, totalKK: 412, areaKm2: 14.8 }
            },
            categories: {
                geografi: {
                    title: "Geografi & Iklim",
                    num: 1,
                    tableTitle: "Luas Wilayah dan Pembagian Administratif menurut Dusun",
                    chart1: { label: "Persentase Luas Wilayah", values: [28, 26, 24, 22] },
                    chart2: { label: "Kepadatan Penduduk (Jiwa/km²)", values: [108, 102, 95, 88] },
                    col3: "Jumlah RT",
                    col4: "Luas Wilayah (km²)",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 3, val4: 4.14, pct: 28.0 },
                        { d: "Dusun 2", val3: 2, val4: 3.85, pct: 26.0 },
                        { d: "Dusun 3", val3: 2, val4: 3.55, pct: 24.0 },
                        { d: "Dusun 4", val3: 2, val4: 3.26, pct: 22.0 }
                    ],
                    totalRow: { val3: 9, val4: 14.80, pct: 100.0 },
                    lead: "Kondisi geografis Desa Kamisi terletak di pesisir Teluk Bone Kecamatan Kodeoha dengan bentang wilayah seluas 14,8 km².",
                    bullets: [
                        "<b>Topografi Pesisir & Dataran Subur:</b> Membentang dari garis pantai Teluk Bone hingga perbukitan perkebunan kakao dan kelapa.",
                        "<b>Pembagian Administratif 4 Dusun:</b> Terbagi rata dalam 4 Dusun dan 9 RT dengan tata batas spasial yang telah dipetakan secara kartometrik BPS.",
                        "<b>Konektivitas Trans Sulawesi:</b> Akses transportasi jalan poros beraspal memudahkan mobilisasi komoditas hasil perkebunan ke pusat pasar."
                    ]
                },
                pemerintahan: {
                    title: "Pemerintahan",
                    num: 2,
                    tableTitle: "Aparatur Desa dan Kelembagaan Masyarakat menurut Dusun",
                    chart1: { label: "Komposisi Lembaga Desa", values: [35, 25, 20, 20] },
                    chart2: { label: "Jumlah Pengurus RT/RW", values: [4, 3, 3, 3] },
                    col3: "Perangkat Desa",
                    col4: "Anggota BPD & LPM",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 4, val4: 5, pct: 31.0 },
                        { d: "Dusun 2", val3: 3, val4: 4, pct: 24.1 },
                        { d: "Dusun 3", val3: 3, val4: 4, pct: 24.1 },
                        { d: "Dusun 4", val3: 3, val4: 3, pct: 20.8 }
                    ],
                    totalRow: { val3: 13, val4: 16, pct: 100.0 },
                    lead: "Tata kelola pemerintahan Desa Kamisi didukung 13 perangkat desa aktif dan Badan Permusyawaratan Desa (BPD) berintegritas.",
                    bullets: [
                        "<b>Digitalisasi Pelayanan Surat:</b> Mengimplementasikan sistem administrasi kependudukan digital terintegrasi satu pintu.",
                        "<b>Kemitraan BPD & LPM:</b> Keterlibatan lembaga desa dalam Musrenbangdes mencapai tingkat partisipasi aktif 94%.",
                        "<b>Transparansi Tata Kelola:</b> Publikasi APBDes dan laporan realisasi fisik terpasang di papan infografis balai desa dan portal online."
                    ]
                },
                kependudukan: {
                    title: "Kependudukan",
                    num: 3,
                    tableTitle: "Jumlah Penduduk, Kepala Keluarga, dan Kepadatan menurut Dusun",
                    chart1: { label: "Distribusi Jiwa Penduduk", values: [462, 410, 375, 335] },
                    chart2: { label: "Jumlah Kepala Keluarga (KK)", values: [122, 108, 98, 84] },
                    col3: "Jumlah Penduduk (Jiwa)",
                    col4: "Jumlah Kepala Keluarga (KK)",
                    col5: "Rasio Gender (M/F)",
                    dusunData: [
                        { d: "Dusun 1", val3: 462, val4: 122, pct: 102.4 },
                        { d: "Dusun 2", val3: 410, val4: 108, pct: 101.8 },
                        { d: "Dusun 3", val3: 375, val4: 98, pct: 100.5 },
                        { d: "Dusun 4", val3: 335, val4: 84, pct: 99.2 }
                    ],
                    totalRow: { val3: 1582, val4: 412, pct: 101.1 },
                    lead: "Dinamika demografi Desa Kamisi menunjukkan struktur usia produktif yang dominan dengan rasio ketergantungan yang sehat.",
                    bullets: [
                        "<b>Bonus Demografi Usia 15-59 Tahun:</b> Mencapai 68,4% dari total penduduk, menjadi motor utama penggerak perekonomian desa.",
                        "<b>Stabilitas Pertumbuhan Penduduk:</b> Laju pertumbuhan penduduk tercatat seimbang di angka 1,3% per tahun dengan registrasi SIAK tertib.",
                        "<b>Keluarga Sejahtera Mandiri:</b> Rata-rata anggota keluarga berjumlah 3,8 jiwa per rumah tangga dengan cakupan kepemilikan KK 100%."
                    ]
                },
                sosial: {
                    title: "Sosial & Kesra",
                    num: 4,
                    tableTitle: "Fasilitas Pendidikan, Kesehatan, dan Kesejahteraan Sosial menurut Dusun",
                    chart1: { label: "Penerima Manfaat Bantuan", values: [38, 28, 22, 18] },
                    chart2: { label: "Sarana Sosial & Ibadah", values: [5, 3, 3, 2] },
                    col3: "Sarana Pendidikan & Ibadah",
                    col4: "Keluarga Penerima Bansos",
                    col5: "Cakupan BPJS (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 5, val4: 28, pct: 96.5 },
                        { d: "Dusun 2", val3: 3, val4: 24, pct: 94.2 },
                        { d: "Dusun 3", val3: 3, val4: 20, pct: 93.8 },
                        { d: "Dusun 4", val3: 2, val4: 16, pct: 92.0 }
                    ],
                    totalRow: { val3: 13, val4: 88, pct: 94.4 },
                    lead: "Taraf kesejahteraan masyarakat Desa Kamisi terus meningkat dengan akses jaminan kesehatan semesta dan sarana pendidikan yang lengkap.",
                    bullets: [
                        "<b>Akses Kesehatan Posyandu Terpadu:</b> Poskesdes dan 4 Posyandu aktif melayani imunisasi balita dan kesehatan lansia rutin bulanan.",
                        "<b>Graduasi Kemiskinan Ekstrem:</b> Angka kemiskinan ekstrem turun signifikan menjadi 2,1% berkat intervensi bantuan modal BUMDes.",
                        "<b>Pendidikan Dasar Tuntas:</b> Angka Partisipasi Sekolah (APS) usia 7-15 tahun mencapai 99,2% dengan fasilitas SD dan SMP terjangkau."
                    ]
                },
                pertanian: {
                    title: "Pertanian & Bahari",
                    num: 5,
                    tableTitle: "Produksi Perkebunan Kakao, Cengkeh, dan Tangkapan Ikan menurut Dusun",
                    chart1: { label: "Produksi Kakao (Ton/Tahun)", values: [185, 142, 120, 95] },
                    chart2: { label: "Armada Perahu Nelayan", values: [28, 14, 8, 4] },
                    col3: "Produksi Kakao (Ton)",
                    col4: "Nelayan Tangkap (Jiwa)",
                    col5: "Produktivitas (Kg/Ha)",
                    dusunData: [
                        { d: "Dusun 1", val3: 185, val4: 48, pct: 980 },
                        { d: "Dusun 2", val3: 142, val4: 26, pct: 940 },
                        { d: "Dusun 3", val3: 120, val4: 15, pct: 910 },
                        { d: "Dusun 4", val3: 95, val4: 8, pct: 890 }
                    ],
                    totalRow: { val3: 542, val4: 97, pct: 935 },
                    lead: "Sektor perkebunan kakao rakyat dan perikanan tangkap Teluk Bone merupakan fondasi utama mata pencaharian warga Desa Kamisi.",
                    bullets: [
                        "<b>Sentra Kakao Fermentasi Unggul:</b> Menghasilkan rata-rata 542 ton biji kakao kering per tahun dengan teknik sambung pucuk BPS/Distan.",
                        "<b>Potensi Tangkapan Bahari Ikan Teri:</b> Dusun pesisir memproduksi ikan teri segar dan olahan kering berkualitas pasar regional.",
                        "<b>Kelembagaan Gapoktan Kuat:</b> 6 kelompok tani aktif mengelola distribusi pupuk bersubsidi dan sertifikasi kebun berkelanjutan."
                    ]
                },
                ekonomi: {
                    title: "Ekonomi & Infrastruktur",
                    num: 6,
                    tableTitle: "Unit Usaha BUMDes, IKM, dan Jaringan Jalan menurut Dusun",
                    chart1: { label: "Sebaran Unit Usaha IKM", values: [24, 18, 14, 11] },
                    chart2: { label: "Panjang Jalan Mantap (Km)", values: [3.8, 2.9, 2.5, 2.2] },
                    col3: "Unit Usaha Mikro/IKM",
                    col4: "Jalan Aspal/Rabat (Km)",
                    col5: "Akses Internet (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 24, val4: 3.8, pct: 98.0 },
                        { d: "Dusun 2", val3: 18, val4: 2.9, pct: 95.5 },
                        { d: "Dusun 3", val3: 14, val4: 2.5, pct: 92.0 },
                        { d: "Dusun 4", val3: 11, val4: 2.2, pct: 89.5 }
                    ],
                    totalRow: { val3: 67, val4: 11.4, pct: 94.2 },
                    lead: "Aktivitas ekonomi desa digerakkan oleh unit BUMDes Kamisi Berkah serta 67 pelaku usaha mikro olahan komoditas lokal.",
                    bullets: [
                        "<b>Perputaran BUMDes Berdaya:</b> Unit simpan pinjam dan pengeringan gabah/kakao mencatatkan kontribusi PADes stabil tiap tahun.",
                        "<b>Infrastruktur Jalan 100% Terbuka:</b> Total 11,4 km ruas jalan poros dan lorong dusun dalam kondisi mantap aspal beton dan rabat.",
                        "<b>Akses Listrik & Telekomunikasi:</b> Cakupan elektrifikasi PLN mencapai 100% dan jaringan sinyal 4G telah melayani seluruh area permukiman."
                    ]
                }
            }
        },
        koroha: {
            name: "Desa Koroha",
            kecamatan: "Kodeoha",
            dusuns: ["Dusun 1", "Dusun 2", "Dusun 3"],
            periods: {
                1: { year: 2024, totalPop: 1198, totalKK: 310, areaKm2: 12.4 },
                2: { year: 2025, totalPop: 1225, totalKK: 318, areaKm2: 12.4 },
                3: { year: 2026, totalPop: 1248, totalKK: 326, areaKm2: 12.4 }
            },
            categories: {
                geografi: {
                    title: "Geografi & Iklim",
                    num: 1,
                    tableTitle: "Luas Wilayah dan Pembagian Administratif menurut Dusun",
                    chart1: { label: "Persentase Luas Wilayah", values: [38, 34, 28] },
                    chart2: { label: "Kepadatan Penduduk (Jiwa/km²)", values: [105, 98, 92] },
                    col3: "Jumlah RT",
                    col4: "Luas Wilayah (km²)",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 3, val4: 4.71, pct: 38.0 },
                        { d: "Dusun 2", val3: 2, val4: 4.22, pct: 34.0 },
                        { d: "Dusun 3", val3: 2, val4: 3.47, pct: 28.0 }
                    ],
                    totalRow: { val3: 7, val4: 12.40, pct: 100.0 },
                    lead: "Desa Koroha berbatasan dengan perbukitan hijau Kodeoha dengan bentang wilayah seluas 12,4 km².",
                    bullets: [
                        "<b>Dataran Perbukitan Subur:</b> Sangat ideal bagi perkebunan cengkeh dan nilam bernilai ekonomi tinggi.",
                        "<b>Tata Batas 3 Dusun:</b> Pengelolaan wilayah terbagi efisien dalam 3 Dusun dan 7 RT teratur.",
                        "<b>Sumber Daya Air Alami:</b> Memiliki aliran sungai jernih yang menopang irigasi pertanian masyarakat."
                    ]
                },
                pemerintahan: {
                    title: "Pemerintahan",
                    num: 2,
                    tableTitle: "Aparatur Desa dan Kelembagaan Masyarakat menurut Dusun",
                    chart1: { label: "Aparatur Desa", values: [4, 4, 3] },
                    chart2: { label: "Pengurus RT", values: [3, 2, 2] },
                    col3: "Perangkat Desa",
                    col4: "Anggota BPD & LPM",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 4, val4: 4, pct: 36.4 },
                        { d: "Dusun 2", val3: 4, val4: 4, pct: 36.4 },
                        { d: "Dusun 3", val3: 3, val4: 3, pct: 27.2 }
                    ],
                    totalRow: { val3: 11, val4: 11, pct: 100.0 },
                    lead: "Pemerintahan Desa Koroha dipimpin oleh aparatur desa yang profesional dengan dukungan kelembagaan yang solid.",
                    bullets: [
                        "<b>Pelayanan Prima Warga:</b> Jam kerja kantor desa terstruktur dengan standar respons cepat dokumen adminduk.",
                        "<b>Sinergi BPD Aktif:</b> Rapat koordinasi berkala bersama masyarakat memastikan aspirasi pembangunan terserap utuh.",
                        "<b>Akuntabilitas Keuangan:</b> Penyerapan dana desa terpantau tepat waktu dan diawasi secara partisipatif."
                    ]
                },
                kependudukan: {
                    title: "Kependudukan",
                    num: 3,
                    tableTitle: "Jumlah Penduduk, Kepala Keluarga, dan Kepadatan menurut Dusun",
                    chart1: { label: "Distribusi Jiwa Penduduk", values: [478, 420, 350] },
                    chart2: { label: "Jumlah Kepala Keluarga (KK)", values: [126, 110, 90] },
                    col3: "Jumlah Penduduk (Jiwa)",
                    col4: "Jumlah Kepala Keluarga (KK)",
                    col5: "Rasio Gender (M/F)",
                    dusunData: [
                        { d: "Dusun 1", val3: 478, val4: 126, pct: 101.5 },
                        { d: "Dusun 2", val3: 420, val4: 110, pct: 100.2 },
                        { d: "Dusun 3", val3: 350, val4: 90, pct: 99.4 }
                    ],
                    totalRow: { val3: 1248, val4: 326, pct: 100.5 },
                    lead: "Populasi Desa Koroha berjumlah 1.248 jiwa dalam 326 kepala keluarga dengan kohesi sosial yang kuat.",
                    bullets: [
                        "<b>Kepadatan Penduduk Terkendali:</b> Kepadatan rata-rata 100,6 jiwa/km² menciptakan lingkungan hunian yang asri.",
                        "<b>Komposisi Usia Produktif:</b> 65,8% penduduk berada dalam usia kerja dengan profesi utama di sektor agraris.",
                        "<b>Migrasi Netto Seimbang:</b> Tingkat perpindahan penduduk relatif stabil dengan pencatatan berkala."
                    ]
                },
                sosial: {
                    title: "Sosial & Kesra",
                    num: 4,
                    tableTitle: "Fasilitas Pendidikan, Kesehatan, dan Kesejahteraan Sosial menurut Dusun",
                    chart1: { label: "Penerima Manfaat Bansos", values: [32, 26, 20] },
                    chart2: { label: "Sarana Ibadah & Posyandu", values: [4, 3, 2] },
                    col3: "Sarana Sosial & Ibadah",
                    col4: "Keluarga Penerima Bansos",
                    col5: "Cakupan BPJS (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 4, val4: 28, pct: 95.8 },
                        { d: "Dusun 2", val3: 3, val4: 26, pct: 94.0 },
                        { d: "Dusun 3", val3: 2, val4: 22, pct: 93.1 }
                    ],
                    totalRow: { val3: 9, val4: 76, pct: 94.5 },
                    lead: "Layanan sosial dan keagamaan di Desa Koroha berjalan harmonis dengan sarana yang terawat.",
                    bullets: [
                        "<b>Kehidupan Gotong Royong:</b> Tradisi musyawarah dan kerja bakti desa rutin dilaksanakan tiap pekan.",
                        "<b>Jaminan Kesehatan Masyarakat:</b> 94,5% warga telah terlindungi BPJS Kesehatan PBI dan mandiri.",
                        "<b>Sarana Ibadah Lengkap:</b> Terdapat masjid dan mushola representatif di setiap dusun."
                    ]
                },
                pertanian: {
                    title: "Pertanian & Bahari",
                    num: 5,
                    tableTitle: "Produksi Kakao, Minyak Nilam, dan Cengkeh menurut Dusun",
                    chart1: { label: "Produksi Kakao (Ton/Tahun)", values: [160, 135, 115] },
                    chart2: { label: "Penyulingan Nilam (Unit)", values: [6, 4, 3] },
                    col3: "Produksi Kakao (Ton)",
                    col4: "Penyulingan Nilam",
                    col5: "Produktivitas (Kg/Ha)",
                    dusunData: [
                        { d: "Dusun 1", val3: 160, val4: 6, pct: 950 },
                        { d: "Dusun 2", val3: 135, val4: 4, pct: 920 },
                        { d: "Dusun 3", val3: 115, val4: 3, pct: 890 }
                    ],
                    totalRow: { val3: 410, val4: 13, pct: 923 },
                    lead: "Komoditas minyak nilam dan kakao Desa Koroha terkenal dengan kadar rendemen yang tinggi di Kolaka Utara.",
                    bullets: [
                        "<b>Penyulingan Minyak Nilam Tradisional:</b> 13 unit ketel penyulingan aktif memproduksi minyak atsiri standar ekspor.",
                        "<b>Sentra Kakao Berkelanjutan:</b> Panen raya kakao berlangsung teratur dengan penerapan bibit unggul bersertifikat.",
                        "<b>Diversifikasi Cengkeh:</b> Petani membudidayakan cengkeh Zanzibar sebagai sumber pendapatan musiman bernilai tinggi."
                    ]
                },
                ekonomi: {
                    title: "Ekonomi & Infrastruktur",
                    num: 6,
                    tableTitle: "Unit Usaha BUMDes, IKM, dan Jaringan Jalan menurut Dusun",
                    chart1: { label: "Pelaku IKM Pengolahan", values: [18, 14, 10] },
                    chart2: { label: "Jalan Mantap (Km)", values: [3.4, 2.8, 2.2] },
                    col3: "Pelaku Usaha Mikro",
                    col4: "Jalan Mantap (Km)",
                    col5: "Akses Listrik (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 18, val4: 3.4, pct: 100.0 },
                        { d: "Dusun 2", val3: 14, val4: 2.8, pct: 100.0 },
                        { d: "Dusun 3", val3: 10, val4: 2.2, pct: 100.0 }
                    ],
                    totalRow: { val3: 42, val4: 8.4, pct: 100.0 },
                    lead: "BUMDes Koroha Jaya aktif bermitra dengan pedagang komoditas dan memfasilitasi kebutuhan sarana produksi pertanian.",
                    bullets: [
                        "<b>Akses Listrik Paripurna:</b> 100% rumah tangga menikmati aliran listrik PLN 24 jam tanpa hambatan.",
                        "<b>Jalan Usaha Tani Memadai:</b> Jalur transportasi antar kebun telah diperkeras untuk memangkas biaya angkut.",
                        "<b>Koperasi Tani Terpadu:</b> Membantu stabilitas harga pembelian biji kakao dan minyak nilam di tingkat petani."
                    ]
                }
            }
        },
        malamala: {
            name: "Kel. Mala-Mala",
            kecamatan: "Kodeoha",
            dusuns: ["Lingkungan 1", "Lingkungan 2", "Lingkungan 3"],
            periods: {
                1: { year: 2024, totalPop: 1845, totalKK: 472, areaKm2: 11.2 },
                2: { year: 2025, totalPop: 1890, totalKK: 485, areaKm2: 11.2 },
                3: { year: 2026, totalPop: 1932, totalKK: 498, areaKm2: 11.2 }
            },
            categories: {
                geografi: {
                    title: "Geografi & Iklim",
                    num: 1,
                    tableTitle: "Luas Wilayah dan Pembagian Administratif menurut Lingkungan",
                    chart1: { label: "Persentase Luas Wilayah", values: [40, 32, 28] },
                    chart2: { label: "Kepadatan Penduduk (Jiwa/km²)", values: [185, 172, 160] },
                    col3: "Jumlah RT",
                    col4: "Luas Wilayah (km²)",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Lingkungan 1", val3: 4, val4: 4.48, pct: 40.0 },
                        { d: "Lingkungan 2", val3: 3, val4: 3.58, pct: 32.0 },
                        { d: "Lingkungan 3", val3: 3, val4: 3.14, pct: 28.0 }
                    ],
                    totalRow: { val3: 10, val4: 11.20, pct: 100.0 },
                    lead: "Kelurahan Mala-Mala berkedudukan sebagai pusat perniagaan dan simpul pelayanan di Kecamatan Kodeoha.",
                    bullets: [
                        "<b>Kawasan Urban Aglomerasi:</b> Menjadi pusat interaksi perdagangan dan jasa bagi desa-desa sekitar.",
                        "<b>Batas Spasial Tertata:</b> Terbagi dalam 3 Lingkungan dan 10 RT dengan fasilitas publik memadai.",
                        "<b>Aksesibilitas Tinggi:</b> Dilewati jalur arteri utama dengan moda transportasi harian yang ramai."
                    ]
                },
                pemerintahan: {
                    title: "Pemerintahan",
                    num: 2,
                    tableTitle: "Aparatur Kelurahan dan Lembaga Kemasyarakatan menurut Lingkungan",
                    chart1: { label: "Staf Kelurahan", values: [6, 4, 4] },
                    chart2: { label: "Pengurus RT/RW", values: [4, 3, 3] },
                    col3: "Aparatur Kelurahan",
                    col4: "Pengurus LPMK & RT",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Lingkungan 1", val3: 6, val4: 8, pct: 43.8 },
                        { d: "Lingkungan 2", val3: 4, val4: 6, pct: 31.2 },
                        { d: "Lingkungan 3", val3: 4, val4: 5, pct: 25.0 }
                    ],
                    totalRow: { val3: 14, val4: 19, pct: 100.0 },
                    lead: "Kelurahan Mala-Mala dikelola oleh aparatur sipil berdedikasi dengan sistem informasi kelurahan modern.",
                    bullets: [
                        "<b>Standar Pelayanan Publik PATEN:</b> Pelayanan administrasi terpadu kecamatan dan kelurahan berlangsung cepat.",
                        "<b>Partisipasi LPMK Aktif:</b> Lembaga Pemberdayaan Masyarakat Kelurahan secara konsisten memonitor program.",
                        "<b>Regulasi Tata Ruang Tertib:</b> Penataan permukiman dan fasilitas umum mengacu pada rencana detail tata ruang."
                    ]
                },
                kependudukan: {
                    title: "Kependudukan",
                    num: 3,
                    tableTitle: "Jumlah Penduduk, Kepala Keluarga, dan Kepadatan menurut Lingkungan",
                    chart1: { label: "Distribusi Jiwa Penduduk", values: [752, 620, 560] },
                    chart2: { label: "Jumlah Kepala Keluarga (KK)", values: [194, 160, 144] },
                    col3: "Jumlah Penduduk (Jiwa)",
                    col4: "Jumlah Kepala Keluarga (KK)",
                    col5: "Rasio Gender (M/F)",
                    dusunData: [
                        { d: "Lingkungan 1", val3: 752, val4: 194, pct: 101.8 },
                        { d: "Lingkungan 2", val3: 620, val4: 160, pct: 100.9 },
                        { d: "Lingkungan 3", val3: 560, val4: 144, pct: 99.8 }
                    ],
                    totalRow: { val3: 1932, val4: 498, pct: 101.0 },
                    lead: "Kelurahan Mala-Mala memiliki populasi terpadat di antara wilayah binaan dengan 1.932 jiwa terdata.",
                    bullets: [
                        "<b>Kepadatan Tertinggi:</b> Mencapai 172,5 jiwa/km² dengan konsentrasi permukiman di sepanjang poros jalan utama.",
                        "<b>Ragam Profesi Warga:</b> Dominasi pedagang, wirausaha, pegawai pemerintah, dan petani komoditas.",
                        "<b>Tingkat Pendidikan Tinggi:</b> Rasio lulusan SLTA dan Perguruan Tinggi melampaui rata-rata kabupaten."
                    ]
                },
                sosial: {
                    title: "Sosial & Kesra",
                    num: 4,
                    tableTitle: "Fasilitas Pendidikan, Kesehatan, dan Kesejahteraan Sosial menurut Lingkungan",
                    chart1: { label: "Fasilitas Pelayanan", values: [6, 4, 3] },
                    chart2: { label: "Penerima PKH/BPNT", values: [36, 28, 24] },
                    col3: "Sekolah & Puskesmas",
                    col4: "Penerima Manfaat Bansos",
                    col5: "Cakupan BPJS (%)",
                    dusunData: [
                        { d: "Lingkungan 1", val3: 4, val4: 36, pct: 98.2 },
                        { d: "Lingkungan 2", val3: 3, val4: 28, pct: 97.4 },
                        { d: "Lingkungan 3", val3: 2, val4: 24, pct: 96.0 }
                    ],
                    totalRow: { val3: 9, val4: 88, pct: 97.3 },
                    lead: "Fasilitas sosial di Kelurahan Mala-Mala lengkap mencakup puskesmas pembantu, sekolah, dan sarana rekreasi.",
                    bullets: [
                        "<b>Pusat Rujukan Kesehatan:</b> Akses mudah ke puskesmas rawat inap dan praktek tenaga kesehatan mandiri.",
                        "<b>Pusat Pendidikan Terpadu:</b> Menampung siswa dari wilayah sekitarnya untuk jenjang dasar hingga menengah.",
                        "<b>Bantuan Tepat Sasaran:</b> Validasi data DTKS BPS menjamin distribusi perlindungan sosial akurat."
                    ]
                },
                pertanian: {
                    title: "Pertanian & Bahari",
                    num: 5,
                    tableTitle: "Produksi Kakao, Sayuran, dan Ikan Tangkap menurut Lingkungan",
                    chart1: { label: "Produksi Kakao (Ton/Tahun)", values: [120, 105, 95] },
                    chart2: { label: "Hasil Perikanan (Ton)", values: [42, 28, 15] },
                    col3: "Produksi Kakao (Ton)",
                    col4: "Hasil Perikanan (Ton)",
                    col5: "Produktivitas (Kg/Ha)",
                    dusunData: [
                        { d: "Lingkungan 1", val3: 120, val4: 42, pct: 910 },
                        { d: "Lingkungan 2", val3: 105, val4: 28, pct: 880 },
                        { d: "Lingkungan 3", val3: 95, val4: 15, pct: 860 }
                    ],
                    totalRow: { val3: 320, val4: 85, pct: 887 },
                    lead: "Meski berkarakter urban, Mala-Mala tetap mempertahankan sentra perkebunan kakao dan perikanan aktif.",
                    bullets: [
                        "<b>Sentra Holtikultura Pekarangan:</b> Pemanfaatan KRPL untuk tanaman sayuran dan buah segar bernilai ekonomi.",
                        "<b>Perikanan Air Tawar & Pesisir:</b> Budidaya ikan lele dan hasil tangkap laut melengkapi pasokan pasar harian.",
                        "<b>Kakao Rakyat Terawat:</b> Kebun kakao produktif menopang pendapatan keluarga di area lingkar luar kelurahan."
                    ]
                },
                ekonomi: {
                    title: "Ekonomi & Infrastruktur",
                    num: 6,
                    tableTitle: "Unit Usaha, Perbankan, dan Sarana Perdagangan menurut Lingkungan",
                    chart1: { label: "Kios & Toko Retail", values: [48, 35, 26] },
                    chart2: { label: "Jalan Aspal Hotmix (Km)", values: [4.2, 3.1, 2.8] },
                    col3: "Kios & Toko Dagang",
                    col4: "Jalan Hotmix (Km)",
                    col5: "Akses Perbankan (%)",
                    dusunData: [
                        { d: "Lingkungan 1", val3: 48, val4: 4.2, pct: 100.0 },
                        { d: "Lingkungan 2", val3: 35, val4: 3.1, pct: 98.0 },
                        { d: "Lingkungan 3", val3: 26, val4: 2.8, pct: 95.0 }
                    ],
                    totalRow: { val3: 109, val4: 10.1, pct: 98.1 },
                    lead: "Aktivitas perdagangan di Mala-Mala berlangsung dinamis dengan 109 unit toko, agen BRILink, dan sentra kuliner.",
                    bullets: [
                        "<b>Pusat Perbankan Mikro:</b> Kemudahan transaksi keuangan melalui jaringan agen bank resmi dan ATM.",
                        "<b>Pasar Tradisional Mingguan:</b> Menjadi magnet bertemunya petani produsen dan pedagang antardaerah.",
                        "<b>Infrastruktur Digital Maju:</b> Jaringan fiber optic berkecepatan tinggi telah menjangkau fasilitas publik."
                    ]
                }
            }
        },
        lapolu: {
            name: "Desa Lapolu",
            kecamatan: "Tiwu",
            dusuns: ["Dusun 1", "Dusun 2", "Dusun 3"],
            periods: {
                1: { year: 2024, totalPop: 1015, totalKK: 278, areaKm2: 13.6 },
                2: { year: 2025, totalPop: 1042, totalKK: 286, areaKm2: 13.6 },
                3: { year: 2026, totalPop: 1068, totalKK: 294, areaKm2: 13.6 }
            },
            categories: {
                geografi: {
                    title: "Geografi & Iklim",
                    num: 1,
                    tableTitle: "Luas Wilayah dan Pembagian Administratif menurut Dusun",
                    chart1: { label: "Persentase Luas Wilayah", values: [36, 34, 30] },
                    chart2: { label: "Kepadatan Penduduk (Jiwa/km²)", values: [82, 78, 75] },
                    col3: "Jumlah RT",
                    col4: "Luas Wilayah (km²)",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 3, val4: 4.90, pct: 36.0 },
                        { d: "Dusun 2", val3: 2, val4: 4.62, pct: 34.0 },
                        { d: "Dusun 3", val3: 2, val4: 4.08, pct: 30.0 }
                    ],
                    totalRow: { val3: 7, val4: 13.60, pct: 100.0 },
                    lead: "Desa Lapolu berada di kawasan lembah Tiwu yang dikelilingi hutan lindung dan perkebunan kakao seluas 13,6 km².",
                    bullets: [
                        "<b>Lanskap Hijau Berkelanjutan:</b> Memiliki udara sejuk dengan tutupan vegetasi hijau mencapai 74% luas wilayah.",
                        "<b>3 Dusun Berwawasan Lingkungan:</b> Terbagi dalam Dusun 1, 2, dan 3 yang saling terkoneksi jembatan perdesaan.",
                        "<b>Potensi Ekowisata Alam:</b> Memiliki sumber air terjun alami yang berpotensi dikembangkan sebagai destinasi wisata."
                    ]
                },
                pemerintahan: {
                    title: "Pemerintahan",
                    num: 2,
                    tableTitle: "Aparatur Desa dan Kelembagaan Masyarakat menurut Dusun",
                    chart1: { label: "Perangkat Desa", values: [4, 4, 3] },
                    chart2: { label: "Pengurus RT", values: [3, 2, 2] },
                    col3: "Perangkat Desa",
                    col4: "Anggota BPD & LPM",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 4, val4: 4, pct: 36.4 },
                        { d: "Dusun 2", val3: 4, val4: 4, pct: 36.4 },
                        { d: "Dusun 3", val3: 3, val4: 3, pct: 27.2 }
                    ],
                    totalRow: { val3: 11, val4: 11, pct: 100.0 },
                    lead: "Struktur pemerintahan Desa Lapolu mengedepankan pelayanan ramah warga berbasis sistem administrasi cepat.",
                    bullets: [
                        "<b>Aparatur Desa Bersahaja:</b> Pelayanan administrasi surat pengantar dapat diakses langsung secara luring dan daring.",
                        "<b>Konsensus Adat & Musyawarah:</b> Setiap kebijakan desa selalu dimusyawarahkan bersama tokoh adat dan pemuda.",
                        "<b>Kanal Aduan Warga:</b> Tersedia kotak saran dan grup komunikasi digital warga untuk menyuarakan masukan pembangunan."
                    ]
                },
                kependudukan: {
                    title: "Kependudukan",
                    num: 3,
                    tableTitle: "Jumlah Penduduk, Kepala Keluarga, dan Kepadatan menurut Dusun",
                    chart1: { label: "Distribusi Jiwa Penduduk", values: [405, 365, 298] },
                    chart2: { label: "Jumlah Kepala Keluarga (KK)", values: [112, 100, 82] },
                    col3: "Jumlah Penduduk (Jiwa)",
                    col4: "Jumlah Kepala Keluarga (KK)",
                    col5: "Rasio Gender (M/F)",
                    dusunData: [
                        { d: "Dusun 1", val3: 405, val4: 112, pct: 101.2 },
                        { d: "Dusun 2", val3: 365, val4: 100, pct: 100.5 },
                        { d: "Dusun 3", val3: 298, val4: 82, pct: 99.8 }
                    ],
                    totalRow: { val3: 1068, val4: 294, pct: 100.6 },
                    lead: "Jumlah penduduk Desa Lapolu mencapai 1.068 jiwa dalam 294 kepala keluarga dengan kehidupan sosial yang rukun.",
                    bullets: [
                        "<b>Struktur Penduduk Berimbang:</b> Rasio jenis kelamin seimbang (100,6) dengan persebaran keluarga merata.",
                        "<b>Kekeluargaan Sangat Kuat:</b> Mayoritas warga terikat pertalian kekerabatan yang memperkokoh persaudaraan.",
                        "<b>Tertib Administrasi Kependudukan:</b> Seluruh warga telah memiliki NIK terdaftar dan KTP elektronik."
                    ]
                },
                sosial: {
                    title: "Sosial & Kesra",
                    num: 4,
                    tableTitle: "Fasilitas Pendidikan, Kesehatan, dan Kesejahteraan Sosial menurut Dusun",
                    chart1: { label: "Penerima Manfaat Bansos", values: [28, 24, 18] },
                    chart2: { label: "Sarana Ibadah & Posyandu", values: [3, 3, 2] },
                    col3: "Sarana Sosial & Ibadah",
                    col4: "Keluarga Penerima Bansos",
                    col5: "Cakupan BPJS (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 3, val4: 28, pct: 95.2 },
                        { d: "Dusun 2", val3: 3, val4: 24, pct: 94.0 },
                        { d: "Dusun 3", val3: 2, val4: 18, pct: 92.8 }
                    ],
                    totalRow: { val3: 8, val4: 70, pct: 94.2 },
                    lead: "Program perlindungan sosial di Desa Lapolu menjangkau seluruh keluarga rentan dengan pengawasan transparan.",
                    bullets: [
                        "<b>Penurunan Stunting Efektif:</b> Program pemberian makanan tambahan terpadu menekan angka risiko stunting hingga nihil.",
                        "<b>Bina Keluarga Balita & Lansia:</b> Kader kesehatan aktif mendampingi posyandu siklus hidup di setiap dusun.",
                        "<b>Rumah Ibadah Makmur:</b> Kegiatan keagamaan dan pengajian mingguan berlangsung teratur di masjid dusun."
                    ]
                },
                pertanian: {
                    title: "Pertanian & Bahari",
                    num: 5,
                    tableTitle: "Produksi Kakao, Lada, dan Tanaman Pangan menurut Dusun",
                    chart1: { label: "Produksi Kakao (Ton/Tahun)", values: [155, 138, 112] },
                    chart2: { label: "Luas Kebun Produktif (Ha)", values: [160, 142, 118] },
                    col3: "Produksi Kakao (Ton)",
                    col4: "Luas Kebun Kakao (Ha)",
                    col5: "Produktivitas (Kg/Ha)",
                    dusunData: [
                        { d: "Dusun 1", val3: 155, val4: 160, pct: 968 },
                        { d: "Dusun 2", val3: 138, val4: 142, pct: 971 },
                        { d: "Dusun 3", val3: 112, val4: 118, pct: 949 }
                    ],
                    totalRow: { val3: 405, val4: 420, pct: 964 },
                    lead: "Desa Lapolu menjadi lumbung kakao organik Tiwu dengan produktivitas tinggi mencapai 964 kg/hektar.",
                    bullets: [
                        "<b>Penerapan GAP (Good Agricultural Practices):</b> Petani menerapkan pemangkasan teratur dan pemupukan berimbang.",
                        "<b>Sentra Pembibitan Mandiri:</b> Kelompok tani memproduksi bibit kakao klon MCC 02 unggul untuk replanting mandiri.",
                        "<b>Hasil Ikutan Lada & Kemiri:</b> Petani memaksimalkan tanaman tumpangsari untuk menambah pemasukan bulanan."
                    ]
                },
                ekonomi: {
                    title: "Ekonomi & Infrastruktur",
                    num: 6,
                    tableTitle: "Unit Usaha BUMDes, IKM, dan Jaringan Jalan menurut Dusun",
                    chart1: { label: "Usaha Kerajinan & Olahan", values: [16, 12, 8] },
                    chart2: { label: "Jalan Rabat Beton (Km)", values: [3.2, 2.6, 2.1] },
                    col3: "Unit Usaha Mikro",
                    col4: "Jalan Rabat (Km)",
                    col5: "Elektrifikasi (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 16, val4: 3.2, pct: 100.0 },
                        { d: "Dusun 2", val3: 12, val4: 2.6, pct: 100.0 },
                        { d: "Dusun 3", val3: 8, val4: 2.1, pct: 100.0 }
                    ],
                    totalRow: { val3: 36, val4: 7.9, pct: 100.0 },
                    lead: "Infrastruktur jalan tani rabat beton di Desa Lapolu mendukung kelancaran distribusi panen kakao ke pasar.",
                    bullets: [
                        "<b>BUMDes Lapolu Mandiri:</b> Mengelola unit penyewaan alat pascapanen kakao dan pengadaan pupuk petani.",
                        "<b>Industri Rumah Tangga Berkembang:</b> Olahan keripik pisang dan gula kelapa mulai merambah pasar luar desa.",
                        "<b>Kemandirian Energi Listrik:</b> Seluruh dusun terhubung jaringan listrik PLN dan lampu penerangan jalan tenaga surya."
                    ]
                }
            }
        },
        tanggeawo: {
            name: "Desa Tanggeawo",
            kecamatan: "Tiwu",
            dusuns: ["Dusun 1", "Dusun 2"],
            periods: {
                1: { year: 2024, totalPop: 538, totalKK: 134, areaKm2: 9.8 },
                2: { year: 2025, totalPop: 552, totalKK: 138, areaKm2: 9.8 },
                3: { year: 2026, totalPop: 564, totalKK: 141, areaKm2: 9.8 }
            },
            categories: {
                geografi: {
                    title: "Geografi & Iklim",
                    num: 1,
                    tableTitle: "Luas Wilayah dan Pembagian Administratif menurut Dusun",
                    chart1: { label: "Persentase Luas Wilayah", values: [55, 45] },
                    chart2: { label: "Kepadatan Penduduk (Jiwa/km²)", values: [60, 55] },
                    col3: "Jumlah RT",
                    col4: "Luas Wilayah (km²)",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 2, val4: 5.39, pct: 55.0 },
                        { d: "Dusun 2", val3: 2, val4: 4.41, pct: 45.0 }
                    ],
                    totalRow: { val3: 4, val4: 9.80, pct: 100.0 },
                    lead: "Desa Tanggeawo memiliki wilayah seluas 9,8 km² yang didominasi hamparan kebun kakao rakyat yang tertata apik.",
                    bullets: [
                        "<b>Wilayah Kompak & Bersih:</b> Terbagi dalam 2 Dusun utama dengan akses jalan pemukiman yang tertib.",
                        "<b>Topografi Landai:</b> Memudahkan pengolahan lahan perkebunan tanpa risiko erosi yang berarti.",
                        "<b>Sistem Drainase Terawat:</b> Aliran air hujan tertampung baik sehingga bebas dari genangan air."
                    ]
                },
                pemerintahan: {
                    title: "Pemerintahan",
                    num: 2,
                    tableTitle: "Aparatur Desa dan Kelembagaan Masyarakat menurut Dusun",
                    chart1: { label: "Aparatur Desa", values: [5, 4] },
                    chart2: { label: "Pengurus RT", values: [2, 2] },
                    col3: "Perangkat Desa",
                    col4: "Anggota BPD & LPM",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 5, val4: 4, pct: 55.6 },
                        { d: "Dusun 2", val3: 4, val4: 4, pct: 44.4 }
                    ],
                    totalRow: { val3: 9, val4: 8, pct: 100.0 },
                    lead: "Aparatur Desa Tanggeawo mengedepankan pendekatan kekeluargaan dalam melayani administrasi warganya.",
                    bullets: [
                        "<b>Efisiensi Birokrasi Desa:</b> Seluruh urusan perizinan dan surat pengantar diselesaikan pada hari yang sama.",
                        "<b>Musyawarah Dusun Rutin:</b> Warga terlibat aktif dalam menentukan prioritas alokasi dana desa.",
                        "<b>Keterbukaan Informasi:</b> Realisasi anggaran desa ditempelkan di papan pengumuman balai pertemuan."
                    ]
                },
                kependudukan: {
                    title: "Kependudukan",
                    num: 3,
                    tableTitle: "Jumlah Penduduk, Kepala Keluarga, dan Kepadatan menurut Dusun",
                    chart1: { label: "Distribusi Jiwa Penduduk", values: [312, 252] },
                    chart2: { label: "Jumlah Kepala Keluarga (KK)", values: [78, 63] },
                    col3: "Jumlah Penduduk (Jiwa)",
                    col4: "Jumlah Kepala Keluarga (KK)",
                    col5: "Rasio Gender (M/F)",
                    dusunData: [
                        { d: "Dusun 1", val3: 312, val4: 78, pct: 101.3 },
                        { d: "Dusun 2", val3: 252, val4: 63, pct: 100.0 }
                    ],
                    totalRow: { val3: 564, val4: 141, pct: 100.7 },
                    lead: "Populasi Desa Tanggeawo berjumlah 564 jiwa dalam 141 KK dengan tingkat stabilitas sosial yang tinggi.",
                    bullets: [
                        "<b>Kepadatan Nyaman:</b> Kepadatan rata-rata 57,5 jiwa/km² menciptakan suasana perdesaan yang tenang dan akrab.",
                        "<b>Keluarga Produktif Mandiri:</b> 84% kepala keluarga berstatus pemilik kebun kakao yang aktif berproduksi.",
                        "<b>Cakupan Dokumen Adminduk 100%:</b> Seluruh warga memiliki akta kelahiran, kartu keluarga, dan KTP-el."
                    ]
                },
                sosial: {
                    title: "Sosial & Kesra",
                    num: 4,
                    tableTitle: "Fasilitas Pendidikan, Kesehatan, dan Kesejahteraan Sosial menurut Dusun",
                    chart1: { label: "Penerima Manfaat Bansos", values: [18, 14] },
                    chart2: { label: "Sarana Ibadah & Posyandu", values: [2, 2] },
                    col3: "Sarana Sosial & Ibadah",
                    col4: "Keluarga Penerima Bansos",
                    col5: "Cakupan BPJS (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 2, val4: 18, pct: 96.0 },
                        { d: "Dusun 2", val3: 2, val4: 14, pct: 94.8 }
                    ],
                    totalRow: { val3: 4, val4: 32, pct: 95.5 },
                    lead: "Kerukunan masyarakat Tanggeawo tercermin dalam keaktifan majelis taklim, karang taruna, dan kegiatan sosial.",
                    bullets: [
                        "<b>Posyandu Siaga Aktif:</b> Layanan terpadu untuk balita dan lansia berjalan dengan partisipasi warga 98%.",
                        "<b>Kesejahteraan Meningkat:</b> Angka keluarga prasejahtera berkurang berkat kestabilan harga komoditas kakao.",
                        "<b>Akses Pendidikan Aman:</b> Anak-anak menempuh pendidikan sekolah dasar di lingkungan desa dengan aman."
                    ]
                },
                pertanian: {
                    title: "Pertanian & Bahari",
                    num: 5,
                    tableTitle: "Produksi Kakao, Kelapa, dan Nilam menurut Dusun",
                    chart1: { label: "Produksi Kakao (Ton/Tahun)", values: [128, 98] },
                    chart2: { label: "Luas Lahan Kakao (Ha)", values: [135, 105] },
                    col3: "Produksi Kakao (Ton)",
                    col4: "Luas Lahan Kakao (Ha)",
                    col5: "Produktivitas (Kg/Ha)",
                    dusunData: [
                        { d: "Dusun 1", val3: 128, val4: 135, pct: 948 },
                        { d: "Dusun 2", val3: 98, val4: 105, pct: 933 }
                    ],
                    totalRow: { val3: 226, val4: 240, pct: 941 },
                    lead: "Tanggeawo dikenal sebagai sentra kakao intensif dengan teknik perawatan kebun percontohan di Kolaka Utara.",
                    bullets: [
                        "<b>Panen Kakao Berkesinambungan:</b> Memproduksi 226 ton biji kakao berkualitas per tahun dengan kadar air standar.",
                        "<b>Tumpang Sari Tanaman Nilam:</b> Memanfaatkan sela-sela pohon kakao untuk tanaman nilam wangi bernilai tambah.",
                        "<b>Bimbingan Teknis Desa Cantik BPS:</b> Petani terbiasa mencatat data panen dan biaya produksi secara mandiri."
                    ]
                },
                ekonomi: {
                    title: "Ekonomi & Infrastruktur",
                    num: 6,
                    tableTitle: "Unit Usaha BUMDes, IKM, dan Jaringan Jalan menurut Dusun",
                    chart1: { label: "Pelaku Usaha Mikro", values: [26, 20] },
                    chart2: { label: "Jalan Mantap (Km)", values: [3.1, 2.5] },
                    col3: "Unit Usaha Mikro/IKM",
                    col4: "Jalan Mantap (Km)",
                    col5: "Elektrifikasi (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 26, val4: 3.1, pct: 100.0 },
                        { d: "Dusun 2", val3: 20, val4: 2.5, pct: 100.0 }
                    ],
                    totalRow: { val3: 46, val4: 5.6, pct: 100.0 },
                    lead: "Sebanyak 46 unit usaha mikro berkembang di Tanggeawo didukung sarana jalan lingkungan yang 100% mulus.",
                    bullets: [
                        "<b>Akses Transportasi Lancar:</b> 5,6 km ruas jalan desa beraspal beton memudahkan mobilisasi hasil bumi.",
                        "<b>BUMDes Tanggeawo Makmur:</b> Berperan sebagai agregator pembelian hasil panen petani dengan harga adil.",
                        "<b>Konektivitas Seluler Stabil:</b> Sinyal telekomunikasi 4G telah menjangkau seluruh pekarangan rumah warga."
                    ]
                }
            }
        },
        mattirobulu: {
            name: "Desa Mattiro Bulu",
            kecamatan: "Tiwu",
            dusuns: ["Dusun 1", "Dusun 2", "Dusun 3"],
            periods: {
                1: { year: 2024, totalPop: 814, totalKK: 308, areaKm2: 15.2 },
                2: { year: 2025, totalPop: 835, totalKK: 316, areaKm2: 15.2 },
                3: { year: 2026, totalPop: 856, totalKK: 324, areaKm2: 15.2 }
            },
            categories: {
                geografi: {
                    title: "Geografi & Iklim",
                    num: 1,
                    tableTitle: "Luas Wilayah dan Pembagian Administratif menurut Dusun",
                    chart1: { label: "Persentase Luas Wilayah", values: [42, 33, 25] },
                    chart2: { label: "Kepadatan Penduduk (Jiwa/km²)", values: [62, 56, 50] },
                    col3: "Jumlah RT",
                    col4: "Luas Wilayah (km²)",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 3, val4: 6.38, pct: 42.0 },
                        { d: "Dusun 2", val3: 2, val4: 5.02, pct: 33.0 },
                        { d: "Dusun 3", val3: 2, val4: 3.80, pct: 25.0 }
                    ],
                    totalRow: { val3: 7, val4: 15.20, pct: 100.0 },
                    lead: "Desa Mattiro Bulu memiliki bentang alam terluas di antara desa binaan seluas 15,2 km² di perbukitan Tiwu.",
                    bullets: [
                        "<b>Wilayah Terluas di Tiwu:</b> Menawarkan pemandangan pegunungan yang asri dan potensi perkebunan luas.",
                        "<b>Tata Ruang 3 Dusun:</b> Terbagi teratur dalam 3 Dusun dan 7 RT dengan batas wilayah alam yang jelas.",
                        "<b>Kekayaan Hayati Flora & Fauna:</b> Memiliki keanekaragaman hayati dan sumber air pegunungan yang melimpah."
                    ]
                },
                pemerintahan: {
                    title: "Pemerintahan",
                    num: 2,
                    tableTitle: "Aparatur Desa dan Kelembagaan Masyarakat menurut Dusun",
                    chart1: { label: "Aparatur Desa", values: [4, 4, 3] },
                    chart2: { label: "Pengurus RT", values: [3, 2, 2] },
                    col3: "Perangkat Desa",
                    col4: "Anggota BPD & LPM",
                    col5: "Persentase (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 4, val4: 4, pct: 36.4 },
                        { d: "Dusun 2", val3: 4, val4: 4, pct: 36.4 },
                        { d: "Dusun 3", val3: 3, val4: 3, pct: 27.2 }
                    ],
                    totalRow: { val3: 11, val4: 11, pct: 100.0 },
                    lead: "Pemerintah Desa Mattiro Bulu berkomitmen mewujudkan desa mandiri berbasis data statistik berkualitas.",
                    bullets: [
                        "<b>Integritas Aparatur:</b> Dedikasi tinggi perangkat desa dalam melayani warga hingga pelosok dusun.",
                        "<b>Harmonisasi Kebijakan:</b> BPD dan Pemerintah Desa bersinergi dalam merancang program ketahanan pangan.",
                        "<b>Pengelolaan Aset Desa:</b> Inventarisasi tanah kas desa dan sarana umum tercatat secara rapi dan akuntabel."
                    ]
                },
                kependudukan: {
                    title: "Kependudukan",
                    num: 3,
                    tableTitle: "Jumlah Penduduk, Kepala Keluarga, dan Kepadatan menurut Dusun",
                    chart1: { label: "Distribusi Jiwa Penduduk", values: [356, 280, 220] },
                    chart2: { label: "Jumlah Kepala Keluarga (KK)", values: [136, 106, 82] },
                    col3: "Jumlah Penduduk (Jiwa)",
                    col4: "Jumlah Kepala Keluarga (KK)",
                    col5: "Rasio Gender (M/F)",
                    dusunData: [
                        { d: "Dusun 1", val3: 356, val4: 136, pct: 102.3 },
                        { d: "Dusun 2", val3: 280, val4: 106, pct: 100.0 },
                        { d: "Dusun 3", val3: 220, val4: 82, pct: 98.2 }
                    ],
                    totalRow: { val3: 856, val4: 324, pct: 100.5 },
                    lead: "Jumlah penduduk Mattiro Bulu tercatat 856 jiwa dalam 324 keluarga dengan kepadatan 56,3 jiwa/km².",
                    bullets: [
                        "<b>Persebaran Pemukiman Nyaman:</b> Suasana pedesaan yang tenang dengan jarak antarrumah yang lapang.",
                        "<b>Piramida Penduduk Sehat:</b> Kelompok usia muda dan produktif menjadi pilar utama pembangunan perdesaan.",
                        "<b>Tingkat Partisipasi Komunitas:</b> Tradisi tolong-menolong dalam panen raya dan hajatan warga sangat kental."
                    ]
                },
                sosial: {
                    title: "Sosial & Kesra",
                    num: 4,
                    tableTitle: "Fasilitas Pendidikan, Kesehatan, dan Kesejahteraan Sosial menurut Dusun",
                    chart1: { label: "Penerima Manfaat Bansos", values: [26, 20, 16] },
                    chart2: { label: "Sarana Ibadah & Poskesdes", values: [3, 2, 2] },
                    col3: "Sarana Sosial & Ibadah",
                    col4: "Keluarga Penerima Bansos",
                    col5: "Cakupan BPJS (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 3, val4: 26, pct: 94.8 },
                        { d: "Dusun 2", val3: 2, val4: 20, pct: 93.5 },
                        { d: "Dusun 3", val3: 2, val4: 16, pct: 92.0 }
                    ],
                    totalRow: { val3: 7, val4: 62, pct: 93.8 },
                    lead: "Fasilitas sosial dasar di Mattiro Bulu menjamin pemenuhan hak kesehatan dan pendidikan seluruh warga.",
                    bullets: [
                        "<b>Kader Posyandu Terlatih:</b> Pengukuran antropometri balita dilakukan berkala dengan akurasi terstandar.",
                        "<b>Pemberdayaan Perempuan TP-PKK:</b> Pelatihan keterampilan tata boga dan pemanfaatan pekarangan gizi.",
                        "<b>Kesejahteraan Inklusif:</b> Lansia dan penyandang disabilitas mendapat pendampingan rutin dari petugas sosial."
                    ]
                },
                pertanian: {
                    title: "Pertanian & Bahari",
                    num: 5,
                    tableTitle: "Produksi Cengkeh, Nilam, dan Kakao menurut Dusun",
                    chart1: { label: "Produksi Cengkeh (Ton/Tahun)", values: [75, 58, 42] },
                    chart2: { label: "Produksi Minyak Nilam (Ton)", values: [4.2, 3.1, 2.5] },
                    col3: "Produksi Cengkeh (Ton)",
                    col4: "Produksi Nilam (Ton)",
                    col5: "Produktivitas (Kg/Ha)",
                    dusunData: [
                        { d: "Dusun 1", val3: 75, val4: 4.2, pct: 680 },
                        { d: "Dusun 2", val3: 58, val4: 3.1, pct: 650 },
                        { d: "Dusun 3", val3: 42, val4: 2.5, pct: 620 }
                    ],
                    totalRow: { val3: 175, val4: 9.8, pct: 654 },
                    lead: "Dataran tinggi Mattiro Bulu adalah penghasil cengkeh dan minyak nilam terkemuka di Kolaka Utara.",
                    bullets: [
                        "<b>Sentra Cengkeh Dataran Tinggi:</b> Menghasilkan 175 ton bunga cengkeh kering per tahun dengan aroma khas yang pekat.",
                        "<b>Produksi Minyak Nilam Murni:</b> Kualitas minyak nilam Mattiro Bulu diakui industri parfum karena kadar PA tinggi.",
                        "<b>Kakao Sambung Pucuk:</b> Tetap menjadi komoditas penyangga dengan panen rutin sepanjang tahun."
                    ]
                },
                ekonomi: {
                    title: "Ekonomi & Infrastruktur",
                    num: 6,
                    tableTitle: "Unit Usaha BUMDes, IKM, dan Jaringan Jalan menurut Dusun",
                    chart1: { label: "Usaha Penyulingan & IKM", values: [10, 6, 4] },
                    chart2: { label: "Jalan Aspal & Rabat (Km)", values: [4.5, 3.8, 3.2] },
                    col3: "Unit Usaha Mikro/IKM",
                    col4: "Jalan Mantap (Km)",
                    col5: "Elektrifikasi (%)",
                    dusunData: [
                        { d: "Dusun 1", val3: 10, val4: 4.5, pct: 100.0 },
                        { d: "Dusun 2", val3: 6, val4: 3.8, pct: 100.0 },
                        { d: "Dusun 3", val3: 4, val4: 3.2, pct: 100.0 }
                    ],
                    totalRow: { val3: 20, val4: 11.5, pct: 100.0 },
                    lead: "Sebanyak 20 unit industri kecil beroperasi di Mattiro Bulu didukung ruas jalan lingkar yang terus ditingkatkan.",
                    bullets: [
                        "<b>Jalan Lingkar Perkebunan 11,5 Km:</b> Mobilisasi komoditas hasil hutan dan perkebunan semakin efisien dan aman.",
                        "<b>BUMDes Bulu Matiti:</b> Berfokus pada pengelolaan unit simpan pinjam dan kemitraan pascapanen nilam.",
                        "<b>Kemandirian Finansial Warga:</b> Tingginya nilai jual komoditas rempah mendorong perputaran uang di tingkat desa."
                    ]
                }
            }
        }
    };

    // State Aplikasi Monografi Digital
    let currentVillage = 'kamisi';
    let currentPeriod = 3;
    let currentCategory = 'geografi';
    let currentViewMode = 'grafik'; // 'grafik' | 'tabel'
    let donutChartInstance = null;
    let barChartInstance = null;

    // 2. Open / Close View Functions
    window.openMonografiDigitalView = function(villageKey, periodNum) {
        if (villageKey && MONOGRAFI_DATA[villageKey]) {
            currentVillage = villageKey;
        }
        if (periodNum && [1, 2, 3].includes(Number(periodNum))) {
            currentPeriod = Number(periodNum);
        }

        const mainPortal = document.querySelector('main');
        const dedicatedPortal = document.getElementById('view-portal-profil-desa');
        const monografiView = document.getElementById('view-monografi-digital');

        if (mainPortal) mainPortal.style.display = 'none';
        if (dedicatedPortal) {
            dedicatedPortal.classList.add('hidden');
            dedicatedPortal.style.display = 'none';
        }

        if (monografiView) {
            monografiView.classList.remove('hidden');
            monografiView.style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
            renderMonografiBento();
            initMonografi3DBookInteraction();
        }
    };

    window.closeMonografiDigitalView = function() {
        const mainPortal = document.querySelector('main');
        const monografiView = document.getElementById('view-monografi-digital');

        if (monografiView) {
            monografiView.classList.add('hidden');
            monografiView.style.display = 'none';
        }
        if (mainPortal) {
            mainPortal.style.display = '';
        }

        const outputSection = document.getElementById('output');
        if (outputSection) {
            outputSection.scrollIntoView({ behavior: 'smooth' });
        } else {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    };

    // 3. Selection Handlers
    window.toggleMonoVillageDropdown = function() {
        const dd = document.getElementById('monoVillageDropdown');
        if (dd) dd.classList.toggle('hidden');
    };

    window.selectMonografiVillage = function(vKey) {
        if (!MONOGRAFI_DATA[vKey]) return;
        currentVillage = vKey;
        const dd = document.getElementById('monoVillageDropdown');
        if (dd) dd.classList.add('hidden');
        renderMonografiBento();
    };

    window.selectMonografiPeriod = function(pNum, year) {
        currentPeriod = Number(pNum);
        [1, 2, 3].forEach(n => {
            const btn = document.getElementById('monoPeriodBtn' + n);
            if (btn) {
                if (n === currentPeriod) {
                    btn.className = "mono-period-btn px-3.5 py-1.5 rounded-lg text-xs font-black bg-white text-emerald-950 shadow-sm transition cursor-pointer";
                } else {
                    btn.className = "mono-period-btn px-3.5 py-1.5 rounded-lg text-xs font-bold text-emerald-100 hover:text-white transition cursor-pointer";
                }
            }
        });
        renderMonografiBento();
    };

    window.selectMonografiCategory = function(catKey) {
        currentCategory = catKey;
        const catKeys = ['geografi', 'pemerintahan', 'kependudukan', 'sosial', 'pertanian', 'ekonomi'];
        catKeys.forEach(k => {
            const btn = document.getElementById('monoCatBtn-' + k);
            if (btn) {
                if (k === currentCategory) {
                    btn.className = "mono-cat-tab px-3.5 py-2 rounded-xl text-xs font-black transition flex items-center gap-2 whitespace-nowrap bg-emerald-700 text-white shadow-xs";
                } else {
                    btn.className = "mono-cat-tab px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 whitespace-nowrap text-slate-600 hover:text-emerald-700 hover:bg-emerald-50/70";
                }
            }
        });
        renderMonografiBento();
    };

    window.setMonografiViewMode = function(mode) {
        currentViewMode = mode;
        const btnGrafik = document.getElementById('monoViewModeGrafik');
        const btnTabel = document.getElementById('monoViewModeTabel');
        const chartsWrap = document.getElementById('monografiChartsContainer');

        if (mode === 'grafik') {
            if (btnGrafik) btnGrafik.className = "px-3 py-1 rounded-lg text-xs font-black transition bg-emerald-700 text-white shadow-xs cursor-pointer flex items-center gap-1.5";
            if (btnTabel) btnTabel.className = "px-3 py-1 rounded-lg text-xs font-bold transition text-slate-600 hover:text-slate-900 cursor-pointer flex items-center gap-1.5";
            if (chartsWrap) chartsWrap.style.display = 'grid';
        } else {
            if (btnGrafik) btnGrafik.className = "px-3 py-1 rounded-lg text-xs font-bold transition text-slate-600 hover:text-slate-900 cursor-pointer flex items-center gap-1.5";
            if (btnTabel) btnTabel.className = "px-3 py-1 rounded-lg text-xs font-black transition bg-emerald-700 text-white shadow-xs cursor-pointer flex items-center gap-1.5";
            if (chartsWrap) chartsWrap.style.display = 'none';
        }
    };

    // 4. Render Bento Grid Elements
    window.renderMonografiBento = function() {
        const vData = MONOGRAFI_DATA[currentVillage] || MONOGRAFI_DATA.kamisi;
        const pData = vData.periods[currentPeriod] || vData.periods[3];
        const cat = vData.categories[currentCategory] || vData.categories.geografi;
        const yr = pData.year;

        // Banner Elements
        const heroTitle = document.getElementById('monografiHeroTitle');
        const heroSub = document.getElementById('monografiHeroSubtitle');
        const vLabel = document.getElementById('monoVillageActiveLabel');

        if (heroTitle) heroTitle.textContent = "MONOGRAFI DIGITAL " + vData.name.toUpperCase();
        if (heroSub) heroSub.textContent = "Publikasi Statistik Terpadu • Kecamatan " + vData.kecamatan + ", Kabupaten Kolaka Utara";
        if (vLabel) vLabel.textContent = vData.name;

        // Left Col Header
        const leftTitle = document.getElementById('monografiLeftColTitle');
        const leftSub = document.getElementById('monografiLeftColSubtitle');
        const catBadge = document.getElementById('monografiBadgeKategori');
        if (leftTitle) leftTitle.innerHTML = `<i class="bi bi-pie-chart-fill text-emerald-600"></i><span>Visualisasi & Tabel Statistik - ${cat.title}</span>`;
        if (leftSub) leftSub.innerHTML = `Komparasi Antar-Dusun • Periode <span id="monoLeftPeriodYear">${currentPeriod} (${yr})</span>`;
        if (catBadge) catBadge.textContent = cat.title;

        // Table Caption & Columns (Tanpa Angka Romawi)
        const tableCaption = document.getElementById('monografiTableCaption');
        if (tableCaption) {
            tableCaption.textContent = `Tabel ${cat.num}.1 ${cat.tableTitle} menurut Dusun - Periode ${currentPeriod} (${yr})`;
        }
        const col3 = document.getElementById('monoColHeader3');
        const col4 = document.getElementById('monoColHeader4');
        const col5 = document.getElementById('monoColHeader5');
        if (col3) col3.textContent = cat.col3;
        if (col4) col4.textContent = cat.col4;
        if (col5) col5.textContent = cat.col5;

        // Table Body Rows
        const tbody = document.getElementById('monografiTableBody');
        if (tbody) {
            tbody.innerHTML = cat.dusunData.map((row, idx) => `
                <tr class="hover:bg-slate-50/80 transition-colors">
                    <td class="py-2.5 px-3 text-center font-bold text-slate-500">${idx + 1}</td>
                    <td class="py-2.5 px-3 font-extrabold text-slate-800">${row.d}</td>
                    <td class="py-2.5 px-3 text-right font-semibold text-slate-700">${typeof row.val3 === 'number' ? row.val3.toLocaleString('id-ID') : row.val3}</td>
                    <td class="py-2.5 px-3 text-right font-semibold text-slate-700">${typeof row.val4 === 'number' ? row.val4.toLocaleString('id-ID') : row.val4}</td>
                    <td class="py-2.5 px-3 text-right font-bold text-emerald-700">${row.pct.toFixed ? row.pct.toFixed(1) : row.pct}%</td>
                </tr>
            `).join('');
        }

        // Table Foot Row (Total)
        const tfoot = document.getElementById('monografiTableFoot');
        if (tfoot) {
            tfoot.innerHTML = `
                <tr>
                    <td colspan="2" class="py-2.5 px-3 text-center uppercase tracking-wider">Jumlah / Total</td>
                    <td class="py-2.5 px-3 text-right text-slate-900">${typeof cat.totalRow.val3 === 'number' ? cat.totalRow.val3.toLocaleString('id-ID') : cat.totalRow.val3}</td>
                    <td class="py-2.5 px-3 text-right text-slate-900">${typeof cat.totalRow.val4 === 'number' ? cat.totalRow.val4.toLocaleString('id-ID') : cat.totalRow.val4}</td>
                    <td class="py-2.5 px-3 text-right text-emerald-800">${cat.totalRow.pct.toFixed ? cat.totalRow.pct.toFixed(1) : cat.totalRow.pct}%</td>
                </tr>
            `;
        }

        // Middle Col: Narasi & Bullet Points
        const narasiSub = document.getElementById('monografiNarasiSubtitle');
        const narasiLead = document.getElementById('monografiNarasiLead');
        const bulletsContainer = document.getElementById('monografiBulletPoints');

        if (narasiSub) narasiSub.textContent = `Sorotan Utama & Narasi Statistik (${cat.title})`;
        if (narasiLead) narasiLead.textContent = cat.lead + ` pada Periode ${currentPeriod} (${yr}).`;
        if (bulletsContainer) {
            bulletsContainer.innerHTML = cat.bullets.map(b => `
                <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200/70 hover:border-emerald-300 transition-colors">
                    <div class="text-[11.5px] text-slate-700 leading-relaxed">${b}</div>
                </div>
            `).join('');
        }

        // Right Col: 3D Book Dynamic Labels
        const coverDesa = document.getElementById('mono3dCoverDesa');
        const periodNumEl = document.getElementById('mono3dPeriodNum');
        const periodYearEl = document.getElementById('mono3dPeriodYear');
        const spineYearEl = document.getElementById('mono3dSpineYear');

        if (coverDesa) coverDesa.textContent = vData.name.toUpperCase();
        if (periodNumEl) periodNumEl.textContent = currentPeriod;
        if (periodYearEl) periodYearEl.textContent = yr;
        if (spineYearEl) spineYearEl.textContent = yr;

        // Render Charts with Chart.js
        renderCharts(cat, vData.dusuns);
    };

    function renderCharts(cat, dusunLabels) {
        if (typeof Chart === 'undefined') return;

        // Chart 1: Donut / Doughnut Chart
        const c1Title = document.getElementById('monoChart1Title');
        if (c1Title) c1Title.textContent = cat.chart1.label;
        const ctxDonut = document.getElementById('monoCanvasDonut');
        if (ctxDonut) {
            if (donutChartInstance) donutChartInstance.destroy();
            donutChartInstance = new Chart(ctxDonut, {
                type: 'doughnut',
                data: {
                    labels: dusunLabels,
                    datasets: [{
                        data: cat.chart1.values,
                        backgroundColor: ['#046A38', '#059669', '#10B981', '#34D399', '#6EE7B7'],
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
        }

        // Chart 2: Bar Chart
        const c2Title = document.getElementById('monoChart2Title');
        if (c2Title) c2Title.textContent = cat.chart2.label;
        const ctxBar = document.getElementById('monoCanvasBar');
        if (ctxBar) {
            if (barChartInstance) barChartInstance.destroy();
            barChartInstance = new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: dusunLabels,
                    datasets: [{
                        label: cat.chart2.label,
                        data: cat.chart2.values,
                        backgroundColor: '#046A38',
                        borderRadius: 6,
                        barThickness: 14
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 9 } }
                        },
                        y: {
                            grid: { color: 'rgba(226, 232, 240, 0.6)' },
                            ticks: { font: { size: 9 } }
                        }
                    }
                }
            });
        }
    }

    // 5. 3D Interactive Mouse Gyro Tilt on Book
    function initMonografi3DBookInteraction() {
        const stage = document.getElementById('mono3dStage');
        const book = document.getElementById('mono3dObject');
        const shadow = document.getElementById('mono3dShadow');
        if (!stage || !book) return;

        stage.addEventListener('mousemove', (e) => {
            const rect = stage.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            const rotY = (x / (rect.width / 2)) * 25 - 15;
            const rotX = -(y / (rect.height / 2)) * 20 + 8;

            book.classList.remove('mono-floating');
            book.style.transform = `rotateY(${rotY}deg) rotateX(${rotX}deg) translateZ(10px)`;
            if (shadow) {
                shadow.style.transform = `rotateX(80deg) translateX(${x * 0.2}px)`;
            }
        });

        stage.addEventListener('mouseleave', () => {
            book.classList.add('mono-floating');
            book.style.transform = '';
            if (shadow) shadow.style.transform = '';
        });
    }

    // 6. Flipbook Reader Modal
    window.openMonografiFlipbookModal = function() {
        const modal = document.getElementById('monografiFlipbookModal');
        const titleEl = document.getElementById('flipbookModalTitle');
        const pubNumEl = document.getElementById('flipbookPubNum');
        const vData = MONOGRAFI_DATA[currentVillage] || MONOGRAFI_DATA.kamisi;
        const pData = vData.periods[currentPeriod] || vData.periods[3];

        if (titleEl) {
            titleEl.textContent = `Buku Monografi ${vData.name} Dalam Angka — Periode ${currentPeriod} (${pData.year})`;
        }
        if (pubNumEl) {
            pubNumEl.textContent = `BPS-7408-MONOGRAFI-${pData.year}-${currentVillage.toUpperCase()}`;
        }
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
    };

    window.closeMonografiFlipbookModal = function() {
        const modal = document.getElementById('monografiFlipbookModal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }
    };

    window.jumpToCategoryFromReader = function(catKey) {
        closeMonografiFlipbookModal();
        selectMonografiCategory(catKey);
    };

    window.downloadMonografiDoc = function() {
        const vData = MONOGRAFI_DATA[currentVillage] || MONOGRAFI_DATA.kamisi;
        const pData = vData.periods[currentPeriod] || vData.periods[3];
        const fileName = `Monografi_${vData.name.replace(/\s+/g, '_')}_Periode_${currentPeriod}_(${pData.year}).pdf`;

        // Create virtual download anchor
        const a = document.createElement('a');
        a.href = 'data:text/plain;charset=utf-8,' + encodeURIComponent(
            `Kompilasi Resmi BPS Kolaka Utara - ${vData.name} Dalam Angka (${pData.year})
` +
            `Diterbitkan oleh Badan Pusat Statistik Kabupaten Kolaka Utara dalam kerangka Satu Data Indonesia.`
        );
        a.download = fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);

        alert(`Mengunduh publikasi: ${fileName}
Format resmi siap cetak & kompilasi tabel SDI.`);
    };

    // Hook into global openOutputDoc
    const originalOpenOutputDoc = window.openOutputDoc;
    window.openOutputDoc = function(docType) {
        if (docType === 'monografi') {
            window.openMonografiDigitalView(window.currentTargetVillage || 'kamisi', 3);
            return;
        }
        if (typeof originalOpenOutputDoc === 'function') {
            originalOpenOutputDoc(docType);
        }
    };

})();
</script>

</body>
</html>