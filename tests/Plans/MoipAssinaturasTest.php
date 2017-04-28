<?php

namespace Moip\Recorrente\Tests;

/**
 * CLASSES REQUERIDAS
 */

use PHPUnit\Framework\TestCase;
use Moip\Recorrente\Http\Planos;

class PlanTest extends TestCase
{


    public function testAllPlans(){
        $plan = new Planos();
        $json = $plan->all();
        dd($json);
    }
}
