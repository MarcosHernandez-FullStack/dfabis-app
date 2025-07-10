<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table = 'detalle_compra';
    protected $guarded = [];
    protected $connection = 'mysql';

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
