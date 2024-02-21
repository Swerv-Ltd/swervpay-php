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
    protected $swervpay;


    public function __construct(Swervpay $swervpay)
    {
        $this->swervpay = $swervpay;
    }

    /**
     * Retrieve a list of banks.
     *
     * @return Bank
     * @throws \Exception
     */
    public function banks(): Bank
    {
        $res = $this->swervpay->get('banks');

        return new Bank($res);
    }


    /**
     * Resolves an account number.
     *
     * @param array $data The data containing the account number to be resolved.
     * @return ResolveAccount The resolved account information.
     * @throws \Exception
     */
    public function resolve_account_number(array $data): ResolveAccount
    {
        $res = $this->swervpay->post('resolve-account-number', $data);

        return new ResolveAccount($res);
    }
}
