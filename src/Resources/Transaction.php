<?php

namespace Swervpaydev\SDK\Resources;

use Swervpaydev\SDK\Models\Transaction as TransactionModel;
use Swervpaydev\SDK\Swervpay;


class Transaction
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
     * Get a transaction by its ID.
     *
     * @param string $id The ID of the transaction.
     * @return TransactionModel The transaction object.
     * @throws \Exception
     */
    public function get(string $id)
    {
        $res =  $this->swervpay->get("transactions/{$id}");

        return new TransactionModel($res);
    }


    /**
     * Retrieve multiple transactions.
     *
     * @param array $query Additional query parameters (optional).
     * @return TransactionModel The transaction model.
     * @throws \Exception
     */
    public function gets(array $query = []): TransactionModel
    {

        $uri = "transactions";

        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }


        $res = $this->swervpay->get($uri);

        return new TransactionModel($res);
    }
}
