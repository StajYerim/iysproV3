<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("units")->delete();
        DB::table('units')->insert([
            [
                'name' => 'ADET',
                'short_name' => 'ADET',
                'type' => 'Miktar',
            ],
            [
                'name' => 'KOLİ',
                'short_name' => 'KOLİ',
                'type' => 'Miktar',
            ],
            [
                'name' => 'PALET',
                'short_name' => 'PALET',
                'type' => 'Miktar',
            ],
            [
                'name' => 'KAMYON',
                'short_name' => 'KAMYON',
                'type' => 'Miktar',
            ],
            [
                'name' => 'KONTEYNIR',
                'short_name' => 'KONTEYNIR',
                'type' => 'Miktar',
            ],
            [
                'name' => 'PAKET',
                'short_name' => 'PAKET',
                'type' => 'Miktar',
            ],
            [
                'name' => 'POŞET',
                'short_name' => 'POŞET',
                'type' => 'Miktar',
            ],
            [
                'name' => 'FİLE',
                'short_name' => 'FİLE',
                'type' => 'Miktar',
            ],
            [
                'name' => 'ÇUVAL',
                'short_name' => 'ÇUVAL',
                'type' => 'Miktar',
            ],
            [
                'name' => 'SANDIK',
                'short_name' => 'SANDIK',
                'type' => 'Miktar',
            ],
            [
                'name' => 'SANİYE',
                'short_name' => 'SANİYE',
                'type' => 'Zaman',
            ],
            [
                'name' => 'DAKİKA',
                'short_name' => 'DAKİKA',
                'type' => 'Zaman',
            ],
            [
                'name' => 'SAAT',
                'short_name' => 'SAAT',
                'type' => 'Zaman',
            ],
            [
                'name' => 'GÜN',
                'short_name' => 'GÜN',
                'type' => 'Zaman',
            ],
            [
                'name' => 'HAFTA',
                'short_name' => 'HAFTA',
                'type' => 'Zaman',
            ],
            [
                'name' => 'AY',
                'short_name' => 'AY',
                'type' => 'Zaman',
            ],
            [
                'name' => 'YIL',
                'short_name' => 'YIL',
                'type' => 'Zaman',
            ],
            [
                'name' => 'MİLİGRAM',
                'short_name' => 'MG',
                'type' => 'Ağırlık',
            ],
            [
                'name' => 'GRAM',
                'short_name' => 'GR',
                'type' => 'Ağırlık',
            ],
            [
                'name' => 'KİLOGRAM',
                'short_name' => 'KG',
                'type' => 'Ağırlık',
            ],
            [
                'name' => 'TON',
                'short_name' => 'TON',
                'type' => 'Ağırlık',
            ],
            [
                'name' => 'LİTRE',
                'short_name' => 'LT',
                'type' => 'Ağırlık',
            ],
            [
                'name' => 'MİLİMETREKARE',
                'short_name' => 'MM2',
                'type' => 'Alan',
            ],
            [
                'name' => 'SANTİMETREKARE',
                'short_name' => 'CM2',
                'type' => 'Alan',
            ],
            [
                'name' => 'METREKARE',
                'short_name' => 'M2',
                'type' => 'Alan',
            ],
            [
                'name' => 'DESİMETREKARE',
                'short_name' => 'DM2',
                'type' => 'Alan',
            ],
            [
                'name' => 'MİLİMETREKÜP',
                'short_name' => 'MM3',
                'type' => 'Hacim',
            ],
            [
                'name' => 'SANTİMETREKÜP',
                'short_name' => 'CM3',
                'type' => 'Hacim',
            ],
            [
                'name' => 'METREKÜP',
                'short_name' => 'M3',
                'type' => 'Hacim',
            ],
            [
                'name' => 'DESİMETREKÜP',
                'short_name' => 'DM3',
                'type' => 'Hacim',
            ],
            [
                'name' => 'MİLİMETRE',
                'short_name' => 'MM',
                'type' => 'Uzunluk',
            ],
            [
                'name' => 'SANTİMETRE',
                'short_name' => 'CM',
                'type' => 'Uzunluk',
            ],
            [
                'name' => 'METRE',
                'short_name' => 'MT',
                'type' => 'Uzunluk',
            ],
            [
                'name' => 'DESİMETRE',
                'short_name' => 'DM',
                'type' => 'Uzunluk',
            ],
            [
                'name' => 'KİLOMETRE',
                'short_name' => 'KM',
                'type' => 'Uzunluk',
            ]
        ]);
    }
}
