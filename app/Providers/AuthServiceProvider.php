<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('crud-user', function () {
            $userLogin = Auth::user();
            foreach ($userLogin->roles as $role) {
                if ($role->name == 'admin') {
                    return true;
                }
            }
            return false;
        });


        Gate::define('loginAdmin', function () {
            $userLogin = Auth::user();
            $role = $userLogin->role;
            if ($role->name == 'admin') {
                return true;
            }
            return false;
        });
    }
}

