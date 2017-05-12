<?php

namespace Moip\Recorrente\Api;

use Moip\Recorrente\Http\Request;

class Signature extends Request
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
     * @param $id
     * @return array
     */
    public function find($id)
    {
        return $this->get($this->env.'/assinaturas/v1/subscriptions/' . $id);
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
     * @param $id
     * @return array
     */
    public function suspend($id)
    {
        return $this->put($this->env . '/assinaturas/v1/subscriptions/'. $id .'/suspend', $id);
    }

    /**
     * REATIVA A ASSINATURA
     * @param $id
     * @return array
     */
    public function active($id)
    {
        return $this->put($this->env . '/assinaturas/v1/subscriptions/'. $id .'/activate', $id);
    }

    /**
     * CANCELA A ASSINATURA
     * @param $id
     * @return array
     */
    public function cancel($id)
    {
        return $this->put($this->env . '/assinaturas/v1/subscriptions/'. $id .'/cancel', $id);
    }

    /**
     * ALTERAR ASSINATURA
     * @param $id
     * @param $data
     * @return array
     */
    public function edit($id, $data)
    {
        return $this->put($this->env . '/assinaturas/v1/subscriptions/'. $id, $data);
    }


}