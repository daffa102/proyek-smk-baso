<div
    class="min-h-screen  relative overflow-hidden">
    <!-- Decorative Background Elements -->
    

    <div class="sm:mx-auto sm:w-full sm:max-w-5xl relative z-10 px-4">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="flex justify-center mb-6">
                <div
                    class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center text-white font-bold text-3xl shadow-2xl transform hover:scale-110 transition-transform">
                    H
                </div>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-4">
                Selamat Datang di <span class="text-blue-600">Hadirin</span>
            </h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto font-medium">
                Silakan pilih jenis akun yang ingin Anda daftarkan untuk memulai pengalaman absensi digital yang lebih
                baik
            </p>
        </div>

        <!-- Choice Cards -->
        <div class="grid md:grid-cols-2 gap-8 mb-10">
            <!-- Guru Card -->
            <a href="{{ route('register') }}"
                class="group relative bg-white rounded-3xl p-10 shadow-xl border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <!-- Gradient Background on Hover -->
                <div
                    class="absolute inset-0 bg-gradient-to-br from-blue-600 to-blue-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-3xl">
                </div>

                <div class="relative z-10">
                    <!-- Icon -->
                    <div
                        class="w-20 h-20 bg-blue-100 text-blue-600 group-hover:bg-white group-hover:text-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg transition-all duration-300 transform group-hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            <polyline points="17 8 12 3 7 8" />
                            <line x1="12" y1="3" x2="12" y2="15" />
                        </svg>
                    </div>

                    <!-- Content -->
                    <h3 class="text-3xl font-black text-slate-900 group-hover:text-white mb-4 transition-colors">
                        Daftar Sebagai Guru
                    </h3>
                    <p class="text-slate-600 group-hover:text-blue-100 mb-6 leading-relaxed transition-colors">
                        Kelola absensi siswa, buat laporan kehadiran, dan pantau kedisiplinan kelas dengan mudah dan
                        efisien
                    </p>

                    <!-- Features List -->
                    <ul class="space-y-3 mb-8">
                        <li
                            class="flex items-center gap-3 text-sm font-semibold text-slate-700 group-hover:text-white transition-colors">
                            <div
                                class="w-5 h-5 bg-green-100 group-hover:bg-green-400 rounded-full flex items-center justify-center flex-shrink-0 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="text-green-600 group-hover:text-white">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </div>
                            Kelola data absensi siswa
                        </li>
                        <li
                            class="flex items-center gap-3 text-sm font-semibold text-slate-700 group-hover:text-white transition-colors">
                            <div
                                class="w-5 h-5 bg-green-100 group-hover:bg-green-400 rounded-full flex items-center justify-center flex-shrink-0 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="text-green-600 group-hover:text-white">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </div>
                            Akses laporan real-time
                        </li>
                        <li
                            class="flex items-center gap-3 text-sm font-semibold text-slate-700 group-hover:text-white transition-colors">
                            <div
                                class="w-5 h-5 bg-green-100 group-hover:bg-green-400 rounded-full flex items-center justify-center flex-shrink-0 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="text-green-600 group-hover:text-white">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </div>
                            Dashboard analitik lengkap
                        </li>
                    </ul>

                    <!-- CTA Button -->
                    <div
                        class="flex items-center justify-between pt-6 border-t border-slate-100 group-hover:border-white/20">
                        <span class="text-lg font-black text-blue-600 group-hover:text-white transition-colors">Pilih
                            Guru</span>
                        <div
                            class="w-10 h-10 bg-blue-600 group-hover:bg-white rounded-xl flex items-center justify-center transition-all transform group-hover:translate-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" class="text-white group-hover:text-blue-600">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Siswa Card -->
            <a href="{{ route('student.register') }}"
                class="group relative bg-white rounded-3xl p-10 shadow-xl border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <!-- Gradient Background on Hover -->
                <div
                    class="absolute inset-0 bg-gradient-to-br from-amber-500 to-amber-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-3xl">
                </div>

                <div class="relative z-10">
                    <!-- Icon -->
                    <div
                        class="w-20 h-20 bg-amber-100 text-amber-600 group-hover:bg-white group-hover:text-amber-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg transition-all duration-300 transform group-hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                            <path d="M6 12v5c3 3 9 3 12 0v-5" />
                        </svg>
                    </div>

                    <!-- Content -->
                    <h3 class="text-3xl font-black text-slate-900 group-hover:text-white mb-4 transition-colors">
                        Daftar Sebagai Siswa
                    </h3>
                    <p class="text-slate-600 group-hover:text-amber-100 mb-6 leading-relaxed transition-colors">
                        Daftarkan diri Anda sebagai siswa untuk mulai melakukan absensi digital dan memantau kehadiran
                        Anda
                    </p>

                    <!-- Features List -->
                    <ul class="space-y-3 mb-8">
                        <li
                            class="flex items-center gap-3 text-sm font-semibold text-slate-700 group-hover:text-white transition-colors">
                            <div
                                class="w-5 h-5 bg-green-100 group-hover:bg-green-400 rounded-full flex items-center justify-center flex-shrink-0 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="text-green-600 group-hover:text-white">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </div>
                            Absensi digital mudah
                        </li>
                        <li
                            class="flex items-center gap-3 text-sm font-semibold text-slate-700 group-hover:text-white transition-colors">
                            <div
                                class="w-5 h-5 bg-green-100 group-hover:bg-green-400 rounded-full flex items-center justify-center flex-shrink-0 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="text-green-600 group-hover:text-white">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </div>
                            Pantau riwayat kehadiran
                        </li>
                        <li
                            class="flex items-center gap-3 text-sm font-semibold text-slate-700 group-hover:text-white transition-colors">
                            <div
                                class="w-5 h-5 bg-green-100 group-hover:bg-green-400 rounded-full flex items-center justify-center flex-shrink-0 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="text-green-600 group-hover:text-white">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </div>
                            Akses jadwal pelajaran
                        </li>
                    </ul>

                    <!-- CTA Button -->
                    <div
                        class="flex items-center justify-between pt-6 border-t border-slate-100 group-hover:border-white/20">
                        <span class="text-lg font-black text-amber-600 group-hover:text-white transition-colors">Pilih
                            Siswa</span>
                        <div
                            class="w-10 h-10 bg-amber-500 group-hover:bg-white rounded-xl flex items-center justify-center transition-all transform group-hover:translate-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="text-white group-hover:text-amber-600">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Back to Home Link -->
        <div class="text-center">
            <a href="/"
                class="inline-flex items-center gap-2 text-sm font-bold text-slate-400 hover:text-slate-600 transition-colors group">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round" class="group-hover:-translate-x-1 transition-transform">
                    <path d="m15 18-6-6 6-6" />
                </svg>
                Kembali ke Beranda
            </a>
        </div>

        <!-- Additional Info -->
        <div class="mt-10 text-center">
            <p class="text-sm text-slate-500 font-medium">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Masuk
                    di sini</a>
            </p>
        </div>
    </div>
</div>
