<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        // Post::class => PostPolicy::class, 
        User::class => UserPolicy::class, 
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->defineGateUser();

        Gate::define('is_admin', function($user){ // user : Auth->user()
            return $user->is_admin;
        });

    }
    
    public function defineGateUser(){
        Gate::define('add_user', 'App\Policies\UserPolicy@create');
    }
}
