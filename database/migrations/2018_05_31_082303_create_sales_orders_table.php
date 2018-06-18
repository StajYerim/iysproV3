<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("account_id")->unsigned();
            $table->string('description')->nullable();
            $table->integer("company_id")->unsigned();
            $table->string("currency");
            $table->string("currency_value")->nullable();
            $table->decimal('sub_total',12,2);
            $table->decimal('vat_total',12,2);
            $table->decimal('grand_total',12,2);
            $table->decimal('discount_value',12,2)->nullable();
            $table->integer('discount_type')->nullable();
            $table->date('date');
            $table->date('due_date')->nullable();
            $table->foreign("account_id")->on("app_accounts")->references("id")->onDelete("cascade");
            $table->foreign("company_id")->on("company_list")->references("id")->onDelete("cascade");
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
        Schema::dropIfExists('sales_orders');
    }
}
