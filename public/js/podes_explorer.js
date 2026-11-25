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
    { 
      id: 'demografi', 
      name: 'Kependudukan', 
      icon: 'bi-people-fill',
      badgeBg: 'bg-[#E6ECE6]',
      badgeText: 'text-[#3B4D3B]',
      badgeBorder: 'border-[#DCE3DD]',
      accentBg: 'bg-[#F2F6F2]'
    },
    { 
      id: 'pendidikan', 
      name: 'Pendidikan', 
      icon: 'bi-mortarboard-fill',
      badgeBg: 'bg-[#E3EFE8]',
      badgeText: 'text-[#285A43]',
      badgeBorder: 'border-[#CCE3D5]',
      accentBg: 'bg-[#F0F6F2]'
    },
    { 
      id: 'kesehatan', 
      name: 'Kesehatan', 
      icon: 'bi-hospital-fill',
      badgeBg: 'bg-[#E0EFEA]',
      badgeText: 'text-[#1E5646]',
      badgeBorder: 'border-[#C5E3D9]',
      accentBg: 'bg-[#EFF7F4]'
    },
    { 
      id: 'ekonomi', 
      name: 'Ekonomi & Industri', 
      icon: 'bi-buildings-fill',
      badgeBg: 'bg-[#F7EFE1]',
      badgeText: 'text-[#8C6226]',
      badgeBorder: 'border-[#EBD6B5]',
      accentBg: 'bg-[#FDF9F2]'
    },
    { 
      id: 'lingkungan', 
      name: 'Kelistrikan & Lingkungan', 
      icon: 'bi-lightning-charge-fill',
      badgeBg: 'bg-[#E2F2E5]',
      badgeText: 'text-[#23683A]',
      badgeBorder: 'border-[#C4E5CA]',
      accentBg: 'bg-[#F0F8F2]'
    },
    { 
      id: 'keuangan', 
      name: 'Keuangan & BUMDes', 
      icon: 'bi-wallet2',
      badgeBg: 'bg-[#E2ECF0]',
      badgeText: 'text-[#245366]',
      badgeBorder: 'border-[#C3DCE5]',
      accentBg: 'bg-[#EFF5F8]'
    },
    { 
      id: 'pemerintahan', 
      name: 'Pemerintahan Desa', 
      icon: 'bi-shield-check',
      badgeBg: 'bg-[#EBEFE2]',
      badgeText: 'text-[#445E2A]',
      badgeBorder: 'border-[#D5E2C4]',
      accentBg: 'bg-[#F4F7EE]'
    }
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
    window.startSectorAutoSlide = startSectorAutoSlide;
    window.stopSectorAutoSlide = stopSectorAutoSlide;
    window.toggleSectorAutoPlay = toggleSectorAutoPlay;
    window.setDetailTableTab = setDetailTableTab;
    window.exportActiveTableCSV = exportActiveTableCSV;
    window.exportKecamatanCSV = exportKecamatanCSV;
    window.scrollKecCarousel = scrollKecCarousel;
    window.triggerSummaryCountUp = triggerSummaryCountUp;
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
    const scrollAmount = 285;
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
        photo: '/images/kecamatan/kebun_kakao_totallang.jpg'
      };

      // Tulisan menurun dari atas ke bawah (upright letters top-to-bottom)
      const words = String(k.nama || '').trim().split(/\s+/);
      const verticalTitleHtml = words.map(w => {
        const letters = w.split('').map(char => `<span class="inline-block leading-tight">${char}</span>`).join('');
        return `<div class="flex flex-col items-center font-cinzel text-lg sm:text-xl lg:text-[22px] font-bold text-white tracking-[0.18em] drop-shadow-md select-none group-hover:text-[#E6ECE6] transition-colors">${letters}</div>`;
      }).join('');

      html += `
        <div class="kec-carousel-card relative w-[220px] sm:w-[250px] lg:w-[265px] h-[340px] sm:h-[370px] lg:h-[390px] flex-shrink-0 rounded-3xl overflow-hidden cursor-pointer group shadow-sm hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 select-none flex flex-col justify-between border border-[#DCE3DD]" 
             data-kec-key="${kKey}" 
             onclick="if(!window.isDraggingCarousel) window.selectKecamatanExploration('${kKey}')"
             title="Klik untuk melihat data Kecamatan ${k.nama}">
          
          <!-- Full-Bleed Atmospheric Landscape Photo -->
          <img src="${meta.photo}" 
               alt="Kecamatan ${k.nama}" 
               class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105 filter brightness-95"
               onerror="this.src='/images/kecamatan/kebun_kakao_totallang.jpg'">

          <!-- Polos Clean Dark Gradient Overlay (Tanpa Kotak/Bingkai Terpisah) -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-black/35 pointer-events-none"></div>

          <!-- Top Section: Tulisan Menurun dari Atas ke Bawah & Nomor Index -->
          <div class="relative z-10 p-5 sm:p-6 flex items-start justify-between">
            <!-- Tulisan Menurun dari Atas ke Bawah -->
            <div class="flex items-start gap-2 sm:gap-2.5">
              ${verticalTitleHtml}
            </div>

            <!-- Top Right: Nomor Index -->
            <div class="font-mono text-xs sm:text-sm font-bold text-slate-300 tracking-widest drop-shadow-md">
              ${indexStr}
            </div>
          </div>

          <!-- Bottom Section: Penduduk Dipertahankan (Horizontal Polos di Bawah) -->
          <div class="relative z-10 p-5 sm:p-6 pt-0">
            <div class="border-t border-white/20 pt-3">
              <p class="font-sans text-[11px] sm:text-xs font-bold tracking-widest text-slate-200 uppercase drop-shadow tabular-nums">
                ${totPop.toLocaleString('id-ID')} PENDUDUK
              </p>
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
      <div id="explorerAggregateSummaryCard" class="bg-white rounded-3xl border border-[#DCE3DD] shadow-2xs overflow-hidden transition-all duration-700 ease-out opacity-0 translate-y-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 divide-y sm:divide-y-0 sm:divide-x divide-[#DCE3DD]">
          
          <!-- 01: Total Penduduk Riil (Mountain Pine) -->
          <div class="p-6 sm:p-7 flex flex-col justify-between hover:bg-[#E6ECE6]/20 transition-colors">
            <div>
              <div class="text-xs font-mono font-medium text-[#8A9B86] tracking-widest mb-2">01</div>
              <h4 class="font-batangas text-base sm:text-lg font-bold tracking-wider uppercase text-[#1D241E] leading-snug">
                Total Penduduk Riil
              </h4>
            </div>
            <div class="mt-4">
              <div class="stat-count-up text-3xl sm:text-4xl font-black text-[#3B4D3B] tracking-tight tabular-nums font-sans" data-target="${totJiwa}" data-decimals="0">
                0
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
              <h4 class="font-batangas text-base sm:text-lg font-bold tracking-wider uppercase text-[#1D241E] leading-snug">
                Rata-Rata Kepadatan
              </h4>
            </div>
            <div class="mt-4">
              <div class="stat-count-up text-3xl sm:text-4xl font-black text-[#1D241E] tracking-tight tabular-nums font-sans" data-target="${avgKepadatan}" data-decimals="1" data-suffix="Jiwa/km²">
                0.0 <span class="text-xs font-semibold text-[#5E6B61]">Jiwa/km²</span>
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
              <h4 class="font-batangas text-base sm:text-lg font-bold tracking-wider uppercase text-[#1D241E] leading-snug">
                Rasio Jenis Kelamin
              </h4>
            </div>
            <div class="mt-4">
              <div class="stat-count-up text-3xl sm:text-4xl font-black text-[#566B53] tracking-tight tabular-nums font-sans" data-target="${sexRatio}" data-decimals="1">
                0.0
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
              <h4 class="font-batangas text-base sm:text-lg font-bold tracking-wider uppercase text-[#1D241E] leading-snug">
                Sentra & IMK Produktif
              </h4>
            </div>
            <div class="mt-4">
              <div class="stat-count-up text-3xl sm:text-4xl font-black text-[#3B4D3B] tracking-tight tabular-nums font-sans" data-target="${totIMK}" data-decimals="0">
                0
              </div>
              <p class="text-xs text-[#5E6B61] font-medium mt-1.5 leading-relaxed font-sans">
                Listrik PLN: ${rasioListrik}%
              </p>
            </div>
          </div>

        </div>
      </div>
    `;

    setupSummaryObserver();
  }

  function triggerSummaryCountUp() {
    const summaryCard = document.getElementById('explorerAggregateSummaryCard');
    if (summaryCard) {
      summaryCard.classList.remove('opacity-0', 'translate-y-4');
      summaryCard.classList.add('opacity-100', 'translate-y-0');
    }

    const statElements = document.querySelectorAll('.stat-count-up');
    if (!statElements || statElements.length === 0) return;

    statElements.forEach(el => {
      const target = parseFloat(el.getAttribute('data-target')) || 0;
      const decimals = parseInt(el.getAttribute('data-decimals')) || 0;
      const suffix = el.getAttribute('data-suffix') || '';
      const duration = 1400; // ms
      const startTime = performance.now();

      function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        // smooth cubic easeOut
        const ease = 1 - Math.pow(1 - progress, 3);
        const currentVal = target * ease;

        let formatted = '';
        if (decimals > 0) {
          formatted = currentVal.toFixed(decimals);
        } else {
          formatted = Math.round(currentVal).toLocaleString('id-ID');
        }

        if (suffix) {
          el.innerHTML = `${formatted} <span class="text-xs font-semibold text-[#5E6B61]">${suffix}</span>`;
        } else {
          el.textContent = formatted;
        }

        if (progress < 1) {
          requestAnimationFrame(update);
        } else {
          const finalVal = decimals > 0 ? target.toFixed(decimals) : Math.round(target).toLocaleString('id-ID');
          if (suffix) {
            el.innerHTML = `${finalVal} <span class="text-xs font-semibold text-[#5E6B61]">${suffix}</span>`;
          } else {
            el.textContent = finalVal;
          }
        }
      }
      requestAnimationFrame(update);
    });
  }

  function setupSummaryObserver() {
    const summaryCard = document.getElementById('explorerAggregateSummaryCard');
    if (!summaryCard) return;

    if (!('IntersectionObserver' in window)) {
      triggerSummaryCountUp();
      return;
    }

    const rect = summaryCard.getBoundingClientRect();
    if (rect.top < window.innerHeight && rect.bottom > 0) {
      setTimeout(triggerSummaryCountUp, 50);
      return;
    }

    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          triggerSummaryCountUp();
          obs.disconnect();
        }
      });
    }, {
      threshold: 0.15,
      rootMargin: '0px 0px -30px 0px'
    });

    observer.observe(summaryCard);
  }

  // -------------------------------------------------------------
  // STATE 2: DETAIL KECAMATAN (SPLIT-PANEL DUA KOLOM + SWIPE)
  // -------------------------------------------------------------
  let sectorAutoSlideInterval = null;
  let isSectorAutoPaused = false;
  let isSectorHovered = false;
  const SECTOR_AUTOSLIDE_DELAY = 4000; // 4 detik

  function selectKecamatanExploration(kKey) {
    if (!masterData || !masterData.kecamatan[kKey]) return;
    activeKecamatanKey = kKey;
    activeSectorIndex = 0;
    detailSearchQuery = '';
    isSectorAutoPaused = false;
    isSectorHovered = false;

    const dirEl = document.getElementById('podesStateDirectory');
    const detailEl = document.getElementById('podesStateDetail');

    if (dirEl && detailEl) {
      dirEl.style.display = 'none';
      detailEl.style.display = 'block';
      const offsetTop = detailEl.getBoundingClientRect().top + window.pageYOffset - 80;
      window.scrollTo({ top: Math.max(0, offsetTop), behavior: 'smooth' });
    }

    renderState2SplitPanel();
    renderDetailVillageTable();
    startSectorAutoSlide();
  }

  function backToKecamatanDirectory() {
    activeState = 'directory';
    stopSectorAutoSlide(false);
    const dirEl = document.getElementById('podesStateDirectory');
    const detailEl = document.getElementById('podesStateDetail');

    if (dirEl && detailEl) {
      detailEl.style.display = 'none';
      dirEl.style.display = 'block';
      const offsetTop = dirEl.getBoundingClientRect().top + window.pageYOffset - 80;
      window.scrollTo({ top: Math.max(0, offsetTop), behavior: 'smooth' });
      setTimeout(triggerSummaryCountUp, 150);
    }
  }

  // -------------------------------------------------------------
  // AUTO-SLIDE, TIMER BAR & PAUSE/PLAY CONTROLLER (4 DETIK)
  // -------------------------------------------------------------
  let timerBarRafId = null;

  function animateSectorTimerBar(running, preserveWidth = false) {
    if (timerBarRafId && typeof window.cancelAnimationFrame === 'function') {
      window.cancelAnimationFrame(timerBarRafId);
      timerBarRafId = null;
    }

    const bar = document.getElementById('sectorTimerBar');
    if (!bar) return;

    if (!running) {
      if (preserveWidth) {
        const currentWidth = window.getComputedStyle(bar).width;
        bar.style.transition = 'none';
        bar.style.width = currentWidth;
      } else {
        bar.style.transition = 'none';
        bar.style.width = '0%';
      }
      return;
    }

    // Reset seamlessly to 0%, then transition to 100% on next paint frame
    bar.style.transition = 'none';
    bar.style.width = '0%';
    void bar.offsetWidth;

    const triggerFill = () => {
      if (isSectorAutoPaused || isSectorHovered) return;
      const liveBar = document.getElementById('sectorTimerBar');
      if (!liveBar) return;
      liveBar.style.transition = `width ${SECTOR_AUTOSLIDE_DELAY}ms linear`;
      liveBar.style.width = '100%';
    };

    if (typeof window.requestAnimationFrame === 'function') {
      timerBarRafId = window.requestAnimationFrame(() => {
        timerBarRafId = window.requestAnimationFrame(triggerFill);
      });
    } else {
      triggerFill();
    }
  }

  function updateSectorAutoStatusUI() {
    const playBtn = document.getElementById('sectorAutoPlayBtn');
    const statusLabel = document.getElementById('sectorAutoStatusLabel');

    if (playBtn) {
      const icon = playBtn.querySelector('i');
      if (isSectorAutoPaused) {
        playBtn.title = 'Lanjutkan Auto-Slide';
        playBtn.setAttribute('aria-label', 'Lanjutkan Auto-Slide');
        playBtn.className = 'w-7 h-7 rounded-full bg-[#E6ECE6] border border-[#3B4D3B] text-[#3B4D3B] flex items-center justify-center text-xs transition-colors cursor-pointer shadow-2xs';
        if (icon) icon.className = 'bi bi-play-fill ml-0.5';
      } else {
        playBtn.title = 'Jeda Auto-Slide';
        playBtn.setAttribute('aria-label', 'Jeda Auto-Slide');
        playBtn.className = 'w-7 h-7 rounded-full bg-white border border-[#DCE3DD] hover:border-[#3B4D3B] hover:text-[#3B4D3B] text-[#5E6B61] flex items-center justify-center text-xs transition-colors cursor-pointer shadow-2xs';
        if (icon) icon.className = 'bi bi-pause-fill';
      }
    }

    if (statusLabel) {
      if (isSectorAutoPaused) {
        statusLabel.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span><span>Dijeda</span>';
        statusLabel.className = 'hidden sm:inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-50 border border-amber-200 text-amber-800 text-[10px] font-mono font-semibold';
      } else if (isSectorHovered) {
        statusLabel.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-[#8A9B86]"></span><span>Ditahan</span>';
        statusLabel.className = 'hidden sm:inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#F8FAF8] border border-[#DCE3DD] text-[#5E6B61] text-[10px] font-mono font-semibold';
      } else {
        statusLabel.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-[#3B4D3B] animate-pulse"></span><span>Auto • 4d</span>';
        statusLabel.className = 'hidden sm:inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#E6ECE6]/80 border border-[#DCE3DD] text-[#3B4D3B] text-[10px] font-mono font-semibold';
      }
    }
  }

  function startSectorAutoSlide() {
    clearInterval(sectorAutoSlideInterval);
    sectorAutoSlideInterval = null;

    const detailEl = document.getElementById('podesStateDetail');
    if (!detailEl || detailEl.style.display === 'none' || isSectorAutoPaused || isSectorHovered) {
      animateSectorTimerBar(false, isSectorAutoPaused || isSectorHovered);
      updateSectorAutoStatusUI();
      return;
    }

    animateSectorTimerBar(true);
    updateSectorAutoStatusUI();

    sectorAutoSlideInterval = setInterval(() => {
      const curDetail = document.getElementById('podesStateDetail');
      if (!curDetail || curDetail.style.display === 'none' || isSectorAutoPaused || isSectorHovered) {
        stopSectorAutoSlide(isSectorAutoPaused || isSectorHovered);
        return;
      }
      nextSectorSlide(false);
    }, SECTOR_AUTOSLIDE_DELAY);
  }

  function stopSectorAutoSlide(preserveBar = false) {
    if (sectorAutoSlideInterval) {
      clearInterval(sectorAutoSlideInterval);
      sectorAutoSlideInterval = null;
    }
    animateSectorTimerBar(false, preserveBar);
    updateSectorAutoStatusUI();
  }

  function restartSectorAutoSlide() {
    clearInterval(sectorAutoSlideInterval);
    sectorAutoSlideInterval = null;
    startSectorAutoSlide();
  }

  function toggleSectorAutoPlay() {
    isSectorAutoPaused = !isSectorAutoPaused;
    if (isSectorAutoPaused) {
      stopSectorAutoSlide(true);
    } else {
      startSectorAutoSlide();
    }
  }

  document.addEventListener('visibilitychange', () => {
    if (document.hidden) {
      stopSectorAutoSlide(true);
    } else {
      const detailEl = document.getElementById('podesStateDetail');
      if (detailEl && detailEl.style.display !== 'none' && !isSectorAutoPaused) {
        startSectorAutoSlide();
      }
    }
  });

  function setSectorSlide(index, userInitiated = false) {
    if (index < 0 || index >= SECTORS.length) return;
    activeSectorIndex = index;

    const track = document.getElementById('sectorSliderTrack');
    if (track) {
      // Hardware-accelerated sliding transition
      track.style.transform = `translateX(-${activeSectorIndex * 100}%)`;

      // Update counter text (n/7)
      const counterEl = document.getElementById('sectorCounterText');
      if (counterEl) {
        counterEl.textContent = `(${activeSectorIndex + 1}/7)`;
      }

      // Update pagination dots
      const dots = document.querySelectorAll('.sector-dot-btn');
      dots.forEach((dot, idx) => {
        const isActive = idx === activeSectorIndex;
        if (isActive) {
          dot.className = 'sector-dot-btn h-2 rounded-full transition-all duration-300 cursor-pointer bg-[#3B4D3B] w-4';
        } else {
          dot.className = 'sector-dot-btn h-2 rounded-full transition-all duration-300 cursor-pointer bg-[#DCE3DD] hover:bg-[#8A9B86] w-2';
        }
      });

      // Update bottom quick chips
      const chips = document.querySelectorAll('.sector-pill-btn');
      chips.forEach((chip, idx) => {
        const s = SECTORS[idx];
        const isActive = idx === activeSectorIndex;
        const icon = chip.querySelector('i');
        if (isActive) {
          chip.className = 'sector-pill-btn inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold transition-all duration-300 cursor-pointer bg-[#3B4D3B] text-white shadow-xs';
          if (icon) icon.className = `bi ${s.icon} text-white`;
        } else {
          chip.className = 'sector-pill-btn inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold transition-all duration-300 cursor-pointer bg-white hover:bg-[#F2F6F2] text-[#5E6B61] hover:text-[#1D241E] border border-[#DCE3DD] hover:border-[#8A9B86] shadow-2xs';
          if (icon) icon.className = `bi ${s.icon} ${s.badgeText}`;
        }
      });

      if (userInitiated) {
        if (isSectorAutoPaused || isSectorHovered) {
          animateSectorTimerBar(false, false);
        } else {
          restartSectorAutoSlide();
        }
      } else if (!isSectorAutoPaused && !isSectorHovered) {
        animateSectorTimerBar(true);
      }
    } else {
      renderRightSectorCard();
    }
  }

  function prevSectorSlide(userInitiated = false) {
    const nextIdx = (activeSectorIndex - 1 + SECTORS.length) % SECTORS.length;
    setSectorSlide(nextIdx, userInitiated);
  }

  function nextSectorSlide(userInitiated = false) {
    const nextIdx = (activeSectorIndex + 1) % SECTORS.length;
    setSectorSlide(nextIdx, userInitiated);
  }

  function renderState2SplitPanel() {
    const k = masterData.kecamatan[activeKecamatanKey];
    if (!k) return;

    const desaList = k.desa_list || [];
    const meta = KEC_META[activeKecamatanKey] || {
      tag: 'Wilayah Kolaka Utara',
      icon: '🌿',
      photo: '/images/kecamatan/kebun_kakao_totallang.jpg'
    };

    const dominantComm = getDominantCommodity(desaList);
    const commIcon = getCommodityIconClass(dominantComm);
    const prodInfo = getFeaturedProductsInfo(desaList);

    const kelCount = desaList.filter(d => d.status === 'Kelurahan').length;
    const desaCount = desaList.filter(d => d.status !== 'Kelurahan').length;
    const adminSummary = kelCount > 0 ? `${kelCount} Kel • ${desaCount} Desa` : `${desaCount} Desa`;

    const totL = desaList.reduce((a, b) => a + (Number(b.demografi.penduduk_l) || 0), 0);
    const totP = desaList.reduce((a, b) => a + (Number(b.demografi.penduduk_p) || 0), 0);
    const totPop = totL + totP;

    const totIMK = desaList.reduce((a, b) => a + (Number(b.ekonomi.imk) || 0), 0);
    const totBumdes = desaList.reduce((a, b) => a + (Number(b.pemerintahan.bumdes) || 0), 0);
    const bumdesPct = desaList.length ? Math.min(100, Math.round((totBumdes / desaList.length) * 100)) : 0;

    const totSekolah = desaList.reduce((a, b) => a + (Number(b.pendidikan.tk) || 0) + (Number(b.pendidikan.sd_mi_tot) || 0) + (Number(b.pendidikan.smp_mts_tot) || 0) + (Number(b.pendidikan.sma_ma_tot) || 0) + (Number(b.pendidikan.smk_tot) || 0) + (Number(b.pendidikan.pt_tot) || 0), 0);
    const totFaskes = desaList.reduce((a, b) => a + (Number(b.kesehatan.total_faskes) || 0), 0);
    const totPosyandu = desaList.reduce((a, b) => a + (Number(b.kesehatan.posyandu_aktif) || 0), 0);

    const totPLN = desaList.reduce((a, b) => a + (Number(b.lingkungan.pln_kk) || 0), 0);
    const totNonPLN = desaList.reduce((a, b) => a + (Number(b.lingkungan.non_pln_kk) || 0), 0);
    const totTanpa = desaList.reduce((a, b) => a + (Number(b.lingkungan.tanpa_listrik_kk) || 0), 0);
    const totalKK = totPLN + totNonPLN + totTanpa;
    const plnRatio = totalKK > 0 ? ((totPLN / totalKK) * 100).toFixed(1) : '100.0';

    const subsectors = [...new Set(desaList.map(d => (d.ekonomi && d.ekonomi.subsektor ? d.ekonomi.subsektor.trim() : '')).filter(s => s && s !== '-'))];
    const subsectorLabel = subsectors.length ? subsectors.slice(0, 2).join(' & ') : 'Perkebunan & Jasa';

    // Smart 02 Metric: Show Produk Khas if > 0, otherwise show Sarana Publik (Sekolah & Faskes)
    const metric02Html = prodInfo.count > 0 ? `
      <div class="px-3">
        <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">02 / PRODUK KHAS</span>
        <div class="text-2xl sm:text-3xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">
          ${prodInfo.count} <span class="text-xs font-normal text-[#5E6B61]">Desa</span>
        </div>
        <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Produk Unggulan</span>
      </div>
    ` : `
      <div class="px-3">
        <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">02 / SARANA PUBLIK</span>
        <div class="text-2xl sm:text-3xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">
          ${totSekolah + totFaskes} <span class="text-xs font-normal text-[#5E6B61]">Unit</span>
        </div>
        <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">${totSekolah} Sekolah • ${totFaskes} Faskes</span>
      </div>
    `;

    // 1. Render Left Panel (Visual Hero Card + Komoditas + Smart Metrics + Insight Cepat)
    const leftPanel = document.getElementById('kecDetailLeftPanel');
    if (leftPanel) {
      leftPanel.innerHTML = `
        <div class="h-full flex flex-col justify-between p-6 sm:p-8 lg:p-9">
          <div>
            <!-- Top Controls: Back Button & Regional Code -->
            <div class="flex items-center justify-between gap-2">
              <button onclick="window.backToKecamatanDirectory()" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#F8FAF8] hover:bg-[#E6ECE6] border border-[#DCE3DD] text-xs font-semibold text-[#5E6B61] hover:text-[#1D241E] transition-colors cursor-pointer group font-sans">
                <i class="bi bi-arrow-left text-[#3B4D3B] transition-transform group-hover:-translate-x-0.5"></i>
                <span>Semua Kecamatan</span>
              </button>
              <div class="flex items-center gap-2">
                <span class="font-mono text-[11px] tracking-wider text-[#8A9B86]">KODE: ${k.kode || '-'}</span>
                <span class="px-2 py-0.5 rounded-full bg-[#E6ECE6] border border-[#DCE3DD] text-[10px] font-mono font-semibold text-[#3B4D3B]">PODES 2025</span>
              </div>
            </div>

            <!-- Visual Identity Hero Banner -->
            <div class="relative overflow-hidden rounded-2xl border border-[#DCE3DD] h-40 sm:h-44 mt-4 group shadow-2xs">
              <img src="${meta.photo}"
                   alt="Lanskap Kecamatan ${k.nama}"
                   class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105 filter brightness-95"
                   onerror="this.src='/images/kecamatan/kebun_kakao_totallang.jpg'">
              <div class="absolute inset-0 bg-gradient-to-t from-[#1D241E]/95 via-[#1D241E]/55 to-[#1D241E]/25"></div>

              <!-- Top Floating Frosted Badges -->
              <div class="relative z-10 p-3.5 sm:p-4 flex items-center justify-between gap-2">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-white/15 backdrop-blur-md border border-white/25 text-[11px] font-medium text-white shadow-xs">
                  <span>${meta.icon}</span>
                  <span>${meta.tag}</span>
                </span>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#3B4D3B]/85 backdrop-blur-md border border-white/20 text-[10px] font-mono font-semibold text-white">
                  <span class="w-1.5 h-1.5 rounded-full bg-emerald-300"></span>
                  <span>${adminSummary}</span>
                </span>
              </div>

              <!-- Bottom Title & Population Summary -->
              <div class="absolute bottom-0 left-0 right-0 z-10 p-3.5 sm:p-4">
                <h2 class="font-cinzel text-2xl sm:text-3xl lg:text-4xl font-bold text-white tracking-[0.05em] uppercase leading-tight drop-shadow-sm">
                  ${k.nama}
                </h2>
                <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-slate-200 font-sans mt-1">
                  <span class="inline-flex items-center gap-1">
                    <i class="bi bi-people-fill text-emerald-300"></i>
                    <strong class="text-white tabular-nums">${totPop.toLocaleString('id-ID')}</strong> Jiwa Terdata
                  </span>
                  <span class="text-white/40">•</span>
                  <span class="inline-flex items-center gap-1">
                    <i class="bi bi-check-circle-fill text-emerald-300"></i>
                    <span>100% Sensus Selesai</span>
                  </span>
                </div>
              </div>
            </div>

            <!-- Dominant Commodity Highlight Card -->
            <div class="mt-4 p-3.5 sm:p-4 rounded-2xl bg-[#F8FAF8] border border-[#DCE3DD] flex items-center gap-3.5">
              <div class="w-11 h-11 rounded-xl bg-[#E6ECE6] text-[#3B4D3B] border border-[#DCE3DD] flex items-center justify-center text-xl shrink-0 shadow-2xs">
                <i class="bi ${commIcon}"></i>
              </div>
              <div class="min-w-0 flex-1">
                <div class="flex items-center justify-between gap-2">
                  <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] font-semibold">KOMODITAS UTAMA DOMINAN</span>
                  <span class="text-[10px] font-mono text-[#5E6B61] hidden sm:inline">Subsektor: ${subsectorLabel}</span>
                </div>
                <div class="font-cinzel text-xl sm:text-2xl font-bold text-[#1D241E] tracking-tight uppercase mt-0.5 truncate">
                  ${dominantComm}
                </div>
              </div>
            </div>

            <!-- 3 Column Metrics -->
            <div class="grid grid-cols-3 divide-x divide-[#DCE3DD] border-t border-b border-[#DCE3DD] py-4 my-4">
              <div class="pr-3">
                <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">01 / UNIT IMK</span>
                <div class="text-2xl sm:text-3xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">
                  ${totIMK.toLocaleString('id-ID')}
                </div>
                <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Usaha Mikro/Kecil</span>
              </div>

              ${metric02Html}

              <div class="pl-3">
                <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">03 / BUMDES</span>
                <div class="text-2xl sm:text-3xl font-bold text-[#566B53] tabular-nums font-sans mt-1">
                  ${totBumdes} <span class="text-xs font-normal text-[#5E6B61]">Unit</span>
                </div>
                <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Cakupan ${bumdesPct}% Desa</span>
              </div>
            </div>
          </div>

          <!-- Bottom: Featured Products (if any) + Human-Readable Sorotan Wilayah -->
          <div class="space-y-3">
            ${prodInfo.products.length ? `
              <div>
                <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block mb-1.5">PRODUK UNGGULAN TERDATA:</span>
                <div class="flex flex-wrap gap-1.5">
                  ${prodInfo.products.map(p => `
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#E6ECE6] text-[#3B4D3B] text-[11px] font-semibold font-sans">
                      <span class="w-1.5 h-1.5 rounded-full bg-[#3B4D3B]"></span>
                      <span>${p}</span>
                    </span>
                  `).join('')}
                </div>
              </div>
            ` : ''}

            <div class="p-3.5 rounded-2xl bg-[#F2F6F2] border border-[#DCE3DD] flex items-start gap-2.5">
              <div class="w-7 h-7 rounded-lg bg-white border border-[#DCE3DD] text-[#3B4D3B] flex items-center justify-center text-sm shrink-0 mt-0.5 shadow-2xs">
                <i class="bi bi-lightbulb-fill text-amber-600"></i>
              </div>
              <div class="text-xs text-[#5E6B61] font-sans leading-relaxed">
                <span class="font-bold text-[#1D241E] block mb-0.5">Sorotan ${k.nama}</span>
                Menghimpun <strong class="text-[#1D241E]">${totPop.toLocaleString('id-ID')} jiwa</strong> dengan elektrifikasi PLN <strong class="text-[#3B4D3B]">${plnRatio}%</strong>, ditunjang <strong class="text-[#1D241E]">${totSekolah} sekolah</strong> dan <strong class="text-[#1D241E]">${totPosyandu} posyandu aktif</strong>.
              </div>
            </div>
          </div>
        </div>
      `;
    }

    // 2. Render Right Panel (Swipeable 7 Sektor PODES)
    renderRightSectorCard();
  }

  function getSectorContentHtml(sec, desaList) {
    let sectorContentHtml = '';

    if (sec.id === 'demografi') {
      const totL = desaList.reduce((a, b) => a + (Number(b.demografi.penduduk_l) || 0), 0);
      const totP = desaList.reduce((a, b) => a + (Number(b.demografi.penduduk_p) || 0), 0);
      const totPop = totL + totP;
      const pctL = totPop > 0 ? ((totL / totPop) * 100).toFixed(1) : '50.0';
      const pctP = totPop > 0 ? (100 - parseFloat(pctL)).toFixed(1) : '50.0';
      const avgKepadatan = desaList.length ? (desaList.reduce((a, b) => a + parseKepadatan(b.demografi.kepadatan_km2), 0) / desaList.length).toFixed(1) : 0;
      const sexRatio = totP ? ((totL / totP) * 100).toFixed(1) : 100;

      sectorContentHtml = `
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 my-3.5">
          <div class="bg-white p-3.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">01 / TOTAL PENDUDUK</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">${totPop.toLocaleString('id-ID')}</div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">L: ${totL.toLocaleString('id-ID')} • P: ${totP.toLocaleString('id-ID')}</span>
          </div>
          <div class="bg-white p-3.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">02 / KEPADATAN</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">${avgKepadatan}</div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Jiwa / km² (Rata-rata)</span>
          </div>
          <div class="bg-white p-3.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">03 / RASIO GENDER</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#566B53] tabular-nums font-sans mt-1">${sexRatio}</div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Laki-laki per 100 Perempuan</span>
          </div>
        </div>
        <div class="p-3.5 rounded-xl ${sec.accentBg} border ${sec.badgeBorder} space-y-2 my-2">
          <div class="flex items-center justify-between text-xs">
            <span class="font-semibold text-[#1D241E] font-sans">Komposisi Gender (${desaList.length} Desa & Kel)</span>
            <span class="text-[11px] font-mono font-bold ${sec.badgeText}">L ${pctL}% : P ${pctP}%</span>
          </div>
          <div class="w-full h-2.5 rounded-full bg-[#DCE3DD] overflow-hidden flex">
            <div class="h-full bg-[#3B4D3B] transition-all duration-500" style="width: ${pctL}%;" title="Laki-laki ${pctL}%"></div>
            <div class="h-full bg-[#8A9B86] transition-all duration-500" style="width: ${pctP}%;" title="Perempuan ${pctP}%"></div>
          </div>
        </div>
      `;
    } else if (sec.id === 'pendidikan') {
      const totTK = desaList.reduce((a, b) => a + (b.pendidikan.tk || 0), 0);
      const totSD = desaList.reduce((a, b) => a + (b.pendidikan.sd_mi_tot || 0), 0);
      const totSMP = desaList.reduce((a, b) => a + (b.pendidikan.smp_mts_tot || 0), 0);
      const totSMA = desaList.reduce((a, b) => a + (b.pendidikan.sma_ma_tot || 0), 0);
      const totSMK = desaList.reduce((a, b) => a + (b.pendidikan.smk_tot || 0), 0);
      const totPT = desaList.reduce((a, b) => a + (b.pendidikan.pt_tot || 0), 0);
      const totalSekolah = totTK + totSD + totSMP + totSMA + totSMK + totPT;
      const totMenengahAtas = totSMA + totSMK + totPT;
      const pctTK = totalSekolah ? ((totTK / totalSekolah) * 100).toFixed(1) : 0;
      const pctSD = totalSekolah ? ((totSD / totalSekolah) * 100).toFixed(1) : 0;
      const pctSMP = totalSekolah ? ((totSMP / totalSekolah) * 100).toFixed(1) : 0;
      const pctAtas = totalSekolah ? ((totMenengahAtas / totalSekolah) * 100).toFixed(1) : 0;
      const avgSekolahDesa = desaList.length ? (totalSekolah / desaList.length).toFixed(1) : 0;

      sectorContentHtml = `
        <div class="flex items-center justify-between p-3.5 rounded-xl ${sec.accentBg} border ${sec.badgeBorder} my-3">
          <div class="flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-[#285A43]"></span>
            <div>
              <span class="text-xs font-bold text-[#1D241E] font-sans block">Total Fasilitas Sekolah</span>
              <span class="text-[11px] text-[#5E6B61] font-sans">Rata-rata ${avgSekolahDesa} sekolah per desa</span>
            </div>
          </div>
          <div class="text-2xl sm:text-3xl font-black ${sec.badgeText} tabular-nums font-sans">
            ${totalSekolah} <span class="text-xs font-semibold text-[#5E6B61]">Unit</span>
          </div>
        </div>
        <div class="grid grid-cols-3 sm:grid-cols-6 gap-2 text-center my-3">
          <div class="bg-white p-2.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">TK/PAUD</span>
            <span class="text-lg sm:text-xl font-bold text-[#1D241E] tabular-nums font-sans mt-0.5 block">${totTK}</span>
          </div>
          <div class="bg-white p-2.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">SD/MI</span>
            <span class="text-lg sm:text-xl font-bold ${sec.badgeText} tabular-nums font-sans mt-0.5 block">${totSD}</span>
          </div>
          <div class="bg-white p-2.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">SMP/MTs</span>
            <span class="text-lg sm:text-xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-0.5 block">${totSMP}</span>
          </div>
          <div class="bg-white p-2.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">SMA/MA</span>
            <span class="text-lg sm:text-xl font-bold text-[#566B53] tabular-nums font-sans mt-0.5 block">${totSMA}</span>
          </div>
          <div class="bg-white p-2.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">SMK</span>
            <span class="text-lg sm:text-xl font-bold text-[#1D241E] tabular-nums font-sans mt-0.5 block">${totSMK}</span>
          </div>
          <div class="bg-white p-2.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">PT</span>
            <span class="text-lg sm:text-xl font-bold text-[#1D241E] tabular-nums font-sans mt-0.5 block">${totPT}</span>
          </div>
        </div>
        <div class="space-y-1.5 pt-1">
          <div class="w-full h-2 rounded-full bg-[#DCE3DD] overflow-hidden flex">
            <div class="h-full bg-[#8A9B86]" style="width: ${pctTK}%;" title="TK/PAUD: ${totTK}"></div>
            <div class="h-full bg-[#285A43]" style="width: ${pctSD}%;" title="SD/MI: ${totSD}"></div>
            <div class="h-full bg-[#3B4D3B]" style="width: ${pctSMP}%;" title="SMP/MTs: ${totSMP}"></div>
            <div class="h-full bg-[#1D241E]" style="width: ${pctAtas}%;" title="SMA/SMK/PT: ${totMenengahAtas}"></div>
          </div>
          <div class="flex flex-wrap items-center justify-between gap-2 text-[10px] font-mono text-[#5E6B61]">
            <span><i class="bi bi-square-fill text-[#8A9B86] mr-1"></i>PAUD (${pctTK}%)</span>
            <span><i class="bi bi-square-fill text-[#285A43] mr-1"></i>SD (${pctSD}%)</span>
            <span><i class="bi bi-square-fill text-[#3B4D3B] mr-1"></i>SMP (${pctSMP}%)</span>
            <span><i class="bi bi-square-fill text-[#1D241E] mr-1"></i>SMA/PT (${pctAtas}%)</span>
          </div>
        </div>
      `;
    } else if (sec.id === 'kesehatan') {
      const totRS = desaList.reduce((a, b) => a + (b.kesehatan.rs || 0), 0);
      const totPusk = desaList.reduce((a, b) => a + (b.kesehatan.puskesmas_tot || 0), 0);
      const totPustu = desaList.reduce((a, b) => a + (b.kesehatan.pustu || 0) + (b.kesehatan.poskesdes || 0), 0);
      const totApotek = desaList.reduce((a, b) => a + (b.kesehatan.apotek || 0), 0);
      const totPosyandu = desaList.reduce((a, b) => a + (b.kesehatan.posyandu_aktif || 0), 0);
      const totPosbindu = desaList.reduce((a, b) => a + (b.kesehatan.posbindu || 0), 0);
      const posyanduCovPct = desaList.length ? Math.min(100, Math.round((totPosyandu / desaList.length) * 100)) : 100;

      sectorContentHtml = `
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 my-3.5">
          <div class="bg-white p-3.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">01 / RS & PUSKESMAS</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#1E5646] tabular-nums font-sans mt-1">${totRS + totPusk} <span class="text-xs font-normal text-[#5E6B61]">Unit</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Faskes Rujukan Utama</span>
          </div>
          <div class="bg-white p-3.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">02 / PUSTU & POSKESDES</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#2F6E58] tabular-nums font-sans mt-1">${totPustu} <span class="text-xs font-normal text-[#5E6B61]">Unit</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Layanan Kesehatan Desa</span>
          </div>
          <div class="bg-white p-3.5 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86] block">03 / POSYANDU AKTIF</span>
            <div class="text-2xl sm:text-3xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">${totPosyandu} <span class="text-xs font-normal text-[#5E6B61]">Unit</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Posbindu: ${totPosbindu} • Apotek: ${totApotek}</span>
          </div>
        </div>
        <div class="p-3.5 rounded-xl ${sec.accentBg} border ${sec.badgeBorder} space-y-2 my-2">
          <div class="flex items-center justify-between text-xs">
            <span class="text-[#1D241E] font-semibold font-sans">Jangkauan Layanan Kesehatan Desa</span>
            <span class="px-2.5 py-0.5 rounded-full bg-white border ${sec.badgeBorder} ${sec.badgeText} text-[11px] font-bold">${totPosyandu}/${desaList.length} Desa Aktif</span>
          </div>
          <div class="w-full h-2.5 rounded-full bg-white/80 border ${sec.badgeBorder} overflow-hidden">
            <div class="h-full bg-[#1E5646] rounded-full transition-all duration-500" style="width: ${posyanduCovPct}%;"></div>
          </div>
        </div>
      `;
    } else if (sec.id === 'ekonomi') {
      const totIMK = desaList.reduce((a, b) => a + (b.ekonomi.imk || 0), 0);
      const totPasar = desaList.reduce((a, b) => a + (b.ekonomi.pasar_perm + b.ekonomi.pasar_semi + b.ekonomi.pasar_tanpa), 0);
      const totMini = desaList.reduce((a, b) => a + (b.ekonomi.minimarket || 0), 0);
      const totBank = desaList.reduce((a, b) => a + (b.ekonomi.bank_gov + b.ekonomi.bank_swasta + b.ekonomi.bpr), 0);
      const totKop = desaList.reduce((a, b) => a + (b.ekonomi.kud + b.ekonomi.ksp + b.ekonomi.koperasi_lain), 0);
      const totHotel = desaList.reduce((a, b) => a + (b.ekonomi.hotel + b.ekonomi.penginapan), 0);
      const avgIMKDesa = desaList.length ? (totIMK / desaList.length).toFixed(1) : 0;

      sectorContentHtml = `
        <div class="flex items-center justify-between p-3.5 rounded-xl ${sec.accentBg} border ${sec.badgeBorder} my-3">
          <div class="flex items-center gap-2.5">
            <span class="w-8 h-8 rounded-lg ${sec.badgeBg} ${sec.badgeText} flex items-center justify-center text-sm border ${sec.badgeBorder}">
              <i class="bi bi-shop"></i>
            </span>
            <div>
              <span class="text-[10px] font-mono uppercase ${sec.badgeText} font-bold block">Sentra Industri Mikro & Kecil (IMK)</span>
              <span class="text-xs text-[#5E6B61]">Rata-rata ${avgIMKDesa} unit produktif per desa</span>
            </div>
          </div>
          <div class="text-2xl sm:text-3xl font-black ${sec.badgeText} tabular-nums font-sans">
            ${totIMK.toLocaleString('id-ID')} <span class="text-xs font-semibold ${sec.badgeText}/80">Unit</span>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3 my-3">
          <div class="bg-white p-3 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">01 / PASAR TRADISIONAL</span>
            <div class="text-2xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">${totPasar} <span class="text-xs font-normal text-[#5E6B61]">Lokasi</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Minimarket / Toko: ${totMini}</span>
          </div>
          <div class="bg-white p-3 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">02 / LEMBAGA KEUANGAN</span>
            <div class="text-2xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">${totBank + totKop} <span class="text-xs font-normal text-[#5E6B61]">Unit</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Bank: ${totBank} • Koperasi: ${totKop}</span>
          </div>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-2 px-3 py-2 rounded-xl bg-[#F8FAF8] border border-[#DCE3DD] text-[11px] text-[#5E6B61] font-sans">
          <span>Ekosistem Niaga: <strong class="text-[#1D241E]">${totPasar + totMini} Pusat Belanja</strong></span>
          <span>Akomodasi / Penginapan: <strong class="text-[#1D241E]">${totHotel} Unit</strong></span>
        </div>
      `;
    } else if (sec.id === 'lingkungan') {
      const totPLN = desaList.reduce((a, b) => a + (b.lingkungan.pln_kk || 0), 0);
      const totNonPLN = desaList.reduce((a, b) => a + (b.lingkungan.non_pln_kk || 0), 0);
      const totTanpa = desaList.reduce((a, b) => a + (b.lingkungan.tanpa_listrik_kk || 0), 0);
      const totalKK = totPLN + totNonPLN + totTanpa;
      const rasioPLN = totalKK > 0 ? ((totPLN / totalKK) * 100).toFixed(1) : '100.0';
      const rasioNum = Math.min(100, parseFloat(rasioPLN));
      const plnStatus = rasioNum >= 95 ? 'Sangat Baik' : (rasioNum >= 85 ? 'Baik' : 'Bertahap');
      const bebasCemarDesa = desaList.filter(d => d.lingkungan.bebas_pencemaran).length;
      const bebasPct = desaList.length ? Math.round((bebasCemarDesa / desaList.length) * 100) : 100;

      sectorContentHtml = `
        <div class="p-3.5 rounded-xl ${sec.accentBg} border ${sec.badgeBorder} my-3 space-y-2.5">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
              <span class="w-8 h-8 rounded-lg ${sec.badgeBg} ${sec.badgeText} flex items-center justify-center text-sm border ${sec.badgeBorder}">
                <i class="bi bi-lightning-charge-fill"></i>
              </span>
              <div>
                <span class="text-[10px] font-mono uppercase ${sec.badgeText} font-bold block">Pelanggan Listrik PLN</span>
                <span class="text-xs text-[#5E6B61]">Rasio ${rasioPLN}% • Kategori <strong class="${sec.badgeText}">${plnStatus}</strong></span>
              </div>
            </div>
            <div class="text-right">
              <div class="text-2xl sm:text-3xl font-black ${sec.badgeText} tabular-nums font-sans">
                ${totPLN.toLocaleString('id-ID')} <span class="text-xs font-semibold ${sec.badgeText}/80">KK</span>
              </div>
            </div>
          </div>
          <div class="w-full h-2.5 rounded-full bg-white/90 border ${sec.badgeBorder} overflow-hidden">
            <div class="h-full bg-[#23683A] rounded-full transition-all duration-500" style="width: ${rasioNum}%;"></div>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3 my-3">
          <div class="bg-white p-3 rounded-xl border border-[#DCE3DD] shadow-2xs">
            <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">01 / NON-PLN & MANDIRI</span>
            <div class="text-2xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">${totNonPLN} <span class="text-xs font-normal text-[#5E6B61]">KK</span></div>
            <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Tanpa Listrik: ${totTanpa} KK</span>
          </div>
          <div class="bg-white p-3 rounded-xl border border-[#DCE3DD] shadow-2xs flex flex-col justify-between">
            <div>
              <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">02 / LINGKUNGAN HIDUP</span>
              <div class="text-2xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">${bebasCemarDesa} <span class="text-xs font-normal text-[#5E6B61]">/ ${desaList.length} Desa</span></div>
            </div>
            <div class="w-full h-1.5 rounded-full bg-[#E6ECE6] overflow-hidden mt-2" title="${bebasPct}% Bebas Pencemaran">
              <div class="h-full bg-[#3B4D3B] rounded-full" style="width: ${bebasPct}%;"></div>
            </div>
          </div>
        </div>
      `;
    } else if (sec.id === 'keuangan') {
      const totBumdes = desaList.reduce((a, b) => a + (b.pemerintahan.bumdes || 0), 0);
      const totTanahKas = desaList.reduce((a, b) => a + (b.pemerintahan.tanah_kas || 0), 0);
      const totWisata = desaList.reduce((a, b) => a + (b.pemerintahan.wisata_desa || 0), 0);
      const countSiskeudes = desaList.filter(d => d.pemerintahan.siskeudes && d.pemerintahan.siskeudes !== 'Tidak Ada').length;
      const countSID = desaList.filter(d => d.pemerintahan.sid && d.pemerintahan.sid !== 'Tidak Ada').length;
      const pctSiskeudes = desaList.length ? Math.round((countSiskeudes / desaList.length) * 100) : 0;
      const pctSID = desaList.length ? Math.round((countSID / desaList.length) * 100) : 0;

      sectorContentHtml = `
        <div class="flex items-center justify-between p-3.5 rounded-xl ${sec.accentBg} border ${sec.badgeBorder} my-3">
          <div class="flex items-center gap-2.5">
            <span class="w-8 h-8 rounded-lg ${sec.badgeBg} ${sec.badgeText} flex items-center justify-center text-sm border ${sec.badgeBorder}">
              <i class="bi bi-wallet2"></i>
            </span>
            <div>
              <span class="text-[10px] font-mono uppercase ${sec.badgeText} font-bold block">Keberadaan BUMDes</span>
              <span class="text-xs text-[#5E6B61]">Penggerak ekonomi & kemandirian desa</span>
            </div>
          </div>
          <div class="text-2xl sm:text-3xl font-black ${sec.badgeText} tabular-nums font-sans">
            ${totBumdes} <span class="text-xs font-semibold ${sec.badgeText}/80">Unit</span>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3 my-3">
          <div class="bg-white p-3 rounded-xl border border-[#DCE3DD] shadow-2xs space-y-2">
            <div>
              <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">01 / DIGITALISASI DESA</span>
              <div class="text-2xl font-bold text-[#1D241E] tabular-nums font-sans mt-1">${countSiskeudes} <span class="text-xs font-normal text-[#5E6B61]">SISKEUDES</span></div>
            </div>
            <div class="space-y-1 text-[10px] font-mono text-[#5E6B61]">
              <div class="flex justify-between"><span>SISKEUDES</span><span>${pctSiskeudes}%</span></div>
              <div class="w-full h-1.5 rounded-full bg-[#E6ECE6] overflow-hidden"><div class="h-full bg-[#245366]" style="width: ${pctSiskeudes}%;"></div></div>
              <div class="flex justify-between pt-0.5"><span>Sistem Info (SID)</span><span>${pctSID}%</span></div>
              <div class="w-full h-1.5 rounded-full bg-[#E6ECE6] overflow-hidden"><div class="h-full bg-[#566B53]" style="width: ${pctSID}%;"></div></div>
            </div>
          </div>
          <div class="bg-white p-3 rounded-xl border border-[#DCE3DD] shadow-2xs flex flex-col justify-between">
            <div>
              <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">02 / ASET & WISATA</span>
              <div class="text-2xl font-bold text-[#3B4D3B] tabular-nums font-sans mt-1">${totWisata} <span class="text-xs font-normal text-[#5E6B61]">Wisata</span></div>
              <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Tanah Kas Desa: ${totTanahKas} Unit</span>
            </div>
            <div class="text-[11px] font-sans text-[#5E6B61] bg-[#F8FAF8] border border-[#DCE3DD] rounded-lg px-2.5 py-1.5 mt-2">
              Total ${countSID} Desa aktif SID
            </div>
          </div>
        </div>
      `;
    } else if (sec.id === 'pemerintahan') {
      const totAparat = desaList.reduce((a, b) => a + (b.pemerintahan.total_aparat || 0), 0);
      const kadesS1 = desaList.filter(d => d.pemerintahan.kades_pend && d.pemerintahan.kades_pend.includes('S1')).length;
      const kadesL = desaList.filter(d => d.pemerintahan.kades_gender === 'Laki-laki').length;
      const kadesP = desaList.filter(d => d.pemerintahan.kades_gender === 'Perempuan').length;
      const kadesS1Pct = desaList.length ? Math.round((kadesS1 / desaList.length) * 100) : 0;
      const kadesTotGender = kadesL + kadesP;
      const kadesLPct = kadesTotGender ? Math.round((kadesL / kadesTotGender) * 100) : 100;

      sectorContentHtml = `
        <div class="flex items-center justify-between p-3.5 rounded-xl ${sec.accentBg} border ${sec.badgeBorder} my-3">
          <div class="flex items-center gap-2.5">
            <span class="w-8 h-8 rounded-lg ${sec.badgeBg} ${sec.badgeText} flex items-center justify-center text-sm border ${sec.badgeBorder}">
              <i class="bi bi-shield-check"></i>
            </span>
            <div>
              <span class="text-[10px] font-mono uppercase ${sec.badgeText} font-bold block">Aparatur Pemerintahan Desa</span>
              <span class="text-xs text-[#5E6B61]">Kades, Sekdes & seluruh perangkat</span>
            </div>
          </div>
          <div class="text-2xl sm:text-3xl font-black ${sec.badgeText} tabular-nums font-sans">
            ${totAparat} <span class="text-xs font-semibold ${sec.badgeText}/80">Orang</span>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3 my-3">
          <div class="bg-white p-3 rounded-xl border border-[#DCE3DD] shadow-2xs flex flex-col justify-between">
            <div>
              <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">01 / PENDIDIKAN KADES</span>
              <div class="text-2xl font-bold ${sec.badgeText} tabular-nums font-sans mt-1">${kadesS1} <span class="text-xs font-normal text-[#5E6B61]">/ ${desaList.length} Kades</span></div>
              <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Lulusan D-IV / S1 (${kadesS1Pct}%)</span>
            </div>
            <div class="w-full h-1.5 rounded-full bg-[#E6ECE6] overflow-hidden mt-2">
              <div class="h-full bg-[#445E2A] rounded-full" style="width: ${kadesS1Pct}%;"></div>
            </div>
          </div>
          <div class="bg-white p-3 rounded-xl border border-[#DCE3DD] shadow-2xs flex flex-col justify-between">
            <div>
              <span class="text-[10px] font-mono uppercase text-[#8A9B86] block">02 / GENDER KADES</span>
              <div class="text-2xl font-bold text-[#566B53] tabular-nums font-sans mt-1">${kadesL} L • ${kadesP} P</div>
              <span class="text-[11px] text-[#5E6B61] block mt-0.5 font-sans">Komposisi Kepemimpinan</span>
            </div>
            <div class="w-full h-1.5 rounded-full bg-[#E6ECE6] overflow-hidden flex mt-2">
              <div class="h-full bg-[#3B4D3B]" style="width: ${kadesLPct}%;"></div>
              <div class="h-full bg-[#8A9B86]" style="width: ${100 - kadesLPct}%;"></div>
            </div>
          </div>
        </div>
      `;
    }

    return sectorContentHtml;
  }

  function getSectorSlideHtml(sec, idx, desaList) {
    const contentHtml = getSectorContentHtml(sec, desaList);
    return `
      <div class="w-full shrink-0 min-w-full p-5 sm:p-6 flex flex-col justify-between" data-sector-slide-index="${idx}">
        <div class="flex items-center justify-between pb-3 border-b border-[#DCE3DD]/80">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl ${sec.badgeBg} ${sec.badgeText} border ${sec.badgeBorder} flex items-center justify-center text-lg shrink-0 shadow-2xs">
              <i class="bi ${sec.icon}"></i>
            </div>
            <div>
              <div class="text-[10px] font-mono uppercase tracking-[0.18em] ${sec.badgeText} font-bold">SEKTOR PODES AKTIF</div>
              <h4 class="font-cinzel text-xl sm:text-2xl font-bold text-[#1D241E] uppercase tracking-wide mt-0.5">
                ${sec.name}
              </h4>
            </div>
          </div>
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full ${sec.badgeBg} ${sec.badgeText} border ${sec.badgeBorder} text-xs font-semibold font-mono">
            <span>${idx + 1} / 7</span>
          </span>
        </div>

        <!-- Dynamic Content for Active Sector -->
        ${contentHtml}
      </div>
    `;
  }

  function renderRightSectorCard() {
    const k = masterData.kecamatan[activeKecamatanKey];
    if (!k) return;

    const desaList = k.desa_list || [];
    const rightPanel = document.getElementById('kecDetailRightPanel');
    if (!rightPanel) return;

    // Generate pagination dots
    const dotsHtml = SECTORS.map((s, idx) => {
      const isActive = idx === activeSectorIndex;
      return `
        <button onclick="window.setSectorSlide(${idx}, true)" 
                class="sector-dot-btn h-2 rounded-full transition-all duration-300 cursor-pointer ${isActive ? 'bg-[#3B4D3B] w-4' : 'bg-[#DCE3DD] hover:bg-[#8A9B86] w-2'}" 
                data-dot-idx="${idx}"
                title="${idx + 1}. ${s.name}">
        </button>
      `;
    }).join('');

    // Pre-render all 7 sector slides into the hardware-accelerated carousel track
    const slidesHtml = SECTORS.map((s, idx) => getSectorSlideHtml(s, idx, desaList)).join('');

    rightPanel.innerHTML = `
      <div id="swipeableSectorCard" class="h-full flex flex-col justify-between p-6 sm:p-8 lg:p-9 select-none">
        <div>
          <!-- Top Bar: Title, Auto-Play Status, & Slide Nav -->
          <div class="flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-2.5">
              <h3 class="font-batangas text-2xl sm:text-3xl font-bold text-[#1D241E]">Sektor Lainnya</h3>
              <span id="sectorCounterText" class="font-mono text-xs text-[#8A9B86]">(${activeSectorIndex + 1}/7)</span>
              <span id="sectorAutoStatusLabel" class="hidden sm:inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#E6ECE6]/80 border border-[#DCE3DD] text-[#3B4D3B] text-[10px] font-mono font-semibold">
                <span class="w-1.5 h-1.5 rounded-full bg-[#3B4D3B] animate-pulse"></span>
                <span>Auto • 4d</span>
              </span>
            </div>

            <!-- Dots, Prev / Pause-Play / Next Arrows -->
            <div class="flex items-center gap-2.5 sm:gap-3">
              <div id="sectorDotsContainer" class="flex items-center gap-1.5">
                ${dotsHtml}
              </div>
              <div class="flex items-center gap-1 border-l border-[#DCE3DD] pl-2.5 sm:pl-3">
                <button onclick="window.prevSectorSlide(true)" class="w-7 h-7 rounded-full bg-white border border-[#DCE3DD] hover:border-[#3B4D3B] hover:text-[#3B4D3B] text-[#5E6B61] flex items-center justify-center text-xs transition-colors cursor-pointer shadow-2xs" title="Sektor Sebelumnya">
                  <i class="bi bi-chevron-left"></i>
                </button>
                <button id="sectorAutoPlayBtn" onclick="window.toggleSectorAutoPlay()" class="w-7 h-7 rounded-full bg-white border border-[#DCE3DD] hover:border-[#3B4D3B] hover:text-[#3B4D3B] text-[#5E6B61] flex items-center justify-center text-xs transition-colors cursor-pointer shadow-2xs" title="Jeda Auto-Slide">
                  <i class="bi bi-pause-fill"></i>
                </button>
                <button onclick="window.nextSectorSlide(true)" class="w-7 h-7 rounded-full bg-white border border-[#DCE3DD] hover:border-[#3B4D3B] hover:text-[#3B4D3B] text-[#5E6B61] flex items-center justify-center text-xs transition-colors cursor-pointer shadow-2xs" title="Sektor Selanjutnya">
                  <i class="bi bi-chevron-right"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="border-t border-[#DCE3DD] my-4"></div>

          <!-- Active Sector Card Container with 4-Second Visual Timer Bar & Carousel Track -->
          <div class="bg-white rounded-2xl border border-[#DCE3DD] shadow-2xs overflow-hidden relative">
            <!-- 4s Progress Timer Line -->
            <div class="w-full h-[3px] bg-[#E6ECE6] overflow-hidden">
              <div id="sectorTimerBar" class="h-full bg-[#3B4D3B]" style="width: 0%;"></div>
            </div>

            <div id="sectorSliderTrack" 
                 class="flex w-full will-change-transform items-stretch" 
                 style="transform: translateX(-${activeSectorIndex * 100}%); transition: transform 650ms cubic-bezier(0.22, 1, 0.36, 1);">
              ${slidesHtml}
            </div>
          </div>
        </div>

        <!-- Bottom Sector Quick Chips (Interactive Pill Bar with Sector Accents) -->
        <div class="mt-5 pt-4 border-t border-[#DCE3DD]">
          <div class="flex items-center justify-between mb-2">
            <span class="text-[10px] font-mono uppercase tracking-[0.18em] text-[#8A9B86]">NAVIGASI 7 SEKTOR PODES</span>
            <span class="text-[11px] text-[#5E6B61] font-sans">Pilih sektor • Arahkan kursor untuk menjeda</span>
          </div>
          <div id="sectorChipsContainer" class="flex flex-wrap gap-1.5 sm:gap-2">
            ${SECTORS.map((s, idx) => `
              <button onclick="window.setSectorSlide(${idx}, true)" 
                      data-chip-idx="${idx}"
                      class="sector-pill-btn inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold transition-all duration-300 cursor-pointer ${idx === activeSectorIndex ? 'bg-[#3B4D3B] text-white shadow-xs' : 'bg-white hover:bg-[#F2F6F2] text-[#5E6B61] hover:text-[#1D241E] border border-[#DCE3DD] hover:border-[#8A9B86] shadow-2xs'}">
                <i class="bi ${s.icon} ${idx === activeSectorIndex ? 'text-white' : s.badgeText}"></i>
                <span>${s.name}</span>
              </button>
            `).join('')}
          </div>
        </div>
      </div>
    `;

    // Attach hover pause / resume and swipe gestures
    const swipeCard = document.getElementById('swipeableSectorCard');
    if (swipeCard) {
      swipeCard.addEventListener('mouseenter', () => {
        isSectorHovered = true;
        stopSectorAutoSlide(true);
      });

      swipeCard.addEventListener('mouseleave', () => {
        isSectorHovered = false;
        startSectorAutoSlide();
      });

      let touchStartX = 0;
      let touchEndX = 0;

      swipeCard.addEventListener('touchstart', (e) => {
        isSectorHovered = true;
        stopSectorAutoSlide(true);
        touchStartX = e.changedTouches[0].screenX;
      }, { passive: true });

      swipeCard.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        isSectorHovered = false;
        if (touchEndX < touchStartX - 50) {
          nextSectorSlide(true);
        } else if (touchEndX > touchStartX + 50) {
          prevSectorSlide(true);
        } else {
          startSectorAutoSlide();
        }
      }, { passive: true });
    }

    startSectorAutoSlide();
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
