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
use Swervpaydev\SDK\Resources\Webhook;
use Swervpaydev\SDK\Models\AccessToken as AccessTokenModel;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Swervpaydev\SDK\Exceptions\Timeout;
use Swervpaydev\SDK\Exceptions\NotFound;
use Swervpaydev\SDK\Exceptions\FailedAction;



/**
 * Class Swervpay
 * 
 * This class represents the Swervpay API client.
 * It provides methods for interacting with the Swervpay API.
 */
class Swervpay
{

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

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'User-Agent' => 'Swervpay/PHP-Sdk',
        ];

        if ($this->accessToken != null && $this->accessToken->access_token != null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken->access_token;
        } else {
            $base64 = base64_encode($this->businessId . ':' . $this->secretKey);

            $headers['Authorization'] = 'Basic ' . $base64;
        }

        $this->client = new HttpClient([
            'base_uri' => $this->baseUri,
            'http_errors' => false,
            'headers' => $headers,
        ]);

        return $this;
    }


    /**
     * Get the access token.
     *
     * @return AccessTokenModel The access token.
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Set the access token.
     *
     * @return $this The current instance of Swervpay.
     */
    public function setAccessToken()
    {

        $res = $this->post('auth', [], []);

        $this->accessToken = new AccessTokenModel($res);

        return $this;
    }


    /**
     * Get the Fx instance.
     *
     * @return \Swervpaydev\SDK\Resources\Fx
     */

    public function fx(): Fx
    {
        return new Fx($this);
    }


    /**
     * Get the Card instance.
     *
     * @return \Swervpaydev\SDK\Resources\Card
     */

    public function card(): Card
    {
        return new Card($this);
    }


    /**
     * Get the Customer instance.
     *
     * @return \Swervpaydev\SDK\Resources\Customer
     */

    public function customer(): Customer
    {
        return new Customer($this);
    }


    /**
     * Get the Wallet instance.
     *
     * @return \Swervpaydev\SDK\Resources\Wallet
     */

    public function wallet(): Wallet
    {
        return new Wallet($this);
    }


    /**
     * Get the Transaction instance.
     *
     * @return \Swervpaydev\SDK\Resources\Transaction
     */

    public function transaction(): Transaction
    {
        return new Transaction($this);
    }


    /**
     * Get the Payout instance.
     *
     * @return \Swervpaydev\SDK\Resources\Payout
     */

    public function payout(): Payout
    {
        return new Payout($this);
    }


    /**
     * Get the Other instance.
     *
     * @return \Swervpaydev\SDK\Resources\Other
     */

    public function other(): Other
    {
        return new Other($this);
    }


    /**
     * Get the Webhook instance.
     *
     * @return \Swervpaydev\SDK\Resources\Webhook
     */

    public function webhook(): Webhook
    {
        return new Webhook($this);
    }


    /**
     * Make a GET request to Swervpay servers and return the response.
     *
     * @param  string  $uri
     * @param  array  $query
     * @param  array   $headers
     * @return mixed
     */
    public function get($uri, array $query = [], array $headers = [])
    {
        return $this->request('GET', $uri, [], $query, $headers);
    }

    /**
     * Make a POST request to Swervpay servers and return the response.
     *
     * @param  string  $uri
     * @param  array  $payload
     * @param  array   $headers
     * @return mixed
     */
    public function post($uri, array $payload = [], array $headers = [])
    {
        return $this->request('POST', $uri, $payload, [], $headers);
    }

    /**
     * Make a PUT request to Swervpay servers and return the response.
     *
     * @param  string  $uri
     * @param  array  $payload
     * @param  array   $headers
     * @return mixed
     */
    public function put($uri, array $payload = [], array $headers = [])
    {
        return $this->request('PUT', $uri, $payload, [], $headers);
    }

    /**
     * Make a PATCH request to Swervpay servers and return the response.
     *
     * @param  string  $uri
     * @param  array  $payload
     * @param  array   $headers
     * @return mixed
     */
    public function patch($uri, array $payload = [], array $headers = [])
    {
        return $this->request('PATCH', $uri, $payload, [], $headers);
    }

    /**
     * Make a DELETE request to Swervpay servers and return the response.
     *
     * @param  string  $uri
     * @param  array  $payload
     * @param  array   $headers
     * @return mixed
     */
    public function delete($uri, array $payload = [])
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * Make request to Swervpay servers and return the response.
     *
     * @param  string  $verb
     * @param  string  $uri
     * @param  array   $headers
     * @param  array   $payload
     * @param  array   $query
     * @return mixed
     */
    protected function request($verb, $uri,  array $payload = [], array $query = [], array $headers = [])
    {
        if (isset($payload['json'])) {
            $payload = ['json' => $payload['json']];
        } else {
            $payload = empty($payload) ? [] : ['form_params' => $payload];
        }

        if (!empty($query)) {
            $payload = array_merge($payload, ['query' => $query]);
        }

        $response = $this->client->request($verb, $uri, $headers, $payload);

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            return $this->handleRequestError($response);
        }

        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    /**
     * Handle the request error.
     *
     * @param  \Psr\Http\Message\ResponseInterface  $response
     * @return void
     *
     * @throws \Exception
     * @throws \Swervpaydev\SDK\Exceptions\FailedAction
     * @throws \Swervpaydev\SDK\Exceptions\NotFound
     */
    protected function handleRequestError(ResponseInterface $response)
    {

        if ($response->getStatusCode() == 404) {
            throw new NotFound();
        }

        if ($response->getStatusCode() == 400) {
            throw new FailedAction((string) $response->getBody());
        }

        throw new Exception((string) $response->getBody());
    }

    /**
     * Retry the callback or fail after x seconds.
     *
     * @param  int  $timeout
     * @param  callable  $callback
     * @param  int  $sleep
     * @return mixed
     *
     * @throws \Swervpaydev\SDK\Exceptions\Timeout
     */
    public function retry($timeout, $callback, $sleep = 5)
    {
        $start = time();

        beginning:

        if ($output = $callback()) {
            return $output;
        }

        if (time() - $start < $timeout) {
            sleep($sleep);

            goto beginning;
        }

        if ($output === null || $output === false) {
            $output = [];
        }

        if (!is_array($output)) {
            $output = [$output];
        }

        throw new Timeout($output);
    }
}
