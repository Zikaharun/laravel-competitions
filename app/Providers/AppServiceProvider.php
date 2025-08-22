<?php

namespace App\Providers;

use App\Services\CompetitionDivisionService;
use App\Services\CompetitionService;
use App\Services\Impl\CompetitionDivisionServiceImpl;
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

        $this->app->bind(
            \App\Repositories\CompetitionDivisionRepository::class,
            \App\Repositories\Impl\CompetitionDivisionRepositoryImpl::class
        );

        $this->app->bind(
            CompetitionDivisionService::class,
            CompetitionDivisionServiceImpl::class
        );

        $this->app->bind(
            \App\Repositories\ParticipantRepository::class,
            \App\Repositories\Impl\ParticipantRepositoryImpl::class
        );

        $this->app->bind(
            \App\Services\ParticipantService::class,
            \App\Services\Impl\ParticipantServiceImpl::class
        );

        $this->app->bind(
            \App\Repositories\CompetitionDivisionParticipantRepository::class,
            \App\Repositories\Impl\CompetitionDivisionParticipantRepositoryImpl::class
        );

        $this->app->bind(
            \App\Services\CompetitionDivisionParticipantService::class,
            \App\Services\Impl\CompetitionDivisionParticipantImpl::class
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
