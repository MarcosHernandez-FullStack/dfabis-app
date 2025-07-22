<?php

namespace App\Http\Livewire\Pedido;
use App\Models\Producto;
use Livewire\Component;
use App\Models\Crema;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Mesa;

class PedidoFormComponent extends Component
{
    public $mesa;
    public $pedido;
    public $detalle = [
        'producto' => null,
        'precio'      => null,
        'cantidad'    => null,
    ];
    public $detalle_pedido; // colección de arrays

    public function rules()
    {
         return [
            'pedido.cliente_referencia'        => 'required',
            'detalle.producto_id'              => 'required|exists:productos,id',
            'detalle.cantidad'                 => 'required|integer|min:1',
        ];
    }

     public function mount(Mesa $mesa)
    {
        $this->mesa = $mesa;
        $this->pedido = new Pedido();
        $this->pedido->mesa_id = $mesa->id;
        $this->detalle_pedido  = collect();
    }

    public function render()
    {
        $productos=Producto::where('estado', 'activo')
                    ->whereHas('categoria', function ($query) {
                        $query->where('proceso', 'pedido');
                    })
                    ->get();
        return view('livewire.pedido.pedido-form-component',compact('productos'))
            ->extends('layouts.app')
            ->section('content');
    }

    public function addPedidoDetalle()
    {
        $this->validate([
            'detalle.producto_id' => 'required',
            'detalle.cantidad'    => 'required',
        ]);
        $producto = Producto::find($this->detalle['producto_id']);
        $this->detalle_pedido->push([
            'producto' => $producto,
            'precio'   => $producto->precio,
            'cantidad' => $this->detalle['cantidad'],
        ]);
        $this->detalle = [
            'producto_id' => null,
            'precio'      => null,
            'cantidad'    => null,
        ];
    }

    public function removePedidoDetalle($index)
    {
        $this->detalle_pedido->forget($index);
        $this->detalle_pedido = $this->detalle_pedido->values(); // reindexar
    }

    public function save()
    {
      /*  $this->validate(); */
       $this->pedido->save();
       foreach ($this->detalle_pedido as $detalle) {
           for($i=0; $i<$detalle['cantidad'];$i++)
           {
                $detalle_save=new DetallePedido();
                $detalle_save->pedido_id = $this->pedido->id;
                $detalle_save->producto_id = $detalle['producto']['id'];
                $detalle_save->precio = $detalle['precio'];
                $detalle_save->save();
           }
       }
       redirect()->route('detallepedido', ['pedido' => $this->pedido->id]);
       /*  session()->flash('message', 'Pedido guardado exitosamente.');
        return redirect()->route('mesas'); */
    }
}
