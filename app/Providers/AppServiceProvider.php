<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }
    protected $policies=[];
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class,'RegisterPolicy');

        //gate isAdmin or Supervisor

        Gate::define('isAdmin',function(User $user){
            return $user->userLevel=0;
        });
        Paginator::useBootstrap();
    }
}
