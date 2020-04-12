<?php

namespace App\Providers;

use App\Traits\HandlesAdminAuthorization;
use App\Traits\HandlesUpdateAuthorization;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    use HandlesAdminAuthorization, HandlesUpdateAuthorization;
    
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Passport::routes();
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));

        Gate::define('create-data', function($user) {
            return HandlesAdminAuthorization::isAdmin($user);
        });

        Gate::define('update-data', function($user, $model) {
            return HandlesAdminAuthorization::isAdmin($user) || HandlesUpdateAuthorization::isUpdatingHimself($user, $model);
        });
    }
}
