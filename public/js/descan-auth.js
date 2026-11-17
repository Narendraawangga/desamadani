/**
 * SISTEM AUTENTIKASI AKUN RESMI 6 DESA BINAAN DESCAN
 * BPS Kabupaten Kolaka Utara - Program Desa Cantik
 */

const DESCAN_ACCOUNTS = {
    cijati: {
        desaKey: 'cijati',
        desaName: 'Desa Cijati',
        rep: 'Pemerintah Desa Cijati',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kolaka Utara',
        email: 'admin.cijati@descan.bps.go.id',
        password: 'Cijati2026!',
        kecamatan: 'Kec. Pangalengan • Jawa Barat',
        avatar: 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=600&q=80'
    },
    sukamaju: {
        desaKey: 'sukamaju',
        desaName: 'Desa Sukamaju',
        rep: 'Pemerintah Desa Sukamaju',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kolaka Utara',
        email: 'admin.sukamaju@descan.bps.go.id',
        password: 'Sukamaju2026!',
        kecamatan: 'Kec. Ranteangin • Kab. Kolaka Utara',
        avatar: 'https://images.unsplash.com/photo-1518173946687-a4c8a383392e?auto=format&fit=crop&w=600&q=80'
    },
    mekarwangi: {
        desaKey: 'mekarwangi',
        desaName: 'Desa Mekarwangi',
        rep: 'Pemerintah Desa Mekarwangi',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kolaka Utara',
        email: 'admin.mekarwangi@descan.bps.go.id',
        password: 'Mekarwangi2026!',
        kecamatan: 'Kec. Lambai • Kab. Kolaka Utara',
        avatar: 'https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?auto=format&fit=crop&w=600&q=80'
    },
    tegalasri: {
        desaKey: 'tegalasri',
        desaName: 'Desa Tegalasri',
        rep: 'Pemerintah Desa Tegalasri',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kolaka Utara',
        email: 'admin.tegalasri@descan.bps.go.id',
        password: 'Tegalasri2026!',
        kecamatan: 'Kec. Watunohu • Kab. Kolaka Utara',
        avatar: 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=600&q=80'
    },
    harapan: {
        desaKey: 'harapan',
        desaName: 'Desa Harapan',
        rep: 'Pemerintah Desa Harapan',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kolaka Utara',
        email: 'admin.harapan@descan.bps.go.id',
        password: 'Harapan2026!',
        kecamatan: 'Kec. Lasusua • Kab. Kolaka Utara',
        avatar: 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=600&q=80'
    },
    lestari: {
        desaKey: 'lestari',
        desaName: 'Desa Lestari',
        rep: 'Pemerintah Desa Lestari',
        role: 'Admin Resmi Desa Cantik',
        period: 'Binaan BPS Kolaka Utara',
        email: 'admin.lestari@descan.bps.go.id',
        password: 'Lestari2026!',
        kecamatan: 'Kec. Katoi • Kab. Kolaka Utara',
        avatar: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80'
    }
};

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
    
    if (requiredDesaKey && matchedAccount.desaKey !== requiredDesaKey) {
        return { 
            success: false, 
            mismatch: true,
            message: `Akun ini terdaftar sebagai ${matchedAccount.desaName}. Anda sedang membuka ${DESCAN_ACCOUNTS[requiredDesaKey]?.desaName || requiredDesaKey}.`,
            account: matchedAccount
        };
    }
    
    setDescanAuth(matchedAccount);
    return { success: true, account: matchedAccount };
}
