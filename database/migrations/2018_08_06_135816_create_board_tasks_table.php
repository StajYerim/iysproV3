<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->tinyInteger('category_color');
            $table->tinyInteger('priority');
            $table->dateTime('task_time');
            $table->string('duration');
            $table->longText('description');
            $table->tinyInteger('task_status')->default('1');
            $table->integer('task_added_by');
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
        Schema::dropIfExists('board_tasks');
    }
}
