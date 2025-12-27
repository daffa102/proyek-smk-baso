<main">
    <!-- Header -->
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Overview Dashboard</h1>
            <p class="text-slate-500 font-bold mt-1">Selamat datang kembali, Admin!</p>
        </div>
    </header>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center gap-5">
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
                <h4 class="text-2xl font-black text-slate-900">??</h4>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center gap-5">
            <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z" />
                    <path d="M3 9V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v4" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase">Kelas</p>
                <h4 class="text-2xl font-black text-slate-900">??</h4>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center gap-5">
            <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21a8 8 0 0 0-16 0" />
                    <circle cx="12" cy="8" r="5" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase">Murid</p>
                <h4 class="text-2xl font-black text-slate-900">??</h4>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center gap-5">
            <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase">Mapel</p>
                <h4 class="text-2xl font-black text-slate-900">??</h4>
            </div>
        </div>
    </div>

    <!-- Recent Activity / Table -->
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-50 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-black text-slate-900">Absensi Terbaru</h3>
                <p class="text-slate-400 text-sm font-bold">Data kehadiran siswa hari ini</p>
            </div>
            <button class="text-sm font-black text-blue-600 hover:text-blue-700">Lihat Semua</button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">Siswa</th>
                        <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">Kelas</th>
                        <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">Waktu</th>
                        <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">Status</th>
                        <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 font-bold text-sm">
                                    AR</div>
                                <div>
                                    <p class="text-sm font-bold text-slate-900">Dummy</p>
                                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-tighter">ID:
                                        2025001</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-sm font-bold text-slate-600">XII-IPA-1</td>
                        <td class="px-8 py-5 text-sm font-bold text-slate-600">07:12 WIB</td>
                        <td class="px-8 py-5">
                            <span
                                class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-600 text-[11px] font-black uppercase">Hadir</span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <button class="text-slate-400 hover:text-blue-600 transition-colors"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1" />
                                    <circle cx="12" cy="5" r="1" />
                                    <circle cx="12" cy="19" r="1" />
                                </svg></button>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 bg-amber-100 rounded-lg flex items-center justify-center text-amber-600 font-bold text-sm">
                                    SP</div>
                                <div>
                                    <p class="text-sm font-bold text-slate-900">Dummy</p>
                                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-tighter">ID:
                                        2025002</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-sm font-bold text-slate-600">XI-IPS-2</td>
                        <td class="px-8 py-5 text-sm font-bold text-slate-600">07:25 WIB</td>
                        <td class="px-8 py-5">
                            <span
                                class="inline-flex px-3 py-1 rounded-full bg-amber-100 text-amber-600 text-[11px] font-black uppercase">Izin</span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <button class="text-slate-400 hover:text-blue-600 transition-colors"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1" />
                                    <circle cx="12" cy="5" r="1" />
                                    <circle cx="12" cy="19" r="1" />
                                </svg></button>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 bg-red-100 rounded-lg flex items-center justify-center text-red-600 font-bold text-sm">
                                    BM</div>
                                <div>
                                    <p class="text-sm font-bold text-slate-900">Dummy</p>
                                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-tighter">ID:
                                        2025003</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-sm font-bold text-slate-600">X-A</td>
                        <td class="px-8 py-5 text-sm font-bold text-slate-600">-</td>
                        <td class="px-8 py-5">
                            <span
                                class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-600 text-[11px] font-black uppercase">Alpa</span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <button class="text-slate-400 hover:text-blue-600 transition-colors"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1" />
                                    <circle cx="12" cy="5" r="1" />
                                    <circle cx="12" cy="19" r="1" />
                                </svg></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
