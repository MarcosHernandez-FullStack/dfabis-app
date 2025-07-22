<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $table = 'detalle_pedido';
    protected $guarded = [];
    protected $connection = 'mysql';
    
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class,'producto_id');
    }
    public function cremas()
    {
        return $this->belongsToMany(Crema::class, 'detalle_crema', 'detalle_pedido_id', 'crema_id');
    }
    public function agregados()
    {
        return $this->belongsToMany(Producto::class, 'agregado', 'detalle_pedido_id', 'producto_id')
                    ->withPivot(['cantidad', 'precio'])
                    ->withTimestamps();
    }
}
