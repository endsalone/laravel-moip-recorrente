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
     * @param $id
     * @return array
     */
    public function find($id)
    {
        return $this->get($this->env . '/assinaturas/v1/customers/'. $id);
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
     * @param $id
     * @param $data
     * @return array
     */
    public function edit($id, $data)
    {
        return $this->put($this->env.'/assinaturas/v1/customers/'. $id, $data);
    }

    /**
     * EDITAR DADOS DO CARTAO DE CREDITO DO CLIENTE
     * @param $id
     * @param $data
     * @return array
     */
    public function editBillingInfo($id, $data)
    {
        return $this->put($this->env . '/assinaturas/v1/customers/' . $id . '/billing_infos', $data);
    }

}