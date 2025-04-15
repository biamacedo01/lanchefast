<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class ClienteCreate extends Component
{
    public $nome, $endereco, $telefone, $cpf, $email, $senha;

    protected $rules = [
   
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'cpf' => 'required|string|max:14',
            'email' => 'required|email|max:255|unique:clientes,email',
            'senha' => 'required|string|min:6'
     
    ];
    public function store()
    {
        $this->validate();

      Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => $this->senha
        ]);

        session()->flash('success', 'Cliente criado com sucesso!');
        $this->reset(); // Limpar os campos do formulário
        return redirect()->route('clientes.index');
    }

    public function render()
    {
        return view('livewire.clientes.cliente-create');
    }
}
