<?php
namespace Moip\Recorrente;

use Illuminate\Support\Facades\Config;
use Moip\Recorrente\Api\Coupon;
use Moip\Recorrente\Api\Invoice;
use Moip\Recorrente\Api\Payment;
use Moip\Recorrente\Api\Plan;
use Moip\Recorrente\Api\Retry;
use Moip\Recorrente\Api\Subscription;
use Moip\Recorrente\Api\Subscriber;


class Recorrente
{

    public $token;

    public $key;
    public $env;

    public function __construct()
    {
        $this->token = Config::get('moiprecorrente.token');
        $this->key =  Config::get('moiprecorrente.chave') ;

        if(config('moiprecorrente.test') == true)
            $this->env = Config::get('moiprecorrente.sandbox');
        else
            $this->env = Config::get('moiprecorrente.production');
    }

    /**
     * @return Plan
     */
    public function Plan()
    {
        return new Plan($this->env);
    }

    /**
     * @return Subscriber
     */
    public function Subscriber()
    {
        return new Subscriber($this->env);
    }

    /**
     * @return Subscription
     */
    public function Subscription()
    {
        return new Subscription($this->env);
    }

    /**
     * @return Invoice
     */
    public function Invoice()
    {
        return new Invoice($this->env);
    }

    /**
     * @return Payment
     */
    public function Payment()
    {
        return new Payment($this->env);
    }

    /**
     * @return Coupon
     */
    public function Coupon()
    {
        return new Coupon($this->env);
    }

    /**
     * @return Retry
     */
    public function Retry()
    {
        return new Retry($this->env);
    }
}