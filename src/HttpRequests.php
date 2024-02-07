<?php

namespace Swervpaydev\SDK;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Swervpaydev\SDK\Exceptions\Timeout;
use Swervpaydev\SDK\Exceptions\NotFound;
use Swervpaydev\SDK\Exceptions\FailedAction;

trait HttpRequests
{
    /**
     * Make a GET request to Novu servers and return the response.
     *
     * @param  string  $uri
     * @param  array  $query
     * @return mixed
     */
    public function get($uri, array $query = [])
    {
        return $this->request('GET', $uri, [], $query);
    }

    /**
     * Make a POST request to Novu servers and return the response.
     *
     * @param  string  $uri
     * @param  array  $payload
     * @return mixed
     */
    public function post($uri, array $payload = [])
    {
        return $this->request('POST', $uri, $payload);
    }

    /**
     * Make a PUT request to Novu servers and return the response.
     *
     * @param  string  $uri
     * @param  array  $payload
     * @return mixed
     */
    public function put($uri, array $payload = [])
    {
        return $this->request('PUT', $uri, $payload);
    }

    /**
     * Make a PATCH request to Novu servers and return the response.
     *
     * @param  string  $uri
     * @param  array  $payload
     * @return mixed
     */
    public function patch($uri, array $payload = [])
    {
        return $this->request('PATCH', $uri, $payload);
    }

    /**
     * Make a DELETE request to Novu servers and return the response.
     *
     * @param  string  $uri
     * @param  array  $payload
     * @return mixed
     */
    public function delete($uri, array $payload = [])
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * Make request to Novu servers and return the response.
     *
     * @param  string  $verb
     * @param  string  $uri
     * @param  array  $payload
     * @param  array  $query
     * @return mixed
     */
    protected function request($verb, $uri, array $payload = [], array $query = [])
    {
        if (isset($payload['json'])) {
            $payload = ['json' => $payload['json']];
        } else {
            $payload = empty($payload) ? [] : ['form_params' => $payload];
        }

        if (!empty($query)) {
            $payload = array_merge($payload, ['query' => $query]);
        }

        $response = $this->client->request($verb, $uri, $payload);

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
     * @throws \Swervpay\SDK\Exceptions\FailedAction
     * @throws \Swervpay\SDK\Exceptions\NotFound
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
     * @throws \Novu\SDK\Exceptions\Timeout
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
