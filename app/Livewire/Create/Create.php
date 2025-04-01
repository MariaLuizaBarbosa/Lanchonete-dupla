<?php

namespace App\Livewire\Create;

use App\Models\Cliente;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{

    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $password;
    public $email;

    public function store(){
        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'cliente'
        ]);

        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'user_id' => $user->id,
        ]);

        session()->flash('success', 'Cadastro Realizado');
    }

    public function render()
    {
        return view('livewire.create.create');
    }
}
