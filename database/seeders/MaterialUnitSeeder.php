<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['name' => 'Meter', 'unit' => 'm'],
            ['name' => 'Meter Persegi', 'unit' => 'm²'],
            ['name' => 'Meter Kubik', 'unit' => 'm³'],
            ['name' => 'Kilogram', 'unit' => 'kg'],
            ['name' => 'Ton', 'unit' => 'ton'],
            ['name' => 'Liter', 'unit' => 'ltr'],
            ['name' => 'Mililiter', 'unit' => 'ml'],
            ['name' => 'Batang', 'unit' => 'btg'],
            ['name' => 'Lembar', 'unit' => 'lbr'],
            ['name' => 'Sak', 'unit' => 'sak'],
            ['name' => 'Dus', 'unit' => 'dus'],
            ['name' => 'Roll', 'unit' => 'roll'],
            ['name' => 'Pak', 'unit' => 'pak'],
            ['name' => 'Set', 'unit' => 'set'],
            ['name' => 'Biji', 'unit' => 'bj'],
            ['name' => 'Pasang', 'unit' => 'psg'],
            ['name' => 'Kaleng', 'unit' => 'kaleng'],
            ['name' => 'Pail', 'unit' => 'pail'],
            ['name' => 'Karung', 'unit' => 'krg'],
            ['name' => 'Jerigen', 'unit' => 'jrg'],
            ['name' => 'Bak', 'unit' => 'bak'],
            ['name' => 'Koli', 'unit' => 'koli'],
            ['name' => 'Bungkus', 'unit' => 'bks'],
            ['name' => 'Gram', 'unit' => 'g'],
            ['name' => 'Tonase', 'unit' => 'ton'],
            ['name' => 'Kubik', 'unit' => 'm³'],
            ['name' => 'Meter Lari', 'unit' => 'm'],
            ['name' => 'Buah', 'unit' => 'bh'],
            ['name' => 'Pcs', 'unit' => 'pcs'],
            ['name' => 'Kotak', 'unit' => 'ktk'],
            ['name' => 'Karton', 'unit' => 'karton'],
            ['name' => 'Tray', 'unit' => 'tray'],
            ['name' => 'Rim', 'unit' => 'rim'],
            ['name' => 'Bidang', 'unit' => 'bdg'],
            ['name' => 'Volume', 'unit' => 'm³'],
            ['name' => 'Lusin', 'unit' => 'lusin'],
            ['name' => 'Gross', 'unit' => 'gross'],
            ['name' => 'Kodi', 'unit' => 'kodi'],
            ['name' => 'Renceng', 'unit' => 'renceng'],
            ['name' => 'Satuan', 'unit' => 'satuan'],
            ['name' => 'M3', 'unit' => 'm³'],
            ['name' => 'Bongkahan', 'unit' => 'bongkahan'],
            ['name' => 'Drum', 'unit' => 'drum'],
            ['name' => 'Botol', 'unit' => 'btl'],
            ['name' => 'Tabung', 'unit' => 'tabung'],
            ['name' => 'Container', 'unit' => 'cont'],
            ['name' => 'Long Ton', 'unit' => 'long ton'],
            ['name' => 'Short Ton', 'unit' => 'short ton'],
            ['name' => 'Inci', 'unit' => 'inci'],
            ['name' => 'Kilo Liter', 'unit' => 'kl'],
        ];

        DB::table('material_units')->insert($units);
    }
}
