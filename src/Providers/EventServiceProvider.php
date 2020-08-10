<?php

namespace Laravel\DatabaseAutodoc\Providers;

use Illuminate\Console\Events\CommandFinished;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Laravel\DatabaseAutodoc\Listeners\CommandFinishListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CommandFinished::class => [
           CommandFinishListener::class
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
    }
}
