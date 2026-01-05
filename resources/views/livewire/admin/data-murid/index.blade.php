<div>
    <!-- Header Page -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="mb-6">
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Data Murid</h1>
            <p class="text-slate-500 font-bold mt-1">Manajemen data siswa dan peserta didik.</p>
        </div>

        <div class="flex items-center gap-3">
            <button x-on:click="$dispatch('open-modal', 'import-modal')"
                class="bg-emerald-600 hover:bg-emerald-700 text-white font-black px-6 py-3.5 rounded-2xl shadow-lg shadow-emerald-500/20 flex items-center gap-2 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                    <polyline points="17 8 12 3 7 8" />
                    <line x1="12" y1="3" x2="12" y2="15" />
                </svg>
                Import Excel
            </button>
            <a href="{{ route('admin.murid.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-black px-6 py-3.5 rounded-2xl shadow-lg shadow-blue-500/20 flex items-center gap-2 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Tambah Murid
            </a>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="relative w-full md:w-96">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input wire:model.live="search" type="text"
                    class="block w-full pl-11 pr-4 py-3.5 bg-slate-50 border-none rounded-2xl text-sm font-bold placeholder:text-slate-400 focus:ring-2 focus:ring-blue-500 transition-all"
                    placeholder="Cari murid berdasarkan nama atau NIS...">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">Informasi Murid</th>
                        <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">NIS</th>
                        <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase">Kelas</th>
                        <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($murids as $murid)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 font-bold text-sm uppercase">
                                        {{ substr($murid->nama, 0, 2) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">{{ $murid->nama }}</p>
                                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-tighter">ID:
                                            {{ str_pad($murid->id, 4, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-sm font-bold text-slate-600">
                                {{ $murid->nis }}
                            </td>
                            <td class="px-8 py-5">
                                <span
                                    class="inline-flex px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-[11px] font-black uppercase">
                                    {{ $murid->kelas->nama_kelas ?? 'Tanpa Kelas' }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.murid.edit', $murid->id) }}"
                                        class="p-2 text-slate-400 hover:text-blue-600 transition-colors"
                                        title="Edit Murid">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                                        </svg>
                                    </a>
                                    <button wire:click="delete({{ $murid->id }})"
                                        wire:confirm="Apakah Anda yakin ingin menghapus data murid ini?"
                                        class="p-2 text-slate-400 hover:text-red-600 transition-colors"
                                        title="Hapus Murid">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-10 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div
                                        class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="text-slate-300">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        </svg>
                                    </div>
                                    <p class="text-slate-500 font-bold">Tidak ada data murid ditemukan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($murids->hasPages())
            <div class="p-8 border-t border-slate-50">
                {{ $murids->links() }}
            </div>
        @endif
    </div>

    <!-- Import Modal -->
    <x-modal name="import-modal" title="Import Data Murid">
        <div class="p-8">
            <form wire:submit.prevent="import">
                <div class="mb-6">
                    <label class="block text-sm font-black text-slate-700 mb-2">Pilih File Excel</label>
                    <div class="relative">
                        <input type="file" wire:model="file"
                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-2xl file:border-0 file:text-sm file:font-black file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all border-2 border-dashed border-slate-200 rounded-2xl p-4">
                    </div>
                    @error('file') <span class="text-red-500 text-xs font-bold mt-2 inline-block">{{ $message }}</span> @enderror
                </div>

                <div class="bg-blue-50 rounded-2xl p-6 mb-8">
                    <h4 class="text-blue-800 font-black text-sm mb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/>
                        </svg>
                        Petunjuk Import:
                    </h4>
                    <ul class="text-blue-700/80 text-xs font-bold space-y-2">
                        <li>• File harus berformat .xlsx atau .xls</li>
                        <li>• Baris pertama harus berisi header: <code class="bg-blue-100 px-1.5 py-0.5 rounded text-blue-800">nama</code>, <code class="bg-blue-100 px-1.5 py-0.5 rounded text-blue-800">nis</code>, <code class="bg-blue-100 px-1.5 py-0.5 rounded text-blue-800">kelas</code></li>
                        <li>• Kolom <code class="bg-blue-100 px-1.5 py-0.5 rounded text-blue-800">kelas</code> harus sesuai dengan nama kelas yang ada di sistem (contoh: X RPL 1)</li>
                        <li>• Pastikan NIS belum terdaftar di sistem</li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-blue-100 flex items-center justify-between">
                        <span class="text-blue-800 text-[10px] font-black uppercase">Butuh bantuan format?</span>
                        <button type="button" wire:click="downloadTemplate" class="text-blue-600 hover:text-blue-800 text-xs font-black flex items-center gap-1 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                            Download Template Excel
                        </button>
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" x-on:click="$dispatch('close-modal', 'import-modal')"
                        class="px-6 py-3 rounded-2xl font-black text-slate-600 hover:bg-slate-100 transition-all">
                        Batal
                    </button>
                    <button type="submit" wire:loading.attr="disabled"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-black px-8 py-3 rounded-2xl shadow-lg shadow-blue-500/20 transition-all disabled:opacity-50">
                        <span wire:loading.remove>Mulai Import</span>
                        <span wire:loading>Memproses...</span>
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</div>
