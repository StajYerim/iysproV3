<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAppAccountsVatVields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_accounts', function ($table) {
            $table->string('tax_id')->nullable();
            $table->string('tax_office')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('town')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //dropColumn
        Schema::table('app_accounts', function ($table) {
            $table->dropColumn('tax_id');
            $table->dropColumn('tax_office');
            $table->dropColumn('phone');
            $table->dropColumn('fax');
            $table->dropColumn('email');
            $table->dropColumn('city');
            $table->dropColumn('town');
            $table->dropColumn('address');
        });
    }
}
