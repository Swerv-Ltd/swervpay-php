<?php

namespace Swervpaydev\SDK\Resources;

use Swervpaydev\SDK\Models\Customer as ModelsCustomer;
use Swervpaydev\SDK\Swervpay;
use Swervpaydev\SDK\Models\SuccessMessage;

class Customer
{
    /**
     * The Swervpay client instance.
     *
     * @var \Swervpaydev\SDK\Swervpay
     */
    protected $client;


    public function __construct(Swervpay $swervpay)
    {
        $this->client = $swervpay->client;
    }


    /**
     * Creates a new customer.
     *
     * @param array $data The customer data.
     * @return SuccessMessage The success message.
     */
    public function create(array $data)
    {
        $res = $this->client->post('customers', $data)['data'];

        return new SuccessMessage($res);
    }

    /**
     * Updates an existing customer.
     *
     * @param string $id The customer ID.
     * @param array $data The updated customer data.
     * @return SuccessMessage The success message.
     */
    public function update(string $id, array $data)
    {
        $res = $this->client->post("customers/{$id}/update", $data)['data'];

        return new SuccessMessage($res);
    }

    /**
     * Performs KYC (Know Your Customer) verification for a customer.
     *
     * @param string $id The customer ID.
     * @param array $data The KYC data.
     * @return SuccessMessage The success message.
     */
    public function kyc(string $id, array $data)
    {
        $res = $this->client->post("customers/{$id}/kyc", $data)['data'];

        return new SuccessMessage($res);
    }

    /**
     * Retrieves a customer by ID.
     *
     * @param string $id The customer ID.
     * @return ModelsCustomer The customer model.
     */
    public function get(string $id)
    {
        $res =  $this->client->get("customers/{$id}")['data'];

        return new ModelsCustomer($res);
    }

    /**
     * Retrieves a list of customers.
     *
     * @param array $query The query parameters.
     * @return ModelsCustomer The customer model.
     */
    public function gets(array $query = [])
    {
        $uri = "customers";

        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }


        $res = $this->client->get($uri)['data'];

        return new ModelsCustomer($res);
    }
}
