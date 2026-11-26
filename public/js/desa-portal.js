/**
 * DESA PORTAL ENGINE - SISTEM WEBSITE RESMI DESA & KELURAHAN TERINTEGRASI DESCAN
 * Kabupaten Kolaka Utara (Kecamatan Kodeoha & Kecamatan Tiwu)
 * Mendukung 6 Desa Binaan: Kamisi, Koroha, Mala-Mala, Lapolu, Tanggeawo, Mattiro Bulu
 * Palet Warna: Hijau Desa Madani (#3B4D3B), Emas/Kuning Lembut, Putih Bersih
 */

const VILLAGE_PORTAL_DATA = {
    kamisi: {
        key: 'kamisi',
        type: 'Desa',
        name: 'Desa Kamisi',
        upperTitle: 'PEMERINTAH DESA KAMISI',
        kecamatan: 'Kodeoha',
        kabupaten: 'Kabupaten Kolaka Utara',
        motto: 'Bahari Mandiri, Sejahtera & Sadar Data',
        kades: {
            title: 'Kepala Desa Kamisi',
            name: 'Baharuddin, S.Pd.',
            period: '2021 - 2027',
            photo: '/images/desa/kamisi.jpg',
            sambutan: 'Puji syukur kita panjatkan ke hadirat Allah SWT, berkat integrasi Program Desa Cantik (Desa Cinta Statistik) BPS Kolaka Utara, kini Desa Kamisi memiliki keterbukaan data dan transparansi publik yang terpercaya. Melalui portal resmi ini, seluruh warga nelayan pesisir dan pekebun kakao dapat mengakses layanan kependudukan secara mandiri, melihat realisasi APBDes, dan memantau kemajuan pembangunan desa secara langsung.'
        },
        stats: {
            penduduk: '1.576',
            kk: '394',
            luas: '14,8 km²',
            dusun: '4 Dusun',
            progresDescan: '98%',
            kemiskinan: '3,1%',
            stunting: '2 Balita',
            ikm: '14 Unit'
        },
        dusunList: [
            { no: 1, nama: 'Dusun I Bahari', kadus: 'Jumardi', rt: 3, kk: 104, fokus: 'Nelayan Tangkap & Dermaga' },
            { no: 2, nama: 'Dusun II Pantai Indah', kadus: 'Amiruddin', rt: 2, kk: 98, fokus: 'Pengeringan Teri & Rumput Laut' },
            { no: 3, nama: 'Dusun III Sejahtera', kadus: 'Muh. Yusuf', rt: 3, kk: 102, fokus: 'Perkebunan Kakao Sambung Pucuk' },
            { no: 4, nama: 'Dusun IV Harapan Baru', kadus: 'Samsir, S.Sos.', rt: 2, kk: 90, fokus: 'Permukiman & Sentra Pertukangan' }
        ],
        perangkatList: [
            { jabatan: 'Kepala Desa', nama: 'Baharuddin, S.Pd.', status: 'Aktif', nipd: '7408032001' },
            { jabatan: 'Sekretaris Desa', nama: 'Ilyas Pratama, S.Si.', status: 'Aktif', nipd: '7408032002' },
            { jabatan: 'Kaur Keuangan (Bendahara)', nama: 'Hasnawati, S.E.', status: 'Aktif', nipd: '7408032003' },
            { jabatan: 'Kaur Tata Usaha & Umum', nama: 'Aris Munandar', status: 'Aktif', nipd: '7408032004' },
            { jabatan: 'Kaur Perencanaan', nama: 'Fadli Akbar, A.Md.', status: 'Aktif', nipd: '7408032005' },
            { jabatan: 'Kasi Pemerintahan', nama: 'Mansyur, S.IP.', status: 'Aktif', nipd: '7408032006' },
            { jabatan: 'Kasi Kesejahteraan', nama: 'Nurlela, S.Pd.', status: 'Aktif', nipd: '7408032007' },
            { jabatan: 'Kasi Pelayanan', nama: 'Zainal Abidin', status: 'Aktif', nipd: '7408032008' }
        ],
        wisataPotensi: {
            kategori: 'Pesisir Bahari & Perikanan Tangkap',
            tagline: 'Kawasan Bahari Unggulan Teluk Bone & Pengeringan Teri Nasi',
            items: [
                {
                    judul: 'Sentra Perikanan Tangkap Teri Nasi & Ikan Karang',
                    deskripsi: 'Desa Kamisi merupakan produsen teri nasi higienis dan ikan segar kualitas pasar ekspor dengan armada nelayan tradisional bermesin gantung ramah lingkungan.',
                    lokasi: 'Pesisir Teluk Bone Dusun Bahari',
                    icon: '🐟'
                },
                {
                    judul: 'Budidaya Rumput Laut Eucheuma Cottonii',
                    deskripsi: 'Hamparan perairan jernih pesisir Kamisi dimanfaatkan oleh kelompok nelayan untuk budidaya rumput laut dengan sistem bentangan rakit apung berkelanjutan.',
                    lokasi: 'Perairan Teluk Bone Bagian Selatan',
                    icon: '🌿'
                },
                {
                    judul: 'Perkebunan Kakao Sambung Pucuk Organik',
                    deskripsi: 'Area dataran Desa Kamisi membentang kebun kakao binaan dengan teknik sambung pucuk varietas unggul yang menghasilkan biji kakao fermentasi bernilai jual tinggi.',
                    lokasi: 'Dusun III Sejahtera',
                    icon: '🍫'
                }
            ]
        }
    },

    koroha: {
        key: 'koroha',
        type: 'Desa',
        name: 'Desa Koroha',
        upperTitle: 'PEMERINTAH DESA KOROHA',
        kecamatan: 'Kodeoha',
        kabupaten: 'Kabupaten Kolaka Utara',
        motto: 'Kemandirian Maritim & Perkebunan Maju',
        kades: {
            title: 'Kepala Desa Koroha',
            name: 'Rustam Effendi, S.IP.',
            period: '2021 - 2027',
            photo: '/images/desa/koroha.jpg',
            sambutan: 'Selamat datang di Website Resmi Desa Koroha. Kolaborasi kami dengan Badan Pusat Statistik (BPS) Kabupaten Kolaka Utara dalam program Desa Cinta Statistik telah melahirkan satu basis data desa yang presisi. Kami berkomitmen memberikan pelayanan terbaik, memajukan sektor perkebunan kakao perbukitan serta menjaga kelestarian pesisir Koroha untuk kesejahteraan bersama.'
        },
        stats: {
            penduduk: '1.340',
            kk: '335',
            luas: '16,2 km²',
            dusun: '3 Dusun',
            progresDescan: '72%',
            kemiskinan: '4,2%',
            stunting: '3 Balita',
            ikm: '16 Unit'
        },
        dusunList: [
            { no: 1, nama: 'Dusun I Kakao Mas', kadus: 'Sudirman K.', rt: 3, kk: 118, fokus: 'Sentra Kakao Sambung Pucuk' },
            { no: 2, nama: 'Dusun II Subur Makmur', kadus: 'Darmansyah', rt: 2, kk: 110, fokus: 'Cengkeh & Tanaman Buah' },
            { no: 3, nama: 'Dusun III Pantai Damai', kadus: 'Muh. Tahir', rt: 2, kk: 107, fokus: 'Perikanan & UMKM Olahan' }
        ],
        perangkatList: [
            { jabatan: 'Kepala Desa', nama: 'Rustam Effendi, S.IP.', status: 'Aktif', nipd: '7408032011' },
            { jabatan: 'Sekretaris Desa', nama: 'M. Ridwan, S.Kom.', status: 'Aktif', nipd: '7408032012' },
            { jabatan: 'Kaur Keuangan', nama: 'Hardianti, A.Md.Ak.', status: 'Aktif', nipd: '7408032013' },
            { jabatan: 'Kaur Umum & Tata Usaha', nama: 'Lukman Hakim', status: 'Aktif', nipd: '7408032014' },
            { jabatan: 'Kaur Perencanaan', nama: 'Suryani, S.P.', status: 'Aktif', nipd: '7408032015' },
            { jabatan: 'Kasi Pemerintahan', nama: 'Ilhamuddin, S.Pd.', status: 'Aktif', nipd: '7408032016' },
            { jabatan: 'Kasi Kesejahteraan', nama: 'Rosmini, S.Pd.I.', status: 'Aktif', nipd: '7408032017' },
            { jabatan: 'Kasi Pelayanan', nama: 'Kaharuddin', status: 'Aktif', nipd: '7408032018' }
        ],
        wisataPotensi: {
            kategori: 'Agrowisata Kakao & Bahari',
            tagline: 'Perpaduan Kebun Kakao Sambung Pucuk & Panorama Pesisir Hijau',
            items: [
                {
                    judul: 'Perkebunan Kakao Sambung Pucuk Varietas Sulawesi',
                    deskripsi: 'Sentra budidaya kakao dengan produktivitas 1,4 ton/hektar per tahun, dilengkapi rumah penjemuran surya dan fermentasi kelompok tani.',
                    lokasi: 'Dusun I Kakao Mas',
                    icon: '🌱'
                },
                {
                    judul: 'Cengkeh Perbukitan Koroha',
                    deskripsi: 'Pohon cengkeh dewasa di lereng bukit menghasilkan cengkeh kering beraroma tajam yang diserap pasar rempah nasional.',
                    lokasi: 'Dusun II Subur Makmur',
                    icon: '🌿'
                },
                {
                    judul: 'Pantai Sunset Teluk Bone Koroha',
                    deskripsi: 'Pesisir alami berpasir lembut dengan panorama matahari terbenam Teluk Bone, sangat potensial untuk rintisan desa wisata bahari.',
                    lokasi: 'Dusun III Pantai Damai',
                    icon: '🌅'
                }
            ]
        }
    },

    malamala: {
        key: 'malamala',
        type: 'Kelurahan',
        name: 'Kelurahan Mala-Mala',
        upperTitle: 'PEMERINTAH KELURAHAN MALA-MALA',
        kecamatan: 'Kodeoha',
        kabupaten: 'Kabupaten Kolaka Utara',
        motto: 'Pusat Niaga, Unggul dalam Pelayanan Digital',
        kades: {
            title: 'Lurah Mala-Mala',
            name: 'H. Syamsul Bahri, S.Sos., M.Si.',
            period: 'Aparatur Sipil Negara (ASN)',
            photo: '/images/desa/malamala.jpg',
            sambutan: 'Assalamu Alaikum Wr. Wb. Sebagai pusat perlintasan dan perekonomian di Kecamatan Kodeoha, Kelurahan Mala-Mala terus berbenah memberikan pelayanan prima kepada masyarakat. Keberadaan program DESCAN dari BPS memperkuat data kependudukan dan memfasilitasi pelaku UMKM kuliner maupun pasar rakyat untuk berkembang dengan dasar data yang valid.'
        },
        stats: {
            penduduk: '1.488',
            kk: '372',
            luas: '9,4 km²',
            dusun: '4 Lingkungan',
            progresDescan: '88%',
            kemiskinan: '2,8%',
            stunting: '1 Balita',
            ikm: '28 Unit'
        },
        dusunList: [
            { no: 1, nama: 'Lingkungan I Pasar Lama', kadus: 'Kahar Muzakkar', rt: 3, kk: 98, fokus: 'Pusat Niaga & Pertokoan' },
            { no: 2, nama: 'Lingkungan II Mekar Jaya', kadus: 'Drs. Usman', rt: 3, kk: 95, fokus: 'Permukiman & Sentra UMKM' },
            { no: 3, nama: 'Lingkungan III Bunga Tanjung', kadus: 'H. Basir', rt: 2, kk: 91, fokus: 'Sentra Kuliner Mekongga' },
            { no: 4, nama: 'Lingkungan IV Karya Bhakti', kadus: 'Zaenal, S.E.', rt: 2, kk: 88, fokus: 'Perkantoran & Pertanian Sayur' }
        ],
        perangkatList: [
            { jabatan: 'Lurah Mala-Mala', nama: 'H. Syamsul Bahri, S.Sos., M.Si.', status: 'Aktif', nipd: '197508122002121004' },
            { jabatan: 'Sekretaris Kelurahan', nama: 'Hj. Mardiana, S.AP.', status: 'Aktif', nipd: '197904152006042011' },
            { jabatan: 'Kasi Pemerintahan & Trantibum', nama: 'Ahmad Yani, S.Sos.', status: 'Aktif', nipd: '198203202009031008' },
            { jabatan: 'Kasi Pemberdayaan Masyarakat', nama: 'Dra. Salmawati', status: 'Aktif', nipd: '198006182008012015' },
            { jabatan: 'Kasi Kesejahteraan Sosial', nama: 'M. Arsyad, S.E.', status: 'Aktif', nipd: '198411052010011022' },
            { jabatan: 'Staf Administrasi Pelayanan', nama: 'Siti Rohani, A.Md.', status: 'Aktif', nipd: '199002142015032007' }
        ],
        wisataPotensi: {
            kategori: 'Pusat UMKM & Pasar Rakyat',
            tagline: 'Sentra Kuliner Khas Kolaka Utara & Niaga Modern',
            items: [
                {
                    judul: 'Sentra Kuliner Mekongga: Sinonggi & Kapurung',
                    deskripsi: 'Pusat kuliner tradisional berbahan sagu dengan kuah kuning ikan bandeng dan palumara segar yang menjadi ikon destinasi rasa di Kodeoha.',
                    lokasi: 'Jalan Poros Trans Sulawesi Mala-Mala',
                    icon: '🍲'
                },
                {
                    judul: 'Pasar Rakyat Tradisional Terintegrasi Kodeoha',
                    deskripsi: 'Pusat distribusi komoditas perkebunan, sayur mayur perbukitan, serta hasil tangkapan laut nelayan antardesa se-Kecamatan Kodeoha.',
                    lokasi: 'Lingkungan I Pasar Lama',
                    icon: '🏪'
                },
                {
                    judul: 'Ruang Terbuka Hijau & Galeri UMKM Kreatif',
                    deskripsi: 'Kawasan publik ramah anak dan sentra penjualan cenderamata kriya olahan limbah batok kelapa serta kerajinan tangan lokal.',
                    lokasi: 'Pusat Lingkungan II Mekar Jaya',
                    icon: '🌳'
                }
            ]
        }
    },

    lapolu: {
        key: 'lapolu',
        type: 'Desa',
        name: 'Desa Lapolu',
        upperTitle: 'PEMERINTAH DESA LAPOLU',
        kecamatan: 'Tiwu',
        kabupaten: 'Kabupaten Kolaka Utara',
        motto: 'Sentra Cengkeh & Industri Mikro Mandiri',
        kades: {
            title: 'Kepala Desa Lapolu',
            name: 'Asrianto, S.Pd.I.',
            period: '2021 - 2027',
            photo: '/images/desa/lapolu.jpg',
            sambutan: 'Bismillahir Rahmanir Rahim. Kami menyambut hangat kehadiran seluruh pengunjung di Website Resmi Desa Lapolu. Terpilihnya Lapolu sebagai salah satu desa percontohan Desa Cantik membuktikan bahwa data adalah kunci kemajuan. Kami berkomitmen menjaga transparansi penyelenggaraan pemerintahan, mendukung petani cengkeh dan kakao, serta memfasilitasi UMKM perdesaan menuju era digital.'
        },
        stats: {
            penduduk: '1.284',
            kk: '321',
            luas: '18,5 km²',
            dusun: '3 Dusun',
            progresDescan: '88%',
            kemiskinan: '3,8%',
            stunting: '2 Balita',
            ikm: '75 Unit'
        },
        dusunList: [
            { no: 1, nama: 'Dusun I Cengkeh Indah', kadus: 'Muh. Kasim', rt: 3, kk: 112, fokus: 'Sentra Perkebunan Cengkeh & Kakao' },
            { no: 2, nama: 'Dusun II Bukit Harapan', kadus: 'Alimuddin, S.Pd.', rt: 2, kk: 105, fokus: 'Industri Gula Aren & Bambu' },
            { no: 3, nama: 'Dusun III Lembah Subur', kadus: 'Basri', rt: 2, kk: 104, fokus: 'Peternakan & Hortikultura' }
        ],
        perangkatList: [
            { jabatan: 'Kepala Desa', nama: 'Asrianto, S.Pd.I.', status: 'Aktif', nipd: '7408042001' },
            { jabatan: 'Sekretaris Desa', nama: 'Jumran, S.Sos.', status: 'Aktif', nipd: '7408042002' },
            { jabatan: 'Kaur Keuangan', nama: 'Hardianti, S.E.', status: 'Aktif', nipd: '7408042003' },
            { jabatan: 'Kaur Umum & TU', nama: 'Syahril', status: 'Aktif', nipd: '7408042004' },
            { jabatan: 'Kaur Perencanaan', nama: 'Irmawati, S.Pd.', status: 'Aktif', nipd: '7408042005' },
            { jabatan: 'Kasi Pemerintahan', nama: 'Arifuddin', status: 'Aktif', nipd: '7408042006' },
            { jabatan: 'Kasi Kesejahteraan', nama: 'Nurhidayah, S.Kom.', status: 'Aktif', nipd: '7408042007' },
            { jabatan: 'Kasi Pelayanan', nama: 'M. Darwis', status: 'Aktif', nipd: '7408042008' }
        ],
        wisataPotensi: {
            kategori: 'Agrowisata Cengkeh & Industri Mikro',
            tagline: 'Harmoni Lembah Hijau Tiwu & Sentra Rempah Nusantara',
            items: [
                {
                    judul: 'Perkebunan Cengkeh Lereng Perbukitan Tiwu',
                    deskripsi: 'Hamparan pohon cengkeh Zanzibar produktif yang menghijaukan lereng perbukitan Tiwu dengan hasil panen berkualitas grade A.',
                    lokasi: 'Dusun I Cengkeh Indah',
                    icon: '🌿'
                },
                {
                    judul: 'Industri Rumah Tangga Gula Aren Murni',
                    deskripsi: 'Pengolahan nira pohon enau alami secara tradisional menghasilkan gula aren cetak dan semut beraroma wangi tanpa pemanis buatan.',
                    lokasi: 'Dusun II Bukit Harapan',
                    icon: '🍯'
                },
                {
                    judul: 'Puncak Panorama Bukit Lembah Tiwu',
                    deskripsi: 'Titik tertinggi di Desa Lapolu yang menyuguhkan pemandangan bentang alam perbukitan hijau berkabut dan udara pegunungan segar.',
                    lokasi: 'Puncak Bukit Lapolu',
                    icon: '⛰️'
                }
            ]
        }
    },

    tanggeawo: {
        key: 'tanggeawo',
        type: 'Desa',
        name: 'Desa Tanggeawo',
        upperTitle: 'PEMERINTAH DESA TANGGEAWO',
        kecamatan: 'Tiwu',
        kabupaten: 'Kabupaten Kolaka Utara',
        motto: 'Lumbung Agrikultur, Berbudaya & Mandiri',
        kades: {
            title: 'Kepala Desa Tanggeawo',
            name: 'Mukhtar, S.Ag.',
            period: '2021 - 2027',
            photo: '/images/desa/tanggeawo.jpg',
            sambutan: 'Assalamu Alaikum Wr. Wb. Melalui keterpaduan data spasial dan demografi program Desa Cantik, Desa Tanggeawo kini melangkah pasti mewujudkan tata kelola desa modern. Kami menyajikan informasi terbuka terkait pembangunan infrastruktur tani, data kependudukan, serta potensi perkebunan kakao dan hortikultura yang menjadi tulang punggung perekonomian masyarakat.'
        },
        stats: {
            penduduk: '1.768',
            kk: '442',
            luas: '21,4 km²',
            dusun: '4 Dusun',
            progresDescan: '84%',
            kemiskinan: '3,2%',
            stunting: '1 Balita',
            ikm: '46 Unit'
        },
        dusunList: [
            { no: 1, nama: 'Dusun I Sumber Jaya', kadus: 'H. Sudarso', rt: 3, kk: 118, fokus: 'Sentra Pembibitan Kakao' },
            { no: 2, nama: 'Dusun II Mekar Sari', kadus: 'Jalaluddin', rt: 3, kk: 112, fokus: 'Hortikultura & Buah Naga' },
            { no: 3, nama: 'Dusun III Tanggeawo Timur', kadus: 'Muh. Idrus', rt: 3, kk: 108, fokus: 'Irigasi Pertanian & Padi' },
            { no: 4, nama: 'Dusun IV Harapan Makmur', kadus: 'Anasir, S.E.', rt: 2, kk: 104, fokus: 'Peternakan Kambing & Sapi' }
        ],
        perangkatList: [
            { jabatan: 'Kepala Desa', nama: 'Mukhtar, S.Ag.', status: 'Aktif', nipd: '7408042021' },
            { jabatan: 'Sekretaris Desa', nama: 'Sahrir, S.Pd.', status: 'Aktif', nipd: '7408042022' },
            { jabatan: 'Kaur Keuangan', nama: 'Mulyati, S.Ak.', status: 'Aktif', nipd: '7408042023' },
            { jabatan: 'Kaur Umum & Tata Usaha', nama: 'Bambang Irawan', status: 'Aktif', nipd: '7408042024' },
            { jabatan: 'Kaur Perencanaan', nama: 'Nurlela, S.E.', status: 'Aktif', nipd: '7408042025' },
            { jabatan: 'Kasi Pemerintahan', nama: 'Kahar Muzakkar, S.IP.', status: 'Aktif', nipd: '7408042026' },
            { jabatan: 'Kasi Kesejahteraan', nama: 'Husna, S.Pd.I.', status: 'Aktif', nipd: '7408042027' },
            { jabatan: 'Kasi Pelayanan', nama: 'Hasran', status: 'Aktif', nipd: '7408042028' }
        ],
        wisataPotensi: {
            kategori: 'Agrikultur Mandiri & Hortikultura',
            tagline: 'Kawasan Perkebunan Kakao Terluas & Sentra Buah Tiwu',
            items: [
                {
                    judul: 'Sentra Pembibitan & Edukasi Kakao Sambung Pucuk',
                    deskripsi: 'Pusat pelatihan petani muda dalam perbanyakan bibit kakao klonal unggul yang menyuplai bibit bersertifikat ke berbagai daerah di Sulawesi Tenggara.',
                    lokasi: 'Dusun I Sumber Jaya',
                    icon: '🌱'
                },
                {
                    judul: 'Perkebunan Buah Durian Montong & Buah Naga',
                    deskripsi: 'Kawasan agrowisata petik buah langsung dari pohon dengan cita rasa manis legit yang menjadi magnet pengunjung saat musim panen.',
                    lokasi: 'Dusun II Mekar Sari',
                    icon: '🍈'
                },
                {
                    judul: 'Kawasan Bendungan Irigasi & Sawah Terpadu',
                    deskripsi: 'Sistem irigasi teknis yang menjamin pasokan air sepanjang tahun bagi sawah padi organik kelompok tani Tanggeawo.',
                    lokasi: 'Dusun III Tanggeawo Timur',
                    icon: '🌾'
                }
            ]
        }
    },

    mattirobulu: {
        key: 'mattirobulu',
        type: 'Desa',
        name: 'Desa Mattiro Bulu',
        upperTitle: 'PEMERINTAH DESA MATTIRO BULU',
        kecamatan: 'Tiwu',
        kabupaten: 'Kabupaten Kolaka Utara',
        motto: 'Menatap Puncak Kesejahteraan Berbasis Nilam & Cengkeh',
        kades: {
            title: 'Kepala Desa Mattiro Bulu',
            name: 'Sudirman J., S.E.',
            period: '2021 - 2027',
            photo: '/images/desa/mattirobulu.jpg',
            sambutan: 'Salam sejahtera untuk kita sekalian. Sesuai makna namanya "Mattiro Bulu" yang berarti memandang keindahan dari puncak bukit, desa kami dianugerahi tanah subur penghasil minyak atsiri nilam dan cengkeh bermutu tinggi. Portal ini hadir sebagai wujud nyata keterbukaan informasi dan pelayanan cerdas Desa Cantik BPS Kolaka Utara bagi kemaslahatan warga.'
        },
        stats: {
            penduduk: '1.278',
            kk: '319',
            luas: '24,6 km²',
            dusun: '3 Dusun',
            progresDescan: '79%',
            kemiskinan: '4,5%',
            stunting: '2 Balita',
            ikm: '20 Unit'
        },
        dusunList: [
            { no: 1, nama: 'Dusun I Bulu Puncak', kadus: 'Ambo Sakka', rt: 3, kk: 110, fokus: 'Puncak Pemandangan & Cengkeh' },
            { no: 2, nama: 'Dusun II Nilam Wangi', kadus: 'Muh. Ilyas', rt: 2, kk: 106, fokus: 'Sentra Penyulingan Minyak Nilam' },
            { no: 3, nama: 'Dusun III Dataran Hijau', kadus: 'Mustafa', rt: 2, kk: 103, fokus: 'Kopi Robusta & Hortikultura' }
        ],
        perangkatList: [
            { jabatan: 'Kepala Desa', nama: 'Sudirman J., S.E.', status: 'Aktif', nipd: '7408042031' },
            { jabatan: 'Sekretaris Desa', nama: 'Lukman, S.Pd.', status: 'Aktif', nipd: '7408042032' },
            { jabatan: 'Kaur Keuangan', nama: 'Suhartini, S.Ak.', status: 'Aktif', nipd: '7408042033' },
            { jabatan: 'Kaur Umum & Tata Usaha', nama: 'Ardiansyah', status: 'Aktif', nipd: '7408042034' },
            { jabatan: 'Kaur Perencanaan', nama: 'Fatmawati, S.Sos.', status: 'Aktif', nipd: '7408042035' },
            { jabatan: 'Kasi Pemerintahan', nama: 'Nasruddin, S.Pd.I.', status: 'Aktif', nipd: '7408042036' },
            { jabatan: 'Kasi Kesejahteraan', nama: 'Hamsiah', status: 'Aktif', nipd: '7408042037' },
            { jabatan: 'Kasi Pelayanan', nama: 'Kamaruddin', status: 'Aktif', nipd: '7408042038' }
        ],
        wisataPotensi: {
            kategori: 'Penyulingan Nilam & Dataran Tinggi',
            tagline: 'Sentra Minyak Atsiri Nilam & Puncak Sejuk Panorama Tiwu',
            items: [
                {
                    judul: 'Sentra Ketel Penyulingan Tradisional Minyak Nilam',
                    deskripsi: 'Penyulingan daun nilam kering menggunakan ketel uap stainless menghasilkan minyak nilam (patchouli oil) kadar PA > 32% standar parfum ekspor.',
                    lokasi: 'Dusun II Nilam Wangi',
                    icon: '🪔'
                },
                {
                    judul: 'Perkebunan Kopi Robusta Pegunungan Kolaka Utara',
                    deskripsi: 'Budidaya tanaman kopi robusta dataran tinggi dengan proses petik merah dan penjemuran alami menghasilkan cita rasa khas beraroma rempah.',
                    lokasi: 'Dusun III Dataran Hijau',
                    icon: '☕'
                },
                {
                    judul: 'Wisata Puncak Negeri di Atas Awan Mattiro Bulu',
                    deskripsi: 'Spot panorama bukit dengan pemandangan hamparan awan putih pagi hari dan lanskap perbukitan hijau yang mempesona.',
                    lokasi: 'Dusun I Bulu Puncak',
                    icon: '☁️'
                }
            ]
        }
    }
};

