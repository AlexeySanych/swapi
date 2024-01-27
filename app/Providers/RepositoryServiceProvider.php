<?php

namespace App\Providers;

use App\Contracts\RepositoryInterface;
use App\Repositories\PeopleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            RepositoryInterface::class,
            PeopleRepository::class
        );
    }
}
