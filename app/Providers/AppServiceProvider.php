<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Line\LineExtendSocialite;

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
        // $this->app->extend(SocialiteWasCalled::class, function ($events) {
        //     $events->extend('line', LineExtendSocialite::class);
        // });
        $this->app['events']->listen(
            SocialiteWasCalled::class,
            'SocialiteProviders\\Line\\LineExtendSocialite@handle'
        );
    }
}
