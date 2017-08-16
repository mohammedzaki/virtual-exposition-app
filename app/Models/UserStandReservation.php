<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStandReservation extends Model {

    /**
     * Generated
     */

    protected $table = 'userStandReservation';
    protected $fillable = ['id', 'eventStandId', 'companyId', 'userId'];


    public function company() {
        return $this->belongsTo(\App\Models\Company::class, 'companyId', 'id');
    }

    public function eventStand() {
        return $this->belongsTo(\App\Models\EventStand::class, 'eventStandId', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'userId', 'id');
    }


}
