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

            <!-- Sisi Tengah: Menu Navigasi 5 Halaman Terpisah -->
            <nav class="hidden md:flex items-center gap-6 lg:gap-8 text-xs font-bold text-slate-600 whitespace-nowrap shrink-0">
                <a href="/portal" id="navLinkPage1" onclick="window.onNavClick(event, 1, '/portal')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative {{ $curPage === 1 ? 'active' : '' }}">
                    Beranda
                </a>
                <a href="/portal/agregat" id="navLinkPage2" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative {{ $curPage === 2 ? 'active' : '' }}">
                    Agregat 15 Kecamatan
                </a>
                <a href="/portal/peta" id="navLinkPage3" onclick="window.onNavClick(event, 3, '/portal/peta')" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative flex items-center gap-1.5 {{ $curPage === 3 ? 'active' : '' }}">
                    <svg class="w-3.5 h-3.5 text-[#3B4D3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    <span>WebGIS Peta Spasial</span>
                </a>
                <a href="/descan" id="navLinkPage4" class="portal-nav-link hover:text-[#3B4D3B] transition py-1 relative {{ $curPage === 4 ? 'active' : '' }}" title="Buka Portal Lengkap Desa Cantik">
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
        <div class="flex md:hidden overflow-x-auto px-4 py-2 gap-2 border-t border-slate-100 no-scrollbar text-xs font-bold text-slate-600 w-full bg-white">
            <a href="/portal" onclick="window.onNavClick(event, 1, '/portal')" id="mNav1" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 1 ? 'bg-[#3B4D3B] text-white' : 'bg-slate-100 hover:bg-slate-200' }}">Beranda</a>
            <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" id="mNav2" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 2 ? 'bg-[#3B4D3B] text-white' : 'bg-slate-100 hover:bg-slate-200' }}">Agregat 15 Kec</a>
            <a href="/portal/peta" onclick="window.onNavClick(event, 3, '/portal/peta')" id="mNav3" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 3 ? 'bg-[#3B4D3B] text-white' : 'bg-slate-100 hover:bg-slate-200' }}">WebGIS Peta</a>
            <a href="/descan" id="mNav4" class="whitespace-nowrap px-3 py-1 rounded-full bg-slate-100 hover:bg-slate-200">Desa Cantik (DESCAN)</a>
            <a href="/portal/tentang" onclick="window.onNavClick(event, 5, '/portal/tentang', 'madani')" id="mNav5" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 5 && $curSub === 'madani' ? 'bg-[#3B4D3B] text-white' : 'bg-slate-100 hover:bg-slate-200' }}">Tentang Madani</a>
            <a href="/portal/publikasi" onclick="window.onNavClick(event, 5, '/portal/publikasi', 'publikasi')" id="mNav5Publikasi" class="whitespace-nowrap px-3 py-1 rounded-full {{ $curPage === 5 && $curSub === 'publikasi' ? 'bg-[#3B4D3B] text-white' : 'bg-slate-100 hover:bg-slate-200' }}">Publikasi BPS</a>
        </div>
    </header>
