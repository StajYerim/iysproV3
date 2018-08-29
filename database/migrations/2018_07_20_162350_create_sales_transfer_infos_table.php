<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTransferInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_transfer_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("sales_order_id")->unsigned();
            $table->string("transfer_company");
            $table->string("transfer_number")->nullable();
            $table->string("customer_email")->nullable();
            $table->string("not")->nullable();
            $table->foreign("sales_order_id")->on("sales_orders")->references("id")->onCascade("DELETE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_transfer_infos');
    }
}
