<?php

namespace Moip\Recorrente\Api;

use Moip\Recorrente\Http\Request;

class Subscription extends Request
{
    public $env;

    public function __construct($env)
    {
        $this->env = $env;
    }

    /**
     * LISTAR TODAS ASSINATURAS
     * @return array
     */
    public function all()
    {
        return $this->get($this->env.'/assinaturas/v1/subscriptions');
    }

    /**
     * COLETA ASSINATURA
     * @param $subscription_code
     * @return array
     */
    public function find($subscription_code)
    {
        return $this->get($this->env.'/assinaturas/v1/subscriptions/' . $subscription_code);
    }

    /**
     * CRIAR UMA NOVA ASSINATURA DESDE QUE O USUARIO ESTEJA CADASTRADO
     * @param $data
     * @return array
     */
    public function create($data)
    {
        return $this->post($this->env . '/assinaturas/v1/subscriptions?new_customer=false', $data);
    }

    /**
     * CRIAR UMA NOVA ASSINATURA JUNTO COM O USUARIO
     * @param $data
     * @return array
     */
    public function createWithNewUser($data)
    {
        return $this->post($this->env . '/assinaturas/v1/subscriptions?new_customer=true', $data);
    }

    /**
     * SUSPENDE A ASSINATURA
     * @param $subscription_code
     * @return array
     */
    public function suspend($subscription_code)
    {
        return $this->put($this->env . '/assinaturas/v1/subscriptions/'. $subscription_code .'/suspend', $subscription_code);
    }

    /**
     * REATIVA A ASSINATURA
     * @param $subscription_code
     * @return array
     */
    public function active($subscription_code)
    {
        return $this->put($this->env . '/assinaturas/v1/subscriptions/'. $subscription_code .'/activate', $subscription_code);
    }

    /**
     * CANCELA A ASSINATURA
     * @param $subscription_code
     * @return array
     */
    public function cancel($subscription_code)
    {
        return $this->put($this->env . '/assinaturas/v1/subscriptions/'. $subscription_code .'/cancel', $subscription_code);
    }

    /**
     * ALTERAR ASSINATURA
     * @param $subscription_code
     * @param $data
     * @return array
     */
    public function edit($subscription_code, $data)
    {
        return $this->put($this->env . '/assinaturas/v1/subscriptions/'. $subscription_code, $data);
    }


}