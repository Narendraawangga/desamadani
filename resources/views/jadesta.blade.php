<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Madani Kabupaten Kolaka Utara - Portal Data & Analitik Kemandirian Desa</title>
    
    <!-- Google Fonts: DM Sans & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;1,9..40,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

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
            background-color: #fcfbf7;
            color: #1e293b;
            scroll-behavior: smooth;
        }

        .sec-title__tagline {
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #059669;
            display: inline-block;
        }

        .sec-title__title {
            font-size: 2.25rem;
            line-height: 1.15;
            font-weight: 800;
            color: #0b2545;
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
            
            <!-- Soft Ambient Light & Vignette Overlay (Gentle & Atmospheric) -->
            <div id="videoBackdropOverlay" class="absolute inset-0 bg-gradient-to-b from-black/55 via-black/20 to-black/75 z-10 transition-opacity duration-1000"></div>
            <div class="absolute inset-0 bg-emerald-950/20 mix-blend-overlay z-10 pointer-events-none"></div>

            <!-- Soft Floating Ambient Glow Orbs for Parallax Depth -->
            <div id="orb1" class="absolute -top-28 -left-28 w-[420px] h-[420px] bg-emerald-400/20 rounded-full blur-3xl pointer-events-none animate-aura z-10"></div>
            <div id="orb2" class="absolute -bottom-28 -right-28 w-[420px] h-[420px] bg-teal-300/20 rounded-full blur-3xl pointer-events-none animate-aura z-10" style="animation-delay: 2.5s;"></div>
        </div>

        <!-- Top Floating Soft Island Header -->
        <div id="videoTopHud" class="relative z-30 w-full pt-5 sm:pt-7 px-4 sm:px-8 pointer-events-none transition-all duration-700">
            <div class="max-w-7xl mx-auto flex items-center justify-between gap-4 pointer-events-auto">
                
                <!-- Soft Glass Brand Capsule -->
                <div class="flex items-center gap-3 bg-white/20 hover:bg-white/25 backdrop-blur-2xl px-4 sm:px-5 py-2 sm:py-2.5 rounded-full border border-white/30 shadow-[0_8px_30px_rgb(0,0,0,0.15)] transition duration-300">
                    <div class="w-8 h-8 rounded-full bg-emerald-500/80 text-white flex items-center justify-center font-black text-sm shadow-inner">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <div class="text-sm sm:text-base font-extrabold text-white tracking-tight leading-none drop-shadow-xs">
                            Desa <span class="text-emerald-300 font-black">Madani</span>
                        </div>
                        <div class="text-[10px] text-emerald-100/90 font-medium tracking-wider mt-0.5">
                            Kabupaten Kolaka Utara
                        </div>
                    </div>
                    <div class="hidden sm:flex items-center pl-2.5 border-l border-white/25 ml-1">
                        <img src="/images/bps_kolaka_utara_logo.jpg" alt="BPS Kolut" class="h-5 w-auto object-contain rounded-md bg-white/90 p-0.5">
                    </div>
                </div>

                <!-- Soft Control Pills -->
                <div class="flex items-center gap-2 sm:gap-3">
                    <!-- Replay Welcoming Video Pill -->
                    <button type="button" id="replayBtn" onclick="replayWelcomingVideo()" class="px-3.5 py-2 rounded-full bg-white/15 hover:bg-white/25 backdrop-blur-xl text-white text-xs font-semibold border border-white/25 shadow-sm transition flex items-center gap-1.5" title="Putar Ulang Video Penyambut">
                        <span class="text-sm">↻</span>
                        <span class="hidden sm:inline">Ulangi Sambutan</span>
                    </button>

                    <!-- Audio Toggle Pill -->
                    <button type="button" id="audioToggleBtn" onclick="toggleSound()" class="px-3.5 py-2 rounded-full bg-white/15 hover:bg-white/25 backdrop-blur-xl text-white text-xs font-semibold border border-white/25 shadow-sm transition flex items-center gap-1.5" title="Aktifkan atau Matikan Suara">
                        <span id="soundIcon">🔇</span>
                        <span id="soundLabel" class="hidden sm:inline">Suara</span>
                    </button>

                    <!-- Primary Entrance Button -->
                    <a href="/portal" class="px-5 sm:px-6 py-2 sm:py-2.5 rounded-full bg-gradient-to-r from-emerald-500/90 to-teal-500/90 hover:from-emerald-400 hover:to-teal-400 text-white font-bold text-xs sm:text-sm border border-emerald-300/40 shadow-[0_4px_25px_rgba(16,185,129,0.35)] backdrop-blur-xl transition transform hover:scale-105 flex items-center gap-2">
                        <span>Masuk Web Utama</span>
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

            </div>
        </div>

        <!-- Center Gentle Hero Card (Interactive 3D Mouse Parallax & Welcoming Reveal) -->
        <div id="heroCardWrapper" class="relative z-30 px-4 sm:px-8 py-6 my-auto max-w-4xl mx-auto text-center pointer-events-none parallax-layer">
            <div id="heroCard" class="inline-flex flex-col items-center space-y-4 pointer-events-auto transition-transform duration-300 ease-out">
                
                <!-- Delicate Breathing Pill Tag -->
                <div id="welcomeBadge" class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/20 backdrop-blur-2xl border border-white/35 text-white text-xs font-bold shadow-xl transition-all duration-700">
                    <span id="badgePulseDot" class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    <span id="badgeText" class="tracking-wider uppercase text-[11px] text-emerald-100">Selamat Datang di Kolaka Utara</span>
                </div>

                <!-- Soft Fluid Title -->
                <h1 id="heroTitle" class="text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight drop-shadow-lg transition-all duration-700">
                    Pesona & Potensi Unggulan <br>
                    <span class="bg-gradient-to-r from-emerald-200 via-teal-100 to-amber-200 bg-clip-text text-transparent">
                        Kabupaten Kolaka Utara
                    </span>
                </h1>

            </div>
        </div>

        <!-- Bottom Soft Floating Footer Pill with Parallax Layer -->
        <div id="videoBottomHud" class="relative z-30 w-full pb-8 sm:pb-10 px-4 sm:px-8 pointer-events-none transition-all duration-700 parallax-layer">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3 pointer-events-auto">
                
                <!-- Quick Soft Badges -->
                <div class="flex items-center gap-2 text-[11px] text-white/90 flex-wrap justify-center sm:justify-start">
                    <span class="bg-white/15 backdrop-blur-xl px-3.5 py-1.5 rounded-full border border-white/20 shadow-xs flex items-center gap-1.5 transition-transform hover:scale-105">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> 15 Kecamatan
                    </span>
                    <span class="bg-white/15 backdrop-blur-xl px-3.5 py-1.5 rounded-full border border-white/20 shadow-xs flex items-center gap-1.5 transition-transform hover:scale-105">
                        <span class="w-1.5 h-1.5 rounded-full bg-teal-300"></span> 133 Desa & Kelurahan
                    </span>
                    <span class="bg-white/15 backdrop-blur-xl px-3.5 py-1.5 rounded-full border border-white/20 shadow-xs flex items-center gap-1.5 transition-transform hover:scale-105">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-300"></span> Podes BPS 2024–2025
                    </span>
                </div>

                <!-- Soft Scroll Invitation with Smooth Parallax Entrance -->
                <button type="button" onclick="enterWebsiteWithParallax()" class="inline-flex items-center gap-2 text-xs text-white/80 hover:text-white transition group py-1">
                    <span class="tracking-wide">Masuk ke dalam website</span>
                    <span class="w-7 h-7 rounded-full bg-white/15 group-hover:bg-white/25 backdrop-blur-xl flex items-center justify-center transition border border-white/25 shadow-sm">
                        <svg class="w-3.5 h-3.5 group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                    </span>
                </button>

            </div>
        </div>

        <!-- Elegant Organic Curved Transition Divider into Website -->
        <div class="absolute -bottom-1 left-0 right-0 z-20 pointer-events-none overflow-hidden leading-none">
            <svg class="w-full h-8 sm:h-14 text-[#fcfbf7]" viewBox="0 0 1200 120" preserveAspectRatio="none" fill="currentColor">
                <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z"></path>
            </svg>
        </div>

    </section>

    <!-- SECTION 1.5: DESA MADANI OVERVIEW & GATEWAY TO WEB UTAMA -->
    <section id="tentang" class="py-16 bg-[#fcfbf7] border-b border-slate-200/80 scroll-mt-6 relative overflow-hidden">
        <!-- Parallax Ambient Blobs -->
        <div data-parallax-speed="0.18" class="parallax-float absolute -top-20 -right-20 w-80 h-80 bg-emerald-100/50 rounded-full blur-3xl pointer-events-none"></div>
        <div data-parallax-speed="-0.15" class="parallax-float absolute -bottom-20 -left-20 w-72 h-72 bg-blue-100/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Typography & Vision -->
                <div class="lg:col-span-6 space-y-4">
                    <div class="flex items-center gap-2 scroll-anim">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#059669] animate-pulse"></span>
                        <span class="sec-title__tagline">Portal Satu Data & Inisiatif Desa Madani</span>
                    </div>

                    <h2 class="sec-title__title font-heading text-3xl sm:text-4xl font-extrabold text-[#0b2545] scroll-anim delay-75">
                        Membangun Kolaka Utara <br>
                        <span class="text-[#059669]">Dari Desa Madani</span>
                    </h2>

                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed scroll-anim delay-150">
                        Inovasi pemetaan spasial resolusi tinggi dan integrasi data Potensi Desa (Podes BPS 2024–2025) untuk mewujudkan <b>Desa Mandiri, Maju, dan Sejahtera</b> di Kabupaten Kolaka Utara.
                    </p>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed scroll-anim delay-225">
                        Menghadirkan keterpaduan data statistik potensi kakao, perikanan Teluk Bone, destinasi wisata, serta sistem perencanaan pembangunan daerah berbasis bukti (<i>evidence-based policy</i>).
                    </p>

                    <!-- Quick Indicator Badges -->
                    <div class="flex items-center gap-3 pt-2 flex-wrap text-xs text-slate-600 font-semibold scroll-anim delay-300">
                        <span class="flex items-center gap-1.5 bg-white px-3.5 py-1.5 rounded-full border border-slate-200 shadow-2xs transition-transform hover:scale-105">
                            <span class="w-2 h-2 rounded-full bg-[#059669]"></span> 15 Kecamatan
                        </span>
                        <span class="flex items-center gap-1.5 bg-white px-3.5 py-1.5 rounded-full border border-slate-200 shadow-2xs transition-transform hover:scale-105">
                            <span class="w-2 h-2 rounded-full bg-[#005ea6]"></span> 133 Desa Terdata
                        </span>
                        <span class="flex items-center gap-1.5 bg-white px-3.5 py-1.5 rounded-full border border-slate-200 shadow-2xs transition-transform hover:scale-105">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span> Podes BPS 2024–2025
                        </span>
                    </div>
                </div>

                <!-- Gateway Card with Animated Spinning Globe & Parallax -->
                <div class="lg:col-span-6 scroll-anim-right delay-150">
                    <div data-parallax-speed="-0.06" class="parallax-float p-7 rounded-3xl bg-gradient-to-r from-[#0b2545] via-[#054e3b] to-[#043328] text-white shadow-2xl relative overflow-hidden border border-emerald-500/30 group">
                        <!-- Ambient Glow inside card -->
                        <div class="absolute -right-10 -bottom-10 w-44 h-44 bg-emerald-400/20 rounded-full blur-2xl pointer-events-none"></div>

                        <div class="flex items-center justify-between gap-6 relative z-10 flex-wrap sm:flex-nowrap">
                            <div class="space-y-3 max-w-sm">
                                <div class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-emerald-400/20 text-emerald-200 text-[11px] font-bold border border-emerald-400/30">
                                    <span>Peta Sebaran & Basis Data Spasial</span>
                                </div>
                                <h3 class="text-2xl font-black text-white leading-tight">
                                    Jelajahi Peta & Masuk ke Web Utama
                                </h3>
                                <p class="text-xs text-emerald-100/90 leading-relaxed">
                                    Akses WebGIS interaktif, pemetaan spasial 15 kecamatan, data batas wilayah 133 desa, dan sistem perencanaan pembangunan daerah berbasis bukti.
                                </p>
                                <div class="pt-2">
                                    <a href="/portal" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-amber-400 hover:bg-amber-300 text-slate-950 font-black text-xs shadow-lg transition transform hover:-translate-y-0.5 active:translate-y-0">
                                        <span>Buka Web Utama Sekarang</span>
                                        <svg class="w-4 h-4 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Animated Spinning Globe Icon with Parallax -->
                            <div class="shrink-0 flex items-center justify-center">
                                <a href="/portal" class="relative group/globe block">
                                    <div class="w-32 h-32 rounded-full bg-white/10 p-2 border-2 border-emerald-300/40 shadow-inner flex items-center justify-center transition-transform group-hover/globe:scale-110">
                                        <img src="/images/jadesta/globe4.gif" alt="Jelajah Peta Sebaran" class="w-28 h-28 object-contain">
                                    </div>
                                    <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-white text-[#0b2545] text-[10px] font-black px-3 py-0.5 rounded-full shadow-md whitespace-nowrap">
                                        KLIK JELAJAH
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 2: 5 PILAR KEMANDIRIAN DESA MADANI -->
    <section id="pilar" class="py-16 bg-white border-y border-slate-200/80 scroll-mt-20 relative overflow-hidden">
        <!-- Parallax Ambient Glow -->
        <div data-parallax-speed="0.15" class="parallax-float absolute -bottom-16 right-0 w-96 h-96 bg-emerald-50/70 rounded-full blur-3xl pointer-events-none"></div>
        <div data-parallax-speed="-0.15" class="parallax-float absolute -top-16 left-0 w-80 h-80 bg-teal-50/60 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-10 relative z-10">
            <!-- Section Title with Entrance/Exit Animation -->
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-xs font-extrabold text-[#059669] uppercase tracking-wider scroll-anim">
                    <span>Metodologi Resmi</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0b2545] tracking-tight scroll-anim delay-75">
                    Desa Madani Menuju Kemandirian & Kesejahteraan Berkelanjutan
                </h2>
                <p class="text-slate-600 text-sm leading-relaxed scroll-anim delay-150">
                    Kerangka integrasi pemetaan partisipatif, data statistik sensus keluarga, dan potensi ekonomi lokal untuk mewujudkan kemandirian 133 desa di Kolaka Utara.
                </p>
            </div>

            <!-- 5 Pilar Cards with Parallax & Looping Entrance/Exit Animations -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Pilar 1 -->
                <div class="scroll-anim delay-75 h-full">
                    <div data-parallax-speed="-0.03" class="parallax-float bg-slate-50 hover:bg-white rounded-2xl p-5 border border-slate-200 hover:border-emerald-300 hover:shadow-xl transition-all duration-300 space-y-3 group border-t-4 border-t-emerald-600 h-full flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#059669] flex items-center justify-center font-bold text-lg group-hover:scale-110 transition-transform mb-3">
                                🗺️
                            </div>
                            <h3 class="font-bold text-slate-800 text-sm group-hover:text-[#059669] transition">
                                Dimensi Spasial & Peta
                            </h3>
                            <p class="text-xs text-slate-500 leading-relaxed mt-1">
                                Akuisisi data spasial dan ortofoto resolusi tinggi untuk batas wilayah, zonasi kakao, dan infrastruktur desa.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pilar 2 -->
                <div class="scroll-anim delay-150 h-full">
                    <div data-parallax-speed="0.03" class="parallax-float bg-slate-50 hover:bg-white rounded-2xl p-5 border border-slate-200 hover:border-teal-300 hover:shadow-xl transition-all duration-300 space-y-3 group border-t-4 border-t-teal-600 h-full flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-teal-100 text-teal-700 flex items-center justify-center font-bold text-lg group-hover:scale-110 transition-transform mb-3">
                                👥
                            </div>
                            <h3 class="font-bold text-slate-800 text-sm group-hover:text-teal-700 transition">
                                Partisipasi Warga
                            </h3>
                            <p class="text-xs text-slate-500 leading-relaxed mt-1">
                                Melibatkan aparatur desa dan surveyor pemuda lokal dalam pendataan mandiri dan verifikasi data lapangan.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pilar 3 -->
                <div class="scroll-anim delay-225 h-full">
                    <div data-parallax-speed="-0.04" class="parallax-float bg-slate-50 hover:bg-white rounded-2xl p-5 border border-slate-200 hover:border-blue-300 hover:shadow-xl transition-all duration-300 space-y-3 group border-t-4 border-t-[#005ea6] h-full flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-blue-100 text-[#005ea6] flex items-center justify-center font-bold text-lg group-hover:scale-110 transition-transform mb-3">
                                📋
                            </div>
                            <h3 class="font-bold text-slate-800 text-sm group-hover:text-[#005ea6] transition">
                                Sensus Profil Keluarga
                            </h3>
                            <p class="text-xs text-slate-500 leading-relaxed mt-1">
                                Pendataan profil 37.013 Kepala Keluarga secara rinci (<i>by name, by address</i>) dengan geotagging akurat.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pilar 4 -->
                <div class="scroll-anim delay-300 h-full">
                    <div data-parallax-speed="0.02" class="parallax-float bg-slate-50 hover:bg-white rounded-2xl p-5 border border-slate-200 hover:border-amber-300 hover:shadow-xl transition-all duration-300 space-y-3 group border-t-4 border-t-amber-500 h-full flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold text-lg group-hover:scale-110 transition-transform mb-3">
                                💰
                            </div>
                            <h3 class="font-bold text-slate-800 text-sm group-hover:text-amber-700 transition">
                                Ekonomi & BUMDes
                            </h3>
                            <p class="text-xs text-slate-500 leading-relaxed mt-1">
                                Pengembangan rantai nilai komoditas kakao, cengkeh, perikanan pesisir, dan penguatan unit usaha BUMDes.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pilar 5 -->
                <div class="scroll-anim delay-375 h-full">
                    <div data-parallax-speed="-0.03" class="parallax-float bg-slate-50 hover:bg-white rounded-2xl p-5 border border-slate-200 hover:border-indigo-300 hover:shadow-xl transition-all duration-300 space-y-3 group border-t-4 border-t-indigo-600 h-full flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-lg group-hover:scale-110 transition-transform mb-3">
                                📊
                            </div>
                            <h3 class="font-bold text-slate-800 text-sm group-hover:text-indigo-700 transition">
                                Analitik Podes BPS
                            </h3>
                            <p class="text-xs text-slate-500 leading-relaxed mt-1">
                                Pengolahan statistik potensi desa terpadu untuk merumuskan kebijakan publik berbasis bukti nyata.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: SOROTAN DESA UNGGULAN KOLAKA UTARA -->
    <section id="potensi" class="py-16 bg-[#fcfbf7] scroll-mt-20 relative overflow-hidden">
        <!-- Parallax Ambient Blobs -->
        <div data-parallax-speed="0.16" class="parallax-float absolute -top-16 -left-20 w-80 h-80 bg-teal-100/40 rounded-full blur-3xl pointer-events-none"></div>
        <div data-parallax-speed="-0.14" class="parallax-float absolute -bottom-16 -right-20 w-80 h-80 bg-amber-100/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-10 relative z-10">
            <div class="flex flex-wrap items-end justify-between gap-4 border-b border-slate-200 pb-4">
                <div class="space-y-1">
                    <span class="sec-title__tagline scroll-anim">Sorotan Wilayah Berprestasi</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0b2545] tracking-tight scroll-anim delay-75">
                        Desa Unggulan Kabupaten Kolaka Utara
                    </h2>
                    <p class="text-slate-500 text-xs sm:text-sm scroll-anim delay-150">
                        Karakteristik desa dengan capaian indeks perkembangan tertinggi dan potensi komoditas menonjol
                    </p>
                </div>
                <div class="scroll-anim delay-150">
                    <a href="/portal#sectionPeta" class="text-xs font-bold text-[#059669] hover:text-[#047857] flex items-center gap-1.5 bg-white px-4 py-2 rounded-full border border-slate-200 shadow-2xs transition-transform hover:scale-105">
                        <span>Buka Peta WebGIS Lengkap</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

            <!-- 4 Desa Unggulan Grid with Parallax & Looping Entrance/Exit Animations -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Desa 1: Pitulua (Lasusua) -->
                <div class="scroll-anim delay-75 h-full">
                    <div data-parallax-speed="-0.03" class="parallax-float bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 group h-full flex flex-col justify-between">
                        <div>
                            <div class="h-44 bg-gradient-to-br from-teal-500 to-blue-600 relative overflow-hidden flex items-center justify-center text-white">
                                <div class="absolute inset-0 bg-cover bg-center opacity-85 group-hover:scale-105 transition-transform duration-500" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80');"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-md text-[#059669] text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-xs">Desa Mandiri</span>
                                <div class="absolute bottom-3 left-3 right-3 text-white">
                                    <span class="text-[10px] text-teal-200 block">Kecamatan Lasusua</span>
                                    <h4 class="font-extrabold text-sm text-white">Desa Pitulua (Pantai Berova)</h4>
                                </div>
                            </div>
                            <div class="p-4 space-y-2 text-xs">
                                <p class="text-slate-600 text-[11px] leading-relaxed line-clamp-2">
                                    Sentra Wisata Bahari Pantai Berova, BUMDes pengelola tiket & kios kuliner, perikanan tangkap, dan perkebunan kakao.
                                </p>
                            </div>
                        </div>
                        <div class="px-4 pb-4">
                            <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px]">
                                <span class="font-bold text-[#059669]">IPD: 86.4</span>
                                <a href="/portal#sectionPeta" class="font-bold text-[#059669] hover:underline">Lihat di Peta ↗</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desa 2: Kelurahan Lasusua -->
                <div class="scroll-anim delay-150 h-full">
                    <div data-parallax-speed="0.04" class="parallax-float bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 group h-full flex flex-col justify-between">
                        <div>
                            <div class="h-44 bg-gradient-to-br from-blue-700 to-indigo-900 relative overflow-hidden flex items-center justify-center text-white">
                                <div class="absolute inset-0 bg-cover bg-center opacity-85 group-hover:scale-105 transition-transform duration-500" style="background-image: url('https://images.unsplash.com/photo-1477959858617-67f30bc75b82?auto=format&fit=crop&w=600&q=80');"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-md text-[#005ea6] text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-xs">Ibukota Kabupaten</span>
                                <div class="absolute bottom-3 left-3 right-3 text-white">
                                    <span class="text-[10px] text-blue-200 block">Kecamatan Lasusua</span>
                                    <h4 class="font-extrabold text-sm text-white">Kelurahan Lasusua</h4>
                                </div>
                            </div>
                            <div class="p-4 space-y-2 text-xs">
                                <p class="text-slate-600 text-[11px] leading-relaxed line-clamp-2">
                                    Pusat perkantoran Pemkab, layanan RSUD Djafar Harun, perbankan, sentra kuliner olahan cokelat, dan perdagangan.
                                </p>
                            </div>
                        </div>
                        <div class="px-4 pb-4">
                            <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px]">
                                <span class="font-bold text-[#005ea6]">IPD: 89.2</span>
                                <a href="/portal#sectionPeta" class="font-bold text-[#059669] hover:underline">Lihat di Peta ↗</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desa 3: Walasiho (Wawo) -->
                <div class="scroll-anim delay-225 h-full">
                    <div data-parallax-speed="-0.03" class="parallax-float bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 group h-full flex flex-col justify-between">
                        <div>
                            <div class="h-44 bg-gradient-to-br from-blue-600 to-indigo-800 relative overflow-hidden flex items-center justify-center text-white">
                                <div class="absolute inset-0 bg-cover bg-center opacity-85 group-hover:scale-105 transition-transform duration-500" style="background-image: url('https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?auto=format&fit=crop&w=600&q=80');"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-md text-blue-700 text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-xs">Desa Maju</span>
                                <div class="absolute bottom-3 left-3 right-3 text-white">
                                    <span class="text-[10px] text-blue-200 block">Kecamatan Wawo</span>
                                    <h4 class="font-extrabold text-sm text-white">Desa Walasiho (Danau Biru)</h4>
                                </div>
                            </div>
                            <div class="p-4 space-y-2 text-xs">
                                <p class="text-slate-600 text-[11px] leading-relaxed line-clamp-2">
                                    Danau alami air jernih biru toska, tebing karst megah, hutan lindung tropis, dan perkebunan kakao rakyat.
                                </p>
                            </div>
                        </div>
                        <div class="px-4 pb-4">
                            <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px]">
                                <span class="font-bold text-blue-700">IPD: 77.8</span>
                                <a href="/portal#sectionPeta" class="font-bold text-[#059669] hover:underline">Lihat di Peta ↗</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desa 4: Totallang (Lasusua) -->
                <div class="scroll-anim delay-300 h-full">
                    <div data-parallax-speed="0.04" class="parallax-float bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 group h-full flex flex-col justify-between">
                        <div>
                            <div class="h-44 bg-gradient-to-br from-amber-700 to-orange-900 relative overflow-hidden flex items-center justify-center text-white">
                                <div class="absolute inset-0 bg-cover bg-center opacity-85 group-hover:scale-105 transition-transform duration-500" style="background-image: url('https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=600&q=80');"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-md text-amber-800 text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-xs">Sentra Kakao & Nilam</span>
                                <div class="absolute bottom-3 left-3 right-3 text-white">
                                    <span class="text-[10px] text-amber-200 block">Kecamatan Lasusua</span>
                                    <h4 class="font-extrabold text-sm text-white">Desa Totallang</h4>
                                </div>
                            </div>
                            <div class="p-4 space-y-2 text-xs">
                                <p class="text-slate-600 text-[11px] leading-relaxed line-clamp-2">
                                    Perkebunan kakao berkelanjutan, penyulingan minyak atsiri nilam, dan tanaman cengkeh bernilai ekspor tinggi.
                                </p>
                            </div>
                        </div>
                        <div class="px-4 pb-4">
                            <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px]">
                                <span class="font-bold text-amber-700">IPD: 78.1</span>
                                <a href="/portal#sectionPeta" class="font-bold text-[#059669] hover:underline">Lihat di Peta ↗</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: KLASIFIKASI KEMANDIRIAN DESA (PODES BPS 2024-2025) -->
    <section id="klasifikasi" class="py-16 bg-white border-y border-slate-200/80 scroll-mt-20 relative overflow-hidden">
        <!-- Parallax Ambient Blobs -->
        <div data-parallax-speed="0.18" class="parallax-float absolute top-1/4 -right-20 w-80 h-80 bg-blue-100/40 rounded-full blur-3xl pointer-events-none"></div>
        <div data-parallax-speed="-0.12" class="parallax-float absolute bottom-10 -left-20 w-72 h-72 bg-emerald-100/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12 relative z-10">
            <!-- Section Title -->
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <span class="sec-title__tagline scroll-anim">Data Podes BPS 2024–2025</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0b2545] tracking-tight scroll-anim delay-75">
                    Klasifikasi Status Perkembangan 133 Desa
                </h2>
                <p class="text-slate-600 text-sm leading-relaxed scroll-anim delay-150">
                    Pengelompokan status perkembangan desa di Kabupaten Kolaka Utara berdasarkan Indeks Perkembangan Desa (IPD) yang diukur dari layanan dasar, aksesibilitas, dan ekonomi desa.
                </p>
            </div>

            <!-- 4 Step Cards for Kolaka Utara with Parallax & Looping Entrance/Exit Animations -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Step 1: Rintisan / Tertinggal -->
                <div class="scroll-anim delay-75 h-full">
                    <div data-parallax-speed="-0.03" class="parallax-float bg-slate-50 hover:bg-white rounded-3xl p-6 border-2 border-slate-200 hover:border-rose-500 hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between h-full">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="w-12 h-12 rounded-2xl bg-rose-100 text-rose-700 font-black text-lg flex items-center justify-center shadow-xs">
                                    01
                                </span>
                                <span class="text-[10px] font-bold px-3 py-1 rounded-full bg-rose-50 text-rose-800 border border-rose-200">
                                    3 Desa (2,2%)
                                </span>
                            </div>
                            <h4 class="text-xl font-black text-slate-800 group-hover:text-rose-600 transition">
                                Desa Tertinggal
                            </h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Desa dengan indeks IPD &lt; 60. Membutuhkan intervensi prioritas infrastruktur dasar jalan penghubung, penguatan jaringan listrik, dan air bersih.
                            </p>
                        </div>
                        <div class="mt-6 pt-3 border-t border-slate-200 text-xs font-bold text-rose-700">
                            <span>Fokus Intervensi Khusus</span>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Berkembang -->
                <div class="scroll-anim delay-150 h-full">
                    <div data-parallax-speed="0.04" class="parallax-float bg-slate-50 hover:bg-white rounded-3xl p-6 border-2 border-slate-200 hover:border-amber-500 hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between h-full">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 font-black text-lg flex items-center justify-center shadow-xs">
                                    02
                                </span>
                                <span class="text-[10px] font-bold px-3 py-1 rounded-full bg-amber-50 text-amber-800 border border-amber-200">
                                    38 Desa (28,6%)
                                </span>
                            </div>
                            <h4 class="text-xl font-black text-slate-800 group-hover:text-amber-700 transition">
                                Desa Berkembang
                            </h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Desa dengan IPD 60–70. Memiliki ketersediaan sarana dasar yang mulai stabil, BUMDes aktif rintisan, dan mulai terhubung akses telekomunikasi 4G.
                            </p>
                        </div>
                        <div class="mt-6 pt-3 border-t border-slate-200 text-xs font-bold text-amber-700">
                            <span>Akselerasi Produktivitas</span>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Maju -->
                <div class="scroll-anim delay-225 h-full">
                    <div data-parallax-speed="-0.02" class="parallax-float bg-slate-50 hover:bg-white rounded-3xl p-6 border-2 border-slate-200 hover:border-blue-500 hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between h-full">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 font-black text-lg flex items-center justify-center shadow-xs">
                                    03
                                </span>
                                <span class="text-[10px] font-bold px-3 py-1 rounded-full bg-blue-50 text-blue-800 border border-blue-200">
                                    64 Desa (48,1%)
                                </span>
                            </div>
                            <h4 class="text-xl font-black text-slate-800 group-hover:text-blue-700 transition">
                                Desa Maju
                            </h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Kelompok terbesar di Kolaka Utara (IPD 70–80). Pelayanan publik dan faskes memadai, jalan aspal hotmix, dan komoditas perkebunan kakao sangat produktif.
                            </p>
                        </div>
                        <div class="mt-6 pt-3 border-t border-slate-200 text-xs font-bold text-blue-700">
                            <span>Kategori Terbesar Kolut</span>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Mandiri -->
                <div class="scroll-anim delay-300 h-full">
                    <div data-parallax-speed="0.05" class="parallax-float bg-slate-50 hover:bg-white rounded-3xl p-6 border-2 border-slate-200 hover:border-emerald-500 hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between h-full">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#059669] font-black text-lg flex items-center justify-center shadow-xs">
                                    04
                                </span>
                                <span class="text-[10px] font-bold px-3 py-1 rounded-full bg-emerald-50 text-emerald-900 border border-emerald-200">
                                    28 Desa (21,1%)
                                </span>
                            </div>
                            <h4 class="text-xl font-black text-slate-800 group-hover:text-[#059669] transition">
                                Desa Mandiri
                            </h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Desa dengan indeks IPD &gt; 80. Memiliki kemandirian fiskal, BUMDes berdaya saing tinggi, fasilitas lengkap, dan menjadi barometer pembangunan daerah.
                            </p>
                        </div>
                        <div class="mt-6 pt-3 border-t border-slate-200 text-xs font-bold text-[#059669]">
                            <span>Desa Madani Percontohan</span>
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
                <a href="/portal#sectionAbout" class="px-7 py-3.5 rounded-full bg-white/10 hover:bg-white/20 text-white font-bold text-sm border border-white/20 transition flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Tentang Inisiatif Madani</span>
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

        // 1. Welcoming Video Lifecycle: Stop at end & reveal welcome state
        let hasWelcomed = false;

        function onVideoWelcomed() {
            if (!video || hasWelcomed) return;
            hasWelcomed = true;
            video.pause(); // Freeze at last frame cleanly

            // Smooth UI Transition to Welcomed State
            const badgeText = document.getElementById('badgeText');
            const badgePulseDot = document.getElementById('badgePulseDot');
            const heroCard = document.getElementById('heroCard');

            if (badgeText) badgeText.textContent = '✨ Selamat Datang di Desa Madani ✨';
            if (badgePulseDot) {
                badgePulseDot.classList.remove('bg-emerald-400');
                badgePulseDot.classList.add('bg-amber-400');
            }
            if (heroCard) {
                heroCard.classList.add('scale-[1.02]');
                setTimeout(() => heroCard.classList.remove('scale-[1.02]'), 600);
            }
        }

        if (video) {
            // Native onended event
            video.addEventListener('ended', onVideoWelcomed);
            
            // Fallback safety check if video approaches end
            video.addEventListener('timeupdate', () => {
                if (video.duration && video.currentTime >= (video.duration - 0.15)) {
                    onVideoWelcomed();
                }
            });
        }

        // 2. Replay Welcoming Video
        function replayWelcomingVideo() {
            if (!video) return;
            hasWelcomed = false;
            video.currentTime = 0;
            video.play();

            const badgeText = document.getElementById('badgeText');
            const badgePulseDot = document.getElementById('badgePulseDot');

            if (badgeText) badgeText.textContent = 'Selamat Datang di Kolaka Utara';
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
            if (video.muted) {
                if (soundIcon) soundIcon.textContent = '🔇';
                if (soundLabel) soundLabel.textContent = 'Suara';
                if (audioBtn) {
                    audioBtn.classList.remove('bg-emerald-500/80', 'border-emerald-400/50');
                    audioBtn.classList.add('bg-white/15', 'border-white/25');
                }
            } else {
                video.volume = 1.0;
                if (soundIcon) soundIcon.textContent = '🔊';
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
</body>
</html>
