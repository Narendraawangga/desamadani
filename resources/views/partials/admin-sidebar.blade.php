<!-- ===== SIDEBAR ADMIN EKSEKUTIF DESA MADANI BPS DENGAN DROPDOWN ACCORDION ===== -->
<aside id="adminSidebar" class="admin-sidebar d-flex flex-column">
    
    <!-- Sidebar Brand Header (Identik dengan Header Portal Utama) -->
    <div class="px-3.5 py-3 border-bottom border-white border-opacity-10 d-flex align-items-center justify-content-between shrink-0">
        <a href="/admin" class="d-flex align-items-center gap-2.5 text-decoration-none group" title="Portal Eksekutif Admin Desa Madani">
            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                <img src="/images/logo_kolaka_utara.png" alt="Pemkab Kolaka Utara" style="height: 28px; width: auto; object-fit: contain;">
                <div style="height: 18px; width: 1px; background: rgba(255,255,255,0.2);"></div>
                <img src="/images/logo_bps.png" alt="BPS Kolut" style="height: 24px; width: auto; object-fit: contain;">
            </div>
            <div>
                <div class="fw-black text-white text-uppercase" style="font-family: 'Cinzel', serif; font-size: 14.5px; letter-spacing: 0.05em; line-height: 1.1;">
                    DESA <span style="color: #34d399;">MADANI</span>
                </div>
                <div class="text-white-50 fw-semibold text-uppercase d-flex align-items-center gap-1.5" style="font-size: 9.5px; letter-spacing: 0.12em; margin-top: 2px;">
                    <span class="spinner-grow spinner-grow-sm text-success" style="width: 5px; height: 5px;"></span>
                    <span>PORTAL ADMIN BPS</span>
                </div>
            </div>
        </a>
        <button class="btn btn-sm btn-link text-white-50 d-lg-none p-0 text-decoration-none" onclick="toggleSidebar()">
            <i class="bi bi-x-lg fs-5"></i>
        </button>
    </div>

    <!-- Sidebar Navigation Items (Dropdown Accordion Groups) -->
    <div class="flex-grow-1 overflow-y-auto px-3 py-3 no-scrollbar space-y-2">
        
        <!-- Grup 1: Ringkasan & Analitik (Dropdown) -->
        <div class="admin-nav-group mb-2">
            <button type="button" class="btn btn-sm w-100 text-start text-white-50 fw-bold px-2 py-1.5 d-flex align-items-center justify-content-between text-uppercase border-0 shadow-none" onclick="toggleAdminNavGroup('group-admin-analytics')" style="font-size: 9.5px; letter-spacing: 0.8px;">
                <span class="d-flex align-items-center gap-1.5">
                    <span class="rounded-circle bg-emerald-400 d-inline-block" style="width: 6px; height: 6px;"></span>
                    <span>Analitik & Ringkasan</span>
                </span>
                <i class="bi bi-chevron-down fs-8 text-white-50" id="icon-group-admin-analytics"></i>
            </button>
            <div id="group-admin-analytics" class="space-y-1 mt-1">
                <button type="button" onclick="switchAdminTab('overview')" id="tabBtnOverview" class="sidebar-nav-link active w-100 text-start">
                    <span class="d-flex align-items-center gap-2.5">
                        <i class="bi bi-speedometer2 fs-6"></i>
                        <span>Ringkasan Eksekutif</span>
                    </span>
                </button>
                <button type="button" onclick="switchAdminTab('spatial')" id="tabBtnSpatial" class="sidebar-nav-link w-100 text-start">
                    <span class="d-flex align-items-center gap-2.5">
                        <i class="bi bi-geo-alt fs-6"></i>
                        <span>Pemetaan Spasial</span>
                    </span>
                </button>
            </div>
        </div>

        <!-- Grup 2: Data PODES & Desa (Dropdown) -->
        <div class="admin-nav-group mb-2">
            <button type="button" class="btn btn-sm w-100 text-start text-white-50 fw-bold px-2 py-1.5 d-flex align-items-center justify-content-between text-uppercase border-0 shadow-none" onclick="toggleAdminNavGroup('group-admin-podes')" style="font-size: 9.5px; letter-spacing: 0.8px;">
                <span class="d-flex align-items-center gap-1.5">
                    <span class="rounded-circle bg-cyan-400 d-inline-block" style="width: 6px; height: 6px;"></span>
                    <span>Data PODES & Desa</span>
                </span>
                <i class="bi bi-chevron-down fs-8 text-white-50" id="icon-group-admin-podes"></i>
            </button>
            <div id="group-admin-podes" class="space-y-1 mt-1">
                <button type="button" onclick="switchAdminTab('podes')" id="tabBtnPodes" class="sidebar-nav-link w-100 text-start">
                    <span class="d-flex align-items-center gap-2.5">
                        <i class="bi bi-file-earmark-spreadsheet fs-6"></i>
                        <span>Input PODES</span>
                    </span>
                </button>
                <button type="button" onclick="switchAdminTab('desa')" id="tabBtnDesa" class="sidebar-nav-link w-100 text-start">
                    <span class="d-flex align-items-center gap-2.5">
                        <i class="bi bi-buildings fs-6"></i>
                        <span>Master Data Desa</span>
                    </span>
                </button>
                @if($admin->isAdmin())
                    <button type="button" onclick="openSyncSpreadsheetModal()" class="sidebar-nav-link w-100 text-start">
                        <span class="d-flex align-items-center gap-2.5">
                            <i class="bi bi-arrow-repeat fs-6 text-emerald-400"></i>
                            <span>Sinkron Excel PODES</span>
                        </span>
                    </button>
                @endif
                <button type="button" onclick="exportDataToCSV()" class="sidebar-nav-link w-100 text-start">
                    <span class="d-flex align-items-center gap-2.5">
                        <i class="bi bi-download fs-6"></i>
                        <span>Ekspor CSV Master</span>
                    </span>
                </button>
            </div>
        </div>

        <!-- Grup 3: Manajemen Pengguna & Otoritas (Dropdown) -->
        @if($admin->isAdmin())
            <div class="admin-nav-group mb-2">
                <button type="button" class="btn btn-sm w-100 text-start text-white-50 fw-bold px-2 py-1.5 d-flex align-items-center justify-content-between text-uppercase border-0 shadow-none" onclick="toggleAdminNavGroup('group-admin-users')" style="font-size: 9.5px; letter-spacing: 0.8px;">
                    <span class="d-flex align-items-center gap-1.5">
                        <span class="rounded-circle bg-amber-400 d-inline-block" style="width: 6px; height: 6px;"></span>
                        <span>Pengguna & Otoritas</span>
                    </span>
                    <i class="bi bi-chevron-down fs-8 text-white-50" id="icon-group-admin-users"></i>
                </button>
                <div id="group-admin-users" class="space-y-1 mt-1">
                    <button type="button" onclick="switchAdminTab('users')" id="tabBtnUsers" class="sidebar-nav-link w-100 text-start">
                        <span class="d-flex align-items-center gap-2.5">
                            <i class="bi bi-people fs-6"></i>
                            <span>Kelola Pengguna</span>
                        </span>
                    </button>
                </div>
            </div>
        @endif

        <!-- Grup 4: Tautan Eksternal & Publik -->
        <div class="admin-nav-group mb-2">
            <div class="text-uppercase text-white-50 fw-bold px-2 mb-2" style="font-size: 9.5px; letter-spacing: 0.8px;">
                Portal Eksternal
            </div>
            <a href="/portal" target="_blank" class="sidebar-nav-link w-100 text-start text-decoration-none">
                <span class="d-flex align-items-center gap-2.5">
                    <i class="bi bi-globe2 fs-6 text-warning"></i>
                    <span>Portal Publik WebGIS</span>
                </span>
                <i class="bi bi-box-arrow-up-right text-white-50" style="font-size: 10px;"></i>
            </a>
            <a href="/descan" target="_blank" class="sidebar-nav-link w-100 text-start text-decoration-none mt-1">
                <span class="d-flex align-items-center gap-2.5">
                    <i class="bi bi-stars fs-6 text-info"></i>
                    <span>Portal Desa Cantik</span>
                </span>
                <i class="bi bi-box-arrow-up-right text-white-50" style="font-size: 10px;"></i>
            </a>
        </div>

    </div>

    <!-- Sidebar Footer: Profile & Logout -->
    <div class="p-3 border-top border-white border-opacity-10 bg-black bg-opacity-30 d-flex align-items-center justify-content-between shrink-0">
        <div class="d-flex align-items-center gap-2.5 overflow-hidden">
            <div class="rounded-circle d-flex align-items-center justify-content-center fw-black text-white" style="width: 36px; height: 36px; font-size: 13px; flex-shrink: 0; background: linear-gradient(135deg, #059669 0%, #047857 100%); box-shadow: 0 2px 8px rgba(5, 150, 105, 0.4);">
                {{ strtoupper(substr($admin->name ?? 'A', 0, 1)) }}
            </div>
            <div class="overflow-hidden">
                <div class="text-white fw-bold text-truncate" style="font-size: 12px;">{{ $admin->name }}</div>
                @if($admin->isOperatorDesa())
                    <div class="text-emerald-300 text-truncate fw-semibold" style="font-size: 10px;">
                        <i class="bi bi-house-door-fill me-1"></i>Desa {{ $admin->desa }}
                    </div>
                @else
                    <div class="text-white-50 text-truncate font-mono" style="font-size: 10px;">{{ $admin->email }}</div>
                @endif
            </div>
        </div>

        <!-- Logout Form -->
        <form method="POST" action="/logout" onsubmit="return confirm('Apakah Anda yakin ingin keluar dari Portal Admin?');">
            @csrf
            <button type="submit" class="btn btn-sm btn-link text-white-50 p-1 text-decoration-none hover:text-white" title="Keluar / Logout">
                <i class="bi bi-box-arrow-right fs-5"></i>
            </button>
        </form>
    </div>
</aside>

<script>
    function toggleAdminNavGroup(groupId) {
        const groupEl = document.getElementById(groupId);
        const iconEl = document.getElementById('icon-' + groupId);
        if (!groupEl) return;
        
        if (groupEl.style.display === 'none') {
            groupEl.style.display = 'block';
            if (iconEl) iconEl.className = 'bi bi-chevron-down fs-8 text-white-50';
        } else {
            groupEl.style.display = 'none';
            if (iconEl) iconEl.className = 'bi bi-chevron-right fs-8 text-white-50';
        }
    }
</script>
