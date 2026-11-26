/**
 * SISTEM AUTENTIKASI & REPOSITORI RESMI DESA CANTIK (DESCAN)
 * BPS Kabupaten Kolaka Utara - Pembinaan 6 Desa Binaan 2026
 * Pemisahan Peran: 1) Admin BPS, 2) Admin Operator Desa, 3) Publik
 */

const DESCAN_ACCOUNTS = {
    // === 0. ADMIN BPS KABUPATEN KOLAKA UTARA ===
    bps: {
        desaKey: 'bps',
        desaName: 'BPS Kabupaten Kolaka Utara',
        rep: 'Tim Pembina Desa Cantik BPS',
        role: 'Admin BPS',
        roleType: 'bps',
        isBps: true,
        period: 'Pembina Utama Desa Cantik 2026',
        email: 'admin.bps@descan.bps.go.id',
        password: 'BpsKolut2026!',
        kecamatan: 'Kabupaten Kolaka Utara',
        kabupaten: 'Kabupaten Kolaka Utara',
        description: 'Pembina Statistik Sektoral, Monitoring 6 Desa Binaan, Pengunggah Materi Pembinaan & Video Edukasi',
        avatar: '/images/logo_bps.png',
        lat: -3.395,
        lng: 120.985
    },

    // === 1. KECAMATAN KODEOHA ===
    kamisi: {
        desaKey: 'kamisi',
        desaName: 'Desa Kamisi',
        rep: 'Pemerintah Desa Kamisi',
        role: 'Admin Operator Desa',
        roleType: 'operator',
        isOperator: true,
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
        role: 'Admin Operator Desa',
        roleType: 'operator',
        isOperator: true,
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
        role: 'Admin Operator Kelurahan',
        roleType: 'operator',
        isOperator: true,
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
        role: 'Admin Operator Desa',
        roleType: 'operator',
        isOperator: true,
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
        role: 'Admin Operator Desa',
        roleType: 'operator',
        isOperator: true,
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
        role: 'Admin Operator Desa',
        roleType: 'operator',
        isOperator: true,
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

// Aliases for compatibility
DESCAN_ACCOUNTS.kalukaluku = DESCAN_ACCOUNTS.kamisi;
DESCAN_ACCOUNTS.awo = DESCAN_ACCOUNTS.koroha;
DESCAN_ACCOUNTS.lametuna = DESCAN_ACCOUNTS.lapolu;
DESCAN_ACCOUNTS.sawangaoha = DESCAN_ACCOUNTS.tanggeawo;
DESCAN_ACCOUNTS.mattirowalie = DESCAN_ACCOUNTS.mattirobulu;
DESCAN_ACCOUNTS['mala-mala'] = DESCAN_ACCOUNTS.malamala;
DESCAN_ACCOUNTS['mattiro-bulu'] = DESCAN_ACCOUNTS.mattirobulu;

// ==============================================================
// REPOSITORI DATA PEMBINAAN & VIDEO BPS (DIUPLOAD OLEH BPS)
// ==============================================================
const DEFAULT_BPS_MATERIALS = [
    {
        id: 'mat-1',
        title: 'Pedoman Teknis Pembinaan Desa MADANI & Desa Cantik 2026',
        author: 'Hanifah (Tim Teknis BPS)',
        kategori: 'Pedoman Resmi',
        fileSize: '4.2 MB',
        date: '15 Feb 2026',
        downloadUrl: '/data/pedoman_desa_madani_2026.pdf',
        description: 'Pedoman lengkap metodologi pendataan statistik mikro, tata kelola Satu Data Indonesia, dan penilaian mandiri LKE desa.'
    },
    {
        id: 'mat-2',
        title: 'Template 1: Profil Wilayah & Demografi Desa Cantik',
        author: 'Robbith & Tim Teknis',
        kategori: 'Template Publikasi',
        fileSize: '1.8 MB',
        date: '18 Feb 2026',
        downloadUrl: '/data/template_profil_desa.docx',
        description: 'Format baku penyusunan buku profil desa berstandar Badan Pusat Statistik.'
    },
    {
        id: 'mat-3',
        title: 'Template 2: Monografi Statistik & Potensi Sektoral Desa',
        author: 'Asma & Aidil',
        kategori: 'Template Publikasi',
        fileSize: '2.5 MB',
        date: '18 Feb 2026',
        downloadUrl: '/data/template_monografi_desa.docx',
        description: 'Format monografi tabel dinamis untuk komoditas perkebunan, perikanan, dan IMK desa.'
    },
    {
        id: 'mat-4',
        title: 'Template 3: Publikasi Tematik (Stunting, Kemiskinan & UMKM)',
        author: 'Rini & Ilham',
        kategori: 'Template Publikasi',
        fileSize: '2.1 MB',
        date: '20 Feb 2026',
        downloadUrl: '/data/template_publikasi_tematik.docx',
        description: 'Template analisis tematik desa untuk mendukung perencanaan RKPDes dan penurunan stunting.'
    },
    {
        id: 'mat-5',
        title: 'Template 4 & 5: Leaflet & Infografis Visual Diseminasi',
        author: 'Tim Diseminasi BPS',
        kategori: 'Template Infografis',
        fileSize: '3.4 MB',
        date: '20 Feb 2026',
        downloadUrl: '/data/template_leaflet_infografis.zip',
        description: 'Panduan desain visual poster infografis ramah masyarakat untuk transparansi APBDes dan statistik desa.'
    }
];

const DEFAULT_BPS_VIDEOS = [
    {
        id: 'vid-1',
        title: 'Mikrolearning 01: Pengantar Desa Cantik & Standar Satu Data Indonesia',
        creator: 'Devira & Hakam (Instruktur BPS)',
        duration: '08:45',
        url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        date: '10 Feb 2026',
        description: 'Pengenalan prinsip Satu Data Indonesia (SDI), struktur metadata statistik, dan kode referensi wilayah.'
    },
    {
        id: 'vid-2',
        title: 'Mikrolearning 02: Praktik Pengolahan Data Excel & Spreadsheet Statistik',
        creator: 'Devira & Hakam (Instruktur BPS)',
        duration: '14:20',
        url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        date: '14 Feb 2026',
        description: 'Teknik validasi baris kolom, formula rekapitulasi, dan pembuatan grafik otomatis dari data PODES.'
    },
    {
        id: 'vid-3',
        title: 'Mikrolearning 03: Tata Cara Pengisian Lembar Kerja Evaluasi (LKE) 44 Indikator',
        creator: 'Seluruh Tim Teknis BPS',
        duration: '12:10',
        url: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        date: '20 Feb 2026',
        description: 'Panduan pengisian bukti dukung LKE per komponen dan verifikasi mandiri sebelum submit akhir.'
    }
];

// ==============================================================
// REPOSITORI OUTPUT PROGRAM 6 DESA BINAAN (DITAMPILKAN KE PUBLIK)
// ==============================================================
const DEFAULT_VILLAGE_OUTPUTS = [
    {
        id: 'out-1',
        desaKey: 'kamisi',
        desaName: 'Desa Kamisi',
        kecamatan: 'Kec. Kodeoha',
        title: 'Monografi Statistik Bahari & Potensi Nelayan Desa Kamisi 2026',
        category: 'Monografi Desa',
        type: 'monografi',
        date: '22 Feb 2026',
        size: '3.8 MB',
        status: 'Terverifikasi BPS',
        downloadUrl: '/data/output/monografi_kamisi_2026.pdf',
        summary: 'Kajian komprehensif 14 IKM pengolahan ikan teri, hasil tangkap nelayan laut, dan demografi 394 KK Desa Kamisi.'
    },
    {
        id: 'out-2',
        desaKey: 'kamisi',
        desaName: 'Desa Kamisi',
        kecamatan: 'Kec. Kodeoha',
        title: 'Infografis Statistik Kependudukan & Kemandirian Pesisir',
        category: 'Leaflet & Infografis',
        type: 'leaflet',
        date: '24 Feb 2026',
        size: '1.9 MB',
        status: 'Terverifikasi BPS',
        downloadUrl: '/data/output/infografis_kamisi_2026.pdf',
        summary: 'Visualisasi sebaran penduduk, tingkat pendidikan, dan mata pencaharian per dusun di Desa Kamisi.'
    },
    {
        id: 'out-3',
        desaKey: 'koroha',
        desaName: 'Desa Koroha',
        kecamatan: 'Kec. Kodeoha',
        title: 'Profil Wilayah & Potensi Kakao Sambung Pucuk Desa Koroha',
        category: 'Profil Desa',
        type: 'profil',
        date: '20 Feb 2026',
        size: '4.1 MB',
        status: 'Terverifikasi BPS',
        downloadUrl: '/data/output/profil_koroha_2026.pdf',
        summary: 'Profil potensi 16 IKM olahan kakao, peta perkebunan perbukitan cengkeh, dan capaian LKE 72%.'
    },
    {
        id: 'out-4',
        desaKey: 'malamala',
        desaName: 'Kelurahan Mala-Mala',
        kecamatan: 'Kec. Kodeoha',
        title: 'Publikasi Statistik Sektoral Fasilitas Pelayanan Kelurahan Mala-Mala',
        category: 'Publikasi Tematik',
        type: 'brs',
        date: '23 Feb 2026',
        size: '2.7 MB',
        status: 'Terverifikasi BPS',
        downloadUrl: '/data/output/sektoral_malamala_2026.pdf',
        summary: 'Data ketersediaan 5 sarana pendidikan, puskesmas rawat inap, dan tata kelola administrasi pusat kecamatan.'
    },
    {
        id: 'out-5',
        desaKey: 'lapolu',
        desaName: 'Desa Lapolu',
        kecamatan: 'Kec. Tiwu',
        title: 'Monografi Klaster 75 IKM & Sentra Perkebunan Cengkeh Lapolu 2026',
        category: 'Monografi Desa',
        type: 'monografi',
        date: '21 Feb 2026',
        size: '4.5 MB',
        status: 'Terverifikasi BPS',
        downloadUrl: '/data/output/monografi_lapolu_2026.pdf',
        summary: 'Dokumentasi detail 75 unit industri kecil menengah, produktivitas cengkeh rakyat, dan capaian LKE 88%.'
    },
    {
        id: 'out-6',
        desaKey: 'tanggeawo',
        desaName: 'Desa Tanggeawo',
        kecamatan: 'Kec. Tiwu',
        title: 'Tabel Rekapitulasi Data PODES & Kesejahteraan Keluarga Tanggeawo',
        category: 'Tabel Sektoral',
        type: 'tabel',
        date: '19 Feb 2026',
        size: '1.6 MB',
        status: 'Terverifikasi BPS',
        downloadUrl: '/data/output/tabel_tanggeawo_2026.xlsx',
        summary: 'Data tabular 141 KK, kepemilikan lahan kakao mandiri, dan integrasi Satu Data Indonesia.'
    },
    {
        id: 'out-7',
        desaKey: 'mattirobulu',
        desaName: 'Desa Mattiro Bulu',
        kecamatan: 'Kec. Tiwu',
        title: 'Publikasi Tematik Komoditas Minyak Nilam & Cengkeh Dataran',
        category: 'Publikasi Tematik',
        type: 'brs',
        date: '22 Feb 2026',
        size: '2.9 MB',
        status: 'Terverifikasi BPS',
        downloadUrl: '/data/output/tematik_mattirobulu_2026.pdf',
        summary: 'Analisis potensi penyulingan minyak nilam, rantai pasok komoditas, dan pemenuhan 44 indikator desa cantik.'
    },
    {
        id: 'out-pending-1',
        desaKey: 'koroha',
        desaName: 'Desa Koroha',
        kecamatan: 'Kec. Kodeoha',
        title: 'Laporan Kajian Rantai Nilai Kakao & Rempah Koroha 2026',
        category: 'Publikasi Tematik',
        type: 'brs',
        date: '25 Feb 2026',
        size: '2.1 MB',
        status: 'Menunggu Verifikasi BPS',
        downloadUrl: '/data/output/draft_kakao_koroha.pdf',
        summary: 'Dokumen usulan baru dari operator Desa Koroha yang sedang dalam proses peninjauan oleh Tim Pembina BPS.'
    },
    {
        id: 'out-rev-1',
        desaKey: 'tanggeawo',
        desaName: 'Desa Tanggeawo',
        kecamatan: 'Kec. Tiwu',
        title: 'Infografis APBDes & Indikator Kemandirian Tanggeawo',
        category: 'Leaflet & Infografis',
        type: 'leaflet',
        date: '24 Feb 2026',
        size: '1.8 MB',
        status: 'Dikembalikan untuk Revisi',
        bpsNotes: 'Format grafik prevalensi stunting belum dilengkapi rincian nama dusun dan belum menyertakan logo BPS sesuai template resmi.',
        downloadUrl: '/data/output/infografis_tanggeawo_draft.pdf',
        summary: 'Dokumen dikembalikan oleh BPS untuk diperbaiki oleh operator desa sebelum dapat dipublikasikan ke masyarakat luas.'
    }
];

// Helper functions for storage & access
function getBpsMaterials() {
    try {
        const stored = localStorage.getItem('descan_bps_materials');
        if (stored) return JSON.parse(stored);
    } catch(e) {}
    return DEFAULT_BPS_MATERIALS;
}

function saveBpsMaterials(materials) {
    try {
        localStorage.setItem('descan_bps_materials', JSON.stringify(materials));
    } catch(e) {}
}

function getBpsVideos() {
    try {
        const stored = localStorage.getItem('descan_bps_videos');
        if (stored) return JSON.parse(stored);
    } catch(e) {}
    return DEFAULT_BPS_VIDEOS;
}

function saveBpsVideos(videos) {
    try {
        localStorage.setItem('descan_bps_videos', JSON.stringify(videos));
    } catch(e) {}
}


// STATUS KONSTANTA VERIFIKASI DESA CANTIK
const DESCAN_STATUS = {
    APPROVED: 'Terverifikasi BPS',
    PENDING: 'Menunggu Verifikasi BPS',
    REVISION: 'Dikembalikan untuk Revisi'
};

function getPublicVillageOutputs() {
    const all = getVillageOutputs();
    return all.filter(item => {
        const s = (item.status || '').toLowerCase();
        return s === 'terverifikasi bps' || s === 'disetujui bps' || s === 'terverifikasi';
    });
}

function approveVillageOutput(outputId, verifierName) {
    const outputs = getVillageOutputs();
    const idx = outputs.findIndex(o => o.id === outputId);
    if (idx === -1) return { success: false, message: 'Dokumen tidak ditemukan.' };
    
    outputs[idx].status = DESCAN_STATUS.APPROVED;
    outputs[idx].verifiedAt = new Date().toISOString();
    outputs[idx].verifiedBy = verifierName || 'Tim Pembina BPS Kolut';
    delete outputs[idx].bpsNotes;
    
    saveVillageOutputs(outputs);
    return { success: true, item: outputs[idx] };
}

function rejectVillageOutput(outputId, revisionNote, verifierName) {
    if (!revisionNote || !revisionNote.trim()) {
        return { success: false, message: 'Catatan alasan revisi wajib diisi oleh BPS.' };
    }
    const outputs = getVillageOutputs();
    const idx = outputs.findIndex(o => o.id === outputId);
    if (idx === -1) return { success: false, message: 'Dokumen tidak ditemukan.' };
    
    outputs[idx].status = DESCAN_STATUS.REVISION;
    outputs[idx].bpsNotes = revisionNote.trim();
    outputs[idx].rejectedAt = new Date().toISOString();
    outputs[idx].verifiedBy = verifierName || 'Tim Pembina BPS Kolut';
    
    saveVillageOutputs(outputs);
    return { success: true, item: outputs[idx] };
}

function submitVillageOutput(outputData) {
    const outputs = getVillageOutputs();
    if (outputData.id) {
        const idx = outputs.findIndex(o => o.id === outputData.id);
        if (idx !== -1) {
            outputs[idx] = {
                ...outputs[idx],
                ...outputData,
                status: DESCAN_STATUS.PENDING,
                submittedAt: new Date().toISOString()
            };
            saveVillageOutputs(outputs);
            return { success: true, item: outputs[idx], isUpdate: true };
        }
    }
    
    const newOutput = {
        ...outputData,
        id: outputData.id || ('out-' + Date.now()),
        status: DESCAN_STATUS.PENDING,
        submittedAt: new Date().toISOString()
    };
    outputs.unshift(newOutput);
    saveVillageOutputs(outputs);
    return { success: true, item: newOutput, isNew: true };
}

function getVillageOutputs() {
    try {
        const stored = localStorage.getItem('descan_village_outputs');
        if (stored) return JSON.parse(stored);
    } catch(e) {}
    return DEFAULT_VILLAGE_OUTPUTS;
}

function saveVillageOutputs(outputs) {
    try {
        localStorage.setItem('descan_village_outputs', JSON.stringify(outputs));
    } catch(e) {}
}

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
            roleType: account.roleType || (account.isBps ? 'bps' : 'operator'),
            isBps: !!account.isBps,
            isOperator: !!account.isOperator,
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
        return { success: false, message: 'Email akun tidak terdaftar dalam sistem Desa Cantik.' };
    }
    
    if (matchedAccount.password !== cleanPass) {
        return { success: false, message: 'Kata sandi salah. Silakan periksa kembali sandi Anda.' };
    }
    
    if (requiredDesaKey && requiredDesaKey !== 'all') {
        const reqKey = requiredDesaKey.toLowerCase();
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

if (typeof window !== 'undefined') {
    window.DESCAN_ACCOUNTS = DESCAN_ACCOUNTS;
    window.DEFAULT_BPS_MATERIALS = DEFAULT_BPS_MATERIALS;
    window.DEFAULT_BPS_VIDEOS = DEFAULT_BPS_VIDEOS;
    window.DEFAULT_VILLAGE_OUTPUTS = DEFAULT_VILLAGE_OUTPUTS;
    window.getBpsMaterials = getBpsMaterials;
    window.saveBpsMaterials = saveBpsMaterials;
    window.getBpsVideos = getBpsVideos;
    window.saveBpsVideos = saveBpsVideos;
    window.getVillageOutputs = getVillageOutputs;
    window.saveVillageOutputs = saveVillageOutputs;
    window.DESCAN_STATUS = DESCAN_STATUS;
    window.getPublicVillageOutputs = getPublicVillageOutputs;
    window.approveVillageOutput = approveVillageOutput;
    window.rejectVillageOutput = rejectVillageOutput;
    window.submitVillageOutput = submitVillageOutput;

    window.getDescanAuth = getDescanAuth;
    window.setDescanAuth = setDescanAuth;
    window.clearDescanAuth = clearDescanAuth;
    window.findAccountByEmail = findAccountByEmail;
    window.validateDescanLogin = validateDescanLogin;
}

// ==============================================================
// AUTO-RESOLVE STATIC HTML VS LARAVEL ROUTES
// ==============================================================
document.addEventListener('DOMContentLoaded', () => {
    if (typeof window !== 'undefined') {
        const isStatic = window.location.protocol === 'file:' || window.location.pathname.endsWith('.html');
        if (isStatic) {
            document.querySelectorAll('a[href]').forEach(a => {
                const href = a.getAttribute('href');
                if (!href) return;
                if (href === '/descan') a.setAttribute('href', 'descan.html');
                else if (href === '/descan/output') a.setAttribute('href', 'descan-output.html');
                else if (href === '/descan/login?role=bps') a.setAttribute('href', 'descan-login.html?role=bps');
                else if (href === '/descan/login?role=operator') a.setAttribute('href', 'descan-login.html?role=operator');
                else if (href === '/descan/bps') a.setAttribute('href', 'descan-bps.html');
                else if (href === '/descan/operator' || href.startsWith('/descan/operator?')) a.setAttribute('href', 'descan-menu.html' + (href.includes('?') ? '?' + href.split('?')[1] : ''));
                else if (href === '/descan/menu' || href.startsWith('/descan/menu?')) a.setAttribute('href', 'descan-menu.html' + (href.includes('?') ? '?' + href.split('?')[1] : ''));
            });
        }
    }
});
