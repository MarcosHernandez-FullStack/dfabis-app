<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::insert(
            [
                ['nombre' =>'Pollo broaster','stock' =>10,'precio' =>20,'categoria_id' =>1,'unidad_id' =>3],
                ['nombre' =>'Papa rellena','stock' =>10,'precio' =>8,'categoria_id' =>2,'unidad_id' =>1]
            ]
        );
    }
}
