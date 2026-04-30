<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        if ($this->app->runningInConsole()) {
            return;
        }

        $forwardedProto = request()->header('X-Forwarded-Proto');
        $forwardedHost = request()->header('X-Forwarded-Host');

        if ($forwardedProto && $forwardedHost) {
            URL::forceRootUrl($forwardedProto.'://'.$forwardedHost);
            URL::forceScheme($forwardedProto);

            return;
        }

        $appUrl = config('app.url');

        if ($appUrl) {
            URL::forceRootUrl(rtrim($appUrl, '/'));

            if (str_starts_with($appUrl, 'https://')) {
                URL::forceScheme('https');
            }
        }
    }
}
