<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;


    protected $queryString = [
        'seach'=>['exept'=>''],
        'perPage'=>['exept'=>10]
    ];


    public function render()
    {
        $clientes = Cliente::where('nome', 'like', "%{$this->search}%")
        ->orWhere('email', 'like', "%{$this->search}%")
        ->orWhere('cpf', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.clientes.index', compact('clientes'));
    }

    public function delete($id){
        Cliente::FindOrFail($id)->delete();
        session()->flash('message', 'Cliente Deletado com sucesso');
    }

}
