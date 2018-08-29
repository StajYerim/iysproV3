<?php

use Illuminate\Database\Seeder;

class PurchaseOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('purchase_orders')->truncate();
        DB::table('sales_order_items')->truncate();

        factory(App\Model\Purchases\PurchaseOrders::class, 6000)
            ->create()
            ->each(function ($purchase) {
                $purchase->items()->save(factory(App\Model\Purchases\PurchaseOrderItems::class)->make());
            });


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
