<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use HasApiTokens,
        Notifiable;

    /**
     * Generated
     */
    protected $table = 'users';
    protected $fillable = ['id', 'name', 'email', 'username', 'password', 'remember_token'];

    /**
     * The attributes that should be hidden for arrays.
     * 
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function roles() {
        return $this->belongsToMany(\App\Models\Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function roleUsers() {
        return $this->hasMany(\App\Models\RoleUser::class, 'user_id', 'id');
    }

}
