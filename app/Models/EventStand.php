<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventStand extends Model {

    /**
     * Generated
     */

    protected $table = 'eventStand';
    protected $fillable = ['id', 'eventId', 'status', 'price', 'sqMeters', 'description', 'logoPos'];


    public function event() {
        return $this->belongsTo(\App\Models\Event::class, 'eventId', 'id');
    }

    public function userStandReservations() {
        return $this->hasMany(\App\Models\UserStandReservation::class, 'eventStandId', 'id');
    }


}
