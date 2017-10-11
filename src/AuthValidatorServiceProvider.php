<?php

namespace Dpc\HashVerifier;

use Illuminate\Support\ServiceProvider;

/**
 * Class AuthValidatorServiceProvider
 * @package Dpc\HashVerifier
 */
class AuthValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() : void
    {
        $this->publishes([__DIR__ . '/../config/validator.php' => config_path('validator.php'),], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->app->bind(NonceContract::class, NonceGenerator::class);
        $this->app->bind(HMacValidatorContract::class, HMacValidator::class);
        $this->app->bind(AuthValidatorContract::class, AuthValidator::class);
    }

}
