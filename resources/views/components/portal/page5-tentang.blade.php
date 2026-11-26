<!-- HALAMAN 5: TENTANG DESA MADANI & KATALOG PUBLIKASI BPS RESMI              -->
        <!-- ========================================================================= -->
        <section id="portalPage5" class="portal-page {{ $curPage === 5 ? 'active' : '' }} w-full py-6 sm:py-8">
            <div class="w-full px-2 sm:px-6 lg:px-10 space-y-6">
                
                <!-- Indikator Halaman Aktif: Sudut Kiri Atas (Tentang Desa Madani) -->
                <div class="flex items-center justify-start w-full">
                    <div id="subPillMadani" class="{{ $curSub === 'madani' ? '' : 'hidden' }} inline-flex items-center gap-2.5 px-5 py-2.5 mb-2 rounded-2xl bg-[#3B4D3B] text-white text-xs sm:text-sm font-black shadow-xs border border-emerald-900/20 shrink-0">
                        <i class="bi bi-bank2 text-base"></i>
                        <span>Tentang Desa Madani</span>
                    </div>
                </div>

                <!-- ===================================================================== -->
                <!-- SUB-VIEW 1: TENTANG MADANI (SELUK-BELUK APA ITU DESA MADANI)           -->
                <!-- ===================================================================== -->
                <div id="subViewMadani" class="w-full max-w-[1920px] mx-auto {{ $curSub === 'madani' ? '' : 'hidden' }} space-y-8 sm:space-y-10 animate-in fade-in duration-300">
                    
                    <!-- ===================================================================== -->
                    <!-- 1. HERO BANNER: SELUK BELUK DESA MADANI (ESTETIK & ELEGAN PINE GREEN)  -->
                    <!-- ===================================================================== -->
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#173824] via-[#204a32] to-[#142e1f] text-white p-6 sm:p-10 lg:p-12 shadow-lg border border-emerald-500/20 w-full">
                        <!-- Decorative Subtle Radial Ambient Glow -->
                        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-96 bg-emerald-400/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="absolute -bottom-24 left-1/4 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="absolute top-0 right-0 w-full h-full opacity-5 pointer-events-none" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 24px 24px;"></div>

                        <div class="relative z-10 max-w-5xl mx-auto text-center flex flex-col items-center">
                            <div class="inline-flex items-center justify-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-emerald-200 text-xs font-black tracking-widest uppercase mb-4 shadow-xs mx-auto">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>PROFIL &amp; FONDASI SATU DATA DESA</span>
                            </div>
                            
                            <h2 class="text-3xl sm:text-5xl font-black tracking-tight text-white leading-tight text-center">
                                Seluk-Beluk Apa Itu <span class="text-emerald-300">Desa Madani</span>
                            </h2>
                            
                            <p class="text-emerald-100/90 text-xs sm:text-sm md:text-base mt-3 leading-relaxed font-normal text-center max-w-3xl mx-auto">
                                Mengenal filosofi, arsitektur data, dan komitmen strategis transformasi digital <strong>127 Desa &amp; 6 Kelurahan di 15 Kecamatan</strong> Kabupaten Kolaka Utara menuju kemandirian berbasis data presisi (<em>by name, by address, by coordinate</em>).
                            </p>

                            <!-- Key Metric Stats Strip (Palet Harmonis Bersih Tanpa Warna Pelangi) -->
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 mt-8 pt-6 border-t border-white/15 w-full max-w-4xl mx-auto">
                                <div class="bg-white/10 backdrop-blur-xs rounded-2xl p-4 border border-white/10 text-center flex flex-col items-center justify-center transition-all hover:bg-white/15">
                                    <div class="text-2xl sm:text-3xl font-black text-white text-center">133</div>
                                    <div class="text-[11px] font-bold text-emerald-200 uppercase tracking-wider mt-1 text-center">Desa &amp; Kelurahan</div>
                                </div>
                                <div class="bg-white/10 backdrop-blur-xs rounded-2xl p-4 border border-white/10 text-center flex flex-col items-center justify-center transition-all hover:bg-white/15">
                                    <div class="text-2xl sm:text-3xl font-black text-white text-center">15</div>
                                    <div class="text-[11px] font-bold text-emerald-200 uppercase tracking-wider mt-1 text-center">Kecamatan Kolut</div>
                                </div>
                                <div class="bg-white/10 backdrop-blur-xs rounded-2xl p-4 border border-white/10 text-center flex flex-col items-center justify-center transition-all hover:bg-white/15">
                                    <div class="text-2xl sm:text-3xl font-black text-white text-center">100%</div>
                                    <div class="text-[11px] font-bold text-emerald-200 uppercase tracking-wider mt-1 text-center">Satu Data SDI</div>
                                </div>
                                <div class="bg-white/10 backdrop-blur-xs rounded-2xl p-4 border border-white/10 text-center flex flex-col items-center justify-center transition-all hover:bg-white/15">
                                    <div class="text-2xl sm:text-3xl font-black text-white text-center">PODES</div>
                                    <div class="text-[11px] font-bold text-emerald-200 uppercase tracking-wider mt-1 text-center">Sensus BPS 2025</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- ===================================================================== -->
                    <!-- 2. MAKNA & AKRONIM DESA M-A-D-A-N-I (DESAIN ELEGAN PINE & SLATE)       -->
                    <!-- ===================================================================== -->
                    <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/90 shadow-2xs space-y-6 w-full">
                        <div class="max-w-3xl">
                            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-50 text-[#3B4D3B] text-xs font-black uppercase tracking-wider mb-2 border border-emerald-200/80">
                                <i class="bi bi-lightbulb-fill text-xs"></i>
                                <span>Filosofi Nama &amp; Singkatan</span>
                            </div>
                            <h3 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                                Apa Arti dan Kepanjangan <span class="text-[#3B4D3B]">"MADANI"</span>?
                            </h3>
                            <p class="text-slate-600 text-xs sm:text-sm mt-1.5 leading-relaxed">
                                <strong>Desa Madani</strong> bukan sekadar portal statistik, melainkan akronim dari 6 pilar gerakan perubahan tata kelola desa di Kabupaten Kolaka Utara:
                            </p>
                        </div>

                        <!-- 6 Huruf MADANI Grid (Palet Terpadu Pine & White) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                            <!-- M: Maju -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            M
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-cpu-fill text-xs"></i>
                                            <span>Pilar 1</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Maju (Modern Governance)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Pemanfaatan teknologi sistem informasi desa (SID) dan WebGIS untuk memodernisasi pelayanan administrasi warga secara cepat dan transparan.
                                    </p>
                                </div>
                            </div>

                            <!-- A: Akuntabel -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            A
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-shield-check text-xs"></i>
                                            <span>Pilar 2</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Akuntabel (Transparency)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Pengelolaan anggaran APBDes dan alokasi bantuan sosial yang dapat dipertanggungjawabkan kepada masyarakat melalui infografis terbuka.
                                    </p>
                                </div>
                            </div>

                            <!-- D: Data-Driven -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            D
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-database-fill text-xs"></i>
                                            <span>Pilar 3</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Data-Driven (Statistik Riil)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Setiap musrenbangdes dan keputusan pembangunan berlandaskan data survei &amp; sensus riil PODES BPS, bukan berdasarkan perkiraan semata.
                                    </p>
                                </div>
                            </div>

                            <!-- A: Amanah -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            A
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-patch-check-fill text-xs"></i>
                                            <span>Pilar 4</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Amanah (Integrity &amp; Trust)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Menjunjung tinggi kepercayaan warga desa dengan pelayanan publik aparatur yang jujur, inklusif, dan bebas dari diskriminasi.
                                    </p>
                                </div>
                            </div>

                            <!-- N: Nyata -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            N
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-bullseye text-xs"></i>
                                            <span>Pilar 5</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Nyata (Impactful Results)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Dampak program dapat dirasakan langsung oleh masyarakat dalam pengentasan kemiskinan, penurunan stunting, dan peningkatan ekonomi kakao.
                                    </p>
                                </div>
                            </div>

                            <!-- I: Integrasi -->
                            <div class="group p-5 rounded-2xl bg-white border border-slate-200/90 hover:border-[#3B4D3B] hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="w-10 h-10 rounded-2xl bg-[#3B4D3B] text-white font-black text-xl flex items-center justify-center shadow-2xs group-hover:scale-105 transition-transform">
                                            I
                                        </span>
                                        <span class="text-[11px] font-black uppercase text-[#3B4D3B] tracking-wider bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/60 inline-flex items-center gap-1.5">
                                            <i class="bi bi-diagram-3-fill text-xs"></i>
                                            <span>Pilar 6</span>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-base text-slate-900">Integrasi (Satu Data SDI)</h4>
                                    <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                                        Keterpaduan antar-instansi: data desa terhubung langsung dengan Satu Data Indonesia BPS, Bappeda, dan DPMD Kolaka Utara.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- ===================================================================== -->
                    <!-- 3. VISI, MISI & 4 AGENDA TRANSFORMASI (LAYOUT SPLIT ELEGAN)           -->
                    <!-- ===================================================================== -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 items-stretch w-full">
                        
                        <!-- Kolom Kiri: Visi Resmi Desa Madani (40%) -->
                        <div class="lg:col-span-5 bg-gradient-to-br from-[#173824] via-[#204a32] to-[#142e1f] rounded-3xl p-6 sm:p-8 text-white flex flex-col justify-between shadow-sm relative overflow-hidden border border-emerald-500/20">
                            <!-- Background Subtle Watermark Quote -->
                            <i class="bi bi-quote text-8xl text-white/5 absolute -bottom-3 -right-2 pointer-events-none select-none"></i>
                            
                            <div class="relative z-10">
                                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-black uppercase tracking-wider border border-emerald-400/30 mb-4">
                                    <i class="bi bi-compass-fill text-xs text-amber-300"></i>
                                    <span>Visi Besar 2025–2030</span>
                                </div>
                                
                                <h3 class="text-xl sm:text-2xl font-black leading-snug tracking-tight text-white">
                                    "Terwujudnya Tata Kelola Desa Mandiri, Berdaulat Data, dan Berdaya Saing Melalui Ekosistem Statistik Presisi Kabupaten Kolaka Utara."
                                </h3>

                                <div class="my-6 h-px bg-gradient-to-r from-emerald-400/40 via-emerald-200/20 to-transparent"></div>

                                <p class="text-emerald-100/90 text-xs sm:text-sm leading-relaxed">
                                    Memastikan tidak ada lagi desa di Kolaka Utara yang tertinggal dalam perencanaan pembangunan karena ketiadaan data riil atau ketidaktepatan sasaran bantuan sosial.
                                </p>
                            </div>

                            <div class="pt-6 border-t border-white/10 flex items-center justify-between text-xs text-emerald-200/90 relative z-10">
                                <span>Kolaborasi BPS &amp; Pemkab</span>
                                <span class="font-extrabold text-emerald-300">#DesaMadani2025</span>
                            </div>
                        </div>

                        <!-- Kolom Kanan: 4 Agenda Utama Transformasi (60%) -->
                        <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-2xs flex flex-col justify-between space-y-6">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#3B4D3B] inline-block"></span>
                                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Arah Kebijakan</span>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">4 Agenda Utama Transformasi Desa</h3>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- Agenda 1 -->
                                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 hover:border-[#3B4D3B] hover:bg-emerald-50/20 transition-all flex flex-col justify-between">
                                    <div>
                                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#3B4D3B] font-black text-xs flex items-center justify-center mb-2.5">
                                            01
                                        </div>
                                        <h4 class="font-extrabold text-sm text-slate-900">Digitalisasi SID &amp; Monografi</h4>
                                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                            Modernisasi basis data profil desa dari buku register manual ke sistem basis data digital terverifikasi.
                                        </p>
                                    </div>
                                </div>

                                <!-- Agenda 2 -->
                                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 hover:border-[#3B4D3B] hover:bg-emerald-50/20 transition-all flex flex-col justify-between">
                                    <div>
                                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#3B4D3B] font-black text-xs flex items-center justify-center mb-2.5">
                                            02
                                        </div>
                                        <h4 class="font-extrabold text-sm text-slate-900">Transparansi &amp; Akuntabilitas APBDes</h4>
                                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                            Penyajian visual alokasi dana desa dan realisasi proyek infrastruktur secara terbuka kepada seluruh warga.
                                        </p>
                                    </div>
                                </div>

                                <!-- Agenda 3 -->
                                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 hover:border-[#3B4D3B] hover:bg-emerald-50/20 transition-all flex flex-col justify-between">
                                    <div>
                                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#3B4D3B] font-black text-xs flex items-center justify-center mb-2.5">
                                            03
                                        </div>
                                        <h4 class="font-extrabold text-sm text-slate-900">Peningkatan Kapasitas SDM Aparat</h4>
                                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                            Pelatihan Agen Statistik Desa (DESCAN) dalam pengumpulan, pengolahan, dan analisis data sektoral.
                                        </p>
                                    </div>
                                </div>

                                <!-- Agenda 4 -->
                                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 hover:border-[#3B4D3B] hover:bg-emerald-50/20 transition-all flex flex-col justify-between">
                                    <div>
                                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#3B4D3B] font-black text-xs flex items-center justify-center mb-2.5">
                                            04
                                        </div>
                                        <h4 class="font-extrabold text-sm text-slate-900">Interoperabilitas Satu Data (SDI)</h4>
                                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                            Konektivitas format data lintas OPD kabupaten, provinsi, hingga pusat tanpa tumpang tindih data.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- ===================================================================== -->
                    <!-- 4. 4 PILAR KOLABORASI STRATEGIS & CALL TO ACTION                      -->
                    <!-- ===================================================================== -->
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#173824] via-[#204a32] to-[#142e1f] p-6 sm:p-10 text-white shadow-lg border border-emerald-500/20 w-full">
                        <div class="relative z-10 space-y-6">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-white/15">
                                <div>
                                    <span class="px-3.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-black uppercase tracking-wider border border-emerald-400/30 inline-flex items-center gap-1.5">
                                        <i class="bi bi-people-fill text-xs"></i>
                                        <span>Kemitraan Multipihak</span>
                                    </span>
                                    <h3 class="text-2xl sm:text-3xl font-black tracking-tight mt-2 text-white">
                                        Sinergi Kolaborasi Penyelenggara Desa Madani
                                    </h3>
                                    <p class="text-emerald-100/90 text-xs sm:text-sm mt-1 max-w-2xl leading-relaxed">
                                        Keberhasilan ekosistem Desa Madani ditopang oleh 4 pilar lembaga strategis di Kabupaten Kolaka Utara:
                                    </p>
                                </div>
                            </div>

                            <!-- 4 Pilar Lembaga Grid (Bootstrap Icons & Glassmorphism) -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                                <!-- Pilar 1: BPS Kolut -->
                                <div class="bg-white/10 backdrop-blur-xs p-5 rounded-2xl border border-white/15 hover:bg-white/15 transition-all">
                                    <div class="w-10 h-10 rounded-xl bg-white/10 text-emerald-300 font-black text-lg flex items-center justify-center mb-3 shadow-xs">
                                        <i class="bi bi-bar-chart-line-fill text-lg"></i>
                                    </div>
                                    <h4 class="font-extrabold text-sm text-white">BPS Kab. Kolaka Utara</h4>
                                    <p class="text-[11px] text-emerald-100/80 mt-1 leading-relaxed">
                                        Pembina data statistik sektoral, penyedia metodologi sensus, serta penjamin kualitas metadata Satu Data.
                                    </p>
                                </div>

                                <!-- Pilar 2: Pemkab Kolut -->
                                <div class="bg-white/10 backdrop-blur-xs p-5 rounded-2xl border border-white/15 hover:bg-white/15 transition-all">
                                    <div class="w-10 h-10 rounded-xl bg-white/10 text-emerald-300 font-black text-lg flex items-center justify-center mb-3 shadow-xs">
                                        <i class="bi bi-bank2 text-lg"></i>
                                    </div>
                                    <h4 class="font-extrabold text-sm text-white">Pemerintah Kabupaten</h4>
                                    <p class="text-[11px] text-emerald-100/80 mt-1 leading-relaxed">
                                        Regulator kebijakan daerah dan pengarah integrasi Satu Data Kolaka Utara lintas instansi &amp; OPD.
                                    </p>
                                </div>

                                <!-- Pilar 3: DPMD Kolut -->
                                <div class="bg-white/10 backdrop-blur-xs p-5 rounded-2xl border border-white/15 hover:bg-white/15 transition-all">
                                    <div class="w-10 h-10 rounded-xl bg-white/10 text-emerald-300 font-black text-lg flex items-center justify-center mb-3 shadow-xs">
                                        <i class="bi bi-diagram-3-fill text-lg"></i>
                                    </div>
                                    <h4 class="font-extrabold text-sm text-white">Dinas PMD Kolaka Utara</h4>
                                    <p class="text-[11px] text-emerald-100/80 mt-1 leading-relaxed">
                                        Pendamping teknis tata kelola aparatur desa, adopsi SID, dan implementasi SISKEUDES berbasis data.
                                    </p>
                                </div>

                                <!-- Pilar 4: 133 Desa & Kelurahan -->
                                <div class="bg-white/10 backdrop-blur-xs p-5 rounded-2xl border border-white/15 hover:bg-white/15 transition-all">
                                    <div class="w-10 h-10 rounded-xl bg-white/10 text-emerald-300 font-black text-lg flex items-center justify-center mb-3 shadow-xs">
                                        <i class="bi bi-houses-fill text-lg"></i>
                                    </div>
                                    <h4 class="font-extrabold text-sm text-white">133 Desa &amp; Kelurahan</h4>
                                    <p class="text-[11px] text-emerald-100/80 mt-1 leading-relaxed">
                                        Produsen data di garis terdepan melalui Agen Statistik Desa (DESCAN) dan perangkat desa yang berdaya.
                                    </p>
                                </div>
                            </div>

                            <!-- Action Quick Buttons -->
                            <div class="pt-2 flex flex-wrap items-center gap-3">
                                <a href="/descan" class="px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold text-xs sm:text-sm transition-all flex items-center gap-2 cursor-pointer">
                                    <i class="bi bi-stars text-amber-300"></i>
                                    <span>Buka Portal Lengkap Desa Cantik</span>
                                </a>
                                <a href="/portal/agregat" onclick="window.onNavClick(event, 2, '/portal/agregat')" class="px-5 py-2.5 rounded-xl bg-emerald-800/80 hover:bg-emerald-800 text-white border border-emerald-400/30 font-bold text-xs sm:text-sm transition-all flex items-center gap-2 cursor-pointer">
                                    <i class="bi bi-bar-chart-fill text-emerald-300"></i>
                                    <span>Data Agregat 15 Kecamatan</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ===================================================================== -->
                <div id="subViewPublikasi" class="w-full max-w-[1920px] mx-auto {{ $curSub === 'publikasi' ? '' : 'hidden' }} space-y-6 animate-in fade-in duration-200">
                    
                    <!-- Header Kontrol Publikasi: Sudut Kiri Atas (Publikasi & Buku BPS) & Sudut Kanan Atas (3 Menu Kontrol) -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-4 border-b border-slate-100 relative z-30 w-full">
                        
                        <!-- Sudut Kiri Atas: Indikator / Badge Publikasi & Buku BPS -->
                        <div id="subPillPublikasi" class="{{ $curSub === 'publikasi' ? '' : 'hidden' }} inline-flex items-center gap-2.5 px-5 py-2.5 rounded-2xl bg-[#3B4D3B] text-white text-xs sm:text-sm font-black shadow-xs border border-emerald-900/20 shrink-0">
                            <i class="bi bi-journal-bookmark-fill text-base"></i>
                            <span>Publikasi &amp; Buku BPS</span>
                        </div>

                        <!-- Sudut Kanan Atas: 3 Menu Kontrol (Filter, Model Grid, Panggung 3D) -->
                        <div class="flex flex-wrap items-center justify-start sm:justify-end gap-2.5 w-full sm:w-auto">
                            
                            <!-- Kontrol 1: Filter Dropdown -->
                            <div class="relative inline-block text-left" id="bpsFilterDropdownWrapper">
                                <button type="button" id="btnBpsFilterDropdown" onclick="window.toggleBpsFilterDropdown(event)" class="px-4 py-2.5 rounded-2xl bg-white hover:bg-slate-50 text-slate-800 border border-slate-300 font-bold text-xs sm:text-sm shadow-xs transition-all flex items-center gap-2 cursor-pointer hover:border-emerald-500">
                                    <i class="bi bi-funnel-fill text-[#3B4D3B]"></i>
                                    <span id="labelActiveFilter">Filter: Semua Publikasi</span>
                                    <i class="bi bi-chevron-down text-slate-400 text-xs transition-transform duration-200" id="iconFilterDropdownArrow"></i>
                                </button>

                                <!-- Dropdown Menu Popover -->
                                <div id="menuBpsFilterDropdown" class="hidden absolute right-0 top-full mt-2 w-72 sm:w-80 bg-white rounded-2xl shadow-xl border border-slate-200 p-2 z-50 text-left">
                                    <div class="text-[10px] font-black uppercase tracking-wider text-slate-400 px-3 py-1.5 border-b border-slate-100 flex items-center justify-between">
                                        <span>Kategori Publikasi &amp; Data</span>
                                        <span>PILIH</span>
                                    </div>
                                    <div class="max-h-64 overflow-y-auto space-y-1 py-1.5 text-xs">
                                        <button type="button" onclick="window.applyBpsFilter('all', 'Semua Publikasi (12)')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-800">
                                            <span class="flex items-center gap-2"><i class="bi bi-collection-fill text-emerald-700"></i> Semua Publikasi (12 Koleksi)</span>
                                            <span class="text-[10px] bg-slate-100 px-2 py-0.5 rounded-full font-mono">12</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('kuda', 'Buku Tahunan Pokok (KDA)')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-bar-chart-line-fill text-emerald-700"></i> Buku Tahunan Pokok (KDA)</span>
                                            <span class="text-[10px] bg-emerald-50 text-emerald-800 px-2 py-0.5 rounded-full font-mono">486 Hal</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('statda', 'Analisis Makro & PDRB')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-graph-up-arrow text-blue-700"></i> Analisis Makro &amp; PDRB</span>
                                            <span class="text-[10px] bg-blue-50 text-blue-800 px-2 py-0.5 rounded-full font-mono">2 Buku</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('podes', 'Potensi Desa (PODES)')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-buildings-fill text-amber-700"></i> Potensi Desa (PODES 2025)</span>
                                            <span class="text-[10px] bg-amber-50 text-amber-900 px-2 py-0.5 rounded-full font-mono">133 Desa</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('kesra', 'Sosial & Kesejahteraan')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-people-fill text-rose-700"></i> Kesejahteraan &amp; Naker</span>
                                            <span class="text-[10px] bg-rose-50 text-rose-800 px-2 py-0.5 rounded-full font-mono">2 Buku</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('descan', 'Pedoman Desa Cantik')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-patch-check-fill text-teal-700"></i> Pedoman Desa Cantik (SDI)</span>
                                            <span class="text-[10px] bg-teal-50 text-teal-800 px-2 py-0.5 rounded-full font-mono">Resmi</span>
                                        </button>
                                        <button type="button" onclick="window.applyBpsFilter('kda-kec', 'Seri 15 Kecamatan')" class="bps-filter-opt w-full text-left px-3 py-2 rounded-xl font-bold hover:bg-emerald-50 hover:text-emerald-900 transition flex items-center justify-between text-slate-700">
                                            <span class="flex items-center gap-2"><i class="bi bi-geo-alt-fill text-purple-700"></i> Seri Kecamatan Dalam Angka</span>
                                            <span class="text-[10px] bg-purple-50 text-purple-800 px-2 py-0.5 rounded-full font-mono">Wilayah</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Kontrol 2 & 3: Model Grid & Panggung 3D Toggle -->
                            <div class="flex items-center p-1 bg-slate-100 rounded-2xl border border-slate-200 shadow-2xs">
                                <button type="button" id="btnViewModeGrid" onclick="window.toggleBpsViewMode('grid')" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition-all text-slate-600 hover:text-slate-900 cursor-pointer flex items-center gap-1.5" title="Tampilkan Mode Katalog Buku">
                                    <i class="bi bi-grid-3x3-gap-fill text-sm"></i>
                                    <span>Model Grid</span>
                                </button>
                                <button type="button" id="btnViewMode3D" onclick="window.toggleBpsViewMode('3d')" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-black transition-all bg-[#3B4D3B] text-white shadow-xs cursor-pointer flex items-center gap-1.5" title="Tampilkan Mode Panggung 3D">
                                    <i class="bi bi-badge-3d-fill text-sm"></i>
                                    <span>Panggung 3D</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <div id="bpsCatalogueGridSection" class="space-y-6 hidden">
                        
                        <!-- Canvas Utama Katalog Buku -->
                        <div class="bps-catalog-canvas">
                            
                            <!-- Header Banner Publikasi Buku -->
                            <div class="relative z-10 text-center pt-2 pb-6">
                                <h2 class="text-3xl sm:text-5xl font-black text-slate-900 tracking-tight font-serif uppercase inline-block">
                                    PUBLIKASI BUKU
                                </h2>
                            </div>

                            <!-- 4 Baris Buku Berpita Hijau Melintang (Total 12 Buku) -->
                            <div class="space-y-4 relative z-10" id="bpsCatalogBooksContainer">
                                
                            <!-- Row 1 (3 Buku dengan Pita Hijau Diagonal) -->
                            <div class="relative py-4 my-2">
                                <!-- Pita Hijau Diagonal Berlari Melintang di Belakang Buku -->
                                
                                <!-- Grid 3 Kolom untuk Baris Ini -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 relative z-10 w-full items-center">
                                    
                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-start" data-bps-cat="kuda">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kuda')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                1
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#0d2238] via-[#16385c] to-[#2563eb] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-blue-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-bar-chart-fill text-xs text-blue-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kabupaten Kolaka Utara Dalam Angka 2025</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Data Pokok Makro & Wilayah 15 Kecamatan</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102001.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-patch-check-fill text-emerald-400"></i> <span>RESMI BPS • 2025</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 486 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kuda')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-center" data-bps-cat="statda">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('statda')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                2
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#123826] via-[#1a4f36] to-[#10b981] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-emerald-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-graph-up text-xs text-emerald-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Statistik Daerah Kabupaten Kolaka Utara 2025</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Analisis Ringkas & Indikator Pembangunan</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1101002.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-graph-up-arrow text-emerald-400"></i> <span>ANALISIS MAKRO</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 58 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('statda')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-end" data-bps-cat="podes">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('podes')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                3
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#422909] via-[#6e430f] to-[#d97706] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-amber-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-buildings-fill text-xs text-amber-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Indikator Potensi Desa Kolaka Utara 2025</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Hasil Sensus Sarana 127 Desa & 6 Kelurahan</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1104003.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-buildings text-emerald-400"></i> <span>SENSUS PODES</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 312 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('podes')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2 (3 Buku dengan Pita Hijau Diagonal) -->
                            <div class="relative py-4 my-2">
                                <!-- Pita Hijau Diagonal Berlari Melintang di Belakang Buku -->
                                
                                <!-- Grid 3 Kolom untuk Baris Ini -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 relative z-10 w-full items-center">
                                    
                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-start" data-bps-cat="kesra">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kesra')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                4
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#380c1d] via-[#631430] to-[#e11d48] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-rose-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-people-fill text-xs text-rose-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Indikator Kesejahteraan Rakyat Kolut 2025</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Konsumsi Rumah Tangga, Kesehatan & Sosial</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1103002.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-people text-emerald-400"></i> <span>SUSENAS 2025</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 124 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kesra')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-center" data-bps-cat="descan">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('descan')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                5
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#143322] via-[#204a33] to-[#059669] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-emerald-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-award-fill text-xs text-teal-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Panduan Teknis Pembinaan Desa Cantik</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Standar Metadata Statistik Sektoral Desa</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1109001.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-star-fill text-emerald-400"></i> <span>PEDOMAN SDI</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 96 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('descan')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-end" data-bps-cat="kda-kec">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kda-lasusua')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                6
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#281145] via-[#431b70] to-[#7c3aed] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-purple-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-geo-alt-fill text-xs text-purple-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kecamatan Lasusua Dalam Angka 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Profil Statistik Pusat Ibukota Kabupaten</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102002.7408.010</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-geo-alt-fill text-emerald-400"></i> <span>IBUKOTA KAB.</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 128 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kda-lasusua')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 3 (3 Buku dengan Pita Hijau Diagonal) -->
                            <div class="relative py-4 my-2">
                                <!-- Pita Hijau Diagonal Berlari Melintang di Belakang Buku -->
                                
                                <!-- Grid 3 Kolom untuk Baris Ini -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 relative z-10 w-full items-center">
                                    
                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-start" data-bps-cat="kda-kec">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kda-pakue')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                7
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#192b3d] via-[#233f5c] to-[#0284c7] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-sky-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-water text-xs text-sky-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kecamatan Pakue Dalam Angka 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Statistik Wilayah Utara & Perkebunan Kakao</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102002.7408.020</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-compass text-emerald-400"></i> <span>WILAYAH UTARA</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 108 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kda-pakue')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-center" data-bps-cat="kda-kec">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kda-batuputih')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                8
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#16332e] via-[#1c4f46] to-[#0d9488] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-teal-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-compass-fill text-xs text-teal-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kecamatan Batu Putih Dalam Angka 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Statistik Pesisir Pantai & Hasil Bumi</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102002.7408.030</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-tsunami text-emerald-400"></i> <span>PESISIR BONE</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 102 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kda-batuputih')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-end" data-bps-cat="kda-kec">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kda-ranteangin')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                9
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#381f0f] via-[#542d13] to-[#b45309] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-amber-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-tree-fill text-xs text-amber-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kecamatan Rante Angin Dalam Angka 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Sentra Pertanian Kakao & Komoditas Rakyat</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102002.7408.040</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-flower2 text-emerald-400"></i> <span>SENTRA KAKAO</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 98 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kda-ranteangin')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 4 (3 Buku dengan Pita Hijau Diagonal) -->
                            <div class="relative py-4 my-2">
                                <!-- Pita Hijau Diagonal Berlari Melintang di Belakang Buku -->
                                
                                <!-- Grid 3 Kolom untuk Baris Ini -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 relative z-10 w-full items-center">
                                    
                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-start" data-bps-cat="kda-kec">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('kda-kodeoha')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                10
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#1b3320] via-[#264d2f] to-[#16a34a] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-green-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-flower1 text-xs text-green-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Kecamatan Kodeoha Dalam Angka 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Sentra Agribisnis, Kelapa & Nelayan</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1102002.7408.050</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-briefcase text-emerald-400"></i> <span>AGRIBISNIS</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 114 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('kda-kodeoha')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-start lg:justify-self-center" data-bps-cat="statda">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('pdrb-kolut')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                11
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#122833] via-[#173b4d] to-[#0891b2] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-cyan-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-cash-stack text-xs text-cyan-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">PDRB Kolaka Utara Menurut Lapangan Usaha</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Tinjauan Nilai Tambah & Pertumbuhan Ekonomi</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1105001.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-currency-dollar text-emerald-400"></i> <span>PRODUK DOMESTIK</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 156 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('pdrb-kolut')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bps-catalog-card relative flex items-center justify-start gap-3 sm:gap-5 p-2 transition-all duration-300 w-fit mx-auto sm:mx-0 sm:justify-self-end lg:justify-self-end" data-bps-cat="kesra">
                                        <!-- Realistic 3D Standing Book Cover -->
                                        <div class="bps-grid-book-wrapper relative shrink-0 cursor-pointer" onclick="window.openBpsBookModal('naker-kolut')" title="Klik untuk Buka Detail Bab">
                                            <!-- Numbered Circle Badge (seperti pada sudut atas foto referensi) -->
                                            <div class="absolute -top-3 -right-3 z-30 w-8 h-8 rounded-full bg-white border-2 border-[#1c402e] text-[#1c402e] font-black text-sm flex items-center justify-center shadow-lg">
                                                12
                                            </div>

                                            <!-- 3D Book Cover Volume -->
                                            <div class="bps-grid-book-cover w-[114px] h-[158px] sm:w-[130px] sm:h-[180px] rounded-r-md rounded-l-xs bg-gradient-to-br from-[#261333] via-[#3d1a54] to-[#9333ea] p-3 text-white flex flex-col justify-between relative border-y border-r border-white/20 select-none">
                                                <!-- Spine shadow crease -->
                                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/45 via-black/20 to-transparent pointer-events-none rounded-l-xs"></div>
                                                <!-- Gloss reflection -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] font-black uppercase tracking-wider text-purple-300 border-b border-white/20 pb-1">
                                                    <span>BPS KOLUT</span>
                                                    <i class="bi bi-person-badge-fill text-xs text-purple-300"></i>
                                                </div>

                                                <div class="relative z-10 my-auto py-1">
                                                    <h4 class="text-xs sm:text-[13px] font-black leading-tight text-white drop-shadow-sm line-clamp-3">Profil Ketenagakerjaan & Kemiskinan 2024</h4>
                                                    <p class="text-[9px] text-white/75 mt-0.5 line-clamp-1">Indikator Sakernas, Pengangguran & Garis Kemiskinan</p>
                                                </div>

                                                <div class="relative z-10 flex items-center justify-between text-[8px] text-white/80 border-t border-white/20 pt-1 font-mono">
                                                    <span>1107001.7408</span>
                                                </div>

                                                <!-- Book Pages Thickness on Right -->
                                                <div class="bps-grid-book-pages"></div>
                                            </div>
                                        </div>

                                        <!-- Badges / Tags on the Right Side (Sesuai Posisi Pita & Stiker pada Foto) -->
                                        <div class="flex flex-col items-start gap-2 z-20 flex-1 min-w-0">
                                            <!-- Upper Green Ribbon Tag (Sesuai Pita Hijau) -->
                                            <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#153823] text-[#86efac] border border-emerald-400/40 text-[10px] sm:text-[11px] font-black tracking-wider uppercase shadow-md">
                                                <i class="bi bi-person-check text-emerald-400"></i> <span>SAKERNAS RESMI</span>
                                            </div>

                                            <!-- Lower Discount-Style Sticker (Kotak Putih Tilted dengan Drop Shadow) -->
                                            <div class="inline-block bg-white text-slate-900 border border-slate-300 font-black text-xs sm:text-sm px-2.5 py-1 rounded-xs shadow-md transform -rotate-2">
                                                GRATIS • 92 HAL
                                            </div>

                                            <!-- Quick Action Buttons -->
                                            <div class="flex items-center gap-1.5 pt-0.5">
                                                <button type="button" onclick="window.openBpsBookModal('naker-kolut')" class="px-2.5 py-1 rounded-lg bg-[#3B4D3B] hover:bg-[#566B53] text-white text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105 active:scale-95" title="Buka Detail">
                                                    <i class="bi bi-info-circle text-xs"></i>
                                                    <span>Detail</span>
                                                </button>
                                                <a href="https://kolutkab.bps.go.id" target="_blank" class="px-2 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] sm:text-xs font-bold shadow-xs transition flex items-center gap-1 cursor-pointer hover:scale-105" title="Unduh Dokumen PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill text-xs"></i>
                                                    <span>PDF</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>

                            <!-- Catatan Footer Katalog (Persis seperti catatan di bagian bawah foto referensi) -->
                            <div class="mt-10 pt-6 border-t border-slate-200/90 relative z-20 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 bg-white/80 backdrop-blur-xs p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-2xs">
                                <div class="space-y-1.5 text-xs font-semibold text-slate-700">
                                    <div class="flex items-center gap-2 text-emerald-900 font-bold">
                                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-600 inline-block shrink-0"></span>
                                        <span>Layanan Statistik Terpadu (PST): BPS Kabupaten Kolaka Utara (pst7408@bps.go.id)</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-600">
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-400 inline-block shrink-0"></span>
                                        <span>Lokasi Kantor: Kompleks Perkantoran Pemkab Kolaka Utara, Lasusua, Sulawesi Tenggara.</span>
                                    </div>
                                </div>
                                <div class="shrink-0 self-start md:self-auto">
                                    <span class="px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-900 font-extrabold text-[11px] inline-flex items-center gap-1.5 border border-emerald-300 shadow-2xs">
                                        <i class="bi bi-check-circle-fill text-emerald-600"></i> <span>100% AKSES TERBUKA &amp; GRATIS</span>
                                    </span>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- 1. PANGGUNG 3D BUKU SPOTLIGHT SHOWROOM (SEPERTI MODEL PADA FOTO)     -->
                    <!-- ===================================================================== -->
                    <div id="bpsStageShowcaseSection" class="space-y-6">
                        
                        <!-- Panggung 3D Container (Responsive Desktop & Mobile) -->
                        <div id="bpsStageContainer" class="bps-stage-container py-8 sm:py-12 px-4 relative overflow-hidden" 
                             onmouseenter="window.handleBpsStageHover(true)" 
                             onmouseleave="window.handleBpsStageHover(false)"
                             onmousedown="window.handleBpsStageDragStart(event)"
                             ontouchstart="window.handleBpsStageTouchStart(event)"
                             ontouchend="window.handleBpsStageTouchEnd(event)">
                            
                            <!-- Studio Spotlights Beam -->
                            <div class="bps-spotlight-left"></div>
                            <div class="bps-spotlight-right"></div>
                            
                            <!-- Center Ambient Glow & Podium Base Platform -->
                            <div class="bps-stage-floor-glow"></div>
                            <div class="bps-podium-platform-base"></div>

                            <!-- Left & Right Arrow Buttons (Green Pine Theme) -->
                            <button type="button" onclick="window.rotateBpsStage(-1)" class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 z-30 w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-white hover:bg-emerald-50 border border-emerald-900/20 text-[#3B4D3B] hover:text-[#204a32] hover:border-[#3B4D3B] flex items-center justify-center transition-all hover:scale-110 shadow-md cursor-pointer" title="Buku Sebelumnya"><i class="bi bi-chevron-left text-lg"></i></button>
                            <button type="button" onclick="window.rotateBpsStage(1)" class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 z-30 w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-white hover:bg-emerald-50 border border-emerald-900/20 text-[#3B4D3B] hover:text-[#204a32] hover:border-[#3B4D3B] flex items-center justify-center transition-all hover:scale-110 shadow-md cursor-pointer" title="Buku Berikutnya"><i class="bi bi-chevron-right text-lg"></i></button>

                            <!-- Track Berisi 6 Buku 3D -->
                            <div id="bpsBooksTrack" class="bps-books-track relative w-full">

                                <!-- BUKU 0: KOLAKA UTARA DALAM ANGKA 2025/2026 -->
                                <div class="bps-book-3d-item active" id="bpsBook3D-0" onclick="window.handleBpsBookClick(event, 0, 'kuda')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#0b2545] via-[#103b6b] to-[#07172b] border-r border-blue-400/30">
                                            <span class="text-[8px] font-black text-amber-400">BPS</span>
                                            <span class="bps-book-spine-text">Kolaka Utara Dalam Angka 2025/2026</span>
                                            <span class="text-[7px] text-blue-200">2026</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#0b2545] via-[#103b6b] to-[#1e588f] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-emerald-300 uppercase">BPS KOLUT</span>
                                                <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[8px] font-black">2025/2026</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-bar-chart-fill text-white"></i></div>
                                                <div class="text-[10px] text-blue-200 font-bold uppercase tracking-wider">Kompilasi Tahunan</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Kabupaten Kolaka Utara Dalam Angka</h4>
                                                <p class="text-[9px] text-blue-100/80 mt-1 line-clamp-2">Sensus &amp; data makro 15 kecamatan terlengkap.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-blue-200 border-t border-white/20 pt-2">
                                                <span>1102001.7408</span>
                                                <span class="font-extrabold text-emerald-300">486 Halaman</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                                <!-- BUKU 1: STATISTIK DAERAH KOLAKA UTARA 2025 -->
                                <div class="bps-book-3d-item pos-right-1" id="bpsBook3D-1" onclick="window.handleBpsBookClick(event, 1, 'statda')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#0f2e22] via-[#1e4a37] to-[#0a1e16] border-r border-emerald-400/30">
                                            <span class="text-[8px] font-black text-emerald-400">BPS</span>
                                            <span class="bps-book-spine-text">Statistik Daerah Kolaka Utara 2025</span>
                                            <span class="text-[7px] text-emerald-200">2025</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#0f2e22] via-[#1e4a37] to-[#115e43] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-teal-300 uppercase">BPS KOLUT</span>
                                                <span class="px-2 py-0.5 rounded-full bg-teal-500/20 text-teal-300 text-[8px] font-black">MAKRO</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-graph-up text-white"></i></div>
                                                <div class="text-[10px] text-teal-200 font-bold uppercase tracking-wider">Laporan Analitis</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Statistik Daerah Kolaka Utara 2025</h4>
                                                <p class="text-[9px] text-emerald-100/80 mt-1 line-clamp-2">Analisis deskriptif makroekonomi &amp; IPM daerah.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-emerald-200 border-t border-white/20 pt-2">
                                                <span>1101002.7408</span>
                                                <span class="font-extrabold text-teal-300">58 Halaman</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                                <!-- BUKU 2: INDIKATOR POTENSI DESA (PODES) 2025 -->
                                <div class="bps-book-3d-item pos-right-2" id="bpsBook3D-2" onclick="window.handleBpsBookClick(event, 2, 'podes')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#45260a] via-[#6d3e12] to-[#291605] border-r border-amber-400/30">
                                            <span class="text-[8px] font-black text-amber-300">BPS</span>
                                            <span class="bps-book-spine-text">Indikator Potensi Desa PODES 2025</span>
                                            <span class="text-[7px] text-amber-200">PODES</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#45260a] via-[#6d3e12] to-[#925519] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-amber-300 uppercase">PODES 2025</span>
                                                <span class="px-2 py-0.5 rounded-full bg-amber-500/20 text-amber-300 text-[8px] font-black">133 DESA</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-buildings-fill text-white"></i></div>
                                                <div class="text-[10px] text-amber-200 font-bold uppercase tracking-wider">Hasil Sensus Lengkap</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Potensi Desa (PODES) Kolaka Utara 2025</h4>
                                                <p class="text-[9px] text-amber-100/80 mt-1 line-clamp-2">Ketersediaan sarana, infrastruktur &amp; ekonomi desa.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-amber-200 border-t border-white/20 pt-2">
                                                <span>1104003.7408</span>
                                                <span class="font-extrabold text-amber-300">312 Halaman</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                                <!-- BUKU 3: INDIKATOR KESEJAHTERAAN RAKYAT 2025 -->
                                <div class="bps-book-3d-item pos-hidden" id="bpsBook3D-3" onclick="window.handleBpsBookClick(event, 3, 'kesra')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#3e0e1e] via-[#6b1431] to-[#250812] border-r border-rose-400/30">
                                            <span class="text-[8px] font-black text-rose-300">BPS</span>
                                            <span class="bps-book-spine-text">Indikator Kesra Kolaka Utara 2025</span>
                                            <span class="text-[7px] text-rose-200">KESRA</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#3e0e1e] via-[#6b1431] to-[#881337] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-rose-300 uppercase">SUSENAS 2025</span>
                                                <span class="px-2 py-0.5 rounded-full bg-rose-500/20 text-rose-300 text-[8px] font-black">SOSIAL</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-people-fill text-white"></i></div>
                                                <div class="text-[10px] text-rose-200 font-bold uppercase tracking-wider">Kesejahteraan Rakyat</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Indikator Kesejahteraan Kolaka Utara 2025</h4>
                                                <p class="text-[9px] text-rose-100/80 mt-1 line-clamp-2">Pola konsumsi, sanitasi &amp; kualitas hidup.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-rose-200 border-t border-white/20 pt-2">
                                                <span>1103002.7408</span>
                                                <span class="font-extrabold text-rose-300">124 Halaman</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                                <!-- BUKU 4: BUKU PANDUAN TEKNIS DESA CANTIK -->
                                <div class="bps-book-3d-item pos-left-2" id="bpsBook3D-4" onclick="window.handleBpsBookClick(event, 4, 'descan')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#0d2a1d] via-[#1a4a35] to-[#071911] border-r border-emerald-400/30">
                                            <span class="text-[8px] font-black text-emerald-300">BPS</span>
                                            <span class="bps-book-spine-text">Panduan Teknis Desa Cantik 2025</span>
                                            <span class="text-[7px] text-emerald-200">DESCAN</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#0d2a1d] via-[#1a4a35] to-[#256f50] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-emerald-300 uppercase">DESA CANTIK</span>
                                                <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[8px] font-black">PEDOMAN</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-patch-check-fill text-white"></i></div>
                                                <div class="text-[10px] text-emerald-200 font-bold uppercase tracking-wider">Pedoman Pembinaan</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Panduan Teknis Desa Cantik (DESCAN)</h4>
                                                <p class="text-[9px] text-emerald-100/80 mt-1 line-clamp-2">Kerangka kerja agen statistik tingkat desa.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-emerald-200 border-t border-white/20 pt-2">
                                                <span>1109001.7408</span>
                                                <span class="font-extrabold text-emerald-300">96 Halaman</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                                <!-- BUKU 5: SERI KECAMATAN DALAM ANGKA (15 JILID) -->
                                <div class="bps-book-3d-item pos-left-1" id="bpsBook3D-5" onclick="window.handleBpsBookClick(event, 5, 'kda-kec')">
                                    <div class="bps-book-pedestal"></div>
                                    <div class="bps-book-volume">
                                        <!-- Spine -->
                                        <div class="bps-book-spine bg-gradient-to-b from-[#24103a] via-[#3e1b64] to-[#140822] border-r border-purple-400/30">
                                            <span class="text-[8px] font-black text-purple-300">BPS</span>
                                            <span class="bps-book-spine-text">Seri Kecamatan Dalam Angka 2025</span>
                                            <span class="text-[7px] text-purple-200">15 JILID</span>
                                        </div>
                                        <!-- Cover -->
                                        <div class="bps-book-cover bg-gradient-to-br from-[#24103a] via-[#3e1b64] to-[#581c87] text-white p-4 sm:p-5 flex flex-col justify-between">
                                            <div class="flex items-center justify-between border-b border-white/20 pb-2">
                                                <span class="text-[9px] font-extrabold tracking-widest text-purple-300 uppercase">15 KECAMATAN</span>
                                                <span class="px-2 py-0.5 rounded-full bg-purple-500/20 text-purple-300 text-[8px] font-black">SERIAL</span>
                                            </div>
                                            <div class="my-auto py-2">
                                                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-base mb-2 shadow-inner"><i class="bi bi-map-fill text-white"></i></div>
                                                <div class="text-[10px] text-purple-200 font-bold uppercase tracking-wider">Statistik Kewilayahan</div>
                                                <h4 class="text-sm sm:text-base font-black leading-tight mt-0.5 text-white">Kecamatan Dalam Angka 2025 (15 Jilid)</h4>
                                                <p class="text-[9px] text-purple-100/80 mt-1 line-clamp-2">Detail statistik spesifik per kecamatan &amp; dusun.</p>
                                            </div>
                                            <div class="flex items-center justify-between text-[8px] text-purple-200 border-t border-white/20 pt-2">
                                                <span>1102002.7408</span>
                                                <span class="font-extrabold text-purple-300">15 Jilid Buku</span>
                                            </div>
                                        </div>
                                        <div class="bps-book-pages-right"></div>
                                        <div class="bps-book-pages-top"></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- ===================================================================== -->
                        <!-- SPOTLIGHT INSPECTOR PANEL (DI BAWAH PANGGUNG 3D)                       -->
                        <!-- ===================================================================== -->
                        <div id="bpsBookInspectorCard" class="bg-white rounded-3xl p-6 sm:p-8 border border-emerald-900/15 shadow-sm transition-all duration-300">
                            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                                <div class="space-y-3 max-w-3xl">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span id="inspectorBadge" class="px-3 py-1 rounded-full bg-emerald-50 text-[#3B4D3B] border border-emerald-200/80 text-[10px] font-black uppercase tracking-wider">
                                            Buku Tahunan Pokok
                                        </span>
                                        <span id="inspectorReleaseDate" class="text-xs font-bold text-[#3B4D3B] bg-emerald-50/80 px-2.5 py-0.5 rounded-full border border-emerald-200/60">
                                            Rilis: 28 Februari 2025
                                        </span>
                                        <span id="inspectorPages" class="text-xs font-bold text-[#3B4D3B] bg-emerald-50/80 px-2.5 py-0.5 rounded-full border border-emerald-200/60">
                                            486 Halaman
                                        </span>
                                    </div>
                                    <h3 id="inspectorTitle" class="text-xl sm:text-2xl font-black text-slate-900 leading-tight">
                                        Kabupaten Kolaka Utara Dalam Angka 2025
                                    </h3>
                                    <p id="inspectorDesc" class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                        Publikasi tahunan komprehensif yang menyajikan data statistik makro dan sektoral wilayah Kabupaten Kolaka Utara. Meliputi keadaan geografi dan iklim, pemerintahan daerah, kependudukan dan ketenagakerjaan, sosial dan kesejahteraan rakyat, pertanian tanaman pangan dan perkebunan kakao, perindustrian dan energi, perdagangan, serta Produk Domestik Regional Bruto (PDRB).
                                    </p>
                                    <div class="flex items-center gap-4 text-xs font-semibold text-slate-500 pt-1">
                                        <div><span class="text-slate-400">No. Katalog:</span> <strong id="inspectorPubNo" class="text-slate-700 font-mono">1102001.7408</strong></div>
                                        <div>•</div>
                                        <div><span class="text-slate-400">Standar:</span> <strong id="inspectorIssn" class="text-slate-700 font-mono">ISSN: 0215-6032</strong></div>
                                    </div>
                                </div>

                                <!-- Action Buttons & Step Dots -->
                                <div class="flex flex-col sm:flex-row lg:flex-col items-stretch lg:items-end justify-between gap-4 shrink-0">
                                    <div class="flex items-center gap-2.5">
                                        <button type="button" onclick="window.openBpsBookModal(window.bpsStageBooks[window.bpsStageCurrentIdx].key)" class="flex-1 sm:flex-none px-5 py-3 rounded-2xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-extrabold text-xs shadow-sm transition flex items-center justify-center gap-2 cursor-pointer hover:scale-105 active:scale-95">
                                            <i class="bi bi-book-half text-sm"></i>
                                            <span>Buka Detail &amp; Bab</span>
                                        </button>
                                        <a id="inspectorDownloadBtn" href="https://kolutkab.bps.go.id" target="_blank" class="flex-1 sm:flex-none px-4 py-3 rounded-2xl bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                            <i class="bi bi-file-earmark-pdf-fill text-sm"></i>
                                            <span>Unduh PDF</span>
                                        </a>
                                    </div>

                                    <!-- 6 Step Dots Navigation -->
                                    <div class="flex items-center gap-2 justify-center lg:justify-end pt-1" id="bpsStageDots">
                                        <!-- Rendered dynamically via JS -->
                                    </div>
                                </div>
                            </div>
                        </div>
</div>

                    </div>

                    </div>

                <!-- Bottom Navigation Button for Page 5 -->
                <div class="flex items-center justify-end pt-6 border-t border-slate-200">
                    <a href="/portal" onclick="window.onNavClick(event, 1, '/portal')" class="px-6 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-xs sm:text-sm shadow-sm transition-all flex items-center gap-2 cursor-pointer">
                        <span>Kembali ke Halaman 1: Beranda</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ============================================================== -->
        <!-- MODAL PRATINJAU BUKU RESMI BPS KOLAKA UTARA                    -->
        <!-- ============================================================== -->
        <div id="bpsBookPreviewModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-6 bg-slate-950/80 backdrop-blur-sm overflow-y-auto">
            <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-6 flex flex-col max-h-[90vh] animate-in fade-in zoom-in duration-200">
                <div id="bpsBookModalHeader" class="bg-gradient-to-r from-[#173824] via-[#204a32] to-[#142e1f] text-white p-5 sm:p-6 flex items-center justify-between shrink-0 border-b border-emerald-500/20">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-xl shrink-0"><i class="bi bi-journal-bookmark-fill text-xl"></i></div>
                        <div>
                            <span id="bpsBookModalBadge" class="text-[10px] font-black uppercase tracking-wider text-emerald-300">PUBLIKASI RESMI BPS</span>
                            <h3 id="bpsBookModalTitle" class="text-base sm:text-lg font-black leading-tight text-white mt-0.5">Judul Buku</h3>
                        </div>
                    </div>
                    <button type="button" onclick="window.closeBpsBookModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-sm font-bold transition cursor-pointer" title="Tutup Modal"><i class="bi bi-x-lg text-xs"></i></button>
                </div>
                <div class="p-6 space-y-4 overflow-y-auto flex-1 text-slate-700 text-xs sm:text-sm">
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 p-3 bg-slate-50 rounded-2xl border border-slate-200 text-[11px]">
                        <div><span class="text-slate-400 block font-bold">Katalog BPS</span><b id="bpsBookModalKatalog">-</b></div>
                        <div><span class="text-slate-400 block font-bold">No. Publikasi</span><b id="bpsBookModalPubNo">-</b></div>
                        <div><span class="text-slate-400 block font-bold">Rilis</span><b id="bpsBookModalRilis">-</b></div>
                        <div><span class="text-slate-400 block font-bold">Halaman</span><b id="bpsBookModalHal">-</b></div>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-sm text-slate-900 mb-1">Ringkasan Eksekutif</h4>
                        <p id="bpsBookModalDesc" class="leading-relaxed text-slate-600">Deskripsi ringkasan buku.</p>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-sm text-slate-900 mb-2">Struktur Konten &amp; Bab Utama</h4>
                        <ul id="bpsBookModalChapters" class="space-y-1.5 text-xs text-slate-600 list-disc list-inside bg-emerald-50/50 p-4 rounded-2xl border border-emerald-100">
                            <!-- Populated via JS -->
                        </ul>
                    </div>
                </div>
                <div class="p-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between gap-3 shrink-0">
                    <span class="text-[11px] text-slate-500 font-medium hidden sm:inline">BPS Kabupaten Kolaka Utara © 2026</span>
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <button type="button" onclick="window.closeBpsBookModal()" class="flex-1 sm:flex-none px-4 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs transition cursor-pointer">
                            Tutup
                        </button>
                        <a id="bpsBookModalDownloadBtn" href="https://kolutkab.bps.go.id" target="_blank" class="flex-1 sm:flex-none px-5 py-2 rounded-xl bg-[#3B4D3B] hover:bg-[#566B53] text-white font-bold text-xs shadow-sm transition flex items-center justify-center gap-1.5 cursor-pointer"><i class="bi bi-file-earmark-pdf-fill text-sm"></i> <span>Unduh / Akses Resmi</span></a>
                    </div>
                </div>
            </div>
        </div>
