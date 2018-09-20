<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("currencies")->delete();
        DB::table('currencies')->insert([
            [
                'id' => '1',
                'icon' => '₺',
                'code' => 'TRY',
                'name' => 'Türk Lirası',
                'desc' => 'Türkiye Para Birimi',
                'coin' => 'KRŞ',
            ],
            [
                'id' => '2',
                'icon' => '$',
                'code' => 'USD',
                'name' => 'Dolar',
                'desc' => 'Amerika Birleşik Devletler Para birimi',
                'coin' => 'CENT',
            ],
            [
                'id' => '3',
                'icon' => '€',
                'code' => 'EUR',
                'name' => 'Euro',
                'desc' => 'Avrupa Para Birimi',
                'coin' => 'CENT',
            ],
            [
                'id' => '4',
                'icon' => '£',
                'code' => 'GBP',
                'name' => 'İngiliz Sterlini',
                'desc' => 'İngiltere Para Birimi',
                'coin' => 'PENCE',
            ],

        ]);
    }
}
