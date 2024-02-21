<?php

namespace Swervpaydev\SDK\Enums;

/**
 * Enum Currency
 *
 * This enum represents the different types of currencies that are supported.
 * Currently, it includes Nigerian Naira (NGN) and United States Dollar (USD).
 *
 * @package Swervpaydev\SDK\Enums
 */
enum Currency: string
{
    /**
     * Represents Nigerian Naira (NGN).
     */
    case NGN = 'NGN';

    /**
     * Represents United States Dollar (USD).
     */
    case USD = 'USD';
}