<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Administrator - Desa Madani BPS &amp; Pemkab Kolaka Utara</title>
    
    <!-- Google Fonts: Plus Jakarta Sans, Cinzel & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
    
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
                        cinzel: ['"Cinzel"', 'serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        madani: {
                            charcoal: '#1D241E',
                            mountain: '#3B4D3B',
                            olive: '#566B53',
                            mist: '#8A9B86',
                            border: '#DCE3DD',
                        },
                        bps: {
                            blue: '#005ea6',
                            navy: '#0b2545',
                            darknavy: '#06182e',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-cinzel {
            font-family: 'Cinzel', serif !important;
            letter-spacing: 0.04em;
        }
        .kec-map-path {
            transition: all 0.25s ease-in-out;
            cursor: pointer;
        }
        .kec-map-path:hover {
            filter: brightness(1.2) drop-shadow(0 0 10px rgba(255, 255, 255, 0.7));
            stroke-width: 3.5px;
            stroke: #ffffff;
        }
    </style>
</head>
<body class="bg-[#081a1d] text-slate-800 min-h-screen selection:bg-emerald-200 selection:text-emerald-950 flex flex-col antialiased">

    <div class="min-h-screen w-full flex flex-col lg:flex-row flex-1">
        
        <!-- ========================================================================= -->
        <!-- SISI KIRI: EXECUTIVE SHOWCASE DENGAN PETA TEMATIK VEKTOR 15 KECAMATAN -->
        <!-- ========================================================================= -->
        <div class="lg:w-[56%] xl:w-[60%] hidden lg:flex flex-col justify-between relative overflow-hidden p-6 xl:p-10 text-white bg-slate-950">
            <!-- Background Image Beresolusi Tinggi dengan Dual-Tone Overlay Elegan -->
            <div class="absolute inset-0 z-0">
                <img src="/images/jadesta/kebun_kakao_totallang.jpg" alt="Bentang Alam Kolaka Utara" class="w-full h-full object-cover filter brightness-[0.24] contrast-[1.15] scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-[#041d15] via-[#082236]/90 to-[#021320]/95"></div>
                <!-- Subtle Topographic Dot Grid -->
                <div class="absolute inset-0 bg-[radial-gradient(#34d399_1px,transparent_1px)] [background-size:24px_24px] opacity-15"></div>
            </div>

            <!-- Top Branding Header -->
            <div class="relative z-10 flex items-center justify-between">
                <a href="/portal" class="flex items-center gap-3.5 group cursor-pointer focus:outline-none transition-transform hover:scale-[1.01]" title="Buka Portal Publik Desa Madani">
                    <div class="flex items-center gap-2 bg-white/10 backdrop-blur-md px-3.5 py-2 rounded-2xl border border-white/20 shadow-lg group-hover:bg-white/15 transition">
                        <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-9 w-auto object-contain drop-shadow" title="Pemerintah Kabupaten Kolaka Utara">
                        <div class="h-5 w-[1px] bg-white/30"></div>
                        <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-8 w-auto object-contain drop-shadow" title="Badan Pusat Statistik Kolaka Utara">
                    </div>
                    <div>
                        <div class="text-xs uppercase font-extrabold tracking-[0.2em] text-emerald-300 font-sans">
                            BPS • Pemkab Kolaka Utara
                        </div>
                        <div class="text-[11px] text-slate-300 font-medium">
                            Sistem Satu Data Potensi Desa (PODES)
                        </div>
                    </div>
                </a>

                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[11px] font-semibold text-emerald-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Basis PODES 2024–2025</span>
                    </span>
                </div>
            </div>

            <!-- Central Split: Sisi Kiri Info & KPI, Sisi Kanan Peta Vektor 15 Kecamatan -->
            <div class="relative z-10 my-auto py-4">
                <div class="grid grid-cols-12 gap-6 items-center">
                    
                    <!-- Kolom Info & 4 KPI -->
                    <div class="col-span-12 xl:col-span-6 flex flex-col justify-center">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 text-xs font-bold mb-3 backdrop-blur-md w-fit">
                            <i class="bi bi-geo-alt-fill text-emerald-400"></i>
                            <span>PORTAL SATU DATA EKSEKUTIF</span>
                        </div>

                        <h1 class="text-3xl xl:text-4xl font-black text-white leading-tight font-cinzel tracking-wide mb-2">
                            DESA <span class="text-emerald-400">MADANI</span>
                            <span class="block text-lg xl:text-xl font-sans font-bold text-slate-200 mt-1">Kabupaten Kolaka Utara</span>
                        </h1>

                        <p class="text-xs xl:text-sm text-slate-300 leading-relaxed font-sans mb-5">
                            Pusat integrasi data potensi desa (PODES 2025), indeks kemandirian desa (IPD), dan pemetaan spasial presisi 133 desa se-Kabupaten Kolaka Utara.
                        </p>

                        <!-- Grid 4 Indikator Agregat Riil -->
                        <div class="grid grid-cols-2 gap-2.5 font-sans mb-4">
                            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-3 shadow-sm hover:bg-white/15 transition-all">
                                <div class="flex items-center justify-between text-emerald-300 mb-0.5">
                                    <span class="text-[10px] font-bold uppercase tracking-wider">Kecamatan</span>
                                    <i class="bi bi-diagram-3-fill text-xs"></i>
                                </div>
                                <div class="text-2xl font-black text-white font-mono">15</div>
                                <div class="text-[10px] text-slate-300">Cakupan lengkap</div>
                            </div>

                            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-3 shadow-sm hover:bg-white/15 transition-all">
                                <div class="flex items-center justify-between text-emerald-300 mb-0.5">
                                    <span class="text-[10px] font-bold uppercase tracking-wider">Desa / Kelurahan</span>
                                    <i class="bi bi-houses-fill text-xs"></i>
                                </div>
                                <div class="text-2xl font-black text-white font-mono">133</div>
                                <div class="text-[10px] text-slate-300">100% Konstituen</div>
                            </div>

                            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-3 shadow-sm hover:bg-white/15 transition-all">
                                <div class="flex items-center justify-between text-emerald-300 mb-0.5">
                                    <span class="text-[10px] font-bold uppercase tracking-wider">Penduduk Riil</span>
                                    <i class="bi bi-people-fill text-xs"></i>
                                </div>
                                <div class="text-2xl font-black text-white font-mono">145.679</div>
                                <div class="text-[10px] text-slate-300">Jiwa terdata sensus</div>
                            </div>

                            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-3 shadow-sm hover:bg-white/15 transition-all">
                                <div class="flex items-center justify-between text-emerald-300 mb-0.5">
                                    <span class="text-[10px] font-bold uppercase tracking-wider">Klaster PODES</span>
                                    <i class="bi bi-grid-3x3-gap-fill text-xs"></i>
                                </div>
                                <div class="text-2xl font-black text-white font-mono">12 Klaster</div>
                                <div class="text-[10px] text-slate-300">Sinkron ke portal</div>
                            </div>
                        </div>

                        <!-- Live Interactive Hover Badge for Map -->
                        <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-3 px-4 flex items-center gap-3 text-xs shadow-inner">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse shrink-0"></span>
                            <div id="loginKecHoverBadge" class="text-slate-200 truncate font-medium">
                                Arahkan kursor ke peta untuk melihat profil kecamatan
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Peta Vektor 15 Kecamatan Kolaka Utara -->
                    <div class="col-span-12 xl:col-span-6 flex flex-col items-center justify-center relative">
                        <div class="relative w-full max-w-[340px] xl:max-w-[390px] mx-auto filter drop-shadow-[0_15px_30px_rgba(0,0,0,0.55)]">
                            <svg viewBox="10 10 440 600" class="w-full h-auto select-none transition-transform duration-300">
                                
                                <!-- 1. Tolala -->
                                <g id="lk-tolala" class="cursor-pointer" onmouseenter="showKecHover('Tolala', '6 Desa/Kelurahan', 'Perikanan Bahari Teluk Bone &amp; Madu Hutan', '4.087 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Tolala (6 Desa)</title>
                                    <path d="M 174.1,134.6 L 173.9,134.7 L 173.9,134.5 L 174.1,134.5 L 174.1,134.6 Z M 170.0,132.2 L 169.4,132.0 L 169.6,131.7 L 170.1,132.0 L 170.0,132.2 Z M 170.0,130.0 L 169.6,129.9 L 170.3,129.8 L 170.4,129.9 L 170.0,130.0 Z M 166.7,129.4 L 166.6,129.3 L 166.7,129.2 L 166.8,129.4 L 166.7,129.4 Z M 94.5,42.2 L 87.2,44.9 L 85.3,42.5 L 92.4,40.4 L 94.5,42.2 Z M 191.0,27.9 L 214.1,33.1 L 230.8,43.5 L 239.5,63.9 L 255.3,61.0 L 265.9,70.0 L 273.3,69.6 L 249.0,136.6 L 232.0,134.3 L 237.1,144.2 L 230.5,146.6 L 180.8,142.9 L 173.9,139.2 L 166.3,131.1 L 178.1,138.5 L 184.9,109.5 L 176.0,99.6 L 177.1,93.1 L 171.6,94.6 L 172.7,69.7 L 163.9,71.1 L 165.6,82.2 L 152.2,74.9 L 145.7,40.5 L 138.3,65.5 L 130.3,58.6 L 112.1,60.3 L 125.8,75.6 L 111.2,61.3 L 114.5,53.1 L 134.0,46.0 L 141.8,31.1 L 168.5,28.2 L 178.8,20.0 L 191.0,27.9 Z" fill="#334139" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="204.7" y="82.5" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Tolala</text>
                                </g>

                                <!-- 2. Porehu -->
                                <g id="lk-porehu" class="cursor-pointer" onmouseenter="showKecHover('Porehu', '8 Desa/Kelurahan', 'Sentra 1.440 IMK, Perkebunan Cengkeh &amp; Kopi', '6.822 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Porehu (8 Desa)</title>
                                    <path d="M 275.0,78.2 L 284.2,77.6 L 287.7,87.7 L 298.5,91.3 L 303.3,99.6 L 336.6,111.4 L 338.5,121.9 L 360.8,139.8 L 383.5,147.9 L 389.7,162.3 L 383.3,186.0 L 401.3,201.6 L 403.3,213.4 L 420.8,220.7 L 424.4,240.6 L 440.0,251.5 L 356.6,245.9 L 289.9,219.9 L 275.9,208.3 L 212.3,197.4 L 221.4,186.7 L 208.7,184.6 L 208.7,175.3 L 194.0,173.4 L 197.7,144.1 L 230.5,146.6 L 237.1,144.2 L 232.0,134.3 L 249.0,136.6 L 273.3,69.6 L 275.0,78.2 Z" fill="#059669" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="312.2" y="174.6" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Porehu</text>
                                </g>

                                <!-- 3. Batu Putih -->
                                <g id="lk-batuputih" class="cursor-pointer" onmouseenter="showKecHover('Batu Putih', '11 Desa/Kelurahan', 'Kelapa Dalam, Kakao, &amp; Potensi Bahari', '8.916 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Batu Putih (11 Desa)</title>
                                    <path d="M 150.7,173.9 L 149.8,173.5 L 149.9,173.1 L 150.9,173.5 L 150.7,173.9 Z M 158.6,168.2 L 158.9,168.2 L 159.0,168.4 L 158.7,168.4 L 158.6,168.2 Z M 172.3,148.3 L 171.7,148.0 L 171.7,147.9 L 172.3,148.1 L 172.3,148.3 Z M 165.8,143.5 L 165.4,144.4 L 164.6,144.4 L 164.4,144.1 L 165.8,143.5 Z M 166.0,132.6 L 165.7,132.4 L 165.9,132.1 L 166.2,132.3 L 166.0,132.6 Z M 165.3,131.6 L 165.1,131.5 L 165.1,131.5 L 165.3,131.6 L 165.3,131.6 Z M 165.7,130.2 L 180.8,142.9 L 197.7,144.1 L 194.0,173.4 L 210.1,176.1 L 209.1,185.0 L 220.2,185.1 L 212.3,197.4 L 216.9,200.5 L 275.9,208.3 L 289.9,219.9 L 356.6,245.9 L 440.0,251.5 L 438.7,276.3 L 341.7,263.7 L 224.4,222.3 L 160.6,207.4 L 161.2,190.8 L 151.7,185.6 L 150.3,177.1 L 159.5,168.9 L 165.5,177.4 L 171.9,174.7 L 173.8,160.7 L 184.1,164.7 L 185.5,153.3 L 172.1,154.3 L 176.1,144.2 L 167.0,145.4 L 168.2,133.4 L 165.7,130.2 Z" fill="#10b981" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="276.0" y="221.9" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Batu Putih</text>
                                </g>

                                <!-- 4. Pakue Utara -->
                                <g id="lk-pakueutara" class="cursor-pointer" onmouseenter="showKecHover('Pakue Utara', '9 Desa/Kelurahan', 'Perikanan Tangkap &amp; Kelapa Kopra Putih', '8.402 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Pakue Utara (9 Desa)</title>
                                    <path d="M 176.9,208.7 L 319.3,258.1 L 367.0,269.3 L 438.7,276.3 L 434.7,319.6 L 398.3,303.5 L 366.4,303.7 L 335.2,295.3 L 191.5,232.9 L 162.3,235.4 L 151.3,218.0 L 160.6,207.4 L 176.9,208.7 Z" fill="#0284c7" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="311.5" y="265.0" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Pakue Utara</text>
                                </g>

                                <!-- 5. Pakue Tengah -->
                                <g id="lk-pakuetengah" class="cursor-pointer" onmouseenter="showKecHover('Pakue Tengah', '10 Desa/Kelurahan', 'Pariwisata Bahari Pasir Putih &amp; Kakao', '7.738 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Pakue Tengah (10 Desa)</title>
                                    <path d="M 190.6,232.9 L 259.5,259.9 L 323.4,290.5 L 287.1,291.0 L 280.4,307.0 L 259.0,316.9 L 176.8,273.5 L 162.8,271.9 L 162.3,235.4 L 190.6,232.9 Z" fill="#0ea5e9" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="227.7" y="272.3" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Pakue Tengah</text>
                                </g>

                                <!-- 6. Pakue -->
                                <g id="lk-pakue" class="cursor-pointer" onmouseenter="showKecHover('Pakue', '11 Desa/Kelurahan', 'Sentra Perkebunan Kakao &amp; Tanaman Pangan', '10.985 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Pakue (11 Desa)</title>
                                    <path d="M 172.9,272.9 L 259.0,316.9 L 243.2,332.0 L 235.9,330.0 L 234.0,347.5 L 207.5,343.9 L 146.3,313.6 L 136.0,321.2 L 125.0,304.5 L 133.4,301.0 L 140.8,281.4 L 154.8,274.2 L 166.6,278.7 L 172.9,272.9 Z" fill="#38bdf8" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="190.6" y="309.5" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Pakue</text>
                                </g>

                                <!-- 7. Watunohu -->
                                <g id="lk-watunohu" class="cursor-pointer" onmouseenter="showKecHover('Watunohu', '8 Desa/Kelurahan', 'Hortikultura Sayur-Buah &amp; Ternak Kambing', '7.279 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Watunohu (8 Desa)</title>
                                    <path d="M 127.6,303.0 L 127.8,310.3 L 143.1,329.1 L 124.1,325.5 L 106.3,345.4 L 102.1,340.8 L 87.6,342.4 L 86.5,329.5 L 98.1,312.9 L 127.6,303.0 Z" fill="#d97706" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="111.1" y="323.9" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Watunohu</text>
                                </g>

                                <!-- 8. Tiwu -->
                                <g id="lk-tiwu" class="cursor-pointer" onmouseenter="showKecHover('Tiwu', '7 Desa/Kelurahan', 'Kakao, Rumput Laut Eucheuma &amp; Kelapa', '4.849 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Tiwu (7 Desa)</title>
                                    <path d="M 101.5,340.7 L 130.6,374.5 L 132.7,390.1 L 80.7,366.2 L 84.2,360.3 L 78.4,354.2 L 86.7,352.4 L 89.0,341.9 L 101.5,340.7 Z" fill="#f59e0b" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="105.5" y="364.4" font-size="9" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Tiwu</text>
                                </g>

                                <!-- 9. Ngapa -->
                                <g id="lk-ngapa" class="cursor-pointer" onmouseenter="showKecHover('Ngapa', '12 Desa/Kelurahan', 'Lumbung Pangan (Padi/Jagung) &amp; Beras Organik', '17.256 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Ngapa (12 Desa)</title>
                                    <path d="M 147.1,314.8 L 207.5,343.9 L 234.0,347.5 L 229.6,350.9 L 234.4,357.7 L 222.1,373.2 L 216.8,373.5 L 217.9,387.9 L 208.5,400.6 L 232.1,415.3 L 225.7,427.5 L 170.3,409.0 L 132.7,390.1 L 130.6,374.5 L 106.1,345.3 L 124.1,325.5 L 143.1,329.1 L 143.4,324.4 L 135.3,321.9 L 147.1,314.8 Z" fill="#fbbf24" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="173.0" y="368.2" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Ngapa</text>
                                </g>

                                <!-- 10. Kodeoha -->
                                <g id="lk-kodeoha" class="cursor-pointer" onmouseenter="showKecHover('Kodeoha', '12 Desa/Kelurahan', 'Sentra Utama Kakao Fermentasi &amp; Udang', '11.592 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Kodeoha (12 Desa)</title>
                                    <path d="M 78.6,354.5 L 84.2,360.3 L 80.7,366.2 L 90.6,372.2 L 225.0,428.9 L 209.2,437.0 L 89.7,413.0 L 42.0,385.5 L 78.6,354.5 Z" fill="#84cc16" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="120.5" y="401.1" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Kodeoha</text>
                                </g>

                                <!-- 11. Katoi -->
                                <g id="lk-katoi" class="cursor-pointer" onmouseenter="showKecHover('Katoi', '6 Desa/Kelurahan', 'Kampung Nelayan Pesisir &amp; Sentra Kakao', '7.408 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Katoi (6 Desa)</title>
                                    <path d="M 42.2,386.1 L 89.7,413.0 L 209.2,437.0 L 209.8,448.5 L 170.8,452.7 L 66.3,434.2 L 22.9,437.2 L 20.0,411.2 L 41.9,395.9 L 42.2,386.1 Z" fill="#22c55e" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="101.3" y="427.0" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Katoi</text>
                                </g>

                                <!-- 12. Lasusua -->
                                <g id="lk-lasusua" class="cursor-pointer" onmouseenter="showKecHover('Lasusua', '12 Desa/Kelurahan', 'Ibu Kota Kabupaten, Pusat Ekonomi &amp; Layanan', '28.514 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Lasusua (12 Desa)</title>
                                    <path d="M 64.7,434.4 L 158.9,451.6 L 209.8,448.5 L 229.1,458.4 L 171.6,486.7 L 93.5,512.5 L 87.4,510.6 L 92.8,519.7 L 88.5,529.0 L 77.6,525.4 L 70.2,510.3 L 49.0,499.1 L 44.4,492.8 L 52.8,494.2 L 30.5,471.3 L 25.2,452.9 L 22.9,437.2 L 64.7,434.4 Z" fill="#2c3a32" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="107.6" y="471.0" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Lasusua</text>
                                </g>

                                <!-- 13. Lambai -->
                                <g id="lk-lambai" class="cursor-pointer" onmouseenter="showKecHover('Lambai', '7 Desa/Kelurahan', 'Minyak Nilam, Bunga Cengkeh &amp; Kakao', '7.195 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Lambai (7 Desa)</title>
                                    <path d="M 234.3,475.6 L 155.7,519.6 L 129.1,522.5 L 108.5,541.7 L 88.5,529.0 L 92.8,519.7 L 87.4,510.6 L 93.5,512.5 L 171.5,486.7 L 228.8,459.5 L 234.3,475.6 Z" fill="#6366f1" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="155.2" y="502.7" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Lambai</text>
                                </g>

                                <!-- 14. Rante Angin -->
                                <g id="lk-ranteangin" class="cursor-pointer" onmouseenter="showKecHover('Rante Angin', '7 Desa/Kelurahan', 'Biji Kakao Rakyat, Padi Sawah &amp; Sapi', '6.161 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Rante Angin (7 Desa)</title>
                                    <path d="M 239.8,477.9 L 251.1,486.7 L 222.6,495.7 L 214.2,506.9 L 202.7,510.2 L 171.8,534.4 L 160.4,533.6 L 153.6,549.2 L 133.2,563.7 L 108.7,542.0 L 129.1,522.5 L 154.5,520.2 L 231.8,476.8 L 239.8,477.9 Z" fill="#8b5cf6" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="169.6" y="521.4" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Rante Angin</text>
                                </g>

                                <!-- 15. Wawo -->
                                <g id="lk-wawo" class="cursor-pointer" onmouseenter="showKecHover('Wawo', '7 Desa/Kelurahan', 'Agrowisata Danau Biru, Cengkeh &amp; Kopi Robusta', '7.188 Jiwa')" onmouseleave="resetKecHover()">
                                    <title>Kecamatan Wawo (7 Desa)</title>
                                    <path d="M 249.0,486.8 L 291.5,514.9 L 303.9,547.3 L 215.9,578.6 L 193.7,600.0 L 179.7,581.6 L 133.2,563.7 L 153.6,549.2 L 160.4,533.6 L 171.8,534.4 L 202.7,510.2 L 214.2,506.9 L 222.6,495.7 L 249.0,486.8 Z" fill="#a855f7" stroke="#ffffff" stroke-width="2.5" class="kec-map-path"/>
                                    <text x="224.5" y="541.1" font-size="9.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="800" fill="#ffffff" text-anchor="middle" pointer-events="none" class="drop-shadow select-none">Wawo</text>
                                </g>
                            </svg>
                        </div>
                        <div class="text-[11px] text-slate-400 font-medium mt-1 text-center">
                            Peta Tematik Spasial 15 Kecamatan Kolaka Utara
                        </div>
                    </div>

                </div>
            </div>

            <!-- Bottom Status Footer -->
            <div class="relative z-10 flex items-center justify-between text-xs text-slate-300 pt-3 border-t border-white/15">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                    <span class="font-semibold text-emerald-300">Server &amp; Basis Data WebGIS Aktif</span>
                </div>
                <div class="text-[11px] text-slate-400">
                    BPS Kolaka Utara © {{ date('Y') }}
                </div>
            </div>
        </div>

        <!-- ========================================================================= -->
        <!-- SISI KANAN: FORMULIR LOGIN EKSEKUTIF BERSIH & MODERN -->
        <!-- ========================================================================= -->
        <div class="lg:w-[44%] xl:w-[40%] w-full flex flex-col justify-between bg-white min-h-screen p-6 sm:p-10 xl:p-12 shadow-2xl relative z-10 overflow-y-auto">
            
            <!-- Top Action Bar -->
            <div class="flex items-center justify-between pb-6">
                <!-- Mobile Only Logo Header -->
                <div class="flex lg:hidden items-center gap-2">
                    <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolut" class="h-8 w-auto">
                    <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-7 w-auto">
                    <span class="text-xs font-bold text-slate-800 font-cinzel ml-1">DESA MADANI</span>
                </div>

                <div class="hidden lg:block text-xs font-semibold text-slate-400">
                    BPS KABUPATEN KOLAKA UTARA (KODE: 7408)
                </div>

                <!-- Tombol Kembali ke Portal -->
                <a href="/portal" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-emerald-50 hover:text-[#3B4D3B] text-slate-700 font-bold text-xs transition flex items-center gap-2 border border-slate-200">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali ke Portal</span>
                </a>
            </div>

            <!-- Central Form Box -->
            <div class="my-auto py-4 max-w-md w-full mx-auto">
                
                <!-- Welcome Title -->
                <div class="mb-6">
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-[#3B4D3B] border border-emerald-200 text-xs font-bold mb-3">
                        <i class="bi bi-shield-check text-emerald-600"></i>
                        <span>AKUN ADMINISTRATOR &amp; OPERATOR</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                        Selamat Datang Kembali
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">
                        Masukkan kredensial akun Anda untuk mengakses dashboard manajemen data dan validasi PODES.
                    </p>
                </div>

                <!-- Alert Box Error/Success -->
                <div id="loginAlertBox" class="{{ $errors->any() ? '' : 'hidden' }} mb-4 p-3.5 rounded-2xl text-xs font-semibold {{ $errors->any() ? 'bg-rose-50 border border-rose-200 text-rose-800' : '' }}">
                    @if ($errors->any())
                        <div class="flex items-center gap-2">
                            <i class="bi bi-exclamation-triangle-fill text-rose-600 text-sm"></i>
                            <span>{{ $errors->first('login') ?: 'Email atau kata sandi tidak valid.' }}</span>
                        </div>
                    @endif
                </div>

                <!-- Login Form -->
                <form id="formAdminLogin" method="POST" action="{{ route('login.post') }}" onsubmit="handleAdminLoginSubmit(event)" class="space-y-4">
                    @csrf
                    
                    <!-- Input Email / Username -->
                    <div>
                        <label for="inpLogin" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                            <i class="bi bi-person-fill text-emerald-700"></i>
                            <span>Email / Username</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 text-sm">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="text" 
                                   name="login" 
                                   id="inpLogin" 
                                   value="{{ old('login', 'admin@bps.go.id') }}"
                                   class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200 transition" 
                                   placeholder="Contoh: admin@bps.go.id" 
                                   required 
                                   autocomplete="username">
                        </div>
                    </div>

                    <!-- Input Kata Sandi -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="inpPassword" class="block text-xs font-bold text-slate-700 uppercase tracking-wider flex items-center gap-1.5">
                                <i class="bi bi-lock-fill text-emerald-700"></i>
                                <span>Kata Sandi</span>
                            </label>
                            <span class="text-[11px] text-slate-400 hover:text-emerald-700 cursor-pointer transition font-medium" onclick="alert('Silakan hubungi BPS Kabupaten Kolaka Utara untuk bantuan pemulihan akses akun administrator.')">Lupa sandi?</span>
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 text-sm">
                                <i class="bi bi-shield-lock"></i>
                            </span>
                            <input type="password" 
                                   name="password" 
                                   id="inpPassword" 
                                   value="bps7408"
                                   class="w-full pl-10 pr-11 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200 transition font-mono" 
                                   placeholder="Masukkan kata sandi" 
                                   required 
                                   autocomplete="current-password">
                            <button type="button" 
                                    onclick="toggleAdminPassword()" 
                                    id="btnToggleEye"
                                    class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 text-sm cursor-pointer" 
                                    title="Tampilkan/Sembunyikan Sandi">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me & Kode Wilayah -->
                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center gap-2 text-xs font-medium text-slate-600 cursor-pointer select-none">
                            <input type="checkbox" name="remember" value="1" checked class="w-4 h-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 cursor-pointer">
                            <span>Ingat sesi masuk</span>
                        </label>
                        <span class="text-[11px] text-slate-400 font-mono">BPS 7408</span>
                    </div>

                    <!-- Tombol Submit Login Utama -->
                    <button type="submit" 
                            id="btnSubmitLogin"
                            class="w-full py-3.5 rounded-xl bg-[#3B4D3B] hover:bg-[#2d3b2d] text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2 cursor-pointer transform active:scale-[0.99] mt-3">
                        <span id="btnSubmitText">Masuk ke Dashboard Admin</span>
                        <i id="btnSubmitIcon" class="bi bi-arrow-right text-sm"></i>
                    </button>
                </form>

                <!-- Tombol Jalan Pintas Demo Admin -->
                <div class="mt-5 pt-4 border-t border-slate-100 space-y-2">
                    <button type="button" 
                            onclick="fillAdminCredentials()" 
                            class="w-full py-2.5 px-3 rounded-xl bg-emerald-50 hover:bg-emerald-100/90 border border-emerald-200 text-[#3B4D3B] font-bold text-xs transition cursor-pointer flex items-center justify-center gap-2 shadow-2xs">
                        <i class="bi bi-lightning-charge-fill text-amber-500"></i>
                        <span>Isi Otomatis Kredensial Demo Admin</span>
                    </button>

                    <!-- Link Alternatif Login Desa Cantik (DESCAN) -->
                    <div class="pt-2 text-center">
                        <a href="/descan/login" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-[#3B4D3B] transition">
                            <span>Bukan Admin? Masuk Akun Desa Binaan (DESCAN)</span>
                            <i class="bi bi-chevron-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Footer Area -->
            <div class="pt-6 border-t border-slate-100 text-center text-xs text-slate-400">
                <p>© {{ date('Y') }} Badan Pusat Statistik Kabupaten Kolaka Utara &amp; Pemerintah Kabupaten Kolaka Utara</p>
            </div>

        </div>

    </div>

    <!-- JS LOGIC -->
    <script>
        function showKecHover(nama, desa, potensi, pop) {
            const badge = document.getElementById('loginKecHoverBadge');
            if (badge) {
                badge.innerHTML = `<strong class="text-white">Kecamatan ${nama}</strong> • <span class="text-emerald-300 font-bold">${desa}</span> • <span class="text-slate-300">${pop}</span> • <span class="text-amber-300">${potensi}</span>`;
            }
        }

        function resetKecHover() {
            const badge = document.getElementById('loginKecHoverBadge');
            if (badge) {
                badge.innerHTML = 'Arahkan kursor ke peta untuk melihat profil kecamatan';
            }
        }

        function toggleAdminPassword() {
            const passInput = document.getElementById('inpPassword');
            const eyeIcon = document.getElementById('btnToggleEye')?.querySelector('i');
            if (!passInput) return;
            if (passInput.type === 'password') {
                passInput.type = 'text';
                if (eyeIcon) eyeIcon.className = 'bi bi-eye-slash text-emerald-600';
            } else {
                passInput.type = 'password';
                if (eyeIcon) eyeIcon.className = 'bi bi-eye text-slate-400';
            }
        }

        function fillAdminCredentials() {
            const loginInp = document.getElementById('inpLogin');
            const passInp = document.getElementById('inpPassword');
            if (loginInp) loginInp.value = 'admin@bps.go.id';
            if (passInp) passInp.value = 'bps7408';
        }

        async function handleAdminLoginSubmit(e) {
            e.preventDefault();
            const form = document.getElementById('formAdminLogin');
            const alertBox = document.getElementById('loginAlertBox');
            const submitBtn = document.getElementById('btnSubmitLogin');
            const btnText = document.getElementById('btnSubmitText');
            const btnIcon = document.getElementById('btnSubmitIcon');

            const login = document.getElementById('inpLogin').value.trim();
            const password = document.getElementById('inpPassword').value;
            const csrfToken = form.querySelector('input[name="_token"]')?.value || '';

            if (alertBox) {
                alertBox.classList.add('hidden');
                alertBox.className = 'mb-4 p-3.5 rounded-2xl text-xs font-semibold';
                alertBox.innerHTML = '';
            }

            if (submitBtn) submitBtn.disabled = true;
            if (btnText) btnText.textContent = 'Memverifikasi...';
            if (btnIcon) btnIcon.className = 'bi bi-arrow-repeat animate-spin text-sm';

            try {
                const response = await fetch("{{ route('login.post') }}", {
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
                        alertBox.innerHTML = `<div class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-emerald-600 text-sm"></i><span>${data.message || 'Login berhasil! Mengalihkan ke Dashboard...'}</span></div>`;
                    }
                    setTimeout(() => {
                        window.location.href = data.redirect || '/admin';
                    }, 500);
                } else {
                    if (submitBtn) submitBtn.disabled = false;
                    if (btnText) btnText.textContent = 'Masuk ke Dashboard Admin';
                    if (btnIcon) btnIcon.className = 'bi bi-arrow-right text-sm';

                    if (alertBox) {
                        alertBox.classList.remove('hidden');
                        alertBox.classList.add('bg-rose-50', 'text-rose-800', 'border', 'border-rose-200');
                        alertBox.innerHTML = `<div class="flex items-center gap-2"><i class="bi bi-exclamation-triangle-fill text-rose-600 text-sm"></i><span>${data.message || 'Email/username atau kata sandi yang Anda masukkan salah.'}</span></div>`;
                    }
                }
            } catch (err) {
                form.submit();
            }
        }
    </script>
</body>
</html>
