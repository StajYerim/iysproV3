<?php


use App\Companies;
use App\Role;
use http\Env\Request;
use Spatie\TranslationLoader\LanguageLine;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Parasut\Client;

Auth::routes();

// overwriting /register to /signup url
Route::get('/signup', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/signup', 'Auth\RegisterController@register');
Route::get('/logout', 'Auth\LoginController@logout');

// Multi Languages
Route::get('lang/{lang}', 'LangController@index')->name("lang");


// Route for email confirmation
Route::post('/activation/resend', 'Auth\RegisterController@resendCode')->name('activation.resend');
Route::get('/activation/{code}', 'Auth\RegisterController@activateByCode')->name('activation');
Route::post('/activation/{code}', 'Auth\RegisterController@activateWithPassword')->name('activation.post');

// Allows authenticated users to visit
Route::middleware('auth')->group(function() {
    Route::get('/', 'Auth\LoginController@redirect');
    Route::resource('/{company}/users', 'AccountUsersController', ['only' => ['edit', 'update']]);
    Route::get('/{company}/users/invite/new', 'AccountUsersController@create')->name('users.create');
    Route::post('/{company}/users', 'AccountUsersController@store')->name('users.store');
});

// Allows only authenticated admin to visit this pages
Route::middleware('admin')->group(function() {

    //Profile Menu
    Route::get('/my-profile', 'HomeController@myProfile')->name('admin.myProfile');
    Route::get('/app/panel', 'AdminController@index')->name('admin.dashboard');

    //Company Menu
    Route::resource('/app/companies', 'AccountsController', ['except' => ['index', 'create']]);
    Route::get('/app/company-list', 'AccountsController@index')->name('companies.index');
    Route::get('/app/company/new', 'AccountsController@create')->name('companies.create');
    Route::get('/app/user-list', 'AccountUsersController@adminIndex')->name('admin.users.index');

    //Settings Menu
    Route::get('/app/settings/menu', 'Admin\Settings\MenuController@index')->name('admin.menu.index');
    Route::post('/app/settings/menu/order/post', 'Admin\Settings\MenuController@order_post')->name('admin.menu.order.post');
    Route::post("/app/settings/menu/store/update/{id}",'Admin\Settings\MenuController@store_update')->name("admin.menu.store.update");

    //Locale
    Route::get("/app/locale","Admin\LocaleController@index")->name("admin.locale.index");





});



// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}','middleware'=>'not.admin'],function() {


    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::get('company-profile', 'AccountsController@profile')->name('company.profile');
    Route::get('user-list', 'AccountUsersController@index')->name('users.index');

    //App all settings
    Route::get('settings', 'SettingsManager\SettingsManagerController@index')->name('settings.index');
    Route::get('settings/product', 'SettingsManager\ProductController@index')->name('settings.product');

    //City County Processing
    Route::get("/general/city/search","CityController@city")->name("city.search");
    Route::get("/general/county/search","CityController@county")->name("county.search");

    //Tags
    Route::post("/tags","TagController@give")->name("tags.give");

    //Döviz kurları
    Route::get("/exchange","ExchangeController@exchange")->name("exchange");

    //Share Offers/Orders
    Route::post("/offer-share/{id}","ShareController@offer_share")->name("share.offer");
    Route::post("/order-share/{id}","ShareController@order_share")->name("share.order");

});


Route::get("/add-lang/{name}/{eng}/{tr}",function($name,$eng,$tr){



  $add =   Spatie\TranslationLoader\LanguageLine::create([
        'group' => 'general',
        'key' => $name,
        'text' => ['en' => $eng, 'tr' => $tr],
    ]);

  if($add){
      return "add language";
  }

});

//General Scripts
Route::get("/general/script.js","GeneralController@script")->name("general.script");

Route::post("/get",'GeneralController@test')->name("general.test");

Route::get("/data-delete",function(){
   \App\Companies::delete();

   flash()->overlay("Delete all data","Success")->success();
    return redirect()->back();
})->name("data.delete");

Route::get("/tester",function(){
$orders = \App\Model\Sales\SalesOrders::find(21);



});


