<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\MyPostPolicy;
use App\View\Composers\PostStatsComposer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

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

        Model::preventLazyLoading(! app()->isProduction());

        Gate::policy(Post::class, MyPostPolicy::class);

        View::composer([
            'pages.user.Dashboard',
            'pages.user.postPage.Index',
        ], PostStatsComposer::class);
    }
}
