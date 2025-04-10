<?php

namespace App\Livewire\Produtos;

use Livewire\Component;
use App\Models\Produto;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $produtoId;
    public $nome, $descricao, $preco, $categoria, $imagem, $imagemAtual;

    public function mount($produto)
    {
        $p = Produto::findOrFail($produto);

        $this->produtoId = $p->id;
        $this->nome = $p->nome;
        $this->descricao = $p->descricao;
        $this->preco = $p->preco;
        $this->categoria = $p->categoria;
        $this->imagemAtual = $p->imagem;
    }

    protected function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'categoria' => 'required|string|max:100',
            'imagem' => 'nullable|image|max:2048',
        ];
    }

    public function atualizar()
    {
        $this->validate();

        $produto = Produto::findOrFail($this->produtoId);

        $imagemPath = $this->imagem
            ? $this->imagem->store('produtos', 'public')
            : $this->imagemAtual;

        $produto->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'categoria' => $this->categoria,
            'imagem' => $imagemPath,
        ]);

        session()->flash('success', 'Produto atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.produtos.edit');
    }
}

