<?php

use Illuminate\Database\Seeder;

class MenuDescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_descriptions')->delete();

        DB::table('menu_descriptions')->insert([
            [
                'lang_code' => "en",
                'menu_id' => 1,
                'name' => 'DASHBOARD',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 1,
                'name' => 'GÖSTERGE PANELİ',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 2,
                'name' => 'TASKS',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 2,
                'name' => 'İŞ LİSTESİ',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 3,
                'name' => 'Board',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 3,
                'name' => 'Tahta',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 4,
                'name' => 'Calendar',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 4,
                'name' => 'Takvim',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 5,
                'name' => 'SALES',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 5,
                'name' => 'SATIŞ',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 6,
                'name' => 'Offers',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 6,
                'name' => 'Teklifler',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 7,
                'name' => 'Orders',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 7,
                'name' => 'Siparişler',
            ],

            [
                'lang_code' => "en",
                'menu_id' => 8,
                'name' => 'Customers',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 8,
                'name' => 'Müşteriler',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 9,
                'name' => 'Sales Report',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 9,
                'name' => 'Satış Raporu',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 10,
                'name' => 'Collect Reports',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 10,
                'name' => 'Tahsilat Raporu',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 11,
                'name' => 'PURCHASES',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 11,
                'name' => 'SATIN ALMA',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 12,
                'name' => 'Offers',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 12,
                'name' => 'Teklifler',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 13,
                'name' => 'Orders',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 13,
                'name' => 'Siparişler',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 14,
                'name' => 'Suppliers',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 14,
                'name' => 'Tedarikçiler',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 15,
                'name' => 'Purchase Report',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 15,
                'name' => 'Satınalma Raporu',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 16,
                'name' => 'Payment Report',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 16,
                'name' => 'Ödeme Raporu',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 17,
                'name' => 'FINANCE',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 17,
                'name' => 'FİNANS',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 18,
                'name' => 'Expense',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 18,
                'name' => 'Giderler',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 19,
                'name' => 'Account',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 19,
                'name' => 'Hesaplar',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 20,
                'name' => 'Cheques',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 20,
                'name' => 'Çekler',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 21,
                'name' => 'Expenses Report',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 21,
                'name' => 'Gider Raporu',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 22,
                'name' => 'VAT Reports',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 22,
                'name' => 'KDV Raporu',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 23,
                'name' => 'STOCKS',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 23,
                'name' => 'STOK',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 24,
                'name' => 'Service and Products',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 24,
                'name' => 'Hizmet ve Ürünler',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 25,
                'name' => 'Stock Movements',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 25,
                'name' => 'Stok Hareketleri',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 26,
                'name' => 'Products in Stock',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 26,
                'name' => 'Stoktaki Ürün Raporları',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 27,
                'name' => 'E-COMMERCE',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 27,
                'name' => 'E-TİCARET',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 28,
                'name' => 'Orders',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 28,
                'name' => 'Siparişler',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 29,
                'name' => 'Products',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 29,
                'name' => 'Ürünler',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 30,
                'name' => 'Settings',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 30,
                'name' => 'Ayarlar',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 31,
                'name' => 'Menus',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 31,
                'name' => 'Menüler',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 32,
                'name' => 'Companies & Users',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 32,
                'name' => 'Hesaplar & Kullanıcılar',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 33,
                'name' => 'Companies',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 33,
                'name' => 'Hesaplar',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 34,
                'name' => 'Users',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 34,
                'name' => 'Kullanıcılar',
            ],
            [
                'lang_code' => "en",
                'menu_id' => 35,
                'name' => 'Localization',
            ],
            [
                'lang_code' => "tr",
                'menu_id' => 35,
                'name' => 'Bölgesel Ayarlar',
            ],




        ]);
    }
}
