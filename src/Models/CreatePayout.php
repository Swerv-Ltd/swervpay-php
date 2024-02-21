<?php

namespace Swervpaydev\SDK\Models;

/**
 * Represents create payout response object.
 */

class CreatePayout extends Model
{
    /**
     * @var string $reference The payout reference.
     */
    public $reference;

    /**
     * @var string $message
     */
    public $message;
}