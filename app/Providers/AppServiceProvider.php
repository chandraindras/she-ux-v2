<?php

namespace App\Providers;

use App\Extensions\OAuth2\OAuthTestProvider;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $socialite = $this->app->make(Factory::class);
        $socialite->extend('oauth-test', function ($app) use ($socialite) {
            $config = $app['config']['services.oauth-test'];

            return $socialite->buildProvider(OAuthTestProvider::class, $config);
        });
    }
}
