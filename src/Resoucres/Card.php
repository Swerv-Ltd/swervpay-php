<?php

namespace Swervpaydev\SDK\Resources;

use Swervpaydev\SDK\Models\Card as ModelsCard;
use Swervpaydev\SDK\Swervpay;
use Swervpaydev\SDK\Models\SuccessMessage;

class Card
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
     * Creates a new card.
     *
     * @param array $data The card data.
     * @return SuccessMessage The success message.
     */
    public function create(array $data)
    {
        $res = $this->client->post('cards', $data)['data'];

        return new SuccessMessage($res);
    }

    /**
     * Funds a card.
     *
     * @param string $id The card ID.
     * @param array $data The funding data.
     * @return SuccessMessage The success message.
     */
    public function fund(string $id, array $data)
    {
        $res = $this->client->post("cards/{$id}/fund", $data)['data'];

        return new SuccessMessage($res);
    }

    /**
     * Withdraws from a card.
     *
     * @param string $id The card ID.
     * @param array $data The withdrawal data.
     * @return SuccessMessage The success message.
     */
    public function withdraw(string $id, array $data)
    {
        $res = $this->client->post("cards/{$id}/withdraw", $data)['data'];

        return new SuccessMessage($res);
    }

    /**
     * Terminates a card.
     *
     * @param string $id The card ID.
     * @return SuccessMessage The success message.
     */
    public function terminate(string $id)
    {
        $res = $this->client->post("cards/{$id}/terminate", [])['data'];

        return new SuccessMessage($res);
    }

    /**
     * Freezes a card.
     *
     * @param string $id The card ID.
     * @return SuccessMessage The success message.
     */
    public function freeze(string $id)
    {
        $res = $this->client->post("cards/{$id}/freeze", [])['data'];

        return new SuccessMessage($res);
    }

    /**
     * Retrieves a card.
     *
     * @param string $id The card ID.
     * @return ModelsCard The card model.
     */
    public function get(string $id)
    {
        $res = $this->client->get("cards/{$id}")['data'];

        return new ModelsCard($res);
    }

    /**
     * Retrieves multiple cards.
     *
     * @param array $query The query parameters.
     * @return ModelsCard The card model.
     */
    public function gets(array $query = [])
    {

        $uri = "cards";

        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }

        $res = $this->client->get($uri)['data'];

        return new ModelsCard($res);
    }
}
