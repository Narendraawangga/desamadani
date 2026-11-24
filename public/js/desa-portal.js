/**
 * DESA PORTAL ENGINE - SISTEM WEBSITE RESMI DESA & KELURAHAN TERINTEGRASI DESCAN
 * Kabupaten Kolaka Utara (Kecamatan Kodeoha & Kecamatan Tiwu)
 * Mendukung 6 Desa Binaan: Kamisi, Koroha, Mala-Mala, Lapolu, Tanggeawo, Mattiro Bulu
 * Palet Warna: Hijau Zamrud (#046A38), Emas/Kuning Lembut, Putih Bersih
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
    return VILLAGE_PORTAL_DATA[key] || VILLAGE_PORTAL_DATA['lapolu'];
}

// ==============================================================
// 2. HEADER 3 TINGKAT BUILDER
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
            <a href="javascript:void(0)" onclick="selectVillageSubmenu('wisata', 'wisata-item-${idx}')" class="flex items-center gap-2.5 px-3.5 py-2 text-xs font-semibold text-slate-700 hover:text-emerald-800 hover:bg-emerald-50 rounded-lg transition-colors">
                <span>${item.icon}</span>
                <span class="truncate">${item.judul}</span>
            </a>
        `;
    });

    headerContainer.innerHTML = `
        <!-- ========================================== -->
        <!-- TINGKAT 1: TOP BRANDING & PENCARIAN INSTAN -->
        <!-- ========================================== -->
        <div class="w-full bg-white border-b border-slate-200 shadow-2xs py-2.5 sm:py-3 px-3 sm:px-6 lg:px-10">
            <div class="max-w-[1600px] mx-auto flex flex-col md:flex-row items-center justify-between gap-3 sm:gap-4">
                
                <!-- Logo & Identitas Resmi Desa -->
                <div class="flex items-center gap-3 sm:gap-4 min-w-0 w-full md:w-auto">
                    <div class="flex items-center gap-2 shrink-0 bg-slate-50 p-1.5 rounded-xl border border-slate-200">
                        <img src="/images/logo_kolaka_utara.png" alt="Logo Pemkab Kolaka Utara" class="h-9 sm:h-10 w-auto object-contain">
                        <div class="h-6 w-[1.5px] bg-slate-300"></div>
                        <img src="/images/logo_bps.png" alt="Logo BPS" class="h-8 sm:h-9 w-auto object-contain">
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-0.5 rounded text-[9.5px] font-black uppercase tracking-wider bg-emerald-100 text-emerald-800 border border-emerald-300">
                                DESA CANTIK BPS 2026
                            </span>
                            <span class="text-[10px] text-slate-400 hidden sm:inline">• Portal Satu Data Sektoral</span>
                        </div>
                        <h1 class="text-sm sm:text-base lg:text-lg font-black text-slate-900 leading-tight tracking-tight uppercase truncate">
                            ${d.upperTitle}
                        </h1>
                        <p class="text-[10.5px] sm:text-xs text-slate-500 font-medium truncate">
                            Kecamatan ${d.kecamatan}, ${d.kabupaten} • Motto: <span class="text-emerald-700 italic font-semibold">"${d.motto}"</span>
                        </p>
                    </div>
                </div>

                <!-- Input Pencarian Instan & Tombol Navigasi Cepat -->
                <div class="flex items-center gap-2 sm:gap-3 w-full md:w-auto justify-end">
                    <!-- Search Input -->
                    <div class="relative flex-1 md:w-72 lg:w-84">
                        <input type="text" id="inputPortalSearch" oninput="filterVillagePortalContent(this.value)" 
                            placeholder="Cari info, regulasi, layanan..." 
                            class="w-full pl-9 pr-4 py-2 text-xs rounded-xl bg-slate-50 border border-slate-300 focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-200 outline-none transition-all placeholder:text-slate-400">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs">🔍</span>
                        <div id="searchDropdownResults" class="hidden absolute left-0 right-0 top-full mt-1.5 bg-white rounded-2xl shadow-2xl border border-slate-200 p-2 z-50 max-h-80 overflow-y-auto"></div>
                    </div>

                    <!-- Tombol Kembali ke Portal Utama DESCAN -->
                    <a href="/descan" class="px-3 sm:px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 hover:text-slate-900 text-xs font-bold transition flex items-center gap-1.5 shrink-0 border border-slate-200" title="Kembali ke Portal 6 Desa">
                        <span>←</span> <span class="hidden sm:inline">Portal DESCAN</span>
                    </a>

                    <!-- Tombol Masuk Mode Admin / Operator -->
                    <button type="button" onclick="toggleOperatorDashboardModal()" class="px-3 sm:px-3.5 py-2 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-bold transition flex items-center gap-1.5 shrink-0 shadow-sm" title="Buka Alat Operator Desa">
                        <span>⚙️</span> <span class="hidden lg:inline">Admin DESCAN</span>
                    </button>
                </div>

            </div>
        </div>

        <!-- ======================================================== -->
        <!-- TINGKAT 2: NAVBAR HIJAU TUA #046A38 & 13 MENU DROPDOWN    -->
        <!-- ======================================================== -->
        <nav class="w-full bg-[#046A38] text-white shadow-md sticky top-0 z-40">
            <div class="max-w-[1600px] mx-auto px-3 sm:px-6 lg:px-8 flex items-center justify-between">
                
                <!-- Desktop Menu List (13 Menu Utama) -->
                <div class="hidden lg:flex items-center flex-wrap gap-0.5 text-xs font-bold">
                    
                    <!-- 1. Beranda Desa -->
                    <button type="button" onclick="selectVillageSubmenu('beranda', 'beranda')" id="vmenu-beranda" 
                        class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1.5 rounded-t-lg transition border-b-2 border-transparent">
                        <span>🏠</span> <span>Beranda</span>
                    </button>

                    <!-- 2. Profil -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1 transition">
                            <span>Profil</span> <span class="text-[9px] opacity-75">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 top-full bg-white text-slate-800 rounded-b-xl shadow-xl border border-slate-200 p-2 min-w-[240px] z-50 animate-fadeIn">
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('profil', 'profil-umum')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🏛️</span> <span>Profil ${d.name}</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('profil', 'profil-peta')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🗺️</span> <span>Peta Wilayah & Batas Dusun</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('profil', 'profil-demografi')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📊</span> <span>Demografi & Statistik DESCAN</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('profil', 'profil-sejarah')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📜</span> <span>Sejarah & Potensi Unggulan</span>
                            </a>
                        </div>
                    </div>

                    <!-- 3. Pemerintahan -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1 transition">
                            <span>Pemerintahan</span> <span class="text-[9px] opacity-75">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 top-full bg-white text-slate-800 rounded-b-xl shadow-xl border border-slate-200 p-2 min-w-[260px] z-50 animate-fadeIn">
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pemerintahan', 'pem-visimisi')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🎯</span> <span>Visi & Misi</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pemerintahan', 'pem-kades')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>👤</span> <span>Profil ${d.kades.title}</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pemerintahan', 'pem-perangkat')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>👥</span> <span>Perangkat Desa / Aparatur</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pemerintahan', 'pem-tupoksi')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📋</span> <span>Tugas & Fungsi (Tupoksi)</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pemerintahan', 'pem-bpd')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🏛️</span> <span>Badan Permusyawaratan Desa (BPD)</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pemerintahan', 'pem-wilayah')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🏘️</span> <span>Wilayah Administratif Dusun & RT</span>
                            </a>
                        </div>
                    </div>

                    <!-- 4. Regulasi -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1 transition">
                            <span>Regulasi</span> <span class="text-[9px] opacity-75">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 top-full bg-white text-slate-800 rounded-b-xl shadow-xl border border-slate-200 p-2 min-w-[270px] z-50 animate-fadeIn">
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('regulasi', 'reg-perdes')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>⚖️</span> <span>Produk Hukum Perdes & Perkades</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('regulasi', 'reg-rancangan')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📝</span> <span>Rancangan Peraturan Desa (Uji Publik)</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('regulasi', 'reg-rpjmdes')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📘</span> <span>RPJMDes 2021 - 2027</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('regulasi', 'reg-rkpdes')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📑</span> <span>RKPDes Tahun Berjalan 2026</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('regulasi', 'reg-kerjasama')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🤝</span> <span>Kerja Sama BPS & Universitas</span>
                            </a>
                        </div>
                    </div>

                    <!-- 5. Laporan -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1 transition">
                            <span>Laporan</span> <span class="text-[9px] opacity-75">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 top-full bg-white text-slate-800 rounded-b-xl shadow-xl border border-slate-200 p-2 min-w-[260px] z-50 animate-fadeIn">
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('laporan', 'lap-lppd')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📄</span> <span>LPPD 2025/2026</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('laporan', 'lap-akhir')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📁</span> <span>LPPD Akhir Masa Jabatan</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('laporan', 'lap-kehadiran')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🕒</span> <span>Rekap Kehadiran Perangkat</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('laporan', 'lap-realisasi')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📈</span> <span>Realisasi Anggaran & Kinerja</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('laporan', 'lap-descan')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🛡️</span> <span>Laporan Pembinaan DESCAN</span>
                            </a>
                        </div>
                    </div>

                    <!-- 6. PPID -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1 transition">
                            <span>PPID</span> <span class="text-[9px] opacity-75">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 top-full bg-white text-slate-800 rounded-b-xl shadow-xl border border-slate-200 p-2 min-w-[260px] z-50 animate-fadeIn">
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('ppid', 'ppid-profil')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>ℹ️</span> <span>Profil PPID Desa</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('ppid', 'ppid-daftar')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📑</span> <span>Daftar Informasi Publik Berkala</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('ppid', 'ppid-form')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>✍️</span> <span>Formulir Permohonan Informasi</span>
                            </a>
                        </div>
                    </div>

                    <!-- 7. APBDes -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1 transition">
                            <span>APBDes</span> <span class="text-[9px] opacity-75">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 top-full bg-white text-slate-800 rounded-b-xl shadow-xl border border-slate-200 p-2 min-w-[260px] z-50 animate-fadeIn">
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('apbdes', 'apbdes-infografis')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📊</span> <span>Infografis & Rincian APBDes 2026</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('apbdes', 'apbdes-realisasi')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>💵</span> <span>Pertanggungjawaban Realisasi APBDes</span>
                            </a>
                        </div>
                    </div>

                    <!-- 8. BUMDes -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1 transition">
                            <span>BUMDes</span> <span class="text-[9px] opacity-75">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 top-full bg-white text-slate-800 rounded-b-xl shadow-xl border border-slate-200 p-2 min-w-[250px] z-50 animate-fadeIn">
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('bumdes', 'bumdes-profil')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🏬</span> <span>Profil & Struktur BUMDes</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('bumdes', 'bumdes-unit')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>💼</span> <span>Unit Usaha Unggulan & Kemitraan</span>
                            </a>
                        </div>
                    </div>

                    <!-- 9. Lembaga -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1 transition">
                            <span>Lembaga</span> <span class="text-[9px] opacity-75">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 top-full bg-white text-slate-800 rounded-b-xl shadow-xl border border-slate-200 p-2 min-w-[260px] z-50 animate-fadeIn">
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('lembaga', 'lembaga-pkk')" class="flex items-center gap-2 px-3 py-1.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>🌸</span> <span>TP-PKK</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('lembaga', 'lembaga-lpmd')" class="flex items-center gap-2 px-3 py-1.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>🏛️</span> <span>LPMD</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('lembaga', 'lembaga-karangtaruna')" class="flex items-center gap-2 px-3 py-1.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>⚽</span> <span>Karang Taruna</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('lembaga', 'lembaga-posyandu')" class="flex items-center gap-2 px-3 py-1.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>🩺</span> <span>Posyandu & Stunting</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('lembaga', 'lembaga-gapoktan')" class="flex items-center gap-2 px-3 py-1.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>🌾</span> <span>Gapoktan</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('lembaga', 'lembaga-pokdarwis')" class="flex items-center gap-2 px-3 py-1.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>🏖️</span> <span>Pokdarwis</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('lembaga', 'lembaga-paud')" class="flex items-center gap-2 px-3 py-1.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>👶</span> <span>PAUD Desa</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('lembaga', 'lembaga-linmas')" class="flex items-center gap-2 px-3 py-1.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>🛡️</span> <span>Satlinmas</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('lembaga', 'lembaga-banksampah')" class="flex items-center gap-2 px-3 py-1.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>♻️</span> <span>Bank Sampah</span></a>
                        </div>
                    </div>

                    <!-- 10. Potensi & Wisata (Disesuaikan Per Desa) -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1 transition">
                            <span>Potensi & Wisata</span> <span class="text-[9px] opacity-75">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 top-full bg-white text-slate-800 rounded-b-xl shadow-xl border border-slate-200 p-2 min-w-[280px] z-50 animate-fadeIn">
                            <div class="px-3 py-1.5 text-[10px] font-black uppercase text-emerald-800 bg-emerald-50 rounded-md mb-1">
                                ${d.wisataPotensi.kategori}
                            </div>
                            ${potensiItemsHtml}
                        </div>
                    </div>

                    <!-- 11. Budaya -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1 transition">
                            <span>Budaya</span> <span class="text-[9px] opacity-75">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 top-full bg-white text-slate-800 rounded-b-xl shadow-xl border border-slate-200 p-2 min-w-[270px] z-50 animate-fadeIn">
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('budaya', 'budaya-adat')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🌿</span> <span>Adat Mosehe & Tudang Sipulung</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('budaya', 'budaya-tari')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>💃</span> <span>Kesenian Tari Mondotambe</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('budaya', 'budaya-permainan')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🎯</span> <span>Permainan Tradisional Mallogo</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('budaya', 'budaya-bahasa')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🗣️</span> <span>Bahasa & Sastra Daerah</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('budaya', 'budaya-kuliner')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🍲</span> <span>Kuliner Sinonggi & Kriya Lokal</span>
                            </a>
                        </div>
                    </div>

                    <!-- 12. Masterplan -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 hover:bg-[#03532c] flex items-center gap-1 transition">
                            <span>Masterplan</span> <span class="text-[9px] opacity-75">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 top-full bg-white text-slate-800 rounded-b-xl shadow-xl border border-slate-200 p-2 min-w-[260px] z-50 animate-fadeIn">
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('masterplan', 'masterplan-madani')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>🌟</span> <span>Rintisan Desa MADANI Kolut</span>
                            </a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('masterplan', 'masterplan-descan')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg">
                                <span>📊</span> <span>Masterplan Desa Cantik (DESCAN)</span>
                            </a>
                        </div>
                    </div>

                    <!-- 13. Pelayanan -->
                    <div class="relative group">
                        <button type="button" class="vnav-link px-3 py-3 bg-[#eab308] text-slate-900 hover:bg-[#facc15] font-black rounded-lg flex items-center gap-1 transition shadow-sm ml-1">
                            <span>Pelayanan Online</span> <span class="text-[9px]">▾</span>
                        </button>
                        <div class="hidden group-hover:block absolute right-0 top-full bg-white text-slate-800 rounded-b-xl shadow-2xl border border-slate-200 p-2 min-w-[280px] z-50 animate-fadeIn">
                            <div class="px-3 py-1.5 text-[10px] font-black uppercase text-amber-800 bg-amber-50 rounded-md mb-1">
                                Pelayanan Cepat & Nomor Tiket
                            </div>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-ktp')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>🆔</span> <span>Pengantar KTP</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-kk')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>👨‍👩‍👧</span> <span>Pengantar Kartu Keluarga (KK)</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-sku')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>💼</span> <span>Surat Keterangan Usaha (SKU)</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-akta')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>📜</span> <span>Akta Kelahiran / Kematian</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-domisili')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>🏠</span> <span>Surat Keterangan Domisili</span></a>
                            <a href="javascript:void(0)" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-pst')" class="flex items-center gap-2 px-3 py-2 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-800 rounded-lg"><span>📊</span> <span>Pojok Statistik / PST BPS</span></a>
                        </div>
                    </div>

                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex items-center justify-between w-full lg:hidden py-2.5">
                    <div class="flex items-center gap-2 text-xs font-extrabold uppercase tracking-wider text-emerald-100">
                        <span>🧭</span> <span>Menu Resmi Desa</span>
                    </div>
                    <button type="button" onclick="toggleVillageMobileNav()" class="p-1.5 rounded-lg bg-[#03532c] text-white hover:bg-emerald-800 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>

            </div>

            <!-- Mobile Nav Collapsible Content -->
            <div id="villageMobileNavContent" class="hidden lg:hidden bg-[#034d28] border-t border-emerald-700/60 p-4 max-h-[70vh] overflow-y-auto space-y-2 text-xs font-semibold">
                <!-- Mobile Links Generated dynamically -->
                <div class="space-y-1">
                    <button type="button" onclick="selectVillageSubmenu('beranda', 'beranda'); toggleVillageMobileNav();" class="w-full text-left py-2 px-3 rounded hover:bg-emerald-800">🏠 Beranda Desa</button>
                    <button type="button" onclick="selectVillageSubmenu('profil', 'profil-umum'); toggleVillageMobileNav();" class="w-full text-left py-2 px-3 rounded hover:bg-emerald-800">🏛️ Profil Wilayah</button>
                    <button type="button" onclick="selectVillageSubmenu('pemerintahan', 'pem-visimisi'); toggleVillageMobileNav();" class="w-full text-left py-2 px-3 rounded hover:bg-emerald-800">🎯 Pemerintahan & Visi Misi</button>
                    <button type="button" onclick="selectVillageSubmenu('regulasi', 'reg-perdes'); toggleVillageMobileNav();" class="w-full text-left py-2 px-3 rounded hover:bg-emerald-800">⚖️ Regulasi & Perdes</button>
                    <button type="button" onclick="selectVillageSubmenu('apbdes', 'apbdes-infografis'); toggleVillageMobileNav();" class="w-full text-left py-2 px-3 rounded hover:bg-emerald-800">📊 Transparansi APBDes</button>
                    <button type="button" onclick="selectVillageSubmenu('wisata', 'wisata-item-0'); toggleVillageMobileNav();" class="w-full text-left py-2 px-3 rounded hover:bg-emerald-800">🏖️ Potensi & Wisata</button>
                    <button type="button" onclick="selectVillageSubmenu('budaya', 'budaya-adat'); toggleVillageMobileNav();" class="w-full text-left py-2 px-3 rounded hover:bg-emerald-800">🌿 Budaya & Tradisi</button>
                    <button type="button" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-sku'); toggleVillageMobileNav();" class="w-full text-left py-2 px-3 rounded bg-amber-500 text-slate-900 font-bold">✍️ Pelayanan Surat Mandiri</button>
                </div>
            </div>
        </nav>

        <!-- ======================================================== -->
        <!-- TINGKAT 3: SEKILAS INFO RUNNING TEXT (MARQUEE HIJAU LEMBUT) -->
        <!-- ======================================================== -->
        <div class="w-full bg-[#ecfdf5] border-b border-emerald-200/90 py-1.5 px-3 sm:px-6">
            <div class="max-w-[1600px] mx-auto flex items-center gap-3 text-xs">
                <span class="px-2.5 py-0.5 rounded-md bg-[#046A38] text-white text-[10px] font-black uppercase tracking-wider shrink-0 flex items-center gap-1 shadow-2xs">
                    <span>📢</span> <span>SEKILAS INFO</span>
                </span>
                <div class="overflow-hidden relative w-full select-none">
                    <marquee behavior="scroll" direction="left" scrollamount="5" class="text-emerald-950 font-bold">
                        🌿 [Jadwal Pelayanan] Kantor ${d.name} buka Senin - Jumat pukul 08.00 - 15.30 WITA • 
                        📊 [Satu Data Desa] Pendataan Sektoral & Pemutakhiran Data PODES BPS Kolaka Utara 2026 sedang berlangsung di seluruh Dusun • 
                        📝 [Layanan Mandiri] Pengajuan Surat Keterangan Usaha (SKU), Domisili, dan Pengantar KTP dapat dilakukan online melalui menu Pelayanan dengan nomor tiket instan • 
                        🛡️ [BPS Kolaka Utara] Pembinaan 44 Indikator Desa Cinta Statistik (DESCAN) untuk mewujudkan kemandirian data desa presisi.
                    </marquee>
                </div>
            </div>
        </div>
    `;
}

// ==============================================================
// 3. MAIN 2-COLUMN LAYOUT RENDERER
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

                <!-- KOLOM KANAN (lg:col-span-4): WIDGET PENDUKUNG TETAP -->
                <div id="desaWebSidebar" class="lg:col-span-4 space-y-6 sticky top-24">
                    <!-- Widget 1: Layanan Mandiri & Pojok Statistik -->
                    <!-- Widget 2: Statistik Ringkas Desa -->
                    <!-- Widget 3: Agenda & Berita Desa -->
                </div>

            </div>
        </div>
    `;

    renderVillageSidebarWidgets(d);
    renderVillageSubmenu(activeMenu, activeSub);
}

// ==============================================================
// 4. SIDEBAR WIDGETS RENDERER (KOLOM KANAN)
// ==============================================================
function renderVillageSidebarWidgets(d) {
    const sidebarEl = document.getElementById('desaWebSidebar');
    if (!sidebarEl) return;

    sidebarEl.innerHTML = `
        <!-- WIDGET 1: KARTU HIJAU ZAMRUD "LAYANAN MANDIRI & POJOK STATISTIK" -->
        <div class="rounded-3xl p-5 sm:p-6 bg-gradient-to-br from-[#046A38] via-[#057A42] to-[#03532c] text-white shadow-xl border border-emerald-500/30 relative overflow-hidden">
            <!-- Background Ornamen Vektor Lembut -->
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
                    <span class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-800 font-bold flex items-center justify-center text-sm">📈</span>
                    <div>
                        <span class="text-[10px] font-black uppercase text-slate-400 tracking-wider">Data Terverifikasi BPS</span>
                        <h4 class="text-sm font-black text-slate-900 leading-tight">Statistik Ringkas ${d.name}</h4>
                    </div>
                </div>
                <span class="px-2 py-0.5 rounded-full text-[9px] font-bold bg-emerald-100 text-emerald-800">2026</span>
            </div>

            <!-- 4 Angka Kunci -->
            <div class="grid grid-cols-2 gap-3 mb-4">
                <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/80">
                    <div class="text-[10px] font-bold text-slate-500 uppercase">Total Penduduk</div>
                    <div class="text-lg font-black text-slate-900 mt-0.5">${d.stats.penduduk} <span class="text-xs font-normal text-slate-500">Jiwa</span></div>
                    <div class="text-[9.5px] text-emerald-600 font-semibold mt-1">✓ Terdata Sektoral</div>
                </div>
                <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/80">
                    <div class="text-[10px] font-bold text-slate-500 uppercase">Kepala Keluarga</div>
                    <div class="text-lg font-black text-slate-900 mt-0.5">${d.stats.kk} <span class="text-xs font-normal text-slate-500">KK</span></div>
                    <div class="text-[9.5px] text-blue-600 font-semibold mt-1">✓ Regsosek Valid</div>
                </div>
                <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/80">
                    <div class="text-[10px] font-bold text-slate-500 uppercase">Luas Wilayah</div>
                    <div class="text-base font-black text-slate-900 mt-0.5">${d.stats.luas}</div>
                    <div class="text-[9.5px] text-slate-500 font-semibold mt-1">${d.stats.dusun}</div>
                </div>
                <div class="p-3 rounded-2xl bg-emerald-50 border border-emerald-200">
                    <div class="text-[10px] font-bold text-emerald-800 uppercase">Progres DESCAN</div>
                    <div class="text-lg font-black text-emerald-700 mt-0.5">${d.stats.progresDescan}</div>
                    <div class="text-[9.5px] text-emerald-700 font-bold mt-1">44 Indikator BPS</div>
                </div>
            </div>

            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200/70 text-xs">
                <span class="text-slate-600">Kasus Stunting:</span>
                <span class="font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded text-[11px]">${d.stats.stunting} (Sangat Rendah)</span>
            </div>
        </div>

        <!-- WIDGET 3: AGENDA & BERITA DESA TERBARU -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 shadow-md border border-slate-200/90">
            <div class="flex items-center gap-2 pb-3 mb-3 border-b border-slate-100">
                <span class="w-8 h-8 rounded-xl bg-amber-50 text-amber-800 font-bold flex items-center justify-center text-sm">📅</span>
                <div>
                    <span class="text-[10px] font-black uppercase text-slate-400 tracking-wider">Jadwal & Agenda Resmi</span>
                    <h4 class="text-sm font-black text-slate-900 leading-tight">Agenda & Berita Desa</h4>
                </div>
            </div>

            <div class="space-y-3.5">
                <!-- Item 1 -->
                <div class="flex items-start gap-3 p-2.5 rounded-2xl hover:bg-slate-50 transition cursor-pointer" onclick="selectVillageSubmenu('masterplan', 'masterplan-descan')">
                    <div class="w-10 h-10 rounded-xl bg-emerald-700 text-white flex flex-col items-center justify-center shrink-0 leading-none">
                        <span class="text-xs font-black">28</span>
                        <span class="text-[9px] uppercase font-bold text-emerald-200">Nov</span>
                    </div>
                    <div>
                        <h5 class="text-xs font-bold text-slate-900 hover:text-emerald-700 leading-snug">Bimtek Agen Statistik Desa Mandiri BPS Kolaka Utara</h5>
                        <p class="text-[11px] text-slate-500 mt-0.5">Pelatihan input metadata & 44 indikator SDI tingkat desa di Aula Kantor Desa.</p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="flex items-start gap-3 p-2.5 rounded-2xl hover:bg-slate-50 transition cursor-pointer" onclick="selectVillageSubmenu('lembaga', 'lembaga-posyandu')">
                    <div class="w-10 h-10 rounded-xl bg-rose-600 text-white flex flex-col items-center justify-center shrink-0 leading-none">
                        <span class="text-xs font-black">02</span>
                        <span class="text-[9px] uppercase font-bold text-rose-200">Des</span>
                    </div>
                    <div>
                        <h5 class="text-xs font-bold text-slate-900 hover:text-rose-700 leading-snug">Pelayanan Posyandu Balita & Remaja Serentak</h5>
                        <p class="text-[11px] text-slate-500 mt-0.5">Pemeriksaan tumbuh kembang, vitamin A, dan verifikasi data stunting terintegrasi.</p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="flex items-start gap-3 p-2.5 rounded-2xl hover:bg-slate-50 transition cursor-pointer" onclick="selectVillageSubmenu('regulasi', 'reg-rkpdes')">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex flex-col items-center justify-center shrink-0 leading-none">
                        <span class="text-xs font-black">10</span>
                        <span class="text-[9px] uppercase font-bold text-blue-200">Des</span>
                    </div>
                    <div>
                        <h5 class="text-xs font-bold text-slate-900 hover:text-blue-700 leading-snug">Musrenbangdes Penetapan RKPDes Tahun 2026</h5>
                        <p class="text-[11px] text-slate-500 mt-0.5">Musyawarah bersama BPD, LPM, PKK, dan tokoh masyarakat terkait alokasi Dana Desa.</p>
                    </div>
                </div>
            </div>
        </div>
    `;
}

// ==============================================================
// 5. SUBMENU CONTENT ENGINE (SEMUA 13 MENU LENGKAP & INTERAKTIF)
// ==============================================================
function selectVillageSubmenu(menuKey, subKey) {
    currentPortalActiveMenu = menuKey;
    currentPortalActiveSub = subKey || menuKey;

    if (typeof switchNavMenu === 'function') {
        switchNavMenu('beranda');
    }

    // Highlight active nav item
    document.querySelectorAll('.vnav-link').forEach(el => {
        el.classList.remove('bg-[#03532c]', 'border-amber-400');
    });
    const activeBtn = document.getElementById('vmenu-' + menuKey);
    if (activeBtn) {
        activeBtn.classList.add('bg-[#03532c]', 'border-amber-400');
    }

    renderVillageSubmenu(menuKey, currentPortalActiveSub);
    window.scrollTo({ top: 120, behavior: 'smooth' });
}

function renderVillageSubmenu(menuKey, subKey) {
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
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-black uppercase tracking-wider bg-emerald-500 text-white shadow-md">
                        <span>🏛️</span> <span>Website Resmi Pemerintahan</span>
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black leading-tight drop-shadow-md">
                        Selamat Datang di ${d.name}
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-200 leading-relaxed drop-shadow line-clamp-3">
                        "${d.kades.sambutan}"
                    </p>
                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <button type="button" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-sku')" class="px-4 py-2.5 rounded-xl bg-[#046A38] hover:bg-emerald-700 text-white text-xs font-black transition shadow-lg flex items-center gap-2">
                            <span>✍️</span> <span>Ajukan Surat Mandiri</span>
                        </button>
                        <button type="button" onclick="selectVillageSubmenu('profil', 'profil-umum')" class="px-4 py-2.5 rounded-xl bg-white/20 hover:bg-white/30 text-white text-xs font-bold transition backdrop-blur-md flex items-center gap-2">
                            <span>🔍</span> <span>Jelajahi Profil Wilayah</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- 4 Kartu KPI Statistik Desa Cantik BPS -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-xs flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-black uppercase text-slate-400">Total Warga</span>
                        <span class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center text-xs">👥</span>
                    </div>
                    <div class="text-xl sm:text-2xl font-black text-slate-900 mt-2">${d.stats.penduduk} <span class="text-xs font-normal text-slate-400">Jiwa</span></div>
                    <div class="text-[10px] text-emerald-600 font-bold mt-1">100% Terdata Regsosek</div>
                </div>
                <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-xs flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-black uppercase text-slate-400">Keluarga</span>
                        <span class="w-7 h-7 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center text-xs">🏡</span>
                    </div>
                    <div class="text-xl sm:text-2xl font-black text-slate-900 mt-2">${d.stats.kk} <span class="text-xs font-normal text-slate-400">KK</span></div>
                    <div class="text-[10px] text-blue-600 font-bold mt-1">${d.stats.dusun} Terbina</div>
                </div>
                <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-xs flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-black uppercase text-slate-400">Unit Usaha (IKM)</span>
                        <span class="w-7 h-7 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center text-xs">💼</span>
                    </div>
                    <div class="text-xl sm:text-2xl font-black text-slate-900 mt-2">${d.stats.ikm}</div>
                    <div class="text-[10px] text-amber-600 font-bold mt-1">Kemitraan BUMDes</div>
                </div>
                <div class="bg-white p-4 rounded-2xl border border-emerald-200 shadow-xs flex flex-col justify-between bg-emerald-50/40">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-black uppercase text-emerald-800">Progres SDI</span>
                        <span class="w-7 h-7 rounded-lg bg-emerald-600 text-white flex items-center justify-center text-xs">🛡️</span>
                    </div>
                    <div class="text-xl sm:text-2xl font-black text-emerald-700 mt-2">${d.stats.progresDescan}</div>
                    <div class="text-[10px] text-emerald-800 font-bold mt-1">Binaan BPS 2026</div>
                </div>
            </div>

            <!-- Seksi Pintasan Cepat 4 Layanan Surat -->
            <div class="bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/90 shadow-md">
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                    <div>
                        <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">Akses Langsung Warga</span>
                        <h3 class="text-base font-black text-slate-900">Pintasan Layanan Surat Keterangan Online</h3>
                    </div>
                    <button type="button" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-ktp')" class="text-xs font-bold text-emerald-700 hover:text-emerald-900 flex items-center gap-1">
                        <span>Semua Layanan</span> <span>→</span>
                    </button>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <button type="button" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-sku')" class="p-3.5 rounded-2xl bg-slate-50 hover:bg-emerald-50 border border-slate-200 hover:border-emerald-300 text-left transition group">
                        <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center text-base mb-2 group-hover:scale-110 transition-transform">💼</div>
                        <div class="text-xs font-bold text-slate-900 group-hover:text-emerald-800">Surat Izin Usaha (SKU)</div>
                        <p class="text-[10px] text-slate-500 mt-0.5">Untuk KUR & izin usaha mikro</p>
                    </button>
                    <button type="button" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-domisili')" class="p-3.5 rounded-2xl bg-slate-50 hover:bg-emerald-50 border border-slate-200 hover:border-emerald-300 text-left transition group">
                        <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-800 flex items-center justify-center text-base mb-2 group-hover:scale-110 transition-transform">🏠</div>
                        <div class="text-xs font-bold text-slate-900 group-hover:text-emerald-800">Surat Domisili</div>
                        <p class="text-[10px] text-slate-500 mt-0.5">Keterangan tempat tinggal resmi</p>
                    </button>
                    <button type="button" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-ktp')" class="p-3.5 rounded-2xl bg-slate-50 hover:bg-emerald-50 border border-slate-200 hover:border-emerald-300 text-left transition group">
                        <div class="w-9 h-9 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-base mb-2 group-hover:scale-110 transition-transform">🆔</div>
                        <div class="text-xs font-bold text-slate-900 group-hover:text-emerald-800">Pengantar KTP-el</div>
                        <p class="text-[10px] text-slate-500 mt-0.5">Pembuatan KTP baru/hilang</p>
                    </button>
                    <button type="button" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-pst')" class="p-3.5 rounded-2xl bg-slate-50 hover:bg-emerald-50 border border-slate-200 hover:border-emerald-300 text-left transition group">
                        <div class="w-9 h-9 rounded-xl bg-teal-100 text-teal-800 flex items-center justify-center text-base mb-2 group-hover:scale-110 transition-transform">📊</div>
                        <div class="text-xs font-bold text-slate-900 group-hover:text-emerald-800">Pojok Statistik (PST)</div>
                        <p class="text-[10px] text-slate-500 mt-0.5">Permintaan data BPS gratis</p>
                    </button>
                </div>
            </div>

            <!-- Potensi Utama Desa Carousel Mini -->
            <div class="bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/90 shadow-md">
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                    <div>
                        <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">${d.wisataPotensi.kategori}</span>
                        <h3 class="text-base font-black text-slate-900">Potensi Ekonomi & Pariwisata Unggulan ${d.name}</h3>
                    </div>
                    <button type="button" onclick="selectVillageSubmenu('wisata', 'wisata-item-0')" class="text-xs font-bold text-emerald-700 hover:text-emerald-900 flex items-center gap-1">
                        <span>Lihat Semua</span> <span>→</span>
                    </button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    ${d.wisataPotensi.items.map((it, idx) => `
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 hover:border-emerald-400 transition flex flex-col justify-between">
                            <div>
                                <div class="text-2xl mb-2">${it.icon}</div>
                                <h4 class="text-xs font-bold text-slate-900 leading-snug">${it.judul}</h4>
                                <p class="text-[11px] text-slate-500 mt-1 line-clamp-2">${it.deskripsi}</p>
                            </div>
                            <div class="mt-3 pt-2 border-t border-slate-200/80 flex items-center justify-between text-[10px] text-slate-400">
                                <span>📍 ${it.lokasi}</span>
                                <span class="font-bold text-emerald-700 cursor-pointer" onclick="selectVillageSubmenu('wisata', 'wisata-item-${idx}')">Detail →</span>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 2. PROFIL DESA & SUBMENU
    // -------------------------------------------------------------
    if (menuKey === 'profil') {
        if (subKey === 'profil-peta') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">Geografis & Pemetaan Wilayah</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Peta Wilayah & Batas Dusun ${d.name}</h2>
                        <p class="text-xs text-slate-500 mt-1">Data batas terestrial dan spasial BPS Kabupaten Kolaka Utara 2026.</p>
                    </div>

                    <!-- Batas Wilayah Card -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                            <span class="text-[10px] font-black uppercase text-slate-400">Batas Utara</span>
                            <div class="text-xs font-bold text-slate-900 mt-1">Perbukitan Hutan Lindung</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                            <span class="text-[10px] font-black uppercase text-slate-400">Batas Timur</span>
                            <div class="text-xs font-bold text-slate-900 mt-1">Kecamatan Lasusua</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                            <span class="text-[10px] font-black uppercase text-slate-400">Batas Selatan</span>
                            <div class="text-xs font-bold text-slate-900 mt-1">Desa Tetangga / Tiwu</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                            <span class="text-[10px] font-black uppercase text-slate-400">Batas Barat</span>
                            <div class="text-xs font-bold text-slate-900 mt-1">Pesisir Teluk Bone / Tiwu</div>
                        </div>
                    </div>

                    <!-- Tabel Dusun -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs text-left border-collapse">
                            <thead>
                                <tr class="bg-emerald-50 text-emerald-950 font-bold border-b border-emerald-200">
                                    <th class="py-2.5 px-3">No</th>
                                    <th class="py-2.5 px-3">Nama Dusun / Lingkungan</th>
                                    <th class="py-2.5 px-3">Kepala Dusun</th>
                                    <th class="py-2.5 px-3">Jumlah RT</th>
                                    <th class="py-2.5 px-3">Jumlah KK</th>
                                    <th class="py-2.5 px-3">Fokus Sektor</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                                ${d.dusunList.map(du => `
                                    <tr class="hover:bg-slate-50">
                                        <td class="py-2.5 px-3 font-bold">${du.no}</td>
                                        <td class="py-2.5 px-3 font-bold text-slate-900">${du.nama}</td>
                                        <td class="py-2.5 px-3">${du.kadus}</td>
                                        <td class="py-2.5 px-3">${du.rt} RT</td>
                                        <td class="py-2.5 px-3 font-bold text-emerald-700">${du.kk} KK</td>
                                        <td class="py-2.5 px-3"><span class="px-2 py-0.5 rounded-md bg-slate-100 text-[10px] font-semibold">${du.fokus}</span></td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
            `;
            return;
        }

        // Default Profil Umum / Sejarah / Demografi
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4">
                    <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">Mengenal Lebih Dekat</span>
                    <h2 class="text-xl sm:text-2xl font-black text-slate-900">Profil & Karakteristik ${d.name}</h2>
                    <p class="text-xs text-slate-500 mt-1">Kecamatan ${d.kecamatan}, Kabupaten Kolaka Utara, Sulawesi Tenggara.</p>
                </div>

                <div class="prose prose-sm text-slate-600 leading-relaxed space-y-4">
                    <p>
                        ${d.name} merupakan salah satu dari 6 desa binaan resmi Program Desa Cantik (Desa Cinta Statistik) Badan Pusat Statistik Kabupaten Kolaka Utara tahun 2026. Terletak di kawasan strategis Kecamatan ${d.kecamatan}, desa ini memiliki luas wilayah kurang lebih ${d.stats.luas} dengan topografi yang kaya akan potensi alam.
                    </p>
                    <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-950 font-medium">
                        <b>Ciri Khas Wilayah:</b> ${d.wisataPotensi.tagline}. Mayoritas mata pencaharian warga bertumpu pada sektor perkebunan kakao sambung pucuk, cengkeh perbukitan, perikanan tangkap Teluk Bone, dan sentra industri mikro kerajinan.
                    </div>
                    <p>
                        Dengan diterapkannya sistem Satu Data Indonesia (SDI) tingkat desa, seluruh data demografi, administrasi kependudukan, serta distribusi bantuan sosial telah terintegrasi secara digital sehingga meminimalisir ketidaktepatan sasaran pembangunan.
                    </p>
                </div>

                <div class="pt-4 border-t border-slate-100 flex flex-wrap gap-3">
                    <button type="button" onclick="selectVillageSubmenu('profil', 'profil-peta')" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs">
                        Lihat Peta Dusun →
                    </button>
                    <button type="button" onclick="selectVillageSubmenu('pemerintahan', 'pem-perangkat')" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs">
                        Lihat Aparatur Desa →
                    </button>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 3. PEMERINTAHAN (VISI MISI, KADES, PERANGKAT, TUPOKSI, BPD)
    // -------------------------------------------------------------
    if (menuKey === 'pemerintahan') {
        if (subKey === 'pem-kades') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">Pimpinan Wilayah</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Profil ${d.kades.title}</h2>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center gap-6">
                        <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-2xl overflow-hidden bg-slate-900 shrink-0 shadow-lg border-2 border-emerald-600">
                            <img src="${d.kades.photo}" alt="${d.kades.name}" class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-2 text-center sm:text-left">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black bg-emerald-100 text-emerald-800">Masa Jabatan ${d.kades.period}</span>
                            <h3 class="text-lg sm:text-xl font-black text-slate-900">${d.kades.name}</h3>
                            <p class="text-xs text-slate-500 font-semibold">${d.kades.title} • Kecamatan ${d.kecamatan}</p>
                            <p class="text-xs text-slate-600 italic pt-2">"${d.kades.sambutan}"</p>
                        </div>
                    </div>
                </div>
            `;
            return;
        }

        if (subKey === 'pem-perangkat') {
            contentEl.innerHTML = `
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">Aparatur Pemerintahan</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Perangkat Desa / Kelurahan ${d.name}</h2>
                        <p class="text-xs text-slate-500 mt-1">Struktur penyelenggara pemerintahan desa aktif periode berjalan.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        ${d.perangkatList.map(p => `
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                                <div>
                                    <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">${p.jabatan}</span>
                                    <h4 class="text-xs font-bold text-slate-900 mt-0.5">${p.nama}</h4>
                                    <span class="text-[10px] text-slate-400">NIPD: ${p.nipd}</span>
                                </div>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                    ✓ ${p.status}
                                </span>
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;
            return;
        }

        // Default Visi & Misi
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4">
                    <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">Arah Kebijakan Pembangunan</span>
                    <h2 class="text-xl sm:text-2xl font-black text-slate-900">Visi & Misi ${d.name} 2021 - 2027</h2>
                </div>

                <div class="p-6 rounded-2xl bg-gradient-to-r from-emerald-800 to-teal-800 text-white shadow-md">
                    <span class="text-[10px] font-black uppercase tracking-widest text-emerald-300">Visi Utama</span>
                    <h3 class="text-base sm:text-lg font-black mt-1 leading-snug">
                        "Terwujudnya ${d.name} yang Mandiri, Sejahtera, Agamis, Berbasis Kedaulatan Data dan Potensi Lokal Kolaka Utara Menuju Desa Madani 2027."
                    </h3>
                </div>

                <div class="space-y-3">
                    <h4 class="text-xs font-black uppercase tracking-wider text-slate-900">5 Misi Pembangunan Strategis:</h4>
                    <div class="space-y-2.5 text-xs text-slate-700 font-medium">
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-600 text-white font-bold flex items-center justify-center shrink-0 text-xs">1</span>
                            <span>Meningkatkan tata kelola pemerintahan desa yang bersih, transparan, akuntabel, dan berbasis data statistik presisi (Desa Cantik).</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-600 text-white font-bold flex items-center justify-center shrink-0 text-xs">2</span>
                            <span>Memperkuat perekonomian perdesaan melalui hilirisasi komoditas unggulan kakao, cengkeh, perikanan, serta optimalisasi peran BUMDes.</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-600 text-white font-bold flex items-center justify-center shrink-0 text-xs">3</span>
                            <span>Meningkatkan kualitas infrastruktur dasar perdesaan, jalan usaha tani, sistem irigasi, serta sarana air bersih dan sanitasi.</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-600 text-white font-bold flex items-center justify-center shrink-0 text-xs">4</span>
                            <span>Meningkatkan derajat kesehatan dan pendidikan masyarakat, penuntasan angka stunting melalui posyandu terintegrasi.</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-600 text-white font-bold flex items-center justify-center shrink-0 text-xs">5</span>
                            <span>Melestarikan nilai-nilai adat istiadat, budaya Mosehe, kesenian daerah, serta kerukunan hidup beragama.</span>
                        </div>
                    </div>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 4. REGULASI (PERDES, PERKADES, RPJMDES, RKPDes)
    // -------------------------------------------------------------
    if (menuKey === 'regulasi') {
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">JDIH & Produk Hukum</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Produk Hukum & Regulasi Desa</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 w-max">
                        Terverifikasi Bagian Hukum Pemkab
                    </span>
                </div>

                <div class="space-y-3">
                    ${[
                        { no: 'Perdes No. 01 Tahun 2026', judul: 'Anggaran Pendapatan dan Belanja Desa (APBDes) Tahun Anggaran 2026', jenis: 'Peraturan Desa', tgl: '05 Januari 2026' },
                        { no: 'Perdes No. 04 Tahun 2025', judul: 'Rencana Kerja Pemerintah Desa (RKPDes) Tahun 2026', jenis: 'Peraturan Desa', tgl: '18 September 2025' },
                        { no: 'Perdes No. 02 Tahun 2025', judul: 'Penyelenggaraan Desa Cinta Statistik & Pembentukan Agen Statistik Desa', jenis: 'Peraturan Desa', tgl: '12 Maret 2025' },
                        { no: 'Perkades No. 03 Tahun 2025', judul: 'Tata Kelola dan Standar Operasional Prosedur Layanan Surat Mandiri', jenis: 'Peraturan Kades', tgl: '22 April 2025' },
                        { no: 'MoU No. BPS-7408/2025', judul: 'Nota Kesepahaman Pembinaan Statistik Sektoral dengan BPS Kolaka Utara', jenis: 'Kerja Sama Lembaga', tgl: '14 Juli 2025' }
                    ].map(reg => `
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 hover:border-emerald-300 transition flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-0.5 rounded text-[9.5px] font-black bg-emerald-600 text-white uppercase">${reg.jenis}</span>
                                    <span class="text-[10px] text-slate-400 font-bold">${reg.tgl}</span>
                                </div>
                                <h4 class="text-xs font-bold text-slate-900 mt-1">${reg.no}: ${reg.judul}</h4>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <button type="button" onclick="previewVillageDoc('${reg.judul}', '${reg.no}', '2026', 'Dokumen hukum resmi lembaran desa terverifikasi.')" class="px-3 py-1.5 rounded-xl bg-white hover:bg-emerald-50 text-emerald-800 border border-emerald-300 font-bold text-xs transition cursor-pointer">
                                    Lihat Pratinjau
                                </button>
                                <button type="button" onclick="downloadVillageMockDoc('${reg.no}')" class="px-3 py-1.5 rounded-xl bg-[#046A38] hover:bg-emerald-800 text-white font-bold text-xs transition cursor-pointer shadow-2xs">
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
    // 5. APBDES (INFOGRAFIS & RINCIAN ANGGARAN 2026)
    // -------------------------------------------------------------
    if (menuKey === 'apbdes') {
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">Transparansi Keuangan Publik</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Infografis & Realisasi APBDes 2026</h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-black bg-amber-100 text-amber-900">
                        Status: Berjalan (Serapan 84,2%)
                    </span>
                </div>

                <!-- 3 Kartu Ringkasan Keuangan -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200">
                        <span class="text-[10px] font-black uppercase text-emerald-800">1. Pendapatan Desa</span>
                        <div class="text-lg font-black text-emerald-900 mt-1">Rp 1.285.450.000</div>
                        <div class="text-[10px] text-emerald-700 mt-1">Dana Desa, ADD & PADes</div>
                    </div>
                    <div class="p-4 rounded-2xl bg-blue-50 border border-blue-200">
                        <span class="text-[10px] font-black uppercase text-blue-800">2. Belanja Desa</span>
                        <div class="text-lg font-black text-blue-900 mt-1">Rp 1.250.200.000</div>
                        <div class="text-[10px] text-blue-700 mt-1">Pembangunan & Pemerintahan</div>
                    </div>
                    <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200">
                        <span class="text-[10px] font-black uppercase text-amber-800">3. Pembiayaan Neto</span>
                        <div class="text-lg font-black text-amber-900 mt-1">Rp 35.250.000</div>
                        <div class="text-[10px] text-amber-700 mt-1">Penyertaan Modal BUMDes</div>
                    </div>
                </div>

                <!-- Progres Bar 4 Bidang Belanja -->
                <div class="space-y-4 pt-2">
                    <h4 class="text-xs font-black uppercase text-slate-900">Alokasi Belanja Berdasarkan Bidang:</h4>
                    
                    <div class="space-y-1.5">
                        <div class="flex justify-between text-xs font-bold text-slate-700">
                            <span>Bidang Pelaksanaan Pembangunan Desa (44%)</span>
                            <span>Rp 550.088.000 (Serapan 88%)</span>
                        </div>
                        <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden">
                            <div class="h-full bg-emerald-600 rounded-full" style="width: 88%"></div>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex justify-between text-xs font-bold text-slate-700">
                            <span>Bidang Penyelenggaraan Pemerintahan (32%)</span>
                            <span>Rp 400.064.000 (Serapan 92%)</span>
                        </div>
                        <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden">
                            <div class="h-full bg-blue-600 rounded-full" style="width: 92%"></div>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex justify-between text-xs font-bold text-slate-700">
                            <span>Bidang Pembinaan Kemasyarakatan (12%)</span>
                            <span>Rp 150.024.000 (Serapan 78%)</span>
                        </div>
                        <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden">
                            <div class="h-full bg-amber-500 rounded-full" style="width: 78%"></div>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex justify-between text-xs font-bold text-slate-700">
                            <span>Bidang Pemberdayaan Masyarakat & BUMDes (12%)</span>
                            <span>Rp 150.024.000 (Serapan 80%)</span>
                        </div>
                        <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden">
                            <div class="h-full bg-teal-600 rounded-full" style="width: 80%"></div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // 6. PELAYANAN ONLINE & FORMULIR SURAT INTERAKTIF
    // -------------------------------------------------------------
    if (menuKey === 'pelayanan') {
        contentEl.innerHTML = `
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
                <div class="border-b border-slate-100 pb-4">
                    <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">Layanan Administrasi Kependudukan</span>
                    <h2 class="text-xl sm:text-2xl font-black text-slate-900">Formulir Pengajuan Surat Mandiri Online</h2>
                    <p class="text-xs text-slate-500 mt-1">Ajukan surat keterangan secara mandiri tanpa antre di kantor desa. Dapatkan nomor tiket resmi langsung.</p>
                </div>

                <!-- Formulir Pengajuan Surat -->
                <form id="formSuratOnline" onsubmit="submitPelayananSurat(event)" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap (Sesuai KTP) *</label>
                            <input type="text" id="suratNama" required placeholder="Contoh: Muhammad Ilham" 
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Nomor Induk Kependudukan (NIK) *</label>
                            <input type="text" id="suratNik" maxlength="16" required placeholder="16 digit NIK..." 
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Nomor WhatsApp / HP Aktif *</label>
                            <input type="tel" id="suratHp" required placeholder="08xxxxxxxxxx" 
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Jenis Layanan Surat *</label>
                            <select id="suratJenis" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 outline-none font-medium cursor-pointer">
                                <option value="Surat Keterangan Usaha (SKU)">Surat Keterangan Usaha (SKU)</option>
                                <option value="Surat Pengantar KTP-el">Surat Pengantar KTP-el</option>
                                <option value="Surat Pengantar Kartu Keluarga">Surat Pengantar Kartu Keluarga</option>
                                <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                                <option value="Surat Pengantar Akta Kelahiran">Surat Pengantar Akta Kelahiran</option>
                                <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                                <option value="Layanan Pojok Statistik (PST)">Layanan Pojok Statistik (PST)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Keperluan Pembuatan Surat *</label>
                        <textarea id="suratKeperluan" rows="3" required placeholder="Tuliskan alasan / instansi tujuan keperluan surat ini..."
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-amber-50 border border-amber-200 text-amber-950 text-xs">
                        <b>Catatan:</b> Berkas asli (KTP/KK) dapat ditunjukkan saat pengambilan fisik surat di Kantor Desa, atau unduh tanda tangan elektronik (TTE) setelah diverifikasi oleh Kasi Pelayanan.
                    </div>

                    <button type="submit" class="w-full py-3 px-6 rounded-xl bg-[#046A38] hover:bg-emerald-800 text-white font-black text-xs transition-all shadow-md flex items-center justify-center gap-2 cursor-pointer">
                        <span>📤</span> <span>Kirim Permohonan Surat & Dapatkan Tiket Resmi</span>
                    </button>
                </form>
            </div>
        `;
        return;
    }

    // -------------------------------------------------------------
    // DEFAULT RENDERER UNTUK SUBMENU LAINNYA (BUMDes, Lembaga, Budaya, Masterplan, PPID, Laporan)
    // -------------------------------------------------------------
    contentEl.innerHTML = `
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-md space-y-6">
            <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-black uppercase text-emerald-800 tracking-wider">${menuKey.toUpperCase()} DESA</span>
                    <h2 class="text-xl sm:text-2xl font-black text-slate-900">${subKey.replace(/-/g, ' ').toUpperCase()}</h2>
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                    Terverifikasi
                </span>
            </div>

            <div class="prose prose-sm text-slate-600 leading-relaxed space-y-4">
                <p>
                    Halaman ini menyajikan informasi resmi terkait <b>${subKey.replace(/-/g, ' ')}</b> pada Pemerintah ${d.name}, Kecamatan ${d.kecamatan}, Kabupaten Kolaka Utara. Seluruh data dipelihara secara akurat dan terhubung dengan pangkalan data Desa Cantik BPS.
                </p>
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                    <div class="flex items-center gap-2 text-xs font-bold text-slate-900 mb-1">
                        <span>📌</span> <span>Keterangan Status Data:</span>
                    </div>
                    <p class="text-xs text-slate-600">Dokumen dan data pada menu ini diperbarui secara berkala sesuai dengan jadwal pelaporan semesteran dan tahunan instansi pemerintah desa.</p>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center gap-3">
                <button type="button" onclick="selectVillageSubmenu('beranda', 'beranda')" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs">
                    ← Kembali ke Beranda Desa
                </button>
                <button type="button" onclick="selectVillageSubmenu('pelayanan', 'pelayanan-sku')" class="px-4 py-2 rounded-xl bg-[#046A38] hover:bg-emerald-800 text-white font-bold text-xs">
                    Ajukan Layanan Terkait →
                </button>
            </div>
        </div>
    `;
}

// ==============================================================
// 6. INTERACTIVE MODAL & SUBMISSION HANDLERS
// ==============================================================
function handleQuickServiceSubmit(e) {
    e.preventDefault();
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
    e.preventDefault();
    const d = getActiveDesaData();
    const nama = document.getElementById('suratNama')?.value || 'Warga';
    const nik = document.getElementById('suratNik')?.value || '7408...';
    const jenis = document.getElementById('suratJenis')?.value || 'Surat Keterangan';
    const randomTicket = 'TIKET-' + d.key.toUpperCase() + '-2026-' + Math.floor(1000 + Math.random() * 9000);

    // Tampilkan Modal Tiket Resmi
    const modalHtml = `
        <div id="ticketSuccessModal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl border border-slate-100 text-center space-y-4 animate-scaleUp">
                <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-800 font-black text-2xl mx-auto flex items-center justify-center shadow-inner">
                    ✓
                </div>
                <div>
                    <span class="text-[10px] font-black uppercase text-emerald-700 tracking-wider">Pengajuan Berhasil Diterima</span>
                    <h3 class="text-xl font-black text-slate-900 mt-0.5">Nomor Tiket Layanan Mandiri</h3>
                </div>
                <div class="p-4 rounded-2xl bg-slate-900 text-emerald-400 font-mono text-base font-black tracking-widest border border-slate-800 select-all">
                    ${randomTicket}
                </div>
                <div class="text-xs text-slate-600 text-left bg-slate-50 p-3.5 rounded-2xl space-y-1.5 border border-slate-200">
                    <div><b>Nama Pemohon:</b> ${nama}</div>
                    <div><b>NIK:</b> ${nik}</div>
                    <div><b>Jenis Surat:</b> ${jenis}</div>
                    <div><b>Status:</b> <span class="text-emerald-700 font-bold">Diproses Kasi Pelayanan ${d.name}</span></div>
                    <div><b>Estimasi Selesai:</b> 1 x 24 Jam Kerja</div>
                </div>
                <div class="flex gap-2 pt-2">
                    <button type="button" onclick="window.print()" class="flex-1 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition">
                        Cetak Bukti Tiket
                    </button>
                    <button type="button" onclick="closeTicketModal()" class="flex-1 py-2.5 rounded-xl bg-[#046A38] hover:bg-emerald-800 text-white font-bold text-xs transition shadow-md">
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
    const m = document.getElementById('ticketSuccessModal');
    if (m) m.remove();
    selectVillageSubmenu('beranda', 'beranda');
}

function previewVillageDoc(judul, nomor, tahun, desc) {
    const modalHtml = `
        <div id="villageDocPreviewModal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-slate-100 space-y-4 max-h-[85vh] overflow-y-auto">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-800 font-bold flex items-center justify-center text-sm">📜</span>
                        <div>
                            <span class="text-[10px] font-black uppercase text-emerald-800">Pratinjau Dokumen Resmi</span>
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
                    <button type="button" onclick="downloadVillageMockDoc('${nomor}')" class="px-4 py-2 rounded-xl bg-[#046A38] hover:bg-emerald-800 text-white font-bold text-xs shadow-md">Unduh Dokumen Asli (PDF)</button>
                </div>
            </div>
        </div>
    `;
    const existing = document.getElementById('villageDocPreviewModal');
    if (existing) existing.remove();
    document.body.insertAdjacentHTML('beforeend', modalHtml);
}

function downloadVillageMockDoc(docNo) {
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
        { title: 'Pengantar KTP & Kartu Keluarga', menu: 'pelayanan', sub: 'pelayanan-ktp', category: 'Layanan' },
        { title: 'Pojok Statistik (PST) BPS', menu: 'pelayanan', sub: 'pelayanan-pst', category: 'Layanan' },
        { title: 'Infografis APBDes 2026', menu: 'apbdes', sub: 'apbdes-infografis', category: 'Keuangan' },
        { title: 'Visi & Misi Desa', menu: 'pemerintahan', sub: 'pem-visimisi', category: 'Pemerintahan' },
        { title: 'Profil Kepala Desa / Lurah', menu: 'pemerintahan', sub: 'pem-kades', category: 'Pemerintahan' },
        { title: 'Perangkat Desa & Aparatur', menu: 'pemerintahan', sub: 'pem-perangkat', category: 'Pemerintahan' },
        { title: 'Peta Wilayah & Batas Dusun', menu: 'profil', sub: 'profil-peta', category: 'Profil' },
        { title: 'Produk Hukum Perdes & Perkades', menu: 'regulasi', sub: 'reg-perdes', category: 'Regulasi' },
        { title: 'Potensi & Wisata Unggulan', menu: 'wisata', sub: 'wisata-item-0', category: 'Potensi' },
        { title: 'Adat Mosehe & Kesenian Kolut', menu: 'budaya', sub: 'budaya-adat', category: 'Budaya' }
    ];

    searchable.forEach(item => {
        if (item.title.toLowerCase().includes(q) || item.category.toLowerCase().includes(q)) {
            matches.push(item);
        }
    });

    if (matches.length > 0) {
        resultsContainer.innerHTML = matches.map(m => `
            <div onclick="selectVillageSubmenu('${m.menu}', '${m.sub}'); document.getElementById('searchDropdownResults').classList.add('hidden');" class="p-2.5 rounded-xl hover:bg-emerald-50 transition cursor-pointer flex items-center justify-between text-xs">
                <div>
                    <span class="text-[9px] font-black uppercase text-emerald-800 bg-emerald-100 px-1.5 py-0.5 rounded">${m.category}</span>
                    <div class="font-bold text-slate-800 mt-1">${m.title}</div>
                </div>
                <span class="text-emerald-700 font-bold">Buka →</span>
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
    const el = document.getElementById('villageMobileNavContent');
    if (el) el.classList.toggle('hidden');
}
