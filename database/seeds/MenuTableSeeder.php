<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->delete();

        DB::table('menus')->insert([
            [
                'id'=>1,
                'parent_id' => null,
                'group' => 'dasboard',
                'order' => 1,
                'permission' => 2,
                'icon' => 'dashboard',
                'route' => 'dashboard',
                'is_route' => 1
            ],
            [
                'id'=>2,
                'parent_id' => null,
                'group'=>'tasks',
                'order' => 2,
                'permission' => 2,
                'icon' => 'tasks',
                'route' => '',
                'is_route' => 0
            ],
                    [
                        'id'=>3,
                        'parent_id' => 2,
                        'group'=>'tasks',
                        'order' => 1,
                        'permission' => 2,
                        'icon' => 'tasks',
                        'route' => 'tasks.board.index',
                        'is_route' => 1
                    ],
                    [
                        'id'=>4,
                        'parent_id' => 2,
                        'group'=>'tasks',
                        'order' => 2,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'tasks.calendar.index',
                        'is_route' => 1
                    ],
            [
                'id'=>5,
                'parent_id' => null,
                'group'=>'sales',
                'order' => 3,
                'permission' => 2,
                'icon' => 'money',
                'route' => '',
                'is_route' => 0
            ],
                    [
                        'id'=>6,
                        'parent_id' => 5,
                        'group'=>'sales',
                        'order' => 1,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'sales.offers.index',
                        'is_route' => 1
                    ],
                    [
                        'id'=>7,
                        'parent_id' => 5,
                        'group'=>'sales',
                        'order' => 2,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'sales.orders.index',
                        'is_route' => 1
                    ],
                    [
                        'id'=>8,
                        'parent_id' => 5,
                        'group'=>'sales',
                        'order' => 3,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'sales.companies.customer',
                        'is_route' => 1
                    ],
                    [
                        'id'=>9,
                        'parent_id' => 5,
                        'group'=>'sales',
                        'order' => 4,
                        'permission' => 2,
                        'icon' => '',
                        'route' => '',
                        'is_route' => 0
                    ],
                    [
                        'id'=>10,
                        'parent_id' => 5,
                        'group'=>'sales',
                        'order' => 5,
                        'permission' => 2,
                        'icon' => '',
                        'route' => '',
                        'is_route' => 0
                    ],
            [
                'id'=>11,
                'parent_id' => null,
                'group'=>'purchases',
                'order' => 4,
                'permission' => 2,
                'icon' => 'shopping-cart',
                'route' => '',
                'is_route' => 0
            ],
                    [
                        'id'=>12,
                        'parent_id' => 11,
                        'group'=>'purchases',
                        'order' => 1,
                        'permission' => 2,
                        'icon' => '',
                        'route' => '',
                        'is_route' => 0
                    ],
                    [
                        'id'=>13,
                        'parent_id' => 11,
                        'group'=>'purchases',
                        'order' => 2,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'purchases.orders.index',
                        'is_route' => 1
                    ],
                    [
                        'id'=>14,
                        'parent_id' => 11,
                        'group'=>'purchases',
                        'order' => 3,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'purchases.companies.supplier',
                        'is_route' => 1
                    ],
                    [
                        'id'=>15,
                        'parent_id' => 11,
                        'group'=>'purchases',
                        'order' => 4,
                        'permission' => 2,
                        'icon' => '',
                        'route' => '',
                        'is_route' => 0
                    ],
                    [
                        'id'=>16,
                        'parent_id' => 11,
                        'group'=>'purchases',
                        'order' => 5,
                        'permission' => 2,
                        'icon' => '',
                        'route' => '',
                        'is_route' => 0
                    ],
            [
                'id'=>17,
                'parent_id' => null,
                'group'=>'finance',
                'order' => 5,
                'permission' => 2,
                'icon' => 'bar-chart-o',
                'route' => '',
                'is_route' => 0
            ],
                    [
                        'id'=>18,
                        'parent_id' => 17,
                        'group'=>'finance',
                        'order' => 1,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'finance.expenses.index',
                        'is_route' => 1
                    ],
                    [
                        'id'=>19,
                        'parent_id' => 17,
                        'group'=>'finance',
                        'order' => 2,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'finance.accounts.index',
                        'is_route' => 1
                    ],
                    [
                        'id'=>20,
                        'parent_id' => 17,
                        'group'=>'finance',
                        'order' => 3,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'finance.cheques.index',
                        'is_route' => 1
                    ],
                    [
                        'id'=>21,
                        'parent_id' => 17,
                        'group'=>'finance',
                        'order' => 4,
                        'permission' => 2,
                        'icon' => '',
                        'route' => '',
                        'is_route' => 0
                    ],
                    [
                        'id'=>22,
                        'parent_id' => 17,
                        'group'=>'finance',
                        'order' => 5,
                        'permission' => 2,
                        'icon' => '',
                        'route' => '',
                        'is_route' => 0
                    ],
            [
                'id'=>23,
                'parent_id' => null,
                'group'=>'stock',
                'order' => 6,
                'permission' => 2,
                'icon' => 'table',
                'route' => '',
                'is_route' => 0
            ],
                    [
                        'id'=>24,
                        'parent_id' => 23,
                        'group'=>'stock',
                        'order' => 1,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'stock.index',
                        'is_route' => 1
                    ],
                    [
                        'id'=>25,
                        'parent_id' => 23,
                        'group'=>'stock',
                        'order' => 2,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'stock.movements.index',
                        'is_route' => 1
                    ],
                    [
                        'id'=>26,
                        'parent_id' => 23,
                        'group'=>'stock',
                        'order' => 3,
                        'permission' => 2,
                        'icon' => '',
                        'route' => '',
                        'is_route' => 0
                    ],
            [
                'id'=>27,
                'parent_id' => null,
                'group'=>'e-commerce',
                'order' => 7,
                'permission' => 2,
                'icon' => 'shopping-cart',
                'route' => '',
                'is_route' => 0
            ],
                    [
                        'id'=>28,
                        'parent_id' => 27,
                        'group'=>'e-commerce',
                        'order' => 1,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'ecommerce.orders.index',
                        'is_route' => 1
                    ],
                    [
                        'id'=>29,
                        'parent_id' => 27,
                        'group'=>'e-commerce',
                        'order' => 2,
                        'permission' => 2,
                        'icon' => '',
                        'route' => 'ecommerce.products.index',
                        'is_route' => 1
                    ],



            //Admin Area Routes
            [
                'id'=>30,
                'parent_id' => null,
                'group'=>null,
                'order' => 1,
                'permission' => 1,
                'icon' => 'cogs',
                'route' => '',
                'is_route' => 0
            ],
                [
                    'id'=>31,
                    'parent_id' => 30,
                    'group'=>null,
                    'order' => 1,
                    'permission' => 1,
                    'icon' => 'list',
                    'route' => 'admin.menu.index',
                    'is_route' => 1
                ],
            [
                'id'=>32,
                'parent_id' => null,
                'group'=>null,
                'order' => 2,
                'permission' => 1,
                'icon' => 'building',
                'route' => '',
                'is_route' => 0
            ],
                    [
                        'id'=>33,
                        'parent_id' => 32,
                        'group'=>null,
                        'order' => 1,
                        'permission' => 1,
                        'icon' => 'building',
                        'route' => 'companies.index',
                        'is_route' => 1
                    ],
                    [
                        'id'=>34,
                        'parent_id' => 32,
                        'group'=>null,
                        'order' => 2,
                        'permission' => 1,
                        'icon' => 'users',
                        'route' => 'admin.users.index',
                        'is_route' => 1
                    ],
            [
                'id'=>35,
                'parent_id' => null,
                'group'=>null,
                'order' => 3,
                'permission' => 1,
                'icon' => 'language',
                'route' => 'admin.locale.index',
                'is_route' => 1
            ],


        ]);
    }
}
