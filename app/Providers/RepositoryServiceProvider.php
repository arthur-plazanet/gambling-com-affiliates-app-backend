<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AffiliateRepositoryInterface;
use App\Repositories\AffiliateRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AffiliateRepositoryInterface::class, AffiliateRepository::class);
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
