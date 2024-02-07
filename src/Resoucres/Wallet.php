<?php

namespace Swervpaydev\SDK\Resources;

use Swervpaydev\SDK\Models\Wallet as ModelsWallet;
use Swervpaydev\SDK\Swervpay;

class Wallet
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
     * Get a wallet by its ID.
     *
     * @param string $id The ID of the wallet.
     * @return ModelsWallet The wallet object.
     */
    public function get(string $id)
    {
        $res = $this->client->get("wallets/{$id}")['data'];

        return new ModelsWallet($res);
    }


    /**
     * Retrieve multiple wallets.
     *
     * @param array $query Additional query parameters (optional).
     * @return ModelsWallet The retrieved wallets.
     */
    public function gets(array $query = [])
    {

        $uri = "wallets";

        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }

        $res = $this->client->get($uri)['data'];

        return new ModelsWallet($res);
    }
}
