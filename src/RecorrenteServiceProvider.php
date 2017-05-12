<?php
namespace Moip\Recorrente;

use Illuminate\Support\ServiceProvider;

/**
 * Created by PhpStorm.
 * User: ernandesguedes
 * Date: 26/04/17
 * Time: 11:42
 */

class RecorrenteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__ . '/Config/moiprecorrente.php' => config_path('moiprecorrente.php')], 'config');
    }
    public function register()
    {
        $this->app->singleton('recorrente', function (){
            return new Recorrente();
        });
    }
}