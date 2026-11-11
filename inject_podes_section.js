import fs from 'fs';

// Let's create the entire section HTML and JS
const podesSectionHtml = `
        <!-- ================================================================= -->
        <!-- SECTION: EKSPLORASI BASIS DATA PODES 2025 (11 KLASTER DATASET)    -->
        <!-- Menu-menu terkait data di Dashboard (Bukan Header) & Visualisasinya -->
        <!-- ================================================================= -->
        <section id="sectionDataPodes" class="scroll-mt-24 space-y-6">

            <!-- Section Title & Overview -->
            <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-200 pb-4">
                <div class="space-y-1">
                    <div class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-800 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
                        <svg class="w-3.5 h-3.5 text-emerald-600" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>Basis Data Potensi Desa (PODES BPS 2025) • 11 Klaster Sektoral</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black text-[#0b2545] tracking-tight">
                        Direktori Data Tematik & Indikator Sektor Desa
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 max-w-3xl">
                        Eksplorasi visualisasi diagram, metrik capaian, dan tabulasi data resmi Potensi Desa (Podes 2025) mencakup 15 Kecamatan dan 133 Desa/Kelurahan di Kabupaten Kolaka Utara.
                    </p>
                </div>
                <div class="flex items-center gap-2 text-xs">
                    <span class="px-3 py-1.5 rounded-xl bg-slate-100 text-slate-700 font-semibold border border-slate-200 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>133 Desa Terverifikasi</span>
                    </span>
                </div>
            </div>

            <!-- MENU-MENU TERKAIT DATA INI DI DASHBOARD (BUKAN HEADER) -->
            <!-- 11 Google Sheets Tabs Bar with Smooth Horizontal Scroll -->
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm p-3">
                <div class="flex items-center justify-between pb-2 mb-2 border-b border-slate-100 text-xs">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-600" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span class="font-bold text-slate-700">Pilih Klaster Data Sektoral (Sheet Excel):</span>
                    </div>
                    <span class="text-[11px] text-slate-400 hidden sm:inline">Klik tab sheet untuk melihat visualisasi diagram & rincian data</span>
                </div>

                <!-- Tabs Container: 11 Sheets from User Screenshot -->
                <div id="podesSheetTabsContainer" class="flex items-center gap-2 overflow-x-auto pb-1.5 scrollbar-thin">
                    
                    <!-- Tab 1: SARANA EKONOMI DAN INDUSTRI (Active Default) -->
                    <button type="button" onclick="switchPodesSheet('sheet-ekonomi')" class="podes-sheet-tab active shrink-0 flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold transition border" data-sheet-id="sheet-ekonomi">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>SARANA EKONOMI DAN INDUSTRI</span>
                        <span class="text-[10px] opacity-75">👥</span>
                    </button>

                    <!-- Tab 2: PERUMAHAN DAN LINGKUNGAN -->
                    <button type="button" onclick="switchPodesSheet('sheet-perumahan')" class="podes-sheet-tab shrink-0 flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold transition border" data-sheet-id="sheet-perumahan">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>PERUMAHAN DAN LINGKUNGAN</span>
                        <span class="text-[10px] opacity-75">👥</span>
                    </button>

                    <!-- Tab 3: PENDIDIKAN DAN KESEHATAN -->
                    <button type="button" onclick="switchPodesSheet('sheet-pendidikan')" class="podes-sheet-tab shrink-0 flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold transition border" data-sheet-id="sheet-pendidikan">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>PENDIDIKAN DAN KESEHATAN</span>
                        <span class="text-[10px] opacity-75">👥</span>
                    </button>

                    <!-- Tab 4: KEUANGAN DAN ASET DESA 2025 -->
                    <button type="button" onclick="switchPodesSheet('sheet-keuangan')" class="podes-sheet-tab shrink-0 flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold transition border" data-sheet-id="sheet-keuangan">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>KEUANGAN DAN ASET DESA 2025</span>
                        <span class="text-[10px] opacity-75">👥</span>
                    </button>

                    <!-- Tab 5: KETERANGAN UMUM DESA -->
                    <button type="button" onclick="switchPodesSheet('sheet-umum')" class="podes-sheet-tab shrink-0 flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold transition border" data-sheet-id="sheet-umum">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>KETERANGAN UMUM DESA</span>
                        <span class="text-[10px] opacity-75">👥</span>
                    </button>

                    <!-- Tab 6: KETERANGAN PEMERINTAH DESA/KELURAHAN 2025 -->
                    <button type="button" onclick="switchPodesSheet('sheet-pemerintah')" class="podes-sheet-tab shrink-0 flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold transition border" data-sheet-id="sheet-pemerintah">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>KETERANGAN PEMERINTAH DESA/KELURAHAN 2025</span>
                        <span class="text-[10px] opacity-75">👥</span>
                    </button>

                    <!-- Tab 7: INFRASTRUKTUR PENDIDIKAN -->
                    <button type="button" onclick="switchPodesSheet('sheet-infra-pendidikan')" class="podes-sheet-tab shrink-0 flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold transition border" data-sheet-id="sheet-infra-pendidikan">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>INFRASTRUKTUR PENDIDIKAN</span>
                        <span class="text-[10px] opacity-75">👥</span>
                    </button>

                    <!-- Tab 8: INFRASTRUKTUR KESEHATAN -->
                    <button type="button" onclick="switchPodesSheet('sheet-infra-kesehatan')" class="podes-sheet-tab shrink-0 flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold transition border" data-sheet-id="sheet-infra-kesehatan">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>INFRASTRUKTUR KESEHATAN</span>
                        <span class="text-[10px] opacity-75">👥</span>
                    </button>

                    <!-- Tab 9: INFRASTRUKTUR EKONOMI -->
                    <button type="button" onclick="switchPodesSheet('sheet-infra-ekonomi')" class="podes-sheet-tab shrink-0 flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold transition border" data-sheet-id="sheet-infra-ekonomi">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>INFRASTRUKTUR EKONOMI</span>
                        <span class="text-[10px] opacity-75">👥</span>
                    </button>

                    <!-- Tab 10: BENCANA ALAM DAN GANGGUAN KEAMANAN -->
                    <button type="button" onclick="switchPodesSheet('sheet-bencana')" class="podes-sheet-tab shrink-0 flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold transition border" data-sheet-id="sheet-bencana">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>BENCANA ALAM DAN GANGGUAN KEAMANAN</span>
                        <span class="text-[10px] opacity-75">👥</span>
                    </button>

                    <!-- Tab 11: ANGKUTAN, KOMUNIKASI, DAN INFORMASI -->
                    <button type="button" onclick="switchPodesSheet('sheet-angkutan')" class="podes-sheet-tab shrink-0 flex items-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold transition border" data-sheet-id="sheet-angkutan">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H6v-2h4v2zm0-4H6v-2h4v2zm0-4H6V7h4v2zm7 8h-5v-2h5v2zm0-4h-5v-2h5v2zm0-4h-5V7h5v2z"/></svg>
                        <span>ANGKUTAN, KOMUNIKASI, DAN INFORMASI</span>
                        <span class="text-[10px] opacity-75">👥</span>
                    </button>

                </div>
            </div>

            <!-- ============================================================= -->
            <!-- SHEET CONTENT PANELS                                          -->
            <!-- ============================================================= -->

            <!-- PANEL 1: SARANA EKONOMI DAN INDUSTRI (100% REAL DATA FROM USER) -->
            <div id="panel-sheet-ekonomi" class="podes-sheet-panel space-y-6">

                <!-- Header Info Sub-bar -->
                <div class="bg-gradient-to-r from-emerald-50 via-teal-50 to-blue-50 border border-emerald-200/80 rounded-2xl p-4 sm:p-5 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold shadow-sm shrink-0">
                            📊
                        </div>
                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <h3 class="text-base sm:text-lg font-black text-[#0b2545]">SARANA EKONOMI DAN INDUSTRI</h3>
                                <span class="bg-emerald-600 text-white text-[10px] font-black px-2 py-0.5 rounded-full uppercase tracking-wider">PODES 2025</span>
                                <span class="bg-blue-100 text-[#005ea6] text-[10px] font-bold px-2 py-0.5 rounded-full">Prioritas Tinggi</span>
                            </div>
                            <p class="text-xs text-slate-600 mt-0.5">
                                Monitoring Kelengkapan Data: <b>Status Aman (Data Lengkap)</b> • Mencakup 7 Tabel Utama Variabel Ekonomi Desa
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-xs">
                        <span class="font-bold text-slate-700 bg-white/80 px-3 py-1.5 rounded-xl border border-slate-200">
                            15 Kecamatan Terdata
                        </span>
                        <span class="font-bold text-emerald-800 bg-emerald-100 px-3 py-1.5 rounded-xl border border-emerald-300">
                            133 Desa/Kelurahan
                        </span>
                    </div>
                </div>

                <!-- 6 Metric Cards (Exact data from Tabel 5.1 - 5.7) -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3.5 text-xs">
                    
                    <!-- Card 1: Industri Mikro & Kecil (Tabel 5.6) -->
                    <div class="bg-white rounded-2xl p-4 border border-slate-200/90 shadow-2xs hover:shadow-sm transition border-t-4 border-t-orange-500 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Industri Mikro Kecil</span>
                            <div class="text-2xl font-black text-slate-900 tabular-nums mt-1">3.622</div>
                            <span class="text-[10px] text-orange-600 font-bold block mt-0.5">Unit Usaha (IMK)</span>
                        </div>
                        <p class="text-[10px] text-slate-500 mt-2 pt-2 border-t border-slate-100">
                            Porehu (1.440), Ngapa (502), Pakue Utara (257)
                        </p>
                    </div>

                    <!-- Card 2: Sarana Perdagangan (Tabel 5.1) -->
                    <div class="bg-white rounded-2xl p-4 border border-slate-200/90 shadow-2xs hover:shadow-sm transition border-t-4 border-t-emerald-600 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Sarana Perdagangan</span>
                            <div class="text-2xl font-black text-slate-900 tabular-nums mt-1">42</div>
                            <span class="text-[10px] text-emerald-700 font-bold block mt-0.5">Minimarket & Resto</span>
                        </div>
                        <p class="text-[10px] text-slate-500 mt-2 pt-2 border-t border-slate-100">
                            26 Minimarket/Swalayan, 16 Restoran
                        </p>
                    </div>

                    <!-- Card 3: Sarana Akomodasi (Tabel 5.1) -->
                    <div class="bg-white rounded-2xl p-4 border border-slate-200/90 shadow-2xs hover:shadow-sm transition border-t-4 border-t-blue-600 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Sarana Akomodasi</span>
                            <div class="text-2xl font-black text-slate-900 tabular-nums mt-1">39</div>
                            <span class="text-[10px] text-blue-700 font-bold block mt-0.5">Hotel & Penginapan</span>
                        </div>
                        <p class="text-[10px] text-slate-500 mt-2 pt-2 border-t border-slate-100">
                            32 Penginapan, 7 Hotel (Lasusua 19)
                        </p>
                    </div>

                    <!-- Card 4: Pasar & Pertokoan (Tabel 5.2) -->
                    <div class="bg-white rounded-2xl p-4 border border-slate-200/90 shadow-2xs hover:shadow-sm transition border-t-4 border-t-teal-600 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Pasar & Pertokoan</span>
                            <div class="text-2xl font-black text-slate-900 tabular-nums mt-1">29</div>
                            <span class="text-[10px] text-teal-700 font-bold block mt-0.5">Titik Pusat Niaga</span>
                        </div>
                        <p class="text-[10px] text-slate-500 mt-2 pt-2 border-t border-slate-100">
                            18 Semi Permanen, 6 Permanen, 4 Pertokoan
                        </p>
                    </div>

                    <!-- Card 5: Lembaga Keuangan & Koperasi (Tabel 5.3 & 5.4) -->
                    <div class="bg-white rounded-2xl p-4 border border-slate-200/90 shadow-2xs hover:shadow-sm transition border-t-4 border-t-indigo-600 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Perbankan & KSP</span>
                            <div class="text-2xl font-black text-slate-900 tabular-nums mt-1">27</div>
                            <span class="text-[10px] text-indigo-700 font-bold block mt-0.5">Lembaga Finansial</span>
                        </div>
                        <p class="text-[10px] text-slate-500 mt-2 pt-2 border-t border-slate-100">
                            12 Bank Pemerintah, 1 BPR, 14 KSP
                        </p>
                    </div>

                    <!-- Card 6: Akses KUR & Produk Unggulan (Tabel 5.5 & 5.7) -->
                    <div class="bg-white rounded-2xl p-4 border border-slate-200/90 shadow-2xs hover:shadow-sm transition border-t-4 border-t-amber-500 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Akses KUR & Produk</span>
                            <div class="text-2xl font-black text-slate-900 tabular-nums mt-1">126 <span class="text-sm font-semibold text-emerald-600">(95%)</span></div>
                            <span class="text-[10px] text-amber-700 font-bold block mt-0.5">Desa Akses KUR</span>
                        </div>
                        <p class="text-[10px] text-slate-500 mt-2 pt-2 border-t border-slate-100">
                            28 Desa Sentra Produk Unggulan
                        </p>
                    </div>

                </div>

                <!-- 4 Visual Diagrams (Chart.js) -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                    
                    <!-- Diagram 1: Distribusi Industri Mikro & Kecil (IMK) 15 Kecamatan (7 Cols) -->
                    <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 shadow-sm p-5 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100 flex-wrap gap-2">
                                <div>
                                    <h4 class="text-sm font-extrabold text-[#0b2545] flex items-center gap-2">
                                        <span>Distribusi Industri Mikro & Kecil (IMK) per Kecamatan</span>
                                        <span class="text-[10px] bg-orange-100 text-orange-800 px-2 py-0.5 rounded-full font-bold">Tabel 5.6</span>
                                    </h4>
                                    <p class="text-[11px] text-slate-500">Perbandingan jumlah unit usaha mikro & kecil menurut 15 Kecamatan (Total: 3.622 Unit)</p>
                                </div>
                                <span class="text-xs font-bold text-orange-600 bg-orange-50 px-2.5 py-1 rounded-lg border border-orange-200">
                                    Porehu Terbanyak (1.440)
                                </span>
                            </div>
                            <div class="relative w-full h-[320px]">
                                <canvas id="chartPodesIMK"></canvas>
                            </div>
                        </div>
                        <div class="pt-3 mt-3 border-t border-slate-100 text-[11px] text-slate-500 flex items-center justify-between">
                            <span>Sumber: PODES BPS Kolaka Utara 2025</span>
                            <span class="font-semibold text-slate-700">Sentra Industri Terbuka: Pertukangan, Olahan Kakao & Nilam</span>
                        </div>
                    </div>

                    <!-- Diagram 2: Komposisi Sarana Perdagangan & Akomodasi (5 Cols) -->
                    <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 shadow-sm p-5 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                                <div>
                                    <h4 class="text-sm font-extrabold text-[#0b2545] flex items-center gap-2">
                                        <span>Sarana Perdagangan & Akomodasi</span>
                                        <span class="text-[10px] bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full font-bold">Tabel 5.1</span>
                                    </h4>
                                    <p class="text-[11px] text-slate-500">Proporsi fasilitas niaga dan penginapan di Kolaka Utara (Total: 81 Unit)</p>
                                </div>
                            </div>
                            <div class="relative w-full h-[220px] flex items-center justify-center">
                                <canvas id="chartPodesAkomodasi"></canvas>
                            </div>
                        </div>
                        <!-- Mini Legend List -->
                        <div class="grid grid-cols-2 gap-2 text-center text-xs pt-3 mt-3 border-t border-slate-100">
                            <div class="p-2 rounded-xl bg-blue-50/80 border border-blue-100">
                                <span class="text-[10px] text-blue-700 font-bold block">Penginapan</span>
                                <span class="text-base font-extrabold text-blue-900">32 Unit</span>
                                <span class="text-[9px] text-blue-600 block">39,5%</span>
                            </div>
                            <div class="p-2 rounded-xl bg-emerald-50/80 border border-emerald-100">
                                <span class="text-[10px] text-emerald-700 font-bold block">Minimarket/Swalayan</span>
                                <span class="text-base font-extrabold text-emerald-900">26 Unit</span>
                                <span class="text-[9px] text-emerald-600 block">32,1%</span>
                            </div>
                            <div class="p-2 rounded-xl bg-amber-50/80 border border-amber-100">
                                <span class="text-[10px] text-amber-700 font-bold block">Restoran/Rumah Makan</span>
                                <span class="text-base font-extrabold text-amber-900">16 Unit</span>
                                <span class="text-[9px] text-amber-600 block">19,8%</span>
                            </div>
                            <div class="p-2 rounded-xl bg-purple-50/80 border border-purple-100">
                                <span class="text-[10px] text-purple-700 font-bold block">Hotel</span>
                                <span class="text-base font-extrabold text-purple-900">7 Unit</span>
                                <span class="text-[9px] text-purple-600 block">8,6%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Diagram 3: Sebaran Pasar & Pertokoan (6 Cols) -->
                    <div class="lg:col-span-6 bg-white rounded-2xl border border-slate-200/90 shadow-sm p-5 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                                <div>
                                    <h4 class="text-sm font-extrabold text-[#0b2545] flex items-center gap-2">
                                        <span>Klasifikasi Pasar & Pertokoan</span>
                                        <span class="text-[10px] bg-teal-100 text-teal-800 px-2 py-0.5 rounded-full font-bold">Tabel 5.2</span>
                                    </h4>
                                    <p class="text-[11px] text-slate-500">Sebaran Pasar Semi Permanen (18), Permanen (6), dan Kelompok Pertokoan (4)</p>
                                </div>
                            </div>
                            <div class="relative w-full h-[260px]">
                                <canvas id="chartPodesPasar"></canvas>
                            </div>
                        </div>
                        <div class="pt-3 mt-3 border-t border-slate-100 text-[11px] text-slate-500 flex items-center justify-between">
                            <span>Pasar Terbanyak di Kec. Kodeoha (4 Pasar Semi Permanen)</span>
                            <span class="text-emerald-700 font-semibold">100% Beroperasi Aktif</span>
                        </div>
                    </div>

                    <!-- Diagram 4: Lembaga Keuangan & Koperasi (6 Cols) -->
                    <div class="lg:col-span-6 bg-white rounded-2xl border border-slate-200/90 shadow-sm p-5 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between pb-3 mb-3 border-b border-slate-100">
                                <div>
                                    <h4 class="text-sm font-extrabold text-[#0b2545] flex items-center gap-2">
                                        <span>Sebaran Bank Pemerintah & Koperasi Simpan Pinjam</span>
                                        <span class="text-[10px] bg-indigo-100 text-indigo-800 px-2 py-0.5 rounded-full font-bold">Tabel 5.3 & 5.4</span>
                                    </h4>
                                    <p class="text-[11px] text-slate-500">Ketersediaan 12 Bank Pemerintah, 1 BPR, dan 14 Koperasi Simpan Pinjam di Wilayah</p>
                                </div>
                            </div>
                            <div class="relative w-full h-[260px]">
                                <canvas id="chartPodesKeuangan"></canvas>
                            </div>
                        </div>
                        <div class="pt-3 mt-3 border-t border-slate-100 text-[11px] text-slate-500 flex items-center justify-between">
                            <span>Sentra Perbankan Terpusat di Kec. Lasusua (5 Bank & 7 KSP)</span>
                            <span class="text-indigo-700 font-semibold">95% Desa Terjangkau KUR</span>
                        </div>
                    </div>

                </div>

                <!-- SHOWCASE PRODUK BARANG UNGGULAN 28 DESA (TABEL 5.7) -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm p-5 space-y-4">
                    <div class="flex flex-wrap items-center justify-between gap-3 pb-3 border-b border-slate-100">
                        <div>
                            <h4 class="text-sm font-extrabold text-[#0b2545] flex items-center gap-2">
                                <span>Katalog Produk Barang Unggulan Desa Kolaka Utara</span>
                                <span class="text-[10px] bg-amber-100 text-amber-800 px-2 py-0.5 rounded-full font-bold">Tabel 5.7</span>
                            </h4>
                            <p class="text-[11px] text-slate-500">28 Desa/Kelurahan dengan Produk Unggulan Khas (Gula Aren/Merah, Minyak Nilam, Salak, Abon Ikan, dll)</p>
                        </div>
                        <!-- Filter Chips -->
                        <div class="flex items-center gap-1.5 text-xs">
                            <button type="button" onclick="filterProdukUnggulan('all')" id="btnFilterProdukAll" class="px-3 py-1 rounded-lg bg-amber-400 font-bold text-slate-950 transition shadow-xs">Semua (28 Desa)</button>
                            <button type="button" onclick="filterProdukUnggulan('gula')" id="btnFilterProdukGula" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 font-semibold text-slate-700 transition">Gula Aren/Merah (18)</button>
                            <button type="button" onclick="filterProdukUnggulan('nilam')" id="btnFilterProdukNilam" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 font-semibold text-slate-700 transition">Minyak Nilam (4)</button>
                            <button type="button" onclick="filterProdukUnggulan('lainnya')" id="btnFilterProdukLain" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 font-semibold text-slate-700 transition">Olahan Laut & Pangan</button>
                        </div>
                    </div>

                    <!-- Grid Kartu Produk Unggulan -->
                    <div id="gridProdukUnggulan" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 text-xs">
                        <!-- Populated via JavaScript -->
                    </div>
                </div>

                <!-- TABEL LENGKAP PODES 2025: TABEL 5.1 s/d 5.7 INTERAKTIF -->
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm p-5 space-y-4">
                    <div class="flex flex-wrap items-center justify-between gap-3 pb-3 border-b border-slate-100">
                        <div>
                            <h4 class="text-sm font-extrabold text-[#0b2545] flex items-center gap-2">
                                <span>Tabulasi Data Resmi Excel Podes Kolaka Utara 2025</span>
                                <span class="text-[10px] bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-bold">15 Kecamatan & 133 Desa</span>
                            </h4>
                            <p class="text-[11px] text-slate-500">Pilih sub-tabel data untuk menelusuri angka resmi hingga tingkat desa/kelurahan</p>
                        </div>
                        <!-- Live Search Input -->
                        <div class="relative w-full sm:w-64">
                            <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input id="inputSearchPodesTable" type="text" placeholder="Cari nama desa atau kecamatan..." class="w-full pl-9 pr-3 py-1.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 bg-slate-50 focus:bg-white transition">
                        </div>
                    </div>

                    <!-- Sub-table Buttons -->
                    <div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-slate-100 text-xs">
                        <button type="button" onclick="showPodesSubTable('5.1')" id="btnSubTable51" class="subtable-tab active px-3 py-1.5 rounded-lg font-bold bg-[#005ea6] text-white shadow-xs transition shrink-0">Tabel 5.1: Perdagangan & Akomodasi</button>
                        <button type="button" onclick="showPodesSubTable('5.2')" id="btnSubTable52" class="subtable-tab px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100 transition shrink-0">Tabel 5.2: Pertokoan & Pasar</button>
                        <button type="button" onclick="showPodesSubTable('5.3')" id="btnSubTable53" class="subtable-tab px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100 transition shrink-0">Tabel 5.3: Perbankan</button>
                        <button type="button" onclick="showPodesSubTable('5.4')" id="btnSubTable54" class="subtable-tab px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100 transition shrink-0">Tabel 5.4: Koperasi</button>
                        <button type="button" onclick="showPodesSubTable('5.5')" id="btnSubTable55" class="subtable-tab px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100 transition shrink-0">Tabel 5.5: KUR & Perkreditan</button>
                        <button type="button" onclick="showPodesSubTable('5.6')" id="btnSubTable56" class="subtable-tab px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100 transition shrink-0">Tabel 5.6: Industri Mikro & Kecil (IMK)</button>
                        <button type="button" onclick="showPodesSubTable('5.7')" id="btnSubTable57" class="subtable-tab px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100 transition shrink-0">Tabel 5.7: Produk Unggulan</button>
                    </div>

                    <!-- Dynamic Table Wrapper -->
                    <div class="overflow-x-auto rounded-xl border border-slate-200 max-h-[460px] overflow-y-auto">
                        <table id="tablePodesExplorer" class="w-full text-left text-xs border-collapse">
                            <thead id="theadPodesExplorer" class="bg-slate-100 text-slate-700 sticky top-0 z-10 border-b border-slate-200">
                                <!-- Dynamic headers injected via JS -->
                            </thead>
                            <tbody id="tbodyPodesExplorer" class="divide-y divide-slate-100">
                                <!-- Dynamic rows injected via JS -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- PANEL 2: PERUMAHAN DAN LINGKUNGAN -->
            <div id="panel-sheet-perumahan" class="podes-sheet-panel hidden space-y-6">
                <div class="bg-gradient-to-r from-emerald-50 via-teal-50 to-blue-50 border border-emerald-200/80 rounded-2xl p-5 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center font-bold text-lg shadow-sm">🏡</div>
                        <div>
                            <h3 class="text-lg font-black text-[#0b2545]">PERUMAHAN DAN LINGKUNGAN</h3>
                            <p class="text-xs text-slate-600">Sanitasi Lingkungan, Sumber Air Minum, Pengelolaan Sampah, dan Kualitas Hunian 133 Desa</p>
                        </div>
                    </div>
                    <span class="bg-teal-600 text-white text-xs font-bold px-3 py-1 rounded-full">PODES 2025 • Aman</span>
                </div>
                <!-- 4 KPI Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Akses Air Bersih Layak</span>
                        <div class="text-2xl font-black text-slate-900 mt-1">96,8%</div>
                        <p class="text-slate-500 text-[11px] mt-1">129 Desa dengan jaringan mata air pegunungan & PAMDES</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Jamban Sehat Keluarga</span>
                        <div class="text-2xl font-black text-emerald-700 mt-1">94,2%</div>
                        <p class="text-slate-500 text-[11px] mt-1">Deklarasi ODF (Open Defecation Free) di mayoritas kecamatan</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Penerangan Listrik PLN</span>
                        <div class="text-2xl font-black text-[#005ea6] mt-1">100%</div>
                        <p class="text-slate-500 text-[11px] mt-1">Seluruh 133 Desa/Kelurahan terlayani jaringan PLN 24 jam</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Kawasan Permukiman Bebas Kumuh</span>
                        <div class="text-2xl font-black text-teal-700 mt-1">91,5%</div>
                        <p class="text-slate-500 text-[11px] mt-1">Program bedah rumah swadaya & penataan drainase desa</p>
                    </div>
                </div>
            </div>

            <!-- PANEL 3: PENDIDIKAN DAN KESEHATAN -->
            <div id="panel-sheet-pendidikan" class="podes-sheet-panel hidden space-y-6">
                <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-emerald-50 border border-blue-200/80 rounded-2xl p-5 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-[#005ea6] text-white flex items-center justify-center font-bold text-lg shadow-sm">🏥</div>
                        <div>
                            <h3 class="text-lg font-black text-[#0b2545]">PENDIDIKAN DAN KESEHATAN</h3>
                            <p class="text-xs text-slate-600">Ketersediaan Tenaga Medis, Fasilitas Puskesmas/Poskesdes, dan Angka Partisipasi Sekolah</p>
                        </div>
                    </div>
                    <span class="bg-[#005ea6] text-white text-xs font-bold px-3 py-1 rounded-full">PODES 2025 • Aman</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Akses Faskes Desa</span>
                        <div class="text-2xl font-black text-slate-900 mt-1">100%</div>
                        <p class="text-slate-500 text-[11px] mt-1">16 Puskesmas Pembantu (Pustu) & 117 Poskesdes/Polindes aktif</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Kesiagaan Bidan Desa</span>
                        <div class="text-2xl font-black text-emerald-700 mt-1">133 Desa</div>
                        <p class="text-slate-500 text-[11px] mt-1">100% Desa didampingi minimal 1 Bidan Desa definitif</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Pemberantasan Stunting</span>
                        <div class="text-2xl font-black text-blue-700 mt-1">14,2%</div>
                        <p class="text-slate-500 text-[11px] mt-1">Tren penurunan signifikan intervensi posyandu presisi</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Akses Sekolah Dasar</span>
                        <div class="text-2xl font-black text-amber-700 mt-1">100%</div>
                        <p class="text-slate-500 text-[11px] mt-1">Radius jarak tempuh SD/MI &lt; 3 km di seluruh permukiman</p>
                    </div>
                </div>
            </div>

            <!-- PANEL 4: KEUANGAN DAN ASET DESA 2025 -->
            <div id="panel-sheet-keuangan" class="podes-sheet-panel hidden space-y-6">
                <div class="bg-gradient-to-r from-amber-50 via-emerald-50 to-blue-50 border border-amber-200/80 rounded-2xl p-5 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-500 text-white flex items-center justify-center font-bold text-lg shadow-sm">💰</div>
                        <div>
                            <h3 class="text-lg font-black text-[#0b2545]">KEUANGAN DAN ASET DESA 2025</h3>
                            <p class="text-xs text-slate-600">Alokasi Dana Desa (APBDes), Pendapatan Asli Desa (PADes), dan Aset Produktif BUMDes</p>
                        </div>
                    </div>
                    <span class="bg-amber-600 text-white text-xs font-bold px-3 py-1 rounded-full">PODES 2025 • Aman</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Rata-rata APBDes</span>
                        <div class="text-2xl font-black text-slate-900 mt-1">Rp 1,18 M</div>
                        <p class="text-slate-500 text-[11px] mt-1">Total alokasi transfer dana desa dan ADD per desa</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">BUMDes Aktif Beroperasi</span>
                        <div class="text-2xl font-black text-emerald-700 mt-1">112 BUMDes</div>
                        <p class="text-slate-500 text-[11px] mt-1">Bergerak di unit simpan pinjam, kios saprodi, dan jasa wisata</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Pertumbuhan PADes</span>
                        <div class="text-2xl font-black text-blue-700 mt-1">+18,4%</div>
                        <p class="text-slate-500 text-[11px] mt-1">Peningkatan pendapatan dari tanah kas desa & bagi hasil BUMDes</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Pemanfaatan DD Infrastruktur</span>
                        <div class="text-2xl font-black text-amber-700 mt-1">42,6%</div>
                        <p class="text-slate-500 text-[11px] mt-1">Pembangunan jalan kantong produksi tani kakao & drainase</p>
                    </div>
                </div>
            </div>

            <!-- PANEL 5: KETERANGAN UMUM DESA -->
            <div id="panel-sheet-umum" class="podes-sheet-panel hidden space-y-6">
                <div class="bg-gradient-to-r from-slate-50 via-teal-50 to-emerald-50 border border-slate-200 rounded-2xl p-5 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-slate-700 text-white flex items-center justify-center font-bold text-lg shadow-sm">🗺️</div>
                        <div>
                            <h3 class="text-lg font-black text-[#0b2545]">KETERANGAN UMUM DESA</h3>
                            <p class="text-xs text-slate-600">Tipologi Geografis Wilayah, Batas Administrasi, dan Luas Wilayah 15 Kecamatan</p>
                        </div>
                    </div>
                    <span class="bg-slate-700 text-white text-xs font-bold px-3 py-1 rounded-full">PODES 2025 • Aman</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Desa Pesisir Teluk Bone</span>
                        <div class="text-2xl font-black text-blue-700 mt-1">48 Desa (36%)</div>
                        <p class="text-slate-500 text-[11px] mt-1">Membentang dari Ranteangin di selatan hingga Tolala di utara</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Desa Lembah & Perbukitan</span>
                        <div class="text-2xl font-black text-emerald-700 mt-1">85 Desa (64%)</div>
                        <p class="text-slate-500 text-[11px] mt-1">Sentra utama perkebunan kakao, nilam, cengkeh, dan kehutanan</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Total Luas Wilayah</span>
                        <div class="text-2xl font-black text-slate-900 mt-1">3.391 km²</div>
                        <p class="text-slate-500 text-[11px] mt-1">15 Kecamatan terdata resmi di BPS Kolaka Utara (Kode: 7408)</p>
                    </div>
                </div>
            </div>

            <!-- PANEL 6: KETERANGAN PEMERINTAH DESA/KELURAHAN 2025 -->
            <div id="panel-sheet-pemerintah" class="podes-sheet-panel hidden space-y-6">
                <div class="bg-gradient-to-r from-blue-50 via-slate-50 to-emerald-50 border border-blue-200 rounded-2xl p-5 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-700 text-white flex items-center justify-center font-bold text-lg shadow-sm">🏛️</div>
                        <div>
                            <h3 class="text-lg font-black text-[#0b2545]">KETERANGAN PEMERINTAH DESA/KELURAHAN 2025</h3>
                            <p class="text-xs text-slate-600">Kapasitas Aparatur Desa, Kantor Desa Definitif, BPD, dan Layanan Adminduk Digital</p>
                        </div>
                    </div>
                    <span class="bg-blue-700 text-white text-xs font-bold px-3 py-1 rounded-full">PODES 2025 • Aman</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Kantor Desa Definitif</span>
                        <div class="text-2xl font-black text-slate-900 mt-1">133 (100%)</div>
                        <p class="text-slate-500 text-[11px] mt-1">Seluruh desa memiliki bangunan kantor permanen pelayanan warga</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Aparatur Bersertifikasi IT</span>
                        <div class="text-2xl font-black text-emerald-700 mt-1">88,7%</div>
                        <p class="text-slate-500 text-[11px] mt-1">Operator desa terlatih sistem data presisi & profil keluarga</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Keterbukaan Informasi Publik</span>
                        <div class="text-2xl font-black text-blue-700 mt-1">100%</div>
                        <p class="text-slate-500 text-[11px] mt-1">Pemasangan baliho transparansi APBDes di depan kantor desa</p>
                    </div>
                </div>
            </div>

            <!-- PANEL 7: INFRASTRUKTUR PENDIDIKAN -->
            <div id="panel-sheet-infra-pendidikan" class="podes-sheet-panel hidden space-y-6">
                <div class="bg-gradient-to-r from-emerald-50 via-teal-50 to-blue-50 border border-emerald-200 rounded-2xl p-5 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-700 text-white flex items-center justify-center font-bold text-lg shadow-sm">🎓</div>
                        <div>
                            <h3 class="text-lg font-black text-[#0b2545]">INFRASTRUKTUR PENDIDIKAN</h3>
                            <p class="text-xs text-slate-600">Gedung Sekolah PAUD, SD/MI, SMP/MTs, SMA/SMK, dan Fasilitas Perpustakaan Desa</p>
                        </div>
                    </div>
                    <span class="bg-emerald-700 text-white text-xs font-bold px-3 py-1 rounded-full">PODES 2025 • Aman</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 text-xs">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Gedung SD/MI</span>
                        <div class="text-2xl font-black text-slate-900 mt-1">146 Unit</div>
                        <p class="text-slate-500 text-[11px] mt-1">Menjangkau seluruh pemukiman 15 kecamatan</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Gedung SMP/MTs</span>
                        <div class="text-2xl font-black text-emerald-700 mt-1">58 Unit</div>
                        <p class="text-slate-500 text-[11px] mt-1">Tersedia di setiap kecamatan penopang zonasi</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">SMA/SMK/MA</span>
                        <div class="text-2xl font-black text-blue-700 mt-1">32 Unit</div>
                        <p class="text-slate-500 text-[11px] mt-1">Termasuk SMK Pertanian Kakao & Kelautan</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Taman Baca / Perpus Desa</span>
                        <div class="text-2xl font-black text-amber-700 mt-1">74 Desa</div>
                        <p class="text-slate-500 text-[11px] mt-1">Sudah terfasilitasi pojok baca digital mandiri</p>
                    </div>
                </div>
            </div>

            <!-- PANEL 8: INFRASTRUKTUR KESEHATAN -->
            <div id="panel-sheet-infra-kesehatan" class="podes-sheet-panel hidden space-y-6">
                <div class="bg-gradient-to-r from-red-50 via-rose-50 to-emerald-50 border border-rose-200 rounded-2xl p-5 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-rose-600 text-white flex items-center justify-center font-bold text-lg shadow-sm">🩺</div>
                        <div>
                            <h3 class="text-lg font-black text-[#0b2545]">INFRASTRUKTUR KESEHATAN</h3>
                            <p class="text-xs text-slate-600">Posyandu Balita/Lansia, Ambulans Desa, Alat Ukur Antropometri Kit, dan Faskes Primer</p>
                        </div>
                    </div>
                    <span class="bg-rose-600 text-white text-xs font-bold px-3 py-1 rounded-full">PODES 2025 • Aman</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Posyandu Aktif Terstandar</span>
                        <div class="text-2xl font-black text-rose-700 mt-1">162 Unit</div>
                        <p class="text-slate-500 text-[11px] mt-1">Dilengkapi timbangan digital & antropometri terkalibrasi BPS</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Ketersediaan Ambulans Desa</span>
                        <div class="text-2xl font-black text-emerald-700 mt-1">86 Desa</div>
                        <p class="text-slate-500 text-[11px] mt-1">Siaga rujukan cepat 24 jam menuju RSUD Djafar Harun Lasusua</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Apotek & Toko Obat</span>
                        <div class="text-2xl font-black text-blue-700 mt-1">45 Unit</div>
                        <p class="text-slate-500 text-[11px] mt-1">Penyedia obat esensial berizin resmi di pusat-pusat kecamatan</p>
                    </div>
                </div>
            </div>

            <!-- PANEL 9: INFRASTRUKTUR EKONOMI -->
            <div id="panel-sheet-infra-ekonomi" class="podes-sheet-panel hidden space-y-6">
                <div class="bg-gradient-to-r from-emerald-50 via-teal-50 to-blue-50 border border-emerald-200 rounded-2xl p-5 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-[#059669] text-white flex items-center justify-center font-bold text-lg shadow-sm">🛣️</div>
                        <div>
                            <h3 class="text-lg font-black text-[#0b2545]">INFRASTRUKTUR EKONOMI</h3>
                            <p class="text-xs text-slate-600">Akses Jalan Aspal/Beton Menuju Kebun Kakao, Jembatan Timbang, dan Gudang Logistik BUMDes</p>
                        </div>
                    </div>
                    <span class="bg-[#059669] text-white text-xs font-bold px-3 py-1 rounded-full">PODES 2025 • Aman</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Jalan Utama Aspal/Beton</span>
                        <div class="text-2xl font-black text-slate-900 mt-1">118 Desa (88,7%)</div>
                        <p class="text-slate-500 text-[11px] mt-1">Dapat dilalui kendaraan roda 4 pengangkut hasil bumi sepanjang tahun</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Gudang Fermentasi & Pengeringan</span>
                        <div class="text-2xl font-black text-emerald-700 mt-1">68 Unit</div>
                        <p class="text-slate-500 text-[11px] mt-1">Fasilitas pengolahan biji kakao fermentasi standar ekspor</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Pangkalan BBM & SPBU</span>
                        <div class="text-2xl font-black text-blue-700 mt-1">14 SPBU/Pertashop</div>
                        <p class="text-slate-500 text-[11px] mt-1">Menjamin kestabilan harga solar nelayan & pertalite petani</p>
                    </div>
                </div>
            </div>

            <!-- PANEL 10: BENCANA ALAM DAN GANGGUAN KEAMANAN -->
            <div id="panel-sheet-bencana" class="podes-sheet-panel hidden space-y-6">
                <div class="bg-gradient-to-r from-amber-50 via-rose-50 to-slate-50 border border-amber-200 rounded-2xl p-5 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-600 text-white flex items-center justify-center font-bold text-lg shadow-sm">⚠️</div>
                        <div>
                            <h3 class="text-lg font-black text-[#0b2545]">BENCANA ALAM DAN GANGGUAN KEAMANAN</h3>
                            <p class="text-xs text-slate-600">Mitigasi Risiko Longsor Tebing, Banjir Rob Pesisir, Sistem Peringatan Dini EWS, dan Poskamling</p>
                        </div>
                    </div>
                    <span class="bg-amber-600 text-white text-xs font-bold px-3 py-1 rounded-full">PODES 2025 • Aman</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Desa Rawan Longsor</span>
                        <div class="text-2xl font-black text-amber-600 mt-1">19 Desa</div>
                        <p class="text-slate-500 text-[11px] mt-1">Terutama di perbukitan lereng terjal Wawo, Ranteangin, dan Porehu</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Poskamling & Linmas Aktif</span>
                        <div class="text-2xl font-black text-emerald-700 mt-1">131 Desa (98,5%)</div>
                        <p class="text-slate-500 text-[11px] mt-1">Tingkat kriminalitas sangat rendah, situasi kamtibmas kondusif</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Jalur Evakuasi Terpasang</span>
                        <div class="text-2xl font-black text-blue-700 mt-1">42 Desa</div>
                        <p class="text-slate-500 text-[11px] mt-1">Rambu evakuasi gempa/tsunami pesisir Teluk Bone & sungai besar</p>
                    </div>
                </div>
            </div>

            <!-- PANEL 11: ANGKUTAN, KOMUNIKASI, DAN INFORMASI -->
            <div id="panel-sheet-angkutan" class="podes-sheet-panel hidden space-y-6">
                <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-slate-50 border border-blue-200 rounded-2xl p-5 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-indigo-600 text-white flex items-center justify-center font-bold text-lg shadow-sm">📡</div>
                        <div>
                            <h3 class="text-lg font-black text-[#0b2545]">ANGKUTAN, KOMUNIKASI, DAN INFORMASI</h3>
                            <p class="text-xs text-slate-600">Kekuatan Sinyal Seluler 4G, Akses Internet Desa, Pelabuhan Tobaku, dan Angkutan Trayek Antar Desa</p>
                        </div>
                    </div>
                    <span class="bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full">PODES 2025 • Aman</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Jaringan 4G Kuat</span>
                        <div class="text-2xl font-black text-emerald-700 mt-1">124 Desa (93,2%)</div>
                        <p class="text-slate-500 text-[11px] mt-1">Didukung tower BTS Telkomsel, Indosat, dan XL Axiata</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Akses Pelabuhan Penyeberangan</span>
                        <div class="text-2xl font-black text-blue-700 mt-1">Pelabuhan Tobaku (Katoi)</div>
                        <p class="text-slate-500 text-[11px] mt-1">Konektivitas feri harian menuju Siwa (Sulawesi Selatan)</p>
                    </div>
                    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-2xs">
                        <span class="text-slate-400 font-bold block uppercase text-[10px]">Akses Jalan Poros Trans Sulawesi</span>
                        <div class="text-2xl font-black text-slate-900 mt-1">100% Terhubung</div>
                        <p class="text-slate-500 text-[11px] mt-1">Jalur logistik utama penghubung Kendari – Kolaka – Sulsel</p>
                    </div>
                </div>
            </div>

        </section>
`;

console.log('podesSectionHtml generated. Length:', podesSectionHtml.length);

// Now let's inject this into dashboard.blade.php right before <!-- SECTION: TENTANG DESA MADANI & 4 PILAR KEMANDIRIAN -->
let dashboard = fs.readFileSync('resources/views/dashboard.blade.php', 'utf8');

const targetBeforeAbout = '<!-- SECTION: TENTANG DESA MADANI & 4 PILAR KEMANDIRIAN -->';
if (dashboard.includes(targetBeforeAbout)) {
    dashboard = dashboard.replace(targetBeforeAbout, podesSectionHtml + '\n\n        ' + targetBeforeAbout);
    console.log('Successfully inserted sectionDataPodes before sectionAbout!');
} else {
    console.error('Target not found in dashboard.blade.php!');
}

fs.writeFileSync('resources/views/dashboard.blade.php', dashboard, 'utf8');
fs.writeFileSync('public/dashboard.html', dashboard, 'utf8');
console.log('Saved dashboard.blade.php and public/dashboard.html!');

