<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('categories')->truncate();

        factory(App\Model\Stock\Product\Category::class,3000)->create()->make();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
