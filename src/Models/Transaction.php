<?php

namespace Swervpaydev\SDK\Models;

/**
 * 
 * Represents a transaction response object.
 */
class Transaction extends Model
{
    /**
     * @var string $account_name The name of the account.
     */
    public $account_name;

    /**
     * @var string $account_number The account number.
     */
    public $account_number;

    /**
     * @var float $amount The amount in the wallet.
     */
    public $amount;

    /**
     * @var string $bank_code The bank code.
     */
    public $bank_code;

    /**
     * @var string $bank_name The name of the bank.
     */
    public $bank_name;

    /**
     * @var string $category The category of the wallet.
     */
    public $category;

    /**
     * @var float $charges The charges applied to the wallet.
     */
    public $charges;

    /**
     * @var string $created_at The creation date of the wallet.
     */
    public $created_at;

    /**
     * @var string $detail The details of the wallet.
     */
    public $detail;

    /**
     * @var float $fiat_rate The fiat rate of the wallet.
     */
    public $fiat_rate;

    /**
     * @var int $id The ID of the wallet.
     */
    public $id;

    /**
     * @var string $reference The reference of the wallet.
     */
    public $reference;

    /**
     * @var string $report The report of the wallet.
     */
    public $report;

    /**
     * @var string $report_message The report message of the wallet.
     */
    public $report_message;

    /**
     * @var string $session_id The session ID of the wallet.
     */
    public $session_id;

    /**
     * @var string $status The status of the wallet.
     */
    public $status;

    /**
     * @var string $type The type of the wallet.
     */
    public $type;

    /**
     * @var string $updated_at The last updated date of the wallet.
     */
    public $updated_at;
}
