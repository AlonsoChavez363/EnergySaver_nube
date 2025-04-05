<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_electrodomesticos')->insert([
            ['Nombre' => 'Refrigerador'],
            ['Nombre' => 'Lavadora'],
            ['Nombre' => 'Secadora'],
            ['Nombre' => 'Horno'],
            ['Nombre' => 'Microondas'],
            ['Nombre' => 'Aire Acondicionado'],
            ['Nombre' => 'Calefactor'],
            ['Nombre' => 'Televisión'],
            ['Nombre' => 'Licuadora'],
            ['Nombre' => 'Tostadora'],
        ]);
    }
}
