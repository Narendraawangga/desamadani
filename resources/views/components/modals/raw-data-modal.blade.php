<!-- ============================================================== -->
<!-- MODAL SRS: LIHAT DATA ASLI SEKTORAL & MASKING (SRS UC-18)      -->
<!-- Fitur sensor data sensitif NIK & kontak (UU PDP No. 27/2022)   -->
<!-- ============================================================== -->
<div id="rawDataModal" class="hidden fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-4xl w-full max-h-[90vh] flex flex-col shadow-2xl border border-slate-200 overflow-hidden animate-in fade-in zoom-in duration-200">
        <!-- Modal Header -->
        <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-slate-50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-rose-100 text-[#800040] flex items-center justify-center text-xl font-bold shrink-0">
                    <i class="bi bi-table"></i>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h3 class="text-base font-black text-slate-900 leading-tight">Tabel Data Asli Statistik Sektoral (Raw Data)</h3>
                        <span class="text-[10px] font-black uppercase px-2 py-0.5 rounded-full bg-rose-100 text-[#800040] border border-rose-300">SRS UC-18</span>
                    </div>
                    <p class="text-xs text-slate-500 mt-0.5">Akses langsung data mikro tabular hasil pendataan lapangan PODES dan survei monografi desa.</p>
                </div>
            </div>
            <button type="button" onclick="closeRawDataModal()" class="w-8 h-8 rounded-full bg-slate-200 hover:bg-slate-300 text-slate-700 flex items-center justify-center text-sm cursor-pointer transition self-end sm:self-auto">✕</button>
        </div>

        <!-- Controls: Masking Toggle & Filter Dusun -->
        <div class="p-4 bg-slate-100/80 border-b border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
            <!-- Checkbox Masking Data Sensitif -->
            <label class="flex items-center gap-2 cursor-pointer select-none">
                <input type="checkbox" id="chkDataMasking" onchange="toggleDataMasking(this.checked)" checked class="w-4 h-4 rounded text-[#800040] focus:ring-[#800040] border-slate-300 cursor-pointer">
                <span class="font-extrabold text-slate-800 flex items-center gap-1.5">
                    <i class="bi bi-shield-shaded text-[#800040]"></i>
                    <span>Sensor / Samarkan Data Sensitif (UU PDP No. 27/2022)</span>
                </span>
            </label>

            <div class="flex items-center gap-2 w-full sm:w-auto">
                <span class="font-bold text-slate-600">Filter Dusun:</span>
                <select id="selRawDataDusun" onchange="filterRawDataDusun(this.value)" class="text-xs font-bold p-1.5 rounded-lg border border-slate-300 bg-white">
                    <option value="all">Semua Dusun</option>
                    <option value="Dusun I">Dusun I (Sentra Kakao)</option>
                    <option value="Dusun II">Dusun II (Pesisir Bahari)</option>
                    <option value="Dusun III">Dusun III (Pemukiman)</option>
                </select>
            </div>
        </div>

        <!-- Table Body -->
        <div class="p-4 overflow-auto flex-1">
            <table class="w-full text-left text-xs border border-slate-200 rounded-xl overflow-hidden">
                <thead class="bg-slate-100 text-slate-700 font-black text-[11px] uppercase border-b border-slate-200">
                    <tr>
                        <th class="p-2.5">No</th>
                        <th class="p-2.5">Nama Penduduk</th>
                        <th class="p-2.5">NIK (Identitas)</th>
                        <th class="p-2.5">Wilayah</th>
                        <th class="p-2.5">Status Rumah</th>
                        <th class="p-2.5">Komoditas Utama</th>
                        <th class="p-2.5">Luas (Ha)</th>
                        <th class="p-2.5">Bantuan Sosial</th>
                    </tr>
                </thead>
                <tbody id="rawDataTableBody" class="divide-y divide-slate-100 bg-white">
                    <!-- Populated by JS -->
                </tbody>
            </table>
        </div>

        <!-- Modal Footer -->
        <div class="p-4 border-t border-slate-100 bg-slate-50 flex items-center justify-between">
            <span class="text-[11px] text-slate-500 font-medium">Data terintegrasi ke Basis Data Statistik Sektoral BPS Kolaka Utara.</span>
            <div class="flex items-center gap-2">
                <button type="button" onclick="closeRawDataModal()" class="px-4 py-2 rounded-xl bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-bold transition cursor-pointer">Tutup</button>
                <button type="button" onclick="exportRawDataToExcel()" class="px-4 py-2 rounded-xl bg-[#800040] hover:bg-[#660033] text-white text-xs font-bold transition shadow-xs cursor-pointer flex items-center gap-1.5 active:scale-95">
                    <i class="bi bi-file-earmark-excel"></i>
                    <span>Ekspor Excel</span>
                </button>
            </div>
        </div>
    </div>
</div>
