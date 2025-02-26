<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            Gate::define($permission->slug, function (User $user) use($permission) {
                return $user->hasPermission($permission->slug);
            });
        }
        Paginator::useBootstrapFive();
    }
}
