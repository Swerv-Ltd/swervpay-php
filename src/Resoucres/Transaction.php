<?php

namespace Swervpaydev\SDK\Resources;

use Swervpaydev\SDK\Models\Transaction as ModelsTransaction;
use Swervpaydev\SDK\Swervpay;


class Transaction
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
     * Get a transaction by its ID.
     *
     * @param string $id The ID of the transaction.
     * @return ModelsTransaction The transaction object.
     */
    public function get(string $id)
    {
        $res =  $this->client->get("transactions/{$id}")['data'];

        return new ModelsTransaction($res);
    }


    /**
     * Retrieve multiple transactions.
     *
     * @param array $query Additional query parameters (optional).
     * @return ModelsTransaction The transaction model.
     */
    public function gets(array $query = [])
    {

        $uri = "transactions";

        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }


        $res = $this->client->get($uri)['data'];

        return new ModelsTransaction($res);
    }
}
