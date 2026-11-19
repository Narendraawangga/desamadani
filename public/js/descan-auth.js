/**
 * SISTEM AUTENTIKASI AKUN RESMI 6 DESA & KELURAHAN BINAAN DESCAN
 * Kecamatan Kodeoha & Kecamatan Tiwu - BPS Kabupaten Kolaka Utara
 * Data Wilayah & Monografi Terintegrasi Podes 2025 BPS Kab. Kolaka Utara (100% Terverifikasi)
 */

const DESCAN_ACCOUNTS = {
    // === 1. KECAMATAN KODEOHA ===
    kamisi: {
        desaKey: 'kamisi',
        desaName: 'Desa Kamisi',
        rep: 'Pemerintah Desa Kamisi',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kab. Kolaka Utara 2026',
        email: 'admin.kamisi@descan.bps.go.id',
        password: 'Kamisi2026!',
        kecamatan: 'Kec. Kodeoha • Kab. Kolaka Utara',
        kabupaten: 'Kabupaten Kolaka Utara',
        description: 'Sentra Perikanan Tangkap Laut, Pengeringan Teri & Kakao • 1.576 Penduduk, 394 KK, 14 IKM',
        kategori: 'Bahari Mandiri (Nilai 98%)',
        penduduk: '1.576',
        kk: '394',
        kemiskinan: '3,1%',
        stunting: '2 Balita',
        lat: -3.415,
        lng: 120.998,
        avatar: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80'
    },
    koroha: {
        desaKey: 'koroha',
        desaName: 'Desa Koroha',
        rep: 'Pemerintah Desa Koroha',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kab. Kolaka Utara 2026',
        email: 'admin.koroha@descan.bps.go.id',
        password: 'Koroha2026!',
        kecamatan: 'Kec. Kodeoha • Kab. Kolaka Utara',
        kabupaten: 'Kabupaten Kolaka Utara',
        description: 'Perkebunan Kakao Sambung Pucuk, Cengkeh Perbukitan & Pesisir • 1.340 Penduduk, 335 KK, 16 IKM',
        kategori: 'Maritim Mandiri (Nilai 72%)',
        penduduk: '1.340',
        kk: '335',
        kemiskinan: '4,2%',
        stunting: '3 Balita',
        lat: -3.418,
        lng: 121.002,
        avatar: 'https://images.unsplash.com/photo-1518173946687-a4c8a383392e?auto=format&fit=crop&w=600&q=80'
    },
    malamala: {
        desaKey: 'malamala',
        desaName: 'Kelurahan Mala-Mala',
        rep: 'Pemerintah Kelurahan Mala-Mala',
        role: 'Admin Resmi Kelurahan Cantik (Pusat Kecamatan)',
        period: 'Binaan BPS Kab. Kolaka Utara 2026',
        email: 'admin.malamala@descan.bps.go.id',
        password: 'Malamala2026!',
        kecamatan: 'Kec. Kodeoha • Kab. Kolaka Utara',
        kabupaten: 'Kabupaten Kolaka Utara',
        description: 'Pusat Pemerintahan Kodeoha, Puskesmas Rawat Inap & 5 Lembaga Pendidikan • 1.272 Penduduk, 318 KK, 2 IKM',
        kategori: 'Perkotaan Mandiri (Nilai 93%)',
        penduduk: '1.272',
        kk: '318',
        kemiskinan: '2,8%',
        stunting: '1 Balita',
        lat: -3.411,
        lng: 121.003,
        avatar: 'https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=600&q=80'
    },

    // === 2. KECAMATAN TIWU ===
    lapolu: {
        desaKey: 'lapolu',
        desaName: 'Desa Lapolu',
        rep: 'Pemerintah Desa Lapolu',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kab. Kolaka Utara 2026',
        email: 'admin.lapolu@descan.bps.go.id',
        password: 'Lapolu2026!',
        kecamatan: 'Kec. Tiwu • Kab. Kolaka Utara',
        kabupaten: 'Kabupaten Kolaka Utara',
        description: 'Sentra Perkebunan Cengkeh & Klaster 75 Industri Kecil Menengah (IKM) • 1.264 Penduduk, 321 KK, 75 IKM',
        kategori: 'Agro Mandiri (Nilai 88%)',
        penduduk: '1.264',
        kk: '321',
        kemiskinan: '3,5%',
        stunting: '2 Balita',
        lat: -3.362,
        lng: 120.978,
        avatar: 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=600&q=80'
    },
    tanggeawo: {
        desaKey: 'tanggeawo',
        desaName: 'Desa Tanggeawo',
        rep: 'Pemerintah Desa Tanggeawo',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kab. Kolaka Utara 2026',
        email: 'admin.tanggeawo@descan.bps.go.id',
        password: 'Tanggeawo2026!',
        kecamatan: 'Kec. Tiwu • Kab. Kolaka Utara',
        kabupaten: 'Kabupaten Kolaka Utara',
        description: 'Kawasan Perkebunan Kakao Mandiri & Usaha Olahan Rakyat • 564 Penduduk, 141 KK, 46 IKM',
        kategori: 'Agrikultur Mandiri (Nilai 84%)',
        penduduk: '564',
        kk: '141',
        kemiskinan: '3,2%',
        stunting: '1 Balita',
        lat: -3.355,
        lng: 120.992,
        avatar: 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=600&q=80'
    },
    mattirobulu: {
        desaKey: 'mattirobulu',
        desaName: 'Desa Mattiro Bulu',
        rep: 'Pemerintah Desa Mattiro Bulu',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kab. Kolaka Utara 2026',
        email: 'admin.mattirobulu@descan.bps.go.id',
        password: 'Mattirobulu2026!',
        kecamatan: 'Kec. Tiwu • Kab. Kolaka Utara',
        kabupaten: 'Kabupaten Kolaka Utara',
        description: 'Sentra Perkebunan Dataran Cengkeh & Minyak Nilam • 856 Penduduk, 324 KK, 20 IKM',
        kategori: 'Terbina Aktif (Nilai 79%)',
        penduduk: '856',
        kk: '324',
        kemiskinan: '4,0%',
        stunting: '2 Balita',
        lat: -3.348,
        lng: 120.985,
        avatar: 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=600&q=80'
    }
};

