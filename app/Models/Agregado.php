<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agregado extends Model
{
    use HasFactory;
    protected $table = 'agregado';
    protected $guarded = [];
    protected $connection = 'mysql';

    public function detalle_pedido()
    {
        return $this->belongsTo(DetallePedido::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
