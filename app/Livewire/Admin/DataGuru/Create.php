<?php

namespace App\Livewire\Admin\DataGuru;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public $name = '';
    public $email = '';
    public $nip = '';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'nip' => 'required|numeric|unique:users,nip',
        'password' => 'required|min:6|confirmed',
    ];

    protected $messages = [
        'name.required' => 'Nama wajib diisi',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'email.unique' => 'Email sudah terdaftar',
        'nip.required' => 'NIP wajib diisi',
        'nip.unique' => 'NIP sudah terdaftar',
        'password.required' => 'Password wajib diisi',
        'password.confirmed' => 'Konfirmasi password tidak cocok',
    ];

    public function save()
    {
        $this->validate();

        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'nip' => $this->nip,
                'password' => Hash::make($this->password),
                'role' => 'guru',
            ]);

            session()->flash('success', 'Data guru berhasil ditambahkan!');
            return redirect()->route('admin.guru.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menambahkan data!');
        }
    }

    public function render()
    {
        return view('livewire.admin.data-guru.create');
    }
}
