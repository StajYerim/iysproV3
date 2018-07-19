<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaybillItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waybill_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("waybill_id")->unsigned();
            $table->integer('order_item_id')->unsigned();
            $table->foreign("waybill_id")->on("order_waybills")->references("id")->onDelete("cascade");
            $table->foreign("order_item_id")->on("sales_order_items")->references("id")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waybill_items');
    }
}
