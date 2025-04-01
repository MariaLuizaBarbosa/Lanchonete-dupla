<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class Index extends Component
{
    public $nome;
    public $email;
    public $telefone;
    public $endereco;
    public $password;
    public $clienteId;


    public function render()
    {
        $clientes = Cliente::all();
        return view('livewire.cliente.index', compact('clientes'));
    }

    public function excluir(){
        if($this->clienteId){
            Cliente::find($this->clienteId)->delete();
        }
    }
}
