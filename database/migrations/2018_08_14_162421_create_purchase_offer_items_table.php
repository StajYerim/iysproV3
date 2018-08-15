<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOfferItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_offer_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("purchase_offer_id")->unsigned();
            $table->integer("product_id");
            $table->decimal("quantity",12,2);
            $table->integer("unit_id")->comment("Birim ID");
            $table->decimal("price",12,4)->comment("Satış Fiyatı");
            $table->integer("vat")->comment("KDV");
            $table->decimal("total",12,2)->comment("Toplam Tutar");
            $table->string("note")->nullable()->comment("Satır notu");
            $table->decimal("discount")->nullable()->comment("Satır İndirimi");
            $table->string("discount_type")->nullable()->comment("Satır İndirim türü Para/Yüzdelik(money/percent)");
            $table->foreign("purchase_offer_id")->on("purchase_offers")->references("id")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_offer_items');
    }
}
