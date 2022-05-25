<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        // define a picker role
        Gate::define('isPicker', function($user) {
            return $user->role->role == 'picker';
         });

        // define a verkoper role
        Gate::define('isVerkoper', function($user) {
             return $user->role->role == 'verkoper';
         });

        // define a voorraadmanager role
        Gate::define('isVoorraadmanager', function($user) {
             return $user->role->role == 'voorraadmanager';
         });
        //
    }
}
