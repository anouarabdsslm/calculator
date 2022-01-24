<?php

namespace App\Providers;

use App\Services\Operators\Calculator;
use Illuminate\Support\ServiceProvider;
use App\Services\Operators\CalculatorInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CalculatorInterface::class, fn($app) => new Calculator);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
    }
}
