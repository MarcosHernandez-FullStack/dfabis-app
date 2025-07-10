<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sucursal;
class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Sucursal::insert(
            [
                ['direccion' =>'Mi casita','empresa_id'=>1]
            ]
        );
    }
}
