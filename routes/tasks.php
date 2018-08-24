<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/tasks','middleware'=>'not.admin'],function() {

    //Board
    Route::get("/board","Modules\Tasks\BoardController@index")->name("tasks.board.index");
    Route::post("/board/{id}/store","Modules\Tasks\BoardController@store")->name("tasks.board.store");
    Route::post("/board/status","Modules\Tasks\BoardController@status")->name("tasks.board.status");

    //Calendar
    Route::get("/calendar","Modules\Tasks\CalendarController@index")->name("tasks.calendar.index");

});
