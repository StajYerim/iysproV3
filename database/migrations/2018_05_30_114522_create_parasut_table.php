<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParasutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parasut', function (Blueprint $table) {
          $table->increments('id');
          $table->string('our_id', 16);
          $table->string('app_api', 255);
          $table->string('app_record_id', 16);
          $table->string('type', 16);

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
        Schema::dropIfExists('parasut');
    }
}
