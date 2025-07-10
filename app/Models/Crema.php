<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crema extends Model
{
    use HasFactory;
    protected $table = 'crema';
    protected $guarded = [];
    protected $connection = 'mysql';
}
