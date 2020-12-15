<?php

namespace App\Providers;

use DB;
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
        // Debug log for SQL
        DB::listen(
            function ($sql) {
                foreach ($sql->bindings as $i => $binding) {
                    if ($binding instanceof \DateTime) {
                        $sql->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                    } else {
                        if (is_string($binding)) {
                            $sql->bindings[$i] = "'$binding'";
                        }
                    }
                }
                // Insert bindings into query
                $query = str_replace(['%', '?'], ['%%', '%s'], $sql->sql);
                $query = vsprintf($query, $sql->bindings);
                // Log::debug($query);
            }
        );
    }
}
