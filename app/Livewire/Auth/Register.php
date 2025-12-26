<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $email, $password, $nama, $role;

    protected $rules = [
        'nama' => 'required|string|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|max:20', 
        'role' => 'required|in:administrator,guru',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);

        Auth::login($user);

        session()->regenerate();

        if ($user->role === 'administrator') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('guru.dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
