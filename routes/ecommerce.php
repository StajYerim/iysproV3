<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\CronJob;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/ecommerce','middleware'=>'not.admin'],function() {
  
    Route::get("products","Modules\Ecommerce\ProductsController@index")->name("ecommerce.products.index");
    Route::get("products/index_list","Modules\Ecommerce\ProductsController@index_list")->name("ecommerce.products.index_list");
    Route::post("products","Modules\Ecommerce\ProductsController@addProduct")->name("ecommerce.products.add_product");

    // N11 Categories
    Route::get("categories/{category?}","Modules\Ecommerce\ProductsController@categories")->name("ecommerce.products.categories");

    //Orders
    Route::get("orders","Modules\Ecommerce\OrdersController@index")->name("ecommerce.orders.index");
    Route::get("orders/show/{order_id}","Modules\Ecommerce\OrdersController@show")->name("ecommerce.orders.show");
    Route::get("orders/index_list/{status?}","Modules\Ecommerce\OrdersController@index_list")->name("ecommerce.orders.index_list");
  
    /* Jobs
    Route::get("jobs", function() {
      return response()->json(CronJob::create([
        'command' => 'n11:orders',
        'interval' => 1,
        'nextRuntime' => Carbon\Carbon::now('America/New_York')->addMinutes(1),
        'user_id' => 2
      ]));
    });
    */
});
