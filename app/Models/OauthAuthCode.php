<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OauthAuthCode extends Model {

    /**
     * Generated
     */

    protected $table = 'oauth_auth_codes';
    protected $fillable = ['id', 'user_id', 'client_id', 'scopes', 'revoked', 'expires_at'];



}
