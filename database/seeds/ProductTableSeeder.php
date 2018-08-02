<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table("products")->truncate();
        DB::table("product_images")->truncate();
        DB::table("product_descriptions")->truncate();

        factory(App\Model\Stock\Product\Product::class, 3000)
            ->create()
            ->each(function ($product) {
                $product->description()->save(factory(App\Model\Stock\Product\ProductDescriptions::class)->make());
            });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
