<div id="view-lke" class="menu-view-container hidden space-y-6 animate-in fade-in duration-200">
                    <!-- 1. Header LKE & Rekap Status Kelayakan -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-4">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-4 border-b border-slate-100">
                            <div class="flex items-center gap-3.5">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 text-white flex items-center justify-center font-bold text-2xl shadow-sm shrink-0">
                                    <i class="bi bi-clipboard2-check-fill"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Lembar Kerja Evaluasi (LKE) Desa Cantik</h2>
                                        <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-black border border-emerald-300">Standar BPS RI</span>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-0.5">Instrumen evaluasi mandiri desa, verifikasi lapangan Tim Penilai BPS, dan penetapan status kelayakan Desa Cantik 2026/2027.</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2.5 self-start lg:self-auto flex-wrap">
                                <button type="button" onclick="printLkeSheet()" class="px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-bold transition flex items-center gap-1.5 shadow-2xs cursor-pointer">
                                    <i class="bi bi-printer-fill text-emerald-600"></i>
                                    <span>Cetak Lembar LKE</span>
                                </button>
                                <button type="button" onclick="saveLkeDraft(true)" class="px-3.5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition flex items-center gap-1.5 shadow-xs cursor-pointer">
                                    <i class="bi bi-save-fill"></i>
                                    <span>Simpan Draf LKE</span>
                                </button>
                            </div>
                        </div>

                        <!-- 4 Kartu KPI Ringkasan LKE -->
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                            <!-- Card 1: Nilai LKE -->
                            <div class="p-4 rounded-xl bg-blue-50/70 border border-blue-200 flex flex-col justify-between">
                                <span class="text-[11px] font-bold text-blue-700 uppercase tracking-wide">Nilai Skor LKE</span>
                                <div class="mt-2 flex items-baseline gap-2">
                                    <span id="lkeScoreDisplay" class="text-2xl sm:text-3xl font-black text-blue-900">86.5</span>
                                    <span class="text-xs text-blue-600 font-bold">/ 100</span>
                                </div>
                                <span class="text-[10px] text-blue-600 mt-1">Passing Grade: 75.0</span>
                            </div>

                            <!-- Card 2: Status Kelayakan -->
                            <div class="p-4 rounded-xl bg-emerald-50/70 border border-emerald-200 flex flex-col justify-between">
                                <span class="text-[11px] font-bold text-emerald-700 uppercase tracking-wide">Status Kelayakan</span>
                                <div class="mt-2">
                                    <span id="lkeStatusBadge" class="inline-flex items-center gap-1 text-xs sm:text-sm font-black text-emerald-900 bg-emerald-200/80 px-2.5 py-1 rounded-lg border border-emerald-400">
                                        <i class="bi bi-patch-check-fill text-emerald-600"></i>
                                        <span>LAYAK DESA CANTIK</span>
                                    </span>
                                </div>
                                <span class="text-[10px] text-emerald-600 mt-1">Memenuhi Standar BPS</span>
                            </div>

                            <!-- Card 3: Bukti Dukung Terunggah -->
                            <div class="p-4 rounded-xl bg-amber-50/70 border border-amber-200 flex flex-col justify-between">
                                <span class="text-[11px] font-bold text-amber-700 uppercase tracking-wide">Bukti Dukung Terunggah</span>
                                <div class="mt-2 flex items-baseline gap-2">
                                    <span id="lkeBuktiCount" class="text-2xl sm:text-3xl font-black text-amber-900">12</span>
                                    <span class="text-xs text-amber-700 font-bold">/ 12 Berkas (100%)</span>
                                </div>
                                <span class="text-[10px] text-amber-600 mt-1">Lengkap di Cloud SDI</span>
                            </div>

                            <!-- Card 4: Tahapan Evaluasi -->
                            <div class="p-4 rounded-xl bg-purple-50/70 border border-purple-200 flex flex-col justify-between">
                                <span class="text-[11px] font-bold text-purple-700 uppercase tracking-wide">Fase Evaluasi</span>
                                <div class="mt-2">
                                    <span id="lkeStageBadge" class="text-xs sm:text-sm font-black text-purple-900">Tahap 3: Verifikasi BPS</span>
                                </div>
                                <span class="text-[10px] text-purple-600 mt-1">Jadwal: Agustus - September</span>
                            </div>
                        </div>

                        <!-- 4 Tahap Alur Penilaian LKE Terpadu (Workflow SRS Konsolidasi 4 Peran) -->
                        <div class="pt-2">
                            <div class="text-[11px] font-extrabold uppercase tracking-wider text-[#800040] mb-2 flex items-center gap-1.5">
                                <i class="bi bi-diagram-3-fill"></i>
                                <span>Alur Evaluasi Berkelanjutan (SRS Konsolidasi Peran):</span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2.5">
                                <div class="p-3 rounded-xl bg-rose-50/70 border border-rose-300 flex items-center gap-3">
                                    <span class="w-7 h-7 rounded-full bg-[#800040] text-white font-black text-xs flex items-center justify-center shrink-0">1</span>
                                    <div class="min-w-0">
                                        <div class="text-xs font-bold text-[#800040]">Input &amp; Sahkan Desa</div>
                                        <div class="text-[10px] text-rose-800">Admin Operator Desa (Selesai)</div>
                                    </div>
                                </div>
                                <div class="p-3 rounded-xl bg-rose-50/70 border-2 border-rose-400 flex items-center gap-3 ring-2 ring-rose-200/60">
                                    <span class="w-7 h-7 rounded-full bg-[#800040] text-white font-black text-xs flex items-center justify-center shrink-0">2</span>
                                    <div class="min-w-0">
                                        <div class="text-xs font-black text-slate-900">Verifikasi Tim BPS</div>
                                        <div class="text-[10px] text-[#800040] font-bold animate-pulse">Sedang Berlangsung</div>
                                    </div>
                                </div>
                                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center gap-3">
                                    <span class="w-7 h-7 rounded-full bg-slate-300 text-slate-700 font-black text-xs flex items-center justify-center shrink-0">3</span>
                                    <div class="min-w-0">
                                        <div class="text-xs font-bold text-slate-800">Sidang Pleno &amp; Kunci</div>
                                        <div class="text-[10px] text-slate-500">Admin BPS &amp; Super Admin</div>
                                    </div>
                                </div>
                                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center gap-3 opacity-80">
                                    <span class="w-7 h-7 rounded-full bg-slate-300 text-slate-700 font-black text-xs flex items-center justify-center shrink-0">4</span>
                                    <div class="min-w-0">
                                        <div class="text-xs font-bold text-slate-800">Diseminasi Terbuka</div>
                                        <div class="text-[10px] text-slate-500">Akses Publik &amp; Pemda</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Tabel Butir Komponen LKE (Interactive Score Form & Uploads) -->
                    <div class="bg-white rounded-2xl p-4 sm:p-6 border border-slate-200 shadow-2xs space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-slate-100">
                            <div>
                                <h3 class="text-base sm:text-lg font-black text-slate-900">Daftar Indikator Penilaian Mandiri &amp; Evaluasi (4 Kelompok)</h3>
                                <p class="text-xs text-slate-500 mt-0.5">Ubah pilihan skor atau unggah bukti dukung untuk memperbarui perhitungan skor LKE secara real-time.</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-bold text-slate-500">Filter Kelompok:</span>
                                <select id="selLkeGroupFilter" onchange="filterLkeGroup(this.value)" class="text-xs font-bold bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="all">Semua Kelompok (12 Butir)</option>
                                    <option value="k1">Kelompok I: Kelembagaan (25%)</option>
                                    <option value="k2">Kelompok II: Ketersediaan Data (30%)</option>
                                    <option value="k3">Kelompok III: Kapasitas SDM (20%)</option>
                                    <option value="k4">Kelompok IV: Diseminasi (25%)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Container Injeksi Komponen LKE -->
                        <div id="lkeContainerBody" class="space-y-6">
                            <!-- Injected dynamically by renderLkeComponents() -->
                        </div>

                        <!-- Bar Aksi Khusus Berdasarkan Role Aktif (SRS Modul C - 4 Peran Terpadu) -->
                        <div id="lkeRoleActionBar" class="p-4 rounded-2xl bg-rose-50/60 border border-rose-200 flex flex-col sm:flex-row items-center justify-between gap-3">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-rose-100 text-[#800040] flex items-center justify-center font-bold text-sm shrink-0">
                                    <i class="bi bi-shield-lock-fill"></i>
                                </div>
                                <div>
                                    <div class="text-xs font-black text-slate-800">Aksi Peran: <span id="lkeActionRoleLabel" class="text-[#800040]">Admin Operator Desa</span></div>
                                    <div class="text-[11px] text-slate-500">Seluruh pengisian dan pengesahan tersimpan otomatis ke audit log sistem (SRS NFR-08).</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 flex-wrap w-full sm:w-auto justify-end">
                                <!-- Mode Publik Badge (Read-Only) -->
                                <div id="lkePublikReadOnlyBadge" class="hidden px-3.5 py-2 rounded-xl bg-slate-100 text-slate-600 text-xs font-bold border border-slate-200 flex items-center gap-1.5">
                                    <i class="bi bi-eye-fill text-slate-500"></i>
                                    <span>Mode Publik (Read-Only)</span>
                                </div>

                                <!-- Operator Desa (Gabungan Kades): Simpan & Sahkan Langsung -->
                                <button type="button" onclick="saveAndApproveLkeDesa()" id="btnLkeDesaSaveApprove" class="px-4 py-2 rounded-xl bg-[#800040] hover:bg-[#660033] text-white text-xs font-bold transition shadow-xs cursor-pointer flex items-center gap-1.5 active:scale-95">
                                    <i class="bi bi-check2-circle text-sm"></i>
                                    <span>Simpan &amp; Sahkan Penilaian LKE Desa</span>
                                </button>

                                <!-- Admin BPS: Verifikasi (Eks-Penilai) & Pleno Kunci -->
                                <button type="button" onclick="bpsVerifyLke()" id="btnLkeBpsVerify" class="hidden px-4 py-2 rounded-xl bg-[#800040] hover:bg-[#660033] text-white text-xs font-bold transition shadow-xs cursor-pointer flex items-center gap-1.5 active:scale-95">
                                    <i class="bi bi-clipboard-check text-sm"></i>
                                    <span>Simpan Nilai Verifikasi BPS &amp; Catatan</span>
                                </button>
                                <button type="button" onclick="bpsLockLkePleno()" id="btnLkeBpsLock" class="hidden px-4 py-2 rounded-xl bg-[#580827] hover:bg-[#3d0319] text-white text-xs font-bold transition shadow-xs cursor-pointer flex items-center gap-1.5 active:scale-95">
                                    <i class="bi bi-trophy-fill text-amber-400 text-sm"></i>
                                    <span>Kunci Penilaian &amp; Hasil Pleno BPS</span>
                                </button>

                                <!-- Super Admin Reset -->
                                <button type="button" onclick="superAdminResetLke()" id="btnLkeSuperReset" class="hidden px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold transition shadow-xs cursor-pointer flex items-center gap-1.5 active:scale-95">
                                    <i class="bi bi-arrow-counterclockwise text-sm"></i>
                                    <span>Reset Master</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
