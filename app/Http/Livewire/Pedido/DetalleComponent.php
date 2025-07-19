<?php

namespace App\Http\Livewire\Pedido;

use Livewire\Component;
use App\Models\Mesa;
use App\Models\Crema;
use App\Models\Pedido;
use App\Models\DetallePedido;

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

    public function saveCrema(DetallePedido $detalle,$crema_id)
    {
        $detalle->cremas()->toggle($crema_id);
    }
}
