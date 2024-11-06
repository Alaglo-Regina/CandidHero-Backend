<?php

namespace App\Providers;

use App\Interfaces\PostulationInterface;
use App\Repositories\PostulationRepository;
use Illuminate\Support\ServiceProvider;

class PostulationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PostulationInterface::class, PostulationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}