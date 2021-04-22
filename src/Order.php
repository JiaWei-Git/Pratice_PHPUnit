<?php

class Order
{
    public $amount = 0;
    protected $gateway;

    public function __construct(PaymentGeteway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function process()
    {
        return $this->gateway->charge($this->amount);
    }
}