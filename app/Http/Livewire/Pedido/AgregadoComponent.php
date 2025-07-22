<?php

namespace App\Http\Livewire\Pedido;

use Livewire\Component;

class AgregadoComponent extends Component
{
    public function render()
    {
        return view('livewire.pedido.agregado-component')
            ->extends('layouts.app')
            ->section('content');
    }
}
