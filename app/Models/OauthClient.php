<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OauthClient extends Model {

    /**
     * Generated
     */

    protected $table = 'oauth_clients';
    protected $fillable = ['id', 'user_id', 'name', 'secret', 'redirect', 'personal_access_client', 'password_client', 'revoked'];



}
