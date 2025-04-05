<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dispositivos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('electrodomesticos')->insert([
            // LG
            ['Potencia' => 150.00, 'id_tipo' => 1, 'id_marca' => 1, 'id_modelo' => 1],
            ['Potencia' => 500.00, 'id_tipo' => 2, 'id_marca' => 1, 'id_modelo' => 2],
            ['Potencia' => 3000.00, 'id_tipo' => 3, 'id_marca' => 1, 'id_modelo' => 3],
            ['Potencia' => 2500.00, 'id_tipo' => 4, 'id_marca' => 1, 'id_modelo' => 4],
            ['Potencia' => 1200.00, 'id_tipo' => 5, 'id_marca' => 1, 'id_modelo' => 5],
            ['Potencia' => 3500.00, 'id_tipo' => 6, 'id_marca' => 1, 'id_modelo' => 6],
            ['Potencia' => 1500.00, 'id_tipo' => 7, 'id_marca' => 1, 'id_modelo' => 7],
            ['Potencia' => 100.00, 'id_tipo' => 8, 'id_marca' => 1, 'id_modelo' => 8],
            ['Potencia' => 800.00, 'id_tipo' => 9, 'id_marca' => 1, 'id_modelo' => 9],
            ['Potencia' => 1000.00, 'id_tipo' => 10, 'id_marca' => 1, 'id_modelo' => 10],

            // Samsung
            ['Potencia' => 220.00, 'id_tipo' => 1, 'id_marca' => 2, 'id_modelo' => 11],
            ['Potencia' => 600.00, 'id_tipo' => 2, 'id_marca' => 2, 'id_modelo' => 12],
            ['Potencia' => 2800.00, 'id_tipo' => 3, 'id_marca' => 2, 'id_modelo' => 13],
            ['Potencia' => 2700.00, 'id_tipo' => 4, 'id_marca' => 2, 'id_modelo' => 14],
            ['Potencia' => 1100.00, 'id_tipo' => 5, 'id_marca' => 2, 'id_modelo' => 15],
            ['Potencia' => 4000.00, 'id_tipo' => 6, 'id_marca' => 2, 'id_modelo' => 16],
            ['Potencia' => 1600.00, 'id_tipo' => 7, 'id_marca' => 2, 'id_modelo' => 17],
            ['Potencia' => 150.00, 'id_tipo' => 8, 'id_marca' => 2, 'id_modelo' => 18],
            ['Potencia' => 1000.00, 'id_tipo' => 9, 'id_marca' => 2, 'id_modelo' => 19],
            ['Potencia' => 1200.00, 'id_tipo' => 10, 'id_marca' => 2, 'id_modelo' => 20],

            // Whirlpool
            ['Potencia' => 180.00, 'id_tipo' => 1, 'id_marca' => 3, 'id_modelo' => 21],
            ['Potencia' => 550.00, 'id_tipo' => 2, 'id_marca' => 3, 'id_modelo' => 22],
            ['Potencia' => 3100.00, 'id_tipo' => 3, 'id_marca' => 3, 'id_modelo' => 23],
            ['Potencia' => 2600.00, 'id_tipo' => 4, 'id_marca' => 3, 'id_modelo' => 24],
            ['Potencia' => 1250.00, 'id_tipo' => 5, 'id_marca' => 3, 'id_modelo' => 25],
            ['Potencia' => 3600.00, 'id_tipo' => 6, 'id_marca' => 3, 'id_modelo' => 26],
            ['Potencia' => 1550.00, 'id_tipo' => 7, 'id_marca' => 3, 'id_modelo' => 27],
            ['Potencia' => 120.00, 'id_tipo' => 8, 'id_marca' => 3, 'id_modelo' => 28],
            ['Potencia' => 850.00, 'id_tipo' => 9, 'id_marca' => 3, 'id_modelo' => 29],
            ['Potencia' => 1050.00, 'id_tipo' => 10, 'id_marca' => 3, 'id_modelo' => 30],

            // GE
            ['Potencia' => 190.00, 'id_tipo' => 1, 'id_marca' => 4, 'id_modelo' => 31],
            ['Potencia' => 520.00, 'id_tipo' => 2, 'id_marca' => 4, 'id_modelo' => 32],
            ['Potencia' => 2900.00, 'id_tipo' => 3, 'id_marca' => 4, 'id_modelo' => 33],
            ['Potencia' => 2550.00, 'id_tipo' => 4, 'id_marca' => 4, 'id_modelo' => 34],
            ['Potencia' => 1150.00, 'id_tipo' => 5, 'id_marca' => 4, 'id_modelo' => 35],
            ['Potencia' => 3450.00, 'id_tipo' => 6, 'id_marca' => 4, 'id_modelo' => 36],
            ['Potencia' => 1450.00, 'id_tipo' => 7, 'id_marca' => 4, 'id_modelo' => 37],
            ['Potencia' => 110.00, 'id_tipo' => 8, 'id_marca' => 4, 'id_modelo' => 38],
            ['Potencia' => 900.00, 'id_tipo' => 9, 'id_marca' => 4, 'id_modelo' => 39],
            ['Potencia' => 980.00, 'id_tipo' => 10, 'id_marca' => 4, 'id_modelo' => 40],

            // Panasonic
            ['Potencia' => 210.00, 'id_tipo' => 1, 'id_marca' => 5, 'id_modelo' => 41],
            ['Potencia' => 560.00, 'id_tipo' => 2, 'id_marca' => 5, 'id_modelo' => 42],
            ['Potencia' => 3000.00, 'id_tipo' => 3, 'id_marca' => 5, 'id_modelo' => 43],
            ['Potencia' => 2800.00, 'id_tipo' => 4, 'id_marca' => 5, 'id_modelo' => 44],
            ['Potencia' => 1300.00, 'id_tipo' => 5, 'id_marca' => 5, 'id_modelo' => 45],
            ['Potencia' => 3800.00, 'id_tipo' => 6, 'id_marca' => 5, 'id_modelo' => 46],
            ['Potencia' => 1700.00, 'id_tipo' => 7, 'id_marca' => 5, 'id_modelo' => 47],
            ['Potencia' => 160.00, 'id_tipo' => 8, 'id_marca' => 5, 'id_modelo' => 48],
            ['Potencia' => 890.00, 'id_tipo' => 9, 'id_marca' => 5, 'id_modelo' => 49],
            ['Potencia' => 1120.00, 'id_tipo' => 10, 'id_marca' => 5, 'id_modelo' => 50],
            // Sony
['Potencia' => 180.00, 'id_tipo' => 1, 'id_marca' => 6, 'id_modelo' => 51],
['Potencia' => 470.00, 'id_tipo' => 2, 'id_marca' => 6, 'id_modelo' => 52],
['Potencia' => 2800.00, 'id_tipo' => 3, 'id_marca' => 6, 'id_modelo' => 53],
['Potencia' => 2700.00, 'id_tipo' => 4, 'id_marca' => 6, 'id_modelo' => 54],
['Potencia' => 1250.00, 'id_tipo' => 5, 'id_marca' => 6, 'id_modelo' => 55],
['Potencia' => 3500.00, 'id_tipo' => 6, 'id_marca' => 6, 'id_modelo' => 56],
['Potencia' => 1600.00, 'id_tipo' => 7, 'id_marca' => 6, 'id_modelo' => 57],
['Potencia' => 130.00, 'id_tipo' => 8, 'id_marca' => 6, 'id_modelo' => 58],
['Potencia' => 920.00, 'id_tipo' => 9, 'id_marca' => 6, 'id_modelo' => 59],
['Potencia' => 950.00, 'id_tipo' => 10, 'id_marca' => 6, 'id_modelo' => 60],

// Philips
['Potencia' => 170.00, 'id_tipo' => 1, 'id_marca' => 7, 'id_modelo' => 61],
['Potencia' => 530.00, 'id_tipo' => 2, 'id_marca' => 7, 'id_modelo' => 62],
['Potencia' => 2750.00, 'id_tipo' => 3, 'id_marca' => 7, 'id_modelo' => 63],
['Potencia' => 2600.00, 'id_tipo' => 4, 'id_marca' => 7, 'id_modelo' => 64],
['Potencia' => 1200.00, 'id_tipo' => 5, 'id_marca' => 7, 'id_modelo' => 65],
['Potencia' => 3700.00, 'id_tipo' => 6, 'id_marca' => 7, 'id_modelo' => 66],
['Potencia' => 1550.00, 'id_tipo' => 7, 'id_marca' => 7, 'id_modelo' => 67],
['Potencia' => 140.00, 'id_tipo' => 8, 'id_marca' => 7, 'id_modelo' => 68],
['Potencia' => 880.00, 'id_tipo' => 9, 'id_marca' => 7, 'id_modelo' => 69],
['Potencia' => 1000.00, 'id_tipo' => 10, 'id_marca' => 7, 'id_modelo' => 70],

// Electrolux
['Potencia' => 190.00, 'id_tipo' => 1, 'id_marca' => 8, 'id_modelo' => 71],
['Potencia' => 500.00, 'id_tipo' => 2, 'id_marca' => 8, 'id_modelo' => 72],
['Potencia' => 2850.00, 'id_tipo' => 3, 'id_marca' => 8, 'id_modelo' => 73],
['Potencia' => 2750.00, 'id_tipo' => 4, 'id_marca' => 8, 'id_modelo' => 74],
['Potencia' => 1300.00, 'id_tipo' => 5, 'id_marca' => 8, 'id_modelo' => 75],
['Potencia' => 3600.00, 'id_tipo' => 6, 'id_marca' => 8, 'id_modelo' => 76],
['Potencia' => 1650.00, 'id_tipo' => 7, 'id_marca' => 8, 'id_modelo' => 77],
['Potencia' => 120.00, 'id_tipo' => 8, 'id_marca' => 8, 'id_modelo' => 78],
['Potencia' => 870.00, 'id_tipo' => 9, 'id_marca' => 8, 'id_modelo' => 79],
['Potencia' => 1080.00, 'id_tipo' => 10, 'id_marca' => 8, 'id_modelo' => 80],

// Haier
['Potencia' => 200.00, 'id_tipo' => 1, 'id_marca' => 9, 'id_modelo' => 81],
['Potencia' => 550.00, 'id_tipo' => 2, 'id_marca' => 9, 'id_modelo' => 82],
['Potencia' => 3100.00, 'id_tipo' => 3, 'id_marca' => 9, 'id_modelo' => 83],
['Potencia' => 2900.00, 'id_tipo' => 4, 'id_marca' => 9, 'id_modelo' => 84],
['Potencia' => 1250.00, 'id_tipo' => 5, 'id_marca' => 9, 'id_modelo' => 85],
['Potencia' => 3750.00, 'id_tipo' => 6, 'id_marca' => 9, 'id_modelo' => 86],
['Potencia' => 1600.00, 'id_tipo' => 7, 'id_marca' => 9, 'id_modelo' => 87],
['Potencia' => 150.00, 'id_tipo' => 8, 'id_marca' => 9, 'id_modelo' => 88],
['Potencia' => 920.00, 'id_tipo' => 9, 'id_marca' => 9, 'id_modelo' => 89],
['Potencia' => 1040.00, 'id_tipo' => 10, 'id_marca' => 9, 'id_modelo' => 90],

// Haier Extended
['Potencia' => 220.00, 'id_tipo' => 1, 'id_marca' => 10, 'id_modelo' => 91],
['Potencia' => 580.00, 'id_tipo' => 2, 'id_marca' => 10, 'id_modelo' => 92],
['Potencia' => 3200.00, 'id_tipo' => 3, 'id_marca' => 10, 'id_modelo' => 93],
['Potencia' => 3000.00, 'id_tipo' => 4, 'id_marca' => 10, 'id_modelo' => 94],
['Potencia' => 1350.00, 'id_tipo' => 5, 'id_marca' => 10, 'id_modelo' => 95],
['Potencia' => 3800.00, 'id_tipo' => 6, 'id_marca' => 10, 'id_modelo' => 96],
['Potencia' => 1700.00, 'id_tipo' => 7, 'id_marca' => 10, 'id_modelo' => 97],
['Potencia' => 160.00, 'id_tipo' => 8, 'id_marca' => 10, 'id_modelo' => 98],
['Potencia' => 890.00, 'id_tipo' => 9, 'id_marca' => 10, 'id_modelo' => 99],
['Potencia' => 1120.00, 'id_tipo' => 10, 'id_marca' => 10, 'id_modelo' => 100],

        ]);
    }
}
