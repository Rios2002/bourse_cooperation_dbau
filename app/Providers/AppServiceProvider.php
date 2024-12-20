<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;

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

        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');

            // URL::forceScheme('https');
            // URL::forceRootUrl("https://cooperation.bourses.enseignementsuperieur.bj/");
        }

        //
        // if ($this->app->environment('production')) {
        //     URL::forceScheme('https');
        // }
        // if ($this->app->environment('production')) {
        //     \URL::forceRootUrl(env('APP_URL', 'http://localhost'));
        // }
    }
}
