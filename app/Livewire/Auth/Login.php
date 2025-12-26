<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email'=> 'required|email',
        'password' => 'required|string|min:8',
    ];

    public function login(){
        $this ->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'administrator'){
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('guru.dashboard');
        }

        throw ValidationException::withMessages ([
            'email' => 'Email atau password salah',
        ]);
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
