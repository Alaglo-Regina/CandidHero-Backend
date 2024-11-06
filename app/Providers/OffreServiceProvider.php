<?php

namespace App\Providers;

use App\Interfaces\OffreInterface;
use App\Repositories\OffreRepository;
use Illuminate\Support\ServiceProvider;

class OffreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OffreInterface::class, OffreRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}