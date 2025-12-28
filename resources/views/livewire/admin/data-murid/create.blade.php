<div>
    <!-- Header Page -->
    <div class="mb-8">
        <a href="{{ route('admin.murid.index') }}"
            class="inline-flex items-center gap-2 text-slate-500 hover:text-blue-600 font-bold transition-colors mb-4 group">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                class="transition-transform group-hover:-translate-x-1">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Kembali ke Daftar Murid
        </a>
        <h1 class="text-3xl font-black text-slate-900 tracking-tight">Tambah Murid Baru</h1>
        <p class="text-slate-500 font-bold mt-1">Lengkapi formulir di bawah ini untuk menambahkan data murid baru.</p>
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
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden max-w-4xl">
        <form wire:submit.prevent="save" class="p-8 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Nama Murid -->
                <div class="space-y-2">
                    <label for="nama" class="text-sm font-black text-slate-700 uppercase tracking-wider">Nama
                        Lengkap</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </div>
                        <input wire:model="nama" type="text" id="nama"
                            class="block w-full pl-11 pr-4 py-4 bg-slate-50 border-2 border-transparent rounded-2xl text-sm font-bold placeholder:text-slate-400 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all @error('nama') border-red-500 focus:border-red-500 focus:ring-red-500/10 @enderror"
                            placeholder="Masukkan nama murid...">
                    </div>
                    @error('nama')
                        <p class="text-[11px] font-black text-red-500 uppercase tracking-tight mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIS -->
                <div class="space-y-2">
                    <label for="nis" class="text-sm font-black text-slate-700 uppercase tracking-wider">NIS (Nomor
                        Induk Siswa)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="16" rx="2" />
                                <line x1="7" y1="8" x2="17" y2="8" />
                                <line x1="7" y1="12" x2="17" y2="12" />
                            </svg>
                        </div>
                        <input wire:model="nis" type="text" id="nis"
                            class="block w-full pl-11 pr-4 py-4 bg-slate-50 border-2 border-transparent rounded-2xl text-sm font-bold placeholder:text-slate-400 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all @error('nis') border-red-500 focus:border-red-500 focus:ring-red-500/10 @enderror"
                            placeholder="Masukkan NIS murid...">
                    </div>
                    @error('nis')
                        <p class="text-[11px] font-black text-red-500 uppercase tracking-tight mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kelas -->
                <div class="space-y-2 md:col-span-2">
                    <label for="kelas_id" class="text-sm font-black text-slate-700 uppercase tracking-wider">Pilih
                        Kelas</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                        @forelse($kelases as $kelas)
                            <label class="cursor-pointer group">
                                <input type="radio" wire:model="kelas_id" value="{{ $kelas->id }}"
                                    class="hidden peer">
                                <div
                                    class="p-4 rounded-2xl border-2 border-slate-50 bg-slate-50 text-slate-500 font-bold text-sm text-center transition-all group-hover:bg-slate-100 peer-checked:bg-blue-600 peer-checked:border-blue-600 peer-checked:text-white peer-checked:shadow-lg peer-checked:shadow-blue-500/20">
                                    {{ $kelas->nama_kelas }}
                                </div>
                            </label>
                        @empty
                            <div
                                class="col-span-full p-6 bg-slate-50 rounded-2xl text-center border-2 border-dashed border-slate-200">
                                <p class="text-slate-400 font-bold text-sm">Belum ada data kelas. <a
                                        href="{{ route('admin.kelas.create') }}"
                                        class="text-blue-600 hover:underline">Tambah kelas baru</a> terlebih dahulu.</p>
                            </div>
                        @endforelse
                    </div>
                    @error('kelas_id')
                        <p class="text-[11px] font-black text-red-500 uppercase tracking-tight mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-12 flex items-center justify-end gap-4">
                <a href="{{ route('admin.murid.index') }}"
                    class="px-8 py-4 text-sm font-black text-slate-400 hover:text-slate-600 transition-all uppercase tracking-widest">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-black px-10 py-4 rounded-2xl shadow-lg shadow-blue-500/20 flex items-center gap-2 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                    <span>Simpan Data Murid</span>
                    <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round">
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
