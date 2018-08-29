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
            ],
            [
                'id' => '2',
                'icon' => '$',
                'code' => 'USD',
                'name' => 'Dolar',
                'desc' => 'Amerika Birleşik Devletler Para birimi',
            ],
            [
                'id' => '3',
                'icon' => '€',
                'code' => 'EUR',
                'name' => 'Euro',
                'desc' => 'Avrupa Para Birimi',
            ],

        ]);
    }
}