// Aliases for compatibility
VILLAGE_PORTAL_DATA['cijati'] = VILLAGE_PORTAL_DATA['kamisi'];
VILLAGE_PORTAL_DATA['harapan'] = VILLAGE_PORTAL_DATA['koroha'];
VILLAGE_PORTAL_DATA['lestari'] = VILLAGE_PORTAL_DATA['malamala'];
VILLAGE_PORTAL_DATA['mekarwangi'] = VILLAGE_PORTAL_DATA['lapolu'];
VILLAGE_PORTAL_DATA['sukamaju'] = VILLAGE_PORTAL_DATA['tanggeawo'];
VILLAGE_PORTAL_DATA['tegalasri'] = VILLAGE_PORTAL_DATA['mattirobulu'];
if (typeof window !== 'undefined') window.VILLAGE_PORTAL_DATA = VILLAGE_PORTAL_DATA;
if (typeof global !== 'undefined') global.VILLAGE_PORTAL_DATA = VILLAGE_PORTAL_DATA;


// ==============================================================
// 1. STATE & HELPER FUNCTIONS
// ==============================================================
let currentPortalDesaKey = 'lapolu';
let currentPortalActiveMenu = 'beranda';
let currentPortalActiveSub = 'beranda';

function getActiveDesaData(optionalKey) {
    let key = optionalKey;
    if (!key && typeof currentPortalDesaKey !== 'undefined' && currentPortalDesaKey) {
        key = currentPortalDesaKey;
    }
    if (!key && typeof currentVillageKey !== 'undefined' && currentVillageKey) {
        key = currentVillageKey;
    }
    if (!key && typeof currentTargetVillage !== 'undefined' && currentTargetVillage) {
        key = currentTargetVillage;
    }
    key = key || 'lapolu';
    const raw = (typeof VILLAGE_PORTAL_DATA !== 'undefined' && VILLAGE_PORTAL_DATA[key]) ? VILLAGE_PORTAL_DATA[key] : ((typeof VILLAGE_PORTAL_DATA !== 'undefined' && VILLAGE_PORTAL_DATA['lapolu']) ? VILLAGE_PORTAL_DATA['lapolu'] : { key: 'lapolu', name: 'Desa Lapolu', upperTitle: 'PEMERINTAH DESA LAPOLU', kecamatan: 'Tiwu', kabupaten: 'Kabupaten Kolaka Utara', motto: 'Sentra Cengkeh & IMK' });
    
    // Normalize properties so template strings never fail
    const kadesName = raw.kades ? (raw.kades.name || raw.kades.nama || 'Kepala Desa') : 'Kepala Desa';
    const kadesPhoto = raw.kades ? (raw.kades.photo || raw.kades.foto || ('/images/desa/' + raw.key + '.jpg')) : ('/images/desa/' + raw.key + '.jpg');
    const kadesPeriod = raw.kades ? (raw.kades.period || raw.kades.periode || '2021 - 2027') : '2021 - 2027';
    const kadesTitle = raw.kades ? (raw.kades.title || 'Kepala Desa') : 'Kepala Desa';
    const kadesSambutan = raw.kades ? (raw.kades.sambutan || 'Selamat datang di website resmi kami.') : 'Selamat datang.';

    const perangkat = (raw.perangkatList && raw.perangkatList.length) ? raw.perangkatList : (raw.perangkat || [
        { jabatan: 'Sekretaris Desa', nama: 'Jumran, S.Sos.', status: 'Aktif' },
        { jabatan: 'Kaur Keuangan', nama: 'Hardianti, S.E.', status: 'Aktif' },
        { jabatan: 'Kaur Perencanaan', nama: 'Irmawati, S.Pd.', status: 'Aktif' },
        { jabatan: 'Kasi Pemerintahan', nama: 'Arifuddin', status: 'Aktif' }
    ]);

    const dusun = (raw.dusunList && raw.dusunList.length) ? raw.dusunList : (raw.dusun || [
        { no: 1, nama: 'Dusun I Cengkeh Indah', kadus: 'Muh. Kasim', rt: 3, kk: 110, fokus: 'Perkebunan' },
        { no: 2, nama: 'Dusun II Bukit Harapan', kadus: 'Alimuddin', rt: 2, kk: 105, fokus: 'Pertanian' }
    ]);

    const berita = (raw.berita && raw.berita.length) ? raw.berita : [
        {
            judul: 'Musrenbangdes Penetapan RKPDes 2026',
            kategori: 'Pemerintahan',
            tanggal: '12 Februari 2026',
            foto: '/images/desa/' + raw.key + '.jpg',
            ringkasan: 'Pemerintah desa bersama BPD dan tokoh masyarakat menyepakati prioritas pembangunan infrastruktur tani dan penurunan stunting.'
        },
        {
            judul: 'Pembinaan 44 Indikator Desa Cantik BPS',
            kategori: 'Statistik',
            tanggal: '28 Januari 2026',
            foto: '/images/desa/' + raw.key + '.jpg',
            ringkasan: 'Tim BPS Kolaka Utara melaksanakan pendampingan pengisian data sektoral mikro untuk memperkuat akurasi Satu Data Indonesia.'
        },
        {
            judul: 'Penyaluran Bantuan Saprotan Petani',
            kategori: 'Ekonomi',
            tanggal: '15 Januari 2026',
            foto: '/images/desa/' + raw.key + '.jpg',
            ringkasan: 'Kelompok tani desa menerima bibit unggul dan pupuk organik untuk mendongkrak kualitas komoditas unggulan.'
        }
    ];

    const agenda = (raw.agenda && raw.agenda.length) ? raw.agenda : [
        { tanggal: 'Rabu, 04 Mar 2026', lokasi: 'Balai Pertemuan Desa', kegiatan: 'Rembuk Stunting & Posyandu Balita Terpadu' },
        { tanggal: 'Senin, 09 Mar 2026', lokasi: 'Aula Pertemuan', kegiatan: 'Sosialisasi Administrasi Surat Mandiri Warga' },
        { tanggal: 'Kamis, 19 Mar 2026', lokasi: 'Sentra Produksi', kegiatan: 'Pelatihan Pasca Panen Komoditas Binaan BUMDes' }
    ];

    const apbdes = raw.apbdes || {
        pendapatan: 'Rp 1.185.450.000',
        belanja: 'Rp 1.142.300.000',
        pembiayaan: 'Rp 43.150.000',
        bidang: [
            { nama: 'Bidang Penyelenggaraan Pemerintahan Desa', anggaran: 'Rp 385.200.000' },
            { nama: 'Bidang Pelaksanaan Pembangunan Desa', anggaran: 'Rp 492.600.000' },
            { nama: 'Bidang Pembinaan Kemasyarakatan Desa', anggaran: 'Rp 88.500.000' },
            { nama: 'Bidang Pemberdayaan Masyarakat Desa', anggaran: 'Rp 141.000.000' },
            { nama: 'Bidang Penanggulangan Bencana & Darurat', anggaran: 'Rp 35.000.000' }
        ]
    };

    const regulasi = (raw.regulasi && raw.regulasi.length) ? raw.regulasi : [
        { nomor: 'Perdes No. 01', tahun: '2026', judul: 'Laporan Pertanggungjawaban Realisasi APBDes', tentang: 'Pertanggungjawaban pelaksanaan anggaran pendapatan dan belanja desa tahun anggaran berjalan.' },
        { nomor: 'Perdes No. 02', tahun: '2026', judul: 'Rencana Kerja Pemerintah Desa (RKPDes) 2026', tentang: 'Pedoman arah program kerja dan prioritas pembangunan sektoral desa tahun 2026.' },
        { nomor: 'Perdes No. 04', tahun: '2025', judul: 'Pemanfaatan Data Statistik Sektoral Desa Cantik', tentang: 'Kewajiban penggunaan data presisi BPS dalam penyaluran bansos dan perencanaan desa.' },
        { nomor: 'Perkades No. 03', tahun: '2025', judul: 'Standar Operasional Pelayanan Surat Mandiri', tentang: 'Mekanisme penerbitan SKU, Domisili, dan Pengantar KTP secara digital dan bebas pungutan.' }
    ];

    const profil = raw.profil || {
        topografi: raw.stats?.luas ? ('Perdesaan ' + raw.kecamatan) : 'Perdesaan Agrikultur',
        luasWilayah: raw.stats?.luas || '16,5 km²',
        jumlahDusun: dusun.length + ' Dusun',
        batasUtara: 'Kecamatan Lasusua / Perkebunan',
        batasSelatan: 'Kawasan Pesisir Teluk Bone',
        batasTimur: 'Hamparan Pegunungan Tiwu',
        batasBarat: 'Batas Desa Tetangga'
    };

    const stats = raw.stats || {
        penduduk: '1.284',
        kk: '321',
        luas: '18,5 km²',
        dusun: '3 Dusun',
        progresDescan: '88%',
        kemiskinan: '3,8%',
        stunting: '2 Balita',
        ikm: '75 Unit'
    };

    return {
        ...raw,
        stats: {
            ...stats,
            descanStatus: stats.progresDescan || '90% (Terbina Aktif)'
        },
        kades: {
            title: kadesTitle,
            name: kadesName,
            nama: kadesName,
            period: kadesPeriod,
            periode: kadesPeriod,
            photo: kadesPhoto,
            foto: kadesPhoto,
            sambutan: kadesSambutan
        },
        perangkat,
        perangkatList: perangkat,
        dusun,
        dusunList: dusun,
        berita,
        agenda,
        apbdes,
        regulasi,
        profil,
        wisataPotensi: {
            kategori: raw.wisataPotensi?.kategori || 'Potensi Unggulan',
            tagline: raw.wisataPotensi?.tagline || 'Pemberdayaan Ekonomi Desa',
            items: (raw.wisataPotensi?.items || []).map(it => ({
                ...it,
                kapasitas: it.kapasitas || 'Grade A Unggulan'
            }))
        }
    };
}

