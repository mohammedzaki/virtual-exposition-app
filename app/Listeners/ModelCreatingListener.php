<?php

namespace App\Listeners;

use App\Events\ModelCreating;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ModelCreatingListener {

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ModelCreating  $event
     * @return void
     */
    public function handle(ModelCreating $event) {
        $event->model->id = $event->model->newId();
    }

}
