<?php
namespace Moip\Recorrente;

use Illuminate\Support\Facades\Config;
use Moip\Recorrente\Api\Invoice;
use Moip\Recorrente\Api\Plan;
use Moip\Recorrente\Api\Signature;
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
     * @return Signature
     */
    public function Signature()
    {
        return new Signature($this->env);
    }

    /**
     * @return Invoice
     */
    public function Invoice()
    {
        return new Invoice($this->env);
    }

}