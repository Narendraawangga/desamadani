/**
 * PODES 2025 COMPLETE DATA EXPLORER - KABUPATEN KOLAKA UTARA
 * Minimalist, Elegant, Clean Look • 100% Data Fidelity across 15 Kecamatan & 133 Desa
 */
(function() {
  let masterData = null;
  let currentTab = 'demografi';
  let selectedKecamatan = 'ALL';
  let searchQuery = '';
  let activeCharts = {};

  function initExplorer() {
    masterData = window.PODES_KOLUT_MASTER_2025;
    if (!masterData) {
      console.warn("PODES master data not yet loaded, retrying...");
      setTimeout(initExplorer, 150);
      return;
    }

    populateFilterDropdowns();
    setupTabHandlers();
    setupSearchHandler();
    renderCurrentTab();
  }

  function populateFilterDropdowns() {
    const kecSelect = document.getElementById('explorerFilterKecamatan');
    if (!kecSelect) return;

    kecSelect.innerHTML = '<option value="ALL">Semua Kecamatan (15 Wilayah)</option>' +
      Object.keys(masterData.kecamatan).map(kName => {
        const k = masterData.kecamatan[kName];
        return `<option value="${kName}">Kec. ${k.nama} (${k.total_desa} Desa)</option>`;
      }).join('');

    kecSelect.addEventListener('change', (e) => {
      selectedKecamatan = e.target.value;
      renderCurrentTab();
      // Sync with Presisi map if available
      if (window.PresisiEngine && typeof window.PresisiEngine.onKecamatanChange === 'function') {
        const targetKecName = selectedKecamatan === 'ALL' ? 'ALL' : masterData.kecamatan[selectedKecamatan].nama;
        window.PresisiEngine.onKecamatanChange(targetKecName);
      }
    });
  }

  function setupTabHandlers() {
    const tabButtons = document.querySelectorAll('.btn-podes-tab');
    tabButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        const tab = btn.getAttribute('data-tab');
        if (tab) {
          currentTab = tab;
          tabButtons.forEach(b => {
            b.classList.remove('active', 'bg-[#0D6E5B]', 'text-white', 'shadow-sm');
            b.classList.add('text-slate-600', 'hover:bg-slate-100', 'bg-white');
          });
          btn.classList.add('active', 'bg-[#0D6E5B]', 'text-white', 'shadow-sm');
          btn.classList.remove('text-slate-600', 'hover:bg-slate-100', 'bg-white');
          renderCurrentTab();
        }
      });
    });
  }

  function setupSearchHandler() {
    const searchInput = document.getElementById('explorerSearchInput');
    if (searchInput) {
      searchInput.addEventListener('input', (e) => {
        searchQuery = (e.target.value || '').trim().toLowerCase();
        renderTableData();
      });
    }

    const btnExport = document.getElementById('btnExplorerExportCSV');
    if (btnExport) {
      btnExport.addEventListener('click', exportActiveTableCSV);
    }
  }

  function filterVillages() {
    if (!masterData || !masterData.desa) return [];
    return masterData.desa.filter(d => {
      // Kecamatan filter
      if (selectedKecamatan !== 'ALL') {
        const matchKec = d.kecamatan.toUpperCase() === selectedKecamatan.toUpperCase();
        if (!matchKec) return false;
      }
      // Search filter
      if (searchQuery) {
        const nameMatch = d.nama.toLowerCase().includes(searchQuery);
        const kecMatch = d.kecamatan.toLowerCase().includes(searchQuery);
        const subMatch = (d.ekonomi.subsektor || '').toLowerCase().includes(searchQuery);
        const komMatch = (d.ekonomi.komoditas || '').toLowerCase().includes(searchQuery);
        if (!nameMatch && !kecMatch && !subMatch && !komMatch) return false;
      }
      return true;
    });
  }

  function renderCurrentTab() {
    renderMetricSummary();
    renderCharts();
    renderTableData();
  }

  function renderMetricSummary() {
    const summaryContainer = document.getElementById('explorerMetricSummary');
    if (!summaryContainer || !masterData) return;

    const filteredDesa = filterVillages();
    const countDesa = filteredDesa.length;
    const kab = masterData.kabupaten;

    let cardsHtml = '';

    if (currentTab === 'demografi') {
      const totJiwa = filteredDesa.reduce((acc, d) => acc + (d.demografi.penduduk_total || 0), 0);
      const totL = filteredDesa.reduce((acc, d) => acc + (d.demografi.penduduk_l || 0), 0);
      const totP = filteredDesa.reduce((acc, d) => acc + (d.demografi.penduduk_p || 0), 0);
      const avgKepadatan = countDesa ? (filteredDesa.reduce((acc, d) => acc + (d.demografi.kepadatan_km2 || 0), 0) / countDesa).toFixed(1) : 0;
      const sexRatio = totP ? ((totL / totP) * 100).toFixed(1) : 100;

      cardsHtml = `
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Total Penduduk</div>
          <div class="text-xl sm:text-2xl font-black text-slate-900 mt-1">${totJiwa.toLocaleString('id-ID')} <span class="text-xs font-semibold text-slate-500">Jiwa</span></div>
          <div class="text-[11px] text-slate-500 mt-1">L: ${totL.toLocaleString('id-ID')} • P: ${totP.toLocaleString('id-ID')}</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Rata-Rata Kepadatan</div>
          <div class="text-xl sm:text-2xl font-black text-[#0D6E5B] mt-1">${avgKepadatan} <span class="text-xs font-semibold text-slate-500">Jiwa / km²</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Cakupan ${countDesa} Desa / Kelurahan</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Rasio Jenis Kelamin</div>
          <div class="text-xl sm:text-2xl font-black text-blue-600 mt-1">${sexRatio}</div>
          <div class="text-[11px] text-slate-500 mt-1">Laki-laki per 100 Perempuan</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Wilayah Terpantau</div>
          <div class="text-xl sm:text-2xl font-black text-slate-900 mt-1">${countDesa} <span class="text-xs font-semibold text-slate-500">Desa/Kel</span></div>
          <div class="text-[11px] text-slate-500 mt-1">${selectedKecamatan === 'ALL' ? '15 Kecamatan Lengkap' : 'Kecamatan ' + masterData.kecamatan[selectedKecamatan].nama}</div>
        </div>
      `;
    } else if (currentTab === 'ekonomi') {
      const totIMK = filteredDesa.reduce((acc, d) => acc + (d.ekonomi.imk || 0), 0);
      const totPasar = filteredDesa.reduce((acc, d) => acc + (d.ekonomi.pasar_perm + d.ekonomi.pasar_semi + d.ekonomi.pasar_tanpa), 0);
      const totMinimarket = filteredDesa.reduce((acc, d) => acc + (d.ekonomi.minimarket || 0), 0);
      const totBank = filteredDesa.reduce((acc, d) => acc + (d.ekonomi.bank_gov + d.ekonomi.bank_swasta + d.ekonomi.bpr), 0);
      const desaKur = filteredDesa.filter(d => d.ekonomi.kur === 'Ada').length;

      cardsHtml = `
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Industri Mikro & Kecil</div>
          <div class="text-xl sm:text-2xl font-black text-amber-600 mt-1">${totIMK.toLocaleString('id-ID')} <span class="text-xs font-semibold text-slate-500">Unit</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Sentra Pengolahan & Usaha Rakyat</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Pasar & Perdagangan</div>
          <div class="text-xl sm:text-2xl font-black text-slate-900 mt-1">${totPasar} <span class="text-xs font-semibold text-slate-500">Pasar</span> • ${totMinimarket} <span class="text-xs font-semibold text-slate-500">Mart</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Pusat Transaksi Ekonomi Warga</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Lembaga Keuangan</div>
          <div class="text-xl sm:text-2xl font-black text-[#0D6E5B] mt-1">${totBank} <span class="text-xs font-semibold text-slate-500">Bank</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Bank Pemerintah, Swasta & BPR</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Akses Kredit KUR</div>
          <div class="text-xl sm:text-2xl font-black text-emerald-600 mt-1">${desaKur} <span class="text-xs font-semibold text-slate-500">Desa</span></div>
          <div class="text-[11px] text-slate-500 mt-1">${((desaKur / (countDesa || 1)) * 100).toFixed(1)}% Wilayah Terfasilitasi</div>
        </div>
      `;
    } else if (currentTab === 'pendidikan') {
      const totTK = filteredDesa.reduce((acc, d) => acc + (d.pendidikan.tk || 0), 0);
      const totSD = filteredDesa.reduce((acc, d) => acc + (d.pendidikan.sd_mi_tot || 0), 0);
      const totSMP = filteredDesa.reduce((acc, d) => acc + (d.pendidikan.smp_mts_tot || 0), 0);
      const totSMA = filteredDesa.reduce((acc, d) => acc + (d.pendidikan.sma_ma_tot + d.pendidikan.smk_tot || 0), 0);
      const totPT = filteredDesa.reduce((acc, d) => acc + (d.pendidikan.pt_tot || 0), 0);
      const totAll = totTK + totSD + totSMP + totSMA + totPT;

      cardsHtml = `
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Total Sarana Pendidikan</div>
          <div class="text-xl sm:text-2xl font-black text-slate-900 mt-1">${totAll} <span class="text-xs font-semibold text-slate-500">Satuan</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Jenjang PAUD hingga Perguruan Tinggi</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Pendidikan Dasar (SD/MI)</div>
          <div class="text-xl sm:text-2xl font-black text-blue-600 mt-1">${totSD} <span class="text-xs font-semibold text-slate-500">Sekolah</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Tersebar merata di seluruh desa</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Menengah (SMP & SMA/SMK)</div>
          <div class="text-xl sm:text-2xl font-black text-[#0D6E5B] mt-1">${totSMP + totSMA} <span class="text-xs font-semibold text-slate-500">Sekolah</span></div>
          <div class="text-[11px] text-slate-500 mt-1">SMP/MTs: ${totSMP} • SMA/SMK/MA: ${totSMA}</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">PAUD & PT</div>
          <div class="text-xl sm:text-2xl font-black text-indigo-600 mt-1">${totTK} <span class="text-xs font-semibold text-slate-500">TK</span> • ${totPT} <span class="text-xs font-semibold text-slate-500">PT</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Pondasi Dini & Pendidikan Tinggi</div>
        </div>
      `;
    } else if (currentTab === 'kesehatan') {
      const totRS = filteredDesa.reduce((acc, d) => acc + (d.kesehatan.rs || 0), 0);
      const totPuskesmas = filteredDesa.reduce((acc, d) => acc + (d.kesehatan.puskesmas_tot || 0), 0);
      const totPustu = filteredDesa.reduce((acc, d) => acc + (d.kesehatan.pustu || 0), 0);
      const totPoskesPolin = filteredDesa.reduce((acc, d) => acc + (d.kesehatan.poskesdes + d.kesehatan.polindes), 0);
      const totApotek = filteredDesa.reduce((acc, d) => acc + (d.kesehatan.apotek + d.kesehatan.toko_obat), 0);
      const totPosyandu = filteredDesa.reduce((acc, d) => acc + (d.kesehatan.posyandu_aktif || 0), 0);

      cardsHtml = `
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Puskesmas & Rumah Sakit</div>
          <div class="text-xl sm:text-2xl font-black text-rose-600 mt-1">${totRS + totPuskesmas} <span class="text-xs font-semibold text-slate-500">Unit</span></div>
          <div class="text-[11px] text-slate-500 mt-1">1 RSUD • 9 Inap • 7 Non-Inap</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Pustu, Poskesdes & Polindes</div>
          <div class="text-xl sm:text-2xl font-black text-[#0D6E5B] mt-1">${totPustu + totPoskesPolin} <span class="text-xs font-semibold text-slate-500">Pos</span></div>
          <div class="text-[11px] text-slate-500 mt-1">${totPustu} Pustu • ${totPoskesPolin} Poskesdes/Polindes</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Apotek & Toko Obat</div>
          <div class="text-xl sm:text-2xl font-black text-slate-900 mt-1">${totApotek} <span class="text-xs font-semibold text-slate-500">Gerai</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Akses Farmasi & Obat Masyarakat</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Posyandu Aktif Bulanan</div>
          <div class="text-xl sm:text-2xl font-black text-emerald-600 mt-1">${totPosyandu} <span class="text-xs font-semibold text-slate-500">Posyandu</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Pelayanan Rutin Ibu, Bayi & Lansia</div>
        </div>
      `;
    } else if (currentTab === 'lingkungan') {
      const totPln = filteredDesa.reduce((acc, d) => acc + (d.lingkungan.pln_kk || 0), 0);
      const totNonPln = filteredDesa.reduce((acc, d) => acc + (d.lingkungan.non_pln_kk || 0), 0);
      const totBukanListrik = filteredDesa.reduce((acc, d) => acc + (d.lingkungan.tanpa_listrik_kk || 0), 0);
      const totKK = totPln + totNonPln + totBukanListrik;
      const pctPln = totKK ? ((totPln / totKK) * 100).toFixed(1) : 0;
      const desaLaut = filteredDesa.filter(d => d.lingkungan.lokasi_laut !== 'Tidak Ada').length;
      const desaBebasCemar = filteredDesa.filter(d => d.lingkungan.bebas_pencemaran).length;

      cardsHtml = `
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Elektrifikasi Listrik PLN</div>
          <div class="text-xl sm:text-2xl font-black text-amber-500 mt-1">${totPln.toLocaleString('id-ID')} <span class="text-xs font-semibold text-slate-500">KK (${pctPln}%)</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Non-PLN: ${totNonPln} • Tanpa Listrik: ${totBukanListrik}</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Desa Pesisir & Laut</div>
          <div class="text-xl sm:text-2xl font-black text-cyan-600 mt-1">${desaSektorLaut(filteredDesa)} <span class="text-xs font-semibold text-slate-500">Desa Pesisir</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Potensi Perikanan Tangkap & Budidaya</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Bebas Pencemaran</div>
          <div class="text-xl sm:text-2xl font-black text-[#0D6E5B] mt-1">${desaBebasCemar} <span class="text-xs font-semibold text-slate-500">Desa</span></div>
          <div class="text-[11px] text-slate-500 mt-1">${((desaBebasCemar / (countDesa || 1)) * 100).toFixed(1)}% Kualitas Lingkungan Terjaga</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Mitigasi & Pupuk Organik</div>
          <div class="text-xl sm:text-2xl font-black text-emerald-600 mt-1">${desaOrganik(filteredDesa)} <span class="text-xs font-semibold text-slate-500">Desa</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Penggalakan Pertanian Berkelanjutan</div>
        </div>
      `;
    } else if (currentTab === 'pemerintahan') {
      const totAparat = filteredDesa.reduce((acc, d) => acc + (d.pemerintahan.total_aparat || 0), 0);
      const totBumdes = filteredDesa.reduce((acc, d) => acc + (d.pemerintahan.bumdes || 0), 0);
      const totTanahKas = filteredDesa.reduce((acc, d) => acc + (d.pemerintahan.tanah_kas || 0), 0);
      const totPerdes = filteredDesa.filter(d => d.pemerintahan.perdes === 'Ada').length;
      const totSiskeudes = filteredDesa.filter(d => d.pemerintahan.siskeudes === 'Diperbaharui').length;

      cardsHtml = `
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Total Aparat Pemerintah</div>
          <div class="text-xl sm:text-2xl font-black text-slate-900 mt-1">${totAparat.toLocaleString('id-ID')} <span class="text-xs font-semibold text-slate-500">Orang</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Kades, Sekdes, Kadus & Kasi/Kaur</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Kelembagaan BUMDes</div>
          <div class="text-xl sm:text-2xl font-black text-[#0D6E5B] mt-1">${totBumdes} <span class="text-xs font-semibold text-slate-500">Unit</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Penggerak Ekonomi Otonom Desa</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Aset Tanah Kas Desa</div>
          <div class="text-xl sm:text-2xl font-black text-purple-600 mt-1">${totTanahKas} <span class="text-xs font-semibold text-slate-500">Desa</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Kepemilikan Aset Produktif Wilayah</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200/90 p-3.5 shadow-2xs">
          <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Regulasi & Siskeudes</div>
          <div class="text-xl sm:text-2xl font-black text-emerald-600 mt-1">${totPerdes} <span class="text-xs font-semibold text-slate-500">Perdes</span> • ${totSiskeudes} <span class="text-xs font-semibold text-slate-500">Sis</span></div>
          <div class="text-[11px] text-slate-500 mt-1">Akuntabilitas Finansial & Hukum Desa</div>
        </div>
      `;
    }

    summaryContainer.innerHTML = cardsHtml;
  }

  function desaSektorLaut(desaArr) {
    return desaArr.filter(d => d.lingkungan.lokasi_laut && d.lingkungan.lokasi_laut.toLowerCase().includes('ada')).length;
  }

  function desaOrganik(desaArr) {
    return desaArr.filter(d => d.lingkungan.pupuk_organik && d.lingkungan.pupuk_organik.toLowerCase().includes('ada')).length;
  }

  function renderCharts() {
    const chartContainer = document.getElementById('explorerChartContainer');
    if (!chartContainer || !masterData) return;

    // Destroy existing Chart.js instances
    Object.keys(activeCharts).forEach(key => {
      if (activeCharts[key]) {
        try { activeCharts[key].destroy(); } catch(e) {}
      }
    });
    activeCharts = {};

    if (currentTab === 'demografi') {
      chartContainer.innerHTML = `
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
          <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 p-4 shadow-2xs">
            <div class="flex items-center justify-between pb-2 mb-3 border-b border-slate-100">
              <span class="text-xs font-extrabold text-slate-900">Perbandingan Populasi 15 Kecamatan</span>
              <span class="text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">TABEL 2.1</span>
            </div>
            <div class="h-64 sm:h-72"><canvas id="chartDemografiKec"></canvas></div>
          </div>
          <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 p-4 shadow-2xs">
            <div class="flex items-center justify-between pb-2 mb-3 border-b border-slate-100">
              <span class="text-xs font-extrabold text-slate-900">Piramida Kelompok Umur (${selectedKecamatan === 'ALL' ? 'Kec. Ranteangin' : 'Kec. ' + masterData.kecamatan[selectedKecamatan].nama})</span>
              <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full">TABEL 2.2</span>
            </div>
            <div class="h-64 sm:h-72"><canvas id="chartPiramidaUmur"></canvas></div>
          </div>
        </div>
      `;

      // Chart 1: Bar Chart Populasi per Kecamatan
      const kecLabels = Object.keys(masterData.kecamatan).map(k => masterData.kecamatan[k].nama);
      const kecValues = Object.keys(masterData.kecamatan).map(k => masterData.kecamatan[k].penduduk_total);

      const ctx1 = document.getElementById('chartDemografiKec');
      if (ctx1 && typeof Chart !== 'undefined') {
        activeCharts['c1'] = new Chart(ctx1, {
          type: 'bar',
          data: {
            labels: kecLabels,
            datasets: [{
              label: 'Total Jiwa',
              data: kecValues,
              backgroundColor: '#0D6E5B',
              borderRadius: 6
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
              x: { ticks: { font: { size: 10 }, maxRotation: 45 } },
              y: { ticks: { font: { size: 10 } } }
            }
          }
        });
      }

      // Chart 2: Piramida Umur
      const targetKecKey = selectedKecamatan === 'ALL' ? 'RANTEANGIN' : selectedKecamatan;
      const pyramidData = masterData.kecamatan[targetKecKey]?.piramida_umur || [];
      const ageLabels = pyramidData.map(d => d.kelompok_umur);
      const lData = pyramidData.map(d => d.laki_laki);
      const pData = pyramidData.map(d => d.perempuan);

      const ctx2 = document.getElementById('chartPiramidaUmur');
      if (ctx2 && typeof Chart !== 'undefined') {
        activeCharts['c2'] = new Chart(ctx2, {
          type: 'bar',
          data: {
            labels: ageLabels,
            datasets: [
              { label: 'Laki-Laki', data: lData, backgroundColor: '#0284c7', borderRadius: 4 },
              { label: 'Perempuan', data: pData, backgroundColor: '#ec4899', borderRadius: 4 }
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'top', labels: { boxWidth: 10, font: { size: 10 } } } },
            scales: {
              x: { ticks: { font: { size: 9 }, maxRotation: 45 } },
              y: { ticks: { font: { size: 10 } } }
            }
          }
        });
      }
    } else if (currentTab === 'ekonomi') {
      chartContainer.innerHTML = `
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
          <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 p-4 shadow-2xs">
            <div class="flex items-center justify-between pb-2 mb-3 border-b border-slate-100">
              <span class="text-xs font-extrabold text-slate-900">Persebaran Industri Mikro & Kecil (IMK: 3.622 Unit)</span>
              <span class="text-[10px] font-bold bg-amber-50 text-amber-700 px-2 py-0.5 rounded-full">TABEL 5.6</span>
            </div>
            <div class="h-64 sm:h-72"><canvas id="chartIMKKec"></canvas></div>
          </div>
          <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 p-4 shadow-2xs">
            <div class="flex items-center justify-between pb-2 mb-3 border-b border-slate-100">
              <span class="text-xs font-extrabold text-slate-900">Komposisi Sarana Perdagangan Wilayah</span>
              <span class="text-[10px] font-bold bg-slate-100 text-slate-700 px-2 py-0.5 rounded-full">TABEL 5.1 & 5.2</span>
            </div>
            <div class="h-64 sm:h-72"><canvas id="chartPerdagangan"></canvas></div>
          </div>
        </div>
      `;

      const kecLabels = Object.keys(masterData.kecamatan).map(k => masterData.kecamatan[k].nama);
      const kecIMK = Object.keys(masterData.kecamatan).map(k => masterData.kecamatan[k].imk);

      const ctx1 = document.getElementById('chartIMKKec');
      if (ctx1 && typeof Chart !== 'undefined') {
        activeCharts['c1'] = new Chart(ctx1, {
          type: 'bar',
          data: {
            labels: kecLabels,
            datasets: [{ label: 'IMK (Unit)', data: kecIMK, backgroundColor: '#d97706', borderRadius: 6 }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { x: { ticks: { font: { size: 10 }, maxRotation: 45 } } }
          }
        });
      }

      const fDesa = filterVillages();
      const pPerm = fDesa.reduce((a, b) => a + (b.ekonomi.pasar_perm || 0), 0);
      const pSemi = fDesa.reduce((a, b) => a + (b.ekonomi.pasar_semi || 0), 0);
      const mart = fDesa.reduce((a, b) => a + (b.ekonomi.minimarket || 0), 0);
      const resto = fDesa.reduce((a, b) => a + (b.ekonomi.resto || 0), 0);
      const hotel = fDesa.reduce((a, b) => a + (b.ekonomi.hotel + b.ekonomi.penginapan), 0);

      const ctx2 = document.getElementById('chartPerdagangan');
      if (ctx2 && typeof Chart !== 'undefined') {
        activeCharts['c2'] = new Chart(ctx2, {
          type: 'doughnut',
          data: {
            labels: ['Pasar Permanen', 'Pasar Semi', 'Minimarket', 'Restoran', 'Penginapan/Hotel'],
            datasets: [{
              data: [pPerm, pSemi, mart, resto, hotel],
              backgroundColor: ['#047857', '#10b981', '#0ea5e9', '#f59e0b', '#8b5cf6']
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'right', labels: { boxWidth: 10, font: { size: 10 } } } }
          }
        });
      }
    } else {
      chartContainer.innerHTML = ''; // Keep clean and fast for other tabs
    }
  }

  function renderTableData() {
    const tableContainer = document.getElementById('explorerTableContainer');
    if (!tableContainer || !masterData) return;

    const filtered = filterVillages();
    const countBadge = document.getElementById('explorerRowCountBadge');
    if (countBadge) {
      countBadge.textContent = `Menampilkan ${filtered.length} dari 133 Desa/Kelurahan`;
    }

    let theadHtml = '';
    let tbodyRows = '';

    if (currentTab === 'demografi') {
      theadHtml = `
        <tr class="bg-slate-50 text-[11px] font-bold text-slate-700 uppercase tracking-wider border-b border-slate-200">
          <th class="py-2.5 px-3 text-center w-12">No</th>
          <th class="py-2.5 px-3 text-left">Desa / Kelurahan</th>
          <th class="py-2.5 px-3 text-left">Kecamatan</th>
          <th class="py-2.5 px-3 text-center">Status</th>
          <th class="py-2.5 px-3 text-right">Laki-Laki</th>
          <th class="py-2.5 px-3 text-right">Perempuan</th>
          <th class="py-2.5 px-3 text-right">Total Jiwa</th>
          <th class="py-2.5 px-3 text-right">Distribusi (%)</th>
          <th class="py-2.5 px-3 text-right">Kepadatan (km²)</th>
          <th class="py-2.5 px-3 text-right">Sex Ratio</th>
          <th class="py-2.5 px-3 text-center">Aksi</th>
        </tr>
      `;
      tbodyRows = filtered.map((d, idx) => `
        <tr class="border-b border-slate-100 hover:bg-emerald-50/40 transition-colors text-xs text-slate-800">
          <td class="py-2.5 px-3 text-center font-mono text-slate-500">${idx + 1}</td>
          <td class="py-2.5 px-3 font-bold text-slate-900">${d.nama}</td>
          <td class="py-2.5 px-3 text-slate-600">${d.kecamatan}</td>
          <td class="py-2.5 px-3 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold ${d.status === 'Kelurahan' ? 'bg-indigo-50 text-indigo-700' : 'bg-emerald-50 text-emerald-700'}">${d.status}</span></td>
          <td class="py-2.5 px-3 text-right font-mono">${(d.demografi.penduduk_l || 0).toLocaleString('id-ID')}</td>
          <td class="py-2.5 px-3 text-right font-mono">${(d.demografi.penduduk_p || 0).toLocaleString('id-ID')}</td>
          <td class="py-2.5 px-3 text-right font-mono font-bold text-slate-900">${(d.demografi.penduduk_total || 0).toLocaleString('id-ID')}</td>
          <td class="py-2.5 px-3 text-right font-mono text-slate-600">${d.demografi.distribusi_persen}%</td>
          <td class="py-2.5 px-3 text-right font-mono text-slate-600">${d.demografi.kepadatan_km2}</td>
          <td class="py-2.5 px-3 text-right font-mono text-blue-600 font-bold">${d.demografi.sex_ratio}</td>
          <td class="py-2.5 px-3 text-center">
            <button type="button" onclick="window.focusDesaFromExplorer('${d.kecamatan}', '${d.nama}')" class="px-2 py-1 rounded bg-[#0D6E5B] text-white hover:bg-[#095244] text-[10px] font-bold cursor-pointer transition">Peta</button>
          </td>
        </tr>
      `).join('');
    } else if (currentTab === 'ekonomi') {
      theadHtml = `
        <tr class="bg-slate-50 text-[11px] font-bold text-slate-700 uppercase tracking-wider border-b border-slate-200">
          <th class="py-2.5 px-3 text-center w-12">No</th>
          <th class="py-2.5 px-3 text-left">Desa / Kelurahan</th>
          <th class="py-2.5 px-3 text-left">Kecamatan</th>
          <th class="py-2.5 px-3 text-right">IMK</th>
          <th class="py-2.5 px-3 text-left">Subsektor Utama</th>
          <th class="py-2.5 px-3 text-left">Komoditas Utama</th>
          <th class="py-2.5 px-3 text-left">Penghasilan</th>
          <th class="py-2.5 px-3 text-center">Pasar</th>
          <th class="py-2.5 px-3 text-center">Mart</th>
          <th class="py-2.5 px-3 text-center">Bank/KSP</th>
          <th class="py-2.5 px-3 text-center">KUR</th>
          <th class="py-2.5 px-3 text-left">Produk Unggulan</th>
          <th class="py-2.5 px-3 text-center">Aksi</th>
        </tr>
      `;
      tbodyRows = filtered.map((d, idx) => `
        <tr class="border-b border-slate-100 hover:bg-emerald-50/40 transition-colors text-xs text-slate-800">
          <td class="py-2.5 px-3 text-center font-mono text-slate-500">${idx + 1}</td>
          <td class="py-2.5 px-3 font-bold text-slate-900">${d.nama}</td>
          <td class="py-2.5 px-3 text-slate-600">${d.kecamatan}</td>
          <td class="py-2.5 px-3 text-right font-mono font-bold text-amber-700">${d.ekonomi.imk}</td>
          <td class="py-2.5 px-3 text-slate-700 text-[11px]">${d.ekonomi.subsektor}</td>
          <td class="py-2.5 px-3 font-bold text-[#0D6E5B] text-[11px]">${d.ekonomi.komoditas}</td>
          <td class="py-2.5 px-3 text-slate-600 text-[11px]">${d.ekonomi.penghasilan_utama}</td>
          <td class="py-2.5 px-3 text-center font-mono">${(d.ekonomi.pasar_perm + d.ekonomi.pasar_semi + d.ekonomi.pasar_tanpa) || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.ekonomi.minimarket || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${(d.ekonomi.bank_gov + d.ekonomi.bpr + d.ekonomi.ksp) || '-'}</td>
          <td class="py-2.5 px-3 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold ${d.ekonomi.kur === 'Ada' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-400'}">${d.ekonomi.kur}</span></td>
          <td class="py-2.5 px-3 text-slate-600 text-[11px] truncate max-w-[140px]" title="${d.ekonomi.prod_unggulan_makanan}">${d.ekonomi.prod_unggulan_makanan}</td>
          <td class="py-2.5 px-3 text-center">
            <button type="button" onclick="window.focusDesaFromExplorer('${d.kecamatan}', '${d.nama}')" class="px-2 py-1 rounded bg-[#0D6E5B] text-white hover:bg-[#095244] text-[10px] font-bold cursor-pointer transition">Peta</button>
          </td>
        </tr>
      `).join('');
    } else if (currentTab === 'pendidikan') {
      theadHtml = `
        <tr class="bg-slate-50 text-[11px] font-bold text-slate-700 uppercase tracking-wider border-b border-slate-200">
          <th class="py-2.5 px-3 text-center w-12">No</th>
          <th class="py-2.5 px-3 text-left">Desa / Kelurahan</th>
          <th class="py-2.5 px-3 text-left">Kecamatan</th>
          <th class="py-2.5 px-3 text-center">TK/PAUD</th>
          <th class="py-2.5 px-3 text-center">SD Neg</th>
          <th class="py-2.5 px-3 text-center">SD Swas</th>
          <th class="py-2.5 px-3 text-center">MI</th>
          <th class="py-2.5 px-3 text-center">SMP</th>
          <th class="py-2.5 px-3 text-center">MTs</th>
          <th class="py-2.5 px-3 text-center">SMA/MA</th>
          <th class="py-2.5 px-3 text-center">SMK</th>
          <th class="py-2.5 px-3 text-right">Total Sekolah</th>
          <th class="py-2.5 px-3 text-center">Aksi</th>
        </tr>
      `;
      tbodyRows = filtered.map((d, idx) => `
        <tr class="border-b border-slate-100 hover:bg-emerald-50/40 transition-colors text-xs text-slate-800">
          <td class="py-2.5 px-3 text-center font-mono text-slate-500">${idx + 1}</td>
          <td class="py-2.5 px-3 font-bold text-slate-900">${d.nama}</td>
          <td class="py-2.5 px-3 text-slate-600">${d.kecamatan}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.pendidikan.tk || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.pendidikan.sd_neg || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.pendidikan.sd_swas || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${(d.pendidikan.mi_neg + d.pendidikan.mi_swas) || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.pendidikan.smp_neg || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${(d.pendidikan.mts_neg + d.pendidikan.mts_swas) || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.pendidikan.sma_ma_tot || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.pendidikan.smk_tot || '-'}</td>
          <td class="py-2.5 px-3 text-right font-mono font-bold text-blue-600">${d.pendidikan.total_sekolah}</td>
          <td class="py-2.5 px-3 text-center">
            <button type="button" onclick="window.focusDesaFromExplorer('${d.kecamatan}', '${d.nama}')" class="px-2 py-1 rounded bg-[#0D6E5B] text-white hover:bg-[#095244] text-[10px] font-bold cursor-pointer transition">Peta</button>
          </td>
        </tr>
      `).join('');
    } else if (currentTab === 'kesehatan') {
      theadHtml = `
        <tr class="bg-slate-50 text-[11px] font-bold text-slate-700 uppercase tracking-wider border-b border-slate-200">
          <th class="py-2.5 px-3 text-center w-12">No</th>
          <th class="py-2.5 px-3 text-left">Desa / Kelurahan</th>
          <th class="py-2.5 px-3 text-left">Kecamatan</th>
          <th class="py-2.5 px-3 text-center">RS / Puskesmas</th>
          <th class="py-2.5 px-3 text-center">Pustu</th>
          <th class="py-2.5 px-3 text-center">Klinik/Dokter</th>
          <th class="py-2.5 px-3 text-center">Poskesdes</th>
          <th class="py-2.5 px-3 text-center">Polindes</th>
          <th class="py-2.5 px-3 text-center">Apotek</th>
          <th class="py-2.5 px-3 text-center">Posyandu</th>
          <th class="py-2.5 px-3 text-right">Total Faskes</th>
          <th class="py-2.5 px-3 text-center">Aksi</th>
        </tr>
      `;
      tbodyRows = filtered.map((d, idx) => `
        <tr class="border-b border-slate-100 hover:bg-emerald-50/40 transition-colors text-xs text-slate-800">
          <td class="py-2.5 px-3 text-center font-mono text-slate-500">${idx + 1}</td>
          <td class="py-2.5 px-3 font-bold text-slate-900">${d.nama}</td>
          <td class="py-2.5 px-3 text-slate-600">${d.kecamatan}</td>
          <td class="py-2.5 px-3 text-center font-mono font-bold text-rose-600">${(d.kesehatan.rs + d.kesehatan.puskesmas_tot) || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.kesehatan.pustu || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${(d.kesehatan.klinik_pratama + d.kesehatan.dokter + d.kesehatan.bidan) || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.kesehatan.poskesdes || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.kesehatan.polindes || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${(d.kesehatan.apotek + d.kesehatan.toko_obat) || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono font-bold text-emerald-700">${d.kesehatan.posyandu_aktif || '-'}</td>
          <td class="py-2.5 px-3 text-right font-mono font-bold text-slate-900">${d.kesehatan.total_faskes}</td>
          <td class="py-2.5 px-3 text-center">
            <button type="button" onclick="window.focusDesaFromExplorer('${d.kecamatan}', '${d.nama}')" class="px-2 py-1 rounded bg-[#0D6E5B] text-white hover:bg-[#095244] text-[10px] font-bold cursor-pointer transition">Peta</button>
          </td>
        </tr>
      `).join('');
    } else if (currentTab === 'lingkungan') {
      theadHtml = `
        <tr class="bg-slate-50 text-[11px] font-bold text-slate-700 uppercase tracking-wider border-b border-slate-200">
          <th class="py-2.5 px-3 text-center w-12">No</th>
          <th class="py-2.5 px-3 text-left">Desa / Kelurahan</th>
          <th class="py-2.5 px-3 text-left">Kecamatan</th>
          <th class="py-2.5 px-3 text-right">KK Listrik PLN</th>
          <th class="py-2.5 px-3 text-center">Non-PLN</th>
          <th class="py-2.5 px-3 text-left">Penerangan Jalan</th>
          <th class="py-2.5 px-3 text-center">Agen LPG</th>
          <th class="py-2.5 px-3 text-center">Status Pencemaran</th>
          <th class="py-2.5 px-3 text-center">Pupuk Organik</th>
          <th class="py-2.5 px-3 text-left">Kawasan Hutan</th>
          <th class="py-2.5 px-3 text-left">Pemanfaatan Laut</th>
          <th class="py-2.5 px-3 text-center">Aksi</th>
        </tr>
      `;
      tbodyRows = filtered.map((d, idx) => `
        <tr class="border-b border-slate-100 hover:bg-emerald-50/40 transition-colors text-xs text-slate-800">
          <td class="py-2.5 px-3 text-center font-mono text-slate-500">${idx + 1}</td>
          <td class="py-2.5 px-3 font-bold text-slate-900">${d.nama}</td>
          <td class="py-2.5 px-3 text-slate-600">${d.kecamatan}</td>
          <td class="py-2.5 px-3 text-right font-mono font-bold text-amber-600">${(d.lingkungan.pln_kk || 0).toLocaleString('id-ID')}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.lingkungan.non_pln_kk || '-'}</td>
          <td class="py-2.5 px-3 text-slate-600 text-[11px]">${d.lingkungan.penerangan_jalan}</td>
          <td class="py-2.5 px-3 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold ${d.lingkungan.agen_lpg === 'Ada' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-400'}">${d.lingkungan.agen_lpg}</span></td>
          <td class="py-2.5 px-3 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold ${d.lingkungan.bebas_pencemaran ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700'}">${d.lingkungan.bebas_pencemaran ? 'Bebas' : 'Ada Cemar'}</span></td>
          <td class="py-2.5 px-3 text-center text-[10px]">${d.lingkungan.pupuk_organik && d.lingkungan.pupuk_organik.includes('terlibat') ? '<span class="text-emerald-700 font-bold">Aktif</span>' : '-'}</td>
          <td class="py-2.5 px-3 text-slate-600 text-[11px]">${d.lingkungan.lokasi_hutan}</td>
          <td class="py-2.5 px-3 text-slate-600 text-[11px] truncate max-w-[140px]" title="${d.lingkungan.pemanfaatan_laut}">${d.lingkungan.pemanfaatan_laut}</td>
          <td class="py-2.5 px-3 text-center">
            <button type="button" onclick="window.focusDesaFromExplorer('${d.kecamatan}', '${d.nama}')" class="px-2 py-1 rounded bg-[#0D6E5B] text-white hover:bg-[#095244] text-[10px] font-bold cursor-pointer transition">Peta</button>
          </td>
        </tr>
      `).join('');
    } else if (currentTab === 'pemerintahan') {
      theadHtml = `
        <tr class="bg-slate-50 text-[11px] font-bold text-slate-700 uppercase tracking-wider border-b border-slate-200">
          <th class="py-2.5 px-3 text-center w-12">No</th>
          <th class="py-2.5 px-3 text-left">Desa / Kelurahan</th>
          <th class="py-2.5 px-3 text-left">Kecamatan</th>
          <th class="py-2.5 px-3 text-center">Status</th>
          <th class="py-2.5 px-3 text-right">Total Aparat</th>
          <th class="py-2.5 px-3 text-left">Kades (Gender/Pendidikan)</th>
          <th class="py-2.5 px-3 text-left">Sekdes (Gender/Pendidikan)</th>
          <th class="py-2.5 px-3 text-center">BUMDes</th>
          <th class="py-2.5 px-3 text-center">Tanah Kas</th>
          <th class="py-2.5 px-3 text-center">Siskeudes</th>
          <th class="py-2.5 px-3 text-center">Perdes</th>
          <th class="py-2.5 px-3 text-center">Aksi</th>
        </tr>
      `;
      tbodyRows = filtered.map((d, idx) => `
        <tr class="border-b border-slate-100 hover:bg-emerald-50/40 transition-colors text-xs text-slate-800">
          <td class="py-2.5 px-3 text-center font-mono text-slate-500">${idx + 1}</td>
          <td class="py-2.5 px-3 font-bold text-slate-900">${d.nama}</td>
          <td class="py-2.5 px-3 text-slate-600">${d.kecamatan}</td>
          <td class="py-2.5 px-3 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold ${d.status === 'Kelurahan' ? 'bg-indigo-50 text-indigo-700' : 'bg-emerald-50 text-emerald-700'}">${d.status}</span></td>
          <td class="py-2.5 px-3 text-right font-mono font-bold text-slate-900">${d.pemerintahan.total_aparat}</td>
          <td class="py-2.5 px-3 text-slate-700 text-[11px]">${d.pemerintahan.kades_gender} (${d.pemerintahan.kades_pend})</td>
          <td class="py-2.5 px-3 text-slate-700 text-[11px]">${d.pemerintahan.sekdes_gender} (${d.pemerintahan.sekdes_pend})</td>
          <td class="py-2.5 px-3 text-center font-mono font-bold text-[#0D6E5B]">${d.pemerintahan.bumdes || '-'}</td>
          <td class="py-2.5 px-3 text-center font-mono">${d.pemerintahan.tanah_kas ? 'Ada' : '-'}</td>
          <td class="py-2.5 px-3 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold ${d.pemerintahan.siskeudes === 'Diperbaharui' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-400'}">${d.pemerintahan.siskeudes}</span></td>
          <td class="py-2.5 px-3 text-center font-bold text-emerald-700 text-[10px]">${d.pemerintahan.perdes}</td>
          <td class="py-2.5 px-3 text-center">
            <button type="button" onclick="window.focusDesaFromExplorer('${d.kecamatan}', '${d.nama}')" class="px-2 py-1 rounded bg-[#0D6E5B] text-white hover:bg-[#095244] text-[10px] font-bold cursor-pointer transition">Peta</button>
          </td>
        </tr>
      `).join('');
    }

    tableContainer.innerHTML = `
      <div class="overflow-x-auto rounded-xl border border-slate-200/90 shadow-2xs">
        <table class="w-full text-left border-collapse">
          <thead>${theadHtml}</thead>
          <tbody>${tbodyRows}</tbody>
        </table>
      </div>
    `;
  }

  function exportActiveTableCSV() {
    const filtered = filterVillages();
    if (!filtered || !filtered.length) return;

    let csvContent = "";
    if (currentTab === 'demografi') {
      csvContent += "No,Desa,Kecamatan,Status,Laki-Laki,Perempuan,Total Jiwa,Distribusi (%),Kepadatan (km2),Sex Ratio\n";
      filtered.forEach((d, i) => {
        csvContent += `"${i+1}","${d.nama}","${d.kecamatan}","${d.status}","${d.demografi.penduduk_l}","${d.demografi.penduduk_p}","${d.demografi.penduduk_total}","${d.demografi.distribusi_persen}","${d.demografi.kepadatan_km2}","${d.demografi.sex_ratio}"\n`;
      });
    } else if (currentTab === 'ekonomi') {
      csvContent += "No,Desa,Kecamatan,IMK,Subsektor,Komoditas Utama,Penghasilan Utama,Pasar,Minimarket,Bank/KSP,KUR,Produk Unggulan\n";
      filtered.forEach((d, i) => {
        csvContent += `"${i+1}","${d.nama}","${d.kecamatan}","${d.ekonomi.imk}","${d.ekonomi.subsektor}","${d.ekonomi.komoditas}","${d.ekonomi.penghasilan_utama}","${d.ekonomi.pasar_perm+d.ekonomi.pasar_semi}","${d.ekonomi.minimarket}","${d.ekonomi.bank_gov+d.ekonomi.ksp}","${d.ekonomi.kur}","${d.ekonomi.prod_unggulan_makanan}"\n`;
      });
    } else if (currentTab === 'pendidikan') {
      csvContent += "No,Desa,Kecamatan,TK/PAUD,SD,MI,SMP,MTs,SMA/MA,SMK,Total Sekolah\n";
      filtered.forEach((d, i) => {
        csvContent += `"${i+1}","${d.nama}","${d.kecamatan}","${d.pendidikan.tk}","${d.pendidikan.sd_neg+d.pendidikan.sd_swas}","${d.pendidikan.mi_neg+d.pendidikan.mi_swas}","${d.pendidikan.smp_neg+d.pendidikan.smp_swas}","${d.pendidikan.mts_neg+d.pendidikan.mts_swas}","${d.pendidikan.sma_ma_tot}","${d.pendidikan.smk_tot}","${d.pendidikan.total_sekolah}"\n`;
      });
    } else if (currentTab === 'kesehatan') {
      csvContent += "No,Desa,Kecamatan,RS/Puskesmas,Pustu,Klinik/Dokter,Poskesdes,Polindes,Apotek,Posyandu,Total Faskes\n";
      filtered.forEach((d, i) => {
        csvContent += `"${i+1}","${d.nama}","${d.kecamatan}","${d.kesehatan.rs+d.kesehatan.puskesmas_tot}","${d.kesehatan.pustu}","${d.kesehatan.klinik_pratama+d.kesehatan.dokter}","${d.kesehatan.poskesdes}","${d.kesehatan.polindes}","${d.kesehatan.apotek}","${d.kesehatan.posyandu_aktif}","${d.kesehatan.total_faskes}"\n`;
      });
    } else if (currentTab === 'lingkungan') {
      csvContent += "No,Desa,Kecamatan,KK PLN,KK Non-PLN,Penerangan Jalan,Agen LPG,Bebas Pencemaran,Pupuk Organik,Kawasan Hutan,Laut\n";
      filtered.forEach((d, i) => {
        csvContent += `"${i+1}","${d.nama}","${d.kecamatan}","${d.lingkungan.pln_kk}","${d.lingkungan.non_pln_kk}","${d.lingkungan.penerangan_jalan}","${d.lingkungan.agen_lpg}","${d.lingkungan.bebas_pencemaran?'Bebas':'Cemar'}","${d.lingkungan.pupuk_organik}","${d.lingkungan.lokasi_hutan}","${d.lingkungan.pemanfaatan_laut}"\n`;
      });
    } else if (currentTab === 'pemerintahan') {
      csvContent += "No,Desa,Kecamatan,Status,Total Aparat,Kades Gender,Kades Pend,Sekdes Gender,Sekdes Pend,BUMDes,Tanah Kas,Siskeudes,Perdes\n";
      filtered.forEach((d, i) => {
        csvContent += `"${i+1}","${d.nama}","${d.kecamatan}","${d.status}","${d.pemerintahan.total_aparat}","${d.pemerintahan.kades_gender}","${d.pemerintahan.kades_pend}","${d.pemerintahan.sekdes_gender}","${d.pemerintahan.sekdes_pend}","${d.pemerintahan.bumdes}","${d.pemerintahan.tanah_kas}","${d.pemerintahan.siskeudes}","${d.pemerintahan.perdes}"\n`;
      });
    }

    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `podes_2025_kolaka_utara_${currentTab}_${selectedKecamatan}.csv`;
    link.click();
  }

  // Global helper to jump to map and focus a desa
  window.focusDesaFromExplorer = function(kecName, desaName) {
    const mapSection = document.getElementById('sectionPeta');
    if (mapSection) {
      mapSection.scrollIntoView({ behavior: 'smooth' });
    }
    if (window.PresisiEngine && typeof window.PresisiEngine.onKecamatanChange === 'function') {
      window.PresisiEngine.onKecamatanChange(kecName);
      setTimeout(() => {
        if (typeof window.PresisiEngine.onDesaChange === 'function') {
          window.PresisiEngine.onDesaChange(desaName);
        }
      }, 300);
    }
  };

  window.initExplorer = initExplorer;
  if (document.readyState === 'complete' || document.readyState === 'interactive') {
    setTimeout(initExplorer, 10);
  } else {
    document.addEventListener('DOMContentLoaded', initExplorer);
  }
})();
