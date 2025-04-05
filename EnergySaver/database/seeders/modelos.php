<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class modelos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modelos')->insert([
            // LG
            ['Nombre' => 'LG InstaView Door-in-Door', 'id_marca' => 1],
            ['Nombre' => 'LG ThinQ', 'id_marca' => 1],
            ['Nombre' => 'LG TurboWash', 'id_marca' => 1],
            ['Nombre' => 'LG NeoChef', 'id_marca' => 1],
            ['Nombre' => 'LG Art Cool', 'id_marca' => 1],
            ['Nombre' => 'LG Styler', 'id_marca' => 1],
            ['Nombre' => 'LG CordZero', 'id_marca' => 1],
            ['Nombre' => 'LG Smart Drum', 'id_marca' => 1],
            ['Nombre' => 'LG Studio', 'id_marca' => 1],
            ['Nombre' => 'LG Side-by-Side', 'id_marca' => 1],

            // Samsung
            ['Nombre' => 'Samsung Family Hub', 'id_marca' => 2],
            ['Nombre' => 'Samsung FlexWash', 'id_marca' => 2],
            ['Nombre' => 'Samsung PowerGrill', 'id_marca' => 2],
            ['Nombre' => 'Samsung WindFree', 'id_marca' => 2],
            ['Nombre' => 'Samsung AddWash', 'id_marca' => 2],
            ['Nombre' => 'Samsung StormWash', 'id_marca' => 2],
            ['Nombre' => 'Samsung Clean Station', 'id_marca' => 2],
            ['Nombre' => 'Samsung Jet Bot AI+', 'id_marca' => 2],
            ['Nombre' => 'Samsung Bespoke', 'id_marca' => 2],
            ['Nombre' => 'Samsung Chef Collection', 'id_marca' => 2],

            // Whirlpool
            ['Nombre' => 'Whirlpool French Door', 'id_marca' => 3],
            ['Nombre' => 'Whirlpool Cabrio', 'id_marca' => 3],
            ['Nombre' => 'Whirlpool Smart Oven', 'id_marca' => 3],
            ['Nombre' => 'Whirlpool Gold', 'id_marca' => 3],
            ['Nombre' => 'Whirlpool EveryDrop', 'id_marca' => 3],
            ['Nombre' => 'Whirlpool WDF540', 'id_marca' => 3],
            ['Nombre' => 'Whirlpool Sunset Bronze', 'id_marca' => 3],
            ['Nombre' => 'Whirlpool Load & Go', 'id_marca' => 3],
            ['Nombre' => 'Whirlpool AccuChill', 'id_marca' => 3],
            ['Nombre' => 'Whirlpool Side-by-Side', 'id_marca' => 3],

            // GE
            ['Nombre' => 'GE Profile', 'id_marca' => 4],
            ['Nombre' => 'GE Cafe', 'id_marca' => 4],
            ['Nombre' => 'GE Artistry', 'id_marca' => 4],
            ['Nombre' => 'GE SmartWater', 'id_marca' => 4],
            ['Nombre' => 'GE Advantium', 'id_marca' => 4],
            ['Nombre' => 'GE Monogram', 'id_marca' => 4],
            ['Nombre' => 'GE Arctica', 'id_marca' => 4],
            ['Nombre' => 'GE Harmony', 'id_marca' => 4],
            ['Nombre' => 'GE CleanSpeak', 'id_marca' => 4],
            ['Nombre' => 'GE Side-by-Side', 'id_marca' => 4],

            // Bosch
            ['Nombre' => 'Bosch 800 Series', 'id_marca' => 5],
            ['Nombre' => 'Bosch Benchmark', 'id_marca' => 5],
            ['Nombre' => 'Bosch Ascenta', 'id_marca' => 5],
            ['Nombre' => 'Bosch Vision', 'id_marca' => 5],
            ['Nombre' => 'Bosch Logixx', 'id_marca' => 5],
            ['Nombre' => 'Bosch Serie 4', 'id_marca' => 5],
            ['Nombre' => 'Bosch Serie 6', 'id_marca' => 5],
            ['Nombre' => 'Bosch Home Connect', 'id_marca' => 5],
            ['Nombre' => 'Bosch FlexInduction', 'id_marca' => 5],
            ['Nombre' => 'Bosch Side-by-Side', 'id_marca' => 5],

            // Panasonic
            ['Nombre' => 'Panasonic Econavi', 'id_marca' => 6],
            ['Nombre' => 'Panasonic Nanoe', 'id_marca' => 6],
            ['Nombre' => 'Panasonic PrimeFresh', 'id_marca' => 6],
            ['Nombre' => 'Panasonic Inverter', 'id_marca' => 6],
            ['Nombre' => 'Panasonic FlashXpress', 'id_marca' => 6],
            ['Nombre' => 'Panasonic Cyclonic', 'id_marca' => 6],
            ['Nombre' => 'Panasonic WhisperSense', 'id_marca' => 6],
            ['Nombre' => 'Panasonic ThermoPot', 'id_marca' => 6],
            ['Nombre' => 'Panasonic Side-by-Side', 'id_marca' => 6],
            ['Nombre' => 'Panasonic Compact', 'id_marca' => 6],

            // Sony
            ['Nombre' => 'Sony Bravia', 'id_marca' => 7],
            ['Nombre' => 'Sony XBR', 'id_marca' => 7],
            ['Nombre' => 'Sony Alpha', 'id_marca' => 7],
            ['Nombre' => 'Sony Walkman', 'id_marca' => 7],
            ['Nombre' => 'Sony Xperia', 'id_marca' => 7],
            ['Nombre' => 'Sony PlayStation', 'id_marca' => 7],
            ['Nombre' => 'Sony WH-1000XM4', 'id_marca' => 7],
            ['Nombre' => 'Sony Z9F', 'id_marca' => 7],
            ['Nombre' => 'Sony RX100', 'id_marca' => 7],
            ['Nombre' => 'Sony Side-by-Side', 'id_marca' => 7],

            // Philips
            ['Nombre' => 'Philips Hue', 'id_marca' => 8],
            ['Nombre' => 'Philips Sonicare', 'id_marca' => 8],
            ['Nombre' => 'Philips Airfryer', 'id_marca' => 8],
            ['Nombre' => 'Philips PerfectDraft', 'id_marca' => 8],
            ['Nombre' => 'Philips 5000 Series', 'id_marca' => 8],
            ['Nombre' => 'Philips DreamStation', 'id_marca' => 8],
            ['Nombre' => 'Philips Avance', 'id_marca' => 8],
            ['Nombre' => 'Philips AVENT', 'id_marca' => 8],
            ['Nombre' => 'Philips Side-by-Side', 'id_marca' => 8],
            ['Nombre' => 'Philips Wake-Up Light', 'id_marca' => 8],

            // Electrolux
            ['Nombre' => 'Electrolux PerfectCare', 'id_marca' => 9],
            ['Nombre' => 'Electrolux UltraSilencer', 'id_marca' => 9],
            ['Nombre' => 'Electrolux Ergorapido', 'id_marca' => 9],
            ['Nombre' => 'Electrolux PureAdvantage', 'id_marca' => 9],
            ['Nombre' => 'Electrolux TasteGuard', 'id_marca' => 9],
            ['Nombre' => 'Electrolux FlexCare', 'id_marca' => 9],
            ['Nombre' => 'Electrolux AirDry', 'id_marca' => 9],
            ['Nombre' => 'Electrolux TwinTech', 'id_marca' => 9],
            ['Nombre' => 'Electrolux Side-by-Side', 'id_marca' => 9],
            ['Nombre' => 'Electrolux FreshPlus', 'id_marca' => 9],

            // Haier
            ['Nombre' => 'Haier Thermocool', 'id_marca' => 10],
            ['Nombre' => 'Haier DuoDry', 'id_marca' => 10],
            ['Nombre' => 'Haier Serenity', 'id_marca' => 10],
            ['Nombre' => 'Haier Easy Clean', 'id_marca' => 10],
            ['Nombre' => 'Haier Intelius', 'id_marca' => 10],
            ['Nombre' => 'Haier Side-by-Side', 'id_marca' => 10],
            ['Nombre' => 'Haier SnapFreezer', 'id_marca' => 10],
            ['Nombre' => 'Haier Wave', 'id_marca' => 10],
            ['Nombre' => 'Haier Swift', 'id_marca' => 10],
            ['Nombre' => 'Haier Triple Clean', 'id_marca' => 10],
        ]);
    }
}
