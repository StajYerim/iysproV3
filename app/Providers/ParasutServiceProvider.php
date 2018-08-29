<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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


    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton(Parasut::class, function ($app) {
          // get the current user
          $currentUser = auth()->user();
          $account = $currentUser->memberOfAccount;

          $parasut = [
              'client_id' => $account["parasut_client_id"],
              'client_secret' => $account["parasut_client_secret"],
              'username' => $account["parasut_username"],
              'password' => $account["parasut_password"],
              'company_id' => $account["parasut_company_id"],
              'grant_type' => 'password',
              'redirect_uri' => $account["parasut_callback_url"],
          ];

        return new Parasut($parasut);
      });
    }
}
