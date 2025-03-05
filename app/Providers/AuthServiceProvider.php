<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Task;
use App\Policies\TaskPolicy;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    protected $policies = [
        // Other model policies...
        Task::class => TaskPolicy::class,
    ];
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->register();
    }
   
}
