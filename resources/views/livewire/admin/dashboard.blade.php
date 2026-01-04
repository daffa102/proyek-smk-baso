<main>
    <!-- Header -->
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Overview Dashboard</h1>
            <p class="text-slate-500 font-bold mt-1">Selamat datang kembali, Admin!</p>
        </div>
    </header>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Guru Stats -->
        <div
            class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center gap-5 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase">Guru</p>
                <h4 class="text-2xl font-black text-slate-900">{{ $totalGuru }}</h4>
            </div>
        </div>

        <!-- Kelas Stats -->
        <div
            class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center gap-5 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z" />
                    <path d="M3 9V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v4" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase">Kelas</p>
                <h4 class="text-2xl font-black text-slate-900">{{ $totalKelas }}</h4>
            </div>
        </div>

        <!-- Murid Stats -->
        <div
            class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center gap-5 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21a8 8 0 0 0-16 0" />
                    <circle cx="12" cy="8" r="5" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase">Murid</p>
                <h4 class="text-2xl font-black text-slate-900">{{ $totalSiswa }}</h4>
            </div>
        </div>

        <!-- Mapel Stats -->
        <div
            class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center gap-5 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase">Mapel</p>
                <h4 class="text-2xl font-black text-slate-900">{{ $totalMapel }}</h4>
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8 mb-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                </svg>
            </div>
            <div>
                <h3 class="text-xl font-black text-slate-900">Filter Laporan</h3>
                <p class="text-slate-400 text-sm font-bold">Pilih periode dan detail untuk laporan absensi</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <!-- Month Filter -->
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase mb-2">Bulan</label>
                <select wire:model.live="month"
                    class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-blue-500 focus:ring-0 text-sm font-bold text-slate-700 transition-colors">
                    @foreach ($months as $m)
                        <option value="{{ $m['val'] }}">{{ $m['label'] }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Year Filter -->
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase mb-2">Tahun</label>
                <select wire:model.live="year"
                    class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-blue-500 focus:ring-0 text-sm font-bold text-slate-700 transition-colors">
                    @foreach ($years as $y)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Kelas Filter -->
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase mb-2">Kelas</label>
                <select wire:model.live="kelas_id"
                    class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-blue-500 focus:ring-0 text-sm font-bold text-slate-700 transition-colors">
                    <option value="">Semua Kelas</option>
                    @foreach ($kelases as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Mapel Filter -->
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase mb-2">Mata Pelajaran</label>
                <select wire:model.live="mapel_id"
                    class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-blue-500 focus:ring-0 text-sm font-bold text-slate-700 transition-colors">
                    <option value="">Semua Mapel</option>
                    @foreach ($mapels as $mapel)
                        <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Export Buttons -->
        <div class="flex flex-col sm:flex-row gap-3">
            <button wire:click="exportExcel"
                class="flex items-center justify-center gap-2 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-black rounded-xl transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                    <polyline points="7 10 12 15 17 10" />
                    <line x1="12" x2="12" y1="15" y2="3" />
                </svg>
                Export Excel
            </button>

            <button wire:click="exportPdf"
                class="flex items-center justify-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-black rounded-xl transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                    <line x1="16" x2="8" y1="13" y2="13" />
                    <line x1="16" x2="8" y1="17" y2="17" />
                    <polyline points="10 9 9 9 8 9" />
                </svg>
                Export PDF
            </button>
        </div>

        <!-- Error Messages -->
        @error('kelas_id')
            <div class="mt-4 px-4 py-3 bg-red-50 border-2 border-red-200 rounded-xl flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round" class="text-red-600">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" x2="12" y1="8" y2="12" />
                    <line x1="12" x2="12.01" y1="16" y2="16" />
                </svg>
                <span class="text-sm font-bold text-red-600">{{ $message }}</span>
            </div>
        @enderror

        @error('mapel_id')
            <div class="mt-4 px-4 py-3 bg-red-50 border-2 border-red-200 rounded-xl flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round" class="text-red-600">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" x2="12" y1="8" y2="12" />
                    <line x1="12" x2="12.01" y1="16" y2="16" />
                </svg>
                <span class="text-sm font-bold text-red-600">{{ $message }}</span>
            </div>
        @enderror
    </div>

    <!-- Attendance Report Section -->
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-50 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-black text-slate-900">Laporan Absensi</h3>
                <p class="text-slate-400 text-sm font-bold">
                    Data absensi untuk
                    @if ($month && $year)
                        {{ $months->firstWhere('val', $month)['label'] ?? '' }} {{ $year }}
                    @else
                        periode yang dipilih
                    @endif
                </p>
            </div>
        </div>

        <div class="overflow-x-auto">
            @if ($reportData->isEmpty())
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center py-16 px-4">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-slate-400">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="16" x2="8" y1="13" y2="13" />
                            <line x1="16" x2="8" y1="17" y2="17" />
                            <polyline points="10 9 9 9 8 9" />
                        </svg>
                    </div>
                    <h4 class="text-lg font-black text-slate-400 mb-2">Tidak Ada Data</h4>
                    <p class="text-sm font-bold text-slate-400">Belum ada data absensi untuk periode yang dipilih</p>
                </div>
            @else
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">Tanggal</th>
                            <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">Siswa</th>
                            <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">Kelas</th>
                            <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">Mapel</th>

                            <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach ($reportData as $tanggal => $absensis)
                            @foreach ($absensis as $absensi)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-12 h-12 bg-blue-50 rounded-xl flex flex-col items-center justify-center">
                                                <span class="text-xs font-black text-blue-600">
                                                    {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('D') }}
                                                </span>
                                                <span class="text-lg font-black text-slate-900">
                                                    {{ \Carbon\Carbon::parse($tanggal)->format('d') }}
                                                </span>
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-slate-900">
                                                    {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-3">
                                            @php
                                                $initials = collect(explode(' ', $absensi->siswa->nama ?? 'N/A'))
                                                    ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                                                    ->take(2)
                                                    ->join('');
                                                $colors = ['blue', 'amber', 'green', 'purple', 'red', 'pink', 'indigo'];
                                                $color = $colors[crc32($absensi->siswa->nama ?? '') % count($colors)];
                                            @endphp
                                            <div
                                                class="w-9 h-9 bg-{{ $color }}-100 rounded-lg flex items-center justify-center text-{{ $color }}-600 font-bold text-sm">
                                                {{ $initials }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-slate-900">
                                                    {{ $absensi->siswa->nama ?? 'N/A' }}
                                                </p>
                                                <p
                                                    class="text-[11px] font-bold text-slate-400 uppercase tracking-tighter">
                                                    NIS: {{ $absensi->siswa->nis ?? '-' }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 text-sm font-bold text-slate-600">
                                        {{ $absensi->kelas->nama_kelas ?? '-' }}
                                    </td>
                                    <td class="px-8 py-5 text-sm font-bold text-slate-600">
                                        {{ $absensi->mapel->nama_mapel ?? '-' }}
                                    </td>

                                    <td class="px-8 py-5">
                                        @php
                                            $statusConfig = [
                                                'hadir' => [
                                                    'bg' => 'bg-green-100',
                                                    'text' => 'text-green-600',
                                                    'label' => 'Hadir',
                                                ],
                                                'izin' => [
                                                    'bg' => 'bg-amber-100',
                                                    'text' => 'text-amber-600',
                                                    'label' => 'Izin',
                                                ],
                                                'sakit' => [
                                                    'bg' => 'bg-blue-100',
                                                    'text' => 'text-blue-600',
                                                    'label' => 'Sakit',
                                                ],
                                                'alpa' => [
                                                    'bg' => 'bg-red-100',
                                                    'text' => 'text-red-600',
                                                    'label' => 'Alpa',
                                                ],
                                            ];
                                            $status = strtolower($absensi->status ?? 'hadir');
                                            $config = $statusConfig[$status] ?? $statusConfig['hadir'];
                                        @endphp
                                        <span
                                            class="inline-flex px-3 py-1 rounded-full {{ $config['bg'] }} {{ $config['text'] }} text-[11px] font-black uppercase">
                                            {{ $config['label'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</main>
