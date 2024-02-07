<?php

namespace Swervpaydev\SDK\Resources;

use Swervpaydev\SDK\Models\Transaction;
use Swervpaydev\SDK\Swervpay;


class Fx
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


    public function rate(array $data)
    {
        $res = $this->client->post('fx/rate')['data'];
    }


    /**
     * Perform a currency exchange.
     *
     * @param array $data The data for the currency exchange.
     * @return Transaction The transaction object representing the result of the currency exchange.
     */
    public function exchange(array $data)
    {
        $res = $this->client->post('fx/exchange', $data)['data'];

        return new Transaction($res);
    }
}
