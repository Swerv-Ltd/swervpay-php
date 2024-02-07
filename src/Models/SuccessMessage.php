<?php

namespace Swervpaydev\SDK\Models;

use Swervpaydev\SDK\Models\Model;

/**
 * 
 * Represents a success response object.
 */
class SuccessMessage extends Model
{

    /**
     * The message returned from the operation.
     *
     * @var string
     */
    public $message;
}
