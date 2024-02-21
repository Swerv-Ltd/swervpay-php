<?php

namespace Swervpaydev\SDK\Resources;


use Swervpaydev\SDK\Swervpay;
use Swervpaydev\SDK\Models\Transaction as TransactionModel;
use Swervpaydev\SDK\Models\FxRate;


class Fx
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
     * Perform a currency exchange.
     *
     * @param array $data The data for the currency exchange.
     * @return FxRate The transaction object representing the result of the currency exchange.
     * @throws \Exception
     */

    public function rate(array $data)
    {
        $res = $this->swervpay->post('fx/rate', $data);

        return new FxRate($res);
    }


    /**
     * Perform a currency exchange.
     *
     * @param array $data The data for the currency exchange.
     * @return TransactionModel The transaction object representing the result of the currency exchange.
     * @throws \Exception
     */
    public function exchange(array $data)
    {
        $res = $this->swervpay->post('fx/exchange', $data);

        return new TransactionModel($res);
    }
}
