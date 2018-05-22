<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_languages', function (Blueprint $table) {
            $table->increments('lang_id');
            $table->string('lang_code');
            $table->string('name');
            $table->string('status', 1)->default('A'); // A-Active D-Disabled H-Hidden
            $table->string('country_code')->nullable();
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
        Schema::dropIfExists('app_languages');
    }
}
