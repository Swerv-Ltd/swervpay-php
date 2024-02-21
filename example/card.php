<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Swervpaydev\SDK\Swervpay;
use Swervpaydev\SDK\Enums\CardProvider;
use Swervpaydev\SDK\Enums\Currency;
use Swervpaydev\SDK\Enums\CardType;


$swervpay = new Swervpay([
    'business_id' => 'bsn_fAYcWSUXz3TogChv7BgH',
    'secret_key' => 'sk_dev_MfTiTSC31IZrz7DOBEow',
    'base_uri' => 'http://localhost:8888/api/v1/'
]);


// Get all cards
$cards = $swervpay->card()->gets([
    'limit' => 10,
    'page' => 1,
])->toArray();

print_r($cards);


// Get a card
 $card = $swervpay->card()->get('<CARD_ID>');

 print_r($card);


// Create a card
$newCard = $swervpay->card()->create([
    'customer_id' => 'cus_5f3e5e3e5e3e5e3e5e3e5e3e',
    'amount' => 1000,
    'currency' => Currency::USD,
    'provider' => CardProvider::Mastercard,
    'type' => CardType::Default,
    // Optional only mandatory on when card type is lite
    'name_on_card' => 'User Ten',
]);
