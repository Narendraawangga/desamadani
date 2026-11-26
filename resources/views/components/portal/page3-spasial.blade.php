<!-- HALAMAN 3: PETA TEMATIK INTERAKTIF (LEAFLET 15 KECAMATAN + 6 LAPISAN DATA)-->
        <!-- ========================================================================= -->
        <section id="portalPage3" class="portal-page {{ $curPage === 3 ? 'active' : '' }} w-full py-10">
            <div class="max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
                
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-slate-200 pb-5">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100/80 text-[#3B4D3B] text-xs font-bold mb-2">
                            <span><i class="bi bi-map-fill"></i> WEBGIS TEMATIK PODES 2025</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">Peta Tematik Interaktif 15 Kecamatan</h2>
                        <p class="text-slate-600 text-sm mt-1">Visualisasi 6 lapisan indikator spasial riil dan direktori desa/kelurahan konstituen.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span id="presisiScopeBadge" class="px-3.5 py-1.5 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs border border-slate-200">
                            Kabupaten Kolaka Utara
                        </span>
                    </div>
                </div>

                <!-- Split Map & Inspection Layout (Equalized Heights & Flush Bottom Line) -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                    <div class="lg:col-span-8 flex flex-col h-full bg-white rounded-3xl p-4 sm:p-5 border border-slate-200/90 shadow-sm relative justify-between gap-3">
                        <div class="w-full flex-1 min-h-[500px] sm:min-h-[560px] rounded-2xl overflow-hidden relative">
                            <div id="mapPresisi" class="w-full h-full"></div>
                            
                            <div class="absolute top-4 left-4 z-[500] bg-white/95 backdrop-blur-md px-3.5 py-2 rounded-xl shadow-md border border-slate-200/80 text-xs">
                                <span class="text-slate-400 font-semibold text-[10px] block">LAPISAN AKTIF</span>
                                <span id="presisiMapMetricIndicator" class="font-extrabold text-slate-800">Sentra Industri Mikro Kecil (IMK)</span>
                            </div>

                            <div id="presisiMapLegend" class="absolute bottom-4 right-4 z-[500] bg-white/95 backdrop-blur-md p-3 rounded-xl shadow-md border border-slate-200/80 text-xs"></div>
                        </div>

                        <!-- Integrated Map Footer Console (Eliminates dead space, perfectly aligns bottom with right panel) -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 pt-1 text-xs">
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200/90 text-slate-700 text-[11px] font-semibold">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span>Wilayah: <strong id="mapFooterScopeText" class="text-slate-900">Kabupaten Kolaka Utara</strong></span>
                                </span>
                                <span id="mapFooterDesaBadge" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-emerald-50 text-emerald-800 text-[11px] font-bold border border-emerald-200/80 shadow-2xs">
                                    <i class="bi bi-geo-alt-fill text-emerald-600"></i>
                                    <span>15 Kecamatan • 133 Desa/Kelurahan</span>
                                </span>
                            </div>
                            <div class="flex items-center gap-1.5 shrink-0">
                                <button type="button" onclick="window.PresisiEngine.resetMapView()" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-[11px] transition flex items-center gap-1 cursor-pointer" title="Reset Tampilan Peta">
                                    <i class="bi bi-arrows-fullscreen"></i>
                                    <span>Reset Sudut</span>
                                </button>
                                <a href="#presisiAutomatedAnalysisSection" class="px-3.5 py-1.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-[11px] transition flex items-center gap-1 cursor-pointer shadow-2xs">
                                    <span>Analisis Bawah</span>
                                    <i class="bi bi-arrow-down-short text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col h-full justify-between bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/90 shadow-sm space-y-4">
                        <div class="space-y-4">
                            <div class="pb-3 border-b border-slate-100">
                                <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full uppercase tracking-wider">DETAIL KECAMATAN TERPILIH</span>
                                <h3 id="presisiAnalisisTitle" class="text-2xl font-black text-slate-900 mt-2">Kecamatan Lasusua</h3>
                                <p id="presisiAnalisisSubtitle" class="text-xs text-slate-500 mt-0.5">Ibu Kota Kabupaten Kolaka Utara • 12 Desa/Kelurahan</p>
                            </div>

                            <div class="grid grid-cols-2 gap-2.5 text-xs">
                                <div class="bg-slate-50 p-3 rounded-xl border border-slate-200/80">
                                    <span class="text-slate-400 text-[10px] block">TOTAL PENDUDUK</span>
                                    <span id="analisisKpiVal1" class="text-base font-extrabold text-slate-800">26.729 Jiwa</span>
                                </div>
                                <div class="bg-slate-50 p-3 rounded-xl border border-slate-200/80">
                                    <span class="text-slate-400 text-[10px] block">LISTRIK PLN</span>
                                    <span id="analisisKpiVal2" class="text-base font-extrabold text-emerald-700">8.463 KK</span>
                                </div>
                                <div class="bg-slate-50 p-3 rounded-xl border border-slate-200/80">
                                    <span class="text-slate-400 text-[10px] block">SENTRA IMK</span>
                                    <span id="analisisKpiVal3" class="text-base font-extrabold text-amber-600">237 Unit</span>
                                </div>
                                <div class="bg-slate-50 p-3 rounded-xl border border-slate-200/80">
                                    <span class="text-slate-400 text-[10px] block">BUMDES AKTIF</span>
                                    <span id="analisisKpiVal4" class="text-base font-extrabold text-indigo-700">13 Unit</span>
                                </div>
                            </div>

                            <div class="space-y-3 pt-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Daftar Desa / Kelurahan Konstituen</h4>
                                    </div>
                                    <span id="badgeJumlahDesaWilayah" class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200/80 shadow-2xs">12 Wilayah</span>
                                </div>

                                <!-- Instant Search Box -->
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    </span>
                                    <input type="text" id="presisiVillageSearchInput" oninput="window.PresisiEngine.onVillageSearch(this.value)" placeholder="Cari desa atau kelurahan..." class="w-full pl-10 pr-9 py-2 text-xs bg-slate-50/90 hover:bg-slate-100/80 focus:bg-white border border-slate-200/90 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all placeholder:text-slate-400 text-slate-800 shadow-2xs">
                                    <button type="button" id="presisiVillageSearchClear" onclick="window.PresisiEngine.clearVillageSearch()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-700 hidden cursor-pointer">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>

                                <!-- Sleek Interactive Cards Container -->
                                <div id="presisiQuickVillageList" class="flex-1 min-h-[220px] max-h-[360px] overflow-y-auto space-y-2 pr-1 text-xs scrollbar-thin scrollbar-thumb-slate-200"></div>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-slate-100 mt-2">
                            <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="w-full py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all flex items-center justify-center gap-1.5 cursor-pointer">
                                <span>Buka Tabel Lengkap Desa di Halaman 2</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ========================================================================= -->
                <!-- PUSAT ANALISIS & INTELIJEN WILAYAH (OTOMASI & GRAFIK INTERAKTIF DUA ARAH) -->
                <!-- ========================================================================= -->
                <div id="presisiAutomatedAnalysisSection" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-sm space-y-6">
                    <!-- Top Bar: Header, Scope Indicator, & Automation Controls -->
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-5 border-b border-slate-100">
                        <div>
                            <div class="flex items-center gap-2 flex-wrap mb-1.5">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-[11px] font-bold border border-emerald-200/80 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span>ANALISIS & INTELIJEN WILAYAH</span>
                                </span>
                                <span id="autoAnalysisActiveScopePill" class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 text-[11px] font-semibold border border-slate-200">
                                    Kecamatan Lasusua • Seluruh Desa
                                </span>
                                <span id="autoAnalysisDesaActivePill" class="hidden px-2.5 py-1 rounded-full bg-emerald-100/90 text-emerald-900 text-[11px] font-bold border border-emerald-300">
                                    Desa Terpilih
                                </span>
                            </div>
                            <h3 id="autoAnalysisSectionTitle" class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">
                                Visualisasi Komparasi & Analisis Sektoral
                            </h3>
                            <p id="autoAnalysisSectionSubtitle" class="text-xs sm:text-sm text-slate-500 mt-0.5">
                                Terhubung langsung dengan peta interaktif dan direktori desa untuk pemetaan potensi riil PODES 2025.
                            </p>
                        </div>

                        <!-- Action Buttons: Reset Scope & Automation Auto-Play -->
                        <div class="flex items-center gap-2 flex-wrap shrink-0">
                            <button type="button" 
                                    id="btnResetDesaScope" 
                                    onclick="window.PresisiEngine.resetDesaSelection()" 
                                    class="hidden px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1.5 cursor-pointer">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                <span>Tinjau Semua Desa</span>
                            </button>

                            <button type="button" 
                                    id="btnAutoPlayTour" 
                                    onclick="window.PresisiEngine.toggleAutoPlay()" 
                                    class="px-4 py-2 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-[#3B4D3B] border border-emerald-300 text-xs font-bold transition-all flex items-center gap-2 cursor-pointer shadow-2xs group">
                                <span class="w-2 h-2 rounded-full bg-emerald-600 group-hover:scale-125 transition-transform" id="btnAutoPlayDot"></span>
                                <span id="btnAutoPlayText">Putar Otomatis</span>
                                <i class="bi bi-play-circle-fill text-sm" id="btnAutoPlayIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Topic Selector Bar (Clean Titles - No "Tabel" Word!) -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-xs font-bold text-slate-500 uppercase tracking-wider">
                            <span class="flex items-center gap-1.5">
                                <i class="bi bi-sliders text-emerald-600"></i>
                                <span>Pilih Indikator Analisis:</span>
                            </span>
                            <span id="autoAnalysisCurrentTopicName" class="text-slate-800 font-extrabold normal-case">
                                Sentra Industri Mikro & Kecil (IMK)
                            </span>
                        </div>

                        <!-- Horizontal Scrollable Topic Chips (WITHOUT "Tabel" word) -->
                        <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-thin scrollbar-thumb-slate-200 text-xs">
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('imk')" id="topic-chip-imk" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-[#3B4D3B] text-white shadow-xs">
                                <i class="bi bi-buildings"></i>
                                <span>Industri Mikro & Kecil</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('listrik')" id="topic-chip-listrik" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-lightning-charge"></i>
                                <span>Elektrifikasi & Energi</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('pasar')" id="topic-chip-pasar" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-shop"></i>
                                <span>Sarana Perdagangan & Pasar</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('kesehatan')" id="topic-chip-kesehatan" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-heart-pulse"></i>
                                <span>Kesehatan & Posyandu</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('pendidikan')" id="topic-chip-pendidikan" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-mortarboard"></i>
                                <span>Sarana Pendidikan</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('komunikasi')" id="topic-chip-komunikasi" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-broadcast"></i>
                                <span>BTS & Sinyal Internet</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('keuangan')" id="topic-chip-keuangan" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-wallet2"></i>
                                <span>Kemandirian BUMDes</span>
                            </button>
                            <button type="button" onclick="window.PresisiEngine.setAnalysisTopic('pemerintah')" id="topic-chip-pemerintah" class="analysis-topic-chip px-3.5 py-2 rounded-xl font-bold whitespace-nowrap transition-all flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700">
                                <i class="bi bi-people"></i>
                                <span>Aparatur Desa</span>
                            </button>
                        </div>
                    </div>

                    <!-- 4 Automated KPI Metric Cards (Adaptive for Village vs Kecamatan) -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                        <div class="bg-slate-50/90 rounded-2xl p-4 border border-slate-200/90 hover:border-emerald-300 transition-all shadow-2xs">
                            <span id="autoKpiLabel1" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Capaian Wilayah</span>
                            <div class="flex items-baseline gap-1.5 mt-1">
                                <span id="autoKpiVal1" class="text-2xl sm:text-3xl font-black text-slate-900 tabular-nums">0</span>
                                <span id="autoKpiUnit1" class="text-xs font-semibold text-slate-500">Unit</span>
                            </div>
                            <span id="autoKpiSub1" class="text-[11px] text-emerald-800 font-medium mt-0.5 block truncate">-</span>
                        </div>

                        <div class="bg-slate-50/90 rounded-2xl p-4 border border-slate-200/90 hover:border-emerald-300 transition-all shadow-2xs">
                            <span id="autoKpiLabel2" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Rata-Rata Wilayah</span>
                            <div class="flex items-baseline gap-1.5 mt-1">
                                <span id="autoKpiVal2" class="text-2xl sm:text-3xl font-black text-slate-900 tabular-nums">0</span>
                                <span id="autoKpiUnit2" class="text-xs font-semibold text-slate-500">Unit/Desa</span>
                            </div>
                            <span id="autoKpiSub2" class="text-[11px] text-slate-500 font-medium mt-0.5 block truncate">-</span>
                        </div>

                        <div class="bg-slate-50/90 rounded-2xl p-4 border border-slate-200/90 hover:border-emerald-300 transition-all shadow-2xs">
                            <span id="autoKpiLabel3" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Peringkat & Posisi</span>
                            <div class="flex items-baseline gap-1.5 mt-1">
                                <span id="autoKpiVal3" class="text-2xl sm:text-3xl font-black text-emerald-700 tabular-nums">-</span>
                                <span id="autoKpiUnit3" class="text-xs font-semibold text-slate-500">-</span>
                            </div>
                            <span id="autoKpiSub3" class="text-[11px] text-emerald-700 font-bold mt-0.5 block truncate">-</span>
                        </div>

                        <div class="bg-slate-50/90 rounded-2xl p-4 border border-slate-200/90 hover:border-emerald-300 transition-all shadow-2xs">
                            <span id="autoKpiLabel4" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Evaluasi Relatif</span>
                            <div class="flex items-baseline gap-1.5 mt-1">
                                <span id="autoKpiVal4" class="text-2xl sm:text-3xl font-black text-amber-600 tabular-nums">-</span>
                                <span id="autoKpiUnit4" class="text-xs font-semibold text-slate-500">-</span>
                            </div>
                            <span id="autoKpiSub4" class="text-[11px] text-slate-600 font-medium mt-0.5 block truncate">-</span>
                        </div>
                    </div>

                    <!-- Visual Charts & Narrative Analysis Grid (8 : 4 Grid) -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                        <!-- Left Chart: Comparative Bar Chart (8 Cols) -->
                        <div class="lg:col-span-8 bg-slate-50/60 rounded-2xl p-5 border border-slate-200/90 flex flex-col justify-between">
                            <div class="flex items-center justify-between pb-3 border-b border-slate-200/70 mb-3 flex-wrap gap-2">
                                <div>
                                    <h4 id="autoChartBarTitle" class="text-sm font-extrabold text-slate-800">
                                        Perbandingan Capaian Antar-Desa
                                    </h4>
                                    <p class="text-[11px] text-slate-500">
                                        Klik batang grafik untuk langsung memilih desa di peta & direktori
                                    </p>
                                </div>
                                <span id="autoChartBarBadge" class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-900 border border-emerald-300">
                                    INTERAKTIF DUA ARAH
                                </span>
                            </div>

                            <div class="relative w-full h-[320px] sm:h-[350px]">
                                <canvas id="autoAnalysisBarCanvas"></canvas>
                            </div>

                            <div class="flex items-center justify-between pt-3 border-t border-slate-200/70 text-[11px] text-slate-500">
                                <div class="flex items-center gap-3">
                                    <span class="flex items-center gap-1.5">
                                        <span class="w-3 h-3 rounded-md bg-[#3B4D3B]"></span>
                                        <span>Desa Terpilih</span>
                                    </span>
                                    <span class="flex items-center gap-1.5">
                                        <span class="w-3 h-3 rounded-md bg-emerald-200"></span>
                                        <span>Desa Lainnya</span>
                                    </span>
                                </div>
                                <span id="autoChartFootnote" class="italic">Sumber: Data PODES BPS Kolaka Utara 2025</span>
                            </div>
                        </div>

                        <!-- Right Chart & Executive Narrative (4 Cols) -->
                        <div class="lg:col-span-4 flex flex-col gap-4">
                            <!-- Donut Chart: Proportion / Share -->
                            <div class="bg-slate-50/60 rounded-2xl p-5 border border-slate-200/90 flex-1 flex flex-col justify-between">
                                <div class="flex items-center justify-between pb-2 border-b border-slate-200/70 mb-2">
                                    <h4 id="autoChartDonutTitle" class="text-sm font-extrabold text-slate-800">
                                        Porsi Kontribusi Wilayah
                                    </h4>
                                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-slate-200/80 text-slate-700">PROPORSI</span>
                                </div>
                                <div class="relative w-full h-[180px] flex items-center justify-center">
                                    <canvas id="autoAnalysisDonutCanvas"></canvas>
                                </div>
                                <div id="autoChartDonutLegend" class="text-[11px] text-slate-600 space-y-1 pt-2 border-t border-slate-200/70"></div>
                            </div>

                            <!-- Executive AI-Style Automated Insight Narrative Box -->
                            <div class="bg-emerald-50/70 rounded-2xl p-5 border border-emerald-200/90 relative overflow-hidden">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-6 h-6 rounded-lg bg-emerald-600 text-white flex items-center justify-center text-xs shadow-xs">
                                        <i class="bi bi-lightbulb-fill"></i>
                                    </div>
                                    <h5 class="text-xs font-black text-emerald-950 uppercase tracking-wider">
                                        Insight Analisis Otomatis
                                    </h5>
                                </div>
                                <div id="autoAnalysisNarrativeText" class="text-xs text-emerald-900 leading-relaxed font-normal">
                                    Memuat analisis cerdas untuk wilayah terpilih...
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Selected Village Mini Detail Bar (Only shown when a specific village is selected) -->
                    <div id="autoAnalysisDesaDetailBar" class="hidden p-4 rounded-2xl bg-gradient-to-r from-emerald-50 via-teal-50 to-slate-50 border border-emerald-200/80 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-[#3B4D3B] text-white flex items-center justify-center text-lg shrink-0 shadow-xs">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <span id="autoDesaBarName" class="font-black text-sm text-slate-900">Desa Watumotaha</span>
                                    <span id="autoDesaBarStatus" class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-200 text-emerald-900">DESA</span>
                                </div>
                                <div class="text-[11px] text-slate-500 mt-0.5 flex items-center gap-2 flex-wrap">
                                    <span id="autoDesaBarPop">350 Jiwa</span>
                                    <span>•</span>
                                    <span id="autoDesaBarKomoditas">Kakao</span>
                                    <span>•</span>
                                    <span id="autoDesaBarKades">Kepala Desa Aktif</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="window.PresisiEngine.zoomToSelectedVillage()" class="px-3 py-1.5 rounded-xl bg-white hover:bg-slate-100 text-slate-700 font-bold border border-slate-200 transition shadow-2xs flex items-center gap-1.5 cursor-pointer">
                                <i class="bi bi-crosshair"></i>
                                <span>Fokus di Peta</span>
                            </button>
                            <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="px-3.5 py-1.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold transition shadow-2xs flex items-center gap-1.5 cursor-pointer">
                                <span>Lihat Seluruh Tabel</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Bottom Navigation Buttons for Page 3 -->
                <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                    <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="px-5 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 font-bold text-xs sm:text-sm transition-all flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        <span>Halaman 2: Agregat 15 Kecamatan</span>
                    </a>
                    <a href="/descan" class="px-6 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-xs sm:text-sm shadow-sm transition-all flex items-center gap-2 cursor-pointer">
                        <span>Portal Lengkap Desa Cantik (DESCAN)</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
