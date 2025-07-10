<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Crema;
class CremaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Crema::insert(
            [
                ['nombre' => 'Aceituna'],['nombre' => 'Ají pollero'],['nombre' => 'Mayonesa'],
                ['nombre' => 'Ketchup'],['nombre' => 'Huacatay'],['nombre' => 'Mostaza'],
                ['nombre' => 'Vinagreta']
            ]
        );
    }
}
