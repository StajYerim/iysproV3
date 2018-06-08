<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("bank_account_id")->unsigned()->comment("Hareketin gerçekleştiği ana hesap");
            $table->integer("company_id")->nullable()->unsigned()->comment("İşlem yapan müşteri veya tedarikçi");
            $table->integer("cheque_id")->nullable()->unsigned()->comment("Çek tahsilatı id");
            $table->string('type')->comment("start_balance->Açılış Bakiyesi");
            $table->integer('doc_id')->comment("İşlem yapan 3.ortamın ID'si")->nullable();
            $table->date('date')->comment("İşlem Tarihi");
            $table->decimal("amount",12,2)->comment("Meblağ");
            $table->string("description")->nullable()->comment("İşlem Açıklaması");
            $table->integer("action_type")->comment("Hareket Tipi / 1-Para Girişi / 0-Para Çıkışı");
            $table->foreign("bank_account_id")->references("id")->on("bank_accounts")->onDelete("cascade");
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
        Schema::dropIfExists('bank_items');
    }
}
