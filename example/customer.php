<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Swervpaydev\SDK\Swervpay;


$swervpay = new Swervpay([
    'business_id' => '<BUSINESS_ID>',
    'secret_key' => '<SECRET_ID>',
]);

// Create a customer
$newCustomer = $swervpay->customer()->create([
    'first_name' => 'User',
    'last_name' => 'Ten',
    'email' => 'user10@mailinator.com',
    'country' => 'Nigeria',
    'middle_name' => 'Middle',
]);

print_r($newCustomer);

// Get a customer

$customers = $swervpay->customer()->gets([
    'limit' => 10,
    'page' => 1,
])->toArray();

print_r($customers);


// Get a customer

$customer = $swervpay->customer()->get('<CUSTOMER_ID>');

print_r($customer);
