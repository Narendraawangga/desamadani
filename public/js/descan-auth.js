/**
 * SISTEM AUTENTIKASI AKUN RESMI 6 DESA BINAAN DESCAN KECAMATAN KODEOHA
 * BPS Kabupaten Kolaka Utara - Program Desa Cantik (Cinta Statistik)
 * Data Wilayah & Monografi Terintegrasi Podes 2025 BPS Kab. Kolaka Utara
 */

const DESCAN_ACCOUNTS = {
    kalukaluku: {
        desaKey: 'kalukaluku',
        desaName: 'Desa Kalu Kaluku',
        rep: 'Pemerintah Desa Kalu Kaluku',
        role: 'Admin Resmi Desa Cantik (Pilot Utama)',
        period: 'Binaan BPS Kab. Kolaka Utara 2026',
        email: 'admin.kalukaluku@descan.bps.go.id',
        password: 'Kalukaluku2026!',
        kecamatan: 'Kec. Kodeoha • Kab. Kolaka Utara',
        kabupaten: 'Kabupaten Kolaka Utara',
        description: 'Pilot Utama Desa Cantik • Terdekat Kantor BPS Kolaka Utara di Lasusua • Sentra Kakao Rakyat & Perikanan Pesisir',
        kategori: 'Mandiri (Nilai 85%)',
        penduduk: '4.150',
        kk: '1.120',
        kemiskinan: '3,2%',
        stunting: '3 Balita',
        lat: -3.420,
        lng: 121.005,
        avatar: 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=600&q=80'
    },
    awo: {
        desaKey: 'awo',
        desaName: 'Desa Awo',
        rep: 'Pemerintah Desa Awo',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kab. Kolaka Utara 2026',
        email: 'admin.awo@descan.bps.go.id',
        password: 'Awo2026!',
        kecamatan: 'Kec. Kodeoha • Kab. Kolaka Utara',
        kabupaten: 'Kabupaten Kolaka Utara',
        description: 'Sentra Gula Merah Aren & Minyak Nilam • 38 IKM & 5 BUMDes Teraktif',
        kategori: 'Maju (Nilai 82%)',
        penduduk: '3.250',
        kk: '890',
        kemiskinan: '3,8%',
        stunting: '4 Balita',
        lat: -3.425,
        lng: 121.012,
        avatar: 'https://images.unsplash.com/photo-1518173946687-a4c8a383392e?auto=format&fit=crop&w=600&q=80'
    },
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
        description: 'Pesisir Bahari & Pengolahan Ikan Teri Tradisional • 394 KK PLN & 14 IKM',
        kategori: 'Maju (Nilai 80%)',
        penduduk: '3.940',
        kk: '1.050',
        kemiskinan: '4,1%',
        stunting: '5 Balita',
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
        description: 'Perkebunan Kakao Sambung Pucuk & Budidaya Rumput Laut • 335 KK & 16 IKM',
        kategori: 'Berkembang (Nilai 78%)',
        penduduk: '3.350',
        kk: '910',
        kemiskinan: '4,5%',
        stunting: '4 Balita',
        lat: -3.418,
        lng: 121.002,
        avatar: 'https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?auto=format&fit=crop&w=600&q=80'
    },
    lametuna: {
        desaKey: 'lametuna',
        desaName: 'Desa Lametuna',
        rep: 'Pemerintah Desa Lametuna',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kab. Kolaka Utara 2026',
        email: 'admin.lametuna@descan.bps.go.id',
        password: 'Lametuna2026!',
        kecamatan: 'Kec. Kodeoha • Kab. Kolaka Utara',
        kabupaten: 'Kabupaten Kolaka Utara',
        description: 'Pertanian Terpadu & Hortikultura Kakao Perkebunan • 221 KK & 3 BUMDes',
        kategori: 'Berkembang (Nilai 76%)',
        penduduk: '2.210',
        kk: '620',
        kemiskinan: '3,9%',
        stunting: '2 Balita',
        lat: -3.432,
        lng: 121.008,
        avatar: 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=600&q=80'
    },
    sawangaoha: {
        desaKey: 'sawangaoha',
        desaName: 'Desa Sawangaoha',
        rep: 'Pemerintah Desa Sawangaoha',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kab. Kolaka Utara 2026',
        email: 'admin.sawangaoha@descan.bps.go.id',
        password: 'Sawangaoha2026!',
        kecamatan: 'Kec. Kodeoha • Kab. Kolaka Utara',
        kabupaten: 'Kabupaten Kolaka Utara',
        description: 'Agroindustri Perkebunan & Kerajinan Kayu Lokal • 257 KK & 25 IKM',
        kategori: 'Maju (Nilai 81%)',
        penduduk: '2.570',
        kk: '730',
        kemiskinan: '3,6%',
        stunting: '3 Balita',
        lat: -3.409,
        lng: 121.006,
        avatar: 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=600&q=80'
    }
};

// Aliases for compatibility with legacy queries
DESCAN_ACCOUNTS.cijati = DESCAN_ACCOUNTS.kalukaluku;
DESCAN_ACCOUNTS.sukamaju = DESCAN_ACCOUNTS.awo;
DESCAN_ACCOUNTS.mekarwangi = DESCAN_ACCOUNTS.kamisi;
DESCAN_ACCOUNTS.tegalasri = DESCAN_ACCOUNTS.koroha;
DESCAN_ACCOUNTS.harapan = DESCAN_ACCOUNTS.lametuna;
DESCAN_ACCOUNTS.lestari = DESCAN_ACCOUNTS.sawangaoha;

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
