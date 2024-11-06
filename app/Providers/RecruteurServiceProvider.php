<?php

namespace App\Providers;

use App\Interfaces\RecruteurInterface;
use App\Repositories\RecruteurRepository;
use Illuminate\Support\ServiceProvider;

class RecruteurServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RecruteurInterface::class, RecruteurRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}