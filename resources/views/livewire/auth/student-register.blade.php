<div class="min-h-screen bg-slate-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="flex justify-center">
            <div
                class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                H</div>
        </div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-slate-900">
            Pendaftaran Siswa Baru
        </h2>
        <p class="mt-2 text-center text-sm text-slate-600">
            Lengkapi data diri anda untuk mulai menggunakan sistem absensi.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl">
        <div class="bg-white py-8 px-4 shadow-xl border border-slate-100 sm:rounded-3xl sm:px-10">
            <form wire:submit.prevent="save" class="space-y-6">
                <!-- Session Status / Flash Messages -->
                @if (session()->has('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-2xl font-medium" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-2xl font-medium" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Lengkap -->
                    <div class="md:col-span-2">
                        <label for="nama" class="block text-sm font-bold text-slate-700 mb-2">
                            Nama Lengkap
                        </label>
                        <input wire:model="nama" id="nama" type="text" placeholder="Masukkan nama sesuai ijazah"
                            class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-2xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('nama') border-red-500 @enderror">
                        @error('nama')
                            <span class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NIS -->
                    <div>
                        <label for="nis" class="block text-sm font-bold text-slate-700 mb-2">
                            NIS (Nomor Induk Siswa)
                        </label>
                        <input wire:model="nis" id="nis" type="text" placeholder="Contoh: 12345"
                            class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-2xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('nis') border-red-500 @enderror">
                        @error('nis')
                            <span class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Kelas -->
                    <div>
                        <label for="kelas_id" class="block text-sm font-bold text-slate-700 mb-2">
                            Kelas
                        </label>
                        <select wire:model="kelas_id" id="kelas_id"
                            class="block w-full px-4 py-3 border border-slate-200 rounded-2xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('kelas_id') border-red-500 @enderror">
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelases as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <span class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Tahun Ajaran -->
                <div>
                    <label for="tahun_ajaran" class="block text-sm font-bold text-slate-700 mb-2">
                        Tahun Ajaran
                    </label>
                    <select wire:model.live="tahun_ajaran" id="tahun_ajaran"
                        class="block w-full px-4 py-3 border border-slate-200 rounded-2xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('tahun_ajaran') border-red-500 @enderror">
                        <option value="">Pilih Tahun Ajaran</option>
                        @foreach ($tahunAjaranList as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                    @error('tahun_ajaran')
                        <span class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Mata Pelajaran (Multiple Select) -->
                <div class="pt-4 border-t border-slate-50">
                    <label class="block text-sm font-bold text-slate-700 mb-4">
                        Pilih Mata Pelajaran yang Diikuti
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-60 overflow-y-auto p-1 text-slate-700">
                        @forelse($mapels as $mapel)
                            <label
                                class="relative flex items-center p-3 rounded-2xl border border-slate-100 hover:bg-slate-50 transition-colors cursor-pointer group">
                                <div class="flex items-center h-5">
                                    <input wire:model="selected_mapels" value="{{ $mapel->id }}" type="checkbox"
                                        class="h-5 w-5 text-blue-600 border-slate-300 rounded-lg focus:ring-blue-500 transition-all">
                                </div>
                                <div class="ml-3 text-sm">
                                    <span
                                        class="font-bold text-slate-700 group-hover:text-blue-600 transition-colors">{{ $mapel->nama_mapel }}</span>
                                </div>
                            </label>
                        @empty
                            <div class="col-span-2 text-center py-6 text-slate-400">
                                @if ($tahun_ajaran)
                                    Tidak ada mata pelajaran di tahun ajaran ini.
                                @else
                                    Silakan pilih tahun ajaran terlebih dahulu.
                                @endif
                            </div>
                        @endforelse
                    </div>
                    @error('selected_mapels')
                        <span class="text-xs text-red-600 mt-2 block font-medium">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-6">
                    <button type="submit"
                        class="w-full flex justify-center items-center py-4 px-4 border border-transparent rounded-2xl shadow-lg text-lg font-black text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform hover:-translate-y-1">
                        Daftar Sebagai Siswa
                    </button>
                </div>
            </form>
        </div>
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
</div>
