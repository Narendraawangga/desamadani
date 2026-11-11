import fs from 'fs';

// Full Podes 2025 Data extracted from User Excel
const podesDataJson = {
    sheets: [
        { id: "sheet-ekonomi", title: "SARANA EKONOMI DAN INDUSTRI", icon: "ekonomi", totalTables: 7, status: "Aman • Lengkap", badge: "PODES 2025" },
        { id: "sheet-perumahan", title: "PERUMAHAN DAN LINGKUNGAN", icon: "perumahan", totalTables: 6, status: "Aman • Lengkap", badge: "PODES 2025" },
        { id: "sheet-pendidikan-kes", title: "PENDIDIKAN DAN KESEHATAN", icon: "pendidikan", totalTables: 8, status: "Aman • Lengkap", badge: "PODES 2025" },
        { id: "sheet-keuangan", title: "KEUANGAN DAN ASET DESA 2025", icon: "keuangan", totalTables: 5, status: "Aman • Lengkap", badge: "PODES 2025" },
        { id: "sheet-umum", title: "KETERANGAN UMUM DESA", icon: "umum", totalTables: 4, status: "Aman • Lengkap", badge: "PODES 2025" },
        { id: "sheet-pemerintah", title: "KETERANGAN PEMERINTAH DESA/KELURAHAN 2025", icon: "pemerintah", totalTables: 5, status: "Aman • Lengkap", badge: "PODES 2025" },
        { id: "sheet-infra-pendidikan", title: "INFRASTRUKTUR PENDIDIKAN", icon: "infra-pend", totalTables: 6, status: "Aman • Lengkap", badge: "PODES 2025" },
        { id: "sheet-infra-kesehatan", title: "INFRASTRUKTUR KESEHATAN", icon: "infra-kes", totalTables: 6, status: "Aman • Lengkap", badge: "PODES 2025" },
        { id: "sheet-infra-ekonomi", title: "INFRASTRUKTUR EKONOMI", icon: "infra-eko", totalTables: 5, status: "Aman • Lengkap", badge: "PODES 2025" },
        { id: "sheet-bencana", title: "BENCANA ALAM DAN GANGGUAN KEAMANAN", icon: "bencana", totalTables: 7, status: "Aman • Lengkap", badge: "PODES 2025" },
        { id: "sheet-angkutan", title: "ANGKUTAN, KOMUNIKASI, DAN INFORMASI", icon: "angkutan", totalTables: 6, status: "Aman • Lengkap", badge: "PODES 2025" }
    ],
    // 15 Kecamatan exact summaries from Tabel 5.1 to 5.7
    kecamatan: [
        { nama: "Ranteangin", minimarket: 1, resto: 0, hotel: 0, penginapan: 0, pertokoan: 0, pasarPerm: 2, pasarSemi: 0, pasarTanpa: 0, bank: 2, ksp: 1, kur: 7, imk: 39, prodUnggulan: 0 },
        { nama: "Lambai", minimarket: 1, resto: 0, hotel: 0, penginapan: 1, pertokoan: 0, pasarPerm: 1, pasarSemi: 0, pasarTanpa: 0, bank: 0, ksp: 0, kur: 5, imk: 107, prodUnggulan: 2 },
        { nama: "Wawo", minimarket: 0, resto: 0, hotel: 0, penginapan: 0, pertokoan: 0, pasarPerm: 0, pasarSemi: 2, pasarTanpa: 0, bank: 0, ksp: 2, kur: 7, imk: 25, prodUnggulan: 1 },
        { nama: "Lasusua", minimarket: 10, resto: 15, hotel: 5, penginapan: 14, pertokoan: 2, pasarPerm: 1, pasarSemi: 0, pasarTanpa: 0, bank: 5, ksp: 7, kur: 12, imk: 237, prodUnggulan: 0 },
        { nama: "Katoi", minimarket: 1, resto: 1, hotel: 0, penginapan: 1, pertokoan: 0, pasarPerm: 0, pasarSemi: 1, pasarTanpa: 0, bank: 0, ksp: 0, kur: 6, imk: 71, prodUnggulan: 4 },
        { nama: "Kodeoha", minimarket: 1, resto: 0, hotel: 1, penginapan: 0, pertokoan: 0, pasarPerm: 0, pasarSemi: 4, pasarTanpa: 0, bank: 0, ksp: 0, kur: 12, imk: 234, prodUnggulan: 7 },
        { nama: "Tiwu", minimarket: 1, resto: 0, hotel: 0, penginapan: 0, pertokoan: 0, pasarPerm: 0, pasarSemi: 1, pasarTanpa: 0, bank: 0, ksp: 0, kur: 7, imk: 194, prodUnggulan: 2 },
        { nama: "Ngapa", minimarket: 4, resto: 0, hotel: 0, penginapan: 3, pertokoan: 1, pasarPerm: 2, pasarSemi: 2, pasarTanpa: 0, bank: 3, ksp: 1, kur: 12, imk: 502, prodUnggulan: 3 },
        { nama: "Watunohu", minimarket: 0, resto: 0, hotel: 0, penginapan: 0, pertokoan: 0, pasarPerm: 0, pasarSemi: 0, pasarTanpa: 0, bank: 0, ksp: 0, kur: 8, imk: 64, prodUnggulan: 0 },
        { nama: "Pakue", minimarket: 1, resto: 0, hotel: 0, penginapan: 1, pertokoan: 0, pasarPerm: 0, pasarSemi: 2, pasarTanpa: 0, bank: 0, ksp: 0, kur: 11, imk: 86, prodUnggulan: 1 },
        { nama: "Pakue Utara", minimarket: 1, resto: 0, hotel: 0, penginapan: 1, pertokoan: 1, pasarPerm: 0, pasarSemi: 1, pasarTanpa: 0, bank: 0, ksp: 0, kur: 9, imk: 257, prodUnggulan: 5 },
        { nama: "Pakue Tengah", minimarket: 1, resto: 0, hotel: 0, penginapan: 0, pertokoan: 0, pasarPerm: 0, pasarSemi: 2, pasarTanpa: 0, bank: 1, ksp: 1, kur: 8, imk: 49, prodUnggulan: 0 },
        { nama: "Batu Putih", minimarket: 3, resto: 0, hotel: 1, penginapan: 7, pertokoan: 0, pasarPerm: 0, pasarSemi: 1, pasarTanpa: 1, bank: 1, ksp: 2, kur: 9, imk: 226, prodUnggulan: 3 },
        { nama: "Porehu", minimarket: 0, resto: 0, hotel: 0, penginapan: 0, pertokoan: 0, pasarPerm: 0, pasarSemi: 1, pasarTanpa: 0, bank: 0, ksp: 0, kur: 8, imk: 1440, prodUnggulan: 0 },
        { nama: "Tolala", minimarket: 1, resto: 0, hotel: 0, penginapan: 4, pertokoan: 0, pasarPerm: 0, pasarSemi: 1, pasarTanpa: 0, bank: 0, ksp: 0, kur: 5, imk: 91, prodUnggulan: 0 }
    ],
    total: {
        imk: 3622,
        minimarket: 26,
        restoran: 16,
        hotel: 7,
        penginapan: 32,
        pertokoan: 4,
        pasarPermanen: 6,
        pasarSemiPermanen: 18,
        pasarTanpaBangunan: 1,
        bankPemerintah: 12,
        bankSwasta: 0,
        bpr: 1,
        ksp: 14,
        koperasiLain: 1,
        desaKur: 126,
        desaKuk: 8,
        desaProdukUnggulan: 28
    }
};

console.log('Podes data structure ready. Total IMK:', podesDataJson.total.imk);

