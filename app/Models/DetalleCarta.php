<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCarta extends Model
{
    use HasFactory;
    protected $table = 'detalle_carta';
    protected $guarded = [];
    protected $connection = 'mysql';

    public function carta()
    {
        return $this->belongsTo(Carta::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
