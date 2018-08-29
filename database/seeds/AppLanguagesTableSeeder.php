<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AppLanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_languages')->delete();

        DB::table('app_languages')->insert([
            [
                'lang_id' => 1,
                'lang_code' => 'en',
                'name' => 'English',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],

            [
                'lang_id' => 2,
                'lang_code' => 'tr',
                'name' => 'Turkish',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],

            [
                'lang_id' => 3,
                'lang_code' => 'sa',
                'name' => 'Arabic',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}