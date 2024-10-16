<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Exemple : Enregistrement d'un service personnalisé
        // $this->app->bind('CustomService', function ($app) {
        //     return new \App\Services\CustomService();
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Utiliser Bootstrap 5 pour la pagination
        Paginator::useBootstrapFive();

        $this->routes(function () {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }
    public function map()
{
    $this->mapApiRoutes();

    $this->mapWebRoutes();
}

protected function mapWebRoutes()
{
    Route::middleware('web')
         ->namespace($this->namespace)
         ->group(base_path('routes/web.php'));
}

protected function mapApiRoutes()
{
    Route::prefix('api')
         ->middleware('api')
         ->namespace($this->namespace)
         ->group(base_path('routes/api.php'));
}


}
