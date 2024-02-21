<?php

namespace Swervpaydev\SDK\Models;

/**
 * Class AccessTokenDetail
 *
 * This class represents the access token detail response.
 */
class AccessTokenDetail extends Model
{

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
}
