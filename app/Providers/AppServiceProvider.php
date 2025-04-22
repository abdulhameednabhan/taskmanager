<?php

namespace App\Providers;
use App\Contracts\TaskAssignmentStrategyInterface;
use App\Services\RoundRobinAssignmentStrategy;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(TaskAssignmentStrategyInterface::class, function () {
            
            return match (config('task.assignment_strategy')) {
                'round_robin' => new RoundRobinAssignmentStrategy(),
              
                default => new RoundRobinAssignmentStrategy(), 
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
