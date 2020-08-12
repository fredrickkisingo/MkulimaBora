<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Samerior\MobileMoney\Mpesa\Events\C2bConfirmationEvent;
use Samerior\MobileMoney\Mpesa\Events\StkPushPaymentFailedEvent;
use Samerior\MobileMoney\Mpesa\Events\StkPushPaymentSuccessEvent;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        C2bConfirmationEvent::class => [
            PaymentConfirmed::class,//your listening class
        ],
        StkPushPaymentFailedEvent::class => [
            StkPaymentFailed::class, //your listening classs
        ],
        StkPushPaymentSuccessEvent::class => [
            StkPaymentReceived::class,// your listening class
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
