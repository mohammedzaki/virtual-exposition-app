<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseClass;
use App\Models\EventStand;
use App\Models\UserStandReservation;

/**
 * @Controller(prefix="/api/v1/event")
 * 
 * @Middleware({"cros", "bindings"})
 */
class StandsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @Get("reserve-stand\{eventStand}", as="getAllOpenedEvents")
     */
    public function reserveStand(EventStand $eventStand, Request $request) {
        $eventStand->status = 1;
        $userStandReservation = new UserStandReservation();
        $userStandReservation->eventStandId = $request->eventStandId;
        $userStandReservation->companyId = $request->companyId;
        $userStandReservation->userId = $request->userId;
        $userStandReservation->save();
        return response()->jsonSuccess(ResponseClass::HTTP_OK, $eventStands);
    }
    
}
