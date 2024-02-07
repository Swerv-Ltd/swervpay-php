<?php

namespace Swervpaydev\SDK\Models;

use Swervpaydev\SDK\Models\Model;

/**
 * Represents a customer object.
 */
class Customer extends Model
{
    /**
     * @var int $business_id The ID of the business associated with the customer.
     */
    public $business_id;

    /**
     * @var string $country The country of the customer.
     */
    public $country;

    /**
     * @var string $created_at The date and time when the customer was created.
     */
    public $created_at;

    /**
     * @var string $email The email address of the customer.
     */
    public $email;

    /**
     * @var string $first_name The first name of the customer.
     */
    public $first_name;

    /**
     * @var int $id The ID of the customer.
     */
    public $id;

    /**
     * @var bool $is_blacklisted Indicates whether the customer is blacklisted or not.
     */
    public $is_blacklisted;

    /**
     * @var string $last_name The last name of the customer.
     */
    public $last_name;

    /**
     * @var string $middle_name The middle name of the customer.
     */
    public $middle_name;

    /**
     * @var string $phone_number The phone number of the customer.
     */
    public $phone_number;

    /**
     * @var string $status The status of the customer.
     */
    public $status;

    /**
     * @var string $updated_at The date and time when the customer was last updated.
     */
    public $updated_at;
}
