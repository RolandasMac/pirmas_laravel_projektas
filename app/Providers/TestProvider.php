<?php
namespace App\Providers;

use App\Services\TestClass;
use Illuminate\Support\ServiceProvider;

class TestProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind(TestClass::class, function ($app) {
        //     return new TestClass();
        // });
        //arba
        $this->app->singleton(TestClass::class, function ($app) {
            return new TestClass();
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->alias(TestClass::class, 'Test');
    }
}
