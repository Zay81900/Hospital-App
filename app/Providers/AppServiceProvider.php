<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\UserDaoInterface', 'App\Dao\UserDao');
        // $this->app->bind('App\Contracts\Dao\Admin\AdminDaoInterface', 'App\Dao\Admin\AdminDao');
        // $this->app->bind('App\Contracts\Dao\Admin\WorkoutDaoInterface', 'App\Dao\Admin\WorkoutDao');
        // $this->app->bind('App\Contracts\Dao\Admin\InstructorDaoInterface', 'App\Dao\Admin\InstructorDao');
        // $this->app->bind('App\Contracts\Dao\Admin\UserDaoInterface', 'App\Dao\Admin\UserDao');
        $this->app->bind('App\Contracts\Dao\AuthDaoInterface', 'App\Dao\AuthDao');



        // Business logic registration
        $this->app->bind('App\Contracts\Services\UserServiceInterface', 'App\Services\UserService');
        // $this->app->bind('App\Contracts\Services\Admin\AdminServiceInterface', 'App\Services\Admin\AdminService');
        // $this->app->bind('App\Contracts\Services\Admin\WorkoutServiceInterface', 'App\Services\Admin\WorkoutService');
        // $this->app->bind('App\Contracts\Services\Admin\InstructorServiceInterface', 'App\Services\Admin\InstructorService');
        // $this->app->bind('App\Contracts\Services\Admin\UserServiceInterface', 'App\Services\Admin\UserService');
        $this->app->bind('App\Contracts\Services\AuthServiceInterface', 'App\Services\AuthService');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
