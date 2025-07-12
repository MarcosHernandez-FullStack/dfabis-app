<?php

namespace App\Http\Livewire\Pedido;

use Livewire\Component;
use App\Models\Mesa;
use App\Models\Crema;
use App\Models\Pedido;

class DetalleComponent extends Component
{
    public $pedido;

    public function mount(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }
    
    public function render()
    {
        $pedido=$this->pedido;
        $cremas= Crema::where('estado', 'activo')->get();
        return view('livewire.pedido.detalle-component', compact('pedido','cremas'))
            ->extends('layouts.app')
            ->section('content');
    }
}
