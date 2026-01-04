<div>
    <!-- Navbar Minimalis -->
    <nav class="fixed top-0 w-full z-50 glass-header px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="{{ route('guru.dashboard') }}" class="flex items-center gap-2">
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
            <a href="{{ route('guru.profile') }}"
                class="hidden sm:flex flex-col items-end mr-2 hover:opacity-80 transition-opacity">
                <p class="text-sm font-black text-slate-900">{{ auth()->user()->name }}</p>
                <p class="text-[10px] font-bold text-blue-600 uppercase">{{ auth()->user()->role }}</p>
            </a>
            <a href="{{ route('guru.profile') }}" class="group">
                @if (auth()->user()->foto)
                    <img src="{{ Storage::url(auth()->user()->foto) }}" alt="{{ auth()->user()->name }}"
                        class="w-10 h-10 rounded-xl object-cover ring-2 ring-blue-100 group-hover:ring-blue-500 transition-all">
                @else
                    <div
                        class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center ring-2 ring-blue-100 group-hover:ring-blue-500 transition-all">
                        <span
                            class="text-sm font-black text-white">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                    </div>
                @endif
            </a>
            <form id="logout-form-guru-profile" action="{{ route('logout') }}" method="POST" class="inline-block">
                @csrf
                <button type="button" onclick="confirmLogout('logout-form-guru-profile')"
                    class="p-2 text-slate-400 hover:text-red-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                </button>
            </form>
        </div>
    </nav>

    <script>
        function confirmLogout(formId) {
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Apakah Anda yakin ingin keluar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-3xl',
                    confirmButton: 'rounded-xl font-bold px-6 py-3',
                    cancelButton: 'rounded-xl font-bold px-6 py-3'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>

    <!-- Main Content -->
    <main class="pt-28 pb-20 px-6 max-w-7xl mx-auto">
        <!-- Header -->
        <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Profil Saya</h1>
                <p class="text-slate-500 font-bold mt-1">Kelola informasi profil dan keamanan akun Anda</p>
            </div>
            <a href="{{ route('guru.dashboard') }}"
                class="inline-flex items-center gap-2 px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-black rounded-xl transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7" />
                </svg>
                Kembali ke Dashboard
            </a>
        </header>

        <!-- Success Message -->
        @if ($successMessage)
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                class="mb-6 px-6 py-4 bg-green-50 border-2 border-green-200 rounded-2xl flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                    class="text-green-600">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                </svg>
                <span class="text-sm font-bold text-green-600">{{ $successMessage }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Profile Photo Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8">
                    <h3 class="text-lg font-black text-slate-900 mb-6">Foto Profil</h3>

                    <!-- Current Photo -->
                    <div class="flex flex-col items-center mb-6">
                        @if ($currentPhoto)
                            <img src="{{ Storage::url($currentPhoto) }}" alt="Profile Photo"
                                class="w-40 h-40 rounded-full object-cover border-4 border-slate-100 mb-4">
                        @else
                            <div
                                class="w-40 h-40 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center mb-4">
                                <span class="text-5xl font-black text-white">
                                    {{ strtoupper(substr($name, 0, 1)) }}
                                </span>
                            </div>
                        @endif

                        <h4 class="text-xl font-black text-slate-900 text-center">{{ $name }}</h4>
                        <p class="text-sm font-bold text-slate-400 uppercase mt-1">{{ $role }}</p>
                    </div>

                    <!-- Upload Photo Form -->
                    <div class="space-y-4">
                        @if ($photo)
                            <!-- Preview -->
                            <div class="relative">
                                <img src="{{ $photo->temporaryUrl() }}" alt="Preview"
                                    class="w-full h-48 rounded-2xl object-cover">
                                <button wire:click="$set('photo', null)" type="button"
                                    class="absolute top-2 right-2 w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </button>
                            </div>
                            <button wire:click="updatePhoto" wire:loading.attr="disabled"
                                class="w-full px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-xl transition-colors disabled:opacity-50">
                                <span wire:loading.remove wire:target="updatePhoto">Simpan Foto</span>
                                <span wire:loading wire:target="updatePhoto">Menyimpan...</span>
                            </button>
                        @else
                            <label
                                class="block w-full px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-black rounded-xl text-center cursor-pointer transition-colors">
                                <input type="file" wire:model="photo" accept="image/*" class="hidden">
                                <span wire:loading.remove wire:target="photo">Pilih Foto</span>
                                <span wire:loading wire:target="photo">Memuat...</span>
                            </label>
                        @endif

                        @error('photo')
                            <p class="text-xs font-bold text-red-600">{{ $message }}</p>
                        @enderror

                        @if ($currentPhoto)
                            <button wire:click="deletePhoto" wire:confirm="Yakin ingin menghapus foto profil?"
                                class="w-full px-6 py-3 bg-red-50 hover:bg-red-100 text-red-600 font-black rounded-xl transition-colors">
                                Hapus Foto
                            </button>
                        @endif

                        <p class="text-xs font-bold text-slate-400 text-center">
                            Format: JPG, PNG. Maksimal 2MB
                        </p>
                    </div>
                </div>
            </div>

            <!-- Profile Info & Password -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Profile Information Card -->
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-slate-900">Informasi Profil</h3>
                            <p class="text-slate-400 text-sm font-bold">Perbarui informasi akun Anda</p>
                        </div>
                    </div>

                    <form wire:submit.prevent="updateProfile" class="space-y-5">
                        <!-- Name -->
                        <div>
                            <label class="block text-xs font-black text-slate-400 uppercase mb-2">Nama
                                Lengkap</label>
                            <input type="text" wire:model="name"
                                class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-blue-500 focus:ring-0 text-sm font-bold text-slate-700 transition-colors">
                            @error('name')
                                <p class="mt-1 text-xs font-bold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-xs font-black text-slate-400 uppercase mb-2">Email</label>
                            <input type="email" wire:model="email"
                                class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-blue-500 focus:ring-0 text-sm font-bold text-slate-700 transition-colors">
                            @error('email')
                                <p class="mt-1 text-xs font-bold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NIP -->
                        <div>
                            <label class="block text-xs font-black text-slate-400 uppercase mb-2">NIP</label>
                            <input type="text" wire:model="nip"
                                class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-blue-500 focus:ring-0 text-sm font-bold text-slate-700 transition-colors">
                            @error('nip')
                                <p class="mt-1 text-xs font-bold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role (Read Only) -->
                        <div>
                            <label class="block text-xs font-black text-slate-400 uppercase mb-2">Role</label>
                            <input type="text" value="{{ ucfirst($role) }}" disabled
                                class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 bg-slate-50 text-sm font-bold text-slate-500">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end pt-2">
                            <button type="submit" wire:loading.attr="disabled"
                                class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-xl transition-colors disabled:opacity-50 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                    <polyline points="17 21 17 13 7 13 7 21" />
                                    <polyline points="7 3 7 8 15 8" />
                                </svg>
                                <span wire:loading.remove wire:target="updateProfile">Simpan Perubahan</span>
                                <span wire:loading wire:target="updateProfile">Menyimpan...</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Password Card -->
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2"
                                        ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-slate-900">Keamanan</h3>
                                <p class="text-slate-400 text-sm font-bold">Ubah password akun Anda</p>
                            </div>
                        </div>
                        <button wire:click="togglePasswordForm"
                            class="px-4 py-2 {{ $showPasswordForm ? 'bg-red-50 text-red-600 hover:bg-red-100' : 'bg-blue-50 text-blue-600 hover:bg-blue-100' }} font-black rounded-xl transition-colors text-sm">
                            {{ $showPasswordForm ? 'Batal' : 'Ubah Password' }}
                        </button>
                    </div>

                    @if ($showPasswordForm)
                        <form wire:submit.prevent="updatePassword" class="space-y-5">
                            <!-- Current Password -->
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase mb-2">Password Saat
                                    Ini</label>
                                <input type="password" wire:model="current_password"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-blue-500 focus:ring-0 text-sm font-bold text-slate-700 transition-colors">
                                @error('current_password')
                                    <p class="mt-1 text-xs font-bold text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase mb-2">Password
                                    Baru</label>
                                <input type="password" wire:model="new_password"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-blue-500 focus:ring-0 text-sm font-bold text-slate-700 transition-colors">
                                @error('new_password')
                                    <p class="mt-1 text-xs font-bold text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm New Password -->
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase mb-2">Konfirmasi
                                    Password
                                    Baru</label>
                                <input type="password" wire:model="new_password_confirmation"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-blue-500 focus:ring-0 text-sm font-bold text-slate-700 transition-colors">
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end pt-2">
                                <button type="submit" wire:loading.attr="disabled"
                                    class="px-8 py-3 bg-amber-600 hover:bg-amber-700 text-white font-black rounded-xl transition-colors disabled:opacity-50 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                    <span wire:loading.remove wire:target="updatePassword">Ubah Password</span>
                                    <span wire:loading wire:target="updatePassword">Mengubah...</span>
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="text-center py-8">
                            <div
                                class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                                    <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z" />
                                    <path d="M19 10v2a7 7 0 0 1-14 0v-2" />
                                    <line x1="12" y1="19" x2="12" y2="23" />
                                    <line x1="8" y1="23" x2="16" y2="23" />
                                </svg>
                            </div>
                            <p class="text-sm font-bold text-slate-400">Klik tombol "Ubah Password" untuk mengubah
                                password
                                Anda</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</div>
