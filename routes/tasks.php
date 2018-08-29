<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/tasks','middleware'=>'not.admin'],function() {

    //Board
    Route::get("/board","Modules\Tasks\BoardController@index")->name("tasks.board.index");

    //Calendar
    Route::get("/calendar","Modules\Tasks\CalendarController@index")->name("tasks.calendar.index");

});
