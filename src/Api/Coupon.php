<?php

namespace Moip\Recorrente\Api;

use Moip\Recorrente\Http\Request;

class Coupon extends Request
{
    public $env;
    public function __construct($url)
    {
        $this->env = $url;
    }

    /**
     * LISTAR TODOS OS CUPONS
     * @return array
     */
    public function all()
    {
        return $this->get($this->env.'/assinaturas/v1/coupons/');
    }

    /**
     * LISTAR DETALHES DE UM CUPOM
     * @param $coupon_id
     * @return array
     */
    public function find($coupon_id)
    {
        return $this->get($this->env.'/assinaturas/v1/invoices/' . $coupon_id);
    }

    /**
     * CRIAR UM NOVO CUPOM
     * @param $data
     * @return array
     */
    public function create($data)
    {
        return $this->post($this->env . '/assinaturas/v1/coupons', $data);
    }

    /**
     * ASSOCIAR UM CUPOM PARA UM USUARIO EXISTENTE
     * @param $subscription_code
     * @param $data
     * @return array
     */
    public function applyToSubscription($subscription_code, $data)
    {
        return $this->put($this->env . '/assinaturas/v1/subscriptions/' . $subscription_code, $data);
    }

    /**
     * ASSOCIAR UM CUPOM PARA UM NOVO EXISTENTE
     * @param $data
     * @return array
     */
    public function applyToNewSubscription($data)
    {
        return $this->put($this->env . '/assinaturas/v1/subscriptions?new_customer=true', $data);
    }

    /**
     * ATIVAR UM CUPOM
     * @param $coupon_id
     * @return array
     */
    public function active($coupon_id)
    {
        return $this->put($this->env . '/assinaturas/v1/coupons/'. $coupon_id .'/active', $coupon_id);
    }

    /**
     * DESATIVAR UM CUPOM
     * @param $coupon_id
     * @return array
     */
    public function inactive($coupon_id)
    {
        return $this->put($this->env . '/assinaturas/v1/coupons/'. $coupon_id .'/inactive', $coupon_id);
    }

    /**
     * REMOVER CUPOM DE ASSINATURA
     * @param $subscription_id
     * @return array
     */
    public function removeFromSubscription($subscription_id)
    {
        return $this->delete($this->env . '/assinaturas/v1/subscriptions/'. $subscription_id .'/coupon');
    }

}