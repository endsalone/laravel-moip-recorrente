<?php

namespace Moip\Recorrente\Api;

use Moip\Recorrente\Http\Request;

class Plan extends Request
{
    public $env;

    /**
     * Plan constructor.
     * @param $env
     */
    public function __construct($env)
    {
        $this->env = $env;
    }

    /**
     * LISTAR TODOS OS PLANOS
     * @return array
     */
    public function all()
    {
        return $this->get($this->env.'/assinaturas/v1/plans/');
    }

    /**
     * LISTAR TODOS OS PLANOS DO PARAMETRO
     * @param null $id
     * @return array
     */
    public function find($id)
    {
        return $this->get($this->env . '/assinaturas/v1/plans/'. $id);
    }

    /**
     * CRIAR PLANO
     * @param $data
     * @return array
     */
    public function create($data)
    {
        return $this->post($this->env . '/assinaturas/v1/plans/', $data);
    }

    /**
     * EDITAR O PLANO
     * @param $id
     * @param $data
     * @return array
     */
    public function edit($id, $data)
    {
        return $this->put($this->env . '/assinaturas/v1/plans/' . $id, $data);
    }

    /**
     * DESATIVAR PLANO
     *
     * @param $id
     * @return array
     */
    public function inactive($id)
    {
        return $this->put($this->env . '/assinaturas/v1/plans/' . $id . '/inactivate', $id);
    }

    /**
     * ATIVAR PLANO
     *
     * @param $id
     * @return array
     */
    public function active($id)
    {
        return $this->put($this->env . '/assinaturas/v1/plans/' . $id . '/activate', $id);
    }
}
