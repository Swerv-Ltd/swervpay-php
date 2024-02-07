<?php

namespace Swervpaydev\SDK\Resources;


use Swervpaydev\SDK\Swervpay;

use Swervpaydev\SDK\Models\SuccessMessage;


class Webhook
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
     * Retry a webhook log by its ID.
     *
     * @param string $id The ID of the webhook log to retry.
     * @return SuccessMessage The success message indicating the retry status.
     */
    public function retry(string $id)
    {
        $res = $this->client->post("webhook/{$id}/retry")['data'];

        return new SuccessMessage($res);
    }


    /**
     * Test a webhook by sending a test request.
     *
     * @param string $id The ID of the webhook to test.
     * @return SuccessMessage The success message response.
     */
    public function test(string $id)
    {
        $res = $this->client->post("webhook/{$id}/test", [])['data'];
        return new SuccessMessage($res);
    }
}
