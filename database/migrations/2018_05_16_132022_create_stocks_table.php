<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->integer('company_id')->nullable();
            $table->integer('doc_id')->nullable()->comment("Satış Faturası,Alış Faturası vb..");
            $table->integer('status')->comment("0-Giriş 1-Çıkış");
            $table->integer('receipt_id')->nullable()->comment("Fiş Türleri -> Giriş İrsaliyesi > Çıkış İrsaliyesi");
            $table->string('description')->nullable();
            $table->date('date')->nullable();
            $table->foreign('account_id')
                ->references('id')->on('app_accounts')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_receipts');
    }
}
