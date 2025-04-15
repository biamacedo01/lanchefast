<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class ClienteEdit extends Component
{
    public $cliente;
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $senha;

    // Método que é chamado quando o componente é inicializado
    public function mount($cliente)
    {
        $this->cliente = Cliente::findOrFail($cliente);  // Buscar o cliente pelo ID

        // Preencher os campos com os dados do cliente
        $this->nome = $this->cliente->nome;
        $this->endereco = $this->cliente->endereco;
        $this->telefone = $this->cliente->telefone;
        $this->cpf = $this->cliente->cpf;
        $this->email = $this->cliente->email;
        $this->senha = $this->cliente->senha;
    }

    // Método responsável por atualizar os dados do cliente
    public function update()
    {
        // Validar os dados antes de salvar
        $this->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'cpf' => 'required|string|max:14',
            'email' => 'required|email|max:255',
            'senha' => 'required|string|min:6',
        ]);

        // Atualizar o cliente no banco de dados
        $this->cliente->update([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
        ]);

        // Informar que a atualização foi bem-sucedida
        session()->flash('success', 'Cliente atualizado com sucesso!');

        // Redirecionar para a lista de clientes
        return redirect()->route('clientes.index');
    }

    public function render()
    {
        return view('livewire.clientes.cliente-edit');
    }
}
