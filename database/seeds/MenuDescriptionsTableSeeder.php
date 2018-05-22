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
                'id' => 1,
                'lang_code' => "en",
                'menu_id' => 1,
                'name' => 'Dashboard'
            ],
            [
                'id' => 2,
                'lang_code' => "en",
                'menu_id' => 2,
                'name' => 'Tasks'
            ],
            [
                'id' => 3,
                'lang_code' => "en",
                'menu_id' => 3,
                'name' => 'Sales'
            ],
            [
                'id' => 4,
                'lang_code' => "en",
                'menu_id' => 4,
                'name' => 'Offers'
            ],
            [
                'id' => 5,
                'lang_code' => "en",
                'menu_id' => 5,
                'name' => 'Orders'
            ],
            [
                'id' => 6,
                'lang_code' => "en",
                'menu_id' => 6,
                'name' => 'Customers'
            ],
            [
                'id' => 7,
                'lang_code' => "en",
                'menu_id' => 7,
                'name' => 'Sales Report'
            ],
            [
                'id' => 8,
                'lang_code' => "en",
                'menu_id' => 8,
                'name' => 'Collect Reports'
            ],
            [
                'id' => 9,
                'lang_code' => "en",
                'menu_id' => 9,
                'name' => 'Purchases'
            ],
            [
                'id' => 10,
                'lang_code' => "en",
                'menu_id' => 10,
                'name' => 'Offers'
            ],
            [
                'id' => 11,
                'lang_code' => "en",
                'menu_id' => 11,
                'name' => 'Orders'
            ],
            [
                'id' => 12,
                'lang_code' => "en",
                'menu_id' => 12,
                'name' => 'Suppliers'
            ],
            [
                'id' => 13,
                'lang_code' => "en",
                'menu_id' => 13,
                'name' => 'Purchase Report'
            ],
            [
                'id' => 14,
                'lang_code' => "en",
                'menu_id' => 14,
                'name' => 'Payment Report'
            ],
            [
                'id' => 15,
                'lang_code' => "en",
                'menu_id' => 15,
                'name' => 'Finance'
            ],
            [
                'id' => 16,
                'lang_code' => "en",
                'menu_id' => 16,
                'name' => 'Expense'
            ],
            [
                'id' => 17,
                'lang_code' => "en",
                'menu_id' => 17,
                'name' => 'Accounts'
            ],
            [
                'id' => 18,
                'lang_code' => "en",
                'menu_id' => 18,
                'name' => 'Check Bond'
            ],
            [
                'id' => 19,
                'lang_code' => "en",
                'menu_id' => 19,
                'name' => 'Expenses Report'
            ],
            [
                'id' => 20,
                'lang_code' => "en",
                'menu_id' => 20,
                'name' => 'VAT Reports'
            ],
            [
                'id' => 21,
                'lang_code' => "en",
                'menu_id' => 21,
                'name' => 'Stocks'
            ],
            [
                'id' => 22,
                'lang_code' => "en",
                'menu_id' => 22,
                'name' => 'Services And Products'
            ],
            [
                'id' => 23,
                'lang_code' => "en",
                'menu_id' => 23,
                'name' => 'Stock Movements'
            ],
            [
                'id' => 24,
                'lang_code' => "en",
                'menu_id' => 24,
                'name' => 'Products in Stock'
            ],

        ]);
    }
}
