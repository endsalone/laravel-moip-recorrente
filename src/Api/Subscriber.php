<?php

namespace Moip\Recorrente\Api;

use Moip\Recorrente\Http\Request;

class Subscriber extends Request
{
    public $env;
    public function __construct($url)
    {
        $this->env = $url;
    }

    /**
     * LISTAR TODOS OS CLIENTES
     * @return array
     */
    public function all()
    {
        return $this->get($this->env.'/assinaturas/v1/customers');
    }

    /**
     * LISTAR O CLIENTE DO PARAMETRO
     * @param $user_id
     * @return array
     */
    public function find($user_id)
    {
        return $this->get($this->env . '/assinaturas/v1/customers/'. $user_id);
    }

    /**
     * CRIAR UM NOVO CLIENTE
     * @param $data
     * @return array
     */
    public function create($data)
    {
        return $this->post($this->env . '/assinaturas/v1/customers?new_vault=false', $data);
    }

    /**
     * EDITAR DADOS DO CLIENTE
     * @param $user_id
     * @param $data
     * @return array
     */
    public function edit($user_id, $data)
    {
        return $this->put($this->env.'/assinaturas/v1/customers/'. $user_id, $data);
    }

    /**
     * EDITAR DADOS DO CARTAO DE CREDITO DO CLIENTE
     * @param $user_id
     * @param $data
     * @return array
     */
    public function editBillingInfo($user_id, $data)
    {
        return $this->put($this->env . '/assinaturas/v1/customers/' . $user_id . '/billing_infos', $data);
    }

}