<?php

namespace Swervpaydev\SDK\Exceptions;

use Exception;

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
     * @param  array  $output
     * @return void
     */
    public function __construct(array $output)
    {
        parent::__construct('The operation has timed out.');

        $this->output = $output;
    }

    /**
     * The output returned from the operation.
     *
     * @return array
     */
    public function output()
    {
        return $this->output;
    }
}
