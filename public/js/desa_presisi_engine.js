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
    c2: null
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
      distTitle: "Status Pencemaran Lingkungan",
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
      distTitle: "Ketersediaan Sarana Kesehatan",
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
      distTitle: "Kepemilikan Aset & Inventaris Desa",
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
      distTitle: "Status Pemerintahan & Letak Geografis",
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
      updatePresisiCharts();
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

  // CHARTS IMPLEMENTATION (Chart.js)
  function initPresisiCharts() {
    if (typeof Chart === 'undefined') return;

    ['c1', 'c2'].forEach(k => {
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
    if (!ctx1 || !ctx2) return;

    const cfg = CATEGORY_CONFIG[currentCategory];
    const chartData = getCategoryChartData(currentCategory);

    // Update Titles & Badges
    const t1 = document.getElementById('titleChart1');
    const b1 = document.getElementById('labelChart1Badge');
    const t2 = document.getElementById('titleChart2');
    const b2 = document.getElementById('labelChart2Badge');

    if (t1) t1.textContent = currentKecamatan === 'ALL' ? cfg.chartTitle : `${cfg.metricLabel} di Kec. ${currentKecamatan}`;
    if (b1) b1.textContent = cfg.chartBadge;
    if (t2) t2.textContent = cfg.distTitle;
    if (b2) b2.textContent = cfg.distBadge;

    if (charts.c1) charts.c1.destroy();
    if (charts.c2) charts.c2.destroy();

    charts.c1 = new Chart(ctx1, chartData.chart1);
    charts.c2 = new Chart(ctx2, chartData.chart2);
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
                backgroundColor: '#ea580c',
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
              labels: ['Minimarket', 'Restoran', 'Penginapan', 'Pasar', 'Pertokoan'],
              datasets: [{
                data: [kab.ekonomi.minimarket, kab.ekonomi.resto, kab.ekonomi.hotel + kab.ekonomi.penginapan, kab.ekonomi.pasarPerm + kab.ekonomi.pasarSemi, kab.ekonomi.pertokoan],
                backgroundColor: ['#10b981', '#06b6d4', '#3b82f6', '#f59e0b', '#ec4899']
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
                backgroundColor: '#059669',
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
              labels: ['PLN (38.077)', 'Non-PLN (3.348)', 'Bukan Listrik (188)'],
              datasets: [{
                data: [kab.lingkungan.pln, kab.lingkungan.nonPln, kab.lingkungan.bukanListrik],
                backgroundColor: ['#059669', '#f59e0b', '#ef4444']
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
                label: 'Jumlah Fasilitas',
                data: data1,
                backgroundColor: '#2563eb',
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
              labels: ['SD/MI (124)', 'SMP/MTs (54)', 'SMA/SMK (26)', 'Puskesmas/Pustu (47)', 'Posyandu (133)'],
              datasets: [{
                data: [kab.sosial.totalSDMI, kab.sosial.totalSMPMTs, kab.sosial.totalSMAMA + kab.sosial.smk, kab.sosial.puskesmasRI + kab.sosial.puskesmasNonRI + kab.sosial.pustu, kab.sosial.posyandu],
                backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6']
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
                backgroundColor: '#7c3aed',
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
              labels: ['Ada BUMDes (123)', 'Ada Tanah Kas (78)', 'Penerima PADes (118)'],
              datasets: [{
                data: [kab.keuangan.bumdes, 78, 118],
                backgroundColor: ['#7c3aed', '#059669', '#3b82f6']
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
                label: isMacro ? 'Desa Sekitar Hutan' : 'Luas Wilayah (km²)',
                data: data1,
                backgroundColor: '#0f766e',
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
              labels: ['Kawasan Hutan (75)', 'Luar Hutan (58)', 'Wilayah Pesisir (42)'],
              datasets: [{
                data: [kab.umum.sekitarHutan, kab.umum.luarHutan, kab.umum.pesisirLaut],
                backgroundColor: ['#047857', '#64748b', '#0284c7']
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
                label: 'Aparatur Desa',
                data: data1,
                backgroundColor: '#4338ca',
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
              labels: ['Kades Laki (115)', 'Kades Perempuan (18)', 'Sekdes Laki (121)', 'Sekdes Perempuan (12)'],
              datasets: [{
                data: [kab.pemerintah.kadesLaki, kab.pemerintah.kadesPerempuan, kab.pemerintah.sekdesLaki, kab.pemerintah.sekdesPerempuan],
                backgroundColor: ['#1e40af', '#ec4899', '#0284c7', '#f43f5e']
              }]
            },
            options: { responsive: true, maintainAspectRatio: false }
          }
        };
    }
  }

  // RAPOR PRESISI DESA (Detailed 6-Sector Profile on Main Center Viewport)
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
    exportCSV: exportCSV
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
