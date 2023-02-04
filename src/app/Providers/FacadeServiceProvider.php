<?php

namespace App\Providers;

use App\Services\MoneyContextService;
use App\Services\MoneyFormatterService;
use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('money.context.service', fn () => new MoneyContextService());
        $this->app->bind('money.formatter.service', fn () => new MoneyFormatterService());
    }
}
