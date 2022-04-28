<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\UserRegistrationEvents::class => [
            \App\Listeners\UserSendRegistrationMailListeners::class,
        ],
        \App\Events\PodcastInvitationProcessed::class => [
            \App\Listeners\SendPodcastInvitationMail::class,
        ],
        \App\Events\UserChangePasswordEvents::class => [
            \App\Listeners\UserSendChangePasswordMailListeners::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
