<?php

namespace App\Providers;

use App\Grants\ForumUserCustomGrant;
use App\Traits\HandlesAdminAuthorization;
use App\Traits\HandlesUpdateAuthorization;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Bridge\RefreshTokenRepository;
use Laravel\Passport\Bridge\UserRepository;
use Laravel\Passport\Passport;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;

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
        //Passport::routes();
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));

        $server = $this->app->make(\League\OAuth2\Server\AuthorizationServer::class);
        $server->enableGrantType(new \Laravel\Passport\Bridge\PersonalAccessGrant(), new \DateInterval('P15D'));


        Gate::define('create-data', function($user) {
            return HandlesAdminAuthorization::isAdmin($user);
        });

        Gate::define('update-data', function($user, $model) {
            return HandlesAdminAuthorization::isAdmin($user) || HandlesUpdateAuthorization::isUpdatingHimself($user, $model);
        });
        
    }
}
