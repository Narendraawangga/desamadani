/**
 * PODES 2025 COMPLETE DATA EXPLORER - KABUPATEN KOLAKA UTARA
 * Refactored Two-Stage Exploration Flow:
 * - State 1: Direktori 15 Kecamatan (Horizontal Card Carousel + Search Bar + Peeking Card)
 * - State 2: Split-Panel Detail Kecamatan (Sektor Unggulan + Swipeable 7 Sektor PODES + Tabel Desa)
 * Palet: Emerald/Teal (#3B4D3B, #3B4D3B, Badge #E6ECE6) • 100% Clean Look & Data Fidelity
 */
(function() {
  let masterData = null;
  let activeState = 'directory'; // 'directory' (State 1) or 'detail' (State 2)
  let activeKecamatanKey = 'KATOI';
  let activeSectorIndex = 0; // 0 to 6
  let activeTableTab = 'demografi';
  let searchQuery = '';
  let detailSearchQuery = '';

  const KEC_ORDER = [
    'KATOI', 'LAMBAI', 'LASUSUA', 'KODEOHA', 'BATU PUTIH',
    'RANTEANGIN', 'WAWO', 'TIWU', 'NGAPA', 'WATUNOHU',
    'PAKUE', 'PAKUE UTARA', 'PAKUE TENGAH', 'POREHU', 'TOLALA'
  ];

  const KEC_META = {
    'KATOI': {
      tag: 'Pesisir & Agribisnis Cengkeh',
      icon: '🌿',
      photo: '/images/kecamatan/katoi.jpg'
    },
    'LAMBAI': {
      tag: 'Perkebunan & Panorama Perbukitan',
      icon: '🌄',
      photo: '/images/kecamatan/lambai.jpg'
    },
    'LASUSUA': {
      tag: 'Ibu Kota & Wisata Bahari',
      icon: '🌊',
      photo: '/images/kecamatan/lasusua.jpg'
    },
    'KODEOHA': {
      tag: 'Sentra Utama Kakao Rakyat',
      icon: '🍫',
      photo: '/images/kecamatan/kodeoha.jpg'
    },
    'BATU PUTIH': {
      tag: 'Tebing Pesisir & Hasil Bumi',
      icon: '🏖️',
      photo: '/images/kecamatan/batu-putih.jpg'
    },
    'RANTEANGIN': {
      tag: 'Lumbung Sawah & Lembah',
      icon: '🌾',
      photo: '/images/kecamatan/ranteangin.jpg'
    },
    'WAWO': {
      tag: 'Danau Biru & Gerbang Selatan',
      icon: '💎',
      photo: '/images/kecamatan/wawo.jpg'
    },
    'TIWU': {
      tag: 'Kakao & Agroforestri',
      icon: '🌱',
      photo: '/images/kecamatan/tiwu.jpg'
    },
    'NGAPA': {
      tag: 'Pusat Perdagangan & Kakao',
      icon: '🏪',
      photo: '/images/kecamatan/ngapa.jpg'
    },
    'WATUNOHU': {
      tag: 'Koridor Kakao & Rempah Lada',
      icon: '🌶️',
      photo: '/images/kecamatan/watunohu.jpg'
    },
    'PAKUE': {
      tag: 'Lanskap Teluk Bone & Perkebunan',
      icon: '⛵',
      photo: '/images/kecamatan/pakue.jpg'
    },
    'PAKUE UTARA': {
      tag: 'Sentra Olahan Kakao & Kelapa',
      icon: '🏭',
      photo: '/images/kecamatan/pakue-utara.jpg'
    },
    'PAKUE TENGAH': {
      tag: 'Perbukitan Alami & Rempah Lada',
      icon: '⛰️',
      photo: '/images/kecamatan/pakue-tengah.jpg'
    },
    'POREHU': {
      tag: 'Episentrum Industri Minyak Nilam',
      icon: '🌿',
      photo: '/images/kecamatan/porehu.jpg'
    },
    'TOLALA': {
      tag: 'Ujung Utara Bahari & Lada',
      icon: '🏝️',
      photo: '/images/kecamatan/tolala.jpg'
    }
  };

  const SECTORS = [
    { id: 'demografi', name: 'Kependudukan', icon: 'bi-people-fill' },
    { id: 'pendidikan', name: 'Pendidikan', icon: 'bi-mortarboard-fill' },
    { id: 'kesehatan', name: 'Kesehatan', icon: 'bi-hospital-fill' },
    { id: 'ekonomi', name: 'Ekonomi & Industri', icon: 'bi-buildings-fill' },
    { id: 'lingkungan', name: 'Kelistrikan & Lingkungan', icon: 'bi-lightning-charge-fill' },
    { id: 'keuangan', name: 'Keuangan & BUMDes', icon: 'bi-wallet2' },
    { id: 'pemerintahan', name: 'Pemerintahan Desa', icon: 'bi-shield-check' }
  ];

  // Helper: Clean parsing of population density (handles comma, spaces, nulls)
  function parseKepadatan(val) {
    if (typeof val === 'number') return isNaN(val) ? 0 : val;
    if (!val) return 0;
    const clean = String(val).replace(/\s+/g, '').replace(',', '.');
    const num = parseFloat(clean);
    return isNaN(num) ? 0 : num;
  }

  // Helper: Compute consistent Total Population = Laki-laki + Perempuan
  function getDesaPop(d) {
    if (!d || !d.demografi) return 0;
    const l = Number(d.demografi.penduduk_l) || 0;
    const p = Number(d.demografi.penduduk_p) || 0;
    return l + p;
  }

  // Helper: Get dominant commodity of a village list
    // Helper: Get Bootstrap icon for commodity
  function getCommodityIconClass(comm) {
    if (!comm) return 'bi-flower2';
    const c = comm.toLowerCase();
    if (c.includes('kakao') || c.includes('coklat')) return 'bi-tree-fill';
    if (c.includes('cengkeh')) return 'bi-flower1';
    if (c.includes('nilam')) return 'bi-droplet-fill';
    if (c.includes('lada')) return 'bi-fire';
    if (c.includes('padi') || c.includes('beras') || c.includes('sawah')) return 'bi-sun-fill';
    if (c.includes('ikan') || c.includes('bahari') || c.includes('laut') || c.includes('pantai')) return 'bi-water';
    if (c.includes('kelapa') || c.includes('sawit')) return 'bi-tree';
    return 'bi-flower2';
  }

  function getDominantCommodity(desaList) {
    if (!desaList || !desaList.length) return 'Pertanian / Perkebunan';
    const counts = {};
    desaList.forEach(d => {
      const c = (d.ekonomi && d.ekonomi.komoditas) ? d.ekonomi.komoditas.trim() : '-';
      if (c && c !== '-') {
        counts[c] = (counts[c] || 0) + 1;
      }
    });
    const sorted = Object.keys(counts).sort((a, b) => counts[b] - counts[a]);
    return sorted[0] || 'Kakao & Cengkeh';
  }

  // Helper: Get count of villages with featured products
  function getFeaturedProductsInfo(desaList) {
    if (!desaList || !desaList.length) return { count: 0, products: [] };
    const prods = [];
    let count = 0;
    desaList.forEach(d => {
      const m = d.ekonomi && d.ekonomi.prod_unggulan_makanan && d.ekonomi.prod_unggulan_makanan !== '-' ? d.ekonomi.prod_unggulan_makanan : null;
      const nm = d.ekonomi && d.ekonomi.prod_unggulan_non_makanan && d.ekonomi.prod_unggulan_non_makanan !== '-' ? d.ekonomi.prod_unggulan_non_makanan : null;
      if (m || nm) {
        count++;
        if (m && !prods.includes(m)) prods.push(m);
        if (nm && !prods.includes(nm)) prods.push(nm);
      }
    });
    return { count, products: prods.slice(0, 4) };
  }

  function initExplorer() {
    masterData = window.PODES_KOLUT_MASTER_2025;
    if (!masterData) {
      setTimeout(initExplorer, 150);
      return;
    }

    // Fix Tojabi demographic anomaly in memory if present
    const tojabi = masterData.desa.find(d => d.nama.toLowerCase() === 'tojabi');
    if (tojabi && tojabi.demografi) {
      tojabi.demografi.penduduk_total = tojabi.demografi.penduduk_l + tojabi.demografi.penduduk_p;
    }

    setupSearchHandlers();
    renderState1Carousel();
    renderState1Summary();

    // Export functions to window
    window.selectKecamatanExploration = selectKecamatanExploration;
    window.backToKecamatanDirectory = backToKecamatanDirectory;
    window.setSectorSlide = setSectorSlide;
    window.prevSectorSlide = prevSectorSlide;
    window.nextSectorSlide = nextSectorSlide;
    window.setDetailTableTab = setDetailTableTab;
    window.exportActiveTableCSV = exportActiveTableCSV;
    window.exportKecamatanCSV = exportKecamatanCSV;
    window.scrollKecCarousel = scrollKecCarousel;
  }

  // -------------------------------------------------------------
  // STATE 1: DIREKTORI 15 KECAMATAN (CAROUSEL & SEARCH)
  // -------------------------------------------------------------
  function setupSearchHandlers() {
    const searchInput = document.getElementById('kecamatanPillSearch');
    if (searchInput) {
      searchInput.addEventListener('input', (e) => {
        searchQuery = (e.target.value || '').trim().toLowerCase();
        filterCarouselCards();
      });
    }

    const detailSearch = document.getElementById('detailDesaTableSearch');
    if (detailSearch) {
      detailSearch.addEventListener('input', (e) => {
        detailSearchQuery = (e.target.value || '').trim().toLowerCase();
        renderDetailVillageTable();
      });
    }
  }

  function filterCarouselCards() {
    const cards = document.querySelectorAll('.kec-carousel-card');
    let visibleCount = 0;
    cards.forEach(card => {
      const kKey = card.getAttribute('data-kec-key');
      const kData = masterData.kecamatan[kKey];
      if (!kData) return;

      if (!searchQuery) {
        card.style.display = 'flex';
        visibleCount++;
        return;
      }

      const matchKec = kData.nama.toLowerCase().includes(searchQuery);
      // Also check if any village inside this kecamatan matches the query
      const matchDesa = (kData.desa_list || []).some(d => d.nama.toLowerCase().includes(searchQuery));
      if (matchKec || matchDesa) {
        card.style.display = 'flex';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    const notFoundEl = document.getElementById('carouselNoResults');
    if (notFoundEl) {
      notFoundEl.style.display = visibleCount === 0 ? 'block' : 'none';
    }
  }

  function scrollKecCarousel(direction) {
    const container = document.getElementById('kecamatanCarouselTrack');
    if (!container) return;
    const scrollAmount = 340;
    container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    setTimeout(updateCarouselScrollIndicator, 300);
  }

  function updateCarouselScrollIndicator() {
    const container = document.getElementById('kecamatanCarouselTrack');
    const indicator = document.getElementById('carouselScrollProgress');
    if (!container || !indicator) return;
    const maxScroll = container.scrollWidth - container.clientWidth;
    if (maxScroll <= 0) {
      indicator.style.width = '100%';
      return;
    }
    const percent = Math.min(100, Math.max(10, (container.scrollLeft / maxScroll) * 100));
    indicator.style.width = percent + '%';
  }

  function renderState1Carousel() {
    const track = document.getElementById('kecamatanCarouselTrack');
    if (!track || !masterData) return;

    let html = '';
    KEC_ORDER.forEach((kKey, idx) => {
      const k = masterData.kecamatan[kKey];
      if (!k) return;

      const totL = (k.desa_list || []).reduce((a, b) => a + (Number(b.demografi.penduduk_l) || 0), 0);
      const totP = (k.desa_list || []).reduce((a, b) => a + (Number(b.demografi.penduduk_p) || 0), 0);
      const totPop = totL + totP;
      const indexStr = String(idx + 1).padStart(2, '0');

      const meta = KEC_META[kKey] || {
        photo: '/images/jadesta/kebun_kakao_totallang.jpg'
      };

      html += `
                <div class="kec-carousel-card relative w-[290px] sm:w-[330px] h-[185px] sm:h-[210px] flex-shrink-0 rounded-2xl overflow-hidden cursor-pointer group shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 select-none flex flex-col justify-end border border-[#DCE3DD]/20" 
             data-kec-key="${kKey}" 
             onclick="if(!window.isDraggingCarousel) window.selectKecamatanExploration('${kKey}')"
             title="Klik untuk melihat data Kecamatan ${k.nama}">
          
          <!-- Full-Bleed Atmospheric Landscape Photo -->
          <img src="${meta.photo}" 
               alt="Kecamatan ${k.nama}" 
               class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105 filter brightness-95"
               onerror="this.src='/images/jadesta/kebun_kakao_totallang.jpg'">

          <!-- Smooth Dark Gradient Overlay at Bottom -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent pointer-events-none"></div>

          <!-- Bottom Typography: Cinzel for Name, Plus Jakarta Sans for Population & Index -->
          <div class="relative z-10 p-5 sm:p-5.5 w-full flex items-end justify-between">
            <div>
              <h3 class="font-cinzel text-xl sm:text-2xl font-bold text-white tracking-[0.05em] uppercase leading-none group-hover:text-[#E6ECE6] transition-colors drop-shadow-md">
                ${k.nama}
              </h3>
              <p class="font-sans text-[11px] sm:text-xs font-semibold tracking-widest text-slate-300 uppercase mt-1.5 drop-shadow tabular-nums">
                ${totPop.toLocaleString('id-ID')} PENDUDUK
              </p>
            </div>
            <div class="font-mono text-xs sm:text-sm font-medium text-slate-300/80 tracking-widest drop-shadow pb-0.5">
              ${indexStr}
            </div>
          </div>
        </div>
      `;
    });

    track.innerHTML = html;

    // Attach scroll listener to update progress indicator
    track.addEventListener('scroll', updateCarouselScrollIndicator);

    // Enable smooth mouse drag scrolling without triggering accidental clicks
    window.isDraggingCarousel = false;
    let isDown = false;
    let startX = 0;
    let scrollLeft = 0;

    track.addEventListener('mousedown', (e) => {
      isDown = true;
      window.isDraggingCarousel = false;
      track.classList.add('cursor-grabbing');
      startX = e.pageX - track.offsetLeft;
      scrollLeft = track.scrollLeft;
    });

    track.addEventListener('mouseleave', () => {
      isDown = false;
      track.classList.remove('cursor-grabbing');
      setTimeout(() => { window.isDraggingCarousel = false; }, 50);
    });

    track.addEventListener('mouseup', () => {
      isDown = false;
      track.classList.remove('cursor-grabbing');
      setTimeout(() => { window.isDraggingCarousel = false; }, 80);
    });

    track.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - track.offsetLeft;
      const walk = (x - startX) * 1.5;
      if (Math.abs(walk) > 5) {
        window.isDraggingCarousel = true;
      }
      track.scrollLeft = scrollLeft - walk;
    });
  }

  function renderState1Summary() {
    const summaryContainer = document.getElementById('explorerAggregateSummary');
    if (!summaryContainer || !masterData) return;

    const allDesa = masterData.desa || [];
    const countDesa = allDesa.length;
    const totL = allDesa.reduce((a, b) => a + (Number(b.demografi.penduduk_l) || 0), 0);
    const totP = allDesa.reduce((a, b) => a + (Number(b.demografi.penduduk_p) || 0), 0);
    const totJiwa = totL + totP; // Exactly 145.679
    const avgKepadatan = countDesa ? (allDesa.reduce((a, b) => a + parseKepadatan(b.demografi.kepadatan_km2), 0) / countDesa).toFixed(1) : 0;
    const sexRatio = totP ? ((totL / totP) * 100).toFixed(1) : 100;
    const totIMK = allDesa.reduce((a, b) => a + (Number(b.ekonomi.imk) || 0), 0);
    const totPLN = allDesa.reduce((a, b) => a + (Number(b.lingkungan.pln_kk) || 0), 0);
    const totNonPLN = allDesa.reduce((a, b) => a + (Number(b.lingkungan.non_pln_kk) || 0), 0);
    const totTanpaListrik = allDesa.reduce((a, b) => a + (Number(b.lingkungan.tanpa_listrik_kk) || 0), 0);
    const rasioListrik = (totPLN + totNonPLN + totTanpaListrik) > 0 ? ((totPLN / (totPLN + totNonPLN + totTanpaListrik)) * 100).toFixed(2) : 99.55;

    summaryContainer.innerHTML = `
      <div class="bg-white rounded-3xl border border-[#DCE3DD] shadow-2xs overflow-hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 divide-y sm:divide-y-0 sm:divide-x divide-[#DCE3DD]">
          
          <!-- 01: Total Penduduk Riil (Mountain Pine) -->
          <div class="p-6 sm:p-7 flex flex-col justify-between hover:bg-[#E6ECE6]/20 transition-colors">
            <div>
              <div class="text-xs font-mono font-medium text-[#8A9B86] tracking-widest mb-2">01</div>
              <h4 class="font-cormorant text-base sm:text-lg font-bold tracking-wider uppercase text-[#1D241E] leading-snug">
                Total Penduduk Riil
              </h4>
            </div>
            <div class="mt-4">
              <div class="text-3xl sm:text-4xl font-black text-[#3B4D3B] tracking-tight tabular-nums font-sans">
                ${totJiwa.toLocaleString('id-ID')}
              </div>
              <p class="text-xs text-[#5E6B61] font-medium mt-1.5 leading-relaxed font-sans">
                L: ${totL.toLocaleString('id-ID')} • P: ${totP.toLocaleString('id-ID')}
              </p>
            </div>
          </div>

          <!-- 02: Rata-Rata Kepadatan (Deep Pine Charcoal) -->
          <div class="p-6 sm:p-7 flex flex-col justify-between hover:bg-[#E6ECE6]/20 transition-colors">
            <div>
              <div class="text-xs font-mono font-medium text-[#8A9B86] tracking-widest mb-2">02</div>
              <h4 class="font-cormorant text-base sm:text-lg font-bold tracking-wider uppercase text-[#1D241E] leading-snug">
                Rata-Rata Kepadatan
              </h4>
            </div>
            <div class="mt-4">
              <div class="text-3xl sm:text-4xl font-black text-[#1D241E] tracking-tight tabular-nums font-sans">
                ${avgKepadatan} <span class="text-xs font-semibold text-[#5E6B61]">Jiwa/km²</span>
              </div>
              <p class="text-xs text-[#5E6B61] font-medium mt-1.5 leading-relaxed font-sans">
                Cakupan 15 Kecamatan / 133 Desa
              </p>
            </div>
          </div>

          <!-- 03: Rasio Jenis Kelamin (Alpine Olive) -->
          <div class="p-6 sm:p-7 flex flex-col justify-between hover:bg-[#E6ECE6]/20 transition-colors">
            <div>
              <div class="text-xs font-mono font-medium text-[#8A9B86] tracking-widest mb-2">03</div>
              <h4 class="font-cormorant text-base sm:text-lg font-bold tracking-wider uppercase text-[#1D241E] leading-snug">
                Rasio Jenis Kelamin
              </h4>
            </div>
            <div class="mt-4">
              <div class="text-3xl sm:text-4xl font-black text-[#566B53] tracking-tight tabular-nums font-sans">
                ${sexRatio}
              </div>
              <p class="text-xs text-[#5E6B61] font-medium mt-1.5 leading-relaxed font-sans">
                Laki-laki per 100 Perempuan
              </p>
            </div>
          </div>

          <!-- 04: Sentra & IMK Produktif (Mountain Pine) -->
          <div class="p-6 sm:p-7 flex flex-col justify-between hover:bg-[#E6ECE6]/20 transition-colors">
            <div>
              <div class="text-xs font-mono font-medium text-[#8A9B86] tracking-widest mb-2">04</div>
              <h4 class="font-cormorant text-base sm:text-lg font-bold tracking-wider uppercase text-[#1D241E] leading-snug">
                Sentra & IMK Produktif
              </h4>
            </div>
            <div class="mt-4">
              <div class="text-3xl sm:text-4xl font-black text-[#3B4D3B] tracking-tight tabular-nums font-sans">
                ${totIMK.toLocaleString('id-ID')}
              </div>
              <p class="text-xs text-[#5E6B61] font-medium mt-1.5 leading-relaxed font-sans">
                Listrik PLN: ${rasioListrik}%
              </p>
            </div>
          </div>

        </div>
      </div>
    `;
  }

  // -------------------------------------------------------------
  // STATE 2: DETAIL KECAMATAN (SPLIT-PANEL DUA KOLOM + SWIPE)
  // -------------------------------------------------------------
  function selectKecamatanExploration(kKey) {
    if (!masterData || !masterData.kecamatan[kKey]) return;
    activeKecamatanKey = kKey;
    activeSectorIndex = 0;
    detailSearchQuery = '';

    const dirEl = document.getElementById('podesStateDirectory');
    const detailEl = document.getElementById('podesStateDetail');

    if (dirEl && detailEl) {
      dirEl.style.display = 'none';
      detailEl.style.display = 'block';
      detailEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    renderState2SplitPanel();
    renderDetailVillageTable();
  }

  function backToKecamatanDirectory() {
    activeState = 'directory';
    const dirEl = document.getElementById('podesStateDirectory');
    const detailEl = document.getElementById('podesStateDetail');

    if (dirEl && detailEl) {
      detailEl.style.display = 'none';
      dirEl.style.display = 'block';
      dirEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  }

  function setSectorSlide(index) {
    if (index < 0 || index >= SECTORS.length) return;
    activeSectorIndex = index;
    renderRightSectorCard();
  }

  function prevSectorSlide() {
    activeSectorIndex = (activeSectorIndex - 1 + SECTORS.length) % SECTORS.length;
    renderRightSectorCard();
  }

  function nextSectorSlide() {
    activeSectorIndex = (activeSectorIndex + 1) % SECTORS.length;
    renderRightSectorCard();
  }

  function renderState2SplitPanel() {
    const k = masterData.kecamatan[activeKecamatanKey];
    if (!k) return;

    const desaList = k.desa_list || [];
    const dominantComm = getDominantCommodity(desaList);
    const prodInfo = getFeaturedProductsInfo(desaList);
    const totIMK = desaList.reduce((a, b) => a + (Number(b.ekonomi.imk) || 0), 0);
    const totBumdes = desaList.reduce((a, b) => a + (Number(b.pemerintahan.bumdes) || 0), 0);

    // 1. Render Left Panel (Sektor Unggulan) - Minimalist Editorial Split
    const leftPanel = document.getElementById('kecDetailLeftPanel');
    if (leftPanel) {
      leftPanel.innerHTML = `
        <div class="h-full flex flex-col justify-between p-6 sm:p-8 lg:p-10">
          <div>
            <!-- Top Controls: Back Button & Regional Code -->
            <div class="flex items-center justify-between gap-2">
              <button onclick="window.backToKecamatanDirectory()" class="inline-flex items-center gap-2 text-xs font-semibold text-[#5E6B61] hover:text-[#1D241E] transition-colors cursor-pointer group font-sans">
                <i class="bi bi-arrow-left text-[#3B4D3B] transition-transform group-hover:-translate-x-1"></i>
                <span>Semua Kecamatan</span>
              </button>
              <span class="font-mono text-xs tracking-wider text-[#8A9B86]">
                KODE: ${k.kode || '-'}
              </span>
            </div>

            <!-- Big Kecamatan Heading -->
            <h2 class="font-cinzel text-3xl sm:text-4xl lg:text-[42px] font-bold text-[#1D241E] tracking-[0.05em] uppercase leading-tight mt-5">
              ${k.nama}
            </h2>
            <p class="font-sans text-xs sm:text-sm text-[#5E6B61] mt-1.5 flex items-center gap-2">
              <span>Wilayah Administratif</span>
              <span class="text-[#8A9B86]">•</span>
              <span>Terdiri dari <strong class="text-[#1D241E] font-bold">${desaList.length} Desa & Kelurahan</strong></span>
            </p>

            <div class="border-t border-[#DCE3DD] my-6"></div>

            <!-- Sektor Unggulan Header -->
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#3B4D3B]"></span>
                <span class="text-[11px] font-mono font-bold uppercase tracking-[0.2em] text-[#5E6B61]">SEKTOR UNGGULAN WILAYAH</span>
              </div>
              <span class="font-mono text-xs text-[#8A9B86]">PODES 2025</span>
            </div>

            <!-- Dominant Commodity (Open, No Box) -->
            <div class="mt-4">
              <div class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86]">KOMODITAS UTAMA DOMINAN</div>
              <div class="font-cinzel text-2xl sm:text-3xl font-bold text-[#1D241E] tracking-tight uppercase mt-0.5">
                ${dominantComm}
              </div>
              <p class="text-xs text-[#5E6B61] mt-1 font-sans leading-relaxed">
                Basis komoditas perkebunan rakyat dan agribisnis utama di wilayah Kecamatan ${k.nama}.
              </p>
            </div>

            <!-- 3 Column Metrics (Senada dengan 01 / 02 / 03 / 04) -->
            <div class="grid grid-cols-3 divide-x divide-[#DCE3DD] border-t border-b border-[#DCE3DD] py-5 my-6">
              <div class="pr-3">
                <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">01 / UNIT IMK</span>
                <div class="text-2xl sm:text-3xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">
                  ${totIMK.toLocaleString('id-ID')}
                </div>
                <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Usaha Mikro/Kecil</span>
              </div>

              <div class="px-3">
                <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">02 / PRODUK KHAS</span>
                <div class="text-2xl sm:text-3xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">
                  ${prodInfo.count} <span class="text-xs font-normal text-[#5E6B61]">Desa</span>
                </div>
                <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Desa Unggulan</span>
              </div>

              <div class="pl-3">
                <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">03 / BUMDES</span>
                <div class="text-2xl sm:text-3xl font-bold text-[#566B53] tabular-nums font-sans mt-1">
                  ${totBumdes} <span class="text-xs font-normal text-[#5E6B61]">Unit</span>
                </div>
                <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Kemandirian Desa</span>
              </div>
            </div>
          </div>

          <!-- Bottom: Featured Products (Subtle chips) -->
          ${prodInfo.products.length ? `
            <div class="pt-2">
              <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block mb-2">PRODUK UNGGULAN TERDATA:</span>
              <div class="flex flex-wrap gap-2">
                ${prodInfo.products.map(p => `
                  <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#E6ECE6] text-[#3B4D3B] text-xs font-medium font-sans">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#3B4D3B]"></span>
                    <span>${p}</span>
                  </span>
                `).join('')}
              </div>
            </div>
          ` : `
            <div class="text-xs text-[#8A9B86] font-sans">
              Data dihimpun dari sensus Potensi Desa (PODES) 2025 BPS Kabupaten Kolaka Utara.
            </div>
          `}
        </div>
      `;
    }

    // 2. Render Right Panel (Swipeable 7 Sektor PODES)
    renderRightSectorCard();
  }

  function renderRightSectorCard() {
    const k = masterData.kecamatan[activeKecamatanKey];
    if (!k) return;

    const desaList = k.desa_list || [];
    const sec = SECTORS[activeSectorIndex];
    const rightPanel = document.getElementById('kecDetailRightPanel');
    if (!rightPanel) return;

    // Generate pagination dots
    const dotsHtml = SECTORS.map((s, idx) => {
      const isActive = idx === activeSectorIndex;
      return `
        <button onclick="window.setSectorSlide(${idx})" 
                class="h-2 rounded-full transition-all cursor-pointer ${isActive ? 'bg-[#3B4D3B] w-4' : 'bg-[#DCE3DD] hover:bg-[#8A9B86] w-2'}" 
                title="${idx + 1}. ${s.name}">
        </button>
      `;
    }).join('');

    // Generate content based on active sector
    let sectorContentHtml = '';

    if (sec.id === 'demografi') {
      const totL = desaList.reduce((a, b) => a + (Number(b.demografi.penduduk_l) || 0), 0);
      const totP = desaList.reduce((a, b) => a + (Number(b.demografi.penduduk_p) || 0), 0);
      const totPop = totL + totP;
      const avgKepadatan = desaList.length ? (desaList.reduce((a, b) => a + parseKepadatan(b.demografi.kepadatan_km2), 0) / desaList.length).toFixed(1) : 0;
      const sexRatio = totP ? ((totL / totP) * 100).toFixed(1) : 100;

      sectorContentHtml = `
        <div class="grid grid-cols-3 divide-x divide-[#DCE3DD] border-t border-b border-[#DCE3DD] py-5 my-6">
          <div class="pr-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">01 / TOTAL PENDUDUK</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">${totPop.toLocaleString('id-ID')}</div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">L: ${totL.toLocaleString('id-ID')} • P: ${totP.toLocaleString('id-ID')}</span>
          </div>
          <div class="px-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">02 / KEPADATAN</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">${avgKepadatan}</div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Jiwa / km² (Rata-rata)</span>
          </div>
          <div class="pl-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">03 / RASIO GENDER</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#566B53] tabular-nums font-sans mt-1">${sexRatio}</div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Laki-laki per 100 Perempuan</span>
          </div>
        </div>
        <p class="text-xs text-[#5E6B61] font-sans leading-relaxed">
          Mencakup distribusi kependudukan di ${desaList.length} desa/kelurahan di Kecamatan ${k.nama}.
        </p>
      `;
    } else if (sec.id === 'pendidikan') {
      const totTK = desaList.reduce((a, b) => a + (b.pendidikan.tk || 0), 0);
      const totSD = desaList.reduce((a, b) => a + (b.pendidikan.sd_mi_tot || 0), 0);
      const totSMP = desaList.reduce((a, b) => a + (b.pendidikan.smp_mts_tot || 0), 0);
      const totSMA = desaList.reduce((a, b) => a + (b.pendidikan.sma_ma_tot || 0), 0);
      const totSMK = desaList.reduce((a, b) => a + (b.pendidikan.smk_tot || 0), 0);
      const totPT = desaList.reduce((a, b) => a + (b.pendidikan.pt_tot || 0), 0);
      const totalSekolah = totTK + totSD + totSMP + totSMA + totSMK + totPT;

      sectorContentHtml = `
        <div class="border-t border-b border-[#DCE3DD] py-5 my-6 space-y-4">
          <div class="flex items-baseline justify-between">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86]">TOTAL FASILITAS PENDIDIKAN</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#3B4D3B] tabular-nums font-sans">${totalSekolah} <span class="text-xs font-normal text-[#5E6B61]">Unit</span></div>
          </div>
          <div class="grid grid-cols-6 divide-x divide-[#DCE3DD] text-center pt-2">
            <div class="pr-2">
              <span class="text-[10px] font-mono text-[#8A9B86] block">TK/PAUD</span>
              <span class="text-xl font-bold text-[#1D241E] tabular-nums font-sans mt-1 block">${totTK}</span>
            </div>
            <div class="px-2">
              <span class="text-[10px] font-mono text-[#8A9B86] block">SD/MI</span>
              <span class="text-xl font-bold text-[#1D241E] tabular-nums font-sans mt-1 block">${totSD}</span>
            </div>
            <div class="px-2">
              <span class="text-[10px] font-mono text-[#8A9B86] block">SMP/MTs</span>
              <span class="text-xl font-bold text-[#1D241E] tabular-nums font-sans mt-1 block">${totSMP}</span>
            </div>
            <div class="px-2">
              <span class="text-[10px] font-mono text-[#8A9B86] block">SMA/MA</span>
              <span class="text-xl font-bold text-[#1D241E] tabular-nums font-sans mt-1 block">${totSMA}</span>
            </div>
            <div class="px-2">
              <span class="text-[10px] font-mono text-[#8A9B86] block">SMK</span>
              <span class="text-xl font-bold text-[#1D241E] tabular-nums font-sans mt-1 block">${totSMK}</span>
            </div>
            <div class="pl-2">
              <span class="text-[10px] font-mono text-[#8A9B86] block">PT</span>
              <span class="text-xl font-bold text-[#1D241E] tabular-nums font-sans mt-1 block">${totPT}</span>
            </div>
          </div>
        </div>
        <p class="text-xs text-[#5E6B61] font-sans leading-relaxed">
          Ketersediaan sarana belajar dari jenjang usia dini hingga perguruan tinggi.
        </p>
      `;
    } else if (sec.id === 'kesehatan') {
      const totRS = desaList.reduce((a, b) => a + (b.kesehatan.rs || 0), 0);
      const totPusk = desaList.reduce((a, b) => a + (b.kesehatan.puskesmas_tot || 0), 0);
      const totPustu = desaList.reduce((a, b) => a + (b.kesehatan.pustu || 0) + (b.kesehatan.poskesdes || 0), 0);
      const totApotek = desaList.reduce((a, b) => a + (b.kesehatan.apotek || 0), 0);
      const totPosyandu = desaList.reduce((a, b) => a + (b.kesehatan.posyandu_aktif || 0), 0);
      const totPosbindu = desaList.reduce((a, b) => a + (b.kesehatan.posbindu || 0), 0);

      sectorContentHtml = `
        <div class="grid grid-cols-3 divide-x divide-[#DCE3DD] border-t border-b border-[#DCE3DD] py-5 my-6">
          <div class="pr-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">01 / RS & PUSKESMAS</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">${totRS + totPusk} <span class="text-xs font-normal text-[#5E6B61]">Unit</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Faskes Rujukan Utama</span>
          </div>
          <div class="px-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">02 / PUSTU & POSKESDES</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">${totPustu} <span class="text-xs font-normal text-[#5E6B61]">Unit</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Layanan Kesehatan Desa</span>
          </div>
          <div class="pl-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">03 / POSYANDU AKTIF</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#566B53] tabular-nums font-sans mt-1">${totPosyandu} <span class="text-xs font-normal text-[#5E6B61]">Unit</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Posbindu: ${totPosbindu} • Apotek: ${totApotek}</span>
          </div>
        </div>
        <p class="text-xs text-[#5E6B61] font-sans leading-relaxed">
          Kapasitas fasilitas dan tenaga medis dalam penanganan kesehatan masyarakat desa.
        </p>
      `;
    } else if (sec.id === 'ekonomi') {
      const totIMK = desaList.reduce((a, b) => a + (b.ekonomi.imk || 0), 0);
      const totPasar = desaList.reduce((a, b) => a + (b.ekonomi.pasar_perm + b.ekonomi.pasar_semi + b.ekonomi.pasar_tanpa), 0);
      const totMini = desaList.reduce((a, b) => a + (b.ekonomi.minimarket || 0), 0);
      const totBank = desaList.reduce((a, b) => a + (b.ekonomi.bank_gov + b.ekonomi.bank_swasta + b.ekonomi.bpr), 0);
      const totKop = desaList.reduce((a, b) => a + (b.ekonomi.kud + b.ekonomi.ksp + b.ekonomi.koperasi_lain), 0);
      const totHotel = desaList.reduce((a, b) => a + (b.ekonomi.hotel + b.ekonomi.penginapan), 0);

      sectorContentHtml = `
        <div class="grid grid-cols-3 divide-x divide-[#DCE3DD] border-t border-b border-[#DCE3DD] py-5 my-6">
          <div class="pr-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">01 / SENTRA IMK</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">${totIMK.toLocaleString('id-ID')}</div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Unit Usaha Mikro/Kecil</span>
          </div>
          <div class="px-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">02 / PASAR TRADISIONAL</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">${totPasar} <span class="text-xs font-normal text-[#5E6B61]">Lokasi</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Minimarket / Toko: ${totMini}</span>
          </div>
          <div class="pl-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">03 / LEMBAGA KEUANGAN</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#566B53] tabular-nums font-sans mt-1">${totBank + totKop} <span class="text-xs font-normal text-[#5E6B61]">Unit</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Bank: ${totBank} • Koperasi: ${totKop}</span>
          </div>
        </div>
        <p class="text-xs text-[#5E6B61] font-sans leading-relaxed">
          Dukungan sarana perdagangan rakyat, lembaga keuangan perbankan, dan penginapan (${totHotel} unit).
        </p>
      `;
    } else if (sec.id === 'lingkungan') {
      const totPLN = desaList.reduce((a, b) => a + (b.lingkungan.pln_kk || 0), 0);
      const totNonPLN = desaList.reduce((a, b) => a + (b.lingkungan.non_pln_kk || 0), 0);
      const totTanpa = desaList.reduce((a, b) => a + (b.lingkungan.tanpa_listrik_kk || 0), 0);
      const totalKK = totPLN + totNonPLN + totTanpa;
      const rasioPLN = totalKK > 0 ? ((totPLN / totalKK) * 100).toFixed(1) : 100;
      const bebasCemarDesa = desaList.filter(d => d.lingkungan.bebas_pencemaran).length;

      sectorContentHtml = `
        <div class="grid grid-cols-3 divide-x divide-[#DCE3DD] border-t border-b border-[#DCE3DD] py-5 my-6">
          <div class="pr-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">01 / LISTRIK PLN</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">${totPLN.toLocaleString('id-ID')} <span class="text-xs font-normal text-[#5E6B61]">KK</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Rasio Cakupan: ${rasioPLN}%</span>
          </div>
          <div class="px-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">02 / NON-PLN & MANDIRI</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">${totNonPLN} <span class="text-xs font-normal text-[#5E6B61]">KK</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Tanpa Listrik: ${totTanpa} KK</span>
          </div>
          <div class="pl-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">03 / LINGKUNGAN HIDUP</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#566B53] tabular-nums font-sans mt-1">${bebasCemarDesa} <span class="text-xs font-normal text-[#5E6B61]">Desa</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Bebas Pencemaran Air & Udara</span>
          </div>
        </div>
        <p class="text-xs text-[#5E6B61] font-sans leading-relaxed">
          Kondisi sanitasi, kebersihan lingkungan perairan dan udara, serta kemandirian energi desa.
        </p>
      `;
    } else if (sec.id === 'keuangan') {
      const totBumdes = desaList.reduce((a, b) => a + (b.pemerintahan.bumdes || 0), 0);
      const totTanahKas = desaList.reduce((a, b) => a + (b.pemerintahan.tanah_kas || 0), 0);
      const totWisata = desaList.reduce((a, b) => a + (b.pemerintahan.wisata_desa || 0), 0);
      const countSiskeudes = desaList.filter(d => d.pemerintahan.siskeudes && d.pemerintahan.siskeudes !== 'Tidak Ada').length;
      const countSID = desaList.filter(d => d.pemerintahan.sid && d.pemerintahan.sid !== 'Tidak Ada').length;

      sectorContentHtml = `
        <div class="grid grid-cols-3 divide-x divide-[#DCE3DD] border-t border-b border-[#DCE3DD] py-5 my-6">
          <div class="pr-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">01 / KEBERADAAN BUMDES</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">${totBumdes} <span class="text-xs font-normal text-[#5E6B61]">Unit</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Penggerak Ekonomi Desa</span>
          </div>
          <div class="px-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">02 / DIGITALISASI (SID)</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">${countSID} <span class="text-xs font-normal text-[#5E6B61]">Desa</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">SISKEUDES: ${countSiskeudes} Desa</span>
          </div>
          <div class="pl-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">03 / ASET & WISATA</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#566B53] tabular-nums font-sans mt-1">${totWisata} <span class="text-xs font-normal text-[#5E6B61]">Lokasi</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Tanah Kas Desa: ${totTanahKas} Unit</span>
          </div>
        </div>
        <p class="text-xs text-[#5E6B61] font-sans leading-relaxed">
          Akuntabilitas tata kelola keuangan, digitalisasi sistem informasi desa, dan aset pendapatan desa.
        </p>
      `;
    } else if (sec.id === 'pemerintahan') {
      const totAparat = desaList.reduce((a, b) => a + (b.pemerintahan.total_aparat || 0), 0);
      const kadesS1 = desaList.filter(d => d.pemerintahan.kades_pend && d.pemerintahan.kades_pend.includes('S1')).length;
      const kadesL = desaList.filter(d => d.pemerintahan.kades_gender === 'Laki-laki').length;
      const kadesP = desaList.filter(d => d.pemerintahan.kades_gender === 'Perempuan').length;

      sectorContentHtml = `
        <div class="grid grid-cols-3 divide-x divide-[#DCE3DD] border-t border-b border-[#DCE3DD] py-5 my-6">
          <div class="pr-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">01 / APARATUR DESA</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">${totAparat} <span class="text-xs font-normal text-[#5E6B61]">Orang</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Kades, Sekdes & Perangkat</span>
          </div>
          <div class="px-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">02 / PENDIDIKAN KADES</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">${kadesS1} <span class="text-xs font-normal text-[#5E6B61]">Kades</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Jenjang D-IV / S1 ke atas</span>
          </div>
          <div class="pl-3">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">03 / GENDER KADES</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#566B53] tabular-nums font-sans mt-1">${kadesL} L • ${kadesP} P</div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Komposisi Kepemimpinan</span>
          </div>
        </div>
        <p class="text-xs text-[#5E6B61] font-sans leading-relaxed">
          Kapasitas birokrasi dan profil kepemimpinan kepala desa di seluruh kecamatan.
        </p>
      `;
    }

    rightPanel.innerHTML = `
      <div id="swipeableSectorCard" class="h-full flex flex-col justify-between p-6 sm:p-8 lg:p-10 select-none">
        <div>
          <!-- Top Bar: Title & Slide Nav -->
          <div class="flex items-center justify-between gap-2">
            <div class="flex items-center gap-2">
              <h3 class="font-cormorant text-2xl sm:text-3xl font-bold text-[#1D241E]">Sektor Lainnya</h3>
              <span class="font-mono text-xs text-[#8A9B86]">(${activeSectorIndex + 1}/7)</span>
            </div>

            <!-- Dots & Prev / Next Arrows -->
            <div class="flex items-center gap-3">
              <div class="flex items-center gap-1.5">
                ${dotsHtml}
              </div>
              <div class="flex items-center gap-1 border-l border-[#DCE3DD] pl-3">
                <button onclick="window.prevSectorSlide()" class="w-7 h-7 rounded-full border border-[#DCE3DD] hover:border-[#3B4D3B] hover:text-[#3B4D3B] text-[#5E6B61] flex items-center justify-center text-xs transition-colors cursor-pointer" title="Sektor Sebelumnya">
                  <i class="bi bi-chevron-left"></i>
                </button>
                <button onclick="window.nextSectorSlide()" class="w-7 h-7 rounded-full border border-[#DCE3DD] hover:border-[#3B4D3B] hover:text-[#3B4D3B] text-[#5E6B61] flex items-center justify-center text-xs transition-colors cursor-pointer" title="Sektor Selanjutnya">
                  <i class="bi bi-chevron-right"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="border-t border-[#DCE3DD] my-6"></div>

          <!-- Active Sector Header -->
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-[#E6ECE6] text-[#3B4D3B] flex items-center justify-center text-base shrink-0">
              <i class="bi ${sec.icon}"></i>
            </div>
            <div>
              <div class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86]">SEKTOR PODES AKTIF</div>
              <h4 class="font-cinzel text-xl sm:text-2xl font-bold text-[#1D241E] uppercase tracking-wide mt-0.5">
                ${sec.name}
              </h4>
            </div>
          </div>

          <!-- Dynamic Content for Active Sector -->
          ${sectorContentHtml}
        </div>

        <!-- Bottom Sector Quick Chips (Senada & Minimalist) -->
        <div class="mt-6 pt-4 border-t border-[#DCE3DD]">
          <div class="flex items-center justify-between mb-2.5">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86]">NAVIGASI 7 SEKTOR PODES</span>
            <span class="text-[11px] text-[#5E6B61] font-sans">Pilih sektor untuk melihat data</span>
          </div>
          <div class="flex flex-wrap gap-1.5 sm:gap-2">
            ${SECTORS.map((s, idx) => `
              <button onclick="window.setSectorSlide(${idx})" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold transition-all cursor-pointer ${idx === activeSectorIndex ? 'bg-[#3B4D3B] text-white shadow-2xs' : 'bg-[#E6ECE6]/60 hover:bg-[#E6ECE6] text-[#5E6B61] hover:text-[#1D241E]'}">
                <i class="bi ${s.icon} ${idx === activeSectorIndex ? 'text-white' : 'text-[#3B4D3B]'}"></i>
                <span>${s.name}</span>
              </button>
            `).join('')}
          </div>
        </div>
      </div>
    `;

    // Attach touch swipe gesture to right panel
    const swipeCard = document.getElementById('swipeableSectorCard');
    if (swipeCard) {
      let touchStartX = 0;
      let touchEndX = 0;

      swipeCard.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
      }, { passive: true });

      swipeCard.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipeGesture();
      }, { passive: true });

      function handleSwipeGesture() {
        if (touchEndX < touchStartX - 50) {
          nextSectorSlide();
        }
        if (touchEndX > touchStartX + 50) {
          prevSectorSlide();
        }
      }
    }
  }

  // -------------------------------------------------------------
  // DETAIL VILLAGE TABLE (FILTERED FOR ACTIVE KECAMATAN)
  // -------------------------------------------------------------
  function setDetailTableTab(tab) {
    activeTableTab = tab;
    const tabBtns = document.querySelectorAll('.btn-detail-table-tab');
    tabBtns.forEach(btn => {
      const t = btn.getAttribute('data-tab');
      if (t === tab) {
        btn.classList.add('bg-[#3B4D3B]', 'text-white', 'shadow-2xs');
        btn.classList.remove('bg-[#E6ECE6]/60', 'text-[#5E6B61]');
      } else {
        btn.classList.remove('bg-[#3B4D3B]', 'text-white', 'shadow-2xs');
        btn.classList.add('bg-[#E6ECE6]/60', 'text-[#5E6B61]');
      }
    });
    renderDetailVillageTable();
  }

  function renderDetailVillageTable() {
    const tableContainer = document.getElementById('detailVillageTableContainer');
    if (!tableContainer || !masterData) return;

    const k = masterData.kecamatan[activeKecamatanKey];
    if (!k) return;

    let villages = k.desa_list || [];
    if (detailSearchQuery) {
      villages = villages.filter(d => {
        const nameMatch = d.nama.toLowerCase().includes(detailSearchQuery);
        const subMatch = (d.ekonomi.subsektor || '').toLowerCase().includes(detailSearchQuery);
        const komMatch = (d.ekonomi.komoditas || '').toLowerCase().includes(detailSearchQuery);
        return nameMatch || subMatch || komMatch;
      });
    }

    let theadHtml = '';
    let rowsHtml = '';

    if (activeTableTab === 'demografi') {
      theadHtml = `
        <th class="py-3 px-4 text-left font-bold text-slate-700">Nama Desa / Kelurahan</th>
        <th class="py-3 px-3 text-center font-bold text-slate-700">Status</th>
        <th class="py-3 px-3 text-right font-bold text-slate-700">Total Penduduk</th>
        <th class="py-3 px-3 text-right font-bold text-slate-700">Laki-Laki</th>
        <th class="py-3 px-3 text-right font-bold text-slate-700">Perempuan</th>
        <th class="py-3 px-3 text-right font-bold text-slate-700">Kepadatan (km²)</th>
        <th class="py-3 px-3 text-right font-bold text-slate-700">Sex Ratio</th>
      `;
      rowsHtml = villages.map(d => {
        const tot = getDesaPop(d);
        const kep = parseKepadatan(d.demografi.kepadatan_km2);
        return `
          <tr class="border-b border-slate-100 hover:bg-[#E6ECE6]/40 transition-colors">
            <td class="py-3 px-4 font-bold text-slate-900">${d.nama}</td>
            <td class="py-3 px-3 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold ${d.status === 'Kelurahan' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-700'}">${d.status}</span></td>
            <td class="py-3 px-3 text-right font-black text-slate-900 tabular-nums">${tot.toLocaleString('id-ID')}</td>
            <td class="py-3 px-3 text-right font-medium text-slate-600 tabular-nums">${(d.demografi.penduduk_l || 0).toLocaleString('id-ID')}</td>
            <td class="py-3 px-3 text-right font-medium text-slate-600 tabular-nums">${(d.demografi.penduduk_p || 0).toLocaleString('id-ID')}</td>
            <td class="py-3 px-3 text-right font-semibold text-[#3B4D3B] tabular-nums">${kep.toLocaleString('id-ID')}</td>
            <td class="py-3 px-3 text-right font-semibold text-slate-700 tabular-nums">${d.demografi.sex_ratio || '-'}</td>
          </tr>
        `;
      }).join('');
    } else if (activeTableTab === 'ekonomi') {
      theadHtml = `
        <th class="py-3 px-4 text-left font-bold text-slate-700">Nama Desa</th>
        <th class="py-3 px-3 text-left font-bold text-slate-700">Komoditas Utama</th>
        <th class="py-3 px-3 text-right font-bold text-slate-700">Unit IMK</th>
        <th class="py-3 px-3 text-left font-bold text-slate-700">Produk Unggulan</th>
        <th class="py-3 px-3 text-center font-bold text-slate-700">Minimarket</th>
        <th class="py-3 px-3 text-center font-bold text-slate-700">BUMDes</th>
      `;
      rowsHtml = villages.map(d => `
        <tr class="border-b border-slate-100 hover:bg-[#E6ECE6]/40 transition-colors">
          <td class="py-3 px-4 font-bold text-slate-900">${d.nama}</td>
          <td class="py-3 px-3 text-slate-700 font-medium">${d.ekonomi.komoditas || '-'}</td>
          <td class="py-3 px-3 text-right font-black text-amber-600 tabular-nums">${d.ekonomi.imk || 0}</td>
          <td class="py-3 px-3 text-slate-700 text-xs">${d.ekonomi.prod_unggulan_makanan !== '-' ? d.ekonomi.prod_unggulan_makanan : (d.ekonomi.prod_unggulan_non_makanan !== '-' ? d.ekonomi.prod_unggulan_non_makanan : '-')}</td>
          <td class="py-3 px-3 text-center font-medium">${d.ekonomi.minimarket || 0}</td>
          <td class="py-3 px-3 text-center font-bold text-indigo-700">${d.pemerintahan.bumdes || 0}</td>
        </tr>
      `).join('');
    } else {
      theadHtml = `
        <th class="py-3 px-4 text-left font-bold text-slate-700">Nama Desa</th>
        <th class="py-3 px-3 text-right font-bold text-slate-700">Sekolah</th>
        <th class="py-3 px-3 text-right font-bold text-slate-700">Faskes</th>
        <th class="py-3 px-3 text-right font-bold text-slate-700">KK Listrik PLN</th>
        <th class="py-3 px-3 text-center font-bold text-slate-700">Bebas Pencemaran</th>
        <th class="py-3 px-3 text-center font-bold text-slate-700">Aparat Desa</th>
      `;
      rowsHtml = villages.map(d => `
        <tr class="border-b border-slate-100 hover:bg-[#E6ECE6]/40 transition-colors">
          <td class="py-3 px-4 font-bold text-slate-900">${d.nama}</td>
          <td class="py-3 px-3 text-right font-medium text-slate-700">${d.pendidikan.total_sekolah || 0}</td>
          <td class="py-3 px-3 text-right font-medium text-slate-700">${d.kesehatan.total_faskes || 0}</td>
          <td class="py-3 px-3 text-right font-bold text-[#3B4D3B] tabular-nums">${(d.lingkungan.pln_kk || 0).toLocaleString('id-ID')}</td>
          <td class="py-3 px-3 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold ${d.lingkungan.bebas_pencemaran ? 'bg-[#E6ECE6] text-[#3B4D3B]' : 'bg-red-100 text-red-800'}">${d.lingkungan.bebas_pencemaran ? 'Bebas' : 'Tercemar'}</span></td>
          <td class="py-3 px-3 text-center font-medium">${d.pemerintahan.total_aparat || 0} Org</td>
        </tr>
      `).join('');
    }

    tableContainer.innerHTML = `
      <div class="overflow-x-auto">
        <table class="w-full text-xs text-left">
          <thead class="bg-slate-50 text-[11px] text-slate-600 uppercase border-b border-slate-200">
            <tr>${theadHtml}</tr>
          </thead>
          <tbody>
            ${rowsHtml || `<tr><td colspan="7" class="py-8 text-center text-slate-400 font-medium">Tidak ada data desa yang cocok dengan pencarian.</td></tr>`}
          </tbody>
        </table>
      </div>
    `;
  }

  // -------------------------------------------------------------
  // CSV EXPORT FUNCTIONS
  // -------------------------------------------------------------
  function exportKecamatanCSV() {
    if (!masterData || !masterData.kecamatan[activeKecamatanKey]) return;
    const k = masterData.kecamatan[activeKecamatanKey];
    const villages = k.desa_list || [];

    let csvContent = 'ID,Kecamatan,Desa/Kelurahan,Status,Penduduk_L,Penduduk_P,Penduduk_Total,Kepadatan_KM2,Sex_Ratio,Komoditas,Unit_IMK,Sekolah,Faskes,Listrik_PLN_KK,BUMDes,Total_Aparat\n';
    villages.forEach(d => {
      const tot = getDesaPop(d);
      const kep = parseKepadatan(d.demografi.kepadatan_km2);
      const row = [
        d.id,
        `"${d.kecamatan}"`,
        `"${d.nama}"`,
        `"${d.status}"`,
        d.demografi.penduduk_l || 0,
        d.demografi.penduduk_p || 0,
        tot,
        kep,
        d.demografi.sex_ratio || 0,
        `"${d.ekonomi.komoditas || '-'}"`,
        d.ekonomi.imk || 0,
        d.pendidikan.total_sekolah || 0,
        d.kesehatan.total_faskes || 0,
        d.lingkungan.pln_kk || 0,
        d.pemerintahan.bumdes || 0,
        d.pemerintahan.total_aparat || 0
      ].join(',');
      csvContent += row + '\n';
    });

    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `PODES_2025_Kecamatan_${k.nama}.csv`;
    a.click();
    URL.revokeObjectURL(url);
  }

  function exportActiveTableCSV() {
    if (!masterData || !masterData.desa) return;
    const villages = masterData.desa;

    let csvContent = 'ID,Kecamatan,Desa/Kelurahan,Status,Penduduk_L,Penduduk_P,Penduduk_Total,Kepadatan_KM2,Sex_Ratio,Komoditas,Unit_IMK,Sekolah,Faskes,Listrik_PLN_KK,BUMDes,Total_Aparat\n';
    villages.forEach(d => {
      const tot = getDesaPop(d);
      const kep = parseKepadatan(d.demografi.kepadatan_km2);
      const row = [
        d.id,
        `"${d.kecamatan}"`,
        `"${d.nama}"`,
        `"${d.status}"`,
        d.demografi.penduduk_l || 0,
        d.demografi.penduduk_p || 0,
        tot,
        kep,
        d.demografi.sex_ratio || 0,
        `"${d.ekonomi.komoditas || '-'}"`,
        d.ekonomi.imk || 0,
        d.pendidikan.total_sekolah || 0,
        d.kesehatan.total_faskes || 0,
        d.lingkungan.pln_kk || 0,
        d.pemerintahan.bumdes || 0,
        d.pemerintahan.total_aparat || 0
      ].join(',');
      csvContent += row + '\n';
    });

    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `PODES_2025_Kolaka_Utara_133_Desa.csv`;
    a.click();
    URL.revokeObjectURL(url);
  }

  // Auto-init on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initExplorer);
  } else {
    initExplorer();
  }

  window.initExplorer = initExplorer;
})();
