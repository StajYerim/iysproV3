<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->string('description')->nullable();
            $table->integer('company_id')->unsigned();
            $table->integer('contact_id')->nullable()->unsigned();
            $table->string('currency');
            $table->decimal('currency_value',12,4);
            $table->decimal('sub_total',12,2);
            $table->decimal('vat_total',12,2);
            $table->decimal('grand_total',12,2);
            $table->datetime("expired_date")->comment("Geçerlilik Tarihi");
            $table->datetime("effective_date")->comment("Durum Tarihi");
            $table->datetime("date")->comment("Teklif Tarihi");
            $table->integer("status")->default(0)->comment("Teklifin Durumu");
            $table->string("note")->nullable()->comment("Teklifin Durum notu");
            $table->foreign("account_id")->on("app_accounts")->references("id")->onDelete("cascade");
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
        Schema::dropIfExists('sales_offers');
    }
}
