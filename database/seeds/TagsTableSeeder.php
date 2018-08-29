<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('tags')->truncate();
        DB::table('taggables')->truncate();

        factory(App\Tags::class,6000)->create()->make();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
