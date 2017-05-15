<?php

namespace Moip\Recorrente\Api;

use Moip\Recorrente\Http\Request;

class Retry extends Request
{
    public $env;
    public function __construct($url)
    {
        $this->env = $url;
    }

    /**
     * LISTAR TODAS AS FATURAS DE UMA ASSINATURA
     * @param $payment_id
     * @return array
     */
    public function payment($payment_id)
    {
        return $this->post($this->env.'/assinaturas/v1/invoices/' . $payment_id . '/retry');
    }

    /**
     * LISTAR DETALHES DA FATURA
     * @return array
     */
    public function preference()
    {
        return $this->post($this->env.'/assinaturas/v1/users/preferences/retry');
    }

}