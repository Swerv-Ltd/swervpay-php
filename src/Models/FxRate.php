<?php

namespace Swervpaydev\SDK\Models;

/**
 * Represents a fx rate response object.
 */
class FxRate extends Model
{

    /**
     * @var ExchangeCurrency $from The currency to exchange from.
     */
    public $from;

    /**
     * @var ExchangeCurrency $to The currency to exchange to.
     */
    public $to;

    /**
     * @var float $rate The rate of the currency exchange.
     */
    public $rate;
}



