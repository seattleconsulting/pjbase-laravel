<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $baseUrlDaoInterface = 'App\Contracts\Dao';
        $baseUrlDao = 'App\Dao';
        $baseUrlServiceInterface = 'App\Contracts\Services';
        $baseUrlService = 'App\Services';

        // Dao Registration
        $this->app->bind($baseUrlDaoInterface . '\Task\TaskDaoInterface', $baseUrlDao . '\Task\TaskDao');
        
        // Business logic registration
        $this->app->bind($baseUrlServiceInterface . '\Task\TaskServiceInterface', $baseUrlService . '\Task\TaskService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
