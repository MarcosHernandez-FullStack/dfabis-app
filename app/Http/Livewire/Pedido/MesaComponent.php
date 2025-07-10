<?php

namespace App\Http\Livewire\Pedido;

use Livewire\Component;
use App\Models\Mesa;

class MesaComponent extends Component
{
    public function render()
    {
        $mesas = Mesa::where('estado','activo')->get();
        return view('livewire.pedido.mesa-component',compact('mesas'))
            ->extends('layouts.app')
            ->section('content');
    }
}
