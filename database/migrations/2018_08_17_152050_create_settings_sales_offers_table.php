<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsSalesOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_sales_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->nullable();
            $table->integer('due_day')->nullable();
            $table->integer('logo_show')->nullable();
            $table->text('front_text')->nullable();
            $table->text('bottom_text')->nullable();
            $table->text('cover_page')->nullable();
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
        Schema::dropIfExists('settings_sales_offers');
    }
}
