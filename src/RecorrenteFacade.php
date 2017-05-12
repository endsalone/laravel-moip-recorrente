<?php
namespace Moip\Recorrente;

use Illuminate\Support\Facades\Facade;

class RecorrenteFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'recorrente';
    }
}