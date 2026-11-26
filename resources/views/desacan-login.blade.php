<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk Akun Resmi - Desa Cantik (DESCAN) BPS Kolaka Utara</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        theme: {
                            rose: '#9F1239',
                            crimson: '#BE123C',
                            darkRose: '#881337',
                            ice: '#E0F2FE',
                            iceLight: '#F0F9FF',
                            iceBorder: '#BAE6FD',
                            iceAccent: '#0284C7'
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Sistem Autentikasi Akun Resmi DESCAN -->
    <script src="/js/descan-auth.js"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 10% 20%, #4C0519 0%, #1E293B 60%, #0F172A 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .bg-grid-mesh {
            background-image: radial-gradient(rgba(224, 242, 254, 0.1) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        .card-surface {
            background: #FFFFFF;
            border: 1px solid #BAE6FD;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);
        }

        .role-tab-btn {
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
        }
        .role-tab-btn.active {
            background: linear-gradient(135deg, #9F1239 0%, #BE123C 100%);
            color: #FFFFFF !important;
            box-shadow: 0 4px 15px rgba(159, 18, 57, 0.35);
            border-color: #9F1239;
        }

        .btn-shimmer-sweep {
            position: relative;
            overflow: hidden;
        }
        .btn-shimmer-sweep::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transform: skewX(-20deg);
            animation: btnGleam 5s ease-in-out infinite;
        }
        @keyframes btnGleam {
            0% { left: -100%; }
            25%, 100% { left: 200%; }
        }

        .shimmer-top-bar {
            background: linear-gradient(90deg, #9F1239, #BE123C, #0284C7, #BAE6FD, #9F1239);
            background-size: 300% 100%;
            animation: shimmerFlow 7s ease infinite;
        }
        @keyframes shimmerFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="text-slate-800 flex flex-col justify-between p-4 sm:p-6 lg:p-8 min-h-screen relative">

    <!-- Subtle Ambient Grid Mesh -->
    <div class="pointer-events-none fixed inset-0 z-0 bg-grid-mesh opacity-60"></div>

    <!-- Ambient Glowing Orbs -->
    <div class="pointer-events-none fixed -top-24 -left-24 w-96 h-96 bg-rose-500/20 rounded-full blur-3xl z-0"></div>
    <div class="pointer-events-none fixed -bottom-24 -right-24 w-96 h-96 bg-sky-500/20 rounded-full blur-3xl z-0"></div>

    <!-- TOP HEADER -->
    <header class="relative z-10 w-full max-w-5xl mx-auto flex items-center justify-between pb-4 sm:pb-6">
        <a href="/descan" class="flex items-center gap-3 group">
            <div class="flex items-center gap-2 bg-white/10 backdrop-blur-md px-3 py-2 rounded-2xl border border-white/20 shadow-lg group-hover:scale-105 transition-all">
                <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-9 w-auto object-contain drop-shadow" title="Pemerintah Kabupaten Kolaka Utara">
                <div class="h-6 w-[1.5px] bg-white/30"></div>
                <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-8 w-auto object-contain drop-shadow" title="Badan Pusat Statistik Kolaka Utara">
            </div>
            <div>
                <div class="text-xl sm:text-2xl font-black tracking-widest text-white leading-none flex items-center gap-2">
                    <span>DESCAN</span>
                    <span class="text-[9px] px-2 py-0.5 rounded-full bg-rose-500/30 text-rose-200 font-extrabold border border-rose-400/40">PORTAL RESMI</span>
                </div>
                <div class="text-[10px] text-sky-200 font-bold tracking-wider uppercase mt-1">
                    Desa Cantik • BPS Kolaka Utara
                </div>
            </div>
        </a>

        <div class="flex items-center gap-2">
            <a href="/descan" class="px-4 py-2 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-xs backdrop-blur-md transition-all flex items-center gap-2 shadow-xs hover:shadow-md cursor-pointer">
                <i class="bi bi-arrow-left"></i>
                <span class="hidden sm:inline">Kembali ke Beranda Publik</span>
                <span class="sm:hidden">Beranda</span>
            </a>
        </div>
    </header>

    <!-- MAIN LOGIN CARD -->
    <main class="relative z-10 w-full max-w-5xl mx-auto my-auto py-2 sm:py-4">
        <div class="card-surface rounded-3xl overflow-hidden grid grid-cols-1 lg:grid-cols-12">
            
            <!-- LEFT PANEL: IDENTITAS ROLE & HERO -->
            <div id="loginLeftPanel" class="lg:col-span-5 bg-gradient-to-b from-[#881337] via-[#4C0519] to-slate-950 text-white p-6 sm:p-8 flex flex-col justify-between border-b lg:border-b-0 lg:border-r border-rose-900/40 relative overflow-hidden">
                
                <div class="relative z-10 space-y-4">
                    <div class="inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-wider text-rose-200 bg-rose-950/60 px-3 py-1 rounded-full border border-rose-500/30">
                        <span class="w-2 h-2 rounded-full bg-rose-400 animate-pulse"></span>
                        <span id="roleBadgeLabel">PORTAL RESMI ADMIN BPS</span>
                    </div>

                    <!-- Hero Visual Card -->
                    <div class="relative w-full h-44 sm:h-52 rounded-2xl overflow-hidden border-2 border-white/20 shadow-2xl group">
                        <img id="roleHeroPhoto" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1000&q=80" alt="Hero Photo" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-950/40 to-transparent flex flex-col justify-end p-4">
                            <span class="text-[10px] font-bold text-sky-300 uppercase tracking-wider" id="roleSubtitle">Kabupaten Kolaka Utara</span>
                            <h2 id="roleTitle" class="text-xl sm:text-2xl font-black text-white leading-tight">BPS Kabupaten Kolaka Utara</h2>
                        </div>
                    </div>

                    <!-- Role Description -->
                    <div class="p-3.5 rounded-2xl bg-white/10 backdrop-blur-md border border-white/15 space-y-1.5">
                        <span class="text-[10px] font-black uppercase tracking-wider text-rose-300 block" id="roleKeyInfoLabel">Tanggung Jawab Utama</span>
                        <p id="roleDescription" class="text-xs text-slate-200 leading-relaxed font-medium">
                            Monitoring pemenuhan 44 indikator Desa Cantik, evaluasi Lembar Kerja Evaluasi (LKE), mengunggah modul materi pembinaan, dan mengunggah video mikrolearning edukasi.
                        </p>
                    </div>
                </div>

                <div class="relative z-10 pt-4 mt-4 border-t border-rose-900/50 text-[11px] text-slate-400 font-medium flex items-center justify-between">
                    <span>© 2026 BPS Kolaka Utara</span>
                    <span class="inline-flex items-center gap-1 text-[10px] text-sky-300 font-bold"><i class="bi bi-shield-check"></i> SSL Terverifikasi</span>
                </div>
            </div>

            <!-- RIGHT PANEL: ROLE SWITCHER & LOGIN FORM -->
            <div class="lg:col-span-7 flex flex-col bg-white">
                <div class="h-1.5 w-full shimmer-top-bar"></div>

                <div class="p-6 sm:p-10 flex-1 flex flex-col justify-center">
                    <div class="max-w-md w-full mx-auto space-y-6">

                        <!-- ROLE SWITCHER TABS (BPS vs OPERATOR DESA) -->
                        <div>
                            <span class="text-[11px] font-extrabold uppercase tracking-wider text-slate-500 block mb-2">Pilih Peran Akun Masuk:</span>
                            <div class="grid grid-cols-2 gap-2 p-1.5 rounded-2xl bg-[#F0F9FF] border border-[#BAE6FD]">
                                <button type="button" onclick="selectRole('bps')" id="roleTabBps" class="role-tab-btn active py-2.5 px-3 rounded-xl text-xs font-black flex items-center justify-center gap-2 border border-transparent">
                                    <i class="bi bi-building-fill text-sm"></i>
                                    <span>Admin BPS</span>
                                </button>
                                <button type="button" onclick="selectRole('operator')" id="roleTabOperator" class="role-tab-btn py-2.5 px-3 rounded-xl text-xs font-bold text-slate-600 hover:text-[#9F1239] flex items-center justify-center gap-2 border border-transparent">
                                    <i class="bi bi-house-door-fill text-sm"></i>
                                    <span>Operator Desa</span>
                                </button>
                            </div>
                        </div>

                        <!-- Header Form -->
                        <div>
                            <h1 class="text-2xl font-black text-slate-900 tracking-tight" id="formHeaderTitle">Masuk ke Portal Admin BPS</h1>
                            <p class="text-xs text-slate-500 mt-1" id="formHeaderSubtitle">Gunakan kredensial pembina BPS Kolaka Utara untuk melanjutkan.</p>
                        </div>

                        <!-- VILLAGE SELECTOR (Only shown when Operator Desa is active) -->
                        <div id="villageSelectorContainer" class="hidden space-y-1.5 p-3.5 rounded-2xl bg-sky-50/60 border border-[#BAE6FD]">
                            <label for="selVillage" class="block text-xs font-extrabold text-slate-800">Pilih Desa Binaan:</label>
                            <select id="selVillage" onchange="onVillageSelected(this.value)" class="w-full px-3 py-2.5 rounded-xl border border-[#BAE6FD] bg-white text-xs font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#9F1239]/20 focus:border-[#9F1239]">
                                <option value="kamisi">1. Desa Kamisi (Kec. Kodeoha - Bahari Mandiri)</option>
                                <option value="koroha">2. Desa Koroha (Kec. Kodeoha - Maritim Mandiri)</option>
                                <option value="malamala">3. Kelurahan Mala-Mala (Kec. Kodeoha - Perkotaan Mandiri)</option>
                                <option value="lapolu">4. Desa Lapolu (Kec. Tiwu - Agro Mandiri)</option>
                                <option value="tanggeawo">5. Desa Tanggeawo (Kec. Tiwu - Agrikultur Mandiri)</option>
                                <option value="mattirobulu">6. Desa Mattiro Bulu (Kec. Tiwu - Terbina Aktif)</option>
                            </select>
                        </div>

                        <!-- LOGIN FORM -->
                        <form id="mainLoginForm" onsubmit="handleLoginSubmit(event)" autocomplete="off" class="space-y-4">
                            
                            <div id="loginErrorAlert" class="hidden p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs flex items-center gap-2.5 animate-pulse">
                                <i class="bi bi-exclamation-triangle-fill text-rose-600 text-sm"></i>
                                <span id="loginErrorText" class="font-semibold">Email atau kata sandi salah.</span>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="inpEmail" class="block text-xs font-bold text-slate-700 mb-1.5">Alamat Email Resmi</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 text-sm"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" id="inpEmail" required autocomplete="off" placeholder="admin@bps.go.id" class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-300 text-xs sm:text-sm font-semibold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#9F1239]/20 focus:border-[#9F1239] transition">
                                </div>
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="inpPassword" class="block text-xs font-bold text-slate-700 mb-1.5">Kata Sandi</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 text-sm"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" id="inpPassword" required autocomplete="new-password" placeholder="Masukkan kata sandi" class="w-full pl-10 pr-12 py-3 rounded-xl border border-slate-300 text-xs sm:text-sm font-semibold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#9F1239]/20 focus:border-[#9F1239] transition">
                                    <button type="button" onclick="togglePassVisibility()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 text-sm cursor-pointer" title="Lihat/Sembunyikan Sandi">
                                        <i id="eyePassIcon" class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2">
                                <button type="submit" id="btnSubmitLogin" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-[#9F1239] to-[#BE123C] hover:from-[#881337] hover:to-[#9F1239] text-white font-extrabold text-xs sm:text-sm shadow-md hover:shadow-lg transition flex items-center justify-center gap-2 cursor-pointer btn-shimmer-sweep active:scale-[0.99]">
                                    <span id="btnSubmitText">Masuk ke Portal Admin BPS →</span>
                                </button>
                            </div>
                        </form>

                        <!-- Quick Demo / Autofill Actions -->
                        <div class="pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
                            <button type="button" onclick="autoFillCredentials()" class="flex-1 py-2 rounded-xl bg-[#F0F9FF] hover:bg-[#E0F2FE] border border-[#BAE6FD] text-[#0284C7] font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                <i class="bi bi-lightning-charge-fill text-amber-500"></i>
                                <span>Isi Sandi Otomatis</span>
                            </button>
                            <a href="/descan" class="py-2 px-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-600 font-bold text-xs transition text-center cursor-pointer">
                                Mode Publik
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="relative z-10 w-full max-w-5xl mx-auto text-center text-xs text-sky-200/80 pt-4">
        © 2026 Badan Pusat Statistik Kabupaten Kolaka Utara • Program Desa Cinta Statistik (DESCAN)
    </footer>

    <!-- TOAST -->
    <div id="loginToast" class="fixed bottom-6 right-6 z-50 hidden px-5 py-3 rounded-2xl bg-slate-900 text-white text-xs font-bold shadow-2xl border border-slate-700 animate-bounce"></div>

    <!-- SCRIPT LOGIC -->
    <script>
        let currentRole = 'bps'; // 'bps' or 'operator'
        let currentDesaKey = 'kamisi';

        function selectRole(role) {
            currentRole = role;
            const tabBps = document.getElementById('roleTabBps');
            const tabOperator = document.getElementById('roleTabOperator');
            const villageContainer = document.getElementById('villageSelectorContainer');
            const formHeaderTitle = document.getElementById('formHeaderTitle');
            const formHeaderSubtitle = document.getElementById('formHeaderSubtitle');
            const btnSubmitText = document.getElementById('btnSubmitText');
            const btnSubmitLogin = document.getElementById('btnSubmitLogin');

            const roleBadge = document.getElementById('roleBadgeLabel');
            const rolePhoto = document.getElementById('roleHeroPhoto');
            const roleSubtitle = document.getElementById('roleSubtitle');
            const roleTitle = document.getElementById('roleTitle');
            const roleDesc = document.getElementById('roleDescription');
            const emailInp = document.getElementById('inpEmail');
            const passInp = document.getElementById('inpPassword');
            const errBox = document.getElementById('loginErrorAlert');

            if (errBox) errBox.classList.add('hidden');
            if (passInp) passInp.value = '';

            if (role === 'bps') {
                tabBps.className = 'role-tab-btn active py-2.5 px-3 rounded-xl text-xs font-black flex items-center justify-center gap-2 border border-transparent';
                tabOperator.className = 'role-tab-btn py-2.5 px-3 rounded-xl text-xs font-bold text-slate-600 hover:text-[#9F1239] flex items-center justify-center gap-2 border border-transparent';
                villageContainer.classList.add('hidden');

                formHeaderTitle.textContent = 'Masuk ke Portal Admin BPS';
                formHeaderSubtitle.textContent = 'Gunakan kredensial resmi pembina BPS Kolaka Utara untuk melanjutkan.';
                btnSubmitText.textContent = 'Masuk ke Portal Admin BPS →';
                btnSubmitLogin.className = 'w-full py-3.5 rounded-xl bg-gradient-to-r from-[#9F1239] to-[#BE123C] hover:from-[#881337] hover:to-[#9F1239] text-white font-extrabold text-xs sm:text-sm shadow-md hover:shadow-lg transition flex items-center justify-center gap-2 cursor-pointer btn-shimmer-sweep active:scale-[0.99]';

                roleBadge.textContent = 'PORTAL RESMI ADMIN BPS';
                rolePhoto.src = '/images/logo_bps.png';
                roleSubtitle.textContent = 'Kabupaten Kolaka Utara';
                roleTitle.textContent = 'BPS Kabupaten Kolaka Utara';
                roleDesc.textContent = 'Monitoring live 6 desa binaan, evaluasi kepatuhan LKE 44 indikator, mengunggah materi pembinaan & template publikasi, dan mengunggah video edukasi mikrolearning.';

                const bpsAcc = DESCAN_ACCOUNTS.bps;
                if (emailInp && bpsAcc) emailInp.value = bpsAcc.email;
            } else {
                tabOperator.className = 'role-tab-btn active py-2.5 px-3 rounded-xl text-xs font-black flex items-center justify-center gap-2 border border-transparent';
                tabBps.className = 'role-tab-btn py-2.5 px-3 rounded-xl text-xs font-bold text-slate-600 hover:text-[#9F1239] flex items-center justify-center gap-2 border border-transparent';
                villageContainer.classList.remove('hidden');

                formHeaderTitle.textContent = 'Masuk ke Portal Operator Desa';
                formHeaderSubtitle.textContent = 'Pilih desa binaan dan masukkan sandi operator untuk melanjutkan.';
                btnSubmitText.textContent = 'Masuk ke Portal Operator Desa →';
                btnSubmitLogin.className = 'w-full py-3.5 rounded-xl bg-gradient-to-r from-[#0284C7] to-[#0369A1] hover:from-[#0369A1] hover:to-[#075985] text-white font-extrabold text-xs sm:text-sm shadow-md hover:shadow-lg transition flex items-center justify-center gap-2 cursor-pointer btn-shimmer-sweep active:scale-[0.99]';

                onVillageSelected(currentDesaKey);
            }
        }

        function onVillageSelected(key) {
            currentDesaKey = key;
            const acc = DESCAN_ACCOUNTS[key] || DESCAN_ACCOUNTS.kamisi;

            const roleBadge = document.getElementById('roleBadgeLabel');
            const rolePhoto = document.getElementById('roleHeroPhoto');
            const roleSubtitle = document.getElementById('roleSubtitle');
            const roleTitle = document.getElementById('roleTitle');
            const roleDesc = document.getElementById('roleDescription');
            const emailInp = document.getElementById('inpEmail');

            roleBadge.textContent = 'OPERATOR 6 DESA BINAAN';
            rolePhoto.src = acc.avatar;
            roleSubtitle.textContent = `${acc.kecamatan} • Desa Cantik`;
            roleTitle.textContent = acc.desaName;
            roleDesc.textContent = `${acc.description} • Akses materi/video dari BPS, pengisian LKE mandiri 44 indikator, dan unggah output publikasi resmi desa.`;

            if (emailInp) emailInp.value = acc.email;
        }

        function autoFillCredentials() {
            const emailInp = document.getElementById('inpEmail');
            const passInp = document.getElementById('inpPassword');

            if (currentRole === 'bps') {
                const acc = DESCAN_ACCOUNTS.bps;
                if (emailInp) emailInp.value = acc.email;
                if (passInp) passInp.value = acc.password;
                showToast(`✓ Kredensial Admin BPS (${acc.email}) terisi!`);
            } else {
                const acc = DESCAN_ACCOUNTS[currentDesaKey] || DESCAN_ACCOUNTS.kamisi;
                if (emailInp) emailInp.value = acc.email;
                if (passInp) passInp.value = acc.password;
                showToast(`✓ Kredensial Operator ${acc.desaName} (${acc.email}) terisi!`);
            }
        }

        function togglePassVisibility() {
            const inp = document.getElementById('inpPassword');
            const icon = document.getElementById('eyePassIcon');
            if (inp) {
                if (inp.type === 'password') {
                    inp.type = 'text';
                    if (icon) icon.className = 'bi bi-eye-slash';
                } else {
                    inp.type = 'password';
                    if (icon) icon.className = 'bi bi-eye';
                }
            }
        }

        function handleLoginSubmit(e) {
            e.preventDefault();
            const email = document.getElementById('inpEmail').value.trim();
            const pass = document.getElementById('inpPassword').value.trim();
            const errBox = document.getElementById('loginErrorAlert');
            const errText = document.getElementById('loginErrorText');

            if (currentRole === 'bps') {
                const res = validateDescanLogin(email, pass, 'bps');
                if (!res.success) {
                    if (errBox && errText) {
                        errText.textContent = res.message || 'Email atau kata sandi Admin BPS tidak cocok.';
                        errBox.classList.remove('hidden');
                    }
                    return;
                }
                setDescanAuth(res.account);
                showToast('✓ Berhasil masuk sebagai Admin BPS! Membuka portal BPS...');
                setTimeout(() => {
                    const bpsTarget = (window.location.protocol === 'file:' || window.location.pathname.endsWith('.html')) ? 'descan-bps.html' : '/descan/bps';
                    window.location.href = bpsTarget;
                }, 600);
            } else {
                const res = validateDescanLogin(email, pass, currentDesaKey);
                if (!res.success) {
                    if (errBox && errText) {
                        errText.textContent = res.message || 'Email atau kata sandi tidak cocok untuk desa ini.';
                        errBox.classList.remove('hidden');
                    }
                    return;
                }
                setDescanAuth(res.account);
                showToast(`✓ Berhasil masuk sebagai Operator ${res.account.desaName}! Membuka portal desa...`);
                setTimeout(() => {
                    const opTarget = (window.location.protocol === 'file:' || window.location.pathname.endsWith('.html')) ? `descan-menu.html?desa=${res.account.desaKey}` : `/descan/operator?desa=${res.account.desaKey}`;
                    window.location.href = opTarget;
                }, 600);
            }
        }

        function showToast(msg) {
            const toast = document.getElementById('loginToast');
            if (toast) {
                toast.textContent = msg;
                toast.classList.remove('hidden');
                setTimeout(() => toast.classList.add('hidden'), 3500);
            }
        }

        // Init on page load
        document.addEventListener('DOMContentLoaded', () => {
            const params = new URLSearchParams(window.location.search);
            const roleParam = (params.get('role') || 'bps').toLowerCase();
            const desaParam = (params.get('desa') || 'kamisi').toLowerCase();

            if (desaParam && document.getElementById('selVillage')) {
                document.getElementById('selVillage').value = desaParam;
                currentDesaKey = desaParam;
            }

            if (roleParam === 'operator' || params.has('desa')) {
                selectRole('operator');
            } else {
                selectRole('bps');
            }
        });
    </script>
</body>
</html>
