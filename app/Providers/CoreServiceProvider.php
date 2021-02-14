<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \Domain\Repositories\UserRepositoryInterface::class,
            \App\Infrastructure\User\UserRepository::class
        );
    }
}
