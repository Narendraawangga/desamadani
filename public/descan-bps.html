<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Admin BPS - Pembinaan & Verifikasi Data Desa Cantik Kolaka Utara</title>
    
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
                        theme: {
                            rose: '#9F1239',
                            crimson: '#BE123C',
                            dark: '#881337',
                            ice: '#E0F2FE',
                            iceLight: '#F0F9FF',
                            iceBorder: '#BAE6FD',
                            iceAccent: '#0284C7'
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Auth & Shared Repository DESCAN -->
    <script src="/js/descan-auth.js"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #F8FAFC;
            color: #0F172A;
            overflow-x: hidden;
        }
        .bps-card {
            background: #FFFFFF;
            border-radius: 1.25rem;
            border: 1px solid #BAE6FD;
            box-shadow: 0 4px 20px -2px rgba(2, 132, 199, 0.05);
            transition: all 0.2s ease;
        }
        .bps-card:hover {
            box-shadow: 0 8px 30px -4px rgba(159, 18, 57, 0.08);
        }
        
        /* Sidebar Navigation Item Styling */
        .sidebar-nav-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 0.75rem 0.9rem;
            border-radius: 0.85rem;
            font-size: 0.8125rem;
            font-weight: 700;
            color: #334155;
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
            text-align: left;
        }
        .sidebar-nav-item:hover {
            background: #F0F9FF;
            color: #9F1239;
            border-color: #BAE6FD;
            transform: translateX(3px);
        }
        .sidebar-nav-item.active {
            background: linear-gradient(135deg, #9F1239 0%, #BE123C 100%);
            color: #FFFFFF !important;
            border-color: #9F1239;
            box-shadow: 0 4px 14px rgba(159, 18, 57, 0.25);
        }
        .sidebar-nav-item.active .nav-icon {
            color: #FFFFFF !important;
        }
        .sidebar-nav-item.active .nav-badge {
            background: rgba(255, 255, 255, 0.2) !important;
            color: #FFFFFF !important;
            border-color: rgba(255, 255, 255, 0.3) !important;
        }

        .badge-ice {
            background: #E0F2FE;
            color: #0369A1;
            border: 1px solid #BAE6FD;
        }
        .badge-rose {
            background: #FFF1F2;
            color: #9F1239;
            border: 1px solid #FECDD3;
        }
        .badge-amber {
            background: #FEF3C7;
            color: #92400E;
            border: 1px solid #FDE68A;
        }
        .badge-emerald {
            background: #ECFDF5;
            color: #065F46;
            border: 1px solid #A7F3D0;
        }

        /* Filter Tab Pills */
        .filter-pill {
            padding: 0.4rem 0.85rem;
            border-radius: 0.75rem;
            font-size: 0.75rem;
            font-weight: 700;
            transition: all 0.2s ease;
            cursor: pointer;
            border: 1px solid #E2E8F0;
            background: #FFFFFF;
            color: #475569;
        }
        .filter-pill:hover {
            border-color: #BAE6FD;
            color: #0284C7;
        }
        .filter-pill.active {
            background: #0284C7;
            color: #FFFFFF;
            border-color: #0284C7;
            box-shadow: 0 2px 8px rgba(2, 132, 199, 0.25);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-[#F8FAFC]">

    <!-- ============================================================== -->
    <!-- TOP NAVIGATION BAR (HANYA LOGO, TULISAN ADMIN BPS, & KELUAR)   -->
    <!-- ============================================================== -->
    <header class="sticky top-0 z-40 bg-white border-b border-[#BAE6FD] shadow-xs">
        <div class="w-full px-4 sm:px-6 lg:px-8 h-18 flex items-center justify-between gap-4">
            
            <!-- Left: Toggle Sidebar (Mobile) + Logo Pemkab & BPS + Tulisan Admin BPS -->
            <div class="flex items-center gap-3 sm:gap-4">
                <!-- Mobile Hamburger Toggle -->
                <button type="button" onclick="toggleSidebar()" class="lg:hidden p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 transition cursor-pointer" title="Buka Menu Sidebar">
                    <i class="bi bi-list text-xl"></i>
                </button>

                <!-- Logos & Title -->
                <a href="/descan" class="flex items-center gap-3 group" title="Kembali ke Beranda Desa Cantik">
                    <div class="flex items-center gap-2">
                        <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-9 w-auto object-contain drop-shadow-xs" title="Pemerintah Kabupaten Kolaka Utara">
                        <div class="h-7 w-[1.5px] bg-[#BAE6FD]"></div>
                        <img src="/images/logo_bps.png" alt="Logo BPS" class="h-9 w-auto object-contain drop-shadow-xs" title="Badan Pusat Statistik">
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm sm:text-base font-black tracking-tight text-slate-900 uppercase">Admin BPS</span>
                            <span class="hidden sm:inline-flex px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-[#FFF1F2] text-[#9F1239] border border-[#FECDD3]">KAB. KOLAKA UTARA</span>
                        </div>
                        <p class="text-[11px] text-slate-500 font-medium hidden sm:block">Pembina Statistik Sektoral Desa Cantik 2026</p>
                    </div>
                </a>
            </div>

            <!-- Right: Admin Status & Tombol Keluar (Logout) -->
            <div class="flex items-center gap-3">
                <div id="bpsHeaderSessionStatus" class="hidden md:flex items-center gap-2.5 px-3 py-1.5 rounded-xl bg-emerald-50 border border-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-xs font-extrabold text-emerald-800">Sesi Admin BPS Aktif</span>
                </div>

                <button type="button" onclick="logoutAdminBps()" class="px-3.5 py-2 rounded-xl border border-rose-200 bg-rose-50 hover:bg-rose-100 text-[#9F1239] text-xs font-black transition-all cursor-pointer flex items-center gap-2 shadow-2xs hover:shadow-xs" title="Keluar dari Portal Admin BPS">
                    <i class="bi bi-box-arrow-right text-sm"></i>
                    <span>Keluar</span>
                </button>
            </div>
        </div>
    </header>

    <!-- ============================================================== -->
    <!-- DEDICATED LOGIN GATE BPS (WAJIB MASUKKAN SANDI SEPERTI OPERATOR) -->
    <!-- ============================================================== -->
    <div id="bpsLoginGate" class="w-full max-w-md mx-auto px-4 py-8 sm:py-16 my-auto flex-1 flex flex-col justify-center animate-in fade-in duration-200">
        <div class="bg-white rounded-3xl shadow-2xl border border-[#BAE6FD] overflow-hidden">
            
            <!-- Header Banner -->
            <div class="bg-gradient-to-r from-[#881337] via-[#BE123C] to-[#0369A1] text-white p-6 relative">
                <div class="flex items-center gap-2 text-[10px] font-black tracking-widest uppercase text-sky-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Autentikasi Sandi Pembina • BPS DESCAN</span>
                </div>
                <h2 class="text-xl sm:text-2xl font-black text-white mt-1">
                    Login Akses Admin BPS
                </h2>
                <p class="text-xs text-sky-100/90 mt-1">
                    Masukkan email dan kata sandi resmi pembina BPS Kolaka Utara untuk membuka modul monitoring 6 desa, verifikasi output, dan unggah materi/video edukasi.
                </p>
            </div>

            <!-- Target Identity Card & Form -->
            <div class="p-6 space-y-4">
                <div class="p-4 rounded-2xl bg-sky-50/70 border border-[#BAE6FD] flex items-center gap-3.5">
                    <img src="/images/logo_bps.png" alt="Logo BPS" class="w-14 h-14 rounded-2xl object-contain p-1.5 bg-white border-2 border-[#0284C7] shadow-xs shrink-0">
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-base font-black text-slate-900 leading-tight">BPS Kolaka Utara</h3>
                            <span class="px-2 py-0.5 rounded-md bg-[#E0F2FE] text-[#0369A1] text-[10px] font-extrabold border border-[#BAE6FD]">Pembina Resmi</span>
                        </div>
                        <p class="text-xs font-semibold text-slate-600 mt-0.5">
                            Badan Pusat Statistik Kab. Kolaka Utara
                        </p>
                        <p class="text-[10px] text-slate-400 font-medium">
                            Program Desa Cantik (DESCAN) 2026
                        </p>
                    </div>
                </div>

                <!-- Form Input Password -->
                <form id="bpsGateLoginForm" onsubmit="handleBpsGateLogin(event)" class="space-y-4" autocomplete="off">
                    <div id="bpsGateErrorAlert" class="hidden p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs flex items-center gap-2.5">
                        <i class="bi bi-exclamation-triangle-fill text-rose-600 text-sm"></i>
                        <span id="bpsGateErrorText" class="font-semibold">Kata sandi Admin BPS salah.</span>
                    </div>

                    <!-- Email Input (readonly default) -->
                    <div>
                        <label for="gateInputBpsEmail" class="block text-xs font-bold text-slate-700 mb-1">
                            Email Akun Resmi BPS
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 text-xs">
                                <i class="bi bi-envelope-fill"></i>
                            </span>
                            <input type="email" id="gateInputBpsEmail" value="admin.bps@descan.bps.go.id" required class="w-full pl-9 pr-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-800 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#9F1239]/20 focus:border-[#9F1239] transition">
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="gateInputBpsPassword" class="block text-xs font-bold text-slate-700 mb-1">
                            Kata Sandi (Password) Admin BPS
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 text-xs">
                                <i class="bi bi-lock-fill"></i>
                            </span>
                            <input type="password" id="gateInputBpsPassword" required placeholder="Masukkan kata sandi Admin BPS" class="w-full pl-9 pr-10 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#9F1239]/20 focus:border-[#9F1239] transition bg-white">
                            <button type="button" onclick="toggleBpsPasswordVisibility('gateInputBpsPassword')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 text-xs cursor-pointer" title="Lihat/Sembunyikan Sandi">
                                <i id="gateBpsEyeIcon" class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-[#9F1239] to-[#BE123C] hover:from-[#881337] hover:to-[#9F1239] text-white font-extrabold text-xs shadow-md hover:shadow-lg transition flex items-center justify-center gap-2 transform active:scale-98 cursor-pointer">
                        <span>Buka Portal Admin BPS Sekarang</span>
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </form>

                <!-- Helper Actions -->
                <div class="pt-2 flex items-center justify-between text-xs border-t border-slate-100">
                    <button type="button" onclick="autofillBpsGate()" class="text-[#0284C7] hover:underline font-bold text-[11px] cursor-pointer flex items-center gap-1">
                        <i class="bi bi-lightning-charge-fill text-amber-500"></i>
                        <span>Isi Sandi Otomatis</span>
                    </button>
                    <a href="/descan" class="text-slate-500 hover:text-[#9F1239] font-bold text-[11px] transition">
                        ← Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MAIN WORKSPACE LAYOUT: SIDEBAR (KIRI) + KONTEN UTAMA (KANAN)    -->
    <!-- ============================================================== -->
    <div id="bpsWorkspace" class="flex-1 flex w-full">

        <!-- BACKDROP OVERLAY FOR MOBILE SIDEBAR -->
        <div id="sidebarBackdrop" onclick="toggleSidebar(false)" class="fixed inset-0 z-40 bg-slate-950/50 backdrop-blur-xs hidden lg:hidden transition-opacity"></div>

        <!-- ============================================================== -->
        <!-- SIDEBAR RESMI ADMIN BPS (DESKTOP & MOBILE DRAWER)              -->
        <!-- ============================================================== -->
        <aside id="bpsSidebar" class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-[#BAE6FD] flex flex-col justify-between transform -translate-x-full lg:translate-x-0 lg:static transition-transform duration-300 ease-in-out shadow-lg lg:shadow-none">
            
            <!-- Sidebar Top: User Info & Nav Menu Items -->
            <div class="p-5 space-y-6 overflow-y-auto">
                
                <!-- Close Button on Mobile Drawer -->
                <div class="lg:hidden flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <img src="/images/logo_bps.png" alt="Logo BPS" class="h-6 w-auto">
                        <span class="text-xs font-black text-slate-900">MENU ADMIN BPS</span>
                    </div>
                    <button type="button" onclick="toggleSidebar(false)" class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 bg-slate-100">
                        <i class="bi bi-x-lg text-xs"></i>
                    </button>
                </div>

                <!-- Admin Profile Card -->
                <div class="p-4 rounded-2xl bg-gradient-to-br from-rose-50/50 via-white to-sky-50/50 border border-[#BAE6FD] space-y-2">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-2xl bg-[#E0F2FE] border border-[#BAE6FD] flex items-center justify-center text-[#0369A1] font-black text-base shadow-xs shrink-0">
                            BPS
                        </div>
                        <div class="min-w-0 flex-1">
                            <h4 class="text-xs font-black text-slate-900 truncate">Tim Pembina BPS Kolut</h4>
                            <p class="text-[10px] text-slate-500 font-semibold truncate">admin.bps@descan.bps.go.id</p>
                            <span class="inline-flex items-center gap-1 text-[9px] font-black text-emerald-700 bg-emerald-100/80 px-2 py-0.5 rounded-full mt-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Otoritas Pembina Data
                            </span>
                        </div>
                    </div>
                </div>

                <!-- GRUP 1: TUGAS UTAMA ADMIN BPS -->
                <div class="space-y-2">
                    <span class="text-[10px] font-black uppercase tracking-wider text-slate-400 px-2">Menu Utama Pembina</span>
                    
                    <!-- 1. Monitoring 6 Desa -->
                    <button type="button" onclick="switchBpsTab('monitoring')" id="sideNavMonitoring" class="sidebar-nav-item active group">
                        <div class="flex items-center gap-3 min-w-0">
                            <i class="bi bi-graph-up-arrow text-base text-[#BE123C] group-hover:text-[#9F1239] nav-icon transition-colors"></i>
                            <div class="truncate text-left">
                                <div class="truncate leading-tight">1. Monitoring 6 Desa</div>
                                <div class="text-[10px] opacity-75 font-medium">LKE &amp; Status Binaan</div>
                            </div>
                        </div>
                        <span class="nav-badge text-[9px] font-black text-[#0369A1] bg-[#E0F2FE] border border-[#BAE6FD] px-2 py-0.5 rounded-md shrink-0">Live</span>
                    </button>

                    <!-- 2. Verifikasi Output Desa (NEW: Fitur Verifikasi & Pengembalian Revisi) -->
                    <button type="button" onclick="switchBpsTab('verifikasi')" id="sideNavVerifikasi" class="sidebar-nav-item group">
                        <div class="flex items-center gap-3 min-w-0">
                            <i class="bi bi-check2-circle text-base text-[#0284C7] group-hover:text-[#0369A1] nav-icon transition-colors"></i>
                            <div class="truncate text-left">
                                <div class="truncate leading-tight">2. Verifikasi Output Desa</div>
                                <div class="text-[10px] opacity-75 font-medium">Review, Tolak &amp; Publikasi</div>
                            </div>
                        </div>
                        <span class="nav-badge text-[9px] font-black text-amber-800 bg-amber-100 border border-amber-300 px-2 py-0.5 rounded-md shrink-0" id="sideBadgePendingOutputs">1 Menunggu</span>
                    </button>

                    <!-- 3. Upload Pembinaan -->
                    <button type="button" onclick="switchBpsTab('pembinaan')" id="sideNavPembinaan" class="sidebar-nav-item group">
                        <div class="flex items-center gap-3 min-w-0">
                            <i class="bi bi-cloud-arrow-up-fill text-base text-[#BE123C] group-hover:text-[#9F1239] nav-icon transition-colors"></i>
                            <div class="truncate text-left">
                                <div class="truncate leading-tight">3. Upload Pembinaan</div>
                                <div class="text-[10px] opacity-75 font-medium">Pedoman &amp; 5 Template</div>
                            </div>
                        </div>
                        <span class="nav-badge text-[9px] font-black text-[#9F1239] bg-rose-50 border border-rose-200 px-2 py-0.5 rounded-md shrink-0" id="sideBadgeMaterials">5 Modul</span>
                    </button>

                    <!-- 4. Upload Video Edukasi -->
                    <button type="button" onclick="switchBpsTab('video')" id="sideNavVideo" class="sidebar-nav-item group">
                        <div class="flex items-center gap-3 min-w-0">
                            <i class="bi bi-camera-reels-fill text-base text-[#0284C7] group-hover:text-[#0369A1] nav-icon transition-colors"></i>
                            <div class="truncate text-left">
                                <div class="truncate leading-tight">4. Upload Video Edukasi</div>
                                <div class="text-[10px] opacity-75 font-medium">Mikrolearning Statistik</div>
                            </div>
                        </div>
                        <span class="nav-badge text-[9px] font-black text-[#0284C7] bg-sky-50 border border-sky-200 px-2 py-0.5 rounded-md shrink-0" id="sideBadgeVideos">3 Video</span>
                    </button>
                </div>



            </div>

            <!-- Sidebar Bottom Footer -->
            <div class="p-4 border-t border-[#BAE6FD] bg-[#F0F9FF]/60 text-center text-[10px] text-slate-500 space-y-1">
                <div class="font-extrabold text-slate-700">BPS KABUPATEN KOLAKA UTARA</div>
                <div>Program Desa Cinta Statistik (DESCAN) 2026</div>
            </div>
        </aside>

        <!-- ============================================================== -->
        <!-- MAIN CONTENT AREA (KANAN)                                      -->
        <!-- ============================================================== -->
        <main class="flex-1 min-w-0 p-4 sm:p-6 lg:p-8 space-y-6 overflow-y-auto">
            
            <!-- BREADCRUMB & STATUS BAR -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gradient-to-r from-sky-50 via-white to-rose-50 p-4 rounded-2xl border border-[#BAE6FD]">
                <div class="flex items-center gap-2 text-xs">
                    <a href="/descan" class="text-slate-500 hover:text-[#9F1239] font-medium">Desa Cantik</a>
                    <span class="text-slate-400">/</span>
                    <span class="text-[#9F1239] font-extrabold">Portal Khusus Admin BPS</span>
                    <span class="text-slate-400">/</span>
                    <span id="activeSectionLabel" class="text-slate-700 font-bold">1. Live Monitoring 6 Desa</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="badge-ice text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1.5">
                        <i class="bi bi-shield-check"></i>
                        <span>Otoritas Pembina: Badan Pusat Statistik</span>
                    </span>
                    <a href="/descan/output" target="_blank" class="text-xs font-bold text-[#0284C7] hover:underline flex items-center gap-1">
                        <span>Lihat Output Publik</span>
                        <i class="bi bi-box-arrow-up-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- SECTION 1: MONITORING 6 DESA BINAAN                            -->
            <!-- ============================================================== -->
            <section id="sectionMonitoring" class="space-y-6">
                
                <!-- Summary Metric Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Card 1 -->
                    <div class="bps-card p-5 bg-gradient-to-br from-white to-sky-50/40">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Desa Binaan</span>
                            <div class="w-9 h-9 rounded-xl bg-[#E0F2FE] text-[#0369A1] flex items-center justify-center text-lg">
                                🏡
                            </div>
                        </div>
                        <div class="text-2xl sm:text-3xl font-black text-slate-900 mt-2">6 Desa</div>
                        <p class="text-[11px] text-slate-500 mt-1">Kec. Kodeoha (3) &amp; Kec. Tiwu (3)</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bps-card p-5 bg-gradient-to-br from-white to-rose-50/40">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-[#9F1239] uppercase tracking-wider">Rata-rata LKE</span>
                            <div class="w-9 h-9 rounded-xl bg-rose-100 text-[#9F1239] flex items-center justify-center text-lg font-black">
                                %
                            </div>
                        </div>
                        <div class="text-2xl sm:text-3xl font-black text-[#9F1239] mt-2">85,7%</div>
                        <p class="text-[11px] text-slate-500 mt-1">Pemenuhan 44 Indikator Desa Cantik</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bps-card p-5 bg-gradient-to-br from-white to-amber-50/40 cursor-pointer" onclick="switchBpsTab('verifikasi')" title="Klik untuk Buka Panel Verifikasi">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-amber-800 uppercase tracking-wider">Perlu Ditinjau BPS</span>
                            <div class="w-9 h-9 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center text-lg">
                                ⏳
                            </div>
                        </div>
                        <div class="text-2xl sm:text-3xl font-black text-amber-900 mt-2" id="cntPendingOutputs">1 Dokumen</div>
                        <p class="text-[11px] text-amber-700 font-medium mt-1">Menunggu persetujuan / revisi BPS</p>
                    </div>

                    <!-- Card 4 -->
                    <div class="bps-card p-5 bg-gradient-to-br from-white to-emerald-50/40">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-emerald-800 uppercase tracking-wider">Output Terbit Publik</span>
                            <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-lg">
                                ✓
                            </div>
                        </div>
                        <div class="text-2xl sm:text-3xl font-black text-emerald-900 mt-2" id="cntApprovedOutputs">7 Dokumen</div>
                        <p class="text-[11px] text-emerald-700 mt-1">Tayang di dashboard publik Desa Cantik</p>
                    </div>
                </div>

                <!-- Table of 6 Binaan Villages -->
                <div class="bps-card overflow-hidden">
                    <div class="px-6 py-5 bg-gradient-to-r from-white via-sky-50/20 to-white border-b border-[#BAE6FD] flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
                                <span>Evaluasi &amp; Monitoring Pemenuhan 6 Desa Binaan</span>
                                <span class="badge-rose text-[10px] font-black px-2 py-0.5 rounded-full">REALTIME</span>
                            </h3>
                            <p class="text-xs text-slate-500 mt-0.5">Tinjau kepatuhan LKE 44 indikator, progres output publikasi, dan verifikasi dokumen desa.</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-slate-500">Filter Wilayah:</span>
                            <select id="filterKecamatanBps" onchange="filterMonitoringTable()" class="px-3 py-1.5 rounded-xl border border-[#BAE6FD] bg-white text-xs font-bold text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#9F1239]/20">
                                <option value="all">Semua Kecamatan (6 Desa)</option>
                                <option value="kodeoha">Kecamatan Kodeoha (3 Desa)</option>
                                <option value="tiwu">Kecamatan Tiwu (3 Desa)</option>
                            </select>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#F0F9FF] text-[11px] font-black text-slate-600 uppercase tracking-wider border-b border-[#BAE6FD]">
                                    <th class="py-3 px-4">Desa / Kelurahan</th>
                                    <th class="py-3 px-4">Kecamatan</th>
                                    <th class="py-3 px-4">Capaian LKE</th>
                                    <th class="py-3 px-4">Kategori Mandiri</th>
                                    <th class="py-3 px-4">Status Output</th>
                                    <th class="py-3 px-4">Status BPS</th>
                                    <th class="py-3 px-4 text-center">Aksi BPS</th>
                                </tr>
                            </thead>
                            <tbody id="monitoringTableBody" class="divide-y divide-slate-100 text-xs">
                                <!-- Injected by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tugas Teknis Tim BPS November Checklist (Berdasarkan Surat/Arahan Resmi BPS) -->
                <div class="bps-card p-6 bg-gradient-to-br from-white to-rose-50/30 border-2 border-rose-100">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-rose-100 text-[#9F1239] flex items-center justify-center text-2xl shrink-0">
                            📋
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-2 flex-wrap">
                                <h4 class="text-sm font-extrabold text-slate-900">Agenda Tugas Teknis Desa Madani &amp; Desa Cantik BPS (November 2026)</h4>
                                <span class="text-[10px] font-black text-[#9F1239] bg-rose-100 px-2.5 py-0.5 rounded-full">PIC RESMI TIM TEKNIS</span>
                            </div>
                            <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                Berdasarkan arahan koordinator teknis BPS Kolaka Utara, berikut penugasan penyusunan modul pembinaan:
                            </p>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mt-4">
                                <div class="p-3 rounded-xl bg-white border border-[#BAE6FD] space-y-1">
                                    <span class="text-[10px] font-black text-[#0369A1] bg-[#E0F2FE] px-2 py-0.5 rounded">Tugas 1</span>
                                    <div class="text-xs font-black text-slate-900">Pedoman Desa MADANI</div>
                                    <div class="text-[11px] text-slate-600 font-semibold">Penanggung Jawab: <span class="text-[#9F1239]">Hanifah</span></div>
                                </div>
                                <div class="p-3 rounded-xl bg-white border border-[#BAE6FD] space-y-1">
                                    <span class="text-[10px] font-black text-[#0369A1] bg-[#E0F2FE] px-2 py-0.5 rounded">Tugas 2</span>
                                    <div class="text-xs font-black text-slate-900">5 Template Publikasi Desa</div>
                                    <div class="text-[11px] text-slate-600 font-semibold">PIC: <span class="text-[#9F1239]">Robbith, Asma, Aidil, Rini, Ilham</span></div>
                                </div>
                                <div class="p-3 rounded-xl bg-white border border-[#BAE6FD] space-y-1">
                                    <span class="text-[10px] font-black text-[#0369A1] bg-[#E0F2FE] px-2 py-0.5 rounded">Tugas 3</span>
                                    <div class="text-xs font-black text-slate-900">Video Mikrolearning</div>
                                    <div class="text-[11px] text-slate-600 font-semibold">Instruktur: <span class="text-[#9F1239]">Devira &amp; Hakam</span></div>
                                </div>
                                <div class="p-3 rounded-xl bg-white border border-[#BAE6FD] space-y-1">
                                    <span class="text-[10px] font-black text-[#0369A1] bg-[#E0F2FE] px-2 py-0.5 rounded">Tugas 4</span>
                                    <div class="text-xs font-black text-slate-900">Pre-test &amp; Post-test</div>
                                    <div class="text-[11px] text-slate-600 font-semibold">Penyusun: <span class="text-[#9F1239]">Seluruh Tim Teknis</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <!-- ============================================================== -->
            <!-- SECTION 2: VERIFIKASI & PERSETUJUAN OUTPUT DESA (CORE WORKFLOW) -->
            <!-- ============================================================== -->
            <section id="sectionVerifikasi" class="hidden space-y-6">
                
                <!-- Header Banner Verifikasi -->
                <div class="p-6 rounded-3xl bg-gradient-to-r from-sky-900 via-[#0369A1] to-slate-900 text-white shadow-md relative overflow-hidden">
                    <div class="relative z-10 space-y-2">
                        <div class="inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-wider text-sky-200 bg-white/10 px-3 py-1 rounded-full border border-white/20">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            <span>Alur Persetujuan &amp; Standarisasi Satu Data Indonesia</span>
                        </div>
                        <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight">
                            Verifikasi &amp; Moderasi Output Program 6 Desa Binaan
                        </h2>
                        <p class="text-xs sm:text-sm text-sky-100/90 max-w-3xl leading-relaxed">
                            BPS sebagai Pembina Statistik Sektoral memiliki wewenang penuh untuk memeriksa dokumen yang diunggah desa. 
                            <strong>Data yang belum sesuai dikembalikan dengan catatan revisi</strong>, sedangkan <strong>data yang disetujui otomatis tampil di Dashboard Utama Publik</strong>.
                        </p>
                    </div>
                </div>

                <!-- Filter Status Tab Pills -->
                <div class="bps-card p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="flex items-center gap-2 flex-wrap" id="verifikasiFilterPills">
                        <button type="button" onclick="filterVerifikasiList('all')" id="pillVerifAll" class="filter-pill active">
                            Semua Dokumen (<span id="cntPillAll">9</span>)
                        </button>
                        <button type="button" onclick="filterVerifikasiList('pending')" id="pillVerifPending" class="filter-pill">
                            ⏳ Menunggu Verifikasi (<span id="cntPillPending">1</span>)
                        </button>
                        <button type="button" onclick="filterVerifikasiList('revision')" id="pillVerifRevision" class="filter-pill">
                            ↩️ Dikembalikan / Perlu Revisi (<span id="cntPillRevision">1</span>)
                        </button>
                        <button type="button" onclick="filterVerifikasiList('approved')" id="pillVerifApproved" class="filter-pill">
                            ✓ Terbit di Publik (<span id="cntPillApproved">7</span>)
                        </button>
                    </div>

                    <div class="text-xs text-slate-500 font-semibold flex items-center gap-1.5 self-end sm:self-auto">
                        <i class="bi bi-info-circle text-[#0284C7]"></i>
                        <span>Persetujuan seketika mengubah visibilitas publik</span>
                    </div>
                </div>

                <!-- Output Verification Cards Container -->
                <div id="verifikasiListContainer" class="space-y-4">
                    <!-- Injected dynamically by JavaScript -->
                </div>

            </section>

            <!-- ============================================================== -->
            <!-- SECTION 3: UPLOAD & KELOLA MATERI PEMBINAAN                    -->
            <!-- ============================================================== -->
            <section id="sectionPembinaan" class="hidden space-y-6">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                    
                    <!-- Form Upload Materi Baru (lg:col-span-5) -->
                    <div class="lg:col-span-5 bps-card p-6 space-y-5">
                        <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                            <div class="w-10 h-10 rounded-xl bg-rose-100 text-[#9F1239] flex items-center justify-center text-xl">
                                📤
                            </div>
                            <div>
                                <h3 class="text-base font-extrabold text-slate-900">Unggah Materi Pembinaan Baru</h3>
                                <p class="text-xs text-slate-500">Materi ini otomatis dapat dilihat &amp; diunduh oleh 6 Desa</p>
                            </div>
                        </div>

                        <form id="formUploadMateri" onsubmit="handleUploadMateri(event)" class="space-y-4">
                            <!-- Dropzone File Upload Buku Pedoman / Template -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Unggah Berkas File Pedoman / Template <span class="text-rose-500">*</span></label>
                                
                                <input type="file" id="materiFileInput" accept=".pdf,.docx,.doc,.xlsx,.xls,.pptx,.zip" class="hidden" onchange="handleMateriFileSelected(this)">
                                
                                <div id="materiDropzone" onclick="document.getElementById('materiFileInput').click()" class="border-2 border-dashed border-[#BAE6FD] hover:border-[#0284C7] bg-[#F0F9FF]/50 hover:bg-[#E0F2FE]/40 rounded-2xl p-4 text-center cursor-pointer transition-all group">
                                    <div class="flex flex-col items-center justify-center space-y-1.5">
                                        <div class="w-10 h-10 rounded-xl bg-white border border-[#BAE6FD] text-[#0284C7] flex items-center justify-center text-xl shadow-xs group-hover:scale-105 transition-transform">
                                            <i class="bi bi-cloud-arrow-up-fill"></i>
                                        </div>
                                        <div class="text-xs font-bold text-slate-800">
                                            <span class="text-[#9F1239] font-extrabold">Klik untuk Pilih Berkas</span> atau seret file ke sini
                                        </div>
                                        <p class="text-[10px] text-slate-500">Mendukung format: PDF, Word (DOCX), Excel (XLSX), PPTX, atau ZIP (Maks. 50 MB)</p>
                                    </div>
                                </div>

                                <!-- File Selected Preview Box -->
                                <div id="materiFilePreviewBox" class="hidden mt-2 p-3 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center justify-between gap-3 text-xs">
                                    <div class="flex items-center gap-2.5 min-w-0">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center text-base shrink-0 font-bold" id="materiFileIconPreview">
                                            📄
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="font-extrabold text-slate-900 truncate" id="materiFileNamePreview">nama_dokumen.pdf</div>
                                            <div class="text-[10px] text-emerald-700 font-semibold" id="materiFileSizePreview">3.4 MB • Siap Diunggah</div>
                                        </div>
                                    </div>
                                    <button type="button" onclick="clearMateriFile()" class="p-1 rounded-lg text-slate-400 hover:text-rose-600 bg-white border border-slate-200 hover:border-rose-200 cursor-pointer" title="Hapus Berkas">
                                        <i class="bi bi-x-lg text-xs"></i>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Judul Dokumen / Pedoman <span class="text-rose-500">*</span></label>
                                <input type="text" id="materiJudul" required placeholder="Contoh: Pedoman Teknis Desa MADANI 2026" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#9F1239]/20 focus:border-[#9F1239]">
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Kategori <span class="text-rose-500">*</span></label>
                                    <select id="materiKategori" required class="w-full px-3 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#9F1239]/20">
                                        <option value="Pedoman Resmi">Pedoman Resmi</option>
                                        <option value="Template Publikasi">Template Publikasi (Buku/Profil)</option>
                                        <option value="Template Infografis">Template Infografis / Leaflet</option>
                                        <option value="Instrumen Evaluasi">Instrumen Pre/Post Test</option>
                                        <option value="Regulasi &amp; Kebijakan">Regulasi &amp; Kebijakan Statistik</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Penyusun / PIC <span class="text-rose-500">*</span></label>
                                    <input type="text" id="materiAuthor" required placeholder="Contoh: Hanifah (Tim Teknis BPS)" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#9F1239]/20">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Ukuran / Keterangan Berkas</label>
                                <input type="text" id="materiSize" placeholder="Otomatis terhitung dari berkas" value="3.2 MB (PDF)" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#9F1239]/20 bg-slate-50">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Ringkasan / Manfaat untuk Desa <span class="text-rose-500">*</span></label>
                                <textarea id="materiDesc" rows="3" required placeholder="Jelaskan secara singkat petunjuk dan kegunaan materi ini bagi operator desa..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#9F1239]/20"></textarea>
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-[#9F1239] to-[#BE123C] hover:from-[#881337] hover:to-[#9F1239] text-white font-extrabold text-xs shadow-md hover:shadow-lg transition-all cursor-pointer flex items-center justify-center gap-2">
                                    <i class="bi bi-cloud-arrow-up-fill text-sm"></i>
                                    <span>Unggah &amp; Publikasikan Berkas ke 6 Desa</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Daftar Materi Aktif yang Telah Diupload (lg:col-span-7) -->
                    <div class="lg:col-span-7 bps-card p-6 space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <div>
                                <h3 class="text-base font-extrabold text-slate-900">Materi &amp; Template Pembinaan Aktif</h3>
                                <p class="text-xs text-slate-500">Materi resmi yang saat ini dapat diakses oleh aparatur 6 desa</p>
                            </div>
                            <span id="activeMaterialsCountBadge" class="badge-ice text-xs font-bold px-3 py-1 rounded-full">5 Materi</span>
                        </div>

                        <div id="materiListContainer" class="space-y-3">
                            <!-- Injected by JavaScript -->
                        </div>
                    </div>

                </div>

            </section>

            <!-- ============================================================== -->
            <!-- SECTION 4: UPLOAD & KELOLA VIDEO MIKROLEARNING                 -->
            <!-- ============================================================== -->
            <section id="sectionVideo" class="hidden space-y-6">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                    
                    <!-- Form Upload Video Baru (lg:col-span-5) -->
                    <div class="lg:col-span-5 bps-card p-6 space-y-5">
                        <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                            <div class="w-10 h-10 rounded-xl bg-[#E0F2FE] text-[#0369A1] flex items-center justify-center text-xl">
                                🎬
                            </div>
                            <div>
                                <h3 class="text-base font-extrabold text-slate-900">Unggah Video Mikrolearning Baru</h3>
                                <p class="text-xs text-slate-500">Video edukasi statistik untuk dipelajari operator desa</p>
                            </div>
                        </div>

                        <form id="formUploadVideo" onsubmit="handleUploadVideo(event)" class="space-y-4">
                            
                            <!-- Pilihan Sumber Video: Upload File Fisik MP4 vs Tautkan Link Embed YouTube -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">Metode Unggah Video:</label>
                                <div class="grid grid-cols-2 gap-2 p-1 rounded-xl bg-[#F0F9FF] border border-[#BAE6FD]">
                                    <button type="button" onclick="switchVideoSourceMode('file')" id="btnVideoModeFile" class="py-2 px-3 rounded-lg text-xs font-extrabold transition-all bg-[#0284C7] text-white shadow-2xs">
                                        <i class="bi bi-upload mr-1"></i> Unggah File Video (MP4)
                                    </button>
                                    <button type="button" onclick="switchVideoSourceMode('url')" id="btnVideoModeUrl" class="py-2 px-3 rounded-lg text-xs font-bold text-slate-600 hover:text-[#0284C7] transition-all">
                                        <i class="bi bi-youtube mr-1"></i> Tautkan Link YouTube
                                    </button>
                                </div>
                            </div>

                            <!-- OPSI 1: Unggah File Video MP4 (Dropzone) -->
                            <div id="videoFileSection" class="space-y-2">
                                <input type="file" id="videoFileInput" accept="video/mp4,video/webm,video/ogg,video/quicktime" class="hidden" onchange="handleVideoFileSelected(this)">
                                
                                <div id="videoDropzone" onclick="document.getElementById('videoFileInput').click()" class="border-2 border-dashed border-[#BAE6FD] hover:border-[#0284C7] bg-[#F0F9FF]/50 hover:bg-[#E0F2FE]/40 rounded-2xl p-4 text-center cursor-pointer transition-all group">
                                    <div class="flex flex-col items-center justify-center space-y-1.5">
                                        <div class="w-10 h-10 rounded-xl bg-white border border-[#BAE6FD] text-[#0284C7] flex items-center justify-center text-xl shadow-xs group-hover:scale-105 transition-transform">
                                            <i class="bi bi-film"></i>
                                        </div>
                                        <div class="text-xs font-bold text-slate-800">
                                            <span class="text-[#0284C7] font-extrabold">Pilih Berkas Video MP4</span> atau seret video ke sini
                                        </div>
                                        <p class="text-[10px] text-slate-500">Mendukung format video: MP4, WebM, OGG (Maks. 200 MB)</p>
                                    </div>
                                </div>

                                <!-- Video File Preview Container -->
                                <div id="videoFilePreviewContainer" class="hidden p-3 rounded-xl bg-sky-50 border border-[#BAE6FD] space-y-2">
                                    <div class="flex items-center justify-between text-xs font-bold text-slate-900">
                                        <span class="truncate flex items-center gap-1.5">
                                            <i class="bi bi-check-circle-fill text-[#0284C7]"></i>
                                            <span id="videoFileNameDisplay">video.mp4</span>
                                        </span>
                                        <span class="text-[10px] text-slate-500" id="videoFileSizeDisplay">18.5 MB</span>
                                    </div>
                                    <div class="aspect-video rounded-lg overflow-hidden bg-slate-950 border border-slate-300">
                                        <video id="videoPreviewPlayer" class="w-full h-full object-contain" controls></video>
                                    </div>
                                </div>
                            </div>

                            <!-- OPSI 2: Link Embed YouTube (Hidden default jika mode file aktif) -->
                            <div id="videoUrlSection" class="hidden space-y-1">
                                <label class="block text-xs font-bold text-slate-700 mb-1">Tautan URL Video (YouTube Embed / Cloud MP4) <span class="text-rose-500">*</span></label>
                                <input type="text" id="videoUrl" placeholder="https://www.youtube.com/embed/..." value="https://www.youtube.com/embed/RXV4X0cOIA0" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0284C7]/20 focus:border-[#0284C7]">
                                <span class="text-[10px] text-slate-400 block">Contoh: https://www.youtube.com/embed/RXV4X0cOIA0</span>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Judul Video Mikrolearning <span class="text-rose-500">*</span></label>
                                <input type="text" id="videoJudul" required placeholder="Contoh: Mikrolearning 04: Pengolahan Data PODES" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0284C7]/20 focus:border-[#0284C7]">
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Instruktur / Mentor <span class="text-rose-500">*</span></label>
                                    <input type="text" id="videoCreator" required value="Devira &amp; Hakam (Instruktur BPS)" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0284C7]/20">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Durasi Video <span class="text-rose-500">*</span></label>
                                    <input type="text" id="videoDuration" required placeholder="Contoh: 10:45" value="10:00" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0284C7]/20">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Singkat Pembelajaran <span class="text-rose-500">*</span></label>
                                <textarea id="videoDesc" rows="3" required placeholder="Jelaskan pokok bahasan yang diajarkan dalam video ini..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0284C7]/20"></textarea>
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-[#0284C7] to-[#0369A1] hover:from-[#0369A1] hover:to-[#075985] text-white font-extrabold text-xs shadow-md hover:shadow-lg transition-all cursor-pointer flex items-center justify-center gap-2">
                                    <i class="bi bi-play-circle-fill text-sm"></i>
                                    <span>Unggah &amp; Publikasikan Video ke Portal Desa</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Koleksi Video Aktif (lg:col-span-7) -->
                    <div class="lg:col-span-7 bps-card p-6 space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <div>
                                <h3 class="text-base font-extrabold text-slate-900">Daftar Video Mikrolearning Aktif</h3>
                                <p class="text-xs text-slate-500">Video yang saat ini ditonton oleh 6 desa sebelum pengerjaan post-test</p>
                            </div>
                            <span id="activeVideosCountBadge" class="badge-rose text-xs font-bold px-3 py-1 rounded-full">3 Video</span>
                        </div>

                        <div id="videoListContainer" class="space-y-4">
                            <!-- Injected by JavaScript -->
                        </div>
                    </div>

                </div>

            </section>

        </main>

    </div>

    <!-- ============================================================== -->
    <!-- MODAL DIALOG KEMBALIKAN UNTUK REVISI (CATATAN DARI BPS)         -->
    <!-- ============================================================== -->
    <div id="modalRejectOutput" class="fixed inset-0 z-50 hidden bg-slate-950/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full overflow-hidden shadow-2xl border border-rose-300 animate-scaleUp">
            <div class="px-6 py-4 bg-gradient-to-r from-rose-50 via-white to-amber-50 border-b border-rose-200 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl bg-rose-100 text-[#9F1239] flex items-center justify-center font-bold text-lg">
                        ↩️
                    </div>
                    <div>
                        <h4 class="text-sm font-extrabold text-slate-900">Kembalikan Dokumen untuk Revisi</h4>
                        <p class="text-[11px] text-slate-500" id="rejectModalDesaTarget">Desa Binaan Kolaka Utara</p>
                    </div>
                </div>
                <button type="button" onclick="closeRejectModal()" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 flex items-center justify-center cursor-pointer">
                    <i class="bi bi-x-lg text-xs"></i>
                </button>
            </div>
            
            <form id="formRejectOutput" onsubmit="submitRejectOutput(event)" class="p-6 space-y-4 text-xs">
                <input type="hidden" id="rejectOutputId" value="">

                <div>
                    <span class="text-slate-500 block text-[11px]">Judul Dokumen:</span>
                    <strong class="text-slate-900 text-sm block" id="rejectDocTitle">-</strong>
                </div>

                <div>
                    <label class="block font-bold text-slate-700 mb-1">Catatan Koreksi / Alasan Perbaikan dari Pembina BPS <span class="text-rose-500">*</span></label>
                    <textarea id="rejectNotes" rows="4" required placeholder="Contoh: Harap lengkapi tabel prevalensi stunting per dusun dan format metadata indikator sesuai pedoman BPS..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-900 focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-600"></textarea>
                    <span class="text-[10.5px] text-slate-400 mt-1 block">Catatan ini akan langsung tampil di portal operator desa yang bersangkutan. Dokumen <strong>tidak akan dipublikasikan ke publik</strong> sampai desa mengirimkan perbaikan dan disetujui BPS.</span>
                </div>

                <div class="pt-2 flex justify-end gap-2">
                    <button type="button" onclick="closeRejectModal()" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold transition cursor-pointer">Batal</button>
                    <button type="submit" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-rose-700 to-rose-900 hover:from-rose-800 hover:to-rose-950 text-white font-bold shadow-sm hover:shadow-md transition cursor-pointer flex items-center gap-1.5">
                        <i class="bi bi-send-fill text-xs"></i>
                        <span>Kirim Catatan &amp; Kembalikan Dokumen</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL REVIEW LKE DESA -->
    <div id="modalReviewLke" class="fixed inset-0 z-50 hidden bg-slate-950/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-2xl w-full overflow-hidden shadow-2xl border border-[#BAE6FD] animate-scaleUp">
            <div class="px-6 py-4 bg-gradient-to-r from-sky-50 via-white to-rose-50 border-b border-[#BAE6FD] flex items-center justify-between">
                <div>
                    <h4 class="text-base font-extrabold text-slate-900" id="modalLkeTitle">Evaluasi LKE Desa</h4>
                    <p class="text-xs text-slate-500" id="modalLkeSubtitle">Pemeriksaan 44 Indikator Desa Cantik</p>
                </div>
                <button type="button" onclick="closeLkeModal()" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 flex items-center justify-center cursor-pointer">
                    <i class="bi bi-x-lg text-xs"></i>
                </button>
            </div>
            <div class="p-6 space-y-4 text-xs">
                <div class="grid grid-cols-3 gap-3">
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] text-slate-500 block">Skor LKE Mandiri</span>
                        <span class="text-lg font-black text-[#9F1239]" id="modalLkeScore">98%</span>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] text-slate-500 block">Status Kategori</span>
                        <span class="text-xs font-bold text-emerald-700" id="modalLkeCategory">Bahari Mandiri</span>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="text-[10px] text-slate-500 block">Verifikasi BPS</span>
                        <span class="text-xs font-bold text-[#0369A1]">Terverifikasi Lengkap</span>
                    </div>
                </div>
                <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 leading-relaxed" id="modalLkeNotes">
                    Seluruh 44 indikator telah terpenuhi. Dokumen bukti dukung SK Tim Agen Statistik Desa, buku monografi, dan website desa telah terverifikasi oleh BPS Kabupaten Kolaka Utara.
                </div>
                <div class="pt-2 flex justify-end gap-2">
                    <button type="button" onclick="closeLkeModal()" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 cursor-pointer">Tutup</button>
                    <button type="button" onclick="approveLkeAlert()" class="px-4 py-2 rounded-xl bg-emerald-600 text-white font-bold hover:bg-emerald-700 cursor-pointer">✓ Tandai Disetujui Penuh</button>
                </div>
            </div>
        </div>
    </div>

    <!-- TOAST NOTIFICATION -->
    <div id="bpsToast" class="fixed bottom-6 right-6 z-50 hidden px-5 py-3 rounded-2xl bg-slate-900 text-white text-xs font-bold shadow-2xl border border-slate-700 animate-bounce"></div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        let activeVerifikasiFilter = 'all';

        // Check Auth BPS on Load (WAJIB SANDI BPS)
        document.addEventListener('DOMContentLoaded', () => {
            const isAuthed = checkBpsAuthOnLoad();
            if (isAuthed) {
                renderMonitoringTable();
                renderVerifikasiOutputs();
                renderMaterialsList();
                renderVideosList();
            }
        });

        function checkBpsAuthOnLoad() {
            const auth = typeof getDescanAuth === 'function' ? getDescanAuth() : null;
            const gate = document.getElementById('bpsLoginGate');
            const ws = document.getElementById('bpsWorkspace');
            const statusBadge = document.getElementById('bpsHeaderSessionStatus');

            if (!auth || !auth.isBps) {
                // Sesi belum login atau bukan BPS: Kunci halaman dan tampilkan gate sandi!
                if (gate) gate.classList.remove('hidden');
                if (ws) ws.classList.add('hidden');
                if (statusBadge) {
                    statusBadge.innerHTML = '<span class="w-2 h-2 rounded-full bg-amber-500"></span><span class="text-xs font-bold text-amber-800">Menunggu Sandi BPS</span>';
                    statusBadge.className = 'hidden md:flex items-center gap-2.5 px-3 py-1.5 rounded-xl bg-amber-50 border border-amber-200';
                }
                return false;
            }

            // Sudah terautentikasi resmi BPS: Buka workspace monitoring
            if (gate) gate.classList.add('hidden');
            if (ws) ws.classList.remove('hidden');
            if (statusBadge) {
                statusBadge.innerHTML = '<span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span><span class="text-xs font-extrabold text-emerald-800">Sesi Admin BPS Aktif</span>';
                statusBadge.className = 'hidden md:flex items-center gap-2.5 px-3 py-1.5 rounded-xl bg-emerald-50 border border-emerald-200';
            }
            return true;
        }

        function handleBpsGateLogin(e) {
            e.preventDefault();
            const email = document.getElementById('gateInputBpsEmail').value.trim();
            const pass = document.getElementById('gateInputBpsPassword').value.trim();
            const errAlert = document.getElementById('bpsGateErrorAlert');
            const errText = document.getElementById('bpsGateErrorText');

            if (typeof validateDescanLogin !== 'function') {
                alert('Modul autentikasi belum siap.');
                return;
            }

            const res = validateDescanLogin(email, pass, 'bps');
            if (!res.success) {
                if (errAlert && errText) {
                    errText.textContent = res.message || 'Kata sandi Admin BPS salah. Silakan coba lagi.';
                    errAlert.classList.remove('hidden');
                }
                return;
            }

            setDescanAuth(res.account);
            if (errAlert) errAlert.classList.add('hidden');
            showBpsToast('✓ Berhasil masuk sebagai Admin BPS! Membuka portal...');
            setTimeout(() => {
                checkBpsAuthOnLoad();
                renderMonitoringTable();
                renderVerifikasiOutputs();
                renderMaterialsList();
                renderVideosList();
            }, 300);
        }

        function autofillBpsGate() {
            const pass = document.getElementById('gateInputBpsPassword');
            if (pass && typeof DESCAN_ACCOUNTS !== 'undefined' && DESCAN_ACCOUNTS.bps) {
                pass.value = DESCAN_ACCOUNTS.bps.password;
                showBpsToast('✓ Sandi resmi Admin BPS terisi otomatis!');
            }
        }

        function toggleBpsPasswordVisibility(fieldId) {
            const inp = document.getElementById(fieldId);
            const icon = document.getElementById('gateBpsEyeIcon');
            if (inp) {
                if (inp.type === 'password') {
                    inp.type = 'text';
                    if (icon) icon.className = 'bi bi-eye-slash';
                } else {
                    inp.type = 'password';
                    if (icon) icon.className = 'bi bi-eye';
                }
            }
        }

        // Mobile Sidebar Toggle
        function toggleSidebar(forceState) {
            const sidebar = document.getElementById('bpsSidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            if (!sidebar || !backdrop) return;

            const isOpen = !sidebar.classList.contains('-translate-x-full');
            const targetState = typeof forceState === 'boolean' ? forceState : !isOpen;

            if (targetState) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            }
        }

        function logoutAdminBps() {
            clearDescanAuth();
            showBpsToast('✓ Berhasil keluar dari akun Admin BPS');
            setTimeout(() => {
                checkBpsAuthOnLoad();
                const pass = document.getElementById('gateInputBpsPassword');
                if (pass) pass.value = '';
            }, 400);
        }

        // Tab Navigation via Sidebar
        function switchBpsTab(tab) {
            const secMonitoring = document.getElementById('sectionMonitoring');
            const secVerifikasi = document.getElementById('sectionVerifikasi');
            const secPembinaan = document.getElementById('sectionPembinaan');
            const secVideo = document.getElementById('sectionVideo');

            const sideMonitoring = document.getElementById('sideNavMonitoring');
            const sideVerifikasi = document.getElementById('sideNavVerifikasi');
            const sidePembinaan = document.getElementById('sideNavPembinaan');
            const sideVideo = document.getElementById('sideNavVideo');

            const labelEl = document.getElementById('activeSectionLabel');

            secMonitoring.classList.add('hidden');
            secVerifikasi.classList.add('hidden');
            secPembinaan.classList.add('hidden');
            secVideo.classList.add('hidden');

            [sideMonitoring, sideVerifikasi, sidePembinaan, sideVideo].forEach(el => {
                if (el) el.classList.remove('active');
            });

            if (tab === 'monitoring') {
                secMonitoring.classList.remove('hidden');
                if (sideMonitoring) sideMonitoring.classList.add('active');
                if (labelEl) labelEl.textContent = '1. Live Monitoring 6 Desa';
            } else if (tab === 'verifikasi') {
                secVerifikasi.classList.remove('hidden');
                if (sideVerifikasi) sideVerifikasi.classList.add('active');
                if (labelEl) labelEl.textContent = '2. Verifikasi & Moderasi Output Desa';
                renderVerifikasiOutputs();
            } else if (tab === 'pembinaan') {
                secPembinaan.classList.remove('hidden');
                if (sidePembinaan) sidePembinaan.classList.add('active');
                if (labelEl) labelEl.textContent = '3. Upload Pembinaan (Pedoman & Template)';
                renderMaterialsList();
            } else if (tab === 'video') {
                secVideo.classList.remove('hidden');
                if (sideVideo) sideVideo.classList.add('active');
                if (labelEl) labelEl.textContent = '4. Upload Video Edukasi Mikrolearning';
                renderVideosList();
            }

            if (window.innerWidth < 1024) {
                toggleSidebar(false);
            }
        }

        // ==========================================
        // SECTION 2: VERIFIKASI & PERSETUJUAN LOGIC
        // ==========================================
        function filterVerifikasiList(filter) {
            activeVerifikasiFilter = filter;
            ['all', 'pending', 'revision', 'approved'].forEach(k => {
                const btn = document.getElementById('pillVerif' + k.charAt(0).toUpperCase() + k.slice(1));
                if (btn) {
                    if (k === filter) {
                        btn.className = 'filter-pill active';
                    } else {
                        btn.className = 'filter-pill';
                    }
                }
            });
            renderVerifikasiOutputs();
        }

        function renderVerifikasiOutputs() {
            const container = document.getElementById('verifikasiListContainer');
            if (!container) return;

            const allOutputs = (typeof getVillageOutputs === 'function') ? getVillageOutputs() : [];
            
            // Counts
            const cntPending = allOutputs.filter(o => (o.status || '').toLowerCase().includes('menunggu')).length;
            const cntRevision = allOutputs.filter(o => (o.status || '').toLowerCase().includes('revisi') || (o.status || '').toLowerCase().includes('kembali')).length;
            const cntApproved = allOutputs.filter(o => (o.status || '').toLowerCase().includes('terverifikasi') || (o.status || '').toLowerCase().includes('setujui')).length;

            // Update badges
            const bPending = document.getElementById('cntPendingOutputs');
            const bApproved = document.getElementById('cntApprovedOutputs');
            const sidePending = document.getElementById('sideBadgePendingOutputs');
            
            const pillAll = document.getElementById('cntPillAll');
            const pillPending = document.getElementById('cntPillPending');
            const pillRevision = document.getElementById('cntPillRevision');
            const pillApproved = document.getElementById('cntPillApproved');

            if (bPending) bPending.textContent = `${cntPending} Dokumen`;
            if (bApproved) bApproved.textContent = `${cntApproved} Dokumen`;
            if (sidePending) sidePending.textContent = `${cntPending} Menunggu`;

            if (pillAll) pillAll.textContent = allOutputs.length;
            if (pillPending) pillPending.textContent = cntPending;
            if (pillRevision) pillRevision.textContent = cntRevision;
            if (pillApproved) pillApproved.textContent = cntApproved;

            // Filter
            const filtered = allOutputs.filter(item => {
                const s = (item.status || '').toLowerCase();
                if (activeVerifikasiFilter === 'pending') {
                    return s.includes('menunggu');
                } else if (activeVerifikasiFilter === 'revision') {
                    return s.includes('revisi') || s.includes('kembali');
                } else if (activeVerifikasiFilter === 'approved') {
                    return s.includes('terverifikasi') || s.includes('setujui');
                }
                return true;
            });

            if (filtered.length === 0) {
                container.innerHTML = `
                    <div class="bps-card p-10 text-center space-y-2">
                        <span class="text-3xl block">📭</span>
                        <h4 class="text-sm font-extrabold text-slate-800">Tidak ada dokumen pada kategori ini</h4>
                        <p class="text-xs text-slate-500">Seluruh dokumen telah ditinjau atau belum ada pengajuan baru.</p>
                    </div>
                `;
                return;
            }

            container.innerHTML = filtered.map(item => {
                const s = (item.status || '').toLowerCase();
                const isPending = s.includes('menunggu');
                const isRevision = s.includes('revisi') || s.includes('kembali');
                const isApproved = s.includes('terverifikasi') || s.includes('setujui');

                let badgeHtml = '';
                let borderClass = 'border-[#BAE6FD]';
                let bgHeader = 'bg-slate-50';

                if (isPending) {
                    badgeHtml = '<span class="badge-amber text-[10px] font-black px-2.5 py-1 rounded-full flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span> Menunggu Verifikasi BPS</span>';
                    borderClass = 'border-amber-300';
                    bgHeader = 'bg-amber-50/50';
                } else if (isRevision) {
                    badgeHtml = '<span class="badge-rose text-[10px] font-black px-2.5 py-1 rounded-full flex items-center gap-1"><i class="bi bi-arrow-return-left"></i> Dikembalikan untuk Revisi</span>';
                    borderClass = 'border-rose-300';
                    bgHeader = 'bg-rose-50/50';
                } else {
                    badgeHtml = '<span class="badge-emerald text-[10px] font-black px-2.5 py-1 rounded-full flex items-center gap-1"><i class="bi bi-check-circle-fill"></i> Terbit di Publik</span>';
                    borderClass = 'border-emerald-200';
                    bgHeader = 'bg-emerald-50/40';
                }

                return `
                    <div class="bps-card p-5 border-2 ${borderClass} space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-slate-100">
                            <div class="flex items-center gap-2.5 flex-wrap">
                                <span class="text-[10px] font-black uppercase text-[#0369A1] bg-[#E0F2FE] border border-[#BAE6FD] px-2.5 py-0.5 rounded-md">
                                    ${item.category}
                                </span>
                                <span class="text-xs font-black text-slate-900">
                                    🏡 ${item.desaName} (${item.kecamatan || 'Kolaka Utara'})
                                </span>
                                <span class="text-[11px] text-slate-400 font-medium">
                                    • Diajukan: ${item.date || 'Feb 2026'}
                                </span>
                            </div>
                            <div>
                                ${badgeHtml}
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm sm:text-base font-black text-slate-900 leading-snug">
                                ${item.title}
                            </h3>
                            <p class="text-xs text-slate-600 mt-1.5 leading-relaxed font-medium">
                                ${item.summary || 'Dokumen luaran pembinaan statistik sektoral desa binaan.'}
                            </p>
                        </div>

                        ${isRevision && item.bpsNotes ? `
                            <div class="p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-900 space-y-1">
                                <div class="font-extrabold flex items-center gap-1.5 text-[#9F1239]">
                                    <i class="bi bi-exclamation-octagon-fill"></i>
                                    <span>Catatan Koreksi dari Pembina BPS (Dokumen Belum Tayang di Publik):</span>
                                </div>
                                <p class="text-xs leading-relaxed pl-5 font-semibold text-rose-800">
                                    "${item.bpsNotes}"
                                </p>
                            </div>
                        ` : ''}

                        ${isApproved ? `
                            <div class="p-2.5 rounded-xl bg-emerald-50/70 border border-emerald-200 text-[11px] text-emerald-800 flex items-center justify-between gap-2">
                                <span class="flex items-center gap-1.5 font-bold">
                                    <i class="bi bi-shield-check text-emerald-600"></i>
                                    <span>Dokumen ini telah memenuhi standar SDI &amp; dapat diakses oleh masyarakat umum di halaman publik Desa Cantik.</span>
                                </span>
                                <a href="/descan/output" target="_blank" class="font-extrabold text-[#0284C7] hover:underline shrink-0">
                                    Buka di Dashboard Publik →
                                </a>
                            </div>
                        ` : ''}

                        <!-- Action Control Buttons for BPS -->
                        <div class="pt-2 flex flex-wrap items-center justify-between gap-3">
                            <div class="flex items-center gap-2">
                                <a href="${item.downloadUrl || '#'}" download class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-file-earmark-arrow-down"></i>
                                    <span>Unduh Berkas (${item.size || '2 MB'})</span>
                                </a>
                            </div>

                            <div class="flex items-center gap-2">
                                <!-- Tombol Kembalikan untuk Revisi -->
                                <button type="button" onclick="openRejectDialog('${item.id}', '${item.title.replace(/'/g, "\'")}', '${item.desaName.replace(/'/g, "\'")}')" class="px-3.5 py-2 rounded-xl bg-rose-50 hover:bg-rose-100 text-[#9F1239] border border-rose-200 text-xs font-extrabold transition flex items-center gap-1.5 cursor-pointer shadow-2xs">
                                    <i class="bi bi-arrow-return-left"></i>
                                    <span>${isRevision ? 'Ubah Catatan Revisi' : 'Kembalikan untuk Revisi'}</span>
                                </button>

                                <!-- Tombol Setujui & Publikasikan -->
                                <button type="button" onclick="handleApproveOutput('${item.id}')" class="px-4 py-2 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white text-xs font-black transition flex items-center gap-1.5 cursor-pointer shadow-sm hover:shadow-md">
                                    <i class="bi bi-check2-circle text-sm"></i>
                                    <span>${isApproved ? '✓ Disetujui (Terbit di Publik)' : '✓ Setujui & Publikasikan ke Publik'}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function handleApproveOutput(id) {
            if (!confirm('Apakah dokumen ini telah sesuai standar statistik dan siap dipublikasikan ke Dashboard Publik Desa Cantik?')) return;
            const res = approveVillageOutput(id, 'Tim Pembina BPS Kolut');
            if (res.success) {
                renderVerifikasiOutputs();
                renderMonitoringTable();
                showBpsToast(`✓ Dokumen "${res.item.title}" disetujui & otomatis tampil di publik!`);
            } else {
                alert(res.message);
            }
        }

        function openRejectDialog(id, title, desaName) {
            document.getElementById('rejectOutputId').value = id;
            document.getElementById('rejectDocTitle').textContent = title;
            document.getElementById('rejectModalDesaTarget').textContent = `${desaName} • BPS Kolaka Utara`;
            
            // Check existing notes
            const all = getVillageOutputs();
            const found = all.find(o => o.id === id);
            document.getElementById('rejectNotes').value = (found && found.bpsNotes) ? found.bpsNotes : '';

            document.getElementById('modalRejectOutput').classList.remove('hidden');
        }

        function closeRejectModal() {
            document.getElementById('modalRejectOutput').classList.add('hidden');
        }

        function submitRejectOutput(e) {
            e.preventDefault();
            const id = document.getElementById('rejectOutputId').value;
            const notes = document.getElementById('rejectNotes').value.trim();

            if (!notes) {
                alert('Catatan koreksi / alasan perbaikan wajib diisi agar operator desa mengetahui bagian mana yang perlu diperbaiki.');
                return;
            }

            const res = rejectVillageOutput(id, notes, 'Tim Pembina BPS Kolut');
            if (res.success) {
                closeRejectModal();
                renderVerifikasiOutputs();
                renderMonitoringTable();
                showBpsToast(`↩️ Dokumen dikembalikan ke ${res.item.desaName} dengan catatan revisi.`);
            } else {
                alert(res.message);
            }
        }

        // ==========================================
        // SECTION 1: MONITORING TABLE LOGIC
        // ==========================================
        const VILLAGES_DATA = [
            { key: 'kamisi', name: 'Desa Kamisi', kec: 'Kodeoha', score: '98%', cat: 'Bahari Mandiri', output: '2 Terbit', status: 'Terverifikasi' },
            { key: 'koroha', name: 'Desa Koroha', kec: 'Kodeoha', score: '72%', cat: 'Maritim Mandiri', output: '1 Terbit, 1 Pending', status: 'Verifikasi Sebagian' },
            { key: 'malamala', name: 'Kelurahan Mala-Mala', kec: 'Kodeoha', score: '93%', cat: 'Perkotaan Mandiri', output: '1 Terbit', status: 'Terverifikasi' },
            { key: 'lapolu', name: 'Desa Lapolu', kec: 'Tiwu', score: '88%', cat: 'Agro Mandiri', output: '1 Terbit', status: 'Terverifikasi' },
            { key: 'tanggeawo', name: 'Desa Tanggeawo', kec: 'Tiwu', score: '84%', cat: 'Agrikultur Mandiri', output: '1 Terbit, 1 Revisi', status: 'Perlu Revisi' },
            { key: 'mattirobulu', name: 'Desa Mattiro Bulu', kec: 'Tiwu', score: '79%', cat: 'Terbina Aktif', output: '1 Terbit', status: 'Terverifikasi' }
        ];

        function renderMonitoringTable(filterKec = 'all') {
            const tbody = document.getElementById('monitoringTableBody');
            if (!tbody) return;

            const filtered = filterKec === 'all' 
                ? VILLAGES_DATA 
                : VILLAGES_DATA.filter(v => v.kec.toLowerCase() === filterKec.toLowerCase());

            tbody.innerHTML = filtered.map((v, idx) => `
                <tr class="hover:bg-sky-50/40 transition">
                    <td class="py-3.5 px-4 font-black text-slate-900">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-rose-50 text-[#9F1239] border border-rose-200 flex items-center justify-center text-[10px] font-black">${idx + 1}</span>
                            <span>${v.name}</span>
                        </div>
                    </td>
                    <td class="py-3.5 px-4 text-slate-600 font-medium">Kec. ${v.kec}</td>
                    <td class="py-3.5 px-4">
                        <div class="flex items-center gap-2">
                            <span class="font-extrabold text-[#9F1239]">${v.score}</span>
                            <div class="w-16 h-2 rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-[#BE123C] to-[#9F1239]" style="width: ${v.score}"></div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3.5 px-4">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold bg-[#E0F2FE] text-[#0369A1] border border-[#BAE6FD]">
                            ${v.cat}
                        </span>
                    </td>
                    <td class="py-3.5 px-4 text-slate-700 font-bold">${v.output}</td>
                    <td class="py-3.5 px-4">
                        <span class="inline-flex items-center gap-1 text-[11px] font-bold ${v.status.includes('Revisi') ? 'text-rose-700' : (v.status.includes('Sebagian') ? 'text-amber-700' : 'text-emerald-700')}">
                            <i class="bi ${v.status.includes('Revisi') ? 'bi-exclamation-circle-fill text-rose-500' : (v.status.includes('Sebagian') ? 'bi-hourglass-split text-amber-500' : 'bi-patch-check-fill text-emerald-500')}"></i> 
                            ${v.status}
                        </span>
                    </td>
                    <td class="py-3.5 px-4 text-center">
                        <div class="inline-flex items-center gap-1.5">
                            <button type="button" onclick="switchBpsTab('verifikasi')" class="px-2.5 py-1 rounded-lg bg-sky-50 hover:bg-sky-100 text-[#0284C7] font-bold text-[11px] border border-[#BAE6FD] transition cursor-pointer" title="Periksa berkas pengajuan desa">
                                Verifikasi Output
                            </button>
                            <button type="button" onclick="openReviewModal('${v.key}')" class="px-2.5 py-1 rounded-lg bg-slate-50 hover:bg-slate-100 text-slate-700 font-bold text-[11px] border border-slate-200 transition cursor-pointer">
                                LKE
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function filterMonitoringTable() {
            const val = document.getElementById('filterKecamatanBps').value;
            renderMonitoringTable(val);
        }

        function openReviewModal(key) {
            const v = VILLAGES_DATA.find(item => item.key === key);
            if (!v) return;
            document.getElementById('modalLkeTitle').textContent = `Evaluasi LKE: ${v.name}`;
            document.getElementById('modalLkeSubtitle').textContent = `Kecamatan ${v.kec} • Skor Pemenuhan 44 Indikator`;
            document.getElementById('modalLkeScore').textContent = v.score;
            document.getElementById('modalLkeCategory').textContent = v.cat;
            document.getElementById('modalReviewLke').classList.remove('hidden');
        }

        function closeLkeModal() {
            document.getElementById('modalReviewLke').classList.add('hidden');
        }

        function approveLkeAlert() {
            closeLkeModal();
            showBpsToast('✓ Dokumen & LKE desa telah ditandai Disetujui Penuh oleh BPS!');
        }

        // ==========================================
        // SECTION 3: MATERI PEMBINAAN LOGIC
        // ==========================================
        function renderMaterialsList() {
            const container = document.getElementById('materiListContainer');
            if (!container) return;

            const materials = getBpsMaterials();
            const badge = document.getElementById('activeMaterialsCountBadge');
            const sideBadge = document.getElementById('sideBadgeMaterials');
            
            if (badge) badge.textContent = `${materials.length} Modul`;
            if (sideBadge) sideBadge.textContent = `${materials.length} Modul`;

            if (materials.length === 0) {
                container.innerHTML = '<p class="text-xs text-slate-400 py-4 text-center">Belum ada materi pembinaan yang diunggah.</p>';
                return;
            }

            container.innerHTML = materials.map(m => `
                <div class="p-4 rounded-2xl bg-white border border-[#BAE6FD] hover:border-[#0284C7] shadow-2xs hover:shadow-xs transition flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-[#E0F2FE] text-[#0369A1] flex items-center justify-center text-lg font-bold shrink-0">
                            ${m.kategori.includes('Template') ? '📑' : '📘'}
                        </div>
                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="text-[10px] font-black text-[#9F1239] bg-rose-50 px-2 py-0.5 rounded border border-rose-100">${m.kategori}</span>
                                <span class="text-[11px] text-slate-400 font-medium">${m.date || 'Feb 2026'} • ${m.fileSize || '3 MB'}</span>
                            </div>
                            <h4 class="text-xs font-black text-slate-900 mt-1">${m.title}</h4>
                            <p class="text-[11px] text-slate-500 mt-0.5 leading-relaxed">${m.description || ''}</p>
                            <span class="text-[10px] font-bold text-slate-600 mt-1 block">PIC / Penulis: <strong class="text-slate-800">${m.author || 'Tim BPS'}</strong></span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0 self-end sm:self-center">
                        <a href="${m.downloadUrl || '#'}" download class="px-3 py-1.5 rounded-xl bg-sky-50 hover:bg-sky-100 text-[#0284C7] font-bold text-xs border border-[#BAE6FD] transition flex items-center gap-1 cursor-pointer">
                            <i class="bi bi-download"></i> Unduh
                        </a>
                        <button type="button" onclick="deleteMaterial('${m.id}')" class="px-2 py-1.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-[#9F1239] font-bold text-xs border border-rose-200 transition cursor-pointer" title="Hapus materi">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            `).join('');
        }

        let uploadedMateriFileDataUrl = null;
        let uploadedMateriFileName = null;

        function handleMateriFileSelected(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                uploadedMateriFileName = file.name;
                
                // Format file size
                const sizeInMb = (file.size / (1024 * 1024)).toFixed(1);
                const sizeFormatted = `${sizeInMb} MB (${file.name.split('.').pop().toUpperCase()})`;
                
                document.getElementById('materiSize').value = sizeFormatted;
                
                // Auto-fill title if empty
                const judulInp = document.getElementById('materiJudul');
                if (judulInp && !judulInp.value) {
                    const cleanName = file.name.replace(/\.[^/.]+$/, "").replace(/[-_]/g, " ");
                    judulInp.value = cleanName.charAt(0).toUpperCase() + cleanName.slice(1);
                }

                // Show preview box
                document.getElementById('materiFileNamePreview').textContent = file.name;
                document.getElementById('materiFileSizePreview').textContent = `${sizeFormatted} • Berkas siap diunggah`;
                document.getElementById('materiFilePreviewBox').classList.remove('hidden');

                // Read file as Data URL
                const reader = new FileReader();
                reader.onload = function(e) {
                    uploadedMateriFileDataUrl = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        function clearMateriFile() {
            uploadedMateriFileDataUrl = null;
            uploadedMateriFileName = null;
            const input = document.getElementById('materiFileInput');
            if (input) input.value = '';
            document.getElementById('materiFilePreviewBox').classList.add('hidden');
        }

        function handleUploadMateri(e) {
            e.preventDefault();
            const judul = document.getElementById('materiJudul').value.trim();
            const kategori = document.getElementById('materiKategori').value;
            const author = document.getElementById('materiAuthor').value.trim();
            const size = document.getElementById('materiSize').value.trim() || '3.2 MB (PDF)';
            const desc = document.getElementById('materiDesc').value.trim();

            if (!judul || !author) return;

            const materials = getBpsMaterials();
            const newMateri = {
                id: 'mat-' + Date.now(),
                title: judul,
                kategori: kategori,
                author: author,
                fileSize: size,
                fileName: uploadedMateriFileName || (judul + '.pdf'),
                date: new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' }),
                downloadUrl: uploadedMateriFileDataUrl || '/data/pedoman_desa_madani_2026.pdf',
                description: desc
            };

            materials.unshift(newMateri);
            saveBpsMaterials(materials);

            document.getElementById('formUploadMateri').reset();
            clearMateriFile();
            renderMaterialsList();
            showBpsToast('✓ Berhasil mengunggah berkas pedoman pembinaan ke seluruh desa!');
        }

        function deleteMaterial(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus materi pembinaan ini?')) return;
            let materials = getBpsMaterials();
            materials = materials.filter(m => m.id !== id);
            saveBpsMaterials(materials);
            renderMaterialsList();
            showBpsToast('Materi pembinaan telah dihapus.');
        }

        // ==========================================
        // SECTION 4: VIDEO MIKROLEARNING LOGIC
        // ==========================================
        function renderVideosList() {
            const container = document.getElementById('videoListContainer');
            if (!container) return;

            const videos = getBpsVideos();
            const badge = document.getElementById('activeVideosCountBadge');
            const sideBadge = document.getElementById('sideBadgeVideos');
            
            if (badge) badge.textContent = `${videos.length} Video`;
            if (sideBadge) sideBadge.textContent = `${videos.length} Video`;

            if (videos.length === 0) {
                container.innerHTML = '<p class="text-xs text-slate-400 py-4 text-center">Belum ada video mikrolearning yang diunggah.</p>';
                return;
            }

            container.innerHTML = videos.map(v => `
                <div class="p-4 rounded-2xl bg-white border border-[#BAE6FD] hover:border-[#0284C7] shadow-2xs hover:shadow-xs transition space-y-3">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-xl bg-rose-100 text-[#9F1239] flex items-center justify-center text-xl shrink-0">
                                ▶
                            </div>
                            <div>
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="text-[10px] font-black text-[#0369A1] bg-[#E0F2FE] px-2 py-0.5 rounded">Durasi: ${v.duration || '10 Menit'}</span>
                                    <span class="text-[11px] text-slate-400 font-medium">${v.date || 'Feb 2026'}</span>
                                </div>
                                <h4 class="text-xs font-black text-slate-900 mt-1">${v.title}</h4>
                                <p class="text-[11px] text-slate-500 mt-0.5 leading-relaxed">${v.description || ''}</p>
                                <span class="text-[10px] font-bold text-slate-600 mt-1 block">Instruktur: <strong class="text-slate-800">${v.creator || 'Devira & Hakam'}</strong></span>
                            </div>
                        </div>
                        <button type="button" onclick="deleteVideo('${v.id}')" class="px-2 py-1.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-[#9F1239] font-bold text-xs border border-rose-200 transition cursor-pointer" title="Hapus video">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>

                    <!-- Video Preview Embed / Native Player -->
                    <div class="relative w-full aspect-video rounded-xl overflow-hidden bg-slate-900 border border-slate-200">
                        ${v.isUploaded || (v.url && (v.url.startsWith('blob:') || v.url.startsWith('data:') || v.url.endsWith('.mp4')))
                            ? `<video class="w-full h-full object-contain" controls src="${v.url}"></video>`
                            : `<iframe class="w-full h-full" src="${v.url}" title="${v.title}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`}
                    </div>
                </div>
            `).join('');
        }

        let activeVideoSourceMode = 'file'; // 'file' or 'url'
        let uploadedVideoObjectUrl = null;
        let uploadedVideoFileName = null;

        function switchVideoSourceMode(mode) {
            activeVideoSourceMode = mode;
            const btnFile = document.getElementById('btnVideoModeFile');
            const btnUrl = document.getElementById('btnVideoModeUrl');
            const secFile = document.getElementById('videoFileSection');
            const secUrl = document.getElementById('videoUrlSection');

            if (mode === 'file') {
                btnFile.className = 'py-2 px-3 rounded-lg text-xs font-extrabold transition-all bg-[#0284C7] text-white shadow-2xs';
                btnUrl.className = 'py-2 px-3 rounded-lg text-xs font-bold text-slate-600 hover:text-[#0284C7] transition-all';
                secFile.classList.remove('hidden');
                secUrl.classList.add('hidden');
            } else {
                btnUrl.className = 'py-2 px-3 rounded-lg text-xs font-extrabold transition-all bg-[#0284C7] text-white shadow-2xs';
                btnFile.className = 'py-2 px-3 rounded-lg text-xs font-bold text-slate-600 hover:text-[#0284C7] transition-all';
                secUrl.classList.remove('hidden');
                secFile.classList.add('hidden');
            }
        }

        function handleVideoFileSelected(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                uploadedVideoFileName = file.name;
                uploadedVideoObjectUrl = URL.createObjectURL(file);

                const sizeInMb = (file.size / (1024 * 1024)).toFixed(1);
                document.getElementById('videoFileNameDisplay').textContent = file.name;
                document.getElementById('videoFileSizeDisplay').textContent = `${sizeInMb} MB`;

                const player = document.getElementById('videoPreviewPlayer');
                if (player) {
                    player.src = uploadedVideoObjectUrl;
                    player.onloadedmetadata = function() {
                        const mins = Math.floor(player.duration / 60);
                        const secs = Math.floor(player.duration % 60);
                        const durStr = `${mins}:${secs < 10 ? '0' : ''}${secs}`;
                        const durInp = document.getElementById('videoDuration');
                        if (durInp) durInp.value = durStr;
                    };
                }

                const judulInp = document.getElementById('videoJudul');
                if (judulInp && !judulInp.value) {
                    const cleanName = file.name.replace(/\.[^/.]+$/, "").replace(/[-_]/g, " ");
                    judulInp.value = cleanName.charAt(0).toUpperCase() + cleanName.slice(1);
                }

                document.getElementById('videoFilePreviewContainer').classList.remove('hidden');
            }
        }

        function handleUploadVideo(e) {
            e.preventDefault();
            const judul = document.getElementById('videoJudul').value.trim();
            const creator = document.getElementById('videoCreator').value.trim();
            const duration = document.getElementById('videoDuration').value.trim() || '10:00';
            const desc = document.getElementById('videoDesc').value.trim();

            let finalVideoUrl = '';
            let isFile = false;

            if (activeVideoSourceMode === 'file') {
                if (!uploadedVideoObjectUrl) {
                    alert('Harap pilih berkas video MP4 yang akan diunggah.');
                    return;
                }
                finalVideoUrl = uploadedVideoObjectUrl;
                isFile = true;
            } else {
                finalVideoUrl = document.getElementById('videoUrl').value.trim();
                if (!finalVideoUrl) {
                    alert('Harap masukkan tautan URL video YouTube.');
                    return;
                }
            }

            if (!judul) return;

            const videos = getBpsVideos();
            const newVideo = {
                id: 'vid-' + Date.now(),
                title: judul,
                creator: creator || 'Devira & Hakam (Instruktur BPS)',
                duration: duration,
                url: finalVideoUrl,
                isUploaded: isFile,
                fileName: uploadedVideoFileName,
                date: new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' }),
                description: desc
            };

            videos.unshift(newVideo);
            saveBpsVideos(videos);

            document.getElementById('formUploadVideo').reset();
            document.getElementById('videoFilePreviewContainer').classList.add('hidden');
            uploadedVideoObjectUrl = null;
            uploadedVideoFileName = null;

            renderVideosList();
            showBpsToast('✓ Berhasil mengunggah berkas video mikrolearning ke portal desa!');
        }

        function deleteVideo(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus video mikrolearning ini?')) return;
            let videos = getBpsVideos();
            videos = videos.filter(v => v.id !== id);
            saveBpsVideos(videos);
            renderVideosList();
            showBpsToast('Video mikrolearning telah dihapus.');
        }

        function showBpsToast(msg) {
            const toast = document.getElementById('bpsToast');
            if (toast) {
                toast.textContent = msg;
                toast.classList.remove('hidden');
                setTimeout(() => toast.classList.add('hidden'), 3500);
            }
        }
    </script>
</body>
</html>
