<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Akun Resmi Desa - DESCAN BPS Kolaka Utara</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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
                            blue: '#005ea6',
                            dark: '#0b2545',
                            navy: '#06182e',
                            light: '#e0f2fe',
                        },
                        descan: {
                            forest: '#183b28',
                            emerald: '#059669',
                            leaf: '#10b981',
                            amber: '#f59e0b',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Sistem Autentikasi Akun Resmi DESCAN -->
    <script src="/js/descan-auth.js"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 20% 20%, #06182e 0%, #0b2545 50%, #031424 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Ambient subtle grid mesh pattern */
        .bg-grid-mesh {
            background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        /* ===== CHOREOGRAPHED ENTRANCE MOTION KEYFRAMES ===== */
        @keyframes motionFadeDown {
            0% {
                opacity: 0;
                transform: translate3d(0, -22px, 0);
            }
            100% {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        @keyframes motionCardPop {
            0% {
                opacity: 0;
                transform: scale(0.96) translate3d(0, 24px, 0);
                filter: blur(6px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translate3d(0, 0, 0);
                filter: blur(0px);
            }
        }

        @keyframes motionSlideUp {
            0% {
                opacity: 0;
                transform: translate3d(0, 18px, 0);
            }
            100% {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        @keyframes motionFadeLeft {
            0% {
                opacity: 0;
                transform: translate3d(-24px, 0, 0);
            }
            100% {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        @keyframes motionFadeRight {
            0% {
                opacity: 0;
                transform: translate3d(24px, 0, 0);
            }
            100% {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        /* Ambient floating orbs (Living UI) */
        @keyframes floatOrb1 {
            0%, 100% {
                transform: translate3d(0, 0, 0) scale(1);
            }
            50% {
                transform: translate3d(50px, 35px, 0) scale(1.18);
            }
        }

        @keyframes floatOrb2 {
            0%, 100% {
                transform: translate3d(0, 0, 0) scale(1);
            }
            50% {
                transform: translate3d(-45px, -30px, 0) scale(1.15);
            }
        }

        @keyframes floatOrb3 {
            0%, 100% {
                transform: translate3d(0, 0, 0) scale(0.9);
                opacity: 0.12;
            }
            50% {
                transform: translate3d(25px, -20px, 0) scale(1.1);
                opacity: 0.22;
            }
        }

        /* Top card animated gradient flow */
        @keyframes shimmerBarFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Hero image cinematic Ken-Burns subtle zoom */
        @keyframes heroKenBurnsMotion {
            0% {
                transform: scale(1.0);
            }
            50% {
                transform: scale(1.07);
            }
            100% {
                transform: scale(1.0);
            }
        }

        /* Radar beacon pulse for live village status */
        @keyframes liveBeaconPulse {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(52, 211, 153, 0.7);
            }
            70% {
                transform: scale(1);
                box-shadow: 0 0 0 9px rgba(52, 211, 153, 0);
            }
            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(52, 211, 153, 0);
            }
        }

        /* Button shimmer sweep */
        @keyframes btnGleam {
            0% { left: -100%; }
            25%, 100% { left: 200%; }
        }

        /* Morph animation when switching village */
        @keyframes contentCrossfade {
            0% {
                opacity: 0.2;
                transform: scale(0.98);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Entrance timing classes */
        .motion-in-header {
            animation: motionFadeDown 0.75s cubic-bezier(0.16, 1, 0.3, 1) both;
            will-change: transform, opacity;
        }

        .motion-in-card {
            animation: motionCardPop 0.85s cubic-bezier(0.16, 1, 0.3, 1) 0.12s both;
            will-change: transform, opacity, filter;
        }

        .motion-in-left-panel {
            animation: motionFadeLeft 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.22s both;
            will-change: transform, opacity;
        }

        .motion-in-right-panel {
            animation: motionFadeRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.26s both;
            will-change: transform, opacity;
        }

        .motion-stagger-1 {
            animation: motionSlideUp 0.65s cubic-bezier(0.16, 1, 0.3, 1) 0.32s both;
            will-change: transform, opacity;
        }

        .motion-stagger-2 {
            animation: motionSlideUp 0.65s cubic-bezier(0.16, 1, 0.3, 1) 0.42s both;
            will-change: transform, opacity;
        }

        .motion-stagger-3 {
            animation: motionSlideUp 0.65s cubic-bezier(0.16, 1, 0.3, 1) 0.52s both;
            will-change: transform, opacity;
        }

        .motion-stagger-4 {
            animation: motionSlideUp 0.65s cubic-bezier(0.16, 1, 0.3, 1) 0.62s both;
            will-change: transform, opacity;
        }

        .motion-stagger-5 {
            animation: motionSlideUp 0.65s cubic-bezier(0.16, 1, 0.3, 1) 0.72s both;
            will-change: transform, opacity;
        }

        .motion-stagger-6 {
            animation: motionSlideUp 0.65s cubic-bezier(0.16, 1, 0.3, 1) 0.82s both;
            will-change: transform, opacity;
        }

        .motion-in-footer {
            animation: motionSlideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) 0.9s both;
            will-change: transform, opacity;
        }

        /* Ambient class attachments */
        .motion-orb-emerald {
            animation: floatOrb1 16s ease-in-out infinite;
            will-change: transform;
        }

        .motion-orb-blue {
            animation: floatOrb2 20s ease-in-out infinite;
            will-change: transform;
        }

        .motion-orb-amber {
            animation: floatOrb3 18s ease-in-out infinite;
            will-change: transform, opacity;
        }

        .motion-ken-burns {
            animation: heroKenBurnsMotion 22s ease-in-out infinite alternate;
            will-change: transform;
        }

        .motion-beacon {
            animation: liveBeaconPulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .shimmer-bar-animated {
            background: linear-gradient(90deg, #059669, #005ea6, #f59e0b, #059669);
            background-size: 300% 100%;
            animation: shimmerBarFlow 8s ease infinite;
        }

        .btn-shimmer-sweep {
            position: relative;
            overflow: hidden;
        }
        .btn-shimmer-sweep::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transform: skewX(-20deg);
            animation: btnGleam 6s ease-in-out infinite;
        }

        .desa-switch-crossfade {
            animation: contentCrossfade 0.4s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .desa-pill-btn.active {
            background: #005ea6;
            color: #ffffff;
            font-weight: 800;
            border-color: #005ea6;
        }

        @media (prefers-reduced-motion: reduce) {
            *, ::before, ::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body class="text-slate-800 flex flex-col justify-between p-4 sm:p-6 lg:p-8 min-h-screen selection:bg-amber-200 selection:text-amber-950 relative overflow-x-hidden">

    <!-- Subtle Geometric Ambient Grid Mesh -->
    <div class="pointer-events-none fixed inset-0 z-0 bg-grid-mesh opacity-70"></div>

    <!-- Ambient Glowing Blur Orbs (Living Background Motion) -->
    <div class="pointer-events-none fixed -top-28 -left-28 w-[28rem] h-[28rem] bg-emerald-500/15 rounded-full blur-3xl motion-orb-emerald z-0"></div>
    <div class="pointer-events-none fixed -bottom-28 -right-28 w-[32rem] h-[32rem] bg-blue-500/15 rounded-full blur-3xl motion-orb-blue z-0"></div>
    <div class="pointer-events-none fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl motion-orb-amber z-0"></div>

    <!-- TOP HEADER BAR (Motion Fade Down) -->
    <header class="relative z-10 w-full max-w-5xl mx-auto flex items-center justify-between pb-4 sm:pb-6 motion-in-header">
        <!-- Left: Logo Kolaka Utara bersampingan dengan Logo BPS Kolut -->
        <a href="/descan" class="flex items-center gap-3 group">
            <div class="flex items-center gap-2 bg-white/10 backdrop-blur-md px-2.5 py-1.5 rounded-2xl border border-white/20 shadow-lg group-hover:scale-105 transition-all duration-300">
                <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-9 w-auto object-contain drop-shadow" title="Pemerintah Kabupaten Kolaka Utara">
                <div class="h-6 w-[1.5px] bg-white/30"></div>
                <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-8 w-auto object-contain drop-shadow" title="Badan Pusat Statistik Kolaka Utara">
            </div>
            <div>
                <div class="text-xl sm:text-2xl font-black tracking-widest text-white leading-none flex items-center gap-1.5">
                    <span>DESCAN</span>
                    <span class="text-[9px] px-1.5 py-0.5 rounded-full bg-emerald-500/30 text-emerald-300 font-extrabold border border-emerald-400/40">AUTH</span>
                </div>
                <div class="text-[9px] text-emerald-200/90 font-bold tracking-widest uppercase mt-0.5">
                    Desa Cantik • BPS Kolaka Utara
                </div>
            </div>
        </a>

        <div class="flex items-center gap-2">
            <a href="/descan" class="px-4 py-2 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-xs backdrop-blur-md transition-all duration-200 flex items-center gap-2 shadow-sm hover:shadow-md hover:scale-105 active:scale-95">
                <svg class="w-4 h-4 text-emerald-400 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span class="hidden sm:inline">Kembali ke 6 Desa</span>
                <span class="sm:hidden">6 Desa</span>
            </a>
        </div>
    </header>

    <!-- MAIN LOGIN CARD CONTAINER (Motion Pop In) -->
    <main class="relative z-10 w-full max-w-5xl mx-auto my-auto py-2 sm:py-4 motion-in-card">
        <div class="bg-white rounded-3xl shadow-2xl border border-white/20 overflow-hidden grid grid-cols-1 lg:grid-cols-12">
            
            <!-- LEFT PANEL: IDENTITAS KHUSUS DESA YANG SEDANG DI-LOGIN (Motion Fade Left) -->
            <div id="sideDesaLeftPanel" class="lg:col-span-5 bg-gradient-to-b from-slate-900 via-[#0b2545] to-slate-950 text-white p-6 sm:p-8 flex flex-col justify-between border-b lg:border-b-0 lg:border-r border-slate-800 relative overflow-hidden motion-in-left-panel">
                
                <!-- Background ambient image blurred -->
                <div class="absolute inset-0 z-0 opacity-20 pointer-events-none">
                    <img id="sideDesaBgPhoto" src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80" alt="Background Desa" class="w-full h-full object-cover">
                </div>

                <div id="sideDesaHeroCard" class="relative z-10 space-y-4">
                    <div class="inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-amber-400 bg-amber-400/10 px-3 py-1 rounded-full border border-amber-400/20 shadow-xs">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 motion-beacon"></span>
                        <span>Portal Login Resmi Desa Binaan</span>
                    </div>

                    <!-- Village Feature Landscape Photo Card with Ken-Burns Motion -->
                    <div class="relative w-full h-44 sm:h-52 rounded-2xl overflow-hidden border-2 border-white/20 shadow-2xl group">
                        <img id="sideDesaHeroPhoto" src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1000&q=90" alt="Foto Desa" class="w-full h-full object-cover transition-transform duration-700 motion-ken-burns">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent flex flex-col justify-end p-4">
                            <span class="text-[10px] font-bold text-amber-300 uppercase tracking-widest" id="sideDesaKecamatanTag">Kec. Kodeoha • Kab. Kolaka Utara</span>
                            <h2 id="sideDesaHeroTitle" class="text-xl sm:text-2xl font-black text-white leading-tight">Desa Kalu Kaluku</h2>
                        </div>
                    </div>

                    <!-- Status pembinaan -->
                    <div class="flex items-center gap-2 text-xs">
                        <span id="sideDesaStatusBadge" class="px-2.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 font-extrabold text-[10px] border border-emerald-500/30">Terverifikasi BPS (Mandiri)</span>
                    </div>

                    <!-- Explanation text specifically for this village -->
                    <div class="pt-2">
                        <p id="sideDesaDesc" class="text-xs text-slate-300 leading-relaxed font-medium">
                            Pilot Utama Desa Cantik BPS Kolaka Utara. Terletak strategis di perbatasan Ibu Kota Lasusua, dengan sentra kakao rakyat dan perikanan terpadu.
                        </p>
                    </div>
                </div>

                <div class="relative z-10 pt-4 mt-4 border-t border-slate-800 text-[10px] text-slate-500 font-medium flex items-center justify-between">
                    <span>BPS Kolaka Utara 2026</span>
                    <span class="inline-flex items-center gap-1 text-[10px] text-emerald-400/90"><i class="bi bi-shield-check"></i> SSL Terenkripsi</span>
                </div>
            </div>

            <!-- RIGHT PANEL: FORM LOGIN (Motion Fade Right + Stagger) -->
            <div class="lg:col-span-7 flex flex-col bg-white motion-in-right-panel">
                <div class="h-1.5 w-full shimmer-bar-animated"></div>

                <div class="p-6 sm:p-10 flex-1 flex flex-col justify-center">
                    <div class="max-w-md w-full mx-auto">

                        <div class="motion-stagger-1">
                            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Masuk ke Dashboard Desa</h1>
                            <p class="text-sm text-slate-500 mt-1">Gunakan akun resmi desa binaan untuk melanjutkan.</p>
                        </div>

                        <form id="mainLoginForm" onsubmit="handleMainLoginSubmit(event)" autocomplete="off" class="space-y-4 mt-7">

                            <div id="loginErrorAlert" class="hidden p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs flex items-center gap-2.5 animate-pulse">
                                <svg class="w-4 h-4 shrink-0 text-rose-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span id="loginErrorText" class="font-medium">Email atau kata sandi tidak cocok.</span>
                            </div>

                            <!-- Email (Stagger 2) -->
                            <div class="motion-stagger-2">
                                <label for="inpEmail" class="block text-xs font-bold text-slate-700 mb-1.5">Email Akun Desa</label>
                                <div class="relative group">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-emerald-600 text-sm transition-colors"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" id="inpEmail" required autocomplete="off" placeholder="admin.nama_desa@descan.bps.go.id" class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-300 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500/40 focus:border-emerald-500 transition-all duration-200">
                                </div>
                            </div>

                            <!-- Password (Stagger 3) -->
                            <div class="motion-stagger-3">
                                <label for="inpPassword" class="block text-xs font-bold text-slate-700 mb-1.5">Kata Sandi</label>
                                <div class="relative group">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-emerald-600 text-sm transition-colors"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" id="inpPassword" required autocomplete="new-password" placeholder="Masukkan kata sandi" class="w-full pl-10 pr-12 py-3 rounded-xl border border-slate-300 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500/40 focus:border-emerald-500 transition-all duration-200">
                                    <button type="button" onclick="togglePassVisibility()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 text-sm cursor-pointer transition-colors" title="Lihat/Sembunyikan Sandi"><i id="eyePassIcon" class="bi bi-eye"></i></button>
                                </div>
                            </div>

                            <!-- Submit button (Stagger 4) -->
                            <div class="motion-stagger-4 pt-1">
                                <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-[#0f6b4a] via-[#0d5c40] to-[#083b2a] hover:from-[#117e57] hover:to-[#0a4632] text-white font-black text-sm shadow-lg hover:shadow-xl hover:shadow-emerald-900/20 transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer btn-shimmer-sweep active:scale-[0.98]">
                                    <span id="btnSubmitText">Masuk ke Dashboard</span>
                                    <i class="bi bi-arrow-right text-sm"></i>
                                </button>
                            </div>
                        </form>

                        <!-- Divider (Stagger 5) -->
                        <div class="flex items-center gap-3 my-5 text-[11px] text-slate-400 font-semibold motion-stagger-5">
                            <span class="flex-1 h-px bg-slate-200"></span>atau<span class="flex-1 h-px bg-slate-200"></span>
                        </div>

                        <!-- Quick actions (Stagger 6) -->
                        <div class="grid grid-cols-2 gap-2 motion-stagger-6">
                            <button type="button" onclick="autoFillActiveCredentials()" class="py-2.5 rounded-xl bg-amber-50 hover:bg-amber-100/90 border border-amber-200 text-amber-800 font-bold text-xs transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md cursor-pointer flex items-center justify-center gap-1.5 active:scale-95"><i class="bi bi-lightning-charge-fill text-amber-600 text-sm"></i><span>Isi Sandi Otomatis</span></button>
                            <button type="button" onclick="loginAsGuestViewer()" class="py-2.5 rounded-xl bg-emerald-50 hover:bg-emerald-100/90 border border-emerald-200 text-emerald-800 font-bold text-xs transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md cursor-pointer flex items-center justify-center gap-1.5 active:scale-95"><i class="bi bi-eye-fill text-emerald-600 text-sm"></i><span>Masuk sebagai Tamu</span></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER (Motion Fade Up) -->
    <footer class="relative z-10 w-full max-w-5xl mx-auto text-center text-xs text-blue-200/80 pt-4 motion-in-footer">
        © 2024–2026 Badan Pusat Statistik Kabupaten Kolaka Utara • Program Desa Cantik (DESCAN)
    </footer>

    <!-- Toast Notification -->
    <div id="loginToast" class="fixed bottom-5 right-5 z-50 hidden px-4 py-2.5 rounded-2xl bg-slate-900 text-white text-xs font-bold shadow-2xl border border-slate-700 animate-bounce"></div>

    <!-- SCRIPT LOGIC -->
    <script>
        let currentSelectedDesa = 'kamisi';

        function selectLoginDesa(key) {
            key = (key || 'kamisi').toLowerCase();
            if (key === 'cijati' || key === 'kalukaluku') key = 'kamisi';
            if (key === 'sukamaju' || key === 'awo') key = 'koroha';
            if (key === 'mekarwangi' || key === 'mala-mala') key = 'malamala';
            if (key === 'tegalasri' || key === 'lametuna') key = 'lapolu';
            if (key === 'harapan' || key === 'sawangaoha') key = 'tanggeawo';
            if (key === 'lestari' || key === 'mattiro-bulu') key = 'mattirobulu';

            currentSelectedDesa = key;
            const acc = (typeof DESCAN_ACCOUNTS !== 'undefined' && DESCAN_ACCOUNTS[key]) ? DESCAN_ACCOUNTS[key] : DESCAN_ACCOUNTS['kamisi'];

            // Sinkronkan dropdown desa
            const selDesa = document.getElementById('selDesa');
            if (selDesa) selDesa.value = key;

            // Update Left Hero Panel specifically for this village
            const sideHeroPhoto = document.getElementById('sideDesaHeroPhoto');
            const sideBgPhoto = document.getElementById('sideDesaBgPhoto');
            const sideTitle = document.getElementById('sideDesaHeroTitle');
            const sideKec = document.getElementById('sideDesaKecamatanTag');
            const sideLembaga = document.getElementById('sideDesaLembaga');
            const sideDesc = document.getElementById('sideDesaDesc');
            const sideStatus = document.getElementById('sideDesaStatusBadge');

            if (sideHeroPhoto) sideHeroPhoto.src = acc.avatar;
            if (sideBgPhoto) sideBgPhoto.src = acc.avatar;
            if (sideTitle) sideTitle.textContent = acc.desaName;
            if (sideKec) sideKec.textContent = acc.kecamatan;
            if (sideLembaga) sideLembaga.textContent = acc.rep;
            if (sideDesc) sideDesc.textContent = acc.description;
            if (sideStatus) sideStatus.textContent = `Terverifikasi BPS (${acc.kategori || 'Mandiri'})`;

            // Trigger smooth crossfade motion on village hero card
            const sideHeroCard = document.getElementById('sideDesaHeroCard');
            if (sideHeroCard) {
                sideHeroCard.classList.remove('desa-switch-crossfade');
                void sideHeroCard.offsetWidth; // trigger reflow
                sideHeroCard.classList.add('desa-switch-crossfade');
            }

            // Update Right Context Card
            const nameEl = document.getElementById('activeDesaName');
            const repEl = document.getElementById('activeDesaRep');
            const wilEl = document.getElementById('activeDesaWilayah');
            const avEl = document.getElementById('activeDesaAvatar');
            const emailInp = document.getElementById('inpEmail');
            const passInp = document.getElementById('inpPassword');
            const errEl = document.getElementById('loginErrorAlert');
            const btnSubmitText = document.getElementById('btnSubmitText');
            const hintEmail = document.getElementById('hintCurrentEmail');

            if (nameEl) nameEl.textContent = acc.desaName;
            if (repEl) repEl.textContent = `${acc.rep} • ${acc.role}`;
            if (wilEl) wilEl.textContent = `${acc.kecamatan} • Program Desa Cantik`;
            if (avEl) avEl.src = acc.avatar;
            if (emailInp) emailInp.value = acc.email;
            if (passInp) passInp.value = '';
            if (errEl) errEl.classList.add('hidden');
            if (hintEmail) hintEmail.textContent = acc.email;

            const hintEl = document.getElementById('hintPasswordDisplay');
            if (hintEl) hintEl.textContent = `Sandi: ${acc.password}`;
        }

        function loginAsGuestViewer() {
            const acc = (typeof DESCAN_ACCOUNTS !== 'undefined' && DESCAN_ACCOUNTS[currentSelectedDesa]) ? DESCAN_ACCOUNTS[currentSelectedDesa] : DESCAN_ACCOUNTS['kamisi'];
            const session = {
                desaKey: currentSelectedDesa,
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
            window.location.href = `/descan/menu?desa=${currentSelectedDesa}&menu=dashboard`;
        }

        function autoFillActiveCredentials() {
            const acc = (typeof DESCAN_ACCOUNTS !== 'undefined' && DESCAN_ACCOUNTS[currentSelectedDesa]) ? DESCAN_ACCOUNTS[currentSelectedDesa] : null;
            if (acc) {
                const emailInp = document.getElementById('inpEmail');
                const passInp = document.getElementById('inpPassword');
                if (emailInp) emailInp.value = acc.email;
                if (passInp) passInp.value = acc.password;
                showLoginToast(`✓ Kredensial resmi ${acc.desaName} terisi otomatis!`);
            }
        }

        function togglePassVisibility() {
            const inp = document.getElementById('inpPassword');
            const eyeIcon = document.getElementById('eyePassIcon');
            if (inp) {
                if (inp.type === 'password') {
                    inp.type = 'text';
                    if (eyeIcon) eyeIcon.className = 'bi bi-eye-slash';
                } else {
                    inp.type = 'password';
                    if (eyeIcon) eyeIcon.className = 'bi bi-eye';
                }
            }
        }

        function handleMainLoginSubmit(e) {
            e.preventDefault();
            const emailInp = document.getElementById('inpEmail');
            const passInp = document.getElementById('inpPassword');
            const errBox = document.getElementById('loginErrorAlert');
            const errText = document.getElementById('loginErrorText');

            const email = emailInp ? emailInp.value : '';
            const pass = passInp ? passInp.value : '';

            const result = validateDescanLogin(email, pass, currentSelectedDesa);

            if (!result.success) {
                if (result.mismatch && result.account) {
                    if (errBox && errText) {
                        errText.innerHTML = `Akun ini terdaftar sebagai <b>${result.account.desaName}</b>.<br><a href="javascript:void(0)" onclick="selectLoginDesa('${result.account.desaKey}'); autoFillActiveCredentials();" class="underline font-bold text-blue-700">Klik di sini untuk beralih ke ${result.account.desaName}</a>`;
                        errBox.classList.remove('hidden');
                    }
                } else {
                    if (errBox && errText) {
                        errText.textContent = result.message || 'Email atau kata sandi tidak cocok untuk desa ini.';
                        errBox.classList.remove('hidden');
                    }
                }
                return;
            }

            // Success! Session is already saved by validateDescanLogin in localStorage & sessionStorage
            if (errBox) errBox.classList.add('hidden');
            showLoginToast(`✓ Berhasil login sebagai ${result.account.desaName}! Mengarahkan ke dashboard...`);

            setTimeout(() => {
                window.location.href = `/descan/menu?desa=${result.account.desaKey}&menu=dashboard`;
            }, 700);
        }

        function showLoginToast(msg) {
            const toast = document.getElementById('loginToast');
            if (toast) {
                toast.textContent = msg;
                toast.classList.remove('hidden');
                setTimeout(() => toast.classList.add('hidden'), 3500);
            }
        }

        // Init on load
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof clearDescanAuth === 'function') clearDescanAuth();
            try {
                localStorage.removeItem('descan_auth_session');
                sessionStorage.removeItem('descan_auth_session');
            } catch(e) {}

            const params = new URLSearchParams(window.location.search);
            const desaParam = (params.get('desa') || 'kamisi').toLowerCase();
            selectLoginDesa(desaParam);

            // Pastikan password selalu kosong saat halaman dimuat
            const passInp = document.getElementById('inpPassword');
            if (passInp) passInp.value = '';

            try {
                const saved = localStorage.getItem('portal_lang');
                if (saved === 'en') {
                    window.setPortalLanguage('en');
                }
            } catch(e) {}
        });

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
</body>
</html>