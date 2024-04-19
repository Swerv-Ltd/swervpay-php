<?php

namespace Swervpaydev\SDK\Resources;


use Swervpaydev\SDK\Swervpay;
use Swervpaydev\SDK\Models\CollectionHistory;
use Swervpaydev\SDK\Models\Wallet;

class Collection
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
     * Creates a new collection.
     *
     * @param array $data The collection data.
     * @return Wallet The create collection response object.
     * @throws \Exception
     */
    public function create(array $data): Wallet
    {
        $res = $this->swervpay->post('collections', $data);

        return new Wallet($res);
    }



    /**
     * Retrieves a collection.
     *
     * @param string $id The collection ID.
     * @return Wallet The collection model.
     * @throws \Exception
     */
    public function get(string $id)
    {
        $res = $this->swervpay->get("collections/{$id}");

        return new Wallet($res);
    }

    /**
     * Retrieves multiple collections.
     *
     * @param array $query The query parameters.
     * @return Wallet The collection model.
     * @throws \Exception
     */
    public function gets(array $query = [])
    {

        $uri = "collections";

        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }

        $res = $this->swervpay->get($uri);

        return new Wallet($res);
    }


    /**
     * Retrieves a specific transaction of a collection.
     *
     * @param string $id The collection ID.
     * @param string $transactionId The transaction ID.
     * @return CollectionHistory The collection transaction object.
     * @throws \Exception
     */
    public function transaction(string $id, string $transactionId): CollectionHistory
    {
        $res = $this->swervpay->get("collection/{$id}/transactions/{$transactionId}", []);

        return new CollectionHistory($res);
    }

    /**
     * Retrieves all transactions of a collection.
     *
     * @param string $id The collection ID.
     * @param array $query (optional) The query parameters to filter the transactions.
     * @return CollectionHistory The collection transaction object.
     * @throws \Exception
     */
    public function transactions(string $id, array $query = []): CollectionHistory
    {
        $uri = "collections/{$id}/transactions";

        if (!empty($query)) {
            $uri .= '?' . http_build_query($query);
        }

        $res = $this->swervpay->get($uri);

        return new CollectionHistory($res);
    }
}
