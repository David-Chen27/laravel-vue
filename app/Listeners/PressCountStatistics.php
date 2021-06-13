<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PressCountStatistics
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
     * @param \App\Events\Statistics $event
     * @return void
     */
    public function handle(\App\Events\Statistics $event)
    {
        if (in_array('count', $event->column)){
            $event->model->count += 1;
            $event->model->save();
        }
    }
}
