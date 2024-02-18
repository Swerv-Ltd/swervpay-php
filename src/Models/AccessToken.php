<?php

namespace Swervpaydev\SDK\Models;

/**
 * Class AccessToken
 * 
 * Represents an access token.
 */
class AccessTokenModel extends Model
{


    /**
     * @var string The access token.
     */
    public $access_token;

    /**
     * @var AccessTokenDetailModel The token related detail.
     */
    public $token;
}


/**
 * Class AccessTokenDetailModel
 * 
 * This class represents the access token detail model.
 */
class AccessTokenDetailModel extends Model
{

    /**
     * @var int The ID of the associated business.
     */
    public $business_id;

    /**
     * @var string The type of the access token.
     */
    public $type;

    /**
     * @var string The expiration date and time of the access token.
     */
    public $expires_at;

    /**
     * @var string The date and time when the access token was issued.
     */
    public $issued_at;

    /**
     * @var string The date and time when the access token was created.
     */
    public $created_at;

    /**
     * @var string The date and time when the access token was last updated.
     */
    public $updated_at;
}
