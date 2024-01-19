<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Carbon;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Configurer Passport
        Passport::loadKeysFrom(base_path('secrets/oauth'));

        // Facultatif : définir la durée de validité des tokens
        Passport::tokensExpireIn(Carbon::now()->addHours(6));
        Passport::refreshTokensExpireIn(Carbon::now()->addHours(12));
    }
}
