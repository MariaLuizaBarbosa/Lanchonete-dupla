<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{

    public $nome;
    public $email;
    public $telefone;
    public $endereco;
    public $password;
    public $clienteId;


    public function mount(){
        $cliente = Cliente::find(Auth::user()->cliente->id);
   
        $this->clienteId = $cliente->Id;
        $this->nome = $cliente->nome;
        $this->email = $cliente->user->email;
        $this->telefone = $cliente->telefone;
        $this->endereco = $cliente->endereco;
        $this->password = $cliente->user->password;
    
       }

    public function salvar()
    {
        $cliente = Cliente::find($this->clienteId);

        $cliente->nome = $this->nome;
        $cliente->email = $this->email;
        $cliente->telefone = $this->telefone;
        $cliente->endereco = $this->endereco;
        $cliente->password = $this->user->password;
        $cliente->save();
        $cliente->user->save();
        session()->flash('succes', 'Cliente Atualizado');

    }

    public function render()
    {
        return view('livewire.cliente.edit');
    }
}
