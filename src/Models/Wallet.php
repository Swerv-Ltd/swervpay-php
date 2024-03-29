<?php

namespace Swervpaydev\SDK\Models;

/**
 * Represents a wallet response object.
 */
class Wallet extends Model
{
    /**
     * @var string The account name associated with the wallet.
     */
    public $account_name;

    /**
     * @var string The account number associated with the wallet.
     */
    public $account_number;

    /**
     * @var string The account type associated with the wallet.
     */
    public $account_type;

    /**
     * @var float The balance of the wallet.
     */
    public $balance;

    /**
     * @var string The bank address associated with the wallet.
     */
    public $bank_address;

    /**
     * @var string The bank code associated with the wallet.
     */
    public $bank_code;

    /**
     * @var string The bank name associated with the wallet.
     */
    public $bank_name;

    /**
     * @var string The date and time the wallet was created.
     */
    public $created_at;

    /**
     * @var int The customer ID associated with the wallet.
     */
    public $customer_id;

    /**
     * @var int The ID of the wallet.
     */
    public $id;

    /**
     * @var float The pending balance of the wallet.
     */
    public $pending_balance;

    /**
     * @var string The routing number associated with the wallet.
     */
    public $routing_number;

    /**
     * @var float The total amount received by the wallet.
     */
    public $total_received;

    /**
     * @var string The date and time the wallet was last updated.
     */
    public $updated_at;
}
