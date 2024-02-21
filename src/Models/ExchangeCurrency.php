<?php

namespace Swervpaydev\SDK\Models;

/**
 * Represents a exchange currency response object.
 */

class ExchangeCurrency extends Model
{
    /**
    * @var string $currency The currency to exchange from.
    */
    public $currency;

    /**
    * @var float $amount
    */
    public $amount;
}