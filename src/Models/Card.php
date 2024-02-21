<?php

namespace Swervpaydev\SDK\Models;


/** 
 * Represents a card response object.
 */
class Card extends Model
{
    /**
     * @var string $address_city The city of the cardholder's address.
     */
    public $address_city;

    /**
     * @var string $address_country The country of the cardholder's address.
     */
    public $address_country;

    /**
     * @var string $address_postal_code The postal code of the cardholder's address.
     */
    public $address_postal_code;

    /**
     * @var string $address_state The state of the cardholder's address.
     */
    public $address_state;

    /**
     * @var string $address_street The street address of the cardholder.
     */
    public $address_street;

    /**
     * @var float $balance The balance of the card.
     */
    public $balance;

    /**
     * @var string $card_number The card number.
     */
    public $card_number;

    /**
     * @var string $created_at The date and time when the card was created.
     */
    public $created_at;

    /**
     * @var string $currency The currency of the card.
     */
    public $currency;

    /**
     * @var string $cvv The CVV code of the card.
     */
    public $cvv;

    /**
     * @var string $expiry The expiry date of the card.
     */
    public $expiry;

    /**
     * @var bool $freeze Indicates if the card is frozen or not.
     */
    public $freeze;

    /**
     * @var int $id The ID of the card.
     */
    public $id;

    /**
     * @var string $issuer The issuer of the card.
     */
    public $issuer;

    /**
     * @var string $masked_pan The masked PAN (Primary Account Number) of the card.
     */
    public $masked_pan;

    /**
     * @var string $name_on_card The name on the card.
     */
    public $name_on_card;

    /**
     * @var string $status The status of the card.
     */
    public $status;

    /**
     * @var float $total_funded The total amount funded on the card.
     */
    public $total_funded;

    /**
     * @var string $type The type of the card.
     */
    public $type;

    /**
     * @var string $updatet_at The date and time when the card was last updated.
     */
    public $updatet_at;
}
