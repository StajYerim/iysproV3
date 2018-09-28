<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldSalesOffersDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_offers', function (Blueprint $table) {
            $table->decimal('discount_value',12,2)->default(0);
            $table->integer('discount_type')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_offers', function (Blueprint $table) {
            $table->dropColumn('discount_value');
            $table->dropColumn('discount_type');
        });
    }
}
