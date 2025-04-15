<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap'; 

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Produto::findOrFail($id)->delete();
        session()->flash('success', 'Produto deletado com sucesso!');
    }

    public function render()
    {
        $produtos = Produto::where('nome', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.produto.produto-index', compact('produtos'));
    }
}
