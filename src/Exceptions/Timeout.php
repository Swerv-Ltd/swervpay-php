<?php

namespace Swervpaydev\SDK\Exceptions;

use Exception;

/**
 * Class Timeout
 *
 * This class represents a custom exception that is thrown when an operation times out.
 * It extends the base Exception class provided by PHP.
 *
 * @package Swervpaydev\SDK\Exceptions
 */
class Timeout extends Exception
{
    /**
     * The output returned from the operation.
     *
     * @var array
     */
    public $output;

    /**
     * Create a new exception instance.
     *
     * The constructor method is overridden from the parent Exception class.
     * It sets a default message for the exception: 'The operation has timed out.'
     * It also accepts an array of output from the operation that caused the timeout.
     *
     * @param  array  $output The output from the operation that caused the timeout.
     * @return void
     */
    public function __construct(array $output)
    {
        parent::__construct('The operation has timed out.');

        $this->output = $output;
    }

    /**
     * Get the output returned from the operation.
     *
     * This method returns the output from the operation that caused the timeout.
     *
     * @return array The output from the operation that caused the timeout.
     */
    public function output()
    {
        return $this->output;
    }
}