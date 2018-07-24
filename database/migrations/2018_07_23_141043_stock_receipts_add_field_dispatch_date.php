<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StockReceiptsAddFieldDispatchDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_receipts', function ($table) {
            $table->datetime('dispatch_date')->default(\Carbon\Carbon::now())->nullable();
            $table->string('number')->nullable();
            $table->integer('sales_order_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_receipts', function ($table) {
            $table->dropColumn('dispatch_date');
            $table->dropColumn('number');
            $table->dropColumn('sales_order_id');
        });
    }
}
