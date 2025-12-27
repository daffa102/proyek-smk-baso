<?php

namespace App\Livewire\Admin\DataGuru;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $guruId;
    public $name;
    public $email;
    public $nip;
    public $password;
    public $password_confirmation;

    public function mount($id)
    {
        $guru = User::where('role', 'guru')->findOrFail($id);
        $this->guruId = $guru->id;
        $this->name = $guru->name;
        $this->email = $guru->email;
        $this->nip = $guru->nip;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->guruId)],
            'nip' => ['required', 'numeric', Rule::unique('users', 'nip')->ignore($this->guruId)],
            'password' => 'nullable|min:6|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.unique' => 'Email sudah digunakan',
            'nip.unique' => 'NIP sudah digunakan',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        try {
            $guru = User::findOrFail($this->guruId);
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'nip' => $this->nip,
            ];

            if ($this->password) {
                $data['password'] = Hash::make($this->password);
            }

            $guru->update($data);

            session()->flash('success', 'Data guru berhasil diperbarui!');
            return redirect()->route('admin.guru.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal memperbarui data!');
        }
    }

    public function render()
    {
        return view('livewire.admin.data-guru.edit');
    }
}
