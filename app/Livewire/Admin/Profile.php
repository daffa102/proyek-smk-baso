<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class Profile extends Component
{
    use WithFileUploads;

    // User Info
    public $name;
    public $email;
    public $nip;
    public $role;
    
    // Photo
    #[Validate('nullable|image|max:2048')]
    public $photo;
    public $currentPhoto;
    
    // Password
    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    
    // UI States
    public $showPasswordForm = false;
    public $successMessage = '';
    public $errorMessage = '';

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->nip = $user->nip;
        $this->role = $user->role;
        $this->currentPhoto = $user->foto;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'nip' => 'required|string|unique:users,nip,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'nip' => $this->nip,
        ]);

        $this->successMessage = 'Profil berhasil diperbarui!';
        $this->dispatch('profile-updated');
        
        // Clear message after 3 seconds
        $this->dispatch('clear-message');
    }

    public function updatePhoto()
    {
        $this->validate([
            'photo' => 'required|image|max:2048',
        ]);

        $user = Auth::user();

        // Delete old photo if exists
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            Storage::disk('public')->delete($user->foto);
        }

        // Store new photo
        $path = $this->photo->store('profile-photos', 'public');
        
        $user->update([
            'foto' => $path,
        ]);

        $this->currentPhoto = $path;
        $this->photo = null;
        $this->successMessage = 'Foto profil berhasil diperbarui!';
        $this->dispatch('clear-message');
    }

    public function deletePhoto()
    {
        $user = Auth::user();

        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->update([
            'foto' => null,
        ]);

        $this->currentPhoto = null;
        $this->successMessage = 'Foto profil berhasil dihapus!';
        $this->dispatch('clear-message');
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Password saat ini harus diisi',
            'new_password.required' => 'Password baru harus diisi',
            'new_password.min' => 'Password baru minimal 8 karakter',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        $user = Auth::user();

        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'Password saat ini tidak sesuai');
            return;
        }

        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        $this->showPasswordForm = false;
        $this->successMessage = 'Password berhasil diubah!';
        $this->dispatch('clear-message');
    }

    public function togglePasswordForm()
    {
        $this->showPasswordForm = !$this->showPasswordForm;
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        $this->resetErrorBag();
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.admin.profile');
    }
}
