<div>
    <!-- Header Page -->
    <div class="mb-8">
        <a href="{{ route('admin.mapel.index') }}"
            class="inline-flex items-center gap-2 text-slate-500 hover:text-blue-600 font-bold transition-colors mb-4 group">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                class="transition-transform group-hover:-translate-x-1">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Kembali ke Daftar Mapel
        </a>
        <h1 class="text-3xl font-black text-slate-900 tracking-tight">Edit Mata Pelajaran</h1>
        <p class="text-slate-500 font-bold mt-1">Perbarui informasi mata pelajaran di bawah ini.</p>
    </div>

    @if (session()->has('error'))
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-2xl">
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

    <!-- Form Section -->
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden max-w-2xl">
        <form wire:submit.prevent="save" class="p-8 md:p-12">
            <div class="space-y-6">
                <!-- Nama Mapel -->
                <div class="space-y-2">
                    <label for="nama_mapel" class="text-sm font-black text-slate-700 uppercase tracking-wider">Nama Mata
                        Pelajaran</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                            </svg>
                        </div>
                        <input wire:model="nama_mapel" type="text" id="nama_mapel"
                            class="block w-full pl-11 pr-4 py-4 bg-slate-50 border-2 border-transparent rounded-2xl text-sm font-bold placeholder:text-slate-400 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all @error('nama_mapel') border-red-500 focus:border-red-500 focus:ring-red-500/10 @enderror"
                            placeholder="Contoh: Matematika, Bahasa Indonesia...">
                    </div>
                    @error('nama_mapel')
                        <p class="text-[11px] font-black text-red-500 uppercase tracking-tight mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-12 flex items-center justify-end gap-4">
                <a href="{{ route('admin.mapel.index') }}"
                    class="px-8 py-4 text-sm font-black text-slate-400 hover:text-slate-600 transition-all uppercase tracking-widest">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-black px-10 py-4 rounded-2xl shadow-lg shadow-blue-500/20 flex items-center gap-2 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                    <span>Perbarui Mata Pelajaran</span>
                    <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M5 12l5 5L20 7" />
                    </svg>
                    <svg wire:loading class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
