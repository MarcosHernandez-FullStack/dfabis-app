<?php

namespace App\Http\Livewire\Pedido;
use App\Models\Producto;
use Livewire\Component;
use App\Models\Crema;
use App\Models\DetallePedido;
use App\Models\Pedido;

class PedidoFormComponent extends Component
{
    public $mesa_id;
    public $detalle_pedido;
    public $detalle;
    public $pedido;

    public function rules()
    {
        return [
           
            'pedido.mesa_id' => 'nullable',
            'pedido.cliente_referencia' => 'required',
            'detalle.producto_id' => 'required',
            'detalle.cantidad'=> 'required',
            'detalle_pedido.*.producto_id' => 'required',
            'detalle_pedido.*.precio' => 'nullable',
            'detalle_pedido.*.cantidad' => 'required'
        ];
    }

     public function mount($mesa_id)
    {
        $this->mesa_id = $mesa_id;
        $this->pedido = new Pedido();
        $this->pedido->mesa_id = $mesa_id;
        $this->detalle = new DetallePedido();
        $this->detalle_pedido = $this->pedido->detalles_pedido;
    }

    public function render()
    {
        $productos=Producto::where('estado', 'activo')
                    ->whereHas('categoria', function ($query) {
                        $query->where('proceso', 'pedido');
                    })
                    ->get();
        $cremas=Crema::where('estado','activo')->get();
        return view('livewire.pedido.pedido-form-component',compact('productos','cremas'))
            ->extends('layouts.app')
            ->section('content');
    }

    public function addPedidoDetalle()
    {
        $this->validate(
            [
                'detalle.producto_id' => 'required',
                'detalle.cantidad' => 'nullable',
                'detalle.precio' => 'nullable'
            ]
        );
       $this->detalle->precio = $this->detalle->producto->precio;
       $this->detalle_pedido->push($this->detalle);
       $this->detalle = new DetallePedido();
    }

    public function save()
    {
       /*  dd($this->detalle_pedido); */
      /*  $this->validate(); */
       $this->pedido->save();
       foreach ($this->detalle_pedido as $detalle) {
           $detalle->pedido_id = $this->pedido->id;
           for($i=0; $i<=$detalle->cantidad;$i++)
           {
                $detalle->offsetUnset('cantidad');
                $detalle->save();
           }
          
       }
       redirect()->route('detallepedido', ['pedido' => $this->pedido->id]);
       /*  session()->flash('message', 'Pedido guardado exitosamente.');
        return redirect()->route('mesas'); */
    }
}
