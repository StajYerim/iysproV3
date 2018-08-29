<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('modules')->default("[1,2,5,11,17,23,27]")->nullable();
            $table->unsignedInteger('sector_id');
            $table->unsignedInteger('owner_id');
            $table->dateTime('expiry_date');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('sector_id')->references('id')->on('list_sectors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_accounts', function (Blueprint $table) {
            $table->dropForeign(['owner_id', 'sector_id']);
        });
    }
}
