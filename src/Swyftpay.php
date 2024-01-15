<?php

namespace Swervpaydev\SDK;


use GuzzleHttp\Client as HttpClient;
use Swervpaydev\SDK\Resources\Card;
use Swervpaydev\SDK\Resources\Customer;
use Swervpaydev\SDK\Resources\Fx;
use Swervpaydev\SDK\Resources\Other;
use Swervpaydev\SDK\Resources\Wallet;
use Swervpaydev\SDK\Resources\Transaction;
use Swervpaydev\SDK\Resources\Payout;



class Swyftpay
{

    /**
     * The Fx instance.
     *
     * @var \Swervpaydev\SDK\Resources\Fx
     */
    private Fx  $fx;

    /**
     * The Card instance.
     *
     * @var \Swervpaydev\SDK\Resources\Card
     */
    private Card $card;

    /**
     * The Customer instance.
     *
     * @var \Swervpaydev\SDK\Resources\Customer
     */
    private Customer $customer;

    /**
     * The Wallet instance.
     *
     * @var \Swervpaydev\SDK\Resources\Wallet
     */
    private Wallet $wallet;

    /**
     * The Transaction instance.
     *
     * @var \Swervpaydev\SDK\Resources\Transaction
     */
    private Transaction $transaction;

    /**
     * The Payout instance.
     *
     * @var \Swervpaydev\SDK\Resources\Payout
     */
    private Payout $payout;


    /**
     * The Other instance.
     *
     * @var \Swervpaydev\SDK\Resources\Other
     */
    private Other $other;


    /**
     * The Guzzle HTTP Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    public $client;


    /**
     * The base URI for the Swyftpay API.
     *
     * @var string
     */
    protected $baseUri;



    /**
     * The secret key for the Swyftpay API.
     *
     * @var string
     */
    protected $secretKey;


    /**
     * The business ID for the Swyftpay API.
     *
     * @var string
     */
    protected $businessId;


    /**
     * Create a new Swyftpay instance.
     *
     * @param  array  $config
     * @return void
     */
    public function __construct($config = [])
    {

        if (is_array($config) && !empty($config)) {
            $this->setConfig($config);
        } else {
            throw new \Exception('Please provide a valid config array');
        }

        $this->fx = new Fx($this);
        $this->card = new Card($this);
        $this->customer = new Customer($this);
        $this->wallet = new Wallet($this);
        $this->transaction = new Transaction($this);
        $this->payout = new Payout($this);
        $this->other = new Other($this);
    }





    /**
     * Sets the configuration for the Swyftpay API client.
     *
     * @param array $config The configuration array containing the base URI, secret key, and business ID.
     * @return $this The current instance of the Swyftpay.
     */
    public function setConfig($config)
    {
        $this->baseUri = $config['base_uri'] ?? 'https://api.swyftpay.com/api/v1/';
        $this->secretKey = $config['secret_key'];
        $this->businessId = $config['business_id'];


        $this->client = new HttpClient([
            'base_uri' => $this->baseUri,
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->secretKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        return $this;
    }
}
