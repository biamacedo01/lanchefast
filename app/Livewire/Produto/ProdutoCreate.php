<?php

namespace App\Livewire\Produtos;

use Livewire\Component;
use App\Models\Produto;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nome, $descricao, $preco, $categoria, $imagem;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'preco' => 'required|numeric|min:0',
        'categoria' => 'required|string|max:100',
        'imagem' => 'nullable|image|max:2048', // 2MB
    ];

    public function salvar()
    {
        $this->validate();

        $imagemPath = $this->imagem ? $this->imagem->store('produtos', 'public') : null;

        Produto::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'categoria' => $this->categoria,
            'imagem' => $imagemPath,
        ]);

        session()->flash('success', 'Produto cadastrado com sucesso!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.produtos.create');
    }
}

