<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

class ClienteEdit extends Component
{
    public $clienteId;
    public $nome, $endereco, $telefone, $cpf, $email, $senha;

    // Recebe o ID via mount
    public function mount($id)
    {
        $cliente = Cliente::findOrFail($id);

        $this->clienteId = $cliente->id;
        $this->nome = $cliente->nome;
        $this->endereco = $cliente->endereco;
        $this->telefone = $cliente->telefone;
        $this->cpf = $cliente->cpf;
        $this->email = $cliente->email;
    }

    protected function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'cpf' => 'required|string|max:14|unique:clientes,cpf,' . $this->clienteId,
            'email' => 'required|email|unique:clientes,email,' . $this->clienteId,
            'senha' => 'nullable|string|min:6',
        ];
    }

    public function update()
    {
        $this->validate();

        $cliente = Cliente::findOrFail($this->clienteId);

        $cliente->update([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => $this->senha ? Hash::make($this->senha) : $cliente->senha,
        ]);

        session()->flash('success', 'Cliente atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.cliente-edit');
    }
}
