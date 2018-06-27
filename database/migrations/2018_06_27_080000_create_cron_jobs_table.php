<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iys_cron_jobs', function (Blueprint $table) {
            $table->increments('id');
          
            $table->text('command');
            $table->integer('interval');
            $table->dateTime('nextRuntime');
            $table->integer('user_id');
          
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
        Schema::dropIfExists('iys_cron_jobs');
    }
}
