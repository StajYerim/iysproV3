<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Parasut;

class ParasutServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton(Parasut::class, function ($app) {
        return new Parasut(config('services.parasut'));
      });
    }
}
