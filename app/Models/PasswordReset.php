<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends BaseModel {

    /**
     * Generated
     */

    protected $table = 'password_resets';
    protected $fillable = ['email', 'token'];



}
