<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;

class Login extends Component
{
    #[Layout('components.layouts.auth')]
    public $email, $password;

    protected $rules = [
        'email'    => 'required|string',
        'password' => 'required|string|min:8',
    ];

    public function login()
    {
        $this->validate();

        $fieldType = filter_var($this->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'nip';

        if (Auth::attempt([$fieldType => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('guru.dashboard');
        }

        throw ValidationException::withMessages([
            'email' => 'Email/NIP atau password salah',
        ]);
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
