<?php

namespace Swervpaydev\SDK;


use Swervpaydev\SDK\Resources\Card;
use Swervpaydev\SDK\Resources\Customer;
use Swervpaydev\SDK\Resources\Fx;
use Swervpaydev\SDK\Resources\Other;
use Swervpaydev\SDK\Resources\Wallet;
use Swervpaydev\SDK\Resources\Transaction;
use Swervpaydev\SDK\Resources\Payout;



class Swyftpay
{

    private Fx  $fx;
    private Card $card;
    private Customer $customer;
    private Wallet $wallet;
    private Transaction $transaction;
    private Payout $payout;
    private Other $other;



    public function __construct()
    {
        $this->fx = new Fx($this);
        $this->card = new Card($this);
        $this->customer = new Customer($this);
        $this->wallet = new Wallet($this);
        $this->transaction = new Transaction($this);
        $this->payout = new Payout($this);
        $this->other = new Other($this);
    }
}
