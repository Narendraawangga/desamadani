/**
 * DESA PRESISI ENGINE - KABUPATEN KOLAKA UTARA
 * Arsitektur Modern: Split Dual-Pane & Progressive Disclosure (Macro -> Meso -> Micro)
 * 15 Kecamatan • 133 Desa/Kelurahan • 6 Klaster PODES BPS 2025
 */
window.PresisiEngine = (function() {
  let db = null;
  let map = null;
  let geojsonLayer = null;
  let markersLayer = null;
  let legendControl = null;

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
  }

  // CATEGORY SWITCHER
  function setCategory(catKey) {
    if (!CATEGORY_CONFIG[catKey]) return;
    currentCategory = catKey;

    // Update Category Pills
    document.querySelectorAll('.presisi-cat-pill').forEach(btn => {
      if (btn.getAttribute('data-category') === catKey) {
        btn.className = "presisi-cat-pill active px-4 py-2 rounded-full text-xs font-bold transition flex items-center gap-2 shrink-0 bg-[#0b2545] text-white shadow-xs";
      } else {
        btn.className = "presisi-cat-pill px-4 py-2 rounded-full text-xs font-semibold transition flex items-center gap-2 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200/60";
      }
    });

    // Update Header Badges & Indicators
    const cfg = CATEGORY_CONFIG[catKey];
    const metricInd = document.getElementById('presisiMapMetricIndicator');
    if (metricInd) metricInd.textContent = `Metrik: ${cfg.metricLabel}`;

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

  function setAdminLevel(level) {
    const btnProv = document.getElementById('btnAdminLevelProv');
    const btnKab = document.getElementById('btnAdminLevelKab');
    const btnKec = document.getElementById('btnAdminLevelKec');
    const btnDesa = document.getElementById('btnAdminLevelDesa');

    const activeClass = "admin-level-btn active py-1.5 rounded-lg bg-[#0b2545] text-white shadow-2xs transition";
    const inactiveClass = "admin-level-btn py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition";

    if (btnProv) btnProv.className = inactiveClass;
    if (btnKab) btnKab.className = inactiveClass;
    if (btnKec) btnKec.className = inactiveClass;
    if (btnDesa) btnDesa.className = inactiveClass;

    if (level === 'kabupaten' || level === 'provinsi') {
      if (btnKab) btnKab.className = activeClass;
      resetFilter();
    } else if (level === 'kecamatan') {
      if (btnKec) btnKec.className = activeClass;
      if (currentKecamatan === 'ALL') {
        onKecamatanChange('Lasusua');
      } else {
        zoomToKecamatan(currentKecamatan);
      }
    } else if (level === 'desa') {
      if (btnDesa) btnDesa.className = activeClass;
      if (currentDesa === 'ALL') {
        const vList = currentKecamatan === 'ALL' ? db.desaList : db.desaList.filter(d => d.kecamatan.toLowerCase() === currentKecamatan.toLowerCase());
        if (vList.length > 0) onDesaChange(vList[0].nama);
      } else {
        zoomToDesa(currentDesa);
      }
    }
  }

  function toggleTematik(enabled) {
    isThematicActive = enabled;
    updateThematicMap();
  }

  // MAP IMPLEMENTATION (Satellite + Choropleth Polygons + Progressive Village Micro-Badges)
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

    // Set container min-height
    container.style.minHeight = '560px';

    map = L.map('mapPresisi', {
      zoomControl: false,
      attributionControl: false
    }).setView([-3.25, 121.15], 9);

    L.control.zoom({ position: 'topright' }).addTo(map);

    // 1. Primary Base: Esri World Imagery (High Resolution Satellite - Free, No API Key, No Watermark)
    const baseSatellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      maxZoom: 19,
      attribution: 'Esri, Maxar, Earthstar Geographics'
    }).addTo(map);

    // 2. Esri World Boundaries & Places Reference (Clean, Crisp, No API Key, No Watermark)
    const refLabels = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
      maxZoom: 19,
      opacity: 0.95
    }).addTo(map);

    // 3. Alternative OSM Base Layer (Free, No API Key)
    const baseOsm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; OpenStreetMap'
    });

    // Clean Layer Switcher Control (Bottom-Right)
    L.control.layers({
      "Citra Satelit": baseSatellite,
      "Peta Terbuka (OSM)": baseOsm
    }, {
      "Label Wilayah & Batas": refLabels
    }, { position: 'bottomright' }).addTo(map);

    // 3. Layer group for progressive village micro-badges
    markersLayer = L.layerGroup().addTo(map);

    // 4. Render GeoJSON Boundaries (15 Kecamatan)
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

    // Auto-invalidate size on multiple intervals to avoid any blank container bug
    setTimeout(() => { if (map) map.invalidateSize(); }, 100);
    setTimeout(() => { if (map) map.invalidateSize(); }, 350);
    setTimeout(() => { if (map) map.invalidateSize(); }, 800);
  }

  function getFeatureMetricValue(kecNama, cat) {
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
    const val = getFeatureMetricValue(kecNama, currentCategory);
    const color = getThematicColor(val, currentCategory);

    const isTarget = currentKecamatan !== 'ALL' &&
      cleanKec === currentKecamatan.replace(/\s+/g, '').toLowerCase();

    if (currentKecamatan !== 'ALL') {
      if (isTarget) {
        return {
          fillColor: '#f59e0b',
          weight: 3.5,
          opacity: 1,
          color: '#ffffff',
          dashArray: '',
          fillOpacity: 0.90
        };
      } else {
        return {
          fillColor: color,
          weight: 1.2,
          opacity: 0.4,
          color: '#ffffff',
          dashArray: '',
          fillOpacity: 0.18
        };
      }
    }

    return {
      fillColor: color,
      weight: 1.8,
      opacity: 1,
      color: '#ffffff',
      dashArray: '',
      fillOpacity: isThematicActive ? 0.82 : 0.45
    };
  }

  function onEachFeature(feature, layer) {
    const props = feature.properties || {};
    const kecNama = props.nama || props.kecamatan || props.WADMKC || '';
    const cleanKec = kecNama.replace(/\s+/g, '').toLowerCase();
    const kData = db.kecamatanList.find(k => k.nama.replace(/\s+/g, '').toLowerCase() === cleanKec);
    const val = getFeatureMetricValue(kecNama, currentCategory);
    const cfg = CATEGORY_CONFIG[currentCategory];

    // Permanent crisp label in polygon center (Like "Sragen" in reference)
    layer.bindTooltip(`<span>${kecNama}</span>`, {
      permanent: true,
      direction: 'center',
      className: 'kecamatan-polygon-label'
    });

    layer.on({
      mouseover: function(e) {
        if (currentKecamatan === 'ALL') {
          e.target.setStyle({ weight: 3, color: '#f59e0b', fillOpacity: 0.95 });
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
      updateVillageMicroBadges('ALL');
    } else {
      zoomToKecamatan(currentKecamatan);
      updateVillageMicroBadges(currentKecamatan);
    }

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

    zoomToDesa(d.nama);
    updateVillageMicroBadges(currentKecamatan);
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
    updateVillageMicroBadges('ALL');

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
    map.setView([-3.35, 121.05], 9, { animate: true });
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
        return { nama: v.nama, val: isNaN(metric) ? 0 : metric };
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

    if (t1) t1.textContent = currentKecamatan === 'ALL' ? cfg.chartTitle : `${cfg.metricLabel} di Kec. ${currentKecamatan}`;
    if (b1) b1.textContent = cfg.chartBadge || 'TABEL BPS';
    if (t2) t2.textContent = cfg.distTitle || 'Komposisi Sektor';
    if (b2) b2.textContent = cfg.distBadge || 'KOMPOSISI';
    if (t3) t3.textContent = cfg.chart3Title || 'Top 5 vs Bottom 5 Kecamatan';
    if (b3) b3.textContent = cfg.chart3Badge || 'DISPARITAS';
    if (t4) t4.textContent = cfg.chart4Title || 'Struktur Sub-Sektor Pendukung';
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

  function updateAnalysisPanels(cat) {
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

    // Sort kecamatan list for Top 5 vs Bottom 5 in Chart 3 (Descending order with rank labels)
    const sortedKec = [...db.kecamatanList].sort((a, b) => getFeatureMetricValue(b.nama, cat) - getFeatureMetricValue(a.nama, cat));
    const top5 = sortedKec.slice(0, 5);
    const bottom5 = sortedKec.slice(-5); // Keep descending so bars decrease smoothly (10 -> 9)
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
                label: 'Pelanggan PLN (Top 5 vs Bottom 5)',
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
              labels: ['Bebas Pencemaran (133 Desa)', 'Pengolahan Sampah (24 Desa)', 'Pupuk Organik (88 Desa)'],
              datasets: [{
                data: [kab.lingkungan.bebasPencemaran || 133, 24, 88],
                backgroundColor: ['#10b981', '#06b6d4', '#f59e0b']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          }
        };

      case 'sosial':
        return {
          chart1: {
            type: 'bar',
            data: {
              labels: labels1,
              datasets: [{
                label: 'Jumlah Fasilitas Pendidikan Formal',
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
          // CHART 2: MURNI 100% FASILITAS KESEHATAN (NO SMA / SEKOLAH!)
          chart2: {
            type: 'doughnut',
            data: {
              labels: ['RSUD (1)', 'Puskesmas (16)', 'Pustu (28)', 'Poskesdes (27)', 'Polindes (71)', 'Apotek (31)'],
              datasets: [{
                data: [
                  kab.sosial.rs || 1, 
                  kab.sosial.puskesmas || 16, 
                  kab.sosial.pustu || 28, 
                  kab.sosial.poskesdes || 27, 
                  kab.sosial.polindes || 71, 
                  kab.sosial.apotek || 31
                ],
                backgroundColor: ['#0284c7', '#0d9488', '#10b981', '#14b8a6', '#06b6d4', '#8b5cf6']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          },
          chart3: {
            type: 'bar',
            data: {
              labels: labels3,
              datasets: [{
                label: 'Sarana Pendidikan (Top 5 vs Bottom 5)',
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
          // CHART 4: MURNI 100% SATUAN PENDIDIKAN FORMAL (DI SINI TEMPAT SMA & SMK!)
          chart4: {
            type: 'doughnut',
            data: {
              labels: ['SD / MI (124)', 'SMP / MTs (54)', 'SMA / MA (21)', 'SMK (5)', 'Perguruan Tinggi (1)'],
              datasets: [{
                data: [
                  kab.sosial.totalSDMI || 124, 
                  kab.sosial.totalSMPMTs || 54, 
                  kab.sosial.totalSMAMA || 21, 
                  kab.sosial.smk || 5, 
                  kab.sosial.pt || 1
                ],
                backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          }
        };

      case 'keuangan':
        return {
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
              labels: ['Ada Tanah Kas (112 Desa)', 'Belum Ada (21 Desa)'],
              datasets: [{
                data: [kab.keuangan.tanahKas || 112, 133 - (kab.keuangan.tanahKas || 112)],
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
                label: 'BUMDes Aktif (Top 5 vs Bottom 5)',
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
              labels: ['Perdes Disahkan (133 Desa)', 'Kendaraan Dinas (98 Desa)', 'Kios/Pasar BUMDes (35 Desa)'],
              datasets: [{
                data: [kab.keuangan.perdes || 133, 98, 35],
                backgroundColor: ['#10b981', '#3b82f6', '#f59e0b']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          }
        };

      case 'umum':
        return {
          chart1: {
            type: 'bar',
            data: {
              labels: labels1,
              datasets: [{
                label: 'Jumlah Desa / Kelurahan',
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
              labels: ['Lereng / Pegunungan (98 Desa)', 'Dataran / Pesisir (35 Desa)'],
              datasets: [{
                data: [98, 35],
                backgroundColor: ['#0D6E5B', '#06b6d4']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          },
          chart3: {
            type: 'bar',
            data: {
              labels: labels3,
              datasets: [{
                label: 'Desa per Kecamatan (Top 5 vs Bottom 5)',
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
              labels: ['Di Dalam Hutan (12 Desa)', 'Di Tepi Hutan (70 Desa)', 'Di Luar Hutan (51 Desa)'],
              datasets: [{
                data: [12, 70, 51],
                backgroundColor: ['#065f46', '#10b981', '#f59e0b']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          }
        };

      case 'pemerintah':
        return {
          chart1: {
            type: 'bar',
            data: {
              labels: labels1,
              datasets: [{
                label: 'Jumlah Aparatur Desa',
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
              labels: ['Kepala Desa (133)', 'Sekretaris Desa (133)', 'Kaur / Kasi (399)', 'Kepala Dusun (499)'],
              datasets: [{
                data: [kab.pemerintah.kades || 133, kab.pemerintah.sekdes || 133, 399, 499],
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
          chart1: { type: 'bar', data: { labels: [], datasets: [] } },
          chart2: { type: 'doughnut', data: { labels: [], datasets: [] } },
          chart3: { type: 'bar', data: { labels: [], datasets: [] } },
          chart4: { type: 'doughnut', data: { labels: [], datasets: [] } }
        };
    }
  }

  function renderRaporDesa(desaName) {
    const d = db.desaList.find(x => x.nama.toLowerCase() === desaName.toLowerCase());
    if (!d) return;

    const container = document.getElementById('presisiContainerRaporDesa');
    if (!container) return;

    // Safe formatting helpers
    const fmt = (num) => (typeof num === 'number' && !isNaN(num)) ? num.toLocaleString('id-ID') : (num || '0');
    const safeStr = (val, fb = '-') => (val && val !== 'None' && val !== 'null') ? val : fb;

    container.innerHTML = `
      <!-- Village Profile Master Card Header -->
      <div class="p-5 rounded-2xl bg-gradient-to-r from-[#0b2545] via-[#10325c] to-[#059669] text-white shadow-md">
        <div class="flex items-center justify-between flex-wrap gap-2 text-xs mb-2">
          <div class="flex items-center gap-2">
            <span class="px-3 py-1 rounded-full text-[11px] font-black uppercase tracking-wider ${d.status === 'Kelurahan' ? 'bg-amber-400 text-slate-950' : 'bg-emerald-400 text-slate-950'}">
              ${d.status}
            </span>
            <span class="text-xs font-bold text-emerald-200">Kecamatan ${d.kecamatan}</span>
          </div>
          <div class="flex items-center gap-2">
            <button type="button" onclick="window.PresisiEngine.onKecamatanChange('${d.kecamatan}')" class="px-3 py-1.5 rounded-lg bg-white/15 hover:bg-white/25 text-white text-xs font-bold transition flex items-center gap-1.5 backdrop-blur-sm">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
              <span>Tutup / Tinjauan Kecamatan</span>
            </button>
            <button type="button" onclick="window.PresisiEngine.setViewMode('tabel'); window.PresisiEngine.onTableSearch('${d.nama}')" class="px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition flex items-center gap-1.5">
              <span>Buka di Tabel Data →</span>
            </button>
          </div>
        </div>

        <div class="flex items-baseline justify-between flex-wrap gap-3 pt-2 border-t border-white/15">
          <div>
            <h2 class="text-2xl font-black tracking-tight text-white flex items-center gap-2">
              <span>${d.status} ${d.nama}</span>
            </h2>
            <div class="text-xs text-slate-200 mt-1 flex items-center gap-2 flex-wrap">
              <span>Topografi: <b>${d.topografi || d.umum.topografi || 'Dataran'}</b></span>
              <span>•</span>
              <span>Wilayah Laut: <b>${d.umum.laut === 'Ada' ? 'Pesisir (Ada Laut)' : 'Bukan Pesisir'}</b></span>
              <span>•</span>
              <span>Kawasan Hutan: <b>${safeStr(d.umum.hutan, 'Di luar hutan')}</b></span>
              <span>•</span>
              <span>Komoditas Utama: <b class="text-amber-300 font-bold">${safeStr(d.umum.komoditas, 'Kakao')}</b></span>
            </div>
          </div>
          <div class="text-right">
            <div class="text-xl font-black text-amber-300">${fmt(d.penduduk)} <span class="text-xs font-medium text-white/80">Jiwa Est.</span></div>
            <div class="text-[11px] text-emerald-200 font-bold">${fmt(d.lingkungan.pln)} KK Berlistrik PLN</div>
          </div>
        </div>
      </div>

      <!-- 6 Sectors Balanced Grid Cards (3 Cols on Desktop, 2 Cols on Tablet, 1 on Mobile) -->
      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 text-xs text-slate-700">

        <!-- 1. Sarana Ekonomi & Industri -->
        <div class="p-4 bg-amber-50/50 rounded-2xl border border-amber-200/90 shadow-2xs space-y-2.5 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#7c2d12] pb-2 border-b border-amber-200/60">
              <span class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                <span class="text-sm font-bold">1. Sarana Ekonomi & Usaha</span>
              </span>
              <span class="text-[11px] bg-amber-200/80 text-amber-950 px-2.5 py-0.5 rounded-full font-black">${fmt(d.ekonomi.ikm)} IMK</span>
            </div>
            <div class="space-y-1.5 pt-2.5 text-[11px]">
              <div class="flex justify-between py-0.5 border-b border-amber-100">
                <span class="text-slate-500">Komoditas Utama</span>
                <b class="text-slate-800 text-right">${safeStr(d.umum.komoditas)}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-amber-100">
                <span class="text-slate-500">Subsektor Pertanian</span>
                <b class="text-slate-800 text-right">${safeStr(d.umum.subsektor)}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-amber-100">
                <span class="text-slate-500">Sentra Industri</span>
                <b class="text-slate-800">${d.ekonomi.sentra > 0 ? d.ekonomi.sentra + ' Sentra' : 'Tidak Ada'}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-amber-100">
                <span class="text-slate-500">Sarana Perdagangan</span>
                <b class="text-slate-800">${fmt(d.ekonomi.minimarket)} Minimarket, ${fmt(d.ekonomi.resto)} Resto</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-amber-100">
                <span class="text-slate-500">Pasar Desa</span>
                <b class="text-slate-800">${d.ekonomi.pasarPerm > 0 ? d.ekonomi.pasarPerm + ' Permanen' : (d.ekonomi.pasarSemi > 0 ? d.ekonomi.pasarSemi + ' Semi' : 'Tidak Ada')}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-amber-100">
                <span class="text-slate-500">Akomodasi</span>
                <b class="text-slate-800">${fmt(d.ekonomi.hotel)} Hotel, ${fmt(d.ekonomi.penginapan)} Penginapan</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-amber-100">
                <span class="text-slate-500">Bank & Koperasi</span>
                <b class="text-slate-800">${fmt(d.ekonomi.bankTotal)} Bank, ${fmt(d.ekonomi.koperasiTotal)} Koperasi</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-amber-100">
                <span class="text-slate-500">Akses Kredit (KUR/KUK)</span>
                <b class="text-slate-800">KUR: ${safeStr(d.ekonomi.kur)} | KUK: ${safeStr(d.ekonomi.kuk)}</b>
              </div>
              <div class="flex justify-between py-0.5">
                <span class="text-slate-500">Produk Unggulan</span>
                <b class="text-slate-800 text-right">${d.ekonomi.prodUnggulan === 'Ada' ? (d.ekonomi.prodMakanan && d.ekonomi.prodMakanan !== '-' ? d.ekonomi.prodMakanan : d.ekonomi.prodNonMakanan) : 'Belum Ada'}</b>
              </div>
            </div>
          </div>
        </div>

        <!-- 2. Perumahan, Energi & Lingkungan -->
        <div class="p-4 bg-emerald-50/50 rounded-2xl border border-emerald-200/90 shadow-2xs space-y-2.5 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#065f46] pb-2 border-b border-emerald-200/60">
              <span class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                <span class="text-sm font-bold">2. Perumahan & Lingkungan</span>
              </span>
              <span class="text-[11px] bg-emerald-200/80 text-emerald-950 px-2.5 py-0.5 rounded-full font-black">${fmt(d.lingkungan.pln)} KK PLN</span>
            </div>
            <div class="space-y-1.5 pt-2.5 text-[11px]">
              <div class="flex justify-between py-0.5 border-b border-emerald-100">
                <span class="text-slate-500">Listrik Non-PLN / Bukan</span>
                <b class="text-slate-800">${fmt(d.lingkungan.nonPln)} Non-PLN / ${fmt(d.lingkungan.bukanListrik)} Belum</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-emerald-100">
                <span class="text-slate-500">Penerangan Jalan Utama</span>
                <b class="text-slate-800 text-right">${safeStr(d.lingkungan.peneranganJalan)}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-emerald-100">
                <span class="text-slate-500">Pangkalan LPG / Minyak</span>
                <b class="text-slate-800">LPG: ${safeStr(d.lingkungan.agenLpg)} | Minyak: ${safeStr(d.lingkungan.agenMinyak)}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-emerald-100">
                <span class="text-slate-500">Status Pencemaran</span>
                <b class="${(d.lingkungan.bebasPencemaran || '').includes('Bebas') ? 'text-emerald-700' : 'text-rose-700'}">${safeStr(d.lingkungan.bebasPencemaran, 'Bebas')}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-emerald-100">
                <span class="text-slate-500">Pencemaran Air/Tanah/Udara</span>
                <b class="text-slate-800">Air: ${d.lingkungan.pencemaranAir?'Ada':'-'} | Tanah: ${d.lingkungan.pencemaranTanah?'Ada':'-'} | Udara: ${d.lingkungan.pencemaranUdara?'Ada':'-'}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-emerald-100">
                <span class="text-slate-500">Pengolahan Daur Sampah</span>
                <b class="text-slate-800 text-right">${safeStr(d.lingkungan.sampah)}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-emerald-100">
                <span class="text-slate-500">Penggalakan Pupuk Organik</span>
                <b class="text-slate-800 text-right">${safeStr(d.lingkungan.pupukOrganik)}</b>
              </div>
              <div class="flex justify-between py-0.5">
                <span class="text-slate-500">Adaptasi Pola Tanam & Iklim</span>
                <b class="text-slate-800 text-right">${safeStr(d.lingkungan.polaTanam)}</b>
              </div>
            </div>
          </div>
        </div>

        <!-- 3. Pendidikan & SDM -->
        <div class="p-4 bg-blue-50/50 rounded-2xl border border-blue-200/90 shadow-2xs space-y-2.5 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#1e3a8a] pb-2 border-b border-blue-200/60">
              <span class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                <span class="text-sm font-bold">3. Sarana Pendidikan</span>
              </span>
              <span class="text-[11px] bg-blue-200/80 text-blue-950 px-2.5 py-0.5 rounded-full font-black">${fmt(d.sosial.totalSaranaPendidikan)} Sekolah</span>
            </div>
            <div class="space-y-1.5 pt-2.5 text-[11px]">
              <div class="flex justify-between py-0.5 border-b border-blue-100">
                <span class="text-slate-500">TK / PAUD / RA / BA</span>
                <b class="text-slate-800">${fmt(d.sosial.tk)} Unit</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-blue-100">
                <span class="text-slate-500">SD / MI Sederajat</span>
                <b class="text-slate-800">${fmt(d.sosial.totalSDMI)} Unit (${fmt(d.sosial.sdNeg)} Neg, ${fmt(d.sosial.sdSwa)} Swa, ${fmt((d.sosial.miNeg||0) + (d.sosial.miSwa||0))} MI)</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-blue-100">
                <span class="text-slate-500">SMP / MTs Sederajat</span>
                <b class="text-slate-800">${fmt(d.sosial.totalSMPMTs)} Unit (${fmt(d.sosial.smpNeg)} Neg, ${fmt(d.sosial.smpSwa)} Swa, ${fmt((d.sosial.mtsNeg||0) + (d.sosial.mtsSwa||0))} MTs)</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-blue-100">
                <span class="text-slate-500">SMA / MA Sederajat</span>
                <b class="text-slate-800">${fmt(d.sosial.totalSMAMA)} Unit (${fmt(d.sosial.smaNeg)} Neg, ${fmt(d.sosial.smaSwa)} Swa, ${fmt((d.sosial.maNeg||0) + (d.sosial.maSwa||0))} MA)</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-blue-100">
                <span class="text-slate-500">SMK Negeri & Swasta</span>
                <b class="text-slate-800">${fmt(d.sosial.smk)} Unit</b>
              </div>
              <div class="flex justify-between py-0.5">
                <span class="text-slate-500">Akademi / Perguruan Tinggi</span>
                <b class="text-slate-800">${fmt(d.sosial.pt)} Kampus / Unit</b>
              </div>
            </div>
          </div>
        </div>

        <!-- 4. Kesehatan & Faskes -->
        <div class="p-4 bg-teal-50/50 rounded-2xl border border-teal-200/90 shadow-2xs space-y-2.5 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#0f766e] pb-2 border-b border-teal-200/60">
              <span class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-teal-500"></span>
                <span class="text-sm font-bold">4. Sarana Kesehatan & UKBM</span>
              </span>
              <span class="text-[11px] bg-teal-200/80 text-teal-950 px-2.5 py-0.5 rounded-full font-black">${fmt(d.sosial.totalSaranaKesehatan)} Faskes</span>
            </div>
            <div class="space-y-1.5 pt-2.5 text-[11px]">
              <div class="flex justify-between py-0.5 border-b border-teal-100">
                <span class="text-slate-500">Rumah Sakit / Balai Kes.</span>
                <b class="text-slate-800">${d.sosial.rs > 0 ? d.sosial.rs + ' RS' : (d.sosial.balaiKesehatan > 0 ? d.sosial.balaiKesehatan + ' Balai' : 'Tidak Ada')}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-teal-100">
                <span class="text-slate-500">Puskesmas (RI / Non-RI)</span>
                <b class="text-slate-800">${d.sosial.puskesmasRI > 0 ? 'Puskesmas Rawat Inap' : (d.sosial.puskesmasNonRI > 0 ? 'Puskesmas Non-RI' : 'Tidak Ada')}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-teal-100">
                <span class="text-slate-500">Puskesmas Pembantu (Pustu)</span>
                <b class="text-slate-800">${fmt(d.sosial.pustu)} Unit Pustu</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-teal-100">
                <span class="text-slate-500">Klinik Pratama / Utama</span>
                <b class="text-slate-800">${fmt((d.sosial.klinikPratama||0) + (d.sosial.klinikUtama||0))} Unit</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-teal-100">
                <span class="text-slate-500">Praktik Dokter / Bidan</span>
                <b class="text-slate-800">${fmt(d.sosial.dokter)} Dokter | ${fmt(d.sosial.bidan)} Bidan</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-teal-100">
                <span class="text-slate-500">Poskesdes / Polindes</span>
                <b class="text-slate-800">${fmt(d.sosial.poskesdes)} Poskesdes | ${fmt(d.sosial.polindes)} Polindes</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-teal-100">
                <span class="text-slate-500">Apotek / Toko Obat</span>
                <b class="text-slate-800">${fmt(d.sosial.apotek)} Apotek | ${fmt(d.sosial.tokoObat)} Toko Obat</b>
              </div>
              <div class="flex justify-between py-0.5">
                <span class="text-slate-500">Posyandu & Posbindu</span>
                <b class="text-slate-800">${fmt(d.sosial.posyandu)} Posyandu Aktif | ${fmt(d.sosial.posbindu)} Posbindu</b>
              </div>
            </div>
          </div>
        </div>

        <!-- 5. Keuangan, BUMDes & Aset Desa -->
        <div class="p-4 bg-purple-50/50 rounded-2xl border border-purple-200/90 shadow-2xs space-y-2.5 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#581c87] pb-2 border-b border-purple-200/60">
              <span class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
                <span class="text-sm font-bold">5. Keuangan & Aset Desa</span>
              </span>
              <span class="text-[11px] bg-purple-200/80 text-purple-950 px-2.5 py-0.5 rounded-full font-black">BUMDes: ${d.keuangan.bumdes > 0 ? 'Aktif' : 'Belum Ada'}</span>
            </div>
            <div class="space-y-1.5 pt-2.5 text-[11px]">
              <div class="flex justify-between py-0.5 border-b border-purple-100">
                <span class="text-slate-500">BUMDes Aktif</span>
                <b class="text-slate-800">${d.keuangan.bumdes > 0 ? d.keuangan.bumdes + ' Unit Usaha' : 'Belum Tersedia'}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-purple-100">
                <span class="text-slate-500">Sistem Keuangan Desa</span>
                <b class="${d.keuangan.siskeudes === 'Diperbaharui' ? 'text-emerald-700' : 'text-slate-800'}">${safeStr(d.keuangan.siskeudes)}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-purple-100">
                <span class="text-slate-500">Sistem Informasi Desa (SID)</span>
                <b class="text-slate-800">${safeStr(d.keuangan.sid)}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-purple-100">
                <span class="text-slate-500">Tanah Kas Desa / Ulayat</span>
                <b class="text-slate-800">${d.keuangan.tanahKas > 0 ? 'Ada' : 'Tidak Ada'}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-purple-100">
                <span class="text-slate-500">Tambatan Perahu Laut</span>
                <b class="text-slate-800">${d.keuangan.perahu > 0 ? 'Ada (' + d.keuangan.perahu + ' Tambatan)' : 'Tidak Ada'}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-purple-100">
                <span class="text-slate-500">Bangunan Milik Desa</span>
                <b class="text-slate-800">${d.keuangan.bangunanDesa > 0 ? 'Ada (' + d.keuangan.bangunanDesa + ' Unit)' : 'Tidak Ada'}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-purple-100">
                <span class="text-slate-500">Mata Air / Objek Wisata</span>
                <b class="text-slate-800">Mata Air: ${d.keuangan.mataAir>0?'Ada':'-'} | Wisata: ${d.keuangan.wisata>0?'Ada':'-'}</b>
              </div>
              <div class="flex justify-between py-0.5">
                <span class="text-slate-500">Peraturan Desa (Perdes)</span>
                <b class="text-emerald-700 font-bold">${safeStr(d.keuangan.perdes, 'Ada')} (Tahun 2024)</b>
              </div>
            </div>
          </div>
        </div>

        <!-- 6. Aparat & Tata Kelola Pemerintahan -->
        <div class="p-4 bg-indigo-50/50 rounded-2xl border border-indigo-200/90 shadow-2xs space-y-2.5 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between font-extrabold text-[#312e81] pb-2 border-b border-indigo-200/60">
              <span class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-indigo-500"></span>
                <span class="text-sm font-bold">6. Aparat Pemerintahan</span>
              </span>
              <span class="text-[11px] bg-indigo-200/80 text-indigo-950 px-2.5 py-0.5 rounded-full font-black">${fmt(d.pemerintah.totalAparat)} Aparat</span>
            </div>
            <div class="space-y-1.5 pt-2.5 text-[11px]">
              <div class="flex justify-between py-0.5 border-b border-indigo-100">
                <span class="text-slate-500">Kepala Desa / Lurah</span>
                <b class="text-slate-800">${safeStr(d.pemerintah.kadesGender, 'Laki-laki')} (${safeStr(d.pemerintah.kadesUmur, '35-44 Thn')})</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-indigo-100">
                <span class="text-slate-500">Pendidikan Terakhir Kades</span>
                <b class="text-indigo-800 font-bold">${safeStr(d.pemerintah.kadesPend, 'Diploma IV/S1')}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-indigo-100">
                <span class="text-slate-500">Sekretaris Desa/Kel.</span>
                <b class="text-slate-800">${safeStr(d.pemerintah.sekdesGender, 'Laki-laki')} (${safeStr(d.pemerintah.sekdesUmur, '25-34 Thn')})</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-indigo-100">
                <span class="text-slate-500">Pendidikan Terakhir Sekdes</span>
                <b class="text-indigo-800 font-bold">${safeStr(d.pemerintah.sekdesPend, 'Diploma IV/S1')}</b>
              </div>
              <div class="flex justify-between py-0.5 border-b border-indigo-100">
                <span class="text-slate-500">Pelaksana Kewilayahan (Kadus)</span>
                <b class="text-slate-800">${fmt(d.pemerintah.kadus)} Orang</b>
              </div>
              <div class="flex justify-between py-0.5">
                <span class="text-slate-500">Pelaksana Teknis (Kaur/Kasi)</span>
                <b class="text-slate-800">${fmt(d.pemerintah.kaur)} Orang</b>
              </div>
            </div>
          </div>
        </div>

      </div>
    `;

    // Smooth scroll down to the village report
    container.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
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

  // TABLE TABULATION & CSV EXPORT
  let currentTableData = [];
  let tableSearchQuery = '';

  function renderPresisiTable() {
    const thead = document.getElementById('theadPresisi');
    const tbody = document.getElementById('tbodyPresisi');
    if (!thead || !tbody) return;

    const cfg = CATEGORY_CONFIG[currentCategory];
    thead.innerHTML = `
      <tr>
        ${cfg.tableColumns.map(col => `<th class="p-2.5 font-bold whitespace-nowrap">${col.label}</th>`).join('')}
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

    renderTableRows();
  }

  function renderTableRows() {
    const tbody = document.getElementById('tbodyPresisi');
    const badgeCount = document.getElementById('presisiTableCountBadge');
    if (!tbody) return;

    let filtered = currentTableData;
    if (tableSearchQuery) {
      const q = tableSearchQuery.toLowerCase();
      filtered = filtered.filter(r => 
        (r.nama || '').toLowerCase().includes(q) ||
        (r.kecamatan || '').toLowerCase().includes(q) ||
        (r.prodUnggulan || '').toLowerCase().includes(q) ||
        (r.komoditas || '').toLowerCase().includes(q)
      );
    }

    if (badgeCount) badgeCount.textContent = `Menampilkan ${filtered.length} dari ${currentTableData.length} Desa`;

    const cfg = CATEGORY_CONFIG[currentCategory];
    tbody.innerHTML = filtered.map(row => `
      <tr class="hover:bg-slate-50 transition cursor-pointer" onclick="window.PresisiEngine.setViewMode('dual'); window.PresisiEngine.onDesaChange('${row.nama}')">
        ${cfg.tableColumns.map(col => `<td class="p-2.5 whitespace-nowrap">${row[col.key] !== undefined ? row[col.key] : '-'}</td>`).join('')}
      </tr>
    `).join('');
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
    const cfg = CATEGORY_CONFIG[currentCategory];

    let csv = cfg.tableColumns.map(c => `"${c.label}"`).join(',') + '\n';
    currentTableData.forEach(row => {
      let line = cfg.tableColumns.map(c => {
        let val = row[c.key] !== undefined ? row[c.key] : '';
        return `"${String(val).replace(/"/g, '""')}"`;
      }).join(',');
      csv += line + '\n';
    });

    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `PODES_2025_Kolaka_Utara_${currentCategory}.csv`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
  }


  // =========================================================================
  // SECTION AGREGAT 15 KECAMATAN KOLAKA UTARA (PODES BPS 2025)
  // Dynamic Cards, Sektor Filtering, Instant Searching, Sorting & WebGIS Sync
  // =========================================================================
  let agregatSector = 'all';
  let agregatSearchQuery = '';
  let agregatSortBy = 'geo';

  const NORTH_TO_SOUTH_ORDER = [
    'Tolala', 'Porehu', 'Batu Putih', 'Pakue Utara', 'Pakue Tengah', 'Pakue',
    'Watunohu', 'Tiwu', 'Ngapa', 'Kodeoha', 'Katoi', 'Lasusua', 'Lambai',
    'Ranteangin', 'Wawo'
  ];

  function setAgregatSector(sec) {
    agregatSector = sec;
    document.querySelectorAll('.agregat-sec-btn').forEach(btn => {
      if (btn.getAttribute('data-sec') === sec) {
        btn.className = "agregat-sec-btn active px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1.5 shrink-0 bg-[#0b2545] text-white shadow-xs";
      } else {
        btn.className = "agregat-sec-btn px-3.5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-1.5 shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-700";
      }
    });
    renderAgregatKecamatanSection();
  }

  function onSearchKecamatanCard(query) {
    agregatSearchQuery = (query || '').toLowerCase().trim();
    renderAgregatKecamatanSection();
  }

  function onSortKecamatanCard(sortBy) {
    agregatSortBy = sortBy;
    renderAgregatKecamatanSection();
  }

    const KECAMATAN_SVG_MAPS = {
  "lasusua": {
    "nama": "Lasusua",
    "path": "M 26.2,27.4 L 62.8,35.6 L 82.5,34.1 L 90.0,38.9 L 67.7,52.4 L 37.4,64.7 L 35.0,63.8 L 37.1,68.2 L 35.5,72.6 L 31.2,70.8 L 28.4,63.7 L 20.1,58.3 L 18.3,55.3 L 21.6,56.0 L 13.0,45.0 L 10.9,36.3 L 10.0,28.8 L 26.2,27.4 Z",
    "cx": 42.9,
    "cy": 44.9
  },
  "pakue": {
    "nama": "Pakue",
    "path": "M 38.6,22.6 L 90.0,54.9 L 80.6,66.0 L 76.2,64.6 L 75.1,77.4 L 59.3,74.7 L 22.7,52.5 L 16.6,58.1 L 10.0,45.8 L 15.0,43.2 L 19.5,28.8 L 27.8,23.6 L 34.8,26.9 L 38.6,22.6 Z",
    "cx": 49.2,
    "cy": 49.5
  },
  "batuputih": {
    "nama": "Batu Putih",
    "path": "M 10.2,40.1 L 10.0,39.9 L 10.0,39.8 L 10.3,39.9 L 10.2,40.1 Z M 12.4,38.1 L 12.5,38.1 L 12.5,38.2 L 12.4,38.2 L 12.4,38.1 Z M 16.2,31.4 L 16.0,31.3 L 16.0,31.2 L 16.2,31.3 L 16.2,31.4 Z M 14.4,29.7 L 14.3,30.1 L 14.1,30.0 L 14.0,29.9 L 14.4,29.7 Z M 14.5,26.0 L 14.4,26.0 L 14.4,25.9 L 14.5,26.0 L 14.5,26.0 Z M 14.3,25.7 L 14.2,25.7 L 14.2,25.6 L 14.3,25.7 L 14.3,25.7 Z M 14.4,25.2 L 18.5,29.5 L 23.2,29.9 L 22.2,39.9 L 26.6,40.8 L 26.3,43.8 L 29.4,43.8 L 27.2,48.0 L 28.5,49.1 L 44.7,51.7 L 48.6,55.6 L 67.0,64.5 L 90.0,66.4 L 89.7,74.8 L 62.9,70.5 L 30.6,56.5 L 13.0,51.4 L 13.1,45.8 L 10.5,44.0 L 10.1,41.1 L 12.7,38.4 L 14.3,41.2 L 16.1,40.3 L 16.6,35.6 L 19.4,36.9 L 19.8,33.1 L 16.1,33.4 L 17.2,30.0 L 14.7,30.4 L 15.1,26.3 L 14.4,25.2 Z",
    "cx": 44.8,
    "cy": 56.3
  },
  "ranteangin": {
    "nama": "Rante Angin",
    "path": "M 83.7,20.8 L 90.0,26.8 L 74.0,33.1 L 69.3,40.8 L 62.8,43.1 L 45.5,59.8 L 39.1,59.2 L 35.2,70.0 L 23.8,80.0 L 10.0,65.0 L 21.5,51.6 L 35.7,50.0 L 79.1,20.0 L 83.7,20.8 Z",
    "cx": 44.2,
    "cy": 50.8
  },
  "kodeoha": {
    "nama": "Kodeoha",
    "path": "M 26.0,27.8 L 28.4,30.9 L 26.9,34.1 L 31.2,37.3 L 90.0,67.9 L 83.1,72.2 L 30.9,59.3 L 10.0,44.5 L 26.0,27.8 Z",
    "cx": 44.3,
    "cy": 52.9
  },
  "ngapa": {
    "nama": "Ngapa",
    "path": "M 36.6,10.0 L 71.5,30.6 L 86.8,33.2 L 84.2,35.6 L 87.0,40.4 L 79.9,51.5 L 76.9,51.7 L 77.5,61.9 L 72.1,70.9 L 85.7,81.4 L 82.0,90.0 L 50.0,76.9 L 28.3,63.4 L 27.1,52.4 L 13.0,31.6 L 23.4,17.6 L 34.3,20.1 L 34.5,16.8 L 29.8,15.0 L 36.6,10.0 Z",
    "cx": 51.6,
    "cy": 47.9
  },
  "wawo": {
    "nama": "Wawo",
    "path": "M 64.3,17.3 L 84.2,33.5 L 90.0,52.3 L 48.8,70.3 L 38.3,82.7 L 31.8,72.0 L 10.0,61.7 L 19.6,53.4 L 22.8,44.3 L 28.1,44.8 L 42.6,30.9 L 48.0,29.0 L 51.9,22.5 L 64.3,17.3 Z",
    "cx": 52.8,
    "cy": 48.7
  },
  "lambai": {
    "nama": "Lambai",
    "path": "M 90.0,33.3 L 47.2,62.8 L 32.7,64.7 L 21.5,77.5 L 10.6,69.1 L 12.9,62.8 L 10.0,56.7 L 13.3,58.0 L 55.8,40.7 L 87.0,22.5 L 90.0,33.3 Z",
    "cx": 46.9,
    "cy": 51.4
  },
  "watunohu": {
    "nama": "Watunohu",
    "path": "M 68.0,13.2 L 68.4,25.9 L 90.0,58.5 L 63.1,52.3 L 38.1,86.8 L 32.1,78.8 L 11.6,81.7 L 10.0,59.2 L 26.4,30.4 L 68.0,13.2 Z",
    "cx": 44.9,
    "cy": 49.5
  },
  "pakuetengah": {
    "nama": "Pakue Tengah",
    "path": "M 24.0,24.3 L 58.3,40.8 L 90.0,59.6 L 72.0,59.9 L 68.7,69.7 L 58.0,75.7 L 17.2,49.1 L 10.2,48.2 L 10.0,25.8 L 24.0,24.3 Z",
    "cx": 42.5,
    "cy": 48.5
  },
  "pakueutara": {
    "nama": "Pakue Utara",
    "path": "M 17.1,31.2 L 56.7,48.1 L 70.0,52.0 L 90.0,54.4 L 88.9,69.2 L 78.7,63.7 L 69.9,63.8 L 61.2,60.9 L 21.2,39.5 L 13.0,40.4 L 10.0,34.4 L 12.6,30.8 L 17.1,31.2 Z",
    "cx": 54.6,
    "cy": 50.5
  },
  "porehu": {
    "nama": "Porehu",
    "path": "M 36.3,17.0 L 39.3,16.8 L 40.5,20.8 L 44.0,22.3 L 45.5,25.6 L 56.4,30.3 L 57.0,34.5 L 64.2,41.7 L 71.6,44.9 L 73.6,50.7 L 71.6,60.2 L 77.4,66.4 L 78.1,71.1 L 83.8,74.1 L 84.9,82.0 L 90.0,86.4 L 62.9,84.1 L 41.2,73.7 L 36.6,69.1 L 15.9,64.7 L 18.9,60.4 L 14.8,59.6 L 14.8,55.9 L 10.0,55.1 L 11.2,43.4 L 21.8,44.4 L 24.0,43.4 L 22.3,39.5 L 27.9,40.4 L 35.8,13.6 L 36.3,17.0 Z",
    "cx": 48.4,
    "cy": 55.6
  },
  "katoi": {
    "nama": "Katoi",
    "path": "M 19.4,32.7 L 39.4,46.7 L 89.7,59.2 L 90.0,65.1 L 73.5,67.3 L 29.5,57.7 L 11.2,59.3 L 10.0,45.7 L 19.2,37.8 L 19.4,32.7 Z",
    "cx": 44.2,
    "cy": 54.0
  },
  "tiwu": {
    "nama": "Tiwu",
    "path": "M 44.7,10.0 L 83.0,64.7 L 85.8,90.0 L 17.3,51.3 L 21.8,41.7 L 14.2,31.9 L 25.2,28.9 L 28.2,11.9 L 44.7,10.0 Z",
    "cx": 49.9,
    "cy": 48.4
  },
  "tolala": {
    "nama": "Tolala",
    "path": "M 47.8,76.9 L 47.7,76.9 L 47.7,76.8 L 47.8,76.8 L 47.8,76.9 Z M 46.1,75.6 L 45.8,75.5 L 45.9,75.3 L 46.1,75.5 L 46.1,75.6 Z M 46.0,74.5 L 45.9,74.4 L 46.2,74.4 L 46.2,74.4 L 46.0,74.5 Z M 44.7,74.2 L 44.6,74.1 L 44.6,74.1 L 44.7,74.1 L 44.7,74.2 Z M 13.9,28.5 L 10.8,29.9 L 10.0,28.7 L 13.0,27.5 L 13.9,28.5 Z M 55.0,21.0 L 64.8,23.7 L 71.9,29.2 L 75.6,39.8 L 82.4,38.3 L 86.9,43.1 L 90.0,42.8 L 79.7,77.9 L 72.4,76.7 L 74.6,81.9 L 71.8,83.1 L 50.7,81.2 L 47.7,79.3 L 44.5,75.1 L 49.5,78.9 L 52.4,63.7 L 48.6,58.6 L 49.1,55.1 L 46.7,55.9 L 47.2,42.9 L 43.5,43.6 L 44.2,49.4 L 38.5,45.6 L 35.7,27.6 L 32.6,40.7 L 29.2,37.0 L 21.4,37.9 L 27.2,46.0 L 21.0,38.5 L 22.4,34.2 L 30.7,30.5 L 34.0,22.7 L 45.4,21.1 L 49.8,16.9 L 55.0,21.0 Z",
    "cx": 60.8,
    "cy": 49.6
  }
};

function renderAgregatKecamatanSection() {
    const container = document.getElementById('gridKecamatanCards');
    if (!container || !db || !db.kecamatanList) return;

    let list = [...db.kecamatanList];

    // Filter by search query
    if (agregatSearchQuery) {
      list = list.filter(k => 
        k.nama.toLowerCase().includes(agregatSearchQuery) || 
        (k.karakteristik && k.karakteristik.toLowerCase().includes(agregatSearchQuery)) ||
        (k.desaList && k.desaList.some(d => d.toLowerCase().includes(agregatSearchQuery)))
      );
    }

    // Sort list
    if (agregatSortBy === 'geo') {
      list.sort((a, b) => {
        let idxA = NORTH_TO_SOUTH_ORDER.indexOf(a.nama);
        let idxB = NORTH_TO_SOUTH_ORDER.indexOf(b.nama);
        if (idxA === -1) idxA = 99;
        if (idxB === -1) idxB = 99;
        return idxA - idxB;
      });
    } else if (agregatSortBy === 'imk') {
      list.sort((a, b) => (b.ekonomi?.ikm || 0) - (a.ekonomi?.ikm || 0));
    } else if (agregatSortBy === 'pln') {
      list.sort((a, b) => (b.lingkungan?.pln || 0) - (a.lingkungan?.pln || 0));
    } else if (agregatSortBy === 'desa') {
      list.sort((a, b) => (b.desaCount || 0) - (a.desaCount || 0));
    } else if (agregatSortBy === 'sekolah') {
      list.sort((a, b) => (b.sosial?.totalSaranaPendidikan || 0) - (a.sosial?.totalSaranaPendidikan || 0));
    } else if (agregatSortBy === 'faskes') {
      list.sort((a, b) => (b.sosial?.totalSaranaKesehatan || 0) - (a.sosial?.totalSaranaKesehatan || 0));
    } else if (agregatSortBy === 'bumdes') {
      list.sort((a, b) => (b.keuangan?.bumdes || 0) - (a.keuangan?.bumdes || 0));
    }

    if (list.length === 0) {
      container.innerHTML = `
        <div class="w-full py-12 text-center bg-white rounded-3xl border border-[#5A6B65]/15 p-8 space-y-3 shadow-xs">
          <p class="text-sm font-semibold text-[#5A6B65]">Tidak ada kecamatan yang cocok dengan kata kunci "${agregatSearchQuery}".</p>
          <button type="button" onclick="window.PresisiEngine.onSearchKecamatanCard(''); document.getElementById('inputSearchKecamatanCard').value = '';" class="px-6 py-2.5 rounded-full bg-[#0D6E5B] hover:bg-[#095244] text-xs font-bold text-white shadow-xs transition">Reset Pencarian</button>
        </div>
      `;
      return;
    }

    const fmt = (n) => (typeof n === 'number' && !isNaN(n)) ? n.toLocaleString('id-ID') : (n || '0');
    const pesisirList = ['tolala', 'batuputih', 'pakueutara', 'pakue', 'kodeoha', 'katoi', 'lasusua', 'lambai', 'ranteangin', 'wawo'];

    container.innerHTML = list.map((k, idx) => {
      const normName = (k.nama || '').replace(/\\s+/g, '').toLowerCase();
      const isPesisir = pesisirList.includes(normName);
      let statusLabel = isPesisir ? 'PESISIR' : 'DARATAN';
      if (k.kelurahanCount > 0) {
        statusLabel = isPesisir ? 'PESISIR & DARAT' : 'DARATAN';
      }

      // Alternating zig-zag layout (Left vs Right like reference image)
      const isEven = (idx % 2 === 1); // idx 0 = odd (Left image, Right text), idx 1 = even (Left text, Right image)

      // Geo corridor tag for storytelling route
      let geoKoridor = 'KORIDOR TENGAH';
      if (idx < 5) geoKoridor = 'KORIDOR UTARA';
      else if (idx >= 10) geoKoridor = 'KORIDOR SELATAN';

      // Dynamic sector progress calculation
      let progressLabel = 'Aktivitas Ekonomi & Rasio Kelistrikan Wilayah';
      let progressPct = 0;
      let progressSub = '';

      if (agregatSector === 'ekonomi') {
        progressPct = Math.min(100, Math.max(2, Math.round(((k.ekonomi?.ikm || 0) / 1440) * 100)));
        progressLabel = 'Kontribusi Sentra Industri Mikro (IMK)';
        progressSub = `${fmt(k.ekonomi?.ikm)} Unit / 1.440 Sentra Tertinggi (Porehu)`;
      } else if (agregatSector === 'lingkungan') {
        progressPct = Math.min(100, Math.round(k.lingkungan?.persenPln || 90));
        progressLabel = 'Rasio Elektrifikasi Listrik PLN';
        progressSub = `${fmt(k.lingkungan?.pln)} KK Berlistrik / Rasio ${progressPct}%`;
      } else if (agregatSector === 'pendidikan') {
        progressPct = Math.min(100, Math.max(5, Math.round(((k.sosial?.totalSaranaPendidikan || 0) / 33) * 100)));
        progressLabel = 'Kapasitas Sarana Pendidikan Formal';
        progressSub = `${fmt(k.sosial?.totalSaranaPendidikan)} Sekolah / 33 Rujukan Terlengkap (Lasusua)`;
      } else if (agregatSector === 'kesehatan') {
        progressPct = Math.min(100, Math.max(5, Math.round(((k.sosial?.totalSaranaKesehatan || 0) / 19) * 100)));
        progressLabel = 'Ketersediaan Fasilitas Kesehatan Murni';
        progressSub = `${fmt(k.sosial?.totalSaranaKesehatan)} Faskes / 19 Rujukan Terlengkap (Lasusua)`;
      } else if (agregatSector === 'pemerintahan') {
        progressPct = Math.min(100, Math.max(5, Math.round(((k.keuangan?.bumdes || 0) / 15) * 100)));
        progressLabel = 'Keaktifan Kelembagaan BUMDes';
        progressSub = `${fmt(k.keuangan?.bumdes)} BUMDes / 15 Unit Tertinggi`;
      } else {
        progressPct = Math.min(100, Math.max(3, Math.round(((k.ekonomi?.ikm || 0) / 1440) * 100)));
        progressLabel = 'Rasio Aktivitas Ekonomi & IMK Terhadap Sentra';
        progressSub = `${fmt(k.ekonomi?.ikm)} IMK / ${fmt(k.lingkungan?.pln)} KK PLN (${progressPct}%)`;
      }

      // Map SVG with Stipple Halftone & Concentric Rings
      const mapData = KECAMATAN_SVG_MAPS[normName] || null;
      let svgMapHtml = '';
      if (mapData) {
        svgMapHtml = `
          <svg viewBox="0 0 100 100" class="w-full h-full max-h-[250px] drop-shadow-[0_8px_20px_rgba(13,110,91,0.14)] overflow-visible">
            <defs>
              <pattern id="stipple-route-${idx}" width="6" height="6" patternUnits="userSpaceOnUse">
                <circle cx="2" cy="2" r="0.8" fill="#0D6E5B" opacity="0.32"/>
              </pattern>
            </defs>
            <!-- Stipple Halftone Pattern Layer -->
            <path d="${mapData.path}" fill="url(#stipple-route-${idx})" stroke="none"/>
            <!-- Main Teal Tint Polygon -->
            <path d="${mapData.path}" fill="rgba(13,110,91,0.14)" stroke="#0D6E5B" stroke-width="2.3" stroke-linejoin="round" stroke-linecap="round" class="group-hover:stroke-[#095244] group-hover:fill-[rgba(13,110,91,0.22)] transition-all duration-300"/>
            <!-- Concentric Node Rings at Centroid / Capital -->
            <circle cx="${mapData.cx}" cy="${mapData.cy}" r="6" fill="#0D6E5B" opacity="0.2"/>
            <circle cx="${mapData.cx}" cy="${mapData.cy}" r="3.8" fill="#0D6E5B" opacity="0.35"/>
            <circle cx="${mapData.cx}" cy="${mapData.cy}" r="2" fill="#0D6E5B"/>
            <circle cx="${mapData.cx}" cy="${mapData.cy}" r="0.75" fill="#FFFFFF"/>
            <!-- Minimal Compass Rose -->
            <g transform="translate(86, 14) scale(0.65)" opacity="0.6">
              <path d="M 0 -12 L 4 0 L 0 -3 L -4 0 Z" fill="#0D6E5B"/>
              <path d="M 0 12 L 4 0 L 0 3 L -4 0 Z" fill="#5A6B65"/>
              <text x="0" y="-14" font-size="7" font-weight="900" fill="#0D6E5B" text-anchor="middle">U</text>
            </g>
          </svg>
        `;
      } else {
        svgMapHtml = `
          <div class="text-xs text-[#5A6B65] font-semibold">Peta Vektor Kolaka Utara</div>
        `;
      }

      // Visual Map Column (Col A)
      const visualMapColumn = `
        <div class="w-full lg:w-[48%] flex flex-col justify-center">
          <!-- Visual Peta Siluet Besar dengan Efek Bingkai Organik, Stipple & Watercolor Wash -->
          <div class="relative w-full h-[240px] sm:h-[280px] lg:h-[300px] rounded-3xl bg-gradient-to-br from-[#0D6E5B]/8 via-white to-[#F7F7F5] border border-[#0D6E5B]/20 p-5 flex items-center justify-center overflow-hidden shadow-[0_8px_30px_rgba(13,110,91,0.06)] group/map">
            <!-- Stipple Pattern Background -->
            <div class="absolute inset-0 opacity-40 pointer-events-none" style="background-image: radial-gradient(#0D6E5B 0.75px, transparent 0.75px); background-size: 8px 8px;"></div>
            
            <!-- Watercolor Wash Accents -->
            <div class="absolute -top-10 -left-10 w-44 h-44 rounded-full bg-[#0D6E5B]/10 blur-2xl pointer-events-none"></div>
            <div class="absolute -bottom-10 -right-10 w-44 h-44 rounded-full bg-emerald-300/15 blur-2xl pointer-events-none"></div>

            <!-- SVG Map Path -->
            ${svgMapHtml}

            <!-- Micro Coordinates Badge -->
            <div class="absolute bottom-3 left-4 px-2.5 py-1 rounded-md bg-white/90 backdrop-blur-xs border border-[#5A6B65]/15 text-[10px] font-mono text-[#5A6B65] flex items-center gap-1.5 shadow-xs">
              <span class="w-1.5 h-1.5 rounded-full bg-[#0D6E5B]"></span>
              <span>Posisi Spasial: ${k.lat ? k.lat.toFixed(3) : '-'}, ${k.lng ? k.lng.toFixed(3) : '-'}</span>
            </div>

            <!-- Stop Tag Overlay -->
            <div class="absolute top-3 right-4 px-2.5 py-1 rounded-full bg-[#0D6E5B]/10 border border-[#0D6E5B]/20 text-[10px] font-mono font-bold text-[#0D6E5B] shadow-2xs">
              STOP ${String(idx + 1).padStart(2, '0')}
            </div>
          </div>
        </div>
      `;

      // Text & Statistic Column (Col B)
      const textStatColumn = `
        <div class="w-full lg:w-[48%] flex flex-col justify-between space-y-4">
          <div>
            <!-- Header Meta Ribbon -->
            <div class="flex items-center gap-2 text-xs font-mono font-bold tracking-wider text-[#5A6B65] uppercase mb-1">
              <span>${k.kode}</span>
              <span>•</span>
              <span class="px-2 py-0.5 rounded-full ${isPesisir ? 'bg-sky-100 text-sky-800' : 'bg-amber-100 text-amber-800'} text-[10px] font-black">${statusLabel}</span>
              <span>•</span>
              <span>${k.desaCount} Desa ${k.kelurahanCount > 0 ? `(${k.kelurahanCount} Kel)` : ''}</span>
            </div>

            <!-- Aksen Garis Pendek Khas Editorial Mike Kus -->
            <div class="w-12 h-1 bg-[#0D6E5B] rounded-full mb-2.5"></div>
            
            <!-- Nama Kecamatan (Besar & Tebal) -->
            <h3 class="text-3xl sm:text-4xl font-black text-[#0D6E5B] tracking-tight leading-none mb-2">
              Kecamatan ${k.nama}
            </h3>

            <!-- Badge Potensi Wilayah -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#0D6E5B]/10 border border-[#0D6E5B]/20 text-xs font-bold text-[#0D6E5B] mb-4">
              <svg class="w-3.5 h-3.5 text-[#0D6E5B] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
              <span>${k.karakteristik || 'Wilayah Strategis Penopang Kemandirian'}</span>
            </div>

            <!-- Progress Bar Persentase Sektoral -->
            <div class="space-y-1.5 bg-white/80 backdrop-blur-xs p-3.5 rounded-2xl border border-[#5A6B65]/15 mb-3.5">
              <div class="flex items-center justify-between text-xs">
                <span class="font-bold text-slate-700">${progressLabel}</span>
                <span class="font-black text-[#0D6E5B] font-mono">${progressPct}%</span>
              </div>
              <div class="w-full h-2 rounded-full bg-slate-200/80 overflow-hidden">
                <div class="h-full rounded-full bg-gradient-to-r from-[#0D6E5B] to-emerald-500 transition-all duration-700" style="width: ${progressPct}%"></div>
              </div>
              <div class="text-[11px] text-[#5A6B65] flex items-center justify-between pt-0.5">
                <span>${progressSub}</span>
                <span class="font-medium text-[10px] font-mono">PODES 2025</span>
              </div>
            </div>

            <!-- 4 Indikator Statistik (Editorial Clean Presentation) -->
            <div class="grid grid-cols-2 gap-2.5 mb-3.5">
              <!-- 1. IMK & Sentra Usaha -->
              <div class="p-3 rounded-2xl bg-white/90 border border-[#5A6B65]/15 hover:border-[#0D6E5B]/40 transition shadow-2xs">
                <div class="flex items-center gap-1.5 text-[11px] font-semibold text-[#5A6B65]">
                  <svg class="w-3.5 h-3.5 text-[#0D6E5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                  <span>IMK & Sentra Usaha</span>
                </div>
                <div class="text-xl font-black text-[#0D6E5B] mt-1">${fmt(k.ekonomi?.ikm)} <span class="text-xs font-semibold text-[#5A6B65]">Unit</span></div>
                <div class="text-[10px] text-[#5A6B65]/80 mt-0.5">${(k.ekonomi?.pasarPerm||0)+(k.ekonomi?.pasarSemi||0)} Pasar • ${k.ekonomi?.bank||0} Bank</div>
              </div>

              <!-- 2. Keluarga Berlistrik -->
              <div class="p-3 rounded-2xl bg-white/90 border border-[#5A6B65]/15 hover:border-[#0D6E5B]/40 transition shadow-2xs">
                <div class="flex items-center gap-1.5 text-[11px] font-semibold text-[#5A6B65]">
                  <svg class="w-3.5 h-3.5 text-[#0D6E5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                  <span>Keluarga Berlistrik</span>
                </div>
                <div class="text-xl font-black text-[#0D6E5B] mt-1">${fmt(k.lingkungan?.pln)} <span class="text-xs font-semibold text-[#5A6B65]">KK</span></div>
                <div class="text-[10px] text-[#5A6B65]/80 mt-0.5">Elektrifikasi: ${k.lingkungan?.persenPln}%</div>
              </div>

              <!-- 3. Sarana Pendidikan -->
              <div class="p-3 rounded-2xl bg-white/90 border border-[#5A6B65]/15 hover:border-[#0D6E5B]/40 transition shadow-2xs">
                <div class="flex items-center gap-1.5 text-[11px] font-semibold text-[#5A6B65]">
                  <svg class="w-3.5 h-3.5 text-[#0D6E5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                  <span>Sarana Pendidikan</span>
                </div>
                <div class="text-xl font-black text-[#0D6E5B] mt-1">${fmt(k.sosial?.totalSaranaPendidikan)} <span class="text-xs font-semibold text-[#5A6B65]">Sekolah</span></div>
                <div class="text-[10px] text-[#5A6B65]/80 mt-0.5">${k.sosial?.totalSDMI||0} SD • ${k.sosial?.totalSMPMTs||0} SMP • ${(k.sosial?.totalSMAMA||0)+(k.sosial?.smk||0)} SMA</div>
              </div>

              <!-- 4. Fasilitas Kesehatan -->
              <div class="p-3 rounded-2xl bg-white/90 border border-[#5A6B65]/15 hover:border-[#0D6E5B]/40 transition shadow-2xs">
                <div class="flex items-center gap-1.5 text-[11px] font-semibold text-[#5A6B65]">
                  <svg class="w-3.5 h-3.5 text-[#0D6E5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                  <span>Fasilitas Kesehatan</span>
                </div>
                <div class="text-xl font-black text-[#0D6E5B] mt-1">${fmt(k.sosial?.totalSaranaKesehatan)} <span class="text-xs font-semibold text-[#5A6B65]">Faskes</span></div>
                <div class="text-[10px] text-[#5A6B65]/80 mt-0.5">${(k.sosial?.puskesmasRI||0)+(k.sosial?.puskesmasNonRI||0)} Pusk • ${(k.sosial?.pustu||0)+(k.sosial?.poskesdes||0)} Pustu/Poskes</div>
              </div>
            </div>

            <!-- Cakupan Wilayah (Daftar Desa) -->
            <div class="text-xs text-[#5A6B65] leading-relaxed bg-white/70 backdrop-blur-xs p-3.5 rounded-2xl border border-[#5A6B65]/15 mb-3.5">
              <span class="font-bold text-slate-800">Cakupan Wilayah (${k.desaCount} Desa):</span>
              <span class="ml-1">${k.desaList ? k.desaList.join(', ') : '-'}</span>
            </div>
          </div>

          <!-- Tombol Pill Buka di Peta WebGIS -->
          <div>
            <button type="button" 
                    onclick="window.PresisiEngine.onKecamatanChange('${k.nama}'); document.getElementById('sectionPeta')?.scrollIntoView({behavior:'smooth'});"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-6 py-3 rounded-full bg-[#0D6E5B] hover:bg-[#095244] text-white text-xs font-bold transition shadow-sm hover:shadow-md transform hover:-translate-y-0.5 cursor-pointer group/btn">
              <span>Buka di Peta WebGIS</span>
              <span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover/btn:translate-x-0.5 transition-transform">
                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
              </span>
            </button>
          </div>
        </div>
      `;

      const isLast = idx === list.length - 1;

      // Connecting Dashed Expedition Trail between stops
      // If current is Odd (visual on left), it connects to Even (visual on right): starts ~250 down to ~750
      // If current is Even (visual on right), it connects to Odd (visual on left): starts ~750 down to ~250
      let connectingRouteSvg = '';
      if (!isLast) {
        if (!isEven) {
          // Left to Right diagonal snake path
          connectingRouteSvg = `
            <div class="hidden lg:flex items-center justify-center w-full h-24 sm:h-28 relative pointer-events-none my-[-10px] z-10">
              <svg class="w-full max-w-5xl h-full overflow-visible" preserveAspectRatio="none" viewBox="0 0 1000 120">
                <path d="M 280,10 L 460,45 L 540,80 L 720,110" 
                      fill="none" 
                      stroke="#5A6B65" 
                      stroke-width="2" 
                      stroke-dasharray="6 6" 
                      opacity="0.5"/>
                <!-- Waypoint Node 1 -->
                <circle cx="460" cy="45" r="4.5" fill="#0D6E5B" stroke="#F7F7F5" stroke-width="2"/>
                <!-- Waypoint Node 2 -->
                <circle cx="540" cy="80" r="4.5" fill="#0D6E5B" stroke="#F7F7F5" stroke-width="2"/>
                <!-- Label Milestone -->
                <text x="500" y="66" font-size="10" font-family="monospace" font-weight="bold" fill="#5A6B65" opacity="0.8" text-anchor="middle">
                  RUTE SPASIAL: STOP ${String(idx + 1).padStart(2, '0')} ➔ STOP ${String(idx + 2).padStart(2, '0')}
                </text>
              </svg>
            </div>
          `;
        } else {
          // Right to Left diagonal snake path
          connectingRouteSvg = `
            <div class="hidden lg:flex items-center justify-center w-full h-24 sm:h-28 relative pointer-events-none my-[-10px] z-10">
              <svg class="w-full max-w-5xl h-full overflow-visible" preserveAspectRatio="none" viewBox="0 0 1000 120">
                <path d="M 720,10 L 540,45 L 460,80 L 280,110" 
                      fill="none" 
                      stroke="#5A6B65" 
                      stroke-width="2" 
                      stroke-dasharray="6 6" 
                      opacity="0.5"/>
                <!-- Waypoint Node 1 -->
                <circle cx="540" cy="45" r="4.5" fill="#0D6E5B" stroke="#F7F7F5" stroke-width="2"/>
                <!-- Waypoint Node 2 -->
                <circle cx="460" cy="80" r="4.5" fill="#0D6E5B" stroke="#F7F7F5" stroke-width="2"/>
                <!-- Label Milestone -->
                <text x="500" y="66" font-size="10" font-family="monospace" font-weight="bold" fill="#5A6B65" opacity="0.8" text-anchor="middle">
                  RUTE SPASIAL: STOP ${String(idx + 1).padStart(2, '0')} ➔ STOP ${String(idx + 2).padStart(2, '0')}
                </text>
              </svg>
            </div>
          `;
        }
      }

      // If !isEven: Visual on Left, Text on Right (lg:flex-row)
      // If isEven: Text on Left, Visual on Right (lg:flex-row-reverse)
      return `
        <div class="relative group">
          <!-- Storytelling Route Row: Alternating Left-Right Spread -->
          <div class="flex flex-col ${isEven ? 'lg:flex-row-reverse' : 'lg:flex-row'} items-center justify-between gap-8 lg:gap-12 relative p-2 sm:p-4">
            ${visualMapColumn}
            ${textStatColumn}
          </div>

          <!-- SVG Dashed Route Line Between Stops (Snaking between Left and Right) -->
          ${connectingRouteSvg}
        </div>
      `;
    }).join('');
  }

  return {
    init: init,
    setCategory: setCategory,
    setViewMode: setViewMode,
    toggleSplitView: toggleSplitView,
    setAdminLevel: setAdminLevel,
    toggleTematik: toggleTematik,
    onKecamatanChange: onKecamatanChange,
    onDesaChange: onDesaChange,
    resetFilter: resetFilter,
    resetMapView: resetMapView,
    toggleMapFullscreen: toggleMapFullscreen,
    onTableSearch: onTableSearch,
    exportCSV: exportCSV,
    renderAgregatKecamatanSection: renderAgregatKecamatanSection,
    setAgregatSector: setAgregatSector,
    onSearchKecamatanCard: onSearchKecamatanCard,
    onSortKecamatanCard: onSortKecamatanCard
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
