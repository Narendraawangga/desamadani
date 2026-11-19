<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Akun Resmi Desa - DESCAN BPS Kolaka Utara</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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
                        bps: {
                            blue: '#005ea6',
                            dark: '#0b2545',
                            navy: '#06182e',
                            light: '#e0f2fe',
                        },
                        descan: {
                            forest: '#183b28',
                            emerald: '#059669',
                            leaf: '#10b981',
                            amber: '#f59e0b',
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
            background: radial-gradient(circle at 20% 20%, #06182e 0%, #0b2545 50%, #031424 100%);
            min-height: 100vh;
        }
        .desa-pill-btn.active {
            background: #005ea6;
            color: #ffffff;
            font-weight: 800;
            border-color: #005ea6;
        }
    </style>
</head>
<body class="text-slate-800 flex flex-col justify-between p-4 sm:p-6 lg:p-8 min-h-screen selection:bg-amber-200 selection:text-amber-950">

    <!-- Ambient Glowing Blur Orbs -->
    <div class="pointer-events-none fixed -top-24 -left-24 w-96 h-96 bg-emerald-500/15 rounded-full blur-3xl"></div>
    <div class="pointer-events-none fixed -bottom-24 -right-24 w-96 h-96 bg-blue-500/15 rounded-full blur-3xl"></div>

    <!-- TOP HEADER BAR -->
    <header class="relative z-10 w-full max-w-5xl mx-auto flex items-center justify-between pb-4 sm:pb-6">
        <!-- Left: Logo Kolaka Utara bersampingan dengan Logo BPS Kolut -->
        <a href="/descan" class="flex items-center gap-3 group">
            <div class="flex items-center gap-2 bg-white/10 backdrop-blur-md px-2.5 py-1.5 rounded-2xl border border-white/20 shadow-lg group-hover:scale-105 transition">
                <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-9 w-auto object-contain drop-shadow" title="Pemerintah Kabupaten Kolaka Utara">
                <div class="h-6 w-[1.5px] bg-white/30"></div>
                <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-8 w-auto object-contain drop-shadow" title="Badan Pusat Statistik Kolaka Utara">
            </div>
            <div>
                <div class="text-xl sm:text-2xl font-black tracking-widest text-white leading-none flex items-center gap-1.5">
                    <span>DESCAN</span>
                    <span class="text-[9px] px-1.5 py-0.5 rounded-full bg-emerald-500/30 text-emerald-300 font-extrabold border border-emerald-400/40">AUTH</span>
                </div>
                <div class="text-[9px] text-emerald-200/90 font-bold tracking-widest uppercase mt-0.5">
                    Desa Cantik • BPS Kolaka Utara
                </div>
            </div>
        </a>

        <div class="flex items-center gap-2">
            <a href="/descan" class="px-4 py-2 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-xs backdrop-blur-md transition flex items-center gap-2 shadow-sm hover:shadow-md">
                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span class="hidden sm:inline">Kembali ke 6 Desa</span>
                <span class="sm:hidden">6 Desa</span>
            </a>
        </div>
    </header>

    <!-- MAIN LOGIN CARD CONTAINER -->
    <main class="relative z-10 w-full max-w-5xl mx-auto my-auto py-2 sm:py-4">
        <div class="bg-white rounded-3xl shadow-2xl border border-white/20 overflow-hidden grid grid-cols-1 lg:grid-cols-12">
            
            <!-- LEFT PANEL: IDENTITAS KHUSUS DESA YANG SEDANG DI-LOGIN -->
            <div class="lg:col-span-5 bg-gradient-to-b from-slate-900 via-[#0b2545] to-slate-950 text-white p-6 sm:p-8 flex flex-col justify-between border-b lg:border-b-0 lg:border-r border-slate-800 relative overflow-hidden">
                
                <!-- Background ambient image blurred -->
                <div class="absolute inset-0 z-0 opacity-20 pointer-events-none">
                    <img id="sideDesaBgPhoto" src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80" alt="Background Desa" class="w-full h-full object-cover">
                </div>

                <div class="relative z-10 space-y-4">
                    <div class="inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-amber-400 bg-amber-400/10 px-3 py-1 rounded-full border border-amber-400/20 shadow-xs">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Portal Login Resmi Desa Binaan (Kec. Kodeoha)</span>
                    </div>

                    <!-- Village Feature Landscape Photo Card -->
                    <div class="relative w-full h-44 sm:h-52 rounded-2xl overflow-hidden border-2 border-white/20 shadow-2xl group">
                        <img id="sideDesaHeroPhoto" src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1000&q=90" alt="Foto Desa" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent flex flex-col justify-end p-4">
                            <span class="text-[10px] font-bold text-amber-300 uppercase tracking-widest" id="sideDesaKecamatanTag">Kec. Kodeoha • Kab. Kolaka Utara</span>
                            <h2 id="sideDesaHeroTitle" class="text-xl sm:text-2xl font-black text-white leading-tight">Desa Kalu Kaluku</h2>
                        </div>
                    </div>

                    <!-- Status pembinaan -->
                    <div class="flex items-center gap-2 text-xs">
                        <span id="sideDesaStatusBadge" class="px-2.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 font-extrabold text-[10px] border border-emerald-500/30">Terverifikasi BPS (Mandiri)</span>
                    </div>

                    <!-- Explanation text specifically for this village -->
                    <div class="pt-2">
                        <p id="sideDesaDesc" class="text-xs text-slate-300 leading-relaxed font-medium">
                            Pilot Utama Desa Cantik BPS Kolaka Utara. Terletak strategis di perbatasan Ibu Kota Lasusua, dengan sentra kakao rakyat dan perikanan terpadu.
                        </p>
                    </div>
                </div>

                <div class="relative z-10 pt-4 mt-4 border-t border-slate-800 text-[10px] text-slate-500 font-medium">
                    BPS Kolaka Utara 2026
                </div>
            </div>

            <!-- RIGHT PANEL: FORM LOGIN -->
            <div class="lg:col-span-7 flex flex-col bg-white">
                <div class="h-1.5 w-full bg-gradient-to-r from-emerald-500 via-[#005ea6] to-amber-500"></div>

                <div class="p-6 sm:p-10 flex-1 flex flex-col justify-center">
                    <div class="max-w-md w-full mx-auto">

                        <h1 class="text-2xl font-black text-slate-900 tracking-tight">Masuk ke Dashboard Desa</h1>
                        <p class="text-sm text-slate-500 mt-1">Gunakan akun resmi desa binaan untuk melanjutkan.</p>

                        <form id="mainLoginForm" onsubmit="handleMainLoginSubmit(event)" autocomplete="off" class="space-y-4 mt-7">

                            <div id="loginErrorAlert" class="hidden p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs flex items-center gap-2.5">
                                <svg class="w-4 h-4 shrink-0 text-rose-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span id="loginErrorText" class="font-medium">Email atau kata sandi tidak cocok.</span>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="inpEmail" class="block text-xs font-bold text-slate-700 mb-1.5">Email Akun Desa</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-sm">✉️</span>
                                    <input type="email" id="inpEmail" required autocomplete="off" placeholder="admin.nama_desa@descan.bps.go.id" class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-300 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500/40 focus:border-emerald-500">
                                </div>
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="inpPassword" class="block text-xs font-bold text-slate-700 mb-1.5">Kata Sandi</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-sm">🔒</span>
                                    <input type="password" id="inpPassword" required autocomplete="new-password" placeholder="Masukkan kata sandi" class="w-full pl-10 pr-12 py-3 rounded-xl border border-slate-300 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500/40 focus:border-emerald-500">
                                    <button type="button" onclick="togglePassVisibility()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 text-sm cursor-pointer" title="Lihat/Sembunyikan Sandi">👁️</button>
                                </div>
                            </div>

                            <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-[#0f6b4a] to-[#0a4d36] hover:from-[#0d5c40] hover:to-[#083b2a] text-white font-black text-sm shadow-lg hover:shadow-xl transition flex items-center justify-center gap-2 cursor-pointer">
                                <span id="btnSubmitText">Masuk ke Dashboard</span>
                                <span>→</span>
                            </button>
                        </form>

                        <div class="flex items-center gap-3 my-5 text-[11px] text-slate-400 font-semibold">
                            <span class="flex-1 h-px bg-slate-200"></span>atau<span class="flex-1 h-px bg-slate-200"></span>
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <button type="button" onclick="autoFillActiveCredentials()" class="py-2.5 rounded-xl bg-amber-50 hover:bg-amber-100 border border-amber-200 text-amber-800 font-bold text-xs transition cursor-pointer">⚡ Isi Sandi Otomatis</button>
                            <button type="button" onclick="loginAsGuestViewer()" class="py-2.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 text-emerald-800 font-bold text-xs transition cursor-pointer">👁️ Masuk sebagai Tamu</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="relative z-10 w-full max-w-5xl mx-auto text-center text-xs text-blue-200/80 pt-4">
        © 2024–2026 Badan Pusat Statistik Kabupaten Kolaka Utara • Program Desa Cantik (DESCAN)
    </footer>

    <!-- Toast Notification -->
    <div id="loginToast" class="fixed bottom-5 right-5 z-50 hidden px-4 py-2.5 rounded-2xl bg-slate-900 text-white text-xs font-bold shadow-2xl border border-slate-700 animate-bounce"></div>

    <!-- SCRIPT LOGIC -->
    <script>
        let currentSelectedDesa = 'kalukaluku';

        function selectLoginDesa(key) {
            key = (key || 'kalukaluku').toLowerCase();
            if (key === 'cijati') key = 'kalukaluku';
            if (key === 'sukamaju') key = 'awo';
            if (key === 'mekarwangi') key = 'kamisi';
            if (key === 'tegalasri') key = 'koroha';
            if (key === 'harapan') key = 'lametuna';
            if (key === 'lestari') key = 'sawangaoha';

            currentSelectedDesa = key;
            const acc = (typeof DESCAN_ACCOUNTS !== 'undefined' && DESCAN_ACCOUNTS[key]) ? DESCAN_ACCOUNTS[key] : DESCAN_ACCOUNTS['kalukaluku'];

            // Sinkronkan dropdown desa
            const selDesa = document.getElementById('selDesa');
            if (selDesa) selDesa.value = key;

            // Update Left Hero Panel specifically for this village
            const sideHeroPhoto = document.getElementById('sideDesaHeroPhoto');
            const sideBgPhoto = document.getElementById('sideDesaBgPhoto');
            const sideTitle = document.getElementById('sideDesaHeroTitle');
            const sideKec = document.getElementById('sideDesaKecamatanTag');
            const sideLembaga = document.getElementById('sideDesaLembaga');
            const sideDesc = document.getElementById('sideDesaDesc');
            const sideStatus = document.getElementById('sideDesaStatusBadge');

            if (sideHeroPhoto) sideHeroPhoto.src = acc.avatar;
            if (sideBgPhoto) sideBgPhoto.src = acc.avatar;
            if (sideTitle) sideTitle.textContent = acc.desaName;
            if (sideKec) sideKec.textContent = acc.kecamatan;
            if (sideLembaga) sideLembaga.textContent = acc.rep;
            if (sideDesc) sideDesc.textContent = acc.description;
            if (sideStatus) sideStatus.textContent = `Terverifikasi BPS (${acc.kategori || 'Mandiri'})`;

            // Update Right Context Card
            const nameEl = document.getElementById('activeDesaName');
            const repEl = document.getElementById('activeDesaRep');
            const wilEl = document.getElementById('activeDesaWilayah');
            const avEl = document.getElementById('activeDesaAvatar');
            const emailInp = document.getElementById('inpEmail');
            const passInp = document.getElementById('inpPassword');
            const errEl = document.getElementById('loginErrorAlert');
            const btnSubmitText = document.getElementById('btnSubmitText');
            const hintEmail = document.getElementById('hintCurrentEmail');

            if (nameEl) nameEl.textContent = acc.desaName;
            if (repEl) repEl.textContent = `${acc.rep} • ${acc.role}`;
            if (wilEl) wilEl.textContent = `${acc.kecamatan} • Program Desa Cantik`;
            if (avEl) avEl.src = acc.avatar;
            if (emailInp) emailInp.value = acc.email;
            if (passInp) passInp.value = '';
            if (errEl) errEl.classList.add('hidden');
            if (hintEmail) hintEmail.textContent = acc.email;

            const hintEl = document.getElementById('hintPasswordDisplay');
            if (hintEl) hintEl.textContent = `Sandi: ${acc.password}`;
        }

        function loginAsGuestViewer() {
            const acc = (typeof DESCAN_ACCOUNTS !== 'undefined' && DESCAN_ACCOUNTS[currentSelectedDesa]) ? DESCAN_ACCOUNTS[currentSelectedDesa] : DESCAN_ACCOUNTS['kalukaluku'];
            const session = {
                desaKey: currentSelectedDesa,
                desaName: acc.desaName,
                rep: acc.rep,
                avatar: acc.avatar,
                email: acc.email,
                role: 'Peninjau Resmi BPS / Tamu',
                loginAt: new Date().toISOString()
            };
            try {
                localStorage.setItem('descan_auth_session', JSON.stringify(session));
                sessionStorage.setItem('descan_auth_session', JSON.stringify(session));
            } catch(e) {}
            window.location.href = `/descan/menu?desa=${currentSelectedDesa}&menu=dashboard`;
        }

        function autoFillActiveCredentials() {
            const acc = (typeof DESCAN_ACCOUNTS !== 'undefined' && DESCAN_ACCOUNTS[currentSelectedDesa]) ? DESCAN_ACCOUNTS[currentSelectedDesa] : null;
            if (acc) {
                const emailInp = document.getElementById('inpEmail');
                const passInp = document.getElementById('inpPassword');
                if (emailInp) emailInp.value = acc.email;
                if (passInp) passInp.value = acc.password;
                showLoginToast(`✓ Kredensial resmi ${acc.desaName} terisi otomatis!`);
            }
        }

        function togglePassVisibility() {
            const inp = document.getElementById('inpPassword');
            if (inp) inp.type = inp.type === 'password' ? 'text' : 'password';
        }

        function handleMainLoginSubmit(e) {
            e.preventDefault();
            const emailInp = document.getElementById('inpEmail');
            const passInp = document.getElementById('inpPassword');
            const errBox = document.getElementById('loginErrorAlert');
            const errText = document.getElementById('loginErrorText');

            const email = emailInp ? emailInp.value : '';
            const pass = passInp ? passInp.value : '';

            const result = validateDescanLogin(email, pass, currentSelectedDesa);

            if (!result.success) {
                if (result.mismatch && result.account) {
                    if (errBox && errText) {
                        errText.innerHTML = `Akun ini terdaftar sebagai <b>${result.account.desaName}</b>.<br><a href="javascript:void(0)" onclick="selectLoginDesa('${result.account.desaKey}'); autoFillActiveCredentials();" class="underline font-bold text-blue-700">Klik di sini untuk beralih ke ${result.account.desaName}</a>`;
                        errBox.classList.remove('hidden');
                    }
                } else {
                    if (errBox && errText) {
                        errText.textContent = result.message || 'Email atau kata sandi tidak cocok untuk desa ini.';
                        errBox.classList.remove('hidden');
                    }
                }
                return;
            }

            // Success! Session is already saved by validateDescanLogin in localStorage & sessionStorage
            if (errBox) errBox.classList.add('hidden');
            showLoginToast(`✓ Berhasil login sebagai ${result.account.desaName}! Mengarahkan ke dashboard...`);

            setTimeout(() => {
                window.location.href = `/descan/menu?desa=${result.account.desaKey}&menu=dashboard`;
            }, 700);
        }

        function showLoginToast(msg) {
            const toast = document.getElementById('loginToast');
            if (toast) {
                toast.textContent = msg;
                toast.classList.remove('hidden');
                setTimeout(() => toast.classList.add('hidden'), 3500);
            }
        }

        // Init on load
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof clearDescanAuth === 'function') clearDescanAuth();
            try {
                localStorage.removeItem('descan_auth_session');
                sessionStorage.removeItem('descan_auth_session');
            } catch(e) {}

            const params = new URLSearchParams(window.location.search);
            const desaParam = (params.get('desa') || 'kalukaluku').toLowerCase();
            selectLoginDesa(desaParam);

            // Pastikan password selalu kosong saat halaman dimuat
            const passInp = document.getElementById('inpPassword');
            if (passInp) passInp.value = '';
        });
    </script>
</body>
</html>