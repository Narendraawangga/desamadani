<!-- ============================================================== -->
<!-- BANNER SIMULASI MULTI-PERAN PENGGUNA (SRS MODUL A: UC-01/02/03)-->
<!-- Super Admin, Admin BPS, Admin Operator Desa, Publik            -->
<!-- ============================================================== -->
<div class="bg-white rounded-2xl p-3.5 sm:p-4 border border-rose-200/80 shadow-2xs flex flex-col lg:flex-row lg:items-center justify-between gap-3">
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-rose-50 text-[#800040] flex items-center justify-center font-bold text-lg shrink-0 border border-rose-200">
            <i class="bi bi-person-badge-fill"></i>
        </div>
        <div>
            <div class="flex items-center gap-2 flex-wrap">
                <span class="text-xs font-black text-slate-900 tracking-tight">Simulasi Peran Pengguna (SRS Descan):</span>
                <span id="currentRoleBadge" class="text-[10px] font-black uppercase px-2.5 py-0.5 rounded-full bg-rose-100 text-[#800040] border border-rose-300">
                    Admin Operator Desa
                </span>
                <span id="currentRoleVillageBadge" class="text-[10px] font-bold text-[#800040] bg-rose-50 px-2 py-0.5 rounded-md border border-rose-200">
                    Desa Kamisi • Kec. Kodeoha
                </span>
            </div>
            <p class="text-[11px] text-slate-500 mt-0.5">
                Ganti peran untuk menguji hak akses: Master Kontrol (Super Admin), Pembina &amp; Evaluasi (Admin BPS), Input &amp; Pengesahan (Admin Operator Desa), dan Transparansi (Publik).
            </p>
        </div>
    </div>

    <!-- Role Switcher Button Group (Super Admin, Admin BPS, Admin Operator Desa, Publik) -->
    <div class="flex items-center gap-1.5 flex-wrap self-start lg:self-auto bg-slate-100 p-1 rounded-xl border border-slate-200">
        <button type="button" onclick="setUserRoleContext('super_admin')" id="role-btn-super_admin" class="role-pill-btn px-3 py-1.5 rounded-lg text-xs font-bold text-slate-600 hover:text-slate-900 transition cursor-pointer">
            <i class="bi bi-shield-shaded mr-1 text-[#800040]"></i><span>Super Admin</span>
        </button>
        <button type="button" onclick="setUserRoleContext('admin_bps')" id="role-btn-admin_bps" class="role-pill-btn px-3 py-1.5 rounded-lg text-xs font-bold text-slate-600 hover:text-slate-900 transition cursor-pointer">
            <i class="bi bi-building-gear mr-1 text-[#800040]"></i><span>Admin BPS</span>
        </button>
        <button type="button" onclick="setUserRoleContext('operator_desa')" id="role-btn-operator_desa" class="role-pill-btn active px-3 py-1.5 rounded-lg text-xs font-bold transition cursor-pointer bg-white text-[#800040] shadow-xs border border-rose-200">
            <i class="bi bi-person-workspace mr-1 text-[#800040]"></i><span>Admin Operator Desa</span>
        </button>
        <button type="button" onclick="setUserRoleContext('publik')" id="role-btn-publik" class="role-pill-btn px-3 py-1.5 rounded-lg text-xs font-bold text-slate-600 hover:text-slate-900 transition cursor-pointer">
            <i class="bi bi-globe mr-1 text-[#800040]"></i><span>Publik</span>
        </button>
    </div>
</div>
