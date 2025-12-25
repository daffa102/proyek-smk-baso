<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hadirin - Aplikasi Absensi Sekolah Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="globals.css" rel="stylesheet">
    <style>
        /* Custom smooth scroll */
        html { scroll-behavior: smooth; }

        /* Custom utilities for clear design */
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="bg-slate-50">

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass-card px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">H</div>
            <span class="text-xl font-extrabold tracking-tight text-slate-900">Hadirin</span>
        </div>

        <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
            <a href="#fitur" class="hover:text-blue-600 transition-colors">Fitur</a>
            <a href="#cara-kerja" class="hover:text-blue-600 transition-colors">Cara Kerja</a>
            <a href="#testimoni" class="hover:text-blue-600 transition-colors">Testimoni</a>
            <a href="#kontak" class="hover:text-blue-600 transition-colors">Kontak</a>
        </div>

        <div class="flex items-center gap-4">
            <button class="text-sm font-semibold text-slate-700 hover:text-blue-600 px-4 py-2 transition-all">Masuk</button>
            <button class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-6 py-2.5 rounded-full shadow-md hover:shadow-xl transition-all">Daftar Sekarang</button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-6 max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-8">
            <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                Sistem Absensi Cerdas
            </div>

            <h1 class="text-5xl md:text-6xl font-black text-slate-900 leading-[1.1] text-balance">
                Absensi Sekolah <br/>
                <span class="text-blue-600">Lebih Cepat</span> <br/>
                & Transparan.
            </h1>

            <p class="text-lg text-slate-600 leading-relaxed max-w-lg">
                Solusi digital modern untuk memantau kehadiran siswa secara real-time. Kurangi kecurangan, hemat waktu, dan permudah pelaporan bagi guru dan orang tua.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <button class="bg-slate-900 hover:bg-black text-white px-8 py-4 rounded-2xl font-bold flex items-center justify-center gap-2 group transition-all">
                    Coba Gratis Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform"><path d="m9 18 6-6-6-6"/></svg>
                </button>
                <button class="bg-white hover:bg-slate-100 text-slate-900 border border-slate-200 px-8 py-4 rounded-2xl font-bold transition-all shadow-sm">
                    Lihat Demo
                </button>
            </div>

            {{-- <div class="flex items-center gap-6 pt-8 border-t border-slate-200">
                <div class="flex -space-x-3">
                    <img src="/placeholder.svg?height=40&width=40" alt="User" class="w-10 h-10 rounded-full border-2 border-white">
                    <img src="/placeholder.svg?height=40&width=40" alt="User" class="w-10 h-10 rounded-full border-2 border-white">
                    <img src="/placeholder.svg?height=40&width=40" alt="User" class="w-10 h-10 rounded-full border-2 border-white">
                </div>
                <p class="text-sm text-slate-500 font-medium">
                    Dipercaya oleh <span class="text-slate-900 font-bold">500+ Sekolah</span> di seluruh Indonesia
                </p>
            </div> --}}
        </div>

        <div class="relative">
            <!-- Decorative elements -->
            <div class="absolute -top-10 -right-10 w-64 h-64 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
            <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-amber-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse delay-700"></div>

            <!-- Mockup Image -->
            <div class="relative floating bg-white p-4 rounded-[2.5rem] shadow-2xl border border-slate-100">
                <img src="/placeholder.svg?height=600&width=400" alt="App Dashboard" class="rounded-[2rem] w-full">

                <!-- Floating Info Cards -->
                <div class="absolute -left-6 top-1/4 bg-white p-4 rounded-2xl shadow-xl border border-slate-50 flex items-center gap-4 max-w-[200px]">
                    <div class="w-10 h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-500 font-bold uppercase">Kehadiran Hari Ini</p>
                        <p class="text-lg font-black text-slate-900">98.5%</p>
                    </div>
                </div>

                <div class="absolute -right-6 bottom-1/4 bg-white p-4 rounded-2xl shadow-xl border border-slate-50 flex items-center gap-4 max-w-[200px]">
                    <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-500 font-bold uppercase">Siswa Terdaftar</p>
                        <p class="text-lg font-black text-slate-900">1,240</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    {{-- <section id="fitur" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center space-y-4 mb-20">
                <h2 class="text-blue-600 font-bold tracking-widest uppercase text-sm">Fitur Unggulan</h2>
                <p class="text-4xl font-black text-slate-900">Mengapa Memilih Hadirin?</p>
                <p class="text-slate-500 max-w-2xl mx-auto">Kami menyediakan fitur lengkap untuk mengelola absensi sekolah dengan cara yang paling efisien dan modern.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group p-10 rounded-[2rem] bg-slate-50 hover:bg-blue-600 transition-all duration-500 hover:-translate-y-2">
                    <div class="w-14 h-14 bg-blue-600 text-white group-hover:bg-white group-hover:text-blue-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 7l-7 5 7 5V7z"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-white mb-4 transition-colors">Face Recognition</h3>
                    <p class="text-slate-600 group-hover:text-blue-100 transition-colors">Teknologi deteksi wajah AI yang akurat untuk mencegah siswa titip absen ke teman lainnya.</p>
                </div>

                <!-- Feature 2 -->
                <div class="group p-10 rounded-[2rem] bg-slate-50 hover:bg-amber-500 transition-all duration-500 hover:-translate-y-2">
                    <div class="w-14 h-14 bg-amber-500 text-white group-hover:bg-white group-hover:text-amber-500 rounded-2xl flex items-center justify-center mb-8 shadow-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-white mb-4 transition-colors">Notifikasi Real-time</h3>
                    <p class="text-slate-600 group-hover:text-amber-50 transition-colors">Orang tua langsung mendapatkan notifikasi WhatsApp/App saat anak tiba atau meninggalkan sekolah.</p>
                </div>

                <!-- Feature 3 -->
                <div class="group p-10 rounded-[2rem] bg-slate-50 hover:bg-green-600 transition-all duration-500 hover:-translate-y-2">
                    <div class="w-14 h-14 bg-green-600 text-white group-hover:bg-white group-hover:text-green-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-white mb-4 transition-colors">Laporan Otomatis</h3>
                    <p class="text-slate-600 group-hover:text-green-50 transition-colors">Export laporan bulanan atau mingguan dalam format PDF/Excel hanya dengan satu kali klik.</p>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Call to Action Section -->
    <section class="py-20 px-6">
        <div class="max-w-5xl mx-auto bg-blue-600 rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl">
            <!-- Background circles -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500 rounded-full -translate-y-1/2 translate-x-1/3 opacity-50"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-blue-700 rounded-full translate-y-1/2 -translate-x-1/3 opacity-50"></div>

            <div class="relative z-10 space-y-8">
                <h2 class="text-4xl md:text-5xl font-black text-white">Siap Digitalisasi Absensi <br/> Sekolah Anda?</h2>
                <p class="text-blue-100 text-lg max-w-2xl mx-auto font-medium">Bergabunglah dengan ratusan sekolah lainnya yang telah meningkatkan kedisiplinan dan keamanan siswa bersama Hadirin.</p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                    <button class="bg-white text-blue-600 hover:bg-blue-50 px-10 py-5 rounded-2xl font-black text-lg transition-all shadow-xl hover:-translate-y-1">
                        Mulai Gratis 30 Hari
                    </button>
                    <button class="bg-blue-700/50 text-white border border-blue-400/30 hover:bg-blue-700 px-10 py-5 rounded-2xl font-black text-lg transition-all">
                        Hubungi Tim Sales
                    </button>
                </div>

                <p class="text-blue-200 text-sm font-semibold">Tidak butuh kartu kredit • Batalkan kapan saja</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-16 px-6">
        <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-12">
            <div class="space-y-6">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">H</div>
                    <span class="text-xl font-black text-white">Hadirin</span>
                </div>
                <p class="text-sm leading-relaxed">Platform absensi sekolah pintar berbasis cloud yang memudahkan pengelolaan data kehadiran di era digital.</p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg></a>
                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-bold mb-6">Produk</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Dashboard Sekolah</a></li>
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Aplikasi Orang Tua</a></li>
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Aplikasi Siswa</a></li>
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Mesin Absensi</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-6">Perusahaan</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Karir</a></li>
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Hubungi Kami</a></li>
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Blog</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-6">Dukungan</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Pusat Bantuan</a></li>
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Panduan Pengguna</a></li>
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-blue-500 transition-colors">Ketentuan Layanan</a></li>
                </ul>
            </div>
        </div>

        <div class="max-w-7xl mx-auto pt-16 mt-16 border-t border-slate-800 text-center text-xs">
            <p>&copy; 2025 Hadirin Attendance App. Semua hak dilindungi undang-undang.</p>
        </div>
    </footer>

</body>
</html>
