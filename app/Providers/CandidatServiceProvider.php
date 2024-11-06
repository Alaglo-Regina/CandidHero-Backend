<?php

namespace App\Providers;


use App\Interfaces\CandidatInterface;
use App\Repositories\CandidatRepository;
use Illuminate\Support\ServiceProvider;

class CandidatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CandidatInterface::class, CandidatRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}