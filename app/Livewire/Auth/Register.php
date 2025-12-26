<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    // Tambahkan $nip di sini
    public $nip, $email, $password, $nama;

    protected $rules = [
        'nip'      => 'nullable|numeric|unique:users,nip',
        'nama'     => 'required|string|max:50',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|max:20',
    ];

    public function register()
    {
        $this->validate();

       
        dd($this->all());

        $user = User::create([
            'nip'      => $this->nip,
            'nama'     => $this->nama,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            'role'     => 'guru',
        ]);

        Auth::login($user);
        session()->regenerate();


        return redirect()->route('guru.dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
