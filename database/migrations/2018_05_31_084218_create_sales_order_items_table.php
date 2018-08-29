<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("sales_order_id")->unsigned();
            $table->integer("product_id");
            $table->decimal("quantity",12,2);
            $table->integer("unit_id")->comment("Birim ID");
            $table->decimal("price",12,4)->comment("Satış Fiyatı");
            $table->integer("vat")->comment("KDV");
            $table->decimal("total",12,2)->comment("Toplam Tutar");
            $table->string("note")->nullable()->comment("Satır notu");
            $table->datetime("termin_date")->nullable()->comment("Termin Tarihi");
            $table->string("termin_show")->default(false)->nullable()->comment("Termin Statu");
            $table->decimal("discount",12,2)->nullable()->comment("Satır İndirimi");
            $table->string("discount_type")->nullable()->comment("Satır İndirim türü Para/Yüzdelik(money/percent)");
            $table->foreign("sales_order_id")->on("sales_orders")->references("id")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_order_items');
    }
}
