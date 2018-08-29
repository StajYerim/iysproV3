<?php

use Illuminate\Database\Seeder;

class SalesOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('sales_orders')->truncate();
        DB::table('sales_order_items')->truncate();
        DB::table('sales_order_invoices')->truncate();

        factory(App\Model\Sales\SalesOrders::class, 6000)
            ->create()
            ->each(function ($sales) {
                $sales->items()->save(factory(App\Model\Sales\SalesOrderItems::class)->make());
                $sales->invoice()->save(factory(App\Model\Sales\SalesOrderInvoice::class)->make());
            });


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
