<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model {

    /**
     * Generated
     */

    protected $table = 'role_user';
    protected $fillable = ['user_id', 'role_id'];


    public function role() {
        return $this->belongsTo(\App\Models\Role::class, 'role_id', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }


}
