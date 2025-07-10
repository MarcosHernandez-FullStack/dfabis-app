<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unidad;
class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unidad::insert(
            [
                ['nombre' =>'1'],['nombre' =>'1/2'],['nombre' =>'1/4'],
                ['nombre' =>'1/8']
            ]
        );
    }
}
