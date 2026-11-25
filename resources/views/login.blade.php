<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Administrator - Desa Madani BPS & Pemkab Kolaka Utara</title>
    
    <!-- Google Fonts: Plus Jakarta Sans, Cinzel & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
    
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
                        cinzel: ['"Cinzel"', 'serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        madani: {
                            charcoal: '#1D241E',
                            mountain: '#3B4D3B',
                            olive: '#566B53',
                            mist: '#8A9B86',
                            border: '#DCE3DD',
                        },
                        bps: {
                            blue: '#005ea6',
                            navy: '#0b2545',
                            darknavy: '#06182e',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 15% 15%, #06182e 0%, #0b2545 45%, #042017 100%);
            min-height: 100vh;
        }
        .font-cinzel {
            font-family: 'Cinzel', serif !important;
            letter-spacing: 0.05em;
        }
    </style>
</head>
<body class="text-slate-800 flex flex-col justify-between p-4 sm:p-6 lg:p-8 min-h-screen selection:bg-emerald-200 selection:text-emerald-950">

    <!-- Ambient Glowing Blur Orbs -->
    <div class="pointer-events-none fixed -top-24 -left-24 w-96 h-96 bg-emerald-500/15 rounded-full blur-3xl"></div>
    <div class="pointer-events-none fixed -bottom-24 -right-24 w-96 h-96 bg-blue-500/15 rounded-full blur-3xl"></div>
    <div class="pointer-events-none fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-emerald-600/5 rounded-full blur-3xl"></div>

    <!-- TOP HEADER BAR -->
    <header class="relative z-10 w-full max-w-4xl mx-auto flex items-center justify-between pb-4 sm:pb-6">
        <!-- Brand Identitas Resmi Desa Madani (Kolut & BPS) -->
        <a href="/portal" class="flex items-center gap-3 group text-left cursor-pointer focus:outline-none transition-transform hover:scale-[1.01] active:scale-[0.99]" title="Kembali ke Portal Desa Madani">
            <div class="flex items-center gap-2 bg-white/10 backdrop-blur-md px-3 py-1.5 rounded-2xl border border-white/20 shadow-lg group-hover:scale-105 transition">
                <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" class="h-8 w-auto object-contain drop-shadow" title="Pemerintah Kabupaten Kolaka Utara">
                <div class="h-5 w-[1px] bg-white/30"></div>
                <img src="/images/logo_bps.png" alt="BPS Kolut" class="h-7 w-auto object-contain drop-shadow" title="Badan Pusat Statistik Kolaka Utara">
            </div>
            <div>
                <div class="text-lg sm:text-xl font-bold text-white leading-none whitespace-nowrap font-cinzel">
                    DESA <span class="text-emerald-400">MADANI</span>
                    <span class="hidden sm:inline font-sans text-[10px] font-semibold text-emerald-200 ml-2 pl-2 border-l border-white/20 tracking-[0.2em] uppercase">Kolaka Utara</span>
                </div>
                <div class="text-[9px] text-slate-300 font-medium tracking-wider mt-1 hidden sm:block">
                    Sistem Manajemen & Analitik Data Desa
                </div>
            </div>
        </a>

        <!-- Tombol Kembali ke Portal -->
        <div class="flex items-center gap-2">
            <a href="/portal" class="px-3.5 sm:px-4 py-2 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-xs backdrop-blur-md transition flex items-center gap-2 shadow-sm hover:shadow-md">
                <i class="bi bi-arrow-left text-emerald-400"></i>
                <span class="hidden sm:inline">Kembali ke Portal</span>
                <span class="sm:hidden">Portal</span>
            </a>
        </div>
    </header>

    <!-- MAIN LOGIN CARD -->
    <main class="relative z-10 w-full max-w-md mx-auto my-auto py-2 sm:py-4">
        <div class="bg-white rounded-3xl shadow-2xl border border-white/30 overflow-hidden transform transition-all duration-300">
            
            <!-- Top Gradient Header with Emblem -->
            <div class="relative bg-gradient-to-br from-[#064e3b] via-[#047857] to-[#0b2545] p-6 sm:p-7 text-white text-center overflow-hidden">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-emerald-400/25 rounded-full blur-2xl pointer-events-none"></div>
                <div class="absolute -bottom-10 -left-10 w-28 h-28 bg-amber-400/15 rounded-full blur-2xl pointer-events-none"></div>

                <!-- Emblem Desa Madani -->
                <div class="w-14 h-14 mx-auto mb-3 relative flex items-center justify-center bg-white/15 backdrop-blur-md rounded-2xl border border-white/25 shadow-inner">
                    <svg class="w-9 h-9 drop-shadow-sm" viewBox="0 0 100 100" fill="none">
                        <path d="M16 22 C16 16 18 14 24 14 H52 C55 14 56 16 56 20 V46 C56 50 54 52 50 52 H32 C23 52 16 45 16 36 Z" fill="#34d399"/>
                        <path d="M48 48 C48 44 50 42 54 42 H72 C80 42 86 48 86 56 V78 C86 82 84 84 80 84 H48 C44 84 42 82 42 78 V54 C42 50 44 48 48 48 Z" fill="#93c5fd"/>
                        <circle cx="50" cy="50" r="7" fill="#fbbf24"/>
                        <circle cx="50" cy="50" r="3" fill="#ffffff"/>
                    </svg>
                </div>

                <h1 class="text-xl sm:text-2xl font-black tracking-tight text-white font-cinzel">
                    DESA <span class="text-emerald-300">MADANI</span>
                </h1>
                <p class="text-xs text-emerald-100/90 font-medium mt-1">
                    Portal Eksekutif Admin • BPS & Pemkab Kolaka Utara
                </p>
                
                <div class="inline-flex items-center gap-1.5 mt-3 px-3 py-1 rounded-full bg-white/15 text-emerald-100 border border-white/20 text-[11px] font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Masuk Administrator &amp; Operator</span>
                </div>
            </div>

            <!-- Form Area -->
            <div class="p-6 sm:p-7">
                
                <!-- Alert Box -->
                <div id="loginAlertBox" class="{{ $errors->any() ? '' : 'hidden' }} mb-4 p-3.5 rounded-2xl text-xs font-semibold {{ $errors->any() ? 'bg-rose-50 border border-rose-200 text-rose-800' : '' }}">
                    @if ($errors->any())
                        <div class="flex items-center gap-2">
                            <i class="bi bi-exclamation-triangle-fill text-rose-600 text-sm"></i>
                            <span>{{ $errors->first('login') ?: 'Email atau kata sandi tidak valid.' }}</span>
                        </div>
                    @endif
                </div>

                <form id="formAdminLogin" method="POST" action="{{ route('login.post') }}" onsubmit="handleAdminLoginSubmit(event)" class="space-y-4">
                    @csrf
                    
                    <!-- Email / Username -->
                    <div>
                        <label for="inpLogin" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                            <i class="bi bi-person-fill text-emerald-600"></i>
                            <span>Email / Username</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 text-sm">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="text" 
                                   name="login" 
                                   id="inpLogin" 
                                   value="{{ old('login', 'admin@bps.go.id') }}"
                                   class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition" 
                                   placeholder="Contoh: admin@bps.go.id" 
                                   required 
                                   autocomplete="username">
                        </div>
                    </div>

                    <!-- Kata Sandi -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="inpPassword" class="block text-xs font-bold text-slate-700 uppercase tracking-wider flex items-center gap-1.5">
                                <i class="bi bi-lock-fill text-emerald-600"></i>
                                <span>Kata Sandi</span>
                            </label>
                            <span class="text-[11px] text-slate-400 hover:text-emerald-700 cursor-pointer transition font-medium" onclick="alert('Silakan hubungi BPS Kabupaten Kolaka Utara untuk bantuan pemulihan akses akun administrator.')">Lupa sandi?</span>
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 text-sm">
                                <i class="bi bi-shield-lock"></i>
                            </span>
                            <input type="password" 
                                   name="password" 
                                   id="inpPassword" 
                                   value="bps7408"
                                   class="w-full pl-10 pr-11 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition font-mono" 
                                   placeholder="Masukkan kata sandi" 
                                   required 
                                   autocomplete="current-password">
                            <button type="button" 
                                    onclick="toggleAdminPassword()" 
                                    id="btnToggleEye"
                                    class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 text-sm cursor-pointer" 
                                    title="Tampilkan/Sembunyikan Sandi">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center gap-2 text-xs font-medium text-slate-600 cursor-pointer select-none">
                            <input type="checkbox" name="remember" value="1" checked class="w-4 h-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 cursor-pointer">
                            <span>Ingat sesi masuk</span>
                        </label>
                        <span class="text-[11px] text-slate-400 font-mono">BPS 7408</span>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" 
                            id="btnSubmitLogin"
                            class="w-full py-3 rounded-xl bg-gradient-to-r from-[#047857] to-[#0b2545] hover:from-[#065f46] hover:to-[#081a33] text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2 cursor-pointer transform active:scale-[0.99] mt-2">
                        <span id="btnSubmitText">Masuk ke Dashboard Admin</span>
                        <i id="btnSubmitIcon" class="bi bi-arrow-right text-sm"></i>
                    </button>
                </form>

                <!-- Tombol Bantuan Demo Otomatis -->
                <div class="mt-4 pt-3.5 border-t border-slate-100 flex items-center justify-between gap-2">
                    <button type="button" 
                            onclick="fillAdminCredentials()" 
                            class="flex-1 py-2 px-3 rounded-xl bg-emerald-50 hover:bg-emerald-100/80 border border-emerald-200 text-emerald-800 font-semibold text-xs transition cursor-pointer flex items-center justify-center gap-1.5 shadow-2xs">
                        <i class="bi bi-lightning-charge-fill text-amber-500"></i>
                        <span>Isi Akun Demo Admin</span>
                    </button>
                </div>

                <!-- Link Alternatif Login Desa Cantik (DESCAN) -->
                <div class="mt-4 text-center">
                    <a href="/descan/login" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-emerald-700 transition">
                        <span>Bukan Admin? Masuk Akun Desa Binaan (DESCAN)</span>
                        <i class="bi bi-chevron-right text-[10px]"></i>
                    </a>
                </div>

            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="relative z-10 w-full max-w-4xl mx-auto text-center text-xs text-slate-400/90 pt-4">
        © 2024–2026 Badan Pusat Statistik Kabupaten Kolaka Utara &amp; Pemerintah Kabupaten Kolaka Utara
    </footer>

    <!-- JS LOGIC -->
    <script>
        function toggleAdminPassword() {
            const passInput = document.getElementById('inpPassword');
            const eyeIcon = document.getElementById('btnToggleEye')?.querySelector('i');
            if (!passInput) return;
            if (passInput.type === 'password') {
                passInput.type = 'text';
                if (eyeIcon) eyeIcon.className = 'bi bi-eye-slash text-emerald-600';
            } else {
                passInput.type = 'password';
                if (eyeIcon) eyeIcon.className = 'bi bi-eye text-slate-400';
            }
        }

        function fillAdminCredentials() {
            const loginInp = document.getElementById('inpLogin');
            const passInp = document.getElementById('inpPassword');
            if (loginInp) loginInp.value = 'admin@bps.go.id';
            if (passInp) passInp.value = 'bps7408';
        }

        async function handleAdminLoginSubmit(e) {
            e.preventDefault();
            const form = document.getElementById('formAdminLogin');
            const alertBox = document.getElementById('loginAlertBox');
            const submitBtn = document.getElementById('btnSubmitLogin');
            const btnText = document.getElementById('btnSubmitText');
            const btnIcon = document.getElementById('btnSubmitIcon');

            const login = document.getElementById('inpLogin').value.trim();
            const password = document.getElementById('inpPassword').value;
            const csrfToken = form.querySelector('input[name="_token"]')?.value || '';

            if (alertBox) {
                alertBox.classList.add('hidden');
                alertBox.className = 'mb-4 p-3.5 rounded-2xl text-xs font-semibold';
                alertBox.innerHTML = '';
            }

            if (submitBtn) submitBtn.disabled = true;
            if (btnText) btnText.textContent = 'Memverifikasi...';
            if (btnIcon) btnIcon.className = 'bi bi-arrow-repeat animate-spin text-sm';

            try {
                const response = await fetch("{{ route('login.post') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ login, password })
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    if (alertBox) {
                        alertBox.classList.remove('hidden');
                        alertBox.classList.add('bg-emerald-50', 'text-emerald-800', 'border', 'border-emerald-200');
                        alertBox.innerHTML = `<div class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-emerald-600 text-sm"></i><span>${data.message || 'Login berhasil! Mengalihkan ke Dashboard...'}</span></div>`;
                    }
                    setTimeout(() => {
                        window.location.href = data.redirect || '/admin';
                    }, 500);
                } else {
                    if (submitBtn) submitBtn.disabled = false;
                    if (btnText) btnText.textContent = 'Masuk ke Dashboard Admin';
                    if (btnIcon) btnIcon.className = 'bi bi-arrow-right text-sm';

                    if (alertBox) {
                        alertBox.classList.remove('hidden');
                        alertBox.classList.add('bg-rose-50', 'text-rose-800', 'border', 'border-rose-200');
                        alertBox.innerHTML = `<div class="flex items-center gap-2"><i class="bi bi-exclamation-triangle-fill text-rose-600 text-sm"></i><span>${data.message || 'Email/username atau kata sandi yang Anda masukkan salah.'}</span></div>`;
                    }
                }
            } catch (err) {
                // If fetch fails, fallback to native POST
                form.submit();
            }
        }
    </script>
</body>
</html>
