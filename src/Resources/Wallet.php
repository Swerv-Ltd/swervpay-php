<?php

namespace Swervpaydev\SDK\Resources;

use Swervpaydev\SDK\Models\Wallet as WalletModel;
use Swervpaydev\SDK\Swervpay;

class Wallet
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
     * Get a wallet by its ID.
     *
     * @param string $id The ID of the wallet.
     * @return WalletModel The wallet object.
     * @throws \Exception
     */
    public function get(string $id): WalletModel
    {
        $res = $this->swervpay->get("wallets/{$id}");

        return new WalletModel($res);
    }


    /**
     * Retrieve multiple wallets.
     *
     * @param array $query Additional query parameters (optional).
     * @return WalletModel The retrieved wallets.
     * @throws \Exception
     */
    public function gets(array $query = []): WalletModel
    {

        $uri = "wallets";

        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }

        $res = $this->swervpay->get($uri);

        return new WalletModel($res);
    }
}
