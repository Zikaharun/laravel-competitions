<?php

namespace App\Providers;

use App\Services\CompetitionService;
use App\Services\Impl\CompetitionServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(
            \App\Repositories\CompetitionRepository::class,
            \App\Repositories\Impl\CompetitionRepositoryImpl::class
        );

        $this->app->bind(
            CompetitionService::class,
            CompetitionServiceImpl::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
