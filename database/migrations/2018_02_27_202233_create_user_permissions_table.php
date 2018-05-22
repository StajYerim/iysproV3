<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('permission_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onCascade('DELETE');
            $table->foreign('permission_id')->references('id')->on('permissions')->onCascade('DELETE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_permissions', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'permission_id']);
        });
    }
}
