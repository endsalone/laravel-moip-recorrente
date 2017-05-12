<?php

namespace Moip\Recorrente\Tests;

/**
 * CLASSES REQUERIDAS
 */

use Illuminate\Support\Facades\App;
use Moip\Recorrente\Http\Planos;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Config;
class PlanTest extends TestCase
{

    public function testAllPlans(){
        Config::get('moiprecorrente.token');
    }
}
