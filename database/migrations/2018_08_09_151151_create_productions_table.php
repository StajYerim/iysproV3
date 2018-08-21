<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("sales_order_id")->unsigned();
            $table->integer("account_id")->unsigned();
            $table->integer("status")->default(0)->comment("0->Pending 1->Planning 2->Complete");
            $table->integer("day")->default(0)->comment("ex:plaining 10 days");
            $table->string("priority")->comment("colors");
            $table->date("start_date")->default(Carbon\Carbon::now())->comment("ex:plaining 10 days");
            $table->foreign("sales_order_id")->on("sales_orders")->references("id")->onDelete("cascade");
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
        Schema::dropIfExists('productions');
    }
}
