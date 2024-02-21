<?php

namespace Swervpaydev\SDK\Resources;

use Swervpaydev\SDK\Swervpay;
use Swervpaydev\SDK\Models\Transaction;
use Swervpaydev\SDK\Models\CreatePayout;

class Payout
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
     * Create a new payout.
     *
     * @param array $data The data for creating the payout.
     * @return CreatePayout The create payout response object.
     * @throws \Exception
     */
    public function create(array $data): CreatePayout
    {
        $res = $this->swervpay->post('payouts', $data);

        return new CreatePayout($res);
    }


    /**
     * Retrieves a payout by its ID.
     *
     * @param string $id The ID of the payout to retrieve.
     * @return Transaction The retrieved payout as a Transaction object.
     * @throws \Exception
     */
    public function get(string $id): Transaction
    {
        $res = $this->swervpay->get("/payouts/{$id}");

        return new Transaction($res);
    }
}
