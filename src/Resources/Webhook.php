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
    protected $swervpay;


    public function __construct(Swervpay $swervpay)
    {
        $this->swervpay = $swervpay;
    }

    /**
     * Retry a webhook log by its ID.
     *
     * @param string $id The ID of the webhook log to retry.
     * @return SuccessMessage The success message indicating the retry status.
     * @throws \Exception
     */
    public function retry(string $id): SuccessMessage
    {
        $res = $this->swervpay->post("webhook/{$id}/retry");

        return new SuccessMessage($res);
    }


    /**
     * Test a webhook by sending a test request.
     *
     * @param string $id The ID of the webhook to test.
     * @return SuccessMessage The success message response.
     * @throws \Exception
     */
    public function test(string $id) : SuccessMessage
    {
        $res = $this->swervpay->post("webhook/{$id}/test", []);
        return new SuccessMessage($res);
    }
}
