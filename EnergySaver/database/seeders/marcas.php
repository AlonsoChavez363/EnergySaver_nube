<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class marcas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marcas')->insert([
            ['Nombre' => 'LG'],
            ['Nombre' => 'Samsung'],
            ['Nombre' => 'Whirlpool'],
            ['Nombre' => 'GE'],
            ['Nombre' => 'Bosch'],
            ['Nombre' => 'Panasonic'],
            ['Nombre' => 'Sony'],
            ['Nombre' => 'Philips'],
            ['Nombre' => 'Electrolux'],
            ['Nombre' => 'Haier'],
        ]);
    }
}
