<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AdvisorService;

class AdvisorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdvisorService::class, function($app){
            return new AdvisorService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
