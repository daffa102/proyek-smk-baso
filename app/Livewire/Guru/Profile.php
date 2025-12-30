<?php

namespace App\Livewire\Guru;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $nip;
    public $password;
    public $password_confirmation;
    public $foto;
    public $old_foto;

    public function mount()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $this->name = $user->name;
        $this->nip = $user->nip;
        $this->old_foto = $user->foto;
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:users,nip,' . Auth::id(),
            'password' => 'nullable|min:6|confirmed',
            'foto' => 'nullable|image|max:2048', // Max 2MB
        ];
    }

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong.',
        'nip.required' => 'NIP tidak boleh kosong.',
        'nip.unique' => 'NIP sudah digunakan.',
        'password.min' => 'Password minimal 6 karakter.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
        'foto.image' => 'File harus berupa gambar.',
        'foto.max' => 'Ukuran gambar maksimal 2MB.',
    ];

    public function save()
    {
        $this->validate();

        /** @var \App\Models\User $user */
        $user = User::find(Auth::id());
        
        $data = [
            'name' => $this->name,
            'nip' => $this->nip,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        if ($this->foto) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            
            // Simpan foto baru
            $path = $this->foto->store('profile-photos', 'public');
            $data['foto'] = $path;
        }

        $user->update($data);

        $this->reset(['password', 'password_confirmation', 'foto']);
        $this->old_foto = $user->fresh()->foto;

        session()->flash('success', 'Profil berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.guru.profile');
    }
}
