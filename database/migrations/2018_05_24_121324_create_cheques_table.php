<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("account_id")->unsigned();
            $table->integer("company_id")->nullable();
            $table->integer("transfer_company_id")->nullable()->comment("Alınan çek, hangi müşteriye verildi.");
            $table->datetime("transfer_date")->nullable()->comment("Alınan çekin müşteriye verildiği tarih.");
            $table->integer("type")->comment("0-Çek 1-Senet");
            $table->string("description")->nullable();
            $table->string("document_no")->nullable();
            $table->string("bank_name")->nullable();
            $table->string("bank_branch")->nullable();
            $table->datetime("date")->comment("Çekin İşlem Tarihi");
            $table->datetime("payment_date")->comment("Çekin Ödeme tarihi (Vade)");
            $table->decimal("amount",12,2);
            $table->integer("status")->comment("0->Tahsil Edilmemiş 1->Tahsil Edildi.");
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
        Schema::dropIfExists('cheques');
    }
}
