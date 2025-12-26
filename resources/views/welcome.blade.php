<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Sistem Absensi Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen">

    <div class="absolute top-0 left-0 w-full h-64 bg-blue-600 -z-10 rounded-b-[50px] shadow-lg"></div>

    <div class="max-w-4xl w-full px-4 text-center">
        <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-blue-50">

            <div class="flex justify-center mb-6">
                <div class="p-4 bg-blue-100 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
            </div>

            <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">
                Selamat Datang di <span class="text-blue-600">E-Presensi</span>
            </h1>
            <p class="text-slate-500 text-lg mb-10 max-w-lg mx-auto leading-relaxed">
                Kelola kehadiran murid dengan lebih mudah, cepat, dan transparan dalam satu platform digital yang modern.
            </p>

            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="/login" class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1">
                    Masuk Sekarang
                </a>
                <a href="/register" class="px-8 py-3 bg-white text-blue-600 border-2 border-blue-600 font-semibold rounded-xl hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-1">
                    Daftar Akun
                </a>
            </div>

            <div class="mt-12 pt-8 border-t border-slate-100 flex justify-between items-center text-sm text-slate-400">
                <p>&copy; 2025 SMK 1 Negri Baso</p>
                <div class="flex gap-4">
                    <span>Admin</span>
                    <span>•</span>
                    <span>Guru</span>
                </div>
            </div>
        </div>

        <p class="mt-8 text-blue-100/80 text-sm italic">
            "Membangun kedisiplinan sejak dini untuk masa depan yang lebih baik."
        </p>
    </div>

</body>
</html>
