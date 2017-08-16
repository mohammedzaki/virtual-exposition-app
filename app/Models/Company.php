<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    /**
     * Generated
     */

    protected $table = 'company';
    protected $fillable = ['id', 'name', 'phone', 'logoImg', 'marketingDocs', 'adminName', 'adminEmail', 'userId', 'deleted_at'];


    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'userId', 'id');
    }

    public function userStandReservations() {
        return $this->hasMany(\App\Models\UserStandReservation::class, 'companyId', 'id');
    }


}
