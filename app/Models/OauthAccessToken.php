<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OauthAccessToken extends Model {

    /**
     * Generated
     */

    protected $table = 'oauth_access_tokens';
    protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];



}
