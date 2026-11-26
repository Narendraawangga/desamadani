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
