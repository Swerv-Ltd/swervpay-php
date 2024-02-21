<?php

namespace Swervpaydev\SDK\Exceptions;

use Exception;

/**
 * Class NotFound
 *
 * This class represents a custom exception that is thrown when an endpoint could not be found.
 * It extends the base Exception class provided by PHP.
 *
 * @package Swervpaydev\SDK\Exceptions
 */
final class NotFound extends Exception
{
    /**
     * Create a new exception instance.
     *
     * The constructor method is overridden from the parent Exception class.
     * It sets a default message for the exception: 'The endpoint you are looking for could not be found.'
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('The endpoint you are looking for could not be found.');
    }
}