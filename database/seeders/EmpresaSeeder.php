<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;
class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Empresa::insert(
            [
                [
                    'razon_social' =>"D'FABIS",
                    'ruc' =>'12345678912',
                    'nro_celular' =>'(+51) 943904678',
                    'ruta_logo' =>'--',
                    'slogan' =>'Ricote, ¿di?'
                ]
            ]
        );
    }
}
