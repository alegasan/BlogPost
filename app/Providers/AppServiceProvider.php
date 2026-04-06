<?php

namespace App\Providers;

use App\View\Composers\PostStatsComposer;
use Illuminate\Support\Facades\View;
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
        View::composer([
            'pages.user.Dashboard',
            'pages.user.postPage.Index',
        ], PostStatsComposer::class);
    }
}
