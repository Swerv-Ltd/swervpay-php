<?php

namespace Swervpaydev\SDK\Models;

/**
 * Represents create card response object.
 */

class CreateCard extends Model
{
    /**
     * @var string $reference The payout reference.
     */
    public $card_id;

    /**
     * @var string $message
     */
    public $message;
}