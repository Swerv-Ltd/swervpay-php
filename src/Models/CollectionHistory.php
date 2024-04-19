<?php

namespace Swervpaydev\SDK\Models;

/**
 *
 * Represents a collection transaction history response object.
 */
class CollectionHistory extends Model
{

    /**
     * Represents the collection history of a transaction.
     */
    public $currency;

    /**
     * The amount of the transaction.
     */
    public $amount;


    /**
     * @var string $payment_method The payment method used for the transaction.
     */
    public $payment_method;

    /**
     * @var float $charges The charges applied to the transaction.
     */
    public $charges;

    /**
     * @var string $created_at The creation date of the transaction.
     */
    public $created_at;

    /**
     * @var int $id The ID of the transaction.
     */
    public $id;

    /**
     * @var string $reference The reference of the transaction.
     */
    public $reference;


    /**
     * @var string $updated_at The last updated date of the transaction.
     */
    public $updated_at;
}
