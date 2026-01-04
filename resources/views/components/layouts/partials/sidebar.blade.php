@php
    use Illuminate\Support\Facades\Storage;
@endphp

<!-- Sidebar -->
<aside class="w-72 fixed inset-y-0 left-0 glass-sidebar z-50 hidden lg:flex flex-col p-6">
    <!-- Logo -->
    <div class="flex items-center gap-3 px-2 mb-10">
        <div
            class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">
            H</div>
        <span class="text-xl font-black tracking-tight text-slate-900">Hadirin</span>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 space-y-2">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] px-3 mb-4">Menu Utama</p>

        <a href="{{ route('admin.dashboard') }}"
            class="{{ request()->routeIs('admin.dashboard') ? 'sidebar-item-active text-white' : 'sidebar-item' }} flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="7" height="7" />
                <rect x="14" y="3" width="7" height="7" />
                <rect x="14" y="14" width="7" height="7" />
                <rect x="3" y="14" width="7" height="7" />
            </svg>
            Dashboard
        </a>

        <a href="{{ route('admin.guru.index') }}"
            class="{{ request()->routeIs('admin.guru.index') ? 'sidebar-item-active text-white' : 'sidebar-item' }} flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            Data Guru
        </a>

        <a href="{{ route('admin.kelas.index') }}"
            class="{{ request()->routeIs('admin.kelas.index') ? 'sidebar-item-active text-white' : 'sidebar-item' }} flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z" />
                <path d="M3 9V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v4" />
                <path d="M13 13h4" />
                <path d="M13 17h4" />
            </svg>
            Data Kelas
        </a>

        <a href="{{ route('admin.mapel.index') }}"
            class="{{ request()->routeIs('admin.mapel.index') ? 'sidebar-item-active text-white' : 'sidebar-item' }} flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z" />
                <path d="M8 7h6" />
                <path d="M8 11h8" />
            </svg>
            Data Mapel
        </a>

        <a href="{{ route('admin.murid.index') }}"
            class="{{ request()->routeIs('admin.murid.index') ? 'sidebar-item-active text-white' : 'sidebar-item' }} flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="8" r="5" />
                <path d="M20 21a8 8 0 0 0-16 0" />
            </svg>
            Data Murid
        </a>
    </nav>

    <!-- Bottom Profile -->
    <div class="mt-auto pt-6 border-t border-slate-100">
        <a href="{{ route('admin.profile') }}"
            class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-100 transition-all group">
            @if (auth()->user()->foto)
                <img src="{{ Storage::url(auth()->user()->foto) }}" alt="{{ auth()->user()->name }}"
                    class="w-10 h-10 rounded-xl object-cover ring-2 ring-slate-100 group-hover:ring-blue-500 transition-all">
            @else
                <div
                    class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center ring-2 ring-slate-100 group-hover:ring-blue-500 transition-all">
                    <span
                        class="text-sm font-black text-white">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                </div>
            @endif
            <div class="flex-1 overflow-hidden">
                <p class="text-sm font-black text-slate-900 truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs font-bold text-slate-400 truncate">{{ auth()->user()->email }}</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                class="text-slate-400 group-hover:text-blue-600 transition-colors">
                <path d="M9 18l6-6-6-6" />
            </svg>
        </a>
        <form id="logout-form-admin" action="{{ route('logout') }}" method="POST" class="w-full mt-4">
            @csrf
            <button type="button" onclick="confirmLogout('logout-form-admin')"
                class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl font-bold text-red-500 hover:bg-red-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
                Keluar
            </button>
        </form>
    </div>

    <script>
        function confirmLogout(formId) {
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Apakah Anda yakin ingin keluar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-3xl',
                    confirmButton: 'rounded-xl font-bold px-6 py-3',
                    cancelButton: 'rounded-xl font-bold px-6 py-3'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
</aside>
