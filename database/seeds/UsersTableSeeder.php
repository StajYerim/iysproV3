<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('user_permissions')->truncate();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin Admin',
                'email' => 'ofis@aseyazilim.com.tr',
                'password' => bcrypt('secret'),
                'lang_id' => 1,
                'permissions' => "[]",
                'role_id' => 1,
                'account_id' => 1,
                'confirmed' => True,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],

            [
                'id' => 2,
                'name' => 'Account Owner',
                'email' => 'owner@aseyazilim.com.tr',
                'password' => bcrypt('secret'),
                'lang_id' => 1,
                'permissions' => "[]",
                'role_id' => 2,
                'account_id' => 2,
                'confirmed' => True,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],

            [
                'id' => 3,
                'name' => 'Regular User',
                'email' => 'user@aseyazilim.com.tr',
                'password' => bcrypt('secret'),
                'lang_id' => 1,
                'role_id' => 3,
                'account_id' => 3,
                'permissions' => "[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29]",
                'confirmed' => True,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

//        factory(App\User::class, 400)->create()->make();
//
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}