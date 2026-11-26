<div id="view-tahapan" class="menu-view-container hidden space-y-6 animate-in fade-in duration-200">
                    <!-- Header 20 Tahapan -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-4 border-b border-slate-100">
                            <div class="flex items-center gap-3.5">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#7A0C3C] via-[#9F1239] to-[#580827] text-white flex items-center justify-center font-bold text-2xl shadow-sm shrink-0">
                                    <i class="bi bi-diagram-3-fill"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">20 Tahapan Pembinaan Desa Cantik</h2>
                                        <span class="px-2.5 py-0.5 rounded-full bg-rose-100 text-[#800040] text-[10px] font-black border border-rose-300">Kerangka GSBPM BPS</span>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-0.5">Monitoring pelaksanaan 20 kegiatan pembinaan statistik sektoral dari koordinasi persiapan hingga sidang pleno Desa Cantik terbaik.</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2.5 self-start lg:self-auto flex-wrap">
                                <button type="button" onclick="openUploadOutputModal(null)" class="px-3.5 py-2 rounded-xl bg-[#800040] hover:bg-[#660033] text-white text-xs font-bold transition flex items-center gap-1.5 shadow-xs cursor-pointer">
                                    <i class="bi bi-cloud-arrow-up-fill"></i>
                                    <span>Unggah Output Tahapan</span>
                                </button>
                            </div>
                        </div>

                        <!-- Progress Bar 20 Tahapan -->
                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-xs font-bold">
                                <span class="text-slate-700 flex items-center gap-1.5">
                                    <i class="bi bi-clock-history text-[#800040]"></i>
                                    <span>Progres Pembinaan Keseluruhan:</span>
                                </span>
                                <span class="text-[#800040] font-black">14 / 20 Tahapan Selesai (70%)</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden border border-slate-200">
                                <div class="bg-gradient-to-r from-[#7A0C3C] via-[#9F1239] to-[#BE185D] h-full rounded-full transition-all duration-500" style="width: 70%"></div>
                            </div>
                            <div class="flex justify-between text-[10px] text-slate-400">
                                <span>Persiapan (2026)</span>
                                <span>Pembinaan Lapangan (April - Juli 2027)</span>
                                <span>Evaluasi &amp; Pleno (Agustus - September 2027)</span>
                            </div>
                        </div>

                        <!-- Filter Fase Tahapan -->
                        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 text-xs">
                            <button type="button" onclick="filterTahapanFase('all')" id="btnTahapFase-all" class="tahap-fase-btn active px-3 py-1.5 rounded-xl font-bold bg-[#800040] text-white shadow-2xs">Semua (20 Tahap)</button>
                            <button type="button" onclick="filterTahapanFase('1')" id="btnTahapFase-1" class="tahap-fase-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200 text-slate-700">Fase I: Persiapan (1-4)</button>
                            <button type="button" onclick="filterTahapanFase('2')" id="btnTahapFase-2" class="tahap-fase-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200 text-slate-700">Fase II: Pembinaan Teknis (5-14)</button>
                            <button type="button" onclick="filterTahapanFase('3')" id="btnTahapFase-3" class="tahap-fase-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200 text-slate-700">Fase III: Diseminasi &amp; Laporan (15-18)</button>
                            <button type="button" onclick="filterTahapanFase('4')" id="btnTahapFase-4" class="tahap-fase-btn px-3 py-1.5 rounded-xl font-bold bg-slate-100 hover:bg-slate-200 text-slate-700">Fase IV: Penilaian &amp; Pleno (19-20)</button>
                        </div>
                    </div>

                    <!-- Grid Kartu 20 Tahapan -->
                    <div id="tahapanCardsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Injected dynamically by render20TahapanList() -->
                    </div>
                </div>

                <!-- ===================================================================== -->
                <!-- MODUL F: GENERATOR OTOMATIS LAPORAN DESA CANTIK (SRS UC-21)           -->
