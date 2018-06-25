<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcommerceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecommerce_products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('account_id')->comment("Hesap ID");
            $table->string('ecommerce_id', 30)->comment("E-Ticaret Üzerindeki ID'si");
            $table->string('iyspro_id', 30)->comment("İyspro Üzerindeki ID'si");
            $table->string('ecommerce_type', 16)->comment("N11 - HB -> N11 yada HepsiBurada ürünü mü ?");
            $table->string('category', 50)->comment("N11 Kategorisi");
            $table->string('store_code', 50)->comment("N11 Mağaza Kodu");
            $table->text('description')->comment("Ürün Açıklaması");
            $table->decimal('price', 10, 2)->comment("Satış Fiyatı");
            $table->unsignedInteger('stock');

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
        Schema::dropIfExists('ecommerce_products');
    }
}
