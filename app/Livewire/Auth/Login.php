<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Symfony\Contracts\Service\Attribute\Required;

class Login extends Component
{

    public $email;
    public $password;

    public $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ];

    public $messages = [
        'email.required' => 'email obrigatório',
        'email.email' => 'formato de email inválido',
        'password.required' => 'senha obrigatória',
        'password.min' => 'senha deve conter no mínimo 6 caracteres'
    ];

    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password ])) {
            session()->regenerate();
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            if (Auth::user()->role === 'funcionario') {
                return redirect()->route('funcionario.dashboard');
            }
            if (Auth::user()->role === 'clientes') {
                return redirect()->route('clientes.dashboard');
            }
        }
        session()->flash('error', 'Email ou senha incorretos');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
