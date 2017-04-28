<?php
/**
 * Created by PhpStorm.
 * User: ernandesguedes
 * Date: 26/04/17
 * Time: 16:50
 */

namespace Moip\Recorrente\Providers;


use Illuminate\Support\ServiceProvider;

class MoipAssinaturasServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('endsalone/moipassinaturas');
        /*
         * Load Stripe configuration
         *
         * API keys should be utilizing Laravel's "dot files" to keep them out of source
         * control and making them easily overridable on dev environments
         *
         * Read more: http://laravel.com/docs/configuration#environment-configuration
         */
        $api_token = $this->app['config']->get('moipassinaturas::moipassinaturas.token');
        $api_key = $this->app['config']->get('moipassinaturas::moipassinaturas.key');

    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}

}