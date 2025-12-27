<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class Register extends Component
{
    #[Layout('components.layouts.auth')]
    public $nip, $email, $password, $name;

    protected $rules = [
        'nip'      => 'nullable|numeric|unique:users,nip',
        'name'     => 'required|string|max:50',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|max:20',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'nip'      => $this->nip,
            'name'     => $this->name,
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
