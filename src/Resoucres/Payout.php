<?php

namespace Swervpaydev\SDK\Resources;

use Swervpaydev\SDK\Swervpay;
use Swervpaydev\SDK\Models\SuccessMessage;
use Swervpaydev\SDK\Models\Transaction;

class Payout
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
     * Create a new payout.
     *
     * @param array $data The data for creating the payout.
     * @return SuccessMessage The success message object.
     */
    public function create(array $data)
    {
        $res = $this->client->post('payouts', $data)['data'];

        return new SuccessMessage($res);
    }


    /**
     * Retrieves a payout by its ID.
     *
     * @param string $id The ID of the payout to retrieve.
     * @return Transaction The retrieved payout as a Transaction object.
     */
    public function get(string $id)
    {
        $res = $this->client->get("/payouts/{$id}")['data'];

        return new Transaction($res);
    }
}
