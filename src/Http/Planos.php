<?php
/**
 * Created by PhpStorm.
 * User: ernandesguedes
 * Date: 26/04/17
 * Time: 13:28
 */

namespace MoipAssinaturas\Http;


class Planos extends Request
{
    public function all()
    {
        $plans = $this->get('https://sandbox.moip.com.br/assinaturas/v1/plans/');
        return $plans;
    }

    public function find($id)
    {}

    public function create($data)
    {}

    public function update($id, $data)
    {}

    public function delete($id, $data)
    {}
}