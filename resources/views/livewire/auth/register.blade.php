<div class="w-full max-w-md relative z-10">
    <!-- Logo & Header -->
    <div class="text-center mb-10">
        <a href="/" class="inline-flex items-center gap-2 mb-6 group">
            <div
                class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg group-hover:scale-110 transition-transform">
                H
            </div>
            <span class="text-2xl font-black tracking-tight text-slate-900">Hadirin</span>
        </a>
        <h1 class="text-3xl font-black text-slate-900">Selamat Datang</h1>
        <p class="text-slate-500 mt-2 font-medium">Buat akun sekolah Anda</p>
    </div>

    <!-- Register Card -->
    <div class="glass-card p-8 md:p-10 rounded-[2.5rem] shadow-2xl shadow-blue-200/50">
        <form wire:submit.prevent="register" class="space-y-6">

            <div class="space-y-2">
                <label for="name" class="text-sm font-bold text-slate-700 ml-1">Nama</label>
                <div class="relative">
                    <input type="text" id="name" wire:model="name" placeholder="Nama Lengkap"
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all placeholder:text-slate-300 font-medium">
                </div>
                @error('name')
                    <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="email" class="text-sm font-bold text-slate-700 ml-1">Email</label>
                <div class="relative">
                    <input type="email" id="email" wire:model="email" placeholder="contoh@sekolah.id"
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all placeholder:text-slate-300 font-medium">
                </div>
                @error('email')
                    <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="nip" class="text-sm font-bold text-slate-700 ml-1">NIP</label>
                <div class="relative">
                    <input type="text" id="nip" wire:model="nip" placeholder="123456789"
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all placeholder:text-slate-300 font-medium">
                </div>
                @error('nip')
                    <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <div class="flex justify-between items-center ml-1">
                    <label for="password" class="text-sm font-bold text-slate-700">Kata Sandi</label>
                </div>
                <div class="relative">
                    <input type="password" id="password" wire:model="password" placeholder="••••••••"
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all placeholder:text-slate-300 font-medium">
                </div>
                @error('password')
                    <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-2xl font-black text-lg shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 hover:-translate-y-0.5 transition-all">
                Daftar Sekarang
            </button>
        </form>

        <div class="mt-8 pt-8 border-t border-slate-100 text-center">
            <p class="text-sm text-slate-500 font-medium">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Masuk Sekarang</a>
            </p>
        </div>
    </div>

    <!-- Back to Home -->
    <div class="text-center mt-8">
        <a href="/"
            class="inline-flex items-center gap-2 text-sm font-bold text-slate-400 hover:text-slate-600 transition-colors group">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                class="group-hover:-translate-x-1 transition-transform">
                <path d="m15 18-6-6 6-6" />
            </svg>
            Kembali ke Beranda
        </a>
    </div>
</div>
