<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->unsigned();
            $table->integer('address_abroad')->nullable()->default('0')->comment('0-NO 1-YES');
            $table->string('address')->nullable();
            $table->string('town')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable(); // blank as default
            $table->string('address_type')->nullable(); // company registered address or delivery/branch address
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('fax_number')->nullable();
            $table->foreign('company_id')
                ->references('id')->on('company_list')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_addresses');
    }
}
