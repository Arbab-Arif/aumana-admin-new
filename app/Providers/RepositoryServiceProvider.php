<?php

namespace App\Providers;

use App\Interfaces\BlogRepositoryInterface;
use App\Interfaces\ImageRepositoryInterface;
use App\Repositories\BlogRepository;
use App\Repositories\ImageRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
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
