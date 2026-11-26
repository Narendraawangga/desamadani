<div id="view-laporan" class="menu-view-container hidden space-y-6 animate-in fade-in duration-200">
                    <!-- Header Laporan -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-4 border-b border-slate-100">
                            <div class="flex items-center gap-3.5">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-600 to-yellow-600 text-white flex items-center justify-center font-bold text-2xl shadow-sm shrink-0">
                                    <i class="bi bi-file-earmark-text-fill"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Penyusunan Otomatis Laporan Desa Cantik</h2>
                                        <span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[10px] font-black border border-amber-300">Generator Terotomasi (UC-21)</span>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-0.5">Sistem mengompilasi otomatis ringkasan 20 tahapan, bukti dukung LKE, data PODES, dan dokumentasi foto ke naskah laporan resmi siap cetak.</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2.5 self-start lg:self-auto flex-wrap">
                                <button type="button" onclick="compileDescanReport()" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold transition flex items-center gap-1.5 shadow-2xs cursor-pointer">
                                    <i class="bi bi-arrow-repeat text-emerald-600"></i>
                                    <span>Muat Ulang Data Terkini</span>
                                </button>
                                <button type="button" onclick="printDescanReport()" class="px-3.5 py-2 rounded-xl bg-[#800040] hover:bg-[#660033] text-white text-xs font-bold transition flex items-center gap-1.5 shadow-xs cursor-pointer">
                                    <i class="bi bi-printer-fill"></i>
                                    <span>Cetak Laporan Resmi (PDF)</span>
                                </button>
                                <button type="button" onclick="exportDescanReportWord()" class="px-3.5 py-2 rounded-xl bg-[#005ea6] hover:bg-[#004e8a] text-white text-xs font-bold transition flex items-center gap-1.5 shadow-xs cursor-pointer">
                                    <i class="bi bi-file-earmark-word-fill"></i>
                                    <span>Ekspor Word (.docx)</span>
                                </button>
                            </div>
                        </div>

                        <!-- Info Bar Penyusunan -->
                        <div class="p-3.5 rounded-xl bg-amber-50/70 border border-amber-200 text-xs text-amber-950 flex items-center justify-between flex-wrap gap-2">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-ping"></span>
                                <span>Status Kompilasi: <b>Siap Diterbitkan</b> • Seluruh bab laporan terhubung langsung ke basis data SDI.</span>
                            </div>
                            <span class="text-[10px] font-mono bg-white px-2 py-0.5 rounded border border-amber-300">LAPORAN-DESCAN-BPS-7408-2027</span>
                        </div>
                    </div>

                    <!-- Dokumen Pratinjau Lembar Laporan A4 Resmi -->
                    <div class="bg-slate-800 rounded-3xl p-4 sm:p-8 flex justify-center overflow-auto shadow-2xl border border-slate-700">
                        <div id="descanReportPaper" class="w-full max-w-4xl bg-white rounded-xl shadow-xl p-8 sm:p-12 text-slate-800 space-y-6">
                            <!-- Kop Resmi -->
                            <div class="border-b-4 border-double border-slate-900 pb-4 text-center space-y-1">
                                <div class="text-[11px] font-black tracking-widest text-[#800040] uppercase">BADAN PUSAT STATISTIK KABUPATEN KOLAKA UTARA</div>
                                <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight uppercase">LAPORAN HASIL PELAKSANAAN PEMBINAAN DESA CANTIK</h1>
                                <div class="text-xs sm:text-sm font-bold text-slate-700" id="repDocVillageSub">DESA KAMISI • KECAMATAN KODEOHA • TAHUN 2026/2027</div>
                            </div>

                            <!-- Bab I: Identitas Desa Binaan -->
                            <div class="space-y-2">
                                <h3 class="text-sm font-black text-slate-900 border-b border-slate-200 pb-1 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-md bg-[#800040] text-white text-xs flex items-center justify-center">I</span>
                                    <span>PROFIL UMUM &amp; KELEMBAGAAN DESA BINAAN</span>
                                </h3>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs pt-1">
                                    <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                                        <div class="text-[10px] text-slate-400">Desa Binaan:</div>
                                        <div id="repFieldDesa" class="font-bold text-slate-900">Desa Kamisi</div>
                                    </div>
                                    <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                                        <div class="text-[10px] text-slate-400">Kecamatan:</div>
                                        <div id="repFieldKec" class="font-bold text-slate-900">Kodeoha</div>
                                    </div>
                                    <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                                        <div class="text-[10px] text-slate-400">Kepala Desa:</div>
                                        <div id="repFieldKades" class="font-bold text-slate-900">Pemerintah Desa</div>
                                    </div>
                                    <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                                        <div class="text-[10px] text-slate-400">PIC / Agen Statistik:</div>
                                        <div id="repFieldPic" class="font-bold text-emerald-700">Tim Agen Statistik</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bab II: Rekapitulasi Progres 20 Tahapan -->
                            <div class="space-y-2">
                                <h3 class="text-sm font-black text-slate-900 border-b border-slate-200 pb-1 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-md bg-[#800040] text-white text-xs flex items-center justify-center">II</span>
                                    <span>RINGKASAN REALISASI 20 TAHAPAN PEMBINAAN BPS</span>
                                </h3>
                                <p class="text-xs text-slate-600">Pelaksanaan pembinaan mencakup 4 fase berkesinambungan dengan persentase pemenuhan output:</p>
                                <div class="grid sm:grid-cols-4 gap-2 text-center text-xs">
                                    <div class="p-2 rounded-lg bg-emerald-50 border border-emerald-200">
                                        <div class="text-[10px] text-emerald-800 font-bold">Fase I: Persiapan</div>
                                        <div class="font-black text-emerald-950 text-sm mt-0.5">100% (4/4)</div>
                                    </div>
                                    <div class="p-2 rounded-lg bg-emerald-50 border border-emerald-200">
                                        <div class="text-[10px] text-emerald-800 font-bold">Fase II: Pembinaan</div>
                                        <div class="font-black text-emerald-950 text-sm mt-0.5">80% (8/10)</div>
                                    </div>
                                    <div class="p-2 rounded-lg bg-blue-50 border border-blue-200">
                                        <div class="text-[10px] text-blue-800 font-bold">Fase III: Diseminasi</div>
                                        <div class="font-black text-blue-950 text-sm mt-0.5">75% (3/4)</div>
                                    </div>
                                    <div class="p-2 rounded-lg bg-slate-50 border border-slate-200">
                                        <div class="text-[10px] text-slate-600 font-bold">Fase IV: Pleno</div>
                                        <div class="font-black text-slate-900 text-sm mt-0.5">Proses</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bab III: Pemenuhan Nilai Lembar Kerja Evaluasi (LKE) -->
                            <div class="space-y-2">
                                <h3 class="text-sm font-black text-slate-900 border-b border-slate-200 pb-1 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-md bg-emerald-600 text-white text-xs flex items-center justify-center">III</span>
                                    <span>HASIL EVALUASI KOMPONEN PENILAIAN LKE</span>
                                </h3>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between text-xs">
                                    <div>
                                        <div class="font-bold text-slate-800">Skor Akhir Evaluasi: <span id="repFieldLkeScore" class="text-base font-black text-emerald-700">86.5 / 100</span></div>
                                        <div class="text-[11px] text-slate-500">Kategori: Mandiri • Predikat: <b>LAYAK DESA CANTIK</b></div>
                                    </div>
                                    <div class="text-right text-[11px] text-slate-500">
                                        <div>Pengesahan Kades: <span class="text-emerald-700 font-bold">✓ Terverifikasi</span></div>
                                        <div>Verifikasi Tim BPS: <span class="text-blue-700 font-bold">✓ Terverifikasi</span></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bab IV: Catatan Naratif, Inovasi, & Rekomendasi (Editable by Operator/Admin) -->
                            <div class="space-y-3">
                                <h3 class="text-sm font-black text-slate-900 border-b border-slate-200 pb-1 flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-md bg-emerald-600 text-white text-xs flex items-center justify-center">IV</span>
                                    <span>NARASI CAPAIAN, KENDALA &amp; REKOMENDASI PEMBINAAN</span>
                                </h3>
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-700 mb-1">A. Capaian &amp; Inovasi Utama Desa:</label>
                                    <textarea id="repTextInovasi" rows="2" class="w-full text-xs p-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-1 focus:ring-[#800040] text-slate-800">Berhasil menyusun Monografi Desa berstandar BPS pertama di kecamatan, pendataan lengkap 100% kepala keluarga perkebunan kakao, dan penerapan Pojok Statistik digital desa.</textarea>
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-700 mb-1">B. Rekomendasi Keberlanjutan Tim Pembina BPS:</label>
                                    <textarea id="repTextRekomendasi" rows="2" class="w-full text-xs p-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-1 focus:ring-[#800040] text-slate-800">Direkomendasikan alokasi anggaran APBDes tahun anggaran mendatang untuk pemeliharaan WebGIS desa serta pelatihan berkala agen statistik muda tingkat RT/dusun.</textarea>
                                </div>
                            </div>

                            <!-- Lembar Tanda Tangan -->
                            <div class="pt-6 grid grid-cols-2 text-center text-xs text-slate-800">
                                <div>
                                    <div>Mengetahui,</div>
                                    <div class="font-bold mt-1">Kepala BPS Kabupaten Kolaka Utara</div>
                                    <div class="h-16 flex items-center justify-center">
                                        <span class="text-[10px] text-emerald-700 font-mono border border-emerald-300 bg-emerald-50 px-2 py-0.5 rounded">Tanda Tangan Digital BPS</span>
                                    </div>
                                    <div class="font-black text-slate-900 underline">Tim Pembina Desa Cantik</div>
                                    <div class="text-[10px] text-slate-500">NIP. 19850615 200801 1 002</div>
                                </div>
                                <div>
                                    <div>Kolaka Utara, 2026/2027</div>
                                    <div class="font-bold mt-1">Kepala Desa / Aparatur Desa Binaan</div>
                                    <div class="h-16 flex items-center justify-center">
                                        <span class="text-[10px] text-blue-700 font-mono border border-blue-300 bg-blue-50 px-2 py-0.5 rounded">Pengesahan Resmi Desa</span>
                                    </div>
                                    <div id="repDocKadesSign" class="font-black text-slate-900 underline">Pemerintah Desa</div>
                                    <div class="text-[10px] text-slate-500">Penanggung Jawab Statistik Desa</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
