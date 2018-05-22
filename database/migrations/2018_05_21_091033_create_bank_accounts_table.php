<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('account_id')->unsigned();
            $table->integer('status')->default("1")->comment("0-Pasif 1-Aktif");
            $table->integer('type')->default("1")->comment("Kasa Hesabı 2-Banka Hesabı 3-Kredili Hesap" );
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_no')->nullable();
            $table->string('bank_iban')->nullable();
            $table->string('currency')->default("TRY,EUR,USD");
            $table->integer('cheque')->nullable()->default(0)->comment("Çek Kullanımı 0-Pasif 1-Aktif");
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
        Schema::dropIfExists('bank_accounts');
    }
}
