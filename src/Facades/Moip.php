<?php
namespace MoipAssinaturas\Facades;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: ernandesguedes
 * Date: 26/04/17
 * Time: 11:43
 */
class Moip extends Facade
{
    /*
     * COLETAR NOME DO COMPONENTE REGISTRADO
     */
    public function getFacadeAccessor()
    {
        return 'moipassinaturas';
    }
}