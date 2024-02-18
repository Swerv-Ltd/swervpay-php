<?php

namespace Swervpaydev\SDK;


use GuzzleHttp\Client as HttpClient;
use Swervpaydev\SDK\Models\AccessTokenModel;
use Swervpaydev\SDK\Resources\Card;
use Swervpaydev\SDK\Resources\Customer;
use Swervpaydev\SDK\Resources\Fx;
use Swervpaydev\SDK\Resources\Other;
use Swervpaydev\SDK\Resources\Wallet;
use Swervpaydev\SDK\Resources\Transaction;
use Swervpaydev\SDK\Resources\Payout;
use Swervpaydev\SDK\Resources\Webhook;



class Swervpay
{

    use HttpRequests;

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
     * The Webhook instance.
     *
     * @var \Swervpaydev\SDK\Resources\Webhook
     */
    private Webhook $webhook;


    /**
     * The Guzzle HTTP Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    public $client;


    /**
     * The base URI for the Swervpay API.
     *
     * @var string
     */
    protected $baseUri;



    /**
     * The secret key for the Swervpay API.
     *
     * @var string
     */
    protected $secretKey;


    /**
     * The business ID for the Swervpay API.
     *
     * @var string
     */
    protected $businessId;


    /**
     * The access token for the Swervpay API.
     *
     * @var AccessTokenModel
     */
    protected $accessToken;


    /**
     * Create a new Swervpay instance.
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

        $this->setAccessToken();

        $this->setConfig($config);

        $this->fx = new Fx($this);
        $this->card = new Card($this);
        $this->customer = new Customer($this);
        $this->wallet = new Wallet($this);
        $this->transaction = new Transaction($this);
        $this->payout = new Payout($this);
        $this->other = new Other($this);
        $this->webhook = new Webhook($this);
    }





    /**
     * Sets the configuration for the Swervpay API client.
     *
     * @param array $config The configuration array containing the base URI, secret key, and business ID.
     * @return $this The current instance of the Swervpay.
     */
    public function setConfig($config)
    {
        $this->baseUri = $config['base_uri'] ?? 'https://api.swervpay.co/api/v1/';
        $this->secretKey = $config['secret_key'];
        $this->businessId = $config['business_id'];


        $this->client = new HttpClient([
            'base_uri' => $this->baseUri,
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->accessToken->access_token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'User-Agent' => 'Swervpay/PHPSdk',
            ],
        ]);

        return $this;
    }


    public function setAccessToken()
    {
        $res = $this->post('auth', [], [
            'Authorization' => 'Basic ' . base64_encode($this->businessId . ':' . $this->secretKey),
        ])['data'];

        $this->accessToken = new AccessTokenModel($res);

        return $this;
    }


    /**
     * Get the Fx instance.
     *
     * @return \Swervpaydev\SDK\Resources\Fx
     */

    public function fx()
    {
        return $this->fx;
    }


    /**
     * Get the Card instance.
     *
     * @return \Swervpaydev\SDK\Resources\Card
     */

    public function card()
    {
        return $this->card;
    }


    /**
     * Get the Customer instance.
     *
     * @return \Swervpaydev\SDK\Resources\Customer
     */

    public function customer()
    {
        return $this->customer;
    }


    /**
     * Get the Wallet instance.
     *
     * @return \Swervpaydev\SDK\Resources\Wallet
     */

    public function wallet()
    {
        return $this->wallet;
    }


    /**
     * Get the Transaction instance.
     *
     * @return \Swervpaydev\SDK\Resources\Transaction
     */

    public function transaction()
    {
        return $this->transaction;
    }


    /**
     * Get the Payout instance.
     *
     * @return \Swervpaydev\SDK\Resources\Payout
     */

    public function payout()
    {
        return $this->payout;
    }


    /**
     * Get the Other instance.
     *
     * @return \Swervpaydev\SDK\Resources\Other
     */

    public function other()
    {
        return $this->other;
    }


    /**
     * Get the Webhook instance.
     *
     * @return \Swervpaydev\SDK\Resources\Webhook
     */

    public function webhook()
    {
        return $this->webhook;
    }
}
