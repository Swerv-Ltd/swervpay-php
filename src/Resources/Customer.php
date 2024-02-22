<?php

namespace Swervpaydev\SDK\Resources;

use Swervpaydev\SDK\Models\Customer as CustomerModel;
use Swervpaydev\SDK\Swervpay;
use Swervpaydev\SDK\Models\SuccessMessage;

class Customer
{
    /**
     * The Swervpay client instance.
     *
     * @var \Swervpaydev\SDK\Swervpay
     */
    protected $swervpay;


    public function __construct(Swervpay $swervpay)
    {
        $this->swervpay = $swervpay;
    }


    /**
     * Creates a new customer.
     *
     * @param array $data The customer data.
     * @return CustomerModel The success message.
     * @throws \Exception
     */
    public function create(array $data): CustomerModel
    {
        $res = $this->swervpay->post('customers', $data);

        return new CustomerModel($res);
    }

    /**
     * Updates an existing customer.
     *
     * @param string $id The customer ID.
     * @param array $data The updated customer data.
     * @return SuccessMessage The success message.
     * @throws \Exception
     */
    public function update(string $id, array $data): SuccessMessage
    {
        $res = $this->swervpay->post("customers/{$id}/update", $data);

        return new SuccessMessage($res);
    }

    /**
     * Performs KYC (Know Your Customer) verification for a customer.
     *
     * @param string $id The customer ID.
     * @param array $data The KYC data.
     * @return SuccessMessage The success message.
     * @throws \Exception
     */
    public function kyc(string $id, array $data): SuccessMessage
    {
        $res = $this->swervpay->post("customers/{$id}/kyc", $data);

        return new SuccessMessage($res);
    }

    /**
     * Blacklist a customer.
     *
     * @param string $id The customer ID.
     * @return SuccessMessage The success message.
     * @throws \Exception
     */
    public function blacklist(string $id): SuccessMessage
    {
        $res = $this->swervpay->post("customers/{$id}/blacklist", []);

        return new SuccessMessage($res);
    }

    /**
     * Retrieves a customer by ID.
     *
     * @param string $id The customer ID.
     * @return CustomerModel The customer model.
     * @throws \Exception
     */
    public function get(string $id) : CustomerModel
    {
        $res =  $this->swervpay->get("customers/{$id}");

        return new CustomerModel($res);
    }

    /**
     * Retrieves a list of customers.
     *
     * @param array $query The query parameters.
     * @return CustomerModel The customer model.
     * @throws \Exception
     */
    public function gets(array $query = [])
    {
        $uri = "customers";

        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }

        $res = $this->swervpay->get($uri);

        return new CustomerModel($res);
    }
}
