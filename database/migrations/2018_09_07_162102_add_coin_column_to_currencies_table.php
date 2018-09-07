<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoinColumnToCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->string('coin')->default("KRŞ")->nullable();
            $table->timestamps();
        });
        $currencies = \App\Currency::all();
        foreach($currencies as $cur){
            if($cur->code === "TRY"){
                \App\Currency::find($cur->id)->update(['coin' => 'KRŞ']);
            }
            if($cur->code === "USD"){
                \App\Currency::find($cur->id)->update(['coin' => 'CENT']);
            }
            if($cur->code === "EUR"){
                \App\Currency::find($cur->id)->update(['coin' => 'CENT']);
            }
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->dropColumn('coin');
        });
    }
}
