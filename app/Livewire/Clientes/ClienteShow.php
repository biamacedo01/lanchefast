<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class ClienteShow extends Component
{
    public Cliente $cliente;

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }


    public function render()
    {
        return view('livewire.clientes.cliente-show');
    }
}



