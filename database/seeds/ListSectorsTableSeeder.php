<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ListSectorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_sectors')->delete();
        
        DB::table('list_sectors')->insert([
            [
                'id' => 1,
                'name' => 'Retail',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Wholesale',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Production',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}