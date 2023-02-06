<?php

namespace App\Listeners;

use App\Events\NewEnrollEvent;
use Illuminate\Support\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreNewEnrollListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewEnrollEvent  $event
     * @return void
     */
    public function handle(NewEnrollEvent $event)
    {
        return $event;
    }
}
