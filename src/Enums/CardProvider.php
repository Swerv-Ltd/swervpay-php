<?php

namespace Swervpaydev\SDK\Enums;

/**
 * Enum CardProvider
 *
 * This enum represents the different card providers that are supported.
 * Currently, it includes Mastercard and Visa.
 *
 * @package Swervpaydev\SDK\Enums
 */
enum CardProvider: string
{
    /**
     * Represents a Mastercard card provider.
     */
    case Mastercard = 'MASTERCARD';

    /**
     * Represents a Visa card provider.
     */
    case Visa = 'VISA';
}
