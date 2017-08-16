<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OauthRefreshToken extends Model {

    /**
     * Generated
     */

    protected $table = 'oauth_refresh_tokens';
    protected $fillable = ['id', 'access_token_id', 'revoked', 'expires_at'];



}
