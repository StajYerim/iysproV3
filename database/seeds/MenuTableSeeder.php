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
                'id' => 1,
                'parent_id' => null,
                'order' => 0,
                'permission' => 2,
                'route' => '/'
            ],
            [
                'id' => 2,
                'parent_id' => null,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 3,
                'parent_id' => null,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 4,
                'parent_id' => 3,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 5,
                'parent_id' => 3,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 6,
                'parent_id' => 3,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 7,
                'parent_id' => 3,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 8,
                'parent_id' => 3,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 9,
                'parent_id' => null,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 10,
                'parent_id' => 9,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 11,
                'parent_id' => 9,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 12,
                'parent_id' => 9,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 13,
                'parent_id' => 9,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 14,
                'parent_id' => 9,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 15,
                'parent_id' => null,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 16,
                'parent_id' => 15,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 17,
                'parent_id' => 15,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 18,
                'parent_id' => 15,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 19,
                'parent_id' => 15,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 20,
                'parent_id' => 15,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 21,
                'parent_id' => null,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 22,
                'parent_id' => 21,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 23,
                'parent_id' => 21,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],
            [
                'id' => 24,
                'parent_id' => 21,
                'order' => 0,
                'permission' => 2,
                'route' => ''
            ],

        ]);
    }
}