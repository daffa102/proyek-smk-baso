@php
    use Illuminate\Support\Facades\Storage;
@endphp

<div>

    <body class="bg-slate-50 text-slate-900 font-sans antialiased">

        <!-- Navbar Minimalis -->
        <nav class="fixed top-0 w-full z-50 glass-header px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="index.html" class="flex items-center gap-2">
                    <div
                        class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">
                        H</div>
                    <span class="text-xl font-black tracking-tight text-slate-900">Hadirin</span>
                </a>
                <div class="h-6 w-[1px] bg-slate-200 mx-2 hidden md:block"></div>
                <span class="text-sm font-bold text-slate-500 hidden md:block uppercase tracking-widest">Portal
                    Guru</span>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('guru.profile') }}"
                    class="hidden sm:flex flex-col items-end mr-2 hover:opacity-80 transition-opacity">
                    <p class="text-sm font-black text-slate-900">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] font-bold text-blue-600 uppercase">{{ auth()->user()->role }}</p>
                </a>
                <a href="{{ route('guru.profile') }}" class="group">
                    @if (auth()->user()->foto)
                        <img src="{{ Storage::url(auth()->user()->foto) }}" alt="{{ auth()->user()->name }}"
                            class="w-10 h-10 rounded-xl object-cover ring-2 ring-blue-100 group-hover:ring-blue-500 transition-all">
                    @else
                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center ring-2 ring-blue-100 group-hover:ring-blue-500 transition-all">
                            <span
                                class="text-sm font-black text-white">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        </div>
                    @endif
                </a>
                <form id="logout-form-guru-dashboard" action="{{ route('logout') }}" method="POST"
                    class="inline-block">
                    @csrf
                    <button type="button" onclick="confirmLogout('logout-form-guru-dashboard')"
                        class="p-2 text-slate-400 hover:text-red-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                    </button>
                </form>
            </div>
        </nav>

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

        <!-- Main Content -->
        <main class="pt-28 pb-20 px-6 max-w-7xl mx-auto">
            <!-- Header & Greeting -->
            <header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h1 class="text-4xl font-black text-slate-900 tracking-tight">Presensi Siswa</h1>
                    <p class="text-slate-500 font-bold mt-2">Kelola kehadiran siswa di setiap mata pelajaran Anda hari
                        ini.</p>
                </div>
            </header>

            <!-- Filter Section -->
            <section class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">
                <!-- Filter Mata Pelajaran -->
                <div
                    class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 group hover:border-blue-500 transition-all">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3 px-1">Mata
                        Pelajaran</label>
                    <div class="relative">
                        <select wire:model.live="mapel_id"
                            class="w-full bg-slate-50 border-none rounded-xl px-4 py-3.5 font-bold text-slate-700 appearance-none focus:ring-2 focus:ring-blue-500/20 outline-none cursor-pointer">
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach ($mapels as $mapel)
                                <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                            @endforeach
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Filter Kelas -->
                <div
                    class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 group hover:border-blue-500 transition-all">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3 px-1">Pilih
                        Kelas</label>
                    <div class="relative">
                        <select wire:model.live="kelas_id"
                            class="w-full bg-slate-50 border-none rounded-xl px-4 py-3.5 font-bold text-slate-700 appearance-none focus:ring-2 focus:ring-blue-500/20 outline-none cursor-pointer">
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelases as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                            @endforeach
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Filter Tahun Ajaran -->
                <div
                    class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 group hover:border-blue-500 transition-all">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3 px-1">Tahun
                        Ajaran</label>
                    <div class="relative">
                        <select wire:model="tahun_ajaran"
                            class="w-full bg-slate-50 border-none rounded-xl px-4 py-3.5 font-bold text-slate-700 appearance-none focus:ring-2 focus:ring-blue-500/20 outline-none cursor-pointer">
                            @foreach ($tahunAjaranList as $ta)
                                <option value="{{ $ta }}">{{ $ta }}</option>
                            @endforeach
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Date Display -->
                <div
                    class="bg-blue-600 p-6 rounded-[2rem] shadow-lg shadow-blue-500/20 flex items-center justify-between">
                    <div class="text-white">
                        <p class="text-[10px] font-black text-blue-200 uppercase tracking-widest block mb-1">Tanggal
                            Hari Ini</p>
                        <h3 class="text-xl font-black">{{ now()->translatedFormat('d M Y') }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-blue-500/50 rounded-2xl flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                    </div>
                </div>
            </section>

            <!-- Student List -->
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div
                    class="p-8 border-b border-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <h3 class="text-xl font-black text-slate-900">Daftar Siswa</h3>
                        <p class="text-slate-400 text-sm font-bold">
                            @if ($kelas_id && $mapel_id)
                                {{ count($students) }} siswa ditemukan
                            @else
                                Pilih kelas dan mata pelajaran untuk melihat daftar siswa
                            @endif
                        </p>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="relative flex-1 md:w-64">
                            <input type="text" wire:model.live="search" placeholder="Cari nama siswa..."
                                class="w-full bg-slate-50 border-none rounded-xl pl-10 pr-4 py-3 text-sm font-bold focus:ring-2 focus:ring-blue-500/20 outline-none">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                        <button wire:click="saveAttendance" wire:loading.attr="disabled"
                            class="bg-blue-600 text-white px-6 py-3 rounded-xl font-black text-sm shadow-md hover:bg-blue-700 transition-all disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
                            <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                <polyline points="17 21 17 13 7 13 7 21" />
                                <polyline points="7 3 7 8 15 8" />
                            </svg>
                            <svg wire:loading class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span>Simpan Absensi</span>
                        </button>
                    </div>
                </div>

                <!-- Success/Error Messages -->
                @if (session()->has('success'))
                    <div class="mx-8 mt-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-2xl">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-sm font-bold text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="mx-8 mt-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-2xl">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-sm font-bold text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    @if (count($students) === 0)
                        <!-- Empty State -->
                        <div class="flex flex-col items-center justify-center py-16 px-4">
                            <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                                    <path d="M20 21a8 8 0 0 0-16 0" />
                                    <circle cx="12" cy="8" r="5" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-black text-slate-400 mb-2">Tidak Ada Siswa</h4>
                            <p class="text-sm font-bold text-slate-400">
                                @if (!$kelas_id || !$mapel_id)
                                    Pilih kelas dan mata pelajaran terlebih dahulu
                                @else
                                    Tidak ada siswa di kelas ini
                                @endif
                            </p>
                        </div>
                    @else
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-slate-50/50 text-slate-400">
                                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest">Siswa</th>
                                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-center">
                                        Hadir</th>
                                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-center">
                                        Sakit</th>
                                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-center">
                                        Izin
                                    </th>
                                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-center">
                                        Alpa
                                    </th>
                                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest">Keterangan
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach ($students as $student)
                                    @php
                                        $initials = collect(explode(' ', $student->nama))
                                            ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                                            ->take(2)
                                            ->join('');
                                        $colors = ['blue', 'amber', 'green', 'purple', 'red', 'pink', 'indigo'];
                                        $color = $colors[crc32($student->nama) % count($colors)];
                                    @endphp
                                    <tr class="hover:bg-slate-50/30 transition-colors">
                                        <td class="px-8 py-5">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 bg-{{ $color }}-100 rounded-xl flex items-center justify-center text-{{ $color }}-600 font-bold text-sm">
                                                    {{ $initials }}
                                                </div>
                                                <div>
                                                    <p class="text-sm font-black text-slate-900">{{ $student->nama }}
                                                    </p>
                                                    <p class="text-[11px] font-bold text-slate-400">
                                                        {{ $student->nis ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-5 text-center">
                                            <input type="radio" wire:model="attendance.{{ $student->id }}.status"
                                                value="hadir" class="w-5 h-5 accent-green-600 cursor-pointer">
                                        </td>
                                        <td class="px-8 py-5 text-center">
                                            <input type="radio" wire:model="attendance.{{ $student->id }}.status"
                                                value="sakit" class="w-5 h-5 accent-amber-500 cursor-pointer">
                                        </td>
                                        <td class="px-8 py-5 text-center">
                                            <input type="radio" wire:model="attendance.{{ $student->id }}.status"
                                                value="izin" class="w-5 h-5 accent-blue-500 cursor-pointer">
                                        </td>
                                        <td class="px-8 py-5 text-center">
                                            <input type="radio" wire:model="attendance.{{ $student->id }}.status"
                                                value="alpha" class="w-5 h-5 accent-red-500 cursor-pointer">
                                        </td>
                                        <td class="px-8 py-5">
                                            <input type="text"
                                                wire:model="attendance.{{ $student->id }}.keterangan"
                                                placeholder="..."
                                                class="bg-slate-50 border-none rounded-lg px-3 py-2 text-xs font-bold w-full outline-none focus:ring-1 focus:ring-blue-500/20">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </main>

    </body>
</div>
