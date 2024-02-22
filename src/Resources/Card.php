<?php

namespace Swervpaydev\SDK\Resources;


use Swervpaydev\SDK\Swervpay;
use Swervpaydev\SDK\Models\Card as CardModel;
use Swervpaydev\SDK\Models\SuccessMessage;
use Swervpaydev\SDK\Models\CreateCard;
use Swervpaydev\SDK\Models\CardTransaction;

class Card
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
     * Creates a new card.
     *
     * @param array $data The card data.
     * @return CreateCard The create card response object.
     * @throws \Exception
     */
    public function create(array $data): CreateCard
    {
        $res = $this->swervpay->post('cards', $data);

        return new CreateCard($res);
    }

    /**
     * Funds a card.
     *
     * @param string $id The card ID.
     * @param array $data The funding data.
     * @return SuccessMessage The success message.
     */
    public function fund(string $id, array $data): SuccessMessage
    {
        $res = $this->swervpay->post("cards/{$id}/fund", $data);

        return new SuccessMessage($res);
    }

    /**
     * Withdraws from a card.
     *
     * @param string $id The card ID.
     * @param array $data The withdrawal data.
     * @return SuccessMessage The success message.
     * @throws \Exception
     */
    public function withdraw(string $id, array $data)
    {
        $res = $this->swervpay->post("cards/{$id}/withdraw", $data);

        return new SuccessMessage($res);
    }

    /**
     * Terminates a card.
     *
     * @param string $id The card ID.
     * @return SuccessMessage The success message.
     * @throws \Exception
     */
    public function terminate(string $id)
    {
        $res = $this->swervpay->post("cards/{$id}/terminate", []);

        return new SuccessMessage($res);
    }

    /**
     * Freezes a card.
     *
     * @param string $id The card ID.
     * @return SuccessMessage The success message.
     * @throws \Exception
     */
    public function freeze(string $id)
    {
        $res = $this->swervpay->post("cards/{$id}/freeze", []);

        return new SuccessMessage($res);
    }

    /**
     * Retrieves a card.
     *
     * @param string $id The card ID.
     * @return CardModel The card model.
     * @throws \Exception
     */
    public function get(string $id)
    {
        $res = $this->swervpay->get("cards/{$id}");

        return new CardModel($res);
    }

    /**
     * Retrieves multiple cards.
     *
     * @param array $query The query parameters.
     * @return CardModel The card model.
     * @throws \Exception
     */
    public function gets(array $query = [])
    {

        $uri = "cards";

        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }

        $res = $this->swervpay->get($uri);

        return new CardModel($res);
    }


    /**
     * Retrieves a specific transaction of a card.
     *
     * @param string $id The card ID.
     * @param string $transactionId The transaction ID.
     * @return CardTransaction The card transaction object.
     * @throws \Exception
     */
    public function transaction(string $id, string $transactionId): CardTransaction
    {
        $res = $this->swervpay->get("cards/{$id}/transactions/{$transactionId}", []);

        return new CardTransaction($res);
    }

    /**
     * Retrieves all transactions of a card.
     *
     * @param string $id The card ID.
     * @param array $query (optional) The query parameters to filter the transactions.
     * @return CardTransaction The card transaction object.
     * @throws \Exception
     */
    public function transactions(string $id, array $query = []): CardTransaction
    {
        $uri = "cards/{$id}/transactions";

        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }

        $res = $this->swervpay->get($uri);

        return new CardTransaction($res);
    }
}
