<?php

namespace App\Providers;

use App\Events\NewUserHasRegisteredEvent;
use App\Listeners\RegisterFullfillmentsWebhooks;
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

        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            'SocialiteProviders\\Shopify\\ShopifyExtendSocialite@handle',
        ],
        NewUserHasRegisteredEvent::class => [
            RegisterFullfillmentsWebhooks::class,
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
