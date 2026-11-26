<!-- ===== SIDEBAR DESCAN DENGAN NAVIGASI DROPDOWN ACCORDION MODERN ===== -->
<div id="dcBackdrop" onclick="toggleDcSidebar()" class="hidden fixed inset-0 bg-black/40 backdrop-blur-2xs z-40 lg:hidden"></div>
<aside id="dcSidebar">
    <!-- 1. Header Sidebar: Penempatan Logo BPS, Pemkab Kolut & Logo Descan + Tombol Tutup Sidebar -->
    <div class="px-3.5 py-3.5 flex items-center justify-between border-b border-[#DCE3DD] bg-gradient-to-r from-emerald-50/60 via-white to-[#F8FAF8] relative shrink-0">
        <div class="flex items-center gap-2 bg-white/95 px-2.5 py-1.5 rounded-2xl border border-[#DCE3DD] shadow-2xs shrink-0 ring-1 ring-slate-900/5">
            <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-7 w-auto object-contain" title="Pemerintah Kabupaten Kolaka Utara">
            <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-7 w-auto object-contain" title="Badan Pusat Statistik Kolaka Utara">
            <div class="h-5 w-[1px] bg-[#DCE3DD]"></div>
            <img src="/logo-descan.png" alt="Desa Cantik" class="h-7 w-auto object-contain" title="Desa Cantik - Desa Cinta Statistik">
        </div>
        
        <!-- Tombol Tutup/Sembunyikan Sidebar (<) -->
        <button type="button" onclick="toggleDcSidebar()" id="btnSidebarClose" 
            class="w-7 h-7 rounded-xl border border-[#DCE3DD] hover:border-[#3B4D3B] bg-white hover:bg-emerald-50 text-slate-400 hover:text-[#3B4D3B] flex items-center justify-center transition shadow-2xs active:scale-95 cursor-pointer shrink-0 ml-1" 
            title="Tutup / Sembunyikan Sidebar">
            <i class="bi bi-chevron-left text-xs font-black"></i>
        </button>
    </div>

    <!-- 2. Daftar Menu Navigasi Sidebar (Modern Flow UI Dropdown Accordion) -->
    <div id="topNavMenuLinks" class="flex-1 overflow-y-auto px-2.5 py-2 space-y-1.5 no-scrollbar">

        <!-- ============================================================== -->
        <!-- GRUP 1: MENU UTAMA (DROPDOWN ACCORDION)                        -->
        <!-- ============================================================== -->
        <div class="sidebar-accordion-group">
            <button type="button" onclick="toggleDcGroup('utama')" id="dcGroupBtn-utama" class="sidebar-group-btn open">
                <span class="flex items-center gap-2 min-w-0">
                    <span class="w-2 h-2 rounded-full bg-[#3B4D3B] shrink-0"></span>
                    <span class="truncate">Menu Utama</span>
                </span>
                <div class="flex items-center gap-1.5 shrink-0">
                    <span class="text-[9px] font-bold text-[#2D3B2D] bg-[#E6ECE6] border border-[#CBD5C8] px-1.5 py-0.5 rounded">3</span>
                    <i class="bi bi-chevron-down group-chevron text-[#3B4D3B]" id="dcChevron-utama"></i>
                </div>
            </button>
            <div id="dcSubmenu-utama" class="sidebar-submenu-container mt-1 pl-1 space-y-0.5">
                <button type="button" onclick="switchNavMenu('dashboard')" id="nav-dashboard" class="nav-tab active">
                    <span class="dc-ico"><i class="bi bi-house-door-fill"></i></span>
                    <span class="flex-1 truncate">Beranda Desa</span>
                </button>
                <button type="button" onclick="switchNavMenu('tentang')" id="nav-tentang" class="nav-tab">
                    <span class="dc-ico"><i class="bi bi-buildings-fill"></i></span>
                    <span class="flex-1 truncate">Profil Desa</span>
                </button>
                <button type="button" onclick="switchNavMenu('galeri')" id="nav-galeri" class="nav-tab">
                    <span class="dc-ico"><i class="bi bi-images"></i></span>
                    <span class="flex-1 truncate">Galeri Foto</span>
                </button>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- GRUP 2: TAHAPAN & EVALUASI DESCAN (DROPDOWN ACCORDION)         -->
        <!-- ============================================================== -->
        <div class="sidebar-accordion-group">
            <button type="button" onclick="toggleDcGroup('evaluasi')" id="dcGroupBtn-evaluasi" class="sidebar-group-btn open">
                <span class="flex items-center gap-2 min-w-0">
                    <span class="w-2 h-2 rounded-full bg-[#3B4D3B] shrink-0"></span>
                    <span class="truncate">Tahapan &amp; Evaluasi</span>
                </span>
                <div class="flex items-center gap-1.5 shrink-0">
                    <span class="text-[9px] font-bold text-[#2D3B2D] bg-[#E6ECE6] border border-[#CBD5C8] px-1.5 py-0.5 rounded">2</span>
                    <i class="bi bi-chevron-down group-chevron text-[#3B4D3B]" id="dcChevron-evaluasi"></i>
                </div>
            </button>
            <div id="dcSubmenu-evaluasi" class="sidebar-submenu-container mt-1 pl-1 space-y-0.5">
                <button type="button" onclick="switchNavMenu('lke')" id="nav-lke" class="nav-tab">
                    <span class="dc-ico"><i class="bi bi-clipboard2-check-fill"></i></span>
                    <span class="flex-1 truncate">Lembar LKE</span>
                    <span class="text-[9px] font-bold px-1.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800">75+</span>
                </button>
                <button type="button" onclick="switchNavMenu('laporan')" id="nav-laporan" class="nav-tab">
                    <span class="dc-ico"><i class="bi bi-file-earmark-text-fill"></i></span>
                    <span class="flex-1 truncate">Laporan Desa Cantik</span>
                    <span class="text-[9px] font-bold px-1.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800">Auto</span>
                </button>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- GRUP 3: KAPASITAS & EDUKASI (DROPDOWN ACCORDION)               -->
        <!-- ============================================================== -->
        <div class="sidebar-accordion-group">
            <button type="button" onclick="toggleDcGroup('edukasi')" id="dcGroupBtn-edukasi" class="sidebar-group-btn open">
                <span class="flex items-center gap-2 min-w-0 flex-1 overflow-hidden text-left">
                    <span class="w-2 h-2 rounded-full bg-[#3B4D3B] shrink-0"></span>
                    <span class="truncate whitespace-nowrap text-[11px] font-extrabold tracking-tight uppercase">Kapasitas &amp; Edukasi</span>
                </span>
                <div class="flex items-center gap-1.5 shrink-0 ml-1">
                    <span class="text-[9px] font-black text-[#2D3B2D] bg-[#E6ECE6] border border-[#CBD5C8] px-1.5 py-0.5 rounded">2</span>
                    <i class="bi bi-chevron-down group-chevron text-[#3B4D3B]" id="dcChevron-edukasi"></i>
                </div>
            </button>
            <div id="dcSubmenu-edukasi" class="sidebar-submenu-container mt-1 pl-1 space-y-0.5">
                <button type="button" onclick="switchNavMenu('video')" id="nav-video" class="nav-tab">
                    <span class="dc-ico"><i class="bi bi-play-circle-fill"></i></span>
                    <span class="flex-1 truncate">Video Mikrolearning</span>
                </button>
                <button type="button" onclick="switchNavMenu('pretest')" id="nav-pretest" class="nav-tab">
                    <span class="dc-ico"><i class="bi bi-patch-question-fill"></i></span>
                    <span class="flex-1 truncate">Pre-test &amp; Post-test</span>
                </button>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- GRUP 4: DATA & DISEMINASI (DROPDOWN ACCORDION)                 -->
        <!-- ============================================================== -->
        <div class="sidebar-accordion-group">
            <button type="button" onclick="toggleDcGroup('data')" id="dcGroupBtn-data" class="sidebar-group-btn open">
                <span class="flex items-center gap-2 min-w-0">
                    <span class="w-2 h-2 rounded-full bg-[#3B4D3B] shrink-0"></span>
                    <span class="truncate">Data &amp; Diseminasi</span>
                </span>
                <div class="flex items-center gap-1.5 shrink-0">
                    <span class="text-[9px] font-bold text-[#2D3B2D] bg-[#E6ECE6] border border-[#CBD5C8] px-1.5 py-0.5 rounded">SDI</span>
                    <i class="bi bi-chevron-down group-chevron text-[#3B4D3B]" id="dcChevron-data"></i>
                </div>
            </button>
            <div id="dcSubmenu-data" class="sidebar-submenu-container mt-1 pl-1 space-y-0.5">
                <button type="button" onclick="switchNavMenu('podes')" id="nav-podes" class="nav-tab">
                    <span class="dc-ico"><i class="bi bi-pencil-square"></i></span>
                    <span class="flex-1 truncate">Pengisian Data PODES</span>
                </button>
                <button type="button" onclick="switchNavMenu('monitoring')" id="nav-monitoring" class="nav-tab">
                    <span class="dc-ico"><i class="bi bi-clipboard-data-fill"></i></span>
                    <span class="flex-1 truncate">Monitoring Monev</span>
                </button>
                <button type="button" onclick="switchNavMenu('publikasi')" id="nav-publikasi" class="nav-tab">
                    <span class="dc-ico"><i class="bi bi-file-earmark-bar-graph-fill"></i></span>
                    <span class="flex-1 truncate">Publikasi &amp; Infografis</span>
                </button>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- GRUP 5: LAYANAN & BANTUAN (DROPDOWN ACCORDION)                -->
        <!-- ============================================================== -->
        <div class="sidebar-accordion-group">
            <button type="button" onclick="toggleDcGroup('layanan')" id="dcGroupBtn-layanan" class="sidebar-group-btn open">
                <span class="flex items-center gap-2 min-w-0">
                    <span class="w-2 h-2 rounded-full bg-[#3B4D3B] shrink-0"></span>
                    <span class="truncate">Layanan &amp; Bantuan</span>
                </span>
                <div class="flex items-center gap-1.5 shrink-0">
                    <span class="text-[9px] font-bold text-[#2D3B2D] bg-[#E6ECE6] border border-[#CBD5C8] px-1.5 py-0.5 rounded">2</span>
                    <i class="bi bi-chevron-down group-chevron text-[#3B4D3B]" id="dcChevron-layanan"></i>
                </div>
            </button>
            <div id="dcSubmenu-layanan" class="sidebar-submenu-container mt-1 pl-1 space-y-0.5">
                <button type="button" onclick="switchNavMenu('buku')" id="nav-buku" class="nav-tab">
                    <span class="dc-ico"><i class="bi bi-journal-bookmark-fill"></i></span>
                    <span class="flex-1 truncate">Pedoman &amp; 5 Template</span>
                    <span class="text-[9px] font-bold px-1.5 py-0.5 rounded-full bg-[#E6ECE6] text-[#2D3B2D] border border-[#CBD5C8]">5</span>
                </button>
                <button type="button" onclick="openPstModal()" id="nav-pst" class="nav-tab">
                    <span class="dc-ico"><i class="bi bi-headset"></i></span>
                    <span class="flex-1 truncate">Layanan PST BPS</span>
                </button>
            </div>
        </div>

    </div>

    <!-- 3. Footer Sidebar: Mini Status SDI, Kembali & Keluar Akun -->
    <div class="p-2.5 border-t border-[#DCE3DD] bg-white space-y-1.5 shrink-0 z-20 relative rounded-br-[24px]">
        <!-- Mini Live Status Satu Data Indonesia -->
        <div class="px-2.5 py-1.5 rounded-xl bg-gradient-to-r from-emerald-50/50 via-white to-[#E6ECE6]/50 border border-[#CBD5C8] shadow-2xs flex items-center justify-between">
            <div class="flex items-center gap-2 min-w-0">
                <div class="w-2 h-2 rounded-full bg-[#3B4D3B] animate-ping shrink-0"></div>
                <div class="truncate leading-tight">
                    <div class="text-[9.5px] font-extrabold text-[#2D3B2D] uppercase tracking-wider">Satu Data Indonesia</div>
                    <div class="text-[8.5px] text-[#3B4D3B] font-semibold">BPS Kolaka Utara 2026</div>
                </div>
            </div>
            <span class="text-[8.5px] font-black text-[#2D3B2D] bg-[#E6ECE6] border border-[#CBD5C8] px-1.5 py-0.5 rounded-full shrink-0">Aktif</span>
        </div>

        <a href="/descan" onclick="exitToDescanDashboard(event)" class="w-full flex items-center justify-center gap-2 text-[11.5px] font-bold text-slate-700 hover:text-[#3B4D3B] bg-white hover:bg-emerald-50 border border-[#DCE3DD] hover:border-[#3B4D3B] rounded-xl py-1.5 cursor-pointer transition shadow-2xs hover:shadow-xs group active:scale-98">
            <i class="bi bi-grid-3x3-gap-fill text-xs text-[#3B4D3B] group-hover:text-[#2D3B2D] group-hover:scale-110 transition-all"></i>
            <span>Kembali ke 6 Desa</span>
        </a>
        <button type="button" onclick="logoutFromMenu()" class="w-full flex items-center justify-center gap-2 text-[11.5px] font-bold text-[#2D3B2D] hover:text-[#1D241E] bg-[#E6ECE6] hover:bg-[#DCE3DD] border border-[#CBD5C8] rounded-xl py-1.5 cursor-pointer transition shadow-2xs group active:scale-98">
            <i class="bi bi-box-arrow-right text-xs text-[#3B4D3B] group-hover:translate-x-0.5 transition-transform"></i>
            <span>Keluar Akun</span>
        </button>
    </div>
</aside>
