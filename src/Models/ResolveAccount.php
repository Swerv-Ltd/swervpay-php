<?php


namespace Swervpaydev\SDK\Models;

use Swervpaydev\SDK\Models\Model;

/**
 * 
 * Represents a resolve account object.
 */
class ResolveAccount extends Model
{
    /**
     * The account number.
     *
     * @var string
     */
    public $account_number;

    /**
     * The account name.
     *
     * @var string
     */
    public $account_name;

    /**
     * The bank code.
     *
     * @var string
     */
    public $bank_code;

    /**
     * The bank name.
     *
     * @var string
     */
    public $bank_name;
}
