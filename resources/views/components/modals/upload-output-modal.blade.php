<!-- ============================================================== -->
<!-- MODAL SRS: UNGGAH OUTPUT 20 TAHAPAN (SRS UC-05)                -->
<!-- ============================================================== -->
<div id="uploadOutputModal" class="hidden fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-lg w-full flex flex-col shadow-2xl border border-slate-200 overflow-hidden animate-in fade-in zoom-in duration-200">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-rose-100 text-[#800040] flex items-center justify-center text-xl font-bold">
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                </div>
                <div>
                    <h3 class="text-base font-black text-slate-900 leading-tight">Unggah Berkas Output Tahapan</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Kirim berkas hasil pembinaan untuk ditinjau Admin BPS (UC-05)</p>
                </div>
            </div>
            <button type="button" onclick="closeUploadOutputModal()" class="w-8 h-8 rounded-full bg-slate-200 hover:bg-slate-300 text-slate-700 flex items-center justify-center text-sm cursor-pointer transition">✕</button>
        </div>

        <form id="uploadOutputForm" onsubmit="submitOutputTahapForm(event)" class="p-6 space-y-4">
            <div>
                <label for="selTahapUpload" class="block text-xs font-bold text-slate-700 mb-1">Pilih Nomor Tahapan Pembinaan:</label>
                <select id="selTahapUpload" required class="w-full text-xs font-medium p-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#800040]">
                    <!-- Options populated dynamically -->
                </select>
            </div>
            <div>
                <label for="inpOutputKeterangan" class="block text-xs font-bold text-slate-700 mb-1">Keterangan / Catatan Singkat:</label>
                <textarea id="inpOutputKeterangan" rows="2" required placeholder="Contoh: Dokumen SK Agen Statistik telah ditandatangani Kepala Desa." class="w-full text-xs p-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#800040] text-slate-800"></textarea>
            </div>
            <div>
                <label for="inpOutputFile" class="block text-xs font-bold text-slate-700 mb-1">Pilih Berkas Output (PDF / Excel / ZIP - Maks 20 MB):</label>
                <input type="file" id="inpOutputFile" required accept=".pdf,.xlsx,.xls,.docx,.zip,.png,.jpg" class="w-full text-xs p-2 rounded-xl border border-dashed border-slate-300 bg-slate-50 cursor-pointer">
                <span class="text-[10px] text-slate-400 mt-1 block">Validasi format &amp; ukuran berkas aktif (SRS NFR-03 &amp; NFR-07).</span>
            </div>

            <div class="pt-2 flex items-center justify-between gap-2">
                <button type="button" onclick="closeUploadOutputModal()" class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-700 text-xs font-bold">Batal</button>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#800040] hover:bg-[#660033] text-white text-xs font-black shadow-xs cursor-pointer flex items-center gap-1.5 active:scale-95">
                    <i class="bi bi-cloud-arrow-up"></i>
                    <span>Kirim Berkas Output</span>
                </button>
            </div>
        </form>
    </div>
</div>