// ==============================================================
// 2. DROPDOWN ENGINE & INTERACTION UTILITIES
// ==============================================================
var activeVillageDropdown = null;
var villageDropdownCloseTimeout = null;

function closeAllVillageDropdowns() {
    if (typeof document === 'undefined') return;
    document.querySelectorAll('.village-dropdown-panel').forEach(panel => {
        panel.classList.add('hidden');
    });
    document.querySelectorAll('.vnav-btn').forEach(btn => {
        const key = btn.getAttribute('data-menu-key');
        if (typeof currentPortalActiveMenu !== 'undefined' && key !== currentPortalActiveMenu) {
            btn.classList.remove('bg-[#03532c]', 'text-amber-300');
        }
    });
    activeVillageDropdown = null;
    if (typeof window !== 'undefined') window.activeVillageDropdown = null;
}

function toggleVillageDropdown(menuKey, event) {
    if (event) {
        if (typeof event.preventDefault === 'function') event.preventDefault();
        if (typeof event.stopPropagation === 'function') event.stopPropagation();
    }
    clearTimeout(villageDropdownCloseTimeout);
    if (typeof document === 'undefined') return;
    const targetDropdown = document.getElementById('vdropdown-' + menuKey);
    if (!targetDropdown) return;

    const isCurrentlyOpen = !targetDropdown.classList.contains('hidden');
    closeAllVillageDropdowns();

    if (!isCurrentlyOpen) {
        targetDropdown.classList.remove('hidden');
        activeVillageDropdown = menuKey;
        if (typeof window !== 'undefined') window.activeVillageDropdown = menuKey;
        const btn = document.getElementById('vmenu-' + menuKey);
        if (btn) btn.classList.add('bg-[#03532c]', 'text-amber-300');
    }
}

function openVillageDropdown(menuKey) {
    clearTimeout(villageDropdownCloseTimeout);
    closeAllVillageDropdowns();
    if (typeof document === 'undefined') return;
    const targetDropdown = document.getElementById('vdropdown-' + menuKey);
    if (targetDropdown) {
        targetDropdown.classList.remove('hidden');
        activeVillageDropdown = menuKey;
        if (typeof window !== 'undefined') window.activeVillageDropdown = menuKey;
        const btn = document.getElementById('vmenu-' + menuKey);
        if (btn) btn.classList.add('bg-[#03532c]', 'text-amber-300');
    }
}

function scheduleCloseVillageDropdown(menuKey) {
    clearTimeout(villageDropdownCloseTimeout);
    villageDropdownCloseTimeout = setTimeout(() => {
        closeAllVillageDropdowns();
    }, 280);
}

function cancelCloseVillageDropdown() {
    clearTimeout(villageDropdownCloseTimeout);
}

// Expose globally to window
if (typeof window !== 'undefined') {
    window.closeAllVillageDropdowns = closeAllVillageDropdowns;
    window.toggleVillageDropdown = toggleVillageDropdown;
    window.openVillageDropdown = openVillageDropdown;
    window.scheduleCloseVillageDropdown = scheduleCloseVillageDropdown;
    window.cancelCloseVillageDropdown = cancelCloseVillageDropdown;
    window.activeVillageDropdown = activeVillageDropdown;

    // Global click-outside listener to close dropdowns
    if (!window.__villageDropdownGlobalListener) {
        window.__villageDropdownGlobalListener = true;
        document.addEventListener('click', function(e) {
            if (!e.target.closest || !e.target.closest('.village-dropdown-container')) {
                closeAllVillageDropdowns();
            }
        });
    }
}

// ==============================================================
// 3. HEADER 3 TINGKAT BUILDER
// ==============================================================
function initVillageHeader(desaKey) {
    if (desaKey) currentPortalDesaKey = desaKey;
    const d = getActiveDesaData();

    const headerContainer = document.getElementById('desaTopHeaderWrapper');
    if (!headerContainer) return;

    // Build Potensi Dropdown Items dynamically based on village
    let potensiItemsHtml = '';
    d.wisataPotensi.items.forEach((item, idx) => {
        potensiItemsHtml += `
            <button type="button" onclick="selectVillageSubmenu('wisata', 'wisata-item-${idx}', event)" class="w-full text-left flex items-center gap-2.5 px-3 py-2 text-xs font-semibold text-slate-700 hover:text-[#3B4D3B] hover:bg-emerald-50/70 rounded-lg transition-colors">
                <span>${item.icon}</span>
                <span class="truncate">${item.judul}</span>
            </button>
        `;
    });
    potensiItemsHtml += `
        <button type="button" onclick="selectVillageSubmenu('wisata', 'wisata-semua', event)" class="w-full text-left flex items-center gap-2.5 px-3 py-2 text-xs font-bold text-[#3B4D3B] hover:bg-emerald-50/70 rounded-lg transition-colors border-t border-slate-100 mt-1 pt-1.5">
            <span>✨</span>
            <span>Katalog Potensi Lengkap</span>
        </button>
    `;

    headerContainer.innerHTML = `
        <!-- ========================================== -->
        <!-- HEADER ADMIN OPERATOR DESA (CLEAN TOP BRANDING) -->
        <!-- Sesuai Palet: Hijau Desa Madani (#3B4D3B/#2D3B2D), Putih, Sage (#E6ECE6/#DCE3DD) -->
        <!-- Bilah Navigasi Hijau dan Ticker Sekilas Info Dihapus Sesuai Permintaan -->
        <!-- ========================================== -->
        <div class="w-full bg-white/95 backdrop-blur-md border-b border-[#E0F2FE] shadow-2xs py-2.5 sm:py-3 px-3 sm:px-6 lg:px-8">
            <div class="max-w-[1600px] mx-auto flex flex-col md:flex-row items-center justify-between gap-3 sm:gap-4">
                
                <!-- Logo & Identitas Resmi Desa & BPS -->
                <div class="flex items-center gap-3 sm:gap-3.5 min-w-0 w-full md:w-auto">
                    <div class="flex items-center gap-2 shrink-0 bg-white p-1.5 rounded-2xl border border-[#BAE6FD] shadow-2xs ring-1 ring-slate-900/5">
                        <img src="/images/logo_kolaka_utara.png" alt="Logo Pemkab Kolaka Utara" class="h-8 sm:h-9 w-auto object-contain" title="Pemkab Kolaka Utara">
                        <div class="h-5 w-[1px] bg-[#BAE6FD]"></div>
                        <img src="/images/logo_bps.png" alt="Logo BPS" class="h-7 sm:h-8 w-auto object-contain" title="BPS Kolaka Utara">
                        <div class="h-5 w-[1px] bg-[#BAE6FD]"></div>
                        <img src="/logo-descan.png" alt="Logo Descan" class="h-7 sm:h-8 w-auto object-contain" title="Desa Cantik">
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="px-2 py-0.5 rounded-md text-[9.5px] font-black uppercase tracking-wider bg-[#E6ECE6] text-[#3B4D3B] border border-[#DCE3DD]">
                                ADMIN OPERATOR DESA
                            </span>
                            <span class="px-2 py-0.5 rounded-md text-[9.5px] font-extrabold text-[#0369A1] bg-[#E0F2FE] border border-[#BAE6FD] hidden sm:inline">
                                DESA CANTIK BPS 2026
                            </span>
                        </div>
                        <h1 class="text-sm sm:text-base lg:text-lg font-black text-slate-900 leading-tight tracking-tight uppercase truncate mt-0.5">
                            ${d.upperTitle}
                        </h1>
                        <p class="text-[10.5px] sm:text-xs text-slate-500 font-medium truncate">
                            Kecamatan ${d.kecamatan}, ${d.kabupaten} • Motto: <span class="text-[#3B4D3B] italic font-semibold">"${d.motto}"</span>
                        </p>
                    </div>
                </div>

                <!-- Input Pencarian Instan, Info Operator & Tombol Navigasi -->
                <div class="flex items-center gap-2 sm:gap-3 w-full md:w-auto justify-end flex-wrap">
                    <!-- Search Input -->
                    <div class="relative flex-1 md:w-64 lg:w-72">
                        <input type="text" id="inputPortalSearch" oninput="filterVillagePortalContent(this.value)" 
                            placeholder="Cari data, LKE, PODES, modul..." 
                            class="w-full pl-8 pr-3 py-1.5 text-xs rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-[#3B4D3B] focus:ring-2 focus:ring-emerald-100 outline-none transition-all placeholder:text-slate-400 font-medium">
                        <span class="absolute left-2.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs">🔍</span>
                        <div id="searchDropdownResults" class="hidden absolute left-0 right-0 top-full mt-1.5 bg-white rounded-2xl shadow-2xl border border-slate-200 p-2 z-50 max-h-80 overflow-y-auto"></div>
                    </div>

                    <!-- Tombol Kembali ke Dashboard 6 Desa -->
                    <a href="/descan" onclick="exitToDescanDashboard(event)" class="px-3 py-1.5 rounded-xl bg-white hover:bg-sky-50 text-slate-700 hover:text-[#3B4D3B] text-xs font-bold transition flex items-center gap-1.5 shrink-0 border border-[#BAE6FD] shadow-2xs hover:border-[#DCE3DD]" title="Kembali ke Dashboard Utama 6 Desa">
                        <i class="bi bi-grid-3x3-gap-fill text-xs text-[#0284C7]"></i>
                        <span class="hidden sm:inline">6 Desa</span>
                    </a>

                    <!-- Tombol Keluar Akun Operator -->
                    <button type="button" onclick="logoutFromMenu()" class="px-3 py-1.5 rounded-xl bg-[#E6ECE6] hover:bg-[#E6ECE6] text-[#3B4D3B] hover:text-[#2D3B2D] text-xs font-bold transition flex items-center gap-1.5 shrink-0 border border-[#DCE3DD] shadow-2xs" title="Keluar dari Akun Operator Desa">
                        <i class="bi bi-box-arrow-right text-xs text-[#3B4D3B]"></i>
                        <span class="hidden sm:inline">Keluar</span>
                    </button>
                </div>

            </div>
        </div>    `;
}

