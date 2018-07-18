<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('permissions')->nullable()->default("[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29]");
            $table->string('mobile')->nullable();
            $table->string('password')->nullable();
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->unsignedInteger('lang_id')->default(1);
            $table->unsignedInteger('role_id')->default(2);
            $table->unsignedInteger('account_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('lang_id')->references('lang_id')->on('app_languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users', function (Blueprint $table) {
            $table->dropForeign(['role_id', 'lang_id']);
        });
    }
}
