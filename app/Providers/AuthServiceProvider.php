<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Product'=>'App\Policies\ProductPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        Gate::define('isAdmin', function (User $user) {
            return $user->role=='admin';
        });

        Gate::define('isUser', function (User $user) {
            return $user->role=='user';
        });

        Gate::define('isManager', function (User $user) {
            return $user->role=='manager';
        });

        Gate::define('productOwner', function (User $user, Product $product){
                return $user->id == $product->product_creator;
        });
    }
}
