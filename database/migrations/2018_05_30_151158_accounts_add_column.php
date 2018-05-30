<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccountsAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_accounts', function($table) {
            $table->string('parasut_client_id')->nullable();
            $table->string('parasut_client_secret')->nullable();
            $table->string('parasut_username')->nullable();
            $table->string('parasut_password')->nullable();
            $table->string('parasut_company_id')->nullable();
            $table->string('parasut_callback_url')->nullable();
            $table->string('n11_api_key')->nullable();
            $table->string('n11_api_password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_accounts', function($table) {

            $table->dropColumn('parasut_client_id');
            $table->dropColumn('parasut_client_secret');
            $table->dropColumn('parasut_username');
            $table->dropColumn('parasut_password');
            $table->dropColumn('parasut_company_id');
            $table->dropColumn('parasut_callback_url');
            $table->dropColumn('n11_api_key');
            $table->dropColumn('n11_api_password');
        });
    }
}
