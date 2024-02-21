<?php

namespace Swervpaydev\SDK\Models;

/**
 * Class AccessToken
 * 
 * Represents an access token response object.
 */
class AccessToken extends Model
{


    /**
     * @var string The access token.
     */
    public $access_token;

    /**
     * @var AccessTokenDetail The token related detail.
     */
    public $token;
}


