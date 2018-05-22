<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->string('company_name');
            $table->string('company_short_name')->nullable();
            $table->string('char_code')->nullable();
            $table->string('tax_id')->nullable();
            $table->integer('customer')->default(0);
            $table->integer('supplier')->default(0);
            $table->string('tax_office')->nullable();
            $table->integer('e_invoice_registered')->default(0);
            $table->string('iban')->nullable();
            $table->foreign('account_id')
                ->references('id')->on('app_accounts')
                ->onDelete('cascade');
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
        Schema::dropIfExists('company_list');
    }
}
