<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compra';
    protected $guarded = [];
    protected $connection = 'mysql';
    
    public function detalles_compra()
    {
        return $this->hasMany(DetalleCompra::class);
    }
}
