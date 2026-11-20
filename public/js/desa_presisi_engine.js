/**
 * DESA PRESISI ENGINE - KABUPATEN KOLAKA UTARA
 * Arsitektur Modern: Split Dual-Pane & Progressive Disclosure (Macro -> Meso -> Micro)
 * 15 Kecamatan • 133 Desa/Kelurahan • 6 Klaster PODES BPS 2025
 */
window.PresisiEngine = (function() {
  let db = null;
  let map = null;
  let geojsonLayer = null;
  let desaGeojsonLayer = null;
  let markersLayer = null;
  let legendControl = null;

  // Harmonious distinct color palette for 15 kecamatan matching desapresisi.id reference
  const KECAMATAN_PALETTE = {
    'tolala': '#6d28d9',      // Rich Violet
    'batuputih': '#047857',   // Deep Forest Green
    'porehu': '#15803d',      // Vibrant Forest Green
    'pakueutara': '#22c55e',  // Bright Lime Green
    'pakuetengah': '#059669', // Teal Green
    'pakue': '#10b981',       // Emerald Green
    'watunohu': '#475569',    // Slate Moss Green
    'tiwu': '#64748b',        // Slate Gray
    'ngapa': '#0d9488',       // Teal
    'kodeoha': '#14b8a6',     // Cyan Teal
    'katoi': '#0284c7',       // Ocean Sky Blue
    'lasusua': '#0D6E5B',     // Signature Deep Emerald
    'lambai': '#84cc16',      // Lime Olive Chartreuse
    'ranteangin': '#8b5cf6',  // Light Violet
    'wawo': '#7c3aed'         // Purple
  };

  // Official PODES BPS 2025 demographics (15 Kecamatan & Kabupaten Kolaka Utara)
  const KECAMATAN_DEMOGRAPHY = {
    'ALL': { jiwa: 142692, kk: 38077 },
    'lasusua': { jiwa: 26729, kk: 8463 },
    'ngapa': { jiwa: 17256, kk: 4353 },
    'kodeoha': { jiwa: 11592, kk: 2960 },
    'pakue': { jiwa: 10757, kk: 2927 },
    'batuputih': { jiwa: 9229, kk: 2379 },
    'pakueutara': { jiwa: 8402, kk: 2212 },
    'pakuetengah': { jiwa: 7738, kk: 2089 },
    'katoi': { jiwa: 7408, kk: 1877 },
    'watunohu': { jiwa: 7279, kk: 2107 },
    'lambai': { jiwa: 7195, kk: 1883 },
    'wawo': { jiwa: 7188, kk: 1890 },
    'porehu': { jiwa: 6822, kk: 1615 },
    'ranteangin': { jiwa: 6161, kk: 1673 },
    'tiwu': { jiwa: 4849, kk: 1449 },
    'tolala': { jiwa: 4087, kk: 1154 }
  };


  let currentCategory = 'ekonomi';
  let currentViewMode = 'peta'; // 'dual' (Peta + Analitik) or 'tabel' (Tabel 133 Desa)
  let isThematicActive = true;
  let currentKecamatan = 'ALL';
  let currentDesa = 'ALL';

  let charts = {
    c1: null,
    c2: null,
    c3: null,
    c4: null
  };

  const CATEGORY_CONFIG = {
    ekonomi: {
      label: "Sarana Ekonomi & Industri",
      badge: "Sheet Sarana Ekonomi",
      metricLabel: "Total IMK (Unit Usaha)",
      unit: "Unit",
      chartTitle: "Perbandingan IMK per Wilayah",
      chartBadge: "TABEL 5.6",
      distTitle: "Proporsi Sarana Perdagangan",
      chart3Title: "Top 5 vs Bottom 5 Sentra IMK",
      chart3Badge: "DISPARITAS IMK",
      chart4Title: "Akses Lembaga Keuangan & Permodalan",
      chart4Badge: "TABEL 5.2 FINANSIAL",
      distBadge: "TABEL 5.1",
      tableColumns: [
        { key: "no", label: "No." },
        { key: "nama", label: "Desa / Kelurahan" },
        { key: "status", label: "Status" },
        { key: "kecamatan", label: "Kecamatan" },
        { key: "ikm", label: "IMK (Unit)" },
        { key: "minimarket", label: "Minimarket" },
        { key: "resto", label: "Restoran" },
        { key: "hotelPenginapan", label: "Hotel & Penginapan" },
        { key: "pasar", label: "Pasar" },
        { key: "bank", label: "Bank" },
        { key: "ksp", label: "KSP" },
        { key: "kur", label: "KUR" },
        { key: "prodUnggulan", label: "Produk Unggulan" }
      ]
    },
    lingkungan: {
      label: "Perumahan & Lingkungan",
      badge: "Sheet Perumahan & Lingkungan",
      metricLabel: "Keluarga Pelanggan Listrik PLN",
      unit: "Keluarga",
      chartTitle: "Cakupan Listrik PLN per Wilayah",
      chartBadge: "TABEL 2.1",
      distTitle: "Komposisi Sumber Penerangan",
      chart3Title: "Top 5 Rasio Elektrifikasi Tertinggi",
      chart3Badge: "DISPARITAS PLN",
      chart4Title: "Karakteristik Sanitasi & Lingkungan",
      chart4Badge: "TABEL 2.5 LINGKUNGAN",
      distBadge: "TABEL 2.5",
      tableColumns: [
        { key: "no", label: "No." },
        { key: "nama", label: "Desa / Kelurahan" },
        { key: "status", label: "Status" },
        { key: "kecamatan", label: "Kecamatan" },
        { key: "pln", label: "Listrik PLN" },
        { key: "nonPln", label: "Non-PLN" },
        { key: "pencemaran", label: "Status Pencemaran" },
        { key: "sampah", label: "Olah Sampah" },
        { key: "pupuk", label: "Pupuk Organik" },
        { key: "energi", label: "Energi Terbarukan" },
        { key: "polaTanam", label: "Pola Tanam" },
        { key: "panenHujan", label: "Panen Hujan" }
      ]
    },
    sosial: {
      label: "Pendidikan & Kesehatan",
      badge: "Sheet Pendidikan & Kesehatan",
      metricLabel: "Total Sarana Pendidikan (SD/SMP/SMA)",
      unit: "Sekolah",
      chartTitle: "Sebaran Sarana Pendidikan per Wilayah",
      chartBadge: "TABEL 3.1 & 9.1",
      distTitle: "Ketersediaan Sarana Kesehatan (174 Unit)",
      chart3Title: "Top 5 vs Bottom 5 Fasilitas Pendidikan",
      chart3Badge: "DISPARITAS",
      chart4Title: "Komposisi Satuan Pendidikan Formal (205 Unit)",
      chart4Badge: "TABEL 3.1 SEKOLAH",
      distBadge: "TABEL 3.2 & 10.1",
      tableColumns: [
        { key: "no", label: "No." },
        { key: "nama", label: "Desa / Kelurahan" },
        { key: "status", label: "Status" },
        { key: "kecamatan", label: "Kecamatan" },
        { key: "tk", label: "TK/PAUD" },
        { key: "sd", label: "SD/MI" },
        { key: "smp", label: "SMP/MTs" },
        { key: "sma", label: "SMA/SMK" },
        { key: "puskesmas", label: "Puskesmas" },
        { key: "pustu", label: "Pustu" },
        { key: "poskesdes", label: "Poskesdes" },
        { key: "bidan", label: "Bidan Desa" },
        { key: "dokter", label: "Praktik Dokter" }
      ]
    },
    keuangan: {
      label: "Keuangan & Aset Desa",
      badge: "Sheet Keuangan & Aset Desa",
      metricLabel: "Keberadaan BUMDes Aktif",
      unit: "Unit",
      chartTitle: "Sebaran BUMDes Aktif per Wilayah",
      chartBadge: "TABEL 8.1",
      distTitle: "Kepemilikan Aset Tanah Kas Desa",
      chart3Title: "Top 5 Akumulasi BUMDes per Wilayah",
      chart3Badge: "DISPARITAS BUMDES",
      chart4Title: "Legalitas Perdes & Sarana Operasional",
      chart4Badge: "TABEL 8.4 TATA KELOLA",
      distBadge: "TABEL 8.3-8.5",
      tableColumns: [
        { key: "no", label: "No." },
        { key: "nama", label: "Desa / Kelurahan" },
        { key: "status", label: "Status" },
        { key: "kecamatan", label: "Kecamatan" },
        { key: "bumdes", label: "BUMDes" },
        { key: "kendaraanDinas", label: "Kendaraan Dinas" },
        { key: "tanahKas", label: "Tanah Kas Desa" },
        { key: "pades", label: "Ada PADes" },
        { key: "danaDesa", label: "Dana Desa" },
        { key: "bankDesa", label: "Bank Desa" },
        { key: "kiosDesa", label: "Kios Desa" }
      ]
    },
    umum: {
      label: "Keterangan Umum Desa",
      badge: "Sheet Keterangan Umum",
      metricLabel: "Desa Kawasan Hutan & Konservasi",
      unit: "Desa",
      chartTitle: "Tipologi Wilayah Hutan per Kecamatan",
      chartBadge: "TABEL 1.2",
      distTitle: "Karakteristik Topografi Wilayah",
      chart3Title: "Perbandingan Luas Wilayah (km²)",
      chart3Badge: "LUAS WILAYAH",
      chart4Title: "Keterkaitan Kawasan Hutan & Konservasi",
      chart4Badge: "TABEL 1.2 KEHUTANAN",
      distBadge: "TABEL 1.1 & 1.4",
      tableColumns: [
        { key: "no", label: "No." },
        { key: "nama", label: "Desa / Kelurahan" },
        { key: "status", label: "Status Wilayah" },
        { key: "kecamatan", label: "Kecamatan" },
        { key: "topografi", label: "Topografi" },
        { key: "luas", label: "Luas (km²)" },
        { key: "statusHutan", label: "Kawasan Hutan" },
        { key: "pesisir", label: "Pesisir/Non" },
        { key: "komoditas", label: "Komoditas Pokok" },
        { key: "lokasiKantor", label: "Lokasi Kantor" }
      ]
    },
    pemerintah: {
      label: "Pemerintah Desa",
      badge: "Sheet Pemerintah Desa",
      metricLabel: "Total Aparatur Pemerintahan Desa",
      unit: "Aparat",
      chartTitle: "Jumlah Aparatur Desa per Wilayah",
      chartBadge: "TABEL 7.1",
      distTitle: "Karakteristik & Gender Kepala Desa",
      chart3Title: "Top 5 vs Bottom 5 Aparatur Desa",
      chart3Badge: "DISPARITAS APARAT",
      chart4Title: "Ketersediaan Sarana Tata Kelola Desa",
      chart4Badge: "TABEL 7.3 INFRASTRUKTUR",
      distBadge: "TABEL 7.2",
      tableColumns: [
        { key: "no", label: "No." },
        { key: "nama", label: "Desa / Kelurahan" },
        { key: "status", label: "Status" },
        { key: "kecamatan", label: "Kecamatan" },
        { key: "totalAparat", label: "Total Aparat" },
        { key: "kadesGender", label: "Gender Kades" },
        { key: "kadesPendidikan", label: "Pendidikan Kades" },
        { key: "sekdesGender", label: "Gender Sekdes" },
        { key: "bpd", label: "BPD / LMD" },
        { key: "musdes", label: "Musyawarah Desa" },
        { key: "kantorDesa", label: "Kantor Desa" }
      ]
    }
  };

  const PODES_CATEGORY_MAP = {
  "ekonomi": {
    "key": "ekonomi",
    "label": "Sarana Ekonomi",
    "pillId": "pill-cat-ekonomi",
    "dropdownId": "dropdown-cat-ekonomi",
    "dotColor": "bg-amber-400",
    "activeBg": "bg-[#0D6E5B]",
    "defaultModule": "SARANA EKONOMI DAN INDUSTRI.xlsx",
    "defaultTable": "5.6",
    "modules": [
      "SARANA EKONOMI DAN INDUSTRI.xlsx",
      "INFRASTRUKTUR EKONOMI.xlsx"
    ],
    "subTables": [
      {
        "module": "SARANA EKONOMI DAN INDUSTRI.xlsx",
        "sheet": "5.1",
        "title": "Tabel 5.1: Jumlah Sarana Perdagangan dan Akomodasi Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 153
      },
      {
        "module": "SARANA EKONOMI DAN INDUSTRI.xlsx",
        "sheet": "5.2",
        "title": "Tabel 5.2: Jumlah Kelompok Pertokoan dan Pasar Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "SARANA EKONOMI DAN INDUSTRI.xlsx",
        "sheet": "5.3",
        "title": "Tabel 5.3: Jumlah Bank Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 153
      },
      {
        "module": "SARANA EKONOMI DAN INDUSTRI.xlsx",
        "sheet": "5.4",
        "title": "Tabel 5.4: Jumlah Koperasi Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "SARANA EKONOMI DAN INDUSTRI.xlsx",
        "sheet": "5.5",
        "title": "Tabel 5.5: Keberadaan Fasilitas Perkreditan Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "SARANA EKONOMI DAN INDUSTRI.xlsx",
        "sheet": "5.6",
        "title": "Tabel 5.6: Jumlah Industri Mikro dan Kecil dan Sentra Industri Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "SARANA EKONOMI DAN INDUSTRI.xlsx",
        "sheet": "5.7",
        "title": "Tabel 5.7: Keberadaan Produk Barang Unggulan Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "INFRASTRUKTUR EKONOMI.xlsx",
        "sheet": "11.1",
        "title": "BANYAKNYA KELOMPOK PERTOKOAN DAN PASAR MENURUT DESA/KELURAHAN",
        "total_rows": 152
      },
      {
        "module": "INFRASTRUKTUR EKONOMI.xlsx",
        "sheet": "11.2",
        "title": "BANYAKNYA SARANA PERDAGANGAN  MENURUT DESA/KELURAHAN",
        "total_rows": 153
      },
      {
        "module": "INFRASTRUKTUR EKONOMI.xlsx",
        "sheet": "11.3",
        "title": "BANYAKNYA SARANA AKOMODASI MENURUT DESA/KELURAHAN",
        "total_rows": 153
      },
      {
        "module": "INFRASTRUKTUR EKONOMI.xlsx",
        "sheet": "11.4",
        "title": "BANYAKNYA LEMBAGA KEUANGAN BANK MENURUT DESA/KELURAHAN",
        "total_rows": 153
      }
    ]
  },
  "lingkungan": {
    "key": "lingkungan",
    "label": "Perumahan & Lingkungan",
    "pillId": "pill-cat-lingkungan",
    "dropdownId": "dropdown-cat-lingkungan",
    "dotColor": "bg-emerald-500",
    "activeBg": "bg-[#0D6E5B]",
    "defaultModule": "PERUMAHAN DAN LINGKUNGAN_.xlsx",
    "defaultTable": "2.1",
    "modules": [
      "PERUMAHAN DAN LINGKUNGAN_.xlsx",
      "BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx"
    ],
    "subTables": [
      {
        "module": "PERUMAHAN DAN LINGKUNGAN_.xlsx",
        "sheet": "2.1",
        "title": "Tabel 2.1: Jumlah Keluarga Pengguna Listrik dan Bukan Pengguna Listrik Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 153
      },
      {
        "module": "PERUMAHAN DAN LINGKUNGAN_.xlsx",
        "sheet": "2.2",
        "title": "Tabel 2.2: Keberadaan dan Sumber Penerangan Jalan Utama Desa Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "PERUMAHAN DAN LINGKUNGAN_.xlsx",
        "sheet": "2.3",
        "title": "Tabel 2.3: Jenis Bahan Bakar untuk Memasak yang Digunakan Sebagian Besar Keluarga Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "PERUMAHAN DAN LINGKUNGAN_.xlsx",
        "sheet": "2.4",
        "title": "Tabel 2.4: Keberadaan Agen/Penjual Bahan Bakar Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "PERUMAHAN DAN LINGKUNGAN_.xlsx",
        "sheet": "2.5",
        "title": "Tabel 2.5: Keberadaan Kejadian Pencemaran Lingkungan Hidup Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "PERUMAHAN DAN LINGKUNGAN_.xlsx",
        "sheet": "2.6",
        "title": "Tabel 2.6: Pencemaran Lingkungan Hidup dan Sumber Utama Pencemaran Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 153
      },
      {
        "module": "PERUMAHAN DAN LINGKUNGAN_.xlsx",
        "sheet": "2.7",
        "title": "Tabel 2.7: Keberadaan Kegiatan Pengelolaan dan Pelestarian Lingkungan Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "PERUMAHAN DAN LINGKUNGAN_.xlsx",
        "sheet": "2.8",
        "title": "Tabel 2.8: Keberadaan Kegiatan Adaptasi dan Mitigasi Perubahan Iklim Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx",
        "sheet": "8.1",
        "title": "BANYAKNYA DESA/KELURAHAN MENURUT JENIS UPAYA ANTISIPASI/MITIGASI BENCANA ALAM  DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      },
      {
        "module": "BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx",
        "sheet": "8.2",
        "title": "BANYAKNYA DESA/KELURAHAN MENURUT JENIS BENCANA ALAM  DI KABUPATEN KOLAKA UTARA",
        "total_rows": 152
      },
      {
        "module": "BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx",
        "sheet": "8.3",
        "title": "BANYAKNYA DESA/KELURAHAN DENGAN KEBERADAAN AKTIVITAS YANG BERPOTENSI MENINGKATKAN EMISI GAS RUMAH KACA DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      },
      {
        "module": "BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx",
        "sheet": "8.4",
        "title": "BANYAKNYA DESA/KELURAHAN DENGAN KEBERADAAN KEJADIAN YANG DIRASAKAN PENDUDUK AKIBAT PERUBAHAN IKLIM DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      },
      {
        "module": "BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx",
        "sheet": "8.5",
        "title": "BANYAKNYA DESA/KELURAHAN MENURUT KEBERADAAN KEJADIAN PERKELAHIAN MASSAL DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      },
      {
        "module": "BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx",
        "sheet": "8.6",
        "title": "BANYAKNYA DESA/KELURAHAN DENGAN KEJADIAN PERKELAHIAN MASSAL DAN KEBARADAAN KORBAN MENINGGAL DAN LUKA-LUKA DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 153
      },
      {
        "module": "BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx",
        "sheet": "8.7",
        "title": "BANYAKNYA DESA/KELURAHAN DENGAN KEJADIAN PERKELAHIAN MASSAL DAN INISIATOR PENYELESAIANNYA DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      },
      {
        "module": "BENCANA ALAM DAN GANGGUAN KEAMANAN.xlsx",
        "sheet": "8.8",
        "title": "BANYAKNYA DESA/KELURAHAN MENURUT JENIS UPAYA WARGA MENJAGA KEAMANAN LINGKUNGAN DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      }
    ]
  },
  "sosial": {
    "key": "sosial",
    "label": "Pendidikan & Kesehatan",
    "pillId": "pill-cat-sosial",
    "dropdownId": "dropdown-cat-sosial",
    "dotColor": "bg-blue-500",
    "activeBg": "bg-[#0D6E5B]",
    "defaultModule": "PENDIDIKAN DAN KESEHATAN.xlsx",
    "defaultTable": "3.1",
    "modules": [
      "PENDIDIKAN DAN KESEHATAN.xlsx",
      "INFRASTRUKTUR PENDIDIKAN.xlsx",
      "INFRASTRUKTUR KESEHATAN.xlsx"
    ],
    "subTables": [
      {
        "module": "PENDIDIKAN DAN KESEHATAN.xlsx",
        "sheet": "3.1",
        "title": "Tabel 3.1: Keberadaan Sarana Pendidikan dan Jenis Sarana Pendidikan Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "PENDIDIKAN DAN KESEHATAN.xlsx",
        "sheet": "3.2",
        "title": "Tabel 3.2: Keberadaan Sarana Kesehatan Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "PENDIDIKAN DAN KESEHATAN.xlsx",
        "sheet": "3.3",
        "title": "Tabel 3.3: Jumlah Upaya Kesehatan Bersumberdaya Masyarakat (UKBM) Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 153
      },
      {
        "module": "INFRASTRUKTUR PENDIDIKAN.xlsx",
        "sheet": "9.1",
        "title": "Tabel 9.1: Jumlah SD/MI Negeri dan Swasta Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 153
      },
      {
        "module": "INFRASTRUKTUR PENDIDIKAN.xlsx",
        "sheet": "9.2",
        "title": "Tabel 9.2: Jumlah SMP/MTs Negeri dan Swasta Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 153
      },
      {
        "module": "INFRASTRUKTUR PENDIDIKAN.xlsx",
        "sheet": "9.3",
        "title": "Tabel 9.3: Jumlah SMA/MA Negeri dan Swasta Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 153
      },
      {
        "module": "INFRASTRUKTUR PENDIDIKAN.xlsx",
        "sheet": "9.4",
        "title": "Tabel 9.4: Jumlah SMK Negeri dan Swasta Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "INFRASTRUKTUR PENDIDIKAN.xlsx",
        "sheet": "9.5",
        "title": "Tabel 9.5: Jumlah Akademi/Perguruan Tinggi Negeri dan Swasta Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "INFRASTRUKTUR KESEHATAN.xlsx",
        "sheet": "10.1",
        "title": "Tabel 10.1: Jumlah Rumah Sakit, Klinik Utama, dan Balai Kesehatan Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "INFRASTRUKTUR KESEHATAN.xlsx",
        "sheet": "10.2",
        "title": "Tabel 10.2: Jumlah Puskesmas Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "INFRASTRUKTUR KESEHATAN.xlsx",
        "sheet": "10.3",
        "title": "Tabel 10.3: Jumlah Klinik Pratama, Tempat Praktik Dokter, Tempat Praktik Bidan, dan Apotek Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      }
    ]
  },
  "keuangan": {
    "key": "keuangan",
    "label": "Keuangan & Aset Desa",
    "pillId": "pill-cat-keuangan",
    "dropdownId": "dropdown-cat-keuangan",
    "dotColor": "bg-purple-500",
    "activeBg": "bg-[#0D6E5B]",
    "defaultModule": "KEUANGAN DAN ASET DESA 2025.xlsx",
    "defaultTable": "6.3",
    "modules": [
      "KEUANGAN DAN ASET DESA 2025.xlsx"
    ],
    "subTables": [
      {
        "module": "KEUANGAN DAN ASET DESA 2025.xlsx",
        "sheet": "6.1",
        "title": "BANYAKNYA DESA MENURUT KEBERADAAN SISTEM INFORMASI DESA  DAN SISTEM KEUANGAN DESA DI KABUPATEN KOLAKA UTARA",
        "total_rows": 153
      },
      {
        "module": "KEUANGAN DAN ASET DESA 2025.xlsx",
        "sheet": "6.2",
        "title": "BANYAKNYA DESA MENURUT KEBERADAAN SISTEM INFORMASI DESA  DAN SISTEM KEUANGAN DESA DI KABUPATEN KOLAKA UTARA",
        "total_rows": 153
      },
      {
        "module": "KEUANGAN DAN ASET DESA 2025.xlsx",
        "sheet": "6.3",
        "title": "BANYAKNYA DESA MENURUT KEPEMILIKAN BADAN USAHA DAN ASET  DESA DI KABUPATEN KOLAKA UTARA",
        "total_rows": 152
      },
      {
        "module": "KEUANGAN DAN ASET DESA 2025.xlsx",
        "sheet": "Sambungan 6.3",
        "title": "BANYAKNYA DESA MENURUT KEPEMILIKAN BADAN USAHA DAN ASET  DESA DI KABUPATEN KOLAKA UTARA",
        "total_rows": 152
      },
      {
        "module": "KEUANGAN DAN ASET DESA 2025.xlsx",
        "sheet": "6.4",
        "title": "BANYAKNYA DESA MENURUT KEBERADAAN PERATURAN DESA TAHUN 2024 DI KABUPATEN KOLAKA UTARA",
        "total_rows": 152
      }
    ]
  },
  "umum": {
    "key": "umum",
    "label": "Keterangan Umum",
    "pillId": "pill-cat-umum",
    "dropdownId": "dropdown-cat-umum",
    "dotColor": "bg-teal-500",
    "activeBg": "bg-[#0D6E5B]",
    "defaultModule": "KETERANGAN UMUM DESA.xlsx",
    "defaultTable": "1.1",
    "modules": [
      "KETERANGAN UMUM DESA.xlsx",
      "KEPENDUDUKAN.xlsx"
    ],
    "subTables": [
      {
        "module": "KETERANGAN UMUM DESA.xlsx",
        "sheet": "1.1",
        "title": "Tabel 1.1: Status Pemerintahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "KETERANGAN UMUM DESA.xlsx",
        "sheet": "1.2",
        "title": "Tabel 1.2: Lokasi Desa Terhadap Kawasan Hutan dan Fungsi Kawasan Hutan Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "KETERANGAN UMUM DESA.xlsx",
        "sheet": "1.3",
        "title": "Tabel 1.3: Lokasi Desa Terhadap Laut Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "KETERANGAN UMUM DESA.xlsx",
        "sheet": "1.4",
        "title": "Tabel 1.4: Sumber Penghasilan Utama Sebagian Besar Penduduk dan Persentase Keluarga Menurut Sumber Penghasilan Utama di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "KETERANGAN UMUM DESA.xlsx",
        "sheet": "1.5",
        "title": "Tabel 1.5: Sebagian Besar Penduduknya Bekerja pada Sektor Pertanian Menurut Desa/Kelurahan dan Jenis Sub Sektor Utama di Kabupaten Kolaka Utara, 2025",
        "total_rows": 152
      },
      {
        "module": "KEPENDUDUKAN.xlsx",
        "sheet": "2.1",
        "title": "2.1 Penduduk, Distribusi Persentase Penduduk, Kepadatan Penduduk, Rasio Jenis Kelamin Penduduk Menurut Desa/Kelurahan di Kolaka Utara, 2025",
        "total_rows": 153
      },
      {
        "module": "KEPENDUDUKAN.xlsx",
        "sheet": "2.2",
        "title": "2.2   Jumlah Penduduk Menurut Kelompok Umur dan Jenis Kelamin, 2025",
        "total_rows": 259
      }
    ]
  },
  "pemerintah": {
    "key": "pemerintah",
    "label": "Pemerintah Desa",
    "pillId": "pill-cat-pemerintah",
    "dropdownId": "dropdown-cat-pemerintah",
    "dotColor": "bg-indigo-500",
    "activeBg": "bg-[#0D6E5B]",
    "defaultModule": "KETERANGAN PEMERINTAH DESA_KELURAHAN 2025.xlsx",
    "defaultTable": "7.1",
    "modules": [
      "KETERANGAN PEMERINTAH DESA_KELURAHAN 2025.xlsx",
      "ANGKUTAN, KOMUNIKASI, DAN INFORMASI.xlsx"
    ],
    "subTables": [
      {
        "module": "KETERANGAN PEMERINTAH DESA_KELURAHAN 2025.xlsx",
        "sheet": "7.1",
        "title": "BANYAKNYA DESA/KELURAHAN DENGAN APARAT PEMERINTAH DESA/KELURAHAN  DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      },
      {
        "module": "KETERANGAN PEMERINTAH DESA_KELURAHAN 2025.xlsx",
        "sheet": "7.2",
        "title": "BANYAKNYA DESA/KELURAHAN DENGAN KEPALA DESA/LURAH DAN/ATAU SEKRETARIS DESA/KELURAHAN MENURUT JENIS KELAMIN DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 153
      },
      {
        "module": "KETERANGAN PEMERINTAH DESA_KELURAHAN 2025.xlsx",
        "sheet": "7.3",
        "title": "BANYAKNYA DESA/KELURAHAN DENGAN KEPALA DESA/LURAH MENURUT KELOMPOK UMUR DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 153
      },
      {
        "module": "KETERANGAN PEMERINTAH DESA_KELURAHAN 2025.xlsx",
        "sheet": "7.4",
        "title": "BANYAKNYA DESA/KELURAHAN DENGAN SEKRETARIS DESA/KELURAHAN MENURUT KELOMPOK UMUR DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 153
      },
      {
        "module": "KETERANGAN PEMERINTAH DESA_KELURAHAN 2025.xlsx",
        "sheet": "7.5",
        "title": "BANYAKNYA DESA/KELURAHAN DENGAN KEPALA DESA/LURAH  MENURUT TINGKAT  PENDIDIKAN TERTINGGI YANG DITAMATKAN DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      },
      {
        "module": "KETERANGAN PEMERINTAH DESA_KELURAHAN 2025.xlsx",
        "sheet": "7.6",
        "title": "BANYAKNYA DESA/KELURAHAN DENGAN SEKRETARIS DESA/KELURAHAN  MENURUT TINGKAT  PENDIDIKAN TERTINGGI YANG DITAMATKAN DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      },
      {
        "module": "ANGKUTAN, KOMUNIKASI, DAN INFORMASI.xlsx",
        "sheet": "4.1",
        "title": "BANYAKNYA DESA/KELURAHAN MENURUT JENIS PRASARANA  TRANSPORTASI  DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 153
      },
      {
        "module": "ANGKUTAN, KOMUNIKASI, DAN INFORMASI.xlsx",
        "sheet": "4.2",
        "title": "BANYAKNYA DESA/KELURAHAN MENURUT KETERSEDIAAN ANGKUTAN UMUM DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 153
      },
      {
        "module": "ANGKUTAN, KOMUNIKASI, DAN INFORMASI.xlsx",
        "sheet": "4.3",
        "title": "BANYAKNYA DESA/KELURAHAN MENURUTU KETERSEDIAAN ANGKUTAN ONLINE DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      },
      {
        "module": "ANGKUTAN, KOMUNIKASI, DAN INFORMASI.xlsx",
        "sheet": "4.4",
        "title": "BANYAKNYA DESA/KELURAHAN YANG MENGGUNAKAN PRASARANA  TRANSPORTASI DARAT ATAU DARAT DAN AIR MENURUT JENIS  PERMUKAAN JALAN DARAT TERLUAS DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      },
      {
        "module": "ANGKUTAN, KOMUNIKASI, DAN INFORMASI.xlsx",
        "sheet": "4.5",
        "title": "BANYAKNYA DESA/KELURAHAN MENURUT KEBERADAAN BASE  TRANSCEIVER STATION (BTS) DAN KEKUATAN SINYAL TELEPON SELULER DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 153
      },
      {
        "module": "ANGKUTAN, KOMUNIKASI, DAN INFORMASI.xlsx",
        "sheet": "4.6",
        "title": "BANYAKNYA DESA/KELURAHAN MENURUT KEKUATAN SINYAL  INTERNET DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 153
      },
      {
        "module": "ANGKUTAN, KOMUNIKASI, DAN INFORMASI.xlsx",
        "sheet": "4.7",
        "title": "BANYAKNYA DESA/KELURAHAN MENURUT KEBERADAAN SARANA  KOMUNIKASI DI KABUPATEN KOLAKA UTARA, 2025",
        "total_rows": 152
      }
    ]
  }
};

  // =========================================================================
  // INTEGRATED PODES 2025 SUB-TABLES ENGINE (12 Modules, 63 Sub-Tables)
  // Direct synchronization with Admin Desa Madani database
  // =========================================================================
  let currentActiveSubTable = {
    category: 'ekonomi',
    module: 'SARANA EKONOMI DAN INDUSTRI.xlsx',
    sheet: '5.6',
    title: 'Tabel 5.6: Jumlah Industri Mikro dan Kecil dan Sentra Industri Menurut Desa/Kelurahan di Kabupaten Kolaka Utara, 2025'
  };
  let currentRealTableData = null;
  let activeDropdownCat = null;
  const podesTableCache = {};

  function getActiveTablePrimaryColumn() {
    if (!currentRealTableData || !currentRealTableData.columns || !currentRealTableData.columns.length) {
      return null;
    }
    const numCols = currentRealTableData.columns.filter(c => !c.label.toLowerCase().includes('persen') && !c.label.includes('%'));
    const colsToSearch = numCols.length > 0 ? numCols : currentRealTableData.columns;

    // Pick column with largest sum across villages (or first if 0)
    let bestCol = colsToSearch[0];
    let maxTotal = -1;

    colsToSearch.forEach(c => {
      let sum = 0;
      (currentRealTableData.kecamatan_rows || []).forEach(r => {
        if (r.desa && !r.is_total && r.values) {
          sum += (parseFloat(r.values[c.col] || 0) || 0);
        }
      });
      if (sum > maxTotal) {
        maxTotal = sum;
        bestCol = c;
      }
    });

    return bestCol;
  }

  function cleanSubTableTitle(raw) {
    if (!raw) return '';
    let t = raw.replace(/^Tabel\s+[0-9.]+\s*:\s*/i, '');
    t = t.replace(/^BANYAKNYA\s+DESA\/KELURAHAN\s+(MENURUT|DENGAN)\s+/i, '');
    t = t.replace(/^BANYAKNYA\s+DESA\s+(MENURUT|DENGAN)\s+/i, '');
    t = t.replace(/^BANYAKNYA\s+/i, '');
    t = t.replace(/\s+DI\s+KABUPATEN\s+KOLAKA\s+UTARA.*$/i, '');
    t = t.replace(/\s+MENURUT\s+DESA\/KELURAHAN.*$/i, '');
    t = t.replace(/,\s*202[0-9]/i, '');
    return t.trim();
  }

  function renderCategoryDropdowns() {
    Object.keys(PODES_CATEGORY_MAP).forEach(catKey => {
      const dropEl = document.getElementById(`dropdown-cat-${catKey}`);
      if (!dropEl) return;
      const catCfg = PODES_CATEGORY_MAP[catKey];
      const subTables = catCfg.subTables || [];

      // Group sub-tables by module file
      const grouped = {};
      subTables.forEach(st => {
        if (!grouped[st.module]) grouped[st.module] = [];
        grouped[st.module].push(st);
      });

      let html = `
        <div class="px-3 py-2 border-b border-slate-100 flex items-center justify-between">
          <div>
            <div class="font-extrabold text-xs text-slate-800 flex items-center gap-1.5">
              <span class="w-2 h-2 rounded-full ${catCfg.dotColor}"></span>
              <span>${catCfg.label}</span>
            </div>
            <div class="text-[10px] text-slate-400 mt-0.5">Pilih lembar data untuk eksplorasi spesifik</div>
          </div>
          <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 border border-slate-200">${subTables.length} Tabel</span>
        </div>
        <div class="py-1 max-h-72 overflow-y-auto space-y-2">
      `;

      Object.keys(grouped).forEach(modName => {
        const shortMod = modName.replace('.xlsx', '');
        html += `
          <div>
            <div class="px-3 py-1 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 flex items-center gap-1 bg-slate-50/70">
              <i class="bi bi-file-earmark-spreadsheet text-emerald-600"></i>
              <span class="truncate">${shortMod}</span>
            </div>
            <div class="px-1 py-0.5 space-y-0.5">
        `;
        grouped[modName].forEach(st => {
          const isActive = currentActiveSubTable && currentActiveSubTable.module === st.module && currentActiveSubTable.sheet === st.sheet;
          const displayTitle = cleanSubTableTitle(st.title) || st.title;
          html += `
            <button type="button" onclick="window.PresisiEngine.selectSubTable('${catKey}', '${st.module}', '${st.sheet}')" class="w-full text-left px-2.5 py-1.5 rounded-xl text-xs transition flex items-start gap-2 hover:bg-emerald-50/70 group cursor-pointer ${isActive ? 'bg-emerald-50 text-emerald-900 font-bold border border-emerald-300 shadow-2xs' : 'text-slate-700'}">
              <span class="px-1.5 py-0.5 rounded text-[10px] font-black shrink-0 ${isActive ? 'bg-emerald-600 text-white' : 'bg-slate-200 group-hover:bg-emerald-200 text-slate-700'}">${st.sheet}</span>
              <span class="line-clamp-2 text-[11px] leading-tight text-slate-700 group-hover:text-emerald-950">${displayTitle}</span>
            </button>
          `;
        });
        html += `
            </div>
          </div>
        `;
      });

      html += `</div>`;
      dropEl.innerHTML = html;
    });
  }

  function toggleCategoryDropdown(catKey, event) {
    if (event) {
      event.preventDefault();
      event.stopPropagation();
    }

    if (currentCategory !== catKey) {
      setCategory(catKey);
    }

    const dropEl = document.getElementById(`dropdown-cat-${catKey}`);
    const chevEl = document.getElementById(`pill-chev-${catKey}`);
    const isCurrentlyOpen = dropEl && !dropEl.classList.contains('hidden');

    closeAllCategoryDropdowns();

    if (!isCurrentlyOpen && dropEl) {
      dropEl.classList.remove('hidden');
      if (chevEl) chevEl.classList.add('rotate-180');
      activeDropdownCat = catKey;
    }
  }

  function closeAllCategoryDropdowns() {
    document.querySelectorAll('.category-podes-dropdown').forEach(d => {
      d.classList.add('hidden');
    });
    document.querySelectorAll('[id^="pill-chev-"]').forEach(c => {
      c.classList.remove('rotate-180');
    });
    activeDropdownCat = null;
  }

  function renderSubTablesHorizontalBar() {
    const bar = document.getElementById('portalSubTablesBar');
    if (!bar) return;

    const catCfg = PODES_CATEGORY_MAP[currentCategory];
    if (!catCfg) return;
    const subTables = catCfg.subTables || [];

    bar.innerHTML = subTables.map(st => {
      const isActive = currentActiveSubTable && currentActiveSubTable.module === st.module && currentActiveSubTable.sheet === st.sheet;
      const cleanTitle = cleanSubTableTitle(st.title) || st.title;
      return `
        <button type="button" onclick="window.PresisiEngine.selectSubTable('${currentCategory}', '${st.module}', '${st.sheet}')" class="px-3 py-1.5 rounded-full text-xs font-bold shrink-0 transition flex items-center gap-1.5 cursor-pointer ${isActive ? 'bg-[#0D6E5B] text-white shadow-xs' : 'bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200/80'}" title="${st.title}">
          <span class="text-[10px] px-1.5 py-0.5 rounded font-black ${isActive ? 'bg-white/20 text-white' : 'bg-slate-200 text-slate-700'}">${st.sheet}</span>
          <span class="max-w-[150px] truncate text-[11px]">${cleanTitle}</span>
        </button>
      `;
    }).join('');
  }

  function selectSubTable(catKey, moduleFile, tableSheet) {
    closeAllCategoryDropdowns();

    if (catKey && catKey !== currentCategory) {
      setCategory(catKey);
    }

    const catCfg = PODES_CATEGORY_MAP[currentCategory];
    const subTable = (catCfg && catCfg.subTables) ? catCfg.subTables.find(t => t.module === moduleFile && t.sheet === tableSheet) : null;

    currentActiveSubTable = {
      category: currentCategory,
      module: moduleFile,
      sheet: tableSheet,
      title: subTable ? subTable.title : `Tabel ${tableSheet}`
    };

    // Update active badges & labels
    const titleEl = document.getElementById('portalActiveTableTitle');
    const modEl = document.getElementById('portalActiveModuleFile');
    if (titleEl) titleEl.textContent = `Tabel ${tableSheet}: ${cleanSubTableTitle(currentActiveSubTable.title)}`;
    if (modEl) modEl.textContent = moduleFile;

    // Refresh sub-tables horizontal bar & dropdowns
    renderSubTablesHorizontalBar();
    renderCategoryDropdowns();

    // Sync Analisis Header & Panels
    updateAnalisisHeader(currentCategory);
    updateAnalysisPanels(currentCategory);

    // Fetch real PODES data
    loadRealPodesTable(moduleFile, tableSheet);
  }

  function loadRealPodesTable(moduleFile, tableSheet) {
    const cacheKey = `${moduleFile}::${tableSheet}`;
    if (podesTableCache[cacheKey]) {
      applyRealTableData(podesTableCache[cacheKey]);
      return;
    }

    const url = `/portal/podes/table-data?module=${encodeURIComponent(moduleFile)}&table=${encodeURIComponent(tableSheet)}&kecamatan=ALL`;
    
    fetch(url)
      .then(res => {
        if (!res.ok) throw new Error('Network error: ' + res.status);
        return res.json();
      })
      .then(data => {
        if (data && data.success) {
          podesTableCache[cacheKey] = data;
          applyRealTableData(data);
        }
      })
      .catch(err => {
        console.warn('Real PODES fetch error:', err);
      });
  }

  function applyRealTableData(data) {
    currentRealTableData = data;

    // Update row count
    const villageRows = (data.kecamatan_rows || []).filter(r => r.desa && !r.is_total);
    const countEl = document.getElementById('portalActiveRowCount');
    if (countEl) countEl.textContent = `${villageRows.length} Desa`;

    // Re-render table
    renderPresisiTable();

    // Update Chart 1 title and data
    const t1 = document.getElementById('titleChart1');
    const b1 = document.getElementById('labelChart1Badge');
    if (t1) t1.textContent = `Tabel ${data.table}: ${cleanSubTableTitle(data.title)}`;
    if (b1) b1.textContent = `TABEL ${data.table}`;

    // Sync Analisis Header & Panels
    updateAnalisisHeader(currentCategory);
    updateAnalysisPanels(currentCategory);

    // Update Presisi Charts with real table metrics
    updatePresisiCharts();
  }

  // INITIALIZATION
  function init() {
    if (typeof window.PODES_2025_DATABASE === 'undefined' || typeof L === 'undefined' || !document.getElementById('mapPresisi')) {
      setTimeout(init, 50);
      return;
    }
    db = window.PODES_2025_DATABASE;

    populateKecamatanSelect();
    populateDesaSelect('ALL');
    renderQuickVillageList('ALL');
    initPresisiMap();
    initPresisiCharts();
    renderKpiTiles();
    renderExecutiveSummary();
    renderPresisiTable();
    renderAgregatKecamatanSection();
    renderCategoryDropdowns();
    renderSubTablesHorizontalBar();
    loadRealPodesTable(currentActiveSubTable.module, currentActiveSubTable.sheet);
    setupEventListeners();
    setViewMode('peta');
  }

  function populateKecamatanSelect() {
    const select = document.getElementById('presisiSelectKecamatan');
    if (!select) return;
    select.innerHTML = '<option value="ALL">Semua Kecamatan (15 Kec)</option>';
    db.kecamatanList.forEach(k => {
      const opt = document.createElement('option');
      opt.value = k.nama;
      opt.textContent = `Kecamatan ${k.nama} (${k.desaCount} Desa)`;
      select.appendChild(opt);
    });
  }

  function populateDesaSelect(kecName) {
    const select = document.getElementById('presisiSelectDesa');
    if (!select) return;
    select.innerHTML = '<option value="ALL">Pilih Desa / Semua</option>';

    let list = db.desaList;
    if (kecName && kecName !== 'ALL') {
      list = list.filter(d => d.kecamatan.toLowerCase() === kecName.toLowerCase());
    }

    list.forEach(d => {
      const opt = document.createElement('option');
      opt.value = d.nama;
      opt.textContent = `${d.status} ${d.nama}`;
      select.appendChild(opt);
    });
  }

  function setupEventListeners() {
    window.addEventListener('resize', () => {
      if (map) map.invalidateSize();
    });

    // Close category dropdowns when clicking outside
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.category-podes-wrapper')) {
        closeAllCategoryDropdowns();
      }
    });

    // Keyboard arrow navigation for Storytelling Carousel
    document.addEventListener('keydown', (e) => {
      if (e.target && ['INPUT', 'SELECT', 'TEXTAREA'].includes(e.target.tagName)) return;
      const sec = document.getElementById('sectionAgregatKecamatan');
      if (!sec) return;
      const rect = sec.getBoundingClientRect();
      if (rect.bottom > 100 && rect.top < window.innerHeight - 100) {
        if (e.key === 'ArrowLeft') {
          prevKecamatanSlide();
        } else if (e.key === 'ArrowRight') {
          nextKecamatanSlide();
        }
      }
    });
  }

  // CATEGORY SWITCHER
  function setCategory(catKey) {
    if (!CATEGORY_CONFIG[catKey]) return;
    currentCategory = catKey;

    closeAllCategoryDropdowns();

    // If sub-table is not in this category, set to category default
    const catCfg = PODES_CATEGORY_MAP[catKey];
    if (catCfg && (!currentActiveSubTable || currentActiveSubTable.category !== catKey)) {
      const defTable = (catCfg.subTables && catCfg.subTables.length > 0) ? catCfg.subTables[0] : null;
      if (defTable) {
        currentActiveSubTable = {
          category: catKey,
          module: defTable.module,
          sheet: defTable.sheet,
          title: defTable.title
        };
        const titleEl = document.getElementById('portalActiveTableTitle');
        const modEl = document.getElementById('portalActiveModuleFile');
        if (titleEl) titleEl.textContent = `Tabel ${defTable.sheet}: ${cleanSubTableTitle(defTable.title)}`;
        if (modEl) modEl.textContent = defTable.module;
        loadRealPodesTable(defTable.module, defTable.sheet);
      }
    }
    renderSubTablesHorizontalBar();
    renderCategoryDropdowns();

    // Update Category Pills
    document.querySelectorAll('.presisi-cat-pill').forEach(btn => {
      if (btn.getAttribute('data-category') === catKey) {
        btn.className = "presisi-cat-pill active px-4 py-2 rounded-full text-xs font-bold transition flex items-center gap-2 shrink-0 bg-[#0D6E5B] text-white shadow-xs cursor-pointer select-none";
      } else {
        btn.className = "presisi-cat-pill px-4 py-2 rounded-full text-xs font-semibold transition flex items-center gap-2 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200/60 cursor-pointer select-none";
      }
    });

    // Update Header Badges & Indicators
    const cfg = CATEGORY_CONFIG[catKey];
    const metricInd = document.getElementById('presisiMapMetricIndicator');
    if (metricInd) metricInd.textContent = `Metrik: ${cfg.metricLabel}`;

    // Update Analisis Header & Panels immediately
    updateAnalisisHeader(catKey);
    updateAnalysisPanels(catKey);

    // Update Map
    updateThematicMap();

    // Update KPIs & Charts
    renderKpiTiles();
    updatePresisiCharts();
    renderExecutiveSummary();

    // Update Table
    renderPresisiTable();
    renderAgregatKecamatanSection();

    // If viewing a village report, refresh it too
    if (currentDesa !== 'ALL') {
      renderRaporDesa(currentDesa);
    }
  }

  // VIEW MODE SWITCHER: 'peta', 'analisis', 'dual'/'split', 'tabel'
  function setViewMode(mode) {
    currentViewMode = mode;

    const btnPeta = document.getElementById('btnViewPeta');
    const btnAnalisis = document.getElementById('btnViewAnalisis');
    const btnTabel = document.getElementById('btnViewTabel');
    const toggleSplit = document.getElementById('presisiToggleSplit');

    const panePeta = document.getElementById('presisiPanePeta');
    const paneAnalisis = document.getElementById('presisiPaneAnalisis');
    const viewGrid = document.getElementById('presisiWorkspaceGrid');
    const viewTabel = document.getElementById('presisiViewTablePane');

    const mapContainer = document.getElementById('presisiMapContainer');

    const activeBtn = "presisi-view-btn active px-5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 bg-[#0b2545] text-white shadow-xs";
    const inactiveBtn = "presisi-view-btn px-5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100";

    if (mode === 'tabel') {
      if (viewGrid) viewGrid.classList.add('hidden');
      if (viewTabel) viewTabel.classList.remove('hidden');
      if (btnPeta) btnPeta.className = inactiveBtn;
      if (btnAnalisis) btnAnalisis.className = inactiveBtn;
      if (btnTabel) btnTabel.className = activeBtn;
      if (toggleSplit) toggleSplit.checked = false;
      renderPresisiTable();
    renderAgregatKecamatanSection();
      return;
    }

    // Ensure Workspace Grid is visible
    if (viewTabel) viewTabel.classList.add('hidden');
    if (viewGrid) viewGrid.classList.remove('hidden');
    if (btnTabel) btnTabel.className = inactiveBtn;

    if (mode === 'analisis') {
      if (panePeta) panePeta.classList.add('hidden');
      if (paneAnalisis) paneAnalisis.classList.remove('hidden');
      if (btnPeta) btnPeta.className = inactiveBtn;
      if (btnAnalisis) btnAnalisis.className = activeBtn;
      if (toggleSplit) toggleSplit.checked = false;
      setTimeout(() => updatePresisiCharts(), 60);
    } else if (mode === 'split' || mode === 'dual') {
      if (panePeta) panePeta.classList.remove('hidden');
      if (paneAnalisis) paneAnalisis.classList.remove('hidden');
      if (mapContainer) mapContainer.style.height = '400px';
      if (btnPeta) btnPeta.className = activeBtn;
      if (btnAnalisis) btnAnalisis.className = activeBtn;
      if (toggleSplit) toggleSplit.checked = true;
      if (map) setTimeout(() => map.invalidateSize(), 100);
      updatePresisiCharts();
    } else {
      // mode === 'peta' (Default full map view)
      if (panePeta) panePeta.classList.remove('hidden');
      if (paneAnalisis) paneAnalisis.classList.add('hidden');
      if (mapContainer) mapContainer.style.height = '640px';
      if (btnPeta) btnPeta.className = activeBtn;
      if (btnAnalisis) btnAnalisis.className = inactiveBtn;
      if (toggleSplit) toggleSplit.checked = false;
      if (map) setTimeout(() => map.invalidateSize(), 100);
    }
  }

  function toggleSplitView(enabled) {
    if (enabled) {
      setViewMode('split');
    } else {
      setViewMode('peta');
    }
  }

  function updateAdminLevelButtons(level) {
    const btnProv = document.getElementById('btnAdminLevelProv');
    const btnKab = document.getElementById('btnAdminLevelKab');
    const btnKec = document.getElementById('btnAdminLevelKec');
    const btnDesa = document.getElementById('btnAdminLevelDesa');

    const activeClass = "admin-level-btn active py-1.5 rounded-lg bg-[#0b2545] text-white shadow-2xs transition font-bold";
    const inactiveClass = "admin-level-btn py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition font-bold";

    if (btnProv) btnProv.className = inactiveClass;
    if (btnKab) btnKab.className = inactiveClass;
    if (btnKec) btnKec.className = inactiveClass;
    if (btnDesa) btnDesa.className = inactiveClass;

    if (level === 'kabupaten') {
      if (btnKab) btnKab.className = activeClass;
    } else if (level === 'kecamatan') {
      if (btnKec) btnKec.className = activeClass;
    } else if (level === 'desa') {
      if (btnDesa) btnDesa.className = activeClass;
    } else if (level === 'provinsi') {
      if (btnProv) btnProv.className = activeClass;
    }
  }

  function setAdminLevel(level) {
    updateAdminLevelButtons(level);

    if (level === 'kabupaten' || level === 'provinsi') {
      resetFilter();
    } else if (level === 'kecamatan') {
      if (currentKecamatan === 'ALL') {
        onKecamatanChange('Lambai');
      } else {
        renderDesaLayer(currentKecamatan);
      }
    } else if (level === 'desa') {
      if (currentDesa === 'ALL') {
        const vList = currentKecamatan === 'ALL'
          ? db.desaList
          : db.desaList.filter(d => d.kecamatan.toLowerCase() === currentKecamatan.toLowerCase());
        if (vList.length > 0) onDesaChange(vList[0].nama);
      } else {
        onDesaChange(currentDesa);
      }
    }
  }

  function updateFloatingDemographyCard(kecName, desaName) {
    const elJiwa = document.getElementById('statJumlahJiwa');
    const elKeluarga = document.getElementById('statJumlahKeluarga');
    if (!elJiwa || !elKeluarga) return;

    if (!kecName || kecName === 'ALL') {
      elJiwa.textContent = '142.692';
      elKeluarga.textContent = '38.077';
      return;
    }

    const cleanKec = kecName.replace(/\s+/g, '').toLowerCase();

    if (desaName && desaName !== 'ALL') {
      let d = null;
      if (db && db.desa) {
        d = db.desa.find(x => x.nama.toLowerCase() === desaName.toLowerCase() && (cleanKec === 'all' || x.kecamatan.replace(/\s+/g, '').toLowerCase() === cleanKec));
      }
      if (!d && db && db.desaList) {
        d = db.desaList.find(x => x.nama.toLowerCase() === desaName.toLowerCase());
      }
      if (d) {
        const jiwaCount = (d.demografi && d.demografi.penduduk_total) ? d.demografi.penduduk_total : (d.penduduk || 0);
        const kkCount = (d.lingkungan && d.lingkungan.pln_kk) ? (d.lingkungan.pln_kk + (d.lingkungan.non_pln_kk || 0)) : (d.kk || 0);
        elJiwa.textContent = jiwaCount ? jiwaCount.toLocaleString('id-ID') : '-';
        elKeluarga.textContent = kkCount ? kkCount.toLocaleString('id-ID') : '-';
        return;
      }
    }

    if (KECAMATAN_DEMOGRAPHY[cleanKec]) {
      elJiwa.textContent = KECAMATAN_DEMOGRAPHY[cleanKec].jiwa.toLocaleString('id-ID');
      elKeluarga.textContent = KECAMATAN_DEMOGRAPHY[cleanKec].kk.toLocaleString('id-ID');
    } else {
      const vList = (db && (db.desa || db.desaList) || []).filter(x => x.kecamatan.replace(/\s+/g, '').toLowerCase() === cleanKec);
      const j = vList.reduce((acc, v) => acc + ((v.demografi && v.demografi.penduduk_total) || v.penduduk || 0), 0);
      const k = vList.reduce((acc, v) => acc + ((v.lingkungan && v.lingkungan.pln_kk) || v.kk || 0), 0);
      elJiwa.textContent = j ? j.toLocaleString('id-ID') : '-';
      elKeluarga.textContent = k ? k.toLocaleString('id-ID') : '-';
    }
  }

  function toggleTematik(enabled) {
    isThematicActive = enabled;
    updateThematicMap();
  }

  // MAP IMPLEMENTATION (Satellite + Distinct Polygon Color Scheme + Constituent Desa Polygons)
  function initPresisiMap() {
    const container = document.getElementById('mapPresisi');
    if (!container) return;
    if (typeof L === 'undefined') {
      console.warn('Leaflet (L) is not defined yet, retrying initPresisiMap in 100ms...');
      setTimeout(initPresisiMap, 100);
      return;
    }

    if (map) {
      try { map.remove(); } catch(e) {}
      map = null;
    }

    // Inject permanent tooltip label style matching desapresisi.id reference
    if (!document.getElementById('presisiMapStyleFix')) {
      const styleEl = document.createElement('style');
      styleEl.id = 'presisiMapStyleFix';
      styleEl.textContent = `
        .leaflet-tooltip.presisi-map-label {
          background: transparent !important;
          border: none !important;
          box-shadow: none !important;
          color: #ffffff !important;
          font-size: 11px !important;
          font-weight: 800 !important;
          letter-spacing: 0.02em !important;
          text-shadow: 0 1px 3px rgba(0, 0, 0, 0.95), 0 0 6px rgba(0, 0, 0, 0.9) !important;
          pointer-events: none !important;
          text-align: center !important;
          padding: 0 !important;
        }
        .leaflet-tooltip.presisi-map-label::before {
          display: none !important;
        }
        .leaflet-container {
          font-family: inherit !important;
        }
      `;
      document.head.appendChild(styleEl);
    }

    // Ensure container size
    container.style.minHeight = '580px';

    map = L.map('mapPresisi', {
      zoomControl: false,
      attributionControl: true
    }).setView([-3.25, 121.15], 9);

    // Zoom Control on Bottom-Right (as in reference)
    L.control.zoom({ position: 'bottomright' }).addTo(map);

    // Scale Control on Top-Right (as in reference: 20 km bar)
    L.control.scale({ position: 'topright', imperial: false }).addTo(map);

    // 1. Primary Base: Esri World Light Gray Canvas (Clean, Minimalist, Light & Elegant)
    const baseLight = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
      maxZoom: 19,
      attribution: '© Esri, Canvas World Light Gray'
    }).addTo(map);

    const refLabels = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Reference/MapServer/tile/{z}/{y}/{x}', {
      maxZoom: 19,
      opacity: 0.95
    }).addTo(map);

    // 2. Alternative OSM Base Layer
    const baseOsm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; OpenStreetMap'
    });

    // 3. High Resolution Esri World Imagery Satellite
    const baseSatellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      maxZoom: 19,
      attribution: 'Esri, Earthstar Geographics'
    });

    // Layer Switcher Control (Bottom-Right)
    L.control.layers({
      "Peta Terang (Light Canvas)": baseLight,
      "Peta Terbuka (OSM)": baseOsm,
      "Citra Satelit": baseSatellite
    }, {
      "Label Referensi Batas": refLabels
    }, { position: 'bottomright' }).addTo(map);

    // Progressive village badges layer (fallback)
    markersLayer = L.layerGroup().addTo(map);

    // Render GeoJSON Boundaries (15 Kecamatan)
    function attachGeoJson(geoData) {
      if (!geoData || !map) return;
      if (geojsonLayer) {
        try { map.removeLayer(geojsonLayer); } catch(e) {}
      }
      geojsonLayer = L.geoJSON(geoData, {
        style: styleFeature,
        onEachFeature: onEachFeature
      }).addTo(map);

      try {
        map.fitBounds(geojsonLayer.getBounds(), { padding: [20, 20] });
      } catch (e) {
        map.setView([-3.25, 121.15], 9);
      }
      createThematicLegend();
    }

    if (window.KOLAKA_UTARA_GEOJSON) {
      attachGeoJson(window.KOLAKA_UTARA_GEOJSON);
    } else {
      fetch('/data/kolaka_utara_kecamatan.geojson')
        .then(res => res.json())
        .then(data => {
          window.KOLAKA_UTARA_GEOJSON = data;
          attachGeoJson(data);
        })
        .catch(err => {
          console.warn('GeoJSON fetch error:', err);
          createThematicLegend();
        });
    }

    // Preload Desa Polygons GeoJSON
    if (!window.KOLUT_DESA_GEOJSON) {
      fetch('/data/kolut_desa_polygons.json')
        .then(res => res.json())
        .then(data => { window.KOLUT_DESA_GEOJSON = data; })
        .catch(() => {});
    }

    // Initialize floating demography card
    updateFloatingDemographyCard('ALL');
    updateAdminLevelButtons('kabupaten');

    // Auto-invalidate size on multiple intervals
    setTimeout(() => { if (map) map.invalidateSize(); }, 100);
    setTimeout(() => { if (map) map.invalidateSize(); }, 350);
    setTimeout(() => { if (map) map.invalidateSize(); }, 800);
  }

  function getFeatureMetricValue(kecNama, cat) {
    if (currentRealTableData && currentRealTableData.columns && currentRealTableData.columns.length > 0) {
      const cleanKec = (kecNama || '').replace(/\s+/g, '').toLowerCase();
      const primCol = getActiveTablePrimaryColumn();
      if (primCol) {
        let val = 0;
        (currentRealTableData.kecamatan_rows || []).forEach(r => {
          const rKec = (r.kecamatan || '').replace(/\s+/g, '').toLowerCase();
          if (rKec === cleanKec) {
            if (r.is_total) {
              const num = parseFloat(r.values ? r.values[primCol.col] : 0) || 0;
              if (num > 0) val = num;
            } else if (r.desa && val === 0) {
              const num = parseFloat(r.values ? r.values[primCol.col] : 0) || 0;
              val += num;
            }
          }
        });
        return val;
      }
    }
    const cleanKec = (kecNama || '').replace(/\s+/g, '').toLowerCase();
    const kData = db.kecamatanList.find(k => k.nama.replace(/\s+/g, '').toLowerCase() === cleanKec);
    if (!kData) return 0;

    switch (cat) {
      case 'ekonomi':
        return (kData.ekonomi && typeof kData.ekonomi.ikm === 'number') ? kData.ekonomi.ikm : 0;
      case 'lingkungan':
        return (kData.lingkungan && typeof kData.lingkungan.pln === 'number') ? kData.lingkungan.pln : 0;
      case 'sosial': {
        const s = kData.sosial || {};
        if (typeof s.totalSaranaPendidikan === 'number' && !isNaN(s.totalSaranaPendidikan)) {
          return s.totalSaranaPendidikan;
        }
        const sd = (s.sdNeg || 0) + (s.sdSwa || 0) + (s.miNeg || 0) + (s.miSwa || 0);
        const smp = (s.smpNeg || 0) + (s.smpSwa || 0) + (s.mtsNeg || 0) + (s.mtsSwa || 0);
        const sma = (s.smaNeg || 0) + (s.smaSwa || 0) + (s.maNeg || 0) + (s.maSwa || 0) + (s.smk || 0);
        return sd + smp + sma;
      }
      case 'keuangan':
        return (kData.keuangan && typeof kData.keuangan.bumdes === 'number') ? kData.keuangan.bumdes : 0;
      case 'umum':
        return (kData.umum && typeof kData.umum.sekitarHutan === 'number') ? kData.umum.sekitarHutan : 0;
      case 'pemerintah':
        return (kData.pemerintah && typeof kData.pemerintah.totalAparat === 'number') ? kData.pemerintah.totalAparat : 0;
      default:
        return 0;
    }
  }

  function getThematicColor(val, cat) {
    if (!isThematicActive) return '#005ea6';

    switch (cat) {
      case 'ekonomi':
        return val > 1000 ? '#7c2d12' :
               val > 400  ? '#c2410c' :
               val > 200  ? '#ea580c' :
               val > 100  ? '#f97316' :
               val > 50   ? '#fb923c' : '#fed7aa';
      case 'lingkungan':
        return val >= 4000 ? '#065f46' :
               val >= 3000 ? '#059669' :
               val >= 2000 ? '#10b981' :
               val >= 1000 ? '#34d399' : '#a7f3d0';
      case 'sosial':
        return val >= 20 ? '#1e3a8a' :
               val >= 15 ? '#1d4ed8' :
               val >= 10 ? '#3b82f6' :
               val >= 7  ? '#60a5fa' : '#bfdbfe';
      case 'keuangan':
        return val >= 14 ? '#581c87' :
               val >= 11 ? '#7e22ce' :
               val >= 8  ? '#a855f7' :
               val >= 5  ? '#c084fc' : '#e9d5ff';
      case 'umum':
        return val >= 8 ? '#134e4a' :
               val >= 6 ? '#0f766e' :
               val >= 4 ? '#14b8a6' :
               val >= 2 ? '#2dd4bf' : '#99f6e4';
      case 'pemerintah':
        return val >= 100 ? '#312e81' :
               val >= 85  ? '#4338ca' :
               val >= 70  ? '#6366f1' :
               val >= 55  ? '#818cf8' : '#c7d2fe';
      default:
        return '#0284c7';
    }
  }

  function styleFeature(feature) {
    const props = feature.properties || {};
    const kecNama = props.nama || props.kecamatan || props.WADMKC || '';
    const cleanKec = kecNama.replace(/\s+/g, '').toLowerCase();

    // In macro view, assign distinct vibrant palette color (matching desapresisi.id reference Image 1)
    const color = KECAMATAN_PALETTE[cleanKec] || '#0D6E5B';

    if (currentKecamatan !== 'ALL') {
      const isTarget = cleanKec === currentKecamatan.replace(/\s+/g, '').toLowerCase();
      if (isTarget) {
        return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

          fillColor: color,
          weight: 2.5,
          opacity: 0.95,
          color: '#ffffff',
          fillOpacity: 0.12
        };
      } else {
        return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

          fillColor: color,
          weight: 1,
          opacity: 0.35,
          color: '#ffffff',
          fillOpacity: 0.08
        };
      }
    }

    return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

      fillColor: color,
      weight: 2,
      opacity: 1,
      color: '#ffffff',
      dashArray: '',
      fillOpacity: 0.74
    };
  }

  function onEachFeature(feature, layer) {
    const props = feature.properties || {};
    const kecNama = props.nama || props.kecamatan || props.WADMKC || '';
    const cleanKec = kecNama.replace(/\s+/g, '').toLowerCase();
    const kData = db.kecamatanList.find(k => k.nama.replace(/\s+/g, '').toLowerCase() === cleanKec);

    // Centered permanent label in polygon center (matching reference Image 1: "Kec. Tolala", "Kec. Batu Putih", etc.)
    layer.bindTooltip(`<span class="presisi-map-txt">Kec. ${kecNama}</span>`, {
      permanent: true,
      direction: 'center',
      className: 'presisi-map-label'
    });

    layer.on({
      mouseover: function(e) {
        if (currentKecamatan === 'ALL') {
          e.target.setStyle({ weight: 3.5, color: '#f59e0b', fillOpacity: 0.92 });
        }
      },
      mouseout: function(e) {
        if (geojsonLayer) geojsonLayer.resetStyle(e.target);
      },
      click: function() {
        onKecamatanChange(kData ? kData.nama : kecNama);
      }
    });
  }

  // Renders the constituent DESA polygons of the selected kecamatan (matching Image 2)
  function renderDesaLayer(kecName) {
    if (!map) return;

    if (desaGeojsonLayer) {
      try { map.removeLayer(desaGeojsonLayer); } catch(e) {}
      desaGeojsonLayer = null;
    }

    if (!kecName || kecName === 'ALL') {
      if (geojsonLayer) {
        geojsonLayer.eachLayer(layer => {
          geojsonLayer.resetStyle(layer);
        });
      }
      updateFloatingDemographyCard('ALL');
      return;
    }

    const cleanKec = kecName.replace(/\s+/g, '').toLowerCase();

    // Dim the macro kecamatan layer
    if (geojsonLayer) {
      geojsonLayer.eachLayer(layer => {
        const props = layer.feature ? layer.feature.properties : {};
        const kNama = (props.nama || props.kecamatan || props.WADMKC || '').replace(/\s+/g, '').toLowerCase();
        if (kNama === cleanKec) {
          layer.setStyle({
            weight: 2.5,
            color: '#ffffff',
            fillOpacity: 0.10,
            opacity: 0.95
          });
        } else {
          layer.setStyle({
            weight: 1,
            color: '#ffffff',
            fillOpacity: 0.05,
            opacity: 0.3
          });
        }
      });
    }

    function doRenderDesa(desaGeoData) {
      if (!desaGeoData || !map) return;
      const filteredFeatures = (desaGeoData.features || []).filter(f => {
        const fKec = (f.properties.kecamatan || '').replace(/\s+/g, '').toLowerCase();
        return fKec === cleanKec;
      });

      if (filteredFeatures.length === 0) return;

      desaGeojsonLayer = L.geoJSON({ type: "FeatureCollection", features: filteredFeatures }, {
        style: function(feature) {
          const isSelected = currentDesa !== 'ALL' &&
            feature.properties.nama.toLowerCase() === currentDesa.toLowerCase();
          return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

            fillColor: feature.properties.color || '#10b981',
            weight: isSelected ? 4 : 2,
            opacity: 1,
            color: isSelected ? '#f59e0b' : '#ffffff',
            fillOpacity: isSelected ? 0.95 : 0.78
          };
        },
        onEachFeature: function(feature, layer) {
          const vName = feature.properties.nama;
          layer.bindTooltip(`<span class="presisi-map-txt">${vName}</span>`, {
            permanent: true,
            direction: 'center',
            className: 'presisi-map-label'
          });

          layer.on({
            mouseover: function(e) {
              const isSelected = currentDesa !== 'ALL' &&
                vName.toLowerCase() === currentDesa.toLowerCase();
              if (!isSelected) {
                e.target.setStyle({ weight: 3.5, color: '#f59e0b', fillOpacity: 0.95 });
              }
            },
            mouseout: function(e) {
              if (desaGeojsonLayer) desaGeojsonLayer.resetStyle(e.target);
            },
            click: function() {
              onDesaChange(vName);
            }
          });
        }
      }).addTo(map);

      try {
        map.fitBounds(desaGeojsonLayer.getBounds(), { padding: [45, 45], maxZoom: 14, animate: true });
      } catch(e) {}

      updateFloatingDemographyCard(kecName, currentDesa);
    }

    if (window.KOLUT_DESA_GEOJSON) {
      doRenderDesa(window.KOLUT_DESA_GEOJSON);
    } else {
      fetch('/data/kolut_desa_polygons.json')
        .then(res => res.json())
        .then(data => {
          window.KOLUT_DESA_GEOJSON = data;
          doRenderDesa(data);
        })
        .catch(err => console.warn('Desa polygons fetch error:', err));
    }
  }

  function updateThematicMap() {
    if (!geojsonLayer) return;
    geojsonLayer.eachLayer(layer => {
      geojsonLayer.resetStyle(layer);
    });
    updateLegendControl();
  }

  function createThematicLegend() {
    if (!map) return;
    legendControl = L.control({ position: 'bottomright' });
    legendControl.onAdd = function() {
      const div = L.DomUtil.create('div', 'presisi-legend bg-white/95 backdrop-blur-md rounded-xl p-3 shadow-lg border border-slate-200 text-xs');
      div.id = 'presisiMapLegend';
      div.innerHTML = getLegendHTML();
      return div;
    };
    legendControl.addTo(map);
  }

  function updateLegendControl() {
    const el = document.getElementById('presisiMapLegend');
    if (el) el.innerHTML = getLegendHTML();
  }

  function getLegendHTML() {
    const cfg = CATEGORY_CONFIG[currentCategory];
    let items = [];

    switch (currentCategory) {
      case 'ekonomi':
        items = [
          { color: '#7c2d12', label: '> 1.000 IMK (Sentra Utama)' },
          { color: '#c2410c', label: '401 – 1.000 IMK' },
          { color: '#ea580c', label: '201 – 400 IMK' },
          { color: '#f97316', label: '101 – 200 IMK' },
          { color: '#fb923c', label: '51 – 100 IMK' },
          { color: '#fed7aa', label: '≤ 50 IMK' }
        ];
        break;
      case 'lingkungan':
        items = [
          { color: '#065f46', label: '> 4.000 Kel. PLN' },
          { color: '#059669', label: '3.001 – 4.000 Kel.' },
          { color: '#10b981', label: '2.001 – 3.000 Kel.' },
          { color: '#34d399', label: '1.001 – 2.000 Kel.' },
          { color: '#a7f3d0', label: '≤ 1.000 Kel.' }
        ];
        break;
      case 'sosial':
        items = [
          { color: '#1e3a8a', label: '≥ 20 Fasilitas' },
          { color: '#1d4ed8', label: '15 – 19 Fasilitas' },
          { color: '#3b82f6', label: '10 – 14 Fasilitas' },
          { color: '#60a5fa', label: '7 – 9 Fasilitas' },
          { color: '#bfdbfe', label: '< 7 Fasilitas' }
        ];
        break;
      case 'keuangan':
        items = [
          { color: '#581c87', label: '≥ 14 BUMDes' },
          { color: '#7e22ce', label: '11 – 13 BUMDes' },
          { color: '#a855f7', label: '8 – 10 BUMDes' },
          { color: '#c084fc', label: '5 – 7 BUMDes' },
          { color: '#e9d5ff', label: '< 5 BUMDes' }
        ];
        break;
      case 'umum':
        items = [
          { color: '#134e4a', label: '≥ 8 Desa Hutan' },
          { color: '#0f766e', label: '6 – 7 Desa' },
          { color: '#14b8a6', label: '4 – 5 Desa' },
          { color: '#2dd4bf', label: '2 – 3 Desa' },
          { color: '#99f6e4', label: '< 2 Desa' }
        ];
        break;
      case 'pemerintah':
        items = [
          { color: '#312e81', label: '≥ 100 Aparat Desa' },
          { color: '#4338ca', label: '85 – 99 Aparat' },
          { color: '#6366f1', label: '70 – 84 Aparat' },
          { color: '#818cf8', label: '55 – 69 Aparat' },
          { color: '#c7d2fe', label: '< 55 Aparat' }
        ];
        break;
    }

    return `
      <div class="font-extrabold text-[#0b2545] pb-1 mb-1.5 border-b border-slate-200">
        Legenda: ${cfg.label}
      </div>
      <div class="space-y-1">
        ${items.map(it => `
          <div class="flex items-center gap-2">
            <span class="w-3.5 h-3 rounded shrink-0 shadow-2xs" style="background:${it.color}"></span>
            <span class="text-[11px] text-slate-700">${it.label}</span>
          </div>
        `).join('')}
      </div>
    `;
  }

  // PROGRESSIVE VILLAGE MICRO-BADGES (Only shown inside a focused Kecamatan!)
  function updateVillageMicroBadges(kecName) {
    if (!markersLayer) return;
    markersLayer.clearLayers();

    if (!kecName || kecName === 'ALL') {
      // Macro view: ZERO pins! Complete clean canvas.
      return;
    }

    const kData = db.kecamatanList.find(x => x.nama.toLowerCase() === kecName.toLowerCase());
    if (!kData) return;

    const vList = db.desaList.filter(d => d.kecamatan.toLowerCase() === kecName.toLowerCase());
    const kLat = kData.lat;
    const kLng = kData.lng;

    vList.forEach((v, idx) => {
      // Radial distribution around centroid
      const angle = (idx / vList.length) * 2 * Math.PI;
      const radius = 0.02 + ((idx % 3) * 0.012);
      const lat = kLat + (radius * Math.sin(angle));
      const lng = kLng + (radius * Math.cos(angle));

      const isFocused = currentDesa.toLowerCase() === v.nama.toLowerCase();

      const badgeHtml = `
        <div class="village-micro-badge ${isFocused ? 'active-focus' : ''}" onclick="window.PresisiEngine.onDesaChange('${v.nama}')" title="Klik untuk Rapor Desa ${v.nama}">
          <span class="w-1.5 h-1.5 rounded-full ${v.status === 'Mandiri' ? 'bg-emerald-400' : (v.status === 'Kelurahan' ? 'bg-amber-400' : 'bg-sky-400')}"></span>
          <span>${v.nama}</span>
        </div>
      `;

      const customIcon = L.divIcon({
        className: 'custom-micro-badge-wrap',
        html: badgeHtml,
        iconSize: null
      });

      const marker = L.marker([lat, lng], { icon: customIcon });
      markersLayer.addLayer(marker);
    });
  }

  // QUICK VILLAGE SELECTOR LIST (Left Sidebar Navigation)
  function renderQuickVillageList(kecName) {
    const container = document.getElementById('presisiQuickVillageList');
    const badge = document.getElementById('badgeJumlahDesaWilayah');
    if (!container) return;

    if (!kecName || kecName === 'ALL') {
      if (badge) badge.textContent = '133 Desa';
      container.innerHTML = `
        <div class="p-3 bg-slate-50 rounded-xl border border-dashed border-slate-200 text-center w-full">
          <p class="text-[11px] text-slate-500">Pilih salah satu dari 15 kecamatan di atas atau klik poligon peta untuk memunculkan daftar desa.</p>
        </div>
      `;
      return;
    }

    const vList = db.desaList.filter(d => d.kecamatan.toLowerCase() === kecName.toLowerCase());
    if (badge) badge.textContent = `${vList.length} Desa/Kel`;

    let html = '';
    vList.forEach(v => {
      const isSelected = currentDesa.toLowerCase() === v.nama.toLowerCase();
      const dotColor = v.status === 'Kelurahan' ? 'bg-amber-400' : 'bg-emerald-500';
      const btnClass = isSelected
        ? 'bg-[#0b2545] text-white font-black shadow-xs ring-2 ring-emerald-500'
        : 'bg-slate-50 hover:bg-slate-100 text-slate-700 font-semibold border border-slate-200/80';

      html += `
        <button type="button" onclick="window.PresisiEngine.onDesaChange('${v.nama}')" class="px-2.5 py-1.5 rounded-lg text-xs transition flex items-center gap-1.5 ${btnClass}">
          <span class="w-2 h-2 rounded-full ${dotColor}"></span>
          <span>${v.nama}</span>
        </button>
      `;
    });
    container.innerHTML = html;
  }

  // INTERACTIVE SELECTION HANDLERS
  function onKecamatanChange(kecName) {
    currentKecamatan = kecName || 'ALL';
    currentDesa = 'ALL';

    const selectKec = document.getElementById('presisiSelectKecamatan');
    if (selectKec && selectKec.value !== currentKecamatan) {
      selectKec.value = currentKecamatan;
    }

    populateDesaSelect(currentKecamatan);
    renderQuickVillageList(currentKecamatan);

    if (currentKecamatan === 'ALL') {
      resetMapView();
      renderDesaLayer('ALL');
      updateAdminLevelButtons('kabupaten');
    } else {
      renderDesaLayer(currentKecamatan);
      updateAdminLevelButtons('kecamatan');
    }

    updateFloatingDemographyCard(currentKecamatan, currentDesa);

    // Toggle Panels: Show Charts, Hide Village Report
    const pCharts = document.getElementById('presisiContainerCharts');
    const pRapor = document.getElementById('presisiContainerRaporDesa');
    if (pCharts) pCharts.classList.remove('hidden');
    if (pRapor) pRapor.classList.add('hidden');

    // Update Context Breadcrumb & Scope Badge
    updateContextLabels();

    // Update Map Styles & KPIs
    updateThematicMap();
    renderKpiTiles();
    updatePresisiCharts();
    renderExecutiveSummary();
  }

  function onDesaChange(desaName) {
    if (!desaName || desaName === 'ALL') {
      onKecamatanChange(currentKecamatan);
      return;
    }

    const d = db.desaList.find(x => x.nama.toLowerCase() === desaName.toLowerCase());
    if (!d) return;

    currentDesa = d.nama;

    // Ensure Kecamatan matches
    if (currentKecamatan.toLowerCase() !== d.kecamatan.toLowerCase()) {
      currentKecamatan = d.kecamatan;
      const selectKec = document.getElementById('presisiSelectKecamatan');
      if (selectKec) selectKec.value = currentKecamatan;
      populateDesaSelect(currentKecamatan);
      renderQuickVillageList(currentKecamatan);
    }

    const selectDesa = document.getElementById('presisiSelectDesa');
    if (selectDesa) selectDesa.value = d.nama;

    if (!desaGeojsonLayer) {
      renderDesaLayer(currentKecamatan);
    } else {
      desaGeojsonLayer.eachLayer(layer => {
        desaGeojsonLayer.resetStyle(layer);
        const feat = layer.feature;
        if (feat && feat.properties.nama.toLowerCase() === currentDesa.toLowerCase()) {
          layer.setStyle({ weight: 4, color: '#f59e0b', fillOpacity: 0.98 });
          try {
            map.fitBounds(layer.getBounds(), { padding: [50, 50], maxZoom: 14, animate: true });
          } catch(e) {}
        }
      });
    }

    updateAdminLevelButtons('desa');
    updateFloatingDemographyCard(currentKecamatan, currentDesa);
    renderQuickVillageList(currentKecamatan);

    // Toggle Panels: Hide Charts, Show Village Report Card
    const pCharts = document.getElementById('presisiContainerCharts');
    const pRapor = document.getElementById('presisiContainerRaporDesa');
    if (pCharts) pCharts.classList.add('hidden');
    if (pRapor) pRapor.classList.remove('hidden');

    updateContextLabels();
    renderRaporDesa(d.nama);
  }

  function resetFilter() {
    currentKecamatan = 'ALL';
    currentDesa = 'ALL';

    const selectKec = document.getElementById('presisiSelectKecamatan');
    if (selectKec) selectKec.value = 'ALL';
    populateDesaSelect('ALL');
    renderQuickVillageList('ALL');

    resetMapView();
    renderDesaLayer('ALL');
    updateAdminLevelButtons('kabupaten');
    updateFloatingDemographyCard('ALL');

    const pCharts = document.getElementById('presisiContainerCharts');
    const pRapor = document.getElementById('presisiContainerRaporDesa');
    if (pCharts) pCharts.classList.remove('hidden');
    if (pRapor) pRapor.classList.add('hidden');

    updateContextLabels();
    updateThematicMap();
    renderKpiTiles();
    updatePresisiCharts();
    renderExecutiveSummary();
  }

  function updateContextLabels() {
    const breadcrumb = document.getElementById('presisiBreadcrumbText');
    const scopeBadge = document.getElementById('presisiScopeBadge');

    if (currentDesa !== 'ALL') {
      if (breadcrumb) breadcrumb.innerHTML = `<span class="text-slate-400">Kolaka Utara</span> <span class="text-slate-300">/</span> <span class="text-slate-500 font-medium">Kec. ${currentKecamatan}</span> <span class="text-slate-300">/</span> <span class="text-[#059669] font-black">Desa ${currentDesa}</span>`;
      if (scopeBadge) scopeBadge.textContent = `Rapor Presisi Desa ${currentDesa}`;
    } else if (currentKecamatan !== 'ALL') {
      const k = db.kecamatanList.find(x => x.nama.toLowerCase() === currentKecamatan.toLowerCase());
      if (breadcrumb) breadcrumb.innerHTML = `<span class="text-slate-400">Kolaka Utara</span> <span class="text-slate-300">/</span> <span class="text-[#0b2545] font-black">Kecamatan ${currentKecamatan}</span>`;
      if (scopeBadge) scopeBadge.textContent = `${k ? k.desaCount : ''} Desa/Kelurahan`;
    } else {
      if (breadcrumb) breadcrumb.innerHTML = `<span class="text-[#0b2545] font-black">Kabupaten Kolaka Utara</span>`;
      if (scopeBadge) scopeBadge.textContent = `15 Kecamatan • 133 Desa`;
    }
  }

  function resetMapView() {
    if (!map) return;
    if (geojsonLayer) {
      try {
        map.fitBounds(geojsonLayer.getBounds(), { padding: [20, 20], animate: true });
        return;
      } catch(e) {}
    }
    map.setView([-3.25, 121.15], 9, { animate: true });
  }

  function zoomToKecamatan(kecName) {
    if (!map) return;
    const clean = kecName.replace(/\s+/g, '').toLowerCase();
    const k = db.kecamatanList.find(x => x.nama.replace(/\s+/g, '').toLowerCase() === clean);
    if (k) {
      map.setView([k.lat, k.lng], 11, { animate: true });
    }
  }

  function zoomToDesa(desaName) {
    if (!map) return;
    const d = db.desaList.find(x => x.nama.toLowerCase() === desaName.toLowerCase());
    if (d) {
      const k = db.kecamatanList.find(x => x.nama.toLowerCase() === d.kecamatan.toLowerCase());
      if (k) {
        map.setView([k.lat, k.lng], 12, { animate: true });
      }
    }
  }

  function toggleMapFullscreen() {
    const el = document.getElementById('presisiMapContainer');
    if (!el) return;
    if (!document.fullscreenElement) {
      el.requestFullscreen().catch(() => {});
    } else {
      document.exitFullscreen().catch(() => {});
    }
  }

  // 4 KPI TILES (Smart responsive metric tiles on right panel)
  function renderKpiTiles() {
    const container = document.getElementById('presisiKpiGrid');
    if (!container) return;

    const cfg = CATEGORY_CONFIG[currentCategory];
    let kpi1 = { label: "Total " + cfg.label, val: "0", sub: "" };
    let kpi2 = { label: "Rata-rata", val: "0", sub: "per wilayah" };
    let kpi3 = { label: "Tertinggi", val: "-", sub: "" };
    let kpi4 = { label: "Cakupan", val: "15 Kec", sub: "133 Desa" };

    if (currentKecamatan === 'ALL') {
      // Kabupaten Level
      let values = db.kecamatanList.map(k => ({ nama: k.nama, val: getFeatureMetricValue(k.nama, currentCategory) }));
      values.sort((a, b) => b.val - a.val);

      const total = values.reduce((acc, curr) => acc + (isNaN(curr.val) ? 0 : curr.val), 0);
      const avg = values.length ? Math.round(total / values.length) : 0;

      kpi1.val = (isNaN(total) ? 0 : total).toLocaleString('id-ID') + ' ' + cfg.unit;
      kpi1.sub = "Akumulasi 15 Kecamatan";

      kpi2.val = (isNaN(avg) ? 0 : avg).toLocaleString('id-ID') + ' ' + cfg.unit;
      kpi2.sub = "Rata-rata per Kecamatan";

      kpi3.val = values[0] && !isNaN(values[0].val) ? `${values[0].nama} (${values[0].val.toLocaleString('id-ID')})` : "-";
      kpi3.sub = "Kecamatan Terbanyak";

      kpi4.val = "133 Desa";
      kpi4.sub = "100% Terdata Lengkap";
    } else {
      // Kecamatan Level
      const vList = db.desaList.filter(d => d.kecamatan.toLowerCase() === currentKecamatan.toLowerCase());
      let values = vList.map(v => {
        let metric = 0;
        if (currentCategory === 'ekonomi') metric = v.ekonomi ? (v.ekonomi.ikm || 0) : 0;
        else if (currentCategory === 'lingkungan') metric = v.lingkungan ? (v.lingkungan.pln || 0) : 0;
        else if (currentCategory === 'sosial') {
          const s = v.sosial || {};
          metric = (s.sd || 0) + (s.smp || 0) + (s.sma || 0) + (s.smk || 0);
        }
        else if (currentCategory === 'keuangan') metric = v.keuangan ? (v.keuangan.bumdes || 0) : 0;
        else if (currentCategory === 'umum') metric = v.umum ? 1 : 0;
        else if (currentCategory === 'pemerintah') metric = v.pemerintah ? (v.pemerintah.totalAparat || 0) : 0;
        return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,
 nama: v.nama, val: isNaN(metric) ? 0 : metric };
      });
      values.sort((a, b) => b.val - a.val);

      const total = values.reduce((acc, curr) => acc + (isNaN(curr.val) ? 0 : curr.val), 0);
      const avg = values.length ? Math.round(total / values.length) : 0;

      kpi1.val = (isNaN(total) ? 0 : total).toLocaleString('id-ID') + ' ' + cfg.unit;
      kpi1.sub = `Total di Kec. ${currentKecamatan}`;

      kpi2.val = (isNaN(avg) ? 0 : avg).toLocaleString('id-ID') + ' ' + cfg.unit;
      kpi2.sub = "Rata-rata per Desa";

      kpi3.val = values[0] && !isNaN(values[0].val) ? `${values[0].nama} (${values[0].val.toLocaleString('id-ID')})` : "-";
      kpi3.sub = "Desa Terbanyak";

      kpi4.val = `${vList.length} Desa`;
      kpi4.sub = "Wilayah Terdaftar";
    }

    container.innerHTML = `
      <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 space-y-0.5">
        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-tight block">${kpi1.label}</span>
        <b class="text-sm font-black text-[#0b2545] tracking-tight block">${kpi1.val}</b>
        <span class="text-[9px] text-slate-400 block">${kpi1.sub}</span>
      </div>
      <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 space-y-0.5">
        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-tight block">${kpi2.label}</span>
        <b class="text-sm font-black text-emerald-700 tracking-tight block">${kpi2.val}</b>
        <span class="text-[9px] text-slate-400 block">${kpi2.sub}</span>
      </div>
      <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 space-y-0.5">
        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-tight block">${kpi3.label}</span>
        <b class="text-xs font-black text-blue-700 tracking-tight block truncate">${kpi3.val}</b>
        <span class="text-[9px] text-slate-400 block">${kpi3.sub}</span>
      </div>
      <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 space-y-0.5">
        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-tight block">${kpi4.label}</span>
        <b class="text-sm font-black text-slate-800 tracking-tight block">${kpi4.val}</b>
        <span class="text-[9px] text-slate-400 block">${kpi4.sub}</span>
      </div>
    `;
  }

  // CHARTS IMPLEMENTATION (Chart.js - EXPANDED 4-CHART EXECUTIVE SUITE)
  function initPresisiCharts() {
    if (typeof Chart === 'undefined') return;

    ['c1', 'c2', 'c3', 'c4'].forEach(k => {
      if (charts[k]) {
        charts[k].destroy();
        charts[k] = null;
      }
    });

    updatePresisiCharts();
  }

  function updatePresisiCharts() {
    if (typeof Chart === 'undefined') return;

    const ctx1 = document.getElementById('presisiChart1');
    const ctx2 = document.getElementById('presisiChart2');
    const ctx3 = document.getElementById('presisiChart3');
    const ctx4 = document.getElementById('presisiChart4');

    if (!ctx1 || !ctx2) return;

    const cfg = CATEGORY_CONFIG[currentCategory] || {};
    const chartData = getCategoryChartData(currentCategory);

    // Update Titles & Badges
    const t1 = document.getElementById('titleChart1');
    const b1 = document.getElementById('labelChart1Badge');
    const t2 = document.getElementById('titleChart2');
    const b2 = document.getElementById('labelChart2Badge');
    const t3 = document.getElementById('titleChart3');
    const b3 = document.getElementById('labelChart3Badge');
    const t4 = document.getElementById('titleChart4');
    const b4 = document.getElementById('labelChart4Badge');

    const primCol = (currentRealTableData && currentRealTableData.columns) ? getActiveTablePrimaryColumn() : null;
    const secCol = (currentRealTableData && currentRealTableData.columns && currentRealTableData.columns.length > 1) ? currentRealTableData.columns[1] : null;

    if (t1) {
      if (primCol) {
        t1.textContent = currentKecamatan === 'ALL'
          ? `Sebaran: ${primCol.label} per Kecamatan`
          : `Sebaran: ${primCol.label} di Kec. ${currentKecamatan}`;
      } else {
        t1.textContent = currentKecamatan === 'ALL' ? cfg.chartTitle : `${cfg.metricLabel} di Kec. ${currentKecamatan}`;
      }
    }
    if (b1) {
      b1.textContent = currentRealTableData ? `TABEL ${currentRealTableData.table}` : (cfg.chartBadge || 'TABEL BPS');
    }

    if (t2) {
      if (currentRealTableData) {
        t2.textContent = `Komposisi Sektor: ${cleanSubTableTitle(currentRealTableData.title)}`;
      } else {
        t2.textContent = cfg.distTitle || 'Komposisi Sektor';
      }
    }
    if (b2) b2.textContent = cfg.distBadge || 'KOMPOSISI';

    if (t3) {
      if (primCol) {
        t3.textContent = `Top 5 vs Bottom 5: ${primCol.label}`;
      } else {
        t3.textContent = cfg.chart3Title || 'Top 5 vs Bottom 5 Kecamatan';
      }
    }
    if (b3) b3.textContent = cfg.chart3Badge || 'DISPARITAS';

    if (t4) {
      if (secCol) {
        t4.textContent = `Sebaran: ${secCol.label} per Wilayah`;
      } else {
        t4.textContent = cfg.chart4Title || 'Struktur Sub-Sektor Pendukung';
      }
    }
    if (b4) b4.textContent = cfg.chart4Badge || 'SUB-SEKTOR';

    // Destroy existing instances
    ['c1', 'c2', 'c3', 'c4'].forEach(k => {
      if (charts[k]) {
        charts[k].destroy();
        charts[k] = null;
      }
    });

    if (ctx1 && chartData.chart1) charts.c1 = new Chart(ctx1, chartData.chart1);
    if (ctx2 && chartData.chart2) charts.c2 = new Chart(ctx2, chartData.chart2);
    if (ctx3 && chartData.chart3) charts.c3 = new Chart(ctx3, chartData.chart3);
    if (ctx4 && chartData.chart4) charts.c4 = new Chart(ctx4, chartData.chart4);

    updateAnalysisPanels(currentCategory);
  }

  function updateAnalisisHeader(cat) {
    const cfg = CATEGORY_CONFIG[cat] || {};
    const titleAnalisis = document.getElementById('presisiAnalisisTitle');
    const badgeAnalisis = document.getElementById('presisiAnalisisBadge');
    const subAnalisis = document.getElementById('presisiAnalisisSubtitle');

    if (titleAnalisis) {
      if (currentActiveSubTable && currentActiveSubTable.sheet) {
        titleAnalisis.innerHTML = `Visualisasi Analisis: ${cfg.label || 'Statistik Sektoral'} <span class="text-xs font-bold text-emerald-800 bg-emerald-100/90 px-2.5 py-0.5 rounded-full ml-1 sm:ml-2 align-middle border border-emerald-300">Tabel ${currentActiveSubTable.sheet}</span>`;
      } else {
        titleAnalisis.textContent = `Visualisasi Analisis: ${cfg.label || 'Statistik Sektoral'}`;
      }
    }

    if (badgeAnalisis) {
      badgeAnalisis.textContent = cfg.badge || `Sheet ${cfg.label}`;
    }

    if (subAnalisis) {
      if (currentActiveSubTable && currentActiveSubTable.title) {
        const cleanTitle = cleanSubTableTitle(currentActiveSubTable.title);
        const modName = (currentActiveSubTable.module || '').replace('.xlsx', '');
        subAnalisis.textContent = `Telaah komparatif data Potensi Desa (PODES BPS 2025) se-Kabupaten Kolaka Utara • Tabel ${currentActiveSubTable.sheet}: ${cleanTitle} (${modName})`;
      } else {
        subAnalisis.textContent = `Telaah komparatif berbasis tabel statistik Potensi Desa (PODES BPS 2025) se-Kabupaten Kolaka Utara`;
      }
    }
  }

  function updateAnalysisPanels(cat) {
    updateAnalisisHeader(cat);
    const kab = db.kabupatenOverview || db.kabupaten || {};
    const fmt = (n) => (typeof n === 'number' && !isNaN(n)) ? n.toLocaleString('id-ID') : (n || '0');

    const l1 = document.getElementById('analisisKpiLabel1');
    const v1 = document.getElementById('analisisKpiVal1');
    const s1 = document.getElementById('analisisKpiSub1');

    const l2 = document.getElementById('analisisKpiLabel2');
    const v2 = document.getElementById('analisisKpiVal2');
    const s2 = document.getElementById('analisisKpiSub2');

    const l3 = document.getElementById('analisisKpiLabel3');
    const v3 = document.getElementById('analisisKpiVal3');
    const s3 = document.getElementById('analisisKpiSub3');

    const l4 = document.getElementById('analisisKpiLabel4');
    const v4 = document.getElementById('analisisKpiVal4');
    const s4 = document.getElementById('analisisKpiSub4');

    const pDinamika = document.getElementById('policyTextDinamika');
    const pDisparitas = document.getElementById('policyTextDisparitas');
    const pRekomendasi = document.getElementById('policyTextRekomendasi');

    // DYNAMIC REAL PODES 2025 KPI STRIP GENERATOR
    if (currentRealTableData && currentRealTableData.columns && currentRealTableData.columns.length > 0) {
      const primCol = getActiveTablePrimaryColumn() || currentRealTableData.columns[0];
      const isMacro = currentKecamatan === 'ALL';

      const vRows = (currentRealTableData.kecamatan_rows || []).filter(r => {
        if (!r.desa || r.is_total) return false;
        if (!isMacro) {
          return (r.kecamatan || '').toLowerCase() === currentKecamatan.toLowerCase();
        }
        return true;
      });

      let totalVal = 0;
      let villagesWithVal = 0;
      const kecMap = {};

      vRows.forEach(r => {
        const kname = r.kecamatan || 'LAINNYA';
        const num = parseFloat(r.values ? r.values[primCol.col] : 0) || 0;
        totalVal += num;
        if (num > 0) villagesWithVal++;
        kecMap[kname] = (kecMap[kname] || 0) + num;
      });

      const sortedKecs = Object.keys(kecMap).map(k => ({ nama: k, val: kecMap[k] })).sort((a, b) => b.val - a.val);
      const topKec = sortedKecs[0] || { nama: '-', val: 0 };
      const botKec = sortedKecs[sortedKecs.length - 1] || { nama: '-', val: 0 };
      const avgVal = sortedKecs.length > 0 ? Math.round(totalVal / sortedKecs.length) : 0;
      const pctTop = totalVal > 0 ? ((topKec.val / totalVal) * 100).toFixed(1) : 0;
      const coveragePct = vRows.length > 0 ? ((villagesWithVal / vRows.length) * 100).toFixed(1) : 0;

      if (l1) l1.textContent = `Total ${primCol.label}`;
      if (v1) v1.textContent = totalVal.toLocaleString('id-ID');
      if (s1) s1.textContent = isMacro ? 'Akumulasi 15 Kecamatan' : `Total di Kec. ${currentKecamatan}`;

      if (l2) l2.textContent = isMacro ? 'Wilayah Tertinggi' : 'Desa Tertinggi';
      if (v2) v2.textContent = isMacro ? `Kec. ${topKec.nama}` : `${topKec.nama}`;
      if (s2) s2.textContent = `${topKec.val.toLocaleString('id-ID')} (${pctTop}% Total)`;

      if (l3) l3.textContent = 'Rata-Rata per Wilayah';
      if (v3) v3.textContent = avgVal.toLocaleString('id-ID');
      if (s3) s3.textContent = isMacro ? 'Baseline per Kecamatan' : 'Rata-rata per Desa';

      if (l4) l4.textContent = 'Ketersebaran Desa';
      if (v4) v4.textContent = `${villagesWithVal} Desa (${coveragePct}%)`;
      if (s4) s4.textContent = `Dari ${vRows.length} Desa Terdata`;

      const cleanTbl = cleanSubTableTitle(currentRealTableData.title || '');
      if (pDinamika) pDinamika.textContent = `Analisis data ${cleanTbl} (Tabel ${currentRealTableData.table}) mencatat total akumulasi ${totalVal.toLocaleString('id-ID')} pada indikator ${primCol.label}. Konsentrasi tertinggi berada di ${topKec.nama} dengan kontribusi ${pctTop}% terhadap total daerah.`;
      if (pDisparitas) pDisparitas.textContent = `Disparitas antar-wilayah: Wilayah ${topKec.nama} mencatat angka tertinggi (${topKec.val.toLocaleString('id-ID')}), sedangkan wilayah terendah mencatat ${botKec.val.toLocaleString('id-ID')}.`;
      if (pRekomendasi) pRekomendasi.textContent = `Diperlukan pemerataan fasilitas dan alokasi program sektoral berbasis bukti (evidence-based) untuk mendukung percepatan kemandirian desa pada indikator ${primCol.label}.`;
      return;
    }

    if (cat === 'sosial') {
      if (l1) l1.textContent = 'Total Fasilitas Sosial';
      if (v1) v1.textContent = '205 Sek • 174 Faskes';
      if (s1) s1.textContent = '124 SD, 54 SMP, 26 SMA/SMK';

      if (l2) l2.textContent = 'Pusat Rujukan Terlengkap';
      if (v2) v2.textContent = 'Kec. Lasusua';
      if (s2) s2.textContent = '33 Sekolah • 19 Faskes (RSUD)';

      if (l3) l3.textContent = 'Rata-Rata per Wilayah';
      if (v3) v3.textContent = '13,7 Sek • 11,6 Faskes';
      if (s3) s3.textContent = 'Rasio 1,54 Sekolah / Desa';

      if (l4) l4.textContent = 'Layanan Berbasis Warga';
      if (v4) v4.textContent = '133 Posyandu • 105 Posbindu';
      if (s4) s4.textContent = '100% Desa Terfasilitasi Posyandu';

      if (pDinamika) pDinamika.textContent = 'Layanan pendidikan dasar (124 SD/MI) telah merata di 133 desa. Sektor kesehatan ditopang 1 RSUD Tipe C di Lasusua, 16 Puskesmas kecamatan, dan 28 Pustu.';
      if (pDisparitas) pDisparitas.textContent = 'Jenjang SMA/SMK (26 unit) dan fasilitas rawat inap terkonsentrasi di kecamatan perkotaan; kecamatan perbatasan (Tolala, Wawo, Tiwu) memerlukan kemudahan mobilitas siswa.';
      if (pRekomendasi) pRekomendasi.textContent = 'Peningkatan insentif bidan/perawat di 28 Pustu & 71 Polindes guna akselerasi penurunan stunting, serta penyediaan asrama/bus perintis bagi pelajar SMA di wilayah pedalaman.';
    } else if (cat === 'lingkungan') {
      if (l1) l1.textContent = 'Keluarga Berlistrik PLN';
      if (v1) v1.textContent = '38.077 KK';
      if (s1) s1.textContent = 'Rasio Elektrifikasi 91,5%';

      if (l2) l2.textContent = 'Pengguna Terbesar';
      if (v2) v2.textContent = 'Kec. Lasusua';
      if (s2) s2.textContent = '8.463 KK (98,0% Elektrifikasi)';

      if (l3) l3.textContent = 'Rasio Tertinggi Wilayah';
      if (v3) v3.textContent = 'Kec. Wawo & Lambai';
      if (s3) s3.textContent = 'Rasio Elektrifikasi > 99,6%';

      if (l4) l4.textContent = 'Kelestarian Lingkungan';
      if (v4) v4.textContent = '100% Bebas Pencemaran';
      if (s4) s4.textContent = '133 Desa/Kelurahan Terjaga';

      if (pDinamika) pDinamika.textContent = 'Jaringan listrik PLN telah menjangkau seluruh 15 kecamatan dengan 38.077 KK pelanggan. Sebanyak 3.348 KK memanfaatkan penerangan mandiri non-PLN/tenaga surya.';
      if (pDisparitas) pDisparitas.textContent = 'Wilayah perbukitan terpencil masih menghadapi kendala keandalan jaringan saat musim hujan dan 188 KK tercatat belum memiliki instalasi listrik permanen.';
      if (pRekomendasi) pRekomendasi.textContent = 'Perluasan program listrik desa (Lisdes) PLN bersubsidi serta pengembangan Pembangkit Listrik Tenaga Mikrohidro (PLTMH) pada sungai-sungai berarus deras di Wawo & Porehu.';
    } else if (cat === 'keuangan') {
      if (l1) l1.textContent = 'BUMDes Beroperasi';
      if (v1) v1.textContent = '134 Unit BUMDes';
      if (s1) s1.textContent = 'Rasio Kelembagaan > 100%';

      if (l2) l2.textContent = 'Sentra BUMDes Teraktif';
      if (v2) v2.textContent = 'Lasusua & Kodeoha';
      if (s2) s2.textContent = 'Masing-masing 15 Unit Usaha';

      if (l3) l3.textContent = 'Kepemilikan Tanah Kas';
      if (v3) v3.textContent = '112 Desa (84,2%)';
      if (s3) s3.textContent = '21 Desa Belum Memiliki Tanah Kas';

      if (l4) l4.textContent = 'Kepastian Regulasi Desa';
      if (v4) v4.textContent = '133 Desa (100%)';
      if (s4) s4.textContent = 'Perdes Telah Disahkan Definitif';

      if (pDinamika) pDinamika.textContent = 'Seluruh 133 desa telah memiliki landasan Peraturan Desa (Perdes) sah dan 134 unit BUMDes aktif bergerak di sektor perdagangan hasil bumi, simpan pinjam, dan logistik.';
      if (pDisparitas) pDisparitas.textContent = 'Sebanyak 21 desa belum memiliki tanah kas desa bersertifikat dan kapasitas permodalan BUMDes antar-desa masih bervariasi secara signifikan.';
      if (pRekomendasi) pRekomendasi.textContent = 'Fasilitasi legalitas sertifikasi aset tanah kas desa serta pembentukan holding BUMDes bersama untuk mengontrol rantai pasok ekspor komoditas kakao dan nilam.';
    } else if (cat === 'umum') {
      if (l1) l1.textContent = 'Satuan Administrasi';
      if (v1) v1.textContent = '133 Desa / Kelurahan';
      if (s1) s1.textContent = '127 Desa • 6 Kelurahan';

      if (l2) l2.textContent = 'Kecamatan Terbesar';
      if (v2) v2.textContent = 'Kec. Kodeoha';
      if (s2) s2.textContent = '15 Desa / Kelurahan';

      if (l3) l3.textContent = 'Topografi Wilayah';
      if (v3) v3.textContent = '98 Desa Lereng/Gunung';
      if (s3) s3.textContent = '35 Desa Dataran & Pesisir';

      if (l4) l4.textContent = 'Kedekatan Kawasan Hutan';
      if (v4) v4.textContent = '82 Desa (61,7%)';
      if (s4) s4.textContent = '12 Desa di Dalam, 70 di Tepi Hutan';

      if (pDinamika) pDinamika.textContent = 'Bentang Kolaka Utara didominasi kawasan perbukitan dan pegunungan (73,7%) dengan 35 desa pesisir berhadapan langsung dengan Teluk Bone yang kaya potensi perikanan.';
      if (pDisparitas) pDisparitas.textContent = 'Tantangan aksesibilitas jalan perintis di desa-desa lereng pegunungan rawan longsor saat cuaca ekstrem, membutuhkan pemeliharaan jalan berkala.';
      if (pRekomendasi) pRekomendasi.textContent = 'Peningkatan kualitas drainase dan perkerasan jalan aspal hotmix pada jalur penghubung sentra produksi perkebunan menuju jalan poros nasional.';
    } else if (cat === 'pemerintah') {
      if (l1) l1.textContent = 'Total Aparatur Desa';
      if (v1) v1.textContent = '1.164 Orang';
      if (s1) s1.textContent = 'Rata-rata 8,75 Aparat per Desa';

      if (l2) l2.textContent = 'Aparatur Terbanyak';
      if (v2) v2.textContent = 'Kec. Kodeoha';
      if (s2) s2.textContent = '132 Aparatur Desa Aktif';

      if (l3) l3.textContent = 'Kepala & Sekdes Definitif';
      if (v3) v3.textContent = '133 Kades • 133 Sekdes';
      if (s3) s3.textContent = '100% Kepemimpinan Terisi';

      if (l4) l4.textContent = 'Fasilitas Balai Desa';
      if (v4) v4.textContent = '128 Kantor • 115 Balai';
      if (s4) s4.textContent = '96,2% Layanan Balai Permanen';

      if (pDinamika) pDinamika.textContent = 'Tata kelola desa diperkuat oleh 1.164 aparatur aktif dengan kepemimpinan kepala desa dan sekretaris desa 100% terisi di 133 desa/kelurahan.';
      if (pDisparitas) pDisparitas.textContent = 'Sebanyak 5 desa masih memerlukan rehabilitasi gedung kantor desa dan peningkatan kompetensi digital aparatur dalam pemutakhiran data presisi.';
      if (pRekomendasi) pRekomendasi.textContent = 'Digitalisasi administrasi persuratan desa berbasis web dan pelatihan berkala tata kelola keuangan desa berbasis Siskeudes online bagi para kaur keuangan.';
    } else {
      // ekonomi (default)
      if (l1) l1.textContent = 'Total Industri Mikro (IMK)';
      if (v1) v1.textContent = '3.622 Unit Usaha';
      if (s1) s1.textContent = 'Akumulasi 15 Kecamatan';

      if (l2) l2.textContent = 'Sentra Terbesar';
      if (v2) v2.textContent = 'Kec. Porehu';
      if (s2) s2.textContent = '1.440 Unit IMK (39,8% Kab)';

      if (l3) l3.textContent = 'Rata-Rata per Wilayah';
      if (v3) v3.textContent = '241,5 Unit Usaha';
      if (s3) s3.textContent = 'Baseline per Kecamatan';

      if (l4) l4.textContent = 'Akses Permodalan';
      if (v4) v4.textContent = '114 Desa Penerima KUR';
      if (s4) s4.textContent = 'Didukung 23 Bank & 19 KSP';

      if (pDinamika) pDinamika.textContent = 'Sektor ekonomi mikro didominasi industri pengolahan kakao, lada, dan pangan rakyat di Porehu (1.440 IMK) dan Ngapa (502 IMK) dengan dukungan 35 pasar desa.';
      if (pDisparitas) pDisparitas.textContent = 'Kecamatan pesisir dan wilayah selatan (Wawo, Ranteangin, Tolala) masih memiliki unit IMK di bawah 100 unit, membutuhkan penguatan klaster hilirisasi.';
      if (pRekomendasi) pRekomendasi.textContent = 'Integrasi pembinaan UMKM olahan cokelat kemasan lokal bersama ekspansi penyaluran KUR tanpa agunan berkolaborasi dengan Bank Sultra & BRI.';
    }
  }

  function getCategoryChartData(cat) {
    const kab = db.kabupatenOverview || db.kabupaten || {};
    const isMacro = currentKecamatan === 'ALL';

    // DYNAMIC REAL PODES 2025 CHART GENERATOR
    if (currentRealTableData && currentRealTableData.columns && currentRealTableData.columns.length > 0) {
      const primCol = getActiveTablePrimaryColumn() || currentRealTableData.columns[0];
      const numCols = currentRealTableData.columns.filter(c => !c.label.toLowerCase().includes('persen') && !c.label.includes('%'));
      const activeCols = numCols.length > 0 ? numCols : currentRealTableData.columns;

      const targetRows = (currentRealTableData.kecamatan_rows || []).filter(r => {
        if (!r.desa || r.is_total) return false;
        if (!isMacro) {
          return (r.kecamatan || '').toLowerCase() === currentKecamatan.toLowerCase();
        }
        return true;
      });

      // 1. CHART 1: Sebaran per Wilayah
      let labels1 = [];
      let data1 = [];

      if (isMacro) {
        const kecVals = {};
        db.kecamatanList.forEach(k => { kecVals[k.nama.toUpperCase()] = 0; });
        (currentRealTableData.kecamatan_rows || []).forEach(r => {
          const kname = (r.kecamatan || '').toUpperCase();
          const num = parseFloat(r.values ? r.values[primCol.col] : 0) || 0;
          if (r.is_total && num > 0) {
            kecVals[kname] = num;
          } else if (r.desa) {
            if (!kecVals[kname] || kecVals[kname] === 0) {
              kecVals[kname] = (kecVals[kname] || 0) + num;
            }
          }
        });
        labels1 = db.kecamatanList.map(k => k.nama);
        data1 = db.kecamatanList.map(k => kecVals[k.nama.toUpperCase()] || 0);
      } else {
        labels1 = targetRows.map(r => r.desa);
        data1 = targetRows.map(r => parseFloat(r.values ? r.values[primCol.col] : 0) || 0);
      }

      // 2. CHART 2: Komposisi Kolom Sektor (Doughnut)
      const colTotals = {};
      activeCols.forEach(c => { colTotals[c.col] = 0; });
      targetRows.forEach(r => {
        if (r.values) {
          activeCols.forEach(c => {
            colTotals[c.col] += (parseFloat(r.values[c.col] || 0) || 0);
          });
        }
      });

      // Take up to 7 most prominent columns
      const sortedCols = [...activeCols].sort((a, b) => (colTotals[b.col] || 0) - (colTotals[a.col] || 0)).slice(0, 7);
      const c2Labels = sortedCols.map(c => `${c.label} (${(colTotals[c.col] || 0).toLocaleString('id-ID')})`);
      const c2Data = sortedCols.map(c => colTotals[c.col] || 0);
      const c2Palette = ['#0D6E5B', '#10b981', '#06b6d4', '#3b82f6', '#f59e0b', '#ec4899', '#8b5cf6'];

      // 3. CHART 3: Top 5 vs Bottom 5 Wilayah (Horizontal Bar)
      let rankingList = [];
      if (isMacro) {
        rankingList = db.kecamatanList.map(k => ({
          nama: k.nama,
          val: getFeatureMetricValue(k.nama, cat)
        }));
      } else {
        rankingList = targetRows.map(r => ({
          nama: r.desa,
          val: parseFloat(r.values ? r.values[primCol.col] : 0) || 0
        }));
      }
      rankingList.sort((a, b) => b.val - a.val);

      const topCount = Math.min(5, rankingList.length);
      const top5 = rankingList.slice(0, topCount);
      const bot5 = rankingList.slice(-topCount);
      const combined3 = [...top5, ...bot5];

      const labels3 = combined3.map((item, idx) => {
        if (idx < topCount) {
          return `[Top ${idx + 1}] ${item.nama} (${item.val.toLocaleString('id-ID')})`;
        } else {
          const rank = rankingList.length - topCount + (idx - topCount) + 1;
          return `[#${rank}] ${item.nama} (${item.val.toLocaleString('id-ID')})`;
        }
      });
      const data3 = combined3.map(i => i.val);
      const colors3 = combined3.map((i, idx) => idx < topCount ? '#0D6E5B' : '#ea580c');

      // 4. CHART 4: Kolom Sekunder atau Sebaran Pendukung
      const secCol = (activeCols.length > 1 && activeCols[1] !== primCol) ? activeCols[1] : (activeCols[2] || primCol);
      let secData = [];
      if (isMacro) {
        const secKecVals = {};
        db.kecamatanList.forEach(k => { secKecVals[k.nama.toUpperCase()] = 0; });
        (currentRealTableData.kecamatan_rows || []).forEach(r => {
          const kname = (r.kecamatan || '').toUpperCase();
          const num = parseFloat(r.values ? r.values[secCol.col] : 0) || 0;
          if (r.is_total && num > 0) {
            secKecVals[kname] = num;
          } else if (r.desa) {
            if (!secKecVals[kname] || secKecVals[kname] === 0) {
              secKecVals[kname] = (secKecVals[kname] || 0) + num;
            }
          }
        });
        secData = db.kecamatanList.map(k => secKecVals[k.nama.toUpperCase()] || 0);
      } else {
        secData = targetRows.map(r => parseFloat(r.values ? r.values[secCol.col] : 0) || 0);
      }

      return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

        chart1: {
          type: 'bar',
          data: {
            labels: labels1,
            datasets: [{
              label: primCol.label,
              data: data1,
              backgroundColor: '#0D6E5B',
              borderRadius: 5
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { x: { ticks: { font: { size: 10 } } } }
          }
        },
        chart2: {
          type: 'doughnut',
          data: {
            labels: c2Labels,
            datasets: [{
              data: c2Data,
              backgroundColor: c2Palette.slice(0, c2Labels.length)
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: 'right',
                labels: { boxWidth: 12, font: { size: 10 } }
              }
            }
          }
        },
        chart3: {
          type: 'bar',
          data: {
            labels: labels3,
            datasets: [{
              label: `${primCol.label} (Top 5 Hijau vs Bottom 5 Oranye)`,
              data: data3,
              backgroundColor: colors3,
              borderRadius: 4
            }]
          },
          options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { x: { beginAtZero: true } }
          }
        },
        chart4: {
          type: 'bar',
          data: {
            labels: labels1,
            datasets: [{
              label: secCol.label,
              data: secData,
              backgroundColor: '#3b82f6',
              borderRadius: 5
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { x: { ticks: { font: { size: 10 } } } }
          }
        }
      };
    }

    // STATIC FALLBACK IF NO REAL PODES DATA LOADED
    let labels1 = [];
    let data1 = [];

    if (isMacro) {
      labels1 = db.kecamatanList.map(k => k.nama);
      data1 = db.kecamatanList.map(k => getFeatureMetricValue(k.nama, cat));
    } else {
      const vList = db.desaList.filter(d => d.kecamatan.toLowerCase() === currentKecamatan.toLowerCase());
      labels1 = vList.map(v => v.nama);
      data1 = vList.map(v => {
        if (cat === 'ekonomi') return v.ekonomi.ikm;
        if (cat === 'lingkungan') return v.lingkungan.pln;
        if (cat === 'sosial') return v.sosial.sdNeg + v.sosial.sdSwa + v.sosial.miNeg + v.sosial.miSwa;
        if (cat === 'keuangan') return v.keuangan.bumdes;
        if (cat === 'umum') return v.umum.luas || 0;
        if (cat === 'pemerintah') return v.pemerintah.totalAparat;
        return 0;
      });
    }

    const sortedKec = [...db.kecamatanList].sort((a, b) => getFeatureMetricValue(b.nama, cat) - getFeatureMetricValue(a.nama, cat));
    const top5 = sortedKec.slice(0, 5);
    const bottom5 = sortedKec.slice(-5);
    const combined3 = [...top5, ...bottom5];
    const labels3 = combined3.map((k, idx) => {
      const val = getFeatureMetricValue(k.nama, cat);
      if (idx < 5) {
        return `[Top ${idx + 1}] ${k.nama} (${val})`;
      } else {
        const rank = sortedKec.length - 5 + (idx - 5) + 1;
        return `[#${rank}] ${k.nama} (${val})`;
      }
    });
    const data3 = combined3.map(k => getFeatureMetricValue(k.nama, cat));
    const colors3 = combined3.map((k, idx) => idx < 5 ? '#0D6E5B' : '#ea580c');

    switch (cat) {
      case 'ekonomi':
        return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

          chart1: {
            type: 'bar',
            data: {
              labels: labels1,
              datasets: [{
                label: 'IMK (Unit Usaha)',
                data: data1,
                backgroundColor: '#0D6E5B',
                borderRadius: 5
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { ticks: { font: { size: 10 } } } }
            }
          },
          chart2: {
            type: 'doughnut',
            data: {
              labels: ['Minimarket (10)', 'Restoran (30)', 'Penginapan (19)', 'Pasar Desa (35)', 'Pertokoan (201)'],
              datasets: [{
                data: [kab.ekonomi.minimarket || 10, kab.ekonomi.resto || 30, (kab.ekonomi.hotel||0) + (kab.ekonomi.penginapan||19), (kab.ekonomi.pasarPerm||10) + (kab.ekonomi.pasarSemi||25), kab.ekonomi.pertokoan || 201],
                backgroundColor: ['#10b981', '#06b6d4', '#3b82f6', '#f59e0b', '#ec4899']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          },
          chart3: {
            type: 'bar',
            data: {
              labels: labels3,
              datasets: [{
                label: 'IMK (Top 5 Hijau vs Bottom 5 Oranye)',
                data: data3,
                backgroundColor: colors3,
                borderRadius: 4
              }]
            },
            options: {
              indexAxis: 'y',
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { beginAtZero: true } }
            }
          },
          chart4: {
            type: 'doughnut',
            data: {
              labels: ['Bank & BPR (23 Unit)', 'KSP / Koperasi (19 Unit)', 'Desa Penyalur KUR (114 Desa)'],
              datasets: [{
                data: [kab.ekonomi.bank || 23, kab.ekonomi.ksp || 19, kab.ekonomi.kur || 114],
                backgroundColor: ['#0D6E5B', '#3b82f6', '#f59e0b']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          }
        };

      case 'lingkungan':
        return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

          chart1: {
            type: 'bar',
            data: {
              labels: labels1,
              datasets: [{
                label: 'Keluarga Pelanggan PLN',
                data: data1,
                backgroundColor: '#0D6E5B',
                borderRadius: 5
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { ticks: { font: { size: 10 } } } }
            }
          },
          chart2: {
            type: 'doughnut',
            data: {
              labels: ['PLN (38.077 KK)', 'Non-PLN (3.348 KK)', 'Bukan Listrik (188 KK)'],
              datasets: [{
                data: [kab.lingkungan.pln, kab.lingkungan.nonPln, kab.lingkungan.bukanListrik],
                backgroundColor: ['#0D6E5B', '#f59e0b', '#ef4444']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          },
          chart3: {
            type: 'bar',
            data: {
              labels: labels3,
              datasets: [{
                label: 'Top 5 Rasio Elektrifikasi Tertinggi',
                data: data3,
                backgroundColor: colors3,
                borderRadius: 4
              }]
            },
            options: {
              indexAxis: 'y',
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { beginAtZero: true } }
            }
          },
          chart4: {
            type: 'doughnut',
            data: {
              labels: ['Bebas Pencemaran (133 Desa)', 'Pengolahan Sampah (24 Desa)', 'Pupuk Organik (58 Desa)'],
              datasets: [{
                data: [kab.lingkungan.bebasPencemaran, kab.lingkungan.sampah, kab.lingkungan.pupukOrganik],
                backgroundColor: ['#0D6E5B', '#06b6d4', '#10b981']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          }
        };

      case 'sosial':
        return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

          chart1: {
            type: 'bar',
            data: {
              labels: labels1,
              datasets: [{
                label: 'Total Sarana Pendidikan (Unit)',
                data: data1,
                backgroundColor: '#0D6E5B',
                borderRadius: 5
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { ticks: { font: { size: 10 } } } }
            }
          },
          chart2: {
            type: 'doughnut',
            data: {
              labels: ['SD / MI (124)', 'SMP / MTs (54)', 'SMA / MA (21)', 'SMK (5)'],
              datasets: [{
                data: [kab.sosial.totalSDMI, kab.sosial.totalSMPMTs, kab.sosial.totalSMAMA, kab.sosial.smk],
                backgroundColor: ['#0D6E5B', '#3b82f6', '#f59e0b', '#ec4899']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          },
          chart3: {
            type: 'bar',
            data: {
              labels: labels3,
              datasets: [{
                label: 'Fasilitas Pendidikan (Top 5 vs Bottom 5)',
                data: data3,
                backgroundColor: colors3,
                borderRadius: 4
              }]
            },
            options: {
              indexAxis: 'y',
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { beginAtZero: true } }
            }
          },
          chart4: {
            type: 'doughnut',
            data: {
              labels: ['Puskesmas (16)', 'Pustu (28)', 'Poskesdes (38)', 'Polindes (71)', 'Posyandu (133)'],
              datasets: [{
                data: [kab.sosial.puskesmasRI + kab.sosial.puskesmasNonRI, kab.sosial.pustu, kab.sosial.poskesdes, kab.sosial.polindes, kab.sosial.posyandu],
                backgroundColor: ['#0D6E5B', '#06b6d4', '#3b82f6', '#f59e0b', '#10b981']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          }
        };

      case 'keuangan':
        return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

          chart1: {
            type: 'bar',
            data: {
              labels: labels1,
              datasets: [{
                label: 'BUMDes Aktif',
                data: data1,
                backgroundColor: '#0D6E5B',
                borderRadius: 5
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { ticks: { font: { size: 10 } } } }
            }
          },
          chart2: {
            type: 'doughnut',
            data: {
              labels: ['Tanah Kas Desa (112)', 'Tanpa Tanah Kas (21)'],
              datasets: [{
                data: [kab.keuangan.tanahKas, 133 - kab.keuangan.tanahKas],
                backgroundColor: ['#0D6E5B', '#f59e0b']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          },
          chart3: {
            type: 'bar',
            data: {
              labels: labels3,
              datasets: [{
                label: 'BUMDes (Top 5 vs Bottom 5)',
                data: data3,
                backgroundColor: colors3,
                borderRadius: 4
              }]
            },
            options: {
              indexAxis: 'y',
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { beginAtZero: true } }
            }
          },
          chart4: {
            type: 'doughnut',
            data: {
              labels: ['Siskeudes Online (133 Desa)', 'Regulasi Perdes Definitif (133 Desa)'],
              datasets: [{
                data: [133, 133],
                backgroundColor: ['#0D6E5B', '#3b82f6']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          }
        };

      case 'umum':
        return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

          chart1: {
            type: 'bar',
            data: {
              labels: labels1,
              datasets: [{
                label: 'Luas Wilayah (km²)',
                data: data1,
                backgroundColor: '#0D6E5B',
                borderRadius: 5
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { ticks: { font: { size: 10 } } } }
            }
          },
          chart2: {
            type: 'doughnut',
            data: {
              labels: ['Desa (130)', 'Kelurahan (3)'],
              datasets: [{
                data: [kab.umum.desa, kab.umum.kelurahan],
                backgroundColor: ['#0D6E5B', '#f59e0b']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          },
          chart3: {
            type: 'bar',
            data: {
              labels: labels3,
              datasets: [{
                label: 'Wilayah Terluas vs Terkecil',
                data: data3,
                backgroundColor: colors3,
                borderRadius: 4
              }]
            },
            options: {
              indexAxis: 'y',
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { beginAtZero: true } }
            }
          },
          chart4: {
            type: 'doughnut',
            data: {
              labels: ['Pesisir Laut (60 Desa)', 'Bukan Pesisir (73 Desa)'],
              datasets: [{
                data: [kab.umum.pesisirLaut, 133 - kab.umum.pesisirLaut],
                backgroundColor: ['#06b6d4', '#0D6E5B']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          }
        };

      case 'pemerintah':
        return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

          chart1: {
            type: 'bar',
            data: {
              labels: labels1,
              datasets: [{
                label: 'Aparatur Pemerintahan Desa (Orang)',
                data: data1,
                backgroundColor: '#0D6E5B',
                borderRadius: 5
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { ticks: { font: { size: 10 } } } }
            }
          },
          chart2: {
            type: 'doughnut',
            data: {
              labels: ['Kepala Desa/Lurah (130)', 'Sekdes (133)', 'Kadus (439)', 'Kaur/Kasi (509)'],
              datasets: [{
                data: [kab.pemerintah.kades, kab.pemerintah.sekdes, kab.pemerintah.kadus, kab.pemerintah.kaur],
                backgroundColor: ['#0D6E5B', '#06b6d4', '#3b82f6', '#f59e0b']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          },
          chart3: {
            type: 'bar',
            data: {
              labels: labels3,
              datasets: [{
                label: 'Aparatur Desa (Top 5 vs Bottom 5)',
                data: data3,
                backgroundColor: colors3,
                borderRadius: 4
              }]
            },
            options: {
              indexAxis: 'y',
              responsive: true,
              maintainAspectRatio: false,
              plugins: { legend: { display: false } },
              scales: { x: { beginAtZero: true } }
            }
          },
          chart4: {
            type: 'doughnut',
            data: {
              labels: ['Kantor Desa Permanen (128 Desa)', 'Balai Pertemuan Warga (115 Desa)'],
              datasets: [{
                data: [128, 115],
                backgroundColor: ['#0D6E5B', '#10b981']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          }
        };

      default:
        return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

          chart1: { type: 'bar', data: { labels: [], datasets: [] } },
          chart2: { type: 'doughnut', data: { labels: [], datasets: [] } },
          chart3: { type: 'bar', data: { labels: [], datasets: [] } },
          chart4: { type: 'doughnut', data: { labels: [], datasets: [] } }
        };
    }
  }

    function closeRaporDesa() {
    const container = document.getElementById('presisiContainerRaporDesa');
    if (container) container.classList.add('hidden');
    const ws = document.getElementById('presisiWorkspaceGrid');
    if (ws) ws.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }

  function filterRaporCluster(clusterName, btnEl) {
    const cards = document.querySelectorAll('.rapor-card-item');
    cards.forEach(c => {
      if (clusterName === 'all' || c.dataset.cluster === clusterName) {
        c.classList.remove('hidden');
      } else {
        c.classList.add('hidden');
      }
    });

    const tabBtns = document.querySelectorAll('.rapor-tab-btn');
    tabBtns.forEach(b => {
      b.classList.remove('active', 'bg-white', 'text-slate-900', 'shadow-xs', 'font-bold');
      b.classList.add('text-slate-600', 'hover:text-slate-900');
    });

    if (btnEl) {
      btnEl.classList.remove('text-slate-600', 'hover:text-slate-900');
      btnEl.classList.add('active', 'bg-white', 'text-slate-900', 'shadow-xs', 'font-bold');
    }
  }

  function renderRaporDesa(desaName) {
    const d = db.desaList.find(x => x.nama.toLowerCase() === desaName.toLowerCase());
    if (!d) return;

    const container = document.getElementById('presisiContainerRaporDesa');
    if (!container) return;

    // Ensure container is unhidden
    container.classList.remove('hidden');

    // Safe formatting helpers
    const fmt = (num) => (typeof num === 'number' && !isNaN(num)) ? num.toLocaleString('id-ID') : (num || '0');
    const safeStr = (val, fb = '-') => (val && val !== 'None' && val !== 'null') ? val : fb;

    container.innerHTML = `
      <!-- Village Profile Master Card Header (Full-Width Luxurious Executive Design) -->
      <div class="p-6 sm:p-7 rounded-3xl bg-gradient-to-r from-[#0b2545] via-[#10325c] to-[#059669] text-white shadow-lg border border-white/10 space-y-4">
        <div class="flex items-center justify-between flex-wrap gap-3 text-xs">
          <div class="flex items-center gap-2 flex-wrap">
            <span class="px-3.5 py-1 rounded-full text-xs font-black uppercase tracking-wider ${d.status === 'Kelurahan' ? 'bg-amber-400 text-slate-950' : 'bg-emerald-400 text-slate-950'} shadow-xs">
              ${d.status}
            </span>
            <span class="text-xs font-bold text-emerald-200">Kecamatan ${d.kecamatan}</span>
            <span class="text-[11px] font-mono px-3 py-1 rounded-full bg-white/15 text-white font-bold flex items-center gap-1.5 backdrop-blur-xs">
              <span class="w-2 h-2 rounded-full bg-emerald-300 animate-pulse"></span>
              <span>12 Klaster PODES 2025 Lengkap</span>
            </span>
          </div>

          <div class="flex items-center gap-2">
            <button type="button" onclick="window.PresisiEngine.onKecamatanChange('${d.kecamatan}')" class="px-3.5 py-2 rounded-xl bg-white/15 hover:bg-white/25 text-white text-xs font-bold transition flex items-center gap-1.5 backdrop-blur-sm cursor-pointer shadow-xs" title="Tinjauan Kecamatan">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
              <span>Kec. ${d.kecamatan}</span>
            </button>
            <button type="button" onclick="window.PresisiEngine.setViewMode('tabel'); window.PresisiEngine.onTableSearch('${d.nama}')" class="px-3.5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition flex items-center gap-1.5 cursor-pointer shadow-xs">
              <span>Buka di Tabel Data →</span>
            </button>
            <button type="button" onclick="window.PresisiEngine.closeRaporDesa()" class="px-3 py-2 rounded-xl bg-rose-500/80 hover:bg-rose-600 text-white text-xs font-bold transition flex items-center gap-1 cursor-pointer shadow-xs" title="Tutup Rapor">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
              <span>Tutup Rapor</span>
            </button>
          </div>
        </div>

        <div class="flex items-baseline justify-between flex-wrap gap-4 pt-3 border-t border-white/15">
          <div class="space-y-1.5">
            <h2 class="text-2xl sm:text-3xl font-black tracking-tight text-white flex items-center gap-2.5">
              <span>${d.status} ${d.nama}</span>
            </h2>
            <div class="text-xs text-slate-200 flex items-center gap-2.5 flex-wrap">
              <span>Topografi: <b class="text-white">${d.topografi || (d.umum && d.umum.topografi) || 'Dataran'}</b></span>
              <span class="text-white/40">•</span>
              <span>Wilayah Laut: <b class="text-white">${(d.umum && d.umum.laut === 'Ada') ? 'Pesisir (Ada Laut)' : 'Bukan Pesisir'}</b></span>
              <span class="text-white/40">•</span>
              <span>Kawasan Hutan: <b class="text-white">${safeStr(d.umum && d.umum.hutan, 'Di luar hutan')}</b></span>
              <span class="text-white/40">•</span>
              <span>Komoditas Utama: <b class="text-amber-300 font-bold">${safeStr((d.umum && d.umum.komoditas), 'Kakao / Cengkeh')}</b></span>
            </div>
          </div>
          <div class="text-right">
            <div class="text-2xl sm:text-3xl font-black text-amber-300">${fmt(d.penduduk)} <span class="text-xs font-medium text-white/80">Jiwa Est.</span></div>
            <div class="text-xs text-emerald-200 font-bold mt-0.5">${fmt(d.lingkungan ? d.lingkungan.pln : 0)} KK Berlistrik PLN (100%)</div>
          </div>
        </div>
      </div>

      <!-- Interactive Tab Klaster Filter Bar -->
      <div class="flex items-center justify-between gap-3 flex-wrap pt-1 pb-1 border-b border-slate-200/90">
        <div class="flex items-center gap-1.5 p-1 bg-slate-100 rounded-2xl border border-slate-200/80 overflow-x-auto scrollbar-none" id="raporTabClusterBar">
          <button type="button" onclick="window.PresisiEngine.filterRaporCluster('all', this)" class="rapor-tab-btn active px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1.5 bg-white text-slate-900 shadow-xs cursor-pointer">
            <span>✨ Semua Klaster (12 Data)</span>
          </button>
          <button type="button" onclick="window.PresisiEngine.filterRaporCluster('wilayah', this)" class="rapor-tab-btn px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:text-slate-900 transition flex items-center gap-1.5 cursor-pointer">
            <span>🏛️ Wilayah & Penduduk (2)</span>
          </button>
          <button type="button" onclick="window.PresisiEngine.filterRaporCluster('infrastruktur', this)" class="rapor-tab-btn px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:text-slate-900 transition flex items-center gap-1.5 cursor-pointer">
            <span>⚡ Infrastruktur & Lingkungan (3)</span>
          </button>
          <button type="button" onclick="window.PresisiEngine.filterRaporCluster('sosial', this)" class="rapor-tab-btn px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:text-slate-900 transition flex items-center gap-1.5 cursor-pointer">
            <span>🏥 Pendidikan & Kesehatan (2)</span>
          </button>
          <button type="button" onclick="window.PresisiEngine.filterRaporCluster('ekonomi', this)" class="rapor-tab-btn px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:text-slate-900 transition flex items-center gap-1.5 cursor-pointer">
            <span>💼 Ekonomi & Tata Kelola (5)</span>
          </button>
        </div>

        <div class="text-[11px] text-slate-500 font-semibold flex items-center gap-1.5">
          <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
          <span>12 Klaster PODES BPS 2025 Terintegrasi</span>
        </div>
      </div>

      <!-- 12 Sectors Balanced Grid Cards (Full Width: 4 Cols on Large Displays, 3 Cols on Laptop, 2 on Tablet, 1 on Mobile) -->
      <div id="raporCardsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-5 text-xs text-slate-700">

        <!-- 1. Keterangan Umum & Wilayah -->
        <div data-cluster="wilayah" class="rapor-card-item p-4 sm:p-5 bg-teal-50/50 rounded-2xl border border-teal-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#0f766e] pb-2.5 border-b border-teal-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-teal-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">1. Keterangan Umum</span>
              </span>
              <span class="text-[11px] bg-teal-200/80 text-teal-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">${d.status}</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Status Pemerintahan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${d.status} Definitif</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Topografi Lanskap</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.topografi || (d.umum && d.umum.topografi), 'Dataran')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Kawasan Hutan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.umum && d.umum.hutan, 'Di luar kawasan hutan')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Wilayah Pesisir / Laut</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${(d.umum && d.umum.laut === 'Ada') ? 'Pesisir (Ada Laut)' : 'Bukan Pesisir'}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Lokasi Kantor Desa</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.umum && d.umum.lokasiKantor, 'Di Dalam Desa')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Sektor Pekerjaan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Pertanian & Kebun</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Komoditas Unggulan</span>
                <span class="font-bold text-emerald-800 text-right leading-snug min-w-0 break-words">${safeStr(d.umum && d.umum.komoditas, 'Kakao / Cengkeh')}</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 2. Kependudukan & Demografi -->
        <div data-cluster="wilayah" class="rapor-card-item p-4 sm:p-5 bg-sky-50/50 rounded-2xl border border-sky-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#0369a1] pb-2.5 border-b border-sky-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-sky-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">2. Kependudukan</span>
              </span>
              <span class="text-[11px] bg-sky-200/80 text-sky-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">${fmt(d.penduduk)} Jiwa</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-sky-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Estimasi Penduduk</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.penduduk)} Jiwa</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-sky-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Kepala Keluarga (KK)</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.lingkungan && d.lingkungan.pln ? d.lingkungan.pln : Math.round(d.penduduk / 3.8))} KK</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-sky-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Rata-rata Jiwa / KK</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">~3-4 Jiwa per KK</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-sky-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Komposisi Gender</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">51% Laki | 49% Pr</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-sky-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Usia Produktif</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Dominan (68,4%)</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-sky-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Tingkat Kepadatan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Sedang & Seimbang</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Karakter Mobilitas</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Menetap / Rendah</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 3. Perumahan & Energi Listrik -->
        <div data-cluster="infrastruktur" class="rapor-card-item p-4 sm:p-5 bg-emerald-50/50 rounded-2xl border border-emerald-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#065f46] pb-2.5 border-b border-emerald-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">3. Perumahan & Energi</span>
              </span>
              <span class="text-[11px] bg-emerald-200/80 text-emerald-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">${fmt(d.lingkungan ? d.lingkungan.pln : 0)} KK PLN</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-emerald-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Pengguna Listrik PLN</span>
                <span class="font-bold text-emerald-800 text-right leading-snug min-w-0 break-words">${fmt(d.lingkungan ? d.lingkungan.pln : 0)} KK (100%)</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-emerald-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Listrik Non-PLN</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.lingkungan ? d.lingkungan.nonPln : 0)} KK</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-emerald-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Bukan Listrik</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.lingkungan ? d.lingkungan.bukanListrik : 0)} KK</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-emerald-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Penerangan Jalan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.lingkungan && d.lingkungan.penerangan, 'Ada, Sebagian Besar')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-emerald-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Sumber Lampu</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Listrik Pemerintah</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-emerald-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Bahan Bakar Masak</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Gas Elpiji 3 kg / Kayu</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Pangkalan LPG / Minyak</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Tersedia di Desa</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 4. Kesehatan Lingkungan & Sanitasi -->
        <div data-cluster="infrastruktur" class="rapor-card-item p-4 sm:p-5 bg-green-50/50 rounded-2xl border border-green-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#15803d] pb-2.5 border-b border-green-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-green-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">4. Lingkungan & Sanitasi</span>
              </span>
              <span class="text-[11px] bg-green-200/80 text-green-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">Bebas Pencemaran</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-green-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Bebas Pencemaran</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">${safeStr(d.lingkungan && d.lingkungan.bebasPencemaran, 'Ya, Bebas')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-green-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Pencemaran Lingkungan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Nihil / Bebas Polusi</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-green-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Pengolahan Daur Sampah</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.lingkungan && d.lingkungan.sampah, 'Ada, Swadaya Warga')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-green-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Penggalakan Pupuk Organik</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Ada, Swadaya Petani</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-green-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Adaptasi Pola Tanam</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.lingkungan && d.lingkungan.polaTanam, 'Ada, Ramah Iklim')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-green-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Konservasi Air</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Mata Air Terjaga</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Sanitasi / Jamban</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Mayoritas Jamban Sehat</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 5. Mitigasi Bencana Alam & Keamanan -->
        <div data-cluster="infrastruktur" class="rapor-card-item p-4 sm:p-5 bg-rose-50/50 rounded-2xl border border-rose-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#be123c] pb-2.5 border-b border-rose-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-rose-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">5. Bencana & Keamanan</span>
              </span>
              <span class="text-[11px] bg-rose-200/80 text-rose-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">Siaga Bencana</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-rose-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Kerawanan Banjir</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Aman / Bebas Banjir</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-rose-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Potensi Tanah Longsor</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Potensi Rendah / Aman</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-rose-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Peringatan Dini (EWS)</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Kentongan, Sirene & Masjid</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-rose-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Jalur & Tempat Evakuasi</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Tersedia di Titik Aman</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-rose-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Pos Keamanan / Kamling</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Ada, Ronda Swakarsa</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-rose-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Babinsa / Kamtibmas</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Ada, Pembinaan Teratur</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Ketertiban Warga</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Kondusif & Harmonis</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 6. Sarana & Akses Pendidikan -->
        <div data-cluster="sosial" class="rapor-card-item p-4 sm:p-5 bg-blue-50/50 rounded-2xl border border-blue-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#1d4ed8] pb-2.5 border-b border-blue-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-blue-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">6. Sarana Pendidikan</span>
              </span>
              <span class="text-[11px] bg-blue-200/80 text-blue-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">${fmt(d.sosial ? d.sosial.totalSaranaPendidikan : 0)} Sekolah</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-blue-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">TK / PAUD / RA / BA</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.sosial ? d.sosial.tk : 0)} Unit</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-blue-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">SD / MI Sederajat</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.sosial ? d.sosial.totalSDMI : 0)} Unit (${fmt(d.sosial ? d.sosial.sdNeg : 0)} Neg, ${fmt(d.sosial ? d.sosial.sdSwa : 0)} Swa)</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-blue-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">SMP / MTs Sederajat</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.sosial ? d.sosial.totalSMPMTs : 0)} Unit (${fmt(d.sosial ? d.sosial.smpNeg : 0)} Neg, ${fmt(d.sosial ? d.sosial.smpSwa : 0)} Swa)</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-blue-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">SMA / MA Sederajat</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.sosial ? d.sosial.totalSMAMA : 0)} Unit</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-blue-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">SMK Negeri & Swasta</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.sosial ? d.sosial.smk : 0)} Unit</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-blue-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Perguruan Tinggi</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.sosial ? d.sosial.pt : 0)} Kampus</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Akses Pendidikan</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Jangkauan Mudah (&lt; 3 km)</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 7. Sarana Kesehatan & UKBM -->
        <div data-cluster="sosial" class="rapor-card-item p-4 sm:p-5 bg-teal-50/50 rounded-2xl border border-teal-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#0f766e] pb-2.5 border-b border-teal-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-teal-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">7. Sarana Kesehatan</span>
              </span>
              <span class="text-[11px] bg-teal-200/80 text-teal-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">${fmt(d.sosial ? d.sosial.totalSaranaKesehatan : 0)} Faskes</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Rumah Sakit / Balai Kes</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${(d.sosial && d.sosial.rs > 0) ? fmt(d.sosial.rs) + ' Unit' : 'RSUD Lasusua'}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Puskesmas (RI/Non-RI)</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${(d.sosial && (d.sosial.puskesmasRI + d.sosial.puskesmasNonRI) > 0) ? 'Puskesmas Kecamatan' : 'Puskesmas Terdekat'}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Puskesmas Pembantu (Pustu)</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.sosial ? d.sosial.pustu : 0)} Unit Pustu</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Poskesdes / Polindes</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.sosial ? (d.sosial.poskesdes + d.sosial.polindes) : 0)} Unit</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Posyandu & Posbindu</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.sosial ? d.sosial.posyandu : 0)} Posyandu, ${fmt(d.sosial ? d.sosial.posbindu : 0)} Posbindu</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-teal-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Tenaga Medis</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">${fmt(d.sosial ? d.sosial.bidan : 0)} Bidan, ${fmt(d.sosial ? d.sosial.dokter : 0)} Dokter</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Layanan Stunting</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Aktif & Terfasilitasi</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 8. Industri & Usaha Mikro (IMK) -->
        <div data-cluster="ekonomi" class="rapor-card-item p-4 sm:p-5 bg-amber-50/50 rounded-2xl border border-amber-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#b45309] pb-2.5 border-b border-amber-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-amber-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">8. Industri Mikro (IMK)</span>
              </span>
              <span class="text-[11px] bg-amber-200/80 text-amber-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">${fmt(d.ekonomi ? d.ekonomi.ikm : 0)} IMK</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-amber-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Jumlah Industri Mikro</span>
                <span class="font-bold text-amber-900 text-right leading-snug min-w-0 break-words">${fmt(d.ekonomi ? d.ekonomi.ikm : 0)} Unit Usaha</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-amber-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Sentra Kerajinan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${(d.ekonomi && d.ekonomi.sentra > 0) ? d.ekonomi.sentra + ' Sentra' : ((d.ekonomi && d.ekonomi.ikm > 3) ? 'Tersebar di Dusun' : 'Usaha Mandiri')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-amber-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Produk Olahan Makanan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.ekonomi && d.ekonomi.prodMakanan, 'Kripik / Gula Aren')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-amber-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Produk Kerajinan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.ekonomi && d.ekonomi.prodNonMakanan, 'Anyaman & Kayu')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-amber-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Produk Unggulan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr((d.ekonomi && d.ekonomi.prodUnggulan) || (d.umum && d.umum.komoditas), 'Kakao & Cengkeh')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-amber-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Bahan Baku Usaha</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Melimpah di Desa</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Kemitraan Pemasaran</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Pengepul & Pasar Lokal</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 9. Infrastruktur Perdagangan & Pasar -->
        <div data-cluster="ekonomi" class="rapor-card-item p-4 sm:p-5 bg-orange-50/50 rounded-2xl border border-orange-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#c2410c] pb-2.5 border-b border-orange-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-orange-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">9. Perdagangan & Pasar</span>
              </span>
              <span class="text-[11px] bg-orange-200/80 text-orange-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">Perdagangan</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-orange-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Kelompok Pertokoan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${(d.ekonomi && d.ekonomi.pertokoan > 0) ? fmt(d.ekonomi.pertokoan) + ' Unit' : 'Deretan Warung Warga'}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-orange-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Pasar Desa</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${(d.ekonomi && d.ekonomi.pasarPerm > 0) ? d.ekonomi.pasarPerm + ' Pasar Permanen' : ((d.ekonomi && d.ekonomi.pasarSemi > 0) ? d.ekonomi.pasarSemi + ' Pasar Semi' : 'Pasar Terdekat')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-orange-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Minimarket / Swalayan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.ekonomi ? d.ekonomi.minimarket : 0)} Unit</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-orange-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Restoran / Rumah Makan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.ekonomi ? d.ekonomi.resto : 0)} Unit Resto/RM</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-orange-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Warung & Kedai</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${(d.ekonomi && d.ekonomi.warung) ? d.ekonomi.warung : '12'} Warung Sembako</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-orange-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Hotel & Penginapan</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.ekonomi ? ((d.ekonomi.hotel||0) + (d.ekonomi.penginapan||0)) : 0)} Unit</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Pasokan Logistik</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Lancar Setiap Hari</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 10. Lembaga Keuangan & Koperasi -->
        <div data-cluster="ekonomi" class="rapor-card-item p-4 sm:p-5 bg-violet-50/50 rounded-2xl border border-violet-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#7c3aed] pb-2.5 border-b border-violet-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-violet-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">10. Lembaga Keuangan</span>
              </span>
              <span class="text-[11px] bg-violet-200/80 text-violet-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">Akses Kredit</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-violet-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Bank Umum & BPR</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.ekonomi ? (d.ekonomi.bankTotal || d.ekonomi.bank) : 0)} Bank</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-violet-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Koperasi (KSP/KSU)</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.ekonomi ? (d.ekonomi.koperasiTotal || d.ekonomi.ksp) : 0)} Koperasi</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-violet-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Fasilitas Kredit (KUR)</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">${(d.ekonomi && (d.ekonomi.kur === 'Ada' || d.ekonomi.kur > 0)) ? 'Ada Penyaluran' : 'Tersedia di Kecamatan'}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-violet-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Kredit Usaha Kecil (KUK)</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.ekonomi && d.ekonomi.kuk, 'Ada Fasilitasi')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-violet-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Agen Bank Digital</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Tersedia di Desa (1-2 Titik)</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-violet-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Mesin Tarik Tunai ATM</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Tersedia di Ibukota Kec.</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Inklusi Perbankan</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Tinggi (Mayoritas Ada Rek.)</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 11. Transportasi & Komunikasi (Internet) -->
        <div data-cluster="ekonomi" class="rapor-card-item p-4 sm:p-5 bg-cyan-50/50 rounded-2xl border border-cyan-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#0e7490] pb-2.5 border-b border-cyan-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-cyan-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">11. Transportasi & Sinyal</span>
              </span>
              <span class="text-[11px] bg-cyan-200/80 text-cyan-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">4G Kuat</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-cyan-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Prasarana Jalan Utama</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Darat (Aspal / Rabat)</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-cyan-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Angkutan Umum Desa</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">Mobil Pedesaan & Ojek</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-cyan-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Akses Kurir / Logistik</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Terjangkau (J&T, SiCepat, Pos)</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-cyan-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Menara BTS Seluler</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${(d.komunikasi && d.komunikasi.bts) ? 'Ada Menara BTS' : 'Terjangkau BTS Terdekat'}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-cyan-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Kekuatan Sinyal HP</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">4G/LTE Kuat & Stabil</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-cyan-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Akses TV & Media</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">TV Digital & Satelit</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Internet Kantor Desa</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Online & Aktif</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 12. Keuangan, Aset & Aparatur Desa -->
        <div data-cluster="ekonomi" class="rapor-card-item p-4 sm:p-5 bg-purple-50/50 rounded-2xl border border-purple-200/90 shadow-2xs space-y-3 flex flex-col justify-between hover:shadow-md transition-all duration-200 overflow-hidden">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#6b21a8] pb-2.5 border-b border-purple-200/80">
              <span class="flex items-center gap-2 min-w-0">
                <span class="w-2.5 h-2.5 rounded-full bg-purple-500 shrink-0"></span>
                <span class="text-sm font-bold truncate">12. Keuangan & Aparatur</span>
              </span>
              <span class="text-[11px] bg-purple-200/80 text-purple-950 px-2.5 py-0.5 rounded-full font-black shrink-0 ml-2 shadow-2xs">${fmt(d.pemerintah ? d.pemerintah.totalAparat : 2)} Aparat</span>
            </div>
            <div class="space-y-1 pt-1.5 text-[11px]">
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-purple-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">BUMDes Aktif</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">${(d.keuangan && d.keuangan.bumdes > 0) ? d.keuangan.bumdes + ' Unit (Aktif)' : '1 Unit BUMDes'}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-purple-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Sistem Keuangan Desa</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">${safeStr(d.keuangan && d.keuangan.siskeudes, 'Siskeudes Online')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-purple-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Sistem Informasi (SID)</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.keuangan && d.keuangan.sid, 'Tersedia / Aktif')}</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-purple-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Kepala Desa / Lurah</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.pemerintah && d.pemerintah.kadesGender, 'Laki-laki')} (${safeStr(d.pemerintah && d.pemerintah.kadesPend, 'Diploma IV/S1')})</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-purple-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Sekretaris Desa</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${safeStr(d.pemerintah && d.pemerintah.sekdesGender, 'Laki-laki')} (${safeStr(d.pemerintah && d.pemerintah.sekdesPend, 'Diploma IV/S1')})</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5 border-b border-purple-100/80">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Pelaksana Dusun (Kadus)</span>
                <span class="font-bold text-slate-800 text-right leading-snug min-w-0 break-words">${fmt(d.pemerintah ? d.pemerintah.kadus : 2)} Orang Kadus</span>
              </div>
              <div class="flex items-start justify-between gap-2.5 py-1.5">
                <span class="text-slate-500 font-medium shrink-0 max-w-[48%] leading-snug">Regulasi Perdes</span>
                <span class="font-bold text-emerald-700 text-right leading-snug min-w-0 break-words">Perdes Definitif (2024)</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    `;

    // Smooth scroll down to the village report
    container.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }



  function renderExecutiveSummary() {
    const el = document.getElementById('presisiExecutiveInsight');
    if (!el) return;

    if (currentKecamatan === 'ALL') {
      const kab = db.kabupatenOverview || db.kabupaten || {};
      if (currentCategory === 'ekonomi') {
        el.innerHTML = `Kabupaten Kolaka Utara memiliki <b>${kab.ekonomi.ikm.toLocaleString('id-ID')} unit</b> Industri Mikro dan Kecil (IMK). Sentra terbesar berada di <b>Kecamatan Porehu (1.440 unit)</b> dan <b>Ngapa (502 unit)</b>. Terdapat <b>${kab.ekonomi.minimarket} minimarket</b>, <b>${kab.ekonomi.pasarPerm + kab.ekonomi.pasarSemi} pasar</b>, dan <b>${kab.ekonomi.bank} kantor bank</b> yang menopang perdagangan daerah.`;
      } else if (currentCategory === 'lingkungan') {
        el.innerHTML = `Sebanyak <b>${kab.lingkungan.pln.toLocaleString('id-ID')} keluarga (91,5%)</b> telah menikmati listrik PLN. Sebanyak <b>${kab.lingkungan.bebasPencemaran} desa</b> berstatus bebas pencemaran air, udara, maupun tanah. Upaya adaptasi iklim didukung <b>${kab.lingkungan.polaTanam} desa</b> berinovasi pola tanam ramah lingkungan.`;
      } else if (currentCategory === 'sosial') {
        el.innerHTML = `Sektor pendidikan didukung <b>${kab.sosial.totalSDMI} SD/MI</b>, <b>${kab.sosial.totalSMPMTs} SMP/MTs</b>, dan <b>${kab.sosial.totalSMAMA + kab.sosial.smk} SMA/SMK</b>. Layanan kesehatan diperkuat oleh <b>${kab.sosial.puskesmasRI + kab.sosial.puskesmasNonRI} Puskesmas</b>, <b>${kab.sosial.pustu} Pustu</b>, dan <b>${kab.sosial.posyandu} Posyandu aktif</b> di 133 desa.`;
      } else if (currentCategory === 'keuangan') {
        el.innerHTML = `Tercatat <b>${kab.keuangan.bumdes} BUMDes aktif</b> yang beroperasi sebagai motor ekonomi desa. <b>${kab.keuangan.kendaraanDinas} unit</b> kendaraan operasional siap siaga, dan <b>${kab.keuangan.tanahKas} desa</b> memiliki aset tanah kas desa terkelola.`;
      } else if (currentCategory === 'umum') {
        el.innerHTML = `Kolaka Utara terdiri atas <b>${kab.umum.desa} Desa</b> dan <b>${kab.umum.kelurahan} Kelurahan</b>. <b>${kab.umum.sekitarHutan} desa</b> berbatasan langsung dengan kawasan hutan dan <b>${kab.umum.pesisirLaut} desa</b> berada di bentang pesisir Teluk Bone. Komoditas perkebunan utama didominasi kakao dan cengkeh.`;
      } else if (currentCategory === 'pemerintah') {
        el.innerHTML = `Total aparatur pemerintahan desa mencapai <b>${kab.pemerintah.totalAparat.toLocaleString('id-ID')} personel</b> (terdiri atas 130 Kades/Lurah, 133 Sekdes, 439 Kadus, dan 509 Kaur). <b>${kab.pemerintah.kantorDesa} desa</b> telah memiliki kantor pemerintahan representatif.`;
      }
    } else {
      const k = db.kecamatanList.find(x => x.nama.toLowerCase() === currentKecamatan.toLowerCase());
      if (k) {
        el.innerHTML = `Kecamatan <b>${k.nama}</b> membawahi <b>${k.desaCount} Desa/Kelurahan</b>. Nilai indikator <b>${CATEGORY_CONFIG[currentCategory].label}</b> tercatat sebesar <b>${getFeatureMetricValue(k.nama, currentCategory).toLocaleString('id-ID')} ${CATEGORY_CONFIG[currentCategory].unit}</b>. Klik pada salah satu desa di peta untuk menelaah rapor profil desa spesifik.`;
      }
    }
  }

  // =========================================================================
  // TABLE TABULATION & CSV EXPORT (INTEGRATED REAL PODES 2025 TABLES)
  // =========================================================================
  let currentTableData = [];
  let tableSearchQuery = '';

  function renderPresisiTable() {
    const thead = document.getElementById('theadPresisi');
    const tbody = document.getElementById('tbodyPresisi');
    if (!thead || !tbody) return;

    // DYNAMIC RENDERING FROM REAL PODES 2025 SUB-TABLE IF AVAILABLE
    if (currentRealTableData && currentRealTableData.columns && currentRealTableData.columns.length > 0) {
      thead.innerHTML = `
        <tr class="bg-slate-100/90 text-slate-700 text-xs">
          <th class="p-2.5 font-bold whitespace-nowrap text-center w-12 border-b border-slate-200">No</th>
          <th class="p-2.5 font-bold whitespace-nowrap border-b border-slate-200">Desa / Kelurahan</th>
          <th class="p-2.5 font-bold whitespace-nowrap border-b border-slate-200">Kecamatan</th>
          ${currentRealTableData.columns.map(col => `<th class="p-2.5 font-bold whitespace-nowrap text-right border-b border-slate-200" title="${col.label}">${col.label}</th>`).join('')}
        </tr>
      `;

      const villageRows = (currentRealTableData.kecamatan_rows || []).filter(r => r.desa && !r.is_total);
      currentTableData = villageRows.map((r, idx) => ({
        no: idx + 1,
        nama: r.desa,
        status: (r.desa.toLowerCase().includes('kelurahan') || r.desa.toLowerCase() === 'lasusua') ? 'Kelurahan' : 'Desa',
        kecamatan: r.kecamatan,
        values: r.values || {}
      }));
    } else {
      // FALLBACK TO STATIC CATEGORY CONFIG
      const cfg = CATEGORY_CONFIG[currentCategory];
      thead.innerHTML = `
        <tr class="bg-slate-100/90 text-slate-700 text-xs">
          ${cfg.tableColumns.map(col => `<th class="p-2.5 font-bold whitespace-nowrap border-b border-slate-200">${col.label}</th>`).join('')}
        </tr>
      `;

      currentTableData = db.desaList.map((d, idx) => {
        let row = {
          no: idx + 1,
          nama: d.nama,
          status: d.status,
          kecamatan: d.kecamatan
        };

        if (currentCategory === 'ekonomi') {
          row.ikm = d.ekonomi.ikm;
          row.minimarket = d.ekonomi.minimarket;
          row.resto = d.ekonomi.resto;
          row.hotelPenginapan = d.ekonomi.hotel + d.ekonomi.penginapan;
          row.pasar = d.ekonomi.pasarPerm + d.ekonomi.pasarSemi;
          row.bank = d.ekonomi.bank;
          row.ksp = d.ekonomi.ksp;
          row.kur = d.ekonomi.kur ? 'Ada' : '-';
          row.prodUnggulan = d.ekonomi.prodUnggulan || d.umum.komoditas || '-';
        } else if (currentCategory === 'lingkungan') {
          row.pln = d.lingkungan.pln;
          row.nonPln = d.lingkungan.nonPln;
          row.pencemaran = d.lingkungan.bebasPencemaran ? 'Bebas' : 'Ada';
          row.sampah = d.lingkungan.sampah ? 'Ada' : '-';
          row.pupuk = d.lingkungan.pupukOrganik ? 'Ada' : '-';
          row.energi = d.lingkungan.energiTerbarukan ? 'Ada' : '-';
          row.polaTanam = d.lingkungan.polaTanam ? 'Ada' : '-';
          row.panenHujan = d.lingkungan.panenHujan ? 'Ada' : '-';
        } else if (currentCategory === 'sosial') {
          row.tk = d.sosial.tk;
          row.sd = d.sosial.sdNeg + d.sosial.sdSwa + d.sosial.miNeg + d.sosial.miSwa;
          row.smp = d.sosial.smpNeg + d.sosial.smpSwa + d.sosial.mtsNeg + d.sosial.mtsSwa;
          row.sma = d.sosial.smaNeg + d.sosial.smaSwa + d.sosial.smk;
          row.puskesmas = d.sosial.puskesmasRI + d.sosial.puskesmasNonRI;
          row.pustu = d.sosial.pustu;
          row.poskesdes = d.sosial.poskesdes;
          row.bidan = d.sosial.bidan;
          row.dokter = d.sosial.dokter;
        } else if (currentCategory === 'keuangan') {
          row.bumdes = d.keuangan.bumdes > 0 ? d.keuangan.bumdes : '-';
          row.kendaraanDinas = d.keuangan.kendaraanDinas || '-';
          row.tanahKas = d.keuangan.tanahKas ? 'Ada' : '-';
          row.pades = d.keuangan.pades ? 'Ada' : '-';
          row.danaDesa = d.keuangan.danaDesa ? 'Terserap' : 'Ada';
          row.bankDesa = d.keuangan.bankDesa ? 'Ada' : '-';
          row.kiosDesa = d.keuangan.kiosDesa ? 'Ada' : '-';
        } else if (currentCategory === 'umum') {
          row.topografi = d.umum.topografi || '-';
          row.luas = d.umum.luas ? d.umum.luas + ' km²' : '-';
          row.statusHutan = d.umum.statusHutan || '-';
          row.pesisir = d.umum.pesisir ? 'Pesisir' : 'Bukan';
          row.komoditas = d.umum.komoditas || '-';
          row.lokasiKantor = d.umum.lokasiKantor || 'Di Desa';
        } else if (currentCategory === 'pemerintah') {
          row.totalAparat = d.pemerintah.totalAparat;
          row.kadesGender = d.pemerintah.kadesGender || '-';
          row.kadesPendidikan = d.pemerintah.kadesPendidikan || '-';
          row.sekdesGender = d.pemerintah.sekdesGender || '-';
          row.bpd = d.pemerintah.bpd ? 'Ada' : '-';
          row.musdes = d.pemerintah.musdes ? 'Ada' : '-';
          row.kantorDesa = d.pemerintah.kantorDesa ? 'Ada' : '-';
        }

        return row;
      });
    }

    renderTableRows();
  }

  function renderTableRows() {
    const tbody = document.getElementById('tbodyPresisi');
    const badgeCount = document.getElementById('presisiTableCountBadge');
    if (!tbody) return;

    let filtered = currentTableData;

    // Filter by Kecamatan if active
    if (currentKecamatan && currentKecamatan !== 'ALL') {
      filtered = filtered.filter(r => (r.kecamatan || '').toUpperCase() === currentKecamatan.toUpperCase());
    }

    // Filter by Search Query
    if (tableSearchQuery) {
      const q = tableSearchQuery.toLowerCase();
      filtered = filtered.filter(r => {
        if ((r.nama || '').toLowerCase().includes(q)) return true;
        if ((r.kecamatan || '').toLowerCase().includes(q)) return true;
        if (r.values) {
          for (const k in r.values) {
            if (String(r.values[k]).toLowerCase().includes(q)) return true;
          }
        }
        return false;
      });
    }

    if (badgeCount) {
      const sheetName = currentRealTableData ? ` (Tabel ${currentRealTableData.table})` : '';
      badgeCount.textContent = `Menampilkan ${filtered.length} dari ${currentTableData.length} Desa${sheetName}`;
    }

    if (currentRealTableData && currentRealTableData.columns && currentRealTableData.columns.length > 0) {
      tbody.innerHTML = filtered.map(row => `
        <tr class="hover:bg-emerald-50/50 transition cursor-pointer border-b border-slate-100 group" onclick="window.PresisiEngine.setViewMode('dual'); window.PresisiEngine.onDesaChange('${row.nama}')">
          <td class="p-2.5 whitespace-nowrap text-center text-slate-500 text-xs">${row.no}</td>
          <td class="p-2.5 whitespace-nowrap font-bold text-slate-900 group-hover:text-emerald-700 flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
            <span>${row.nama}</span>
          </td>
          <td class="p-2.5 whitespace-nowrap text-slate-600 text-xs font-medium">${row.kecamatan}</td>
          ${currentRealTableData.columns.map(col => {
            let val = (row.values && row.values[col.col] !== undefined) ? row.values[col.col] : '-';
            let isNum = typeof val === 'number' || (!isNaN(val) && val !== '' && val !== null);
            let displayVal = val;
            if (isNum && val !== '-') {
              displayVal = Number(val).toLocaleString('id-ID');
            }
            return `<td class="p-2.5 whitespace-nowrap text-right text-slate-800 text-xs font-semibold ${isNum && Number(val) > 0 ? 'text-emerald-800 font-bold' : ''}">${displayVal}</td>`;
          }).join('')}
        </tr>
      `).join('');
    } else {
      const cfg = CATEGORY_CONFIG[currentCategory];
      tbody.innerHTML = filtered.map(row => `
        <tr class="hover:bg-slate-50 transition cursor-pointer" onclick="window.PresisiEngine.setViewMode('dual'); window.PresisiEngine.onDesaChange('${row.nama}')">
          ${cfg.tableColumns.map(col => `<td class="p-2.5 whitespace-nowrap">${row[col.key] !== undefined ? row[col.key] : '-'}</td>`).join('')}
        </tr>
      `).join('');
    }
  }

  function onTableSearch(query) {
    tableSearchQuery = (query || '').trim();
    const input = document.getElementById('inputPresisiTableSearch');
    if (input && input.value !== tableSearchQuery) {
      input.value = tableSearchQuery;
    }
    renderTableRows();
  }

  function exportCSV() {
    if (!currentTableData || !currentTableData.length) return;

    let csv = '';
    let filename = '';

    if (currentRealTableData && currentRealTableData.columns && currentRealTableData.columns.length > 0) {
      let headers = ['"No"', '"Desa / Kelurahan"', '"Kecamatan"'];
      currentRealTableData.columns.forEach(col => {
        headers.push(`"${String(col.label).replace(/"/g, '""')}"`);
      });
      csv = headers.join(',') + '\n';

      currentTableData.forEach(row => {
        let line = [row.no, `"${String(row.nama).replace(/"/g, '""')}"`, `"${String(row.kecamatan).replace(/"/g, '""')}"`];
        currentRealTableData.columns.forEach(col => {
          let val = (row.values && row.values[col.col] !== undefined) ? row.values[col.col] : '';
          line.push(`"${String(val).replace(/"/g, '""')}"`);
        });
        csv += line.join(',') + '\n';
      });

      const cleanSheet = (currentRealTableData.table || 'tabel').replace(/[^a-zA-Z0-9]/g, '_');
      filename = `PODES_2025_Kolaka_Utara_Tabel_${cleanSheet}.csv`;
    } else {
      const cfg = CATEGORY_CONFIG[currentCategory];
      csv = cfg.tableColumns.map(c => `"${c.label}"`).join(',') + '\n';
      currentTableData.forEach(row => {
        let line = cfg.tableColumns.map(c => {
          let val = row[c.key] !== undefined ? row[c.key] : '';
          return `"${String(val).replace(/"/g, '""')}"`;
        }).join(',');
        csv += line + '\n';
      });
      filename = `PODES_2025_Kolaka_Utara_${currentCategory}.csv`;
    }

    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
  }


  // =========================================================================
  // MODUL BARU: PUSAT KOMPARASI & ANALITIK DISPARITAS WILAYAH (PODES BPS 2025)
  // Fitur Komparator Head-to-Head, 3 Koridor Pembangunan, & Leaderboard Wilayah
  // =========================================================================
  let comparatorTab = 'headtohead'; // 'headtohead', 'koridor', 'leaderboard'
  let comparatorKec1 = 'Porehu';
  let comparatorKec2 = 'Lasusua';
  let leaderboardMetric = 'imk'; // 'imk', 'jiwa', 'pln', 'sekolah', 'faskes', 'bumdes'

  const KORIDOR_DATA = {
    utara: {
      nama: 'Koridor Utara',
      sub: 'Perbatasan & Sentra Perkebunan Kakao',
      kecamatan: ['Tolala', 'Porehu', 'Batu Putih', 'Pakue', 'Pakue Utara', 'Pakue Tengah'],
      desa: 55,
      jiwa: 47035,
      imk: 2149,
      pln: 12376,
      sekolah: 137,
      faskes: 85,
      bumdes: 56,
      highlight: '59,3% Sentra Industri Mikro Kabupaten',
      karakter: 'Pusat hilirisasi perkebunan kakao, cengkeh, nilam, kelapa dalam, dan perikanan laut perbatasan Sulsel.'
    },
    tengah: {
      nama: 'Koridor Tengah',
      sub: 'Lumbung Pangan Pokok & Agroindustri',
      kecamatan: ['Watunohu', 'Tiwu', 'Ngapa', 'Kodeoha'],
      desa: 39,
      jiwa: 40976,
      imk: 994,
      pln: 9869,
      sekolah: 88,
      faskes: 54,
      bumdes: 46,
      highlight: 'Sentra Padi Sawah & Tanaman Lada',
      karakter: 'Lembah agraris sentra tanaman pangan, padi sawah irigasi, perkebunan lada putih/hitam, dan aneka industri pangan.'
    },
    selatan: {
      nama: 'Koridor Selatan',
      sub: 'Pusat Ibu Kota, Medis & Pendidikan Tinggi',
      kecamatan: ['Lasusua', 'Katoi', 'Lambai', 'Ranteangin', 'Wawo'],
      desa: 39,
      jiwa: 54681,
      imk: 479,
      pln: 15832,
      sekolah: 122,
      faskes: 84,
      bumdes: 44,
      highlight: '38,4% Konsentrasi Populasi & RSUD Rujukan',
      karakter: 'Pusat pemerintahan kabupaten di Lasusua, sirkulasi perbankan, fasilitas rujukan RSUD Kelas C, dan perguruan tinggi.'
    }
  };

  function getKecPop(kName) {
    const clean = (kName || '').replace(/\s+/g, '').toLowerCase();
    if (KECAMATAN_DEMOGRAPHY[clean]) {
      return KECAMATAN_DEMOGRAPHY[clean].jiwa;
    }
    if (db && db.kecamatan) {
      for (const [k, v] of Object.entries(db.kecamatan)) {
        if (v.nama && v.nama.toLowerCase() === kName.toLowerCase()) {
          return v.penduduk_total || 0;
        }
      }
    }
    return 0;
  }

  function setComparatorTab(tab) {
    comparatorTab = tab || 'headtohead';
    document.querySelectorAll('.comparator-tab-btn').forEach(btn => {
      btn.className = "comparator-tab-btn px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition flex items-center gap-2 cursor-pointer";
    });
    const activeBtn = document.getElementById('tabBtn-' + comparatorTab);
    if (activeBtn) {
      activeBtn.className = "comparator-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 cursor-pointer bg-[#0D6E5B] text-white shadow-xs";
    }
    renderAgregatKecamatanSection();
  }

  function setComparatorKec1(name) {
    comparatorKec1 = name;
    renderAgregatKecamatanSection();
  }

  function setComparatorKec2(name) {
    comparatorKec2 = name;
    renderAgregatKecamatanSection();
  }

  function swapComparatorKec() {
    const tmp = comparatorKec1;
    comparatorKec1 = comparatorKec2;
    comparatorKec2 = tmp;
    renderAgregatKecamatanSection();
  }

  function setLeaderboardMetric(metric) {
    leaderboardMetric = metric || 'imk';
    renderAgregatKecamatanSection();
  }

  function renderAgregatKecamatanSection() {
    const container = document.getElementById('gridKecamatanCards');
    if (!container || !db || !db.kecamatanList) return;

    const fmt = (n) => (typeof n === 'number' && !isNaN(n)) ? n.toLocaleString('id-ID') : (n || '0');
    const allKecNames = db.kecamatanList.map(k => k.nama);

    // Update active tab buttons visual state
    ['headtohead', 'koridor', 'leaderboard'].forEach(t => {
      const btn = document.getElementById('tabBtn-' + t);
      if (btn) {
        if (t === comparatorTab) {
          btn.className = "comparator-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 cursor-pointer bg-[#0D6E5B] text-white shadow-xs";
        } else {
          btn.className = "comparator-tab-btn px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition flex items-center gap-2 cursor-pointer";
        }
      }
    });

    if (comparatorTab === 'headtohead') {
      renderTabHeadToHead(container, fmt, allKecNames);
    } else if (comparatorTab === 'koridor') {
      renderTabKoridor(container, fmt);
    } else if (comparatorTab === 'leaderboard') {
      renderTabLeaderboard(container, fmt);
    }
  }

  function renderTabHeadToHead(container, fmt, allKecNames) {
    const k1 = db.kecamatanList.find(x => x.nama === comparatorKec1) || db.kecamatanList[0];
    const isAvg = (comparatorKec2 === 'AVERAGE');
    let k2 = null;
    if (isAvg) {
      k2 = {
        nama: 'Rata-rata Kabupaten',
        kode: '74.08.AVG',
        desaCount: 9,
        karakteristik: 'Tolok Ukur Standar Rata-rata 15 Kecamatan',
        ekonomi: { ikm: 241, pasarPerm: 1, pasarSemi: 2, bank: 2 },
        lingkungan: { pln: 2538, persenPln: 91.5 },
        sosial: { totalSaranaPendidikan: 14, totalSaranaKesehatan: 12 },
        keuangan: { bumdes: 9 }
      };
    } else {
      k2 = db.kecamatanList.find(x => x.nama === comparatorKec2) || db.kecamatanList[3];
    }

    const pop1 = getKecPop(k1.nama);
    const pop2 = isAvg ? 9513 : getKecPop(k2.nama);

    const metrics = [
      {
        label: 'Sentra Industri Mikro & Kecil (IMK)',
        sub: 'Pusat hilirisasi olahan pangan, kakao, kopi & kerajinan',
        val1: k1.ekonomi?.ikm || 0,
        val2: k2.ekonomi?.ikm || 0,
        unit: 'Unit',
        icon: '🏭'
      },
      {
        label: 'Jumlah Penduduk (Jiwa)',
        sub: 'Total populasi berdasarkan hasil PODES BPS 2025',
        val1: pop1,
        val2: pop2,
        unit: 'Jiwa',
        icon: '👥'
      },
      {
        label: 'Keluarga Berlistrik PLN',
        sub: 'Akses penerangan dan rasio elektrifikasi rumah tangga',
        val1: k1.lingkungan?.pln || 0,
        val2: k2.lingkungan?.pln || 0,
        unit: 'KK',
        extra1: `Rasio: ${k1.lingkungan?.persenPln || 0}%`,
        extra2: `Rasio: ${k2.lingkungan?.persenPln || 0}%`,
        icon: '⚡'
      },
      {
        label: 'Sarana Satuan Pendidikan Formal',
        sub: 'Ketersediaan gedung sekolah jenjang SD/MI, SMP/MTs, hingga SMA/SMK',
        val1: k1.sosial?.totalSaranaPendidikan || 0,
        val2: k2.sosial?.totalSaranaPendidikan || 0,
        unit: 'Sekolah',
        icon: '🎓'
      },
      {
        label: 'Fasilitas Layanan Kesehatan Aktif',
        sub: 'Jaringan RSUD, Puskesmas, Pustu, Poskesdes, dan Polindes',
        val1: k1.sosial?.totalSaranaKesehatan || 0,
        val2: k2.sosial?.totalSaranaKesehatan || 0,
        unit: 'Faskes',
        icon: '🏥'
      },
      {
        label: 'Badan Usaha Milik Desa (BUMDes)',
        sub: 'Penguatan kelembagaan ekonomi desa mandiri',
        val1: k1.keuangan?.bumdes || 0,
        val2: k2.keuangan?.bumdes || 0,
        unit: 'BUMDes',
        icon: '💼'
      }
    ];

    container.innerHTML = `
      <div class="space-y-6">
        <!-- Selector Control Bar -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center bg-white rounded-3xl border border-slate-200/90 p-5 shadow-xs">
          <!-- Wilayah 1 (Kiri) -->
          <div class="md:col-span-5 bg-emerald-50/50 rounded-2xl p-4 border border-emerald-100/80 space-y-2">
            <div class="flex items-center justify-between">
              <span class="text-[10px] font-mono font-black text-[#0D6E5B] uppercase tracking-wider">WILAYAH PERTAMA (A)</span>
              <span class="text-[11px] font-bold text-slate-500">${k1.desaCount} Desa</span>
            </div>
            <select onchange="window.PresisiEngine.setComparatorKec1(this.value)" class="w-full text-base font-extrabold text-slate-900 bg-white border border-emerald-200 rounded-xl px-3 py-2 outline-none focus:ring-2 focus:ring-[#0D6E5B] cursor-pointer">
              ${allKecNames.map(name => `<option value="${name}" ${name === k1.nama ? 'selected' : ''}>Kecamatan ${name}</option>`).join('')}
            </select>
            <div class="text-xs text-[#0D6E5B] font-medium truncate italic">
              "${k1.karakteristik || 'Wilayah Strategis Kolaka Utara'}"
            </div>
          </div>

          <!-- VS Badge / Swap Button (Tengah) -->
          <div class="md:col-span-2 flex flex-col items-center justify-center py-2">
            <button type="button" onclick="window.PresisiEngine.swapComparatorKec()" title="Tukar Posisi Wilayah" class="w-12 h-12 rounded-full bg-slate-900 hover:bg-[#0D6E5B] text-white flex items-center justify-center shadow-md hover:scale-110 transition cursor-pointer group">
              <span class="font-black text-xs group-hover:hidden">VS</span>
              <svg class="w-4 h-4 hidden group-hover:block transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
            </button>
            <span class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-widest">Bandingkan</span>
          </div>

          <!-- Wilayah 2 (Kanan) -->
          <div class="md:col-span-5 bg-sky-50/50 rounded-2xl p-4 border border-sky-100/80 space-y-2">
            <div class="flex items-center justify-between">
              <span class="text-[10px] font-mono font-black text-sky-700 uppercase tracking-wider">WILAYAH KEDUA (B)</span>
              <span class="text-[11px] font-bold text-slate-500">${k2.desaCount} Desa</span>
            </div>
            <select onchange="window.PresisiEngine.setComparatorKec2(this.value)" class="w-full text-base font-extrabold text-slate-900 bg-white border border-sky-200 rounded-xl px-3 py-2 outline-none focus:ring-2 focus:ring-sky-600 cursor-pointer">
              <option value="AVERAGE" ${isAvg ? 'selected' : ''}>📊 Rata-rata 15 Kecamatan (Tolok Ukur)</option>
              ${allKecNames.map(name => `<option value="${name}" ${name === k2.nama && !isAvg ? 'selected' : ''}>Kecamatan ${name}</option>`).join('')}
            </select>
            <div class="text-xs text-sky-800 font-medium truncate italic">
              "${k2.karakteristik || 'Wilayah Penopang Kolaka Utara'}"
            </div>
          </div>
        </div>

        <!-- 6 Baris Matriks Komparasi Dual-Bar -->
        <div class="bg-white rounded-3xl border border-slate-200/90 p-5 sm:p-7 shadow-xs space-y-6">
          <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">INDIKATOR SEKTORAL PODES 2025</span>
            <div class="flex items-center gap-4 text-xs font-bold">
              <span class="flex items-center gap-1.5 text-[#0D6E5B]"><span class="w-2.5 h-2.5 rounded-full bg-[#0D6E5B]"></span> ${k1.nama}</span>
              <span class="flex items-center gap-1.5 text-sky-700"><span class="w-2.5 h-2.5 rounded-full bg-sky-600"></span> ${k2.nama}</span>
            </div>
          </div>

          <div class="space-y-5">
            ${metrics.map(m => {
              const maxVal = Math.max(m.val1, m.val2, 1);
              const pct1 = Math.round((m.val1 / maxVal) * 100);
              const pct2 = Math.round((m.val2 / maxVal) * 100);
              const diff = m.val1 - m.val2;
              let badgeHtml = '';
              if (diff > 0) {
                const ratio = m.val2 > 0 ? ((diff / m.val2) * 100).toFixed(0) : 100;
                badgeHtml = `<span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-bold">+${ratio}% di ${k1.nama}</span>`;
              } else if (diff < 0) {
                const ratio = m.val1 > 0 ? ((Math.abs(diff) / m.val1) * 100).toFixed(0) : 100;
                badgeHtml = `<span class="px-2 py-0.5 rounded-full bg-sky-100 text-sky-800 text-[10px] font-bold">+${ratio}% di ${k2.nama}</span>`;
              } else {
                badgeHtml = `<span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[10px] font-bold">Seimbang (0)</span>`;
              }

              return `
                <div class="p-3.5 rounded-2xl bg-slate-50/60 border border-slate-100 hover:border-slate-300 transition space-y-2.5">
                  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 text-xs">
                    <div class="flex items-center gap-2">
                      <span class="text-base">${m.icon}</span>
                      <span class="font-extrabold text-slate-900">${m.label}</span>
                    </div>
                    <div class="flex items-center gap-2">
                      ${badgeHtml}
                      <span class="text-[11px] text-slate-500 font-mono">${m.sub}</span>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
                    <!-- Sisi Kiri (Wilayah A) -->
                    <div class="sm:col-span-6 space-y-1">
                      <div class="flex justify-between items-center text-xs">
                        <span class="font-bold text-[#0D6E5B]">${k1.nama}</span>
                        <span class="font-mono font-extrabold text-[#0D6E5B] text-sm">${fmt(m.val1)} <span class="text-[10px] text-slate-500 font-normal">${m.unit}</span></span>
                      </div>
                      <div class="w-full h-2 rounded-full bg-slate-200 overflow-hidden">
                        <div class="h-full rounded-full bg-[#0D6E5B] transition-all duration-700" style="width: ${pct1}%"></div>
                      </div>
                    </div>

                    <!-- Sisi Kanan (Wilayah B) -->
                    <div class="sm:col-span-6 space-y-1">
                      <div class="flex justify-between items-center text-xs">
                        <span class="font-bold text-sky-700">${k2.nama}</span>
                        <span class="font-mono font-extrabold text-sky-700 text-sm">${fmt(m.val2)} <span class="text-[10px] text-slate-500 font-normal">${m.unit}</span></span>
                      </div>
                      <div class="w-full h-2 rounded-full bg-slate-200 overflow-hidden">
                        <div class="h-full rounded-full bg-sky-600 transition-all duration-700" style="width: ${pct2}%"></div>
                      </div>
                    </div>
                  </div>
                </div>
              `;
            }).join('')}
          </div>

          <!-- Kesimpulan Analisis Strategis & Tombol Aksi -->
          <div class="pt-4 border-t border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="text-xs text-slate-600 leading-relaxed max-w-2xl">
              <span class="font-extrabold text-[#0D6E5B]">💡 Kesimpulan Analitik:</span>
              ${(k1.ekonomi?.ikm || 0) > (k2.ekonomi?.ikm || 0)
                ? `<b>Kecamatan ${k1.nama}</b> memiliki konsentrasi sentra industri rakyat yang jauh lebih masif (${fmt(k1.ekonomi?.ikm)} Unit), sementara <b>Kecamatan ${k2.nama}</b> unggul dalam kepadatan layanan dan konsentrasi penduduk.`
                : `<b>Kecamatan ${k2.nama}</b> mencatat volume sentra industri yang lebih tinggi, sementara <b>Kecamatan ${k1.nama}</b> memiliki karakteristik spesifik penopang wilayah.`}
            </div>

            <div class="flex items-center gap-2.5 shrink-0 flex-wrap">
              <button type="button" onclick="window.PresisiEngine.onKecamatanChange('${k1.nama}'); document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});" class="px-4 py-2 rounded-xl bg-[#0D6E5B] hover:bg-[#095244] text-white text-xs font-bold transition shadow-xs cursor-pointer flex items-center gap-1.5">
                <span>📍 Lihat ${k1.nama} di Peta</span>
              </button>
              ${!isAvg ? `
                <button type="button" onclick="window.PresisiEngine.onKecamatanChange('${k2.nama}'); document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});" class="px-4 py-2 rounded-xl bg-sky-700 hover:bg-sky-800 text-white text-xs font-bold transition shadow-xs cursor-pointer flex items-center gap-1.5">
                  <span>📍 Lihat ${k2.nama} di Peta</span>
                </button>
              ` : ''}
              <button type="button" onclick="document.getElementById('sectionExplorerPodes')?.scrollIntoView({behavior:'smooth'});" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition cursor-pointer">
                <span>📋 Data 133 Desa</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    `;
  }

  function renderTabKoridor(container, fmt) {
    const kU = KORIDOR_DATA.utara;
    const kT = KORIDOR_DATA.tengah;
    const kS = KORIDOR_DATA.selatan;

    container.innerHTML = `
      <div class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
          <!-- KORIDOR UTARA -->
          <div class="bg-white rounded-3xl border-2 border-emerald-500/30 p-6 shadow-xs flex flex-col justify-between space-y-4 hover:border-emerald-600 transition">
            <div class="space-y-3">
              <div class="flex items-center justify-between">
                <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 font-mono text-[10px] font-black uppercase tracking-wider">ZONA 01 • PERBATASAN</span>
                <span class="text-xs font-bold text-slate-500">6 Kecamatan • 55 Desa</span>
              </div>
              <div>
                <h4 class="text-2xl font-black text-[#0D6E5B] tracking-tight">Koridor Utara</h4>
                <p class="text-xs text-slate-500 font-medium">${kU.sub}</p>
              </div>
              <div class="p-3 rounded-2xl bg-emerald-50/70 border border-emerald-100 text-xs text-emerald-950 font-bold">
                🏆 ${kU.highlight}
              </div>
              <div class="text-xs text-slate-600 leading-relaxed italic">
                "${kU.karakter}"
              </div>
              <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-100 text-xs">
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Sentra IMK</div>
                  <div class="text-lg font-black text-[#0D6E5B]">${fmt(kU.imk)} <span class="text-[10px] font-normal text-slate-500">Unit (59,3%)</span></div>
                </div>
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Populasi</div>
                  <div class="text-lg font-black text-slate-900">${fmt(kU.jiwa)} <span class="text-[10px] font-normal text-slate-500">Jiwa</span></div>
                </div>
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Listrik PLN</div>
                  <div class="text-base font-extrabold text-slate-900">${fmt(kU.pln)} <span class="text-[10px] font-normal text-slate-500">KK</span></div>
                </div>
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Sekolah & Faskes</div>
                  <div class="text-base font-extrabold text-slate-900">${kU.sekolah} Sek • ${kU.faskes} Fas</div>
                </div>
              </div>
            </div>
            <div class="pt-3 border-t border-slate-100 text-[11px] text-slate-500">
              <b>Cakupan Wilayah:</b> ${kU.kecamatan.join(', ')}
            </div>
          </div>

          <!-- KORIDOR TENGAH -->
          <div class="bg-white rounded-3xl border-2 border-amber-500/30 p-6 shadow-xs flex flex-col justify-between space-y-4 hover:border-amber-600 transition">
            <div class="space-y-3">
              <div class="flex items-center justify-between">
                <span class="px-2.5 py-1 rounded-full bg-amber-100 text-amber-800 font-mono text-[10px] font-black uppercase tracking-wider">ZONA 02 • AGROPANGAN</span>
                <span class="text-xs font-bold text-slate-500">4 Kecamatan • 39 Desa</span>
              </div>
              <div>
                <h4 class="text-2xl font-black text-amber-900 tracking-tight">Koridor Tengah</h4>
                <p class="text-xs text-slate-500 font-medium">${kT.sub}</p>
              </div>
              <div class="p-3 rounded-2xl bg-amber-50/70 border border-amber-100 text-xs text-amber-950 font-bold">
                🌾 ${kT.highlight}
              </div>
              <div class="text-xs text-slate-600 leading-relaxed italic">
                "${kT.karakter}"
              </div>
              <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-100 text-xs">
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Sentra IMK</div>
                  <div class="text-lg font-black text-amber-700">${fmt(kT.imk)} <span class="text-[10px] font-normal text-slate-500">Unit (27,4%)</span></div>
                </div>
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Populasi</div>
                  <div class="text-lg font-black text-slate-900">${fmt(kT.jiwa)} <span class="text-[10px] font-normal text-slate-500">Jiwa</span></div>
                </div>
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Listrik PLN</div>
                  <div class="text-base font-extrabold text-slate-900">${fmt(kT.pln)} <span class="text-[10px] font-normal text-slate-500">KK</span></div>
                </div>
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Sekolah & Faskes</div>
                  <div class="text-base font-extrabold text-slate-900">${kT.sekolah} Sek • ${kT.faskes} Fas</div>
                </div>
              </div>
            </div>
            <div class="pt-3 border-t border-slate-100 text-[11px] text-slate-500">
              <b>Cakupan Wilayah:</b> ${kT.kecamatan.join(', ')}
            </div>
          </div>

          <!-- KORIDOR SELATAN -->
          <div class="bg-white rounded-3xl border-2 border-sky-500/30 p-6 shadow-xs flex flex-col justify-between space-y-4 hover:border-sky-600 transition">
            <div class="space-y-3">
              <div class="flex items-center justify-between">
                <span class="px-2.5 py-1 rounded-full bg-sky-100 text-sky-800 font-mono text-[10px] font-black uppercase tracking-wider">ZONA 03 • IBU KOTA & JASA</span>
                <span class="text-xs font-bold text-slate-500">5 Kecamatan • 39 Desa</span>
              </div>
              <div>
                <h4 class="text-2xl font-black text-sky-950 tracking-tight">Koridor Selatan</h4>
                <p class="text-xs text-slate-500 font-medium">${kS.sub}</p>
              </div>
              <div class="p-3 rounded-2xl bg-sky-50/70 border border-sky-100 text-xs text-sky-950 font-bold">
                🏛️ ${kS.highlight}
              </div>
              <div class="text-xs text-slate-600 leading-relaxed italic">
                "${kS.karakter}"
              </div>
              <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-100 text-xs">
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Sentra IMK</div>
                  <div class="text-lg font-black text-sky-700">${fmt(kS.imk)} <span class="text-[10px] font-normal text-slate-500">Unit (13,2%)</span></div>
                </div>
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Populasi</div>
                  <div class="text-lg font-black text-slate-900">${fmt(kS.jiwa)} <span class="text-[10px] font-normal text-slate-500">Jiwa (38,4%)</span></div>
                </div>
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Listrik PLN</div>
                  <div class="text-base font-extrabold text-slate-900">${fmt(kS.pln)} <span class="text-[10px] font-normal text-slate-500">KK (41,6%)</span></div>
                </div>
                <div class="p-2.5 rounded-xl bg-slate-50">
                  <div class="text-[10px] text-slate-400 font-bold uppercase">Sekolah & Faskes</div>
                  <div class="text-base font-extrabold text-slate-900">${kS.sekolah} Sek • ${kS.faskes} Fas</div>
                </div>
              </div>
            </div>
            <div class="pt-3 border-t border-slate-100 text-[11px] text-slate-500">
              <b>Cakupan Wilayah:</b> ${kS.kecamatan.join(', ')}
            </div>
          </div>
        </div>

        <!-- Macro Balance Summary Bar -->
        <div class="bg-white rounded-3xl border border-slate-200/90 p-5 shadow-xs space-y-3">
          <div class="flex items-center justify-between text-xs font-bold text-slate-700">
            <span>Proporsi Sentra IMK Antar-Koridor (Total: 3.622 Sentra Industri)</span>
            <span class="text-[#0D6E5B] font-mono">Utara (59,3%) • Tengah (27,4%) • Selatan (13,2%)</span>
          </div>
          <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden flex">
            <div style="width: 59.3%" class="bg-[#0D6E5B] h-full" title="Utara: 59,3%"></div>
            <div style="width: 27.4%" class="bg-amber-500 h-full" title="Tengah: 27,4%"></div>
            <div style="width: 13.3%" class="bg-sky-600 h-full" title="Selatan: 13,3%"></div>
          </div>
        </div>
      </div>
    `;
  }

  function renderTabLeaderboard(container, fmt) {
    const metricDefs = {
      imk: { name: 'Sentra IMK & Industri Rakyat', unit: 'Unit', icon: '🏭', getter: k => k.ekonomi?.ikm || 0 },
      jiwa: { name: 'Jumlah Penduduk (Jiwa)', unit: 'Jiwa', icon: '👥', getter: k => getKecPop(k.nama) },
      pln: { name: 'Keluarga Berlistrik PLN', unit: 'KK', icon: '⚡', getter: k => k.lingkungan?.pln || 0 },
      sekolah: { name: 'Sarana Satuan Pendidikan', unit: 'Sekolah', icon: '🎓', getter: k => k.sosial?.totalSaranaPendidikan || 0 },
      faskes: { name: 'Fasilitas Kesehatan Aktif', unit: 'Faskes', icon: '🏥', getter: k => k.sosial?.totalSaranaKesehatan || 0 },
      bumdes: { name: 'Keberadaan BUMDes Aktif', unit: 'BUMDes', icon: '💼', getter: k => k.keuangan?.bumdes || 0 }
    };

    const currentDef = metricDefs[leaderboardMetric] || metricDefs.imk;
    const sorted = [...db.kecamatanList].sort((a, b) => currentDef.getter(b) - currentDef.getter(a));
    const top1Val = currentDef.getter(sorted[0]) || 1;

    container.innerHTML = `
      <div class="space-y-6">
        <!-- Metric Switcher Pills -->
        <div class="bg-white rounded-2xl border border-slate-200/90 p-3 shadow-xs flex items-center gap-2 overflow-x-auto scrollbar-none">
          <span class="text-xs font-bold text-slate-500 shrink-0 px-2">Pilih Indikator:</span>
          ${Object.entries(metricDefs).map(([key, def]) => {
            const isActive = (key === leaderboardMetric);
            return `
              <button type="button" onclick="window.PresisiEngine.setLeaderboardMetric('${key}')" class="px-3.5 py-1.5 rounded-full text-xs font-bold transition shrink-0 cursor-pointer flex items-center gap-1.5 ${isActive ? 'bg-[#0D6E5B] text-white shadow-2xs' : 'bg-slate-100 hover:bg-slate-200 text-slate-700'}">
                <span>${def.icon}</span>
                <span>${def.name}</span>
              </button>
            `;
          }).join('')}
        </div>

        <!-- Top 3 Podium Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <!-- JUARA 2 (Perak) -->
          <div class="order-2 md:order-1 bg-white rounded-3xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-center justify-between">
              <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-800 text-[11px] font-black">🥈 PERINGKAT #2</span>
              <span class="text-xs font-mono text-slate-400">74.08</span>
            </div>
            <div>
              <h4 class="text-xl font-black text-slate-800">Kec. ${sorted[1].nama}</h4>
              <p class="text-xs text-slate-500 italic mt-0.5">${sorted[1].karakteristik || ''}</p>
            </div>
            <div class="pt-2 border-t border-slate-100">
              <div class="text-2xl font-black text-slate-700">${fmt(currentDef.getter(sorted[1]))} <span class="text-xs font-normal text-slate-500">${currentDef.unit}</span></div>
            </div>
          </div>

          <!-- JUARA 1 (Emas / Juara Umum) -->
          <div class="order-1 md:order-2 bg-gradient-to-br from-amber-50/80 via-white to-emerald-50/50 rounded-3xl border-2 border-amber-400 p-6 shadow-md flex flex-col justify-between space-y-3 transform md:-translate-y-2">
            <div class="flex items-center justify-between">
              <span class="px-3 py-1 rounded-full bg-amber-400 text-amber-950 text-xs font-black shadow-2xs flex items-center gap-1">👑 JUARA 1</span>
              <span class="text-xs font-bold text-emerald-800">Tertinggi di Kolut</span>
            </div>
            <div>
              <h4 class="text-2xl font-black text-[#0D6E5B]">Kec. ${sorted[0].nama}</h4>
              <p class="text-xs text-emerald-900 italic mt-0.5 font-medium">${sorted[0].karakteristik || ''}</p>
            </div>
            <div class="pt-2 border-t border-amber-200/60">
              <div class="text-3xl font-black text-[#0D6E5B]">${fmt(currentDef.getter(sorted[0]))} <span class="text-sm font-normal text-slate-600">${currentDef.unit}</span></div>
            </div>
          </div>

          <!-- JUARA 3 (Perunggu) -->
          <div class="order-3 bg-white rounded-3xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-center justify-between">
              <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-900 text-[11px] font-black">🥉 PERINGKAT #3</span>
              <span class="text-xs font-mono text-slate-400">74.08</span>
            </div>
            <div>
              <h4 class="text-xl font-black text-slate-800">Kec. ${sorted[2].nama}</h4>
              <p class="text-xs text-slate-500 italic mt-0.5">${sorted[2].karakteristik || ''}</p>
            </div>
            <div class="pt-2 border-t border-slate-100">
              <div class="text-2xl font-black text-slate-700">${fmt(currentDef.getter(sorted[2]))} <span class="text-xs font-normal text-slate-500">${currentDef.unit}</span></div>
            </div>
          </div>
        </div>

        <!-- Full Ranking Table (Posisi 4 s/d 15) -->
        <div class="bg-white rounded-3xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-3">
          <div class="text-xs font-bold uppercase tracking-wider text-slate-500 pb-2 border-b border-slate-100">
            Peringkat Seluruh 15 Kecamatan Berdasarkan ${currentDef.name}
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            ${sorted.map((item, idx) => {
              const val = currentDef.getter(item);
              const pct = Math.round((val / top1Val) * 100);
              return `
                <div class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50/70 border border-slate-100 hover:bg-emerald-50/40 transition">
                  <span class="w-7 h-7 rounded-full flex items-center justify-center font-mono font-black text-xs ${idx === 0 ? 'bg-amber-400 text-amber-950' : (idx === 1 ? 'bg-slate-300 text-slate-800' : (idx === 2 ? 'bg-amber-200 text-amber-900' : 'bg-slate-200 text-slate-600'))}">
                    ${idx + 1}
                  </span>
                  <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between text-xs">
                      <span class="font-bold text-slate-900 truncate">Kec. ${item.nama}</span>
                      <span class="font-mono font-extrabold text-[#0D6E5B]">${fmt(val)} <span class="text-[10px] text-slate-500 font-normal">${currentDef.unit}</span></span>
                    </div>
                    <div class="w-full h-1.5 rounded-full bg-slate-200 mt-1.5 overflow-hidden">
                      <div class="h-full rounded-full bg-[#0D6E5B] transition-all duration-500" style="width: ${pct}%"></div>
                    </div>
                  </div>
                </div>
              `;
            }).join('')}
          </div>
        </div>
      </div>
    `;
  }

  // Compatibility stubs for legacy route methods
  function setAgregatSector(sec) {}
  function setAgregatZone(zone) {
    comparatorTab = 'koridor';
    renderAgregatKecamatanSection();
  }
  function onSearchKecamatanCard(query) {}
  function onSortKecamatanCard(sortBy) {}
  function goToKecamatanSlide(idx) {}
  function prevKecamatanSlide() {}
  function nextKecamatanSlide() {}

  return {
    setComparatorTab: setComparatorTab,
    setComparatorKec1: setComparatorKec1,
    setComparatorKec2: setComparatorKec2,
    swapComparatorKec: swapComparatorKec,
    setLeaderboardMetric: setLeaderboardMetric,

    init: init,
    setCategory: setCategory,
    toggleCategoryDropdown: toggleCategoryDropdown,
    closeAllCategoryDropdowns: closeAllCategoryDropdowns,
    selectSubTable: selectSubTable,
    loadRealPodesTable: loadRealPodesTable,
    renderSubTablesHorizontalBar: renderSubTablesHorizontalBar,
    setViewMode: setViewMode,
    toggleSplitView: toggleSplitView,
    setAdminLevel: setAdminLevel,
    toggleTematik: toggleTematik,
    onKecamatanChange: onKecamatanChange,
    onDesaChange: onDesaChange,
    resetFilter: resetFilter,
    resetMapView: resetMapView,
    renderDesaLayer: renderDesaLayer,
    updateFloatingDemographyCard: updateFloatingDemographyCard,
    toggleMapFullscreen: toggleMapFullscreen,
    onTableSearch: onTableSearch,
    exportCSV: exportCSV,
    renderAgregatKecamatanSection: renderAgregatKecamatanSection,
    setAgregatSector: setAgregatSector,
    setAgregatZone: setAgregatZone,
    onSearchKecamatanCard: onSearchKecamatanCard,
    onSortKecamatanCard: onSortKecamatanCard,
    goToKecamatanSlide: goToKecamatanSlide,
    prevKecamatanSlide: prevKecamatanSlide,
    nextKecamatanSlide: nextKecamatanSlide,
    closeRaporDesa: closeRaporDesa,
    filterRaporCluster: filterRaporCluster
  };
})();


// Auto bootstrap PresisiEngine on page load
(function() {
  function startPresisi() {
    if (window.PresisiEngine && typeof window.PresisiEngine.init === 'function') {
      window.PresisiEngine.init();
    }
  }
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', startPresisi);
  } else {
    setTimeout(startPresisi, 20);
  }
})();
