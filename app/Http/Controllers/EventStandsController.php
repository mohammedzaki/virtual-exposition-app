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
class EventStandsController extends Controller {

    protected function validator(array $data) {
        $validator = Validator::make($data, [
                    'companyId' => "required|exists:company,id",
                    'userId' => "required|exists:users,id",
        ]);

        $validator->setAttributeNames([
        ]);

        return $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @Get("event-stand/{eventStandId}/reserve", as="reserveEventStand")
     */
    public function reserveStand(EventStand $eventStand, Request $request) {
        $all = $request->all();
        $validator = $this->validator($all);
        if ($validator->fails()) {
            throw new ValidationException($validator->errors());
        } else {
            $eventStand->status = 1;
            $eventStand->save();
            $userStandReservation = new UserStandReservation();
            $userStandReservation->eventStandId = $eventStand->id;
            $userStandReservation->companyId = $request->companyId;
            $userStandReservation->userId = $request->userId;
            $userStandReservation->save();
            return response()->jsonSuccess(ResponseClass::HTTP_OK, $eventStands);
        }
    }

}
