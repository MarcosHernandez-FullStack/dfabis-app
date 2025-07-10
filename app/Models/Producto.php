<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    protected $guarded = [];
    protected $connection = 'mysql';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }
    public function detalles_carta()
    {
        return $this->hasMany(DetalleCarta::class);
    }
    public function detalles_compra()
    {
        return $this->hasMany(DetalleCompra::class);
    }
    public function detalles_pedido()
    {
        return $this->hasMany(DetallePedido::class);
    }
    public function getNombreCompletoAttribute()
    {
        return "{$this->unidad->nombre} {$this->nombre}";
    }
}
