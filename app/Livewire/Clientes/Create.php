<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

class ClienteCreate extends Component
{
    public $nome, $endereco, $telefone, $cpf, $email, $senha;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'endereco' => 'required|string|max:255',
        'telefone' => 'required|string|max:20',
        'cpf' => 'required|string|max:14|unique:clientes,cpf',
        'email' => 'required|email|unique:clientes,email',
        'senha' => 'required|string|min:6',
    ];

    public function submit()
    {
        $this->validate();

        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => Hash::make($this->senha),
        ]);

        session()->flash('success', 'Cliente cadastrado com sucesso!');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.cliente-create');
    }
}
