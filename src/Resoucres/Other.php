<?php

namespace Swervpaydev\SDK\Resources;

use Swervpaydev\SDK\Models\Bank;
use Swervpaydev\SDK\Models\ResolveAccount;
use Swervpaydev\SDK\Swervpay;


class Other
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
     * Retrieve a list of banks.
     *
     * @return Bank
     */
    public function banks()
    {
        $res = $this->client->get('banks')['data'];

        return new Bank($res);
    }


    /**
     * Resolves an account number.
     *
     * @param array $data The data containing the account number to be resolved.
     * @return ResolveAccount The resolved account information.
     */
    public function resolve_account_number(array $data)
    {
        $res = $this->client->post('resolve-account-number', $data)['data'];

        return new ResolveAccount($res);
    }
}
