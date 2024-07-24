<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ProjectEndDateReached;

class HideProjectListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(/*object $event*/ ProjectEndDateReached $event): void
    {
        $event->project->is_hidden = true;
        $event->project->save();
    }
}
