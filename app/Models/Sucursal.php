<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $table = 'sucursal';
    protected $guarded = [];
    protected $connection = 'mysql';

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
