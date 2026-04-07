<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\MyPostPolicy;
use App\View\Composers\PostStatsComposer;
use Illuminate\Support\Facades\Gate;
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
        Gate::policy(Post::class, MyPostPolicy::class);

        View::composer([
            'pages.user.Dashboard',
            'pages.user.postPage.Index',
        ], PostStatsComposer::class);
    }
}
