<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Categoria::insert(
            [
                ['nombre' =>'Carnes fritas','proceso'=>'pedido'],['nombre' =>'Carbohidratos fritos','proceso'=>'pedido'],
                ['nombre' =>'Agregados','proceso'=>'agregado']
            ]
        );
    }
}
