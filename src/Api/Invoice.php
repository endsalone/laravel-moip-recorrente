<?php

namespace Moip\Recorrente\Api;

use Moip\Recorrente\Http\Request;

class Invoice extends Request
{
    public $env;
    public function __construct($url)
    {
        $this->env = $url;
    }

    public function find($id)
    {
        return $this->get($this->env.'/assinaturas/v1/subscriptions/' . $id . '/invoices');
    }

    public function findDetail($id)
    {
        return $this->get($this->env . '/assinaturas/v1/invoices/' . $id);
    }
}