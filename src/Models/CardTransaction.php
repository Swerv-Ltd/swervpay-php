<?php

namespace Swervpaydev\SDK\Models;

/**
 *
 * Represents a card transaction response object.
 */
class CardTransaction extends Model
{

    /**
     * @var string $merchant_mcc The Merchant Category Code (MCC) of the transaction.
     */
    public $merchant_mcc;

    /**
     * @var string $merchant_name The name of the merchant involved in the transaction.
     */
    public $merchant_name;

    /**
     * @var string $merchant_mid The Merchant ID (MID) of the transaction.
     */
    public $merchant_mid;

    /**
     * @var string $merchant_state The state where the merchant is located.
     */
    public $merchant_state;

    /**
     * @var string $merchant_country The country where the merchant is located.
     */
    public $merchant_country;

    /**
     * @var string $merchant_city The city where the merchant is located.
     */
    public $merchant_city;

    /**
     * @var string $merchant_postal_code The postal code of the merchant's location.
     */
    public $merchant_postal_code;

    public $amount;


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
