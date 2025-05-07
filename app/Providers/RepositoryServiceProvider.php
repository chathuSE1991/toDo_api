<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Interfaces\BaseEloquentRepositoryInterface;
use App\Interfaces\ToDo\ToDoRepositoryInterface;
use App\Repositories\BaseEloquentRepository;
use App\Repositories\ToDo\ToDoRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseEloquentRepositoryInterface::class, BaseEloquentRepository::class);
        $this->app->bind(ToDoRepositoryInterface::class, ToDoRepository::class);

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
