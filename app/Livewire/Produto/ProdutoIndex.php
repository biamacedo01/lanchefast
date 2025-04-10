<?php
namespace App\Livewire\Produtos;

use Livewire\Component;
use App\Models\Produto;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap'; // ou 'tailwind' dependendo do CSS que usa

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

        return view('livewire.produtos.index', compact('produtos'));
    }
}
