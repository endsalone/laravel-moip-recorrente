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
     * @param null $plan_id
     * @return array
     */
    public function find($plan_id)
    {
        return $this->get($this->env . '/assinaturas/v1/plans/'. $plan_id);
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
     * @param $plan_id
     * @param $data
     * @return array
     */
    public function edit($plan_id, $data)
    {
        return $this->put($this->env . '/assinaturas/v1/plans/' . $plan_id, $data);
    }

    /**
     * DESATIVAR PLANO
     * @param $plan_id
     * @return array
     */
    public function inactive($plan_id)
    {
        return $this->put($this->env . '/assinaturas/v1/plans/' . $plan_id . '/inactivate', $id);
    }

    /**
     * ATIVAR PLANO
     * @param $plan_id
     * @return array
     */
    public function active($plan_id)
    {
        return $this->put($this->env . '/assinaturas/v1/plans/' . $plan_id . '/activate', $id);
    }
}
