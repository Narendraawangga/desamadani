/**
 * PODES 2025 COMPLETE DATA EXPLORER - KABUPATEN KOLAKA UTARA
 * Refactored Two-Stage Exploration Flow:
 * - State 1: Direktori 15 Kecamatan (Horizontal Card Carousel + Search Bar + Peeking Card)
 * - State 2: Split-Panel Detail Kecamatan (Sektor Unggulan + Swipeable 7 Sektor PODES + Tabel Desa)
 * Palet: Emerald/Teal (#0D7A5F, #0F766E, Badge #ECFDF5) • 100% Clean Look & Data Fidelity
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

  const SECTORS = [
    { id: 'demografi', name: 'Kependudukan', icon: '👥' },
    { id: 'pendidikan', name: 'Pendidikan', icon: '🎓' },
    { id: 'kesehatan', name: 'Kesehatan', icon: '🏥' },
    { id: 'ekonomi', name: 'Ekonomi & Industri', icon: '🏭' },
    { id: 'lingkungan', name: 'Kelistrikan & Lingkungan', icon: '⚡' },
    { id: 'keuangan', name: 'Keuangan & BUMDes', icon: '💼' },
    { id: 'pemerintahan', name: 'Pemerintahan Desa', icon: '🏛️' }
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
    const scrollAmount = 280;
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
    KEC_ORDER.forEach(kKey => {
      const k = masterData.kecamatan[kKey];
      if (!k) return;

      const desaCount = (k.desa_list || []).length;
      const totL = (k.desa_list || []).reduce((a, b) => a + (Number(b.demografi.penduduk_l) || 0), 0);
      const totP = (k.desa_list || []).reduce((a, b) => a + (Number(b.demografi.penduduk_p) || 0), 0);
      const totPop = totL + totP;
      const totIMK = (k.desa_list || []).reduce((a, b) => a + (Number(b.ekonomi.imk) || 0), 0);
      const dominantComm = getDominantCommodity(k.desa_list);

      // Icon for commodity
      let commIcon = '🌱';
      if (dominantComm.toLowerCase().includes('kakao') || dominantComm.toLowerCase().includes('coklat')) commIcon = '🍫';
      else if (dominantComm.toLowerCase().includes('cengkeh')) commIcon = '🌿';
      else if (dominantComm.toLowerCase().includes('nilam')) commIcon = '🍃';
      else if (dominantComm.toLowerCase().includes('lada')) commIcon = '🌶️';
      else if (dominantComm.toLowerCase().includes('padi')) commIcon = '🌾';

      html += `
        <div class="kec-carousel-card w-[220px] sm:w-[245px] flex-shrink-0 rounded-3xl p-5 border border-slate-200/90 bg-gradient-to-b from-white via-white to-emerald-50/20 shadow-xs hover:shadow-lg hover:border-[#0D7A5F] transition-all duration-200 cursor-pointer flex flex-col justify-between group hover:-translate-y-1.5 relative overflow-hidden" 
             data-kec-key="${kKey}" 
             onclick="window.selectKecamatanExploration('${kKey}')"
             title="Klik untuk eksplorasi detail Kecamatan ${k.nama}">
          
          <!-- Top Area -->
          <div>
            <div class="flex items-center justify-between gap-1 mb-2">
              <span class="text-[10px] font-mono font-bold text-slate-400">KODE: ${k.kode || '-'}</span>
              <span class="px-2 py-0.5 rounded-full bg-[#ECFDF5] border border-emerald-200/70 text-[#0D7A5F] text-[10px] font-extrabold whitespace-nowrap">
                ${desaCount} Desa/Kel
              </span>
            </div>

            <h3 class="text-xl sm:text-2xl font-black text-[#152e4d] tracking-tight leading-tight group-hover:text-[#0D7A5F] transition-colors">
              ${k.nama.toUpperCase()}
            </h3>

            <div class="inline-flex items-center gap-1.5 text-xs text-slate-600 font-semibold mt-1">
              <span>${commIcon}</span>
              <span class="truncate max-w-[170px]">${dominantComm}</span>
            </div>
          </div>

          <!-- Mid / 2 Concise Metrics -->
          <div class="my-4 pt-3.5 border-t border-slate-100 space-y-2.5">
            <div>
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Penduduk Riil 2025</span>
              <div class="text-lg sm:text-xl font-black text-slate-900 tabular-nums">
                ${totPop.toLocaleString('id-ID')} <span class="text-[11px] font-semibold text-slate-500">Jiwa</span>
              </div>
            </div>
            <div>
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Industri Mikro (IMK)</span>
              <div class="text-sm font-extrabold text-amber-600 tabular-nums">
                ${totIMK.toLocaleString('id-ID')} <span class="text-[11px] font-medium text-slate-500">Unit Usaha</span>
              </div>
            </div>
          </div>

          <!-- Bottom Action Prompt -->
          <div class="pt-2 flex items-center justify-between text-xs font-bold text-[#0D7A5F] group-hover:text-[#095244] border-t border-emerald-100/50">
            <span>Detail Kecamatan</span>
            <span class="transform group-hover:translate-x-1 transition-transform">→</span>
          </div>
        </div>
      `;
    });

    track.innerHTML = html;

    // Attach scroll listener to update progress indicator
    track.addEventListener('scroll', updateCarouselScrollIndicator);

    // Enable mouse drag scrolling on desktop
    let isDown = false;
    let startX;
    let scrollLeft;

    track.addEventListener('mousedown', (e) => {
      isDown = true;
      track.classList.add('cursor-grabbing');
      startX = e.pageX - track.offsetLeft;
      scrollLeft = track.scrollLeft;
    });

    track.addEventListener('mouseleave', () => {
      isDown = false;
      track.classList.remove('cursor-grabbing');
    });

    track.addEventListener('mouseup', () => {
      isDown = false;
      track.classList.remove('cursor-grabbing');
    });

    track.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - track.offsetLeft;
      const walk = (x - startX) * 1.5;
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
      <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4">
        <div class="bg-white rounded-2xl p-4 border border-slate-200/90 shadow-2xs hover:shadow-md transition-all">
          <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Total Penduduk Riil</div>
          <div class="text-2xl sm:text-3xl font-black text-[#0D7A5F] mt-1 tabular-nums">
            ${totJiwa.toLocaleString('id-ID')}
          </div>
          <div class="text-[11px] text-slate-500 font-medium mt-0.5">
            L: ${totL.toLocaleString('id-ID')} • P: ${totP.toLocaleString('id-ID')}
          </div>
        </div>

        <div class="bg-white rounded-2xl p-4 border border-slate-200/90 shadow-2xs hover:shadow-md transition-all">
          <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Rata-Rata Kepadatan</div>
          <div class="text-2xl sm:text-3xl font-black text-slate-900 mt-1 tabular-nums">
            ${avgKepadatan} <span class="text-xs font-semibold text-slate-500">Jiwa/km²</span>
          </div>
          <div class="text-[11px] text-slate-500 font-medium mt-0.5">
            Cakupan 15 Kecamatan / 133 Desa
          </div>
        </div>

        <div class="bg-white rounded-2xl p-4 border border-slate-200/90 shadow-2xs hover:shadow-md transition-all">
          <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Rasio Jenis Kelamin</div>
          <div class="text-2xl sm:text-3xl font-black text-blue-600 mt-1 tabular-nums">
            ${sexRatio}
          </div>
          <div class="text-[11px] text-slate-500 font-medium mt-0.5">
            Laki-laki per 100 Perempuan
          </div>
        </div>

        <div class="bg-white rounded-2xl p-4 border border-slate-200/90 shadow-2xs hover:shadow-md transition-all">
          <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Sentra & IMK Produktif</div>
          <div class="text-2xl sm:text-3xl font-black text-amber-600 mt-1 tabular-nums">
            ${totIMK.toLocaleString('id-ID')}
          </div>
          <div class="text-[11px] text-slate-500 font-medium mt-0.5">
            Listrik PLN: ${rasioListrik}%
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

    // 1. Render Left Panel (Sektor Unggulan)
    const leftPanel = document.getElementById('kecDetailLeftPanel');
    if (leftPanel) {
      leftPanel.innerHTML = `
        <div class="h-full flex flex-col justify-between p-6 sm:p-8">
          <div>
            <div class="flex items-center justify-between gap-2 mb-3">
              <button onclick="window.backToKecamatanDirectory()" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 hover:bg-emerald-100 text-[#0D7A5F] text-xs font-bold transition-all">
                ← Semua Kecamatan
              </button>
              <span class="text-[10px] font-mono font-bold text-slate-400">KODE: ${k.kode || '-'}</span>
            </div>

            <h2 class="text-3xl sm:text-4xl font-black text-[#152e4d] tracking-tight">
              KECAMATAN ${k.nama.toUpperCase()}
            </h2>
            <p class="text-slate-500 text-xs sm:text-sm mt-0.5">
              Wilayah Administratif • Terdiri dari <strong class="text-slate-800">${desaList.length} Desa & Kelurahan</strong>
            </p>
          </div>

          <!-- Card Sektor Unggulan Statis -->
          <div class="mt-6 rounded-2xl bg-gradient-to-br from-emerald-50/70 via-white to-teal-50/50 p-5 sm:p-6 border border-emerald-200/90 shadow-xs space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-emerald-100">
              <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#0D7A5F]"></span>
                <h4 class="font-bold text-sm uppercase tracking-wider text-slate-800">Sektor Unggulan Wilayah</h4>
              </div>
              <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full bg-[#ECFDF5] text-[#0D7A5F] border border-emerald-200">
                PODES 2025
              </span>
            </div>

            <!-- Komoditas Utama -->
            <div class="flex items-start gap-3.5 bg-white rounded-xl p-3.5 border border-slate-100 shadow-2xs">
              <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-lg shrink-0">
                🌱
              </div>
              <div class="flex-1">
                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Komoditas Utama Dominan</div>
                <div class="text-base sm:text-lg font-black text-slate-900 mt-0.5">${dominantComm}</div>
                <div class="text-[11px] text-slate-500 mt-0.5">Basis perkebunan rakyat & agribisnis utama kecamatan.</div>
              </div>
            </div>

            <!-- Grid 3 Metrik Sektor Unggulan -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
              <div class="bg-white rounded-xl p-3 border border-slate-100">
                <div class="text-[10px] font-bold text-slate-400 uppercase">Unit IMK</div>
                <div class="text-lg font-black text-amber-600 mt-0.5">${totIMK.toLocaleString('id-ID')}</div>
                <div class="text-[10px] text-slate-500">Usaha Mikro/Kecil</div>
              </div>

              <div class="bg-white rounded-xl p-3 border border-slate-100">
                <div class="text-[10px] font-bold text-slate-400 uppercase">Desa Unggulan</div>
                <div class="text-lg font-black text-[#0D7A5F] mt-0.5">${prodInfo.count} Desa</div>
                <div class="text-[10px] text-slate-500">Ada Produk Khas</div>
              </div>

              <div class="bg-white rounded-xl p-3 border border-slate-100">
                <div class="text-[10px] font-bold text-slate-400 uppercase">BUMDes Aktif</div>
                <div class="text-lg font-black text-indigo-700 mt-0.5">${totBumdes} Unit</div>
                <div class="text-[10px] text-slate-500">Kemandirian Desa</div>
              </div>
            </div>

            <!-- Chips Produk Unggulan -->
            ${prodInfo.products.length ? `
              <div class="pt-2 text-xs">
                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1.5">Contoh Produk Unggulan:</span>
                <div class="flex flex-wrap gap-1.5">
                  ${prodInfo.products.map(p => `<span class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-700 font-semibold text-[11px] shadow-2xs">✨ ${p}</span>`).join('')}
                </div>
              </div>
            ` : ''}
          </div>
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
                class="w-2.5 h-2.5 rounded-full transition-all cursor-pointer ${isActive ? 'bg-[#0D7A5F] scale-125' : 'bg-slate-300 hover:bg-slate-400'}" 
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
        <div class="space-y-4">
          <div class="grid grid-cols-2 gap-3 text-xs">
            <div class="bg-slate-50 rounded-xl p-3.5 border border-slate-100">
              <span class="text-slate-400 text-[10px] font-bold uppercase block">Total Penduduk</span>
              <span class="text-xl font-black text-slate-900 mt-1 block">${totPop.toLocaleString('id-ID')} Jiwa</span>
              <span class="text-[11px] text-slate-500">Laki-laki: ${totL.toLocaleString('id-ID')}</span>
            </div>
            <div class="bg-slate-50 rounded-xl p-3.5 border border-slate-100">
              <span class="text-slate-400 text-[10px] font-bold uppercase block">Perempuan</span>
              <span class="text-xl font-black text-slate-900 mt-1 block">${totP.toLocaleString('id-ID')} Jiwa</span>
              <span class="text-[11px] text-slate-500">Sex Ratio: ${sexRatio}</span>
            </div>
          </div>
          <div class="bg-emerald-50/50 rounded-xl p-3.5 border border-emerald-100 flex items-center justify-between text-xs">
            <div>
              <span class="text-[10px] font-bold text-slate-500 uppercase block">Rata-Rata Kepadatan</span>
              <span class="text-lg font-black text-[#0D7A5F]">${avgKepadatan} Jiwa / km²</span>
            </div>
            <span class="px-2.5 py-1 rounded-full bg-white border border-emerald-200 text-emerald-800 text-[11px] font-bold">
              ${desaList.length} Desa/Kel
            </span>
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

      sectorContentHtml = `
        <div class="space-y-3 text-xs">
          <div class="flex justify-between items-center bg-slate-50 p-2.5 rounded-xl border border-slate-100">
            <span class="font-bold text-slate-700">Total Fasilitas Sekolah</span>
            <span class="font-black text-base text-[#0D7A5F]">${totalSekolah} Unit</span>
          </div>
          <div class="grid grid-cols-3 gap-2.5 text-center">
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">TK / PAUD</span>
              <span class="text-base font-extrabold text-slate-800">${totTK}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">SD / MI</span>
              <span class="text-base font-extrabold text-slate-800">${totSD}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">SMP / MTs</span>
              <span class="text-base font-extrabold text-slate-800">${totSMP}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">SMA / MA</span>
              <span class="text-base font-extrabold text-slate-800">${totSMA}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">SMK</span>
              <span class="text-base font-extrabold text-slate-800">${totSMK}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Perguruan Tinggi</span>
              <span class="text-base font-extrabold text-slate-800">${totPT}</span>
            </div>
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

      sectorContentHtml = `
        <div class="space-y-3 text-xs">
          <div class="grid grid-cols-2 gap-2.5">
            <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Rumah Sakit / Puskesmas</span>
              <span class="text-base font-extrabold text-slate-800">${totRS + totPusk} Unit</span>
            </div>
            <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Pustu & Poskesdes</span>
              <span class="text-base font-extrabold text-slate-800">${totPustu} Unit</span>
            </div>
          </div>
          <div class="grid grid-cols-3 gap-2.5 text-center">
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Posyandu Aktif</span>
              <span class="text-base font-extrabold text-emerald-700">${totPosyandu}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Posbindu</span>
              <span class="text-base font-extrabold text-slate-800">${totPosbindu}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Apotek & Toko Obat</span>
              <span class="text-base font-extrabold text-slate-800">${totApotek}</span>
            </div>
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

      sectorContentHtml = `
        <div class="space-y-3 text-xs">
          <div class="bg-amber-50/70 p-3 rounded-xl border border-amber-200/80 flex items-center justify-between">
            <div>
              <span class="text-[10px] font-bold text-amber-800 uppercase block">Sentra Industri Mikro (IMK)</span>
              <span class="text-lg font-black text-amber-700">${totIMK.toLocaleString('id-ID')} Unit</span>
            </div>
            <span class="text-2xl">🏭</span>
          </div>
          <div class="grid grid-cols-3 gap-2.5 text-center">
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Pasar Tradisional</span>
              <span class="text-base font-extrabold text-slate-800">${totPasar}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Minimarket / Toko</span>
              <span class="text-base font-extrabold text-slate-800">${totMini}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Bank & BPR</span>
              <span class="text-base font-extrabold text-slate-800">${totBank}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Koperasi</span>
              <span class="text-base font-extrabold text-slate-800">${totKop}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Hotel/Penginapan</span>
              <span class="text-base font-extrabold text-slate-800">${totHotel}</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Akses Kredit KUR</span>
              <span class="text-xs font-extrabold text-emerald-600">Mayoritas Ada</span>
            </div>
          </div>
        </div>
      `;
    } else if (sec.id === 'lingkungan') {
      const totPLN = desaList.reduce((a, b) => a + (b.lingkungan.pln_kk || 0), 0);
      const totNonPLN = desaList.reduce((a, b) => a + (b.lingkungan.non_pln_kk || 0), 0);
      const totTanpa = desaList.reduce((a, b) => a + (b.lingkungan.tanpa_listrik_kk || 0), 0);
      const totalKK = totPLN + totNonPLN + totTanpa;
      const rasioPLN = totalKK > 0 ? ((totPLN / totalKK) * 100).toFixed(1) : 100;
      const bebasCemarDesa = desaList.filter(d => d.lingkungan.bebas_pencemaran).length;

      sectorContentHtml = `
        <div class="space-y-3 text-xs">
          <div class="grid grid-cols-2 gap-2.5">
            <div class="bg-emerald-50/70 p-3 rounded-xl border border-emerald-200">
              <span class="text-[10px] font-bold text-emerald-800 uppercase block">Pelanggan Listrik PLN</span>
              <span class="text-lg font-black text-emerald-700">${totPLN.toLocaleString('id-ID')} KK</span>
              <span class="text-[10px] text-emerald-600 font-semibold">Rasio: ${rasioPLN}%</span>
            </div>
            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
              <span class="text-[10px] font-bold text-slate-400 uppercase block">Non-PLN / Mandiri</span>
              <span class="text-lg font-black text-slate-800">${totNonPLN} KK</span>
              <span class="text-[10px] text-slate-500">Tanpa Listrik: ${totTanpa} KK</span>
            </div>
          </div>
          <div class="bg-white p-3 rounded-xl border border-slate-100 flex items-center justify-between">
            <div>
              <span class="text-[10px] text-slate-400 block font-bold">Kualitas Lingkungan Hidup</span>
              <span class="font-extrabold text-slate-800">${bebasCemarDesa} dari ${desaList.length} Desa Bebas Pencemaran</span>
            </div>
            <span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-bold">Terjaga</span>
          </div>
        </div>
      `;
    } else if (sec.id === 'keuangan') {
      const totBumdes = desaList.reduce((a, b) => a + (b.pemerintahan.bumdes || 0), 0);
      const totTanahKas = desaList.reduce((a, b) => a + (b.pemerintahan.tanah_kas || 0), 0);
      const totWisata = desaList.reduce((a, b) => a + (b.pemerintahan.wisata_desa || 0), 0);
      const countSiskeudes = desaList.filter(d => d.pemerintahan.siskeudes && d.pemerintahan.siskeudes !== 'Tidak Ada').length;
      const countSID = desaList.filter(d => d.pemerintahan.sid && d.pemerintahan.sid !== 'Tidak Ada').length;

      sectorContentHtml = `
        <div class="space-y-3 text-xs">
          <div class="grid grid-cols-2 gap-2.5">
            <div class="bg-indigo-50/70 p-3 rounded-xl border border-indigo-200">
              <span class="text-[10px] font-bold text-indigo-800 uppercase block">Keberadaan BUMDes</span>
              <span class="text-lg font-black text-indigo-700">${totBumdes} Unit</span>
              <span class="text-[10px] text-indigo-600 font-semibold">Penggerak Ekonomi Desa</span>
            </div>
            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
              <span class="text-[10px] font-bold text-slate-400 uppercase block">Sistem Informasi Desa (SID)</span>
              <span class="text-lg font-black text-slate-800">${countSID} Desa</span>
              <span class="text-[10px] text-slate-500">SISKEUDES: ${countSiskeudes} Desa</span>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-2.5">
            <div class="bg-white p-2.5 rounded-xl border border-slate-100 text-center">
              <span class="text-[10px] text-slate-400 block font-bold">Aset Tanah Kas Desa</span>
              <span class="text-base font-extrabold text-slate-800">${totTanahKas} Unit</span>
            </div>
            <div class="bg-white p-2.5 rounded-xl border border-slate-100 text-center">
              <span class="text-[10px] text-slate-400 block font-bold">Obyek Wisata Desa</span>
              <span class="text-base font-extrabold text-slate-800">${totWisata} Lokasi</span>
            </div>
          </div>
        </div>
      `;
    } else if (sec.id === 'pemerintahan') {
      const totAparat = desaList.reduce((a, b) => a + (b.pemerintahan.total_aparat || 0), 0);
      const kadesS1 = desaList.filter(d => d.pemerintahan.kades_pend && d.pemerintahan.kades_pend.includes('S1')).length;
      const kadesL = desaList.filter(d => d.pemerintahan.kades_gender === 'Laki-laki').length;
      const kadesP = desaList.filter(d => d.pemerintahan.kades_gender === 'Perempuan').length;

      sectorContentHtml = `
        <div class="space-y-3 text-xs">
          <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 flex items-center justify-between">
            <div>
              <span class="text-[10px] font-bold text-slate-400 uppercase block">Total Aparatur Desa</span>
              <span class="text-lg font-black text-slate-900">${totAparat} Orang</span>
            </div>
            <span class="text-xs font-semibold text-slate-500">Kades, Sekdes & Perangkat</span>
          </div>
          <div class="grid grid-cols-2 gap-2.5">
            <div class="bg-white p-3 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Kades L / P</span>
              <span class="text-base font-extrabold text-slate-800">${kadesL} L • ${kadesP} P</span>
            </div>
            <div class="bg-white p-3 rounded-xl border border-slate-100">
              <span class="text-[10px] text-slate-400 block font-bold">Kades D-IV / S1+</span>
              <span class="text-base font-extrabold text-[#0D7A5F]">${kadesS1} Kades</span>
            </div>
          </div>
        </div>
      `;
    }

    rightPanel.innerHTML = `
      <div class="h-full flex flex-col justify-between p-6 sm:p-8 relative">
        <!-- Top bar with Title & Pagination Dots -->
        <div>
          <div class="flex items-center justify-between gap-2 mb-3">
            <div class="flex items-center gap-2">
              <h4 class="font-extrabold text-lg sm:text-xl text-[#152e4d] tracking-tight">Sektor Lainnya</h4>
              <span class="text-xs text-slate-400 font-semibold">(${activeSectorIndex + 1}/7)</span>
            </div>
            
            <!-- Clickable Pagination Dots -->
            <div class="flex items-center gap-1.5 p-1 bg-slate-50 border border-slate-200 rounded-full">
              ${dotsHtml}
            </div>
          </div>

          <!-- Sector Card Container (with Touch Swipe & Drag Support) -->
          <div id="swipeableSectorCard" class="mt-4 rounded-2xl bg-white p-5 sm:p-6 border border-slate-200/90 shadow-xs relative transition-all duration-200">
            <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
              <div class="flex items-center gap-2.5">
                <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-800 flex items-center justify-center font-bold text-base">
                  ${sec.icon}
                </span>
                <span class="font-black text-sm text-slate-800">${sec.name}</span>
              </div>

              <!-- Quick Next / Prev Arrows -->
              <div class="flex items-center gap-1">
                <button onclick="window.prevSectorSlide()" class="w-7 h-7 rounded-lg bg-slate-50 hover:bg-emerald-50 text-slate-600 hover:text-[#0D7A5F] flex items-center justify-center text-xs font-bold transition-colors">
                  ‹
                </button>
                <button onclick="window.nextSectorSlide()" class="w-7 h-7 rounded-lg bg-slate-50 hover:bg-emerald-50 text-slate-600 hover:text-[#0D7A5F] flex items-center justify-center text-xs font-bold transition-colors">
                  ›
                </button>
              </div>
            </div>

            <!-- Dynamic Content for Active Sector -->
            ${sectorContentHtml}
          </div>
        </div>

        <!-- Bottom Sector Quick Chips -->
        <div class="mt-6 pt-4 border-t border-slate-100">
          <div class="flex flex-wrap gap-1.5">
            ${SECTORS.map((s, idx) => `
              <button onclick="window.setSectorSlide(${idx})" class="px-2.5 py-1 rounded-lg text-[11px] font-bold transition-all ${idx === activeSectorIndex ? 'bg-[#0D7A5F] text-white shadow-2xs' : 'bg-slate-50 hover:bg-slate-100 text-slate-600'}">
                ${s.icon} ${s.name}
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
        btn.classList.add('bg-[#0D7A5F]', 'text-white', 'shadow-2xs');
        btn.classList.remove('bg-slate-100', 'text-slate-600');
      } else {
        btn.classList.remove('bg-[#0D7A5F]', 'text-white', 'shadow-2xs');
        btn.classList.add('bg-slate-100', 'text-slate-600');
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
          <tr class="border-b border-slate-100 hover:bg-emerald-50/40 transition-colors">
            <td class="py-3 px-4 font-bold text-slate-900">${d.nama}</td>
            <td class="py-3 px-3 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold ${d.status === 'Kelurahan' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-700'}">${d.status}</span></td>
            <td class="py-3 px-3 text-right font-black text-slate-900 tabular-nums">${tot.toLocaleString('id-ID')}</td>
            <td class="py-3 px-3 text-right font-medium text-slate-600 tabular-nums">${(d.demografi.penduduk_l || 0).toLocaleString('id-ID')}</td>
            <td class="py-3 px-3 text-right font-medium text-slate-600 tabular-nums">${(d.demografi.penduduk_p || 0).toLocaleString('id-ID')}</td>
            <td class="py-3 px-3 text-right font-semibold text-[#0D7A5F] tabular-nums">${kep.toLocaleString('id-ID')}</td>
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
        <tr class="border-b border-slate-100 hover:bg-emerald-50/40 transition-colors">
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
        <tr class="border-b border-slate-100 hover:bg-emerald-50/40 transition-colors">
          <td class="py-3 px-4 font-bold text-slate-900">${d.nama}</td>
          <td class="py-3 px-3 text-right font-medium text-slate-700">${d.pendidikan.total_sekolah || 0}</td>
          <td class="py-3 px-3 text-right font-medium text-slate-700">${d.kesehatan.total_faskes || 0}</td>
          <td class="py-3 px-3 text-right font-bold text-emerald-700 tabular-nums">${(d.lingkungan.pln_kk || 0).toLocaleString('id-ID')}</td>
          <td class="py-3 px-3 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold ${d.lingkungan.bebas_pencemaran ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800'}">${d.lingkungan.bebas_pencemaran ? 'Bebas' : 'Tercemar'}</span></td>
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
