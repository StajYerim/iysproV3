<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('type_id')->nullable(); // Commercial, Semi Material, Material
            $table->integer('vat_rate')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->boolean('archived')->nullable();
            $table->boolean('inventory_tracking')->nullable();
            $table->string('currency')->nullable();
            $table->string('buying_currency')->nullable();
            $table->decimal('buying_price', 10, 2)->nullable();
            $table->unsignedInteger('account_id')->nullable(); // Account product bellongs to
            $table->decimal('list_price', 10, 2); // product list price, discounted anf other currecny set ups avaliable
            $table->foreign('account_id')
                ->references('id')->on('app_accounts')
                ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
