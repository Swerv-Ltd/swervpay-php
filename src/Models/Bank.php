<?php

namespace Swervpaydev\SDK\Models;

use Swervpaydev\SDK\Models\Model;


/**
 * 
 * Represents a bank object.
 */
class Bank extends Model
{
    /**
     * The bank name.
     *
     * @var string
     */
    public $bank_name;

    /**
     * The bank code.
     *
     * @var string
     */
    public $bank_code;
}
