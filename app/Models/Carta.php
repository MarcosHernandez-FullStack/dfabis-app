<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;
    protected $table = 'carta';
    protected $guarded = [];
    protected $connection = 'mysql';

    public function detalles_carta()
    {
        return $this->hasMany(CartaDetalle::class);
    }
}
