<?php

namespace App\Http\Livewire\Pedido;

use Livewire\Component;
use App\Models\DetallePedido;
use App\Models\Producto;
use App\Models\Agregado;

class AgregadoComponent extends Component
{
    public $detalle_pedido;
    public $agregado;

    public function mount(DetallePedido $detalle_pedido)
    {
        $this->detalle_pedido = $detalle_pedido;
        $this->agregado = new Agregado();
        $this->agregado->detalle_pedido_id = $detalle_pedido->id;
    }

     public function rules()
    {
         return [
            'agregado.precio'        => 'required',
            'agregado.cantidad'        => 'required',
            'agregado.detalle_pedido_id'  => 'required',
            'agregado.producto_id'        => 'required'
          
        ];
    }

    public function render()
    {
        $productos=Producto::where('estado', 'activo')
                ->whereHas('categoria', function ($query) {
                    $query->where('proceso', 'agregado');
                })
                ->get();
        /* $agregados = $this->detalle_pedido->agregados()->get(); */
        return view('livewire.pedido.agregado-component',compact('productos'))
            ->extends('layouts.app')
            ->section('content');
    }

    public function save()
    {
        $this->agregado->precio = $this->agregado->producto->precio;
        $this->validate();
        $this->agregado->save();
        $this->agregado = new Agregado();
        $this->agregado->detalle_pedido_id = $this->detalle_pedido->id;
        $this->detalle_pedido->refresh();
    }

    public function delete($producto_id)
    {
        $this->detalle_pedido->agregados()->detach($producto_id);
        $this->detalle_pedido->refresh();
    }

    public function mostrar()
    {
        dd($this->detalle_pedido->agregados);
    }
}
