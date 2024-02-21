<?php

namespace Swervpaydev\SDK\Enums;

/**
 * Enum CardType
 *
 * This enum represents the different types of cards that are supported.
 * Currently, it includes Lite, Default, and Cooperate.
 *
 * @package Swervpaydev\SDK\Enums
 */
enum CardType: string
{
    /**
     * Represents a Lite card type.
     */
    case Lite = 'LITE';

    /**
     * Represents a Default card type.
     */
    case Default = 'DEFAULT';

    /**
     * Represents a Cooperate card type.
     */
    case Cooperate = 'COORPERATE';
}