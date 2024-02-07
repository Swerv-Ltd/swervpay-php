<?php

namespace Swervpaydev\SDK\Exceptions;

use Exception;

final class NotFound extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('The endpoint you are looking for could not be found.');
    }
}
