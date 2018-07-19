<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrderInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string("seri")->nullable();
            $table->integer("sales_order_id")->unsigned();
            $table->string("number")->nullable();
            $table->datetime("date")->nullable();
            $table->datetime("due_date")->nullable();
            $table->string("clock")->nullable();
            $table->string("description")->nullable();
            $table->foreign("sales_order_id")->on("sales_orders")->references("id")->onDelete("cascade");
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
        Schema::dropIfExists('sales_order_invoices');
    }
}
