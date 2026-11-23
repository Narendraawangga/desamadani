<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Madani Kabupaten Kolaka Utara - Portal Data & Analitik Kemandirian Desa</title>
    
    <!-- Google Fonts: Caveat, Oswald, DM Sans & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;1,9..40,400&family=Oswald:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        madani: {
                            green: '#059669',
                            darkgreen: '#047857',
                            deep: '#064e3b',
                            navy: '#0b2545',
                            darknavy: '#061a33',
                            blue: '#005ea6',
                            gold: '#f59e0b',
                            amber: '#d97706',
                            bg: '#fcfbf7'
                        }
                    },
                    fontFamily: {
                        sans: ['"DM Sans"', '"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        heading: ['"DM Sans"', '"Plus Jakarta Sans"', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'DM Sans', 'Plus Jakarta Sans', sans-serif;
            background-color: #F7F7F5;
            color: #5A6B65;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #1e293b;
            scroll-behavior: smooth;
        }

        .sec-title__tagline {
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #0D6E5B;
            display: inline-block;
        }

        .sec-title__title {
            font-size: 2.25rem;
            line-height: 1.15;
            font-weight: 800;
            color: #0D6E5B;
            letter-spacing: -0.02em;
        }

        @media (min-width: 640px) {
            .sec-title__title {
                font-size: 2.75rem;
            }
        }

        @media (min-width: 1024px) {
            .sec-title__title {
                font-size: 3.25rem;
            }
        }

        /* Floating Animation */
        @keyframes floatSmooth {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .animate-float-smooth {
            animation: floatSmooth 4s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { opacity: 0.25; transform: scale(1); }
            50% { opacity: 0.55; transform: scale(1.08); }
        }
        .animate-pulse-glow {
            animation: pulseGlow 3.5s ease-in-out infinite;
        }

        /* Pulsing Aura for Ambient Parallax Orbs */
        @keyframes auraPulse {
            0%, 100% { transform: scale(1); opacity: 0.25; }
            50% { transform: scale(1.15); opacity: 0.55; }
        }
        .animate-aura {
            animation: auraPulse 5s ease-in-out infinite;
        }

        /* Parallax 3D Perspective & Layering */
        .parallax-container {
            perspective: 1200px;
            transform-style: preserve-3d;
        }
        .parallax-layer {
            will-change: transform;
            transition: transform 0.15s cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        /* ========================================================
           BIDIRECTIONAL SCROLL ANIMATION ENGINE
           (Animasi Masuk & Keluar yang Terlooping Saat Scroll Naik & Turun)
           ======================================================== */
        .scroll-anim {
            opacity: 0;
            transform: translateY(32px) scale(0.97);
            transition: opacity 0.75s cubic-bezier(0.16, 1, 0.3, 1), transform 0.75s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .scroll-anim.in-view {
            opacity: 1;
            transform: translateY(0px) scale(1);
        }

        .scroll-anim-left {
            opacity: 0;
            transform: translateX(-40px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .scroll-anim-left.in-view {
            opacity: 1;
            transform: translateX(0px);
        }

        .scroll-anim-right {
            opacity: 0;
            transform: translateX(40px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .scroll-anim-right.in-view {
            opacity: 1;
            transform: translateX(0px);
        }

        .scroll-anim-scale {
            opacity: 0;
            transform: scale(0.92);
            transition: opacity 0.75s cubic-bezier(0.16, 1, 0.3, 1), transform 0.75s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .scroll-anim-scale.in-view {
            opacity: 1;
            transform: scale(1);
        }

        /* Stagger Delays for Cards & Texts */
        .delay-75 { transition-delay: 75ms; }
        .delay-150 { transition-delay: 150ms; }
        .delay-225 { transition-delay: 225ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-375 { transition-delay: 375ms; }
        .delay-450 { transition-delay: 450ms; }

        /* Floating Parallax Elements */
        .parallax-float {
            will-change: transform;
            transition: transform 0.12s cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        /* ========================================================
           5 PILAR CARDS HOVER & FOCUS INTERACTION
           (Pop up membesar ke depan & blur kartu lainnya BERSAMAAN & SMOOTH)
           ======================================================== */
        .pilar-cards-grid {
            position: relative;
        }

        .pilar-card-col {
            position: relative;
            z-index: 1;
            transform: translateZ(0);
            will-change: transform, filter, opacity;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), 
                        filter 0.4s cubic-bezier(0.16, 1, 0.3, 1), 
                        opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
            transition-delay: 0s !important;
        }

        .pilar-card-inner {
            transform: translateZ(0);
            will-change: transform, box-shadow, border-color, background-color;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        border-color 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        background-color 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
            transition-delay: 0s !important;
        }

        @media (hover: hover) and (pointer: fine) {
            /* Saat kursor mengarah ke salah satu kartu, kartu lainnya SERENTAK BERSAMAAN blur dan meredup */
            .pilar-cards-grid:hover .pilar-card-col {
                filter: blur(3px) !important;
                opacity: 0.38 !important;
                transform: scale(0.96) !important;
                transition-delay: 0s !important;
            }

            /* Kartu yang sedang di-hover membesar ke depan, sangat tajam, dan naik z-index */
            .pilar-cards-grid .pilar-card-col:hover {
                filter: blur(0px) !important;
                opacity: 1 !important;
                transform: scale(1.08) translateY(-10px) !important;
                z-index: 30 !important;
                transition-delay: 0s !important;
            }

            .pilar-card-col:hover .pilar-card-inner {
                background-color: #ffffff !important;
                border-color: #0D6E5B !important;
                box-shadow: 0 25px 50px -12px rgba(13, 110, 91, 0.32), 0 0 0 2px rgba(13, 110, 91, 0.45) !important;
                transition-delay: 0s !important;
            }
        }

        /* ========================================================
           5 PILAR SHOWCASE POP-UP MODAL
           (Backdrop Blur Bersamaan & Smooth dengan Pop-up Dialog)
           ======================================================== */
        #pilarModalOverlay {
            opacity: 0;
            pointer-events: none;
            backdrop-filter: blur(0px);
            -webkit-backdrop-filter: blur(0px);
            background-color: rgba(2, 6, 23, 0);
            transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        backdrop-filter 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        -webkit-backdrop-filter 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        background-color 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, backdrop-filter, background-color;
        }

        #pilarModalOverlay.active {
            opacity: 1 !important;
            pointer-events: auto !important;
            backdrop-filter: blur(14px) !important;
            -webkit-backdrop-filter: blur(14px) !important;
            background-color: rgba(2, 6, 23, 0.72) !important;
        }

        #pilarModalDialog {
            transform: scale(0.92) translateY(24px);
            opacity: 0;
            will-change: transform, opacity;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), 
                        opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        #pilarModalOverlay.active #pilarModalDialog {
            transform: scale(1) translateY(0px) !important;
            opacity: 1 !important;
        }

        /* ========================================================
           KLASIFIKASI 4 STATUS DESA HOVER & FOCUS INTERACTION
           (Pop up membesar ke depan & blur kartu lainnya BERSAMAAN & SMOOTH)
           ======================================================== */
        .klasifikasi-cards-grid {
            position: relative;
        }

        .klasifikasi-card-col {
            position: relative;
            z-index: 1;
            transform: translateZ(0);
            will-change: transform, filter, opacity;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), 
                        filter 0.4s cubic-bezier(0.16, 1, 0.3, 1), 
                        opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
            transition-delay: 0s !important;
        }

        .klasifikasi-card-inner {
            transform: translateZ(0);
            will-change: transform, box-shadow, border-color, background-color;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        border-color 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        background-color 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
            transition-delay: 0s !important;
        }

        @media (hover: hover) and (pointer: fine) {
            /* Saat kursor mengarah ke salah satu kartu, kartu lainnya SERENTAK BERSAMAAN blur dan meredup */
            .klasifikasi-cards-grid:hover .klasifikasi-card-col {
                filter: blur(3px) !important;
                opacity: 0.38 !important;
                transform: scale(0.96) !important;
                transition-delay: 0s !important;
            }

            /* Kartu yang sedang di-hover membesar ke depan, sangat tajam, dan naik z-index */
            .klasifikasi-cards-grid .klasifikasi-card-col:hover {
                filter: blur(0px) !important;
                opacity: 1 !important;
                transform: scale(1.08) translateY(-10px) !important;
                z-index: 30 !important;
                transition-delay: 0s !important;
            }

            .klasifikasi-card-col:hover .klasifikasi-card-inner {
                background-color: #ffffff !important;
                box-shadow: 0 25px 50px -12px rgba(13, 110, 91, 0.28), 0 0 0 2px rgba(13, 110, 91, 0.4) !important;
                transition-delay: 0s !important;
            }
        }

        /* ========================================================
           KLASIFIKASI SHOWCASE POP-UP MODAL
           (Backdrop Blur Bersamaan & Smooth dengan Pop-up Dialog)
           ======================================================== */
        #klasifikasiModalOverlay {
            opacity: 0;
            pointer-events: none;
            backdrop-filter: blur(0px);
            -webkit-backdrop-filter: blur(0px);
            background-color: rgba(2, 6, 23, 0);
            transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        backdrop-filter 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        -webkit-backdrop-filter 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                        background-color 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, backdrop-filter, background-color;
        }

        #klasifikasiModalOverlay.active {
            opacity: 1 !important;
            pointer-events: auto !important;
            backdrop-filter: blur(14px) !important;
            -webkit-backdrop-filter: blur(14px) !important;
            background-color: rgba(2, 6, 23, 0.72) !important;
        }

        #klasifikasiModalDialog {
            transform: scale(0.92) translateY(24px);
            opacity: 0;
            will-change: transform, opacity;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), 
                        opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        #klasifikasiModalOverlay.active #klasifikasiModalDialog {
            transform: scale(1) translateY(0px) !important;
            opacity: 1 !important;
        }

        /* ========================================================
           EDITORIAL VERTICAL STORYTELLING: DESA UNGGULAN
           Feathered edge watercolor/cloud mask, typography & watermarks
           ======================================================== */
        .font-handwriting {
            font-family: 'Caveat', cursive, sans-serif;
        }

        .font-condensed {
            font-family: 'Oswald', 'Plus Jakarta Sans', sans-serif;
            letter-spacing: 0.02em;
        }

        /* Organic Watercolor / Cloud Mask */
        .feathered-organic-mask-1 {
            -webkit-mask-image: radial-gradient(ellipse 82% 76% at 50% 50%, #000 42%, rgba(0,0,0,0.85) 62%, rgba(0,0,0,0.3) 80%, transparent 100%);
            mask-image: radial-gradient(ellipse 82% 76% at 50% 50%, #000 42%, rgba(0,0,0,0.85) 62%, rgba(0,0,0,0.3) 80%, transparent 100%);
            border-radius: 46% 54% 65% 35% / 44% 42% 58% 56%;
        }

        .feathered-organic-mask-2 {
            -webkit-mask-image: radial-gradient(ellipse 82% 76% at 50% 50%, #000 42%, rgba(0,0,0,0.85) 62%, rgba(0,0,0,0.3) 80%, transparent 100%);
            mask-image: radial-gradient(ellipse 82% 76% at 50% 50%, #000 42%, rgba(0,0,0,0.85) 62%, rgba(0,0,0,0.3) 80%, transparent 100%);
            border-radius: 56% 44% 42% 58% / 54% 62% 38% 46%;
        }

        .feathered-organic-mask-3 {
            -webkit-mask-image: radial-gradient(ellipse 82% 76% at 50% 50%, #000 42%, rgba(0,0,0,0.85) 62%, rgba(0,0,0,0.3) 80%, transparent 100%);
            mask-image: radial-gradient(ellipse 82% 76% at 50% 50%, #000 42%, rgba(0,0,0,0.85) 62%, rgba(0,0,0,0.3) 80%, transparent 100%);
            border-radius: 44% 56% 58% 42% / 42% 54% 46% 58%;
        }

        .feathered-organic-mask-4 {
            -webkit-mask-image: radial-gradient(ellipse 82% 76% at 50% 50%, #000 42%, rgba(0,0,0,0.85) 62%, rgba(0,0,0,0.3) 80%, transparent 100%);
            mask-image: radial-gradient(ellipse 82% 76% at 50% 50%, #000 42%, rgba(0,0,0,0.85) 62%, rgba(0,0,0,0.3) 80%, transparent 100%);
            border-radius: 52% 48% 44% 56% / 58% 44% 56% 42%;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 7px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #059669;
            border-radius: 4px;
        }
    </style>
</head>
<body class="min-h-screen bg-[#fcfbf7] text-slate-800 antialiased flex flex-col selection:bg-emerald-100 selection:text-emerald-900">

    <!-- SECTION 1: FULL SCREEN CINEMATIC WELCOMING VIDEO (PENYAMBUT WEBSITE DENGAN PARALLAX) -->
    <section id="heroVideoSection" class="relative w-full h-screen min-h-[640px] overflow-hidden flex flex-col justify-between select-none bg-slate-950 parallax-container">
        
        <!-- Native Video Element (Penyambut Website - Berhenti di Akhir Video) -->
        <div id="videoParallaxLayer" class="absolute inset-0 w-full h-full overflow-hidden parallax-layer">
            <video 
                id="kolutVideo" 
                autoplay 
                muted 
                playsinline 
                preload="auto"
                class="absolute inset-0 w-full h-full object-cover z-0 transition-transform duration-1000 ease-out">
                <source src="/videos/Kolaka_Utara.mp4" type="video/mp4">
                <source src="/Kolaka_Utara.mp4" type="video/mp4">
            </video>
            
            <!-- Soft Ambient Light & Vignette Overlay (Transisi lebih gelap setelah opening selesai agar teks sangat terbaca) -->
            <div id="videoBackdropOverlay" class="absolute inset-0 bg-gradient-to-b from-black/55 via-black/20 to-black/75 z-10 opacity-0 transition-opacity duration-1000 pointer-events-none"></div>
            <div class="absolute inset-0 bg-emerald-950/20 mix-blend-overlay z-10 pointer-events-none"></div>

            <!-- Soft Floating Ambient Glow Orbs for Parallax Depth -->
            <div id="orb1" class="absolute -top-28 -left-28 w-[420px] h-[420px] bg-emerald-400/20 rounded-full blur-3xl pointer-events-none animate-aura z-10"></div>
            <div id="orb2" class="absolute -bottom-28 -right-28 w-[420px] h-[420px] bg-teal-300/20 rounded-full blur-3xl pointer-events-none animate-aura z-10" style="animation-delay: 2.5s;"></div>
        </div>

        <!-- Top Floating Soft Island Header -->
        <div id="videoTopHud" class="relative z-30 w-full pt-5 sm:pt-7 px-4 sm:px-8 opacity-0 -translate-y-3 pointer-events-none transition-all duration-1000 ease-out">
            <div class="max-w-7xl mx-auto flex items-center justify-between gap-4 pointer-events-auto">
                
                <!-- Soft Glass Brand Capsule (Tombol Tersembunyi untuk Login Form) -->
                <button type="button" 
                        onclick="openLoginModal()" 
                        class="flex items-center gap-3 bg-slate-900/60 hover:bg-slate-900/75 backdrop-blur-2xl px-4 sm:px-5 py-2 sm:py-2.5 rounded-full border border-white/20 shadow-[0_8px_30px_rgb(0,0,0,0.25)] transition duration-300 cursor-pointer text-left focus:outline-none hover:scale-[1.02] active:scale-[0.98]" 
                        title="Desa Madani Kabupaten Kolaka Utara">
                    <div class="w-9 h-9 rounded-2xl bg-white p-1 flex items-center justify-center shadow-sm flex-shrink-0">
                        <img src="/images/logo_bps.png" alt="Logo BPS" class="w-6 h-6 object-contain">
                    </div>
                    <div>
                        <div class="text-sm sm:text-base font-extrabold text-white tracking-tight leading-none drop-shadow-xs">
                            Desa Madani
                        </div>
                        <div class="text-[10px] text-slate-300 font-medium tracking-wider mt-1">
                            Kabupaten Kolaka Utara
                        </div>
                    </div>
                </button>

                <!-- Primary Entrance Button -->
                <div class="flex items-center gap-2 sm:gap-3">
                    <a href="/portal" class="px-6 py-2.5 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs sm:text-sm shadow-[0_4px_20px_rgba(16,185,129,0.4)] backdrop-blur-md transition transform hover:scale-105 active:scale-95 flex items-center gap-2 group">
                        <span>Masuk Web Utama</span>
                        <span class="w-5 h-5 rounded-full bg-white/25 flex items-center justify-center group-hover:translate-x-0.5 transition">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </span>
                    </a>
                </div>

            </div>
        </div>

        <!-- Upper Hero Card (Interactive 3D Mouse Parallax & Welcoming Reveal - Diturunkan Sedikit ke Tengah) -->
        <div id="heroCardWrapper" class="relative z-30 px-4 sm:px-8 mt-8 sm:mt-14 lg:mt-20 mb-auto max-w-4xl mx-auto text-center opacity-0 -translate-y-4 pointer-events-none transition-all duration-1000 ease-out parallax-layer">
            <div id="heroCard" class="inline-flex flex-col items-center space-y-3 sm:space-y-4 pointer-events-auto transition-transform duration-300 ease-out">
                
                <div id="welcomeBadge" class="inline-flex items-center px-4 py-1.5 rounded-full bg-slate-900/60 backdrop-blur-2xl border border-white/25 text-white shadow-xl transition-all duration-700">
                    <span id="badgeText" class="tracking-widest uppercase text-[11px] font-bold text-white/95">SELAMAT DATANG DI DESA MADANI</span>
                </div>

                <!-- Soft Fluid Title -->
                <h1 id="heroTitle" class="text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight drop-shadow-[0_4px_24px_rgba(0,0,0,0.85)] transition-all duration-700">
                    Pesona &amp; Potensi Unggul <br>
                    <span>Kabupaten <span class="text-[#86efac]">Kolaka</span> <span class="text-[#fde68a]">Utara</span></span>
                </h1>

            </div>
        </div>

        <!-- Bottom Soft Floating Footer Pill with Parallax Layer -->
        <div id="videoBottomHud" class="relative z-30 w-full pb-6 sm:pb-8 px-4 sm:px-8 opacity-0 translate-y-4 pointer-events-none transition-all duration-1000 ease-out parallax-layer">
            <div class="max-w-7xl mx-auto flex items-center justify-center sm:justify-end pointer-events-auto">
                <!-- Soft Scroll Invitation with Smooth Parallax Entrance -->
                <button type="button" onclick="enterWebsiteWithParallax()" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-800 bg-white/80 hover:bg-white backdrop-blur-md px-4 py-2 rounded-full border border-slate-200/60 shadow-sm transition group">
                    <span class="tracking-wide">Jelajahi Data & Potensi</span>
                    <span class="w-5 h-5 rounded-full bg-[#0D6E5B] text-white flex items-center justify-center group-hover:translate-y-0.5 transition-transform text-[10px]">
                        ↓
                    </span>
                </button>
            </div>
        </div>

        <!-- Seamless Soft Gradient Transition uniting top video section into bottom section (#F7F7F5) -->
        <div class="absolute -bottom-1 left-0 right-0 h-20 sm:h-28 bg-gradient-to-t from-[#F7F7F5] via-[#F7F7F5]/40 to-transparent pointer-events-none z-20"></div>

    </section>

    <!-- SECTION 1.5: DESA MADANI OVERVIEW & GATEWAY TO WEB UTAMA -->
    <section id="tentang" class="py-16 sm:py-24 bg-[#F7F7F5] border-b border-[#5A6B65]/20 scroll-mt-6 relative overflow-hidden">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                
                <!-- SISI KIRI: TEKS PENJELASAN EDITORIAL DENGAN AKSEN DASH #0D6E5B -->
                <div class="lg:col-span-5 space-y-6">
                    
                    <!-- Short horizontal accent dash above title (Aturan 2 & 3) -->
                    <div class="w-10 h-1 bg-[#0D6E5B] rounded-full"></div>

                    <div class="space-y-3">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#0D6E5B]"></span>
                            <span class="text-xs font-extrabold uppercase tracking-widest text-[#0D6E5B]">Portal Satu Data & Inisiatif Desa Madani</span>
                        </div>

                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#0D6E5B] tracking-tight leading-[1.12]">
                            Membangun Kolaka Utara <br>
                            <span class="text-slate-800 font-extrabold">Dari Desa Madani</span>
                        </h2>
                    </div>

                    <p class="text-[#5A6B65] text-sm sm:text-base leading-relaxed font-normal">
                        Inovasi pemetaan spasial resolusi tinggi dan integrasi data Potensi Desa (Podes BPS 2024–2025) untuk mewujudkan <b>Desa Mandiri, Maju, dan Sejahtera</b> di Kabupaten Kolaka Utara.
                    </p>

                    <p class="text-[#5A6B65] text-xs sm:text-sm leading-relaxed font-normal">
                        Menghadirkan keterpaduan data statistik potensi kakao, perikanan Teluk Bone, destinasi wisata, serta sistem perencanaan pembangunan daerah berbasis bukti (<i>evidence-based policy</i>).
                    </p>

                    <!-- Quick Indicator Badges (Thin-bordered pills) -->
                    <div class="flex items-center gap-2.5 pt-1 flex-wrap text-xs text-[#5A6B65] font-semibold">
                        <span class="flex items-center gap-1.5 bg-white/90 px-3.5 py-1.5 rounded-full border border-[#5A6B65]/30 shadow-2xs text-[#0D6E5B]">
                            <span class="w-2 h-2 rounded-full bg-[#0D6E5B]"></span> 15 Kecamatan
                        </span>
                        <span class="flex items-center gap-1.5 bg-white/90 px-3.5 py-1.5 rounded-full border border-[#5A6B65]/30 shadow-2xs text-[#0D6E5B]">
                            <span class="w-2 h-2 rounded-full bg-[#0D6E5B]"></span> 133 Desa Terdata
                        </span>
                        <span class="flex items-center gap-1.5 bg-white/90 px-3.5 py-1.5 rounded-full border border-[#5A6B65]/30 shadow-2xs text-[#0D6E5B]">
                            <span class="w-2 h-2 rounded-full bg-[#D4A373]"></span> Podes BPS 2024–2025
                        </span>
                    </div>

                    <!-- CTA Button: Pill with Arrow inside circle on right side (Aturan 3) -->
                    <div class="pt-2">
                        <a href="/portal" class="inline-flex items-center gap-3 px-6 sm:px-7 py-3 rounded-full bg-[#0D6E5B] hover:bg-[#095244] text-white font-extrabold text-xs sm:text-sm shadow-md hover:shadow-lg transition transform hover:scale-105 active:scale-95 group">
                            <span>Buka Web Utama Sekarang</span>
                            <span class="w-6 h-6 rounded-full bg-white/20 group-hover:bg-white/30 flex items-center justify-center transition">
                                <svg class="w-3.5 h-3.5 text-white group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </span>
                        </a>
                    </div>

                </div>

                <!-- SISI KANAN: PETA VEKTOR ILUSTRATIF (STYLING MIKE KUS: STIPPLE HALFTONE, KONSENTRIS PIN, PILL LABELS) -->
                <div class="lg:col-span-7">
                    <div class="relative w-full rounded-3xl p-3 sm:p-5 transition-all duration-300">
                        
                        <svg viewBox="0 0 460 580" class="w-full h-auto max-h-[620px] filter drop-shadow-xs" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <!-- Editorial Halftone Stipple Pattern for Coastal Waters (Aturan 4) -->
                                <pattern id="editorialStipple" width="12" height="12" patternUnits="userSpaceOnUse">
                                    <circle cx="3" cy="3" r="1.1" fill="#0D6E5B" opacity="0.32"/>
                                    <circle cx="9" cy="9" r="1.3" fill="#0D6E5B" opacity="0.25"/>
                                    <circle cx="9" cy="2" r="0.8" fill="#148972" opacity="0.22"/>
                                    <circle cx="2" cy="8" r="0.9" fill="#0D6E5B" opacity="0.28"/>
                                </pattern>
                                <!-- Subtle gradient for coastal wash -->
                                <linearGradient id="coastalGlow" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#0D6E5B" stop-opacity="0.10"/>
                                    <stop offset="65%" stop-color="#0D6E5B" stop-opacity="0.03"/>
                                    <stop offset="100%" stop-color="#0D6E5B" stop-opacity="0"/>
                                </linearGradient>
                            </defs>

                            <!-- Coastal Waters Shading (Teluk Bone) with Halftone Stipple Pattern -->
                            <path d="M 20 70 C 55 120 75 200 70 300 C 65 400 50 480 80 550 L 155 550 C 135 480 125 400 130 300 C 135 200 125 120 20 70 Z" fill="url(#coastalGlow)"/>
                            <path d="M 30 80 C 65 130 85 210 80 310 C 75 410 60 490 90 540 L 145 540 C 125 470 115 390 120 290 C 125 190 115 110 30 80 Z" fill="url(#editorialStipple)"/>

                            <!-- Thin Depth Contour Lines along Coastal Edge -->
                            <path d="M 45 90 C 75 140 95 220 90 320 C 85 410 70 480 95 530" fill="none" stroke="#0D6E5B" stroke-width="0.8" stroke-dasharray="3,4" opacity="0.35"/>
                            <path d="M 60 100 C 88 150 105 230 102 330 C 98 420 85 485 105 525" fill="none" stroke="#0D6E5B" stroke-width="0.7" stroke-dasharray="2,3" opacity="0.25"/>

                            <!-- Nautical Geographical Label: TELUK BONE -->
                            <text x="35" y="270" font-family="'Plus Jakarta Sans', sans-serif" font-size="11" font-weight="700" letter-spacing="3" fill="#5A6B65" opacity="0.6" transform="rotate(-90 35 270)">TELUK BONE</text>

                            <!-- Distance / Corridor Indicator (<--- 110 km --->) -->
                            <g opacity="0.55">
                                <line x1="395" y1="110" x2="395" y2="480" stroke="#5A6B65" stroke-width="0.8" stroke-dasharray="3,3"/>
                                <path d="M 392 115 L 395 110 L 398 115" fill="none" stroke="#5A6B65" stroke-width="0.8"/>
                                <path d="M 392 475 L 395 480 L 398 475" fill="none" stroke="#5A6B65" stroke-width="0.8"/>
                                <text x="406" y="300" font-family="'Plus Jakarta Sans', sans-serif" font-size="9" font-weight="600" fill="#5A6B65" transform="rotate(90 406 300)">110 km Panjang Wilayah</text>
                            </g>

                            <!-- 15 Kecamatan Projected SVG Polygons (#5A6B65 thin border) -->
                            <g id="illustrativeKecGroup">

      <path id="svgMapKec_Lasusua" d="M 84.4 401.5 L 167.3 417.0 L 212.2 414.1 L 229.2 423.1 L 178.5 448.4 L 109.8 471.5 L 104.4 469.9 L 109.1 478.0 L 105.4 486.3 L 95.8 483.1 L 89.2 469.6 L 70.5 459.6 L 66.5 453.9 L 73.9 455.1 L 54.3 434.6 L 49.6 418.1 L 47.5 404.0 L 84.4 401.5 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Lasusua">
        <title>Kecamatan Lasusua (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_Pakue" d="M 179.7 256.7 L 255.5 296.2 L 241.6 309.7 L 235.2 308.0 L 233.5 323.6 L 210.2 320.4 L 156.3 293.2 L 147.2 300.1 L 137.5 285.1 L 144.9 281.9 L 151.4 264.3 L 163.7 257.9 L 174.1 262.0 L 179.7 256.7 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Pakue">
        <title>Kecamatan Pakue (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_BatuPutih" d="M 160.1 168.0 L 159.4 167.7 L 159.5 167.2 L 160.3 167.6 L 160.1 168.0 Z M 167.1 162.9 L 167.3 162.9 L 167.4 163.1 L 167.2 163.0 L 167.1 162.9 Z M 179.1 145.0 L 178.6 144.8 L 178.6 144.6 L 179.1 144.8 L 179.1 145.0 Z M 173.4 140.7 L 173.1 141.6 L 172.4 141.5 L 172.2 141.2 L 173.4 140.7 Z M 173.6 131.0 L 173.3 130.8 L 173.5 130.5 L 173.8 130.7 L 173.6 131.0 Z M 173.0 130.1 L 172.8 130.0 L 172.8 129.9 L 173.0 130.0 L 173.0 130.1 Z M 173.3 128.8 L 186.7 140.2 L 201.6 141.3 L 198.3 167.5 L 212.5 170.0 L 211.6 177.9 L 221.4 178.0 L 214.4 189.0 L 218.5 191.8 L 270.4 198.9 L 282.7 209.2 L 341.5 232.5 L 415.0 237.6 L 413.9 259.8 L 328.4 248.5 L 225.1 211.4 L 168.9 198.0 L 169.4 183.1 L 161.0 178.5 L 159.8 170.9 L 167.9 163.5 L 173.2 171.1 L 178.8 168.7 L 180.5 156.1 L 189.6 159.7 L 190.8 149.5 L 179.0 150.4 L 182.5 141.4 L 174.5 142.4 L 175.5 131.7 L 173.3 128.8 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Batu Putih">
        <title>Kecamatan Batu Putih (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_RanteAngin" d="M 238.7 440.5 L 248.6 448.4 L 223.5 456.5 L 216.1 466.6 L 205.9 469.5 L 178.8 491.2 L 168.7 490.4 L 162.7 504.5 L 144.7 517.4 L 123.1 498.0 L 141.2 480.5 L 163.5 478.4 L 231.6 439.5 L 238.7 440.5 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Rante Angin">
        <title>Kecamatan Rante Angin (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_Kodeoha" d="M 96.6 329.9 L 101.5 335.1 L 98.5 340.4 L 107.2 345.7 L 225.6 396.6 L 211.6 403.9 L 106.4 382.4 L 64.4 357.7 L 96.6 329.9 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Kodeoha">
        <title>Kecamatan Kodeoha (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_Ngapa" d="M 157.0 294.3 L 210.2 320.4 L 233.5 323.6 L 229.6 326.7 L 233.9 332.8 L 223.1 346.7 L 218.4 347.0 L 219.3 359.9 L 211.1 371.2 L 231.9 384.4 L 226.2 395.3 L 177.4 378.8 L 144.3 361.8 L 142.4 347.8 L 120.8 321.6 L 136.7 303.9 L 153.5 307.1 L 153.7 302.9 L 146.5 300.7 L 157.0 294.3 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Ngapa">
        <title>Kecamatan Ngapa (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_Wawo" d="M 246.8 448.5 L 284.2 473.7 L 295.1 502.8 L 217.6 530.8 L 198.0 550.0 L 185.7 533.5 L 144.7 517.4 L 162.7 504.5 L 168.7 490.4 L 178.8 491.2 L 205.9 469.5 L 216.1 466.6 L 223.5 456.5 L 246.8 448.5 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Wawo">
        <title>Kecamatan Wawo (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_Lambai" d="M 233.8 438.5 L 164.5 477.9 L 141.2 480.5 L 122.9 497.7 L 105.4 486.3 L 109.1 478.0 L 104.4 469.9 L 109.8 471.5 L 178.5 448.4 L 228.9 424.0 L 233.8 438.5 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Lambai">
        <title>Kecamatan Lambai (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_Watunohu" d="M 139.8 283.7 L 140.0 290.3 L 153.5 307.1 L 136.7 303.9 L 121.1 321.7 L 117.3 317.6 L 104.6 319.1 L 103.5 307.5 L 113.8 292.6 L 139.8 283.7 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Watunohu">
        <title>Kecamatan Watunohu (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_PakueTengah" d="M 195.2 220.9 L 256.0 245.1 L 312.2 272.5 L 280.3 273.0 L 274.4 287.4 L 255.5 296.2 L 183.1 257.2 L 170.8 255.9 L 170.3 223.1 L 195.2 220.9 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Pakue Tengah">
        <title>Kecamatan Pakue Tengah (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_PakueUtara" d="M 183.2 199.2 L 308.6 243.5 L 350.7 253.5 L 413.9 259.8 L 410.4 298.6 L 378.3 284.2 L 350.1 284.3 L 322.7 276.8 L 196.1 220.9 L 170.3 223.1 L 160.7 207.5 L 168.9 198.0 L 183.2 199.2 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Pakue Utara">
        <title>Kecamatan Pakue Utara (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_Porehu" d="M 269.7 82.2 L 277.7 81.6 L 280.8 90.7 L 290.3 93.9 L 294.6 101.4 L 323.9 112.0 L 325.6 121.4 L 345.2 137.4 L 365.2 144.6 L 370.7 157.5 L 365.1 178.8 L 380.9 192.9 L 382.7 203.4 L 398.1 210.0 L 401.3 227.8 L 415.0 237.6 L 341.5 232.5 L 282.7 209.2 L 270.4 198.9 L 214.4 189.0 L 222.4 179.4 L 211.2 177.6 L 211.2 169.3 L 198.3 167.5 L 201.6 141.3 L 230.4 143.5 L 236.3 141.3 L 231.7 132.5 L 246.7 134.5 L 268.1 74.5 L 269.7 82.2 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Porehu">
        <title>Kecamatan Porehu (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_Katoi" d="M 64.6 358.2 L 106.4 382.4 L 211.6 403.9 L 212.2 414.1 L 177.8 417.9 L 85.8 401.4 L 47.5 404.0 L 45.0 380.7 L 64.3 367.0 L 64.6 358.2 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Katoi">
        <title>Kecamatan Katoi (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_Tiwu" d="M 116.8 317.6 L 142.4 347.8 L 144.3 361.8 L 98.5 340.4 L 101.5 335.1 L 96.5 329.6 L 103.8 328.0 L 105.8 318.6 L 116.8 317.6 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Tiwu">
        <title>Kecamatan Tiwu (Klik untuk buka di WebGIS)</title>
      </path>

      <path id="svgMapKec_Tolala" d="M 180.8 132.8 L 180.6 132.8 L 180.6 132.7 L 180.7 132.7 L 180.8 132.8 Z M 177.1 130.6 L 176.6 130.4 L 176.8 130.1 L 177.2 130.4 L 177.1 130.6 Z M 177.1 128.6 L 176.8 128.6 L 177.4 128.4 L 177.5 128.5 L 177.1 128.6 Z M 174.2 128.1 L 174.2 128.0 L 174.2 127.9 L 174.3 128.1 L 174.2 128.1 Z M 110.6 49.9 L 104.2 52.3 L 102.5 50.2 L 108.8 48.3 L 110.6 49.9 Z M 195.7 37.1 L 216.0 41.8 L 230.7 51.1 L 238.4 69.3 L 252.3 66.8 L 261.6 74.9 L 268.1 74.5 L 246.7 134.5 L 231.7 132.5 L 236.3 141.3 L 230.4 143.5 L 186.7 140.2 L 180.6 136.9 L 173.9 129.6 L 184.3 136.3 L 190.2 110.3 L 182.4 101.4 L 183.4 95.5 L 178.5 96.9 L 179.6 74.6 L 171.8 75.8 L 173.2 85.8 L 161.5 79.2 L 155.8 48.4 L 149.3 70.8 L 142.2 64.6 L 126.2 66.1 L 138.2 79.8 L 125.3 67.0 L 128.3 59.6 L 145.5 53.4 L 152.3 40.0 L 175.8 37.3 L 184.9 30.0 L 195.7 37.1 Z" 
            fill="#ffffff" fill-opacity="0.94" 
            stroke="#5A6B65" stroke-width="1.15" stroke-linejoin="round"
            class="transition-all duration-300 hover:fill-[#d2efe7] hover:stroke-[#0D6E5B] cursor-pointer"
            onclick="window.location.href='/portal#sectionPeta'"
            data-kec="Tolala">
        <title>Kecamatan Tolala (Klik untuk buka di WebGIS)</title>
      </path>
                            </g>

                            <!-- Concentric Circle Markers & Small Pill Labels (Aturan 4) -->
                            <g id="illustrativeMarkersGroup">

      <!-- Marker Lasusua (Ibu Kota) -->
      <g class="cursor-pointer group/pin" onclick="window.location.href='/portal#sectionPeta'">
        <circle cx="107.3" cy="443.9" r="15" fill="none" stroke="#0D6E5B" stroke-width="0.75" stroke-dasharray="2,3" opacity="0.6"/>
        <circle cx="107.3" cy="443.9" r="8.5" fill="none" stroke="#0D6E5B" stroke-width="1.3" opacity="0.85"/>
        <circle cx="107.3" cy="443.9" r="4" fill="#0D6E5B"/>
        <circle cx="107.3" cy="443.9" r="1.5" fill="#ffffff"/>
        <foreignObject x="93.3" y="421.9" width="160" height="28" class="overflow-visible pointer-events-none">
          <div xmlns="http://www.w3.org/1999/xhtml" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-white/95 backdrop-blur-xs border border-[#0D6E5B]/40 shadow-xs text-[10px] font-bold text-[#0D6E5B] whitespace-nowrap">
            <span class="w-1.5 h-1.5 rounded-full bg-[#0D6E5B] animate-ping"></span>
            <span>Lasusua • Ibu Kota</span>
          </div>
        </foreignObject>
      </g>

      <!-- Marker Porehu -->
      <g class="cursor-pointer group/pin" onclick="window.location.href='/portal#sectionPeta'">
        <circle cx="294.3" cy="153.1" r="8" fill="none" stroke="#0D6E5B" stroke-width="1.2" opacity="0.75"/>
        <circle cx="294.3" cy="153.1" r="3.5" fill="#0D6E5B"/>
        <foreignObject x="310.3" y="147.1" width="150" height="28" class="overflow-visible pointer-events-none">
          <div xmlns="http://www.w3.org/1999/xhtml" class="inline-flex items-center px-2 py-0.5 rounded-full bg-white/90 backdrop-blur-xs border border-[#5A6B65]/35 shadow-2xs text-[9px] font-semibold text-[#5A6B65] whitespace-nowrap">
            <span>Porehu • 1.440 IMK</span>
          </div>
        </foreignObject>
      </g>

      <!-- Marker Ngapa -->
      <g class="cursor-pointer group/pin" onclick="window.location.href='/portal#sectionPeta'">
        <circle cx="186.3" cy="336.1" r="8" fill="none" stroke="#0D6E5B" stroke-width="1.2" opacity="0.75"/>
        <circle cx="186.3" cy="336.1" r="3.5" fill="#0D6E5B"/>
        <foreignObject x="202.3" y="330.1" width="150" height="28" class="overflow-visible pointer-events-none">
          <div xmlns="http://www.w3.org/1999/xhtml" class="inline-flex items-center px-2 py-0.5 rounded-full bg-white/90 backdrop-blur-xs border border-[#5A6B65]/35 shadow-2xs text-[9px] font-semibold text-[#5A6B65] whitespace-nowrap">
            <span>Ngapa • 502 IMK</span>
          </div>
        </foreignObject>
      </g>

      <!-- Marker Batu Putih -->
      <g class="cursor-pointer group/pin" onclick="window.location.href='/portal#sectionPeta'">
        <circle cx="194.5" cy="161.7" r="8" fill="none" stroke="#0D6E5B" stroke-width="1.2" opacity="0.75"/>
        <circle cx="194.5" cy="161.7" r="3.5" fill="#0D6E5B"/>
        <foreignObject x="64.5" y="155.7" width="150" height="28" class="overflow-visible pointer-events-none">
          <div xmlns="http://www.w3.org/1999/xhtml" class="inline-flex items-center px-2 py-0.5 rounded-full bg-white/90 backdrop-blur-xs border border-[#5A6B65]/35 shadow-2xs text-[9px] font-semibold text-[#5A6B65] whitespace-nowrap">
            <span>Batu Putih • Pelabuhan</span>
          </div>
        </foreignObject>
      </g>

      <!-- Marker Tolala -->
      <g class="cursor-pointer group/pin" onclick="window.location.href='/portal#sectionPeta'">
        <circle cx="177.6" cy="95.6" r="8" fill="none" stroke="#0D6E5B" stroke-width="1.2" opacity="0.75"/>
        <circle cx="177.6" cy="95.6" r="3.5" fill="#0D6E5B"/>
        <foreignObject x="193.6" y="89.6" width="150" height="28" class="overflow-visible pointer-events-none">
          <div xmlns="http://www.w3.org/1999/xhtml" class="inline-flex items-center px-2 py-0.5 rounded-full bg-white/90 backdrop-blur-xs border border-[#5A6B65]/35 shadow-2xs text-[9px] font-semibold text-[#5A6B65] whitespace-nowrap">
            <span>Tolala • Gerbang Utara</span>
          </div>
        </foreignObject>
      </g>

      <!-- Marker Wawo -->
      <g class="cursor-pointer group/pin" onclick="window.location.href='/portal#sectionPeta'">
        <circle cx="212.5" cy="491.7" r="8" fill="none" stroke="#0D6E5B" stroke-width="1.2" opacity="0.75"/>
        <circle cx="212.5" cy="491.7" r="3.5" fill="#0D6E5B"/>
        <foreignObject x="228.5" y="499.7" width="150" height="28" class="overflow-visible pointer-events-none">
          <div xmlns="http://www.w3.org/1999/xhtml" class="inline-flex items-center px-2 py-0.5 rounded-full bg-white/90 backdrop-blur-xs border border-[#5A6B65]/35 shadow-2xs text-[9px] font-semibold text-[#5A6B65] whitespace-nowrap">
            <span>Wawo • Gerbang Selatan</span>
          </div>
        </foreignObject>
      </g>
                            </g>

                            <!-- Nautical Direction Compass (U) -->
                            <g transform="translate(415, 60)" opacity="0.7">
                                <circle cx="0" cy="0" r="14" fill="#ffffff" stroke="#5A6B65" stroke-width="0.8"/>
                                <path d="M 0 -11 L 3.5 0 L 0 11 L -3.5 0 Z" fill="#0D6E5B"/>
                                <path d="M 0 -11 L -3.5 0 L 0 0 Z" fill="#148972"/>
                                <text x="0" y="-14" font-family="'Plus Jakarta Sans', sans-serif" font-size="8" font-weight="800" fill="#0D6E5B" text-anchor="middle">U</text>
                            </g>
                        </svg>

                        <!-- Subtle Map Caption & Explore Hint -->
                        <div class="mt-3 flex items-center justify-between text-[11px] text-[#5A6B65] px-2">
                            <span class="flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#0D6E5B]"></span>
                                <span><b>Peta Spasial Kolaka Utara:</b> Klik poligon untuk menjelajah langsung di WebGIS.</span>
                            </span>
                            <span class="font-mono text-[10px] text-[#5A6B65]/70">Podes BPS 2025</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

        <!-- SECTION 2: 5 PILAR KEMANDIRIAN DESA MADANI (EDITORIAL NATURE/WATERCOLOR STYLE) -->
    <section id="pilar" class="py-20 bg-[#F7F7F5] border-y border-[#5A6B65]/15 scroll-mt-20 relative overflow-hidden">
        <!-- Parallax Ambient Watercolor Blotches -->
        <div data-parallax-speed="0.12" class="parallax-float absolute -bottom-20 right-0 w-96 h-96 bg-[#0D6E5B]/8 rounded-full blur-3xl pointer-events-none"></div>
        <div data-parallax-speed="-0.12" class="parallax-float absolute -top-20 left-0 w-80 h-80 bg-teal-100/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12 relative z-10">
            <!-- Section Title with Editorial Mike Kus Styling -->
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="w-8 h-1 bg-[#0D6E5B] rounded-full mx-auto mb-2"></div>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#0D6E5B]/10 border border-[#0D6E5B]/20 text-xs font-bold text-[#0D6E5B] uppercase tracking-wider scroll-anim">
                    <span>Metodologi Resmi</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0D6E5B] tracking-tight scroll-anim delay-75">
                    Desa Madani Menuju Kemandirian & Kesejahteraan Berkelanjutan
                </h2>
                <p class="text-[#5A6B65] text-sm sm:text-base leading-relaxed scroll-anim delay-150">
                    Kerangka integrasi pemetaan partisipatif, data statistik sensus keluarga, dan potensi ekonomi lokal untuk mewujudkan kemandirian 133 desa di Kolaka Utara.
                </p>
            </div>

            <!-- 5 Pilar Editorial Cards Grid (Organic, Varied Weight, High-Class SVGs) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 pilar-cards-grid">
                <!-- Pilar 1: Spasial -->
                <div class="scroll-anim delay-75 h-full">
                    <div class="pilar-card-col h-full cursor-pointer flex flex-col" onclick="openPilarModal(1)" title="Klik untuk memperbesar detail Pilar 1">
                        <div data-parallax-speed="-0.03" class="parallax-float pilar-card-inner bg-[#FDFDFB] hover:bg-white rounded-3xl p-6 border border-[#5A6B65]/20 hover:border-[#0D6E5B] shadow-[0_4px_20px_rgba(13,110,91,0.04)] hover:shadow-[0_12px_30px_rgba(13,110,91,0.1)] transition-all duration-300 group h-full flex flex-col justify-between relative overflow-hidden">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-2xl font-black text-[#0D6E5B]/40 group-hover:text-[#0D6E5B] transition-colors">01</span>
                                    <div class="w-11 h-11 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] flex items-center justify-center group-hover:bg-[#0D6E5B] group-hover:text-white transition-all duration-300 shadow-2xs">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/><circle cx="12" cy="10" r="2" fill="currentColor"/></svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-extrabold text-[#0D6E5B] text-base group-hover:text-[#095244] transition">
                                        Dimensi Spasial & Peta
                                    </h3>
                                    <div class="w-8 h-0.5 bg-[#0D6E5B]/40 group-hover:w-14 transition-all duration-300 my-2.5"></div>
                                    <p class="text-xs text-[#5A6B65] leading-relaxed">
                                        Akuisisi data spasial dan ortofoto resolusi tinggi untuk batas wilayah, zonasi kakao, dan infrastruktur desa.
                                    </p>
                                </div>
                            </div>
                            <div class="pt-4 mt-4 border-t border-[#5A6B65]/10 flex items-center justify-between">
                                <span class="inline-flex items-center text-[10px] font-bold text-[#0D6E5B] bg-[#0D6E5B]/8 px-2.5 py-1 rounded-full">
                                    Fondasi Geospasial
                                </span>
                                <span class="text-[10px] font-semibold text-[#0D6E5B]/70 group-hover:text-[#0D6E5B] flex items-center gap-1 transition">
                                    <span>Detail</span>
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pilar 2: Partisipasi Warga -->
                <div class="scroll-anim delay-150 h-full">
                    <div class="pilar-card-col h-full cursor-pointer flex flex-col" onclick="openPilarModal(2)" title="Klik untuk memperbesar detail Pilar 2">
                        <div data-parallax-speed="0.03" class="parallax-float pilar-card-inner bg-[#FDFDFB] hover:bg-white rounded-3xl p-6 border border-[#5A6B65]/20 hover:border-[#0D6E5B] shadow-[0_4px_20px_rgba(13,110,91,0.04)] hover:shadow-[0_12px_30px_rgba(13,110,91,0.1)] transition-all duration-300 group h-full flex flex-col justify-between relative overflow-hidden">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-2xl font-black text-[#0D6E5B]/40 group-hover:text-[#0D6E5B] transition-colors">02</span>
                                    <div class="w-11 h-11 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] flex items-center justify-center group-hover:bg-[#0D6E5B] group-hover:text-white transition-all duration-300 shadow-2xs">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-extrabold text-[#0D6E5B] text-base group-hover:text-[#095244] transition">
                                        Partisipasi Warga
                                    </h3>
                                    <div class="w-8 h-0.5 bg-[#0D6E5B]/40 group-hover:w-14 transition-all duration-300 my-2.5"></div>
                                    <p class="text-xs text-[#5A6B65] leading-relaxed">
                                        Melibatkan aparatur desa dan surveyor pemuda lokal dalam pendataan mandiri dan verifikasi data lapangan.
                                    </p>
                                </div>
                            </div>
                            <div class="pt-4 mt-4 border-t border-[#5A6B65]/10 flex items-center justify-between">
                                <span class="inline-flex items-center text-[10px] font-bold text-[#0D6E5B] bg-[#0D6E5B]/8 px-2.5 py-1 rounded-full">
                                    Kolaborasi Warga
                                </span>
                                <span class="text-[10px] font-semibold text-[#0D6E5B]/70 group-hover:text-[#0D6E5B] flex items-center gap-1 transition">
                                    <span>Detail</span>
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pilar 3: Sensus Profil Keluarga -->
                <div class="scroll-anim delay-225 h-full">
                    <div class="pilar-card-col h-full cursor-pointer flex flex-col" onclick="openPilarModal(3)" title="Klik untuk memperbesar detail Pilar 3">
                        <div data-parallax-speed="-0.04" class="parallax-float pilar-card-inner bg-[#FDFDFB] hover:bg-white rounded-3xl p-6 border border-[#5A6B65]/20 hover:border-[#0D6E5B] shadow-[0_4px_20px_rgba(13,110,91,0.04)] hover:shadow-[0_12px_30px_rgba(13,110,91,0.1)] transition-all duration-300 group h-full flex flex-col justify-between relative overflow-hidden">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-2xl font-black text-[#0D6E5B]/40 group-hover:text-[#0D6E5B] transition-colors">03</span>
                                    <div class="w-11 h-11 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] flex items-center justify-center group-hover:bg-[#0D6E5B] group-hover:text-white transition-all duration-300 shadow-2xs">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4m-6-3h6"/></svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-extrabold text-[#0D6E5B] text-base group-hover:text-[#095244] transition">
                                        Sensus Profil Keluarga
                                    </h3>
                                    <div class="w-8 h-0.5 bg-[#0D6E5B]/40 group-hover:w-14 transition-all duration-300 my-2.5"></div>
                                    <p class="text-xs text-[#5A6B65] leading-relaxed">
                                        Pendataan profil 37.013 Kepala Keluarga secara rinci (<i>by name, by address</i>) dengan geotagging akurat.
                                    </p>
                                </div>
                            </div>
                            <div class="pt-4 mt-4 border-t border-[#5A6B65]/10 flex items-center justify-between">
                                <span class="inline-flex items-center text-[10px] font-bold text-[#0D6E5B] bg-[#0D6E5B]/8 px-2.5 py-1 rounded-full">
                                    Presisi Demografis
                                </span>
                                <span class="text-[10px] font-semibold text-[#0D6E5B]/70 group-hover:text-[#0D6E5B] flex items-center gap-1 transition">
                                    <span>Detail</span>
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pilar 4: Ekonomi & BUMDes -->
                <div class="scroll-anim delay-300 h-full">
                    <div class="pilar-card-col h-full cursor-pointer flex flex-col" onclick="openPilarModal(4)" title="Klik untuk memperbesar detail Pilar 4">
                        <div data-parallax-speed="0.02" class="parallax-float pilar-card-inner bg-[#FDFDFB] hover:bg-white rounded-3xl p-6 border border-[#5A6B65]/20 hover:border-[#0D6E5B] shadow-[0_4px_20px_rgba(13,110,91,0.04)] hover:shadow-[0_12px_30px_rgba(13,110,91,0.1)] transition-all duration-300 group h-full flex flex-col justify-between relative overflow-hidden">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-2xl font-black text-[#0D6E5B]/40 group-hover:text-[#0D6E5B] transition-colors">04</span>
                                    <div class="w-11 h-11 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] flex items-center justify-center group-hover:bg-[#0D6E5B] group-hover:text-white transition-all duration-300 shadow-2xs">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-extrabold text-[#0D6E5B] text-base group-hover:text-[#095244] transition">
                                        Ekonomi & BUMDes
                                    </h3>
                                    <div class="w-8 h-0.5 bg-[#0D6E5B]/40 group-hover:w-14 transition-all duration-300 my-2.5"></div>
                                    <p class="text-xs text-[#5A6B65] leading-relaxed">
                                        Pengembangan rantai nilai komoditas kakao, cengkeh, perikanan pesisir, dan penguatan unit usaha BUMDes.
                                    </p>
                                </div>
                            </div>
                            <div class="pt-4 mt-4 border-t border-[#5A6B65]/10 flex items-center justify-between">
                                <span class="inline-flex items-center text-[10px] font-bold text-[#0D6E5B] bg-[#0D6E5B]/8 px-2.5 py-1 rounded-full">
                                    Kemandirian Usaha
                                </span>
                                <span class="text-[10px] font-semibold text-[#0D6E5B]/70 group-hover:text-[#0D6E5B] flex items-center gap-1 transition">
                                    <span>Detail</span>
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pilar 5: Analitik Podes BPS -->
                <div class="scroll-anim delay-375 h-full">
                    <div class="pilar-card-col h-full cursor-pointer flex flex-col" onclick="openPilarModal(5)" title="Klik untuk memperbesar detail Pilar 5">
                        <div data-parallax-speed="-0.03" class="parallax-float pilar-card-inner bg-[#FDFDFB] hover:bg-white rounded-3xl p-6 border border-[#5A6B65]/20 hover:border-[#0D6E5B] shadow-[0_4px_20px_rgba(13,110,91,0.04)] hover:shadow-[0_12px_30px_rgba(13,110,91,0.1)] transition-all duration-300 group h-full flex flex-col justify-between relative overflow-hidden">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-2xl font-black text-[#0D6E5B]/40 group-hover:text-[#0D6E5B] transition-colors">05</span>
                                    <div class="w-11 h-11 rounded-full bg-[#0D6E5B]/10 text-[#0D6E5B] flex items-center justify-center group-hover:bg-[#0D6E5B] group-hover:text-white transition-all duration-300 shadow-2xs">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-extrabold text-[#0D6E5B] text-base group-hover:text-[#095244] transition">
                                        Analitik Podes BPS
                                    </h3>
                                    <div class="w-8 h-0.5 bg-[#0D6E5B]/40 group-hover:w-14 transition-all duration-300 my-2.5"></div>
                                    <p class="text-xs text-[#5A6B65] leading-relaxed">
                                        Pengolahan statistik potensi desa terpadu untuk merumuskan kebijakan publik berbasis bukti nyata.
                                    </p>
                                </div>
                            </div>
                            <div class="pt-4 mt-4 border-t border-[#5A6B65]/10 flex items-center justify-between">
                                <span class="inline-flex items-center text-[10px] font-bold text-[#0D6E5B] bg-[#0D6E5B]/8 px-2.5 py-1 rounded-full">
                                    Bukti Statistik
                                </span>
                                <span class="text-[10px] font-semibold text-[#0D6E5B]/70 group-hover:text-[#0D6E5B] flex items-center gap-1 transition">
                                    <span>Detail</span>
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- =========================================================================
             MODAL: POP UP DETAIL 5 PILAR DESA MADANI (FULL BACKDROP BLUR)
             ========================================================================= -->
        <div id="pilarModalOverlay" 
             class="fixed inset-0 z-[95] flex items-center justify-center p-4 sm:p-6"
             onclick="handlePilarBackdropClick(event)">
            <div id="pilarModalDialog" 
                 class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-emerald-100 overflow-hidden flex flex-col max-h-[92vh]">
                
                <!-- Modal Header with Emerald Nature Gradient Banner -->
                <div class="relative bg-gradient-to-r from-[#0D6E5B] via-[#0b5c4c] to-[#08483b] p-6 sm:p-7 text-white flex-shrink-0 overflow-hidden">
                    <!-- Ambient Glow inside header -->
                    <div class="absolute -top-12 -right-12 w-48 h-48 bg-emerald-400/25 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="absolute -bottom-10 -left-10 w-36 h-36 bg-teal-300/20 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="relative z-10 flex items-start justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div id="pilarModalIconBox" class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-white/15 backdrop-blur-md border border-white/25 text-white flex items-center justify-center shadow-lg flex-shrink-0">
                                <!-- SVG inserted by JS -->
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                                    <span id="pilarModalNumber" class="font-mono text-[11px] font-black tracking-widest text-emerald-200 uppercase bg-white/15 px-2.5 py-0.5 rounded-full border border-white/20">PILAR 01</span>
                                    <span id="pilarModalTag" class="text-xs font-bold text-emerald-100 bg-white/10 px-2.5 py-0.5 rounded-full">Fondasi Geospasial</span>
                                </div>
                                <h3 id="pilarModalTitle" class="text-xl sm:text-2xl font-black text-white tracking-tight leading-snug">
                                    Dimensi Spasial & Peta
                                </h3>
                            </div>
                        </div>
                        <!-- Close Button -->
                        <button type="button" 
                                onclick="closePilarModal()" 
                                class="w-9 h-9 rounded-full bg-white/15 hover:bg-white/25 active:scale-95 text-white flex items-center justify-center transition focus:outline-none flex-shrink-0 cursor-pointer"
                                title="Tutup (Esc)">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Modal Body Content -->
                <div class="p-6 sm:p-7 overflow-y-auto space-y-5 text-slate-700 flex-1">
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#0D6E5B] mb-2 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#0D6E5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Ringkasan Kerangka Kerja</span>
                        </h4>
                        <p id="pilarModalDesc" class="text-xs sm:text-sm text-slate-600 leading-relaxed bg-[#FDFDFB] p-4 rounded-2xl border border-slate-200/80 shadow-2xs">
                            <!-- Populated by JS -->
                        </p>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#0D6E5B] mb-2.5 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#0D6E5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Ruang Lingkup & Fokus Utama</span>
                        </h4>
                        <div id="pilarModalPoints" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <!-- Populated by JS -->
                        </div>
                    </div>

                    <!-- Highlight Badge / Metric -->
                    <div id="pilarModalHighlight" class="p-3.5 sm:p-4 rounded-2xl bg-emerald-50/80 border border-emerald-200/70 flex items-center gap-3">
                        <!-- Populated by JS -->
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-3.5 sm:py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between gap-4 flex-shrink-0">
                    <span class="text-xs text-slate-500 font-medium hidden sm:inline">Desa Madani • BPS Kabupaten Kolaka Utara</span>
                    <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                        <button type="button" 
                                onclick="closePilarModal()" 
                                class="px-5 py-2.5 rounded-full bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs transition cursor-pointer">
                            Tutup
                        </button>
                        <a id="pilarModalActionBtn" 
                           href="/portal#sectionPeta" 
                           class="px-5 py-2.5 rounded-full bg-[#0D6E5B] hover:bg-[#095244] text-white font-bold text-xs shadow-md transition flex items-center gap-2 cursor-pointer">
                            <span>Jelajahi Portal</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- SECTION 3: SOROTAN DESA UNGGULAN KOLAKA UTARA (EDITORIAL NATURE TRAVEL FRAMING) -->
    <section id="potensi" class="py-24 bg-white scroll-mt-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-16 sm:space-y-24 relative z-10">
            <!-- Editorial Header -->
            <div class="flex flex-wrap items-end justify-between gap-6 border-b border-slate-200/80 pb-8">
                <div class="space-y-2 max-w-2xl">
                    <div class="w-10 h-1 bg-[#0D6E5B] rounded-full mb-1"></div>
                    <span class="text-xs font-black uppercase tracking-widest text-[#0D6E5B] block scroll-anim">Sorotan Wilayah Berprestasi</span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight font-heading scroll-anim delay-75">
                        Desa Unggulan Kolaka Utara
                    </h2>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed scroll-anim delay-150">
                        Eksplorasi narasi 4 desa percontohan dengan capaian indeks perkembangan tertinggi, karakteristik lanskap alam pesisir karst, dan sentra komoditas unggulan daerah.
                    </p>
                </div>
                <div class="scroll-anim delay-150">
                    <a href="/portal#sectionPeta" class="px-6 py-3 rounded-full bg-[#0D6E5B] hover:bg-[#095244] text-white font-black text-xs uppercase tracking-wider shadow-md transition transform hover:scale-105 active:scale-95 flex items-center gap-2.5 group">
                        <span>Buka Peta WebGIS Lengkap</span>
                        <svg class="w-3.5 h-3.5 text-white group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

            <!-- Vertical Storytelling with Organic Zig-Zag Flow & Route Trail -->
            <div class="relative">
                <!-- Garis Jalur Rute (Curved SVG Line) Berkelanjutan dari Item 1 hingga 4 di Desktop -->
                <svg class="hidden lg:block absolute inset-0 w-full h-full pointer-events-none z-0" 
                     viewBox="0 0 1000 1000" 
                     preserveAspectRatio="none" 
                     fill="none">
                    <!-- Curved Path Berwarna Abu-Abu Tua -->
                    <path d="M 680 115 
                             C 680 235, 320 235, 320 370 
                             C 320 500, 680 500, 680 635 
                             C 680 770, 320 770, 320 890" 
                          stroke="#475569" 
                          stroke-width="1.75" 
                          stroke-dasharray="5 5" 
                          stroke-linecap="round" 
                          opacity="0.65" />
                    
                    <!-- Titik Merah Kecil (Waypoint Dots pada Jalur SVG) -->
                    <circle cx="680" cy="115" r="4.5" fill="#e11d48" stroke="#ffffff" stroke-width="2" />
                    <circle cx="320" cy="370" r="4.5" fill="#e11d48" stroke="#ffffff" stroke-width="2" />
                    <circle cx="680" cy="635" r="4.5" fill="#e11d48" stroke="#ffffff" stroke-width="2" />
                    <circle cx="320" cy="890" r="4.5" fill="#e11d48" stroke="#ffffff" stroke-width="2" />
                </svg>

                <!-- Mobile Vertical Route Line -->
                <div class="lg:hidden absolute left-4 sm:left-6 top-8 bottom-8 w-0.5 border-l-2 border-dashed border-slate-300 pointer-events-none z-0"></div>

                <!-- 4 Baris Storytelling Vertikal (Selang-Seling Zig-Zag) -->
                <div class="relative z-10 space-y-24 sm:space-y-32 lg:space-y-36">

                    <!-- ==========================================
                         BARIS 1 (GANJIL): FOTO KIRI, TEKS KANAN
                         DESA PITULUA (PANTAI BEROVA)
                         ========================================== -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">
                        <!-- Foto Organik (Feathered Edge Masking) - Kolom Kiri -->
                        <div class="lg:col-span-6 order-1 scroll-anim">
                            <div class="relative flex items-center justify-center">
                                <!-- Ambient Watercolor Glow (Behind Photo) -->
                                <div class="absolute inset-4 bg-teal-100/40 rounded-full blur-3xl pointer-events-none -z-10"></div>
                                <!-- Organic Masked Photo (No card border/shadow) -->
                                <div class="relative w-full max-w-lg mx-auto aspect-[4/3] overflow-hidden feathered-organic-mask-1 group">
                                    <img src="/images/jadesta/pantai_berova_pitulua.webp" 
                                         alt="Desa Pitulua (Pantai Berova)" 
                                         class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out"
                                         loading="lazy">
                                </div>
                            </div>
                        </div>

                        <!-- Teks Informasi - Kolom Kanan -->
                        <div class="lg:col-span-6 order-2 space-y-4 scroll-anim delay-75 pl-6 lg:pl-0">
                            <!-- Waypoint Dot (Titik Merah Kecil) -->
                            <div class="inline-flex items-center gap-2.5 px-3.5 py-1 rounded-full bg-slate-100/90 border border-slate-200/80 text-slate-700 text-xs font-bold uppercase tracking-wider">
                                <span class="relative flex h-2.5 w-2.5 flex-shrink-0">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-rose-600 ring-2 ring-white"></span>
                                </span>
                                <span>Waypoint 01 • Kec. Lasusua</span>
                            </div>

                            <!-- Tipografi & Aksen Watermark Handwriting Dekoratif -->
                            <div class="relative pt-3 sm:pt-5 pb-1">
                                <span class="absolute -top-3 sm:-top-4 left-0 select-none pointer-events-none font-handwriting text-5xl sm:text-6xl lg:text-7xl text-slate-300/35 tracking-wider whitespace-nowrap z-0 -rotate-2">
                                    Kecamatan Lasusua
                                </span>
                                <h3 class="relative z-10 font-condensed text-2xl sm:text-3xl lg:text-4xl font-black uppercase tracking-tight text-slate-900 leading-tight">
                                    Desa Pitulua (Pantai Berova)
                                </h3>
                            </div>

                            <!-- Status & IPD Chips -->
                            <div class="flex items-center gap-3 pt-1 flex-wrap">
                                <span class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <span>Desa Mandiri</span>
                                </span>
                                <span class="font-mono text-xs font-black text-emerald-800 bg-emerald-500/15 px-2.5 py-0.5 rounded-full border border-emerald-500/25">
                                    IPD: 86.4
                                </span>
                            </div>

                            <!-- Deskripsi Desa -->
                            <p class="text-slate-600 text-sm sm:text-base leading-relaxed pt-1">
                                Sentra Wisata Bahari Pantai Berova, BUMDes pengelola tiket &amp; kios kuliner, perikanan tangkap, dan perkebunan kakao.
                            </p>

                            <!-- Tombol Link Bergaris Bawah -->
                            <div class="pt-3">
                                <a href="/portal#sectionPeta" 
                                   class="group/link inline-flex items-center gap-2 text-xs sm:text-sm font-black tracking-widest text-[#0D6E5B] uppercase underline underline-offset-8 decoration-2 decoration-[#0D6E5B] hover:text-[#095244] hover:decoration-[#095244] transition-all">
                                    <span>LIHAT DI PETA</span>
                                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                         BARIS 2 (GENAP): TEKS KIRI, FOTO KANAN
                         KELURAHAN LASUSUA
                         ========================================== -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">
                        <!-- Teks Informasi - Kolom Kiri -->
                        <div class="lg:col-span-6 order-2 lg:order-1 space-y-4 scroll-anim pl-6 lg:pl-0">
                            <!-- Waypoint Dot (Titik Merah Kecil) -->
                            <div class="inline-flex items-center gap-2.5 px-3.5 py-1 rounded-full bg-slate-100/90 border border-slate-200/80 text-slate-700 text-xs font-bold uppercase tracking-wider">
                                <span class="relative flex h-2.5 w-2.5 flex-shrink-0">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-rose-600 ring-2 ring-white"></span>
                                </span>
                                <span>Rute 02 • Kec. Lasusua</span>
                            </div>

                            <!-- Tipografi & Aksen Watermark Handwriting Dekoratif -->
                            <div class="relative pt-3 sm:pt-5 pb-1">
                                <span class="absolute -top-3 sm:-top-4 left-0 select-none pointer-events-none font-handwriting text-5xl sm:text-6xl lg:text-7xl text-slate-300/35 tracking-wider whitespace-nowrap z-0 -rotate-2">
                                    Ibukota Kabupaten
                                </span>
                                <h3 class="relative z-10 font-condensed text-2xl sm:text-3xl lg:text-4xl font-black uppercase tracking-tight text-slate-900 leading-tight">
                                    Kelurahan Lasusua
                                </h3>
                            </div>

                            <!-- Status & IPD Chips -->
                            <div class="flex items-center gap-3 pt-1 flex-wrap">
                                <span class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-blue-50 border border-blue-200 text-blue-800 text-xs font-bold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                    <span>Ibukota Kabupaten</span>
                                </span>
                                <span class="font-mono text-xs font-black text-blue-800 bg-blue-500/15 px-2.5 py-0.5 rounded-full border border-blue-500/25">
                                    IPD: 89.2
                                </span>
                            </div>

                            <!-- Deskripsi Desa -->
                            <p class="text-slate-600 text-sm sm:text-base leading-relaxed pt-1">
                                Pusat perkantoran Pemkab, layanan RSUD Djafar Harun, perbankan, sentra kuliner olahan cokelat, dan perdagangan.
                            </p>

                            <!-- Tombol Link Bergaris Bawah -->
                            <div class="pt-3">
                                <a href="/portal#sectionPeta" 
                                   class="group/link inline-flex items-center gap-2 text-xs sm:text-sm font-black tracking-widest text-[#0D6E5B] uppercase underline underline-offset-8 decoration-2 decoration-[#0D6E5B] hover:text-[#095244] hover:decoration-[#095244] transition-all">
                                    <span>LIHAT DI PETA</span>
                                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>

                        <!-- Foto Organik (Feathered Edge Masking) - Kolom Kanan -->
                        <div class="lg:col-span-6 order-1 lg:order-2 scroll-anim delay-75">
                            <div class="relative flex items-center justify-center">
                                <!-- Ambient Watercolor Glow (Behind Photo) -->
                                <div class="absolute inset-4 bg-blue-100/40 rounded-full blur-3xl pointer-events-none -z-10"></div>
                                <!-- Organic Masked Photo (No card border/shadow) -->
                                <div class="relative w-full max-w-lg mx-auto aspect-[4/3] overflow-hidden feathered-organic-mask-2 group">
                                    <img src="/images/jadesta/kelurahan_lasusua.jpg" 
                                         alt="Kelurahan Lasusua" 
                                         class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out"
                                         loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                         BARIS 3 (GANJIL): FOTO KIRI, TEKS KANAN
                         DESA WALASIHO (DANAU BIRU)
                         ========================================== -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">
                        <!-- Foto Organik (Feathered Edge Masking) - Kolom Kiri -->
                        <div class="lg:col-span-6 order-1 scroll-anim">
                            <div class="relative flex items-center justify-center">
                                <!-- Ambient Watercolor Glow (Behind Photo) -->
                                <div class="absolute inset-4 bg-emerald-100/40 rounded-full blur-3xl pointer-events-none -z-10"></div>
                                <!-- Organic Masked Photo (No card border/shadow) -->
                                <div class="relative w-full max-w-lg mx-auto aspect-[4/3] overflow-hidden feathered-organic-mask-3 group">
                                    <img src="/images/jadesta/danau_biru_walasiho.jpg" 
                                         alt="Desa Walasiho (Danau Biru)" 
                                         class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out"
                                         loading="lazy">
                                </div>
                            </div>
                        </div>

                        <!-- Teks Informasi - Kolom Kanan -->
                        <div class="lg:col-span-6 order-2 space-y-4 scroll-anim delay-75 pl-6 lg:pl-0">
                            <!-- Waypoint Dot (Titik Merah Kecil) -->
                            <div class="inline-flex items-center gap-2.5 px-3.5 py-1 rounded-full bg-slate-100/90 border border-slate-200/80 text-slate-700 text-xs font-bold uppercase tracking-wider">
                                <span class="relative flex h-2.5 w-2.5 flex-shrink-0">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-rose-600 ring-2 ring-white"></span>
                                </span>
                                <span>Rute 03 • Kec. Wawo</span>
                            </div>

                            <!-- Tipografi & Aksen Watermark Handwriting Dekoratif -->
                            <div class="relative pt-3 sm:pt-5 pb-1">
                                <span class="absolute -top-3 sm:-top-4 left-0 select-none pointer-events-none font-handwriting text-5xl sm:text-6xl lg:text-7xl text-slate-300/35 tracking-wider whitespace-nowrap z-0 -rotate-2">
                                    Kecamatan Wawo
                                </span>
                                <h3 class="relative z-10 font-condensed text-2xl sm:text-3xl lg:text-4xl font-black uppercase tracking-tight text-slate-900 leading-tight">
                                    Desa Walasiho (Danau Biru)
                                </h3>
                            </div>

                            <!-- Status & IPD Chips -->
                            <div class="flex items-center gap-3 pt-1 flex-wrap">
                                <span class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-teal-50 border border-teal-200 text-teal-800 text-xs font-bold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-teal-600"></span>
                                    <span>Desa Maju</span>
                                </span>
                                <span class="font-mono text-xs font-black text-teal-800 bg-teal-500/15 px-2.5 py-0.5 rounded-full border border-teal-500/25">
                                    IPD: 77.8
                                </span>
                            </div>

                            <!-- Deskripsi Desa -->
                            <p class="text-slate-600 text-sm sm:text-base leading-relaxed pt-1">
                                Danau alami air jernih biru toska, tebing karst megah, hutan lindung tropis, dan perkebunan kakao rakyat.
                            </p>

                            <!-- Tombol Link Bergaris Bawah -->
                            <div class="pt-3">
                                <a href="/portal#sectionPeta" 
                                   class="group/link inline-flex items-center gap-2 text-xs sm:text-sm font-black tracking-widest text-[#0D6E5B] uppercase underline underline-offset-8 decoration-2 decoration-[#0D6E5B] hover:text-[#095244] hover:decoration-[#095244] transition-all">
                                    <span>LIHAT DI PETA</span>
                                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                         BARIS 4 (GENAP): TEKS KIRI, FOTO KANAN
                         DESA TOTALLANG
                         ========================================== -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">
                        <!-- Teks Informasi - Kolom Kiri -->
                        <div class="lg:col-span-6 order-2 lg:order-1 space-y-4 scroll-anim pl-6 lg:pl-0">
                            <!-- Waypoint Dot (Titik Merah Kecil) -->
                            <div class="inline-flex items-center gap-2.5 px-3.5 py-1 rounded-full bg-slate-100/90 border border-slate-200/80 text-slate-700 text-xs font-bold uppercase tracking-wider">
                                <span class="relative flex h-2.5 w-2.5 flex-shrink-0">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-rose-600 ring-2 ring-white"></span>
                                </span>
                                <span>Rute 04 • Kec. Lasusua</span>
                            </div>

                            <!-- Tipografi & Aksen Watermark Handwriting Dekoratif -->
                            <div class="relative pt-3 sm:pt-5 pb-1">
                                <span class="absolute -top-3 sm:-top-4 left-0 select-none pointer-events-none font-handwriting text-5xl sm:text-6xl lg:text-7xl text-slate-300/35 tracking-wider whitespace-nowrap z-0 -rotate-2">
                                    Sentra Kakao &amp; Nilam
                                </span>
                                <h3 class="relative z-10 font-condensed text-2xl sm:text-3xl lg:text-4xl font-black uppercase tracking-tight text-slate-900 leading-tight">
                                    Desa Totallang
                                </h3>
                            </div>

                            <!-- Status & IPD Chips -->
                            <div class="flex items-center gap-3 pt-1 flex-wrap">
                                <span class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-amber-50 border border-amber-200 text-amber-800 text-xs font-bold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                    <span>Sentra Kakao &amp; Nilam</span>
                                </span>
                                <span class="font-mono text-xs font-black text-amber-800 bg-amber-500/15 px-2.5 py-0.5 rounded-full border border-amber-500/25">
                                    IPD: 78.1
                                </span>
                            </div>

                            <!-- Deskripsi Desa -->
                            <p class="text-slate-600 text-sm sm:text-base leading-relaxed pt-1">
                                Perkebunan kakao berkelanjutan, penyulingan minyak atsiri nilam, dan tanaman cengkeh bernilai ekspor tinggi.
                            </p>

                            <!-- Tombol Link Bergaris Bawah -->
                            <div class="pt-3">
                                <a href="/portal#sectionPeta" 
                                   class="group/link inline-flex items-center gap-2 text-xs sm:text-sm font-black tracking-widest text-[#0D6E5B] uppercase underline underline-offset-8 decoration-2 decoration-[#0D6E5B] hover:text-[#095244] hover:decoration-[#095244] transition-all">
                                    <span>LIHAT DI PETA</span>
                                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>

                        <!-- Foto Organik (Feathered Edge Masking) - Kolom Kanan -->
                        <div class="lg:col-span-6 order-1 lg:order-2 scroll-anim delay-75">
                            <div class="relative flex items-center justify-center">
                                <!-- Ambient Watercolor Glow (Behind Photo) -->
                                <div class="absolute inset-4 bg-amber-100/40 rounded-full blur-3xl pointer-events-none -z-10"></div>
                                <!-- Organic Masked Photo (No card border/shadow) -->
                                <div class="relative w-full max-w-lg mx-auto aspect-[4/3] overflow-hidden feathered-organic-mask-4 group">
                                    <img src="/images/jadesta/kebun_kakao_totallang.jpg" 
                                         alt="Desa Totallang" 
                                         class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out"
                                         loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: KLASIFIKASI KEMANDIRIAN DESA (EDITORIAL DEVELOPMENT PROGRESSION) -->
    <section id="klasifikasi" class="py-20 bg-[#F7F7F5] border-y border-[#5A6B65]/15 scroll-mt-20 relative overflow-hidden">
        <!-- Parallax Ambient Blobs -->
        <div data-parallax-speed="0.15" class="parallax-float absolute top-1/4 -right-20 w-80 h-80 bg-[#0D6E5B]/8 rounded-full blur-3xl pointer-events-none"></div>
        <div data-parallax-speed="-0.12" class="parallax-float absolute bottom-10 -left-20 w-72 h-72 bg-teal-100/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12 relative z-10">
            <!-- Section Title -->
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="w-8 h-1 bg-[#0D6E5B] rounded-full mx-auto mb-2"></div>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#0D6E5B]/10 border border-[#0D6E5B]/20 text-xs font-bold text-[#0D6E5B] uppercase tracking-wider scroll-anim">
                    <span>Data Podes BPS 2024–2025</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0D6E5B] tracking-tight scroll-anim delay-75">
                    Klasifikasi Status Perkembangan 133 Desa
                </h2>
                <p class="text-[#5A6B65] text-sm sm:text-base leading-relaxed scroll-anim delay-150">
                    Pengelompokan status perkembangan desa di Kabupaten Kolaka Utara berdasarkan Indeks Perkembangan Desa (IPD) yang diukur dari layanan dasar, aksesibilitas, dan ekonomi desa.
                </p>
            </div>

            <!-- 4 Step Progressive Editorial Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative klasifikasi-cards-grid">
                <!-- Step 1: Tertinggal -->
                <div class="scroll-anim delay-75 h-full">
                    <div class="klasifikasi-card-col h-full cursor-pointer flex flex-col" onclick="openKlasifikasiModal(1)" title="Klik untuk memperbesar detail Desa Tertinggal">
                        <div data-parallax-speed="-0.03" class="parallax-float klasifikasi-card-inner bg-[#FDFDFB] hover:bg-white rounded-3xl p-6 border border-[#5A6B65]/20 hover:border-rose-400 hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between h-full">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-2xl font-black text-rose-300 group-hover:text-rose-600 transition-colors">
                                        01
                                    </span>
                                    <span class="text-[10px] font-bold px-3 py-1 rounded-full bg-rose-50 text-rose-800 border border-rose-200">
                                        3 Desa (2,2%)
                                    </span>
                                </div>
                                <div>
                                    <div class="w-9 h-9 rounded-full bg-rose-100/70 text-rose-600 flex items-center justify-center mb-3">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                    </div>
                                    <h4 class="text-lg font-black text-slate-800 group-hover:text-rose-600 transition">
                                        Desa Tertinggal
                                    </h4>
                                    <div class="w-8 h-0.5 bg-rose-400/40 my-2"></div>
                                    <p class="text-xs text-[#5A6B65] leading-relaxed">
                                        Desa dengan indeks IPD &lt; 60. Membutuhkan intervensi prioritas infrastruktur dasar jalan penghubung, penguatan jaringan listrik, dan air bersih.
                                    </p>
                                </div>
                            </div>
                            <div class="mt-6 pt-3 border-t border-[#5A6B65]/15 flex items-center justify-between text-xs font-bold text-rose-700">
                                <span>Fokus Intervensi Khusus</span>
                                <span class="text-[10px] font-semibold text-rose-600/70 group-hover:text-rose-600 flex items-center gap-1 transition">
                                    <span>Detail</span>
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Berkembang -->
                <div class="scroll-anim delay-150 h-full">
                    <div class="klasifikasi-card-col h-full cursor-pointer flex flex-col" onclick="openKlasifikasiModal(2)" title="Klik untuk memperbesar detail Desa Berkembang">
                        <div data-parallax-speed="0.04" class="parallax-float klasifikasi-card-inner bg-[#FDFDFB] hover:bg-white rounded-3xl p-6 border border-[#5A6B65]/20 hover:border-amber-400 hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between h-full">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-2xl font-black text-amber-300 group-hover:text-amber-600 transition-colors">
                                        02
                                    </span>
                                    <span class="text-[10px] font-bold px-3 py-1 rounded-full bg-amber-50 text-amber-800 border border-amber-200">
                                        38 Desa (28,6%)
                                    </span>
                                </div>
                                <div>
                                    <div class="w-9 h-9 rounded-full bg-amber-100/70 text-amber-600 flex items-center justify-center mb-3">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                    </div>
                                    <h4 class="text-lg font-black text-slate-800 group-hover:text-amber-700 transition">
                                        Desa Berkembang
                                    </h4>
                                    <div class="w-8 h-0.5 bg-amber-400/40 my-2"></div>
                                    <p class="text-xs text-[#5A6B65] leading-relaxed">
                                        Desa dengan IPD 60–70. Memiliki ketersediaan sarana dasar yang mulai stabil, BUMDes aktif rintisan, dan mulai terhubung akses telekomunikasi 4G.
                                    </p>
                                </div>
                            </div>
                            <div class="mt-6 pt-3 border-t border-[#5A6B65]/15 flex items-center justify-between text-xs font-bold text-amber-700">
                                <span>Akselerasi Produktivitas</span>
                                <span class="text-[10px] font-semibold text-amber-600/70 group-hover:text-amber-600 flex items-center gap-1 transition">
                                    <span>Detail</span>
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Maju (Featured Largest Group) -->
                <div class="scroll-anim delay-225 h-full">
                    <div class="klasifikasi-card-col h-full cursor-pointer flex flex-col" onclick="openKlasifikasiModal(3)" title="Klik untuk memperbesar detail Desa Maju">
                        <div data-parallax-speed="-0.02" class="parallax-float klasifikasi-card-inner bg-[#F4F9F7] hover:bg-white rounded-3xl p-6 border-2 border-[#0D6E5B]/40 hover:border-[#0D6E5B] shadow-md hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between h-full">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-2xl font-black text-[#0D6E5B] transition-colors">
                                        03
                                    </span>
                                    <span class="text-[10px] font-extrabold px-3 py-1 rounded-full bg-[#0D6E5B] text-white shadow-2xs">
                                        64 Desa (48,1%)
                                    </span>
                                </div>
                                <div>
                                    <div class="w-9 h-9 rounded-full bg-[#0D6E5B]/15 text-[#0D6E5B] flex items-center justify-center mb-3">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                    </div>
                                    <h4 class="text-lg font-black text-[#0D6E5B] transition">
                                        Desa Maju
                                    </h4>
                                    <div class="w-8 h-0.5 bg-[#0D6E5B] my-2"></div>
                                    <p class="text-xs text-[#5A6B65] leading-relaxed">
                                        Kelompok terbesar di Kolaka Utara (IPD 70–80). Pelayanan publik dan faskes memadai, jalan aspal hotmix, dan komoditas perkebunan kakao sangat produktif.
                                    </p>
                                </div>
                            </div>
                            <div class="mt-6 pt-3 border-t border-[#0D6E5B]/20 flex items-center justify-between text-xs font-bold text-[#0D6E5B]">
                                <span>Kategori Terbesar Kolut</span>
                                <span class="text-[10px] font-semibold text-[#0D6E5B]/70 group-hover:text-[#0D6E5B] flex items-center gap-1 transition">
                                    <span>Detail</span>
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Mandiri -->
                <div class="scroll-anim delay-300 h-full">
                    <div class="klasifikasi-card-col h-full cursor-pointer flex flex-col" onclick="openKlasifikasiModal(4)" title="Klik untuk memperbesar detail Desa Mandiri">
                        <div data-parallax-speed="0.05" class="parallax-float klasifikasi-card-inner bg-[#FDFDFB] hover:bg-white rounded-3xl p-6 border border-[#5A6B65]/20 hover:border-emerald-500 hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between h-full">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-2xl font-black text-emerald-300 group-hover:text-emerald-700 transition-colors">
                                        04
                                    </span>
                                    <span class="text-[10px] font-bold px-3 py-1 rounded-full bg-emerald-50 text-emerald-900 border border-emerald-200">
                                        28 Desa (21,1%)
                                    </span>
                                </div>
                                <div>
                                    <div class="w-9 h-9 rounded-full bg-emerald-100/70 text-emerald-700 flex items-center justify-center mb-3">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                    </div>
                                    <h4 class="text-lg font-black text-slate-800 group-hover:text-[#0D6E5B] transition">
                                        Desa Mandiri
                                    </h4>
                                    <div class="w-8 h-0.5 bg-emerald-400/40 my-2"></div>
                                    <p class="text-xs text-[#5A6B65] leading-relaxed">
                                        Desa dengan indeks IPD &gt; 80. Memiliki kemandirian fiskal, BUMDes berdaya saing tinggi, fasilitas lengkap, dan menjadi barometer pembangunan daerah.
                                    </p>
                                </div>
                            </div>
                            <div class="mt-6 pt-3 border-t border-[#5A6B65]/15 flex items-center justify-between text-xs font-bold text-[#0D6E5B]">
                                <span>Desa Madani Percontohan</span>
                                <span class="text-[10px] font-semibold text-[#0D6E5B]/70 group-hover:text-[#0D6E5B] flex items-center gap-1 transition">
                                    <span>Detail</span>
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- =========================================================================
             MODAL: POP UP DETAIL 4 KLASIFIKASI STATUS DESA (FULL BACKDROP BLUR)
             ========================================================================= -->
        <div id="klasifikasiModalOverlay" 
             class="fixed inset-0 z-[95] flex items-center justify-center p-4 sm:p-6"
             onclick="handleKlasifikasiBackdropClick(event)">
            <div id="klasifikasiModalDialog" 
                 class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden flex flex-col max-h-[92vh]">
                
                <!-- Modal Header with Dynamic Gradient Banner -->
                <div id="klasifikasiModalHeader" class="relative p-6 sm:p-7 text-white flex-shrink-0 overflow-hidden bg-gradient-to-r from-[#0D6E5B] to-[#043328]">
                    <!-- Ambient Glow inside header -->
                    <div class="absolute -top-12 -right-12 w-48 h-48 bg-white/15 rounded-full blur-2xl pointer-events-none"></div>
                    <div class="absolute -bottom-10 -left-10 w-36 h-36 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="relative z-10 flex items-start justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div id="klasifikasiModalIconBox" class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-white/20 backdrop-blur-md border border-white/25 text-white flex items-center justify-center shadow-lg flex-shrink-0">
                                <!-- SVG inserted by JS -->
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                                    <span id="klasifikasiModalNumber" class="font-mono text-[11px] font-black tracking-widest text-white/90 uppercase bg-white/20 px-2.5 py-0.5 rounded-full border border-white/25">01</span>
                                    <span id="klasifikasiModalBadge" class="text-xs font-bold text-white bg-black/25 px-2.5 py-0.5 rounded-full border border-white/20">3 Desa (2,2%)</span>
                                </div>
                                <h3 id="klasifikasiModalTitle" class="text-xl sm:text-2xl font-black text-white tracking-tight leading-snug">
                                    Desa Tertinggal
                                </h3>
                                <p id="klasifikasiModalSubtitle" class="text-xs text-white/80 font-medium mt-0.5">Indeks Perkembangan Desa (IPD) < 60</p>
                            </div>
                        </div>
                        <!-- Close Button -->
                        <button type="button" 
                                onclick="closeKlasifikasiModal()" 
                                class="w-9 h-9 rounded-full bg-white/15 hover:bg-white/25 active:scale-95 text-white flex items-center justify-center transition focus:outline-none flex-shrink-0 cursor-pointer"
                                title="Tutup (Esc)">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Modal Body Content -->
                <div class="p-6 sm:p-7 overflow-y-auto space-y-5 text-slate-700 flex-1">
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#0D6E5B] mb-2 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#0D6E5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Karakteristik & Profil Status</span>
                        </h4>
                        <p id="klasifikasiModalDesc" class="text-xs sm:text-sm text-slate-600 leading-relaxed bg-[#FDFDFB] p-4 rounded-2xl border border-slate-200/80 shadow-2xs">
                            <!-- Populated by JS -->
                        </p>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#0D6E5B] mb-2.5 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#0D6E5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Fokus Indikator & Langkah Kebijakan</span>
                        </h4>
                        <div id="klasifikasiModalPoints" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <!-- Populated by JS -->
                        </div>
                    </div>

                    <!-- Highlight Badge / Metric -->
                    <div id="klasifikasiModalHighlight" class="p-3.5 sm:p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-center gap-3">
                        <!-- Populated by JS -->
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-3.5 sm:py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between gap-4 flex-shrink-0">
                    <span class="text-xs text-slate-500 font-medium hidden sm:inline">Podes BPS Kolaka Utara • Indeks Perkembangan Desa</span>
                    <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                        <button type="button" 
                                onclick="closeKlasifikasiModal()" 
                                class="px-5 py-2.5 rounded-full bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs transition cursor-pointer">
                            Tutup
                        </button>
                        <a id="klasifikasiModalActionBtn" 
                           href="/portal#sectionTabel" 
                           class="px-5 py-2.5 rounded-full bg-[#0D6E5B] hover:bg-[#095244] text-white font-bold text-xs shadow-md transition flex items-center gap-2 cursor-pointer">
                            <span>Buka Data Desa</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
<!-- SECTION 5: GATEWAY CALL-TO-ACTION (AKSES KE WEB UTAMA DESA MADANI) -->
    <section class="py-16 bg-gradient-to-br from-[#061a33] via-[#0b2545] to-[#043328] text-white relative overflow-hidden">
        <!-- Parallax Ambient Blobs -->
        <div data-parallax-speed="0.2" class="parallax-float absolute -top-24 -left-24 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div data-parallax-speed="-0.16" class="parallax-float absolute -bottom-24 -right-24 w-96 h-96 bg-amber-400/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10 text-center space-y-6">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-black tracking-widest uppercase border border-emerald-400/30 scroll-anim">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                <span>Pusat Data & WebGIS Interaktif</span>
            </div>

            <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight max-w-3xl mx-auto leading-tight font-heading scroll-anim delay-75">
                Siap Menjelajahi Seluruh Potensi Desa Madani Kolaka Utara?
            </h2>

            <p class="text-emerald-100/90 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed scroll-anim delay-150">
                Kunjungi Web Utama untuk melihat Peta Interaktif WebGIS 15 Kecamatan, analisis 5 dimensi karakteristik kemandirian desa (Diagram Radar), statistik Podes BPS 2024–2025, dan kelola master data desa.
            </p>

            <div class="flex items-center justify-center gap-4 flex-wrap pt-4 scroll-anim delay-225">
                <a href="/portal" class="px-8 py-3.5 rounded-full bg-amber-400 hover:bg-amber-300 text-slate-950 font-black text-sm shadow-xl transition transform hover:-translate-y-1 flex items-center gap-2.5">
                    <svg class="w-5 h-5 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    <span>Masuk ke Web Utama & Peta WebGIS</span>
                </a>
                <a href="/portal#sectionDesaPresisi" class="px-7 py-3.5 rounded-full bg-white/10 hover:bg-white/20 text-white font-bold text-sm border border-white/20 transition flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Data Desa Presisi</span>
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER: DESA MADANI KOLAKA UTARA -->
    <footer class="bg-[#0b2545] text-white py-12 border-t border-emerald-900/40 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pb-8 border-b border-white/10">
                <div class="md:col-span-5 space-y-3 scroll-anim">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-emerald-600 flex items-center justify-center font-bold text-white">DM</div>
                        <span class="text-base font-black text-white">Desa Madani Kolaka Utara</span>
                    </div>
                    <p class="text-slate-300 leading-relaxed text-xs max-w-sm">
                        Inisiatif Satu Data Desa Madani terintegrasi dengan Badan Pusat Statistik Kabupaten Kolaka Utara dan Pemerintah Daerah. Mewujudkan kemandirian, kemakmuran, dan kedaulatan data desa.
                    </p>
                </div>
                <div class="md:col-span-3 space-y-2.5 scroll-anim delay-100">
                    <h4 class="font-extrabold text-amber-400 text-sm">Navigasi Landing</h4>
                    <ul class="space-y-1.5 text-slate-300">
                        <li><a href="/" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="#pilar" class="hover:text-white transition">Pilar Kemandirian</a></li>
                        <li><a href="#potensi" class="hover:text-white transition">Desa Unggulan</a></li>
                        <li><a href="#klasifikasi" class="hover:text-white transition">Klasifikasi Podes BPS</a></li>
                    </ul>
                </div>
                <div class="md:col-span-4 space-y-2.5 scroll-anim delay-200">
                    <h4 class="font-extrabold text-amber-400 text-sm">Portal Utama</h4>
                    <ul class="space-y-1.5 text-slate-300">
                        <li><a href="/portal" class="hover:text-amber-300 font-bold transition flex items-center gap-1.5"><span>→ Web Utama & Peta WebGIS Desa</span></a></li>
                        <li><a href="/portal#sectionDesaPresisi" class="hover:text-amber-300 transition">Data Desa Presisi PODES</a></li>
                        <li><a href="/descan" class="hover:text-amber-300 transition">Program Desa Cantik (DESCAN)</a></li>
                        <li><a href="/portal#sectionAbout" class="hover:text-amber-300 transition">Tentang Inisiatif Desa Madani</a></li>
                        <li><a href="https://kolutkab.bps.go.id" target="_blank" class="hover:text-white transition">BPS Kabupaten Kolaka Utara</a></li>
                        <li><a href="https://kolakautarakab.go.id" target="_blank" class="hover:text-white transition">Pemerintah Kabupaten Kolaka Utara</a></li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-slate-400 text-[11px] scroll-anim delay-300">
                <p>© 2026 Inisiatif Desa Madani & BPS Kabupaten Kolaka Utara. Seluruh Hak Cipta Dilindungi.</p>
                <p class="text-emerald-400 font-semibold">Membangun Kolaka Utara Dari Desa Madani</p>
            </div>
        </div>
    </footer>

    <!-- Welcoming Video Lifecycle, Looping Animations & Parallax Scripts -->
    <script>
        const video = document.getElementById('kolutVideo');
        const heroSection = document.getElementById('heroVideoSection');
        const heroCard = document.getElementById('heroCard');
        const videoLayer = document.getElementById('videoParallaxLayer');
        const orb1 = document.getElementById('orb1');
        const orb2 = document.getElementById('orb2');

        // 1. Welcoming Video Lifecycle: Munculkan opening hingga durasi video habis
        let openingFinished = false;
        let fallbackTimeout = null;

        // Reset scroll position ke atas saat pertama kali dibuka
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }
        window.scrollTo(0, 0);

        function finishOpening() {
            if (openingFinished) return;
            openingFinished = true;
            if (fallbackTimeout) clearTimeout(fallbackTimeout);

            // Buka kembali scrolling halaman setelah video opening selesai
            document.documentElement.classList.remove('overflow-hidden');
            document.body.classList.remove('overflow-hidden');

            if (video) {
                try {
                    video.pause(); // Kunci bersih pada frame terakhir video
                } catch(e) {}
            }

            // Sembunyikan tombol lewati opening jika ada
            const skipBtn = document.getElementById('skipOpeningBtn');
            if (skipBtn) {
                skipBtn.classList.remove('opacity-100');
                skipBtn.classList.add('opacity-0', 'pointer-events-none');
            }

            // Tampilkan Header Navbar
            const topHud = document.getElementById('videoTopHud');
            if (topHud) {
                topHud.classList.remove('opacity-0', '-translate-y-3', 'pointer-events-none');
                topHud.classList.add('opacity-100', 'translate-y-0');
            }

            // Tampilkan Judul & Badge Atas
            const heroWrapper = document.getElementById('heroCardWrapper');
            if (heroWrapper) {
                heroWrapper.classList.remove('opacity-0', '-translate-y-4', 'translate-y-4', 'pointer-events-none');
                heroWrapper.classList.add('opacity-100', 'translate-y-0');
            }

            // Tampilkan Bottom HUD (15 Kecamatan, 133 Desa, dll.)
            const bottomHud = document.getElementById('videoBottomHud');
            if (bottomHud) {
                bottomHud.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
                bottomHud.classList.add('opacity-100', 'translate-y-0');
            }

            // Gelapkan sedikit latar belakang agar teks terbaca sangat jelas
            const backdropOverlay = document.getElementById('videoBackdropOverlay');
            if (backdropOverlay) {
                backdropOverlay.classList.remove('opacity-0', 'opacity-30');
                backdropOverlay.classList.add('opacity-100');
            }

            if (heroCard) {
                heroCard.classList.add('scale-[1.02]');
                setTimeout(() => heroCard.classList.remove('scale-[1.02]'), 600);
            }
        }

        if (video) {
            // Kunci scroll selama video opening berlangsung
            document.documentElement.classList.add('overflow-hidden');
            document.body.classList.add('overflow-hidden');

            // Video diputar penuh sampai durasi videonya benar-benar habis (ended)
            video.addEventListener('ended', finishOpening);
            
            // Backup presisi: jika currentTime sudah menyentuh durasi akhir
            video.addEventListener('timeupdate', () => {
                if (video.duration && video.currentTime >= (video.duration - 0.05)) {
                    finishOpening();
                }
            });

            // Mulai putar video opening (muted memastikan autoplay berhasil di semua browser)
            video.muted = true;
            const playPromise = video.play();
            if (playPromise !== undefined) {
                playPromise.catch((err) => {
                    console.warn('Autoplay video opening:', err);
                });
            }

            // Fallback cadangan hanya jika video gagal dimuat sama sekali
            video.addEventListener('error', finishOpening);
            fallbackTimeout = setTimeout(() => {
                if (!openingFinished) {
                    finishOpening();
                }
            }, 10000); // 10 detik batas aman jika terjadi kendala jaringan ekstrim
        } else {
            finishOpening();
        }

        // 2. Replay Welcoming Video
        function replayWelcomingVideo() {
            if (!video) return;
            hasWelcomed = false;
            video.currentTime = 0;
            video.play();

            const badgeText = document.getElementById('badgeText');
            const badgePulseDot = document.getElementById('badgePulseDot');

            if (badgeText) badgeText.textContent = 'SELAMAT DATANG DI DESA MADANI';
            if (badgePulseDot) {
                badgePulseDot.classList.remove('bg-amber-400');
                badgePulseDot.classList.add('bg-emerald-400');
            }
        }

        // 3. Audio Toggle
        function toggleSound() {
            if (!video) return;
            const soundIcon = document.getElementById('soundIcon');
            const soundLabel = document.getElementById('soundLabel');
            const audioBtn = document.getElementById('audioToggleBtn');

            video.muted = !video.muted;
            const svgMuted = '<svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/></svg>';
            const svgActive = '<svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>';
            if (video.muted) {
                if (soundIcon) soundIcon.innerHTML = svgMuted;
                if (soundLabel) soundLabel.textContent = 'Suara';
                if (audioBtn) {
                    audioBtn.classList.remove('bg-emerald-500/80', 'border-emerald-400/50');
                    audioBtn.classList.add('bg-white/15', 'border-white/25');
                }
            } else {
                video.volume = 1.0;
                if (soundIcon) soundIcon.innerHTML = svgActive;
                if (soundLabel) soundLabel.textContent = 'Suara Aktif';
                if (audioBtn) {
                    audioBtn.classList.remove('bg-white/15', 'border-white/25');
                    audioBtn.classList.add('bg-emerald-500/80', 'border-emerald-400/50');
                }
            }
        }

        // 4. Parallax Entrance Transition into Website
        function enterWebsiteWithParallax() {
            const target = document.getElementById('tentang');
            if (target) {
                // Gentle camera zoom on video layer
                if (video) {
                    video.style.transform = 'scale(1.06)';
                    setTimeout(() => {
                        video.style.transform = 'scale(1)';
                    }, 1200);
                }
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // 5. 3D Mouse Movement Parallax on Welcoming Hero (Desktop)
        if (heroSection && heroCard) {
            heroSection.addEventListener('mousemove', (e) => {
                const rect = heroSection.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width - 0.5;
                const y = (e.clientY - rect.top) / rect.height - 0.5;

                // Subtle 3D perspective tilt on the welcoming card
                heroCard.style.transform = `perspective(1000px) rotateY(${x * 8}deg) rotateX(${-y * 8}deg) translateZ(12px)`;

                // Ambient glow orbs shift in counter direction
                if (orb1) orb1.style.transform = `translate(${x * 35}px, ${y * 35}px)`;
                if (orb2) orb2.style.transform = `translate(${-x * 35}px, ${-y * 35}px)`;
            });

            heroSection.addEventListener('mouseleave', () => {
                heroCard.style.transform = 'perspective(1000px) rotateY(0deg) rotateX(0deg) translateZ(0px)';
                if (orb1) orb1.style.transform = 'translate(0px, 0px)';
                if (orb2) orb2.style.transform = 'translate(0px, 0px)';
            });
        }

        // 6. Hero Scroll-driven Depth Parallax
        window.addEventListener('scroll', () => {
            const scrollY = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollY < window.innerHeight) {
                // Background video translates at 42% speed
                if (videoLayer) {
                    videoLayer.style.transform = `translateY(${scrollY * 0.42}px)`;
                }
                // Hero card floats up & fades gently
                if (heroCard) {
                    const opacity = Math.max(0, 1 - scrollY / (window.innerHeight * 0.65));
                    heroCard.style.opacity = opacity;
                }
            }
        }, { passive: true });

        // 7. Looping Entrance & Exit Scroll Animation Engine (Terlooping Saat Scroll Naik & Turun)
        const animElements = document.querySelectorAll('.scroll-anim, .scroll-anim-left, .scroll-anim-right, .scroll-anim-scale');
        
        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                } else {
                    // Remove in-view when leaving viewport to allow looping re-entrance when scrolling back
                    entry.target.classList.remove('in-view');
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px'
        });

        animElements.forEach(el => scrollObserver.observe(el));

        // 8. Universal Page-wide Differential Parallax Engine for [data-parallax-speed]
        const parallaxEls = document.querySelectorAll('[data-parallax-speed]');
        let isTicking = false;

        function updateParallaxElements() {
            const winH = window.innerHeight;
            parallaxEls.forEach(el => {
                const speed = parseFloat(el.getAttribute('data-parallax-speed')) || 0;
                const rect = el.getBoundingClientRect();
                
                // Only compute if within or near viewport
                if (rect.top < winH + 180 && rect.bottom > -180) {
                    const elCenter = rect.top + rect.height / 2;
                    const viewportCenter = winH / 2;
                    const distFromCenter = elCenter - viewportCenter;
                    const offset = (distFromCenter * speed).toFixed(1);
                    el.style.transform = `translate3d(0, ${offset}px, 0)`;
                }
            });
            isTicking = false;
        }

        window.addEventListener('scroll', () => {
            if (!isTicking) {
                window.requestAnimationFrame(updateParallaxElements);
                isTicking = true;
            }
        }, { passive: true });

        // Run once on initial load
        window.addEventListener('DOMContentLoaded', updateParallaxElements);
        updateParallaxElements();
    </script>
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
                    <span>Masuk Administrator & Operator</span>
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
                            <span>Email / Username</span>
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
                                <span>Kata Sandi</span>
                            </label>
                            <span class="text-[11px] text-slate-400 hover:text-emerald-600 cursor-pointer transition" onclick="alert('Silakan hubungi BPS Kolaka Utara untuk bantuan akses akun.')">Lupa sandi?</span>
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
                            <span>Ingat Sesi Masuk</span>
                        </label>
                        <span class="text-[11px] text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md font-bold border border-emerald-200/60">BPS Kolut</span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            id="btnSubmitLogin" 
                            class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-[#059669] via-[#047857] to-[#0b2545] hover:from-[#047857] hover:to-[#061a33] text-white font-extrabold text-sm shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 focus:outline-none">
                        <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        <span id="btnSubmitLoginText">Masuk ke Sistem</span>
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

    <!-- Login Modal Logic Script -->
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
            if (e.key === 'Escape') {
                closeLoginModal();
                closePilarModal();
                closeKlasifikasiModal();
            }
        });

        /* ========================================================
           5 PILAR SHOWCASE MODAL CONTROLLER
           ======================================================== */
        const pilarData = {
            1: {
                number: 'PILAR 01',
                tag: 'Fondasi Geospasial',
                title: 'Dimensi Spasial & Peta',
                desc: 'Akuisisi data spasial dan ortofoto resolusi tinggi untuk batas wilayah, zonasi kakao, dan infrastruktur desa secara akurat, terverifikasi, dan terintegrasi dalam platform WebGIS.',
                icon: `<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/><circle cx="12" cy="10" r="2" fill="currentColor"/></svg>`,
                points: [
                    { title: 'Ortofoto Resolusi Tinggi', desc: 'Pemetaan drone dengan akurasi ground sampling distance < 10 cm/pixel.' },
                    { title: 'Delimitasi Batas Wilayah', desc: 'Penegasan batas 133 desa & kelurahan berbasis kesepakatan adat & hukum.' },
                    { title: 'Zonasi Perkebunan & Tani', desc: 'Pemetaan poligon komoditas kakao, cengkeh, dan lahan pertanian pangan.' },
                    { title: 'Layer Infrastruktur Desa', desc: 'Inventarisasi digital jalan desa, jembatan, irigasi, dan fasilitas umum.' }
                ],
                highlight: {
                    badge: 'Cakupan Spasial Terpadu',
                    text: '133 Desa/Kelurahan terpetakan secara digital dengan layer batas dan tutupan lahan terverifikasi.'
                },
                actionUrl: '/portal#sectionPeta',
                actionText: 'Buka WebGIS Peta'
            },
            2: {
                number: 'PILAR 02',
                tag: 'Kolaborasi Warga',
                title: 'Partisipasi Warga',
                desc: 'Melibatkan aparatur desa dan surveyor pemuda lokal dalam pendataan mandiri, ground-check, serta verifikasi data lapangan secara partisipatif dan berkelanjutan.',
                icon: `<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>`,
                points: [
                    { title: 'Kader Pendata Pemuda', desc: 'Pelatihan intensif pemuda lokal sebagai surveyor digital mandiri.' },
                    { title: 'Validasi Bersama RT/RW', desc: 'Verifikasi faktual di tingkat tapak bersama ketua rukun tetangga.' },
                    { title: 'Musyawarah Data Desa', desc: 'Transparansi data melalui forum rembug desa sebelum disahkan.' },
                    { title: 'Pembaruan Data Berkala', desc: 'Mekanisme pelaporan dinamis saat ada mutasi penduduk atau aset.' }
                ],
                highlight: {
                    badge: 'Gotong Royong Data Desa',
                    text: 'Ratusan relawan pemuda dan aparat desa aktif berkontribusi dalam sensus mandiri desa.'
                },
                actionUrl: '/portal#sectionTabel',
                actionText: 'Lihat Data Partisipatif'
            },
            3: {
                number: 'PILAR 03',
                tag: 'Presisi Demografis',
                title: 'Sensus Profil Keluarga',
                desc: 'Pendataan profil 37.013 Kepala Keluarga secara rinci (by name, by address) dengan geotagging akurat untuk penargetan intervensi program sosial yang tepat sasaran.',
                icon: `<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4m-6-3h6"/></svg>`,
                points: [
                    { title: '37.013 KK Terdata', desc: 'Sensus 100% kepala keluarga dengan data sosial-ekonomi komprehensif.' },
                    { title: 'Geotagging Tempat Tinggal', desc: 'Setiap rumah tangga memiliki titik koordinat GPS dan foto visual hunian.' },
                    { title: 'Penapisan Bansos Tepat Sasaran', desc: 'Eliminasi exclusion & inclusion error pada penyaluran program bantuan.' },
                    { title: 'Integrasi Stunting & Sanitasi', desc: 'Pemantauan keluarga berisiko stunting dan akses air minum bersih.' }
                ],
                highlight: {
                    badge: 'Presisi 100% By Name By Address',
                    text: '37.013 Kepala Keluarga by name, by address dengan geotagging koordinat akurat.'
                },
                actionUrl: '/portal#sectionStatistik',
                actionText: 'Lihat Statistik Profil'
            },
            4: {
                number: 'PILAR 04',
                tag: 'Kemandirian Usaha',
                title: 'Ekonomi & BUMDes',
                desc: 'Pengembangan rantai nilai komoditas kakao, cengkeh, perikanan pesisir, dan penguatan unit usaha BUMDes menuju desa mandiri dan berdaya saing ekonomi tinggi.',
                icon: `<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`,
                points: [
                    { title: 'Rantai Nilai Kakao & Cengkeh', desc: 'Peningkatan mutu panen dan integrasi sertifikasi komoditas unggulan.' },
                    { title: 'Tata Kelola Profesional BUMDes', desc: 'Transformasi BUMDes menjadi motor penggerak ekonomi riil perdesaan.' },
                    { title: 'Hilirisasi & Akses Pasar', desc: 'Konektivitas petani lokal dengan industri pengolahan tanpa perantara berlebih.' },
                    { title: 'Potensi Wisata & Pesisir', desc: 'Pengembangan ekowisata bahari dan agrowisata berbasis kearifan lokal.' }
                ],
                highlight: {
                    badge: 'Kemandirian Fiskal Desa',
                    text: 'Sinergi BUMDes dan petani untuk nilai tambah komoditas unggulan Kolaka Utara.'
                },
                actionUrl: '/portal#sectionPotensi',
                actionText: 'Eksplorasi Potensi Desa'
            },
            5: {
                number: 'PILAR 05',
                tag: 'Bukti Statistik',
                title: 'Analitik Podes BPS',
                desc: 'Pengolahan statistik potensi desa terpadu berbasis metodologi resmi BPS untuk merumuskan kebijakan publik yang tepat, terukur, dan berdampak nyata bagi masyarakat.',
                icon: `<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>`,
                points: [
                    { title: 'Standar Metodologi BPS', desc: 'Kesesuaian dengan indikator resmi Pendataan Potensi Desa (Podes).' },
                    { title: 'Indeks Perkembangan Desa', desc: 'Klasifikasi status desa secara objektif berdasarkan bukti empiris.' },
                    { title: 'Dashboard Evidence-Based', desc: 'Visualisasi analitik terpadu untuk pengambil kebijakan di Bappeda & OPD.' },
                    { title: 'Simulasi Dampak Program', desc: 'Analisis evaluasi dampak alokasi program terhadap penurunan kemiskinan.' }
                ],
                highlight: {
                    badge: 'BPS Official Standard',
                    text: 'Integrasi data statistik resmi menjamin validitas dan komparabilitas kebijakan daerah.'
                },
                actionUrl: '/portal#sectionAnalitik',
                actionText: 'Lihat Analitik Podes'
            }
        };

        window.openPilarModal = function(id) {
            const data = pilarData[id];
            if (!data) return;

            const elNum = document.getElementById('pilarModalNumber');
            const elTag = document.getElementById('pilarModalTag');
            const elTitle = document.getElementById('pilarModalTitle');
            const elDesc = document.getElementById('pilarModalDesc');
            const elIcon = document.getElementById('pilarModalIconBox');
            const elPoints = document.getElementById('pilarModalPoints');
            const elHighlight = document.getElementById('pilarModalHighlight');
            const elAction = document.getElementById('pilarModalActionBtn');

            if (elNum) elNum.innerText = data.number;
            if (elTag) elTag.innerText = data.tag;
            if (elTitle) elTitle.innerText = data.title;
            if (elDesc) elDesc.innerText = data.desc;
            if (elIcon) elIcon.innerHTML = data.icon;

            if (elPoints) {
                elPoints.innerHTML = data.points.map(pt => `
                    <div class="p-3.5 rounded-2xl bg-slate-50/90 border border-slate-200/60 hover:border-emerald-300 transition group/pt">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-2 h-2 rounded-full bg-[#0D6E5B] group-hover/pt:scale-125 transition-transform"></span>
                            <h5 class="text-xs font-bold text-slate-800">${pt.title}</h5>
                        </div>
                        <p class="text-[11px] text-slate-500 leading-relaxed">${pt.desc}</p>
                    </div>
                `).join('');
            }

            if (elHighlight && data.highlight) {
                elHighlight.innerHTML = `
                    <div class="w-8 h-8 rounded-xl bg-[#0D6E5B] text-white flex items-center justify-center flex-shrink-0 font-bold text-xs shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-[#0D6E5B] uppercase tracking-wide block">${data.highlight.badge}</span>
                        <p class="text-xs text-slate-700 font-semibold">${data.highlight.text}</p>
                    </div>
                `;
            }

            if (elAction) {
                elAction.href = data.actionUrl;
                const txtSpan = elAction.querySelector('span');
                if (txtSpan) txtSpan.innerText = data.actionText;
            }

            const overlay = document.getElementById('pilarModalOverlay');
            if (overlay) {
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        };

        window.closePilarModal = function() {
            const overlay = document.getElementById('pilarModalOverlay');
            if (overlay) {
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        };

        window.handlePilarBackdropClick = function(e) {
            if (e.target.id === 'pilarModalOverlay') {
                window.closePilarModal();
            }
        };

        /* ========================================================
           4 KLASIFIKASI STATUS DESA MODAL CONTROLLER
           ======================================================== */
        const klasifikasiData = {
            1: {
                number: '01',
                badge: '3 Desa (2,2%)',
                title: 'Desa Tertinggal',
                subtitle: 'Indeks Perkembangan Desa (IPD) < 60',
                headerClass: 'bg-gradient-to-r from-rose-700 via-rose-800 to-slate-900',
                accentColor: '#e11d48',
                desc: 'Desa dengan keterbatasan sarana dasar, aksesibilitas jalan transportasi yang belum memadai, serta jaringan listrik dan telekomunikasi yang membutuhkan akselerasi percepatan pembangunan oleh pemerintah daerah.',
                icon: `<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>`,
                points: [
                    { title: 'Layanan Kesehatan & Sanitasi', desc: 'Peningkatan fasilitas puskesmas pembantu (Pustu) dan ketersediaan tenaga medis menetap.' },
                    { title: 'Akses Jalan Penghubung', desc: 'Perkerasan dan pengaspalan ruas jalan penghubung antardesa yang rentan cuaca ekstrem.' },
                    { title: 'Air Bersih & Kelistrikan', desc: 'Penguatan sambungan air bersih PAMDES dan perluasan jaringan listrik pedesaan.' },
                    { title: 'Prioritas Anggaran Khusus', desc: 'Afirmasi Dana Alokasi Khusus (DAK) fisik dan pendampingan terpadu OPD Pemkab.' }
                ],
                highlight: {
                    badge: 'Fokus Intervensi Khusus',
                    text: 'Hanya tersisa 3 desa (2,2%) di Kolaka Utara, target tuntas naik kelas pada periode perencanaan berikutnya.'
                },
                actionUrl: '/portal#sectionTabel',
                actionText: 'Lihat Daftar Desa'
            },
            2: {
                number: '02',
                badge: '38 Desa (28,6%)',
                title: 'Desa Berkembang',
                subtitle: 'Indeks Perkembangan Desa (IPD) 60 – 70',
                headerClass: 'bg-gradient-to-r from-amber-600 via-amber-700 to-slate-900',
                accentColor: '#d97706',
                desc: 'Desa yang telah memiliki ketersediaan pelayanan dasar yang mulai stabil, BUMDes aktif rintisan, terhubung sinyal seluler 4G, dan siap diakselerasi menuju kelompok desa maju.',
                icon: `<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>`,
                points: [
                    { title: 'Penguatan BUMDes Rintisan', desc: 'Pendampingan manajerial dan permodalan agar unit usaha desa mandiri dan berprofit.' },
                    { title: 'Optimalisasi Jaringan 4G', desc: 'Pemanfaatan jaringan seluler untuk administrasi desa digital dan promosi produk lokal.' },
                    { title: 'Hilirisasi Kebun Kakao', desc: 'Peningkatan mutu fermentasi biji kakao untuk memenuhi standar pasar industri.' },
                    { title: 'Pendidikan & Posyandu', desc: 'Ketersediaan PAUD terpadu dan posyandu aktif dengan pemantauan gizi anak.' }
                ],
                highlight: {
                    badge: 'Akselerasi Produktivitas',
                    text: '38 Desa (28,6%) memiliki momentum tercepat untuk bertransformasi menjadi Desa Maju.'
                },
                actionUrl: '/portal#sectionTabel',
                actionText: 'Lihat Data Desa Berkembang'
            },
            3: {
                number: '03',
                badge: '64 Desa (48,1%)',
                title: 'Desa Maju',
                subtitle: 'Indeks Perkembangan Desa (IPD) 70 – 80',
                headerClass: 'bg-gradient-to-r from-[#0D6E5B] via-[#095244] to-[#043328]',
                accentColor: '#0D6E5B',
                desc: 'Kelompok terbesar di Kabupaten Kolaka Utara (hampir 50% wilayah). Memiliki infrastruktur jalan aspal hotmix memadai, fasilitas kesehatan dan pendidikan lengkap, serta produktivitas ekonomi kakao & perikanan yang tinggi.',
                icon: `<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>`,
                points: [
                    { title: 'Kelompok Paling Dominan', desc: 'Mencakup 64 desa (48,1%) sebagai tulang punggung perekonomian Kabupaten Kolaka Utara.' },
                    { title: 'Fasilitas Layanan Lengkap', desc: 'Puskesmas pembantu rawat jalan, SMP/MTs, dan sarana olahraga warga dalam kondisi baik.' },
                    { title: 'Rantai Pasok Komoditas Kuat', desc: 'Sentra kakao, cengkeh, dan perikanan dengan konektivitas jalan hotmix langsung ke ibukota.' },
                    { title: 'Kesiapan Status Mandiri', desc: 'Mayoritas desa telah memenuhi 80% kriteria untuk dideklarasikan sebagai Desa Mandiri.' }
                ],
                highlight: {
                    badge: 'Kategori Terbesar Kolut',
                    text: '64 Desa menjadi pilar stabilitas ekonomi, pangan, dan ketahanan sosial Kabupaten Kolaka Utara.'
                },
                actionUrl: '/portal#sectionPeta',
                actionText: 'Buka Peta Desa Maju'
            },
            4: {
                number: '04',
                badge: '28 Desa (21,1%)',
                title: 'Desa Mandiri',
                subtitle: 'Indeks Perkembangan Desa (IPD) > 80',
                headerClass: 'bg-gradient-to-r from-emerald-700 via-teal-800 to-slate-900',
                accentColor: '#059669',
                desc: 'Desa percontohan dengan kapasitas kemandirian fiskal dan pendapatan asli desa (PADes) mandiri, BUMDes berdaya saing tinggi, fasilitas publik modern, dan menjadi barometer inovasi daerah.',
                icon: `<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>`,
                points: [
                    { title: 'Kemandirian PADes Nyata', desc: 'BUMDes memiliki unit usaha beromzet tinggi di sektor pariwisata, perdagangan, dan logistik.' },
                    { title: 'Pelayanan Publik Digital', desc: 'Penyelenggaraan administrasi kependudukan dan transparansi APBDes berbasis aplikasi digital.' },
                    { title: 'Infrastruktur Kelas Satu', desc: 'Seluruh jalan beraspal mulus, sanitasi layak 100%, dan fasilitas umum ramah disabilitas.' },
                    { title: 'Desa Wisata Unggulan', desc: 'Contoh nyata: Desa Pitulua (Wisata Pantai Berova) dan Kelurahan Lasusua pusat pemerintahan.' }
                ],
                highlight: {
                    badge: 'Desa Madani Percontohan',
                    text: '28 Desa (21,1%) telah mencapai puncak kemandirian dan menjadi model replikasi pembangunan.'
                },
                actionUrl: '/portal#sectionPeta',
                actionText: 'Buka Peta Desa Mandiri'
            }
        };

        window.openKlasifikasiModal = function(id) {
            const data = klasifikasiData[id];
            if (!data) return;

            const elNum = document.getElementById('klasifikasiModalNumber');
            const elBadge = document.getElementById('klasifikasiModalBadge');
            const elTitle = document.getElementById('klasifikasiModalTitle');
            const elSub = document.getElementById('klasifikasiModalSubtitle');
            const elDesc = document.getElementById('klasifikasiModalDesc');
            const elIcon = document.getElementById('klasifikasiModalIconBox');
            const elHeader = document.getElementById('klasifikasiModalHeader');
            const elPoints = document.getElementById('klasifikasiModalPoints');
            const elHighlight = document.getElementById('klasifikasiModalHighlight');
            const elAction = document.getElementById('klasifikasiModalActionBtn');

            if (elNum) elNum.innerText = data.number;
            if (elBadge) elBadge.innerText = data.badge;
            if (elTitle) elTitle.innerText = data.title;
            if (elSub) elSub.innerText = data.subtitle;
            if (elDesc) elDesc.innerText = data.desc;
            if (elIcon) elIcon.innerHTML = data.icon;
            if (elHeader) elHeader.className = `relative p-6 sm:p-7 text-white flex-shrink-0 overflow-hidden ${data.headerClass}`;

            if (elPoints) {
                elPoints.innerHTML = data.points.map(pt => `
                    <div class="p-3.5 rounded-2xl bg-slate-50/90 border border-slate-200/60 hover:border-slate-300 transition group/pt">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-2 h-2 rounded-full" style="background-color: ${data.accentColor}"></span>
                            <h5 class="text-xs font-bold text-slate-800">${pt.title}</h5>
                        </div>
                        <p class="text-[11px] text-slate-500 leading-relaxed">${pt.desc}</p>
                    </div>
                `).join('');
            }

            if (elHighlight && data.highlight) {
                elHighlight.innerHTML = `
                    <div class="w-8 h-8 rounded-xl text-white flex items-center justify-center flex-shrink-0 font-bold text-xs shadow-sm" style="background-color: ${data.accentColor}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wide block" style="color: ${data.accentColor}">${data.highlight.badge}</span>
                        <p class="text-xs text-slate-700 font-semibold">${data.highlight.text}</p>
                    </div>
                `;
            }

            if (elAction) {
                elAction.href = data.actionUrl;
                const txtSpan = elAction.querySelector('span');
                if (txtSpan) txtSpan.innerText = data.actionText;
            }

            const overlay = document.getElementById('klasifikasiModalOverlay');
            if (overlay) {
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        };

        window.closeKlasifikasiModal = function() {
            const overlay = document.getElementById('klasifikasiModalOverlay');
            if (overlay) {
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        };

        window.handleKlasifikasiBackdropClick = function(e) {
            if (e.target.id === 'klasifikasiModalOverlay') {
                window.closeKlasifikasiModal();
            }
        };

        document.getElementById('modalLoginForm')?.addEventListener('click', function(e) {
            if (e.target === this) closeLoginModal();
        });

        // Auto open if url parameter ?login=1 exists
        if (new URLSearchParams(window.location.search).has('login')) {
            window.openLoginModal();
        }
    </script>
</body>
</html>
