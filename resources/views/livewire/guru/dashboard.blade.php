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
                <div class="hidden sm:flex flex-col items-end mr-2">
                    <p class="text-sm font-black text-slate-900">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] font-bold text-blue-600 uppercase">{{ auth()->user()->role }}</p>
                </div>
                <img src="/placeholder.svg?height=40&width=40" alt="Guru"
                    class="w-10 h-10 rounded-xl object-cover ring-2 ring-blue-100">
                <a href="login.html" class="p-2 text-slate-400 hover:text-red-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                </a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="pt-28 pb-20 px-6 max-w-7xl mx-auto">
            <!-- Header & Greeting -->
            <header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h1 class="text-4xl font-black text-slate-900 tracking-tight">Presensi Siswa</h1>
                    <p class="text-slate-500 font-bold mt-2">Kelola kehadiran siswa di setiap mata pelajaran Anda hari
                        ini.</p>
                </div>
                <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase">Tanggal Hari Ini</p>
                        <p class="text-sm font-black text-slate-900">{{ now()->translatedFormat('d F Y') }}</p>
                    </div>
                </div>
            </header>

            <!-- Filter Section -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
                <!-- Filter Mata Pelajaran -->
                <div
                    class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 group hover:border-blue-500 transition-all">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3 px-1">Mata
                        Pelajaran</label>
                    <div class="relative">
                        <select wire:model="mapel_id"
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
                        <select wire:model="kelas_id"
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

                <!-- Jam Pelajaran Info -->
                <div
                    class="bg-blue-600 p-6 rounded-[2rem] shadow-lg shadow-blue-500/20 flex items-center justify-between">
                    <div class="text-white">
                        <p class="text-[10px] font-black text-blue-200 uppercase tracking-widest block mb-1">Tahun
                            Ajaran</p>
                        <h3 class="text-xl font-black">2023/2024</h3>
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
                        <p class="text-slate-400 text-sm font-bold">XII IPA 1 - Matematika Wajib</p>
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
                        <button
                            class="bg-blue-600 text-white px-6 py-3 rounded-xl font-black text-sm shadow-md hover:bg-blue-700 transition-all">Simpan
                            Absensi</button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50/50 text-slate-400">
                                <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest">Siswa</th>
                                <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-center">
                                    Hadir</th>
                                <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-center">
                                    Sakit</th>
                                <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-center">Izin
                                </th>
                                <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-center">Alpa
                                </th>
                                <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <!-- Student Row 1 -->
                            <tr class="hover:bg-slate-50/30 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 font-bold text-sm">
                                            AR</div>
                                        <div>
                                            <p class="text-sm font-black text-slate-900">Aditya Rahman</p>
                                            <p class="text-[11px] font-bold text-slate-400">2025001</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-1"
                                        class="w-5 h-5 accent-green-600 cursor-pointer" checked>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-1"
                                        class="w-5 h-5 accent-amber-500 cursor-pointer">
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-1"
                                        class="w-5 h-5 accent-blue-500 cursor-pointer">
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-1"
                                        class="w-5 h-5 accent-red-500 cursor-pointer">
                                </td>
                                <td class="px-8 py-5">
                                    <input type="text" placeholder="..."
                                        class="bg-slate-50 border-none rounded-lg px-3 py-2 text-xs font-bold w-full outline-none focus:ring-1 focus:ring-blue-500/20">
                                </td>
                            </tr>
                            <!-- Student Row 2 -->
                            <tr class="hover:bg-slate-50/30 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 font-bold text-sm">
                                            SP</div>
                                        <div>
                                            <p class="text-sm font-black text-slate-900">Siti Pertiwi</p>
                                            <p class="text-[11px] font-bold text-slate-400">2025002</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-2"
                                        class="w-5 h-5 accent-green-600 cursor-pointer">
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-2"
                                        class="w-5 h-5 accent-amber-500 cursor-pointer" checked>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-2"
                                        class="w-5 h-5 accent-blue-500 cursor-pointer">
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-2"
                                        class="w-5 h-5 accent-red-500 cursor-pointer">
                                </td>
                                <td class="px-8 py-5">
                                    <input type="text" value="Demam tinggi"
                                        class="bg-slate-50 border-none rounded-lg px-3 py-2 text-xs font-bold w-full outline-none focus:ring-1 focus:ring-blue-500/20">
                                </td>
                            </tr>
                            <!-- Student Row 3 -->
                            <tr class="hover:bg-slate-50/30 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 font-bold text-sm">
                                            BM</div>
                                        <div>
                                            <p class="text-sm font-black text-slate-900">Bagus Maulana</p>
                                            <p class="text-[11px] font-bold text-slate-400">2025003</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-3"
                                        class="w-5 h-5 accent-green-600 cursor-pointer" checked>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-3"
                                        class="w-5 h-5 accent-amber-500 cursor-pointer">
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-3"
                                        class="w-5 h-5 accent-blue-500 cursor-pointer">
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <input type="radio" name="absent-3"
                                        class="w-5 h-5 accent-red-500 cursor-pointer">
                                </td>
                                <td class="px-8 py-5">
                                    <input type="text" placeholder="..."
                                        class="bg-slate-50 border-none rounded-lg px-3 py-2 text-xs font-bold w-full outline-none focus:ring-1 focus:ring-blue-500/20">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

    </body>
</div>
