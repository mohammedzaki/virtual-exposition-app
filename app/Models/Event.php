<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model {

    /**
     * Generated
     */

    protected $table = 'event';
    protected $fillable = ['id', 'name', 'location', 'lat', 'lon', 'img', 'startAt', 'endAt', 'description'];


    public function eventStands() {
        return $this->hasMany(\App\Models\EventStand::class, 'eventId', 'id');
    }

    public static function getAllOpened() {
        return static::where([
            ['startAt', '>', Carbon::now()]
        ])->get();
    }

}
