<?php

namespace App\Providers;

use App\Providers\ModelCreated;
use App\Notifications\ModelCreated as ModelCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ModelCreateListener
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
     * @param  ModelCreated  $event
     * @return void
     */
    public function handle(ModelCreated $event)
    {
        $event->model->notify(new ModelCreatedNotification);
    }
}
