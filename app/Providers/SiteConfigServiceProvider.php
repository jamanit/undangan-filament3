<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SiteConfig;

class SiteConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('siteConfigs', function () {
            return SiteConfig::all()->keyBy('key');
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $siteConfigs = app('siteConfigs');
            $primary_color = $siteConfigs['primary_color']->value ?? 'violet';

            $view->with('siteConfigs', $siteConfigs)
                ->with('primary_color', $primary_color);
        });
    }
}