// ==============================================================
// 4. MAIN 2-COLUMN LAYOUT RENDERER
// ==============================================================
function renderVillageMainLayout(desaKey, activeMenu = 'beranda', activeSub = 'beranda') {
    if (desaKey) currentPortalDesaKey = desaKey;
    currentPortalActiveMenu = activeMenu;
    currentPortalActiveSub = activeSub;
    const d = getActiveDesaData();

    // Container for Village Portal in desacan-menu
    const hostEl = document.getElementById('view-portal-desa');
    if (!hostEl) return;

    hostEl.innerHTML = `
        <div class="w-full max-w-[1600px] mx-auto px-3 sm:px-6 lg:px-8 py-5 sm:py-7">
            <!-- 2-Column Grid: lg:col-span-8 (Content) + lg:col-span-4 (Sidebar Widgets) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                
                <!-- KOLOM KIRI (lg:col-span-8): AREA KONTEN DINAMIS -->
                <div id="desaWebContent" class="lg:col-span-8 space-y-6">
                    <!-- Konten dinamis dirender oleh renderVillageSubmenu() -->
                </div>

                <!-- KOLOM KANAN (lg:col-span-4): SIDEBAR RESMI DESA -->
                <div id="desaWebSidebar" class="lg:col-span-4 space-y-6">
                    <!-- Sidebar Widgets dirender oleh renderVillageSidebarWidgets() -->
                </div>

            </div>
        </div>
    `;

    renderVillageSidebarWidgets(d);
    renderVillageSubmenu(activeMenu, activeSub);
}

// ==============================================================
// 5. SIDEBAR WIDGETS RENDERER (KOLOM KANAN)
// ==============================================================
function renderVillageSidebarWidgets(d) {
    const sidebarEl = document.getElementById('desaWebSidebar');
    if (!sidebarEl) return;

    sidebarEl.innerHTML = `
        <!-- WIDGET 1: KARTU HIJAU ZAMRUD "LAYANAN MANDIRI & POJOK STATISTIK" -->
        <div class="rounded-3xl p-5 sm:p-6 bg-gradient-to-br from-[#3B4D3B] via-[#2D3B2D] to-[#1D241E] text-white shadow-xl border border-[#3B4D3B]/30 relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-36 h-36 rounded-full bg-white/5 pointer-events-none"></div>
            <div class="relative z-10">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-8 h-8 rounded-xl bg-white/15 flex items-center justify-center text-sm shadow-inner">⚡</span>
                    <div>
                        <span class="text-[10px] font-black tracking-wider uppercase text-emerald-200">Layanan Online 24 Jam</span>
                        <h3 class="text-base font-black leading-tight text-white">Layanan Mandiri Warga</h3>
                    </div>
                </div>
                <p class="text-xs text-emerald-100/90 mb-4 leading-relaxed">
                    Pengajuan surat permohonan mandiri & akses data statistik sektoral ${d.name}.
                </p>

                <!-- Form Cepat Pengajuan Surat -->
                <form onsubmit="handleQuickServiceSubmit(event)" class="space-y-3 bg-white/10 backdrop-blur-md p-3.5 rounded-2xl border border-white/15 text-slate-800">
                    <div>
                        <label class="block text-[10.5px] font-extrabold uppercase text-emerald-100 mb-1">Nomor Induk Kependudukan (NIK)</label>
                        <input type="text" id="quickNik" maxlength="16" placeholder="16 digit NIK sesuai KTP..." required
                            class="w-full px-3 py-2 text-xs rounded-xl bg-white text-slate-800 border-none outline-none focus:ring-2 focus:ring-amber-300 placeholder:text-slate-400 font-medium">
                    </div>
                    <div>
                        <label class="block text-[10.5px] font-extrabold uppercase text-emerald-100 mb-1">Nama Lengkap Pemohon</label>
                        <input type="text" id="quickNama" placeholder="Nama lengkap sesuai KTP..." required
                            class="w-full px-3 py-2 text-xs rounded-xl bg-white text-slate-800 border-none outline-none focus:ring-2 focus:ring-amber-300 placeholder:text-slate-400 font-medium">
                    </div>
                    <div>
                        <label class="block text-[10.5px] font-extrabold uppercase text-emerald-100 mb-1">Pilihan Jenis Layanan Surat</label>
                        <select id="quickJenisSurat" class="w-full px-3 py-2 text-xs rounded-xl bg-white text-slate-800 border-none outline-none focus:ring-2 focus:ring-amber-300 font-medium cursor-pointer">
                            <option value="Surat Keterangan Usaha (SKU)">Surat Keterangan Usaha (SKU)</option>
                            <option value="Surat Pengantar KTP-el">Surat Pengantar KTP-el</option>
                            <option value="Surat Pengantar Kartu Keluarga">Surat Pengantar Kartu Keluarga</option>
                            <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Tidak Mampu (SKTM)">Surat Keterangan Tidak Mampu (SKTM)</option>
                            <option value="Surat Pengantar Akta Kelahiran">Surat Pengantar Akta Kelahiran</option>
                            <option value="Layanan Konsultasi Pojok Statistik (PST)">Layanan Pojok Statistik (PST)</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-[#eab308] hover:bg-[#facc15] text-slate-900 font-black text-xs transition-all shadow-md flex items-center justify-center gap-1.5 cursor-pointer">
                        <span>Ajukan Surat Sekarang</span> <span>→</span>
                    </button>
                </form>

                <!-- Tombol Akses Cepat ke Dashboard Admin DESCAN -->
                <div class="mt-4 pt-3 border-t border-white/15">
                    <button type="button" onclick="openOperatorDESCANPortal()" class="w-full py-2.5 px-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-bold transition flex items-center justify-between border border-white/20">
                        <span class="flex items-center gap-2">
                            <span>📊</span> <span>Portal Data DESCAN (Operator)</span>
                        </span>
                        <span class="text-[10px] bg-emerald-400 text-slate-950 font-black px-2 py-0.5 rounded">BPS SDI</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- WIDGET 2: STATISTIK RINGKAS REAL-TIME DESA BINAAN -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 shadow-md border border-slate-200/90">
            <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-xl bg-[#E6ECE6] text-[#3B4D3B] font-bold flex items-center justify-center text-sm">📈</span>
                    <div>
                        <span class="text-[10px] font-black uppercase text-slate-400">Statistik Sektoral</span>
                        <h4 class="text-xs font-black text-slate-800">Data Kunci ${d.name}</h4>
                    </div>
                </div>
                <span class="px-2 py-0.5 rounded text-[10px] font-extrabold bg-[#E6ECE6] text-[#3B4D3B]">
                    2026
                </span>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/70">
                    <span class="text-[10px] text-slate-500 font-medium">Penduduk</span>
                    <div class="text-base sm:text-lg font-black text-slate-900 mt-0.5">${d.stats.penduduk.toLocaleString('id-ID')}</div>
                    <span class="text-[9.5px] text-[#3B4D3B] font-semibold">Jiwa Terdata</span>
                </div>
                <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/70">
                    <span class="text-[10px] text-slate-500 font-medium">Keluarga</span>
                    <div class="text-base sm:text-lg font-black text-slate-900 mt-0.5">${d.stats.kk.toLocaleString('id-ID')}</div>
                    <span class="text-[9.5px] text-[#3B4D3B] font-semibold">KK Registrasi</span>
                </div>
                <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/70">
                    <span class="text-[10px] text-slate-500 font-medium">Kemiskinan</span>
                    <div class="text-base sm:text-lg font-black text-amber-600 mt-0.5">${d.stats.kemiskinan}</div>
                    <span class="text-[9.5px] text-slate-500 font-medium">Data DTKS BPS</span>
                </div>
                <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/70">
                    <span class="text-[10px] text-slate-500 font-medium">IKM Desa</span>
                    <div class="text-base sm:text-lg font-black text-[#3B4D3B] mt-0.5">${d.stats.ikm}</div>
                    <span class="text-[9.5px] text-[#3B4D3B] font-semibold">Unit Usaha</span>
                </div>
            </div>

            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold">
                <span class="text-slate-500">Kepatuhan DESCAN:</span>
                <span class="text-[#3B4D3B] font-black flex items-center gap-1">
                    <span>🛡️</span> <span>${d.stats.descanStatus}</span>
                </span>
            </div>
        </div>

        <!-- WIDGET 3: APARATUR DESA / PETUGAS LAYANAN -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 shadow-md border border-slate-200/90">
            <div class="flex items-center gap-2 pb-3 mb-4 border-b border-slate-100">
                <span class="w-8 h-8 rounded-xl bg-[#E6ECE6] text-[#3B4D3B] font-bold flex items-center justify-center text-sm">👤</span>
                <div>
                    <span class="text-[10px] font-black uppercase text-slate-400">Pemerintahan</span>
                    <h4 class="text-xs font-black text-slate-800">Aparatur & Layanan</h4>
                </div>
            </div>

            <div class="flex items-center gap-3 p-3 rounded-2xl bg-[#E6ECE6] border border-emerald-100 mb-3">
                <div class="w-12 h-12 rounded-xl bg-slate-200 overflow-hidden shrink-0 border border-[#DCE3DD]">
                    <img src="${d.kades.foto}" alt="${d.kades.nama}" class="w-full h-full object-cover">
                </div>
                <div class="min-w-0">
                    <span class="text-[9.5px] font-black uppercase text-[#3B4D3B] tracking-wider">${d.kades.title}</span>
                    <div class="text-xs font-black text-slate-900 truncate">${d.kades.nama}</div>
                    <div class="text-[10px] text-slate-500">Masa Bakti ${d.kades.periode}</div>
                </div>
            </div>

            <div class="space-y-2 text-xs">
                ${d.perangkat.slice(0, 3).map(p => `
                    <div class="flex items-center justify-between py-1.5 px-2 rounded-xl hover:bg-slate-50">
                        <div class="truncate mr-2">
                            <div class="font-bold text-slate-800 truncate">${p.nama}</div>
                            <div class="text-[10px] text-slate-400 font-medium">${p.jabatan}</div>
                        </div>
                        <span class="text-[10px] text-[#3B4D3B] font-bold bg-[#E6ECE6] px-2 py-0.5 rounded-full shrink-0">Aktif</span>
                    </div>
                `).join('')}
            </div>

            <button type="button" onclick="selectVillageSubmenu('pemerintahan', 'pem-perangkat', event)" class="w-full mt-3 py-2 text-center text-xs font-bold text-[#3B4D3B] hover:text-emerald-950 transition">
                Lihat Seluruh Aparatur Desa →
            </button>
        </div>

        <!-- WIDGET 4: AGENDA KEGIATAN DESA -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 shadow-md border border-slate-200/90">
            <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-xl bg-amber-50 text-amber-800 font-bold flex items-center justify-center text-sm">📅</span>
                    <div>
                        <span class="text-[10px] font-black uppercase text-slate-400">Kalender Kegiatan</span>
                        <h4 class="text-xs font-black text-slate-800">Agenda ${d.name}</h4>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                ${d.agenda.map(ag => `
                    <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/70">
                        <div class="flex items-center justify-between text-[10px] font-bold text-slate-500 mb-1">
                            <span class="text-[#3B4D3B] bg-[#E6ECE6] px-2 py-0.5 rounded">${ag.tanggal}</span>
                            <span>${ag.lokasi}</span>
                        </div>
                        <div class="text-xs font-bold text-slate-900 leading-snug">${ag.kegiatan}</div>
                    </div>
                `).join('')}
            </div>
        </div>
    `;
}

// ==============================================================
// 6. SUBMENU ROUTER & CONTENT ENGINE (13 MENU LENGKAP & INTERAKTIF)
// ==============================================================
function selectVillageSubmenu(menuKey, subKey, event) {
    if (event) {
        if (typeof event.preventDefault === 'function') event.preventDefault();
        if (typeof event.stopPropagation === 'function') event.stopPropagation();
    }
    closeAllVillageDropdowns();

    currentPortalActiveMenu = menuKey;
    currentPortalActiveSub = subKey || menuKey;

    if (typeof document === 'undefined') return;

    // Switch view containers: ensure view-portal-desa is visible and others hidden
    document.querySelectorAll('.menu-view-container').forEach(el => {
        el.classList.add('hidden');
    });
    const portalView = document.getElementById('view-portal-desa');
    if (portalView) {
        portalView.classList.remove('hidden');
    }

    // Keep top navigation tabs & sidebar buttons synced with beranda
    document.querySelectorAll('.nav-tab').forEach(el => el.classList.remove('active'));
    const dBtn = document.getElementById('nav-beranda') || document.getElementById('nav-portal');
    if (dBtn) dBtn.classList.add('active');

    // Update navbar active buttons
    document.querySelectorAll('.vnav-btn').forEach(el => {
        el.classList.remove('bg-[#03532c]', 'text-amber-300', 'border-b-2', 'border-amber-400');
    });
    const activeNavBtn = document.getElementById('vmenu-' + menuKey);
    if (activeNavBtn) {
        activeNavBtn.classList.add('bg-[#03532c]', 'text-amber-300', 'border-b-2', 'border-amber-400');
    }

    // If main layout has not been rendered yet, initialize it
    const contentEl = document.getElementById('desaWebContent');
    if (!contentEl) {
        renderVillageMainLayout(currentPortalDesaKey, menuKey, currentPortalActiveSub);
    } else {
        renderVillageSubmenu(menuKey, currentPortalActiveSub);
    }

    // Smooth scroll to top of content
    if (typeof window !== 'undefined' && typeof window.scrollTo === 'function') {
        const headerWrapper = document.getElementById('desaTopHeaderWrapper');
        const scrollTarget = headerWrapper ? headerWrapper.offsetTop + 110 : 120;
        window.scrollTo({ top: scrollTarget, behavior: 'smooth' });
    }
}

