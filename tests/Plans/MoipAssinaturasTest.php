<?php

namespace MoipAssinaturas\Plans;

use PHPUnit\Framework\TestCase;
/**
 * CLASSES REQUERIDAS
 */
use MoipAssinaturas\Http\Planos;

class PlanTest extends TestCase
{


    public function testAllPlans(){
        $plan = new Planos();
        $json = $plan->all();
        dd($json);
    }
}
