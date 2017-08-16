<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseClass;
use App\Models\Event;

/**
 * @Controller(prefix="/api/v1/events")
 * 
 * @Middleware({"cros", "bindings"})
 */
class EventsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @Get("/", as="getAllOpenedEvents")
     */
    public function getAllOpenedEvents(Request $request) {
        $events = Event::getAllOpened();
        return response()->jsonSuccess(ResponseClass::HTTP_OK, $events);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @Get("{event}/stands", as="getEventStands")
     */
    public function getEventStands(Event $event) {
        $eventStands = $event->eventStands;
        return response()->jsonSuccess(ResponseClass::HTTP_OK, $eventStands);
    }
    
}
