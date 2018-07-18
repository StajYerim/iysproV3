<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lang_code'); // e.g. en, tr. ar
            $table->integer('menu_id');
            $table->string('name');
            $table->foreign("menu_id")->on("menus")->references("id")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_descriptions');
    }
}