// Aliases for compatibility with legacy queries and slugs
DESCAN_ACCOUNTS.kalukaluku = DESCAN_ACCOUNTS.kamisi;
DESCAN_ACCOUNTS.awo = DESCAN_ACCOUNTS.koroha;
DESCAN_ACCOUNTS.lametuna = DESCAN_ACCOUNTS.lapolu;
DESCAN_ACCOUNTS.sawangaoha = DESCAN_ACCOUNTS.tanggeawo;
DESCAN_ACCOUNTS.mattirowalie = DESCAN_ACCOUNTS.mattirobulu;
DESCAN_ACCOUNTS['mala-mala'] = DESCAN_ACCOUNTS.malamala;
DESCAN_ACCOUNTS['mattiro-bulu'] = DESCAN_ACCOUNTS.mattirobulu;
DESCAN_ACCOUNTS.cijati = DESCAN_ACCOUNTS.kamisi;
DESCAN_ACCOUNTS.sukamaju = DESCAN_ACCOUNTS.koroha;
DESCAN_ACCOUNTS.mekarwangi = DESCAN_ACCOUNTS.malamala;
DESCAN_ACCOUNTS.tegalasri = DESCAN_ACCOUNTS.lapolu;
DESCAN_ACCOUNTS.harapan = DESCAN_ACCOUNTS.tanggeawo;
DESCAN_ACCOUNTS.lestari = DESCAN_ACCOUNTS.mattirobulu;

function getDescanAuth() {
    try {
        const stored = localStorage.getItem('descan_auth_session') || sessionStorage.getItem('descan_auth_session');
        if (stored) {
            return JSON.parse(stored);
        }
    } catch(e) {}
    return null;
}

function setDescanAuth(account) {
    try {
        const payload = JSON.stringify({
            desaKey: account.desaKey,
            desaName: account.desaName,
            rep: account.rep,
            role: account.role,
            email: account.email,
            avatar: account.avatar,
            kecamatan: account.kecamatan,
            loginTime: new Date().toISOString()
        });
        localStorage.setItem('descan_auth_session', payload);
        sessionStorage.setItem('descan_auth_session', payload);
    } catch(e) {}
}

function clearDescanAuth() {
    try {
        localStorage.removeItem('descan_auth_session');
        sessionStorage.removeItem('descan_auth_session');
    } catch(e) {}
}

if (typeof window !== 'undefined') {
    window.DESCAN_ACCOUNTS = DESCAN_ACCOUNTS;
    window.getDescanAuth = getDescanAuth;
    window.setDescanAuth = setDescanAuth;
    window.clearDescanAuth = clearDescanAuth;
    window.findAccountByEmail = findAccountByEmail;
    window.validateDescanLogin = validateDescanLogin;
}

function findAccountByEmail(email) {
    if (!email) return null;
    const cleanEmail = email.trim().toLowerCase();
    for (const key in DESCAN_ACCOUNTS) {
        if (DESCAN_ACCOUNTS[key].email.toLowerCase() === cleanEmail) {
            return DESCAN_ACCOUNTS[key];
        }
    }
    return null;
}

function validateDescanLogin(email, password, requiredDesaKey) {
    if (!email || !password) {
        return { success: false, message: 'Harap masukkan email dan kata sandi.' };
    }
    const cleanEmail = email.trim().toLowerCase();
    const cleanPass = password.trim();
    
    let matchedAccount = null;
    for (const key in DESCAN_ACCOUNTS) {
        const acc = DESCAN_ACCOUNTS[key];
        if (acc.email.toLowerCase() === cleanEmail) {
            matchedAccount = acc;
            break;
        }
    }
    
    if (!matchedAccount) {
        return { success: false, message: 'Email akun desa tidak terdaftar dalam sistem Desa Cantik.' };
    }
    
    if (matchedAccount.password !== cleanPass) {
        return { success: false, message: 'Kata sandi salah. Silakan periksa kembali sandi Anda.' };
    }
    
    if (requiredDesaKey) {
        const reqKey = requiredDesaKey.toLowerCase();
        // check direct match or alias
        if (matchedAccount.desaKey !== reqKey && (DESCAN_ACCOUNTS[reqKey]?.desaKey !== matchedAccount.desaKey)) {
            return { 
                success: false, 
                mismatch: true,
                message: `Akun ini terdaftar sebagai ${matchedAccount.desaName}. Anda sedang membuka ${DESCAN_ACCOUNTS[reqKey]?.desaName || requiredDesaKey}.`,
                account: matchedAccount
            };
        }
    }
    
    setDescanAuth(matchedAccount);
    return { success: true, account: matchedAccount };
}
