<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseClass;
use App\Models\Event;

/**
 * @Controller(prefix="/api/v1/event")
 * 
 * @Middleware({"cros", "bindings"})
 */
class EventsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @Get("get-events", as="getAllOpenedEvents")
     */
    public function getAllOpenedEvents(Request $request) {
        $events = Event::getAllOpened();
        return response()->jsonSuccess(ResponseClass::HTTP_OK, $events);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @Get("get-event-stands\{event}", as="getAllOpenedEvents")
     */
    public function getEventStands(Event $event) {
        $eventStands = $event->eventStands;
        return response()->jsonSuccess(ResponseClass::HTTP_OK, $eventStands);
    }
    
}
