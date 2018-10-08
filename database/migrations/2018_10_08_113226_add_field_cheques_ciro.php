<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldChequesCiro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cheques', function (Blueprint $table) {
            $table->string('seri_no')->nullable();
            $table->string('ciro_names')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cheques', function (Blueprint $table) {
            $table->dropColumn('seri_no');
            $table->dropColumn('ciro_names');
        });
    }
}
