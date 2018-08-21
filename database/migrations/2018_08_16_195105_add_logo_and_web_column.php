<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLogoAndWebColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_accounts', function ($table) {
            $table->string('logo')->nullable();
            $table->string('web')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_accounts', function ($table) {
            $table->dropColumn('logo');
            $table->dropColumn('web');
        });
    }
}
