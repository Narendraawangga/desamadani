<!-- ============================================================== -->
<!-- MODAL SRS: PRATINJAU TEMPLATE PUBLIKASI DESA (TUGAS MENTOR)    -->
<!-- Robbith (Profil), Asma (Monografi), Aidil (Tematik), Rini      -->
<!-- (Leaflet), Ilham (Infografis)                                   -->
<!-- ============================================================== -->
<div id="templatePreviewModal" class="hidden fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] flex flex-col shadow-2xl border border-slate-200 overflow-hidden animate-in fade-in zoom-in duration-200">
        <!-- Modal Header -->
        <div class="p-5 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <div class="flex items-center gap-3">
                <div id="tplModalIcon" class="w-10 h-10 rounded-xl bg-rose-100 text-[#800040] flex items-center justify-center text-xl font-bold">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h3 id="tplModalTitle" class="text-base font-black text-slate-900 leading-tight">Pratinjau Template Publikasi</h3>
                        <span id="tplModalPicBadge" class="text-[10px] font-black uppercase px-2 py-0.5 rounded-full bg-rose-100 text-[#800040] border border-rose-300">PIC: Tim Teknis</span>
                    </div>
                    <p id="tplModalSub" class="text-xs text-slate-500 mt-0.5">Format standar Satu Data Indonesia berstandar BPS Kolaka Utara</p>
                </div>
            </div>
            <button type="button" onclick="closeTemplatePreviewModal()" class="w-8 h-8 rounded-full bg-slate-200 hover:bg-slate-300 text-slate-700 flex items-center justify-center text-sm cursor-pointer transition">✕</button>
        </div>

        <!-- Modal Body (Preview Canvas) -->
        <div class="p-6 overflow-y-auto space-y-4 flex-1">
            <div id="tplModalPreviewCard" class="p-6 rounded-2xl bg-gradient-to-br from-slate-900 to-slate-800 text-white shadow-inner flex flex-col justify-between min-h-[220px] relative overflow-hidden">
                <div class="absolute -right-8 -bottom-8 opacity-10 pointer-events-none text-9xl">
                    <i class="bi bi-book"></i>
                </div>
                <div>
                    <span id="tplModalFormatBadge" class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase bg-rose-500/30 text-rose-200 border border-rose-400/40">FORMAT .DOCX &bull; .PDF</span>
                    <h4 id="tplModalDocHeading" class="text-lg font-black text-white mt-2 leading-snug">Cover Template Resmi BPS</h4>
                    <p id="tplModalDocDesc" class="text-xs text-slate-300 mt-1 max-w-lg leading-relaxed">Kerangka baku naskah publikasi resmi desa yang siap diisi angka statistik sektoral.</p>
                </div>
                <div class="pt-4 mt-4 border-t border-slate-700 flex items-center justify-between text-xs text-slate-400">
                    <span>Penyusun: <strong id="tplModalAuthor" class="text-white">Robbith</strong></span>
                    <span id="tplModalMetaSize">Ukuran: 4.2 MB &bull; Standar A4</span>
                </div>
            </div>

            <!-- Struktur Bab Template -->
            <div class="space-y-2">
                <h5 class="text-xs font-black uppercase text-slate-700 tracking-wider">Struktur Kerangka Dokumen:</h5>
                <div id="tplModalStructureList" class="space-y-1.5 text-xs text-slate-600">
                    <!-- Injected dynamically -->
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="p-4 border-t border-slate-100 bg-slate-50 flex items-center justify-between">
            <button type="button" onclick="closeTemplatePreviewModal()" class="px-4 py-2 rounded-xl bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-bold transition cursor-pointer">Tutup Pratinjau</button>
            <button type="button" id="btnDownloadFromTplModal" onclick="triggerTemplateDownload()" class="px-5 py-2 rounded-xl bg-[#800040] hover:bg-[#660033] text-white text-xs font-bold transition flex items-center gap-1.5 shadow-xs cursor-pointer active:scale-95">
                <i class="bi bi-download"></i>
                <span>Unduh Paket Template Ini</span>
            </button>
        </div>
    </div>
</div>
