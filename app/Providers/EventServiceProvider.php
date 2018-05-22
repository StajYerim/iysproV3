<?php

namespace App\Providers;

use App\Events\AccountRegistration;
use App\Events\UserIsInvited;
use App\Listeners\EmailConfirmationCode;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // on account registration, we will send confirmation code alone
        AccountRegistration::class => [
            EmailConfirmationCode::class,
        ],

        // whenever user is invited we will send confirmation code with password
        UserIsInvited::class => [
            EmailConfirmationCode::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
