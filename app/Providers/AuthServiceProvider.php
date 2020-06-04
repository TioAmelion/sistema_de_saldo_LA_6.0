<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Noticia;
use App\Permission;
use App\Policies\NoticiaPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //App\Noticia::class => App\Policies\NoticiaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissions = Permission::with('roles')->get();

        foreach($permissions as $permission){

            Gate::define($permission->name ,function(User $user) use ($permission){
                return $user->hasPermission($permission);
            });
        }

        Gate::before(function(User $user, $ability){
            if( $user->hasAnyRoles('admin') )
                return true;
        });
    }
}
