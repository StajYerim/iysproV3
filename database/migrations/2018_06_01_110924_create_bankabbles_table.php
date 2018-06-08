<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankabblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankabbles', function (Blueprint $table) {
            $table->integer('bank_items_id')->nullable();
            $table->integer('bankabble_id');
            $table->integer('cheque_id')->nullable();
            $table->string('bankabble_type');
            $table->decimal('amount',12,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bankabbles');
    }
}
