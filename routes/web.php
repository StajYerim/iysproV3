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
    Route::resource('/users', 'AccountUsersController', ['only' => ['edit', 'update']]);
    Route::get('/users/invite/new', 'AccountUsersController@create')->name('users.create');
    Route::post('/users', 'AccountUsersController@store')->name('users.store');

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

    Route::post("/app/company-list/{id}/modules/update","AccountsController@modules_update")->name("admin.companies.modules.update");

    //Settings Menu
    Route::get('/app/settings/menu', 'Admin\Settings\MenuController@index')->name('admin.menu.index');
    Route::post('/app/settings/menu/order/post', 'Admin\Settings\MenuController@order_post')->name('admin.menu.order.post');
    Route::post("/app/settings/menu/store/update/{id}",'Admin\Settings\MenuController@store_update')->name("admin.menu.store.update");

    //Locale
    Route::get("/app/locale","Admin\LocaleController@index")->name("admin.locale.index");
    Route::get("/app/locale/form/{id}","Admin\LocaleController@post_modal_form")->name("admin.locale.modal");
    Route::post("/app/locale/form/{id}/store","Admin\LocaleController@post_modal_form_store")->name("admin.locale.store");
    Route::delete("/app/locale/form/{id}","Admin\LocaleController@destroy")->name("admin.locale.destroy");


});



// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}','middleware'=>'not.admin'],function() {


    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/company-profile', 'AccountsController@profile')->name('company.profile');

    Route::post("user/{id}/permission/update","AccountUsersController@permission_update")->name("settings.users.permission.update");

    Route::get('/users/invite/new', 'AccountUsersController@invite_create')->name('settings.users.create');
    Route::get('user-list', 'AccountUsersController@users_index')->name('settings.users.index');
    Route::get('/users/{id}/edit', 'AccountUsersController@user_edit')->name('settings.users.edit');
    Route::any('/users/{id}/update', 'AccountUsersController@user_update')->name('settings.users.update');
    Route::post('/users/invite/store', 'AccountUsersController@invite_store')->name('settings.users.store');

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


Route::get("/tester",function(){
    Request::url();
$kategori = \App\Model\Stock\Product\Category::All();

foreach($kategori as $kat){
    echo $kat->name."->".$kat->total_order."<br>";
}




});

//General Scripts
Route::get("/general/script.js","GeneralController@script")->name("general.script");



