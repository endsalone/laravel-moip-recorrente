<?php
/**
 * Created by PhpStorm.
 * User: ernandesguedes
 * Date: 26/04/17
 * Time: 16:50
 */

namespace MoipAssinaturas\Providers;


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
        $this->package('mmollick/laravel-stripe');
        /*
         * Load Stripe configuration
         *
         * API keys should be utilizing Laravel's "dot files" to keep them out of source
         * control and making them easily overridable on dev environments
         *
         * Read more: http://laravel.com/docs/configuration#environment-configuration
         */
        $api_key = isset($_ENV['stripe.api_key']) ? $_ENV['stripe.api_key'] : $this->app['config']->get('laravel-stripe::stripe.api_key');
        \Stripe\Stripe::setApiKey($api_key);
        // Set API Version (optional)
        $api_version = isset($_ENV['stripe.api_version']) ? $_ENV['stripe.api_version'] : $this->app['config']->get('laravel-stripe::stripe.api_version');
        if($api_version !== null)
            \Stripe\Stripe::setApiVersion($api_version);
        $publishableKey = isset($_ENV['stripe.publishable_key']) ? $_ENV['stripe.publishable_key'] : $this->app['config']->get('laravel-stripe::stripe.publishable_key');
        /*
         * Register blade compiler for the Stripe publishable key.
         */
        $blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();
        $blade->extend(function($value, $compiler) use($publishableKey)
        {
            $matcher = "/(?<!\w)(\s*)@stripeKey/";
            return preg_replace($matcher, $publishableKey, $value);
        });
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