function renderVillageSubmenu(menuKey, subKey) {
    if (typeof document === 'undefined') return;
    const contentEl = document.getElementById('desaWebContent');
    if (!contentEl) return;
    const d = getActiveDesaData();

    // -------------------------------------------------------------
    // 1. BERANDA DESA
    // -------------------------------------------------------------
    if (menuKey === 'beranda') {
        contentEl.innerHTML = `
            <!-- Hero Banner Selamat Datang Desa -->
            <div class="relative rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-900 text-white min-h-[300px] sm:min-h-[340px] flex items-end">
                <img src="/images/desa/${d.key}.jpg" alt="${d.name}" class="absolute inset-0 w-full h-full object-cover opacity-60">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/60 to-transparent"></div>
                <div class="relative z-10 p-5 sm:p-8 space-y-3 max-w-2xl">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-black uppercase tracking-wider bg-[#E6ECE6]0 text-white shadow-md">
                        <span>🏛️</span> <span>Website Resmi Pemerintahan</span>
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black leading-tight drop-shadow-md">
                        Selamat Datang di ${d.name}
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-200 leading-relaxed drop-shadow line-clamp-3">
                        "${d.kades.sambutan}"
                    </p>
                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <button type="button" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-sku', event)" class="px-4 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#2D3B2D] text-white text-xs font-black transition shadow-lg flex items-center gap-2">
                            <span>✍️</span> <span>Ajukan Surat Mandiri</span>
                        </button>
                        <button type="button" onclick="selectVillageSubmenu('profil', 'profil-umum', event)" class="px-4 py-2.5 rounded-xl bg-white/20 hover:bg-white/30 backdrop-blur-md text-white text-xs font-bold transition flex items-center gap-2 border border-white/20">
                            <span>ℹ️</span> <span>Profil Lengkap</span>
                        </button>
                        <button type="button" onclick="selectVillageSubmenu('apbdes', 'apbdes-infografis', event)" class="px-4 py-2.5 rounded-xl bg-amber-500/90 hover:bg-amber-500 text-slate-900 text-xs font-black transition flex items-center gap-2">
                            <span>📊</span> <span>Transparansi APBDes</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sambutan Resmi Kepala Desa / Lurah -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 shadow-md border border-slate-200/90 flex flex-col sm:flex-row items-center sm:items-start gap-6">
                <div class="w-28 sm:w-36 h-36 sm:h-44 rounded-2xl overflow-hidden shrink-0 shadow-md border-2 border-[#3B4D3B] bg-slate-100">
                    <img src="${d.kades.foto}" alt="${d.kades.nama}" class="w-full h-full object-cover">
                </div>
                <div class="space-y-3 text-center sm:text-left flex-1">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider bg-[#E6ECE6] px-2 py-0.5 rounded-md border border-[#DCE3DD]">
                            Sambutan Resmi ${d.kades.title}
                        </span>
                        <h3 class="text-lg sm:text-xl font-black text-slate-900 mt-1">${d.kades.nama}</h3>
                        <p class="text-xs text-slate-500 font-semibold">${d.kades.title} ${d.name} • Periode ${d.kades.periode}</p>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic">
                        "${d.kades.sambutan}"
                    </p>
                    <div class="flex items-center justify-center sm:justify-start gap-3 pt-1">
                        <button type="button" onclick="selectVillageSubmenu('pemerintahan', 'pem-kades', event)" class="text-xs font-bold text-[#3B4D3B] hover:text-emerald-950 flex items-center gap-1">
                            <span>Biodata Lengkap</span> <span>→</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Berita & Kabar Terkini Desa -->
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-slate-400">Informasi Publik</span>
                        <h3 class="text-lg font-black text-slate-900">Kabar & Berita ${d.name}</h3>
                    </div>
                    <span class="text-xs text-slate-400 font-medium">Terverifikasi BPS Kolaka Utara</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    ${d.berita.map(b => `
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 flex flex-col hover:shadow-md transition">
                            <div class="h-32 bg-slate-100 relative overflow-hidden">
                                <img src="${b.foto}" alt="${b.judul}" class="w-full h-full object-cover">
                                <span class="absolute top-2 left-2 bg-[#3B4D3B] text-white text-[9.5px] font-bold px-2 py-0.5 rounded-md shadow">
                                    ${b.kategori}
                                </span>
                            </div>
                            <div class="p-4 flex flex-col flex-1 justify-between space-y-2">
                                <div>
                                    <span class="text-[10px] text-slate-400 font-medium">${b.tanggal}</span>
                                    <h4 class="text-xs font-black text-slate-900 leading-snug line-clamp-2 mt-0.5">${b.judul}</h4>
                                    <p class="text-[11px] text-slate-500 line-clamp-2 mt-1 leading-relaxed">${b.ringkasan}</p>
                                </div>
                                <button type="button" onclick="previewVillageDoc('${b.judul}', 'BERITA-2026', '2026', '${b.ringkasan}')" class="text-xs font-bold text-[#3B4D3B] hover:text-emerald-950 flex items-center gap-1 pt-2">
                                    <span>Baca Berita</span> <span>→</span>
                                </button>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>

            <!-- Potensi Unggulan 3 Kartu -->
            <div class="space-y-4 pt-2">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-slate-400">Pemberdayaan Ekonomi</span>
                        <h3 class="text-lg font-black text-slate-900">Potensi Komoditas & Wisata</h3>
                    </div>
                    <button type="button" onclick="selectVillageSubmenu('wisata', 'wisata-semua', event)" class="text-xs font-bold text-[#3B4D3B] hover:text-emerald-950">
                        Lihat Semua →
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    ${d.wisataPotensi.items.map((it, idx) => `
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 p-4 space-y-2.5 flex flex-col justify-between">
                            <div>
                                <div class="w-10 h-10 rounded-xl bg-[#E6ECE6] text-[#3B4D3B] font-bold flex items-center justify-center text-xl mb-2">
                                    ${it.icon}
                                </div>
                                <h4 class="text-xs font-black text-slate-900 leading-snug">${it.judul}</h4>
                                <p class="text-[11px] text-slate-500 leading-relaxed mt-1 line-clamp-3">${it.deskripsi}</p>
                            </div>
                            <div class="pt-2 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[10px] font-extrabold text-[#3B4D3B] bg-[#E6ECE6] px-2 py-0.5 rounded">${it.kapasitas}</span>
                                <button type="button" onclick="selectVillageSubmenu('wisata', 'wisata-item-${idx}', event)" class="text-xs font-bold text-slate-700 hover:text-[#3B4D3B]">
                                    Detail →
                                </button>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 2. PROFIL DESA (profil-umum, profil-peta, profil-demografi, profil-sejarah)
    // -------------------------------------------------------------
    if (menuKey === 'profil') {
        if (subKey === 'profil-peta') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Pemetaan Wilayah</span>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">Peta Wilayah & Batas Dusun ${d.name}</h2>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">GIS BPS 2026</span>
                    </div>

                    <div class="rounded-2xl overflow-hidden border border-slate-200 bg-slate-900 relative shadow-inner aspect-video flex items-center justify-center text-white">
                        <img src="/images/desa/${d.key}.jpg" alt="Peta ${d.name}" class="w-full h-full object-cover opacity-60">
                        <div class="absolute inset-0 bg-slate-950/40 flex flex-col items-center justify-center p-6 text-center space-y-3">
                            <span class="text-3xl">🗺️</span>
                            <h3 class="text-base sm:text-lg font-black">Peta Tematik & Batas Administrasi ${d.name}</h3>
                            <p class="text-xs text-slate-200 max-w-md">Kecamatan ${d.kecamatan}, Kabupaten Kolaka Utara, Provinsi Sulawesi Tenggara</p>
                            <div class="p-3 bg-white/20 backdrop-blur-md rounded-xl text-xs font-mono font-bold">
                                Koordinat Balai Desa: -3.2458° S, 121.0542° E
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                            <span class="font-black text-slate-900 block text-xs">Batas-Batas Wilayah Administratif:</span>
                            <ul class="space-y-1 text-slate-600">
                                <li>• <b>Sebelah Utara:</b> ${d.profil.batasUtara}</li>
                                <li>• <b>Sebelah Timur:</b> ${d.profil.batasTimur}</li>
                                <li>• <b>Sebelah Selatan:</b> ${d.profil.batasSelatan}</li>
                                <li>• <b>Sebelah Barat:</b> ${d.profil.batasBarat}</li>
                            </ul>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                            <span class="font-black text-slate-900 block text-xs">Informasi Geospasial & Topografi:</span>
                            <ul class="space-y-1 text-slate-600">
                                <li>• <b>Topografi:</b> ${d.profil.topografi}</li>
                                <li>• <b>Luas Total Wilayah:</b> ${d.profil.luasWilayah}</li>
                                <li>• <b>Pembagian Dusun:</b> ${d.profil.jumlahDusun}</li>
                                <li>• <b>Jarak ke Ibukota Kab (Lasusua):</b> ± 18 - 25 Km</li>
                            </ul>
                        </div>
                    </div>
                </div>
            `;
            return;
        }

        if (subKey === 'profil-demografi') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Demografi Presisi</span>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">Demografi & Struktur Penduduk ${d.name}</h2>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">Regsosek 2026</span>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="p-4 rounded-2xl bg-[#E6ECE6] border border-emerald-100 text-center">
                            <span class="text-[10px] font-bold text-[#3B4D3B] uppercase">Total Penduduk</span>
                            <div class="text-xl font-black text-slate-900 mt-1">${d.stats.penduduk.toLocaleString('id-ID')}</div>
                            <span class="text-[10px] text-slate-500">Jiwa</span>
                        </div>
                        <div class="p-4 rounded-2xl bg-[#E6ECE6] border border-emerald-100 text-center">
                            <span class="text-[10px] font-bold text-[#3B4D3B] uppercase">Jumlah KK</span>
                            <div class="text-xl font-black text-slate-900 mt-1">${d.stats.kk.toLocaleString('id-ID')}</div>
                            <span class="text-[10px] text-slate-500">Kepala Keluarga</span>
                        </div>
                        <div class="p-4 rounded-2xl bg-amber-50 border border-amber-100 text-center">
                            <span class="text-[10px] font-bold text-amber-800 uppercase">Kemiskinan</span>
                            <div class="text-xl font-black text-amber-700 mt-1">${d.stats.kemiskinan}</div>
                            <span class="text-[10px] text-slate-500">Kategori Rendah</span>
                        </div>
                        <div class="p-4 rounded-2xl bg-blue-50 border border-blue-100 text-center">
                            <span class="text-[10px] font-bold text-blue-800 uppercase">Kasus Stunting</span>
                            <div class="text-xl font-black text-blue-700 mt-1">${d.stats.stunting}</div>
                            <span class="text-[10px] text-slate-500">Balita Terbina</span>
                        </div>
                    </div>

                    <!-- Piramida Penduduk Berdasarkan Jenis Kelamin -->
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-4">
                        <div class="flex items-center justify-between">
                            <h4 class="text-xs font-black text-slate-800 uppercase tracking-wider">Distribusi Kelompok Umur & Gender</h4>
                            <div class="flex items-center gap-3 text-xs">
                                <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-blue-600 inline-block"></span> Laki-laki</span>
                                <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-pink-500 inline-block"></span> Perempuan</span>
                            </div>
                        </div>
                        <div class="space-y-2 text-xs">
                            <div class="flex items-center justify-between py-1 border-b border-slate-200">
                                <span class="text-slate-600">Usia 0 - 14 Tahun (Anak-anak):</span>
                                <span class="font-bold text-slate-900">24.5% (Tercukupi Fasilitas PAUD/SD)</span>
                            </div>
                            <div class="flex items-center justify-between py-1 border-b border-slate-200">
                                <span class="text-slate-600">Usia 15 - 64 Tahun (Usia Produktif):</span>
                                <span class="font-bold text-[#3B4D3B]">68.2% (Bonus Demografi Petani/Nelayan Muda)</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <span class="text-slate-600">Usia 65+ Tahun (Lanjut Usia):</span>
                                <span class="font-bold text-slate-900">7.3% (Layanan Posyandu Lansia Rutin)</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            return;
        }

        if (subKey === 'profil-sejarah') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Historiografi</span>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">Sejarah & Asal Usul ${d.name}</h2>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">Arsip Desa</span>
                    </div>

                    <div class="prose prose-sm text-slate-600 leading-relaxed space-y-4">
                        <p>
                            ${d.name} memiliki akar historis yang kuat dalam peradaban pesisir dan agraris Kabupaten Kolaka Utara. Terletak di kawasan geografis yang subur, desa ini mulanya dihuni oleh para perintis perkebunan yang mengolah kekayaan alam lokal secara turun-temurun dengan menjunjung tinggi falsafah gotong royong dan kesetiaan pada tanah leluhur.
                        </p>
                        <p>
                            Nama <b>${d.name}</b> diambil dari perpaduan makna kearifan lokal yang melambangkan keteguhan masyarakat dalam menjaga harmoni sumber daya alam, kerukunan warga, dan keterbukaan terhadap kemajuan zaman.
                        </p>
                        <div class="p-4 rounded-2xl bg-[#E6ECE6] border border-emerald-100 text-xs">
                            <span class="font-black text-emerald-950 block mb-1">Motto Pembangunan:</span>
                            <p class="italic text-[#3B4D3B] font-semibold">"${d.motto}"</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100">
                        <h4 class="text-xs font-black uppercase text-slate-900 tracking-wider mb-3">Daftar Kepemimpinan ${d.name}:</h4>
                        <div class="space-y-2 text-xs">
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200">
                                <div><b>${d.kades.nama}</b> (${d.kades.title})</div>
                                <span class="text-[#3B4D3B] font-bold bg-[#E6ECE6] px-2 py-0.5 rounded">${d.kades.periode} (Menjabat)</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            return;
        }

        // DEFAULT PROFIL UMUM
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Karakteristik Wilayah</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Profil Wilayah ${d.name}</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">Terverifikasi BPS</span>
                </div>

                <div class="prose prose-sm text-slate-600 leading-relaxed">
                    <p>
                        ${d.name} merupakan salah satu desa/kelurahan binaan Program Desa Cantik (Cinta Statistik) BPS di Kecamatan ${d.kecamatan}, Kabupaten Kolaka Utara. Wilayah ini memiliki karakteristik <b>${d.profil.topografi}</b> dengan luas total mencapai <b>${d.profil.luasWilayah}</b> yang terbagi ke dalam <b>${d.profil.jumlahDusun}</b>.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                        <span class="font-black text-slate-900 block">Karakteristik Geografis:</span>
                        <div class="flex justify-between py-1 border-b border-slate-200"><span class="text-slate-500">Topografi:</span><span class="font-bold text-slate-800">${d.profil.topografi}</span></div>
                        <div class="flex justify-between py-1 border-b border-slate-200"><span class="text-slate-500">Luas Lahan:</span><span class="font-bold text-slate-800">${d.profil.luasWilayah}</span></div>
                        <div class="flex justify-between py-1"><span class="text-slate-500">Jumlah Dusun:</span><span class="font-bold text-slate-800">${d.profil.jumlahDusun}</span></div>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                        <span class="font-black text-slate-900 block">Batas Wilayah:</span>
                        <div class="flex justify-between py-1 border-b border-slate-200"><span class="text-slate-500">Utara:</span><span class="font-bold text-slate-800 truncate ml-2">${d.profil.batasUtara}</span></div>
                        <div class="flex justify-between py-1 border-b border-slate-200"><span class="text-slate-500">Selatan:</span><span class="font-bold text-slate-800 truncate ml-2">${d.profil.batasSelatan}</span></div>
                        <div class="flex justify-between py-1 border-b border-slate-200"><span class="text-slate-500">Timur:</span><span class="font-bold text-slate-800 truncate ml-2">${d.profil.batasTimur}</span></div>
                        <div class="flex justify-between py-1"><span class="text-slate-500">Barat:</span><span class="font-bold text-slate-800 truncate ml-2">${d.profil.batasBarat}</span></div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex flex-wrap gap-3">
                    <button type="button" onclick="selectVillageSubmenu('profil', 'profil-peta', event)" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs">
                        Lihat Peta Wilayah →
                    </button>
                    <button type="button" onclick="selectVillageSubmenu('profil', 'profil-demografi', event)" class="px-4 py-2 rounded-xl bg-[#3B4D3B] hover:bg-[#2D3B2D] text-white font-bold text-xs">
                        Statistik Demografi Penduduk →
                    </button>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 3. PEMERINTAHAN (pem-visimisi, pem-kades, pem-perangkat, pem-tupoksi, pem-bpd, pem-wilayah)
    // -------------------------------------------------------------
    if (menuKey === 'pemerintahan') {
        if (subKey === 'pem-kades') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Pimpinan Desa</span>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">Profil ${d.kades.title} ${d.name}</h2>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">${d.kades.periode}</span>
                    </div>

                    <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                        <div class="w-36 h-48 rounded-2xl overflow-hidden shrink-0 border-2 border-[#3B4D3B] shadow-lg bg-slate-100">
                            <img src="${d.kades.foto}" alt="${d.kades.nama}" class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-3 flex-1 text-center md:text-left">
                            <div>
                                <span class="text-xs font-black uppercase text-[#3B4D3B] bg-[#E6ECE6] px-2.5 py-0.5 rounded-full border border-[#DCE3DD]">
                                    ${d.kades.title} Terpilih
                                </span>
                                <h3 class="text-2xl font-black text-slate-900 mt-1">${d.kades.nama}</h3>
                                <p class="text-xs text-slate-500 font-medium">Kecamatan ${d.kecamatan}, Kabupaten Kolaka Utara</p>
                            </div>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic bg-slate-50 p-4 rounded-2xl border border-slate-200">
                                "${d.kades.sambutan}"
                            </p>
                            <div class="grid grid-cols-2 gap-3 text-xs pt-1">
                                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200"><span class="text-slate-400 block text-[10px]">Masa Jabatan:</span><span class="font-bold text-slate-800">${d.kades.periode}</span></div>
                                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200"><span class="text-slate-400 block text-[10px]">Status:</span><span class="font-bold text-[#3B4D3B]">Definitif</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            return;
        }

        if (subKey === 'pem-perangkat') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Struktur Organisasi</span>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">Perangkat & Aparatur Pemerintahan ${d.name}</h2>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">SOTK 2026</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        ${d.perangkat.map(p => `
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between space-y-2">
                                <div>
                                    <span class="text-[9.5px] font-black uppercase text-[#3B4D3B] bg-[#E6ECE6] px-2 py-0.5 rounded">${p.jabatan}</span>
                                    <h4 class="text-xs font-black text-slate-900 mt-2">${p.nama}</h4>
                                    <p class="text-[10.5px] text-slate-500 font-medium">${d.name}, Kec. ${d.kecamatan}</p>
                                </div>
                                <div class="pt-2 border-t border-slate-200 flex items-center justify-between text-[10px]">
                                    <span class="text-slate-400">Status: Aktif</span>
                                    <span class="text-[#3B4D3B] font-bold">Terverifikasi</span>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;
            return;
        }

        if (subKey === 'pem-tupoksi') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Tata Kelola Organisasi</span>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">Tugas Pokok & Fungsi (Tupoksi) Aparatur</h2>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">Permendagri No. 84/2015</span>
                    </div>

                    <div class="space-y-4 text-xs">
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                            <h4 class="font-black text-slate-900 text-sm flex items-center gap-2"><span>👤</span> <span>Kepala Desa / Lurah</span></h4>
                            <p class="text-slate-600 leading-relaxed">Menyelenggarakan Pemerintahan Desa, melaksanakan pembangunan, pembinaan kemasyarakatan, serta memberdayakan masyarakat desa berlandaskan transparansi dan akuntabilitas Satu Data Indonesia.</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                            <h4 class="font-black text-slate-900 text-sm flex items-center gap-2"><span>📋</span> <span>Sekretaris Desa (Sekdes)</span></h4>
                            <p class="text-slate-600 leading-relaxed">Membantu Kepala Desa dalam bidang ketatausahaan, administrasi umum, perencanaan program kerja tahunan, serta pertanggungjawaban keuangan APBDes.</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                            <h4 class="font-black text-slate-900 text-sm flex items-center gap-2"><span>💰</span> <span>Kaur Keuangan & Perencanaan</span></h4>
                            <p class="text-slate-600 leading-relaxed">Mengelola tata usaha keuangan, penyusunan rancangan APBDes, penatausahaan kas, verifikasi SPJ kegiatan, dan penginputan data sistem keuangan desa (SISKEUDES).</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                            <h4 class="font-black text-slate-900 text-sm flex items-center gap-2"><span>🤝</span> <span>Kasi Pelayanan & Kesejahteraan</span></h4>
                            <p class="text-slate-600 leading-relaxed">Melayani penerbitan administrasi surat mandiri warga, verifikasi bansos DTKS, koordinasi posyandu balita dan lansia, serta pembinaan kader statistik sektoral desa.</p>
                        </div>
                    </div>
                </div>
            `;
            return;
        }

        if (subKey === 'pem-bpd') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Mitra Musyawarah</span>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">Badan Permusyawaratan Desa (BPD) ${d.name}</h2>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">Lembaga Perwakilan</span>
                    </div>

                    <div class="prose prose-sm text-slate-600 leading-relaxed">
                        <p>BPD ${d.name} menjalankan fungsi legislasi perdes, penampung aspirasi masyarakat, dan pengawasan kinerja penyelenggaraan pemerintahan desa secara demokratis dan independen.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div class="p-4 rounded-2xl bg-[#E6ECE6] border border-emerald-100 space-y-2">
                            <span class="font-black text-emerald-950 block">Pimpinan BPD:</span>
                            <ul class="space-y-1 text-emerald-900">
                                <li>• <b>Ketua BPD:</b> Tokoh Masyarakat Terpilih</li>
                                <li>• <b>Wakil Ketua:</b> Perwakilan Keterwakilan Perempuan</li>
                                <li>• <b>Sekretaris BPD:</b> Bidang Administrasi & Notulensi</li>
                            </ul>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                            <span class="font-black text-slate-900 block">Fungsi Utama BPD:</span>
                            <ul class="space-y-1 text-slate-600">
                                <li>• Membahas dan menyepakati Rancangan Perdes bersama Kades</li>
                                <li>• Menampung dan menyalurkan aspirasi warga tiap dusun</li>
                                <li>• Melakukan pengawasan kinerja Kepala Desa dan APBDes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            `;
            return;
        }

        if (subKey === 'pem-wilayah') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Administratif Kewilayahan</span>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">Wilayah Administratif Dusun & Rukun Tetangga (RT)</h2>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">${d.dusun.length} Dusun</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        ${d.dusun.map((ds, i) => `
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-black text-slate-900">${ds.nama}</span>
                                    <span class="text-[10px] bg-[#E6ECE6] text-[#3B4D3B] font-bold px-2 py-0.5 rounded">Aktif</span>
                                </div>
                                <div class="space-y-1 text-slate-600">
                                    <div>• <b>Kepala Dusun:</b> ${ds.kadus}</div>
                                    <div>• <b>Cakupan RT:</b> ${ds.rt} Satuan RT (KK: ${ds.kk})</div>
                                    <div>• <b>Fokus Kegiatan:</b> ${ds.fokus}</div>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;
            return;
        }

        // DEFAULT: VISI & MISI
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Arah Pembangunan</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Visi & Misi ${d.name}</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">RPJMDes 2021-2027</span>
                </div>

                <div class="p-5 rounded-2xl bg-gradient-to-r from-emerald-800 to-teal-900 text-white space-y-2 shadow-md">
                    <span class="text-[10px] font-black uppercase tracking-wider text-emerald-200">Visi Pembangunan Desa:</span>
                    <h3 class="text-base sm:text-lg font-black leading-snug">
                        "Terwujudnya ${d.name} yang Maju, Mandiri, Berakhlak, dan Sejahtera Berbasis Potensi Lokal dan Ketahanan Statistik Presisi."
                    </h3>
                </div>

                <div class="space-y-3">
                    <h4 class="text-xs font-black uppercase text-slate-900 tracking-wider">Misi Pembangunan Strategis:</h4>
                    <div class="space-y-2 text-xs text-slate-700">
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                            <span class="w-6 h-6 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] font-black flex items-center justify-center shrink-0">1</span>
                            <p class="leading-relaxed">Mewujudkan tata kelola pemerintahan desa yang bersih, transparan, akuntabel, dan berbasis teknologi digital.</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                            <span class="w-6 h-6 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] font-black flex items-center justify-center shrink-0">2</span>
                            <p class="leading-relaxed">Meningkatkan produktivitas komoditas unggulan pertanian dan kelautan melalui penerapan inovasi dan penguatan BUMDes.</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                            <span class="w-6 h-6 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] font-black flex items-center justify-center shrink-0">3</span>
                            <p class="leading-relaxed">Mendorong peningkatan kualitas sumber daya manusia melalui pengentasan kemiskinan, penurunan stunting, dan pendidikan.</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                            <span class="w-6 h-6 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] font-black flex items-center justify-center shrink-0">4</span>
                            <p class="leading-relaxed">Melestarikan nilai-nilai budaya luhur, kearifan lokal, serta memperkuat ketahanan sosial dan lingkungan hidup berkelanjutan.</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 4. REGULASI (reg-perdes, reg-rancangan, reg-rpjmdes, reg-rkpdes, reg-kerjasama)
    // -------------------------------------------------------------
    if (menuKey === 'regulasi') {
        let subTitle = "Produk Hukum & Peraturan Desa";
        if (subKey === 'reg-rancangan') subTitle = "Rancangan Peraturan Desa (Uji Publik Partisipatif)";
        if (subKey === 'reg-rpjmdes') subTitle = "Rencana Pembangunan Jangka Menengah (RPJMDes 2021-2027)";
        if (subKey === 'reg-rkpdes') subTitle = "Rencana Kerja Pemerintah Desa (RKPDes 2026)";
        if (subKey === 'reg-kerjasama') subTitle = "Kerja Sama BPS Kolaka Utara & Perguruan Tinggi";

        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Jaringan Dokumentasi Hukum</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">${subTitle}</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">JDIH Kolut</span>
                </div>

                <div class="space-y-3">
                    ${d.regulasi.map(r => `
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3 hover:bg-emerald-50/70/40 transition">
                            <div class="space-y-1">
                                <div class="flex items-center gap-2">
                                    <span class="text-[9.5px] font-black uppercase text-[#3B4D3B] bg-[#E6ECE6] px-2 py-0.5 rounded">${r.nomor}</span>
                                    <span class="text-[10px] text-slate-400">Tahun ${r.tahun}</span>
                                </div>
                                <h4 class="text-xs font-black text-slate-900 leading-snug">${r.judul}</h4>
                                <p class="text-[11px] text-slate-500 leading-relaxed">${r.tentang}</p>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <button type="button" onclick="previewVillageDoc('${r.judul}', '${r.nomor}', '${r.tahun}', '${r.tentang}')" class="px-3 py-1.5 rounded-xl bg-white hover:bg-slate-100 text-slate-700 text-xs font-bold border border-slate-200 transition">
                                    Pratinjau
                                </button>
                                <button type="button" onclick="downloadVillageMockDoc('${r.nomor}')" class="px-3 py-1.5 rounded-xl bg-[#3B4D3B] hover:bg-[#2D3B2D] text-white text-xs font-bold shadow-sm transition">
                                    Unduh PDF
                                </button>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 5. LAPORAN (lap-lppd, lap-akhir, lap-kehadiran, lap-realisasi, lap-descan)
    // -------------------------------------------------------------
    if (menuKey === 'laporan') {
        let titleLap = "Laporan Penyelenggaraan Pemerintahan Desa (LPPD)";
        if (subKey === 'lap-akhir') titleLap = "Laporan Akhir Masa Jabatan (AMJ) Kepala Desa";
        if (subKey === 'lap-kehadiran') titleLap = "Rekapitulasi Kehadiran & Presensi Aparatur Desa";
        if (subKey === 'lap-realisasi') titleLap = "Laporan Realisasi Anggaran & Capaian Kinerja";
        if (subKey === 'lap-descan') titleLap = "Laporan Hasil Evaluasi Pembinaan Desa Cantik BPS";

        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Akuntabilitas Kinerja</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">${titleLap}</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">Transparansi Publik</span>
                </div>

                <div class="prose prose-sm text-slate-600 leading-relaxed">
                    <p>
                        Dokumen laporan ini merupakan bentuk pertanggungjawaban publik Pemerintah ${d.name} kepada Bupati Kolaka Utara, BPD, dan seluruh masyarakat desa sesuai prinsip keterbukaan informasi.
                    </p>
                </div>

                <div class="space-y-3">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                        <div>
                            <span class="text-[9.5px] font-black uppercase bg-[#E6ECE6] text-[#3B4D3B] px-2 py-0.5 rounded">Dokumen Resmi</span>
                            <h4 class="text-xs font-black text-slate-900 mt-1">${titleLap} ${d.name}</h4>
                            <p class="text-[11px] text-slate-500 mt-0.5">Tahun Anggaran 2025/2026 • Terverifikasi Inspektorat Daerah & BPS</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="previewVillageDoc('${titleLap}', 'LAPORAN-RESMI-2026', '2026', 'Laporan akuntabilitas kinerja dan pembinaan statistik presisi')" class="px-3 py-1.5 rounded-xl bg-white text-slate-700 text-xs font-bold border border-slate-200 hover:bg-slate-100">Pratinjau</button>
                            <button type="button" onclick="downloadVillageMockDoc('LAPORAN-RESMI-2026')" class="px-3 py-1.5 rounded-xl bg-[#3B4D3B] text-white text-xs font-bold shadow-sm hover:bg-[#2D3B2D]">Unduh PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 6. PPID DESA (ppid-profil, ppid-daftar, ppid-form)
    // -------------------------------------------------------------
    if (menuKey === 'ppid') {
        if (subKey === 'ppid-form') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Layanan Keterbukaan Informasi</span>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">Formulir Permohonan Informasi Publik (PPID)</h2>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">UU No. 14/2008</span>
                    </div>

                    <form onsubmit="submitPelayananSurat(event)" class="space-y-4 text-xs">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold text-slate-700 mb-1">Nomor Induk Kependudukan (NIK)</label>
                                <input type="text" id="suratNik" required maxlength="16" placeholder="16 digit NIK..." class="w-full px-3 py-2.5 rounded-xl border border-slate-300 outline-none focus:border-[#3B4D3B]">
                            </div>
                            <div>
                                <label class="block font-bold text-slate-700 mb-1">Nama Lengkap Pemohon</label>
                                <input type="text" id="suratNama" required placeholder="Nama lengkap..." class="w-full px-3 py-2.5 rounded-xl border border-slate-300 outline-none focus:border-[#3B4D3B]">
                            </div>
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Rincian Informasi Publik yang Dimohonkan</label>
                            <textarea rows="3" required placeholder="Tuliskan judul dokumen atau data yang ingin dimohonkan..." class="w-full px-3 py-2.5 rounded-xl border border-slate-300 outline-none focus:border-[#3B4D3B]"></textarea>
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Tujuan Penggunaan Informasi</label>
                            <input type="text" required placeholder="Penelitian, konfirmasi usaha, pelaporan, dll..." class="w-full px-3 py-2.5 rounded-xl border border-slate-300 outline-none focus:border-[#3B4D3B]">
                        </div>
                        <input type="hidden" id="suratJenis" value="Permohonan Informasi Publik PPID">
                        <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#2D3B2D] text-white font-bold text-xs shadow-md">
                            Kirim Permohonan Informasi →
                        </button>
                    </form>
                </div>
            `;
            return;
        }

        // DEFAULT PPID PROFIL / DAFTAR
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Pejabat Pengelola Informasi</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">PPID & Layanan Keterbukaan Informasi ${d.name}</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">KIP Terbuka</span>
                </div>

                <div class="prose prose-sm text-slate-600 leading-relaxed">
                    <p>
                        Pemerintah ${d.name} berkomitmen melayani pemohon informasi publik secara cepat, tepat waktu, biaya ringan, dan proporsional sesuai Undang-Undang Keterbukaan Informasi Publik.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                        <span class="font-black text-slate-900 block">Struktur Pejabat PPID Desa:</span>
                        <div class="space-y-1 text-slate-600">
                            <div>• <b>Atasan PPID:</b> ${d.kades.title} (${d.kades.nama})</div>
                            <div>• <b>Ketua PPID:</b> Sekretaris Desa</div>
                            <div>• <b>Petugas Meja Informasi:</b> Kasi Pelayanan Umum</div>
                        </div>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                        <span class="font-black text-slate-900 block">Waktu & Maklumat Pelayanan:</span>
                        <div class="space-y-1 text-slate-600">
                            <div>• Senin - Jumat: 08.00 - 15.30 WITA</div>
                            <div>• Waktu Tanggapan: Maksimal 10 Hari Kerja</div>
                            <div>• Biaya Perolehan: Gratis (Tanpa Pungutan)</div>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex gap-3">
                    <button type="button" onclick="selectVillageSubmenu('ppid', 'ppid-form', event)" class="px-4 py-2 rounded-xl bg-[#3B4D3B] text-white font-bold text-xs hover:bg-[#2D3B2D]">
                        Ajukan Permohonan Informasi Online →
                    </button>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 7. APBDES TRANSPARAN (apbdes-infografis, apbdes-rincian, apbdes-belanja, apbdes-pertanggungjawaban)
    // -------------------------------------------------------------
    if (menuKey === 'apbdes') {
        const a = d.apbdes;
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Transparansi Anggaran</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Anggaran Pendapatan & Belanja Desa (APBDes) 2026</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">TA 2026</span>
                </div>

                <!-- 3 Kartu Ringkasan APBDes -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="p-4 rounded-2xl bg-[#E6ECE6] border border-emerald-100 text-center">
                        <span class="text-[10px] font-bold text-[#3B4D3B] uppercase">Total Pendapatan</span>
                        <div class="text-base sm:text-lg font-black text-emerald-950 mt-1">${a.pendapatan}</div>
                        <span class="text-[10px] text-[#3B4D3B] font-semibold">Dana Desa + ADD + PADes</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-[#E6ECE6] border border-[#DCE3DD] text-center">
                        <span class="text-[10px] font-bold text-rose-800 uppercase">Total Belanja</span>
                        <div class="text-base sm:text-lg font-black text-slate-800 mt-1">${a.belanja}</div>
                        <span class="text-[10px] text-[#2D3B2D] font-semibold">Infrastruktur & Pelayanan</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-blue-50 border border-blue-100 text-center">
                        <span class="text-[10px] font-bold text-blue-800 uppercase">Pembiayaan Neto</span>
                        <div class="text-base sm:text-lg font-black text-blue-950 mt-1">${a.pembiayaan}</div>
                        <span class="text-[10px] text-blue-700 font-semibold">SILPA Terkelola</span>
                    </div>
                </div>

                <!-- Tabel Rincian Belanja per Bidang -->
                <div class="space-y-3">
                    <h4 class="text-xs font-black uppercase text-slate-900 tracking-wider">Alokasi Belanja Prioritas Berdasarkan Bidang:</h4>
                    <div class="space-y-2 text-xs">
                        ${a.bidang.map(b => `
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                                <div class="font-bold text-slate-800">${b.nama}</div>
                                <div class="font-black text-slate-900">${b.anggaran}</div>
                            </div>
                        `).join('')}
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs text-slate-500">Laporan disahkan oleh BPD & Pemkab Kolaka Utara</span>
                    <button type="button" onclick="previewVillageDoc('Laporan Realisasi APBDes 2026', 'PERDES-APBDES-2026', '2026', 'Rincian pertanggungjawaban APBDes')" class="px-4 py-2 rounded-xl bg-[#3B4D3B] text-white font-bold text-xs hover:bg-[#2D3B2D]">
                        Unduh Rincian APBDes PDF →
                    </button>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 8. BUMDES (bumdes-profil, bumdes-unit, bumdes-laporan)
    // -------------------------------------------------------------
    if (menuKey === 'bumdes') {
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Lembaga Ekonomi Desa</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">BUMDes Mandiri Sejahtera ${d.name}</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">Badan Hukum Kemenkumham</span>
                </div>

                <div class="prose prose-sm text-slate-600 leading-relaxed">
                    <p>
                        Badan Usaha Milik Desa (BUMDes) ${d.name} berperan sebagai pilar penggerak ekonomi warga, memperkuat rantai pasok komoditas unggulan desa, dan meningkatkan Pendapatan Asli Desa (PADes).
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <div class="p-4 rounded-2xl bg-[#E6ECE6] border border-emerald-100 space-y-1">
                        <span class="text-slate-500 block text-[10px] uppercase font-bold">Unit Usaha Utama</span>
                        <div class="font-black text-slate-900 text-sm">Pengolahan & Pemasaran Kakao/Hasil Tani</div>
                        <span class="text-[10px] text-[#3B4D3B] font-semibold">Kemitraan Petani Lokal</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-[#E6ECE6] border border-emerald-100 space-y-1">
                        <span class="text-slate-500 block text-[10px] uppercase font-bold">Unit Jasa Layanan</span>
                        <div class="font-black text-slate-900 text-sm">Agen Keuangan & Logistik Desa</div>
                        <span class="text-[10px] text-[#3B4D3B] font-semibold">BRILink & Transaksi Digital</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-[#E6ECE6] border border-emerald-100 space-y-1">
                        <span class="text-slate-500 block text-[10px] uppercase font-bold">Kontribusi PADes</span>
                        <div class="font-black text-slate-900 text-sm">Rp 45.000.000 / Tahun</div>
                        <span class="text-[10px] text-[#3B4D3B] font-semibold">Tercatat di APBDes 2026</span>
                    </div>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 9. KELEMBAGAAN DESA (lem-pkk, lem-lpmd, lem-karangtaruna, lem-posyandu, lem-linmas, lem-poktan)
    // -------------------------------------------------------------
    if (menuKey === 'lembaga') {
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Mitra Kemasyarakatan</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Kelembagaan Masyarakat ${d.name}</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">Pemberdayaan</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                        <div class="flex items-center gap-2 font-black text-slate-900"><span class="text-base">🌸</span> <span>TP-PKK (Tim Penggerak PKK) Desa & Dasawisma</span></div>
                        <p class="text-slate-600 leading-relaxed">Menjalankan 10 Program Pokok PKK, pembinaan dasawisma, pencegahan stunting balita, dan keterampilan ekonomi wanita tani.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                        <div class="flex items-center gap-2 font-black text-slate-900"><span class="text-base">🤝</span> <span>LPMD / LPMK</span></div>
                        <p class="text-slate-600 leading-relaxed">Lembaga Pemberdayaan Masyarakat Desa yang menjadi wadah partisipasi gotong royong warga dalam pelaksanaan proyek fisik dan sosial.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                        <div class="flex items-center gap-2 font-black text-slate-900"><span class="text-base">⚡</span> <span>Karang Taruna</span></div>
                        <p class="text-slate-600 leading-relaxed">Wadah kreativitas pemuda desa dalam bidang keolahragaan, kepemudaan, kesenian tradisional, dan kewirausahaan generasi muda.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                        <div class="flex items-center gap-2 font-black text-slate-900"><span class="text-base">🩺</span> <span>Posyandu & Kader Kesehatan</span></div>
                        <p class="text-slate-600 leading-relaxed">Melayani pemeriksaan rutin balita, ibu hamil, dan lansia secara terpadu di setiap dusun dengan pemantauan gizi ketat.</p>
                    </div>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 10. POTENSI & WISATA (wisata-item-*, wisata-semua)
    // -------------------------------------------------------------
    if (menuKey === 'wisata') {
        let itemIndex = 0;
        if (subKey.startsWith('wisata-item-')) {
            itemIndex = parseInt(subKey.replace('wisata-item-', '')) || 0;
        }
        const activeItem = d.wisataPotensi.items[itemIndex] || d.wisataPotensi.items[0] || { judul: 'Potensi Pertanian', deskripsi: 'Komoditas unggulan desa binaan.', icon: '🌱', kapasitas: 'Unggulan' };

        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Potensi & Komoditas Unggulan</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">${activeItem.judul}</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">${activeItem.kapasitas}</span>
                </div>

                <div class="p-6 rounded-2xl bg-gradient-to-br from-emerald-50 to-teal-50 border border-emerald-100 flex items-start gap-4">
                    <span class="text-4xl p-3 bg-white rounded-2xl shadow-sm">${activeItem.icon}</span>
                    <div class="space-y-2">
                        <h3 class="text-base font-black text-slate-900">${activeItem.judul}</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">${activeItem.deskripsi}</p>
                        <div class="text-xs font-bold text-[#3B4D3B]">
                            Estimasi Kapasitas Produksi: <span class="text-slate-900">${activeItem.kapasitas}</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <h4 class="text-xs font-black uppercase text-slate-900 tracking-wider">Daftar Potensi Lainnya di ${d.name}:</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        ${d.wisataPotensi.items.map((it, idx) => `
                            <button type="button" onclick="selectVillageSubmenu('wisata', 'wisata-item-${idx}', event)" class="p-3 rounded-2xl bg-slate-50 hover:bg-emerald-50/70 border border-slate-200 text-left transition flex items-center gap-2.5">
                                <span class="text-xl">${it.icon}</span>
                                <div class="min-w-0">
                                    <div class="text-xs font-black text-slate-900 truncate">${it.judul}</div>
                                    <div class="text-[10px] text-[#3B4D3B] font-bold">${it.kapasitas}</div>
                                </div>
                            </button>
                        `).join('')}
                    </div>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 11. BUDAYA (budaya-adat, budaya-seni, budaya-kearifan)
    // -------------------------------------------------------------
    if (menuKey === 'budaya') {
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Warisan Leluhur</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Kebudayaan & Kearifan Lokal ${d.name}</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">Kolaka Utara</span>
                </div>

                <div class="prose prose-sm text-slate-600 leading-relaxed">
                    <p>
                        Masyarakat ${d.name} menjunjung tinggi tradisi adat istiadat suku Tolaki, Bugis, dan Luwu yang harmonis. Nilai-nilai gotong royong menjadi fondasi utama dalam kehidupan sosial bermasyarakat.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                        <span class="font-black text-slate-900 block text-xs flex items-center gap-1.5"><span>🌿</span> <span>Tradisi Mosehe Wonua</span></span>
                        <p class="text-slate-600 leading-relaxed">Upacara syukuran adat dan penyucian desa yang digelar warga pasca panen raya komoditas perkebunan atau perikanan.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                        <span class="font-black text-slate-900 block text-xs flex items-center gap-1.5"><span>🎭</span> <span>Seni Tari Lulo Tradisional</span></span>
                        <p class="text-slate-600 leading-relaxed">Tarian persahabatan melingkar yang mencerminkan kesetaraan, kebersamaan, dan kerukunan antar warga desa binaan.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                        <span class="font-black text-slate-900 block text-xs flex items-center gap-1.5"><span>🤝</span> <span>Gotong Royong Sambatan</span></span>
                        <p class="text-slate-600 leading-relaxed">Kearifan lokal tolong-menolong dalam membuka lahan pertanian, memanen hasil bumi, dan mendirikan fasilitas umum.</p>
                    </div>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 12. MASTERPLAN DESA MADANI (mp-madani, mp-descan, mp-digital)
    // -------------------------------------------------------------
    if (menuKey === 'masterplan') {
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Perencanaan Masa Depan</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Masterplan Kawasan Desa MADANI & Desa Cantik BPS</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#E6ECE6] text-[#3B4D3B]">2026 - 2029</span>
                </div>

                <div class="p-5 rounded-2xl bg-gradient-to-r from-emerald-900 to-slate-900 text-white space-y-2">
                    <span class="text-[10px] font-black uppercase text-emerald-300">Peta Jalan Pembangunan:</span>
                    <h3 class="text-base sm:text-lg font-black leading-snug">
                        Transformasi Menuju Desa Berdaya Saing Tinggi Berbasis Satu Data Indonesia
                    </h3>
                </div>

                <div class="space-y-3 text-xs">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                        <span class="w-7 h-7 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] font-black flex items-center justify-center shrink-0">1</span>
                        <div>
                            <div class="font-black text-slate-900">Standardisasi 44 Indikator Sektoral (BPS Kolut)</div>
                            <p class="text-slate-600 mt-0.5 leading-relaxed">Memastikan seluruh data demografi, sosial, dan ekonomi desa terverifikasi sesuai kaidah metadata Satu Data Indonesia.</p>
                        </div>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                        <span class="w-7 h-7 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] font-black flex items-center justify-center shrink-0">2</span>
                        <div>
                            <div class="font-black text-slate-900">Digitalisasi Administrasi & Layanan Mandiri Warga</div>
                            <p class="text-slate-600 mt-0.5 leading-relaxed">Pengajuan surat, dokumen kependudukan, dan pengaduan dilakukan secara paperless dengan nomor tiket tracking otomatis.</p>
                        </div>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                        <span class="w-7 h-7 rounded-lg bg-[#E6ECE6] text-[#3B4D3B] font-black flex items-center justify-center shrink-0">3</span>
                        <div>
                            <div class="font-black text-slate-900">Kemandirian Ekonomi Berbasis Komoditas Presisi</div>
                            <p class="text-slate-600 mt-0.5 leading-relaxed">Pemanfaatan data potensi untuk peningkatan produksi kakao, cengkeh, nilam, dan perikanan dengan penyerapan pasar terjamin.</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 13. PELAYANAN ONLINE (pelayanan-sku, pelayanan-domisili, pelayanan-ktp, pelayanan-kk, pelayanan-tidakmampu, pelayanan-akta, pelayanan-pengaduan, pelayanan-pst)
    // -------------------------------------------------------------
    if (menuKey === 'pelayanan') {
        let labelJenis = 'Surat Keterangan Usaha (SKU)';
        if (subKey === 'pelayanan-domisili') labelJenis = 'Surat Keterangan Domisili';
        if (subKey === 'pelayanan-ktp') labelJenis = 'Surat Pengantar KTP-el';
        if (subKey === 'pelayanan-kk') labelJenis = 'Surat Pengantar Kartu Keluarga';
        if (subKey === 'pelayanan-tidakmampu') labelJenis = 'Surat Keterangan Tidak Mampu (SKTM)';
        if (subKey === 'pelayanan-akta') labelJenis = 'Surat Pengantar Akta Kelahiran/Kematian';
        if (subKey === 'pelayanan-pengaduan') labelJenis = 'Formulir Aspirasi & Pengaduan Warga';
        if (subKey === 'pelayanan-pst') labelJenis = 'Konsultasi Pojok Statistik (PST) BPS';

        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Layanan Mandiri Warga</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">${labelJenis}</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">Tiket Online</span>
                </div>

                <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-xs text-amber-900 flex items-center gap-3">
                    <span class="text-2xl">⚡</span>
                    <div>
                        <b>Layanan Cepat 1x24 Jam:</b> Setelah mengisi formulir ini, Anda akan memperoleh <b>Nomor Tiket Layanan</b> resmi yang dapat digunakan untuk mengambil surat di Kantor Desa atau dicetak langsung.
                    </div>
                </div>

                <form onsubmit="submitPelayananSurat(event)" class="space-y-4 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Nomor Induk Kependudukan (NIK)</label>
                            <input type="text" id="suratNik" maxlength="16" required placeholder="16 digit NIK sesuai KTP..."
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 outline-none focus:border-[#3B4D3B] focus:ring-2 focus:ring-emerald-100 font-medium">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Nama Lengkap Pemohon</label>
                            <input type="text" id="suratNama" required placeholder="Nama lengkap sesuai KTP..."
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 outline-none focus:border-[#3B4D3B] focus:ring-2 focus:ring-emerald-100 font-medium">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Nomor WhatsApp / HP Aktif</label>
                            <input type="tel" required placeholder="08..."
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 outline-none focus:border-[#3B4D3B] focus:ring-2 focus:ring-emerald-100 font-medium">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Dusun / RT Tempat Tinggal</label>
                            <input type="text" required placeholder="Misal: Dusun 01 RT 02..."
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 outline-none focus:border-[#3B4D3B] focus:ring-2 focus:ring-emerald-100 font-medium">
                        </div>
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Keperluan / Keterangan Tambahan</label>
                        <textarea rows="3" required placeholder="Tuliskan keterangan detail permohonan atau jenis usaha yang dijalankan..."
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 outline-none focus:border-[#3B4D3B] focus:ring-2 focus:ring-emerald-100 font-medium"></textarea>
                    </div>

                    <input type="hidden" id="suratJenis" value="${labelJenis}">

                    <div class="pt-2 flex items-center justify-between">
                        <span class="text-[11px] text-slate-500">Gratis tanpa biaya administrasi (Bebas Pungli).</span>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#2D3B2D] text-white font-black text-xs transition shadow-md flex items-center gap-2">
                            <span>Kirim Permohonan & Ambil Tiket</span> <span>→</span>
                        </button>
                    </div>
                </form>
            </div>
        `;
        return;
    }

    // Default fallback
    contentEl.innerHTML = `
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-4">
            <h3 class="text-base font-black text-slate-900">${menuKey.toUpperCase()} - ${subKey}</h3>
            <p class="text-xs text-slate-600">Halaman ini menyajikan informasi resmi Pemerintah ${d.name}.</p>
            <button type="button" onclick="selectVillageSubmenu('beranda', 'beranda', event)" class="px-4 py-2 rounded-xl bg-[#3B4D3B] text-white text-xs font-bold">
                Kembali ke Beranda Desa
            </button>
        </div>
    `;
}

// ==============================================================
// 7. INTERACTIVE MODAL & SUBMISSION HANDLERS
// ==============================================================
function handleQuickServiceSubmit(e) {
    if (e && typeof e.preventDefault === 'function') e.preventDefault();
    if (typeof document === 'undefined') return;
    const nik = document.getElementById('quickNik')?.value || '';
    const nama = document.getElementById('quickNama')?.value || '';
    const jenis = document.getElementById('quickJenisSurat')?.value || '';

    selectVillageSubmenu('pelayanan', 'pelayanan-sku');
    setTimeout(() => {
        if (document.getElementById('suratNik')) document.getElementById('suratNik').value = nik;
        if (document.getElementById('suratNama')) document.getElementById('suratNama').value = nama;
        if (document.getElementById('suratJenis')) document.getElementById('suratJenis').value = jenis;
    }, 150);
}

function submitPelayananSurat(e) {
    if (e && typeof e.preventDefault === 'function') e.preventDefault();
    if (typeof document === 'undefined') return;
    const d = getActiveDesaData();
    const nama = document.getElementById('suratNama')?.value || 'Warga';
    const nik = document.getElementById('suratNik')?.value || '7408...';
    const jenis = document.getElementById('suratJenis')?.value || 'Surat Keterangan';
    const randomTicket = 'TIKET-' + d.key.toUpperCase() + '-2026-' + Math.floor(1000 + Math.random() * 9000);

    const modalHtml = `
        <div id="ticketSuccessModal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl border border-slate-100 text-center space-y-4 animate-scaleUp">
                <div class="w-16 h-16 rounded-full bg-[#E6ECE6] text-[#3B4D3B] font-black text-2xl mx-auto flex items-center justify-center shadow-inner">
                    ✓
                </div>
                <div>
                    <span class="text-[10px] font-black uppercase text-[#3B4D3B] tracking-wider">Pengajuan Berhasil Diterima</span>
                    <h3 class="text-xl font-black text-slate-900 mt-0.5">Nomor Tiket Layanan Mandiri</h3>
                </div>
                <div class="p-4 rounded-2xl bg-slate-900 text-emerald-400 font-mono text-base font-black tracking-widest border border-slate-800 select-all">
                    ${randomTicket}
                </div>
                <div class="text-xs text-slate-600 text-left bg-slate-50 p-3.5 rounded-2xl space-y-1.5 border border-slate-200">
                    <div><b>Nama Pemohon:</b> ${nama}</div>
                    <div><b>NIK:</b> ${nik}</div>
                    <div><b>Jenis Surat:</b> ${jenis}</div>
                    <div><b>Status:</b> <span class="text-[#3B4D3B] font-bold">Diproses Kasi Pelayanan ${d.name}</span></div>
                    <div><b>Estimasi Selesai:</b> 1 x 24 Jam Kerja</div>
                </div>
                <div class="flex gap-2 pt-2">
                    <button type="button" onclick="window.print()" class="flex-1 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition">
                        Cetak Bukti Tiket
                    </button>
                    <button type="button" onclick="closeTicketModal()" class="flex-1 py-2.5 rounded-xl bg-[#3B4D3B] hover:bg-[#2D3B2D] text-white font-bold text-xs transition shadow-md">
                        Selesai
                    </button>
                </div>
            </div>
        </div>
    `;

    const existingModal = document.getElementById('ticketSuccessModal');
    if (existingModal) existingModal.remove();
    document.body.insertAdjacentHTML('beforeend', modalHtml);
}

function closeTicketModal() {
    if (typeof document === 'undefined') return;
    const m = document.getElementById('ticketSuccessModal');
    if (m) m.remove();
    selectVillageSubmenu('beranda', 'beranda');
}

function previewVillageDoc(judul, nomor, tahun, desc) {
    if (typeof document === 'undefined') return;
    const modalHtml = `
        <div id="villageDocPreviewModal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-slate-100 space-y-4 max-h-[85vh] overflow-y-auto">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-xl bg-[#E6ECE6] text-[#3B4D3B] font-bold flex items-center justify-center text-sm">📜</span>
                        <div>
                            <span class="text-[10px] font-black uppercase text-[#3B4D3B]">Pratinjau Dokumen Resmi</span>
                            <h3 class="text-sm font-black text-slate-900 leading-tight">${nomor}</h3>
                        </div>
                    </div>
                    <button type="button" onclick="document.getElementById('villageDocPreviewModal').remove()" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-sm">✕</button>
                </div>

                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-3 text-xs leading-relaxed text-slate-700">
                    <div class="text-center pb-2 border-b border-slate-200">
                        <div class="font-black text-sm uppercase">PEMERINTAH KABUPATEN KOLAKA UTARA</div>
                        <div class="font-bold text-xs uppercase">${getActiveDesaData().upperTitle}</div>
                        <div class="text-[10px] text-slate-500">${nomor} • TAHUN ${tahun}</div>
                    </div>
                    <p class="font-bold text-slate-900 text-center">${judul}</p>
                    <p>${desc}</p>
                    <p>Menimbang bahwa dalam rangka memberikan pelayanan berkualitas dan tertib administrasi, Pemerintah Desa menetapkan keputusan ini dengan mengacu pada peraturan perundang-undangan yang berlaku.</p>
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="document.getElementById('villageDocPreviewModal').remove()" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs">Tutup</button>
                    <button type="button" onclick="downloadVillageMockDoc('${nomor}')" class="px-4 py-2 rounded-xl bg-[#3B4D3B] hover:bg-[#2D3B2D] text-white font-bold text-xs shadow-md">Unduh Dokumen Asli (PDF)</button>
                </div>
            </div>
        </div>
    `;
    const existing = document.getElementById('villageDocPreviewModal');
    if (existing) existing.remove();
    document.body.insertAdjacentHTML('beforeend', modalHtml);
}

function downloadVillageMockDoc(docNo) {
    if (typeof document === 'undefined') return;
    const d = getActiveDesaData();
    const blob = new Blob([
        `REPUBLIK INDONESIA\n` +
        `PEMERINTAH KABUPATEN KOLAKA UTARA\n` +
        `${d.upperTitle}\n` +
        `DOKUMEN RESMI: ${docNo}\n\n` +
        `Status: Terverifikasi BPS Kab. Kolaka Utara 2026\n` +
        `Penyelenggara: ${d.name}, Kec. ${d.kecamatan}\n`
    ], { type: 'text/plain;charset=utf-8' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `Dokumen_${d.key}_${docNo.replace(/[^a-zA-Z0-9]/g, '_')}.txt`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

function filterVillagePortalContent(query) {
    if (typeof document === 'undefined') return;
    const resultsContainer = document.getElementById('searchDropdownResults');
    if (!resultsContainer) return;
    if (!query || query.trim().length < 2) {
        resultsContainer.classList.add('hidden');
        return;
    }

    const q = query.toLowerCase().trim();
    const matches = [];

    const searchable = [
        { title: 'Surat Keterangan Usaha (SKU)', menu: 'pelayanan', sub: 'pelayanan-sku', category: 'Layanan' },
        { title: 'Surat Keterangan Domisili', menu: 'pelayanan', sub: 'pelayanan-domisili', category: 'Layanan' },
        { title: 'Pengantar KTP-el', menu: 'pelayanan', sub: 'pelayanan-ktp', category: 'Layanan' },
        { title: 'Pengantar Kartu Keluarga (KK)', menu: 'pelayanan', sub: 'pelayanan-kk', category: 'Layanan' },
        { title: 'Keterangan Tidak Mampu (SKTM)', menu: 'pelayanan', sub: 'pelayanan-tidakmampu', category: 'Layanan' },
        { title: 'Akta Kelahiran & Kematian', menu: 'pelayanan', sub: 'pelayanan-akta', category: 'Layanan' },
        { title: 'Pengaduan Warga & Aspirasi', menu: 'pelayanan', sub: 'pelayanan-pengaduan', category: 'Layanan' },
        { title: 'Pojok Statistik (PST) BPS', menu: 'pelayanan', sub: 'pelayanan-pst', category: 'Layanan' },
        { title: 'Infografis APBDes 2026', menu: 'apbdes', sub: 'apbdes-infografis', category: 'Keuangan' },
        { title: 'Rincian PADes, DD & ADD', menu: 'apbdes', sub: 'apbdes-rincian', category: 'Keuangan' },
        { title: 'Belanja Pembangunan & Sosial', menu: 'apbdes', sub: 'apbdes-belanja', category: 'Keuangan' },
        { title: 'Pertanggungjawaban APBDes', menu: 'apbdes', sub: 'apbdes-pertanggungjawaban', category: 'Keuangan' },
        { title: 'Visi & Misi Desa MADANI', menu: 'pemerintahan', sub: 'pem-visimisi', category: 'Pemerintahan' },
        { title: 'Profil Kepala Desa / Lurah', menu: 'pemerintahan', sub: 'pem-kades', category: 'Pemerintahan' },
        { title: 'Perangkat Desa & Aparatur (SOTK)', menu: 'pemerintahan', sub: 'pem-perangkat', category: 'Pemerintahan' },
        { title: 'Tugas Pokok & Fungsi (Tupoksi)', menu: 'pemerintahan', sub: 'pem-tupoksi', category: 'Pemerintahan' },
        { title: 'Badan Permusyawaratan Desa (BPD)', menu: 'pemerintahan', sub: 'pem-bpd', category: 'Pemerintahan' },
        { title: 'Wilayah Dusun & RT', menu: 'pemerintahan', sub: 'pem-wilayah', category: 'Pemerintahan' },
        { title: 'Peta Wilayah & Batas Dusun', menu: 'profil', sub: 'profil-peta', category: 'Profil' },
        { title: 'Demografi & Statistik Penduduk', menu: 'profil', sub: 'profil-demografi', category: 'Profil' },
        { title: 'Sejarah & Asal Usul Desa', menu: 'profil', sub: 'profil-sejarah', category: 'Profil' },
        { title: 'Produk Hukum Perdes & Perkades', menu: 'regulasi', sub: 'reg-perdes', category: 'Regulasi' },
        { title: 'Rancangan Perdes Uji Publik', menu: 'regulasi', sub: 'reg-rancangan', category: 'Regulasi' },
        { title: 'RPJMDes 2021-2027', menu: 'regulasi', sub: 'reg-rpjmdes', category: 'Regulasi' },
        { title: 'RKPDes Tahun 2026', menu: 'regulasi', sub: 'reg-rkpdes', category: 'Regulasi' },
        { title: 'Kerja Sama BPS & Universitas', menu: 'regulasi', sub: 'reg-kerjasama', category: 'Regulasi' },
        { title: 'Laporan Penyelenggaraan LPPD', menu: 'laporan', sub: 'lap-lppd', category: 'Laporan' },
        { title: 'LPPD Akhir Masa Jabatan', menu: 'laporan', sub: 'lap-akhir', category: 'Laporan' },
        { title: 'Rekap Presensi & Kehadiran Aparatur', menu: 'laporan', sub: 'lap-kehadiran', category: 'Laporan' },
        { title: 'Realisasi Anggaran & Kinerja', menu: 'laporan', sub: 'lap-realisasi', category: 'Laporan' },
        { title: 'Laporan Pembinaan Desa Cantik', menu: 'laporan', sub: 'lap-descan', category: 'Laporan' },
        { title: 'Profil PPID & Maklumat Informasi', menu: 'ppid', sub: 'ppid-profil', category: 'PPID' },
        { title: 'Daftar Informasi Publik Berkala', menu: 'ppid', sub: 'ppid-daftar', category: 'PPID' },
        { title: 'Form Permohonan Informasi Publik', menu: 'ppid', sub: 'ppid-form', category: 'PPID' },
        { title: 'Profil & Legalitas BUMDes', menu: 'bumdes', sub: 'bumdes-profil', category: 'BUMDes' },
        { title: 'Unit Usaha BUMDes', menu: 'bumdes', sub: 'bumdes-unit', category: 'BUMDes' },
        { title: 'Laporan Keuangan BUMDes', menu: 'bumdes', sub: 'bumdes-laporan', category: 'BUMDes' },
        { title: 'TP-PKK & Dasawisma', menu: 'lembaga', sub: 'lem-pkk', category: 'Kelembagaan' },
        { title: 'LPMD Pemberdayaan', menu: 'lembaga', sub: 'lem-lpmd', category: 'Kelembagaan' },
        { title: 'Karang Taruna Pemuda', menu: 'lembaga', sub: 'lem-karangtaruna', category: 'Kelembagaan' },
        { title: 'Posyandu & Kader Kesehatan', menu: 'lembaga', sub: 'lem-posyandu', category: 'Kelembagaan' },
        { title: 'Satlinmas & Trantibum', menu: 'lembaga', sub: 'lem-linmas', category: 'Kelembagaan' },
        { title: 'Kelompok Tani (Gapoktan)', menu: 'lembaga', sub: 'lem-poktan', category: 'Kelembagaan' },
        { title: 'Katalog Potensi & Wisata Lengkap', menu: 'wisata', sub: 'wisata-semua', category: 'Potensi' },
        { title: 'Adat Istiadat Mosehe Wonua', menu: 'budaya', sub: 'budaya-adat', category: 'Budaya' },
        { title: 'Seni Tari Lulo Tradisional', menu: 'budaya', sub: 'budaya-seni', category: 'Budaya' },
        { title: 'Kearifan Lokal Gotong Royong', menu: 'budaya', sub: 'budaya-kearifan', category: 'Budaya' },
        { title: 'Masterplan Kawasan MADANI', menu: 'masterplan', sub: 'mp-madani', category: 'Masterplan' },
        { title: 'Integrasi Statistik Presisi DESCAN', menu: 'masterplan', sub: 'mp-descan', category: 'Masterplan' },
        { title: 'Rencana Transformasi Digital', menu: 'masterplan', sub: 'mp-digital', category: 'Masterplan' }
    ];

    searchable.forEach(item => {
        if (item.title.toLowerCase().includes(q) || item.category.toLowerCase().includes(q)) {
            matches.push(item);
        }
    });

    if (matches.length > 0) {
        resultsContainer.innerHTML = matches.map(m => `
            <div onclick="selectVillageSubmenu('${m.menu}', '${m.sub}', event); document.getElementById('searchDropdownResults').classList.add('hidden');" class="p-2.5 rounded-xl hover:bg-emerald-50/70 transition cursor-pointer flex items-center justify-between text-xs">
                <div>
                    <span class="text-[9px] font-black uppercase text-[#3B4D3B] bg-[#E6ECE6] px-1.5 py-0.5 rounded">${m.category}</span>
                    <div class="font-bold text-slate-800 mt-1">${m.title}</div>
                </div>
                <span class="text-[#3B4D3B] font-bold">Buka →</span>
            </div>
        `).join('');
        resultsContainer.classList.remove('hidden');
    } else {
        resultsContainer.innerHTML = `
            <div class="p-3 text-center text-xs text-slate-400">
                Tidak ada informasi yang sesuai dengan kata kunci "${query}".
            </div>
        `;
        resultsContainer.classList.remove('hidden');
    }
}

function openOperatorDESCANPortal() {
    if (typeof switchNavMenu === 'function') {
        switchNavMenu('dashboard');
    }
}

function toggleOperatorDashboardModal() {
    openOperatorDESCANPortal();
}

function toggleVillageMobileNav() {
    if (typeof document === 'undefined') return;
    const el = document.getElementById('villageMobileNavContent');
    if (el) el.classList.toggle('hidden');
}

// Auto-run if container already exists on load
if (typeof document !== 'undefined') {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            const el = document.getElementById('desaTopHeaderWrapper');
            if (el && typeof currentPortalDesaKey !== 'undefined') {
                initVillageHeader(currentPortalDesaKey);
            }
        });
    } else {
        const el = document.getElementById('desaTopHeaderWrapper');
        if (el && typeof currentPortalDesaKey !== 'undefined') {
            initVillageHeader(currentPortalDesaKey);
        }
    }
}
