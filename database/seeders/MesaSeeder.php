<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mesa;
class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mesa::insert(
            [
                ['numero' => 1],['numero' => 2],['numero' => 3],
                ['numero' => 4],['numero' => 5],['numero' => 6]
            ]
        );
    }
}
