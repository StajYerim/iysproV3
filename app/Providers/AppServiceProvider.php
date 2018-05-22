<?php

namespace App\Providers;

use App\Language;
use App\Menu;
use App\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Common problem with mysql email migration. Uncomment, if encountered "1071" issue.
         Schema::defaultStringLength(191);



         // Cache forever languages
        // TODO: cache it again
//        \View::composer('*', function ($view) {
//            $languages = \Cache::rememberForever('languages', function () {
//                return Language::all();
//            });
//
//            $view->with('languages', $languages);
//        });

        /**
         * Custom blade if directives
         */

        // @admin
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role_id == Role::ADMIN;
        });

        // @owner
        Blade::if('owner', function () {
            return auth()->check() && auth()->user()->role_id == Role::ACCOUNT_OWNER;
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Fonksiyonlarımın her sayfada çalışmasını sağlıyorum
        require __DIR__."/../Functions/Helpers.php";
    }
}
