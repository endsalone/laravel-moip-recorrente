<?php

namespace MoipAssinaturas\Interfaces;
/**
 * Created by PhpStorm.
 * User: ernandesguedes
 * Date: 25/04/17
 * Time: 14:50
 */
Interface iRequest
{
    public function get($url);
    public function post($url, $data);
    public function put($url, $data);
    public function delete($url, $data);
}