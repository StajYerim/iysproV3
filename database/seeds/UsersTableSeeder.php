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
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin Admin',
                'email' => 'admin@iyspro.com',
                'password' => bcrypt('secret'),
                'lang_id' => 1,
                'permissions' => "[]",
                'role_id' => 1,
                'confirmed' => True,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],

            [
                'id' => 2,
                'name' => 'Account Owner',
                'email' => 'owner@iyspro.com',
                'password' => bcrypt('secret'),
                'lang_id' => 1,
                'permissions' => "[]",
                'role_id' => 2,
                'confirmed' => True,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],

            [
                'id' => 3,
                'name' => 'Regular User',
                'email' => 'user@iyspro.com',
                'password' => bcrypt('secret'),
                'lang_id' => 1,
                'role_id' => 3,
                'permissions' => "[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29]",
                'confirmed' => True,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}